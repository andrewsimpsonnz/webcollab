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

  Shows the deleted users and can re-enable them

*/



//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//first check if we are admin
if( $admin != 1 )
  return;

//query
$q = db_query( "SELECT id, fullname FROM users WHERE deleted='t' ORDER BY fullname" );

//check for enough users
if( db_numrows($q) < 1 ) {
  new_box($lang["deleted_users"], "<SMALL><SMALL>".$lang["no_deleted_users"]."</SMALL></SMALL>" );
  return;
}

$content = "<TABLE border=\"0\">\n";

//show them
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<TR><TD><SMALL><A href=\"users.php?x=".$x."&action=show&userid=".$row["id"]."\">".$row["fullname"]."</A></SMALL></SMALL></TD>\n";
  $content .= "<TD align=\"right\" nowrap><SMALL><SMALL> [<A href=\"users/user_submit.php?x=".$x."&action=revive&userid=".$row["id"]."\">".$lang["revive"]."</A>]";

  //if this user has NO posts, NO tasks owned AND NO tasks created then we can delete him forever :)

  //Get the number of tasks created
  if( db_result( db_query( "SELECT COUNT(*) FROM tasks WHERE creator=".$row["id"] ), 0, 0 ) == 0 ) {

    //Get the number of tasks owned
    if( db_result(  db_query( "SELECT COUNT(*) FROM tasks WHERE owner=".$row["id"] ), 0, 0 ) == 0 ) {

      //Get the number of forum posts
      if( db_result(  db_query( "SELECT COUNT(*) FROM forum WHERE userid=".$row["id"] ), 0, 0 ) == 0 ) {
        $content .= " [<A href=\"users/user_del.php?x=".$x."&action=permdel&userid=".$row["id"]."\" onClick=\"return confirm( '".sprintf($lang["permdel_javascript_sprt"], $row["fullname"] )."' )\">".$lang["permdel"]." </A>]";
      }
    }
  }
  $content.="</SMALL></SMALL></TD></TR>\n";

}

$content .= "</TABLE>";

//show it
new_box($lang["deleted_users"], $content );

?>
