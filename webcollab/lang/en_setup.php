<?php
/*
  $Id: en_message.php 1756 2007-03-31 09:12:53Z andrewsimpson $

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

  Setup language file for 'en' (English)

  Maintainer: Andrew Simpson <andrewnz.simpson at gmail.com>

*/

//NOTE: Language encodings in this file must always be in UTF-8

//required language encodings
define('CHARACTER_SET', "UTF-8" );

//xml language identifier
define('XML_LANG', "en" );

//common
    $lang_setup['yes']                 = "Yes";
    $lang_setup['no']                  = "No";
    $lang_setup['submit']              = "Submit";
    $lang_setup['finish']              = "Finish";
    $lang_setup['db_name']             = "Database name:";
    $lang_setup['db_user']             = "Database user:";
    $lang_setup['db_password']         = "Database password:";
    $lang_setup['db_host']             = "Database host:";
    $lang_setup['db_type']             = "Database type:";
    $lang_setup['file_location']       = "File location:";
    $lang_setup['file_size']           = "File size:";
    $lang_setup['language']            = "Language:";
    $lang_setup['timezone']            = "Timezone:";
    $lang_setup['use_email']           = "Use email?";
    $lang_setup['smtp_host']           = "SMTP Host:";
    $lang_setup['use_smtp_auth']       = "Use SMTP AUTH?";
    $lang_setup['smtp_mail_user']      = "Username:";
    $lang_setup['smtp_mail_password']  = "Password:";
    $lang_setup['use_smtp_tls']        = "Use TLS email connection?";
    $lang_setup['help']                = "Help me with this form";
    $lang_setup['no_config']           = "Current configuration file does not allow web-based setup";

//setup
    $lang_setup['min_version']         = "WebCollab needs PHP version %s, or higher.  This version is %s";
    $lang_setup['no_mbstring']         = "Unable to set UTF-8 encoding in PHP.<br \>\n".
                                         "The PHP installed on this server does not appear to have the multi-byte string (mb_string) library enabled.<br />\n".
                                         "This library is essential for using UTF-8 with WebCollab";

    $lang_setup['require_login']       = "Admin login is required for setup:";
    $lang_setup['login']               = "Login:";
    $lang_setup['password']            = "Password:";
    $lang_setup['language']            = "Language:";
    $lang_setup['setup_banner']        = "Login";
    $lang_setup['no_login']            = "Access denied; incorrect login or password";

//setup1

    $lang_setup['setup1_no_permission'] = "<p><b>The webserver does not have permissions to write to the config file ([webcollab]/config/config.php).</b></p>".
                                         "<p><b>You can make a new database, but setup will not be able proceed and write to the config file.</b></p>\n".
                                         "<p><b>To complete the setup you can either:</b></p>\n<ul>\n".
                                         "<li><b>Change the file permissions to allow the webserver to write to the file '/config/config.php'</b></li>\n".
                                         "<li><b>Do a manual configuration by editing the config file directly.</b></li>\n</ul>\n";

    $lang_setup['setup1_db_exists']   = "<p>A database is already specified in the configuration file.  ".
                                         "Do you wish to create a new database?</p>\n";
    $lang_setup['setup1_no_db']        = "<p>A database is required to be created for WebCollab to operate.  ".
                                         "Do you wish to create a database now?</p>\n";
    $lang_setup['setup1_banner']       = "Setup - Stage 1 of 7 : Database Configuration Option";


//setup2

    $lang_setup['setup2_db_details1']  = "Please enter database details.  ".
                                         "The database user given here must be able to create databases.<br />\n".
                                         "(If desired, you can change the database user to a less privileged user in the next screen entry).\n";

    $lang_setup['setup2_db_details2']  = "The details for your database are:";
    $lang_setup['setup2_db_name']      = "Your database name:";
    $lang_setup['setup2_banner']       = "Setup - Stage 2 of 7 : Database Setup";

