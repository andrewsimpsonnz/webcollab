<?php
/*
  $Id$
  
  (c) 2002 - 2006 Andrew Simpson <andrew.simpson at paradise.net.nz> 

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

  This is a simple interface to a box, it is meant as a menubox.
  It will return all contacts and applicable options

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//initialise variables
$content = '';
$company = '';

if(UNICODE_VERSION == 'Y' ) {
  $m_substr     = 'mb_substr';
  $m_strtoupper = 'mb_strtoupper';
}
else {
  $m_substr     = 'substr';
  $m_strtoupper = 'strtoupper';
}

if( @safe_integer($_GET['taskid']) ) {

  $taskid = $_GET['taskid'];

  //get task details
  require_once(BASE.'includes/details.php' );

  //check usergroup rights
  require_once(BASE.'includes/usergroup_security.php' );
  usergroup_check($taskid );

  $tail = 'WHERE taskid='.$taskid.' OR taskid='.$TASKID_ROW['projectid'];
  $add  = '&amp;taskid='.$taskid;
}
else {
  $tail = 'WHERE taskid=0';
  $add  = '';
}

//get all contacts
$q = db_query('SELECT id, firstname, lastname, company FROM '.PRE.'contacts '.$tail.' ORDER BY company, lastname' );

//show all contacts
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

  if( $row['company'] != '' ) {
     if ($row['company'] != $company ){
       $content .= box_shorten($row['company'] )."<br />";
     }
     $show = box_shorten($row['lastname'] ).", ".$m_strtoupper($m_substr($row['firstname'], 0, 1 ) ).".";
     $content .= "<a href=\"contacts.php?x=".$x."&amp;action=show&amp;contactid=".$row['id']."\">".$show."</a><br />";
     $company =  $row['company'];
   }
   else {
     $show = box_shorten($row['lastname'] ).", ".$m_strtoupper($m_substr($row['firstname'], 0, 1 ) ).".";
     $content .= "<a href=\"contacts.php?x=".$x."&amp;action=show&amp;contactid=".$row['id']."\">".$show."</a><br />";
   }
}

db_free_result($q );

$content .= "<br />\n";

//the add button
if(! GUEST ){
  $content .= "<span class=\"textlink\">[<a href=\"contacts.php?x=".$x."&amp;action=add".$add."\">".$lang['add_contact']."</a>]</span>\n";
}

//show the box
new_box($lang['contacts'], $content, 'boxmenu' );

?>