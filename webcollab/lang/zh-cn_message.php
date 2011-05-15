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


  Language files for 'zh-cn' (Traditional Chinese)

  Maintainer: Marcus Tsang <mathk2004 @ yahoo.com.hk>

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
    $task_state['yesterday']            = "已过去的!";
 //status
    $task_state['new']                  = "新的";
    $task_state['planned']              = "已计划 (非活跃的)";
    $task_state['active']               = "活跃中 (工作中的)";
    $task_state['cantcomplete']         = "暂停";
    $task_state['completed']            = "已完成的";
    $task_state['done']                 = "Done";
    $task_state['task_planned']         = " 已计划";
    $task_state['task_active']          = " 活跃中";
 //project states
    $task_state['planned_project']      = "已计划的专案 (非活跃的)";
    $task_state['no_deadline_project']  = "未设定最后限期";
    $task_state['active_project']       = "活跃中的专案";

//common items
    $lang['description']                = "描述";
    $lang['name']                       = "姓名";
    $lang['add']                        = "新增";
    $lang['update']                     = "更新";
    $lang['submit_changes']             = "决定变更";
    $lang['continue']                   = "继续";
    $lang['manage']                     = "管理";
    $lang['edit']                       = "修改";
    $lang['delete']                     = "删除";
    $lang['del']                        = "删除";
    $lang['confirm_del_javascript']     = " 确定删除!";
    $lang['yes']                        = "是";
    $lang['no']                         = "否";
    $lang['action']                     = "行动";
    $lang['task']                       = "工作";
    $lang['tasks']                      = "工作";
    $lang['project']                    = "专案";
    $lang['info']                       = "资讯";
    $lang['bytes']                      = " 位元组";
    $lang['select_instruct']            = "(按住 ctrl 键来选择更多/小项目)";
    $lang['member_groups']              = "The user is a member of the highlighted groups below (if any)";
    $lang['login']                      = "登入";
    $lang['login_action']               = "登入";
    $lang['login_screen']               = "登入";
    $lang['error']                      = "错误";
    $lang['no_login']                   = "禁止查阅，不正确的登入名称或密码";
    $lang['redirect_sprt']              = "你将会于 %d 秒闲置后自动返回登入页";
    $lang['login_now']                  = "请点击这里返回登入页";
    $lang['please_login']               = "请登入";
    $lang['go']                         = "进入!";

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
    $lang['mailing_list']               = "Mailing list";
    $lang['default_checkbox']           = "专案/工作的选项的预设值";
    $lang['allow_globalaccess']         = "Allow global access?";
    $lang['allow_group_edit']           = "容许所有在使用者组别的成员修改?";
    $lang['set_email_owner']            = "有改变时永远都向拥有者发出 email?";
    $lang['set_email_group']            = "有改变时永远都向使用者组别发出 email?";
    $lang['project_listing_order']      = "专案排列次序";
    $lang['task_listing_order']         = "工作排列次序";
    $lang['configuration']              = "设定";

//archive
    $lang['archived_projects']          = "封存了的专案";

