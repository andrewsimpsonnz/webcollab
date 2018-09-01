<?php
/*
  $Id: usergroup_edit.php 2296 2009-08-24 09:44:14Z andrewsimpson $

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

  Edit usergroups

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
require_once(BASE.'includes/admin_config.php' );

//admins only
if( ! ADMIN ) {
  error('Unauthorised access', 'This function is for admins only.' );
}

//secure vars
$content = '';
$member_array = array();

//secure input
if(! @safe_integer($_GET['usergroupid'] ) ) {
  error('Usergroup edit', 'Not a valid value for usergroupid.' );
}
$usergroupid = $_GET['usergroupid'];

//generate_token
generate_token('usergroup' );

//get usergroup information
$q = db_prepare('SELECT * FROM '.PRE.'usergroups WHERE id=?' );
db_execute($q, array($usergroupid ) );

if(! ($row = db_fetch_array( $q, 0 ) ) ) {
  error('Usergroup edit', 'Usergroup does not exist' );
}

//set private usergroup checkbox
if($row['private'] ){
  $private = "checked=\"checked\"";
}
else {
  $private = "";
}

$content = "<form method=\"post\" action=\"usergroups.php\">\n".
           "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
           "<input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
           "<input type=\"hidden\" name=\"usergroupid\" value=\"".$usergroupid."\" />\n".
           "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
           "<table class=\"celldata\">\n".
           "<tr><td>".$lang['usergroup_name']."</td><td><input type=\"text\" name=\"name\" value=\"".$row['group_name']."\" class=\"size\" /></td></tr>\n".
           "<tr><td>".$lang['usergroup_description']."</td><td><input type=\"text\" name=\"description\" value=\"".$row['group_description']."\" class=\"size\" /></td></tr>\n".
           "<tr><td></td><td></td></tr>\n".
           "<tr><td><label for=\"private\">".$lang['private_usergroup'].":</label></td><td><input type=\"checkbox\" name=\"private_group\" id=\"private\" ".$private." /></td></tr>\n".
           "<tr><td></td><td></td></tr>\n";

//add users
$q = db_prepare('SELECT '.PRE.'users.id AS id
                      FROM '.PRE.'users
                      LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                      WHERE usergroupid=?
                      AND '.PRE.'users.deleted=\'f\'' );
db_execute($q, array($row['id'] ) );

//put groups in an array
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  $member_array[] = $row['id'];
}

$q = db_query('SELECT fullname, id FROM '.PRE.'users WHERE deleted=\'f\' ORDER BY fullname' );

$content .= "<tr><td>".$lang['members']."</td><td><select name=\"member[]\" multiple=\"multiple\" size=\"4\">\n";

for( $i=0 ; $user_row = @db_fetch_array($q, $i ) ; ++$i ) {
  $content .= "<option value=\"".$user_row['id']."\"";

  //highlight occupied groups
  if(in_array($user_row['id'], $member_array ) ) {
    $content .= " selected=\"selected\"";
  }

  $content .= ">".$user_row['fullname']."</option>\n";
}

$content .=  "</select><small><i>".$lang['select_instruct']."</i></small></td></tr>\n".
             "<tr><td></td><td></td></tr>\n".
             "<tr><td><label for=\"usergroup\">".$lang['email_edit_usergroup']."</label></td><td><input type=\"checkbox\" name=\"mail_group\" id=\"usergroup\" ".DEFAULT_GROUP." /></td></tr>\n".
             "<tr><td></td><td></td></tr>\n".
             "</table>\n".
             "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" /></p>\n".
             "</form>\n".
             "<form method=\"post\" action=\"usergroups.php\" ".
             "onclick=\"return confirm( '".$lang['confirm_del_javascript']."')\">\n".
             "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
             "<input type=\"hidden\" name=\"action\" value=\"submit_del\" />\n".
             "<input type=\"hidden\" name=\"usergroupid\" value=\"".$usergroupid."\" />\n".
             "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
             "<p><input type=\"submit\" value=\"".$lang['delete']."\" /></p>\n".
             "</form>\n";

new_box( $lang['edit_usergroup'], $content );

?>
