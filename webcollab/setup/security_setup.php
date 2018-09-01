<?php
/*
  $Id: security_setup.php 2285 2009-08-22 08:42:43Z andrewsimpson $

  (c) 2003 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//set initial safe values
if( ! isset($WEB_CONFIG ) ) {
  $WEB_CONFIG = 'N';
}

//set language
if(isset($_GET['lang'] ) ) {
  $locale_setup = $_GET['lang'];
}

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
include_once(BASE.'setup/screen_setup.php' );
include_once(BASE.'includes/common.php' );
include_once(BASE.'database/database.php' );

//
//Error trap function
//

function error_setup($message ) {

  create_top_setup('Setup' );
  new_box_setup('Setup error', $message, 'boxdata-small', 'head-small', 'boxstyle-normal' );
  create_bottom_setup();
  die;

}

//clean up some variables
$q  = '';
$ip = '';
$x  = 0;
$admin = 0;
$row = array();

if( ! defined('DATABASE_NAME' ) || DATABASE_NAME == '' ) {
  //this is a first install
  define('X', 0 );
}
else {
  //get session key from either a GET or POST
  if(isset($_POST['x']) && preg_match('/^[a-f\d]{40}$/i', $_POST['x'] ) ) {
    $x = safe_data($_POST['x']);
    define('X', $x );
  }
  elseif(isset($_GET['x']) && preg_match('/^[a-f\d]{40}$/i', $_GET['x'] ) ) {
    $x = safe_data($_GET['x']);
    define('X', $x );
  }
  //check for existing variable
  elseif(isset($session_key) && preg_match('/^[a-f\d]{40}$/i', $session_key ) ) {
    $x = safe_data($session_key);
    define('X', $x );
  }
  //nothing
  else {
    error_setup('No session key' );
  }

  //check for ip address
  if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
    error_setup('Server not able to detect your IP address. Session aborted as a security precaution.' );
  }

  if(! defined('PRE' ) ) {
    define('PRE', '' );
  }

  //seems okay at first, now go cross-checking with the known data from the database
  $q = db_prepare('SELECT '.PRE.'logins.user_id AS user_id,
                          '.PRE.'logins.lastaccess AS lastaccess,
                          '.PRE.'users.user_admin AS user_admin,
                          '.db_epoch().' now() ) AS now,
                          '.db_epoch().' lastaccess) AS sec_lastaccess
                          FROM '.PRE.'logins
                          LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'logins.user_id)
                          WHERE '.PRE.'logins.session_key=? LIMIT 1' );

  if(! db_execute($q, array(X ) ) ) {
  error_setup('Database not able to verify session key');
  }

  if(! ( $row = db_fetch_array($q, 0 ) ) ) {
    error_setup('No valid session exists');
  }

  //check rights
  if($row['user_admin'] != 't' ) {
    error_setup('You need to be an administrator to use this function' );
  }

  //check the last login time (there is a 10 min limit)
  if( ($row['now'] - $row['sec_lastaccess']) > 600 ) {
    $q = db_prepare('UPDATE '.PRE.'logins SET session_key=\'xxxx\' WHERE session_key=?' );
    db_execute($q, array(X ) );
    error_setup('Security timeout of 10 minutes has occurred on this session.' );
  }

  //update the 'I was here' time
  $q = db_prepare('UPDATE '.PRE.'logins SET lastaccess=now() WHERE session_key=\''.X.'\' AND user_id=?' );
  db_execute($q, array($row['user_id']) );

  //get site names
  $q = db_query('SELECT * FROM '.PRE.'site_name' );
  $row = @db_fetch_num($q, 0 );
  @define('MANAGER_NAME',   $row[0] );
  @define('ABBR_MANAGER_NAME', $row[1] );

}

//for compatability in common.php
define('UID_NAME', '' );
define('UID_EMAIL', '' );

?>