//contacts
    $lang['firstname']                  = "名:";
    $lang['lastname']                   = "姓:";
    $lang['company']                    = "公司:";
    $lang['home_phone']                 = "住宅电话:";
    $lang['mobile']                     = "手提电话:";
    $lang['fax']                        = "传真 Fax:";
    $lang['bus_phone']                  = "商业电话:";
    $lang['address']                    = "地址:";
    $lang['postal']                     = "邮政号码:";
    $lang['city']                       = "城市:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "记事:";
    $lang['add_contact']                = "新增联络人";
    $lang['del_contact']                = "删除联络人";
    $lang['contact_info']               = "联络资料";
    $lang['contacts']                   = "联络";
    $lang['contact_add_info']           = "如果你加入公司名称就会连同联络人名称显示.";
    $lang['show_contact']               = "显示联络人";
    $lang['edit_contact']               = "修改联络人";
    $lang['contact_submit']             = "Contact submit";
    $lang['contact_warn']               = "欠缺必要的联络资料，请返回并补回联络人姓名";

 //files
    $lang['manage_files']               = "管理档案";
    $lang['no_files']                   = "未有被上载的档案可被管理";
    $lang['no_file_uploads']            = "这个系统被设定为不能上载档案";
    $lang['file']                       = "档案:";
    $lang['uploader']                   = "档案上载者:";
    $lang['files_assoc_project']        = "这个专案所相关的档案";
    $lang['files_assoc_task']           = "这个工作所相关的档案";
    $lang['file_admin']                 = "档案管理";
    $lang['add_file']                   = "新增档案";
    $lang['files']                      = "档案";
    $lang['file_choose']                = "会被上载的档案:";
    $lang['upload']                     = "上载";
    $lang['file_email_owner']           = "有新档案时向拥有者发出 Email ?";
    $lang['file_email_usergroup']       = "有新档案时向使用者组别发出 Email ?";
    $lang['max_file_sprt']              = "上载的档案大小要小于 %s kb.";
    $lang['file_submit']                = "提交档案";
    $lang['no_upload']                  = "没有上载到档案，请返回及再试。";
    $lang['file_too_big_sprt']          = "最大的上载档案大小是 %s 位元组。  你上载的档案太大所以被删除了。";
    $lang['del_file_javascript_sprt']   = "你确定要删除档案 %s ?";

 //forum
    $lang['orig_message']               = "原始信息:";
    $lang['post']                       = "张贴!";
    $lang['message']                    = "信息:";
    $lang['post_reply_sprt']            = "回应由 '%1\$s' 关于 '%2\$s' 的信息";
    $lang['post_message_sprt']          = "新增信息至: '%s'";
    $lang['forum_email_owner']          = "Email 讨论区的信息至拥有者?";
    $lang['forum_email_usergroup']      = "Email 讨论区的信息至使用者组别?";
    $lang['reply']                      = "回覆";
    $lang['new_post']                   = "新信息";
    $lang['public_user_forum']          = "公众使用者讨论区";
    $lang['private_forum_sprt']         = "'%s' 使用者组别的专用讨论区";
    $lang['forum_submit']               = "Forum submit";
    $lang['no_message']                 = "无信息!请返回再试";
    $lang['add_reply']                  = "新增回覆信息";
    $lang['last_post_sprt']             = "最后的信息于 %s 发布"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "最近的讨论区信息";
//**
    $lang['forum_search']               = "Forum search";
//**
    $lang['no_results']                 = "No results found for '%s'";
