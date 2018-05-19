<?php
/*
  $Id: setup_setup3.php 2236 2009-05-22 22:20:49Z andrewsimpson $

  (c) 2003 - 2017 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//set language
if(isset($_POST['lang'] ) ) {
  $locale_setup = $_POST['lang'];
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

//check config can be written
if( ! is_writeable(BASE_CONFIG.'config.php' ) ) {
  error_setup($lang_setup['setup3_no_config'] );
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
  $file_maxsize      = (FILE_MAXSIZE != '' )      ? FILE_MAXSIZE      : '2097152';
  $locale            = (LOCALE != '' )            ? LOCALE            : 'en';
  $tz                = (TZ != '' )                ? TZ                : (int)date('Z')/3600;
  $use_email         = (USE_EMAIL != '' )         ? USE_EMAIL         : 'Y';
  $smtp_host         = (SMTP_HOST != '' )         ? SMTP_HOST         : 'localhost';
  $smtp_auth         = (SMTP_AUTH != '' )         ? SMTP_AUTH         : '';
  $smtp_port         = (SMTP_PORT != '' )         ? SMTP_PORT         : '25';
  $mail_user         = (MAIL_USER != '' )         ? MAIL_USER         : '';
  $mail_password     = (MAIL_PASSWORD != '' )     ? MAIL_PASSWORD     : '';
  $tls               = (TLS != '' )               ? TLS               : '';
}
else {
  //this is a new install (or an edit from setup 4 )
  $db_name           = (isset($_POST['db_name']) )           ? $_POST['db_name']           : '';
  $db_user           = (isset($_POST['db_user']) )           ? $_POST['db_user']           : '';
  $db_password       = (isset($_POST['db_password']) )       ? $_POST['db_password']       : '';
  $db_type           = (isset($_POST['db_type']) )           ? $_POST['db_type']           : 'mysql_pdo';
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
  $smtp_auth         = (isset($_POST['smtp_auth']) )         ? $_POST['smtp_auth']         : 'N';
  $smtp_port         = (isset($_POST['smtp_port']) )         ? $_POST['smtp_port']         : '25';
  $mail_user         = (isset($_POST['mail_user']) )         ? $_POST['mail_user']         : '';
  $mail_password     = (isset($_POST['mail_password']) )     ? $_POST['mail_password']     : '';
  $tls               = (isset($_POST['tls']) )               ? $_POST['tls']               : 'N';
}

create_top_setup($lang_setup['setup3_banner'], 1 );

$content  = '';

$content .= "<table>\n".
            "<tr><td>\n".
            "<span class=\"textlink\">[<a href=\"help/help_setup.php?type=setup3&amp;lang=".$locale_setup."\" onclick=\"window.open('help/help_setup.php?type=setup3&amp;lang=".$locale_setup."'); return false\"><i>".$lang_setup['help']."</i></a>]</span>\n".
            "</td></tr>\n</table>\n";

$content .= "<form method=\"post\" action=\"setup_handler.php\" ".
            "onsubmit=\"return fieldCheck('host', 'pass', 'user', 'url')\">".
            "<fieldset><input type=\"hidden\" name=\"action\" value=\"setup4\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"".$new_db."\" />\n".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert\" value=\"".$lang_setup['setup_js_alert_field']."\" /></fieldset>\n".
            "<table class=\"celldata\" >";

//basic settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_basic']."</th></tr>\n".
            "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup3_URL']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup3_address']."</th>".
            "<td><input type=\"text\" id=\"url\" name=\"base_url\" value=\"".$base_url."\" style=\"width: 350px\" /></td></tr>\n";

$content .= "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup3_name1']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup3_name2']."</th>".
            "<td><input type=\"text\" name=\"manager_name\" value=\"".$manager_name."\" style=\"width: 350px\" /></td></tr>\n";

$content .= "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup3_name3']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup3_name4']."</th>".
            "<td><input type=\"text\" name=\"abbr_manager_name\" value=\"".$abbr_manager_name."\" class=\"size\" /></td></tr>\n";

//database settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_db']."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_name']."</th>".
            "<td><input type=\"text\" name=\"db_name\" value=\"".$db_name."\" class=\"size\" /></td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_user']."</th>".
            "<td><input type=\"text\" id=\"user\" name=\"db_user\" value=\"".$db_user."\" class=\"size\" /></td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_password']."</th>".
            "<td><input type=\"text\" id=\"pass\" name=\"db_password\" value=\"".$db_password."\" class=\"size\" /></td></tr>\n";

switch($db_type){

  case 'postgresql_pdo':
    $s1 = ""; $s2 = " selected=\"selected\""; $s3 = ""; $s4 = "";
    break;

  case 'mysql_pdo':
  default:
    $s1 = " selected=\"selected\""; $s2 = ""; $s3 = ""; $s4 = "";
    break;

}

$content .= "<tr class=\"grouplist\"><th>".$lang_setup['db_type']."</th><td><select name=\"db_type\">\n".
            "<option value=\"mysql_pdo\"".$s1.">mysql</option>\n".
            "<option value=\"postgresql_pdo\"".$s2.">postgresql</option>\n".
            "</select></td></tr>\n";

$content .= "<tr class=\"grouplist\"><th>".$lang_setup['db_host']."</th>".
            "<td><input type=\"text\" name=\"db_host\" id=\"host\" value=\"".$db_host."\" class=\"size\" /></td></tr>\n";

//file settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_file1']."</th></tr>\n";

$content .= "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup3_file2']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['file_location']."</th>".
            "<td><input type=\"text\" name=\"file_base\" value=\"".$file_base."\" style=\"width: 350px\" /></td></tr>\n".

            "<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup3_file3']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['file_size']."</th>".
            "<td><input type=\"text\" name=\"file_maxsize\" value=\"".$file_maxsize."\" class=\"size\" /></td></tr>\n";

//language settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_language1']."</th></tr>\n".
            //"<tr class=\"grouplist\"><td></td><td>".$lang_setup['setup3_language2']."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['language']."</th><td><select name=\"locale\">\n";

foreach ($locale_array as $key => $value ) {
  $content .= "<option value=\"".$key."\"";

  if($locale == $key ) {
    $content .= " selected=\"selected\" ";
  }

  $content .= ">".$value."</option>\n";
}

$content .= "</select></td></tr>\n";

//timezone setting
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_timezone']."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup3_timezone']."</th><td><select name=\"timezone\">\n";

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
                    '-2.5' => 'GMT -0230',
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
  $setting = "checked=\"checked\"";
}

$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_email']."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['use_email']."</th>".
            "<td><input type=\"checkbox\" name=\"use_email\" ".$setting." /></td></tr>\n";

$content .= "<tr class=\"grouplist\"><td></td><td><i>".$lang_setup['setup3_smtp']."</i></td></tr>\n".
            "<tr class=\"grouplist\"><th><i>".$lang_setup['smtp_host']."</i></th>".
            "<td><input type=\"text\" name=\"smtp_host\" value=\"".$smtp_host."\" style=\"width: 350px\" /></td></tr>\n";

//smtp_auth settings
if($smtp_auth === 'N' ) {
  $setting = '';
}
else {
  $setting = "checked=\"checked\"";
}

$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_smtp_auth']."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['use_smtp_auth']."</th>".
            "<td><input type=\"checkbox\" name=\"smtp_auth\" ".$setting." /></td></tr>\n";

$content .= "<tr class=\"grouplist\"><td></td><td><i>".$lang_setup['setup3_smtp_auth_option']."</i></td></tr>\n".
            "<tr class=\"grouplist\"><th><i>".$lang_setup['smtp_mail_user']."</i></th>".
            "<td><input type=\"text\" name=\"mail_user\" value=\"".$mail_user."\" style=\"width: 350px\" /></td></tr>\n";

$content .= "<tr class=\"grouplist\"><th><i>".$lang_setup['smtp_mail_password']."</i></th>".
            "<td><input type=\"text\" name=\"mail_password\" value=\"".$mail_password."\" style=\"width: 350px\" /></td></tr>\n";

//tls settings
if($tls === 'N' ) {
  $setting = '';
}
else {
  $setting = "checked=\"checked\"";
}

$content .= "<tr class=\"grouplist\"><th>".$lang_setup['use_smtp_tls']."</th>".
            "<td><input type=\"checkbox\" name=\"tls\" ".$setting." /></td></tr>\n";

$content .=  "<tr class=\"grouplist\"><td></td><td><input type=\"submit\" value=\"".$lang_setup['submit']."\" /></td></tr>\n".
             "</table>\n".
             "</form>\n";

new_box_setup($lang_setup['setup3_banner'], $content );
create_bottom_setup();

?>
