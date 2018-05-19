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

  This is the administrative interface to the usergroups.

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

$content = "<ul class=\"menu\">\n";

if(ADMIN ) {
  $content .= "<li><a href=\"usergroups.php?x=".X."&amp;action=add\">".$lang['add']."</a></li>\n";
}

$content .= "<li><a href=\"usergroups.php?x=".X."&amp;action=manage\">".$lang['manage']."</a></li>\n".
            "</ul>\n";

new_box( $lang['usergroups'], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );

?>
