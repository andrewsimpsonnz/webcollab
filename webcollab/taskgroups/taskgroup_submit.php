<?php
/*
  $Id: taskgroup_submit.php 2178 2009-04-07 09:29:01Z andrewsimpson $

  (c) 2002 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Add a taskgroup to the database

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );

//admins only
if(! ADMIN) {
  error('Unauthorised access', 'This function is for admins only.' );
}

if(empty($_POST['action']) ) {
  error('Taskgroups submit', 'No action given' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'taskgroup' );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);  

switch($_POST['action'] ) {

  //delete a taskgroup
  case 'submit_del':

    if(! @safe_integer($_POST['taskgroupid']) ) {
      error('Taskgroup submit', 'Not a valid value for taskgroupid' );
    }
    $taskgroupid = $_POST['taskgroupid'];

    //if taskgroup exists we can delete it :)
    $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'taskgroups WHERE id=?' );
    db_execute($q, array($taskgroupid ) );

    if(db_result($q, 0, 0 ) ) {
      db_begin();
      //set the affected tasks to have no taskgroup
      $q = db_prepare('UPDATE '.PRE.'tasks SET taskgroupid=0 WHERE taskgroupid=?' );
      @db_execute($q, array($taskgroupid ) );
      //delete the group
      $q = db_prepare('DELETE FROM '.PRE.'taskgroups WHERE id=?' );
      db_execute($q, array($taskgroupid ) );
      db_commit();
    }
    break;

  //insert a new taskgroup
  case 'submit_insert':

    if(empty($_POST['name'] ) ){
      warning($lang['value_missing'], sprintf($lang['field_sprt'], $lang['taskgroup_name'] ) );
    }

    $name        = safe_data($_POST['name']);
    $description = safe_data($_POST['description']);

    //check for duplicates
    $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'taskgroups WHERE group_name=?' );
    db_execute($q, array($name ) );
    if(db_result($q, 0, 0 ) > 0 )
      warning($lang['add_taskgroup'], sprintf($lang['taskgroup_dup_sprt'], $name ) );

    $q = db_prepare('INSERT INTO '.PRE.'taskgroups(group_name, group_description) VALUES (?, ?)' );
    db_execute($q, array($name, $description ) );

    break;


  //edit an existing taskgroup
  case 'submit_edit':

    if(! @safe_integer($_POST['taskgroupid'] ) ){
      error('Taskgroup submit', 'Not a valid value for taskgroupid' );
    }

    if(empty($_POST['name'] ) ){
      warning($lang['value_missing'], sprintf($lang['field_sprt'], $lang['taskgroup_name'] ) );
    }

    $name        = safe_data($_POST['name'] );
    $description = safe_data($_POST['description'] );
    $taskgroupid = $_POST['taskgroupid'];

    $q = db_prepare('UPDATE '.PRE.'taskgroups SET group_name=?, group_description=? WHERE id=?' );
    db_execute($q, array($name, $description, $taskgroupid ) );
    break;

  //error case
  default:
    error('Taskgroup submit', 'Invalid request given' );
    break;
}

header('Location: '.BASE_URL.'taskgroups.php?x='.X.'&action=manage');

?>
