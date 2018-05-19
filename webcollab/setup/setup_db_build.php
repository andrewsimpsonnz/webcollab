<?php
/*
  $Id: setup_db_build.php 2313 2009-09-21 07:39:39Z andrewsimpson $

  (c) 2003 - 2015 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Database creation

*/

//set language
if(isset($_POST['lang'] ) ) {
  $locale_setup = $_POST['lang'];
}

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );
include_once(BASE.'lang/lang_setup.php' );
require_once(BASE.'setup/security_setup.php' );

//
//Database build
//

//check the required variables were input
$input_array = array('database_name', 'database_user', 'database_type' );
$message_array = array("'Your database name'", "'Database user'", "'Database type'" );
$i = 0;
foreach( $input_array as $var) {
  if(! isset($_POST[$var]) || $_POST[$var] == NULL ) {
    error_setup("The field for ".$message_array[$i]." was not entered.<br /><br />".
                  "Please go back and enter all the required data fields." );
  }
  ++$i;
}

$database_name     = $_POST['database_name'];
$database_user     = $_POST['database_user'];
$database_type     = $_POST['database_type'];

if(isset($_POST['database_password'] ) ) {
  $database_password = $_POST['database_password'];
}
else {
  $database_password = '';
}

if( isset($_POST['database_host'] ) ) {
  $database_host = $_POST['database_host'];
}
else {
  $database_host = 'localhost';
}

if(preg_match('/[^A-Z0-9_\-$]/i', $database_name ) ){
  error_setup($lang_setup['setupdb_name_error'] );
}

