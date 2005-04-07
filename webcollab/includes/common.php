<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//
// Input validation (single line input)
//
function safe_data($body ) {
  
  //return null for nothing input
  if(empty($body) )
    return '';
  
  //we don't use magic_quotes
  if(get_magic_quotes_gpc() )
    $body = stripslashes($body );
  
  //remove whitespace      
  $body = trim($body );  

  //limit line length for single line entries
  if(strlen($body ) > 100 )
    $body = substr($body, 0, 100 );
  
  $body = clean_up($body);
   
return $body;
}


//
// Input validation (multiple line input)
//
function safe_data_long($body ) {

  //return null for nothing input
  if(empty($body) )
    return '';
  
  //we don't use magic_quotes
  if(get_magic_quotes_gpc() )
    $body = stripslashes($body );
      
  //normalise line breaks from Windows & Mac to UNIX style
  $body = str_replace("\r\n", "\n", $body );
  $body = str_replace("\r", "\n", $body );
  //break up long non-wrap words
  $body = preg_replace("/[^\s\n\t]{100}/", "$0\n", $body );

  $body = clean_up($body);

return $body;
}

function clean_up($body ) {
  
  global $validation_regex;
  
  //allow only normal printing characters valid for the character set in use
  $body = preg_replace($validation_regex, '?', $body );
  //use HTML encoding, or add escapes '\' for characters that could be used for css <script> or SQL injection attacks
  $trans = array('\\'=>'\\\\', "'"=>"\'", '"'=>'\"', ';'=>'\;', '<'=>'&lt;', '>'=>'&gt;', '|'=>'&#124;', '('=>'\(', ')'=>'\)', '+'=>'\+', '-'=>'\-', '='=>'\=' );
  
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
// make web addresses and email addresses clickable
//
function html_links($body, $database_escape=0 ) {

  $body = preg_replace("/(([\w\-\.]+)@([\w\-\.]+)\.([\w]+))/", "<a href=\"mailto:$0\">$0</a>", $body );
  
  //data being submitted to a database needs ('$0') part escaped
  if($database_escape )    
    $body = preg_replace("/((http|ftp)+(s)?:\/\/[^\s]+)/i", "<a href=\"$0\" onclick=\"window.open(\'$0\'); return false\">$0</a>", $body );
  else
    $body = preg_replace("/((http|ftp)+(s)?:\/\/[^\s]+)/i", "<a href=\"$0\" onclick=\"window.open('$0'); return false\">$0</a>", $body );
    
  return $body;
}

//
// Builds up an error screen
//
function error($box_title, $content ) {

  global $db_error_message;
  
  include_once(BASE."includes/screen.php" );
  
  create_top("ERROR", 1 );

  if(NO_ERROR != "Y" )
    new_box( $box_title, "<div style=\"text-align : center\">".$content."</div>", "boxdata", "singlebox" );
    else
    new_box($lang['report'], $lang['warning'], "boxdata2", "singlebox" );


  //get the post vars
  ob_start();
  print_r($_REQUEST );
  $post = ob_get_contents();
  ob_end_clean();


  //email to the error-catcher
  $message = "Hello,\n This is the ".MANAGER_NAME." site and I have an error :/  \n".
            "\n\n".
            "User that created the error: ".UID_NAME." (".UID_EMAIL.")\n".
            "The erroneous component: $box_title\n".
            "The error message: $content\n".
            "Database message: $db_error_message\n".
            "Page that was called: ".$_SERVER['SCRIPT_NAME']."\n".
            "Called URL: ".$_SERVER['REQUEST_URI']."\n".
            "Browser: ".$_SERVER['HTTP_USER_AGENT']."\n".
            "Time: ".date("F j, Y, H:i")."\n".
            "IP: ".$_SERVER['REMOTE_ADDR']."\n".
            "WebCollab version:".WEBCOLLAB_VERSION."\n".
            "POST vars: $post\n\n";
  
  if(EMAIL_ERROR != NULL ){
    include_once(BASE."includes/email.php" );
    email(EMAIL_ERROR, "ERROR on ".MANAGER_NAME, $message );
  }
        
  if(DEBUG == "Y" )
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

  create_top($lang['error'], 1 );

  $content = "<div style=\"text-align : center\">$message</div>\n";

  new_box($box_title, $content, "boxdata", "singlebox" );

  create_bottom();

  //do not return as that would be futile
  die;
}

?>