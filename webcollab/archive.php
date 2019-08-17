<?php
/*
  $Id$

  (c) 2004 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Handles all calls to archive related functions

*/

require_once('path.php');
require_once(BASE.'includes/security.php' );
include_once(BASE.'includes/screen.php' );

//
// The action handler
//
if(isset($_POST['action'] ) ) {
  $action = $_POST['action'];
}
elseif(isset($_GET['action'] ) ) {
  $action = $_GET['action'];
}
else {
  error('Archive action handler', 'No request given' );
}

//what do you want to archive today =]
switch($action ) {

  //edit a task for archive
  case 'archive':
    create_top($lang['edit_task'], 0, 'task-edit', 1 );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'tasks/task_navigate.php' );
    goto_main();
    include(BASE.'tasks/task_edit.php' );
    create_bottom();
    break;

  //list archived projects
  case 'list':
    create_top($lang['projects'], 0, 'archive-list' );
    include(BASE.'includes/mainmenu.php' );
    if(! GUEST ){
      include(BASE.'tasks/task_menubox.php' );
    }
    include(BASE.'users/user_menubox.php' );
    goto_main();
    include(BASE.'archive/archive_list.php' );
    create_bottom();
    break;

  //printable archive info
  case 'archive_print':
    create_top($lang['projects'], 2 );
    include(BASE.'archive/archive_list.php' );
    create_bottom();
    break;

  //archive project
  case 'submit_archive':
    include(BASE.'archive/archive_submit.php' );
    break;

  //restore archived project
  case 'submit_restore':
    include(BASE.'archive/archive_submit.php' );
    break;

  //Error case
  default:
    error('Archive action handler', 'Invalid request given') ;
    break;
}

?>
