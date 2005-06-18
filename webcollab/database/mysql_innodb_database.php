<?php
/*
  $Id$
  
  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

require_once('path.php' );

//set some base variables
$database_connection = '';
$delim = '';
$epoch = 'UNIX_TIMESTAMP( ';
$day_part = 'DAYOFMONTH( ';
$interval = 'INTERVAL ';
$escape_new = (version_compare(PHP_VERSION, '4.3.0' ) == '-1' ) ? false : true;

//
// connect to database
//
function db_connection() {

  global $database_connection;
  
  //make connection
  if( ! ($database_connection = @mysql_pconnect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD ) ) )
    error('No database connection',  'Sorry but there seems to be a problem in connecting to the database server');

  //select database
  if( ! @mysql_select_db(DATABASE_NAME, $database_connection ) )
    error('Database error', 'No connection to database tables' );

  //set transaction mode
  db_query('SET AUTOCOMMIT = 1' );

  return;  
}

//
// Provides a safe way to do a query
//
function db_query( $query, $dieonerror=1 ) {

  global $database_connection, $db_error_message ;

  if(! $database_connection ) db_connection();

  //do it
  if( ! ($result = @mysql_query($query, $database_connection ) ) ) {
    $db_error_message = mysql_error($database_connection );
    if($dieonerror==1 ) error('Database query error', 'The following query :<br /><br /><b>'.$query.'</b><br /><br />Had the following error:<br /><b>'.mysql_error($database_connection).'</b>' );
  }

  //all was okay return resultset
  return $result;
}

//
// escapes special characters in a string for use in a SQL statement
//
function db_escape_string($string ) {
  
  global $database_connection, $escape_new;
   
  if($escape_new ) {
    if(! $database_connection ) { 
      db_connection();
    }
    $result = mysql_real_escape_string($string, $database_connection );
  }
  else {
    $result = mysql_escape_string($string );
  }  
    
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
function db_lastoid($seq ) {

  global $database_connection;

  $lastoid = mysql_insert_id($database_connection); 

return $lastoid;
}

//
// return data pointer to begining of data set
//
function db_data_seek($q ) {

  if(mysql_num_rows($q ) == 0 )
    return TRUE;

  $result = mysql_data_seek($q, 0 );

return $result;
}

//
//free memory
//
function db_free_result($q ) {

  $result = mysql_free_result($q );

return $result;
}

//
//begin transaction
//
function db_begin() {

  global $database_connection;

  $result = mysql_query('BEGIN' );

return $result;
}

//
//rollback transaction
//
function db_rollback() {

  global $database_connection;

  $result = mysql_query('ROLLBACK' );

return $result;
}

//
//commit transaction
//
function db_commit() {

  global $database_connection;

  $result = mysql_query('COMMIT' );

return $result;
}

?>
