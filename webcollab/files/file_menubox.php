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

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only' );
}

//secure values
$content = '';

//add an option to admin files
$content .= "<ul class=\"menu\">\n".
            "<li><a href=\"files.php?x=".X."&amp;action=admin\">".$lang['file_admin']."</a></li>\n".
            "</ul>\n";

//show it
new_box( $lang['files'], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );

?>
