<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  
  This file wriiten 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Sends emails and preformatted emails
  
  ** Parts of this code lifted from phpmailer (Chris Ryan) and from contributed notes in PHP Manual under fsockopen.
  
  Refer to RFC 821 and RFC 2045 for SMTP 
  
*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/security.php" );
include_once( BASE."includes/admin_config.php" );

function email( $to, $subject, $message) {

  global $EMAIL_FROM, $EMAIL_REPLY_TO, $USE_EMAIL, $MAIL_METHOD, $SMTP_HOST, $DOMAIN;

  if( ! valid_string($to) ) {
    //no email address specified - end function
    return;
  }
  
  if($USE_EMAIL == "N" ) {
    //email is turned off in config file
    return;
  }
    
  switch($MAIL_METHOD ) {
  
    case "mail":
	    //send message using the standard php mail() function over local sockets 
        $additional_headers = "From: ".$EMAIL_FROM."\r\n".
  	  					"Reply-To: ".$EMAIL_REPLY_TO."\r\n".
						"X-Mailer: PHP/" . phpversion()."\r\n".
						"X-Priority: 3\r\n".
						"X-Sender: ".$EMAIL_REPLY_TO."\r\n".
						"Return-Path: <".$EMAIL_REPLY_TO.">\r\n".
						"Mime-Version: 1.0\r\n".
						"Content-Type: text/plain; charset=us-ascii\r\n".
						"Content-Transfer-Encoding: 7 bit\r\n";

      if( ! mail( $to, $subject, $message, $additional_headers ) )
        debug("Email to ".to." could not be sent" );
      break;   

    case "SMTP":
      //send message using SMTP over local sockets or remote connection
      $address_list = explode( ",", $to ); 
      foreach($address_list as $email_to) { 

        //open an SMTP connection at the mail host
        $host = $SMTP_HOST;
        $connection = fsockopen ($host, 25, &$errno, &$errstr, 10);
        if (!$connection)
          debug("Unable to open SMTP connection to ".$host."<BR><BR>Error ".$errno." ".$errstr );

        //sometimes the SMTP server takes a little longer to respond
        // Windows still does not have support for this timeout function
        if(substr(PHP_OS, 0, 3) != "WIN")
          socket_set_timeout($connection, 1, 0);
 
        $res = fgets($connection, 256 );
        if(substr($res,0,3) != "220" )
          debug("Incorrect handshaking response from SMTP server at ".$host."<BR><BR>Response from SMTP server was ".$res );

        //send HELO to server
        $domain = $DOMAIN;
        fputs($connection, "HELO $domain\r\n" );
        $res = fgets($connection, 256 );
        if(substr($res,0,3) != "250" )
          debug("Incorrect HELO response from SMTP server at ".$host."<BR><BR>Response from SMTP server was ".$res );

        //evelope from
        fputs($connection, "MAIL FROM: $EMAIL_FROM\r\n" );
        $res=fgets($connection, 256 );
        if(substr($res,0,3) != "250" )
          debug("Incorrect response to MAIL FROM command from SMTP server at ".$host."<BR><BR>Response from SMTP server was ".$res );

        //envelope to
        fputs($connection, "RCPT TO: $email_to\r\n" );
        $res=fgets($connection, 256 );

        switch(substr($res,0,3) ) {
          case "250":
          case "251":
            //acceptable responses
            break;

          default:
            debug("Incorrect response to RCPT TO command from SMTP server at ".$host."<BR><BR>Response from SMTP server was ".$res );
            break;
        }

        //message
        fputs($connection, "DATA\r\n" );
        $res=fgets($connection, 256 );
        if(substr($res,0,3) != "354")
          debug("Incorrect response to DATA command from SMTP server at ".$host."<BR><BR>Response from SMTP server was ".$res );

		//generate unique message id
		$uniq_id = md5(uniqid(time()));

		$headers = "To: ".$email_to."\r\n".
 			"From: ".$EMAIL_FROM."\r\n".
  			"Reply-To: ".$EMAIL_REPLY_TO."\r\n".
			"Subject: ".$subject."\r\n".
			"Date: ".date("r")."\r\n".
			"Message-Id: <".$uniq_id."@".$domain.">\r\n".
			"X-Mailer: PHP/" . phpversion()."\r\n".
			"X-Priority: 3\r\n".
			"X-Sender: ".$EMAIL_REPLY_TO."\r\n".
			"Return-Path: <".$EMAIL_REPLY_TO.">\r\n".
			"Mime-Version: 1.0\r\n".
			"Content-Type: text/plain; charset=us-ascii\r\n".
			"Content-Transfer-Encoding: 7 bit\r\n";
  
        //send To:, From:, Subject:, other headers, blank line, message (max 998 bytes per line), and finish
        // with a period on its own line.
        fputs($connection, $headers."\r\n".$message."\r\n.\r\n" );
        $res=fgets($connection, 256 );
        if(substr($res,0,3) != "250" )
          debug("Error sending data<BR><BR>Response from SMTP server  at ".$host."was ".$res );

        //say bye bye
        fputs($connection, "QUIT\r\n" );
        $res=fgets($connection, 256 );
        if(substr($res,0,3) != "221" )
        debug("Incorrect response to QUIT request from SMTP server at ".$host."<BR><BR>Response from SMTP server was ".$res );

        fclose ($connection );
      }
      break;

    default:
      warning("Configuration error", "The email transport type ".$MAIL_METHOD." in the configuration file is not a valid type." ); 
      break;
    
    }
  return;
}
 
 function debug($error_msg ){
 
   global $DEBUG;
 
   if( $DEBUG == "Y" ) {
      //we don't use error() because email may not work!
     warning("Email error debug", $error_msg );
   }
   else{
     warning("Internal email fault", "Unable to successfully send your email.  Please contact your administrator" );
   }
   return;
 }
?>
