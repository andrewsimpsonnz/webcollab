<?php
/*
  $Id: user_show.php 2297 2009-08-24 09:45:18Z andrewsimpson $

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
if(! @safe_integer($_GET['userid']) ){
  error('User show', 'No userid was given' );
}

$userid = $_GET['userid'];

//select
$q = db_prepare('SELECT id, user_name, fullname, email, user_admin, private, guest, deleted FROM '.PRE.'users WHERE id=? LIMIT 1' );
db_execute($q, array($userid ) );

//get info
if( ! ($row = @db_fetch_array($q, 0 ) ) ) {
  error('User error', 'User information is not available' );
}
//test if user is private
if($row['private'] && ($row['id'] != UID ) && ( ! ADMIN ) ) {
  //get usergroups of user
  $q_group = db_prepare('SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid=? LIMIT 1' );
  db_execute($q_group, array($row['id'] ) );

  for($i=0 ; $row_group = @db_fetch_num($q_group, $i ) ; ++$i ) {
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

$content .= "<table class=\"celldata\">".
            "<tr class=\"grouplist\"><td>".$lang['login'].":</td><td>".$row['user_name']."</td></tr>\n".
            "<tr class=\"grouplist\"><td>".$lang['full_name'].":</td><td>".$row['fullname']."</td></tr>\n".
            "<tr class=\"grouplist\"><td>".$lang['email'].":</td><td><a href=\"mailto:".$row['email']."\">".$row['email']."</a></td></tr>\n";

if($row['user_admin'] == "t" ){
  $content .= "<tr class=\"grouplist\"><td>".$lang['admin'].":</td><td>".$lang['yes']."</td></tr>\n";
}
else {
  $content .= "<tr class=\"grouplist\"><td>".$lang['admin'].":</td><td>".$lang['no']."</td></tr>\n";
}
if($row['private'] == 1 ) {
  $content .= "<tr class=\"grouplist\"><td>".$lang['private_user'].":</td><td>".$lang['yes']."</td></tr>\n";
}
else {
  $content .= "<tr class=\"grouplist\"><td>".$lang['private_user'].":</td><td>".$lang['no']."</td></tr>\n";
}
if($row['guest'] == 1 ) {
  $content .= "<tr class=\"grouplist\"><td>".$lang['guest'].":</td><td>".$lang['yes']."</td></tr>\n";
}
else {
  $content .= "<tr class=\"grouplist\"><td>".$lang['guest'].":</td><td>".$lang['no']."</td></tr>\n";
}

//create a list of all the groups the user is in
$q = db_prepare('SELECT '.PRE.'usergroups.id AS id,
                      '.PRE.'usergroups.group_name AS group_name,
                      '.PRE.'usergroups.private AS private
                      FROM '.PRE.'usergroups
                      LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.usergroupid='.PRE.'usergroups.id)
                      WHERE '.PRE.'usergroups_users.userid=?' );
db_execute($q, array($row['id'] ) );

$content .= "<tr class=\"grouplist\"><td>".$lang['usergroups'].": </td><td>";
$alert = '';
$usergroups = '';
$group_content = '';
for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ){
  //test for private usergroups
  if( ($row['private']) && (! ADMIN ) && ( ! isset($GID[($row['id'])] ) ) ) {
    $alert = "<br />".$lang['private_usergroup_profile'];
    continue;
  }
  $usergroups .= ($usergroups != '' ) ? ",&nbsp;".$row['group_name'] : $row['group_name'];
}
$group_content .= $usergroups.$alert;
$group_content .= "</td></tr>\n";

//check if any usergroups were found
if($i == 0 ) {
  $content .= $lang['no_usergroup']."</td></tr>\n";
}
else {
  $content .= $group_content;
}

//get the last login time of a user
$q = db_prepare('SELECT lastaccess FROM '.PRE.'logins WHERE user_id=? LIMIT 1' );
db_execute($q, array($userid ) );
$row = @db_result($q, 0, 0);
$content .= "<tr class=\"grouplist\"><td>".$lang['last_time_here']."</td><td>".nicetime($row)."</td></tr>\n";

//Get the number of tasks/projects created
$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE creator=?' );
db_execute($q, array($userid ) );
$row = db_result($q, 0, 0 );
$content .= "<tr class=\"grouplist\"><td>".$lang['number_items_created']."</td><td>".$row."</td></tr>\n";

//Get the number of projects owned
$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE task_owner=? AND parent=0' );
db_execute($q, array($userid ) );
$projects_owned = db_result($q, 0, 0 );
$content .= "<tr class=\"grouplist\"><td>".$lang['number_projects_owned']."</td><td>".$projects_owned."</td></tr>\n";

//Get the number of tasks owned
$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE task_owner=? AND parent<>0' );
db_execute($q, array($userid ) );
$tasks_owned = db_result($q, 0, 0 );
$content .= "<tr class=\"grouplist\"><td>".$lang['number_tasks_owned']."</td><td>".$tasks_owned."</td></tr>\n";

//Get the number of tasks completed that are owned
$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'tasks WHERE task_owner=? AND task_status=\'done\' AND parent<>0' );
db_execute($q, array($userid ) );
$row = db_result($q, 0, 0 );
$content .= "<tr class=\"grouplist\"><td>".$lang['number_tasks_completed']."</td><td>".$row."</td></tr>\n";

//Get the number of forum posts
$q = db_prepare('SELECT COUNT(*) FROM '.PRE.'forum WHERE userid=?' );
db_execute($q, array($userid ) );
$row = db_result($q, 0, 0 );

$content .= "<tr class=\"grouplist\"><td>".$lang['number_forum']."</td><td>".$row."</td></tr>\n";

//Get the number of files uploaded and the size
$q = db_prepare('SELECT COUNT(file_size), SUM(file_size) FROM '.PRE.'files WHERE uploader=?' );
db_execute($q, array($userid ) );
$row = db_fetch_num($q, 0 );
$content .= "<tr class=\"grouplist\"><td>".$lang['number_files']."</td><td>".$row[0]."</td></tr>\n";

//show files
$content .= "<tr class=\"grouplist\"><td>".$lang['size_all_files']."</td><td>".nice_size($row[1] )."</td></tr>\n".
            "</table>\n";

new_box($lang['user_info'], $content );


//shows quick links to the tasks that the user owns

if( $tasks_owned + $projects_owned > 0 ) {
  $content = "<ul class=\"ul-1\">";

  //get list of private projects and put them in an array for later use
  $q = db_query('SELECT id, usergroupid FROM '.PRE.'tasks WHERE parent=0 AND globalaccess=\'f\'' );

  for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
    //array key is projectid, array variable is usergroupid
    $no_access_project[($row[0])] = $row[1];
  }

  //Get the number of tasks
  $q = db_prepare('SELECT id, task_name, parent, task_status, finished_time AS finished_time, usergroupid, globalaccess, projectid FROM '.PRE.'tasks WHERE task_owner=? AND archive=0' );
  db_execute($q, array($userid ) );

  //show them
  for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

    //check for private usergroups
    if( (! ADMIN ) && ($row['usergroupid'] != 0 ) && ($row['globalaccess'] == 'f' ) ) {

      if( ! isset($GID[($row['usergroupid'])] ) ) {
        continue;
      }
    }

    //don't show tasks in private usergroup projects
    if((! ADMIN ) && isset($no_access_project[($row['projectid'])] ) ) {

        //$no_access_project[($row['projectid'])] == 'usergroupid' of project
        if(! isset($GID[ ($no_access_project[($row['projectid'])] ) ] ) ) {
          continue;
        }
    }

    $status_content = '';

    //status
    switch( $row['task_status'] ) {
      case 'done':
        $status_content = "<span class=\"green\">(".$task_state['done']."&nbsp;".nicedate($row['finished_time']).")</span>";
        break;

      case 'active':
        $status_content = "<span class=\"orange\">(".$task_state['active'].")</span>";
        break;

      case 'notactive':
        $status_content = "<span class=\"green\">(".$task_state['planned'].")</span>";
        break;

      case 'cantcomplete':
        $status_content = "<span class=\"blue\">(".$task_state['cantcomplete']."&nbsp;".nicedate($row['finished_time']).")</span>";
        break;
    }

    if($row['parent'] == 0 ){
      //project
      $status_content = "(".$lang['project'].")";
    }

    //show the task
    $content .= "<li><a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['id']."\">".$row['task_name']."</a> ".$status_content."</li>\n";
  }
  $content .= "</ul>\n";
  
  new_box($lang['owned_tasks'], $content );
}

?>
