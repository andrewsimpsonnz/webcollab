<?php
/*
  $Id: task_navigate.php 2170 2009-04-06 07:25:59Z andrewsimpson $

  (c) 2003 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com>

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

$q1 = db_prepare('SELECT task_name FROM '.PRE.'tasks WHERE id=? LIMIT 1' );

//existing task or project
if( @safe_integer($_GET['taskid']) ) {

  $taskid = $_GET['taskid'];

  include_once(BASE.'includes/details.php' );

  $content .= "<ul class=\"menu\">\n<li><small><b>".$lang['project'].":</b></small></li>\n";

  switch($TASKID_ROW['parent'] ) {

    case '0':
      //project
      $content .= "<li>&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\"  />".
                   box_shorten($TASKID_ROW['task_name'])."</li>\n";
      break;

    case ($TASKID_ROW['projectid'] ):
      //task under project

      //get project name (limited to 20 characters)
      db_execute($q1, array($TASKID_ROW['projectid'] ) );
      $project_name = box_shorten(db_result($q1, 0, 0 ) );
      db_free_result($q1 );

      $content .= "<li>&nbsp; <a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$TASKID_ROW['projectid']."\">".$project_name."</a></li>\n".
                  "<li><small><b>".$lang['task'].":</b></small></li>\n".
                  "<li>&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\"  />".
                  box_shorten($TASKID_ROW['task_name'])."</li>\n";
      break;

    default:
      //task with parent task

      //get project name
      db_execute($q1, array($TASKID_ROW['projectid'] ) );
      $project_name = box_shorten(db_result($q1, 0, 0 ) );
      //must clear query before running again
      db_free_result($q1 );
      //get parent name
      db_execute($q1, array($TASKID_ROW['parent'] ) );
      $parent_name = box_shorten(db_result($q1, 0, 0 ) );
      db_free_result($q1 );

      $content .= "<li>&nbsp; <a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$TASKID_ROW['projectid']."\">".$project_name."</a></li>\n".
                  "<li><small><b>".$lang['parent_task'].":</b></small></li>\n".
                  "<li>&nbsp; <a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$TASKID_ROW['parent']."\">".$parent_name."</a></li>\n".
                  "<li><small><b>".$lang['task'].":</b></small></li>\n".
                  "<li>&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\" />".
                  box_shorten($TASKID_ROW['task_name'])."</li>\n";
      break;

  }

  $content .= "</ul>\n";

  new_box($lang['task_navigation'], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );
}

//new task
elseif( @safe_integer($_GET['parentid']) ){

  $parentid = $_GET['parentid'];

  //get task parent details
  $q = db_prepare('SELECT task_name, parent, projectid FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
  db_execute($q, array($parentid ) );
  if( ! $row = db_fetch_array($q, 0 ) ) {
    error('Task navigate', 'Parent does not exist' );
  }

  //get project name
  db_execute($q1, array($row['projectid'] ) );

  $project_name = box_shorten(db_result($q1, 0, 0 ) );
  db_free_result($q1 );

  $content .= "<ul class=\"menu\"><li><small><b>".$lang['project'].":</b></small></li>\n".
              "<li>&nbsp; <a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['projectid']."\">".$project_name."</a></li>\n";

  switch( $row['parent'] ) {

    case '0':
      //new task under project
      $content .= "<li><small><b>".$lang['task'].":</b></small></li>\n".
                  "<li>&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\" />".
                  "<i>".$lang['new_task']."</i></li>\n";
      break;

    default:
      //new task with parent task
      $content .= "<li><small><b>".$lang['parent_task'].":</b></small></li>\n".
                  "<li>&nbsp; <a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$parentid."\">".$row['task_name']."</a></li>\n".
                  "<li><small><b>".$lang['task'].":</b></small></li>\n".
                  "<li>&nbsp; <img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"bullet\" style=\"vertical-align: middle\" />".
                  "<i>".$lang['new_task']."</i></li>\n";
      break;

  }

  $content .= "</ul>\n";

  new_box( $lang['task_navigation'], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );
}

?>
