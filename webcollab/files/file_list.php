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

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/details.php' );
include_once( BASE.'includes/usergroup_security.php' );

$content = '';

if(empty($_REQUEST['taskid']) || ! is_numeric($_REQUEST['taskid']) ){
  error('File list', 'The taskid input is not valid' ); 
}

$taskid = intval($_REQUEST['taskid']);
//check usergroup security
$taskid = usergroup_check($taskid );

//get the files from this task
$q = db_query('SELECT '.PRE.'files.id AS id,
                        '.PRE.'files.filename AS filename,
                        '.$epoch.PRE.'files.uploaded) AS uploaded,
                        '.PRE.'files.size AS size,
                        '.PRE.'files.mime AS mime,
                        '.PRE.'files.description AS description,
                        '.PRE.'files.uploader AS uploader,
                        '.PRE.'users.id AS userid,
                        '.PRE.'users.fullname AS username
                        FROM '.PRE.'files
                        LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'files.uploader)
                        WHERE '.PRE.'files.taskid='.$taskid.'
                        ORDER BY uploaded' );

if(db_numrows($q ) != 0 ) {

  $content .= "<table>\n";

  //show them
  for($i=0 ; $row = @db_fetch_array($q, $i) ; ++$i ) {

    //file part
    $content .= "<tr><td><a href=\"files.php?x=".$x."&amp;action=download&amp;fileid=".$row['id']."\" onclick=\"window.open('files.php?x=".$x."&amp;action=download&amp;fileid=".$row['id']."'); return false\">".$row['filename']."</a> <small>(".$row['size'].$lang['bytes'].") </small>";

    //owners of the file and admins have a "delete" option
    if( (ADMIN ) || (UID == $TASKID_ROW['owner'] ) || (UID == $row['uploader'] ) ) {
      $content .= "&nbsp;<span class=\"textlink\">[<a href=\"files.php?x=".$x."&amp;action=submit_del&amp;fileid=".$row['id']."&amp;taskid=".$taskid."\" onclick=\"return confirm('".sprintf( $lang['del_file_javascript_sprt'], javascript_escape($row['filename'] ) )."' )\">".$lang['del']."</a>]</span></td></tr>\n";
    } 
    else {
      $content .= "</td></tr>\n";
    }
    
    //user part
    $content .= "<tr><td>".$lang['uploader']." <a href=\"users.php?x=".$x."&amp;action=show&amp;userid=".$row['userid']."\">".$row['username']."</a> (".nicetime( $row['uploaded'], 1 ).")</td></tr>\n";

    //show description
    if( $row['description'] != '' ) {
      $content .= "<tr><td><small><i>".nl2br($row['description'])."</i></small></td></tr>\n";
    }
    //padding for next entry
    $content .= "<tr><td>&nbsp;</td></tr>\n";
  }
  $content .= "</table>";
}


if((! GUEST ) && ($TASKID_ROW['archive'] == 0) ){
  $content .= "<span class=\"textlink\">[<a href=\"files.php?x=".$x."&amp;taskid=".$taskid."&amp;action=upload\">".$lang['add_file']."</a>]</span>";
}

new_box($lang['files_assoc_'.$TYPE], $content, 'boxdata2' );

?>