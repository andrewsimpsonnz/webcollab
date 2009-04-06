<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Edit taskgroups

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

//secure
if(! @safe_integer($_GET['taskgroupid']) ){
  error('Taskgroup edit', 'There is no taskgroupid specified.' );
}
$taskgroupid = $_GET['taskgroupid'];

//get taskgroup information
if(! ($q = db_query('SELECT * FROM '.PRE.'taskgroups WHERE id='.$taskgroupid, 0 ) ) ) {
  error('Taskgroup edit', 'There was an error in the data query.' );
}

if(! ($row = db_fetch_array( $q, 0 ) ) ) {
  error('Taskgroup edit', 'Taskgroup does not exist' );
}

$content =  "<form method=\"post\" action=\"taskgroups.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"taskgroupid\" value=\"".$taskgroupid."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
            "<table class=\"celldata\">\n".
            "<tr><td>".$lang['taskgroup_name']."</td> <td><input type=\"text\" name=\"name\" value=\"".$row['name']." \"size=\"30\" /></td></tr>\n".
            "<tr><td>".$lang['taskgroup_description']."</td><td><input type=\"text\" name=\"description\" value=\"".$row['description']." \"size=\"30\" /></td></tr>\n".
            "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" /></p>\n".
            "</form>\n";

new_box($lang['edit_taskgroup'], $content );

?>