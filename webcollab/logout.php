<?php
/*
  $Id: logout.php 2276 2009-08-21 20:18:23Z andrewsimpson $

  (c) 2002 - 2013 Andrew Simpson <andrewnz.simpson at gmail.com>

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
$q = db_prepare('UPDATE '.PRE.'logins SET session_key=\'XXXX\' WHERE user_id=?' );
db_execute($q, array(UID ) );
$q = db_prepare('DELETE FROM '.PRE.'tokens WHERE userid=?' );
@db_execute($q, array(UID ) );


//clear session cookie
$url = parse_url(BASE_URL );
setcookie('webcollab_session', "", (time() - 60 * 60 * 24 * 5 ), $url['path'], $url['host'], false, true );
//cookie expires 5 days ago...

header('Location: '.BASE_URL.'index.php' );

?>
