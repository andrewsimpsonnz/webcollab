<?php
/*
  $Id: file_list.php 2292 2009-08-24 09:40:09Z andrewsimpson $

  (c) 2002 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Lists files assigned to a task

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/usergroup_security.php' );
include_once(BASE.'includes/details.php' );

$content = '';

if(isset($_GET['taskid']) && safe_integer($_GET['taskid']) ){
  $taskid = $_GET['taskid'];
}
else {
  error('File list', 'The taskid input is not valid' );
}
  
//check usergroup security
$taskid = usergroup_check($taskid );

//get the files from this task
$q = db_prepare('SELECT '.PRE.'files.id AS id,
                        '.PRE.'files.filename AS filename,
                        '.PRE.'files.uploaded AS uploaded,
                        '.PRE.'files.file_size AS file_size,
                        '.PRE.'files.mime AS mime,
                        '.PRE.'files.file_description AS file_description,
                        '.PRE.'files.uploader AS uploader,
                        '.PRE.'users.id AS userid,
                        '.PRE.'users.fullname AS username
                        FROM '.PRE.'files
                        LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'files.uploader)
                        WHERE '.PRE.'files.taskid=?
                        ORDER BY uploaded' );

db_execute($q, array($taskid ) );

$content .= "<ul class=\"ul-1\">\n";

//show them
for($i=0 ; $row = @db_fetch_array($q, $i) ; ++$i ) {

  //file part
  $content .= "<li><a href=\"files.php?x=".X."&amp;action=download&amp;fileid=".$row['id']."\" onclick=\"window.open('files.php?x=".X."&amp;action=download&amp;fileid=".$row['id']."'); return false\">".$row['filename']."</a> <small>(".nice_size($row['file_size'] ).") </small>";

  //owners of the file and admins have a "delete" and "update" option
  if( (ADMIN ) || (UID == $TASKID_ROW['task_owner'] ) || (UID == $row['uploader'] ) ) {

    $content .= "&nbsp;<span class=\"textlink\">".
                "[<a href=\"files.php?x=".X."&amp;action=delete&amp;fileid=".$row['id']."&amp;taskid=".$taskid."\">".$lang['del']."</a>]".
                "&nbsp;[<a href=\"files.php?x=".X."&amp;action=update&amp;fileid=".$row['id']."&amp;taskid=".$taskid."\">".$lang['update']."</a>]</span><br />\n";

  }
  else {
    $content .= "<br />\n";
  }

  //user part
  $content .= $lang['uploader']." <a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['userid']."\">".$row['username']."</a> (".nicetime( $row['uploaded'] ).")<br />";

  //show description
  if( $row['file_description'] != '' ) {
    $content .= "\n<small><i>".nl2br(bbcode($row['file_description'] ) )."</i></small>";
  }
  $content .= "</li>\n";
}
$content .= "</ul>\n";

if($i == 0 ) {
  //no files found in database
  $content = '';
}

if((! GUEST ) && ($TASKID_ROW['archive'] == 0) ){
  $content .= "<span class=\"textlink\">[<a href=\"files.php?x=".X."&amp;taskid=".$taskid."&amp;action=upload\">".$lang['add_file']."</a>]</span>\n";
}

new_box($lang['files_assoc_'.$TYPE], $content, "boxdata-normal", "head-normal", "boxstyle-short", "file-list" );

?>
