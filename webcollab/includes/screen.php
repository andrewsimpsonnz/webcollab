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

  Create the window'ed interface and define a simple API

  The screen is split in 3 components. the table is called main_table

  +----------------+
  |  info          |
  +----------------+
  |   |            |
  | m |            |
  | e |            |
  | n |  main      |
  | u |            |
  |   |            |
  |   |            |
  +---+------------+


  And the api is :
  ----------------

  new_box( title, content );
  goto_main();


  This implicates that all the boxes you create before calling goto_main() will be menu boxes. After
  the call all boxes are main window boxes. Pretty simple.


  the internal functions are:
  ---------------------------

  create_top();
  create_bottom();


  pretty easy huh ;-)

*/

require_once("path.php" );

include_once( BASE."config.php" );
include_once( BASE."lang/lang.php" );

//
// Creates the inital window, and sets some vars. This _HAS_ to be the first function because of the header() calls
//
function create_top($title="", $no_menu=0, $cursor="" ) {

  global $username, $admin, $topbuild, $MANAGER_NAME, $lang;

  if( $title == "" ) $title=$MANAGER_NAME;

  //javascript to position cursor in the first box
  if($cursor != "" ) {
    $position = "<script language=\"JavaScript\" type=\"text/javascript\">\n".
                "<!-- \n".
                "function cursor() {document.inputform.".$cursor.".focus();}\n".
                " // -->\n".
                "</script>\n";

    $script = " onLoad=cursor()";
  }
  else {
    $position = "";
    $script = "";
  }

  //don't rebuild the top again if already built
  if( $topbuild == 1 )
    return;
  else
    $topbuild = 1;

  //we don't want any caching of these pages
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<!-- (c) 2001 Dennis Fleurbaaij created for core-lan.nl -->
<!-- (c) 2002 - 2003 Andrew Simpson -->


<head>
  <title><?php echo $title ?></title>
  <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
  <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
  <link REL="StyleSheet" HREF=<?php echo BASE; ?>css.css TYPE="text/css">
  <?php echo $position; ?>
</head>

<body<?php echo $script; ?>>

  <?php

  //first of all record our loading time
  global $loadtime;
  list($usec, $sec)=explode(" ", microtime());
  $loadtime = ( (float)$usec + (float)$sec );

  //create the main table
  echo "\n<!-- start main table -->\n";
  echo "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\" align=\"center\">\n";

  //create the masthead part of the main window
  if($no_menu == 0 )
    echo "<tr>\n<td colspan=\"2\">";
  else
    echo "<tr>\n<td>";
  echo "<div class=\"masthead\">";

  //show username if applicable
  if($username != "" )
    echo sprintf( $lang["user_homepage_sprt"], $username );

  echo "</div></td></tr>\n";


  //if we have only one space, we center it as 100% instead of pushing it to the left
  if($no_menu == 0 )
    echo "<tr valign=\"top\"><td width=\"175\" align=\"center\">";
  else
    echo "<tr valign=\"top\"><td width=\"100%\" align=\"center\">";
  return;
}



//
// Ends the page nicely
//
function create_bottom() {

  global $loadtime, $database_query_time, $database_query_count, $lang;

  //clean
  echo "<br>";

  //end the main table
  echo "</td></tr></table>";


  //shows the time it took to load the page
  list($usec, $sec)=explode(" ", microtime() );
  $finishtime = ( (float)$usec + (float)$sec ) - $loadtime;
  echo "<div class=\"loadtime\">\n".sprintf( $lang["load_time_sprt"], $finishtime, $database_query_time, $database_query_count )."</div><br />\n";

  //end xml parsing
  echo "\n</body>\n</html>\n";
  return;
}



//
//  Creates a new menu-window
//
function new_box($title, $content, $style="boxdata", $size="tablebox" ) {

  echo "\n<!-- start of ".$title."-box -->";
  echo "\n<br />";

  echo "
  <table class=\"".$size."\">
    <tr>
      <td class=\"boxhead\">".$title."</td>
    </tr>
    <tr>
      <td class=\"".$style."\">\n".$content."\n</td>
    </tr>
  </table>\n <!-- end -->\n";
  return;
}



//
// End the left frame and go the the right one
//
function goto_main() {
  echo "</td><td align=\"center\">";
  return;
}

?>
