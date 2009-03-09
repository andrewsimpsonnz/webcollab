<?php

/*
  $Id: en_message.php 2065 2009-01-31 08:10:31Z andrewsimpson $

  WebCollab
  ---------------------------------------

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License; or (at your option) any later version.

  This program is distributed in the hope that it will be useful; but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not; write to the Free Software Foundation; Inc.; 675 Mass Ave;
  Cambridge; MA 02139; USA.


  Function:
  ---------

  Language files for 'en' (English)

  Maintainer: Andrew Simpson <andrew.simpson at paradise.net.nz>

  NOTE: 1. Language encodings in this file must be the same as those in xx_message.php (e.g. en_message.php, fr_message.php)
        2. Character set is defined in the matching xx_message.php file

*/

    $lang['submit']                    = "Submit";
    $lang['finish']                    = "Finish";

//setup
    $lang['min_version']               = "WebCollab needs PHP version 4.3.0, or higher.  This version is ".PHP_VERSION;
    $lang['no_mbstring']               = "Unable to set UTF-8 encoding in PHP.<br \>\n".
                                         "The PHP installed on this server does not appear to have the multi-byte string (mb_string) library enabled.<br />\n".
                                         "This library is essential for using UTF-8 with WebCollab";

    $lang['require_login']             = "Admin login is required for setup:";
    $lang['login']                     = "Login:";
    $lang['password']                  = "Password:";
    $lang['language']                  = "Language:";
    $lang['setup_banner']              = "Login";

//setup6

    $lang['setup6_title']              = "Setup the Administrator Account";
    $lang['setup6_admin_user1']        = "Choose an username for the the Administrator";
    $lang['setup6_admin_user2']        = "Admin username:";
    $lang['setup6_admin_pass1']        = "Choose a password for the Administrator username";
    $lang['setup6_admin_pass2']        = "Admin password:";
    $lang['setup6_admin_check']        = "Enter the password again...";
    $lang['setup6_email1']             = "Email address for the administrator";
    $lang['setup6_email2']             = "Admin email";
    $lang['setup6_banner']             = "Setup - Stage 6 of 7 : Setup the Admin user and password";

//setup7

    $lang['setup7_banner']             = "Setup - Stage 7 of 7 : Setup Completed";
    $lang['setup5_complete']           = "<p>Setup is complete!</p>\n".
                                         "<p>The configuration information has been saved to '[webcollab]/config/config.php'. ".
                                         "This file can edited with a text editor to make further changes to configuration.</p>\n".
                                         "<p>For best security on *nix operating systems, remember to remove the world writeable permissions from 'config.php'.</p>\n".
                                         "<p>Please press the button to finish configuration, and login to WebCollab...</p>\n";

?>