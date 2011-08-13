<?php
/*
  $Id: forum_search.php 2162 2009-04-06 07:12:58Z andrewsimpson $

  (c) 2005 - 2011 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Provides a search engine for forum posts

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'includes/time.php' );

function search_input() {

  global $lang;

  $content = "<form method=\"post\" action=\"forum.php\" >\n".
             "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n ".
             "<input type=\"hidden\" name=\"action\" value=\"search\" />\n".
             "<input type=\"hidden\" name=\"start\" value=\"0\" /></fieldset>\n".
             "<div><input id=\"name\" type=\"text\" name=\"string\" size=\"30\" />\n".
             "<input type=\"submit\" value=\"".$lang['go']."\" /></div>\n".
             "</form>";

  return $content;
}

//initialise variables
$content = '';
$min = 0;

if(empty($_REQUEST['string'] ) || strlen(trim($_REQUEST['string'] ) ) == 0 ) {
  //no results possible
  $content .= "<p>".sprintf($lang['no_results'], '' )."</p>\n";
  $content .= search_input(); 
  new_box($lang['info'], $content );
  create_bottom();
  die;
}

//get safe string
$string = safe_data($_REQUEST['string'] );

if(! safe_integer($_REQUEST['start']) ) {
  error('Forum search', 'Not a valid integer' );
}
$start = $_REQUEST['start'];
$min = $start;

if(isset($_POST['backward'] ) && strlen($_POST['backward']) > 0 ) {
  $min = max(0, ($start - 10) );
}

if(isset($_POST['forward'] ) && strlen($_POST['forward']) > 0 ) {
  $min = $start + 10;
}

//set the usergroup permissions on queries (Admin can see all)
if(ADMIN ) {
  $tail = ' ';
}
else {
  $tail = ' AND ('.PRE.'tasks.globalaccess=\'f\' AND '.PRE.'tasks.usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.db_quote(UID ).')
           OR '.PRE.'tasks.globalaccess=\'t\'
           OR '.PRE.'tasks.usergroupid=0) ';
}

//postgres' uses ILIKE for case insensitive seaching
$like = (substr(DATABASE_TYPE, 0, 5) == 'mysql' ) ? 'LIKE' : 'ILIKE';

$q = db_prepare('SELECT COUNT(*)
                      FROM '.PRE.'forum
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                      WHERE ('.PRE.'forum.text '.$like.' ?
                      OR '.PRE.'forum.userid IN (SELECT id FROM '.PRE.'users WHERE fullname '.$like.' ?) )'
                      .$tail );

db_execute($q, array('%'.$string.'%', '%'.$string.'%' ) );
$total = db_result($q, 0, 0 );

if($total == 0 ) {
  //no results
  $content .= sprintf($lang['no_results'], $string )."<br /><br />\n";
  $content .= search_input();

  new_box($lang['info'], $content ); 
  die;
}

$min = ($min > $total ) ? 0 : $min;
$max = ($total > $min + 10 ) ? ($min + 10) : $total;

$q = db_prepare('SELECT '.PRE.'forum.taskid AS taskid,
                      '.PRE.'forum.posted AS posted,
                      '.PRE.'forum.text AS text,
                      '.PRE.'tasks.name AS taskname,
                      '.PRE.'users.id AS userid,
                      '.PRE.'users.fullname AS username
                      FROM '.PRE.'forum 
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                      WHERE ('.PRE.'forum.text '.$like.' ?
                      OR '.PRE.'forum.userid IN (SELECT id FROM '.PRE.'users WHERE fullname '.$like.' ?) )'
                      .$tail.
                      'ORDER BY posted DESC LIMIT '.($max - $min).' OFFSET '.$min );

db_execute($q, array('%'.$string.'%', '%'.$string.'%' ) );

$content .= sprintf($lang['search_results'], $total, $string, ($min + 1), $max )."<br /><br />\n";

$content .= "<ul>\n";

//search terms for regex
$replacement = '<span class="red"><b>$0</b></span>';
$search      = '/'.preg_quote($string, '/' ).'/isu';

//iterate for posts
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //show it
  $content .= "<li><a href=\"tasks.php?x=".X."&amp;action=show&amp;taskid=".$row['taskid']."\">".$row['taskname']."</a>&nbsp;". 
              "[<a href=\"users.php?x=".X."&amp;action=show&amp;userid=".$row['userid']."\">"
              .preg_replace($search, $replacement, $row['username'] )."</a>]&nbsp;".
              "(".nicetime($row['posted']).")<br />\n";

  //highlight search text
  $text = preg_replace($search, $replacement,  $row['text']);

  $content .= nl2br(bbcode($text ) )."</li>\n";
}

$content .= "</ul>\n";

db_free_result($q );

if($min > 0 || $max < $total ) {

  $content .= "<form method=\"post\" action=\"forum.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
              "<input type=\"hidden\" name=\"action\" value=\"search\" />\n".
              "<input type=\"hidden\" name=\"string\" value=\"".$string."\" />\n".
              "<input type=\"hidden\" name=\"start\" value=\"".$min."\" /></fieldset>\n".
              "<table class=\"decoration\" cellpadding=\"5px\" >\n";

  if($min > 0 ) {
    //show left arrow
    $content .= "<tr><td><input style=\"float:left\" type=\"image\" name=\"backward\" value=\"&lt;&lt;\" src=\"images/resultset_previous.png\"/></td>\n";
  }

  $content .= "<td>\n";

  //show page numbers along bottom
  for($i = 0; $i < $total; $i = ($i + 10 ) ) {

    if($i == $min) {
      //highlight current page
      $content .= "&nbsp;&nbsp;<b>".intval($i/10 + 1)."</b>&nbsp;&nbsp;\n";
    }
    else {
      //hyperlink for other pages 
      $content .= "&nbsp;&nbsp;<span class=\"underline\"><a href=\"forum.php?x=".X."&amp;action=search&amp;start=".$i."&amp;string=".html_clean_up(urlencode($string ) )."\">".intval($i/10 + 1)."</a></span>&nbsp;&nbsp;\n";
    }
  }
  $content .= "</td>\n";

  if($max < $total ) {
    //show right arrow
    $content .= "<td ><input style=\"float:right\" type=\"image\" name=\"forward\" value=\"&gt;&gt;\" src=\"images/resultset_next.png\" /></td>\n";
  }

  $content .= "</tr></table></form>\n";
}

new_box($lang['forum_search'], $content, 'boxdata-normal', 'head-normal', 'boxstyle-short' );

?>
