<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>
  
  WebCollab
  ---------------------------------------
  
  Based on original file written for Core APM by Dennis Fleurbaaij 2001/2002

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

  The menu box that contains the user-functions

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

include_once( BASE."config.php" );

//secure values
$content = "";

//add an option to admin files
if($admin == 1 )
  $content .= "<a href=\"files.php?x=$x&amp;action=admin\">".$lang["file_admin"]."</a><br />\n";

if($taskid != -1 )
  $content .= "<a href=\"files.php?x=$x&amp;taskid=$taskid&amp;action=upload\">".$lang["add_file"]."</a><br />\n";

//show it
new_box( $lang["files"], $content, "boxmenu" );

?>
