<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Gives users the ability to add files.

*/

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."config.php" );

//check if file uploads are allowed in php.ini file
if( ! (bool)ini_get("file_uploads" ) )
  warning($lang["error"], $lang["no_file_uploads"] );

if( ! isset($_GET["taskid"]) || ! is_numeric($_GET["taskid"]) )
  error("File upload", "Not a valid taskid");

$taskid = $_GET["taskid"];

//check usergroup security
require_once(BASE."includes/usergroup_security.php" );

$content =  "<form name=\"inputform\" method=\"POST\" enctype=\"multipart/form-data\"  action=\"files/file_submit.php\">\n".
              "<input type=\"hidden\" name=\"action\" value=\"upload\" />\n".
              "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n".
              "<input type=\"hidden\" name=\"taskid\" value=\"$taskid\" />\n".
              "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"$FILE_MAXSIZE\" />\n".
              "<table border=\"0\">\n".
                "<tr><td>".$lang["file_choose"]."</td><td><input type=\"file\" name=\"userfile\" /></td></tr>\n".
                "<tr><td>".$lang["description"].":</td> <td><textarea name=\"description\" rows=\"10\" cols=\"60\"></textarea></td></tr>\n".
                "<tr><td></td><td>".sprintf( $lang["max_file_sprt"], $FILE_MAXSIZE/1000 )."</td></tr>\n".
              "</table><br /><br />\n".
              "<input type=\"submit\" value=\"".$lang["upload"]."\" />\n".
              "<input type=\"reset\" value=\"".$lang["reset"]."\" />\n".
            "</form>\n";

new_box($lang["add_file"], $content );


?>
