<?php
/*
  $Id$
  
  (c) 2003 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Serves some common things

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//
// Gives back the percentage completed of this tasks's children
//
//
function percent_complete($taskid ) {
  
  $tasks_completed = 0;
  $total_tasks = 0;
  
  $q = db_query("SELECT status FROM ".PRE."tasks WHERE projectid=".$taskid." AND parent<>0"  );
  
  for($i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) { 
    
    $total_tasks++;
      
    if($row[0] == 'done')
      $tasks_completed++;
    }
  
  //project with no tasks is complete
  if($total_tasks == 0 )
    return 0;
  
  return round(($tasks_completed / ($total_tasks ) ) * 100 );  
}

//
// Show percent
//
function show_percent($percent = 0 ) {
  $width = 400;
  switch($percent) {
    case 100:
      return "<table width=\"$width\"><tr><td width=\"$width\" class=\"greenbar\"></td></tr></table>\n";
      break;

    case 0:
      return "<table width=\"$width\"><tr><td width=\"$width\" class=\"redbar\"></td></tr></table>\n";
      break;

    default:
      $out  = "<table width=\"$width\"><tr><td width=\"".($percent * ($width/100))."\" class=\"greenbar\">";
      $out .= "</td><td width=\"".($width-($percent*($width/100)))."\" class=\"redbar\"></td></tr></table>\n";
      return $out;
      break;
  }
}

?>