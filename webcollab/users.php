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

  Easy user manager

*/

require_once( "includes/security.php" );
include_once( "includes/screen.php" );
include_once( "includes/time.php" );


//
// code to handle an action state
//
if( ! isset($_REQUEST['action']) )
  error("Users action handler", "No request given" );

  switch($_REQUEST['action'] ) {

    //give the user-manager screen
    case "manage":
      create_top($lang['manage_users'] );
      include("includes/mainmenu.php" );
      include("users/user_menubox.php" );
      include("users/user_existing_menubox.php" );
      include("users/user_deleted_menubox.php" );
      include("usergroups/usergroup_menubox.php" );

      goto_main();
      include("users/user_info.php" );
      create_bottom();
      break;

    //Add a user
    case "add":
      create_top($lang['add_user'], 0, "name" );
      include("includes/mainmenu.php" );
      include("users/user_menubox.php" );
      goto_main();
      include("users/user_add.php" );
      create_bottom();
      break;

    //Edit a user
    case "edit":
      create_top($lang['edit_user'] );
      include("includes/mainmenu.php" );
      include("users/user_menubox.php" );
      goto_main();
      include("users/user_edit.php" );
      create_bottom();
      break;

    //show user's personal details
    case "show":
      create_top($lang['user_info'] );
      include("includes/mainmenu.php" );
      include("users/user_menubox.php" );
      include("users/user_existing_menubox.php" );
      goto_main();
      include("users/user_show.php" );
      create_bottom();
      break;

    //who is online ?
    case "showonline":
      create_top($lang['users_online'] );
      include("includes/mainmenu.php" );
      include("users/user_menubox.php" );
      include("users/user_existing_menubox.php" );
      goto_main();
      include("users/user_online.php" );
      create_bottom();
      break;

    //admin email
    case "email":
      create_top($lang['email'] );
      include("includes/mainmenu.php" );
      goto_main();
      include("users/user_mail.php" );
      create_bottom();
      break;

    //submit email to submission engine
    case "submit_email":
      include("users/user_mail_send.php" );
      break;
                  
    //submit insert/update to submission engine
    case "submit_insert":
    case "submit_edit":
    case "revive":
      include("users/user_submit.php" );
      break;
    
    //delete to submission engine
    case "del":
    case "permdel":    
      include("users/user_del.php" );
      break;
         
    //Error case
    default:
      error("Users action handler", "Invalid request given" );
      break;
  }

?>