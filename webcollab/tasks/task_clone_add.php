<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file written in 2004 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

require_once("path.php" );
require_once(BASE."includes/security.php" );

//admins only
if($admin != 1 )
  error("Unauthorised access", "This function is for admins only." );

if( ! isset($_GET["taskid"]) && ! is_numeric($_GET["taskid"]) )
  error("Task clone", "Taskid not set" );

$taskid = $_GET["taskid"];

$content = "";

$content .= "<form name=\"inputform\" method=\"POST\" action=\"tasks/task_clone_submit.php\">\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n ".
            "<input type=\"hidden\" name=\"taskid\" value=\"$taskid\" />\n".
            "<p><table border=\"0\">\n";

$q = db_query("SELECT name, parent FROM tasks WHERE id=$taskid" );

$row = db_fetch_array($q, 0 );

if($row["parent"] == 0 ){
  $content .= "<tr><td>Original project name - translate me :</td><td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=$taskid\">".$row["name"]."</a></td></tr>\n".
              "<tr><td>".$lang["project_name"].":</td> <td><input type=\"text\" name=\"name\" size=\"30\" /></td> </tr>\n".
              "</table></p>\n".
              "<p><input type=\"submit\" value=\"".$lang["add_task"]."\" />&nbsp;".
              "<input type=\"reset\" value=\"".$lang["reset"]."\" /></p>".
              "</form>\n";

  new_box( $lang["add_project"], $content );

}
else{
  $content .= "<tr><td>Original task name - translate me :</td><td><a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=$taskid\">".$row["name"]."</a></td></tr>\n".
              "<tr><td>".$lang["task_name"].":</td> <td><input type=\"text\" name=\"name\" size=\"30\" /></td> </tr>\n".
              "</table></p>\n".
              "<p><input type=\"submit\" value=\"".$lang["add_task"]."\" />&nbsp;".
              "<input type=\"reset\" value=\"".$lang["reset"]."\" /></p>".
              "</form>\n";

  new_box( $lang["add_task"], $content );
}

?>