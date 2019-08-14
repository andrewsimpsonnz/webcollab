<?php
/*
  $Id: rss_forum.php 1706 2008-01-01 06:13:00Z andrewsimpson $

  (c) 2008 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  RSS feed generator - common functions

*/

//
// HTTP login function
//

function rss_login() {

  //valid login attempt ?
  if(! isset($_SERVER['REMOTE_USER']) || (strlen($_SERVER['REMOTE_USER']) == 0 ) ) {
    rss_error('401', 'Login no authorisation');
  }

  $q = db_prepare('SELECT id, user_admin, locale FROM '.PRE.'users WHERE user_name=? AND deleted=\'f\'' );

  if( ! (db_execute($q, array(safe_data($_SERVER['REMOTE_USER'] ) ), 0 ) ) ) {
    rss_error('401', 'Login user select' );
  }

  if( ! ($row = db_fetch_array($q, 0 ) ) ) {
    rss_error('401', 'Login query error');
  }

  define('UID', $row['id'] );

  //set user defined locale if requrired
  if($row['locale'] ) {
    define('LOCALE_USER', $row['locale'] );
  }
  else {
    define('LOCALE_USER', LOCALE );
  }

  if($row['user_admin'] == 't' ) {
    define('ADMIN', 1 );
  }
  else {
    define('ADMIN', 0 );
  }

  return 1;
}

//
// Check if page was modified since last request
//

function rss_last_mod ($last_mod) {

  $last_read = 0;
  $last_etag = 0;
  //get headers
  $headers = apache_request_headers();

  if(isset($headers['If-Modified-Since'] ) ) {
    $last_read = strtotime($headers['If-Modified-Since'] );
  }
  
  if(isset($headers['If-None-Match'] ) ) {
    $last_etag = $headers['If-None-Match'];
  }

  //check for match
  // allow for two second margin of error due to numerical rounding
  if((abs($last_read - $last_mod ) < 2 ) || preg_match('/'.$last_etag.'/', sha1($last_mod ) ) ) {
    header("HTTP/1.0 304 Not modified", true, 304 );
    die;
  }
  return;
}


//
// Start the RSS xml feed headers
//

function rss_start($last_mod, $filename ) {

  /*
  //use compressed output (if web browser supports it) _and_ zlib.output_compression is not already enabled
  if( ! ini_get('zlib.output_compression') ) {
    ob_start('ob_gzhandler' );
  }
  */

  //set expire time to 8 hours (in seconds)
  $expire = 60 * 60 * 8;
  
  // Set cache/proxy informations:
  header('Cache-Control: max-age='.$expire);
  header('Expires: '.gmdate('D, d M Y H:i:s', time() + $expire ).' GMT');
 
  //send the headers with last mod time
  header('ETag: '.sha1($last_mod) );
  header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_mod ) . ' GMT' );

  //send the headers describing the xml
  header('Content-Type: text/xml; charset=UTF-8' );

  $content =  "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n".
              "<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">\n".
              "<channel>\n".
              "<atom:link href=\"".BASE_URL."rss/".$filename."\" rel=\"self\" type=\"application/rss+xml\" />\n".
              "<title>".ABBR_MANAGER_NAME."</title>\n".
              "<link>".BASE_URL."</link>\n".
              "<description>".MANAGER_NAME."</description>\n".
              "<ttl>60</ttl>\n".
              "<lastBuildDate>".gmdate('D, d M Y H:i:s')." GMT</lastBuildDate>\n".
              "<generator>WebCollab ".WEBCOLLAB_VERSION."</generator>\n";

return $content;
}

//
// Take a database timestamp and make it RFC 2822 format
//
function rss_time($timestamp ) {

  //format is Saturday, 09 February 2008 12:10:45 +1300
  return date('D, d M Y H:i:s', $timestamp ).sprintf(' %+03d%02u', intval(TZ ), ((abs(TZ ) - intval(abs(TZ ) ) ) * 60 ) );

}

//
// Language file
//
function rss_status() {

  include_once(BASE.'lang/lang.php');

  $status['created']      = $task_state['new'];
  $status['notactive']    = $task_state['planned'];
  $status['active']       = $task_state['active'];
  $status['cantcomplete'] = $task_state['cantcomplete'];
  $status['done']         = $task_state['done'];
  $status['completed']    = $task_state['completed'];

  return $status;
}

//
// Clean up the xml feed
//

function rss_bbcode($content ) {

  //bbcode tags (using HTML entities to suit RSS)
  if(! strpos($content, '[/' ) === false ) {
    $content = preg_replace('#\[i\](.+?)\[/i\]#is', "&lt;i&gt;$1&lt;/i&gt;", $content );
    $content = preg_replace('#\[b\](.+?)\[/b\]#is', "&lt;b&gt;$1&lt;/b&gt;", $content );
    $content = preg_replace('#\[u\](.+?)\[/u\]#is', "&lt;span style=\"text-decoration: underline;\"&gt;$1&lt;/span&gt;", $content );
    $content = preg_replace('#\[quote\](.+?)\[/quote\]#is', "&lt;blockquote&gt;&lt;p&gt;$1&lt;/p&gt;&lt;/blockquote&gt;", $content );
    $content = preg_replace('#\[code\](.+?)\[/code\]#is', "&lt;pre&gt;$1&lt;/pre&gt;", $content );
    $content = preg_replace('#\[color=(red|blue|green|yellow)\](.+?)\[/color\]#is', "&lt;span style=\"color:$1\"&gt;$2&lt;/span&gt;", $content );
    $content = preg_replace('#\[url\]((http|ftp)+(s)?:\/\/[a-z0-9./-_~]+?)\[/url\]#i', "&lt;a href=\"$1\" &gt;$1&lt;/a&gt;", $content );
    $content = preg_replace('#\[img\]([a-z0-9./\-_~]+)\[/img\]#i', "$1", $content );
    $content = preg_replace_callback('#\[list\](.+?)\[/list\]#is', 'rss_list1', $content );
    $content = preg_replace_callback('#\[list=1\](.+?)\[/list\]#is', 'rss_list2', $content );
  }

return $content;
}

function rss_list1($list) {
  $body = "&lt;ul&gt;". preg_replace('#\[\*\](.+?)$#m', "&lt;li&gt;$1&lt;/li&gt;", $list[1] )."&lt;/ul&gt;";
  return $body;
}

function rss_list2($list) {
  $body = "&lt;ol&gt;". preg_replace('#\[\*\](.+?)$#m', "&lt;li&gt;$1&lt;/li&gt;", $list[1] )."&lt;/ol&gt;";
  return $body;
}

//
// End xml feed
//

function rss_end() {

  $content  = "</channel>\n".
              "</rss>\n";

return $content;
}

function rss_error($code, $message='' ) {

  if(DEBUG == 'Y' ) {
    error("RSS Error", "Error number ".$code."<br />".$message );
  }

  switch ($code ) {

    case '401':
      header("HTTP/1.0 401 Unauthorized", true, 401 );
      break;

    case '500':
    default:
      header("HTTP/1.0 500 Internal Server Error", true, 500 );
      break;
  }

  //end program
  die;
}

?>
