<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on original file written for Core APM by Dennis Fleurbaaij 2001/2002

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
require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/time.php" );

//initialise variables            
$list = "";
unset($lastpost);
$j = 0;
                  
$q = db_query("SELECT ".PRE."forum.taskid AS taskid, 
                      MAX(".PRE."forum.posted) AS recentpost,
                      ".PRE."tasks.name AS taskname,
                      ".PRE."tasks.globalaccess AS globalaccess,
                      ".PRE."tasks.usergroupid AS usergroupid
                    FROM ".PRE."forum 
                    LEFT JOIN ".PRE."tasks ON (".PRE."tasks.id=".PRE."forum.taskid)
                    WHERE posted > ( now()-INTERVAL ".$delim.(NEW_TIME * 24 )." HOUR".$delim.")
                    GROUP BY taskid 
                    ORDER BY recentpost DESC" );

//iterate for posts                            
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

  //check if user can view this task
  if( ($ADMIN != 1 ) && ($row['globalaccess'] != "t" ) && ($row['usergroupid'] != 0 ) ) {
    if( ! in_array( $row['usergroupid'], (array)$GID ) )
        continue;
  }
  
  //date of latest post
  if(! isset($lastpost) )
    $lastpost = $row['recentpost'];
  
  //show it
  $list .= "<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row['taskid']."\">".$row['taskname']."</a><br />\n";
  $j++;
  
  //show max of 10 posts
  if($j > 10 )
    break;
}

if($list != "") {
  $content = "<small>".$list."<br />\nLast post ".nicedate($lastpost)."</small>\n";
  new_box("Recent forum posts", $content, "boxmenu" ); 
}

mysql_free_result($q);

?>