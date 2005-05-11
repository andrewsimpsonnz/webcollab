<?php
/*
  $Id$
  
  (c) 2004 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
require_once('path.php' );
require_once(BASE.'includes/security.php' );

include_once(BASE.'includes/time.php' );

//initialise variables            
$list = '';
unset($lastpost);
$j = 0;
                  
$q = db_query('SELECT '.PRE.'forum.taskid AS taskid, 
                      MAX('.PRE.'forum.posted) AS recentpost,
                      '.PRE.'tasks.name AS taskname,
                      '.PRE.'tasks.globalaccess AS globalaccess,
                      '.PRE.'tasks.usergroupid AS usergroupid
                    FROM '.PRE.'forum 
                    LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                    WHERE '.PRE.'forum.posted > ( now()-INTERVAL '.$delim.NEW_TIME.' DAY'.$delim.')
                    GROUP BY '.PRE.'forum.taskid, taskname, globalaccess, '.PRE.'tasks.usergroupid
                    ORDER BY recentpost DESC' );

//iterate for posts                            
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //check if user can view this task
  if( (! ADMIN ) && ($row['globalaccess'] != 't' ) && ($row['usergroupid'] != 0 ) ) {
    if( ! in_array( $row['usergroupid'], (array)$GID ) )
        continue;
  }
  
  //date of latest post
  if(! isset($lastpost) )
    $lastpost = $row['recentpost'];
  
  //show it
  $list .= "<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row['taskid']."\">".substr($row['taskname'], 0, 25 )."</a><br />\n";
  ++$j;
  
  //show max of 10 posts
  if($j > 10 )
    break;
}

db_free_result($q );

if($list != '') {
  $content = "<small>".$list.sprintf($lang['last_post_sprt'], nicedate($lastpost) )."</small>\n";
  new_box($lang['recent_posts'], $content, 'boxmenu' ); 
}

?>