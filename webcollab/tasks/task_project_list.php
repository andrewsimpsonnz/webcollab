<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

  WebCollab
  ---------------------------------------
  Original file written as part of Core APM by Dennis Fleurbaaij 2001/2002.

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

require_once("path.php" );
require_once( BASE."includes/security.php" );

include_once(BASE."tasks/task_common.php" );
include_once(BASE."includes/time.php" );
include_once(BASE."config.php" );

//
// List tasks
//

function listTasks($task_id ) {
   global $x, $epoch, $admin, $gid, $lang, $task_state;

  // show subtasks that are not complete
  $q = db_query("SELECT id, name, deadline, status, globalaccess, usergroupid,
                        $epoch deadline ) AS task_due,
                        $epoch now() ) AS now
                        FROM tasks
                        WHERE projectid=$task_id
                        AND parent<>0
                        AND status<>'done'
                        ORDER BY deadline DESC" );

  if(db_numrows($q ) == 0 )
    return;

   $content = "<ul>\n";

   for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {

    //check if user can view this task
    if( ($admin != 1 ) && ($row["globalaccess"] != "t" ) && ($row["usergroupid"] != 0 ) ) {
      if( ! in_array( $row["usergroupid"], (array)$gid ) )
        continue;
    }

    $content .= "<li><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["id"]."\">".$row["name"]."</a> &nbsp;";

    switch( $row["status"] ) {

      case "cantcomplete":
       $content .= "<b><i>".$task_state["cantcomplete"]."</i></b>";
       break;

     case "notactive":
       $content .= "<i>".$task_state["task_planned"]."</i>";
       break;

     default:
      //check if late
      if( ($row["now"] - $row["task_due"] ) >= 86400 ) {
        //$status = "&nbsp;<img border=\"0\" src=\"images/late.gif\" height=\"9\" width=\"23\" alt=\"late\" />";
        $content .= "<font class=\"late\">".$lang["late_g"]."</font>";
      }
      break;
    }
    $content .= "</li>\n";
  }
  $content .= "</ul>\n";
  return $content;
}

//
//START OF MAIN PROGRAM
//

//some inital values
$content = "";
$flag = 0;
$active_only = 0;

if(isset($_GET["active"] ) )
  $active_only = $_GET["active"];

// query to get the projects
  $q = db_query("SELECT id,
                        name,
                        finished_time,
                        deadline,
                        status,
                        $epoch deadline ) AS due,
                        $epoch now() ) AS now,
                        usergroupid,
                        globalaccess
                        FROM tasks
                        WHERE parent=0
                        ORDER BY name" );

//check if there are projects
if(db_numrows($q) < 1 ) {
  $content = "<div align=\"center\"><a href=\"tasks.php?x=$x&amp;action=add\">".$lang["add_project"]."</a></div>\n";
  new_box($lang["no_projects"], $content );
  return;
}
//text link for 'active' switch
$content .= "<table border=\"0\" width=\"98%\"><tr><td>\n".
            "<font class=\"textlink\">";
if($active_only )
  $content .= "[<a href=\"main.php?x=$x&amp;active=0\">"."Show all projects - translate me"."</a>]";
else
  $content .= "[<a href=\"main.php?x=$x&amp;active=1\">"."Show only active projects - translate me"."</a>]";

//text link for 'printer friendly' page
if(isset($_GET["action"]) && $_GET["action"] == "project_print" )
  $content  .= "\n[<a href=\"main.php?x=$x&amp;active=$active_only\">"."Normal page - translate me"."</a>]";
else
  $content  .= "</font></td>\n<td align=\"right\"><font class=\"textlink\">[<a href=\"tasks.php?x=$x&amp;active=$active_only&amp;action=project_print\">"."Print version - translate me"."</a>]";
$content .= "<font></td></tr>\n</table>\n";

//setup main table
$content .= "<table border=\"0\" cellpadding=\"20\">\n";

//show all projects
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

  if($active_only ) {
    //show only active projects
    switch($row["status"] ) {

      case "cantcomplete":
      case "notactive":
      case "done":
        //skip this project
        continue(2);
        break;

      case "active":
      case "nolimit":
      default:
        //carry on & show details
        break;
    }
  }

  //check the user has rights to view this project
  if( ($admin != 1 ) && ($row["globalaccess"] != "t" ) && ( $row["usergroupid"] != 0 ) ) {
    if( ! in_array( $row["usergroupid"], (array)$gid ) )
      continue;
  }

  //to indicate that there are viewable projects
  $flag = 1;

  //start list
  $content .= "<tr><td>";

  //show name and a link
  $content .= "<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["id"]."\"><b>".$row["name"]."</b></a>\n";

  // Show a nice %-of-tasks-completed bar
  $percent_complete = round(percent_complete($row["id"] ) );
  $content .= show_percent($percent_complete )."\n";

  //set project status
  $project_status = $row["status"];
  //make adjustments
  switch( $row["status"] ) {

    case "cantcomplete":
    case "notactive":
      //no adjustment required
      break;

    default:
      if($percent_complete == 100 )
        $project_status = "done";
      break;
  }

  //give some details of status
  switch($project_status ) {

    case "done":
      $finished = db_result(db_query("SELECT MAX(finished_time) FROM tasks WHERE projectid =".$row["id"]." AND parent>0" ), 0, 0 );
      $content .= $task_state["completed"]." (".nicedate( $finished ).")\n";
      break;

    case "cantcomplete":
      $content .= "<i>".sprintf($lang["project_hold_sprt"], nicedate($row["finished_time"]) )."</i><br />\n";
      $content .= "<img border=\"0\" src=\"images/clock.gif\" height=\"9\" width=\"9\" alt=\"clock\" /> &nbsp; ".nicedate( $row["deadline"] )."<br />\n";
      break;

    case "notactive":
      $content .= "<i>".$lang["project_planned"]."</i><br />\n";
      break;

    case "nolimit":
      $content .= sprintf($lang["percent_sprt"], $percent_complete)."<br />\n";
      $content .= "<i>".$lang["project_no_deadline"]."</i><br />\n";
      //show subtasks that are not complete
      $content .= listTasks($row["id"] );
      break;

    case "active":
    default:
      $content .= sprintf($lang["percent_sprt"], $percent_complete )."<br />\n";
      $content .= "<img border=\"0\" src=\"images/clock.gif\" height=\"9\" width=\"9\" alt=\"clock\" /> &nbsp; ".nicedate( $row["deadline"] )." ";
      $state = ($row["due"]-$row["now"] )/86400 ;
      if($state > 1 ) {
        $content .=  "(".sprintf($lang["due_sprt"], ceil($state) ).")\n";
      }
      else if($state > 0 ) {
        $content .=  "(".$lang["tomorrow"].")\n";
      }
      else {
        switch( -ceil($state) ) {
          case "0":
            $content .=  "<font color=\"#006400\">(".$lang["due_today"].")</font><br />\n";
            break;

          case "1":
            $content .= "<font color=\"#FF0000\">(".$lang["overdue_1"].")</font><br />\n";
            break;

          default:
            $content .= "<font color=\"#FF0000\">(".sprintf($lang["overdue_sprt"], -ceil($state) ).")</font><br />\n";
            break;
        }
      }

      //show subtasks that are not complete
      $content .= listTasks($row["id"] );
      break;
    }
  //end list
  $content .= "</td>\n</tr>\n";
}

$content .= "</table>\n";

if($flag != 1 )
  $content = $lang["no_allowed_projects"];

new_box($lang["projects"], $content );

?>
