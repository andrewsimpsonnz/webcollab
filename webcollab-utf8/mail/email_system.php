#!/usr/bin/php
<?php
/*
  $Id$
  
  (c) 2003 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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

  ** Parts of this code inspired by phpmailer (Chris Ryan) and from contributed notes in PHP Manual under fsockopen.

  Refer to RFC 821 (RFC 2821), RFC 822 for basic SMTP.
  Refer to RFC 1652 for 8BITMIME
  Refer to RFC 1869 for extended hello (EHLO)
  Refer to RFC 2045 for mime types
  Refer to RFC 2047 for handling 8bit headers
  Refer to RFC 2076 for a useful summary of common headers

*/

$WEBCOLLAB_PATH = '/var/www/webcollab-unicode-devel';

require_once($WEBCOLLAB_PATH."/config/config.php" );

$q = db_query("SELECT COUNT(id) AS count FROM ".PRE."mail_spool" );
$row = fetch_row($q, 0 );

if($row['count'] < 1 )
  exit; 

$q = db_query("SELECT id, mail_to, subject, message, character_set FROM ".PRE."mail_spool" );

for($i=0 ; $row = @fetch_row($q, $i ) ; $i++ ){
  $mailid  = $row['id'];
  $charset = $row['character_set'];
  email($row['id'], $row['mail_to'], $row['subject'], $row['message'] );
}


/*
Function List
=============
email		Main wrapper function
clean		Reinstate encoded html back to original text.
message		Prepare message body, and if necessary, 'base64' encode for SMTP transmission.
subject		Check subject line and 'base64' encode if required for SMTP transmission.
headers		Assemble message headers to RFC 822.
response	Get response to client command from the connected SMTP server.
smtp_auth	Do SMTP AUTH authentication
db_query	Database query
fetch_row	Get database result row
db_encoding	Set database client encoding
debug		Debug logger
*/


