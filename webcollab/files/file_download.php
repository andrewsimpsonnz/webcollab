<?php
/*
  $Id: file_download.php 2254 2009-07-24 09:31:32Z andrewsimpson $

  (c) 2003 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Lists files assigned to a task

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/usergroup_security.php' );

//set variables
$fp = '';

if( ! @safe_integer($_GET['fileid']) ){
  error('Download file', 'Not a valid fileid' );
}

$fileid = $_GET['fileid'];

//get the files info
$q = db_prepare('SELECT fileid, hashid, filename, file_size, mime, taskid FROM '.PRE.'files WHERE id=? LIMIT 1');
db_execute($q, array($fileid ) );

if( ! $row = db_fetch_array($q, 0) ) {
  error('Download file', 'Invalid fileid given' );
}

//check usergroup security
$taskid = usergroup_check($row['taskid'] );

//check the file exists
if($row['hashid'] && file_exists( FILE_BASE.'/'.$row['fileid'].'__'.$row['hashid'] ) ) {
  $stored_filename = $row['hashid'];
}
//check for pre-Webcollab 3.40 files
elseif(file_exists( FILE_BASE.'/'.$row['fileid'].'__'.$row['filename'] ) ) {
  $stored_filename = $row['filename'];
}
//check for pre-WebCollab 2.71 files stored in character sets other than UTF-8
elseif(defined('FILENAME_CHAR_SET' ) && file_exists( FILE_BASE.'/'.$row['fileid'].'__'.mb_convert_encoding($row['filename'], FILENAME_CHAR_SET ) ) ) {
  $stored_filename = mb_convert_encoding($row['filename'], FILENAME_CHAR_SET );
}
else {
  error('Download file', 'The file '.$row['filename'].' is missing from the server' );
}

//open the file
if( ! ($fp = @fopen( FILE_BASE.'/'.$row['fileid'].'__'.$stored_filename, 'rb' ) ) ) {
  error('Download file', 'File handle for '.$row['filename'].' cannot be opened' );
}

//get rid of some problematic system settings
while(@ob_end_clean() );
@ini_set('zlib.output_compression', 'Off');

//uncomment the line below if PHP script timeout occurs before download finishes
@set_time_limit(0);

//these headers are for IE 6
header('Pragma: public');
header('Cache-Control: no-store, max-age=0, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Cache-control: private');

if(! defined('FILE_DOWNLOAD' ) ) {
  define('FILE_DOWNLOAD', 'inline' );
}

//provide encoding for non-ASCII characters in filename (RFC 5987)
switch(preg_match('/([\x7F-\xFF])/', $row['filename'] ) ) {
  case true:
    //provide UTF-8 encoding tokens (RFC 5987), plus fallback of filename in ISO-8859-1
    $content_filename =  'filename="'.mb_convert_encoding($row['filename'], 'ISO-8859-1' ).'"; '.
                         "filename*=UTF-8''".preg_replace_callback('/([\x20\x7F-\xFF])/', create_function('$char', 'return sprintf("%%%02X", ord($char[1]) );'), $row['filename'] );
    break;

  case false:
    $content_filename = 'filename="'.$row['filename'].'"';
    break;
}

//send the headers describing the file type
switch (FILE_DOWNLOAD ) {

  case 'attachment':
    header("Content-Type: application/octet-stream");
    header('Content-Disposition: attachment; '.$content_filename );
    header("Content-Transfer-Encoding: binary\n");
    header('Content_Length: '.$row['file_size'] );
    break;

  case 'inline':
  default:
    header('Content-Type: '.$row['mime']);
    header('Content-Disposition: inline; '.$content_filename );
    header('Content_Length: '.$row['file_size'] );
    break;
}

//send it
//fpassthru($fp);

if(connection_status() != 0 ) exit;

while((! feof($fp ) ) && (connection_status() == 0 ) ) {
  print(fread($fp, 1024*8 ) );
  flush();
}

fclose ($fp);

//don't send any more characters (would corrupt data in download)
exit;
?>
