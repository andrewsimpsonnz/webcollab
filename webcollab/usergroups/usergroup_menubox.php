<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
  WebCollab
  ---------------------------------------
  
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002.

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

  This is the administrative interface to the taskgroups.

*/
require_once("path.php" );
require_once(BASE."includes/security.php" );

//only for admins
if($admin != 1 )
  return;

$content = "<a href=\"usergroups.php?x=$x&amp;action=add\">".$lang["add"]."</a><br />\n".
           "<a href=\"usergroups.php?x=$x&amp;action=manage\">".$lang["manage"]."</a><br />\n";

new_box( $lang["usergroups"], $content, "boxmenu" );

?>
