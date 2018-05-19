<?php
/*
  $Id$

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

  Setup login screen control

*/

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );
require_once(BASE.'setup/setup_config.php' );
include_once(BASE.'lang/lang_setup.php' );

//
// Creates the inital window, and sets some vars. This _HAS_ to be the first function because of the header() calls
//
function create_top_setup($title='', $check=0 ) {

  global $lang;

  //we only send the headers and HTML head once...
  if(! defined('HEADER_DONE' ) ) {

    echo # Next four lines are for XHTML page
         #"<!DOCTYPE html PUBLIC\n".
         #"\"-//W3C//DTD XHTML 1.0 Strict//EN\"\n".
         #"\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n".
         #"<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"".XML_LANG."\" lang=\"".XML_LANG."\">\n\n".
         # Next two lines for HTML5 page
         "<!DOCTYPE html>\n".
         "<html lang=\"".XML_LANG."\">\n\n".
         "<!-- WebCollab ".WEBCOLLAB_VERSION." -->\n".
         "<!-- (c) 2002-2017 Andrew Simpson for WebCollab -->\n\n".
         "<head>\n".
         "<title>".$title."</title>\n".
         "<meta charset=\"utf-8\" />\n".
         "<link rel=\"StyleSheet\" href=\"".BASE_CSS.SETUP_CSS."\" type=\"text/css\" />\n".
         "<link rel=\"icon\" type=\"image/png\" href=\"images/group.png\" />\n";
  }

  //javascript scripts
  if($check ) {
    echo "<script type=\"text/javascript\" src=\"".BASE_URL."js/webcollab-setup.js\"></script>\n";
  }

  echo  "</head>\n\n".
        "<body>\n".
        "<div id=\"container\">\n".
        "<div id=\"top\" class=\"masthead\">".
        "</div>\n\n".
        "<!-- start single main table -->\n".
        "<div id=\"single\">\n";

  //mark headers as done
  define('HEADER_DONE', 1 );

  return;
}

//
//  Creates a new box
//
function new_box_setup($title, $content, $box="boxdata-normal", $head="head-normal", $style="boxstyle-short" ) {

//head-normal & boxdata-normal for wide page
//head-small & boxdata-small for small box

  echo  "\n<!-- start of ".$title." - box -->\n".
        "<div class=\"head ".$head."\" >::&nbsp;".$title."</div>\n".
        "<div class=\"boxdata ".$box."\">\n".
        "<div class=\"boxstyle ".$style."\">\n".
        $content.
        "</div>\n</div>\n".
        "<!-- end -->\n";

  return;
}

//
// Finish the page nicely
//
function create_bottom_setup() {

  //end the main & container
  echo "</div><!-- end main -->\n";
  //shows the logo
  echo "\n<div class=\"bottomtext\" style=\"text-align: center\">Powered by&nbsp;<a href=\"http://webcollab.sourceforge.net/\" onclick=\"window.open('http://webcollab.sourceforge.net/'); return false\">WebCollab</a>&nbsp;&copy;&nbsp;2002-2017</div>\n";
  //end xml parsing
  echo "</div><!-- end container -->\n".
       "</body>\n</html>\n";
  
  return;
}

?>
