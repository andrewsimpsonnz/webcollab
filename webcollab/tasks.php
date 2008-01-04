<?php
/*
  $Id$

 (c) 2004 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  All functions and code needed to manage and show tasks

*/

require_once('path.php');
require_once(BASE.'includes/security.php' );
include_once(BASE.'includes/screen.php' );

//
// The action handler
//
if( ! isset($_REQUEST['action']) ){
  error('Task action handler', 'No action given');
}

//what do you want to task today =]
switch($_REQUEST['action'] ) {

  //show a task
  case 'show':

    //catch & redirect hack for invalid entry from ProjectJump
    if(isset($_REQUEST['taskid']) && ($_REQUEST['taskid'] == -1 ) ){
      header('Location: '.BASE_URL.'main.php?x='.$x );
      die;
    }

    create_top($lang['task_info']);
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'tasks/task_navigate.php' );
    if(! GUEST )
      include(BASE.'tasks/task_menubox.php' );
    if(ADMIN ) {
      include(BASE.'taskgroups/taskgroup_menubox.php' );
      include(BASE.'usergroups/usergroup_menubox.php' );
      include(BASE.'files/file_menubox.php' );
    }
    include(BASE.'contacts/contact_menubox.php' );
    goto_main();
    include(BASE.'tasks/task_show.php' );
    include(BASE.'tasks/task_list.php' );
    include(BASE.'forum/forum_list.php' );
    include(BASE.'files/file_list.php' );
    create_bottom();
    break;

  //add a task
  case 'add':
    create_top($lang['add_task'], 0, 'name', 'name', 1 );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'tasks/task_navigate.php' );
    include(BASE.'tasks/task_menubox.php' );
    goto_main();
    include(BASE.'tasks/task_add.php' );
    create_bottom();
    break;

  //delete a task
  case 'delete':
    include(BASE.'tasks/task_delete.php' );
    break;

  //edit a task
  case 'edit':
    create_top($lang['edit_task'], 0, 0, 'name', 1 );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'tasks/task_navigate.php' );
    include(BASE.'tasks/task_menubox.php' );
    goto_main();
    include(BASE.'tasks/task_edit.php' );
    create_bottom();
    break;

  //show a summary page
  case 'summary':
    create_top($lang['summary_list'] );
    include(BASE.'includes/mainmenu.php' );
    if(! GUEST ){
      include(BASE.'tasks/task_menubox.php' );
    }
    goto_main();
    include(BASE.'tasks/task_summary_list.php' );
    create_bottom();
    break;

  //todo list
  case 'todo':
    create_top($lang['todo_list'] );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'users/user_menubox.php' );
    include(BASE.'users/user_existing_menubox.php' );
    goto_main();
    include(BASE.'tasks/task_todo_list.php' );
    create_bottom();
    break;

  //clone
  case 'clone':
    create_top($lang['add_task'], 0, 'name', 'name' );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'tasks/task_navigate.php' );
    include(BASE.'tasks/task_menubox.php' );
    goto_main();
    include(BASE.'tasks/task_clone_add.php' );
    create_bottom();
    break;

  //insert new task
  case 'submit_insert':
    include(BASE.'tasks/task_submit_insert.php' );
    break;

  //update task
  case 'submit_update':
    include(BASE.'tasks/task_submit_update.php' );
    break;

  //misc. update items
  case 'meown':
  case 'deown':
  case 'done':
    include(BASE.'tasks/task_submit_owner.php' );
    break;

  //submit clone
  case 'submit_clone':
    include(BASE.'tasks/task_clone_submit.php' );
    break;

  //printable task info
  case 'show_print':
    create_top($lang['task_info'], 2 );
    include(BASE.'tasks/task_show.php' );
    include(BASE.'tasks/task_list.php' );
    include(BASE.'forum/forum_list.php' );
    include(BASE.'files/file_list.php' );
    create_bottom();
    break;

  //printable summary info
  case 'summary_print':
    create_top($lang['summary_list'], 2 );
    include(BASE.'tasks/task_summary_list.php' );
    create_bottom();
    break;

  //printable project info
  case 'project_print':
    create_top($lang['projects'], 2 );
    include(BASE.'tasks/task_project_list.php' );
    create_bottom();
    break;

  //Error case
  default:
    error('Task action handler', 'Invalid request');
    break;
}

?>