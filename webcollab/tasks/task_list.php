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

  Lists all tasks and subtasks

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

//init values
$content = "";

//
// Functionalised recursive query
//
function list_tasks($parent ) {

  global $x, $uid, $gid, $admin, $parent_array, $epoch, $taskgroup_flag, $lang, $task_state, $NEW_TIME, $DATABASE_TYPE, $parentid, $ul_flag;

  //init values
  $stored_groupname = NULL;
  $this_content = "";
  $no_group = "";
  $ul_flag = 0;

//force mysql to put 'uncategorised' items at the bottom
if( $DATABASE_TYPE == "mysql")
  $no_group = "IF(taskgroups.name IS NULL, 1, 0), ";

//query to get the children for this taskid
$q = db_query("SELECT tasks.id AS id,
                tasks.name AS taskname,
                tasks.status AS status,
                tasks.finished_time AS finished_time,
                $epoch tasks.deadline) AS due,
                $epoch tasks.edited) AS edited,
                $epoch tasks.lastforumpost) AS lastpost,
                $epoch tasks.lastfileupload) AS lastfileupload,
                tasks.globalaccess AS globalaccess,
                tasks.usergroupid AS usergroupid,
                users.fullname AS username,
                users.id AS userid,
                taskgroups.name AS groupname,
                taskgroups.description AS groupdescription,
                $epoch now()) AS now
                FROM tasks
                LEFT JOIN users ON ( users.id=tasks.owner )
                LEFT JOIN taskgroups ON (taskgroups.id=tasks.taskgroupid)
                WHERE tasks.parent=$parent
                ORDER by $no_group groupname, taskname" );

  //check for any tasks.  If no tasks end recursive function
  if(db_numrows($q) < 1 )
    return;

  //determine if the first line will be a task listing or a taskgroup name
  //if it's a taskgroup name we don't need to set the leading <ul>
  if( ($taskgroup_flag == 1 ) && ($parent == $parentid ) )
    $this_content .= "";
  else
    $this_content .= "<ul>";

  //show all tasks
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

    //check for private usergroups
    if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {

      if( ! in_array( $row["usergroupid"], (array)$gid ) )
         continue;
    }


    //check if there are taskgroups set, and if this is the first layer of tasks
    if( ($taskgroup_flag == 1 ) && ($parent == $parentid ) ) {

      //set taskgroup name, or 'Uncategorised' if none
      if( $row["groupname"] == NULL )
        $groupname = $lang["uncategorised"];
      else
        $groupname = $row["groupname"];

      //check if taskgroup has changed from last iteration
      if($stored_groupname != $groupname ) {

        //don't need </ul> before first taskgroup heading (no <ul> is set)
        if($stored_groupname != NULL )
          $this_content .= "</ul>\n";

        //show taskgroup name
        $this_content .= "<p><b>".$groupname."</b>";

        //add taskgroup description
        if($row["groupdescription"] != NULL )
          $this_content .=  "&nbsp;<i>( ".$row["groupdescription"]." )</i>";

        $this_content .= "</p>\n";
        $this_content .= "<ul>\n";

        //store current groupname
        $stored_groupname = $groupname;
      }
    }

    //tell main progam we have set <ul> (and that we have output to display)
    $ul_flag = 1;

    $alert_content = "";
    $status_content = "";
    $this_content .= "<li>";

    //have you seen this task yet ?
    $seenq = db_query("SELECT  $epoch time) FROM seen WHERE taskid=".$row["id"]." AND userid=".$uid." LIMIT 1" );

    //don't show alert content for changes more than $NEW_TIME (in seconds)
    if( ($row["now"] - max($row["edited"], $row["lastpost"], $row["lastfileupload"] ) ) > 86400*$NEW_TIME ) {

      //task is over limit in $NEW_TIME and still not looked at by you, mark it as seen, and move on...
      if( (db_numrows( $seenq ) ) < 1 )
        db_query("INSERT INTO seen(userid, taskid, time) VALUES ($uid, ".$row["id"].", now() ) " );
    }
    //task has changed since last seen - show the changes to you
    else {

      switch(db_numrows($seenq ) ) {
        case "0":
          //new and never visited by this user
          //$alert_content .= "<img border=\"0\" src=\"images/new.gif\" height=\"12\" width=\"31\" alt =\"new\" />";
          $alert_content .= "<font class=\"new\">".$lang["new_g"]."</font>&nbsp;";
          break;

        default:
          //check if edited since last visit
          $seen = db_result($seenq, 0, 0 );
          if( ($seen - $row["edited"] ) < 0 ) {
            //edited
            //$alert_content .= "<img border=\"0\" src=\"images/updated.gif\" height=\"12\" width=\"60\" alt=\"updated\" /> &nbsp;";
            $alert_content .= "<font class=\"updated\">".$lang["updated_g"]."</font>&nbsp;";
          }

          //are there forum changes ?
          if($seen - $row["lastpost"] < 0 ) {
            $alert_content .= "<img border=\"0\" src=\"images/message.gif\" height=\"10\" width=\"14\" alt=\"message\" /> &nbsp;";
          }

          //are there file upload changes ?
          if($seen - $row["lastfileupload"] < 0 ) {
            $alert_content .= "<img border=\"0\" src=\"images/file.gif\" height=\"11\" width=\"11\" alt=\"file\" /> &nbsp;";
          }
          break;
       }
    }

    //status
    switch($row["status"] ) {
      case "done":
        $status_content="<font color=\"#006400\">(".$task_state["completed"]." ".nicedate($row["finished_time"]).")</font>";
        break;

      case "active":
        $status_content="<font color=\"#FFA500\">(".$task_state["active"].")</font>";
        break;

      case "notactive":
        $status_content="<font color=\"#BEBEBE\">(".$task_state["planned"].")</font>";
        break;

      case "cantcomplete":
        $status_content="<font color=\"#0000FF\">(".$task_state["cantcomplete"]." ".nicedate($row["finished_time"]).")</font>";
        break;
    }


    //merge all info about a task
    $this_content .= $alert_content."<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["id"]."\">".$row["taskname"]."</a>&nbsp;$status_content";
    $this_content .= "<small>";

    //add username if task is taken
    if($row["userid"] != 0 ) {
      $this_content .= "&nbsp;[<a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["userid"]."\">".$row["username"]."</a>]&nbsp;";
    }
    else {
      $this_content .= "&nbsp;";
    }

    //add number of days to a task over here
    switch($row["status"] ) {

      case "done":
      case "notactive":
      case "cantcomplete":
        break;

      default:
        $state = ($row["due"]-$row["now"] )/86400 ;
        if($state > 1 ) {
          $this_content .=  "(".sprintf( $lang["due_sprt"], ceil($state) ).")";
        }
        else if($state > 0 ) {
          $this_content .=  "(".$lang["tomorrow"].")";
        }
        else {
          switch( -ceil($state) ) {

            case 0:
              $this_content .=  "<font color=\"#00640\">(<i>".$lang["due_today"]."</i>)</font>";
              break;

            case 1:
              $this_content .= "<font color=\"#FF0000\">(".$lang["overdue_1"].")</font>";
              break;

            default:
              $this_content .= "<font color=\"#FF0000\">(".sprintf($lang["overdue_sprt"], -ceil($state) ).")</font>";
              break;
          }
        }
        break;
    }

    //finish the line
    $this_content .= "</small>";

    //recursive search if the subtask is listed in parent_array (it has children then)
    if(in_array( $row["id"], $parent_array, FALSE) ) {
      $this_content .= list_tasks( $row["id"]);
      $this_content .= "\n</ul></li>\n";
    }
    else{
      $this_content .= "</li>\n";
    }
  }

  return $this_content;
}

