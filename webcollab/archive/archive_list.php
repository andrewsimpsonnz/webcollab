<?php
/*
  $Id$

  (c) 2004 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
include_once(BASE.'tasks/task_common.php' );
include_once(BASE.'includes/time.php' );

//some inital values
$content = '';
$archive_print = 0;

//set the usergroup permissions on queries
$tail = usergroup_tail();  

// query to get the projects
$q = db_query('SELECT id,
                      name,
                      deadline,
                      status,
                      finished_time,
                      completion_time,
                      owner,
                      completed
                      FROM '.PRE.'tasks
                      WHERE parent=0
                      AND archive=1'
                      .$tail.
                      'ORDER BY name' );

//text link for 'printer friendly' page
if(isset($_GET['action']) && $_GET['action'] == "archive_print" ) {
  $content  .= "[<a href=\"archive.php?x=".X."&amp;action=list\">".$lang['normal_version']."</a>]\n";
}
else {
  $content  .= "<table style=\"width: 98%\"><tr><td style=\"text-align: right\">\n".
               "<a href=\"archive.php?x=".X."&amp;action=archive_print\" title= \"".$lang['print_version']."\">".
               "<img src=\"images/printer.png\" alt=\"".$lang['print_version']."\" width=\"16\" height=\"16\" /></a>\n".
               "</td></tr>\n</table>\n";
}

//setup main table
$content .= "<table>\n";

//show all projects
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  if($i > 0 ) { 
    //not the first line, need to add a divider
    $content .= "<tr><td style=\"padding-left: 30px\"><hr /></td></tr>\n";
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

  //start list
  $content .= "<tr><td class=\"projectlist\">\n";

  //show name and a link
  $content .= "<a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['id']."\"><b>".$row['name']."</b></a><br />\n";

  //give some details of status
  switch($project_status ) {

    case 'done':
      $content .= $task_state['completed']." (".nicetime( $row['completion_time'] ).")\n";
      break;

    case 'cantcomplete':
      $content .= "<i>".sprintf($lang['project_hold_sprt'], nicetime($row['finished_time']) )."</i><br />\n";
      $content .= "<img src=\"images/time.png\" height=\"16\" width=\"16\" alt=\"clock\" /> &nbsp; ".nicedate( $row['deadline'] )."<br />\n";
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
      $content .= "<img src=\"images/time.png\" height=\"16\" width=\"16\" alt=\"clock\" /> &nbsp; ".nicedate( $row['deadline'] )."\n";
      break;
  }

  if(ADMIN || UID == $row['owner'] ){

    $content .= "<table>\n".
                "<tr><td><form method=\"post\" action=\"tasks.php\" ".
                "onsubmit=\"return confirm( '".sprintf($lang["del_javascript_project_sprt"], javascript_escape($row['name'] ) )."')\">\n".
                "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
                "<input type=\"hidden\" name=\"action\" value=\"delete\" />\n".
                "<input type=\"hidden\" name=\"taskid\" value=\"".$row['id']."\" />\n".
                "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
                "<p><input type=\"submit\" value=\"".$lang['delete']."\"/></p>\n".
                "</form>\n".
                "</td>\n".
                "<td><form method=\"post\" action=\"archive.php\">\n".
                "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
                "<input type=\"hidden\" name=\"action\" value=\"submit_restore\" />\n".
                "<input type=\"hidden\" name=\"taskid\" value=\"".$row['id']."\" /></fieldset>\n".
                "<p><input type=\"submit\" value=\"".$lang['revive']."\" /></p>\n".
                "</form>\n".
                "</td></tr>\n".
                "</table>\n";
  }
  //end list
  $content .= "</td></tr>\n";
}

$content .= "</table>\n";

if($i == 0 ) {
  //no projects found in database
  $content = "<div style=\"text-align : center\">".$lang['no_allowed_projects']."</div>\n";
  new_box($lang['no_projects'], $content );

}
else {
  //show projects found
  new_box($lang['archived_projects'], $content );
}

?>