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

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//
// Functionalised recursive query
//
function list_tasks( $parent ) {

  global $x, $uid, $BASE_URL, $parent_array, $epoch, $taskgroup_flag, $lang, $task_state, $NEW_TIME;

  //init values
  $stored_groupname = "";
  $this_content = "";

  //query to get the children for this taskid
  $query="SELECT tasks.id AS id,
                 tasks.name AS taskname,
		 users.fullname AS username,
		 users.id AS userid,
		 taskgroups.name AS groupname,
		 taskgroups.description AS groupdescription,
		 tasks.status AS status,
		 tasks.finished_time AS finished_time,
		 ".$epoch."tasks.deadline) AS due,
                 ".$epoch."now()) AS now,
		 ".$epoch."tasks.edited) AS edited,
		 ".$epoch."tasks.lastforumpost) AS lastpost,
		 ".$epoch."tasks.lastfileupload) AS lastfileupload
	  FROM tasks
	  LEFT JOIN users ON ( users.id=tasks.owner )
	  LEFT JOIN taskgroups ON (tasks.taskgroupid=taskgroups.id)
	  WHERE tasks.parent=".$parent."
	  ORDER by groupname, taskname";

  //query
  $q = db_query( $query );

  //check for any tasks.  If no tasks end recursive function
  if( db_numrows($q) < 1 )
    return;

  //determine if the first line will be a task or a taskgroup descriptor
  //if it's a groupname we dont need to set the leading <UL> (html 4.01 again :/)
  if($taskgroup_flag == 0 )
    $this_content .= "<UL>";
  else
    $this_content .= "";

  //show all tasks
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

    //if there are other tasks with taskgroup set, then set "Uncategorised"
    $groupname = $row["groupname"];
    if( ($taskgroup_flag == 1 ) && ($row["groupname"] == "" ) )
      $groupname = $lang["uncategorised"];

    //if the groupname changes from last time, show the change, otherwise do nothing (also implies that if there are no groups within the
    //children of a task, not even "Uncategorised" is shown)
    if( $stored_groupname != $groupname ) {

    //quick hack to tackle HTML 4.01 verification (<UL></UL> bug)
    if( $stored_groupname != "" )
      $this_content .= "</UL>\n";

      $stored_groupname = $groupname;

      $this_content .= "<P> &nbsp;<B>".$groupname."</B>";

      //add description
      if( $row["groupdescription"] != "" )
        $this_content .= "&nbsp;<I>( ".$row["groupdescription"]." )</I>";

        $this_content .= "</P>\n";
        $this_content .= "<UL>\n";
    }

    $alert_content = "";
    $this_content .= "<LI>";
    $status_content = "";

    //have you seen this task yet ?
    $seenq = db_query( "SELECT ".$epoch."time) FROM seen WHERE taskid=".$row["id"]." AND userid=".$uid." LIMIT 1" );

    //don't show alert content for changes more than $NEW_TIME (in seconds)
    if( ($row["now"] - max($row["edited"], $row["lastpost"], $row["lastfileupload"])) > 86400*$NEW_TIME ) {

      //task is over limit in $NEW_TIME and still not looked at by you, mark it as seen, and move on...
      if( ( db_numrows( $seenq ) ) < 1 )
        db_query("INSERT INTO seen(userid, taskid, time) VALUES (".$uid.", ".$row["id"].", current_timestamp(0) ) " );
    }
    //task was changed - show the changes to you
    else {

      switch( db_numrows( $seenq ) ) {
        case "0":
          //new and never visited by this user
          $alert_content .= "<img border=\"0\" src=\"images/new.gif\" height=\"12\" width=\"31\">";
	  break;

        default:
          //check if edited since last visit
          $seen = db_result( $seenq, 0, 0 );
          if( ( $seen - $row["edited"] ) < 0 ) {
            //edited
            $alert_content .= "<img border=\"0\" src=\"images/updated.gif\" height=\"12\" width=\"60\">";
          }

          //are there forum changes ?
          if( $seen - $row["lastpost"] < 0 ) {
            $alert_content .= "<img border=\"0\" src=\"images/message.gif\" height=\"10\" width=\"14\">";
          }

          //are there file upload changes ?
          if( $seen - $row["lastfileupload"] < 0 ) {
            $alert_content .= "<img border=\"0\" src=\"images/file.gif\" height=\"11\" width=\"11\">";
          }
	  break;
       }
    }

    //status
    switch( $row["status"] ) {
      case "done":
        $status_content="<FONT color=\"darkgreen\">(".$task_state["completed"]." ".nicedate($row["finished_time"]).")</FONT>";
	break;

      case "active":
        $status_content="<FONT color=\"orange\">(".$task_state["active"].")</FONT>";
	break;

      case "notactive":
        $status_content="<FONT color=\"gray\">(".$task_state["planned"].")</FONT>";
	break;

      case "cantcomplete":
        $status_content="<FONT color=\"blue\">(".$task_state["cantcomplete"]." ".nicedate($row["finished_time"]).")</FONT>";
	break;
    }


    //merge all info about a task
    if( $alert_content!="" ) {
      $this_content .= $alert_content."&nbsp;<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=show&taskid=".$row["id"]."\">".$row["taskname"]."</A></FONT> ".$status_content;
    }else{
      $this_content .= "<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=show&taskid=".$row["id"]."\">".$row["taskname"]."</A> ".$status_content;
    }

    $this_content.= "<SMALL>";

    //add username if task is taken
    if( $row["userid"] != 0 ) {
      $this_content .= " [<A href=\"".$BASE_URL."users.php?x=".$x."&action=show&userid=".$row["userid"]."\">".$row["username"]."</A>] ";
    }
    else {
      $this_content .= "&nbsp;";
    }

    //add number of days to a task over here
    switch( $row["status"] ) {

      case "done":
      case "notactive":
      case "cantcomplete":
       break;

      default:
        $state = ( $row["due"]-$row["now"] )/86400 ;
        if( $state > 1 ) {
          $this_content .=  "(".sprintf( $lang["due_sprt"], ceil($state) ).")";
        }
        else if( $state > 0 ) {
	  $this_content .=  "(".$lang["tomorrow"].")";
        }
        else {
	    switch( -ceil($state) ) {

	      case "0":
                $this_content .=  "<FONT color=\"green\">(<I>".$lang["due_today"]."</I>)</FONT>";
	        break;

	      case "1":
                $this_content .= "<FONT color=\"red\">(".$lang["overdue_1"].")</FONT>";
	        break;

	      default:
                $this_content .= "<FONT color=\"red\">(".sprintf( $lang["overdue_sprt"], -ceil($state) ).")</FONT>";
	        break;
              }
        }
        break;
    }

    //finish the line
    $this_content .= "</SMALL></LI>\n";

    //recursive search if the subtask is listed in parent_array (it has children then)
    if( in_array( $row["id"], $parent_array, FALSE) ) {
      $this_content .= list_tasks( $row["id"]);
    }
  }

  //finish all the LI and LU's
  $this_content .= "</UL>";

  return $this_content;
}

