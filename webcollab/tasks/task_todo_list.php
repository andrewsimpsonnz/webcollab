<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  Created 2002 by Andrew Simpson
  with much help from the people noted in the README

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

  Show the tasks that are still to-do

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/database.php" );
include_once( BASE."includes/common.php" );

//
// List tasks
//

function listTasks( $task_id ) {
   global $x, $userid, $epoch, $lang;
  // show all subtasks that are not complete
  $q_tasks = db_query( "SELECT id, name, owner, deadline,
	                ".$epoch."deadline) as task_due,
                        ".$epoch."now() ) as now
                        FROM tasks
                        WHERE projectid=".$task_id."
                        AND parent<>0
                        AND (status='created' OR status='active')
                        AND owner=".$userid."
                        ORDER BY deadline DESC" );
  if( !$q_tasks or db_numrows( $q_tasks ) == 0)
    return;

   $content = "";

   for( $iter=0 ; $task_row = @db_fetch_array($q_tasks, $iter ) ; $iter++) {

     $content .= "<LI> <A HREF=\"tasks.php?x=".$x."&action=show&taskid=".$task_row[ "id" ]."\">";

     //add highlighting if deadline is due
     $state = ceil( ( $task_row["task_due"]-$task_row["now"] )/86400 );
     if($state > 1) {
       $content .= $task_row[ "name" ]."</A>".sprintf($lang["due_in_sprt"], $state );
       } else if($state > 0) {
       $content .= $task_row[ "name" ]."</A>".$lang["due_tomorrow"];
       } else {
       $content .= "<FONT color=\"red\">".$task_row[ "name" ]."</A></FONT>";
       }
     $content .= "</LI>\n";
   }
return $content;
}

//
//START OF MAIN PROGRAM
//

$userid = $uid;
$flag = 0;
$content = "";

if( isset($_POST["userid"]) && is_numeric($_POST["userid"]) )
  $userid = ($_POST["userid"]);
  else
  $userid = $uid;

//query to get the all the projects
$query = db_query( "SELECT id, name
	            FROM tasks
		    WHERE parent = 0
    		    ORDER BY name" );

// check if there are projects
if( db_numrows( $query ) < 1 ) {
  new_box( $lang["no_projects"],
	  "<BR><CENTER><A href=\"tasks.php?x=".$x."&action=add\">".$lang["add"]."</A></CENTER><BR>");
  return;
}

$content .= "<TABLE border=\"0\">\n";
$content .= "<FORM method=\"POST\" action=\"users.php\">\n";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"x\" value=\"".$x."\">\n ";
$content .= "<INPUT TYPE=\"hidden\" NAME=\"action\" value=\"todo\">\n ";

$content .= "<TR> <TD>".$lang["todo_list_for"]."</TD><TD><SELECT name=\"userid\">\n";
$content .= "<OPTION value=\"0\">".$lang["nobody"]."</OPTION>\n";

//get all users for option box
$users_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

for( $i=0 ; $row = @db_fetch_array($users_q, $i ) ; $i++) {
  $content .= "<OPTION value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $userid )
    $content .= " SELECTED";

  $content .= ">".$row["fullname"]."</OPTION>\n";
}

$content .= "</SELECT></TD>\n";

$content .= "<TD><INPUT TYPE=\"submit\" NAME=\"Add\" value=\"Submit\"> ";
$content .= "</FORM></TD></TR>\n";
$content .= "</TABLE>\n";
$content .= "<BR>\n";

// show all uncompleted tasks and projects belonging to this user
for( $iter=0 ; $task_row = @db_fetch_array( $query, $iter ) ; $iter++) {

  $new_content = listTasks( $task_row["id"] );

  //if no task, don't show project name either
  if( $new_content != "" ) {
    $content .= "<UL><B>".$task_row["name"]."</B></UL>\n";
    $content .= "<UL>".$new_content."</UL>\n";
    //set flag to show there is at least one uncompleted task
    $flag = 1;
  }
}

if( $flag != 1 )
  $content .= "<UL>".$lang["no_assigned"]."</UL>\n";

$content .= "<BR>\n";

new_box( $lang["todo_list"], $content );

?>
