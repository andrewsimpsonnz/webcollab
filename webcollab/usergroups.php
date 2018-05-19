<?php
/*
  $Id: usergroups.php 2384 2010-05-15 23:50:26Z andrewsimpson $

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

  Handles the calls to usergroup related functions

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
  error('Usergroup action handler', 'No action given');
}

//what do you want to usergroup today =]
switch($action ) {

  //gives a window and some options to do to the poor 'old usergroup
  case 'manage':
    create_top($lang['manage_usergroups'], 0, 'usergroups-manage');
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'usergroups/usergroup_menubox.php' );
    include(BASE.'users/user_menubox.php' );
    goto_main();
    include(BASE.'usergroups/usergroup_manage.php' );
    create_bottom();
    break;

  //add a usergroup
  case 'add':
    create_top($lang['add_new_usergroup'], 0, 'usergroups-add', 2 );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'usergroups/usergroup_menubox.php' );
    goto_main();
    include(BASE.'usergroups/usergroup_add.php' );
    create_bottom();
    break;

  //edit a usergroup
  case 'edit':
    create_top($lang['edit_usergroup'], 0, 'usergroups-edit' );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'usergroups/usergroup_menubox.php' );
    goto_main();
    include(BASE.'usergroups/usergroup_edit.php' );
    create_bottom();
    break;

  //submit
  case 'submit_edit':
  case 'submit_insert':
  case 'submit_del':
    include(BASE.'usergroups/usergroup_submit.php' );
    break;

  //error case
  default:
    error('Usergroup action handler', 'Invalid request given');
    break;
}

?>