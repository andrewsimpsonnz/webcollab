<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/admin_config.php');
require_once(BASE.'includes/usergroup_security.php' );

//
// Function for listing all posts of a task
//
function find_posts( $postid ) {

  global $post_array, $parent_array, $match_array, $index, $post_count;
  
  $post_array   = array();
  $parent_array = array();
  $match_array  = array();
  $parent_count = 0;
  $post_count   = 0;
  $index = 0; 
  
  $taskid = db_result(db_query('SELECT taskid FROM '.PRE.'forum WHERE id='.$postid ), 0, 0 );

  $q = db_query('SELECT id, parent FROM '.PRE.'forum WHERE taskid='.$taskid );

  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

    //put values into array
    $post_array[$i]['id'] = $row['id'];
    $post_array[$i]['parent'] = $row['parent'];
    ++$post_count;
  
    //if this is a subpost, store the parent id 
    if($row['parent'] != 0 ) {
      $parent_array[$parent_count] = $row['parent'];
      ++$parent_count;
    }
  }
  
  //record first match
  $match_array[$index] = $postid;
  ++$index;
  
  //if selected post has children (subposts), iterate recursively to find them 
  if(in_array($postid, (array)$parent_array ) ){
    find_children($postid);
  }
  
  return;
}

//
// List subposts (recursive function)
//
function find_children($parent ) {

  global $post_array, $parent_array, $match_array, $index, $post_count;
  
  for($i=0 ; $i < $post_count ; ++$i ) {
    
    if($post_array[$i]['parent'] != $parent ){
      continue;
    }
    $match_array[$index] = $post_array[$i]['id'];
    ++$index;
    
    //if this post has children (subposts), iterate recursively to find them
    if(in_array($post_array[$i]['id'], (array)$parent_array ) ){
      find_children($post_array[$i]['id'] );
    }
  }
  return;
}      

//
// Perform delete of all forum messages in the thread below the selected message
//
function delete_messages($postid ) {

  global $match_array, $index;

  find_posts($postid );
    
  // perform the delete - delete from newest post first to oldest post last to prevent database referential errors
  for($i=0; $i < $index; ++$i ) {
    db_query('DELETE FROM '.PRE.'forum WHERE id='.$match_array[($index - 1) - $i] );
    
  }
  return;
}

if( ! isset($_REQUEST['action']) ){
  error('Forum submit', 'No request given' );
}

