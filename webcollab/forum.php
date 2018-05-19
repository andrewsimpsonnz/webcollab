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

  All functions and code needed to manage and show forum posts

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
  error('Forum action handler', 'No request given');
}

//what do you want to forum today =]
switch($action ) {

  //list forum posts
  case 'list':
    include(BASE.'forum/forum_list.php' );
    break;

  //add a forum post/reply
  case 'add':
    create_top($lang['add_reply'], 0, 'forum-add', 1 );
    include(BASE.'includes/mainmenu.php');
    goto_main();
    include(BASE.'forum/forum_add.php');
    create_bottom();
    break;

  //edit a forum post/reply
  case 'edit':
    create_top($lang['add_reply'], 0, 'forum-edit', 1 );
    include(BASE.'includes/mainmenu.php');
    goto_main();
    include(BASE.'forum/forum_edit.php');
    create_bottom();
    break;

  //delete a forum post/reply
  case 'delete':
    create_top($lang['add_reply'], 0, 'forum-delete' );
    include(BASE.'includes/mainmenu.php');
    goto_main();
    include(BASE.'forum/forum_edit.php');
    create_bottom();
    break;

  //submit add
  case 'submit_add':
    include(BASE.'forum/forum_submit_add.php');
    break;

  //submit edit
  case 'submit_edit':
    include(BASE.'forum/forum_submit_edit.php');
    break;

  //submit delete
  case 'submit_del':
    include(BASE.'forum/forum_submit_delete.php');
    break;

  //search
  case 'search':
    create_top($lang['info'], 0, 'forum-search-results' );
    include(BASE.'includes/mainmenu.php');
    include(BASE.'forum/forum_menubox.php');
    goto_main();
    include(BASE.'forum/forum_search.php');
    create_bottom();
    break;

  //display search box
  case 'search_box':
    create_top($lang['info'], 0, 'forum-search', 2 );
    include(BASE.'includes/mainmenu.php');
    include(BASE.'forum/forum_menubox.php');
    goto_main();
    include(BASE.'forum/forum_searchbox.php');
    create_bottom();
    break;

  //error case
  default:
    error('Forum action handler', 'Invalid request given' );
    break;
}

?>