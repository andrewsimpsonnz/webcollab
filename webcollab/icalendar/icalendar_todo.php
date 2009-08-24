<?php
/*
  $Id$

  (c) 2005 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'icalendar/icalendar_download.php' );
include_once(BASE.'icalendar/icalendar_common.php' );

//set variables
$content  = '';
$projects = '';
$allowed  = '';
$icalendar_id = md5(MANAGER_NAME.BASE_URL);

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
    $tail = "AND usergroupid=".$groupid;
    $id   = 'G'.$groupid;
    break;

  case 'user':
  default:
    if(! icalendar_private_user($userid ) ) {
      return;
    }
    $tail = "AND owner=".$userid;
    $id   = 'U'.$userid;
    break;
}

//set database character set to UTF-8
db_user_locale('UTF-8');

//show all subtasks that are not complete
$q = db_query( icalendar_query().' AND '.PRE.'tasks.parent<>0 '.$tail. icalendar_usergroup_tail() );

for($i=0 ; $row = @db_fetch_array($q, $i) ; ++$i ) {

  if(! in_array($row['projectid'], (array)$projects ) ) {

    $project_q = db_query(icalendar_query().' AND '.PRE.'tasks.id='.$row['projectid']. icalendar_usergroup_tail() );

    //check for closed projects
    if(! ($project = db_fetch_array($project_q, 0) ) ) {
      continue;
    }

    $content .= icalendar_body($project );

    $projects[] = $row['projectid'];
  }

  //add vtodo
  $content .= icalendar_body($row);
}

//no rows ==> return
if($i == 0 ) {
  header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=todo&userid='.$userid.'&groupid='.$groupid.'&selection='.$selection );
  die;
}

//we have content, send it!

//send headers to browser
icalendar_header($id);

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

if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'users WHERE id='.$userid.' AND private=1' ), 0, 0 ) == 0 ) {
  return true;
}

//private user ==> get list of common usergroups
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid
                       FROM '.PRE.'usergroups_users
                       WHERE '.PRE.'usergroups.userid='.$userid );

for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
    return true;
  }
}

return false;
}

?>