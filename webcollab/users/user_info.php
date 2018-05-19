<?php
/*
  $Id$

  (c) 2004 - 2008 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once('lang/lang_long.php' );

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

$content = $user_info;

new_box($lang['manage_users'], $content, 'boxdata-normal', 'head-normal', 'boxstyle-short' );

?>