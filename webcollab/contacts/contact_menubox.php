<?php
/*
  $Id: contact_menubox.php 2194 2009-04-09 19:44:46Z andrewsimpson $

  (c) 2002 - 2011 Andrew Simpson <andrewnz.simpson at gmail.com> 

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

if( @safe_integer($_GET['taskid']) ) {

  $taskid = $_GET['taskid'];

  //get task details
  require_once(BASE.'includes/details.php' );

  //check usergroup rights
  require_once(BASE.'includes/usergroup_security.php' );
  usergroup_check($taskid );

  //get task contacts
  $q = db_prepare('SELECT id, firstname, lastname, company FROM '.PRE.'contacts
                          WHERE taskid=? OR taskid=? ORDER BY company, lastname' );
  db_execute($q, array($taskid, $TASKID_ROW['projectid'] ) );
  $add  = '&amp;taskid='.$taskid;
}
else {
  //get all contacts
  $q = db_query('SELECT id, firstname, lastname, company FROM '.PRE.'contacts 
                          WHERE taskid=0 ORDER BY company, lastname');
  $add  = '';
}

$content .= "<ul class=\"menu\">\n";

//show all contacts
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

  if( $row['company'] != '' ) {
     if ($row['company'] != $company ){
       $content .= "<li>".box_shorten($row['company'] )."</li>";
     }
     $show = box_shorten($row['lastname'] ).", ".mb_strtoupper(mb_substr($row['firstname'], 0, 1 ) ).".";
     $content .= "<li><a href=\"contacts.php?x=".X."&amp;action=show&amp;contactid=".$row['id']."\">".$show."</a></li>";
     $company =  $row['company'];
   }
   else {
     $show = box_shorten($row['lastname'] ).", ".mb_strtoupper(mb_substr($row['firstname'], 0, 1 ) ).".";
     $content .= "<li><a href=\"contacts.php?x=".X."&amp;action=show&amp;contactid=".$row['id']."\">".$show."</a></li>";
   }
}

db_free_result($q );

$content .= "</ul>\n";

if($i == 0 ) {
  $content = '';
}

//the add button
if(! GUEST ){
  $content .= "<div style=\"margin-top: 20px\"><span class=\"textlink\">[<a href=\"contacts.php?x=".X."&amp;action=add".$add."\">".$lang['add_contact']."</a>]</span></div>\n";
}

//show the box
new_box($lang['contacts'], $content, 'boxdata-menu', 'head-menu', 'boxstyle-menu' );

?>