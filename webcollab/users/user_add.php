<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Add users

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if(! ADMIN )
  error("Unauthorised access", "This function is for admins only." );


$content =
           "<form method=\"post\" action=\"users.php\">\n".
             "<fieldset><input type=\"hidden\" name=\"action\" value=\"submit_insert\" />\n".
             "<input type=\"hidden\" name=\"x\" value=\"$x\" /></fieldset>\n".
             "<table class=\"celldata\">\n".
               "<tr><td>".$lang['login_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" size=\"30\" /></td></tr>\n".
               "<tr><td>".$lang['full_name'].":</td><td><input type=\"text\" name=\"fullname\" size=\"30\" /></td></tr>\n".
               "<tr><td>".$lang['password'].":</td><td><input type=\"password\" name=\"password\" size=\"30\" /></td></tr>\n".
               "<tr><td>".$lang['email'].":</td><td><input type=\"text\" name=\"email\" size=\"30\" /></td></tr>\n".
               "<tr><td>&nbsp;</td></tr>\n".
               "<tr><td><label for=\"private\">".$lang['private_user'].":</label></td><td><input type=\"checkbox\" name=\"private_user\" id=\"private\" /></td></tr>\n".
               "<tr><td>&nbsp;</td></tr>\n".
               "<tr><td><label for=\"normal\">".$lang['normal_user'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"normal\" id=\"normal\" checked=\"checked\" /></td></tr>\n".
               "<tr><td><label for=\"admin\">".$lang['is_admin'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"admin\" id=\"admin\" /></td></tr>\n".
               "<tr><td><label for=\"guest\">".$lang['is_guest'].":</label></td><td><input type=\"radio\" name=\user_type\" value=\"guest\" id=\"guest\" /></td></tr>\n".
               "<tr><td>&nbsp;</td></tr>\n";
               
//add user-groups
$q = db_query("SELECT name, id FROM ".PRE."usergroups ORDER BY name" );

$content .=    "<tr><td>".$lang['usergroup'].":</td><td><select name=\"usergroup[]\" multiple=\"multiple\" size=\"4\">\n";

for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {
  $content .=  "<option value=\"".$row['id']."\">".$row['name']."</option>";
}

$content .=    "</select><small><i>".$lang['select_instruct']."</i></small></td></tr>\n".
            "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['add']."\" />&nbsp;".
            "<input type=\"reset\" value=\"".$lang['reset']."\" /></p>\n".
          "</form>";

new_box($lang['user_info'], $content );

?>