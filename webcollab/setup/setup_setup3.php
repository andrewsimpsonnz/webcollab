<?php
/*
  $Id$
  
  (c) 2003 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

require_once("path.php" );

require_once(BASE."config/config.php" );
require_once(BASE."setup/security_setup.php" );
include_once(BASE."setup/screen_setup.php" );

//check config can be written
if( ! is_writeable(BASE."config/config.php" ) ){
  error_setup("Configuration file needs to be made writeable by the webserver to proceed.");
}

$flag = 1;
if(isset($_POST["new_db"]) && $_POST["new_db"] == "N" )
  $new_db = "N";
else
  $new_db = "Y";

if(isset($DATABASE_NAME ) && $DATABASE_NAME != "" ) {

  //this is not an initial install
  if($new_db == "N" ){
    //existing configuration being reused
    $db_name     = $DATABASE_NAME;
    $db_user     = $DATABASE_USER;
    $db_password = $DATABASE_PASSWORD;
    $db_type     = $DATABASE_TYPE;
    $db_host     = $DATABASE_HOST;
    $flag = 0;
  }
}
else {
  //first time install, database creation was skipped
  if($new_db == "N" ){
    $db_name     = "";
    $db_user     = "";
    $db_password = "";
    $db_type     = "mysql";
    $db_host     = "localhost";
    $flag = 0;
  }
}

//this is TRUE if nothing above was matched
if($flag ){
  //new database has been created, get parameters...
  if(isset($_POST["db_name"]) )
    $db_name = $_POST["db_name"];
  else
    $db_name = "";
  if(isset($_POST["db_user"]) )
    $db_user = $_POST["db_user"];
  else
    $db_user = "";
  if(isset($_POST["db_password"]) )
    $db_password = $_POST["db_password"];
  else
    $db_password = "";
  if(isset($_POST["db_type"]) )
    $db_type = $_POST["db_type"];
  else
    $db_type = "mysql";
  if(isset($_POST["db_host"]) )
    $db_host = $_POST["db_host"];
  else
    $db_host = "localhost";
}


create_top_setup("Setup Screen" );

$content  = "";

$content .= "<form method=\"post\" action=\"setup_handler.php\">".
            "<input type=\"hidden\" name=\"action\" value=\"setup4\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"$new_db\" />\n".
            "<table border=\"0\">";

if( ! isset($DATABASE_NAME ) || $DATABASE_NAME == "" ){
  $file_path = realpath(dirname(__FILE__ ).'/..' ).'/';
  $BASE_URL  = str_replace( $_SERVER["DOCUMENT_ROOT"], "http://".$_SERVER["HTTP_HOST"], $file_path );
}

//basic settings
$content .= "<tr><td></td><td><br /><b><u>Basic Settings</u></b></td></tr>\n".
            "<tr><td></td><td><br />Base URL address of site. (Don't forget the trailing slash - e.g. http://mydomain.com/webcollab/).</td></tr>\n".
            "<tr><th>Site address:</th><td><input type=\"text\" name=\"base_url\" value=\"$BASE_URL\" size=\"50\" /></td></tr>\n";

if( ! isset($MANAGER_NAME) || $MANAGER_NAME == "" )
  $MANAGER_NAME = "WebCollab Project Management";

$content .= "<tr><td></td><td><br />The name of the site</td></tr>\n".
            "<tr><th>Site name:</th><td><input type=\"text\" name=\"manager_name\" value=\"$MANAGER_NAME\" size=\"50\" /></td></tr>\n";

if( ! isset($ABBR_MANAGER_NAME) || $ABBR_MANAGER_NAME == "" )
  $ABBR_MANAGER_NAME = "WebCollab";

$content .= "<tr><td></td><td><br />An abbreviated name of the site for emails</td></tr>\n".
            "<tr><th>Abbreviated site name:</th><td><input type=\"text\" name=\"abbr_manager_name\" value=\"$ABBR_MANAGER_NAME\" size=\"30\" /></td></tr>\n";

//database settings
$content .= "<tr><td></td><td><br /><br /><b><u>Database Settings</u></b><br /><br /></td></tr>\n".
            "<tr><th>Database name:</th><td><input type=\"text\" name=\"db_name\" value=\"$db_name\" size=\"30\" /></td></tr>\n".
            "<tr><th>Database user:</th><td><input type=\"text\" name=\"db_user\" value=\"$db_user\" size=\"30\" /></td></tr>\n".
            "<tr><th>Database password:</th><td><input type=\"text\" name=\"db_password\" value=\"$db_password\" size=\"30\" /></td></tr>\n";

switch($db_type){

  case "postgresql":
    $s1 = ""; $s2 = " selected=\"selected\""; $s3 = "";
    break;

  case "mysql_innodb":
    $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\"";
    break;

  case "mysql":
  default:
    $s1 = " selected=\"selected\""; $s2 = ""; $s3 = "";
    break;
}

$content .= "<tr><th>Database type:</th><td><select name=\"db_type\">\n".
             "<option value=\"mysql\"$s1>mysql</option>\n".
             "<option value=\"postgresql\"$s2>postgresql</option>\n".
             "<option value=\"mysql_innodb\"$s3>mysql with innodb</option>\n".
             "</select></td></tr>\n".
             "<tr><th>Database host:</th><td><input type=\"text\" name=\"db_host\" value=\"$db_host\" size=\"30\" /></td></tr>\n";

//file settings
$content .= "<tr><td></td><td><br /><br /><b><u>File Upload Settings</u></b></td></tr>\n";

if( ! isset($DATABASE_NAME ) || $DATABASE_NAME == "" )
  $FILE_BASE = realpath(dirname(__FILE__ )."/.." )."/files/filebase";

if( ! isset($FILE_MAXSIZE) || $FILE_MAXSIZE == NULL )
  $FILE_MAXSIZE = "2000000";

$content .= "<tr><td></td><td><br />Location where uploaded files will be stored</td></tr>\n".
            "<tr><th>File location:</th><td><input type=\"text\" name=\"file_base\" value=\"$FILE_BASE\" size=\"50\" /></td></tr>\n".

            "<tr><td></td><td><br />Maximum size of file that can be uploaded (bytes)</td></tr>\n".
            "<tr><th>File size:</th><td><input type=\"text\" name=\"file_maxsize\" value=\"$FILE_MAXSIZE\" size=\"20\" /></td></tr>\n";

//language settings
$content .= "<tr><td></td><td><br /><br /><b><u>Language Settings</u></b></td></tr>\n";

if( ! isset($LOCALE) || $LOCALE == NULL )
  $LOCALE = "en";

//initialise array with null values
for( $i=0 ; $i < 8 ; $i++ ) {
  $s[$i] = "";
}

//select current value
$option_array = array("bg", "ca", "da", "en", "fr", "de", "it", "es" );
$selected = array_search($LOCALE, $option_array );  
$s[$selected] = " selected=\"selected\"";  
  
$content .= "<tr><td></td><td><br /></td></tr>\n".
            "<tr><th>Language:</th><td><select name=\"locale\">\n".
            "<option value=\"bg\" $s[0]>Bulgarian</option>\n".
            "<option value=\"ca\" $s[1]>Catalan</option>\n".
            "<option value=\"da\" $s[2]>Danish</option>\n".
            "<option value=\"en\" $s[3]>English</option>\n".
            "<option value=\"fr\" $s[4]>French</option>\n".
            "<option value=\"de\" $s[5]>German</option>\n".
            "<option value=\"it\" $s[6]>Italian</option>\n".
            "<option value=\"es\" $s[7]>Spanish</option>\n".
            "</select></td></tr>\n";
             
//timezone setting
$content .= "<tr><td></td><td><br /><br /><b><u>Timezone Setting</u></b></td></tr>\n";

if( ! isset($TZ) || $TZ == NULL )
  $TZ = (int)date("Z")/3600;

//initialise array with null values  
for( $i=1 ; $i < 27 ; $i++ ) {
  $s[$i] = "";
}

//select current value
$s[(13 + $TZ)] = " selected=\"selected\"";

$content .=  "<tr><td></td><td><br /></td></tr>\n".
             "<tr><th>Timezone:</th><td><select name=\"timezone\">\n".
             "<option value=\"-12\"$s[1]>GMT -1200</option>\n".
             "<option value=\"-11\"$s[2]>GMT -1100</option>\n".
             "<option value=\"-10\"$s[3]>GMT -1000</option>\n".
             "<option value=\"-9\"$s[4]>GMT -0900</option>\n".
             "<option value=\"-8\"$s[5]>GMT -0800</option>\n".
             "<option value=\"-7\"$s[6]>GMT -0700</option>\n".
             "<option value=\"-6\"$s[7]>GMT -0600</option>\n".
             "<option value=\"-5\"$s[8]>GMT -0500</option>\n".
             "<option value=\"-4\"$s[9]>GMT -0400</option>\n".
             "<option value=\"-3\"$s[10]>GMT -0300</option>\n".
             "<option value=\"-2\"$s[11]>GMT -0200</option>\n".
             "<option value=\"-1\"$s[12]>GMT -0100</option>\n".
             "<option value=\"0\"$s[13]>GMT</option>\n".
             "<option value=\"1\"$s[14]>GMT +0100</option>\n".
             "<option value=\"2\"$s[15]>GMT +0200</option>\n".
             "<option value=\"3\"$s[16]>GMT +0300</option>\n".
             "<option value=\"4\"$s[17]>GMT +0400</option>\n".
             "<option value=\"5\"$s[18]>GMT +0500</option>\n".
             "<option value=\"6\"$s[19]>GMT +0600</option>\n".
             "<option value=\"7\"$s[20]>GMT +0700</option>\n".
             "<option value=\"8\"$s[21]>GMT +0800</option>\n".
             "<option value=\"9\"$s[22]>GMT +0900</option>\n".
             "<option value=\"10\"$s[23]>GMT +1000</option>\n".
             "<option value=\"11\"$s[24]>GMT +1100</option>\n".
             "<option value=\"12\"$s[25]>GMT +1200</option>\n".
             "<option value=\"13\"$s[26]>GMT +1300</option>\n".
             "</select></td></tr>\n".
                        
//email settings
$setting = "checked";
if(isset($USE_EMAIL) && $USE_EMAIL == "N" )
  $setting = "";

$content .= "<tr><td></td><td><br /><br /><b><u>Email Settings</u></b></td></tr>\n".
            "<tr><td></td><td><br /></td></tr>\n".
            "<tr><th>Use email?</th><td><input type=\"checkbox\" name=\"use_email\" $setting  /></td></tr>\n";
            
if( ! isset($SMTP_HOST) )
  $SMTP_HOST = "localhost";

$content .= "<tr><td></td><td><br /><br /><i>SMTP host is required if email is enabled</i></tr>\n".
            "<tr><th><i>SMTP Host:</i></th><td><input type=\"text\" name=\"smtp_host\" value=\"$SMTP_HOST\" size=\"50\" /></td></tr>\n";

$content .= "<tr><td></td><td>&nbsp;</td></tr>\n".
             "<tr><td></td><td><input type=\"submit\" value=\"Submit\" /></td></tr>\n".
             "</table>\n".
             "</form>\n";

new_box_setup( "Setup - Stage 3 of 5 : Configuration", $content, "boxdata", "tablebox" );
create_bottom_setup();

?>
