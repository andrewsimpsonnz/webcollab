<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Add a usergroup to the database

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );


if( valid_string($_REQUEST["action"]) ) {

  switch( $_REQUEST["action"] ) {

    //delete a usergroup
    case "del":

      if( isset( $_GET["usergroupid"] ) && is_numeric( $_GET["usergroupid"] ) ) {

        $usergroupid = $_GET["usergroupid"];

	db_begin();

        //delete the private forum posts for this usergroup
        db_query("DELETE FROM forum WHERE usergroupid=".$usergroupid );

        //delete the user entries out of usergroups_users
        db_query("DELETE FROM usergroups_users WHERE usergroupid=".$usergroupid );

        //delete the group
        db_query("DELETE FROM usergroups WHERE id=".$usergroupid );

        //update the tasks table by resetting the deleted usergroup id to zero
        db_query( "UPDATE tasks SET usergroupid=0 WHERE usergroupid=".$usergroupid );
	db_commit();
      }
      else
        error( "Usergroup submit", "Not a valid value for usergroupid" );

      break;


    //insert a new usergroup
    case "insert":

      if( isset($_POST["name"]) && valid_string($_POST["name"]) ) {

        $name        = safe_data($_POST["name"]);
        $description = safe_data($_POST["description"]);

        //check for duplicates
        if( db_result( db_query("SELECT COUNT(*) FROM usergroups WHERE name='".$name."'"), 0, 0 ) > 0 )
	  warning($lang["add_usergroup"], sprintf($lang["usergroup_dup_sprt"], $name) );

        //begin transaction
	db_begin();
	$q = db_query( "INSERT INTO usergroups(  name, description)
	           VALUES ('".$name."', '".$description."')");
          if( isset($_POST["member"]) ) {

            // get the usergroupid
	    $last_oid = db_lastoid( $q );
            $usergroupid = db_result( db_query( "SELECT id FROM usergroups WHERE ".$last_insert."=".$last_oid ), 0, 0 );

            (array)$member = $_POST["member"];

            for( $i=0 ; $i < sizeof($member) ; $i++ ) {
              if( isset($member[$i]) && is_numeric($member[$i]) ) {
                db_query("INSERT INTO usergroups_users(userid, usergroupid) VALUES(".$member[$i].", ".$usergroupid.")" );
              }
          }
        }
      //transaction complete
      db_commit();
      }
      else
        warning( $lang["value_missing"], sprintf( $lang["field_sprt"], $lang["usergroup_name"] ) );
      break;


    //edit a usergroup
    case "edit":

      if( ! isset($_POST["usergroupid"]) || ! is_numeric($_POST["usergroupid"]) )
        error( "Usergroup submit", "Not a valid value for usergroupid" );
	
      if( isset($_POST["name"]) && valid_string($_POST["name"]) ) {

         $name = safe_data($_POST["name"]);
         $description = safe_data($_POST["description"]);
         $usergroupid = safe_data($_POST["usergroupid"]);

	//begin transaction
	db_begin();
        // do the update
        db_query( "UPDATE usergroups SET name='".$name."', description='".$description."' WHERE id=".$usergroupid);

        // clean out existing usergroups_users then update with the new
        db_query( "DELETE FROM usergroups_users WHERE usergroupid=".$usergroupid);

          if( isset($_POST["member"]) ) {

            (array)$member = $_POST["member"];

            for( $i=0 ; $i < sizeof($member) ; $i++ ) {
             if( isset($member[$i]) && is_numeric( $member[$i] ) ) {
               db_query("INSERT INTO usergroups_users(userid, usergroupid) VALUES(".$member[$i].", ".$usergroupid.")" );
               }
            }

          }
        //transaction complete
        db_commit();
      }
      else
        warning( $lang["value_missing"], sprintf( $lang["field_sprt"], $lang["usergroup_name"] ) );
      break;



    //error case
    default:
      error("Usergroup submit", "Invalid request given");
      break;
  }
}
else
  error("Usergroups submit", "No action given" );

header("location: ".BASE."usergroups.php?x=".$x."&action=manage");

?>