//
// Email sending function
//
function email($mailid, $to, $subject, $message ){
  
  global $bit8, $connection;
  
  $bit8 = "";
  $connection = "";
  $email_encode = "";
  $message_charset = "";
  $body = "";
    
  if(strlen($to) == 0  ) {
    //no email address specified - end function
    return;
  }
  
  //open an SMTP connection at the mail host
  $connection = @fsockopen(SMTP_HOST, 25, $errno, $errstr, 10 );
  if (!$connection )
    debug("Unable to open TCP/IP connection to ".SMTP_HOST."<br /><br />Reported socket error: ".$errno." ".$errstr );
  
  //sometimes the SMTP server takes a little longer to respond
  // Windows does not have support for this timeout function before PHP ver 4.3.0
  if(function_exists('socket_set_timeout') )
    @socket_set_timeout($connection, 10, 0 );
  $res = response();
  if($res[1] != "220" )
    debug("Incorrect handshaking response from SMTP server at ".SMTP_HOST." <br /><br />Response from SMTP server was ".$res[0] );
  
  //do extended hello (EHLO)
  fputs($connection, "EHLO ".$_SERVER['SERVER_NAME']."\r\n" );
  //if EHLO not working, try the older HELO...
  $res = response();
  if($res[1] != "250" ) {
    fputs($connection, "HELO ".$_SERVER['SERVER_NAME']."\r\n" );
    $res = response();
    if($res[1] != "250" )
      debug("Incorrect HELO response from SMTP server at ".SMTP_HOST." <br /><br />Response from SMTP server was ".$res[0] );
  }
  //see if server is offering 8bit mime capability
  $bit8 = false;
  $cap = $res[0];
  if( ! strpos($cap, "8BITMIME" ) === false )
    $bit8 = true;
  
    //do SMTP_AUTH if required
    if(SMTP_AUTH == "Y" )
      smtp_auth($connection, $cap );
  
  $q = db_query("SELECT email_from, reply_to FROM ".PRE."config", 1 );
  $from = fetch_row($q, 0 );
  
  $email_from     = clean($from['email_from'] );
  $email_reply_to = clean($from['reply_to'] );
    
  //arrange message - and set email encoding
  //(we *must* do this before 'MAIL FROM:'  to get the email encoding correct)
  $message_lines =& message($message, $email_encode, $message_charset, $body, $email_from, $email_reply_to );
  
  //envelope from
  fputs($connection, "MAIL FROM: <".$email_from.">".$body."\r\n" );
  $res = response();
  if($res[1] != "250" )
    debug("Incorrect response to MAIL FROM command from SMTP server at ".SMTP_HOST." <br /><br />Response from SMTP server was ".$res[0] );
  
  //envelope to
  $address_list = explode(",", $to );
  foreach($address_list as $email_to ) {
    fputs($connection, "RCPT TO: <".trim(clean($email_to ) ).">\r\n" );
    $res = response();
    switch($res[1] ) {
      case "250":
      case "251":
        //acceptable responses
        break;
  
      case "450":
      case "550":
        //mail box error
        debug("Mailbox error for $email_to <br /><br />Response from SMTP server was ".$res[0] );
        break;
  
      default:
        //anything else is no good
        debug("Incorrect response to RCPT TO: ".$email_to." from SMTP server at ".SMTP_HOST." <br /><br />Response from SMTP server was ".$res[0] );
        break;
    }
  }
  
  //start data transmission
  fputs($connection, "DATA\r\n" );
  $res = response();
  if($res[1] != "354" )
    debug("Incorrect response to DATA command from SMTP server at ".SMTP_HOST." <br /><br />Response from SMTP server was ".$res[0] );
  
  //assemble the headers and message for transmission
  $message_lines = array_merge(headers($to, $subject, $email_encode, $message_charset, $email_from, $email_reply_to ), $message_lines );
  //send message to server (with correct end-of-line \r\n)
  while(list(,$line_out) = @each($message_lines ) ) {
    fputs($connection, "$line_out\r\n" );
  }
  
  //ok all the message data has been sent - finish with a period on it's own line
  fputs($connection, ".\r\n" );
  $res = response();
  if($res[1] != "250" )
    debug("Error sending data<br /><br />Response from SMTP server  at ".SMTP_HOST." was ".$res[0] );
  
  //say bye bye
  fputs($connection, "QUIT\r\n" );
  $res = response();
  if($res[1] != "221" )
    debug("Incorrect response to QUIT request from SMTP server at ".SMTP_HOST." <br /><br />Response from SMTP server was ".$res[0] );
  
  fclose($connection );
  
  //remove sent email from database spool
  db_query("DELETE FROM ".PRE."mail_spool WHERE id = ".$mailid );
  db_query("DELETE FROM ".PRE."mail_log WHERE mailid = ".$mailid );
}


//
//function to reinstate html in text and remove any dangerous html scripting tags
//
function & clean($encoded ) {

  global $charset;
  
  //reinstate encoded html back to original text
  $text = @html_entity_decode($encoded, ENT_NOQUOTES, $charset );
  
  //reinstate decimal encoded html that html_entity_decode() can't handle...
  $text = preg_replace('/&#\d{2,5};/e', "utf8_entity_decode('$0')", $text );
  
  //remove any dangerous tags that exist after decoding
  $text = preg_replace("/(<\/?\s*)(APPLET|SCRIPT|EMBED|FORM|\?|%)(\w*|\s*)([^>]*>)/i", "\\1****\\3\\4", $text );

  return $text;
}



//
//function to prepare and encode message body for transmission
//
function & message($message, & $email_encode, & $message_charset, & $body ) {

  global $bit8, $charset;

  //clean up message
  $message =& clean($message );
  //check if message contains multi-byte characters and set encoding to match mailer capabilities
  switch(preg_match('/([\177-\377])/', $message ) ) {
    case true:
      //we have special characters
      $message_charset = $charset;
      switch($bit8 ) {
        case true:
          //mail server has said it can do 8bit
          $email_encode = "8bit";
          $body = " BODY=8BITMIME";
          break;
        case false:
          //old mail server - can only do 7bit mail
          $email_encode = "base64";
          $body = "";
          break;
      }
      break;

    case false:
      //no special characters ==> use 7bit
      $email_encode = "7bit";
      $message_charset = "us-ascii";
      $body = "";
      break;
  }

  //normalise end-of-lines (\r\n, \r ) in message body to \n - and change back to \r\n later
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

    case "base64":
    default:
      $message = base64_encode($message );
      //break into chunks of 76 characters per line (RFC 2045)
      $message = chunk_split($message, 76, "\n" );
      break;

  }

  //lines starting with "." get an additional "." added. (RFC 2821 - 4.5.2)
  $message = preg_replace("/^[\.]/m", "..", $message );
  //explode message body into separate lines
  $message_lines = explode("\n", $message );

