<?php
/*
  $Id$
  
  (c) 2003 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

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

require_once("path.php" );

require_once(BASE."config/config.php" );
require_once(BASE."setup/security_setup.php" );
include_once(BASE."setup/screen_setup.php" );

//
//Database build
//

  //check the required variables were input
  $input_array = array("database_name", "database_user", "database_password", "database_type" );
  $message_array =array("'Your database name'", "'Database user'", "'Database password'", "'Database type'" );
  $i = 0;
  foreach( $input_array as $var) {
    if(! isset($_POST[$var]) || $_POST[$var] == NULL ) {
      error_setup("The field for ".$message_array[$i]." was not entered.<br /><br />".
                   "Please go back and enter all the required data fields." );
    }
  $i++;
  }

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
  case "mysql_innodb":
    //check we can do mysql functions!!
    if( ! function_exists('mysql_connect' ) )
      error_setup( "Your version of PHP does not have support for MySQL<br /><br />".
                   "Check that MySQL support is installed, and the MySQL extension is enabled in the 'php.ini' configuration file<br /><br />".
                   "Refer to the FAQ document for more information." );
    //connect to database server
    if( ! ( $database_connection = @mysql_connect( $database_host, $database_user, $database_password ) ) ) {
      error_setup( "Cannot connect to a database server at $database_host<br /><br />".
                    "Check that your specified user and password are correct, and that a MySQL database is running on $database_host.<br /><br />".
                    "User:     $database_user<br />Password: $database_password<br />" );
    }

    //try and select the database
    if( ! @mysql_select_db( $database_name, $database_connection ) ) {

      //no database exists yet - try and create it...
      if( ! ($result = @mysql_query( "CREATE DATABASE ".$database_name, $database_connection ) ) )
        error_setup("Connected successfully to the database server, but database creation had the following error: <br />".
                             "<b>".mysql_error($database_connection)."</b><br /><br />".
                             "The error message was created by the MySQL database server." );

      //select the newly created database
      if( ! @mysql_select_db( $database_name, $database_connection ) )
        error_setup("Created a new database, but not able to select the new database. Error message was: <br />".mysql_error($database_connection) );

    }

    if($database_type == "mysql") {
      $db_schema = "db/schema_mysql.sql";
    }
    else {
      $db_schema = "db/schema_mysql_innodb.sql";
    }

    //sanity check
    if( ! is_readable($db_schema ) ) {
      error_setup("Database schema is missing.  Check that the file /db/$db_schema exists and is readable by the webserver." );
    }

    //open schema file
    if( ! $handle = fopen($db_schema, "r" ) ) {
      error_setup("Not able to read database schema file." );
    }

    //input the file
    $schema = fread($handle, filesize($db_schema ) );
    fclose($handle );

    //roughly separate schema into individual table setups
    $schema_array = explode(";", $schema );

    //clean up the leading & trailing whitespaces, and remove any null strings
    $max = sizeof($schema_array );
    $j = 0;
    for($i=0 ; $i < $max ; $i++) {
      if(strlen($input = trim($schema_array[$i] ) ) > 0 ) {
        $table_array[$j] = $input;
        $j++;
      }
    }

    //create each table
    foreach($table_array as $table ){
      if( ! ($result = @mysql_query($table, $database_connection ) ) ) {
        error_setup("The database table creation had the following error:<br /><br /> ".
                            "<b>".mysql_error($database_connection)."</b><br /><br /> ".
                            "The error message was created by the PostgreSQL database server." );
      }
    }
    break;

  case "postgresql":
    //check we can do pgsql functions!!
    if( ! function_exists('pg_connect' ) )
      error_setup( "Your version of PHP does not have support for PostgreSQL<br /><br />".
                   "Check that PostgreSQL support is compiled in, and enabled in php.ini config file<br />" );

    //tailor database commands to match version of PHP in use (pgsql functions changed in 4.2.0)
    switch(version_compare(PHP_VERSION, "4.2.0" ) ) {
      case 0:
      case 1:
        $query = "pg_query";
        $error = "pg_last_error";
        break;

      case -1:
      default:
        $query = "pg_exec";
        $error = "pg_errormessage";
        break;
    }

    if( ! ( $database_connection = @pg_connect( "user=".$database_user." dbname=".$database_name." password=".$database_password ) ) ) {
      //selected database doesn't exist - need to create it

      //connect to database server with standard 'template1' database
      if( ! ( $database_connection = @pg_connect( "user=".$database_user." dbname=template1 password=".$database_password ) ) ) {
        error_setup("Cannot connect to the database server at $database_host<br />".
                    "No existing database, and cannot connect to PostgreSQL with template1 to create a new database.<br /><br />".
                    "User:     $database_user<br />Password: $database_password<br /><br />".
                    "Check user and password, then try creating the database manually and running setup again." );
      }

      //create new database
      if( ! ($result = @$query($database_connection, "CREATE DATABASE ".$database_name ) ) ) {
        error_setup("Connected to database, but the new database creation had the following error:<br />".$error($database_connection) );
      }

      //close the standard template database
      pg_close($database_connection );

      //open the new database
      if( ! ( $database_connection = @pg_connect( "user=".$database_user." dbname=".$database_name." password=".$database_password ) ) ) {
        error_setup("New database was created successfully, but cannot re-connect to the database server." );
      }
    }

    //sanity check
    if( ! is_readable("db/schema_pgsql.sql" ) ) {
      error_setup("Database schema is missing.  Check that the file /db/schema_pgsql.sql exists and is readable by the webserver." );
    }

    //open schema file
    if( ! $handle = fopen("db/schema_pgsql.sql", "r" ) ) {
      error_setup("Not able to read database schema file" );
    }

    //input the file
    $schema = fread($handle, filesize("db/schema_pgsql.sql" ) );
    fclose($handle );

    //roughly separate schema into individual table setups
    $schema_array = explode(";", $schema );

    //clean up the leading & trailing whitespaces, and remove any null strings
    $max = sizeof($schema_array );
    $j = 0;
    for($i=0 ; $i < $max ; $i++) {
      if(strlen($input = trim($schema_array[$i] ) ) > 0 ) {
        $table_array[$j] = $input;
        $j++;
      }
    }

    //create tables from schema
    foreach($table_array as $table ){
      if( ! ($result = @$query($database_connection, $table ) ) ) {
        error_setup("The database creation had the following error:<br /> ".$error($database_connection) );
      }
    }
    break;

  default:
    error_setup("Not a valid database type" );
    break;
  }

  //check if config file can be written to
  if( ! is_writable("config/config.php" ) ) {
    error_setup( "<p>Creating a new database for WebCollab ... success!</p>\n".
                 "<p>Your database has been successfully setup.</p>\n".
                 "<p>The config file (config.php) exists, but the webserver does not have permissions to write to it.<br /><br />\n".
                 "You can either:<ul>\n<li>Change the file permissions to allow the webserver to write to the file 'config.php'</li>\n".
                 "<li>Continue with a manual configuration by editing the file directly.</li></p>\n" );
  }

create_top_setup("Database Setup" );

$content =  "<form method=\"POST\" action=\"setup_handler.php\">\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"setup3\" />\n".
            "<input type=\"hidden\" name=\"db_host\" value=\"$database_host\" />\n".
            "<input type=\"hidden\" name=\"db_user\" value=\"$database_user\" />\n".
            "<input type=\"hidden\" name=\"db_password\" value=\"$database_password\" />\n".
            "<input type=\"hidden\" name=\"db_name\" value=\"$database_name\" />\n".
            "<input type=\"hidden\" name=\"db_type\" value=\"$database_type\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"Y\" />\n".
            "<div align=\"center\"><p>Creating a new database for WebCollab ... success!</p>\n".
            "<p>Your new database has been successfully created.</p><br />\n".
            "<input type=\"submit\" value=\"Continue to configuration\" /></div>\n".
            "</form>\n";

new_box_setup( "Setup - Stage 3 of 5 : Database Creation", $content, "boxdata", "singlebox" );
create_bottom_setup();

?>
