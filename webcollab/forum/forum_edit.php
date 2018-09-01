<?php
/*
  $Id: forum_add.php 1704 2008-01-01 06:09:52Z andrewsimpson $

  (c) 2002 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Give the user an interface to edit a forum-reply

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
include_once(BASE.'includes/admin_config.php' );

//secure vars
$content = '';

if((GUEST) && (GUEST_LOCKED != 'N' ) ){
  warning($lang['access_denied'], 'Guests are not permitted to post in forums' );
}

if(isset($_GET['postid'] ) && @safe_integer($_GET['postid'] ) ) {
  $postid = $_GET['postid'];
}
else {
  error('Forum edit', 'Not a valid value for postid');
}

//generate_token
generate_token('forum_edit' );

//disable main form when deleting
if(isset($_GET['action'] ) && $_GET['action'] == 'delete' ) {
  $s = " disabled=\"disabled\"";
}
else {
  $s = '';
}


//find out the tasks' name
$q = db_prepare('SELECT '.PRE.'forum.forum_text AS forum_text,
                        '.PRE.'forum.userid as id,
                        '.PRE.'tasks.id AS taskid,
                        '.PRE.'tasks.task_name AS task_name
                        FROM '.PRE.'forum
                        LEFT JOIN '.PRE.'tasks ON ('.PRE.'tasks.id='.PRE.'forum.taskid)
                        WHERE '.PRE.'forum.id=? LIMIT 1' );

db_execute($q, array($postid ) );

if(! $row = db_fetch_array($q, 0 ) ) {
  error('Forum edit', 'The requested post does not exist.');
}

if((! ADMIN ) && ($row['id'] != UID ) ) {
  error('Forum edit', 'You are not authorised to edit that post.');
}

$content .= "<form method=\"post\" action=\"forum.php\" onsubmit=\"return fieldCheck('text')\">\n";
//set some hidden values
$content .= "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_edit\" />\n".
            "<input type=\"hidden\" name=\"postid\" value=\"".$postid."\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert\" value=\"".$lang['missing_field_javascript']."\" />".
            "<input type=\"hidden\" id=\"url\" name=\"url\" value=\"".$lang['url_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"image_url\" name=\"image_url\" value=\"".$lang['image_url_javascript']."\" /></fieldset>\n";


//build up the text-entry part
$content .= "<table class=\"celldata\">\n".
            "<tr><td>".$lang['message']."</td>".
            "<td><script type=\"text/javascript\"> edToolbar('text');</script>".
            "<textarea id=\"text\" name=\"text\" rows=\"25\" cols=\"88\"".$s.">".$row['forum_text']."</textarea>".
            "<script type=\"text/javascript\">document.getElementById('text').focus();</script></td></tr>\n".
            "</table>\n".
            "<table class=\"celldata\">\n".
            "<tr><td><label for=\"owner\">".$lang['forum_email_owner']."</label></td><td><input type=\"checkbox\" name=\"mail_owner\" id=\"owner\" ".DEFAULT_OWNER.$s." /></td></tr>\n".
            "<tr><td><label for=\"usergroup\">".$lang['forum_email_usergroup']."</label></td><td><input type=\"checkbox\" name=\"mail_group\" id=\"usergroup\" ".DEFAULT_GROUP.$s." /></td></tr>\n".
            "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['post']."\"".$s." /></p>".
            "</form>\n";

//delete button
$content .= "<form id=\"delete_post\" method=\"post\" action=\"forum.php\" ".
            "onclick=\"return confirm( '".$lang['confirm_del_javascript']."' )\" >\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_del\" />\n".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$row['taskid']."\" />\n".
            "<input type=\"hidden\" name=\"postid\" value=\"".$postid."\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
            "<p><input type=\"submit\" value=\"".$lang['delete']."\" /></p>".
            "</form>\n";

new_box(sprintf($lang['post_message_sprt'], $row['task_name'] ), $content );

?>
