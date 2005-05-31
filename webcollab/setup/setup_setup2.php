<?php
/*
  $Id$
  
  (c) 2003 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
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

  Database creation

*/

require_once("path.php" );

require_once(BASE."setup/security_setup.php" );

create_top_setup("Setup Screen" );

$content ="<p><b>Setup - Stage 2 of 5 : Database Setup</b></p>\n";

$content .=
"<form method=\"post\" action=\"setup_handler.php\">\n".
  "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
  "<input type=\"hidden\" name=\"action\" value=\"build\" />\n".
  "<p>Please enter database details.  The database user given here must be able to create databases.<br />\n".
  "(If desired, you can change the database user to a less privileged user in the next screen entry).</p>\n".
  "<table class=\"celldata\">\n".
    "<tr><td></td><td><br />The details for your database are:</td></tr>\n".
    "<tr align=\"left\"><td><b>Your database name: </b></td><td><input type=\"text\" name=\"database_name\" size=\"30\" /></td></tr>\n".
    "<tr><td></td><td>&nbsp;</td></tr>\n".
    "<tr align=\"left\"><td><b>Database user: </b></td><td><input type=\"text\" name=\"database_user\" size=\"30\" /></td></tr>\n".
    "<tr align=\"left\"><td><b>Database password: </b></td><td><input type=\"text\" name=\"database_password\" size=\"30\" /></td></tr>\n".
    "<tr><td></td><td>&nbsp;</td></tr>\n".
    "<tr align=\"left\"><td><b>Database host: </b></td><td><input type=\"text\" name=\"database_host\" value=\"localhost\" size=\"15\" /></td></tr>\n".
    "<tr align=\"left\"><td><b>Database type:</b></td> <td>\n".
    "<select name=\"database_type\">\n".
      "<option value=\"mysql\" selected=\"selected\" >mysql</option>\n".
      "<option value=\"postgresql\">postgresql</option>\n".
      "<option value=\"mysql_innodb\">mysql with innodb</option>\n".
    "</select></td></tr>\n".
    "</table>\n".
  "<input type=\"submit\" value=\"Submit\" />\n".
"</form>\n";

new_box_setup("Setup - Stage 2 of 5", $content, "boxdata", "tablebox" );

create_bottom_setup();
?>
