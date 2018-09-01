<?php
/*
  $Id: task_todo_list.php 2295 2009-08-24 09:42:09Z andrewsimpson $

  (c) 2002 - 2017 Andrew Simpson <andrewnz.simpson at gmail.com>

  WebCollab
  ---------------------------------------

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

  Show the tasks that are still to-do

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
include_once(BASE.'tasks/task_common.php' );

//
// List tasks
//

function listTasks($projectid ) {
  global $lang;
  global $task_uncompleted, $task_projectid;
  global $task_array, $parent_array, $shown_array, $task_count, $level_count;

  $task_array   = array();
  $parent_array = array();
  $shown_array  = array();
  $check_array  = array();
  $task_count   = 0;  //counter for $task_array
  $level_count  = 1;  //number of task levels

  //search for uncompleted tasks by projectid
  $task_key = array_keys((array)$task_projectid, $projectid );

  if(sizeof($task_key) < 1 ){
    return;
  }

  //cycle through relevant tasks
  foreach((array)$task_key as $key ) {

    $task_array[$task_count]['id']                = $task_uncompleted[($key)]['id'];
    $task_array[$task_count]['parent']            = $task_uncompleted[($key)]['parent'];
    $task_array[$task_count]['task']              = $task_uncompleted[($key)]['task'];
    $task_array[$task_count]['group_name']        = $task_uncompleted[($key)]['group_name'];
    $task_array[$task_count]['group_description'] = $task_uncompleted[($key)]['group_description'];
    $task_array[$task_count]['group_id']          = $task_uncompleted[($key)]['group_id'];

    //used to check for orphaned subtasks
    $check_array[($task_array[$task_count]['id'])] = 1;

    //if this is a subtask, store the parent id
    if($task_array[$task_count]['parent'] != $projectid ) {
      //store parent as array key for faster searching
      $parent_array[($task_array[$task_count]['parent'])] = 1;
    }
    ++$task_count;

    //remove used key to shorten future searches
    unset($task_projectid[$key] );
  }

  //check if we have taskgroups
  if($task_array[0]['group_id'] ) {
    $content = '';
    $stored_groupid = '';
    $taskgroup_flag = 1;
    $taskgroup_initial_flag = 1;
  }
  else {
    $content = "<ul class=\"ul-".$level_count."\">\n";
    $taskgroup_flag = 0;
  }

  //iteration for main tasks
  for($i=0 ; $i < $task_count ; ++$i ) {

    //ignore items already shown
    if(isset($shown_array[($task_array[$i]['id'])]) ) {
      continue;
    }

    //ignore subtasks in this iteration, unless parent is not listed to be shown
    if(($task_array[$i]['parent'] != $projectid ) && (isset($check_array[($task_array[$i]['parent'])] ) ) )  {
      continue;
    }

    //set taskgroups - if we have them
    if($taskgroup_flag ) {

      //check if taskgroup has changed from last iteration
      if(($stored_groupid != $task_array[$i]['group_id'] ) || $taskgroup_initial_flag ) {

        //don't need </ul> before first taskgroup heading (no <ul> is set)
        if( ! $taskgroup_initial_flag ) {
          $content .= "</ul>\n";
          $level_count = 1;
        }

        $content .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

        //set taskgroup name, or 'Uncategorised' if none
        if(! $task_array[$i]['group_name']) {
          $content .= $lang['uncategorised'];
        }
        else {
          $content .= $task_array[$i]['group_name'];
          //add taskgroup description
          if($task_array[$i]['group_description']) {
            $content .=  "&nbsp;<i>( ".$task_array[$i]['group_description']." )</i>";
          }
        }

        $content .= "</p>\n<ul class=\"ul-".$level_count."\">\n";

        //store current groupid & clear initial flag
        $stored_groupid = $task_array[$i]['group_id'];
        $taskgroup_initial_flag = 0;
      }
    }

    //show line
    $content .= $task_array[$i]['task'];

    //add to shown array
    $shown_array[($task_array[$i]['id'])] = 1;

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_children($task_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }

  $content .= "</ul>\n";

  unset($task_array);
  unset($shown_array);
  unset($parent_array);

  return $content;
}

//
// List subtasks (recursive function)
//
function find_children($parent ) {

  global $task_array, $parent_array, $shown_array, $task_count, $level_count;

  $content_flag = 0;
  $content = "\n<ul class=\"ul-".$level_count."\">\n";

  for($i=0 ; $i < $task_count ; ++$i ) {

    //ignore tasks not directly under this parent
    if($task_array[$i]['parent'] != $parent ) {
      continue;
    }

    //ignore items already shown
    if(isset($shown_array[($task_array[$i]['id'])]) ) {
      continue;
    }

    $content .= $task_array[$i]['task'];

    //we have content to show
    $content_flag = 1;

    //add to shown array, so that we don't show it again!
    $shown_array[($task_array[$i]['id'])] = 1;

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_children($task_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }
  --$level_count;
  $content .= "</ul>\n";

  if(! $content_flag ) {
    $content = '';
  }

  return $content;
}


//
//START OF MAIN PROGRAM
//

$flag = 0;
$content = '';
$allowed = array();
$task_uncompleted = array();
$task_projectid   = array();

//get list of common users in private usergroups that this user can view
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid,
                      '.PRE.'usergroups_users.userid AS userid
                      FROM '.PRE.'usergroups_users
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'usergroups_users.usergroupid)
                      WHERE '.PRE.'usergroups.private=1');

for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
   $allowed[($row[1])] = $row[1];
  }
}

//check validity of inputs
if(isset($_POST['selection']) && strlen($_POST['selection']) > 0 ) {
  $selection = safe_data($_POST['selection']);
}
else {
  $selection = 'user';
}

if( @safe_integer($_POST['userid']) ){
  $userid = $_POST['userid'];
}
else {
  $userid = (GUEST ) ? 0 : UID;
}

if( @safe_integer($_POST['groupid']) ) {
  $groupid = $_POST['groupid'];
}
else {
  $groupid = 0;
}

// check if there are projects
$q = db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE parent=0' );
if(db_result($q, 0, 0 ) < 1 ) {
  $content = "<div style=\"text-align : center\"><a href=\"tasks.php?x=".X."&amp;action=add\">".$lang['add']."</a></div>\n";
  new_box( $lang['no_projects'], $content );
  return;
}

//set selection & associated defaults for the text boxes
switch($selection ) {
  case 'group':
    $userid = 0; $s1 = ""; $s2 = " selected=\"selected\""; $s3 = " checked=\"checked\""; $s4 = "";
    $s5 = "style=\"background-color: #DDDDDD\""; $s6 = "style=\"background-color: white\"";
    $type = "AND usergroupid=? ";
    if($groupid == 0 ){
      $s4 = " selected=\"selected\"";
    }
    break;

  case 'user':
  default:
    $groupid = 0; $s1 = " checked=\"checked\""; $s2 = ""; $s3 = ""; $s4 = " selected=\"selected\"";
    $s5 = "style=\"background-color: white\""; $s6 = "style=\"background-color: #DDDDDD\"";
    $type = "AND task_owner=? ";
    if($userid == 0 ){
      $s2 = " selected=\"selected\"";
    }
    break;
}

$content .= "<div style=\"text-align : right\">\n".
            "<a href=\"icalendar.php?x=".X."&amp;action=todo&amp;selection=".$selection."&amp;userid=".$userid."&amp;groupid=".$groupid."\" title=\"".$lang['icalendar']."\">".
            "<img src=\"images/calendar_link.png\" alt=\"".$lang['icalendar']."\" width=\"16\" height=\"16\" /></a>\n</div>\n";


$content .= "<form method=\"post\" action=\"tasks.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"todo\" /></fieldset>\n".
            "<table class=\"decoration\" >\n".
            "<tr style=\"text-align:left\"><td>".$lang['todo_list_for']."</td>".
            "<td><input type=\"radio\" value=\"user\" name=\"selection\" onchange=\"javascript:this.form.submit()\" id=\"user\"".$s1." /><label for=\"user\">".$lang['users']."</label></td><td>\n".
            "<label><select name=\"userid\" ".$s5." onchange=\"javascript:this.form.submit()\" >\n".
            "<option value=\"0\"".$s2.">".$lang['nobody']."</option>\n";

//get all users for option box
$q = db_query('SELECT id, fullname, private FROM '.PRE.'users WHERE deleted=\'f\' AND guest=0 ORDER BY fullname');

//user input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($row['private'] && ($row['id'] !=  UID ) && ( ! ADMIN ) && ( ! isset($allowed[($row['id'])] ) ) ){
    continue;
  }

  $content .= "<option value=\"".$row['id']."\"";

  //highlight current selection
  if($row['id'] == $userid ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$row['fullname']."</option>\n";
}

$content .= "</select></label></td>\n".
            "<td><input type=\"radio\" value=\"group\" name=\"selection\" onchange=\"javascript:this.form.submit()\" id=\"group\"".$s3." /><label for=\"group\">".$lang['usergroups']."</label></td><td>\n".
            "<label><select name=\"groupid\" ".$s6." onchange=\"javascript:this.form.submit()\">\n".
            "<option value=\"0\"".$s4.">".$lang['no_group']."</option>\n";

//get all groups for option box
$q = db_query('SELECT id, group_name, private FROM '.PRE.'usergroups ORDER BY group_name' );

//usergroup input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

  //usergroup test for privacy
  if( ($row['private'] ) && (! isset($GID[($row['id'])] ) ) && (! ADMIN ) ) {
    continue;
  }

  $content .= "<option value=\"".$row['id']."\"";

  //highlight current selection
  if( $row['id'] == $groupid ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$row['group_name']."</option>\n";
}

$content .= "</select></label></td>\n".
            "<td><input type=\"submit\" value=\"".$lang['update']."\" /></td></tr>\n".
            "</table>\n".
            "</form>\n";

//get the sort order for projects/tasks
$q   = db_query('SELECT project_order, task_order FROM '.PRE.'config' );
$row = db_fetch_num($q, 0 );
$project_order = $row[0];
$task_order    = str_replace('ORDER BY', '', $row[1] );

if(substr(DATABASE_TYPE, 0, 5) == 'mysql' ) {
  $no_group = 'IF('.PRE.'taskgroups.group_name IS NULL, 1, 0), ';
}
else {
  $no_group = '';
}

// show all subtasks that are not complete
$q = db_prepare('SELECT '.PRE.'tasks.id AS id,
                        '.PRE.'tasks.task_name AS task_name,
                        '.PRE.'tasks.deadline AS deadline,
                        '.PRE.'tasks.parent AS parent,
                        '.PRE.'tasks.projectid AS projectid,
                        '.db_epoch().' '.PRE.'tasks.deadline) AS due,
                        '.PRE.'tasks.priority AS priority,
                        '.PRE.'taskgroups.id AS group_id,
                        '.PRE.'taskgroups.group_name AS group_name,
                        '.PRE.'taskgroups.group_description AS group_description
                        FROM '.PRE.'tasks
                        LEFT JOIN '.PRE.'taskgroups ON ('.PRE.'taskgroups.id='.PRE.'tasks.taskgroupid)
                        WHERE parent<>0
                        AND (task_status=\'created\' OR task_status=\'active\')
                        '.$type.usergroup_tail().
                        'ORDER BY '.$no_group.' group_name,'.$task_order );

switch($selection ) {
  case 'group':
    db_execute($q, array($groupid ) );
    break;

  case 'user':
    db_execute($q, array($userid ) );
  default:
    break;
}


for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //put values into array
  $task_uncompleted[$i]['id']                = $row['id'];
  $task_uncompleted[$i]['parent']            = $row['parent'];
  $task_uncompleted[$i]['group_id']          = $row['group_id'];
  $task_uncompleted[$i]['group_name']        = $row['group_name'];
  $task_uncompleted[$i]['group_description'] = $row['group_description'];

  $this_task = "<li><a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row[ "id" ]."\">";

  //add highlighting if deadline is due
  $state = ceil( ($row['due'] - TIME_NOW )/86400 );

  if($state > 1) {
    $this_task .= $row['task_name']."</a>".sprintf($lang['due_in_sprt'], $state );
  }
  else if($state > 0) {
    $this_task .= $row['task_name']."</a>".$lang['due_tomorrow'];
  }
  else {
    $this_task .= "<span class=\"red\">".$row['task_name']."</span></a>";
  }

  $task_uncompleted[$i]['task'] = $this_task;

  //record projectid
  $task_projectid[$i] = $row['projectid'];

}

db_free_result($q);

//query to get the all the projects
$q = db_query('SELECT id,
                      task_name,
                      '.db_epoch().' deadline) AS due,
                      priority
                      FROM '.PRE.'tasks
                      WHERE parent=0 AND archive=0 '.usergroup_tail().$project_order );

// show all uncompleted tasks and projects belonging to this user or group
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  $new_content = listTasks($row['id'] );

  //if no task, don't show project name either
  if($new_content != '' ) {
    $content .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>".$row['task_name']."</b></p>\n".$new_content."\n";
    //set flag to show there is at least one uncompleted task
    $flag = 1;
  }
}

if( $flag != 1 ) {
  $content .= "<p>".$lang['no_assigned']."</p>\n";
}

new_box( $lang['todo_list'], $content );

?>
