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

  Show a task

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

include_once(BASE."tasks/task_common.php" );
include_once(BASE."includes/time.php" );

//is there an id ?
if( ! isset( $_GET["taskid"]) || ! is_numeric($_GET["taskid"]) || $_GET["taskid"] == 0 )
  error("Task show", "Not a valid value for taskid" );

$taskid = $_GET["taskid"];

//check usergroup security
require_once(BASE."includes/usergroup_security.php");

//select the task info
$q = db_query("SELECT * FROM tasks WHERE tasks.id=$taskid" );

//get the data
if( ! ($row = db_fetch_array($q, 0 ) ) )
  error("Task show", "The requested item has either been deleted, or is now invalid.");

//mark this as seen in seen ;)
@db_query("DELETE FROM seen WHERE userid=$uid AND taskid=$taskid", 0);
db_query("INSERT INTO seen(userid, taskid, time) VALUES ($uid, $taskid, now() ) " );

//start of header table
$content = "<p><table width=\"98%\"><tr><td>\n";

//percentage_completed gauge if this is a project
if( $row["parent"] == 0 ) {
  $percent_completed = round(percent_complete( $taskid));
  $content .= sprintf( $lang["percent_project_sprt"], $percent_completed )."<br />\n";
  $content .= show_percent( $percent_completed )."<br />";
}
//project/task name
$content .= "<b>".$row["name"]."</b><br /><br /></td></tr>\n";

//show text
$content .= "<tr><td bgcolor=\"#EEEEEE\" width=\"95%\">\n";

$content .= nl2br($row["text"] );
$content .= "</td></tr></table></p>\n";

//start of info table
$content .= "<p><table border=\"0\">\n";

//get owner information
if( $row["owner"] == 0 ) {
  $content .= "<tr><td>".$lang["owned_by"].":</td><td>".$lang["nobody"]."</td></tr>\n";
} else {
  $owner = db_result(db_query("SELECT fullname FROM users WHERE id=".$row["owner"] ), 0, 0  );
  $content .= "<tr><td>".$lang["owned_by"].": </td><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["owner"]."\">".$owner."</a></td></tr>\n";
}

//get creator information (null if creator has been deleted!)
$creator = @db_result(db_query("SELECT fullname FROM users WHERE id=".$row["creator"] ), 0, 0  );
$content .= "<tr><td>".$lang["created_on"].": </td><td>";
if($creator == NULL )
  $content .= nicedate($row["created"]);
else
  $content .= sprintf($lang["by_sprt"], nicedate($row["created"]), "<a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["creator"]."\">".$creator."</a>");
$content .= "</td></tr>\n";

//get deadline
$content .= "<tr><td>".$lang["deadline"].": </td><td>".nicedate($row["deadline"])."</td></tr>\n";