//db_build

    $lang_setup['setupdb_name_error']  = "Database names can only consist of alphanumeric characters, '_' (underscore), and '$'.<br />".
                                         "The '-' (dash) should only be used in the domain name part of remote databases.";

    $lang_setup['setupdb_no_mysql']    = "Your version of PHP does not have support for MySQL<br /><br />".
                                         "Check that MySQL support is installed, and the MySQL extension is enabled in the 'php.ini' configuration file<br /><br />".
                                         "Refer to the FAQ document for more information.";

    $lang_setup['setupdb_no_db_mysql'] = "Cannot connect to a database server at %1\$s<br /><br />".
                                         "Check that your specified user and password are correct, and that a MySQL database is running on %2\$s<br /><br />".
                                         "User:     %3\$s<br />Password: %4\$s<br />";

    $lang_setup['setupdb_no_pgsql']    = "Your version of PHP does not have support for PostgreSQL<br /><br />".
                                         "Check that PostgreSQL support is compiled in, and enabled in php.ini config file<br />";

    $lang_setup['setupdb_no_db_pgsql'] = "Cannot connect to the database server at %1\$s<br />".
                                         "No existing database, and cannot connect to PostgreSQL with standard 'template1' database to create a new database.<br /><br />".
                                         "User:     %2\$s<br />Password: %3\$s<br /><br />".
                                         "Check user and password, then try creating the database manually and running setup again.";

    $lang_setup['setupdb_no_config']   = "<p>Creating a new database for WebCollab ... success!</p>\n".
                                         "<p>Your database has been successfully setup.</p>\n".
                                         "<p>The config file (config.php) exists, but the webserver does not have permissions to write to it.<br /><br />\n".
                                         "You can either:<ul>\n<li>Change the file permissions to allow the webserver to write to the file 'config.php'</li>\n".
                                         "<li>Continue with a manual configuration by editing the file directly.</li></p>\n";

    $lang_setup['setupdb_done']        = "<p>Creating a new database for WebCollab ... success!</p>\n".
                                         "<p>Your new database has been successfully created.</p><br />";

    $lang_setupdb['setupdb_continue']  = "Continue to configuration";

    $lang_setup['setupdb_banner']      = "Setup - Stage 3 of 7 : Database Creation";

//setup3

    $lang_setup['setup3_no_config']    = "Configuration file needs to be made writeable by the webserver to proceed";
    $lang_setup['setup3_basic']        = "Basic Settings";
    $lang_setup['setup3_URL']          = "Base URL address of site. (Don't forget the trailing slash - e.g. http://mydomain.com/webcollab/)";
    $lang_setup['setup3_address']      = "Site address:";
    $lang_setup['setup3_name1']        = "The name of the site";
    $lang_setup['setup3_name2']        = "Site name:";
    $lang_setup['setup3_name3']        = "An abbreviated name of the site for emails";
    $lang_setup['setup3_name4']        = "Abbreviated site name:";
    $lang_setup['setup3_db']           = "Database Settings";
    $lang_setup['setup3_file1']        = "File Upload Settings";
    $lang_setup['setup3_file2']        = "Location where uploaded files will be stored";
    $lang_setup['setup3_file3']        = "Maximum size of file that can be uploaded (bytes)";
    $lang_setup['setup3_file4']        = "File size:";
    $lang_setup['setup3_language1']    = "Language Settings";
    $lang_setup['setup3_language2']    = "Languages marked with * are only available in the Unicode versions";
    $lang_setup['setup3_timezone']     = "Timezone Setting";
    $lang_setup['setup3_email']        = "Email Settings";
    $lang_setup['setup3_smtp']         = "SMTP host is required if email is enabled";
    $lang_setup['setup3_smtp_auth']    = "SMTP AUTH";
    $lang_setup['setup3_smtp_auth_option'] = "Username and password are required with SMTP AUTH option";
    $lang_setup['setup3_banner']       = "Setup - Stage 3 of 7 : Configuration";

