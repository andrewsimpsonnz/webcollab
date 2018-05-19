<?php
/*
  $Id$

  (c) 2002 - 2010 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  The menu box that contains the user-functions

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

$content = "<ul class=\"menu\">\n";

//add an option to add users
if(ADMIN ) {
  $content .= "<li><a href=\"users.php?x=".X."&amp;action=add\">".$lang['add']."</a></li>\n";
}

$content .= "<li><a href=\"users.php?x=".X."&amp;action=manage\">".$lang['manage']."</a></li>\n";

if((ADMIN) && (USE_EMAIL != 'N') ){
  $content .= "<li><a href=\"users.php?x=".X."&amp;action=email\">".$lang['email_users']."</a></li>\n";
}

$content .= "<li><a href=\"users.php?x=".X."&amp;action=showonline\">".$lang['who_online']."</a></li>\n";

if((GUEST == false ) || ((GUEST == true ) && (GUEST_LOCKED == 'N' ) ) ){
  $content .= "<li><a href=\"users.php?x=".X."&amp;action=edit&amp;userid=".UID."\">".$lang['edit_details']."</a></li>\n";
}

$content .= "<li><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".UID."\">".$lang['show_details']."</a></li>\n".
            "</ul>\n";

//show it
new_box($lang['users'], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );

?>
