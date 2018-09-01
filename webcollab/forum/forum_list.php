<?php
/*
  $Id: forum_list.php 2293 2009-08-24 09:40:36Z andrewsimpson $

  (c) 2002 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Lists all the posts belonging to this task

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/usergroup_security.php' );
include_once(BASE.'includes/details.php' );
include_once(BASE.'includes/time.php' );

//
// Recursive function for listing all posts of a task
//
function list_posts_from_task( $taskid, $usergroupid ) {

  global $lang, $TASKID_ROW;
  global $post_array, $parent_array, $post_count, $level_count;

  $post_array   = array();
  $parent_array = array();
  $post_count   = 0;
  $level_count  = 1;
  $post_char_limit = 500;

  $q = db_prepare('SELECT '.PRE.'forum.forum_text AS forum_text,
                        '.PRE.'forum.id AS id,
                        '.PRE.'forum.posted AS posted,
                        '.PRE.'forum.edited AS edited,
                        '.PRE.'forum.sequence AS sequence,
                        '.PRE.'forum.userid AS postowner,
                        '.PRE.'users.id AS userid,
                        '.PRE.'users.fullname AS fullname,
                        '.PRE.'forum.parent AS parent
                        FROM '.PRE.'forum
                        LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                        WHERE '.PRE.'forum.taskid=?
                        AND '.PRE.'forum.usergroupid=?
                        ORDER BY '.PRE.'forum.posted DESC' );

  db_execute($q, array($taskid, $usergroupid ) );

  $content = "<ul class=\"ul-".$level_count."\">\n";

  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

    //initialise
    $this_post = '';
    $suffix    = '';

    //put values into array
    $post_array[$i]['id'] = $row['id'];
    $post_array[$i]['parent'] = $row['parent'];

    //name of poster (NULL if poster's id has been deleted)
    if($row['fullname'] == NULL ) {
      $this_post = "<li><small>----";
    }
    else {
      $this_post = "<li><small><a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['userid']."\">".$row['fullname']."</a>";
    }
    $this_post .= "&nbsp;(".nicetime( $row['posted']).")</small>\n";

    //owners of the thread, owners of the post and admins have a "delete" option
    if( (ADMIN ) || (UID == $TASKID_ROW['task_owner'] ) || (UID == $row['postowner'] ) ) {
      $this_post .= "<span class=\"textlink\">[<a href=\"forum.php?x=".X."&amp;action=delete&amp;postid=".$row['id']."\" >".$lang['del']."</a>]</span>\n";
    }

    //owners of the post have an "update" option
    if( UID == $row['postowner'] ) {
      $this_post .= "&nbsp;<span class=\"textlink\">[<a href=\"forum.php?x=".X."&amp;action=edit&amp;postid=".$row['id']."\">".$lang['update']."</a>]</span>\n";
    }

    //add reply button
    if($TASKID_ROW['archive'] == 0 ){
      if((GUEST == false ) || ((GUEST == true ) && (GUEST_LOCKED == 'N' ) ) ){
        $this_post .= "&nbsp;<span class=\"textlink\">[<a href=\"forum.php?x=".X."&amp;action=add&amp;parentid=".$row['id']."&amp;taskid=".$taskid;

        //if this is a post to a private forum then announce it to the poster-engine
        if($usergroupid != 0 ) {
          $this_post .= "&amp;usergroupid=".$usergroupid;
        }
        $this_post .= "\">".$lang['reply']."</a>]</span>\n";
      }
    }

    $this_post .= "<br />\n";

    $raw_post = nl2br(bbcode($row['forum_text'] ) );

    //check for long posts, and provide dropdown box
    if(mb_strlen($raw_post ) > $post_char_limit) {
      //rough cut to fit, then look for word boundaries for better cut
      $first_cut  = mb_substr($raw_post, 0, ($post_char_limit + 20 ) );
      $last_space_pos = strrpos($first_cut, ' ' );

      //adjust to suit word boundary if possible
      if(($last_space_pos === false ) || ($last_space_pos > ($post_char_limit - 20 ) ) ) {
        $post_char_limit = $last_space_pos;
      }
      $body1 = substr($raw_post, 0, ($post_char_limit + 1 ) );
      $body2 = substr($raw_post, ($post_char_limit + 1 ) );

      $this_post .= "<span style=\"display:inline;\">".$body1."</span>".
                    "<span id=\"dot_".$row['id']."\" style=\"display:inline;\">...</span>".
                    "<span id=\"post_".$row['id']."\" style=\"display:inline;\">".$body2."</span>&nbsp;&nbsp;".
                    "<img src=\"images/book_next.png\" id=\"img_dn_".$row['id']."\" style=\"display:none;\" alt=\"\" ".
                    "onclick=\"postToggle('dot_".$row['id']."', 'post_".$row['id']."', 'img_dn_".$row['id']."', 'img_up_".$row['id']."'); return false;\" />".
                    "<img src=\"images/arrow_up.png\" id=\"img_up_".$row['id']."\" style=\"display:inline;\" alt=\"\" ".
                    "onclick=\"postToggle('dot_".$row['id']."', 'post_".$row['id']."', 'img_dn_".$row['id']."', 'img_up_".$row['id']."'); return false;\" />";

      //use javascript to fold up the post (if no javascript then post stays unfolded)
      $this_post .= "<script type=\"text/javascript\">postToggle('dot_".$row['id']."', 'post_".$row['id']."', 'img_dn_".$row['id']."', 'img_up_".$row['id']."'); </script>";
    }
    else{
      $this_post .= $raw_post;
    }

    //mark if this an edited post
    if($row['sequence'] > 0 ) {
      $this_post .= "<br /><img src=\"images/note_edit.png\" alt=\"\" />&nbsp;<small>--&nbsp;".nicetime( $row['edited'])."</small>";
    }

    $post_array[$i]['post'] = $this_post."\n";
    ++$post_count;

    //if this is a subpost, store the parent id
    if($row['parent'] != 0 ) {
      $parent_array[($row['parent'])] = $row['parent'];
    }
  }

  if($i == 0 ) {
    //no posts were found in the database
    $content = '';
    return $content;
  }

  //iteration for first level posts
  for($i=0 ; $i < $post_count ; ++$i ){

    //ignore subtasks in this iteration
    if($post_array[$i]['parent'] != 0 ){
      continue;
    }
    $content .= $post_array[$i]['post'];

    //if this post has children (subposts), iterate recursively to find them
    if(isset($parent_array[($post_array[$i]['id'])] ) ) {
      $content .= find_forum_children($post_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }
  $content .= "</ul>\n";
  return $content;
}

//
// List subposts (recursive function)
//
function find_forum_children($parent ) {

  global $post_array, $parent_array, $post_count, $level_count;

  ++$level_count;
  $content = "<ul class=\"ul-".$level_count."\">\n";

  //find children posts in reverse order to stored array (natural ascending)
  for($i = ($post_count - 1 ) ; $i >= 0 ; --$i ) {

    if($post_array[$i]['parent'] != $parent ){
      continue;
    }
    $content .= $post_array[$i]['post'];

    //if this post has children (subposts), iterate recursively to find them
    if(isset($parent_array[($post_array[$i]['id'])] ) ){
      $content .= find_forum_children($post_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }
  --$level_count;
  $content .= "</ul>\n";

  return $content;
}


//--------------------------------------------------------------------------------------------------------------------------------

//MAIN PROGRAM

//check the taskid is valid
if(! @safe_integer($_GET['taskid']) ) {
  error('Forum list', 'Not a valid taskid' );
}
$taskid = $_GET['taskid'];

//check usergroup security
$taskid = usergroup_check($taskid );

//
//public forums
//

//don't show public forum if task is set to private usergroup only (and a usergroup is set)
if( ! ($TASKID_ROW['globalaccess'] == 'f' && $TASKID_ROW['usergroupid'] != 0 ) ){

  //get all posts
  $content = list_posts_from_task( $taskid, 0 );
  //add an option to add posts
  if($TASKID_ROW['archive'] == 0 ) {
    if((GUEST == false ) || ((GUEST == true ) && (GUEST_LOCKED == 'N' ) ) ){
      $content .= "<span class=\"textlink\">[<a href=\"forum.php?x=".X."&amp;action=add&amp;parentid=0&amp;taskid=".$taskid."\">".$lang['new_post']."</a>]</span>\n";
    }
  }

  //show it
  new_box($lang['public_user_forum'], $content, 'boxdata-normal', 'head-normal', 'boxstyle-short', 'forum-list-public' );
}

//
//private forums
//

//show all posts that are private to that task's usergroup if you are within the group (so AND user AND task have to belong to the same group)

//dont show private forums if the task has not yet been assigned to a usergroup
if($TASKID_ROW['usergroupid'] != 0 ) {

  if(isset($GID[($TASKID_ROW['usergroupid'])] ) || ADMIN ) {

    $content = list_posts_from_task( $taskid, $TASKID_ROW['usergroupid'] );
    //add an option to add posts
    if($TASKID_ROW['archive'] == 0 ){
      if((GUEST == false ) || ((GUEST == true ) && (GUEST_LOCKED == 'N' ) ) ){
        $content .= "<span class=\"textlink\">[<a href=\"forum.php?x=".X."&amp;action=add&amp;parentid=0&amp;taskid=".$taskid."&amp;usergroupid=".$TASKID_ROW['usergroupid']."&amp;\">".$lang['new_post']."</a>]</span>\n";
      }
    }
    //get usergroup
    $q = db_prepare('SELECT group_name FROM '.PRE.'usergroups WHERE id=? LIMIT 1' );
    db_execute($q, array($TASKID_ROW['usergroupid'] ) );
    $usergroup_name = db_result($q, 0, 0 );
    //show it
    new_box(sprintf($lang['private_forum_sprt'], $usergroup_name ), $content,  'boxdata-normal', 'head-normal', 'boxstyle-short', 'forum-list-private'  );
  }
}

?>
