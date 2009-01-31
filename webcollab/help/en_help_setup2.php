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
define('XML_LANG', "en" );

include_once(BASE."includes/screen.php" );

create_top("Help for Setup 2", 1 );

$content = "
<p><b>Database name:</b></p> 
<p>This is the name you want to use for your new WebCollab database.  A valid name might be
'webcollab', or 'my_project'.</p>
<p>Database names must be a single word (no spaces allowed), and allowed characters only.  The
allowed characters are alphabetic letters (a -z) in upper or lowercase, digits (0-9), '$' and '_'
(underscore).</p>
<p><b>Database user:</b></p>
<p>This is the database user that WebCollab will use to access the database and tables.</p>
<p>This user does needs to be able to create databases and tables. The user can be changed to a less
privileged user for production use in the next screen.</p>
<p><b>Database password:</b></p>
<p>The password for the database user.</p>
<p><b>Database type:</b></p>
<p>The dropdown box shows the types of databases available with WebCollab.</p>
<p>The 'mysql with innodb' option is recommended over 'mysql' because Innodb supports transactions
for better data security.  Be sure that your set up of MySQL does support Innodb before using this
option.</p>
<p><b>Database host:</b></p> 
<p>This is the host that your database is installed on. If this is the same machine as the
webserver, chose 'localhost'.  For remote databases, enter the IP address or fully qualified
address.</p>
<p>Note:<br />
<ul>
<li>For remote MySQL databases, make sure the database is configured to accept remote
connections.</li> 
<li>For PostgreSQL databases the value should not be changed from localhost unless the postmaster
is configured to use TCP/IP.  PostgreSQL normally uses Unix local sockets.<br />
To use remote TCP/IP connections with PostgreSQL:
<ul>
<li>Edit pg_hba.conf (PostgreSQL config file) to allow TCP/IP connections</li>
<li>Start PostgreSQL postmaster with -i option</li>
</ul>
</li>
</ul>
</p>
";
new_box("Help for Setup 2", $content );
create_bottom();
?>
