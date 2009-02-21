<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------

  Concept based on file originally written for Core Lan Org by Dennis Fleurbaaij 2001.

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

//
// Creates the initial window
//
//function create_top($title='', $page_type=0, $cursor=0, $check=0, $date=0, $calendar=0, $redirect_time=0 ) {

function create_top($title='', $page_type=0, $include_javascript=0, $check_field=0, $redirect_time=0 ) {



  global $lang, $top_done, $bottom_text;

  //only build top once...
  if(headers_sent() ) {
    return;
  }

  //remove /* and */ in section below to use compressed HTML output:
  //Note: PHP manual recommends use of zlib.output_compression in php.ini instead of ob_gzhandler in here
  /*
  //use compressed output (if web browser supports it) _and_ zlib.output_compression is not already enabled
  if( ! ini_get('zlib.output_compression') ) {
    ob_start("ob_gzhandler" );
  }
  */

  //we don't want any caching of these pages
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
  header('Cache-Control: no-store, no-cache, must-revalidate');
  header('Cache-Control: post-check=0, pre-check=0', false);
  header('Pragma: no-cache');
  header('Content-Type: text/html; charset='.CHARACTER_SET );

  //do a refresh if required
  if($redirect_time != 0) {
    header('Refresh: '.$redirect_time.'; url='.BASE_URL.'index.php' );
  }

  $content =        "<!DOCTYPE html PUBLIC\n".
                    "\"-//W3C//DTD XHTML 1.0 Strict//EN\"\n".
                    "\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n".
                    "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"".XML_LANG."\" lang=\"".XML_LANG."\">\n\n".
                    "<!-- WebCollab ".WEBCOLLAB_VERSION." -->\n".
                    "<!-- (c) 2001 Dennis Fleurbaaij created for core-lan.nl -->\n".
                    "<!-- (c) 2002-2009 Andrew Simpson for WebCollab -->\n\n".
                    "<head>\n";

  if( $title == '' ) {
    $title = MANAGER_NAME;
  }

  $content .=       "<title>".$title."</title>\n".
                    "<meta http-equiv=\"Pragma\" content=\"no-cache\" />\n".
                    "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".CHARACTER_SET."\" />\n";

  //do a refresh if required
  if($redirect_time != 0) {
    $content .=     "<meta http-equiv=\"Refresh\" content=\"".$redirect_time.";url=".BASE_URL."index.php\" />\n";
  }

  switch($page_type) {
    case 2: //print
      $content .=   "<link rel=\"StyleSheet\" href=\"".BASE_CSS.CSS_PRINT."\" type=\"text/css\" />\n";
      break;

    case 3: //calendar
      $content .=   "<link rel=\"StyleSheet\" href=\"".BASE_CSS.CSS_MAIN."\" type=\"text/css\" />\n".
                    "<link rel=\"StyleSheet\" href=\"".BASE_CSS.CSS_CALENDAR."\" type=\"text/css\" />\n";
      break;

    case 0: //main window + menu sidebar
    case 1: //single main window (no menu sidebar)
    default:
      $content .=   "<link rel=\"StyleSheet\" href=\"".BASE_CSS.CSS_MAIN."\" type=\"text/css\" />\n";
      //allow RSS autodiscovery if enabled
      if(defined('RSS_AUTODISCOVERY' ) && RSS_AUTODISCOVERY == 'Y' ) {
        $content .=   "<link rel=\"alternate\" href=\"".BASE_URL."rss/rss_projects.php\" type=\"application/rss+xml\" title=\"Projects\" />\n".
                      "<link rel=\"alternate\" href=\"".BASE_URL."rss/rss_tasks.php\" type=\"application/rss+xml\" title=\"Tasks\" />\n".
                      "<link rel=\"alternate\" href=\"".BASE_URL."rss/rss_files.php\" type=\"application/rss+xml\" title=\"Files\" />\n".
                      "<link rel=\"alternate\" href=\"".BASE_URL."rss/rss_forum.php\" type=\"application/rss+xml\" title=\"Forum\" />\n";
      }
      break;
  }

  $content .= "<link rel=\"icon\" type=\"image/png\" href=\"".BASE."images/group.png\" />\n";

  if($include_javascript ) {

    $content .= "<script type=\"text/javascript\">\n".
                "var text = { AlertField : \"".$lang['missing_field_javascript']."\",\n".
                "             InvalidDate : \"".$lang['invalid_date_javascript']."\",\n".
                "             FinishDate : \"".$lang['finish_date_javascript']."\"}\n".
                "</script>\n";

    $content .= "<script type=\"text/javascript\" src=\"".BASE_URL."js/webcollab.js\"></script>\n";
  }

  if($include_javascript && $check_field ) {
    $content .= "</head>\n\n".
                "<body onload=\"placeCursor('".$check_field."')\">\n";
  }
  else {
    $content .= "</head>\n\n".
                "<body>\n";
  }

  //create the main table
  $content .=       "<!-- start main table -->\n".
                    "<table width=\"100%\" cellspacing=\"0\" class=\"main\">\n";

  switch ($page_type ) {

    case 0: //main window + menu sidebar
      //create the masthead part of the main window
      $content .=   "<tr valign=\"top\"><td colspan=\"2\" class=\"masthead\">";
      //show username if applicable
      if(defined('UID_NAME') ) {
        $content .=  '&nbsp;'.sprintf( $lang['user_homepage_sprt'], UID_NAME );
      }
      $content .=   "</td></tr>\n";
      //create menu sidebar
      $content .=   "<tr valign=\"top\"><td style=\"width: 175px;\" align=\"center\">\n";
      $bottom_text = 1;
      break;

    case 1: //single main window (no menu sidebar)
    case 3: //calendar
      $content .=   "<tr valign=\"top\"><td class=\"masthead\">";
      if(defined('UID_NAME' ) ) {
        $content .= '&nbsp;'.sprintf( $lang['user_homepage_sprt'], UID_NAME );
      }
      $content .=   "</td></tr>\n";
      //create single window over entire screen
      $content .=   "<tr valign=\"top\"><td style=\"width: 100%\" align=\"center\">\n";
      $bottom_text = 2;
      break;

    case 2: //printable screen
      //create single window over paper width
      $content .=   "<tr valign=\"top\"><td style=\"width: 576pt\" align=\"center\">\n";
      //don't want bottom text
      $bottom_text = 0;
  }

  //flush buffer
  echo $content;

  return;
}

