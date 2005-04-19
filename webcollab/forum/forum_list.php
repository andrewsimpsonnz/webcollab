<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
require_once('path.php' );
require_once(BASE.'includes/security.php' );

include_once(BASE.'includes/details.php' );
include_once(BASE.'includes/time.php' );


//check the taskid is valid
if( ! (isset($_GET['taskid']) && is_numeric($_GET['taskid']) ) )
  error('Forum list', 'Not a valid taskid' );

$taskid = intval($_GET['taskid']);
  
//check usergroup security
require_once(BASE.'includes/usergroup_security.php' );

//
// Recursive function for listing all posts of a task
//
function list_posts_from_task( $taskid, $usergroupid ) {

  global $x, $lang, $TASKID_ROW, $epoch;
  global $post_array, $parent_array, $post_count;

  $parent_array = '';
  $parent_count = 0;
  $post_count   = 0;
  
  $q = db_query('SELECT '.PRE.'forum.text AS text,
                        '.PRE.'forum.id AS id,
                        '.$epoch.PRE.'forum.posted) AS posted,
                        '.PRE.'forum.userid AS postowner,
                        '.PRE.'users.id AS userid,
                        '.PRE.'users.fullname AS fullname,
                        '.PRE.'forum.parent AS parent
                        FROM '.PRE.'forum
                        LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                        WHERE '.PRE.'forum.taskid='.$taskid.'
                        AND '.PRE.'forum.usergroupid='.$usergroupid.'
                        ORDER BY '.PRE.'forum.posted' );

  //check for any posts
  if(db_numrows($q ) < 1 )
    return;

  $content = "<ul>\n";  
    
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

    //put values into array
    $post_array[$i]['id'] = $row['id'];
    $post_array[$i]['parent'] = $row['parent'];
  
    //name of poster (NULL if poster's id has been deleted)
    if($row['fullname'] == NULL )
      $this_post = "<li><small>----";
    else
      $this_post = "<li><small><a href=\"users.php?x=$x&amp;action=show&amp;userid={$row['userid']}\">{$row['fullname']}</a>";
                  
    $this_post .= "&nbsp;(".nicetime( $row['posted'], 1 ).")</small>";
                     
    //add reply button
    if($TASKID_ROW['archive'] == 0 ){
      $this_post .= "&nbsp;<span class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid={$row['id']}&amp;taskid=$taskid";

      //if this is a post to a private forum then announce it to the poster-engine
      if($usergroupid != 0 )
        $this_post .= "&amp;usergroupid=$usergroupid";

      $this_post .= "\">".$lang['reply']."</a>]</span>\n";
    }

    //owners of the thread, owners of the post and admins have a "delete" option
    if( (ADMIN ) || (UID == $TASKID_ROW['owner'] ) || (UID == $row['postowner'] ) ) {
      $this_post .= " <span class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=submit_del&amp;postid=".$row['id']."&amp;taskid=$taskid\" onclick=\"return confirm( '{$lang['confirm_del_javascript']}' )\">{$lang['del']}</a>]</span>";
    }

    $post_array[$i]['post'] = $this_post."<br />\n".$row['text']."\n";
    ++$post_count;
    
    //if this is a subpost, store the parent id 
    if($row['parent'] != 0 ) {
      $parent_array[$parent_count] = $row['parent'];
      ++$parent_count;
    }
  }
  
  //iteration for first level posts
  for($i=0 ; $i < $post_count ; ++$i ){
  
    //ignore subtasks in this iteration
    if($post_array[$i]['parent'] != 0 ){
      continue;
    }
    $content .= $post_array[$i]['post'];
    
    //if this post has children (subposts), iterate recursively to find them 
    if(in_array($post_array[$i]['id'], (array)$parent_array ) ){
      $content .= find_children($post_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }
  $content .= "</ul>\n";  
  return $content;
}

//
// List subposts (recursive function)
//
function find_children($parent ) {

  global $post_array, $parent_array, $post_count;

  $content = "<ul>\n";
       
  for($i=0 ; $i < $post_count ; ++$i ) {
  
    if($post_array[$i]['parent'] != $parent ){
      continue;
    }
    $content .= $post_array[$i]['post'];
    
    //if this post has children (subposts), iterate recursively to find them
    if(in_array($post_array[$i]['id'], $parent_array ) ){
      $content .= find_children($post_array[$i]['id'] );
    }
    $content .= "</li>\n";    
  }
  $content .= "</ul>\n"; 
  return $content;
}      


//--------------------------------------------------------------------------------------------------------------------------------

//MAIN PROGRAM

//
//public forums
//

//don't show public forum if task is set to private usergroup only (and a usergroup is set) 
if( ! ($TASKID_ROW['globalaccess'] == 'f' && $TASKID_ROW['usergroupid'] != 0 ) ){

  $content = '';

  //get all posts
  $content .= list_posts_from_task( $taskid, 0 );
  if($ul_flag == 1 )
    $content .= "<br />\n";
  //add an option to add posts
  if($TASKID_ROW['archive'] == 0 )
    $content .= "<span class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=0&amp;taskid=$taskid\">{$lang['new_post']}</a>]</span>";
  //show it
  new_box($lang['public_user_forum'], $content, 'boxdata2' );
}

//
//private forums
//

//show all posts that are private to that task's user-group if you are within the group (so AND user AND task have to belong to the same group)

//dont show private forums if the task has not yet been assigned to a usergroup
if($TASKID_ROW['usergroupid'] != 0 ) {

  $content = '';

  if(in_array($TASKID_ROW['usergroupid'], (array)$GID ) || ADMIN ) {

    $content .= list_posts_from_task( $taskid, $TASKID_ROW['usergroupid'] );
    if($ul_flag == 1 )
      $content .= "<br />\n";
    //add an option to add posts
    if($TASKID_ROW['archive'] == 0 )
      $content .= "<span class=\"textlink\">[<a href=\"forum.php?x=$x&amp;action=add&amp;parentid=0&amp;taskid=$taskid&amp;usergroupid={$TASKID_ROW['usergroupid']}&amp;\">{$lang['new_post']}</a>]</span>";
    //get usergroup
    $usergroup_name = db_result(db_query("SELECT name FROM ".PRE."usergroups WHERE id={$TASKID_ROW['usergroupid']}" ), 0, 0 );
    //show it
    new_box(sprintf($lang['private_forum_sprt'], $usergroup_name ), $content, "boxdata2" );
  }
}

?>
