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

  Edit taskgroups

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

//secure
if( ! (isset($_GET["usergroupid"] ) && is_numeric($_GET["usergroupid"] ) ) )
  error("Usergroup edit", "Not a valid value for usergroupid." );

$usergroupid = $_GET["usergroupid"];

//get taskgroup information
$q = db_query("SELECT * FROM usergroups WHERE id=$usergroupid" );
$row = db_fetch_array( $q, 0 );

$content = "<br />\n".
           "<form method=\"POST\" action=\"usergroups/usergroup_submit.php\">\n".
             "<table border=\"0\">\n".
               "<tr><td>".$lang["usergroup_name"]."</td><td><input type=\"input\" name=\"name\" value=\"".$row["name"]."\" size=\"30\"></td></tr>\n".
               "<tr><td>".$lang["usergroup_description"]."</td><td><input type=\"input\" name=\"description\" value=\"".$row["description"]."\" size=\"30\"></td></tr>\n";

//add users
$user_q = db_query("SELECT fullname, id FROM users ORDER BY fullname" );
$member_q = db_query("SELECT users.id AS id
                            FROM users
                            LEFT JOIN usergroups_users ON (usergroups_users.userid=users.id)
                            WHERE usergroupid=".$row["id"] );

$content .=    "<tr><td>".$lang["members"]."</td><td><select name=\"member[]\" multiple size=\"4\">\n";

for( $i=0 ; $user_row = @db_fetch_array($user_q, $i ) ; $i++ ) {
  $content .= "<option value=\"".$user_row["id"]."\"";

  @db_data_seek($member_q ); //reset mysql internal pointer each cycle
  for($j=0 ; $member_row = @db_fetch_array($member_q, $j ) ; $j++ )
    if ($member_row["id"] == $user_row["id"] )
      $content .= " SELECTED";
  $content .= ">".$user_row["fullname"]."</option>";
}

$content .=    "</select><small><i>".$lang["select_instruct"]."</i></small></td></tr>\n".
             "</table>\n".
             "<input type=\"hidden\" name=\"x\" value=\"$x\"> ".
             "<input type=\"hidden\" name=\"usergroupid\" value=\"$usergroupid\"> ".
             "<input type=\"hidden\" name=\"action\" value=\"edit\"> ".
             "<input type=\"submit\" name=\"Add\" value=\"".$lang["edit_usergroup"]."\"> ".
             "<input type=\"reset\">".
           "</form>\n".
           "<br /><br />\n";

new_box( $lang["edit_usergroup"], $content );

?>
