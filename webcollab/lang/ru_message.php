<?php
/*

  WebCollab
  ---------------------------------------

  Function:
  ---------

  Language files for 'ru' (Russian)

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', "UTF-8" );
define('XML_LANG', "ru" );

//dates
$month_array = array (NULL, 'Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек' );
$week_array = array('Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб' );

//task states

 //priorities
    $task_state['dontdo']               = "Может быть когда-нибудь...";
    $task_state['low']                  = "Хотелось бы";
    $task_state['normal']               = "Нормальный";
    $task_state['high']                 = "Нужно";
    $task_state['yesterday']            = "Вчера надо было!";
 //status
    $task_state['new']                  = "Новый";
    $task_state['planned']              = "Планируется (работа стоит)";
    $task_state['active']               = "В работе";
    $task_state['cantcomplete']         = "Ждем";
    $task_state['completed']            = "Завершен";
    $task_state['done']                 = "Закончен";
    $task_state['task_planned']         = " планируется";
    $task_state['task_active']          = " в работе";
 //project states
    $task_state['planned_project']      = "Планируемый проект (работа стоит)";
    $task_state['no_deadline_project']  = "Не установлена дата завершения";
    $task_state['active_project']       = "Проект в работе";

//common items
    $lang['description']                = "Описание";
    $lang['name']                       = "Название";
    $lang['add']                        = "Добавить";
    $lang['update']                     = "Обновить";
    $lang['submit_changes']             = "Сохранить изменения";
    $lang['continue']                   = "Продолжить";
    $lang['manage']                     = "Управление";
    $lang['edit']                       = "Редактировать";
    $lang['delete']                     = "Удалить";
    $lang['del']                        = "Удалить";
    $lang['confirm_del_javascript']     = " подтвердите удаление!";
    $lang['yes']                        = "Да";
    $lang['no']                         = "Нет";
    $lang['action']                     = "Действие";
    $lang['task']                       = "Задание";
    $lang['tasks']                      = "Задания";
    $lang['project']                    = "Проект";
    $lang['info']                       = "Инфо";
    $lang['bytes']                      = " байт";
    $lang['select_instruct']            = "(Нажмите ctrl для выбора больше одного)";
    $lang['member_groups']              = "Пользователь является членом выделенных групп внизу (если является)";
    $lang['login']                      = "Вход";
    $lang['login_action']               = "Вход";
    $lang['login_screen']               = "Вход";
    $lang['error']                      = "Ашипка";
    $lang['no_login']                   = "Доступ запрещен; неверное имя или пароль";
    $lang['redirect_sprt']              = "Вы автоматически вернетесь на страницу входа через %d секунд";
    $lang['login_now']                  = "Нажмите здесь для возврата к регистрации";
    $lang['please_login']               = "Зарегистрируйтесь";
    $lang['go']                         = "Прыг!";

//graphic items
    $lang['late_g']                     = "&nbsp;ЗАДЕРЖКА&nbsp;";
    $lang['new_g']                      = "&nbsp;НОВЫЙ&nbsp;";
    $lang['updated_g']                  = "&nbsp;ОБНОВЛЕН&nbsp;";

//admin config
    $lang['admin_config']               = "Конфигурация";
    $lang['email_settings']             = "Настройка заголовков Email";
    $lang['admin_email']                = "email Администратора";
    $lang['email_reply']                = "Адрес Email для ответа";
    $lang['email_from']                 = "Адрес Email в поле 'От'";
    $lang['mailing_list']               = "Лист рассылки";
    $lang['default_checkbox']           = "Настройки по умолчанию для переключателей Проектов/Заданий";
    $lang['allow_globalaccess']         = "Разрешить общий доступ?";
    $lang['allow_group_edit']           = "Разрешить всем членам группы редактировать?";
    $lang['set_email_owner']            = "Всегда сообщать по email координатора/исполнителя?";
    $lang['set_email_group']            = "Всегда сообщять по email группу пользователей при изменениях?";
    $lang['project_listing_order']      = "Порядок сортировки проектов";
    $lang['task_listing_order']         = "Порядок сортировки заданий";
    $lang['configuration']              = "Конфигурация";

//archive
    $lang['archived_projects']          = "Архивные проекты";

//contacts
    $lang['firstname']                  = "Имя:";
    $lang['lastname']                   = "Фамилия:";
    $lang['company']                    = "Компания:";
    $lang['home_phone']                 = "Домашний телефон:";
    $lang['mobile']                     = "Мобильный:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Рабочий телефон:";
    $lang['address']                    = "Адрес:";
    $lang['postal']                     = "Индекс:";
    $lang['city']                       = "Город:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Прим:";
    $lang['add_contact']                = "Добавить контакт";
    $lang['del_contact']                = "Удалить контакт";
    $lang['contact_info']               = "Информация о контакте";
    $lang['contacts']                   = "Контакты";
    $lang['contact_add_info']           = "Если вы добавите название компании, тогда оно будет отображено вместо имени пользователя.";
    $lang['show_contact']               = "Показать контакты";
    $lang['edit_contact']               = "Редактировать контакты";
    $lang['contact_submit']             = "Контакт: подтверждение";
    $lang['contact_warn']               = "Недостаточно данных для добавления контакта; вернемся назад и добавим имя и фамилию";

 //files
    $lang['manage_files']               = "Управление файлами";
    $lang['no_files']                   = "Нет загруженных файлов";
    $lang['no_file_uploads']            = "Конфигурация сервера не позволяет осуществлять загрузку файлов";
    $lang['file']                       = "Файл:";
    $lang['uploader']                   = "Загрузил:";
    $lang['files_assoc_project']        = "Файл прикреплен к проекту:";
    $lang['files_assoc_task']           = "Файл прикреплен к заданию";
    $lang['file_admin']                 = "Управление файлами";
    $lang['add_file']                   = "Добавить файл";
    $lang['files']                      = "Файлы";
    $lang['file_choose']                = "Файл для загрузки:";
    $lang['upload']                     = "Загрузка";
    $lang['file_email_owner']           = "Сообщать по Email о новых файлах владельца?";
    $lang['file_email_usergroup']       = "Сообщать по Email о новых файлах группы?";
    $lang['max_file_sprt']              = "Файл для загрузки должен быть меньше %s kb.";
    $lang['file_submit']                = "Загрузка файла";
    $lang['no_upload']                  = "Ничего не загрузили.  Вернитесь назад и поробуйте еще раз.";
    $lang['file_too_big_sprt']          = "Максимальный размер файла - %s байт.  Вы загрузили гораздо больший и он был уничтожен.";
    $lang['del_file_javascript_sprt']   = "Вы действительно хотите удалить %s ?";

 //forum
    $lang['orig_message']               = "Исходное сообщение:";
    $lang['post']                       = "Послать!";
    $lang['message']                    = "Сообщение:";
    $lang['post_reply_sprt']            = "Ответ на сообщение автора '%1\$s', форум - '%2\$s'";
    $lang['post_message_sprt']          = "Сообщение в форум: '%s'";
    $lang['forum_email_owner']          = "Сообщать по Email о сообщениях владельца?";
    $lang['forum_email_usergroup']      = "Сообщать по Email о сообщениях группы?";
    $lang['reply']                      = "Ответить";
    $lang['new_post']                   = "Новый пост";
    $lang['public_user_forum']          = "Доступный всем форум";
    $lang['private_forum_sprt']         = "Закрытый форум для группы '%s'";
    $lang['forum_submit']               = "Форум: Подтверждение";
    $lang['no_message']                 = "Ничего нет, пусто! Вернитесь назад и поробуйте еще раз";
    $lang['add_reply']                  = "Добавить ответ";
    $lang['last_post_sprt']             = "Последнее сообщение от %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Новое сообщение в форуме";
    $lang['recent_posts']               = "Recent forum posts";
    $lang['forum_search']               = "Поиск в форуме";
    $lang['no_results']                 = "Не найдено результатов для '%s'";
    $lang['search_results']             = "Найдено %1\$s результатов для '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "Отчет";
    $lang['warning']                    = "<h1>Извините!</h1><p>Мы не можем обслужить ваш запрос прямо сейчас. Поробуйте позже.</p>";
    $lang['home_page']                  = "Главная";
    $lang['summary_page']               = "Обзор";
    $lang['log_out']                    = "Выход";
    $lang['main_menu']                  = "Главное меню";
    $lang['archive']                    = "Архив";
    $lang['user_homepage_sprt']         = "%s - Управление проектами";
    $lang['missing_field_javascript']   = "Заполните пропущенные поля";
    $lang['invalid_date_javascript']    = "Пожалуйста, выбирайте подходящие даты из календаря";
    $lang['finish_date_javascript']     = "Введенная дата позже даты окончания проекта!";
    $lang['security_manager']           = "Управление безопасности";
    $lang['session_timeout_sprt']       = "Доступ запрещен; последнее действие было %1\$d минут назад, тайм-аут составил %2\$d минут; пожалуйста <a href=\"%3\$sindex.php\">зарегистрируйтесь</a>";
    $lang['access_denied']              = "Доступ запрещен";
    $lang['private_usergroup_no_access']= "Извините; этот раздел засекречен и Вы не имеете прав на доступ к нему.";
    $lang['invalid_date']               = "Неверная дата";
    $lang['invalid_date_sprt']          = "Дата %s, кажется, неверна (Проверьте количество дней в месяце).<br />Пожалуйста, вернитесь назад и введите дату.";

 //taskgroups
    $lang['taskgroup_name']             = "Название группы заданий:";
    $lang['taskgroup_description']      = "Краткое описание группы заданий:";
    $lang['add_taskgroup']              = "Добавить группу заданий";
    $lang['add_new_taskgroup']          = "Добавить новую группу заданий";
    $lang['edit_taskgroup']             = "Редактировать группу заданий";
    $lang['taskgroup_manage']           = "Управление группами заданий";
    $lang['no_taskgroups']              = "Ни одной группы нет";
    $lang['manage_taskgroups']          = "Группы заданий: Управление";
    $lang['taskgroups']                 = "Группы заданий";
    $lang['taskgroup_dup_sprt']         = "Уже есть такая группа '%s'.  Вернитесь назад и выберите другое имя.";
    $lang['info_taskgroup_manage']      = "Группа заданий: Информация";

 //usergroups
    $lang['usergroup_name']             = "Название группы пользователей:";
    $lang['usergroup_description']      = "Краткое описание группы пользователей:";
    $lang['members']                    = "Члены:";
    $lang['private_usergroup']          = "Засекреченая группа";
    $lang['add_usergroup']              = "Добавить группу";
    $lang['add_new_usergroup']          = "Добавить новую группу";
    $lang['edit_usergroup']             = "Редактировать группу";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Управление группами пользователей";
    $lang['no_usergroups']              = "Ни одной группы нет";
    $lang['manage_usergroups']          = "Группа пользователей: Управление";
    $lang['usergroups']                 = "Группы пользователей";
    $lang['usergroup_dup_sprt']         = "Уже есть такая группа '%s'.  Вернитесь назад и выберите другое имя.";
    $lang['info_usergroup_manage']      = "Управление группами пользователей: Информация";

 //users
    $lang['login_name']                 = "Имя для входа";
    $lang['full_name']                  = "Полное имя";
    $lang['password']                   = "Пароль";
    $lang['blank_for_current_password'] = "(Не трогайте это поле, что бы сохранить существующий пароль)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Администратор";
    $lang['private_user']               = "Засекречен";
    $lang['normal_user']                = "Обычный пользователь";
    $lang['is_admin']                   = "Будет администратором?";
    $lang['is_guest']                   = "Будет гостем?";
    $lang['guest']                      = "Гость";
    $lang['user_info']                  = "Пользователь: Информация";
    $lang['deleted_users']              = "Удаленные пользователи";
    $lang['no_deleted_users']           = "Нет удаленных пользователей.";
    $lang['revive']                     = "Восстановить";
    $lang['permdel']                    = "Удалить навсегда";
    $lang['permdel_javascript_sprt']    = "Это также удалит все записи пользователя и задания связанные с %s. Вы действительно хотите  это сделать?";
    $lang['add_user']                   = "Добавить пользователя";
    $lang['edit_user']                  = "Изменить";
    $lang['no_users']                   = "Системе неизвестно ни одного пользователя";
    $lang['users']                      = "Пользователи";
    $lang['existing_users']             = "Пользователи системы";
    $lang['private_profile']            = "Этот пользователь засекречен и вы не можете просматривать информацию о нем.";
    $lang['private_usergroup_profile']  = "(Этот пользователь засекречен и вы не можете просматривать информацию о нем)";
    $lang['email_users']                = "Письмо пользователю";
    $lang['select_usergroup']           = "Группы пользователей выбранные внизу:";
    $lang['subject']                    = "Тема:";
    $lang['message_sent_maillist']      = "Во всех случаях сообщение попадет в лист рассылки.";
    $lang['who_online']                 = "Кто в системе?";
    $lang['edit_details']               = "Изменить детальную информацию";
    $lang['show_details']               = "Показать детальную информацию";
    $lang['user_deleted']               = "Этот пользователь был удален!";
    $lang['no_usergroup']               = "Пользователь не является членом ни одной группы";
    $lang['not_usergroup']              = "(Не является членом ни одной группы)";
    $lang['no_password_change']         = "(Ваш пароль не был изменен)";
    $lang['last_time_here']             = "Последний раз был здесь:";
    $lang['number_items_created']       = "Количество созданных объектов:";
    $lang['number_projects_owned']      = "Количество координируемых проектов:";
    $lang['number_tasks_owned']         = "Количество координируемых заданий:";
    $lang['number_tasks_completed']     = "Количество завершенных заданий:";
    $lang['number_forum']               = "Количество сообщений в форуме:";
    $lang['number_files']               = "Количество загруженных файлов:";
    $lang['size_all_files']             = "Общий размер загруженных файлов:";
    $lang['owned_tasks']                = "Координируемые задания";
    $lang['invalid_email']              = "Неверный адрес email";
    $lang['invalid_email_given_sprt']   = "Адрес email '%s' неверный. Вернитесь назад и поробуйте еще раз.";
    $lang['duplicate_user']             = "Клонировать пользователя";
    $lang['duplicate_change_user_sprt'] = "Пользователь '%s' уже зарегистрирован.  Вернитесь назад и выберите другое имя.";
    $lang['value_missing']              = "Данные отсутствуют";
    $lang['field_sprt']                 = "Поле '%s' пропущено. Вернитесь назад и заполните его.";
    $lang['admin_priv']                 = "ВНИМАНИЕ: У васдолжны быть права администратора.";
    $lang['manage_users']               = "Пользователи: Управление";
    $lang['users_online']               = "Пользователи в системе";
    $lang['online']                     = "Трудоголики (более 60 минут здесь)";
    $lang['not_online']                 = "Отдыхающие";
    $lang['user_activity']              = "Активность пользователей";

  //tasks
    $lang['add_new_task']               = "Добавить новое задание";
    $lang['priority']                   = "Приоритет";
    $lang['parent_task']                = "Принадлежит";
    $lang['creation_time']              = "Дата создания";
    $lang['by_sprt']                    = "%1\$s автор: %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Название проекта";
    $lang['task_name']                  = "Название задания";
    $lang['deadline']                   = "Дата завершения";
    $lang['taken_from_parent']          = "(взято из родительского)";
    $lang['status']                     = "Статус";
    $lang['task_owner']                 = "Исполнитель задания";
    $lang['project_owner']              = "Координатор проекта";
    $lang['taskgroup']                  = "Группа заданий";
    $lang['usergroup']                  = "Группа пользователей";
    $lang['nobody']                     = "Никто";
    $lang['none']                       = "Нет";
    $lang['no_group']                   = "Нет группы";
    $lang['all_groups']                 = "Все группы";
    $lang['all_users']                  = "Все пользователи";
    $lang['all_users_view']             = "Все пользователи могут видеть это?";
    $lang['group_edit']                 = "Все пользователи группы могут редактировать?";
    $lang['project_description']        = "Описание проекта";
    $lang['task_description']           = "Описание задания";
    $lang['email_owner']                = "Отправить email координатору при изменении?";
    $lang['email_new_owner']            = "Отправить email новому координатору при изменении?";
    $lang['email_group']                = "Отправить email группе пользователей при изменении?";
    $lang['add_new_project']            = "Добавить новый проект";
    $lang['uncategorised']              = "Uncategorised";
    $lang['due_sprt']                   = "%d дней от сегодняшнего";
    $lang['tomorrow']                   = "Завтра";
    $lang['due_today']                  = "В течении дня";
    $lang['overdue_1']                  = "Задержка 1 день";
    $lang['overdue_sprt']               = "Задержка %d дней";
    $lang['edit_task']                  = "Редактировать задание";
    $lang['edit_project']               = "Редактировать проект";
    $lang['no_reparent']                = "Никому (проект верхнего уровня)";
    $lang['del_javascript_project_sprt']= "Вы намерены удалить  проект %s. Вы уверены?";
    $lang['del_javascript_task_sprt']   = "Вы намерены удалить задание %s. Вы уверены?";
    $lang['add_task']                   = "Добавить задание";
    $lang['add_subtask']                = "Добавить под-задание";
    $lang['add_project']                = "Начать проект";
    $lang['clone_project']              = "Клонировать проект";
    $lang['clone_task']                 = "Клонировать задание";
    $lang['quick_jump']                 = "Быстрый переход";
    $lang['no_edit']                    = "Вы не имеете никакого отношения к этому, а потому и редактировать не можете";
    $lang['global']                     = "Общие";
    $lang['delete_project']             = "Удалить проект";
    $lang['delete_task']                = "Удалить задание";
    $lang['project_options']            = "Проект: опции";
    $lang['task_options']               = "Задание: опции";
    $lang['javascript_archive_project'] = "Вы собираетесь отправить проект %s в архив.  Вы уверены?";
    $lang['archive_project']            = "Архивировать проект";
    $lang['task_navigation']            = "Задания: Навигация";
    $lang['new_task']                   = "Новое задание";
    $lang['no_projects']                = "Нет ни одного проекта что бы показать";
    $lang['show_all_projects']          = "Показать все проекты";
    $lang['show_active_projects']       = "Показать только проекты в работе";
    $lang['project_hold_sprt']          = "Проект ждет с %s";
    $lang['project_planned']            = "Планируемый проект";
    $lang['percent_sprt']               = "%d%% задания выполнено";
    $lang['project_no_deadline']        = "Не установлен срок завершения проекта";
    $lang['no_allowed_projects']        = "Нет проектов что бы вам показать";
    $lang['projects']                   = "Проекты";
    $lang['percent_project_sprt']       = "Выполнение работ по проекту %d%%";
    $lang['owned_by']                   = "Координатор:";
    $lang['created_on']                 = "Создано";
    $lang['completed_on']               = "Завершено";
    $lang['modified_on']                = "Изменено";
    $lang['project_on_hold']            = "Проект ожидает";
    $lang['project_accessible']         = "(Этот проект публично доступен всем пользователям)";
    $lang['task_accessible']            = "(Это задание публично доступно всем пользователям)";
    $lang['project_not_accessible']     = "(Этот проект доступен только членам группы)";
    $lang['task_not_accessible']        = "(Это задание доступно только членам группы)";
    $lang['project_not_in_usergroup']   = "Этот проект не принадлежит какой-либо группе и доступен всем пользователям.";
    $lang['task_not_in_usergroup']      = "Это задание не принадлежит какой-либо группе и доступно всем пользователям.";
    $lang['usergroup_can_edit_project'] = "Этот проект может быть изменен только членами группы.";
    $lang['usergroup_can_edit_task']    = "Это задание может быть изменено только членами группы.";
    $lang['i_take_it']                  = "Ладно, возмусь за это";
    $lang['i_finished']                 = "Я сделал это!";
    $lang['i_dont_want']                = "Не хочу больше иметь с этим дело";
    $lang['take_over_project']          = "Взять проект под контроль";
    $lang['take_over_task']             = "Взять задание под контроль";
    $lang['task_info']                  = "Задание: Информация";
    $lang['project_details']            = "Проект: Детали";
    $lang['todo_list_for']              = "Что нужно сделать для: ";
    $lang['due_in_sprt']                = " (В течение %d дней)";
    $lang['due_tomorrow']               = " (Завтра)";
    $lang['no_assigned']                = "Нет незаконченных заданий для этого пользователя.";
    $lang['todo_list']                  = "Что нужно сделать";
    $lang['summary_list']               = "Обзор проектов";
    $lang['task_submit']                = "Задание: Подтверждение";
    $lang['not_owner']                  = "Доступ запрещен. Либо Вы не координатор либо у Вас недостаточно прав для доступа";
    $lang['missing_values']             = "Не все поля заполнены; вернитесь назад и попробуйте еще раз";
    $lang['future']                     = "Будущее";
    $lang['flags']                      = "Метки";
    $lang['owner']                      = "Координатор";
    $lang['group']                      = "Группа";
    $lang['by_usergroup']               = " (по группам пользователей)";
    $lang['by_taskgroup']               = " (по рабочим группам)";
    $lang['by_deadline']                = " (по датам завершения)";
    $lang['by_status']                  = " (по статусу)";
    $lang['by_owner']                   = " (по координатору)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Проект для клонирования :";
    $lang['task_cloned']                = "Задание для клонирования :";
    $lang['note_clone']                 = "Внимание: задание будет клонировано как новый проект";

//bits 'n' pieces
    $lang['calendar']                   = "Календарь";
    $lang['normal_version']             = "Нормальный вид";
    $lang['print_version']              = "Версия для печати";
    $lang['condensed_view']             = "Свернуть";
    $lang['full_view']                  = "Развернуть";
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>