<?php
/*
  $Id: setup_setup5.php 1737 2008-01-24 08:16:45Z andrewsimpson $

  (c) 2008 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Update the admin details to the database

*/

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );

//set language
$locale_setup = LOCALE;

include_once(BASE.'lang/lang.php' );
include_once(BASE.'lang/lang_setup2.php' );
require_once(BASE.'setup/security_setup.php' );

//if user aborts, let the script carry onto the end
ignore_user_abort(TRUE);

//essential values - must be present
$array_essential = array('admin_user', 'admin_password', 'admin_password_check' );
$array_error     = array('admin_user' => 'username', 'admin_password' => 'password', 'admin_password_check' => 'password' );

foreach($array_essential as $var ) {
  if(! isset($_POST[$var]) || $_POST[$var] == NULL ) {
    error_setup("The value for ".$array_error[$var]." is not set");
  }
  $$var = $_POST[$var];
}

//clean up admin_user
$admin_user = safe_data($admin_user );

//verify passwords
if(! $admin_password == $admin_password_check ) {
  error_setup('Password check failed' );
}

//check for valid email
if(USE_EMAIL == 'Y' ) {

  if(! isset($_POST['admin_email']) || $_POST['admin_email'] == NULL ) {
    error_setup("The value for email is not set");
  }

  if((! preg_match('/\b[a-z0-9\.\_\-]+@[a-z0-9][a-z0-9\.\-]+\.[a-z\.]+\b/i', $_POST['admin_email'] ) ) || (strlen(trim($_POST['admin_email']) ) > 200 ) ) {
    error_setup('Invalid email address given' );
  }

  $admin_email = $_POST['admin_email'];
}
else {
  $admin_email = NULL;
}

//set the database encoding
db_user_locale(CHARACTER_SET );

//update the database
db_query("UPDATE ".PRE."users SET name='".$admin_user."', password='".md5($admin_password )."', email='".$admin_email."' WHERE id=1;" );

//show success message
create_top_setup($lang['setup7_banner'] );

$content = "<div align='center'>\n".$lang['setup5_complete']."\n";

$content .=  "<p><form name='inputform' method='post' action='index.php'>\n".
             "<input type='submit' value='".$lang['finish']."' />\n".
             "</form></p>\n".
             "</div>\n";

new_box_setup($lang['setup7_banner'], $content, 'boxdata', 'singlebox' );

create_bottom_setup();

?>
