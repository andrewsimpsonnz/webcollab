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

  Help page

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, it does not make any sense to continue" );

include_once( BASE."includes/screen.php" );

create_top("Help",1);

$content = "

<BR>
<A name=\"usergroup\"><BR></A>
<B>User groups:</B><BR>
As you probably will have loads of different users (admins, developers, managers) you will find that there is a need for security. Usergroups
allow you to place users in groups and deny access based on them. Tasks can be set to only accept users from a specific group. Furthermore
if you set up a usergroup and you assign that to a task; all users in the same group as the task get a private forum on wich they can
chat without anybody seeing it. This reduces the need for 'spam' on the public list.<BR>
<BR>
A task can only belong to one group, as only 1 person can own a task. (They do not have to be the same). A user can be a member of multiple
groups and he doesn't need to switch between them as you would in unix. The user's groups are automatically checked when he enters a task.<BR>
<BR>

<A name=\"taskgroup\"><BR></A>
<B>Task groups:</B><BR>
When you get more and more tasks they probably need to be categorized in some way or another. Task groups are invented for this, you can easily
add a taskgroup and then add the task to the taskgroup. If you leave this open all tasks will be sorted on alpabet. If you select a group then
you will notice that the group has appeared in the project-task-list and that your task has been added to that group.<BR>
<BR>

<A name=\"summarypage\"><BR></A>
<B>Summary page:</B></BR>
The summary page contains six columns that concisely indicate what's going on with each task.
<UL>
<LI><B>Flags</B>:
indicates if there's something new for that task.
The possibilities are:
<UL>
<LI><B>C</B>:
indicates the task was created</LI>

<LI><B>M</B>:
indicates the task was modified</LI>

<LI><B>P</B>:
indicates that a posting was made to the task's forum</LI>

<LI><B>F</B>:
indicates that a file was uploaded for the task</LI>
</UL>
If a flag is present,
then you can click on it in order to show the associated task.<LI>

<LI><B>Deadline</B>:
indicates when the task is due.
If the date appears in <FONT color=\"red\">red</FONT>,
then the task is overdue;
otherwise,
If the date appears in <FONT color=\"green\">green</FONT>,
then the task is due today</LI>

<LI><B>Status</B>:
indicates what the work status is of the item:
<UL>
<LI><B>planned</B>:
indicates that the task was recently created,
but (purposefully) hasn't been scheduled yet</LI>

<LI><B>new</B>:
indicates that the task was recently created,
and is waiting for resources to start it</LI>

<LI><FONT color=\"blue\">blocked</FONT>:
indicates that work on the task is halted,
awaiting some external event</LI>

<LI><FONT color=\"orange\">active</FONT>:
indicates that the task is being worked on</LI>

<LI><FONT color=\"darkgreen\">done/finished</FONT>:
indicates that the task is completed</LI>
</UL>
</LI>

<LI><B>Owner</B>: 
indicates who the task is assigned to.
You can click on the name in order to see more information about that
person.</LI>

<LI><B>Group</B>: 
indicates either the usergroup or the taskgroup associated with the task.
If you click on this column header,
the display toggles between the two kinds of groups.</LI>

<LI><B>Task</B>: 
indicates the name of the task.
You can click on the name in order to see more information.</LI>
</UL>
<BR>

<BR>

";
  new_box( "Help", $content );
  create_bottom();
?>
