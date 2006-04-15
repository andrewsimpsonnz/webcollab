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

  RSS feed generator

*/

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

include_once(BASE.'includes/common.php');
include_once(BASE.'database/database.php');

//secure variables
$content = '';
$found = false;

//valid login attempt ?
if(! isset($_SERVER['REMOTE_USER']) || (strlen($_SERVER['REMOTE_USER']) == 0 ) ) {
  header("HTTP/1.0 401 Unauthorized");
  die;
}

if( ! ($q = @db_query('SELECT id, admin FROM '.PRE.'users WHERE name=\''.safe_data($_SERVER['REMOTE_USER'] ).'\' AND deleted=\'f\'', 0 ) ) ) {
  header("HTTP/1.0 401 Unauthorized");
  die;
}

if( @db_numrows($q) < 1 ) {
  header("HTTP/1.0 401 Unauthorized");
  die;
}

if(! ($row = @db_fetch_array($q, 0 ) ) ) {
  header("HTTP/1.0 401 Unauthorized");
  die;
}

//set the usergroup permissions on queries (Admin can see all)
if($row['admin'] == 't' ) {
  $tail = ' ';
}
else {
  $tail = 'AND (usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.$row['id'].') OR usergroupid=0) ';
}

if(! ($q = db_query('SELECT '.$epoch.'MAX(edited) ) AS last FROM '.PRE.'tasks', 0 ) ) ) {
  header("HTTP/1.0 500 Internal Server Error");
  die;
}

if(db_numrows($q) > 0 ) {
  $last_mod  = db_result($q, 0, 0 );
}
else {
  $last_mod = gmmktime();
}

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
    header("HTTP/1.0 304 Not modified");
    die;
  }
  break;
}

//xml uses UTF-8 exclusively - tell the database to use UTF-8 too.
db_user_locale('UTF-8');

if(! ($q = db_query('SELECT '.PRE.'tasks.id AS id,
                      '.PRE.'tasks.status AS status,
                      '.PRE.'tasks.name AS taskname
                      FROM '.PRE.'tasks
                      WHERE '.PRE.'tasks.parent<>0
                     '.$tail.'
                      ORDER BY '.PRE.'tasks.edited DESC LIMIT 50', 0 ) ) ) {

  header("HTTP/1.0 500 Internal Server Error");
  die;
}

//use compressed output (if web browser supports it) _and_ zlib.output_compression is not already enabled
if( ! ini_get('zlib.output_compression') ) {
  ob_start('ob_gzhandler' );
}

//send the headers describing the xml
header('Content-Type: text/xml; charset=UTF-8' );

//set constants
$gmdate = gmdate('D, d M Y H:i:s');
$guid   = md5(MANAGER_NAME.BASE_URL);


echo  "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n".
      "<rss version=\"2.0\">\n".
      "<channel>\n".
      "<title>".ABBR_MANAGER_NAME."</title>\n".
      "<link>".BASE_URL."</link>\n".
      "<description>".MANAGER_NAME."</description>\n".
      "<language>en-us</language>\n".
      "<ttl>60</ttl>\n".
      "<lastBuildDate>".$gmdate." GMT</lastBuildDate>\n".
      "<generator>WebCollab 2.00</generator>\n";


//html encode '<' and '>' tags in text to suit RSS 2.00
$trans = array('<'=>'&lt;', '>'=>'&gt;' );

for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  switch($row['status'] ) {

    case 'created':
      $status =  'New';
      break;

    case 'notactive':
      $status = 'Planned';
      break;

    case 'active':
      $status =  'Active';
      break;

    case 'cantcomplete':
      $status =  "&lt;b&gt;On Hold&lt;/b&gt;";
      break;

    case 'done':
      $status =  'Done';
      break;

    default:
      $status =  $row['status'];
      break;
  }

  $content .= "<item>\n".
              "<title>".strtr($row['taskname'], $trans )." - ".$status."</title>\n".
              "<link>".BASE_URL."</link>\n".
              "<pubDate>".$gmdate."</pubDate>\n".
              "<guid isPermaLink=\"false\">".$row['id']."-".$guid."</guid>\n".
              "</item>\n";
}

$content .= "</channel>\n".
            "</rss>\n";

//replace all occurrences of '&' that aren't part of &lt;, &gt;, &amp; or a unicode entity 
$content = preg_replace('/&(?!([l|g]t|#[\d]{2,5}|amp);)/', '&amp;', $content );

echo $content;

?>