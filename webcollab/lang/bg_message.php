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


  NOTE: This file is written in Windows-1251 character set

*/

//required language encodings
define('CHARACTER_SET', "Windows-1251" );

//this is the regex for input validation filter used in common.php
$validation_regex = "/([^\x09\x0a\x0d\x20-\x97\x99-\xff])/"; //Windows-1251 (http://www.microsoft.com/typography/unicode/1251.htm)

//dates
$month_array                              = array (NULL, "Яну", "Фев", "Мар", "Апр", "Май", "Юни", "Юли", "Авг", "Сеп", "Окт", "Ное", "Дек" );
$week_array                               = array('Нед', 'Пон', 'Вто', 'Стя', 'Чет', 'Пет', 'Съб' );

//task states
//priorities
    $task_state['dontdo']                 = "Недей";
    $task_state['low']                    = "Нисък";
    $task_state['normal']                 = "Нормален";
    $task_state['high']                   = "Висок";
    $task_state['yesterday']              = "За вчера!";
//status
    $task_state['new']                    = "Нов";
    $task_state['planned']                = "Планиран (неактивен)";
    $task_state['active']                 = "Активен (в процес)";
    $task_state['cantcomplete']           = "В застой";
    $task_state['completed']              = "Завършено";
    $task_state['done']                   = "Готов";
    $task_state['task_planned']           = " Планиран";
    $task_state['task_active']            = " Активен";
//project states
    $task_state['planned_project']        = "Планиран проект (неактивен)";
    $task_state['no_deadline_project']    = "Няма краен срок";
    $task_state['active_project']         = "Активен проект";


//common items
    $lang['description']                  = "Описание";
    $lang['name']                         = "Име";
    $lang['add']                          = "Добави";
    $lang['update']                       = "Обнови";
    $lang['submit_changes']               = "Запази";
    $lang['continue']                     = "Продължи";
    $lang['reset']                        = "Изчисти";
    $lang['manage']                       = "Управление";
    $lang['edit']                         = "Промени";
    $lang['delete']                       = "Изтрий";
    $lang['del']                          = "Изтрий";
    $lang['confirm_del_javascript']       = "Потвърдете изтриване!";
    $lang['yes']                          = "Да";
    $lang['no']                           = "Не";
    $lang['action']                       = "Действие";
    $lang['task']                         = "Задача";
    $lang['tasks']                        = "Задачи";
    $lang['project']                      = "Проект";
    $lang['info']                         = "Информация";
    $lang['bytes']                        = " байта";
    $lang['select_instruct']              = " (С Ctrl се избират повече от една група)";
    $lang['member_groups']                = "Потребителят е член на показаните групи (ако има)";
    $lang['login']                        = "Вход";
    $lang['login_action']                 = "Вход";
    $lang['login_screen']                 = "Вход";
    $lang['error']                        = "Грешка";
    $lang['no_login']                     = "Достъпът отказан, грешно име или парола";
//**
    $lang['redirect_sprt']                = "You will automatically return to Login after a %d second delay";
//**
    $lang['login_now']                    = "Please click here to return to Login now";
    $lang['please_login']                 = "Моля влезте";
//**
    $lang['go']                           = "Go!";
//graphic items
    $lang['late_g']                       = "&nbsp;ЗАКЪСНЕНИЕ&nbsp;";
    $lang['new_g']                        = "&nbsp;НОВО&nbsp;";
    $lang['updated_g']                    = "&nbsp;ОБНОВЕНО&nbsp;";
//admin config
    $lang['admin_config']                 = "Админ настройки";
    $lang['email_settings']               = "е-Поща настройки на header";
    $lang['admin_email']                  = "Админ е-Поща";
    $lang['email_reply']                  = "е-Поща 'reply to'";
    $lang['email_from']                   = "е-Поща 'from'";
    $lang['mailing_list']                 = "Пощенски списък";
    $lang['default_checkbox']             = "Подразбиращи се настройки за Проект / Задачи";
    $lang['allow_globalaccess']           = "Позволи глобален достъп";
    $lang['allow_group_edit']             = "Позволи всеки в групата да променя";
    $lang['set_email_owner']              = "Винаги изпращай писмо на притежателя с промените";
    $lang['set_email_group']              = "Винаги изпращай писмо до групата с промените";
//**
    $lang['project_listing_order']        = "Project listing order";
//**
    $lang['task_listing_order']           = "Task listing order";
    $lang['configuration']                = "Configuration";
    $lang['configuration']                = "Конфигуриране";
//archive
//**
    $lang['archived_projects']            = "Archived Projects";
