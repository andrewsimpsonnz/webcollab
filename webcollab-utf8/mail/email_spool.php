<?php
/*
  $Id$
  
  (c) 2003 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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

  Sends spools emails on database for later sending


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
 
  db_begin();
  
  //spool message
  db_query("INSERT INTO ".PRE."mail_spool(mail_to, subject, message, character_set ) VALUES('".$to."', '".$subject."', '".$message."', '".CHARACTER_SET."')" ); 
  
  //log event
  $mail_id = db_lastoid('mail_spool_id' );
  db_query("INSERT INTO ".PRE."mail_log(mailid, message, log_time) VALUES(".$mail_id.", 'New message in mail queue ready for processing', now() )" );

  db_commit();
  
  return;
}

?>
