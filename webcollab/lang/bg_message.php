<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

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

  Language files for 'bg' (Bulgarian)

  Maintainer: Stoyan Dimitrov <stoyan at adiumdesign dot com>

  
  NOTE: This file is written in ISO-8859-5 character set
    
*/

/*
General formatting:

"xxxx"     == string in title case (eg: "Project")

"xxxx_sprt" == formatted print string (eg: "Files associated with this %s" - where %s is inserted by the code)

              Formatted strings with %1/$s, %2/$s, %3/$s etc. can have parameters interchanged - as in:

                 "Message from %1\$s about %2\$s" _could also be_ "Message about %2\$s from %1\$s"

              This can be useful for translating to different languages.

 "xxxx_g" == graphical string

 "xxxx_javascript == javascript string with single quotes escaped as in "Confirmer l\'effacement!"

*/

//required language encodings
//$web_charset                        = "windows-1251";
//$email_charset                      = "windows-1251";
$web_charset                        = "ISO-8859-5";
$email_charset                      = "ISO-8859-5";

//dates
$month_array                        = array (NULL, "���", "���", "���", "���", "���", "���", "���", "���", "���", "���", "���", "���" );
$week_array                         = array('���', '���', '���', '���', '���', '���', '���' );

//task states
$task_state = array(
//priorities
    "dontdo"                        => "�����",
    "low"                           => "�����",
    "normal"                        => "��������",
    "high"                          => "�����",
    "yesterday"                     => "�� �����!",
//status
    "new"                           => "���",
    "planned"                       => "�������� (���������)",
    "active"                        => "������� (� ������)",
    "cantcomplete"                  => "� ������",
    "completed"                     => "���������",
    "done"                          => "�����",
    "task_planned"                  => " ��������",
    "task_active"                   => " �������",
//project states
    "planned_project"               => "�������� ������ (���������)",
    "no_deadline_project"           => "���� ����� ����",
    "active_project"                => "������� ������"
);

