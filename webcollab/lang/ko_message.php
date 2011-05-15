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

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "ko" );

//dates
$month_array = array (NULL, "1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월" );
$week_array = array('일', '월', '화', '수', '목', '금', '토' );

//task states
 //priorities
    $task_state['dontdo']                 = "하지 않음";
    $task_state['low']                    = "낮음";
    $task_state['normal']                 = "보통";
    $task_state['high']                   = "높음";
    $task_state['yesterday']              = "어제!";
 //status
    $task_state['new']                    = "새로운";
    $task_state['planned']                = "계획(수행되지 않음)";
    $task_state['active']                 = "수행(진행중)";
    $task_state['cantcomplete']           = "잠시 멈춤";
    $task_state['completed']              = "완료함";
    $task_state['done']                   = "종료함";
    $task_state['task_planned']           = " 계획함";
    $task_state['task_active']            = " 수행";
 //project states
    $task_state['planned_project']        = "계획된 프로젝트(활성화되지 않음)";
    $task_state['no_deadline_project']    = "마감일을 지정하지 않음";
    $task_state['active_project']         = "활성화된 프로젝트";

//common items
    $lang['description']                  = "설명";
    $lang['name']                         = "이름";
    $lang['add']                          = "추가";
    $lang['update']                       = "업데이트";
    $lang['submit_changes']               = "변경사항 적용";
    $lang['continue']                     = "계속";
    $lang['reset']                        = "다시 설정";
    $lang['manage']                       = "관리";
    $lang['edit']                         = "편집";
    $lang['delete']                       = "삭제";
    $lang['del']                          = "삭제";
    $lang['confirm_del_javascript']       = "삭제 확인!";
    $lang['yes']                          = "예";
    $lang['no']                           = "아니오";
    $lang['action']                       = "동작";
    $lang['task']                         = "작업";
    $lang['tasks']                        = "작업들";
    $lang['project']                      = "프로젝트";
    $lang['info']                         = "정보";
    $lang['bytes']                        = " 바이트";
    $lang['select_instruct']              = "(더 많이 선택하거나 선택하지 않으려면  ctrl를 사용하십시오)";
    $lang['member_groups']                = "이 사용자는 아래에 밝게 표시된 그룹의 멤버입니다(if any)";
    $lang['login']                        = "로그인";
    $lang['login_action']                 = "로그인";
    $lang['login_screen']                 = "로그인";
    $lang['error']                        = "오류";
//**
    $lang['redirect_sprt']                = "You will automatically return to Login after a %d second delay";
//**
    $lang['login_now']                    = "Please click here to return to Login now";
    $lang['no_login']                     = "접근 금지. 로그인이나 비밀번호가 맞지 않습니다.";
    $lang['please_login']                 = "로그인하십시오";
    $lang['go']                           = "Go!";

//graphic items
    $lang['late_g']                       = "&nbsp;LATE&nbsp;";
    $lang['new_g']                        = "&nbsp;새로운&nbsp;";
    $lang['updated_g']                    = "&nbsp;갱신됨&nbsp;";

//admin config
    $lang['admin_config']                 = "관리자 설정";
    $lang['email_settings']               = "전자우편 헤더 설정";
    $lang['admin_email']                  = "관리자 전자우편";
    $lang['email_reply']                  = "전자우편 '회신'";
    $lang['email_from']                   = "전자우편 '송신자'";
    $lang['mailing_list']                 = "메일링 리스트";
    $lang['default_checkbox']             = "프로젝트/작업 설정에 대한 기본적인 체크 박스";
    $lang['allow_globalaccess']           = "모두 접근 가능하게 하시겠습니까?";
    $lang['allow_group_edit']             = "사용자 그룹에 있는 모든 구성원이 편집할 수 있도록 하겠습니까?";
    $lang['set_email_owner']              = "항상 소유자에게 전자우편으로 변경 사항을 알리겠습니까?";
    $lang['set_email_group']              = "변경 사항을 사용자 그룹에게 전자우편으로 알리겠습니까?";
    $lang['configuration']                = "설정";
//**
    $lang['project_listing_order']        = "Project listing order";
//**
    $lang['task_listing_order']           = "Task listing order";
    $lang['configuration']                = "Configuration";

