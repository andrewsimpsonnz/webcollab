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

  Language files for 'ja' (Japanese)

  Maintainer: Tadashi Jokagi <elf2000 at users.sourceforge.net>

  NOTE: This file is written in UTF-8 character set

*/

//dates
$month_array = array (NULL, '1 月', '2 月', '3 月', '4 月', '5 月', '6 月', '7 月', '8 月', '9 月', '10 月', '11 月', '12月' );
$week_array = array('日', '月', '火', '水', '木', '金', '土' );

//task states

 //priorities
    $task_state['dontdo']               = "行ってない";
    $task_state['low']                  = "低い";
    $task_state['normal']               = "通常";
    $task_state['high']                 = "高い";
    $task_state['yesterday']            = "昨日!";
 //status
    $task_state['new']                  = "新規";
    $task_state['planned']              = "計画済み (未活動)";
    $task_state['active']               = "活動中 (作業中)";
    $task_state['cantcomplete']         = "保留中";
    $task_state['completed']            = "完了済み";
    $task_state['done']                 = "実行済み";
    $task_state['task_planned']         = " 計画済み";
    $task_state['task_active']          = " Active";
 //project states
    $task_state['planned_project']      = "計画済みプロジェクト (未活動)";
    $task_state['no_deadline_project']  = "デッドラインが設定されていない";
    $task_state['active_project']       = "活動プロジェクト";

//common items
    $lang['description']                = "説明";
    $lang['name']                       = "名前";
    $lang['add']                        = "追加";
    $lang['update']                     = "更新";
    $lang['submit_changes']             = "変更を送信";
    $lang['continue']                   = "継続";
    $lang['reset']                      = "リセット";
    $lang['manage']                     = "管理";
    $lang['edit']                       = "編集";
    $lang['delete']                     = "削除";
    $lang['del']                        = "削除";
    $lang['confirm_del_javascript']     = " 削除の確認!";
    $lang['yes']                        = "はい";
    $lang['no']                         = "いいえ";
    $lang['action']                     = "操作";
    $lang['task']                       = "タスク";
    $lang['tasks']                      = "タスク一覧";
    $lang['project']                    = "プロジェクト";
    $lang['info']                       = "情報";
    $lang['bytes']                      = " バイト";
    $lang['select_instruct']            = "(Use ctrl to select more; or to select none)";
    $lang['member_groups']              = "The user is a member of the highlighted groups below (if any)";
    $lang['login']                      = "ログイン";
    $lang['error']                      = "エラー";
    $lang['no_login']                   = "Access denied; incorrect login or password";
//**
    $lang['redirect_sprt']              = "You will automatically return to Login after a %d second delay";
//**
    $lang['login_now']                  = "Please click here to return to Login now";
    $lang['please_login']               = "ログインしてください";
    $lang['go']                         = "Go!";

//graphic items
    $lang['late_g']                     = "&nbsp;LATE&nbsp;";
    $lang['new_g']                      = "&nbsp;NEW&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPDATED&nbsp;";

//admin config
    $lang['admin_config']               = "管理設定";
    $lang['email_settings']             = "Email header settings";
    $lang['admin_email']                = "管理者メールアドレス";
    $lang['email_reply']                = "電子メールの返信先(Reply-To)";
    $lang['email_from']                 = "電子メールの差出人(From)";
    $lang['mailing_list']               = "メーリングリスト";
    $lang['default_checkbox']           = "プロジェクト/タスクのデフォルトチェックボックス設定";
    $lang['allow_globalaccess']         = "全体からアクセスを許可しますか?";
    $lang['allow_group_edit']           = "ユーザーグループに含まれるすべてへの編集を許可しますか?";
    $lang['set_email_owner']            = "常に変更を所有者に電子メールを送信しますか?";
    $lang['set_email_group']            = "常に変更をユーザーグループに電子メールを送信しますか?";
    $lang['project_listing_order']      = "プロジェクト一覧の表示順序";
    $lang['task_listing_order']         = "タスク一覧の表示順序";
    $lang['configuration']              = "設定";

//archive
    $lang['archived_projects']          = "書庫化されたプロジェクト";