//common items
$lang = array(
    "description"                   => "��������",
    "name"                          => "���",
    "add"                           => "������",
    "update"                        => "������",
    "submit_changes"                => "������",
    "continue"                      => "��������",
    "reset"                         => "�������",
    "manage"                        => "����������",
    "edit"                          => "�������",
    "delete"                        => "������",
    "del"                           => "������",
    "confirm_del_javascript"        => "���������� ���������!",
    "yes"                           => "��",
    "no"                            => "��",
    "action"                        => "��������",
    "task"                          => "������",
    "tasks"                         => "������",
    "project"                       => "������",
    "info"                          => "����������",
    "bytes"                         => " �����",
    "select_instruct"               => " (� Ctrl �� ������� ������ �� ���� �����)",
    "member_groups"                 => "������������ � ���� �� ���������� ����� (��� ���)",
    "login"                         => "����",
    "error"                         => "������",
    "no_login"                      => "�������� �������, ������ ��� ��� ������",
    "please_login"                  => "���� ������",
//graphic items
    "late_g"                        => "&nbsp;����������&nbsp;",
    "new_g"                         => "&nbsp;����&nbsp;",
    "updated_g"                     => "&nbsp;��������&nbsp;",
//admin config
    "admin_config"                  => "����� ���������",
    "email_settings"                => "�-���� ��������� �� header",
    "admin_email"                   => "����� �-����",
    "email_reply"                   => "�-���� 'reply to'",
    "email_from"                    => "�-���� 'from'",
    "mailing_list"                  => "�������� ������",
    "default_checkbox"              => "������������ �� ��������� �� ������ / ������",
    "allow_globalaccess"            => "������� �������� ������",
    "allow_group_edit"              => "������� ����� � ������� �� �������",
    "set_email_owner"               => "������ �������� ����� �� ����������� � ���������",
    "set_email_group"               => "������ �������� ����� �� ������� � ���������",
    "configuration"                 => "�������������",
//contacts
    "firstname"                     => "���:",
    "lastname"                      => "�������:",
    "company"                       => "��������:",
    "home_phone"                    => "������� �������:",
    "mobile"                        => "������� �������:",
    "fax"                           => "����-�����:",
    "bus_phone"                     => "�������� �������:",
    "address"                       => "�����:",
    "postal"                        => "�������� ���:",
    "city"                          => "����:",
    "email"                         => "�-����:",
    "notes"                         => "�������:",
    "add_contact"                   => "������ �������",
    "del_contact"                   => "������ �������",
    "contact_info"                  => "��������� ����������",
    "contacts"                      => "��������",
    "contact_add_info"              => "��� ���� �������� ��� �� �������� ������ �� �� ���� ��������� ������ ���������������.",
    "show_contact"                  => "������ �������",
    "edit_contact"                  => "������� �������",
    "contact_submit"                => "������ �������",
    "contact_warn"                  => "���� ���������� ����� �� �������� �� �������, ���� ������� �� � �������� ���� '���' � '�������'",
//files
    "manage_files"                  => "���������� �������",
    "no_files"                      => "���� ������ �������",
    "no_file_uploads"               => "�������������� �� ������� �� ���� �������� �� ��������� ��������� �� �������",
    "file"                          => "����:",
    "uploader"                      => "�������:",
    "files_assoc_project"           => "������� ��� ���� ������",
    "files_assoc_task"              => "������� ��� ���� ������",
    "file_admin"                    => "����������",
    "add_file"                      => "������ ����",
    "files"                         => "�������",
    "file_choose"                   => "���� �� �������:",
    "upload"                        => "�������",
    "file_email_owner"              => "�������� �� �� �������� ����� ��� ������� �� ���� �� �����������?",
    "file_email_usergroup"          => "����� �� ������� ��� ������� �� ����",
    "max_file_sprt"                 => "������ �� ������� ������ �� � ���� %s ��.",
    "file_submit"                   => "�������",
    "no_upload"                     => "������  �� �� �����. ����, ������� �� ������� � ��������� ������.",
    "file_too_big_sprt"             => "������������ ������� �� ����� ������ �� � %s �����. ������ ���� � ������ ����� �� �������.",
    "del_file_javascript_sprt"      => "������� �� ��� � ����������� �� \'%s\' ?",
//forum
    "orig_message"                  => "���������� ���������:",
    "post"                          => "�������",
    "message"                       => "���������:",
    "post_reply_sprt"               => "����� ������� �� ��������� �� '%1\$s' ������� '%2\$s'",
    "post_message_sprt"             => "��������� ��: '%s'",
    "forum_email_owner"             => "����� ��� ���������� �� �����������",
    "forum_email_usergroup"         => "����� ��� ���������� �� ��������������� �����",
    "reply"                         => "��������",
    "new_post"                      => "���� ������",
    "public_user_forum"             => "�������� �����",
    "private_forum_sprt"            => "����������� ����� �� '%s' �����",
    "forum_submit"                  => "[Forum submit]",
    "no_message"                    => "���� ���������! ����, ������� �� ������� � ��������� ���",
    "add_reply"                     => "������ �������",

//includes
    "report"                        => "���������",
    "warning"                       => "<h1>������!</h1><p>����������� �� ������ ������ � ������� � ����������. ���� �������� ������.</p>",
    "home_page"                     => "������",
    "summary_page"                  => "����������",
    "todo_list"                     => "����� ������",
    "calendar"                      => "��������",
    "log_out"                       => "�����",
    "main_menu"                     => "����",
    "user_homepage_sprt"            => "���������� �� <b>%s</b>",
//"load_time_sprt"                  => "���������� ���� %1\$.3f ������� �� ���������. �� ��� %2\$.3f ������� ���� �������� �� %3\$d ���������� � ������ �����",
    "missing_field_javascript"      => "���� �������� ���������� ��������!",
    "invalid_date_javascript"       => "���� �������� ������� ���������� ����",
    "finish_date_javascript"        => "��������� ���� � ���� ������ �� ����������� �� �������!",
    "security_manager"              => "���������� �� �����������",
// "no_key_sprt"                    => "���� ������� ���� �� �����. ���� <a href=\"%sindex.php\">������</a>",
// "no_session"                     => "���� ������ �����, ���� <a href=\"%sindex.php\">������</a>",
    "session_timeout_sprt"          => "�������� �������, ���������� �� �������� � ���� ����� %1\$d ������, � ������� �� ������ �� %2\$d ������, ���� <a href=\"%3\$sindex.php\">������</a> ������",
    "access_denied"                 => "�������� �������",
    "private_usergroup"             => "������, ���� ���� � �� ����������� ������������� �����, � ��� ������ ����� �� ������ �� ���.",
    "invalid_date"                  => "��������� ����",
    "invalid_date_sprt"             => "������ \'%s\' � ��������� ���������� ���� (��������� ���� �� ����� � ������).<br />���� ������� �� � �������� �������� ����.",
//taskgroups
    "taskgroup_name"                => "���:",
    "taskgroup_description"         => "��������:",
    "add_taskgroup"                 => "������ ������",
    "add_new_taskgroup"             => "�������� �� ����� ������",
    "edit_taskgroup"                => "������� ����� ������",
    "taskgroup_manage"              => "���������� �� ����� ������",
    "no_taskgroups"                 => "���� ���������� ����� ������",
    "manage_taskgroups"             => "���������� �� ����� ������",
    "taskgroups"                    => "����� ������",
    "taskgroup_dup_sprt"            => "���� ��� ����� ������ � ��� '%s'. ���� ������� �� � �������� ����� ���.",
    "info_taskgroup_manage"         => "����������",
//usergroups
    "usergroup_name"                => "���:",
    "usergroup_description"         => "��������:",
    "members"                       => "�������:",
    "private_usergroup"             => "����������� �����",
    "add_usergroup"                 => "������",
    "add_new_usergroup"             => "�������� �� ������������� �����",
    "edit_usergroup"                => "�������",
    "usergroup_manage"              => "���������� �� ������������� �����",
    "no_usergroups"                 => "���� ���������� ������������� �����",
    "manage_usergroups"             => "���������� �� ������������� �����",
    "usergroups"                    => "������������� �����",
    "usergroup_dup_sprt"            => "���� ��� ������������� ����� � ��� '%s'. ���� ������� �� � �������� ����� ���.",
    "info_usergroup_manage"         => "����������",
//users
    "login_name"                    => "����������",
    "full_name"                     => "���",
    "password"                      => "������",
    "blank_for_current_password"    => "(�������� ������, ��� �� ������ �� ������� ��������)",
    "email"                         => "�-����",
    "admin"                         => "�����",
//**
    "private_user"                  => "�����������",
    "is_admin"                      => "�������������",
    "user_info"                     => "���� �� �����������",
    "deleted_users"                 => "������� �����������",
    "no_deleted_users"              => "<i>���� ������� �����������</i>",
    "revive"                        => "����������",
    "permdel"                       => "����� ���������",
    "permdel_javascript_sprt"       => "�������� ����� ��������� �� ������ ������������� ������ � ���������� � \'%s\' ������. ������� �� ���, �� �� ������?",
    "add_user"                      => "�������� �� ����������",
    "edit_user"                     => "������� ������� �� ����������",
    "no_users"                      => "���� ������������ ����������� � ���������",
    "users"                         => "�����������",
    "existing_users"                => "��������� �����������",
    "private_profile"               => "���� ���������� ��� ����������� ������, ����� �� ���� �� ���� �����.",
    "private_usergroup_profile"     => "(���� ���������� � ���� �� ����������� ������������� ����� � �� ���� �� ���� ��������� �� ���)",
    "email_users"                   => "�����",
    "select_usergroup"              => "��������� ������������� �����:",
    "subject"                       => "�������:",
    "message_sent_maillist"         => "��� ������ ������ � ����������� �� ���� �������� � ��������� ������.",
    "who_online"                    => "��� � ���?",
    "edit_details"                  => "������� �����",
    "show_details"                  => "���� �� �����������",
    "user_deleted"                  => "���� ���������� �� ������!",
    "no_usergroup"                  => "������������ �� � ���� �� ����� ������������� �����",
    "not_usergroup"                 => "(�� � ���� �� ������������� �����)",
    "no_password_change"            => "(������ ������ �� �� �������)",
    "last_time_here"                => "�� �������� ��� ���� ���:",
    "number_items_created"          => "���� ��������� items:",
    "number_projects_owned"         => "���� ����������� �������:",
    "number_tasks_owned"            => "���� ����������� ������:",
    "number_tasks_completed"        => "���� ��������� ������:",
    "number_forum"                  => "���� ������ ��� ������:",
    "number_files"                  => "���� ������ �������:",
    "size_all_files"                => "��� ������ �� ������������� �������:",
    "owned_tasks"                   => "����������� ������",
    "invalid_email"                 => "��������� ����� �� �-����",
    "invalid_email_given_sprt"      => "�-���������� ����� '%s' � ���������. ���� �������� ������.",
    "duplicate_user"                => "�������� �� ����������",
    "duplicate_change_user_sprt"    => "������������ '%s' ���� ����������. ���� ������� �� � �������� ������.",
    "value_missing"                 => "�������� ��������",
    "field_sprt"                    => "������ ���������� �� '%s'. ���� ������� �� � � ���������.",
    "admin_priv"                    => "�������: ��� ���������� ���������������� �����.",
    "manage_users"                  => "���������� �� �����������",
    "users_online"                  => "����������� �� ���",
    "online"                        => "����������� online (�� ����� 60 ������)",
    "not_online"                    => "����������� offline",
    "user_activity"                 => "������� �� �����������",
//tasks
    "add_new_task"                  => "Add a new task",
    "priority"                      => "���������",
    "parent_task"                   => "�������",
    "creation_time"                 => "����� �� ���������",
    "by_sprt"                       => "%1\$s �� %2\$s", //Note to translators: context is 'Creation time: <date> by <user>'
    "project_name"                  => "��� �� �������",
    "task_name"                     => "��� �� ��������",
    "deadline"                      => "����� ����",
    "taken_from_parent"             => "(���� �� ��������)",
    "status"                        => "������",
    "task_owner"                    => "����������( �� ��������)",
    "project_owner"                 => "����������( �� �������)",
    "taskgroup"                     => "����� ������",
    "usergroup"                     => "������������� �����",
    "nobody"                        => "[�����]",
    "none"                          => "[����]",
    "no_group"                      => "[����]",
    "all_groups"                    => "������ �����",
    "all_users"                     => "������ �����������",
    "all_users_view"                => "����� �� ������",
    "group_edit"                    => "����� � ������� ���� �� �������",
    "project_description"           => "�������� �� �������",
    "task_description"              => "�������� �� ��������",
    "email_owner"                   => "����� �� ����������� � ���������",
    "email_new_owner"               => "����� �� (�����) ���������� � ���������",
    "email_group"                   => "����� �� ��������������� ����� � ���������",
    "add_new_project"               => "�������� �� ������",
    "due_sprt"                      => "%d ���� �� ����",
    "tomorrow"                      => "����",
    "due_today"                     => "����",
    "overdue_1"                     => "1 ��� ���������",
    "overdue_sprt"                  => "%d ���� ���������",
    "edit_task"                     => "������� ������",
    "edit_project"                  => "������� ������",
    "no_reparent"                   => "���� (a top-level project)",
    "del_javascript_project_sprt"   => "�������� ��������� �� ������ \'%s\'. ������� �� ���?",
    "del_javascript_task_sprt"      => "�������� ��������� �� ������ \'%s\'. ������� �� ���?",
    "add_task"                      => "������ ������",
    "add_subtask"                   => "������ ���������",
    "add_project"                   => "������ ������",
    "clone_project"                 => "�������� �� ������",
    "clone_task"                    => "�������� �� ������",
    "no_edit"                       => "��� �� ��� ���������� �� ���� item � ������������ �� ������ �� �� ���������",
    "uncategorised"                 => "<i>[��� �����]</i>",
    "admin"                         => "�����",
    "global"                        => "��������",
    "delete_project"                => "��������� ������",
    "delete_task"                   => "��������� ������",
    "project_options"               => "�������",
    "task_options"                  => "��������� �� ������",
    "task_navigation"               => "������",
    "no_projects"                   => "���� �������",
    "show_all_projects"             => "������ ������ �������",
    "show_active_projects"          => "������ ���� ��������� �������",
    "project_hold_sprt"             => "������� � \"� ������\" �� %s",
    "project_planned"               => "�������� ������",
    "percent_sprt"                  => "%d%% �� �������� � ���������",
    "project_no_deadline"           => "���� ������ ������� �� ���� ������",
    "no_allowed_projects"           => "���� �������, ����� �� � ��������� �� �����������",
    "projects"                      => "�������",
    "percent_project_sprt"          => "���� ������ � %d%% ��������",
    "owned_by"                      => "����������� ��",
    "created_on"                    => "��������� ��",
    "completed_on"                  => "��������� ��",
    "modified_on"                   => "��������� ��",
    "project_on_hold"               => "������� � � ������",
    "project_accessible"            => "(���� ������ � �������� �������� �� ������ �����������)",
    "task_accessible"               => "(���� ������ � �������� �������� �� ������ �����������)",
    "project_not_accessible"        => "(���� ������ � �������� ���� �� ��������� �� ������������� �����)",
    "task_not_accessible"           => "(���� ������ � �������� ���� �� ��������� �� ������������� �����)",
    "project_not_in_usergroup"      => "<i>���� ������ �� � ���� �� ������������� ����� � � �������� �� ������ �����������.</i>",
    "task_not_in_usergroup"         => "<i>���� ������ �� � ���� �� ������������� ����� � � �������� �� ������ �����������.</i>",
    "usergroup_can_edit_project"    => "���� ������ ���� ���� ���� �� ���� �������� �� ��������� �� ��������������� �����.",
    "usergroup_can_edit_task"       => "���� ������ ���� ���� ���� �� ���� ��������� �� ��������� �� ��������������� �����.",
    "i_take_it"                     => "�� �� ������ :)",
    "i_finished"                    => "�������� ��!",
    "i_dont_want"                   => "�� �� ����� ����",
    "take_over_project"             => "��������� �������",
    "take_over_task"                => "��������� ��������",
    "task_info"                     => "���� �� ������",
    "project_details"               => "������� �� ������",
    "todo_list_for"                 => "ToDo ���� ��: ",
    "due_in_sprt"                   => " (�� ���� %d ����)",
    "due_tomorrow"                  => " (�� ����)",
    "no_assigned"                   => "���� ����������� ������ �� ���� ����������.",
    "todo_list"                     => "ToDo ����",
    "summary_list"                  => "����������",
    "task_submit"                   => "Task submit",
    "not_owner"                     => "Access denied, either you are not the owner, or you do not have enough rights",
    "missing_values"                => "There are not enough field values provided, please go back and try again",
    "future"                        => "������ (future)",
    "flags"                         => "�������",
    "owner"                         => "����������",
    "group"                         => "�����",
    "by_usergroup"                  => " (�� ������������� �����)",
    "by_taskgroup"                  => " (�� ����� ������)",
    "by_deadline"                   => " (�� ����� ����)",
    "by_status"                     => " (�� ������)",
    "by_owner"                      => " (�� ����������)",
    "project_cloned"                => "��� �� ��������� ������:",
    "task_cloned"                   => "��� �� ���������� ������:",
    "note_clone"                    => "���������: �������� �� ���� �������� ���� ��� ������",
//bits 'n' pieces
    "calendar"                      => "��������",
    "normal_version"                => "�������� ������",
    "print_version"                 => "������ �� �����"
   )

?>