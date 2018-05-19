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

  Creates a singular interface for language access.

*/

if(! defined('LOCALE_USER' ) ) {
  die('Config file not loaded properly for languages' );
}

switch(LOCALE_USER ) {

  case 'en':
    include(BASE.'lang/en_long_message.php' );
    break;

  case 'bg':
    include(BASE.'lang/bg_long_message.php' );
    break;

  case 'ca':
    include(BASE.'lang/ca_long_message.php' );
    break;

  case 'cs':
    include(BASE.'lang/cs_long_message.php' );
    break;

  case 'da':
    include(BASE.'lang/da_long_message.php' );
    break;

  case 'de':
    include(BASE.'lang/de_long_message.php' );
    break;

  case 'eo':
    include(BASE.'lang/eo_long_message.php' );
    break;

  case 'es':
    include(BASE.'lang/es_long_message.php' );
    break;

  case 'fr':
    include(BASE.'lang/fr_long_message.php' );
    break;

  case 'gr':
    include(BASE.'lang/gr_long_message.php' );
    break;

  case 'hu':
    include(BASE.'lang/hu_long_message.php' );
    break;

  case 'it':
    include(BASE.'lang/it_long_message.php' );
    break;

  case 'ja':
    include(BASE.'lang/ja_long_message.php' );
    break;

  case 'ko':
    include(BASE.'lang/ko_long_message.php' );
    break;

  case 'nl':
    include(BASE.'lang/nl_long_message.php' );
    break;

  case 'no':
    include(BASE.'lang/no_long_message.php' );
    break;

  case 'pl':
    include(BASE.'lang/pl_long_message.php' );
    break;

  case 'pt':
    include(BASE.'lang/pt_long_message.php' );
    break;

  case 'pt-br':
    include(BASE.'lang/pt-br_long_message.php' );
    break;

  case 'ru':
    include(BASE.'lang/ru_long_message.php' );
    break;

  case 'se':
    include(BASE.'lang/se_long_message.php' );
    break;

  case 'sk':
    include(BASE.'lang/sk_long_message.php' );
    break;

  case 'sl':
    include(BASE.'lang/sl_long_message.php' );
    break;

  case 'sr-cy':
    include(BASE.'lang/sr-cy_long_message.php' );
    break;

  case 'sr-la':
    include(BASE.'lang/sr-la_long_message.php' );
    break;

  case 'tr':
    include(BASE.'lang/tr_long_message.php' );
    break;

  case 'zh-hk':
    include(BASE.'lang/zh-hk_long_message.php' );
    break;

  case 'zh-tw':
    include(BASE.'lang/zh-tw_long_message.php' );
    break;

  case 'zh-cn':
    include(BASE.'lang/zh-cn_long_message.php' );
    break;

  default:
    include(BASE.'lang/en_long_message.php' );
    break;
}

?>