return $message_lines;
}


//
//function to prepare and encode the 'subject' line for transmission
//
function &subject($subject ) {

  global $email_charset;

  //get rid of any line breaks (\r\n, \n, \r) in subject line
  $subject = str_replace(array("\r\n", "\r", "\n"), " ", $subject );
  //reinstate any HTML in subject back to text
  $subject =& clean($subject );

  //encode subject with 'printed-quotable' if multi-byte characters are present
  switch(preg_match('/([\177-\377])/', $subject ) ) {
    case false:
      //no encoding required
      $subject_lines[] = ("Subject: ".substr($subject, 0, 985 ) );
      break;

    case true:
      //base64 encoding
      $line = base64_encode($subject );
      //format follows RFC 2047
      $s = "Subject: ";
      //lines are no longer than 76 characters including '?' and '=' 
      //  76 - 10[=?UTF-8?B?] - 2[?=] = 64 encoded characters per line 
      //  any additional new lines start with <space>   
      while(strlen($line) > 64 ) {
        $subject_lines[] = $s."=?".$charset."?B?".substr($line, 0, 64 )."?="; 
        $line = substr($line, 64 );
        $s = " ";
      }
      //output any remaining line (will be less than 64 characters long)
      $subject_lines[] = $s."=?".$charset."?B?".$line."?=";
      break;
  }

return $subject_lines;
}


//
//function to assemble mail headers
//
function headers($to, $subject, $email_encode, $message_charset, $email_from, $email_reply_to ) {
    
  //set the date - in RFC 822 format
  $headers = array("Date: ".date("r") );

  //now the prepare the 'to' header
  $line = "To: ".$to;
  //lines longer than 998 characters are broken up to separate lines (RFC 821)
  // (end long line with \r\n, and begin new line with \t)
  while(strlen($line ) > 998 ) {
    $pos = strrpos(substr($line, 0, 998 ), " " );
    $headers[] = substr($line, 0, $pos );
    $line = "\t".substr($line, $pos + 1 );
  }
  $headers[] = $line;
  //assemble remaining message headers (RFC 821 / RFC 2045)
  $headers[] = "From: WebCollab <".$email_from.">";
  $headers[] = "Reply-To: ".$email_reply_to;

  $headers = array_merge($headers, subject($subject ) );

  $headers[] = "Message-Id: <".uniqid("")."@".$_SERVER['SERVER_NAME'].">";
  $headers[] = "X-Mailer: WebCollab (PHP/".phpversion().")";
  $headers[] = "X-Priority: 3";
  $headers[] = "X-Sender: ".$email_reply_to;
  $headers[] = "Return-Path: <".$email_reply_to.">";
  $headers[] = "Mime-Version: 1.0";
  $headers[] = "Content-Type: text/plain; charset=".$message_charset;
  $headers[] = "Content-Transfer-Encoding: ".$email_encode;
  $headers[] = "";

return $headers;
}


//
//function to get a response from a SMTP command to the server
//
function response() {

  global $connection;

  $res[0] = "";
  while($str = fgets($connection, 256 ) ) {
    $res[0] .= $str;
    //<space> after three digit code indicates this is last line of data ("-" for more lines)
    if(substr($str, 3, 1) == " " )
      break;
  }
  $res[1] = substr($res[0], 0, 3 );

  //$res[0] is full response string from SMTP server
  //$res[1] is the 3 digit numeric code from the SMTP server

  return $res;
}


