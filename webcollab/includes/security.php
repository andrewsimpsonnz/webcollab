<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Parts of this file originally written for Core APM by Dennis Fleurbaaij 2001/2002.
  
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

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(CONFIG.'config.php' );
require_once(BASE.'lang/lang.php' );
require_once(BASE.'includes/common.php' );
require_once(BASE.'database/database.php' );

//clean up some variables
$q   = '';
$ip  = '';
$x   = 0;
$session_key = 'xxxx';
$content = '';

//check for some values that HAVE to be present to be allowed (ip, session_key)
if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
  error('Security manager', 'No ip address found' );
}

//$session_key can be from either a GET, POST or COOKIE - check for cookie first
if(isset($_COOKIE['webcollab_session'])  && (strlen($_COOKIE['webcollab_session'] ) == 32 ) && (ctype_xdigit($_COOKIE['webcollab_session'] ) ) ) {
  $session_key = db_escape_string($_COOKIE['webcollab_session'] );
}
elseif(isset($_REQUEST['x'] ) && (strlen($_REQUEST['x'] ) == 32 ) && (ctype_xdigit($_REQUEST['x'] ) ) ) {
  $session_key = db_escape_string($_REQUEST['x']);
  $x = $_REQUEST['x'];
}
else {
  //return to login screen
  header("Location: ".BASE_URL."index.php");
  die;
}
    
//seems okay at first, now go cross-checking with the known data from the database
if( ! ($q = db_query('SELECT '.PRE.'logins.user_id AS user_id,
                             '.$epoch.' '.PRE.'logins.lastaccess) AS sec_lastaccess,
                             '.PRE.'users.email AS email,
                             '.PRE.'users.admin AS admin,
                             '.PRE.'users.fullname AS fullname,
                             '.PRE.'users.guest AS guest,
                             '.PRE.'users.deleted AS deleted,
                             '.$epoch.' now() ) AS now,
                             '.$epoch.'DATE \'1970-01-02 00:00:00\') AS tz
                             FROM '.PRE.'logins
                             LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'logins.user_id)
                             WHERE '.PRE.'logins.session_key=\''.$session_key.'\'', 0 ) ) ) {
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
if(($row['user_id'] == NULL ) || ($row['deleted'] == 't' ) ){
  error('Security manager', 'No valid user-id found');
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

if($row['admin'] == 't' ) {
  define('ADMIN', 1 );
}
else {
  define('ADMIN', 0 );
}
define('UID_NAME',  $row['fullname'] );
define('UID_EMAIL', $row['email'] );

define('TIME_NOW',  $row['now'] );
define('TZ_OFFSET', (86400 - $row['tz'] ) );
    
//get usergroups of user
$q = db_query('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID );

//prevent hacking with register globals turned on
if(isset($GID) ){
  unset($GID);
}
$GID[0] = 0;

//list usergroups
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
  $GID[$i] = $row[0];
}

//update the "I was here" time
db_query('UPDATE '.PRE.'logins SET lastaccess=now() WHERE session_key=\''.$session_key.'\' AND user_id='.UID );

// this gives:
//
// UID_NAME    = users's full name
// UID_EMAIL   = user's email address
// UID         = user's id
// ADMIN [0,1] = is the user an admin ?
// GUEST [0,1] = is the user a guest?
// GID[]       = array of user's groups
// TIME_NOW    = UNIX epoch time now (seconds since 1 Jan 1970) 
// TZ_OFFSET   = database timezone offset relative to GMT/UTC in seconds 
//
// and of course, access !!

?>
