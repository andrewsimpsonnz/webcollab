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

  Easy user manager

*/
//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once(BASE."includes/security.php" );
include_once(BASE."includes/admin_config.php" );
include_once(BASE."includes/email.php" );
include_once(BASE."config.php" );


//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );


//get some stupid errors
if( ! isset($_GET["userid"]) || ! is_numeric($_GET["userid"]) )
  error("User delete", "No userid specified" );

$userid = $_GET["userid"];

if(isset($_GET["action"] ) && $_GET["action"] == "permdel" ) {

  //kiss your ass goodbye :)
  db_begin();

  //Get the number of tasks created
  if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE creator=$userid" ), 0, 0 ) == 0 ) {

    //Get the number of tasks owned
    if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE owner=$userid" ), 0, 0 ) == 0 ) {

      //Get the number of forum posts
      if(db_result(db_query("SELECT COUNT(*) FROM forum WHERE userid=$userid" ), 0, 0 ) == 0 ) {

        //delete user from login tables
        db_query("DELETE FROM logins WHERE user_id=$userid" );

        //delete from seen table
        db_query("DELETE FROM seen WHERE userid=$userid" );

        //delete from usergroups_users
        db_query("DELETE FROM usergroups_users WHERE userid =$userid" );

        //get the users' info
        $q = db_query("SELECT email FROM users where id=$userid" );
        $email = db_result($q, 0, 0) ;

	//delete from users table
        db_query("DELETE FROM users WHERE id=$userid" );

        //mail the user that he/she had been deleted
        //$message = "Hello,\n\nThis is the ".$MANAGER_NAME." site informing you that your account has been PERMANENTLY deleted on ".date("F j, Y, H:i").".\n\nWe are sorry that you have left and I would like to thank you for your work!\n\nIf you object or think this is an error mail to ".$EMAIL_ADMIN." .";
        //email( $email, $ABBR_MANAGER_NAME.": Account PERMANENTLY deleted.", $message );
      }
    }
  }
db_commit();
}
else {
  //mark user as deleted
  db_begin();
  db_query("UPDATE users SET deleted='t' WHERE id=$userid" );

  //free all tasks that that user has done
  @db_query("UPDATE tasks SET owner=0 WHERE owner=$userid" );
  db_commit();

  //get the users' info
  $q = db_query("SELECT email FROM users WHERE id=$userid" );
  $email = db_result($q, 0, 0 );

  //mail the user that he/she had been deleted
  include_once( BASE."lang/".$LOCALE."_email.php" );
  $message = sprintf($email_delete_user, $MANAGER_NAME, date("F j, Y, H:i"), $EMAIL_ADMIN );
  email($email, $title_delete_user, $message );
}

header("location: ".BASE."users.php?x=$x&action=manage");

?>
