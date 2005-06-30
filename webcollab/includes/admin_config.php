<?php
/*
  $Id$
 
  (c) 2003 - 2005  Andrew Simpson <andrew.simpson at paradise.net.nz>
  
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

  Set configuration variables

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//initialise variables
$EMAIL_MAILINGLIST = array();

//get config data
$q = db_query('SELECT * FROM '.PRE.'config' );
$row = @db_fetch_array($q, 0 );

//set variables
define('EMAIL_REPLY_TO', $row['reply_to']);
define('EMAIL_FROM', $row['email_from']);

$EMAIL_ADMIN        = $row['email_admin'];
$DEFAULT_ACCESS     = $row['globalaccess'];
$DEFAULT_EDIT       = $row['groupaccess'];
$DEFAULT_OWNER      = $row['owner'];
$DEFAULT_GROUP      = $row['usergroup'];

//mailing list
$q = db_query('SELECT DISTINCT email FROM '.PRE.'maillist' );

for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $EMAIL_MAILINGLIST[] = $row[0];
}

?>
