<?php
/*
  $Id$
  
  (c) 2002 -2004 Andrew Simpson <andrew.simpson at paradise.net.nz> 

  WebCollab
  ---------------------------------------
  
  Based on original  file written for Core APM by Dennis Fleurbaaij & Andrew Simpson 2001/2002
   
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

require_once("path.php" );
require_once( BASE."includes/security.php" );

if( isset($_POST["contactid"]) )
  $contactid = intval($_POST["contactid"]);

//edit, insert, delete ?
if( ! isset( $_REQUEST["action"] ) )
  error("Contact submit", "No request given" );

  switch($_REQUEST["action"] ) {

    //insert a new contact
    case "submit_add":
      if(isset($_POST["lastname"] )  && isset($_POST["lastname"] ) && strlen($_POST["lastname"] ) > 0 && strlen($_POST["firstname"] ) > 0 ){

        db_query( "INSERT INTO ".PRE."contacts(firstname,
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
                                    values('".safe_data($_POST["firstname"])."',
                                    '".safe_data($_POST["lastname"])."',
                                    '".safe_data($_POST["company"])."',
                                    '".safe_data($_POST["tel_home"])."',
                                    '".safe_data($_POST["gsm"])."',
                                    '".safe_data($_POST["fax"])."',
                                    '".safe_data($_POST["tel_business"])."',
                                    '".safe_data($_POST["address"])."',
                                    '".safe_data($_POST["postal"])."',
                                    '".safe_data($_POST["city"])."',
                                    '".safe_data($_POST["email"])."',
                                    '".safe_data_long($_POST["notes"])."',
                                    $uid,
                                    $uid,
                                    now() )" );
      }else
        warning($lang["contact_submit"], $lang["contact_warn"] );

      break;

    case "submit_edit":
     //edit an existing entry
     if(isset($_POST["lastname"] ) && isset($_POST["lastname"] ) && strlen($_POST["lastname"] ) > 0 && strlen($_POST["firstname"] ) > 0  && is_numeric($contactid ) ) {

        db_query("UPDATE ".PRE."contacts SET
                    firstname='".safe_data($_POST["firstname"])."',
                    lastname='".safe_data($_POST["lastname"])."',
                    company='".safe_data($_POST["company"])."',
                    tel_home='".safe_data($_POST["tel_home"])."',
                    gsm='".safe_data($_POST["gsm"])."',
                    fax='".safe_data($_POST["fax"])."',
                    tel_business='".safe_data($_POST["tel_business"])."',
                    address='".safe_data($_POST["address"])."',
                    postal='".safe_data($_POST["postal"])."',
                    city='".safe_data($_POST["city"])."',
                    email='".safe_data($_POST["email"])."',
                    notes='".safe_data_long($_POST["notes"])."',
                    added_by=$uid,
                    date=now()
                    WHERE id = '$contactid'");

     }else
        warning( $lang["contact_submit"], $lang["contact_warn"] );

    break;

    case "submit_delete":
        //delete the contact (if it exists) 
        if(db_result(db_query("SELECT COUNT(*) FROM ".PRE."contacts WHERE id=".$contactid ) , 0 , 0 ) )
          db_query("DELETE FROM ".PRE."contacts WHERE id=".$contactid );
      break;

    //default error
    default:
      error("Contact submit", "Invalid request");
      break;
  }

header("Location: ".$BASE_URL."main.php?x=$x" );

?>
