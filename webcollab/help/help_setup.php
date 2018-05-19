<?php
/*
  $Id$

  (c) 2003 - 2007 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Creates a singular interface for setup help access.

*/

//get our location
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

//language select
switch($_GET['lang'] ) {

  case 'es':
    $lang_prefix = 'es';
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

  case 'en':
  default:
    $lang_prefix = 'en';
    break;
}

//select file
switch($_GET['type'] ) {

  case 'setup2':
    if(is_readable(BASE.'help/'.$lang_prefix.'_help_setup2.php') ) {
      include_once(BASE.'help/'.$lang_prefix.'_help_setup2.php');
    }
    else {
      include_once(BASE.'help/en_help_setup2.php');
    }
    break;

  case 'setup3':
    if(is_readable(BASE.'help/'.$lang_prefix.'_help_setup3.php') ) {
      include_once(BASE.'help/'.$lang_prefix.'_help_setup3.php');
    }
    else {
      include_once(BASE.'help/en_help_setup3.php');
    }
    break;

  default:
    //no matches
    break;
}

?>
