<?php
/*
  $Id$
  
  (c) 2003 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Verify setup before writing to file

*/

require_once("path.php" );

require_once(BASE."config/config.php" );
require_once(BASE."setup/security_setup.php" );
include_once(BASE."setup/screen_setup.php" );

//essential values - must be present
$array_essential = array("db_name", "db_user", "db_password", "db_type", "db_host", "base_url", "locale" );
foreach($array_essential as $var ) {
  if(! isset($_POST[$var]) || $_POST[$var] == NULL ) {
    error_setup("Variable ".$var." is not set");
  }
  $data[$var] = $_POST[$var];
}


//non-essential values
$array_optional = array("manager_name", "abbr_manager_name", "file_base", "file_maxsize", "email_error", "use_email",
                "smtp_host", "new_db" );

foreach($array_optional as $var ) {
  if(! isset($_POST[$var]) )
    $data[$var] = "";
  else
    $data[$var] = $_POST[$var];
}

//convert checkboxes to 'Y' or 'N'
$array = array("use_email" );
foreach($array as $var ) {
  if($data[$var] == "on" )
    $data[$var] = "Y";
  else
    $data[$var] = "N";
}

$content  = "";
$flag = 0;

create_top_setup("Setup Screen" );

$content .= "<table border=\"0\">\n".
            "<tr><td>\n".
            "<form method=\"POST\" action=\"setup_handler.php\">";
            

//output essential values for POST
foreach($array_essential as $var ) {
$content .= "<input type=\"hidden\" name=\"$var\" value=\"".$data[$var]."\" />\n";
}

//output optional values for POST
foreach($array_optional as $var ) {
$content .= "<input type=\"hidden\" name=\"$var\" value=\"".$data[$var]."\" />\n";
}

$content .= "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"setup5\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"".$data["new_db"]."\" />\n";
            

//set variables
$status = "<font color=\"green\"><b>OK !</b></font>";
$url = parse_url($data["base_url"]);

//check that URL can be found
//open socket to http host
switch ($url["scheme"] ){
  case "https":
    $status = "<font color=\"blue\"><b>OK ! (Setup cannot verify SSL connections)</b></font>";
    break;

  case "http":
    if($fp = fsockopen ($url["host"], 80, $errno, $errstr, 5 ) ) {
      //this function may not work in Windows (prefix with '@')
      @socket_set_timeout($fp, 1 );
      //socket open - request HEAD
      fputs($fp,"HEAD ".$url["path"]." HTTP/1.0\n\n");
      $line = fgets($fp, 2048 );
      while (trim($line) != "") {
        if( ! strpos($line, "404" ) === FALSE ){
          //404 - not found
          $status = "<font color=\"red\"><b>Invalid URL given!</b></font>";
          $flag = $flag + 10;
          break;
        }
        if( ! strpos($line, "301" ) === FALSE ){
          //301 - moved permanently
          $status = "<font color=\"blue\"><b>Need to add trailing slash ( e.g. ".$url["path"]."/ )</b></font>";
          $flag = $flag + 1;
          break;
        }
        $line = fgets($fp, 2048 );
      }
    fclose($fp);
    }
    else{
      //could not open socket
      $status = "<font color=\"blue\"><b>Not able to verify URL</b></font>";
      $flag = $flag + 1;
    }
    break;

  default:
    $status = "<font color=\"red\"><b>Invalid URL given! Try adding 'http://' prefix.</b></font>";
    $flag = $flag + 10;
    break;
}

//basic settings
$content .= "</td><td><br /><b><u>Basic Settings</u></b></td></tr>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr><th>Site address:</th><td>".$data["base_url"]."</td><td>$status</td></tr>\n".
            "<tr><th>Site name:</th><td>".$data["manager_name"]."</td></tr>\n".
            "<tr><th>Abbreviated site name:</th><td>".$data["abbr_manager_name"]."</td></tr>\n";

$status = "<font color=\"green\"><b>OK !</b></font>";

//check connection to database is possible...
switch($data["db_type"]) {

  case "mysql":
  case "mysql_innodb":
    //check we can do mysql functions!!
    if( ! function_exists('mysql_connect' ) ) {
      $status = "<font color=\"red\"><b>Fatal error: PHP does not have support for MySQL</b></font>";
      $flag = $flag + 10;
    }
    else {
      //connect to db
      if( ! ($database_connection = @mysql_connect( $data["db_host"], $data["db_user"], $data["db_password"] ) ) ) {
        $status = "<font color=\"red\"><b>Can't connect to specified database server!</b></font>";
        $flag = $flag + 10;
      }
      else {
        if( ! @mysql_select_db($data["db_name"], $database_connection ) ) {
          $status = "<font color=\"red\"><b>Can't connect to specified database!</b></font>";
          $flag = $flag + 10;
        }
      }
    }
    break;

  case "postgresql":
    //check we can do postgresql functions!!
    if( ! function_exists('pg_connect' ) ) {
      $status = "<font color=\"red\"><b>Fatal error: PHP does not have support for PostgreSQL</b></font>";
      $flag = $flag + 10;
    }
    else {
      //set initial value
      $host = "";
      //now adjust if necessary
      if($DATABASE_HOST != "localhost" )
        $host = "host=".$DATABASE_HOST;
        
      //connect to db
      if( ! @pg_connect($host." user=".$data["db_user"]." dbname=".$data["db_name"]." password=".$data["db_password"] ) ) {
        $status = "<font color=\"red\"><b>Can't connect to specified database!</b></font>";
        $flag = $flag + 10;
      }
    }
    break;

  default:
    setup_error("Database ".$data["db_type"]." does not exist</font>" );
    break;

}

