<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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
$q="";
$ip="";
$x="";

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."config.php" );
include_once( BASE."lang/language.php" );
include_once( BASE."includes/database.php" );
include_once( BASE."includes/common.php" );

//check for some values that HAVE to be present to be allowed (ip, session_key (named x))
if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
  error("Security manager", "No ip address found" );
}


// $x can be from either a GET or a POST - need to check for both
if( isset($_REQUEST["x"]) && ( strlen($_REQUEST["x"]) == 32 ) ) {
  $x = $_REQUEST["x"];
  } else {
  error($lang["security_manager"], sprintf($lang["no_key"], $BASE_URL) );
}


//seems okay at first, now go cross-checking with the known data from the database
if( ! ($q = db_query( "SELECT user_id, ip, email, admin, fullname,
                             ".$epoch."now() ) AS now,
                             ".$epoch."lastaccess) AS sec_lastaccess
                             FROM users 
			     LEFT JOIN logins ON (logins.user_id=users.id) 
			     WHERE session_key='".$x."'", 0 ) ) ) {
  error("Security manager", "Database not able to verify session key");
}

if( db_numrows($q) != 1 ) {
  error( $lang["security_manager"], sprintf( $lang["no_session"], $BASE_URL ) );
}

if( ! ( $row = db_fetch_array($q, 0) ) ) {
  error("Security manager", "Error while fetching users' data");
}

//check the last logintime (there is a 60 min limit)
if( ($row["now"]-$row["sec_lastaccess"]) > 3600 ) {
  db_query("DELETE FROM logins WHERE session_key='".$x."'" );
  warning( $lang["security_manager"], sprintf( $lang["session_timeout_sprt"], round( ($row["now"] - $row["sec_lastaccess"])/60), $BASE_URL ) );
}

$uid = $row["user_id"];
if( $uid == "" )
  error("Security manager", "No valid user-id found");

$username = $row["fullname"];
$useremail = $row["email"];

//session does exist, now cross-check with time and ip
if( $ip != $row["ip"] ) {
  warning( $lang["security_manager"], sprintf( $lang["ip_spoof_sprt"], $ip, $BASE_URL) );
}

//create timecheck here


//all data seems okay !!


//update the "I was here" time
db_query("UPDATE logins SET lastaccess=current_timestamp(0) WHERE session_key='".$x."' AND user_id=".$uid );

if( $row["admin"] != 't' ) {
  $admin = 0;
} else {
  $admin = 1;
}


// this gives:
//
// username = users's full name
// useremail = user's email address
// uid = user's id
// admin [0,1] = is the user an admin ?
//
// and of course, access !!


?>
