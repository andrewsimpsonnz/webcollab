<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  This is a simple interface to a box, it is meant as a menubox.
  It will return all contacts and applicable options

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

$content = "";
$company = "";

//get all contacts
$q = db_query("SELECT id, firstname, lastname, company FROM contacts ORDER BY company, lastname" );

//show all contacts
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

  if( $row["company"] != "" ) {
     if ($row["company"] != $company ){
       $content .= $row["company"]."<br />";
     }
     $show = $row["lastname"].", ".strtoupper(substr( $row["firstname"], 0, 1 ) ).".";
     $content .= "<a href=\"contacts.php?x=$x&amp;action=show&amp;contactid=".$row["id"]."\">$show</a><br />";
     $company =  $row["company"];
   }
   else{
     $show = $row["lastname"].", ".strtoupper(substr( $row["firstname"], 0, 1 ) ).".";
     $content .= "<a href=\"contacts.php?x=$x&amp;action=show&amp;contactid=".$row["id"]."\">$show</a><br />";
   }
}


//the add button
$content .= "<br />\n<font class=\"textlink\">[<a href=\"contacts.php?x=$x&amp;action=add\">".$lang["add_contact"]."</a>]</font>\n";

//show the box
new_box($lang["contacts"], $content, "boxmenu" );

?>
