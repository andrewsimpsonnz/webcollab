<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License; or (at your option) any later version.

  This program is distributed in the hope that it will be useful; but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not; write to the Free Software Foundation; Inc.; 675 Mass Ave;
  Cambridge; MA 02139; USA.


  Function:
  ---------


  Language files for 'zh-tw' (Traditional Chinese)

  Maintainer: Dante Mason <mason @ sikazozo.org>

  modified from zh-cn.
  
  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "zh" );

//dates
$month_array = array (NULL, '一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月' );
$week_array = array('日', '一', '二', '三', '四', '五', '六' );

//task states

 //priorities
    $task_state['dontdo']               = "不做";
    $task_state['low']                  = "低";
    $task_state['normal']               = "中";
    $task_state['high']                 = "高";
    $task_state['yesterday']            = "已過去的";
 //status
    $task_state['new']                  = "新的";
    $task_state['planned']              = "已計畫 (非活躍的)";
    $task_state['active']               = "活躍中 (工作中的)";
    $task_state['cantcomplete']         = "暫停";
    $task_state['completed']            = "已完成的";
    $task_state['done']                 = "結案";
    $task_state['task_planned']         = " 已計畫";
    $task_state['task_active']          = " 活躍中";
 //project states
    $task_state['planned_project']      = "已計畫的專案 (非活躍的)";
    $task_state['no_deadline_project']  = "無截止日的專案";
    $task_state['active_project']       = "活躍中的專案";

//common items
    $lang['description']                = "描述";
    $lang['name']                       = "名稱";
    $lang['add']                        = "新增";
    $lang['update']                     = "更新";
    $lang['submit_changes']             = "決定變更";
    $lang['continue']                   = "繼續";
    $lang['manage']                     = "管理";
    $lang['edit']                       = "修改";
    $lang['delete']                     = "刪除";
    $lang['del']                        = "刪除";
    $lang['confirm_del_javascript']     = " 確定刪除！";
    $lang['yes']                        = "是";
    $lang['no']                         = "否";
    $lang['action']                     = "動作";
    $lang['task']                       = "工作項目";
    $lang['tasks']                      = "工作項目";
    $lang['project']                    = "專案";
    $lang['info']                       = "資訊";
    $lang['bytes']                      = " bytes";
    $lang['select_instruct']            = "(按住 ctrl 鍵以選擇更多/小項目)";
    $lang['member_groups']              = "該使用者是以下反白的群組成員(如果有的話)";
    $lang['login']                      = "登入";
    $lang['login_action']               = "登入";
    $lang['login_screen']               = "登入";
    $lang['error']                      = "錯誤";
    $lang['no_login']                   = "登入失敗，不正確的登入名稱或密碼";
    $lang['redirect_sprt']              = "%d 秒之後會將你自動導回登入頁";
    $lang['login_now']                  = "請點選這裡返回登入頁";
    $lang['please_login']               = "請登入";
    $lang['go']                         = "GO！";

//graphic items
    $lang['late_g']                     = "&nbsp;LATE&nbsp;";
    $lang['new_g']                      = "&nbsp;NEW&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPDATED&nbsp;";

//admin config
    $lang['admin_config']               = "Admin 設定";
    $lang['email_settings']             = "Email header 設定";
    $lang['admin_email']                = "Admin email";
    $lang['email_reply']                = "Email '回覆至'";
    $lang['email_from']                 = "Email '寄件者'";
    $lang['mailing_list']               = "Mailing list";
    $lang['default_checkbox']           = "專案/工作項目的選項預設值";
    $lang['allow_globalaccess']         = "允許全域存取？";
    $lang['allow_group_edit']           = "允許所有在使用者群組的成員修改？";
    $lang['set_email_owner']            = "有更動時永遠都向所有者發出 email？";
    $lang['set_email_group']            = "有更動時永遠都向使用者群組發出 email？";
    $lang['project_listing_order']      = "專案排序依照";
    $lang['task_listing_order']         = "工作項目排序依照";
    $lang['configuration']              = "設定";

//archive
    $lang['archived_projects']          = "已封存的專案";

