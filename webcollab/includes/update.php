<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as 2002 by Andrew Simpson.

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
  
  
  This script converts CoreAPM version 1.11 database files to this version.
  
  **Need to add projectid column manually to database**  
  
        # psql -U <username> -e <databasename>
          
          => ALTER TABLE tasks ADD COLUMN projectid integer;
          
          => \q
          
        # 

  Updates all tasks with corresponding projectid

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/screen.php" );
include_once( BASE."includes/database.php" );
include_once( BASE."includes/common.php" );

//start of page
create_top();

//
// List tasks
//

function listTasks( $task_id ) {
   global $projectid;

  // show subtasks that are not complete
  $q_tasks = db_query( "SELECT id, name
                        FROM tasks
                        WHERE parent=".$task_id ) ;

  if( !$q_tasks or pg_numrows( $q_tasks ) == 0)
    return;

   $content = "";

   for( $iter=0 ; $task_row = @pg_fetch_array($q_tasks, $iter, PGSQL_ASSOC) ; $iter++) {

     $q = db_query( "UPDATE tasks SET projectid=".$projectid." WHERE id=".$task_row["id"] );

     $content .= "<LI>Updating ".$task_row["name"]."</LI>";

     $content .= listTasks( $task_row[ "id" ] );
   }

return $content;
}



//
//START OF MAIN PROGRAM
//

if( $admin != 1 ) {
  error( "Not permitted", "This function is for admins only" );
  return;
}

$content = "";

//query to get the all the projects
$query = db_query( "SELECT id, name
	            FROM tasks
		    WHERE parent = 0
    		    ORDER BY name" );

// check if there are projects
if( pg_numrows( $query ) < 1 ) {
  new_box("There aren't any projects",
	  "No point in continuing!");
  return;
}

for( $iter=0 ; $task_row = @pg_fetch_array( $query, $iter, PGSQL_ASSOC ) ; $iter++) {

  $projectid = $task_row["id"];

  $q = db_query( "UPDATE tasks SET projectid=".$projectid." WHERE id=".$task_row["id"] );
  $content .= "<UL><B>Project: ".$task_row["name"]." has been updated</B></UL>\n";

  $new_content = listTasks( $task_row["id"] );

  //if no task, don't show project name either
  if( $new_content != "")
    $content .= "<UL>".$new_content."</UL>\n";
  else
    $content .= "<UL>No tasks for this project</UL>\n";

}

new_box( "Results", $content );

//finish page
create_bottom();

?>
