<?php
/*
  $Id: task_clone_add.php 2270 2009-08-14 06:58:03Z andrewsimpson $

  (c) 2004 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Clone a project in the database

*/


//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/time.php' );

//guests shouldn't get here
if(GUEST ) {
  warning($lang['access_denied'], $lang['not_owner'] );
}

if(! @safe_integer($_GET['taskid']) ) {
  error('Task clone', 'Taskid not set' );
}

$taskid = $_GET['taskid'];

//generate_token
generate_token('tasks' );

$content = '';

$content .= "<form method=\"post\" action=\"tasks.php\" onsubmit=\"return fieldCheck('name')\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n ".
            "<input type=\"hidden\" name=\"action\" value=\"submit_clone\" />\n ".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" />\n".
            "<input type=\"hidden\" id=\"token\" name=\"token\" value=\"".TOKEN."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert\" value=\"".$lang['missing_field_javascript']."\" /></fieldset>\n".
            "<table class=\"celldata\">\n";

$q = db_prepare('SELECT task_name, parent FROM '.PRE.'tasks WHERE id=?' );
db_execute($q, array($taskid ) );

$row = db_fetch_array($q, 0 );

if($row['parent'] == 0 ){
  $content .= "<tr><td>".$lang['project_cloned']."</td><td><a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$taskid."\">".$row['task_name']."</a></td></tr>\n".
              "<tr><td>".$lang['project_name'].":</td> <td><input id=\"name\" type=\"text\" name=\"name\" class=\"size\" />".
              "<script type=\"text/javascript\">document.getElementById('name').focus();</script></td></tr>\n".
              "<tr><td>".$lang['deadline'].":</td> <td>".date_select()."</td></tr>\n".
              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang['add_project']."\" /></p>".
              "</form>\n";

  new_box( $lang['add_project'], $content );

}
else{
  $content .= "<tr><td>".$lang['task_cloned']."</td><td><a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$taskid."\">".$row['task_name']."</a></td></tr>\n".
              "<tr><td colspan=\"2\"><i>".$lang['note_clone']."</i></td></tr>\n".
              "<tr><td>".$lang['project_name'].":</td> <td><input id=\"name\" type=\"text\" name=\"name\" class=\"size\" /></td> </tr>\n".
              "<tr><td>".$lang['deadline'].":</td> <td>".date_select()."</td></tr>\n".
              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang['add_project']."\"/></p>".
              "</form>\n";

  new_box( $lang['add_task'], $content );
}

?>
