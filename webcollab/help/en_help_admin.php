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

  Help files for 'en' (English)

  Maintainer: Andrew Simpson <andrew.simpson@paradise.net.nz>

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, it does not make any sense to continue" );

include_once( BASE."includes/screen.php" );

create_top("Help",1);

$content = "
	<BR>
	<A name=\"admin\"><BR></A>
	<B>Admin email:</B><BR>
	This is the email address of the site admin that deals with day to day running of the site.
	<BR><BR>
	Automated emails from the site, particularly regarding users' accounts, will give this address as the person to contact.
	<BR><BR>
	This address should always be set.  If in doubt, enter your email address here!
	<BR><BR>

	<A name=\"reply\"><BR></A>
	<B>Email 'reply to':</B><BR>
	The 'reply-to' header field for emails from this site.
	<BR><BR>
	If in doubt, set the same as Admin email.
	<BR><BR>

	<A name=\"from\"><BR></A>
	<B>Email 'from':</B><BR>
	The 'from' header field for emails from the site.
	<BR><BR>
	If in doubt, set the same as Admin email.
	<BR><BR>

	<A name=\"list\"><BR></A>
	<B>Mailing list:</B><BR>
	When emails are sent to the usergroup, they will also be sent to the email addresses listed here.  This function is to
	keep Project Manager's abreast of the current status.
	<BR><BR>
	For emails to be sent to the usergroup, the 'send to usergroup' checkbox in Project/Task add (or edit), must be checked.
	This can be done by the default setting below, or by the user manually checking the box.
	<BR><BR>
	Note that users can overide the default settings by un-checking the box manually.
	<BR><BR>
	Setting a usergroup to private does not affect the mailing list.
	<BR><BR>
	";

  new_box( "Help", $content );
  create_bottom();
?>
