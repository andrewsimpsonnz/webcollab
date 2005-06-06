<?php
/*
  $Id$

  (c) 2004 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Lists all archived projects

*/

require_once('path.php' );
require_once( BASE.'includes/security.php' );

include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'includes/time.php' );

//some inital values
$content = '';
$flag = 0;
$archive_print = 0;

// query to get the projects
$q = db_query('SELECT id,
                      name,
                      deadline,
                      status,
                      '.$epoch.' finished_time) AS finished_time,
                      '.$epoch.' completion_time) AS completion_time,
                      owner,
                      usergroupid,
                      globalaccess,
                      completed
                      FROM '.PRE.'tasks
                      WHERE parent=0
                      AND archive=1
                      ORDER BY name' );

//check if there are projects
if(db_numrows($q) < 1 ) {
  $content .= "<div style=\"text-align : center\">".$lang['no_allowed_projects']."</div>\n";
  new_box($lang['no_projects'], $content );
  return;
}

//text link for 'printer friendly' page
if(isset($_GET['action']) && $_GET['action'] == "archive_print" ) {
  $content  .= "[<a href=\"archive.php?x=".$x."&amp;action=list\">".$lang['normal_version']."</a>]\n";
}
else {
  $content  .= "<table><td style=\"text-align : right\"><span class=\"textlink\">[<a href=\"archive.php?x=".$x."&amp;action=archive_print\">".$lang['print_version']."</a>]";
  $content .= "</span></td></tr>\n</table>\n";
}

//setup main table
$content .= "<table>\n";

//show all projects
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //check the user has rights to view this project
  if( (! ADMIN ) && ($row['globalaccess'] != 't' ) && ( $row['usergroupid'] != 0 ) ) {
    if( ! in_array( $row['usergroupid'], (array)$GID ) ){
      continue;
    }
  }

  //set project status
  $project_status = $row['status'];
  
  //make adjustments
  switch( $project_status ) {

    case 'cantcomplete':
    case 'notactive':
      break;

    case 'active':
    case 'nolimit':
    case 'done':
    default:
      if($row['completed'] == 100 ){ 
        $project_status = 'done';
      }
      break;
  }
  
  //to indicate that there are viewable projects
  $flag = 1;

  //start list
  $content .= "<tr><td class=\"projectlist\">\n";

  //show name and a link
  $content .= "<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row['id']."\"><b>".$row['name']."</b></a><br />\n";

  //give some details of status
  switch($project_status ) {

    case 'done':
      $content .= $task_state['completed']." (".nicetime( $row['completion_time'] ).")\n";
      break;

    case 'cantcomplete':
      $content .= "<i>".sprintf($lang['project_hold_sprt'], nicetime($row['finished_time']) )."</i><br />\n";
      $content .= "<img src=\"images/clock.gif\" height=\"9\" width=\"9\" alt=\"clock\" /> &nbsp; ".nicedate( $row['deadline'] )."<br />\n";
      break;

    case 'notactive':
      $content .= "<i>".$lang['project_planned']."</i><br />\n";
      break;

    case 'nolimit':
      $content .= sprintf($lang['percent_sprt'], $row['completed'])."<br />\n";
      $content .= "<i>".$lang['project_no_deadline']."</i><br />\n";
      break;

    case 'active':
    default:
      $content .= sprintf($lang['percent_sprt'], $row['completed'] )."<br />\n";
      $content .= "<img src=\"images/clock.gif\" height=\"9\" width=\"9\" alt=\"clock\" /> &nbsp; ".nicedate( $row['deadline'] )."<br />";
      break;
  }
  if(ADMIN || UID == $row['owner'] ){
  
    $content .= "<span class=\"textlink\">".
                "[<a href=\"tasks.php?x=$x&amp;action=delete&amp;taskid=".$row['id']."\" onclick=\"return confirm( '".sprintf($lang["del_javascript_project_sprt"], javascript_escape($row['name'] ) )."')\">".$lang['del']."</a>]&nbsp;&nbsp;&nbsp;&nbsp;\n".
                "[<a href=\"archive.php?x=$x&amp;action=submit_restore&amp;taskid=".$row['id']."\">".$lang['revive']."</a>]</span>\n";
  }            
  //end list
  $content .= "</td></tr>\n";
}

$content .= "</table>\n";

if($flag != 1 ){
  $content .= "<div style=\"text-align : center\">".$lang['no_allowed_projects']."</div>\n";
}

new_box($lang['archived_projects'], $content );

?>