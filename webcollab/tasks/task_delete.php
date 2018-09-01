<?php
/*
  $Id: task_delete.php 2170 2009-04-06 07:25:59Z andrewsimpson $

  (c) 2002 - 2013 Andrew Simpson <andrewnz.simpson at gmail.com>

  WebCollab
  ---------------------------------------

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

  Deletes a task

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'tasks/task_common.php' );

//
// Function for listing all tasks of an id tree
//
function find_tasks( $taskid, $projectid ) {

  global $task_array, $parent_array, $match_array, $index, $task_count;

  $task_array   = array();
  $parent_array = array();
  $match_array  = array();
  $task_count = 0;
  $index = 0;

  $q = db_prepare('SELECT id, parent FROM '.PRE.'tasks WHERE projectid=?' );
  db_execute($q, array($projectid ) );

  for($i = 0; $row = @db_fetch_array($q, $i ); ++$i) {

    //put values into array
    $task_array[$i]['id'] = $row['id'];
    $task_array[$i]['parent'] = $row['parent'];
    ++$task_count;

    //if this is a subtask, store the parent id
    if($row['parent'] != 0 ) {
      $parent_array[($row['parent'])] = $row['parent'];
    }
  }

  //record first match
  $match_array[$index] = $taskid;
  ++$index;

  //if selected task has children (subtasks), iterate recursively to find them
  if(isset($parent_array[($taskid)] ) ) {
    find_children($taskid);
  }

  return;
}

//
// List subtasks (recursive function)
//
function find_children($parent ) {

  global $task_array, $parent_array, $match_array, $index, $task_count;

  for($i=0 ; $i < $task_count ; ++$i ) {

    if($task_array[$i]['parent'] != $parent ) {
      continue;
    }
    $match_array[$index] = $task_array[$i]['id'];
    ++$index;

    //if this post has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      find_children($task_array[$i]['id'] );
    }
  }
  return;
}

//
// MAIN PROGRAM
//

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'tasks' );

//check for valid taskid
if(! @safe_integer($_POST['taskid']) ) {
  error('Task details', 'The taskid input is not valid' );
}
$taskid = $_POST['taskid'];

//get task and owner information
$q = db_prepare('SELECT '.PRE.'tasks.parent AS parent,
                      '.PRE.'tasks.task_name AS task_name,
                      '.PRE.'tasks.task_text AS task_text,
                      '.PRE.'tasks.task_owner AS task_owner,
                      '.PRE.'tasks.task_status AS task_status,
                      '.PRE.'tasks.projectid AS projectid,
                      '.PRE.'tasks.archive AS archive,
                      '.PRE.'users.id AS id,
                      '.PRE.'users.email AS email
                      FROM '.PRE.'tasks
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.task_owner)
                      WHERE '.PRE.'tasks.id=?' );

db_execute($q, array($taskid ) );

//get the data
if( ! $row = db_fetch_array($q, 0) ){
  error('Task delete', 'The selected task does not exist.');
}
//can this user delete this task ?
if( (! ADMIN ) && (UID != $row['task_owner']) ){
  error('Access denied', 'You do not own this task and therefore you may not delete it.' );
}
//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//begin transaction
db_begin();

//find all recursively linked children
find_tasks( $taskid, $row['projectid'] );

/* delete:
- all forum posts linked to it
- the entry in the seen table
- the item itself
- files
*/

$q1 = db_prepare('DELETE FROM '.PRE.'contacts WHERE taskid=?' );
$q2 = db_prepare('DELETE FROM '.PRE.'seen WHERE taskid=?' );
$q3 = db_prepare('DELETE FROM '.PRE.'forum WHERE taskid=?' );
$q4 = db_prepare('SELECT fileid, filename FROM '.PRE.'files WHERE taskid=?' );
$q5 = db_prepare('DELETE FROM '.PRE.'files WHERE taskid=?' );
$q6 = db_prepare('DELETE FROM '.PRE.'tasks WHERE id=?' );

