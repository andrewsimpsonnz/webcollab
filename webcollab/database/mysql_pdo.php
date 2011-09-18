<?php
/*
  $Id: mysql_database.php 2040 2008-11-23 05:46:25Z andrewsimpson $

  (c) 2009 - 2011 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Creates a PDO interface for MySQL database access.

  NOTE: Assumes INNODB tables for MySQL.

*/

require_once('path.php' );

//set some base variables
$dbh = null;
$delim = '';
$epoch = 'UNIX_TIMESTAMP( ';
$day_part  = 'DAYOFMONTH( ';
$date_type = '';

//
// connect to database
//
function db_connection() {

  global $dbh, $db_error_message;

  set_exception_handler('exception_handler');

  try {
    $dbh = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD );

    //set error handling
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e) {
    $db_error_message = $e->getMessage();
    error('No database connection error', 'Sorry but there seems to be a problem in connecting to the database server' );
  }

  //set timezone
  db_query("SET time_zone='".sprintf('%+d:%02d', (int)TZ, (TZ - floor(TZ) )*60 )."'" );

  //set character set -- 1
  db_query('SET CHARACTER SET utf8' );

  //set character set -- 2
  db_query('SET NAMES \'utf8\'' );

  return;
}

//
// Provides a safe way to do a query
//
function db_query($query, $die_on_error=1 ) {

  global $dbh, $db_error_message;

  if(! $dbh ) db_connection();

  $db_error_message = $query;

  try {
    $sth = $dbh->query($query );
  }
  catch (PDOException $e) {
    $error = $e->getMessage();
    $db_error_message = 'The following query :<br /><br /><b>'.$query.'</b><br /><br />Had the following error:<br /><b>'.$error.'</b>';
    if($die_on_error) {
      error('Database query error', 'Database error: '.$error );
    }
    return false;
  }

  //all was okay return resultset
  return $sth;
}

//
// Prepare a query
//
function db_prepare($query, $die_on_error=1 ) {

  global $dbh, $db_error_message;

  if(! $dbh ) db_connection();

  $db_error_message = $query;

  //prepare statement
  try {
    $sth = $dbh->prepare($query );
  }
  catch (PDOException $e) {
    $db_error_message = 'The following query had an error:<br />'.$db_error_message.'<br />'.$e->getMessage();

    if($die_on_error) {
      error('Database compilation error', 'Problem in preparing the database query' );
    }
    return false;
  }

  return $sth;
}

//
// Execute a prepared query
//
function db_execute($sth, $input='', $die_on_error=1 ) {

  global $dbh, $db_error_message;

  if(! $dbh ) db_connection();

  $db_error_message = $query;

  try {
    if($input ) {
      $sth->execute($input );
    }
    else {
      $sth->execute();
    }
  }
  catch (PDOException $e) {
    $error= $e->getMessage();
    $db_error_message = 'The following query had an error:<br />'.$db_error_message.'<br />Error message '.$error.'<br />';

    if($die_on_error) {
      error('Database execute error', 'Database error: '.$error );
    }
    return false;
  }

  return true;
}

//
// escape data
//
function db_quote($data ) {

  global $dbh;

  if(! $dbh ) db_connection();

  return $dbh->quote($data );
}

//
// get single result set
//
function db_result($sth, $row=0, $field=0 ) {

  $result = $sth->fetch(PDO::FETCH_NUM );
  return $result[$field];
}

//
// fetch array result set
//
function db_fetch_array($sth, $row=0 ) {

 return $sth->fetch(PDO::FETCH_ASSOC );
}

//
// fetch enumerated array result set
//
function db_fetch_num($sth, $row=0 ) {

  return $sth->fetch(PDO::FETCH_NUM );
}

//
// last oid
//
function db_lastoid($seq_name ) {

  global $dbh;

  //must be done after an insert, and within a transaction
  $result = db_query('SELECT LAST_INSERT_ID() as last_id');

  return db_result( $result, 0, 0 );
}

//
//free memory
//
function db_free_result($sth ) {

  return $sth->closeCursor();
}

//
//begin transaction
//
function db_begin() {

  global $dbh;

  return $dbh->beginTransaction();
}

//
//rollback transaction
//
function db_rollback() {

  global $dbh;

  return $dbh->rollBack();
}

//
//commit transaction
//
function db_commit() {

  global $dbh;

  return $dbh->commit();
}

function exception_handler($exception) {

  global $db_error_message;

  $db_error_message = 'Uncaught exception: '.$exception->getMessage();
  error('Database error', 'Database error has occurred' );
  return;
}

?>