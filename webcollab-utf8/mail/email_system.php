#!/usr/bin/php
<?php
/*
  $Id$

  (c) 2005 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

// start of configuration
//-------------------------------------------

define('DATABASE_TYPE', 'mysql' );
define('DATABASE_NAME', 'test_utf8' );
define('DATABASE_USER', '-----' );
define('DATABASE_PASSWORD', '------' );
define('DATABASE_HOST', 'localhost' );
define('PRE', '' );

define('ABBR_MANAGER_NAME', 'WebCollab' );

define('SMTP_HOST', '' );
define('SERVER_NAME', '' );

define('CHARACTER_SET', 'utf-8' );
define('MYSQL_41', false );

define('DEBUG', false );

// end of configuration
//-------------------------------------------

//check for mail
$q = db_query('SELECT COUNT(id) AS count FROM '.PRE.'mail_spool' );
$row = fetch_row($q, 0 );

//exit for no mail in spool
if($row['count'] < 1 ) {
  exit(0);
}

//get mail parameters
$q   = db_query('SELECT email_from, reply_to FROM config' );
$row = @fetch_row($q, 0 );
define('EMAIL_FROM',     $row['email_from'] );
define('EMAIL_REPLY_TO', $row['reply_to'] );

//send mail
$q = db_query('SELECT id, mail_to, subject, message FROM '.PRE.'mail_spool' );

for($i=0 ; $row = @fetch_row($q, $i ) ; ++$i ) {
  $mailid  = $row['id'];
  //send email
  email(unserialize($row['mail_to']), $row['subject'], $row['message'] );
  //remove sent email from database spool
  db_query('DELETE FROM '.PRE.'mail_spool WHERE id = '.$row['id'] );
}

exit(0);

//-------------------------------------------

/*
Function List
=============
email		Main wrapper function
clean		Reinstate encoded html back to original text.
message		Prepare message body, and if necessary, 'base64' encode for SMTP transmission.
headers		Assemble message headers to RFC 822.
header_encoding	Check header line and 'base64' encode if required for SMTP transmission.
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
function email($to, $subject, $message ) {

  global $bit8, $connection, $log;

  $email_encode = '';
  $message_charset = '';
  $body = '';
  $bit8 = false;
  $pipelining = false;

  if(sizeof($to) == 0  ) {
    //no email address specified - end function
    return;
  }

  //remove duplicate addresses
  $to = array_unique((array)$to );

  //open an SMTP connection at the mail host
  $connection = @fsockopen(SMTP_HOST, 25, $errno, $errstr, 10 );
  $log = "Opening connection to ".SMTP_HOST."\n";
  if(! $connection ) {
    debug("Unable to open TCP/IP connection.\n\nReported socket error: ".$errno." ".$errstr."\n");
  }

  //sometimes the SMTP server takes a little longer to respond
  // Windows does not have support for this timeout function before PHP ver 4.3.0
  if(function_exists('socket_set_timeout') )
    @socket_set_timeout($connection, 10, 0 );

  if(strncmp('220', response(), 3 ) ) {
    debug();
  }

  //do extended hello (EHLO)
  fputs($connection, 'EHLO '.SERVER_NAME."\r\n" );
  $log .= "C: EHLO ".SERVER_NAME."\n";
  $capability = response();

  //if EHLO (RFC 1869) not working, try the older HELO (RFC 821)...
  if(strncmp('250', $capability, 3 ) ) {
    fputs($connection, "HELO ".SERVER_NAME."\r\n" );
    $log .= "C: HELO ".SERVER_NAME."\n";
    $capability = '';
    if(strncmp('250', response(), 3 ) )
      debug();
  }

  /*
  //do TLS if required (This is EXPERIMENTAL!!)
  if(TLS == 'Y' ) {
    $capability = starttls($connection, $capability );
  }

  //do SMTP_AUTH if required
  if(SMTP_AUTH == 'Y' ) {
    smtp_auth($connection, $capability );
  }
  */

  //see if server is offering 8bit mime capability & pipelining
  if( ! strpos($capability, '8BITMIME' ) === false ) {
    $bit8 = true;
  }

  if( ! strpos($capability, 'PIPELINING' ) === false ) {
    $pipelining = true;
  }

  //arrange message - and set email encoding to 8BITMIME if we need to
  //(we *must* do this before 'MAIL FROM:' in case we need to set encoding to suit the message body)
  $message_lines  =& message($message, $email_encode, $message_charset, $body );
  $header_lines   = headers($to, $subject, $email_encode, $message_charset );
  $count_commands = 0;

  //envelope from
  fputs($connection, 'MAIL FROM: <'.clean(EMAIL_FROM).'>'.$body."\r\n" );
  $log .= 'C: MAIL FROM: '.EMAIL_FROM." $body \n";
  ++$count_commands;

  if(! $pipelining ) {
    if(strncmp('250', response(), 3 ) ) {
      debug();
    }
  }

  //envelope to
  foreach((array)$to as $address ) {
    fputs($connection, 'RCPT TO: <'.trim(clean($address ) ).">\r\n" );
    $log .= 'C: RCPT TO: '.$address."\n";
    ++$count_commands;

    if(! $pipelining ) {
      if(strncmp('25', response(), 2 ) ){
        debug();
      }
    }
  }

  //start data transmission
  fputs($connection, "DATA\r\n" );
  $log .= "C: DATA\n";
  ++$count_commands;

  if(! $pipelining ) {
    if(strncmp('354', response(), 3 ) ) {
      debug();
    }
  }
  else {
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
  foreach(array('header_lines', 'message_lines' ) as $var ) {
    $log .= "C: Sending $var...\n";
    foreach(${$var} as $line_out ) {
      fputs($connection, "$line_out\r\n" );
    }
  }

  //ok all the message data has been sent - finish with a period on it's own line
  fputs($connection, ".\r\n" );
  $log .= "C: End of message\n";

  if(! $pipelining) {
    if(strncmp('250', response(), 3 ) ) {
      debug();
    }
  }

  //say bye bye
  fputs($connection, "QUIT\r\n" );
  $log .= "C: QUIT\n";

  if(! $pipelining) {
    if(strncmp('221', response(), 3 ) ) {
      debug();
    }
  }
  else {
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

function clean($encoded ) {

  //reinstate encoded html back to original text
  $text = @html_entity_decode($encoded, ENT_NOQUOTES, CHARACTER_SET );

  //reinstate decimal encoded html that html_entity_decode() can't handle...
  $text = preg_replace('/&#\d{2,5};/e', "utf8_entity_decode('$0')", $text );

  //characters previously escaped/encoded to avoid SQL injection/CSS attacks are reinstated.
  //$trans = array('\;'=>';', '\('=>'(', '\)'=>')', '\+'=>'+', '\-'=>'-', '\='=>'=' );
  //$text = strtr($text, $trans );

  //remove any dangerous tags that exist after decoding
  $text = preg_replace('/(<\/?\s*)(APPLET|SCRIPT|EMBED|FORM|\?|%)(\w*|\s*)([^>]*>)/i', "\\1****\\3\\4", $text );

  return $text;
}

//
//function to prepare and encode message body for transmission
//

function & message($message, & $email_encode, & $message_charset, & $body ) {

  global $bit8;

  //clean up message
  $message = clean($message );
  //check if message contains multi-byte characters and set encoding to match mailer capabilities
  switch(preg_match('/([\177-\377])/', $message ) ) {
    case true:
      //we have special characters
      switch($bit8 ) {
        case true:
          //mail server has said it can do 8bit
          $email_encode = '8bit';
          $body = ' BODY=8BITMIME';
          $message_charset = CHARACTER_SET;
          break;
        case false:
          //old mail server - can only do 7bit mail
          $email_encode = 'base64';
          $body = '';
          $message_charset = CHARACTER_SET;
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

  //normalise end-of-lines (\r\n, \r ) in message body to \n - and change back to \r\n later
  $message = str_replace("\r\n", "\n", $message );
  $message = str_replace("\r", "\n", $message );
  //make sure message ends in a new line \n
  $message = $message."\n";

  //encode message body
  switch(strtolower($email_encode ) ){
    case '7bit':
    case '8bit':
      //break up any lines longer than 998 bytes (RFC 821)
      $message = wordwrap($message, 998, "\n", 1 );
      break;

    case 'base64':
    default:
      $message = base64_encode($message );
      //break into chunks of 76 characters per line (RFC 2045)
      $message = chunk_split($message, 76, "\n" );
      break;

  }

  //lines starting with "." get an additional "." added. (RFC 2821 - 4.5.2)
  $message = preg_replace('/^[\.]/m', '..', $message );
  //explode message body into separate lines
  $message_lines = explode("\n", $message );

return $message_lines;
}

//
//function to assemble mail headers
//

function headers($to, $subject, $email_encode, $message_charset ) {

  //set the date - in RFC 822 format
  $headers  = array('Date: '.date('r') );
  //clean return addresses
  $from     = clean(EMAIL_FROM);
  $reply_to = clean(EMAIL_REPLY_TO);

  //get rid of any line breaks (\r\n, \n, \r) in subject line
  $subject = str_replace(array("\r\n", "\r", "\n"), ' ', $subject );
  //reinstate any HTML in subject back to text
  $subject = clean($subject );

  //now the prepare the 'to' header
  $line   = 'To:'.join(', ', (array)$to );
  //lines longer than 998 characters are broken up to separate lines (RFC 821)
  // (end long line with \r\n, and begin new line with \t)
  while(strlen($line ) > 998 ) {
    $pos = strrpos(substr($line, 0, 998 ), ' ' );
    $headers[] = substr($line, 0, $pos );
    $line = "\t".substr($line, $pos + 1 );
  }
  $headers[] = $line;
  //'from' header
  $headers = array_merge($headers, header_encoding('From :', ABBR_MANAGER_NAME, '<'.$from.'>' ) );
  //reply to
  $headers[] = 'Reply-To: '.$reply_to;
  //'subject' header
  $headers = array_merge($headers, header_encoding('Subject :', $subject, '' ) );
  //assemble remaining message headers (RFC 821 / RFC 2045)
  $headers[] = 'Message-Id: <'.md5(mt_rand()).'@'.SERVER_NAME.'>';
  $headers[] = 'X-Mailer: WebCollab (PHP/'.phpversion().')';
  $headers[] = 'X-Priority: 3';
  $headers[] = 'X-Sender: '.$reply_to;
  $headers[] = 'Return-Path: <'.$reply_to.'>';
  $headers[] = 'Mime-Version: 1.0';
  $headers[] = 'Content-Type: text/plain; charset='.$message_charset;
  $headers[] = 'Content-Transfer-Encoding: '.$email_encode;
  $headers[] = '';

return $headers;
}

//
//function to encode mail headers with 'quoted printable'
//

function header_encoding($header_type, $header, $header_suffix='' ) {

  //encode subject with 'printed-quotable' if high ASCII characters are present
  switch(preg_match('/([\177-\377])/', $header ) ) {
    case false:
      //no encoding required
      $header_lines = array(substr($header_type .$header .$header_suffix, 0, 985 ) );
      break;

    case true:
      //base64 encoding
      $line = base64_encode($header );
      //format follows RFC 2047
      $s = $header_type;
      //lines are no longer than 76 characters including '?' and '='
      //  76 - 10[=?UTF-8?B?] - 2[?=] = 64 encoded characters per line
      //  - any additional new lines start with <space>
      //  - each encoded line portion is rounded to multiple of 4 octets
      $max_len = floor((76 - (strlen(CHARACTER_SET) + 5 ) - 2) / 4 ) * 4;
      while(strlen($line) > $max_len ) {
        $header_lines[] = $s."=?".CHARACTER_SET."?B?".substr($line, 0, $max_len )."?=";
        $line = substr($line, $max_len );
        $s = ' ';
      }
      //output any remaining line (will be less than $max_len characters long)
      $header_lines[] = $s."=?".CHARACTER_SET."?B?".$line."?= ".$header_suffix;
      break;
  }
  return $header_lines;
}

//
//function to get a response from a SMTP command to the server
//

function response() {

  global $connection, $log;

  $res = '';

  while($str = fgets($connection, 256 ) ) {
    $res .= $str;
    $log .= 'S : '.$str;

    //<space> after three digit code indicates this is last line of data ("-" for more lines)
    if(strpos($str, ' ' ) == 3 ) {
      break;
    }
  }

  return $res;
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

      //set character set if MySQL > 4.1
      if(MYSQL_41 ) {
        db_encoding();
      }

      //select database
      if( ! @mysql_select_db(DATABASE_NAME, $database_connection ) ) {
        fwrite(STDERR, "No connection to database tables\n");
        //echo "No connection to database tables\n";
        die;
      }
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
//sets the required client encoding to the mysql/pgsql client
//
function db_encoding() {

  global $database_connection;

  switch(strtoupper(CHARACTER_SET ) ) {

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
      $my_encoding = 'utf8';
      $pg_encoding = 'UNICODE';
      break;

    case 'KOI8-R':
      $my_encoding = 'koi8r';
      $pg_encoding = 'KOI8';
      break;

    case 'WINDOWS-1251':
      $my_encoding = 'cp1251';
      $pg_encoding = 'WIN';
      break;

    default:
    case 'ISO-8859-1':
      $my_encoding = 'latin1';
      $pg_encoding = 'LATIN1';
      break;

  }

  //set character set
  if(DATABASE_TYPE == 'postgresql') {
    if(pg_set_client_encoding($database_connection, $pg_encoding ) == -1 ){
      fwrite(STDERR, "Database error with character encoding: ".pg_last_error($database_connection)."\n" );
      //echo "Database error with character encoding: ".pg_last_error($database_connection)."\n";
      die;
    }
  }
  else {
    if(! mysql_query('SET NAMES \''.$my_encoding.'\'', $database_connection ) ) {
      fwrite(STDERR, "Database error - unable to set ".CHARACTER_SET." client encoding" );
    }
  }
return;
}

//
//Debug logger
//
function debug($error="Bad response from SMTP server\n" ){

  global $connection, $mailid, $log;

  //check if socket timeout occurred
  $meta = @socket_get_status($connection);
  if($meta['timed_out'] ) {
    $error .= "\nSocket timeout has occurred";
  }

  if(DEBUG ) {
    fwrite(STDERR, $log );
  }

  //show error
  fwrite(STDERR, $error."\n" );

  $q = db_query("SELECT send_attempts FROM ".PRE."mail_spool WHERE id=".$mailid );
  $result = fetch_row($q, 0 );

  if($result['send_attempts'] > 6 ){
    db_query("DELETE FROM ".PRE."mail_spool WHERE id=".$mailid );
  }
  else {
  //log the attempt
  db_query("UPDATE ".PRE."mail_spool SET send_attempts=".($result['send_attempts'] + 1 ) );
  }
  exit(1);
}

?>