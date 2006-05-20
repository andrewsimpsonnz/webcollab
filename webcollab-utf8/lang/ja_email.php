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

  Email text language files for 'ja' (Japanese)

  Maintainer: Tadashi Jokagi <elf2000 at users.sourceforge.net>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post        = ABBR_MANAGER_NAME.": アップロードされた新規ファイル: %s";
$email_file_post        = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new file has been uploaded on ".$email_date." by %1\$s.\n\n".
                          "ファイル:        %2\$s\n".
			  "説明: %3\$s\n\n".
                          "より詳しい情報はウェブサイトに移動してください。\n\n".BASE_URL."%4\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": フォーラムに新規投稿: %s";
$email_forum_post        = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s:\n\n%2\$s\n\n".
                           "より詳しい情報はウェブサイトに移動してください。\n\n".BASE_URL."%3\$s\n";
$email_forum_reply       = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s.\n\n".
                           "This post is in reply to an earlier post by %2\$s.\n\n".
                           "元投稿:\n%3\$s\n\n".
                           "新規返信:\n%4\$s\n\n".
                           "より詳しい情報はウェブサイトに移動してください。\n\n".BASE_URL."%5\$s\n";


$email_list =  "プロジェクト:  %1\$s\n".
               "タスク:        %2\$s\n".
               "状況:          %3\$s\n".
               "所有者:        %4\$s ( %5\$s )\n".
               "テキスト:\n%6\$s\n\n".
               "より詳しい情報はウェブサイトに移動してください。\n\n".BASE_URL."%7\$s\n";


$title_takeover_project  = ABBR_MANAGER_NAME.": Your project taken over";
$title_takeover_task     = ABBR_MANAGER_NAME.": Your task taken over";

$email_takeover_task     = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task you own has been taken over by an admin on ".$email_date.".\n\n";
$email_takeover_project  = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project you own has been taken over by an admin on ".$email_date.".\n\n";


$title_new_owner_project = ABBR_MANAGER_NAME.": あなたの新規プロジェクト";
$title_new_owner_task     = ABBR_MANAGER_NAME.": あなたの新規タスク";

$email_new_owner_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project was created on ".$email_date.", and you are the owner of that project.\n\nHere are the details:\n\n";
$email_new_owner_task    = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task was created on ".$email_date.", and you are the owner of that task.\n\nHere are the details:\n\n";


$title_new_group_project = ABBR_MANAGER_NAME.": 新規プロジェクト: %s";
$title_new_group_task    = ABBR_MANAGER_NAME.": 新規タスク: %s";

$email_new_group_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new project has been created on ".$email_date."\n\nHere are the details:\n\n";
$email_new_group_task    = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a new task has been created on ".$email_date."\n\nHere are the details:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": プロジェクトが更新されました";
$title_edit_owner_task   = ABBR_MANAGER_NAME.": タスクが更新されました";

$email_edit_owner_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project you own was changed on ".$email_date.".\n\nHere are the details:\n\n";
$email_edit_owner_task   = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task you own was changed on ".$email_date.".\n\nHere are the details:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": プロジェクトが更新されました";
$title_edit_group_task    = ABBR_MANAGER_NAME.": タスクが更新されました";

$email_edit_group_project = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a project that %s owns has changed on ".$email_date.".\n\nHere are the details:\n\n";
$email_edit_group_task   = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that a task that %s owns has changed on ".$email_date.".\n\nHere are the details:\n\n";


$title_delete_project    = ABBR_MANAGER_NAME.": プロジェクトが削除されました";
$title_delete_task       = ABBR_MANAGER_NAME.": タスクが更新されました";

$email_delete_project    = "Hello,\n\n".
                           "This is the ".MANAGER_NAME." site informing you that a project you did own was deleted on ".$email_date."\n\n".
                           "Thanks for managing the project while it lasted.\n\n";
$email_delete_task       = "Hello,\n\n".
                           "This is the ".MANAGER_NAME." site informing you that a task you did own was deleted on ".$email_date."\n\n".
                           "Thanks for managing the task while it lasted.\n\n";

$delete_list = "プロジェクト: %1\$s\n".
               "タスク:       %2\$s\n".
               "状況:         %3\$s\n\n".
               "テキスト:\n%4\$s\n\n";

$title_welcome      = "ようこそ ".ABBR_MANAGER_NAME."へ";
$email_welcome      = "Hello,\n\nThis is the ".MANAGER_NAME." site welcoming you to me ;) on ".$email_date.".\n\n".
			"As you are new here I will explain a couple of things to you so that you can quickly start to work\n\n".
			"First of all this is a project management tool, the main screen will show you the projects that are currently available. ".
			"If you click on one of the names you will find yourself in the task's part. This is where all the work will go on.\n\n".
			"Every item you post or task you edit will be shown to other users as 'new' or 'updated'. This also works vice-versa and ".
			"it enables you to quickly spot where the activity is.\n\n".
			"You can also take or get ownership of tasks and you will find yourself able to edit them and all the forum posts belonging to it. ".
			"As you progress with your work please edit your task's text and status so that everybody can keep a track on your progress. ".
			"\n\nI can only wish you success now and email ".EMAIL_ADMIN." if you are stuck.\n\n --Good luck !\n\n".
			"ログイン名:       %1\$s\n".
			"パスワード:       %2\$s\n\n".
			"ユーザーグループ: %3\$s".
			"名前:             %4\$s\n".
			"ウェブサイト:     ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": 管理者がアカウントを編集";
$email_user_change1 = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that your account has been changed on ".$email_date." by %1\$s ( %2\$s ) \n\n".
			"ログイン名:       %3\$s\n".
			"パスワード:       %4\$s\n\n".
			"ユーザーグループ: %5\$s".
			"名前:             %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": アカウントを編集";
$email_user_change2 = "Hello,\n\nThis is the ".MANAGER_NAME." site confirming that you have successfully changed your account on ".$email_date.".\n\n".
			"ログイン名:    %1\$s\n".
			"パスワード:    %2\$s\n\n".
			"名前:          %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": アカウントを編集";
$email_user_change3 = "Hello,\n\nThis is the ".MANAGER_NAME." site confirming that you have successfully changed your account on ".$email_date.".\n\n".
			"ログイン名: %1\$s\n".
			"存在するパスワードは変更しませんでした。\n\n".
			"名前:  %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": アカウントを再度有効にしました";
$email_revive       = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that your account has been re-enabled on ".$email_date.".\n\n".
			"ログイン名:  %1\$s\n".
			"ユーザー名:  %2\$s\n\n".
			"あなたのパスワードは暗号化されているため、送信することはできません。\n\n".
			"If you have forgotten your password email ".EMAIL_ADMIN." for a new password.";



$title_delete_user  = ABBR_MANAGER_NAME.": アカウントを無効にしました";
$email_delete_user  = "Hello,\n\nThis is the ".MANAGER_NAME." site informing you that your account has been deactivated on ".$email_date.".\n".
			"We are sorry that you have left and would like to thank you for your work!\n\n".
			"If you object to being deactivated, or think that this is an error, send an email to ".EMAIL_ADMIN.".";

?>
