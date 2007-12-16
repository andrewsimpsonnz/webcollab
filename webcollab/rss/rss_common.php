<?php
/*
  $Id: rss_forum.php 1706 2007-01-01 06:13:00Z andrewsimpson $

  (c) 2007 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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
    header("HTTP/1.0 401 Unauthorized", true, 401 );
    die;
  }

  //used to get UTF-8 in common.php
  define('RSS', '1' );

  if( ! ($q = @db_query('SELECT id, admin FROM '.PRE.'users WHERE name=\''.safe_data($_SERVER['REMOTE_USER'] ).'\' AND deleted=\'f\'', 0 ) ) ) {
    header("HTTP/1.0 401 Unauthorized", true, 401 );
    die;
  }
/*
  if( ! ($q = @db_query('SELECT id, admin FROM '.PRE.'users WHERE name=\'admin\' AND deleted=\'f\'', 0 ) ) ) {
    header("HTTP/1.0 401 Unauthorized");
    die;
  }
*/
  if( @db_numrows($q) == 0 ) {
    header("HTTP/1.0 401 Unauthorized", true, 401 );
    die;
  }

  if(! ($row = @db_fetch_array($q, 0 ) ) ) {
    header("HTTP/1.0 401 Unauthorized", true, 401 );
    die;
  }

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

function rss_start($last_mod, $manager_name, $abbr_manager_name ) {

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
              "<rss version=\"2.0\">\n".
              "<channel>\n".
              "<title>".$abbr_manager_name."</title>\n".
              "<link>".BASE_URL."</link>\n".
              "<description>".$manager_name."</description>\n".
              "<ttl>60</ttl>\n".
              "<lastBuildDate>".gmdate('D, d M Y H:i:s')." GMT</lastBuildDate>\n".
              "<generator>WebCollab 2.20</generator>\n";

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

//
// Clean up the xml feed
//

function rss_clean($content) {

  //replace all occurrences of '&' that aren't part of &lt;, &gt;, &amp; or a unicode entity 
  $content = preg_replace('/&(?!([l|g]t|#[\d]{2,5}|amp);)/', '&amp;', $content );

return $content;
}

?>