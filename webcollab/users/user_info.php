<?php
/*
  $Id$
  
  (c) 2004 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Displays user manage splash page

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once("lang/lang_long.php" );

//admins only
if(! ADMIN )
  error("Unauthorised access", "This function is for admins only." );

$content = $user_info.
           "<div style=\"text-align:center\"><span class=\"textlink\">".
           "[<a href=\"users.php?x=$x&amp;action=add\">".$lang['add']."</a>]&nbsp;\n".
           "[<a href=\"users.php?x=$x&amp;action=showonline\">".$lang['who_online']."</a>]".
           "</span></div>\n";

new_box($lang['manage_users'], $content, "boxdata2" );

?>