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

  Show a task

*/


//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/time.php" );

//is there an id ?
if( ! isset( $_GET["taskid"]) || ! is_numeric($_GET["taskid"]) || $_GET["taskid"] == 0 )
  error("Task show", "Not a valid value for taskid" );

$taskid = $_GET["taskid"];

//check usergroup security
include_once( BASE."includes/usergroup_security.php");

//select the task info
$q = db_query("SELECT * FROM tasks WHERE tasks.id=".$taskid );

//get the data
if( ! ( $row = db_fetch_array($q, 0 ) ) )
  error("Task show", "There was an error in fetching the tasks' data.");

//mark this as seen in seen ;)
@db_query("DELETE FROM seen WHERE userid=".$uid." AND taskid=".$taskid, 0);
db_query("INSERT INTO seen(userid, taskid, time) VALUES (".$uid.", ".$taskid.", current_timestamp(0) ) " );

//start of header table
$content = "<TABLE width=\"98%\"><TR><TD>\n";

//percentage_completed gauge if this is a project
if( $row["parent"] == 0 ) {
  $percent_completed = round(percent_complete( $taskid));
  $content .= sprintf( $lang["percent_project_sprt"], $percent_completed )."<BR>\n";
  $content .= show_percent( $percent_completed )."<BR>";
}
//project/task name
$content .= "<B>".$row["name"]."</B><BR><BR></TD></TR>\n";

//show text
$content .= "<TR><TD bgcolor=\"#EEEEEE\" width=\"95%\">\n";
/* automagically make links and email adresses clickable */
$text = $row["text"];
//$text = preg_replace("/(^|\s)((https?|ftp):\/\/[^\s\)<'\"]+)/", "$1<a href=\"$2\" onclick=\"window.open(this.href,'_blank');return false;\">$2</a>", $text);
//$text = preg_replace("/(^|\s)(www\.[^\s\)<'\"]+)/", "$1<a href=\"http://$2\" onclick=\"window.open(this.href,'_blank');return false;\">$2</a>", $text);
$text = preg_replace("(([a-z0-9\-\.]+)@([a-z0-9\-\.]+)\.([a-z0-9]+))","<a href=\"mailto:\\0\">\\0</a>",$text);

$content .= nl2br($text);
$content .= "</TD></TR></TABLE>\n";

//start of info table
$content .= "<TABLE border=\"0\">\n";

//get owner information
if( $row["owner"] == 0 ) {
  $content .= "<TR><TD>".$lang["owned_by"].":</TD><TD>".$lang["nobody"]."</TD></TR>\n";
} else {
  $owner = db_result( db_query("SELECT fullname FROM users WHERE id=".$row["owner"] ), 0, 0  );
  $content .= "<TR><TD>".$lang["owned_by"].": </TD><TD><A href=\"".$BASE_URL."users.php?x=".$x."&action=show&userid=".$row["owner"]."\">".$owner."</A></TD></TR>\n";
}

//get creator information
$creator = db_result( db_query("SELECT fullname FROM users WHERE id=".$row["creator"] ), 0, 0  );
$content .= "<TR><TD>".$lang["created_on"].": </TD><TD>".nicedate($row["created"])." by <A href=\"".$BASE_URL."users.php?x=".$x."&action=show&userid=".$row["creator"]."\">".$creator."</A></TD></TR>\n";

//get deadline
$content .= "<TR><TD>".$lang["deadline"].": </TD><TD>".nicedate($row["deadline"])."</TD></TR>\n";

//get priority
$content .= "<TR><TD>".$lang["priority"].": </TD><TD>";
switch( $row["priority"] ) {

  case 0:
    $content .=  $task_state["dontdo"];
    break;
  case 1:
    $content .=  $task_state["low"];
    break;
  case 2:
    $content .=  $task_state["normal"];
    break;
  case 3:
    $content .=  "<B>".$task_state["high"]."</B>";
    break;
  case 4:
    $content .=  "<B><FONT color=\"red\">".$task_state["yesterday"]."</FONT></B>";
    break;
}
$content .= "</TD></TR>\n";

//if this is a project don't show status info and task completion date
if( $row["parent"] != 0 ) {

  $content .= "<TR><TD>".$lang["status"].": </TD><TD>";
  switch( $row["status"] ) {

    case "created":
      $content .=  $task_state["new"];
      break;
    case "notactive":
      $content .=  $task_state["planned"];
      break;
    case "active":
      $content .=  $task_state["active"];
      break;
    case "cantcomplete":
      $content .=  "<B>".$task_state["cantcomplete"]."</B>";
      break;
    case "done":
      $content .=  $task_state["done"];
      break;
    default:
      $content .=  $row["status"];
      break;
  }
  $content .= "</TD></TR>\n";

  //is there a finished date ?
  switch( $row["status"] ) {
    case "done":
      $content .= "<TR><TD>".$lang["completed_on"].": </TD><TD>".nicedate($row["finished_time"])."</TD></TR>\n";
      break;

    case "cantcomplete":
      $content .= "<TR><TD>".$lang["modified_on"].": </TD><TD>".nicedate($row["finished_time"])."</TD></TR>\n";
      break;

    default:
      break;
  }
}
else{
  //project - show the finish date and status
  switch( $row["status"] ) {
    case "cantcomplete":
      $content .= "<TR><TD>".$lang["status"].": </TD><TD><B>".$lang["project_on_hold"]."</B></TD></TR>\n";
      $content .= "<TR><TD>".$lang["modified_on"].": </TD><TD>".nicedate($row["finished_time"])."</TD></TR>\n";
      break;

    case "notactive":
      $content .= "<TR><TD>".$lang["status"].": </TD><TD>".$lang["project_planned"]."</TD></TR>\n";
      break;

    default:
      if( $percent_completed == 100 ) {
        $completed_date = @db_result( db_query( "SELECT MAX(finished_time) FROM tasks WHERE parent<>0 AND projectid=".$taskid ), 0, 0 );
        $content .= "<TR><TD>".$lang["completed_on"].": </TD><TD>".nicedate($completed_date)."</TD></TR>\n";
      }
      break;
  }
}

