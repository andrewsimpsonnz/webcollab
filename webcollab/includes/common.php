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

  Serves some common things

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/screen.php" );
include_once( BASE."config.php" );
include_once( BASE."lang/language.php" );

//
// Gives back the percentage completed of this tasks's children
//
//
function percent_complete( $taskid ) {

  if( $taskid=="" )
    return;

  $tasks_completed = db_result( db_query("SELECT COUNT(*) FROM tasks WHERE parent>0 AND projectid=".$taskid." AND status='done'" ), 0, 0 );
  $total_tasks = db_result( db_query("SELECT COUNT(*) FROM tasks WHERE parent>0 AND projectid=".$taskid ), 0, 0 );

  switch ($tasks_completed ) {
    case 0: 
      return 0;
      break;

    case ($total_tasks):
      return 100;
      break;

    default: 
      return ( $tasks_completed / $total_tasks ) * 100;
      break;
  }    
}



//
// Show percent
//
function show_percent( $percent = 0 ) {
  $out = "";
  $width=400;
  $height=4;
  switch ($percent) {
    case 100:
      return "<TABLE width=\"".$width."\"><TR><TD height=\"".$height."\" width=\"".$width."\" bgcolor=\"green\" nowrap></TD></TR></TABLE>\n";
      break;
   
    case 0:
      return "<TABLE width=\"".$width."\"><TR><TD height=\"".$height."\" width=\"".$width."\" bgcolor=\"orange\" nowrap></TD></TR></TABLE>\n";
      break;
  
    default:
      $out .= "<TABLE width=\"".$width."\"><TR><TD height=\"".$height."\" width=\"".($percent * ($width/100))."\" bgcolor=\"green\" nowrap>";
      $out .= "</TD><TD width=\"".($width-($percent*($width/100)))."\" bgcolor=\"orange\" nowrap></TD></TR></TABLE>\n";
      return $out;
      break;
  }
}



//
// Ensures that all the data is code free so that a malcious user cannot
// ruin the entire site.
//
function safe_data( $body ) {

  //$body = strip_tags( $body, '<a><b><i><u>' );
  $body = htmlspecialchars( $body );

  //protect against database query attack
  if(! get_magic_quotes_gpc() )
    $body = addslashes($body);

return( $body );
}



//
// Checks if the string exists, has a value and no funny shit in it
//
function valid_string( $string ) {

  //check variable is set
  if( ! isset($string) )
    return FALSE;
  //check for empty strings
  if( strlen($string) == 0 )
    return FALSE;

  return TRUE;
}


//
// Builds up an error screen
//
function error( $box_title, $content ) {

  global $username, $useremail, $MANAGER_NAME, $EMAIL_ERROR, $EMAIL_FROM, $EMAIL_REPLY_TO, $DEBUG, $NO_ERROR, $db_error_message;

  create_top("ERROR", 1);


  if( $NO_ERROR != 1 )
    new_box( $box_title, "<CENTER>".$content."</CENTER>" );
    else
    new_box($lang["report"], "<BR>".$lang["warning"]."<BR><BR>" );


  //get the post vars
  ob_start();
  print_r( $_REQUEST );
  $post = ob_get_contents();
  ob_end_clean();


  //email to the error-catcher
  $message = "Hello,\n This is the ".$MANAGER_NAME." site and I have an error :/  \n".
             "\n\n".
	     "User that created the error: ".$username." ( ".$useremail." )\n".
	     "The erroneous component: ".$box_title."\n".
	     "The error message: ".$content."\n".
             "Database message: ".$db_error_message."\n".
             "Page that was called: ".$_SERVER["SCRIPT_NAME"]."\n".
	     "Called URL: ".$_SERVER["REQUEST_URI"]."\n".
	     "Browser: ".$_SERVER["HTTP_USER_AGENT"]."\n".
	     "Time: ".date("F j, Y, H:i")."\n".
	     "IP: ".$_SERVER["REMOTE_ADDR"]."\n".
	     "POST vars: ".$post."\n\n";

  mail( $EMAIL_ERROR,
        "ERROR on ".$MANAGER_NAME ,
	$message,
        "From: ".$EMAIL_FROM."\nReply-To: ".$EMAIL_REPLY_TO."\nX-Mailer: PHP/" . phpversion() );

  if( $DEBUG == 1)
    new_box( "Error Debug", nl2br($message) );

  create_bottom();

  //do not return as that would be futile
  die;
}


//
// Builds up a warning screen
//
function warning( $box_title, $content ) {

  create_top("Warning", 1);

  new_box( $box_title, "<BR><CENTER>".$content."</CENTER><BR>", "500" );

  create_bottom();

  //do not return as that would be futile
  die;
}

?>
