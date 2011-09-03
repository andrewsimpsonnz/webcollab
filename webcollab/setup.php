<?php
/*
  $Id: setup.php 2288 2009-08-22 08:50:00Z andrewsimpson $

  (c) 2003 - 2011 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
if(isset($_REQUEST['lang'] ) ) {
  $locale_setup = $_REQUEST['lang'];
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

function secure_error($message ) {

  create_top_setup("Error" );
  new_box_setup("Error", "<div style=\"text-align:center\">".$message."</div>", "boxdata", "singlebox" );
  create_bottom_setup();
  die;

}

//
// LOGIN CHECK
//

//valid login attempt ?
if( (isset($_POST['username']) && isset($_POST['password']) ) ) {

  include_once(BASE.'includes/common.php' );
  include_once(BASE.'database/database.php' );

  //initialise variables
  $q = '';
  $q_array = '';

  $username = safe_data($_POST['username']);
  //encrypt password
  $md5pass = md5($_POST['password'] );

  //no ip (possible?)
  if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
    secure_error("Unable to determine ip address");
  }

  if(! defined('PRE') ){
    define('PRE', '' );
  }

  //do query and check database connection
  if( ! ($q = db_prepare('SELECT id FROM '.PRE.'users WHERE deleted=\'f\' AND admin=\'t\'
                                 AND name=? AND password=?', 0 ) ) ) {
    secure_error("Not a valid username, or password" );
  }

  if(! db_execute($q, array($username, $md5pass ), 0 ) ) {
   secure_error('Unable to connect to database.  Please try again later.' );
  }

  //no such user-password combination
  if( ! ($user_id = @db_result($q, 0, 0) ) ) {

    //count the number of recent login attempts
    if(! ($q = db_prepare('SELECT COUNT(*) FROM '.PRE.'login_attempt
                            WHERE name=? AND last_attempt > (now()-INTERVAL '.$delim.'10 MINUTE'.$delim.') LIMIT 4', 0 ) ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }

    if(! db_execute($q, array($username ), 0 ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }

    //protect against password guessing attacks
    if(db_result($q, 0, 0 ) > 3 ) {
      secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    }

    //record this login attempt
    $q = db_prepare('INSERT INTO '.PRE.'login_attempt(name, ip, last_attempt ) VALUES (?, ?, now() )' );
    db_execute($q, array($username, $ip ) );

    //wait two seconds then record an error
    sleep(2);
    secure_error("Not a valid username, or password" );
  }

  //user is okay log him/her in

  //create session key
  $session_key = md5(mt_rand().$ip );

  //remove the old login information
  $q = db_prepare('DELETE FROM '.PRE.'logins WHERE user_id=?' );
  @db_execute($q, array($user_id ) );
  $q = db_prepare('DELETE FROM '.PRE.'login_attempt WHERE last_attempt < (now()-INTERVAL '.$delim.'20 MINUTE'.$delim.') OR name=?' );
  @db_execute($q, array($username ) );

  //log the user in
  $q = db_prepare('INSERT INTO '.PRE.'logins( user_id, session_key, ip, lastaccess ) VALUES (?, ?, ?, now() )' );
  @db_execute($q, array($user_id, $session_key, $ip ) );

  header('Location: '.BASE_URL.'setup_handler.php?x='.$session_key.'&action=setup1&lang='.$locale_setup );
  die;
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
if(version_compare(PHP_VERSION, '5.1.0' ) == -1 ) {
  secure_error($lang_setup['min_version'] );
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
             "<table border=\"0\">\n";
}
else {

  $content = "<p>".$lang_setup['require_login']."</p>\n".
             "<form method=\"post\" action=\"setup.php\">\n".
             "<table border=\"0\">\n".
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
new_box_setup($lang_setup['setup_banner'], $content, 'boxdata', 'singlebox' );

create_bottom_setup();

?>