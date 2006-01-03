<?php
/*
  $Id$

  (c) 2002 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Serves some common things

*/



//set character set encoding to be used
if(! defined('CHARACTER_SET') )
  define('CHARACTER_SET', 'UTF-8' );

if(! mb_internal_encoding('UTF-8') ) {
  error("Internal encoding", "Unable to set UTF-8 encoding in PHP" );
}

//
// Input validation (single line input)
//
function safe_data($body ) {

  //return null for nothing input
  if(ctype_space($body) ) {
    return '';
  }

  //validate characters & remove whitespace
  $body = trim(validate($body) );

  //limit line length for single line entries
  //  strlen() is _much_ faster than mb_strlen() or mb_substr()
  if(strlen($body) > 100 )
    $body = mb_substr($body, 0, 100 );

  //clean up for database
  $body = clean_up($body );

return $body;
}

//
// Input validation (multiple line input)
//
function safe_data_long($body ) {

  //return null for nothing input
  if(ctype_space($body) ) {
    return '';
  }

  //validate characters & remove whitespace
  $body = trim(validate($body) );

  //normalise line breaks from Windows & Mac to UNIX style '\n'
  $body = str_replace("\r\n", "\n", $body );
  $body = str_replace("\r", "\n", $body );
  //break up long non-wrap words
  $body = mb_ereg_replace('[^[:space:]]{100}', "\\0\n", $body );
  //clean up for database
  $body = clean_up($body );

return $body;
}

function validate($body ) {

  global $validation_regex;

  //we don't use magic_quotes
  if(get_magic_quotes_gpc() ) {
    $body = stripslashes($body );
  }

  //decode decimal HTML entities added by web browser
  //(convert up to U+10000)
  $body = preg_replace('/&#\d{2,5};/e', "mb_decode_numericentity('$0', array(0x0, 0x10000, 0, 0xfffff) )", $body );
  //decode hex HTML entities added by web browser
  $body = preg_replace('/&#x([a-fA-F0-7]{2,8});/e', "mb_decode_numericentity('&#'.hexdec('$1').';', array(0x0, 0x10000, 0, 0xfffff) )", $body );

  $max   = mb_strlen($body);
  $clean = '';
  //this size limiting hack is because preg_match_all() crashes on very long strings...
  for($i=0; $i < $max; $i=($i+1000) ) {

    $part = mb_substr($body, $i, 1000 );

    //allow only normal UTF-8 characters up to U+10000, which is the limit of 3 byte characters
    // (Neither MySQL nor PostgreSQL will accept UTF-8 characters beyond U+10000 )
    preg_match_all('/([\x09\x0a\x0d\x20-\x7e]'.                         // ASCII characters
                  '|[\xc2-\xdf][\x80-\xbf]'.                            // 2-byte UTF-8 (except overly longs)
                  '|\xe0[\xa0-\xbf][\x80-\xbf]'.                        // 3 byte (except overly longs)
                  '|[\xe1-\xec\xee\xef][\x80-\xbf]{2}'.                 // 3 byte (except overly longs)
                  '|\xed[\x80-\x9f][\x80-\xbf])+/', $part, $ar );       // 3 byte (except UTF-16 surrogates)

    $clean .= join('?', $ar[0] );
  }
  return $clean;
}

function clean_up($body ) {

  //prevent SQL injection
  $body = db_escape_string($body );
  //use HTML encoding, or add escapes '\' for characters that could be used for xss <script> or SQL injection attacks
      //for better xss protection (at the expense of ability to upload non-ASCII characters) add to $trans array '&'=>'&amp;'
  $trans = array(';'=>'\;', '<'=>'&lt;', '>'=>'&gt;', '+'=>'\+', '-'=>'\-', '='=>'\=', '%'=>'&#037;' );
  $body  = strtr($body, $trans );

  return $body;
}

//
//check for true positive integer values to max size limits of PHP
//
function safe_integer($integer ) {

  if(is_numeric($integer) && ((string)$integer === (string)intval(abs($integer ) ) ) ) {
    return true;
  }
  return false;
}

//
// single and double quotes in HTML edit fields are changed to HTML encoding (addslashes doesn't work for HTML)
//
function html_escape($body ) {

  $trans = array('"'=>'&quot;', "'"=>'&apos;' );

  return strtr($body, $trans );
}

//
// single quotes in javascript fields are escaped
// double quotes are changed to HTML (escaping won't work)
//
function javascript_escape($body ) {

  $trans = array('"'=>'&quot;', "'"=>"\\'" );

  return strtr($body, $trans );
}

//
// make web addresses and email addresses clickable
//
function html_links($body, $database_escape=0 ) {

  if(ctype_space($body) ) {
    return '';
  }
  $body = preg_replace('/\b[a-z0-9\.\_\-]+@[a-z0-9][a-z0-9\.\-]+\.[a-z\.]+\b/i', "<a href=\"mailto:$0\">$0</a>", $body );

  //data being submitted to a database needs ('$0') part escaped
  $escape = ($database_escape ) ? '\\' : '';

  $body = preg_replace('/((http|ftp)+(s)?:\/\/[^\s]+)/i', "<a href=\"$0\" onclick=\"window.open(".$escape."'$0".$escape."'); return false\">$0</a>", $body );
  return $body;
}

//
// Builds up an error screen
//
function error($box_title, $error ) {

  global $db_error_message;

  include_once(BASE.'lang/lang.php' );
  include_once(BASE.'includes/screen.php' );

  create_top('ERROR', 1 );

  if(NO_ERROR !== 'Y' ) {
    $content = "<div style=\"text-align : center\">".$error."</div>";
    new_box( $box_title, $content, 'boxdata', 'singlebox' );
  }
  else {
    new_box($lang['report'], $lang['warning'], 'boxdata2', 'singlebox' );
  }

  //get the post vars
  ob_start();
  print_r($_REQUEST );
  $post = ob_get_contents();
  ob_end_clean();

  //email to the error address
  $message = "Hello,\n This is the ".MANAGER_NAME." site and I have an error :/  \n".
            "\n\n".
            "Error message: ".$error."\n".
            "Database message: ".$db_error_message."\n".
            "User: ".UID_NAME." (".UID_EMAIL.")\n".
            "Component: ".$box_title."\n".
            "Page that was called: ".$_SERVER['SCRIPT_NAME']."\n".
            "Requested URL: ".$_SERVER['REQUEST_URI']."\n".
            "URL string: ".$_SERVER['QUERY_STRING']."\n".
            "Browser: ".$_SERVER['HTTP_USER_AGENT']."\n".
            "Time: ".date("F j, Y, H:i")."\n".
            "IP: ".$_SERVER['REMOTE_ADDR']."\n".
            "WebCollab version:".WEBCOLLAB_VERSION."\n".
            "POST variables: $post\n\n";

  if(EMAIL_ERROR != NULL ) {
    include_once(BASE.'includes/email.php' );
    email(EMAIL_ERROR, "ERROR on ".MANAGER_NAME, $message );
  }

  if(DEBUG === 'Y' ) {
    $content = nl2br($message);
    new_box("Error Debug", $content );
  }

  create_bottom();

  //do not return
  die;
}


//
// Builds up a warning screen
//
function warning($box_title, $message ) {

  global $lang;

  include_once(BASE.'lang/lang.php' );
  include_once(BASE.'includes/screen.php' );

  create_top($lang['error'], 1 );

  $content = "<div style=\"text-align : center\">".$message."</div>\n";
  new_box($box_title, $content, 'boxdata', 'singlebox' );

  create_bottom();

  //do not return
  die;
}

?>
