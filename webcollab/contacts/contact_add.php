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

//secure variables
$content = "";
$q = "";


//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

$content .= "<TABLE border=\"0\">".
            "<FORM name=\"inputform\" method=\"POST\" action=\"contacts/contact_submit.php\">".

	    "<TR><TD><I>".$lang["firstname"]."</I> </TD><TD><INPUT type=\"text\" name=\"firstname\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["lastname"]."</I> </TD><TD><INPUT type=\"text\" name=\"lastname\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["company"]."</I> </TD><TD><INPUT type=\"text\" name=\"company\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["home_phone"]."</I> </TD><TD><INPUT type=\"text\" name=\"tel_home\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["mobile"]."</I> </TD><TD><INPUT type=\"text\" name=\"gsm\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["fax"]."</I> </TD><TD><INPUT type=\"text\" name=\"fax\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["bus_phone"]."</I> </TD><TD><INPUT type=\"text\" name=\"tel_business\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["address"]."</I> </TD><TD><INPUT type=\"text\" name=\"address\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["postal"]."</I> </TD><TD><INPUT type=\"text\" name=\"postal\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["city"]."</I> </TD><TD><INPUT type=\"text\" name=\"city\" size=\"30\"></TD></TR>\n".
	    "<TR><TD><I>".$lang["email"]."</I> </TD><TD><INPUT type=\"text\" name=\"email\" size=\"30\"></A></TD></TR>\n".
	    "</TABLE><BR>\n".
	    "<I>".$lang["notes"]."</I><BR><TEXTAREA name=\"notes\" rows=\"6\" cols=\"50\"></TEXTAREA><BR><BR>\n".

            "<INPUT type=\"hidden\" name=\"x\" value=\"".$x."\">\n".
	    "<INPUT type=\"hidden\" name=\"action\" value=\"insert\">\n".

	    "<INPUT type=\"submit\" value=\"".$lang["add_contact"]."\">\n".
	    "</FORM><BR><BR>\n";

new_box( $lang["contact_info"], $content );

?>
