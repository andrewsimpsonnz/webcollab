<?php
/*
  $Id$

  (c) 2003 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz> 
    
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

//only admin
if( ! ADMIN ){
  error('Not permitted', 'This function is for admins only' );
}
  
//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//set variables
$content = '';

$input_array = array('email_admin', 'reply_to', 'from' );

if(USE_EMAIL == 'Y' ){

  //check and validate email addresses
  foreach($input_array as $var) {
    if(! empty($_POST[$var]) ) {
      $input = (get_magic_quotes_gpc() ) ? stripslashes($_POST[$var] ): $_POST[$var];
      if((! preg_match('/\b[a-z0-9._-]+@[a-z0-9][a-z0-9._-]+\.[a-z.]+\b/i', $input, $match ) ) || (strlen(trim($input) ) > 255 ) ) {
        warning( $lang['invalid_email'], sprintf( $lang['invalid_email_given_sprt'], $_POST[$var] ) );
      }
      ${$var} = db_escape_string($match[0] );
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
  if(isset($_POST[$var]) && $_POST[$var] == 'on' ) {
    ${$var} = "checked=\"checked\"";
  }
  else {
    ${$var} = '';
  }
}

if(isset($_POST['project_order'] ) ){
  $project_order = $_POST['project_order'];
}
else {
  $project_order = '';
}

switch($project_order) {  
  case 'deadline':
    $project_list = 'ORDER BY due ASC, name';
    break;
    
  case 'priority':
    $project_list = 'ORDER BY priority DESC, name';
    break;
  
  default:  
  case 'name':
    $project_list = 'ORDER BY name';
    break;
}
    
if(isset($_POST['task_order'] ) ){
  $task_order = $_POST['task_order'];
}
else { 
  $task_order = '';
}

switch($task_order) {  
  case 'deadline':
    $task_list = 'ORDER BY due ASC, name';
    break;
    
  case 'priority':
    $task_list = 'ORDER BY priority DESC, name';
    break;
  
  default:  
  case 'name':
    $task_list = 'ORDER BY name';
    break;
}

//update config database
db_query('UPDATE '.PRE.'config SET email_admin=\''.$email_admin.'\',
                            reply_to=\''.$reply_to.'\',
                            email_from=\''.$from.'\',
                            globalaccess=\''.$access.'\',
                            groupaccess=\''.$group_edit.'\',
                            owner=\''.$owner.'\',
                            usergroup=\''.$usergroup.'\',
                            project_order=\''.$project_list.'\',
                            task_order=\''.$task_list.'\'' );

//if no email end here
if(USE_EMAIL != 'Y' ){
  header('Location: '.BASE_URL.'main.php?x='.$x );
  die;
}

//begin mailing list clean up
$input = (get_magic_quotes_gpc() ) ? stripslashes($_POST['email'] ): $_POST['email'];

//use regex to get addresses - and strip any other stuff
if((preg_match_all('/\b[a-z0-9._-]+@[a-z0-9][a-z0-9._-]+\.[a-z.]+\b/i', $input, $match, PREG_PATTERN_ORDER ) ) ) {
  //drop old list
  //can't use a transaction here - postgres' does not like it!
  db_query('TRUNCATE TABLE '.PRE.'maillist');
  
  //cycle through addresses and store in database
  foreach($match[0] as $address ) {
    //remove excessively long addresses
    if(strlen($address ) > 255 ) {
      continue;
    }
    db_query('INSERT INTO '.PRE.'maillist (email) VALUES (\''.db_escape_string($address ).'\')' );
  }
}
//all done!

header('Location: '.BASE_URL.'main.php?x='.$x );

?>
