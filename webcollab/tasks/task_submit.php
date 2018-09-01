<?php
/*
  $Id: task_submit.php 2051 2009-01-17 06:53:09Z andrewsimpson $

  (c) 2004 - 2015 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Common items for task submit

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//
//generate status message for emails
//
function status($status, $deadline ) {

  global $task_state, $lang;

  switch($status) {
    case 'created':
      $message = $task_state['new']."\n".$lang['deadline'].': '.nicedate($deadline);
      break;

    case 'notactive':
      $message = $task_state['planned'];
      break;

    case 'active':
      $message = $task_state['active']."\n".$lang['deadline'].': '.nicedate($deadline);
      break;

    case 'cantcomplete':
      $message = $task_state['cantcomplete'];
      break;

    case 'done':
      $message = $task_state['done'];
      break;

    case 'nolimit':
    default:
      $message = '';
      break;
  }

return $message;
}

//
//function to verify user access
//
function user_access($taskid ) {

  global $GID;

  //guest has no access rights
  if(GUEST ){
    return false;
  }
  //admin always has rights
  if(ADMIN ) {
    return true;
  }
  $q = db_prepare('SELECT task_owner, usergroupid, groupaccess FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
  db_execute($q, array($taskid ) );
  $row = db_fetch_array($q, 0 );

  //user is owner
  if($row['task_owner'] == UID ) {
    return true;
  }
  //no owner - anyone can edit
  if($row['task_owner'] == 0 ) {
    return true;
  }
  //no usergroup set
  if($row['usergroupid'] == 0 ) {
    return false;
  }
  //if groupaccess is set, check user is in usergroup
  if($row['groupaccess'] == 't' ) {
    if(isset($GID[($row[1])] ) ) {
      return true;
    }
  }
  //no access for this user
  return false;
}

//
//function to verify status input variable
//
function status_check($status ) {

  switch($status) {
    case 'notactive':
    case 'active':
    case 'cantcomplete':
    case 'done':
    case 'created':
    case 'nolimit':
      //all valid values
      break;

    default:
      //invalid value selected
      error('Task submit', 'Invalid value for status' );
      break;
  }
  return $status;
}

//
// Adjust and set completion status
//

function adjust_completion($projectid ) {

  //set completed percentage project record
  $percent_completed = round(percent_complete($projectid ) );
  $q = db_prepare('UPDATE '.PRE.'tasks SET completed=? WHERE id=?' );
  db_execute($q, array((int)$percent_completed, $projectid ) );

  //for completed project set the completion time
  if($percent_completed == 100 ){
    $q = db_prepare('SELECT MAX(finished_time) FROM '.PRE.'tasks WHERE projectid=?' );
    db_execute($q, array($projectid ) );
    $completion_time = db_result($q, 0, 0 );
    $q = db_prepare('UPDATE '.PRE.'tasks SET completion_time=? WHERE id=?' );
    db_execute($q, array($completion_time, $projectid ) );
  }
  return;
}

?>