for($i=0 ; $i < $index ; ++$i ) {

  //avoid type cast errors
  $delete_id = $match_array[$i];

  //delete contacts
  db_execute($q1, array($delete_id ) );

  //delete all from seen table
  db_execute($q2, array($delete_id ) );

  //delete forum posts
  db_execute($q3, array($delete_id ) );

  //delete all files physically
  db_execute($q4, array($delete_id ) );

  for($j=0 ; $file_row = @db_fetch_array($q4, $j ) ; ++$j ) {
  
    //delete file from disk (current for version 3.40)
    if(file_exists(FILE_BASE.'/'.$row['fileid'].'__'.$row['hashid'] ) ) {
      @unlink(FILE_BASE.'/'.$row['fileid'].'__'.$row['hashid'] );
    }
    
    // filename UTF-8 (introduced version 3.30)
    if(file_exists(FILE_BASE.'/'.$file_row['fileid'].'__'.$file_row['filename'] ) ) {
      @unlink(FILE_BASE.'/'.$file_row['fileid'].'__'.$file_row['filename'] );
    }
 
    // filename with other character set (obsolete - prior to version 3.30)
    if(defined('FILENAME_CHAR_SET' ) && file_exists( FILE_BASE.'/'.$file_row['fileid'].'__'.mb_convert_encoding($file_row['filename'], FILENAME_CHAR_SET ) ) ) {
      @unlink(FILE_BASE.'/'.$file_row['fileid'].'__'.mb_convert_encoding($file_row['filename'] ) );
    }
  }  
  
  //delete all files attached to it in the database
  db_execute($q5, array($delete_id ) );

  //delete item
  db_execute($q6, array($delete_id ) );
}

if($row['parent'] != 0 ){

  //set the new completed percentage project record
  $percent_completed = round(percent_complete($row['projectid'] ) );
  $q = db_prepare('UPDATE '.PRE.'tasks SET completed=? WHERE id=?' );
  db_execute($q, array((int)$percent_completed, $row['projectid'] ) );

  //for completed project set the completion time
  if($percent_completed == 100 ){
    $q = db_prepare('SELECT MAX(finished_time) FROM '.PRE.'tasks WHERE projectid=?' );
    db_execute($q, array($row['projectid'] ) );
    $completion_time = db_result($q, 0, 0 );
    $q = db_prepare('UPDATE '.PRE.'tasks SET completion_time=? WHERE id=?' );
    db_execute($q, array($completion_time, $row['projectid'] ) );
  }
}

//transaction complete
db_commit();

//inform the user that his task has been deleted by an admin
if(($row['task_owner'] != 0 ) && (UID != $row['task_owner']) ) {

  include_once(BASE.'includes/email.php' );
  include_once(BASE.'includes/time.php' );
  include_once(BASE.'lang/lang_email.php' );

  switch ($row['parent']) {
    case 0:
      $name_project = $row['task_name'];
      $name_task = '';
      $title = $title_delete_project;
      $email = $email_delete_project;
      break;

    default:
      $q = db_prepare('SELECT task_name FROM '.PRE.'tasks WHERE id=?' );
      db_execute($q, array($row['projectid'] ) );
      $name_project = db_result($q, 0, 0 );
      $name_task = $row['task_name'];
      $title = $title_delete_task;
      $email = $email_delete_task;
      break;
  }

  switch($row['task_status'] ) {
    case 'created':
      $status = $task_state['new'];
      break;

    case 'notactive':
      $status = $task_state['planned'];
      break;

    case 'active':
      $status = $task_state['active'];
      break;

    case 'cantcomplete':
      $status = $task_state['cantcomplete'];
      break;

    case 'done':
      $status = $task_state['done'];
      break;

    default:
      $status = '';
      break;
  }
  $message = $email . sprintf($delete_list, $name_project, $name_task, $status, $row['task_text'] );
  email($row['email'], $title, $message );
}

//return to appropriate location
if($row['archive'] == 1 ){
  header('Location: '.BASE_URL.'archive.php?x='.X.'&action=list' );
  die;
}

if($row['parent'] == 0 ) {
  header('Location: '.BASE_URL.'main.php?x='.X );
  die;
}
else{
  header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$row['parent'] );
  die;
}

?>
