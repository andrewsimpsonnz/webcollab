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

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

//get the info
$q = db_query("SELECT * FROM usergroups ORDER BY name" );

//nothing here yet
if(db_numrows($q) == 0 ) {
  $content = "<p>".$lang["no_usergroups"]."</p>\n".
             "<font class=\"textlink\"><a href=\"usergroups.php?x=$x&amp;action=add\">[".$lang["add"]."]</a></font>\n";

  new_box($lang["usergroup_manage"], $content );
  return;
}

$content =
             "<p><table border=\"0\">\n".
               "<tr><th>".$lang["name"]."</th><th>".$lang["description"]."</th><th>".$lang["action"]."</th></tr>\n";

//show all usergroups
for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {
  $content .= "<tr><td>".$row["name"]."</td><td>".$row["description"]." </td>".
              "<td><font class=\"textlink\"><a href=\"usergroups/usergroup_submit.php?x=$x&amp;action=del&amp;usergroupid=".$row["id"]."\" onClick=\"return confirm( '".$lang["confirm_del"]."')\">[".$lang["del"]."]</a></font>&nbsp;".
                "<font class=\"textlink\"><a href=\"usergroups.php?x=".$x."&action=edit&usergroupid=".$row["id"]."\">[".$lang["edit"]."]</a></font></td></tr>";

  //get users from that group
  $usersq = db_query("SELECT fullname,
                            users.id AS id
                            FROM users
                            LEFT JOIN usergroups_users ON (usergroups_users.userid=users.id)
                            WHERE usergroupid=".$row["id"]."
                            AND deleted='f'
                            ORDER BY fullname" );

  for($j=0 ; $userrow = @db_fetch_array($usersq, $j ) ; $j++ ) {
    $content .= "<tr><td colspan=\"3\" align=\"left\"><small>(<a href=\"users.php?x=$x&amp;action=show&userid=".$userrow["id"]."\">".$userrow["fullname"]."</a>)</small></td></tr>";
  }
  $content .=   "<tr><td colspan=\"3\" align=\"left\">&nbsp;</td></tr>";

}

$content .=   "</table></p>\n".
              "<font class=\"textlink\">[<a href=\"usergroups.php?x=".$x."&amp;action=add\">".$lang["add"]."</a>]</font>";

new_box($lang["manage_usergroups"], $content, "boxdata2" );

?>
