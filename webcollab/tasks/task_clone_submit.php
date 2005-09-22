<?php
/*
  $Id$

  (c) 2004 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
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

  Clone a project in the database

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'tasks/task_common.php' );

//admins only
if(! ADMIN ) {
  error('Unauthorised access', 'This function is for admins only' );
}
  
//
// Recursive function to create new project structure
//

function add($taskid, $new_parent, $new_name ) {

  global $parent_array;

  if($new_parent != 0 ) {
    //now cloning a child task
    $q = db_query('SELECT id FROM '.PRE.'tasks WHERE parent='.$taskid );

    //clone all the tasks at this level
    for( $i=0; $row = @db_fetch_array($q, $i ); ++$i ) {
      $new_taskid = copy_across($row['id'], $new_parent, NULL );

      //recursive function if the subtask is listed in parent_array (it has children then)
      if(in_array($row['id'], (array)$parent_array ) ) {
        add($row['id'], $new_taskid, NULL );
      }
    }
  }
  else{
    //now cloning the topmost task (project)
    $new_taskid = copy_across($taskid, 0, $new_name );

    //recursive function if the subtask is listed in parent_array (it has children then)
    if(in_array($taskid, (array)$parent_array ) ) {
      add($taskid, $new_taskid, NULL );
    }
  }

  return $new_taskid;
}


//
// function to copy across data to new project/task
//

function copy_across($taskid, $new_parent, $name ) {

    //get task details
    $q = db_query('SELECT * FROM '.PRE.'tasks WHERE id='.$taskid );
    $row = db_fetch_array($q, 0 );

    //set values
    if($new_parent != 0 ) {
      //new task
      $new_projectid = db_result(db_query('SELECT projectid FROM '.PRE.'tasks WHERE id='.$new_parent ), 0, 0 );
      $new_name = db_escape_string($row['name'] );
    }
    else{
      //new project (adjust projectid later)
      $new_projectid = 0;
      $new_name = $name;
    }

    //insert data
    $q = db_query("INSERT INTO ".PRE."tasks(name,
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
                    values('$new_name',
                    '".db_escape_string($row['text'])."',
                    now(),
                    now(),
                    now(),
                    now(),
                    ".$row['owner'].",
                    ".UID.",
                    '".$row['deadline']."',
                    now(),
                    ".$row['priority'].",
                    $new_parent,
                    $new_projectid,
                    ".$row['taskgroupid'].",
                    ".$row['usergroupid'].",
                    '".$row['globalaccess']."',
                    '".$row['groupaccess']."',
                    '".db_escape_string($row['status'])."')" );

    // get taskid for the new task/project
    $new_taskid = db_lastoid('tasks_id_seq' );

    //for a new project set the projectid variable reset correctly
    if($new_parent == 0 ) {
      db_query('UPDATE '.PRE.'tasks SET projectid='.$new_taskid.' WHERE id='.$new_taskid );
    }
    
    //you have already seen this item, no need to announce it to you
    db_query('INSERT INTO '.PRE.'seen(userid, taskid, time) VALUES('.UID.', '.$new_taskid.', now() )');

  return $new_taskid;
}


//
// Main program
//

//secure variables
$parent_array = array();

if(! @safe_integer($_POST['taskid']) ) {
  error('Project clone', 'Not a valid value for taskid');
}

$taskid = $_POST['taskid'];

if(empty($_POST['name']) ) {
  warning('Project clone', 'Project name is not set' );
}
  
$name = safe_data($_POST['name']);

//start transaction
db_begin();

//find all parent-tasks in this project and add them to an array for later use
if(! $q = @db_query('SELECT projectid FROM '.PRE.'tasks WHERE id='.$taskid, 0 ) ) {
  error('Task clone', 'There was an error in the data query.' );
}

//get the projectid
if( ! $projectid = @db_result($q, 0, 0) ) {
  error('Task clone', 'The project to be cloned has either been deleted, or is now invalid.');
}  

//get details
$q = db_query('SELECT DISTINCT parent FROM '.PRE.'tasks WHERE projectid='.$projectid );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $parent_array[$i] = $row[0];
}

$new_taskid = add($taskid, 0, $name );

//now get new projectid to set completion percentage
$new_projectid = db_result(db_query('SELECT projectid FROM '.PRE.'tasks WHERE id='.$new_taskid ), 0, 0 ); 

//set completed percentage project record
$percent_completed = round(percent_complete($new_projectid ) );
db_query('UPDATE '.PRE.'tasks SET completed='.$percent_completed.' WHERE id='.$new_projectid );

//for completed project set the completion time
if($percent_completed == 100 ){
  $completion_time = db_result(db_query('SELECT MAX(finished_time) FROM '.PRE.'tasks WHERE projectid='.$new_projectid ), 0, 0 );
  db_query('UPDATE '.PRE.'tasks SET completion_time=\''.$completion_time.'\' WHERE id='.$new_projectid );
}

//end transaction
db_commit();

header('Location: '.BASE_URL.'main.php?x='.$x );
die;
?>