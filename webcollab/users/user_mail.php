<?php
/*
  $Id$

  (c) 2003 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Compose emails for sending

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );

//set variables
$content = '';

//only for admins
if( ! ADMIN ) {
  error( 'Not permitted', 'This function is for admins only' );
  return;
}

//generate_token
generate_token('user_mail' );

//start form data
$content .=
        "<form method=\"post\" action=\"users.php\" onsubmit=\"return fieldCheck('message');\">\n".
        "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
        "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
        "<input type=\"hidden\" id=\"alert_field\" name=\"alert1\" value=\"".$lang['missing_field_javascript']."\" />\n".
        "<input type=\"hidden\" name=\"action\" value=\"submit_email\" /></fieldset>\n".
        "<table class=\"celldata\">\n".
        "<tr><td></td><td>\n".
        "<table class=\"decoration\" >\n".
        "<tr><td><input type=\"radio\" value=\"all\" name=\"group\" id=\"all\" checked=\"checked\" /><label for=\"all\">".$lang['all_users']."</label></td>\n".
        "<td><input type=\"radio\" value=\"maillist\" name=\"group\" id=\"maillist\" /><label for=\"maillist\">".$lang['mailing_list']."</label></td>\n".
        "<td><input type=\"radio\" value=\"group\" name=\"group\" id=\"group\" /><label for=\"group\">".$lang['select_usergroup']."</label></td></tr>\n";

//add user-groups
$q = db_query('SELECT group_name, id FROM '.PRE.'usergroups ORDER BY group_name' );
$content .=  "<tr><td></td><td>".$lang['usergroup'].":</td><td><label><select name=\"usergroup[]\" multiple=\"multiple\" size=\"4\">\n";
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  $content .= "<option value=\"".$row['id']."\">".$row['group_name']."</option>";
}
$content .= "</select></label></td></tr>\n".
            "<tr><td></td><td></td><td><small><i>".$lang['select_instruct']."</i></small></td></tr>\n".
            "</table>\n".
            "</td></tr>\n".
            "<tr><td>".$lang['subject']."</td><td><input type=\"text\" name=\"subject\" style=\"width: 300px\" /></td></tr>\n".
            "<tr><td>".$lang['message']."</td><td><textarea name=\"message\" id=\"message\" rows=\"25\" cols=\"88\"></textarea></td></tr>\n".
            "<tr><td></td><td>".$lang['message_sent_maillist']."</td></tr>\n".
            "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['post']."\" /></p>\n".
            "</form>\n";

new_box($lang['admin_email'], $content );
?>
