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

  Secure the login

*/

include( "includes/screen.php" );
include( "includes/common.php" );

//error condition
function secure_error( $reason = "Unauthorised area" ) {

  global $lang;

  create_top($lang["login"], 1 );
  new_box($lang["error"], "<center><br />$reason<br /></center>" );
  create_bottom();
  die;

}


//valid login attempt ?
if( (isset($_POST["username"]) && isset($_POST["password"]) && valid_string($_POST["username"]) && valid_string($_POST["password"]) )
   || (isset($_SERVER["REMOTE_USER"]) ) ) {

  $q = "";
  $login_q ="";
  $auth = FALSE;

  include_once "includes/database.php";

  if(isset($WEB_AUTH ) && isset($_SERVER["REMOTE_USER"]) ){
    if($WEB_AUTH == "Y" )
      $auth = TRUE;
  }

  if($auth){
    $login_q = "SELECT id FROM users WHERE deleted='f' AND name='".$_SERVER["REMOTE_USER"]."'";
  }
  else{
    //encrypt password
    $md5pass = md5( $_POST["password"] );
    //protect database against attack
    if(! get_magic_quotes_gpc() ) {
      $_POST["username"] = addslashes($_POST["username"]);
    }
    $login_q = "SELECT id FROM users WHERE deleted='f' AND name='".$_POST["username"]."' AND password='$md5pass'";
  }

  //no database connection
  if( ! ($q = db_query($login_q ) ) ) {
    secure_error("No database connection, not able to login to verify username");
  }

  //no such user-password combination
  if( @db_numrows($q) < 1 ) {
      secure_error($lang["no_login"]);
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
  srand((double)microtime()*1000000);
  $session_key = md5(rand(0,42352352) . "would you hack me with this string to randomise");

  //remove the old login information
  @db_query("DELETE FROM logins WHERE user_id=$user_id" );

  //log the user in
  db_query("INSERT INTO logins( user_id, session_key, ip, lastaccess ) VALUES ('$user_id', '$session_key', '$ip', now() )" );

  //try and set a session cookie (if the browser will let us)
  setcookie("session_key", $session_key, time()+3600, "/", $DOMAIN, 0  );
  //(No need to record an error here if unsuccessful: code will revert to URI session keys)

  //relocate the user to the main screen
  //(we use both URI session key and cookies initially - in case cookies don't work)
  header("location: main.php?x=$session_key");
  die;
}

create_top($lang["login"], 1, "username" );

$content = "<center>";

if( $SITE_IMG != "" ) {
  $content .=  "<img src=\"images/".$SITE_IMG."\"><br />";
}
else {
  $content .=  "<img src=\"images/webcollab.png\" alt=\"WebCollab logo\"><br />";
}

$content .= "<br />".$lang["please_login"].":<br /><br />\n".
           "<form name=\"inputform\" method=\"POST\" action=\"index.php\">\n".
           "<table border=\"0\">\n".
           "<tr><td>".$lang["login"].": </td><td><input type=\"text\" name=\"username\" value=\"$username\" size=\"30\"></td></tr>\n".
           "<tr><td>".$lang["password"].": </td><td><input type=\"password\" name=\"password\" value=\"\" size=\"30\"></td></tr>\n".
           "</table>".
           "<input type=\"submit\" value=\"".$lang["login"]."\"><br /><br />\n".

           "<div align=\"center\">".
           "<br /><br />\n".
           //
           // Select one, or more images from selection below
           //
           //"<a href=\"http://www.php.net\"><img border=\"0\" src=\"images/php-logo.gif\" alt=\"PHP 4 code\"></a>".
           //"<a href=\"http://www.postgres.org\"><img border=\"0\" src=\"images/powered-by-postgresql.gif\" alt=\"Powered by postgresql\"></a>".
           //"<a href=\"http://httpd.apache.org\"><img border=\"0\" src=\"images/apache_b.gif\" alt=\"Powered by Apache Webserver\"></a>".
           "<a href=\"http://www.mysql.com\"><img border=\"0\" src=\"images/poweredbymysql-125.png\" alt=\"Powered by MySQL\"></a>\n".
           "</div>".
           "</form>".

           "</center>".
           "<br />";

//set box options
new_box($lang["login"], $content, "400" );

create_bottom();

?>
