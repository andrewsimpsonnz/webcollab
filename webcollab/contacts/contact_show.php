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

  Show contacts.

*/

//secure variables
$content = "";
$row = "";


//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//we need a valid contactid
if( ! isset($_GET["contactid"]) || ! is_numeric($_GET["contactid"]) )
  error("Contact submission", "Not a valid value for contactid");

$contactid = $_GET["contactid"];

//get contact information
if( ! ($row = db_fetch_array( db_query( "SELECT * FROM contacts WHERE id=".$contactid ), 0 ) ) )
  error("Database value error", "There is no information for the user that you specified");


$content .= "<TABLE border=\"0\">\n".
	    "<TR><TD><I>".$lang["firstname"]."</I> </TD><TD>".$row["firstname"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["lastname"]."</I> </TD><TD>".$row["lastname"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["company"]."</I> </TD><TD>".$row["company"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["home_phone"]."</I> </TD><TD>".$row["tel_home"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["mobile"]."</I> </TD><TD>".$row["gsm"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["fax"]."</I> </TD><TD>".$row["fax"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["bus_phone"]."</I> </TD><TD>".$row["tel_business"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["address"]."</I> </TD><TD>".$row["address"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["postal"]."</I> </TD><TD>".$row["postal"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["city"]."</I> </TD><TD>".$row["city"]."</TD></TR>\n".
	    "<TR><TD><I>".$lang["email"]."</I> </TD><TD><A href=\"mailto:".$row["email"]."\">".$row["email"]."</A></TD></TR>\n".
	    "</TABLE><BR>\n".
	    "<I>".$lang["notes"]."</I><BR>".nl2br( $row["notes"] )."<BR>\n".
"<FORM method=\"POST\" action=\"contacts.php\">\n".
"<INPUT TYPE=\"hidden\" name=\"action\" value=\"edit\">\n".
"<INPUT TYPE=\"hidden\" name=\"contactid\" value=\"".$row["id"]."\">\n".
"<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">\n".
"<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["edit_contact"]."\">\n".
"<BR><BR>\n".
"</FORM>";


new_box( "Contact information", $content );

?>
