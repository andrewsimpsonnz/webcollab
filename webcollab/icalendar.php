<?php
/*
  $Id$

  (c) 2004 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  iCalendar task handler

*/

require_once('path.php');
require_once(BASE.'includes/security.php' );


//
// The action handler
//
if( ! isset($_REQUEST['action']) ){
  error('iCalendar action handler', 'No request given' );
}

//what do you want to do today =]
switch($_REQUEST['action'] ) {

  case 'todo':
    include(BASE.'icalendar/icalendar_todo.php' );
    break;

  case 'project':
    include(BASE.'icalendar/icalendar_project.php' );
    break;

  case 'all':
    include(BASE.'icalendar/icalendar_all.php' );
    break;

  //Error case
  default:
    error('Calendar action handler', 'Invalid request given' );
    break;
}

?>