//contacts
    $lang['firstname']                    = "Име:";
    $lang['lastname']                     = "Фамилия:";
    $lang['company']                      = "Компания:";
    $lang['home_phone']                   = "Домашен телефон:";
    $lang['mobile']                       = "Мобилен телефон:";
    $lang['fax']                          = "Факс-номер:";
    $lang['bus_phone']                    = "Служебен телефон:";
    $lang['address']                      = "Адрес:";
    $lang['postal']                       = "Пощенски код:";
    $lang['city']                         = "Град:";
    $lang['email_contact']                = "Е-поща:";
    $lang['notes']                        = "Бележка:";
    $lang['add_contact']                  = "Добави контакт";
    $lang['del_contact']                  = "Изтрий контакт";
    $lang['contact_info']                 = "Контактна информация";
    $lang['contacts']                     = "Контакти";
    $lang['contact_add_info']             = "Ако бъде добавено име на компания тогава то ще бъде показвано вместо потребителското.";
    $lang['show_contact']                 = "Покажи контакт";
    $lang['edit_contact']                 = "Промяна контакт";
    $lang['contact_submit']               = "Добави контакт";
    $lang['contact_warn']                 = "Няма достатъчно данни за добавяне на контакт, моля върнете се и добавете поне 'Име' и 'Фамилия'";
//files
    $lang['manage_files']                 = "Управление файлове";
    $lang['no_files']                     = "Няма качени файлове";
    $lang['no_file_uploads']              = "Конфигурацията на сървъра за тази страница не позволява качването на файлове";
    $lang['file']                         = "Файл:";
    $lang['uploader']                     = "Качване:";
    $lang['files_assoc_project']          = "Файлове към този проект";
    $lang['files_assoc_task']             = "Файлове към тази задача";
    $lang['file_admin']                   = "Управление";
    $lang['add_file']                     = "Добави файл";
    $lang['files']                        = "Файлове";
    $lang['file_choose']                  = "Файл за качване:";
    $lang['upload']                       = "Качване";
    $lang['file_email_owner']             = "Наистина ли да изпращам писмо при качване на файл до притежателя?";
    $lang['file_email_usergroup']         = "Писмо до групата при качване на файл";
    $lang['max_file_sprt']                = "Файлът за качване трябва да е поне %s Кб.";
    $lang['file_submit']                  = "Качване";
    $lang['no_upload']                    = "Файлът  не бе качен. Моля, върнете се обратно и пробвайте отново.";
    $lang['file_too_big_sprt']            = "Максималната дължина на файла трябва да е %s байта. Вашият файл е твърде голям за качване.";
    $lang['del_file_javascript_sprt']     = "Сигурни ли сте в изтриването на \'%s\' ?";
//forum
    $lang['orig_message']                 = "Оригинално съобщение:";
    $lang['post']                         = "Изпрати";
    $lang['message']                      = "Съобщение:";
    $lang['post_reply_sprt']              = "Пусни отговор на съобщение от '%1\$s' относно '%2\$s'";
    $lang['post_message_sprt']            = "Съобщение по: '%s'";
    $lang['forum_email_owner']            = "Писмо със собщението до притежателя";
    $lang['forum_email_usergroup']        = "Писмо със собщението до потребителската група";
    $lang['reply']                        = "Отговори";
    $lang['new_post']                     = "Ново мнение";
    $lang['public_user_forum']            = "Публичен форум";
    $lang['private_forum_sprt']           = "Поверителен форум за '%s' група";
    $lang['forum_submit']                 = "[Forum submit]";
    $lang['no_message']                   = "Няма съобщение! Моля, върнете се обратно и пробвайте пак";
    $lang['add_reply']                    = "Добави отговор";
//**
    $lang['last_post_sprt']               = "Last post %s"; //Note to translators: context is 'Last post 2004-Dec-22";
//**
    $lang['recent_posts']                 = "Recent forum posts";
//**
    $lang['recent_posts']                 = "Recent forum posts";
//**
    $lang['forum_search']                 = "Forum search";
//**
    $lang['no_results']                   = "No results found for '%s'";
//**
    $lang['search_results']               = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

//includes
    $lang['report']                       = "Съобщение";
    $lang['warning']                      = "<h1>Грешка!</h1><p>Обработката на вашата заявка в момента е невъзможна. Моля опитайте отново.</p>";
    $lang['home_page']                    = "Начало";
    $lang['summary_page']                 = "Съдържание";
    $lang['todo_list']                    = "Какво остава";
    $lang['log_out']                      = "Изход";
    $lang['main_menu']                    = "Меню";
