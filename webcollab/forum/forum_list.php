<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on original file written for Core APM by Dennis Fleurbaaij 2001/2002

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

include_once(BASE."includes/details.php" );
include_once(BASE."includes/time.php" );


//check the taskid is valid
if( ! (isset($_GET["taskid"]) && is_numeric($_GET["taskid"]) ) )
  error("Forum list", "Not a valid taskid" );

$taskid = intval($_GET["taskid"]);

//check usergroup security
require_once(BASE."includes/usergroup_security.php" );

//
// Recursive function for listing all posts of a task
//
function list_posts_from_task( $parentid, $taskid, $usergroupid ) {

  global $parent_array, $ul_flag, $admin, $x, $uid, $lang, $taskid_row;

  $ul_flag = 0;

  $q = db_query("SELECT ".PRE."forum.text AS text,
                        ".PRE."forum.id AS id,
                        ".PRE."forum.posted AS posted,
                        ".PRE."forum.userid AS postowner,
                        ".PRE."users.id AS userid,
                        ".PRE."users.fullname AS fullname
                        FROM ".PRE."forum
                        LEFT JOIN ".PRE."users ON (".PRE."users.id=".PRE."forum.userid)
                        WHERE ".PRE."forum.taskid=$taskid
                        AND ".PRE."forum.parent=$parentid
                        AND ".PRE."forum.usergroupid=$usergroupid
                        ORDER BY ".PRE."forum.posted" );

  //check for any posts
  if(db_numrows($q ) < 1 ) {
    return;
  }

  $this_content = "<ul>";
  $ul_flag = 1;

  //show all forum posts on this level
  for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {

    if($row["fullname"] == NULL )
      $this_content .= "<li><small>----";
    else
      $this_content .= "<li><small><a href=\"users.php?x=$x&amp;action=show&amp;userid=".$row["userid"]."\">".$row["fullname"]."</a>";

    $this_content .= "&nbsp;(".nicetime( $row["posted"] ).")</small>".
                     "&nbsp;<font class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=".$row["id"]."&amp;taskid=$taskid";

    //if this is a post to a private forum then announce it to the poster-engine
    if($usergroupid != 0 )
      $this_content .= "&amp;usergroupid=$usergroupid";

    $this_content .= "\">".$lang["reply"]."</a>]</font>\n";

    //owners of the thread, owners of the post and admins have a "delete" option
    if( ($admin==1) || ($uid == $taskid_row["owner"] ) || ($uid == $row["postowner"] ) ) {
      $this_content .= " <font class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=submit_del&amp;postid=".$row["id"]."&amp;taskid=$taskid\" onclick=\"return confirm( '".$lang["confirm_del_javascript"]."' )\">".$lang["del"]."</a>]</font>";
    }

    $this_content .= "<br />\n".$row["text"]."\n";

    //recursive search
    if(in_array($row["id"], $parent_array, FALSE ) ) {
      $this_content .= list_posts_from_task($row["id"], $taskid, $usergroupid );
      $this_content .= "\n</ul>\n</li>";
    }
    else{
      $this_content .= "</li>\n";
    }
  }

  return $this_content;
}

//--------------------------------------------------------------------------------------------------------------------------------

//MAIN PROGRAM

//get number of posts for this taskid
$q = db_query("SELECT DISTINCT parent FROM ".PRE."forum WHERE taskid=$taskid" );

//put parent id's in an array
$parent_array = NULL;
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++ ) {
  $parent_array[$i] = $row["parent"];
}


//
//public forums
//

//don't show public forum if task is set to private
if($taskid_row["globalaccess"] == 't' ){

  $content = "";

  //all the posts that have parentid 0 (the taskid is included in the query itself so this will _not_ show all results)
  $content .= list_posts_from_task( 0, $taskid, 0 );
  if($ul_flag == 1 )
    $content .= "</ul>\n<br />\n";
  //add an option to add posts
  $content .= "<font class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=0&amp;taskid=$taskid\">".$lang["new_post"]."</a>]</font>";
  //show it
  new_box($lang["public_user_forum"], $content, "boxdata2" );
}

//
//private forums
//

//show all posts that are private to that task's user-group if you are within the group (so AND user AND task have to belong to the same group)

//dont show private forums if the task has not yet been assigned to a usergroup
if($taskid_row["usergroupid"] != 0 ) {

  $content = "";

  if(in_array($taskid_row["usergroupid"], (array)$gid ) || $admin == 1 ) {

    $content .= list_posts_from_task(0, $taskid, $taskid_row["usergroupid"] );
    if($ul_flag == 1 )
      $content .= "</ul>\n<br />\n";
    //add an option to add posts
    $content .= "<font class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=0&amp;taskid=$taskid&amp;usergroupid=".$taskid_row["usergroupid"]."&amp;\">".$lang["new_post"]."</a>]</font>";
    //get usergroup
    $usergroup_name = db_result(db_query("SELECT name FROM ".PRE."usergroups WHERE id=".$taskid_row["usergroupid"] ), 0, 0 );
    //show it
    new_box(sprintf($lang["private_forum_sprt"], $usergroup_name ), $content, "boxdata2" );
  }
}

?>
