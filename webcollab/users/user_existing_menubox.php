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

$content = "";

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//query
$q = db_query( "SELECT * FROM users WHERE deleted='f' ORDER by fullname" );

//check for enough users
if( db_numrows($q) < 1 ) {
  new_box($lang["users"], "<SMALL>".$lang["no_users"]."</SMALL>" );
  return;
}

$content = "<TABLE border=\"0\">\n";

//show them
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<TR><TD><SMALL><A href=\"users.php?x=".$x."&action=show&userid=".$row["id"]."\">".$row["fullname"]."</A></SMALL></TD>\n";

  if( $admin == 1 ) {
    $content .= "<TD align=\"right\" nowrap><SMALL> [<A href=\"users/user_del.php?x=".$x."&userid=".$row["id"]."\">".$lang["del"]."</A>]".
                "[<A href=\"users.php?x=".$x."&userid=".$row["id"]."&action=edit\">".$lang["edit"]."</A>]</SMALL></TD></TR>";
  }

}

$content .= "</TABLE>";

//show it
new_box($lang["existing_users"], "<SMALL>".$content."</SMALL>" );

?>
