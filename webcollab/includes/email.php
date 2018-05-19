<?php
/*
  $Id$

  (c) 2003 - 2014 Andrew Simpson <andrewnz.simpson at gmail.com>

  WebCollab
  ---------------------------------------
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

  Refer to RFC 821 (RFC 2821), RFC 822 (RFC 2822) for basic SMTP.
  Refer to RFC 6152 for 8BITMIME
  Refer to RFC 1869 for extended hello (EHLO)
  Refer to RFC 2045 for mime types
  Refer to RFC 2047 for handling 8bit headers
  Refer to RFC 2076 for a useful summary of common headers
  Refer to RFC 2920 for command pipelining
*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/admin_config.php' );

//
// Main function
//

function email($to, $subject, $message ) {

  if(USE_EMAIL === 'N' ) {
    //email is turned off in config file
     return;
   }

  //remove duplicate addresses
  $to = array_unique((array)$to );
  
  // remove null email addresses
  while(! array_search( '', $to ) === false ) {
    $key = array_search( '', $to );
    unset($to[($key)] );
  }

  if(sizeof($to) == 0  ) {
    //no email address specified - end function
    return;
  }

  switch(MAIL_TRANSPORT ) {

    case 'SMTP':
      smtp_mail($to, $subject, $message );
      break;

    case 'PHPMAIL':
      php_mail($to, $subject, $message );
      break;

    default:
      error('Mail transport error', 'Mail transport selected is invalid' );
      return;
      break;
    }

  return;
}

//
// SMTP email sending function
//

function smtp_mail($to, $subject, $message ) {

  global $connection, $log;

  $email_encode = '';
  $message_charset = '';
  $body = '';
  $bit8 = false;
  $pipelining = false;

  if( (SMTP_AUTH === 'Y') || (TLS === 'Y') ){
    include_once(BASE.'includes/smtp_auth.php' );
  }

  //open an SMTP connection at the mail host
  $connection = @fsockopen(SMTP_HOST, SMTP_PORT, $errno, $errstr, 10 );
  $log = "Opening connection to ".SMTP_HOST." on port ".SMTP_PORT."\n";
  if (!$connection )
    debug("Unable to open TCP/IP connection.\n\nReported socket error: ".$errno." ".$errstr."\n");

  //sometimes the SMTP server takes a little longer to respond
  stream_set_timeout($connection, 10, 0 );

  if(strncmp('220', response(), 3 ) ) debug();

  //do extended hello (EHLO)
  fputs($connection, 'EHLO '.$_SERVER['SERVER_NAME']."\r\n" );
  $log .= "C: EHLO ".$_SERVER['SERVER_NAME']."\n";
  $capability = strtoupper(response() );

  //if EHLO (RFC 1869) not working, try the older HELO (RFC 821)...
  if(strncmp('250', $capability, 3 ) ) {
    fputs($connection, "HELO ".$_SERVER['SERVER_NAME']."\r\n" );
    $log .= "C: HELO ".$_SERVER['SERVER_NAME']."\n";
    $capability = '';
    if(strncmp('250', response(), 3 ) ) debug();
  }

  //do TLS if required
  if(TLS === 'Y' ) {
    $capability = starttls($connection, $capability );
  }

  //do SMTP_AUTH if required
  if(SMTP_AUTH === 'Y' ) {
    smtp_auth($connection, $capability );
  }

  //see if server is offering 8bit mime capability & pipelining
  if( ! strpos($capability, '8BITMIME' ) === false ) {
    $bit8 = true;
    $log .= "8BITMIME is available...\n";
  }

  if( ! strpos($capability, 'PIPELINING' ) === false ) {
    $pipelining = true;
    $log .= "Starting to pipeline data...\n";
  }

  //arrange message - and set email encoding to 8BITMIME if we need to
  //(we *must* do this before 'MAIL FROM:' in case we need to set encoding to suit the message body)
  $message_lines  =& message($message, $email_encode, $message_charset, $body, $bit8 );
  $header_lines   = headers($to, $subject, $email_encode, $message_charset );
  $count_commands = 0;

  //envelope from
  $addr = clean(EMAIL_FROM);
  $out  = 'MAIL FROM: <'.$addr.'>'.$body."\r\n";
  $log .= 'C: MAIL FROM: '.$addr.' '.$body."\r\n";
  $pipeline = $out;
  ++$count_commands;

  if(! $pipelining ) {
    fputs($connection, $out );
    if(strncmp('250', response(), 3 ) ) debug();
  }

  //envelope to
  foreach((array)$to as $address ) {
    $addr = trim(clean($address ) );
    $out  = 'RCPT TO: <'.$addr.">\r\n";
    $log .= 'C: RCPT TO: '.$addr."\r\n";
    $pipeline .= $out;
    ++$count_commands;

    if(! $pipelining ) {
      fputs($connection, $out );
      if(strncmp('25', response(), 2 ) ) debug();
    }
  }

  //start data transmission
  $out  = "DATA\r\n";
  $log .= 'C: '.$out;
  $pipeline .= $out;
  ++$count_commands;

  if(! $pipelining ) {
    fputs($connection, $out );
    if(strncmp('354', response(), 3 ) ) debug();
  }
  else {
    //send the pipeline queued commands....
    fputs($connection, $pipeline );

    //we have been pipelining ==> roll back & check the server responses
    for($i=0 ; $i<$count_commands ; ++$i ) {

      switch(substr(response(), 0, 3 ) ) {
        case '250':
        case '251':
          //correct response for most commands
          break;

        case '354':
          //correct response for final DATA command
          if($i == ($count_commands - 1 ) ){
            break(2);
          }
          else {
            debug('Pipelining: Bad response to DATA' );
          }
          break;

        default:
          //anything else is no good
          debug('Pipelining: Bad response to MAIL FROM or RCPT TO');
      }
    }
  }

  //send headers & message to server (with correct end-of-line \r\n)
  $log .= "C: Sending header lines...\n";
  fputs($connection, $header_lines."\r\n" );
  $log .= "C: Sending message lines...\n";
  fputs($connection, $message_lines."\r\n" );

  //ok all the message data has been sent - finish with a period on it's own line
  $out  = ".\r\n";
  $log .= "C: End of message\n";
  $pipeline = $out;

  if(! $pipelining) {
    fputs($connection, $out );
    if(strncmp('250', response(), 3 ) ) debug();
  }

  //say bye bye
  $out = "QUIT\r\n";
  $log .= 'C: '.$out;
  $pipeline .= $out;

  if(! $pipelining) {
    fputs($connection, $out );
    if(strncmp('221', response(), 3 ) ) debug();
  }
  else {
    fputs($connection, $pipeline );

    if(strncmp('250', response(), 3 ) ) {
      debug('Pipelining: Bad response to end of message');
    }
    if(strncmp('221', response(), 3 ) ) {
      debug('Pipelining: Bad response to QUIT');
    }
  }

  fclose($connection );

  return;
}

//
// PHP mail() email sending function
//

function php_mail($to, $subject, $message ) {

  $to = join(', ', (array)$to );

  //set language
  mb_language('uni');

  $headers = "From: ". header_encoding(ABBR_MANAGER_NAME ). "<".clean(EMAIL_FROM).">\n".
             "Reply-To: ".clean(EMAIL_REPLY_TO)."\n".
             "X-Mailer: WebCollab ".WEBCOLLAB_VERSION." (PHP/".phpversion().")\n";

  if(! mb_send_mail($to, $subject, $message, $headers ) ) {
    error('Mail error', 'Unknown error in PHP mail() function' );
  }

return;
}

/*
Function List
=============
clean		Reinstate encoded html back to original text.
message		Prepare message body, and if necessary, 'quoted-printable' encode for SMTP transmission.
headers		Assemble message headers to RFC 822.
header_encoding	Check header line and 'quoted printable' encode if required for SMTP transmission.
response	Get response to client command from the connected SMTP server.
debug		Debug!
*/

