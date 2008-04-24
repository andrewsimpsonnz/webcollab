<?php
/*
  $Id$

  (c) 2002 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/email.php' );

//deny guest users
if(GUEST ){
 warning($lang['access_denied'], $lang['not_owner'] );
}

//secure variables
$mail_list = array();
$upload_success_flag = false;
$file_update_flag = false;

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//
// File delete function
//
function file_delete($fileid ) {

  //get the file details with this fileid
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
  return;
}

//MAIN PROGRAM

//update or insert ?
if(empty($_REQUEST['action']) ){
  error('File submit', 'No action given' );
}

switch($_REQUEST['action'] ) {

  //handle a file upload
  case 'submit_update':
    $file_update_flag = true;

  case 'submit_upload':

    if(! @safe_integer($_POST['taskid']) ) {
      error('File submit', 'Not a valid taskid');
    }

    $taskid = $_POST['taskid'];

    $description = safe_data_long($_POST['description'] );

    //check usergroup security
    $taskid = usergroup_check($taskid );

    $input_array = array('mail_owner', 'mail_group' );
    foreach($input_array as $var ) {
      if(isset($_POST[$var] ) &&  ($_POST[$var] == 'on' ) ) {
        ${$var} = true;
      }
      else {
        ${$var} = false;
      }
    }

    //check the destination directory is writeable by the webserver
    if( ! is_writable(FILE_BASE.'/' ) ) {
      error('Configuration error', 'The upload directory does not have write permissions set properly, or the directory does not exist.  File upload has not been accepted.');
    }

    //get data for email - if required
    if($mail_owner || $mail_group ) {

      //get task data
      $q = db_query('SELECT '.PRE.'tasks.name AS name,
                            '.PRE.'tasks.usergroupid AS usergroupid,
                            '.PRE.'tasks.projectid AS projectid,
                            '.PRE.'users.email AS email
                            FROM '.PRE.'tasks
                            LEFT JOIN '.PRE.'users ON ('.PRE.'tasks.owner='.PRE.'users.id)
                            WHERE '.PRE.'tasks.id='.$taskid.' LIMIT 1' );

      $task_row = db_fetch_array($q, 0 );

      $project = db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$task_row['projectid'].' LIMIT 1' ), 0, 0 );

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

        for( $j=0 ; $row = @db_fetch_num($q, $j ) ; ++$j ) {
          $mail_list[] = $row[0];
        }
      }
    }

    //update only does one file, upload does multiple files
    $upload_count = ($file_update_flag ) ? 1 : NUM_FILE_UPLOADS;

    //now start looking at each uploaded file...
    for($i = 0; $i < $upload_count; ++$i ) {
      //check if there was an upload
      if( ! @is_uploaded_file($_FILES['userfile']['tmp_name'][$i] ) ) {
        //no file upload occurred
        continue;
      }

      //check for any uploading errors
      switch($_FILES['userfile']['error'][$i] ) {
        case 0:
          //normal upload
          break;

        case 1:
          error($lang['file_submit'], "Uploaded file ".($i+1)." exceeds the upload_max_filesize directive in php.ini" );
          break;

        case 2:
          error($lang['file_submit'], "Uploaded file ".($i+1)." exceeds maximum allowed file size" );
          break;

        case 3:
          warning($lang['file_submit'], "Uploaded file ".($i+1)." was only partially uploaded" );
          break;

        case 4:
          warning($lang['file_submit'], $lang['no_upload'] );
          break;

        case 6:
          error($lang['file_submit'], "Missing a temporary folder" );
          break;

        case 7:
          error($lang['file_submit'], "Failed to write file to disk" );
          break;

        case 8:
          error($lang['file_submit'], "File upload stopped by extension" );
          break;

        default:
          error($lang['file_submit'], "Unknown file upload error on file ".($i+1)." with error code ".$_FILES['userfile']['error'][$i] );
          break;
      }

      //check for zero length files
      if($_FILES['userfile']['size'][$i] == 0 ) {
        unlink($_FILES['userfile']['tmp_name'][$i] );
        warning($lang['file_submit'], $lang['no_upload'] );
      }

      //check for ridiculous uploads
      if($_FILES['userfile']['size'][$i] > FILE_MAXSIZE ) {
        unlink($_FILES['userfile']['tmp_name'][$i] );
        warning($lang['file_submit'], sprintf( $lang['file_too_big_sprt'], FILE_MAXSIZE ) );
      }

      //check for dangerous file uploads
      if(preg_match('/\.(php|php3|php4|js|asp)$/', $_FILES['userfile']['name'][$i] ) ) {
        unlink($_FILES['userfile']['tmp_name'][$i] );
        error('File submit', 'The file types .php, .php3, .php4, .js and .asp are not acceptable for security reasons. You must either rename or compress the file.');
      }

      //add default mime type if not specified
      if(empty($_FILES['userfile']['type'][$i] ) || $_FILES['userfile']['type'][$i] == '' ) {
        $mime = "application/octet-stream";
      }
      else {
        $mime = $_FILES['userfile']['type'][$i];
      }

      //okay accept file
      db_begin();

      //validate characters in filename
      $filename = validate($_FILES['userfile']['name'][$i] );

      //limit file name to 200 characters - should be enough for any sensible(!) file name :-)
      $filename = substr($filename, 0, 200 );
      //strip illegal characters
      $filename = preg_replace('/[\x00-\x2A\x2F\x3A-\x3C\x3E-\x3F\x5C\x5E\x60\x7B-\x7E]|[\.]{2}/', '_', $filename );

      //escape for database
      $db_filename = db_escape_string($filename );

      //alter file database administration
      db_query( "INSERT INTO ".PRE."files (filename,
                                          size,
                                          description,
                                          uploaded,
                                          uploader,
                                          taskid,
                                          mime )
                                  VALUES ('".$db_filename."',
                                          ".$_FILES['userfile']['size'][$i].",
                                          '$description',
                                          now(),
                                          ".UID.",
                                          ".$taskid.",
                                          '".$mime."' )" );

      //get last insert id
      $fileid = db_lastoid('files_id_seq' );

      //copy it
      if( ! move_uploaded_file( $_FILES['userfile']['tmp_name'][$i], FILE_BASE.'/'.$fileid.'__'.$filename ) ) {
        db_query('DELETE FROM '.PRE.'files WHERE id='.$fileid );
        unlink($_FILES['userfile']['tmp_name'][$i] );
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

      //do we need to email?
      if(sizeof($mail_list) > 0 ) {
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

        email($mail_list, sprintf($title_file_post, $task_row['name'] ), sprintf($email_file_post, UID_NAME, $_FILES['userfile']['name'][$i], $message_unclean, $project, $task_row['name'], 'index.php?taskid='.$taskid ) );
      }

      //record at least one succesful file upload
      $upload_success_flag = true;
    }

    //check that at least one file upload was successful
    if( ! $upload_success_flag ) {
      warning($lang['file_submit'], $lang['no_upload'] );
    }

    //if we are updating, we remove the old replaced file now
    if($file_update_flag ) {

      if( ! @safe_integer($_POST['old_fileid']) ) {
        error('File submit', 'Not a valid fileid' );
      }
      //do a file delete for the old replaced file
      file_delete($_POST['old_fileid'] );
    }

    break;

  case 'submit_del':

    if( ! @safe_integer($_GET['fileid']) ) {
      error('File submit', 'Not a valid fileid' );
    }

    //do the file delete for the file
    file_delete($_GET['fileid'] );
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