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

//
//function to verify user access
//
function user_access($taskid ) {

  global $uid, $gid;

  $q = db_query("SELECT owner, usergroupid, groupaccess FROM tasks WHERE id=$taskid" );
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
  $q = db_query("SELECT id FROM tasks WHERE parent=$task_id" );

  if(db_numrows($q ) == 0)
    return;

   for($i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
     db_query("UPDATE tasks SET projectid=$projectid WHERE id=".$row[0] );
     //recursion to find anymore children
     reparent_children($row[0] );
   }

return;
}

//MAIN PROGRAM
//update or insert ?
if( ! isset($_REQUEST["action"]) )
  error("Task submit", "No request given" );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_REQUEST["action"] ) {

    //mark it as completed!
    case "done":

      if( ! isset($_GET["taskid"]) || ! is_numeric($_GET["taskid"]) )
        error("Task submit", "You did not specify which task to complete" );

      $taskid = $_GET["taskid"];

      //check if the user has enough rights
      if( ($admin != 1 ) && (! user_access($taskid) ) )
        error("Task submit", "Access denied, you do not have enough rights to do that" );

      //note: self-securing query
      if("done" != db_result( db_query("SELECT status FROM tasks WHERE id=$taskid" ),0 ,0 ))
        db_query("UPDATE tasks SET status='done', finished_time=now(), edited=now() WHERE id=$taskid" );

      break;


    //drop ownership (if admins want to switch ownershit they will have to do it via the edit box instead of the deown button)
    case "deown":

      if( ! isset($_GET["taskid"]) || ! is_numeric($_GET["taskid"] ) )
        error("Task submit", "You did not specify which task to disown" );

      $taskid = $_GET["taskid"];

      //check if the user has enough rights
      if( ($admin != 1 ) && (db_result(db_query("SELECT COUNT(*) FROM tasks WHERE id=$taskid AND owner=$uid" ), 0, 0 ) < 1) )
        warning($lang["task_submit"], $lang["not_owner"] );

      //note: self-securing query
      db_query("UPDATE tasks SET owner=0 WHERE owner=$uid AND id=$taskid" );
      break;


    //take owership of a task
    case "meown":

      if( ! isset($_GET["taskid"]) || ! is_numeric($_GET["taskid"]) )
        error("Task submit", "You did not specify which task to take/own" );

      $taskid = $_GET["taskid"];

      //admin has no bounds checking
      //non-admins can only take non-owned tasks
      //note: self-securing query
      if($admin != 1 )
        db_query("UPDATE tasks SET owner=$uid WHERE id=$taskid AND owner=0" );
      if($admin == 1 ) {
        db_begin();
        //get the current owner and task details
        $q = db_query("SELECT users.id AS id,
                              tasks.projectid AS projectid,
                              tasks.parent AS parent,
                              tasks.name AS name,
                              tasks.text AS text,
                              tasks.status AS status,
                              tasks.deadline AS deadline
                              FROM tasks
                              LEFT JOIN users ON (users.id=tasks.owner)
                              WHERE tasks.id=$taskid" );

        $row = db_fetch_array($q, 0 );
        //do the action
        db_query("UPDATE tasks SET owner=$uid WHERE id=$taskid" );
        db_commit();

        //if there was no previous owner do nothing!
        //there was a previous owner - inform the user that an admin has taken over his task
        if( ($row["id"] != 0 ) && ($uid != $row["id"] ) ) {
          $q = db_query("SELECT email FROM users WHERE users.id=".$row["id"], 0 );
          $email_address_old_owner = db_result( $q, 0, 0 );

          switch($row["parent"] ) {
            case 0:
              $email = $email_takeover_project;
              $title = $title_takeover_project;
              $name_project = $row["name"];
              $name_task = "";
              break;

            default:
              $email = $email_takeover_task;
              $title = $title_takeover_task;
              $name_project = db_result(db_query("SELECT name FROM tasks WHERE id=".$row["projectid"] ), 0, 0 );
              $name_task = $row["name"];
              break;
          }

        //send email
        //$uid_name and $uid_email are from security.php
        $message = sprintf($email, $MANAGER_NAME, date("F j, Y, H:i") ).
                    sprintf($email_list, $name_project, $name_task, status($row["status"], $row["deadline"]), $uid_name, $uid_email, $row["text"], $BASE_URL );
        email( $email_address_old_owner, $title, $message );
        }
      }
      break;

    //insert a new task
    case "insert":
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

      //email owner ?
      if(isset($_POST["mailowner"]) && ($_POST["mailowner"]=="on") && ($owner != 0) ) {
        $email_address_owner = db_result( db_query("SELECT email FROM users WHERE id=".$owner, 0), 0, 0 );
        $message = sprintf($email1, $MANAGER_NAME, date("F j, Y, H:i") ).
                    sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text, $BASE_URL );
        email($email_address_owner, $title1, $message );
      }

      //do we need to send an email to the user group to announce this message
      if(isset($_POST["maillist"]) && $_POST["maillist"] == "on" ) {

        $message = sprintf($email2, $MANAGER_NAME, date("F j, Y, H:i") ).
                    sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text, $BASE_URL );

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
    break;

    //update a task
    case "update":

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
      $previous_status = db_result(db_query("SELECT status FROM tasks WHERE id=$taskid" ), 0, 0 );

      //change the info
      db_query("UPDATE tasks
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
      $q = db_query("SELECT projectid, parent FROM tasks WHERE id=$taskid" );
      $row = db_fetch_array($q, 0 );
      $projectid = $row["projectid"];

      //if the user has chosen to reparent, then do it now
      //(we do this after the main update, then if anything breaks, the database is not corrupted)
      if($row["parent"] != $parentid ) {
        //set new projectid
        if($parentid == 0 )
          $projectid = $taskid;
        else
          $projectid = db_result(db_query("SELECT projectid FROM tasks WHERE id=$parentid" ), 0, 0 );

        //update this task, then recursively search for children tasks and reparent them too.
        db_query("UPDATE tasks SET projectid=$projectid, parent=$parentid WHERE id=$taskid" );
        reparent_children($taskid );
      }

      //make adjustments for child tasks
      if($parentid == 0 ) {
        switch($status ) {
          case "cantcomplete":
          case "notactive":
            //inactive project, then set the uncompleted child tasks to inactive too
            db_query("UPDATE tasks SET status='$status' WHERE projectid=$projectid AND (status='active' OR status='created')" );
            break;

          case "new":
          case "active":
            //if reinstated project, set inactive child tasks to new
            if($previous_status == "cantcomplete" || $previous_status == "notactive" )
              db_query("UPDATE tasks SET status='created' WHERE projectid=$projectid AND parent<>0 AND status='".$previous_status."'" );
            break;
        }
      }

      //transaction complete
      db_commit();

      //get name of project and owner for emails
      $name_project = db_result(db_query("SELECT name FROM tasks WHERE id=$projectid" ), 0, 0 );

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

      //email owner ?
      if(isset($_POST["mailowner"]) && ($_POST["mailowner"]=="on") && ($owner != 0) ) {

        $email_address_owner = db_result(db_query("SELECT email FROM users WHERE id=$owner", 0), 0, 0 );

        $message = sprintf($email1, $MANAGER_NAME, date("F j, Y, H:i") ).
                    sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text, $BASE_URL );
        email($email_address_owner, $title1, $message );
      }

      //email the user group ?
      if(isset($_POST["maillist"]) && ($_POST["maillist"]=="on") ) {

        $message = sprintf($email2, $MANAGER_NAME, $name_owner, date("F j, Y, H:i") ).
                    sprintf($email_list, $name_project, $name_task, status($status, $deadline), $name_owner, $email_owner, $text, $BASE_URL );

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
      email($usergroup, $title2, $message );
      }
    break;

    //default error
    default:
      error("Task submit", "Invalid request given");
      break;
  }

header("Location: ".$BASE_URL."tasks.php?x=$x&action=show&taskid=$taskid" );

?>
