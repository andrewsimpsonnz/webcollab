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

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/email.php" );
include_once(BASE."lang/lang_email.php" );

$usergroup_names = "";
$admin_state ="";

//update or insert ?
if( ! isset($_REQUEST["action"]) )
  error("User submit", "No request given" );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);  

  switch($_REQUEST["action"] ) {

    //revive a user
    case "revive":

      //only for the admins
      if($admin != 1 )
        error("Authorisation failed", "You have to be admin to do this" );

      if( ! isset($_GET["userid"]) && ! is_numeric($_GET["userid"]) )
        error("User submit", "No userid was specified." );

      $userid = $_GET["userid"];

      //undelete
      db_query("UPDATE users SET deleted='f' WHERE id=$userid" );

      //get the users' info
      $q = db_query("SELECT name, fullname, email FROM users where id=$userid" );
      $row = db_fetch_array($q, 0 );

      //mail the user the happy news :)
      $message = sprintf( $email_revive, $MANAGER_NAME, date("F j, Y, H:i"), $row["name"], $row["fullname"], $EMAIL_ADMIN );
      email( $row["email"], $title_revive, $message );

      break;


    //add a user
    case "insert":

      //only for the l33t
      if( $admin != 1 )
        error("Authorisation failed", "You have to be admin to do this" );

      //check input has been provided
      $input_array = array("name", "fullname", "password", "email" );
      foreach( $input_array as $var ) {
        if( ! isset($_POST[$var]) || strlen($_POST[$var]) == 0 ) {
          warning( $lang["value_missing"], sprintf( $lang["field_sprt"], $var ) );
        }
      }

      //do basic check on email address
      if(ereg("^.+@.+\..+$", $_POST["email"] ) )
        $email = safe_data($_POST["email"]);
      else
        warning($lang["invalid_email"], sprintf( $lang["invalid_email_given_sprt"], $_POST["email"]) );

      $name     = safe_data($_POST["name"]);
      $fullname = safe_data($_POST["fullname"]);
      $password = safe_data($_POST["password"]);

      if( isset($_POST["admin_rights"]) && ( $_POST["admin_rights"] == "on" ) )
        $admin_rights = "t";
      else
        $admin_rights = "f";

      //prohibit 2 people from choosing the same username
      if(db_result(db_query("SELECT COUNT(*) FROM users WHERE name='$name'", 0 ), 0, 0 ) > 0 )
        warning($lang["duplicate_user"], sprintf($lang["duplicate_change_user_sprt"], $name ) );

      //begin transaction
      db_begin();
      //insert into the users table
      $q = db_query("INSERT INTO users(name, fullname, password, email, admin, deleted)
                     VALUES('$name', '$fullname', '".md5($password)."','$email','$admin_rights', 'f')" );

      //if the user is assigned to any groups execute the following code to add him/her
      if( isset($_POST["usergroup"]) ) {

        //get the oid of the just-inserted user
        $last_oid = db_lastoid($q );

        //get the uid of the last user
        $user_id = db_result(db_query("SELECT id FROM users WHERE $last_insert=$last_oid" ), 0, 0 );

        //insert all selected usergroups in the usergroups_users table
        (array)$usergroup = $_POST["usergroup"];
        $max = sizeof($usergroup);
        for( $i=0 ; $i < $max ; $i++ ) {

          //check for security
          if(isset( $usergroup[$i] ) && is_numeric( $usergroup[$i] ) ) {
            db_query("INSERT INTO usergroups_users(userid, usergroupid) VALUES($user_id, ".$usergroup[$i].")" );
            //get the usergroup name for the email
            $q = db_query("SELECT name FROM usergroups WHERE id=".$usergroup[$i] );
            $usergroup_names .= db_result($q, 0, 0 )."\n";
          }
        }
      }
      //transaction complete
      db_commit();

      //email the user all data
      if($usergroup_names == "" )
        $usergroup_names = $lang["not_usergroup"]."\n";
      if($admin_rights == "t" )
        $admin_state = $lang["admin_priv"]."\n";
      $message = sprintf($email_welcome, $MANAGER_NAME, date("F j, Y, H:i"), $EMAIL_ADMIN, $name, $password,$usergroup_names,
                  $fullname, $BASE_URL, $admin_state );
      email($email, $title_welcome, $message );

      break;


   //edit a user
   case "edit":

      //check input has been provided
      $input_array = array("name", "fullname", "email" );
      foreach($input_array as $var ) {
        if( ! isset($_POST[$var]) || strlen($_POST[$var]) == 0 ) {
          warning($lang["value_missing"], sprintf($lang["field_sprt"], $var ) );
        }
      }

      //check email address
      if(ereg("^.+@.+\..+$", $_POST["email"] ) )
        $email = safe_data($_POST["email"]);
      else
        warning($lang["invalid_email"], sprintf($lang["invalid_email_given_sprt"], safe_data($_POST["email"]) ) );

      $name     = safe_data($_POST["name"]);
      $fullname = safe_data($_POST["fullname"]);
      $password = safe_data($_POST["password"]);

      if(isset($_POST["admin_rights"]) && ( $_POST["admin_rights"] == "on" ) )
        $admin_rights = "t";
      else
        $admin_rights = "f";

      //an admin can edit all
      if( $admin == 1 ) {

        //check for a userid
        if( ! isset($_POST["userid"]) || ! is_numeric($_POST["userid"]) )
          error("User submit", "No userid specified ?");

        $userid = $_POST["userid"];

        //prohibit 2 people from choosing the same username
        if(db_result(db_query("SELECT COUNT(*) FROM users WHERE name='$name' AND NOT id=$userid", 0 ), 0, 0 ) > 0 )
          warning($lang["duplicate_user"], sprintf($lang["duplicate_change_user_sprt"], $name ) );

        //begin transaction
        db_begin();
        //was a password provided or not ?
        if($password != "" ) {

          //update data and the password
          $q = db_query("UPDATE users
                                SET name='$name',
                                fullname='$fullname',
                                email='$email',
                                password='".md5($password)."',
                                admin='$admin_rights'
                                WHERE id=$userid" );
        }
        else{
          //update data without password
          $q = db_query("UPDATE users
                                SET name='$name',
                                fullname='$fullname',
                                email='$email',
                                admin='$admin_rights'
                                WHERE id=$userid" );
        }

        //delete the user from all groups
        db_query("DELETE FROM usergroups_users WHERE userid=$userid" );

        //if the user is assigned to any groups execute the following code to add him/her
        if(isset($_POST["usergroup"]) ) {

          //insert all selected usergroups in the usergroups_users table
          (array)$usergroup = $_POST["usergroup"];
          for($i=0 ; $i < sizeof($usergroup) ; $i++ ) {

            //check for security
            if(is_numeric( $usergroup[$i] ) ) {
              db_query("INSERT INTO usergroups_users(userid, usergroupid) VALUES($userid, ".$usergroup[$i].")" );
              //get the usergroup name for the email
              $q = db_query("SELECT name FROM usergroups WHERE id=".$usergroup[$i] );
              $usergroup_names .= db_result( $q, 0, 0 )."\n";
            }
          }
        }
        //transaction complete
        db_commit();

        if($usergroup_names == "" )
          $usergroup_names = $lang["not_usergroup"]."\n";
        if($password == "" )
          $password = $lang["no_password_change"];
        if($admin_rights == "t" )
          $admin_state = $lang["admin_priv"]."\n";
        //email the changes to the user
        //$useremail and $username are in security.php
        $message = sprintf($email_user_change1, $MANAGER_NAME, date("F j, Y, H:i"), $username, $useremail, $name,
                $password, $usergroup_names, $fullname, $admin_state );
        email($email, $title_user_change1, $message );

      }
      else{
        //this is secure option where the user cannot change important values

        //prohibit 2 people from choosing the same username
        if(db_result(db_query("SELECT COUNT(*) FROM users WHERE name='$name' AND NOT id=$uid", 0 ), 0, 0 ) > 0 )
          warning($lang["duplicate_user"], sprintf($lang["duplicate_change_user_sprt"], $name ) );

        //did the user change his/her password ?
        if($password != "" ) {

          db_query("UPDATE users
                            SET name='$name',
                            fullname='$fullname',
                            password='".md5($password)."',
                            email='$email'
                            WHERE id=$uid" );

          //email the changes to the user
          $message = sprintf($email_user_change2, $MANAGER_NAME, date("F j, Y, H:i"), $name, $password, $fullname );
          email($email, $title_user_change2, $message );
        }
        else {

          db_query("UPDATE users
                            SET name='$name',
                            fullname='$fullname',
                            email='$email'
                            WHERE id=$uid" );

          //email the changes to the user
          $message = sprintf( $email_user_change3, $MANAGER_NAME, date("F j, Y, H:i"), $name, $fullname );
          email( $email, $title_user_change3, $message );
        }
      }
      break;


    //default error
    default:
      error("User submit", "Invalid request given");
      break;
  }

if ( $admin == 1 ) {
        header("Location: ".$BASE_URL."users.php?x=$x&action=manage" );
        die;
      }
      else {
        header( "location: ".$BASE_URL."users.php?x=$x&action=show&userid=$uid" );
        die;
      }

?>
