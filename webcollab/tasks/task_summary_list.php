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

require_once("path.php" );
require_once(BASE."includes/security.php" );

include_once(BASE."tasks/task_common.php" );
include_once(BASE."includes/time.php" );

//initialise variables
$no_access_project[0] = 0;
$no_access_group[0] = 0;

//
// MAIN FUNCTION
//


function project_summary( $tail, $depth=0, $equiv="" ) {
  global $x, $uid, $gid, $admin, $lang, $task_state;
  global $no_access_project, $no_access_group;
  global $sortby;
  global $epoch;

  $q = db_query( "SELECT tasks.id AS id,
                         tasks.parent AS parent,
                         tasks.name AS taskname,
                         tasks.deadline AS deadline,
                         tasks.status AS status,
                         tasks.owner AS owner,
                         tasks.taskgroupid AS taskgroupid,
                         tasks.usergroupid AS usergroupid,
                         tasks.globalaccess AS globalaccess,
                         tasks.projectid AS projectid,
                         $epoch now() ) AS now,
                         $epoch deadline) AS due,
                         $epoch tasks.edited ) AS edited,
                         $epoch tasks.lastforumpost ) AS lastpost,
                         $epoch tasks.lastfileupload ) AS lastfileupload
                         $equiv
                         FROM tasks
                         $tail" );

  // if no result, then do nothing
  if(db_numrows($q) < 1 ) {
    return "";
  }

  //reset variables
  $result = "";

  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
    //check usergroup permissions
    if( ($admin != 1) && ($row["usergroupid"] != 0 ) && ($row["globalaccess"] == 'f' )) {
      if( ! in_array( $row["usergroupid"], (array)$gid ) )
        continue;
    }

    //don't show tasks in private usergroup projects
    if( ($admin != 1 ) && in_array($row["projectid"], (array)$no_access_project) ) {
      $key = array_search($row["projectid"], $no_access_project );
      if( ! in_array($no_access_group[$key], (array)$gid ) )
        continue;
    }

    $due = round( ($row["due"] - $row["now"])/86400 );

    $seenq = db_query( "SELECT $epoch time) FROM seen WHERE taskid=".$row["id"]." AND userid=$uid LIMIT 1" );

    if(db_numrows($seenq ) > 0 )
      $seen = db_result($seenq, 0, 0 );
    else
      $seen = 0;

    //flags column
    $alink = "<A href=\"tasks.php?x=$x&action=show&taskid=".$row["id"]."\">";

    if( (db_numrows($seenq ) ) < 1 ) {
      $f1 = $alink."C</a>";
    }
    else if( ($seen - $row["edited"] ) < 0 ) {
      $f1 = $alink."M</a>";
    }
    else {
      $f1 = "";
    }
    if( ($seen - $row["lastpost"] ) < 0 ) {
      $f2 = $alink."P</a>";
    }
    else {
      $f2 = "";
    }
    if( ($seen - $row["lastfileupload"] ) < 0 ) {
      $f3 = $alink."F</a>";
    }
    else {
      $f3 = "";
    }

    if( $due < 0 ) {
      $color = "#FF0000";
    }
    else if( $due == 0 ) {
      $color = "#006400";
    }
    else {
      $color = "";
    }

    //status column
      if( ($row["parent"] == 0 ) ) {

        switch($row["status"] ) {
          case "notactive":
            $color = "";
            $date = "";
            $status =  $task_state["task_planned"];
            break;

          case "nolimit":
            $color = "";
            $date = "";
            $status = "";
            break;

          case "cantcomplete":
            $color = "";
            $date = "";
            $status =  "<font color=\"#0000FF\">".$task_state["cantcomplete"]."</font>";
            break;

          default:
            $date = nicedate($row["deadline"] );
            if(db_result(db_query("SELECT COUNT(*) FROM tasks WHERE projectid=".$row["id"]." AND status<>'done' AND parent<>0" ), 0, 0 ) == 0 ) {
              $color = "#006400";
              $status = $task_state["done"];
            }
            else {
              $status = $lang["project"] ;
            }
            break;
        }
      }
      else {

      switch( $row["status"] ) {
        case "done":
          $color = "";
          $date = nicedate($row["deadline"] );
          $status =  "<font color=\"#006400\">".$task_state["done"]."</font>";
          break;

        case "created":
          $date = nicedate($row["deadline"] );
          $status =  $task_state["new"];
          break;

        case "active":
          $date = nicedate($row["deadline"] );
          $color = "#FFA500";
          $status =  $task_state["task_active"];
          break;

        case "notactive":
          $color = "#BEBEBE";
          $date = "";
          $status =  $task_state["task_planned"];
          break;

        case "cantcomplete":
          $color = "";
          $date = "";
          $status =  "<font color=\"#0000FF\">".$task_state["cantcomplete"]."</font>";
          break;

        default:
          $date = nicedate($row["deadline"] );
          $status =  "<font color=\"#FFA500\">".$row["status"]."</font>";
          break;
      }
  }

    //owner column
    if( $row["owner"] == 0 ) {
      switch( $row["status"] ) {
        case "created":
        case "notactive":
        case "nolimit":
           $owner = $lang["nobody"];
           break;

        default:
           $owner = "<font color=\"#FF0000\">".$lang["nobody"]."</font>";
           break;
      }
    }
    else {
      $owner = db_result(db_query("SELECT fullname FROM users WHERE id=".$row["owner"] ), 0, 0  );
      $owner = "<a href=\"users.php?x=".$x."&action=show&userid=".$row["owner"]."\">".$owner."</a>";
    }

    //group column
    switch($sortby ) {
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
      if(array_key_exists($groupname, $row ) ) {
        $group = $row[$groupname];
      }
      else
        $group = db_result(db_query("SELECT name FROM $grouptable WHERE id=".$row[$groupid] ), 0, 0 );
    }

    //Build up the page columns for display.  Starting with the flags
    $result .= "<tr><td>$f1</td><td>$f2</td><td>$f3</td><td><small>";

    if($color != "" ) {
      $result .= "<font color=\"".$color."\">";
    }

    //Add deadline column
    if ($due <= 360) {
      $result .= $date;
    } else {
      $result .= $lang["future"];
    }

    if($color != "" ) {
      $result .= "</font>";
    }

    //Then add the status, owner and group columns
    $result .= "</small></td><td>$status</td><td>$owner</td><td>$group</td><td>";

    //Tab out children tasks
    for($j=1; $j < $depth; $j++ ) $result .= "&nbsp;&nbsp;&nbsp;";

    //task column
    $result .= $alink;
    if( $row["parent"] == 0) {
      $result .= "<b>".$row["taskname"]."</b>";
      }else {
      $result .= $row["taskname"];
    }
    $result .= "</a>";

    //show graphical taskbar
    if( ($row["parent"] == 0 ) && ($depth >= 0 ) ) {
      if( ($percent_completed = round(percent_complete($row["id"] ) ) ) > 0 ) {
        $result .= "<table width=\"200\"><tr><td height=\"2\"  width=\"".($percent_completed*2)."\" bgcolor=\"#008B45\" nowrap></td><td width=\"".(200-($percent_completed*2))."\" bgcolor=\"#FFA500\" nowrap></td></tr></table>\n";
      }
      else {
        $result .= "<table width=\"200\"><tr><td height=\"2\" width=\"200\" bgcolor=\"#FFA500\" nowrap></td></tr></table>\n";
      }
    }

    $result .= "</td></tr>\n";
    if( $depth >= 0 ) {
      $result .= project_summary( "WHERE tasks.parent='".$row["id"]."' ORDER BY taskname", $depth+1 );
    }
  }

  return $result;
}

