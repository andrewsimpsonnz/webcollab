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

include_once( BASE."includes/security.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );


$content = "<BR><FORM name=\"inputform\" method=\"POST\" action=\"users/user_submit.php\">";
$content .= "<TABLE>";
$content .= "<TR><TD>".$lang["login_name"].":</TD><TD><INPUT type=\"text\" name=\"name\" size=\"30\"></TD></TR>\n";
$content .= "<TR><TD>".$lang["full_name"].":</TD><TD><INPUT type=\"text\" name=\"fullname\" size=\"30\"></TD></TR>\n";
$content .= "<TR><TD>".$lang["password"].":</TD><TD><INPUT type=\"password\" name=\"password\" size=\"30\"></TD></TR>\n";
$content .= "<TR><TD>".$lang["email"].":</TD><TD><INPUT type=\"text\" name=\"email\" size=\"30\"></TD></TR>\n";
$content .= "<TR><TD>".$lang["is_admin"].":</TD><TD><INPUT type=\"checkbox\" name=\"admin_rights\"></TD></TR>\n";

//add user-groups
$usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );
$content .= "<TR> <TD>".$lang["usergroup"].":</TD> <TD><SELECT name=\"usergroup[]\" MULTIPLE size=\"4\">\n";
for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++) {
  $content .= "<OPTION value=\"".$usergroup_row["id"]."\">".$usergroup_row["name"]."</OPTION>";
}
$content .= "</SELECT><SMALL><I>".$lang["select_instruct"]."</I></SMALL></TD></TR>\n";


$content .= "</TABLE>";
$content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["add"]."\">";
$content .= "<INPUT TYPE=\"reset\">";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"insert\">";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">";
$content .= "</FORM>";


new_box($lang["user_info"], "<CENTER>".$content."</CENTER>" );


?>
