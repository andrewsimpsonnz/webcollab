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

  Handle file uploads and deletes

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."config.php" );

//update or insert ?
if( isset($_REQUEST["action"]) && valid_string($_REQUEST["action"]) ) {

  switch( $_REQUEST["action"] ) {

    //handle a file upload
    case "upload":

      if( ! isset($_POST["taskid"]) || ! is_numeric($_POST["taskid"]) ) {
        //delete any upload before invoking the error function
        if( is_uploaded_file( $_FILES["userfile"]["tmp_name"] ) ){
          unlink( $_FILES["userfile"]["tmp_name"] );
        }
        error("File submit", "Not a valid taskid");
      }

      $taskid = $_POST["taskid"];
      $description = safe_data($_POST["description"]);

      //check usergroup security
      include_once( BASE."includes/usergroup_security.php" );

      //check if there was an upload
      if( is_uploaded_file( $_FILES["userfile"]["tmp_name"] ) ) {

        //check the destination directory is writeable by the webserver
        if( ! is_writable( $FILE_BASE."/" ) ) {
          unlink( $_FILES["userfile"]["tmp_name"] );
          error("Configuration error", "The upload directory does not have write permissions set properly.  File upload has not been accepted.");
        }

        //check for ridiculous uploads
        if( $_FILES["userfile"]["size"] > $FILE_MAXSIZE ) {
          warning( $lang["file_submit"], sprintf( $lang["file_too_big_sprt"], $FILE_MAXSIZE ) );
          unlink( $_FILES["userfile"]["tmp_name"] );
        }

        //check for dangerous file uploads
        if( strstr( $_FILES["userfile"]["name"], ".php" ) ||
          strstr( $_FILES["userfile"]["name"], ".php3" ) ||
          strstr( $_FILES["userfile"]["name"], ".php4" ) ||
          strstr( $_FILES["userfile"]["name"], ".js" ) ||
          strstr( $_FILES["userfile"]["name"], ".asp" ) ) {
            unlink( $_FILES["userfile"]["tmp_name"] );
            error("File submit", "The file types .php, .php3, .php4, .js and .asp are not acceptable for security reasons. You must either rename or compress the file.");
        }

        //okay accept file
        db_begin();
        //alter task lastfileupload
        db_query( "UPDATE tasks SET lastfileupload=current_timestamp(0) WHERE id=".$taskid );

        //alter file database administration
        $upload_q = db_query( "INSERT INTO files (filename,
                                                    size,
                                                    description,
                                                    uploaded,
                                                    uploader,
                                                    taskid,
                                                    mime )
                                VALUES ('".$_FILES["userfile"]["name"]."',
                                                    ".$_FILES["userfile"]["size"].",
                                                    '$description',
                                                    current_timestamp(0),
                                                    $uid,
                                                    $taskid,
                                                    '".$_FILES["userfile"]["type"]."' ) ");

        //copy it
        $last_oid = db_lastoid( $upload_q);
        if( !move_uploaded_file( $_FILES["userfile"]["tmp_name"], $FILE_BASE."/".$last_oid."__".$_FILES["userfile"]["name"] ) ) {
          db_query( "DELETE FROM files WHERE ".$last_insert."=".$last_oid );
          unlink( $_FILES["userfile"]["tmp_name"] );
          db_rollback();
          error( "File submit", "Internal error: The file cannot be moved to filebase directory, deleting upload" );
        }

        //work around for mysql (which doesn't have an OID column)
        if(substr($DATABASE_TYPE, 0, 5) == "mysql" )
          db_query( "UPDATE files SET oid=".$last_oid." WHERE id=".$last_oid );

        //disarm it
        chmod( $FILE_BASE."/".$last_oid."__".$_FILES["userfile"]["name"], 0644 );
        db_commit();

      }
      else{
        //no file upload occurred
        warning($lang["file_submit"], $lang["no_upload"] );
      }
      break;

   case "del":

      if(isset($_GET["fileid"] ) && is_numeric($_GET["fileid"] ) ) {

        $fileid = $_GET["fileid"];

        //get the files from this task
        $file_q = db_query("SELECT tasks.owner as owner, files.uploader as uploader, files.oid as oid, filename
                             FROM files LEFT JOIN tasks ON (files.taskid=tasks.id) WHERE files.id=$fileid" );

        //show them
        for($i=0 ; $row = @db_fetch_array($file_q, $i) ; $i++) {

          //owners of the file and admins can delete files
          if( ($admin==1) || ($uid == $row["owner"] ) || ($uid == $row["uploader"] ) ) {

            //delete file from disk
            if(file_exists( $FILE_BASE."/".$row["oid"]."__".$row["filename"] ) ) {
              unlink( $FILE_BASE."/".$row["oid"]."__".$row["filename"] );
            }
            //delete record of file
            db_query( "DELETE FROM files WHERE oid=".$row["oid"] );
          }
        }
      }
   break;

   default:
      error("File submit", "Invalid request given");
   break;
  }
}
else
  error("File submit", "No action given" );

if(isset($_GET["taskid"]) && $_GET["taskid"] == -1 ) //can only occur from files.php --> file_admin.php --> delete
  header("location: ".BASE."files.php?x=$x&action=admin" );
else
  header("location: ".BASE."tasks.php?x=$x&action=show&taskid=".$_REQUEST["taskid"] );
?>
