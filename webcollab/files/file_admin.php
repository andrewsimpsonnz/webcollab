<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

include_once(BASE."config.php" );
include_once(BASE."includes/time.php" );

$content = "";

if($admin != 1 )
  error("Access denied", "This feature is only for admins" );


//get the files from this task
$q = db_query("SELECT files.oid AS oid,
                        files.id AS id,
                        files.filename AS filename,
                        files.uploaded AS uploaded,
                        files.size AS size,
                        files.mime AS mime,
                        files.description AS description,
                        files.uploader AS uploader,
                        tasks.owner AS owner,
                        tasks.id AS task_id,
                        tasks.name AS task_name,
                        users.id AS userid,
                        users.fullname AS username
                        FROM files
                        LEFT JOIN tasks ON (files.taskid=tasks.id)
                        LEFT JOIN users ON (users.id=files.uploader)
                        ORDER BY task_name" );

if(db_numrows($q) == 0 ) {
 $content = $lang["no_files"]."\n";

 new_box($lang["manage_files"], $content );
  return;
}

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {

  $content .= "<table border=\"0\">\n";

  //file part
  $content .= "<tr><td>".$lang["task"].":</td><td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["task_id"]."\">".$row["task_name"]."</a></td></tr>\n".
              "<tr><td>".$lang["file"]."</td><td><a href=\"files/file_download.php?x=$x&amp;fileid=".$row["id"]."\" target=\"filewindow\">".$row["filename"]."</a>&nbsp;<small>(".$row["size"].$lang["bytes"].")&nbsp;</small>".
              //delete option
              "<font class=\"textlink\">[<a href=\"files/file_submit.php?x=$x&amp;action=del&amp;fileid=".$row["id"]."&amp;taskid=".$taskid."\" onClick=\"return confirm( '".sprintf( $lang["del_file_javascript_sprt"], $row["filename"])."' )\">".$lang["del"]."</a>]</font></td></tr>\n".
              //user part
              "<tr><td>".$lang["uploader"]." </td><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["userid"]."\">".$row["username"]."</a> (".nicetime( $row["uploaded"] ).")</td></tr>\n";

  //show description
  if( $row["description"] != "" )
    $content .= "<tr><td colspan=\"2\"><small><i>".$row["description"]."</i></small></td></tr>\n";

  $content .= "</table><br />\n";
}

new_box( $lang["manage_files"], $content );

?>
