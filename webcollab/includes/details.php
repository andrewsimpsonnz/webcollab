<?php
/*
  $Id: details.php 1916 2008-01-04 08:23:14Z andrewsimpson $

  (c) 2004 - 2014 Andrew Simpson <andrewnz.simpson at gmail.com>

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

if(isset($_POST['taskid'] ) && safe_integer($_POST['taskid'] ) ) {
  $taskid = $_POST['taskid'];
}
elseif(isset($_GET['taskid'] ) && safe_integer($_GET['taskid'] ) ) {
  $taskid = $_GET['taskid'];
}
else {
  error('Task details', 'The taskid input is not valid' );
}

//get task details
$q_detail = db_prepare('SELECT * FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
if(! (db_execute($q_detail, array($taskid ) ) ) ) {
  error('Task details', 'There was an error in the data query.' );
}

//get the data
if( ! $TASKID_ROW = @db_fetch_array($q_detail, 0) ) {
  error('Task details', 'The requested item has either been deleted, or is now invalid.');
}

if($TASKID_ROW['parent'] == 0 ){
  $TYPE = 'project';
}
else {
  $TYPE = 'task';
}

//free memory
db_free_result($q_detail );

?>