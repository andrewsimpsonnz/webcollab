<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>  
  
  WebCollab
  ---------------------------------------
  
  Parts of this file originally written as Core APM by Dennis Fleurbaaij 2001/2002.

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

  Show a task

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

include_once(BASE."tasks/task_common.php" );
include_once(BASE."includes/details.php" );
include_once(BASE."includes/time.php" );


//is there an id ?
if( ! isset( $_GET["taskid"]) || ! is_numeric($_GET["taskid"]) || $_GET["taskid"] == 0 )
  error("Task show", "Not a valid value for taskid" );

$taskid = intval($_GET["taskid"]);

//check usergroup security
require_once(BASE."includes/usergroup_security.php");

$q = db_query("SELECT tasks.id AS id,
                      users.fullname AS fullname,
                      taskgroups.name AS taskgroup_name,
                      usergroups.name AS usergroup_name
                    FROM tasks
                    LEFT JOIN users ON (users.id=tasks.owner)
                    LEFT JOIN taskgroups ON (taskgroups.id=tasks.taskgroupid)
                    LEFT JOIN usergroups ON (usergroups.id=tasks.usergroupid)
                    WHERE tasks.id=$taskid" );


//get the data
if( ! ($row = db_fetch_array($q, 0 ) ) )
  error("Task show", "The requested item has either been deleted, or is now invalid.");

//mark this as seen in seen ;)
@db_query("DELETE FROM seen WHERE userid=$uid AND taskid=$taskid", 0);
db_query("INSERT INTO seen(userid, taskid, time) VALUES ($uid, $taskid, now() ) " );

//text link for 'printer friendly' page
if(isset($_GET["action"]) && $_GET["action"] == "show_print" )
  $content  = "<p><font class=\"textlink\">[<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=$taskid\">".$lang["normal_version"]."</a>]</font></p>";
else
  $content  = "<div align=\"right\"><font class=\"textlink\">[<a href=\"tasks.php?x=$x&amp;action=show_print&amp;taskid=$taskid\">".$lang["print_version"]."</a>]</font></div>\n";

//percentage_completed gauge if this is a project
if( $taskid_row["parent"] == 0 ) {
  $content .= sprintf( $lang["percent_project_sprt"], $taskid_row["completed"] )."\n";
  $content .= show_percent( $taskid_row["completed"] );
}

//start of header table
$content .= "<table width=\"98%\"><tr><td>\n";

//project/task name
$content .= "<b>".$taskid_row["name"]."</b><br /><br /></td></tr>\n";

//show text
$content .= "<tr><td bgcolor=\"#EEEEEE\" width=\"95%\">\n";

$content .= nl2br($taskid_row["text"] );
$content .= "</td></tr></table>\n";

//start of info table
$content .= "<table class=\"celldata\">\n";

//get owner information
if( $taskid_row["owner"] == 0 ) {
  $content .= "<tr><td>".$lang["owned_by"].":</td><td>".$lang["nobody"]."</td></tr>\n";
} else {
  $content .= "<tr><td>".$lang["owned_by"].": </td><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$taskid_row["owner"]."\">".$row["fullname"]."</a></td></tr>\n";
}

//get creator information (null if creator has been deleted!)
$creator = @db_result(db_query("SELECT fullname FROM users WHERE id=".$taskid_row["creator"] ), 0, 0  );
$content .= "<tr><td>".$lang["created_on"].": </td><td>";
if($creator == NULL )
  $content .= nicedate($taskid_row["created"]);
else
  $content .= sprintf($lang["by_sprt"], nicedate($taskid_row["created"]), "<a href=\"users.php?x=$x&amp;action=show&amp;userid=".$taskid_row["creator"]."\">".$creator."</a>");
$content .= "</td></tr>\n";

//get deadline
$content .= "<tr><td>".$lang["deadline"].": </td><td>".nicedate($taskid_row["deadline"])."</td></tr>\n";

//get priority
$content .= "<tr><td>".$lang["priority"].": </td><td>";
switch($taskid_row["priority"] ) {

  case 0:
    $content .=  $task_state["dontdo"];
    break;
  case 1:
    $content .=  $task_state["low"];
    break;
  case 2:
    $content .=  $task_state["normal"];
    break;
  case 3:
    $content .=  "<b>".$task_state["high"]."</b>";
    break;
  case 4:
    $content .=  "<b><font color=\"red\">".$task_state["yesterday"]."</font></b>";
    break;
}
$content .= "</td></tr>\n";

//if this is a project don't show status info and task completion date
if($taskid_row["parent"] != 0 ) {

  $content .= "<tr><td>".$lang["status"].": </td><td>";
  switch($taskid_row["status"] ) {

    case "created":
      $content .=  $task_state["new"];
      break;
    case "notactive":
      $content .=  $task_state["planned"];
      break;
    case "active":
      $content .=  $task_state["active"];
      break;
    case "cantcomplete":
      $content .=  "<b>".$task_state["cantcomplete"]."</b>";
      break;
    case "done":
      $content .=  $task_state["done"];
      break;
    default:
      $content .=  $taskid_row["status"];
      break;
  }
  $content .= "</td></tr>\n";

  //is there a finished date ?
  switch($taskid_row["status"] ) {
    case "done":
      $content .= "<tr><td>".$lang["completed_on"].": </td><td>".nicedate($taskid_row["finished_time"])."</td></tr>\n";
      break;

    case "cantcomplete":
      $content .= "<tr><td>".$lang["modified_on"].": </td><td>".nicedate($taskid_row["finished_time"])."</td></tr>\n";
      break;

    default:
      break;
  }
}
else{
  //project - show the finish date and status
  switch($taskid_row["status"] ) {
    case "cantcomplete":
      $content .= "<tr><td>".$lang["status"].": </td><td><b>".$lang["project_on_hold"]."</b></td></tr>\n";
      $content .= "<tr><td>".$lang["modified_on"].": </td><td>".nicedate($taskid_row["finished_time"])."</td></tr>\n";
      break;

    case "notactive":
      $content .= "<tr><td>".$lang["status"].": </td><td>".$lang["project_planned"]."</td></tr>\n";
      break;

    case "nolimit":
      $content .= "<tr><td>".$lang["status"].": </td><td>".$lang["project_no_deadline"]."</td></tr>\n";
      break;

    case "done":
    default:
      if($taskid_row["completed"] == 100 )  
        $content .= "<tr><td>".$lang["completed_on"].": </td><td>".nicedate($taskid_row["completion_time"] )."</td></tr>\n";
      break;
  }
}

//task group
if($taskid_row["parent"] != 0 ) {

  switch($taskid_row["taskgroupid"] ){
    case "0":
      $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" target=\"helpwindow\">".$lang["taskgroup"]."</a>: </td><td>".$lang["none"]."</td></tr>\n";
      break;

    default:
      $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" target=\"helpwindow\">".$lang["taskgroup"]."</a>: </td><td>".$row["taskgroup_name"]."</td></tr>\n";
      break;
  }
}

//set title variables as approriate for task or project
switch($taskid_row["parent"] ){
  case "0":
    $title = $lang["project_details"];
    $type = "project";
    break;

 default:
    $title = $lang["task_info"];
    $type = "task";
    break;
}

//show the usergroupid
if( $taskid_row["usergroupid"] != 0 ) {
  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" target=\"helpwindow\">".$lang["usergroup"]."</a>: </td><td>".$row["usergroup_name"]." ";

  switch($taskid_row["globalaccess"] ){
    case 't':
      $content .= $lang[$type."_accessible"]."</td></tr>\n";
      break;

    case 'f':
    default:
      $content .= "<b>".$lang[$type."_not_accessible"]."</b></td></tr>\n";
      break;
  }

  if($taskid_row["groupaccess"] == 't' )
      $content .= "<tr><td>&nbsp;</td><td><i>".$lang["usergroup_can_edit_$type"]."</i></td></tr>\n";

}
else {
  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" target=\"helpwindow\">".$lang["usergroup"]."</a>: </td><td>".$lang[$type."_not_in_usergroup"]."</td></tr>\n";
}

$content .= "</table>\n";

//this part shows all the options the users has
$content .= "<div align=\"center\"><font class=\"textlink\">\n";

//set add function for task or project
switch( $taskid_row["parent"] ){
  case "0":
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=add&amp;parentid=".$taskid."\">".$lang["add_task"]."</a>]&nbsp;\n";
    break;

 default:
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=add&amp;parentid=".$taskid."\">".$lang["add_subtask"]."</a>]&nbsp;\n";
    break;
}

//see if user is in usergroup and can edit
switch($taskid_row["groupaccess"] ) {
  case "t";
    $group = FALSE;
    if(in_array($taskid_row["usergroupid"], (array)$gid ) )
      $group = TRUE;
    break;

  case "f":
  default:
    $group = FALSE;
    break;
  }

switch( $taskid_row["owner"] ){
  case "0":
    if($admin == 1 ){
      //admin edit
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit"]."</a>]&nbsp;\n";
    }
    //I'll take it!
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=meown&amp;taskid=".$taskid."\">".$lang["i_take_it"]."</a>]&nbsp;\n";
    break;

  case ($uid):
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit"]."</a>]&nbsp;\n";
    //if not finished and not a project; then [I finished it!] button
    if( ($taskid_row["status"] != "done" ) && ($taskid_row["parent"] != 0 ) ) {
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=done&amp;taskid=".$taskid."\">".$lang["i_finished"]."</a>]&nbsp;\n";
    }
    // deown the task
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=deown&amp;taskid=".$taskid."\">".$lang["i_dont_want"]."</a>]&nbsp;\n";
    break;

  default:
    if($admin == 1 ){
      //edit
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&taskid=".$taskid."\">".$lang["edit"]."</a>]&nbsp;\n";
      //take over
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=meown&amp;taskid=".$taskid."\">".sprintf($lang["take_over_$type"] )."</a>]&nbsp;\n";
    }
    if($group )
      //if user is in the usergroup & groupaccess is set
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit"]."</a>]\n";
    break;
}

$content .= "</font></div>\n";

new_box( $title, $content, "boxdata2" );

?>