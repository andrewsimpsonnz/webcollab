<?php
/*
  $Id: common.php 2275 2009-08-21 20:11:41Z andrewsimpson $

  (c) 2002 - 2017 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Common functions library

*/

//
// Input validation (single line input)
//
function safe_data($body ) {

  //remove excess whitespace
  $body = trim($body);

  //return null for nothing input
  if(strlen($body) == 0 ) {
    return '';
  }

  //validate characters
  $body = validate($body);

  //limit line length for single line entries
  if(strlen($body ) > 100 ) {
    $body  = mb_strimwidth($body, 0, 100, '...' );
  }

  //remove line breaks (not allowed in single lines!)
  $body = strtr($body, array("\r"=>' ', "\n"=>' ' ) );
  //add HTML entities
  $body = html_clean_up($body);
  
  return $body;
}

//
// Input validation (multiple line input)
//
function safe_data_long($body ) {

  //remove excess whitespace
  $body = trim($body);

  //return null for nothing input
  if(strlen($body) == 0 ) {
    return '';
  }

  //validate characters
  $body = validate($body);

  //normalise line breaks from Windows & Mac to UNIX style '\n' 
  $body = str_replace("\r\n", "\n", $body );
  $body = str_replace("\r", "\n", $body );
  //break up long non-wrap words
  $body = preg_replace("/[^\s\n\t]{100}/u", "$0\n", $body );
  //add HTML entities
  $body = html_clean_up($body);

  return $body;
}

//
// UTF-8 validation regex
//

function validate($body ) {

  //check for fully compliant text
  if(mb_check_encoding($body ) ) {
    return $body;
  }

  //Not compliant - remove illegal characters individually
  // This code was specifically developed for WebCollab in 2006, but is now used widely in other software.
  $body = preg_replace('/[\x00-\x08\x10\x0B\x0C\x0E-\x1F\x7F]'.           //ASCII non-printing
                        '|(?<=^|[\x00-\x7F])[\x80-\xBF]+'.                //continuation with no start
                        '|[\xC0-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})'.  //illegal two byte
                        '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})'. //illegal three byte
                        '|[\xF0-\xFF][\x80-\xBF]*/',                      //reject more than 3 byte
                        '�', $body );

  $body = preg_replace('/[\xC0\xC1][\x80-\xBF]'.                         //exclude two byte over longs
                        '|\xE0[\x80-\x9F][\x80-\xBF]'.                   //exclude three byte over longs
                        '|\xED[\xA0-\xBF][\x80-\xBF]/','�', $body );     //exclude surrogates

  return $body;
}

function html_clean_up($body ) {

  $body = @htmlspecialchars($body, ENT_QUOTES, 'UTF-8', false );

  return $body;
}

//
//check for true positive integer values to max size limits of PHP (64 bits) and database (32 bits)
//
function safe_integer($integer ) {

  if(! (filter_var($integer, FILTER_VALIDATE_INT, array('options' => array('min_range' => 0, 'max_range' => 2147483647 ) ) ) === false ) ) {
      return true;
  }
  return false;
}

//
// shorten a character string to 20 characters (to fit a small box)
//
function box_shorten($body, $len=20 ){

  if(mb_strlen($body ) > $len ) {

    //rough cut to fit, then look for word boundaries for better cut
    $first_cut  = mb_substr($body, 0, ($len + 5 ) );
    $last_space_pos = strrpos($first_cut, ' ' );

    //adjust to suit word boundary if possible
    if(($last_space_pos === false ) || ($last_space_pos > ($len - 5 ) ) ) {
      $len = $last_space_pos;
    }
    $body = mb_substr($body, 0, $len );
    $body .= ' ...';
  }

  return $body;
}

//
// single quotes in javascript fields are escaped
// double quotes are left as HTML (escaping won't work) 
//
function javascript_escape($body ) {

  //convert HTML
  $body = strtr($body, array('&#039;'=>"'") );
  //escape quotes
  $body = strtr($body, array("'"=>"\\'" ) );

  return $body;
}

