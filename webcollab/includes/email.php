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

  Sends emails and preformatted emails
  
*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/admin_config.php" );

//
// Sends a message
//
function email( $to, $subject, $message) {

  global $EMAIL_FROM, $EMAIL_REPLY_TO;

  if( ! valid_string($to) ) {
    //no email address specified!
    return;
  }

  if( ! mail( $to, $subject, $message, "From: ".$EMAIL_FROM."\nReply-To: ".$EMAIL_REPLY_TO."\nX-Mailer: PHP/" . phpversion() ) ) {

    if( $to == $EMAIL_ERROR )
      //prevent error loops due to faulty email system!
      warning( "Internal error", "Unable to log internal fault due to email failure, please contact administrator" );
    else
      error("Email sender", "Email to ".$to." could not be sent");
  }
  return;
}

?>
