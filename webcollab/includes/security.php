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

require_once(BASE.'config/config.php' );
require_once(BASE.'lang/lang.php' );
require_once(BASE.'database/database.php' );
require_once(BASE.'includes/common.php' );

//clean up some variables
$q   = '';
$ip  = '';
$x   = 0;
$session_key = 0;

//check for some values that HAVE to be present to be allowed (ip, session_key)
if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
  error('Security manager', 'No ip address found' );
}

//$session_key can be from either a GET, POST or COOKIE - check for cookie first
if(isset($_COOKIE['webcollab_session'] ) && (strlen($_COOKIE['webcollab_session'] ) == 32 ) ){
  $session_key = safe_data($_COOKIE['webcollab_session'] );
}
elseif(isset($_REQUEST['x']) && (strlen($_REQUEST['x'] ) == 32 ) ){
  $session_key = safe_data($_REQUEST['x']);
  $x = $session_key;
}
else{
  //return to login screen
  header('Location: '.BASE_URL.'index.php');
  die;
}

//seems okay at first, now go cross-checking with the known data from the database
if( ! ($q = db_query('SELECT '.PRE.'logins.user_id AS user_id,
                             '.PRE.'users.email AS email,
                             '.PRE.'users.admin AS admin,
                             '.PRE.'users.fullname AS fullname,
                             '.PRE.'users.guest AS guest,
                             '.$epoch.' now() ) AS now,
                             '.$epoch.' '.PRE.'logins.lastaccess) AS sec_lastaccess
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
if($row['user_id'] == NULL ){
  error('Security manager', 'No valid user-id found');
}

//check the last login time (there is an inactivity time limit set by SESSION_TIMEOUT)
if( ($row['now'] - $row['sec_lastaccess']) > SESSION_TIMEOUT * 3600 ) {
  db_query('UPDATE '.PRE.'logins SET session_key=\'\' WHERE user_id='.$row['user_id'] );
  setcookie('webcollab_session', '' );
  warning( $lang['security_manager'], sprintf($lang['session_timeout_sprt'],
            round(($row['now'] - $row['sec_lastaccess'] )/60), SESSION_TIMEOUT*60, BASE_URL ) );
}

//all data seems okay !!

define('UID', $row['user_id'] );
define('GUEST', $row['guest'] );

if($row['admin'] == 't' )
  define('ADMIN', 1 );
else
  define('ADMIN', 0 );

define('UID_NAME', $row['fullname'] );
define('UID_EMAIL', $row['email'] );
    


//get usergroups of user
$q = db_query('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID );

//prevent hacking with register globals turned on
if(isset($GID) )
  unset($GID);
$GID[0] = 0;

//list usergroups
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
  $GID[$i] = $row[0];
}

//update the "I was here" time
db_query('UPDATE '.PRE.'logins SET lastaccess=now() WHERE session_key=\''.$session_key.'\' AND user_id='.UID );

// this gives:
//
// uid_name = users's full name
// uid_email = user's email address
// uid = user's id
// admin [0,1] = is the user an admin ?
// guest [0,1] = is the user a guest?
// gid[] = array of user's groups
//
// and of course, access !!

?>
