<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2003 by Andrew Simpson

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

  Email text language files for 'en' (English)

  Maintainer: Andrew Simpson <andrew.simpson@paradise.net.nz>

*/

$email_list =  "Project:  %s\n".
                "Task:     %s\n".
                "Status:   %s\n".//add to takeover
                "Owner:    %s ( %s )\n".
                "Text:\n%s\n\n".
                "Please go to the website for more details.\n\n%s\n";


$title_takeover_project  = $ABBR_MANAGER_NAME.": Your item taken over";
$title_takeover_task     = $ABBR_MANAGER_NAME.": Your item taken over";

$email_takeover_task     = "Hello,\n\nThis is the %1\$s site informing you that a task you own has been taken over by an admin on %2\$s.\n\n";
$email_takeover_project  = "Hello,\n\nThis is the %1\$s site informing you that a project you own has been taken over by an admin on %2\$s.\n\n";


$title_new_owner_project = $ABBR_MANAGER_NAME.": New project for you";
$title_new_owner_task     = $ABBR_MANAGER_NAME.": New task for you";

$email_new_owner_project = "Hello,\n\nThis is the %1\$s site informing you that a project you (now) own was changed on %2\$s.\n\nHere are the details:\n\n";
$email_new_owner_task    = "Hello,\n\nThis is the %1\$s site informing you that a task you (now) own was changed on %2\$s.\n\nHere are the details:\n\n";


$title_new_group_project = $ABBR_MANAGER_NAME.": New project: %s";
$title_new_group_task    = $ABBR_MANAGER_NAME.": New task: %s";

$email_new_group_project = "Hello,\n\nThis is the %1\$s site informing you that a new project has been created on %2\$s\n\nHere are the details:\n\n";
$email_new_group_task    = "Hello,\n\nThis is the %1\$s site informing you that a new task has been created on %2\$s\n\nHere are the details:\n\n";


$title_edit_owner_project = $ABBR_MANAGER_NAME.": Your project updated";
$title_edit_owner_task   = $ABBR_MANAGER_NAME.": Your task updated";

$email_edit_owner_project = "Hello,\n\nThis is the %1\$s site informing you that a project you own was changed on %2\$s.\n\nHere are the details:\n\n";
$email_edit_owner_task   = "Hello,\n\nThis is the %1\$s site informing you that a task you own was changed on %2\$s.\n\nHere are the details:\n\n";


$title_edit_group_project = $ABBR_MANAGER_NAME.": Project updated";
$title_edit_group_task    = $ABBR_MANAGER_NAME.": Task updated";

$email_edit_group_project = "Hello,\n\nThis is the %1\$s site informing you that a project that %2\$s owns has changed on %3\$s.\n\nHere are the details:\n\n";
$email_edit_group_task   = "Hello,\n\nThis is the %1\$s site informing you that a task that %2\$s owns has changed on %3\$s.\n\nHere are the details:\n\n";


$title_delete_project    = $ABBR_MANAGER_NAME.": Project deleted";
$title_delete_task       = $ABBR_MANAGER_NAME.": Task deleted";

$email_delete_project    = "Hello,\n\n".
                           "This is the %1\$s site informing you that a project you did own was deleted on %2\$s\n\n".
                           "Thanks for managing the project while it lasted.\n\n";
$email_delete_task       = "Hello,\n\n".
                           "This is the %1\$s site informing you that a task you did own was deleted on %2\$s\n\n".
                           "Thanks for managing the task while it lasted.\n\n";


$title_welcome      = "Welcome to the ".$ABBR_MANAGER_NAME;
$email_welcome      = "Hello,\n\nThis is the %1\$s site welcoming you to me ;) on %2\$s.\n\n".
			"As you are new here I will explain a couple of things to you so that you can quickly start to work\n\n".
			"First of all this is a project management tool, the main screen will show you the projects that are currently available. ".
			"If you click on one of the names you will find yourself in the task's part. This is where all the work will go on.\n\n".
			"Every item you post or task you edit will be shown to other users as 'new' or 'updated'. This also works vice-versa and ".
			"it enables you to quickly spot where the activity is.\n\n".
			"You can also take or get ownership of tasks and you will find yourself able to edit them and all the forum posts belonging to it. ".
			"As you progress with your work please edit your task's text and status so that everybody can keep a track on your progress. ".
			"\n\nI can only wish you success now and email %3\$s if you are stuck.\n\n --Good luck !\n\n".
			"Login:      %4\$s\n".
			"Password:   %5\$s\n\n".
			"Usergroups: %6\$s".
			"Name:       %7\$s\n".
			"Website:    %8\$s\n\n".
			"%9\$s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Edit of your account by an Admin";
$email_user_change1 = "Hello,\n\nThis is the %1\$s site informing you that your account has been changed on %2\$s by %3\$s ( %4\$s ) \n\n".
			"Login:      %5\$s\n".
			"Password:   %6\$s\n\n".
			"Usergroups: %7\$s".
			"Name:       %8\$s\n\n".
			"%9\$s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Edit of your account";
$email_user_change2 = "Hello,\n\nThis is the %1\$s site confirming that you have successfully changed your account on %2\$s\n\n".
			"Login:    %3\$s\n".
			"Password: %4\$s\n\n".
			"Name:     %5\$s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.": Edit of your account";
$email_user_change3 = "Hello,\n\nThis is the %1\$s site confirming that you have successfully changed your account on %2\$s\n\n".
			"Login:    %3\$s\n".
			"Your existing password has not changed.\n\n".
			"Name:     %4\$s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Account reactivated";
$email_revive       = "Hello,\n\nThis is the %1\$s site informing you that your account has been re-enabled on %\$2s.\n\n".
			"Loginname: %3\$s\n".
			"Username:  %4\$s\n\n".
			"We cannot send you your password because it is encrypted. \n\n".
			"If you have forgotten your password email %5\$s for a new password.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Account deactivated.";
$email_delete_user  = "Hello,\n\nThis is the %1\$s site informing you that your account has been deactivated on %2\$s\n\n".
			"We are sorry that you have left and would like to thank you for your work!\n\n".
			"If you object to being deactivated, or think that this is an error, send an email to %3\$s.";

?>
