<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Some functions to get db <-> user and user <-> code time.

*/

//
// Create a pgsql/mysql datetime stamp
//
function date_to_datetime( $day, $month, $year ) {
  global $lang, $month_array;

  //check for valid calendar date
  if( ! checkdate( $month, $day, $year )) {
    warning( $lang["invalid_date"], sprintf( $lang["invalid_date_sprt"], $year."-".$month_array[$month - 1 ]."-".$day ) );
  }

  //pad single digits into double digits (that way nicedate() works too...)
  if( $month < 10 ) {
    $month = "0".$month;
  }

  if( $day < 10 ) {
    $day = "0".$day;
  }

  return $year."-".$month."-".$day." 00:00:00";
}

//
// Strip the UTC offset from a date variable and make it look nice
//
function nicedate( $timestamp ) {
  global $month_array;
  if( $timestamp == "" ) {
    $nicedate = "";
    return $nicedate;
  }
  $date_array = substr( $timestamp, 0, 10 );
  $date_array = explode( "-", $date_array );
  $year = $date_array[0];
  //need to force $month to be an integer to make all it work
  $month = (int)$date_array[1];
  $day = $date_array[2];
  $nicedate = $year."-".$month_array[$month - 1 ]."-".$day;
  return $nicedate;

}

//
// Strip the UTC offset from a date *and time* variable and make it look nice
//
function nicetime( $timestamp ) {
  global $month_array;

  if( $timestamp == "" ) {
    $nicetime = "";
    return $nicetime;
  }
  $time = substr( $timestamp, 11, 5 );
  $date_array = substr( $timestamp, 0, 10 );
  $date_array = explode( "-", $date_array );
  $year = $date_array[0];
  //need to force $month to be an integer to make all it work
  $month = (int)$date_array[1];
  $day = $date_array[2];
  $nicetime = $year."-".$month_array[$month - 1 ]."-".$day." ".$time;
  return $nicetime;

}

//
// Give back a row that holds the date which comes from a pg timestamp
//
function date_select_from_timestamp( $timestamp="" ) {

  if( $timestamp=="" ) {
    $temp_array[0]=date( "Y-m-d" );
  }
  else {

    //deparse the line
    $temp_array = explode( " ", $timestamp );
  }

  $date_array = explode( "-", $temp_array[0] );


  //show line
  return date_select( $date_array[2], $date_array[1], $date_array[0] );
}



//
//show a date-time selection row
//
function date_select( $day=-1, $month=-1, $year=-1 ) {
  global $month_array;

  //this is quite stupid
  if( $day   == -1 )   $day=date("d");
  if( $month == -1 ) $month=date("m");
  if( $year  == -1 )  $year=date("Y");


  //day
  $content = "<SELECT name=\"day\">\n";
  for( $i=1; $i<32 ; $i++) {
    $content .= "<OPTION value=\"".$i."\"";

    if( $day == $i ) $content .= " SELECTED";

    $content .= ">".$i."</OPTION>\n";
  }
  $content .=  "</SELECT>\n";


  //month (must be in decimal, 'cause that's what postgres uses!)
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
  $content .=  "</SELECT>\n";

 return $content;

}


?>
