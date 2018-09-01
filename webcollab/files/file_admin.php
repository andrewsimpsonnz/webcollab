<?php
/*
  $Id$

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

if(! ADMIN ) {
  error('Access denied', 'This feature is only for admins' );
}

include_once(BASE.'includes/time.php' );

$content = '';

//get the files from this task
$q = db_query('SELECT '.PRE.'files.id AS id,
                        '.PRE.'files.filename AS filename,
                        '.PRE.'files.uploaded AS uploaded,
                        '.PRE.'files.file_size AS file_size,
                        '.PRE.'files.file_description AS file_description,
                        '.PRE.'files.uploader AS uploader,
                        '.PRE.'tasks.id AS task_id,
                        '.PRE.'tasks.task_name AS task_name,
                        '.PRE.'users.id AS userid,
                        '.PRE.'users.fullname AS username
                        FROM '.PRE.'files
                        LEFT JOIN '.PRE.'tasks ON ('.PRE.'files.taskid='.PRE.'tasks.id)
                        LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'files.uploader)
                        ORDER BY task_name' );

$content .= "<table class=\"celldata\">\n";

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  if($i > 0 ) {
    //not the first line, need to add a divider
    $content .= "<tr><td colspan=\"2\" class=\"divline\"></td></tr>\n";
  }

  //file part
  $content .= "<tr class=\"searchlist\"><td>".$lang['task'].":</td><td>".
              "<a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['task_id']."\">".$row['task_name']."</a>".
              "</td></tr>\n".
              "<tr class=\"searchlist\"><td>".$lang['file']."</td><td>".
              "<a href=\"files.php?x=".X."&amp;action=download&amp;fileid=".$row['id']."\" onclick=\"window.open('files.php?x=".X."&amp;action=download&amp;fileid=".$row['id']."'); return false\">".$row['filename']."</a>".
              "&nbsp;<small>(".nice_size($row['file_size'] ).")&nbsp;</small>".
              //delete option
              "<span class=\"textlink\">[<a href=\"files.php?x=".X."&amp;action=delete&amp;fileid=".$row['id']."&amp;admin=1&amp;taskid=".$row['task_id']."\">".$lang['del']."</a>]</span></td></tr>\n".
              //user part
              "<tr class=\"searchlist\"><td>".$lang['uploader']." </td><td><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['userid']."\">".$row['username']."</a> (".nicetime( $row['uploaded'] ).")</td></tr>\n";

  //show description
  if( $row['file_description'] != '' ) {
    $content .= "<tr><td>".$lang['description'].":</td><td><small><i>".nl2br(bbcode($row['file_description']))."</i></small></td></tr>\n";
  }
}
$content .= "</table>\n";

if($i == 0 ) {
  //no files found in database
  $content = $lang['no_files']."\n";
  new_box($lang['manage_files'], $content );
}
else {
  //show found content
  new_box($lang['manage_files'], $content );
}

?>
