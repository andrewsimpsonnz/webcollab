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

  Edit task-groups

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

//secure
if(empty($_GET["taskgroupid"]) || ! is_numeric($_GET["taskgroupid"]) )
  error("Taskgroup edit", "There is no taskgroupid specified." );

$taskgroupid = intval($_GET["taskgroupid"]);

//get taskgroup information
$q = db_query("SELECT * FROM ".PRE."taskgroups WHERE id=$taskgroupid" );
$row = db_fetch_array( $q, 0 );

$content =
            "<form method=\"post\" action=\"taskgroups.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
              "<input type=\"hidden\" name=\"taskgroupid\" value=\"$taskgroupid\" />\n".
              "<input type=\"hidden\" name=\"action\" value=\"submit_edit\" /></fieldset>\n".
              "<table class=\"celldata\">\n".
                "<tr><td>".$lang["taskgroup_name"]."</td> <td><input type=\"text\" name=\"name\" value=\"".$row["name"]." \"size=\"30\" /></td></tr>\n".
                "<tr><td>".$lang["taskgroup_description"]."</td><td><input type=\"text\" name=\"description\" value=\"".$row["description"]." \"size=\"30\" /></td></tr>\n".
              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang["submit_changes"]."\" />&nbsp;\n".
              "<input type=\"reset\" value=\"".$lang["reset"]."\" /></p>\n".
            "</form>\n";

new_box($lang["edit_taskgroup"], $content );

?>