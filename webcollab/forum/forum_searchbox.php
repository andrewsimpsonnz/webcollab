<?php
/*
  $Id$

  (c) 2006 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Forum search box

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}


$content = "<br />".
           "<form id=\"ForumSearch\" method=\"post\" action=\"forum.php\" >\n".
           "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
           "<input type=\"hidden\" name=\"action\" value=\"search\" />\n".
           "<input type=\"hidden\" name=\"start\" value=\"0\" /></fieldset>\n".
           "<input type=\"text\" id=\"string\" name=\"string\" size=\"30\" />\n".
           "<a href=\"javascript:void(document.getElementById('ForumSearch').submit())\"><small>".$lang['go']."</small></a>\n".
           "</form>";

 new_box($lang['forum_search'], $content );

?>
