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

  Creates a singular interface for database access.
  
  This file is for PostgreSQL with PHP versions less than 4.2.0 

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."config/config.php" );
include_once( BASE."includes/common.php");

/* NOTE!
   Standard Postgresql (Version 6.3 and later) setup does NOT support tcp/ip connections.
   To support tcp/ip connections you need to:
    - Edit PostgreSQL config file pg_hba.conf to allow tcp/ip from appropriate hosts
    - Start postmaster with -i option to allow tcp/ip connections
*/

//set some base variables
$last_insert = "oid";
$delim = "'";
$epoch = "extract(epoch FROM ";
$day_part = "DATE_PART('day', ";
$interval = "";

//
// Provides a safe way to do a query
//
function db_query($query, $dieonerror=1 ) {

  global $database_connection;

  if( ! $database_connection ) {
    //set initial value
    $host = "";
    //now adjust if necessary
    if(DATABASE_HOST != "localhost" )
      $host = "host=".DATABASE_HOST;

    if( ! ($database_connection = @pg_connect("$host user=".DATABASE_USER." dbname=".DATABASE_NAME. "password=".DATABASE_PASSWORD ) ) )
      error("No database connection",  "Sorry but there seems to be a problem in connecting to the database" );

    //make sure dates will be handled properly by internal date routines
    $q = db_query("SET DATESTYLE TO 'European, ISO' ");
  }

  //check for a database connection
  if( ! $database_connection )
    error("Database query error", "Connection to database has been unexpectedly lost" );

  //do it
  if( ! ($result = @pg_exec($database_connection, $query ) ) ) {

    if($dieonerror == 1 ) error("Database Query error", "The following query :<br /><br /><b>".$query."</b><br /><br />Had the following error:<br /><b>".pg_errormessage($database_connection)."</b>" );
  }

  //all was okay return resultset
  return $result;
}

//
// number of rows in result set
//
function db_numrows($q ) {

  $result = pg_numrows($q );

return $result;
}

//
// get a single result set
//
function db_result($q, $row=0, $field=0 ) {

  $result = pg_result($q, $row, $field );

return $result;
}

//
// fetch array result set
//
function db_fetch_array($q, $row=0 ) {

  $result_row = pg_fetch_array($q, $row, PGSQL_ASSOC );

return $result_row;
}

//
// fetch enumerated array result set
//
function db_fetch_num($q, $row=0 ) {

  $result_row = pg_fetch_row($q, $row );

return($result_row );
}

//
// last oid
//
function db_lastoid($q ) {

  $lastoid = pg_getlastoid($q );

return($lastoid );
}

//
// dummy function to match mysql
//
function db_data_seek($q ) {
  //nothing happens here!

return;
}

//
//begin transaction
//
function db_begin() {

  global $database_connection;

  pg_exec($database_connection, "BEGIN WORK" );

return;
}

//
//rollback transaction
//
function db_rollback() {

  global $database_connection;

  pg_exec($database_connection, "ROLLBACK WORK" );

return;
}

//
//commit transaction
//
function db_commit() {

  global $database_connection;

  pg_exec($database_connection, "COMMIT WORK" );

return;
}

?>
