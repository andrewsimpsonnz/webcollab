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
<HTML>

<!-- (c) 2002 - 2003 Andrew Simpson -->


<HEAD>
  <TITLE><?php echo $title ?></TITLE>
  <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
  <LINK REL="StyleSheet" HREF=../css.css TYPE="text/css">
</HEAD>

<BODY>

<?php /* Main table init */ ?>
<TABLE cellspacing="0" cellpadding="0" border="0" width="100%" align="center">

  <?php

  //create the info part of the main window
  echo "<TR>\n<TD bgcolor=\"#000000\" colspan=\"2\" align=\"center\" valign=\"top\">\n";
  echo "<TABLE border=\"0\" width=\"100%\"><TR><TD align=\"left\" bgcolor=\"#000000\">\n";

  echo "</TD><TD bgcolor=\"#000000\" align=\"right\">\n";
  echo "<FONT color=\"#FFFFFF\"><SMALL>(c) 2003</SMALL>\n</FONT>\n</TD>\n</TR>";

  echo "</TABLE></TD></TR>\n";


  //if we choose to have only one space, we center it in stead of pushing it to the left
  if( $no_menu == 0 )
    echo "<TR valign=\"top\"><TD width=\"175\" align=\"center\">";
  else
    echo "<TR valign=\"top\"><TD width=\"100%\" align=\"center\">";

}



//
// Ends the page nicely
//
function create_bottom_setup() {

  //clean
  echo "<BR>";

  //end the main table
  echo "</TD></TR></TABLE>";

  //end xml parsing
  echo "\n</BODY>\n</HTML>\n";

}

//
//  Creates a new menu-window
//
function new_box_setup( $title, $content, $width="97%" ) {


  echo "\n<!-- start of ".$title."-box -->";
  echo "\n<BR>";

  echo "
  <TABLE border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"".$width."\">
    <TR>
      <TD bgcolor=\"#1E4B79\" align=\"left\"><FONT color=\"white\"><B>".$title."</B></FONT></TD>
    </TR>
    <TR>
      <TD bgcolor=\"#FFFFFF\" align=\"left\">\n".$content."\n</TD>
    </TR>
  </TABLE>\n <!-- end -->\n";
}

?>
