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

  Lists all tasks and subtasks

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
include_once(BASE.'includes/details.php' );

//init values
$content = '';

//
// Functionalised recursive query
//
function list_tasks($parent ) {

  global $x, $GID, $parentid, $parent_array, $epoch, $lang;
  global $taskgroup_flag, $task_state, $ul_flag;
  global $no_group, $task_order;

  //init values
  $stored_groupname = NULL;
  $this_content = '';
  $ul_flag = 0;
  $tz_offset = (TZ * 3600) - TZ_OFFSET;
    
  //query to get the children for this taskid
  $q = db_query('SELECT '.PRE.'tasks.id AS id,
                  '.PRE.'tasks.name AS name,
                  '.PRE.'tasks.status AS status,
                  '.$epoch.' '.PRE.'tasks.finished_time) AS finished_time,
                  '.$epoch.' '.PRE.'tasks.deadline) AS due,
                  '.$epoch.' '.PRE.'tasks.edited) AS edited,
                  '.$epoch.' '.PRE.'tasks.lastforumpost) AS lastpost,
                  '.$epoch.' '.PRE.'tasks.lastfileupload) AS lastfileupload,
                  '.PRE.'tasks.globalaccess AS globalaccess,
                  '.PRE.'tasks.usergroupid AS usergroupid,
                  '.PRE.'users.fullname AS username,
                  '.PRE.'users.id AS userid,
                  '.PRE.'taskgroups.name AS groupname,
                  '.PRE.'taskgroups.description AS groupdescription
                  FROM '.PRE.'tasks
                  LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.owner)
                  LEFT JOIN '.PRE.'taskgroups ON ('.PRE.'taskgroups.id='.PRE.'tasks.taskgroupid)
                  WHERE '.PRE.'tasks.parent='.$parent.'
                  ORDER BY '.$no_group.' groupname, '.$task_order );

  //check for any tasks.  If no tasks end recursive function
  if(db_numrows($q) < 1 ) {
    return;
  }

  //determine if the first line will be a task listing or a taskgroup name
  //if it's a taskgroup name we don't need to set the leading <ul>
  if( ($taskgroup_flag == 1 ) && ($parent == $parentid ) ) {
    $this_content .= '';
  }
  else {
    $this_content .= "<ul>";
  }
  
  //show all tasks
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

    //check for private usergroups
    if( (! ADMIN ) && ($row['usergroupid'] != 0 ) && ($row['globalaccess'] == 'f' ) ) {

      if( ! in_array( $row['usergroupid'], (array)$GID ) ) {
        //recursive search if the subtask is listed in parent_array (it has children then)
        if(in_array( $row['id'], $parent_array, FALSE) ) {
          $this_content .= list_tasks( $row['id']);
          $this_content .= "\n</ul></li>\n";
        }
        continue;
      }
    }


    //check if there are taskgroups set, and if this is the first layer of tasks
    if( ($taskgroup_flag == 1 ) && ($parent == $parentid ) ) {

      //set taskgroup name, or 'Uncategorised' if none
      if( $row['groupname'] == NULL ) {
        $groupname = $lang['uncategorised'];
      }
      else {
        $groupname = $row['groupname'];
      }
      
      //check if taskgroup has changed from last iteration
      if($stored_groupname != $groupname ) {

        //don't need </ul> before first taskgroup heading (no <ul> is set)
        if($stored_groupname != NULL ) {
          $this_content .= "</ul>\n";
        }

        //show taskgroup name
        $this_content .= "<p><b>".$groupname."</b>";

        //add taskgroup description
        if($row['groupdescription'] != NULL ) {
          $this_content .=  "&nbsp;<i>( ".$row['groupdescription']." )</i>";
        }
        
        $this_content .= "</p>\n";
        $this_content .= "<ul>\n";

        //store current groupname
        $stored_groupname = $groupname;
      }
    }

    //tell main progam we have set <ul> (and that we have output to display)
    $ul_flag = 1;

    $alert_content = '';
    $status_content = '';
    $this_content .= "<li>";

    //have you seen this task yet ?
    $seen_test = db_result(db_query('SELECT COUNT(*) FROM '.PRE.'seen WHERE taskid='.$row['id'].' AND userid='.UID.' LIMIT 1' ), 0, 0);

    //don't show alert content for changes more than NEW_TIME (in seconds)
    if( (TIME_NOW - max($row['edited'], $row['lastpost'], $row['lastfileupload'] ) ) > 86400*NEW_TIME ) {

      //task is over limit in NEW_TIME and still not looked at by you, mark it as seen, and move on...
      if( $seen_test < 1 ) {
        db_query('INSERT INTO '.PRE.'seen(userid, taskid, time) VALUES ('.UID.', '.$row['id'].', now() ) ' );
      }
    }
    //task has changed since last seen - show the changes to you
    else {

      switch($seen_test ) {
        case 0:
          //new and never visited by this user
          //$alert_content .= "<img border=\"0\" src=\"images/new.gif\" height=\"12\" width=\"31\" alt =\"new\" />";
          $alert_content .= "<span class=\"new\">".$lang['new_g']."</span>&nbsp;";
          break;

        default:
          $seenq = db_query('SELECT '.$epoch.' time) FROM '.PRE.'seen WHERE taskid='.$row['id'].' AND userid='.UID.' LIMIT 1' );

          //check if edited since last visit
          $seen = db_result($seenq, 0, 0 );
          if( ($seen - $row['edited'] ) < 0 ) {
            //edited
            //$alert_content .= "<img border=\"0\" src=\"images/updated.gif\" height=\"12\" width=\"60\" alt=\"updated\" /> &nbsp;";
            $alert_content .= "<span class=\"updated\">".$lang['updated_g']."</span>&nbsp;";
          }

          //are there forum changes ?
          if($seen - $row['lastpost'] < 0 ) {
            $alert_content .= "<img src=\"images/message.gif\" height=\"10\" width=\"14\" alt=\"message\" /> &nbsp;";
          }

          //are there file upload changes ?
          if($seen - $row['lastfileupload'] < 0 ) {
            $alert_content .= "<img src=\"images/file.gif\" height=\"11\" width=\"11\" alt=\"file\" /> &nbsp;";
          }
          break;
       }
    }

    //status
    switch($row['status'] ) {
      case "done":
        $status_content="<span class=\"green\">(".$task_state['completed']." ".nicetime($row['finished_time']).")</span>";
        break;

      case "active":
        $status_content="<span class=\"orange\">(".$task_state['active'].")</span>";
        break;

      case "notactive":
        $status_content="<span class=\"grey\">(".$task_state['planned'].")</span>";
        break;

      case "cantcomplete":
        $status_content="<span class=\"blue\">(".$task_state['cantcomplete']." ".nicetime($row['finished_time']).")</span>";
        break;
    }


    //merge all info about a task
    $this_content .= $alert_content."<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\">".$row['name']."</a>&nbsp;$status_content";
    $this_content .= "<small>";

    //add username if task is taken
    if($row['userid'] != 0 ) {
      $this_content .= "&nbsp;[<a href=\"users.php?x=".$x."&amp;action=show&amp;userid=".$row['userid']."\">".$row['username']."</a>]&nbsp;";
    }
    else {
      $this_content .= "&nbsp;";
    }

    //add number of days to a task over here
    switch($row['status'] ) {

      case 'done':
      case 'notactive':
      case 'cantcomplete':
        break;

      default:
        $state = ($row['due'] - (TIME_NOW + $tz_offset ) )/86400 ;
        if($state > 1 ) {
          $this_content .=  "(".sprintf( $lang['due_sprt'], ceil((real)$state) ).")";
        }
        else if($state > 0 ) {
          $this_content .=  "(".$lang['tomorrow'].")";
        }
        else {
          switch( -ceil($state) ) {

            case 0:
              $this_content .=  "<span class=\"green\">(<i>".$lang['due_today']."</i>)</span>";
              break;

            case 1:
              $this_content .= "<span class=\"red\">(".$lang['overdue_1'].")</span>";
              break;

            default:
              $this_content .= "<span class=\"red\">(".sprintf($lang['overdue_sprt'], -ceil((real)$state) ).")</span>";
              break;
          }
        }
        break;
    }

    //finish the line
    $this_content .= "</small>";

    //recursive search if the subtask is listed in parent_array (it has children then)
    if(in_array( $row['id'], $parent_array, FALSE) ) {
      $this_content .= list_tasks( $row['id']);
      $this_content .= "\n</ul></li>\n";
    }
    else{
      $this_content .= "</li>\n";
    }
  }
  //free memory
  db_free_result($q);
  
  return $this_content;
}

