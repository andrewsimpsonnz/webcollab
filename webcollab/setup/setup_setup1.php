<?php
/*
  $Id$

  (c) 2003 - 2014 Andrew Simpson <andrewnz.simpson at gmail.com>

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
if(isset($_GET['lang'] ) ) {
  $locale_setup = $_GET['lang'];
}

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );
include_once(BASE.'lang/lang_setup.php' );
require_once(BASE.'setup/security_setup.php' );

//security checks
if( ! isset($WEB_CONFIG ) || $WEB_CONFIG !== 'Y' ) {
  error_setup($lang_setup['no_config'] );
  die;
}

$content = '';

create_top_setup($lang_setup['setup1_banner'] );

//warn if config file cannot be written
if( ! is_writable(BASE_CONFIG.'config.php' ) ) {
  $content .=  $lang_setup['setup1_no_permission'];
}

//input form
$content .=    "<form method=\"post\" action=\"setup_handler.php\">\n".
               "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
               "<input type=\"hidden\" name=\"action\" value=\"setup2\" />\n".
               "<input type=\"hidden\" name=\"new_db\" value=\"Y\" />\n".
               "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" /></fieldset>\n";

if(defined('DATABASE_NAME') && DATABASE_NAME != '' ) {
  $content .= $lang_setup['setup1_db_exists'];
}
else{
  $content .= $lang_setup['setup1_no_db'];
}

$content .=    "<p style=\"text-align:center\">".
               "<input type=\"submit\" value=\"".$lang_setup['yes']."\" /></p>\n".
               "</form>\n".
               "<form method=\"post\" action=\"setup_handler.php\">\n".
               "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
               "<input type=\"hidden\" name=\"action\" value=\"setup3\" />\n".
               "<input type=\"hidden\" name=\"new_db\" value=\"N\" />\n".
               "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" /></fieldset>\n".
               "<p style=\"text-align:center\">".
               "<input type=\"submit\" value=\"".$lang_setup['no']."\" /></p>\n".
               "</form>\n";

new_box_setup($lang_setup['setup1_banner'], $content, 'boxdata-small', 'head-small', 'boxstyle-normal' );
create_bottom_setup();

?>
