<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created 2002/2003 by Andrew Simpson

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
include_once("includes/screen.php" );

create_top( $lang["calendar"], 1 );

//secure variables
$content = "";
$usergroup[0] = 0;

//set selection default
if(isset($_POST["selection"]) && valid_string($_POST["selection"]) )
  $selection = ($_POST["selection"]);
else
  $selection = "user";

//set user default
if(isset($_POST["userid"]) && is_numeric($_POST["userid"]) )
  $userid = ($_POST["userid"]);
else
  $userid = 0;

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
    $userid = 0; $s1 = ""; $s2 = " SELECTED"; $s3 = " CHECKED"; $s4 = "";
    if($groupid == 0 )
      $s4 = " CHECKED";
    $tail = "AND usergroupid=$groupid";
    break;

  case "user":
  default:
    $tail = "AND owner=$userid";
    $groupid = 0; $s1 = " CHECKED"; $s2 = ""; $s3 = ""; $s4 = " SELECTED";
    if($userid == 0 ){
      $s2 = " SELECTED";
      $tail = "";
    }
    break;
}

$content .= "<div align=\"center\">\n".
            "<form method=\"POST\" action=\"calendar.php\">".
            "<input type=\"hidden\" name=\"x\" value=\"$x\">\n ".
            "<table border=\"0\">\n".
            "<tr><td><input type=\"radio\" value=\"user\" name=\"selection\" id=\"users\"$s1><label for=\"users\">".$lang["users"]."</label></td><td>\n".
            "<select name=\"userid\">\n".
            "<option value=\"0\"$s2>All users - translate me</option>\n";

//get all users for option box
$q = db_query("SELECT id, fullname FROM users WHERE deleted='f' ORDER BY fullname");

//user input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $userid )
    $content .= " SELECTED";

  $content .= ">".$row["fullname"]."</option>\n";
}

$content .= "</select></td></tr>\n".
            "<tr><td><input type=\"radio\" value=\"group\" name=\"selection\" id=\"group\"$s3><label for=\"group\">".$lang["usergroups"]."</label></td>\n".
            "<td><select name=\"groupid\">\n".
            "<option value=\"0\"$s4>".$lang["no_group"]."</option>\n";

//get all groups for option box
$q = db_query("SELECT id, name FROM usergroups ORDER BY name" );

//usergroup input box fields
for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
  $content .= "<option value=\"".$row["id"]."\"";

  //highlight current selection
  if( $row[ "id" ] == $groupid )
    $content .= " SELECTED";

  $content .= ">".$row["name"]."</option>\n";
}

$content .= "</select></td></tr>\n</table><br /><br />\n";

//month (must be in decimal, 'cause that's what database uses!)
$content .= "<table border=\"0\"><tr><td>\n<select name=\"month\">\n";
for( $i=1; $i<13 ; $i++) {
  $content .= "<option value=\"$i\"";

  if( $month == $i ) $content .= " SELECTED";
  //use ($i-1) because array starts at zero
  $content .= ">".$month_array[($i-1)]."</option>\n";
  }
$content .=  "</select></td>\n";

//year
$content .= "<td><select name=\"year\">\n";
for( $i=2001; $i<2011 ; $i++) {
  $content .= "<option value=\"$i\"";

  if( $year == $i ) $content .= " SELECTED";
  $content .= ">".$i."</option>\n";
  }
$content .=  "</select></td>\n".
             "<td><input type=\"submit\" value=\"".$lang["update"]."\"></td></tr>\n".
             "</table></form><br />\n";

//get usergroups of user, and put them in a simple array for later use
$usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
for( $i=0 ; $row = @db_fetch_num($usergroup_q, $i ) ; $i++) {
  $usergroup[$i] = $row[0];
}

//number of days in month
$numdays = date("t", mktime(0, 0, 0, $month, 1, $year ) );

//main calendar table
$content .= "<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"97%\">\n<tr>\n";
$content .= "<td colspan=\"7\" valign=\"middle\" align=\"center\"><b>".date("F", mktime(0, 0, 0, $month, 1, $year ) )."</b>\n</td>\n";
$content .= "</tr>\n";

//weekdays
$content .= "<tr valign=\"middle\" align=\"center\">\n";
foreach($week_array as $value) {
  $content .= "<td width=\"13.86%\"><b>$value</b></td>\n";
}
$content .= "</tr>\n";

//show lead in to dates
$content .= "<tr valign=\"top\" align=\"center\">\n";
for ($i = 0; $i < $dayone = date("w", mktime(0, 0, 0, $month, 1, $year ) ); $i++ ) {
  $content .= "<td>&nbsp;</td>\n";
}

//show dates
for ($num = 1; $num <= $numdays; $num++ ) {
  if ($i >= 7 ) {
    $content .= "</tr>\n".
                "<tr valign=\"top\" align=\"center\">\n";
    $i=0;
  }
  $content .= "<td ";

  //highlight today
  if($num == $today)
    $content .= "bgcolor=\"#C0C0C0\"";

  $content .= ">$num<br />";
  $pad = 0;

  //search for tasks on this date (Not every date will have data rows and COUNT(*) is much faster to find empty rows)
  if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE deadline='$year-$month-$num' $tail" ), 0, 0 ) > 0 ) {

  //rows exist for this date - get them!
  $q = db_query("SELECT id, name, parent, status, usergroupid, globalaccess FROM tasks WHERE deadline='$year-$month-$num' $tail" );

    for( $j=0 ; $row = @db_fetch_array($q, $j ) ; $j++) {

      //check for private usergroups
      if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {

        if( ! in_array( $row["usergroupid"], $usergroup ) )
          continue;
      }

      switch($row["status"] ) {
        case "notactive":
        case "cantcomplete":
        case "nolimit":
          //don't show if not active
          continue;
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

create_bottom();
?>
