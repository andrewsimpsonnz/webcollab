<?php
/*
  $Id$

  (c) 2002 - 2014 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Handles the calls to taskgroup related functions

*/

require_once('path.php');
require_once(BASE.'includes/security.php' );
include_once(BASE.'includes/screen.php' );

if(! ADMIN ){
  error('Taskgroup action handler', 'This area for admins only' );
}

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
 error('Taskgroup action handler', 'No request given');
}

//what do you want to taskgroup today =]
switch($action ) {

  //gives a window and some options to do to the poor 'old taskgroup
  case 'manage':
    create_top($lang['manage_taskgroups'], 0, 'taskgroups-manage' );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'taskgroups/taskgroup_menubox.php' );
    goto_main();
    include(BASE.'taskgroups/taskgroup_manage.php' );
    create_bottom();
    break;

  //show a taskgroup
  case 'add':
    create_top($lang['add_taskgroup'], 0, 'taskgroups-add', 2 );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'taskgroups/taskgroup_menubox.php' );
    goto_main();
    include(BASE.'taskgroups/taskgroup_add.php' );
    create_bottom();
    break;

  //show a taskgroup
  case 'edit':
    create_top($lang['edit_taskgroup'], 0, 'taskgroups-edit' );
    include(BASE.'includes/mainmenu.php');
    include(BASE.'taskgroups/taskgroup_menubox.php' );
    goto_main();
    include(BASE.'taskgroups/taskgroup_edit.php' );
    create_bottom();
    break;

  //submit
  case 'submit_edit':
  case 'submit_insert':
  case 'submit_del':
  include(BASE.'taskgroups/taskgroup_submit.php' );
  break;

  //error case
  default:
    error('Taskgroup action handler', 'Invalid request given');
    break;
}

?>