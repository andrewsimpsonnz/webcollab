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

  Add a contact to the contact's lists

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

//secure variables
$content = "";
$q = "";

$content .=
        "<form name=\"inputform\" method=\"POST\" action=\"contacts/contact_submit.php\">\n".
        "<p><table border=\"0\">\n".
            "<tr><td><i>".$lang["firstname"]."</i></td><td><input type=\"text\" name=\"firstname\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["lastname"]."</i></td><td><input type=\"text\" name=\"lastname\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["company"]."</i></td><td><input type=\"text\" name=\"company\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["home_phone"]."</i></td><td><input type=\"text\" name=\"tel_home\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["mobile"]."</i></td><td><input type=\"text\" name=\"gsm\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["bus_phone"]."</i></td><td><input type=\"text\" name=\"tel_business\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["fax"]."</i></td><td><input type=\"text\" name=\"fax\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["address"]."</i></td><td><input type=\"text\" name=\"address\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["postal"]."</i></td><td><input type=\"text\" name=\"postal\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["city"]."</i></td><td><input type=\"text\" name=\"city\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang["email"]."</i></td><td><input type=\"text\" name=\"email\" size=\"30\" /></td></tr>\n".
          "</table></p>\n".
          "<p><i>".$lang["notes"]."</i><br /><textarea name=\"notes\" rows=\"6\" cols=\"50\"></textarea></p>\n".
          "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
          "<input type=\"hidden\" name=\"action\" value=\"insert\" />\n".
          "<input type=\"submit\" value=\"".$lang["add_contact"]."\" />\n".
          "</form>\n";

new_box( $lang["contact_info"], $content );

?>
