<?php
/*
  $Id$

  (c) 2003 - 2014 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Admin config

*/

require_once('path.php');
require_once(BASE.'includes/security.php' );
include_once(BASE.'includes/screen.php' );

if(! ADMIN ){
  warning('Admin action handler', 'This area for admins only' );
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
  error('Admin action handler', 'No request given' );
}

switch ($action ) {

  case 'admin':
    create_top($lang['admin_config'], 0, 'admin-config', 2 );
    include(BASE.'includes/mainmenu.php' );
    goto_main();
    include(BASE.'admin/admin_config_edit.php' );
    create_bottom();
    break;

  case 'submit':
    include(BASE.'admin/admin_config_submit.php' );
    break;

  //error case
  default:
    error('Admin action handler', 'Invalid request given') ;
    break;

}

?>
