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

  This builds up the main entrance.

*/

require_once('path.php');
require_once(BASE.'includes/security.php' );
include_once(BASE.'includes/screen.php' );

//start of page
create_top();

  include(BASE.'includes/mainmenu.php' );
  include(BASE.'forum/forum_menubox.php' );
  include(BASE.'forum/forum_searchbox.php' );
  if(! GUEST){
    include(BASE.'tasks/task_menubox.php' );
  }
  include(BASE.'users/user_menubox.php' );

  if(ADMIN ) {
    include(BASE.'taskgroups/taskgroup_menubox.php' );
    include(BASE.'usergroups/usergroup_menubox.php' );
    include(BASE.'admin/admin_config_menubox.php' );
    $taskid = -1;
    include(BASE.'files/file_menubox.php' );
  }
  else {
    include(BASE.'usergroups/usergroup_menubox.php' );
  }
  include(BASE.'contacts/contact_menubox.php' );

//flip over to other frame
goto_main();
  include(BASE.'tasks/task_project_list.php' );

//finish page
create_bottom();

?>
