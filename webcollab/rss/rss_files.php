<?php
/*
  $Id: rss_forum.php 1923 2008-02-08 07:29:31Z andrewsimpson $

  (c) 2005 - 2013 Andrew Simpson <andrewnz.simpson at gmail.com>

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
  rss_error('401', 'File login');
}

//check when page was last modified
if(! ($q = db_query('SELECT '.db_epoch().'MAX(uploaded) ) AS last FROM '.PRE.'files', 0 ) ) ) {

  rss_error('500', 'File last modified');
}

if (! $last_mod = db_result($q, 0, 0 ) ) {
  $last_mod = time();
}

//check when last request was made
rss_last_mod($last_mod);

//get site names
if(! ($q = db_query('SELECT * FROM site_name', 0 ) ) ) {

  rss_error('500', 'File site name');
}

$row = @db_fetch_array($q, 0 );
define('MANAGER_NAME', $row['manager_name'] );
define('ABBR_MANAGER_NAME', $row['abbr_manager_name'] );

//set the usergroup permissions on queries (Admin can see all)
if(ADMIN ) {
  $tail = ' ';
}
else {
  $tail = ' WHERE ('.PRE.'tasks.globalaccess=\'f\' AND '.PRE.'tasks.usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
            OR '.PRE.'tasks.globalaccess=\'t\'
            OR '.PRE.'tasks.usergroupid=0) ';
}

//main query
if(! $q = db_query('SELECT '.PRE.'files.id AS id,
                            '.PRE.'files.filename AS filename,
                            '.db_epoch().' '.PRE.'files.uploaded) AS uploaded,
                            '.PRE.'files.file_description AS file_description,
                            '.PRE.'tasks.id AS taskid,
                            '.PRE.'tasks.task_name AS taskname
                            FROM '.PRE.'files
                            LEFT JOIN '.PRE.'tasks ON ('.PRE.'files.taskid='.PRE.'tasks.id)
                            '.$tail.'
                            ORDER BY uploaded DESC', 0 ) ) {

  rss_error('500', 'File query');
}

$filename = basename(__FILE__ );

//start xml feed
$content = rss_start($last_mod, $filename );

//set constants
$guid = sha1(MANAGER_NAME . BASE_URL);

for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  $content .= "<item>\n".
              "<title>".$row['taskname']." - ".$row['filename']."</title>\n".
              "<link>".BASE_URL."index.php?taskid=".$row['taskid']."</link>\n".
              "<description>".rss_bbcode($row['file_description'] )."</description>\n".
              "<pubDate>".rss_time($row['uploaded'])."</pubDate>\n".
              "<guid isPermaLink=\"false\">".$row['id']."-".$guid."</guid>\n".
              "</item>\n";
}

//end xml
$content .= rss_end();

echo $content;

?>
