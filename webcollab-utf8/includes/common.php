<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Parts are based on original file written for CoreAPM by Dennis Fleurbaaij 2001/2002

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

require_once("path.php" );

include_once(BASE."config/config.php" );
include_once(BASE."lang/lang.php" );

//set UTF-8 character encoding to be used
if(! mb_internal_encoding("UTF-8") )
  error("Internal encoding", "Unable to set UTF-8 encoding in PHP" );

//
// Input validation (single line input)
//
function safe_data($body ) {
  
  //return null for nothing input
  if(empty($body) )
    return $body;
  
  //clean up & remove whitespace      
  $body = trim(clean_up($body) );
  
  //limit line length for single line entries
  //  strlen() is _much_ faster than mb_strlen() or mb_substr()  
  if(strlen($body) > 100 )
    $body = mb_substr($body, 0, 100 );
    
return $body;
}


//
// Input validation (multiple line input)
//
function safe_data_long($body ) {

  //return null for nothing input
  if(empty($body) )
    return $body;
    
  //clean up
  $body = clean_up($body);
    
  //normalise line breaks from Windows & Mac to UNIX style
  $body = str_replace("\r\n", "\n", $body );
  $body = str_replace("\r", "\n", $body );
  //break up long non-wrap words
  $body = preg_replace("/[^\s\n\t]{100}/u", "$0\n", $body );

return $body;
}

function clean_up($body ) {

  //allow only normal byte range of UTF-8 characters upto U+00010000
  preg_match_all('/([\x09\x0a\x0d\x20-\x7e]|'.
                   '[\xc0-\xdf][\x80-\xbf]|'.
                   '[\xe0-\xef][\x80-\xbf]{2})+/S', $body, $ar );

/*                 Remainder of range beyond U+00010000 are:   
                   '[\xf0-\xf7][\x80-\xbf]{3}'    (U-00010000 - U-001FFFFF)
                   '[\xf8-\xfb][\x80-\xbf]{4}'    (U-00200000 - U-03FFFFFF)
                   '[\xfc-\xfd][\x80-\xbf]{5}'    (U-04000000 - U-7FFFFFFF)
*/    
  $body = join("?", $ar[0] );
  
  //reject overly long UTF8 forms (lines 1, 2 & 3) and illegal UTF16 surrogates (lines 4 & 5)  
  $body = preg_replace('/([\xc0-\xc1][\x80-\xbf]|'.
                         '[\xe0][\x80-\x9f][\x80-\xbf]|'.
                         '[\xf0][\x80-\x8f][\x80-\xbf]{2}|'.
                         '[\xed][\xa0-\xbf][\x80-\xbf]|'.
                         '[\xef][\xbf][\xbe-\xbf])/S', "?", $body );
  
/*                      Remainder of overly long UTF8 above U+00010000  
                         '[\xf8][\x80-\x87][\x80-\xbf]{3}'
                         '[\xfc][\x80-\x83][\x80-\xbf]{4}'
*/
  
  //protect against database query attack
  if(! get_magic_quotes_gpc() )
    $body = addslashes($body );
        
  //use HTML encoding for characters that could be used for css <script> or SQL injection attacks
  $trans = array(';'=>'\;', '<'=>'&lt;', '>'=>'&gt;', '|'=>'&#124;', '('=>'&#040;', ')'=>'&#041;', '+'=>'&#043;', '-'=>'&#045;', '='=>'&#061;');
  
  return strtr($body, $trans ); 
  
}

//
// single and double quotes in HTML edit fields are changed to HTML encoding (addslashes doesn't work for HTML)
//
function html_escape($body ) {

  $trans = array('"'=>'&quot;', "'"=>'&apos;' );
    
  return strtr($body, $trans );
}

//
// single quotes in javascript fields are double escaped (PHP removes one of the escape characters)
// double quotes are changed to HTML (escaping won't work) 
// 
function javascript_escape($body ) {

  $trans = array('"'=>'&quot;', "'"=>"\\'" );
    
  return strtr($body, $trans );
}

//
// Builds up an error screen
//
function error($box_title, $content ) {

  global $uid_name, $uid_email, $db_error_message, $MANAGER_NAME, $DEBUG, $NO_ERROR, $WEBCOLLAB_VERSION;
  global $EMAIL_ERROR, $SMTP_AUTH;
  
  include_once(BASE."includes/screen.php" );
  
  create_top("ERROR", 1 );

  if($NO_ERROR != "Y" )
    new_box( $box_title, "<div style=\"text-align : center\">".$content."</div>", "boxdata", "singlebox" );
    else
    new_box($lang["report"], $lang["warning"], "boxdata2", "singlebox" );


  //get the post vars
  ob_start();
  print_r($_REQUEST );
  $post = ob_get_contents();
  ob_end_clean();


  //email to the error-catcher
  $message = "Hello,\n This is the $MANAGER_NAME site and I have an error :/  \n".
            "\n\n".
            "User that created the error: $uid_name ( $uid_email )\n".
            "The erroneous component: $box_title\n".
            "The error message: $content\n".
            "Database message: $db_error_message\n".
            "Page that was called: ".$_SERVER["SCRIPT_NAME"]."\n".
            "Called URL: ".$_SERVER["REQUEST_URI"]."\n".
            "Browser: ".$_SERVER["HTTP_USER_AGENT"]."\n".
            "Time: ".date("F j, Y, H:i")."\n".
            "IP: ".$_SERVER["REMOTE_ADDR"]."\n".
            "WebCollab version: $WEBCOLLAB_VERSION\n".
            "POST vars: $post\n\n";
  
  if($EMAIL_ERROR != NULL ){
    include_once(BASE."includes/email.php" );
    email($EMAIL_ERROR, "ERROR on $MANAGER_NAME", $message );
  }
        
  if($DEBUG == "Y" )
    new_box("Error Debug", nl2br($message) );

  create_bottom();

  //do not return as that would be futile
  die;
}


//
// Builds up a warning screen
//
function warning($box_title, $message ) {

  global $lang;

  include_once(BASE."includes/screen.php" );

  create_top($lang["error"], 1 );

  $content = "<div style=\"text-align: center\">$message</div>\n";

  new_box($box_title, $content, "boxdata", "singlebox" );

  create_bottom();

  //do not return as that would be futile
  die;
}

?>