//contacts
    $lang['firstname']                  = "名：";
    $lang['lastname']                   = "姓：";
    $lang['company']                    = "公司：";
    $lang['home_phone']                 = "住處電話號碼：";
    $lang['mobile']                     = "手機號碼：";
    $lang['fax']                        = "傳真：";
    $lang['bus_phone']                  = "工作地點電話號碼：";
    $lang['address']                    = "地址：";
    $lang['postal']                     = "郵遞區號：";
    $lang['city']                       = "城市：";
    $lang['email_contact']              = "Email：";
    $lang['notes']                      = "備註：";
    $lang['add_contact']                = "新增聯絡人";
    $lang['del_contact']                = "刪除聯絡人";
    $lang['contact_info']               = "聯絡資料";
    $lang['contacts']                   = "聯絡";
    $lang['contact_add_info']           = "如果你加入公司名稱就會連同聯絡人名稱顯示。";
    $lang['show_contact']               = "顯示聯絡人";
    $lang['edit_contact']               = "修改聯絡人";
    $lang['contact_submit']             = "送出資料";
    $lang['contact_warn']               = "欠缺必要的聯絡資料，請返回並補回聯絡人姓名";

 //files
    $lang['manage_files']               = "管理檔案";
    $lang['no_files']                   = "沒有被上傳的檔案可供管理";
    $lang['no_file_uploads']            = "這個系統被設定為不能上傳檔案";
    $lang['file']                       = "檔案：";
    $lang['uploader']                   = "檔案上傳者：";
    $lang['files_assoc_project']        = "這個專案所相關的檔案";
    $lang['files_assoc_task']           = "這個工作項目所相關的檔案";
    $lang['file_admin']                 = "檔案管理";
    $lang['add_file']                   = "新增檔案";
    $lang['files']                      = "檔案";
    $lang['file_choose']                = "會被上傳的檔案：";
    $lang['upload']                     = "上傳";
    $lang['file_email_owner']           = "有新檔案時向所有者發出 Email？";
    $lang['file_email_usergroup']       = "有新檔案時向使用者群組發出 Email？";
    $lang['max_file_sprt']              = "上傳的檔案必須小於 %s kb.";
    $lang['file_submit']                = "開始上傳檔案";
    $lang['no_upload']                  = "上傳檔案失敗，請返回再試。";
    $lang['file_too_big_sprt']          = "上傳檔案的上限是 %s bytes。 你上傳的檔案太大所以被刪除了。";
    $lang['del_file_javascript_sprt']   = "你確定要刪除檔案 %s ？";

 //forum
    $lang['orig_message']               = "原文：";
    $lang['post']                       = "發表！";
    $lang['message']                    = "內容：";
    $lang['post_reply_sprt']            = "回應由 '%1\$s' 發表關於 '%2\$s' 的文章";
    $lang['post_message_sprt']          = "發表文章至：'%s'";
    $lang['forum_email_owner']          = "Email 討論區的文章給所有者？";
    $lang['forum_email_usergroup']      = "Email 討論區的文章給使用者群組？";
    $lang['reply']                      = "回覆";
    $lang['new_post']                   = "新文張";
    $lang['public_user_forum']          = "公眾使用者討論區";
    $lang['private_forum_sprt']         = "'%s' 使用者群組的專屬討論區";
    $lang['forum_submit']               = "送出至討論區";
    $lang['no_message']                 = "沒有文章！請返回再試";
    $lang['add_reply']                  = "新增回覆";
    $lang['last_post_sprt']             = "最近的文章發表時間為 %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "最近的討論區文章";
//**
    $lang['forum_search']               = "搜尋討論區";
//**
    $lang['no_results']                 = "'%s'搜尋不到任何資料";