//**
    $lang['archive']                      = "Archive";
    $lang['user_homepage_sprt']           = "Дейностите на <b>%s</b>";
    $lang['missing_field_javascript']     = "Моля въведете липсващата стойност!";
    $lang['invalid_date_javascript']      = "Моля изберете валидна календарна дата";
    $lang['finish_date_javascript']       = "Избраната дата е след датата на приключване на проекта!";
    $lang['security_manager']             = "Управление на сигурността";
    $lang['session_timeout_sprt']         = "Достъпът отказан, последното Ви действие е било преди %1\$d минути, а сесията Ви изтича за %2\$d минути, моля <a href=\"%3\$sindex.php\">влезте</a> отново";
    $lang['access_denied']                = "Достъпът отказан";
    $lang['private_usergroup_no_access']  = "Грешка, тази част е на поверителна потребителска група, а Вие нямате права за достъп до нея.";
    $lang['invalid_date']                 = "Невалидна дата";
    $lang['invalid_date_sprt']            = "Датата '%s' е невалидна календарна дата (проверете броя на дните в месеца).<br />Моля върнете се и въведете правилна дата.";
//taskgroups
    $lang['taskgroup_name']               = "Име:";
    $lang['taskgroup_description']        = "Описание:";
    $lang['add_taskgroup']                = "Добави задача";
    $lang['add_new_taskgroup']            = "Добавяне на група задачи";
    $lang['edit_taskgroup']               = "Промяна група задачи";
    $lang['taskgroup_manage']             = "Управление на група задачи";
    $lang['no_taskgroups']                = "Няма дефинирани групи задачи";
    $lang['manage_taskgroups']            = "Управление на групи задачи";
    $lang['taskgroups']                   = "Групи задачи";
    $lang['taskgroup_dup_sprt']           = "Вече има група задачи с име '%s'. Моля върнете се и изберете друго име.";
    $lang['info_taskgroup_manage']        = "Информация";
//usergroups
    $lang['usergroup_name']               = "Име:";
    $lang['usergroup_description']        = "Описание:";
    $lang['members']                      = "Членове:";
    $lang['private_usergroup']            = "Поверителна група";
    $lang['add_usergroup']                = "Добави";
    $lang['add_new_usergroup']            = "Добавяне на потребителска група";
    $lang['edit_usergroup']               = "Промяна";
    $lang['usergroup_manage']             = "Управление на потребителска група";
    $lang['no_usergroups']                = "Няма дефинирани потребителски групи";
    $lang['manage_usergroups']            = "Управление на потребителски групи";
    $lang['usergroups']                   = "Потребителски групи";
    $lang['usergroup_dup_sprt']           = "Вече има потребителска група с име '%s'. Моля върнете се и изберете друго име.";
    $lang['info_usergroup_manage']        = "Информация";
