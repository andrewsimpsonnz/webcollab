<?php
/*
  $Id$

  (c) 2002 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Manage the task-groups

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//admins only
if( ! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

//get the info
$q = db_query('SELECT * FROM '.PRE.'taskgroups ORDER BY group_name' );

$content =  "<table class=\"celldata\">\n".
            "<tr><th>".$lang['name']."</th><th>".$lang['description']."</th><th></th></tr>\n";

//show all taskgroups
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  $content .= "<tr><td colspan=\"3\" class=\"divline\"></td></tr>\n".
              "<tr class=\"grouplist\"><td ><b>".$row['group_name']."</b></td><td><i>".$row['group_description']."</i></td>".
              "<td><span class=\"textlink\"><a href=\"taskgroups.php?x=".X."&amp;action=edit&amp;taskgroupid=".$row['id']."\">[".$lang['edit']."]</a></span></td></tr>\n";

}

$content .= "</table>\n".
            "<p><span class=\"textlink\">[<a href=\"taskgroups.php?x=".X."&amp;action=add\">".$lang['add']."</a>]</span></p>\n";


//nothing here yet
if($i == 0 ) {
  $content = "<p>".$lang['no_taskgroups']."</p>\n".
             "<span class=\"textlink\"><a href=\"taskgroups.php?x=".X."&amp;action=add\">[".$lang['add']."]</a></span>\n";

  new_box($lang['taskgroup_manage'], $content );
}
else {
  new_box( $lang['manage_taskgroups'], $content, 'boxdata-normal', 'head-normal', 'boxstyle-short' );
}

//admin gets some user notes
include_once(BASE.'lang/lang_long.php' );
$content = $taskgroup_info;
new_box( $lang['info_taskgroup_manage'], $content );

?>
