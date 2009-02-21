<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Handles user actions

*/

require_once('path.php');
require_once(BASE.'includes/security.php' );
include_once(BASE.'includes/screen.php' );
include_once(BASE.'includes/time.php' );

//
// action handler
//
if( ! isset($_REQUEST['action']) ){
  error('Users action handler', 'No request given' );
}

switch($_REQUEST['action'] ) {

  //show user's personal details
  case 'show':
    create_top($lang['user_info'] );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'users/user_menubox.php' );
    include(BASE.'users/user_existing_menubox.php' );
    goto_main();
    include(BASE.'users/user_show.php' );
    create_bottom();
    break;

  //who is online ?
  case 'showonline':
    create_top($lang['users_online'] );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'users/user_menubox.php' );
    include(BASE.'users/user_existing_menubox.php' );
    goto_main();
    include(BASE.'users/user_online.php' );
    create_bottom();
    break;

  //give the user-manager screen
  case 'manage':
    create_top($lang['manage_users'] );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'users/user_menubox.php' );
    include(BASE.'usergroups/usergroup_menubox.php' );
    goto_main();
    include(BASE.'users/user_existing_list.php' );
    if(ADMIN) {
      include(BASE.'users/user_deleted_list.php' );
      include(BASE.'users/user_info.php' );
    }
    create_bottom();
    break;

  //Add a user
  case 'add':
    create_top($lang['add_user'], 0, 1, 'name' );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'users/user_menubox.php' );
    goto_main();
    include(BASE.'users/user_add.php' );
    create_bottom();
    break;

  //Edit a user
  case 'edit':
    create_top($lang['edit_user'] );
    include(BASE.'includes/mainmenu.php' );
    include(BASE.'users/user_menubox.php' );
    goto_main();
    include(BASE.'users/user_edit.php' );
    create_bottom();
    break;

  //admin email
  case 'email':
    create_top($lang['email'] );
    include(BASE.'includes/mainmenu.php' );
    goto_main();
    include(BASE.'users/user_mail.php' );
    create_bottom();
    break;

  //submit email to submission engine
  case 'submit_email':
    include(BASE.'users/user_mail_send.php' );
    break;

  //submit insert/update to submission engine
  case 'submit_insert':
  case 'submit_edit':
  case 'revive':
    include(BASE.'users/user_submit.php' );
    break;

  //delete to submission engine
  case 'del':
  case 'permdel':
    include(BASE.'users/user_del.php' );
    break;

  //error case
  default:
    error('Users action handler', 'Invalid request given' );
    break;
}

?>