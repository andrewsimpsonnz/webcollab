<?php

/*
  $Id$

  (c) 2003 - 2019 Andrew Simpson <andrewnz.simpson at gmail.com> 

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
  Refer to RFC 3207 for STARTTLS

*/

//security check
if(! defined('UID' ) ) {
  die('Direct file access not permitted' );
}

function smtp_auth($connection, $cap) {

   global $log;

   if(strpos($cap, 'AUTH' ) === false ) {
        debug('This SMTP server cannot do SMTP AUTH' );
   }

   //try plain auth
   if( ! strpos($cap, 'PLAIN' ) === false ) {
     fputs($connection, "AUTH PLAIN\r\n" );
     $log .= 'C: AUTH PLAIN'."\n";

     if(! strncmp('334', response(), 3 ) ) {
       //send username/password
       fputs($connection, base64_encode(MAIL_USER."\0".MAIL_USER."\0".MAIL_PASSWORD )."\r\n" );
       $log .= 'C: Authenticating...'."\n";
       if(! strncmp('235', response(), 3 ) ) {
         return;
       }

       $log .= 'C: Authentication failure for PLAIN AUTH'."\n";
     }
   }

   //try auth login
   if( ! strpos($cap, 'LOGIN' ) === false ) {
     fputs($connection, "AUTH LOGIN\r\n" );
     $log .= 'C: AUTH LOGIN'."\n";

     if(! strncmp('334', response(), 3 ) ) {
       //send username
       fputs($connection, base64_encode(MAIL_USER )."\r\n" );
       $log .= 'C: Sending username...'."\n";
       if(strncmp('334', response(), 3 ) ) {
         debug();
       }

       //send password
       fputs($connection, base64_encode(MAIL_PASSWORD )."\r\n" );
       $log .= 'C: Sending password...'."\n";
       if(! strncmp('235', response(), 3 ) ) {
         return;
       }

       $log .= 'C: Authentication failure for AUTH LOGIN'."\n";
       }
   }

   //try CRAM-MD5
   if( ! strpos($cap, 'CRAM-MD5' ) === false ) {
     fputs($connection, "AUTH CRAM-MD5\r\n" );
     $log .= 'C: AUTH CRAM-MD5'."\n";
     $res = response();

     if(! strncmp('334', $res, 3 ) ) {
       //$data is 'shared secret' sent by server
       $data = base64_decode(substr($res, 4 ) );
       $key = MAIL_PASSWORD;

       if(function_exists('hash_hmac' ) ) {
         //$mhash = bin2hex(mhash(MHASH_MD5, $data, $key ) );
         $mhash = hash_hmac('MD5', $data, $key );
       }
       else {
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
       }

       fputs($connection, base64_encode(MAIL_USER." ".$mhash )."\r\n" );
       $log .= 'C: Authenticating...'."\n";
       if(! strncmp('235', response(), 3 ) ) {
         return;
       }

       $log .= 'C: Authentication failure for CRAM-MD5'."\n";
     }
   }

   debug('WebCollab not able to authenticate with SMTP server' );

   return;
}

function starttls($connection, $cap ) {

  global $log;

  //check if crypto function exists...
  if(! function_exists('stream_socket_enable_crypto' ) ) {
    debug('This version of PHP cannot do STARTTLS negotiation' );
  }

  //check if server can do TLS...
  if(strpos($cap, 'STARTTLS' ) === false ) {
    debug('This SMTP server cannot do STARTTLS' );
  }

  //issue STARTTLS verb...
  fputs($connection, "STARTTLS\r\n" );
  $log .= "C: STARTTLS\n";

  if(strncmp('220', response(), 3 ) ) {
    debug();
  }

  $log .= "Starting TLS...\n";

  //start TLS negotiation
  if(! @stream_socket_enable_crypto($connection, TRUE, STREAM_CRYPTO_METHOD_TLS_CLIENT ) ) {
    debug('TLS negotiation failed' );
  }

  $log .= "C: TLS success\n"; 
  //do a new extended hello (EHLO) after successful negotiation (RFC 3207)
  fputs($connection, 'EHLO '.$_SERVER['SERVER_NAME']."\r\n" );
  $log .= 'C: EHLO '.$_SERVER['SERVER_NAME']."\n";
  $new_capability = strtoupper(response() );

  if(strncmp('250', $new_capability, 3 ) ) { 
    debug();
  }

  $log .= "C: TLS negotiation completed\n";

  return $new_capability;
}

?>
