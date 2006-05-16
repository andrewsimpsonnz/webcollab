<?php
/*
  $Id$

  (c) 2002 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Handle file uploads and deletes

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
include_once(BASE.'includes/usergroup_security.php' );

//deny guest users
if(GUEST ){
 warning($lang['access_denied'], $lang['not_owner'] );
}

//secure variables
$mail_list = array();

//update or insert ?
if(empty($_REQUEST['action']) ){
  error('File submit', 'No action given' );
}

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

  switch($_REQUEST['action'] ) {

    //handle a file upload
    case 'submit_upload':

      //check if there was an upload
      if( ! is_uploaded_file($_FILES['userfile']['tmp_name'] ) ) {
        //no file upload occurred
        switch($_FILES['userfile']['error'] ) {
          case 1:
            error($lang['file_submit'], "The uploaded file exceeds the upload_max_filesize directive in php.ini" );
            break;

          case 2:
            error($lang['file_submit'], "The uploaded file exceeds maximum allowed file size" );
            break;

          case 3:
            warning($lang['file_submit'], "The uploaded file was only partially uploaded" );
            break;

          case 4:
            warning($lang['file_submit'], $lang['no_upload'] );
            break;

          case 6:
            error($lang['file_submit'], "Missing a temporary folder" );
            break;

          default:
            error($lang['file_submit'], "Unknown file upload error with error code ".$_FILES['userfile']['tmp_name'] );
            break;
        }
      }

      if(! @safe_integer($_POST['taskid']) ) {
        //delete any upload before invoking the error function
        if(is_uploaded_file( $_FILES['userfile']['tmp_name'] ) ) {
          unlink( $_FILES['userfile']['tmp_name'] );
        }
        error('File submit', 'Not a valid taskid');
      }

      $taskid = $_POST['taskid'];
      $description = safe_data_long($_POST['description'] );
      //make email adresses and web links clickable
      $description = html_links($description, 1 );

      $input_array = array('mail_owner', 'mail_group' );
      foreach($input_array as $var ) {
        if(isset($_POST[$var] ) &&  ($_POST[$var] == 'on' ) ) {
          ${$var} = true;
        }
        else {
          ${$var} = false;
        }
      }

      //check usergroup security
      $taskid = usergroup_check($taskid );

      //check the destination directory is writeable by the webserver
      if( ! is_writable(FILE_BASE.'/' ) ) {
        unlink($_FILES['userfile']['tmp_name'] );
        error('Configuration error', 'The upload directory does not have write permissions set properly, or the directory does not exist.  File upload has not been accepted.');
      }

      //check for zero length files
      if($_FILES['userfile']['size'] == 0 ) {
        unlink($_FILES['userfile']['tmp_name'] );
        warning($lang['file_submit'], $lang['no_upload'] );
      }

      //check for ridiculous uploads
      if($_FILES['userfile']['size'] > FILE_MAXSIZE ) {
        unlink($_FILES['userfile']['tmp_name'] );
        warning($lang['file_submit'], sprintf( $lang['file_too_big_sprt'], FILE_MAXSIZE ) );
      }

      //check for dangerous file uploads
     if(preg_match('/\.(php|php3|php4|js|asp)$/', $_FILES['userfile']['name'] ) ) {
            unlink($_FILES['userfile']['tmp_name'] );
            error('File submit', 'The file types .php, .php3, .php4, .js and .asp are not acceptable for security reasons. You must either rename or compress the file.');
      }

      if(empty($_FILES['userfile']['type']) || $_FILES['userfile']['type'] == '' ) {
        $mime = "application/octet-stream";
      }
      else {
        $mime = $_FILES['userfile']['type'];
      }

      //okay accept file
      db_begin();

      //validate characters in filename
      $filename = validate($_FILES['userfile']['name'] );

      //limit file name to 200 characters - should be enough for any sensible(!) file name :-)
      $filename = substr($filename, 0, 200 );
      //strip illegal characters
      $filename = preg_replace('/[\x00-\x2a\x2f\x3a-\x3c\x3e-\x3f\x5c\x5e\x60\x7b-\x7e]|[\.]{2}/', '_', $filename );

      //escape for database
      $db_filename = db_escape_string($filename );

      //alter file database administration
      $q = db_query( "INSERT INTO ".PRE."files (filename,
                                            size,
                                            description,
                                            uploaded,
                                            uploader,
                                            taskid,
                                            mime )
                                    VALUES ('$db_filename',
                                            ".$_FILES['userfile']['size'].",
                                            '$description',
                                            now(),
                                            ".UID.",
                                            $taskid,
                                            '".$mime."' )" );

      //get last insert id
      $fileid = db_lastoid('files_id_seq' );

      //copy it
      if( ! move_uploaded_file( $_FILES['userfile']['tmp_name'], FILE_BASE.'/'.$fileid.'__'.$filename ) ) {
        db_query('DELETE FROM '.PRE.'files WHERE id='.$fileid );
        unlink($_FILES['userfile']['tmp_name'] );
        db_rollback();
        error('File submit', 'Internal error: The file cannot be moved to filebase directory, deleting upload' );
      }

      //set the fileid in the database
      db_query('UPDATE '.PRE.'files SET fileid='.$fileid.' WHERE id='.$fileid );

      //alter task lastfileupload
      db_query('UPDATE '.PRE.'tasks SET lastfileupload=now() WHERE id='.$taskid );

      //make the file non-executable for security
      chmod(FILE_BASE.'/'.$fileid.'__'.$filename, 0644 );

      //success!
      db_commit();

      //get task data
      $q = db_query('SELECT '.PRE.'tasks.name AS name,
                            '.PRE.'tasks.usergroupid AS usergroupid,
                            '.PRE.'users.email AS email
                            FROM '.PRE.'tasks
                            LEFT JOIN '.PRE.'users ON ('.PRE.'tasks.owner='.PRE.'users.id)
                            WHERE '.PRE.'tasks.id='.$taskid );

      $task_row = db_fetch_array($q, 0 );

      //set owner's email
      if($task_row['email'] && $mail_owner ) {
        $mail_list[] = $task_row['email'];
      }

      //if usergroup set, add the user list
      if($task_row['usergroupid'] && $mail_group ){
        $q = db_query('SELECT '.PRE.'users.email
                              FROM '.PRE.'users
                              LEFT JOIN '.PRE.'usergroups_users ON ('.PRE.'usergroups_users.userid='.PRE.'users.id)
                              WHERE '.PRE.'usergroups_users.usergroupid='.$task_row['usergroupid'].
                              ' AND '.PRE.'users.deleted=\'f\'' );

        for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
          $mail_list[] = $row[0];
        }
      }

      //do we need to email?
      if(sizeof($mail_list) > 0 ){
        include_once(BASE.'includes/email.php' );
        include_once(BASE.'lang/lang_email.php' );

        $message_unclean = $_POST['description'];

        //get rid of magic_quotes - it is not required here
        if(get_magic_quotes_gpc() ) {
          $message_unclean = stripslashes($message_unclean );
        }

        //get & add the mailing list
        if(sizeof($EMAIL_MAILINGLIST ) > 0 ){
          $mail_list = array_merge((array)$mail_list, (array)$EMAIL_MAILINGLIST );
        }
        email($mail_list, sprintf($title_file_post, $task_row['name'] ), sprintf($email_file_post, UID_NAME, $_FILES['userfile']['name'], $message_unclean, 'index.php?taskid='.$taskid ) );
      }

      break;

    case 'submit_del':

      if( ! @safe_integer($_GET['fileid']) ) {
        error('File submit', 'Not a valid fileid' );
      }

      $fileid = $_GET['fileid'];

      //get the files from this task
      $q = db_query('SELECT '.PRE.'files.uploader AS uploader,
                                   '.PRE.'files.fileid AS fileid,
                                   '.PRE.'files.filename AS filename,
                                   '.PRE.'tasks.owner AS owner
                                   FROM '.PRE.'files
                                   LEFT JOIN '.PRE.'tasks ON ('.PRE.'files.taskid='.PRE.'tasks.id)
                                   WHERE '.PRE.'files.id='.$fileid );

      if(db_numrows($q ) != 0 ) {
         //show it
        $row = @db_fetch_array($q, 0 );
        //owners of the file and admins can delete files
        if( (ADMIN ) || (UID == $row['owner'] ) || (UID == $row['uploader'] ) ) {

          //delete file from disk
          if(file_exists(FILE_BASE.'/'.$row['fileid'].'__'.$row['filename'] ) ) {
            unlink(FILE_BASE.'/'.$row['fileid'].'__'.$row['filename'] );
          }
          //delete record of file
          db_query('DELETE FROM '.PRE.'files WHERE fileid='.$row['fileid'] );
        }
      }
    break;

    default:
      error('File submit', 'Invalid request given');
    break;
  }

if(isset($_GET['taskid']) && $_GET['taskid'] == -1 ) { //can only occur from files.php --> file_admin.php --> delete
  header('Location: '.BASE_URL.'files.php?x='.$x.'&action=admin' );
  die;
}
else {
  header('Location: '.BASE_URL.'tasks.php?x='.$x.'&action=show&taskid='.$_REQUEST['taskid'] );
  die;
}

?>