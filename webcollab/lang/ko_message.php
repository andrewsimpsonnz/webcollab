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

  Language files for 'ko' (Korean)

  Maintainer: Yu-Chan, Park < yuchan at kisti.re.kr>

*/

//required language encodings
//$web_charset = "ko_KR.eucKR";
//$email_charset = "ko_KR.eucKR";
$web_charset = "EUC-KR";
$email_charset = "EUC-KR";

//dates
$month_array = array (NULL, "1��", "2��", "3��", "4��", "5��", "6��", "7��", "8��", "9��", "10��", "11��", "12��" );
$week_array = array('��', '��', 'ȭ', '��', '��', '��', '��' );

//task states
 //priorities
    $task_state['dontdo']                 = '���� ����';
    $task_state['low']                    = '����';
    $task_state['normal']                 = '����';
    $task_state['high']                   = '����';
    $task_state['yesterday']              = '����!';
 //status
    $task_state['new']                    = '���ο�';
    $task_state['planned']                = '��ȹ(������� ����)';
    $task_state['active']                 = '����(������)';
    $task_state['cantcomplete']           = '��� ����';
    $task_state['completed']              = '�Ϸ���';
    $task_state['done']                   = '������';
    $task_state['task_planned']           = ' ��ȹ��';
    $task_state['task_active']            = ' ����';
 //project states
    $task_state['planned_project']        = '��ȹ�� ������Ʈ(Ȱ��ȭ���� ����)';
    $task_state['no_deadline_project']    = '�������� �������� ����';
    $task_state['active_project']         = 'Ȱ��ȭ�� ������Ʈ';

//common items
    $lang['description']                  = '����';
    $lang['name']                         = '�̸�';
    $lang['add']                          = '�߰�';
    $lang['update']                       = '������Ʈ';
    $lang['submit_changes']               = '������� ����';
    $lang['continue']                     = '���';
    $lang['reset']                        = '�ٽ� ����';
    $lang['manage']                       = '����';
    $lang['edit']                         = '����';
    $lang['delete']                       = '����';
    $lang['del']                          = '����';
    $lang['confirm_del_javascript']       = '���� Ȯ��!';
    $lang['yes']                          = '��';
    $lang['no']                           = '�ƴϿ�';
    $lang['action']                       = '����';
    $lang['task']                         = '�۾�';
    $lang['tasks']                        = '�۾���';
    $lang['project']                      = '������Ʈ';
    $lang['info']                         = '����';
    $lang['bytes']                        = ' ����Ʈ';
    $lang['select_instruct']              = '(�� ���� �����ϰų� �������� ��������  ctrl�� ����Ͻʽÿ�)';
    $lang['member_groups']                = '�� ����ڴ� �Ʒ��� ��� ǥ�õ� �׷��� ����Դϴ�(if any)';
    $lang['login']                        = '�α���';
    $lang['error']                        = '����';
    $lang['no_login']                     = '���� ����. �α����̳� ��й�ȣ�� ���� �ʽ��ϴ�.';
    $lang['please_login']                 = '�α����Ͻʽÿ�';

//graphic items
    $lang['late_g']                       = '&nbsp;LATE&nbsp;';
    $lang['new_g']                        = '&nbsp;���ο�&nbsp;';
    $lang['updated_g']                    = '&nbsp;���ŵ�&nbsp;';

