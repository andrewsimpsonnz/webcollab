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

if(! defined('LOCALE' ) ) {
  die('Config file not loaded properly for languages' );
}

switch(LOCALE ) {

  case 'en':
    include(BASE.'lang/en_email.php' );
    break;
      
  case 'bg':
    include(BASE.'lang/bg_email.php' );
    break;

  case 'ca':
    include(BASE.'lang/ca_email.php' );
    break;

  case 'cs':
    include(BASE.'lang/cs_email.php' );
    break;

  case 'da':
    include(BASE.'lang/da_email.php' );
    break;

  case 'de':
    include(BASE.'lang/de_email.php' );
    break;

  case 'es':
    include(BASE.'lang/es_email.php' );
    break;

  case 'fr':
    include(BASE.'lang/fr_email.php' );
    break;

  case 'gr':
    include(BASE.'lang/gr_email.php' );
    break;

  case 'hu':
    include(BASE.'lang/hu_email.php' );
    break;

  case 'it':
    include(BASE.'lang/it_email.php' );
    break;
  
  case 'ja':
    include(BASE.'lang/ja_email.php' );
    break;

  case 'ko':
    include(BASE.'lang/ko_email.php' );
    break;

  case 'pt-br':
    include(BASE.'lang/pt-br_email.php' );
    break;

  case 'ru':
    include(BASE.'lang/ru_email.php' );
    break;
  
  case 'se':
    include(BASE.'lang/se_email.php' );
    break;
  
  case 'sr':
    include(BASE.'lang/sr_email.php' );
    break;
      
  default:
    include(BASE.'lang/en_email.php' );
    break;
}

?>