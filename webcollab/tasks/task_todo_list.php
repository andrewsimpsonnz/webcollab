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

require_once("path.php" );
require_once( BASE."includes/security.php" );

//
// List tasks
//

function listTasks($task_id ) {
   global $x, $userid, $epoch, $lang;
  // show all subtasks that are not complete
  $q_tasks = db_query( "SELECT id, name, owner, deadline,
                        $epoch deadline) as task_due,
                        $epoch now() ) as now
                        FROM tasks
                        WHERE projectid=$task_id
                        AND parent<>0
                        AND (status='created' OR status='active')
                        AND owner=$userid
                        ORDER BY deadline DESC" );
  if(db_numrows($q_tasks ) == 0 )
    return;

   $content = "";

   for( $iter=0 ; $task_row = @db_fetch_array($q_tasks, $iter ) ; $iter++) {

     $content .= "<li> <a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$task_row[ "id" ]."\">";

     //add highlighting if deadline is due
     $state = ceil( ($task_row["task_due"]-$task_row["now"] )/86400 );
     if($state > 1) {
       $content .= $task_row["name"]."</a>".sprintf($lang["due_in_sprt"], $state );
       } else if($state > 0) {
          $content .= $task_row["name"]."</a>".$lang["due_tomorrow"];
       }
       else {
         $content .= "<font color=\"#FF0000\">".$task_row["name"]."</a></font>";
       }
     $content .= "</li>\n";
   }
return $content;
}

//
//START OF MAIN PROGRAM
//

$userid = $uid;
$flag = 0;
$content = "";

if(isset($_POST["userid"]) && is_numeric($_POST["userid"]) )
  $userid = ($_POST["userid"]);
else
  $userid = $uid;

//query to get the all the projects
$query = db_query("SELECT id, name FROM tasks WHERE parent = 0 ORDER BY name" );

// check if there are projects
if( db_numrows( $query ) < 1 ) {
  new_box( $lang["no_projects"],
           "<br /><center><a href=\"tasks.php?x=$x&amp;action=add\">".$lang["add"]."</a></center><br />");
  return;
}

$content .= "<br /><table border=\"0\">\n".
            "<form method=\"POST\" action=\"users.php\">\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\">\n ".
            "<input type=\"hidden\" name=\"action\" value=\"todo\">\n ".
            "<tr> <td>".$lang["todo_list_for"]."</td><td><select name=\"userid\">\n".
            "<option value=\"0\">".$lang["nobody"]."</option>\n";

//get all users for option box
$users_q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

for( $i=0 ; $row = @db_fetch_array($users_q, $i ) ; $i++) {
  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $userid )
    $content .= " SELECTED";

  $content .= ">".$row["fullname"]."</option>\n";
}

$content .= "</select></td>\n".
            "<td><input type=\"submit\" name=\"Add\" value=\"Submit\"> ".
            "</form></td></tr>\n".
            "</table>\n".
            "<br />\n";

// show all uncompleted tasks and projects belonging to this user
for( $iter=0 ; $task_row = @db_fetch_array( $query, $iter ) ; $iter++) {

  $new_content = listTasks( $task_row["id"] );

  //if no task, don't show project name either
  if( $new_content != "" ) {
    $content .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>".$task_row["name"]."</b></p>\n".
                "<ul>".$new_content."</ul>\n";
    //set flag to show there is at least one uncompleted task
    $flag = 1;
  }
}

if( $flag != 1 )
  $content .= "<ul>".$lang["no_assigned"]."</ul>\n";

$content .= "<br />\n";

new_box( $lang["todo_list"], $content );

?>