//contacts
    $lang['firstname']                  = "名前(ファーストネーム):";
    $lang['lastname']                   = "苗字(ラストネーム):";
    $lang['company']                    = "企業名:";
    $lang['home_phone']                 = "自宅電話:";
    $lang['mobile']                     = "携帯電話:";
    $lang['fax']                        = "FAX:";
    $lang['bus_phone']                  = "業務電話:";
    $lang['address']                    = "住所:";
    $lang['postal']                     = "郵便番号:";
    $lang['city']                       = "都市:";
    $lang['email']                      = "電子メール:";
    $lang['notes']                      = "注釈:";
    $lang['add_contact']                = "連絡先の追加";
    $lang['del_contact']                = "連絡先の削除";
    $lang['contact_info']               = "連絡先情報";
    $lang['contacts']                   = "連絡先";
    $lang['contact_add_info']           = "If you add a company name then that will be displayed instead of the user's name.";
    $lang['show_contact']               = "連絡先の表示";
    $lang['edit_contact']               = "連絡先の編集";
    $lang['contact_submit']             = "連絡先の送信";
    $lang['contact_warn']               = "There are not enough values to add a contact; please go back and add at least first name and last name";

 //files
    $lang['manage_files']               = "ファイル管理";
    $lang['no_files']                   = "管理するアップロードされたファイルはありません";
    $lang['no_file_uploads']            = "このサイトはサーバーの設定によりファイルアップロードを許可していません";
    $lang['file']                       = "ファイル:";
    $lang['uploader']                   = "アップローダー:";
    $lang['files_assoc_project']        = "このプロジェクトに関連するファイル";
    $lang['files_assoc_task']           = "このタスクに関連するファイル";
    $lang['file_admin']                 = "ファイル管理者";
    $lang['add_file']                   = "ファイルの追加";
    $lang['files']                      = "ファイル";
    $lang['file_choose']                = "アップロードするファイル:";
    $lang['upload']                     = "アップロード";
    $lang['file_email_owner']           = "新規ファイルの通知を所有者にメール送信しますか?";
    $lang['file_email_usergroup']       = "新規ファイルの通知をユーザーグループにメール送信しますか?";
    $lang['max_file_sprt']              = "アップロードするファイルは %s キロバイト以下でなければなりません。";
    $lang['file_submit']                = "ファイル送信";
    $lang['no_upload']                  = "ファイルはアップロードされませんでした。戻って再挑戦してください。";
    $lang['file_too_big_sprt']          = "最大アップロードサイズは %s バイトです。アップロードは大きすぎるので削除されました。";
    $lang['del_file_javascript_sprt']   = "本当に %s を削除しますか ?";


 //forum
    $lang['orig_message']               = "元のメッセージ:";
    $lang['post']                       = "送信!";
    $lang['message']                    = "メッセージ:";
    $lang['post_reply_sprt']            = "Post a reply to a message from '%1\$s' about '%2\$s'";
    $lang['post_message_sprt']          = "次にメッセージを送信: '%s'";
    $lang['forum_email_owner']          = "フォーラムメッセージを所有者にメールしますか?";
    $lang['forum_email_usergroup']      = "フォーラムメッセージをユーザーグループにメールしますか?";
    $lang['reply']                      = "返信";
    $lang['new_post']                   = "新規投稿";
    $lang['public_user_forum']          = "公開ユーザーフォーラム";
    $lang['private_forum_sprt']         = "'%s' ユーザーグループのプライベートフォーラム";
    $lang['forum_submit']               = "フォーラム送信";
    $lang['no_message']                 = "メッセージがありません! 戻って再挑戦してください";
    $lang['add_reply']                  = "返信の追加";
    $lang['last_post_sprt']             = "最終投稿 %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "最近のフォーラムの投稿";
//**
    $lang['forum_search']               = "Forum search";
//**
    $lang['no_results']                 = "No results found for '%s'";