//task group
if( $row["parent"] != 0 ) {

  switch( $row["taskgroupid"] ){
    case "0":
      $content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#taskgroup\" target=\"helpwindow\">".$lang["taskgroup"]."</A>: </TD><TD>".$lang["none"]."<BR>\n";
      break;

    default:
      $taskgroup = db_result( db_query("SELECT name FROM taskgroups WHERE id=".$row["taskgroupid"] ), 0, 0 );
      $content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#taskgroup\" target=\"helpwindow\">".$lang["taskgroup"]."</A>: </TD><TD>".$taskgroup."</TD></TR>\n";
      break;
  }
}

//set title variables as approriate for task or project
switch( $row["parent"] ){
  case "0":
    $title = $lang["project_details"];
    $type = $lang["project"];
    break;

 default:
    $title = $lang["task_info"];
    $type = $lang["task"];
    break;
}

//show the usergroupid
if( $row["usergroupid"] != 0 ) {
  $usergroup = db_result( db_query("SELECT name FROM usergroups WHERE id=".$row["usergroupid"] ), 0, 0  );
  $content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#usergroup\" target=\"helpwindow\">".$lang["usergroup"]."</A>: </TD><TD>".$usergroup." ";

  switch($row["globalaccess"] ){
    case 't':
      $content .= sprintf($lang["task_accessible_sprt"], $type )."</TD></TR>\n";
      break;

    case 'f':
    default:
      $content .= "<B>".sprintf($lang["task_not_accessible_sprt"], $type )."</B></TD></TR>\n";
      break;
  }

  if($row["groupaccess"] == 't' )
      $content .= "<TR><TD>&nbsp;</TD><TD><I>".sprintf($lang["usergroup_can_edit_sprt"], $type )."</I></TD></TR>\n";

}
else {
  $content .= "<TR><TD><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#usergroup\" target=\"helpwindow\">".$lang["usergroup"]."</A>: </TD><TD>".sprintf($lang["task_not_in_usergroup_sprt"], $type )."</TD></TR>\n";
}

$content .= "</TABLE>\n";

//this part shows all the options the users has
$content .= "<BR><DIV align=\"center\"><SMALL>\n";

//set add function for task or project
switch( $row["parent"] ){
  case "0":
    $content .= "[<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=add&parentid=".$taskid."\">".$lang["add_task"]."</A>] \n";
    break;

 default:
    $content .= "[<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=add&parentid=".$taskid."\">".$lang["add_subtask"]."</A>] \n";
    break;
}

//see if user is in usergroup and can edit
switch( $row["groupaccess"] ) {
  case "t";
    $group = FALSE;
    $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
    for( $i=0 ; $usergroup_row = @db_fetch_num($usergroup_q, $i ) ; $i++) {
    if($row["usergroupid"] == $usergroup_row[0] ){
      $group = TRUE;
      break;
      }
    }
    break;

  case "f":
  default:
    $group = FALSE;
    break;
  }

switch( $row["owner"] ){
  case "0":
    if( $admin == 1 ){
      //admin edit
      $content .= "[<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=edit&taskid=".$taskid."\">".$lang["edit"]."</A>] \n";
    }
    //I'll take it!
    $content .= "[<A href=\"".$BASE_URL."tasks/task_submit.php?x=".$x."&action=meown&taskid=".$taskid."\">".$lang["i_take_it"]."</A>] \n";
    break;

  case ($uid):
    $content .= "[<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=edit&taskid=".$taskid."\">".$lang["edit"]."</A>] \n";
    //if not finished and not a project; then [I finished it!] button
    if( ( $row["status"] != "done" ) && ( $row["parent"] != 0 ) ) {
      $content .= "[<A href=\"".$BASE_URL."tasks/task_submit.php?x=".$x."&action=done&taskid=".$taskid."\">".$lang["i_finished"]."</A>] \n";
    }
    // deown the task
    $content .= "[<A href=\"".$BASE_URL."tasks/task_submit.php?x=".$x."&action=deown&taskid=".$taskid."\">".$lang["i_dont_want"]."</A>] \n";
    break;

  default:
    if($admin == 1 ){
      //edit
      $content .= "[<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=edit&taskid=".$taskid."\">".$lang["edit"]."</A>] \n";
      //take over
      $content .= "[<A href=\"".$BASE_URL."tasks/task_submit.php?x=".$x."&action=meown&taskid=".$taskid."\">".sprintf($lang["take_over_sprt"], $type)."</A>] \n";
    }
    if($group )
      //if user is in the usergroup & groupaccess is set
      $content .= "[<A href=\"".$BASE_URL."tasks.php?x=".$x."&action=edit&taskid=".$taskid."\">".$lang["edit"]."</A>] \n";
    break;
}

$content .= "</SMALL></DIV><BR>\n";

new_box( $title, $content );
?>

