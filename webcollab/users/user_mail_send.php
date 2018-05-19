<?php
/*
  $Id: user_mail_send.php 2172 2009-04-06 07:30:53Z andrewsimpson $

  (c) 2003 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Send composed emails to users, usergroups and mail list

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/email.php' );

//only for admins
if( ! ADMIN ) {
  error('Not permitted', 'This function is for admins only' );
}

//initialise variables
$address_array = array();

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'user_mail' );

// send to users or groups?
if(empty($_POST['group']) ){
  error('Email action handler', 'No request given' );
}

//check we have a message!
if(empty($_POST['message'] ) ){
  warning($lang['admin_email'], $lang['no_message'] );
}

//normalise embedded line breaks to '\n' and then wordwrap
$message_unclean = validate($_POST['message'] );
$message_unclean = str_replace("\r\n", "\n", $message_unclean );
$message_unclean = str_replace("\r", "\n", $message_unclean );
$message_unclean = wordwrap($message_unclean, 100 );

//subject
if(isset($_POST['subject'] ) ) {
  $subject_unclean = validate($_POST['subject'] );
}
else {
  $subject_unclean = '';
}

//what do you want to send today =]
switch($_POST['group'] ) {

  case 'all':
    //select all users
    $q = db_query('SELECT email FROM '.PRE.'users WHERE deleted=\'f\'' );

    for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
      $address_array[$i] = $row[0];
    }
    break;

  case 'group':
    //check if any usergroups have been sent
    if(! empty($_POST['usergroup'] ) ){
      $max = sizeof($_POST['usergroup'] );
    }
    else {
      warning($lang['admin_email'], $lang['no_usergroups'] );
    }
    (array)$usergroup = $_POST['usergroup'];

    $q = db_prepare('SELECT '.PRE.'users.email
		    FROM '.PRE.'usergroups_users
		    LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'usergroups_users.userid)
		    WHERE '.PRE.'usergroups_users.usergroupid=?
		    AND '.PRE.'users.deleted=\'f\'' );


    //initialise address_array counter
    $k = 0;
    //loop through chosen usergroups
    for($i=0 ; $i < $max ; ++$i ){
      //check for security, then get users for each usergroup
      if(isset($usergroup[$i] ) && safe_integer($usergroup[$i] ) ){
        db_execute($q, array($usergroup[$i] ) );

        //loop through result rows and add users to the list
        for($j = 0 ; $row = @db_fetch_num($q, $j ) ; ++$j ){
          $address_array[$k] = $row[0];
          ++$k;
        }
      }
    }
    break;

  case 'maillist':
    //mailing list is added in below for every case - we don't specifically add it in here
    break;

  default:
    error('Admin email', 'No group or user descriptor is set' );
    break;
}

if(sizeof($EMAIL_MAILINGLIST ) > 0 ){
  $address_array = array_merge((array)$address_array, (array)$EMAIL_MAILINGLIST );
}
//silly error check
if(sizeof($address_array ) != 0 ) {
  //send it
  email($address_array, $subject_unclean, $message_unclean );
}

//all done: warp back to main screen (Aye, aye captain).
header('Location: '.BASE_URL.'main.php?x='.X );
?>
