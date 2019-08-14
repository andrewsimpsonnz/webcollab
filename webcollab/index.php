<?php
/*
  $Id: index.php 2288 2009-08-22 08:50:00Z andrewsimpson $

  (c) 2002 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Secure the login

*/

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

include_once(BASE.'lang/lang.php' );
include_once(BASE.'includes/common.php' );
include_once(BASE.'includes/screen.php' );

//error condition
function secure_error($error='Login error', $redirect_time=0 ) {

  global $lang;

  $content = "<div style=\"text-align : center\">".$error."</div>";
  create_top($lang['login'], 1, 0, 0, $redirect_time );
  new_box($lang['error'], $content, 'boxdata-small', 'head-small' );

  if($redirect_time != 0) {
    $content = "<div style=\"text-align : center\"><a href=\"".BASE_URL."index.php\">".$lang['login_now']."</a></div>\n";
    new_box(sprintf($lang['redirect_sprt'], $redirect_time ), $content, 'boxdata-small', 'head-small' );
  }

  create_bottom();
  die;
}

//enable login
function enable_login($userid, $username, $ip='0.0.0.0', $taskid ) {

  //create session key
  try {
    //generate 40 characters hex
    $session_key = bin2hex(random_bytes(20 ) );
  } 
  //if no suitable random number sources are available in the operating system, random_bytes() will throw an exception 
  catch(Exception $e ) {
    //use Mersenne Twister algorithm (random number) to give up to 128 bits, then one-way hash to give session key
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
  
  //try and set a session cookie (if the browser will let us)
  $url = parse_url(BASE_URL );
  //use HTTP only to reduce XSS attacks (only in PHP 5.2.0+ )
  setcookie('webcollab_session', $session_key, 0, $url['path'], $url['host'], false, true );
  //(No need to record an error here if unsuccessful: the code will revert to URI session keys)

  //relocate the user to the main screen
  //(we use both URI session key and cookies initially - in case cookies don't work)
  if($taskid == 0 ) {
    header('Location: '.BASE_URL.'main.php?x='.$session_key );
  }
  else {
    header('Location: '.BASE_URL.'tasks.php?x='.$session_key.'&action=show&taskid='.$taskid );
  }
  die;
  return;
}

//perform login query
function login_query($username ) {

  //construct login query
  if(! ($q = db_prepare('SELECT id FROM '.PRE.'users WHERE user_name=? AND deleted=\'f\'', 0 ) ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  //database query
  if( ! @db_execute($q, array($username ), 0 ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  //no such user-password combination
  if( ! ($userid = @db_result($q, 0, 0) ) ) {
    secure_error('Access denied to unknown user \''.$username.'\'' );
  }
  else {
    return $userid;
  }
  return false;
}

//record recent login failures
function record_fail($username, $ip ) {

 global $lang;

  //record this login attempt
  $q = db_prepare('INSERT INTO '.PRE.'login_attempt(login_name, ip, last_attempt ) VALUES (?, ?, now() )' );
  db_execute($q, array($username, $ip ) );

  //wait 2 seconds then record an error
  sleep (2);
  secure_error($lang['no_login'], 15 );
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

function password_upgrade($userid, $password ) {

  $hash = password_hash($password, PASSWORD_DEFAULT );

  //check for valid hash
  if($hash === false ) return false;

  //update the password
  db_begin();

  $q = db_prepare('UPDATE '.PRE.'users SET user_password=? WHERE id=?' );
  db_execute($q, array($hash, $userid ) );

  db_commit();

  return true;
}

//
// MAIN LOGIN
//

//check and set taskid & nologin if required
if(isset($_GET['taskid']) && @safe_integer($_GET['taskid']) ) {
  $taskid  = $_GET['taskid'];
}
elseif(isset($_POST['taskid']) && @safe_integer($_POST['taskid']) ) {   
  $taskid = $_POST['taskid'];
}
else {
  $taskid = 0;
}

$nologin = (isset($_GET['nologin']) ) ? 1 : 0;

//secure variables
$content = '';
$q = '';
$row = '';
$hash = 'xxxx';
$salt = '';
$username = '0';
$password = '0';
$session_key = '';

//log ip address
if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
  secure_error('Unable to determine ip address');
}

// 1. Password login authentication
if(isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0 && ACTIVE_DIRECTORY != 'Y' ) {

  include_once(BASE.'database/database.php');

  $username = safe_data($_POST['username'] );

  //check for account locked
  check_lockout($username );

  //construct login query for username / password
  if(! ($q = db_prepare('SELECT id, user_password FROM '.PRE.'users WHERE user_name=? AND deleted=\'f\'', 0 ) ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  //database query
  if( ! @db_execute($q, array($username), 0 ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  //if user-password combination exists
  if($row = @db_fetch_array($q, 0 ) ) {

    //bcrypt encryption or SHA256 + salt (deprecated - used WebCollab 3.30 - 3.31 )
    if(strlen($row['user_password'] ) > 50 ){
      //verify password
      if(password_verify($_POST['password'], $row['user_password'] ) ) {
        //check need for rehash (work factor changed or older SHA256 )
        if(password_needs_rehash($row['user_password'], PASSWORD_DEFAULT ) ) {
          password_upgrade($row['id'], validate($_POST['password'] ) );
        }
        //valid password -> continue
        enable_login($row['id'], $username, $ip, $taskid );
      }
    }

    //fallback to older md5 encryption (deprecated - used WebCollab 1.01 - 3.30 )
    if(strlen($row['user_password'] ) < 35 ) {
      //verify password
      if($row['user_password'] === md5($_POST['password'] ) ) {
        //upgrade password now...
        password_upgrade($row['id'], validate($_POST['password'] ) );
        //valid password -> continue
        enable_login($row['id'], $username, $ip, $taskid );
      }
    }
  }

  //no such user-password combination
  record_fail($username, $ip);
}

// 2. Web authorisation
if(WEB_AUTH === 'Y' && isset($_SERVER['REMOTE_USER']) && (strlen($_SERVER['REMOTE_USER']) > 0 ) ) {

  include_once 'database/database.php';

  $username = safe_data($_SERVER['REMOTE_USER'] );

  if($userid = login_query($username ) ) {
    enable_login($userid, $username, $ip, $taskid );
  }
}

// 3. ACTIVE DIRECTORY login
if(ACTIVE_DIRECTORY == 'Y' && isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0 ) {

  include_once(BASE.'database/database.php');

  $username = safe_data($_POST['username']);
  $password = safe_data($_POST['password'] );

  //check for account locked
  check_lockout($username );

  if(! $adconn = ldap_connect($AD_HOST, AD_PORT ) ) {
    secure_error('ACTIVE_DIRECTORY: Connection not successful.' );
  }

  ldap_set_option($adconn, LDAP_OPT_PROTOCOL_VERSION, 3 );

  if( ! $ldap_bind = ldap_bind($adconn, $username, $password ) ) {
    secure_error($lang['no_login'], 15 );
  }

  ldap_close($adconn );

  if($userid = login_query($username ) ) {
    enable_login($userid, $username, $ip, $taskid );
  }

  //record failure
  record_fail($username, $ip );

}

// 4. Continuation of session
if(isset($_COOKIE['webcollab_session'] ) && preg_match('/^[a-f\d]{40}$/i', $_COOKIE['webcollab_session'] ) && (! $nologin ) ) {
  //allow for continuation of session if a valid cookie is already set
  // if 'nologin' is set we have just been rejected by security.php

  include_once 'database/database.php';

  //check if session is valid and within time limits
  $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'logins
                          WHERE session_key=?
                          AND lastaccess > (now()-INTERVAL '.db_delim(round(SESSION_TIMEOUT).' HOUR').')' );
  db_execute($q, array(safe_data($_COOKIE['webcollab_session']) ) );

  if(db_result($q, 0, 0 ) == 1 ) {

    //relocate to main screen, and let security.php do further checking on session validity
    if($taskid == 0 ) {
      header('Location: '.BASE_URL.'main.php' );
    }
    else {
      header('Location: '.BASE_URL.'tasks.php?action=show&taskid='.$taskid );
    }
    die;
  }
}

//
// LOGIN SCREEN
//

//create login screen
create_top($lang['login_screen'], 1, 'login', 0 );

$content = "<div style=\"text-align:center\">\n";

if(SITE_IMG != '' && SITE_IMG != 'webcollab.png' ) {
  $content .=  "<p><img src=\"images/".SITE_IMG."\" alt=\"Site logo\" /></p>\n";
}
else {
  $content .=  "<p><img src=\"images/webcollab.png\" alt=\"WebCollab logo\" width=\"322\" height=\"102\" /></p>\n";
}

$content .= "<p>".$lang['please_login'].":</p>\n".
	    "<form method=\"post\" action=\"index.php\">\n".
	    "<fieldset><input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" /></fieldset>\n".
	    "<table style=\"margin-left:auto; margin-right:auto;\">\n".
	    "<tr style=\"text-align: left\" ><td>".$lang['login'].": </td><td><input id=\"username\" class=\"size\" type=\"text\" name=\"username\" value=\"\" />".
	    "<script type=\"text/javascript\">document.getElementById('username').focus();</script></td></tr>\n".
	    "<tr style=\"text-align: left\" ><td>".$lang['password'].": </td><td><input type=\"password\" class=\"size\" name=\"password\" value=\"\" /></td></tr>\n".
	    "</table>\n".
	    "<p style=\"padding-top: 20px; padding-bottom: 20px\"><input type=\"submit\" value=\"".$lang['login_action']."\" /></p>\n".
	    "</form>\n";

switch(DATABASE_TYPE ) {

  case 'postgresql_pdo':
    $content .= "<p><a href=\"http://www.postgres.org\"><img src=\"images/postgresql-power.png\" width=\"80\" height=\"15\" alt=\"Powered by postgresql\" /></a></p>\n";
    break;

  case 'mysql_pdo':
    $content .= "<p><a href=\"http://www.mysql.com\"><img src=\"images/poweredbymysql-125.png\" width=\"125\" height=\"42\" alt=\"Powered by MySQL\" /></a></p>\n";
    break;

  default:
    $content .= "<p><a href=\"http://www.php.net\"> <img src=\"images/php-power.png\" width=\"88\" height=\"31\" alt=\"Powered by PHP\" /></a></p>\n";
    break;
}

$content .= "</div>\n";

//set box options
new_box($lang['login'], $content, 'boxdata-small', 'head-small' );

create_bottom();

?>