//users
    $lang['login_name']                   = "Потребител";
    $lang['full_name']                    = "Име";
    $lang['password']                     = "Парола";
    $lang['blank_for_current_password']   = "(Оставете празно, ако не искате да сменяте паролата)";
    $lang['email']                        = "е-Поща";
    $lang['admin']                        = "Админ";
    $lang['private_user']                 = "Поверителен";
 //**
    $lang['normal_user']                  = "Normal user";
    $lang['is_admin']                     = "Администратор";
 //**
    $lang['is_guest']                     = "Is a guest?";
 //**
    $lang['guest']                        = "Guest user";
    $lang['user_info']                    = "Инфо за потребителя";
    $lang['deleted_users']                = "Изтрити потребители";
    $lang['no_deleted_users']             = "<i>Няма изтрити потребители</i>";
    $lang['revive']                       = "Възстанови";
    $lang['permdel']                      = "Пълно изтриване";
    $lang['permdel_javascript_sprt']      = "Предстои пълно изтриване на всички потребителски записи и свързаните с \'%s\' задачи. Сигурни ли сте, че го искате?";
    $lang['add_user']                     = "Добавяне на потребител";
    $lang['edit_user']                    = "Промяна данните на потребител";
    $lang['no_users']                     = "Няма регистрирани потребители в системата";
    $lang['users']                        = "Потребители";
    $lang['existing_users']               = "Действащи потребители";
    $lang['private_profile']              = "Този потребител има поверителен профил, който не може да бъде видян.";
    $lang['private_usergroup_profile']    = "(Този потребител е член на поверителна потребителска група и не може де бъде разгледан от Вас)";
    $lang['email_users']                  = "Писма";
    $lang['select_usergroup']             = "Избраните потребителски групи:";
    $lang['subject']                      = "Относно:";
    $lang['message_sent_maillist']        = "Във всички случаи и съобщението ще бъде копирано в пощенския списък.";
    $lang['who_online']                   = "Кой е тук?";
    $lang['edit_details']                 = "Промяна данни";
    $lang['show_details']                 = "Инфо за потребителя";
    $lang['user_deleted']                 = "Този потребител бе изтрит!";
    $lang['no_usergroup']                 = "Потребителят не е член на никоя потребителска група";
    $lang['not_usergroup']                = "(Не е член на потребителска група)";
    $lang['no_password_change']           = "(Вашата парола не бе сменена)";
    $lang['last_time_here']               = "За последно сте били тук:";
    $lang['number_items_created']         = "Брой създадени items:";
    $lang['number_projects_owned']        = "Брой притежавани проекти:";
    $lang['number_tasks_owned']           = "Брой притежавани задачи:";
    $lang['number_tasks_completed']       = "Брой завършени задачи:";
    $lang['number_forum']                 = "Брой мнения във форума:";
    $lang['number_files']                 = "Брой качени файлове:";
    $lang['size_all_files']               = "Общ размер на притежаваните файлове:";
    $lang['owned_tasks']                  = "Притежавани задачи";
    $lang['invalid_email']                = "Невалиден адрес на е-Поща";
    $lang['invalid_email_given_sprt']     = "е-Пощенският адрес '%s' е невалиден. Моля опитайте отново.";
    $lang['duplicate_user']               = "Копиране на потребител";
    $lang['duplicate_change_user_sprt']   = "Потребителят '%s' вече съществува. Моля върнете се и опитайте отново.";
    $lang['value_missing']                = "Липсваща стойност";
    $lang['field_sprt']                   = "Липсва стойността за '%s'. Моля върнете се и я попълнете.";
    $lang['admin_priv']                   = "БЕЛЕЖКА: Вие придобихте администраторски права.";
    $lang['manage_users']                 = "Управление на потребители";
    $lang['users_online']                 = "Потребители са тук";
    $lang['online']                       = "Потребители online (от преди 60 минути)";
    $lang['not_online']                   = "Потребители offline";
    $lang['user_activity']                = "Дейност на потребителя";
//tasks
    $lang['add_new_task']                 = "Add a new task";
    $lang['priority']                     = "Приоритет";
    $lang['parent_task']                  = "Родител";
    $lang['creation_time']                = "Време на създаване";
    $lang['by_sprt']                      = "%1\$s от %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>";
    $lang['project_name']                 = "Име на проекта";
    $lang['task_name']                    = "Име на задачата";
    $lang['deadline']                     = "Краен срок";
    $lang['taken_from_parent']            = "(Взет от родителя)";
    $lang['status']                       = "Статус";
    $lang['task_owner']                   = "Притежател( на задачата)";
    $lang['project_owner']                = "Притежател( на проекта)";
    $lang['taskgroup']                    = "Група задачи";
    $lang['usergroup']                    = "Потребителска група";
    $lang['nobody']                       = "[никой]";
    $lang['none']                         = "[няма]";
    $lang['no_group']                     = "[няма]";
    $lang['all_groups']                   = "Всички групи";
    $lang['all_users']                    = "Всички потребители";
    $lang['all_users_view']               = "Видим за всички";
    $lang['group_edit']                   = "Всеки в групата може да променя";
    $lang['project_description']          = "Описание на проекта";
    $lang['task_description']             = "Описание на задачата";
    $lang['email_owner']                  = "Писмо до притежателя с промените";
    $lang['email_new_owner']              = "Писмо до (новия) притежател с промените";
    $lang['email_group']                  = "Писмо до потребителската група с промените";
    $lang['add_new_project']              = "Добавяне на проект";
    $lang['due_sprt']                     = "%d дена от днес";
    $lang['tomorrow']                     = "Утре";
    $lang['due_today']                    = "Днес";
    $lang['overdue_1']                    = "1 ден просрочен";
    $lang['overdue_sprt']                 = "%d дена просрочен";
    $lang['edit_task']                    = "Промяна задача";
    $lang['edit_project']                 = "Промяна проект";
    $lang['no_reparent']                  = "Няма (a top-level project)";
    $lang['del_javascript_project_sprt']  = "Предстои изтриване на проект \'%s\'. Сигурни ли сте?";
    $lang['del_javascript_task_sprt']     = "Предстои изтриване на задача \'%s\'. Сигурни ли сте?";
    $lang['add_task']                     = "Добави задача";
    $lang['add_subtask']                  = "Добави подзадача";
    $lang['add_project']                  = "Добави проект";
    $lang['clone_project']                = "Копиране на проект";
    $lang['clone_task']                   = "Копиране на задача";
