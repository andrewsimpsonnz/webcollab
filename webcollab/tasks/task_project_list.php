<?php
/*
  $Id$

  (c) 2002 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
  global $task_array, $parent_array, $shown_array, $shown_count, $task_count;

  //initialise variables
  $task_array   = array();
  $parent_array = array();
  $shown_array  = array();
  $shown_count  = 0;  //counter for $shown_array
  $task_count   = 0;  //counter for $task_array

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

    //if this is a subtask, store the parent id
    if($task_array[$task_count]['parent'] != $projectid ) {
      //store parent as array key for faster searching
      $parent_array[($task_array[$task_count]['parent'])] = 1;
    }
    ++$task_count;

    //remove used key to shorten future searches
    unset($task_projectid[$key] );
  }

  $content = "<ul>\n";

  //iteration for main tasks
  for($i=0 ; $i < $task_count ; ++$i ){

    //ignore subtasks in this iteration
    if($task_array[$i]['parent'] != $projectid ){
      continue;
    }
    //show line
    $content .= $task_array[$i]['task'];
    $shown_array[$shown_count] = $task_array[$i]['id'];
    ++$shown_count;

    //if this task has children (subtasks), iterate recursively to find them
    if(isset($parent_array[($task_array[$i]['id'])] ) ) {
      $content .= find_children($task_array[$i]['id'] );
    }
    $content .= "</li>\n";
  }

  //look for any orphaned tasks, and show them too
  if($task_count != $shown_count ) {
    for($i=0 ; $i < $task_count ; ++$i ) {
      if(! in_array($task_array[$i]['id'], (array)$shown_array ) ) {
        $content .= $task_array[$i]['task']."</li>\n";
      }
    }
  }
  $content .= "</ul>\n";

  return $content;
}

//
// List subtasks (recursive function)
//
function find_children($parent ) {

  global $task_array, $parent_array, $shown_array, $task_count, $shown_count;

  $content = "<ul>\n";

  for($i=0 ; $i < $task_count ; ++$i ) {

    //ignore tasks not directly under this parent
    if($task_array[$i]['parent'] != $parent ){
      continue;
    }
    $content .= $task_array[$i]['task'];
    $shown_array[$shown_count] = $task_array[$i]['id'];
    ++$shown_count;

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
//START OF MAIN PROGRAM
//

//some inital values
$content = '';
$flag = 0;
$project_print = 0;
$task_uncompleted = array();
$task_projectid   = array();

$active_only = (isset($_GET['active']) )    ? $_GET['active']    : 0;
$condensed   = (isset($_GET['condensed']) ) ? $_GET['condensed'] : 0;
$action      = (isset($_GET['action']) )    ? $_GET['action']    : 0;

//get config order for sorting
$q   = db_query('SELECT project_order, task_order FROM '.PRE.'config' );
$row = db_fetch_num($q, 0 );
$project_order = $row[0];
$task_order    = $row[1];

//set the usergroup permissions on queries
$tail = usergroup_tail();

//don't get tasks if we aren't going to view them
if(! $condensed) {

  //query to get uncompleted tasks
  $q = db_query('SELECT id,
                        name,
                        parent,
                        projectid,
                        status,
                        '.$epoch.' deadline ) AS due
                        FROM '.PRE.'tasks
                        WHERE status<>\'done\'
                        AND parent<>0 '
                        .$tail
                        .$task_order );

  for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {

    //put values into array
    $task_uncompleted[$i]['id']     = $row[0];
    $task_uncompleted[$i]['parent'] = $row[2];

    //add suffix information
    switch( $row[4] ) {
      case 'cantcomplete':
        $suffix = "</a> &nbsp;<b><i>".$task_state['cantcomplete']."</i></b><br />\n";
        break;

      case 'notactive':
        $suffix = "</a> &nbsp;<i>".$task_state['task_planned']."</i><br />\n";
        break;

      default:
        $suffix = '</a>';
        //check if late
        if( (TIME_NOW - $row[5]) >= 86400 ) {
          $suffix = "</a> &nbsp;<span class=\"late\">".$lang['late_g']."</span><br />\n";
        }
        break;
    }

  //task details
  $task_uncompleted[$i]['task'] = "<li><a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row[0]."\">".$row[1].$suffix;

  //record projectid
  $task_projectid[$i] = $row[3];
  }
}

//free memory
db_free_result($q);

// query to get the projects
$q = db_query('SELECT id,
                      name,
                      deadline,
                      status,
                      '.$epoch.' deadline) AS due,
                      finished_time,
                      completion_time,
                      completed
                      FROM '.PRE.'tasks
                      WHERE parent=0
                      AND archive=0 '
                      .$tail
                      .$project_order );

//check if there are projects
if(db_numrows($q) < 1 ) {
  $content .= "<div style=\"text-align : center\"><a href=\"tasks.php?x=".$x."&amp;action=add\">".$lang['add_project']."</a></div>\n";
  new_box($lang['no_projects'], $content );
  return;
}

//text link for 'active' switch
$content .= "<table><tr><td>\n".
            "<span class=\"textlink\">";
if($active_only ) {
  $content .= "[<a href=\"main.php?x=".$x."&amp;active=0&amp;condensed=".$condensed."\">".$lang['show_all_projects']."</a>]";
}
else {
  $content .= "[<a href=\"main.php?x=".$x."&amp;active=1&amp;condensed=".$condensed."\">".$lang['show_active_projects']."</a>]";
}

//text link for 'condensed' switch
if($condensed ) {
  $content .= "&nbsp;[<a href=\"main.php?x=".$x."&amp;active=".$active_only."&amp;condensed=0"."\">".$lang['full_view']."</a>]";
}
else {
  $content .= "&nbsp;[<a href=\"main.php?x=".$x."&amp;active=".$active_only."&amp;condensed=1"."\">".$lang['condensed_view']."</a>]";
}

//text link for 'printer friendly' page
if($action === "project_print" ) {
  $content  .= "\n[<a href=\"main.php?x=".$x."&amp;active=".$active_only."&amp;condensed=".$condensed."\">".$lang['normal_version']."</a>]";
}
else {
  $content  .= "</span></td>\n<td style=\"text-align : right\"><span class=\"textlink\">".
               "<a href=\"icalendar.php?x=".$x."&amp;action=all\" title=\"".$lang['icalendar']."\">".
               "<img src=\"images/calendar_link.png\" alt=\"".$lang['icalendar']."\" width=\"16\" height=\"16\" /></a>&nbsp;&nbsp;&nbsp;".
               "<a href=\"tasks.php?x=".$x."&amp;active=".$active_only."&amp;condensed=".$condensed."&amp;action=project_print\" title=\"".$lang['print_version']."\">".
               "<img src=\"images/printer.png\" alt=\"".$lang['print_version']."\" width=\"16\" height=\"16\" /></a>";
}
$content .= "</span></td></tr>\n</table>\n";

//setup main table
$content .= "<table>\n";

//show 'project jump' select box
if($action !== 'project_print') {
  $content .= "<tr><td class=\"projectlist\" style=\"padding-bottom : 0px\">\n".project_jump(0)."</td></tr>\n";
}

//show all projects
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

  //set project status
  $project_status = $row['status'];

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

  $content .= "<tr><td class=\"projectlist\">\n";

  //show name and a link
  $content .= "<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\"><b>".$row['name']."</b></a>\n";

  // Show a nice %-of-tasks-completed bar
  $content .= show_percent($row['completed'] );

  //give some details of status
  switch($project_status ) {

    case 'done':
      $content .= $task_state['completed']." (".nicedate( $row['completion_time'] ).")\n";
      break;

    case 'cantcomplete':
      $content .= "<i>".sprintf($lang['project_hold_sprt'], nicedate($row['finished_time']) )."</i><br />\n";
      $content .= "<img src=\"images/clock.gif\" height=\"9\" width=\"9\" alt=\"clock\" /> &nbsp; ".nicedate( $row['deadline'] )."<br />\n";
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
  $content .= "</td></tr>\n";
}

$content .= "</table>\n";

if($flag != 1 ) {
  $content .= "<div style=\"text-align : center\">".$lang['no_allowed_projects']."</div>\n";
}

new_box($lang['projects'], $content );

?>
