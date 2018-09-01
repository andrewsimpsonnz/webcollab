<?php
/*
  $Id$

  (c) 2003 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Check the usergroup security

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

function usergroup_check($taskid ) {

  global $GID, $lang;

  //admins are exempt & don't do check more than once
  if(ADMIN || (defined('USERGROUP_CHECK') && USERGROUP_CHECK ) ) {
    return $taskid;
  }

  $tail = ' AND (globalaccess=\'f\' AND usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid=?)
            OR globalaccess=\'t\'
            OR usergroupid=0
            OR task_owner=?)';

  if(! ($q = db_prepare('SELECT projectid FROM '.PRE.'tasks WHERE id=?'.$tail.' LIMIT 1', 0 ) ) ) {
    error('Usergroup security', 'There was an error in the data query.' );
  }
  db_execute($q, array(intval($taskid), UID, UID ) );

  if(! $projectid = db_result($q, 0, 0 ) ) {
    warning($lang['access_denied'], $lang['private_usergroup_no_access'] );
  }

  //if this is a task, then get project data  
  if($projectid != $taskid ) {
    if(! ($q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id=?'.$tail.' LIMIT 1', 0 ) ) ) {
      error('Usergroup security', 'There was an error in the data query.' );
    }
    db_execute($q, array($projectid, UID, UID ) );

    if(db_result($q, 0, 0 ) < 1 ) {  
      warning($lang['access_denied'], $lang['private_usergroup_no_access'] );
    }
  }

  //flag to show check has been done
  define('USERGROUP_CHECK', true );

  return $taskid;
}
?>
