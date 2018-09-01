<?php
/*
  $Id: user_del.php 2180 2009-04-07 09:33:17Z andrewsimpson $

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

  Database deletion of users

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/email.php' );
include_once(BASE.'lang/lang_email.php' );

//get some stupid errors
if(! @safe_integer($_POST['userid']) ) {
  error('User delete', 'No userid specified' );
}

$userid = $_POST['userid'];

if(empty($_POST['action'] ) ){
  error('User delete', 'No action specified' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'user_del' );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

switch($_POST['action'] ){

  case 'permdel':

    $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'users WHERE id=? AND deleted=\'t\'' );
    db_execute($q, array($userid ) );

    if(db_result($q, 0, 0 ) == 1 ) {

      //kiss your ass goodbye :)
      db_begin();

      //free up any tasks owned (should be none)
      $q = db_prepare('UPDATE '.PRE.'tasks SET task_owner=0 WHERE task_owner=?' );
      @db_execute($q, array($userid ) );

      //remove user from forum messages
      $q = db_prepare('UPDATE '.PRE.'forum SET userid=0 WHERE userid=?' );
      db_execute($q, array($userid ) );

      //delete user FROM login tables
      $q = db_prepare('DELETE FROM '.PRE.'logins WHERE user_id=?' );
      db_execute($q, array($userid ) );

      //delete from seen table
      $q = db_prepare('DELETE FROM '.PRE.'seen WHERE userid=?' );
      db_execute($q, array($userid ) );

      //delete from usergroups_users
      $q = db_prepare('DELETE FROM '.PRE.'usergroups_users WHERE userid=?' );
      db_execute($q, array($userid ) );

      //delete from users table
      $q = db_prepare('DELETE FROM '.PRE.'users WHERE id=?' );
      db_execute($q, array($userid ) );

      db_commit();
    }

    break;

  case 'del':

     //if user exists we can delete them
     $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'users WHERE id=?' );
     db_execute($q, array($userid ) );

     if(db_result($q, 0, 0 ) > 0 ) {
       //mark user as deleted
       db_begin();
       $q = db_prepare('UPDATE '.PRE.'users SET deleted=\'t\' WHERE id=?' );
       db_execute($q, array($userid ) );

       //free all tasks that that user has done
       $q = db_prepare('UPDATE '.PRE.'tasks SET task_owner=0 WHERE task_owner=?' );
       @db_execute($q, array($userid ) );
       db_commit();

       //get the users' info
       $q = db_prepare('SELECT email FROM '.PRE.'users WHERE id=?' );
       db_execute($q, array($userid ) );
       $email = db_result($q, 0, 0 );

       //mail the user that he/she had been deleted
       email($email, $title_delete_user, $email_delete_user );
     }
    break;

  default:
    error('User delete action handler', 'Invalid request given');
    break;

}

header('Location: '.BASE_URL.'users.php?x='.X.'&action=manage');

?>
