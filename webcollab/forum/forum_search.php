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

//initialise variables            
$content = '';
$min = 0;

if(empty($_POST['string'] ) ) {
  warning($lang['forum_submit'], $lang['no_message'] );
}     
$string = safe_data($_POST['string'] );

if(! is_numeric($_POST['start']) ) {
  error('Forum search', 'Not a valid search integer' );
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
             
$q = db_query('SELECT '.PRE.'tasks.name AS taskname
                      FROM '.PRE.'forum
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                      WHERE forum.text LIKE \'%'.$string.'%\'
                      OR '.PRE.'forum.userid IN (SELECT id FROM '.PRE.'users WHERE fullname LIKE \''.$string.'%\')'
                      .$tail ); 

//$total = db_result($q, 0, 0 );
$total = db_numrows($q);

if($total == 0 ) {
//no results
//**
return;
}

$min = ($min > $total ) ? 0 : $min;
$max = ($total < $min + 10 ) ? $total : ($min + 10); 

$q = db_query('SELECT '.PRE.'forum.taskid AS taskid, 
                      '.PRE.'forum.posted AS posted,
                      '.PRE.'forum.text AS text,
                      '.PRE.'tasks.name AS taskname,
                      '.PRE.'users.id AS userid,
                      '.PRE.'users.fullname AS username
                      FROM '.PRE.'forum 
                      LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                      LEFT JOIN '.PRE.'users ON ('.PRE.'users.id='.PRE.'forum.userid)
                      WHERE '.PRE.'forum.text LIKE \'%'.$string.'%\'
                      OR '.PRE.'forum.userid IN (SELECT id FROM '.PRE.'users WHERE fullname LIKE \''.$string.'%\')'
                      .$tail.
                      'ORDER BY posted DESC LIMIT '.($max - $min).' OFFSET '.$min );

$number = db_numrows($q);

$content .= "<dl>\n";

//iterate for posts                            
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  
  //show it
  $content .= "<dt><a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['taskid']."\">".$row['taskname']."</a>". 
              "[<a href=\"users.php?x=".$x."&amp;action=show&amp;userid=".$row['userid']."\">".strtr($row['username'], array($string =>"<span class=\"red\">$string</span>" ) )."</a>]".
              "(".nicetime($row['posted']).")</dt>\n";
  
  $content .= "<dd>".nl2br(strtr($row['text'], array($string =>"<span class=\"red\">$string</span>" ) ) )."</dd>\n";
}

$content .= "</dl>\n";

db_free_result($q );

if($min > 0 || $max < $total ) {

  $content .= "<form method=\"post\" action=\"forum.php\">\n".
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
    $content .= "<input type=\"submit\" name=\"forward\" value=\"&gt;&gt;\" />\n";
  }
  
  $content .= "</form>\n";
}

new_box($lang['recent_posts'], $content ); 

?>
