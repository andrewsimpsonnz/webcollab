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
  new_box_setup("Setup error", "<CENTER><BR>".$reason."<BR></CENTER>" );
  create_bottom_setup();
  die;

}

//security check
if($CONFIG_STATE != "initial install" ){
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

$content .= "<FORM method=\"POST\" action=\"setup3.php\">".
            "<TABLE border=\"0\">".
            "<INPUT type=\"hidden\" name=\"x\" value=\"".$x."\">\n".
            "<INPUT type=\"hidden\" name=\"db_name\" value=\"".$db_name."\">\n".
            "<INPUT type=\"hidden\" name=\"db_user\" value=\"".$db_user."\">\n".
            "<INPUT type=\"hidden\" name=\"db_password\" value=\"".$db_password."\">\n".
            "<INPUT type=\"hidden\" name=\"db_type\" value=\"".$db_type."\">\n".
            "<INPUT type=\"hidden\" name=\"db_host\" value=\"".$db_host."\">\n";

if($CONFIG_STATE == "initial install" ) {
  $file_path = realpath(dirname(__FILE__ ).'/..' ).'/';
  $file_root = $_SERVER["DOCUMENT_ROOT"];
  $server    = $_SERVER["HTTP_HOST"];
  $BASE_URL  = str_replace( $file_root, "http://".$server, $file_path );
}

//basic settings
$content .= "<TR><TD></TD><TD><BR><B><U>Basic Settings</U></B></TD></TR>";
$content .= "<TR><TD></TD><TD><BR>Base URL address of site. (Don't forget the trailing slash).</TD></TR>";
$content .= "<TR><TH>Site address:</TH><TD><INPUT type=\"text\" name=\"base_url\" value=\"$BASE_URL\" size=\"50\"></TD></TR>\n";

if($MANAGER_NAME == "" )
  $MANAGER_NAME = "WebCollab Project Management";

$content .= "<TR><TD></TD><TD><BR>The name of the site</TD></TR>";
$content .= "<TR><TH>Site name:</TH><TD><INPUT type=\"text\" name=\"manager_name\" value=\"$MANAGER_NAME\" size=\"50\"></TD></TR>\n";

if($ABBR_MANAGER_NAME == "" )
  $ABBR_MANAGER_NAME = "WebCollab";

$content .= "<TR><TD></TD><TD><BR>An abbreviated name of the site for emails</TD></TR>";
$content .= "<TR><TH>Abbreviated site name:</TH><TD><INPUT type=\"text\" name=\"abbr_manager_name\" value=\"$ABBR_MANAGER_NAME\" size=\"30\"></TD></TR>\n";

$content .= "<TR><TD></TD><TD><BR>Alternate splash image for login screen. (Default is WebCollab image)</TD></TR>";
$content .= "<TR><TH>Splash image:</TH><TD><INPUT type=\"text\" name=\"site_img\" value=\"$SITE_IMG\" size=\"50\"></TD></TR>\n";

//file settings
$content .= "<TR><TD></TD><TD><BR><BR><B><U>File Upload Settings</U></B></TD></TR>";

if($CONFIG_STATE == "initial install" )
  $FILE_BASE = realpath(dirname(__FILE__ ).'/..' )."/files/filebase";

$content .= "<TR><TD></TD><TD><BR>Location where uploaded files will be stored</TD></TR>";
$content .= "<TR><TH>File location:</TH><TD><INPUT type=\"text\" name=\"file_base\" value=\"$FILE_BASE\" size=\"50\"></TD></TR>\n";

$content .= "<TR><TD></TD><TD><BR>Maximum size of file that can be uploaded (bytes)</TD></TR>";
$content .= "<TR><TH>File size:</TH><TD><INPUT type=\"text\" name=\"file_maxsize\" value=\"$FILE_MAXSIZE\" size=\"20\"></TD></TR>\n";

//language settings
$content .= "<TR><TD></TD><TD><BR><BR><B><U>Language Settings</U></B></TD></TR>";

$s1 = "SELECTED"; $s2 = "";
if(isset($LOCALE) ){
  if($LOCALE == "es" ) {
    $s1 = ""; $s2 = "SELECTED";
  }
}

$content .= "<TR><TD></TD><TD><BR></TD></TR>";
$content .= "<TR><TH>Language:</TH><TD><SELECT name=\"locale\">\n".
            "<OPTION value=\"en\" $s1 >English</OPTION>\n".
            "<OPTION value=\"es\" $s2 >Spanish</OPTION>\n".
            "</SELECT></TD></TR>\n";

//email settings
$setting = "CHECKED";
if($USE_EMAIL == "N" )
  $setting = "";

$content .= "<TR><TD></TD><TD><BR><BR><B><U>Email Settings</U></B></TD></TR>";
$content .= "<TR><TD></TD><TD><BR></TD></TR>";
$content .= "<TR><TH>Use email?</TH><TD><INPUT type=\"checkbox\" name=\"use_email\" $setting ></TD></TR>\n";

$s1 = "SELECTED"; $s2 = "";
if(isset($MAIL_METHOD) ){
  if($MAIL_METHOD == "SMTP" ) {
    $s1 = ""; $s2 = "SELECTED";
  }
}

$content .= "<TR><TD><BR></TD><TD><SELECT name=\"mail_method\">\n".
            "<OPTION value=\"mail\" ".$s1." >Use standard PHP mail() function</OPTION>\n".
            "<OPTION value=\"SMTP\" ".$s2." >Use external SMTP Server</OPTION>\n".
            "</SELECT></TD></TR>\n";

$content .= "<TR><TD></TD><TD><BR><BR>If an error occurs on the site, who do we email?</TD></TR>";
$content .= "<TR><TH>Error emails sent to:</TH><TD><INPUT type=\"text\" name=\"email_error\" value=\"$EMAIL_ERROR\" size=\"30\"></TD></TR>\n";

$content .= "<TR><TD><BR><BR></TD><TD><I>Items below are only required if SMTP server is chosen</I></TR>";
$content .= "<TR><TH><I>SMTP Host:</I></TH><TD><INPUT type=\"text\" name=\"smtp_host\" value=\"$SMTP_HOST\" size=\"50\"></TD></TR>\n";

$setting = "";
if($SMTP_AUTH == "Y" )
  $setting = "CHECKED";

$content .= "<TR><TD></TD><TD><BR></TD></TR>";
$content .= "<TR><TH><I>Use SMTP AUTH?</I></TH><TD><INPUT type=\"checkbox\" name=\"smtp_auth\" $setting ></TD></TR>\n";

$content .= "<TR><TD></TD><TD><BR><I>Below is only required if SMTP AUTH is selected</I></TD></TR>";
$content .= "<TR><TH><I>SMTP AUTH username:</I></TH><TD><INPUT type=\"text\" name=\"mail_user\" value=\"$MAIL_USER\" size=\"30\"></TD></TR>\n";
$content .= "<TR><TH><I>SMTP AUTH password:</I></TH><TD><INPUT type=\"text\" name=\"mail_password\" value=\"$MAIL_PASSWORD\" size=\"30\"></TD></TR>\n";

$content .= "</TABLE><BR><BR>\n".
        "<INPUT type=\"hidden\" name=\"action\" value=\"insert\">\n".
	    "<INPUT type=\"submit\" value=\"Submit\">\n".
	    "</FORM><BR><BR>\n";

new_box_setup( "Setup - Stage 2 of 3 : Configuration", $content );
create_bottom_setup();

?>
