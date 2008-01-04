<?php
/*
  $Id$

  (c) 2003 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );

//set language
$locale_setup = isset($_REQUEST['lang'] ) ? $_REQUEST['lang'] : LOCALE;

include_once(BASE.'lang/lang_setup.php' );
include_once(BASE.'setup/screen_setup.php' );
include_once(BASE.'includes/common.php' );
include_once(BASE.'database/database.php' );

//
//Error trap function
//

function error_setup($message ) {

  create_top_setup('Setup' );
  new_box_setup('Setup error', $message, 'boxdata', 'singlebox' );
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
}
else {
  //get session key from either a GET or POST
  if(isset($_REQUEST['x']) && preg_match('/^[a-f\d]{32}$/i', $_REQUEST['x'] ) ) {
    $x = db_escape_string($_REQUEST['x']);
  }
  //check for existing variable
  elseif(isset($session_key) && preg_match('/^[a-f\d]{32}$/i', $session_key ) ) {
    $x = db_escape_string($session_key);
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
  if( ! ($q = db_query('SELECT '.PRE.'logins.user_id AS user_id,
                               '.PRE.'logins.lastaccess AS lastaccess,
                               '.PRE.'users.admin AS admin,
                               '.$epoch.' now() ) AS now,
                               '.$epoch.' lastaccess) AS sec_lastaccess
                               FROM '.PRE.'logins
                               LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'logins.user_id)
                               WHERE '.PRE.'logins.session_key=\''.$x.'\'', 0 ) ) ) {
    error_setup('Database not able to verify session key');
  }

  if(db_numrows($q) != 1 ) {
    error_setup('No valid session exists' );
  }

  if(! ( $row = db_fetch_array($q, 0 ) ) ) {
    error_setup('Error while fetching users data');
  }

  //if database table LEFT JOIN gives no rows will get NULL here
  if($row['user_id'] == NULL ) {
    error_setup('No valid user-id found');
  }

  //check rights
  if($row['admin'] != 't' ) {
    error_setup('You need to be an administrator to use this function' );
  }

  //check the last login time (there is a 10 min limit)
  if( ($row['now'] - $row['sec_lastaccess']) > 600 ) {
    db_query('UPDATE '.PRE.'logins SET session_key=\'xxxx\' WHERE user_id='.$row['user_id'] );
    error_setup('Security timeout of 10 minutes has occurred on this session.' );
  }

  //update the 'I was here' time
  db_query('UPDATE '.PRE.'logins SET lastaccess=now() WHERE session_key=\''.$x.'\' AND user_id='.$row['user_id'] );

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