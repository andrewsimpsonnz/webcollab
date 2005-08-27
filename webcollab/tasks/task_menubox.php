<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//get taskid (if any)
if(! empty($_GET['taskid']) && is_numeric($_GET['taskid']) ){
  
  $taskid = intval($_GET['taskid']);  

  require_once(BASE.'includes/details.php' );
  
  //don't show options for archived projects
  if($TASKID_ROW['archive'] == 0 ) {
    
    $menu_type = $TYPE;
    
    //edit, delete rights
    if((ADMIN ) || 
       ($TASKID_ROW['owner'] == UID ) || 
       (($TASKID_ROW['groupaccess'] == "t") && (in_array($TASKID_ROW['usergroupid'], (array)$GID ) ) ) ) {
      
      //header + edit
      $content .= "<small><b>".$lang['admin'].":</b></small><br />\n".
                  "<a href=\"tasks.php?x=".$x."&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit_".$TYPE]."</a><br />\n";
                  
      //delete
      if((ADMIN ) || ($TASKID_ROW['owner'] == UID ) ) { 
        $content .= "<a href=\"tasks.php?x=".$x."&amp;action=delete&amp;taskid=".$taskid."\"  onclick=\"return confirm( '".sprintf($lang["del_javascript_".$TYPE."_sprt"], javascript_escape($TASKID_ROW['name'] ) )."')\">".$lang["delete_$TYPE"]."</a><br />\n";
      }
      
      //clone
      if(ADMIN ) {
        $content .= "<a href=\"tasks.php?x=".$x."&amp;action=clone&amp;taskid=".$taskid."\">".$lang["clone_".$TYPE]."</a><br />\n";
      }
      
      //archive project
      if((ADMIN ) || ($TASKID_ROW['owner'] == UID ) ) {
        if(($TYPE == 'project' ) && ($TASKID_ROW['archive'] == 0 ) ) {
          $content .= "<a href=\"archive.php?x=".$x."&amp;action=submit_archive&amp;taskid=".$taskid."\"  onclick=\"return confirm( '".sprintf($lang['javascript_archive_project'], javascript_escape($TASKID_ROW['name'] ) )."')\">".$lang['archive_project']."</a><br />\n";
        }
      }          
      //global header
      $content .= "<br /><small><b>".$lang['global'].":</b></small><br />\n";
    }
    //add task
    $content .= "<a href=\"tasks.php?x=".$x."&amp;action=add&amp;parentid=".$taskid."\">".$lang['add_task']."</a><br />\n";
  }
}
//add project
$content .= "<a href=\"tasks.php?x=".$x."&amp;action=add\">".$lang['add_project']."</a><br />\n";

new_box( $lang[$menu_type."_options"], $content, 'boxmenu' );

?>
