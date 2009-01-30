<?php
/*
  $Id: rss_tasks.php 1924 2008-02-08 07:30:23Z andrewsimpson $

  (c) 2005 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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

  rss_error('401', 'Project login' );
}

//get time of last modified task
if(! ($q = db_query('SELECT '.$epoch.'MAX(edited) ) AS last FROM '.PRE.'tasks', 0 ) ) ) {

  rss_error('500', 'Project last edit' );
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

  rss_error('500', 'Project site name' );
}

$row = @db_fetch_array($q, 0 );
$manager_name      = $row['manager_name'];
$abbr_manager_name = $row['abbr_manager_name'];

//set the usergroup permissions on queries (Admin can see all)
if(ADMIN ) {
  $tail = ' ';
}
else {
  $tail = ' AND ('.PRE.'tasks.globalaccess=\'f\' AND '.PRE.'tasks.usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
            OR '.PRE.'tasks.globalaccess=\'t\'
            OR '.PRE.'tasks.usergroupid=0) ';
}

//main query
if(! ($q = db_query('SELECT '.PRE.'tasks.id AS id,
                            '.PRE.'tasks.name AS taskname,
                            '.PRE.'tasks.status AS status,
                            '.$epoch.' '.PRE.'tasks.edited) AS edited,
                            '.PRE.'tasks.text AS text,
                            '.PRE.'tasks.completed AS completed
                            FROM '.PRE.'tasks
                            WHERE '.PRE.'tasks.parent=0
                          '.$tail.'
                            ORDER BY '.PRE.'tasks.edited DESC', 0 ) ) ) {

  rss_error('500', 'Project query' );
}

$filename = basename(__FILE__ );

//start xml feed
$content = rss_start($last_mod, $manager_name, $abbr_manager_name, $filename );

//set constants
$guid = md5($manager_name.BASE_URL);

for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  if($row['completed'] == 100 ) {
    $status = 'Complete';
  }
  else {
    switch($row['status'] ) { 

      case 'nolimit':
        $status =  'No deadline';
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
  }

  $content .= "<item>\n".
              "<title>".$row['taskname']." - ".$status."</title>\n".
              "<link>".BASE_URL."index.php?taskid=".$row['id']."</link>\n".
              "<description>".rss_bbcode($row['text'] )."</description>\n".
              "<pubDate>".rss_time($row['edited'] )."</pubDate>\n".
              "<guid isPermaLink=\"false\">".$row['id']."-".$guid."</guid>\n".
              "</item>\n";
}

//end xml
$content .= rss_end();

echo $content;

?>