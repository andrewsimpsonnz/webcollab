<?php
/*
  $Id: setup_setup5.php 2253 2009-07-24 09:30:14Z andrewsimpson $

  (c) 2003 - 2014 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Write setup to config

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

//essential values - must be present
$array = array('db_name', 'db_user', 'db_type', 'db_host', 'base_url', 'locale', 'timezone' );
foreach($array as $var ) {
  if(! isset($_POST[$var]) || $_POST[$var] == NULL ) {
    error_setup("Variable ".$var." is not set");
  }
  $data[$var] = $_POST[$var];
}

//non-essential values
$array = array('manager_name', 'abbr_manager_name', 'db_password', 'file_base', 'file_maxsize', 'use_email',
               'smtp_host', 'smtp_auth', 'mail_user', 'mail_password', 'tls','new_db', 'db_connect' );

foreach($array as $var ) {
  if(! isset($_POST[$var]) ) {
    $data[$var] = '';
  }
  else {
    $data[$var] = $_POST[$var];
  }
}

//these values should all be defined as constants in the existing config file...
$array = array('NUM_FILE_UPLOADS' => 3, 'FILE_DOWNLOAD' => 'inline',
               'MAIL_TRANSPORT' => 'SMTP', 'SMTP_PORT' => 25,
               'CSS_MAIN' => 'default.css', 'CSS_CALENDAR' => 'calendar.css', 'CSS_PRINT' => 'print.css',
               'SITE_IMG'     => 'webcollab.png',
               'NEW_TIME'     => 14,
               'START_DAY'    =>  0,
               'VEVENT'       => 'N',
               'RSS_AUTODISCOVERY' => 'N',
               'SESSION_TIMEOUT'   => 1, 'TOKEN_TIMEOUT' => 30, 'PASS_STYLE' => 'text', 'GUEST_LOCKED' => 'N',
               'WORK_FACTOR' => 8, 'WEB_AUTH' => 'N', 'ACTIVE_DIRECTORY' => 'N', 'AD_PORT' => '389', 'FILENAME_CHAR_SET' => 'ISO-8859-1',
               'EMAIL_ERROR'  => '',
               'DEBUG'        => 'N',
               'NO_ERROR'     => 'N',
               'PRE'          => '',
               'COMPRESS_OUTPUT' => 'N' );

//get array of constant's names
$constants = array_keys($array);

//add any missing constants
foreach($constants as $var ) {
  if(! defined($var) ) {
    define($var, $array[$var] );
  }
}

//these values should all be defined as variables in the existing config file...
$array = array('AD_HOST' => '', 'FORMAT_DATE' => 'Y-M-d', 'FORMAT_DATETIME' => 'Y-M-d G:i O' );

//get array of variable's names
$parameters = array_keys($array);

//add any missing parameters
foreach($parameters as $var ) {
  if(! isset($$var ) ) {
    $$var = $array[$var];
  }
}

//convert Windows backslash (\) to Unix forward slash (/)
$filebase = str_replace("\\", "/", $data["file_base"] );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//set up output string
$content = "<?php\n".
"/*\n".
"  ** WebCollab Configuration File **\n".
"     ============================\n\n".
"  This file was automatically generated by the setup program on ".date("D M j G:i:s T Y")."\n\n".
"*/\n\n".
"//-- Allowing Web-based Setup --\n\n".
"  //Allow web-based the setup program to alter this file (values are 'N', or 'Y')\n".
"  //Defaults to 'N' (not allowed) after a successful web based install\n".
"  //** Change this to 'Y' to allow web based configuration **\n".
'  $WEB_CONFIG = \'N\';'."\n\n".
"//-- Title and Location parameters --\n\n".
"  //You need to add the full webserver name and directory to WebCollab here. For example:\n".
"  //'http://www.your-url-here.com/backend/org/' (do not forget the tailing slash)\n".
"  define('BASE_URL', '".$data["base_url"]."' );\n\n".
"//-- Database parameters --\n\n".
"  define('DATABASE_NAME', '".$data["db_name"]."' );\n".
"  define('DATABASE_USER', '".$data["db_user"]."' );\n".
"  define('DATABASE_PASSWORD', '".$data["db_password"]."' );\n\n".
"  //Database type (valid options are 'mysql_pdo' or 'postgresql_pdo')\n".
"  define('DATABASE_TYPE', '".$data["db_type"]."' );\n\n".
"  //Database host (usually 'localhost')\n".
"  define('DATABASE_HOST', '".$data["db_host"]."' );\n\n".
"  //Database port (can usually be left empty)\n".
"  define('DATABASE_PORT', \"\" );\n\n".
"  /*Note:\n".
"    1. DATABASE_PORT is not required to be set and will default to standard ports.\n".
"    2. For PostgreSQL on UNIX/Linux setting DATABASE_HOST to \"\" (empty) will enable use of local sockets.\n".
"  */\n\n".
"//-- File upload parameters --\n\n".
"  //upload to what directory ?\n".
"  define('FILE_BASE', '".$filebase."' );\n\n".
"  //max file size in bytes\n".
"  define('FILE_MAXSIZE', '".$data["file_maxsize"]."' );\n\n".
"  //number of file upload boxes to show\n".
"  define('NUM_FILE_UPLOADS', '".NUM_FILE_UPLOADS."' );\n\n".
"  //downloaded files to be 'inline' or 'attachment'\n".
"  define('FILE_DOWNLOAD', '".FILE_DOWNLOAD."' );\n\n".
"    /*Note:\n".
"      1. Make sure the file_base directory exists, and is writeable by the webserver, or you\n".
"         will not be able to upload any files.\n".
"      2. The filebase directory should be outside your webserver root directory to maintain file\n".
"         security.  This is important to prevent users navigating to the file directory with\n".
"         their web browsers, and viewing all the files.  (The default location given is NOT outside\n".
"         the webserver root, but it makes first-time setup easier).\n".
"    */\n\n".
"//-- Language --\n\n".
"    /* Available locales are\n";

