<?php
/*
  $Id$

  (c) 2002 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Function
  --------

  Log out

*/

require_once('path.php' );
require_once(BASE.'includes/security.php' );

//log the user out by nulling their session key to an illegal key
//record preserved to allow time of last login to be recorded
db_query('UPDATE '.PRE.'logins SET session_key=\'XXXX\' WHERE user_id='.UID );
clear_cookie();

header('Location: '.BASE_URL.'index.php' );

?>
