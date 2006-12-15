<?php
/*
  $Id$

  (c) 2003 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  This shows the menubox with the task navigation indicated.

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//secure variables
$content  = '';

//existing task or project
if( @safe_integer($_GET['taskid']) ) {

  $taskid = $_GET['taskid'];

  require_once(BASE.'includes/details.php' );

  $content .= "<small><b>".$lang['project'].":</b></small><br />\n";

  switch($TASKID_ROW['parent'] ) {

    case '0':
      //project
      $content .= "&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\"  />".
                   box_shorten($TASKID_ROW['name'])."<br />\n";
      break;

    case ($TASKID_ROW['projectid'] ):
      //task under project

      //get project name (limited to 20 characters)
      $project_name = box_shorten(db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$TASKID_ROW['projectid'] ), 0, 0 ) );

      $content .= "&nbsp; <a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$TASKID_ROW['projectid']."\">".$project_name."</a><br />\n".
                  "<small><b>".$lang['task'].":</b></small><br />\n".
                  "&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\"  />".
                  box_shorten($TASKID_ROW['name'])."<br />\n";
      break;

    default:
      //task with parent task

      //get project name
      $project_name = box_shorten(db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$TASKID_ROW['projectid'] ), 0, 0 ) );
      //get parent name
      $parent_name = box_shorten(db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$TASKID_ROW['parent'] ), 0, 0 ) );

      $content .= "&nbsp; <a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$TASKID_ROW['projectid']."\">".$project_name."</a><br />\n".
                  "<small><b>".$lang['parent_task'].":</b></small><br />\n".
                  "&nbsp; <a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$TASKID_ROW['parent']."\">".$parent_name."</a><br />\n".
                  "<small><b>".$lang['task'].":</b></small><br />\n".
                  "&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\" />".
                  $TASKID_ROW['name']."<br />\n";
      break;

  }

  new_box($lang['task_navigation'], $content, "boxmenu" );
}

//new task
elseif( @safe_integer($_GET['parentid']) ){

  $parentid = $_GET['parentid'];

  //get task parent details
  $q = db_query('SELECT name, parent, projectid FROM '.PRE.'tasks WHERE id='.$parentid );
  if( ! $row = db_fetch_array( $q, 0) )
    error('Task navigate', 'Parent does not exist' );

  //get project name
  $project_name = box_shorten(db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$row['projectid'] ), 0, 0 ) );

  $content .= "<small><b>".$lang['project'].":</b></small><br />\n".
              "&nbsp; <a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['projectid']."\">".$project_name."</a><br />\n";

  switch( $row['parent'] ) {

    case '0':
      //new task under project
      $content .= "<small><b>".$lang['task'].":</b></small><br />\n".
                  "&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\"  />".
                  "<i>".$lang['new_task']."</i><br />\n";
      break;

    default:
      //new task with parent task
      $content .= "<small><b>".$lang['parent_task'].":</b></small><br />\n".
                  "&nbsp; <a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$parentid."\">".$row['name']."</a><br />\n".
                  "<small><b>".$lang['task'].":</b></small><br />\n".
                  "&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\" />".
                  "<i>".$lang['new_task']."</i><br />\n";
      break;

  }

  new_box( $lang['task_navigation'], $content, 'boxmenu' );
}

?>