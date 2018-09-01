<?php
/*
  $Id$

  (c) 2005 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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
                '.PRE.'tasks.task_name AS task_name,
                '.PRE.'tasks.task_text AS task_text,
                '.PRE.'tasks.deadline AS deadline_date,
                ('.PRE.'tasks.deadline+INTERVAL '.db_delim('24 HOUR' ).') AS deadline_date_end,
                ('.PRE.'tasks.created-INTERVAL '.db_delim(TZ.' HOUR' ).') AS created_utc,
                ('.PRE.'tasks.edited-INTERVAL '.db_delim(TZ.' HOUR' ).') AS edited_utc,
                '.PRE.'tasks.task_status AS task_status,
                '.PRE.'tasks.priority AS priority,
                '.PRE.'tasks.parent AS parent,
                '.PRE.'tasks.task_owner AS task_owner,
                '.PRE.'tasks.usergroupid AS usergroupid,
                '.PRE.'tasks.globalaccess AS globalaccess,
                '.PRE.'tasks.projectid AS projectid,
                '.PRE.'tasks.completed AS completed,
                '.PRE.'tasks.sequence AS sequence,
                '.PRE.'users.id AS userid,
                '.PRE.'users.fullname AS fullname,
                '.PRE.'users.email AS email
                FROM '.PRE.'tasks
                LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.task_owner)
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
    $tail = ' AND ('.PRE.'tasks.globalaccess=\'f\' AND '.PRE.'tasks.usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
              OR '.PRE.'tasks.globalaccess=\'t\'
              OR '.PRE.'tasks.usergroupid=0) ';
  }
  return $tail;
}

?>
