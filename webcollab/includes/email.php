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
// Email sending function
//

function email($to, $subject, $message ) {

  global $EMAIL_FROM, $EMAIL_REPLY_TO, $USE_EMAIL, $SMTP_HOST, $SMTP_AUTH, $MAIL_USER, $MAIL_PASSWORD;

  if($USE_EMAIL == "N" ) {
    //email is turned off in config file
    return;
  }

  if( ! valid_string($to) ) {
    //no email address specified - end function
    return;
  }

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

  //send HELO to server
  fputs($connection, "HELO ".$_SERVER["SERVER_NAME"]."\r\n" );
  $res = fgets($connection, 256 );
  if(substr($res, 0, 3 ) != "250" )
    debug("Incorrect HELO response from SMTP server at $host <br /><br />Response from SMTP server was $res" );

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
    $pos = strrpos(substr($line, 0, 998 ), " " );
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

  //we can reasonably assume that these headers will always be less than 998 characters per line
  //(subject line is truncated just to be sure)
  $headers = array("From: ".$EMAIL_FROM."\r\n",
                        "Reply-To: ".$EMAIL_REPLY_TO."\r\n",
                        "Subject: ".substr($subject, 0, 985 )."\r\n",
                        "Message-Id: <".$uniq_id."@".$_SERVER["SERVER_NAME"].">\r\n",
                        "X-Mailer: PHP/" . phpversion()."\r\n",
                        "X-Priority: 3\r\n",
                        "X-Sender: ".$EMAIL_REPLY_TO."\r\n",
                        "Return-Path: <".$EMAIL_REPLY_TO.">\r\n",
                        "Mime-Version: 1.0\r\n",
                        "Content-Type: text/plain; charset=us-ascii\r\n",
                        "Content-Transfer-Encoding: 7 bit\r\n \r\n");

  //send headers line by line
  for( $i=0; $i < 11; $i++ ) {
    fputs($connection, $headers[$i] );
  }

  // according to rfc 821 we should not send more than 998 characters on a single line
  // thanks to phpmailer for this code...

  //normalise the line breaks so we know the explode works
  $message = str_replace("\r\n", "\n", $message );
  $message = str_replace("\r", "\n", $message );
  $all_lines = explode("\n", $message );

  while(list(,$line ) = @each($all_lines ) ) {
    $lines_out = "";
    //check if we need to break this line up into several smaller lines
    while(strlen($line) > 998 ) {
      $pos = strrpos(substr($line, 0, 998 ), " " );
      $lines_out[] = substr($line, 0, $pos );
      $line = substr($line, $pos + 1 );
    }
    $lines_out[] = $line;

    //now send the lines to the server
    while(list(,$line_out) = @each($lines_out ) ) {
      if(strlen($line_out) > 0 ){
        // for lines starting with . add another .
        if(substr($line_out, 0, 1 ) == "." ) {
          $line_out = "." . $line_out;
        }
      }
      fputs($connection, "$line_out\r\n" );
    }
  }

  // ok all the message data has been sent - finish with a period on it's own line
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
