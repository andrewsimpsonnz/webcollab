<?php
/*
  $Id$
  
  (c) 2002 -2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  This shows the menubox for the tasks-part.

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//secure variables
$content  = "";
$type = "project";
$clone = "";

//the task dependent part
if(isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {

  $taskid = intval($_GET["taskid"]);
  
  include_once(BASE."includes/details.php" );

  if(($admin == 1 ) || ($taskid_row["owner"] == $uid ) ) {
    $content .= "<small><b>".$lang["admin"].":</b></small><br />\n".
                "<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit_$type"]."</a><br />\n".
                "<a href=\"tasks.php?x=$x&amp;action=delete&amp;taskid=".$taskid."\"  onclick=\"return confirm( '".sprintf($lang["del_javascript_".$type."_sprt"], $taskid_row["name"] )."')\">".$lang["delete_$type"]."</a><br />\n".
                "<br /><small><b>".$lang["global"].":</b></small><br />\n";
  }
  $content .= "<a href=\"tasks.php?x=$x&amp;action=add&amp;parentid=$taskid\">".$lang["add_task"]."</a><br />\n";

  if($admin == 1 )
    $clone = "<a href=\"tasks.php?x=$x&amp;action=clone&amp;taskid=$taskid\">".$lang["clone_$type"]."</a><br />\n";
}

//the task-independent part
$content .= "<a href=\"tasks.php?x=$x&amp;action=add\">".$lang["add_project"]."</a><br />\n";
$content .= $clone;

new_box( $lang[$type."_options"], $content, "boxmenu" );

?>
