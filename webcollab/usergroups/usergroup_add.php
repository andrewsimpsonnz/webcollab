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

  Add a task to the task-list

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

$content =
            "<form name=\"inputform\" method=\"POST\" action=\"usergroups.php\">\n".
              "<input type=\"hidden\" name=\"x\" value=\"$x\" />".
              "<input type=\"hidden\" name=\"action\" value=\"submit_insert\" />".
              "<p><table border=\"0\">\n".
                "<tr><td>".$lang["usergroup_name"]."</td><td><input type=\"input\" name=\"name\" size=\"30\" /></td></tr>\n".
                "<tr><td>".$lang["usergroup_description"]."</td><td><input type=\"input\" name=\"description\" size=\"30\" /></td></tr>\n";

//add users
$q = db_query("SELECT fullname, id FROM users WHERE deleted='f' ORDER BY fullname" );
$content .=     "<tr><td>".$lang["members"]."</td><td><select name=\"member[]\" multiple=\"multiple\" size=\"4\">\n";

for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .=   "<option value=\"".$row["id"]."\">".$row["fullname"]."</option>\n";
}

$content .=     "</select><small><i>".$lang["select_instruct"]."</i></small></td></tr>\n".
              "</table></p>\n".
              "<p><input type=\"submit\" value=\"".$lang["add_usergroup"]."\" onclick=\"return fieldCheck()\" />&nbsp;".
              "<input type=\"reset\" value=\"".$lang["reset"]."\" /></p>\n".
            "</form>\n";

new_box($lang["add_new_usergroup"], $content );

?>
