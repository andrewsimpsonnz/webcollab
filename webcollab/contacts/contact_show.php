<?php
/*
  $Id: contact_show.php 2160 2009-04-06 07:07:34Z andrewsimpson $

  (c) 2002 - 2009 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Show contacts

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//we need a valid contactid
if(! @safe_integer($_GET['contactid']) ){  
  error('Contact show', 'Not a valid value for contactid');
}
$contactid = $_GET['contactid'];

//get contact information
$q = db_prepare('SELECT * FROM '.PRE.'contacts WHERE id=? LIMIT 1' );
db_execute($q, array($contactid ) );

if( ! ($row = @db_fetch_array($q, 0 ) ) ){
  error('Contact show', 'There is no information for that contact');
}

if($row['taskid'] > 0 ) {
  require_once(BASE.'includes/usergroup_security.php' );
  usergroup_check($row['taskid']);
}

$content =
    "<table class=\"celldata\">\n".
    "<tr><td><i>".$lang['firstname']."</i></td><td>".$row['firstname']."</td></tr>\n".
    "<tr><td><i>".$lang['lastname']."</i></td><td>".$row['lastname']."</td></tr>\n".
    "<tr><td><i>".$lang['company']."</i></td><td>".$row['company']."</td></tr>\n".
    "<tr><td><i>".$lang['home_phone']."</i></td><td>".$row['tel_home']."</td></tr>\n".
    "<tr><td><i>".$lang['mobile']."</i></td><td>".$row['gsm']."</td></tr>\n".
    "<tr><td><i>".$lang['bus_phone']."</i></td><td>".$row['tel_business']."</td></tr>\n".
    "<tr><td><i>".$lang['fax']."</i></td><td>".$row['fax']."</td></tr>\n".
    "<tr><td><i>".$lang['address']."</i></td><td>".$row['address']."</td></tr>\n".
    "<tr><td><i>".$lang['postal']."</i></td><td>".$row['postal']."</td></tr>\n".
    "<tr><td><i>".$lang['city']."</i></td><td>".$row['city']."</td></tr>\n".
    "<tr><td><i>".$lang['email']."</i></td><td><a href=\"mailto:".$row['email']."\">".$row['email']."</a></td></tr>\n".
    "</table>\n".
    "<p><i>".$lang['notes']."</i><br />".nl2br(bbcode($row['notes'] ) )."</p>\n";

if(! GUEST ){
  $content .=
    "<form method=\"post\" action=\"contacts.php\" >\n".
    "<fieldset><input type=\"hidden\" name=\"action\" value=\"edit\" />\n".
    "<input type=\"hidden\" name=\"contactid\" value=\"".$row['id']."\" />\n".
    "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
    "<input type=\"submit\" value=\"".$lang['edit_contact']."\" /></fieldset>\n".
    "</form>";
  }

new_box($lang['contact_info'], $content );

?>