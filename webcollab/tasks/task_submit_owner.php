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

require_once('path.php' );
require_once(BASE.'includes/security.php' );

include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/time.php' );
include_once(BASE.'lang/lang_email.php' );
include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'tasks/task_submit.php' );


//update or insert ?
if(empty($_REQUEST['action']) ){
  error('Task submit', 'No request given' );
}

if(empty($_GET['taskid']) || ! is_numeric($_GET['taskid']) ){
  error('Task submit', 'No taskid given' );
} 
$taskid = intval($_GET['taskid']);
  
//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_REQUEST['action'] ) {

    //mark it as completed!
    case 'done':

      //check if the user has enough rights
      if( ! user_access($taskid) ){
        error('Task submit', 'Access denied, you do not have enough rights to do that' );
      }
      db_query('UPDATE '.PRE.'tasks SET status=\'done\', finished_time=now(), edited=now() WHERE id='.$taskid );
        
      //if all tasks are completed, then mark the project as 'done'
      $projectid = db_result(db_query('SELECT projectid FROM '.PRE.'tasks WHERE id='.$taskid ), 0, 0 );
      
      //set completed percentage project record
      $percent_completed = percent_complete($projectid );
      db_query('UPDATE '.PRE.'tasks SET completed='.$percent_completed.' WHERE id='.$projectid );
      
      //for completed project set the completion time
      if($percent_completed == 100 ){
        $completion_time = db_result(db_query('SELECT MAX(finished_time) FROM '.PRE.'tasks WHERE projectid='.$projectid ), 0, 0 );
        db_query('UPDATE '.PRE.'tasks SET completion_time=\''.$completion_time.'\' WHERE id='.$projectid );
      }
  
      break;


    //drop ownership 
    case 'deown':

      //check if the user has enough rights
      if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id='.$taskid.' AND owner='.UID ), 0, 0 ) < 1 ) {
        warning($lang['task_submit'], $lang['not_owner'] );
      }

      //note: self-securing query
      db_query('UPDATE '.PRE.'tasks SET owner=0 WHERE owner='.UID.' AND id='.$taskid );
      break;


    //take owership of a task
    case 'meown':

      //admin has no bounds checking
      //non-admins can only take non-owned tasks
      //note: self-securing query
      if(! ADMIN ){
        db_query('UPDATE '.PRE.'tasks SET owner='.UID.' WHERE id='.$taskid.' AND owner=0' );
      }
      if(ADMIN ) {
        db_begin();
        //get the current owner and task details
        $q = db_query('SELECT '.PRE.'users.id AS id,
                              '.PRE.'tasks.projectid AS projectid,
                              '.PRE.'tasks.parent AS parent,
                              '.PRE.'tasks.name AS name,
                              '.PRE.'tasks.text AS text,
                              '.PRE.'tasks.status AS status,
                              '.PRE.'tasks.deadline AS deadline
                              FROM '.PRE.'tasks
                              LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.owner)
                              WHERE '.PRE.'tasks.id='.$taskid );

        $row = db_fetch_array($q, 0 );
        //do the action
        db_query('UPDATE '.PRE.'tasks SET owner='.UID.' WHERE id='.$taskid );
        
        db_commit();

        //if there was no previous owner do nothing!
        //there was a previous owner - inform the user that an admin has taken over his task
        if( ($row['id'] != 0 ) && (UID != $row['id'] ) ) {
          $q = db_query('SELECT email FROM '.PRE.'users WHERE users.id='.$row['id'], 0 );
          $email_address_old_owner = db_result( $q, 0, 0 );

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
              $name_project = db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$row['projectid'] ), 0, 0 );
              $name_task = $row['name'];
              break;
          }
          
          include_once(BASE.'includes/email.php' );

          //send email
          $message = $email .
                    sprintf($email_list, $name_project, $name_task, status($row['status'], $row['deadline']), UID_NAME, UID_EMAIL, $row['text'] );
          email( $email_address_old_owner, $title, $message );
        }
      }
      break;
}

header('Location: '.BASE_URL.'tasks.php?x='.$x.'&action=show&taskid='.$taskid );

?>