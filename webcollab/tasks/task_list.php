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

  Lists all tasks and subtasks

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/details.php' );

include_once(BASE.'tasks/task_common.php' );

//init values
$content = '';

//
// Functionalised recursive query
//
function list_tasks($parent ) {

  global $x, $parentid, $parent_array, $epoch, $lang;
  global $taskgroup_flag, $task_state;
  global $no_group, $task_order, $GID;

  //init values
  $taskgroup_flag = NULL;
  $stored_groupid = NULL;
  $this_content   = '';

  //query to get the children for this taskid
  $q = db_query('SELECT '.PRE.'tasks.id AS id,
                  '.PRE.'tasks.name AS name,
                  '.PRE.'tasks.status AS status,
                  '.PRE.'tasks.finished_time AS finished_time,
                  '.$epoch.' '.PRE.'tasks.deadline) AS due,
                  '.$epoch.' '.PRE.'tasks.edited) AS edited,
                  '.$epoch.' '.PRE.'tasks.lastforumpost) AS lastpost,
                  '.$epoch.' '.PRE.'tasks.lastfileupload) AS lastfileupload,
                  '.PRE.'tasks.globalaccess AS globalaccess,
                  '.PRE.'tasks.usergroupid AS usergroupid,
                  '.PRE.'tasks.owner AS owner,
                  '.PRE.'tasks.priority AS priority,
                  '.PRE.'users.id AS userid,
                  '.PRE.'users.fullname AS username,
                  '.PRE.'taskgroups.id AS taskgroupid,
                  '.PRE.'taskgroups.name AS group_name,
                  '.PRE.'taskgroups.description AS group_description
                  FROM '.PRE.'tasks
                  LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.owner)
                  LEFT JOIN '.PRE.'taskgroups ON ('.PRE.'taskgroups.id='.PRE.'tasks.taskgroupid)
                  WHERE '.PRE.'tasks.parent='.$parent.'
                  ORDER BY '.$no_group.' group_name, '.$task_order );

  //check for any tasks.  If no tasks end recursive function
  if(db_numrows($q) < 1 ) {
    return;
  }

  //show all tasks
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

    //check the user has rights to view this project/task
    if(($row['globalaccess'] != 't' ) && ( $row['usergroupid'] != 0 ) && ($row['owner'] != UID ) && (! ADMIN ) ) {
      if( ! isset($GID[($row['usergroupid'])] ) ) {
        //do a recursive search if the subtask is listed in parent_array (it has children then)
        if(isset($parent_array[($row['id'])] ) ) {
          $this_content .= list_tasks( $row['id']);
          $this_content .= "\n</ul></li>\n";
        }
        continue;
      }
    }

    //check if we have taskgroups to display on first item
    if($taskgroup_flag === NULL) {
      if(($parent == $parentid ) && ($row['taskgroupid'] > 0 ) ) {
        $this_content  .= '';
        $taskgroup_flag = 1;
      }
      else {
        $this_content  .= "<ul>\n";
        $taskgroup_flag = 0;
      }
    }

    //check if there are taskgroups set, and if this is the first layer of tasks
    if(($taskgroup_flag ) && ($parent == $parentid ) ) {

      //check if taskgroup has changed from last iteration
      if($stored_groupid !== $row['taskgroupid'] ) {

        //don't need </ul> before first taskgroup heading (no <ul> is set)
        if($stored_groupid !== NULL ) {
          $this_content .= "</ul>\n";
        }

        $this_content .= "<p><b>";

        //set taskgroup name, or 'Uncategorised' if none
        if(! $row['group_name']) {
          $this_content .= $lang['uncategorised']."</b>";
        }
        else {
          $this_content .= $row['group_name']."</b>";
          //add taskgroup description
          if($row['group_description']) {
            $this_content .=  "&nbsp;<i>( ".$row['group_description']." )</i>";
          }
        }

        $this_content .= "</p>\n<ul>\n";

        //store current taskgroupid
        $stored_groupid = $row['taskgroupid'];
      }
    }

    $this_content  .= "<li>";

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
          $this_content .= "<span class=\"new\">".$lang['new_g']."</span>&nbsp;";
          break;

        default:
          $seenq = db_query('SELECT '.$epoch.' time) FROM '.PRE.'seen WHERE taskid='.$row['id'].' AND userid='.UID.' LIMIT 1' );

          //check if edited since last visit
          $seen = db_result($seenq, 0, 0 );
          if(($seen - $row['edited'] ) < 0 ) {
            //edited
            $this_content .= "<span class=\"updated\">".$lang['updated_g']."</span>&nbsp;";
          }

          //are there forum changes ?
          if($seen - $row['lastpost'] < 0 ) {
            $this_content .= "<img src=\"images/comments.png\" height=\"16\" width=\"16\" alt=\"message\" /> &nbsp;";
          }

          //are there file upload changes ?
          if($seen - $row['lastfileupload'] < 0 ) {
            $this_content .= "<img src=\"images/disk_multiple.png\" height=\"16\" width=\"16\" alt=\"file\" /> &nbsp;";
          }
          break;
       }
    }

    $this_content .= "<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\">".$row['name']."</a>&nbsp;";

    //status
    switch($row['status'] ) {
      case "done":
        $this_content .= "<span class=\"green\">(".$task_state['completed']." ".nicedate($row['finished_time']).")</span>";
        break;

      case "active":
        $this_content .= "<span class=\"orange\">(".$task_state['active'].")</span>";
        break;

      case "notactive":
        $this_content .= "<span class=\"grey\">(".$task_state['planned'].")</span>";
        break;

      case "cantcomplete":
        $this_content .= "<span class=\"blue\">(".$task_state['cantcomplete']." ".nicedate($row['finished_time']).")</span>";
        break;

      default:
        break;

    }

    $this_content .= "<small>";

    //add username if task is taken
    if($row['userid'] != 0 ) {
      $this_content .= "&nbsp;[<a href=\"users.php?x=".$x."&amp;action=show&amp;userid=".$row['userid']."\">".$row['username']."</a>]&nbsp;";
    }
    else {
      $this_content .= "&nbsp;[".$lang['nobody']."]&nbsp;";
    }

    //add number of days to a task over here
    switch($row['status'] ) {

      case 'done':
      case 'notactive':
      case 'cantcomplete':
        break;

      default:
        $state = ( ($row['due'] - TIME_NOW)/86400 );
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

    //recursive search if the subtask is listed as a key in parent_array (it has children then)
    if(isset($parent_array[($row['id'])] ) ) {
      $this_content .= list_tasks($row['id'] );
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
if(! @safe_integer($_REQUEST['taskid']) ) {
  error('Task list', 'Not a valid value for taskid' );
}

$parentid = $_REQUEST['taskid'];

//check for closed usergroup projects
if(! ADMIN ) {
  $tail = usergroup_tail();
  $q = @db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE id='.$TASKID_ROW['projectid'].$tail.' LIMIT 1' );

  if(db_result($q, 0, 0 ) < 1 ) {
    return;
  }
}

//find all parent-tasks and add them to an array, if we load the tasks we check if they have children and if not, then do not query
$parent_query = db_query('SELECT DISTINCT parent FROM '.PRE.'tasks WHERE projectid='.$TASKID_ROW['projectid'] );
$parent_array = array();
for( $i=0 ; $row = @db_fetch_array($parent_query, $i ) ; ++$i ) {
  $parent_array[($row['parent'])] = $row['parent'];
}

//force mysql to put 'uncategorised' items at the bottom of the listing
$no_group = '';
if(substr(DATABASE_TYPE, 0, 5) == 'mysql' ) {
  $no_group = 'IF('.PRE.'taskgroups.name IS NULL, 1, 0), ';
}

//get the task sort order (strip off the 'ORDER BY' in this case)
$task_order = db_result(db_query('SELECT task_order FROM '.PRE.'config' ), 0, 0 );
$task_order = str_replace('ORDER BY', '', $task_order );

$content .= list_tasks($parentid );

//if there is output, then show it
if($content ){
  //finish off the closing </ul>
  $content .= "\n</ul>\n";
  new_box( $lang['tasks'], $content );
}

?>