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
include_once(BASE."includes/database.php" );
include_once("./screen_setup.php" );

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
if( ! isset($WEB_CONFIG ) || $WEB_CONFIG != "Y" ) {
  error_setup("Current configuration file does not allow web-based setup" );
  die;
}

if( ! isset($DATABASE_NAME ) || $DATABASE_NAME == "" ) {
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

  //seems okay at first, now go cross-checking with the known data from the database
  if( ! ($q = db_query("SELECT logins.user_id AS user_id, logins.ip AS ip, logins.lastaccess AS lastaccess,
                             users.email AS email, users.admin AS admin, users.fullname AS fullname,
                             $epoch now() ) AS now,
                             $epoch lastaccess) AS sec_lastaccess
                             FROM logins
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

  //check the last logintime (there is a 60 min limit)
  if( ($row["now"]-$row["sec_lastaccess"]) > 3600 ) {
    db_query("UPDATE logins SET session_key='' WHERE user_id=".$row["user_id"] );
    error_setup("Security timeout has occurred." );
  }

  //check rights
  if($row["admin"] != 't' )
    error_setup("You need to be an administrator to use this function." );
}
?>
