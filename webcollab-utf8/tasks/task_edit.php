<?php
/*
  $Id$

  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
  WebCollab
  ---------------------------------------
  Based on original file written for CoreAPM by Dennis Fleurbaaij, Andrew Simpson &
  Marshall Rose 2001/2002

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

include_once(BASE."includes/details.php" );
include_once(BASE."includes/admin_config.php" );
include_once(BASE."includes/time.php" );

$usergroup[0] = 0;
$javascript = "";
$allowed[0] = 0; 

//get list of common users in private usergroups that this user can view 
$q = db_query("SELECT ".PRE."usergroups_users.usergroupid AS usergroupid,
                      ".PRE."usergroups_users.userid AS userid 
                      FROM ".PRE."usergroups_users 
                      LEFT JOIN ".PRE."usergroups ON (".PRE."usergroups.id=".PRE."usergroups_users.usergroupid)
                      WHERE ".PRE."usergroups.private=1");

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  if(in_array($row[0], (array)$GID ) && ! in_array($row[1], (array)$allowed, TRUE ) ) {
   $allowed[] = $row[1];
  }
}

//
//check user access
//
function user_access($owner, $usergroupid, $groupaccess ) {

  global $UID, $GID, $ADMIN, $GUEST, $TASKID_ROW;

  if($ADMIN == 1)  
    return TRUE;
    
  if($GUEST == 1)
    return FALSE;   

  if($owner == $UID )
    return TRUE;

  if($usergroupid == 0 )
    return FALSE;

  if( $groupaccess == "t" ) {
    if(in_array((int)$usergroupid, (array)$GID, TRUE ) )
      return TRUE;
  }
  return FALSE;
}

//set variable
$content = "";

if(empty($_GET['taskid']) || ! is_numeric($_GET['taskid']) )
  error("Task edit", "The taskid input is not valid" ); 

$taskid = intval($_GET['taskid']);

//can this user edit this task ?
if( ! user_access($TASKID_ROW['owner'], $TASKID_ROW['usergroupid'], $TASKID_ROW['groupaccess'] ) )
  warning($lang['access_denied'], $lang['no_edit'] );
  
  
//get project details - if any
$q = db_query("SELECT name, ".$epoch."deadline) AS deadline FROM ".PRE."tasks WHERE id=".$TASKID_ROW['projectid'] );
$project_row = db_fetch_array($q, 0 );

//all okay show task info
$content .= "<form method=\"post\" action=\"tasks.php\" onsubmit= \"return dateCheck()\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"$x\" />\n ".
            "<input type=\"hidden\" name=\"action\" value=\"submit_update\" />\n ".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$TASKID_ROW['id']."\" />\n";
                                      
//select either project or task for text
switch($TYPE) {
  case 'project':
    $content .= "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"-1\" />\n".            
                //no taskgroups in projects
                "<input type=\"hidden\" name=\"taskgroupid\" value=\"0\" /></fieldset>\n ".
                "<table class=\"celldata\">\n".
                "<tr><td>".$lang['creation_time']."</td><td>".nicedate($TASKID_ROW['created'] )."</td></tr>\n".
                "<tr><td>".$lang['project_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" size=\"30\" value=\"".html_escape($TASKID_ROW['name'])."\" /></td></tr>\n";
    break;

  case 'task':
    //show project finish date for javascript (plus GMT offset)
    $project_deadline = $project_row['deadline'] + (TZ * 3600);
    
    $content .=  "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"".$project_deadline."\" /></fieldset>\n".          
                 "<table class=\"celldata\">\n".
                 "<tr><td>".$lang['creation_time']."</td><td>".nicedate($TASKID_ROW['created'] )."</td></tr>\n".
                 "<tr><td>".$lang['project'] .":</td><td><a href=\"tasks.php?x=$x&amp;action=show&taskid=".$TASKID_ROW['projectid']."\">".$project_row['name']."</a></td></tr>\n";
    break;
}

//reparenting
$content .= "<tr><td>".$lang['parent_task'].":</td><td><select name=\"parentid\">\n";
$parentq = db_query("SELECT id, name, usergroupid, globalaccess FROM ".PRE."tasks WHERE id<>$taskid AND archive=0 ORDER BY name");
$content .= "<option value=\"0\"";

if($TASKID_ROW['parent'] == 0 )
  $content .= " selected=\"selected\"";
$content .= ">".$lang['no_reparent']."</option>\n";

for( $i=0; $parent_row = @db_fetch_array($parentq, $i ); $i++) {
  //check for private usergroups
  if( ($ADMIN != 1) && ($parent_row['usergroupid'] != 0 ) && ($parent_row['globalaccess'] == 'f' ) ) {

  if( ! in_array($parent_row['usergroupid'], (array)$GID, TRUE ) )
    continue;
  }

  $content .= "<option value=\"".$parent_row['id']."\"";
  if($TASKID_ROW['parent'] == $parent_row['id'] )
    $content .= " selected=\"selected\"";
  $content .= ">".$parent_row['name']."</option>\n";
  }
$content .="</select></td></tr>\n";

//show task (if applicable)
if($TASKID_ROW['parent'] != 0 )
  $content .= "<tr><td>".$lang['task_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" size=\"30\" value=\"".html_escape($TASKID_ROW['name'])."\" /></td></tr>\n";

//deadline
$content .= "<tr><td>".$lang['deadline'].":</td><td>".date_select_from_timestamp($TASKID_ROW['deadline'])."</td></tr>\n";

//priority

  switch($TASKID_ROW['priority'] ) {
      case "0":
      $s1 = "selected=\"selected\""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";
      break;

    case "1":
      $s1 = ""; $s2 = " selected=\"selected\""; $s3 = ""; $s4 =""; $s5 = "";
      break;

    case "2":
    default:
      $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\""; $s4 =""; $s5 = "";
      break;

   case "3":
      $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" selected=\"selected\""; $s5 = "";
      break;

    case "4":
      $s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = " selected=\"selected\"";
      break;
  }


$content .= "<tr><td>".$lang['priority'].":</td><td>\n".
            "<select name=\"priority\">\n".
            "<option value=\"0\"$s1>".$task_state['dontdo']."</option>\n".
            "<option value=\"1\"$s2>".$task_state['low']."</option>\n".
            "<option value=\"2\"$s3>".$task_state['normal']."</option>\n".
            "<option value=\"3\"$s4>".$task_state['high']."</option>\n".
            "<option value=\"4\"$s5>".$task_state['yesterday']."</option>\n".
            "</select></td></tr>\n";

switch($TASKID_ROW['parent'] ){
  case 0:
    //status for projects - 'done' is calculated from tasks
    switch($TASKID_ROW['status'] ) {
      case "notactive":
        $s1 = " selected=\"selected\""; $s2 = ""; $s3 = ""; $s4 = "";
        break;

      case "nolimit":
        $s1 = ""; $s2 = " selected=\"selected\""; $s3 = ""; $s4 ="";
        break;

      case "cantcomplete":
        $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" selected=\"selected\"";
        break;

      case "active":
      default:
        $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\""; $s4 ="";
        break;
    }
    $content .= "<tr><td>".$lang['status'].":</td><td>\n".
                 "<select name=\"status\">\n".
                 "<option value=\"notactive\"$s1>".$task_state['planned_project']."</option>\n".
                 "<option value=\"nolimit\"$s2>".$task_state['no_deadline_project']."</option>\n".
                 "<option value=\"active\"$s3>".$task_state['active_project']."</option>\n".
                 "<option value=\"cantcomplete\"$s4>".$task_state['cantcomplete']."</option>\n".
                 "</select></td></tr>";
    break;

    default:
      //status for tasks
      switch($TASKID_ROW['status'] ) {
        case "notactive":
          $s1 = ""; $s2 = " selected=\"selected\""; $s3 = ""; $s4 =""; $s5 = "";
          break;

        case "active":
          $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\""; $s4 =""; $s5 = "";
          break;

        case "cantcomplete":
          $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" selected=\"selected\""; $s5 = "";
          break;

        case "done":
          $s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = " selected=\"selected\"";
          break;

        case "created":
        default:
          $s1 = " selected=\"selected\""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";
          break;
      }
      $content .= "<tr> <td>".$lang['status'].":</td> <td>\n".
                   "<select name=\"status\">\n".
                   "<option value=\"created\"$s1>".$task_state['new']."</option>\n".
                   "<option value=\"notactive\"$s2>".$task_state['planned']."</option>\n".
                   "<option value=\"active\"$s3>".$task_state['active']."</option>\n".
                   "<option value=\"cantcomplete\"$s4>".$task_state['cantcomplete']."</option>\n".
                   "<option value=\"done\"$s5>".$task_state['completed']."</option>\n".
                   "</select></td></tr>";
}

//task owner
$user_q = db_query("SELECT id, fullname, private FROM ".PRE."users WHERE deleted='f' AND guest=0 ORDER BY fullname" );
$content .= "<tr> <td>".$lang[$TYPE."_owner"].":</td> <td><select name=\"owner\">\n".
            "<option value=\"0\">".$lang['nobody']."</option>\n";

//select the user first
for( $i=0 ; $user_row = @db_fetch_array($user_q, $i ) ; $i++) {
      
  //user test for privacy
  if($user_row['private'] && ( ! $ADMIN ) && ( ! in_array($user_row['id'], (array)$allowed, TRUE ) ) ){
    continue;
  }
    
  $content .= "<option value=\"".$user_row['id']."\"";

  if( $TASKID_ROW['owner'] == $user_row['id'] )
    $content .= " selected=\"selected\"";

  $content .= ">".$user_row['fullname']."</option>\n";
}

$content .= "</select></td></tr>\n";


//show a selection box with the taskgroups
if($TASKID_ROW['parent'] != 0 ){

  //get all users in order to show a task owner
  $taskgroup_q = db_query("SELECT id, name FROM ".PRE."taskgroups ORDER BY name" );
  $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=taskgroup&amp;type=help'); return false\">".$lang['taskgroup']."</a>: </td> <td><select name=\"taskgroupid\">\n";
  $content .= "<option value=\"0\">".$lang['no_group']."</option>\n";

  for( $i=0 ; $user_row = @db_fetch_array($taskgroup_q, $i ) ; $i++) {

    $content .= "<option value=\"".$user_row['id']."\"";

    if($TASKID_ROW['taskgroupid'] == $user_row['id'] )
      $content .= " selected=\"selected\"";

    $content .= ">".$user_row['name']."</option>\n";

  }
  $content .= "</select></td></tr>\n";
}

//show all user-groups
$usergroup_q = db_query("SELECT id, name FROM ".PRE."usergroups ORDER BY name" );
$content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=usergroup&amp;type=help'); return false\">".$lang['usergroup']."</a>: </td> <td><select name=\"usergroupid\">\n";
$content .= "<option value=\"0\">".$lang['no_group']."</option>\n";

for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++ ) {
    
  //usergroup test for privacy
  if( (! $ADMIN ) && ( ! in_array($usergroup_row['id'], (array)$GID, TRUE ) ) ) {
    continue;
  }

  $content .= "<option value=\"".$usergroup_row['id']."\"";

    if( $TASKID_ROW['usergroupid'] == $usergroup_row['id'] )
      $content .= " selected=\"selected\" >\n";
    else
      $content .= ">\n";

    $content .= $usergroup_row['name']."</option>\n";

}
$content .= "</select></td></tr>\n";

$global = "";
if($TASKID_ROW['globalaccess'] == 't' )
  $global = "checked=\"checked\"";

$group = "";
if($TASKID_ROW['groupaccess'] == 't' )
  $group = "checked=\"checked\"";

$content .= "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help\" onclick=\"window.open('help/help_language.php?item=globalaccess&amp;type=help'); return false\">".$lang['all_users_view']."</a></td><td><input type=\"checkbox\" name=\"globalaccess\" $global /></td></tr>\n".
             "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help\" onclick=\"window.open('help/help_language.php?item=groupaccess&amp;type=help'); return false\">".$lang['group_edit']."</a> </td><td><input type=\"checkbox\" name=\"groupaccess\" $group /></td></tr>\n".

             "<tr><td>".$lang[$TYPE."_description"]."</td> <td><textarea name=\"text\" rows=\"5\" cols=\"60\">".$TASKID_ROW['text']."</textarea></td> </tr>\n".

             //do we need to email ?
             "<tr><td><label for=\"mailowner\">".$lang['email_new_owner']."</label></td><td><input type=\"checkbox\" name=\"mailowner\" id=\"mailowner\" $DEFAULT_OWNER /></td></tr>\n".
             "<tr><td><label for=\"maillist\">".$lang['email_group']."</label></td><td><input type=\"checkbox\" name=\"maillist\" id=\"maillist\" $DEFAULT_GROUP /></td></tr>\n".

             "</table>\n".
             
             "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" onclick=\"return fieldCheck()\" />&nbsp;".
             "<input type=\"reset\" value=\"".$lang['reset']."\" /></p>".
             "</form>\n";

//delete options
$content .= "<br /><br />\n<form method=\"post\" action=\"tasks.php\">\n".
             "<fieldset><input type=\"hidden\" name=\"x\" value=\"$x\" />".
             "<input type=\"hidden\" name=\"action\" value=\"delete\" />\n".
             "<input type=\"hidden\" name=\"taskid\" value=\"".$TASKID_ROW['id']."\" />\n".
             "<input type=\"submit\" value=\"".$lang["delete_".$TYPE]."\" onclick=\"return confirm('".sprintf($lang["del_javascript_".$TYPE."_sprt"], javascript_escape($TASKID_ROW['name'] ) )."')\" /></fieldset>\n".
             "</form>\n";

new_box($lang["edit_".$TYPE], $content );

?>