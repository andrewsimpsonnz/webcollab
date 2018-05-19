<?php
/*
  $Id: setup_setup5.php 1737 2008-01-24 08:16:45Z andrewsimpson $

  (c) 2008 - 2014 Andrew Simpson <andrewnz.simpson at gmail.com>

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

require_once(BASE.'setup/security_setup.php' );
include_once(BASE.'lang/lang_setup.php' );

create_top_setup($lang_setup['setup6_banner'], 1 );

$content  = '';

$content .= "<form method=\"post\" action=\"setup_handler.php\">".
            "<fieldset><input type=\"hidden\" name=\"action\" value=\"setup7\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"new_config\" value=\"Y\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert1\" value=\"".$lang_setup['setup_js_alert_field']."\" />\n".
            "<input type=\"hidden\" id=\"pass_match\" name=\"alert2\" value=\"".$lang_setup['setup_js_pass_match']."\" />\n".
            "<input type=\"hidden\" id=\"alert_email\" name=\"alert3\" value=\"".$lang_setup['setup_js_email_miss']."\" /></fieldset>\n".
            "<table class=\"celldata\">\n";

//user settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup6_title']."</th></tr>\n".
            "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup6_admin_user1']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup6_admin_user2']."</th>".
            "<td><input type=\"text\" id=\"user\" name=\"admin_user\" value=\"admin\" class=\"size\" /></td></tr>\n";

$content .= "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup6_admin_pass1']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup6_admin_pass2']."</th>".
            "<td><input type=\"password\" id=\"password\" name=\"admin_password\" value=\"\" class=\"size\" /></td></tr>\n";

$content .= "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup6_admin_check']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup6_admin_pass2']."</th>".
            "<td><input type=\"password\" id=\"password_check\" name=\"admin_password_check\" value=\"\" class=\"size\" /></td></tr>\n";

if(USE_EMAIL == 'Y' ) {

  //email settings
  $content .= "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup6_email1']."</td></tr>\n".
              "<tr class=\"grouplist\"><th>".$lang_setup['setup6_email2']."</th>".
              "<td><input type=\"text\" id=\"email\" name=\"admin_email\" value=\"\" class=\"size\" /></td></tr>\n";

  $content .= "<tr class=\"grouplist\"><td></td><td><input type=\"submit\" value=\"".$lang_setup['submit']."\" ".
              "onclick=\"return userCheck('password_check', 'password', 'user', 'email')\"/></td></tr>\n";

}
else {

  $content .= "<tr class=\"grouplist\"><td></td><td><input type=\"submit\" value=\"".$lang_setup['submit']."\" ".
              "onclick=\"return userCheck('password_check', 'password', 'user')\"/></td></tr>\n";
}

$content .=   "</table>\n".
              "</form>\n";

new_box_setup($lang_setup['setup6_banner'], $content, 'boxdata-normal', 'head-normal', 'boxstyle-normal' );

create_bottom_setup();

?>