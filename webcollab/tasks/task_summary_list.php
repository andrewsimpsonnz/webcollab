<?php
/*
  
  $Id$

  WebCollab
  ---------------------------------------
  Created 2002 by Marshall Rose
  with much help from the people noted in the README

  Rewritten from Version 1.11 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Lists all tasks in a quick summary fashion

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/time.php" );

//
// MAIN FUNCTION
//


function project_summary( $tail, $depth=0, $equiv="" ) {
  global $x, $uid, $admin, $BASE_URL, $lang, $task_state;
  global $sortby;
  global $epoch;
  
  $usergroup[0] = 0;

  $q = db_query( "SELECT tasks.id AS id,
                         tasks.parent AS parent,
                         tasks.name AS taskname,
                         tasks.deadline AS deadline,
                         tasks.status AS status,
                         tasks.owner AS owner,
                         tasks.taskgroupid AS taskgroupid,
                         tasks.usergroupid AS usergroupid,
                         tasks.globalaccess AS globalaccess,
                         ".$epoch."now() ) AS now,
                         ".$epoch."deadline) AS due,
                         ".$epoch."tasks.edited ) AS edited,
                         ".$epoch."tasks.lastforumpost ) AS lastpost,
                         ".$epoch."tasks.lastfileupload ) AS lastfileupload "
                         .$equiv.
                         " FROM tasks
                         ".$tail );

  // if no result, then do nothing
  if( db_numrows($q) < 1 ) {
    return "";
  }

  //get usergroups of user, and put them in a simple array for later use
  $usergroup_q = db_query("SELECT usergroupid FROM usergroups_users WHERE userid=".$uid );
  for( $i=0 ; $usergroup_row = @db_fetch_num($usergroup_q, $i ) ; $i++) {
    $usergroup[$i] = $usergroup_row[0];
  }

  //reset variables
  $result = "";

  //check user permissions
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
    if( ($admin!=1) && ($row["usergroupid"]!=0 ) && ($row["globalaccess"]=='f' )) {
      if( ! in_array( $row["usergroupid"], $usergroup ) ) {
        continue;
      }
    }

    $due = round( ($row["due"] - $row["now"])/86400 );

    $seenq = db_query( "SELECT ".$epoch."time) FROM seen WHERE taskid=".$row["id"]." AND userid=".$uid." LIMIT 1" );

    if( db_numrows( $seenq ) > 0 )
      $seen = db_result( $seenq, 0, 0 );
    else
      $seen = 0;

    //flags column
    $alink = "<A href=\"tasks.php?x=".$x."&action=show&taskid=".$row["id"]."\">";

    if( ( db_numrows( $seenq ) ) < 1 ) {
      $f1 = $alink."C</A>";
    }
    else if( ($seen - $row["edited"]) < 0 ) {
      $f1 = $alink."M</A>";
    }
    else {
      $f1 = "";
    }
    if( ($seen - $row["lastpost"]) < 0 ) {
      $f2 = $alink."P</A>";
    }
    else {
      $f2 = "";
    }
    if( ($seen - $row["lastfileupload"]) < 0 ) {
      $f3 = $alink."F</A>";
    }
    else {
      $f3 = "";
    }

    if( $due < 0 ) {
      $color = "#FF0000";
    }
    else if( $due == 0 ) {
      $color = "#00640";
    }
    else {
      $color = "";
    }

    //status column
      if( ($row["parent"] == 0 ) ) {

        switch( $row["status"] ) {
          case "notactive":
	    $color = "";
            $status =  $task_state["task_planned"];
            break;

          case "cantcomplete":
	    $color = "";
            $status =  "<FONT color=\"#0000FF\">".$task_state["cantcomplete"]."</FONT>";
            break;

	  default:
	    if(db_result( db_query( "SELECT COUNT(*) FROM tasks WHERE projectid=".$row["id"]." AND status<>'done' AND parent<>0" ), 0, 0 ) == 0 ) {
	      $color = "#00640";
	      $status = $task_state["done"];
	    }
	    else {	
	      $status = $lang["pproject"];
	    }
	    break;
	}    
      }
      else {

      switch( $row["status"] ) {
        case "done":
          $color = "";
          $status =  "<FONT color=\"#006400\">".$task_state["done"]."</FONT>";
          break;

        case "created":
          $status =  $task_state["new"];
          break;
	  
        case "active":
          $color = "#FFA500";
          $status =  $task_state["task_active"];
          break;
	  
        case "notactive":
          $color = "#BEBEBE";
          $status =  $task_state["task_planned"];
          break;

        case "cantcomplete":
	  $color = "";
          $status =  "<FONT color=\"#0000FF\">".$task_state["cantcomplete"]."</FONT>";
          break;

        default:
          $status =  "<FONT color=\"#FFA500\">".$row["status"]."</FONT>";
          break;
      }
  }

    //owner column
    if( $row["owner"] == 0 ) {
      switch( $row["status"] ) {
        case "created":
        case "notactive":
           $owner = $lang["nobody"];
           break;

        default:
           $owner = "<FONT color=\"#FF0000\">".$lang["nobody"]."</FONT>";
           break;
      }
    }
    else {
      $owner = db_result( db_query("SELECT fullname FROM users WHERE id=".$row["owner"] ), 0, 0  );
      $owner = "<A href=\"".$BASE_URL."users.php?x=".$x."&action=show&userid=".$row["owner"]."\">".$owner."</A>";
    }

    //group column
    switch( $sortby ) {
      case "taskgroupid":
        $grouptable = "taskgroups";
        $groupid = "taskgroupid";
        $groupname = "taskgroupname";
        break;

      case "usergroupid":
      default:
        $grouptable = "usergroups";
        $groupid = "usergroupid";
        $groupname = "usergroupname";
        break;
    }

    if( ($row[$groupid]== 0 ) || ($row[$groupid]=="" ) ) {
      $group = $lang["none"];
    }
    else {
      if( array_key_exists( $groupname, $row ) ) {
        $group = $row[$groupname];
      }
      else
        $group = db_result( db_query("SELECT name FROM ".$grouptable." WHERE id=".$row[$groupid] ), 0, 0 );
    }

    //Build up the page columns for display.  Starting with the flags
    $result .= "<TR><TD>".$f1."</TD><TD>".$f2."</TD><TD>".$f3."</TD><TD><SMALL>";

    if( $color != "" ) {
      $result .= "<FONT color=\"".$color."\">";
    }

    //Add deadline column
    if ($due <= 360) {
      $result .= nicedate( $row["deadline"] );
    } else {
      $result .= $lang["future"];
    }

    if( $color != "" ) {
      $result .= "</FONT>";
    }

    //Then add the status, owner and group columns
    $result .= "</SMALL></TD><TD>".$status."</TD><TD>".$owner."</TD><TD>".$group."</TD><TD>";

    //Tab out children tasks
    for($j=1; $j < $depth; $j++ ) $result .= "&nbsp;&nbsp;&nbsp;";

    //task column
    $result .= $alink;
    if( $row["parent"] == 0) {
      $result .= "<B>".$row["taskname"]."</B>";
      }else {
      $result .= $row["taskname"];
    }
    $result .= "</A>";

    //show graphical taskbar
    if( ($row["parent"] == 0 ) && ( $depth >= 0 )) {
      if( ($percent_completed = round(percent_complete($row["id"]))) > 0 ) {
        $result .= "<TABLE width=\"200\"><TR><TD height=\"2\"  width=\"".($percent_completed*2)."\" bgcolor=\"#008B45\" nowrap></TD><TD width=\"".(200-($percent_completed*2))."\" bgcolor=\"#FFA500\" nowrap></TD></TR></TABLE>\n";
      }
      else {
        $result .= "<TABLE width=\"200\"><TR><TD height=\"2\" width=\"200\" bgcolor=\"#FFA500\" nowrap></TD></TR></TABLE>\n";
      }
    }

    $result .= "</TD></TR>\n";
    if( $depth >= 0 ) {
      $result .= project_summary( "WHERE tasks.parent='".$row["id"]."' ORDER BY taskname", $depth+1 );
    }
  }

  return $result;
}

//
// MAIN PROGRAM starts here
//

$content  = "<TABLE border=\"0\">\n";
$content .= "<TR><TD colspan=\"3\"><SMALL><A href=\"".$BASE_URL."help/".$LOCALE."_help.php#summarypage\" target=\"helpwindow\"><B>".$lang["flags"]."</B></A></SMALL></TD><TD><SMALL>";
$content .= "<A href=\"tasks.php?x=".$x."&action=summary&sortby=deadline\">";
$content .= "<B>".$lang["deadline"]."</B></A></SMALL></TD><TD><SMALL>";
$content .= "<A href=\"tasks.php?x=".$x."&action=summary&sortby=status\">";
$content .= "<B>".$lang["status"]."</B></A></SMALL></TD><TD><SMALL>";
$content .= "<A href=\"tasks.php?x=".$x."&action=summary&sortby=owner\">";
$content .= "<B>".$lang["owner"]."</B></A></SMALL></TD><TD><SMALL>";
$content .= "<A href=\"tasks.php?x=".$x."&action=summary&sortby=";

if( isset($_GET["sortby"]) ) $sortby = $_GET["sortby"];
  else $sortby = "";

switch( $sortby ) {
  case "taskgroupid":
    $content .= $lang["usergroupid"];
    break;

  case "usergroupid":
  default:
    $content .= $lang["taskgroupid"];
    break;
}

$content .= "\">";
$content .= "<B>".$lang["group"]."</B></A></SMALL></TD><TD><SMALL>";
$content .= "<A href=\"tasks.php?x=".$x."&action=summary&sortby=taskname\">";
$content .= "<B>".$lang["ttask"]."</B></A></SMALL></TD></TR>";
$suffix = " (by ".$sortby.")";

// tail end of SQL query
switch( $sortby ) {
  case "deadline":
    $content .= project_summary( "ORDER BY deadline,taskname", -1 );
    break;

  case "status":
    $content .= project_summary( "ORDER BY status,deadline,taskname", -1 );
    break;

  case "owner":
    $content .= project_summary( "LEFT JOIN users ON (users.id=tasks.owner) ORDER BY username,deadline,taskname", -1, ", users.fullname AS username" );
    break;

  case "usergroupid":
    $content .= project_summary( "LEFT JOIN usergroups ON (usergroups.id=tasks.usergroupid) ORDER BY usergroupname,deadline,taskname", -1, ", usergroups.name AS usergroupname" );
    $suffix = $lang["by_usergroup"];
    break;

  case "taskgroupid":
    $content .= project_summary( "LEFT JOIN taskgroups ON (taskgroups.id=tasks.taskgroupid) ORDER BY taskgroupname,deadline,taskname", -1, ", taskgroups.name AS taskgroupname" );
    $suffix = $lang["by_taskgroup"];
    break;

  case "taskname":
    $content .= project_summary( "ORDER BY taskname,deadline", -1 );
    $suffix = "";
    break;

  default:
    $content .= project_summary( "WHERE parent=0 ORDER BY taskname", 0 );
    $suffix = "";
    break;
}

$content .= "</TABLE>\n";

new_box( $lang["projects"].$suffix, $content );

?>
