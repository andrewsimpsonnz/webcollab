<?php
/*
  $Id$

  (c) 2003 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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
if( ! ($q = db_query('SELECT fileid, filename, size, mime, taskid FROM '.PRE.'files WHERE id='.$fileid.' LIMIT 1', 0 ) ) )  {
  error('Download file', 'There was an error in the data query');
}

if( ! $row = db_fetch_array( $q, 0) ) {
  error('Download file', 'Invalid fileid given' );
}

//check usergroup security
$taskid = usergroup_check($row['taskid'] );

//check the file exists
if( ! ( file_exists( FILE_BASE.'/'.$row['fileid'].'__'.($row['filename'] ) ) ) ) {
  error('Download file', 'The file '.$row['filename'].' is missing from the server' );
}

//open the file
if( ! ($fp = @fopen( FILE_BASE.'/'.$row['fileid'].'__'.($row['filename']), 'rb' ) ) ) {
  error('Download file', 'File handle for '.$row['filename'].' cannot be opened' );
}

//get rid of some problematic system settings
@ob_end_clean();
@ini_set('zlib.output_compression', 'Off');

//uncomment the line below if PHP script timeout occurs before download finishes
//@set_time_limit(0);

//these headers are for IE 6
header('Pragma: public');
header('Cache-Control: no-store, max-age=0, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Cache-control: private');

//send the headers describing the file type
header('Content-Type: '.$row['mime']);
header('Content-Disposition: inline; filename='.$row['filename']);
header('Content_Length: '.$row['size'] );

//send it
fpassthru($fp);
//don't send any more characters (would corrupt data in download)
exit;
?>