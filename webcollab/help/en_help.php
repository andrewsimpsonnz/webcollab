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
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/screen.php" );

create_top("Help",1);

$content = "

<BR>
<A name=\"usergroup\"><BR></A>
<B>User groups:</B><BR>
Most projects or tasks have a group of users working together in one specific area.  A Usergroup is
a group of users who share a similar work area.  Notification emails can be sent to the usergroup,
rather than just an individual user.<BR>
<BR>
Usergroups can also be used to control access.  Access can be limited to just the Usergroup; in
which case other users won't see the restricted project/task, or be able to access them.  The
access restriction can be applied at project or task level by using the \"All users can view this
task?\" checkbox.<BR>
<BR>
Where applicable, Usergroups also get their own private forum boards with each task and project.<BR>
<BR>

<A name=\"taskgroup\"><BR></A>
<B>Task groups:</B><BR>
The differences between Taskgroups and Usergroups is not easily apparent to first time users.
However the difference is marked; Usergroups control access and information flow; Taskgroups are
merely for making the task listing more readable.<BR>
<BR>
When a project grows to have a number of child tasks, the listing can appear long and not very
readable.  By putting tasks into a Taskgroup the list will be automatically grouped into
subsections (by Taskgroup) and be much more readable.  Tasks that have no Taskgroup assigned will
be grouped as Uncategorised.<BR>
<BR>
To summarise:  If no tasks in a project have a Taskgroup set, the task listing will be a long list. 
If at least one task has the Taskgroup set, all the tasks will be listed by Taskgroup.<BR>
<BR>

<A name=\"globalaccess\"><BR></A>
<B>All users can view this task?</B><BR>
This checkbox allows viewing of a task / project to be limited to the members of the selected
Usergroup only.  When the box is checked, all users can view the task / project.  Conversely, when
unchecked only members of the Usergroup can view.<BR>
<BR>
For tasks: Users not in the selected Usergroup will be able to see the Tasks in the Project listing,
but will be unable to access them.<BR>
<BR>
For projects: Users not in the selected Usergroup will not be able to see the Project or the
associated Tasks on any screen<BR>
<BR>
If no Usergroup is selected, this checkbox has no affect.<BR>
<BR> 

<A name=\"summarypage\"><BR></A>
<B>Summary page:</B><BR>
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
<BR>
<LI><B>P</B>:
indicates that a posting was made to the task's forum</LI>
<BR>
<LI><B>F</B>:
indicates that a file was uploaded for the task</LI>
</UL>
If a flag is present,
then you can click on it in order to show the associated task.</LI>
<BR>
<LI><B>Deadline</B>:
indicates when the task is due.
If the date appears in <FONT color=\"red\">red</FONT>,
then the task is overdue; 
otherwise,
If the date appears in <FONT color=\"green\">green</FONT>,
then the task is due today</LI>
<BR>
<LI><B>Status</B>:
indicates what the work status is of the item:
<UL>
<LI><B>Planned</B>:
indicates that the task was recently created,
but (purposefully) hasn't been scheduled yet</LI>
<LI><B>New</B>:
indicates that the task was recently created,
and is waiting for resources to start it</LI>
<LI><FONT color=\"blue\">On Hold</FONT>:
indicates that work on the task is halted,
awaiting some external event</LI>
<LI><FONT color=\"orange\">Active</FONT>:
indicates that the task is being worked on</LI>
<LI><FONT color=\"darkgreen\">Done</FONT>:
indicates that the task is completed</LI>
</UL>
</LI>
<BR>
<LI><B>Owner</B>: 
indicates who the task is assigned to.
You can click on the name in order to see more information about that
person.</LI>
<BR>
<LI><B>Group</B>: 
indicates either the usergroup or the taskgroup associated with the task.
If you click on this column header,
the display toggles between the two kinds of groups.</LI>
<BR>
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