//admin config
    $lang['admin_config']                 = '������ ����';
    $lang['email_settings']               = '���ڿ��� ��� ����';
    $lang['admin_email']                  = '������ ���ڿ���';
    $lang['email_reply']                  = '���ڿ��� \'ȸ��\'';
    $lang['email_from']                   = '���ڿ��� \'�۽���\'';
    $lang['mailing_list']                 = '���ϸ� ����Ʈ';
    $lang['default_checkbox']             = '������Ʈ/�۾� ������ ���� �⺻���� üũ �ڽ�';
    $lang['allow_globalaccess']           = '��� ���� �����ϰ� �Ͻðڽ��ϱ�?';
    $lang['allow_group_edit']             = '����� �׷쿡 �ִ� ��� �������� ������ �� �ֵ��� �ϰڽ��ϱ�?';
    $lang['set_email_owner']              = '�׻� �����ڿ��� ���ڿ������� ���� ������ �˸��ڽ��ϱ�?';
    $lang['set_email_group']              = '���� ������ ����� �׷쿡�� ���ڿ������� �˸��ڽ��ϱ�?';
    $lang['configuration']                = '����';
//**    
    $lang['project_listing_order']        = 'Project listing order';
//**    
    $lang['task_listing_order']           = 'Task listing order'; 
    $lang['configuration']                = 'Configuration';

//archive
//**
    $lang['archived_projects']            = 'Archived Projects';    

//contacts
    $lang['firstname']                    = '�̸�:';
    $lang['lastname']                     = '��:';
    $lang['company']                      = 'ȸ��:';
    $lang['home_phone']                   = '�� ��ȭ:';
    $lang['mobile']                       = '�ڵ���:';
    $lang['fax']                          = '�ѽ�:';
    $lang['bus_phone']                    = 'ȸ�� ��ȭ:';
    $lang['address']                      = '�ּ�:';
    $lang['postal']                       = '���� ��ȣ:';
    $lang['city']                         = '��:';
    $lang['email']                        = '���ڿ���:';
    $lang['notes']                        = '��Ʈ:';
    $lang['add_contact']                  = '����ó �߰�';
    $lang['del_contact']                  = '����ó ����';
    $lang['contact_info']                 = '����ó ����';
    $lang['contacts']                     = '����ó';
    $lang['contact_add_info']             = '���� ȸ�� �̸��� �߰��ϸ� ����� �̸� ��� ȸ�� �̸��� ������ �˴ϴ�.';
    $lang['show_contact']                 = '����ó ����';
    $lang['edit_contact']                 = '����ó ����';
    $lang['contact_submit']               = '����ó ����';
    $lang['contact_warn']                 = '����ó�� �߰��ϱ⿡�� ������ �����մϴ�. �ǵ��ư��� �ּ��� �̸��� ���� �Է��Ͻñ� �ٶ��ϴ�.';

 //files
    $lang['manage_files']                 = '���� ����';
    $lang['no_files']                     = '�����ϱ� ���� ���ε�� ������ �����ϴ�.';
    $lang['no_file_uploads']              = '�� ����Ʈ�� ���� ���� ������ ������ ���ε��� �� �ֵ��� �Ǿ� ���� �ʽ��ϴ�.';
    $lang['file']                         = '����:';
    $lang['uploader']                     = '�ø���:';
    $lang['files_assoc_project']          = '�� ������Ʈ�� ���õ� ����';
    $lang['files_assoc_task']             = '�� �۾��� ���õ� ����';
    $lang['file_admin']                   = '���� ����';
    $lang['add_file']                     = '���� �߰�';
    $lang['files']                        = '���ϵ�';
    $lang['file_choose']                  = '���ε��� ����:';
    $lang['upload']                       = '���ε�';
    $lang['file_email_owner']             = '�����ڿ��� ���ο� ���Ͽ� ���� ���ڿ������� �˸��ڽ��ϱ�?';
    $lang['file_email_usergroup']         = '����� �׷쿡�� ���ο� ���Ͽ� ���� ���ڿ������� �˸��ڽ��ϱ�?';
    $lang['max_file_sprt']                = '������ %s kb���� �۾ƾ� �մϴ�.';
    $lang['file_submit']                  = '���� ����';
    $lang['no_upload']                    = '���ε�� ������ �����ϴ�. �ǵ��ư��� �ٽ� �õ��Ͻʽÿ�';
    $lang['file_too_big_sprt']            = '�ִ� ���ε��� �� �ִ� ũ��� %s ����Ʈ�Դϴ�. ���ε��� ������ �ʹ� ũ��, �����Ǿ����ϴ�.';
    $lang['del_file_javascript_sprt']     = '%s �� ���� �����Ͻðڽ��ϱ�?';


 //forum
    $lang['orig_message']                 = '���� �޽���:';
    $lang['post']                         = '�ø���!';
    $lang['message']                      = '�޽���:';
    $lang['post_reply_sprt']              = '\'%2$s\'�� ���� \'%1s\'�� ������ �޽��� �ø���';
    $lang['post_message_sprt']            = '���� �޽��� �ø���: \'%s\'';
    $lang['forum_email_owner']            = '�����ڿ��� ���� �޽����� ���ڿ������� �����ðڽ��ϱ�?';
    $lang['forum_email_usergroup']        = '����� �׷쿡�� ���� �޽����� ���ڿ������� �����ðڽ��ϱ�?';
    $lang['reply']                        = '���';
    $lang['new_post']                     = '���ο� ��';
    $lang['public_user_forum']            = '���� ����� ����';
    $lang['private_forum_sprt']           = '\'%s\' ����� �׷쿡 ���� ����� ����';
    $lang['forum_submit']                 = '���� ����';
    $lang['no_message']                   = '�޽����� �����ϴ�! �ǵ��ư��� �ٽ� �õ��Ͻʽÿ�';
    $lang['add_reply']                    = '��� �߰�';
