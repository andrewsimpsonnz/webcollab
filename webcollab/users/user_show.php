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
include_once( BASE."includes/database.php" );
include_once( BASE."includes/common.php" );
include_once( BASE."includes/screen.php" );

//get some stupid errors
if( ! isset($_GET["userid"]) || ! is_numeric($_GET["userid"]) || $_GET["userid"] == 0 )
  error("User show", "No userid was given");

$userid = $_GET["userid"];

//select
$q = db_query("SELECT * FROM users WHERE id=".$userid );

//get info
if( ! ($row = db_fetch_array( $q, 0 ) ) )
  error("Database error", "Error in fetching result");


$content="";

if( $row["deleted"] == 't' )
  $content .= "<BR><B><CENTER><FONT color=\"red\">".$lang["user_deleted"]."</FONT></CENTER></B><BR>";

$content .= "<BR><TABLE>";
$content .= "<TR><TD>".$lang["login"].":</TD><TD>".$row["name"]."</TD></TR>\n";
$content .=  "<TR><TD>".$lang["full_name"].":</TD><TD>".$row["fullname"]."</TD></TR>\n";
$content .=  "<TR><TD>".$lang["email"].":</TD><TD><A href=\"mailto:".$row["email"]."\">".$row["email"]."</A></TD></TR>\n";

if( $row["admin"] == "t" ) $content .= "<TR><TD>".$lang["admin"].":</TD><TD>".$lang["yes"]."</TD></TR>\n";
else $content .= "<TR><TD>".$lang["admin"].":</TD><TD>".$lang["no"]."</TD></TR>\n";

//create a list of all the groups the user is in
$q = db_query( "SELECT usergroups.name FROM usergroups LEFT JOIN usergroups_users ON  (usergroups_users.usergroupid=usergroups.id)  WHERE usergroups_users.userid=".$row["id"] );

if( db_numrows($q) < 1 ) {
  $content .= "<TR><TD>".$lang["usergroups"].": </TD><TD>".$lang["no_usergroup"]."</TD></TR>\n";
} else {
  $content .= "<TR><TD>".$lang["usergroups"].": </TD><TD>";
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++)
    $content .= $row["name"]." ";
  $content .= "</TD></TR>\n";
}

//get the last login time of a user
$q = db_query( "SELECT lastaccess FROM logins WHERE user_id=".$userid );
$content .= "<TR><TD>".$lang["last_time_here"]."</TD><TD>".nicetime(@db_result( $q, 0, 0 ))."</TD></TR>\n";

//Get the number of tasks created
$q = db_query( "SELECT COUNT(*) FROM tasks WHERE creator=".$userid );
$content .= "<TR><TD>".$lang["number_items_created"]."</TD><TD>".db_result( $q, 0, 0 )."</TD></TR>\n";

//Get the number of projects owned
$q = db_query( "SELECT COUNT(*) FROM tasks WHERE owner=".$userid." AND parent=0" );
$content .= "<TR><TD>".$lang["number_projects_owned"]."</TD><TD>".( $numberofprojectsowned = db_result( $q, 0, 0 ) )."</TD></TR>\n";

//Get the number of tasks owned
$q = db_query( "SELECT COUNT(*) FROM tasks WHERE owner=".$userid." AND parent<>0" );
$content .= "<TR><TD>".$lang["number_tasks_owned"]."</TD><TD>".( $numberoftasksowned = db_result( $q, 0, 0 ) )."</TD></TR>\n";

//Get the number of tasks completed that are owned
$q = db_query( "SELECT COUNT(*) FROM tasks WHERE owner=".$userid." AND status='done' AND parent<>0" );
$content .= "<TR><TD>".$lang["number_tasks_completed"]."</TD><TD>".db_result( $q, 0, 0 )."</TD></TR>\n";

//Get the number of forum posts
$q = db_query( "SELECT COUNT(*) FROM forum WHERE userid=".$userid );
$content .= "<TR><TD>".$lang["number_forum"]."</TD><TD>".db_result( $q, 0, 0 )."</TD></TR>\n";

//Get the number of files uploaded and the size
$q = db_query( "SELECT SUM(size), COUNT(size) FROM files WHERE uploader=".$userid );
$content .= "<TR><TD>".$lang["number_files"]."</TD><TD>".db_result( $q, 0, 1 )."</TD></TR>\n";
$size = db_result( $q, 0, 0 );
if( $size == "") {
  $size = 0;
}
$content .= "<TR><TD>".$lang["size_all_files"]."</TD><TD>".$size.$lang["bytes"]."</TD></TR>\n";



$content .= "</TABLE>";

new_box($lang["user_info"], $content );


//shows quick links to the tasks that the user owns

if( $numberoftasksowned + $numberofprojectsowned > 0 ) {
  $content = "<UL>";

  //Get the number of tasks
  $q = db_query( "SELECT id, name, parent, status, finished_time FROM tasks WHERE owner=".$userid );

  //show them
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

    $status_content = "";

    //status
    switch( $row["status"] ) {
      case "done":
        $status_content="<FONT color=\"darkgreen\">(".$task_state["done"]." ".nicedate($row["finished_time"]).")</FONT>";
	break;

      case "active":
        $status_content="<FONT color=\"orange\">(".$task_state["active"].")</FONT>";
	break;

      case "notactive":
        $status_content="<FONT color=\"darkgreen\">(".$task_state["planned"].")</FONT>";
	break;

      case "cantcomplete":
        $status_content="<FONT color=\"blue\">(".$task_state["cantcomplete"]." ".nicedate($row["finished_time"]).")</FONT>";
	break;
    }

    if($row["parent"] == 0 )
      //project 
      $status_content ="<FONT color=\"red\">(".$lang["pproject"].")</FONT>";

    //show the task
    $content .= "<LI><A href=\"".BASE."tasks.php?x=".$x."&action=show&taskid=".$row["id"]."\">".$row["name"]."</A> ".$status_content."<BR>\n";
  }

  $content .= "</UL>";
  new_box($lang["owned_tasks"], $content );

}

?>
