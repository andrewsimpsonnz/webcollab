<?php
/*
  $Id: forum_submit.php 1704 2008-01-01 06:09:52Z andrewsimpson $

  (c) 2002 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
require_once(BASE.'includes/admin_config.php');
require_once(BASE.'includes/usergroup_security.php' );


//secure variables
$mail_list = array();

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

//do data consistency check on parentid
if($parentid != 0 ) {
  if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'forum WHERE id='.$parentid ), 0, 0 ) == 0 ){
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
    db_query ('INSERT INTO '.PRE.'forum(parent, taskid, posted, edited, text, userid, usergroupid, sequence)
                                      VALUES ('.$parentid.', '.$taskid.', now(), now(), \''.$text.'\', '.UID.', 0, 0)' );
    break;

  default:
    //private post
    //check if the user does belong to that group
    if((! ADMIN ) && ( ! isset($GID[($usergroupid)] ) ) ) {
      error('Forum submit', 'You do not have enough rights to post in that forum' );
    }

    db_begin();
    db_query ('INSERT INTO '.PRE.'forum(parent, taskid, posted, edited, text, userid, usergroupid, sequence)
                                      VALUES ('.$parentid.', '.$taskid.', now(), now(), \''.$text.'\', '.UID.', '.$usergroupid.', 0)' );
    break;

}
//set time of last forum post to this task
db_query('UPDATE '.PRE.'tasks SET lastforumpost=now() WHERE id='.$taskid );
db_commit();

//get task data
$q = db_query('SELECT '.PRE.'tasks.name AS name,
                      '.PRE.'tasks.usergroupid AS usergroupid,
                      '.PRE.'users.email AS email
                      FROM '.PRE.'tasks
                      LEFT JOIN '.PRE.'users ON ('.PRE.'tasks.owner='.PRE.'users.id)
                      WHERE '.PRE.'tasks.id='.$taskid );
$task_row = db_fetch_array($q, 0 );

//set owner's email
if($task_row['email'] && $mail_owner ) {
  $mail_list[] = $task_row['email'];
}

//if usergroup set, add the user list
if($task_row['usergroupid'] && $mail_group ){
  $q = db_query('SELECT '.PRE.'users.email
                        FROM '.PRE.'users
                        LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                        WHERE '.PRE.'usergroups_users.usergroupid='.$task_row['usergroupid'].
                        ' AND '.PRE.'users.deleted=\'f\'' );

  for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
    $mail_list[] = $row[0];
  }
}

//do we need to email?
if(sizeof($mail_list) > 0 ){
  include_once(BASE.'includes/email.php' );
  include_once(BASE.'lang/lang_email.php' );

  $message_unclean = validate($_POST['text'] );

  //get rid of magic_quotes - it is not required here
  if(get_magic_quotes_gpc() ){
    $message_unclean = stripslashes($message_unclean );
  }
  //get & add the mailing list
  if(sizeof($EMAIL_MAILINGLIST ) > 0 ){
    $mail_list = array_merge((array)$mail_list, (array)$EMAIL_MAILINGLIST );
  }

  switch($parentid ) {
    case 0:
      //this is a new post
      email($mail_list, sprintf($title_forum_post, $task_row['name']), sprintf($email_forum_post, UID_NAME, $message_unclean, 'index.php?taskid='.$taskid ) );
      break;

    default:
      //this is a reply to an earlier post
      $q = db_query('SELECT '.PRE.'forum.text AS text,
                    '.PRE.'users.fullname AS username
                    FROM '.PRE.'forum
                    LEFT JOIN '.PRE.'users ON ('.PRE.'forum.userid='.PRE.'users.id)
                    WHERE '.PRE.'forum.id='.$parentid );

      $row = db_fetch_array($q, 0 );

      if($row['username'] == NULL ){
        $row['username'] = "----";
      }

      email($mail_list, sprintf($title_forum_post, $task_row['name']), sprintf($email_forum_reply, UID_NAME, $row['username'], $row['text'], $message_unclean, 'index.php?taskid='.$taskid ) );
      break;
  }
}

//go back to where this request came from
header('Location: '.BASE_URL.'tasks.php?x='.$x.'&action=show&taskid='.$_REQUEST['taskid'] );

?>
