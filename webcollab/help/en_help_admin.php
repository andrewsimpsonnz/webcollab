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
require_once("path.php" );

include_once(BASE."includes/screen.php" );

create_top("Help",1);

$content = "
	<br />
	<a name=\"admin\"><br /></a>
	<b>Admin email:</b><br />
	This is the email address of the site admin that deals with day to day running of the site.
	<br /><br />
	Automated emails from the site, particularly regarding users' accounts, will give this address as the person to contact.
	<br /><br />
	This address should always be set.  If in doubt, enter your email address here!
	<br /><br />

	<a name=\"reply\"><br /></a>
	<b>Email 'reply to':</b><br />
	The 'reply-to' header field for emails from this site.
	<br /><br />
	If in doubt, set the same as Admin email.
	<br /><br />

	<a name=\"from\"><br /></a>
	<b>Email 'from':</b><br />
	The 'from' header field for emails from the site.
	<br /><br />
	If in doubt, set the same as Admin email.
	<br /><br />

	<a name=\"list\"><br /></a>
	<b>Mailing list:</b><br />
	When emails are sent to the usergroup, they will also be sent to the email addresses listed here.  This function is to
	keep Project Manager's abreast of the current status.
	<br /><br />
	For emails to be sent to the usergroup, the 'send to usergroup' checkbox in Project/Task add (or edit), must be checked.
	This can be done by the default setting below, or by the user manually checking the box.
	<br /><br />
	Note that users can overide the default settings by un-checking the box manually.
	<br /><br />
	Setting a usergroup to private does not affect the mailing list.
	<br /><br />
	";

  new_box( "Help", $content );
  create_bottom();
?>
