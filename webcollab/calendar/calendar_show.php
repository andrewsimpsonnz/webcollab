<?php
/*
  $Id$

  (c) 2002 - 2008 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

//secure variables
$content = '';
$allowed    = array();
$task_dates = array();
$no_access_project = array();
$month_projects    = array();
$project_colour_array = array();

//colour array for background highlights
$colour = array('#EEE9E9', '#CD9B9B', '#FEE8D6', '#FFDAB9', '#CDB79E', '#EBC79E', '#EBC79E', '#FFDEAD', '#FFEBCD', '#FFAEB9', '#FFADB9', '#EEA9B8', '#EE799F', '#FFBBFF', '#EEAEEE', '#EAADEA', '#CC99CC', '#FDF8FF', '#9F79EE', '#FDF8FF', '#AAAAFF', '#CAE1FF', '#87CEFF', '#BFEFFF', '#BBFFFF', '#AFEEEE', '#ADEAEA', '#DBFEF8', '#DBE6E0', '#BDFCC9', '#CCFFCC', '#98FB98', '#FFFFE0', '#FFFFAA', '#EAEAAE', '#FFFCCF' );
//randomise colour array
shuffle($colour);

//set selection default
if(isset($_POST['selection']) && strlen($_POST['selection']) > 0 ){
  $selection = ($_POST['selection']);
}
else {
  $selection = 'user';
}

//set user default
if( @safe_integer($_POST['userid']) ){
  $userid = $_POST['userid'];
}
else {
  $userid = (GUEST ) ? 0 : UID;
}
//set usergroup default
if( @safe_integer($_POST['groupid']) ){
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

$adjusted_time = TIME_NOW - date('Z') + TZ*60*60;

//set month
if( @safe_integer($_POST['month']) ){
  $month = $_POST['month'];
}
else {
  $month = date('n', $adjusted_time );
}
//set year
if( @safe_integer($_POST['year']) ){
  $year = $_POST['year'];
}
else {
  $year = date('Y', $adjusted_time );
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
if($month == date('n', $adjusted_time ) && $year == date('Y', $adjusted_time ) ){
  $today = date('j', $adjusted_time );
}
else {
  $today = 0;
}

//set selection & associated defaults for the text boxes
switch($selection ) {
  case 'group':
    $userid = 0; $s1 = ""; $s2 = " selected=\"selected\""; $s3 = " checked=\"checked\""; $s4 = "";
    $tail = " AND usergroupid=".$groupid;
    if($groupid == 0 ){
      $s4 = " selected=\"selected\"";
    }
    break;

  case 'user':
  default:
    $groupid = 0; $s1 = " checked=\"checked\""; $s2 = ""; $s3 = ""; $s4 = " selected=\"selected\"";
    $tail = " AND owner=".$userid;
    if($userid == 0 ){
      $tail = "";
      $s2 = " selected=\"selected\"";
    }
    break;
}

//get list of private projects and put them in an array for later use
$q = db_query('SELECT id, usergroupid FROM '.PRE.'tasks WHERE parent=0 AND globalaccess=\'f\'' );

for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  //array key is projectid, array variable is usergroupid
  $no_access_project[($row[0])] = $row[1];
}

//get list of common users in private usergroups that this user can view 
$q = db_query('SELECT '.PRE.'usergroups_users.usergroupid AS usergroupid,
                      '.PRE.'usergroups_users.userid AS userid
                      FROM '.PRE.'usergroups_users 
                      LEFT JOIN '.PRE.'usergroups ON ('.PRE.'usergroups.id='.PRE.'usergroups_users.usergroupid)
                      WHERE '.PRE.'usergroups.private=1');

for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {
  if(isset($GID[($row[0])] ) ) {
    $allowed[($row[1])] = $row[1];
  }
}

//get all the days with projects/tasks due in selected month and year
$q = db_query('SELECT '.$day_part.'deadline) AS day, projectid FROM '.PRE.'tasks 
                      WHERE deadline BETWEEN \''.$year.'-'.$month.'-01 00:00:00\' 
                      AND ('.$date_type.' \''.$year.'-'.$month.'-01 00:00:00\' + INTERVAL '.$delim.'1 MONTH'.$delim.')'.
                      $tail );

for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) {

  //store date with task as array key
  $task_dates[($row[0])] = $row[0];

  //assign a 'colour' to each project from the colour array
  if(! isset($project_colour_array[($row[1])] ) ) {
    $project_colour_array[($row[1])] = current($colour );
    if(next($colour) === false ) reset($colour );
  }
}

//set the usergroup permissions on queries (Admin can see all)
if(ADMIN ) {
  $tail_view  = ' ';
  $tail_group = ' ';
}
else {
  $tail_view  = ' AND (globalaccess=\'f\' AND usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
                  OR globalaccess=\'t\'
                  OR usergroupid=0) ';

  $tail_group = ' WHERE private=0 OR (private=1 AND id IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')) ';
}

//sort order for table listing
$suffix = $tail.$tail_view;

if(substr(DATABASE_TYPE, 0, 5) == 'mysql' ) {
  $suffix .= "ORDER BY IF(parent=0, 0, 1), name";
}
else {
  $suffix .= "ORDER BY parent<>0, name";
}

$content .= "<span class=\"textlink\">[<a href=\"main.php?x=".$x."\">".$lang['main_menu']."</a>]</span>";

$content .= "<form method=\"post\" action=\"calendar.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n ".
            "<input type=\"hidden\" name=\"action\" value=\"show\" /></fieldset>\n ".
            "<div style=\"text-align: center\">\n".
            "<table class=\"decoration\" style=\"margin-left: auto; margin-right: auto;\" cellpadding=\"5px\">\n".
            "<tr align=\"left\"><td><input type=\"radio\" value=\"user\" onchange=\"javascript:this.form.submit()\"name=\"selection\" id=\"users\"".$s1."/><label for=\"users\">".$lang['users']."</label>\n".
            "<label for=\"users\"><select name=\"userid\" onchange=\"javascript:this.form.submit()\">\n".
            "<option value=\"0\"".$s2.">".$lang['all_users']."</option>\n";

//get all users for option box
$q = db_query('SELECT id, fullname, private FROM '.PRE.'users WHERE deleted=\'f\' AND guest=0 ORDER BY fullname');

//user input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {

  //user test for privacy
  if($row['private'] && ($row['id'] != UID ) && ( ! ADMIN ) && ( ! isset($allowed[($row['id'])] ) ) ) {
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
            "<td><input type=\"radio\" value=\"group\" name=\"selection\" onchange=\"javascript:this.form.submit()\" id=\"group\"".$s3." /><label for=\"group\">".$lang['usergroups']."</label>\n".
            "<label for=\"group\"><select name=\"groupid\" onchange=\"javascript:this.form.submit()\">\n".
            "<option value=\"0\"".$s4.">".$lang['no_group']."</option>\n";

//get all groups for option box
$q = db_query('SELECT id, name FROM '.PRE.'usergroups '.$tail_group.' ORDER BY name' );

//usergroup input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ) {
  $content .= "<option value=\"".$row['id']."\"";

  //highlight current selection
  if( $row['id'] == $groupid ){
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
            "<td>\n<select name=\"month\" onchange=\"javascript:this.form.submit()\">\n";

for( $i=1; $i<13 ; ++$i ) {
  $content .= "<option value=\"".$i."\"";

  if( $month == $i ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$month_array[($i)]."</option>\n";
}
$content .=  "</select></td>\n";

//year
$content .= "<td><select name=\"year\" onchange=\"javascript:this.form.submit()\">\n";
for( $i=2001; $i<2015 ; ++$i ) {
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
for ($i = 0; $i < 7; ++$i ) {
  $day_number = $i + START_DAY;
  if( $day_number > 6 ) {
    $day_number = $day_number - 7;
  }
  $content .= "<td class=\"weekcell\" style=\"width: 20px\"><b>".$week_array[$day_number]."</b></td>\n";
}
$content .= "</tr>\n";

//show lead in to dates
$content .= "<tr align=\"left\" valign=\"top\">\n";

$dayone = date("w", mktime(0, 0, 0, $month, 1, $year ) ) - START_DAY;
if( $dayone < 0 ) {
  $dayone = $dayone + 7;
}

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
  if(isset($task_dates[$num] ) ) {
    //rows exist for this date - get them!
    $q = db_query('SELECT id, name, parent, status, projectid, completed
                          FROM '.PRE.'tasks
                          WHERE deadline BETWEEN \''.$year.'-'.$month.'-'.$num.' 00:00:00\'
                          AND \''.$year.'-'.$month.'-'.$num.' 23:59:59\'
                          AND archive=0 '.$suffix );

      for( $j=0 ; $row = @db_fetch_array($q, $j ) ; ++$j ) {

        //don't show tasks in private usergroup projects
        if( (! ADMIN ) && isset($no_access_project[($row['projectid'])] ) ) {

          //$no_access_project[($row['projectid'])] == 'usergroupid' of project
          if(! isset($GID[ ($no_access_project[($row['projectid'])] ) ] ) ) {
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
                if($row['completed'] > 99 ){
                  $name = "<b>".$row['name']."</b>&nbsp;<img src=\"images/lightbulb.png\" height=\"16\" width=\"16\" alt=\"tick\" />";
                }
                else {
                  $name = "<b>".$row['name']."</b>";
                }
                $content .= "<div style=\"background:".$project_colour_array[$row['projectid']]."\" >".
                            "<img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"arrow\" style=\"vertical-align: middle\" />".
                            "<span style=\"text-decoration:underline\">".
                            "<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\">".$name."</a></span></div>\n";
                break;

              default:
                //task
                if($row['status'] == "done" ) {
                  $name = $row['name']."&nbsp;<img src=\"images/lightbulb.png\" height=\"16\" width=\"16\" alt=\"tick\" />";
                }
                else {
                  $name = $row['name'];
                }
                $content .= "<div style=\"background:".$project_colour_array[$row['projectid']]."\">".
                            "<img src=\"images/bullet_add.png\" height=\"16\" width=\"16\" alt=\"arrow\" style=\"vertical-align: middle\" />".
                            "<a href=\"tasks.php?x=".$x."&amp;action=show&amp;taskid=".$row['id']."\">".$name."</a></div>\n";
                break;
            }
          break;
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

new_box($lang['calendar'], $content );

?>
