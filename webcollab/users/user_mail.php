<?php
/*
  $Id$

  (c) 2003 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

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

require_once("path.php" );
require_once(BASE."includes/security.php" );

//set variables
$content = "";

//only for admins
if( $admin != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}

//start form data
$content .=
        "<form method=\"POST\" action=\"users/user_mail_send.php\">\n".
          "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
          "<p><table border=\"0\">\n".
          "<tr><td><input type=\"radio\" value=\"all\" name=\"group\" id=\"all\" checked /><label for=\"all\" />".$lang["all_users"]."</label></td></tr>\n".
          "<tr><td><input type=\"radio\" value=\"maillist\" name=\"group\" id=\"maillist\" /><label for=\"maillist\" />".$lang["mailing_list"]."</label></td></tr>\n".
          "<tr><td><input type=\"radio\" value=\"group\" name=\"group\" id=\"group\" /><label for=\"group\" />".$lang["select_usergroup"]."</label></td></tr>\n";

//add user-groups
$q = db_query("SELECT name, id FROM usergroups ORDER BY name" );
$content .=  "<tr><td>".$lang["usergroup"].":</td><td><label for=\"group\" /><select name=\"usergroup[]\" multiple size=\"4\">\n";
for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {
  $content .= "<option value=\"".$row["id"]."\">".$row["name"]."</option>";
}
$content .= "</select></label><small><i>".$lang["select_instruct"]."</i></small></td></tr>\n".
            "</table></p>\n".
            "<p><table border=\"0\">\n".
            "<tr><td>".$lang["subject"]."</td><td><input type=\"text\" name=\"subject\" size=\"60\" /></td></tr>\n".
            "<tr><td>".$lang["message"]."</td><td><textarea name=\"message\" rows=\"10\" cols=\"60\" /></textarea></td></tr>\n".
            "<tr><td></td><td>".$lang["message_sent_maillist"]."</td></tr>\n".
            "</table></p>\n".
            "<p><input type=\"submit\" value=\"".$lang["post"]."\" />\n".
            "<input type=\"reset\" value=\"".$lang["reset"]."\" />\n".
            "</p></form>\n";

new_box($lang["admin_email"], $content );
?>
