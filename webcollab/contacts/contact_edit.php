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

  Edit the contacts database.

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//we need a valid contactid
if( ! isset( $_POST["contactid"] ) || ! is_numeric( $_POST["contactid"] ) )
  error("Contact engine", "Not a valid value for contactid");

$contactid = $_POST["contactid"];

//get contact information
if( ! ($row = db_fetch_array( db_query( "SELECT * FROM contacts WHERE id=".$contactid ), 0 ) ) )
  error("Database value error", "There is no information for the contact that you specified");

$content =
    "<form method=\"POST\" action=\"contacts/contact_submit.php\">\n".
    "<table border=\"0\">\n".
        "<tr><td><i>".$lang["firstname"]."</i></td><td><input type=\"text\" name=\"firstname\" value=\"".$row["firstname"]."\"size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["lastname"]."</i></td><td><input type=\"text\" name=\"lastname\" value=\"".$row["lastname"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["company"]."</i></td><td><input type=\"text\" name=\"company\" value=\"".$row["company"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["home_phone"]."</i></td><td><input type=\"text\" name=\"tel_home\" value=\"".$row["tel_home"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["mobile"]."</i></td><td><input type=\"text\" name=\"gsm\" value=\"".$row["gsm"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["fax"]."</i></td><td><input type=\"text\" name=\"fax\" value=\"".$row["fax"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["bus_phone"]."</i></td><td><input type=\"text\" name=\"tel_business\" value=\"".$row["tel_business"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["address"]."</i></td><td><input type=\"text\" name=\"address\" value=\"".$row["address"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["postal"]."</i></td><td><input type=\"text\" name=\"postal\" value=\"".$row["postal"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["city"]."</i></td><td><input type=\"text\" name=\"city\" value=\"".$row["city"]."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang["email"]."</i></td><td><input type=\"text\" name=\"email\" value=\"".$row["email"]."\" size=\"30\" /></td></tr>\n".
    "</table><br />\n".
    "<i>".$lang["notes"]."</i><br /><textarea  name=\"notes\" rows=\"6\" cols=\"50\">".$row["notes"]."</textarea><br /><br />\n";

//edit options
$content .=
      "<input type=\"hidden\" name=\"action\" value=\"edit\" />\n".
      "<input type=\"hidden\" name=\"contactid\" value=\"$contactid\" />\n".
      "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
      "<input type=\"submit\" value=\"".$lang["add"]."\" />&nbsp;\n".
      "<input type=\"reset\" value=\"".$lang["reset"]."\" />\n".
      "<br /><br />\n".
      "</form>";


//delete options
$content .=
      "<form method=\"POST\" action=\"contacts/contact_submit.php\">\n".
      "<input type=\"hidden\" name=\"action\" value=\"delete\" />\n".
      "<input type=\"hidden\" name=\"contactid\" value=\"$contactid\" />\n".
      "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
      "<input type=\"submit\" value=\"".$lang["del_contact"]."\" onClick=\"return confirm('".$lang["del_javascript"]."')\" />\n".
      "</form>";

new_box( $lang["contact_info"], $content );

?>
