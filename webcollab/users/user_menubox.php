<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002

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
require_once(BASE."includes/security.php" );

$content = "";

//add an option to add users
if($ADMIN == 1 ) {
  $content .= "<a href=\"users.php?x=$x&amp;action=add\">".$lang['add']."</a><br />\n".
              "<a href=\"users.php?x=$x&amp;action=manage\">".$lang['manage']."</a><br />\n";
 if(USE_EMAIL != "N")
   $content .= "<a href=\"users.php?x=$x&amp;action=email\">".$lang['email_users']."</a><br />\n";
}

$content .= "<a href=\"users.php?x=$x&amp;action=showonline\">".$lang['who_online']."</a><br />\n".
            "<a href=\"users.php?x=$x&amp;action=edit&amp;userid=$UID\">".$lang['edit_details']."</a><br />\n".
            "<a href=\"users.php?x=$x&amp;action=show&amp;userid=$UID\">".$lang['show_details']."</a><br />\n";

//show it
new_box($lang['users'], $content, "boxmenu" );

?>
