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

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//we need a valid contactid
if( ! isset( $_POST["contactid"] ) || ! is_numeric( $_POST["contactid"] ) )
  error("Contact engine", "Not a valid value for contactid");

$contactid = $_POST["contactid"];

//get contact information
if( ! ($row = db_fetch_array( db_query( "SELECT * FROM contacts WHERE id=".$contactid ), 0 ) ) )
  error("Database value error", "There is no information for the contact that you specified");

$content = "<BR>\n".
"<FORM method=\"POST\" action=\"contacts/contact_submit.php\">\n".
"<TABLE border=\"0\">\n".

	"<TR><TD><I>".$lang["firstname"]."</I> </TD><TD><INPUT type=\"input\" name=\"firstname\" value=\"".$row["firstname"]."\"size=\"30\"</TD></TR>\n".
	"<TR><TD><I>".$lang["lastname"]."</I> </TD><TD><INPUT type=\"input\" name=\"lastname\" value=\"".$row["lastname"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["company"]."</I> </TD><TD><INPUT type=\"input\" name=\"company\" value=\"".$row["company"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["home_phone"]."</I> </TD><TD><INPUT type=\"input\" name=\"tel_home\" value=\"".$row["tel_home"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["mobile"]."</I> </TD><TD><INPUT type=\"input\" name=\"gsm\" value=\"".$row["gsm"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["fax"]."</I> </TD><TD><INPUT type=\"input\" name=\"fax\" value=\"".$row["fax"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["bus_phone"]."</I> </TD><TD><INPUT type=\"input\" name=\"tel_business\" value=\"".$row["tel_business"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["address"]."</I> </TD><TD><INPUT type=\"input\" name=\"address\" value=\"".$row["address"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["postal"]."</I> </TD><TD><INPUT type=\"input\" name=\"postal\" value=\"".$row["postal"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["city"]."</I> </TD><TD><INPUT type=\"input\" name=\"city\" value=\"".$row["city"]."\" size=\"30\"></TD></TR>\n".
	"<TR><TD><I>".$lang["email"]."</I> </TD><TD><INPUT type=\"input\" name=\"email\" value=\"".$row["email"]."\" size=\"30\"></TD></TR>\n".
	"</TABLE><BR>\n".
	"<I>".$lang["notes"]."</I><BR><TEXTAREA  name=\"notes\" rows=\"6\" cols=\"50\">". $row["notes"] ."</TEXTAREA><BR><BR>";

//edit options
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"edit\">\n".
              "<INPUT TYPE=\"hidden\" NAME=\"contactid\" value=\"".$contactid."\">\n".
              "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">\n".
	"<INPUT TYPE=\"submit\" NAME=\"".$lang["add"]."\" value=\"Submit\">\n".
	"<INPUT TYPE=\"reset\">\n".
	"<BR><BR>\n".
	"</FORM>";


//delete options
$content .= "<FORM method=\"POST\" action=\"contacts/contact_submit.php\">\n".
	"<INPUT TYPE=\"hidden\" name=\"action\" value=\"delete\">\n".
	"<INPUT TYPE=\"hidden\" name=\"contactid\" value=\"".$contactid."\">\n".
	"<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">\n".
	"<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["del_contact"]."\" onClick=\"return confirm( '".$lang["del_javascript"]."')\">\n".
	"<BR><BR>\n".
	"</FORM>";

new_box( $lang["contact_info"], $content );

?>
