<?php
/*
  $Id$

  (c) 2002 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
if( ! isset($_REQUEST['action']) ) {
 error('Forum action handler', 'No request given');
}

//what do you want to forum today =]
switch($_REQUEST['action'] ) {

  //list forum posts
  case 'list':
    include(BASE.'forum/forum_list.php' );
    break;

  //add a forum post/reply
  case 'add':
    create_top($lang['add_reply'], 0, 'text', 'text' );
    include(BASE.'includes/mainmenu.php');
    goto_main();
    include(BASE.'forum/forum_add.php');
    create_bottom();
    break;

  //submit to poster engine
  case 'submit_del':
  case 'submit_add':
    include(BASE.'forum/forum_submit.php');
    break;

  //search
  case 'search':
    create_top($lang['info'] );
    include(BASE.'includes/mainmenu.php');
    include(BASE.'forum/forum_menubox.php');
    include(BASE.'forum/forum_searchbox.php');
    goto_main();
    include(BASE.'forum/forum_search.php');
    create_bottom();
    break;

  //Error case
  default:
    error('Forum action handler', 'Invalid request given' );
    break;
}

?>