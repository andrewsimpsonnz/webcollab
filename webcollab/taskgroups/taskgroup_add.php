<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on Core APM by Dennis Fleurbaaij 2001/2002

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

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

$content =
            "<form name=\"inputform\" method=\"post\" action=\"taskgroups.php\">\n".
              "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
              "<input type=\"hidden\" name=\"action\" value=\"submit_insert\" />\n".
              "<table class=\"celldata\">\n".
                "<tr><td>".$lang["taskgroup_name"]."</td><td><input type=\"text\" name=\"name\" size=\"30\" /></td></tr>\n".
                "<tr><td>".$lang["taskgroup_description"]."</td><td><input type=\"text\"name=\"description\"size=\"30\" /></td></tr>\n".
              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang["add_taskgroup"]."\" onclick=\"return fieldCheck()\" />&nbsp;\n".
              "<input type=\"reset\"  value=\"".$lang["reset"]."\" /></p>\n".
            "</form>\n";

new_box( $lang["add_new_taskgroup"], $content );

?>