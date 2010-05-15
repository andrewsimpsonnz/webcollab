<?php
/*
  $Id$

  (c) 2004 - 2010 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
// Recursive function to create new project structure
//

function add($taskid, $new_parent, $new_name, $delta_deadline ) {

  global $parent_array;

  if($new_parent != 0 ) {
    //now cloning a child task
    $q = db_query('SELECT id FROM '.PRE.'tasks WHERE parent='.$taskid );

    //clone all the tasks at this level
    for( $i=0; $row = @db_fetch_array($q, $i ); ++$i ) {
      $new_taskid = copy_across($row['id'], $new_parent, NULL, $delta_deadline );

      //recursive function if the subtask is listed in parent_array (it has children then)
      if(in_array($row['id'], (array)$parent_array ) ) {
        add($row['id'], $new_taskid, NULL, $delta_deadline );
      }
    }
  }
  else{
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

    global $tail, $delim;

    //get task details
    $q = db_query('SELECT * FROM '.PRE.'tasks WHERE id='.$taskid.$tail );

    //check if this was a private usergroup task
    if(! $row = db_fetch_array($q, 0 ) ) {
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
                    status,
                    completed,
                    completion_time,
                    sequence,
                    archive )
                    values('$new_name',
                    '".db_escape_string($row['text'])."',
                    now(),
                    now(),
                    now(),
                    now(),
                    ".UID.",
                    ".UID.",
                    (TIMESTAMP '".$row['deadline']."' + INTERVAL ".$delim.$delta_deadline." DAY".$delim."),
                    now(),
                    ".$row['priority'].",
                    $new_parent,
                    $new_projectid,
                    ".$row['taskgroupid'].",
                    ".$row['usergroupid'].",
                    '".$row['globalaccess']."',
                    '".$row['groupaccess']."',
                    '".db_escape_string($row['status'])."',
                    '".$row['completed']."',
                    '".$row['completion_time']."',
                    0,
                    '".$row['archive']."')" );

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

//set the usergroup SQL tail
$tail = usergroup_tail();

//find all parent-tasks in this project and add them to an array for later use
if(! $q = @db_query('SELECT projectid, deadline FROM '.PRE.'tasks WHERE id='.$taskid, 0 ) ) {
  error('Task clone', 'There was an error in the data query.' );
}

//get the projectid & old deadline
if(! $row = @db_fetch_num($q, $i ) ) {
  error('Task clone', 'The project to be cloned has either been deleted, or is now invalid.');
}

$projectid = $row[0];
$deadline_array = explode('-', substr($row[1], 0, 10) );

//calculate change in deadline in days
$delta_deadline = floor((mktime(0, 0, 0, $month, $day, $year ) - mktime(0, 0, 0, $deadline_array[1], $deadline_array[2], $deadline_array[0] ) ) / (60 * 60 * 24) );

//get details
$q = db_query('SELECT DISTINCT parent FROM '.PRE.'tasks WHERE projectid='.$projectid );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $parent_array[$i] = $row[0];
}

$new_taskid = add($taskid, 0, $name, $delta_deadline );

//now get new projectid to set completion percentage
$new_projectid = db_result(db_query('SELECT projectid FROM '.PRE.'tasks WHERE id='.$new_taskid ), 0, 0 ); 

//adjust completion status in new project
adjust_completion($new_projectid );

//end transaction
db_commit();

header('Location: '.BASE_URL.'main.php?x='.X );
die;
?>