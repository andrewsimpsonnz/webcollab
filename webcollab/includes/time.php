<?php
/*
  $Id$

  (c) 2002 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com>

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

//secure variables
$month_escape = array();

//
// Create a pgsql/mysql datetime stamp
//
function date_to_datetime($day, $month, $year ) {  
  global $lang, $month_array;

  //check for valid calendar date
  if( ! checkdate($month, $day, $year ) ) {
    warning($lang['invalid_date'], sprintf($lang['invalid_date_sprt'], safe_data($year.'-'.$month_array[$month ].'-'.$day ) ) );
  }

  //format is 2004-08-02 00:00:00
    // The hour is set to 2.00am (instead of 12.00am) to accommodate config changes of +/-1 hour with daylight saving
  return sprintf('%04d-%02d-%02d 02:00:00', $year, $month, $day );
}

//
// Take a database datestamp and make it look nice
//
function nicedate($timestamp ) {
  global $FORMAT_DATE;
  
  return nice_date_time($timestamp, $FORMAT_DATE );
}

//
// Take a database timestamp and make it look nice
//
function nicetime($timestamp ) {
  global $FORMAT_DATETIME;
  
  return nice_date_time($timestamp, $FORMAT_DATETIME );
}

//
//  Format date and time for nicedate() or nicetime()
//
function nice_date_time($timestamp, $format ) {

  global $month_array, $month_escape;

  $date = date_create(substr($timestamp, 0, 19 ).sprintf(' %+03d00', TZ ) );
  //following alternative line maybe faster but needs PHP 5.3.0, or higher
  //$date = date_create_from_format('Y-m-d G:i:s O', substr($timestamp, 0, 19 ).sprintf(' %+03d00', TZ ) );

  //convert text month to chosen language
  if(strstr($format, 'M' ) ) {

    //get number of month
    $month_number = (int)(date_format($date, 'n' ) );
    
    if(isset($month_escape[($month_number)] ) ) {
      //result is cached
      $month = $month_escape[($month_number)];
    }
    else {
      //get month in chosen language and escape the text
      $month_text = $month_array[($month_number)];

      $len = mb_strlen($month_text );
      $month = '';

      for($i = 0; $i < $len; ++$i ) {
        $month .= "\\".mb_substr($month_text, $i, 1 );
      }
      
      //cache the result for possible next use
      $month_escape[($month_number)] = $month;
    }
       
    //add escaped text month into the string
    $format = str_replace('M', $month, $format );
  }
  
  //convert to date-time
  $date = date_format($date, $format );
  
  return $date;
}

//
//generate a HTML drop down box for date
//
function date_select($timestamp='', $s='' ) {
  global $lang, $month_array;

  //cache time/date now
  $now   = TIME_NOW - date('Z') + TZ * 3600;

  //filter for no date set
  if($timestamp == '' ) {
    $day   = date('d', $now );
    $month = date('m', $now );
    $year  = date('Y', $now );
  }
  else {
    //deparse the line
    $date_array = explode('-', substr($timestamp, 0, 10 ) );

    $day   = (int)$date_array[2];
    $month = (int)$date_array[1];
    $year  = (int)$date_array[0];
  }
  
  //day
  $content = "<select id=\"day\" name=\"day\" ".$s.">\n";
  for($i=1 ; $i<32 ; ++$i ) {
    $content .= "<option value=\"$i\"";

    if($day == $i )
      $content .= " selected=\"selected\"";

    $content .= ">".$i."</option>\n";
  }
  $content .=  "</select>\n";

  //month (must be in decimal, 'cause that's what postgres uses!)
  $content .= "<select id=\"month\" name=\"month\" ".$s.">\n";
  for( $i=1; $i<13 ; ++$i) {
    $content .= "<option value=\"".$i."\"";

    if($month == $i )
      $content .= " selected=\"selected\"";

    $content .= ">".$month_array[($i)]."</option>\n";
  }
  $content .=  "</select>\n";

  //year
  $min_year = date('Y', $now ) - 5;
  $max_year = date('Y', $now ) + 10;

  $content .= "<select id=\"year\" name=\"year\" ".$s.">\n";
  for($i = $min_year; $i < $max_year ; ++$i ) {
    $content .= "<option value=\"".$i."\"";

    if($year == $i )
      $content .= " selected=\"selected\"";

    $content .= ">".$i."</option>\n";
  }
  $content .=  "</select>\n";
  
  if($s == '' ) {
  
    $content .=  "<a href=\"#\" onclick=\"window.open".
                 "('calendar.php?x=".X."&amp;action=date&amp;month=".$month."&amp;year=".$year."','',".
                 "'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,dependent=yes,innerWidth=400,innerHeight=350')\" title=\"".$lang['calendar']."\">".
                 "<img src=\"images/calendar.png\" alt=\"".$lang['calendar']."\" width=\"16\" height=\"16\" /></a>\n";
  }
                 
 return $content;
}

?>
