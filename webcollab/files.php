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

  All functions and code needed to manage files

*/

require_once("includes/security.php" );
include_once("includes/screen.php" );

//
// The action handler
//
if( ! valid_string($_REQUEST["action"]) )
  error("Contacts action handler", "No request given" );

  //what do you want to task today =]
  switch($_REQUEST["action"] ) {

    //create a box with the current files
    case "list":
      include("files/file_list.php" );
      break;

    //upload a file
    case "upload":
      create_top($lang["file_choose"], 0, "userfile" );
      include("includes/mainmenu.php" );
      goto_main();
      include("files/file_upload.php" );
      create_bottom();
      break;

    //admin files
    case "admin":
      create_top($lang["file_admin"] );
      $taskid=-1;
      include("includes/mainmenu.php" );
      include("files/file_menubox.php" );
      goto_main();
      include("files/file_admin.php" );
      create_bottom();
      break;

    //Error case
    default:
      error("File action handler", "Invalid request given" );
      break;
  }

?>
