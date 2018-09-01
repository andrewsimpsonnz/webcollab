<?php
/*
  $Id$

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

  Add users

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'users/user_common.php' );

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

//generate_token
generate_token('user_add' );

$content =  "<form method=\"post\" action=\"users.php\" ".
            "onsubmit=\"return fieldCheck('email', 'pass', 'full', 'name') && emailCheck('email')\">\n".
            "<fieldset><input type=\"hidden\" name=\"action\" value=\"submit_insert\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
            "<input type=\"hidden\" id=\"alert_email\" name=\"alert1\" value=\"".$lang['invalid_email']."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert2\" value=\"".$lang['missing_field_javascript']."\" /></fieldset>\n".
            "<table class=\"celldata\">\n".
            "<tr><td>".$lang['login_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" class=\"size\" />".
            "<script type=\"text/javascript\">document.getElementById('name').focus();</script></td></tr>\n".
            "<tr><td>".$lang['full_name'].":</td><td><input id=\"full\" type=\"text\" name=\"fullname\" class=\"size\" /></td></tr>\n".
            "<tr><td>".$lang['password'].":</td><td><input id=\"pass\" type=\"".PASS_STYLE."\" name=\"password\" class=\"size\" /></td></tr>\n".
            "<tr><td>".$lang['email'].":</td><td><input id=\"email\" type=\"text\" name=\"email\" class=\"size\" /></td></tr>\n".
            user_locale(LOCALE).
            "<tr><td></td><td></td></tr>\n".
            "<tr><td><label for=\"private\">".$lang['private_user'].":</label></td><td><input type=\"checkbox\" name=\"private_user\" id=\"private\" /></td></tr>\n".
            "<tr><td></td><td></td></tr>\n".
            "<tr><td><label for=\"normal\">".$lang['normal_user'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"normal\" id=\"normal\" checked=\"checked\" /></td></tr>\n".
            "<tr><td><label for=\"admin\">".$lang['is_admin'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"admin\" id=\"admin\" /></td></tr>\n".
            "<tr><td><label for=\"guest\">".$lang['is_guest'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"guest\" id=\"guest\" /></td></tr>\n".
            "<tr><td></td><td></td></tr>\n";

//add user-groups
$q = db_query('SELECT group_name, id FROM '.PRE.'usergroups ORDER BY group_name' );

$content .= "<tr><td>".$lang['usergroup'].":</td><td><select name=\"usergroup[]\" multiple=\"multiple\" size=\"4\">\n";

for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  $content .= "<option value=\"".$row['id']."\">".$row['group_name']."</option>";
}

$content .= "</select><small><i>".$lang['select_instruct']."</i></small></td></tr>\n".
            "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['add']."\" /></p>\n".
            "</form>";

new_box($lang['user_info'], $content );

?>
