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

  Help page

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );

include_once(BASE."includes/screen.php" );
define('XML_LANG', "en" );

create_top("Help for Setup 3", 1 );

$content = "
<p><b>Site address:</b></p>
<p>This is the base URL for your WebCollab site. For example:</p>
<pre  style=\"background-color : #F2F2F2; padding-top : 0px; padding-bottom :
5px\">http://mydomain.com/webcollab/</pre>
<p>Don't forget the trailing forward slash on the end.  This is required.</p>
<p><b>Site name:</b></p>
<p>This is the name of your site and will appear on the web pages.</p>
<p>The default name is 'WebCollab'</p>
<p><b>Abbreviated site name:</b></p>
<p>This is the name of your site that will sent in the subject line of emails.<br />
The title needs to be relatively short in length to be easily read in your users' email
inboxes.</p>
<p><b>Database name:</b></p> 
<p>This is the name of your database previously set up for WebCollab.</p>
<p><b>Database user:</b></p>
<p>This is the database user that WebCollab will use to access the database and tables.</p>
<p>This user only needs to have access to read and write the WebCollab tables.  This corresponds to
privileges on a database such as SELECT, INSERT, UPDATE, and DELETE.  The other privileges can be
locked out for better security.</p>
<p><b>Database password:</b></p>
<p>The password for the database user.</p>
<p><b>Database type:</b></p>
<p>The dropdown box shows the types of databases available with WebCollab.</p>
<p>The chosen database must be the same as the database type you have created.  For a new install
the dropdown box will default to the correct value.</p>
<p><b>File location:</b></p>
<p>This is the directory where the uploaded files will be stored.  This needs to be a full
(absolute) directory path.  This is not the web address.  Examples of an absolute path are:</p>
Unix:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">/var/www/webcollab/files/filebase</pre>
Windows:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">c:\www\webcollab\files\filebase</pre>
Note:<br />
<ul>
<li>The file directory does not end with a trailing slash.</li>
<li>WebCollab will automatically convert back slashes '\' in Windows to forward slashes '/'.  This
is still readable by Windows servers, but avoids the problem that a back slash is an escape
character in PHP.</li>
<li>The filebase directory should be outside your webserver root directory to maintain file
security. (The default location given is <span style=\"text-decoration: underline\">not</span>
outside the web server root, but it does makes first-time setup easier).</li>
<li>The chosen upload file directory must be readable and writeable by the Apache web server.</li> 
</ul>
<p><b>File location:</b></p>
<p>This is the maximum size of file that can be uploaded (in bytes).</p>
<p>Note: PHP and Apache settings will override the maximum file size set here.  See the FAQ for more
information.</p>
<p><b>Language:</b></p>
<p>The language that will be used at the completion of set up.</p>
<p>Multi-byte languages (Chinese, Japanese and Korean) are only available in the Unicode version of
WebCollab.  For easy reference these languages are marked with an asterisk '*' in the drop down box.</p>
<p><b>Timezone:</b></p>
<p>Preferred timezone to be used.</p>
<p><b>Use email:</b></p>
<p>Email is high recommended for full functionality in WebCollab</p>
<p><b>SMTP Host:</b></p>
<p>WebCollab needs a SMTP host to relay email though.  The mail server can be a local, or external
machine. If this is on the same machine as the web server, the value 'localhost' (meaning this
machine) can be used.</p>
<p>The SMTP host can be a:</p>
Fully qualified address:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">mail.mydomain.com</pre>
IP Address:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">192.168.1.1</pre>
<p>WebCollab will also work with mail servers requiring SMTP AUTH.  You will need to hand edit the
<i>[webcollab]/config/config.php</i> after configuration</p> ";

new_box("Help for Setup 3", $content );
create_bottom();
?>
