<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file created 2003 by Andrew Simpson

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

  List and edit configuration

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

//set variables
$content = "";
$maillist = "";

//only for admins
if( $admin != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}

//start form data
$content .=
        "<form method=\"POST\" action=\"admin/admin_config_submit.php\">\n".
          "<input type=\"hidden\" name=\"x\" value=\"$x\">\n".
          "<br />\n".
          "<table border=\"0\">\n";

$content .=
            "<tr><td nowrap colspan=\"2\"><b>".$lang["email_settings"]."</b></td></tr>\n".
            "<tr><td colspan=\"2\">&nbsp;</td></tr>";

//get config data
$q = db_query("SELECT * FROM config" );
$row = db_fetch_array( $q, 0 );

//email addresses
$content .=
            "<tr><td><a href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#admin\" target=\"helpwindow\">".$lang["admin_email"]."</a>: </td><td><INPUT type=\"text\" name=\"email_admin\" value=\"".$row["email_admin"]."\" size=\"30\"></td></tr>\n".
            "<tr><td><a href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#reply\" target=\"helpwindow\">".$lang["email_reply"]."</a>:</td><td><INPUT type=\"text\" name=\"reply_to\" value=\"".$row["reply_to"]."\" size=\"30\"></td></tr>\n".
            "<tr><td><a href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#from\" target=\"helpwindow\">".$lang["email_from"]."</a>:</td><td><INPUT type=\"text\" name=\"from\" value=\"".$row["email_from"]."\" size=\"30\"></td></tr>\n";

//get mailing list
$q = db_query("SELECT DISTINCT * FROM maillist" );

for( $i=0 ; $row_mail = @db_fetch_array($q, $i ) ; $i++) {
$maillist .= $row_mail["email"]."\n";
}

$content .= "<tr><td><a href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#list\" target=\"helpwindow\">".$lang["mailing_list"]."</a>: </td><td><textarea name=\"email\" rows=\"5\" cols=\"30\">".$maillist."</textarea><br /><br /></td></tr>\n";

$content .= "<tr><td nowrap colspan=\"2\"><b>".$lang["default_checkbox"]."</b></td></tr>\n".
            "<tr><td colspan=\"2\">&nbsp;</td></tr>";

//defaults for task checkboxes
$content .= "<tr><td>".$lang["allow_globalaccess"]."</td><td><INPUT type=\"checkbox\" name=\"access\" ".$row["globalaccess"]."></td></tr>\n".
            "<tr><td>".$lang["allow_group_edit"]."</td><td><INPUT type=\"checkbox\" name=\"group_edit\" ".$row["groupaccess"]."></td></tr>\n".
            "<tr><td>".$lang["set_email_owner"]."</td><td><INPUT type=\"checkbox\" name=\"owner\" " .$row["owner"]."></td></tr>\n".
            "<tr><td>".$lang["set_email_group"]."</td><td><INPUT type=\"checkbox\" name=\"usergroup\"  ".$row["usergroup"]."></td></tr>\n".
            "<tr><td colspan=\"2\">&nbsp;</td></tr>".
          "</table>\n";


$content .=
          "<input type=\"submit\" name=\"Add\" value=\"".$lang["update"]."\"> ".
          "<input type=\"reset\">".
        "</form>\n".
        "<br /><br />\n";

new_box( $lang["configuration"], $content );

?>
