<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Give the user an interface to add a forum-reply

*/

require_once("path.php" );
require_once( BASE."includes/security.php" );

//secure vars
$content = "";

if( ! isset($_REQUEST["usergroupid"]) || ! is_numeric($_REQUEST["usergroupid"]) )
  $usergroupid = 0;
else
  $usergroupid = $_REQUEST["usergroupid"];

if( ! isset($_REQUEST["parentid"]) || ! is_numeric($_REQUEST["parentid"]) )
  $parentid = 0;
else
  $parentid = $_REQUEST["parentid"];

if( ! isset($_REQUEST["taskid"]) || ! is_numeric($_REQUEST["taskid"]) )
  error("Forum add", "Not a valid value for taskid");

$taskid = $_REQUEST["taskid"];

//check usergroup security
require_once(BASE."includes/usergroup_security.php" );

//find out the tasks' name and error is no name was found (implies database error)
if( ($taskname = db_result(db_query("SELECT name FROM tasks WHERE id=$taskid" ), 0, 0) ) == "" )
  error("Forum add", "Taskname is not set." );

$content .= "<br />\n";
$content .= "<form name=\"inputform\" method=\"POST\" action=\"forum/forum_submit.php\">\n";
//set some hidden values
$content .= "<input type=\"hidden\" name=\"action\" value=\"add\">\n".
            "<input type=\"hidden\" name=\"taskid\" value=\"$taskid\">\n".
            "<input type=\"hidden\" name=\"x\" value=\"$x\">".
            "<input type=\"hidden\" name=\"usergroupid\" value=\"$usergroupid\">\n";


//find out some of the parent's data
if( is_numeric($parentid) && ($parentid != 0) ) {

  //get the text from the parent and the username of the person that posted that text
  $parent_array = db_fetch_array(db_query("SELECT forum.text AS text,
                                            users.fullname AS username
                                            FROM forum
                                            LEFT JOIN users ON (forum.userid=users.id)
                                            WHERE forum.id=$parentid" ), 0 );

  //show a box with the original post
  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"$parentid\">\n".
              "<table border=\"0\">\n".
              "<tr><td>".$lang["orig_message"]."</td><td bgcolor=\"#EEEEEE\">".nl2br( $parent_array["text"] )."</td></tr>\n";
}
else {
  $parent_array = "";

  //This is a new thread so we don't have a valid parent
  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"0\">\n".
              "<table border=\"0\">\n";
}

//build up the text-entry part
$content .=   "<tr><td>".$lang["message"]."</td><td><textarea name=\"text\" rows=\"10\" cols=\"60\"></textarea></td></tr>\n".
              "</table>\n".
              "<input type=\"submit\" value=\"".$lang["post"]."\"> ".
              "<input type=\"reset\" value=\"".$lang["reset"]."\">".
              "</form>\n".
              "<br /><br />\n";

//show a reply or a new-post box
if($parentid > 0 )
  new_box(sprintf($lang["post_reply_sprt"], $parent_array["username"], $taskname ), $content ); //reply to another users's post
else
  new_box(sprintf($lang["post_message_sprt"], $taskname ), $content ); //new reply

?>
