<?php
/*
  $Id$

  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
  WebCollab
  ---------------------------------------
  
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002

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
require_once("path.php" );
require_once( BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );
include_once(BASE."tasks/task_common.php" );

//
// Function for listing all tasks of an id tree
//
function find_tasks( $taskid, $projectid ) {

  global $task_array, $parent_array, $match_array, $index;

  $parent_array = "";
  $index = 0; 
  $j = 0;
    
  $q = db_query("SELECT id, parent FROM ".PRE."tasks WHERE projectid=$projectid" );

  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

    //put values into array
    $task_array[$i]['id'] = $row['id'];
    $task_array[$i]['parent'] = $row['parent'];
  
    //if this is a subpost, store the parent id 
    if($row['parent'] != 0 ) {
      $parent_array[$j] = $row['parent'];
      $j++;
    }
  }
    
  //record first match
  $match_array[$index] = $taskid;
  $index++;
  
  if(sizeof($parent_array) > 10 )
    $parent_array = array_unique($parent_array);
  
  //if selected task has children (subtasks), iterate recursively to find them 
  if(in_array($taskid, (array)$parent_array ) ){
    find_children($taskid);
  }
  
  return;
}

//
// List subtasks (recursive function)
//
function find_children($parent ) {

  global $task_array, $parent_array, $match_array, $index;

  $max = sizeof($task_array);
       
  for($i=0 ; $i < $max ; $i++ ) {
  
    if($task_array[$i]['parent'] != $parent ){
      continue;
    }
    $match_array[$index] = $task_array[$i]['id'];
    $index++;
    
    //if this post has children (subtasks), iterate recursively to find them
    if(in_array($task_array[$i]['id'], $parent_array ) ){
      find_children($task_array[$i]['id'] );
    }
  }
  return;
}      

//
// advanced database-wide task-delete !!
//
if(empty($_REQUEST['taskid']) || ! is_numeric($_REQUEST['taskid']) )
  error("Task details", "The taskid input is not valid" ); 

$taskid = intval($_REQUEST['taskid']);

//get task and owner information
$q = db_query("SELECT ".PRE."tasks.parent AS parent,            
                      ".PRE."tasks.name AS name,
                      ".PRE."tasks.text AS text,
                      ".PRE."tasks.owner AS owner,
                      ".PRE."tasks.status AS status,
                      ".PRE."tasks.projectid AS projectid,
                      ".PRE."tasks.archive AS archive,
                      ".PRE."users.id AS id,
                      ".PRE."users.email AS email
                      FROM ".PRE."tasks
                      LEFT JOIN ".PRE."users ON (".PRE."users.id=".PRE."tasks.owner)
                      WHERE ".PRE."tasks.id=$taskid" );

//get the data
if( ! $row = db_fetch_array($q, 0) )
  error("Task delete", "The selected task does not exist.");

//can this user delete this task ?
if( ($ADMIN != 1) && ($UID != $row['owner']) )
  error("Access denied", "You do not own this task and therefore you may not delete it." );

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

for($i=0 ; $i < $index ; $i++ ) {

  //delete all from seen table
  db_query("DELETE FROM ".PRE."seen WHERE taskid=".$match_array[$i] );

  //delete forum posts
  db_query("DELETE FROM ".PRE."forum WHERE taskid=".$match_array[$i] );

  //delete all files physically
  $fq = db_query("SELECT oid, filename FROM ".PRE."files WHERE taskid=".$match_array[$i] );
  for($j=0 ; $frow = @db_fetch_array($fq, $j ) ; $j++) {

    if(file_exists(FILE_BASE."/".$row['oid']."__".$row['filename'] ) ) {
      unlink( FILE_BASE."/".$row['oid']."__".$row['filename'] );
    }
  }

  //delete all files attached to it in the database
  db_query("DELETE FROM ".PRE."files WHERE taskid=".$match_array[$i] );

  //delete item
  db_query("DELETE FROM ".PRE."tasks WHERE id=".$match_array[$i] );

}

if($row['parent'] != 0 ){    
  //set the new completed percentage project record
  $percent_completed = round(percent_complete($row['projectid'] ) );
  db_query("UPDATE ".PRE."tasks SET completed=".$percent_completed." WHERE id=".$row['projectid'] );
  
  //for completed project set the completion time
  if($percent_completed == 100 ){
    $completion_time = db_result(db_query("SELECT MAX(finished_time) FROM ".PRE."tasks WHERE projectid=".$row['projectid'] ), 0, 0 );
    db_query("UPDATE ".PRE."tasks SET completion_time='".$completion_time."' WHERE id=".$row['projectid'] );
  }
}

//transaction complete
db_commit();

//inform the user that his task has been deleted by an admin
if(($row['owner'] != 0 ) && ($UID != $row['owner']) ) {
  
  include_once(BASE."includes/email.php" );
  include_once(BASE."includes/time.php" );
  include_once(BASE."lang/lang_email.php" );
  
  switch ($row['parent']) {
    case 0:
      $name_project = $row['name'];
      $name_task = "";
      $title = $title_delete_project;
      $email = $email_delete_project;
      break;
      
    default:
      $name_project = db_result(db_query("SELECT name FROM ".PRE."tasks WHERE id=".$row['projectid'] ), 0, 0 );
      $name_task = $row['name'];
      $title = $title_delete_task;
      $email = $email_delete_task;
      break;
  }
  
  switch($row['status'] ) {
    case "created":
      $status = $task_state['new'];
      break;

    case "notactive":
      $status = $task_state['planned'];
      break;

    case "active":
      $status = $task_state['active'];
      break;

    case "cantcomplete":
      $status = $task_state['cantcomplete'];
      break;

    case "done":
      $status = $task_state['done'];
      break;

    default:
      $status = "";
      break;
  }
  $message = $email . sprintf($delete_list, $name_project, $name_task, $status, $row['text'] );
  email($row['email'], $title, $message );
}

//return to appropriate location
if($row['archive'] == 1 ){
  header("Location: ".BASE_URL."archive.php?x=$x&action=list" );
  die;
}

if($row['parent'] == 0 ) {
  header("Location: ".BASE_URL."main.php?x=$x" );
  die;
}
else{
  header("Location: ".BASE_URL."tasks.php?x=$x&action=show&taskid=".$row['parent'] );
  die;
}

?>