switch ($database_type) {

case 'mysql_pdo':
  //check we can do mysql functions!!
  if( ! extension_loaded('PDO' ) ){
    error_setup($lang_setup['setupdb_no_mysql'] );
  }

  $db_options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

  try {
    $dbh = new PDO('mysql:host='.$database_host, $database_user, $database_password, $db_options );
  }
  catch (PDOException $e) {
    error_setup( sprintf($lang_setup['setupdb_no_db_mysql'], $database_host, $database_host, $database_user, $database_password ) );
  }

  //try and create database, then close
  try {
    $dbh->query('CREATE DATABASE IF NOT EXISTS '.$database_name.' CHARACTER SET utf8' );
    $dbh = null;
  }
  catch (PDOException $e) {
    $error = $e->getMessage();
    error_setup("Connected successfully to the database server, but database creation had the following error: <br />".
                          "<b>".$error."</b><br /><br />".
                          "The above error message was created by the MySQL database server." );
  }

  //connect to the newly created database
  try {
    $dbh = new PDO('mysql:host='.$database_host.';dbname='.$database_name.';charset=utf8', $database_user, $database_password, $db_options );
  }
  catch (PDOException $e) {
    $error = $e->getMessage();
    error_setup("Created a new database, but not able to select the new database. Error message was: <br />".$error );
  }

  //schema file
  $db_schema = 'db/schema_mysql_innodb.sql';

  //sanity check
  if( ! is_readable($db_schema ) ) {
    error_setup("Database schema is missing.  Check that the file [webcollab]/".$db_schema." exists and is readable by the webserver." );
  }

  //open schema file
  if( ! $handle = fopen($db_schema, 'r' ) ) {
    error_setup("Not able to read database schema file." );
  }

  //input the file
  $schema = fread($handle, filesize($db_schema ) );
  fclose($handle );

  //roughly separate schema into individual table setups
  $schema_array = explode(';', $schema );

  //clean up the leading & trailing whitespaces, and remove any null strings
  $max = sizeof($schema_array );
  $j = 0;
  for($i=0 ; $i < $max ; ++$i ) {
    if(strlen($input = trim($schema_array[$i] ) ) > 0 ) {
      $table_array[$j] = $input;
      ++$j;
    }
  }

  //create each table
  foreach($table_array as $table ){
    try {
      $dbh->query($table );
    }
    catch (PDOException $e) {
      $error = $e->getMessage();
      error_setup("The database table creation had the following error:<br /><br /> ".
                          "<b>".$error."</b><br /><br /> ".
                          "The above error message was created by the MySQL database server." );
    }
  }
  break;

case 'postgresql_pdo':
  //check we can do pgsql functions!!
  if( ! extension_loaded('PDO' ) ) {
    error_setup($lang_setup['setupdb_no_pgsql'] );
  }

  //try to connect to database server
  try {
    $dbh = new PDO('pgsql:host='.$database_host.' port=5432 dbname='.$database_name.' user='.$database_user.' password='.$database_password );

    //set error handling
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh = null;
  }
  catch (PDOException $e) {
    try {
      //selected database doesn't exist - need to create it
      // connect to database server with standard 'template1' database
      $dbh = new PDO('pgsql:host='.$database_host.' port=5432 dbname=template1 user='.$database_user.' password='.$database_password );

      //set error handling
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
      $error = $e->getMessage();
      error_setup("Database connection had the following error:<br />".$error );
    }

    //create database, then close connection
    try {
      $dbh->query('CREATE DATABASE '.$database_name.' WITH ENCODING \'UTF8\'');
      $dbh = null;
    }
    catch (PDOException $e) {
        $error = $e->getMessage();
        error_setup("Connected to database, but the new database creation had the following error:<br />".$error );
    }

    //connect to new database
    try {
      $dbh = new PDO('pgsql:host='.$database_host.' port=5432 dbname='.$database_name.' user='.$database_user.' password='.$database_password );

      //set error handling
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
      $error = $e->getMessage();
      error_setup("New database connection had the following error:<br />".$error );
    }
  }

  $db_schema = 'db/schema_pgsql.sql';

  //sanity check
  if( ! is_readable($db_schema ) ) {
    error_setup("Database schema is missing.  Check that the file [webcollab]/".$db_schema." exists and is readable by the webserver." );
  }

  //open schema file
  if( ! $handle = fopen($db_schema, 'r' ) ) {
    error_setup('Not able to read database schema file' );
  }

  //input the file
  $schema = fread($handle, filesize($db_schema ) );
  fclose($handle );

  //roughly separate schema into individual table setups
  $schema_array = explode(';', $schema );

  //clean up the leading & trailing whitespaces, and remove any null strings
  $max = sizeof($schema_array );
  $j = 0;
  for($i=0 ; $i < $max ; ++$i ) {
    if(strlen($input = trim($schema_array[$i] ) ) > 0 ) {
      $table_array[$j] = $input;
      ++$j;
    }
  }

  //create tables from schema
  foreach($table_array as $table ){
    try {
      $dbh->query($table );
    }
    catch (PDOException $e) {
      $error = $e->getMessage();
      error_setup("The database creation had the following error:<br /> ".$error );
    }
  }
  break;

default:
  error_setup("Not a valid database type" );
  break;
}

//check if config file can be written to
if( ! is_writable(BASE_CONFIG.'config.php' ) ) {
  error_setup($lang_setup['setupdb_no_config'] );
}

create_top_setup($lang_setup['setupdb_banner'] );

$content =  "<form method=\"post\" action=\"setup_handler.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"setup3\" />\n".
            "<input type=\"hidden\" name=\"db_host\" value=\"".$database_host."\" />\n".
            "<input type=\"hidden\" name=\"db_user\" value=\"".$database_user."\" />\n".
            "<input type=\"hidden\" name=\"db_password\" value=\"".$database_password."\" />\n".
            "<input type=\"hidden\" name=\"db_name\" value=\"".$database_name."\" />\n".
            "<input type=\"hidden\" name=\"db_type\" value=\"".$database_type."\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"Y\" />\n".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" /></fieldset>\n".
            "<div style=\"text-align:center\">".$lang_setup['setupdb_done']."</div>\n".
            "<p style=\"text-align:center\"><input type=\"submit\" value=\"".$lang_setupdb['setupdb_continue']."\" /></p>\n".
            "</form>\n";

new_box_setup($lang_setup['setupdb_banner'], $content, 'boxdata-small', 'head-small', 'boxstyle-normal' );
create_bottom_setup();

?>