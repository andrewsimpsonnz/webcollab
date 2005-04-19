<?php
/*
  $Id$
  
  (c) 2003 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson from earlier work by Dennis Fleurbaaij.

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

require_once('path.php' );
require_once(BASE.'includes/security.php' );

//data check
$taskid = intval($taskid);

//admins can go free, the rest are checked
if(ADMIN )
  return;

//get the tasks' security info
if( ! ($group_q = db_query('SELECT usergroupid, globalaccess, projectid FROM '.PRE.'tasks WHERE id='.$taskid ) ) )
  error('Usergroup security', 'There was an error in the data query.' );

//get the data
if( ! ($group_row = db_fetch_num($group_q, 0 ) ) )
  error('Usergroup security', 'There was an error in fetching the permission data.' );

//check usergroup rights
if( ($group_row[0] != 0 ) && ($group_row[1] == 'f' ) ) {

  //check if the user has a matching group
  if(! in_array($group_row[0], (array)$GID, TRUE ) )
    warning($lang['access_denied'], $lang['private_usergroup'] );
}

//if this is a task, then get project data  
if($group_row[2] != $taskid ) {
  $project_q = db_query('SELECT usergroupid, globalaccess FROM '.PRE.'tasks WHERE id='.$group_row[2] );
  $project_row = db_fetch_num($project_q, 0 );

  //check if project is marked private 
  if(($project_row[0] != 0 ) && ($project_row[1] == 'f' ) ) {

    //check if the user has a matching group
    if(! in_array($project_row[0], (array)$GID ) )
      warning($lang['access_denied'], $lang['private_usergroup'] );
  }
}

?>