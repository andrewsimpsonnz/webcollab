<?php
/*
  $Id$

  (c) 2002 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com> 

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

  Add a contact to the contact's lists

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

require_once(BASE.'includes/token.php' );

if(GUEST ) {
  error('Contact add', 'Guest not authorised' );
}

$taskid = ( @safe_integer($_GET['taskid']) ) ? $_GET['taskid'] : 0 ;


//generate_token
generate_token('contact' );

$content = "<form method=\"post\" action=\"contacts.php\" onsubmit=\"return fieldCheck('lastname', 'firstname' )\">\n".
           "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
           "<input type=\"hidden\" name=\"action\" value=\"submit_add\" />\n".
           "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" />\n".
           "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
           "<input type=\"hidden\" id=\"alert_field\" name=\"alert\" value=\"".$lang['missing_field_javascript']."\" />\n".
           "<input type=\"hidden\" id=\"url\" name=\"url\" value=\"".$lang['url_javascript']."\" />\n".
           "<input type=\"hidden\" id=\"image_url\" name=\"image_url\" value=\"".$lang['image_url_javascript']."\" /></fieldset>\n".
           "<table class=\"celldata\">\n".
           "<tr><td><i>".$lang['firstname']."</i></td><td><input id=\"firstname\" type=\"text\" name=\"firstname\" class=\"size\" /><script type=\"text/javascript\">document.getElementById('firstname').focus();</script></td></tr>\n".
           "<tr><td><i>".$lang['lastname']."</i></td><td><input id=\"lastname\" type=\"text\" name=\"lastname\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['company']."</i></td><td><input type=\"text\" name=\"company\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['home_phone']."</i></td><td><input type=\"text\" name=\"tel_home\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['mobile']."</i></td><td><input type=\"text\" name=\"gsm\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['bus_phone']."</i></td><td><input type=\"text\" name=\"tel_business\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['fax']."</i></td><td><input type=\"text\" name=\"fax\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['address']."</i></td><td><input type=\"text\" name=\"address\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['postal']."</i></td><td><input type=\"text\" name=\"postal\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['city']."</i></td><td><input type=\"text\" name=\"city\" class=\"size\" /></td></tr>\n".
           "<tr><td><i>".$lang['email_contact']."</i></td><td><input type=\"text\" name=\"email\" class=\"size\" /></td></tr>\n".
           "</table>\n".
           "<p><i>".$lang['notes']."</i><br />\n".
           "<script type=\"text/javascript\"> edToolbar('notes');</script>".
           "<textarea name=\"notes\" id=\"notes\" rows=\"6\" cols=\"50\"></textarea></p>\n".
           "<p><input type=\"submit\" value=\"".$lang['add_contact']."\"/></p>\n".
           "</form>\n";

new_box( $lang['contact_info'], $content );

new_box($lang['info'], $lang['contact_add_info'] );

?>
