<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002
  
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

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if( ! ADMIN )
  error("Unauthorised access", "This function is for admins only." );

//secure
if(empty($_GET['usergroupid'] ) || ! is_numeric($_GET['usergroupid'] ) )
  error("Usergroup edit", "Not a valid value for usergroupid." );

$usergroupid = intval($_GET['usergroupid']);

//get taskgroup information
$q = db_query("SELECT * FROM ".PRE."usergroups WHERE id=$usergroupid" );
$row = db_fetch_array( $q, 0 );

//set private usergroup checkbox
if($row['private'] )
  $private = "checked=\"checked\"";
else
  $private = "";

$content = "<form method=\"post\" action=\"usergroups.php\">\n".
           "<fieldset><input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
           "<input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
           "<input type=\"hidden\" name=\"usergroupid\" value=\"$usergroupid\" /></fieldset>\n".
           "<table class=\"celldata\">\n".
           "<tr><td>".$lang['usergroup_name']."</td><td><input type=\"text\" name=\"name\" value=\"".html_escape($row['name'])."\" size=\"30\" /></td></tr>\n".
           "<tr><td>".$lang['usergroup_description']."</td><td><input type=\"text\" name=\"description\" value=\"".html_escape($row['description'])."\" size=\"30\" /></td></tr>\n".
           "<tr><td>&nbsp;</td></tr>\n".
           "<tr><td><label for=\"private\">".$lang['private_usergroup'].":</label></td><td><input type=\"checkbox\" name=\"private_group\" id=\"private\" $private /></td></tr>\n".
           "<tr><td>&nbsp;</td></tr>\n";

//add users
$user_q = db_query("SELECT fullname, id FROM ".PRE."users WHERE deleted='f' ORDER BY fullname" );
$member_q = db_query("SELECT ".PRE."users.id AS id
                             FROM ".PRE."users
                             LEFT JOIN ".PRE."usergroups_users ON (".PRE."usergroups_users.userid=".PRE."users.id)
                             WHERE usergroupid=".$row['id']."
                             AND ".PRE."users.deleted='f'"  );

$content .=    "<tr><td>".$lang['members']."</td><td><select name=\"member[]\" multiple=\"multiple\" size=\"4\">\n";

for( $i=0 ; $user_row = @db_fetch_array($user_q, $i ) ; $i++ ) {
  $content .= "<option value=\"".$user_row['id']."\"";

  @db_data_seek($member_q ); //reset mysql internal pointer each cycle
  for($j=0 ; $member_row = @db_fetch_array($member_q, $j ) ; $j++ )
    if ($member_row['id'] == $user_row['id'] )
      $content .= " selected=\"selected\"";
  $content .= ">".$user_row['fullname']."</option>\n";
}

$content .=  "</select><small><i>".$lang['select_instruct']."</i></small></td></tr>\n".
             "</table>\n".
             "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" />&nbsp;".
             "<input type=\"reset\" value=\"".$lang['reset']."\" /></p>\n".
             "</form>\n";

new_box( $lang['edit_usergroup'], $content );

?>