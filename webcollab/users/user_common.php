<?php
/*
  $Id$

  (c) 2005 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  //get list of languages
  include_once(BASE.'lang/lang_list.php' );

  //start menu box
  $content .= "<tr><td>Language:</td><td><select name=\"locale\">\n";

  foreach($lang_list as $key => $value ) {

    $content .= "<option value=\"".$key."\" ";

    //highlight current language
    if($locale == $key) {
      $content .= " selected=\"selected\"";
    }

    $content .= ">".$value."</option>\n";
  }

  $content .= "</select></td></tr>\n";

 return $content;
}

//
// Check validity of language string
//
function user_locale_check($locale ) {

  //get list of languages
  include_once(BASE.'lang/lang_list.php' );

  if(! isset($lang_list[$locale ] ) ) {
    warning("User submit", "Language file ".$locale." does not exist" );
  }

  return $locale;
}

//
// Function to generate blowfish hashes
//
function pass_hash($password ) {
  
  $hash = password_hash($password, PASSWORD_DEFAULT );

  if($hash === false ) {
    error('Password setting error', 'Password hash algorithm failed. Transaction cancelled' );
  }

  return $hash;
}
?>