//
//smtp_auth
//
function smtp_auth($connection, $cap) {

   if(strpos($cap, "AUTH" ) === false )
        debug("SMTP server cannot do SMTP AUTH<br /><br />Capability response from SMTP server was ".nl2br($cap ) );

   //try plain auth
   if( ! strpos($cap, "PLAIN" ) === false ) {
     fputs($connection, "AUTH PLAIN\r\n" );
     $res = response();

     if($res[1] == "334" ) {
       //send username/password
       fputs($connection, base64_encode(MAIL_USER."\0".MAIL_USER."\0".MAIL_PASSWORD )."\r\n" );
       $res = response();
       if($res[1] != "235" )
         debug("Username/password not accepted SMTP server at ".SMTP_HOST." for AUTH PLAIN<br /><br />Response from SMTP server was ".$res[0] );

     return;
     }
   }

   //try auth login
   if( ! strpos($cap, "LOGIN" ) === false ) {
     fputs($connection, "AUTH LOGIN\r\n" );
     $res = response();

     if($res[1] == "334" ) {
       //send username
       fputs($connection, base64_encode(MAIL_USER )."\r\n" );
       $res = response();
       if($res[1] != "334" )
         debug("Username not accepted SMTP server at ".SMTP_HOST." for AUTH LOGIN<br /><br />Response from SMTP server was ".$res[0] );

       //send password
       fputs($connection, base64_encode(MAIL_PASSWORD )."\r\n" );
       $res = response();
       if($res[1] != "235" )
         debug("Password not accepted SMTP server at ".SMTP_HOST." for AUTH LOGIN<br /><br />Response from SMTP server was ".$res[0] );

       return;
       }
   }

   //try CRAM-MD5
   if( ! strpos($cap, "CRAM-MD5" ) === false ) {
     fputs($connection, "AUTH CRAM-MD5\r\n" );
     $res = response();

     if($res[1] == "334" ) {
       //$data is 'shared secret' sent by server
       $data = base64_decode(substr($res[0], 4 ) );
       $key = MAIL_PASSWORD;

       //the algorithm below does mhash() without needing the external mhash library to be installed on PHP
       if(strlen($key) > 64 ){
         $key = pack("H*", md5($key) );
       }
       $key  = str_pad($key, 64, chr(0x00) );
       $ipad = str_pad('', 64, chr(0x36) );
       $opad = str_pad('', 64, chr(0x5c) );
       $k_ipad = $key ^ $ipad ;
       $k_opad = $key ^ $opad;

       $mhash = md5($k_opad.pack("H*",md5($k_ipad.$data ) ) );

       fputs($connection, base64_encode(MAIL_USER." ".$mhash )."\r\n" );
       $res = response();
       if($res[1] != "235" )
         debug("CRAM-MD5 mhash not accepted SMTP server at ".SMTP_HOST." <br /><br />Response from SMTP server was ".$res[0] );

       return;
     }
   }

   debug("AUTH not accepted by SMTP server at ".SMTP_HOST." <br /><br />Capability response from SMTP server was ".nl2br($cap) );

   return;
}


//
//Database query
//
function db_query($query ) {

  global $database_connection;
  
  switch(DATABASE_TYPE ){
  
  case 'mysql':
  case 'mysql-innodb':
    if( ! $database_connection ) {
   
      //make connection
      if( ! ($database_connection = @mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD  ) ) ) {
        fwrite(STDERR, "Cannot connect to database server\n");
        //echo "Cannot connect to database server\n";
        die;
      }
  
      //select database
      if( ! @mysql_select_db(DATABASE_NAME, $database_connection ) ) {
        fwrite(STDERR, "No connection to database tables\n");
        //echo "No connection to database tables\n";
        die;
      }
      
      //set the client encoding  
      db_encoding();
    }
      
    //do it
    if( ! ($result = @mysql_query( $query, $database_connection ) ) ) {
      fwrite(STDERR, "Database error: ".mysql_error($database_connection)."\n" );
      //echo "Database error: ".mysql_error($database_connection)."\n";
      die;
    }
    break;
  
  case 'postgresql':
    if( ! $database_connection ) {
      //set initial value
      $host = "";
      //now adjust if necessary
      if(DATABASE_HOST != "localhost" )
        $host = "host=".DATABASE_HOST;
  
      if( ! ($database_connection = @pg_connect("$host user=".DATABASE_USER." dbname=".DATABASE_NAME." password=".DATABASE_PASSWORD ) ) ) {
        fwrite(STDERR, "No database connection\n");
        //echo "No database connection\n";
        die;
      }
  
      //make sure dates will be handled properly by internal date routines
      pg_query($database_connection, "SET DATESTYLE TO 'European, ISO'");
      
      //get server encoding
      $q = @pg_query($database_connection, 'SHOW SERVER_ENCODING' );
      
      //SQL_ASCII is not encoded, other server encodings need to be corrected by the PostgreSQL client
      if(pg_num_rows($q ) > 0 ){
        if(pg_fetch_result($q, 0, 0 ) != 'SQL_ASCII' ) { 
          db_encoding();
        }
      }
      else {
        //prior to version 7.4 a 'notice' is used instead of a query result
        $notice = @pg_last_notice($database_connection );   
        if(strpos($notice, 'encoding' ) && (strpos($notice, 'SQL_ASCII' ) === false ) ){
          db_encoding();
        }
      }    
    }
    //do it
    if( ! ($result = @pg_query($database_connection, $query ) ) ) {
      fwrite(STDERR, "Database error: ".pg_last_error($database_connection)."\n" );
      echo "Database error: ".pg_last_error($database_connection)."\n";
      die;
    }  
    break;
    
  default:
    fwrite(STDERR, "No database type specified\n" );
    //echo "No database type specified\n";
    die;
    break;
  }
  
  return $result;
}