//**  
    $lang['last_post_sprt']               = 'Last post %s'; //Note to translators: context is 'Last post 2004-Dec-22'
//**   
    $lang['recent_posts']                 = 'Recent forum posts';      
    
 //includes
    $lang['report']                       = '����';
    $lang['warning']                      = '<h1>�˼��մϴ�!</h1><p>��û�� �ùٸ��� ó���� �� �����ϴ�. ���߿� �ٽ� �õ��Ͻʽÿ�.</p>';
    $lang['home_page']                    = 'Ȩ������';
    $lang['summary_page']                 = '��� ������';
    $lang['todo_list']                    = '���� ���';
    $lang['calendar']                     = '�޷�';
    $lang['log_out']                      = '�α� �ƿ�';
    $lang['main_menu']                    = '���� �޴�';
//**
    $lang['archive']                      = 'Archive';   
    $lang['user_homepage_sprt']           = '%s �� Ȩ������';
    $lang['missing_field_javascript']     = '�Է����� ���� �ʵ忡 ���� �Է��Ͻʽÿ�';
    $lang['invalid_date_javascript']      = '�̿� ������ �޷� ��¥�� �����Ͻʽÿ�';
    $lang['finish_date_javascript']       = '�Է��� ��¥�� ������Ʈ�� �������� ��¥�Դϴ�!!';
    $lang['security_manager']             = '���� ������';
    $lang['session_timeout_sprt']         = '������ �� �����ϴ�. ������ ������ %1$d �� ���� ���������� %2$d ���� �������ϴ�.  <a href="%3$sindex.php">�ٽ� �α������ֽʽÿ� </a>';
    $lang['access_denied']                = '���� ����';
    $lang['private_usergroup']            = '�˼��մϴ�. �� �κ��� ����� ����� �׷��̸�, ������ ������ �����ϴ�';
    $lang['invalid_date']                 = '�߸��� ��¥';
    $lang['invalid_date_sprt']            = '%s ��¥�� ��ȿ���� ���� ��¥�Դϴ�(���� ��¥ ���� Ȯ���Ͻʽÿ�).<br /> �ǵ��ư��� ��ȿ�� ��¥�� �ٽ� �Է��Ͻʽÿ�.';


 //taskgroups
    $lang['taskgroup_name']               = '�۾� �׷� �̸�:';
    $lang['taskgroup_description']        = '�۾� �׷쿡 ���� ������ ����:';
    $lang['add_taskgroup']                = '�۾� �׷� �߰�';
    $lang['add_new_taskgroup']            = '���ο� �۾� �׷� �߰�';
    $lang['edit_taskgroup']               = '�۾� �׷� ����';
    $lang['taskgroup_manage']             = '�۾� �׷� ����';
    $lang['no_taskgroups']                = '������ �۾� �׷��� ����.';
    $lang['manage_taskgroups']            = '�۾� �׷��� ����';
    $lang['taskgroups']                   = '�۾� �׷�';
    $lang['taskgroup_dup_sprt']           = '\'%s\' �۾� �׷��� �̹� �ֽ��ϴ�. �ǵ��ư��� ���ο� �̸��� �Է��Ͻʽÿ�.';
    $lang['info_taskgroup_manage']        = '�۾� �׷� ������ ���� ����';

 //usergroups
    $lang['usergroup_name']               = '����� �׷� �̸�:';
    $lang['usergroup_description']        = '����� �׷쿡 ���� ������ ����:';
    $lang['members']                      = '�����ο�:';
    $lang['private_usergroup']            = 'private ����� �׷�';
    $lang['add_usergroup']                = '����� �׷� �߰�';
    $lang['add_new_usergroup']            = '���ο� ����� �׷� �߰�';
    $lang['edit_usergroup']               = '����� �׷� ����';
    $lang['usergroup_manage']             = '����� �׷� ����';
    $lang['no_usergroups']                = '���ǵ� ����� �׷��� ����.';
    $lang['manage_usergroups']            = '����� �׷��� ����';
    $lang['usergroups']                   = '����� �׷�';
    $lang['usergroup_dup_sprt']           = '����� �׷� \'%s\'�� �̹� �����մϴ�. �ǵ��ư��� ���ο� �̸��� �����Ͻʽÿ�';
    $lang['info_usergroup_manage']        = '����� �׷� ������ ���� ����';

 //users
    $lang['login_name']                   = '�α��� �̸�';
    $lang['full_name']                    = '��ü �̸�';
    $lang['password']                     = '��� ��ȣ';
    $lang['blank_for_current_password']   = '(���� ��� ��ȣ�� ����Ϸ��� ��ĭ���� �νʽÿ�)';
    $lang['email']                        = '���� ����';
    $lang['admin']                        = '������';
    $lang['private_user']                 = '����� �����';
 //**
    $lang['normal_user']                  = 'Normal user'; 
    $lang['is_admin']                     = '�������Դϱ�?';
 //**
    $lang['is_guest']                     = 'Is a guest?';
 //**
    $lang['guest']                        = 'Guest user';
    $lang['user_info']                    = '����� ����';
    $lang['deleted_users']                = '������ �����';
    $lang['no_deleted_users']             = '������ ����ڰ� �����ϴ�.';
    $lang['revive']                       = '�ǻ츮��';
    $lang['permdel']                      = 'Permdel';
    $lang['permdel_javascript_sprt']      = 'This will permanently delete all user records and associated tasks for %s. Do you really want to do this?';
    $lang['add_user']                     = '����� �߰�';
    $lang['edit_user']                    = '����� ����';
    $lang['no_users']                     = '�� �ý��ۿ� �˷��� ����ڰ� �����ϴ�.';
    $lang['users']                        = '����ڵ�';
    $lang['existing_users']               = '���� �����';
    $lang['private_profile']              = '�� ����ڴ� ����� ���������� ������ �ֱ� ������ �� �� �����ϴ�.';
    $lang['private_usergroup_profile']    = '(�� ����ڴ� ����� ����� �׷��� ����̱� ������ �� �� �����ϴ�.)';
    $lang['email_users']                  = '���� ���� ����ڵ�';
    $lang['select_usergroup']             = '�Ʒ����� ���õ� ����� �׷�:';
    $lang['subject']                      = '����:';
    $lang['message_sent_maillist']        = '��κ��� ��� �� �޽����� ���ϸ�����Ʈ�� ����ɰ��Դϴ�.';
    $lang['who_online']                   = '�¶��� ����ڴ� �����Դϱ�?';
    $lang['edit_details']                 = '������� ���� ���� ����';
    $lang['show_details']                 = '������� ���� ���� ����';
    $lang['user_deleted']                 = '�� ����ڴ� �����Ǿ����ϴ�!';
    $lang['no_usergroup']                 = '�� ����ڴ� ��� �׷쿡�� ������ ���� ����Դϴ�.';
    $lang['not_usergroup']                =   '(��� �׷쿡 ������ ���� ���)';
    $lang['no_password_change']           = '(���� ��й�ȣ�� ������� �ʾҽ��ϴ�.)';
    $lang['last_time_here']               = '�ֱٿ� �� �ð�:';
    $lang['number_items_created']         = '������ �׸� ����:';
    $lang['number_projects_owned']        = '������ ������Ʈ ����:';
    $lang['number_tasks_owned']           = '������ �۾� ����:';
    $lang['number_tasks_completed']       = '�Ϸ��� �۾� ����:';
    $lang['number_forum']                 = '������ ���ε��� ����:';
    $lang['number_files']                 = '���ε��� ���� ����:';
    $lang['size_all_files']               = '������ ���Ͽ� ���� �� ũ��:';
    $lang['owned_tasks']                  = '������ �۾�';
    $lang['invalid_email']                = '��ȿ���� ���� ���ڿ��� �ּ�';
    $lang['invalid_email_given_sprt']     = '\'%s\' ���ڿ����� ��ȿ���� �ʽ��ϴ�. �ǵ��ư��� �ٽ� �õ��Ͻʽÿ�';
    $lang['duplicate_user']               = '�ߺ� �����';
    $lang['duplicate_change_user_sprt']   = '\'%s\' ����ڴ� �̹� �ֽ��ϴ�. �ǵ��ư��� �̸��� �����Ͻʽÿ�';
    $lang['value_missing']                = '���� ����';
    $lang['field_sprt']                   = '\'%s\' �׸��� �����ϴ�. �ǵ��ư��� ä��ʽÿ�.';
    $lang['admin_priv']                   = '��Ʈ: �̹� ������ ������ ������ϴ�.';
    $lang['manage_users']                 = '����ڵ� ����';
    $lang['users_online']                 = '����� �¶���';
    $lang['online']                       = '�¶��� �����(�ּ� �ѽð� ���� ����� �����)';
    $lang['not_online']                   = '��������';
    $lang['user_activity']                = '����� Ȱ��ȭ';

  //tasks
    $lang['add_new_task']                 = '���ο� �۾� �߰�';
    $lang['priority']                     = '�켱 ����';
    $lang['parent_task']                  = '����';
    $lang['creation_time']                = '�ð� ����';
    $lang['by_sprt']                      = '%2$s �� ���� %1$s'; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                 = '������Ʈ �̸�';
    $lang['task_name']                    = '�۾� �̸�';
    $lang['deadline']                     = '����';
    $lang['taken_from_parent']            = '(�������� ����)';
    $lang['status']                       = '����';
    $lang['task_owner']                   = '�۾� ������';
    $lang['project_owner']                = '������Ʈ ������';
    $lang['taskgroup']                    = '�۾� �׷�';
    $lang['usergroup']                    = '����� �׷�';
    $lang['nobody']                       = 'nobody';
    $lang['none']                         = '����';
    $lang['no_group']                     = '�׷� ����';
    $lang['all_groups']                   = '��� �׷�';
    $lang['all_users']                    = '��� �����';
    $lang['all_users_view']               = '��� ����ڵ��� �� �׸��� �� �� �ֵ��� �ϰڽ��ϱ�?';
    $lang['group_edit']                   = '����� �׷쿡 �ִ� ������ ������ �� �ֵ��� �Ͻðڽ��ϱ�?';
    $lang['project_description']          = '������Ʈ ����';
    $lang['task_description']             = '�۾� ����';
    $lang['email_owner']                  = '���� ������ �����ڿ��� ���ڿ������� �����ðڽ��ϱ�?';
    $lang['email_new_owner']              = '���� ������ (���ο�) �����ڿ��� ���ڿ������� �����ðڽ��ϱ�?';
    $lang['email_group']                  = '��������� ����� �׷쿡 ���ڿ������� �����ðڽ��ϱ�?';
    $lang['add_new_project']              = '���ο� ������Ʈ �߰�';
    $lang['uncategorised']                = '�з��Ǿ� ���� ����';
    $lang['due_sprt']                     = '���ݺ��� %d ������';
    $lang['tomorrow']                     = '����';
    $lang['due_today']                    = '���ñ����Դϴ�.';
    $lang['overdue_1']                    = '�Ϸ� �������ϴ�';
    $lang['overdue_sprt']                 = '%d ����ŭ �������ϴ�';
    $lang['edit_task']                    = '�۾� ����';
    $lang['edit_project']                 = '������Ʈ ����';
    $lang['no_reparent']                  = '����(�ֻ��� ������Ʈ)';
    $lang['del_javascript_project_sprt']  = '%s ������Ʈ�� ������ �����Ͻðڽ��ϱ�?';
    $lang['del_javascript_task_sprt']     = '%s �۾��� ������ �����Ͻðڽ��ϱ�?';
    $lang['add_task']                     = '�۾� �߰�';
    $lang['add_subtask']                  = '���� �۾� �߰�';
    $lang['add_project']                  = '������Ʈ �߰�';
    $lang['clone_project']                = '���� ������Ʈ';
    $lang['clone_task']                   = '�۾� ����';
    $lang['no_edit']                      = '�� �׸� ���� ���� ������ ���� ������ ������ �� �����ϴ�';
    $lang['uncategorised']                = '�з��Ǿ����� ����';
    $lang['admin']                        = '����';
    $lang['global']                       = '���� ����';
    $lang['delete_project']               = '������Ʈ ����';
    $lang['delete_task']                  = '�۾� ����';
    $lang['project_options']              = '������Ʈ �ɼ�';
    $lang['task_options']                 = '�۾� �ɼ�';
