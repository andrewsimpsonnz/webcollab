<?php
/*
  $Id: setup_setup4.php 2314 2009-09-21 07:40:27Z andrewsimpson $

  (c) 2003 - 2017 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//set language
if(isset($_POST['lang'] ) ) {
  $locale_setup = $_POST['lang'];
}

//get includes
require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );
include_once(BASE.'lang/lang_setup.php' );
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
  $data[$var] = $_POST[$var];
}

//non-essential values
$array_optional = array('manager_name', 'abbr_manager_name', 'db_password', 'file_base', 'file_maxsize',
                        'use_email', 'smtp_host', 'smtp_auth', 'smtp_port', 'mail_user', 'mail_password', 'tls', 'new_db' );

foreach($array_optional as $var ) {
  if(! isset($_POST[$var]) ) {
    $data[$var] = '';
  }
  else {
    $data[$var] = $_POST[$var];
  }
}

//convert checkboxes to 'Y' or 'N'
$array = array('use_email', 'smtp_auth', 'tls' );
foreach($array as $var ) {
  if($data[$var] === 'on' ) {
    $data[$var] = 'Y';
  }
  else {
    $data[$var] = 'N';
  }
}

//set port 587 with starttls
if($data['tls'] == 'Y' ) {
  $data['smtp_port'] = '587';
}
else {
  $data['smtp_port'] = '25';
}

$content  = '';
$flag = 0;

create_top_setup($lang_setup['setup4_banner'] );

$content .= "<table class=\"celldata\">\n".
            "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_basic']."</th></tr>\n";

//add leading slash to url - if necessary
if(substr(trim($data["base_url"] ), -1 ) != '/' ) {
  $data["base_url"] = trim($data["base_url"] ).'/';
}

//set variables
$status = "<span class=\"green\">".$lang_setup['setup4_ok']."</span>";
$url = parse_url($data["base_url"]);

//check that URL can be found
//open socket to http host
switch ($url["scheme"] ){
  case "https":
    $status = "<span class=\"blue\">".$lang_setup['setup4_url1']."</span>";
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
          $status = "<span class=\"blue\">".$lang_setup['setup4_url2']."</span>";
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
        $status = "<span class=\"blue\">".$lang_setup['setup4_url3']."</span>";
      }
      else {
        $status = "<span class=\"blue\">".$lang_setup['setup4_url4']."</span>";
      }
      $flag = $flag + 1;
    }
    break;

  default:
    $status = "<span class=\"red\">".$lang_setup['setup4_url5']."</span>";
    $flag = $flag + 10;
    break;
}

//basic settings
$content .= "<tr class=\"grouplist\"><th>".$lang_setup['setup3_address']."</th><td>".$data["base_url"]."</td><th>".$status."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup3_name2']."</th><td>".$data["manager_name"]."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['setup3_name4']."</th><td>".$data["abbr_manager_name"]."</td></tr>\n";

$status = "<span class=\"green\">".$lang_setup['setup4_ok']."</span>";

//check connection to database is possible...
if( ! extension_loaded('PDO' ) ) {

  switch($data["db_type"]) {

    case "mysql_pdo": 
      $status = "<span class=\"red\">".$lang_setup['setup4_no_mysql']."</span>";
      break;

    case "postgresql_pdo":
      $status = "<span class=\"red\">".$lang_setup['setup4_no_pgsql']."</span>";
      break;

    default:
      $status = "<span class=\"red\">".sprintf($lang_setup['setup4_wrong_db'], $data["db_type"] )."</span>";
      break;
  }
  $flag = $flag + 10;
}
else {

  try {
    switch($data["db_type"]) {

      case "mysql_pdo":
        //check for legal naming
        if(preg_match('/[^A-Z0-9_$\-]/i', $data["db_user"] ) ) {
          $status = "<span class=\"red\">".$lang_setup['setupdb_name_error']."</span>";
          $flag = $flag + 10;
        }
        else {
          //connect to db
          $dbh = new PDO('mysql:host='.$data["db_host"].';dbname='.$data["db_name"], $data["db_user"], $data["db_password"] );
        }
        break;

      case "postgresql_pdo":
        //connect to db
        $dbh = new PDO('pgsql:host='.$data["db_host"].' port=5432 dbname='.$data["db_name"].' user='.$data["db_user"].' password='.$data["db_password"] );

        break;

      default:
        $status = "<span class=\"red\">".sprintf($lang_setup['setup4_wrong_db'], $data["db_type"] )."</span>";
        $flag = $flag + 10;
        break;
    }

    //set error handling
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
  }
  catch (PDOException $e) {
    $status = "<span class=\"red\">".$lang_setup['setup4_no_server']."</span>";
    $flag = $flag + 10;
  }

  if($dbh ) {
    try {
      $sth = $dbh->query("SELECT COUNT(*) FROM ".PRE."site_name" );
      $result = $sth->fetch(PDO::FETCH_NUM );
    }
    catch (PDOException $e) {
      $status = "<span class=\"red\">".$lang_setup['setup4_no_db']."</span>";
      $flag = $flag + 10;
    }
  }
}

//database settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_db']."</th></tr>".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_name']."</th><td>".$data["db_name"]."</td><th>".$status."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_user']."</th><td>".$data["db_user"]."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_password']."</th><td>".$data["db_password"]."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_type']."</th><td>".$data["db_type"]."</td></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['db_host']."</th><td>".$data["db_host"]."</td></tr>\n";

$status = "<span class=\"green\">".$lang_setup['setup4_ok']."</span>";

//convert Windows back slash (\) to Unix forward slash (/) 
$filebase = str_replace("\\", "/", $data["file_base"] ); 

//check files directory exists
if( ! is_writable($filebase) ) {
  $status = "<span class=\"blue\">".$lang_setup['setup4_no_dir']."</span>";
  $flag = $flag + 1;
}

//file directory settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".
            $lang_setup['setup3_file1']."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['file_location']."</th><td>".$filebase."</td><th>".$status."</th></tr>\n";

$status = "<span class=\"green\">".$lang_setup['setup4_ok']."</span>";

//check max file size
$file_php_max = ini_get('upload_max_filesize' );

//check and allow for G, M or K suffixes
if(preg_match('/[GKM]/i', $file_php_max, $suffix ) ) {

  preg_match('/[0-9\.]/', $file_php_max, $numeric );

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
  $status = "<span class=\"blue\">".sprintf($lang_setup['setup4_max_file'], $file_php_max )."</span>";
  $flag = $flag + 1;
}

$content .= "<tr class=\"grouplist\"><th>".$lang_setup['file_size']."</th><td>".$data["file_maxsize"]."</td><th>".$status."</th></tr>\n";

$status = "<span class=\"green\">".$lang_setup['setup4_ok']."</span>";

//check language file exists and is readable
if( (! is_readable(BASE."lang/".$data["locale"]."_message.php" ) )
  || (! is_readable(BASE."lang/".$data["locale"]."_long_message.php" ) )
  || (! is_readable(BASE."lang/".$data["locale"]."_email.php" ) ) ) {
  $status = "<span class=\"red\">".$lang_setup['setup4_no_lang']."<span>";
  $flag = $flag + 10;
}

//language settings
$content .= "<tr class=\"grouplist-head\"><td></td><th>".$lang_setup['setup3_language1']."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['language']."</th><td>".$locale_array[($data["locale"])]."</td><th>".$status."</th></tr>\n".
            "<tr class=\"grouplist-head\"><td></td><th>".
            $lang_setup['setup3_timezone']."</th></tr>\n".
            "<tr class=\"grouplist\"><th>".$lang_setup['timezone']."</th><td>".$data["timezone"]."</td></tr>\n".
            "<tr class=\"grouplist-head\"><td></td><th>".
            $lang_setup['setup3_email']."</th></tr>\n".
            "<tr class=\"grouplist\"><th class=\"boxdata2\">".$lang_setup['use_email']."</th><td>".$data["use_email"]."</td></tr>\n";

$status = "<span class=\"green\">".$lang_setup['setup4_ok']."</span>";

if($data["use_email"] === "Y" && $data["smtp_host"] != "" && MAIL_TRANSPORT == 'SMTP' ) {

  if($fp = @fsockopen($data["smtp_host"], $data["smtp_port"], $errno, $errstr, 5 ) ) {
    //this function may not work in Windows (prefix with '@')
    @socket_set_timeout($fp, 1 );
    //socket successfully opened - clean up & close
    fputs($fp, "QUIT" );
    fclose($fp);
  }
  else{
      //could not open socket
      $status = "<span class=\"blue\">".$lang_setup['setup4_no_mail']."</span>";
      $flag = $flag + 1;
  }
}

if($data["use_email"] === "Y" && $data["smtp_host"] == "" ) {
  $status = "<span class=\"red\">".$lang_setup['setup4_no_smtp']."</span>";
  $flag = $flag + 10;
}

$content .= "<tr class=\"grouplist\"><th>".$lang_setup['smtp_host']."</th><td>".$data["smtp_host"]."</td><th>".$status."</th></tr>\n";

$content .= "<tr class=\"grouplist\"><th>".$lang_setup['use_smtp_auth']."</th><td>".$data["smtp_auth"]."</td></tr>\n";

if($data["smtp_auth"] == 'Y' ) {
  if((! $data["mail_user"] ) || (! $data["mail_password"] ) ) {
    $status = "<span class=\"red\">".$lang_setup['setup4_no_pass']."</span>";
    $flag = $flag + 10;
  }

  $content .= "<tr class=\"grouplist\"><th>".$lang_setup['smtp_mail_user']."</th><td>".$data["mail_user"]."</td><th>".$status."</th></tr>\n".
              "<tr class=\"grouplist\"><th>".$lang_setup['smtp_mail_password']."</th><td>".$data["mail_password"]."</td></tr>\n";
}

$content .= "<tr class=\"grouplist\"><th>".$lang_setup['use_smtp_tls']."</th><td>".$data["tls"]."</td></tr>\n";

if($flag > 9 ) {
  $status = "<div class=\"red\">".$lang_setup['setup4_fatal']."</div>\n";
}
else {
  if($flag > 0 ){
    $status = "<div class=\"blue\">".$lang_setup['setup4_warning']."</div>\n";
  }
  else {
    $status = "<div class=\"green\">".$lang_setup['setup4_all_ok']."</div>\n";
  }
}

//form for 'write to file' button
$content .= "<tr class=\"grouplist\"><td></td><th colspan=\"2\" style=\"height:60px;\">".$status."</th></tr>\n".
            "<tr class=\"grouplist\"><td></td><td>\n".
            "<form method=\"post\" action=\"setup_handler.php\">\n".
            "<fieldset>";

//output essential values for POST
foreach($array_essential as $var ) {
$content .= "<input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" />\n";
}

//output optional values for POST
foreach($array_optional as $var ) {
$content .= "<input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" />\n";
}

//show 'write to file' button
$content .= "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"setup5\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"".$data["new_db"]."\" />\n".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" /></fieldset>\n".
            "<div><input type=\"submit\" value=\"".$lang_setup['setup4_write']."\" /></div>".
            "</form>\n".
            "</td></tr>\n";

//form for 'try again' button
$content .= "<tr class=\"grouplist\"><td></td><td>\n".
            "<form method=\"post\" action=\"setup_handler.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"action\" value=\"setup3\" />\n".
            "<input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"new_db\" value=\"".$data["new_db"]."\" />\n".
            "<input type=\"hidden\" name=\"edit\" value=\"Y\" />".
            "<input type=\"hidden\" name=\"lang\" value=\"".$locale_setup."\" />\n";

//output essential values for POST
foreach($array_essential as $var ) {
  $content .= "<input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" />\n";
}

//output optional values for POST
foreach($array_optional as $var ) {
  $content .= "<input type=\"hidden\" name=\"".$var."\" value=\"".$data[$var]."\" />\n";
}

//show 'try again' button
$content .= "</fieldset>\n".
            "<div><input type=\"submit\" value=\"".$lang_setup['setup4_reenter']."\" /></div>\n".
            "</form>\n".
            "</td></tr>\n".
            "</table>\n";

new_box_setup($lang_setup['setup4_banner'], $content );

create_bottom_setup();

?>
