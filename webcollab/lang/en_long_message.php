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

  Maintainer: Andrew Simpson <andrew.simpson@paradise.net.nz>

*/


$taskgroup_info = "<BR><UL><LI>If you delete a taskgroup all tasks belonging to it will be set to uncategorised.</LI>\n".
                      "<LI>You can change the name of a category without interfering with the tasks.</LI>\n".
                      "<LI>Two taskgroups cannot have the same name.</LI></UL><BR>\n";

$usergroup_info = "<BR><UL><LI>If you delete a usergroup all the related private forum posts will be deleted too.</LI>\n".
                      "<LI>You can change the name of a usergroup without interfering with the users in it.</LI>\n".
                      "<LI>Two usergroups cannot have the same name.</LI></UL><BR><BR>\n";

$user_info      = "<BR>Please select your action from the menu on the left.<BR><BR>".
                      "Some quick hints:<BR>".
                      "<UL>".
                      "<LI>Users have two stages of deleting, the second one is permanent.</LI>\n".
                      "<LI>A deleted user loses all his tasks but not his forum messages.</LI>\n".
                      "<LI>A permanently deleted user loses all.</LI>\n".
                      "<LI>You cannot permanently delete a user that still has forum items.</LI>\n".
                      "<LI>A deleted user keeps the record of tasks that they have seen, and will continue with that list upon revival.</LI>\n".
                      "<LI>ALL actions performed on a user will be emailed to the user.</LI>\n".
                      "<LI>Passwords are encrypted in the database. You can only set a new one.</LI>\n".
                      "<LI>Passwords are mailed only once to the user when set, so be careful where you mail them!</LI>\n".
                      "<LI>Users can edit themselves without admins knowing - this will save you time (and spam)</LI>\n".
                      "</UL><BR>\n";

$calendar_key    = "<I>Return to Main Menu</I></A>]</B><BR>\n".
                      "<P><B><U>Key to Calendar</U></B><BR><BR>\n".
	              "<FONT color=\"blue\">Project (with uncompleted tasks)</FONT><BR>\n".
                      "<FONT color=\"green\"><U>Project </U>(all tasks completed)</FONT><BR>\n".
                      "<FONT color=\"red\">Task (not completed)</FONT><BR>\n".
	              "<FONT color=\"green\">Task (completed)</FONT><BR>\n";

?>
