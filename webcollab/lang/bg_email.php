<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003

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

  Email text language files for 'bg' (Bulgarian)
  
  Translation: Stoyan Dimitrov <stoyan at adiumdesign dot com> (5 June 2004)
  Translation: Svetlozar Ivanov <svetlozarin at gmail dot com> (5 July 2014)

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 04. Apr 2008 в 9:13 +1200
$email_date = sprintf('%s. %s %s в %s %+03d00', date('d', $ltime ), $month_array[(date('n', $ltime ) )], date('Y', $ltime ), date('H:i', $ltime ), TZ );

//$email_date                 = date("d" ) . ". " . $month_array[(date("n" ) )] . " " . date('Y в H:i T' );

$email_commom_header       =   "    Здравейте,\n\n    Това писмо е от страницата на " . MANAGER_NAME . ", информиращо Ви за това, че на " . $email_date;

$title_file_post            = ABBR_MANAGER_NAME . ": Качване на нов файл: %s";
$email_file_post            = $email_commom_header . " от %1\$s бе качен нов файл.\n\n".
                                "Файл:        %2\$s\n".
                                "Описание:    %3\$s\n\n".
                                "Проект:      %4\$s\n".
                                "Задача:      %5\$s\n\n".
                                "Посетете web-страницата за повече информация.\n\n" . BASE_URL . "%6\$s\n";


$title_forum_post           = ABBR_MANAGER_NAME . ": Ново съобщени от форумите: %s";
$email_forum_post           = $email_commom_header . " от %1\$s:\n\n----\n\n%2\$s\n\n----\n\nбе пуснато ново съобщение във форумите.\n\n".
                                "Посетете web-страницата за повече информация.\n\n" . BASE_URL . "%3\$s\n";
$email_forum_reply          = $email_commom_header . " от %1\$s бе пуснато ново съобщение във форумите. ".
                                "То е отговор на предишното съобщение на %2\$s.\n\n".
                                "Оригинално съобщение:\n %3\$s\n\n".
                                "----\n\n".
                                "Отговор:\n%4\$s\n\n".
                                "----\n\n".
                                "Посетете web-страницата за повече информация.\n\n" . BASE_URL . "%5\$s\n";


$email_list                 = "Проект:  %1\$s\n".
                                "Задача:     %2\$s\n".
                                "Състояние:   %3\$s\n".
                                "Притежател:    %4\$s ( %5\$s )\n".
                                "Текст:\n%6\$s\n\n".
                                "Посетете web-страницата за повече информация.\n\n" . BASE_URL . "%7\$s\n";


$title_takeover_project     = ABBR_MANAGER_NAME . ": Вашият проект бе превзет";
$title_takeover_task        = ABBR_MANAGER_NAME . ": Вашата задача бе превзета";

$email_takeover_task        = $email_commom_header . " Вашият проект бе превзет.\n\n";
$email_takeover_project     = $email_commom_header . " Вашата задача бе превзета.\n\n";


$title_new_owner_project    = ABBR_MANAGER_NAME . ": Нов проект за Вас";
$title_new_owner_task       = ABBR_MANAGER_NAME . ": Нова задача за Вас";

$email_new_owner_project    = $email_commom_header . " бе създаден нов проект и Вие сте негов собственик.\n\nЕто детайлите:\n\n";
$email_new_owner_task       = $email_commom_header . " бе създадена нова задача и Вие сте неин собственик.\n\nЕто детайлите:\n\n";


$title_new_group_project    = ABBR_MANAGER_NAME . ": Нов проект: %s";
$title_new_group_task       = ABBR_MANAGER_NAME . ": Нова задача: %s";

$email_new_group_project    = $email_commom_header . " бе създаден нов проект.\n\nЕто детайлите:\n\n";
$email_new_group_task       = $email_commom_header . " бе създадена нова задача.\n\nЕто детайлите:\n\n";


$title_edit_owner_project   = ABBR_MANAGER_NAME . ": Промяна на Ваш проект";
$title_edit_owner_task      = ABBR_MANAGER_NAME . ": Промяна на Ваша задача";

$email_edit_owner_project   = $email_commom_header . " Ваш проект бе променен.\n\nЕто детайлите:\n\n";
$email_edit_owner_task      = $email_commom_header . " Ваша задача бе променена.\n\nЕто детайлите:\n\n";


$title_edit_group_project   = ABBR_MANAGER_NAME . ": Обновяване на проект";
$title_edit_group_task      = ABBR_MANAGER_NAME . ": Обновяване на задача";

$email_edit_group_project   = $email_commom_header . " бе променен проект принадлежащ на %s.\n\nЕто детайлите:\n\n";
$email_edit_group_task      = $email_commom_header . " бе променена задача принадлежаща на %s.\n\nЕто детайлите:\n\n";


$title_delete_project       = ABBR_MANAGER_NAME . ": Изтрит проект";
$title_delete_task          = ABBR_MANAGER_NAME . ": Изтрита задача";

