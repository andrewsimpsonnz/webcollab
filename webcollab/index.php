<?php
/*
  $Id: index.php 2288 2009-08-22 08:50:00Z andrewsimpson $

  (c) 2002 - 2011 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//secure variables
$content = '';

//error condition
function secure_error( $error = 'Login error', $redirect_time=0 ) {

  global $lang;

  $content = "<div style=\"text-align : center\"><br />$error<br /></div>";
  create_top($lang['login'], 1, 0, 0, $redirect_time );
  new_box($lang['error'], $content, 'boxdata-small', 'head-small' );

  if($redirect_time != 0) {
    $content = "<div style=\"text-align : center\"><a href=\"".BASE_URL."index.php\">".$lang['login_now']."</a></div>\n";
    new_box(sprintf($lang['redirect_sprt'], $redirect_time ), $content, 'boxdata-small', 'head-small' );
  }

  create_bottom();
  die;
}

//check and set taskid & nologin if required
$taskid  = (isset($_GET['taskid']) && @safe_integer($_GET['taskid']) ) ? $_GET['taskid'] : 0;
$nologin = (isset($_GET['nologin']) ) ? 1 : 0;

//valid login attempt ?
if( (isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0 )
    || (isset($_SERVER['REMOTE_USER'])  && (strlen($_SERVER['REMOTE_USER']) > 0 ) && WEB_AUTH === 'Y' ) ) {

  $q = '';
  $ip = '';
  $q_array = '';
  $username = '0';
  $md5pass = '0';
  $session_key = '';

  include_once(BASE.'database/database.php');

 //no ip (possible?)
  if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
    secure_error('Unable to determine ip address');
  }

  if(WEB_AUTH === 'Y' ) {
      //construct login query
      if(! ($q = db_prepare('SELECT id FROM '.PRE.'users WHERE name=? AND deleted=\'f\'', 0 ) ) ) {
        secure_error('Unable to connect to database.  Please try again later.' );
      }
      $q_array = array(safe_data($_SERVER['REMOTE_USER'] ) );
  }
  else {
    $username = safe_data($_POST['username']);
    //encrypt password
    $md5pass = md5($_POST['password'] );

    //construct login query
    if(! ($q = db_prepare('SELECT id FROM '.PRE.'users WHERE password=? AND name=? AND deleted=\'f\'', 0 ) ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }
    $q_array = array($md5pass, $username );
  }

  //database query
  if( ! @db_execute($q, $q_array, 0 ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  //no such user-password combination
  if( ! ($user_id = @db_result($q, 0, 0) ) ) {

    //count the number of recent failed login attempts
    if(! ($q = db_prepare('SELECT COUNT(*) FROM '.PRE.'login_attempt WHERE name=?
                               AND last_attempt > (now()-INTERVAL '.$delim.'10 MINUTE'.$delim.') LIMIT 6', 0 ) ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }


    if( ! @db_execute($q, array($username ), 0 ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }

    $count_attempts = db_result($q, 0, 0 );

    //protect against password guessing attacks
    if($count_attempts > 4 ) {
      secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    }

    //record this login attempt
    $q = db_prepare('INSERT INTO '.PRE.'login_attempt(name, ip, last_attempt ) VALUES (?, ?, now() )' );
    db_execute($q, array($username, $ip ) );

    //wait 2 seconds then record an error
    sleep (2);
    secure_error($lang['no_login'], 15 );
  }

  //user is okay log him/her in

  //create session key
  //use Mersenne Twister algorithm (random number) + user's IP address, then one-way hash to give session key
  $session_key = md5(mt_rand().$ip );

  //remove the old login information
  $q = db_prepare('DELETE FROM '.PRE.'logins WHERE user_id=?' );
  @db_execute($q, array($user_id ) );
  $q = db_prepare('DELETE FROM '.PRE.'login_attempt WHERE last_attempt < (now()-INTERVAL '.$delim.'20 MINUTE'.$delim.') OR name=?' );
  @db_execute($q, array($username ) );
  @db_query('DELETE FROM tokens WHERE lastaccess < (now()-INTERVAL '.$delim.TOKEN_TIMEOUT.' MINUTE'.$delim.')' );

  //log the user in
  $q = db_prepare('INSERT INTO '.PRE.'logins(user_id, session_key, ip, lastaccess ) VALUES (?, ?, ?, now() )' );
  @db_execute($q, array($user_id, $session_key, $ip ) );

  //try and set a session cookie (if the browser will let us)
  $url = parse_url(BASE_URL );
  if(version_compare(PHP_VERSION, '5.2.0', '>=' ) ) {
    //use HTTP only to reduce XSS attacks (only in PHP 5.2.0+ )
    setcookie('webcollab_session', $session_key, 0, $url['path'], $url['host'], false, true );
  }
  else {
    setcookie('webcollab_session', $session_key, 0, $url['path'], $url['host'] );
  }
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
}

//allow for continuation of session if a valid cookie is already set
// if 'nologin' is set we have just been rejected by security.php
if(isset($_COOKIE['webcollab_session'] ) && preg_match('/^[a-f\d]{32}$/i', $_COOKIE['webcollab_session'] ) && (! $nologin ) ) {

  include_once 'includes/common.php';
  include_once 'database/database.php';

  //check if session is valid and within time limits
  $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'logins
                          WHERE session_key=?
                          AND lastaccess > (now()-INTERVAL '.$delim.round(SESSION_TIMEOUT).' HOUR'.$delim.')' );
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

create_top($lang['login_screen'], 1, 'login', 0 );

$content = "<div style=\"text-align:center\">\n";

if(SITE_IMG != '' ) {
  $content .=  "<p><img src=\"images/".SITE_IMG."\" alt=\"WebCollab logo\" /></p>\n";
}
else {
  $content .=  "<p><img src=\"images/webcollab.png\" alt=\"WebCollab logo\" /></p>\n";
}

$content .= "<p>".$lang['please_login'].":</p>\n".
            "<form method=\"post\" action=\"index.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" /></fieldset>\n".
            "<table style=\"margin-left:auto; margin-right:auto;\">\n".
            "<tr align=\"left\" ><td>".$lang['login'].": </td><td><input id=\"username\" class=\"size\" type=\"text\" name=\"username\" value=\"\" />".
            "<script type=\"text/javascript\">document.getElementById('username').focus();</script></td></tr>\n".
            "<tr align=\"left\" ><td>".$lang['password'].": </td><td><input type=\"password\" class=\"size\" name=\"password\" value=\"\" /></td></tr>\n".
            "</table>\n".
            "<p style=\"padding-top: 20px; padding-bottom: 20px\"><input type=\"submit\" value=\"".$lang['login_action']."\" /></p>\n".
            "</form>\n";

  switch(DATABASE_TYPE ) {
  case 'postgresql_pdo':
    $content .= "<p><a href=\"http://www.postgres.org\"><img src=\"images/postgresql-power.gif\" alt=\"Powered by postgresql\" /></a></p>\n";
    break;

  case 'mysql_pdo':
    $content .= "<p><a href=\"http://www.mysql.com\"><img src=\"images/poweredbymysql-125.png\" alt=\"Powered by MySQL\" /></a></p>\n";
    break;

  default:
     $content .= "<p><a href=\"http://www.php.net\"> <img src=\"images/php-power.png\" alt=\"Powered by PHP\" /></a></p>\n";
     break;
}

$content .= "</div>\n";

//set box options
new_box($lang['login'], $content, 'boxdata-small', 'head-small' );

create_bottom();

?>