//setup4

    $lang_setup['setup4_ok']           = "OK !";
    $lang_setup['setup4_url1']         = "OK ! (Setup cannot verify SSL connections)";
    $lang_setup['setup4_url2']         = "Self testing gives '404 page not found' message.<br />".
                                         "(Note: This test can give false warnings with some servers)";
    $lang_setup['setup4_url3']         = "Connection timeout: Not able to verify URL";
    $lang_setup['setup4_url4']         = "No connection: Not able to verify URL";
    $lang_setup['setup4_url5']         = "Cannot recognise URL: Try adding 'http://' prefix?";
    $lang_setup['setup4_no_mysql']     = "Fatal error: PHP does not have support for MySQL";
    $lang_setup['setup4_no_pgsql']     = "Fatal error: PHP does not have support for PostgreSQL";
    $lang_setup['setup4_wrong_db']     = "Database type %1\$s does not exist";
    $lang_setup['setup4_no_server']    = "Can't connect to specified database server!";
    $lang_setup['setup4_no_db']        = "Can't connect to specified database table!";
    $lang_setup['setup4_no_dir']       = "Directory either does not exist, or is not writable!";
    $lang_setup['setup4_max_file']     = "File size exceeds limit of %1\$s bytes set in php.ini";
    $lang_setup['setup4_no_lang']      = "Language file either does not exist, or file has been moved!";
    $lang_setup['setup4_no_mail']      = "Not able to verify mail server";
    $lang_setup['setup4_no_smtp']      = "SMTP Host must be specified!";
    $lang_setup['setup4_no_pass']      = "SMTP AUTH must have a username and password!";

    $lang_setup['setup4_fatal']        = "<b>Fatal errors detected in configuration!&nbsp;\n".
                                         "Press 'Re-enter Config Data' to make corrections.</b>";

    $lang_setup['setup4_warning']      = "<b>Warning errors detected in configuration.&nbsp;\n".
                                         "However, the auto-detection is not totally reliable.</b><br />\n".
                                         "<ul>\n<li><b>If you are sure the input is correct, press 'Write to Config' button to proceed.</b></li>\n".
                                         "<li><b>To edit, or alter the values, press 'Re-enter Config Data'.</b></li>\n</ul>\n";

    $lang_setup['setup4_all_ok']       = "No errors detected in the input configuration.<br />\n".
                                          "Press 'Write to Config' button to proceed.";

    $lang_setup['setup4_write']        = "Write Data to Config File";
    $lang_setup['setup4_reenter']      = "Re-enter Config Data";
    $lang_setup['setup4_banner']       = "Setup - Stage 4 of 7 : Verifying Data";

//setup5

    $lang_setup['setup5_writing']      = "Writing a new configuration file for WebCollab ... success!";
    $lang_setup['setup5_continue']     = "Continue to next stage";

    $lang_setup['setup5_complete']     = "<p>Setup is complete!</p>\n".
                                         "<p>The configuration information has been saved to '[webcollab]/config/config.php'. ".
                                         "This file can edited with a text editor to make further changes to configuration.</p>\n".
                                         "<p>For best security on *nix operating systems, remember to remove the world writeable permissions from 'config.php'.</p>\n".
                                         "<p>Please press the button to finish configuration, and login to WebCollab...</p>\n";

    $lang_setup['setup5_no_db']        = "<p><b>The setup program could not connect to the database. ".
                                         "Your default login and password will be 'admin' and 'admin123' when the database is connected.</b></p>\n".
                                         "<p>The configuration information has been saved to '[webcollab]/config/config.php'. ".
                                         "This file can edited with a text editor to make further changes to configuration.</p>\n".
                                         "<p>For best security on *nix operating systems, remember to remove the world writeable permissions from 'config.php'.</p>\n".
                                         "<p>Please press the button to abort configuration...</p>\n";

    $lang_setup['setup5_banner1']      = "Setup - Stage 5 of 7 : Writing configuration file";
    $lang_setup['setup5_banner2']      = "Setup - Stage 5 of 7 : Setup Completed";
    $lang_setup['setup5_banner3']      = "Setup - Stage 5 of 7 : Setup Aborting";

//setup6

    $lang_setup['setup6_title']        = "Setup the Administrator Account";
    $lang_setup['setup6_admin_user1']  = "Choose an username for the the Administrator";
    $lang_setup['setup6_admin_user2']  = "Admin username:";
    $lang_setup['setup6_admin_pass1']  = "Choose a password for the Administrator username";
    $lang_setup['setup6_admin_pass2']  = "Admin password:";
    $lang_setup['setup6_admin_check']  = "Enter the password again...";
    $lang_setup['setup6_email1']       = "Email address for the administrator";
    $lang_setup['setup6_email2']       = "Admin email:";
    $lang_setup['setup6_banner']       = "Setup - Stage 6 of 7 : Setup the Admin user and password";

//setup7

    $lang_setup['setup7_banner']       = "Setup - Stage 7 of 7 : Setup Completed";
    $lang_setup['setup5_complete']     = "<p>Setup is complete!</p>\n".
                                         "<p>The configuration information has been saved to '[webcollab]/config/config.php'. ".
                                         "This file can edited with a text editor to make further changes to configuration.</p>\n".
                                         "<p>For best security on *nix operating systems, remember to remove the world writeable permissions from 'config.php'.</p>\n".
                                         "<p>Please press the button to finish configuration, and login to WebCollab...</p>\n";
//screen javascript

    $lang_setup['setup_js_alert_field']= "Please enter the missing field";
    $lang_setup['setup_js_pass_match'] = "Passwords do not match!";
    $lang_setup['setup_js_email_miss'] = "Please enter a correct email address";

?>