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

  The menu box that contains the user-functions

*/

//secure values
$content = "";

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//add an option to add users
if( $admin == 1 ) {
  $content .= "\n<A href=\"users.php?x=".$x."&action=manage\">".$lang["manage"]."</A>";
  $content .= "\n<BR>\n<A href=\"users.php?x=".$x."&action=add\">".$lang["add"]."</A><BR>\n";

}

$content .= "<A href=\"users.php?x=".$x."&action=showonline\">".$lang["who_online"]."</A><BR>\n";
$content .= "<A href=\"users.php?x=".$x."&action=edit&userid=".$uid."\">".$lang["edit_details"]."</A><BR>\n";
$content .= "<A href=\"users.php?x=".$x."&action=show&userid=".$uid."\">".$lang["show_details"]."</A><BR>\n";



//show it
new_box($lang["users"], $content );

?>
