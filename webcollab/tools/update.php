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

  Backup databases

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/screen.php" );

$alert = "";

//update for version 1.32 -> 1.40
if(! (db_query("SELECT groupaccess FROM config", 0 ) ) ) {
    db_query("ALTER TABLE tasks ADD COLUMN groupaccess VARCHAR(5)" );
    db_query("ALTER TABLE tasks ALTER COLUMN groupaccess SET DEFAULT 'f'" );
    db_query("ALTER TABLE config ADD COLUMN groupaccess VARCHAR(50)" );
    $alert .= "<p>Updated from version pre-1.40 database</p>\n"; 
}

//update for version 1.51 -> 1.60
if(! (db_query("SELECT * FROM login_attempt", 0 ) ) ) {
  
  switch ($DATABASE_TYPE) {
    case "mysql":
      db_query("CREATE TABLE login_attempt ( name VARCHAR(100) NOT NULL,
                                              ip VARCHAR(100) NOT NULL,
                                              last_attempt DATETIME NOT NULL)" );
      break;
    
    case "mysql_innodb":
      db_query("CREATE TABLE login_attempt ( name VARCHAR(100) NOT NULL,
                                              ip VARCHAR(100) NOT NULL,
                                              last_attempt DATETIME NOT NULL)
                                              TYPE = innoDB" );
      break;

        
    case "postgresql":
      db_query("CREATE TABLE \"login_attempt\" ( \"name\" character varying(100) NOT NULL,
                                              \"ip\" character varying(100) NOT NULL,
                                              \"last_attempt\" timestamp with time zone NOT NULL DEFAULT current_timestamp(0))" );
      break;
    
    default:
      error("Database type not specified in config file." );
      break;
  }
$alert .= "<p>Updated from version pre-1.60 database</p>\n";
} 
  
//update for version 1.51 -> 1.60
if(! (db_query("SELECT private FROM users", 0 ) ) ) {
    db_query("ALTER TABLE users ADD COLUMN private INT" );
    db_query("ALTER TABLE users ALTER COLUMN private SET DEFAULT 0" );
}

//update for version 1.51 -> 1.60
if(! (db_query("SELECT private FROM usergroups", 0 ) ) ) {
    db_query("ALTER TABLE usergroups ADD COLUMN private INT" );
    db_query("ALTER TABLE usergroups ALTER COLUMN private SET DEFAULT 0" );
}
$content = "<p>Update was successfully completed.</p>\n";

if( ! $alert )
  $alert = "<p>No database updates were required</p>\n";

$content .= $alert;  
  
//display box calls
create_top("Info" );
new_box("Update completed", $content, "boxdata", "singlebox" );
create_bottom();

?>