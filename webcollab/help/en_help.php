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
require_once("path.php" );

include_once( BASE."includes/screen.php" );

create_top("Help",1);

$content = "

<br />
<a name=\"usergroup\"><br /></a>
<b>User groups:</b><br />
Most projects or tasks have a group of users working together in one specific area.  A Usergroup is
a group of users who share a similar work area.  Notification emails can be sent to the usergroup,
rather than just an individual user.<br />
<br />
Usergroups can also be used to control access.  Access can be limited to just the Usergroup; in
which case other users won't see the restricted project/task, or be able to access them.  The
access restriction can be applied at project or task level by using the \"All users can view this
task?\" checkbox.<br />
<br />
Where applicable, Usergroups also get their own private forum boards with each task and project.<br />
<br />

<a name=\"taskgroup\"><br /></a>
<b>Task groups:</b><br />
The differences between Taskgroups and Usergroups is not easily apparent to first time users.
However the difference is marked; Usergroups control access and information flow; Taskgroups are
merely for making the task listing more readable.<br />
<br />
When a project grows to have a number of child tasks, the listing can appear long and not very
readable.  By putting tasks into a Taskgroup the list will be automatically grouped into
subsections (by Taskgroup) and be much more readable.  Tasks that have no Taskgroup assigned will
be grouped as Uncategorised.<br />
<br />
To summarise:  If no tasks in a project have a Taskgroup set, the task listing will be a long list. 
If at least one task has the Taskgroup set, all the tasks will be listed by Taskgroup.<br />
<br />

<a name=\"globalaccess\"><br /></a>
<b>All users can view this task?</b><br />
This checkbox allows viewing of a task / project to be limited to the members of the selected
Usergroup only.  When the box is checked, all users can view the task / project.  Conversely, when
unchecked only members of the Usergroup can view.<br />
<br />
For tasks: Users not in the selected Usergroup will be able to see the Tasks in the Project listing,
but will be unable to access them.<br />
<br />
For projects: Users not in the selected Usergroup will not be able to see the Project or the
associated Tasks on any screen<br />
<br />
If no Usergroup is selected, this checkbox has no affect.<br />
<br /> 

<a name=\"groupaccess\"><br /></a>
<b>Anyone in the usergroup can edit?</b><br />
This checkbox allows all members of a Usergroup to edit the task / project.  When the box is
checked, all members of the Usergroup can edit this item.  If the box is unchecked, only the owner
can edit the task.<br />
<br />
If no Usergroup is selected, this checkbox has no affect.<br />
<br /> 

<a name=\"summarypage\"><br /></a>
<b>Summary page:</b><br />
The summary page contains six columns that concisely indicate what's going on with each task.
<ul>
<li><b>Flags</b>:
indicates if there's something new for that task.
The possibilities are:
<ul>
<li><b>C</b>:
indicates the task was created</li>

<li><b>M</b>:
indicates the task was modified</li>
<br />
<li><b>P</b>:
indicates that a posting was made to the task's forum</li>
<br />
<li><b>F</b>:
indicates that a file was uploaded for the task</li>
</UL>
If a flag is present,
then you can click on it in order to show the associated task.</li>
<br />
<li><b>Deadline</b>:
indicates when the task is due.
If the date appears in <font color=\"red\">red</font>,
then the task is overdue; 
otherwise,
If the date appears in <font color=\"green\">green</font>,
then the task is due today</li>
<br />
<li><b>Status</b>:
indicates what the work status is of the item:
<ul>
<li><b>Planned</b>:
indicates that the task was recently created,
but (purposefully) hasn't been scheduled yet</li>
<li><b>New</b>:
indicates that the task was recently created,
and is waiting for resources to start it</li>
<li><font color=\"blue\">On Hold</font>:
indicates that work on the task is halted,
awaiting some external event</li>
<li><font color=\"orange\">Active</font>:
indicates that the task is being worked on</li>
<li><font color=\"darkgreen\">Done</font>:
indicates that the task is completed</li>
</UL>
</li>
<br />
<li><b>Owner</b>: 
indicates who the task is assigned to.
You can click on the name in order to see more information about that
person.</li>
<br />
<li><b>Group</b>: 
indicates either the usergroup or the taskgroup associated with the task.
If you click on this column header,
the display toggles between the two kinds of groups.</li>
<br />
<li><b>Task</b>: 
indicates the name of the task.
You can click on the name in order to see more information.</li>
</UL>
<br />

<br />

";
  new_box( "Help", $content );
  create_bottom();
?>
