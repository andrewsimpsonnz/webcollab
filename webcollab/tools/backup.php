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

//security check
$DATABASE_USER = "";
$DATABASE_PASSWORD = ""; 
$DATABASE_NAME ="";

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."includes/screen.php" );
include_once(BASE."includes/email.php" );
include_once(BASE."includes/admin_config.php" ); 

//set variables
$output = "";
$backup = "";
$error ="";


switch(substr(PHP_OS, 0, 3)){
  case "Lin":
    switch ($DATABASE_TYPE ) {
      case "mysql":
      case "mysql_innodb":
        exec("mysqldump -u $DATABASE_USER \"--password=$DATABASE_PASSWORD\"  --opt $DATABASE_NAME 2>&1", $output, $exit_code );
        if($exit_code == 1 ){
          while(list(,$line_out) = @each($output ) ) {
            $error .= $line_out."<br />\n";
          }
          error("Backup error", "Backup command failed.  Error message from system was:<br /><br />".$error );
        }
        break;
        
      case "postgresql":
        exec("pg_dump $db_name 2>&1", $output, $exit_code );
        if($exit_code == 1 ){
          while(list(,$line_out) = @each($output ) ) {
            $error .= $line_out."<br />\n";
          }
          error("Backup error", "Backup command failed.  Error message from system was:<br /><br />".$error );
        }
        break;
        
      default:
        error("Database", "Incorrect database specified in config file");
        break;
    }
    break;
  
  case "WIN":
    switch ($DATABASE_TYPE ) {
      case "mysql":
      case "mysql_innodb":
        exec("start /D \"C:\\mysql\\bin\" /B mysqldump.exe", $output, $exit_code );
        if($exit_code == 1 ){
          while(list(,$line_out) = @each($output ) ) {
            $error .= $line_out."<br />\n";
          }
          error("Backup error", "Backup command failed.  Error message from system was:<br /><br />".$error );
        }
        break;
      
      case "postgresql":
        error("Error", "Not implemented yet for PostgreSQL under Windows" );
        break;
    }
          
  case "Dar":
  default:
    error("Error", "Not implemented yet for ".substr(PHP_OS, 0, 3) );
    break;
}

while(list(,$line_out) = @each($output ) ) {
  $backup .= $line_out."\n";
}

email($EMAIL_ADMIN, "WebCollab Database Backup", $backup );

$content = "Backup was successful and has been sent to $EMAIL_ADMIN";

//display box calls
create_top("Info" );
new_box("Backup completed", $content, "boxdata", "singlebox" );
create_bottom();

?>