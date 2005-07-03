<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
  WebCollab
  ---------------------------------------
  Based on CoreAPM  by Dennis Fleurbaaij 2001/2002

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

//secure vars
$userid = '';

//is an admin everything can be queried otherwise only yourself can be queried
if(ADMIN ) {

  //is there a uid ?
  if(empty($_REQUEST['userid']) || ! is_numeric($_REQUEST['userid']) ){
    error('User edit', 'No userid was specified' );
  }
  $userid = intval($_REQUEST['userid']);

  //query for user
  $q = db_query('SELECT * FROM '.PRE.'users WHERE id='.$userid );

  //also query for the groups that this user is in
  $usergroups_users_q = db_query('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.$userid );
}
else {
  //user
  $q = db_query('SELECT * FROM '.PRE.'users WHERE id='.UID );
}

//fetch data
if( ! ($row = db_fetch_array($q , 0 ) ) ) {
  error('Database result', 'Error in retrieving user-data from database' );
}

//show data
$content =  "<form method=\"post\" action=\"users.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
              "<input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
              "<input type=\"hidden\" name=\"userid\" value=\"$userid\" /></fieldset>\n".
              "<table class=\"celldata\">".
              "<tr><td>".$lang['login_name'].":</td><td><input type=\"text\" name=\"name\" size=\"30\" value=\"".html_escape($row['name'])."\" /></td></tr>\n".
              "<tr><td>".$lang['full_name'].":</td><td><input type=\"text\" name=\"fullname\" size=\"30\" value=\"".html_escape($row['fullname'])."\" /></td></tr>\n".
              "<tr><td>".$lang['password'].":</td><td><input type=\"password\" name=\"password\" size=\"30\" value=\"\" /></td><td><small><i>".$lang['blank_for_current_password']."</i></small></td></tr>\n".
              "<tr><td>".$lang['email'].":</td><td><input type=\"text\" name=\"email\" size=\"30\" value=\"".$row['email']."\" /></td></tr>\n";

//dangerous action!
if(ADMIN ) {

  //add blank line
  $content .= "<tr><td>&nbsp;</td></tr>\n";
  
  //private user
  if( $row['private'] == 1 ){
    $content .= "<tr><td><label for=\"private\">".$lang['private_user'].":</label></td><td><input type=\"checkbox\" name=\"private_user\" checked=\"checked\" id=\"private\" /></td></tr>\n";
  }
  else{  
    $content .= "<tr><td><label for=\"private\">".$lang['private_user'].":</label></td><td><input type=\"checkbox\" name=\"private_user\" id=\"private\" /></td></tr>\n".
                "<tr><td>&nbsp;</td></tr>\n";
  }
  
  //normal user
  $s1 = "checked=\"checked\""; $s2 = ""; $s3 = "";

  //admin user
  if($row['admin'] == 't' ) {
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
  $content .= "<tr><td>&nbsp;</td></tr>\n";
  
  //add user-groups
  $usergroup_q = db_query( "SELECT name, id FROM ".PRE."usergroups ORDER BY name" );
  $content .= "<tr><td></td><td colspan=\"2\"><small><i>".$lang['member_groups']."</i></small></td></tr>\n".
              "<tr><td>".$lang['usergroups'].":</td>".
              "<td colspan=\"2\"><select name=\"usergroup[]\" multiple=\"multiple\" size=\"4\">\n";

  for($i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; ++$i) {

    $found = 0;
    $content .= "<option value=\"".$usergroup_row['id']."\"";

    //loop all groups the user is in and tag the ones he is in
    @db_data_seek( $usergroups_users_q ); //reset mysql internal pointer each cycle
    for($j=0 ; $usergroups_users_row = @db_fetch_array($usergroups_users_q, $j ) ; ++$j) {

      if($usergroups_users_row['usergroupid'] == $usergroup_row['id'] ) {
        $content .= " selected=\"selected\">";
        $found = 1;
        break;
      }
    }

    //if not found then end the option tag normally
    if($found == 0 ) {
      $content .= " >";
    }

    $content .= $usergroup_row['name']."</option>";
  }
  $content .= "</select><small><i>".$lang['select_instruct']."</i></small></td></tr>\n";
}

$content .= "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" />&nbsp;".
            "<input type=\"reset\" value=\"".$lang['reset']."\" /></p>\n".
            "</form>\n";

new_box($lang['edit_user'], $content );

?>