<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson.

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

  Creates a singular interface for language access.

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

//this creates an error if language is not set.  Email, long messages & help files are not checked.  

include_once( BASE."config.php" );  

switch( $LOCALE ) {

  case "en":
    include( BASE."lang/en_message.php" );
    break;

  default:
    die( "No language locale specified in configuration file" );
    break;
}

?>
