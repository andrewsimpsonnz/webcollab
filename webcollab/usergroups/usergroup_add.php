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

  Add a task to the task-list

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

$content =
            "<form name=\"inputform\" method=\"POST\" action=\"usergroups/usergroup_submit.php\">\n".
              "<p><table border=\"0\">\n".
                "<tr><td>".$lang["usergroup_name"]."</td><td><input type=\"input\" name=\"name\" size=\"30\" /></td></tr>\n".
                "<tr><td>".$lang["usergroup_description"]."</td><td><input type=\"input\" name=\"description\" size=\"30\" /></td></tr>\n";

//add users
$q = db_query("SELECT fullname, id FROM users ORDER BY fullname" );
$content .=     "<tr><td>".$lang["members"]."</td><td><SELECT name=\"member[]\" multiple size=\"4\" />\n";

for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .=   "<option value=\"".$row["id"]."\">".$row["fullname"]."</option>";
}

$content .=     "</select><small><i>".$lang["select_instruct"]."</i></small></td></tr>\n".
              "</table></p>\n".
              "<input type=\"hidden\" name=\"x\" value=\"$x\" />".
              "<input type=\"hidden\" name=\"action\" value=\"insert\" />".
              "<input type=\"submit\" value=\"".$lang["add_usergroup"]."\" />&nbsp;".
              "<input type=\"reset\" value=\"".$lang["reset"]."\" />".
            "</form>\n";

new_box($lang["add_new_usergroup"], $content );

?>
