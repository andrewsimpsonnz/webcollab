<?php
/*
  $Id$

  (c) 2002 - 2004 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

require_once("includes/security.php" );

//secure variables
$content = "";
$no_access_project[0] = 0;
$no_access_group[0] = 0;
$allowed[0] = 0;
$task_dates[0] = 0;
 
//set selection default
if(isset($_POST["selection"]) && strlen($_POST["selection"]) > 0 )
  $selection = ($_POST["selection"]);
else
  $selection = "user";

//set user default
if(isset($_POST["userid"]) && is_numeric($_POST["userid"]) )
  $userid = ($_POST["userid"]);
else
  $userid = $uid;

//set usergroup default
if(isset($_POST["groupid"]) && is_numeric($_POST["groupid"]) )
  $groupid = ($_POST["groupid"]);
else
  $groupid = 0;

//set month
if(isset($_POST["month"]) && is_numeric($_POST["month"]) )
  $month = $_POST["month"];
else
  $month = date("n",time());

//set year
if(isset($_POST["year"]) && is_numeric($_POST["year"]) )
  $year = $_POST["year"];
else
  $year = date("Y",time());

//set day, if applicable
if( $month == date("n",time()) && $year == date("Y",time()) )
  $today = date("j", time());
else
  $today = 0;

//set selection & associated defaults for the text boxes
switch($selection ) {
  case "group":
    $userid = 0; $s1 = ""; $s2 = " selected=\"selected\""; $s3 = " checked=\"checked\""; $s4 = "";
    $tail = "AND usergroupid=$groupid";
    if($groupid == 0 )
      $s4 = " selected=\"selected\"";
    break;

  case "user":
  default:
    $groupid = 0; $s1 = " checked=\"checked\""; $s2 = ""; $s3 = ""; $s4 = " selected=\"selected\"";
    $tail = "AND owner=$userid";
    if($userid == 0 )
      $tail = "";
      $s2 = " selected=\"selected\"";
    break;
}

//get list of private projects and put them in an array for later use
$q = db_query("SELECT id, usergroupid FROM tasks WHERE parent=0 AND globalaccess='f'" );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
  $no_access_project[$i] = $row[0];
  $no_access_group[$i] = $row[1];
}

//get list of common users in private usergroups that this user can view 
$q = db_query("SELECT usergroupid, userid 
                      FROM usergroups_users 
                      LEFT JOIN usergroups ON (usergroups.id=usergroups_users.usergroupid)
                      WHERE usergroups.private=1");

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ) {
  if(in_array($row[0], (array)$gid ) && ! in_array($row[1], (array)$allowed ) ) {
   $allowed[$i] = $row[1];
  }
}

//get all the days with projects/tasks due in selected month and year
$q = db_query("SELECT DISTINCT ".$day_part."deadline) FROM tasks 
                      WHERE deadline >= '".$year."-".$month."-01' 
                      AND deadline <= ('".$year."-".$month."-01'+INTERVAL ".$delim."1 MONTH".$delim.")".
                      $tail );
                      
for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++ ){
  $task_dates[$i] = (int)$row[0];
}

$content .= "<div align=\"center\">\n".
            "<form method=\"post\" action=\"calendar.php\">".
            "<input type=\"hidden\" name=\"x\" value=\"$x\" />\n ".
            "<table border=\"0\">\n".
            "<tr align=\"left\"><td><input type=\"radio\" value=\"user\" name=\"selection\" id=\"users\"$s1 /><label for=\"users\">".$lang["users"]."</label></td><td>\n".
            "<label for=\"users\"><select name=\"userid\">\n".
            "<option value=\"0\"$s2>".$lang["all_users"]."</option>\n";

//get all users for option box
$q = db_query("SELECT id, fullname, private FROM users WHERE deleted='f' ORDER BY fullname");

//user input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

  //user test for privacy
  if($row["private"] && ( ! $admin ) && ( ! in_array($row["id"], (array)$allowed ) ) ){
    continue;
  }

  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $userid )
    $content .= " selected=\"selected\"";

  $content .= ">".$row["fullname"]."</option>\n";
}

$content .= "</select></label></td></tr>\n".
            "<tr align=\"left\"><td><input type=\"radio\" value=\"group\" name=\"selection\" id=\"group\"$s3 /><label for=\"group\">".$lang["usergroups"]."</label></td>\n".
            "<td><label for=\"group\"><select name=\"groupid\">\n".
            "<option value=\"0\"$s4>".$lang["no_group"]."</option>\n";

//get all groups for option box
$q = db_query("SELECT id, name, private FROM usergroups ORDER BY name" );

//usergroup input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

  //usergroup test for privacy
  if( (! $admin ) && ($row["private"] ) && ( ! in_array($row["id"], $gid ) ) ) {
  continue;
  }

  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $groupid )
    $content .= " selected=\"selected\"";

  $content .= ">".$row["name"]."</option>\n";
}

$content .= "</select></label></td></tr>\n</table>\n<br />\n";

//month (must be in decimal, 'cause that's what database uses!)
$content .= "<table border=\"0\"><tr><td>\n<select name=\"month\">\n";
for( $i=1; $i<13 ; $i++) {
  $content .= "<option value=\"$i\"";

  if( $month == $i ) $content .= " selected=\"selected\"";
  $content .= ">".$month_array[($i)]."</option>\n";
  }
$content .=  "</select></td>\n";

//year
$content .= "<td><select name=\"year\">\n";
for( $i=2001; $i<2011 ; $i++) {
  $content .= "<option value=\"$i\"";

  if( $year == $i ) $content .= " selected=\"selected\"";
  $content .= ">".$i."</option>\n";
  }
$content .=  "</select></td>\n".
             "<td><input type=\"submit\" value=\"".$lang["update"]."\" /></td></tr>\n".
             "</table></form>\n<br /><br />\n";

//number of days in month
$numdays = date("t", mktime(0, 0, 0, $month, 1, $year ) );

//main calendar table
$content .= "<table style=\"border-width: 1px; border-style: solid; border-collapse: collapse; width: 97%\" align=\"center\" cellspacing=\"0\" border=\"1\">\n<tr>\n";
$content .= "<td colspan=\"7\" style=\"vertical-align: middle; text-align: center\"><b>".date("F", mktime(0, 0, 0, $month, 1, $year ) )."</b>\n</td>\n";
$content .= "</tr>\n";

//weekdays
$content .= "<tr style=\"vertical-align: middle; text-align: center\">\n";
foreach($week_array as $value) {
  $content .= "<td style=\"border-width: 1px; border-style: solid; width:13.86%\"><b>$value</b></td>\n";
}
$content .= "</tr>\n";

//show lead in to dates
//$content .= "<tr valign=\"top\" align=\"center\">\n";
$content .= "<tr style=\"vertical-align: top; text-align: center\">\n";
for ($i = 0; $i < $dayone = date("w", mktime(0, 0, 0, $month, 1, $year ) ); $i++ ) {
  $content .= "<td style=\"border-width: 1px; border-style: solid\">&nbsp;</td>\n";
}

//show dates
for ($num = 1; $num <= $numdays; $num++ ) {
  if ($i >= 7 ) {
    $content .= "</tr>\n".
                "<tr style=\"vertical-align: top; text-align: center\" valign=\"top\">\n";
    $i=0;
  }
  $content .= "<td style=\"border-width: 1px; border-style: solid\" ";

  //highlight today
  if($num == $today)
    $content .= "bgcolor=\"#C0C0C0\"";

  $content .= ">$num<br />";
  $pad = 0;

  //search for tasks on this date (Not every date will have data rows and COUNT(*) is much faster to find empty rows)
  //if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE deadline='$year-$month-$num' $tail" ), 0, 0 ) > 0 ) {
  
  if(in_array($num, (array)$task_dates ) ) {
  
  //rows exist for this date - get them!
  $q = db_query("SELECT id, name, parent, status, usergroupid, globalaccess, projectid FROM tasks WHERE deadline='$year-$month-$num' $tail" );

    for( $j=0 ; $row = @db_fetch_array($q, $j ) ; $j++) {

      //check for private usergroups
      if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {

        if( ! in_array( $row["usergroupid"], (array)$gid ) )
          continue;
      }

      //don't show tasks in private usergroup projects
      if( ($admin != 1 ) && in_array($row["projectid"], (array)$no_access_project) ) {
        $key = array_search($row["projectid"], $no_access_project );

        if( ! in_array($no_access_group[$key], (array)$gid ) )
          continue;
      }

      switch($row["status"] ) {
        case "notactive":
        case "cantcomplete":
        case "nolimit":
          //don't show if not active
          continue 2;
        break;

        default:
          //active task or project
          switch($row["parent"] ) {
             case "0":
               //project
               //check if tasks are all complete
               if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE projectid=".$row["id"]." AND status<>'done' AND parent>0" ), 0, 0 ) == 0 )
                 $name = "<font color=\"green\"><u>".$row["name"]."</u>";
               else
                 $name = "<font color=\"blue\">".$row["name"];
               $content .= "<img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\" />".
                           "<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["id"]."\">$name</font></a><br />\n";
             break;

             default:
            //task
              if($row["status"] == "done" )
                $name = "<font color=\"green\">".$row["name"];
              else
                $name = "<font color=\"red\">".$row["name"];

              $content .= "<img border=\"0\" src=\"images/arrow.gif\" height=\"8\" width=\"7\" alt=\"arrow\" />".
                          "<a href=\"tasks.php?x=$x&amp;action=show&amp;taskid=".$row["id"]."\">$name</font></a><br />\n";
            break;
          }
        break;
      }
      $pad++;
    }
  }
  //pad out the cells to the required depth
  while($pad < 5 ) {
    $content .= "<br />";
    $pad++;
  }

  $content .= "</td>\n";
  $i++;
}
$content .= "</tr>\n";
$content .= "</table>\n<br />\n";

include_once(BASE."lang/lang_long.php" );
$content .= "<b>[<a href=\"main.php?x=".$x."\">".$calendar_key."<br />\n</div>\n";

new_box($lang["calendar"], $content );

?>
