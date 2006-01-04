<?php
/*
  $Id$
  
  (c) 2004 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Lists all the recent forum posts

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
include_once(BASE.'includes/time.php' );

//initialise variables
$list = '';

$m_strimwidth = (UNICODE_VERSION == 'Y' ) ? 'mb_strimwidth' : 'substr';

//set the usergroup permissions on queries (Admin can see all)
if(ADMIN ) {
  $tail = ' ';
}
else {
  $tail = ' AND ('.PRE.'tasks.globalaccess=\'f\' AND '.PRE.'tasks.usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
           OR '.PRE.'tasks.globalaccess=\'t\'
           OR '.PRE.'tasks.usergroupid=0) ';
}

$q = db_query('SELECT '.PRE.'forum.taskid AS taskid,
                      '.PRE.'forum.posted AS posted,
                      MAX('.PRE.'forum.posted) AS recentpost,
                      '.PRE.'tasks.name AS taskname
                      FROM '.PRE.'forum 
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                      WHERE '.PRE.'forum.posted > ( now()-INTERVAL '.$delim.NEW_TIME.' DAY'.$delim.')
                      '.$tail.'
                      GROUP BY '.PRE.'forum.taskid, posted, taskname
                      ORDER BY posted DESC LIMIT 10' );

//iterate for posts
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //date of latest post
  $lastpost = $row['recentpost'];

  //show it
  $list .= "<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row['taskid']."\">".$m_strimwidth($row['taskname'], 0, 25 )."</a><br />\n";
}

db_free_result($q );

if($list != '') {
  $content = "<small>".$list.sprintf($lang['last_post_sprt'], nicedate($lastpost) )."</small>\n";
  new_box($lang['recent_posts'], $content, 'boxmenu' );
}

?>
