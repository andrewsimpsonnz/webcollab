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
  new_box_setup("Setup error", "<center><br />".$reason."<br /></center>" );
  create_bottom_setup();
  die;

}

//security check
if( ( !isset($CONFIG_STATE ) ) || $CONFIG_STATE != "first install" ) {
  include_once('../includes/security.php' );

  if($admin != 1 ) {
    error_setup("You are not authorised to do this");
    exit;
  }
}

//essential values - must be present
$array = array("db_name", "db_user", "db_password", "db_type", "db_host", "base_url", "locale" );
foreach($array as $var ) {
  if(! isset($_POST[$var]) || $_POST[$var] == NULL ) {
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
'  //You need to add the full webservername and dir to WebCollab here. Example'."\n".
'  //"http://www.your-url-here.com/backend/org/" (do not forget the tailing slash)'."\n".
'  $BASE_URL = "'.$data["base_url"].'";'."\n\n".
'  //The name of the site'."\n".
'  $MANAGER_NAME = "'.$data["manager_name"].'";'."\n\n".
'  //The abbreviated name for the site (for use in email subject lines)'."\n".
'  $ABBR_MANAGER_NAME = "'.$data["abbr_manager_name"].'";'."\n\n".
'//-- Database parameters --'."\n\n".
'  $DATABASE_NAME = "'.$data["db_name"].'";'."\n".
'  $DATABASE_USER = "'.$data["db_user"].'";'."\n".
'  $DATABASE_PASSWORD = "'.$data["db_password"].'";'."\n\n".
'  //Database type (usual valid options are "mysql" and "postgresql")'."\n".
'  $DATABASE_TYPE = "'.$data["db_type"].'";'."\n\n".
'  //Database host (usually "localhost")'."\n".
'  $DATABASE_HOST = "'.$data["db_host"].'";'."\n\n".
'    /*Note:'."\n".
'      For PostgreSQL $DATABASE_HOST should not be changed from localhost.'."\n".
'      To use remote tcp/ip connections with PostgreSQL:'."\n".
'       - Edit pg_hba.conf (PostgreSQL config file) to allow tcp/ip connections'."\n".
'       - Start PostgreSQL postmaster with -i option'."\n".
'       - Change $DATABASE_HOST as required'."\n".
'    */'."\n\n".
'//-- File upload parameters --'."\n\n".
'  //upload to what directory ?'."\n".
'  $FILE_BASE = "'.$data["file_base"].'";'."\n\n".
'  //max file size in bytes'."\n".
'  $FILE_MAXSIZE = "'.$data["file_maxsize"].'";'."\n\n".
'    /*Note:'."\n".
'      1. Make sure the file_base directory exists, and is writeable by the webserver, or you'."\n".
'         will not be able to upload any files.'."\n".
'      2. The filebase directory should be outside your webserver root directory to maintain file'."\n".
'         security.  This is important to prevent users navigating to the file directory with'."\n".
'         their web browsers, and viewing all the files.  (The default location given is NOT outside'."\n".
'         the webserver root, but it makes first-time setup easier).'."\n".
'    */'."\n\n".
'//----------------------------------------------------------------------------------------------'."\n".
'// Less important items below this line'."\n\n".
'//-- Language --'."\n\n".
'  $LOCALE = "'.$data["locale"].'";'."\n\n".
'//-- Email --'."\n\n".
'  //If an error occurs, who do you want the error to be mailed to ?'."\n".
'  $EMAIL_ERROR= "'.$data["email_error"].'";'."\n\n".
'  //enable email to send messages? (Values are "Y" or "N")'."\n".
'  $USE_EMAIL = "'.$data["use_email"].'";'."\n\n".
'  //mail transport agent. Values are "mail" (local sockets and/or sendmail) or "SMTP" (network mail server)'."\n".
'  // default is "mail"'."\n".
'  $MAIL_METHOD = "'.$data["mail_method"].'";'."\n\n".
'  //-- These variables below are only required if "SMTP" is chosen above'."\n\n".
'    //location of SMTP server (ip address or FQDN)'."\n".
'    $SMTP_HOST = "'.$data["smtp_host"].'";'."\n\n".
'    //use smtp auth? ("Y" or "N")'."\n".
'    $SMTP_AUTH = "'.$data["smtp_auth"].'";'."\n".
'      //if using $SMTP_AUTH give username & password'."\n".
'      $MAIL_USER = "'.$data["mail_user"].'";'."\n".
'      $MAIL_PASSWORD = "'.$data["email_password"]."\";\n\n".
'  /*Note:'."\n".
'      Use $MAIL_METHOD = "mail", which uses local sockets and is faster.  If "mail" does not work (it is not reliable'."\n".
'      on all operating systems), change to "SMTP", which uses an SMTP connection over tcp/ip.'."\n".
'   */'."\n\n".
'//-- Splash image --'."\n\n".
'  //custom image to replace the webcollab banner on login page (relative base directory is /images)'."\n".
'    //(place your image into /images directory)'."\n".
'  $SITE_IMG = "'.$data["site_img"].'";'."\n\n".
'//-- MINOR CONFIG PARAMETERS --'."\n\n".
'//-- These items need to be edited directly from this file --'."\n\n".
'  //number of days that new or updated tasks should be highlighted as \'New\' or \'Updated\''."\n".
'  $NEW_TIME = "14";'."\n".
'  //show full debugging messages on the screen when errors occur (values are "N", or "Y")'."\n".
'  $DEBUG = "N";'."\n".
'  //Do not show full error message on the screen - just a \'sorry, try again\' message (values are "N", or "Y")'."\n".
'  $NO_ERROR = "N";'."\n".
'  //Use external webserver authorisation to login (values are "N", or "Y")'."\n".
'  $WEB_AUTH = "N";'."\n".
'  //Flag for automated setup program to indicate that initial setup has been completed'."\n".
'  $CONFIG_STATE = "installed";'."\n".
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

$content = "<center>\n".
"<br /><br />\n".
"<p>Setup is complete.</p>\n".
"<p>Please press the button to login...</p>\n";

if(isset($CONFIG_STATE ) && $CONFIG_STATE == "first install" )
  $content .= "<p>Your login and password are 'admin' and 'admin123'</p>\n";

$content .= "<p>Enjoy!</p>\n".
"<form name=\"inputform\" method=\"POST\" action=\"../index.php\">\n".
"<input type=\"submit\" value=\"Login\"><br /><br />\n".
"</form>\n".
"</center>\n".
"<br /><br />\n";

new_box_setup("Setup - Stage 3 of 3", $content, 400 );

create_bottom_setup();
?>


