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

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not make able to continue" );

include_once( BASE."includes/security.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

//secure
if( ! ( isset($_GET["usergroupid"]) && is_numeric($_GET["usergroupid"]) ) )
  error("Usergroup edit", "Not a valid value for usergroupid." );

$usergroupid = $_GET["usergroupid"];  

//get taskgroup information
$q = db_query("SELECT * FROM usergroups WHERE id=".$usergroupid);
$row = db_fetch_array( $q, 0 );

$content = "<BR>\n";
$content .= "<FORM method=\"POST\" action=\"usergroups/usergroup_submit.php\">\n";
$content .= "<TABLE border=\"0\">\n";
$content .= "<TR> <TD>".$lang["usergroup_name"]."</TD> <TD><INPUT type=\"input\" name=\"name\" value=\"".$row["name"]."\" size=\"30\"></TD> </TR>\n";
$content .= "<TR> <TD>".$lang["usergroup_description"]."</TD> <TD><INPUT type=\"input\" name=\"description\" value=\"".$row["description"]."\" size=\"30\"></TD> </TR>\n";

//add users
$user_q = db_query( "SELECT fullname, id FROM users ORDER BY fullname" );
//$member_q = db_query( "SELECT users.id as id FROM users, usergroups_users WHERE usergroupid=".$row["id"]." AND usergroups_users.userid=users.id" );
$member_q = db_query( "SELECT users.id as id FROM users LEFT JOIN usergroups_users ON (usergroups_users.userid=users.id) WHERE usergroupid=".$row["id"] );
$content .= "<TR> <TD>".$lang["members"]."</TD> <TD><SELECT name=\"member[]\" MULTIPLE size=\"4\">\n";

for( $i=0 ; $user_row = @db_fetch_array($user_q, $i) ; $i++) {
  $content .= "<OPTION value=\"".$user_row["id"]."\"";

  @db_data_seek( $member_q ); //reset mysql internal pointer each cycle
  for( $j=0 ; $member_row = @db_fetch_array($member_q, $j) ; $j++)
    if ($member_row["id"] == $user_row["id"])
      $content .= " SELECTED";
  $content .= ">".$user_row["fullname"]."</OPTION>";
}

$content .= "</SELECT><SMALL><I>".$lang["select_instruct"]."</I></SMALL></TD></TR>\n";

$content .= "</TABLE>\n";

$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\"> ";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"usergroupid\" value=\"".$usergroupid."\"> ";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"edit\"> ";

$content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["edit_usergroup"]."\"> ";
$content .= "<INPUT TYPE=\"reset\">";
$content .= "</FORM>\n";
$content .= "<BR><BR>\n";

new_box( $lang["edit_usergroup"], $content );


?>