//**
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";


 //includes
    $lang['report']                     = "Report";
    $lang['warning']                    = "<h1>不好意思!</h1><p>我们现在未能处理你的要求，请稍后再试</p>";
    $lang['home_page']                  = "首页";
    $lang['summary_page']               = "摘要资讯";
    $lang['log_out']                    = "登出";
    $lang['main_menu']                  = "主选单";
    $lang['archive']                    = "封存";
    $lang['user_homepage_sprt']         = "%s 的首页";
    $lang['missing_field_javascript']   = "请在遣留的项目填回内容";
    $lang['invalid_date_javascript']    = "请选择一个有效的日期";
    $lang['finish_date_javascript']     = "你输入的日期比专案的完成日期更后!";
    $lang['security_manager']           = "保安管理员";
    $lang['session_timeout_sprt']       = "禁止查阅; 最后一次行动在 %1\$d 分钟前而且已逾时了 %2\$d 分钟，请 <a href=\"%3\$sindex.php\">重新登入</a>";
    $lang['access_denied']              = "禁止查阅";
    $lang['private_usergroup_no_access']= "对不起; 这个是私人使用者组别的范围而你未有查阅的权限";
    $lang['invalid_date']               = "无效的日期";
    $lang['invalid_date_sprt']          = "The date of %s is not a valid calendar date (Check the number of days in month).<br />Please go back and re-enter a valid date.";

 //taskgroups
    $lang['taskgroup_name']             = "工作组别名称:";
    $lang['taskgroup_description']      = "工作组别的简单描述:";
    $lang['add_taskgroup']              = "新增工作组别";
    $lang['add_new_taskgroup']          = "新增工作组别";
    $lang['edit_taskgroup']             = "修改工作组别";
    $lang['taskgroup_manage']           = "管理工作组别";
    $lang['no_taskgroups']              = "没有定义工作组别";
    $lang['manage_taskgroups']          = "管理工作组别";
    $lang['taskgroups']                 = "工作组别";
    $lang['taskgroup_dup_sprt']         = "已有 '%s' 工作组别，请返回并填写新的名称。";
    $lang['info_taskgroup_manage']      = "工作组别管理的资讯";

 //usergroups
    $lang['usergroup_name']             = "使用者组别名称:";
    $lang['usergroup_description']      = "使用者组别的简单描述:";
    $lang['members']                    = "成员:";
    $lang['private_usergroup']          = "私人使用者组别";
    $lang['add_usergroup']              = "新增使用者组别";
    $lang['add_new_usergroup']          = "新增使用者组别";
    $lang['edit_usergroup']             = "修改使用者组别";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "管理使用者组别";
    $lang['no_usergroups']              = "无使被定义的使用者组别";
    $lang['manage_usergroups']          = "管理使用者组别";
    $lang['usergroups']                 = "使用者组别";
    $lang['usergroup_dup_sprt']         = "已有使用者组别 '%s'. 请返回并选择另一个名称";
    $lang['info_usergroup_manage']      = "使用者组别管理的相关资讯";

 //users
    $lang['login_name']                 = "登入名称";
    $lang['full_name']                  = "全名";
    $lang['password']                   = "密码";
    $lang['blank_for_current_password'] = "(保持空白会使用现在的密码)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "系统管理员";
    $lang['private_user']               = "私人使用者";
    $lang['normal_user']                = "普通使用者";
    $lang['is_admin']                   = "是系统管理员?";
    $lang['is_guest']                   = "是访客?";
    $lang['guest']                      = "访客";
    $lang['user_info']                  = "使用者资讯";
    $lang['deleted_users']              = "删除使用者";
    $lang['no_deleted_users']           = "没有删除任何使用者.";
    $lang['revive']                     = "Revive";
    $lang['permdel']                    = "Permdel";
    $lang['permdel_javascript_sprt']    = "这样做会永久删除 %s 所有的纪录及相关的工作，你真的决定这样做?";
    $lang['add_user']                   = "新增使用者";
    $lang['edit_user']                  = "修改使用者资料";
    $lang['no_users']                   = "这个系统未有使用者";
    $lang['users']                      = "使用者";
    $lang['existing_users']             = "已有的使用者";
    $lang['private_profile']            = "这个使用者的资料是私人的所以你不可以观看";
    $lang['private_usergroup_profile']  = "(这个使用者是私人使用者组别的成员所以你不可以观看他的资料)";
    $lang['email_users']                = "向使用者发出 Email";
    $lang['select_usergroup']           = "下列选择了的使用者组别:";
    $lang['subject']                    = "主题:";
    $lang['message_sent_maillist']      = "In all cases the message is also copied to the mailing list.";
    $lang['who_online']                 = "那些使用者在线?";
    $lang['edit_details']               = "修改使用者资料";
    $lang['show_details']               = "显示使用者资料";
    $lang['user_deleted']               = "这个使用者已被删除!";
    $lang['no_usergroup']               = "这个使用者不是任何一个使用者组别的组员";
    $lang['not_usergroup']              = "(不是某任一个使用者组别的成员)";
    $lang['no_password_change']         = "(没有修改你旧有的密码)";
    $lang['last_time_here']             = "最后一次到访时间:";
    $lang['number_items_created']       = "创建项目的数量:";
    $lang['number_projects_owned']      = "拥有的专案:";
    $lang['number_tasks_owned']         = "拥有的工作:";
    $lang['number_tasks_completed']     = "完成了的工作数目:";
    $lang['number_forum']               = "在讨论区的发文数量:";
    $lang['number_files']               = "上载的档案数量:";
    $lang['size_all_files']             = "拥有的档案的总大细:";
    $lang['owned_tasks']                = "拥有的工作";
    $lang['invalid_email']              = "无效的 email 地址";
    $lang['invalid_email_given_sprt']   = "'%s' 是一个无效的 email 地址，请返回并再试";
    $lang['duplicate_user']             = "重复的使用者";
    $lang['duplicate_change_user_sprt'] = "'%s' 是已存在的使用者，请返回并修改名称。";
    $lang['value_missing']              = "Value missing";
    $lang['field_sprt']                 = "缺乏了 '%s' 项目的值，请返回并再填写";
    $lang['admin_priv']                 = "NOTE: You have been granted administrator privileges.";
    $lang['manage_users']               = "管理使用者";
    $lang['users_online']               = "在线使用者";
    $lang['online']                     = "Die hard surfers (六十分钟内在线的)";
    $lang['not_online']                 = "其他的";
    $lang['user_activity']              = "User activity";

  //tasks
    $lang['add_new_task']               = "新增专案";
    $lang['priority']                   = "重要程度";
    $lang['parent_task']                = "Parent";
    $lang['creation_time']              = "创建时间";
    $lang['by_sprt']                    = "由 %2\$s 于 %1\$s 创建"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "专案名称";
    $lang['task_name']                  = "工作名称";
    $lang['deadline']                   = "最后限期";
    $lang['taken_from_parent']          = "(Taken from parent)";
    $lang['status']                     = "状况";
    $lang['task_owner']                 = "工作负责人";
    $lang['project_owner']              = "专案负责人";
    $lang['taskgroup']                  = "工作组别";
    $lang['usergroup']                  = "使用者组别";
    $lang['nobody']                     = "无人";
    $lang['none']                       = "None";
    $lang['no_group']                   = "无组别";
    $lang['all_groups']                 = "全部组别";
    $lang['all_users']                  = "全部使用者";
    $lang['all_users_view']             = "是否所有使用者都可以查阅这个项目?";
    $lang['group_edit']                 = "是否所有在这组别内的使用者都可以修改?";
    $lang['project_description']        = "专案描述";
    $lang['task_description']           = "工作描述";
    $lang['email_owner']                = "有改变时向拥有者发出 email ?";
    $lang['email_new_owner']            = "有改变时向(新的)拥有者发出 email?";
    $lang['email_group']                = "有改变时向使用者组别发出 email ?";
    $lang['add_new_project']            = "新增专案";
    $lang['uncategorised']              = "未归类";
    $lang['due_sprt']                   = "现在起计 %d 日";
    $lang['tomorrow']                   = "明天";
    $lang['due_today']                  = "今日到期";
    $lang['overdue_1']                  = "已过期一天";
    $lang['overdue_sprt']               = "已过期 %d 天";
    $lang['edit_task']                  = "修改工作内容";
    $lang['edit_project']               = "修改专案内容";
    $lang['no_reparent']                = "没有 (最高层的专案)";
    $lang['del_javascript_project_sprt']= "将会删除专案: %s ! 你是否确定?";
    $lang['del_javascript_task_sprt']   = "将会删除工作: %s ! 你是曾确定?";
    $lang['add_task']                   = "新增工作";
    $lang['add_subtask']                = "新增副工作";
    $lang['add_project']                = "新增专案";
    $lang['clone_project']              = "复制专案";
    $lang['clone_task']                 = "复制工作";
    $lang['quick_jump']                 = "快速跳入";
    $lang['no_edit']                    = "你未拥有这项目所以不能修改它";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "删除专案";
    $lang['delete_task']                = "删除工作";
    $lang['project_options']            = "专案选项";
    $lang['task_options']               = "工作选项";
    $lang['javascript_archive_project'] = "这样做会封存专案: %s.  你确定?";
    $lang['archive_project']            = "封存专案";
    $lang['task_navigation']            = "浏览工作";
    $lang['new_task']                   = "新增工作";
    $lang['no_projects']                = "无可以查阅的专案";
    $lang['show_all_projects']          = "显示所有的专案";
    $lang['show_active_projects']       = "只显示活跃的专案";
    $lang['project_hold_sprt']          = "由 %s 暂停的专案";
    $lang['project_planned']            = "已计划的专案";
    $lang['percent_sprt']               = "这个工作已完成 %d%%";
    $lang['project_no_deadline']        = "这个专案没有最后限期";
    $lang['no_allowed_projects']        = "没有你可以查阅的专案";
    $lang['projects']                   = "专案";
    $lang['percent_project_sprt']       = "这个专案已完成 %d%%";
    $lang['owned_by']                   = "拥有者";
    $lang['created_on']                 = "创建于";
    $lang['completed_on']               = "完成于";
    $lang['modified_on']                = "修改于";
    $lang['project_on_hold']            = "专案暂停中";
    $lang['project_accessible']         = "(这个专案可被所有使用者公开查阅)";
    $lang['task_accessible']            = "(这个工作可被所有使用者公开查阅)";
    $lang['project_not_accessible']     = "(这个专案只可被使用者组别成员查阅)";
    $lang['task_not_accessible']        = "(这个工作只可被使用者组别成员查阅)";
    $lang['project_not_in_usergroup']   = "这个专案不属于使用者组别的部份及可以被所有使用者查阅";
    $lang['task_not_in_usergroup']      = "这个工作不属于使用者组别的部份及可以被所有使用者查阅";
    $lang['usergroup_can_edit_project'] = "这个专案也可以被使用者组别的成员修改";
    $lang['usergroup_can_edit_task']    = "这个工作也可以被使用者组别的成员修改";
    $lang['i_take_it']                  = "由我来承担这个专案 :)";
    $lang['i_finished']                 = "我完成了它!";
    $lang['i_dont_want']                = "我不再想拥有它";
    $lang['take_over_project']          = "Take over project";
    $lang['take_over_task']             = "Take over task";
    $lang['task_info']                  = "工作资讯";
    $lang['project_details']            = "专案的详细资料";
    $lang['todo_list_for']              = "谁的待办工作清单: ";
    $lang['due_in_sprt']                = " (还有 %d 日到期)";
    $lang['due_tomorrow']               = " (明天到期)";
    $lang['no_assigned']                = "这位使用者没有未完成的工作";
    $lang['todo_list']                  = "待办事项清单";
    $lang['summary_list']               = "摘要清单";
    $lang['task_submit']                = "提交工作";
    $lang['not_owner']                  = "禁止查阅。你不是拥有者或者没有足够权限";
    $lang['missing_values']             = "项目的输入的内容并不足够，请返回再试";
    $lang['future']                     = "将来";
    $lang['flags']                      = "标签";
    $lang['owner']                      = "拥有者";
    $lang['group']                      = "组别";
    $lang['by_usergroup']               = " (以使用者组别排列)";
    $lang['by_taskgroup']               = " (以工作组别排列)";
    $lang['by_deadline']                = " (以最后限期排列)";
    $lang['by_status']                  = " (以状况排列)";
    $lang['by_owner']                   = " (以拥有者排列)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "将会被复的专案 :";
    $lang['task_cloned']                = "将会被复制的工作 :";
    $lang['note_clone']                 = "注意:这个工作会被复制成一个新的专案";

//bits 'n' pieces
    $lang['calendar']                   = "月历";
    $lang['normal_version']             = "看普通版本";
    $lang['print_version']              = "看可供列印版本";
    $lang['condensed_view']             = "重点内容";
    $lang['full_view']                  = "全部内容";
//**
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>