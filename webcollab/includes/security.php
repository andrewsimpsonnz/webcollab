<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

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

require_once("path.php" );

require_once(BASE."config.php" );
require_once(BASE."lang/lang.php" );
require_once(BASE."database/database.php" );
require_once(BASE."includes/common.php" );

//clean up some variables
$q = "";
$ip = "";
$x = 0;
$admin = 0;
$session_key = 0;
$gid[0] = 0;

//check for some values that HAVE to be present to be allowed (ip, session_key)
if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
  error("Security manager", "No ip address found" );
}

//$session_key can be from either a GET, POST or COOKIE - check for cookie first
if(isset($_COOKIE["webcollab_session"] ) && (strlen($_COOKIE["webcollab_session"] ) == 32 ) ){
  $session_key = safe_data($_COOKIE["webcollab_session"] );
}
elseif(isset($_REQUEST["x"]) && (strlen($_REQUEST["x"] ) == 32 ) ){
  $session_key = safe_data($_REQUEST["x"]);
  $x = $session_key;
}
else{
  //return to login screen
  header("Location: ".$BASE_URL."index.php");
  die;
}

//seems okay at first, now go cross-checking with the known data from the database
if( ! ($q = db_query("SELECT logins.user_id AS user_id,
                             logins.lastaccess AS lastaccess,
                             users.email AS email,
                             users.admin AS admin,
                             users.fullname AS fullname,
                             $epoch now() ) AS now,
                             $epoch lastaccess) AS sec_lastaccess
                             FROM logins
                             LEFT JOIN users ON (users.id=logins.user_id)
                             WHERE session_key='$session_key'", 0 ) ) ) {
  error("Security manager", "Database not able to verify session key");
}

if(db_numrows($q) != 1 ) {
  //return to login screen
  header("Location: ".$BASE_URL."index.php");
  die;
}

if( ! ( $row = db_fetch_array($q, 0) ) ) {
  error("Security manager", "Error while fetching users' data");
}

//if database table LEFT JOIN gives no rows will get NULL here
if($row["user_id"] == NULL ){
  error("Security manager", "No valid user-id found");
}

if( ! isset($SESSION_TIMEOUT ) )
  $SESSION_TIMEOUT = 1;

//check the last login time (there is an inactivity time limit set by $SESSION_TIMEOUT)
if( ($row["now"] - $row["sec_lastaccess"]) > $SESSION_TIMEOUT * 3600 ) {
  db_query("UPDATE logins SET session_key='' WHERE user_id=".$row["user_id"] );
  warning( $lang["security_manager"], sprintf($lang["session_timeout_sprt"],
            round(($row["now"] - $row["sec_lastaccess"] )/60), $SESSION_TIMEOUT*60, $BASE_URL ) );
}

//all data seems okay !!

$uid = $row["user_id"];
$uid_name = $row["fullname"];
$uid_email = $row["email"];

if($row["admin"] == 't' )
  $admin = 1;
else
  $admin = 0;

//get usergroups of user
$q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
  $gid[$i] = $row[0];
}

//update the "I was here" time
db_query("UPDATE logins SET lastaccess=now() WHERE session_key='$session_key' AND user_id=$uid" );

// this gives:
//
// uid_name = users's full name
// uid_email = user's email address
// uid = user's id
// admin [0,1] = is the user an admin ?
// gid[] = array of user's groups
//
// and of course, access !!

?>
