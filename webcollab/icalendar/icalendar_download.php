<?php
/*
  $Id$

  (c) 2005 - 2007 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Creates a download file in the iCalendar format to RFC 2445

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//
// Send out iCalendar header
//

function icalendar_header($id ) {

  global $dtstamp;

  //get rid of some problematic system settings
  @ob_end_clean();
  @ini_set('zlib.output_compression', 'Off');

  //cache the generated timestamp (date functions are slow)
  $dtstamp = gmdate('Ymd\THis\Z');

  //these headers are for IE 6
  header('Pragma: public');
  header('Cache-Control: no-store, max-age=0, no-cache, must-revalidate');
  header('Cache-Control: post-check=0, pre-check=0', false);
  header('Cache-control: private');

  //send the headers describing the file type
  header('Content-Type: text/calendar; charset=UTF-8' );
  header('Content-Disposition: attachment; filename="'.ABBR_MANAGER_NAME.'-'.$id.'-'.date('Ymd').'-1.ics"');

  echo  "BEGIN:VCALENDAR\r\n".
        "VERSION\r\n".
        " :2.0\r\n".
        "PRODID\r\n".
        " :-//WebCollab iCalendar V1.0//EN\r\n".
        "METHOD:PUBLISH\r\n";

  return;
}

//
// Send out a vtodo set
//

function icalendar_vtodo($row) {

  global $icalendar_id, $dtstamp;

  $content = "BEGIN:VTODO\r\n".
             "UID\r\n".
             " :".$row['taskid']."-".$icalendar_id."\r\n".
             "SUMMARY\r\n".
             " :".icalendar_text_format($row['name'] )."\r\n".
             "DESCRIPTION\r\n".
             " :".icalendar_text_format($row['text'] )."\r\n".
             "CREATED;VALUE=DATE\r\n".
             " :".icalendar_date($row['created'])."\r\n".
             "LAST-MODIFIED;VALUE=DATE\r\n".
             " :".icalendar_date($row['edited'])."\r\n".
             "DUE;VALUE=DATE\r\n".
             " :".icalendar_date($row['deadline'])."\r\n".
             "DTSTAMP\r\n".
             " :".$dtstamp."\r\n".
             "DTSTART;VALUE=DATE\r\n".
             " :".icalendar_date($row['created'])."\r\n".
             "ORGANIZER;CN=\"".$row['fullname']."\"\r\n".
             " :MAILTO:".$row['email']."\r\n".
             "SEQUENCE\r\n".
             " :".$row['sequence']."\r\n";

  switch($row['status'] ) {
    case 'done':
      $case = 'COMPLETED';
      break;

    case 'active':
      $case = 'IN-PROCESS';
      break;

    case 'cantcomplete':
    case 'notactive':
      $case = 'CANCELLED';
      break;

    case 'created':
    default:
      $case = 'NEEDS-ACTION';
      break;
  }

  $content .= "STATUS\r\n".
              " :".$case."\r\n";

  switch($row['priority'] ) {
    case 0:
      $case = '9';
      break;

    case 1:
      $case = '7';
      break;

    case 3:
      $case = '3';
      break;

    case 4:
      $case = '1';
      break;

    case 2:
    default:
      $case = '5';
      break;
  }

  $content .= "PRIORITY\r\n".
              " :".$case."\r\n";

  if($row['parent'] == 0 )  {
    //project
    $content.= "CATEGORIES\r\n".
    " :Project\r\n";
    $content .= "PERCENT-COMPLETE\r\n".
                " :".intval($row['completed'])."\r\n";
  }
  else {
    //task ==> show relationships
    $content.= "CATEGORIES\r\n".
    " :Task\r\n";
    if($row['parent'] == $row['projectid'] ) {
      //task under project
      $content.= "RELATED-TO;RELTYPE=CHILD\r\n".
                 " :".$row['projectid']."-".$icalendar_id."\r\n";
    }
    else {
       //sub task
       $content.= "RELATED-TO;RELTYPE=CHILD\r\n".
                  " :".$row['parent']."-".$icalendar_id."\r\n";
    }

    $task_complete = ($row['status'] == 'done' ) ? 100 : 0;
    $content .= "PERCENT-COMPLETE\r\n".
                " :".$task_complete."\r\n";

  }

  //private
  if($row['globalaccess'] == 'f' && $row['usergroupid'] != 0 ) {
    $content.= "CLASS\r\n".
    " :PRIVATE\r\n";
  }

  $content .= "URL\r\n".
              " :".BASE_URL."\r\n".
              "END:VTODO\r\n";

  echo $content;

  return;
}

//
// End of file
//

function icalendar_end(){

  echo "END:VCALENDAR\r\n";

  return;
}

//
// Fold long lines to RFC 2445 & set to UTF-8 character set
//

function icalendar_text_format($string ) {

  //convert line breaks
  $string = strtr($string, array("\n"=>'\n' ) );

  //word wrap at 75 octets with '[space]\r\n'
  $string = wordwrap($string, 75, " \r\n", 1 );

  return $string;
}

//
// Convert database timestamp to iCalendar timestamp
//

function icalendar_date($timestamp ) {

  $date_array = explode('-', substr($timestamp, 0, 10) );

  //format is 20040803 for 3 August 2002
  $date = $date_array[0].$date_array[1].$date_array[2];

  return $date;
}

?>