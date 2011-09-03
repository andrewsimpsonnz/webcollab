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
  Last updater: Hiromi Kimura <hiromi at tac.tsukuba.ac.jp>

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "ja" );

//dates
$month_array = array (NULL, '1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月' );
$week_array = array('日', '月', '火', '水', '木', '金', '土' );

//task states

 //priorities
    $task_state['dontdo']               = "休止";
    $task_state['low']                  = "低い";
    $task_state['normal']               = "通常";
    $task_state['high']                 = "高い";
    $task_state['yesterday']            = "昨日!";
 //status
    $task_state['new']                  = "新規";
    $task_state['planned']              = "計画済み (未活動)";
    $task_state['active']               = "活動中 (作業中)";
    $task_state['cantcomplete']         = "保留中";
    $task_state['completed']            = "完了";
    $task_state['done']                 = "実行済み";
    $task_state['task_planned']         = " 計画済み";
    $task_state['task_active']          = " 活動中";
 //project states
    $task_state['planned_project']      = "計画済みプロジェクト (未活動)";
    $task_state['no_deadline_project']  = "デッドラインなし";
    $task_state['active_project']       = "活動プロジェクト";

//common items
    $lang['description']                = "説明";
    $lang['name']                       = "名前";
    $lang['add']                        = "追加";
    $lang['update']                     = "更新";
    $lang['submit_changes']             = "変更を送信";
    $lang['continue']                   = "継続";
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
    $lang['select_instruct']            = "(CTRL キイで複数選択するか、選択を解除)";
    $lang['member_groups']              = "ユーザーは以下で強調表示されているグループのメンバーです";
    $lang['login']                      = "ログイン";
    $lang['login_action']               = "ログイン";
    $lang['login_screen']               = "ログイン";
    $lang['error']                      = "エラー";
    $lang['no_login']                   = "アクセスできません：ユーザ名かパスワードが間違っています";
    $lang['redirect_sprt']              = "%d 秒後にログイン画面に戻ります";
    $lang['login_now']                  = "ここをクリックしてログイン画面に戻って下さい";
    $lang['please_login']               = "ログインしてください";
    $lang['go']                         = "Go!";

//graphic items
    $lang['late_g']                     = "&nbsp;LATE&nbsp;";
    $lang['new_g']                      = "&nbsp;NEW&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPDATED&nbsp;";

//admin config
    $lang['admin_config']               = "管理設定";
    $lang['email_settings']             = "電子メールのヘッダー設定";
    $lang['admin_email']                = "管理者メールアドレス";
    $lang['email_reply']                = "電子メールの返信先(Reply-To)";
    $lang['email_from']                 = "電子メールの差出人(From)";
    $lang['mailing_list']               = "メーリングリスト";
    $lang['default_checkbox']           = "プロジェクト/タスクのデフォルトチェックボックス設定";
    $lang['allow_globalaccess']         = "全体からアクセスを許可しますか?";
    $lang['allow_group_edit']           = "ユーザーグループの全員へ編集を許可しますか?";
    $lang['set_email_owner']            = "変更があったら、所有者に電子メールを送信しますか?";
    $lang['set_email_group']            = "変更があったら、ユーザーグループに電子メールを送信しますか?";
    $lang['project_listing_order']      = "プロジェクト一覧の表示順序";
    $lang['task_listing_order']         = "タスク一覧の表示順序";
    $lang['configuration']              = "設定";

