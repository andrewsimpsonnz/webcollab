<?php
/*
  $Id: security.php 2283 2009-08-22 08:40:04Z andrewsimpson $

  (c) 2002 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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
if(isset($_COOKIE['webcollab_session'] ) && (strlen(trim($_COOKIE['webcollab_session'], '1234567890abcdefABCDEF' ) ) == 0 ) && strlen(trim($_COOKIE['webcollab_session'] ) ) == 40 ) {
  $session_key = validate($_COOKIE['webcollab_session'] );
  define('X', 0 );
}
elseif(isset($_POST['x'] ) && (strlen(trim($_POST['x'], '1234567890abcdefABCDEF' ) ) == 0 ) && strlen(trim($_POST['webcollab_session'] ) ) == 40 ) {
  $session_key = validate($_POST['x']);
  $x = $_POST['x'];
  define('X', $x );
}
elseif(isset($_GET['x'] ) && (strlen(trim($_GET['x'], '1234567890abcdefABCDEF' ) ) == 0 ) && strlen(trim($_GET['webcollab_session'] ) ) == 40 ) {
  $session_key = validate($_GET['x']);
  $x = $_GET['x'];
  define('X', $x );
}
else {
  //return to login screen
  header("Location: ".BASE_URL."index.php?nologin=1");
  die;
}

//set PHP internal encoding
if((! ini_set('default_charset', 'UTF-8') ) && (! mb_internal_encoding('UTF-8' ) ) ) {
  error("Internal encoding", "Unable to set UTF-8 encoding in PHP" );
}

//seems okay at first, now go cross-checking with the known data from the database
$q = db_prepare('SELECT '.PRE.'logins.user_id AS userid,
                             '.PRE.'logins.token AS token,
                             '.db_epoch().' '.PRE.'logins.lastaccess) AS sec_lastaccess,
                             '.PRE.'users.email AS email,
                             '.PRE.'users.user_admin AS admin,
                             '.PRE.'users.fullname AS fullname,
                             '.PRE.'users.guest AS guest,
                             '.PRE.'users.deleted AS deleted,
                             '.PRE.'users.locale AS locale,
                             '.db_epoch().' now() ) AS now
                             FROM '.PRE.'logins
                             LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'logins.user_id)
                             WHERE '.PRE.'logins.session_key=? AND '.PRE.'users.deleted=\'f\' LIMIT 1' );

if(! db_execute($q, array($session_key ) ) ) {
  error('Security manager', 'Database not able to verify session key');
}

if( ! ( $row = db_fetch_array($q, 0) ) ) {
  //return to login screen
  header('Location: '.BASE_URL.'index.php?nologin=1');
  die;
}

//set user defined locale if requrired
if($row['locale'] ) {
  define('LOCALE_USER', $row['locale'] );
}
else {
  define('LOCALE_USER', LOCALE );
}

//get required language files
require_once(BASE.'lang/lang.php' );

//check the last login time (there is an inactivity time limit set by SESSION_TIMEOUT)
if( ($row['now'] - $row['sec_lastaccess']) > SESSION_TIMEOUT * 3600 ) {
  $q = db_prepare('UPDATE '.PRE.'logins SET session_key=\'xxxx\' WHERE user_id=?' );
  db_execute($q, array($row['userid']) );
  warning( $lang['security_manager'], sprintf($lang['session_timeout_sprt'],
            round(($row['now'] - $row['sec_lastaccess'] )/60), SESSION_TIMEOUT*60, BASE_URL ) );
}

//update the "I was here" time
$q = db_prepare('UPDATE '.PRE.'logins SET lastaccess=now() WHERE session_key=? AND user_id=?' );
db_execute($q, array($session_key, $row['userid'] ) );

//all data seems okay !!

if($row['admin'] == 't' ) {
  define('ADMIN', 1 );
}
else {
  define('ADMIN', 0 );
}

//set constants
define('UID',   $row['userid'] );
define('GUEST', $row['guest'] );
define('UID_NAME',  $row['fullname'] );
define('UID_EMAIL', $row['email'] );
define('TIME_NOW', $row['now'] );

//get usergroups of user
$q = db_prepare('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid=?' );
db_execute($q, array(UID ) );

//list usergroups
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
  $GID[($row[0])] = $row[0];
}

//get site names
$q = db_query('SELECT manager_name, abbr_manager_name FROM '.PRE.'site_name' );
$row = @db_fetch_num($q, 0 );
@define('MANAGER_NAME',   $row[0] );
@define('ABBR_MANAGER_NAME', $row[1] );

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
