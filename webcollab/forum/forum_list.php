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

  Lists all the posts belonging to this task

*/
require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."config.php" );
include_once(BASE."includes/time.php" );


//check the taskid is valid
if( ! (isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) )
  error("Forum list", "Not a valid taskid" );

$taskid = $_GET["taskid"];

//check usergroup security
require_once(BASE."includes/usergroup_security.php" );

//
// Recursive function for listing all posts of a task
//
function list_posts_from_task( $parentid, $taskid, $usergroupid ) {

  global $admin, $x, $uid, $lang;

  $query="SELECT forum.text AS text,
        forum.id AS id,
        forum.posted AS posted,
        forum.userid AS postowner,
        users.id AS userid,
        users.fullname AS fullname,
        tasks.owner AS taskowner
        FROM forum
        LEFT JOIN users ON (users.id=forum.userid)
        LEFT JOIN tasks ON (tasks.id=forum.taskid )
        WHERE forum.taskid=$taskid
        AND forum.parent=$parentid
        AND forum.usergroupid=$usergroupid
        ORDER BY forum.posted";

  //query
  $q = db_query($query );

  //check for any posts
  if(db_numrows($q ) < 1 ) {
    return;
  }

  $this_content = "<ul>";

  //show all forum posts on this level
  for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {

    $this_content .= "<li><small><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["userid"]."\">".$row["fullname"]."</a> (".nicetime( $row["posted"] ).")</small>".
                     "&nbsp;<font class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=".$row["id"]."&amp;taskid=$taskid";

    //if this is a post to a private forum then announce it to the poster-engine
    if($usergroupid != 0 )
      $this_content .= "&amp;usergroupid=$usergroupid";

    $this_content .= "\">".$lang["reply"]."</a>]</font>\n";

    //owners of the thread, owners of the post and admins have a "delete" option
    if( ($admin==1) || ($uid == $row["taskowner"] ) || ($uid == $row["postowner"] ) ) {
      $this_content .= " <font class=\"textlink\">[<a href=\"forum/forum_submit.php?x=$x&amp;action=del&amp;postid=".$row["id"]."&amp;taskid=$taskid\" onClick=\"return confirm( '".$lang["confirm_del"]."' )\">".$lang["del"]."</a>]</font>\n";
    }

    $this_content .= "<br />".nl2br($row["text"] )."\n";

    //recursive search
    $this_content .= list_posts_from_task($row["id"], $taskid, $usergroupid );
  }

  $this_content .= "</ul>";

  return $this_content;
}

//--------------------------------------------------------------------------------------------------------------------------------

//MAIN PROGRAM

//
//public forums
//
$content = "";

//all the posts that have parentid 0 (the taskid is included in the query itself so this will _not_ show all results)
$content .= list_posts_from_task( 0, $taskid, 0 );
$content .= "<br />\n";
//add an option to add posts
$content .= "<font class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=0&amp;taskid=$taskid\">".$lang["new_post"]."</a>]</font>";
//show it
new_box($lang["public_user_forum"], $content, "boxdata2" );

//
//private forums
//
$content = "";

//show all posts that are private to that task's user-group if you are withing the group (so AND user AND task have to belong to the same group)
$task_usergroup = db_result(db_query("SELECT usergroupid FROM tasks WHERE id=$taskid" ), 0, 0 );

//dont show private forums if the task has not yet been assigned to a usergroup
if( $task_usergroup != 0 ) {

  $found = 0;

  //check if the user has a matching group
  $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=$uid" );
  for($i=0; $usergroup_row = @db_fetch_num($usergroup_q, $i ); $i++ ) {

    //found it
    if($task_usergroup == $usergroup_row[0] ) {
      $found=1;
      break;
    }
  }

  //if the user is an admin, access is granted
  if($admin == 1 )
    $found = 1;

  //give access if there was a match
  if($found == 1 ) {

    $content .= list_posts_from_task(0, $taskid, $task_usergroup);
    $content .= "<br />\n";
    //add an option to add posts
    $usergroup_name = db_result( db_query("SELECT name FROM usergroups WHERE id=$task_usergroup" ), 0, 0 );
    $content .= "<font class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=0&amp;taskid=$taskid&amp;usergroupid=$task_usergroup&amp;\">".$lang["new_post"]."</a>]</font>";
    //show it
    new_box(sprintf($lang["private_forum_sprt"], $usergroup_name ), $content, "boxdata2" );
  }
}

?>