//archive
    $lang['archived_projects']          = "アーカイブされたプロジェクト";

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
    $lang['email_contact']              = "電子メール:";
    $lang['notes']                      = "注釈:";
    $lang['add_contact']                = "連絡先の追加";
    $lang['del_contact']                = "連絡先の削除";
    $lang['contact_info']               = "連絡先情報";
    $lang['contacts']                   = "連絡先";
    $lang['contact_add_info']           = "企業名を入力すると、ユーザ名より先に表示されます。";
    $lang['show_contact']               = "連絡先の表示";
    $lang['edit_contact']               = "連絡先の編集";
    $lang['contact_submit']             = "連絡先の送信";
    $lang['contact_warn']               = "連絡先の追加に必要な値が入力されていません。少なくとも名前と苗字は必要です";

 //files
    $lang['manage_files']               = "ファイル管理";
    $lang['no_files']                   = "管理すべきアップロードされたファイルはありません";
    $lang['no_file_uploads']            = "このサイトはサーバーの設定によりファイルアップロードを許可していません";
    $lang['file']                       = "ファイル:";
    $lang['uploader']                   = "アップローダー:";
    $lang['files_assoc_project']        = "このプロジェクトに関連するファイル";
    $lang['files_assoc_task']           = "このタスクに関連するファイル";
    $lang['file_admin']                 = "ファイルの管理";
    $lang['add_file']                   = "ファイルの追加";
    $lang['files']                      = "ファイル";
    $lang['file_choose']                = "アップロードするファイル:";
    $lang['upload']                     = "アップロード";
    $lang['file_email_owner']           = "新規ファイルの通知を所有者にメール送信しますか?";
    $lang['file_email_usergroup']       = "新規ファイルの通知をユーザーグループにメール送信しますか?";
    $lang['max_file_sprt']              = "アップロードするファイルは %s kB 以下でなければなりません。";
    $lang['file_submit']                = "ファイル送信";
    $lang['no_upload']                  = "ファイルはアップロードされませんでした。戻って再度試してください。";
    $lang['file_too_big_sprt']          = "最大アップロードサイズは %s バイトです。アップロードファイルは大きすぎるので削除されました。";
    $lang['del_file_javascript_sprt']   = "本当に %s を削除しますか ?";


 //forum
    $lang['orig_message']               = "元のメッセージ:";
    $lang['post']                       = "送信!";
    $lang['message']                    = "メッセージ:";
    $lang['post_reply_sprt']            = "'%1\$s' さんの '%2\$s' メッセージに返信を送る";
    $lang['post_message_sprt']          = "'%s' にメッセージを送信";
    $lang['forum_email_owner']          = "フォーラムメッセージを所有者にメールしますか?";
    $lang['forum_email_usergroup']      = "フォーラムメッセージをユーザーグループにメールしますか?";
    $lang['reply']                      = "返信";
    $lang['new_post']                   = "新規投稿";
    $lang['public_user_forum']          = "公開ユーザーフォーラム";
    $lang['private_forum_sprt']         = "'%s' ユーザーグループのプライベートフォーラム";
    $lang['forum_submit']               = "フォーラム送信";
    $lang['no_message']                 = "メッセージがありません! 戻って再度試してください";
    $lang['add_reply']                  = "返信の追加";
    $lang['last_post_sprt']             = "最終投稿 %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "最近のフォーラムの投稿";
    $lang['forum_search']               = "フォーラム検索";
    $lang['no_results']                 = "'%s' について何も見つかりませんでした";
    $lang['search_results']             = "'%2\$s' の検索結果は %1\$s 件ありました<br />結果の %3\$s 件から %4\$s 件まで表示します";

 //includes
    $lang['report']                     = "報告";
    $lang['warning']                    = "<h1>済みません！</h1><p>あなたの要求を処理できませんでした。後で再度試して下さい。</p>";
    $lang['home_page']                  = "ホームページ";
    $lang['summary_page']               = "要約ページ";
    $lang['log_out']                    = "ログアウト";
    $lang['main_menu']                  = "メインメニュー";
    $lang['archive']                    = "アーカイブ";
    $lang['user_homepage_sprt']         = "%s のホームページ";
    $lang['missing_field_javascript']   = "不足フィールドの値を入力してください";
    $lang['invalid_date_javascript']    = "正しいカレンダーの日付を選択してください";
    $lang['finish_date_javascript']     = "入力された日付はプロジェクト完了予定日の後に発生します!";
    $lang['security_manager']           = "セキュリティ管理";
    $lang['session_timeout_sprt']       = "アクセスが拒否されました。タイムアウトの設定は %2\$d 分ですが、最後の操作は %1\$d 分前でした。どうか <a href=\"%3\$sindex.php\">再ログイン</a> して下さい";
    $lang['access_denied']              = "アクセスが拒否されました";
    $lang['private_usergroup_no_access']= "済みません。ここはプライベートユーザーグループの領域で、あなたにはアクセス権がありません。";
    $lang['invalid_date']               = "日付が正しくありません";
    $lang['invalid_date_sprt']          = "日付 %s は正しいカレンダーの日付ではありません（日月の日にちを確認）。<br />戻って、正しい値を入力して下さい。";


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
    $lang['taskgroup_dup_sprt']         = "タスクグループ '%s' は既に存在します。戻って新しい名前を選んで下さい。";
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
    $lang['usergroup_dup_sprt']         = "ユーザーグループ '%s' は既に存在します。戻って新しい名前を選んで下さい。";
    $lang['info_usergroup_manage']      = "ユーザーグループ管理の情報";

 //users
    $lang['login_name']                 = "ログイン名";
    $lang['full_name']                  = "フルネーム";
    $lang['password']                   = "パスワード";
    $lang['blank_for_current_password'] = "(空にすると現在のパスワード)";
    $lang['email']                      = "電子メール";
    $lang['admin']                      = "管理者";
    $lang['private_user']               = "プライベートユーザー";
    $lang['normal_user']                = "通常ユーザー";
    $lang['is_admin']                   = "管理者ですか?";
    $lang['is_guest']                   = "ゲストですか?";
    $lang['guest']                      = "ゲストユーザー";
    $lang['user_info']                  = "ユーザー情報";
    $lang['deleted_users']              = "削除されたユーザー";
    $lang['no_deleted_users']           = "削除されたユーザーはいません。";
    $lang['revive']                     = "復活";
    $lang['permdel']                    = "完全削除";
    $lang['permdel_javascript_sprt']    = "この操作で全てのユーザーデータや %s に関連するタスクが完全に削除されます。本当に実行しますか？";
    $lang['add_user']                   = "ユーザーの追加";
    $lang['edit_user']                  = "ユーザーの編集";
    $lang['no_users']                   = "ユーザーは誰もいません";
    $lang['users']                      = "ユーザー";
    $lang['existing_users']             = "既存のユーザー";
    $lang['private_profile']            = "このユーザのプライベートなプロファイルはあなたには閲覧できません。";
    $lang['private_usergroup_profile']  = "(このユーザはプライベートなユーザーグループのメンバーで、あなたには閲覧できません)";
    $lang['email_users']                = "ユーザーにメール送信";
    $lang['select_usergroup']           = "下記から選択したユーザーグループ:";
    $lang['subject']                    = "件名:";
    $lang['message_sent_maillist']      = "どの場合でもメッセージはメーリングリストにもコピーされます。";
    $lang['who_online']                 = "オンラインユーザー";
    $lang['edit_details']               = "ユーザーの詳細を編集";
    $lang['show_details']               = "ユーザーの詳細を表示";
    $lang['user_deleted']               = "このユーザーは削除されました!";
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
    $lang['size_all_files']             = "所有するファイルの合計サイズ:";
    $lang['owned_tasks']                = "所有するタスク";
    $lang['invalid_email']              = "電子メールアドレスが正しくありません";
    $lang['invalid_email_given_sprt']   = "電子メールアドレス '%s' は正しくありません。戻って再度試してください。";
    $lang['duplicate_user']             = "ユーザーの複製";
    $lang['duplicate_change_user_sprt'] = "ユーザー '%s' は既に存在します。戻って名前を変更してください。";
    $lang['value_missing']              = "値がありません";
    $lang['field_sprt']                 = "'%s'のフィールド値がありません。戻ってそれを埋めてください。";
    $lang['admin_priv']                 = "注: 管理者特権を与えられました。";
    $lang['manage_users']               = "ユーザー管理";
    $lang['users_online']               = "オンライン中のユーザー";
    $lang['online']                     = "活発な人 (60 分以内のオンライン)";
    $lang['not_online']                 = "その他";
    $lang['user_activity']              = "ユーザの活動状況";

  //tasks
    $lang['add_new_task']               = "新規タスクの追加";
    $lang['priority']                   = "優先度";
    $lang['parent_task']                = "親";
    $lang['creation_time']              = "作成日付";
    $lang['by_sprt']                    = "%1\$s   作成者： %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "プロジェクト名";
    $lang['task_name']                  = "タスク名";
    $lang['deadline']                   = "デッドライン";
    $lang['taken_from_parent']          = "(親から継承)";
    $lang['status']                     = "状況";
    $lang['task_owner']                 = "タスク所有者";
    $lang['project_owner']              = "プロジェクト所有者";
    $lang['taskgroup']                  = "タスクグループ";
    $lang['usergroup']                  = "ユーザーグループ";
    $lang['nobody']                     = "未定";
    $lang['none']                       = "なし";
    $lang['no_group']                   = "グループがありません";
    $lang['all_groups']                 = "すべてのグループ";
    $lang['all_users']                  = "すべてのユーザー";
    $lang['all_users_view']             = "全ユーザーが閲覧可能ですか?";
    $lang['group_edit']                 = "ユーザーグループの誰でも編集可能ですか?";
    $lang['project_description']        = "プロジェクト詳細";
    $lang['task_description']           = "タスク詳細";
    $lang['email_owner']                = "変更があったら、所有者へ電子メールを送信しますか?";
    $lang['email_new_owner']            = "変更があったら、(新規)所有者へ電子メールを送信しますか?";
    $lang['email_group']                = "変更があったら、ユーザーグループへ電子メールを送信しますか?";
    $lang['add_new_project']            = "新規プロジェクトの追加";
    $lang['uncategorised']              = "未カテゴリ設定";
    $lang['due_sprt']                   = "今から %d 日後";
    $lang['tomorrow']                   = "明日";
    $lang['due_today']                  = "今日が期日です";
    $lang['overdue_1']                  = "1 日の遅延です";
    $lang['overdue_sprt']               = "%d 日の遅延です";
    $lang['edit_task']                  = "タスクの編集";
    $lang['edit_project']               = "プロジェクトの編集";
    $lang['no_reparent']                = "なし (トップレベルプロジェクト)";
    $lang['del_javascript_project_sprt']= "プロジェクト %s を削除しようとしています。本当に実行しますか?";
    $lang['del_javascript_task_sprt']   = "タスク %s を削除しようとしています。本当に実行しますか?";
    $lang['add_task']                   = "タスクを追加";
    $lang['add_subtask']                = "サブタスクの追加";
    $lang['add_project']                = "プロジェクトを追加";
    $lang['clone_project']              = "プロジェクトを複製";
    $lang['clone_task']                 = "タスクを複製";
    $lang['quick_jump']                 = "クイックジャンプ";
    $lang['no_edit']                    = "この項目はあなたの所有ではありませんので、編集できません";
    $lang['global']                     = "全体";
    $lang['delete_project']             = "プロジェクトを削除";
    $lang['delete_task']                = "タスクを削除";
    $lang['project_options']            = "プロジェクトオプション";
    $lang['task_options']               = "タスクオプション";
    $lang['javascript_archive_project'] = "プロジェクト %s をアーカイブします。本当に実行しますか?";
    $lang['archive_project']            = "プロジェクトをアーカイブ";
    $lang['task_navigation']            = "タスクナビゲーション";
    $lang['new_task']                   = "新規タスク";
    $lang['no_projects']                = "表示すべきプロジェクトはありません";
    $lang['show_all_projects']          = "すべてのプロジェクトを表示";
    $lang['show_active_projects']       = "有効なプロジェクトのみ表示";
    $lang['project_hold_sprt']          = "プロジェクトは %s から保留中です";
    $lang['project_planned']            = "計画済みプロジェクト";
    $lang['percent_sprt']               = "タスクの %d%% が終了しました";
    $lang['project_no_deadline']        = "このプロジェクトはデッドエンドが設定されていません。";
    $lang['no_allowed_projects']        = "閲覧を許可されたプロジェクトはありません。";
    $lang['projects']                   = "プロジェクト一覧";
    $lang['percent_project_sprt']       = "このプロジェクトは %d%% 完了しました。";
    $lang['owned_by']                   = "所有者";
    $lang['created_on']                 = "作成日";
    $lang['completed_on']               = "完了日";
    $lang['modified_on']                = "修正日";
    $lang['project_on_hold']            = "プロジェクトは保留中です";
    $lang['project_accessible']         = "(このプロジェクトは、すべてのユーザーがアクセス可能です)";
    $lang['task_accessible']            = "(このタスクは、すべてのユーザーがアクセス可能です)";
    $lang['project_not_accessible']     = "(このプロジェクトは、ユーザーグループのメンバーのみアクセス可能です)";
    $lang['task_not_accessible']        = "(このタスクは、ユーザーグループのメンバーのみアクセス可能です)";
    $lang['project_not_in_usergroup']   = "このプロジェクトはユーザーグループの一部でなく、すべてのユーザーによってアクセス可能です。";
    $lang['task_not_in_usergroup']      = "このタスクはユーザーグループの一部でなく、すべてのユーザーによってアクセス可能です。";
    $lang['usergroup_can_edit_project'] = "ユーザーグループのメンバーもこのプロジェクトを編集することができます。";
    $lang['usergroup_can_edit_task']    = "ユーザーグループのメンバーもこのタスクを編集することができます。";
    $lang['i_take_it']                  = "私がやります:-)";
    $lang['i_finished']                 = "完了しました!";
    $lang['i_dont_want']                = "もう必要ありません";
    $lang['take_over_project']          = "プロジェクトを引き継ぐ";
    $lang['take_over_task']             = "タスクを引き継ぐ";
    $lang['task_info']                  = "タスク情報";
    $lang['project_details']            = "プロジェクト詳細";
    $lang['todo_list_for']              = "ToDo 一覧: ";
    $lang['due_in_sprt']                = " (期日まで %d 日)";
    $lang['due_tomorrow']               = " (期日は明日)";
    $lang['no_assigned']                = "このユーザに割り当てられた未完のタスクはありません。";
    $lang['todo_list']                  = "ToDo 一覧";
    $lang['summary_list']               = "要約一覧";
    $lang['task_submit']                = "タスク送信";
    $lang['not_owner']                  = "アクセスが拒否されました。あなたは所有者でないか、必要な権利を持っていません";
    $lang['missing_values']             = "必要な項目の値がありません。戻って、再度試して下さい";
    $lang['future']                     = "将来";
    $lang['flags']                      = "フラグ";
    $lang['owner']                      = "所有者";
    $lang['group']                      = "グループ";
    $lang['by_usergroup']               = " (ユーザーグループで)";
    $lang['by_taskgroup']               = " (タスクグループで)";
    $lang['by_deadline']                = " (デッドラインで)";
    $lang['by_status']                  = " (状況で)";
    $lang['by_owner']                   = " (所有者で)";
    $lang['by_priority']                = " (優先度で)";
    $lang['project_cloned']             = "プロジェクトを複製しました :";
    $lang['task_cloned']                = "タスクを複製しました :";
    $lang['note_clone']                 = "注: タスクは新しいプロジェクトとして複製されるでしょう。";

//bits 'n' pieces
    $lang['calendar']                   = "カレンダー";
    $lang['normal_version']             = "通常バージョン";
    $lang['print_version']              = "印刷用バージョン";
    $lang['condensed_view']             = "簡易表示";
    $lang['full_view']                  = "詳細表示";
    $lang['icalendar']                  = "iCalendar";
    $lang['url_javascript']             = "URL を入力:";
    $lang['image_url_javascript']       = "画像の URL を入力:";

?>
