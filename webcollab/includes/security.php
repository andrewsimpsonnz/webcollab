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

  Security manager, looks at some aspects of logins and takes appropriate action.

*/

//clean up some variables
$q   = '';
$ip  = '';
$x   = 0;
$session_key = 'xxxx';
$content = '';
$row = array();
$GID = array();

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'includes/common.php' );
require_once(BASE.'database/database.php' );

//check for some values that HAVE to be present to be allowed (ip, session_key)
if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
  error('Security manager', 'No ip address found' );
}

//$session_key can be from either a GET, POST or COOKIE - check for cookie first
if(isset($_COOKIE['webcollab_session'] ) && preg_match('/^[a-f\d]{32}$/i', $_COOKIE['webcollab_session'] ) ) {
  $session_key = db_escape_string($_COOKIE['webcollab_session'] );
}
elseif(isset($_REQUEST['x'] ) && preg_match('/^[a-f\d]{32}$/i', $_REQUEST['x'] ) ) {
  $session_key = db_escape_string($_REQUEST['x']);
  $x = $_REQUEST['x'];
}
else {
  //return to login screen
  header("Location: ".BASE_URL."index.php");
  die;
}

if(UNICODE_VERSION == 'Y' ) {
  //set the database encoding - get user preferred language files later
  db_user_locale('UTF-8' );
  //set PHP internal encoding
  if(! mb_internal_encoding('UTF-8' ) ) {
    error("Internal encoding", "Unable to set UTF-8 encoding in PHP" );
  }
}
else {
  //set the database encoding & get the defined language files
  define('LOCALE_USER', LOCALE );
  require_once(BASE.'lang/lang.php' );
  db_user_locale(CHARACTER_SET );
}

//seems okay at first, now go cross-checking with the known data from the database
if(! ($q = @db_query('SELECT '.PRE.'logins.user_id AS user_id,
                             '.$epoch.' '.PRE.'logins.lastaccess) AS sec_lastaccess,
                             '.PRE.'users.email AS email,
                             '.PRE.'users.admin AS admin,
                             '.PRE.'users.fullname AS fullname,
                             '.PRE.'users.guest AS guest,
                             '.PRE.'users.deleted AS deleted,
                             '.PRE.'users.locale AS locale,
                             '.$epoch.' now() ) AS now
                             FROM '.PRE.'logins
                             LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'logins.user_id)
                             WHERE '.PRE.'logins.session_key=\''.$session_key.'\' LIMIT 1', 0 ) ) ) {
  error('Security manager', 'Database not able to verify session key');
}

if(db_numrows($q) != 1 ) {
  //return to login screen
  header('Location: '.BASE_URL.'index.php');
  die;
}

if( ! ( $row = db_fetch_array($q, 0) ) ) {
  error('Security manager', 'Error while fetching user data');
}

//if database table LEFT JOIN gives no rows will get NULL here
//  also check for deleted users
if((! $row['user_id'] ) || ($row['deleted'] == 't' ) ){
  error('Security manager', 'No valid user-id found');
}

//set user locale in Unicode version
if(UNICODE_VERSION == 'Y' ) {

  //set user defined locale if requrired
  if($row['locale'] ) {
    define('LOCALE_USER', $row['locale'] );
  }
  else {
    define('LOCALE_USER', LOCALE );
  }

  //get required language files
  require_once(BASE.'lang/lang.php' );
}

//check the last login time (there is an inactivity time limit set by SESSION_TIMEOUT)
if( ($row['now'] - $row['sec_lastaccess']) > SESSION_TIMEOUT * 3600 ) {
  db_query('UPDATE '.PRE.'logins SET session_key=\'xxxx\' WHERE user_id='.$row['user_id'] );
  setcookie('webcollab_session', '' );
  warning( $lang['security_manager'], sprintf($lang['session_timeout_sprt'],
            round(($row['now'] - $row['sec_lastaccess'] )/60), SESSION_TIMEOUT*60, BASE_URL ) );
}

//all data seems okay !!

define('UID',   $row['user_id'] );
define('GUEST', $row['guest'] );
define('UID_NAME',  $row['fullname'] );
define('UID_EMAIL', $row['email'] );

if($row['admin'] == 't' ) {
  define('ADMIN', 1 );
}
else {
  define('ADMIN', 0 );
}

define('TIME_NOW', $row['now'] );

//get usergroups of user
$q = db_query('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID );

//list usergroups
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
  $GID[($row[0])] = $row[0];
}

//get site names
$q = db_query('SELECT manager_name, abbr_manager_name FROM '.PRE.'site_name' );
$row = @db_fetch_num($q, 0 );
@define('MANAGER_NAME',   $row[0] );
@define('ABBR_MANAGER_NAME', $row[1] );

//update the "I was here" time
db_query('UPDATE '.PRE.'logins SET lastaccess=now() WHERE session_key=\''.$session_key.'\' AND user_id='.UID );

// this gives:
//
// UID_NAME    = users's full name
// UID_EMAIL   = user's email address
// UID         = user's id
// ADMIN [0,1] = is the user an admin ?
// GUEST [0,1] = is the user a guest?
// $GID[]      = array of user's groups
// TIME_NOW    = UNIX epoch time now (seconds since 1 Jan 1970) 
//
// and of course, access !!

?>
