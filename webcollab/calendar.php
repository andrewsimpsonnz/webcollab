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

  Calendar task handler

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
  error('Calendar action handler', 'No request given' );
}

//what do you want to do today =]
switch($action ) {

  case 'show':
    create_top( $lang['calendar'], 3, 'calendar-show' );
    include(BASE.'calendar/calendar_show.php' );
    create_bottom();
    break;

  case 'date':
    create_top( $lang['calendar'], 3, 'calendar-date', 2 );
    include(BASE.'calendar/calendar_date.php' );
    create_bottom();
    break;

  //error case
  default:
    error('Calendar action handler', 'Invalid request given' );
    break;
}

?>
