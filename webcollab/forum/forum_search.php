<?php
/*
  $Id$
  
  (c) 2004 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Lists all the recent forum posts

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'includes/time.php' );

function search_no_result() {
  
  global $x, $lang;
  
  $content = "No results found<br /><br />\n".
             "<form method=\"post\" action=\"forum.php\" >\n".
             "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n ".
             "<input type=\"hidden\" name=\"action\" value=\"search\" />\n".
             "<input type=\"hidden\" name=\"start\" value=\"0\" /></fieldset>\n".
             "<input id=\"name\" type=\"text\" name=\"string\" size=\"30\" />\n".
             "<input type=\"submit\" value=\"".$lang['go']."\" />\n".
             "</form>";
   
  new_box($lang['info'], $content ); 
  return;
}                  

//initialise variables            
$content = '';
$min = 0;

if(empty($_POST['string'] ) || strlen(trim($_POST['string'] ) ) == 0 ) {
  search_no_result();
  die;
}     
$string = safe_data($_POST['string'] );

//escaped string for database
$esc_string = strtr($string, array('%'=>'\%', '_'=>'\_' ) );

if(! is_numeric($_POST['start']) ) {
  error('Forum search', 'Not a valid integer' );
}
$start = $_POST['start'];

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
  $tail = ' AND ('.PRE.'tasks.globalaccess=\'f\' AND '.PRE.'tasks.usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
           OR '.PRE.'tasks.globalaccess=\'t\'   
           OR '.PRE.'tasks.usergroupid=0) ';                      
}
     
//postgres' uses ILIKE for case insensitive seaching
$like = (substr(DATABASE_TYPE, 0, 5) == 'mysql' ) ? 'LIKE' : 'ILIKE';        

$q = db_query('SELECT COUNT(*)
                      FROM '.PRE.'forum
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                      WHERE forum.text '.$like.' \'%'.$esc_string.'%\'
                      OR '.PRE.'forum.userid IN (SELECT id FROM '.PRE.'users WHERE fullname '.$like.' \'%'.$esc_string.'%\')'
                      .$tail ); 

$total = db_result($q, 0, 0 );

if($total == 0 ) {
//no results
  search_no_result();
  die;
}

$min = ($min > $total ) ? 0 : $min;
$max = ($total > $min + 10 ) ? ($min + 10) : $total; 

$q = db_query('SELECT '.PRE.'forum.taskid AS taskid, 
                      '.PRE.'forum.posted AS posted,
                      '.PRE.'forum.text AS text,
                      '.PRE.'tasks.name AS taskname,
                      '.PRE.'users.id AS userid,
                      '.PRE.'users.fullname AS username
                      FROM '.PRE.'forum 
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                      WHERE '.PRE.'forum.text '.$like.' \'%'.$esc_string.'%\'
                      OR '.PRE.'forum.userid IN (SELECT id FROM '.PRE.'users WHERE fullname '.$like.' \'%'.$esc_string.'%\')'
                      .$tail.
                      'ORDER BY posted DESC LIMIT '.($max - $min).' OFFSET '.$min );

$content .= "Found ".$total." results for \"".$string."\"<br />\n".
            "Showing results ".($min + 1)." to ".$max."<br /><br />\n";

$content .= "<ul>\n";

$replacement   = "<span class=\"red\">".$string."</span>";

//iterate for posts                            
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  
  //show it
  $content .= "<li><a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['taskid']."\">".$row['taskname']."</a>&nbsp;". 
              "[<a href=\"users.php?x=".$x."&amp;action=show&amp;userid=".$row['userid']."\">".str_replace($string, $replacement, $row['username'] )."</a>]&nbsp;".
              "(".nicetime($row['posted']).")<br />\n";
  
  $content .= nl2br(str_replace($string, $replacement, $row['text'] ) )."</li>\n";
}

$content .= "</ul>\n";

db_free_result($q );

if($min > 0 || $max < $total ) {

  $content .= "<p><form method=\"post\" action=\"forum.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
              "<input type=\"hidden\" name=\"action\" value=\"search\" />\n".
              "<input type=\"hidden\" name=\"string\" value=\"".$string."\" />\n".
              "<input type=\"hidden\" name=\"start\" value=\"".$min."\" /></fieldset>\n";

  if($min > 0 ) {
    //show left arrow
    $content .= "<input type=\"submit\" name=\"backward\" value=\"&lt;&lt;\" />\n";
  }
  
  if($max < $total ) {
    //show right arrow
    $content .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"forward\" value=\"&gt;&gt;\" />\n";
  }
  
  $content .= "</form></p>\n";
}

new_box($lang['info'], $content ); 

?>
