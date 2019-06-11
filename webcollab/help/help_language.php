<?php
/*
  $Id$

  (c) 2003 - 2013 Andrew Simpson <andrewnz.simpson at gmail.com>

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
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

if(preg_match('/^[a-zA-Z0-9\-_]+$/', $_GET['item'] ) ) {
  $help_item = $_GET['item'];
}
else {
  $help_item = '';
}

switch($_GET['lang'] ) {

  case 'bg':
    $lang_prefix = 'bg';
    break;

  case 'es':
    $lang_prefix = 'es';
    break;

  case 'de':
    $lang_prefix = 'de';
    break;

  case 'nl':
    $lang_prefix = 'nl';
    break;

  case 'pt':
    $lang_prefix = 'pt';
    break;

  case 'pt-br':
    $lang_prefix = 'pt-br';
    break;

  case 'ru':
    $lang_prefix = 'ru';
    break;

  case 'se':
    $lang_prefix = 'se';
    break;

  case 'fr':
    $lang_prefix = 'fr';
    //French only has one help file translated 
    header('Location: '.BASE_URL.'help/'.$lang_prefix.'_help.php#'.$help_item );
    break;

  case 'en':
  default:
    $lang_prefix = 'en';
    break;
}

switch($_GET['type'] ) {
  case 'admin':
    header('Location: '.BASE_URL.'help/'.$lang_prefix.'_help_admin.php#'.$help_item );
    break;

  case 'help':
  default:
    header('Location: '.BASE_URL.'help/'.$lang_prefix.'_help.php#'.$help_item );
    break;
}


?>