//**
    $lang['quick_jump']                   = "Quick Jump";
    $lang['no_edit']                      = "Вие не сте притежател на този item и следователно не можете да го променяте";
    $lang['uncategorised']                = "<i>[без група]</i>";
    $lang['global']                       = "Глобален";
    $lang['delete_project']               = "Изтриване проект";
    $lang['delete_task']                  = "Изтриване задача";
    $lang['project_options']              = "Проекти";
    $lang['task_options']                 = "Настройки на задача";
//**
    $lang['javascript_archive_project']   = "This will archive project %s.  Are you sure?";
//**
    $lang['archive_project']              = "Archive project";
    $lang['task_navigation']              = "Задачи";
    $lang['new_task']                     = "New task";
    $lang['no_projects']                  = "Няма проекти";
    $lang['show_all_projects']            = "Покажи всички проекти";
    $lang['show_active_projects']         = "Покажи само активните проекти";
    $lang['project_hold_sprt']            = "Проекта е \"В застой\" от %s";
    $lang['project_planned']              = "Планиран проект";
    $lang['percent_sprt']                 = "%d%% от задачата е изпълнена";
    $lang['project_no_deadline']          = "Няма крайни срокове за този проект";
    $lang['no_allowed_projects']          = "Няма проекти, които Ви е позволено да разглеждате";
    $lang['projects']                     = "Проекти";
    $lang['percent_project_sprt']         = "Този проект е %d%% завършен";
    $lang['owned_by']                     = "Притежавано от";
    $lang['created_on']                   = "Създадено на";
    $lang['completed_on']                 = "Завършено на";
    $lang['modified_on']                  = "Променено на";
    $lang['project_on_hold']              = "Проекта е в застой";
    $lang['project_accessible']           = "(Този проект е публично достъпен за всички потребители)";
    $lang['task_accessible']              = "(Тази задача е публично достъпна за всички потребители)";
    $lang['project_not_accessible']       = "(Този проект е достъпен само за членовете на потребителска група)";
    $lang['task_not_accessible']          = "(Тази задача е достъпна само за членовете на потребителска група)";
    $lang['project_not_in_usergroup']     = "<i>Този проект не е част от потребителска група и е достъпен за всички потребители.</i>";
    $lang['task_not_in_usergroup']        = "<i>Тази задача не е част от потребителска група и е достъпна за всички потребители.</i>";
    $lang['usergroup_can_edit_project']   = "Този проект също така може да бъде променян от членовете на потребителската група.";
    $lang['usergroup_can_edit_task']      = "Тази задача също така може да бъде променяна от членовете на потребителската група.";
    $lang['i_take_it']                    = "Аз го взимам :)";
    $lang['i_finished']                   = "Завърших го!";
    $lang['i_dont_want']                  = "Не го искам вече";
    $lang['take_over_project']            = "Превзимам проекта";
    $lang['take_over_task']               = "Превзимам задачата";
    $lang['task_info']                    = "Инфо за задача";
    $lang['project_details']              = "Детайли по проект";
    $lang['todo_list_for']                = "ToDo лист на: ";
    $lang['due_in_sprt']                  = " (До след %d дена)";
    $lang['due_tomorrow']                 = " (До утре)";
    $lang['no_assigned']                  = "Няма незавършени задачи от този потребител.";
    $lang['todo_list']                    = "ToDo лист";
    $lang['summary_list']                 = "Съдържание";
    $lang['task_submit']                  = "Task submit";
    $lang['not_owner']                    = "Access denied, either you are not the owner, or you do not have enough rights";
    $lang['missing_values']               = "There are not enough field values provided, please go back and try again";
    $lang['future']                       = "Бъдеще (future)";
    $lang['flags']                        = "Флагове";
    $lang['owner']                        = "Притежател";
    $lang['group']                        = "Група";
    $lang['by_usergroup']                 = " (по потребителска група)";
    $lang['by_taskgroup']                 = " (по група задачи)";
    $lang['by_deadline']                  = " (по краен срок)";
    $lang['by_status']                    = " (по статус)";
    $lang['by_owner']                     = " (по притежател)";
    $lang['project_cloned']               = "Име на копирания проект:";
    $lang['task_cloned']                  = "Име на копираната задача:";
    $lang['note_clone']                   = "Забележка: Задачата ще бъде копирана като нов проект";
//bits 'n' pieces
    $lang['calendar']                     = "Календар";
    $lang['normal_version']               = "Нормална версия";
    $lang['print_version']                = "Версия за печат";
    $lang['condensed_view']               = "Condensed view";
//**
    $lang['full_view']                    = "Full view";
//**
    $lang['icalendar']                    = "iCalendar";

?>