foreach ($locale_array as $key => $value ) {
  $content .= "          '".$key."'    (".$value.")\n";
}

$content .=
"    */\n\n".
"  define('LOCALE', '".$data["locale"]."' );\n\n".
"//-- Timezone --\n\n".
"  //date format (Refer to PHP manual examples for date() )\n".
"  \$FORMAT_DATE ='".$FORMAT_DATE."';\n\n".
"  //date and time format (Refer to PHP manual examples for date() )\n".
"  \$FORMAT_DATETIME = '".$FORMAT_DATETIME."';\n\n".
"  //timezone offset from GMT/UTC (hours)\n".
"  define('TZ', '".$data["timezone"]."' );\n\n".
"//-- Email --\n\n".
"  //enable email to send messages? (Values are 'Y' or 'N')\n".
"  define('USE_EMAIL', '".$data["use_email"]."' );\n\n".
"    //location of SMTP server (IP address or FQDN)\n".
"    define('SMTP_HOST', '".$data["smtp_host"]."' );\n\n".
"    //mail transport (SMTP for standard mailserver, or PHPMAIL for PHP mail() )\n".
"    define('MAIL_TRANSPORT', '".MAIL_TRANSPORT."' );\n".
"    //SMTP port (leave as 25 for ordinary mailservers)\n".
"    define('SMTP_PORT', ".SMTP_PORT." );\n\n".
"    //use smtp auth? ('Y' or 'N')\n".
"    define('SMTP_AUTH', '".$data["smtp_auth"]."' );\n".
"      //if using SMTP_AUTH give username & password\n".
"      define('MAIL_USER', '".$data["mail_user"]."' );\n".
"      define('MAIL_PASSWORD', '".$data["mail_password"]."' );\n".
"      //use TLS encryption?\n".
"      define('TLS', '".$data["tls"]."' );\n\n".
"//----------------------------------------------------------------------------------------------\n".
"// Less important items below this line\n\n".
"//-- These items need to be edited directly from this file --\n\n".
"//STYLE AND APPEARANCE\n\n".
"  //Style sheets (CSS) (Place your CSS into /css directory)\n".
"  //  Note: Setup always uses 'setup.css' stylesheet as defined in [webcollab]/setup/setup_config.php\n".
"  define('CSS_MAIN', '".CSS_MAIN."' );\n".
"  define('CSS_CALENDAR', '".CSS_CALENDAR."' );\n".
"  define('CSS_PRINT', '".CSS_PRINT."' );\n\n".
"  //custom image to replace the webcollab banner on splash page (base directory is /images)\n".
"  define('SITE_IMG', '".SITE_IMG."' );\n\n".
"  //number of days that new or updated tasks should be highlighted as 'New' or 'Updated'\n".
"  define('NEW_TIME', ".NEW_TIME." );\n\n".
"//CALENDAR CONTROLS\n\n".
"  //Start day of week on calendar (Sun = 0, Mon = 1, Tue = 2, Wed = 3, etc)\n".
"  define('START_DAY', ".START_DAY." );\n\n".
"  //Use VEVENT for iCalendar instead of VTODO - works for Google Calendar and others (values are 'N', or 'Y')\n".
"  define('VEVENT', '".VEVENT."' );\n\n".
"//RSS\n\n".
"  //enable autodiscovery of rss feeds by web browser\n".
"  define('RSS_AUTODISCOVERY', '".RSS_AUTODISCOVERY."' );\n\n".
"//LOGIN CONTROLS\n\n".
"  //session timeout in hours\n".
"  define('SESSION_TIMEOUT', ".SESSION_TIMEOUT." );\n\n".
"  //security token timeout for forms (in minutes)\n".
"  define('TOKEN_TIMEOUT', ".TOKEN_TIMEOUT." );\n\n".
"  //Show passwords in user edit screens as plain text or hidden ('****') (values are 'text', or 'password')\n".
"  define('PASS_STYLE', '".PASS_STYLE."' );\n\n".
"  //Stop GUEST users from changing their login details or posting in the forums (values are 'N', or 'Y')\n".
"  define('GUEST_LOCKED', '".GUEST_LOCKED."' );\n\n".
"//LOGIN AUTHENTICATION\n\n".
"  //Work factor for Blowfish password hashing (values are 4 to 31, for default use 8)\n".
"  define('WORK_FACTOR', ".WORK_FACTOR." );\n\n".
"  //Use external webserver authorisation to login (values are 'N', or 'Y')\n".
"  define('WEB_AUTH', 'N' );\n\n".
"  //Use Active Directory to authenticate (values are 'N', or 'Y')\n".
"  define('ACTIVE_DIRECTORY', 'N' );\n\n".
"  //address and port of Active Directory server\n".
"  \$AD_HOST = '".$AD_HOST."';\n".
"  define('AD_PORT', 389 );\n\n".

