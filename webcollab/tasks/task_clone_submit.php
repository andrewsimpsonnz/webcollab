<?php
/*
  $Id: task_clone_submit.php 2286 2009-08-22 08:45:30Z andrewsimpson $

  (c) 2004 - 2016 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//guests shouldn't get here
if(GUEST ) {
  warning($lang['access_denied'], $lang['not_owner'] );
}

include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'tasks/task_submit.php' );

//
// function to contain prepared queries
//
function query_prepare() {

  global $q1, $q2, $q3, $q4, $q5, $q6;

  $q1 = db_prepare('SELECT id FROM '.PRE.'tasks WHERE parent=?' );

  $q2 = db_prepare('SELECT * FROM '.PRE.'tasks WHERE id=?'.usergroup_tail() );

  $q3 = db_prepare('SELECT projectid FROM '.PRE.'tasks WHERE id=?' );

  $q4 = db_prepare('INSERT INTO '.PRE.'tasks (
                    task_name,
                    task_text,
                    created,
                    lastforumpost,
                    lastfileupload,
                    edited,
                    task_owner,
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
                    task_status,
                    completed,
                    completion_time,
                    sequence,
                    archive )
                    VALUES (?, ?, now(), now(), now(), now(), ?, ?, ?,
                    now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?)' );

  $q5 = db_prepare('UPDATE '.PRE.'tasks SET projectid=? WHERE id=?' );

  $q6 = db_prepare('INSERT INTO '.PRE.'seen(userid, taskid, seen_time) VALUES(?, ?, now() )');

  return;
}

//
// Recursive function to create new project structure
//

function add($taskid, $new_parent, $new_name, $delta_deadline ) {

  global $parent_array, $q1;

  //reset variables
  $task_array = array();

  if($new_parent != 0 ) {
    //now cloning a child task
    db_execute($q1, array($taskid ) );

    //clone all the tasks at this level
     //store retrieved data rows into an array to allow new database calls to be made on same stored statement
    for($i = 0; $result_row = db_fetch_array($q1, $i ); ++$i ) {
      $result_array[$i] = $result_row;
    }

    //cycle though task data retrieved from database and process
    foreach($result_array as $row ) {
      $new_taskid = copy_across($row['id'], $new_parent, NULL, $delta_deadline );

      //recursive function if the subtask is listed in parent_array (it has children then)
      if(in_array($row['id'], (array)$parent_array ) ) {
        add($row['id'], $new_taskid, NULL, $delta_deadline );
      }
    }
  }
  else {
    //now cloning the topmost task (project)
    $new_taskid = copy_across($taskid, 0, $new_name, $delta_deadline );

    //no recursive search for children of private tasks that weren't copied across
    if($new_taskid ) {
      //recursive function if the subtask is listed in parent_array (it has children then)
      if(in_array($taskid, (array)$parent_array ) ) {
        add($taskid, $new_taskid, NULL, $delta_deadline );
      }
    }
  }

  return $new_taskid;
}


//
// function to copy across data to new project/task
//

function copy_across($taskid, $new_parent, $name, $delta_deadline ) {

  global $q2, $q3, $q4, $q5, $q6;

  //get task details
  db_execute($q2, array($taskid ) );

  //check if this was a private usergroup task
  if(! $row = db_fetch_array($q2, 0 ) ) {
    //topmost task is private - no point proceeding
    if($new_parent == 0 ) {
      error("Task clone", "You do not have sufficient rights to clone this task" );
    }
    else {
      //lower task is private - don't copy
      return false;
    }
  }

  //set values
  if($new_parent != 0 ) {
    //new task
    db_execute($q3, array($new_parent ) );
    $new_projectid = db_result($q3, 0, 0 );
    $new_name = $row['task_name'];
    db_free_result($q3 );
  }
  else{
    //new project (adjust projectid later)
    $new_projectid = 0;
    $new_name = $name;
  }

  //Calculate new deadline date
  //  This should db_prepare() as part of next query, but postgresql DOES NOT support binding to TIMESTAMP or INTERVAL !!
  $q = db_query('SELECT (TIMESTAMP \''.$row['deadline'].'\' + INTERVAL '.db_delim((int)$delta_deadline.' DAY').')' );
  $new_deadline = db_result($q );

  db_execute($q4, array($new_name, $row['task_status'], UID, UID, $new_deadline, $row['priority'],
                  $new_parent, $new_projectid, $row['taskgroupid'], $row['usergroupid'], $row['globalaccess'],
                  $row['groupaccess'], $row['task_status'], $row['completed'], $row['completion_time'], 
                  $row['archive'] ) );

  // get taskid for the new task/project
  $new_taskid = db_lastoid('tasks_id_seq' );
  db_free_result($q4 );

  //for a new project set the projectid variable reset correctly
  if($new_parent == 0 ) {
    db_execute($q5, array($new_taskid, $new_taskid ) );
    db_free_result($q5, 0, 0 );
  }

  //you have already seen this item, no need to announce it to you
  db_execute($q6, array(UID, $new_taskid ) );

  db_free_result($q6 );
  db_free_result($q2 );

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

//mandatory numeric inputs
$input_array = array('day', 'month', 'year' );
foreach($input_array as $var ) {
  if(! @safe_integer($_POST[$var]) ) {
    error( 'Task submit', 'Variable '.$var.' is not correctly set' );
  }
  ${$var} = $_POST[$var];
}

//check for valid calendar date
if( ! checkdate($month, $day, $year ) ) {
  warning($lang['invalid_date'], sprintf($lang['invalid_date_sprt'], $year.'-'.$month_array[$month ].'-'.$day ) );
}

//start transaction
db_begin();

//get the queries prepared
query_prepare();

//find all parent-tasks in this project and add them to an array for later use
$q = db_prepare('SELECT projectid, deadline FROM '.PRE.'tasks WHERE id=?' );
db_execute($q, array($taskid ) );

//get the projectid & old deadline
if(! $row = @db_fetch_num($q, 0 ) ) {
  error('Task clone', 'The project to be cloned has either been deleted, or is now invalid.');
}

$projectid = $row[0];
$deadline_array = explode('-', substr($row[1], 0, 10) );

//calculate change in deadline in days
$delta_deadline = (int)floor((mktime(0, 0, 0, $month, $day, $year ) - mktime(0, 0, 0, $deadline_array[1], $deadline_array[2], $deadline_array[0] ) ) / (60 * 60 * 24) );

//get details
$q = db_prepare('SELECT DISTINCT parent FROM '.PRE.'tasks WHERE projectid=?' );
db_execute($q, array($projectid ) );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $parent_array[$i] = $row[0];
}

$new_taskid = add($taskid, 0, $name, $delta_deadline );

//now get new projectid to set completion percentage
$q = db_prepare('SELECT projectid FROM '.PRE.'tasks WHERE id=?' );
db_execute($q, array($new_taskid ) );
$new_projectid = db_result($q, 0, 0 );


//adjust completion status in new project
adjust_completion($new_projectid );

//end transaction
db_commit();

header('Location: '.BASE_URL.'main.php?x='.X );
die;
?>
