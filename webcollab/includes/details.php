<?php
/*
  $Id$
  
  (c) 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

require_once("path.php" );
require_once(BASE."includes/security.php" );

if( ! isset($_REQUEST["taskid"]) || ! is_numeric($_REQUEST["taskid"]) )
  error("Task details", "The taskid input is not valid" ); 

$taskid = intval($_REQUEST["taskid"]);

//get task details
$q = @db_query("SELECT * FROM tasks WHERE id=$taskid" );

//get the data
if( ! $taskid_row = @db_fetch_array($q, 0) )
  error("Task details", "The requested item has either been deleted, or is now invalid.");

$type = "task";
if($taskid_row["parent"] == 0 )
  $type = "project";
  
  
?>