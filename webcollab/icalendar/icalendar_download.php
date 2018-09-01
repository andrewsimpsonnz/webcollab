<?php
/*
  $Id$

  (c) 2005 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  //get rid of some problematic system settings
  @ob_end_clean();
  @ini_set('zlib.output_compression', 'Off');

  //these headers are for IE 6
  header('Pragma: public');
  header('Cache-Control: no-store, max-age=0, no-cache, must-revalidate');
  header('Cache-Control: post-check=0, pre-check=0', false);
  header('Cache-control: private');

  //send the headers describing the file type
  header('Content-Type: text/calendar; charset=UTF-8' );
  header('Content-Disposition: attachment; filename="'.ABBR_MANAGER_NAME.'-'.$id.'-'.date('Ymd').'-1.ics"');

  echo  "BEGIN:VCALENDAR\r\n".
        "VERSION:2.0\r\n".
        "PRODID:-//WebCollab iCalendar ".WEBCOLLAB_VERSION."//EN\r\n".
        "CALSCALE:GREGORIAN\r\n".
        "METHOD:PUBLISH\r\n";

  return;
}

//
// Send out a VTODO or VEVENT
//

function icalendar_body($row, $taskid ) {

  //cache the generated timestamp (date functions are slow)
  global $icalendar_id, $dtstamp;

  if(VEVENT == 'Y' ) {
    $content = "BEGIN:VEVENT\r\n";
  }
  else {
    $content = "BEGIN:VTODO\r\n";
  }

  $content .= "UID:".$row['taskid']."-".$icalendar_id."\r\n".
              "SUMMARY:".icalendar_text_format($row['task_name'] )."\r\n".
              "DESCRIPTION:".icalendar_text_format($row['task_text'] )."\r\n".
              "CREATED:".icalendar_datetime($row['created_utc'])."Z\r\n".
              "LAST-MODIFIED:".icalendar_datetime($row['edited_utc'])."Z\r\n".
              "DTSTAMP:".$dtstamp."\r\n".
              "SEQUENCE:".$row['sequence']."\r\n";
              
  if($row['userid'] != 0 ) {
    $content .= "ORGANIZER;CN=\"".$row['fullname']."\"";

    if($row['email'] ) {
      $content .= ":MAILTO:".$row['email'];
    }
  }
  else {
    $content .= "ORGANIZER;CN=\" \"";
  }
  $content .= "\r\n";

  //private
  if($row['globalaccess'] == 'f' && $row['usergroupid'] != 0 ) {
    $content.= "CLASS:PRIVATE\r\n";
  }

  //priority
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

  $content .= "PRIORITY:".$case."\r\n";

  //get the specific parts for a VTODO or VEVENT
  if(VEVENT == 'Y' ) {
    $content .= icalendar_vevent($row, $taskid );
  }
  else {
    $content .= icalendar_vtodo($row, $taskid );
  }

  //echo $content;

  return $content;
}

//
// Send out a vtodo set
//

function icalendar_vtodo($row, $taskid ) {

  global $icalendar_id;

  //deadline
  $content =  "DUE;VALUE=DATE:".icalendar_date($row['deadline_date'])."\r\n".
              "DTSTART:".icalendar_datetime($row['created_utc'])."Z\r\n";

  //status
  switch($row['task_status'] ) {
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

  $content .= "STATUS:".$case."\r\n";

  if($row['parent'] == 0 )  {
    //project
    $content .= "CATEGORIES:Project\r\n";

    $content .= "PERCENT-COMPLETE:".intval($row['completed'])."\r\n";
  }
  else {
    //task ==> show relationships
    $content .= "CATEGORIES:Task\r\n";
    if($row['parent'] == $row['projectid'] ) {
      //task under project
      $content .= "RELATED-TO;RELTYPE=CHILD:".$row['projectid']."-".$icalendar_id."\r\n";
    }
    else {
       //sub task
       $content .= "RELATED-TO;RELTYPE=CHILD:".$row['parent']."-".$icalendar_id."\r\n";
    }

    $task_complete = ($row['task_status'] == 'done' ) ? 100 : 0;
    $content .= "PERCENT-COMPLETE:".$task_complete."\r\n";
  }

  //private
  if($row['globalaccess'] == 'f' && $row['usergroupid'] != 0 ) {
    $content .= "CLASS:PRIVATE\r\n";
  }

  $content .= "URL:".BASE_URL."tasks.php?action=show&taskid=".$taskid."\r\n".
              "END:VTODO\r\n";

  return $content;
}


//
// Send out a vevent set
//

function icalendar_vevent($row, $taskid ) {

  global $icalendar_id;

  //deadline
  $content = "DTSTART;VALUE=DATE:".icalendar_date($row['deadline_date'])."\r\n".
             "DTEND;VALUE=DATE:".icalendar_date($row['deadline_date_end'])."\r\n";

  //status
  switch($row['status'] ) {
    case 'done':
      $content = "STATUS:FINAL\r\n";
      break;

    case 'cantcomplete':
    case 'notactive':
      $content .= "STATUS:CANCELLED\r\n";
      break;
  }

  if($row['parent'] == 0 )  {
    //project
    $content .= "CATEGORIES:Project\r\n";
  }
  else {
    //task ==> show relationships
    $content .= "CATEGORIES:Task\r\n";
    if($row['parent'] == $row['projectid'] ) {
      //task under project
      $content .= "RELATED-TO;RELTYPE=CHILD:".$row['projectid']."-".$icalendar_id."\r\n";
    }
    else {
       //sub task
       $content .= "RELATED-TO;RELTYPE=CHILD:".$row['parent']."-".$icalendar_id."\r\n";
    }
  }

  $content .= "TRANSP:TRANSPARENT\r\n".
              "URL:".BASE_URL."tasks.php?action=show&taskid=".$taskid."\r\n".
              "END:VEVENT\r\n";

  return $content;
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

  //word wrap at 75 octets with '\r\n[space]'
  $string = wordwrap($string, 75, "\r\n ", 1 );

  return $string;
}

//
// Convert database timestamp to iCalendar timestamp
//

function icalendar_date($timestamp ) {

  //format is 20040803 for 3 August 2002 input as '2002-08-03 12:35:00'
  return strtr(substr($timestamp, 0, 10), array('-'=>'' ) ); 
}


function icalendar_datetime($timestamp ) {

  //format is 20040803T123500 for 3 August 2002 12:35am input as '2002-08-03 12:35:00'
  return strtr(substr($timestamp, 0, 19 ), array('-'=>'', ' '=>'T', ':'=>'' ) );
}

?>
