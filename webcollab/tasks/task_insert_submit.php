<?php
/*
  $Id$
    
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

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

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );
include_once(BASE."includes/time.php" );
include_once(BASE."includes/email.php" );
include_once(BASE."config.php" );
include_once(BASE."lang/lang_email.php" );

//
//validate input data as either numeric > 0 or zero
//
function check($var ) {

  //validate as numeric
    if(is_numeric($var) )
      return $var;
  //catch all for weird inputs
  $var = 0;

return $var;
}

//
//generate status message for emails
//
function status($status, $deadline ) {

  global $task_state, $lang;

  switch($status) {
    case "created":
      $message = $task_state["new"]."\n".$lang["deadline"].": ".nicedate($deadline);
      break;

    case "notactive":
      $message = $task_state["planned"];
      break;

    case "active":
      $message = $task_state["active"]."\n".$lang["deadline"].": ".nicedate($deadline);
      break;

    case "cantcomplete":
      $message = $task_state["cantcomplete"];
      break;

    case "done":
      $message = $task_state["done"];
      break;

    case "nolimit":
    default:
      $message = "";
      break;
  }

return $message;
}

//MAIN PROGRAM

if( ! isset($_POST["name"]) || strlen($_POST["name"]) == 0 )
  warning($lang["task_submit"], $lang["missing_values"] );

//check input has been provided
$input_array = array("parentid", "projectid", "owner", "priority", "status", "taskgroupid", "usergroupid");
foreach($input_array as $var ) {
  if( ! isset($_POST[$var]) || strlen($_POST[$var]) == 0 ) {
    error( "Task submit", "Variable ".$var." is not set" );
  }
}

$name        = safe_data($_POST["name"]);
//text can be multi lines
$text        = safe_data_long($_POST["text"]);
$status      = safe_data($_POST["status"]);

$parentid    = check($_POST["parentid"]);
$projectid   = check($_POST["projectid"]);
$owner       = check($_POST["owner"]);
$priority    = check($_POST["priority"]);
$taskgroupid = check($_POST["taskgroupid"]);
$usergroupid = check($_POST["usergroupid"]);

//get the submitted date
$deadline = date_to_datetime($_POST["day"], $_POST["month"], $_POST["year"] );

//boolean for globalaccess
if(isset($_POST["globalaccess"]) && $_POST["globalaccess"] == "on" )
  $globalaccess = "t";
else
  $globalaccess = "f";

//and for groupaccess
if(isset($_POST["groupaccess"]) && $_POST["groupaccess"] == "on" )
  $groupaccess = "t";
else
  $groupaccess = "f";

//carry out some data consistency checking
if( $parentid != 0 ) {

  if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE id=$parentid" ), 0, 0 ) < 1 )
    error("Database integrity check", "Input data does not match - no parent for task" );

  if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE id=$projectid" ), 0, 0 ) < 1 )
    error("Database integrity check", "Input data does not match - no project for task" );
}
//start transaction
db_begin();
$q = db_query("INSERT INTO tasks(name,
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
              status )
              values('$name',
              '$text',
              now(),
              now(),
              now(),
              now(),
              $owner,
              $uid,
              '$deadline',
              now(),
              $priority,
              $parentid,
              $projectid,
              $taskgroupid,
              $usergroupid,
              '$globalaccess',
              '$groupaccess',
              '$status')" );

// get taskid for the new task/project
$last_oid = db_lastoid($q );
$taskid = db_result(db_query("SELECT id FROM tasks WHERE $last_insert = $last_oid" ), 0, 0 );

//for a new project set the projectid variable reset correctly
if($parentid == 0 || $projectid == 0 )  {
  db_query("UPDATE tasks SET projectid=$taskid WHERE id=$taskid" );
  $projectid = $taskid;
}

//if inactive parent project, then set this task to inactive too
if($parentid != 0 ) {
  $project_status = db_result(db_query("SELECT status FROM tasks WHERE id=$projectid" ), 0, 0 );

  if($project_status == "cantcomplete" || $project_status == "notactive" )
    db_query("UPDATE tasks SET status='$project_status' WHERE id=$taskid" );
}

//you have already seen this item, no need to announce it to you
db_query("INSERT INTO seen(userid, taskid, time) VALUES($uid, $taskid, now() )");
//transaction complete
db_commit();

//get name of project for emails
$name_project = db_result(db_query("SELECT name FROM tasks WHERE id=$projectid" ), 0, 0 );

//set project/task type for emails
switch($parentid){
  case 0:
    $email1 = $email_new_owner_project;
    $email2 = $email_new_group_project;
    $title1 = $title_new_owner_project;
    $title2 = $title_new_group_project;
    $name_task = "";
    break;

  default:
    $email1 = $email_new_owner_task;
    $email2 = $email_new_group_task;
    $title1 = $title_new_owner_task;
    $title2 = $title_new_group_task;
    //get rid of magic_quotes - it is not required here
    if(get_magic_quotes_gpc() )
      $name_task = stripslashes($name );
    else
      $name_task = $name;
    break;
}

switch($owner ) {
  case 0:
    $name_owner = $lang["nobody"];
    $email_owner = "";
    break;

  default:
    $q = db_query("SELECT fullname, email FROM users WHERE id=$owner" );
    $row = db_fetch_num($q, $i );
    $name_owner = $row[0];
    $email_owner = $row[1];
    break;
}
    
//get rid of magic_quotes - it is not required here
if(get_magic_quotes_gpc() )
  $text = stripslashes($text );

//email owner ?
if(isset($_POST["mailowner"]) && ($_POST["mailowner"]=="on") && ($owner != 0) ) {
  $email_address_owner = db_result( db_query("SELECT email FROM users WHERE id=".$owner, 0), 0, 0 );
  $message = $email1 .
              sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text );
  email($email_address_owner, $title1, $message );
}

//do we need to send an email to the user group to announce this message
if(isset($_POST["maillist"]) && $_POST["maillist"] == "on" ) {

  $message = $email2 .
              sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text );

  $usergroup = "";
  $s = "";
  if($EMAIL_MAILINGLIST != "" ) {
    $usergroup = $EMAIL_MAILINGLIST;
    $s = ", ";
  }

  if($usergroupid != 0 ) {
    $q = db_query("SELECT users.email
                      FROM users
                      LEFT JOIN usergroups_users ON (usergroups_users.userid=users.id)
                      WHERE usergroups_users.usergroupid=$usergroupid
                      AND users.deleted='f'");

    for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
      $usergroup .= $s.$row[0];
      $s = ", ";
    }
  }
email($usergroup, sprintf($title2, $name), $message );
}

//don't use the default break-out sequence but go to or the parent's page of the project
if($parentid != 0 ) {
  header("Location: ".$BASE_URL."tasks.php?x=$x&action=show&taskid=$parentid" );
  die;
}
else {
  header("Location: ".$BASE_URL."main.php?x=$x" );
  die;
}
?>