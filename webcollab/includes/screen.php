<?php
/*
  $Id$
  
  (c) 2002 - 2004 Andrew Simpson <andrew.simpson@paradise.net.nz>

  WebCollab
  ---------------------------------------
  Parts of this file originally written for Core APM by Dennis Fleurbaaij 2001/2002.
 
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

  The screen is split in 3 components. The overall table is called main_table

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
  the calling goto_main() all boxes are main window boxes.


  the internal functions are:
  ---------------------------

  create_top();
  create_bottom();
*/

require_once("path.php" );

include_once(BASE."config/config.php" );
include_once(BASE."lang/lang.php" );

//
// Creates the inital window
//
function create_top($title="", $page_type=0, $cursor="", $check="", $date="" ) {

  global $uid_name, $admin, $MANAGER_NAME, $WEBCOLLAB_VERSION, $lang, $web_charset;

  //only build top once...
  if(headers_sent() )
    return;

  //remove /* and */ in section below to use compressed HTML output:
  //Note: PHP manual recommends use of zlib.output_compression in php.ini instead of ob_gzhandler in here
  /*
  //use compressed output (if web browser supports it) _and_ zlib.output_compression is not already enabled
  if( ! ini_get('zlib.output_compression') )
    ob_start("ob_gzhandler" );
  */

  //we don't want any caching of these pages
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  $content =  "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n".
                    "<html>\n\n".
                    "<!-- WebCollab ".$WEBCOLLAB_VERSION." -->\n".
                    "<!-- (c) 2001 Dennis Fleurbaaij created for core-lan.nl -->\n".
                    "<!-- (c) 2002 - 2004 Andrew Simpson -->\n\n".
                    "<head>\n";

  //flush buffer
  echo $content;                  
                    
  if( $title == "" )
    $title = $MANAGER_NAME;

  $content  =  "<title>".$title."</title>\n".
                      "<meta http-equiv=\"Pragma\" content=\"no-cache\">\n".
                      "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$web_charset."\">\n";

  if($page_type == 2 )
    $content .=  "<link rel=\"StyleSheet\" href=\"".BASE."css/print.css\" type=\"text/css\">\n";
  else
    $content .=  "<link rel=\"StyleSheet\" href=\"".BASE."css/default.css\" type=\"text/css\">\n";

  //javascript to position cursor in the first box
  if($cursor || $date) {
    $content .=  "<script language=\"JavaScript\" type=\"text/javascript\">\n".
                        "<!-- \n";
    if($cursor)
      $content .=   "function placeCursor() {document.inputform.".$cursor.".focus();}\n";
    if($check){
      $content .=  "function fieldCheck(){\n".
                          "if(document.inputform.".$cursor.".value==\"\"){\n".
                          "alert('".$lang["missing_field_javascript"]."');\n".
                          "document.inputform.".$cursor.".focus();\n".
                          "return false;}\n".
                          "return;}\n";
     }
    if($date) {
      $content .=  "function dateCheck() {\n".
                          "var daysMonth = new Array(31, 29, 31, 30, 30, 30, 31, 31, 30, 31, 30, 31 );\n". 
                          "if(document.inputform.day.value > daysMonth[(document.inputform.month.value-1)] ){\n".
                          "alert('".$lang["invalid_date_javascript"]."');\n".
                          "return false;}\n". 
                          "var inputDate = Date.UTC(document.inputform.year.value, (document.inputform.month.value-1), document.inputform.day.value )/1000;\n".
                          "var finishDate = document.inputform.projectDate.value;\n".
                          "if(finishDate - inputDate < -7200 ){\n".
                          "return confirm('".$lang["finish_date_javascript"]."');}\n".     
                          "return;}\n";
      }
      $content .=  " // -->\n".
                         "</script>\n".
                         "</head>\n\n";
      if($cursor)
        $content .=  "<body onLoad=placeCursor()>\n";
  }
  else {
    $content .= "</head>\n\n".
                      "<body>\n";
  }

  //flush buffer
  echo $content;
  
  //create the main table
  $content  =  "<!-- start main table -->\n".
                     "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\" align=\"center\">\n";


  switch ($page_type ) {

    case 0: //main window + menu sidebar
      //create the masthead part of the main window
      $content .=  "<tr><td colspan=\"2\">".
                         "<div class=\"masthead\">";
      //show username if applicable
      if($uid_name != "" )
        $content .=  sprintf( $lang["user_homepage_sprt"], $uid_name );
      $content .=  "</div></td></tr>\n";
      //create menu sidebar
      $content .=  "<tr valign=\"top\"><td style=\"width: 175px\" align=\"center\">\n";
      break;

    case 1: //single main window (no menu sidebar)
      $content .=  "<tr><td>";
      $content .=  "<div class=\"masthead\">";
      if($uid_name != "" )
        $content .=  sprintf( $lang["user_homepage_sprt"], $uid_name );
      $content .= "</div></td></tr>\n";
      //create single window over entire screen
      $content .= "<tr valign=\"top\"><td style=\"width: 100%\" align=\"center\">\n";
      break;

    case 2: //printable screen
      //create single window over paper width
      $content .= "<tr valign=\"top\"><td style=\"width: 576pt\" align=\"center\">\n";
  }

  //flush buffer
 echo $content; 
  
  return;
}

//
//  Creates a new box
//
function new_box($title, $box_content, $style="boxdata", $size="tablebox" ) {

  $content =  "\n<!-- start of ".$title." - box -->\n".
                    "<br />\n".
                    "<table class=\"".$size."\" cellspacing=\"0\">\n".
                    "<tr><td class=\"boxhead\">".$title."</td></tr>\n".
                    "<tr><td class=\"".$style."\">\n".
                    $box_content."</td></tr>\n".
                    "</table>\n".
                    "<!-- end -->\n";

  echo $content;
                    
  return;
}

//
// End the left frame and go the the right one
//
function goto_main() {
  echo '</td><td align="center">';
  return;
}

//
// Finish the page nicely
//
function create_bottom() {

  //clean
  echo "<br />\n";

  //end the main table
  echo "</td></tr>\n</table>\n";

  //shows the logo
  echo "<div class=\"bottomtext\">Powered by&nbsp;<a href=\"http://webcollab.sourceforge.net/\" target=\"newwindow\">WebCollab</a>&nbsp;(c) 2002-2004</div>\n<br>\n";
  //end xml parsing
  echo "</body>\n</html>\n";
  return;
}

?>
