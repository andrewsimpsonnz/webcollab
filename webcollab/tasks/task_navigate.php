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


//secure variables
$content  = "";

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//existing task or project
if( isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {
  $taskid = $_GET["taskid"];

  // get task details
  $q = db_query( "SELECT name, projectid, parent FROM tasks WHERE id=".$taskid );
  $row = db_fetch_array( $q, 0);

  //get project name (limited to 20 characters)
  $project_name = substr( db_result( db_query( "SELECT name FROM tasks WHERE id=".$row["projectid"] ), 0, 0 ), 0, 20);

  $content .= "<SMALL><B>".$lang["pproject"].":</B></SMALL><BR>\n";

  switch( $row["parent"] ) {

    case "0":
      //project
      $content .= "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\">".$project_name."<BR>\n";
      break;

    case ($row["projectid"]):
      //task under project
      $content .= "&nbsp; <A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$row["projectid"]."\">".$project_name."</A><BR>\n";
      $content .= "<SMALL><B>".$lang["ttask"].":</B></SMALL><BR>\n";
      $task_name = substr($row["name"], 0, 20 );
      $content .= "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\">".$task_name."<BR>\n";
      break;

    default:
      //task with parent task
      $content .= "&nbsp; <A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$row["projectid"]."\">".$project_name."</A><BR>\n";
      $parent_name = substr( db_result( db_query( "SELECT name FROM tasks WHERE id=".$row["parent"] ), 0, 0 ), 0, 20);
      $content .= "<SMALL><B>".$lang["parent_task"].":</B></SMALL><BR>\n";
      $content .= "&nbsp; <A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$row["parent"]."\">".$parent_name."</A><BR>\n";
      $content .= "<SMALL><B>".$lang["ttask"].":</B></SMALL><BR>\n";
      $content .= "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\">".$row["name"]."<BR>\n";
      break;

  }

  new_box( "Task navigation", $content );
}

//new task
elseif( isset($_GET["parentid"]) && is_numeric($_GET["parentid"]) ){
  $parentid = $_GET["parentid"];

  // get task details
  $q = db_query( "SELECT name, projectid, parent FROM tasks WHERE id=".$parentid );
  $row = db_fetch_array( $q, 0);

  //get project name
  $project_name = substr( db_result( db_query( "SELECT name FROM tasks WHERE id=".$row["projectid"] ), 0, 0 ), 0, 20);

  $content .= "<SMALL><B>".$lang["pproject"].":</B></SMALL><BR>\n";
  $content .= "&nbsp; <A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$row["projectid"]."\">".$project_name."</A><BR>\n";

  switch( $row["parent"] ) {

    case "0":
      //new task under project
      $content .= "<SMALL><B>".$lang["ttask"].":</B></SMALL><BR>\n";
      $content .= "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\"><I>New task</I><BR>\n";
      break;

    default:
      //new task with parent task
      $content .= "<SMALL><B>".$lang["parent_task"].":</B></SMALL><BR>\n";
      $content .= "&nbsp; <A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$parentid."\">".$row["name"]."</A><BR>\n";
      $content .= "<SMALL><B>".$lang["ttask"].":</B></SMALL><BR>\n";
      $content .= "&nbsp; <img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\"><I>New task</I><BR>\n";
      break;

  }

  new_box( $lang["task_navigation"], $content );
}

?>
