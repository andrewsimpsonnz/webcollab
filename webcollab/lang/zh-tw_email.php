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

  Email text language files for 'zh-tw' (Tradition Chinse)

  Maintainer: Dante Mason <mason at sikazozo.org>

  
  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 1.04.2004 09:18 +1200
$email_date = sprintf('%s.%s.%s %+03d00', date('j', $ltime ), date('m', $ltime ), date('Y H:i', $ltime ), TZ );

$title_file_post        = ABBR_MANAGER_NAME.": 新上傳的檔案: %s";
$email_file_post        = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。有一個新的檔案已經在 ".$email_date." 的時候由 %1\$s.上傳了\n\n".
                          "檔名：        %2\$s\n".
                          "檔案敘述： %3\$s\n\n".
                          "專案：        %4\$s\n".
                          "工作項目：     %5\$s\n\n".
                          "請回到網站以取得更多細節。\n\n".BASE_URL."%6\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": 新的文章發表：%s";
$email_forum_post        = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。有一篇新的文章已經在論譚發表了，發表時間：".$email_date." 發表人： %1\$s:\n\n%2\$s\n\n".
                           "請回到網站以取得更多細節。\n\n".BASE_URL."%3\$s\n";
$email_forum_reply       = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。有一篇新的文章已經在論譚發表了，發表時間：".$email_date." 發表人： %1\$s.\n\n".
                           "這篇文章是回應之前由 %2\$s 發表的文章。\n\n".
                           "原文：\n%3\$s\n\n".
                           "新回應：\n%4\$s\n\n".
                           "請回到網站以取得更多細節。\n\n".BASE_URL."%5\$s\n";


$email_list =  "專案：  %1\$s\n".
               "工作項目：     %2\$s\n".
               "狀態：   %3\$s\n".
               "所有人：    %4\$s ( %5\$s )\n".
               "內容：\n%6\$s\n\n".
               "請回到網站以取得更多細節。\n\n".BASE_URL."%7\$s\n";


$title_takeover_project  = ABBR_MANAGER_NAME."：你的專案被接管了";
$title_takeover_task     = ABBR_MANAGER_NAME."：你的工作項目被接管了";

$email_takeover_task     = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。有一項原本屬於你的工作項目在 ".$email_date." 被接管了。\n\n";
$email_takeover_project  = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。有一個原本屬於你的專案在 ".$email_date." 被接管了。\n\n";


$title_new_owner_project = ABBR_MANAGER_NAME."：你的新專案";
$title_new_owner_task     = ABBR_MANAGER_NAME."：你的新工作項目";

$email_new_owner_project = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。在 ".$email_date." 的時候建立了一個新的專案，而且你是這個專案的所有人。\n\n以下是相關細節：\n\n";
$email_new_owner_task    = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。在 ".$email_date." 的時候建立了一個新的工作項目，而且你是這個工作項目的所有人。\n\n以下是相關細節：\n\n";


$title_new_group_project = ABBR_MANAGER_NAME."：新的專案：%s";
$title_new_group_task    = ABBR_MANAGER_NAME."：新的工作項目：%s";

$email_new_group_project = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。在 ".$email_date." 的時候建立了一個新的專案。\n\n以下是相關細節：\n\n";
$email_new_group_task    = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。在 ".$email_date." 的時候建立了一個新的工作項目。\n\n以下是相關細節：\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME."：你的專案更新了";
$title_edit_owner_task   = ABBR_MANAGER_NAME."：你的工作項目更新了";

$email_edit_owner_project = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。在 ".$email_date." 的時候，你的專案被更動了。\n\n以下是相關細節：\n\n";
$email_edit_owner_task   = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。在 ".$email_date." 的時候，你的工作項目被更動了。\n\n以下是相關細節：\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME."：專案更新了";
$title_edit_group_task    = ABBR_MANAGER_NAME."：工作項目更新了";

$email_edit_group_project = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。%s 所管的專案在 ".$email_date." 的時候被更動了。\n\n以下是相關細節：\n\n";
$email_edit_group_task   = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。%s 所管的工作項目在 ".$email_date." 的時候被更動了。\n\n以下是相關細節：\n\n";