//
//  Creates a new box
//
function new_box($title, $content, $style="boxdata", $size="tablebox" ) {

  echo  "\n<!-- start of ".$title." - box -->\n".
        "<br />\n".
        "<table class=\"".$size."\" cellspacing=\"0\">\n".
        "<tr><td class=\"boxhead\">::&nbsp;".$title."</td></tr>\n".
        "<tr><td class=\"".$style."\">\n".
        $content."</td></tr>\n".
        "</table>\n".
        "<!-- end -->\n";

  return;
}

//
// End the left frame and go the the right one
//
function goto_main() {

  echo "\n</td><td align=\"center\">\n";
  return;
}

//
// Finish the page nicely
//
function create_bottom() {

  global $bottom_text;

  //clean
  $content =  "\n<br />\n";

  //end the main table row
  $content .= "</td></tr>\n</table>";

  switch($bottom_text) {
    case 0: //no bottom text
      $align = '';
      break;

    case 1:
      $align = "style=\"text-align: left\"";
      break;

    case 2:
    default:
      $align = "style=\"text-align: center\"";
      break;
 }

 //shows the logo
 if($bottom_text) {
   $content .= "<div class=\"bottomtext\" ".$align.">Powered by&nbsp;<a href=\"http://webcollab.sourceforge.net/\" onclick=\"window.open('http://webcollab.sourceforge.net/'); return false\">WebCollab</a>&nbsp;&copy;&nbsp;2002-2009</div>\n";
 }
  //end xml parsing
  $content .= "</body>\n</html>\n";
  echo $content;
  return;
}

?>