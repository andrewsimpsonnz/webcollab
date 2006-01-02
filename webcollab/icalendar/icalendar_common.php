<?php
/*
  $Id$

  (c) 2005 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  iCalendar common functions

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//
// Basic query function
//

function icalendar_query() {

  $q =  'SELECT '.PRE.'tasks.id AS taskid, 
                '.PRE.'tasks.name AS name,
                '.PRE.'tasks.text AS text,
                '.PRE.'tasks.deadline AS deadline,
                '.PRE.'tasks.created AS created,
                '.PRE.'tasks.edited AS edited,
                '.PRE.'tasks.status AS status,
                '.PRE.'tasks.priority AS priority,
                '.PRE.'tasks.parent AS parent,
                '.PRE.'tasks.owner AS owner,
                '.PRE.'tasks.usergroupid AS usergroupid,
                '.PRE.'tasks.globalaccess AS globalaccess,
                '.PRE.'tasks.projectid AS projectid,
                '.PRE.'tasks.completed AS completed,
                '.PRE.'tasks.sequence AS sequence,
                '.PRE.'users.id AS userid,
                '.PRE.'users.fullname AS fullname,
                '.PRE.'users.email AS email
                FROM '.PRE.'tasks
                LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.owner)
                WHERE '.PRE.'tasks.archive=0 ';

  return $q;
}

//
// SQL tail for user access rights
//

function icalendar_usergroup_tail() {

  //set the usergroup permissions on queries (Admin can see all)
  if(ADMIN ) {
    $tail = ' ';
  }
  else {
    $tail = ' AND ('.PRE.'globalaccess=\'f\' AND '.PRE.'usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
              OR '.PRE.'globalaccess=\'t\'
              OR '.PRE.'usergroupid=0) ';
  }
  return $tail;
}

?>