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
require_once("path.php" );

include_once(BASE."config/config.php" );

switch($LOCALE ) {

  case "ca":
    include(BASE."lang/ca_email.php" );
    break;

  case "de":
    include(BASE."lang/de_email.php" );
    break;

  case "es":
    include(BASE."lang/es_email.php" );
    break;

  case "fr":
    include(BASE."lang/fr_email.php" );
    break;

  case "it":
    include(BASE."lang/it_email.php" );
    break;

  case "en":
  default:
    include(BASE."lang/en_email.php" );
    break;
}

?>
