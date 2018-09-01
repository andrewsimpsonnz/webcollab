<?php
/*
  $Id: usergroup_submit.php 2179 2009-04-07 09:31:13Z andrewsimpson $

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

  Add a usergroup to the database

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );


//admins only
if( ! ADMIN ) {
  error('Unauthorised access', 'This function is for admins only.' );
}

if(empty($_POST['action'] ) ) {
  error('Usergroups submit', 'No action given' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'usergroup' );

if(isset($_POST['mail_group'] ) &&  ($_POST['mail_group'] == 'on' ) ) {
  $mail_group = true;
}
else {
  $mail_group = false;
}

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//
// Function to send out emails
//
function email_usergroup($usergroupid, $type ) {

  global $EMAIL_MAILINGLIST, $month_array;

  $q = db_prepare('SELECT group_name FROM '.PRE.'usergroups WHERE id=? LIMIT 1' );
  db_execute($q, array($usergroupid ) );
  $usergroup_name = db_result($q, 0, 0 ); 

  $q = db_prepare('SELECT '.PRE.'users.email,
                          '.PRE.'users.user_name
                          FROM '.PRE.'users
                          LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                          WHERE '.PRE.'usergroups_users.usergroupid=?'.
                          ' AND '.PRE.'users.deleted=\'f\'' );

  db_execute($q, array($usergroupid ) );

  for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
    $mail_list[] = $row[0];
    $name_list[] = $row[1];
  }

  //do we need to email?
  if(sizeof($mail_list) < 1 ) {
    return;
  }

  include_once(BASE.'includes/email.php' );
  include_once(BASE.'includes/time.php' );
  include_once(BASE.'lang/lang_email.php' );

  //get & add the mailing list
  if(sizeof($EMAIL_MAILINGLIST ) > 0 ){
    $mail_list = array_merge((array)$mail_list, (array)$EMAIL_MAILINGLIST );
  }

  $names = implode("\n", $name_list );

  switch ($type ) {
    case 'edit':
      email($mail_list, sprintf($title_usergroup_edit, $usergroup_name ), sprintf($email_usergroup_edit, $usergroup_name, $names ) );
      break;

    case 'add':
      email($mail_list, sprintf($title_usergroup_add, $usergroup_name ), sprintf($email_usergroup_add, $usergroup_name, $names ) );
      break;

    default:
      error('Usergroup submit', 'Unknown mail option' );
      break;
  }
  return;
}

//MAIN PROGRAM

switch($_POST['action'] ) {

  //delete a usergroup
  case 'submit_del':

    if(! @safe_integer($_POST['usergroupid']) ) {
      error('Usergroup submit', 'Not a valid value for usergroupid' );
    }

    $usergroupid = $_POST['usergroupid'];

    db_begin();

    //delete the private forum posts for this usergroup
    $q = db_prepare('DELETE FROM '.PRE.'forum WHERE usergroupid=?' );
    db_execute($q, array($usergroupid ) );

    //delete the user entries out of usergroups_users
    $q = db_prepare('DELETE FROM '.PRE.'usergroups_users WHERE usergroupid=?' );
    db_execute($q, array($usergroupid ) );

    //delete the usergroup
    $q = db_prepare('DELETE FROM '.PRE.'usergroups WHERE id=?' );
    db_execute($q, array($usergroupid ) );

    //update the tasks table by resetting the deleted usergroup id to zero
    $q = db_prepare('UPDATE '.PRE.'tasks SET usergroupid=0 WHERE usergroupid=?' );
    @db_execute($q, array($usergroupid ) );

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
    $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'usergroups WHERE group_name=?' );
    db_execute($q, array($name ) );

    if(db_result($q, 0, 0 ) > 0 ) {
      warning($lang['add_usergroup'], sprintf($lang['usergroup_dup_sprt'], $name ) );
    }

    //begin transaction
    db_begin();

    $q = db_prepare('INSERT INTO '.PRE.'usergroups(group_name, group_description, private ) VALUES (?, ?, ?)' );
    db_execute($q, array($name, $description, $private_group ) );

    if(isset($_POST['member'] ) ) {

      // get the usergroupid
      $usergroupid = db_lastoid('usergroups_id_seq' );

      $q = db_prepare('INSERT INTO '.PRE.'usergroups_users(userid, usergroupid) VALUES(?, ?)' );

      (array)$member = $_POST['member'];
      $max = sizeof($member);
      for($i=0 ; $i < $max ; ++$i ) {
        if(isset($member[$i]) && safe_integer($member[$i] ) ) {
          db_execute($q, array($member[$i], $usergroupid ) );
        }
      }
    }

    //if mail group is set, then send mail
    if($mail_group ){
      email_usergroup($usergroupid, 'add' );
    }

    //transaction complete
    db_commit();
    break;

  //edit a usergroup
  case 'submit_edit':

    if(! @safe_integer($_POST['usergroupid'] ) ){
      error('Usergroup submit', 'Not a valid value for usergroupid' );
    }
    if(empty($_POST['name'] ) ){
      warning($lang['value_missing'], sprintf( $lang['field_sprt'], $lang['usergroup_name'] ) );
    }
    $name        = safe_data($_POST['name'] );
    $description = safe_data($_POST['description'] );
    $usergroupid = $_POST['usergroupid'];

    if( isset($_POST['private_group']) && ( $_POST['private_group'] === 'on' ) ) {
      $private_group = 1;
    }
    else {
      $private_group = 0;
    }
    //begin transaction
    db_begin();

    //do the update
    $q = db_prepare('UPDATE '.PRE.'usergroups SET group_name=?, group_description=?, private=? WHERE id=?' );
    db_execute($q, array($name, $description, $private_group, $usergroupid ) );

    //clean out existing usergroups_users then update with the new
    $q = db_prepare('DELETE FROM '.PRE.'usergroups_users WHERE usergroupid=?' );
    db_execute($q, array($usergroupid ) );

    if(isset($_POST['member'] ) ) {

      $q = db_prepare('INSERT INTO '.PRE.'usergroups_users(userid, usergroupid) VALUES(?, ?)' );

      (array)$member = $_POST['member'];
      $max = sizeof($member);
      for( $i=0 ; $i < $max ; ++$i ) {
        if(isset($member[$i]) && safe_integer( $member[$i] ) ) {
          db_execute($q, array($member[$i], $usergroupid ) );
        }
      }
    }

    //if mail group is set, then send mail
    if($mail_group ){
      email_usergroup($usergroupid, 'edit' );
    }

    //transaction complete
    db_commit();
    break;

  //error case
  default:
    error('Usergroup submit', 'Invalid request given' );
    break;
}

header('Location: '.BASE_URL.'usergroups.php?x='.X.'&action=manage');

?>
