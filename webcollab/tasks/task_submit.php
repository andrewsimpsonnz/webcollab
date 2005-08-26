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
  $q   = db_query('SELECT owner, usergroupid, groupaccess FROM '.PRE.'tasks WHERE id='.$taskid );
  $row = db_fetch_num($q, 0 );

  //user is owner
  if($row[0] == UID ) {
    return true;
  }
  //no usergroup set
  if($row[1] == 0 ) {
    return false;
  }
  //if groupaccess is set, check user is in usergroup
  if($row[2] === 't' ) {
    if(in_array($row[1], (array)$GID ) ) {
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



?>