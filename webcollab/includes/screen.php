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
include_once( BASE."lang/language.php" );

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
  header("Cache-Control: no-cache, must-revalidate");
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

<?php /* Main table init */ ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">

  <?php

  //first of all record our loading time
  global $loadtime;
  list($usec, $sec)=explode(" ", microtime());
  $loadtime = ( (float)$usec + (float)$sec );

  //create the info part of the main window
  echo "<tr>\n<td bgcolor=\"#000000\" colspan=\"2\" align=\"center\" valign=\"top\">\n";
  echo "<table border=\"0\" width=\"100%\"><tr><td align=\"left\" bgcolor=\"#000000\">\n";

  //show username if applicable
  if($username != "" )
    echo "<font color=\"#EEEEEE\"><b><small>".sprintf( $lang["user_homepage_sprt"], $username )."</small></b></font>\n";

  echo "</td><td bgcolor=\"#000000\" align=\"right\">\n";
  echo "<font color=\"#FFFFFF\"><SMALL>(c) 2001-2003</small>\n</font>\n</td>\n</tr>";

  echo "</table></td></tr>\n";


  //if we choose to have only one space, we center it in stead of pushing it to the left
  if($no_menu == 0 )
    echo "<tr valign=\"top\"><td width=\"175\" align=\"center\">";
  else
    echo "<tr valign=\"top\"><td width=\"100%\" align=\"center\">";

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
  echo "<div align=\"center\"><font color=\"#1E4B79\">\n<small>".sprintf( $lang["load_time_sprt"], $finishtime, $database_query_time, $database_query_count )."</small></font></div><br />\n";

  //end xml parsing
  echo "\n</body>\n</html>\n";

}



//
//  Creates a new menu-window
//
function new_box($title, $content, $width="97%" ) {


  echo "\n<!-- start of ".$title."-box -->";
  echo "\n<br />";

  echo "
  <table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"".$width."\">
    <tr>
      <td bgcolor=\"#1E4B79\" align=\"left\"><FONT color=\"white\"><b>".$title."</b></font></td>
    </tr>
    <tr>
      <td bgcolor=\"#FFFFFF\" align=\"left\">\n".$content."\n</td>
    </tr>
  </table>\n <!-- end -->\n";


}



//
// End the left frame and go the the right one
//
function goto_main() {
  echo "</td><td align=\"center\">";
}


?>
