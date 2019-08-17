<?php
/*
  $Id: task_edit.php 2270 2009-08-14 06:58:03Z andrewsimpson $

  (c) 2002 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/details.php' );
include_once(BASE.'includes/time.php' );
include_once(BASE.'tasks/task_common.php' );


$content = '';
$javascript = '';
$allowed = array();
$new_owner = false;
$new_status = false;

//
//check user access
//
function user_access($owner, $usergroupid, $groupaccess ) {

  global $GID, $TASKID_ROW;

  if(ADMIN ){
    return true;
  }
  if(GUEST ){
    return false;
  }
  if($owner == UID ){
    return true;
  }
  if($owner == 0 ) { //owner is nobody
    return true;
  }
  if($usergroupid == 0 ) {
    return false;
  }
  if($groupaccess == 't' ) {
    if(isset($GID[$usergroupid] ) ) {
      return true;
    }
  }
  return false;
}

//
// List tasks for reparenting
//

function listReparentTasks($projectid, $self_parent ) {

  global $task_reparent, $task_projectid;
  global $task_array, $parent_array, $task_count, $level_count;

  //initialise variables
  $content = '';
  $task_array   = array();
  $parent_array = array();
  $task_count   = 0;  //counter for $task_array
  $level_count  = 1;  //number of task levels

  //search for tasks by projectid
  $task_key = array_keys((array)$task_projectid, $projectid );

  if(sizeof($task_key) < 1 ) {
    return;
  }

  //cycle through relevant tasks
  foreach((array)$task_key as $key ) {

    $task_array[$task_count]['id']          = $task_reparent[($key)]['id'];
    $task_array[$task_count]['parent']      = $task_reparent[($key)]['parent'];
    $task_array[$task_count]['task_name']   = $task_reparent[($key)]['task_name'];

    //if this is a subtask, store the parent id
    if($task_array[$task_count]['parent'] != $projectid ) {
      //store parent as array key for faster searching
      $parent_array[($task_array[$task_count]['parent'])] = 1;
    }
    ++$task_count;

    //remove used key to shorten future searches
    unset($task_projectid[$key] );
  }

  $padding = padding($level_count );

  //iteration for main tasks
  for($i=0 ; $i < $task_count ; ++$i ){

    //ignore subtasks in this iteration
    if(($task_array[$i]['parent'] != $projectid ) )  {
      continue;
    }

    //show line
    $content .= "<option value=\"".$task_array[$i]['id']."\"";

    if($self_parent == $task_array[$i]['id'] ) {
      $content .= " selected=\"selected\"";
    }
    $content .= ">".$padding.$task_array[$i]['task_name']."</option>\n";

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_children($task_array[$i]['id'], $self_parent );
    }
  }

  return $content;
}

//
// List subtasks (recursive function)
//
function find_children($parent, $self_parent ) {

  global $task_array, $parent_array, $task_count, $level_count;

  ++$level_count;
  $content = '';

  $padding = padding($level_count );

  for($i=0 ; $i < $task_count ; ++$i ) {

    //ignore tasks not directly under this parent
    if($task_array[$i]['parent'] != $parent ){
      continue;
    }

    //show line
    $content .= "<option value=\"".$task_array[$i]['id']."\"";

    if($self_parent == $task_array[$i]['id'] ) {
      $content .= " selected=\"selected\"";
    }
    $content .= ">".$padding.$task_array[$i]['task_name']."</option>\n";

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_children($task_array[$i]['id'], $self_parent );
    }
  }
  --$level_count;

  return $content;
}

//
// Padding for reparenting list
//

function padding($level_count ) {

  $padding = '&nbsp;';
  $max_level = min($level_count, 4 );

  for($i=0; $i < $max_level; ++$i ) {
    $padding .= '&nbsp;&nbsp;';
  }

return $padding;
}

//  START MAIN PROGRAM

//get input data
if(! @safe_integer($_GET['taskid']) ){
  error('Task edit', 'The taskid input is not valid' );
}
$taskid = $_GET['taskid'];

if(isset($_GET['owner'] ) && @safe_integer($_GET['owner'] ) ) {
  $new_owner = $_GET['owner'];
}

if(isset($_GET['status'] ) && $_GET['status'] ) {
  $new_status = 'done';
}

//disable main form when archiving
if(isset($_GET['action']) && $_GET['action'] == 'archive' ) {

  if($TYPE !== 'project' ) {
    error('Archive', 'Archiving not possible for tasks' );
  } 

  $s       = " disabled=\"disabled\"";
  $archive = true;
}
else {
  $s       = '';
  $archive = false;
}

//generate_token
generate_token('tasks' );

//can this user edit this task ?
if( ! user_access($TASKID_ROW['task_owner'], $TASKID_ROW['usergroupid'], $TASKID_ROW['groupaccess'] ) ) {
  warning($lang['access_denied'], $lang['no_edit'] );
}

//get list of common users in private usergroups that this user can view 
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid,
                      '.PRE.'usergroups_users.userid AS userid 
                      FROM '.PRE.'usergroups_users 
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'usergroups_users.usergroupid)
                      WHERE '.PRE.'usergroups.private=1');

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
   $allowed[($row[1])] = $row[1];
  }
}

//start showing task info
$content .= "<form method=\"post\" action=\"tasks.php\" onsubmit= \"return fieldCheck('name') && dateCheck()\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_update\" />\n".
            "<input type=\"hidden\" id=\"token\" name=\"token\" value=\"".TOKEN."\" />\n".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$TASKID_ROW['id']."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert1\" value=\"".$lang['missing_field_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"alert_date\" name=\"alert2\" value=\"".$lang['invalid_date_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"alert_finish\" name=\"alert3\" value=\"".$lang['finish_date_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"url\" name=\"url\" value=\"".$lang['url_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"image_url\" name=\"image_url\" value=\"".$lang['image_url_javascript']."\" />\n";

//select either project or task for text
switch($TYPE) {
  case 'project':
    $content .= "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"-1\" />\n".
                //no taskgroups in projects
                "<input type=\"hidden\" name=\"taskgroupid\" value=\"0\" /></fieldset>\n ".
                "<table class=\"celldata\">\n".
                "<tr><td>".$lang['creation_time']."</td><td>".nicedate($TASKID_ROW['created'] )."</td></tr>\n".
                "<tr><td>".$lang['project_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" class=\"size\" value=\"".$TASKID_ROW['task_name']."\"".$s." /></td></tr>\n";
    break;

  case 'task':
    //get parent details
    $q = db_prepare('SELECT '.db_epoch().'deadline) AS epoch_deadline, task_status FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
    db_execute($q, array($TASKID_ROW['parent'] ) );
    $parent_row = db_fetch_array($q, 0 );

    switch ($parent_row['task_status'] ) {
      case 'created':
      case 'active':
        //add the project deadline (plus GMT offset) for the javascript
        $project_deadline = $parent_row['epoch_deadline'] + TZ*60*60;
        break;

      case 'notactive':
      case 'cantcomplete':
      case 'done':
      case 'nolimit':
      default:
        //don't check project deadline with inactive parents
        $project_deadline = -1;
        break;
    }

    //get project name
    $q = db_prepare('SELECT task_name FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
    db_execute($q, array($TASKID_ROW['projectid'] ) );
    $project_name = db_result($q, 0, 0 );

    //show project finish date for javascript & other details
    $content .=  "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"".$project_deadline."\"".$s." /></fieldset>\n".
                 "<table class=\"celldata\">\n".
                 "<tr><td>".$lang['creation_time']."</td><td>".nicedate($TASKID_ROW['created'] )."</td></tr>\n".
                 "<tr><td>".$lang['project'] .":</td><td><a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$TASKID_ROW['projectid']."\">".$project_name."</a></td></tr>\n";
    break;
}

//reparenting
$content .= "<tr><td>".$lang['parent_task'].":</td><td><select name=\"parentid\"".$s.">\n";
$content .= "<option value=\"0\"";

if($TASKID_ROW['parent'] == 0 ){
  $content .= " selected=\"selected\"";
}
$content .= ">".$lang['no_reparent']."</option>\n";

//get tasks for reparenting and store for later use
if($TASKID_ROW['parent'] == 0 ) {
  //For project: Don't show tasks under
  $q = db_prepare('SELECT id, task_name, parent, projectid FROM '.PRE.'tasks
                        WHERE id<>? AND parent<>0 AND projectid<>?'.usergroup_tail().'AND archive=0 ORDER BY task_name');

  db_execute($q, array($taskid, $taskid ) );
}
else {
  //For task: Don't show child tasks under
  $q = db_prepare('SELECT id, task_name, parent, projectid FROM '.PRE.'tasks
                        WHERE id<>? AND (parent<>0 OR parent<>?)'.usergroup_tail().' AND archive=0 ORDER BY task_name');

  db_execute($q, array($taskid, $taskid ) );
}

for($i = 0; $reparent_row = @db_fetch_array($q, $i ); ++$i ) {
  //put values into array
  $task_reparent[$i]['id']         = $reparent_row['id'];
  $task_reparent[$i]['task_name']  = $reparent_row['task_name'];
  $task_reparent[$i]['parent']     = $reparent_row['parent'];
  $task_projectid[$i]              = $reparent_row['projectid'];
}

//get projects for reparenting
$q = db_prepare('SELECT id, task_name FROM '.PRE.'tasks WHERE parent=0 AND id<>?'.usergroup_tail().' AND archive=0 ORDER BY task_name');
db_execute($q, array($taskid ) );

for( $i=0 ; $reparent_row = @db_fetch_array($q, $i ) ; ++$i ) {

  $content .= "<option value=\"".$reparent_row['id']."\"";

  if($TASKID_ROW['parent'] == $reparent_row['id'] ) {
    $content .= " selected=\"selected\"";
  }
  $content .= ">+&nbsp;".$reparent_row['task_name']."</option>\n";

  //add tasks previously stored
  $content .= listReparentTasks($reparent_row['id'], $TASKID_ROW['parent'] );
}

$content .="</select></td></tr>\n";

//show task (if applicable)
if($TASKID_ROW['parent'] != 0 ){
  $content .= "<tr><td>".$lang['task_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" class=\"size\" value=\"".$TASKID_ROW['task_name']."\" /></td></tr>\n";
}
//deadline
$content .= "<tr><td>".$lang['deadline'].":</td><td>".date_select($TASKID_ROW['deadline'], $s )."</td></tr>\n";

//priority
$s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";

switch($TASKID_ROW['priority'] ) {
  case 0:
    $s1 = "selected=\"selected\"";
    break;

  case 1:
    $s2 = " selected=\"selected\"";
    break;

  case 3:
    $s4 =" selected=\"selected\"";
    break;

  case 4:
    $s5 = " selected=\"selected\"";
    break;

  case 2:
  default:
    $s3 = " selected=\"selected\"";
    break;
}

$content .= "<tr><td>".$lang['priority'].":</td><td>\n".
            "<select name=\"priority\"".$s.">\n".
            "<option value=\"0\"".$s1.">".$task_state['dontdo']."</option>\n".
            "<option value=\"1\"".$s2.">".$task_state['low']."</option>\n".
            "<option value=\"2\"".$s3.">".$task_state['normal']."</option>\n".
            "<option value=\"3\"".$s4.">".$task_state['high']."</option>\n".
            "<option value=\"4\"".$s5.">".$task_state['yesterday']."</option>\n".
            "</select></td></tr>\n";

$s1 = ""; $s2 = ""; $s3 = ""; $s4 = "";

switch($TASKID_ROW['parent'] ){
  case 0:
    //status for projects - 'done' is calculated from tasks
    switch($TASKID_ROW['task_status'] ) {
      case 'notactive':
        $s1 = " selected=\"selected\"";
        break;

      case 'nolimit':
        $s2 = " selected=\"selected\"";
        break;

      case 'cantcomplete':
        $s4 =" selected=\"selected\"";
        break;

      case 'active':
      default:
        $s3 = " selected=\"selected\"";
        break;
    }
    $content .= "<tr><td>".$lang['status'].":</td><td>\n".
                 "<select name=\"status\"".$s.">\n".
                 "<option value=\"notactive\"".$s1.">".$task_state['planned_project']."</option>\n".
                 "<option value=\"nolimit\"".$s2.">".$task_state['no_deadline_project']."</option>\n".
                 "<option value=\"active\"".$s3.">".$task_state['active_project']."</option>\n".
                 "<option value=\"cantcomplete\"".$s4.">".$task_state['cantcomplete']."</option>\n".
                 "</select></td></tr>";
    break;

    default:
      //status for tasks
      if($new_status !== false ) {
        $selection = $new_status;
      }
      else {
        $selection = $TASKID_ROW['task_status'];
      }

     $s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";

      switch($selection ) {
        case 'notactive':
          $s2 = " selected=\"selected\"";
          break;

        case 'active':
          $s3 = " selected=\"selected\"";
          break;

        case 'cantcomplete':
          $s4 =" selected=\"selected\"";
          break;

        case 'done':
          $s5 = " selected=\"selected\"";
          break;

        case 'created':
        default:
          $s1 = " selected=\"selected\"";
          break;
      }
      $content .= "<tr><td>".$lang['status'].":</td><td>\n".
                   "<select id=\"projectStatus\" name=\"status\"".$s.">\n".
                   "<option value=\"created\"".$s1.">".$task_state['new']."</option>\n".
                   "<option value=\"notactive\"".$s2.">".$task_state['planned']."</option>\n".
                   "<option value=\"active\"".$s3.">".$task_state['active']."</option>\n".
                   "<option value=\"cantcomplete\"".$s4.">".$task_state['cantcomplete']."</option>\n".
                   "<option value=\"done\"".$s5.">".$task_state['completed']."</option>\n".
                   "</select></td></tr>";
}

//check if new task owner has been preset
if($new_owner !== false ) {
  $selection = $new_owner;
}
else {
  $selection = $TASKID_ROW['task_owner'];
}

//task owner
$content .= "<tr><td>".$lang[$TYPE."_owner"].":</td><td><select name=\"owner\"".$s.">\n";

if($selection == 0 ) {
  $content .= "<option value=\"0\" selected=\"selected\">".$lang['nobody']."</option>\n";
}
else {
  $content .= "<option value=\"0\">".$lang['nobody']."</option>\n";
}

//get current user list
$q = db_query('SELECT id, fullname, private FROM '.PRE.'users WHERE deleted=\'f\' AND guest=0 ORDER BY fullname' );

for( $i=0 ; $user_row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($user_row['private'] && ($user_row['id'] != UID ) && ( ! ADMIN ) && ( ! isset($allowed[($user_row['id'])] ) ) ){
    continue;
  }

  $content .= "<option value=\"".$user_row['id']."\"";

  if($selection == $user_row['id'] ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$user_row['fullname']."</option>\n";
}

$content .= "</select></td></tr>\n";

//show a selection box with the taskgroups
//  (projects don't have taskgroups)
if($TASKID_ROW['parent'] != 0 ) {

  $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=taskgroup&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['taskgroup']."</a>: </td><td><select name=\"taskgroupid\"".$s.">\n";
  $content .= "<option value=\"0\">".$lang['no_group']."</option>\n";

  $q = db_query('SELECT id, group_name FROM '.PRE.'taskgroups ORDER BY group_name' );

  for( $i=0 ; $taskgroup_row = @db_fetch_array($q, $i ) ; ++$i) {

    $content .= "<option value=\"".$taskgroup_row['id']."\"";

    if($TASKID_ROW['taskgroupid'] == $taskgroup_row['id'] ) {
      $content .= " selected=\"selected\"";
    }
    $content .= ">".$taskgroup_row['group_name']."</option>\n";
  }
  $content .= "</select></td></tr>\n";
}

//show all user-groups
$content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=usergroup&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['usergroup']."</a>: </td><td><select name=\"usergroupid\"".$s.">\n";
$content .= "<option value=\"0\">".$lang['no_group']."</option>\n";

$q = db_query('SELECT id, group_name, private FROM '.PRE.'usergroups ORDER BY group_name' );

for( $i=0 ; $usergroup_row = @db_fetch_array($q, $i ) ; ++$i ) {

  //usergroup test for privacy
  if( (! ADMIN ) && ($usergroup_row['private'] ) && ( ! isset($GID[($usergroup_row['id'])] ) ) ) {
    continue;
  }

  $content .= "<option value=\"".$usergroup_row['id']."\"";

    if( $TASKID_ROW['usergroupid'] == $usergroup_row['id'] ) {
      $content .= " selected=\"selected\" >\n";
    }
    else {
      $content .= ">\n";
    }
    $content .= $usergroup_row['group_name']."</option>\n";
}
$content .= "</select></td></tr>\n";

//check box defaults
$global = ($TASKID_ROW['globalaccess'] == 't' ) ? "checked=\"checked\"" : '';
$group  = ($TASKID_ROW['groupaccess']  == 't' ) ? "checked=\"checked\"" : '';

$content .= "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=globalaccess&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['all_users_view']."</a></td><td><input type=\"checkbox\" name=\"globalaccess\" ".$global."".$s." /></td></tr>\n".
             "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=groupaccess&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['group_edit']."</a></td><td><input type=\"checkbox\" name=\"groupaccess\" ".$group."".$s." /></td></tr>\n".

             "<tr><td>".$lang[$TYPE."_description"]."</td>".
             "<td><script type=\"text/javascript\"> edToolbar('text');</script>".
             "<textarea name=\"text\" id=\"text\" rows=\"10\" cols=\"60\"".$s.">".$TASKID_ROW['task_text']."</textarea></td></tr>\n".

             //do we need to email ?
             "<tr><td><label for=\"mailowner\">".$lang['email_new_owner']."</label></td><td><input type=\"checkbox\" name=\"mailowner\" id=\"mailowner\" ".DEFAULT_OWNER."".$s." /></td></tr>\n".
             "<tr><td><label for=\"maillist\">".$lang['email_group']."</label></td><td><input type=\"checkbox\" name=\"maillist\" id=\"maillist\" ".DEFAULT_GROUP."".$s." /></td></tr>\n".

             "</table>\n".

             "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\"".$s." /></p>".
             "</form>\n";

//delete options
if((ADMIN ) || ($TASKID_ROW['task_owner'] == UID ) ) { 

  $content .= "<form method=\"post\" action=\"tasks.php\" ".
              "onsubmit=\"return confirm('".sprintf($lang["del_javascript_".$TYPE."_sprt"], javascript_escape($TASKID_ROW['task_name'] ) )."')\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />".
              "<input type=\"hidden\" name=\"action\" value=\"delete\" />\n".
              "<input type=\"hidden\" name=\"taskid\" value=\"".$TASKID_ROW['id']."\" />\n".
              "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
              "<p><input type=\"submit\" value=\"".$lang["delete_".$TYPE]."\"".$s." /></p>\n".
              "</form>\n";
}

//archive project option
if($archive ) {

  $content .= "<form id=\"delete_file\" method=\"post\" action=\"archive.php\" onsubmit=\"return confirm( '".sprintf( $lang['javascript_archive_project'], javascript_escape($TASKID_ROW['task_name'] ) )."' )\">\n".
             "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
             "<input type=\"hidden\" name=\"action\" value=\"submit_archive\" />\n".
             "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" />\n".
             "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
             "<p><input type=\"submit\" value=\"".$lang['archive_project']."\"/></p>\n".
             "</form>\n";
}

new_box($lang["edit_".$TYPE], $content );

?>
