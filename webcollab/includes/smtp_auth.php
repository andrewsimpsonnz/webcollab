<?php

/*
  $Id$

  (c) 2003 -2004 Andrew Simpson <andrew.simpson at paradise.net.nz> 
  
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

  Sends emails and preformatted emails

  ** Simplified mhash algorithm from contributed notes in PHP Manual under mhash.

  Refer to RFC 2104 for keyed hash (mhash)
  Refer to RFC 2195 for CRAM-MD5
  Refer to RFC 2554 for SMTP AUTH
  Refer to RFC 2595 for auth plain

*/


function smtp_auth($connection, $cap) {

   if(strpos($cap, "AUTH" ) === false )
        debug("SMTP server cannot do SMTP AUTH<br /><br />Capability response from SMTP server was ".nl2br($cap ) );

   //try plain auth
   if( ! strpos($cap, "PLAIN" ) === false ) {
     fputs($connection, "AUTH PLAIN\r\n" );
     $res = response();

     if($res[1] == "334" ) {
       //send username/password
       fputs($connection, base64_encode(MAIL_USER."\0".MAIL_USER."\0".MAIL_PASSWORD )."\r\n" );
       $res = response();
       if($res[1] != "235" )
         debug("Username/password not accepted SMTP server at $host for AUTH PLAIN<br /><br />Response from SMTP server was ".$res[0] );

     return;
     }
   }

   //try auth login
   if( ! strpos($cap, "LOGIN" ) === false ) {
     fputs($connection, "AUTH LOGIN\r\n" );
     $res = response();

     if($res[1] == "334" ) {
       //send username
       fputs($connection, base64_encode(MAIL_USER )."\r\n" );
       $res = response();
       if($res[1] != "334" )
         debug("Username not accepted SMTP server at $host for AUTH LOGIN<br /><br />Response from SMTP server was ".$res[0] );

       //send password
       fputs($connection, base64_encode(MAIL_PASSWORD )."\r\n" );
       $res = response();
       if($res[1] != "235" )
         debug("Password not accepted SMTP server at $host for AUTH LOGIN<br /><br />Response from SMTP server was ".$res[0] );

       return;
       }
   }

   //try CRAM-MD5
   if( ! strpos($cap, "CRAM-MD5" ) === false ) {
     fputs($connection, "AUTH CRAM-MD5\r\n" );
     $res = response();

     if($res[1] == "334" ) {
       //$data is 'shared secret' sent by server
       $data = base64_decode(substr($res[0], 4 ) );
       $key = MAIL_PASSWORD;

       //the algorithm below does mhash() without needing the external mhash library to be installed on PHP
       if(strlen($key) > 64 ){
         $key = pack("H*", md5($key) );
       }
       $key  = str_pad($key, 64, chr(0x00) );
       $ipad = str_pad('', 64, chr(0x36) );
       $opad = str_pad('', 64, chr(0x5c) );
       $k_ipad = $key ^ $ipad ;
       $k_opad = $key ^ $opad;

       $mhash = md5($k_opad.pack("H*",md5($k_ipad.$data ) ) );

       fputs($connection, base64_encode(MAIL_USER." ".$mhash )."\r\n" );
       $res = response();
       if($res[1] != "235" )
         debug("CRAM-MD5 mhash not accepted SMTP server at $host <br /><br />Response from SMTP server was ".$res[0] );

       return;
     }
   }

   debug("AUTH not accepted by SMTP server at $host <br /><br />Capability response from SMTP server was ".nl2br($cap) );

   return;
}
?>