<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Creates a singular interface for mysql database access.

*/

require_once("path.php" );

include_once(BASE."config/config.php" );
include_once(BASE."includes/common.php" );

//set some base variables
$database_connection = "";
$last_insert = "id";
$delim = "";
$epoch = "UNIX_TIMESTAMP( ";
$day_part = "DAYOFMONTH( ";
$interval = "INTERVAL ";

//
// Provides a safe way to do a query
//
function db_query( $query, $dieonerror=1 ) {

  global $database_connection, $db_name, $db_error_message, $db_content ;
  global $database_query_time, $database_query_count;

  if( ! $database_connection ) {

    //global variables don't seem to work within mysql functions
    $db_host = DATABASE_HOST;
    $db_user = DATABASE_USER;
    $db_pass = DATABASE_PASSWORD;
    $db_name = DATABASE_NAME;

    //make connection
    if( ! ($database_connection = @mysql_pconnect($db_host, $db_user, $db_pass ) ) )
      error("No database connection",  "Sorry but there seems to be a problem in connecting to the database server");

    //select database
    if( ! @mysql_select_db($db_name, $database_connection ) )
      error("Database error", "No connection to database tables" );
  }

  //start time
  list($usec, $sec) = explode(" ", microtime() );
  $starttime = ((float)$usec + (float)$sec );
  
  //do it
  if( ! ($result = @mysql_query( $query, $database_connection ) ) ) {

    $db_error_message = mysql_error($database_connection);
    if($dieonerror==1 ) error("Database query error", "The following query :<br /><br /><b> $query </b><br /><br />Had the following error:<br /><b>".mysql_error($database_connection)."</b>" );
  }

  //count queries
  $database_query_count++;
  
  //add query time to global query time
  list($usec, $sec ) = explode(" ", microtime() );
  $this_query_time = ((float)$usec + (float)$sec ) - $starttime;
  $database_query_time += $this_query_time;
      
  if(substr($query, 0, 6 ) == "SELECT" ) {
    //show the preformance and optimisations
    $db_opt = mysql_query("EXPLAIN ".$query.";", $database_connection );
    $db_content .= "<div align=\"left\">".nl2br($query )."<br /><br />\n".
                "<table border=\"1\" >\n".
                "<tr><td>table</td><td>type</td><td>possible_keys</td><td>key</td><td>key_len</td><td>ref</td><td>rows</td><td>extra</td></tr>\n";

    for( $i=0 ; $row = @db_fetch_num($db_opt, $i ) ; $i++) {
      if(isset($row[1] ) )
        $db_content .= "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr>\n";
      else
        $db_content .= "<tr><td>".$row[0]."</td></tr>\n";
    }
    $db_content .= "<tr><td>".sprintf("This query took %.5f seconds", $this_query_time )."</td></tr>\n".
                   "</table>\n".
                   "<br /><hr></div>";
  }
  
  //all was okay return resultset
  return $result;
}


//
// number of rows in result
//
function db_numrows($q ) {

  $result = mysql_num_rows($q );

return $result;
}

//
// get single result set
//
function db_result($q, $row=0, $field=0 ) {

  $result = mysql_result($q, $row, $field );

return $result;
}

//
// fetch array result set
//
function db_fetch_array($q, $row=0 ) {

  $result_row = mysql_fetch_array($q, MYSQL_ASSOC );

return $result_row;
}

//
// fetch enumerated array result set
//
function db_fetch_num($q, $row=0 ) {

  $result_row = mysql_fetch_row($q );

return $result_row;
}

//
// last oid
//
function db_lastoid($q ) {

  global $database_connection, $db_error_message;

  if( ! ( $lastoid = mysql_insert_id($database_connection ) ) ) {
    $db_error_message = mysql_error($database_connection );
    error("Database error", "Unable to get last insert id.<br /><br /> $db_error_message" );
  }

return $lastoid;
}

//
// return data pointer to begining of data set
//
function db_data_seek($q ) {

  if(mysql_num_rows($q ) == 0 )
    return;

  mysql_data_seek($q, 0 );

return;
}

//
//begin transaction
//
function db_begin() {

  //not implemented with ISAM tables

return;
}

//
//rollback transaction
//
function db_rollback() {

  //not implemented with ISAM tables

return;
}

//
//commit transaction
//
function db_commit() {

  //not implemented with ISAM tables

return;
}

?>
