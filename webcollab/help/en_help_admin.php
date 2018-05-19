<?php
/*
  $Id$

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

  Help files for 'en' (English)

  Maintainer: Andrew Simpson <andrewnz.simpson at gmail.com>

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "en" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>Admin email:</b></p>
	<p>This is the email address of the site admin that deals with day to day running of the site.
	</p>
	<p>Automated emails from the site, particularly regarding users' accounts, will give this address as the person to contact.
	</p>
	<p>This address should always be set.  If in doubt, enter your email address here!
	</p>
	<a name=\"reply\"></a>
	<p><b>Email 'reply to':</b></p>
	<p>The 'reply-to' header field for emails from this site.
	</p>
	<p>If in doubt, set the same as Admin email.
	</p>
	<a name=\"from\"></a>
	<p><b>Email 'from':</b></p>
	<p>The 'from' header field for emails from the site.
	</p>
	<p>If in doubt, set the same as Admin email.
	</p>
	<a name=\"list\"></a>
	<p><b>Mailing list:</b></p>
	<p>When emails are sent to the usergroup, they will also be sent to the email addresses listed here.  This function is to
	keep Project Manager's abreast of the current status.
	</p>
	<p>For emails to be sent to the usergroup, the 'send to usergroup' checkbox in Project/Task add (or edit), must be checked.</p>
	<p>This can be done by the default setting below, or by the user manually checking the box.
	</p>
	<p>Note that users can overide the default settings by un-checking the box manually.
	</p>
	<p>Setting a usergroup to private does not affect the mailing list.</p>
	";

  new_box( "Help", $content );
  create_bottom();
?>
