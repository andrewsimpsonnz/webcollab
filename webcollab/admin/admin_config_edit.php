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

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//set variables
$content = "";
$maillist = "";

//only for admins
if( $admin != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}

//start form data
$content .= "<FORM method=\"POST\" action=\"admin/admin_config_submit.php\">\n".
	    "<INPUT type=\"hidden\" name=\"x\" value=\"".$x."\">\n".
	    "<BR>\n".
	    "<TABLE border=\"0\">\n";
            

$content .= "<TR><TD nowrap colspan=\"2\"><B>".$lang["email_settings"]."</B></TD></TR>\n".
            "<TR><TD colspan=\"2\">&nbsp;</TD></TR>";

//get config data
$q = db_query( "SELECT * FROM config" );
$row = db_fetch_array( $q, 0 );

//email addresses
$content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#admin\" target=\"helpwindow\">".$lang["admin_email"]."</A>: </TD><TD><INPUT type=\"input\" name=\"email_admin\" value=\"".$row["email_admin"]."\" size=\"30\"></TD></TR>\n".
            "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#reply\" target=\"helpwindow\">".$lang["email_reply"]."</A>:</TD><TD><INPUT type=\"input\" name=\"reply_to\" value=\"".$row["reply_to"]."\" size=\"30\"></TD></TR>\n".
            "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#from\" target=\"helpwindow\">".$lang["email_from"]."</A>:</TD><TD><INPUT type=\"input\" name=\"from\" value=\"".$row["email_from"]."\" size=\"30\"></TD></TR>\n";

//get mailing list
$q = db_query( "SELECT DISTINCT * FROM maillist" );

for( $i=0 ; $row_mail = @db_fetch_array($q, $i ) ; $i++) {
$maillist .= $row_mail["email"]."\n";
}

$content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help_admin.php#list\" target=\"helpwindow\">".$lang["mailing_list"]."</A>: </TD><TD><TEXTAREA name=\"email\" rows=\"5\" cols=\"30\">".$maillist."</TEXTAREA><BR><BR></TD> </TR>\n";

$content .= "<TR><TD nowrap colspan=\"2\"><B>".$lang["default_checkbox"]."</B></TD></TR>\n".
            "<TR><TD colspan=\"2\">&nbsp;</TD></TR>";

//defaults for task checkboxes
$content .= "<TR><TD>".$lang["allow_globalaccess"]."</TD><TD><INPUT type=\"checkbox\" name=\"access\" ".$row["globalaccess"]."></TD></TR>\n".
            "<TR><TD>".$lang["set_email_owner"]."</TD><TD><INPUT type=\"checkbox\" name=\"owner\" " .$row["owner"]."></TD></TR>\n".
            "<TR><TD>".$lang["set_email_group"]."</TD><TD><INPUT type=\"checkbox\" name=\"usergroup\"  ".$row["usergroup"]."></TD></TR>\n".
            "<TR><TD colspan=\"2\">&nbsp;</TD></TR>".
	    "</TABLE>\n";


$content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["update"]."\"> ";
$content .= "<INPUT TYPE=\"reset\">";
$content .= "</FORM>\n";
$content .= "<BR><BR>\n";

new_box( $lang["configuration"], $content );

?>