//
// MAIN PROGRAM starts here
//
if(isset($_GET["sortby"]) )
  $sortby = $_GET["sortby"];
else
  $sortby = "";

//text link for 'printer friendly' page
$content = "<font class=\"textlink\">";
if(isset($_GET["action"]) && $_GET["action"] == "summary_print" )
  $content  .= "<p>[<a href=\"tasks.php?x=$x&amp;action=summary&amp;sortby=$sortby\">"."Normal page - translate me"."</a>]</p>";
else
  $content  .= "<div align=\"right\">[<a href=\"tasks.php?x=$x&amp;action=summary_print&amp;sortby=$sortby\">"."Print version - translate me"."</a>]</div>";

$content .= "<table border=\"0\">\n";
$content .= "<tr><td colspan=\"3\"><small><a href=\"".$BASE_URL."help/".$LOCALE."_help.php#summarypage\" target=\"helpwindow\"><b>".$lang["flags"]."</b></a></small></td><td><small>";
$content .= "<a href=\"tasks.php?x=$x&amp;action=summary&amp;sortby=deadline\">";
$content .= "<b>".$lang["deadline"]."</b></a></small></td><td><small>";
$content .= "<a href=\"tasks.php?x=$x&amp;action=summary&amp;sortby=status\">";
$content .= "<b>".$lang["status"]."</b></a></small></td><td><small>";
$content .= "<a href=\"tasks.php?x=$x&amp;action=summary&amp;sortby=owner\">";
$content .= "<b>".$lang["owner"]."</b></a></small></td><td><small>";
$content .= "<a href=\"tasks.php?x=$x&amp;action=summary&amp;sortby=";

