<?php
/*
  $Id$

  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>  
  
  WebCollab
  ---------------------------------------
  
  Parts of this file originally written as Core APM by Dennis Fleurbaaij 2001/2002.

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

  Show a task

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/details.php' );
include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'includes/time.php' );
include_once(BASE.'includes/usergroup_security.php');

//secure variables
$content = '';

//is there an id ?
if( ! isset( $_GET['taskid']) || ! is_numeric($_GET['taskid']) || $_GET['taskid'] == 0 ) {
  error('Task show', 'Not a valid value for taskid' );
}

$taskid = intval($_GET['taskid']);

//check usergroup security
$taskid = usergroup_check($taskid );

$q = db_query('SELECT '.$epoch.PRE.'tasks.created) AS epoch_created,
                      '.$epoch.PRE.'tasks.finished_time) AS epoch_finished,
                      '.$epoch.PRE.'tasks.completion_time) AS epoch_completion,
                      '.PRE.'users.fullname AS fullname,
                      '.PRE.'taskgroups.name AS taskgroup_name,
                      '.PRE.'usergroups.name AS usergroup_name
                      FROM '.PRE.'tasks
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'tasks.owner)
                      LEFT JOIN '.PRE.'taskgroups ON ('.PRE.'taskgroups.id='.PRE.'tasks.taskgroupid)
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'tasks.usergroupid)
                      WHERE '.PRE.'tasks.id='.$taskid );

//get the data
if( ! ($row = db_fetch_array($q, 0 ) ) ) {
  error('Task show', 'The requested item has either been deleted, or is now invalid.');
}

//mark this as seen in seen ;)
@db_query('DELETE FROM '.PRE.'seen WHERE userid='.UID.' AND taskid='.$taskid, 0);
db_query('INSERT INTO '.PRE.'seen(userid, taskid, time) VALUES ('.UID.', '.$taskid.', now() )' );

//text link for 'printer friendly' page
if(isset($_GET['action']) && $_GET['action'] == "show_print" ) {
  $content  .= "<p><span class=\"textlink\">[<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=$taskid\">".$lang['normal_version']."</a>]</span></p>";
}
else{
  //show 'project jump' select box
  $content .= project_jump($taskid);
  //show print tag
  $content .= "<div style=\"text-align : right\"><span class=\"textlink\">[<a href=\"tasks.php?x=".$x."&amp;action=show_print&amp;taskid=".$taskid."\">".$lang['print_version']."</a>]</span></div>\n";
}  
    
//percentage_completed gauge if this is a project
if( $TASKID_ROW['parent'] == 0 ) {
  $content .= sprintf( $lang['percent_project_sprt'], $TASKID_ROW['completed'] )."\n";
  $content .= show_percent( $TASKID_ROW['completed'] );
}

//start of header table
$content .= "<table width=\"98%\"><tr><td>\n";

//project/task name
$content .= "<b>".$TASKID_ROW['name']."</b><br /><br /></td></tr>\n";

//show text
$content .= "<tr><td style=\"background : #EEEEEE; width : 95%\">\n";

$content .= nl2br(html_links($TASKID_ROW['text'] ) );
$content .= "</td></tr></table>\n";

//start of info table
$content .= "<table class=\"celldata\">\n";

//get owner information
if( $TASKID_ROW['owner'] == 0 ) {
  $content .= "<tr><td>".$lang['owned_by'].":</td><td>".$lang['nobody']."</td></tr>\n";
} else {
  $content .= "<tr><td>".$lang['owned_by'].": </td><td><a href=\"users.php?x=".$x."&amp;action=show&amp;userid=".$TASKID_ROW['owner']."\">".$row['fullname']."</a></td></tr>\n";
}

//get creator information (null if creator has been deleted!)
$creator = @db_result(db_query("SELECT fullname FROM ".PRE."users WHERE id=".$TASKID_ROW['creator'] ), 0, 0  );
$content .= "<tr><td>".$lang['created_on'].": </td><td>";
if($creator == NULL ) {
  $content .= nicetime($TASKID_ROW['epoch_created']);
}
else {
  $content .= sprintf($lang['by_sprt'], nicetime($row['epoch_created']), "<a href=\"users.php?x=".$x."&amp;action=show&amp;userid=".$TASKID_ROW['creator']."\">".$creator."</a>");
$content .= "</td></tr>\n";
}

//get deadline
$content .= "<tr><td>".$lang['deadline'].": </td><td>".nicedate($TASKID_ROW['deadline'])."</td></tr>\n";

//get priority
$content .= "<tr><td>".$lang['priority'].": </td><td>";
switch($TASKID_ROW['priority'] ) {

  case 0:
    $content .=  $task_state['dontdo'];
    break;
  case 1:
    $content .=  $task_state['low'];
    break;
  case 2:
    $content .=  $task_state['normal'];
    break;
  case 3:
    $content .=  "<b>".$task_state['high']."</b>";
    break;
  case 4:
    $content .=  "<b><span class=\"red\">".$task_state['yesterday']."</span></b>";
    break;
}
$content .= "</td></tr>\n";

//status info and task completion date
switch($TASKID_ROW['parent'] ) { 
  case 0:
    //project - show the finish date and status
    $title = $lang['project_details'];
    switch($TASKID_ROW['status'] ) {
      case 'cantcomplete':
        $content .= "<tr><td>".$lang['status'].": </td><td><b>".$lang['project_on_hold']."</b></td></tr>\n";
        $content .= "<tr><td>".$lang['modified_on'].": </td><td>".nicetime($row['epoch_finished'])."</td></tr>\n";
        break;
  
      case 'notactive':
        $content .= "<tr><td>".$lang['status'].": </td><td>".$lang['project_planned']."</td></tr>\n";
        break;
  
      case 'nolimit':
        $content .= "<tr><td>".$lang['status'].": </td><td>".$lang['project_no_deadline']."</td></tr>\n";
        break;
  
      case 'done':
      default:
        if($TASKID_ROW['completed'] == 100 ) {  
          $content .= "<tr><td>".$lang['completed_on'].": </td><td>".nicetime($row['epoch_completion'] )."</td></tr>\n";
        }
        break;
    }
    break;
    
  default:  
    //task 
    $title = $lang['task_info'];
    $content .= "<tr><td>".$lang['status'].": </td><td>";
    switch($TASKID_ROW['status'] ) {
      case 'created':
        $content .=  $task_state['new'];
        break;
      case 'notactive':
        $content .=  $task_state['planned'];
        break;
      case 'active':
        $content .=  $task_state['active'];
        break;
      case 'cantcomplete':
        $content .=  "<b>".$task_state['cantcomplete']."</b>";
        break;
      case 'done':
        $content .=  $task_state['done'];
        break;
      default:
        $content .=  $TASKID_ROW['status'];
        break;
    }
    $content .= "</td></tr>\n";
  
    //is there a finished date ?
    switch($TASKID_ROW['status'] ) {
      case 'done':
        $content .= "<tr><td>".$lang['completed_on'].": </td><td>".nicetime($row['epoch_finished'])."</td></tr>\n";
        break;
  
      case 'cantcomplete':
        $content .= "<tr><td>".$lang['modified_on'].": </td><td>".nicetime($row['epoch_finished'])."</td></tr>\n";
        break;
  
      default:
        break;
    }
    break;
}

//task group
if($TASKID_ROW['parent'] != 0 ) {

  switch($TASKID_ROW['taskgroupid'] ){
    case 0:
      $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=taskgroup&amp;type=help'); return false\">".$lang['taskgroup']."</a>: </td><td>".$lang['none']."</td></tr>\n";
      break;

    default:
      $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=taskgroup&amp;type=help'); return false\">".$lang['taskgroup']."</a>: </td><td>".$row['taskgroup_name']."</td></tr>\n";
      break;
  }
}

//show the usergroupid
if( $TASKID_ROW['usergroupid'] != 0 ) {
  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=usergroup&amp;type=help'); return false\">".$lang['usergroup']."</a>: </td><td>".$row['usergroup_name']." ";

  switch($TASKID_ROW['globalaccess'] ){
    case 't':
      $content .= $lang[$TYPE."_accessible"]."</td></tr>\n";
      break;

    case 'f':
    default:
      $content .= "<b>".$lang[$TYPE."_not_accessible"]."</b></td></tr>\n";
      break;
  }

  if($TASKID_ROW['groupaccess'] == 't' ) {
      $content .= "<tr><td>&nbsp;</td><td><i>".$lang["usergroup_can_edit_".$TYPE]."</i></td></tr>\n";
  }
}
else {
  $content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help\" onclick=\"window.open('help/help_language.php?item=usergroup&amp;type=help'); return false\">".$lang['usergroup']."</a>: </td><td>".$lang[$TYPE."_not_in_usergroup"]."</td></tr>\n";
}

$content .= "</table>\n";

//if this is an archived task, or you are a GUEST user, then no user functions are available 
if(($TASKID_ROW['archive'] == 0 ) && (! GUEST ) ) {
  
  $content .= "<div style=\"text-align : center\"><span class=\"textlink\">\n";
    
  //set add function
  switch($TYPE){
    case 'project':
      $content .= "[<a href=\"tasks.php?x=".$x."&amp;action=add&amp;parentid=".$taskid."\">".$lang['add_task']."</a>]&nbsp;\n";
      break;
  
    case 'task':
      $content .= "[<a href=\"tasks.php?x=".$x."&amp;action=add&amp;parentid=".$taskid."\">".$lang['add_subtask']."</a>]&nbsp;\n";
      break;
  }
  
  //unowned task ==> [I'll take it!] button
  if($TASKID_ROW['owner'] == 0 ) {
    $content .= "[<a href=\"tasks.php?x=".$x."&amp;action=meown&amp;taskid=".$taskid."\">".$lang['i_take_it']."</a>]&nbsp;\n";
  }

  //check for owner or group access
  if((UID == $TASKID_ROW['owner'] ) || 
     ($TASKID_ROW['groupaccess'] == "t") && (in_array($TASKID_ROW['usergroupid'], (array)$GID ) ) ) {
    $access = true;
  }
  else {
    $access = false;
  }    
  
  //admin - owner - groupaccess  ==> [edit] button
  if((ADMIN ) || ($access ) ) {
    $content .= "[<a href=\"tasks.php?x=".$x."&amp;action=edit&amp;taskid=".$taskid."\">".$lang['edit']."</a>]&nbsp;\n";
  }
  
  //(owner - groupaccess) & (uncompleted task)  ==> [I finished it] button
  if(($access ) && ($TASKID_ROW['status'] != "done" ) && ($TASKID_ROW['parent'] != 0 ) ) {
    $content .= "[<a href=\"tasks.php?x=".$x."&amp;action=done&amp;taskid=".$taskid."\">".$lang['i_finished']."</a>]&nbsp;\n";
  }
    
  //owner ==> [I don't want it anymore] button
  if(UID == $TASKID_ROW['owner'] ) {
    $content .= "[<a href=\"tasks.php?x=".$x."&amp;action=deown&amp;taskid=".$taskid."\">".$lang['i_dont_want']."</a>]&nbsp;\n";
  }
  
  //(admin) & (not owner) & (has owner) ==> [Take over task] button
  if((ADMIN ) && (UID != $TASKID_ROW['owner'] ) && ($TASKID_ROW['owner'] != 0 ) ) {
    $content .= "[<a href=\"tasks.php?x=".$x."&amp;action=meown&amp;taskid=".$taskid."\">".sprintf($lang["take_over_".$TYPE] )."</a>]\n";
  }
  
  $content .= "</span></div>\n";
}

new_box( $title, $content, 'boxdata2' );

?>