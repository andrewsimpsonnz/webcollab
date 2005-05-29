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

require_once('path.php' );
require_once(BASE.'includes/security.php' );

//set variables
$content = '';

//only admin
if( ! ADMIN ){
  error('Not permitted', 'This function is for admins only' );
}
  
//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);


$input_array = array('email_admin', 'reply_to', 'from' );

if(USE_EMAIL == 'Y' ){

  //check and validate email addresses
  foreach($input_array as $var) {
    if(! empty($_POST[$var]) ) {
      if( ! ereg("^.+@.+\..+$", $_POST[$var] ) )
        warning( $lang['invalid email'], sprintf( $lang['invalid_email_given_sprt'], $_POST[$var] ) );
      ${$var} = safe_data($_POST[$var] );
    }
    else
      ${$var} = NULL;
  }
}
else{ //no email
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

/*
Begin mailing list clean up

Because we get the mailing list input from a textarea, it needs thorough filtering to remove weird browser formatting
*/

//roughly separate out the email list by newlines, spaces, formfeeds etc...
$input_list = split("[ \f\r\n\t]+", $_POST['email'] );

//step through the split input array looking for email addresses
$max = sizeof($input_list);
//initialise secondary counter
$j = 0;

for( $i=0 ; $i < $max ; ++$i) {
  //check for valid address anywhere this data string
  if(ereg("[a-z0-9\-\.]+@[a-z0-9\-\.]+\.[a-z0-9]+", $input_list[$i], $value ) ) {
    //found one - remove any whitespace at each end, then save it
    $email_list[$j] = trim($value[0]);
    ++$j;
  }
}

//drop old list
//can't use a transaction here - postgres' does not like it!
db_query('TRUNCATE TABLE '.PRE.'maillist');

//add new list
if( isset($email_list ) ) {
  $max = sizeof($email_list);
  for( $i=0 ; $i < $max ; ++$i ) {
    db_query('INSERT INTO '.PRE.'maillist (email) VALUES (\''.$email_list[$i].'\')' );
  }
}
//all done!

header('Location: '.BASE_URL.'main.php?x='.$x );

?>
