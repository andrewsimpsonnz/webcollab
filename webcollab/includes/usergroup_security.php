<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson from earlier work by Dennis Fleurbaaij.

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

  Check the usergroup security

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once(BASE."includes/security.php" );

//set default
$USERGROUP_MEMBER = 0;

//get the tasks' security info
if( ! ($q = db_query("SELECT usergroupid, globalaccess FROM tasks WHERE id=$taskid" ) ) )
  error("Usergroup security", "There was an error in the data query." );

//get the data
if( ! ($row = db_fetch_num($q, 0 ) ) )
  error("Usergroup security", "There was an error in fetching the permission data." );

//admins can go free the rest is checked
if( ($admin != 1) && ($row[0] != 0 ) && ($row[1]=='f' ) ) {

  //check if the user has a matching group
  $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=$uid" );
  for($i=0 ; $usergroup_row = @db_fetch_num($usergroup_q, $i ) ; $i++ ) {

    //found it
    if( $row[0] == $usergroup_row[0] ) {
      $USERGROUP_MEMBER = 1;
      break;
    }
  }
}
else{
  //this case when admin, no usergroup, or globalaccess is allowed
  $USERGROUP_MEMBER = 1;
}

if( $USERGROUP_MEMBER == 0 )
    warning($lang["access_denied"], $lang["private_usergroup"] );

?>
