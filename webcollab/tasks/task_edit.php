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

  Edit a task

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/admin_config.php" );
include_once( BASE."includes/time.php" );

//
//check user access
//
function user_access($taskid ) {

  global $uid, $admin;

  if($admin == 1)
    return TRUE;

  $q = db_query("SELECT owner, usergroupid, groupaccess FROM tasks WHERE id=".$taskid);
  $row = db_fetch_num($q, 0 );

  if($row[0] == $uid )
    return TRUE;

  if($row[1] == 0 )
    return FALSE;

  if( $row[2] == "t" ) {
    $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
    for( $i=0 ; $usergroup_row = @db_fetch_num($usergroup_q, $i ) ; $i++) {
    if($row[1] == $usergroup_row[0] )
      return TRUE;
    }
  }
  return FALSE;
}

//check for valid integer
if( ! isset($_GET["taskid"]) || ! is_numeric($_GET["taskid"]) || $_GET["taskid"] == 0 )
  error("Task edit", "Not a valid value for taskid.");

$taskid = $_GET["taskid"];

// can this user edit this task ?
if( ! user_access($taskid ) )
  warning( $lang["access_denied"], $lang["no_edit"] );

//get all the needed info from the task
$q = db_query( "SELECT * FROM tasks WHERE id=".$taskid );

//get info
if( ( $row = db_fetch_array( $q, 0 ) ) < 0 )
  error("Database error", "Unable to retrieve the needed information.");

//all okay show task info
$content = "<BR>\n";

$content .= "<FORM method=\"POST\" action=\"tasks/task_submit.php\">\n";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">\n ";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"update\">\n ";
$content .= "<TABLE border=\"0\">\n";
$content .= "<TR> <TD>".$lang["creation_time"]."</TD> <TD>".nicedate($row["created"])."</TD> </TR>\n";

// find parent for task and show it.
if( $row["parent"] != 0 ) {

  $project = db_result(db_query( "SELECT name FROM tasks WHERE id=".$row["projectid"]), 0, 0 );
  $content .= "<TR> <TD>".$lang["pproject"].":</TD> <TD><A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$row["projectid"]."\">".$project."</A></TD></TR>\n";

  if( $row["parent"] != $row["projectid"] ) {
    $parent = db_result(db_query( "SELECT name FROM tasks WHERE id=".$row["parent"]), 0, 0);
    $content .= "<TR> <TD>".$lang["parent_task"]."</TD> <TD><A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$row["parent"]."\">".$parent."</A></TD></TR>\n";
  }
  $content .= "<TR> <TD>".$lang["task_name"].":</TD> <TD><INPUT type=\"input\" name=\"name\" size=\"30\" value=\"".$row["name"]."\"></TD> </TR>\n";
}
else {
  //project
  $content .= "<TR> <TD>".$lang["project_name"].":</TD> <TD><INPUT type=\"input\" name=\"name\" size=\"30\" value=\"".$row["name"]."\"></TD> </TR>\n";
}

//deadline
$content .= "<TR> <TD>".$lang["deadline"].":</TD> <TD>".date_select_from_timestamp($row["deadline"])."</TD> </TR>\n";

//priority

  switch( $row["priority"] ) {
      case "0":
      $s1 = "SELECTED"; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";
      break;

    case "1":
      $s1 = ""; $s2 = " SELECTED"; $s3 = ""; $s4 =""; $s5 = "";
      break;

    case "2":
    default:
      $s1 = ""; $s2 = ""; $s3 = " SELECTED"; $s4 =""; $s5 = "";
      break;

   case "3":
      $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" SELECTED"; $s5 = "";
      break;

    case "4":
      $s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = " SELECTED";
      break;
  }


$content .= "<TR> <TD>".$lang["priority"].":</TD> <TD>\n";
$content .= "<SELECT name=\"priority\">\n";
$content .=  "<OPTION value=\"0\"".$s1.">".$task_state["dontdo"]."</OPTION>\n";
$content .=  "<OPTION value=\"1\"".$s2.">".$task_state["low"]."</OPTION>\n";
$content .=  "<OPTION value=\"2\"".$s3.">".$task_state["normal"]."</OPTION>\n";
$content .=  "<OPTION value=\"3\"".$s4.">".$task_state["high"]."</OPTION>\n";
$content .=  "<OPTION value=\"4\"".$s5.">".$task_state["yesterday"]."</OPTION>\n";
$content .= "</SELECT></TD></TR>\n";

// status
if( $row["parent"] != 0 ) {

//status for tasks
  switch( $row["status"] ) {
    case "notactive":
      $s1 = ""; $s2 = " SELECTED"; $s3 = ""; $s4 =""; $s5 = "";
      break;

    case "active":
      $s1 = ""; $s2 = ""; $s3 = " SELECTED"; $s4 =""; $s5 = "";
      break;

    case "cantcomplete":
      $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" SELECTED"; $s5 = "";
      break;

   case "done":
      $s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = " SELECTED";
      break;

    case "created":
    default:
      $s1 = " SELECTED"; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";
      break;
  }
  $content .= "<TR> <TD>".$lang["status"].":</TD> <TD>\n";
  $content .= "<SELECT name=\"status\">\n";
  $content .=  "<OPTION value=\"created\"".$s1.">".$task_state["new"]."</OPTION>\n";
  $content .=  "<OPTION value=\"notactive\"".$s2.">".$task_state["planned"]."</OPTION>\n";
  $content .=  "<OPTION value=\"active\"".$s3.">".$task_state["active"]."</OPTION>\n";
  $content .=  "<OPTION value=\"cantcomplete\"".$s4.">".$task_state["cantcomplete"]."</OPTION>\n";
  $content .=  "<OPTION value=\"done\"".$s5.">".$task_state["completed"]."</OPTION>\n";
  $content .= "</SELECT></TD></TR>";

} 
else{
  //status for projects - 'done' is calculated from tasks
  switch( $row["status"] ) {
    case "notactive":
      $s1 = " SELECTED"; $s2 = ""; $s3 ="";
      break;

    case "active":
    default:
      $s1 = ""; $s2 = " SELECTED"; $s3 ="";
      break;

    case "cantcomplete":
      $s1 = ""; $s2 = ""; $s3 =" SELECTED";
      break;
  }
  $content .= "<TR> <TD>".$lang["status"].":</TD> <TD>\n";
  $content .= "<SELECT name=\"status\">\n";
  $content .=  "<OPTION value=\"notactive\"".$s1.">".$task_state["planned_project"]."</OPTION>\n";
  $content .=  "<OPTION value=\"active\"".$s2.">".$task_state["active_project"]."</OPTION>\n";
  $content .=  "<OPTION value=\"cantcomplete\"".$s3.">".$task_state["cantcomplete"]."</OPTION>\n";
  $content .= "</SELECT></TD></TR>";
}

