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

  Add a taskgroup to the database

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );


if(! valid_string($_REQUEST["action"]) )
  error("Taskgroups submit", "No action given" );

  switch($_REQUEST["action"] ) {

    //delete a taskgroup
    case "del":

      if(isset($_GET["taskgroupid"] ) && is_numeric($_GET["taskgroupid"] ) ) {

        $taskgroupid = $_GET["taskgroupid"];
        db_begin();
        //move the tasks to a non-working task-group
        @db_query("UPDATE tasks SET taskgroupid=0 WHERE taskgroupid='$taskgroupid'" );
        //delete the group
        db_query("DELETE FROM taskgroups WHERE id=$taskgroupid" );
        db_commit();
      }
      else
        error("Taskgroup submit", "Not a valid value for taskgroupid" );
    break;

    //insert a new taskgroup
    case "insert":

      if(isset($_POST["name"] ) && valid_string($_POST["name"] ) ) {

        $name        = safe_data($_POST["name"]);
        $description = safe_data($_POST["description"]);
        //check for duplicates
        if(db_result(db_query("SELECT COUNT(*) FROM taskgroups WHERE name='$name'"), 0, 0 ) > 0 )
          warning($lang["add_taskgroup"], sprintf($lang["taskgroup_dup_sprt"], $name ) );

        db_query("INSERT INTO taskgroups(name, description) VALUES ('$name', '$description')" );
      }
      else
        warning($lang["value_missing"], sprintf($lang["field_sprt"], $lang["taskgroup_name"] ) );
      break;


    //edit an existing taskgroup
    case "edit":

      if( ! isset($_POST["taskgroupid"] ) || ! is_numeric($_POST["taskgroupid"] ) )
        error("Taskgroup submit", "Not a valid value for taskgroupid" );

      if(isset($_POST["name"] ) && valid_string($_POST["name"] ) ) {

        $name        = safe_data($_POST["name"] );
        $description = safe_data($_POST["description"] );
        $taskgroupid = safe_data($_POST["taskgroupid"] );

        db_query("UPDATE taskgroups SET name='$name', description='$description' WHERE id=$taskgroupid" );
      }
      else
        warning($lang["value_missing"], sprintf($lang["field_sprt"], $lang["taskgroup_name"] ) );
    break;

    //error case
    default:
      error("Taskgroup submit", "Invalid request given" );
      break;
  }

header("location: ".BASE."taskgroups.php?x=$x&action=manage");

?>
