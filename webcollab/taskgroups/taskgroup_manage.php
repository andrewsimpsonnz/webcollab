<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
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

  Manage the task-groups

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

//get the info
$q = db_query("SELECT * FROM taskgroups ORDER BY name" );

//nothing here yet
if(db_numrows($q) == 0 ) {
  $content = "<p>".$lang["no_taskgroups"]."</p>\n".
             "<font class=\"textlink\"><a href=\"taskgroups.php?x=$x&amp;action=add\">[".$lang["add"]."]</a></font>\n";

  new_box($lang["taskgroup_manage"], $content );
  return;
}

$content =
            "<table class=\"celldata\">\n".
              "<tr><th>".$lang["name"]."</th><th>".$lang["description"]."</th><th>".$lang["action"]."</th></tr>\n";

//show all taskgroups
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<tr><td>".$row["name"]."</td><td>".$row["description"]." </td>".
              "<td><font class=\"textlink\"><a href=\"taskgroups.php?x=$x&amp;action=submit_del&taskgroupid=".$row["id"]."\" onclick=\"return confirm( '".$lang["confirm_del_javascript"]."')\">[".$lang["del"]."]</a></font>&nbsp;".
              "<font class=\"textlink\"><a href=\"taskgroups.php?x=$x&amp;action=edit&amp;taskgroupid=".$row["id"]."\">[".$lang["edit"]."]</a></font></td></tr>";

}

$content .=   "</table>\n".
            "<font class=\"textlink\">[<a href=\"taskgroups.php?x=$x&amp;action=add\">".$lang["add"]."</a>]</font>";

new_box( $lang["manage_taskgroups"], $content, "boxdata2" );

?>
