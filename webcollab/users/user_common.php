<?php
/*
  $Id$

  (c) 2005 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  User settings for locale

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//
// Create drop down box with available languages
//
function user_locale($locale) {

  $content = '';

  if(UNICODE_VERSION != 'Y') {
    return;
  }

  //get list of languages
  include_once(BASE.'lang/lang_list.php' );

  //language list
  $selection = array_keys($lang_list);

  //initialise array with null values
  for( $i=0 ; $i < 20 ; ++$i ) {
    $s[$i] = "";
  }

  //highlight current language
  $selected = array_search($locale, $selection );
  $s[$selected] = " selected=\"selected\"";

  //start menu box
  $content .= "<tr><td>Language:</td><td><select name=\"locale\">\n";
  $i = 0;

  foreach($selection as $var ) {
    $content .= "<option value=\"".$var."\" ".$s[$i].">".$lang_list[$var]."</option>\n";
    ++$i;
  }

  $content .= "</select></td></tr>\n";

 return $content;
}

//
// Check validity of language string
//
function user_locale_check($locale ) {

  if(UNICODE_VERSION != 'Y') {
    return LOCALE;
  }

  //get list of languages
  include_once(BASE.'lang/lang_list.php' );

  //language list
  $available_lang = array_keys($lang_list);

  if(! array_search($locale, $available_lang ) ) {
    warning("User submit", "Language file ".$locale." does not exist" );
  }

  return $locale;
}

?>