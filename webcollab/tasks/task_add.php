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

//get our location

if( ! @require( "path.php" ) )
  die( "No valid path found, not make able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/admin_config.php" );
include_once( BASE."includes/time.php" );

//shows a priority-select box
$priority_select_box = "<TR><TD>Priority:</TD> <TD>\n".
                       "<SELECT name=\"priority\">\n".
                       "<OPTION value=\"0\">".$task_state["dontdo"]."</OPTION>\n".
                       "<OPTION value=\"1\">".$task_state["low"]."</OPTION>\n".
                       "<OPTION value=\"2\" SELECTED>".$task_state["normal"]."</OPTION>\n".
                       "<OPTION value=\"3\">".$task_state["high"]."</OPTION>\n".
                       "<OPTION value=\"4\">".$task_state["yesterday"]."</OPTION>\n".
                       "</SELECT>\n</TD></TR>\n";


$content = "<BR>\n";
$content .= "<FORM name=\"inputform\" method=\"POST\" action=\"tasks/task_submit.php\">\n";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">\n ";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"insert\">\n ";

//this is split up in 2 parts for readabilities' sake

// add a new TASK
if( isset($_GET["parentid"]) && is_numeric($_GET["parentid"]) ) {

  $parentid = $_GET["parentid"];

//get info about the parent of this task
  $q = db_query("SELECT name,deadline,status,owner,projectid FROM tasks WHERE id=".$parentid );
  $row_task = @db_fetch_array($q, $i );

  $content .= $lang["add_task"]."<BR><BR>\n";
  $content .= "<TABLE border=\"0\">\n";

  $content .= "<INPUT TYPE=\"hidden\" name=\"parentid\" value=\"".$parentid."\">\n";
  $content .= "<INPUT TYPE=\"hidden\" name=\"projectid\" value=\"".$row_task["projectid"]."\">\n";

  $content .= "<TR> <TD>".$lang["parent_task"].":</TD> <TD><A href=\"tasks.php?x=$x&action=show&taskid=".$parentid."\">".$row_task["name"]."</A></TD> </TR>\n";
  $content .= "<TR> <TD>".$lang["creation_time"].":</TD> <TD>".date("F j, Y, H:i")."</TD> </TR>\n";
  $content .= "<TR> <TD>".$lang["task_name"].":</TD> <TD><INPUT type=\"input\" name=\"name\" size=\"30\"></TD> </TR>\n";
  $content .= "<TR> <TD>".$lang["deadline"].":</TD> <TD>".date_select_from_timestamp( $row_task["deadline"] )." <SMALL><I>".$lang["taken_from_parent"]."</I></SMALL></TD> </TR>\n";

  //priority
  $content .= $priority_select_box;

  //status
  $content .= "<TR> <TD>".$lang["status"].":</TD> <TD>\n";
  $content .= "<SELECT name=\"status\">\n";
  $content .=  "<OPTION value=\"created\" SELECTED >".$task_state["new"]."</OPTION>\n";
  $content .=  "<OPTION value=\"notactive\" >".$task_state["planned"]."</OPTION>\n";
  $content .=  "<OPTION value=\"active\" >".$task_state["active"]."</OPTION>\n";
  $content .=  "<OPTION value=\"cantcomplete\" >".$task_state["cantcomplete"]."</OPTION>\n";
  $content .=  "<OPTION value=\"done\" >".$task_state["completed"]."</OPTION>\n";
  $content .= "</SELECT></TD></TR>";


  //get all users in order to show a task owner
  $users_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

  //owner box
  $content .= "<TR> <TD>".$lang["task_owner"].":</TD> <TD><SELECT name=\"owner\">\n";
  $content .= "<OPTION value=\"0\">".$lang["nobody"]."</OPTION>\n";
  for( $i=0 ; $row = @db_fetch_array($users_q, $i ) ; $i++) {
    $content .= "<OPTION value=\"".$row["id"]."\"";

    //default owner is present user
    if( $row[ "id" ] == $uid )
      $content .= " SELECTED";

    $content .= ">".$row["fullname"]."</OPTION>\n";
  }

  $content .= "</SELECT></TD></TR>\n";

  //get all taskgroups in order to show a task owner
  $q = db_query("SELECT id, name FROM taskgroups ORDER BY name");

  $content .= "<TR> <TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#taskgroup\" target=\"helpwindow\">".$lang["taskgroup"]."</A>: </TD> <TD><SELECT name=\"taskgroupid\">\n";
  $content .= "<OPTION value=\"0\">".$lang["no_group"]."</OPTION>\n";

  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++)
    $content .= "<OPTION value=\"".$row["id"]."\">".$row["name"]."</OPTION>\n";

  $content .= "</SELECT></TD></TR>\n";

  //show all the groups
  $usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );

  $content .= "<TR> <TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#usergroup\" target=\"helpwindow\">".$lang["usergroup"]."</A>: </TD> <TD><SELECT name=\"usergroupid\">\n";
  $content .= "<OPTION value=\"0\">".$lang["all_groups"]."</OPTION>\n";

  for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++)
    $content .= "<OPTION value=\"".$usergroup_row["id"]."\">".$usergroup_row["name"]."</OPTION>\n";

  $content .= "</SELECT></TD></TR>\n";
  $content .= "<TR><TD>".$lang["all_users"]."</TD><TD><INPUT type=\"checkbox\" name=\"globalaccess\" ".$DEFAULT_ACCESS."></TD></TR>\n";

  $content .= "<TR> <TD>".$lang["task_description"]."</TD> <TD><TEXTAREA name=\"text\" rows=\"10\" cols=\"60\"></TEXTAREA></TD> </TR>\n";

  //do we need to email ?
  $content .= "<TR><TD>".$lang["email_owner"]."</TD><TD><INPUT type=\"checkbox\" name=\"mailowner\" ".$DEFAULT_OWNER."></TD></TR>\n";
  $content .= "<TR><TD>".$lang["email_group"]."</TD><TD><INPUT type=\"checkbox\" name=\"maillist\" ".$DEFAULT_GROUP."></TD></TR>\n";

  $content .= "</TABLE>\n";
  $content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"Add task\"> ";
  $content .= "<INPUT TYPE=\"reset\">";
  $content .= "</FORM>\n";
  $content .= "<BR><BR>\n";

  new_box( $lang["add_task"], $content );

}

