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

  Add a taskgroup to the taskgroup-list

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//admins only
if( $admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

$content = "<BR>\n";
$content .= "<FORM name=\"inputform\" method=\"POST\" action=\"taskgroups/taskgroup_submit.php\">\n";
$content .= "<TABLE border=\"0\">\n";
$content .= "<TR> <TD>".$lang["taskgroup_name"]."</TD> <TD><INPUT type=\"input\" name=\"name\" size=\"30\"></TD> </TR>\n";
$content .= "<TR> <TD>".$lang["taskgroup_description"]."</TD> <TD><INPUT type=\"input\" name=\"description\" size=\"30\"></TD> </TR>\n";
$content .= "</TABLE>\n";

$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\"> ";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"insert\"> ";

$content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["add_taskgroup"]."\"> ";
$content .= "<INPUT TYPE=\"reset\">";
$content .= "</FORM>\n";
$content .= "<BR><BR>\n";

new_box( $lang["add_new_taskgroup"], $content );


?>
