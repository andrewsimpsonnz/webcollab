<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on original file written for Core APM by Dennis Fleurbaaij 2001/2002

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
  if( ! ($q = db_query("SELECT id FROM ".PRE."forum WHERE parent=$postid", 0) ) )
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
    db_query("DELETE FROM ".PRE."forum WHERE id=".$ids[($arrayindex - 1) - $i] );
  }
  return;
}

if( ! isset($_REQUEST["action"]) )
  error("Forum submit", "No request given" );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_REQUEST["action"] ) {

    case "submit_add":

      //if all values are filled in correctly we can submit the forum-item
      if(empty($_POST["text"] ) )
        warning($lang["forum_submit"], $lang["no_message"] );
             
      $input_array = array("parentid", "taskid", "usergroupid");
      foreach($input_array as $var ) {   
        if(! isset($_POST[$var]) || ! is_numeric($_POST[$var]) )
          error("Forum submit", "Variable $var is not set" );
        ${$var} = intval($_POST[$var]);
      }
      
      $text = safe_data_long($_POST["text"] );
      //make email adresses and web links clickable
      $text = preg_replace("/(([a-z0-9\-\.]+)@([a-z0-9\-\.]+)\.([a-z0-9]+))/", "<a href=\"mailto:\\0\">\\0</a>", $text );
      $text = preg_replace("/((http|ftp)+(s)?:\/\/[^\s]+)/i", "\n<a href=\"$0\" target=\"new\">$0</a>\n", $text );
      $text = nl2br($text );

      if(isset($_POST["mail_owner"] ) && ($_POST["mail_owner"] == "on" ) )
        $mail_owner = true;
      else
        $mail_owner = "";

      if(isset($_POST["mail_group"] ) && ($_POST["mail_group"] == "on" ) )
        $mail_group = true;
      else
        $mail_group = "";

      //do data consistency check on parentid
      if($parentid != 0 ) {
        if(db_result(db_query("SELECT COUNT(*) FROM ".PRE."forum WHERE id=$parentid" ), 0, 0 ) == 0 )
          error("Forum submit", "Data consistency error - child post has no parent" );
      }

      //check usergroup security
      require_once(BASE."includes/usergroup_security.php" );

      //okay now check if we need to post in the public or the private forums of the task
      switch($usergroupid ) {
        case 0:
          //public post
          db_begin();
          db_query ("INSERT INTO ".PRE."forum(parent, taskid, posted, text, userid, usergroupid)
                                           VALUES ($parentid, $taskid, now(), '$text', $uid, 0)" );
          break;

        default:
          //private post
          //check if the user does belong to that group
          if(($admin!=1 ) && ( ! in_array($usergroupid, (array)$gid ) ) )
            error("Forum submit", "You do not have enough rights to post in that forum" );

          db_begin();
          db_query ("INSERT INTO ".PRE."forum(parent, taskid, posted, text, userid, usergroupid)
                                            VALUES ($parentid, $taskid, now(), '$text', $uid, $usergroupid)" );
          break;

      }
      //set time of last forum post to this task
      db_query("UPDATE ".PRE."tasks SET lastforumpost=now() WHERE id=$taskid" );
      db_commit();

      //set up emails
      $mail_list = "";
      $s = "";

      //get task data
      $q = db_query("SELECT ".PRE."tasks.name AS name,
                            ".PRE."tasks.usergroupid AS usergroupid,
                            ".PRE."users.email AS email
                            FROM ".PRE."tasks
                            LEFT JOIN ".PRE."users ON (".PRE."tasks.owner=".PRE."users.id)
                            WHERE ".PRE."tasks.id=$taskid" );
      $task_row = db_fetch_array($q, 0 );

      //set owner's email
      if($task_row["email"] && $mail_owner ) {
        $mail_list .= $task_row["email"];
        $s = ", ";
      }

      //if usergroup set, add the user list
      if($task_row["usergroupid"] && $mail_group ){
        $q = db_query("SELECT ".PRE."users.email
                              FROM ".PRE."users
                              LEFT JOIN ".PRE."usergroups_users ON (".PRE."usergroups_users.userid=".PRE."users.id)
                              WHERE ".PRE."usergroups_users.usergroupid=".$task_row["usergroupid"].
                              " AND ".PRE."users.deleted='f'" );

        for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
          $mail_list .= $s.$row[0];
          $s = ", ";
        }
      }

      //do we need to email?
      if(strlen($mail_list) > 0 ){
        include_once(BASE."includes/email.php" );
        include_once(BASE."lang/lang_email.php" );

      $message = $_POST["text"];
        
      //get rid of magic_quotes - it is not required here
      if(get_magic_quotes_gpc() )
        $message = stripslashes($message );  
        
        //get & add the mailing list
        if($EMAIL_MAILINGLIST != "" )
          $mail_list .= $s.$EMAIL_MAILINGLIST;

        switch($parentid ) {
          case 0:
            //this is a new post
            email($mail_list, sprintf($title_forum_post, $task_row["name"]), sprintf($email_forum_post, $uid_name, $message) );
            break;

          default:
            //this is a reply to an earlier post
            $q = db_query("SELECT ".PRE."forum.text AS text,
                           ".PRE."users.fullname AS username
                           FROM ".PRE."forum
                           LEFT JOIN ".PRE."users ON (".PRE."forum.userid=".PRE."users.id)
                           WHERE ".PRE."forum.id=$parentid" );

            $row = db_fetch_array($q, 0 );

            if($row["username"] == NULL )
              $row["username"] = "----";
              
            //remove any HTML linebreaks that nl2br() has put into the text...
            $original_message =  str_replace("<br />", "", $row["text"] );

            email($mail_list, sprintf($title_forum_post, $task_row["name"]), sprintf($email_forum_reply, $uid_name, $row["username"], $original_message, $message ) );
            break;
        }
      }
      break;

    //owner of the thread can delete, admin can delete
    case "submit_del":
      if(empty($_GET["postid"]) || ! is_numeric($_GET["postid"]) )
        error("Forum submit", "Postid not valid" );
      $postid = intval($_GET["postid"] );

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
          (db_result(db_query("SELECT COUNT(*) FROM ".PRE."forum LEFT JOIN ".PRE."tasks ON (".PRE."forum.taskid=".PRE."tasks.id) WHERE ".PRE."tasks.owner=$uid AND ".PRE."forum.id=$postid" ), 0, 0 ) == 1 ) ||
          (db_result(db_query("SELECT COUNT(*) FROM ".PRE."forum WHERE userid=$uid AND id=$postid" ), 0, 0 ) == 1 ) ) {

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
