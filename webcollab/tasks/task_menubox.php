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

  This shows the menubox for the tasks-part.

*/


//secure variables
$content  = "";
$title = $lang["ttask"];
$taskid = "";

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/database.php" );

//the task dependent part
if( isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) {

  $taskid = $_GET["taskid"];

  //find out if the user owns this task
  if( @db_result( db_query("SELECT COUNT(*) FROM tasks WHERE id=".$taskid." AND owner=".$uid ), 0, 0 ) == 1 )
    $owner=true;
  else
    $owner=false;

  if( ($admin==1) || $owner ) {
    
    $q = db_query( "SELECT name, parent FROM tasks WHERE id=".$taskid );
    $row = db_fetch_array($q, 0 );
    if( $row["parent"] == 0 )
      $title = $lang["pproject"];

    $content .= "<SMALL><B>".$lang["admin"].":</B></SMALL><BR>\n";
    $content .= "<A href=\"tasks.php?x=".$x."&action=delete&taskid=".$taskid."\"  onClick=\"return confirm( '".sprintf($lang["del_javascript_sprt"], strtolower($title), $row["name"] )."')\">".$lang["delete"]." ".strtolower($title)."</A><BR>\n";
    $content .= "<A href=\"tasks.php?x=".$x."&action=edit&taskid=".$taskid."\">".$lang["edit"]." ".strtolower($title)."</A><BR>\n";
    $content .= "<BR><SMALL><B>".$lang["global"].":</B></SMALL><BR>\n";
  }

  $content .= "<A href=\"tasks.php?x=".$x."&action=add&parentid=".$taskid."\">".$lang["add_task"]."</A><BR>\n";

}


//the task-independent part
$content .= "<A href=\"tasks.php?x=".$x."&action=add\">".$lang["add_project"]."</A><BR>\n";

new_box( $title.$lang["options"], $content );

?>
