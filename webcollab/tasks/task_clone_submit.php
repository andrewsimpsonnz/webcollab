<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file written in 2004 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

require_once("path.php" );
require_once(BASE."includes/security.php" );

function add($taskid, $projectid=0, $parent=0, $name="" ) {

  global $uid, $parent_array;

  switch($parent ){

    case true:
      //now cloning a child task
      $q = db_query("SELECT id FROM tasks WHERE parent=$taskid" );

      if(db_num_row($q ) < 1 )
       return;

      //clone all the tasks at this level
      for( $i=0; $row = db_fetch_array($q, $i ); $i++ ) {
        $new_taskid = copy_across($row["id"], $projectid, $parent, NULL );
      }
      break;

    case false:
      //now cloning the topmost task
      $new_taskid = copy_across($taskid, 0, 0, $name );
      break;
  }

  //recursive search if the subtask is listed in parent_array (it has children then)
  if(in_array($taskid, (array)$parent_array ) ) {
    $projectid = db_result(db_query("SELECT projectid FROM tasks WHERE id=$new_taskid" ), 0, 0 );
    add($row["id"], $projectid, 1 );
  }

  return;
}


function copy_across($taskid, $projectid, $parent, $name ) {

    global $uid, $admin, $last_insert;

    $q = db_query("SELECT * FROM tasks WHERE id=$taskid" );
    $row = db_fetch_array($q, 0 );

    if(($admin != 1) && ($row["usergroup"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {
      if( ! in_array($usergroup, (array)$gid ) )
      return 0;
    }

    $owner = $uid;

    if( ! isset($name ) ) {
      $name = $row["name"];
      $owner = $row["owner"];
    }

    $q = db_query("INSERT INTO tasks(name,
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
                    values('$name',
                    '".$row["text"]."',
                    now(),
                    now(),
                    now(),
                    now(),
                    '$owner',
                    $uid,
                    '".$row["deadline"]."',
                    now(),
                    ".$row["priority"].",
                    $parent,
                    $projectid,
                    ".$row["taskgroupid"].",
                    ".$row["usergroupid"].",
                    '".$row["globalaccess"]."',
                    '".$row["groupaccess"]."',
                    '".$row["status"]."')" );

    // get taskid for the new task/project
    $last_oid = db_lastoid($q );
    $new_taskid = db_result(db_query("SELECT id FROM tasks WHERE $last_insert = $last_oid" ), 0, 0 );

    //for a new project set the projectid variable reset correctly
    if($projectid == 0 )
      db_query("UPDATE tasks SET projectid=$new_taskid WHERE id=$new_taskid" );

    //you have already seen this item, no need to announce it to you
    db_query("INSERT INTO seen(userid, taskid, time) VALUES($uid, $new_taskid, now() )");
  return $new_taskid;
}


//
// Main program
//
$parent_array = NULL;

if( ! isset($_POST["taskid"]) || ! is_numeric($_POST["taskid"] ) || $_POST["taskid"] == 0 )
  error("Project clone", "Not a valid value for taskid");

$taskid = $_POST["taskid"];

if( ! isset($_POST["name"]) )
  warning("Project clone", "Project name is not set" );

$name = safe_data($_POST["name"]);

//check usergroup security
require_once(BASE."includes/usergroup_security.php" );

//find all parent-tasks in this project and add them to an array for later use
$projectid = db_result(db_query("SELECT projectid FROM tasks WHERE id=$taskid" ), 0, 0 );
$q = db_query("SELECT DISTINCT parent FROM tasks WHERE projectid=$projectid" );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  $parent_array[$i] = $row[0];
}

add($taskid, 0, 0, $name );

header("Location: ".$BASE_URL."main.php?x=$x" );
die;
?>
