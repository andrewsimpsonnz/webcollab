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

  List and edit configuration

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/time.php" );

//set variables
$content = "";

//only for admins
if( $ADMIN != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}

$q = db_query("SELECT mailid, message, log_time FROM ".PRE."mail_log ORDER BY mailid, log_time" );

//start form data
$content .= "Email Log\n";

if(db_numrows($q) < 1 ) {
  $content .= "No emails are queued waiting for delivery\n";
}
else {
  $content .= "<table>\n";

  for($i=0 ; $row = db_fetch_array($q, $i ) ; $i++ ) {
    $content .= "<tr><td>".$row['message']."</td><td>".nicetime($row['log_time'] )."</td></tr>\n";
  }
  $content .= "</table>\n";
}            

new_box( "Email logging", $content );

?>