//**    
    $lang['javascript_archive_project']   = 'This will archive project %s.  Are you sure?';
//**    
    $lang['archive_project']              = 'Archive project';
    $lang['task_navigation']              = '�۾� ����';
//**
    $lang['new_task']                     = 'New task';    
    $lang['no_projects']                  = '�� ������Ʈ�� �����ϴ�.';
    $lang['show_all_projects']            = '��� ������Ʈ ����';
    $lang['show_active_projects']         = 'Ȱ��ȭ�� ������Ʈ�� ����';
    $lang['project_hold_sprt']            = '%s �� �� ������Ʈ�� ��� ���߾����ϴ�.';
    $lang['project_planned']              = '��ȹ�� ������Ʈ';
    $lang['percent_sprt']                 = '�� �۾��� %d%% �� �Ϸ� �Ǿ����ϴ�.';
    $lang['project_no_deadline']          = '�� ������Ʈ�� ���� �������� �����Ǿ� ���� �ʽ��ϴ�';
    $lang['no_allowed_projects']          = '�� �� �ֵ��� ����� ������Ʈ�� �����ϴ�';
    $lang['projects']                     = '������Ʈ';
    $lang['percent_project_sprt']         = '%d%%  ������Ʈ�� �Ϸ�Ǿ����ϴ�';
    $lang['owned_by']                     = '������';
    $lang['created_on']                   = '���� ��¥';
    $lang['completed_on']                 = '�Ϸ� ��¥';
    $lang['modified_on']                  = '������ ��¥';
    $lang['project_on_hold']              = '������Ʈ�� ��� ����ϴ�';
    $lang['project_accessible']           = '(�� ������Ʈ�� ��� ����ڰ� ������ �� �ֵ��� �Ǿ� �ֽ��ϴ�.)';
    $lang['task_accessible']              = '(�� �۾��� ��� ����ڰ� ������ �� �ֵ��� �Ǿ� �ֽ��ϴ�.)';
    $lang['project_not_accessible']       = '(�� ������Ʈ�� ����� �׷쿡 ���� ������� ������ �� �ֽ��ϴ�.)';
    $lang['task_not_accessible']          = '(�� �۾��� ����� �׷��� ������� ������ �� �ֽ��ϴ�.)';
    $lang['project_not_in_usergroup']     = '�� ������Ʈ�� ����� �׷쿡�� ������ ������ �ƴϹǷ� ��� ����ڰ� ������ ���ֽ��ϴ�.';
    $lang['task_not_in_usergroup']        = '�� �۾��� ����� �׷쿡�� ������ ������ �ƴϹǷ� ��� ����ڰ� ������ �� �ֽ��ϴ�.';
    $lang['usergroup_can_edit_project']   = '�� ������Ʈ�� ����� �׷쿡 ���ϴ� ����� ������ �� �ֽ��ϴ�.';
    $lang['usergroup_can_edit_task']      = '�� �۾��� ����� �׷쿡 ���ϴ� ����� ������ �� �ֽ��ϴ�.';
    $lang['i_take_it']                    = '�����ϰڽ��ϴ� :)';
    $lang['i_finished']                   = '�����߽��ϴ�!';
    $lang['i_dont_want']                  = '�����մϴ�';
    $lang['take_over_project']            = '��ȯ�� ������Ʈ';
    $lang['take_over_task']               = '��ȯ�� �۾�';
    $lang['task_info']                    = '�۾� ����';
    $lang['project_details']              = '������Ʈ ���� ����';
    $lang['todo_list_for']                = '������ ���� ���� ���: ';
    $lang['due_in_sprt']                  = ' (%d ������)';
    $lang['due_tomorrow']                 = ' (���� ����)';
    $lang['no_assigned']                  = '�� ����ڿ��� �Ҵ�� �۾��� �������� ���� �۾��� �����ϴ�.';
    $lang['todo_list']                    = '���� ���';
    $lang['summary_list']                 = '��� ���';
    $lang['task_submit']                  = '�۾� ����';
    $lang['not_owner']                    = '���� �����Ǿ��ų� �����ڰ� �ƴϰų� ������ ������ �����ϴ�.';
    $lang['missing_values']               = '�׸��� ��� ä���� �����̽��ϴ�. �ڷ� �ǵ��ư��� �ٽ� �õ��Ͻʽÿ�';
    $lang['future']                       = '�̷�';
    $lang['flags']                        = '�÷���';
    $lang['owner']                        = '������';
    $lang['group']                        = '�׷�';
    $lang['by_usergroup']                 = ' (����� �׷�����)';
    $lang['by_taskgroup']                 = ' (�۾� �׷�����)';
    $lang['by_deadline']                  = ' (�����Ϸ�)';
    $lang['by_status']                    = ' (���·�)';
    $lang['by_owner']                     = ' (�����ڷ�)';
    $lang['project_cloned']               = '����� ������Ʈ :';
    $lang['task_cloned']                  = '����� �۾�: ';
    $lang['note_clone']                   = '����: �� �۾��� ���ο� ������Ʈ�� ����� ���Դϴ�';

//bits 'n' pieces
    $lang['calendar']                     = '�޷�';
    $lang['normal_version']               = '�Ϲ����� ����';
    $lang['print_version']                = '����Ʈ ������ ����';
//**    
    $lang['condensed_view']               = 'Condensed view';
//**    
    $lang['full_view']                    = 'Full view';

?>
