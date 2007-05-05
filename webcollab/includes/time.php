<?php
/*
  $Id$

  (c) 2002 - 2007 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------
  Based on original file written for Core Lan Org by Dennis Fleurbaaij, Andrew Simpson &
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

  Time and date display handling functions.

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//
// Create a pgsql/mysql datetime stamp
//
function date_to_datetime($day, $month, $year ) {  
  global $lang, $month_array;

  //check for valid calendar date
  if( ! checkdate($month, $day, $year ) ) {
    warning($lang['invalid_date'], sprintf($lang['invalid_date_sprt'], $year.'-'.$month_array[$month ].'-'.$day ) );
  }

  //format is 2004-08-02 00:00:00
    // The hour is set to 2.00am (instead of 12.00am) to accommodate config changes of +/-1 hour with daylight saving
  return sprintf('%04d-%02d-%02d 02:00:00', $year, $month, $day );
}

//
// Take a database datestamp and make it look nice
//
function nicedate($timestamp ) {
  global $month_array;

  if(empty($timestamp) )
    return '';

  $date_array = explode('-', substr($timestamp, 0, 10) );

  //format is 2004-Aug-02
  return $date_array[0].'-'.$month_array[(int)($date_array[1])].'-'.$date_array[2];
}

//
// Take a database timestamp and make it look nice
//
function nicetime($timestamp ) {
  global $month_array;

  if(empty($timestamp) )
    return '';

  $date_array = explode('-', substr($timestamp, 0, 10 ) );

  $time = substr($timestamp, 11, 5 );

  //format is 2004-Aug-02 18:06  +1200
  return sprintf('%s-%s-%02d %s &nbsp;&nbsp;%+03d00', $date_array[0], $month_array[(int)($date_array[1])], (int)$date_array[2], $time, TZ );
}


//
//generate a HTML drop down box for date
//
function date_select($day=-1, $month=-1, $year=-1 ) {
  global $lang, $month_array, $x;

  //filter for no date set
  if($day == -1 || $month == -1 || $year == -1 ) {
    $day   = date('d', TIME_NOW - date('Z') + TZ*60*60 );
    $month = date('m', TIME_NOW - date('Z') + TZ*60*60 );
    $year  = date('Y', TIME_NOW - date('Z') + TZ*60*60 );
  }

  //day
  $content = "<select id=\"day\" name=\"day\">\n";
  for($i=1 ; $i<32 ; ++$i ) {
    $content .= "<option value=\"$i\"";

    if($day == $i )
      $content .= " selected=\"selected\"";

    $content .= ">".$i."</option>\n";
  }
  $content .=  "</select>\n";

  //month (must be in decimal, 'cause that's what postgres uses!)
  $content .= "<select id=\"month\" name=\"month\">\n";
  for( $i=1; $i<13 ; ++$i) {
    $content .= "<option value=\"".$i."\"";

    if($month == $i )
      $content .= " selected=\"selected\"";

    $content .= ">".$month_array[($i)]."</option>\n";
  }
  $content .=  "</select>\n";

  //year
  $content .= "<select id=\"year\" name=\"year\">\n";
  for($i=2001; $i<2015 ; ++$i ) {
    $content .= "<option value=\"".$i."\"";

    if($year == $i )
      $content .= " selected=\"selected\"";

    $content .= ">".$i."</option>\n";
  }
  $content .=  "</select>\n".
               "<a href=\"#\" onclick=\"window.open".
               "('calendar.php?x=".$x."&amp;action=date&amp;month=".$month."&amp;year=".$year."','',".
               "'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,dependent=yes,innerWidth=400,innerHeight=350')\" title=\"".$lang['calendar']."\">".
               "<img src=\"images/calendar.png\" alt=\"".$lang['calendar']."\" width=\"16\" height=\"16\" /></a>\n";

 return $content;
}

//
//generate a HTML drop down box for date from a pg/my timestamp
//
function date_select_from_timestamp($timestamp='' ) {

  if($timestamp == '' )
    return date_select(-1, -1, -1 );

  //deparse the line
  $date_array = explode('-', substr($timestamp, 0, 10 ) );

  //show line
  return date_select($date_array[2], $date_array[1], $date_array[0] );
}

?>
