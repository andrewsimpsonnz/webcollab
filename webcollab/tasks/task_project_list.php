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

  Lists all tasks with a "0" parent (these are called projects)

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/time.php" );
include_once( BASE."config.php" );

//
// List tasks
//

function listTasks( $task_id ) {
   global $x, $epoch, $admin, $usergroup, $lang, $task_state;

  // show subtasks that are not complete
  $q_tasks = db_query( "SELECT id, name, deadline, status, globalaccess, usergroupid,
	                ".$epoch."deadline ) AS task_due,
			".$epoch." now() ) AS now
                        FROM tasks
                        WHERE projectid=".$task_id."
                        AND parent>0
                        AND status<>'done'
                        ORDER BY deadline DESC" );

  if( !$q_tasks or db_numrows( $q_tasks ) == 0)
    return;

   $content = "<UL>";

   for( $iter=0 ; $task_row = @db_fetch_array($q_tasks, $iter ) ; $iter++) {

    //check if user can view this task
    if( ($admin != 1) && ( $task_row["globalaccess"] != "t" ) && ( $task_row["usergroupid"] != 0 ) ) {
      if( ! in_array( $task_row["usergroupid"], $usergroup ) )
        continue;
    }

    $content .= "<LI>";
    $status = "";

    switch( $task_row["status"] ) {

      case "cantcomplete":
       $status = "<B><I>".$task_state["cantcomplete"]."</I></B>";
       break;

     case "notactive":
       $status = "<I>".$lang["task_planned"]."</I>";
       break;

     default:
      //check if late
      if( ($task_row["now"] - $task_row["task_due"] ) >= 86400 ) {
        $status = "&nbsp;<img border=\"0\" src=\"images/late.gif\" height=\"9\" width=\"23\">";
      }
      break;
    }
    $content .= "<A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$task_row["id"]."\">".$task_row["name"]."</A> &nbsp;".$status;
    $content .= "</LI>\n";
  }
  $content .= "</UL>";
  return $content;
}



//
//START OF MAIN PROGRAM
//

//some inital make-nice code
$content = "<UL><BR>";
$flag = 0;
$usergroup[0] = 0;

// query to get the projects

  $q = db_query( "SELECT id,
                        name,
			finished_time,
			deadline,
			status,
			".$epoch."deadline ) AS due,
                        ".$epoch."now() ) AS now,
                        usergroupid,
                        globalaccess
			FROM tasks
		 WHERE parent=0
                 ORDER BY name" );

//check if there are projects
if( db_numrows($q) < 1 ) {
  new_box($lang["no_projects"], "<CENTER><A href=\"tasks.php?x=".$x."&action=add\">".$lang["add_project"]."</A></CENTER>");
  return;
}

//get usergroups of user, and put them in a simple array for later use
$usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
for( $i=0 ; $usergroup_row = @db_fetch_num($usergroup_q, $i ) ; $i++) {
  $usergroup[$i] = $usergroup_row[0];
}

//show all projects
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

  //check the user has rights to view this project
  if( ($admin != 1) && ( $row["globalaccess"] != "t" ) && ( $row["usergroupid"] != 0 ) ) {
    if( ! in_array( $row["usergroupid"], $usergroup ) )
      continue;
  }

  //to indicate that there are viewable projects
  $flag = 1;

  //show name and a link
  $content .= "<A href=\"tasks.php?x=".$x."&action=show&taskid=".$row["id"]."\"><B>".$row["name"]."</B></A>\n";

  // Show a nice %-of-tasks-completed bar
  $percent_complete = round(percent_complete($row["id"]));
  $content .= show_percent( $percent_complete );

  //set project status
  $project_status = $row["status"];
  //make adjustments
  switch( $row["status"] ) {

    case "cantcomplete":
    case "notactive":
    break;

  default:
    if($percent_complete == 100 )
      $project_status = "done";
      break;
  }

  //give some details of status
  switch( $project_status ) {

    case "done":
      $finished = db_result( db_query( "SELECT MAX(finished_time) FROM tasks WHERE projectid =".$row["id"]." AND parent>0" ), 0, 0 );
      $content .= $lang["ccompleted"]." (".nicedate( $finished ).")<BR>\n";
      break;

    case "cantcomplete":
      $content .= "<I>".$lang["project_hold"].nicedate( $row["finished_time"])."</I><BR>\n";
      $content .= "<img border=\"0\" src=\"images/clock.gif\" height=\"9\" width=\"9\"> &nbsp; ".nicedate( $row["deadline"] )."<BR>\n";
      break;

    case "notactive":
      $content .= "<I>".$lang["project_planned"]."</I><BR>\n";
      break;

    case "active":
    default:
      $content .= $percent_complete.$lang["percent"]."<BR>";
      $content .= "<img border=\"0\" src=\"images/clock.gif\" height=\"9\" width=\"9\"> &nbsp; ".nicedate( $row["deadline"] )." ";
      $state = ( $row["due"]-$row["now"] )/86400 ;
      if( $state > 1 ) {
        $content .=  "(".sprintf($lang["due_sprt"], ceil($state) ).")";
      }
      else if( $state > 0 ) {
	$content .=  "(".$lang["tomorrow"].")";
      }
      else {

	  switch( -ceil($state) ) {

	    case "0":
              $content .=  "<FONT color=\"green\">(".$lang["due_today"].")</FONT>";
	      break;

	    case "1":
              $content .= "<FONT color=\"red\">(".$lang["overdue_1"].")</FONT>";
	      break;

	    default:
              $content .= "<FONT color=\"red\">(".sprintf($lang["overdue_sprt"], -ceil($state) ).")</FONT>";
	      break;
            }
      }

      //show subtasks that are not complete
      $content .= listTasks( $row["id"] );
      break;
    }
  $content .= "<BR><BR>\n";
}
$content .= "</UL>\n";

if( $flag != 1 ) $content = $lang["no_allowed_projects"];

new_box($lang["projects"], $content );

?>
