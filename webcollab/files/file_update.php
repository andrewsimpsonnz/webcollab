<?php
/*
  $Id: file_upload.php 1747 2008-02-03 08:14:34Z andrewsimpson $

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

  Gives users the ability to add files.

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//includes
require_once(BASE.'includes/admin_config.php' );
require_once(BASE.'includes/token.php' );
require_once(BASE.'includes/usergroup_security.php' );

//deny guest users
if(GUEST ){
 warning($lang['access_denied'], $lang['not_owner'] );
}

//check if file uploads are allowed in php.ini file
if( ! (bool)ini_get('file_uploads' ) ) {
  warning($lang['error'], $lang['no_file_uploads'] );
}

if((! isset($_GET['taskid'] ) ) || (! @safe_integer($_GET['taskid'] ) ) ) {
  error('File upload', 'Not a valid taskid');
}
$taskid = $_GET['taskid'];

if((! isset($_GET['fileid'] ) ) || (! @safe_integer($_GET['fileid'] ) ) ) {
  error('File upload', 'Not a valid fileid');
}
$fileid = $_GET['fileid'];

if(isset($_GET['admin']) && $_GET['admin'] == 1 ) {
  $return = 1;
}
else {
  $return = 0;
}

//disable main form when deleting
if(isset($_GET['action']) && $_GET['action'] == 'delete' ) {
  $s = " disabled=\"disabled\"";
}
else {
  $s = '';
}

//check usergroup security
$taskid = usergroup_check($taskid );

//generate_token
generate_token('file_submit' );

$q = db_prepare('SELECT filename, file_description FROM '.PRE.'files WHERE id=? LIMIT 1' );
db_execute($q, array($fileid ) );

if( ! $row = db_fetch_array($q, 0 ) ) {
  error('Edit file', 'File info missing' );
}

//update file
$content =  "<form method=\"post\" enctype=\"multipart/form-data\" action=\"files.php\" onsubmit=\"return fieldCheck('userfile')\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_update\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" />\n".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" />\n".
            "<input type=\"hidden\" name=\"old_fileid\" value=\"".$fileid."\" />\n".
            "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".FILE_MAXSIZE."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert\" value=\"".$lang['missing_field_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"url\" name=\"url\" value=\"".$lang['url_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"image_url\" name=\"image_url\" value=\"".$lang['image_url_javascript']."\" /></fieldset>\n".
            "<table class=\"celldata\">\n".
            "<tr><td>".$lang['file']."</td><th>".$row['filename']."</th></tr>\n".
            "<tr><td>".$lang['file_choose']."</td><td><input id=\"userfile\" type=\"file\" name=\"userfile[]\" style=\"width: 400px\" ".$s."/></td></tr>\n".
            "<tr><td>".$lang['description'].":</td>".
            "<td><script type=\"text/javascript\"> edToolbar('description');</script>".
            "<textarea name=\"description\" id=\"description\" rows=\"25\" cols=\"88\"".$s.">".$row['file_description']."</textarea></td></tr>\n".
            "<tr><td></td><td>".sprintf( $lang['max_file_sprt'], FILE_MAXSIZE/1000 )."</td></tr>\n".
            "</table>\n".
            "<table class=\"celldata\">\n".
            "<tr><td><label for=\"owner\">".$lang['file_email_owner']."</label></td><td><input type=\"checkbox\" name=\"mail_owner\" id=\"owner\" ".DEFAULT_OWNER.$s."/></td></tr>\n".
            "<tr><td><label for=\"usergroup\">".$lang['file_email_usergroup']."</label></td><td><input type=\"checkbox\" name=\"mail_group\" id=\"usergroup\" ".DEFAULT_GROUP.$s."/></td></tr>\n".
            "</table>\n".
            "<p><input type=\"submit\" value=\"".$lang['upload']."\"".$s."/></p>\n".
            "</form>\n".
            "<script type=\"text/javascript\">document.getElementById('userfile').focus();</script>\n";

//delete file
$content .= "<form id=\"delete_file\" method=\"post\" action=\"files.php\" onsubmit=\"return confirm( '".sprintf( $lang['del_file_javascript_sprt'], javascript_escape($row['filename'] ) )."' )\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_del\" />\n".
            "<input type=\"hidden\" name=\"fileid\" value=\"".$fileid."\" />\n".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$taskid."\" />\n".
            "<input type=\"hidden\" name=\"return\" value=\"".$return."\" />\n".
            "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
            "<p><input type=\"submit\" value=\"".$lang['delete']."\"/></p>\n".
            "</form>\n";

new_box($lang['add_file'], $content );

?>