//get priority
$content .= "<tr><td>".$lang["priority"].": </td><td>";
switch($row["priority"] ) {

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
if($row["parent"] != 0 ) {

  $content .= "<tr><td>".$lang["status"].": </td><td>";
  switch($row["status"] ) {

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
      $content .=  $row["status"];
      break;
  }
  $content .= "</td></tr>\n";

  //is there a finished date ?
  switch($row["status"] ) {
    case "done":
      $content .= "<tr><td>".$lang["completed_on"].": </td><td>".nicedate($row["finished_time"])."</td></tr>\n";
      break;

    case "cantcomplete":
      $content .= "<tr><td>".$lang["modified_on"].": </td><td>".nicedate($row["finished_time"])."</td></tr>\n";
      break;

    default:
      break;
  }
}
else{
  //project - show the finish date and status
  switch($row["status"] ) {
    case "cantcomplete":
      $content .= "<tr><td>".$lang["status"].": </td><td><b>".$lang["project_on_hold"]."</b></td></tr>\n";
      $content .= "<tr><td>".$lang["modified_on"].": </td><td>".nicedate($row["finished_time"])."</td></tr>\n";
      break;

    case "notactive":
      $content .= "<tr><td>".$lang["status"].": </td><td>".$lang["project_planned"]."</td></tr>\n";
      break;

    case "nolimit":
      $content .= "<tr><td>".$lang["status"].": </td><td>".$lang["project_no_deadline"]."</td></tr>\n";
      break;

    default:
      if($percent_completed == 100 ) {
        $completed_date = @db_result( db_query( "SELECT MAX(finished_time) FROM tasks WHERE parent<>0 AND projectid=".$taskid ), 0, 0 );
        $content .= "<tr><td>".$lang["completed_on"].": </td><td>".nicedate($completed_date)."</td></tr>\n";
      }
      break;
  }
}

//task group
if($row["parent"] != 0 ) {

  switch($row["taskgroupid"] ){
    case "0":
      $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" target=\"helpwindow\">".$lang["taskgroup"]."</a>: </td><td>".$lang["none"]."<br />\n";
      break;

    default:
      $taskgroup = db_result(db_query("SELECT name FROM taskgroups WHERE id=".$row["taskgroupid"] ), 0, 0 );
      $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" target=\"helpwindow\">".$lang["taskgroup"]."</a>: </td><td>".$taskgroup."</td></tr>\n";
      break;
  }
}

//set title variables as approriate for task or project
switch($row["parent"] ){
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
if( $row["usergroupid"] != 0 ) {
  $usergroup = db_result(db_query("SELECT name FROM usergroups WHERE id=".$row["usergroupid"] ), 0, 0  );
  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" target=\"helpwindow\">".$lang["usergroup"]."</a>: </td><td>".$usergroup." ";

  switch($row["globalaccess"] ){
    case 't':
      $content .= $lang[$type."_accessible"]."</td></tr>\n";
      break;

    case 'f':
    default:
      $content .= "<b>".$lang[$type."_not_accessible"]."</b></td></tr>\n";
      break;
  }

  if($row["groupaccess"] == 't' )
      $content .= "<tr><td>&nbsp;</td><td><i>".$lang["usergroup_can_edit_$type"]."</i></td></tr>\n";

}
else {
  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" target=\"helpwindow\">".$lang["usergroup"]."</a>: </td><td>".$lang[$type."_not_in_usergroup"]."</td></tr>\n";
}

$content .= "</table></p>\n";

//this part shows all the options the users has
$content .= "<p><div align=\"center\"><font class=\"textlink\">\n";

//set add function for task or project
switch( $row["parent"] ){
  case "0":
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=add&amp;parentid=".$taskid."\">".$lang["add_task"]."</a>]&nbsp;\n";
    break;

 default:
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=add&amp;parentid=".$taskid."\">".$lang["add_subtask"]."</a>]&nbsp;\n";
    break;
}

//see if user is in usergroup and can edit
switch($row["groupaccess"] ) {
  case "t";
    $group = FALSE;
    $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=$uid" );
    for( $i=0 ; $usergroup_row = @db_fetch_num($usergroup_q, $i ) ; $i++) {
    if($row["usergroupid"] == $usergroup_row[0] ){
      $group = TRUE;
      break;
      }
    }
    break;

  case "f":
  default:
    $group = FALSE;
    break;
  }

switch( $row["owner"] ){
  case "0":
    if($admin == 1 ){
      //admin edit
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit"]."</a>]&nbsp;\n";
    }
    //I'll take it!
    $content .= "[<a href=\"tasks/task_submit.php?x=$x&amp;action=meown&amp;taskid=".$taskid."\">".$lang["i_take_it"]."</a>]&nbsp;\n";
    break;

  case ($uid):
    $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit"]."</a>]&nbsp;\n";
    //if not finished and not a project; then [I finished it!] button
    if( ($row["status"] != "done" ) && ($row["parent"] != 0 ) ) {
      $content .= "[<a href=\"tasks/task_submit.php?x=$x&amp;action=done&amp;taskid=".$taskid."\">".$lang["i_finished"]."</a>]&nbsp;\n";
    }
    // deown the task
    $content .= "[<a href=\"tasks/task_submit.php?x=$x&amp;action=deown&amp;taskid=".$taskid."\">".$lang["i_dont_want"]."</a>]&nbsp;\n";
    break;

  default:
    if($admin == 1 ){
      //edit
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&taskid=".$taskid."\">".$lang["edit"]."</a>]&nbsp;\n";
      //take over
      $content .= "[<a href=\"tasks/task_submit.php?x=$x&amp;action=meown&amp;taskid=".$taskid."\">".sprintf($lang["take_over_$type"] )."</a>]&nbsp;\n";
    }
    if($group )
      //if user is in the usergroup & groupaccess is set
      $content .= "[<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit"]."</a>]\n";
    break;
}

$content .= "</font></div></p>\n";

new_box( $title, $content, "boxdata2" );

?>

