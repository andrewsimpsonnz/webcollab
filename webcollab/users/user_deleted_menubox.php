<?php
/*
  $Id$
  
  (c) 2002 -2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002

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

require_once("path.php" );
require_once(BASE."includes/security.php" );

//first check if we are admin
if($admin != 1 )
  return;


//check for deleted users
if(db_result(db_query("SELECT COUNT(*) FROM users WHERE deleted='t'" ), 0, 0 ) == 0 ) {
  new_box($lang["deleted_users"], "<small>".$lang["no_deleted_users"]."</small>", "boxmenu" );
  return;
}

//query
$q = db_query("SELECT id, fullname FROM users WHERE deleted='t' ORDER BY fullname" );

$content = "<table border=\"0\">\n";

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {
  $content .= "<tr><td><small><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["id"]."\">".$row["fullname"]."</a></small></td>\n";
  $content .= "<td align=\"right\" nowrap><font class=\"textlink\">&nbsp;[<a href=\"users/user_submit.php?x=$x&amp;action=revive&amp;userid=".$row["id"]."\">".$lang["revive"]."</a>]";

  //if this user has NO tasks owned then we can delete him forever :)
  if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE owner=".$row["id"] ), 0, 0 ) == 0 ) {
    $content .= "&nbsp;[<a href=\"users.php?x=$x&amp;action=permdel&amp;userid=".$row["id"]."\" onClick=\"return confirm( '".sprintf($lang["permdel_javascript_sprt"], $row["fullname"] )."' )\">".$lang["permdel"]." </a>]";
  }
  $content.="</font></td></tr>\n";
}

$content .= "</table>";

//show it
new_box($lang["deleted_users"], $content, "boxmenu" );

?>
