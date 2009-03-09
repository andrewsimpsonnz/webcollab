<?php
/*
  $Id: setup_setup5.php 1737 2008-01-24 08:16:45Z andrewsimpson $

  (c) 2008 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Enter the new admin username and password

*/

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );

//set language
$locale_setup = LOCALE;

include_once(BASE.'lang/lang.php' );
include_once(BASE.'lang/lang_setup2.php' );
require_once(BASE.'setup/security_setup.php' );

create_top_setup($lang['setup6_banner'], 1 );

$content  = '';

$content .= "<form method=\"post\" action=\"setup_handler.php\" onsubmit=\"return fieldCheck()\">".
            "<fieldset><input type=\"hidden\" name=\"action\" value=\"setup7\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
            "<input type=\"hidden\" name=\"new_config\" value=\"Y\" />\n".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" /></fieldset>\n".
            "<table border=\"0\">";

//user settings
$content .= "<tr><td></td><td><br /><b><u>".$lang['setup6_title']."</u></b></td></tr>\n".
            "<tr><td></td><td><br />".$lang['setup6_admin_user1']."</td></tr>\n".
            "<tr><th>".$lang['setup6_admin_user2']."</th><td><input type=\"text\" id=\"user\" name=\"admin_user\" value=\"admin\" size=\"20\" /></td></tr>\n";

$content .= "<tr><td></td><td><br />".$lang['setup6_admin_pass1']."</td></tr>\n".
            "<tr><th>".$lang['setup6_admin_pass2']."</th><td><input type=\"password\" id=\"password\" name=\"admin_password\" value=\"\" size=\"20\" /></td></tr>\n";

$content .= "<tr><td></td><td><br />".$lang['setup6_admin_check']."</td></tr>\n".
            "<tr><th>".$lang['setup6_admin_pass2']."</th><td><input type=\"password\" id=\"password_check\" name=\"admin_password_check\" value=\"\" size=\"20\" /></td></tr>\n";

if(USE_EMAIL == 'Y' ) {

  //email settings
  $content .= "<tr><td></td><td><br />".$lang['setup6_email1']."</td></tr>\n".
              "<tr><th>".$lang['setup6_email2']."</th><td><input type=\"text\" id=\"email\" name=\"admin_email\" value=\"\" size=\"30\" /></td></tr>\n";
}

$content .= "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr><td></td><td><input type=\"submit\" value=\"".$lang['submit']."\" /></td></tr>\n".
            "</table>\n".
            "</form>\n";

new_box_setup($lang['setup6_banner'], $content, 'boxdata', 'tablebox' );

create_bottom_setup();

?>