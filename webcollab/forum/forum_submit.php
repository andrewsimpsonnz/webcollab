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

  Forum specific database options

*/
require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php");

//
// Finds children messages recursively and puts them in an array
//
function find_and_report_children($postid ) {

  global $arrayindex, $ids;

  //query for children
  if( ! ($q = db_query("SELECT id FROM forum WHERE parent=$postid", 0) ) )
    return;
  if(db_numrows($q ) == 0 )
    return;

  //loop all children and put them in an array
  for($i=0; $row = @db_fetch_num($q, $i ); $i++) {
    $ids[$arrayindex] = $row[0];
    $arrayindex++;
    find_and_report_children($row[0] );
  }
  return;
}


//
// Perform delete of all forum messages in the thread below the selected message
//
function delete_messages($postid ) {

  global $arrayindex, $ids;

  //add the postid itself
  $ids[0] = $postid;

  //find all recursively linked children
  $arrayindex=1;
  find_and_report_children($postid );

  // perform the delete - delete from newest post first to oldest post last to prevent database referential errors
  for($i=0; $i < $arrayindex; $i++ ) {
    db_query("DELETE FROM forum WHERE id=".$ids[($arrayindex - 1) - $i] );
  }
  return;
}

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

if( ! isset($_REQUEST["action"]) )
  error("Forum submit", "No request given" );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_REQUEST["action"] ) {

    case "add":

      //if all values are filled in correctly we can submit the forum-item
      if( ! isset($_POST["text"] ) || strlen($_POST["text"] ) == 0 )
        warning($lang["forum_submit"], $lang["no_message"] );

      //check input has been provided
      $input_array = array("parentid", "taskid" );
      foreach($input_array as $var ) {
        if( ! isset($_POST[$var] ) || strlen($_POST[$var] ) == 0 ) {
          error("Forum submit", "Variable $var is not set" );
        }
      }

      $text = safe_data_long($_POST["text"] );
      //make email adresses and web links clickable
      $text = preg_replace("/(([a-z0-9\-\.]+)@([a-z0-9\-\.]+)\.([a-z0-9]+))/", "<a href=\"mailto:\\0\">\\0</a>", $text );
      $text = preg_replace("/((http|ftp)+(s)?:\/\/[^\s]+)/i", "\n<a href=\"$0\" target=\"new\">$0</a>\n", $text );
      $text = nl2br($text );


      $parentid    = check($_POST["parentid"]);
      $usergroupid = check($_POST["usergroupid"]);
      $taskid      = check($_POST["taskid"]);

      if($taskid == 0 )
        error("Forum submit", "Taskid not valid");

      if($_POST["mail_owner"] == "on")
        $mail_owner = true;
      else
        $mail_owner = "";

      if($_POST["mail_group"] == "on")
        $mail_group = true;
      else
        $mail_group = "";

      //do data consistency check on parentid
      if($parentid != 0 ) {
        if(db_result(db_query("SELECT COUNT(*) FROM forum WHERE id=$parentid" ), 0, 0 ) == 0 )
          error("Forum submit", "Data consistency error - child post has no parent" );
      }

      //check usergroup security
      require_once(BASE."includes/usergroup_security.php" );

      //okay now check if we need to post in the public or the private forums of the task
      switch($usergroupid ) {
        case 0:
          //public post
          db_begin();
          db_query ("INSERT INTO forum(parent, taskid, posted, text, userid, usergroupid)
                      VALUES ($parentid, $taskid, now(), '$text', $uid, 0)" );
          break;

        default:
          //private post
          //check if the user does belong to that group
          if(($admin!=1 ) && ( ! in_array($usergroupid, (array)$gid ) ) )
            error("Forum submit", "You do not have enough rights to post in that forum" );

          db_begin();
          db_query ("INSERT INTO forum(parent, taskid, posted, text, userid, usergroupid)
                      VALUES ($parentid, $taskid, now(), '$text', $uid, $usergroupid)" );
          break;

      }
      //set time of last forum post to this task
      db_query("UPDATE tasks SET lastforumpost=now() WHERE id=$taskid" );
      db_commit();

      //set up emails
      $mail_list = "";
      $s = "";

      //get task data
      $q = db_query("SELECT tasks.name AS name,
                            tasks.usergroupid AS usergroupid,
                            users.email AS email
                            FROM tasks
                            LEFT JOIN users ON (tasks.owner=users.id)
                            WHERE tasks.id=$taskid" );
      $task_row = db_fetch_array($q, 0 );

      //set owner's email
      if($task_row["email"] && $mail_owner ) {
        $mail_list .= $task_row["email"];
        $s = ", ";
      }

      //if usergroup set, add the user list
      if($task_row["usergroupid"] && $mail_group ){
        $q = db_query("SELECT users.email
                              FROM users
                              LEFT JOIN usergroups_users ON (usergroups_users.userid=users.id)
                              WHERE usergroups_users.usergroupid=".$task_row["usergroupid"].
                              " AND users.deleted='f'" );

        for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
          $mail_list .= $s.$row[0];
          $s = ", ";
        }
      }

      //do we need to email?
      if(strlen($mail_list) > 0 ){
        include_once(BASE."includes/email.php" );

        //get & add the mailing list
        if($EMAIL_MAILINGLIST != "" )
          $mail_list .= $s.$EMAIL_MAILINGLIST;

        switch($parentid ) {
          case 0:
            //this is a new post
            email($mail_list, $ABBR_MANAGER_NAME." New forum post: ".$task_row["name"], "New forum post by $uid_name:\n".$_POST["text"] );
            break;

          default:
            //this is a reply to an earlier post
            $q = db_query("SELECT forum.text AS text,
                           users.fullname AS username
                           FROM forum
                           LEFT JOIN users ON (forum.userid=users.id)
                           WHERE forum.id=$parentid" );

            $row = db_fetch_array($q, 0 );

            if($row["username"] == NULL )
              $row["username"] = "----";

            email($mail_list, $ABBR_MANAGER_NAME." Forum post reply: ".$task_row["name"], "Original post by ".$row["username"]." said:\n".$row["text"]."\n\nNew reply by $uid_name is:\n".$_POST["text"] );
            break;
        }
      }
      break;

    //owner of the thread can delete, admin can delete
    case "del":
      if(isset($_GET["postid"] ) ) {
        $postid = check($_GET["postid"] );
        if($postid == 0 )
          error("Forum submit", "Postid not valid" );
      }
      else
        error("Forum submit", "You did not specify a postid, request not handled" );

      switch($admin ) {
        case 1:
          //admin can delete all
          db_begin();
          delete_messages($postid );
          db_commit();
          break;

        case 0:
        default:
          //check if user is owner of the task or the owner of the post
          if(
          (db_result(db_query("SELECT COUNT(*) FROM forum LEFT JOIN tasks ON (forum.taskid=tasks.id) WHERE tasks.owner=$uid AND forum.id=$postid" ), 0, 0 ) == 1 ) ||
          (db_result(db_query("SELECT COUNT(*) FROM forum WHERE forum.userid=$uid AND forum.id=$postid" ), 0, 0 ) == 1 ) ) {

            db_begin();
            delete_messages( $postid );
            db_commit();
          }
          else
            error("Forum submit", "You are not authorised to delete that post." );
          break;
      }
      break;

    //default error case
    default:
      error("Forum submit", "Invalid request specified");
      break;
  }

//go back to where this request came from
header("Location: ".$BASE_URL."tasks.php?x=$x&action=show&taskid=".$_REQUEST["taskid"] );

?>