//
//function to reinstate html in text and remove any dangerous html scripting tags
//

function & clean($text ) {

  //characters previously escaped/encoded to avoid SQL injection/CSS attacks are reinstated.
  $text = @html_entity_decode($text, ENT_QUOTES , 'UTF-8' );

  //remove any dangerous tags that exist
  $text = preg_replace("/(<\/?\s*)(APPLET|SCRIPT|EMBED|FORM|\?|%)(\w*|\s*)([^>]*>)/i", "\\1****\\3\\4", $text );

  return $text;
}

//
//function to prepare and encode message body for transmission
//

function & message($message, & $email_encode, & $message_charset, & $body, $bit8 ) {

  //clean up message
  $message = clean($message );

  //normalise end-of-lines (\r\n, \r, \n ) in message body to \r\n (RFC 2821)
  $message = str_replace("\r\n", "\n", $message );
  $message = strtr($message, array("\n" => "\r\n", "\r" => "\r\n" ) );

  //check if message contains high bit ascii characters and set encoding to match mailer capabilities
  switch(preg_match('/([\x7F-\xFF])/', $message ) ) {
  
    case true:
      //we have special characters
      switch($bit8 ) {
      
        case true:
          //mail server has said it can do 8bit
          $email_encode = '8bit';
          $message_charset = 'UTF-8';
          $body = ' BODY=8BITMIME';
          break;

        case false:
          //old mail server - can only do 7bit mail
          $email_encode = 'quoted-printable';
          $message_charset = 'UTF-8';
          $body = '';
          
          //replace high ascii, control and = characters (RFC 2045)
          $message = preg_replace_callback('/([\x00-\x08\x0B\x0C\x0E-\x1F\x3D\x7F-\xFF])/', create_function('$char', 'return sprintf("=%02X", ord($char[1] ) );' ), $message);

          //break into lines no longer than 76 characters including '=' at line end for soft line breaks (RFC 2045)
          //  (Adjust to avoid splitting encoded words and '\r\n' over two lines )
          $message = preg_replace_callback('/([^\r\n]{1,71}[^=]([^=\r]))/', create_function('$str', 'return ($str[2] == "\n" ) ? $str[1] : $str[1]."=\r\n";' ), $message );

          //replace spaces and tabs when it's the last character on a (hard break) line (RFC 2045)
          $message = strtr($message, array("\t\r\n" => "=09\r\n", " \r\n" => "=20\r\n" ) );
          break;
        }
      break;

    case false:
      //no special characters ==> use 7bit
      $email_encode = '7bit';
      $message_charset = 'us-ascii';
      $body = '';
      break;
  }

  //break up any lines longer than 998 bytes (RFC 2821)
  $message = wordwrap($message, 998, "\r\n", true );
  //lines starting with "." get an additional "." added. (RFC 2821 - 4.5.2)
  $message = preg_replace('/^[\.]/m', '..', $message );

return $message;
}


