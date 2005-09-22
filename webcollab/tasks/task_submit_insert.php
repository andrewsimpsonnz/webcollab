<?php
/*
  $Id$
    
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Parts of this file originally written for Core APM by Dennis Fleurbaaij, Andrew Simpson &
  Marshall Rose 2001/2002.
  
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
require_once(BASE.'includes/admin_config.php' );
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

  if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id='.$parentid ), 0, 0 ) < 1 ) {
    error('Database integrity check', 'Input data does not match - no parent for task' );
  }
  if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id='.$projectid ), 0, 0 ) < 1 ) {
    error('Database integrity check', 'Input data does not match - no project for task' );
  }
}
//start transaction
db_begin();
$q = db_query("INSERT INTO ".PRE."tasks(name,
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
              completion_time )
              values('$name',
              '$text',
              now(),
              now(),
              now(),
              now(),
              $owner,
              ".UID.",
              '$deadline',
              now(),
              $priority,
              $parentid,
              $projectid,
              $taskgroupid,
              $usergroupid,
              '$globalaccess',
              '$groupaccess',
              '$status',
              now() )" );

// get taskid for the new task/project
$taskid = db_lastoid('tasks_id_seq' );

//for a new project set the projectid variable reset correctly
if($parentid == 0 || $projectid == 0 ) {
  db_query('UPDATE '.PRE.'tasks SET projectid='.$taskid.' WHERE id='.$taskid );
  $projectid = $taskid;
}

//if inactive parent project, then set this task to inactive too
$project_status = $status;
if($parentid != 0 ) {
  $project_status = db_result(db_query('SELECT status FROM '.PRE.'tasks WHERE id='.$projectid ), 0, 0 );

  if($project_status == 'cantcomplete' || $project_status == 'notactive' ){
    db_query('UPDATE '.PRE.'tasks SET status=\''.$project_status.'\' WHERE id='.$taskid );
  }
}

//you have already seen this item, no need to announce it to you
db_query('INSERT INTO '.PRE.'seen(userid, taskid, time) VALUES('.UID.', '.$taskid.', now() )');

//set completed percentage project record
$percent_completed = percent_complete($projectid );
db_query('UPDATE '.PRE.'tasks SET completed='.$percent_completed.' WHERE id='.$projectid );

//for completed project set the completion time
if($percent_completed == 100 ){
  $completion_time = db_result(db_query('SELECT MAX(finished_time) FROM '.PRE.'tasks WHERE projectid='.$projectid ), 0, 0 );
  db_query('UPDATE '.PRE.'tasks SET completion_time=\''.$completion_time.'\' WHERE id='.$projectid );
}

//transaction complete
db_commit();

//get name of project for emails
$name_project = db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$projectid ), 0, 0 );

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
    //get rid of magic_quotes - it is not required here
    $name_task_unclean = (get_magic_quotes_gpc() ) ? stripslashes($_POST['name'] ) : $_POST['name']; 
    break;
}

switch($owner ) {
  case 0:
    $name_owner = $lang['nobody'];
    $email_owner = '';
    break;

  default:
    $q   = db_query('SELECT fullname, email FROM '.PRE.'users WHERE id='.$owner );
    $row = db_fetch_num($q, 0 );
    $name_owner = $row[0];
    $email_owner = $row[1];
    break;
}
    
//get rid of magic_quotes - it is not required here
$text_unclean = (get_magic_quotes_gpc() ) ? stripslashes($_POST['text'] ) : $_POST['text'];

//email owner ?
if(isset($_POST['mailowner']) && ($_POST['mailowner'] === 'on') && ($owner != 0) ) {
  
  include_once(BASE.'includes/email.php' );
  
  $email_address_owner = db_result( db_query('SELECT email FROM '.PRE.'users WHERE id='.$owner, 0), 0, 0 );
  $message = $email1 .
              sprintf($email_list, $name_project, $name_task_unclean, status($status, $deadline), $name_owner, $email_owner, $text_unclean );
  email($email_address_owner, $title1, $message );
}

//do we need to send an email to the user group to announce this message
if(isset($_POST['maillist']) && $_POST['maillist'] === 'on' ) {

  include_once(BASE.'includes/email.php' );
  
  $message = $email2 .
              sprintf($email_list, $name_project, $name_task_unclean, status($status, $deadline), $name_owner, $email_owner, $text_unclean );

  if($usergroupid != 0 ) {
    $q = db_query('SELECT '.PRE.'users.email
                      FROM '.PRE.'users
                      LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                      WHERE '.PRE.'usergroups_users.usergroupid='.$usergroupid.'
                      AND '.PRE.'users.deleted=\'f\'');

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

//don't use the default break-out sequence but go to or the parent's page of the project
if($parentid != 0 ) {
  header('Location: '.BASE_URL.'tasks.php?x='.$x.'&action=show&taskid='.$parentid );
  die;
}
else {
  header('Location: '.BASE_URL.'main.php?x='.$x );
  die;
}
?>