<?php
/*
  $Id: user_edit.php 2297 2009-08-24 09:45:18Z andrewsimpson $

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

  User edit

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'users/user_common.php' );

//secure vars
$userid = '';
$usergroups_users_array = array();

if((GUEST) && (GUEST_LOCKED != 'N' ) ){
  warning($lang['access_denied'], 'Guests are not permitted to modify details' );
}

//generate_token
generate_token('user_edit' );

//is an admin everything can be queried otherwise only yourself can be queried
if(ADMIN ) {

  //is there a uid ?
  if(isset($_GET['userid']) && safe_integer($_GET['userid']) ){
    $userid = $_GET['userid'];
  }
  else {
    error('User edit', 'No userid was specified' );
  }
  
  //query for the groups that this user is in
  $q = db_prepare('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid=?' );
  db_execute($q, array($userid ) );

  //put groups in an array
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
    $usergroups_users_array[] = $row['usergroupid'];
  }

  //also query for user
  $q = db_prepare('SELECT * FROM '.PRE.'users WHERE id=?' );
  db_execute($q, array($userid ) );

}
else {
  //user
  $q = db_prepare('SELECT * FROM '.PRE.'users WHERE id=?' );
  db_execute($q, array(UID ) );
}

//fetch data
if( ! ($row = db_fetch_array($q , 0 ) ) ) {
  error('Database result', 'Error in retrieving user data from database' );
}

//show data
$content =  "<form method=\"post\" action=\"users.php\" ".
            "onsubmit=\"return fieldCheck('email', 'full', 'name' ) && emailCheck('email')\">\n".
            "<fieldset><input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"userid\" value=\"$userid\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
            "<input type=\"hidden\" id=\"alert_email\" name=\"alert1\" value=\"".$lang['invalid_email']."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert2\" value=\"".$lang['missing_field_javascript']."\" /></fieldset>\n".
            "<table class=\"celldata\">".
            "<tr><td>".$lang['login_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" class=\"size\" value=\"".$row['user_name']."\" /></td></tr>\n".
            "<tr><td>".$lang['full_name'].":</td><td><input id=\"full\" type=\"text\" name=\"fullname\" class=\"size\" value=\"".$row['fullname']."\" /></td></tr>\n";

//don't show password field for WEB_AUTH
if(WEB_AUTH == 'N' ) {
  $content .= "<tr><td>".$lang['password'].":</td><td><input type=\"".PASS_STYLE."\" name=\"password\" class=\"size\" value=\"\" /><small><i>".$lang['blank_for_current_password']."</i></small></td></tr>\n";
}

$content .= "<tr><td>".$lang['email'].":</td><td><input id=\"email\" type=\"text\" name=\"email\" class=\"size\" value=\"".$row['email']."\" /></td></tr>\n";

$content .=  user_locale($row['locale'] );

//dangerous action!
if(ADMIN ) {

  //add blank line
  $content .= "<tr><td></td><td></td></tr>\n";

  //private user
  if( $row['private'] == 1 ){
    $content .= "<tr><td><label for=\"private\">".$lang['private_user'].":</label></td><td><input type=\"checkbox\" name=\"private_user\" checked=\"checked\" id=\"private\" /></td></tr>\n";
  }
  else{
    $content .= "<tr><td><label for=\"private\">".$lang['private_user'].":</label></td><td><input type=\"checkbox\" name=\"private_user\" id=\"private\" /></td></tr>\n";
  }

  //normal user
  $s1 = "checked=\"checked\""; $s2 = ""; $s3 = "";

  //admin user
  if($row['user_admin'] == 't' ) {
    $s1 = ""; $s2 = "checked=\"checked\""; $s3 = "";
  }

  //guest user
  if($row['guest'] == 1 ) {
    $s1 = ""; $s2 = ""; $s3 = "checked=\"checked\"";
  }

   $content .= "<tr><td><label for=\"normal\">".$lang['normal_user'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"normal\" id=\"normal\" ".$s1." /></td></tr>\n".
               "<tr><td><label for=\"admin\">".$lang['is_admin'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"admin\" id=\"admin\" ".$s2." /></td></tr>\n".
               "<tr><td><label for=\"guest\">".$lang['is_guest'].":</label></td><td><input type=\"radio\" name=\"user_type\" value=\"guest\" id=\"guest\" ".$s3." /></td></tr>\n";

  //add blank line
  $content .= "<tr><td></td><td></td></tr>\n";

  //add user-groups
  $usergroup_q = db_query("SELECT group_name, id FROM ".PRE."usergroups ORDER BY group_name" );
  $content .= "<tr><td></td><td><small><i>".$lang['member_groups']."</i></small></td></tr>\n".
              "<tr><td>".$lang['usergroups'].":</td>".
              "<td><select name=\"usergroup[]\" multiple=\"multiple\" size=\"4\">\n";

  for($i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; ++$i ) {
    $content .= "<option value=\"".$usergroup_row['id']."\"";

    //highlight occupied groups
    if(in_array($usergroup_row['id'], $usergroups_users_array ) ) {
      $content .= " selected=\"selected\"";
    }
    $content .= " >".$usergroup_row['group_name']."</option>";
  }
  $content .= "</select><small><i>".$lang['select_instruct']."</i></small></td></tr>\n";
}

$content .= "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" /></p>\n".
            "</form>\n";

new_box($lang['edit_user'], $content );

?>
