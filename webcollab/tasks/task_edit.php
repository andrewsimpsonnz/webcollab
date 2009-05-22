<?php
/*
  $Id$

  (c) 2002 - 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on original file written for CoreAPM by Dennis Fleurbaaij, Andrew Simpson &
  Marshall Rose 2001/2002

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

  Edit a task

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'includes/details.php' );
include_once(BASE.'includes/admin_config.php' );
include_once(BASE.'includes/time.php' );

$content = '';
$javascript = '';
$allowed = array();

//
//check user access
//
function user_access($owner, $usergroupid, $groupaccess ) {

  global $GID, $TASKID_ROW;

  if(ADMIN ){
    return true;
  }
  if(GUEST ){
    return false;
  }
  if($owner == UID ){
    return true;
  }
  if($usergroupid == 0 ) {
    return false;
  }
  if($groupaccess == 't' ) {
    if(isset($GID[$usergroupid] ) ) {
      return true;
    }
  }
  return false;
}

if(! @safe_integer($_GET['taskid']) ){
  error('Task edit', 'The taskid input is not valid' );
}

$taskid = $_GET['taskid'];

//can this user edit this task ?
if( ! user_access($TASKID_ROW['owner'], $TASKID_ROW['usergroupid'], $TASKID_ROW['groupaccess'] ) ) {
  warning($lang['access_denied'], $lang['no_edit'] );
}

//get list of common users in private usergroups that this user can view 
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid,
                      '.PRE.'usergroups_users.userid AS userid 
                      FROM '.PRE.'usergroups_users 
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'usergroups_users.usergroupid)
                      WHERE '.PRE.'usergroups.private=1');

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
   $allowed[($row[1])] = $row[1];
  }
}

//start showing task info
$content .= "<form method=\"post\" action=\"tasks.php\" onsubmit= \"return fieldCheck('name') && dateCheck()\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"submit_update\" />\n".
            "<input type=\"hidden\" id=\"token\" name=\"token\" value=\"".TOKEN."\" />\n".
            "<input type=\"hidden\" name=\"taskid\" value=\"".$TASKID_ROW['id']."\" />\n".
            "<input type=\"hidden\" id=\"alert_field\" name=\"alert1\" value=\"".$lang['missing_field_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"alert_date\" name=\"alert2\" value=\"".$lang['invalid_date_javascript']."\" />\n".
            "<input type=\"hidden\" id=\"alert_finish\" name=\"alert3\" value=\"".$lang['finish_date_javascript']."\" />\n";

//select either project or task for text
switch($TYPE) {
  case 'project':
    $content .= "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"-1\" />\n".
                //no taskgroups in projects
                "<input type=\"hidden\" name=\"taskgroupid\" value=\"0\" /></fieldset>\n ".
                "<table class=\"celldata\">\n".
                "<tr><td>".$lang['creation_time']."</td><td>".nicedate($TASKID_ROW['created'] )."</td></tr>\n".
                "<tr><td>".$lang['project_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" size=\"60\" value=\"".$TASKID_ROW['name']."\" /></td></tr>\n";
    break;

  case 'task':
    //get parent details
    $q = db_query('SELECT '.$epoch.'deadline) AS epoch_deadline, status FROM '.PRE.'tasks WHERE id='.$TASKID_ROW['parent'].' LIMIT 1' );
    $parent_row = db_fetch_array($q, 0 );

    switch ($parent_row['status'] ) {
      case 'created':
      case 'active':
        //add the project deadline (plus GMT offset) for the javascript
        $project_deadline = $parent_row['epoch_deadline'] + TZ*60*60;
        break;

      case 'notactive':
      case 'cantcomplete':
      case 'done':
      case 'nolimit':
      default:
        //don't check project deadline with inactive parents
        $project_deadline = -1;
        break;
    }

    //get project name
    $project_name = db_result(db_query('SELECT name FROM '.PRE.'tasks WHERE id='.$TASKID_ROW['projectid'].' LIMIT 1' ), 0, 0 );

    //show project finish date for javascript & other details
    $content .=  "<input id=\"projectDate\" type=\"hidden\" name=\"projectDate\" value=\"".$project_deadline."\" /></fieldset>\n".
                 "<table class=\"celldata\">\n".
                 "<tr><td>".$lang['creation_time']."</td><td>".nicedate($TASKID_ROW['created'] )."</td></tr>\n".
                 "<tr><td>".$lang['project'] .":</td><td><a href=\"tasks.php?x=".X."&amp;action=show&taskid=".$TASKID_ROW['projectid']."\">".$project_name."</a></td></tr>\n";
    break;
}

//reparenting
$content .= "<tr><td>".$lang['parent_task'].":</td><td><select name=\"parentid\">\n";
$content .= "<option value=\"0\"";

if($TASKID_ROW['parent'] == 0 ){
  $content .= " selected=\"selected\"";
}
$content .= ">".$lang['no_reparent']."</option>\n";

$q = db_query('SELECT id, name, usergroupid, globalaccess FROM '.PRE.'tasks WHERE id<>'.$taskid.' AND archive=0 ORDER BY name');

for( $i=0; $reparent_row = @db_fetch_array($q, $i ); ++$i ) {
  //check for private usergroups
  if( (! ADMIN ) && ($reparent_row['usergroupid'] != 0 ) && ($reparent_row['globalaccess'] == 'f' ) ) {

    if( ! isset($GID[($reparent_row['usergroupid'])] ) ) {
      continue;
    }
  }
  $content .= "<option value=\"".$reparent_row['id']."\"";

  if($TASKID_ROW['parent'] == $reparent_row['id'] ) {
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$reparent_row['name']."</option>\n";
}
$content .="</select></td></tr>\n";

//show task (if applicable)
if($TASKID_ROW['parent'] != 0 ){
  $content .= "<tr><td>".$lang['task_name'].":</td><td><input id=\"name\" type=\"text\" name=\"name\" size=\"30\" value=\"".$TASKID_ROW['name']."\" /></td></tr>\n";
}
//deadline
$content .= "<tr><td>".$lang['deadline'].":</td><td>".date_select_from_timestamp($TASKID_ROW['deadline'])."</td></tr>\n";

//priority
switch($TASKID_ROW['priority'] ) {
  case 0:
    $s1 = "selected=\"selected\""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";
    break;

  case 1:
    $s1 = ""; $s2 = " selected=\"selected\""; $s3 = ""; $s4 =""; $s5 = "";
    break;

  case 3:
    $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" selected=\"selected\""; $s5 = "";
    break;

  case 4:
    $s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = " selected=\"selected\"";
    break;

  case 2:
  default:
    $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\""; $s4 =""; $s5 = "";
    break;
}

$content .= "<tr><td>".$lang['priority'].":</td><td>\n".
            "<select name=\"priority\">\n".
            "<option value=\"0\"".$s1.">".$task_state['dontdo']."</option>\n".
            "<option value=\"1\"".$s2.">".$task_state['low']."</option>\n".
            "<option value=\"2\"".$s3.">".$task_state['normal']."</option>\n".
            "<option value=\"3\"".$s4.">".$task_state['high']."</option>\n".
            "<option value=\"4\"".$s5.">".$task_state['yesterday']."</option>\n".
            "</select></td></tr>\n";

switch($TASKID_ROW['parent'] ){
  case 0:
    //status for projects - 'done' is calculated from tasks
    switch($TASKID_ROW['status'] ) {
      case 'notactive':
        $s1 = " selected=\"selected\""; $s2 = ""; $s3 = ""; $s4 = "";
        break;

      case 'nolimit':
        $s1 = ""; $s2 = " selected=\"selected\""; $s3 = ""; $s4 ="";
        break;

      case 'cantcomplete':
        $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" selected=\"selected\"";
        break;

      case 'active':
      default:
        $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\""; $s4 ="";
        break;
    }
    $content .= "<tr><td>".$lang['status'].":</td><td>\n".
                 "<select name=\"status\">\n".
                 "<option value=\"notactive\"".$s1.">".$task_state['planned_project']."</option>\n".
                 "<option value=\"nolimit\"".$s2.">".$task_state['no_deadline_project']."</option>\n".
                 "<option value=\"active\"".$s3.">".$task_state['active_project']."</option>\n".
                 "<option value=\"cantcomplete\"".$s4.">".$task_state['cantcomplete']."</option>\n".
                 "</select></td></tr>";
    break;

    default:
      //status for tasks
      switch($TASKID_ROW['status'] ) {
        case 'notactive':
          $s1 = ""; $s2 = " selected=\"selected\""; $s3 = ""; $s4 =""; $s5 = "";
          break;

        case 'active':
          $s1 = ""; $s2 = ""; $s3 = " selected=\"selected\""; $s4 =""; $s5 = "";
          break;

        case 'cantcomplete':
          $s1 = ""; $s2 = ""; $s3 = ""; $s4 =" selected=\"selected\""; $s5 = "";
          break;

        case 'done':
          $s1 = ""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = " selected=\"selected\"";
          break;

        case 'created':
        default:
          $s1 = " selected=\"selected\""; $s2 = ""; $s3 = ""; $s4 =""; $s5 = "";
          break;
      }
      $content .= "<tr> <td>".$lang['status'].":</td> <td>\n".
                   "<select id=\"projectStatus\" name=\"status\">\n".
                   "<option value=\"created\"".$s1.">".$task_state['new']."</option>\n".
                   "<option value=\"notactive\"".$s2.">".$task_state['planned']."</option>\n".
                   "<option value=\"active\"".$s3.">".$task_state['active']."</option>\n".
                   "<option value=\"cantcomplete\"".$s4.">".$task_state['cantcomplete']."</option>\n".
                   "<option value=\"done\"".$s5.">".$task_state['completed']."</option>\n".
                   "</select></td></tr>";
}

//task owner
$content .= "<tr> <td>".$lang[$TYPE."_owner"].":</td> <td><select name=\"owner\">\n".
            "<option value=\"0\">".$lang['nobody']."</option>\n";

//select the user first
$q = db_query('SELECT id, fullname, private FROM '.PRE.'users WHERE deleted=\'f\' AND guest=0 ORDER BY fullname' );

for( $i=0 ; $user_row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($user_row['private'] && ($user_row['id'] != UID ) && ( ! ADMIN ) && ( ! isset($allowed[($user_row['id'])] ) ) ){
    continue;
  }

  $content .= "<option value=\"".$user_row['id']."\"";

  if( $TASKID_ROW['owner'] == $user_row['id'] ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$user_row['fullname']."</option>\n";
}

$content .= "</select></td></tr>\n";

//show a selection box with the taskgroups
//  (projects don't have taskgroups)
if($TASKID_ROW['parent'] != 0 ) {

  $content .= "<tr><td><a href=\"help/help_language.php?item=taskgroup&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=taskgroup&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['taskgroup']."</a>: </td> <td><select name=\"taskgroupid\">\n";
  $content .= "<option value=\"0\">".$lang['no_group']."</option>\n";

  $q = db_query('SELECT id, name FROM '.PRE.'taskgroups ORDER BY name' );

  for( $i=0 ; $taskgroup_row = @db_fetch_array($q, $i ) ; ++$i) {

    $content .= "<option value=\"".$taskgroup_row['id']."\"";

    if($TASKID_ROW['taskgroupid'] == $taskgroup_row['id'] ) {
      $content .= " selected=\"selected\"";
    }
    $content .= ">".$taskgroup_row['name']."</option>\n";
  }
  $content .= "</select></td></tr>\n";
}

//show all user-groups
$content .= "<tr><td><a href=\"help/help_language.php?item=usergroup&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=usergroup&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['usergroup']."</a>: </td> <td><select name=\"usergroupid\">\n";
$content .= "<option value=\"0\">".$lang['no_group']."</option>\n";

$q = db_query('SELECT id, name, private FROM '.PRE.'usergroups ORDER BY name' );

for( $i=0 ; $usergroup_row = @db_fetch_array($q, $i ) ; ++$i ) {

  //usergroup test for privacy
  if( (! ADMIN ) && ($usergroup_row['private'] ) && ( ! isset($GID[($usergroup_row['id'])] ) ) ) {
    continue;
  }

  $content .= "<option value=\"".$usergroup_row['id']."\"";

    if( $TASKID_ROW['usergroupid'] == $usergroup_row['id'] ) {
      $content .= " selected=\"selected\" >\n";
    }
    else {
      $content .= ">\n";
    }
    $content .= $usergroup_row['name']."</option>\n";
}
$content .= "</select></td></tr>\n";

//check box defaults
$global = ($TASKID_ROW['globalaccess'] == 't' ) ? "checked=\"checked\"" : '';
$group  = ($TASKID_ROW['groupaccess']  == 't' ) ? "checked=\"checked\"" : '';

$content .= "<tr><td><a href=\"help/help_language.php?item=globalaccess&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=globalaccess&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['all_users_view']."</a></td><td><input type=\"checkbox\" name=\"globalaccess\" ".$global." /></td></tr>\n".
             "<tr><td><a href=\"help/help_language.php?item=groupaccess&amp;type=help&amp;lang=".LOCALE_USER."\" onclick=\"window.open('help/help_language.php?item=groupaccess&amp;type=help&amp;lang=".LOCALE_USER."'); return false\">".$lang['group_edit']."</a> </td><td><input type=\"checkbox\" name=\"groupaccess\" ".$group." /></td></tr>\n".

             "<tr><td>".$lang[$TYPE."_description"]."</td> <td><textarea name=\"text\" rows=\"10\" cols=\"60\">".$TASKID_ROW['text']."</textarea></td> </tr>\n".

             //do we need to email ?
             "<tr><td><label for=\"mailowner\">".$lang['email_new_owner']."</label></td><td><input type=\"checkbox\" name=\"mailowner\" id=\"mailowner\" ".DEFAULT_OWNER." /></td></tr>\n".
             "<tr><td><label for=\"maillist\">".$lang['email_group']."</label></td><td><input type=\"checkbox\" name=\"maillist\" id=\"maillist\" ".DEFAULT_GROUP." /></td></tr>\n".

             "</table>\n".

             "<p><input type=\"submit\" value=\"".$lang['submit_changes']."\" /></p>".
             "</form>\n";

//delete options
if((ADMIN ) || ($TASKID_ROW['owner'] == UID ) ) { 

  $content .= "<form method=\"post\" action=\"tasks.php\" ".
              "onsubmit=\"return confirm('".sprintf($lang["del_javascript_".$TYPE."_sprt"], javascript_escape($TASKID_ROW['name'] ) )."')\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />".
              "<input type=\"hidden\" name=\"action\" value=\"delete\" />\n".
              "<input type=\"hidden\" name=\"taskid\" value=\"".$TASKID_ROW['id']."\" />\n".
              "<input type=\"hidden\" name=\"token\" value=\"".TOKEN."\" /></fieldset>\n".
              "<p><input type=\"submit\" value=\"".$lang["delete_".$TYPE]."\" /></p>\n".
              "</form>\n";
}

new_box($lang["edit_".$TYPE], $content );

?>