<?php
/*
  $Id$

  (c) 2003 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
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
$WEB_CONFIG = "N";
$DATABASE_NAME = "--";

require_once("path.php" );

//read config files
require(BASE."config/config.php" );
include_once(BASE."database/database.php" );
include_once(BASE."setup/screen_setup.php" );

//
//Error trap function
//

function error_setup($message ) {

  create_top_setup("Setup" );
  new_box_setup("Setup error", $message, "boxdata", "singlebox" );
  create_bottom_setup();
  die;

}

//clean up some variables
$q = "";
$ip = "";
$x = "";
$admin = 0;

//security checks
if($WEB_CONFIG != "Y" ) {
  error_setup("Current configuration file does not allow web-based setup" );
  die;
}

if($DATABASE_NAME == "" ) {
  //this is a first install
  $x = "";
}
else {

  //get session key - $x can be from either a GET or POST
  if(isset($_REQUEST["x"]) && (strlen($_REQUEST["x"] ) == 32 ) ){
    $x = safe_data($_REQUEST["x"]);
  }
  else{
    error_setup("No session key." );
  }

  //check for ip address
  if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
    error_setup("Server not able to detect your IP address. Session aborted as a security precaution." );
  }

  //seems okay at first, now go cross-checking with the known data from the database
  if( ! ($q = db_query("SELECT logins.user_id AS user_id, logins.ip AS ip, logins.lastaccess AS lastaccess,
                             users.email AS email, users.admin AS admin, users.fullname AS fullname,
                             $epoch now() ) AS now,
                             $epoch lastaccess) AS sec_lastaccess
                             FROM ".PRE."logins
                             LEFT JOIN users ON (users.id=logins.user_id)
                             WHERE session_key='$x'", 0 ) ) ) {
    error_setup("Database not able to verify session key");
  }

  if(db_numrows($q) != 1 ) {
    error_setup("No valid session exists." );
  }

  if( ! ( $row = db_fetch_array($q, 0) ) ) {
    error_setup("Error while fetching users' data");
  }

  //if database table LEFT JOIN gives no rows will get NULL here
  if($row["user_id"] == NULL ){
    error_setup("No valid user-id found");
  }

  //check rights
  if($row["admin"] != 't' )
    error_setup("You need to be an administrator to use this function" );
  
  //check the last logintime (there is a 10 min limit)
  if( ($row["now"]-$row["sec_lastaccess"]) > 600 ) {
    db_query("UPDATE ".PRE."logins SET session_key='' WHERE user_id=".$row["user_id"] );
    error_setup("Security timeout of 10 minutes has occurred on this session." );
  }

  //update the "I was here" time
  db_query("UPDATE ".PRE."logins SET lastaccess=now() WHERE session_key='".$x."' AND user_id=".$row["user_id"] );

}
  
?>