//**
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "報告";
    $lang['warning']                    = "<h1>Sorry!</h1><p>We are unable to process your request right now. Please try again later.</p>";
    $lang['home_page']                  = "ホームページ";
    $lang['summary_page']               = "要約ページ";
    $lang['todo_list']                  = "ToDo 一覧";
    $lang['calendar']                   = "カレンダー";
    $lang['log_out']                    = "ログアウト";
    $lang['main_menu']                  = "メインメニュー";
    $lang['archive']                    = "書庫";
    $lang['user_homepage_sprt']         = "%s のホームページ";
    $lang['missing_field_javascript']   = "不足フィールドの値を入力してください";
    $lang['invalid_date_javascript']    = "正しいカレンダーの日付を選択してください";
    $lang['finish_date_javascript']     = "入力された日付はプロジェクト完了予定日の後に発生します!";
    $lang['security_manager']           = "セキュリティ管理";
    $lang['session_timeout_sprt']       = "アクセス拒否; last action was %1\$d minutes ago and the timeout is %2\$d minutes; please <a href=\"%3\$sindex.php\">re-login</a>";
    $lang['access_denied']              = "アクセスが拒否されました";
    $lang['private_usergroup']          = "Sorry; this area is in a private usergroup and you do not have access rights.";
    $lang['invalid_date']               = "日付が正しくありません";
    $lang['invalid_date_sprt']          = "The date of %s is not a valid calendar date (Check the number of days in month).<br />Please go back and re-enter a valid date.";


 //taskgroups
    $lang['taskgroup_name']             = "タスクグループ名:";
    $lang['taskgroup_description']      = "タスクグループの簡単な説明:";
    $lang['add_taskgroup']              = "タスクグループ追加";
    $lang['add_new_taskgroup']          = "新規タスクグループを追加";
    $lang['edit_taskgroup']             = "タスクグループを編集";
    $lang['taskgroup_manage']           = "タスクグループ管理";
    $lang['no_taskgroups']              = "タスクグループが定義されてません。";
    $lang['manage_taskgroups']          = "タスクグループの管理";
    $lang['taskgroups']                 = "タスクグループ";
    $lang['taskgroup_dup_sprt']         = "タスクグループ 「%s」は既に存在するタスクグループです。戻って新しい名前を選びなおしてください。";
    $lang['info_taskgroup_manage']      = "タスクグループ管理の情報";

 //usergroups
    $lang['usergroup_name']             = "ユーザーグループ名:";
    $lang['usergroup_description']      = "ユーザーグループの簡単な説明:";
    $lang['members']                    = "メンバー一覧:";
    $lang['private_usergroup']          = "プライベートユーザーグループ";
    $lang['add_usergroup']              = "ユーザーグループの追加";
    $lang['add_new_usergroup']          = "新規ユーザーグループを追加";
    $lang['edit_usergroup']             = "ユーザーグループを編集";
    $lang['usergroup_manage']           = "ユーザーグループ管理";
    $lang['no_usergroups']              = "ユーザーグループが定義されてません。";
    $lang['manage_usergroups']          = "ユーザーグループ管理";
    $lang['usergroups']                 = "ユーザーグループ";
    $lang['usergroup_dup_sprt']         = "ユーザーグループ '%s' は既に存在します。戻って新しい名前を選んでください。";
    $lang['info_usergroup_manage']      = "ユーザーグループ管理の情報";

 //users
    $lang['login_name']                 = "ログイン名";
    $lang['full_name']                  = "フルネーム";
    $lang['password']                   = "パスワード";
    $lang['blank_for_current_password'] = "(空にすると現在のパスワード)";
    $lang['email']                      = "電子メール";
    $lang['admin']                      = "管理";
    $lang['private_user']               = "プライベートユーザー";
    $lang['normal_user']                = "通常ユーザー";
    $lang['is_admin']                   = "管理者ですか?";
    $lang['is_guest']                   = "ゲストですか?";
    $lang['guest']                      = "ゲストユーザー";
    $lang['user_info']                  = "ユーザー情報";
    $lang['deleted_users']              = "ユーザーを削除しました";
    $lang['no_deleted_users']           = "削除したユーザーはありません。";
    $lang['revive']                     = "復活";
    $lang['permdel']                    = "Permdel";
    $lang['permdel_javascript_sprt']    = "This will permanently delete all user records and associated tasks for %s. Do you really want to do this?";
    $lang['add_user']                   = "ユーザーの追加";
    $lang['edit_user']                  = "ユーザーの編集";
    $lang['no_users']                   = "No users are known to the system";
    $lang['users']                      = "ユーザー";
    $lang['existing_users']             = "既存のユーザー";
    $lang['private_profile']            = "This user has a private profile that cannot be viewed by you.";
    $lang['private_usergroup_profile']  = "(This user is a member of private usergroups that cannot be viewed by you)";
    $lang['email_users']                = "ユーザーにメール送信";
    $lang['select_usergroup']           = "下記から選択したユーザーグループ:";
    $lang['subject']                    = "件名:";
    $lang['message_sent_maillist']      = "In all cases the message is also copied to the mailing list.";
    $lang['who_online']                 = "誰がオンラインですか?";
    $lang['edit_details']               = "ユーザーの詳細を編集";
    $lang['show_details']               = "ユーザーの詳細を表示";
    $lang['user_deleted']               = "このユーザーを削除しました!";
    $lang['no_usergroup']               = "ユーザーはどのユーザーグループのメンバーでもありません";
    $lang['not_usergroup']              = "(どのユーザーグループのメンバーでもありません)";
    $lang['no_password_change']         = "(既存のパスワードを変更しませんでした)";
    $lang['last_time_here']             = "ここを見た最終時間:";
    $lang['number_items_created']       = "作成した項目の数:";
    $lang['number_projects_owned']      = "所有するプロジェクトの数:";
    $lang['number_tasks_owned']         = "所有するタスクの数:";
    $lang['number_tasks_completed']     = "完了したタスクの数:";
    $lang['number_forum']               = "投稿したフォーラムの数:";
    $lang['number_files']               = "アップロードしたファイルの数:";
    $lang['size_all_files']             = "すべての所有するファイルの合計サイズ:";
    $lang['owned_tasks']                = "所有するタスク";
    $lang['invalid_email']              = "電子メールアドレスが正しくないです";
    $lang['invalid_email_given_sprt']   = "電子メールアドレス '%s' は正しくありません。戻って再度試してください。";
    $lang['duplicate_user']             = "ユーザーの複製";
    $lang['duplicate_change_user_sprt'] = "ユーザー「%s」は既に存在します。戻って名前を変更してください。";
    $lang['value_missing']              = "値がありません";
    $lang['field_sprt']                 = "「%s」のフィールド値がありません。戻ってそれを埋めてください。";
    $lang['admin_priv']                 = "注: 管理者特権を与えられました。";
    $lang['manage_users']               = "ユーザー管理";
    $lang['users_online']               = "オンライン中のユーザー";
    $lang['online']                     = "Die hard surfers (60 分以内のオンライン)";
    $lang['not_online']                 = "The rest";
    $lang['user_activity']              = "User activity";

  //tasks
    $lang['add_new_task']               = "新規タスクの追加";
    $lang['priority']                   = "優先度";
    $lang['parent_task']                = "Parent";
    $lang['creation_time']              = "作成時間";
    $lang['by_sprt']                    = "%1\$s by %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "プロジェクト名";
    $lang['task_name']                  = "タスク名";
    $lang['deadline']                   = "デッドライン";
    $lang['taken_from_parent']          = "(Taken from parent)";
    $lang['status']                     = "状況";
    $lang['task_owner']                 = "タスク所有者";
    $lang['project_owner']              = "プロジェクト所有者";
    $lang['taskgroup']                  = "タスクグループ";
    $lang['usergroup']                  = "ユーザーグループ";
    $lang['nobody']                     = "匿名";
    $lang['none']                       = "なし";
    $lang['no_group']                   = "グループがありません";
    $lang['all_groups']                 = "すべてのグループ";
    $lang['all_users']                  = "すべてのユーザー";
    $lang['all_users_view']             = "この項目はすべてのユーザーで閲覧できますか?";
    $lang['group_edit']                 = "誰でもユーザーグループを編集できますか?";
    $lang['project_description']        = "プロジェクト詳細";
    $lang['task_description']           = "タスク詳細";
    $lang['email_owner']                = "変更があると所有者へ電子メールを送信しますか?";
    $lang['email_new_owner']            = "変更があると(新規)所有者へ電子メールを送信しますか?";
    $lang['email_group']                = "変更があるとユーザーグループへ電子メールを送信しますか?";
    $lang['add_new_project']            = "新規プロジェクトの追加";
    $lang['uncategorised']              = "未カテゴリ設定";
    $lang['due_sprt']                   = "%d days from now";
    $lang['tomorrow']                   = "明日";
    $lang['due_today']                  = "Due today";
    $lang['overdue_1']                  = "1 日の遅延です";
    $lang['overdue_sprt']               = "%d 日の遅延です";
    $lang['edit_task']                  = "タスクの編集";
    $lang['edit_project']               = "プロジェクトの編集";
    $lang['no_reparent']                = "なし (トップレベルプロジェクト)";
    $lang['del_javascript_project_sprt']= "プロジェクト %s を削除しようとしています。本当にしますか?";
    $lang['del_javascript_task_sprt']   = "タスク %s を削除しようとしています。本当にしますか?";
    $lang['add_task']                   = "タスクを追加";
    $lang['add_subtask']                = "サブタスクの追加";
    $lang['add_project']                = "プロジェクトを追加";
    $lang['clone_project']              = "プロジェクトを複製";
    $lang['clone_task']                 = "タスクを複製";
    $lang['quick_jump']                 = "クイックジャンプ";
    $lang['no_edit']                    = "You do not own this item and therefore you may not edit it";
    $lang['uncategorised']              = "未カテゴリ設定";
    $lang['admin']                      = "管理者";
    $lang['global']                     = "全体";
    $lang['delete_project']             = "プロジェクトを削除";
    $lang['delete_task']                = "タスクを削除";
    $lang['project_options']            = "プロジェクトオプション";
    $lang['task_options']               = "タスクオプション";
    $lang['javascript_archive_project'] = "これはプロジェクト %s を書庫化するでしょう。本当にしますか?";
    $lang['archive_project']            = "書庫プロジェクト";
    $lang['task_navigation']            = "タスクナビゲーション";
    $lang['new_task']                   = "新規タスク";
    $lang['no_projects']                = "There are no projects to view";
    $lang['show_all_projects']          = "すべてのプロジェクトを表示";
    $lang['show_active_projects']       = "有効なプロジェクトのみ表示";
    $lang['project_hold_sprt']          = "Project On Hold from %s";
    $lang['project_planned']            = "計画済みプロジェクト";
    $lang['percent_sprt']               = "タスクの %d%% が終了しました";
    $lang['project_no_deadline']        = "このプロジェクトはデッドエンドが設定されていません。";
    $lang['no_allowed_projects']        = "閲覧を許可されたプロジェクトはありません。";
    $lang['projects']                   = "Projects";
    $lang['percent_project_sprt']       = "このプロジェクトは %d%% 完了しました。";
    $lang['owned_by']                   = "所有者";
    $lang['created_on']                 = "作成日";
    $lang['completed_on']               = "完了日";
    $lang['modified_on']                = "修正日";
    $lang['project_on_hold']            = "プロジェクトは保留";
    $lang['project_accessible']         = "(このプロジェクトは、すべてのユーザーが公開アクセス可能です)";
    $lang['task_accessible']            = "(このタスクは、すべてのユーザーが公開アクセス可能です)";
    $lang['project_not_accessible']     = "(このプロジェクトは、ユーザーグループのメンバーのみアクセス可能です)";
    $lang['task_not_accessible']        = "(このタスクは、ユーザーグループのメンバーのみアクセス可能です)";
    $lang['project_not_in_usergroup']   = "このプロジェクトはユーザーグループの一部でなく、すべてのユーザーによってアクセス可能です。";
    $lang['task_not_in_usergroup']      = "このタスクはユーザーグループの一部でなく、すべてのユーザーによってアクセス可能です。";
    $lang['usergroup_can_edit_project'] = "ユーザーグループのメンバーもこのプロジェクトもを編集することができます。";
    $lang['usergroup_can_edit_task']    = "ユーザーグループのメンバーもこのタスクもを編集することができます。";
    $lang['i_take_it']                  = "I'll take it :)";
    $lang['i_finished']                 = "I finished it!";
    $lang['i_dont_want']                = "I don't want it anymore";
    $lang['take_over_project']          = "Take over project";
    $lang['take_over_task']             = "Take over task";
    $lang['task_info']                  = "タスク情報";
    $lang['project_details']            = "プロジェクト詳細";
    $lang['todo_list_for']              = "ToDo list for: ";
    $lang['due_in_sprt']                = " (%d 日まで)";
    $lang['due_tomorrow']               = " (明日まで)";
    $lang['no_assigned']                = "There are no uncompleted tasks assigned to this user.";
    $lang['todo_list']                  = "ToDo 一覧";
    $lang['summary_list']               = "要約一覧";
    $lang['task_submit']                = "タスク送信";
    $lang['not_owner']                  = "Access denied. Either you are not the owner; or you do not have enough rights";
    $lang['missing_values']             = "There are not enough field values provided; please go back and try again";
    $lang['future']                     = "Future";
    $lang['flags']                      = "フラグ一覧";
    $lang['owner']                      = "所有者";
    $lang['group']                      = "グループ";
    $lang['by_usergroup']               = " (ユーザーグループで)";
    $lang['by_taskgroup']               = " (タスクグループで)";
    $lang['by_deadline']                = " (デッドラインで)";
    $lang['by_status']                  = " (状況で)";
    $lang['by_owner']                   = " (所有者で)";
    $lang['project_cloned']             = "プロジェクトを複製しました :";
    $lang['task_cloned']                = "タスクを複製しました :";
    $lang['note_clone']                 = "注: タスクは新しいプロジェクトとして複製されるでしょう。";

//bits 'n' pieces
    $lang['calendar']                   = "カレンダー";
    $lang['normal_version']             = "通常バージョン";
    $lang['print_version']              = "印刷用バージョン";
//**
    $lang['condensed_view']             = "Condensed view";
//**
    $lang['full_view']                  = "Full view";
//**
    $lang['icalendar']                  = "iCalendar";

?>
