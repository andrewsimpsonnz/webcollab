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
  Last updater: Hiromi Kimura <hiromi at tac.tsukuba.ac.jp>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post        = ABBR_MANAGER_NAME.": 新規ファイルのアップロード: %s";
$email_file_post        = MANAGER_NAME." サイトからのお知らせです。\n".
			"%1\$s さんが ".$email_date." に新しいファイルをアップロードしました。\n\n".
                          "ファイル:      %2\$s\n".
                          "説明:          %3\$s\n\n".
                          "プロジェクト:  %4\$s\n".
                          "タスク:        %5\$s\n\n".
                          "より詳しい情報はウェブサイトに移動して下さい。\n\n".
			  BASE_URL."%6\$s\n";

$title_forum_post        = ABBR_MANAGER_NAME.": フォーラムに新規投稿: %s";
$email_forum_post        = MANAGER_NAME." サイトからのお知らせです。\n".
			 "%1\$s さんが ".$email_date." にフォーラムに新しい投稿をしました。\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                           "より詳しい情報はウェブサイトに移動して下さい。\n\n".
			   BASE_URL."%3\$s\n";

$email_forum_reply       = MANAGER_NAME." サイトからのお知らせです。\n".
			 "%1\$s さんが ".$email_date." にフォーラムに新しい投稿をしました".
                           "これは既に投稿されている %2\$s への返信です。\n\n".
                           "元の投稿:\n%3\$s\n\n".
                            "----\n\n".
                           "新規返信:\n%4\$s\n\n".
                            "----\n\n".
                           "より詳しい情報はウェブサイトに移動して下さい。\n\n".
			   BASE_URL."%5\$s\n";


$email_list =  "プロジェクト:  %1\$s\n".
               "タスク:        %2\$s\n".
               "状況:          %3\$s\n".
               "所有者:        %4\$s ( %5\$s )\n".
               "テキスト:\n%6\$s\n\n".
               "より詳しい情報はウェブサイトに移動して下さい。\n\n".
	       BASE_URL."%7\$s\n";


$title_takeover_project  = ABBR_MANAGER_NAME.": あなたのプロジェクトは引き継がれました";
$title_takeover_task     = ABBR_MANAGER_NAME.": あなたのタスクは引き継がれました";

$email_takeover_task     = MANAGER_NAME." サイトからのお知らせです。\n".
			 "あなたの所有していたタスクは管理者によって ".$email_date." に引き継がれました。\n\n";

$email_takeover_project  = MANAGER_NAME." サイトからのお知らせです。\n".
			 "あなたの所有していたプロジェクトは管理者によって ".$email_date." に引き継がれました。\n\n";

$title_new_owner_project = ABBR_MANAGER_NAME.": あなたの新規プロジェクト";
$title_new_owner_task     = ABBR_MANAGER_NAME.": あなたの新規タスク";

$email_new_owner_project = MANAGER_NAME." サイトからのお知らせです。\n".
			 "プロジェクトが ".$email_date." に作成され、あなたが所有者になりました。\n\n".
			 "以下が詳細です：\n\n";

$email_new_owner_task    = MANAGER_NAME." サイトからのお知らせです。\n".
			 "タスクが ".$email_date." に作成され、あなたが所有者になりました。\n\n".
			 "以下が詳細です：\n\n";


$title_new_group_project = ABBR_MANAGER_NAME.": 新規プロジェクト: %s";
$title_new_group_task    = ABBR_MANAGER_NAME.": 新規タスク: %s";

$email_new_group_project = MANAGER_NAME." サイトからのお知らせです。\n".
			 "新しいプロジェクトが ".$email_date." に作成されました。\n\n".
			 "以下が詳細です：\n\n";

$email_new_group_task    = MANAGER_NAME." サイトからのお知らせです。\n".
			 "新しいタスクが ".$email_date." に作成されました。\n\n".
			 "以下が詳細です：\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": プロジェクトが更新されました";
$title_edit_owner_task   = ABBR_MANAGER_NAME.": タスクが更新されました";

$email_edit_owner_project = MANAGER_NAME." サイトからのお知らせです。\n".
			  "あなたの所有するプロジェクトが ".$email_date." に変更されました。\n\n".
			  "以下が詳細です：\n\n";

$email_edit_owner_task   = MANAGER_NAME." サイトからのお知らせです。\n".
			 "あなたの所有するタスクが ".$email_date." に変更されました。\n\n".
			 "以下が詳細です：\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": プロジェクトが更新されました";
$title_edit_group_task    = ABBR_MANAGER_NAME.": タスクが更新されました";

$email_edit_group_project = MANAGER_NAME." サイトからのお知らせです。\n".
			  "%s さんの所有するプロジェクトが ".$email_date." に変更されました。\n\n".
			  "以下が詳細です：\n\n";

