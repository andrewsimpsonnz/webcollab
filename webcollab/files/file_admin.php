<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Lists files assigned to a task

*/
require_once("path.php" );

require_once(BASE."includes/security.php" );

include_once(BASE."includes/time.php" );

$content = "";

if(! ADMIN )
  error("Access denied", "This feature is only for admins" );


//get the files from this task
$q = db_query("SELECT ".PRE."files.id AS id,
                        ".PRE."files.filename AS filename,
                        ".$epoch.PRE."files.uploaded) AS uploaded,
                        ".PRE."files.size AS size,
                        ".PRE."files.mime AS mime,
                        ".PRE."files.description AS description,
                        ".PRE."files.uploader AS uploader,
                        ".PRE."tasks.owner AS owner,
                        ".PRE."tasks.id AS task_id,
                        ".PRE."tasks.name AS task_name,
                        ".PRE."users.id AS userid,
                        ".PRE."users.fullname AS username
                        FROM ".PRE."files
                        LEFT JOIN ".PRE."tasks ON (".PRE."files.taskid=".PRE."tasks.id)
                        LEFT JOIN ".PRE."users ON (".PRE."users.id=".PRE."files.uploader)
                        ORDER BY task_name" );

if(db_numrows($q) == 0 ) {
 $content = $lang['no_files']."\n";

 new_box($lang['manage_files'], $content );
  return;
}

$content .= "<table>\n";

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {

  //file part
  $content .= "<tr><td>".$lang['task'].":</td><td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row['task_id']."\">".$row['task_name']."</a></td></tr>\n".
              "<tr><td>".$lang['file']."</td><td><a href=\"files.php?x=$x&amp;action=download&amp;fileid=".$row['id']."\" onclick=\"window.open('files.php?x=$x&amp;action=download&amp;fileid=".$row['id']."'); return false\">".$row['filename']."</a>&nbsp;<small>(".$row['size'].$lang['bytes'].")&nbsp;</small>".
              //delete option
              "<span class=\"textlink\">[<a href=\"files.php?x=$x&amp;action=submit_del&amp;fileid=".$row['id']."&amp;taskid=-1\" onclick=\"return confirm( '".sprintf( $lang['del_file_javascript_sprt'], javascript_escape($row['filename']) )."' )\">".$lang['del']."</a>]</span></td></tr>\n".
              //user part
              "<tr><td>".$lang['uploader']." </td><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row['userid']."\">".$row['username']."</a> (".nicetime( $row['uploaded'], 1 ).")</td></tr>\n";

  //show description
  if( $row['description'] != "" )
    $content .= "<tr><td>".$lang['description'].":</td><td><small><i>".$row['description']."</i></small></td></tr>\n";

  //blank line to end
  $content .= "<tr><td>&nbsp;</td></tr>\n";    
    
}

$content .= "</table>\n";

new_box( $lang['manage_files'], $content );

?>