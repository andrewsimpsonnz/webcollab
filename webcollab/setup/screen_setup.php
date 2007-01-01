<?php
/*
  $Id$

  (c) 2003 - 2007 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Setup login screen control

*/

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );

//
// Creates the inital window, and sets some vars. This _HAS_ to be the first function because of the header() calls
//
function create_top_setup($title='' ) {

  global $topbuild;

  //don't rebuild the top again if already built
  if( $topbuild == 1 ) {
    return;
  }
  else {
    $topbuild = 1;
  }
  
  //we don't want any caching of these pages
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");


  echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n".
       "<html>\n\n".
       "<!-- (c) 2002 - 2006 Andrew Simpson -->\n\n".
       "<head>\n".
       "<title>".$title."</title>\n".
       "<meta http-equiv=\"Pragma\" content=\"no-cache\">".
       "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".SETUP_CHARACTER_SET."\">\n".
       "<link rel=\"StyleSheet\" href=\"".BASE_CSS.SETUP_CSS."\" type=\"text/css\">\n".
       "</head>\n\n".
       "<body>\n";
  
  //create the main table
  echo "\n<!-- start main table -->\n".
       "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\" align=\"center\">\n";

  //create the masthead part of the main window
  echo "<tr>\n<td>".
       "<div class=\"masthead\">".
       "</div></td></tr>\n".
       "<tr valign=\"top\"><td width=\"100%\" align=\"center\">";

  return;
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
  return;
}

//
//  Creates a new menu-window
//
function new_box_setup($title, $content, $style='boxdata', $size='tablebox' ) {

  echo "\n<!-- start of ".$title."-box -->";
  echo "\n<br />";

  echo "
  <table class=\"".$size."\" cellspacing=\"0\">
    <tr>
      <td class=\"boxhead\">::&nbsp;".$title."</td>
    </tr>
    <tr>
      <td class=\"".$style."\">\n".$content."\n</td>
    </tr>
  </table>\n <!-- end -->\n";
  return;
}

?>
