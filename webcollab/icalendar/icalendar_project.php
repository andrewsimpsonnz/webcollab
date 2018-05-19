<?php
/*
  $Id: icalendar_project.php 2299 2009-08-24 09:46:33Z andrewsimpson $

  (c) 2005 - 2013 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//remote login check
if(! isset($local_login ) ) {

  //load required files
  require_once('path.php' );
  require_once(BASE.'path_config.php' );
  require_once(BASE_CONFIG.'config.php' );

  include_once(BASE.'includes/common.php');
  include_once(BASE.'database/database.php');
  include_once(BASE.'icalendar/icalendar_login.php' );

  if(! icalendar_login() ) {
    icalendar_error('401', 'Todo login' );
  }
}

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'icalendar/icalendar_download.php' );
include_once(BASE.'icalendar/icalendar_common.php' );

//set variables
$content  = '';
$icalendar_id = sha1(MANAGER_NAME . BASE_URL );
$dtstamp = gmdate('Ymd\THis\Z');

if(! @safe_integer($_GET['taskid']) ){
  error('iCalendar show', 'Not a valid value for taskid' );
}
$taskid = $_GET['taskid'];

$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id=? AND parent=0' );
db_execute($q, array($taskid ) );

if(db_result($q, 0, 0 ) > 0 ) {
  //project - get all the tasks too...
  $type = 'tasks.projectid=?';
  $id   = 'P';
}
else {
  //task
  $type = 'tasks.id=?';
  $id   = 'T';
}

//main query
$q = db_prepare(icalendar_query().' AND '.PRE.$type. icalendar_usergroup_tail() );
db_execute($q, array($taskid ) );

for($i=0 ; $row = @db_fetch_array($q, $i) ; ++$i ) {

  //add vtodo
  $content .= icalendar_body($row, $row['taskid'] );
}

//no rows ==> return
if(isset($local_login ) && $i == 0 ) {
  header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$taskid );
  die;
}

//we have content, send it!

//send headers to browser
icalendar_header($id.$taskid );

//send content...
echo $content;

//end of file
icalendar_end();

?>
