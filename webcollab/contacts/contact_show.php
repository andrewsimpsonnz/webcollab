<?php
/*
  $Id$

  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz> 

  WebCollab
  ---------------------------------------
  
  This file originally written as part of Core APM by Dennis Fleurbaaij 2001/2002.
  
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

  Show contacts.

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

//secure variables
$content = "";
$row = "";

//we need a valid contactid
if(empty($_GET['contactid']) || ! is_numeric($_GET['contactid']) )
  error("Contact submission", "Not a valid value for contactid");

$contactid = intval($_GET['contactid']);

//get contact information
if( ! ($row = db_fetch_array( db_query("SELECT * FROM ".PRE."contacts WHERE id=$contactid" ), 0 ) ) )
  error("Database value error", "There is no information for the user that you specified");


$content .=
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
    "<p><i>".$lang['notes']."</i><br />".nl2br(html_links($row['notes'] ) )."</p>\n";
    
if($GUEST == 0 ){    
  $content .=    
    "<form method=\"post\" action=\"contacts.php\" >\n".
      "<fieldset><input type=\"hidden\" name=\"action\" value=\"edit\" />\n".
      "<input type=\"hidden\" name=\"contactid\" value=\"".$row['id']."\" />\n".
      "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
      "<input type=\"submit\" value=\"".$lang['edit_contact']."\" /></fieldset>\n".
   "</form>";
  }

new_box($lang['contact_info'], $content );

?>