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

  Setup screen

*/

require_once("../config.php" );
include_once("./screen_setup.php" );

//
//Error trap function
//

function error_setup($reason ) {

  create_top_setup("Setup" );
  new_box_setup("Setup error", $reason, "boxdata", "singlebox" );
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

  //read existing configuration
  $db_name     = $DATABASE_NAME;
  $db_user     = $DATABASE_USER;
  $db_password = $DATABASE_PASSWORD;
  $db_type     = $DATABASE_TYPE;
  $db_host     = $DATABASE_HOST;

  //check config can be written
  if( ! is_writeable("../config.php" ) ){
    error_setup("Configuration file needs to be made writeable by the webserver to proceed");
  }
}
else {
  //first time install, get parameters
  $x = "";
  $db_name     = $_GET["db_name"];
  $db_user     = $_GET["db_user"];
  $db_password = $_GET["db_pass"];
  $db_type     = $_GET["db_type"];
  $db_host     = $_GET["db_host"];
}

create_top_setup("Setup Screen" );

$content  = "";

$content .= "<form method=\"POST\" action=\"setup3.php\">".
            "<table border=\"0\">".
            "<input type=\"hidden\" name=\"x\" value=\"$x\">\n".
            "<input type=\"hidden\" name=\"db_name\" value=\"$db_name\">\n".
            "<input type=\"hidden\" name=\"db_user\" value=\"$db_user\">\n".
            "<input type=\"hidden\" name=\"db_password\" value=\"$db_password\">\n".
            "<input type=\"hidden\" name=\"db_type\" value=\"$db_type\">\n".
            "<input type=\"hidden\" name=\"db_host\" value=\"$db_host\">\n";

if( ! isset($DATABASE_NAME ) || $DATABASE_NAME == "" ){
  $file_path = realpath(dirname(__FILE__ ).'/..' ).'/';
  $BASE_URL  = str_replace( $_SERVER["DOCUMENT_ROOT"], "http://".$_SERVER["HTTP_HOST"], $file_path );
}

//basic settings
$content .= "<tr><td></td><td><br /><B><U>Basic Settings</U></B></td></tr>".
            "<tr><td></td><td><br />Base URL address of site. (Don't forget the trailing slash).</td></tr>".
            "<tr><th>Site address:</th><td><input type=\"text\" name=\"base_url\" value=\"$BASE_URL\" size=\"50\"></td></tr>\n";

if( ! isset($MANAGER_NAME) || $MANAGER_NAME == "" )
  $MANAGER_NAME = "WebCollab Project Management";

$content .= "<tr><td></td><td><br />The name of the site</td></tr>".
            "<tr><th>Site name:</th><td><input type=\"text\" name=\"manager_name\" value=\"$MANAGER_NAME\" size=\"50\"></td></tr>\n";

if( ! isset($ABBR_MANAGER_NAME) || $ABBR_MANAGER_NAME == "" )
  $ABBR_MANAGER_NAME = "WebCollab";

$content .= "<tr><td></td><td><br />An abbreviated name of the site for emails</td></tr>".
            "<tr><th>Abbreviated site name:</th><td><input type=\"text\" name=\"abbr_manager_name\" value=\"$ABBR_MANAGER_NAME\" size=\"30\"></td></tr>\n";

if( ! isset($SITE_IMG) )
  $SITE_IMG = "";

$content .= "<tr><td></td><td><br />Alternate splash image for login screen. (Default is WebCollab image)</td></tr>".
            "<tr><th>Splash image:</th><td><input type=\"text\" name=\"site_img\" value=\"$SITE_IMG\" size=\"50\"></td></tr>\n".

            //file settings
            "<tr><td></td><td><br /><br /><b><u>File Upload Settings</u></b></td></tr>";

if( ! isset($DATABASE_NAME ) || $DATABASE_NAME == "" )
  $FILE_BASE = realpath(dirname(__FILE__ ).'/..' )."/files/filebase";

if( ! isset($FILE_MAXSIZE) )
  $FILE_MAXSIZE = "";