"//ERROR DEBUGGER\n\n".
"  //If an error occurs, who do you want the error to be mailed to ?\n".
"  define('EMAIL_ERROR', '".EMAIL_ERROR."' );\n\n".
"  //show full debugging messages on the screen when errors occur (values are 'N', or 'Y')\n".
"  define('DEBUG', '".DEBUG."' );\n\n".
"  //Do not show full error message on the screen - just a 'sorry, try again' message (values are 'N', or 'Y')\n".
"  define('NO_ERROR', '".NO_ERROR."' );\n\n".
"//DATABASE\n\n".
"  //Use to set a prefix to the database table names (Note: Table names in /db directory will need be manually changed to match)\n".
"  define('PRE', '".PRE."' );\n\n".
"//OUTPUT COMPRESSION\n\n".
"  //Use to enable zlib output compression of web pages (values are 'N', or 'Y')\n".
"  define('COMPRESS_OUTPUT', '".COMPRESS_OUTPUT."' );\n\n".
"// LEGACY FILE UPLOADS\n\n".
"  //Character set hack for older files stored with pre-WebCollab 3.00 that have been upgraded (usually 'ISO-8859-1')\n". 
"  define('".FILENAME_CHAR_SET."', '' );\n\n".
"//WEBCOLLAB VERSION\n\n".
"  //WebCollab version string\n".
"  define('WEBCOLLAB_VERSION', '".SETUP_WEBCOLLAB_VERSION."');\n\n".
"?>\n";

//open file for writing
if(! $handle = @fopen(BASE_CONFIG.'config.php', 'w' ) ) {
  error_setup("Cannot open ".BASE_CONFIG."config file for writing");
}

//write to file
 if (! fwrite($handle, $content ) ) {
   error_setup("Cannot write to file");
   exit;
 }

create_top_setup($lang_setup['setup5_banner1'] );

