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

  This shows the menubox for the tasks-part.

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

//secure variables
$content  = "";
$type = "project";
$clone = "";

//the task dependent part
if(isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {

  $taskid = $_GET["taskid"];

  if( ($admin == 1 ) || @db_result(db_query("SELECT COUNT(*) FROM tasks WHERE id=$taskid AND owner=$uid" ), 0, 0 ) == 1) {

    $q = db_query("SELECT name, parent FROM tasks WHERE id=$taskid" );
    $row = db_fetch_array($q, 0 );

    switch($row["parent"]) {
      case 0:
        $type = "project";
        break;

      default:
        $type = "task";
        break;
    }


    $content .= "<small><b>".$lang["admin"].":</b></small><br />\n".
                "<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit_$type"]."</a><br />\n".
                "<a href=\"tasks.php?x=$x&amp;action=delete&amp;taskid=".$taskid."\"  onClick=\"return confirm( '".sprintf($lang["del_javascript_".$type."_sprt"], $row["name"] )."')\">".$lang["delete_$type"]."</a><br />\n".
                "<br /><small><b>".$lang["global"].":</b></small><br />\n";
  }
  $content .= "<a href=\"tasks.php?x=$x&amp;action=add&amp;parentid=$taskid\">".$lang["add_task"]."</a><br />\n";

  if($admin = 1 )
    $clone = "<a href=\"tasks.php?x=$x&amp;action=clone&amp;taskid=$taskid\">"."Clone - translate me & add type"."</a><br />\n";
}

//the task-independent part
$content .= "<a href=\"tasks.php?x=$x&amp;action=add\">".$lang["add_project"]."</a><br />\n";
$content .= $clone;

new_box( $lang[$type."_options"], $content, "boxmenu" );

?>
