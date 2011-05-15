<?php
/*

  WebCollab
  ---------------------------------------

  Function:
  ---------

  Email text language files for 'ru' (Russian)

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Новый загруженный файл: %s";
$email_file_post          = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что новый файл был загружен ".$email_date.", загрузил %1\$s.\n\n".
                            "Файл:        %2\$s\n".
                            "Описание: %3\$s\n\n".
                            "Проект:      %4\$s\n".
                            "Задание:     %5\$s\n\n".
                            "Пожалуйста, обратитесь к сайту ".BASE_URL."%6\$s за более подробной информацией\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Новое сообщение в форуме: %s";
$email_forum_post         = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что ".$email_date." в форуме появилось новое сообщение, автор сообщения - %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Более подробно можно узнать на сайте.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что ".$email_date." в форуме появилось новое сообщение, автор %1\$s.\n\n".
                            "Это сообщение - ответ на ранее размешщенное сообщение автора %2\$s.\n\n".
                            "Оригинальное сообщение:\n%3\$s\n\n".
                            "----\n\n".
                            "Новый ответ:\n%4\$s\n\n".
                            "----\n\n".
                            "Пожалуйста, обратитесь к сайту ".BASE_URL."%5\$s за более подробной информацией\n";


$email_list =  "Проект:     %1\$s\n".
               "Задание:    %2\$s\n".
               "Статус:     %3\$s\n".
               "Координатор:%4\$s ( %5\$s )\n".
               "Текст:\n%6\$s\n\n".
               "Пожалуйста, обратитесь к сайту ".BASE_URL."%7\$s за более подробной информацией\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Ваш проект передан";
$title_takeover_task      = ABBR_MANAGER_NAME.": Ваше задание передано";

$email_takeover_task      = "Hello,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что Ваше задание было передано Администратором другому пользователю".$email_date.".\n\n";
$email_takeover_project   = "Hello,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что Ваш проект был передан Администратором другому пользователю".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Новый проект для Вас";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Новое задание для Вас";

$email_new_owner_project  = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что ".$email_date." был начат новый проект и Вы назначены его координаторм.\n\nНекоторые детали:\n\n";
$email_new_owner_task     = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что ".$email_date." было сформулировано новое задание и Вы назначены координаторм его выполнения.\n\nНекоторые детали:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Новый проект: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Новое задание: %s";

$email_new_group_project  = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что ".$email_date." начат новый проект\n\nНекоторые детали:\n\n";
$email_new_group_task     = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что ".$email_date." сформулировано новое задание.\n\nНекоторые детали:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Ваш проект обновлен";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Ваше задание обновлено";

$email_edit_owner_project = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, ".$email_date." Ваш проект был обновлен.\n\nНекторые детали:\n\n";
$email_edit_owner_task    = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, ".$email_date." Ваше задание было обновлено.\n\nНекоторые детали:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Проект обновлен";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Задание обновлено";

$email_edit_group_project = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что проект, координаторм которого является %s был изменен ".$email_date.".\n\nНекоторые детали:\n\n";
$email_edit_group_task    = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что задание, координатором которого является %s было изменено ".$email_date.".\n\nНекоторые детали:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Проект закрыт";
$title_delete_task        = ABBR_MANAGER_NAME.": Задание отменено";

$email_delete_project     = "Здравствуйте,\n\n".
                           "Система ".MANAGER_NAME." информирует Вас о том, что Ваш проект был закрыт ".$email_date."\n\n".
                           "Спасибо за работу над проектом.\n\n";
$email_delete_task        = "Здравствуйте,\n\n".
                            "Система ".MANAGER_NAME." информирует Вас о том, что Ваше задание отменено ".$email_date."\n\n".
                            "Спасибо за работу над заданием.\n\n";

$delete_list =  "Проект: %1\$s\n".
                "Задание:   %2\$s\n".
                "Статус: %3\$s\n\n".
                "Текст:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
                            "The members of the new usergroup are:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
                            "The members of the usergroup are:\n".
                            "%2\$s\n";

$title_welcome            = "Добро пожаловать в ".ABBR_MANAGER_NAME;
$email_welcome            = "Здравствуйте,\n\nСистема ".MANAGER_NAME." приветствует Вас. ".$email_date.".\n\n".
                            "Поскольку Вы новичок, я постараюсь объяснить пару вещей, что бы Вы смогли быстро приступить к работе.\n\n".
                            "Прежде всего, это система управленя проектами. В главном окне вы увидидите проекты или задания, которые Вам доступны.\n".
                            "Если вы кликните по одному из них, вы увидите задания, которые предназначены Вам, И эту работу нужно сделать.\n\n".
                            "Вы также можете участвовать в обсуждении, начинать собственные проекты или браться за выполнение существующих заданий.".
                            "Каждый созданный или измененный Вами объект (проект или задание) будет виден другим участникам как НОВЫЙ или ОБНОВЛЕН.".
                            "При выполнении работ над проектом или заданием не забывайте изменять его статус и описание в зависимости от ситуации,".			
                            "это позволит другим участникам проекта корректировать свою работу, ну и, конечно, от этого зависит ход работ над всем проектом в целом.\n\n".
                            "Мне остается только пожелать вам успехов в работе. Напишите письмо ".EMAIL_ADMIN." если у Вас возникли затруднения.\n\n".
                            " --Удачи !\n\n".
                            "Имя для входа:      %1\$s\n".
                            "Пароль:   %2\$s\n\n".
                            "Группа пользователей: %3\$s".
                            "Имя:       %4\$s\n".
                            "Website:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Изменение учетной записи Администратором";
$email_user_change1       = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что Ваша учетная запись была изменена ".$email_date.", изменения сделал  %1\$s ( %2\$s ) \n\n".
                            "Имя для входа:      %3\$s\n".
                            "Пароль:   %4\$s\n\n".
                            "Группа пользователей: %5\$s".
                            "Имя:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Изменение учетной записи";
$email_user_change2       = "Здравствуйте,\n\nСистема ".MANAGER_NAME." подтверждает, что Вы успешно изменили настройки своей учетной записи ".$email_date.".\n\n".
                            "Имя для входа:    %1\$s\n".
                            "Пароль: %2\$s\n\n".
                            "Имя:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Изменение учетной записи";
$email_user_change3       = "Здравствуйте,\n\nСистема ".MANAGER_NAME." подтверждает, что Вы успешно изменили настройки своей учетной записи ".$email_date.".\n\n".
                            "Имя для входа: %1\$s\n".
                            "Ваш пароль не был изменен.\n\n".
                            "Имя:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Учетная запись восстановлена";
$email_revive             = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что Ваша учетная запись была восстановлена ".$email_date.".\n\n".
                            "Имя для входа: %1\$s\n".
                            "имя пользователя:  %2\$s\n\n".
                            "Мы не можем высслать Вам Ваш пароль, поскольку он зашифрован. \n\n".
                            "Если Вы забыли свой пароль напишите письмо ".EMAIL_ADMIN." для получения нового пароля.";


$title_delete_user        = ABBR_MANAGER_NAME.": Действие учетной записи приостановлено.";
$email_delete_user        = "Здравствуйте,\n\nСистема ".MANAGER_NAME." информирует Вас о том, что ".$email_date." действие Вашей учетной записи было приостановлено .\n".
                            "Мы сожалеем, что вы оставили нас и хотели бы поблагодарить за проделанную работу!\n\n".
                            "В случае, если Вы считаете, что ваша работа важна или думаете, что это ошибка, отправтье email администратору ".EMAIL_ADMIN.".";

?>
