<?php
/*
  $Id: icalendar_todo.php 2299 2009-08-24 09:46:33Z andrewsimpson $

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

  Creates a download file in the iCalendar format to RFC 2445

*/

//remote login check
if(! isset($local_login) ) {

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
$projects = array();
$allowed  = '';
$icalendar_id = sha1(MANAGER_NAME . BASE_URL );
$dtstamp = gmdate('Ymd\THis\Z');

//check validity of inputs
if(isset($_GET['selection']) && strlen($_GET['selection']) > 0 ) {
  $selection = safe_data($_GET['selection']);
}
else {
  $selection = 'user';
}

if( @safe_integer($_GET['userid']) ){
  $userid = $_GET['userid'];
}
else {
  $userid = (GUEST ) ? 0 : UID;
}

if( @safe_integer($_GET['groupid']) ) {
  $groupid = $_GET['groupid'];
}
else {
  $groupid = 0;
}

//set selection
switch($selection ) {
  case 'group':
    $tail = "AND usergroupid=?";
    $id   = 'G'.$groupid;
    $parm = $groupid;
    break;

  case 'user':
  default:
    if(! icalendar_private_user($userid ) ) {
      return;
    }
    $tail = "AND task_owner=?";
    $id   = 'U'.$userid;
    $parm = $userid;
    break;
}

//show all subtasks that are not complete
$q = db_prepare( icalendar_query().' AND '.PRE.'tasks.parent<>0 '.$tail. icalendar_usergroup_tail() );
db_execute($q, array($parm ) );

$project_q = db_prepare(icalendar_query().' AND '.PRE.'tasks.id=?'. icalendar_usergroup_tail() );


for($i=0 ; $row = @db_fetch_array($q, $i) ; ++$i ) {

  //send project once for each task
  if(! in_array($row['projectid'], (array)$projects ) ) {

    db_execute($project_q, array($row['projectid'] ) );

    //check for closed projects
    if(! ($project = db_fetch_array($project_q, 0 ) ) ) {
      continue;
    }

    $content .= icalendar_body($project, $row['projectid'] );

    $projects[] = $row['projectid'];
  }

  //add vtodo
  $content .= icalendar_body($row, $row['taskid'] );
}

//no rows ==> return
if((isset($local_login ) ) && $i == 0 ) {
  header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=todo&userid='.$userid.'&groupid='.$groupid.'&selection='.$selection );
  die;
}

//we have content, send it!

//send headers to browser
icalendar_header($id );

//send content
echo $content;

//end of file
icalendar_end();


//
// Check for private users
//

function icalendar_private_user($userid) {

if((UID == $userid ) || (ADMIN ) ) {
  return true;
}

$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'users WHERE id=? AND private=1' );
db_execute($q, array($userid ) );

if(db_result($q, 0, 0 ) == 0 ) {
  return true;
}

//private user ==> get list of common usergroups
$q = db_prepare('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid
                       FROM '.PRE.'usergroups_users
                       WHERE '.PRE.'usergroups.userid=?' );
db_execute($q, array($userid ) );

for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
    return true;
  }
}

return false;
}

?>
