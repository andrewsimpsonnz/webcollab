<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file written in 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

include_once( "./screen_setup.php" );
include_once( "../config.php" );

//
//Error trap function
//

function error_setup($message ) {

  create_top_setup("Setup", 1 );
  new_box_setup("Setup error", "<center><br />".$message."<br /></center>" );
  create_bottom_setup();
  die;

}

//
//Database build
//

if(isset($_POST["database_name"]) ) {

  $array = array("database_name", "database_user", "database_password", "database_type" );
  foreach( $array as $var) {
    if(! isset($_POST[$var]) ) {
      error_setup("Variable ".$var." was not entered" );
    }
  }

  //skip making database
  if(isset($_POST["make_database"]) && $_POST["make_database"] != "on" )
    header("location: setup2.php?db_host=".$database_host."&amp;db_user=".$database_user."&amp;db_pass=".$database_password."&amp;db_name=".$database_name."&amp;db_type=".$database_type );


  $database_name     = $_POST["database_name"];
  $database_user     = $_POST["database_user"];
  $database_password = $_POST["database_password"];
  $database_type     = $_POST["database_type"];

  if( isset($_POST["database_host"] ) ) {
    $database_host = $_POST["database_host"];
  }
  else {
    $database_host = "localhost";
  }

  switch ($database_type) {

  case "mysql":
    //connect to database server
    if( ! ( $database_connection = mysql_connect( $database_host, $database_user, $database_password ) ) ) {
      error_setup( "Sorry but there seems to be a problem in connecting to the database server at ".$database_host."<br />".
                    "Check that your user and password is correct.  Also check that the database is running.<br /><br />".
                    "User:     ".$database_user."<br />Password: ".$database_password."<br />" );
    }

    //try and select the database
    if( ! @mysql_select_db( $database_name, $database_connection ) ) {

      //no database exists yet - try and create it...
      if( ! ($result = @mysql_query( "CREATE DATABASE ".$database_name, $database_connection ) ) )
        error_setup("The database creation had the following error: <br />".mysql_error($database_connection) );

      //select the newly created database
      if( ! @mysql_select_db( $database_name, $database_connection ) )
        error_setup("Not able to select database. Error message was: <br />".mysql_error($database_connection) );
    }

    //sanity check
    if( ! is_readable("../db/schema_mysql.sql" ) ) {
      error_setup("Database schema is missing.  Check that the file /db/schema_mysql.sql exists and is readable by the webserver." );
    }

    //open schema file
    if( ! $handle = fopen("../db/schema_mysql.sql", "r" ) ) {
      error_setup("Not able to read database schema file" );
    }

    //input the file
    $schema = fread($handle, filesize("../db/schema_mysql.sql") );
    fclose($handle );

    //separate schema into individual table setups
    $table_array = explode(";", $schema );

    //create each table
    foreach($table_array as $table ){
      if( ! ($result = @mysql_query( $table, $database_connection ) ) ) {
        error_setup("The database creation had the following error:<br /> ".mysql_error($database_connection) );
      }
    }
    break;

  case "postgresql":
    if( ! ( $database_connection = @pg_connect( "user=".$database_user." dbname=".$database_name." password=".$database_password ) ) ) {
      //selected database doesn't exist - need to create it

      //connect to database server with standard 'template1' database
      if( ! ( $database_connection = @pg_connect( "user=".$database_user." dbname=template1 password=".$database_password ) ) ) {
        error_setup( "Sorry but there seems to be a problem in connecting to the database server at ".$database_host."<br />".
                    "No existing database, and cannot connect to PostgreSQL to create a new database.<br /><br />".
                    "User:     ".$database_user."<br />Password: ".$database_password."<br /><br />".
                    "Check user and password, then try creating the database manually and running setup again." );
      }

      //create new database
      if( ! ($result = @pg_exec($database_connection, "CREATE DATABASE ".$database_name ) ) ) {
        error_setup("Connected to database, but the new database creation had the following error:<br />".pg_errormessage($database_connection) );
      }

      //close the standard template database
      pg_close($database_connection );

      //open the new database
      if( ! ( $database_connection = @pg_connect( "user=".$database_user." dbname=".$database_name." password=".$database_password ) ) ) {
        error_setup( "New database was created successfully, but cannot re-connect to the database server.");
      }
    }

    //sanity check
    if( ! is_readable("../db/schema_pgsql.sql" ) ) {
      error_setup("Database schema is missing.  Check that the file /db/schema_pgsql.sql exists and is readable by the webserver." );
    }

    //open schema file
    if( ! $handle = fopen("../db/schema_pgsql.sql", "r" ) ) {
      error_setup("Not able to read database schema file" );
    }

    //input the file
    $schema = fread($handle, filesize("../db/schema_pgsql.sql") );
    fclose($handle );

    //separate schema into individual table setups
    $table_array = explode(";", $schema );

    //create tables from schema
    foreach($table_array as $table ){
      if( ! ($result = @pg_exec($database_connection, $table ) ) ) {
        error_setup("The database creation had the following error:<br /> ".pg_errormessage($database_connection) );
      }
    }
    break;

  default:
    error_setup("Not a valid database type");
    break;
  }

  header("location: setup2.php?db_host=".$database_host."&amp;db_user=".$database_user."&amp;db_pass=".$database_password."&amp;db_name=".$database_name."&amp;db_type=".$database_type );
}

//
//Main input screen
//

//check if already setup previously
if( ( !isset($CONFIG_STATE ) ) || $CONFIG_STATE != "first install" )
  header("location: login.php" );

create_top_setup("Setup Screen", 1);

$content = "<center>\n".
"<br /><br />\n".
"<img src=\"../images/webcollab.png\" alt=\"WebCollab logo\"></img><br /><br />\n".
"<p><b>Setup - Stage 1 of 3 : Database Creation</b></p>\n".
"<form name=\"inputform\" method=\"POST\" action=\"index.php\">\n".
  "<table border=\"0\">\n".
    "<tr align=\"left\"><td>Your database name: </td><td><input type=\"text\" name=\"database_name\" size=\"30\"></td></tr>\n".
    "<tr align=\"left\"><td>Database user: </td><td><input type=\"text\" name=\"database_user\" size=\"30\"></td></tr>\n".
    "<tr align=\"left\"><td>Database password: </td><td><input type=\"text\" name=\"database_password\" size=\"30\"></td></tr>\n".
    "<tr align=\"left\"><td>Database host: </td><td><input type=\"text\" name=\"database_host\" value=\"localhost\" size=\"15\"></td></tr>\n".
    "<tr align=\"left\"><td>Database type:</td> <td>\n".
    "<select name=\"database_type\">\n".
      "<option value=\"mysql\" SELECTED >mysql</option>\n".
      "<option value=\"postgresql\">postgresql</option>\n".
    "</select></td></tr>\n".

  "</table><br />\n".
  "Do you want to create the database now?  <input type=\"checkbox\" name=\"make_database\" CHECKED ><br />\n".
  "<input type=\"submit\" value=\"Submit\"><br /><br />\n".
"</form>\n".
"</center>\n".
"<br /><br />\n";

new_box_setup("Setup - Stage 1 of 3", $content, 400 );

create_bottom_setup();
?>
