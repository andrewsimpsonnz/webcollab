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

require_once('path.php' );

require_once(BASE.'setup/security_setup.php' );

$content = '';

create_top_setup('Setup Screen' );

//warn if config file cannot be written
if( ! is_writable(CONFIG.'config.php' ) ) {
  $content .=  "<p><b>The webserver does not have permissions to write to the config file (/config/config.php).</p>".
                "<p>You can make a new database, but setup will not be able proceed and write to the config file.</p>\n".
                "<p>To allow setup to alter the config file you can either:<ul>\n".
                "<li>Change the file permissions to allow the webserver to write to the file '/config/config.php'</li>\n".
                "<li>Do a manual configuration by editing the file directly.</li>\n</ul></b></p>\n";
}

//input form
$content .=    "<form method=\"post\" action=\"setup_handler.php\">\n".
                "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
                "<input type=\"hidden\" name=\"action\" value=\"setup2\" />\n".
                "<input type=\"hidden\" name=\"new_db\" value=\"Y\" />\n";

if(defined('DATABASE_NAME') && DATABASE_NAME != '' ) {
  $content .= "<p>A database is already specified in the configuration file.  Do you wish to create a new database?</p>\n";
}
else{
  $content .= "<p>A database is required to be created for WebCollab to operate.  Do you wish to create a database now?</p>\n";
}

$content .=   "<div align=\"center\"><input type=\"submit\" value=\"Yes\" /></div>\n".
               "</form>\n".
               "<form method=\"post\" action=\"setup_handler.php\">\n".
               "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
               "<input type=\"hidden\" name=\"action\" value=\"setup3\" />\n".
               "<input type=\"hidden\" name=\"new_db\" value=\"N\" />\n".
               "<br /><div align=\"center\"><input type=\"submit\" value=\"No\" /></div>\n".
               "</form>\n";

new_box_setup( "Setup - Stage 1 of 5 : Database Configuration Option", $content, 'boxdata', 'singlebox' );
create_bottom_setup();

?>
