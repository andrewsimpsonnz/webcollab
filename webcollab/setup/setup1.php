<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file written in 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

require("../config.php" );
include("./screen_setup.php" );

//
//Error trap function
//

function error_setup($message ) {

  create_top_setup("Setup", 1 );
  new_box_setup("Setup error", "<br />".$message."<br /><br />", 400 );
  create_bottom_setup();
  die;

}

//security check
if(isset($DATABASE_NAME ) && $DATABASE_NAME != "" ) {
  //this is not an initial install, log in before proceeding
  require_once('../includes/security.php' );

  if($admin != 1 ) {
    error_setup("You are not authorised to do this" );
  }
}
else
  $x = "";

create_top_setup("Setup Screen", 1);

$content =
"<br />\n".
"<p><b>Setup - Stage 1 of 3 : Database Setup</b></p>\n".
"<form method=\"POST\" action=\"database_build.php\">\n".
  "<table border=\"0\">\n".
    "<tr><td></td><td><br />The details of your database</td></tr>\n".
    "<tr align=\"left\"><td><b>Your database name: </b></td><td><input type=\"text\" name=\"database_name\" size=\"30\"></td></tr>\n".
    "<tr><td></td><td><br /></td></tr>\n".
    "<tr align=\"left\"><td><b>Database user: </b></td><td><input type=\"text\" name=\"database_user\" size=\"30\"></td></tr>\n".
    "<tr align=\"left\"><td><b>Database password: </b></td><td><input type=\"text\" name=\"database_password\" size=\"30\"></td></tr>\n".
    "<tr><td></td><td><br /></td></tr>\n".
    "<tr align=\"left\"><td><b>Database host: </b></td><td><input type=\"text\" name=\"database_host\" value=\"localhost\" size=\"15\"></td></tr>\n".
    "<tr align=\"left\"><td><b>Database type:</b></td> <td>\n".
    "<select name=\"database_type\">\n".
      "<option value=\"mysql\" SELECTED >mysql</option>\n".
      "<option value=\"postgresql\">postgresql</option>\n".
      "<option value=\"mysql_innodb\">mysql with innodb</option>\n".
    "</select></td></tr>\n".
    "<tr><td><br /></td><tr>\n".
    "<tr><td colspan=\"2\">Do you want WebCollab to create the database now?  <input type=\"checkbox\" name=\"make_database\" CHECKED ></td></tr>\n".
    "</table><br />\n".
  "<input type=\"hidden\" name=\"x\" value=\"$x\">\n".
  "<input type=\"submit\" value=\"Submit\"><br /><br />\n".
"</form>\n".
"</center>\n".
"<br /><br />\n";

new_box_setup("Setup - Stage 1 of 3", $content );

create_bottom_setup();
?>
