<?php
/*
  $Id: lang_long.php 1736 2007-01-24 08:16:03Z andrewsimpson $

  (c) 2009 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com> 

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
if(! isset($locale_setup) ) {
  if(defined('LOCALE' ) ) {
    $locale_setup = LOCALE;
  }
  else {
    die('Config file not loaded properly for languages' );
  }
}

//initialise variables
$lang_setup = array();

switch($locale_setup ) {

  case 'en':
    include(BASE.'lang/en_setup.php' );
    break;

  default:
    include(BASE.'lang/en_setup.php' );
    break;
}

?>