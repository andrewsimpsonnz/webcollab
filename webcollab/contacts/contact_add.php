<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz> 

  WebCollab
  ---------------------------------------
  
  Based on file originally part of CoreAPM by Dennis Fleurbaaij 2001/2002
  
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

if(GUEST ) {
  error('Contact add', 'Guest not authorised' );
}

$taskid = ( @safe_integer($_GET['taskid']) ) ? $_GET['taskid'] : 0 ;

$content =
        "<form method=\"post\" action=\"contacts.php\">\n".
          "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
          "<input type=\"hidden\" name=\"action\" value=\"submit_add\" />\n".
          "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" /></fieldset>\n".
          "<table class=\"celldata\">\n".
            "<tr><td><i>".$lang['firstname']."</i></td><td><input id=\"firstname\" type=\"text\" name=\"firstname\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['lastname']."</i></td><td><input type=\"text\" name=\"lastname\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['company']."</i></td><td><input type=\"text\" name=\"company\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['home_phone']."</i></td><td><input type=\"text\" name=\"tel_home\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['mobile']."</i></td><td><input type=\"text\" name=\"gsm\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['bus_phone']."</i></td><td><input type=\"text\" name=\"tel_business\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['fax']."</i></td><td><input type=\"text\" name=\"fax\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['address']."</i></td><td><input type=\"text\" name=\"address\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['postal']."</i></td><td><input type=\"text\" name=\"postal\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['city']."</i></td><td><input type=\"text\" name=\"city\" size=\"30\" /></td></tr>\n".
            "<tr><td><i>".$lang['email']."</i></td><td><input type=\"text\" name=\"email\" size=\"30\" /></td></tr>\n".
          "</table>\n".
          "<p><i>".$lang['notes']."</i><br /><textarea name=\"notes\" rows=\"6\" cols=\"50\"></textarea></p>\n".
          "<p><input type=\"submit\" value=\"".$lang['add_contact']."\" /></p>\n".
          "</form>\n";

new_box( $lang['contact_info'], $content );

new_box($lang['info'], $lang['contact_add_info'] );

?>
