<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
    if(UNICODE_VERSION == 'Y' ) {
      $body  = mb_strimwidth($body, 0, 100, '...' );
    }
    else {
      $body = substr($body, 0, 100 );
    }
  }

  //remove line breaks (not allowed in single lines!)
  $body = strtr($body, array("\r"=>' ', "\n"=>' ' ) );
  //add HTML entities
  $body = html_clean_up($body);
  //prevent SQL injection
  $body = db_escape_string($body );

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
  $pattern_modifier = (UNICODE_VERSION == 'Y' ) ? 'u' : '';
  $body = preg_replace("/[^\s\n\t]{100}/".$pattern_modifier, "$0\n", $body );
  //add HTML entities
  $body = html_clean_up($body);
  //prevent SQL injection
  $body = db_escape_string($body );

return $body;
}

function validate($body ) {

  //we don't use magic_quotes
  if(get_magic_quotes_gpc() ) {
    $body = stripslashes($body );
  }

  if(UNICODE_VERSION == 'Y' || CHARACTER_SET == 'UTF-8' ) {

    $body = preg_replace('/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]'.          //ASCII
                         '|[\x00-\x7F][\x80-\xBF]+'.                       //continuation with no start
                         '|[\xC0-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})'.  //illegal two byte
                         '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})'. //illegal three byte
                         '|[\xF0-\xFF][\x80-\xBF]*/',                      //reject more than 3 byte 
                         '?', $body );

    $body = preg_replace('/[\xC0\xC1][\x80-\xBF]'.                         //exclude two byte over longs
                          '|\xE0[\x80-\x9F][\x80-\xBF]'.                   //exclude three byte over longs
                          '|\xED[\xA0-\xBF][\x80-\xBF]/','?', $body );     //exclude surrogates

  }
  else {
    //Single byte validation regex
    // allow only normal printing characters valid for the character set in use
    // character set regex in language file
    $body = preg_replace(VALIDATION_REGEX, '?', $body );
  }

  return $body;
}

function html_clean_up($body ) {

  if(version_compare(PHP_VERSION, '5.2.3', '>=' ) ) {
    $body = htmlspecialchars($body, ENT_QUOTES, CHARACTER_SET, false );

  }
  else {
    //change '&' to '&amp;' except when part of an entity, or already changed
    if(! strpos($body, '&' ) === false ) {
      $body = preg_replace('/&(?!(#[\d]{2,5}|amp);)/', '&amp;', $body );
    }
    //use HTML for characters that could be used for xss <script>
    //  also convert quotes to HTML for XHTML compliance
    $trans = array('<'=>'&lt;', '>'=>'&gt;', '"'=>'&quot;', "'"=>'&#039;' );
    $body  = strtr($body, $trans );
  }

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
// shorten a character string to 20 characters (to fit a small box)
//
function box_shorten($body, $len=20 ){

  $m_strlen = (UNICODE_VERSION == 'Y' ) ? 'mb_strlen' : 'strlen';
  $m_substr = (UNICODE_VERSION == 'Y' ) ? 'mb_substr' : 'substr';

  if($m_strlen($body ) > $len ) {

    //rough cut to fit, then look for word boundaries for better cut
    $first_cut  = $m_substr($body, 0, ($len + 5 ) );
    $last_space_pos = strrpos($first_cut, ' ' );

    //adjust to suit word boundary if possible
    if(($last_space_pos === false ) || ($last_space_pos > ($len - 5 ) ) ) {
      $len = $last_space_pos;
    }
    $body = substr($body, 0, $len );
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
    $body = preg_replace('#\[i\](.+?)\[/i\]#i', "<i>$1</i>", $body );
    $body = preg_replace('#\[b\](.+?)\[/b\]#i', "<b>$1</b>", $body );
    $body = preg_replace('#\[u\](.+?)\[/u\]#i', "<span style=\"text-decoration: underline;\">$1</span>", $body );
    $body = preg_replace('#\[quote\](.+?)\[/quote\]#i', "<blockquote><p>$1</p></blockquote>", $body );
    $body = preg_replace('#\[code\](.+?)\[/code\]#i', "<pre>$1</pre>", $body );
    $body = preg_replace('#\[color=(red|blue|green|yellow)\](.+?)\[/color\]#i', "<span style=\"color:$1\">$2</span>", $body );
    $body = preg_replace('#\[url\]((http|ftp)+(s)?:\/\/[a-z0-9./-_~]+?)\[/url\]#i', "<a href=\"$1\" onclick=\"window.open('$1'); return false\">$1</a>", $body );
    $body = preg_replace('#\[img\](http(s)?:\/\/([a-z0-9./\-_~])+?\.(jpg|jpeg|gif|png))\[/img\]#i', "<img src=\"$1\" alt=\"\"/>", $body );
  }
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
    $size .= ' B';
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

  create_top('ERROR', 1 );

  if(NO_ERROR !== 'Y' ) {
    $content = "<div style=\"text-align : center\">".$error."</div>";
    new_box( $box_title, $content, 'boxdata', 'singlebox' );
  }
  else {
    new_box($lang['report'], $lang['warning'], 'boxdata2', 'singlebox' );
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
    $message = "Hello,\n This is the ".MANAGER_NAME." site and I have an error :/  \n".
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

  create_top($lang['error'], 1 );

  $content = "<div style=\"text-align : center\">".$message."</div>\n";
  new_box($box_title, $content, 'boxdata', 'singlebox' );

  create_bottom();

  //do not return
  die;
}

?>