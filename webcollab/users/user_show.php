<?php
/*
  $Id$

  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>  
  
  WebCollab
  ---------------------------------------
  Based on CoreAPM by Dennis Fleurbaaij 2001/2002

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

  Show selected user details 

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

$content = '';
$no_access_project = array();
$no_access_group   = array();
$user_gid = array();

//get some stupid errors
if(empty($_GET['userid']) || ! is_numeric($_GET['userid']) ){
  error('User show', 'No userid was given' );
}

$userid = intval($_GET['userid']);

//select
$q = db_query('SELECT id, name, fullname, email, admin, private, guest, deleted FROM '.PRE.'users WHERE id='.$userid );

//get info
if( ! ($row = @db_fetch_array($q, 0 ) ) ) {
  error('User error', 'User information is not available' );
}
//test if user is private
if($row['private'] && ($row['id'] != UID ) && ( ! ADMIN ) ) {
  //get usergroups of user
  $q_group = db_query('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.$row['id'] );
  for( $i=0 ; $row_group = @db_fetch_num($q_group, $i ) ; ++$i) {
    $user_gid[$i] = $row_group[0];
  }
  //check if users are in the same usergroup
  if( ! array_intersect((array)$user_gid, (array)$GID ) ) {
    warning($lang['private_user'], $lang['private_profile'] );
  }
}

if($row['deleted'] == 't' ){
  $content .= "<b><div style=\"text-align:center\"><span class=\"red\">".$lang['user_deleted']."</span></div></b><br />";
}
$content .= "<table>".
              "<tr><td>".$lang['login'].":</td><td>".$row['name']."</td></tr>\n".
              "<tr><td>".$lang['full_name'].":</td><td>".$row['fullname']."</td></tr>\n".
              "<tr><td>".$lang['email'].":</td><td><a href=\"mailto:".$row['email']."\">".$row['email']."</a></td></tr>\n";

if($row['admin'] == "t" ){
  $content .= "<tr><td>".$lang['admin'].":</td><td>".$lang['yes']."</td></tr>\n";
}
else {
  $content .= "<tr><td>".$lang['admin'].":</td><td>".$lang['no']."</td></tr>\n";
}
if($row['private'] == 1 ) {
  $content .= "<tr><td>".$lang['private_user'].":</td><td>".$lang['yes']."</td></tr>\n";
}
else {
  $content .= "<tr><td>".$lang['private_user'].":</td><td>".$lang['no']."</td></tr>\n";
}
if($row['guest'] == 1 ) {
  $content .= "<tr><td>".$lang['guest'].":</td><td>".$lang['yes']."</td></tr>\n";
}
else{
  $content .= "<tr><td>".$lang['guest'].":</td><td>".$lang['no']."</td></tr>\n";
}

//create a list of all the groups the user is in
$q = db_query('SELECT '.PRE.'usergroups.id AS id,
                      '.PRE.'usergroups.name AS name,
                      '.PRE.'usergroups.private AS private
                      FROM '.PRE.'usergroups
                      LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.usergroupid='.PRE.'usergroups.id)
                      WHERE '.PRE.'usergroups_users.userid='.$row['id'] );

if(db_numrows($q) < 1 ) {
  $content .= "<tr><td>".$lang['usergroups'].":</td><td>".$lang['no_usergroup']."</td></tr>\n";
}
else {
  $content .= "<tr><td>".$lang['usergroups'].": </td><td>";
  $alert = "";
  $usergroups = "";
  for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ){
    //test for private usergroups
    if( ($row['private']) && (! ADMIN ) && ( ! in_array($row['id'], (array)$GID ) ) ) {
      $alert = "<br />".$lang['private_usergroup_profile'];
      continue;
    }
    $usergroups .= ($usergroups != '' ) ? ",&nbsp;".$row['name'] : $row['name'];
  }
  $content .= $usergroups.$alert;
  $content .= "</td></tr>\n";
}

//get the last login time of a user
$row = @db_result(db_query('SELECT '.$epoch.' lastaccess) FROM '.PRE.'logins WHERE user_id='.$userid ), 0, 0);
$content .=   "<tr><td>".$lang['last_time_here']."</td><td>".nicetime($row, 1 )."</td></tr>\n";

//Get the number of tasks/projects created
$row = db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE creator='.$userid ), 0, 0 );
$content .=   "<tr><td>".$lang['number_items_created']."</td><td>".$row."</td></tr>\n";

//Get the number of projects owned
$projects_owned = db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE owner='.$userid.' AND parent=0' ), 0, 0 );
$content .=   "<tr><td>".$lang['number_projects_owned']."</td><td>".$projects_owned."</td></tr>\n";

//Get the number of tasks owned
$tasks_owned = db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE owner='.$userid.' AND parent<>0' ), 0, 0 );
$content .=   "<tr><td>".$lang['number_tasks_owned']."</td><td>".$tasks_owned."</td></tr>\n";

//Get the number of tasks completed that are owned
$row = db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE owner='.$userid.' AND status=\'done\' AND parent<>0' ), 0, 0 );
$content .=   "<tr><td>".$lang['number_tasks_completed']."</td><td>".$row."</td></tr>\n";

//Get the number of forum posts
$row = db_result(db_query('SELECT COUNT(*) FROM '.PRE.'forum WHERE userid='.$userid ), 0, 0 );
$content .=   "<tr><td>".$lang['number_forum']."</td><td>".$row."</td></tr>\n";

//Get the number of files uploaded and the size
$q = db_query('SELECT COUNT(size), SUM(size) FROM '.PRE.'files WHERE uploader='.$userid );
$row = db_fetch_num($q, 0 );
$content .=   "<tr><td>".$lang['number_files']."</td><td>".$row[0]."</td></tr>\n";
$size = $row[1];

if($size == '') {
  $size = 0;
}
$content .=   "<tr><td>".$lang['size_all_files']."</td><td>".$size.$lang['bytes']."</td></tr>\n".
            "</table>";

new_box($lang['user_info'], $content );
  
  
//shows quick links to the tasks that the user owns

if( $tasks_owned + $projects_owned > 0 ) {
  $content = "<ul>";

  //get list of private projects and put them in an array for later use
  $q = db_query('SELECT id, usergroupid FROM '.PRE.'tasks WHERE parent=0 AND globalaccess=\'f\'' );

  for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
    $no_access_project[$i] = $row[0];
    $no_access_group[$i] = $row[1];
  }

  //Get the number of tasks
  $q = db_query('SELECT id, name, parent, status, '.$epoch.'finished_time) AS finished_time, usergroupid, globalaccess, projectid FROM '.PRE.'tasks WHERE owner='.$userid.' AND archive=0' );

  //show them
  for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

    //check for private usergroups
    if( (! ADMIN ) && ($row['usergroupid'] != 0 ) && ($row['globalaccess'] == 'f' ) ) {

      if( ! in_array( $row['usergroupid'], (array)$GID ) ){
        continue;
      }
    }

    //don't show tasks in private usergroup projects
    if( (! ADMIN ) && in_array($row['projectid'], (array)$no_access_project ) ) {
      $key = array_search($row['projectid'], $no_access_project );

        if( ! in_array($no_access_group[$key], (array)$GID ) ){
          continue;
        }
    }

    $status_content = '';

    //status
    switch( $row['status'] ) {
      case 'done':
        $status_content="<span class=\"green\">(".$task_state['done']."&nbsp;".nicetime($row['finished_time']).")</span>";
        break;

      case 'active':
        $status_content="<span class=\"orange\">(".$task_state['active'].")</span>";
        break;

      case 'notactive':
        $status_content="<span class=\"green\">(".$task_state['planned'].")</span>";
        break;

      case 'cantcomplete':
        $status_content="<span class=\"blue\">(".$task_state['cantcomplete']."&nbsp;".nicetime($row['finished_time']).")</span>";
        break;
    }

    if($row['parent'] == 0 ){
      //project
      $status_content ="(".$lang['project'].")";
    }

    //show the task
    $content .= "<li><a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\">".$row['name']."</a> ".$status_content."</li>\n";
  }
  $content .= "</ul>";
  new_box($lang['owned_tasks'], $content );
}  
?>