<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Show the tasks that are still to-do

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

//
// List tasks
//

function listTasks($task_id, $tail ) {
   global $x, $admin, $gid, $userid, $epoch, $lang;
  // show all subtasks that are not complete
  $q = db_query( "SELECT id, name, owner, deadline, usergroupid, globalaccess,
                        $epoch deadline) AS task_due,
                        $epoch now() ) AS now
                        FROM tasks
                        WHERE projectid=$task_id
                        AND parent<>0
                        AND (status='created' OR status='active')
                        $tail
                        ORDER BY deadline DESC" );
  if(db_numrows($q ) == 0 )
    return;

   $content = "";

   for( $iter=0 ; $row = @db_fetch_array($q, $iter ) ; $iter++) {

     //check for private usergroups
     if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {

       if( ! in_array( $row["usergroupid"], (array)$gid ) )
         continue;
     }

     $content .= "<li><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row[ "id" ]."\">";

     //add highlighting if deadline is due
     $state = ceil( ($row["task_due"]-$row["now"] )/86400 );
     if($state > 1) {
       $content .= $row["name"]."</a>".sprintf($lang["due_in_sprt"], $state );
       } else if($state > 0) {
          $content .= $row["name"]."</a>".$lang["due_tomorrow"];
       }
       else {
         $content .= "<font color=\"#FF0000\">".$row["name"]."</font></a>";
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
$allowed[0] = 0; 

//get list of common users in private usergroups that this user can view 
$q = db_query("SELECT usergroupid, userid 
                      FROM usergroups_users 
                      LEFT JOIN usergroups ON (usergroups.id=usergroups_users.usergroupid)
                      WHERE usergroups.private=1");

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  if(in_array($row[0], (array)$gid ) && ! in_array($row[1], (array)$allowed ) ) {
   $allowed[] = $row[1];
  }
}

//check validity of inputs
if(isset($_POST["selection"]) && strlen($_POST["selection"]) > 0 )
  $selection = ($_POST["selection"]);
else
  $selection = "user";

if(isset($_POST["userid"]) && is_numeric($_POST["userid"]) )
  $userid = intval($_POST["userid"]);
else
  $userid = $uid;

if(isset($_POST["groupid"]) && is_numeric($_POST["groupid"]) )
  $groupid = intval($_POST["groupid"]);
else
  $groupid = 0;

// check if there are projects
if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE parent=0" ), 0, 0 ) < 1 ) {
  $content = "<div align=\"center\"><a href=\"tasks.php?x=$x&amp;action=add\">".$lang["add"]."</a></div>\n";
  new_box( $lang["no_projects"], $content );
  return;
}

//set selection & associated defaults for the text boxes
switch($selection ) {
  case "group":
    $userid = 0; $s1 = ""; $s2 = " selected=\"selected\""; $s3 = " checked=\"checked\""; $s4 = "";
    $tail = "AND usergroupid=$groupid";
    if($groupid == 0 )
      $s4 = " selected=\"selected\"";
    break;

  case "user":
  default:
    $groupid = 0; $s1 = " checked=\"checked\""; $s2 = ""; $s3 = ""; $s4 = " selected=\"selected\"";
    $tail = "AND owner=$userid";
    if($userid == 0 )
      $s2 = " selected=\"selected\"";
    break;
}

$content .= "<form method=\"post\" action=\"tasks.php\">\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n ".
            "<input type=\"hidden\" name=\"action\" value=\"todo\" />\n ".
            "<table class=\"celldata\">\n".
            "<tr><td>".$lang["todo_list_for"]."</td></tr>".
            "<tr><td><input type=\"radio\" value=\"user\" name=\"selection\" id=\"user\"$s1 /><label for=\"user\">".$lang["users"]."</label></td><td>\n".
            "<label for=\"user\"><select name=\"userid\">\n".
            "<option value=\"0\"$s2>".$lang["nobody"]."</option>\n";

//get all users for option box
$q = db_query("SELECT id, fullname, private FROM users WHERE deleted='f' ORDER BY fullname");

//user input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
      
  //user test for privacy
  if($row["private"] && ( ! $admin ) && ( ! in_array($row["id"], (array)$allowed ) ) ){
    continue;
  }
    
  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $userid )
    $content .= " selected=\"selected\"";

  $content .= ">".$row["fullname"]."</option>\n";
}

$content .= "</select></label></td></tr>\n".
            "<tr><td><input type=\"radio\" value=\"group\" name=\"selection\" id=\"group\"$s3 /><label for=\"group\">".$lang["usergroups"]."</label></td><td>\n".
            "<label for=\"group\"><select name=\"groupid\">\n".
            "<option value=\"0\"$s4>".$lang["no_group"]."</option>\n";

//get all groups for option box
$q = db_query("SELECT id, name, private FROM usergroups ORDER BY name" );

//usergroup input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
    
  //usergroup test for privacy
  if( (! $admin ) && ( ! in_array($row["id"], (array)$gid ) ) ) {
    continue;
  }
    
  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $groupid )
    $content .= " selected=\"selected\"";

  $content .= ">".$row["name"]."</option>\n";
}

$content .= "</select></label><br /><br /></td></tr>\n".
            "<tr><td><input type=\"submit\" value=\"".$lang["update"]."\" /></td></tr>\n".
            "</table>\n".
            "</form>\n";

//query to get the all the projects
$q = db_query("SELECT id, name, usergroupid, globalaccess FROM tasks WHERE parent=0 ORDER BY name" );

// show all uncompleted tasks and projects belonging to this user or group
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {

   //check for private usergroups
   if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {

     if( ! in_array( $row["usergroupid"], (array)$gid ) )
       continue;
   }

  $new_content = listTasks($row["id"], $tail );

  //if no task, don't show project name either
  if($new_content != "" ) {
    $content .= "<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>".$row["name"]."</b></p>\n".
                "<ul>".$new_content."</ul>\n";
    //set flag to show there is at least one uncompleted task
    $flag = 1;
  }
}

if( $flag != 1 )
  $content .= $lang["no_assigned"]."\n";

new_box( $lang["todo_list"], $content );

?>
