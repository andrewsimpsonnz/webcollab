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

require_once("path.php" );
require_once(BASE."includes/security.php" );

//secure variables
$content  = "";
$clone = "";
$archive = "";
$menu_type = "project";
$taskid = -1;

if($GUEST == 1 )
  warning($lang['access_denied'], $lang['not_owner'] );  

//get taskid (if any)
if(! empty($_GET['taskid']) && is_numeric($_GET['taskid']) )
  $taskid = intval($_GET['taskid']);  
  
// query to get the non-completed projects
$q = db_query("SELECT id,
                      SUBSTRING(name FROM 1 FOR 20) AS name,
                      globalaccess,
                      usergroupid
                      FROM ".PRE."tasks
                      WHERE parent=0
                      AND completed<>100
                      AND archive=0
                      ORDER BY name" );

//check if there are projects
if(db_numrows($q) > 0 ){
    
  // Prepare the form
  $content .= "<form id=\"ProjectQuickJump\" method=\"get\" action=\"tasks.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
              "<input type=\"hidden\" name=\"action\" value=\"show\" /></fieldset>\n".
              "<div><select name=\"taskid\">\n".
              "<option value=\"-1\">".$lang['quick_jump']."</option>\n";

  // loop through the data
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++){
  
    //check if user can view this project
    if( ($ADMIN != 1 ) && ($row['globalaccess'] != "t" ) && ($row['usergroupid'] != 0 ) ) {
      if( ! in_array( $row['usergroupid'], (array)$GID ) )
        continue;
    }
        
    $content .= "<option value=\"".$row["id"]."\"";
    if($taskid == $row["id"]) {
      $content .= " selected=\"selected\"";
    }
    $content .= ">".$row["name"]."</option>\n";
  }

// wrap up the select and the submit
$content .= "</select></div>\n".
            "<a href=\"javascript:document.getElementById('ProjectQuickJump').submit();\"><small>".$lang['go']."</small></a>\n".
            "</form>\n";
}

//the task dependent part
if($taskid > 0 ) {

  include_once(BASE."includes/details.php" );
  
  //don't show options for archived projects
  if($TASKID_ROW['archive'] == 0 ){
    
    $menu_type = $TYPE;
    
    if(($ADMIN == 1 ) || ($TASKID_ROW['owner'] == $UID )  ) {
      $content .= "<small><b>".$lang['admin'].":</b></small><br />\n".
                  "<a href=\"tasks.php?x=$x&amp;action=edit&amp;taskid=".$taskid."\">".$lang["edit_$TYPE"]."</a><br />\n".
                  "<a href=\"tasks.php?x=$x&amp;action=delete&amp;taskid=".$taskid."\"  onclick=\"return confirm( '".sprintf($lang["del_javascript_".$TYPE."_sprt"], javascript_escape($TASKID_ROW['name'] ) )."')\">".$lang["delete_$TYPE"]."</a><br />\n".
                  "<br /><small><b>".$lang['global'].":</b></small><br />\n";
      
      if(($TYPE == "project" ) && ($TASKID_ROW['archive'] == 0 ) ){
        $archive = "<a href=\"archive.php?x=$x&amp;action=submit_archive&amp;taskid=".$taskid."\"  onclick=\"return confirm( '".sprintf($lang['javascript_archive_project'], javascript_escape($TASKID_ROW['name'] ) )."')\">".$lang['archive_project']."</a><br />\n";
      }
    }
    $content .= "<a href=\"tasks.php?x=$x&amp;action=add&amp;parentid=$taskid\">".$lang['add_task']."</a><br />\n";
  
    if($ADMIN == 1 )
      $clone = "<a href=\"tasks.php?x=$x&amp;action=clone&amp;taskid=$taskid\">".$lang["clone_$TYPE"]."</a><br />\n";
  }
}
//the task-independent part
$content .= "<a href=\"tasks.php?x=$x&amp;action=add\">".$lang['add_project']."</a><br />\n";
$content .= $archive.$clone;

new_box( $lang[$menu_type."_options"], $content, "boxmenu" );

?>
