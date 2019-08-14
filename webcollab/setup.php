<?php
/*
  $Id: setup.php 2288 2009-08-22 08:50:00Z andrewsimpson $

  (c) 2003 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Secure the setup login

*/

//set initial safe values
$WEB_CONFIG = "N";

//set language
if(isset($_POST['lang'] ) && preg_match('/^[a-zA-Z0-9\-_]+$/', $_POST['lang'] ) ) {
  $locale_setup = $_POST['lang'];
}

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php');
include_once(BASE.'lang/lang_setup.php' );
include_once(BASE.'setup/screen_setup.php' );

//
// ERROR FUNCTION
//

function secure_error($error ) {

  $content = "<div style=\"text-align : center\">".$error."</div>";
  create_top_setup("Error" );
  new_box_setup('Setup error', $content, 'boxdata-small', 'head-small', 'boxstyle-normal' );
  create_bottom_setup();
  die;
}

//enable login
function enable_login($userid, $username, $ip='0.0.0.0' ) {

  global $locale_setup;

  //create session key
  try {
    $session_key = bin2hex(random_bytes(20 ) );
  }
  catch(Exception $e ) {
    //use Mersenne Twister algorithm (random number), then one-way hash to give session key
    $session_key = sha1(mt_rand().mt_rand().mt_rand().mt_rand() );
  }

  //remove the old login information
  $q = db_prepare('DELETE FROM '.PRE.'logins WHERE user_id=?' );
  @db_execute($q, array($userid ) );
  $q = db_prepare('DELETE FROM '.PRE.'login_attempt WHERE last_attempt < (now()-INTERVAL '.db_delim('20 MINUTE' ).') OR login_name=?' );
  @db_execute($q, array($username ) );
  @db_query('DELETE FROM '.PRE.'tokens WHERE lastaccess < (now()-INTERVAL '.db_delim(TOKEN_TIMEOUT.' MINUTE' ).')' );

  //log the user in
  $q = db_prepare('INSERT INTO '.PRE.'logins(user_id, session_key, ip, lastaccess ) VALUES (?, ?, ?, now() )' );
  @db_execute($q, array($userid, $session_key, $ip ) );

  header('Location: '.BASE_URL.'setup_handler.php?x='.$session_key.'&action=setup1&lang='.$locale_setup );
  die;
  return;
}

//record recent login failures
function record_fail($username, $ip ) {

  global $lang_setup;

  //record this login attempt
  $q = db_prepare('INSERT INTO '.PRE.'login_attempt(login_name, ip, last_attempt ) VALUES (?, ?, now() )' );
  db_execute($q, array($username, $ip ) );

  //wait 2 seconds then record an error
  sleep (2);
  secure_error($lang_setup['no_login'] );
  die;
}

//limit number of login attempts
function check_lockout($username ) {

  //count the number of recent failed login attempts
  if(! ($q = db_prepare('SELECT COUNT(*) FROM '.PRE.'login_attempt WHERE login_name=?
			      AND last_attempt > (now()-INTERVAL '.db_delim('10 MINUTE').') LIMIT 6', 0 ) ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  if( ! @db_execute($q, array($username ), 0 ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  $count_attempts = db_result($q, 0, 0 );

  //protect against password guessing attacks
  if($count_attempts > 4 ) {
    secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    die;
  }

  return true;
}

//
// LOGIN CHECK
//

//secure variables
$content = '';
$q = '';
$row = '';
$ip = '';
$hash = 'xxxx';
$salt = '';
$username = '0';
$md5pass = '0';
$session_key = '';

if(isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0 ) {

  include_once(BASE.'database/database.php' );
  include_once(BASE.'includes/common.php' );

  if(! defined('PRE') ){
    define('PRE', '' );
  }

  $username = safe_data($_POST['username'] );

  //check for account locked
  check_lockout($username );

  //construct login query for username / password
  if(! ($q = db_prepare('SELECT id, user_password FROM '.PRE.'users WHERE user_name=? AND deleted=\'f\'', 0 ) ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  if(! db_execute($q, array($username ), 0 ) ) {
   secure_error('Unable to connect to database.  Please try again later.' );
  }

  //if user-password combination exists
  if($row = @db_fetch_array($q, 0 ) ) {

      //bcrypt encryption or SHA256 + salt (deprecated - used WebCollab 3.30 - 3.31 )
    if(strlen($row['user_password'] ) > 50 ){
      //verify password
      if(password_verify($_POST['password'], $row['user_password'] ) ) {
        //valid password -> continue
        enable_login($row['id'], $username, $ip );
      }
    }

    //fallback to older md5 encryption (deprecated - used WebCollab 1.01 - 3.30 )
    if(strlen($row['user_password'] ) < 35 ) {
      //verify password
      if($row['user_password'] === md5($_POST['password'] ) ) {
        //valid password -> continue
       enable_login($row['id'], $username, $ip );
      }
    }
  }

  record_fail($username, $ip);
}


//
// MAIN PROGRAM
//

//security checks
if( ! isset($WEB_CONFIG ) || $WEB_CONFIG !== 'Y' ) {
  secure_error($lang_setup['no_config'] );
  die;
}

//version check
if(version_compare(PHP_VERSION, '7.0.0' ) == -1 ) {
  secure_error(sprintf($lang['min_version'], '7.0.0', PHP_VERSION ) );
  }

//check that UTF-8 character encoding can be used
if(! function_exists('mb_internal_encoding') ) {
  secure_error($lang_setup['no_mbstring'] );
}

//check for initial install
if((DATABASE_NAME == '' ) && isset($_POST['status'] ) && ($_POST['status'] == 'submitted' ) ) {
  //this is an initial install
  header('Location: '.BASE_URL.'setup_handler.php?action=setup1&lang='.$locale_setup );
  die;
}

//login box screen code
create_top_setup($lang_setup['setup_banner'] );

if(DATABASE_NAME == '' ) {

  $content = "<form method=\"post\" action=\"setup.php\">\n".
             "<fieldset><input type=\"hidden\" name=\"status\" value=\"submitted\" /></fieldset>\n".
             "<table style=\"border: 0\">\n";
}
else {

  $content = "<p>".$lang_setup['require_login']."</p>\n".
             "<form method=\"post\" action=\"setup.php\">\n".
             "<table style=\"border: 0\">\n".
             "<tr><td>".$lang_setup['login']."</td><td><input type=\"text\" class=\"size\" name=\"username\" /></td></tr>\n".
             "<tr><td>".$lang_setup['password']."</td><td><input type=\"password\" class=\"size\" name=\"password\" value=\"\" /></td></tr>\n";
}

$content .= "<tr><td>".$lang_setup['language']."</td><td>\n".
            "<select name=\"lang\">\n";

foreach ($setup_language as $key => $value ) {
  $content .= "<option value=\"".$key."\"";

  if($locale_setup == $key ) {
    $content .= " selected=\"selected\" ";
  }

  $content .= ">".$value."</option>\n";
}

$content .= "</select></td></tr>\n".
            "</table>\n".
            "<p style=\"text-align:center\">\n".
            "<input type=\"submit\" value=\"".$lang_setup['submit']."\" /></p>\n".
            "</form>\n";

//set box options
new_box_setup($lang_setup['setup_banner'], $content, 'boxdata-small', 'head-small' );

create_bottom_setup();

?>
