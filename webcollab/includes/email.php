<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file written 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  ** Parts of this code inspired by phpmailer (Chris Ryan) and from contributed notes in PHP Manual under fsockopen.

  Refer to RFC 821 (RFC 2821), RFC 822 for basic SMTP.
  Refer to RFC 1652 for 8BITMIME
  Refer to RFC 1869 for extended hello (EHLO)
  Refer to RFC 2045 for mime types
  Refer to RFC 2047 for handling 8bit headers
  Refer to RFC 2076 for a useful summary of common headers
  Refer to RFC 2554 for SMTP AUTH

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );

//
//function to reinstate html in text and remove any dangerous html scripting tags
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
//function to reinstate html only (used for languages with non us-ascii characters)
//

function trans($encoded ) {

  //reinstate encoded html back to original text
  $trans = array_flip(get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES ) );
  $text = strtr($encoded, $trans );

return $text;
}

//
//function to prepare and encode message body for transmission
//

function message($message ) {

  global $email_encode, $email_charset, $bit8, $body;

  //check if message contains high bit ascii characters and set
  //           encoding to match mailer capabilities
  switch(preg_match('/([\177-\377])/', $message ) ) {
    case true:
      //we have special characters
      switch($bit8 ) {
        case true:
          //mail server has said it can do 8bit
          $email_encode = "8bit";
          $body = " BODY=8BITMIME";
          break;
        case false:
          //old mail server - can only do 7bit mail
          $email_encode = "quoted-printable";
          $body = "";
          break;
      }
      break;

    case false:
      //no special characters ==> use 7bit
      $email_encode = "7bit";
      $email_charset = "us-ascii";
      $body = "";
      break;
  }

  //normalise end-of-lines in message body to \n - and change back to \r\n later
  $message = str_replace("\r\n", "\n", $message );
  $message = str_replace("\r", "\n", $message );
  //make sure message ends in a new line \n
  $message = $message."\n";

  //encode message body
  switch(strtolower($email_encode ) ){
    case "7bit":
    case "8bit":
      //break up any lines longer than 998 bytes (RFC 821)
      $message = wordwrap($message, 998, "\n", 1 );
      break;

    case "quoted-printable":
    default:
      //replace high ascii, control and = characters (RFC 2045)
      $message = preg_replace('/([\000-\010\013\014\016-\037\075\177-\377])/e', "'='.sprintf('%02X', ord('\\1'))", $message);
      //replace spaces and tabs when it's the last character on a line (RFC 2045)
      $message = preg_replace("/([\011\040])\n/e", "'='.sprintf('%02X', ord('\\1')).'\n'", $message);
      //break up any lines longer than 76 characters with soft line breaks " =\r\n" (RFC 2045)
      //(end of line \n gets changed to \r\n after explode)
      $message = wordwrap($message, 74, " =\n", 1 );
      break;

  }

  //lines starting with "." get an additional "." added. (RFC 2821 - 4.5.2)
  $message = str_replace("\n.", "\n..", $message );

return $message;
}


//
//function to prepare and encode the 'subject' line for transmission
//

function subject($subject ) {

  global $email_charset;

  //reinstate any HTML in subject back to text
  $subject = trans($subject );
  //encode subject with 'printed-quotable' if high ASCII characters are present
  switch(preg_match('/([\177-\377])/', $subject ) ) {
    case false:
      //no encoding required
      // provide terminating line ending and limit line length
      $subject = substr($subject, 0, 985 )."\r\n";
      break;

    case true:
      //encode line with 'quoted-printable' (RFC 2045 / RFC 2047)
      // replace high ascii, control, =, ?, <tab> and <space> characters (RFC 2045)
      $line = preg_replace('/([\000-\010\011\013\014\016-\037\040\075\077\177-\377])/e', "'='.sprintf('%02X', ord('\\1'))", $subject);
      $line_out = "";
      $s = "";
      //break into lines no longer than 76 characters including encoding data (RFC 2047)
      $len = 76 - strlen($email_charset ) - 8;
      while(strlen($line ) > 0 ) {
        //less than $len characters ==> output line
        if(strlen($line ) < $len ) {
          $line_out .= $s."=?".$email_charset."?Q?".$line."?=\r\n";
          break;
        }
        //don't split line around coded character (eg. '=20' == <space>)
        if($pos = strrpos(substr($line, ($len - 3 ), 3 ), "=" ) ) {
          //coded characters within split zone - adjust to avoid splitting encoded word
          $split = ($len - 3 ) + $pos - 1;
          $line_out .= $s."=?".$email_charset."?Q?".substr($line, 0, $split)."?=\r\n";
          $line = substr($line, $split );
        }
        else{
          //no coded characters in split zone - safe to split here
          $line_out .= $s."=?".$email_charset."?Q?".substr($line, 0, $len )."?=\r\n";
          $line = substr($line, $len );
        }
      //start additional lines with <space> (RFC 2047)
      $s = " ";
      }
      $subject = $line_out;
      break;
  }

return $subject;
}

