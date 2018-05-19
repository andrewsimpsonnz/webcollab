<?php
/*
  $Id: user_deleted_list.php 2180 2009-04-07 09:33:17Z andrewsimpson $

  (c) 2002 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Shows the deleted users and allow admins to revive them

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//first check if we are admin
if(! ADMIN ){
  return;
}

//check for deleted users
$q = db_query('SELECT COUNT(*) FROM '.PRE.'users WHERE deleted=\'t\'' );
if( ! db_result($q, 0, 0 ) ) {
  $content = "<small>".$lang['no_deleted_users']."</small>";
  new_box($lang['deleted_users'], $content );
  return;
}

//query
$q = db_query('SELECT id, fullname FROM '.PRE.'users WHERE deleted=\'t\' ORDER BY fullname' );

$content = "<table class=\"celldata\">\n";

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  $content .= "<tr class=\"grouplist\"><td><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['id']."\">".$row['fullname']."</a></td>\n".
              "<td><span class=\"textlink\">".
              "[<a href=\"users.php?x=".X."&amp;action=edit_del&amp;userid=".$row['id']."\">".$lang['edit']."</a>]".
              "</span></td></tr>\n";
}

$content .= "</table>";

//show it
new_box($lang['deleted_users'], $content );

?>