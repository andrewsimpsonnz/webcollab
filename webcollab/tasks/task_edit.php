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

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );
include_once(BASE."includes/time.php" );

//
//check user access
//
function user_access($taskid ) {

  global $uid, $admin;

  if($admin == 1)
    return TRUE;

  $q = db_query("SELECT owner, usergroupid, groupaccess FROM tasks WHERE id=$taskid" );
  $row = db_fetch_num($q, 0 );

  if($row[0] == $uid )
    return TRUE;

  if($row[1] == 0 )
    return FALSE;

  if( $row[2] == "t" ) {
    $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=$uid" );
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
  warning($lang["access_denied"], $lang["no_edit"] );

//get all the needed info from the task
$q = db_query("SELECT * FROM tasks WHERE id=$taskid" );

//get info
if( ($row = db_fetch_array($q, 0 ) ) < 0 )
  error("Database error", "Unable to retrieve the needed information.");

//all okay show task info
$content = "";

$content .= "<form method=\"POST\" action=\"tasks/task_submit.php\">\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n ".
            "<input type=\"hidden\" name=\"action\" value=\"update\" />\n ".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$row["id"]."\" />".
            "<p><table border=\"0\">\n".
            "<tr><td>".$lang["creation_time"]."</td><td>".nicedate($row["created"] )."</td></tr>\n";

//select either project or task for text
switch($row["parent"] ) {
  case 0:
    //project
    $type = "project";
    //project input box
    $content .= "<tr><td>".$lang["project_name"].":</td><td><input type=\"text\" name=\"name\" size=\"30\" value=\"".$row["name"]."\" /></td></tr>\n";
    break;

  default:
    //task
    $type = "task";
    //show project name
    $project = db_result(db_query("SELECT name FROM tasks WHERE id=".$row["projectid"] ), 0, 0 );
    $content .= "<tr><td>".$lang["project"] .":</td><td><a href=\"tasks.php?x=$x&amp;action=show&taskid=".$row["projectid"]."\">$project</a></td></tr>\n";
    break;
}

//reparenting
$content .= "<tr><td>".$lang["parent_task"].":</td><td><select name=\"parentid\">\n";
$parentq = db_query("SELECT id, name FROM tasks WHERE id<>$taskid ORDER BY name");
$content .= "<option value=\"0\"";

if($row["parent"] == 0 )
  $content .= " SELECTED";
$content .= ">".$lang["no_reparent"]."</option>\n";

for( $i=0; $parent_row = @db_fetch_array($parentq, $i ); $i++) {
  $content .= "<option value=\"".$parent_row["id"]."\"";
  if($row["parent"] == $parent_row["id"] )
    $content .= " SELECTED";
  $content .= ">".$parent_row["name"]."</option>\n";
  }
$content .="</select></td></tr>\n";

//show task (if applicable)
if($row["parent"] != 0 )
  $content .= "<tr><td>".$lang["task_name"].":</td><td><input type=\"text\" name=\"name\" size=\"30\" value=\"".$row["name"]."\" /></td></tr>\n";

//deadline
$content .= "<tr><td>".$lang["deadline"].":</td><td>".date_select_from_timestamp($row["deadline"])."</td></tr>\n";

//priority

  switch($row["priority"] ) {
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


$content .= "<tr><td>".$lang["priority"].":</td><td>\n".
            "<select name=\"priority\">\n".
            "<option value=\"0\"$s1>".$task_state["dontdo"]."</option>\n".
            "<option value=\"1\"$s2>".$task_state["low"]."</option>\n".
            "<option value=\"2\"$s3>".$task_state["normal"]."</option>\n".
            "<option value=\"3\"$s4>".$task_state["high"]."</option>\n".
            "<option value=\"4\"$s5>".$task_state["yesterday"]."</option>\n".
            "</select></td></tr>\n";

switch($row["parent"] ){
  case 0:
    //status for projects - 'done' is calculated from tasks
    switch($row["status"] ) {
      case "notactive":
        $s1 = " SELECTED"; $s2 = ""; $s3 = ""; $s4 = "";
        break;

      case "nolimit":
        $s1 = ""; $s2 = " SELECTED"; $s3 = ""; $s4 ="";
        break;

      case "cantcomplete":
        $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" SELECTED";
        break;

      case "active":
      default:
        $s1 = ""; $s2 = ""; $s3 = " SELECTED"; $s4 ="";
        break;
    }
    $content .= "<tr><td>".$lang["status"].":</td><td>\n".
                 "<select name=\"status\">\n".
                 "<option value=\"notactive\"$s1>".$task_state["planned_project"]."</option>\n".
                 "<option value=\"nolimit\"$s2>".$task_state["no_deadline_project"]."</option>\n".
                 "<option value=\"active\"$s3>".$task_state["active_project"]."</option>\n".
                 "<option value=\"cantcomplete\"$s4>".$task_state["cantcomplete"]."</option>\n".
                 "</select></td></tr>";
    break;

    default:
      //status for tasks
      switch($row["status"] ) {
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
      $content .= "<tr> <td>".$lang["status"].":</td> <td>\n".
                   "<select name=\"status\">\n".
                   "<option value=\"created\"$s1>".$task_state["new"]."</option>\n".
                   "<option value=\"notactive\"$s2>".$task_state["planned"]."</option>\n".
                   "<option value=\"active\"$s3>".$task_state["active"]."</option>\n".
                   "<option value=\"cantcomplete\"$s4>".$task_state["cantcomplete"]."</option>\n".
                   "<option value=\"done\"$s5>".$task_state["completed"]."</option>\n".
                   "</select></td></tr>";
}

//task owner
$user_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname" );
$content .= "<tr> <td>".$lang[$type."_owner"].":</td> <td><SELECT name=\"owner\">\n".
            "<option value=\"0\">".$lang["nobody"]."</option>\n";

//select the user first
for( $i=0 ; $user_row = @db_fetch_array($user_q, $i ) ; $i++) {
  $content .= "<option value=\"".$user_row["id"]."\"";

  if( $row["owner"] == $user_row["id"] )
    $content .= " SELECTED";

  $content .= ">".$user_row["fullname"]."</option>\n";
}

$content .= "</SELECT></td></tr>\n";


//show a selection box with the Taskgroups
if($row["parent"] != 0 ){

  //get all users in order to show a task owner
  $taskgroup_q = db_query("SELECT id, name FROM taskgroups ORDER BY name" );
  $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" target=\"helpwindow\">".$lang["taskgroup"]."</a>: </td> <td><select name=\"taskgroupid\">\n";
  $content .= "<option value=\"0\">".$lang["no_group"]."</option>\n";

  for( $i=0 ; $user_row = @db_fetch_array($taskgroup_q, $i ) ; $i++) {

    $content .= "<option value=\"".$user_row["id"]."\"";

    if($row["taskgroupid"] == $user_row["id"] )
      $content .= " SELECTED";

    $content .= ">".$user_row["name"]."</option>\n";

  }
  $content .= "</SELECT></td></tr>\n";
} else
  $content .= "<input type=\"hidden\" name=\"taskgroupid\" value=\"0\" />\n ";

//show all user-groups
$usergroup_q = db_query("SELECT name, id FROM usergroups ORDER BY name" );
$content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" target=\"helpwindow\">".$lang["usergroup"]."</A>: </td> <td><select name=\"usergroupid\">\n";
$content .= "<option value=\"0\">".$lang["no_group"]."</option>\n";

for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++) {

  $content .= "<option value=\"".$usergroup_row["id"]."\"";

    if( $row["usergroupid"] == $usergroup_row["id"] )
      $content .= " SELECTED >\n";
    else
      $content .= ">\n";

    $content .= $usergroup_row["name"]."</option>\n";

    }
$content .= "</select></td></tr>\n";

$global = "";
if($row["globalaccess"] == 't' )
  $global = "CHECKED";

$group = "";
if($row["groupaccess"] == 't' )
  $group = "CHECKED";

$content .= "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help\" target=\"helpwindow\">".$lang["all_users_view"]."</a></td><td><input type=\"checkbox\" name=\"globalaccess\" $global /></td></tr>\n".
             "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help\" target=\"helpwindow\">".$lang["group_edit"]."</a> </td><td><input type=\"checkbox\" name=\"groupaccess\" $group /></td></tr>\n".

             "<tr> <td>".$lang[$type."_description"]."</td> <td><TEXTAREA name=\"text\" rows=\"5\" cols=\"60\">".$row["text"]."</TEXTAREA></td> </tr>\n".

             //do we need to email ?
             "<tr><td><label for=\"mailowner\">".$lang["email_new_owner"]."</td><td><input type=\"checkbox\" name=\"mailowner\" id=\"mailowner\" $DEFAULT_OWNER /></label></td></tr>\n".
             "<tr><td><label for=\"maillist\">".$lang["email_group"]."</td><td><input type=\"checkbox\" name=\"maillist\" id=\"maillist\" $DEFAULT_GROUP /></label></td></tr>\n".

             "</table></p>\n".
             "<p><input type=\"submit\" value=\"".$lang["submit_changes"]."\" />&nbsp;".
             "<input type=\"reset\" value=\"".$lang["reset"]."\" /></p>".
             "</form>\n";

//delete options
$content .= "<br /><br />\n<form method=\"POST\" action=\"tasks.php\">\n".
             "<input type=\"hidden\" name=\"x\" value=\"$x\" />".
             "<input type=\"hidden\" name=\"action\" value=\"delete\" />\n".
             "<input type=\"hidden\" name=\"taskid\" value=\"".$row["id"]."\" />\n".
             "<input type=\"submit\" value=\"".$lang["delete_$type"]."\" onClick=\"return confirm('".sprintf($lang["del_javascript_".$type."_sprt"], $row["name"] )."')\" />\n".
             "</form>\n";

new_box($lang["edit_$type"], $content );

?>
