<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file written in 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

$CONFIG_STATE = "";
include_once("screen_setup.php" );
include_once("../config.php" );

//error condition
function secure_error($reason ) {

  create_top_setup("Error", 1 );
  new_box_setup("Error", "<center><br />".$reason."<br /></center>" );
  create_bottom_setup();
  die;

}


//valid login attempt ?
if( (isset($_POST["username"]) && isset($_POST["password"]) ) ) {

  $q = "";
  $login_q ="";

  include_once("../includes/database.php" );
  include_once("../includes/common.php" );

  //encrypt password
  $md5pass = md5( $_POST["password"] );
  $login_q = "SELECT id FROM users WHERE deleted='f' AND name='".safe_data($_POST["username"])."' AND password='".$md5pass."'";


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
  mt_srand(hexdec(substr(md5(microtime() ), -8 ) ) & 0x7fffffff );
  $session_key = md5(mt_rand() );

  //remove the old login information
  @db_query("DELETE FROM logins WHERE user_id=".$user_id );

  //log the user in
  db_query("INSERT INTO logins( user_id, session_key, ip, lastaccess )
                       VALUES('".$user_id."', '".$session_key."', '".$ip."', now() )" );

  //remove any old cookies (don't want session persistence here)
  if(isset($_COOKIE["webcollab_session"] ) )
    setcookie("webcollab_session", "0" );

  //relocate the user to the next screen
  $path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
  header("Location: ".$path."database_skip.php?x=".$session_key);
  die;
}

//security check
if( ! isset($DATABASE_NAME ) || $DATABASE_NAME == "" ) {
  //this is an initial install
  $path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
  header("Location: ".$path."setup1.php" );
  die;
}


create_top_setup("Login", 1 );

$content = "<div align=\"center\">";

$content .= "<br />Admin login is required for setup:<br /><br />\n".
           "<form name=\"inputform\" method=\"POST\" action=\"index.php\">\n".
             "<table border=\"0\">\n".
               "<tr><td>Login: </td><td><INPUT type=\"text\" name=\"username\" size=\"30\"></td></tr>\n".
               "<tr><td>Password: </td><td><INPUT type=\"password\" name=\"password\" value=\"\" size=\"30\"></td></tr>\n".
             "</table>".
             "<input type=\"submit\" value=\"Login\"><br /><br />\n".
             "<div align=\"center\">".
             "<br /><br />\n".
             "</div>".
             "</form>".
           "</div>".
           "<br />";

//set box options
new_box_setup("Login", $content, "400" );

create_bottom_setup();

?>