//==== end of recursive function ====

//
// MAIN PROGRAM
//

//is the parentid set in tasks.php ?
if(empty($_REQUEST['taskid']) || ! is_numeric($_REQUEST['taskid']) ) {
  error( 'Task list', 'Not a valid value for taskid');
}

$parentid = intval($_REQUEST['taskid']);

//check for private usergroup projects
$q = db_query('SELECT usergroupid, globalaccess FROM '.PRE.'tasks WHERE id='.$TASKID_ROW['projectid'] );

$row = db_fetch_num($q, 0 );

if( (! ADMIN ) && ($row[0] != 0 ) && ($row[1] == 'f' ) ) {

  //check if the user has a matching group
  if( ! in_array($row[0], (array)$GID ) ) {
    return;
  }
}

//find all parent-tasks and add them to an array, if we load the tasks we check if they have children and if not, then do not query
$parent_query = db_query('SELECT DISTINCT parent FROM '.PRE.'tasks WHERE projectid='.$TASKID_ROW['projectid'] );
$parent_array = NULL;
for( $i=0 ; $row = @db_fetch_array($parent_query, $i ) ; ++$i ) {
  $parent_array[$i] = $row['parent'];
}

//check to see if any tasks at this task level have the taskgroup descriptor set.
//Use this later to toggle the taskgroup headings.
if( db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE parent='.$parentid.' AND taskgroupid<>0' ), 0, 0 ) > 0 ) {
  $taskgroup_flag = 1;
}
else {
  $taskgroup_flag = 0;
}

//force mysql to put 'uncategorised' items at the bottom of the listing
$no_group = '';
if(substr(DATABASE_TYPE, 0, 5) == 'mysql' ) {
  $no_group = 'IF('.PRE.'taskgroups.name IS NULL, 1, 0), ';
}

//get the task sort order (strip off the 'ORDER BY' in this case)
$task_order = db_result(db_query('SELECT task_order FROM '.PRE.'config' ), 0, 0 );
$task_order = str_replace('ORDER BY', '', $task_order );

$content  = list_tasks($parentid );

//if there is output, then show it
if($ul_flag == 1 ){
  //finish off the closing </ul>
  $content .= "\n</ul>\n";
  new_box( $lang['tasks'], $content );
}

?>
