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

  Compose emails for sending

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/email.php" );
include_once(BASE."includes/admin_config.php" );

//only for admins
if( $admin != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}

//initialise variables
$address_array = "";

// send to users or groups?
if( ! isset($_POST["group"]) )
  error("Email action handler", "No request given" );

//check we have a message!
if( ! isset($_POST["message"] ) || strlen($_POST["message"] ) == 0 )
  warning($lang["admin_email"], $lang["no_message"] );

//normalise embedded line breaks to '\n' and then wordwrap
$message = $_POST["message"];
$message = str_replace("\r\n", "\n", $message );
$message = str_replace("\r", "\n", $message );
$message = wordwrap($message, 100 );

//subject
if(isset($_POST["subject"] ) )
  $subject = $_POST["subject"];
else
  $subject = "";

//get rid of magic_quotes - it is not required here
if(get_magic_quotes_gpc() ) {
  $message = stripslashes($message );
  $subject = stripslashes($subject );
}

  //what do you want to send today =]
  switch($_POST["group"] ) {

    case "all":
      //select all users
      $q = db_query("SELECT email FROM users WHERE deleted='f'" );

      for($i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
        $address_array[$i] = $row[0];
      }
      break;

    case "group":
      //check if any usergroups have been sent
      if(isset($_POST["usergroup"] ) )
        $max = sizeof($_POST["usergroup"] );
      else
        warning($lang["admin_email"], $lang["no_usergroups"] );

      (array)$usergroup = $_POST["usergroup"];

      //initialise address_array counter
      $k = 0;

      //loop through chosen usergroups
      for($i=0 ; $i < $max ; $i++ ){
        //check for security, then get users for each usergroup
        if(isset($usergroup[$i] ) && is_numeric($usergroup[$i] ) ){
          $q = db_query("SELECT users.email
                          FROM usergroups_users
                          LEFT JOIN users ON (users.id=usergroups_users.userid)
                          WHERE usergroups_users.usergroupid=".$usergroup[$i]."
                          AND users.deleted='f'" );

          //loop through result rows and add users to the list
          for($j = 0 ; $row = @db_fetch_num($q, $j ) ; $j++){
            $address_array[$k] = $row[0];
            $k++;
          }
        }
      }
      break;

    case "maillist":
      //mailing list is added in below for every case - we don't specifically add it in here
      break;

    default:
      error("Admin email", "No group or user descriptor is set" );
      break;
}

//get the mailing list
$q = db_query("SELECT DISTINCT email FROM maillist" );

//merge the mailing list in too
$size = sizeof($address_array);
for($i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  $address_array[($size + $i)] = $row[0];
}

//remove duplicate addresses, and put into a comma separated list
$to = "";
$s = "";
while(list(,$address) = @each($address_array ) ) {
  if(strpos($to, $address ) === FALSE ) {
    $to .= $s.$address;
    $s = ", ";
  }
}

//silly error check
if(strlen($to ) != 0 ) {
  //send it
  email($to, $subject, $message );
}

//all done: warp back to main screen (Aye, aye captain).
header("Location: ".$BASE_URL."main.php?x=$x" );
?>
