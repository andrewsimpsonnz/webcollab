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
        $message = $email .
                    sprintf($email_list, $name_project, $name_task, status($row["status"], $row["deadline"]), $uid_name, $uid_email, $row["text"] );
        email( $email_address_old_owner, $title, $message );
        }
      }
      break;
}

header("Location: ".$BASE_URL."tasks.php?x=$x&action=show&taskid=$taskid" );

?>