//archive
//**
    $lang['archived_projects']            = "Archived Projects";

//contacts
    $lang['firstname']                    = "이름:";
    $lang['lastname']                     = "성:";
    $lang['company']                      = "회사:";
    $lang['home_phone']                   = "집 전화:";
    $lang['mobile']                       = "핸드폰:";
    $lang['fax']                          = "팩스:";
    $lang['bus_phone']                    = "회사 전화:";
    $lang['address']                      = "주소:";
    $lang['postal']                       = "우편 번호:";
    $lang['city']                         = "시:";
    $lang['email_contact']                = "전자우편:";
    $lang['notes']                        = "노트:";
    $lang['add_contact']                  = "연락처 추가";
    $lang['del_contact']                  = "연락처 삭제";
    $lang['contact_info']                 = "연락처 정보";
    $lang['contacts']                     = "연락처";
    $lang['contact_add_info']             = "만약 회사 이름을 추가하면 사용자 이름 대신 회사 이름이 나오게 됩니다.";
    $lang['show_contact']                 = "연락처 보기";
    $lang['edit_contact']                 = "연락처 편집";
    $lang['contact_submit']               = "연락처 전송";
    $lang['contact_warn']                 = "연락처를 추가하기에는 정보가 부족합니다. 되돌아가서 최소한 이름과 성은 입력하시기 바랍니다.";

 //files
    $lang['manage_files']                 = "파일 관리";
    $lang['no_files']                     = "관리하기 위한 업로드된 파일이 없습니다.";
    $lang['no_file_uploads']              = "이 사이트에 대한 서버 설정이 파일을 업로드할 수 있도록 되어 있지 않습니다.";
    $lang['file']                         = "파일:";
    $lang['uploader']                     = "올린이:";
    $lang['files_assoc_project']          = "이 프로젝트와 관련된 파일";
    $lang['files_assoc_task']             = "이 작업과 관련된 파일";
    $lang['file_admin']                   = "파일 관리";
    $lang['add_file']                     = "파일 추가";
    $lang['files']                        = "파일들";
    $lang['file_choose']                  = "업로드할 파일:";
    $lang['upload']                       = "업로드";
    $lang['file_email_owner']             = "소유자에게 새로운 파일에 대해 전자우편으로 알리겠습니까?";
    $lang['file_email_usergroup']         = "사용자 그룹에게 새로운 파일에 대해 전자우편으로 알리겠습니까?";
    $lang['max_file_sprt']                = "파일은 %s kb보다 작아야 합니다.";
    $lang['file_submit']                  = "파일 전송";
    $lang['no_upload']                    = "업로드된 파일이 없습니다. 되돌아가서 다시 시도하십시오";
    $lang['file_too_big_sprt']            = "최대 업로드할 수 있는 크기는 %s 바이트입니다. 업로드한 파일은 너무 크며, 삭제되었습니다.";
    $lang['del_file_javascript_sprt']     = "%s 를 정말 삭제하시겠습니까?";


 //forum
    $lang['orig_message']                 = "원래 메시지:";
    $lang['post']                         = "올리기!";
    $lang['message']                      = "메시지:";
    $lang['post_reply_sprt']              = "'%2\$s'에 대한 '%1s'가 응답한 메시지 올리기";
    $lang['post_message_sprt']            = "다음 메시지 올리기: '%s'";
    $lang['forum_email_owner']            = "소유자에게 포럼 메시지를 전자우편으로 보내시겠습니까?";
    $lang['forum_email_usergroup']        = "사용자 그룹에게 포럼 메시지를 전자우편으로 보내시겠습니까?";
    $lang['reply']                        = "답글";
    $lang['new_post']                     = "새로운 글";
    $lang['public_user_forum']            = "공개 사용자 포럼";
    $lang['private_forum_sprt']           = "'%s' 사용자 그룹에 대한 비공개 포럼";
    $lang['forum_submit']                 = "포럼 전송";
    $lang['no_message']                   = "메시지가 없습니다! 되돌아가서 다시 시도하십시오";
    $lang['add_reply']                    = "답글 추가";
//**
    $lang['last_post_sprt']               = "Last post %s"; //Note to translators: context is 'Last post 2004-Dec-22'
