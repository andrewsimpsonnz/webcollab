<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>
  
  WebCollab
  ---------------------------------------
  Based on original file written for Core APM by Dennis Fleurbaaij 2001/2002

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
require_once(BASE."includes/security.php" );

include_once(BASE."includes/admin_config.php" );

//secure vars
$content = "";

if( ! isset($_REQUEST["usergroupid"]) || ! is_numeric($_REQUEST["usergroupid"]) )
  $usergroupid = 0;
else
  $usergroupid = intval($_REQUEST["usergroupid"]);

if( ! isset($_REQUEST["parentid"]) || ! is_numeric($_REQUEST["parentid"]) )
  $parentid = 0;
else
  $parentid = intval($_REQUEST["parentid"]);

if( ! isset($_REQUEST["taskid"]) || ! is_numeric($_REQUEST["taskid"]) )
  error("Forum add", "Not a valid value for taskid");

$taskid = intval($_REQUEST["taskid"]);

//check usergroup security
require_once(BASE."includes/usergroup_security.php" );

//find out the tasks' name
$taskname = db_result(db_query("SELECT name FROM ".PRE."tasks WHERE id=$taskid" ), 0, 0 );

$content .= "<form method=\"post\" action=\"forum.php\">\n";
//set some hidden values
$content .=  "<fieldset><input type=\"hidden\" name=\"x\" value=\"$x\" />".
             "<input type=\"hidden\" name=\"action\" value=\"submit_add\" />\n".
             "<input type=\"hidden\" name=\"taskid\" value=\"$taskid\" />\n".
             "<input type=\"hidden\" name=\"usergroupid\" value=\"$usergroupid\" />\n";


//find out some of the parent's data
if($parentid != 0 ) {

  //get the text from the parent and the username of the person that posted that text
  $q = db_query("SELECT ".PRE."forum.text AS text,
                         ".PRE."users.fullname AS username
                         FROM ".PRE."forum
                         LEFT JOIN ".PRE."users ON (".PRE."forum.userid=".PRE."users.id)
                         WHERE ".PRE."forum.id=$parentid" );

  if( ! $row = db_fetch_array($q, 0 ) )
    error("Forum add", "Forum post has invalid parent" );

  if($row["username"] == NULL )
    $row["username"] = "----";

  //show a box with the original post
  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"$parentid\" /></fieldset>\n".
              "<table>\n".
              "<tr><td>".$lang["orig_message"]."</td><td style=\"background:#EEEEEE\">".$row["text"]."</td></tr>\n";
}
else {
  $row = "";

  //This is a new thread so we don't have a valid parent
  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"0\" /></fieldset>\n".
              "<table>\n";
}

//build up the text-entry part
$content .=   "<tr><td>".$lang["message"]."</td><td><textarea id=\"text\" name=\"text\" rows=\"10\" cols=\"60\"></textarea></td></tr>\n".
              "</table>\n".
              "<table class=\"celldata\">\n".
              "<tr><td><label for=\"owner\">".$lang["forum_email_owner"]."</label></td><td><input type=\"checkbox\" name=\"mail_owner\" id=\"owner\" $DEFAULT_OWNER /></td></tr>\n".
              "<tr><td><label for=\"usergroup\">".$lang["forum_email_usergroup"]."</label></td><td><input type=\"checkbox\" name=\"mail_group\" id=\"usergroup\" $DEFAULT_GROUP /></td></tr>\n".
              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang["post"]."\" onclick=\"return fieldCheck()\" />&nbsp;".
              "<input type=\"reset\" value=\"".$lang["reset"]."\" /></p>".
              "</form>\n";

//show a reply or a new-post box
if($parentid > 0 )
  new_box(sprintf($lang["post_reply_sprt"], $row["username"], $taskname ), $content ); //reply to another users's post
else
  new_box(sprintf($lang["post_message_sprt"], $taskname ), $content ); //new post

?>