//
//function to do SMTP AUTH
//

function smtp_auth($connection) {

  global $MAIL_USER, $MAIL_PASSWORD;

  fputs($connection, "AUTH LOGIN\r\n" );
  if(response($connection) != "334" )
      debug("AUTH not accepted by SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //send username
  fputs($connection, base64_encode($MAIL_USER )."\r\n" );
  if(response($connection) != "334" )
    debug("Username not accepted SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //send password
  fputs($connection, base64_encode($MAIL_PASSWORD )."\r\n" );
  if(response($connection) != "334" )
    debug("Password not accepted SMTP server at $host <br /><br />Response from SMTP server was $res" );

  return;
}

//
//function to get a response from a SMTP command to the server
//

function response($connection) {

  global $res;

  $res = "";
  while($str = fgets($connection, 256 ) ) {
    $res .= $str;
    //if 4th character is <space> this is the last line (other lines have '-')
    if(substr($str, 3, 1) == " " )
      break;
  }
  $code = substr($res, 0, 3 );

  return $code;
}

//
// Email sending function
//

function email($to, $subject, $message ) {

  global $EMAIL_FROM, $EMAIL_REPLY_TO, $USE_EMAIL, $SMTP_HOST, $SMTP_AUTH,
         $email_charset, $email_encode, $body, $res, $bit8;

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
  if(response($connection ) != "220" )
    debug("Incorrect handshaking response from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //do extended hello (EHLO)
  fputs($connection, "EHLO ".$_SERVER["SERVER_NAME"]."\r\n" );
  //if EHLO not working, try the older HELO...
  if(response($connection ) != "250" ) {
    fputs($connection, "HELO ".$_SERVER["SERVER_NAME"]."\r\n" );
    if(response($connection ) != "250" )
      debug("Incorrect HELO response from SMTP server at $host <br /><br />Response from SMTP server was $res" );
  }
  //see if server is offering 8bit mime capability
  $bit8 = false;
  if( ! strpos($res, "8BITMIME" ) === false )
    $bit8 = true;


  //do SMTP_AUTH if required
  if($SMTP_AUTH == "Y" )
    smtp_auth($connection);

  //arrange message - and set email encoding
  //(we *must* do this before 'MAIL FROM:'  to get the email encoding correct)
  $message = message($message );
  //arrange subject
  $subject = subject($subject );

  //envelope from
  fputs($connection, "MAIL FROM: <$EMAIL_FROM>$body\r\n" );
  if(response($connection) != "250" )
    debug("Incorrect response to MAIL FROM command from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //envelope to
  $address_list = explode(",", $to );
  foreach($address_list as $email_to ) {
    fputs($connection, "RCPT TO: <".trim($email_to ).">\r\n" );
    switch(response($connection) ) {
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
  if(response($connection) != "354" )
    debug("Incorrect response to DATA command from SMTP server at $host <br /><br />Response from SMTP server was $res" );

  //send the date - in RFC 822 format
  fputs($connection, "Date: ".date("r")."\r\n" );

  //now the prepare the 'to' header

  //headers longer than 998 characters are broken up to separate lines (RFC 821)
  // (end long line with \r\n, and begin new line with \t)
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

  //  early PHP versions need to have the random number generator seeded first
  if(version_compare(PHP_VERSION, "4.2.0" ) == -1 )
    mt_srand(hexdec(substr(md5(microtime() ), -8 ) ) & 0x7fffffff );

  $uniq_id = md5(mt_rand() );

  //assemble remaining message headers (RFC 821 / RFC 2045)

  $headers = array("From: ".$EMAIL_FROM."\r\n",
                    "Reply-To: ".$EMAIL_REPLY_TO."\r\n",
                    "Subject: ".$subject,
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

  //explode message body into separate lines
  $lines_out = explode("\n", $message );
  //send message to server (with correct end-of-line \r\n)
  while(list(,$line_out) = @each($lines_out ) ) {
    fputs($connection, "$line_out\r\n" );
  }

  //ok all the message data has been sent - finish with a period on it's own line
  fputs($connection, ".\r\n" );
  if(response($connection) != "250" )
    debug("Error sending data<br /><br />Response from SMTP server  at $host was $res" );

  //say bye bye
  fputs($connection, "QUIT\r\n" );
  if(response($connection) != "221" )
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
