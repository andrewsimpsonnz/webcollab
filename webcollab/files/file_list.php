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
require_once( BASE."includes/security.php" );

include_once( BASE."config.php" );

$content = "";

if( ! isset($_GET["taskid"]) || ! is_numeric($_GET["taskid"]) )
  return;

$taskid = $_GET["taskid"];

//check usergroup security
require_once( BASE."includes/usergroup_security.php" );

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
                        users.id AS userid,
                        users.fullname AS username
                        FROM files
                        LEFT JOIN tasks ON (files.taskid=tasks.id)
                        LEFT JOIN users ON (users.id=files.uploader)
                        WHERE files.taskid=$taskid
                        ORDER BY uploaded" );

$content .= "<br />";

if(db_numrows($q ) != 0 ) {

  $content .= "<table border=\"0\">\n";

  //show them
  for($i=0 ; $row = @db_fetch_array($q, $i) ; $i++ ) {

    //file part
    $content .= "<tr><td><a href=\"files/file_download.php?x=$x&amp;fileid=".$row["id"]."\" window=\"_new\">".$row["filename"]."</a> <small>(".$row["size"].$lang["bytes"].") </small>";

    //owners of the file and admins have a "delete" option
    if( ($admin == 1) || ($uid == $row["owner"] ) || ($uid == $row["uploader"] ) ) {
      $content .= " [<a href=\"files/file_submit.php?x=$x&amp;action=del&amp;fileid=".$row["id"]."&amp;taskid=$taskid\" onClick=\"return confirm('".sprintf( $lang["del_file_javascript_sprt"], $row["filename"] )."' )\">".$lang["del"]."</a>]</tr></td>\n";
    } else
      $content .= "</tr></td>\n";

    //user part
    $content .= "<tr><td>".$lang["uploader"]." <a href=\"users.php?x=$x&amp;action=show&userid=".$row["userid"]."\">".$row["username"]."</a> (".nicetime( $row["uploaded"] ).")</tr></td>\n";

    //show description
    if( $row["description"] != "" )
      $content .= "<tr><td><small><i>".$row["description"]."</i></small></tr></td>\n";

    //padding for next entry
    $content .= "<tr><td>&nbsp;</tr></td>\n";
  }
  $content .= "</table>";
}

$content .= "<small>[<a href=\"files.php?x=$x&amp;taskid=$taskid&amp;action=upload\">".$lang["add_file"]."</a>]</small>";

$type = $lang["project"];
if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE parent=0 AND id=$taskid" ) ) == 0 )
  $type = $lang["task"];

new_box( sprintf($lang["files_assoc_sprt"], $type ), $content );

?>
