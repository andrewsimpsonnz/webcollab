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

include_once( "./screen_setup.php" );
include_once('../config.php' );

//
//Error trap function
//

function error_setup( $reason ) {

  create_top_setup("Setup", 1 );
  new_box_setup("Setup error", "<center><br />".$reason."<br /></center>" );
  create_bottom_setup();
  die;

}

//security check
if( ( !isset($CONFIG_STATE ) ) || $CONFIG_STATE != "first install" ) {
  //this is not an initial install, log in before proceeding
  include_once('../includes/security.php' );

  if($admin != 1 ) {
    error_setup("You are not authorised to do this");
    exit;
  }

  //read existing configuration
  $db_name     = $DATABASE_NAME;
  $db_user     = $DATABASE_USER;
  $db_password = $DATABASE_PASSWORD;
  $db_type     = $DATABASE_TYPE;
  $db_host     = $DATABASE_HOST;
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

//check config can be written
if( ! is_writeable("../config.php" ) )
  error_setup("Configuration file needs to be made writeable by the webserver to proceed");

create_top_setup("Setup Screen", 1);

$content  = "";

$content .= "<form method=\"POST\" action=\"setup3.php\">".
            "<table border=\"0\">".
            "<input type=\"hidden\" name=\"x\" value=\"".$x."\">\n".
            "<input type=\"hidden\" name=\"db_name\" value=\"".$db_name."\">\n".
            "<input type=\"hidden\" name=\"db_user\" value=\"".$db_user."\">\n".
            "<input type=\"hidden\" name=\"db_password\" value=\"".$db_password."\">\n".
            "<input type=\"hidden\" name=\"db_type\" value=\"".$db_type."\">\n".
            "<input type=\"hidden\" name=\"db_host\" value=\"".$db_host."\">\n";

if(isset($CONFIG_STATE ) && $CONFIG_STATE == "first install" ){
  $file_path = realpath(dirname(__FILE__ ).'/..' ).'/';
  $file_root = $_SERVER["DOCUMENT_ROOT"];
  $server    = $_SERVER["HTTP_HOST"];
  $BASE_URL  = str_replace( $file_root, "http://".$server, $file_path );
}

//basic settings
$content .= "<tr><td></td><td><br /><B><U>Basic Settings</U></B></td></tr>";
$content .= "<tr><td></td><td><br />Base URL address of site. (Don't forget the trailing slash).</td></tr>";
$content .= "<tr><th>Site address:</th><td><input type=\"text\" name=\"base_url\" value=\"$BASE_URL\" size=\"50\"></td></tr>\n";

if($MANAGER_NAME == "" )
  $MANAGER_NAME = "WebCollab Project Management";

$content .= "<tr><td></td><td><br />The name of the site</td></tr>";
$content .= "<tr><th>Site name:</th><td><input type=\"text\" name=\"manager_name\" value=\"$MANAGER_NAME\" size=\"50\"></td></tr>\n";

if($ABBR_MANAGER_NAME == "" )
  $ABBR_MANAGER_NAME = "WebCollab";

$content .= "<tr><td></td><td><br />An abbreviated name of the site for emails</td></tr>";
$content .= "<tr><th>Abbreviated site name:</th><td><input type=\"text\" name=\"abbr_manager_name\" value=\"$ABBR_MANAGER_NAME\" size=\"30\"></td></tr>\n";

$content .= "<tr><td></td><td><br />Alternate splash image for login screen. (Default is WebCollab image)</td></tr>";
$content .= "<tr><th>Splash image:</th><td><input type=\"text\" name=\"site_img\" value=\"$SITE_IMG\" size=\"50\"></td></tr>\n";

//file settings
$content .= "<tr><td></td><td><br /><br /><b><u>File Upload Settings</u></b></td></tr>";

if(isset($CONFIG_STATE ) && $CONFIG_STATE == "first install" )
  $FILE_BASE = realpath(dirname(__FILE__ ).'/..' )."/files/filebase";

$content .= "<tr><td></td><td><br />Location where uploaded files will be stored</td></tr>";
$content .= "<tr><th>File location:</th><td><input type=\"text\" name=\"file_base\" value=\"$FILE_BASE\" size=\"50\"></td></tr>\n";

$content .= "<tr><td></td><td><br />Maximum size of file that can be uploaded (bytes)</td></tr>";
$content .= "<tr><th>File size:</th><td><input type=\"text\" name=\"file_maxsize\" value=\"$FILE_MAXSIZE\" size=\"20\"></td></tr>\n";

//language settings
$content .= "<tr><td></td><td><br /><br /><b><u>Language Settings</u></b></td></tr>";

$s1 = "SELECTED"; $s2 = "";
if(isset($LOCALE) ){
  if($LOCALE == "es" ) {
    $s1 = ""; $s2 = "SELECTED";
  }
}

$content .= "<tr><td></td><td><br /></td></tr>";
$content .= "<tr><th>Language:</th><td><SELECT name=\"locale\">\n".
            "<OPTION value=\"en\" $s1 >English</OPTION>\n".
            "<OPTION value=\"es\" $s2 >Spanish</OPTION>\n".
            "</SELECT></td></tr>\n";

//email settings
$setting = "CHECKED";
if($USE_EMAIL == "N" )
  $setting = "";

$content .= "<tr><td></td><td><br /><br /><B><U>Email Settings</U></B></td></tr>";
$content .= "<tr><td></td><td><br /></td></tr>";
$content .= "<tr><th>Use email?</th><td><input type=\"checkbox\" name=\"use_email\" $setting ></td></tr>\n";

$s1 = "SELECTED"; $s2 = "";
if(isset($MAIL_METHOD) ){
  if($MAIL_METHOD == "SMTP" ) {
    $s1 = ""; $s2 = "SELECTED";
  }
}

$content .= "<tr><td><br /></td><td><SELECT name=\"mail_method\">\n".
            "<OPTION value=\"mail\" ".$s1." >Use standard PHP mail() function</OPTION>\n".
            "<OPTION value=\"SMTP\" ".$s2." >Use external SMTP Server</OPTION>\n".
            "</SELECT></td></tr>\n";

$content .= "<tr><td></td><td><br /><br />If an error occurs on the site, who do we email?</td></tr>";
$content .= "<tr><th>Error emails sent to:</th><td><input type=\"text\" name=\"email_error\" value=\"$EMAIL_ERROR\" size=\"30\"></td></tr>\n";

$content .= "<tr><td><br /><br /></td><td><I>Items below are only required if SMTP server is chosen</I></tr>";
$content .= "<tr><th><I>SMTP Host:</I></th><td><input type=\"text\" name=\"smtp_host\" value=\"$SMTP_HOST\" size=\"50\"></td></tr>\n";

$setting = "";
if($SMTP_AUTH == "Y" )
  $setting = "CHECKED";

$content .= "<tr><td></td><td><br /></td></tr>";
$content .= "<tr><th><I>Use SMTP AUTH?</I></th><td><input type=\"checkbox\" name=\"smtp_auth\" $setting ></td></tr>\n";

$content .= "<tr><td></td><td><br /><I>Below is only required if SMTP AUTH is selected</I></td></tr>";
$content .= "<tr><th><I>SMTP AUTH username:</I></th><td><input type=\"text\" name=\"mail_user\" value=\"$MAIL_USER\" size=\"30\"></td></tr>\n";
$content .= "<tr><th><I>SMTP AUTH password:</I></th><td><input type=\"text\" name=\"mail_password\" value=\"$MAIL_PASSWORD\" size=\"30\"></td></tr>\n";

$content .= "</table><br /><br />\n".
        "<input type=\"hidden\" name=\"action\" value=\"insert\">\n".
	    "<input type=\"submit\" value=\"Submit\">\n".
	    "</form><br /><br />\n";

new_box_setup( "Setup - Stage 2 of 3 : Configuration", $content );
create_bottom_setup();

?>
