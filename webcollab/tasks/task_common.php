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

  Serves some common things

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//
// Gives back the percentage completed of this tasks's children
//
//
function percent_complete($taskid ) {

  if($taskid == "" )
    return;

  $tasks_completed = db_result(db_query("SELECT COUNT(*) FROM tasks WHERE parent<>0 AND projectid=$taskid AND status='done'" ), 0, 0 );
  $total_tasks = db_result(db_query("SELECT COUNT(*) FROM tasks WHERE parent<>0 AND projectid=$taskid" ), 0, 0 );

  switch($tasks_completed ) {
    case 0:
      return 0;
      break;

    case($total_tasks ):
      return 100;
      break;

    default:
      return($tasks_completed / $total_tasks ) * 100;
      break;
  }
}

//
// Show percent
//
function show_percent($percent = 0 ) {
  $out = "";
  $width = 400;
  $height = 4;
  switch($percent) {
    case 100:
      return "<table width=\"$width\"><tr><td height=\"$height\" width=\"$width\" bgcolor=\"#008B45\" nowrap></td></tr></table>\n";
      break;

    case 0:
      return "<table width=\"$width\"><tr><td height=\"$height\" width=\"$width\" bgcolor=\"#FFA500\" nowrap></td></tr></table>\n";
      break;

    default:
      $out .= "<table width=\"$width\"><tr><td height=\"$height\" width=\"".($percent * ($width/100))."\" bgcolor=\"#008B45\" nowrap>";
      $out .= "</td><td width=\"".($width-($percent*($width/100)))."\" bgcolor=\"#FFA500\" nowrap></td></tr></table>\n";
      return $out;
      break;
  }
}

?>
