<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2002 by Andrew Simpson
  with much help from the people noted in the README

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

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."config.php" );
include_once( BASE."includes/common.php");

//if( ! ( $database_connection = @pg_pconnect("host=".$DATABASE_HOST." user=".$DATABASE_USER." dbname=".$DATABASE_NAME." password=".$DATABASE_PASSWORD) ) ) {

/* Uncomment the line above to allow database connections via tcp/ip (includes remote databases and localhost)
   Standard Postgresql setup does NOT support tcp/ip connections.
    - Edit PostgreSQL config file pg_hba.conf to allow tcp/ip from appropriate hosts
    - Start postmaster with -i option to allow tcp/ip connections
*/

//** Line below is for local connections via Unix domain sockets to localhost database.  This is the standard Postgresql configuration.
if( ! ( $database_connection = @pg_pconnect("user=".$DATABASE_USER." dbname=".$DATABASE_NAME." password=".$DATABASE_PASSWORD) ) ) {

  error( "No database connection",  "Sorry but there seems to be a problem in connecting to the database");
}

//set some base variables
$last_insert = "oid";
$delim = "'";
$epoch = "extract( epoch from ";


//make sure dates will be handled properly by internal date routines
$q = db_query( "SET DATESTYLE TO 'European, ISO' ");


//
// Provides a safe way to do a query
//
function db_query( $query, $dieonerror=1 ) {

  global $database_connection, $database_query_time, $database_query_count;

  //count queries
  $database_query_count++;

  //starttime
  list($usec, $sec)=explode(" ", microtime());
  $starttime = ( (float)$usec + (float)$sec );

  //check the query
  if( $query == "" )
    error("Database Query error", "There was no query" );

  //check for a database connection
  if( ! $database_connection )
    error("Database Query error", "There was no connection to a database" );

  //do it
  if( ! ($result = @pg_exec( $database_connection, $query ) ) ) {

    if($dieonerror==1) error("Database Query error", "The following query :<BR><BR><B>".$query."</B><BR><BR>Had the following error:<BR><B>".pg_errormessage($database_connection)."</B>" );
  }

  //add query time to global query time
  list($usec, $sec)=explode(" ", microtime());
  $database_query_time += ( (float)$usec + (float)$sec ) - $starttime;


  //all was okay return resultset
  return $result;
}

//
// number of rows in result set
//
function db_numrows( $q ) {

  $result = pg_numrows( $q );

return( $result );
}

//
// get a single result set
//
function db_result( $q, $row=0, $field=0 ) {

  $result = pg_result( $q, $row, $field );

return ($result);
}

//
// fetch array result set
//
function db_fetch_array( $q, $row=0 ) {

  $result_row = pg_fetch_array($q, $row, PGSQL_ASSOC );

return($result_row);
}

//
// fetch enumerated array result set
//
function db_fetch_num( $q, $row=0 ) {

  $result_row = pg_fetch_row($q, $row );

return($result_row);
}

//
// last oid
//
function db_lastoid( $q ) {

  $lastoid = pg_getlastoid( $q );

return($lastoid);
}

//
// dummy function to match mysql
//
function db_data_seek( $q ) {
  //nothing happens here!

return;
}

//
//begin transaction
//
function db_begin() {

  global $database_connection;

  pg_exec( $database_connection, "BEGIN WORK" );

return;
}

//
//rollback transaction
//
function db_rollback() {

  global $database_connection;

  pg_exec( $database_connection, "ROLLBACK WORK" );

return;
}

//
//commit transaction
//
function db_commit() {

  global $database_connection;

  pg_exec( $database_connection, "COMMIT WORK" );

return;
}

?>
