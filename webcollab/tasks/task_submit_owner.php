<?php
/*
  $Id: task_submit_owner.php 2170 2009-04-06 07:25:59Z andrewsimpson $

  (c) 2002 - 2011 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/time.php' );
include_once(BASE.'lang/lang_email.php' );
include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'tasks/task_submit.php' );


//update or insert ?
if(empty($_POST['action']) ){
  error('Task submit', 'No request given' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'tasks' );

if(! @safe_integer($_POST['taskid']) ){
  error('Task submit', 'No taskid given' );
}
$taskid = $_POST['taskid'];

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_POST['action'] ) {

    //mark it as completed!
    case 'done':

      //check if the user has enough rights
      if( ! user_access($taskid) ){
        error('Task submit', 'Access denied, you do not have enough rights to do that' );
      }
      $q = db_prepare('UPDATE '.PRE.'tasks SET status=\'done\', finished_time=now(), edited=now(), sequence=sequence+1 WHERE id=?' );
      db_execute($q, array($taskid ) );

      //if all tasks are completed, then mark the project as 'done'
      $q = db_prepare('SELECT projectid FROM '.PRE.'tasks WHERE id=?' );
      db_execute($q, array($taskid ) );
      $projectid = db_result($q, 0, 0 );

      //adjust completion status in project
      adjust_completion($projectid );

      break;


    //drop ownership
    case 'deown':

      //check if the user has enough rights
      $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id=? AND owner=? LIMIT 1' );
      db_execute($q, array($taskid, UID ) );

      if(db_result($q, 0, 0 ) < 1 ) {
        warning($lang['task_submit'], $lang['not_owner'] );
      }

      //note: self-securing query
      $q = db_prepare('UPDATE '.PRE.'tasks SET owner=0,sequence=sequence+1 WHERE owner=? AND id=?' );
      db_execute($q, array(UID, $taskid ) );
      break;


    //take owership of a task
    case 'meown':

      //admin has no bounds checking
      //non-admins can only take non-owned tasks
      //note: self-securing query
      if(! ADMIN ){
        $q = db_prepare('UPDATE '.PRE.'tasks SET owner=?, sequence=sequence+1 WHERE id=? AND owner=0' );
        db_execute($q, array(UID, $taskid ) );
      }
      if(ADMIN ) {
        db_begin();
        //get the current owner and task details
        $q = db_prepare('SELECT '.PRE.'users.id AS id,
                              '.PRE.'tasks.projectid AS projectid,
                              '.PRE.'tasks.parent AS parent,
                              '.PRE.'tasks.name AS name,
                              '.PRE.'tasks.text AS text,
                              '.PRE.'tasks.status AS status,
                              '.PRE.'tasks.deadline AS deadline
                              FROM '.PRE.'tasks
                              LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.owner)
                              WHERE '.PRE.'tasks.id=?' );
        db_execute($q, array($taskid ) );

        $row = db_fetch_array($q, 0 );
        //do the action
        $q = db_prepare('UPDATE '.PRE.'tasks SET owner=? WHERE id=?' );
        db_execute($q, array(UID, $taskid ) );

        db_commit();

        //if there was no previous owner do nothing!
        //there was a previous owner - inform the user that an admin has taken over his task
        if( ($row['id'] != 0 ) && (UID != $row['id'] ) ) {
          $q = db_prepare('SELECT email FROM '.PRE.'users WHERE id=?', 0 );
          db_execute($q, array($row['id'] ) );
          $email_address_old_owner = db_result($q, 0, 0 );

          switch($row['parent'] ) {
            case 0:
              $email = $email_takeover_project;
              $title = $title_takeover_project;
              $name_project = $row['name'];
              $name_task = '';
              break;

            default:
              $email = $email_takeover_task;
              $title = $title_takeover_task;
              $q = db_prepare('SELECT name FROM '.PRE.'tasks WHERE id=?' );
              db_execute($q, array($row['projectid'] ) );
              $name_project = db_result($q, 0, 0 );
              $name_task = $row['name'];
              break;
          }

          include_once(BASE.'includes/email.php' );

          //send email
          $message = $email .
                    sprintf($email_list, $name_project, $name_task, status($row['status'], $row['deadline'] ), UID_NAME, UID_EMAIL, $row['text'], 'index.php?taskid='.$taskid );
          email( $email_address_old_owner, $title, $message );
        }
      }
      break;
}

header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$taskid );

?>