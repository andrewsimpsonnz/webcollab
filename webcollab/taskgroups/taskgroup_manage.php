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
  $content = $lang["no_taskgroups"]."<br /><br />\n".
             "<font class=\"textlink\"><a href=\"taskgroups.php?x=$x&amp;action=add\">[".$lang["add"]."]</a></font>\n";

  new_box($lang["taskgroup_manage"], $content );
  return;
}

$content =
            "<table border=\"0\">\n".
              "<tr><th>".$lang["name"]."</th><th>".$lang["description"]."</th><th>".$lang["action"]."</th></tr>\n";

//show all taskgroups
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<tr><td>".$row["name"]."</td><td>".$row["description"]." </td>".
              "<td><font class=\"textlink\"><a href=\"taskgroups/taskgroup_submit.php?x=$x&amp;action=del&taskgroupid=".$row["id"]."\" onClick=\"return confirm( '".$lang["confirm_del"]."')\">[".$lang["del"]."]</a></font>&nbsp;".
              "<td><font class=\"textlink\"><a href=\"taskgroups.php?x=$x&amp;action=edit&amp;taskgroupid=".$row["id"]."\">[".$lang["edit"]."]</a></font></td></tr>";

}

$content .=   "</table><br />\n".
            "<font class=\"textlink\">[<a href=\"taskgroups.php?x=$x&amp;action=add\">".$lang["add"]."</a>]</font>";

new_box( $lang["manage_taskgroups"], $content, "boxdata2" );

?>
