<?php
/*
  $Id: user_online.php 2172 2009-04-06 07:30:53Z andrewsimpson $

  (c) 2002 - 2012 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Shows users online

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

$content = '';
$allowed = array();

//get list of common users in private usergroups that this user can view
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid,
                      '.PRE.'usergroups_users.userid AS userid
                      FROM '.PRE.'usergroups_users
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'usergroups_users.usergroupid)
                      WHERE '.PRE.'usergroups.private=1' );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
    $allowed[($row[1])] = $row[1];
  }
}

$content .= "<table class=\"celldata\">\n";
//users online in last hour
$q = db_query('SELECT '.PRE.'logins.lastaccess AS last,
            '.PRE.'users.id AS id,
            '.PRE.'users.fullname AS fullname,
            '.PRE.'users.private AS private
            FROM '.PRE.'logins
            LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'logins.user_id)
            WHERE '.PRE.'logins.lastaccess > ( now()-INTERVAL '.db_delim('1 HOUR' ).')
            AND '.PRE.'users.deleted=\'f\'
            ORDER BY '.PRE.'logins.lastaccess DESC' );

$content .= "<tr class=\"grouplist\"><th style=\"white-space: nowrap; height: 20px; vertical-align: top\" colspan=\"2\">".$lang['online']."</th></tr>\n";
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($row['private'] && ($row['id'] != UID ) && (! ADMIN ) && (! isset($allowed[($row['id'])] ) ) ) {
    continue;
  }

  //show output
  $content .= "<tr class=\"grouplist\"><td><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['id']."\">".$row['fullname']."</a></td><td>".nicetime($row['last'], 1 )."</td></tr>\n";
}

//users previously online
$q = db_query('SELECT '.PRE.'logins.lastaccess AS last,
            '.PRE.'users.id AS id,
            '.PRE.'users.fullname AS fullname,
            '.PRE.'users.private AS private
            FROM '.PRE.'logins
            LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'logins.user_id)
            WHERE '.PRE.'logins.lastaccess < ( now()-INTERVAL '.db_delim('1 HOUR' ).')
            AND '.PRE.'users.deleted=\'f\'
            ORDER BY '.PRE.'logins.lastaccess DESC' );

$content .= "<tr class=\"grouplist\"><th style=\"white-space: nowrap; height: 35px; vertical-align: center\" colspan=\"2\">".$lang['not_online']."</th></tr>\n";
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($row['private'] && ($row['id'] != UID ) && ( ! ADMIN ) && ( ! isset($allowed[($row['id'])] ) ) ){
    continue;
  }

  //show output
  $content .= "<tr class=\"grouplist\"><td><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['id']."\">".$row['fullname']."</a></td><td>".nicetime($row['last'], 1 )."</td></tr>\n";

}
$content .= "</table>\n";

new_box($lang['user_activity'], $content );

?>
