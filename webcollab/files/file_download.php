<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created 2003 by Andrew Simpson
  
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

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );


include_once( BASE."includes/security.php" );
include_once( BASE."config.php" );

//set variable
$found = 0;

if( ! isset($_GET["fileid"]) || ! is_numeric($_GET["fileid"]) )
  return;

$fileid = $_GET["fileid"];

//check usergroups associated with this file
if( ! ($q = db_query("SELECT tasks.usergroupid,tasks.globalaccess FROM files LEFT JOIN tasks ON (files.taskid=tasks.id) WHERE files.id=".$fileid ) ) )
  error("Download file", "There was an error in the data query.");

//get the data
if( ! ($row = db_fetch_array($q, 0 ) ) )
  error("Download file", "There was an error in fetching the file permission data.");

//admins can go free the rest is checked
if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {
  //check if the user has a matching group
  $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
  for( $i=0 ; $usergroup_row = @db_fetch_array($usergroup_q, $i ) ; $i++) {

    //found it
    if( $row["usergroupid"] == $usergroup_row["usergroupid"] ) {
      $found=1;
      break;
    }
  }
  
  //deny access if not in the group
  if( $found != 1 )
    warning($lang["access_denied"], $lang["private_usergroup"] );
}

//get the files info
$file_q = db_query("SELECT oid, filename, size, mime FROM files WHERE id=".$fileid );
$file_row = db_fetch_array( $file_q, 0);

//check the file exists
if( ! ( file_exists( $FILE_BASE."/".$file_row["oid"]."__".$file_row["filename"] ) ) )
  error( "Download file", "The file ".$file_row["filename"]." is missing from the server" );

//send the headers describing the file type
header("Content-Type: ".$file_row["mime"]);
header("Content-Disposition: inline; filename=".$file_row["filename"]);
header("Content_Length: ".$file_row["size"] );

//open the file
$fp = fopen( $FILE_BASE."/".$file_row["oid"]."__".addslashes($file_row["filename"]), "rb" );
if( $fp == 0 )
  error( "Download file", "File handle for ".$file_row["filename"]." cannot be opened" );

//send it
fpassthru($fp);
//don't send any more characters (would corrupt data in download)
exit;
?>