//**
    $lang['recent_posts']                 = "Recent forum posts";
//**
    $lang['forum_search']                 = "Forum search";
//**
    $lang['no_results']                   = "No results found for '%s'";
//**
    $lang['search_results']               = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                       = "보고";
    $lang['warning']                      = "<h1>죄송합니다!</h1><p>요청을 올바르게 처리할 수 없습니다. 나중에 다시 시도하십시오.</p>";
    $lang['home_page']                    = "홈페이지";
    $lang['summary_page']                 = "요약 페이지";
    $lang['log_out']                      = "로그 아웃";
    $lang['main_menu']                    = "메인 메뉴";
//**
    $lang['archive']                      = "Archive";
    $lang['user_homepage_sprt']           = "%s 의 홈페이지";
    $lang['missing_field_javascript']     = "입력하지 않은 필드에 값을 입력하십시오";
    $lang['invalid_date_javascript']      = "이용 가능한 달력 날짜를 선택하십시오";
    $lang['finish_date_javascript']       = "입력한 날짜는 프로젝트가 종료후의 날짜입니다!!";
    $lang['security_manager']             = "보안 관리자";
    $lang['session_timeout_sprt']         = "접근할 수 없습니다. 마지막 동작인 %1\$d 분 전에 수행했으며 %2\$d 분이 지났습니다.  <a href=\"%3\$sindex.php\">다시 로그인해주십시오 </a>";
    $lang['access_denied']                = "접근 금지";
    $lang['private_usergroup_no_access']  = "죄송합니다. 이 부분은 비공개 사용자 그룹이며, 접근할 권한이 없습니다";
    $lang['invalid_date']                 = "잘못된 날짜";
    $lang['invalid_date_sprt']            = "%s 날짜는 유효하지 않은 날짜입니다(월별 날짜 수를 확인하십시오).<br /> 되돌아가서 유효한 날짜로 다시 입력하십시오.";


 //taskgroups
    $lang['taskgroup_name']               = "작업 그룹 이름:";
    $lang['taskgroup_description']        = "작업 그룹에 대한 간단한 설명:";
    $lang['add_taskgroup']                = "작업 그룹 추가";
    $lang['add_new_taskgroup']            = "새로운 작업 그룹 추가";
    $lang['edit_taskgroup']               = "작업 그룹 편집";
    $lang['taskgroup_manage']             = "작업 그룹 관리";
    $lang['no_taskgroups']                = "정의한 작업 그룹이 없음.";
    $lang['manage_taskgroups']            = "작업 그룹을 관리";
    $lang['taskgroups']                   = "작업 그룹";
    $lang['taskgroup_dup_sprt']           = "'%s' 작업 그룹이 이미 있습니다. 되돌아가서 새로운 이름을 입력하십시오.";
    $lang['info_taskgroup_manage']        = "작업 그룹 관리에 대한 정보";

 //usergroups
    $lang['usergroup_name']               = "사용자 그룹 이름:";
    $lang['usergroup_description']        = "사용자 그룹에 대한 간단한 설명:";
    $lang['members']                      = "구성인원:";
    $lang['private_usergroup']            = "private 사용자 그룹";
    $lang['add_usergroup']                = "사용자 그룹 추가";
    $lang['add_new_usergroup']            = "새로운 사용자 그룹 추가";
    $lang['edit_usergroup']               = "사용자 그룹 편집";
