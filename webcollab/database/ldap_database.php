<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

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

include_once(BASE."config.php" );
include_once(BASE."includes/common.php" );

//set some base variables
$database_connection = "";
$last_insert = "id";
$delim = "";
$epoch = "UNIX_TIMESTAMP( ";

//
// Provides a safe way to do a query
//
function ldap_query( $ds, $dn, $filter, $parameters ) {

  global $LDAP_HOST;

  if( ! $ldap_connection ) {

    //global variables don't seem to work within functions
    $ldap_host = $LDAP_HOST;
  
    //make connection
    if( ! ($ldap_connection = @ldap_pconnect($ldap_host ) ) )
      error("No database connection",  "Sorry but there seems to be a problem in connecting to the ldap server");

    //select database
    if( ! @ldap_bind($database_connection ) )
      error("Database error", "Not able to bind to ldap server" );
  }

  //do it
  if( ! ($result = ldap_search($ds, $dn, $filter, $parameters) ) ) {;
    error("Database query error", "The following query :<br /><br /><b> $filter </b><br /><br />Had the following error:<br /><b>".ldap_error($ldap_connection)."</b>" );
  }

  //all was okay return resultset
  return $result;
}


//
// number of rows in result
//
function ldap_numrows($q ) {

  $result = ldap_count_entries($q );

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
function ldap_get_entries($q ) {

  $result_row = ldap_get_entries($ldap_connection, $q  );

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
