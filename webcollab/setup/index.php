<?php
/*
  $Id$

  (c) 2003 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>
  
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

  Secure the setup login

*/

//set initial safe values
$DATABASE_NAME = "--";
$WEB_CONFIG = "N";

//read config files
require_once("../config.php" );
include_once("./screen_setup.php" );


//
// ERROR FUNCTION
//

function secure_error($message ) {

  create_top_setup("Error" );
  new_box_setup("Error", "<div align=\"center\">".$message."</div>", "boxdata", "singlebox" );
  create_bottom_setup();
  die;

}

//
// LOGIN CHECK
//

//valid login attempt ?
if( (isset($_POST["username"]) && isset($_POST["password"]) ) ) {

  $q = "";
  $login_q = "";

  include_once("../database/database.php" );
  include_once("../includes/common.php" );

  //encrypt password
  $md5pass = md5($_POST["password"] );
  $login_q = "SELECT id
              FROM users
              WHERE deleted='f'
              AND admin='t'
              AND name='".safe_data($_POST["username"])."'
              AND password='".$md5pass."'";


  //no database connection
  $q = db_query($login_q );

  //no such user-password combination
  if( @db_numrows($q) < 1 ) {
      secure_error("Not a valid username, or password" );
  }

  //no user-id
  if( ! ($user_id = @db_result($q, 0, 0) ) ) {
    secure_error("Unknown user id");
  }

  //no ip (possible?)
  if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
    secure_error("Unable to determine ip address");
  }

  //user is okay log him/her in

  //create session key
  // seed number is not required for PHP 4.2.0, and higher
  if(version_compare(PHP_VERSION, "4.2.0" ) == -1 )
  mt_srand(hexdec(substr(md5(microtime() ), -8 ) ) & 0x7fffffff );
  $session_key = md5(mt_rand() );

  //remove the old login information
  @db_query("DELETE FROM logins WHERE user_id=".$user_id );

  //log the user in
  db_query("INSERT INTO logins( user_id, session_key, ip, lastaccess )
                       VALUES('".$user_id."', '".$session_key."', '".$ip."', now() )" );

  //relocate the user to the next screen
  $path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
  header("Location: ".$path."setup_setup1.php?x=".$session_key);
  secure_error("Auto page redirect could not detect server configuration.&nbsp;".
                "You will need to do a manual configuration" );
  die;
}

//
// MAIN PROGRAM
//

//security checks
if( ! isset($WEB_CONFIG ) || $WEB_CONFIG != "Y" ) {
  secure_error("Current configuration file does not allow web-based setup." );
  die;
}

//version check
//version_compare() is only in PHP 4.1.0, and above.
if(strcmp('4.1.0', PHP_VERSION ) > 0 )
  secure_error("WebCollab needs PHP version 4.1.0, or higher.  This version is ".PHP_VERSION );

//check for initial install
if($DATABASE_NAME == "" ) {
  //this is an initial install
  $path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
  header("Location: ".$path."setup_setup1.php" );
  secure_error("Auto page redirect could not detect server configuration.&nbsp;".
                "You will need to do a manual configuration" );
  die;
}

//login box screen code 
create_top_setup("Login" );

$content = "<p>Admin login is required for setup:</p>\n".
           "<form name=\"inputform\" method=\"POST\" action=\"index.php\">\n".
             "<p><table border=\"0\">\n".
               "<tr><td>Login: </td><td><input type=\"text\" name=\"username\" size=\"30\" /></td></tr>\n".
               "<tr><td>Password: </td><td><input type=\"password\" name=\"password\" value=\"\" size=\"30\" /></td></tr>\n".
             "</table></p>\n".
             "<div align=\"center\">\n".
             "<p><input type=\"submit\" value=\"Login\" /></p>\n".
             "</div></form>\n";

//set box options
new_box_setup("Login", $content, "boxdata", "singlebox" );

create_bottom_setup();

?>