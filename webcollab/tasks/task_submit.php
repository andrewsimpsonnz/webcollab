<?php
/*
  $Id$
  
  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/admin_config.php" );
include_once( BASE."includes/time.php" );
include_once( BASE."includes/email.php" );
include_once( BASE."config.php" );
include_once( BASE."lang/".$LOCALE."_email.php" );

//
//validate input data as either numeric > 0 or zero
//
function check( $var ) {

  //validate as numeric
    if( is_numeric($var) )
      return $var;
  //catch all for weird inputs
  $var = 0;

return $var;
}

//
//generate status message for emails
//
function status($status, $deadline ) {

  global $task_state;

  switch($status) {
    case "created":
      $message = $task_state["new"]."\nDeadline: ".nicedate($deadline);
      break;

    case "notactive":
      $message = $task_state["planned"];
      break;

    case "active":
      $message = $task_state["active"]."\nDeadline: ".nicedate($deadline);
      break;

    case "cantcomplete":
      $message = $task_state["cantcomplete"];
      break;

    case "done":
      $message = $task_state["done"];
      break;

    default:
      $message = "";
      break;
  }

return $message;
}

//MAIN PROGRAM
//update or insert ?
if( valid_string($_REQUEST["action"]) ) {

  switch( $_REQUEST["action"] ) {

    //mark it as completed!
    case "done":

      if( isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {

        $taskid = $_GET["taskid"];

        //check if the user has enough rights
        if( ($admin != 1 ) && (db_result( db_query("SELECT COUNT(*) FROM tasks WHERE id=".$taskid." AND owner=".$uid ), 0, 0 ) < 1) )
          error( "Task submit", "Access denied, you do not have enough rights to do that" );

        //note: self-securing query
        if( "done" != db_result( db_query("SELECT status FROM tasks WHERE id=".$taskid ),0 ,0 ))
          db_query( "UPDATE tasks
	           SET status='done', finished_time=current_timestamp(0), edited=current_timestamp(0)
		   WHERE id=".$taskid );

      }
      else
        error("Task submit", "You did not specify which task to complete" );

      break;


    //drop ownership (if admins want to switch ownershit they will have to do it via the edit box instead of the deown button)
    case "deown":

      if( isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {

        $taskid = $_GET["taskid"];

        //check if the user has enough rights
        if( ($admin != 1 ) && (db_result( db_query("SELECT COUNT(*) FROM tasks WHERE id=".$taskid." AND owner=".$uid ), 0, 0 ) < 1) )
          warning( $lang["task_submit"], $lang["not_owner"] );

        //note: self-securing query
        db_query( "UPDATE tasks SET owner=0 WHERE owner=".$uid." AND id=".$taskid );
      }
      else
        error("Task submit", "You did not specify which task to disown" );

      break;


    //take owership of a task
    case "meown":

      if( isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {

        $taskid = $_GET["taskid"];

        //admin has no bounds checking
        //non-admins can only take non-owned tasks
        //note: self-securing query
        if( $admin == 1 ) {

	  db_begin();
	  //get the current owner and task details
	  $q = db_query("SELECT users.id as id, tasks.projectid as projectid, tasks.name as name ,tasks.text as text, tasks.status as status
                                              FROM tasks LEFT JOIN users ON (users.id=tasks.owner)
                                              WHERE  tasks.id=".$taskid );

          $row = db_fetch_array($q, 0 );

	  //do the action
          db_query( "UPDATE tasks SET owner=".$uid." WHERE id=".$taskid );
	  db_commit();

          //if there was no previous owner do nothing!
	  //there was a previous owner - inform the user that an admin has taken over his task
          if( ($row["id"] != 0 ) && ( $uid != $row["id"] ) ) {
            $q = db_query("SELECT email FROM users WHERE users.id=".$row["id"], 0 );
	    $email_address_old_owner = db_result( $q, 0, 0 );

            //get project name
            $name_project = db_result(db_query("SELECT name FROM tasks WHERE id=".$projectid ), 0, 0 );

            //send email
	    //$username and $useremail are from security.php
            $message = sprintf( $email_takeover, $MANAGER_NAME, date("F j, Y, H:i"), $name_project, $row["name"], $username, $useremail, quotemeta($row["text"]), $BASE_URL );
	    email( $email_address_old_owner, $title_takeover, $message );
          }

	}else
          db_query( "UPDATE tasks SET owner=".$uid." WHERE id=".$taskid." AND owner=0" );
        }
      else
        error("Task submit", "You did not specify which task to take/own" );
    break;


    //insert a new task
    case "insert":
      if( valid_string($_POST["name"]) ) {

        //check input has been provided
        $input_array = array("parentid", "projectid", "owner", "priority", "status", "taskgroupid", "usergroupid");
        foreach( $input_array as $var) {
          if(! isset($_POST[$var]) ) {
            error( "Task submit", "Variable ".$var." is not set" );
          }
        }

        $name        = safe_data($_POST["name"]);
        $text        = safe_data($_POST["text"]);
        $status      = safe_data($_POST["status"]);

        $parentid    = check($_POST["parentid"]);
        $projectid   = check($_POST["projectid"]);
        $owner       = check($_POST["owner"]);
        $priority    = check($_POST["priority"]);
        $taskgroupid = check($_POST["taskgroupid"]);
        $usergroupid = check($_POST["usergroupid"]);

	//get the submitted date
        $deadline = date_to_datetime( $_POST["day"], $_POST["month"], $_POST["year"] );

        //boolean hack
	if( isset($_POST["globalaccess"]) && $_POST["globalaccess"]=="on" )
	  $globalaccess="t";
	else
	  $globalaccess="f";

        //carry out some data consistency checking
        if( $parentid != 0 ) {

          if( db_result( db_query( "SELECT COUNT(*) FROM tasks WHERE id=".$parentid ), 0, 0 ) < 1 )
            error( "Database integrity check", "Input data does not match - no parent for task" );

          if( db_result(db_query( "SELECT COUNT(*) FROM tasks WHERE id=".$projectid ), 0, 0 ) < 1 )
            error( "Database integrity check", "Input data does not match - no project for task" );
        }
	//start transaction
        db_begin();
        $q = db_query( "INSERT INTO tasks(  name,
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
				      status )
                             values( '".$name."',
			             '".$text."',
				      current_timestamp(0),
				      current_timestamp(0),
				      current_timestamp(0),
				      current_timestamp(0),
				      ".$owner.",
				      ".$uid.",
                                      '".$deadline."',
				      current_timestamp(0),
				      ".$priority.",
				      ".$parentid.",
                                      ".$projectid.",
				      ".$taskgroupid.",
				      ".$usergroupid.",
				      '".$globalaccess."',
				      '".$status."')" );


        // get taskid for the new task/project
        $last_oid = db_lastoid( $q );
        $taskid = db_result( db_query( "SELECT id FROM tasks WHERE ".$last_insert."=".$last_oid ), 0, 0 );

	//for a new project set the projectid variable reset correctly
        if( $parentid == 0 || $projectid == 0 )  {
          db_query("UPDATE tasks SET projectid=".$taskid." WHERE id=".$taskid );
          $projectid = $taskid;
        }

	//if inactive parent project, then set this task to inactive too
	if( $parentid != 0 ) {
	$project_status = db_result(db_query( "SELECT status FROM tasks WHERE id=".$projectid ), 0, 0 );
	  
	  if( $project_status == "cantcomplete" || $project_status == "notactive" )
	    db_query( "UPDATE tasks SET status='".$project_status."' WHERE id=".$taskid );
	}

        //you have already seen this item, no need to announce it to you
        db_query("INSERT INTO seen(userid, taskid, time)
                   VALUES(".$uid.",".$taskid.",current_timestamp(0) )");
        //transaction complete
	db_commit();

	//get name of project for emails
        $name_project = db_result(db_query("SELECT name FROM tasks WHERE id=".$projectid ), 0, 0 );

	//set project/task type for emails
	$type = $lang["task"];
	if( $parentid == 0 )
	  $type = $lang["project"];

        //email owner ?
	if( isset($_POST["mailowner"]) && ($_POST["mailowner"]=="on") && ($owner != "") ) {

          //no point in mailing if there is no address
          $email_address_owner = db_result( db_query("SELECT email FROM users WHERE id=".$owner, 0), 0, 0 );

          if( $email_address_owner != "" ) {
	    $message= sprintf( $email_new_owner, $MANAGER_NAME, $type, date("F j, Y, H:i"), $name_project, $name,
	                       status($status, $deadline), quotemeta($text), $BASE_URL );
	    email( $email_address_owner, sprintf($title_new_owner, $type ), $message );
	  }
	}

        //do we need to send an email to the user group to announce this message
        if( isset($_POST["maillist"]) && $_POST["maillist"] == "on" ) {

	  //if there is an owner find it
	  if( $owner != "" ){
            $name_owner = db_result( db_query("SELECT fullname FROM users WHERE id=".$owner ), 0, 0 );
	    }else  $name_owner = "Nobody";

          $message = sprintf( $email_new_group, $MANAGER_NAME, $type, date("F j, Y, H:i"), $name_project, $name, $name_owner,
	                      status($status, $deadline), quotemeta($text), $BASE_URL );
          email( $EMAIL_MAILINGLIST, sprintf($title_new_group, $type).$name, $message );

          if( $usergroupid != 0 ) {
            $usergroup = "";
            $usersq = db_query("SELECT email, users.id as id FROM users, usergroups_users WHERE usergroupid=".$usergroupid." AND usergroups_users.userid=users.id");
            $s = "";
            for( $j=0 ; $userrow = @db_fetch_array($usersq, $j ) ; $j++) {
              $usergroup .= $s.$userrow["email"];
              $s = ", ";
            }
            email( $usergroup, sprintf($title_new_group, $type).$name, $message );
          }

        }

      }
      else
        warning($lang["task_submit"], $lang["missing_values"] );


      //don't use the default break-out sequence but go to or the parent's page of the project
      if ( $parentid != 0 )
        header("location: ".BASE."tasks.php?x=".$x."&action=show&taskid=".$parentid );
      else
        header("location: ".BASE."main.php?x=".$x );
      die;
      break;


    //update a task
    case "update":

      if( valid_string($_POST["name"]) ) {

        //check input has been provided
        $input_array = array("taskid", "owner", "priority", "status", "taskgroupid", "usergroupid");
        foreach( $input_array as $var) {
          if(! isset($_POST[$var]) ) {
            error( "Task submit", "Variable ".$var." is not set" );
          }
        }

        $name        = safe_data($_POST["name"]);
        $text        = safe_data($_POST["text"]);
        $status      = safe_data($_POST["status"]);

        $taskid      = check($_POST["taskid"]);
        $owner       = check($_POST["owner"]);
        $priority    = check($_POST["priority"]);
        $taskgroupid = check($_POST["taskgroupid"]);
        $usergroupid = check($_POST["usergroupid"]);

        if( $taskid == 0 )
          error("Task submit","Invalid value for taskid" );

        //get the submitted date
        $deadline = date_to_datetime( $_POST["day"], $_POST["month"], $_POST["year"] );

        //boolean hack
	if( isset($_POST["globalaccess"]) && $_POST["globalaccess"] == "on" )
	  $globalaccess="t";
	else
	  $globalaccess="f";

	//check if the user has enough rights
        if( ($admin != 1 ) && (db_result( db_query("SELECT COUNT(*) FROM tasks WHERE id=".$taskid." AND owner=".$uid ), 0, 0 ) < 1) )
          warning($lang["task_submit"], $lang["not_owner"] );

	//begin transaction
	db_begin();

        //get existing status
	$previous_status = db_result(db_query( "SELECT status FROM tasks WHERE id=".$taskid ), 0, 0 );

        //change the info
        db_query( "UPDATE tasks
	           SET name='".safe_data($name)."',
                       text='".safe_data($text)."',
		       edited=current_timestamp(0),
		       owner=".$owner.",
		       deadline='".$deadline."',
		       finished_time=current_timestamp(0),
		       priority=".$priority.",
                       taskgroupid=".$taskgroupid.",
		       usergroupid=".$usergroupid.",
                       status='".safe_data($status)."',
		       globalaccess='".$globalaccess."'
		   WHERE id=".$taskid );


        //get projectid and parent from the database
        $q = db_query("SELECT projectid, parent FROM tasks WHERE id=".$taskid );
	$row = db_fetch_array($q, 0 );

	//make adjustments for child tasks
	if( $row["parent"] == 0 ) {
	  switch( $status ) {
	    case "cantcomplete":
	    case "notactive":
	      //inactive project, then set the uncompleted child tasks to inactive too
	      db_query( "UPDATE tasks SET status='".$status."' WHERE projectid=".$row["projectid"]." AND (status='active' OR status='created')" );
	      break;

	    case "new":
	    case "active":
	      //if reinstated project, set inactive child tasks to new
	      if($previous_status == "cantcomplete" || $previous_status == "notactive" )
                db_query( "UPDATE tasks SET status='created' WHERE projectid=".$row["projectid"]." AND parent<>0 AND status='".$previous_status."'" );
	      break;
          }
	}
	
        //you have already seen this item, no need to announce it to you
        db_query("INSERT INTO seen(userid, taskid, time)
                   VALUES(".$uid.",".$taskid.",current_timestamp(0) )");
	
	//transaction complete
	db_commit();

	//get name of project for emails
        $name_project = db_result(db_query("SELECT name FROM tasks WHERE id=".$row["projectid"] ), 0, 0 );

	//set project/task type for emails
	$type = $lang["task"];
	if( $row["parent"]== 0 )
	  $type = $lang["project"];

        //email owner ?
	if( isset($_POST["mailowner"]) && ($_POST["mailowner"]=="on") && ($owner != "") ) {

          //no point in mailing if there is no address
	  $email_address_owner = db_result( db_query("SELECT email FROM users WHERE id=".$owner, 0), 0, 0 );

          if( $email_address_owner != "" ) {
	    $message= sprintf( $email_edit_owner, $MANAGER_NAME, $type, date("F j, Y, H:i"), $name_project, $name,
	               status($status, $deadline), quotemeta($text), $BASE_URL );
	    email( $email_address_owner, sprintf($title_edit_owner, $type ), $message );
	  }
	}

        //email the user group ?
	if( isset($_POST["maillist"]) && ($_POST["maillist"]=="on") ) {

          if( $owner!="" ){
            $name_owner = db_result( db_query("SELECT fullname FROM users WHERE id=".$owner ), 0, 0 );
            }else $name_owner = "Nobody";

          $message = sprintf( $email_edit_group, $MANAGER_NAME,$type, $name_owner, date("F j, Y, H:i"), $name_project, $name,
	               status($status, $deadline), quotemeta($text), $BASE_URL );
          email( $EMAIL_MAILINGLIST, sprintf($title_edit_group, ucfirst($type ) ), $message );

          if( $usergroupid != 0 ) {
            $usergroup = "";
            $usersq = db_query("SELECT email, users.id as id FROM users, usergroups_users WHERE usergroupid=".$usergroupid." AND usergroups_users.userid=users.id");
            $s = "";
            for( $j=0 ; $userrow = @db_fetch_array($usersq, $j ) ; $j++) {
              $usergroup .= $s.$userrow["email"];
              $s = ", ";

            }
            email( $usergroup, sprintf($title_edit_group, ucfirst($type ) ), $message );
          }

	}

      }
      else
        warning($lang["task_submit"], $lang["missing_values"] );
      break;

    //default error
    default:
      error("Task submit", "Invalid request given");
      break;
  }

}
else
  error("Task submit", "No request given" );


//this is quite crappy but it works ;)
header("location: ".BASE."tasks.php?x=".$x."&action=show&taskid=".$taskid);

?>
