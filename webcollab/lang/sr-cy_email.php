<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created on April 2006 by Branko Majic

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

  Email text language files for 'sr-cy' (Serbian Cyrillic)

  Maintainer: Branko Majic <branko.majic@gmail.com>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 04. Apr. 01. 09:18 +1200
$email_date = sprintf('%s %s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d', $ltime ), date('H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Нови фајл је додат: %s";
$email_file_post          = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." додат нови фајл од стране корисника %1\$s.\n\n".
                            "Фајл:  %2\$s\n".
                            "Опис:  %3\$s\n\n".
                            "Пројекат:  %4\$s\n".
                            "Задатак:   %5\$s\n\n".
                            "Посетите сајт за више детаља.\n\n".
                            BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Нова порука на форуму: %s";
$email_forum_post         = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." постављена нова порука на форуму од стране корисника %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Посетите сајт за више детаља.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." постављена нова порука на форуму од стране корисника %1\$s.\n\n".
                            "Ова порука представља одговор на ранију поруку корисника %2\$s.\n\n".
                            "Првобитна порука:\n%3\$s\n\n".
                            "----\n\n".
                            "Нови одговор:\n%4\$s\n\n".
                            "----\n\n".
                            "Посетите сајт за више детаља.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Пројекат:  %1\$s\n".
                            "Задатак:   %2\$s\n".
                            "Стање:     %3\$s\n".
                            "Власник:   %4\$s ( %5\$s )\n".
                            "Текст:\n%6\$s\n\n".
                            "Посетите сајт за више детаља.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Ваш пројекат је преузет";
$title_takeover_task      = ABBR_MANAGER_NAME.": Ваш задатак је преузет";

$email_takeover_task      = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је ваш задатак преузет од стране администратора дана ".$email_date.".\n\n";
$email_takeover_project   = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је ваш пројекат преузет од стране администратора дана ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Нови пројекат за вас";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Нови задатак за вас";

$email_new_owner_project  = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." креиран нови пројекат, и да сте ви власник овог пројекта.\n\n".
                            "Следе детаљи:\n\n";

$email_new_owner_task     = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." креиран нови задатак, и да сте ви власник овог задатка.\n\n".
                            "Следе детаљи:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Нови пројекат: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Нови задатак: %s";

$email_new_group_project  = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." креиран нови пројекат.\n\n".
                            "Следе детаљи:\n\n";

$email_new_group_task     = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." креиран нови задатак.\n\n".
                            "Следе детаљи:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Ваш пројекат је освежен";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Ваш задатак је освежен";

$email_edit_owner_project = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." дошло до измена на пројекту чији сте ви власник.\n\n".
                            "Следе детаљи:\n\n";

$email_edit_owner_task    = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." дошло до измена на задатку чији сте ви власник.\n\n".
                            "Следе детаљи:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Пројекат је освежен";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Задатак је освежен";

$email_edit_group_project = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." дошло до измена на пројекту чији је власник корисник %s.\n\n".
                            "Следе детаљи:\n\n";

$email_edit_group_task    = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." дошло до измена на задатку чији је власник корисник %s.\n\n".
                            "Следе детаљи:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Пројекат је обрисан";
$title_delete_task        = ABBR_MANAGER_NAME.": Задатак је обрисан";

$email_delete_project     = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." обрисан пројекат чији сте ви власник.\n\n".
                            "Хвала вам што сте управљали овим пројектом док је он трајао.\n\n";

$email_delete_task        = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." обрисан задатак чији сте ви власник.\n\n".
                            "Хвала вам што сте управљали овим задатком док је он трајао.\n\n";

$delete_list              = "Пројекат:  %1\$s\n".
                            "Задатак:   %2\$s\n".
                            "Стање:     %3\$s\n\n".
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

$title_welcome            = "Добродошли на сајт ".ABBR_MANAGER_NAME;
$email_welcome            = "Здраво!\n\nОво је сајт ".MANAGER_NAME." који вам жели добродошлицу ;) дана ".$email_date.".\n\n".
                            "Пошто сте ви нови на овом сајту, најпре ћу вам објаснити неколико ствари да бисте што пре могли да почнете са радом у оквиру овог сајта.\n\n".
                            "Пре свега, ово је алат за управљање пројектима. Главна страна ће вам показати тренутно доступне пројекте. ".
                            "Уколико кликнете на било које од ових имена, наћи ћете се на одговарајућој страни за задатак/пројекат. Ово је страна где ће се одвијати сав ваш рад.\n\n".
                            "Сваки унос који поставите или задатак који измените ће осталим корисницима бити приказан као 'нови' или 'освежени' улаз. Ово функционише и у супротном смеру и ".
                            "омогућава и вама да брзо уочите на којим задацима/пројектима постоји активност.\n\n".
                            "Осим тога можете и да преузмете власништво над неким задатком и да се затим нађете у позицији да мењате тај исти задатак, као и да вршите измене у свим форумима који му припадају. ".
                            "Како будете напредовали са задацима, молим вас да мењате текст задатка, како би и сви остали корисници били у току. ".
                            "\n\nЖелим вам успех у будућем раду, и уколико имате неких проблема или питања, пошаљите е-писмо на адресу ".EMAIL_ADMIN.".\n\n --Срећно!\n\n".
                            "Корисничко име:    %1\$s\n".
                            "Лозинка:           %2\$s\n\n".
                            "Корисничке групе:  %3\$s".
                            "Име:               %4\$s\n".
                            "Адреса сајта:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Промене на вашем корисничком налогу од стране администратора";
$email_user_change1       = "Здраво!\n\n".
                            "Ово је сајт ".MANAGER_NAME." који вас обавештава да су дана ".$email_date." извршене измене на вашем корисничком налогу од стране корисника %1\$s ( %2\$s ) \n\n".
                            "Корисничко име:    %3\$s\n".
                            "Лозинка:           %4\$s\n\n".
                            "Корисничке групе:  %5\$s".
                            "Име:               %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Промене на вашем корисничком налогу";
$email_user_change2         = "Здраво!\n\n".
                              "Ово је сајт ".MANAGER_NAME." који вас обавештава да сте дана ".$email_date." успешно извршили измене на свом корисничком налогу.\n\n".
                              "Корисничко име:  %1\$s\n".
                              "Лозинка:         %2\$s\n\n".
                              "Име:             %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Промене на вашем корисничком налогу";
$email_user_change3         = "Здраво!\n\n".
                              "Ово је сајт ".MANAGER_NAME." који вас обавештава да сте дана ".$email_date." успешно извршили измене на свом корисничком налогу.\n\n".
                              "Корисничко име:  %1\$s\n".
                              "Ваша постојећа лозинка је остала непромењена.\n\n".
                              "Име:             %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Укључење налога";
$email_revive               = "Здраво!\n\n".
                              "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." ваш кориснички налог поново постао важећи.\n\n".
                              "Корисничко име:  %1\$s\n".
                              "Име:             %2\$s\n\n".
                              "Нисам у могућности да вам пошаљем лозинку, с обзиром да је она шифрована. \n\n".
                              "Уколико сте заборавили своју лозинку, молим вас да пошаљете е-писмо на адресу ".EMAIL_ADMIN." са захтевом за нову лозинку.";

$title_delete_user          = ABBR_MANAGER_NAME.": Искључење налога.";
$email_delete_user          = "Здраво!\n\n".
                              "Ово је сајт ".MANAGER_NAME." који вас обавештава да је дана ".$email_date." ваш кориснички налог постао неважећи.\n\n".
                              "Жао нам је што нас напуштате, и желимо да вам се на растанку захвалимо за сав ваш труд!\n\n".
                              "Уколико се противите укидању свог налога, или мислите да је посреди грешка, молим вас да пошаљете е-писмо на адресу ".EMAIL_ADMIN.".";

?>
