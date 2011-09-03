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

  Language files for 'zh-tw'(Traditional Chinese)

  Maintainer: Marcus Tsang <mathk2004 @ yahoo.com.hk>
              (please email me to discuss the wording in this language file)

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
    $task_state['dontdo']               = "不要做!";
    $task_state['low']                  = "低";
    $task_state['normal']               = "中";
    $task_state['high']                 = "高";
    $task_state['yesterday']            = "已過去的!";
 //status
    $task_state['new']                  = "新的";
    $task_state['planned']              = "已計劃 (非活躍的)";
    $task_state['active']               = "活躍中 (工作中的)";
    $task_state['cantcomplete']         = "暫停";
    $task_state['completed']            = "已完成的";
    $task_state['done']                 = "Done";
    $task_state['task_planned']         = " 已計劃";
    $task_state['task_active']          = " 活躍中";
 //project states
    $task_state['planned_project']      = "已計劃的專案 (非活躍的)";
    $task_state['no_deadline_project']  = "未設定最後限期";
    $task_state['active_project']       = "活躍中的專案";

//common items
    $lang['description']                = "描述";
    $lang['name']                       = "姓名";
    $lang['add']                        = "新增";
    $lang['update']                     = "更新";
    $lang['submit_changes']             = "決定變更";
    $lang['continue']                   = "繼續";
    $lang['manage']                     = "管理";
    $lang['edit']                       = "修改";
    $lang['delete']                     = "刪除";
    $lang['del']                        = "刪除";
    $lang['confirm_del_javascript']     = " 確定刪除!";
    $lang['yes']                        = "是";
    $lang['no']                         = "否";
    $lang['action']                     = "行動";
    $lang['task']                       = "工作";
    $lang['tasks']                      = "工作";
    $lang['project']                    = "專案";
    $lang['info']                       = "資訊";
    $lang['bytes']                      = " 位元組";
    $lang['select_instruct']            = "(按住 ctrl 鍵來選擇更多/小項目)";
    $lang['member_groups']              = "The user is a member of the highlighted groups below (if any)";
    $lang['login']                      = "登入";
    $lang['login_action']               = "登入";
    $lang['login_screen']               = "登入";
    $lang['error']                      = "錯誤";
    $lang['no_login']                   = "禁止查閱，不正確的登入名稱或密碼";
    $lang['redirect_sprt']              = "你將會於 %d 秒閒置後自動返回登入頁";
    $lang['login_now']                  = "請點擊這裏返回登入頁";
    $lang['please_login']               = "請登入";
    $lang['go']                         = "進入!";

//graphic items
    $lang['late_g']                     = "&nbsp;LATE&nbsp;";
    $lang['new_g']                      = "&nbsp;NEW&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPDATED&nbsp;";

//admin config
    $lang['admin_config']               = "Admin config";
    $lang['email_settings']             = "Email header settings";
    $lang['admin_email']                = "Admin email";
    $lang['email_reply']                = "Email '回覆至'";
    $lang['email_from']                 = "Email '由'";
    $lang['mailing_list']               = "電郵清單";
    $lang['default_checkbox']           = "專案/工作的選項的預設值";
    $lang['allow_globalaccess']         = "Allow global access?";
    $lang['allow_group_edit']           = "容許所有在使用者組別的成員修改?";
    $lang['set_email_owner']            = "有改變時永遠都向擁有者發出 email?";
    $lang['set_email_group']            = "有改變時永遠都向使用者組別發出 email?";
    $lang['project_listing_order']      = "專案排列次序";
    $lang['task_listing_order']         = "工作排列次序";
    $lang['configuration']              = "設定";

//archive
    $lang['archived_projects']          = "封存了的專案";

