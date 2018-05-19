<?php
/*
  $Id: user_existing_menubox.php 2303 2009-08-25 09:17:44Z andrewsimpson $

  (c) 2002 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  The menu box that contains the user list

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

$content = "<ul class=\"menu\">\n";

//query users
$q = db_query('SELECT id, fullname, private FROM '.PRE.'users WHERE deleted=\'f\' ORDER by fullname' );

//show them
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($row['private'] && ($row['id'] != UID ) && ( ! ADMIN ) && (! isset($allowed[($row['id'])] ) ) ){
    continue;
  }

  $content .= "<li><small><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['id']."\">".wordwrap($row['fullname'], 30,  "<br />", 1 )."</a></small></li>\n";
}
$content .= "</ul>";

//check for enough users
if($i == 0 ) {
  $content = "<small>".$lang['no_users']."</small>";
  new_box($lang['users'], $content );
}
else {
  //show it
  new_box($lang['existing_users'], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );
}

?>
