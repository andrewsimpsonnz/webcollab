<?php
/*
  $Id$
  
  (c) 2002 -2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

  WebCollab
  ---------------------------------------
  
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002
  
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

$content =
           "<form method=\"POST\" action=\"usergroups.php\">\n".
             "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
             "<input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
             "<input type=\"hidden\" name=\"usergroupid\" value=\"$usergroupid\" />\n".
             "<p><table border=\"0\">\n".
               "<tr><td>".$lang["usergroup_name"]."</td><td><input type=\"input\" name=\"name\" value=\"".$row["name"]."\" size=\"30\" /></td></tr>\n".
               "<tr><td>".$lang["usergroup_description"]."</td><td><input type=\"input\" name=\"description\" value=\"".$row["description"]."\" size=\"30\" /></td></tr>\n";

//add users
$user_q = db_query("SELECT fullname, id FROM users WHERE deleted='f' ORDER BY fullname" );
$member_q = db_query("SELECT users.id AS id
                            FROM users
                            LEFT JOIN usergroups_users ON (usergroups_users.userid=users.id)
                            WHERE usergroupid=".$row["id"]."
                            AND deleted='f'"  );

$content .=    "<tr><td>".$lang["members"]."</td><td><select name=\"member[]\" multiple=\"multiple\" size=\"4\">\n";

for( $i=0 ; $user_row = @db_fetch_array($user_q, $i ) ; $i++ ) {
  $content .= "<option value=\"".$user_row["id"]."\"";

  @db_data_seek($member_q ); //reset mysql internal pointer each cycle
  for($j=0 ; $member_row = @db_fetch_array($member_q, $j ) ; $j++ )
    if ($member_row["id"] == $user_row["id"] )
      $content .= " SELECTED";
  $content .= ">".$user_row["fullname"]."</option>\n";
}

$content .=    "</select><small><i>".$lang["select_instruct"]."</i></small></td></tr>\n".
             "</table></p>\n".
             "<p><input type=\"submit\" value=\"".$lang["submit_changes"]."\" />&nbsp;".
             "<input type=\"reset\" value=\"".$lang["reset"]."\" /></p>\n".
           "</form>\n";

new_box( $lang["edit_usergroup"], $content );

?>
