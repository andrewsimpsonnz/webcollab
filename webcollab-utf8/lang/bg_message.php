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
$web_charset                        = "windows-1251";
$email_charset                      = "windows-1251";

//dates
$month_array                        = array (NULL, "Яну", "Фев", "Мар", "Апр", "Май", "Юни", "Юли", "Авг", "Сеп", "Окт", "Ное", "Дек" );
$week_array                         = array('Нед', 'Пон', 'Вто', 'Стя', 'Чет', 'Пет', 'Съб' );

//task states
$task_state = array(
//priorities
    "dontdo"                        => "Недей",
    "low"                           => "Нисък",
    "normal"                        => "Нормален",
    "high"                          => "Висок",
    "yesterday"                     => "За вчера!",
//status
    "new"                           => "Нов",
    "planned"                       => "Планиран (неактивен)",
    "active"                        => "Активен (в процес)",
    "cantcomplete"                  => "В застой",
    "completed"                     => "Завършено",
    "done"                          => "Готов",
    "task_planned"                  => " Планиран",
    "task_active"                   => " Активен",
//project states
    "planned_project"               => "Планиран проект (неактивен)",
    "no_deadline_project"           => "Няма краен срок",
    "active_project"                => "Активен проект"
);

//common items
$lang = array(
    "description"                   => "Описание",
    "name"                          => "Име",
    "add"                           => "Добави",
    "update"                        => "Обнови",
    "submit_changes"                => "Запази",
    "continue"                      => "Продължи",
    "reset"                         => "Изчисти",
    "manage"                        => "Управление",
    "edit"                          => "Промени",
    "delete"                        => "Изтрий",
    "del"                           => "Изтрий",
    "confirm_del_javascript"        => "Потвърдете изтриване!",
    "yes"                           => "Да",
    "no"                            => "Не",
    "action"                        => "Действие",
    "task"                          => "Задача",
    "tasks"                         => "Задачи",
    "project"                       => "Проект",
    "info"                          => "Информация",
    "bytes"                         => " байта",
    "select_instruct"               => " (С Ctrl се избират повече от една група)",
    "member_groups"                 => "Потребителят е член на показаните групи (ако има)",
    "login"                         => "Вход",
    "error"                         => "Грешка",
    "no_login"                      => "Достъпът отказан, грешно име или парола",
    "please_login"                  => "Моля влезте",
//graphic items
    "late_g"                        => "&nbsp;ЗАКЪСНЕНИЕ&nbsp;",
    "new_g"                         => "&nbsp;НОВО&nbsp;",
    "updated_g"                     => "&nbsp;ОБНОВЕНО&nbsp;",
//admin config
    "admin_config"                  => "Админ настройки",
    "email_settings"                => "е-Поща настройки на header",
    "admin_email"                   => "Админ е-Поща",
    "email_reply"                   => "е-Поща 'reply to'",
    "email_from"                    => "е-Поща 'from'",
    "mailing_list"                  => "Пощенски списък",
    "default_checkbox"              => "Подразбиращи се настройки за Проект / Задачи",
    "allow_globalaccess"            => "Позволи глобален достъп",
    "allow_group_edit"              => "Позволи всеки в групата да променя",
    "set_email_owner"               => "Винаги изпращай писмо на притежателя с промените",
    "set_email_group"               => "Винаги изпращай писмо до групата с промените",
    "configuration"                 => "Конфигуриране",
//contacts
    "firstname"                     => "Име:",
    "lastname"                      => "Фамилия:",
    "company"                       => "Компания:",
    "home_phone"                    => "Домашен телефон:",
    "mobile"                        => "Мобилен телефон:",
    "fax"                           => "Факс-номер:",
    "bus_phone"                     => "Служебен телефон:",
    "address"                       => "Адрес:",
    "postal"                        => "Пощенски код:",
    "city"                          => "Град:",
    "email"                         => "Е-поща:",
    "notes"                         => "Бележка:",
    "add_contact"                   => "Добави контакт",
    "del_contact"                   => "Изтрий контакт",
    "contact_info"                  => "Контактна информация",
    "contacts"                      => "Контакти",
    "contact_add_info"              => "Ако бъде добавено име на компания тогава то ще бъде показвано вместо потребителското.",
    "show_contact"                  => "Покажи контакт",
    "edit_contact"                  => "Промяна контакт",
    "contact_submit"                => "Добави контакт",
    "contact_warn"                  => "Няма достатъчно данни за добавяне на контакт, моля върнете се и добавете поне 'Име' и 'Фамилия'",
//files
    "manage_files"                  => "Управление файлове",
    "no_files"                      => "Няма качени файлове",
    "no_file_uploads"               => "Конфигурацията на сървъра за тази страница не позволява качването на файлове",
    "file"                          => "Файл:",
    "uploader"                      => "Качване:",
    "files_assoc_project"           => "Файлове към този проект",
    "files_assoc_task"              => "Файлове към тази задача",
    "file_admin"                    => "Управление",
    "add_file"                      => "Добави файл",
    "files"                         => "Файлове",
    "file_choose"                   => "Файл за качване:",
    "upload"                        => "Качване",
//**
    "file_email_owner"              => "Наистина ли да изпращам писмо при качване на файл до притежателя?",
//**
    "file_email_usergroup"          => "Писмо до групата при качване на файл",
    "max_file_sprt"                 => "Файлът за качване трябва да е поне %s Кб.",
    "file_submit"                   => "Качване",
    "no_upload"                     => "Файлът  не бе качен. Моля, върнете се обратно и пробвайте отново.",
    "file_too_big_sprt"             => "Максималната дължина на файла трябва да е %s байта. Вашият файл е твърде голям за качване.",
    "del_file_javascript_sprt"      => "Сигурни ли сте в изтриването на \'%s\' ?",
//forum
    "orig_message"                  => "Оригинално съобщение:",
    "post"                          => "Изпрати",
    "message"                       => "Съобщение:",
    "post_reply_sprt"               => "Пусни отговор на съобщение от '%1\$s' относно '%2\$s'",
    "post_message_sprt"             => "Съобщение по: '%s'",
//**
    "forum_email_owner"             => "Писмо със собщението до притежателя",
//**
    "forum_email_usergroup"         => "Писмо със собщението до потребителската група",
    "reply"                         => "Отговори",
    "new_post"                      => "Ново мнение",
    "public_user_forum"             => "Публичен форум",
    "private_forum_sprt"            => "Поверителен форум за '%s' група",
    "forum_submit"                  => "[Forum submit]",
    "no_message"                    => "Няма съобщение! Моля, върнете се обратно и пробвайте пак",
    "add_reply"                     => "Добави отговор",

//includes
    "report"                        => "Съобщение",
    "warning"                       => "<h1>Грешка!</h1><p>Обработката на вашата заявка в момента е невъзможна. Моля опитайте отново.</p>",
    "home_page"                     => "Начало",
    "summary_page"                  => "Съдържание",
    "todo_list"                     => "Какво остава",
    "calendar"                      => "Календар",
    "log_out"                       => "Изход",
    "main_menu"                     => "Меню",
    "user_homepage_sprt"            => "Дейностите на <b>%s</b>",
//"load_time_sprt"                  => "Страницата отне %1\$.3f секунди за зареждане. От тях %2\$.3f секунди бяха ползвани за %3\$d транзакции с базата данни",
//**
    "missing_field_javascript"      => "Моля въведете липсващата стойност!",
//**
    "invalid_date_javascript"       => "Моля изберете валидна календарна дата",
//**
    "finish_date_javascript"        => "Избраната дата е след датата на приключване на проекта!",
    "security_manager"              => "Управление на сигурността",
// "no_key_sprt"                    => "Няма валиден ключ на сесия. Моля <a href=\"%sindex.php\">влезте</a>",
// "no_session"                     => "Няма такава сесия, моля <a href=\"%sindex.php\">влезте</a>",
    "session_timeout_sprt"          => "Достъпът отказан, последното Ви действие е било преди %1\$d минути, а сесията Ви изтича за %2\$d минути, моля <a href=\"%3\$sindex.php\">влезте</a> отново",
    "access_denied"                 => "Достъпът отказан",
    "private_usergroup"             => "Грешка, тази част е на поверителна потребителска група, а Вие нямате права за достъп до нея.",
    "invalid_date"                  => "Невалидна дата",
    "invalid_date_sprt"             => "Датата \'%s\' е невалидна календарна дата (проверете броя на дните в месеца).<br />Моля върнете се и въведете правилна дата.",
//taskgroups
    "taskgroup_name"                => "Име:",
    "taskgroup_description"         => "Описание:",
    "add_taskgroup"                 => "Добави задача",
    "add_new_taskgroup"             => "Добавяне на група задачи",
    "edit_taskgroup"                => "Промяна група задачи",
    "taskgroup_manage"              => "Управление на група задачи",
    "no_taskgroups"                 => "Няма дефинирани групи задачи",
    "manage_taskgroups"             => "Управление на групи задачи",
    "taskgroups"                    => "Групи задачи",
    "taskgroup_dup_sprt"            => "Вече има група задачи с име '%s'. Моля върнете се и изберете друго име.",
    "info_taskgroup_manage"         => "Информация",
//usergroups
    "usergroup_name"                => "Име:",
    "usergroup_description"         => "Описание:",
    "members"                       => "Членове:",
//**
    "private_usergroup"             => "Поверителна група",
    "add_usergroup"                 => "Добави",
    "add_new_usergroup"             => "Добавяне на потребителска група",
    "edit_usergroup"                => "Промяна",
    "usergroup_manage"              => "Управление на потребителска група",
    "no_usergroups"                 => "Няма дефинирани потребителски групи",
    "manage_usergroups"             => "Управление на потребителски групи",
    "usergroups"                    => "Потребителски групи",
    "usergroup_dup_sprt"            => "Вече има потребителска група с име '%s'. Моля върнете се и изберете друго име.",
    "info_usergroup_manage"         => "Информация",
//users
    "login_name"                    => "Потребител",
    "full_name"                     => "Име",
    "password"                      => "Парола",
    "blank_for_current_password"    => "(Оставете празно, ако не искате да сменяте паролата)",
    "email"                         => "е-Поща",
    "admin"                         => "Админ",
//**
    "private_user"                  => "Поверителен",
    "is_admin"                      => "Администратор",
    "user_info"                     => "Инфо за потребителя",
    "deleted_users"                 => "Изтрити потребители",
    "no_deleted_users"              => "<i>Няма изтрити потребители</i>",
    "revive"                        => "Възстанови",
    "permdel"                       => "Пълно изтриване",
    "permdel_javascript_sprt"       => "Предстои пълно изтриване на всички потребителски записи и свързаните с \'%s\' задачи. Сигурни ли сте, че го искате?",
    "add_user"                      => "Добавяне на потребител",
    "edit_user"                     => "Промяна данните на потребител",
    "no_users"                      => "Няма регистрирани потребители в системата",
    "users"                         => "Потребители",
    "existing_users"                => "Действащи потребители",
//**
    "private_profile"               => "Този потребител има поверителен профил, който не може да бъде видян.",
    "private_usergroup_profile"     => "(Този потребител е член на поверителна потребителска група и не може де бъде разгледан от Вас)",
    "email_users"                   => "Писма",
    "select_usergroup"              => "Избраните потребителски групи:",
    "subject"                       => "Относно:",
    "message_sent_maillist"         => "Във всички случаи и съобщението ще бъде копирано в пощенския списък.",
    "who_online"                    => "Кой е тук?",
    "edit_details"                  => "Промяна данни",
    "show_details"                  => "Инфо за потребителя",
    "user_deleted"                  => "Този потребител бе изтрит!",
    "no_usergroup"                  => "Потребителят не е член на никоя потребителска група",
    "not_usergroup"                 => "(Не е член на потребителска група)",
    "no_password_change"            => "(Вашата парола не бе сменена)",
    "last_time_here"                => "За последно сте били тук:",
    "number_items_created"          => "Брой създадени items:",
    "number_projects_owned"         => "Брой притежавани проекти:",
    "number_tasks_owned"            => "Брой притежавани задачи:",
    "number_tasks_completed"        => "Брой завършени задачи:",
    "number_forum"                  => "Брой мнения във форума:",
    "number_files"                  => "Брой качени файлове:",
    "size_all_files"                => "Общ размер на притежаваните файлове:",
    "owned_tasks"                   => "Притежавани задачи",
    "invalid_email"                 => "Невалиден адрес на е-Поща",
    "invalid_email_given_sprt"      => "е-Пощенският адрес '%s' е невалиден. Моля опитайте отново.",
    "duplicate_user"                => "Копиране на потребител",
    "duplicate_change_user_sprt"    => "Потребителят '%s' вече съществува. Моля върнете се и опитайте отново.",
    "value_missing"                 => "Липсваща стойност",
    "field_sprt"                    => "Липсва стойността за '%s'. Моля върнете се и я попълнете.",
    "admin_priv"                    => "БЕЛЕЖКА: Вие придобихте администраторски права.",
    "manage_users"                  => "Управление на потребители",
    "users_online"                  => "Потребители са тук",
    "online"                        => "Потребители online (от преди 60 минути)",
    "not_online"                    => "Потребители offline",
    "user_activity"                 => "Дейност на потребителя",
//tasks
    "add_new_task"                  => "Add a new task",
    "priority"                      => "Приоритет",
    "parent_task"                   => "Родител",
    "creation_time"                 => "Време на създаване",
    "by_sprt"                       => "%1\$s от %2\$s", //Note to translators: context is 'Creation time: <date> by <user>'
    "project_name"                  => "Име на проекта",
    "task_name"                     => "Име на задачата",
    "deadline"                      => "Краен срок",
    "taken_from_parent"             => "(Взет от родителя)",
    "status"                        => "Статус",
    "task_owner"                    => "Притежател( на задачата)",
    "project_owner"                 => "Притежател( на проекта)",
    "taskgroup"                     => "Група задачи",
    "usergroup"                     => "Потребителска група",
    "nobody"                        => "[никой]",
    "none"                          => "[няма]",
    "no_group"                      => "[няма]",
    "all_groups"                    => "Всички групи",
    "all_users"                     => "Всички потребители",
    "all_users_view"                => "Видим за всички",
    "group_edit"                    => "Всеки в групата може да променя",
    "project_description"           => "Описание на проекта",
    "task_description"              => "Описание на задачата",
    "email_owner"                   => "Писмо до притежателя с промените",
    "email_new_owner"               => "Писмо до (новия) притежател с промените",
    "email_group"                   => "Писмо до потребителската група с промените",
    "add_new_project"               => "Добавяне на проект",
    "due_sprt"                      => "%d дена от днес",
    "tomorrow"                      => "Утре",
    "due_today"                     => "Днес",
    "overdue_1"                     => "1 ден просрочен",
    "overdue_sprt"                  => "%d дена просрочен",
    "edit_task"                     => "Промяна задача",
    "edit_project"                  => "Промяна проект",
    "no_reparent"                   => "Няма (a top-level project)",
    "del_javascript_project_sprt"   => "Предстои изтриване на проект \'%s\'. Сигурни ли сте?",
    "del_javascript_task_sprt"      => "Предстои изтриване на задача \'%s\'. Сигурни ли сте?",
    "add_task"                      => "Добави задача",
    "add_subtask"                   => "Добави подзадача",
    "add_project"                   => "Добави проект",
    "clone_project"                 => "Копиране на проект",
    "clone_task"                    => "Копиране на задача",
    "no_edit"                       => "Вие не сте притежател на този item и следователно не можете да го променяте",
    "uncategorised"                 => "<i>[без група]</i>",
    "admin"                         => "Админ",
    "global"                        => "Глобален",
    "delete_project"                => "Изтриване проект",
    "delete_task"                   => "Изтриване задача",
    "project_options"               => "Проекти",
    "task_options"                  => "Настройки на задача",
    "task_navigation"               => "Задачи",
    "no_projects"                   => "Няма проекти",
    "show_all_projects"             => "Покажи всички проекти",
    "show_active_projects"          => "Покажи само активните проекти",
    "project_hold_sprt"             => "Проекта е \"В застой\" от %s",
    "project_planned"               => "Планиран проект",
    "percent_sprt"                  => "%d%% от задачата е изпълнена",
    "project_no_deadline"           => "Няма крайни срокове за този проект",
    "no_allowed_projects"           => "Няма проекти, които Ви е позволено да разглеждате",
    "projects"                      => "Проекти",
    "percent_project_sprt"          => "Този проект е %d%% завършен",
    "owned_by"                      => "Притежавано от",
    "created_on"                    => "Създадено на",
    "completed_on"                  => "Завършено на",
    "modified_on"                   => "Променено на",
    "project_on_hold"               => "Проекта е в застой",
    "project_accessible"            => "(Този проект е публично достъпен за всички потребители)",
    "task_accessible"               => "(Тази задача е публично достъпна за всички потребители)",
    "project_not_accessible"        => "(Този проект е достъпен само за членовете на потребителска група)",
    "task_not_accessible"           => "(Тази задача е достъпна само за членовете на потребителска група)",
    "project_not_in_usergroup"      => "<i>Този проект не е част от потребителска група и е достъпен за всички потребители.</i>",
    "task_not_in_usergroup"         => "<i>Тази задача не е част от потребителска група и е достъпна за всички потребители.</i>",
    "usergroup_can_edit_project"    => "Този проект също така може да бъде променян от членовете на потребителската група.",
    "usergroup_can_edit_task"       => "Тази задача също така може да бъде променяна от членовете на потребителската група.",
    "i_take_it"                     => "Аз го взимам :)",
    "i_finished"                    => "Завърших го!",
    "i_dont_want"                   => "Не го искам вече",
    "take_over_project"             => "Превзимам проекта",
    "take_over_task"                => "Превзимам задачата",
    "task_info"                     => "Инфо за задача",
    "project_details"               => "Детайли по проект",
    "todo_list_for"                 => "ToDo лист на: ",
    "due_in_sprt"                   => " (До след %d дена)",
    "due_tomorrow"                  => " (До утре)",
    "no_assigned"                   => "Няма незавършени задачи от този потребител.",
    "todo_list"                     => "ToDo лист",
    "summary_list"                  => "Съдържание",
    "task_submit"                   => "Task submit",
    "not_owner"                     => "Access denied, either you are not the owner, or you do not have enough rights",
    "missing_values"                => "There are not enough field values provided, please go back and try again",
    "future"                        => "Бъдеще (future)",
    "flags"                         => "Флагове",
    "owner"                         => "Притежател",
    "group"                         => "Група",
    "by_usergroup"                  => " (по потребителска група)",
    "by_taskgroup"                  => " (по група задачи)",
    "by_deadline"                   => " (по краен срок)",
    "by_status"                     => " (по статус)",
    "by_owner"                      => " (по притежател)",
    "project_cloned"                => "Име на копирания проект:",
    "task_cloned"                   => "Име на копираната задача:",
    "note_clone"                    => "Забележка: Задачата ще бъде копирана като нов проект",
//bits 'n' pieces
    "calendar"                      => "Календар",
    "normal_version"                => "Нормална версия",
    "print_version"                 => "Версия за печат"
   )

?>