<?php
/*
  $Id: task_submit_insert.php 2170 2009-04-06 07:25:59Z andrewsimpson $

  (c) 2002 - 2015 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/time.php' );
include_once(BASE.'lang/lang_email.php' );
include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'tasks/task_submit.php' );

//secure variables
$usergroup_mail = array();

//deny guest users
if(GUEST ) {
 warning($lang['access_denied'], $lang['not_owner'] );
}

//check task name is present
if(empty($_POST['name']) ){
  warning($lang['task_submit'], $lang['missing_values'] );
}
$name = safe_data($_POST['name']);

//mandatory numeric inputs
$input_array = array('owner', 'projectid', 'parentid', 'priority', 'taskgroupid', 'usergroupid', 'day', 'month', 'year' );
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

//carry out some data consistency checking
if( $parentid != 0 ) {

  $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id=? LIMIT 1' );

  db_execute($q, array($parentid ) );
  if(db_result($q, 0, 0 ) < 1 ) {
    error('Database integrity check', 'Input data does not match - no parent for task' );
  }
  db_free_result($q );
  db_execute($q, array($projectid ) );
  if(db_result($q, 0, 0 ) < 1 ) {
    error('Database integrity check', 'Input data does not match - no project for task' );
  }
  db_free_result($q );
}
//start transaction
db_begin();
$q = db_prepare('INSERT INTO '.PRE.'tasks(name,
                                          text,
                                          created,
                                          lastforumpost,
                                          lastfileupload,
                                          edited,
                                          owner,
                                          creator,
                                          deadline,
                                          finished_time,
                                          priority,
                                          parent,
                                          projectid,
                                          taskgroupid,
                                          usergroupid,
                                          globalaccess,
                                          groupaccess,
                                          status,
                                          sequence,
                                          completion_time )
              values(?, ?, now(), now(), now(), now(), ?, ?, ?, now(), ?, ?, ?, ?, ?, ?, ?, ?, 0, now() )' );

db_execute($q, array($name, $text, $owner, UID, $deadline, $priority, $parentid, $projectid, $taskgroupid, $usergroupid, $globalaccess, $groupaccess, $status ) );

// get taskid for the new task/project
$taskid = db_lastoid('tasks_id_seq' );

//for a new project set the projectid variable reset correctly
if($parentid == 0 || $projectid == 0 ) {
  $q = db_prepare('UPDATE '.PRE.'tasks SET projectid=? WHERE id=?' );
  db_execute($q, array($taskid, $taskid ) );
  $projectid = $taskid;
}

//if inactive parent project, then set this task to inactive too
$project_status = $status;
if($parentid != 0 ) {
  $q = db_prepare('SELECT status FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
  db_execute($q, array($projectid ) );
  $project_status = db_result($q, 0, 0 );

  if($project_status == 'cantcomplete' || $project_status == 'notactive' ){
    $q = db_prepare('UPDATE '.PRE.'tasks SET status=? WHERE id=?' );
    db_execute($q, array($project_status, $taskid ) );
  }
}

//you have already seen this item, no need to announce it to you
$q = db_prepare('INSERT INTO '.PRE.'seen(userid, taskid, time) VALUES(?, ?, now() )');
db_execute($q, array(UID, $taskid ) );

//adjust completion status in project
adjust_completion($projectid );

//transaction complete
db_commit();

//get name of project for emails
$q = db_prepare('SELECT name FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
db_execute($q, array($projectid ) );
$name_project = db_result($q, 0, 0 );

//set project/task type for emails
switch($parentid){
  case 0:
    $email1 = $email_new_owner_project;
    $email2 = $email_new_group_project;
    $title1 = $title_new_owner_project;
    $title2 = $title_new_group_project;
    $name_task_unclean = '';
    break;

  default:
    $email1 = $email_new_owner_task;
    $email2 = $email_new_group_task;
    $title1 = $title_new_owner_task;
    $title2 = $title_new_group_task;
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
    $row = db_fetch_all($q, 0 );
    $name_owner = $row['fullname'];
    $email_owner = $row['email'];
    break;
}

//get unclean text
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

//do we need to send an email to the user group to announce this message
if(isset($_POST['maillist']) && $_POST['maillist'] === 'on' ) {

  include_once(BASE.'includes/email.php' );

  $message = $email2 .
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
    if(sizeof($EMAIL_MAILINGLIST ) > 0 ){
      $usergroup_mail = array_merge((array)$usergroup_mail, (array)$EMAIL_MAILINGLIST );
    }
    email($usergroup_mail, sprintf($title2, $name), $message );
  }
}

//go back to the project page
if($parentid != 0 ) {
  //new task
  header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$parentid );
  die;
}
else {
  //new project
  header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$taskid );
  die;
}

?>