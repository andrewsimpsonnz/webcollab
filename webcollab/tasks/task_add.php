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

  Add a task or a project (parentless task) to the task-list

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );
include_once(BASE."includes/time.php" );

//secure vars
$content = "";

//shows a priority-select box
$priority_select_box = "<tr><td>".$lang["priority"].":</td> <td>\n".
                       "<SELECT name=\"priority\">\n".
                       "<option value=\"0\">".$task_state["dontdo"]."</option>\n".
                       "<option value=\"1\">".$task_state["low"]."</option>\n".
                       "<option value=\"2\" SELECTED>".$task_state["normal"]."</option>\n".
                       "<option value=\"3\">".$task_state["high"]."</option>\n".
                       "<option value=\"4\">".$task_state["yesterday"]."</option>\n".
                       "</SELECT>\n</td></tr>\n";


$content .= "<form name=\"inputform\" method=\"POST\" action=\"tasks/task_submit.php\">\n";
$content .= "<input type=\"hidden\" name=\"x\" value=\"$x\">\n ";
$content .= "<input type=\"hidden\" name=\"action\" value=\"insert\">\n ";

//this is split up in 2 parts for readabilities' sake

// add a new TASK
if( isset($_GET["parentid"]) && is_numeric($_GET["parentid"]) ) {

  $parentid = $_GET["parentid"];

//get info about the parent of this task
  $q = db_query("SELECT name, deadline, status, owner, parent, projectid FROM tasks WHERE id=$parentid" );
  $task_row = @db_fetch_array($q, $i );

  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"$parentid\">\n".
              "<input type=\"hidden\" name=\"projectid\" value=\"".$task_row["projectid"]."\">\n".
              "<table border=\"0\">\n";
  //show project name
  if( $task_row["projectid"] == $parentid)
    $project = $task_row["name"];
  else
    $project = db_result(db_query("SELECT name FROM tasks WHERE id=".$task_row["projectid"] ), 0, 0 );

  $content .= "<tr><td>".$lang["pproject"].":</td> <td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$task_row["projectid"]."\">$project</a></td></tr>\n";

  //check if task has a parent task
  if( $task_row["parent"] != 0 ) {
    $content .= "<tr><td>".$lang["parent_task"].":</td> <td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$task_row["parent"]."\">".$task_row["name"]."</a></td> </tr>\n";
  }
  $content .= "<tr><td>".$lang["creation_time"].":</td> <td>".date("F j, Y, H:i")."</td> </tr>\n".
              "<tr><td>".$lang["task_name"].":</td> <td><input type=\"text\" name=\"name\" size=\"30\"></td> </tr>\n".
              "<tr><td>".$lang["deadline"].":</td> <td>".date_select_from_timestamp( $task_row["deadline"] )." <small><i>".$lang["taken_from_parent"]."</i></small></td> </tr>\n";

  //priority
  $content .= $priority_select_box;

  //status
  $content .= "<tr><td>".$lang["status"].":</td> <td>\n".
              "<select name=\"status\">\n".
              "<option value=\"created\" SELECTED >".$task_state["new"]."</option>\n".
              "<option value=\"notactive\" >".$task_state["planned"]."</option>\n".
              "<option value=\"active\" >".$task_state["active"]."</option>\n".
              "<option value=\"cantcomplete\" >".$task_state["cantcomplete"]."</option>\n".
              "<option value=\"done\" >".$task_state["completed"]."</option>\n".
              "</select></td></tr>";


  //get all users in order to show a task owner
  $users_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

  //owner box
  $content .= "<tr><td>".$lang["task_owner"].":</td> <td><SELECT name=\"owner\">\n".
              "<option value=\"0\">".$lang["nobody"]."</option>\n";
  for( $i=0 ; $user_row = @db_fetch_array($users_q, $i ) ; $i++) {
    $content .= "<option value=\"".$user_row["id"]."\"";

    //default owner is present user
    if( $user_row[ "id" ] == $uid )
      $content .= " SELECTED";

    $content .= ">".$user_row["fullname"]."</option>\n";
  }

  $content .= "</SELECT></td></tr>\n";

  //get all taskgroups in order to show a task owner
  $q = db_query("SELECT id, name FROM taskgroups ORDER BY name");

  $content .= "<tr> <td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" target=\"helpwindow\">".$lang["taskgroup"]."</a>: </td> <td><SELECT name=\"taskgroupid\">\n";
  $content .= "<option value=\"0\">".$lang["no_group"]."</option>\n";

  for( $i=0 ; $taskgroup_row = @db_fetch_array($q, $i ) ; $i++)
    $content .= "<option value=\"".$taskgroup_row["id"]."\">".$taskgroup_row["name"]."</option>\n";

  $content .= "</select></td></tr>\n";

  //show all the groups
  $usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );

  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" target=\"helpwindow\">".$lang["usergroup"]."</a>: </td> <td><SELECT name=\"usergroupid\">\n";
  $content .= "<option value=\"0\">".$lang["all_groups"]."</option>\n";

  for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++)
    $content .= "<option value=\"".$usergroup_row["id"]."\">".$usergroup_row["name"]."</option>\n";

  $content .= "</select></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help\" target=\"helpwindow\">".$lang["all_users"]."</a> </td><td><input type=\"checkbox\" name=\"globalaccess\" ".$DEFAULT_ACCESS."></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help\" target=\"helpwindow\">".$lang["group_edit"]."</a> </td><td><input type=\"checkbox\" name=\"groupaccess\" ".$DEFAULT_EDIT."></td></tr>\n".

              "<tr> <td>".$lang["task_description"]."</td> <td><textarea name=\"text\" rows=\"10\" cols=\"60\"></textarea></td> </tr>\n".

              //do we need to email ?
              "<tr><td>".$lang["email_owner"]."</td><td><input type=\"checkbox\" name=\"mailowner\" ".$DEFAULT_OWNER."></td></tr>\n".
              "<tr><td>".$lang["email_group"]."</td><td><input type=\"checkbox\" name=\"maillist\" ".$DEFAULT_GROUP."></td></tr>\n".

              "</table><br /><br />\n".
              "<input type=\"submit\" value=\"Add task\"> ".
              "<input type=\"reset\" value=\"".$lang["reset"]."\">".
              "</form>\n";

  new_box( $lang["add_task"], $content );

}

