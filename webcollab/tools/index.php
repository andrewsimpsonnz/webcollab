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


require_once("path.php" );

require_once(BASE."config/config.php" );
include_once(BASE."includes/screen.php" );


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

  include_once(BASE."database/database.php" );
  include_once(BASE."includes/common.php" );
  
  $q = "";
  $alert = "";
  $username = safe_data($_POST["username"]);
  //encrypt password
  $md5pass = md5($_POST["password"] );

  //no ip (possible?)
  if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
    secure_error("Unable to determine ip address");
  }
  
  //count the number of recent login attempts
  $count_attempts = db_result(@db_query("SELECT COUNT(*) FROM login_attempt 
                                                WHERE name='".$username."' 
                                                AND last_attempt > (now()-INTERVAL ".$delim."10 MINUTE".$delim.") LIMIT 6" ), 0, 0 );
    
  //protect against password guessing attacks 
  if($count_attempts > 3 ) {
    secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
  }                                                                              
    
  //record this login attempt
  db_query("INSERT INTO login_attempt(name, ip, last_attempt ) VALUES ('$username', '$ip', now() )" );
                                                                                     
  //do query and check database connection
  if( ! $q = db_query("SELECT id FROM users
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
  // seed number is required for early versions of PHP
  if(version_compare(PHP_VERSION, "4.2.0" ) == -1 )
    mt_srand(hexdec(substr(md5(microtime() ), -8 ) ) & 0x7fffffff );
  //use Mersenne Twister algorithm (random number), then one-way hash to give session key  
  $session_key = md5(mt_rand() );

  //remove the old login information
  @db_query("DELETE FROM logins WHERE user_id=$user_id" );
  @db_query("DELETE FROM login_attempt WHERE last_attempt < (now()-INTERVAL ".$delim."20 MINUTE".$delim.") OR name='".$username."'" );
  
  //log the user in
  db_query("INSERT INTO logins( user_id, session_key, ip, lastaccess ) VALUES ('$user_id', '$session_key', '$ip', now() )" );

    
  $content = "<p>Please select the service required:</p>\n".
             "<ul><li><a href=\"".BASE."tools/backup.php?x=".$session_key."\">Backup Database</a></li>\n".
             "<li><a href=\"".BASE."tools/update.php?x=".$session_key."\">Upgrade Database</a></li>\n".
             "<li><a href=\"".BASE."tools/phpinfo.php?x=".$session_key."\">PHP Info</a></li>\n".
             "</ul>\n";
  
  //display box calls
  create_top("Tool Menu" );
  new_box("Menu", $content, "boxdata", "singlebox" );
  create_bottom();
  die;
}
       
//
// MAIN PROGRAM
//

//login box screen code 
create_top("Login" );

$content = "<p>Admin login is required for backup operation:</p>\n".
           "<form name=\"inputform\" method=\"POST\" action=\"index.php\">\n".
             "<p><table border=\"0\">\n".
               "<tr><td>Login: </td><td><input type=\"text\" name=\"username\" size=\"30\" /></td></tr>\n".
               "<tr><td>Password: </td><td><input type=\"password\" name=\"password\" value=\"\" size=\"30\" /></td></tr>\n".
             "</table></p>\n".
             "<div align=\"center\">\n".
             "<p><input type=\"submit\" value=\"Login\" /></p>\n".
             "</div></form>\n";

//set box options
new_box("Login", $content, "boxdata", "singlebox" );

create_bottom();

?>