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

require_once("path.php" );
require_once( BASE."includes/security.php" );

include_once( BASE."config.php" );

//update or insert ?
if( ! isset($_REQUEST["action"]) || strlen($_REQUEST["action"]) == 0 )
  error("File submit", "No action given" );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_REQUEST["action"] ) {

    //handle a file upload
    case "upload":

      //check if there was an upload
      if( ! is_uploaded_file($_FILES["userfile"]["tmp_name"] ) ) {
        //no file upload occurred
        warning($lang["file_submit"], $lang["no_upload"] );
      }

      if( ! isset($_POST["taskid"]) || ! is_numeric($_POST["taskid"]) ) {
        //delete any upload before invoking the error function
        if(is_uploaded_file( $_FILES["userfile"]["tmp_name"] ) )
          unlink( $_FILES["userfile"]["tmp_name"] );
        error("File submit", "Not a valid taskid");
      }

      $taskid = $_POST["taskid"];
      $description = safe_data_long($_POST["description"] );
      //make email adresses and web links clickable
      $description = preg_replace("(([a-z0-9\-\.]+)@([a-z0-9\-\.]+)\.([a-z0-9]+))","<a href=\"mailto:\\0\">\\0</a>", $description );
      $description = preg_replace("/((http|ftp)+(s)?:\/\/[^\s]+)/i", "\n<a href=\"$0\" target=\"new\">$0</a>\n", $description );
      $description = nl2br($description );

      if($_POST["mail_owner"] == "on")
        $mail_owner = true;
      else
        $mail_owner = "";

      if($_POST["mail_group"] == "on")
        $mail_group = true;
      else
        $mail_group = "";

      //check usergroup security
      require_once(BASE."includes/usergroup_security.php" );

      //check the destination directory is writeable by the webserver
      if( ! is_writable($FILE_BASE."/" ) ) {
        unlink($_FILES["userfile"]["tmp_name"] );
        error("Configuration error", "The upload directory does not have write permissions set properly.  File upload has not been accepted.");
      }

      //check for ridiculous uploads
      if($_FILES["userfile"]["size"] > $FILE_MAXSIZE ) {
        unlink($_FILES["userfile"]["tmp_name"] );
        warning($lang["file_submit"], sprintf( $lang["file_too_big_sprt"], $FILE_MAXSIZE ) );
      }

      //check for dangerous file uploads
      if( strstr($_FILES["userfile"]["name"], ".php" ) ||
          strstr($_FILES["userfile"]["name"], ".php3" ) ||
          strstr($_FILES["userfile"]["name"], ".php4" ) ||
          strstr($_FILES["userfile"]["name"], ".js" ) ||
          strstr($_FILES["userfile"]["name"], ".asp" ) ) {
            unlink($_FILES["userfile"]["tmp_name"] );
            error("File submit", "The file types .php, .php3, .php4, .js and .asp are not acceptable for security reasons. You must either rename or compress the file.");
      }

      //okay accept file
      db_begin();
      //alter task lastfileupload
      db_query("UPDATE tasks SET lastfileupload=now() WHERE id=$taskid" );

      //addslashes to stored filename only if magic quotes is 'off'
      //(prevents database errors)
      if( ! get_magic_quotes_gpc() )
        $db_filename = addslashes($_FILES["userfile"]["name"] );
      else
        $db_filename = $_FILES["userfile"]["name"];

      //alter file database administration
      $q = db_query( "INSERT INTO files (filename,
                                            size,
                                            description,
                                            uploaded,
                                            uploader,
                                            taskid,
                                            mime )
                                    VALUES ('$db_filename',
                                            ".$_FILES["userfile"]["size"].",
                                            '$description',
                                            now(),
                                            $uid,
                                            $taskid,
                                            '".$_FILES["userfile"]["type"]."' ) ");

      //copy it
      $last_oid = db_lastoid($q );

      //stripslashes from filename if magic quotes is 'on'
      //(prevents slash being read as a directory in Windows!!)
      if(get_magic_quotes_gpc() )
        $filename = stripslashes($_FILES["userfile"]["name"] );
      else
        $filename = $_FILES["userfile"]["name"];

      if( ! move_uploaded_file( $_FILES["userfile"]["tmp_name"], $FILE_BASE."/".$last_oid."__".$filename ) ) {
        db_query("DELETE FROM files WHERE ".$last_insert."=".$last_oid );
        unlink($_FILES["userfile"]["tmp_name"] );
          db_rollback();
          error("File submit", "Internal error: The file cannot be moved to filebase directory, deleting upload" );
      }

      //work around for mysql (which doesn't have an OID column)
      if(substr($DATABASE_TYPE, 0, 5) == "mysql" )
        db_query("UPDATE files SET oid=".$last_oid." WHERE id=".$last_oid );

      //disarm it
      chmod($FILE_BASE."/".$last_oid."__".$filename, 0644 );
      db_commit();

      //set up emails
      $mail_list = "";
      $s = "";

      //get task data
      $q = db_query("SELECT tasks.name AS name,
                            tasks.usergroupid AS usergroupid,
                            users.email AS email
                            FROM tasks
                            LEFT JOIN users ON (tasks.owner=users.id)
                            WHERE tasks.id=$taskid" );
      $task_row = db_fetch_array($q, 0 );

      //set owner's email
      if($task_row["email"] && $mail_owner ) {
        $mail_list .= $task_row["email"];
        $s = ", ";
      }

      //if usergroup set, add the user list
      if($task_row["usergroupid"] && $mail_group ){
        $q = db_query("SELECT users.email
                              FROM users
                              LEFT JOIN usergroups_users ON (usergroups_users.userid=users.id)
                              WHERE usergroups_users.usergroupid=".$task_row["usergroupid"].
                              " AND users.deleted='f'" );

        for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
          $mail_list .= $s.$row[0];
          $s = ", ";
        }
      }

      //do we need to email?
      if(strlen($mail_list) > 0 ){
        include_once(BASE."includes/email.php" );

        //get & add the mailing list
        if($EMAIL_MAILINGLIST != "" )
          $mail_list .= $s.$EMAIL_MAILINGLIST;

        email($mail_list, $ABBR_MANAGER_NAME." New file upload: ".$task_row["name"], "New file upload by $uid_name:\n".
                          "Filename:    ".$_FILES["userfile"]["name"]."\n".
                          "Description :".$_POST["description"] );
      }

      break;

    case "del":

      if( ! isset($_GET["fileid"] ) || ! is_numeric($_GET["fileid"] ) )
        error("File submit", "Not a valid fileid" );

      $fileid = $_GET["fileid"];

      //get the files from this task
      $q = db_query("SELECT files.uploader AS uploader,
                                   files.oid AS oid,
                                   files.filename AS filename,
                                   tasks.owner AS owner
                                   FROM files
                                   LEFT JOIN tasks ON (files.taskid=tasks.id)
                                   WHERE files.id=$fileid" );

      //show it
      $row = @db_fetch_array($q, 0 );
      //owners of the file and admins can delete files
      if( ($admin==1) || ($uid == $row["owner"] ) || ($uid == $row["uploader"] ) ) {

        //delete file from disk
        if(file_exists($FILE_BASE."/".$row["oid"]."__".$row["filename"] ) ) {
          unlink($FILE_BASE."/".$row["oid"]."__".$row["filename"] );
        }
        //delete record of file
        db_query("DELETE FROM files WHERE oid=".$row["oid"] );
      }
    break;

    default:
      error("File submit", "Invalid request given");
    break;
  }

if(isset($_GET["taskid"]) && $_GET["taskid"] == -1 ) { //can only occur from files.php --> file_admin.php --> delete
  header("Location: ".$BASE_URL."files.php?x=$x&action=admin" );
  die;
}
else {
  header("Location: ".$BASE_URL."tasks.php?x=$x&action=show&taskid=".$_REQUEST["taskid"] );
}

?>
