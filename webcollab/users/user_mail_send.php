<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file created 2003 by Andrew Simpson

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
require_once(BASE."includes/email.php" );
include_once(BASE."includes/admin_config.php" );

//only for admins
if( $admin != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}


function tag_remove($message ) {

  //remove any dangerous tags that exist
  $message = preg_replace("/(<\/?)(\w+)([^>]*>)/e", "'\\1'.strtoupper('\\2').'\\3'", $message );
  $block_tag = array("APPLET", "OBJECT", "SCRIPT", "EMBED", "FORM", "?", "%" );
    foreach ($block_tag as $value ) {
      $message = str_replace("<".$value, "<**** ", $message );
    }
  return $message;
}


//
// send to users or groups?
//
if( ! isset($_POST["group"]) || ! valid_string($_POST["group"]) )
  error("Email action handler", "No request given" );

  //what do you want to task today =]
  switch($_POST["group"] ) {

    case "all":
      $q = db_query("SELECT email FROM users WHERE deleted='f'" );

      for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
        $address_array[$i] = $row["email"];
      }
      break;

    case "group":
      //check if array has been sent - without creating warning messages!
      if(isset($_POST["usergroup"] ) )
        $max = sizeof($_POST["usergroup"] );
      else
        $max = 0;

      if($max == 0 )
        warning("No addresses"," No usergroup addresses entered.  Please go back and select a usergroup." );

      (array)$usergroup = $_POST["usergroup"];
      (array)$address_array = "";

      for($i=0 ; $i < $max ; $i++ ){
        //check for security
        if(isset($usergroup[$i] ) && is_numeric($usergroup[$i] ) ){
          $q = db_query("SELECT users.email AS email
                          FROM usergroups_users
                          LEFT JOIN users ON (users.id=usergroups_users.userid)
                          WHERE usergroups_users.usergroupid=".$usergroup[$i]."
                          AND users.deleted='f'" );

          for($j=0 ; $row = @db_fetch_array($q, $j ) ; $j++){
            $address_array[$j] = $row["email"];
          }
        }
      }
      break;

    case "maillist":
      (array)$address_array = "";
      //check if mailing list exists
      if(db_result(db_query("SELECT COUNT(*) FROM maillist" ) ) == 0 );
        warning("No addresses","Nothing to send. No addresses are entered in the mailing list." );
      break;

    default:
      error("Admin email", "No group or user descriptor is set" );
      break;
}

//get the mailing list
$q = db_query("SELECT DISTINCT * FROM maillist" );

//merge the mailing list in too
$size = sizeof($address_array);
for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {
  $address_array[($size + $i)] = $row["email"];
}

//remove duplicate addresses, and put into a comma sorted list
$to = "";
$max = sizeof($address_array );
for($i=0 ; $i<$max ; $i++ ) {
  if( ! substr($to, $address_array[$i] ) ) {
    $to .= $s.$address_array[$i];
    $s = ", ";
  }
}

//silly error check
if(strlen($to ) == 0 )
  error("Admin email","No addresses to send." );

//check we have a message!
if( ! valid_string($_POST["message"] ) )
  warning("No message", "There is no message to send.  Please go back and enter a message." );

$message = wordwrap($_POST["message"], 100 );

//subject
if(valid_string($_POST["subject"] ) )
  $subject = $_POST["subject"];
else
  $subject = "";

//send it
email($to, tag_remove($subject ), tag_remove($message ) );

//all done: warp back to main screen (Aye, aye captain).
header("Location: ".$BASE_URL."main.php?x=$x" );
?>
