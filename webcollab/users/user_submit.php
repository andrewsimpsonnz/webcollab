<?php
/*
  $Id: user_submit.php 2180 2009-04-07 09:33:17Z andrewsimpson $

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

  Database actions for adding, deleting & editing users

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/email.php' );
include_once(BASE.'includes/time.php' );
include_once(BASE.'lang/lang_email.php' );
include_once(BASE.'users/user_common.php' );

$usergroup_names = '';
$admin_state = '';

//update or insert ?
if(empty($_POST['action']) ) {
  error('User submit', 'No request given' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

switch($_POST['action'] ) {

  //revive a user
  case 'revive':

    //only for the admins
    if(! ADMIN ){
      error('Authorisation failed', 'You have to be admin to do this' );
    }

    //validate token
    validate_token($token, 'user_del' );

    if(! @safe_integer($_POST['userid']) ){
      error('User submit', 'No userid was specified.' );
    }

    $userid = $_POST['userid'];

    $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'users WHERE deleted=\'t\' AND id=? LIMIT 1' );
    db_execute($q, array($userid ) );

    if(db_result($q, 0, 0 ) ) {
      //undelete
      $q = db_prepare('UPDATE '.PRE.'users SET deleted=\'f\' WHERE id=?' );
      db_execute($q, array($userid ) );

      //get the users' info
      $q = db_prepare('SELECT user_name, fullname, email FROM '.PRE.'users where id=? LIMIT 1' );
      db_execute($q, array($userid ) );
      $row = db_fetch_array($q, 0 );

      //mail the user the happy news :)
      $message = sprintf($email_revive, $row['user_name'], $row['fullname'] );
      email($row['email'], $title_revive, $message );
    }
    break;


  //add a user
  case 'submit_insert':

    //only for the l33t
    if( ! ADMIN ){
      error('Authorisation failed', 'You have to be admin to do this' );
    }

    //validate_token
    validate_token($token, 'user_add' );

    //check input has been provided
    if(empty($_POST['name']) ) {
      warning($lang['value_missing'], sprintf( $lang['field_sprt'], $lang['login_name'] ) );
    }
    $name = safe_data($_POST['name']);

    if(empty($_POST['fullname']) ) {
      warning($lang['value_missing'], sprintf( $lang['field_sprt'], $lang['full_name'] ) );
    }
    $fullname = safe_data($_POST['fullname']);

    if(empty($_POST['password']) ) {
      warning( $lang['value_missing'], sprintf( $lang['field_sprt'], $lang['password'] ) );
    }
    $password_unclean = trim($_POST['password'] );

    //get locale
    $locale = (empty($_POST['locale']) ) ? LOCALE : user_locale_check(validate($_POST['locale']) );

    $email_raw = validate(trim($_POST['email'] ) );
    if(filter_var($email_raw, FILTER_VALIDATE_EMAIL ) === false ) {
      warning($lang['invalid_email'], sprintf( $lang['invalid_email_given_sprt'], safe_data($_POST['email'] ) ) );
    }
    $email_unclean = $email_raw;

    $private_user = (isset($_POST['private_user']) && ( $_POST['private_user'] === "on" ) ) ? 1 : 0 ;

    switch($_POST['user_type'] ) {
      case 'normal':
        $admin_user = 'f';
        $guest_user = 0;
        break;

      case 'admin':
        $admin_user = 't';
        $guest_user = 0;
        break;

      case 'guest':
      default:
        $admin_user = 'f';
        $guest_user = 1;
        break;
    }
    //prohibit 2 people from choosing the same username
    $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'users WHERE user_name=? LIMIT 1' );
    db_execute($q, array($name ), 0 );

    if(db_result($q, 0, 0 ) > 0 ){
      warning($lang['duplicate_user'], sprintf($lang['duplicate_change_user_sprt'], $name ) );
    }

    //begin transaction
    db_begin();
    //insert into the users table
    $q = db_prepare('INSERT INTO '.PRE.'users(user_name, fullname, user_password, email, private, user_admin, guest, deleted, locale )
                    VALUES(?, ?, ?, ?, ?, ?,  ?, \'f\', ? )' );

    db_execute($q, array($name, $fullname, pass_hash($password_unclean), $email_unclean, $private_user, $admin_user,  $guest_user, $locale ) );

    //if the user is assigned to any groups execute the following code to add him/her
    if(isset($_POST['usergroup']) ) {

      //get the oid of the just-inserted user
      $user_id = db_lastoid('users_id_seq' );

      //insert all selected usergroups in the usergroups_users table
      $q1 = db_prepare('INSERT INTO '.PRE.'usergroups_users(userid, usergroupid) VALUES(?, ?)' );
      $q2 = db_prepare('SELECT group_name FROM '.PRE.'usergroups WHERE id=?' );

      (array)$usergroup = $_POST['usergroup'];
      $max = sizeof($usergroup);
      for( $i=0 ; $i < $max ; ++$i ) {

        //check for security
        if(isset($usergroup[$i] ) && safe_integer($usergroup[$i] ) ) {
          db_execute($q1, array($user_id, $usergroup[$i] ) );
          //get the usergroup name for the email
          db_execute($q2, array($usergroup[$i] ) );
          $usergroup_names .= db_result($q2, 0, 0 )."\n";
        }
      }
    }
    //transaction complete
    db_commit();

    //email the user all data
    if($usergroup_names == '' ){
      $usergroup_names = $lang['not_usergroup']."\n";
    }

    $admin_state = ($admin_user == 't' ) ? $lang['admin_priv']."\n" : '';

    $name_unclean     = validate($_POST['name'] );
    $fullname_unclean = validate($_POST['fullname'] );
    $password_unclean = validate($_POST['password'] );

    $message = sprintf($email_welcome, $name_unclean, $password_unclean, $usergroup_names,
                $fullname_unclean, $admin_state );
    email($email_unclean, $title_welcome, $message );

    break;


  //edit a user
  case 'submit_edit':

    if((GUEST) && (GUEST_LOCKED != 'N' ) ){
      warning($lang['access_denied'], 'Guests are not permitted to modify details' );
    }

    //validate token
    validate_token($token, 'user_edit' );

    //check input has been provided
    if(empty($_POST['name']) ) {
      warning($lang['value_missing'], sprintf( $lang['field_sprt'], $lang['login_name'] ) );
    }
    $name = safe_data($_POST['name']);

    if(empty($_POST['fullname']) ) {
      warning($lang['value_missing'], sprintf( $lang['field_sprt'], $lang['full_name'] ) );
    }
    $fullname = safe_data($_POST['fullname']);

    //get new password, if any
    $password_unclean = (empty($_POST['password']) ) ? '' : trim($_POST['password']);
    //magic quotes is not required
    $email_raw = validate(trim($_POST['email'] ) );

    //get locale
    $locale = (empty($_POST['locale']) ) ? LOCALE : user_locale_check(validate($_POST['locale']) );

    if((filter_var($email_raw, FILTER_VALIDATE_EMAIL ) === false ) || (strlen($email_raw ) > 200 ) ) {
      warning( $lang['invalid_email'], sprintf( $lang['invalid_email_given_sprt'], safe_data($_POST['email'] ) ) );
    }
    $email_unclean = $email_raw;

    if(ADMIN ) {

      //check for a userid
      if(! @safe_integer($_POST['userid']) ){
        error('User submit', 'No userid specified');
      }
      $userid = $_POST['userid'];

      $private_user = (isset($_POST['private_user']) && ( $_POST['private_user'] === 'on' ) ) ? 1 : 0;

      switch($_POST['user_type'] ) {
        case 'normal':
          $admin_user = 'f';
          $guest_user = 0;
          break;

        case 'admin':
          $admin_user = 't';
          $guest_user = 0;
          break;

        case 'guest':
        default:
          $admin_user = 'f';
          $guest_user = 1;
          break;
      }

      //prohibit 2 people from choosing the same username
      $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'users WHERE user_name=? AND NOT id=?' );
      db_execute($q, array($name, $userid ), 0 );
      if(db_result($q, 0, 0 ) > 0 ) {
        warning($lang['duplicate_user'], sprintf($lang['duplicate_change_user_sprt'], $name ) );
      }
      //begin transaction
      db_begin();
      //was a password provided or not ?
      if($password_unclean != '' ) {

        //update data and the password
        $q = db_prepare('UPDATE '.PRE.'users
                              SET user_name=?,
                              fullname=?,
                              email=?,
                              user_password=?,
                              private=?,
                              user_admin=?,
                              guest=?,
                              locale=?
                              WHERE id=?' );

      db_execute($q, array($name, $fullname, $email_unclean, pass_hash($password_unclean), $private_user, $admin_user, $guest_user, $locale, $userid ) );
      }
      else {
        //update data without password
        $q = db_prepare('UPDATE '.PRE.'users
                              SET user_name=?,
                              fullname=?,
                              email=?,
                              private=?,
                              user_admin=?,
                              guest=?,
                              locale=?
                              WHERE id=?' );

      db_execute($q, array($name, $fullname, $email_unclean, $private_user, $admin_user, $guest_user, $locale, $userid ) );
      }

      //delete the user from all groups
      $q = db_prepare('DELETE FROM '.PRE.'usergroups_users WHERE userid=?' );
      db_execute($q, array($userid ) );

      //if the user is assigned to any groups execute the following code to add him/her
      if(isset($_POST['usergroup']) ) {

        //insert all selected usergroups in the usergroups_users table
        $q1 = db_prepare('INSERT INTO '.PRE.'usergroups_users(userid, usergroupid) VALUES(?, ?)' );
        $q2 = db_prepare('SELECT group_name FROM '.PRE.'usergroups WHERE id=?' );
        (array)$usergroup = $_POST['usergroup'];

        for( $i=0 ; $i < sizeof($usergroup) ; ++$i ) {

          //check for security
          if(safe_integer( $usergroup[$i] ) ) {
            db_execute($q1, array($userid, $usergroup[$i] ) );
            //get the usergroup name for the email
            db_execute($q2, array($usergroup[$i] ) );
            $usergroup_names .= db_result($q2, 0, 0 )."\n";
          }
        }
      }
      //transaction complete
      db_commit();

      if($usergroup_names == '' ){
        $usergroup_names = $lang['not_usergroup']."\n";
      }

      if($password_unclean == '' ){
        $password_unclean = $lang['no_password_change'];
      }
      else {
        $password_unclean = validate($_POST['password']);
      }

      $admin_state = ($admin_user == 't' ) ? $lang['admin_priv']."\n" : '' ;

      $name_unclean     = validate($_POST['name']);
      $fullname_unclean = validate($_POST['fullname']);

      //email the changes to the user
      $message = sprintf($email_user_change1, UID_NAME, UID_EMAIL, $name_unclean,
              $password_unclean, $usergroup_names, $fullname_unclean, $admin_state );
      email($email_unclean, $title_user_change1, $message );

    }
    else {
      //this is secure option where the user cannot change important values

      //prohibit 2 people from choosing the same username
      $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'users WHERE user_name=? AND NOT id=?', 0 );
      db_execute($q, array($name, UID ), 0 );

      if(db_result($q, 0, 0 ) > 0 ){
        warning($lang['duplicate_user'], sprintf($lang['duplicate_change_user_sprt'], $name ) );
      }
      //did the user change his/her password ?
      if($password_unclean != '' ) {
        $q = db_prepare('UPDATE '.PRE.'users
                              SET user_name=?,
                              fullname=?,
                              email=?,
                              user_password=?,
                              locale=?
                              WHERE id=?' );

        db_execute($q, array($name, $fullname, $email_unclean, pass_hash($password_unclean), $locale, UID ) );

        //email the changes to the user
        $name_unclean     = validate($_POST['name']);
        $fullname_unclean = validate($_POST['fullname']);
        $password_unclean = validate($_POST['password']);

        $message = sprintf($email_user_change2, $name_unclean, $password_unclean, $fullname_unclean );
        email($email_unclean, $title_user_change2, $message );
      }
      else {
          $q = db_prepare('UPDATE '.PRE.'users
                              SET user_name=?,
                              fullname=?,
                              email=?,
                              locale=?
                              WHERE id=?' );

          db_execute($q, array($name, $fullname, $email_unclean, $locale, UID ) );

          //email the changes to the user
          $name_unclean     = validate($_POST['name']);
          $fullname_unclean = validate($_POST['fullname']);

          $message = sprintf($email_user_change3, $name_unclean, $fullname_unclean );
          email( $email_unclean, $title_user_change3, $message );
      }
    }
    break;


  //default error
  default:
    error('User submit', 'Invalid request given');
    break;
}

if(ADMIN ) {
  header("Location: ".BASE_URL."users.php?x=".X."&action=manage" );
  die;
}
else {
  header("Location: ".BASE_URL."users.php?x=".X."&action=show&userid=".UID );
  die;
}

?>