//do we have a new database?
if(isset($data['new_db'] ) && ($data['new_db'] == 'Y' ) ) {

  //generate variables to set new session key
  $xnew = sha1(mt_rand().mt_rand().mt_rand().mt_rand() );
  $ip   = $_SERVER['REMOTE_ADDR'];

  //make database connection
  db_setup_connect($data);

  //set the new session key in the new database
  try {
    $dbh->query('INSERT INTO '.PRE.'logins( user_id, session_key, ip, lastaccess ) VALUES(\'1\', '.$dbh->quote($xnew ).', '.$dbh->quote($ip ).', now() )' );
  }
  catch (PDOException $e) {
    $error = $e->getMessage();
    abort("Database query failed:<br />".$error );
  }

  //update the site names in the database
  site_name($data);

  //next form with new session key in place
  $content = "<p style=\"text-align:center\">".$lang_setup['setup5_writing']."</p>\n".
             "<form method=\"post\" action=\"setup_handler.php\">\n".
             "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$xnew."\" />\n".
             "<input type=\"hidden\" name=\"action\" value=\"setup6\" /></fieldset>\n".
             "<p style=\"text-align:center\">".
             "<input type=\"submit\" value=\"".$lang_setup['setup5_continue']."\" /></p>\n".
             "</form>\n";

    new_box_setup($lang_setup['setup5_banner1'], $content, 'boxdata-small', 'head-small', 'boxstyle-normal' );
    create_bottom_setup();
    die;

}

//existing database has been reconfigured...

//make database connection
db_setup_connect($data);
//update the site names in the database
site_name($data);

$content = $lang_setup['setup5_complete']."\n".
           "<form method='post' action='index.php'>\n".
           "<p style=\"text-align:center\">".
           "<input type='submit' value='".$lang_setup['finish']."' /></p>\n".
           "</form>\n";

new_box_setup($lang_setup['setup5_banner2'], $content, 'boxdata-small', 'head-small', 'boxstyle-normal' );
create_bottom_setup();

//
// Connect to the database
//

function db_setup_connect($data ) {

  global $dbh;

  switch($data["db_type"]) {

    //make connection
    case 'mysql_pdo':
      try {
        $dbh = new PDO('mysql:host='.$data["db_host"].';dbname='.$data["db_name"], $data["db_user"],$data["db_password"] );

        //set error handling
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $e) {
        $error = $e->getMessage();
        abort("Not able to connect to database server:<br />".$error );
      }
      break;

    case 'postgresql_pdo':

      //set host string correctly
      $host = ($data["db_host"] != 'localhost' ) ? 'host='.$data["db_host"]: '';

      //make connection
      try {

        $dbh = new PDO('pgsql:host='.$data["db_host"].' port=5432 dbname='.$data["db_name"].' user='.$data["db_user"].' password='.$data["db_password"] );

        //set error handling
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (PDOException $e) {
        $error = $e->getMessage();
        abort("Not able to connect to database server:<br />".$error );
      }
      break;

    default:
      abort("Not a valid database type" );
      break;
  }
  return;
}

//
// Add the site names to the database
//

function site_name($data ) {

global $dbh;

  try {
    switch($data["db_type"]) {

      case 'mysql_pdo':
          //set character set -- 1
        $dbh->query('SET CHARACTER SET utf8' );

        //set character set -- 2
        $dbh->query('SET NAMES \'utf8\'' );

        break;

      case 'postgresql_pdo':
        //set correct encoding
        $dbh->query('SET client_encoding to \'UNICODE\'' );

        break;

      default:
        abort("Not a valid database type" );
        break;
    }
    //update the site names in the database
    $dbh->query("UPDATE ".PRE."site_name SET manager_name=".$dbh->quote($data["manager_name"] ).", abbr_manager_name=".$dbh->quote($data["abbr_manager_name"] ) );
  }
  catch (PDOException $e) {
    $error = $e->getMessage();
    abort("Database server error:<br />".$error );
  }

  return;
}

//
// New database - and not able to connect
//

function abort($message ) {

  global $lang_setup;

  $content = "<p>".$lang_setup['setup5_writing']."</p>\n".
             $lang_setup['setup5_no_db']."\n";

  $content .= "<form method='post' action='index.php'>\n".
              "<p style=\"text-align:center\">".
              "<input type='submit' value='".$lang_setup['finish']."' /></p>\n".
              "</form>\n";

  new_box_setup($lang_setup['setup5_banner3'], $content, 'boxdata-small', 'head-small', 'boxstyle-normal' );

  if(DEBUG == 'Y' ) {

    new_box_setup('Debugging info', $message, 'boxdata-small', 'head-small', 'boxstyle-normal' );
  }

  create_bottom_setup();
  die;
}

?>