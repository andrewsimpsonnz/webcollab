<?php
/*
  $Id$

  (c) 2004 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Archives or restores projects in the database

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

if(! @safe_integer($_GET['taskid']) ) {
  error('Archive submit', 'Not a valid taskid' );
}

$taskid = $_GET['taskid'];

//check if the user has enough rights
if( ( ! ADMIN ) && (db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id='.$taskid.' AND owner='.UID ), 0, 0 ) < 1) ){
  warning($lang['task_submit'], $lang['not_owner'] );
}

$projectid = db_result(db_query('SELECT projectid FROM '.PRE.'tasks WHERE id='.$taskid ), 0, 0 );

switch($_REQUEST['action'] ) {

  case 'submit_archive':
    //do the archiving
    db_query('UPDATE '.PRE.'tasks SET archive=1 WHERE projectid='.$projectid );

    header('Location: '.BASE_URL.'main.php?x='.$x );
    die;
    break;

  case 'submit_restore':
    //do the restore
    db_query('UPDATE '.PRE.'tasks SET archive=0 WHERE projectid='.$projectid );

    header('Location: '.BASE_URL.'archive.php?x='.$x.'&action=list' );
    die;
    break;

    default:
      error('Archive submit', 'Invalid request given');
    break;
}

?>