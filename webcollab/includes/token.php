<?php

/*
  $Id: security.php 2283 2009-08-22 08:40:04Z andrewsimpson $

  (c) 2011 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Security token manager.  Generates tokens and validates them later

*/

function generate_token($action ) {

  //generate new token
  try {
    $token = bin2hex(random_bytes(20 ) );
  }
  catch(Exception $e ) {
    $token = sha1(mt_rand().mt_rand().mt_rand().mt_rand() );
  }

  define('TOKEN', $token );

  //update database
  $q = db_prepare('INSERT INTO '.PRE.'tokens(lastaccess, token, user_action, userid ) VALUES (now(), ?, ?, ? )' );
  db_execute($q, array($token, $action, UID ) );

  return;
}


function validate_token($token, $action ) {

  //check input
  if((! isset($token) ) && (! strlen(trim($token, '1234567890abcdefABCDEF' ) ) == 0 ) ) {
    error('Security Token', 'No valid token is set' );
    die;
  }

  //check against database
  $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tokens WHERE token=? AND user_action=? AND userid=?
                                  AND lastaccess > (now()-INTERVAL '.db_delim(TOKEN_TIMEOUT.' MINUTE' ).')' );

  db_execute($q, array($token, $action, UID ) );
  $count = db_result($q, 0, 0 );

  //delete old token
  $q = db_prepare('DELETE FROM '.PRE.'tokens WHERE token=?' );
  db_execute($q, array($token ) );

  if( $count == 0 ) {
    error('Security Warning', 'Possible session hijacking detected' );
    die;
  }

  return;
}

?>
