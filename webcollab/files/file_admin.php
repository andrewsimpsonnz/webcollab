<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
                        '.PRE.'files.size AS size,
                        '.PRE.'files.description AS description,
                        '.PRE.'files.uploader AS uploader,
                        '.PRE.'tasks.id AS task_id,
                        '.PRE.'tasks.name AS task_name,
                        '.PRE.'users.id AS userid,
                        '.PRE.'users.fullname AS username
                        FROM '.PRE.'files
                        LEFT JOIN '.PRE.'tasks ON ('.PRE.'files.taskid='.PRE.'tasks.id)
                        LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'files.uploader)
                        ORDER BY task_name' );

if(db_numrows($q) == 0 ) {
 $content = $lang['no_files']."\n";

 new_box($lang['manage_files'], $content );
  return;
}

$content .= "<table>\n";

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  if($i > 0 ) {
    $content .= "<tr><td><hr /></td></tr>\n";
  }

  //file part
  $content .= "<tr><td>".$lang['task'].":</td><td>".
              "<a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['task_id']."\">".$row['task_name']."</a>".
              "</td></tr>\n".
              "<tr><td>".$lang['file']."</td><td>".
              "<a href=\"files.php?x=".X."&amp;action=download&amp;fileid=".$row['id']."\"". "onclick=\"window.open('files.php?x=".X."&amp;action=download&amp;fileid=".$row['id']."'); return false\">".$row['filename']."</a>".
              "&nbsp;<small>(".nice_size($row['size'] ).")&nbsp;</small>".
              //delete option
              "<span class=\"textlink\">[<a href=\"javascript:void(document.getElementById('delete_file').submit())\"".
              "onclick=\"return confirm( '".sprintf( $lang['del_file_javascript_sprt'], javascript_escape($row['filename']) )."' )\">".$lang['del']."</a>]</span></td></tr>\n".
              //user part
              "<tr><td>".$lang['uploader']." </td><td><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['userid']."\">".$row['username']."</a> (".nicetime( $row['uploaded'] ).")</td>\n";

  $content .= "<td><form id=\"delete_file\" method=\"post\" action=\"files.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
              "<input type=\"hidden\" name=\"action\" value=\"submit_del\" />\n".
              "<input type=\"hidden\" name=\"fileid\" value=\"".$row['id']."\" />\n".
              "<input type=\"hidden\" name=\"taskid\" value=\"-1\" />\n".
              "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
              "</form>\n".
              "</td></tr>\n";


  //show description
  if( $row['description'] != '' ) {
    $content .= "<tr><td>".$lang['description'].":</td><td><small><i>".nl2br($row['description'])."</i></small></td></tr>\n";
  }
  //blank line to end
  $content .= "<tr><td>&nbsp;</td></tr>\n";

}

$content .= "</table>\n";

new_box( $lang['manage_files'], $content );

?>