//** needs translation
    $lang['email_new_usergroup']          = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']         = "Email the changes to usergroup members?";
    $lang['usergroup_manage']             = "사용자 그룹 관리";
    $lang['no_usergroups']                = "정의된 사용자 그룹이 없음.";
    $lang['manage_usergroups']            = "사용자 그룹을 관리";
    $lang['usergroups']                   = "사용자 그룹";
    $lang['usergroup_dup_sprt']           = "사용자 그룹 '%s'는 이미 존재합니다. 되돌아가서 새로운 이름을 선택하십시오";
    $lang['info_usergroup_manage']        = "사용자 그룹 관리에 대한 정보";

 //users
    $lang['login_name']                   = "로그인 이름";
    $lang['full_name']                    = "전체 이름";
    $lang['password']                     = "비밀 번호";
    $lang['blank_for_current_password']   = "(현재 비밀 번호를 사용하려면 빈칸으로 두십시오)";
    $lang['email']                        = "전자 메일";
    $lang['admin']                        = "관리자";
    $lang['private_user']                 = "비공개 사용자";
 //**
    $lang['normal_user']                  = "Normal user";
    $lang['is_admin']                     = "관리자입니까?";
 //**
    $lang['is_guest']                     = "Is a guest?";
 //**
    $lang['guest']                        = "Guest user";
    $lang['user_info']                    = "사용자 정보";
    $lang['deleted_users']                = "삭제된 사용자";
    $lang['no_deleted_users']             = "삭제된 사용자가 없습니다.";
    $lang['revive']                       = "되살리기";
    $lang['permdel']                      = "Permdel";
    $lang['permdel_javascript_sprt']      = "This will permanently delete all user records and associated tasks for %s. Do you really want to do this?";
    $lang['add_user']                     = "사용자 추가";
    $lang['edit_user']                    = "사용자 편집";
    $lang['no_users']                     = "이 시스템에 알려진 사용자가 없습니다.";
    $lang['users']                        = "사용자들";
    $lang['existing_users']               = "기존 사용자";
    $lang['private_profile']              = "이 사용자는 비공개 프로파일을 가지고 있기 때문에 볼 수 없습니다.";
    $lang['private_usergroup_profile']    = "(이 사용자는 비공개 사용자 그룹의 멤버이기 때문에 볼 수 없습니다.)";
    $lang['email_users']                  = "전자 우편 사용자들";
    $lang['select_usergroup']             = "아래에서 선택된 사용자 그룹:";
    $lang['subject']                      = "제목:";
    $lang['message_sent_maillist']        = "대부분의 경우 이 메시지는 메일링리스트에 복사될것입니다.";
    $lang['who_online']                   = "온라인 사용자는 누구입니까?";
    $lang['edit_details']                 = "사용자의 세부 사항 편집";
    $lang['show_details']                 = "사용자의 세부 사항 보기";
    $lang['user_deleted']                 = "이 사용자는 삭제되었습니다!";
    $lang['no_usergroup']                 = "이 사용자는 어떠한 그룹에도 속하지 않은 멤버입니다.";
    $lang['not_usergroup']                =   "(어떠한 그룹에 속하지 않은 멤버)";
    $lang['no_password_change']           = "(기존 비밀번호는 변경되지 않았습니다.)";
    $lang['last_time_here']               = "최근에 본 시간:";
    $lang['number_items_created']         = "생성한 항목 개수:";
    $lang['number_projects_owned']        = "소유한 프로젝트 개수:";
    $lang['number_tasks_owned']           = "소유한 작업 개수:";
    $lang['number_tasks_completed']       = "완료한 작업 개수:";
    $lang['number_forum']                 = "포럼에 업로드한 개수:";
    $lang['number_files']                 = "업로드한 파일 개수:";
    $lang['size_all_files']               = "소유한 파일에 대한 총 크기:";
    $lang['owned_tasks']                  = "소유한 작업";
    $lang['invalid_email']                = "유효하지 않은 전자우편 주소";
    $lang['invalid_email_given_sprt']     = "'%s' 전자우편은 유효하지 않습니다. 되돌아가서 다시 시도하십시오";
    $lang['duplicate_user']               = "중복 사용자";
    $lang['duplicate_change_user_sprt']   = "'%s' 사용자는 이미 있습니다. 되돌아가서 이름을 변경하십시오";
    $lang['value_missing']                = "값이 없음";
    $lang['field_sprt']                   = "'%s' 항목이 없습니다. 되돌아가서 채우십시오.";
    $lang['admin_priv']                   = "노트: 이미 관리자 권한을 얻었습니다.";
    $lang['manage_users']                 = "사용자들 관리";
    $lang['users_online']                 = "사용자 온라인";
    $lang['online']                       = "온라인 사용자(최소 한시간 전에 사용한 사용자)";
    $lang['not_online']                   = "오프라인";
    $lang['user_activity']                = "사용자 활성화";

  //tasks
    $lang['add_new_task']                 = "새로운 작업 추가";
    $lang['priority']                     = "우선 순위";
    $lang['parent_task']                  = "상위";
    $lang['creation_time']                = "시간 생성";
    $lang['by_sprt']                      = "%2\$s 에 의한 %1\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                 = "프로젝트 이름";
    $lang['task_name']                    = "작업 이름";
    $lang['deadline']                     = "마감";
    $lang['taken_from_parent']            = "(상위에서 얻음)";
    $lang['status']                       = "상태";
    $lang['task_owner']                   = "작업 소유자";
    $lang['project_owner']                = "프로젝트 소유자";
    $lang['taskgroup']                    = "작업 그룹";
    $lang['usergroup']                    = "사용자 그룹";
    $lang['nobody']                       = "nobody";
    $lang['none']                         = "없음";
    $lang['no_group']                     = "그룹 없음";
    $lang['all_groups']                   = "모든 그룹";
    $lang['all_users']                    = "모든 사용자";
    $lang['all_users_view']               = "모든 사용자들이 이 항목을 볼 수 있도록 하겠습니까?";
    $lang['group_edit']                   = "사용자 그룹에 있는 누구라도 편집할 수 있도록 하시겠습니까?";
    $lang['project_description']          = "프로젝트 설명";
    $lang['task_description']             = "작업 설명";
    $lang['email_owner']                  = "변경 사항을 소유자에게 전자우편으로 보내시겠습니까?";
    $lang['email_new_owner']              = "변경 사항을 (새로운) 소유자에게 전자우편으로 보내시겠습니까?";
    $lang['email_group']                  = "변경사항을 사용자 그룹에 전자우편으로 보내시겠습니까?";
    $lang['add_new_project']              = "새로운 프로젝트 추가";
    $lang['uncategorised']                = "분류되어 있지 않음";
    $lang['due_sprt']                     = "지금부터 %d 날까지";
    $lang['tomorrow']                     = "내일";
    $lang['due_today']                    = "오늘까지입니다.";
    $lang['overdue_1']                    = "하루 지났습니다";
    $lang['overdue_sprt']                 = "%d 날만큼 지났습니다";
    $lang['edit_task']                    = "작업 편집";
    $lang['edit_project']                 = "프로젝트 수정";
    $lang['no_reparent']                  = "없음(최상위 프로젝트)";
    $lang['del_javascript_project_sprt']  = "%s 프로젝트를 정말로 삭제하시겠습니까?";
    $lang['del_javascript_task_sprt']     = "%s 작업을 정말로 삭제하시겠습니까?";
    $lang['add_task']                     = "작업 추가";
    $lang['add_subtask']                  = "하위 작업 추가";
    $lang['add_project']                  = "프로젝트 추가";
    $lang['clone_project']                = "복제 프로젝트";
    $lang['clone_task']                   = "작업 복제";
    $lang['quick_jump']                   = "Quick Jump";
    $lang['no_edit']                      = "이 항목에 대한 소유 권한이 없기 때문에 편집할 수 없습니다";
    $lang['global']                       = "전역 설정";
    $lang['delete_project']               = "프로젝트 삭제";
    $lang['delete_task']                  = "작업 삭제";
    $lang['project_options']              = "프로젝트 옵션";
    $lang['task_options']                 = "작업 옵션";
