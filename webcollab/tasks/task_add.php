<?php
/*
  $Id$
  
  (c) 2002 -2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002
  
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
$javascript = "";
$allowed[0] = 0; 

if($GUEST == 1)
 warning($lang['access_denied'], $lang['not_owner'] );  


//get list of common users in private usergroups that this user can view 
$q = db_query("SELECT ".PRE."usergroups_users.usergroupid AS usergroupid,
                      ".PRE."usergroups_users.userid AS userid 
                      FROM ".PRE."usergroups_users 
                      LEFT JOIN ".PRE."usergroups ON (".PRE."usergroups.id=".PRE."usergroups_users.usergroupid)
                      WHERE ".PRE."usergroups.private=1");

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  if(in_array($row[0], (array)$GID ) && ! in_array($row[1], (array)$allowed ) ) {
   $allowed[] = $row[1];
  }
}

//shows a priority-select box
$priority_select_box = "<tr><td>".$lang['priority'].":</td> <td>\n".
                       "<select name=\"priority\">\n".
                       "<option value=\"0\">".$task_state['dontdo']."</option>\n".
                       "<option value=\"1\">".$task_state['low']."</option>\n".
                       "<option value=\"2\" selected=\"selected\">".$task_state['normal']."</option>\n".
                       "<option value=\"3\">".$task_state['high']."</option>\n".
                       "<option value=\"4\">".$task_state['yesterday']."</option>\n".
                       "</select>\n</td></tr>\n";
                       
//we can't check the deadline date for a new project!
if( isset($_GET['parentid']) && is_numeric($_GET['parentid']) )
  $javascript = "onsubmit=\"return dateCheck()\" ";

$content .= "<form method=\"post\" action=\"tasks.php\" $javascript>\n";
$content .= "<fieldset><input type=\"hidden\" name=\"x\" value=\"$x\" />\n ";
$content .= "<input type=\"hidden\" name=\"action\" value=\"submit_insert\" />\n ";

//this is split up in 2 parts for readabilities' sake

// add a new TASK
if( isset($_GET['parentid']) && is_numeric($_GET['parentid']) ) {

  $parentid = intval($_GET['parentid']);

  //get info about the parent of this task
  $q = db_query("SELECT name, deadline, status, owner, parent, projectid, usergroupid, globalaccess, taskgroupid 
                       FROM ".PRE."tasks WHERE id=$parentid" );
  
  if( ! $parent_row = db_fetch_array($q, 0 ) )
    error("Task add", "No parent for taskid" );
  
  //add the project deadline (plus GMT offset) for the javascript
  $project_deadline = db_result(db_query("SELECT ".$epoch."deadline) FROM ".PRE."tasks WHERE id=".$parent_row['projectid'] ) ) + date('Z');
  
  $content .=  "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"$project_deadline\" />\n";            
                
  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"$parentid\" />\n".
              "<input type=\"hidden\" name=\"projectid\" value=\"".$parent_row['projectid']."\" /></fieldset>\n".
              "<table class=\"celldata\">\n";
  
  //show project name
  if( $parent_row['projectid'] == $parentid)
    $project = $parent_row['name'];
  else
    $project = db_result(db_query("SELECT name FROM ".PRE."tasks WHERE id=".$parent_row['projectid'] ), 0, 0 );

  $content .= "<tr><td>".$lang['project'] .":</td> <td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$parent_row['projectid']."\">$project</a></td></tr>\n";

  //check if task has a parent task
  if( $parent_row['parent'] != 0 ) {
    $content .= "<tr><td>".$lang['parent_task'].":</td> <td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$parent_row['parent']."\">".$parent_row['name']."</a></td> </tr>\n";
  }
  $content .= "<tr><td>".$lang['creation_time'].":</td> <td>".nicetime(time(), 1 )."</td> </tr>\n".
              "<tr><td>".$lang['task_name'].":</td> <td><input id=\"name\" type=\"text\" name=\"name\" size=\"30\" /></td> </tr>\n".
              "<tr><td>".$lang['deadline'].":</td> <td>".date_select_from_timestamp( $parent_row['deadline'] )." <small><i>".$lang['taken_from_parent']."</i></small></td> </tr>\n";

  //priority
  $content .= $priority_select_box;

  //status
  $content .= "<tr><td>".$lang['status'].":</td> <td>\n".
              "<select name=\"status\">\n".
              "<option value=\"created\" selected=\"selected\" >".$task_state['new']."</option>\n".
              "<option value=\"notactive\" >".$task_state['planned']."</option>\n".
              "<option value=\"active\" >".$task_state['active']."</option>\n".
              "<option value=\"cantcomplete\" >".$task_state['cantcomplete']."</option>\n".
              "<option value=\"done\" >".$task_state['completed']."</option>\n".
              "</select></td></tr>";


  //get all users in order to show a task owner
  $users_q = db_query("SELECT id, fullname, private FROM ".PRE."users WHERE deleted='f' AND guest=0 ORDER BY fullname");

  //owner box
  $content .= "<tr><td>".$lang['task_owner'].":</td><td><select name=\"owner\">\n".
              "<option value=\"0\">".$lang['nobody']."</option>\n";
  for( $i=0 ; $user_row = @db_fetch_array($users_q, $i ) ; $i++) {
      
    //user test for privacy
    if($user_row['private'] && ($user_row['id'] != $UID ) && ( ! $ADMIN ) && ( ! in_array($user_row['id'], (array)$allowed ) ) ){
      continue;
    }
    
    $content .= "<option value=\"".$user_row['id']."\"";

    //default owner is present user
    if( $user_row[ "id" ] == $UID )
      $content .= " selected=\"selected\"";

    $content .= ">".$user_row['fullname']."</option>\n";
  }

  $content .= "</select></td></tr>\n";

  //get all taskgroups in order to show a task owner
  $q = db_query("SELECT id, name FROM ".PRE."taskgroups ORDER BY name");

  $content .= "<tr> <td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=taskgroup&amp;type=help'); return false\">".$lang['taskgroup']."</a>: </td> <td><select name=\"taskgroupid\">\n";
  $content .= "<option value=\"0\">".$lang['no_group']."</option>\n";

  for( $i=0 ; $taskgroup_row = @db_fetch_array($q, $i ) ; $i++) {
    
    //inherit taskgroup from parent
    if($parent_row['taskgroupid'] == $taskgroup_row['id'] ) {
      $content .= "<option value=\"".$taskgroup_row['id']."\" selected=\"selected\">".$taskgroup_row['name']."</option>\n";
    }
    else {
      $content .= "<option value=\"".$taskgroup_row['id']."\">".$taskgroup_row['name']."</option>\n";
    }
  }
  $content .= "</select></td></tr>\n";

  //show all the groups
  $usergroup_q = db_query( "SELECT name, id FROM ".PRE."usergroups ORDER BY name" );

  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=usergroup&amp;type=help'); return false\">".$lang['usergroup']."</a>: </td> <td><select name=\"usergroupid\">\n";
  $content .= "<option value=\"0\">".$lang['all_groups']."</option>\n";

  for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++ ) {
    
    //usergroup test for privacy
    if( (! $ADMIN ) && ( ! in_array($usergroup_row['id'], (array)$GID ) ) ) {
      continue;
    }
    
    //inherit usergroup from parent, if parent is private
    if(($parent_row['globalaccess'] == 'f' ) && ( $parent_row['usergroupid'] == $usergroup_row['id'] ) ) {
      $content .= "<option value=\"".$usergroup_row['id']."\" selected=\"selected\">".$usergroup_row['name']."</option>\n";
    }
    else {   
      $content .= "<option value=\"".$usergroup_row['id']."\">".$usergroup_row['name']."</option>\n";
    }
  }
  
  //new task inherits globaccess from parent
  if($parent_row['globalaccess'] == 'f' ) {
    //set private
    $globalaccess = "";
  }
  else {
    //use defaults 
    $globalaccess = $DEFAULT_ACCESS;
  }
  
  $content .= "</select></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help\" onclick=\"window.open('help/help_language.php?item=globalaccess&amp;type=help'); return false\">".$lang['all_users_view']."</a> </td><td><input type=\"checkbox\" name=\"globalaccess\" ".$globalaccess." /></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help\" onclick=\"window.open('help/help_language.php?item=groupaccess&amp;type=help'); return false\">".$lang['group_edit']."</a> </td><td><input type=\"checkbox\" name=\"groupaccess\" ".$DEFAULT_EDIT." /></td></tr>\n".

              "<tr> <td>".$lang['task_description']."</td> <td><textarea name=\"text\" rows=\"10\" cols=\"60\"></textarea></td> </tr>\n".

              //do we need to email ?
              "<tr><td><label for=\"mailowner\">".$lang['email_owner']."</label></td><td><input type=\"checkbox\" name=\"mailowner\" id=\"mailowner\" ".$DEFAULT_OWNER." /></td></tr>\n".
              "<tr><td><label for=\"maillist\">".$lang['email_group']."</label></td><td><input type=\"checkbox\" name=\"maillist\" id=\"maillist\" ".$DEFAULT_GROUP." /></td></tr>\n".

              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang['add_task']."\" onclick=\"return fieldCheck()\" />&nbsp;".
              "<input type=\"reset\" value=\"".$lang['reset']."\" /></p>".
              "</form>\n";

  new_box( $lang['add_task'], $content );

}

// ADD A NEW PROJECT
else {

  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"0\" />\n".
              "<input type=\"hidden\" name=\"projectid\" value=\"0\" />\n".
              "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"-1\" />\n".      
              //taskgroup - we don't have this for projects
              "<input type=\"hidden\" name=\"taskgroupid\" value=\"0\" /></fieldset>\n".
              "<table class=\"celldata\">\n".
              "<tr><td>".$lang['creation_time'].":</td><td>".nicetime(time(), 1 )."</td></tr>\n".
              "<tr><td>".$lang['project_name'].":</td> <td><input id=\"name\" type=\"text\" name=\"name\" size=\"30\" /></td> </tr>\n".

              //deadline
              "<tr><td>".$lang['deadline'].":</td> <td>".date_select()."</td> </tr>\n";

  //priority
  $content .= $priority_select_box;

  //status
  $content .= "<tr> <td>".$lang['status'].":</td> <td>\n".
              "<select name=\"status\">\n".
              "<option value=\"notactive\" >".$task_state['planned_project']."</option>\n".
              "<option value=\"nolimit\" >".$task_state['no_deadline_project']."</option>\n".
              "<option value=\"active\" selected=\"selected\" >".$task_state['active_project']."</option>\n".
              "<option value=\"cantcomplete\" >".$task_state['cantcomplete']."</option>\n".
              "</select></td></tr>";

  //get all users in order to show a task owner
  $user_q = db_query("SELECT id, fullname, private FROM ".PRE."users WHERE deleted='f' AND guest=0 ORDER BY fullname");

  //owner
  $content .= "<tr><td>".$lang['project_owner'].":</td><td><select name=\"owner\">\n";
  for( $i=0 ; $user_row = @db_fetch_array($user_q, $i) ; $i++) {
    
    //user test for privacy
    if($user_row['private'] && ($user_row['id'] != $UID ) && ( ! $ADMIN ) && ( ! in_array($user_row['id'], (array)$allowed ) ) ){
      continue;
    }

    $content .= "<option value=\"".$user_row['id']."\"";

      //owner is user
      if( $user_row['id'] == $UID ) {
        $content .= " selected=\"selected\"";
      }
    $content .= ">".$user_row['fullname']."</option>\n";
  }
  $content .= "</select></td></tr>\n";

  //show all the groups
  $group_q = db_query( "SELECT id, name, private FROM ".PRE."usergroups ORDER BY name" );
  $content .= "<tr> <td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=usergroup&amp;type=help'); return false\">".$lang['usergroup']."</a>: </td> <td><select name=\"usergroupid\">\n".
              "<option value=\"0\">".$lang['all_groups']."</option>\n";

  for( $i=0 ; $group_row = @db_fetch_array($group_q, $i ) ; $i++) {
    
    //usergroup test for privacy
    if( (! $ADMIN ) && ( ! in_array($group_row['id'], (array)$GID ) ) ) {
      continue;
    }

    $content .= "<option value=\"".$group_row['id']."\">".$group_row['name']."</option>\n";
  }
  $content .= "</select></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help\" onclick=\"window.open('help/help_language.php?item=globalaccess&amp;type=help'); return false\">".$lang['all_users_view']."</a> </td><td><input type=\"checkbox\" name=\"globalaccess\" ".$DEFAULT_ACCESS." /></td></tr>\n".
              "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help\" onclick=\"window.open('help/help_language.php?item=groupaccess&amp;type=help'); return false\">".$lang['group_edit']."</a> </td><td><input type=\"checkbox\" name=\"groupaccess\" ".$DEFAULT_EDIT." /></td></tr>\n".

              "<tr> <td>".$lang['project_description']."</td> <td><textarea name=\"text\" rows=\"10\" cols=\"60\"></textarea></td> </tr>\n".

              //do we need to email ?
              "<tr><td><label for=\"mailowner\">".$lang['email_owner']."</label></td><td><input type=\"checkbox\" name=\"mailowner\" id=\"mailowner\" ".$DEFAULT_OWNER." /></td></tr>\n".
              "<tr><td><label for=\"maillist\">".$lang['email_group']."</label></td><td><input type=\"checkbox\" name=\"maillist\" id=\"maillist\" ".$DEFAULT_GROUP." /></td></tr>\n".

              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang['add_project']."\"  onclick=\"return fieldCheck()\" />&nbsp;".
              "<input type=\"reset\" value=\"".$lang['reset']."\" /></p>\n".
              "</form>\n";

  new_box( $lang['add_new_project'], $content );

}

?>