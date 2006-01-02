<?php
/*
  $Id$

  (c) 2002 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//includes
include_once(BASE.'includes/email.php' );

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

//get some stupid errors
if(! @safe_integer($_GET['userid']) ) {
  error('User delete', 'No userid specified' );
}

$userid = $_GET['userid'];

if(empty($_GET['action'] ) ){
  error('User delete', 'No action specified' );
}

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

switch($_GET['action'] ){

  case 'permdel':

    if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'users WHERE id='.$userid.' AND deleted=\'t\'' ), 0, 0 ) == 1 ) {

      //kiss your ass goodbye :)
      db_begin();

      //free up any tasks owned (should be none)
      @db_query('UPDATE '.PRE.'tasks SET owner=0 WHERE owner='.$userid );

      //remove user from forum messages
      db_query('UPDATE '.PRE.'forum SET userid=0 WHERE userid='.$userid );

      //delete user FROM login tables
      db_query('DELETE FROM '.PRE.'logins WHERE user_id='.$userid );

      //delete from seen table
      db_query('DELETE FROM '.PRE.'seen WHERE userid='.$userid );

      //delete from usergroups_users
      db_query('DELETE FROM '.PRE.'usergroups_users WHERE userid='.$userid );

      //delete from users table
      db_query('DELETE FROM '.PRE.'users WHERE id='.$userid );

      db_commit();
    }

    break;

  case 'del':

     //if user exists we can delete them
     if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'users WHERE id='.$userid ), 0, 0 ) ) {
       //mark user as deleted
       db_begin();
       db_query('UPDATE '.PRE.'users SET deleted=\'t\' WHERE id='.$userid );

       //free all tasks that that user has done
       @db_query('UPDATE '.PRE.'tasks SET owner=0 WHERE owner='.$userid );
       db_commit();

       //get the users' info
       $q = db_query('SELECT email FROM '.PRE.'users WHERE id='.$userid );
       $email = db_result($q, 0, 0 );

       //mail the user that he/she had been deleted
       include_once(BASE.'lang/lang_email.php' );
       email($email, $title_delete_user, $email_delete_user );
     }
    break;

  default:
    error('User delete action handler', 'Invalid request given');
    break;

}

header('Location: '.BASE_URL.'users.php?x='.$x.'&action=manage');

?>