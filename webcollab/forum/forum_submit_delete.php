<?php
/*
  $Id: forum_submit.php 1704 2008-01-01 06:09:52Z andrewsimpson $

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Forum delete submission

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//
// Function for listing all posts of a task
//

function find_posts( $postid ) {

  global $post_array, $parent_array, $match_array, $index, $post_count;

  $post_array   = array();
  $parent_array = array();
  $match_array  = array();
  $parent_count = 0;
  $post_count   = 0;
  $index = 0; 

  $taskid = db_result(db_query('SELECT taskid FROM '.PRE.'forum WHERE id='.$postid ), 0, 0 );

  $q = db_query('SELECT id, parent FROM '.PRE.'forum WHERE taskid='.$taskid );

  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

    //put values into array
    $post_array[$i]['id'] = $row['id'];
    $post_array[$i]['parent'] = $row['parent'];
    ++$post_count;

    //if this is a subpost, store the parent id 
    if($row['parent'] != 0 ) {
      $parent_array[$parent_count] = $row['parent'];
      ++$parent_count;
    }
  }

  //record first match
  $match_array[$index] = $postid;
  ++$index;

  //if selected post has children (subposts), iterate recursively to find them 
  if(in_array($postid, (array)$parent_array ) ){
    find_children($postid);
  }

  return;
}

//
// List subposts (recursive function)
//

function find_children($parent ) {

  global $post_array, $parent_array, $match_array, $index, $post_count;

  for($i=0 ; $i < $post_count ; ++$i ) {

    if($post_array[$i]['parent'] != $parent ){
      continue;
    }
    $match_array[$index] = $post_array[$i]['id'];
    ++$index;

    //if this post has children (subposts), iterate recursively to find them
    if(in_array($post_array[$i]['id'], (array)$parent_array ) ){
      find_children($post_array[$i]['id'] );
    }
  }
  return;
}

//
// Perform delete of all forum messages in the thread below the selected message
//

function delete_messages($postid ) {

  global $match_array, $index;

  find_posts($postid );

  // perform the delete - delete from newest post first to oldest post last to prevent database referential errors
  for($i=0; $i < $index; ++$i ) {
    db_query('DELETE FROM '.PRE.'forum WHERE id='.$match_array[($index - 1) - $i] );

  }
  return;
}

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//check for valid form token
$token = (isset($_POST['token'])) ? (safe_data($_POST['token'])) : null;
token_check($token );

//check input
if(! @safe_integer($_POST['postid']) ) {
  error('Forum submit', 'Postid not valid' );
}
$postid = $_POST['postid'];

//initialise
$allowed = false;

//admin can delete
if(ADMIN ) {
  $allowed = true;
}
//owner of the thread can delete
elseif(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'forum WHERE userid='.UID.' AND id='.$postid ), 0, 0 ) == 1 ) {
  $allowed = true;
}
//task owner can delete
elseif(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'forum 
                                  LEFT JOIN '.PRE.'tasks ON ('.PRE.'forum.taskid='.PRE.'tasks.id) 
                                  WHERE '.PRE.'tasks.owner='.UID.' AND '.PRE.'forum.id='.$postid ), 0, 0 ) == 1 ) {

  $allowed = true;
}

if($allowed ) {
  db_begin();
  delete_messages($postid );
  db_commit();
}
else {
  error('Forum submit', 'You are not authorised to delete that post.' );
}

//go back to where this request came from
header('Location: '.BASE_URL.'tasks.php?x='.X.'&action=show&taskid='.$_POST['taskid'] );

?>