//contacts
    $lang['firstname']                  = "名:";
    $lang['lastname']                   = "姓:";
    $lang['company']                    = "公司:";
    $lang['home_phone']                 = "住宅電話:";
    $lang['mobile']                     = "手提電話:";
    $lang['fax']                        = "傳真 Fax:";
    $lang['bus_phone']                  = "商業電話:";
    $lang['address']                    = "地址:";
    $lang['postal']                     = "郵政號碼:";
    $lang['city']                       = "城市:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "記事:";
    $lang['add_contact']                = "新增聯絡人";
    $lang['del_contact']                = "刪除聯絡人";
    $lang['contact_info']               = "聯絡資料";
    $lang['contacts']                   = "聯絡";
    $lang['contact_add_info']           = "如果你加入公司名稱就會連同聯絡人名稱顯示.";
    $lang['show_contact']               = "顯示聯絡人";
    $lang['edit_contact']               = "修改聯絡人";
    $lang['contact_submit']             = "Contact submit";
    $lang['contact_warn']               = "欠缺必要的聯絡資料，請返回並補回聯絡人姓名";

 //files
    $lang['manage_files']               = "管理檔案";
    $lang['no_files']                   = "未有被上載的檔案可被管理";
    $lang['no_file_uploads']            = "這個系統被設定為不能上載檔案";
    $lang['file']                       = "檔案:";
    $lang['uploader']                   = "檔案上載者:";
    $lang['files_assoc_project']        = "這個專案所相關的檔案";
    $lang['files_assoc_task']           = "這個工作所相關的檔案";
    $lang['file_admin']                 = "檔案管理";
    $lang['add_file']                   = "新增檔案";
    $lang['files']                      = "檔案";
    $lang['file_choose']                = "會被上載的檔案:";
    $lang['upload']                     = "上載";
    $lang['file_email_owner']           = "有新檔案時向擁有者發出 Email ?";
    $lang['file_email_usergroup']       = "有新檔案時向使用者組別發出 Email ?";
    $lang['max_file_sprt']              = "上載的檔案大小要小於 %s kb.";
    $lang['file_submit']                = "提交檔案";
    $lang['no_upload']                  = "沒有上載到檔案，請返回及再試。";
    $lang['file_too_big_sprt']          = "最大的上載檔案大小是 %s 位元組。  你上載的檔案太大所以被刪除了。";
    $lang['del_file_javascript_sprt']   = "你確定要刪除檔案 %s ?";

 //forum
    $lang['orig_message']               = "原始信息:";
    $lang['post']                       = "張貼!";
    $lang['message']                    = "信息:";
    $lang['post_reply_sprt']            = "回應由 '%1\$s' 關於 '%2\$s' 的信息";
    $lang['post_message_sprt']          = "新增信息至: '%s'";
    $lang['forum_email_owner']          = "Email 討論區的信息至擁有者?";
    $lang['forum_email_usergroup']      = "Email 討論區的信息至使用者組別?";
    $lang['reply']                      = "回覆";
    $lang['new_post']                   = "新信息";
    $lang['public_user_forum']          = "公眾使用者討論區";
    $lang['private_forum_sprt']         = "'%s' 使用者組別的專用討論區";
    $lang['forum_submit']               = "Forum submit";
    $lang['no_message']                 = "無信息!請返回再試";
    $lang['add_reply']                  = "新增回覆信息";
    $lang['last_post_sprt']             = "最後的信息於 %s 發佈"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "最近的討論區信息";
//**
    $lang['forum_search']               = "Forum search";
//**
    $lang['no_results']                 = "No results found for '%s'";
