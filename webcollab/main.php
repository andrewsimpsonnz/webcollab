<?php
/*
  $Id$

  (c) 2002 - 2015 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//make active projects and condensed projects 'sticky' with a persistent cookie
if(isset($_GET['active_only'] ) || isset($_GET['condensed'] ) ) {
  if(isset($_GET['active_only'] ) ) {
    $cookie_array['active_only'] = ($_GET['active_only']) ? 1 : 0;
  }
  if(isset($_GET['condensed'] ) ) {
    $cookie_array['condensed'] = ($_GET['condensed']) ? 1 : 0;
  }

  //sort into an array and implode
  foreach($cookie_array as $key => $value ) {
    $cookie_array_value[] = $key.'='.$value;
  }
  //key1=value1:key2=value2 , etc
  $cookie_value = implode(':', $cookie_array_value );
  setcookie('webcollab_sticky', $cookie_value, (time() + 86400*365*10 ) );
}

//start of page
create_top('', 0, 'project-list' );

  include(BASE.'includes/mainmenu.php' );
  include(BASE.'forum/forum_menubox.php' );
  if(! GUEST){
    include(BASE.'tasks/task_menubox.php' );
  }
  include(BASE.'users/user_menubox.php' );

  if(ADMIN ) {
    include(BASE.'taskgroups/taskgroup_menubox.php' );
    include(BASE.'usergroups/usergroup_menubox.php' );
    include(BASE.'admin/admin_config_menubox.php' );
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
