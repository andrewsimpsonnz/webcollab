<?php
/*
  $Id$
  
  (c) 2002 -2004 Andrew Simpson <andrew.simpson at paradise.net.nz> 
  
  WebCollab
  ---------------------------------------
  Based on original file for CoreAPM by Dennis Fleurbaaij 2001/2002

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

  Handles the calls to taskgroup related functions

  A taskgroup is a group in which a task sits. This is done
  to enhance readablility.

*/

require_once("includes/security.php" );
include_once("includes/screen.php" );

//
// The action handler
//
if( ! isset($_REQUEST['action']) )
 error("Taskgroup action handler", "No request given");

  //what do you want to taskgroup today =]
  switch( $_REQUEST['action'] ) {

    //gives a window and some options to do to the poor 'old taskgroup
    case "manage":
      create_top($lang['manage_taskgroups']);
      include("includes/mainmenu.php" );
      include("taskgroups/taskgroup_menubox.php" );
      goto_main();
      include("taskgroups/taskgroup_manage.php" );
      include_once("lang/lang_long.php" ); //get message
      new_box( $lang['info_taskgroup_manage'], $taskgroup_info );
      create_bottom();
      break;

    //show a taskgroup
    case "add":
      create_top($lang['add_taskgroup'], 0, "name", "name" );
      include("includes/mainmenu.php" );
      include("taskgroups/taskgroup_menubox.php" );
      goto_main();
      include("taskgroups/taskgroup_add.php" );
      create_bottom();
      break;

    //show a taskgroup
    case "edit":
      create_top($lang['edit_taskgroup']);
      include("includes/mainmenu.php");
      include("taskgroups/taskgroup_menubox.php" );
      goto_main();
      include("taskgroups/taskgroup_edit.php" );
      create_bottom();
      break;

    //submit
    case "submit_edit":
    case "submit_insert":
    case "submit_del":
    include("taskgroups/taskgroup_submit.php" );
    break;
         
    //Error case
    default:
      error("Taskgroup action handler", "Invalid request given");
      break;
  }

?>