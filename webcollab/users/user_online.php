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

  Shows users online

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

$content = "";
$allowed[0] = 0;

//get list of common users in private usergroups that this user can view 
$q = db_query("SELECT usergroupid, userid 
                      FROM usergroups_users 
                      LEFT JOIN usergroups ON (usergroups.id=usergroups_users.usergroupid)
                      WHERE usergroups.private=1");

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  if(in_array($row[0], (array)$gid ) && ! in_array($row[1], (array)$allowed ) ) {
   $allowed[] = $row[1];
  }
}

$content .= "<table border=\"0\">\n";
//users online in last hour
$q = db_query("SELECT logins.lastaccess AS last,
            users.id AS id,
            users.fullname AS fullname,
            users.private AS private
            FROM logins
            LEFT JOIN users ON (users.id=logins.user_id)
            WHERE logins.lastaccess > ( now()-INTERVAL ".$delim."1 HOUR".$delim.")
            AND users.deleted='f'
            ORDER BY logins.lastaccess DESC" );

$content .= "<tr><td nowrap=\"nowrap\" colspan=\"2\"><b>".$lang["online"]."</b></td></tr>\n";
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++){
  
  //user test for privacy
  if($row["private"] && ( ! $admin ) && ( ! in_array($row["id"], (array)$allowed ) ) ){
    continue;
  }
  
  //show output
  $content .= "<tr><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["id"]."\">".$row["fullname"]."</a></td><td>".nicetime($row["last"])."</td></tr>\n";
}

$content .= "<tr><td colspan=\"2\">&nbsp;</td></tr>\n";
//users previously online 
$q = db_query("SELECT logins.lastaccess AS last,
            users.id AS id,
            users.fullname AS fullname,
            users.private AS private
            FROM logins
            LEFT JOIN users ON (users.id=logins.user_id)
            WHERE logins.lastaccess < ( now()-INTERVAL ".$delim."1 HOUR".$delim.")
            AND users.deleted='f'
            ORDER BY logins.lastaccess DESC" );

$content .= "<tr><td colspan=\"2\"><b>".$lang["not_online"]."</b></td></tr>\n";
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++){
  
  //user test for privacy
  if($row["private"] && ( ! $admin ) && ( ! in_array($row["id"], (array)$allowed ) ) ){
    continue;
  }
  
  //show output
  $content .= "<tr><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["id"]."\">".$row["fullname"]."</a></td><td>".nicetime($row["last"])."</td></tr>\n";

}
$content .= "</table>\n";

new_box($lang["user_activity"], $content );

?>