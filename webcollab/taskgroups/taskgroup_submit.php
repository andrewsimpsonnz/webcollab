<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//admins only
if(! ADMIN) {
  error('Unauthorised access', 'This function is for admins only.' );
}

//check for valid form token
$token = (isset($_REQUEST['token'])) ? (safe_data($_REQUEST['token'])) : null;
token_check($token );

if(empty($_REQUEST['action']) ) {
  error('Taskgroups submit', 'No action given' );
}

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);  

switch($_REQUEST['action'] ) {

  //delete a taskgroup
  case 'submit_del':

    if(! @safe_integer($_GET['taskgroupid']) ) {
      error('Taskgroup submit', 'Not a valid value for taskgroupid' );
    }
    $taskgroupid = $_GET['taskgroupid'];

    //if taskgroup exists we can delete it :)
    if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'taskgroups WHERE id='.$taskgroupid ), 0, 0 ) ) {
      db_begin();
      //set the affected tasks to have no taskgroup
      @db_query('UPDATE '.PRE.'tasks SET taskgroupid=0 WHERE taskgroupid='.$taskgroupid );
      //delete the group
      db_query('DELETE FROM '.PRE.'taskgroups WHERE id='.$taskgroupid );
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
    if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'taskgroups WHERE name=\''.$name.'\'' ), 0, 0 ) > 0 )
      warning($lang['add_taskgroup'], sprintf($lang['taskgroup_dup_sprt'], $name ) );

    db_query('INSERT INTO '.PRE.'taskgroups(name, description) VALUES (\''.$name.'\', \''.$description.'\')' );

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

    db_query('UPDATE '.PRE.'taskgroups SET name=\''.$name.'\', description=\''.$description.'\' WHERE id='.$taskgroupid );

    break;

  //error case
  default:
    error('Taskgroup submit', 'Invalid request given' );
    break;
}

header('Location: '.BASE_URL.'taskgroups.php?x='.X.'&action=manage');

?>