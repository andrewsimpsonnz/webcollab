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

  Secure the setup login

*/

//set initial safe values
$WEB_CONFIG = "N";

//read config files
require_once("config/config.php" );
include_once("setup/screen_setup.php" );


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
if( (isset($_POST['username']) && isset($_POST['password']) ) ) {

  include_once("database/database.php" );
  include_once("includes/common.php" );

  $q = "";
  $username = safe_data($_POST['username']);
  //encrypt password
  $md5pass = md5($_POST['password'] );
  $flag_attempt = FALSE;

  //no ip (possible?)
  if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
    secure_error("Unable to determine ip address");
  }
  
  if(! defined('PRE') )
    define('PRE', "" );
  
  //limit login attempts if post-1.60 database is being used 
  if(@db_query("SELECT * FROM ".PRE."login_attempt LIMIT 1", 0 ) ) {
        
  
    //count the number of recent login attempts
    $count_attempts = db_result(@db_query("SELECT COUNT(*) FROM ".PRE."login_attempt 
                                                  WHERE name='".$username."' 
                                                  AND last_attempt > (now()-INTERVAL ".$delim."10 MINUTE".$delim.") LIMIT 6" ), 0, 0 );
      
    //protect against password guessing attacks 
    if($count_attempts > 3 ) {
      secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    }                                                                              
    $flag_attempt = TRUE; 
    
    //record this login attempt
    db_query("INSERT INTO ".PRE."login_attempt(name, ip, last_attempt ) VALUES ('$username', '$ip', now() )" );
  }
                                                                                     
  //do query and check database connection
  if( ! $q = db_query("SELECT id FROM ".PRE."users
                             WHERE deleted='f'
                             AND admin='t'
                             AND name='".$username."'
                             AND password='".$md5pass."'", 0 ) ){
    secure_error("Not a valid username, or password" );
  }

  //no such user-password combination
  if( @db_numrows($q) < 1 ) {
      sleep(2);
      secure_error("Not a valid username, or password" );
  }

  //no user-id
  if( ! ($user_id = @db_result($q, 0, 0) ) ) {
    secure_error("Unknown user id");
  }

  //user is okay log him/her in

  //create session key
  // seed number is not required for PHP 4.2.0, and higher
  if(version_compare(PHP_VERSION, "4.2.0" ) == -1 )
    mt_srand(hexdec(substr(md5(microtime() ), -8 ) ) & 0x7fffffff );  
  $session_key = md5(mt_rand() );

  //remove the old login information
  @db_query("DELETE FROM ".PRE."logins WHERE user_id=".$user_id );
  //remove the old login information for post 1.60 database
  if($flag_attempt )
    @db_query("DELETE FROM ".PRE."login_attempt WHERE last_attempt < (now()-INTERVAL ".$delim."20 MINUTE".$delim.") OR name='".$username."'" );
   
  //log the user in
  db_query("INSERT INTO ".PRE."logins( user_id, session_key, ip, lastaccess )
                       VALUES('".$user_id."', '".$session_key."', '".$ip."', now() )" );

  include_once("setup/setup_setup1.php" );
                       
  /*
  //relocate the user to the next screen
  $path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
  header("Location: ".$path."setup_handler.php?x=".$session_key."&action=setup1" );
  secure_error("Auto page redirect could not detect server configuration.&nbsp;".
                "You will need to do a manual configuration" );
  
  */
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
if(DATABASE_NAME == "" ) {
  //this is an initial install
  
 include("setup/setup_setup1.php" );

  /*
  $path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
  header("Location: ".$path."setup_handler.php?action=setup1" );
  secure_error("Auto page redirect could not detect server configuration.&nbsp;".
                "You will need to do a manual configuration" );
  */
  die;
}

//login box screen code 
create_top_setup("Login" );

$content = "<p>Admin login is required for setup:</p>\n".
           "<form name=\"inputform\" method=\"post\" action=\"setup.php\">\n".
             "<table border=\"0\">\n".
               "<tr><td>Login: </td><td><input type=\"text\" name=\"username\" size=\"30\" /></td></tr>\n".
               "<tr><td>Password: </td><td><input type=\"password\" name=\"password\" value=\"\" size=\"30\" /></td></tr>\n".
             "</table>\n".
             "<div align=\"center\">\n".
             "<p><input type=\"submit\" value=\"Login\" /></p>\n".
             "</div></form>\n";

//set box options
new_box_setup("Login", $content, "boxdata", "singlebox" );

create_bottom_setup();

?>