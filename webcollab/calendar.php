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

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/screen.php" );

create_top( $lang["calendar"], 1 );

//secure variables
$content = "";
$usergroup[0] = 0;

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

//get usergroups of user, and put them in a simple array for later use
$usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
for( $i=0 ; $row = @db_fetch_num($usergroup_q, $i ) ; $i++) {
  $usergroup[$i] = $row[0];
}

//set up form for user input
$content .= "<BR><DIV align=\"center\">\n";
$content .= "<FORM method=\"POST\" action=\"calendar.php\">";
//month (must be in decimal, 'cause that's what database uses!)
$content .= "<SELECT name=\"month\">\n";
for( $i=1; $i<13 ; $i++) {
  $content .= "<OPTION value=\"".$i."\"";

  if( $month == $i ) $content .= " SELECTED";
  //use ($i-1) because array starts at zero
  $content .= ">".$month_array[($i-1)]."</OPTION>\n";
  }
$content .=  "</SELECT>\n";

//year
$content .= "<SELECT name=\"year\">\n";
for( $i=2001; $i<2011 ; $i++) {
  $content .= "<OPTION value=\"".$i."\"";

  if( $year == $i ) $content .= " SELECTED";
  $content .= ">".$i."</OPTION>\n";
  }
$content .=  "</SELECT>\n".
             "<INPUT type=\"hidden\" name=\"x\" value=\"".$x."\">\n".
             "<INPUT type=\"submit\" value=\"Change\">\n".
             "</FORM>\n<BR>\n";

//number of days in month
$numdays = date("t",mktime(0,0,0,$month,1,$year));

//main calendar table
$content .= "<TABLE border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"97%\">\n<TR>\n";
$content .= "<TD colspan=\"7\" valign=\"middle\" align=\"center\"><B>".date("F",mktime(0,0,0,$month,1,$year))."</B>\n</TD>\n";
$content .= "</TR>\n";

//weekdays
$content .= "<TR valign=\"middle\" align=\"center\">\n";
foreach($week_array as $value) {
  $content .= "<TD width=\"13.86%\"><B>".$value."</B></TD>\n";
}
$content .= "</TR>\n";

//show lead in to dates
$content .= "<TR valign=\"top\" align=\"center\">\n";
for ($i = 0; $i < $dayone = date("w",mktime(0,0,0,$month,1,$year)); $i++) {
  $content .= "<TD>&nbsp;</TD>\n";
}

//show dates
for ($num = 1; $num <= $numdays; $num++) {
  if ($i >= 7) {
    $content .= "</TR>\n".
                "<TR valign=\"top\" align=\"center\">\n";
    $i=0;
  }
  $content .= "<TD ";

  //highlight today
  if($num == $today)
    $content .= "bgcolor=\"#C0C0C0\"";

  $content .= ">".$num."<BR>";
  $pad = 0;

  //search for tasks on this date
  $q = db_query( "SELECT id, name, parent, status, usergroupid, globalaccess FROM tasks WHERE deadline='".$year."-".$month."-".$num."'" );

  if( db_numrows($q) > 0 ) {
    for( $j=0 ; $row = @db_fetch_array($q, $j ) ; $j++) {

      //check for private usergroups
      if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' ) ) {

	if( ! in_array( $row["usergroupid"], $usergroup ) )
          continue;
      }

      switch( $row["parent"]) {

        case "0":
	  //project
	  if( db_result( db_query( "SELECT COUNT(*) FROM tasks WHERE projectid=".$row["id"]." AND status<>'done' AND parent>0" ), 0, 0 ) == 0 )
            $name = "<FONT color=\"green\"><U>".$row["name"]."</U>";
	  else
	    $name = "<FONT color=\"blue\">".$row["name"];
	  break;

        default:
          //task
          if( $row["status"] == "done" )
            $name = "<FONT color=\"green\">".$row["name"];
          else
            $name = "<FONT color=\"red\">".$row["name"];
	  break;
      }
      $content .= "<A href=\"tasks.php?x=".$x."&action=show&taskid=".$row["id"]."\">".$name."</FONT></A><BR>\n";
      $pad++;
    }
  }
  //pad out the cells to the required depth
  while( $pad < 5 ) {
    $content .= "<BR>";
    $pad++;
  }

  $content .= "</TD>\n";
  $i++;
}
$content .= "</TR>\n";
$content .= "</TABLE>\n<BR>\n";

include_once( BASE."lang/".$LOCALE."_long_message.php" );
$content .= "<B>[<A href=\"main.php?x=".$x."\">".$calendar_key."<BR>\n</DIV>\n";

new_box( $lang["calendar"], $content );

create_bottom();
?>
