<?php
/*
This dummy file allows the config file to be moved outside the web directory
root for enhanced security.

You will need to change the path below to suit the new location and add the
directory location to the 'include_path' directive in php.ini.

See http://www.php.net/manual/en/ini.core.php#ini.include-path

*/

//this require defines 'BASE' as either './' or '../'
require_once('path.php' );

//this require gets the actual config file from the location specified 
require_once(BASE.'config/config.php' );

?>