<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz> 

  WebCollab
  ---------------------------------------
  
  Based on original file written for Core APM by Dennis Fleurbaaij & Andrew Simpson 2001/2002
   
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

require_once('path.php' );
require_once( BASE.'includes/security.php' );

if(GUEST ){
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
                                      date )
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
                                  now() )' );
    break;

  case 'submit_edit':
    //edit an existing entry
    if(empty($_POST['lastname'] ) || empty($_POST['firstname'] ) ) {
      warning($lang['contact_submit'], $lang['contact_warn'] );
    }
    if(empty($_POST['contactid']) || ! is_numeric($_POST['contactid'] ) ) {
      error('Contact submit', 'Not a valid contactid' );
    }
    $contactid = intval($_POST['contactid']);
 
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
                  WHERE id = \''.$contactid.'\')';

  break;

  case 'submit_delete':
      
    if(empty($_POST['contactid']) || ! is_numeric($_POST['contactid'] ) ) {
      error('Contact submit', 'Not a valid contactid' );
    }
    $contactid = intval($_POST['contactid']);

    //delete the contact 
    @db_query('DELETE FROM '.PRE.'contacts WHERE id='.$contactid );
    break;

  //default error
  default:
    error('Contact submit', 'Invalid request');
    break;
}

header('Location: '.BASE_URL.'main.php?x='.$x );

?>