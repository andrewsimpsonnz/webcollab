<?php
/*
  $Id: task_list.php 2294 2009-08-24 09:41:39Z andrewsimpson $

  (c) 2002 - 2012 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Lists all tasks and subtasks

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
include_once(BASE.'tasks/task_common.php' );

$content = '';
$task_array     = array();
$parent_array   = array();
$task_count     = 0;  //counter for $task_array

//
// List tasks
//

function listTasks($parentid ) {
  global $lang;
  global $task_array, $parent_array, $shown_array, $task_count, $level_count;

  //initialise variables
  $shown_array  = array();
  $level_count  = 1;  //number of task levels

  //check if we have taskgroups
  if($task_array[0]['group_id'] ) {
    $content = '';
    $stored_groupid = '';
    $taskgroup_flag = 1;
    $taskgroup_initial_flag = 1;
  }
  else {
    $content = "<ul class=\"ul-".$level_count."\">\n";
    $taskgroup_flag = 0;
  }

  //iteration for main tasks
  for($i=0 ; $i < $task_count ; ++$i ) {
    //ignore subtasks in this iteration
    if(($task_array[$i]['parent'] != $parentid ) )  {
      continue;
    }

    //set taskgroups - if we have them
    if($taskgroup_flag ) {

      //check if taskgroup has changed from last iteration
      if(($stored_groupid != $task_array[$i]['group_id'] ) || $taskgroup_initial_flag ) {

        //don't need </ul> before first taskgroup heading (no <ul> is set)
        if(! $taskgroup_initial_flag ) {
          $content .= "</ul>\n";
        }

        $content .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

        //set taskgroup name, or 'Uncategorised' if none
        if(! $task_array[$i]['group_name']) {
          $content .= $lang['uncategorised'];
        }
        else {
          $content .= $task_array[$i]['group_name'];
          //add taskgroup description
          if($task_array[$i]['group_description']) {
            $content .=  "&nbsp;<i>( ".$task_array[$i]['group_description']." )</i>";
          }
        }

        $content .= "</p>\n<ul class=\"ul-".$level_count."\">\n";
       
        //store current groupid & clear initial flag
        $stored_groupid = $task_array[$i]['group_id'];
        $taskgroup_initial_flag = 0;
      }
    }

    //show line
    $content .= task_state($i);

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_task_children($task_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }

  $content .= "</ul>\n";

  return $content;
}

//
// List subtasks (recursive function)
//
function find_task_children($parent ) {

  global $task_array, $parent_array, $shown_array, $task_count, $level_count;

  $content_flag = 0;
  ++$level_count;

  $content = "\n<ul class=\"ul-".$level_count."\">\n";

  for($i=0 ; $i < $task_count ; ++$i ) {

    //ignore tasks not directly under this parent
    if($task_array[$i]['parent'] != $parent ) {
      continue;
    }

    $content .= task_state($i);

    //we have content to show
    $content_flag = 1;

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_task_children($task_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }
  $content .= "</ul>\n";
  --$level_count;

  if(! $content_flag ) {
    $content = '';
  }

  return $content;
}

//
//  Builds up HTML for each task line 
//

function task_state($key ) {

  global $task_array, $lang, $task_state;
  global $q1;

  $content = '<li>';

  //don't show alert content for changes more than NEW_TIME (in seconds)
  $max = max($task_array[$key]['edited'], $task_array[$key]['lastpost'], $task_array[$key]['lastfileupload'] );

  //have you seen this task yet ?
  if((TIME_NOW - $max ) > 86400 * NEW_TIME ) {
    //if task is over limit in NEW_TIME and still not looked at by you, mark it as seen, and move on...
    if(! $task_array[$key]['last_seen'] ) {
      db_execute($q1, array(UID, $task_array[$key]['id'] ) );
    }
  }
  //task has changed since last seen - show the changes to you
  else {

    if(! $task_array[$key]['last_seen'] ) {
      //new and never visited by this user
      $content .= "<span class=\"new\">".$lang['new_g']."</span>&nbsp;";
    }
    else {

      //check if edited since last visit
      if(($task_array[$key]['last_seen'] - $task_array[$key]['edited'] ) < 0 ) {
        //edited
        $content .= "<span class=\"updated\">".$lang['updated_g']."</span>&nbsp;";
      }

      //are there forum changes ?
      if($task_array[$key]['last_seen'] - $task_array[$key]['lastpost'] < 0 ) {
        $content .= "<img src=\"images/comments.png\" height=\"16\" width=\"16\" alt=\"message\" /> &nbsp;";
      }

      //are there file upload changes ?
      if($task_array[$key]['last_seen'] - $task_array[$key]['lastfileupload'] < 0 ) {
        $content .= "<img src=\"images/disk_multiple.png\" height=\"16\" width=\"16\" alt=\"file\" /> &nbsp;";
      }
    }
  }

  $content .= "<a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$task_array[$key]['id']."\">".
               $task_array[$key]['name']."</a>&nbsp;";

  //status
  switch($task_array[$key]['status'] ) {
    case "done":
      $content .= "<span class=\"green\">(".$task_state['completed']."&nbsp;".nicedate($task_array[$key]['finished_time']).")</span>";
      break;

    case "active":
      $content .= "<span class=\"orange\">(".$task_state['active'].")</span>";
      break;

    case "notactive":
      $content .= "<span class=\"grey\">(".$task_state['planned'].")</span>";
      break;

    case "cantcomplete":
      $content .= "<span class=\"blue\">(".$task_state['cantcomplete']."&nbsp;".nicedate($task_array[$key]['finished_time']).")</span>";
      break;

    default:
      break;
  }

  $content .= "<small>";

  //add username if task is taken
  if($task_array[$key]['userid'] ) {
    $content .= "&nbsp;[<a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$task_array[$key]['userid']."\">".
                 $task_array[$key]['username']."</a>]&nbsp;";
  }
  else {
    $content .= "&nbsp;[".$lang['nobody']."]&nbsp;";
  }

  //add number of days to a task over here
  switch($task_array[$key]['status'] ) {

    case 'done':
    case 'notactive':
    case 'cantcomplete':
      break;

    default:
      $state = ( ($task_array[$key]['due'] - TIME_NOW)/86400 );
      if($state > 1 ) {
        $content .=  "(".sprintf( $lang['due_sprt'], ceil((real)$state) ).")";
      }
      else if($state > 0 ) {
        $content .=  "(".$lang['tomorrow'].")";
      }
      else {
        switch( -ceil($state) ) {

          case 0:
            $content .=  "<span class=\"green\">(<i>".$lang['due_today']."</i>)</span>";
            break;

          case 1:
            $content .= "<span class=\"red\">(".$lang['overdue_1'].")</span>";
            break;

          default:
            $content .= "<span class=\"red\">(".sprintf($lang['overdue_sprt'], -ceil((real)$state) ).")</span>";
            break;
        }
      }
      break;
  }

  //finish the line
  $content .= "</small>";

  return $content;
}


//
//START OF MAIN PROGRAM
//

//is the parentid set in tasks.php ?
if(! @safe_integer($_REQUEST['taskid']) ) {
  error('Task list', 'Not a valid value for parentid' );
}

$parentid = $_REQUEST['taskid'];

//set prepared statement
$q1 = db_prepare('INSERT INTO '.PRE.'seen(userid, taskid, time) VALUES (?, ?, now() )' );

$q = db_prepare('SELECT projectid FROM '.PRE.'tasks WHERE parent=? LIMIT 1' );

if( ! db_execute($q, array($parentid ) ) ) {
  error('Task list', 'There was an error in the data query.' );
}

if( ! $row = @db_fetch_array($q, 0) ) {
  //no tasks
  return;
}

$projectid = $row['projectid'];

//get the sort order for projects/tasks
$q = db_query('SELECT task_order FROM '.PRE.'config' );
$task_order = db_result($q, 0, 0 );
$task_order = str_replace('ORDER BY', '', $task_order );

if(substr(DATABASE_TYPE, 0, 5) == 'mysql' ) {
  $no_group = 'IF('.PRE.'taskgroups.name IS NULL, 1, 0), ';
}
else {
  $no_group = '';
}

//query to get the children for this taskid
$q = db_prepare('SELECT '.PRE.'tasks.id AS id,
                '.PRE.'tasks.name AS name,
                '.PRE.'tasks.parent AS parent,
                '.PRE.'tasks.status AS status,
                '.PRE.'tasks.finished_time AS finished_time,
                '.db_epoch().' '.PRE.'tasks.deadline) AS due,
                '.db_epoch().' '.PRE.'tasks.edited) AS edited,
                '.db_epoch().' '.PRE.'tasks.lastforumpost) AS lastpost,
                '.db_epoch().' '.PRE.'tasks.lastfileupload) AS lastfileupload,
                '.PRE.'tasks.owner AS owner,
                '.PRE.'tasks.priority AS priority,
                '.PRE.'users.id AS userid,
                '.PRE.'users.fullname AS username,
                '.PRE.'taskgroups.id AS group_id,
                '.PRE.'taskgroups.name AS group_name,
                '.PRE.'taskgroups.description AS group_description,
                '.db_epoch().' '.PRE.'seen.time) AS last_seen
                FROM '.PRE.'tasks
                LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.owner)
                LEFT JOIN '.PRE.'taskgroups ON ('.PRE.'taskgroups.id='.PRE.'tasks.taskgroupid)
                LEFT JOIN '.PRE.'seen ON ('.PRE.'tasks.id='.PRE.'seen.taskid AND '.PRE.'seen.userid=?)
                WHERE '.PRE.'tasks.projectid=?
                '.usergroup_tail().
                'ORDER BY '.$no_group.' group_name, '.$task_order );

db_execute($q, array(UID, $projectid ) );

for( $i=0 ; $task_array[$i] = @db_fetch_array($q, $i ) ; ++$i ) {

  //if this is a subtask, store the parent id
  if($task_array[$i]['parent'] != $projectid ) {
    $parent_array[($task_array[$i]['parent'])] = 1;
  }

  ++$task_count;
}

db_free_result($q);

if($i > 0 ) {
  //we have tasks showing in the database

  $content = listTasks($parentid );

  new_box($lang['tasks'], $content, 'boxdata-normal', 'head-normal', 'boxstyle-normal', 'task-list' );
}

?>