// ADD A NEW PROJECT
else {

  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"0\">\n".
              "<input type=\"hidden\" name=\"projectid\" value=\"0\">\n".
              //taskgroup - we don't have this for projects
              "<input type=\"hidden\" name=\"taskgroupid\" value=\"0\">\n".

              "<table border=\"0\">\n".
              "<tr><td>".$lang["creation_time"].":</td><td>".date("F j, Y, H:i")."</td></tr>\n".
              "<tr><td>".$lang["project_name"].":</td> <td><input type=\"text\" name=\"name\" size=\"30\"></td> </tr>\n".

              //deadline
              "<tr><td>".$lang["deadline"].":</td> <td>".date_select()."</td> </tr>\n";

  //priority
  $content .= $priority_select_box;

  //status
  $content .= "<tr> <td>".$lang["status"].":</td> <td>\n".
              "<select name=\"status\">\n".
              "<option value=\"notactive\" >".$task_state["planned_project"]."</option>\n".
              "<option value=\"nolimit\" >".$task_state["no_deadline_project"]."</option>\n".
              "<option value=\"active\" SELECTED >".$task_state["active_project"]."</option>\n".
              "<option value=\"cantcomplete\" >".$task_state["cantcomplete"]."</option>\n".
              "</select></td></tr>";

  //get all users in order to show a task owner
  $users_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

  //owner
  $content .= "<tr><td>".$lang["project_owner"].":</td><td><select name=\"owner\">\n";
  for( $i=0 ; $row = @db_fetch_array($users_q, $i) ; $i++) {
    $content .= "<option value=\"".$row["id"]."\"";

      //owner is user
      if( $row["id"] == $uid ) {
        $content .= " SELECTED";
      }
    $content .= ">".$row["fullname"]."</option>\n";
  }
  $content .= "</SELECT></td></tr>\n";

  //show all the groups
  $usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );
  $content .= "<tr> <td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" target=\"helpwindow\">".$lang["usergroup"]."</a>: </td> <td><select name=\"usergroupid\">\n".
              "<option value=\"0\">".$lang["all_groups"]."</option>\n";

  for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++)
    $content .= "<option value=\"".$usergroup_row["id"]."\">".$usergroup_row["name"]."</option>\n";

  $content .= "</select></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help\" target=\"helpwindow\">".$lang["all_users"]."</a> </td><td><input type=\"checkbox\" name=\"globalaccess\" ".$DEFAULT_ACCESS."></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help\" target=\"helpwindow\">".$lang["group_edit"]."</a> </td><td><input type=\"checkbox\" name=\"groupaccess\" ".$DEFAULT_EDIT."></td></tr>\n".

              "<tr> <td>".$lang["project_description"]."</td> <td><textarea name=\"text\" rows=\"10\" cols=\"60\"></textarea></td> </tr>\n".

              //do we need to email ?
              "<tr><td>".$lang["email_owner"]."</td><td><input type=\"checkbox\" name=\"mailowner\" ".$DEFAULT_OWNER."></td></tr>\n".
              "<tr><td>".$lang["email_group"]."</td><td><input type=\"checkbox\" name=\"maillist\" ".$DEFAULT_GROUP."></td></tr>\n".

              "</table><br /><br />\n".
              "<input type=\"submit\" value=\"".$lang["add_project"]."\">\n ".
              "<input type=\"reset\" value=\"".$lang["reset"]."\">\n".
              "</form>\n";

  new_box( $lang["add_new_project"], $content );

}

?>
