<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file written in 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Setup login screen control

*/

//
// Creates the inital window, and sets some vars. This _HAS_ to be the first function because of the header() calls
//
function create_top_setup($title="", $no_menu=0 ) {

  global $topbuild;

  //don't rebuild the top again if already built
  if( $topbuild == 1 )
    return;
  else
    $topbuild = 1;

  //we don't want any caching of these pages
  header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");

  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<!-- (c) 2002 - 2003 Andrew Simpson -->


<head>
  <title><?php echo $title ?></TITLE>
  <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
  <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
  <link REL="StyleSheet" HREF=../css.css TYPE="text/css">
</head>

<body>

<?php /* Main table init */ ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%" align="center">

  <?php

  //create the info part of the main window
  echo "<tr>\n<td bgcolor=\"#000000\" colspan=\"2\" align=\"center\" valign=\"top\">\n";
  echo "<table border=\"0\" width=\"100%\"><tr><td align=\"left\" bgcolor=\"#000000\">\n";

  echo "</td><td bgcolor=\"#000000\" align=\"right\">\n";
  echo "<font color=\"#FFFFFF\"><small>(c) 2003</small>\n</font>\n</td>\n</tr>";

  echo "</table></td></tr>\n";


  //if we choose to have only one space, we center it in stead of pushing it to the left
  if( $no_menu == 0 )
    echo "<tr valign=\"top\"><td width=\"175\" align=\"center\">";
  else
    echo "<tr valign=\"top\"><td width=\"100%\" align=\"center\">";

}



//
// Ends the page nicely
//
function create_bottom_setup() {

  //clean
  echo "<br />";

  //end the main table
  echo "</td></tr></table>";

  //end xml parsing
  echo "\n</body>\n</html>\n";

}

//
//  Creates a new menu-window
//
function new_box_setup( $title, $content, $width="97%" ) {


  echo "\n<!-- start of ".$title."-box -->";
  echo "\n<br />";

  echo "
  <table border=\"0\" cellpadding=\"10\" cellspacing=\"0\" width=\"".$width."\">
    <tr>
      <td bgcolor=\"#1E4B79\" align=\"left\"><FONT color=\"white\"><b>".$title."</b></font></td>
    </tr>
    <tr>
      <td bgcolor=\"#FFFFFF\" align=\"left\">\n".$content."\n</td>
    </tr>
  </table>\n <!-- end -->\n";
}

?>
