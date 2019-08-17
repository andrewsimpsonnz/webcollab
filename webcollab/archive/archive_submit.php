<?php
/*
  $Id: archive_submit.php 2175 2009-04-07 09:24:44Z andrewsimpson $

  (c) 2004 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Archives or restores projects in the database

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );

if(isset($_POST['taskid'] ) && safe_integer($_POST['taskid'] ) ) {
  $taskid = $_POST['taskid'];
}
elseif(isset($_GET['taskid'] ) && safe_integer($_GET['taskid'] ) ) {
  $taskid = $_GET['taskid'];
}
else {
  error('Archive submit', 'Not a valid taskid' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'tasks' );

//check if the user has enough rights
if( ! ADMIN ) {
  $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id=? AND owner=? LIMIT 1' );
  db_execute($q, array($taskid, UID ) );

  if(db_result($q, 0, 0 ) < 1 ) {
    warning($lang['task_submit'], $lang['not_owner'] );
  }
}

//get projectid
$q = db_prepare('SELECT projectid FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
db_execute($q, array($taskid ) );

if(! ($projectid = db_result($q, 0, 0 ) ) ) {
  error("Archive submit", "Not a valid projectid" );
}

if(isset($_POST['action'] ) ) {
  $action = $_POST['action'];
}
elseif(isset($_GET['action'] ) ) {
  $action = $_GET['action'];
}
else {
  error('Archive submit', 'No valid action set' );
}

switch($action ) {

  case 'submit_archive':

    //do the archiving
    $q = db_prepare('UPDATE '.PRE.'tasks SET archive=1 WHERE projectid=?' );
    db_execute($q, array($projectid ) );

    header('Location: '.BASE_URL.'main.php?x='.X );
    die;
    break;

  case 'submit_restore':

    //do the restore
    $q = db_prepare('UPDATE '.PRE.'tasks SET archive=0 WHERE projectid=?' );
    db_execute($q, array($projectid ) );

    header('Location: '.BASE_URL.'archive.php?x='.X.'&action=list' );
    die;
    break;

    default:
      error('Archive submit', 'Invalid request given');
    break;
}

?>