//**
    $lang['javascript_archive_project']   = "This will archive project %s.  Are you sure?";
//**
    $lang['archive_project']              = "Archive project";
    $lang['task_navigation']              = "작업 보기";
//**
    $lang['new_task']                     = "New task";
    $lang['no_projects']                  = "볼 프로젝트가 없습니다.";
    $lang['show_all_projects']            = "모든 프로젝트 보기";
    $lang['show_active_projects']         = "활성화된 프로젝트만 보기";
    $lang['project_hold_sprt']            = "%s 가 이 프로젝트를 잠시 멈추었습니다.";
    $lang['project_planned']              = "계획된 프로젝트";
    $lang['percent_sprt']                 = "이 작업의 %d%% 가 완료 되었습니다.";
    $lang['project_no_deadline']          = "이 프로젝트에 대한 마감일이 설정되어 있지 않습니다";
    $lang['no_allowed_projects']          = "볼 수 있도록 허락된 프로젝트가 없습니다";
    $lang['projects']                     = "프로젝트";
    $lang['percent_project_sprt']         = "%d%%  프로젝트가 완료되었습니다";
    $lang['owned_by']                     = "소유자";
    $lang['created_on']                   = "생성 날짜";
    $lang['completed_on']                 = "완료 날짜";
    $lang['modified_on']                  = "수정한 날짜";
    $lang['project_on_hold']              = "프로젝트를 잠시 멈춥니다";
    $lang['project_accessible']           = "(이 프로젝트를 모든 사용자가 접근할 수 있도록 되어 있습니다.)";
    $lang['task_accessible']              = "(이 작업은 모든 사용자가 접근할 수 있도록 되어 있습니다.)";
    $lang['project_not_accessible']       = "(이 프로젝트는 사용자 그룹에 대한 멤버만이 접근할 수 있습니다.)";
    $lang['task_not_accessible']          = "(이 작업은 사용자 그룹의 멤버만이 접근할 수 있습니다.)";
    $lang['project_not_in_usergroup']     = "이 프로젝트는 사용자 그룹에서 설정한 내역이 아니므로 모든 사용자가 접근할 수있습니다.";
    $lang['task_not_in_usergroup']        = "이 작업은 사용자 그룹에서 설정한 내역이 아니므로 모든 사용자가 접근할 수 있습니다.";
    $lang['usergroup_can_edit_project']   = "이 프로젝트는 사용자 그룹에 속하는 멤버도 편집할 수 있습니다.";
    $lang['usergroup_can_edit_task']      = "이 작업은 사용자 그룹에 속하는 멤버도 편집할 수 있습니다.";
    $lang['i_take_it']                    = "수용하겠습니다 :)";
    $lang['i_finished']                   = "종료했습니다!";
    $lang['i_dont_want']                  = "삭제합니다";
    $lang['take_over_project']            = "전환한 프로젝트";
    $lang['take_over_task']               = "전환한 작업";
    $lang['task_info']                    = "작업 정보";
    $lang['project_details']              = "프로젝트 세부 사항";
    $lang['todo_list_for']                = "다음에 대한 할일 목록: ";
    $lang['due_in_sprt']                  = " (%d 날까지)";
    $lang['due_tomorrow']                 = " (내일 까지)";
    $lang['no_assigned']                  = "이 사용자에게 할당된 작업중 종료하지 않은 작업이 없습니다.";
    $lang['todo_list']                    = "할일 목록";
    $lang['summary_list']                 = "요약 목록";
    $lang['task_submit']                  = "작업 전송";
    $lang['not_owner']                    = "접근 금지되었거나 소유자가 아니거나 적절한 권한이 없습니다.";
    $lang['missing_values']               = "항목을 모두 채우지 않으셨습니다. 뒤로 되돌아가서 다시 시도하십시오";
    $lang['future']                       = "미래";
    $lang['flags']                        = "플래그";
    $lang['owner']                        = "소유자";
    $lang['group']                        = "그룹";
    $lang['by_usergroup']                 = " (사용자 그룹으로)";
    $lang['by_taskgroup']                 = " (작업 그룹으로)";
    $lang['by_deadline']                  = " (마감일로)";
    $lang['by_status']                    = " (상태로)";
    $lang['by_owner']                     = " (소유자로)";
//** needs translation
    $lang['by_priority']                  = " (by priority)";
    $lang['project_cloned']               = "복사된 프로젝트 :";
    $lang['task_cloned']                  = "복사된 작업: ";
    $lang['note_clone']                   = "주의: 이 작업은 새로운 프로젝트로 복사될 것입니다";

//bits 'n' pieces
    $lang['calendar']                     = "달력";
    $lang['normal_version']               = "일반적인 형태";
    $lang['print_version']                = "프린트 가능한 형태";
//**
    $lang['condensed_view']               = "Condensed view";
//**
    $lang['full_view']                    = "Full view";
//**
    $lang['icalendar']                    = "iCalendar";
//**
    $lang['url_javascript']               = "Enter the URL:";
//**
    $lang['image_url_javascript']         = "Enter the image URL:";

?>