$content .= "<tr><td></td><td><br />Location where uploaded files will be stored</td></tr>".
            "<tr><th>File location:</th><td><input type=\"text\" name=\"file_base\" value=\"$FILE_BASE\" size=\"50\"></td></tr>\n".

            "<tr><td></td><td><br />Maximum size of file that can be uploaded (bytes)</td></tr>".
            "<tr><th>File size:</th><td><input type=\"text\" name=\"file_maxsize\" value=\"$FILE_MAXSIZE\" size=\"20\"></td></tr>\n".

            //language settings
            "<tr><td></td><td><br /><br /><b><u>Language Settings</u></b></td></tr>";

if( ! isset($LOCALE) )
  $LOCALE = "en";

switch($LOCALE) {
  case "en":
    $s1 = "SELECTED"; $s2 = ""; $s3 = "";
    break;

  case "es":
    $s1 = ""; $s2 = "SELECTED"; $s3 = "";
    break;

  case "fr":
    $s1 = ""; $s2 = ""; $s3 = "SELECTED";
    break;
}

$content .= "<tr><td></td><td><br /></td></tr>".
            "<tr><th>Language:</th><td><select name=\"locale\">\n".
            "<option value=\"en\" $s1 >English</option>\n".
            "<option value=\"es\" $s2 >Spanish</option>\n".
            "<option value=\"fr\" $s3 >French</option>\n".
            "</select></td></tr>\n";

//email settings
$setting = "CHECKED";
if(isset($USE_EMAIL) && $USE_EMAIL == "N" )
  $setting = "";

$content .= "<tr><td></td><td><br /><br /><B><U>Email Settings</U></B></td></tr>".
            "<tr><td></td><td><br /></td></tr>".
            "<tr><th>Use email?</th><td><input type=\"checkbox\" name=\"use_email\" $setting ></td></tr>\n";

/*
$s1 = "SELECTED"; $s2 = "";
if(isset($MAIL_METHOD) ){
  if($MAIL_METHOD == "SMTP" ) {
    $s1 = ""; $s2 = "SELECTED";
  }
}

$content .= "<tr><td><br /></td><td><select name=\"mail_method\">\n".
            "<option value=\"mail\" $s1 >Use standard PHP mail() function</option>\n".
            "<option value=\"SMTP\" $s2 >Use external SMTP Server</option>\n".
            "</select></td></tr>\n";
*/

if( ! isset($EMAIL_ERROR) )
  $EMAIL_ERROR = "";

$content .= "<tr><td></td><td><br /><br />If an error occurs on the site, who do we email?</td></tr>".
            "<tr><th>Error emails sent to:</th><td><input type=\"text\" name=\"email_error\" value=\"$EMAIL_ERROR\" size=\"30\"></td></tr>\n";

if( ! isset($SMTP_HOST) )
  $SMTP_HOST = "";

$content .= "<tr><td><br /><br /></td><td><i>Items below are required if email is enabled</i></tr>".
            "<tr><th><i>SMTP Host:</i></th><td><input type=\"text\" name=\"smtp_host\" value=\"$SMTP_HOST\" size=\"50\">localhost</td></tr>\n";

if(isset($SMTP_AUTH) && $SMTP_AUTH == "Y" ) {
  $setting = "CHECKED";
}
else{
  $setting = "";
  $MAIL_USER = "";
  $MAIL_PASSWORD = "";
}

$content .= "<tr><td></td><td><br /></td></tr>".
            "<tr><th><i>Use SMTP AUTH?</i></th><td><input type=\"checkbox\" name=\"smtp_auth\" $setting ></td></tr>\n".

            "<tr><td></td><td><br /><i>Below is only required if SMTP AUTH is selected</i></td></tr>".
            "<tr><th><i>SMTP AUTH username:</i></th><td><input type=\"text\" name=\"mail_user\" value=\"$MAIL_USER\" size=\"30\"></td></tr>\n".
            "<tr><th><i>SMTP AUTH password:</i></th><td><input type=\"text\" name=\"mail_password\" value=\"$MAIL_PASSWORD\" size=\"30\"></td></tr>\n".

            "<tr><td></td><td><br /></td></tr>".
            "<input type=\"hidden\" name=\"action\" value=\"insert\">\n".
            "<tr><td></td><td><input type=\"submit\" value=\"Submit\"></td></tr>\n".
            "</table><br /><br />\n".
            "</form>\n";

new_box_setup( "Setup - Stage 2 of 3 : Configuration", $content, "boxdata", "tablebox" );
create_bottom_setup();

?>
