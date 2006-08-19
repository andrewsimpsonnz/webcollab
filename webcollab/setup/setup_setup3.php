<?php
/*
  $Id$

  (c) 2003 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Setup selection screen

*/

require_once('path.php' );

require_once(BASE.'setup/security_setup.php' );

//check config can be written
if( ! is_writeable(BASE_CONFIG.'config.php' ) ) {
  error_setup('Configuration file needs to be made writeable by the webserver to proceed.');
}

if(isset($_POST['new_db']) && $_POST['new_db'] === 'N' ) {
  $new_db = 'N';
}
else {
  $new_db = 'Y';
}

if(isset($_POST['edit']) && $_POST['edit'] === 'Y' ) {
  $edit = 'Y';
}
else {
  $edit = 'N';
}

$file_path  = realpath(dirname(__FILE__ ).'/..' )."/files/filebase";
$server_url = str_replace("setup_handler.php", "",  "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] );

if(defined('DATABASE_NAME' ) && (DATABASE_NAME != '') && ($new_db === 'N' ) && ($edit === 'N') ) {
  //this is an existing install and no new database has been created
  $db_name           = DATABASE_NAME;
  $db_user           = DATABASE_USER;
  $db_password       = DATABASE_PASSWORD;
  $db_type           = DATABASE_TYPE;
  $db_host           = DATABASE_HOST;
  $base_url          = (BASE_URL != '' )          ? BASE_URL          : $server_url;
  $manager_name      = (MANAGER_NAME != '' )      ? MANAGER_NAME      : 'WebCollab Project Management';
  $abbr_manager_name = (ABBR_MANAGER_NAME != '' ) ? ABBR_MANAGER_NAME : 'WebCollab';
  $file_base         = (FILE_BASE != '' )         ? FILE_BASE         : $file_path;
  $file_maxsize      = (FILE_MAXSIZE != '' )      ? FILE_MAXSIZE      : '2000000';
  $locale            = (LOCALE != '' )            ? LOCALE            : 'en';
  $tz                = (TZ != '' )                ? TZ                : (int)date('Z')/3600;
  $use_email         = (USE_EMAIL != '' )         ? USE_EMAIL         : 'Y';
  $smtp_host         = (SMTP_HOST != '' )         ? SMTP_HOST         : 'localhost';
}
else {
  //this is a new install (or an edit from setup 4 )
  $db_name           = (isset($_POST['db_name']) )           ? $_POST['db_name']           : '';
  $db_user           = (isset($_POST['db_user']) )           ? $_POST['db_user']           : '';
  $db_password       = (isset($_POST['db_password']) )       ? $_POST['db_password']       : '';
  $db_type           = (isset($_POST['db_type']) )           ? $_POST['db_type']           : 'mysql';
  $db_host           = (isset($_POST['db_host']) )           ? $_POST['db_host']           : 'localhost';
  $base_url          = (isset($_POST['base_url']) )          ? $_POST['base_url']          : $server_url;
  $manager_name      = (isset($_POST['manager_name']) )      ? $_POST['manager_name']      : 'WebCollab Project Management';
  $abbr_manager_name = (isset($_POST['abbr_manager_name']) ) ? $_POST['abbr_manager_name'] : 'WebCollab';
  $file_base         = (isset($_POST['file_base']) )         ? $_POST['file_base']         : $file_path;
  $file_maxsize      = (isset($_POST['file_maxsize']) )      ? $_POST['file_maxsize']      : '2000000';
  $locale            = (isset($_POST['locale']) )            ? $_POST['locale']            : 'en';
  $tz                = (isset($_POST['timezone']) )          ? $_POST['timezone']          : (int)date('Z')/3600;
  $use_email         = (isset($_POST['use_email']) )         ? $_POST['use_email']         : 'Y';
  $smtp_host         = (isset($_POST['smtp_host']) )         ? $_POST['smtp_host']         : 'localhost';
}

create_top_setup('Setup Screen' );

$content  = '';

$content .= "<table style=\"width : 98%\"><tr><td>\n".
            "<span class=\"textlink\">[<a href=\"help/en_help_setup3.php?type=setup3&amp;lang=en\" onclick=\"window.open('help/en_help_setup3.php?type=setup3&amp;lang=en'); return false\"><i>Help me with this form</i></a>]</span>\n".
            "</td></tr>\n</table>\n";

$content .= "<form method=\"post\" action=\"setup_handler.php\">".
            "<input type=\"hidden\" name=\"action\" value=\"setup4\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"$new_db\" />\n".
            "<table border=\"0\">";

//basic settings
$content .= "<tr><td></td><td><br /><b><u>Basic Settings</u></b></td></tr>\n".
            "<tr><td></td><td><br />Base URL address of site. (Don't forget the trailing slash - e.g. http://mydomain.com/webcollab/).</td></tr>\n".
            "<tr><th>Site address:</th><td><input type=\"text\" name=\"base_url\" value=\"".$base_url."\" size=\"50\" /></td></tr>\n";

$content .= "<tr><td></td><td><br />The name of the site</td></tr>\n".
            "<tr><th>Site name:</th><td><input type=\"text\" name=\"manager_name\" value=\"".$manager_name."\" size=\"50\" /></td></tr>\n";

$content .= "<tr><td></td><td><br />An abbreviated name of the site for emails</td></tr>\n".
            "<tr><th>Abbreviated site name:</th><td><input type=\"text\" name=\"abbr_manager_name\" value=\"".$abbr_manager_name."\" size=\"30\" /></td></tr>\n";

//database settings
$content .= "<tr><td></td><td><br /><br /><b><u>Database Settings</u></b><br /><br /></td></tr>\n".
            "<tr><th>Database name:</th><td><input type=\"text\" name=\"db_name\" value=\"".$db_name."\" size=\"30\" /></td></tr>\n".
            "<tr><th>Database user:</th><td><input type=\"text\" name=\"db_user\" value=\"".$db_user."\" size=\"30\" /></td></tr>\n".
            "<tr><th>Database password:</th><td><input type=\"text\" name=\"db_password\" value=\"".$db_password."\" size=\"30\" /></td></tr>\n";

switch($db_type){

  case 'postgresql':
    $s1 = ""; $s2 = " selected=\"selected\""; $s3 = "";
    break;

  case 'mysql_innodb':
    $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\"";
    break;

  case 'mysql':
  default:
    $s1 = " selected=\"selected\""; $s2 = ""; $s3 = "";
    break;
}

$content .= "<tr><th>Database type:</th><td><select name=\"db_type\">\n".
             "<option value=\"mysql\"".$s1.">mysql</option>\n".
             "<option value=\"postgresql\"".$s2.">postgresql</option>\n".
             "<option value=\"mysql_innodb\"".$s3.">mysql with innodb</option>\n".
             "</select></td></tr>\n".
             "<tr><th>Database host:</th><td><input type=\"text\" name=\"db_host\" value=\"".$db_host."\" size=\"30\" /></td></tr>\n";

//file settings
$content .= "<tr><td></td><td><br /><br /><b><u>File Upload Settings</u></b></td></tr>\n";

$content .= "<tr><td></td><td><br />Location where uploaded files will be stored</td></tr>\n".
            "<tr><th>File location:</th><td><input type=\"text\" name=\"file_base\" value=\"".$file_base."\" size=\"50\" /></td></tr>\n".

            "<tr><td></td><td><br />Maximum size of file that can be uploaded (bytes)</td></tr>\n".
            "<tr><th>File size:</th><td><input type=\"text\" name=\"file_maxsize\" value=\"".$file_maxsize."\" size=\"20\" /></td></tr>\n";

//language settings
$content .= "<tr><td></td><td><br /><br /><b><u>Language Settings</u></b></td></tr>\n".
            "<tr><td></td><td><br />Languages marked with * are only available in the Unicode versions</td></tr>\n".
            "<tr><th>Language:</th><td><select name=\"locale\">\n";

$locale_array = array('bg'   => 'Bulgarian',
                      'ca'   => 'Catalan',
                      'zh-tw'=> '*Chinese(Traditional)',
                      'zh-hk'=> '*Chinese (Simplified)',
                      'cs'   => 'Czech',
                      'da'   => 'Danish',
                      'en'   => 'English',
                      'fr'   => 'French',
                      'de'   => 'German',
                      'gr'   => 'Greek',
                      'hu'   => 'Hungarian',
                      'it'   => 'Italian',
                      'ja'   => '*Japanese',
                      'ko'   => '*Korean',
                      'pt-br'=> 'Portuguese (Brazilian)',
                      'ru'   => 'Russian',
                      'es'   => 'Spanish',
                      'sr-la'=> 'Serbian (Latin)',
                      'sr-cy'=> 'Serbian (Cyrillic)',
                      'sk'   => 'Slovak',
                      'sl'   => 'Slovenian',
                      'se'   => 'Swedish',
                      'tr'   => 'Turkish' );

foreach ($locale_array as $key => $value ) {
  $content .= "<option value=\"".$key."\"";

  if($locale == $key ) {
    $content .= " selected=\"selected\" ";
  }

  $content .= ">".$value."</option>\n";
}

$content .= "</select></td></tr>\n";

//timezone setting
$content .= "<tr><td></td><td><br /><br /><b><u>Timezone Setting</u></b></td></tr>\n".
            "<tr><td></td><td><br /></td></tr>\n".
            "<tr><th>Timezone:</th><td><select name=\"timezone\">\n";

$time_array = array('-12'  => 'GMT -1200',
                    '-11'  => 'GMT -1100',
                    '-10'  => 'GMT -1000',
                    '-9.5' => 'GMT -0930',
                    '-9'   => 'GMT -0900',
                    '-8'   => 'GMT -0800',
                    '-7'   => 'GMT -0700',
                    '-6'   => 'GMT -0600',
                    '-5'   => 'GMT -0500',
                    '-4'   => 'GMT -0400',
                    '-3.5' => 'GMT -0330',
                    '-3'   => 'GMT -0300',
                    '-2'   => 'GMT -0200',
                    '-1'   => 'GMT -0100',
                    '0'   => 'GMT      ',
                    '1'   => 'GMT +0100',
                    '2'   => 'GMT +0200',
                    '3'   => 'GMT +0300',
                    '3.5' => 'GMT +0330',
                    '4'   => 'GMT +0400',
                    '4.5' => 'GMT +0430',
                    '5'   => 'GMT +0500',
                    '5.5' => 'GMT +0530',
                    '6'   => 'GMT +0600',
                    '6.5' => 'GMT +0630',
                    '7'   => 'GMT +0700',
                    '8'   => 'GMT +0800',
                    '9'   => 'GMT +0900',
                    '9.5' => 'GMT +0930',
                    '10'  => 'GMT +1000',
                    '10.5'=> 'GMT +1030',
                    '11'  => 'GMT +1100',
                    '11.5'=> 'GMT +1130',
                    '12'  => 'GMT +1200',
                    '13'  => 'GMT +1300' );

foreach ($time_array as $key => $value ) {
  $content .= "<option value=\"".$key."\"";

  if($tz == $key ) {
    $content .= " selected=\"selected\"";
  }

  $content .= ">".$value."</option>\n";
}
$content .= "</select></td></tr>\n";

//email settings
if($use_email === 'N' ) {
  $setting = '';
}
else {
  $setting = "checked";
}

$content .= "<tr><td></td><td><br /><br /><b><u>Email Settings</u></b></td></tr>\n".
            "<tr><td></td><td><br /></td></tr>\n".
            "<tr><th>Use email?</th><td><input type=\"checkbox\" name=\"use_email\" ".$setting."  /></td></tr>\n";

$content .= "<tr><td></td><td><br /><br /><i>SMTP host is required if email is enabled</i></tr>\n".
            "<tr><th><i>SMTP Host:</i></th><td><input type=\"text\" name=\"smtp_host\" value=\"".$smtp_host."\" size=\"50\" /></td></tr>\n";

$content .= "<tr><td></td><td>&nbsp;</td></tr>\n".
             "<tr><td></td><td><input type=\"submit\" value=\"Submit\" /></td></tr>\n".
             "</table>\n".
             "</form>\n";

new_box_setup( "Setup - Stage 3 of 5 : Configuration", $content, 'boxdata', 'tablebox' );
create_bottom_setup();

?>
