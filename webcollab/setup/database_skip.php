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
require_once('../includes/security.php' );

if($admin != 1 ) {
  error_setup("You are not authorised to do this" );
}

create_top_setup("Setup Screen", 1);

$content =  "<br />\n".
            "<form method=\"POST\" action=\"setup2.php\">".
            "<table border=\"0\">".
            "<input type=\"hidden\" name=\"x\" value=\"$x\">\n".
            "A database is already specified in the configuration file.  The database creation step is therefore being skipped.<br /><br />\n".
            "To create a new database:<br />\n".
            'Manually change $DATABASE_NAME in config.php to:<br />'."\n".
            '$DATABASE_NAME = "".<br /><br />'."\n".
            "<input type=\"hidden\" name=\"action\" value=\"insert\">\n".
            "<center><input type=\"submit\" value=\"Continue\"></center>\n".
            "</form><br /><br />\n";

new_box_setup( "Setup - Stage 1 of 3 : Skipping Database Configuration", $content, 400 );
create_bottom_setup();

?>