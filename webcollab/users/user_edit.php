<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Easy user manager

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );

//secure vars
$userid="";

//is an admin everything can be queried otherwise only yourself can be queried
if( $admin == 1 ) {

  //is there a uid ?
  if( ! isset($_GET["userid"]) || ! is_numeric($_GET["userid"]) )
    error("User edit", "No userid was specified");

  $userid = $_GET["userid"];

  //query for user
  $q = db_query("SELECT * FROM users WHERE id=".$userid );

  //also query for the groups that this user is in
  $usergroups_users_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$userid );


}
else {

  //user
  $q = db_query( "SELECT * FROM users WHERE id=".$uid );

}

//fetch data
if( ! ( $row = db_fetch_array($q , 0 ) ) )
  error("Database result", "Error in retrieving user-data from database");


//show data
$content = "<BR><FORM method=\"POST\" action=\"users/user_submit.php\">";
$content .= "<TABLE border=\"0\">";
$content .= "<TR><TD>".$lang["login_name"].":</TD><TD><INPUT type=\"text\" name=\"name\" size=\"30\" value=\"".$row["name"]."\"></TD></TR>\n";
$content .= "<TR><TD>".$lang["full_name"].":</TD><TD><INPUT type=\"text\" name=\"fullname\" size=\"30\" value=\"".$row["fullname"]."\"></TD></TR>\n";
$content .= "<TR><TD>".$lang["password"].":</TD><TD><INPUT type=\"password\" name=\"password\" size=\"30\" value=\"\"><SMALL><I>(Leave blank for current password)</I></SMALL></TD></TR>\n";
$content .= "<TR><TD>".$lang["email"].":</TD><TD><INPUT type=\"text\" name=\"email\" size=\"30\" value=\"".$row["email"]."\"></TD></TR>\n";

//dangerous action!
if( $admin == 1 ) {

  if( $row["admin"] == 't' )
    $content .= "<TR><TD>".$lang["is_admin"].":</TD><TD><INPUT type=\"checkbox\" name=\"admin_rights\" CHECKED></TD></TR>\n";
  else
    $content .= "<TR><TD>".$lang["is_admin"].":</TD><TD><INPUT type=\"checkbox\" name=\"admin_rights\"></TD></TR>\n";
}

//add user-groups (only admins can do this)
if( $admin == 1 ) {

  //add user-groups
  $usergroup_q = db_query( "SELECT name, id FROM usergroups ORDER BY name" );
  $content .= "<TR><TD></TD><TD><SMALL><I>".$lang["member_groups"]."</I></SMALL></TD></TR>\n";
  $content .= "<TR> <TD>".$lang["usergroups"].":</TD> <TD><SELECT name=\"usergroup[]\" MULTIPLE size=\"4\">\n";
  for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++) {

    $found=0;
    $content .= "<OPTION value=\"".$usergroup_row["id"]."\"";

    //loop all groups the user is in and tag the ones he is in
    @db_data_seek( $usergroups_users_q ); //reset mysql internal pointer each cycle
    for( $j=0 ; $usergroups_users_row = @db_fetch_array($usergroups_users_q, $j ) ; $j++) {

      if( $usergroups_users_row["usergroupid"] == $usergroup_row["id"] ) {
        $content .= " SELECTED >";
	$found=1;
	break;
      }
    }

    //if not found then end the option tag normally
    if( $found == 0 )
      $content .= " >";

    $content .= $usergroup_row["name"]."</OPTION>";

  }
  $content .= "</SELECT><SMALL><I>".$lang["select_instruct"]."</I></SMALL></TD></TR>\n";
}

$content .= "</TABLE>";
$content .= "<INPUT TYPE=\"submit\" NAME=\"Add\" value=\"".$lang["submit_changes"]."\">";
$content .= "<INPUT TYPE=\"reset\">";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"edit\">";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"userid\" value=\"".$userid."\">";
$content .= "</FORM>";

new_box($lang["edit_user"], "<CENTER>".$content."</CENTER>" );

?>