$title_delete_project    = ABBR_MANAGER_NAME."：專案刪除了";
$title_delete_task       = ABBR_MANAGER_NAME."：工作項目刪除了";

$email_delete_project    = "你好，\n\n".
                           "這是由『".MANAGER_NAME."』所發出的通知信。一個由你管理的專案已經在 ".$email_date." 的時候被刪除了。\n\n".
                           "感謝你管理這個專案。\n\n";
$email_delete_task       = "你好，\n\n".
                           "這是由『".MANAGER_NAME."』所發出的通知信。一項由你管理的工作項目已經在 ".$email_date." 的時候被刪除了。\n\n".
                           "感謝你管理這項工作項目。\n\n";

$delete_list = "專案： %1\$s\n".
                "工作項目：   %2\$s\n".
                "狀態： %3\$s\n\n".
                "內容：\n%4\$s\n\n";

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

$title_welcome      = "歡迎來到 ".ABBR_MANAGER_NAME;
$email_welcome      = "你好，\n\n這裡是『".MANAGER_NAME."』，歡迎你在 ".$email_date.". 加入。;)\n\n".
			"因為你在這裡是新人，所以我將說明一些事項來讓你快速的開始使用。\n\n".
			"首先，這是一個專案管理工具，主畫面會顯示目前現有的專案。 ".
			"點選專案的名稱之後，你會進到工作項目的部份。所有的工作都會在這裡運作。\n\n".
			"你張貼或編輯的每一個項目會對其他的使用者顯示成 '新的' 或是 '更新'。反之亦然，".
			"這讓你能夠快速的定位出哪裡有動作產生。\n\n".
			"你也可以取得或被賦予工作項目的所有權，然後你就可以編輯該項目以及所有在論壇中屬於該項目的文章。 ".
			"當你開始進展工作的時候，請編輯你的工作內容還有狀態，這樣大家才知道你的進展如何了。 ".
			"\n\n祝你成功，如果有什麼地方受阻了，請 email 給".EMAIL_ADMIN." 。\n\n --Good luck！\n\n".
			"登入帳號：      %1\$s\n".
			"登入密碼：   %2\$s\n\n".
			"使用者群組： %3\$s".
			"名字：       %4\$s\n".
			"網站：    ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME."：一位管理者編輯了你的帳號";
$email_user_change1 = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。你的帳號已經在 ".$email_date." 的時候被 %1\$s ( %2\$s ) 更改為\n\n".
			"登入帳號：      %3\$s\n".
			"登入密碼：   %4\$s\n\n".
			"使用者群組： %5\$s".
			"名字：       %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME."：帳號編輯";
$email_user_change2 = "你好，\n\n這是由『".MANAGER_NAME."』所發出的確認信。你已經在 ".$email_date." 的時候成功的變更了你的帳號。\n\n".
			"登入帳號：    %1\$s\n".
			"登入密碼： %2\$s\n\n".
			"名字：     %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME."：帳號編輯";
$email_user_change3 = "你好，\n\n這是由『".MANAGER_NAME."』所發出的確認信。你已經在 ".$email_date." 的時候成功的變更了你的帳號。\n\n".
			"登入帳號： %1\$s\n".
			"你原本的登入密碼沒有改變。\n\n".
			"名字：  %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME."：帳號重新啟用";
$email_revive       = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。你的帳號已經在 ".$email_date." 的時候被重新啟用了。\n\n".
			"登入帳號： %1\$s\n".
			"名字：  %2\$s\n\n".
			"我們沒辦法把密碼寄給你，因為密碼是加密編碼過的。 \n\n".
			"如果你忘記了密碼，請 email 到".EMAIL_ADMIN." 來取得新的密碼。";



$title_delete_user  = ABBR_MANAGER_NAME."：帳號停用";
$email_delete_user  = "你好，\n\n這是由『".MANAGER_NAME."』所發出的通知信。你的帳號已經在 ".$email_date." 的時候被停用了。\n".
			"我們很遺憾你的離開，感謝你的付出！\n\n".
			"如果你要對帳號的停用提出抗議，或是覺得有什麼地方搞錯了，請 email 到 ".EMAIL_ADMIN."。";

?>
