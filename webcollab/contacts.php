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

  Handles all calls to contact related functions

*/

include_once( "includes/security.php" );
include_once( "includes/screen.php" );


//
// The action handler
//
if( valid_string( $_REQUEST["action"] ) ) {

  //what do you want to contact today =]
  switch( $_REQUEST["action"] ) {

    //gives a window and some options to do to the poor 'old contact manager
    case "add":
      create_top($lang["add_contact"], 0, "firstname" );
      include( "includes/mainmenu.php");
      include( "contacts/contact_menubox.php" );
      goto_main();
      include( "contacts/contact_add.php" );
      new_box( $lang["info"], "<BR>".$lang["contact_add_info"]."<BR><BR>" );
      create_bottom();
      break;


    //gives a window and some options to do to the poor 'old contact manager
    case "show":
      create_top($lang["show_contact"]);
      include( "includes/mainmenu.php");
      include( "contacts/contact_menubox.php" );
      goto_main();
      include( "contacts/contact_show.php" );
      create_bottom();
      break;

 case "edit":
      create_top($lang["edit_contact"]);
      include( "includes/mainmenu.php");
      include( "contacts/contact_menubox.php" );
      goto_main();
      include( "contacts/contact_edit.php" );
      create_bottom();
      break;


    //Error case
    default:
      error("Contacts action handler", "Invalid request given");
      break;
  }
}
else
  error("Contacts action handler", "No request given");

?>
