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

include_once( "includes/security.php" );
include_once( "includes/screen.php" );
include_once( "includes/time.php" );


//
// code to handle an action state
//
if( valid_string($_REQUEST["action"]) ) {

  switch( $_REQUEST["action"] ) {

    //give the user-manager screen
    case "manage":
      create_top("Manage users");
      include( "includes/mainmenu.php");
      include( "users/user_menubox.php" );
      include( "users/user_existing_menubox.php" );
      if( $admin == 1 ) {
        include( "users/user_deleted_menubox.php" );
        include( "usergroups/usergroup_menubox.php" );
      }

      goto_main();
      include_once( "lang/".$LOCALE."_long_message.php" );
      new_box($lang["manage_users"], $user_info.
      "<DIV align=\"center\">[<A href=\"users.php?x=".$x."&action=add\">".$lang["add"]."</A>]".
      "[<A href=\"users.php?x=".$x."&action=showonline\">".$lang["who_online"]."</A>]</DIV><BR><BR>" );
      create_bottom();
      break;

    //Add a user
    case "add":
      create_top($lang["add_user"], 0, "name" );
      include( "includes/mainmenu.php");
      include( "users/user_menubox.php" );
      goto_main();
      include( "users/user_add.php" );
      create_bottom();
      break;

    //Edit a user
    case "edit":
      create_top($lang["edit_user"] );
      include( "includes/mainmenu.php");
      include( "users/user_menubox.php" );
      goto_main();
      include( "users/user_edit.php" );
      create_bottom();
      break;

    //show user's personal details
    case "show":
      create_top($lang["user_info"] );
      include( "includes/mainmenu.php");
      include( "users/user_menubox.php" );
      include( "users/user_existing_menubox.php" );
      goto_main();
      include( "users/user_show.php" );
      create_bottom();
      break;

    //who is online ?
    case "showonline":
      create_top($lang["users_online"] );
      include( "includes/mainmenu.php");
      include( "users/user_menubox.php" );
      include( "users/user_existing_menubox.php" );
      goto_main();

      $content="<TABLE border=\"0\" >\n";
      $q = db_query("SELECT logins.lastaccess AS last,
			     users.id AS id,
			     users.fullname AS fullname
			     FROM logins
			     LEFT JOIN users ON (users.id=logins.user_id)
			     WHERE logins.lastaccess > ( now()-INTERVAL ".$delim."1 HOUR".$delim.")
			     ORDER BY logins.lastaccess DESC" );

      $content.="<TR><TD nowrap colspan=\"2\"><B>".$lang["online"]."</B></TD></TR>";
      for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++)
        $content .= "<TR><TD><A href=\"users.php?x=".$x."&action=show&userid=".$row["id"]."\">".$row["fullname"]."</A></TD><TD>".nicetime($row["last"])."</TD></TR>\n";

      $content.="<TR><TD colspan=\"2\">&nbsp;</TD></TR>";
      $q = db_query("SELECT logins.lastaccess AS last,
			     users.id AS id,
			     users.fullname AS fullname
			     FROM logins
			     LEFT JOIN users ON (users.id=logins.user_id)
			     WHERE logins.lastaccess < ( now()-INTERVAL ".$delim."1 HOUR".$delim.")
			     ORDER BY logins.lastaccess DESC" );

      $content.="<TR><TD colspan=\"2\"><B>".$lang["not_online"]."</B></TD></TR>";
      for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++)
        $content .= "<TR><TD><A href=\"users.php?x=".$x."&action=show&userid=".$row["id"]."\">".$row["fullname"]."</A></TD><TD>".nicetime($row["last"])."</TD></TR>\n";

      new_box($lang["user_activity"], "<BR>".$content."</TABLE><BR>" );

      create_bottom();
      break;

    case "todo":
      create_top($lang["todo_list"] );
      include( "includes/mainmenu.php" );
      include( "users/user_menubox.php" );
      include( "users/user_existing_menubox.php" );
      goto_main();
      include( "tasks/task_todo_list.php" );
      create_bottom();
      break;

    //Error case
    default:
      error("Users action handler", "Invalid request given" );
      break;
  }
}
else
  error("Users action handler", "No request given" );

?>