//task owner
$user_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");
$content .= "<TR> <TD>".$lang["task_owner"].":</TD> <TD><SELECT name=\"owner\">\n";
$content .= "<OPTION value=\"0\">".$lang["nobody"]."</OPTION>\n";

//select the user first
for( $i=0 ; $user_row = @db_fetch_array($user_q, $i ) ; $i++) {
  $content .= "<OPTION value=\"".$user_row["id"]."\"";

  if( $row["owner"] == $user_row["id"] )
    $content .= " SELECTED";

  $content .= ">".$user_row["fullname"]."</OPTION>\n";
}

$content .= "</SELECT></TD></TR>\n";


//show a selection box with the Taskgroups
if( $row["parent"] != 0 ){

  //get all users in order to show a task owner
  $taskgroup_q = db_query("SELECT id, name FROM taskgroups ORDER BY name");
  $content .= "<TR> <TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#taskgroup\" target=\"helpwindow\">".$lang["taskgroup"]."</A>: </TD> <TD><SELECT name=\"taskgroupid\">\n";
  $content .= "<OPTION value=\"0\">".$lang["no_group"]."</OPTION>\n";

  for( $i=0 ; $user_row = @db_fetch_array($taskgroup_q, $i ) ; $i++) {

    $content .= "<OPTION value=\"".$user_row["id"]."\"";

    if( $row["taskgroupid"] == $user_row["id"] )
      $content .= " SELECTED";

    $content .= ">".$user_row["name"]."</OPTION>\n";

  }
  $content .= "</SELECT></TD></TR>\n";
} else
  $content .= "<INPUT TYPE=\"hidden\" NAME=\"taskgroupid\" value=\"0\">\n ";


//show all user-groups
$usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );
$content .= "<TR> <TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#usergroup\" target=\"helpwindow\">".$lang["usergroup"]."</A>: </TD> <TD><SELECT name=\"usergroupid\">\n";
$content .= "<OPTION value=\"0\">".$lang["no_group"]."</OPTION>\n";

for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++) {

  $content .= "<OPTION value=\"".$usergroup_row["id"]."\"";

    if( $row["usergroupid"] == $usergroup_row["id"] )
      $content .= " SELECTED >\n";
    else
      $content .= ">\n";

    $content .= $usergroup_row["name"]."</OPTION>\n";

    }
$content .= "</SELECT></TD></TR>\n";

$global = "";
if( $row["globalaccess"] == 't' )
  $global = "CHECKED";

$group = "";
if( $row["groupaccess"] == 't' )
  $group = "CHECKED";

$content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#globalaccess\" target=\"helpwindow\">".$lang["all_users"]."</A></TD><TD><INPUT type=\"checkbox\" name=\"globalaccess\" ".$global."></TD></TR>\n";
$content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#groupaccess\" target=\"helpwindow\">".$lang["group_edit"]."</A> </TD><TD><INPUT type=\"checkbox\" name=\"groupaccess\" ".$group."></TD></TR>\n";

$content .= "<TR> <TD>".$lang["task_description"]."</TD> <TD><TEXTAREA name=\"text\" rows=\"5\" cols=\"60\">".$row["text"]."</TEXTAREA></TD> </TR>\n";

//do we need to email ?
$content .= "<TR><TD>".$lang["email_new_owner"]."</TD><TD><INPUT type=\"checkbox\" name=\"mailowner\" ".$DEFAULT_OWNER."></TD></TR>\n";
$content .= "<TR><TD>".$lang["email_group"]."</TD><TD><INPUT type=\"checkbox\" name=\"maillist\" ".$DEFAULT_GROUP."></TD></TR>\n";

$content .= "</TABLE>\n";
$content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"Submit\"> ";
$content .= "<INPUT TYPE=\"reset\">";
$content .= "<INPUT TYPE=\"hidden\" name=\"taskid\" value=\"".$row["id"]."\">";
$content .= "</FORM>\n";

if( $row["parent"] == 0 ) {
  $full_title = $lang["edit_project"];
  $title = $lang["project"];
}else{
  $full_title = $lang["edit_task"];
  $title = $lang["task"];
}

//delete options
$content .= "<FORM method=\"POST\" action=\"tasks.php\">\n";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"delete\">\n";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"taskid\" value=\"".$row["id"]."\">\n";
$content .= "<INPUT TYPE=\"submit\" NAME=\"Delete\" value=\"".$lang["delete"]." ".$title."\" onClick=\"return confirm( '".sprintf($lang["del_javascript_sprt"], $title, $row["name"] )."')\">\n";
$content .= "</FORM>\n";

$content .= "<BR><BR>\n";


new_box( $full_title, $content );

?>
