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

$content .= "<table border=\"0\">\n";
$q = db_query("SELECT logins.lastaccess AS last,
            users.id AS id,
            users.fullname AS fullname
            FROM logins
            LEFT JOIN users ON (users.id=logins.user_id)
            WHERE logins.lastaccess > ( now()-INTERVAL ".$delim."1 HOUR".$delim.")
            AND users.deleted='f'
            ORDER BY logins.lastaccess DESC" );

$content .= "<tr><td nowrap colspan=\"2\"><b>".$lang["online"]."</b></td></tr>\n";
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++)
    $content .= "<tr><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["id"]."\">".$row["fullname"]."</a></td><td>".nicetime($row["last"])."</td></tr>\n";

$content .= "<tr><td colspan=\"2\">&nbsp;</td></tr>\n";
$q = db_query("SELECT logins.lastaccess AS last,
            users.id AS id,
            users.fullname AS fullname
            FROM logins
            LEFT JOIN users ON (users.id=logins.user_id)
            WHERE logins.lastaccess < ( now()-INTERVAL ".$delim."1 HOUR".$delim.")
            AND users.deleted='f'
            ORDER BY logins.lastaccess DESC" );

$content .= "<tr><td colspan=\"2\"><b>".$lang["not_online"]."</b></td></tr>\n";
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++){
    $content .= "<tr><td><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["id"]."\">".$row["fullname"]."</a></td><td>".nicetime($row["last"])."</td></tr>\n";
}
$content .= "</table>\n";

new_box($lang["user_activity"], $content );

?>
