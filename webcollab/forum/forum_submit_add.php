<?php
/*
  $Id: forum_submit.php 1704 2008-01-01 06:09:52Z andrewsimpson $

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

  Forum add submission

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
require_once(BASE.'includes/usergroup_security.php' );
include_once(BASE.'includes/admin_config.php');

//secure variables
$mail_list = array();

if((GUEST) && (GUEST_LOCKED != 'N' ) ){
  warning($lang['access_denied'], 'Guests are not permitted to post in forums' );
}

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//if all values are filled in correctly we can submit the forum-item
if(empty($_POST['text'] ) ) {
  warning($lang['forum_submit'], $lang['no_message'] );
}
$input_array = array('parentid', 'taskid', 'usergroupid');
foreach($input_array as $var ) {
  if(! @safe_integer($_POST[$var]) ){
    error('Forum submit', "Variable $var is not set" );
  }
  ${$var} = $_POST[$var];
}

$text = safe_data_long($_POST['text'] );

if(isset($_POST['mail_owner'] ) && ($_POST['mail_owner'] === 'on' ) ) {
  $mail_owner = true;
}
else {
  $mail_owner = '';
}

if(isset($_POST['mail_group'] ) && ($_POST['mail_group'] === 'on' ) ) {
  $mail_group = true;
}
else {
  $mail_group = '';
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'forum_add' );

//do data consistency check on taskid
$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
db_execute($q, array($taskid ) );

if(db_result($q, 0, 0 ) == 0 ){
  error('Forum submit', 'Data consistency error - not a valid taskid' );
}

//do data consistency check on parentid
if($parentid != 0 ) {
  $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'forum WHERE id=? LIMIT 1' );
  db_execute($q, array($parentid ) );

  if(db_result($q, 0, 0 ) == 0 ){
    error('Forum submit', 'Data consistency error - child post has no parent' );
  }
}

//check usergroup security
$taskid = usergroup_check($taskid );

//okay now check if we need to post in the public or the private forums of the task
switch($usergroupid ) {
  case 0:
    //public post
    db_begin();
    $q = db_prepare('INSERT INTO '.PRE.'forum(parent, taskid, posted, edited, forum_text, userid, usergroupid, sequence)
                                         VALUES (?, ?, now(), now(), ?, ?, 0, 0)' );
    db_execute($q, array($parentid, $taskid, $text, UID ) );
    break;

  default:
    //private post
    //check if the user does belong to that group
    if((! ADMIN ) && ( ! isset($GID[($usergroupid)] ) ) ) {
      error('Forum submit', 'You do not have enough rights to post in that forum' );
    }

    db_begin();
    $q = db_prepare('INSERT INTO '.PRE.'forum(parent, taskid, posted, edited, forum_text, userid, usergroupid, sequence)
                                      VALUES (?, ?, now(), now(), ?, ?, ?, 0)' );
    db_execute($q, array($parentid, $taskid, $text, UID, $usergroupid ) );
    break;

}
//set time of last forum post to this task
$q = db_prepare('UPDATE '.PRE.'tasks SET lastforumpost=now() WHERE id=?' );
db_execute($q, array($taskid ) );
db_commit();

//get task data
$q = db_prepare('SELECT '.PRE.'tasks.task_name AS task_name,
                      '.PRE.'tasks.usergroupid AS usergroupid,
                      '.PRE.'users.email AS email
                      FROM '.PRE.'tasks
                      LEFT JOIN '.PRE.'users ON ('.PRE.'tasks.task_owner='.PRE.'users.id)
                      WHERE '.PRE.'tasks.id=? LIMIT 1' );

db_execute($q, array($taskid ) );
$task_row = db_fetch_array($q, 0 );

//set owner's email
if($task_row['email'] && $mail_owner ) {
  $mail_list[] = $task_row['email'];
}

//if usergroup set, add the user list
if($task_row['usergroupid'] && $mail_group ){
  $q = db_prepare('SELECT '.PRE.'users.email
                        FROM '.PRE.'users
                        LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                        WHERE '.PRE.'usergroups_users.usergroupid=?
                        AND '.PRE.'users.deleted=\'f\'' );

  db_execute($q, array($task_row['usergroupid'] ) );

  for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
    $mail_list[] = $row[0];
  }
}

//do we need to email?
if(sizeof($mail_list) > 0 ){
  include_once(BASE.'includes/email.php' );
  include_once(BASE.'includes/time.php' );
  include_once(BASE.'lang/lang_email.php' );

  $message_unclean = validate($_POST['text'] );

  //get & add the mailing list
  if(sizeof($EMAIL_MAILINGLIST ) > 0 ){
    $mail_list = array_merge((array)$mail_list, (array)$EMAIL_MAILINGLIST );
  }

  switch($parentid ) {
    case 0:
      //this is a new post
      email($mail_list, sprintf($title_forum_post, $task_row['task_name']), sprintf($email_forum_post, UID_NAME, $message_unclean, 'index.php?taskid='.$taskid ) );
      break;

    default:
      //this is a reply to an earlier post
      $q = db_prepare('SELECT '.PRE.'forum.forum_text AS forum_text,
                      '.PRE.'users.fullname AS username
                      FROM '.PRE.'forum
                      LEFT JOIN '.PRE.'users ON ('.PRE.'forum.userid='.PRE.'users.id)
                      WHERE '.PRE.'forum.id=? LIMIT 1' );

      db_execute($q, array($parentid ) );

      $row = db_fetch_array($q, 0 );

      if($row['username'] == NULL ){
        $row['username'] = "----";
      }

      email($mail_list, sprintf($title_forum_post, $task_row['task_name']), sprintf($email_forum_reply, UID_NAME, $row['username'], $row['forum_text'], $message_unclean, 'index.php?taskid='.$taskid ) );
      break;
  }
}

//go back to where this request came from
header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$taskid );

?>
