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

require_once("path.php" );

include_once(BASE."config.php" );
include_once(BASE."lang/lang.php" );
include_once(BASE."includes/database.php" );
include_once(BASE."includes/common.php" );

//clean up some variables
$q = "";
$ip = "";
$x = "";
$admin = 0;
$cookie_flag = 0;


//check for some values that HAVE to be present to be allowed (ip, session_key)
if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
  error("Security manager", "No ip address found" );
}

//$x can be from either a GET, POST or COOKIE - check for cookie first
if(isset($_COOKIE["webcollab_session"] ) && (strlen($_COOKIE["webcollab_session"] ) == 32 ) ){
  $x = $_COOKIE["webcollab_session"];
  $cookie_flag = 1;
}
elseif(isset($_REQUEST["x"]) && (strlen($_REQUEST["x"] ) == 32 ) ){
  $x = safe_data($_REQUEST["x"]);
}
else{
  error($lang["security_manager"], sprintf($lang["no_key_sprt"], $BASE_URL ) );
}

//seems okay at first, now go cross-checking with the known data from the database
if( ! ($q = db_query("SELECT logins.user_id AS user_id, logins.ip AS ip, logins.lastaccess AS lastaccess,
                             users.email AS email, users.admin AS admin, users.fullname AS fullname,
                             $epoch now() ) AS now,
                             $epoch lastaccess) AS sec_lastaccess
                             FROM logins
                             LEFT JOIN users ON (users.id=logins.user_id)
                             WHERE session_key='$x'", 0 ) ) ) {
  error("Security manager", "Database not able to verify session key");
}

if(db_numrows($q) != 1 ) {
  error($lang["security_manager"], sprintf($lang["no_session"], $BASE_URL ) );
}

if( ! ( $row = db_fetch_array($q, 0) ) ) {
  error("Security manager", "Error while fetching users' data");
}

//session does exist, now cross-check with ip address
if($ip != $row["ip"] ) {
  db_query("DELETE FROM logins WHERE session_key='$x'" );
  warning( $lang["security_manager"], sprintf( $lang["ip_spoof_sprt"], $ip, $BASE_URL) );
}

//if database table LEFT JOIN gives no rows will get NULL here
if($row["user_id"] == NULL ){
  error("Security manager", "No valid user-id found");
}

//check the last logintime (there is a 60 min limit)
if( ($row["now"]-$row["sec_lastaccess"]) > 3600 ) {
  db_query("UPDATE logins SET session_key='' WHERE user_id=".$row["user_id"] );
  warning( $lang["security_manager"], sprintf( $lang["session_timeout_sprt"], round( ($row["now"] - $row["sec_lastaccess"])/60), $BASE_URL ) );
}

//all data seems okay !!

$uid = $row["user_id"];
$username = $row["fullname"];
$useremail = $row["email"];

if($row["admin"] == 't' )
  $admin = 1;
else
  $admin = 0;

//update the "I was here" time
db_query("UPDATE logins SET lastaccess=now() WHERE session_key='$x' AND user_id=$uid" );

//if cookies are being used we don't need encoded URL
if($cookie_flag = 1 ) {
  $x = 0;
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
