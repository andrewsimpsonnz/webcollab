<?php
/*
  $Id$
  
  (c) 2002 -2004 Andrew Simpson <andrew.simpson@paradise.net.nz> 

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

  Handles all calls to contact related functions

*/

require_once("includes/security.php" );
include_once("includes/screen.php" );

//
// The action handler
//
if( ! isset($_REQUEST["action"] ) )
  error("Contacts action handler", "No request given" );

  //what do you want to contact today =]
  switch($_REQUEST["action"] ) {

    //gives a window and some options to do to the poor 'old contact manager
    case "add":
      create_top($lang["add_contact"], 0, "firstname" );
      include("includes/mainmenu.php" );
      include("contacts/contact_menubox.php" );
      goto_main();
      include("contacts/contact_add.php" );
      new_box($lang["info"], $lang["contact_add_info"] );
      create_bottom();
      break;


    //gives a window and some options to do to the poor 'old contact manager
    case "show":
      create_top($lang["show_contact"]);
      include("includes/mainmenu.php" );
      include("contacts/contact_menubox.php" );
      goto_main();
      include("contacts/contact_show.php" );
      create_bottom();
      break;

    case "edit":
      create_top($lang["edit_contact"]);
      include("includes/mainmenu.php" );
      include("contacts/contact_menubox.php" );
      goto_main();
      include("contacts/contact_edit.php" );
      create_bottom();
      break;

    case "submit_add":
    case "submit_edit":
    case "submit_delete":
      include("contacts/contact_submit.php" );
      break;    

    //Error case
    default:
      error("Contacts action handler", "Invalid request given") ;
      break;
  }


?>