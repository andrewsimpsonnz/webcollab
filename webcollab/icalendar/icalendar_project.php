<?php
/*
  $Id$

  (c) 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
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

  Creates an iCalendar file for a single project

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'icalendar/icalendar_download.php' );
include_once(BASE.'icalendar/icalendar_common.php' );

//set variables
$content  = '';
$icalendar_id = md5(MANAGER_NAME.BASE_URL);

if(! @safe_integer($_GET['taskid']) ){
  error('iCalendar show', 'Not a valid value for taskid' );
}  
  
$taskid = $_GET['taskid'];

if(db_result(db_query('SELECT COUNT(*) FROM tasks WHERE id='.$taskid.' AND parent=0' ), 0, 0 ) > 0 ) {
  //project - get all the tasks too...
  $type = 'tasks.projectid=';
  $id   = 'P';
}
else {
  //task
  $type = 'tasks.id=';
  $id   = 'T';
}

//main query
$q = db_query(icalendar_query().' AND '.PRE.$type.$taskid. icalendar_usergroup_tail() );
                      
//no rows ==> return
if(db_numrows($q) < 1 ) {
echo icalendar_query().' AND '.PRE.'tasks.projectid='.$taskid. icalendar_usergroup_tail();
  return;
} 

//send headers to browser
icalendar_header($id.$taskid );

for($i=0 ; $row = @db_fetch_array($q, $i) ; ++$i ) {            

  //add vtodo
  icalendar_vtodo($row);
}

//end of file
icalendar_end();

?>