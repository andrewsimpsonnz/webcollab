<?php
/*
  $Id$

  (c) 2002 - 2005 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Lists a calendar

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

include_once(BASE.'lang/lang_long.php' );

//secure variables
$content = '';
$no_access_project = array();
$no_access_group   = array();
$allowed    = array();
$task_dates = array();
 
//set selection default
if(isset($_POST['selection']) && strlen($_POST['selection']) > 0 ){
  $selection = ($_POST['selection']);
}
else {
  $selection = 'user';
}

//set user default
if(isset($_POST['userid']) && is_numeric($_POST['userid']) ){
  $userid = ($_POST['userid']);
}
else {
  $userid = (GUEST ) ? 0 : UID;
}
//set usergroup default
if(isset($_POST['groupid']) && is_numeric($_POST['groupid']) ){
  $groupid = $_POST['groupid'];
}  
else {
  $groupid = 0;
}
//get calendar navigation offsets
if(isset($_POST['lastyear']) && strlen($_POST['lastyear']) > 0 ){
  $yearoffset = -1;
}
else {
  if(isset($_POST['nextyear']) && strlen($_POST['nextyear']) > 0 ) {
    $yearoffset = +1;
  }
  else {
    $yearoffset = 0;
  }
}
if(isset($_POST['lastmonth']) && strlen($_POST['lastmonth']) > 0 ){
  $monthoffset = -1;
}  
else {
  if(isset($_POST['nextmonth']) && strlen($_POST['nextmonth']) > 0 ) {
    $monthoffset = +1;
  }
  else {
    $monthoffset = 0;
  }
}

//set dates to match local time 
$epoch = TIME_NOW + (TZ * 3600) - TZ_OFFSET;
    
//set month
if(isset($_POST['month']) && is_numeric($_POST['month']) ){
  $month = $_POST['month'];
}
else {
  $month = date('n', $epoch);
}
//set year
if(isset($_POST['year']) && is_numeric($_POST['year']) ){
  $year = $_POST['year'];
}
else {
  $year = date('Y', $epoch);
}
//Apply any calendar navigation
$month += $monthoffset;

if($month < 1) {
  $month = 12;
  $yearoffset -= 1;
}
else {
  if($month > 12) {
    $month = 1;
    $yearoffset += 1;
  }
}

$year += $yearoffset;

//set day, if applicable
if( $month == date('n', $epoch) && $year == date('Y', $epoch) ){
  $today = date('j', $epoch);
}
else {
  $today = 0;
}

//set selection & associated defaults for the text boxes
switch($selection ) {
  case 'group':
    $userid = 0; $s1 = ""; $s2 = " selected=\"selected\""; $s3 = " checked=\"checked\""; $s4 = "";
    $tail = "AND usergroupid=$groupid";
    if($groupid == 0 ){
      $s4 = " selected=\"selected\"";
    }
    break;

  case 'user':
  default:
    $groupid = 0; $s1 = " checked=\"checked\""; $s2 = ""; $s3 = ""; $s4 = " selected=\"selected\"";
    $tail = "AND owner=$userid";
    if($userid == 0 ){
      $tail = "";
      $s2 = " selected=\"selected\"";
    }
    break;
}

//get list of private projects and put them in an array for later use
$q = db_query('SELECT id, usergroupid FROM '.PRE.'tasks WHERE parent=0 AND globalaccess=\'f\'' );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i) {
  $no_access_project[$i] = $row[0];
  $no_access_group[$i] = $row[1];
}

//get list of common users in private usergroups that this user can view 
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid,
                      '.PRE.'usergroups_users.userid AS userid
                      FROM '.PRE.'usergroups_users 
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'usergroups_users.usergroupid)
                      WHERE '.PRE.'usergroups.private=1');

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(in_array($row[0], (array)$GID ) && ! in_array($row[1], (array)$allowed ) ) {
   $allowed[$i] = $row[1];
  }
}

//get all the days with projects/tasks due in selected month and year
$q = db_query('SELECT DISTINCT '.$day_part.'deadline) FROM '.PRE.'tasks 
                      WHERE deadline >= \''.$year.'-'.$month.'-01\' 
                      AND deadline <= (\''.$year.'-'.$month.'-01\'+'.$interval.$delim.'1 MONTH'.$delim.') '.
                      $tail );
                      
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ){
  $task_dates[$i] = (int)$row[0];
}

//get the sort order for projects/tasks
$q   = db_query('SELECT project_order, task_order FROM '.PRE.'config' );
$row = db_fetch_num($q, $i );
$order = array($tail.' AND parent=0 '.$row[0], $tail.' AND parent<>0 '.$row[1] );

$content .= "<form method=\"post\" action=\"calendar.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" /></fieldset>\n ".
            "<div style=\"text-align: center\">\n".
            "<table style=\"margin-left: auto; margin-right: auto; background-color: #ddd; border: solid black 1px;\" cellpadding=\"5px\">\n".
            "<tr align=\"left\"><td><input type=\"radio\" value=\"user\" name=\"selection\" id=\"users\"".$s1." /><label for=\"users\">".$lang['users']."</label>\n".
            "<label for=\"users\"><select name=\"userid\">\n".
            "<option value=\"0\"".$s2.">".$lang['all_users']."</option>\n";

//get all users for option box
$q = db_query('SELECT id, fullname, private FROM '.PRE.'users WHERE deleted=\'f\' AND guest=0 ORDER BY fullname');

//user input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($row['private'] && ($row['id'] != UID ) && ( ! ADMIN ) && ( ! in_array($row['id'], (array)$allowed ) ) ) {
    continue;
  }

  $content .= "<option value=\"".$row['id']."\"";

  //highlight current selection
  if( $row['id'] == $userid ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$row['fullname']."</option>\n";
}

$content .= "</select></label></td>\n".
            "<td><input type=\"radio\" value=\"group\" name=\"selection\" id=\"group\"".$s3." /><label for=\"group\">".$lang['usergroups']."</label>\n".
            "<label for=\"group\"><select name=\"groupid\">\n".
            "<option value=\"0\"".$s4.">".$lang['no_group']."</option>\n";

//get all groups for option box
$q = db_query('SELECT id, name, private FROM '.PRE.'usergroups ORDER BY name' );

//usergroup input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //usergroup test for privacy
  if( (! ADMIN ) && ($row['private'] ) && ( ! in_array($row['id'], (array)$GID ) ) ) {
  continue;
  }

  $content .= "<option value=\"".$row['id']."\"";

  //highlight current selection
  if( $row[ "id" ] == $groupid ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$row['name']."</option>\n";
}

$content .= "</select></label></td>\n".
            "<td colspan=\"2\" ><input type=\"submit\" value=\"".$lang['update']."\" /></td></tr>\n".
            "</table></div>\n";

//month (must be in decimal, 'cause that's what database uses!)
$content .= "<div style=\"text-align: center\">\n".
            "<table style=\"margin-left: auto; margin-right: auto\">\n".
            "<tr><td><input type=\"submit\" name=\"lastyear\" value=\"&lt;&lt;\" /></td>\n".
            "<td><input type=\"submit\" name=\"lastmonth\" value=\"&lt;\" /></td>\n".
            "<td>\n<select name=\"month\">\n";

for( $i=1; $i<13 ; ++$i ) {
  $content .= "<option value=\"".$i."\"";

  if( $month == $i ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$month_array[($i)]."</option>\n";
}
$content .=  "</select></td>\n";

//year
$content .= "<td><select name=\"year\">\n";
for( $i=2001; $i<2011 ; ++$i ) {
  $content .= "<option value=\"".$i."\"";

  if( $year == $i ) {
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$i."</option>\n";
}
$content .=  "</select></td>\n".
             "<td><input type=\"submit\" name=\"nextmonth\" value=\"&gt;\" /></td>\n".
             "<td><input type=\"submit\" name=\"nextyear\" value=\"&gt;&gt;\" /></td></tr>\n".
             "</table></div></form>\n<br />\n";

//number of days in month
$numdays = date('t', mktime(0, 0, 0, $month, 1, $year ) );

//main calendar table
$content .= "<div style=\"text-align: center\">\n".
            "<table class=\"outline\" cellspacing=\"0\" border=\"1px\" width=\"97%\">\n<tr>\n".
            "<td colspan=\"7\" class=\"monthcell\" align=\"center\" valign=\"middle\"><b>".$month_array[(int)$month]."</b>\n</td>\n".
            "</tr>\n";

//weekdays
$content .= "<tr align=\"center\" valign=\"middle\">\n";
foreach($week_array as $value) {
  $content .= "<td class=\"weekcell\"><b>$value</b></td>\n";
}
$content .= "</tr>\n";

//show lead in to dates
$content .= "<tr align=\"left\" valign=\"top\">\n";

$dayone = date("w", mktime(0, 0, 0, $month, 1, $year ) );

for ($i = 0; $i < $dayone; ++$i ) {
  $content .= "<td class=\"datecell\">&nbsp;</td>\n";
}
$leadin_length = $i;

//show dates
for($num = 1; $num <= $numdays; ++$num ) {
  if($i >= 7 ) {
    $content .= "</tr>\n".
                "<tr align=\"left\" valign=\"top\">\n";
    $i=0;
  }
  $content .= "<td class=\"datecell\" ";

  //highlight today
  if($num == $today) {
    $content .= "style=\"background : #C0C0C0\"";
  }
  
  $content .= "><span class=\"daynum\">".$num."</span>";

  //check if this date has projects/tasks
  if(in_array($num, (array)$task_dates ) ) {
    //rows exist for this date - get them!
    //projects first, then tasks in order set by admin  
    foreach($order as $suffix ) { 
      $q = db_query('SELECT id, name, parent, status, usergroupid, globalaccess, projectid, deadline AS due
                            FROM '.PRE.'tasks 
                            WHERE deadline=\''.$year.'-'.$month.'-'.$num.'\' 
                            AND archive=0 '.$suffix );
  
        for( $j=0 ; $row = @db_fetch_array($q, $j ) ; ++$j ) {
  
          //check for private usergroups
          if( (! ADMIN ) && ($row['usergroupid'] != 0 ) && ($row['globalaccess'] == 'f' ) ) {
  
            if( ! in_array( $row['usergroupid'], (array)$GID ) ) {
              continue;
            }
          }
  
          //don't show tasks in private usergroup projects
          if( (! ADMIN ) && in_array($row['projectid'], (array)$no_access_project) ) {
            $key = array_search($row['projectid'], $no_access_project );
  
            if( ! in_array($no_access_group[$key], (array)$GID ) ) {
              continue;
            }
          }
  
          switch($row['status'] ) {
            case 'notactive':
            case 'cantcomplete':
            case 'nolimit':
              //don't show if not active
              continue 2;
              break;
  
            default:
              //active task or project
              switch($row['parent'] ) {
                case '0':
                  //project
                  //check if tasks are all complete
                  if(db_result(db_query('SELECT COUNT(*) FROM '.PRE.'tasks WHERE projectid='.$row['id'].' AND status<>\'done\' AND parent>0' ), 0, 0 ) == 0 ){
                    $name = "<span class=\"green\"><span class=\"underline\">".$row['name']."</span>";
                  }
                  else {
                    $name = "<span class=\"blue\">".$row['name'];
                  }
                  $content .= "<img src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\" />".
                            "<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\">".$name."</span></a><br />\n";
                  break;
  
                default:
                  //task
                  if($row['status'] == "done" ) {
                    $name = "<span class=\"green\">".$row['name'];
                  }
                  else {
                    $name = "<span class=\"red\">".$row['name'];
                  }
                  $content .= "<img src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\" />".
                            "<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\">".$name."</span></a><br />\n";
                  break;
              }
            break;
        }
      }
    }
  }
  $content .= "</td>\n";
  ++$i;
}

//show lead out to dates
$leadout_length = (7 - ($numdays + $leadin_length ) % 7 ) % 7;
for($i = 0; $i < $leadout_length; ++$i ) {
  $content .= "<td class=\"datecell\">&nbsp;</td>\n";
}

$content .= "</tr>\n";
$content .= "</table>\n</div>\n";
$content .= "<div style=\"text-align: center; padding-top: 20px\">\n".
            "<b>[<a href=\"main.php?x=".$x."\">".$calendar_key."<br />\n</div>\n";

new_box($lang['calendar'], $content );

?>
