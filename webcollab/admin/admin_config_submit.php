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

  Set configuration

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//set variables
$content = "";

//only admin
if( $admin != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}

//check and validate email addresses
$input_array = array("email_admin", "reply_to", "from", "error" );
  foreach( $input_array as $var) {
    if( isset($_POST[$var]) && valid_string($_POST[$var]) ) {
      if( ! ereg("^.+@.+\..+$", $_POST[$var] ) )
        warning( $lang["invalid email"], sprintf( $lang["invalid_email_given_sprt"], $_POST[$var] ) );
    }
}

$email_admin = safe_data($_POST["email_admin"]);
$reply_to    = safe_data($_POST["reply_to"]);
$from        = safe_data($_POST["from"]);

//check and validate checkboxes
if( isset($_POST["access"]) && $_POST["access"] == "on" )
  $access = "checked";
else
  $access = "";

if( isset($_POST["owner"]) && $_POST["owner"] == "on" )
  $owner = "checked";
else
  $owner = "";

if( isset($_POST["usergroup"]) && $_POST["usergroup"] == "on" )
  $usergroup = "checked";
else
  $usergroup = "";

//update config database
db_query( "UPDATE config SET email_admin='".$email_admin."',
                             reply_to='".$reply_to."',
			     email_from='".$from."',
			     globalaccess='".$access."',
			     owner='".$owner."',
			     usergroup='".$usergroup."'");

/*
Begin mailing list clean up

Because we get the mailing list input from a textarea, it needs thorough filtering to remove weird browser formatting
*/

//roughly separate out the email list by newlines, spaces, formfeeds etc...
$input_list = split( "[ \f\r\n\t]+", $_POST["email"] );

//initialise secondary counter
$j = 0;

//step through the split input array looking for email addresses
for( $i=0 ; $i < sizeof($input_list) ; $i++) {
  //check for valid address anywhere this data string
  if( ereg("[a-z0-9\-\.]+@[a-z0-9\-\.]+\.[a-z0-9]+", $input_list[$i], $value ) ) {
    //found one - remove any whitespace at each end, then save it
    $email_list[$j] = trim($value[0]);
    $j++;
  }
}

//drop old list
//can't use a transaction here - postgres' does not like it!
db_query( "TRUNCATE TABLE maillist");

//add new list
if( isset($email_list ) ) {
  for( $i=0 ; $i < sizeof($email_list) ; $i++ ) {
    db_query( "INSERT INTO maillist (email) VALUES ('".$email_list[$i]."')" );
  }
}
//all done!

header("location: ".BASE."main.php?x=".$x );
?>
