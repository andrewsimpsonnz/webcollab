<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file wriiten 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful, but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave,
  Cambridge, MA 02139, USA.

  Function:
  ---------

  Sends emails and preformatted emails

  ** Parts of this code lifted from phpmailer (Chris Ryan) and from contributed notes in PHP Manual under fsockopen.

  Refer to RFC 821, RFC 822 and RFC 2045 for SMTP.
  Refer to RFC 2554 for SMTP AUTH
  Refer to RFC 2076 for a summary of common headers
  Refer to RFC 1869 for extended hello (EHLO)

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );

//
//function to reinstate html and remove dangerous tags
//

function clean($encoded ) {

  //reinstate encoded html back to original text
  $trans = array_flip(get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES ) );
  $text = strtr($encoded, $trans );

  //remove any dangerous tags that exist after decoding
  $text = preg_replace("/(<\/?)(\w+)([^>]*>)/e", "'\\1'.strtoupper('\\2').'\\3'", $text );
  $block_tag = array("APPLET", "OBJECT", "SCRIPT", "EMBED", "FORM", "?", "%" );
  foreach ($block_tag as $value ) {
    $text = str_replace("<".$value, "<**** ", $text );
  }

return $text;
}

//
//function to reinstate html (used for languages with non us-ascii characters)
//

function trans($encoded ) {

  //reinstate encoded html back to original text
  $trans = array_flip(get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES ) );
  $text = strtr($encoded, $trans );

return $text;
}

//
// Email sending function
//

