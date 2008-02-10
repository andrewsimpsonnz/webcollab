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

  Creates a singular interface for database access.

  This file is for PostgreSQL with PHP versions greater than (and including) 4.2.0

*/

require_once('path.php' );

/* NOTE!
   Standard Postgresql (Version 6.3 and later) setup does NOT support tcp/ip connections.
   To support tcp/ip connections you need to:
    - Edit PostgreSQL config file pg_hba.conf to allow tcp/ip from appropriate hosts
    - Start postmaster with -i option to allow tcp/ip connections
*/

//set some base variables
$database_connection = '';
$delim = "'";
$epoch = 'extract(epoch FROM ';
$day_part  = 'DATE_PART(\'day\', ';
$date_type = 'TIMESTAMP';
//
// Makes a connection to the database
//
function db_connection() {

  global $database_connection;

  //set host string correctly
  $host = (DATABASE_HOST != 'localhost' ) ? 'host='.DATABASE_HOST : '';

  if( ! ($database_connection = @pg_connect($host.' user='.DATABASE_USER.' dbname='.DATABASE_NAME.' password='.DATABASE_PASSWORD ) ) )
    error('No database connection',  'Sorry but there seems to be a problem in connecting to the database' );

  //make sure dates will be handled properly by internal date routines
  pg_query($database_connection, 'SET DATESTYLE TO \'European, ISO\'');

  //set the timezone
  if(! @pg_query($database_connection, 'SET TIME ZONE '.TZ ) ) {
    error("Database error",  "Not able to set timezone" );
  }

return;
}

//
// Provides a safe way to do a query
//
function db_query($query, $die_on_error=1 ) {

  global $database_connection, $db_error_message;

  if(! $database_connection ) db_connection();

  //do it
  if( ! ($result = @pg_query($database_connection, $query ) ) ) {
    $db_error_message = pg_last_error($database_connection);

    if($die_on_error) {
      error('Database query error', 'The following query :<br /><br /><b>'.$query.'</b><br /><br />Had the following error:<br /><b>'.pg_last_error($database_connection).'</b>' );
    }
  }

  //all was okay return resultset
  return $result;
}

//
// escapes special characters in a string for use in a SQL statement
//
function db_escape_string($string ) {

  return pg_escape_string($string);
}

//
// number of rows in result set
//
function db_numrows($q ) {

  return pg_num_rows($q );
}

//
// get a single result set
//
function db_result($q, $row=0, $field=0 ) {

  return pg_fetch_result($q, $row, $field );
}

//
// fetch array result set
//
function db_fetch_array($q, $row=0 ) {

  return pg_fetch_array($q, $row, PGSQL_ASSOC );
}

//
// fetch enumerated array result set
//
function db_fetch_num($q, $row=0 ) {

  return pg_fetch_row($q, $row );
}

//
// last oid
//
function db_lastoid($seq_name ) {

  //must be done after an insert, and within a transaction
  $result = db_query('SELECT CURRVAL(\''.$seq_name.'\') AS seq' );

  return pg_fetch_result( $result, 0, 0 );
}

//
// dummy function to match mysql
//
function db_data_seek($q ) {
  //nothing happens here!

  return TRUE;
}

//
//free memory
//
function db_free_result($q ){

  global $database_connection;

  return pg_free_result($q );
}

//
//begin transaction
//
function db_begin() {

  global $database_connection;

  return pg_query($database_connection, 'BEGIN WORK' );
}

//
//rollback transaction
//
function db_rollback() {

  global $database_connection;

  return pg_query($database_connection, 'ROLLBACK WORK' );
}

//
//commit transaction
//
function db_commit() {

  global $database_connection;

  return pg_query($database_connection, 'COMMIT WORK' );
}

//
//sets the required session client encoding
//
function db_user_locale($encoding ) {

  global $database_connection;

  if(! $database_connection ) db_connection();

  switch(strtoupper($encoding) ) {

    case 'ISO-8859-1':
      $pg_encoding = 'LATIN1';
      break;

    case 'UTF-8':
      $pg_encoding = 'UNICODE';
      break;

    case 'ISO-8859-2':
      $pg_encoding = 'LATIN2';
      break;

    case 'ISO-8859-7':
      $pg_encoding = 'ISO_8859_7';
      break;

    case 'ISO-8859-9':
      $pg_encoding = 'LATIN5';
      break;

    case 'ISO-8859-15':
      $pg_encoding = 'LATIN9';
      break;

    case 'KOI8-R':
      $pg_encoding = 'KOI8';
      break;

    case 'WINDOWS-1251':
      $pg_encoding = 'WIN';
      break;

    default:
      $pg_encoding = 'LATIN1';
      break;
  }

  //set client encoding to match character set in use
  if(@pg_set_client_encoding($database_connection, $pg_encoding ) == -1 ){
    error('Database client encoding', 'Setting client encoding to '.$pg_encoding.' character set had the following error:<br />'.pg_last_error($database_connection) );
  }

  return true;
}

?>