//**
    $lang['search_results']             = "找到關於 '%2\$s' 的資料共 %1\$s 筆<br />顯示第 %3\$s 筆至第 %4\$s 筆";


 //includes
    $lang['report']                     = "回報";
    $lang['warning']                    = "<h1>不好意思！</h1><p>我們現在無法處理你的要求，請稍後再試。</p>";
    $lang['home_page']                  = "首頁";
    $lang['summary_page']               = "摘要資訊";
    $lang['log_out']                    = "登出";
    $lang['main_menu']                  = "主選單";
    $lang['archive']                    = "封存";
    $lang['user_homepage_sprt']         = "%s 的首頁";
    $lang['missing_field_javascript']   = "請在空白的項目填上內容";
    $lang['invalid_date_javascript']    = "請選擇一個有效的日期";
    $lang['finish_date_javascript']     = "你輸入的日期在專案的完成日期之後！";
    $lang['security_manager']           = "資安管理員";
    $lang['session_timeout_sprt']       = "禁止瀏覽；最後一次動作是在 %1\$d 分鐘前，而且已逾時 %2\$d 分鐘，請 <a href=\"%3\$sindex.php\">重新登入</a>";
    $lang['access_denied']              = "禁止瀏覽";
    $lang['private_usergroup_no_access']= "對不起；這是隱藏的使用者群組的範圍，而你沒有瀏覽的權限。";
    $lang['invalid_date']               = "無效的日期";
    $lang['invalid_date_sprt']          = "輸入的日期 %s 不是一個有效的日期(檢查一下這個月有幾天).<br />請返回並重新輸入一個有效的日期。";

 //taskgroups
    $lang['taskgroup_name']             = "工作組別名稱：";
    $lang['taskgroup_description']      = "工作組別的簡單描述：";
    $lang['add_taskgroup']              = "新增工作組別";
    $lang['add_new_taskgroup']          = "新增工作組別";
    $lang['edit_taskgroup']             = "修改工作組別";
    $lang['taskgroup_manage']           = "管理工作組別";
    $lang['no_taskgroups']              = "沒有定義工作組別";
    $lang['manage_taskgroups']          = "管理工作組別";
    $lang['taskgroups']                 = "工作組別";
    $lang['taskgroup_dup_sprt']         = "'%s' 工作組別已經存在，請返回並填寫新的名稱。";
    $lang['info_taskgroup_manage']      = "工作組別管理的資訊";

 //usergroups
    $lang['usergroup_name']             = "使用者群組名稱：";
    $lang['usergroup_description']      = "使用者群組的簡單描述：";
    $lang['members']                    = "成員：";
    $lang['private_usergroup']          = "隱藏的使用者群組";
    $lang['add_usergroup']              = "新增使用者群組";
    $lang['add_new_usergroup']          = "新增使用者群組";
    $lang['edit_usergroup']             = "修改使用者群組";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "管理使用者群組";
    $lang['no_usergroups']              = "沒有被定義的使用者群組";
    $lang['manage_usergroups']          = "管理使用者群組";
    $lang['usergroups']                 = "使用者群組";
    $lang['usergroup_dup_sprt']         = "使用者群組 '%s' 已經存在，請返回並選擇另一個名稱。";
    $lang['info_usergroup_manage']      = "使用者群組管理的相關資訊";

 //users
    $lang['login_name']                 = "登入名稱";
    $lang['full_name']                  = "全名";
    $lang['password']                   = "密碼";
    $lang['blank_for_current_password'] = "(保持空白會使用現在的密碼)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "系統管理員";
    $lang['private_user']               = "隱藏的使用者";
    $lang['normal_user']                = "普通使用者";
    $lang['is_admin']                   = "是系統管理員？";
    $lang['is_guest']                   = "是訪客？";
    $lang['guest']                      = "訪客";
    $lang['user_info']                  = "使用者資訊";
    $lang['deleted_users']              = "刪除使用者";
    $lang['no_deleted_users']           = "没有刪除任何使用者.";
    $lang['revive']                     = "還原";
    $lang['permdel']                    = "永久刪除";
    $lang['permdel_javascript_sprt']    = "這樣做會永久刪除 %s 所有的紀錄以及相關的工作項目，你真的決定這樣做？";
    $lang['add_user']                   = "新增使用者";
    $lang['edit_user']                  = "修改使用者資料";
    $lang['no_users']                   = "這個系統沒有使用者";
    $lang['users']                      = "使用者";
    $lang['existing_users']             = "已存在的使用者";
    $lang['private_profile']            = "這個使用者的資料是隱藏的，所以你無法觀看";
    $lang['private_usergroup_profile']  = "(這個使用者是隱藏的使用者群組的成員，所料以你無法觀看他的資料)";
    $lang['email_users']                = "向使用者發出 Email";
    $lang['select_usergroup']           = "已經從下方選擇的使用者群組:";
    $lang['subject']                    = "主題：";
    $lang['message_sent_maillist']      = "訊息也會複製到 mailing list。";
    $lang['who_online']                 = "哪些使用者在線上？";
    $lang['edit_details']               = "修改使用者資料";
    $lang['show_details']               = "顯示使用者資料";
    $lang['user_deleted']               = "這個使用者已被刪除!";
    $lang['no_usergroup']               = "這個使用者不是任何一個使用者群組的成員";
    $lang['not_usergroup']              = "(不是某任一個使用者群組的成員)";
    $lang['no_password_change']         = "(没有修改你舊有的密碼)";
    $lang['last_time_here']             = "最近一次到訪時間：";
    $lang['number_items_created']       = "創建項目的數量：";
    $lang['number_projects_owned']      = "擁有的專案：";
    $lang['number_tasks_owned']         = "擁有的工作項目：";
    $lang['number_tasks_completed']     = "完成了的工作數目:";
    $lang['number_forum']               = "在討論區的發文數量：";
    $lang['number_files']               = "上傳的檔案數量：";
    $lang['size_all_files']             = "擁有的檔案的大小總和：";
    $lang['owned_tasks']                = "擁有的工作項目";
    $lang['invalid_email']              = "無效的 email 地址";
    $lang['invalid_email_given_sprt']   = "'%s' 是一個無效的 email 地址，請返回並再試";
    $lang['duplicate_user']             = "重複的使用者";
    $lang['duplicate_change_user_sprt'] = "'%s' 是已存在的使用者，請返回並修改名稱。";
    $lang['value_missing']              = "缺少一些數值";
    $lang['field_sprt']                 = "缺少了 '%s' 項目的值，請返回並再填寫";
    $lang['admin_priv']                 = "備註： 你已經被授予系統管理者的權限。";
    $lang['manage_users']               = "管理使用者";
    $lang['users_online']               = "在線上的使用者";
    $lang['online']                     = "Die hard surfers (六十分鐘內在線上的)";
    $lang['not_online']                 = "其他的";
    $lang['user_activity']              = "使用者從事的活動";

  //tasks
    $lang['add_new_task']               = "新增專案";
    $lang['priority']                   = "優先順序";
    $lang['parent_task']                = "從屬於工作項目";
    $lang['creation_time']              = "建立時間";
    $lang['by_sprt']                    = "由 %2\$s 於 %1\$s 建立"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "專案名稱";
    $lang['task_name']                  = "工作名稱";
    $lang['deadline']                   = "截止日期";
    $lang['taken_from_parent']          = "(自從屬的項目中接管)";
    $lang['status']                     = "狀態";
    $lang['task_owner']                 = "工作負責人";
    $lang['project_owner']              = "專案負責人";
    $lang['taskgroup']                  = "工作組別";
    $lang['usergroup']                  = "使用者群組";
    $lang['nobody']                     = "沒有人";
    $lang['none']                       = "無";
    $lang['no_group']                   = "無組別";
    $lang['all_groups']                 = "全部組別";
    $lang['all_users']                  = "全部使用者";
    $lang['all_users_view']             = "是否所有使用者都可以瀏覽這個項目？";
    $lang['group_edit']                 = "是否所有在這群組内的使用者都可以修改？";
    $lang['project_description']        = "專案描述";
    $lang['task_description']           = "工作描述";
    $lang['email_owner']                = "有改變時向所有者發出 email？";
    $lang['email_new_owner']            = "有改變時向(新的)所有者發出 email？";
    $lang['email_group']                = "有改變時向使用者群組發出 email？";
    $lang['add_new_project']            = "新增專案";
    $lang['uncategorised']              = "未歸類";
    $lang['due_sprt']                   = "現在起計 %d 日";
    $lang['tomorrow']                   = "明天";
    $lang['due_today']                  = "今日到期";
    $lang['overdue_1']                  = "已過期一天";
    $lang['overdue_sprt']               = "已過期 %d 天";
    $lang['edit_task']                  = "修改工作内容";
    $lang['edit_project']               = "修改專案内容";
    $lang['no_reparent']                = "没有 (最高層的專案)";
    $lang['del_javascript_project_sprt']= "將會刪除專案： %s ！你是否確定？";
    $lang['del_javascript_task_sprt']   = "將會刪除工作項目： %s ！你是否確定？";
    $lang['add_task']                   = "新增工作";
    $lang['add_subtask']                = "新增副工作";
    $lang['add_project']                = "新增專案";
    $lang['clone_project']              = "複製專案";
    $lang['clone_task']                 = "複製工作";
    $lang['quick_jump']                 = "快速跳入";
    $lang['no_edit']                    = "你不擁有這項目所以不能修改它";
    $lang['global']                     = "全域";
    $lang['delete_project']             = "刪除專案";
    $lang['delete_task']                = "刪除工作";
    $lang['project_options']            = "專案選項";
    $lang['task_options']               = "工作選項";
    $lang['javascript_archive_project'] = "這樣做會封存專案: %s.  你確定?";
    $lang['archive_project']            = "封存專案";
    $lang['task_navigation']            = "瀏覽工作";
    $lang['new_task']                   = "新增工作";
    $lang['no_projects']                = "沒有可以查閱的專案";
    $lang['show_all_projects']          = "顯示所有的專案";
    $lang['show_active_projects']       = "只顯示活躍的專案";
    $lang['project_hold_sprt']          = "由 %s 暫停的專案";
    $lang['project_planned']            = "已計畫的專案";
    $lang['percent_sprt']               = "這個工作已完成 %d%%";
    $lang['project_no_deadline']        = "這個專案没有截止日期";
    $lang['no_allowed_projects']        = "没有你可以查閱的專案";
    $lang['projects']                   = "專案";
    $lang['percent_project_sprt']       = "這個專案已完成 %d%%";
    $lang['owned_by']                   = "所有者";
    $lang['created_on']                 = "建立於";
    $lang['completed_on']               = "完成於";
    $lang['modified_on']                = "修改於";
    $lang['project_on_hold']            = "專案暫停中";
    $lang['project_accessible']         = "(這個專案可被所有使用者公開查閱)";
    $lang['task_accessible']            = "(這個工作項目可被所有使用者公開查閱)";
    $lang['project_not_accessible']     = "(這個專案只可被使用者群組成員查閱)";
    $lang['task_not_accessible']        = "(這個工作項目只可被使用者群組成員查閱)";
    $lang['project_not_in_usergroup']   = "這個專案不属於使用者群組的部份及可以被所有使用者查閱";
    $lang['task_not_in_usergroup']      = "這個工作項目不属於使用者群組的部份及可以被所有使用者查閱";
    $lang['usergroup_can_edit_project'] = "這個專案也可以被使用者群組的成員修改";
    $lang['usergroup_can_edit_task']    = "這個工作項目也可以被使用者群組的成員修改";
    $lang['i_take_it']                  = "由我來承擔這個專案 :)";
    $lang['i_finished']                 = "我完成了！";
    $lang['i_dont_want']                = "我不再想擁有它";
    $lang['take_over_project']          = "接管專案";
    $lang['take_over_task']             = "接管工作項目";
    $lang['task_info']                  = "工作資訊";
    $lang['project_details']            = "專案的詳細資料";
    $lang['todo_list_for']              = "誰的待辦工作清單：";
    $lang['due_in_sprt']                = " (還有 %d 日到期)";
    $lang['due_tomorrow']               = " (明天到期)";
    $lang['no_assigned']                = "這位使用者没有未完成的工作";
    $lang['todo_list']                  = "待辦事項清單";
    $lang['summary_list']               = "摘要清單";
    $lang['task_submit']                = "提交工作";
    $lang['not_owner']                  = "禁止查閱。你不是所有者或者没有足夠權限";
    $lang['missing_values']             = "項目的输入的内容並不足够，請返回再試";
    $lang['future']                     = "將來";
    $lang['flags']                      = "標籤";
    $lang['owner']                      = "所有者";
    $lang['group']                      = "組別";
    $lang['by_usergroup']               = " (以使用者群組排列)";
    $lang['by_taskgroup']               = " (以工作組別排列)";
    $lang['by_deadline']                = " (以截止日期排列)";
    $lang['by_status']                  = " (以狀況排列)";
    $lang['by_owner']                   = " (以所有者排列)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "將會被複製的專案：";
    $lang['task_cloned']                = "將會被複製的工作項目：";
    $lang['note_clone']                 = "注意：這個工作項目會被複製成一個新的專案";

//bits 'n' pieces
    $lang['calendar']                   = "月曆";
    $lang['normal_version']             = "看普通版本";
    $lang['print_version']              = "看可供列印版本";
    $lang['condensed_view']             = "重點内容";
    $lang['full_view']                  = "全部内容";
//**
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>
