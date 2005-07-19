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

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(CONFIG.'config.php' );

include_once(BASE.'lang/lang.php' );

//set character set encoding to be used
if(! mb_internal_encoding(CHARACTER_SET ) ) {
  error("Internal encoding", "Unable to set ".CHARACTER_SET." encoding in PHP" );
}

//
// Input validation (single line input)
//
function safe_data($body ) {
  
  //return null for nothing input
  if(ctype_space($body) ) {
    return '';
  }
  
  //we don't use magic_quotes
  if(get_magic_quotes_gpc() ) {
    $body = stripslashes($body );
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
  
  //we don't use magic_quotes
  if(get_magic_quotes_gpc() ) {
    $body = stripslashes($body );
  }
  //validate characters
  $body = validate($body);
    
  //normalise line breaks from Windows & Mac to UNIX style
  $body = str_replace("\r\n", "\n", $body );
  $body = str_replace("\r", "\n", $body );
  //break up long non-wrap words
  $body = mb_ereg_replace('[^[:space:]]{100}', "\\0\n", $body );
  //clean up for database
  $body = clean_up($body );  

return $body;
}

function validate($body ) {
  
  
  if(! ctype_print($body) ) {
    
    switch(strtoupper(CHARACTER_SET) ) {
      
      case 'EUC_KR':
      case 'EUC_CN':
        $body = preg_match_all('/([\x09\x0a\x0d\x20-\x7f]'.                   // CS0  ASCII
                                '|[\xa1-\xfe]{2})+/', $body, $ar );           // CS1  GB2312-80 
        $body = join('?', $ar[0] );
        break;
      
      case 'EUC-JP':
        $body = preg_match_all('/([\x09\x0a\x0d\x20-\x7f]'.                   // CS0  ASCII
                                '|[\xa1-\xfe]{2}'.                            // CS1  JIS X 0208:1997
                                '|\x8e[\xa0-\xdf]'.                           // CS2  half width katakana
                                '|\x8f[\xa1-\xfe]{2})+/', $body, $ar );       // CS3  JIS X 0212-1990   
        $body = join('?', $ar[0] );
        break;
              
      case 'UTF-8':
        //decode decimal HTML entities added by web browser
        $body = preg_replace('/&#\d{2,5};/e', "utf8_entity_decode('$0')", $body );
        //decode hex HTML entities added by web browser
        $body = preg_replace('/&#x([a-fA-F0-7]{2,8});/e', "utf8_entity_decode('&#'.hexdec('$1').';')", $body );

        //allow only normal UTF-8 characters up to U+10000, which is the limit of 3 byte characters
        // (Neither MySQL nor PostgreSQL will accept UTF-8 characters beyond U+10000 )   
        preg_match_all('/([\x09\x0a\x0d\x20-\x7e]'.                         // ASCII characters
                      '|[\xc2-\xdf][\x80-\xbf]'.                            // 2-byte UTF-8 (except overly longs)
                      '|\xe0[\xa0-\xbf][\x80-\xbf]'.                        // 3 byte (except overly longs)
                      '|[\xe1-\xec\xee\xef][\x80-\xbf]{2}'.                 // 3 byte (except overly longs)
                      '|\xed[\x80-\x9f][\x80-\xbf])+/', $body, $ar );       // 3 byte (except UTF-16 surrogates)
      
        $body = join('?', $ar[0] );
        break;
    
      default:
        //backward compatibility for standard WebCollab here...
        if(! isset($validation_regex ) ) {
          error("Input validation", "The selected ".CHARACTER_SET." does not have a valid input validation filter" ); 
        }
        $body = preg_replace($validation_regex, '?', $body );
        break;
    
    }    
  }  
  return $body;   
}
    
function clean_up($body) {  
  
  //decode URL entities
  $body = urldecode($body );
  //prevent SQL injection
  $body = db_escape_string($body );
  //use HTML encoding, or add escapes '\' for characters that could be used for xss <script> or SQL injection attacks
      //for better xss protection (at the expense of ability to upload non-ASCII characters) add to $trans array '&'=>'&amp;'    
  $trans = array(';'=>'\;', '<'=>'&lt;', '>'=>'&gt;', '+'=>'\+', '-'=>'\-', '='=>'\=' );
  $body  = strtr($body, $trans );
  
  return $body; 
}

//
// decode html entities into UTF-8
//
function utf8_entity_decode($entity){

 //convert up to U+10000
 $convmap = array(0x0, 0x10000, 0, 0xfffff);
 return mb_decode_numericentity($entity, $convmap, 'UTF-8');
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
  //$body = preg_replace('/(([\w\-\.]+)@([\w\-\.]+)\.([\w]+))/', "<a href=\"mailto:$0\">$0</a>", $body );
  
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
  
  include_once(BASE.'includes/screen.php' );
  
  create_top('ERROR', 1 );

  if(NO_ERROR != 'Y' ) {
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

  //email to the error-catcher
  $message = "Hello,\n This is the ".MANAGER_NAME." site and I have an error :/  \n".
            "\n\n".
            "User that created the error: ".UID_NAME." (".UID_EMAIL.")\n".
            "The erroneous component: $box_title\n".
            "The error message: $error\n".
            "Database message: $db_error_message\n".
            "Page that was called: ".$_SERVER['SCRIPT_NAME']."\n".
            "Called URL: ".$_SERVER['REQUEST_URI']."\n".
            "URL string: ".$_SERVER['QUERY_STRING']."\n".
            "Browser: ".$_SERVER['HTTP_USER_AGENT']."\n".
            "Time: ".date("F j, Y, H:i")."\n".
            "IP: ".$_SERVER['REMOTE_ADDR']."\n".
            "WebCollab version:".WEBCOLLAB_VERSION."\n".
            "POST vars: $post\n\n";
  
  if(EMAIL_ERROR != NULL ) {
    include_once(BASE.'includes/email.php' );
    email(EMAIL_ERROR, "ERROR on ".MANAGER_NAME, $message );
  }
        
  if(DEBUG == 'Y' ) {
    $content = nl2br($message);
    new_box("Error Debug", $content );
  }
  
  create_bottom();

  //do not return as that would be futile
  die;
}


//
// Builds up a warning screen
//
function warning($box_title, $message ) {

  global $lang;

  include_once(BASE.'includes/screen.php' );

  create_top($lang['error'], 1 );
  
  $content = "<div style=\"text-align : center\">$message</div>\n";
  new_box($box_title, $content, 'boxdata', 'singlebox' );
  
  create_bottom();

  //do not return as that would be futile
  die;
}

?>
