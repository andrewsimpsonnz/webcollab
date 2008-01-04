<?php
/*
  $Id$

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

  Management for contacts

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

if(GUEST ) {
  error('Contact submit', 'Guest not authorised' );
}

//edit, insert, delete ?
if( ! isset( $_REQUEST['action'] ) ){
  error('Contact submit', 'No request given' );
}

switch($_REQUEST['action'] ) {

  //insert a new contact
  case 'submit_add':
    if(empty($_POST['lastname'] ) || empty($_POST['firstname'] ) ) {
      warning($lang['contact_submit'], $lang['contact_warn'] );
    }

    if( @safe_integer($_POST['taskid']) && $_POST['taskid'] != 0 ) {

      $taskid = $_POST['taskid'];

      //check for non-existent tasks...
      if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id='.$taskid.' LIMIT 1' ), 0, 0 ) < 1 ) {
        error('Contact submit', 'Not a valid taskid' );
      }
    }
    else {
      $taskid = 0;
    }

    db_query( 'INSERT INTO '.PRE.'contacts(firstname,
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
                                      date,
                                      taskid )
                                  values(\''.safe_data($_POST['firstname']).'\',
                                  \''.safe_data($_POST['lastname']).'\',
                                  \''.safe_data($_POST['company']).'\',
                                  \''.safe_data($_POST['tel_home']).'\',
                                  \''.safe_data($_POST['gsm']).'\',
                                  \''.safe_data($_POST['fax']).'\',
                                  \''.safe_data($_POST['tel_business']).'\',
                                  \''.safe_data($_POST['address']).'\',
                                  \''.safe_data($_POST['postal']).'\',
                                  \''.safe_data($_POST['city']).'\',
                                  \''.safe_data($_POST['email']).'\',
                                  \''.safe_data_long($_POST['notes']).'\',
                                  '.UID.',
                                  '.UID.',
                                  now(),
                                  '.$taskid.')' );
    break;

  case 'submit_edit':
    //edit an existing entry
    if(empty($_POST['lastname'] ) || empty($_POST['firstname'] ) ) {
      warning($lang['contact_submit'], $lang['contact_warn'] );
    }

    if(! @safe_integer($_POST['contactid']) ) {
      error('Contact submit', 'Not a valid contactid' );
    }
    $contactid = $_POST['contactid'];

    //get taskid (used for HTTP return value below)
    $taskid = db_result(db_query('SELECT taskid FROM '.PRE.'contacts WHERE id='.$contactid.' LIMIT 1' ), 0, 0 );

    db_query('UPDATE '.PRE.'contacts SET
                  firstname=\''.safe_data($_POST['firstname']).'\',
                  lastname=\''.safe_data($_POST['lastname']).'\',
                  company=\''.safe_data($_POST['company']).'\',
                  tel_home=\''.safe_data($_POST['tel_home']).'\',
                  gsm=\''.safe_data($_POST['gsm']).'\',
                  fax=\''.safe_data($_POST['fax']).'\',
                  tel_business=\''.safe_data($_POST['tel_business']).'\',
                  address=\''.safe_data($_POST['address']).'\',
                  postal=\''.safe_data($_POST['postal']).'\',
                  city=\''.safe_data($_POST['city']).'\',
                  email=\''.safe_data($_POST['email']).'\',
                  notes=\''.safe_data_long($_POST['notes']).'\',
                  added_by='.UID.',
                  date=now()
                  WHERE id ='.$contactid );

    break;

  case 'submit_delete':

    if( ! @safe_integer($_POST['contactid']) ) {
      error('Contact submit', 'Not a valid contactid' );
    }
    $contactid = $_POST['contactid'];

    //get taskid - if any
    $taskid = db_result(db_query('SELECT taskid FROM '.PRE.'contacts WHERE id='.$contactid.' LIMIT 1' ), 0, 0 );

    //check usergroup if required
    if($taskid ) {
      require_once(BASE.'includes/usergroup_security.php' );
      usergroup_check($taskid);
    }

    //delete the contact
    @db_query('DELETE FROM '.PRE.'contacts WHERE id='.$contactid );
    break;

  //default error
  default:
    error('Contact submit', 'Invalid request');
    break;
}

if($taskid ) {
  header('Location: '.BASE_URL.'tasks.php?x='.$x.'&action=show&taskid='.$taskid );
  die;
}
else {
  header('Location: '.BASE_URL.'main.php?x='.$x );
  die;
}

?>