$email_delete_project       = "    Здравейте,\n\n".
                                $email_commom_header . " проект, който притежавахте, бе изтрит.\n\n".
                                "    Благодарим Ви за управлението на проекта.\n\n";
$email_delete_task          = "    Здравейте,\n\n".
                                $email_commom_header . " задача, която притежавахте, бе изтрита.\n\n".
                                "    Благодарим Ви за управлението на задачата.\n\n";

$delete_list                = "Проект:      %1\$s\n".
                                "Задача:    %2\$s\n".
                                "Състояние: %3\$s\n\n".
                                "Текст:     \n%4\$s\n\n";

$title_usergroup_add       = ABBR_MANAGER_NAME.": Групата %1\$s бе създадена";
$email_usergroup_add       = "Здравей,\n\n".
                             MANAGER_NAME." информира, че новата група %1\$s бе създадена на ".$email_date.".\n\n".
                             "Членове на новата група са:\n".
                             "%2\$s\n";

$title_usergroup_edit       = ABBR_MANAGER_NAME.": Глупата %1\$s бе променена";
$email_usergroup_edit       = "Здравей,\n\n".
                             MANAGER_NAME." информира, че групата %1\$s бе променена на ".$email_date.".\n\n".
                             "Членове на групата са:\n".
                             "%2\$s\n";

$title_welcome              = "    Привет от " . ABBR_MANAGER_NAME;
$email_welcome              = "    Здравейте,\n\n    Това писмо е от страницата на " . MANAGER_NAME . ", приветстваща Ви с добре дошли на " . $email_date . ".\n\n".
                                "Тъй като сте нов тук, ще Ви разясня няколко неща, така че да можете бързо да започнете работа.\n\n".
                                "Най-напред, това е инструмент за управление на проекти, главната страница ще ви покаже проектите, които в момента са налични. ".
                                "Ако кликнете на някое от имената, ще бъдете препратени в частта за задачите. Това е мястото, където се работи.\n\n".
                                "Всеки елемент, който вие изпращате или задача която разработвате, ще бъдът показвани на другите потребители като \"НОВО\" или \"ОБНОВЕНО\". Същото важи и за задачите на другите потребители и така ще можете бързо де се ориентирате къде се работи активно. ".
                                "Също така, можете да завземате или да получавате собственост върху задачи и ще можете да ги редактирате, а също и мненията към тях в принадлежащия форум. ".
                                "Докато разработвате дадена задача, моля, редактирайте текста й и нейния статус, така че всеки да може да проследи процеса на работа.\n\n".
                                "Мога да Ви пожелая само успех и пишете на " . EMAIL_ADMIN. " ако имате затруднения.\n\n--\nУспехи!\n\n".
                                "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n".
                                "Вход:                  %1\$s\n".
                                "Парола:                %2\$s\n\n".
                                "Потребителска група:   %3\$s".
                                "Име:                   %4\$s\n".
                                "Страница:              " . BASE_URL . "\n\n".
                                "%5\$s";

$title_user_change1         = ABBR_MANAGER_NAME . ": Промяна на Вашия акаунт";
$email_user_change1         = $email_commom_header . " от Администратора (%1\$s - %2\$s) бе променен Вашият акаунт.\n\n".
                                "Вход:                  %3\$s\n".
                                "Парола:                %4\$s\n\n".
                                "Потребителска група:   %5\$s".
                                "Име:                   %6\$s\n\n".
                                "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME . ": Промяна на Вашия акаунт";
                              "    Здравейте,\n\n    Това писмо е от страницата на " . MANAGER_NAME . ", потвърждаващо, че промените, които сте направили на " . $email_date . " по акаунта си, са успешни.\n\n";
                                "Вход:      %1\$s\n".
                                "Парола:    %2\$s\n\n".
                                "Име:       %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME . ": Промяна на Вашия акаунт";
$email_user_change3         = "    Здравейте,\n\n    Това писмо е от страницата на " . MANAGER_NAME . ", потвърждаващо че промените, които сте направили на " . $email_date . " по акаунта си, са успешни.\n\n";
                                "Вход:      %1\$s\n".
                                "Текущата Ви парола не е сменяна.\n\n".
                                "Име:       %2\$s\n";


$title_revive               = ABBR_MANAGER_NAME . ": Възстановен акаунт";
$email_revive               = $email_commom_header . " Вашият акаунт бе възстановен.\n\n".
                                "Вход:  %1\$s\n".
                                "Име:   %2\$s\n\n".
                                "Не изпращаме паролата Ви, защото е кодирана. \n\n".
                                "Ако сте забравили паролата си пишете на " . EMAIL_ADMIN . " за нова парола.";



$title_delete_user          = ABBR_MANAGER_NAME . ": Спрян акаунт";
$email_delete_user          = $email_commom_header . " Вашият акаунт бе спрян.\n\n".
                                "Съжаляваме, че ни напускате и искаме да Ви благодарим за свършената работа!\n\n".
                                "Ако мислите, че това е грешка, моля, пишете на " . EMAIL_ADMIN . ".";

?>