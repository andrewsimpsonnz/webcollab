<?php
/*
  $Id: mysql_database.php 2040 2008-11-23 05:46:25Z andrewsimpson $

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

  Creates a singular interface for PDO database access.

  NOTE: Assumes INNODB tables for MySQL.

*/

require_once('path.php' );

//set some base variables
$dbh = null;

switch(DATABASE_TYPE ) {

  case 'mysql_pdo':
    $delim = '';
    $epoch = 'UNIX_TIMESTAMP( ';
    $day_part  = 'DAYOFMONTH( ';
    $date_type = '';
    break;


  case 'postgresql_pdo':
    $delim = "'";
    $epoch = 'extract(epoch FROM ';
    $day_part  = 'DATE_PART(\'day\', ';
    $date_type = 'TIMESTAMP';
    break;
}

//
// connect to database
//
function db_connection() {

  global $dbh, $db_error_message;

  try {
    //connect to database
    switch(DATABASE_TYPE ) {

      case 'mysql_pdo':
        $dbh = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD );
        break;

      case 'postgresql_pdo':
        $dbh = new PDO('pgsql:host='.DATABASE_HOST.' port=5432 dbname='.DATABASE_NAME.' user='.DATABASE_USER.' password='.DATABASE_PASSWORD );

        break;
    }
    //set error handling
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e) {
    $db_error_message = $e->getMessage();
    error('No database connection error', 'Sorry but there seems to be a problem in connecting to the database server' );
  }

  switch(DATABASE_TYPE ) {

    case 'mysql_pdo':
      //set timezone
      db_query("SET time_zone='".sprintf('%+d:%02d', (int)TZ, (TZ - floor(TZ) )*60 )."'" );
      break;

    case 'postgresql_pdo':
      //make sure dates will be handled properly by internal date routines
      db_query('SET DATESTYLE TO \'European, ISO\'');

      //set the timezone
      db_query('SET TIME ZONE '.TZ );
      break;
  }

  return;
}

//
// Provides a safe way to do a query
//
function db_query($query, $die_on_error=1 ) {

  global $dbh, $db_error_message;

  if(! $dbh ) db_connection();

  try {
    $sth = $dbh->query($query );
  }
  catch (PDOException $e) {
    $error = $e->getMessage();
    $db_error_message = 'The following query :<br /><br /><b>'.$query.'</b><br /><br />Had the following error:<br /><b>'.$error.'</b>';
    if($die_on_error) {
      error('Database query error', $db_error_message );
    }
  }

  //all was okay return resultset
  return $sth;
}

//
// escapes special characters in a string for use in a SQL statement
//
function db_escape_string($string ) {

  global $dbh;

  if(! $dbh ) db_connection();

  $string = $dbh->quote($string);

  //terrible hack because quote() adds quotes to the overall string (foobar's goes to 'foobar''s')
  $string = substr($string, 1, -1 );

  return $string;
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

  //must be done after an insert, and within a transaction
  switch(DATABASE_TYPE ) {

    case 'mysql_pdo':
      $result = db_query('SELECT LAST_INSERT_ID() as last_id' );
      break;

    case 'postgresql_pdo':
      $result = db_query('SELECT CURRVAL(\''.$seq_name.'\') AS seq' );
      break;
  }

  return db_result($result, 0, 0 );
}

//
//free memory
//
function db_free_result($sth ) {

  $sth->closeCursor();

  return;
}

//
//begin transaction
//
function db_begin() {

  global $dbh, $db_error_message;

  try {
    $dbh->beginTransaction();
  }
  catch (PDOException $e) {
    $db_error_message = $e->getMessage();
    error('Database transaction error', 'Database does not support transactions' );
  }
  return;
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

//
//sets the required session client encoding
//
function db_user_locale($encoding ) {

  switch(strtoupper($encoding) ) {

    case 'ISO-8859-1':
      $pg_encoding = 'LATIN1';
      $my_encoding = 'latin1';
      break;

    case 'UTF-8':
      $pg_encoding = 'UNICODE';
      $my_encoding = 'utf8';
      break;

    case 'ISO-8859-2':
      $pg_encoding = 'LATIN2';
      $my_encoding = 'latin2';
      break;

    case 'ISO-8859-7':
      $pg_encoding = 'ISO_8859_7';
      $my_encoding = 'greek';
      break;

    case 'ISO-8859-9':
      //ISO-8859-9 === latin5!!
      $pg_encoding = 'LATIN5';
      $my_encoding = 'latin5';
      break;

    case 'ISO-8859-15':
      $pg_encoding = 'LATIN9';
      break;

    case 'KOI8-R':
      $pg_encoding = 'KOI8';
      $my_encoding = 'koi8r';
      break;

    case 'WINDOWS-1251':
      $pg_encoding = 'WIN';
      $my_encoding = 'cp1251';
      break;

    default:
      $pg_encoding = 'LATIN1';
      $my_encoding = 'latin1';
      break;
  }

  switch(DATABASE_TYPE ) {

    case 'mysql_pdo':
      //set character set -- 1
      db_query("SET CHARACTER SET ".$my_encoding );

      //set character set -- 2
      db_query("SET NAMES '".$my_encoding."'" );
      break;

    case 'postgresql_pdo':
      db_query("SET client_encoding to '".$pg_encoding."'" );
      break;
  }

  return true;
}

?>
