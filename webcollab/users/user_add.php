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

  Easy user manager

*/
//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once(BASE."includes/security.php" );

//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );


$content = "<center>".
           "<br />".
           "<FORM name=\"inputform\" method=\"POST\" action=\"users/user_submit.php\">".
             "<table border=\"0\">".
               "<tr><td>".$lang["login_name"].":</td><td><input type=\"text\" name=\"name\" size=\"30\"></td></tr>\n".
               "<tr><td>".$lang["full_name"].":</td><td><input type=\"text\" name=\"fullname\" size=\"30\"></td></tr>\n".
               "<tr><td>".$lang["password"].":</td><td><input type=\"password\" name=\"password\" size=\"30\"></td></tr>\n".
               "<tr><td>".$lang["email"].":</td><td><input type=\"text\" name=\"email\" size=\"30\"></td></tr>\n".
               "<tr><td>".$lang["is_admin"].":</td><td><input type=\"checkbox\" name=\"admin_rights\"></td></tr>\n";

//add user-groups
$usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );
$content .=    "<tr><td>".$lang["usergroup"].":</td><td><SELECT name=\"usergroup[]\" MULTIPLE size=\"4\">\n";
for($i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++ ) {
  $content .=  "<option value=\"".$usergroup_row["id"]."\">".$usergroup_row["name"]."</option>";
}
$content .=    "</select><small><i>".$lang["select_instruct"]."</i></small></td></tr>\n".
            "</table>".
            "<input type=\"submit\" name=\"Add\" value=\"".$lang["add"]."\">".
            "<input type=\"reset\">".
            "<input type=\"hidden\" name=\"action\" value=\"insert\">".
            "<input type=\"hidden\" name=\"x\" value=\"$x\">".
          "</form>".
          "</center>";


new_box($lang["user_info"], $content );


?>
