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


require_once("path.php" );

require_once(BASE."config/config.php" );
include_once(BASE."setup/screen_setup.php" );


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
  
  //set variables
  $q = "";
  $content = "";
  $flag_attempt = FALSE;
  $username = safe_data($_POST["username"]);
  //encrypt password
  $md5pass = md5($_POST["password"] );

  //no ip (possible?)
  if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
    secure_error("Unable to determine ip address");
  }

  //limit login attempts if post-1.60 database is being used 
  if(@db_query("SELECT * FROM login_attempt LIMIT 1", 0 ) ) {
      
    //count the number of recent login attempts
    if( ! $q = @db_query("SELECT COUNT(*) FROM login_attempt 
                               WHERE name='".$username."' 
                               AND last_attempt > (now()-INTERVAL ".$delim."10 MINUTE".$delim.") LIMIT 4", 0 ) ) {
      secure_error("Unable to connect to database.  Please try again later." );
    }
  
    $count_attempts = db_result($q, 0, 0 );
      
    //protect against password guessing attacks 
    if($count_attempts > 3 ) {
      secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    }
    $flag_attempt = TRUE;                                                                              
  
    //record this login attempt
    db_query("INSERT INTO login_attempt(name, ip, last_attempt ) VALUES ('$username', '$ip', now() )" );
  }                                                                                   
  
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

  //remove the old login information for post 1.60 database
  if($flag_attempt )
    @db_query("DELETE FROM login_attempt WHERE last_attempt < (now()-INTERVAL ".$delim."20 MINUTE".$delim.") OR name='".$username."'" );

    
  //update for version 1.32 -> 1.40
  if(! (db_query("SELECT groupaccess FROM config", 0 ) ) ) {
     db_query("ALTER TABLE tasks ADD COLUMN groupaccess VARCHAR(5)" );
     db_query("ALTER TABLE tasks ALTER COLUMN groupaccess SET DEFAULT 'f'" );
     db_query("ALTER TABLE config ADD COLUMN groupaccess VARCHAR(50)" );
     $content .= "<p>Updating from version pre-1.40 database ... success!</p>\n"; 
  }
  
  //update for version 1.51 -> 1.60
  if(! (db_query("SELECT * FROM login_attempt", 0 ) ) ) {
    
    switch ($DATABASE_TYPE) {
      case "mysql":
        db_query("CREATE TABLE login_attempt ( name VARCHAR(100) NOT NULL,
                                               ip VARCHAR(100) NOT NULL,
                                               last_attempt DATETIME NOT NULL)" );
        break;
      
      case "mysql_innodb":
        db_query("CREATE TABLE login_attempt ( name VARCHAR(100) NOT NULL,
                                               ip VARCHAR(100) NOT NULL,
                                               last_attempt DATETIME NOT NULL)
                                               TYPE = innoDB" );
        break;

          
      case "postgresql":
        db_query("CREATE TABLE \"login_attempt\" ( \"name\" character varying(100) NOT NULL,
                                               \"ip\" character varying(100) NOT NULL,
                                               \"last_attempt\" timestamp with time zone NOT NULL DEFAULT current_timestamp(0))" );
        break;
      
      default:
        error("Database type not specified in config file." );
        break;
    }
  $content .= "<p>Updating from version pre-1.60 database ... success!</p>\n";
  } 
    
  //update for version 1.51 -> 1.60
  if(! (db_query("SELECT private FROM users", 0 ) ) ) {
     db_query("ALTER TABLE users ADD COLUMN private INT" );
     db_query("ALTER TABLE users ALTER COLUMN private SET DEFAULT 0" );
  }
  
  //update for version 1.51 -> 1.60
  if(! (db_query("SELECT private FROM usergroups", 0 ) ) ) {
     db_query("ALTER TABLE usergroups ADD COLUMN private INT" );
     db_query("ALTER TABLE usergroups ALTER COLUMN private SET DEFAULT 0" );
  }
  
  if( ! $content )
    $content .= "<p>No database updates were required.</p>\n";
  
  $content .= "<p>Database update action has been completed.</p>\n";
  
  //display box calls
  create_top_setup("Info" );
  new_box_setup("Update completed", $content, "boxdata", "singlebox" );
  create_bottom_setup();
  die;
}
       
//
// MAIN PROGRAM
//

//login box screen code 
create_top_setup("Login" );

$content = "<p>Admin login is required for database update:</p>\n".
           "<form name=\"inputform\" method=\"post\" action=\"update.php\">\n".
             "<table class=\"celldata\">\n".
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