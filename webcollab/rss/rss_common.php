<?php
/*
  $Id: rss_forum.php 1706 2008-01-01 06:13:00Z andrewsimpson $

  (c) 2008 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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

  //used to get UTF-8 in common.php
  define('CHARACTER_SET', 'UTF-8' );

  if( ! ($q = @db_query('SELECT id, admin FROM '.PRE.'users WHERE name=\''.safe_data($_SERVER['REMOTE_USER'] ).'\' AND deleted=\'f\'', 0 ) ) ) {

  rss_error('401', 'Login user select' );
  }

  if(db_numrows($q) != 1 ) {

  rss_error('401', 'Login no user found');
  }

  if(! ($row = db_fetch_array($q, 0 ) ) ) {

  rss_error('401', 'Login query error');
  }

  define('UID', $row['id'] );

  if($row['admin'] == 't' ) {
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

  //get the request headers
  $headers = apache_request_headers();

  //search the headers for 'If-Modified-Since' string
  foreach($headers as $header=>$value ) {

    if(strpos(strtolower($header), 'if-modified-since' ) === false ) {
      continue;
    }

    //found header --> get the time value
    $last_read = strtotime($value );
    //prior to PHP 5.1.0 a failure is '-1', later versions give 'false'
    if($last_read === -1 || $last_read === false ) {
      break;
    }
    if($last_read - $last_mod > 0 ) {
      header("HTTP/1.0 304 Not modified", true, 304 );
      die;
    }
    break;

  }

return;
}

//
// Start the RSS xml feed headers
//

function rss_start($last_mod, $manager_name, $abbr_manager_name, $filename ) {

  /*
  //use compressed output (if web browser supports it) _and_ zlib.output_compression is not already enabled
  if( ! ini_get('zlib.output_compression') ) {
    ob_start('ob_gzhandler' );
  }
  */

  //send the headers with last mod time
  header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_mod ) . ' GMT' );

  //send the headers describing the xml
  header('Content-Type: text/xml; charset=UTF-8' );

  $content =  "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n".
              "<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">\n".
              "<channel>\n".
              "<atom:link href=\"".BASE_URL."rss/".$filename."\" rel=\"self\" type=\"application/rss+xml\" />\n".
              "<title>".$abbr_manager_name."</title>\n".
              "<link>".BASE_URL."</link>\n".
              "<description>".$manager_name."</description>\n".
              "<ttl>60</ttl>\n".
              "<lastBuildDate>".gmdate('D, d M Y H:i:s')." GMT</lastBuildDate>\n".
              "<generator>WebCollab 2.40</generator>\n";

return $content;
}

//
// Take a database timestamp and make it RFC 2822 format
//
function rss_time($timestamp ) {

  //format is Saturday, 09 February 2008 12:10:45 +1300
  return date('D, d M Y h:i:s', $timestamp ).sprintf(' %+03d00', TZ );

}

//
// Clean up the xml feed
//

function rss_bbcode($content ) {

  //bbcode tags (using HTML entities to suit RSS)
  if(! strpos($content, '[/' ) === false ) {
    $content = preg_replace('#\[i\](.+?)\[/i\]#i', "&lt;i&gt;$1&lt;/i&gt;", $content );
    $content = preg_replace('#\[b\](.+?)\[/b\]#i', "&lt;b&gt;$1&lt;/b&gt;", $content );
    $content = preg_replace('#\[u\](.+?)\[/u\]#i', "&lt;span style=\"text-decoration: underline;\"&gt;$1&lt;/span&gt;", $content );
    $content = preg_replace('#\[quote\](.+?)\[/quote\]#i', "&lt;blockquote&gt;&lt;p&gt;$1&lt;/p&gt;&lt;/blockquote&gt;", $content );
    $content = preg_replace('#\[code\](.+?)\[/code\]#i', "&lt;pre&gt;$1&lt;/pre&gt;", $content );
    $content = preg_replace('#\[color=(red|blue|green|yellow)\](.+?)\[/color\]#i', "&lt;span style=\"color:$1\"&gt;$2&lt;/span&gt;", $content );
    $content = preg_replace('#\[url\]((http|ftp)+(s)?:\/\/[a-z0-9./-_~]+?)\[/url\]#i', "&lt;a href=\"$1\" &gt;$1&lt;/a&gt;", $content );
    $content = preg_replace('#\[img\]([a-z0-9./\-_~]+)\[/img\]#i', "$1", $content );
  }

return $content;
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