$email_edit_group_task   = MANAGER_NAME." サイトからのお知らせです。\n".
			 "%s さんの所有するタスクが ".$email_date." に変更されました。\n\n".
			 "以下が詳細です：\n\n";

$title_delete_project    = ABBR_MANAGER_NAME.": プロジェクトが削除されました";
$title_delete_task       = ABBR_MANAGER_NAME.": タスクが削除されました";

$email_delete_project    = MANAGER_NAME." サイトからのお知らせです。\n".
			 "あなたが所有していたプロジェクトが ".$email_date." に削除されました。\n\n".
			 "今まで管理して頂いて、ありがとうございました。\n\n";

$email_delete_task       = MANAGER_NAME." サイトからのお知らせです。\n".
			 "あなたが所有していたタスクが ".$email_date." に削除されました。\n\n".
			 "今まで管理して頂いて、ありがとうございました。\n\n";

$delete_list = "プロジェクト: %1\$s\n".
               "タスク:       %2\$s\n".
               "状況:         %3\$s\n\n".
               "テキスト:\n%4\$s\n\n";

$title_usergroup_add     = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add     = "Hello,\n\n".
		  "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
		  "The members of the new usergroup are:\n".
		  "%2\$s\n";

$title_usergroup_edit    = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit    = "Hello,\n\n".
		  "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
		  "The members of the usergroup are:\n".
		  "%2\$s\n";

$title_welcome    = "ようこそ ".ABBR_MANAGER_NAME."へ";
$email_welcome    = "これは ".MANAGER_NAME." からの案内です（日付：".$email_date.".）\n\n".
		  "初心者のあなたが作業を開始できるように、簡単に説明します。\n\n".
		  "最初に、これはプロジェクト管理ツールで、メイン画面では現在有効なプロジェクトが表示されます。".
		  "もし、プロジェクトの名前をクリックしたなら、タスクの中にあなたの名前を見つけるかもしれません。そのタスクがあなたがするべき作業です。\n\n".
		  "あなたの投稿や編集したタスクは他のユーザには新規や更新として表示されます。逆もしかりで、そのことで活動状況が簡単に分かるのです。\n\n".
		  "あなたはタスクの所有者に割り当てられるか、自分から所有者になることで、タスクを編集することができるようになります。".
		  "作業の進行に合わせて、タスクの状況や説明の文章を編集し、皆にあなたの作業状況を知らせて下さい。\n\n".
		  "何かうまくいかなかったら ".EMAIL_ADMIN." にメールして下さい。では！\n\n".
		  "ログイン名:       %1\$s\n".
		  "パスワード:       %2\$s\n\n".
		  "ユーザーグループ: %3\$s".
		  "名前:             %4\$s\n".
		  "ウェブサイト:     ".BASE_URL."\n\n".
		  "%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": 管理者がアカウントを編集しました";
$email_user_change1 = MANAGER_NAME." サイトからのお知らせです。\n".
		    "あなたのアカウントは %1\$s ( %2\$s )が ".$email_date." に変更しました。\n\n".
			"ログイン名:       %3\$s\n".
			"パスワード:       %4\$s\n\n".
			"ユーザーグループ: %5\$s".
			"名前:             %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": アカウントの編集";
$email_user_change2 = MANAGER_NAME." サイトからのお知らせです。\n".
		    "あなたのアカウントは ".$email_date." に正常に変更されました。\n\n".
			"ログイン名:    %1\$s\n".
			"パスワード:    %2\$s\n\n".
			"名前:          %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": アカウントの編集";
$email_user_change3 = MANAGER_NAME." サイトからのお知らせです。\n".
		    "あなたのアカウントは ".$email_date." に正常に変更されました。\n\n".
			"ログイン名:  %1\$s\n".
			"パスワードは変更されませんでした。\n\n".
			"名前:        %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": アカウントが再度有効になりました";
$email_revive       = MANAGER_NAME." サイトからのお知らせです。\n".
		    "あなたのアカウントは ".$email_date." に再度、有効になりました。\n\n".
			"ログイン名:  %1\$s\n".
			"ユーザー名:  %2\$s\n\n".
			"あなたのパスワードは暗号化されているため、送信することはできません。\n\n".
			"もしパスワードを忘れてしまったなら ".EMAIL_ADMIN." にメールで問い合わせて下さい。";


$title_delete_user  = ABBR_MANAGER_NAME.": アカウントが無効になりました";
$email_delete_user  = MANAGER_NAME." サイトからのお知らせです。\n".
		    "あなたのアカウントは ".$email_date." に無効となりました。\n\n".
		    "我々はあなたが居なくなって残念です。今までありがとう！\n\n".
		    "もし、無効になることが不満だったり、間違いだとお思いなら、".EMAIL_ADMIN.". にメールして下さい。";

?>
