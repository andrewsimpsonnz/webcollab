<?php
/*
  $Id: admin_config_submit.php 2199 2009-04-10 21:34:16Z andrewsimpson $

  (c) 2003 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Set configuration

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );

//only admin
if( ! ADMIN ){
  error('Not permitted', 'This function is for admins only' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'admin_config' );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//set variables
$content = '';

$input_array = array('email_admin', 'reply_to', 'from' );

if(USE_EMAIL === 'Y' ){

  //check and validate email addresses
  foreach($input_array as $var) {
    if(! empty($_POST[$var]) ) {
      $input = validate(trim($_POST[$var] ) );
      if((filter_var($input, FILTER_VALIDATE_EMAIL ) === false ) || (strlen($input ) > 200 ) ) {
        warning( $lang['invalid_email'], sprintf( $lang['invalid_email_given_sprt'], safe_data($_POST[$var] ) ) );
      }
      ${$var} = $input;


    }
    else
      ${$var} = NULL;
  }
}
else { //no email
  foreach($input_array as $var) {
    ${$var} = NULL;
  }
}

//check and validate checkboxes
$input_array = array('access', 'group_edit', 'owner', 'usergroup' );
foreach($input_array as $var ) {
  if(isset($_POST[$var]) && $_POST[$var] === 'on' ) {
    ${$var} = "checked=\"checked\"";
  }
  else {
    ${$var} = '';
  }
}

if(isset($_POST['project_order'] ) ){
  $project_order = safe_data($_POST['project_order'] );
}
else {
  $project_order = '';
}

switch($project_order) {
  case 'deadline':
    $project_list = 'ORDER BY due ASC, priority DESC, task_name';
    break;

  case 'priority':
    $project_list = 'ORDER BY priority DESC, due ASC, task_name';
    break;

  default:
  case 'name':
    $project_list = 'ORDER BY task_name';
    break;
}

if(isset($_POST['task_order'] ) ){
  $task_order = safe_data($_POST['task_order'] );
}
else {
  $task_order = '';
}

switch($task_order) {
  case 'deadline':
    $task_list = 'ORDER BY due ASC, priority DESC, task_name';
    break;

  case 'priority':
    $task_list = 'ORDER BY priority DESC, due ASC, task_name';
    break;

  default:
  case 'name':
    $task_list = 'ORDER BY task_name';
    break;
}

//update config database
$q = db_prepare('UPDATE '.PRE.'config SET email_admin=?,
                            reply_to=?,
                            email_from=?,
                            globalaccess=?,
                            groupaccess=?,
                            config_owner=?,
                            usergroup=?,
                            project_order=?,
                            task_order=?' );

db_execute($q, array($email_admin, $reply_to, $from, $access, $group_edit, $owner, $usergroup, $project_list, $task_list ) );


//if no email end here
if(USE_EMAIL !== 'Y' ){
  header('Location: '.BASE_URL.'main.php?x='.X );
  die;
}

//begin mailing list clean up
$input = validate($_POST['email'] );

//drop old list
//can't use a transaction here - postgres' does not like it!
db_query('TRUNCATE TABLE '.PRE.'maillist');

//use regex to get addresses - and strip any other stuff
if((preg_match_all('/\b[a-z0-9\.\_\-]+@[a-z0-9][a-z0-9\.\-]+\.[a-z\.]+\b/i', $input, $match, PREG_PATTERN_ORDER ) ) ) {

  $q = db_prepare('INSERT INTO '.PRE.'maillist (email) VALUES (?)' );
  //cycle through addresses and store in database
  foreach($match[0] as $address ) {
    //validate address
    if((filter_var($address, FILTER_VALIDATE_EMAIL ) === false ) || (strlen($address ) > 200 ) ) {
      continue;
    }
    db_execute($q, array($address ) );
    db_free_result($q );
  }
}
//all done!

header('Location: '.BASE_URL.'main.php?x='.X );

?>
