<?php
/*
  $Id$

  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
  WebCollab
  ---------------------------------------
  Based on CoreAPM 2001/2002 by Dennis Fleurbaaij
  
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

require_once("path.php" );
require_once(BASE."includes/security.php" );

$content    = '';
$allowed[0] = 0;


//get list of common users in private usergroups that this user can view 
$q = db_query("SELECT ".PRE."usergroups_users.usergroupid AS usergroupid,
                      ".PRE."usergroups_users.userid AS userid 
                      FROM ".PRE."usergroups_users 
                      LEFT JOIN ".PRE."usergroups ON (".PRE."usergroups.id=".PRE."usergroups_users.usergroupid)
                      WHERE ".PRE."usergroups.private=1");

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  if(in_array($row[0], (array)$GID ) && ! in_array($row[1], (array)$allowed ) ) {
   $allowed[] = $row[1];
  }
}

//query
$q = db_query("SELECT * FROM ".PRE."users WHERE deleted='f' ORDER by fullname" );

//check for enough users
if(db_numrows($q) < 1 ) {
  new_box($lang['users'], "<small>".$lang['no_users']."</small>" );
  return;
}

$content = "<table style=\"text-align:left\">\n";

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {

  //user test for privacy
  if($row['private'] && ($row['id'] != UID ) && ( ! ADMIN ) && ( ! in_array($row['id'], (array)$allowed ) ) ){
    continue;
  }

  $content .= "<tr><td><small><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row['id']."\">".$row['fullname']."</a></small></td>";

  if(ADMIN ) {
    $content .= "<td style=\"text-align:right; white-space:nowrap\"><span class=\"textlink\"> [<a href=\"users.php?x=$x&amp;userid=".$row['id']."&amp;action=del\">".$lang['del']."</a>]".
                "[<a href=\"users.php?x=$x&amp;userid=".$row['id']."&amp;action=edit\">".$lang['edit']."</a>]</span></td>";
  }
  $content .= "</tr>\n";
}

$content .= "</table>";

//show it
new_box($lang['existing_users'], $content, "boxmenu" );

?>
