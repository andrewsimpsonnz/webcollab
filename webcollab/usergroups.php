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

  Handles the calls to usergroup related functions

*/

require_once("includes/security.php" );
include_once("includes/screen.php" );


//
// The action handler
//
if( ! valid_string($_GET["action"]) ) 
  error("Usergroup action handler", "No action given");

  //what do you want to usergroup today =]
  switch( $_GET["action"] ) {

    //gives a window and some options to do to the poor 'old usergroup
    case "manage":
      create_top($lang["manage_usergroups"]);
      include("includes/mainmenu.php" );
      include("usergroups/usergroup_menubox.php" );
      include("users/user_menubox.php" );
      goto_main();
      include("usergroups/usergroup_manage.php" );
      include_once("lang/lang_long.php" );
      $content = $usergroup_info;
      new_box($lang["info_usergroup_manage"], $content );
      create_bottom();
      break;

    //add a usergroup
    case "add":
      create_top($lang["add_new_usergroup"], 0, "name" );
      include("includes/mainmenu.php" );
      include("usergroups/usergroup_menubox.php" );
      goto_main();
      include("usergroups/usergroup_add.php" );
      create_bottom();
      break;

    //edit a usergroup
    case "edit":
      create_top($lang["edit_usergroup"] );
      include("includes/mainmenu.php" );
      include("usergroups/usergroup_menubox.php" );
      goto_main();
      include("usergroups/usergroup_edit.php" );
      create_bottom();
      break;


    //Error case
    default:
      error("Usergroup action handler", "Invalid request given");
      break;
  }

?>
