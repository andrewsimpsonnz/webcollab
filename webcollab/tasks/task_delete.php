<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Deletes a task

*/
require_once("path.php" );
require_once( BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );
include_once(BASE."includes/email.php" );
include_once(BASE."config.php" );


//
// Finds children recursively and puts them in an array
//
function find_and_report_children($taskid ) {

  global $arrayindex, $ids;

  //query for children
  if( ! ($q = db_query("SELECT id FROM tasks WHERE parent=$taskid", 0 ) ) ) return;
  if(db_numrows($q) == 0 ) return;

  //loop all children and put them in an array
  for($i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
    $ids[$arrayindex] = $row[0];
    $arrayindex++;
    find_and_report_children($row[0] );
  }

  return;
}


//
// advanced database-wide task-delete !!
//
if(isset($_REQUEST["taskid"]) && is_numeric($_REQUEST["taskid"]) ) {

   $taskid = $_REQUEST["taskid"];

  //can this user delete this task ?
  if( ! ( ($admin == 1) || (db_result(db_query("SELECT COUNT(*) FROM tasks WHERE id=$taskid AND owner=$uid" ), 0, 0 ) == 1 ) ) )
    error("Access denied", "You do not own this task and therefore you may not delete it. Ask an admin or the tasks' owner to do this for you.");

  //does the task exist ?
  if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE id=$taskid" ), 0, 0 ) == 0 )
    error("Task delete", "Sorry but that task does not exist." );

  //find our return-location
  if( ($parentid = db_result(db_query("SELECT parent FROM tasks WHERE id=$taskid" ), 0, 0)) == 0 )
    $returnvalue = "main.php?x=$x";
  else
    $returnvalue = "tasks.php?x=$x&action=show&taskid=$parentid";

  //begin transaction
  db_begin();

  //get task and owner information
  $q = db_query("SELECT tasks.parent AS parent,
            tasks.projectid AS projectid,
            tasks.name AS name,
            tasks.text AS text,
            tasks.status AS status,
            users.id AS id,
            users.email AS email
            FROM tasks
            LEFT JOIN users ON (users.id=tasks.owner)
            WHERE tasks.id=$taskid" );

  //if there is no line, the task is not owned
  if(db_numrows($q) > 0 ) {
    $row = @db_fetch_array($q, 0 );
  }

  //add the task itself
  $ids[0] = $taskid;

  //find all recursively linked children
  $arrayindex=1;
  find_and_report_children( $taskid );

  /* delete:
  - all forum posts linked to it
  - the entry in the seen table
  - the item itself
  - files
  */
  for($i=0 ; $i < $arrayindex ; $i++ ) {

    //delete all from seen table
    db_query("DELETE FROM seen WHERE taskid=".$ids[$i] );

    //delete forum posts
    db_query("DELETE FROM forum WHERE taskid=".$ids[$i] );

    //delete all files physically
    $fq = db_query("SELECT oid, filename FROM files WHERE taskid=".$ids[$i] );
    for($j=0 ; $frow = @db_fetch_array($fq, $j ) ; $j++) {

      if(file_exists($FILE_BASE."/".$row["oid"]."__".$row["filename"] ) ) {
        unlink( $FILE_BASE."/".$row["oid"]."__".$row["filename"] );
      }
    }

    //delete all files attached to it in the database
    db_query("DELETE FROM files WHERE taskid=".$ids[$i] );

    //delete item
    db_query("DELETE FROM tasks WHERE id=".$ids[$i] );

  }
  //transaction complete
  db_commit();

  //inform the user that his task has been deleted by an admin
  if(db_numrows($q) > 0 ) {
    if($uid != $row["id"] ) {
       if($row["parent"] == 0 ) {
         $name_task = $row["name"];
         $type = $lang["project"];
       }
       else {
         $name_task = db_result(db_query("SELECT name FROM tasks WHERE tasks.id=".$row["projectid"] ), 0, 0 );
         $type = $lang["task"];
       }
       switch($row["status"] ) {
         case "created":
           $status = $task_state["new"];
           break;

         case "notactive":
           $status = $task_state["planned"];
           break;

         case "active":
           $status = $task_state["active"];
           break;

         case "cantcomplete":
           $status = $task_state["cantcomplete"];
           break;

         case "done":
           $status = $task_state["done"];
           break;

         default:
           $status = "";
           break;
       }
       include_once(BASE."lang/".$LOCALE."_email.php" );
       $message = sprintf( $email_delete_task, $MANAGER_NAME, $type, date("F j, Y, H:i"), $name_task, $row["name"],$status, clean($row["text"]) );
       email($row["email"], sprintf($title_delete_task, ucfirst($type) ), $message );
    }
  }
}

  header("location: ".$returnvalue);

?>
