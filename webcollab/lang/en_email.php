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

$title_takeover     = $ABBR_MANAGER_NAME.": Your item taken over";
$email_takeover     = "Hello,\n\nThis is the %s site informing you that a %s you own has been taken over by an admin on %s.\n\n".
			"Project:  %s\n".
			"Task:     %s\n".
			"Owner:    %s ( %s )\n".
			"Text:\n%s\n\n".
			"Please go to the website for more details.\n\n%s\n";

$title_new_owner    = $ABBR_MANAGER_NAME.": New %s for you";
$email_new_owner    = "Hello,\n\nThis is the %s site informing you that a %s you (now) own was changed on %s.\n\nHere are the details:\n\n".
			"Project:  %s\n".
			"Task:     %s\n".
			"Status:   %s\n\n".
			"Text: \n%s\n\n".
			"Please go to the website for more details.\n\n%s\n";


$title_new_group    = $ABBR_MANAGER_NAME.": New %s: ";
$email_new_group    = "Hello,\n\nThis is the %s site informing you that a new %s has been created on %s\n\nHere are the details:\n\n".
			"Project:  %s\n".
			"Task:     %s\n".
			"Owner:    %s\n".
			"Status:   %s\n\n".
			"Text:\n%s\n\n".
			"Please go to the website for more details.\n\n%s\n";

$title_edit_owner   = $ABBR_MANAGER_NAME.": Your %s updated";
$email_edit_owner   ="Hello,\n\nThis is the %s site informing you that a %s you own was changed on %s.\n\nHere are the details:\n\n".
			"Project:  %s\n".
			"Task:     %s\n".
			"Status:   %s\n\n".
			"Text: \n%s\n\n".
			"Please go to the website for details.\n\n%s\n";


$title_edit_group   = $ABBR_MANAGER_NAME.": %s updated";
$email_edit_group   = "Hello,\n\nThis is the %s site informing you that a %s that %s owns has changed on %s.\n\nHere are the details:\n\n".
			"Project:  %s\n".
			"Task:     %s\n".
			"Status:   %s\n\n".
			"Text: \n%s\n\n".
			"Please go to the website for details.\n\n%s\n";


$title_delete_task  = $ABBR_MANAGER_NAME.": %s deleted";
$email_delete_task  = "Hello,\n\n".
			"This is the %s site informing you that a %s you did own was deleted on %s\n\n".
			"Project:  %s\n".
			"Task:     %s\n".
			"Status:   %s\n\n".
			"Text: \n%s\n\n".
			"Thanks for managing the task while it lasted.";


$title_welcome      = "Welcome to the ".$ABBR_MANAGER_NAME;
$email_welcome      = "Hello,\n\nThis is the %s site welcoming you to me ;) on %s.\n\n".
			"As you are new here I will explain a couple of things to you so that you can quickly start to work\n\n".
			"First of all this is a project management tool, the main screen will show you the projects that are currently available. ".
			"If you click on one of the names you will find yourself in the task's part. This is where all the work will go on.\n\n".
			"Every item you post or task you edit will be shown to other users as 'new' or 'updated'. This also works vice-versa and ".
			"it enables you to quickly spot where the activity is.\n\n".
			"You can also take or get ownership of tasks and you will find yourself able to edit them and all the forum posts belonging to it. ".
			"As you progress with your work please edit your task's text and status so that everybody can keep a track on your progress. ".
			"\n\nI can only wish you success now and email %s if you are stuck.\n\n --Good luck !\n\n".
			"Login:      %s\n".
			"Password:   %s\n\n".
			"Usergroups: %s".
			"Name:       %s\n".
			"Website:    %s\n\n".
			"%s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Edit of your account by an Admin";
$email_user_change1 = "Hello,\n\nThis is the %s site informing you that your account has been changed on %s by %s ( %s ) \n\n".
			"Login:      %s\n".
			"Password:   %s\n\n".
			"Usergroups: %s".
			"Name:       %s\n\n".
			"%s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Edit of your account";
$email_user_change2 = "Hello,\n\nThis is the %s site confirming that you have successfully changed your account on %s\n\n".
			"Login:    %s\n".
			"Password: %s\n\n".
			"Name:     %s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.": Edit of your account";
$email_user_change3 = "Hello,\n\nThis is the %s site confirming that you have successfully changed your account on %s\n\n".
			"Login:    %s\n".
			"Your existing password has not changed.\n\n".
			"Name:     %s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Account reactivated";
$email_revive       = "Hello,\n\nThis is the %s site informing you that your account has been re-enabled on %s.\n\n".
			"Loginname: %s\n".
			"Username:  %s\n\n".
			"We cannot send you your password because it is encrypted. \n\n".
			"If you have forgotten your password email %s for a new password.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Account deactivated.";
$email_delete_user  = "Hello,\n\nThis is the %s site informing you that your account has been deactivated on %s\n\n".
			"We are sorry that you have left and would like to thank you for your work!\n\n".
			"If you object to being deactivated, or think that this is an error, send an email to %s.";

?>
