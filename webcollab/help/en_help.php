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

create_top("Help", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>User groups:</b></p>
<p>Most projects or tasks have a group of users working together in one specific area.  A Usergroup is
a group of users who share a similar work area.  Notification emails can be sent to the usergroup,
rather than just an individual user.</p>
<p>Usergroups can also be used to control access.  Access can be limited to just the Usergroup; in
which case other users won't see the restricted project/task, or be able to access them.  The
access restriction can be applied at project or task level by using the \"All users can view this
task?\" checkbox.</p>
<p>Where applicable, Usergroups also get their own private forum boards with each task and project.</p>
<br /> 
<a name=\"taskgroup\"></a>
<p><b>Task groups:</b></p>
<p>The differences between Taskgroups and Usergroups is not easily apparent to first time users.
However the difference is marked; Usergroups control access and information flow; Taskgroups are
merely for making the task listing more readable.</p>
<p>When a project grows to have a number of child tasks, the listing can appear long and not very
readable.  By putting tasks into a Taskgroup the list will be automatically grouped into
subsections (by Taskgroup) and be much more readable.  Tasks that have no Taskgroup assigned will
be grouped as 'Uncategorised'.</p>
<p>To summarise:  If no tasks in a project have a Taskgroup set, the task listing will be a long list.
If at least one task has the Taskgroup set, all the tasks will be listed by Taskgroup.</p>
<br />
<a name=\"globalaccess\"></a>
<p><b>All users can view this task?</b></p>
<p>This checkbox allows viewing of a task / project to be limited to the members of the selected
Usergroup only.  When the box is checked, all users can view the task / project.  Conversely, when
unchecked only members of the Usergroup can view.</p>
<p>For tasks: Users not in the selected Usergroup will be able to see the Tasks in the Project listing,
but will be unable to access them.</p>
<p>For projects: Users not in the selected Usergroup will not be able to see the Project or the
associated Tasks on any screen</p>
<p>If no Usergroup is selected, this checkbox has no affect.</p>
<a name=\"groupaccess\"><br /></a>
<p><b>Anyone in the usergroup can edit?</b></p>
<p>This checkbox allows all members of a Usergroup to edit the task / project.  When the box is
checked, all members of the Usergroup can edit this item.  If the box is unchecked, only the owner
can edit the task.</p>
<p>If no Usergroup is selected, this checkbox has no affect.</p>
<br />
<a name=\"summarypage\"></a>
<p><b>Summary page:</b></p>
<p>The summary page contains six columns that concisely indicate what's going on with each task.</p>
<ul>
<li><b>Flags</b>:
indicates if there's something new for that task.
The possibilities are:
<ul>
<li><b>C</b>:<br />
indicates the task was created<br /></li>
<li><b>M</b>:<br />
indicates the task was modified<br /></li>
<li><b>P</b>:<br />
indicates that a posting was made to the task's forum<br /></li>
<li><b>F</b>:<br />
indicates that a file was uploaded for the task<br /></li>
</ul>
If a flag is present,then you can click on it in order to show the associated task.<br /></li>
<li><b>Deadline</b>:<br />
indicates when the task is due.<br />
If the date appears in <span class=\"red\">red</span>, then the task is overdue; otherwise,
If the date appears in <span class=\"green\">green</span>,
then the task is due today<br /></li>
<li><b>Status</b>:<br />
indicates what the work status is of the item:
<ul>
<li><b>Planned</b>:<br />
indicates that the task was recently created,
but (purposefully) hasn't been scheduled yet</li>
<li><b>New</b>:<br />
indicates that the task was recently created,
and is waiting for resources to start it</li>
<li><span class=\"blue\">On Hold</span>:<br />
indicates that work on the task is halted,
awaiting some external event</li>
<li><span class=\"orange\">Active</span>:<br />
indicates that the task is being worked on</li>
<li><span class=\"green\">Done</span>:<br />
indicates that the task is completed<br /></li>
</ul>
</li>
<li><b>Owner</b>:<br />
indicates who the task is assigned to.
You can click on the name in order to see more information about that
person.<br /></li>
<li><b>Group</b>:<br />
indicates either the usergroup or the taskgroup associated with the task.
If you click on this column header,
the display toggles between the two kinds of groups.<br /></li>
<li><b>Task</b>:<br />
indicates the name of the task.
You can click on the name in order to see more information.</li>
</ul>
";
  new_box("Help", $content );
  create_bottom();
?>
