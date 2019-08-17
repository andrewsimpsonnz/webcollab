<?php
/*
  $Id: contact_submit.php 2160 2009-04-06 07:07:34Z andrewsimpson $

  (c) 2002 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Management for contacts

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

require_once(BASE.'includes/token.php' );
require_once(BASE.'includes/usergroup_security.php' );

if(GUEST ) {
  error('Contact submit', 'Guest not authorised' );
}

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
validate_token($token, 'contact' );

//
// FUNCTION
//
function assemble_data() {

  //first and last name are required
  if(empty($_POST['lastname'] ) || empty($_POST['firstname'] ) ) {
    warning($lang['contact_submit'], $lang['contact_warn'] );
  }

  //field values
  $array = array('firstname', 'lastname', 'company', 'tel_home', 'gsm', 'fax', 'tel_business', 'address', 'postal', 'city', 'email');

  foreach($array as $var ) {
    if(! isset($_POST[$var]) ) {
      $data[] = '';
    }
    else {
      $data[] = safe_data($_POST[$var]);
    }
  }

  if(! isset($_POST['notes']) ) {
    $data[] = '';
  }
  else {
    $data[] = safe_data_long($_POST['notes']);
  }

  return (array)$data;
}

// gets the contactid and checks taskid
function get_contactid() {

  if( ! @safe_integer($_POST['contactid']) ) {
    error('Contact submit', 'Not a valid contactid' );
  }
  $contactid = $_POST['contactid'];

  //get taskid - if any
  $q = db_prepare('SELECT taskid FROM '.PRE.'contacts WHERE id=? LIMIT 1' );
  db_execute($q, array($contactid ) );
  $taskid = db_result($q, 0, 0 );

  //check usergroup if required
  if($taskid ) {
    require_once(BASE.'includes/usergroup_security.php' );
    usergroup_check($taskid);
  }
  
  return $contactid;
}

//
// MAIN PROGRAM
//

//edit, insert, delete ?
if(isset($_POST['action'] ) ) {
  $action = safe_data($_POST['action'] );
}
else {
  error('Contact submit', 'No request given' );
}

//database actions
switch($action ) {

  //insert a new contact
  case 'submit_add':

    if( @safe_integer($_POST['taskid']) && $_POST['taskid'] != 0 ) {
      $taskid = $_POST['taskid'];

      //check for non-existent tasks...
      $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
      db_execute($q, array($taskid ) );

      if(db_result($q, 0, 0 ) < 1 ) {
        error('Contact submit', 'Not a valid taskid' );
      }
    }
    else {
      $taskid = 0;
    }
    
    //check usergroup if required
    if($taskid ) {
      require_once(BASE.'includes/usergroup_security.php' );
      usergroup_check($taskid);
    }

    //assemble input data and do error checks
    $data = array_merge((array)(assemble_data() ), array(UID, UID, $taskid ) );

    $q = db_prepare('INSERT INTO '.PRE.'contacts(firstname,
                                      lastname,
                                      company,
                                      tel_home,
                                      gsm,
                                      fax,
                                      tel_business,
                                      address,
                                      postal,
                                      city,
                                      email,
                                      notes,
                                      added_by,
                                      user_id,
                                      date_mod,
                                      taskid )
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), ?)' );
    
    db_execute($q, $data );

    break;

  case 'submit_edit':

    $contactid = get_contactid();  

    //assemble input data and do error checks
    $data = array_merge((array)(assemble_data() ), array(UID, $contactid ) );

    //edit an existing entry
    $q = db_prepare('UPDATE '.PRE.'contacts SET
                          firstname=?,
                          lastname=?,
                          company=?,
                          tel_home=?,
                          gsm=?,
                          fax=?,
                          tel_business=?,
                          address=?,
                          postal=?,
                          city=?,
                          email=?,
                          notes=?,
                          added_by=?,
                          date_mod=now()
                          WHERE id =?' );
 
    db_execute($q, $data );

    break;

  case 'submit_delete':

    $contactid = get_contactid();  

    //delete the contact
    $q = db_prepare('DELETE FROM '.PRE.'contacts WHERE id=?' );
    db_execute($q, array($contactid ) );
    break;

  //error check  
  default:  
    error('Contact submit', 'Invalid request');
    break;

}

if($taskid ) {
  header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$taskid );
  die;
}
else {
  header('Location: '.BASE_URL.'main.php?x='.X );
  die;
}

?>
