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

//set month
if( @safe_integer($_REQUEST['month']) ){
  $month = $_REQUEST['month'];
}
else {
  $month = date('n', TIME_NOW - date('Z') + TZ*60*60 );
}
//set year
if( @safe_integer($_REQUEST['year']) ){
  $year = $_REQUEST['year'];
}
else {
  $year = date('Y', TIME_NOW - date('Z') + TZ*60*60 );
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

//set upper and lower limits
$year = ($year < 2001 ) ? 2001 : $year;
$year = ($year > 2015 ) ? 2015 : $year;

$content .= "<form method=\"post\" action=\"calendar.php\">\n".
            "<fieldset><input type=\"hidden\" name=\"x\" value=\"".$x."\" />\n".
            "<input type=\"hidden\" name=\"action\" value=\"date\" /></fieldset>\n ".
            "<div style=\"text-align: center\">\n".
            "<table class=\"decoration\" style=\"margin-left: auto; margin-right: auto;\">\n".
            "<tr><td><input type=\"submit\" name=\"lastyear\" value=\"&lt;&lt;\" /></td>\n".
            "<td><input type=\"submit\" name=\"lastmonth\" value=\"&lt;\" /></td>\n".
            "<td>\n<select name=\"month\">\n";

for($i=1; $i<13 ; ++$i ) {
  $content .= "<option value=\"".$i."\"";

  if( $month == $i ){
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$month_array[($i)]."</option>\n";
}
$content .=  "</select></td>\n";

//year
$content .= "<td><select name=\"year\">\n";
for($i=2001; $i<2015 ; ++$i ) {
  $content .= "<option value=\"".$i."\"";

  if( $year == $i ) {
    $content .= " selected=\"selected\"";
  }
  $content .= ">".$i."</option>\n";
}
$content .=  "</select></td>\n".
             "<td><input type=\"submit\" value=\"".$lang['update']."\" /></td>\n".
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
  $content .= "<td class=\"weekcell\" style=\"width: 20px\"><b>$value</b></td>\n";
}
$content .= "</tr>\n";

//show lead in to dates
$content .= "<tr align=\"left\" valign=\"top\">\n";

$dayone = date("w", mktime(0, 0, 0, $month, 1, $year ) );

for ($i = 0; $i < $dayone; ++$i ) {
  $content .= "<td class=\"datecell\" style=\"height: 15px\">&nbsp;</td>\n";
}
$leadin_length = $i;

//show dates
for($num = 1; $num <= $numdays; ++$num ) {
  if($i >= 7 ) {
    $content .= "</tr>\n".
                "<tr align=\"left\" valign=\"top\">\n";
    $i=0;
  }
  $content .= "<td class=\"datecell\" style=\"height: 15px\">\n";

  //Note: This assumes the first year in dropdown box is 2001
  $content .= "<a href='#' onclick=\"dateSet(".($num-1).",".($month-1).",".($year-2001)."); window.close();\"><spanclass=\"daynum\">".$num."</span></a>".
              "</td>\n";
  ++$i;
}

//show lead out to dates
$leadout_length = (7 - ($numdays + $leadin_length ) % 7 ) % 7;
for($i = 0; $i < $leadout_length; ++$i ) {
  $content .= "<td class=\"datecell\" style=\"height: 15px\">&nbsp;</td>\n";
}

$content .= "</tr>\n".
            "</table>\n</div>\n";

new_box($lang['calendar'], $content );

?>