//
// add bbcode tags functionality
//
function bbcode($body ) {

  if(strlen($body) == 0  ) {
    return '';
  }

  if(! strpos($body, '@' ) === false ) {
    //email links
    $body = preg_replace('/\b[a-z0-9\.\_\-]+@[a-z0-9][a-z0-9\.\-]+\.[a-z\.]+\b/i', "<a href=\"mailto:$0\">$0</a>", $body );
  }

  //bbcode tags
  if(! strpos($body, '[/' ) === false ) {
    $body = preg_replace('#\[i\](.+?)\[/i\]#is', "<i>$1</i>", $body );
    $body = preg_replace('#\[b\](.+?)\[/b\]#is', "<b>$1</b>", $body );
    $body = preg_replace('#\[u\](.+?)\[/u\]#is', "<span style=\"text-decoration: underline;\">$1</span>", $body );
    $body = preg_replace('#\[quote\](.+?)\[/quote\]#is', "<blockquote><p>$1</p></blockquote>", $body );
    $body = preg_replace('#\[code\](.+?)\[/code\]#is', "<pre>$1</pre>", $body );
    $body = preg_replace('#\[color=(red|blue|green|yellow)\](.+?)\[/color\]#is', "<span style=\"color:$1\">$2</span>", $body );
    $body = preg_replace('#\[img\](http(s)?:\/\/([a-z0-9\-_~/.])+?\.(jpg|jpeg|gif|png))\[/img\]#i', "<img src=\"$1\" alt=\"\"/>", $body );
    $body = preg_replace_callback('#\[url\]((http|ftp)+(s)?:\/\/[a-z0-9\-_~/@:?=&;+\#.]+)\[/url\]#i', 'bb_link1', $body );
    $body = preg_replace_callback('#\[url=((http|ftp)+(s)?:\/\/([a-z0-9\-_~.]+[.][a-z]{2,6})[a-z0-9\-_~/@:?=&;+\#.%]*)\](.+?)\[/url\]#i', 'bb_link2', $body );
    $body = preg_replace_callback('#\[list\](.+?)\[/list\]#is', 'bb_list1', $body );
    $body = preg_replace_callback('#\[list=1\](.+?)\[/list\]#is', 'bb_list2', $body );
  }
  return $body;
}

function bb_link1($url) {
  $url[1] = strtr($url[1], array("&amp;" => "&" ) );
  $body = "<a href=\"".$url[1]."\" onclick=\"window.open('".$url[1]."'); return false\">".$url[1]."</a>";
  return $body;
}

function bb_link2($url) {
  $url[1] = strtr($url[1], array("&amp;" => "&" ) );
  $body = "<a href=\"".$url[1]."\" onclick=\"window.open('".$url[1]."'); return false\">".$url[5]."</a> [".$url[4]."]";
  return $body;
}

function bb_list1($list) {
  $body = "<ul>". preg_replace('#\[\*\](.+?)$#m', "<li>$1</li>", $list[1] )."</ul>";
  $body = str_replace("\n", "", $body );
  return $body;
}

function bb_list2($list) {
  $body = "<ol>". preg_replace('#\[\*\](.+?)$#m', "<li>$1</li>", $list[1] )."</ol>";
  $body = str_replace("\n", "", $body );
  return $body;
}

//
// Nice format for file size
//

function nice_size($size ) {

  if(! $size ) {
    $size = 0;
  }
  elseif($size > (1043741824 ) ) {
    $size = sprintf('%.2f GB', ($size/(1043741824 ) ) );
  }
  elseif($size > (1048576 ) ) {
    $size = sprintf('%.2f MB', ($size/(1048576 ) ) );
  }
  elseif($size > 1024 ) {
    $size = (sprintf('%d kB', $size/(1024 ) ) );
  }
  else {
    $size = (sprintf('%d B', $size ) );
  }

  return $size;
}

//
// Builds up an error screen
//
function error($box_title, $error ) {

  global $db_error_message;

  include_once(BASE.'lang/lang.php' );
  include_once(BASE.'includes/screen.php' );

  //clear the existing buffer to give clean screen
  @ob_end_clean();

  create_top('ERROR', 1 );

  if(NO_ERROR !== 'Y' ) {
    $content = "<div style=\"text-align : center\">".$error."</div>";
    new_box( $box_title, $content, 'boxdata-small', 'head-small' );
  }
  else {
    new_box($lang['report'], $lang['warning'], 'boxdata-small', 'head-small' );
  }

  if((EMAIL_ERROR != NULL ) || (DEBUG === 'Y' ) ) {

    $uid_name     = defined('UID_NAME') ? UID_NAME : '';
    $uid_email    = defined('UID_EMAIL') ? UID_EMAIL : '';
    $manager_name = defined('MANAGER_NAME') ? MANAGER_NAME : 'WebCollab';

    //get the post vars
    ob_start();
    print_r($_REQUEST );
    $post = ob_get_contents();
    ob_end_clean();

    //email to the error address
    $message = "Hello,\n This is the ".$manager_name." site and I have an error :/  \n".
            "\n\n".
            "Error message: ".$error."\n".
            "Database message: ".$db_error_message."\n".
            "User: ".$uid_name." (".$uid_email.")\n".
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

  //clear the existing buffer to give clean screen
  @ob_end_clean();

  create_top($lang['error'], 1 );

  $content = "<div style=\"text-align : center\">".$message."</div>\n";
  new_box($box_title, $content, 'boxdata-small', 'head-small' );

  create_bottom();

  //do not return
  die;
}

?>
