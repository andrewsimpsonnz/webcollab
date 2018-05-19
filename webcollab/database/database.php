<?php
/*
  $Id$

  (c) 2002 - 2008 Andrew Simpson <andrewnz.simpson at gmail.com>

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

if(! defined('DATABASE_TYPE' ) ) {
  die('Config file not loaded properly for database' );
}

switch(DATABASE_TYPE ) {

  case 'mysql_pdo':
    require(BASE.'database/mysql_pdo.php' );
    break;

  case 'postgresql_pdo':
    require(BASE.'database/postgresql_pdo.php' );
    break;

  default:
    die('No database type specified in configuration file' );
    break;
}

?>
