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

  A main menu

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//secure values
$content = "";

//create content
$content .= "<a href=\"main.php?x=$x\">".$lang["home_page"]."</a><br />\n".
            "<a href=\"tasks.php?x=$x&amp;action=summary\">".$lang["summary_page"]."</a><br />\n".
            "<a href=\"users.php?x=$x&amp;action=todo\">".$lang["todo_list"]."</a><br />\n".
            "<a href=\"calendar.php?x=$x\">".$lang["calendar"]."</a><br />\n".
            "<a href=\"includes/logout.php?x=$x\">".$lang["log_out"]."</a><br />\n";

//show
new_box( $lang["main_menu"], $content, "boxmenu" );

?>
