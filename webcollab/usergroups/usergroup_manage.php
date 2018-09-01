<?php
/*
  $Id: usergroup_manage.php 2296 2009-08-24 09:44:14Z andrewsimpson $

  (c) 2002 - 2017 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Manage usergroups

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//set variables
$content = '';
$allowed[0] = 0;
$content_flag = 0;

//prepare query to get users for a group
$users_q = db_prepare('SELECT '.PRE.'users.fullname AS fullname,
                              '.PRE.'users.id AS id,
                              '.PRE.'users.private AS private
                              FROM '.PRE.'users
                              LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                              WHERE usergroupid=?
                              AND '.PRE.'users.deleted=\'f\'
                              ORDER BY '.PRE.'users.fullname' );

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

//get the usergroup info
$q = db_query('SELECT * FROM '.PRE.'usergroups ORDER BY group_name' );

$content =  "<table class=\"celldata\">\n".
            "<tr><th>".$lang['name']."</th><th>".$lang['description']."</th><th></th><th></th></tr>\n";

//show all usergroups
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //check for private usergroups
  if(! ADMIN ) {
    if( ($row['private'] ) && (! isset($GID[($row['id'])] ) ) ) {
      continue;
    }
  }

  if(ADMIN) {
    $content .= "<tr><td colspan=\"4\" class=\"divline\"></td></tr>\n";
  }
  else {
    $content .= "<tr><td colspan=\"3\" class=\"divline\"></td><td></td></tr>\n";
  }

  if ($row['private'] ) {
    $content .= "<tr class=\"grouplist\"><td><b>".$row['group_name']."</b></td><td><i>".$row['group_description']."</i></td><td style=\"text-align: center\">".$lang['private_usergroup']."</td>\n";
  }
  else {
    $content .= "<tr class=\"grouplist\"><td><b>".$row['group_name']."</b></td><td><i>".$row['group_description']."</i></td><td></td>\n";
  }

  if(ADMIN) {
    $content .= "<td><span class=\"textlink\">".
                "<a href=\"usergroups.php?x=".X."&amp;action=edit&amp;usergroupid=".$row['id']."\">[".$lang['edit']."]</a></span></td>";
  }
  else {
    $content .= "<td></td>";
  }

  $content .= "</tr>\n";

  //ge users in this group
  db_execute($users_q, array($row['id'] ) );

  for($j=0 ; $user_row = @db_fetch_array($users_q, $j ) ; ++$j ) {

    //check for private users
    if((! ADMIN ) && ($row['private'] ) && (! isset($allowed[($user_row['id'])] ) ) ) {
      continue;
    }

    $content .= "<tr><td style=\"text-align:left\" colspan=\"4\"><small><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$user_row['id']."\">".$user_row['fullname']."</a></small></td></tr>\n";
  }

  db_free_result($users_q );

  $content .=   "<tr><td colspan=\"4\">&nbsp;</td></tr>\n";

  //flag to indicate we have a listing
  $content_flag = 1;
}

$content .=   "</table>\n";

//admin can add a usergroup
if(ADMIN) {
  $content .= "<p><span class=\"textlink\">[<a href=\"usergroups.php?x=".X."&amp;action=add\">".$lang['add']."</a>]</span></p>\n";
}
else {
  //check if no usergroups visible to this user
  if(! $content_flag ) {
    $content = "<p>".$lang['no_usergroups']."</p>\n";
  }
}

//nothing here yet
if($i == 0 ) {
  $content = "<p>".$lang['no_usergroups']."</p>\n";

  if(ADMIN) {
    $content .= "<span class=\"textlink\"><a href=\"usergroups.php?x=".X."&amp;action=add\">[".$lang['add']."]</a></span>\n";
  }

  new_box($lang['usergroup_manage'], $content );
}
else {
  new_box($lang['manage_usergroups'], $content, 'boxdata-normal', 'head-normal', 'boxstyle-short' );
}

//admin gets some user notes
if(ADMIN ) {
  include_once(BASE.'lang/lang_long.php' );
  $content = $usergroup_info;
  new_box($lang['info_usergroup_manage'], $content );
}

?>
