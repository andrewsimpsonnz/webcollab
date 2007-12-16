<?php
/*
  $Id$

  (c) 2005 - 2007 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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
require_once(BASE.'rss/rss_common.php' );

include_once(BASE.'includes/common.php');
include_once(BASE.'database/database.php');

//secure variables
$content = '';

//HTTP login
if(! rss_login() ) {
  header("HTTP/1.0 401 Unauthorized", true, 401 );
  die;
}


//check when page was last modified
if(! ($q = db_query('SELECT '.$epoch.'MAX(posted) ) AS last FROM '.PRE.'forum', 0 ) ) ) {
  header("HTTP/1.0 500 Internal Server Error", true, 500 );
  die;
}

if(db_numrows($q) > 0 ) {
  $last_mod  = db_result($q, 0, 0 );
}
else {
  $last_mod = gmmktime();
}

//check when last request was made
rss_last_mod($last_mod);

//xml uses UTF-8 exclusively - tell the database to use UTF-8 too.
db_user_locale('UTF-8');

//get site names
if(! ($q = db_query('SELECT * FROM site_name', 0 ) ) ) {

  header("HTTP/1.0 500 Internal Server Error", true, 500 );
  die;
}
$row = @db_fetch_array($q, 0 );
$manager_name      = $row['manager_name'];
$abbr_manager_name = $row['abbr_manager_name'];

//set the usergroup permissions on queries (Admin can see all)
if(ADMIN ) {
  $tail = ' ';
}
else {
  $tail = 'WHERE (usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.$row['id'].') OR usergroupid=0) ';
}

//main query
if(! ($q = db_query('SELECT '.PRE.'forum.id AS forumid,
                      '.PRE.'forum.text AS text,
                      '.PRE.'forum.posted AS posted,
                      '.PRE.'users.fullname AS fullname,
                      '.PRE.'tasks.id AS taskid,
                      '.PRE.'tasks.name AS taskname
                      FROM '.PRE.'forum
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid) 
                     '.$tail.'
                      ORDER BY '.PRE.'forum.posted DESC LIMIT 50', 0 ) ) ) {

  header("HTTP/1.0 500 Internal Server Error", true, 500 );
  die;
}

//start xml feed
$content = rss_start($last_mod, $manager_name, $abbr_manager_name );

//set constants
$gmdate = gmdate('D, d M Y H:i:s');
$guid   = md5($manager_name.BASE_URL);

//html encode '<' and '>' tags in text to suit RSS 2.00
$trans = array('<'=>'&lt;', '>'=>'&gt;' );

for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  $content .= "<item>\n".
              "<title>".strtr($row['taskname'], $trans )." - ".$row['fullname']."</title>\n".
              "<link>".BASE_URL."index.php?taskid=".$row['taskid']."</link>\n".
              "<description>".strtr($row['text'], $trans )."</description>\n".
              "<pubDate>".$gmdate."</pubDate>\n".
              "<guid isPermaLink=\"false\">".$row['forumid']."-".$guid."</guid>\n".
              "</item>\n";
}

//end xml
$content .= rss_end();

$content .= rss_clean($content );

echo $content;

?>