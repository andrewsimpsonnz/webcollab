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

  Write setup to config

*/

include_once( "./screen_setup.php" );
include_once( "../config.php" );

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
  include_once('../includes/security.php' );

  if($admin != 1 ) {
    error_setup("You are not authorised to do this");
    exit;
  }
}

//essential values - must be present
$array = array("db_name", "db_user", "db_password", "db_type", "db_host", "base_url", "locale" );
foreach($array as $var ) {
  if(! isset($_POST[$var]) ) {
    error_setup("Variable ".$var." is not set");
  }
  $data[$var] = $_POST[$var];
}


//non-essential values
$array = array("manager_name", "abbr_manager_name", "file_base", "file_maxsize", "email_error", "use_email",
                "mail_method", "smtp_host", "smtp_auth", "mail_user", "email_password", "site_img" );

foreach($array as $var ) {
  if(! isset($_POST[$var]) )
    $data[$var] = "";
  else
    $data[$var] = $_POST[$var];
}

//convert checkboxes to 'Y' or 'N'
$array = array("use_email", "smtp_auth" );
foreach($array as $var ) {
  if($data[$var] == "on" )
    $data[$var] = "Y";
  else
    $data[$var] = "N";
}


//set up output string
$content = "<?php\n".
'//-- Title and Location parameters --'."\n\n".
'$BASE_URL = "'.$data["base_url"].'";'."\n".
'$MANAGER_NAME = "'.$data["manager_name"].'";'."\n".
'$ABBR_MANAGER_NAME = "'.$data["abbr_manager_name"].'";'."\n\n".
'//-- Database parameters --'."\n\n".
'$DATABASE_NAME = "'.$data["db_name"].'";'."\n".
'$DATABASE_USER = "'.$data["db_user"].'";'."\n".
'$DATABASE_PASSWORD = "'.$data["db_password"].'";'."\n".
'$DATABASE_TYPE = "'.$data["db_type"].'";'."\n".
'$DATABASE_HOST = "'.$data["db_host"].'";'."\n\n".
'//-- File upload parameters --'."\n\n".
'$FILE_BASE = "'.$data["file_base"].'";'."\n".
'$FILE_MAXSIZE = "'.$data["file_maxsize"].'";'."\n".
'//----------------------------------------------------------------------------------------------'."\n".
'// Less important items below this line'."\n\n".
'//-- Language --'."\n\n".
'$LOCALE = "'.$data["locale"].'";'."\n\n".
'//-- Email --'."\n\n".
'$EMAIL_ERROR= "'.$data["email_error"].'";'."\n".
'$USE_EMAIL = "'.$data["use_email"].'";'."\n".
'$MAIL_METHOD = "'.$data["mail_method"].'";'."\n".
'//-- These variables below are only required if "SMTP" is chosen above'."\n".
'   $SMTP_HOST = "'.$data["smtp_host"].'";'."\n".
'   $SMTP_AUTH = "'.$data["smtp_auth"].'";'."\n".
'   $MAIL_USER = "'.$data["mail_user"].'";'."\n".
'   $MAIL_PASSWORD = "'.$data["email_password"]."\";\n\n".
'//-- Splash image --'."\n\n".
'$SITE_IMG = "'.$data["site_img"].'";'."\n\n".
'//-- MINOR CONFIG PARAMETERS --'."\n\n".
'//-- These items need to be edited directly from this file --'."\n\n".
'//number of days that new or updated tasks should be highlighted as \'New\' or \'Updated\''."\n".
'$NEW_TIME = "14";'."\n".
'//show full debugging messages on the screen when errors occur (values are "N", or "Y")'."\n".
'$DEBUG = "N";'."\n".
'//Do not show full error message on the screen - just a \'sorry, try again\' message (values are "N", or "Y")'."\n".
'$NO_ERROR = "N";'."\n".
'//Use external webserver authorisation to login (values are "N", or "Y")'."\n".
'$WEB_AUTH = "N";'."\n".
'//change this to \'initial install\' to have the installer create a new database'."\n".
'$CONFIG_STATE = "complete";'."\n".
"?>\n";

//open file for writing
if(! $handle = fopen("../config.php", "w" ) ) {
  error_setup("Cannot open config file for writing");
}

//write to file
 if (! fwrite($handle, $content ) ) {
   error_setup("Cannot write to file");
   exit;
 }

//show success message
create_top_setup("Setup Screen", 1);

$content = "<CENTER>\n".
"<BR><BR>\n".
"<IMG src=\"../images/webcollab.png\" alt=\"WebCollab logo\"><BR><BR>\n".
"<P><B>Setup - Stage 3 of 3 : Your first login...</B></P>\n".
"<P>Setup is complete.</P>\n".
"<P>Please press the button to login for the first time.</P>\n";

if($CONFIG_STATE == "initial install" )
  $content .= "<P>Your login and password are \'admin\' and \'admin123\'</P>\n";

$content .= "<P>Enjoy!</P>\n".
"<FORM name=\"inputform\" method=\"POST\" action=\"../index.php\">\n".
"<INPUT type=\"submit\" value=\"Login\"><BR><BR>\n".
"</FORM>\n".
"<DIV align=\"CENTER\">\n".
"<BR><BR>\n";

new_box_setup("Setup - Stage 3 of 3", $content, 400 );

create_bottom_setup();
?>


