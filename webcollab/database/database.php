<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

*/

require_once("path.php" );

include_once(BASE."config/config.php" );

switch(DATABASE_TYPE ) {

  case "mysql":
    include(BASE."database/mysql_database.php" );
    break;

  case "postgresql":
    switch(version_compare(PHP_VERSION, "4.2.0" ) ) {
      case 0:
      case 1:
        include(BASE."database/pgsql_database.php" );
        break;

      case -1:
      default:
        include(BASE."database/pgsql_old_database.php" );
        break;
    }
    break;

  case "mysql_innodb":
    include(BASE."database/mysql_innodb_database.php" );
    break;

  default:
    die("No database type specified in configuration file" );
    break;
}

?>
