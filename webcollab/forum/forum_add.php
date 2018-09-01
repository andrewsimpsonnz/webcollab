<?php
/*
  $Id: forum_add.php 2216 2009-05-08 20:40:11Z andrewsimpson $

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

  Give the user an interface to add a forum-reply

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/token.php' );
require_once(BASE.'includes/usergroup_security.php' );
include_once(BASE.'includes/admin_config.php' );

//secure vars
$content = '';

if((GUEST == true ) && (GUEST_LOCKED != 'N' ) ) {
    warning($lang['access_denied'], 'Guests are not permitted to post in forums' );
}

if(isset($_GET['usergroupid']) && safe_integer($_GET['usergroupid']) ){
  $usergroupid = $_GET['usergroupid'];
}
else {
  $usergroupid = 0;
}

if(isset($_GET['parentid']) && safe_integer($_GET['parentid']) ){
  $parentid = $_GET['parentid'];
}
else {
  $parentid = 0;
}

if(isset($_GET['taskid']) && safe_integer($_GET['taskid']) ){
  $taskid = $_GET['taskid'];
}
else {
  error('Forum add', 'Not a valid value for taskid');
}

//generate_token
generate_token('forum_add' );

//check usergroup security
$taskid = usergroup_check($taskid );

//find out the tasks' name
$q = db_prepare('SELECT task_name FROM '.PRE.'tasks WHERE id=? LIMIT 1' );
db_execute($q, array($taskid ) );
$taskname = db_result($q, 0, 0 );

$content .= "<form method=\"post\" action=\"forum.php\" onsubmit=\"return fieldCheck('text')\">\n";
//set some hidden values
$content .=  "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />".
             "<input type=\"hidden\" name=\"action\" value=\"submit_add\" />\n".
             "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" />\n".
             "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
             "<input type=\"hidden\" name=\"usergroupid\" value=\"".$usergroupid."\" />\n".
             "<input type=\"hidden\" id=\"alert_field\" name=\"alert\" value=\"".$lang['missing_field_javascript']."\" />\n".
             "<input type=\"hidden\" id=\"url\" name=\"url\" value=\"".$lang['url_javascript']."\" />\n".
             "<input type=\"hidden\" id=\"image_url\" name=\"image_url\" value=\"".$lang['image_url_javascript']."\" />\n";

//find out some of the parent's data
if($parentid != 0 ) {

  //get the text from the parent and the username of the person that posted that text
  $q = db_prepare('SELECT '.PRE.'forum.forum_text AS forum_text,
                          '.PRE.'users.fullname AS username
                          FROM '.PRE.'forum
                          LEFT JOIN '.PRE.'users ON ('.PRE.'forum.userid='.PRE.'users.id)
                          WHERE '.PRE.'forum.id=?' );

  db_execute($q, array($parentid ) );

  if( ! $row = db_fetch_array($q, 0 ) ){
    error("Forum add", "Forum post has invalid parent" );
  }
  if($row['username'] == NULL ){
    $row['username'] = '----';
  }

  //show a box with the original post
  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"".$parentid."\" /></fieldset>\n".
              "<table class=\"celldata\">\n".
              "<tr><td>".$lang['orig_message']."</td><td><div class=\"textbackground\">".nl2br($row['forum_text'])."</div></td></tr>\n";
}
else {
  $row = '';

  //This is a new thread so we don't have a valid parent
  $content .= "<input type=\"hidden\" name=\"parentid\" value=\"0\" /></fieldset>\n".
              "<table class=\"celldata\">\n";
}

//build up the text-entry part
$content .=   "<tr><td>".$lang['message']."</td>\n".
              "<td><script type=\"text/javascript\"> edToolbar('text'); </script>\n".
              "<textarea id=\"text\" name=\"text\" rows=\"25\" cols=\"88\"></textarea>".
              "<script type=\"text/javascript\">document.getElementById('text').focus();</script></td></tr>\n".
              "</table>\n".
              "<table class=\"celldata\">\n".
              "<tr><td><label for=\"owner\">".$lang['forum_email_owner']."</label></td><td><input type=\"checkbox\" name=\"mail_owner\" id=\"owner\" ".DEFAULT_OWNER." /></td></tr>\n".
              "<tr><td><label for=\"usergroup\">".$lang['forum_email_usergroup']."</label></td><td><input type=\"checkbox\" name=\"mail_group\" id=\"usergroup\" ".DEFAULT_GROUP." /></td></tr>\n".
              "</table>\n".
              "<p><input type=\"submit\" value=\"".$lang['post']."\" /></p>".
              "</form>\n";

//show a reply or a new-post box
if($parentid > 0 ){
  new_box(sprintf($lang['post_reply_sprt'], $row['username'], $taskname ), $content ); //reply to another users's post
}
else {
  new_box(sprintf($lang['post_message_sprt'], $taskname ), $content ); //new post
}

?>
