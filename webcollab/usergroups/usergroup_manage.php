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

  Manage the user-groups

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."config.php" );
include_once( BASE."includes/database.php" );
include_once( BASE."includes/common.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

//get the info
$q = db_query("SELECT * FROM usergroups ORDER BY name");

//nothing here yet
if( db_numrows($q) == 0 ) {
  new_box($lang["usergroup_manage"], $lang["no_usergroups"]."<BR><A href=\"".$BASE_URL."usergroups.php?x=".$x."&action=add\">[".$lang["add"]."]</A>");
  return;
}

$content = "<BR>\n";
$content .= "<TABLE border=\"0\">\n";
$content .= "<TR><TH>".$lang["name"]."</TH><TH>".$lang["description"]."</TH><TH>".$lang["action"]."</TH></TR>\n";

//show all usergroups
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<TR><TD>".$row["name"]." </TD><TD>".$row["description"]." </TD>".
              "<TD><A href=\"".$BASE_URL."usergroups/usergroup_submit.php?x=".$x."&action=del&usergroupid=".$row["id"]."\" onClick=\"return confirm( '".$lang["confirm_del"]."')\">[Del]</A> ".
	      "<A href=\"".$BASE_URL."usergroups.php?x=".$x."&action=edit&usergroupid=".$row["id"]."\">[Edit]</A></TD></TR>";

  //get users from that group
  $usersq = db_query("SELECT fullname,
                             users.id AS id
		             FROM users,
		             usergroups_users
		             WHERE usergroupid=".$row["id"]."
		             AND usergroups_users.userid=users.id
		             ORDER BY fullname");
  for( $j=0 ; $userrow = @db_fetch_array($usersq, $j ) ; $j++) {
    $content .= "<TR><TD colspan=\"3\" align=\"left\"><SMALL>(<A href=\"".$BASE_URL."users.php?x=".$x."&action=show&userid=".$userrow["id"]."\">".$userrow["fullname"]."</A>)</SMALL></TD></TR>";
  }
  $content .= "<TR><TD colspan=\"3\" align=\"left\">&nbsp;</TD></TR>";



}

$content .= "</TABLE><BR>\n";
$content .= "[<A href=\"".$BASE_URL."usergroups.php?x=".$x."&action=add\">".$lang["add"]."</A>]";
$content .= "<BR><BR>\n";


new_box( $lang["manage_usergroups"], $content );


?>
