<?php
/*
  $Id$
    
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
include_once(BASE."lang/lang_email.php" );
include_once(BASE."tasks/task_common.php" );

//
//validate input data as either numeric > 0 or zero
//
function check($var ) {

  //validate as numeric
    if(is_numeric($var) )
      return intval($var);
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

//
//function to verify user access
//
function user_access($taskid ) {

  global $uid, $gid;

  $q = db_query("SELECT owner, usergroupid, groupaccess FROM ".PRE."tasks WHERE id=$taskid" );
  $row = db_fetch_num($q, 0 );

  //user is owner
  if($row[0] == $uid )
    return TRUE;

  //no usergroup set
  if($row[1] == 0 )
    return FALSE;

  //if groupaccess is set, check user is in usergroup
  if($row[2] == "t" ) {
    if(in_array($row[1], (array)$gid ) )
      return TRUE;
  }
  //no access for this user
  return FALSE;
}

//
// Recursive function to find chldren tasks and reset their projectid's
//

function reparent_children($task_id ) {

   global $projectid;

  //find the children tasks - if any
  $q = db_query("SELECT id FROM ".PRE."tasks WHERE parent=$task_id" );

  if(db_numrows($q ) == 0)
    return;

   for($i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
     db_query("UPDATE ".PRE."tasks SET projectid=$projectid WHERE id=".$row[0] );
     //recursion to find anymore children
     reparent_children($row[0] );
   }

return;
}

if( ! isset($_POST["name"]) || strlen($_POST["name"]) == 0 )
  warning($lang["task_submit"], $lang["missing_values"] );

//check input has been provided
$input_array = array("taskid", "owner", "parentid", "priority", "status", "taskgroupid", "usergroupid");
foreach($input_array as $var ) {
  if( ! isset($_POST[$var]) || strlen($_POST[$var]) == 0 ) {
    error( "Task submit", "Variable ".$var." is not set" );
  }
}

$name        = safe_data($_POST["name"]);
$text        = safe_data_long($_POST["text"]);
$status      = safe_data($_POST["status"]);

$taskid      = check($_POST["taskid"]);
$owner       = check($_POST["owner"]);
$parentid    = check($_POST["parentid"]);
$priority    = check($_POST["priority"]);
$taskgroupid = check($_POST["taskgroupid"]);
$usergroupid = check($_POST["usergroupid"]);

if($taskid == 0 )
  error("Task submit","Invalid value for taskid" );

//check if the user has enough rights
if( ($admin != 1 ) && (! user_access($taskid ) ) )
  warning($lang["task_submit"], $lang["not_owner"] );

//get the submitted date
$deadline = date_to_datetime( $_POST["day"], $_POST["month"], $_POST["year"] );

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

//begin transaction
db_begin();

//get existing status
$previous_status = db_result(db_query("SELECT status FROM ".PRE."tasks WHERE id=$taskid" ), 0, 0 );

//change the info
db_query("UPDATE ".PRE."tasks
      SET name='$name',
      text='$text',
      edited=now(),
      owner=$owner,
      deadline='$deadline',
      finished_time=now(),
      priority=$priority,
      taskgroupid=$taskgroupid,
      usergroupid=$usergroupid,
      status='$status',
      globalaccess='$globalaccess',
      groupaccess='$groupaccess'
      WHERE id=$taskid" );

//get existing projectid and parent from the database
$q = db_query("SELECT projectid, parent FROM ".PRE."tasks WHERE id=$taskid" );
$row = db_fetch_array($q, 0 );
$projectid = $row["projectid"];

//if the user has chosen to reparent, then do it now
//(we do this after the main update, then if anything breaks, the database is not corrupted)
if($row["parent"] != $parentid ) {
  //set new projectid
  if($parentid == 0 )
    $projectid = $taskid;
  else
    $projectid = db_result(db_query("SELECT projectid FROM ".PRE."tasks WHERE id=$parentid" ), 0, 0 );
  
  //can't put a project onto it's own tasks
  if(($projectid == $row["projectid"] ) && ($row["parent"] == 0 ) ){
    //do nothing
  }
  else {
    //update this task, then recursively search for children tasks and reparent them too.
    db_query("UPDATE ".PRE."tasks SET projectid=$projectid, parent=$parentid WHERE id=$taskid" );
    reparent_children($taskid );
  }
}

//make adjustments for child tasks
if($parentid == 0 ) {
  switch($status ) {
    case "cantcomplete":
    case "notactive":
      //inactive project, then set the uncompleted child tasks to inactive too
      db_query("UPDATE ".PRE."tasks SET status='$status' WHERE projectid=$projectid AND (status='active' OR status='created')" );
      break;

    case "new":
    case "active":
      //if reinstated project, set inactive child tasks to new
      if($previous_status == "cantcomplete" || $previous_status == "notactive" )
        db_query("UPDATE ".PRE."tasks SET status='created' WHERE projectid=$projectid AND parent<>0 AND status='".$previous_status."'" );
      break;
  }
}

//set completed percentage project record
$percent_completed = round(percent_complete($projectid ) );
db_query("UPDATE ".PRE."tasks SET completed=".$percent_completed." WHERE id=".$projectid );

//for completed project set the completion time
if($percent_completed == 100 ){
  $completion_time = db_result(db_query("SELECT MAX(finished_time) FROM ".PRE."tasks WHERE projectid=$projectid" ), 0, 0 );
  db_query("UPDATE ".PRE."tasks SET completion_time='".$completion_time."' WHERE id=".$projectid );
}

//transaction complete
db_commit();

//get name of project and owner for emails
$name_project = db_result(db_query("SELECT name FROM ".PRE."tasks WHERE id=$projectid" ), 0, 0 );

switch($parentid ){
  case 0:
    $email1 = $email_edit_owner_project;
    $title1 = $title_edit_owner_project;
    $email2 = $email_edit_group_project;
    $title2 = $title_edit_group_project;
    $name_task = "";
    break;

  default:
    $email1 = $email_edit_owner_task;
    $title1 = $title_edit_owner_task;
    $email2 = $email_edit_group_task;
    $title2 = $title_edit_group_task;
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
    $q = db_query("SELECT fullname, email FROM ".PRE."users WHERE id=$owner" );
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

  include_once(BASE."includes/email.php" );

  $email_address_owner = db_result(db_query("SELECT email FROM ".PRE."users WHERE id=$owner", 0), 0, 0 );

  $message = $email1 .
              sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text );
  email($email_address_owner, $title1, $message );
}

//email the user group ?
if(isset($_POST["maillist"]) && ($_POST["maillist"]=="on") ) {
  
  include_once(BASE."includes/email.php" );

  $message = sprintf($email2, $name_owner ).
              sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text );

  $usergroup = "";
  $s = "";
  if($EMAIL_MAILINGLIST != "" ) {
    $usergroup = $EMAIL_MAILINGLIST;
    $s = ", ";
  }

  if($usergroupid != 0 ) {
    $q = db_query("SELECT ".PRE."users.email
                      FROM ".PRE."users
                      LEFT JOIN ".PRE."usergroups_users ON (".PRE."usergroups_users.userid=".PRE."users.id)
                      WHERE ".PRE."usergroups_users.usergroupid=$usergroupid
                      AND ".PRE."users.deleted='f'");

    for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
      $usergroup .= $s.$row[0];
      $s = ", ";
    }
  }
email($usergroup, $title2, $message );
}

header("Location: ".$BASE_URL."tasks.php?x=$x&action=show&taskid=$taskid" );

?>