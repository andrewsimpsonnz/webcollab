<?php
/*
  $Id: task_common.php 2302 2009-08-25 09:16:58Z andrewsimpson $

  (c) 2003 - 2018 Andrew Simpson <andrewnz.simpson at gmail.com>

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

  Serves some common things

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

//
// Gives back the percentage completed of this tasks's children
//
//
function percent_complete($taskid ) {

  $tasks_completed = 0;
  $total_tasks = 0;

  $q = db_prepare('SELECT task_status FROM '.PRE.'tasks WHERE projectid=? AND parent<>0' );
  db_execute($q, array($taskid ) );

  for($i=0 ; $row = @db_fetch_num($q, $i ) ; ++$i ) { 

    ++$total_tasks;

    if($row[0] == 'done'){
      ++$tasks_completed;
    }
  }

  //project with no tasks is complete
  if($total_tasks == 0 ){
    return 0;
  }

  return round(($tasks_completed / ($total_tasks ) ) * 100 );
}

//
// Show percent
//
function show_percent($percent=0 ) {

  switch($percent ) {
    case '0':
      return "<table class=\"colourbar\"><tr><td style=\"width: 100%\" class=\"redbar\"></td></tr></table>\n";
      break;

    case '100':
      return "<table class=\"colourbar\"><tr><td style=\"width: 100%\" class=\"greenbar\"></td></tr></table>\n";
      break;

    default:
      return "<table class=\"colourbar\"><tr><td style=\"width:".$percent."%\" class=\"greenbar\">".
             "</td><td style=\"width :".(100 - $percent)."%\" class=\"redbar\"></td></tr></table>\n";
      break;
  }
  return;
}

//
// Project Jump function
//
function project_jump($taskid=0) {

  global $lang, $GID;

  $content = '';

  $tail = usergroup_tail();

  //query to get the non-completed projects
  $q = db_query('SELECT id,
                        task_name,
                        globalaccess,
                        usergroupid,
                        task_owner
                        FROM '.PRE.'tasks
                        WHERE parent=0
                        AND completed<>100
                        AND archive=0'
                        .$tail.
                        'ORDER BY task_name' );

  // Prepare the form
  $content .= "<form id=\"ProjectQuickJump\" method=\"get\" action=\"tasks.php\">\n".
              "<fieldset><input type=\"hidden\" name=\"x\" value=\"".X."\" />\n".
              "<input type=\"hidden\" name=\"action\" value=\"show\" /></fieldset>\n".
              "<div><select name=\"taskid\" onchange=\"javascript:this.form.submit()\">\n".
              "<option value=\"-1\">".$lang['quick_jump']."</option>\n";

  // loop through the data
  for( $i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i ){

    $content .= "<option value=\"".$row["id"]."\"";
    if($taskid == $row['id']) {
      $content .= " selected=\"selected\"";
    }
    $content .= ">".$row['task_name']."</option>\n";
  }

  // wrap up the select and the submit
  $content .= "</select>\n".
              "<a href=\"javascript:void(document.getElementById('ProjectQuickJump').submit())\"><small>".$lang['go']."</small></a></div>\n".
              "</form>\n";

  db_free_result($q );

  //check if there were any results
  if($i == 0 ) {
    $content = '';
  }

  return $content;
}


//
// SQL tail for user access rights
//

function usergroup_tail() {

  //set the usergroup permissions on queries (Admin can see all)
  if(ADMIN ) {
    $tail = ' ';
  }
  else {
    $tail = ' AND ('.PRE.'tasks.globalaccess=\'f\' AND '.PRE.'tasks.usergroupid IN (SELECT usergroupid FROM '.PRE.'usergroups_users WHERE userid='.UID.')
              OR '.PRE.'tasks.globalaccess=\'t\'
              OR '.PRE.'tasks.usergroupid=0) ';
  }
  return $tail;
}

?>
