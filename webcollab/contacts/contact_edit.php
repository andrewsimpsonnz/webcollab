<?php
/*
  $Id$
  
  (c) 2002 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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

  Edit the contacts database.

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

if(GUEST ) {
  error('Contact edit', 'Guest not authorised' );
}

//we need a valid contactid
if(! @safe_integer($_POST['contactid']) ){
  error('Contact edit', 'Not a valid value for contactid');
}

$contactid = $_POST['contactid'];

//get contact information
if( ! ($row = db_fetch_array( db_query( 'SELECT * FROM '.PRE.'contacts WHERE id='.$contactid ), 0 ) ) ){
  error('Contact edit', 'There is no information for that contact');
}

//check usergroups
if($row['taskid'] ) {
  require_once(BASE.'includes/usergroup_security.php' );
  usergroup_check($row['taskid']);
}

$content =
    "<form method=\"post\" action=\"contacts.php\">\n".
      "<fieldset><input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
      "<input type=\"hidden\" name=\"contactid\" value=\"$contactid\" />\n".
      "<input type=\"hidden\" name=\"x\" value=\"".$x."\" /></fieldset>\n".
      "<table class=\"celldata\">\n".
        "<tr><td><i>".$lang['firstname']."</i></td><td><input type=\"text\" name=\"firstname\" value=\"".html_escape($row['firstname'])."\"size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['lastname']."</i></td><td><input type=\"text\" name=\"lastname\" value=\"".html_escape($row['lastname'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['company']."</i></td><td><input type=\"text\" name=\"company\" value=\"".html_escape($row['company'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['home_phone']."</i></td><td><input type=\"text\" name=\"tel_home\" value=\"".html_escape($row['tel_home'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['mobile']."</i></td><td><input type=\"text\" name=\"gsm\" value=\"".html_escape($row['gsm'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['fax']."</i></td><td><input type=\"text\" name=\"fax\" value=\"".html_escape($row['fax'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['bus_phone']."</i></td><td><input type=\"text\" name=\"tel_business\" value=\"".html_escape($row['tel_business'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['address']."</i></td><td><input type=\"text\" name=\"address\" value=\"".html_escape($row['address'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['postal']."</i></td><td><input type=\"text\" name=\"postal\" value=\"".html_escape($row['postal'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['city']."</i></td><td><input type=\"text\" name=\"city\" value=\"".html_escape($row['city'])."\" size=\"30\" /></td></tr>\n".
        "<tr><td><i>".$lang['email']."</i></td><td><input type=\"text\" name=\"email\" value=\"".html_escape($row['email'])."\" size=\"30\" /></td></tr>\n".
    "</table>\n".
    "<p><i>".$lang['notes']."</i><br /><textarea  name=\"notes\" rows=\"6\" cols=\"50\">".$row['notes']."</textarea></p>\n";

//edit options
$content .=
      "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" /></p>".
      "</form>";

//delete options
$content .=
      "<form method=\"post\" action=\"contacts.php\">\n".
      "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
      "<input type=\"hidden\" name=\"action\" value=\"submit_delete\" />\n".
      "<input type=\"hidden\" name=\"contactid\" value=\"".$contactid."\" /></fieldset>\n".
      "<p><input type=\"submit\" value=\"".$lang['del_contact']."\" onclick=\"return confirm('".$lang['confirm_del_javascript']."')\" />\n".
      "</p></form>";

new_box( $lang['contact_info'], $content );

?>