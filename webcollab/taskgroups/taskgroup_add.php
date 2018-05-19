<?php
/*
  $Id$

  (c) 2002 - 2017 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Add a taskgroup to the taskgroup-list

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

//generate_token
generate_token('taskgroup' );

$content =
      "<form method=\"post\" action=\"taskgroups.php\" onsubmit=\"return fieldCheck('name')\">\n".
      "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
      "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
      "<input type=\"hidden\" name=\"action\" value=\"submit_insert\" />\n".
      "<input type=\"hidden\" id=\"alert_field\" name=\"alert\" value=\"".$lang['missing_field_javascript']."\" /></fieldset>\n".
      "<table class=\"celldata\">\n".
      "<tr><td>".$lang['taskgroup_name']."</td><td><input id=\"name\" type=\"text\" name=\"name\" class=\"size\" />".
      "<script type=\"text/javascript\">document.getElementById('name').focus();</script></td></tr>\n".
      "<tr><td>".$lang['taskgroup_description']."</td><td><input type=\"text\" name=\"description\" class=\"size\" /></td></tr>\n".
      "</table>\n".
      "<p><input type=\"submit\" value=\"".$lang['add_taskgroup']."\" /></p>\n".
      "</form>\n";

new_box( $lang['add_new_taskgroup'], $content );

?>
