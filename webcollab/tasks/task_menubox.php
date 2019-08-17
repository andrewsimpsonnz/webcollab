<?php
/*
  $Id$

  (c) 2002 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  This shows the menubox for the tasks-part.

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//secure variables
$content   = '';
$clone     = '';
$archive   = '';
$menu_type = 'project';
$taskid    = -1;

//guests shouldn't get here
if(GUEST ) {
  return;
}

$content .= "<ul class=\"menu\">\n";

//get taskid (if any)
if(isset($_GET['taskid']) && safe_integer($_GET['taskid']) ){

  $taskid = $_GET['taskid'];

  include_once(BASE.'includes/details.php' );

  //don't show options for archived projects
  if($TASKID_ROW['archive'] == 0 ) {

    $menu_type = $TYPE;
    //header
    $content .= "<li><small><b>".$lang['admin'].":</b></small></li>\n";

    //edit rights
    if((ADMIN ) ||
       ($TASKID_ROW['task_owner'] == UID ) ||
       (($TASKID_ROW['groupaccess'] == "t") && (isset($GID[($TASKID_ROW['usergroupid'])] ) ) ) ) {

      //edit
      $content .= "<li><a href=\"tasks.php?x=".X."&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit_".$TYPE]."</a></li>\n";

      //archive project
      if((ADMIN ) || ($TASKID_ROW['task_owner'] == UID ) ) {
        if(($TYPE == 'project' ) && ($TASKID_ROW['archive'] == 0 ) ) {
          $content .= "<li><a href=\"archive.php?x=".X."&amp;action=archive&amp;taskid=".$taskid."\" >".$lang['archive_project']."</a></li>\n";
        }
      }
    }
    //clone
    $content .= "<li><a href=\"tasks.php?x=".X."&amp;action=clone&amp;taskid=".$taskid."\">".$lang["clone_".$TYPE]."</a></li>\n";
    //global header
    $content .= "<li><small><b>".$lang['global'].":</b></small></li>\n";
    //add task
    $content .= "<li><a href=\"tasks.php?x=".X."&amp;action=add&amp;parentid=".$taskid."\">".$lang['add_task']."</a></li>\n";
  }
}
//add project
$content .= "<li><a href=\"tasks.php?x=".X."&amp;action=add\">".$lang['add_project']."</a></li>\n".
            "</ul>\n";

new_box( $lang[$menu_type."_options"], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );

?>
