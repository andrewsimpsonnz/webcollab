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
  new_box_setup("Error", "<CENTER><BR>".$reason."<BR></CENTER>" );
  create_bottom_setup();
  die;

}


//valid login attempt ?
if( (isset($_POST["username"]) && isset($_POST["password"]) ) ) {

  $q = "";
  $login_q ="";

  include_once("../includes/database.php");

  //encrypt password
  $md5pass = md5( $_POST["password"] );
  //protect database against attack
  if(! get_magic_quotes_gpc() ) {
    $_POST["username"] = addslashes($_POST["username"]);
  }
  $login_q = "SELECT id FROM users WHERE deleted='f' AND name='".$_POST["username"]."' AND password='".$md5pass."'";


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
  @db_query("DELETE FROM logins WHERE user_id=".$user_id );

  //log the user in
  db_query("INSERT INTO logins( user_id, session_key, ip, lastaccess )
                       VALUES('".$user_id."', '".$session_key."', '".$ip."', current_timestamp(0) )" );
  //relocate the user to the main screen
  header("location: setup2.php?x=".$session_key);

  die;
}

create_top_setup("Login", 1 );

$content = "<CENTER>";

$content .= "<BR>Admin login is required for setup:<BR><BR>\n".
           "<FORM name=\"inputform\" method=\"POST\" action=\"login.php\">\n".
           "<TABLE border=\"0\">\n".
           "<TR><TD>Login: </TD><TD><INPUT type=\"text\" name=\"username\" size=\"30\"></TD></TR>\n".
           "<TR><TD>Password: </TD><TD><INPUT type=\"password\" name=\"password\" value=\"\" size=\"30\"></TD></TR>\n".
           "</TABLE>".
           "<INPUT type=\"submit\" value=\"Login\"><BR><BR>\n".

           "<DIV align=\"center\">".
           "<BR><BR>\n".
           "</DIV>".
           "</FORM>".

           "</CENTER>".
           "<BR>";

//set box options
new_box_setup("Login", $content, "400" );

create_bottom_setup();

?>
