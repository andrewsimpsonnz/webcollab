<?php
/*
  $Id$

  (c) 2003 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//set language
if(isset($_REQUEST['lang'] ) ) {
  $locale_setup = $_REQUEST['lang'];
}

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );
include_once(BASE.'lang/lang_setup1.php' );
require_once(BASE.'setup/security_setup.php' );

//security checks
if( ! isset($WEB_CONFIG ) || $WEB_CONFIG !== 'Y' ) {
  error_setup($lang_setup['no_config'] );
  die;
}

create_top_setup($lang_setup['setup2_banner'] );

$content =  "<p><b>".$lang_setup['setup2_banner']."</b></p>\n";

$content .= "<table style=\"width : 98%\"><tr><td>\n".
            "<span class=\"textlink\">[<a href=\"help/help_setup.php?type=setup2&amp;lang=".$locale_setup."\" onclick=\"window.open('help/help_setup.php?type=setup2&amp;lang=".$locale_setup."'); return false\"><i>".$lang_setup['help']."</a></i>]</span>\n".
            "</td></tr>\n</table>\n";

$content .= "<form method=\"post\" action=\"setup_handler.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"build\" />\n".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" /></fieldset>\n".
            "<p>".$lang_setup['setup2_db_details1']."</p>\n".
            "<table class=\"celldata\">\n".
            "<tr><td></td><td><br />".$lang_setup['setup2_db_details2']."</td></tr>\n".
            "<tr align=\"left\"><td><b>".$lang_setup['setup2_db_name']."</b></td><td><input type=\"text\" name=\"database_name\" size=\"30\" /></td></tr>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr align=\"left\"><td><b>".$lang_setup['db_user']."</b></td><td><input type=\"text\" name=\"database_user\" size=\"30\" /></td></tr>\n".
            "<tr align=\"left\"><td><b>".$lang_setup['db_password']."</b></td><td><input type=\"text\" name=\"database_password\" size=\"30\" /></td></tr>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr align=\"left\"><td><b>".$lang_setup['db_host']."</b></td><td><input type=\"text\" name=\"database_host\" value=\"localhost\" size=\"15\" /></td></tr>\n".
            "<tr align=\"left\"><td><b>".$lang_setup['db_type']."</b></td> <td>\n".
            "<select name=\"database_type\">\n".
            "<option value=\"mysql\" selected=\"selected\" >mysql</option>\n".
            "<option value=\"mysql_innodb\">mysql with innodb</option>\n".
            "<option value=\"postgresql\">postgresql</option>\n";

if(extension_loaded('mysqli' ) ) {
  $content .= "<option value=\"mysqli\">mysqli (innodb)</option>\n";
}

$content .= "</select></td></tr>\n".
            "</table>\n".
            "<input type=\"submit\" value=\"".$lang_setup['submit']."\" />\n".
            "</form>\n";

new_box_setup( $lang_setup['setup2_banner'], $content, 'boxdata', 'tablebox' );

create_bottom_setup();
?>