//==== end of recursive function ====

//is the parentid set in tasks.php ?
if( ! isset($parentid) || ! is_numeric($parentid) || $parentid == 0 )
  error( "Task list", "Not a valid value for taskid");

//find all parent-tasks and add them to an array, if we load the tasks we check if they have children and if not, then do not query
$projectid = db_result(db_query("SELECT projectid FROM tasks WHERE id=$parentid" ), 0, 0 );
$parent_query = db_query("SELECT DISTINCT parent FROM tasks WHERE projectid=$projectid" );
$parent_array = NULL;
for( $i=0 ; $row = @db_fetch_array($parent_query, $i ) ; $i++ ) {
  $parent_array[$i] = $row["parent"];
}

//check to see if any tasks at this task level have the taskgroup descriptor set.
//Use this later to toggle the taskgroup headings.
if( db_result(db_query("SELECT COUNT(*) FROM tasks WHERE parent=$parentid AND taskgroupid<>0" ), 0, 0 ) > 0 )
  $taskgroup_flag = 1;
else
  $taskgroup_flag = 0;


$content  = list_tasks($parentid );

//if there is output, then show it
if($ul_flag == 1 ){
  //finish off the closing </ul>
  $content .= "\n</ul>\n";
  new_box( $lang["tasks"], $content );
}

?>