// ADD A NEW PROJECT
else {

  $content .= "Add a new project<BR><BR>\n";
  $content .= "<TABLE border=\"0\">\n";
  $content .= "<INPUT TYPE=\"hidden\" name=\"parentid\" value=\"0\">\n";
  $content .= "<INPUT TYPE=\"hidden\" name=\"projectid\" value=\"0\">\n";

  $content .= "<TR> <TD>".$lang["creation_time"].":</TD><TD>".date("F j, Y, H:i")."</TD> </TR>\n";
  $content .= "<TR> <TD>".$lang["project_name"].":</TD> <TD><INPUT type=\"input\" name=\"name\" size=\"30\"></TD> </TR>\n";

  //deadline
  $content .= "<TR><TD>".$lang["deadline"].":</TD> <TD>".date_select()."</TD> </TR>\n";

  //priority
  $content .= $priority_select_box;

  //status
  // - we don't have status for projects
  $content .= "<TR> <TD>Status:</TD> <TD>\n";
  $content .= "<SELECT name=\"status\">\n";
  $content .=  "<OPTION value=\"notactive\" >".$task_state["planned_project"]."</OPTION>\n";
  $content .=  "<OPTION value=\"active\" SELECTED >".$task_state["active_project"]."</OPTION>\n";
  $content .=  "<OPTION value=\"cantcomplete\" >".$task_state["cantcomplete"]."</OPTION>\n";
  $content .= "</SELECT></TD></TR>";

  //get all users in order to show a task owner
  $users_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

  //owner
  $content .= "<TR> <TD>".$lang["project_owner"].":</TD> <TD><SELECT name=\"owner\">\n";
  for( $i=0 ; $row = @db_fetch_array($users_q, $i) ; $i++) {
    $content .= "<OPTION value=\"".$row["id"]."\"";

      //owner is user
      if( $row["id"] == $uid ) {
        $content .= " SELECTED";
      }
    $content .= ">".$row["fullname"]."</OPTION>\n";
  }
  $content .= "</SELECT></TD></TR>\n";

  //taskgroup - we don't have this for projects
  $content .= "<INPUT TYPE=\"hidden\" name=\"taskgroupid\" value=\"0\">\n";

  //show all the groups
  $usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );
  $content .= "<TR> <TD>".$lang["usergroup"]."</A>: </TD> <TD><SELECT name=\"usergroupid\">\n";
  $content .= "<OPTION value=\"0\">".$lang["all_groups"]."</OPTION>\n";

  for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++)
    $content .= "<OPTION value=\"".$usergroup_row["id"]."\">".$usergroup_row["name"]."</OPTION>\n";

  $content .= "</SELECT></TD></TR>\n";
  $content .= "<TR><TD>".$lang["all_users"]."</TD><TD><INPUT type=\"checkbox\" name=\"globalaccess\" ".$DEFAULT_ACCESS."></TD></TR>\n";

  $content .= "<TR> <TD>".$lang["project_description"]."</TD> <TD><TEXTAREA name=\"text\" rows=\"10\" cols=\"60\"></TEXTAREA></TD> </TR>\n";

  //do we need to email ?
  $content .= "<TR><TD>".$lang["email_owner"]."</TD><TD><INPUT type=\"checkbox\" name=\"mailowner\" ".$DEFAULT_OWNER."></TD></TR>\n";
  $content .= "<TR><TD>".$lang["email_group"]."</TD><TD><INPUT type=\"checkbox\" name=\"maillist\" ".$DEFAULT_GROUP."></TD></TR>\n";

  $content .= "</TABLE>\n";
  $content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["add_project"]."\">\n ";
  $content .= "<INPUT TYPE=\"reset\">\n";
  $content .= "</FORM>\n";
  $content .= "<BR><BR>\n";

  new_box( $lang["add_new_project"], $content );

}

?>
