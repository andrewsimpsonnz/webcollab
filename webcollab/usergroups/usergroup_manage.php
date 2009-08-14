<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//get list of common users in private usergroups that this user can view
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid,
                      '.PRE.'usergroups_users.userid AS userid
                      FROM '.PRE.'usergroups_users
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'usergroups_users.usergroupid)
                      WHERE '.PRE.'usergroups.private=1');

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
    $allowed[($row[1])] = $row[1];
  }
}

//get the usergroup info
$q = db_query('SELECT * FROM '.PRE.'usergroups ORDER BY name' );

//nothing here yet
if(db_numrows($q) == 0 ) {
  $content = "<p>".$lang['no_usergroups']."</p>\n";

  if(ADMIN) {
    $content .= "<span class=\"textlink\"><a href=\"usergroups.php?x=".X."&amp;action=add\">[".$lang['add']."]</a></span>\n";
  }

  new_box($lang['usergroup_manage'], $content );
  return;
}

$content =  "<table class=\"celldata\">\n".
            "<tr><th>".$lang['name']."</th><th>".$lang['description']."</th><th>".$lang['private_usergroup']."</th></tr>\n";

//show all usergroups
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //check for private usergroups
  if(! ADMIN ) {
    if( ($row['private'] ) && (! isset($GID[($row['id'])] ) ) ) {
      continue;
    }
  }

  $private = ($row['private'] ) ? $lang['yes'] : $lang['no'];
  $colspan = (ADMIN ) ? '4' : '3';

  $content .= "<tr><td colspan=\"".$colspan."\"><hr /></td></tr>\n".
              "<tr><td class=\"grouplist\"><b>".$row['name']."</b></td><td class=\"grouplist\"><i>".$row['description']."</i></td><td style=\"text-align: center\">".$private."</td>\n";

  if(ADMIN) {
    $content .= "<td><span class=\"textlink\">".
                "<a href=\"usergroups.php?x=".X."&amp;action=edit&amp;usergroupid=".$row['id']."\">[".$lang['edit']."]</a></span></td>";
  }

  $content .= "</tr>\n";

  //get users from that group
  $users_q = db_query('SELECT '.PRE.'users.fullname AS fullname,
                              '.PRE.'users.id AS id,
                              '.PRE.'users.private AS private
                              FROM '.PRE.'users
                              LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                              WHERE usergroupid='.$row['id'].'
                              AND '.PRE.'users.deleted=\'f\'
                              ORDER BY '.PRE.'users.fullname' );

  for($j=0 ; $user_row = @db_fetch_array($users_q, $j ) ; ++$j ) {

    //check for private users
    if((! ADMIN ) && ($row['private'] ) && (! isset($allowed[($row['id'])] ) ) ) {
      continue;
    }

    $content .= "<tr><td style=\"text-align:left\" colspan=\"3\"><small><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$user_row['id']."\">".$user_row['fullname']."</a></small></td></tr>\n";
  }

  $content .=   "<tr><td colspan=\"3\">&nbsp;</td></tr>\n";

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

new_box($lang['manage_usergroups'], $content, "boxdata2" );

//admin gets some user notes
if(ADMIN ) {
  include_once(BASE.'lang/lang_long.php' );
  $content = $usergroup_info;
  new_box($lang['info_usergroup_manage'], $content );
}

?>
