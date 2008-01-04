<?php
/*
  $Id$

  (c) 2002 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
function secure_error( $error = 'Login error', $redirect=0 ) {

  global $lang;

  if($redirect == 1) {
    $redirect_time = 15;
  }
  else {
    $redirect_time = 0;
  }
  $content = "<div style=\"text-align : center\"><br />$error<br /></div>";
  create_top($lang['login'], 1, '', '', '', '', $redirect_time );
  new_box($lang['error'], $content, 'boxdata', 'singlebox' );

  if($redirect_time != 0) {
    $content = "<div style=\"text-align : center\"><a href=\"".BASE_URL."index.php\">".$lang['login_now']."</a></div>\n";
    new_box(sprintf($lang['redirect_sprt'], $redirect_time ), $content, 'boxdata', 'singlebox' );
  }

  create_bottom();
  die;
}

//check and set taskid if required
$taskid = (isset($_REQUEST['taskid']) && @safe_integer($_REQUEST['taskid']) ) ? $_REQUEST['taskid'] : 0;

//valid login attempt ?
if( (isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0 )
    || (isset($_SERVER['REMOTE_USER'])  && (strlen($_SERVER['REMOTE_USER']) > 0 ) && WEB_AUTH === 'Y' ) ) {

  $q = '';
  $ip = '';
  $login_q ='';
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
      $login_q = 'SELECT id FROM '.PRE.'users WHERE name=\''.safe_data($_SERVER['REMOTE_USER'] ).'\' AND deleted=\'f\'';
  }
  else {
    $username = safe_data($_POST['username']);
    //encrypt password
    $md5pass = md5($_POST['password'] );


    //construct login query
    $login_q = 'SELECT id FROM '.PRE.'users WHERE password=\''.$md5pass.'\' AND name=\''.$username.'\' AND deleted=\'f\'';
  }

  //set character set & connect to database
  db_user_locale(CHARACTER_SET);

  //database query
  if( ! $q = @db_query($login_q, 0 ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  //no such user-password combination
  if( @db_numrows($q) < 1 ) {

    //count the number of recent failed login attempts
    if( ! $q = @db_query('SELECT COUNT(*) FROM '.PRE.'login_attempt
                               WHERE name=\''.$username.'\'
                               AND last_attempt > (now()-INTERVAL '.$delim.'10 MINUTE'.$delim.') LIMIT 6', 0 ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }

    $count_attempts = db_result($q, 0, 0 );

    //protect against password guessing attacks
    if($count_attempts > 4 ) {
      secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    }

    //record this login attempt
    db_query('INSERT INTO '.PRE.'login_attempt(name, ip, last_attempt ) VALUES (\''.$username.'\', \''.$ip.'\', now() )' );

    //wait 2 seconds then record an error
    sleep (2);
    secure_error($lang['no_login'], 1 );
  }

  //no user-id
  if( ! ($user_id = @db_result($q, 0, 0) ) ) {
    secure_error('Unknown user id', 1 );
  }

  //user is okay log him/her in

  //create session key
  //use Mersenne Twister algorithm (random number) + user's IP address, then one-way hash to give session key
  $session_key = md5(mt_rand().$ip );

  //remove the old login information
  @db_query('DELETE FROM '.PRE.'logins WHERE user_id='.$user_id );
  @db_query('DELETE FROM '.PRE.'login_attempt WHERE last_attempt < (now()-INTERVAL '.$delim.'20 MINUTE'.$delim.') OR name=\''.$username.'\'' );

  //log the user in
  db_query('INSERT INTO '.PRE.'logins( user_id, session_key, ip, lastaccess ) VALUES (\''.$user_id.'\', \''.$session_key.'\', \''.$ip.'\', now() )' );

  //try and set a session cookie (if the browser will let us)
  setcookie('webcollab_session', $session_key );
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
if(isset($_COOKIE['webcollab_session'] ) && strlen($_COOKIE['webcollab_session'] ) == 32 ) {

  include_once 'includes/common.php';
  include_once 'database/database.php';

  //check if session is valid and within time limits
  if(db_result(@db_query('SELECT COUNT(*) FROM '.PRE.'logins
                                 WHERE session_key=\''.safe_data($_COOKIE['webcollab_session']).'\'
                                 AND lastaccess > (now()-INTERVAL '.$delim.round(SESSION_TIMEOUT).' HOUR'.$delim.')', 0 ) ) == 1 ) {

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

create_top($lang['login_screen'], 1, 'username' );

$content = "<div style=\"text-align:center\">";

if(SITE_IMG != '' ) {
  $content .=  "<img src=\"images/".SITE_IMG."\" /><br />";
}
else {
  $content .=  "<img src=\"images/webcollab_logo.jpg\" alt=\"WebCollab logo\" /><br />";
}

$content .= "<p>".$lang['please_login'].":</p>\n".
            "<form method=\"post\" action=\"index.php\">\n".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" />\n".
            "<table style=\"margin-left:auto; margin-right:auto;\">\n".
            "<tr align=\"left\" ><td>".$lang['login'].": </td><td><input id=\"username\" type=\"text\" name=\"username\" value=\"\" size=\"30\" /></td></tr>\n".
            "<tr align=\"left\" ><td>".$lang['password'].": </td><td><input type=\"password\" name=\"password\" value=\"\" size=\"30\" /></td></tr>\n".
            "</table>\n".
            "<p>&nbsp;</p>\n".
            "<p><input type=\"submit\" value=\"".$lang['login_action']."\" /></p>\n";
  switch(DATABASE_TYPE ) {
  case 'postgresql':
    $content .= "<p><a href=\"http://www.postgres.org\"><img src=\"images/powered-by-postgresql.gif\" alt=\"Powered by postgresql\" /></a></p>";
    break;

  case 'mysql':
  case 'mysql_innodb':
  case 'mysqli':
    $content .= "<p><a href=\"http://www.mysql.com\"><img src=\"images/poweredbymysql-125.png\" alt=\"Powered by MySQL\" /></a></p>\n";
    break;

  default:
     $content .= "<p><a href=\"http://www.php.net\"> <img src=\"images/php-logo.gif\" alt=\"PHP 4 code\" /></a></p>";
     break;
}

$content .= "</form>".
            "</div>";

//set box options
new_box($lang['login'], $content, 'boxdata', 'singlebox' );

create_bottom();

?>
