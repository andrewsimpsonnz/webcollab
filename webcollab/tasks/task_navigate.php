<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  Created 2003 by Andrew Simpson
  
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

  This shows the menubox with the task navigation indicated.

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

//secure variables
$content  = "";

//existing task or project
if(isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {
  $taskid = $_GET["taskid"];

  // get task details
  $q = db_query("SELECT name, projectid, parent FROM tasks WHERE id=$taskid" );

  //get the data
  if( ! $row = db_fetch_array($q, 0) )
    error("Task navigate", "There was an error in fetching the task data");

  //get project name (limited to 20 characters)
  $project_name = substr(db_result(db_query("SELECT name FROM tasks WHERE id=".$row["projectid"] ), 0, 0 ), 0, 20);

  $content .= "<small><b>".$lang["pproject"].":</b></small><br />\n";

  switch( $row["parent"] ) {

    case "0":
      //project
      $content .= "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\">$project_name<br />\n";
      break;

    case ($row["projectid"] ):
      //task under project
      $task_name = substr($row["name"], 0, 20 );
      $content .= "&nbsp; <a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["projectid"]."\">$project_name</a><br />\n".
                  "<small><b>".$lang["ttask"].":</b></small><br />\n".
                  "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\">$task_name<br />\n";
      break;

    default:
      //task with parent task
      $parent_name = substr(db_result(db_query("SELECT name FROM tasks WHERE id=".$row["parent"] ), 0, 0 ), 0, 20);
      $content .= "&nbsp; <a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["projectid"]."\">$project_name</a><br />\n".
                  "<small><b>".$lang["parent_task"].":</b></small><br />\n".
                  "&nbsp; <a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["parent"]."\">$parent_name</a><br />\n".
                  "<small><b>".$lang["ttask"].":</b></small><br />\n".
                  "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\">".$row["name"]."<br />\n";
      break;

  }

  new_box("Task navigation", $content, "boxmenu" );
}

//new task
elseif( isset($_GET["parentid"]) && is_numeric($_GET["parentid"]) ){
  $parentid = $_GET["parentid"];

  // get task details
  $q = db_query("SELECT name, projectid, parent FROM tasks WHERE id=".$parentid );
  $row = db_fetch_array( $q, 0);

  //get project name
  $project_name = substr(db_result(db_query("SELECT name FROM tasks WHERE id=".$row["projectid"] ), 0, 0 ), 0, 20);

  $content .= "<small><b>".$lang["pproject"].":</b></small><br />\n".
              "&nbsp; <a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["projectid"]."\">$project_name</a><br />\n";

  switch( $row["parent"] ) {

    case "0":
      //new task under project
      $content .= "<small><b>".$lang["ttask"].":</b></small><br />\n".
                  "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\"><i>New task</i><br />\n";
      break;

    default:
      //new task with parent task
      $content .= "<small><b>".$lang["parent_task"].":</b></small><br />\n".
                  "&nbsp; <a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=$parentid\">".$row["name"]."</a><br />\n".
                  "<small><b>".$lang["ttask"].":</b></small><br />\n".
                  "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\"><i>New task</i><br />\n";
      break;

  }

  new_box( $lang["task_navigation"], $content, "boxmenu" );
}

?>