//
//Fetch database result row
//
function fetch_row($q, $row ){

  switch(DATABASE_TYPE ){
  
  case 'mysql':
  case 'mysql-innodb':
    $result_row = mysql_fetch_array($q, MYSQL_ASSOC );
    break;
     
  case 'postgresql':  
    $result_row = pg_fetch_array($q, $row, PGSQL_ASSOC );
    break; 
  }
  return $result_row;
}


//
//sets the required client encoding to the mysql client
//
function db_encoding() {

  global $database_connection, $charset;

  switch(strtoupper($charset ) ) {

    case 'EUC_JP':
      $my_encoding = 'ujis';
      $pg_encoding = 'EUC_JP';
      break;
    
    case 'EUC_CN':
      $my_encoding = 'gb2312';
      $pg_encoding = 'EUC_CN';
      break;
      
    case 'EUC_KR':
      $my_encoding = 'euckr';
      $pg_encoding = 'EUC_KR';
      break;
                     
    case 'UTF-8':
    default:  
      $my_encoding = 'utf8';
      $pg_encoding = 'UNICODE';
      break; 
  }      

  //set character set
  switch(DATABASE_TYPE) {
    case 'mysql':
    case 'mysql-innodb':
      if(! mysql_query("SET NAMES '".$my_encoding."'", $database_connection ) ){
        fwrite(STDERR, "Database error with character encoding: ".mysql_error($database_connection)."\n" );
        //echo "Database error with character encoding: ".mysql_error($database_connection)."\n";
      }
      break; 
    
    case 'postgresql':  
      if(pg_set_client_encoding($database_connection, $pg_encoding ) == -1 ){ 
        fwrite(STDERR, "Database error with character encoding: ".pg_last_error($database_connection)."\n" );
        //echo "Database error with character encoding: ".pg_last_error($database_connection)."\n";
      }  
      break;
  }
return;
}

//
//Debug logger
//
 function debug($error ){

  global $connection, $mailid;

  //check if socket timeout occurred 
  $meta = @socket_get_status($connection);
  if($meta['timed_out'] )
    $error .= "<br /><br />Socket timeout has occurred";

  //log the problem
  db_query("INSERT INTO ".PRE."mail_log(mailid, message, log_time) VALUES(".$mailid.", $error, now() )" );
  
  //check for too many recurring errors
  $q = db_query("SELECT COUNT(*) FROM ".PRE."mail_log WHERE id= ".$row['id'] );
  $result = fetch_row($q, 0 );
  
  if($result[0] > 6 ){
    db_query("DELETE FROM ".PRE."mail_spool WHERE mailid = ".$row['id'] );
    db_query("INSERT INTO ".PRE."mail_log(mailid, message, log_time) VALUES(".$row['id'].", 'Too many mail errors, deleting from mail spool', now() )" );
  }
              
  return;
}
 
?>