//database settings
$content .= "<tr><td></td><td><br /><b><u>Database Settings</u></b></td></tr>".
            "<tr><td>&nbsp;</td></tr>".
            "<tr><th>Database name:</th><td>".$data["db_name"]."</td><td>$status</td></tr>\n".
            "<tr><th>Database user:</th><td>".$data["db_user"]."</td></tr>\n".
            "<tr><th>Database password:</th><td>".$data["db_password"]."</td></tr>\n".
            "<tr><th>Database type:</th><td>".$data["db_type"]."</td></tr>\n".
            "<tr><th>Database host:</th><td>".$data["db_host"]."</td></tr>\n";

$status = "<font color=\"green\"><b>OK !</b></font>";

//check files directory exists
if( ! is_writable($data["file_base"]) ) {
  $status = "<font color=\"blue\"><b>Directory either does not exist, or is not writable!</b></font>";
  $flag = $flag + 1;
}

//file settings
$content .= "<tr><td></td><td><br /><br /><b><u>File Upload Settings</u></b></td></tr>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr><th>File location:</th><td>".$data["file_base"]."</td><td>$status</td></tr>\n".
            "<tr><th>File size:</th><td>".$data["file_maxsize"]."</td></tr>\n";

$status = "<font color=\"green\"><b>OK !</b></font>";

//check language file exists and is readable
if( (! is_readable(BASE."lang/".$data["locale"]."_message.php" ) )
  || (! is_readable(BASE."lang/".$data["locale"]."_long_message.php" ) )
  || (! is_readable(BASE."lang/".$data["locale"]."_email.php" ) ) ) {
  $status = "<font color=\"red\"><b>Language file either does not exist, or file has been moved!</b></font>";
  $flag = $flag + 10;
}

//language settings
$content .= "<tr><td></td><td><br /><br /><b><u>Language Settings</u></b></td></tr>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr><th>Language:</th><td>".$data["locale"]."</td><td>$status</td></tr>\n".
            "<tr><td></td><td><br /><br /><b><u>Email Settings</u></b></td></tr>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr><th>Use email?</th><td>".$data["use_email"]."</td></tr>\n";
            "<tr><td></td><td><br /><br />If an error occurs on the site, who do we email?</td></tr>\n".
            "<tr><th>Error emails sent to:</th><td>".$data["email_error"]."</td></tr>\n";

$status = "<font color=\"green\"><b>OK !</b></font>";

if($data["use_email"] == "Y" && $data["smtp_host"] != "" ) {

  if($fp = fsockopen($data["smtp_host"], 25, $errno, $errstr, 5 ) ) {
    //this function may not work in Windows (prefix with '@')
    @socket_set_timeout($fp, 1 );
    //socket successfully opened - clean up & close
    fputs($fp, "QUIT" );
    fclose($fp);
  }
  else{
      //could not open socket
      $status = "<font color=\"blue\"><b>Not able to verify mail server</b></font>";
      $flag = $flag + 1;
  }
}

if($data["use_email"] == "Y" && $data["smtp_host"] == "" ) {
  $status = "<font color=\"red\"><b>SMTP Host must be specified!</b></font>";
  $flag = $flag + 1;
}

$content .= "<tr><th>SMTP Host:</th><td>".$data["smtp_host"]."</td><td>$status</td></tr>\n";

$status = "<font color=\"green\"><b>OK !</b></font>";

if($flag > 9 )
  $status = "<font color=\"red\"><b>Fatal errors detected in configuration!</b></font>";
else {
  if($flag > 0 ){
    $status = "<font color=\"blue\"><b>Warning errors in configuration.  Proceed with caution!</b></font>";
  }
  else{
    $status = "<font color=\"green\"><b>No errors detected in the input configuration. Press 'Write to Config' button to proceed.</b></font>";
  }
}

//show 'write to file' button
$content .= "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr><td></td><td colspan=\"2\">$status<br /><br /></td></tr>\n".
            "<tr><td></td><td><input type=\"submit\" value=\"Write Data to Config File\" /></td></tr>\n".
            "</form>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n";

//form for 'try again' button
$content .= "<tr><td></td><td>\n".
            "<form method=\"POST\" action=\"setup_handler.php\">\n".            
            "<input type=\"hidden\" name=\"action\" value=\"setup3\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />".
            "<input type=\"hidden\" name=\"new_db\" value=\"".$data["new_db"]."\" />";
            
//output essential values for POST
foreach($array_essential as $var ) {
$content .= "<input type=\"hidden\" name=\"$var\" value=\"".$data[$var]."\" />\n";
}

//output optional values for POST
foreach($array_optional as $var ) {
$content .= "<input type=\"hidden\" name=\"$var\" value=\"".$data[$var]."\" />\n";
}

//show 'try again' button
$content .= "<input type=\"submit\" value=\"Re-enter Config Data\" /></td></tr>\n".
            "</form>\n".
            "</table>\n";
            
new_box_setup( "Setup - Stage 4 of 5 : Verifying Data", $content, "boxdata", "tablebox" );
create_bottom_setup();

?>