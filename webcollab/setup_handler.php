<?php
/*
  $Id$

  (c) 2004 - 2014 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  All functions and code needed to manage files

*/

require_once('path.php');
require_once(BASE.'setup/security_setup.php' );

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
  error('Setup action handler', 'No request given' );
}

//what do you want to task today =]
switch($action ) {

case 'setup1':
    include(BASE.'setup/setup_setup1.php' );
    break;

case 'setup2':
    include(BASE.'setup/setup_setup2.php' );
    break;

  case 'setup3':
    include(BASE.'setup/setup_setup3.php' );
    break;

  case 'setup4':
    include(BASE.'setup/setup_setup4.php' );
    break;

  case 'setup5':
    include(BASE.'setup/setup_setup5.php' );
    break;

  case 'setup6':
    include(BASE.'setup/setup_setup6.php' );
    break;

  case 'setup7':
    include(BASE.'setup/setup_setup7.php' );
    break;

  case 'build':
    include(BASE.'setup/setup_db_build.php' );
    break;

  //error case
  default:
    error('File action handler', 'Invalid request given' );
    break;
}

?>