//
//function to assemble mail headers
//

function headers($to, $subject, $email_encode, $message_charset ) {

  //set the date - in RFC 822 format
  $headers  = 'Date: '.date('r')."\r\n";
  //clean return addresses
  $from     = clean(EMAIL_FROM);
  $reply_to = clean(EMAIL_REPLY_TO);

  //now the prepare the 'to' header
  // lines longer than 998 characters are broken up to separate lines (RFC 2821)
  // (end long line with \r\n, and begin new line with \t)
  $headers .= 'To: '.wordwrap('<'.join('>, <', (array)$to ).'>', 990, "\r\n\t", false ) ."\r\n";

  //assemble remaining message headers (RFC 821 / RFC 2045)
  $headers .= "From: ". header_encoding(ABBR_MANAGER_NAME ). "<".$from.">\r\n".
              "Reply-To: <".$reply_to.">\r\n".
              "Subject: ".subject_encoding($subject )."\r\n".
              "Message-Id: <".sha1(mt_rand())."@".$_SERVER['SERVER_NAME'].">\r\n".
              "X-Mailer: WebCollab ".WEBCOLLAB_VERSION." (PHP/".phpversion().")\r\n".
              "X-Priority: 3\r\n".
              "X-Sender: <".$reply_to.">\r\n".
              "Return-Path: <".$reply_to.">\r\n".
              "MIME-Version: 1.0\r\n".
              "Content-Type: text/plain; charset=".$message_charset."\r\n".
              "Content-Transfer-Encoding: ".$email_encode."\r\n".
              "\r\n";

return $headers;
}

//
//function to encode mail headers with 'base64' or 'quoted printable' as required
//

function header_encoding($header ) {

  //encode subject with 'quoted printable' if high ASCII characters are present
  switch(preg_match('/([\x7F-\xFF])/', $header ) ) {
    case false:
      //no encoding required
      break;

    case true:
      //encode header to RFC 2047
      $preferences = array('input-charset' => 'UTF-8', 'output-charset' => 'UTF-8', 'line-length' => 76, 'line-break-chars' => "\r\n\t", 'scheme' => 'Q' );
      $header = iconv_mime_encode('', $header, $preferences );
      //strip the colon & space that iconv_mime_encode() adds as prefix...
      $header = ltrim($header, ' :' );
      
      break;
  }
  return $header;
}

function subject_encoding($subject ) {

  //limit line length
  $subject = substr($subject, 0, 500 );
  //reinstate any HTML in subject back to text
  $subject =& clean($subject );
  //get rid of any line breaks (\r\n, \n, \r) in subject line (RFC 2045)
  $subject = str_replace(array("\r\n", "\r", "\n"), ' ', $subject );
  //encode subject as required
  $subject = header_encoding($subject );

  return $subject;
}

//
//function to get a response from a SMTP command to the server
//

function response() {

  global $connection, $log;

  $response = '';

  while($str = fgets($connection, 256 ) ) {
    $response .= $str;
    $log .= 'S: '.$str;

    //<space> after three digit code indicates this is last line of data ("-" for more lines)
    if(strpos($str, ' ' ) == 3 ) {
      break;
    }
  }

  return $response;
}


 function debug($message='Bad response received'){

   global $connection, $log;

   if(DEBUG === 'Y' ) {
     $time_out = '';

     if($connection ) {
       $meta = stream_get_meta_data($connection);

       if($meta['timed_out'] ) {
         $time_out = '<br /><br />Socket timeout has occurred';
       }
     }
     //we don't use error() because email may not work!
     warning('Email error debug', nl2br($log).$message.$time_out );
   }
   else {
     warning('Internal email fault', "Not able to send your email.<br /><br />\n".
             "Please contact your administrator for more information.<br /><br />\n".
             "(Enable debugging in config.php for more detail)" );
   }
   return;
 }
?>