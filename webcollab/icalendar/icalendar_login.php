<?php
/*
  $Id$

  (c) 2011 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  iCalendar login functions

*/

//
// HTTP login function
//

function icalendar_login() {

  //valid login attempt ?
  if(! isset($_SERVER['REMOTE_USER']) || (strlen($_SERVER['REMOTE_USER']) == 0 ) ) {
    icalendar_error('401', 'Login no authorisation');
  }

  $q = db_prepare('SELECT id, user_admin, guest, locale FROM '.PRE.'users WHERE user_name=? AND deleted=\'f\'' );

  if( ! (db_execute($q, array(safe_data($_SERVER['REMOTE_USER'] ) ), 0 ) ) ) {
    icalendar_error('401', 'Login user select' );
  }

  if( ! ($row = db_fetch_array($q, 0 ) ) ) {
    icalendar_error('401', 'Login query error');
  }

  define('UID', $row['id'] );
  define('GUEST', $row['guest'] );

  //set user defined locale if requrired
  if($row['locale'] ) {
    define('LOCALE_USER', $row['locale'] );
  }
  else {
    define('LOCALE_USER', LOCALE );
  }

  if($row['user_admin'] == 't' ) {
    define('ADMIN', 1 );
  }
  else {
    define('ADMIN', 0 );
  }

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

  return 1;
}

function icalendar_error($code, $message='' ) {

  if(DEBUG == 'Y' ) {
    error("iCalendar Error", "Error number ".$code."<br />".$message );
  }

  switch ($code ) {

    case '401':
      header("HTTP/1.0 401 Unauthorized", true, 401 );
      break;

    case '500':
    default:
      header("HTTP/1.0 500 Internal Server Error", true, 500 );
      break;
  }

  //end program
  die;
}

?>
