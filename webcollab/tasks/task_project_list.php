<?php
/*
  $Id: task_project_list.php 2294 2009-08-24 09:41:39Z andrewsimpson $

  (c) 2002 - 2012 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Lists all tasks with a "0" parent (these are called projects)

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'includes/time.php' );

//
// List tasks
//

function listTasks($projectid ) {

  global $task_uncompleted, $task_projectid;
  global $task_array, $parent_array, $shown_array, $task_count, $level_count;


  //initialise variables
  $task_array   = array();
  $parent_array = array();
  $shown_array  = array();
  $check_array  = array();
  $task_count   = 0;  //counter for $task_array
  $level_count  = 1;  //number of task levels

  //search for uncompleted tasks by projectid
  $task_key = array_keys((array)$task_projectid, $projectid );

  if(sizeof($task_key) < 1 ) {
    return;
  }

  //cycle through relevant tasks
  foreach((array)$task_key as $key ) {

    $task_array[$task_count]['id']     = $task_uncompleted[($key)]['id'];
    $task_array[$task_count]['parent'] = $task_uncompleted[($key)]['parent'];
    $task_array[$task_count]['task']   = $task_uncompleted[($key)]['task'];

    //used to check for orphaned subtasks
    $check_array[($task_array[$task_count]['id'])] = 1;

    //if this is a subtask, store the parent id
    if($task_array[$task_count]['parent'] != $projectid ) {
      //store parent as array key for faster searching
      $parent_array[($task_array[$task_count]['parent'])] = 1;
    }
    ++$task_count;

    //remove used key to shorten future searches
    unset($task_projectid[$key] );
  }

  $content = "<ul class=\"ul-".$level_count."\">\n";

  //iteration for main tasks
  for($i=0 ; $i < $task_count ; ++$i ){

    //ignore items already shown
    if(isset($shown_array[($task_array[$i]['id'])]) ) {
      continue;
    }

    //ignore subtasks in this iteration, unless parent is not listed to be shown
    if(($task_array[$i]['parent'] != $projectid ) && (isset($check_array[($task_array[$i]['parent'])] ) ) )  {
      continue;
    }

    //show line
    $content .= $task_array[$i]['task'];

    //add to shown array
    $shown_array[($task_array[$i]['id'])] = 1;

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_children($task_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }

  $content .= "</ul>\n";

  return $content;
}

//
// List subtasks (recursive function)
//
function find_children($parent ) {

  global $task_array, $parent_array, $shown_array, $task_count, $level_count;

  ++$level_count;
  $content_flag = 0;

  $content = "\n<ul class=\"ul-".$level_count."\">\n";

  for($i=0 ; $i < $task_count ; ++$i ) {

    //ignore items already shown
    if(isset($shown_array[($task_array[$i]['id'])]) ) {
      continue;
    }

    //ignore tasks not directly under this parent
    if($task_array[$i]['parent'] != $parent ){
      continue;
    }

    $content .= $task_array[$i]['task'];

    //we have content to show
    $content_flag = 1;

    //add to shown array, so that we don't show it again!
    $shown_array[($task_array[$i]['id'])] = 1;

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_children($task_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }
  --$level_count;
  $content .= "</ul>\n";

  if(! $content_flag ) {
    $content = '';
  }

  return $content;
}

//
//START OF MAIN PROGRAM
//

//some inital values
$content = '';
$flag = 0;
$project_print = 0;
$task_uncompleted = array();
$task_projectid   = array();

$action = (isset($_GET['action']) && ($_GET['action'] ) ) ? 1 : 0;

//set 'active' and 'condensed' from cookies
if(isset($_COOKIE['webcollab_sticky'] ) ) {
  //format is key1=value1:key2=value2 , etc
  $cookie_var = explode(':', $_COOKIE['webcollab_sticky'] );

  foreach($cookie_var as $key_pair ) {
    $var = explode('=', $key_pair );
    $cookie_array[($var[0])] = $var[1];
  }
}

//set 'active and 'condensed' from cookie or GET
foreach(array('active_only', 'condensed' ) as $var ) {

  if(isset($_GET[$var] ) ) {
    $$var = ($_GET[$var] ) ? 1 : 0;
  }
  elseif(isset($cookie_array ) ) {
    $$var = ($cookie_array[$var] ) ? 1 : 0;
  }
  else {
    $$var = 0;
  }
}

//get config order for sorting
$q   = db_query('SELECT project_order, task_order FROM '.PRE.'config' );
$row = db_fetch_num($q, 0 );
$project_order = $row[0];
$task_order    = $row[1];

//don't get tasks if we aren't going to view them
if(! $condensed) {

  //query to get uncompleted tasks
  $q = db_query('SELECT id,
                        task_name,
                        parent,
                        projectid,
                        task_status,
                        priority,
                        '.db_epoch().' deadline ) AS due
                        FROM '.PRE.'tasks
                        WHERE task_status<>\'done\'
                        AND parent<>0 '
                        .usergroup_tail()
                        .$task_order );

  for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {

    //put values into array
    $task_uncompleted[$i]['id']     = $row[0];
    $task_uncompleted[$i]['parent'] = $row[2];

    //add suffix information
    switch( $row[4] ) {
      case 'cantcomplete':
        $suffix = "</a> &nbsp;<b><i>".$task_state['cantcomplete']."</i></b><br />";
        break;

      case 'notactive':
        $suffix = "</a> &nbsp;<i>".$task_state['task_planned']."</i><br />";
        break;

      default:
        $suffix = '</a>';
        //check if late
        if( (TIME_NOW - $row[6]) >= 86400 ) {
          $suffix = "</a> &nbsp;<span class=\"late\">".$lang['late_g']."</span><br />";
        }
        break;
    }

  //task details
  $task_uncompleted[$i]['task'] = "<li><a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row[0]."\">".$row[1].$suffix;

  //record projectid
  $task_projectid[$i] = $row[3];
  }
}

//free memory
db_free_result($q);

// query to get the projects
$q = db_query('SELECT id,
                      task_name,
                      deadline,
                      task_status,
                      '.db_epoch().' deadline) AS due,
                      priority,
                      finished_time,
                      completion_time,
                      completed
                      FROM '.PRE.'tasks
                      WHERE parent=0
                      AND archive=0 '
                      .usergroup_tail()
                      .$project_order );

//text link for 'active' switch
$content .= "<span class=\"textlink\">";

if($active_only ) {
  $content .= "[<a href=\"main.php?x=".X."&amp;active_only=0&amp;condensed=".$condensed."\">".$lang['show_all_projects']."</a>]";
}
else {
  $content .= "[<a href=\"main.php?x=".X."&amp;active_only=1&amp;condensed=".$condensed."\">".$lang['show_active_projects']."</a>]";
}

//text link for 'condensed' switch
if($condensed ) {
  $content .= "&nbsp;[<a href=\"main.php?x=".X."&amp;active_only=".$active_only."&amp;condensed=0"."\">".$lang['full_view']."</a>]";
}
else {
  $content .= "&nbsp;[<a href=\"main.php?x=".X."&amp;active_only=".$active_only."&amp;condensed=1"."\">".$lang['condensed_view']."</a>]";
}

//text link for 'printer friendly' page
if($action == 1 ) {

  $content  .= "\n[<a href=\"main.php?x=".X."&amp;active_only=".$active_only."&amp;condensed=".$condensed."\">".$lang['normal_version']."</a>]";
}
else {
  $content  .= "</span><span style=\"float: right\">".
               "<a href=\"icalendar.php?x=".X."&amp;action=all\" title=\"".$lang['icalendar']."\">".
               "<img src=\"images/calendar_link.png\" alt=\"".$lang['icalendar']."\" width=\"16\" height=\"16\" /></a>&nbsp;&nbsp;&nbsp;".
               "<a href=\"tasks.php?x=".X."&amp;active_only=".$active_only."&amp;condensed=".$condensed."&amp;action=project_print\" title=\"".$lang['print_version']."\">".
               "<img src=\"images/printer.png\" alt=\"".$lang['print_version']."\" width=\"16\" height=\"16\" /></a>";
}
$content .= "</span>\n";

//show 'project jump' select box
if($action !== 'project_print') {
  $content .= "<div class=\"projectlist\" style=\"padding-bottom : 0\">\n".project_jump(0)."</div>\n";
}

//show all projects
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

  //set project status
  $project_status = $row['task_status'];

  //make adjustments
  switch( $project_status ) {

    case 'cantcomplete':
    case 'notactive':
    //for 'active_only' skip this project
      if($active_only ) {
        continue(2);
      }
      break;

    case 'active':
    case 'nolimit':
    case 'done':
    default:
      if($row['completed'] == 100 ) {
        $project_status = 'done';
      }

      //for 'active_only' skip completed project
      if($active_only && $project_status == 'done' ) {
        continue(2);
      }
      break;
  }

  //to indicate that there are viewable projects
  $flag = 1;

  $content .= "<div class=\"projectlist\">\n";

  //show name and a link
  $content .= "<a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['id']."\"><b>".$row['task_name']."</b></a>\n";

  // Show a nice %-of-tasks-completed bar
  $content .= show_percent($row['completed'] );

  //give some details of status
  switch($project_status ) {

    case 'done':
      $content .= $task_state['completed']." (".nicedate( $row['completion_time'] ).")\n";
      break;

    case 'cantcomplete':
      $content .= "<i>".sprintf($lang['project_hold_sprt'], nicedate($row['finished_time']) )."</i><br />\n";
      $content .= "<img src=\"images/time.png\" height=\"16\" width=\"16\" alt=\"clock\" /> &nbsp; ".nicedate( $row['deadline'] )."<br />\n";
      break;

    case 'notactive':
      $content .= "<i>".$lang['project_planned']."</i><br />\n";
      break;

    case 'nolimit':
      $content .= sprintf($lang['percent_sprt'], $row['completed'])."<br />\n";
      $content .= "<i>".$lang['project_no_deadline']."</i><br />\n";
      //show subtasks that are not complete
      if(! $condensed ) {
        $content .= listTasks($row['id'] );
      }
      break;

    case 'active':
    default:
      $content .= sprintf($lang['percent_sprt'], $row['completed'] )."<br />\n";
      $content .= "<img src=\"images/time.png\" height=\"16\" width=\"16\" alt=\"clock\" /> &nbsp; ".nicedate( $row['deadline'] )." ";
      $state = ($row['due'] - TIME_NOW )/86400 ;
      if($state > 1 ) {
        $content .=  "(".sprintf($lang['due_sprt'], ceil((real)$state) ).")\n";
      }
      else if($state > 0 ) {
        $content .=  "(".$lang['tomorrow'].")\n";
      }
      else {
        switch( -ceil((real)$state) ) {
          case 0:
            $content .=  "<span class=\"green\">(".$lang['due_today'].")</span><br />\n";
            break;

          case 1:
            $content .= "<span class=\"red\">(".$lang['overdue_1'].")</span><br />\n";
            break;

          default:
            $content .= "<span class=\"red\">(".sprintf($lang['overdue_sprt'], -ceil((real)$state) ).")</span><br />\n";
            break;
        }
      }

      //show subtasks that are not complete
      if(! $condensed ) {
        $content .= listTasks($row['id'] );
      }
      break;
    }
  //end list
  $content .= "</div>";
}

//check if there are projects
if($i == 0 ) {
  $content = "<div style=\"text-align : center\"><a href=\"tasks.php?x=".X."&amp;action=add\">".$lang['add_project']."</a></div>\n";
  new_box($lang['no_projects'], $content );
}
else {
  if($flag != 1 ) {
    $content .= "<div style=\"text-align : center\">".$lang['no_allowed_projects']."</div>\n";
  }
  new_box($lang['projects'], $content );
}

?>
