<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002.

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

  Add a usergroup to the database

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//admins only
if( ! ADMIN ) {
  error('Unauthorised access', 'This function is for admins only.' );
}

if(empty($_REQUEST['action'] ) ) {
  error('Usergroups submit', 'No action given' );
}

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

switch($_REQUEST['action'] ) {

  //delete a usergroup
  case 'submit_del':

    if(empty($_GET['usergroupid']) || ! is_numeric($_GET['usergroupid']) ) {
      error('Usergroup submit', 'Not a valid value for usergroupid' );
    }
    
    $usergroupid = intval($_GET['usergroupid'] );

    db_begin();

    //delete the private forum posts for this usergroup
    db_query('DELETE FROM '.PRE.'forum WHERE usergroupid='.$usergroupid );

    //delete the user entries out of usergroups_users
    db_query('DELETE FROM '.PRE.'usergroups_users WHERE usergroupid='.$usergroupid );

    //delete the group
    db_query('DELETE FROM '.PRE.'usergroups WHERE id='.$usergroupid );

    //update the tasks table by resetting the deleted usergroup id to zero
    @db_query('UPDATE '.PRE.'tasks SET usergroupid=0 WHERE usergroupid='.$usergroupid );
    
    db_commit();
    break;

  //insert a new usergroup
  case 'submit_insert':

    if(empty($_POST['name'] ) ) {
      warning($lang['value_missing'], sprintf($lang['field_sprt'], $lang['usergroup_name'] ) );
    } 
    $name        = safe_data($_POST['name']);
    $description = safe_data($_POST['description']);
    
    if( isset($_POST['private_group']) && ( $_POST['private_group'] === 'on' ) ) {
      $private_group = 1;
    }
    else {
      $private_group = 0;
    }
    
    //check for duplicates
    if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'usergroups WHERE name=\''.$name.'\''), 0, 0 ) > 0 ) {
      warning($lang['add_usergroup'], sprintf($lang['usergroup_dup_sprt'], $name ) );
    }
    //begin transaction
    db_begin();
    
    db_query('INSERT INTO '.PRE.'usergroups(name, description, private ) VALUES (\''.$name.'\', \''.$description.'\', \''.$private_group.'\')' );

    if(isset($_POST['member'] ) ) {

      // get the usergroupid
      $usergroupid = db_lastoid('usergroups_id_seq' );

      (array)$member = $_POST['member'];
      $max = sizeof($member);
      for($i=0 ; $i < $max ; ++$i ) {
        if(isset($member[$i]) && is_numeric($member[$i] ) ) {
          db_query('INSERT INTO '.PRE.'usergroups_users(userid, usergroupid) VALUES('.intval($member[$i]).', '.$usergroupid.')' );
        }
      }
    }
    //transaction complete
    db_commit();
    break;

  //edit a usergroup
  case 'submit_edit':

    if(empty($_POST['usergroupid'] ) || ! is_numeric($_POST['usergroupid'] ) ){
      error('Usergroup submit', 'Not a valid value for usergroupid' );
    }
    if(empty($_POST['name'] ) ){
      warning($lang['value_missing'], sprintf( $lang['field_sprt'], $lang['usergroup_name'] ) );
    }
    $name        = safe_data($_POST['name'] );
    $description = safe_data($_POST['description'] );
    $usergroupid = intval($_POST['usergroupid'] );
    
    if( isset($_POST['private_group']) && ( $_POST['private_group'] === 'on' ) ) {
      $private_group = 1;
    }
    else {
      $private_group = 0;
    }
    //begin transaction
    db_begin();

    //do the update
    db_query('UPDATE '.PRE.'usergroups SET name=\''.$name.'\', description=\''.$description.'\', private=\''.$private_group.'\' WHERE id='.$usergroupid );

    //clean out existing usergroups_users then update with the new
    db_query('DELETE FROM '.PRE.'usergroups_users WHERE usergroupid='.$usergroupid );

      if(isset($_POST['member'] ) ) {

        (array)$member = $_POST['member'];
        $max = sizeof($member);
        for($i=0 ; $i < $max ; ++$i ) {
          if(isset($member[$i]) && is_numeric( $member[$i] ) ) {
            db_query('INSERT INTO '.PRE.'usergroups_users(userid, usergroupid) VALUES('.intval($member[$i]).', '.$usergroupid.')' );
          }
        }
      }
    //transaction complete
    db_commit();
    break;

  //error case
  default:
    error('Usergroup submit', 'Invalid request given' );
    break;
}

header('Location: '.BASE_URL.'usergroups.php?x='.$x.'&action=manage');

?>