//**
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "Report";
    $lang['warning']                    = "<h1>不好意思!</h1><p>我們現在未能處理你的要求，請稍後再試</p>";
    $lang['home_page']                  = "首頁";
    $lang['summary_page']               = "摘要資訊";
    $lang['log_out']                    = "登出";
    $lang['main_menu']                  = "主選單";
    $lang['archive']                    = "封存";
    $lang['user_homepage_sprt']         = "%s 的首頁";
    $lang['missing_field_javascript']   = "請在遣留的項目填回內容";
    $lang['invalid_date_javascript']    = "請選擇一個有效的日期";
    $lang['finish_date_javascript']     = "你輸入的日期比專案的完成日期更後!";
    $lang['security_manager']           = "保安管理員";
    $lang['session_timeout_sprt']       = "禁止查閱; 最後一次行動在 %1\$d 分鐘前而且已逾時了 %2\$d 分鐘，請 <a href=\"%3\$sindex.php\">重新登入</a>";
    $lang['access_denied']              = "禁止查閱";
    $lang['private_usergroup_no_access']= "對不起; 這個是私人使用者組別的範圍而你未有查閱的權限";
    $lang['invalid_date']               = "無效的日期";
    $lang['invalid_date_sprt']          = "The date of %s is not a valid calendar date (Check the number of days in month).<br />Please go back and re-enter a valid date.";

 //taskgroups
    $lang['taskgroup_name']             = "工作組別名稱:";
    $lang['taskgroup_description']      = "工作組別的簡單描述:";
    $lang['add_taskgroup']              = "新增工作組別";
    $lang['add_new_taskgroup']          = "新增工作組別";
    $lang['edit_taskgroup']             = "修改工作組別";
    $lang['taskgroup_manage']           = "管理工作組別";
    $lang['no_taskgroups']              = "沒有定義工作組別";
    $lang['manage_taskgroups']          = "管理工作組別";
    $lang['taskgroups']                 = "工作組別";
    $lang['taskgroup_dup_sprt']         = "已有 '%s' 工作組別，請返回並填寫新的名稱。";
    $lang['info_taskgroup_manage']      = "工作組別管理的資訊";

 //usergroups
    $lang['usergroup_name']             = "使用者組別名稱:";
    $lang['usergroup_description']      = "使用者組別的簡單描述:";
    $lang['members']                    = "成員:";
    $lang['private_usergroup']          = "私人使用者組別";
    $lang['add_usergroup']              = "新增使用者組別";
    $lang['add_new_usergroup']          = "新增使用者組別";
    $lang['edit_usergroup']             = "修改使用者組別";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "管理使用者組別";
    $lang['no_usergroups']              = "無使被定義的使用者組別";
    $lang['manage_usergroups']          = "管理使用者組別";
    $lang['usergroups']                 = "使用者組別";
    $lang['usergroup_dup_sprt']         = "已有使用者組別 '%s'. 請返回並選擇另一個名稱";
    $lang['info_usergroup_manage']      = "使用者組別管理的相關資訊";

 //users
    $lang['login_name']                 = "登入名稱";
    $lang['full_name']                  = "全名";
    $lang['password']                   = "密碼";
    $lang['blank_for_current_password'] = "(保持空白會使用現在的密碼)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "系統管理員";
    $lang['private_user']               = "私人使用者";
    $lang['normal_user']                = "普通使用者";
    $lang['is_admin']                   = "是系統管理員?";
    $lang['is_guest']                   = "是訪客?";
    $lang['guest']                      = "訪客";
    $lang['user_info']                  = "使用者資訊";
    $lang['deleted_users']              = "刪除使用者";
    $lang['no_deleted_users']           = "沒有刪除任何使用者.";
    $lang['revive']                     = "復活";
    $lang['permdel']                    = "永久刪除";
    $lang['permdel_javascript_sprt']    = "這樣做會永久刪除 %s 所有的紀錄及相關的工作，你真的決定這樣做?";
    $lang['add_user']                   = "新增使用者";
    $lang['edit_user']                  = "修改使用者資料";
    $lang['no_users']                   = "這個系統未有使用者";
    $lang['users']                      = "使用者";
    $lang['existing_users']             = "已有的使用者";
    $lang['private_profile']            = "這個使用者的資料是私人的所以你不可以觀看";
    $lang['private_usergroup_profile']  = "(這個使用者是私人使用者組別的成員所以你不可以觀看他的資料)";
    $lang['email_users']                = "向使用者發出 Email";
    $lang['select_usergroup']           = "下列選擇了的使用者組別:";
    $lang['subject']                    = "主題:";
    $lang['message_sent_maillist']      = "在所有情況下信息也會複製至電郵清單";
    $lang['who_online']                 = "那些使用者在線?";
    $lang['edit_details']               = "修改使用者資料";
    $lang['show_details']               = "顯示使用者資料";
    $lang['user_deleted']               = "這個使用者已被刪除!";
    $lang['no_usergroup']               = "這個使用者不是任何一個使用者組別的組員";
    $lang['not_usergroup']              = "(不是某任一個使用者組別的成員)";
    $lang['no_password_change']         = "(沒有修改你舊有的密碼)";
    $lang['last_time_here']             = "最後一次到訪時間:";
    $lang['number_items_created']       = "創建項目的數量:";
    $lang['number_projects_owned']      = "擁有的專案:";
    $lang['number_tasks_owned']         = "擁有的工作:";
    $lang['number_tasks_completed']     = "完成了的工作數目:";
    $lang['number_forum']               = "在討論區的發文數量:";
    $lang['number_files']               = "上載的檔案數量:";
    $lang['size_all_files']             = "擁有的檔案的總大細:";
    $lang['owned_tasks']                = "擁有的工作";
    $lang['invalid_email']              = "無效的 email 地址";
    $lang['invalid_email_given_sprt']   = "'%s' 是一個無效的 email 地址，請返回並再試";
    $lang['duplicate_user']             = "重複的使用者";
    $lang['duplicate_change_user_sprt'] = "'%s' 是已存在的使用者，請返回並修改名稱。";
    $lang['value_missing']              = "Value missing";
    $lang['field_sprt']                 = "缺乏了 '%s' 項目的值，請返回並再填寫";
    $lang['admin_priv']                 = "NOTE: You have been granted administrator privileges.";
    $lang['manage_users']               = "管理使用者";
    $lang['users_online']               = "在線使用者";
    $lang['online']                     = "Die hard surfers (六十分鐘內在線的)";
    $lang['not_online']                 = "其他的";
    $lang['user_activity']              = "User activity";

  //tasks
    $lang['add_new_task']               = "新增專案";
    $lang['priority']                   = "重要程度";
    $lang['parent_task']                = "Parent";
    $lang['creation_time']              = "創建時間";
    $lang['by_sprt']                    = "由 %2\$s 於 %1\$s 創建"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "專案名稱";
    $lang['task_name']                  = "工作名稱";
    $lang['deadline']                   = "最後限期";
    $lang['taken_from_parent']          = "(Taken from parent)";
    $lang['status']                     = "狀況";
    $lang['task_owner']                 = "工作負責人";
    $lang['project_owner']              = "專案負責人";
    $lang['taskgroup']                  = "工作組別";
    $lang['usergroup']                  = "使用者組別";
    $lang['nobody']                     = "無人";
    $lang['none']                       = "None";
    $lang['no_group']                   = "無組別";
    $lang['all_groups']                 = "全部組別";
    $lang['all_users']                  = "全部使用者";
    $lang['all_users_view']             = "是否所有使用者都可以查閱這個項目?";
    $lang['group_edit']                 = "是否所有在這組別內的使用者都可以修改?";
    $lang['project_description']        = "專案描述";
    $lang['task_description']           = "工作描述";
    $lang['email_owner']                = "有改變時向擁有者發出 email ?";
    $lang['email_new_owner']            = "有改變時向(新的)擁有者發出 email?";
    $lang['email_group']                = "有改變時向使用者組別發出 email ?";
    $lang['add_new_project']            = "新增專案";
    $lang['uncategorised']              = "未歸類";
    $lang['due_sprt']                   = "現在起計 %d 日";
    $lang['tomorrow']                   = "明天";
    $lang['due_today']                  = "今日到期";
    $lang['overdue_1']                  = "已過期一天";
    $lang['overdue_sprt']               = "已過期 %d 天";
    $lang['edit_task']                  = "修改工作內容";
    $lang['edit_project']               = "修改專案內容";
    $lang['no_reparent']                = "沒有 (最高層的專案)";
    $lang['del_javascript_project_sprt']= "將會刪除專案: %s ! 你是否確定?";
    $lang['del_javascript_task_sprt']   = "將會刪除工作: %s ! 你是曾確定?";
    $lang['add_task']                   = "新增工作";
    $lang['add_subtask']                = "新增副工作";
    $lang['add_project']                = "新增專案";
    $lang['clone_project']              = "複製專案";
    $lang['clone_task']                 = "複製工作";
    $lang['quick_jump']                 = "快速跳入";
    $lang['no_edit']                    = "你未擁有這項目所以不能修改它";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "刪除專案";
    $lang['delete_task']                = "刪除工作";
    $lang['project_options']            = "專案選項";
    $lang['task_options']               = "工作選項";
    $lang['javascript_archive_project'] = "這樣做會封存專案: %s.  你確定?";
    $lang['archive_project']            = "封存專案";
    $lang['task_navigation']            = "瀏覽工作";
    $lang['new_task']                   = "新增工作";
    $lang['no_projects']                = "無可以查閱的專案";
    $lang['show_all_projects']          = "顯示所有的專案";
    $lang['show_active_projects']       = "只顯示活躍的專案";
    $lang['project_hold_sprt']          = "由 %s 暫停的專案";
    $lang['project_planned']            = "已計劃的專案";
    $lang['percent_sprt']               = "這個工作已完成 %d%%";
    $lang['project_no_deadline']        = "這個專案沒有最後限期";
    $lang['no_allowed_projects']        = "沒有你可以查閱的專案";
    $lang['projects']                   = "專案";
    $lang['percent_project_sprt']       = "這個專案已完成 %d%%";
    $lang['owned_by']                   = "擁有者";
    $lang['created_on']                 = "創建於";
    $lang['completed_on']               = "完成於";
    $lang['modified_on']                = "修改於";
    $lang['project_on_hold']            = "專案暫停中";
    $lang['project_accessible']         = "(這個專案可被所有使用者公開查閱)";
    $lang['task_accessible']            = "(這個工作可被所有使用者公開查閱)";
    $lang['project_not_accessible']     = "(這個專案只可被使用者組別成員查閱)";
    $lang['task_not_accessible']        = "(這個工作只可被使用者組別成員查閱)";
    $lang['project_not_in_usergroup']   = "這個專案不屬於使用者組別的部份及可以被所有使用者查閱";
    $lang['task_not_in_usergroup']      = "這個工作不屬於使用者組別的部份及可以被所有使用者查閱";
    $lang['usergroup_can_edit_project'] = "這個專案也可以被使用者組別的成員修改";
    $lang['usergroup_can_edit_task']    = "這個工作也可以被使用者組別的成員修改";
    $lang['i_take_it']                  = "由我來承擔這個專案 :)";
    $lang['i_finished']                 = "我完成了它!";
    $lang['i_dont_want']                = "我不再想擁有它";
    $lang['take_over_project']          = "Take over project";
    $lang['take_over_task']             = "Take over task";
    $lang['task_info']                  = "工作資訊";
    $lang['project_details']            = "專案的詳細資料";
    $lang['todo_list_for']              = "誰的待辦工作清單: ";
    $lang['due_in_sprt']                = " (還有 %d 日到期)";
    $lang['due_tomorrow']               = " (明天到期)";
    $lang['no_assigned']                = "這位使用者沒有未完成的工作";
    $lang['todo_list']                  = "待辦事項清單";
    $lang['summary_list']               = "摘要清單";
    $lang['task_submit']                = "提交工作";
    $lang['not_owner']                  = "禁止查閱。你不是擁有者或者沒有足夠權限";
    $lang['missing_values']             = "項目的輸入的內容並不足夠，請返回再試";
    $lang['future']                     = "將來";
    $lang['flags']                      = "標籤";
    $lang['owner']                      = "擁有者";
    $lang['group']                      = "組別";
    $lang['by_usergroup']               = " (以使用者組別排列)";
    $lang['by_taskgroup']               = " (以工作組別排列)";
    $lang['by_deadline']                = " (以最後限期排列)";
    $lang['by_status']                  = " (以狀況排列)";
    $lang['by_owner']                   = " (以擁有者排列)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "將會被複的專案 :";
    $lang['task_cloned']                = "將會被複製的工作 :";
    $lang['note_clone']                 = "注意:這個工作會被複製成一個新的專案";

//bits 'n' pieces
    $lang['calendar']                   = "月曆";
    $lang['normal_version']             = "看普通版本";
    $lang['print_version']              = "看可供列印版本";
    $lang['condensed_view']             = "重點內容";
    $lang['full_view']                  = "全部內容";
//**
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>