//secure variables
$mail_list = array();

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_REQUEST['action'] ) {

    case 'submit_add':

      //if all values are filled in correctly we can submit the forum-item
      if(empty($_POST['text'] ) ) {
        warning($lang['forum_submit'], $lang['no_message'] );
      }       
      $input_array = array('parentid', 'taskid', 'usergroupid');
      foreach($input_array as $var ) {   
        if(! isset($_POST[$var]) || ! is_numeric($_POST[$var]) ){
          error('Forum submit', "Variable $var is not set" );
        }
        ${$var} = intval($_POST[$var]);
      }
      
      $text = safe_data_long($_POST['text'] );
      
      //make email adresses and web links clickable
      $text = html_links($text, 1 );

      if(isset($_POST['mail_owner'] ) && ($_POST['mail_owner'] === 'on' ) ) {
        $mail_owner = true;
      }
      else {
        $mail_owner = '';
      }

      if(isset($_POST['mail_group'] ) && ($_POST['mail_group'] === 'on' ) ) {
        $mail_group = true;
      }
      else {
        $mail_group = '';
      }

      //do data consistency check on parentid
      if($parentid != 0 ) {
        if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'forum WHERE id='.$parentid ), 0, 0 ) == 0 ){
          error('Forum submit', 'Data consistency error - child post has no parent' );
        }
      }

      //check usergroup security
      $taskid = usergroup_check($taskid );
       
      //okay now check if we need to post in the public or the private forums of the task
      switch($usergroupid ) {
        case 0:
          //public post
          db_begin();
          db_query ('INSERT INTO '.PRE.'forum(parent, taskid, posted, text, userid, usergroupid)
                                           VALUES ('.$parentid.', '.$taskid.', now(), \''.$text.'\', '.UID.', 0)' );
          break;

        default:
          //private post
          //check if the user does belong to that group
          if((! ADMIN ) && ( ! in_array($usergroupid, (array)$GID ) ) ) {
            error('Forum submit', 'You do not have enough rights to post in that forum' );
          }
          
          db_begin();
          db_query ('INSERT INTO '.PRE.'forum(parent, taskid, posted, text, userid, usergroupid)
                                            VALUES ('.$parentid.', '.$taskid.', now(), \''.$text.'\', '.UID.', '.$usergroupid.')' );
          break;

      }
      //set time of last forum post to this task
      db_query('UPDATE '.PRE.'tasks SET lastforumpost=now() WHERE id='.$taskid );
      db_commit();
      
      //get task data
      $q = db_query('SELECT '.PRE.'tasks.name AS name,
                            '.PRE.'tasks.usergroupid AS usergroupid,
                            '.PRE.'users.email AS email
                            FROM '.PRE.'tasks
                            LEFT JOIN '.PRE.'users ON ('.PRE.'tasks.owner='.PRE.'users.id)
                            WHERE '.PRE.'tasks.id='.$taskid );
      $task_row = db_fetch_array($q, 0 );

      //set owner's email
      if($task_row['email'] && $mail_owner ) {
        $mail_list[] = $task_row['email'];
      }

      //if usergroup set, add the user list
      if($task_row['usergroupid'] && $mail_group ){
        $q = db_query('SELECT '.PRE.'users.email
                              FROM '.PRE.'users
                              LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                              WHERE '.PRE.'usergroups_users.usergroupid='.$task_row['usergroupid'].
                              ' AND '.PRE.'users.deleted=\'f\'' );

        for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
          $mail_list[] = $row[0];
        }
      }

      //do we need to email?
      if(sizeof($mail_list) > 0 ){
        include_once(BASE.'includes/email.php' );
        include_once(BASE.'lang/lang_email.php' );

        $message_unclean = $_POST['text'];
          
        //get rid of magic_quotes - it is not required here
        if(get_magic_quotes_gpc() ){
          $message_unclean = stripslashes($message_unclean );  
        }  
        //get & add the mailing list
        if(sizeof($EMAIL_MAILINGLIST ) > 0 ){
          $mail_list = array_merge((array)$mail_list, (array)$EMAIL_MAILINGLIST );
        }
        
        switch($parentid ) {
          case 0:
            //this is a new post
            email($mail_list, sprintf($title_forum_post, $task_row['name']), sprintf($email_forum_post, UID_NAME, $message_unclean) );
            break;

          default:
            //this is a reply to an earlier post
            $q = db_query('SELECT '.PRE.'forum.text AS text,
                          '.PRE.'users.fullname AS username
                          FROM '.PRE.'forum
                          LEFT JOIN '.PRE.'users ON ('.PRE.'forum.userid='.PRE.'users.id)
                          WHERE '.PRE.'forum.id='.$parentid );

            $row = db_fetch_array($q, 0 );

            if($row['username'] == NULL ){
              $row['username'] = "----";
            }
              
            email($mail_list, sprintf($title_forum_post, $task_row['name']), sprintf($email_forum_reply, UID_NAME, $row['username'], $original_message, $message_unclean ) );
            break;
        }
      }
      break;

    //owner of the thread can delete, admin can delete
    case 'submit_del':
      if(empty($_GET['postid']) || ! is_numeric($_GET['postid']) ) {
        error('Forum submit', 'Postid not valid' );
      }
      $postid = intval($_GET['postid'] );

      switch(ADMIN ) {
        
        case 1:
        case true:
          //admin can delete all
          db_begin();
          delete_messages($postid );
          db_commit();
          break;

        case 0:
        case false:
        default:
          //check if user is owner of the task or the owner of the post
          if(
          (db_result(db_query('SELECT COUNT(*) FROM '.PRE.'forum LEFT JOIN '.PRE.'tasks ON ('.PRE.'forum.taskid='.PRE.'tasks.id) WHERE '.PRE.'tasks.owner='.UID.' AND '.PRE.'forum.id='.$postid ), 0, 0 ) == 1 ) ||
          (db_result(db_query('SELECT COUNT(*) FROM '.PRE.'forum WHERE userid='.UID.' AND id='.$postid ), 0, 0 ) == 1 ) ) {

            db_begin();
            delete_messages( $postid );
            db_commit();
          }
          else
            error('Forum submit', 'You are not authorised to delete that post.' );
          break;
      }
      break;

    //default error case
    default:
      error('Forum submit', 'Invalid request specified');
      break;
  }

//go back to where this request came from
header('Location: '.BASE_URL.'tasks.php?x='.$x.'&action=show&taskid='.$_REQUEST['taskid'] );

?>