function email($to, $subject, $message ) {

  global $EMAIL_FROM, $EMAIL_REPLY_TO, $USE_EMAIL, $SMTP_HOST, $SMTP_AUTH, $MAIL_USER, $MAIL_PASSWORD, $email_charset, $email_encode;

  if($USE_EMAIL == "N" ) {
    //email is turned off in config file
    return;
  }

  if( @strlen($to) == 0 ) {
    //no email address specified - end function
    return;
  }

  //if user aborts, let the script carry onto the end
  ignore_user_abort(TRUE);

  //fix up any html on the subject line
  //  (message body is cleaned up at source with either trans() or clean() )
  $subject = trans($subject );

  //send message using SMTP
  //open an SMTP connection at the mail host
  $host = $SMTP_HOST;
  $connection = fsockopen ($host, 25, &$errno, &$errstr, 10 );
  if (!$connection )
    debug("Unable to open SMTP connection to ".$host."<br /><br />Error ".$errno." ".$errstr );

  //sometimes the SMTP server takes a little longer to respond
  // Windows does not have support for this timeout function before PHP ver 4.3.0
  if(substr(PHP_OS, 0, 3) != "WIN" )
    socket_set_timeout($connection, 1, 0 );

  $res = fgets($connection, 256 );
  if(substr($res, 0, 3 ) != "220" )
    debug("Incorrect handshaking response from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //send HELO to server (RFC 821)
  fputs($connection, "HELO ".$_SERVER["SERVER_NAME"]."\r\n" );
  $res = fgets($connection, 256 );
  if(substr($res, 0, 3 ) != "250" )
    debug("Incorrect HELO response from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //do extended HELO to see if we support 8bit mime (RFC 1869)
  if($email_encode = "8bit" ) {
    $bit = false;
    fputs($connection, "EHLO ".$_SERVER["SERVER_NAME"]."\r\n" );
    while($res = fgets($connection, 256 ) ) {
      if(substr($res, 0, 3 ) != "250" )
        break;
      if( ! strpos($res, "8BITMIME" ) === false ) {
        $bit = true;
        break;
      }
    }
    //if we don't support 8bit use quoted-printable
    if( ! $bit )
      $email_encode = "quoted-printable";
  }

  //do SMTP AUTH if required
  if($SMTP_AUTH == "Y" ) {
    fputs($connection, "AUTH LOGIN\r\n" );
    $res = fgets($connection, 256 );
    if(substr($res, 0, 3 ) != "334" )
        debug("AUTH not accepted by SMTP server at $host <br /><br />Response from SMTP server was $res" );

    //send username
    fputs($connection, base64_encode($MAIL_USER )."\r\n" );
    $res = fgets($connection, 256 );
    if(substr($res, 0, 3 ) != "334" )
        debug("Username not accepted SMTP server at $host <br /><br />Response from SMTP server was $res" );

    //send password
    fputs($connection, base64_encode($MAIL_PASSWORD )."\r\n" );
    $res = fgets($connection, 256 );
    if(substr($res, 0, 3 ) != "334" )
        debug("Password not accepted SMTP server at $host <br /><br />Response from SMTP server was $res" );
  }

  //evelope from
  fputs($connection, "MAIL FROM: <$EMAIL_FROM>\r\n" );
  $res = fgets($connection, 256 );
  if(substr($res, 0, 3 ) != "250" )
    debug("Incorrect response to MAIL FROM command from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //envelope to
  $address_list = explode(",", $to );
  foreach($address_list as $email_to ) {
    fputs($connection, "RCPT TO: <".trim($email_to ).">\r\n" );
    $res = fgets($connection, 256 );

    switch(substr($res, 0, 3 ) ) {
      case "250":
      case "251":
        //acceptable responses
        break;

      case "450":
      case "550":
        //mail box error
        warning("Mailbox error for $email_to <br /><br />Response from SMTP server was $res" );
        break;

      default:
        //anything else is no good
        debug("Incorrect response to RCPT TO: $email_to from SMTP server at $host <br /><br />Response from SMTP server was $res" );
        break;
    }
  }

  //start data transmission
  fputs($connection, "DATA\r\n" );
  $res = fgets($connection, 256 );
  if(substr($res, 0, 3 ) != "354")
    debug("Incorrect response to DATA command from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //send the date - in RFC 822 format
  fputs($connection, "Date: ".date("r")."\r\n" );

  //now the prepare the 'to' header

  //RFC 821 requires that headers longer than 998 characters are broken up to separate lines
  //(end long line with \r\n, and begin new line with \t)
  $line = "To: ".$to;
  $lines_out = "";
  //check if we need to break up into several smaller lines
  while(strlen($line ) > 998 ) {
    $pos = strrpos(substr($line, 0, 998 ), "," );
    $lines_out[] = substr($line, 0, $pos );
    $line = "\t".substr($line, $pos + 1 );
  }
  $lines_out[] = $line;

  //now send the "to" lines to the server
  while(list(,$line_out) = @each($lines_out ) ) {
    fputs($connection, "$line_out\r\n" );
  }

  //generate unique message id
  if(version_compare(PHP_VERSION, "4.2.0" ) == -1 )
    mt_srand(hexdec(substr(md5(microtime() ), -8 ) ) & 0x7fffffff );

  $uniq_id = md5(mt_rand() );

  //assemble remaining message headers (RFC 821 / RFC 2045)
  //(subject line is truncated to 998 characters)
  $headers = array("From: ".$EMAIL_FROM."\r\n",
                    "Reply-To: ".$EMAIL_REPLY_TO."\r\n",
                    "Subject: ".substr($subject, 0, 985 )."\r\n",
                    "Message-Id: <".$uniq_id."@".$_SERVER["SERVER_NAME"].">\r\n",
                    "X-Mailer: PHP/" . phpversion()."\r\n",
                    "X-Priority: 3\r\n",
                    "X-Sender: ".$EMAIL_REPLY_TO."\r\n",
                    "Return-Path: <".$EMAIL_REPLY_TO.">\r\n",
                    "Mime-Version: 1.0\r\n",
                    "Content-Type: text/plain; $email_charset\r\n",
                    "Content-Transfer-Encoding: $email_encode\r\n \r\n" );

  //send headers to server
  while(list(,$line_out) = @each($headers ) ) {
  fputs($connection, $line_out );
  }

  //normalise end-of-lines in message body to \n - and change back to \r\n later
  $message = str_replace("\r\n", "\n", $message );
  $message = str_replace("\r", "\n", $message );
  //make sure message ends in a new line \n
  $message = $message."\n";

  //encode message body
  switch($email_encode ){
    case "base64":
    case "binary":
      $message = base64_encode($message );
      //break into chunks of 76 characters per line (RFC 2045)
      $message = chunk_split($message, 76, "\n" );
      break;

    case "7bit":
    case "8bit":
      //break up any lines longer than 998 bytes (RFC 821)
      $message = wordwrap($message, 998, "\n", 1 );
      //lines consisting of single "." get padded by appending a <space>
      $message = str_replace("\n.\n", "\n. \n", $message );
      break;

    case "quoted-printable":
      //replace high ascii, control and = characters (RFC 2045)
      $message = preg_replace('/([\000-\010\013\014\016-\037\075\177-\377])/e', "'='.sprintf('%02X', ord('\\1'))", $message);
      //replace spaces and tabs when it's the last character on a line (RFC 2045)
      $message = preg_replace("/([\011\040])\n/e", "'='.sprintf('%02X', ord('\\1')).'\n'", $message);
      //break up any lines longer than 76 characters with soft line breaks " =\r\n" (RFC 2045)
      //(end of line \n gets changed to \r\n after explode)
      $message = wordwrap($message, 74, " =\n", 1 );
      break;

    default:
      debug("Illegal email encoding requested:<br /><br />$email_decode is not valid.  Check the language file");
      break;
  }

  $lines_out = explode("\n", $message );

  //send message to server (with correct end-of-line \r\n)
  while(list(,$line_out) = @each($lines_out ) ) {
    fputs($connection, "$line_out\r\n" );
  }

  //ok all the message data has been sent - finish with a period on it's own line
  fputs($connection, "\r\n.\r\n" );
  $res = fgets($connection, 256 );
  if(substr($res, 0, 3 ) != "250" )
    debug("Error sending data<br /><br />Response from SMTP server  at $host was $res" );

  //say bye bye
  fputs($connection, "QUIT\r\n" );
  $res = fgets($connection, 256 );
  if(substr($res, 0, 3 ) != "221" )
    debug("Incorrect response to QUIT request from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  fclose ($connection );

  return;
}

 function debug($error_msg ){

   global $DEBUG;

   if($DEBUG == "Y" ) {
      //we don't use error() because email may not work!
     warning("Email error debug", $error_msg );
   }
   else{
     warning("Internal email fault", "Unable to successfully send your email.  Please contact your administrator" );
   }
   return;
 }
?>
