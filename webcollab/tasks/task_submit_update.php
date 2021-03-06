<?php
/*
  $Id: task_submit_update.php 2294 2009-08-24 09:41:39Z andrewsimpson $

  (c) 2002 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com>

  WebCollab
  ---------------------------------------

  Parts of this file originally written for Core Lan Org by Dennis Fleurbaaij, Andrew
  Simpson & Marshall Rose 2001/2002.

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

  Add a task to the database

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/time.php' );
include_once(BASE.'lang/lang_email.php' );
include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'tasks/task_submit.php' );

//secure variables
$usergroup_mail = array();



function reparent_child_check($taskid, $new_parentid, $projectid) {

  global $task_array, $parent_array, $task_count;

  $task_array   = array();
  $parent_array = array();
  $task_count = 0;
  $state = false;

  $q = db_prepare('SELECT id, parent FROM '.PRE.'tasks WHERE projectid=?' );
  db_execute($q, array($projectid ) );

  for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

    //put values into array
    $task_array[$i]['id'] = $row['id'];
    $task_array[$i]['parent'] = $row['parent'];
    ++$task_count;

    //if this is a subtask, store the parent id
    if($row['parent'] != 0 ) {
      $parent_array[($row['parent'])] = $row['parent'];
    }
  }

  //if selected task has children (subtasks), iterate recursively to find them
  if(isset($parent_array[($taskid)] ) ) {
    $state = find_children($taskid, $new_parentid );
  }
  return $state;
}

//
// List subtasks (recursive function)
//
function find_children($parent, $new_parentid ) {

  global $task_array, $parent_array, $task_count;

  for($i=0 ; $i < $task_count ; ++$i ) {

    if($task_array[$i]['parent'] != $parent ) {
      continue;
    }

    //see if new parentid is an existing child
    if($new_parentid == $task_array[$i]['id'] ) return true;

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      find_children($task_array[$i]['id'], $new_parentid );
    }
  }
  return false;
}


//
// Recursive function to find chldren tasks and reset their projectid's
//

function reparent_children($taskid ) {

  global $projectid;

  //find the children tasks - if any
  $q = db_prepare('SELECT id FROM '.PRE.'tasks WHERE parent=?' );
  db_execute($q, array($taskid ) );

  $q1 = db_prepare('UPDATE '.PRE.'tasks SET projectid=? WHERE id=?' );

  for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
    db_execute($q1, array($projectid, $row[0] ) );
    //recursion to find anymore children
    reparent_children($row[0] );
  }

  return;
}

//MAIN PROGRAM

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'tasks' );

//check for task name
if(empty($_POST['name']) ){
  warning($lang['task_submit'], $lang['missing_values'] );
}
$name = safe_data($_POST['name']);

//mandatory numeric inputs
$input_array = array('owner', 'parentid', 'priority', 'taskgroupid', 'usergroupid', 'day', 'month', 'year' );
foreach($input_array as $var ) {
  if(! @safe_integer($_POST[$var]) ) {
    error( 'Task submit', 'Variable '.$var.' is not correctly set' );
  }
  ${$var} = $_POST[$var];
}

//special case: $priority < 5
if($priority > 5 ) {
  error('Task submit', 'Variable priority is not correctly set' );
}

//special case: taskid cannot be zero
if(! @safe_integer($_POST['taskid']) || $_POST['taskid'] == 0 ){
  error('Task submit', 'Variable taskid is not correctly set' );
}
$taskid = $_POST['taskid'];

//mandatory text inputs
if(empty($_POST['status']) ){
  error( 'Task submit', 'Variable status is not correctly set' );
}
$status = status_check(safe_data($_POST['status']) );

//optional text input (can be multiple lines)
$text = safe_data_long($_POST['text']);

//get the submitted date
$deadline = date_to_datetime($day, $month, $year );

//boolean for globalaccess, groupaccess
$input_array = array('globalaccess', 'groupaccess' );
foreach($input_array as $var ) {
  if(isset($_POST[$var]) && $_POST[$var] === 'on' ) {
    ${$var} = 't';
  }
  else {
    ${$var} = 'f';
  }
}

//check if the user has enough rights
if(! user_access($taskid ) ){
  warning($lang['task_submit'], $lang['not_owner'] );
}

//set finished_time if task is done
if($status == 'done' ) {
  $finish_row = 'finished_time=now(),';
}
else {
  $finish_row = '';
}

//begin transaction
db_begin();

//get existing projectid, parent and status from the database
$q = db_prepare('SELECT projectid, parent, task_status FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
db_execute($q, array($taskid ) );
$row = db_fetch_array($q, 0 );
$old_projectid = $row['projectid'];
$old_status    = $row['task_status'];
$old_parentid  = $row['parent'];
$projectid     = $old_projectid;

//change the info
$q = db_prepare('UPDATE '.PRE.'tasks
                        SET task_name=?,
                        task_text=?,
                        edited=now(),
                        task_owner=?,
                        deadline=?,
                        priority=?,
                        taskgroupid=?,
                        usergroupid=?,
                        task_status=?,
                        globalaccess=?,
                        groupaccess=?,
                        '.$finish_row.'
                        sequence=sequence+1
                        WHERE id=?' );

db_execute($q, array($name, $text, $owner, $deadline, $priority, $taskgroupid, $usergroupid, $status, $globalaccess, $groupaccess, $taskid ) );

//if the user has chosen to reparent, then do it now
//(we do this after the main update, then if anything breaks, the database is not corrupted)
if($old_parentid != $parentid ) {
  //now we set the new projectid
  if($parentid == 0 ) {
    $projectid = $taskid;
  }
  else {
    $q = db_prepare('SELECT projectid FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
    db_execute($q, array($parentid ) );
    $projectid = db_result($q, 0, 0 );
  }

  //no deadline project changing to tasks goes to 'new'
  if(($parentid > 0 ) && ($old_status == 'nolimit' ) ) {
    $status = 'created';
  }

  //can't put a project onto it's own tasks _OR_ re-parent a task under it's own children
  if((($projectid == $old_projectid ) && ($old_parentid == 0 ) ) || reparent_child_check($taskid, $parentid, $projectid ) ) {
    //do nothing
  }
  else {
    //update this task, then recursively search for children tasks and reparent them too.
    $q = db_prepare('UPDATE '.PRE.'tasks SET projectid=?, parent=?, task_status=? WHERE id=?' );
    db_execute($q, array($projectid, $parentid, $status, $taskid ) );
    reparent_children($taskid );
  }

  //adjust completion status in former project
  adjust_completion($old_projectid );
}

//make adjustments for child tasks to match project status
if($parentid == 0 ) {

  switch($status ) {
    case 'cantcomplete':
    case 'notactive':
      //inactive project, then set the uncompleted child tasks to inactive too
      $q = db_prepare('UPDATE '.PRE.'tasks SET task_status=? WHERE projectid=? AND (task_status=\'active\' OR task_status=\'created\')' );
      db_execute($q, array($status, $projectid ) );
      break;

    case 'new':
    case 'active':
    default:
      //if reinstated project, set previously inactive child tasks to 'new'
      if($old_status == 'cantcomplete' || $old_status == 'notactive' ) {
        $q = db_prepare('UPDATE '.PRE.'tasks SET task_status=\'created\' WHERE projectid=? AND parent<>0 AND task_status=?' );
        db_execute($q, array($projectid, $old_status ) );
      }
      break;
  }
}

//adjust completion status in project
adjust_completion($projectid );

//transaction complete
db_commit();

//get name of project and owner for emails
$q = db_prepare('SELECT task_name FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
db_execute($q, array($projectid ) );
$name_project = db_result($q, 0, 0 );

switch($parentid ){
  case 0:
    $email1 = $email_edit_owner_project;
    $title1 = $title_edit_owner_project;
    $email2 = $email_edit_group_project;
    $title2 = $title_edit_group_project;
    $name_task_unclean = '';
    break;

  default:
    $email1 = $email_edit_owner_task;
    $title1 = $title_edit_owner_task;
    $email2 = $email_edit_group_task;
    $title2 = $title_edit_group_task;
    $name_task_unclean = validate($_POST['name'] );
    break;
}

switch($owner ) {
  case 0:
    $name_owner = $lang['nobody'];
    $email_owner = '';
    break;

  default:
    $q = db_prepare('SELECT fullname, email FROM '.PRE.'users WHERE id=? LIMIT 1' );
    db_execute($q, array($owner ) );
    $row = db_fetch_num($q, 0 );
    $name_owner = $row[0];
    $email_owner = $row[1];
    break;
  }

  //unclean text
  $text_unclean = validate($_POST['text'] );

//email owner ?
if(isset($_POST['mailowner']) && ($_POST['mailowner'] === 'on') && ($owner != 0) ) {

  include_once(BASE.'includes/email.php' );

  $q = db_prepare('SELECT email FROM '.PRE.'users WHERE id=? LIMIT 1', 0);
  db_execute($q, array($owner ) );
  $email_address_owner = db_result($q, 0, 0 );

  $message = $email1 .
              sprintf($email_list, $name_project, $name_task_unclean, status($status, $deadline), $name_owner, $email_owner, $text_unclean, 'index.php?taskid='.$taskid );
  email($email_address_owner, $title1, $message );
}

//email the user group ?
if(isset($_POST['maillist']) && ($_POST['maillist'] === 'on') ) {

  include_once(BASE.'includes/email.php' );

  $message = sprintf($email2, $name_owner ).
              sprintf($email_list, $name_project, $name_task_unclean, status($status, $deadline), $name_owner, $email_owner, $text_unclean, 'index.php?taskid='.$taskid );

  if($usergroupid != 0 ) {
    $q = db_prepare('SELECT '.PRE.'users.email
                      FROM '.PRE.'users
                      LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                      WHERE '.PRE.'usergroups_users.usergroupid=?
                      AND '.PRE.'users.deleted=\'f\'');
    db_execute($q, array($usergroupid ) );

    for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
      $usergroup_mail[] = $row[0];
    }
  }
  if(sizeof($usergroup_mail) > 0 ) {

    //get & add the mailing list
    if(sizeof($EMAIL_MAILINGLIST ) > 0 ) {
      $usergroup_mail = array_merge((array)$usergroup_mail, (array)$EMAIL_MAILINGLIST );
    }

    email($usergroup_mail, $title2, $message );
  }
}

header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$taskid );

?>
