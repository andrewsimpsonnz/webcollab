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

  Creates a singular interface for language access.

*/

//get our location
require_once("path.php" );

require_once(BASE."config/config.php" );

$help_item = $_GET["item"];
$help_type = $_GET["type"];

switch($LOCALE ) {

  case "bg":
    switch($help_type ) {
      case "admin":
        header("Location: ".$BASE_URL."help/bg_help_admin.php#".$help_item );
        break;

      case "help":
      default:
        header("Location: ".$BASE_URL."help/bg_help.php#".$help_item );
        break;
    }
    break;
  
  case "es":
    switch($help_type ) {
      case "admin":
        header("Location: ".$BASE_URL."help/es_help_admin.php#".$help_item );
        break;

      case "help":
      default:
        header("Location: ".$BASE_URL."help/es_help.php#".$help_item );
        break;
    }
    break;

  case "de":
    switch($help_type ) {
      case "admin":
        header("Location: ".$BASE_URL."help/de_help_admin.php#".$help_item );
        break;

      case "help":
      default:
        header("Location: ".$BASE_URL."help/de_help.php#".$help_item );
        break;
    }
    break;

  case "en":
  default:
   switch($help_type ) {
      case "admin":
        header("Location: ".$BASE_URL."help/en_help_admin.php#".$help_item );
        break;

      case "help":
      default:
        header("Location: ".$BASE_URL."help/en_help.php#".$help_item );
        break;
    }
}

?>
