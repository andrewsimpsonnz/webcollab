<?php
/*
  $Id$
  
  (c) 2005 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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

  Spools emails on database for later sending


*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );


//
// Email spooling function
//

function email($to, $subject, $message ) {

  if(USE_EMAIL == "N" ) {
    //email is turned off in config file
    return;
  }
  if(strlen($to) == 0  ) {
    //no email address specified - end function
    return;
  }
  
  //spool message
  db_query("INSERT INTO ".PRE."mail_spool(mail_to, subject, message, character_set ) VALUES('".$to."', '".addslashes($subject)."', '".addslashes($message)."', '".CHARACTER_SET."')" ); 
  
  return;
}

?>