//==== end of recursive function ====

//is the parentid set in tasks.php ?
if( ! isset($parentid) || ! is_numeric($parentid) )
  $parentid = 0;

if( ! isset($taskid) || ! is_numeric($taskid) || $taskid == 0 )
  error( "Task list", "Not a valid value for taskid");



//find all parent-tasks and add them to an array, if we load the tasks we check if they have children and if not, then do not query
$parent_query = db_query( "SELECT parent, COUNT(parent) FROM tasks GROUP BY parent" );
$parent_array = null;
for( $i=0 ; $row = @db_fetch_array($parent_query, $i ) ; $i++ ) {
  $parent_array[$i] = $row["parent"];
}

//check to see if any tasks in this project have the taskgroup descriptor set.  Use this later to toggle the taskgroup headings.
$taskgroup_flag = 0;
$project = db_result( db_query( "SELECT projectid FROM tasks WHERE id=".$taskid ), 0, 0);
$groupq = db_query( "SELECT COUNT(*) FROM tasks WHERE projectid=".$project." AND taskgroupid<>0 AND taskgroupid IS NOT NULL" );

if( db_result( $groupq, 0, 0 ) > 0 ){
  $taskgroup_flag = 1;
}

$content = list_tasks( $parentid );

//show it
if( $content != "" )
  new_box( $lang["tasks"], $content."<BR>" );

?>
