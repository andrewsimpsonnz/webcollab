<?php
/*
  $Id$
  
  (c) 2004 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson.

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

  Get the details for $taskid

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

if(empty($_REQUEST['taskid']) || ! is_numeric($_REQUEST['taskid']) ) {
  error('Task details', 'The taskid input is not valid' ); 
}

$taskid = intval($_REQUEST['taskid']);

//get task details
if(! ($q = @db_query('SELECT * FROM '.PRE.'tasks WHERE id='.$taskid, 0 ) ) ) {
  error('Task details', 'There was an error in the data query.' );
}

//get the data
if( ! $TASKID_ROW = @db_fetch_array($q, 0) ) {
  error('Task details', 'The requested item has either been deleted, or is now invalid.');
}

if($TASKID_ROW['parent'] == 0 ){
  $TYPE = 'project';
}
else {
  $TYPE = 'task';
}

//free memory  
db_free_result($q );  
    
?>