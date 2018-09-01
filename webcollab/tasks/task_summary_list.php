<?php
/*

  $Id: task_summary_list.php 2310 2009-09-03 05:46:47Z andrewsimpson $

  (c) 2002 Marshall Rose (attributed)
  (c) 2002 - 2015 Andrew Simpson

  WebCollab
  ---------------------------------------

  Based on file originally written as part of Core Lan Org by Marshall Rose 2002.

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

  Lists all tasks in a quick summary fashion

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'includes/time.php' );

//initialise variables
$content = '';
$user_array = array();
$taskgroups_array = array();
$usergroups_array = array();
$parent_array = array();
$no_access_project = array();

//
// Creates stored statement for main function
//
function project_query($tail, $equiv='' ) {

  $q = db_prepare('SELECT '.PRE.'tasks.id AS id,
                          '.PRE.'tasks.parent AS parent,
                          '.PRE.'tasks.task_name AS taskname,
                          '.PRE.'tasks.deadline AS deadline,
                          '.PRE.'tasks.task_status AS task_status,
                          '.PRE.'tasks.priority AS priority,
                          '.PRE.'tasks.task_owner AS task_owner,
                          '.PRE.'tasks.taskgroupid AS taskgroupid,
                          '.PRE.'tasks.usergroupid AS usergroupid,
                          '.PRE.'tasks.projectid AS projectid,
                          '.PRE.'tasks.completed AS completed,
                          '.db_epoch().' deadline) AS due,
                          '.db_epoch().' '.PRE.'tasks.edited) AS edited,
                          '.db_epoch().' '.PRE.'tasks.lastforumpost) AS lastpost,
                          '.db_epoch().' '.PRE.'tasks.lastfileupload) AS lastfileupload,
                          '.db_epoch().' '.PRE.'seen.seen_time) AS last_seen
                          '.$equiv.'
                          FROM '.PRE.'tasks
                          LEFT JOIN '.PRE.'seen ON ('.PRE.'tasks.id='.PRE.'seen.taskid AND '.PRE.'seen.userid='.UID.')
                          '.$tail );

  return $q;
}

//
// MAIN FUNCTION
//
function project_summary($q, $depth=0, $input='' ) {
  global $GID, $lang, $task_state;
  global $user_array, $usergroups_array, $taskgroups_array, $parent_array;
  global $no_access_project;
  global $sortby;
  global $q2;

  //reset variables
  $result = '';
  $task_array = array();
  $result_array = array();

  db_execute($q, $input );

  //store retrieved data rows into an array to allow new database calls to be made on same stored statement
  for($i = 0; $result_row = db_fetch_array($q, $i ); ++$i ) {
    $result_array[$i] = $result_row;
  }

  //cycle though task data retrieved from database and process
  foreach($result_array as $row ) {

    //don't show tasks in closed usergroup projects
    if( (! ADMIN ) && isset($no_access_project[($row['projectid'])] ) ) {
      if(! isset($GID[ ($no_access_project[($row['projectid'])] ) ] ) ) {
        continue;
      }
    }

    //flags column
    $alink = "<a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['id']."\">";
    $f1 = ''; $f2 = ''; $f3 = '';

    if(! $row['last_seen'] ) {
      $f1 = $alink.'C</a>';
    }
    else {
      if( ($row['last_seen'] - $row['edited'] ) < 0 ) {
        $f1 = $alink.'M</a>';
      }

      if( ($row['last_seen'] - $row['lastpost'] ) < 0 ) {
        $f2 = $alink.'P</a>';
      }

      if( ($row['last_seen'] - $row['lastfileupload'] ) < 0 ) {
        $f3 = $alink.'F</a>';
      }
    }

    //deadline column
    $due = round( ($row['due'] - TIME_NOW )/86400 );

    if( $due < 0 ) {
      $color = 'red';
    }
    elseif( $due == 0 ) {
      $color = 'green';
    }
    else {
      $color = '';
    }

    //status column
    if( ($row['parent'] == 0 ) ) {

      switch($row['task_status'] ) {
        case 'notactive':
          $color = '';
          $date = '';
          $status =  $task_state['task_planned'];
          break;

        case 'nolimit':
          $color = '';
          $date = '';
          $status = '';
          break;

        case 'cantcomplete':
          $color = '';
          $date = '';
          $status =  "<span class=\"blue\">".$task_state['cantcomplete']."</span>";
          break;

        default:
          $date = nicedate($row['deadline'] );
          if($row['completed'] == 100 ) {
            $color = 'green';
            $status = $task_state['done'];
          }
          else {
            $status = $lang['project'] ;
          }
          break;
      }
    }
    else {

      switch( $row['task_status'] ) {
        case 'done':
          $color = '';
          $date = nicedate($row['deadline'] );
          $status =  "<span class=\"green\">".$task_state['done']."</span>";
          break;

        case 'created':
          $date = nicedate($row['deadline'] );
          $status =  $task_state['new'];
          break;

        case 'active':
          $date = nicedate($row['deadline'] );
          $color = 'orange';
          $status =  $task_state['task_active'];
          break;

        case 'notactive':
          $color = 'grey';
          $date = '';
          $status =  $task_state['task_planned'];
          break;

        case 'cantcomplete':
          $color = '';
          $date = '';
          $status =  "<span class=\"blue\">".$task_state['cantcomplete']."</span>";
          break;

        default:
          $date = nicedate($row['deadline'] );
          $status =  "<span class=\"orange\">".$row['task_status']."</span>";
          break;
      }
    }

    //priority column
    if( ($row['parent'] == 0 ) ) {

      switch($row['priority'] ) {
        case 0:
          $date = nicedate($row['deadline'] );
          $priority =  $task_state['dontdo'];
          break;

        case 1:
          $date = nicedate($row['deadline'] );
          $priority =  $task_state['low'];
          break;

        case 2:
          $date = nicedate($row['deadline'] );
          $priority =  "<span class=\"blue\">".$task_state['normal']."</span>";
          break;

        case 3:
          $date = nicedate($row['deadline'] );
          $priority =  "<span class=\"orange\">".$task_state['high']."</span>";
          break;

        case 4:
          $date = nicedate($row['deadline'] );
          $priority =  "<span class=\"red\">".$task_state['yesterday']."</span>";
          break;

        default:
          $date = nicedate($row['normal'] );
          if($row['completed'] == 100 ) {
            $color = 'green';
            $priority = $task_state['normal'];
          }
          else {
            $priority = $lang['project'] ;
          }
          break;
      }
    }
    else {

      switch( $row['priority'] ) {
        case 0:
          $date = nicedate($row['deadline'] );
          $priority =  $task_state['dontdo'];
          break;

        case 1:
          $date = nicedate($row['deadline'] );
          $priority =  $task_state['low'];
          break;

        case 2:
          $date = nicedate($row['deadline'] );
          $priority =  "<span class=\"green\">".$task_state['normal']."</span>";
          break;

        case 3:
          $date = nicedate($row['deadline'] );
          $priority =  "<span class=\"orange\">".$task_state['high']."</span>";
          break;

        case 4:
          $date = nicedate($row['deadline'] );
          $priority =  "<span class=\"red\">".$task_state['yesterday']."</span>";
          break;

        default:
          $date = nicedate($row['deadline'] );
          $priority =  "<span class=\"orange\">".$row['priority']."</span>";
          break;
      }
    }

    //owner column
    if( $row['task_owner'] == 0 ) {
      switch( $row['task_status'] ) {
        case 'created':
        case 'notactive':
        case 'nolimit':
           $owner = $lang['nobody'];
           break;

        default:
           $owner = "<span class=\"red\">".$lang['nobody']."</span>";
           break;
      }
    }
    else {
     $owner = "<a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['task_owner']."\">".$user_array[($row['task_owner'])]."</a>";
    }

    //group column
    switch($sortby ) {
      case 'taskgroupid':
        if(! $row['taskgroupid'] ) {
          $group = $lang['none'];
        }
        else {
          $group = $taskgroups_array[($row['taskgroupid'])];
       }
       break;

      case 'usergroupid':
      default:
        if(! $row['usergroupid'] ) {
          $group = $lang['none'];
        }
        else {
          $group = $usergroups_array[($row['usergroupid'])];
       }
       break;
    }

    if( ($row['parent'] == 0 ) && ($depth >= 0 ) ) {
      $projectrow = " class=\"projectrow\"";
    }
    else {
      $projectrow = '';
    }

    //Build up the page columns for display.  Starting with the flags
    $result .= "<tr".$projectrow."><td>".$f1."</td><td>".$f2."</td><td>".$f3."</td>\n<td><small>";

    if($color != '' ) {
      $result .= "<span class=\"".$color."\">";
    }

    //Add deadline column
    if ($due <= 360) {
      $result .= $date;
    }
    else {
      $result .= $lang['future'];
    }

    if($color != '' ) {
      $result .= "</span>";
    }

    //Then add the status, owner and group columns
    $result .= "</small></td>\n<td>".$status."</td><td>".$priority."</td><td>".$owner."</td><td>".$group."</td>\n<td>";

    //Tab out children tasks
    for($j=1; $j < $depth; ++$j ) $result .= "&nbsp;&nbsp;&nbsp;";

    //task column
    $result .= $alink;
    if( $row['parent'] == 0 ) {
      $result .= "<b>".$row['taskname']."</b>";
    }
    else {
      $result .= $row['taskname'];
    }
    $result .= "</a>";

    //show graphical taskbar
    if( ($row['parent'] == 0 ) && ($depth >= 0 ) ) {
      if($row['completed'] > 0 ) {
       $result .= "\n<table><tr><td class=\"greenbar\" style=\"height: 2px; width :".($row['completed']*2)."px\"></td><td class=\"redbar\" style=\"height: 2px; width :".(200-($row['completed']*2))."px\"></td></tr></table>";

      }
      else {
        $result .= "\n<table><tr><td class=\"redbar\" style=\"height: 2px; width : 200px\"></td></tr></table>";

      }
    }

    $result .= "</td></tr>\n";

    //add child tasks by recursive function
    if( $depth >= 0 ) {
      //see if task is in parent cache
      if(isset($parent_array[($row['id'])] ) ) {
        //add child tasks
        $result .= project_summary($q2, $depth+1, array($row['id'] ) );
      }
    }
  }

  return $result;
}

//
// MAIN PROGRAM starts here
//
if(isset($_GET['sortby']) ) {
  $sortby = safe_data($_GET['sortby'] );
}
else {
  $sortby = '';
}

// --- Caching for commonly used database calls

//query to get users, then cache results
$q = db_query('SELECT id, fullname FROM '.PRE.'users' );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $user_array[($row[0])] = $row[1];
}

//query to get taskgroups, then cache results
$q = db_query('SELECT id, group_name FROM '.PRE.'taskgroups' );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $taskgroups_array[($row[0])] = $row[1];
}

//query to get usergroups, then cache results
$q = db_query('SELECT id, group_name FROM '.PRE.'usergroups' );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $usergroups_array[($row[0])] = $row[1];
}

//find all parent-tasks, then cache results
$q = db_query('SELECT DISTINCT parent FROM '.PRE.'tasks' );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  $parent_array[($row[0])] = $row[0];
}

//get list of private projects and put them in an array for later use
$q = db_query('SELECT id, usergroupid FROM '.PRE.'tasks WHERE parent=0 AND globalaccess=\'f\'' );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
  //array key is projectid, array variable is usergroupid
  $no_access_project[($row[0])] = $row[1];
}

// --- End of caching

//text link for 'printer friendly' page
if(isset($_GET['action']) && $_GET['action'] == 'summary_print' ) {
  $content  = "<p><span class=\"textlink\">[<a href=\"tasks.php?x=".X."&amp;action=summary&amp;sortby=".$sortby."\">".$lang['normal_version']."</a>]</span></p>\n";
}
else {
  $content  = "<div style=\"text-align: right\"><a href=\"tasks.php?x=".X."&amp;action=summary_print&amp;sortby=".$sortby."\" title=\"".$lang['print_version']."\">".
              "<img src=\"images/printer.png\" alt=\"".$lang['print_version']."\" width=\"16\" height=\"16\" /></a></div>\n";
}

$content .= "<table class=\"celldata\">\n".
            "<tr><td colspan=\"3\">".
            "<small><a href=\"help/help_language.php?item=summarypage&amp;type=help&amp;lang=".LOCALE_USER."\" ".
            "onclick=\"window.open('help/help_language.php?item=summarypage&amp;type=help&amp;lang=".LOCALE_USER."'); return false\"><b>".$lang['flags']."</b></a></small></td>\n".
            "<td><small><a href=\"tasks.php?x=".X."&amp;action=summary&amp;sortby=deadline\"><b>".$lang['deadline']."</b></a></small></td>\n".
            "<td><small><a href=\"tasks.php?x=".X."&amp;action=summary&amp;sortby=status\"><b>".$lang['status']."</b></a></small></td>\n".
            "<td><small><a href=\"tasks.php?x=".X."&amp;action=summary&amp;sortby=priority\"><b>".$lang['priority']."</b></a></small></td>\n".
            "<td><small><a href=\"tasks.php?x=".X."&amp;action=summary&amp;sortby=owner\"><b>".$lang['owner']."</b></a></small></td>\n".
            "<td><small><a href=\"tasks.php?x=".X."&amp;action=summary&amp;sortby=";

switch($sortby ) {
  case 'taskgroupid':
    $content .= 'usergroupid';
    break;

  case 'usergroupid':
  default:
    $content .= 'taskgroupid';
    break;
}

$content .= "\">".
            "<b>".$lang['group']."</b></a></small></td>\n".
            "<td><small><a href=\"tasks.php?x=".X."&amp;action=summary&amp;sortby=taskname\">".
            "<b>".$lang['task']."</b></a></small></td></tr>\n";

//set defaults
$group_tail = 'WHERE archive=0'.usergroup_tail();

// tail end of SQL query
switch($sortby ) {
  case 'deadline':
    $q1 = project_query($group_tail.' ORDER BY deadline,taskname' );
    $q2 = '';
    $depth = -1;
    $suffix = $lang['by_deadline'];
    break;

  case 'status':
    $q1 = project_query($group_tail.' ORDER BY task_status,deadline,taskname' );
    $q2 = '';
    $depth = -1;
    $suffix = $lang['by_status'];
    break;

  case 'priority':
    $q1 = project_query($group_tail.' ORDER BY priority,task_status,deadline,taskname' );
    $q2 = '';
    $depth = -1;
    $suffix = $lang['by_priority'];
    break;

  case 'owner':
    $q1 = project_query('LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.task_owner) '.$group_tail.' ORDER BY username,deadline,taskname', ', '.PRE.'users.fullname AS username' );
    $q2 = '';
    $depth = -1;
    $suffix = $lang['by_owner'];
    break;

  case 'usergroupid':
    $q1 = project_query('LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'tasks.usergroupid) '.$group_tail.' ORDER BY usergroupname,deadline,task_name', ', '.PRE.'usergroups.group_name AS usergroupname' );
    $q2 = '';
    $depth = -1;
    $suffix = $lang['by_usergroup'];
    break;

  case 'taskgroupid':
    $q1 = project_query('LEFT JOIN '.PRE.'taskgroups ON ('.PRE.'taskgroups.id='.PRE.'tasks.taskgroupid) '.$group_tail.' ORDER BY taskgroupname,deadline,taskname', ', '.PRE.'taskgroups.group_name AS taskgroupname' );
    $q2 = '';
    $depth = -1;
    $suffix = $lang['by_taskgroup'];
    break;

  case 'taskname':
    $q1 = project_query($group_tail.' ORDER BY taskname,deadline' );
    $q2 = '';
    $depth = -1;
    $suffix = '';
    break;

  default:
    $q1 = project_query($group_tail.'AND parent=0 ORDER BY taskname' );
    $q2 = project_query('WHERE '.PRE.'tasks.parent=?'.usergroup_tail().' ORDER BY taskname' );
    $depth = 0;
    $suffix = '';
    break;
}

//assemble main page
$content .= project_summary($q1, $depth );

//end page
$content .= "</table><br /><br />\n";

new_box( $lang['projects'].$suffix, $content );

?>
