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

  All functions and code needed to manage and show tasks

*/

require_once("includes/security.php" );
include_once("includes/screen.php" );

//
// The action handler
//
if( ! isset($_REQUEST["action"]) )
  error("Task action handler", "No action given");


  //what do you want to task today =]
  switch($_REQUEST["action"] ) {

    //create a box with the tasks from the current one
    //case "list":
    //  include("tasks/task_list.php" );
    //  break;

    //show a task
    case "show":
      create_top($lang["task_info"]);
      include("includes/mainmenu.php" );
      include("tasks/task_navigate.php" );
      include("tasks/task_menubox.php" );
      if( $admin == 1 ) {
        include("taskgroups/taskgroup_menubox.php" );
        include("usergroups/usergroup_menubox.php" );
        include("admin/admin_config_menubox.php" );
      }
      include("files/file_menubox.php" );
      goto_main();
      include("tasks/task_show.php" );
      $parentid = $_GET["taskid"];
      include("tasks/task_list.php" );
      include("forum/forum_list.php" );
      include("files/file_list.php" );
      create_bottom();
      break;

    //add a task
    case "add":
      create_top($lang["add_task"], 0, "name" );
      include("includes/mainmenu.php" );
      include("tasks/task_navigate.php" );
      include("tasks/task_menubox.php" );
      goto_main();
      include("tasks/task_add.php" );
      create_bottom();
      break;

    //delete a task
    case "delete":
      include("tasks/task_delete.php" );
      break;

    //edit a task
    case "edit":
      create_top($lang["edit_task"] );
      include("includes/mainmenu.php" );
      include("tasks/task_navigate.php" );
      include("tasks/task_menubox.php" );
      goto_main();
      include("tasks/task_edit.php" );
      create_bottom();
      break;

    //show a summary page
    case "summary":
      create_top($lang["summary_list"] );
      include("includes/mainmenu.php" );
      include("tasks/task_menubox.php" );
      goto_main();
      include("tasks/task_summary_list.php" );
      create_bottom();
      break;

    //Error case
    default:
      error("Task action handler", "Invalid request");
      break;
  }

?>
