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

function listTasks($task_id, $tail ) {
   global $x, $admin, $usergroup, $userid, $epoch, $lang;
  // show all subtasks that are not complete
  $q_tasks = db_query( "SELECT id, name, owner, deadline, usergroupid, globalaccess,
                        $epoch deadline) AS task_due,
                        $epoch now() ) AS now
                        FROM tasks
                        WHERE projectid=$task_id
                        AND parent<>0
                        AND (status='created' OR status='active')
                        $tail
                        ORDER BY deadline DESC" );
  if(db_numrows($q_tasks ) == 0 )
    return;

   $content = "";

   for( $iter=0 ; $task_row = @db_fetch_array($q_tasks, $iter ) ; $iter++) {

     //check for private usergroups
     if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {

       if( ! in_array( $row["usergroupid"], $usergroup ) )
         continue;
     }

     $content .= "<li><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$task_row[ "id" ]."\">";

     //add highlighting if deadline is due
     $state = ceil( ($task_row["task_due"]-$task_row["now"] )/86400 );
     if($state > 1) {
       $content .= $task_row["name"]."</a>".sprintf($lang["due_in_sprt"], $state );
       } else if($state > 0) {
          $content .= $task_row["name"]."</a>".$lang["due_tomorrow"];
       }
       else {
         $content .= "<font color=\"#FF0000\">".$task_row["name"]."</font></a>";
       }
     $content .= "</li>\n";
   }
return $content;
}

//
//START OF MAIN PROGRAM
//

$flag = 0;
$content = "";
$usergroup[0] = 0;

//check validity of inputs
if(isset($_POST["selection"]) && strlen($_POST["selection"]) > 0 )
  $selection = ($_POST["selection"]);
else
  $selection = "user";

if(isset($_POST["userid"]) && is_numeric($_POST["userid"]) )
  $userid = ($_POST["userid"]);
else
  $userid = $uid;

if(isset($_POST["groupid"]) && is_numeric($_POST["groupid"]) )
  $groupid = ($_POST["groupid"]);
else
  $groupid = 0;

//query to get the all the projects
$query = db_query("SELECT id, name FROM tasks WHERE parent=0 ORDER BY name" );

// check if there are projects
if(db_numrows($query ) < 1 ) {
  $content = "<div align=\"center\"><a href=\"tasks.php?x=$x&amp;action=add\">".$lang["add"]."</a></div>\n";
  new_box( $lang["no_projects"], $content );
  return;
}

//set selection & associated defaults for the text boxes
switch($selection ) {
  case "group":
    $userid = 0; $s1 = ""; $s2 = " SELECTED"; $s3 = " CHECKED"; $s4 = "";
    if($groupid == 0 )
      $s4 = " CHECKED";
    $tail = "AND usergroupid=$groupid";
    break;

  case "user":
  default:
    $tail = "AND owner=$userid";
    $groupid = 0; $s1 = " CHECKED"; $s2 = ""; $s3 = ""; $s4 = " SELECTED";
    if($userid == 0 ){
      $s2 = " SELECTED";
      $tail = "";
    }
    break;
}

//get usergroups of user, and put them in a simple array for later use
$q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
  $usergroup[$i] = $row[0];
}

$content .= "<form method=\"POST\" action=\"users.php\">\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\">\n ".
            "<input type=\"hidden\" name=\"action\" value=\"todo\">\n ".
            "<table border=\"0\">\n".
            "<tr><td>".$lang["todo_list_for"]."</td></tr>".
            "<tr><td><input type=\"radio\" value=\"user\" name=\"selection\" id=\"user\"$s1><label for=\"user\">".$lang["users"]."</label></td><td>\n".
            "<select name=\"userid\">\n".
            "<option value=\"0\"$s2>".$lang["nobody"]."</option>\n";

//get all users for option box
$q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

//user input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $userid )
    $content .= " SELECTED";

  $content .= ">".$row["fullname"]."</option>\n";
}

$content .= "</select></td></tr>\n".
            "<tr><td><input type=\"radio\" value=\"group\" name=\"selection\" id=\"group\"$s3><label for=\"group\">".$lang["usergroups"]."</label></td><td>\n".
            "<select name=\"groupid\">\n".
            "<option value=\"0\"$s4>".$lang["no_group"]."</option>\n";

//get all groups for option box
$q = db_query("SELECT id, name FROM usergroups ORDER BY name" );

//usergroup input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $groupid )
    $content .= " SELECTED";

  $content .= ">".$row["name"]."</option>\n";
}

$content .= "</select><br /><br /></td></tr>\n".
            "<tr><td><input type=\"submit\" value=\"".$lang["update"]."\"></td></tr>\n".
            "</table></form>\n".
            "<br />\n";

// show all uncompleted tasks and projects belonging to this user or group
for( $iter=0 ; $task_row = @db_fetch_array( $query, $iter ) ; $iter++) {

  $new_content = listTasks($task_row["id"], $tail );

  //if no task, don't show project name either
  if( $new_content != "" ) {
    $content .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>".$task_row["name"]."</b></p>\n".
                "<ul>".$new_content."</ul>\n";
    //set flag to show there is at least one uncompleted task
    $flag = 1;
  }
}

if( $flag != 1 )
  $content .= $lang["no_assigned"]."\n";

new_box( $lang["todo_list"], $content );

?>
