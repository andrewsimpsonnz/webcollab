<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  This file originally written as part of Core APM by Dennis Fleurbaaij 2001/2002.
  
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

  Secure the login

*/

//secure variables
$WEB_AUTH = "N";
$content = "";

include( "includes/screen.php" );
include( "includes/common.php" );

//error condition
function secure_error( $reason = "Unauthorised area" ) {

  global $lang;

  create_top($lang["login"], 1 );
  new_box($lang["error"], "<div align=\"center\"><br />$reason<br /></div>", "boxdata", "singlebox"  );
  create_bottom();
  die;

}

//valid login attempt ?
if( (isset($_POST["username"]) && isset($_POST["password"]) && strlen($_POST["username"]) > 0 && strlen($_POST["password"]) > 0 )
    || (isset($_SERVER["REMOTE_USER"])  && (strlen($_SERVER["REMOTE_USER"]) > 0 ) && $WEB_AUTH == "Y" ) ) {

  $q = "";
  $login_q ="";
  $username = "0";
  $md5pass = "0";
  $session_key = "";
  
  include_once "database/database.php";
  include_once "includes/common.php";

 //no ip (possible?)
  if( ! ($ip = $_SERVER["REMOTE_ADDR"] ) ) {
    secure_error("Unable to determine ip address");
  }
 
  if($WEB_AUTH == "Y" ) {
      //construct login query
      $login_q = "SELECT id FROM ".PRE."users WHERE name='".safe_data($_SERVER["REMOTE_USER"] )."' AND deleted='f'";
  }
  else {
    $username = safe_data($_POST["username"]);
    //encrypt password
    $md5pass = md5($_POST["password"] );

    //count the number of recent login attempts
    if( ! $q = @db_query("SELECT COUNT(*) FROM ".PRE."login_attempt 
                               WHERE name='".$username."' 
                               AND last_attempt > (now()-INTERVAL ".$delim."10 MINUTE".$delim.") LIMIT 6", 0 ) ) {
    secure_error("Unable to connect to database.  Please try again later." );
    }
  
    $count_attempts = db_result($q, 0, 0 );
      
    //protect against password guessing attacks 
    if($count_attempts > 4 ) {
      secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    }                                                                              
    
    //record this login attempt
    db_query("INSERT INTO ".PRE."login_attempt(name, ip, last_attempt ) VALUES ('$username', '$ip', now() )" );
                                                                                     
    //construct login query
    $login_q = "SELECT id FROM ".PRE."users WHERE password='".$md5pass."' AND name='".$username."' AND deleted='f'";
  }
   
  //database query
  if( ! $q = @db_query($login_q, 0 ) ) {
    sleep (2);
    secure_error($lang["no_login"]);
  }   
  
  //no such user-password combination
  if( @db_numrows($q) < 1 ) {
      sleep (2);
      secure_error($lang["no_login"]);
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
  @db_query("DELETE FROM ".PRE."logins WHERE user_id=$user_id" );
  @db_query("DELETE FROM ".PRE."login_attempt WHERE last_attempt < (now()-INTERVAL ".$delim."20 MINUTE".$delim.") OR name='".$username."'" );
   
  //log the user in
  db_query("INSERT INTO ".PRE."logins( user_id, session_key, ip, lastaccess ) VALUES ('$user_id', '$session_key', '$ip', now() )" );

  //try and set a session cookie (if the browser will let us)
  setcookie("webcollab_session", $session_key );
  //(No need to record an error here if unsuccessful: the code will revert to URI session keys)

  //relocate the user to the main screen
  //(we use both URI session key and cookies initially - in case cookies don't work)
  header("Location: ".$BASE_URL."main.php?x=$session_key");
  die;
}

//allow for continuation of session if a valid cookie is already set
if(isset($_COOKIE["webcollab_session"] ) && strlen($_COOKIE["webcollab_session"] ) == 32 ) {
  //relocate to main screen, and let security.php do further checking on session validity
  header("Location: ".$BASE_URL."main.php?x=0");
  die;
}

create_top($lang["login"], 1, "username" );

$content = "<div align=\"center\">";

if( $SITE_IMG != "" ) {
  $content .=  "<img src=\"images/".$SITE_IMG."\" /><br />";
}
else {
  $content .=  "<img src=\"images/webcollab_logo.jpg\" alt=\"WebCollab logo\" /><br />";
}

$content .= "<p>".$lang["please_login"].":</p>\n".
           "<form name=\"inputform\" method=\"post\" action=\"index.php\">\n".
           "<table border=\"0\" >\n".
           "<tr align=\"left\" ><td>".$lang["login"].": </td><td><input type=\"text\" name=\"username\" value=\"\" size=\"30\" /></td></tr>\n".
           "<tr align=\"left\" ><td>".$lang["password"].": </td><td><input type=\"password\" name=\"password\" value=\"\" size=\"30\" /></td></tr>\n".
           "</table>\n<br />\n".
           "<p><input type=\"submit\" value=\"".$lang["login"]."\" /></p>\n".

           "<div align=\"center\">";

switch( $DATABASE_TYPE ) {
  case "postgresql":
    $content .= "<a href=\"http://www.postgres.org\"><img border=\"0\" src=\"images/powered-by-postgresql.gif\" alt=\"Powered by postgresql\" /></a>";
    break; 
  
  case "mysql":
  case "mysql_innodb":
    $content .= "<a href=\"http://www.mysql.com\"><img border=\"0\" src=\"images/poweredbymysql-125.png\" alt=\"Powered by MySQL\" /></a>\n";
    break;
    
  default:           
     $content .= "<a href=\"http://www.php.net\"><img border=\"0\" src=\"images/php-logo.gif\" alt=\"PHP 4 code\" /></a>";
     break;
}      
           
$content .= "</div>".
            "</form>".
            "</div>";

//set box options
new_box($lang["login"], $content, "boxdata", "singlebox" );

create_bottom();

?>
