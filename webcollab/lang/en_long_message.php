<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson
  
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

  Language files (long messages) for 'en' (English)

  Maintainer: Andrew Simpson <andrewnz.simpson at gmail.com>

*/


$taskgroup_info =   "<ul><li>If you delete a taskgroup all tasks belonging to it will be set to uncategorised.</li>\n".
                      "<li>You can change the name of a taskgroup without interfering with the tasks.</li>\n".
                      "<li>Two taskgroups cannot have the same name.</li></ul>\n";

$usergroup_info =   "<ul><li>If you delete a usergroup all the related private forum posts will be deleted too.</li>\n".
                      "<li>Private usergroups can only be seen by the members of that private usergroup.</li>\n".
                      "<li>You can change the name of a usergroup without interfering with the users in it.</li>\n".
                      "<li>Two usergroups cannot have the same name.</li></ul>\n";

$user_info      =    "Please select your action from the menu on the left.<br /><br />".
                      "Some quick hints:<br />".
                      "<ul>".
                      //**
                      "<li>Private users can only be seen by members of the same usergroup.</li>\n".
                      "<li>Users have two stages of deleting, the second one is permanent.</li>\n".
                      "<li>A deleted user loses all his tasks but not his forum messages.</li>\n".
                      "<li>A permanently deleted user loses all.</li>\n".
                      "<li>A deleted user keeps the record of tasks that they have seen, and will continue with that list upon revival.</li>\n".
                      "<li>ALL actions performed on a user will be emailed to the user.</li>\n".
                      "<li>Passwords are encrypted in the database. You can only set a new one.</li>\n".
                      "<li>Passwords are mailed only once to the user when set, so be careful where you mail them!</li>\n".
                      "<li>Users can edit themselves without admins knowing - this will save you time (and spam)</li>\n".
                      "</ul>\n";

?>
