<?php
/*
  $Id: taskgroup_edit.php 2301 2009-08-25 09:15:52Z andrewsimpson $

  (c) 2002 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//includes
require_once(BASE.'includes/token.php' );

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

//secure
if(! @safe_integer($_GET['taskgroupid']) ){
  error('Taskgroup edit', 'There is no taskgroupid specified.' );
}
$taskgroupid = $_GET['taskgroupid'];

//generate_token
generate_token('taskgroup' );

//get taskgroup information
$q = db_prepare('SELECT * FROM '.PRE.'taskgroups WHERE id=?' );
db_execute($q, array($taskgroupid ) );

if(! ($row = db_fetch_array( $q, 0 ) ) ) {
  error('Taskgroup edit', 'Taskgroup does not exist' );
}

$content =  "<form method=\"post\" action=\"taskgroups.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"taskgroupid\" value=\"".$taskgroupid."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
            "<table class=\"celldata\">\n".
            "<tr><td>".$lang['taskgroup_name']."</td> <td><input type=\"text\" name=\"name\" value=\"".$row['group_name']."\" class=\"size\" /></td></tr>\n".
            "<tr><td>".$lang['taskgroup_description']."</td><td><input type=\"text\" name=\"description\" value=\"".$row['group_description']."\" class=\"size\" /></td></tr>\n".
            "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" /></p>\n".
            "</form>\n".
            "<form method=\"post\" action=\"taskgroups.php\" ".
            "onsubmit=\"return confirm( '".$lang['confirm_del_javascript']."')\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"taskgroupid\" value=\"".$taskgroupid."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_del\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
            "<p><input type=\"submit\" value=\"".$lang['delete']."\"/></p>\n".
            "</form>\n";

new_box($lang['edit_taskgroup'], $content );

?>
