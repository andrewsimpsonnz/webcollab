<?php
/*
  $Id$

  (c) 2003 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

require_once('path.php' );

require_once(BASE.'setup/security_setup.php' );

//security checks
if( ! isset($WEB_CONFIG ) || $WEB_CONFIG !== 'Y' ) {
  error_setup($lang_setup['no_config'] );
  die;
}

//essential values - must be present
$array_essential = array('db_name', 'db_user', 'db_type', 'db_host', 'base_url', 'locale', 'timezone' );
foreach($array_essential as $var ) {
  if(! isset($_POST[$var]) || $_POST[$var] == NULL ) {
    error_setup("Variable ".$var." is not set");
  }
  $data[$var] = (get_magic_quotes_gpc() ) ? stripslashes($_POST[$var] ) : $_POST[$var];
}

//non-essential values
$array_optional = array('manager_name', 'abbr_manager_name', 'db_password', 'file_base', 'file_maxsize', 'use_email', 'smtp_host', 'new_db' );

foreach($array_optional as $var ) {
  if(! isset($_POST[$var]) ) {
    $data[$var] = '';
  }
  else {
    $data[$var] = (get_magic_quotes_gpc() ) ? stripslashes($_POST[$var] ) : $_POST[$var];
  }
}

//convert checkboxes to 'Y' or 'N'
$array = array('use_email' );
foreach($array as $var ) {
  if($data[$var] === 'on' ) {
    $data[$var] = 'Y';
  }
  else {
    $data[$var] = 'N';
  }
}

$content  = '';
$flag = 0;

create_top_setup($lang_setup['setup4_banner'] );

$content .= "<table border=\"0\">\n".
            "<tr><td>\n".
            "<form method=\"post\" action=\"setup_handler.php\">";


//output essential values for POST
foreach($array_essential as $var ) {
$content .= "<fieldset><input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" />\n";
}

//output optional values for POST
foreach($array_optional as $var ) {
$content .= "<input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" />\n";
}

$content .= "<input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"setup5\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"".$data["new_db"]."\" />\n".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" /></fieldset>\n";


//add leading slash to url - if necessary
if(substr(trim($data["base_url"] ), -1 ) != '/' ) {
  $data["base_url"] = trim($data["base_url"] ).'/';
}

//set variables
$status = "<font color=\"green\"><b>".$lang_setup['setup4_ok']."</b></font>";
$url = parse_url($data["base_url"]);

//check that URL can be found
//open socket to http host
switch ($url["scheme"] ){
  case "https":
    $status = "<font color=\"blue\"><b>".$lang_setup['setup4_url1']."</b></font>";
    break;

  case "http":
    if($fp = @fsockopen ($url["host"], 80, $errno, $errstr, 5 ) ) {
      //this function may not work in Windows (prefix with '@')
      @socket_set_timeout($fp, 1 );
      //socket open - request HEAD
      fputs($fp,"HEAD ".$url["path"]." HTTP/1.0\n\n");
      $line = fgets($fp, 2048 );
      while (trim($line) != "") {
        if( ! strpos($line, "404" ) === FALSE ) {
          //404 - not found
          $status = "<font color=\"blue\"><b>".$lang_setup['setup4_url2']."</b></font>";
          $flag = $flag + 1;
          break;
        }
        $line = fgets($fp, 2048 );
      }
    fclose($fp);
    }
    else {
      //could not open socket
      $meta = @socket_get_status($fp);
      if($meta['timed_out'] ) {
        $status = "<font color=\"blue\"><b>".$lang_setup['setup4_url3']."</b></font>";
      }
      else {
        $status = "<font color=\"blue\"><b>".$lang_setup['setup4_url4']."</b></font>";
      }
      $flag = $flag + 1;
    }
    break;

  default:
    $status = "<font color=\"red\"><b>".$lang_setup['setup4_url5']."</b></font>";
    $flag = $flag + 10;
    break;
}

//basic settings
$content .= "</td><td><br /><b><u>".$lang_setup['setup3_basic']."</u></b></tr>\n".
            "<tr><th>".$lang_setup['setup3_address']."</th><td>".$data["base_url"]."</td><td>".$status."</td></tr>\n".
            "<tr><th>".$lang_setup['setup3_name2']."</th><td>".$data["manager_name"]."</td></tr>\n".
            "<tr><th>".$lang_setup['setup3_name4']."</th><td>".$data["abbr_manager_name"]."</td></tr>\n";

$status = "<font color=\"green\"><b>".$lang_setup['setup4_ok']."</b></font>";

//check connection to database is possible...
switch($data["db_type"]) {

  case "mysql":
  case "mysql_innodb":
    //check we can do mysql functions!!
    if( ! function_exists('mysql_connect' ) ) {
      $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_mysql']."</b></font>";
      $flag = $flag + 10;
    }
    else {
      //check for legal naming
      if(preg_match('/[^A-Z0-9_$\-]/i', $data["db_user"] ) ) {
        $status = "<font color=\"red\"><b>".$lang_setup['setupdb_name_error']."</b></font>";
        $flag = $flag + 10;
      }
      else {
        //connect to db
        if( ! ($database_connection = @mysql_connect( $data["db_host"], $data["db_user"], $data["db_password"] ) ) ) {
          $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_server']."</b></font>";
          $flag = $flag + 10;
        }
        else {
          if( ! @mysql_select_db($data["db_name"], $database_connection ) ) {
            $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_db']."</b></font>";
            $flag = $flag + 10;
          }
        }
      }
    }
    break;

  case "mysqli":
    //check we can do mysql functions!!
    if( ! function_exists('mysqli_connect' ) ) {
      $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_mysql']."</b></font>";
      $flag = $flag + 10;
    }
    else {
      //check for legal naming
      if(preg_match('/[^A-Z0-9_$\-]/i', $data["db_user"] ) ) {
        $status = "<font color=\"red\"><b>".$lang_setup['setupdb_name_error']."</b></font>";
        $flag = $flag + 10;
      }
      else {
        //connect to db
        if( ! ($database_connection = @mysqli_connect( $data["db_host"], $data["db_user"], $data["db_password"], $data["db_name"] ) ) ) {
          $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_server']."</b></font>";
          $flag = $flag + 10;
        }
      }
    }
    break;

  case "postgresql":
    //check we can do postgresql functions!!
    if( ! function_exists('pg_connect' ) ) {
      $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_pgsql']."</b></font>";
      $flag = $flag + 10;
    }
    else {
      //set initial value
      $host = "";
      //now adjust if necessary
      if($data["db_host"] != "localhost" ) {
        $host = "host=".$data["db_host"];
      }
      //connect to db
      if( ! @pg_connect($host." user=".$data["db_user"]." dbname=".$data["db_name"]." password=".$data["db_password"] ) ) {
        $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_db']."</b></font>";
        $flag = $flag + 10;
      }
    }
    break;

  default:
    $status = "<font color=\"red\"><b>".sprintf($lang_setup['setup4_wrong_db'], $data["db_type"] )."</b></font>";
    $flag = $flag + 10;
    break;

}

//database settings
$content .= "<tr><td></td><td><br /><br /><b><u>".$lang_setup['setup3_db']."</u></b></td></tr>".
            "<tr><th>".$lang_setup['db_name']."</th><td>".$data["db_name"]."</td><td>".$status."</td></tr>\n".
            "<tr><th>".$lang_setup['db_user']."</th><td>".$data["db_user"]."</td></tr>\n".
            "<tr><th>".$lang_setup['db_password']."</th><td>".$data["db_password"]."</td></tr>\n".
            "<tr><th>".$lang_setup['db_type']."</th><td>".$data["db_type"]."</td></tr>\n".
            "<tr><th>".$lang_setup['db_host']."</th><td>".$data["db_host"]."</td></tr>\n";

$status = "<font color=\"green\"><b>".$lang_setup['setup4_ok']."</b></font>";

//convert Windows back slash (\) to Unix forward slash (/) 
$filebase = str_replace("\\", "/", $data["file_base"] ); 

//check files directory exists
if( ! is_writable($filebase) ) {
  $status = "<font color=\"blue\"><b>".$lang_setup['setup4_no_dir']."</b></font>";
  $flag = $flag + 1;
}

//file directory settings
$content .= "<tr><td></td><td><br /><br /><b><u>".$lang_setup['setup3_file1']."</u></b></td></tr>\n".
            "<tr><th>".$lang_setup['file_location']."</th><td>".$filebase."</td><td>".$status."</td></tr>\n";

$status = "<font color=\"green\"><b>".$lang_setup['setup4_ok']."</b></font>";

//check max file size
$file_php_max = ini_get('upload_max_filesize' );

//check and allow for G, M or K suffixes
if(preg_match('/[GKM]/i', $file_php_max, $suffix ) ) {

  preg_match('/[0-9]/', $file_php_max, $numeric );

  $file_php_max = $numeric[0];

  switch ($suffix[0] ) {
    case 'g':
    case 'G':
      $file_php_max *= 1024 * 1024 * 1024;
      break;

    case 'm':
    case 'M':
      $file_php_max *= 1024 * 1024;
      break;

    case 'k':
    case 'K':
      $file_php_max *= 1024 ;
      break;

    default:
    //do nothing
    break;
  }
}

if ($data["file_maxsize"] > $file_php_max ) {
  $status = "<font color=\"blue\"><b>".sprintf($lang_setup['setup4_max_file'], $file_php_max )."</b></font>";
  $flag = $flag + 1;
}

$content .= "<tr><th>".$lang_setup['file_size']."</th><td>".$data["file_maxsize"]."</td><td>".$status."</td></tr>\n";

$status = "<font color=\"green\"><b>".$lang_setup['setup4_ok']."</b></font>";

//check language file exists and is readable
if( (! is_readable(BASE."lang/".$data["locale"]."_message.php" ) )
  || (! is_readable(BASE."lang/".$data["locale"]."_long_message.php" ) )
  || (! is_readable(BASE."lang/".$data["locale"]."_email.php" ) ) ) {
  $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_lang']."</b></font>";
  $flag = $flag + 10;
}

//language settings
$content .= "<tr><td></td><td><br /><br /><b><u>".$lang_setup['setup3_language1']."</u></b></td></tr>\n".
            "<tr><th>".$lang_setup['language']."</th><td>".$data["locale"]."</td><td>".$status."</td></tr>\n".
            "<tr><td></td><td><br /><br /><b><u>".$lang_setup['setup3_timezone']."</u></b></td></tr>\n".
            "<tr><th>".$lang_setup['timezone']."</th><td>".$data["timezone"]."</td></tr>\n".
            "<tr><td></td><td><br /><br /><b><u>".$lang_setup['setup3_email']."</u></b><br /></td></tr>\n".
            "<tr><th>".$lang_setup['use_email']."</th><td>".$data["use_email"]."</td></tr>\n";

$status = "<font color=\"green\"><b>".$lang_setup['setup4_ok']."</b></font>";

if($data["use_email"] === "Y" && $data["smtp_host"] != "" && MAIL_TRANSPORT == 'SMTP' ) {

  if($fp = @fsockopen($data["smtp_host"], 25, $errno, $errstr, 5 ) ) {
    //this function may not work in Windows (prefix with '@')
    @socket_set_timeout($fp, 1 );
    //socket successfully opened - clean up & close
    fputs($fp, "QUIT" );
    fclose($fp);
  }
  else{
      //could not open socket
      $status = "<font color=\"blue\"><b>".$lang_setup['setup4_no_mail']."</b></font>";
      $flag = $flag + 1;
  }
}

if($data["use_email"] === "Y" && $data["smtp_host"] == "" ) {
  $status = "<font color=\"red\"><b>".$lang_setup['setup4_no_smtp']."</b></font>";
  $flag = $flag + 10;
}

$content .= "<tr><th>".$lang_setup['smtp_host']."</th><td>".$data["smtp_host"]."</td><td>".$status."</td></tr>\n";

if($flag > 9 ) {
  $status = "<font color=\"red\"><b>".$lang_setup['setup4_fatal']."</b></font>\n";
}
else {
  if($flag > 0 ){
    $status = "<font color=\"blue\"><b>".$lang_setup['setup4_warning']."</b><font>\n";
  }
  else {
    $status = "<font color=\"green\"><b>".$lang_setup['setup4_all_ok']."</b></font>\n";
  }
}

//show 'write to file' button
$content .= "<tr><td></td><td>&nbsp;</td></tr>\n".
            "<tr><td></td><td colspan=\"2\">".$status."<br /><br /></td></tr>\n".
            "<tr><td></td><td><input type=\"submit\" value=\"".$lang_setup['setup4_write']."\" /></td></tr>\n".
            "</form>\n".
            "<tr><td></td><td>&nbsp;</td></tr>\n";

//form for 'try again' button
$content .= "<tr><td></td><td>\n".
            "<form method=\"post\" action=\"setup_handler.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"action\" value=\"setup3\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"".$data["new_db"]."\" />\n".
            "<input type=\"hidden\" name=\"edit\" value=\"Y\" />".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" />\n";


//output essential values for POST
foreach($array_essential as $var ) {
$content .= "<input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" />\n";
}

//output optional values for POST
foreach($array_optional as $var ) {
$content .= "<input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" /></fieldset>\n";
}

//show 'try again' button
$content .= "<input type=\"submit\" value=\"".$lang_setup['setup4_reenter']."\" /></td></tr>\n".
            "</form>\n".
            "</table>\n";

new_box_setup($lang_setup['setup4_banner'], $content, "boxdata", "tablebox" );

create_bottom_setup();

?>