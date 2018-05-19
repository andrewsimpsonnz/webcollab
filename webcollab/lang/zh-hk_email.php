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

  Maintainer: Andrew Simpson <andrewnz.simpson at gmail.com>


  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post        = ABBR_MANAGER_NAME.": New file upload: %s";
$email_file_post        = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new file has been uploaded on ".$email_date." by %1\$s.\n\n".
                          "File:        %2\$s\n".
                          "Description: %3\$s\n\n".
                          "Project:     %4\$s\n".
                          "Task:        %5\$s\n\n".
                          "Please go to the website for more details.\n\n".BASE_URL."%6\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": New forum post: %s";
$email_forum_post        = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s:\n\n%2\$s\n\n".
                           "Please go to the website for more details.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply       = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s.\n\n".
                           "This post is in reply to an earlier post by %2\$s.\n\n".
                           "Original post:\n%3\$s\n\n".
                           "New reply:\n%4\$s\n\n".
                           "Please go to the website for more details.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Project:  %1\$s\n".
               "Task:     %2\$s\n".
               "Status:   %3\$s\n".
               "Owner:    %4\$s ( %5\$s )\n".
               "Text:\n%6\$s\n\n".
               "Please go to the website for more details.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project  = ABBR_MANAGER_NAME.": Your project taken over";
$title_takeover_task     = ABBR_MANAGER_NAME.": Your task taken over";

$email_takeover_task     = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task you own has been taken over by an admin on ".$email_date.".\n\n";
$email_takeover_project  = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project you own has been taken over by an admin on ".$email_date.".\n\n";


$title_new_owner_project = ABBR_MANAGER_NAME.": New project for you";
$title_new_owner_task     = ABBR_MANAGER_NAME.": New task for you";

$email_new_owner_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project was created on ".$email_date.", and you are the owner of that project.\n\nHere are the details:\n\n";
$email_new_owner_task    = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task was created on ".$email_date.", and you are the owner of that task.\n\nHere are the details:\n\n";


$title_new_group_project = ABBR_MANAGER_NAME.": New project: %s";
$title_new_group_task    = ABBR_MANAGER_NAME.": New task: %s";

$email_new_group_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new project has been created on ".$email_date."\n\nHere are the details:\n\n";
$email_new_group_task    = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new task has been created on ".$email_date."\n\nHere are the details:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Your project updated";
$title_edit_owner_task   = ABBR_MANAGER_NAME.": Your task updated";

$email_edit_owner_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project you own was changed on ".$email_date.".\n\nHere are the details:\n\n";
$email_edit_owner_task   = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task you own was changed on ".$email_date.".\n\nHere are the details:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Project updated";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Task updated";

$email_edit_group_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project that %s owns has changed on ".$email_date.".\n\nHere are the details:\n\n";
$email_edit_group_task   = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task that %s owns has changed on ".$email_date.".\n\nHere are the details:\n\n";


$title_delete_project    = ABBR_MANAGER_NAME.": Project deleted";
$title_delete_task       = ABBR_MANAGER_NAME.": Task deleted";

$email_delete_project    = "Hello,\n\n".
                           "This is the ".MANAGER_NAME." site informing you that a project you did own was deleted on ".$email_date."\n\n".
                           "Thanks for managing the project while it lasted.\n\n";
$email_delete_task       = "Hello,\n\n".
                           "This is the ".MANAGER_NAME." site informing you that a task you did own was deleted on ".$email_date."\n\n".
                           "Thanks for managing the task while it lasted.\n\n";

$delete_list = "Project: %1\$s\n".
                "Task:   %2\$s\n".
                "Status: %3\$s\n\n".
                "Text:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
                            "The members of the new usergroup are:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
                            "The members of the usergroup are:\n".
                            "%2\$s\n";

$title_welcome      = "Welcome to the ".ABBR_MANAGER_NAME;
$email_welcome      = "Hello,\n\nThis is the ".MANAGER_NAME." site welcoming you to me ;) on ".$email_date.".\n\n".
			"As you are new here I will explain a couple of things to you so that you can quickly start to work\n\n".
			"First of all this is a project management tool, the main screen will show you the projects that are currently available. ".
			"If you click on one of the names you will find yourself in the task's part. This is where all the work will go on.\n\n".
			"Every item you post or task you edit will be shown to other users as 'new' or 'updated'. This also works vice-versa and ".
			"it enables you to quickly spot where the activity is.\n\n".
			"You can also take or get ownership of tasks and you will find yourself able to edit them and all the forum posts belonging to it. ".
			"As you progress with your work please edit your task's text and status so that everybody can keep a track on your progress. ".
			"\n\nI can only wish you success now and email ".EMAIL_ADMIN." if you are stuck.\n\n --Good luck !\n\n".
			"Login:      %1\$s\n".
			"Password:   %2\$s\n\n".
			"Usergroups: %3\$s".
			"Name:       %4\$s\n".
			"Website:    ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": Edit of your account by an Admin";
$email_user_change1 = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that your account has been changed on ".$email_date." by %1\$s ( %2\$s ) \n\n".
			"Login:      %3\$s\n".
			"Password:   %4\$s\n\n".
			"Usergroups: %5\$s".
			"Name:       %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": Edit of your account";
$email_user_change2 = "Hello,\n\nThis is the ".MANAGER_NAME." site confirming that you have successfully changed your account on ".$email_date.".\n\n".
			"Login:    %1\$s\n".
			"Password: %2\$s\n\n".
			"Name:     %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": Edit of your account";
$email_user_change3 = "Hello,\n\nThis is the ".MANAGER_NAME." site confirming that you have successfully changed your account on ".$email_date.".\n\n".
			"Login: %1\$s\n".
			"Your existing password has not changed.\n\n".
			"Name:  %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": Account reactivated";
$email_revive       = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that your account has been re-enabled on ".$email_date.".\n\n".
			"Loginname: %1\$s\n".
			"Username:  %2\$s\n\n".
			"We cannot send you your password because it is encrypted. \n\n".
			"If you have forgotten your password email ".EMAIL_ADMIN." for a new password.";



$title_delete_user  = ABBR_MANAGER_NAME.": Account deactivated.";
$email_delete_user  = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that your account has been deactivated on ".$email_date.".\n".
			"We are sorry that you have left and would like to thank you for your work!\n\n".
			"If you object to being deactivated, or think that this is an error, send an email to ".EMAIL_ADMIN.".";

?>
