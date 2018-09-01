<?php
/*
  $Id: user_edit.php 2172 2009-04-06 07:30:53Z andrewsimpson $

  (c) 2009 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  User edit delete

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );

//secure vars
$userid = '';
$content = '';

//admins only
if(! ADMIN ){
  error('Unauthorised access', 'This function is for admins only.' );
}

//generate_token
generate_token('user_del' );

//is there a uid ?
if(! safe_integer($_GET['userid']) ){
  error('User edit delete', 'No userid was specified' );
}
$userid = $_GET['userid'];

//query for user
$q = db_prepare('SELECT id, user_name, fullname, deleted FROM '.PRE.'users WHERE id=?' );
db_execute($q, array($userid ) );

//fetch data
if( ! ($row = db_fetch_array($q , 0 ) ) ) {
  error('Database result', 'Error in retrieving user-data from database' );
}

//show data
$content = "<table class=\"celldata\">\n".
           "<tr class=\"grouplist\"><td>".$lang['login_name'].":</td><td>".$row['user_name']."</td></tr>\n".
           "<tr class=\"grouplist\"><td>".$lang['full_name'].":</td><td>".
           "<a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['id']."\">".$row['fullname']."</a></td></tr>\n".
           "</table>\n";

if($row['deleted'] == 'f' ) {

  //existing user
  $content .= "<form method=\"post\" action=\"users.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"action\" value=\"del\" />\n".
              "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
              "<input type=\"hidden\" name=\"userid\" value=\"$userid\" />\n".
              "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
              "<p><input type=\"submit\" value=\"".$lang['delete']."\" /></p>\n".
              "</form>\n";
}
else { //deleted user

  //revive
  $content .= "<form method=\"post\" action=\"users.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"action\" value=\"revive\" />\n".
              "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
              "<input type=\"hidden\" name=\"userid\" value=\"$userid\" />\n".
              "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
              "<p><input type=\"submit\" value=\"".$lang['revive']."\" /></p>\n".
              "</form>\n";

  //if this user has NO tasks owned then we can delete him forever :)
  $q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE task_owner=?' );
  db_execute($q, array($row['id'] ) );

  if(! db_result($q, 0, 0 ) ) {
    //permdel
    $content .= "<form method=\"post\" action=\"users.php\" ".
                "onsubmit=\"return confirm( '".sprintf($lang['permdel_javascript_sprt'], javascript_escape($row['fullname'] ) )."' )\">\n".
                "<fieldset><input type=\"hidden\" name=\"action\" value=\"permdel\" />\n".
                "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
                "<input type=\"hidden\" name=\"userid\" value=\"$userid\" />\n".
                "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
                "<p><input type=\"submit\" value=\"".$lang['permdel']."\"/></p>\n".
                "</form>\n";
  }
}

new_box($lang['edit_user'], $content );

?>