switch($sortby ) {
  case "taskgroupid":
    $content .= "usergroupid";
    break;

  case "usergroupid":
  default:
    $content .= "taskgroupid";
    break;
}

$content .= "\">";
$content .= "<b>".$lang["group"]."</b></a></small></td><td><small>";
$content .= "<a href=\"tasks.php?x=$x&amp;action=summary&amp;sortby=taskname\">";
$content .= "<b>".$lang["task"]."</b></a></small></td></tr>";

//get list of private projects and put them in an array for later use
$q = db_query("SELECT id, usergroupid FROM tasks WHERE parent=0 AND globalaccess='f'" );

for( $i=0 ; $row = @db_fetch_num($q, $i ) ; $i++) {
  $no_access_project[$i] = $row[0];
  $no_access_group[$i] = $row[1];
}

// tail end of SQL query
switch($sortby ) {
  case "deadline":
    $content .= project_summary("ORDER BY deadline,taskname", -1 );
    $suffix = $lang["by_deadline"];
    break;

  case "status":
    $content .= project_summary("ORDER BY status,deadline,taskname", -1 );
    $suffix = $lang["by_status"];
    break;

  case "owner":
    $content .= project_summary("LEFT JOIN users ON (users.id=tasks.owner) ORDER BY username,deadline,taskname", -1, ", users.fullname AS username" );
    $suffix = $lang["by_owner"];
    break;

  case "usergroupid":
    $content .= project_summary("LEFT JOIN usergroups ON (usergroups.id=tasks.usergroupid) ORDER BY usergroupname,deadline,taskname", -1, ", usergroups.name AS usergroupname" );
    $suffix = $lang["by_usergroup"];
    break;

  case "taskgroupid":
    $content .= project_summary("LEFT JOIN taskgroups ON (taskgroups.id=tasks.taskgroupid) ORDER BY taskgroupname,deadline,taskname", -1, ", taskgroups.name AS taskgroupname" );
    $suffix = $lang["by_taskgroup"];
    break;

  case "taskname":
    $content .= project_summary("ORDER BY taskname,deadline", -1 );
    $suffix = "";
    break;

  default:
    $content .= project_summary("WHERE parent=0 ORDER BY taskname", 0 );
    $suffix = "";
    break;
}

$content .= "</table><br /><br />\n";

new_box( $lang["projects"].$suffix, $content );

?>
