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

  Language files for 'sr-cy' (Serbian Cyrillic)

  Maintainer: Branko Majic <branko.majic@gmail.com>

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "sr" );

//dates
$month_array = array (NULL, 'Јан', 'Феб', 'Мар', 'Апр', 'Мај', 'Јун', 'Јул', 'Авг', 'Сеп', 'Окт', 'Нов', 'Дец' );
$week_array = array('Нед', 'Пон', 'Уто', 'Сре', 'чет', 'Пет', 'Суб' );

//task states

 //priorities
    $task_state['dontdo']               = "Небитно";
    $task_state['low']                  = "Низак";
    $task_state['normal']               = "Средњи";
    $task_state['high']                 = "Висок";
    $task_state['yesterday']            = "Јуче!";
 //status
    $task_state['new']                  = "Ново";
    $task_state['planned']              = "Планиран (није активан)";
    $task_state['active']               = "Активан (ради се на њему)";
    $task_state['cantcomplete']         = "На чекању";
    $task_state['completed']            = "Завршен";
    $task_state['done']                 = "Готов";
    $task_state['task_planned']         = " Планиран";
    $task_state['task_active']          = " Активан";
 //project states
    $task_state['planned_project']      = "Планиран пројекат (није активан)";
    $task_state['no_deadline_project']  = "Без крајњег рока";
    $task_state['active_project']       = "Активан пројекат";

//common items
    $lang['description']                = "Опис";
    $lang['name']                       = "Име";
    $lang['add']                        = "Додај";
    $lang['update']                     = "Освежи";
    $lang['submit_changes']             = "Пошаљи измене";
    $lang['continue']                   = "Настави";
    $lang['manage']                     = "Управљај";
    $lang['edit']                       = "Мењај";
    $lang['delete']                     = "Бриши";
    $lang['del']                        = "Бриши";
    $lang['confirm_del_javascript']     = " Потврдите брисање!";
    $lang['yes']                        = "Да";
    $lang['no']                         = "Не";
    $lang['action']                     = "Акција";
    $lang['task']                       = "Задатак";
    $lang['tasks']                      = "Задаци";
    $lang['project']                    = "Пројекат";
    $lang['info']                       = "Информације";
    $lang['bytes']                      = " бајта";
    $lang['select_instruct']            = "(Држите \"ctrl\" да бисте изабрали више, или за празан одабир)";
    $lang['member_groups']              = "Корисник је члан доле наведених група (уколико је уопште члан неке групе)";
    $lang['login']                      = "Корисничко име";
    $lang['login_action']               = "Пријави се";
    $lang['login_screen']               = "Пријављивање";
    $lang['error']                      = "Грешка";
    $lang['no_login']                   = "Приступ је одбијен. Унели сте нетачно корисничко име или лозинку";
    $lang['redirect_sprt']              = "Бићете аутоматски враћени назад на пријављивање након %d секунди";
    $lang['login_now']                  = "Кликните овде да бисте се вратили назад на пријављивање";
    $lang['please_login']               = "Молим вас да се пријавите";
    $lang['go']                         = "Крени!";

//graphic items
    $lang['late_g']                     = "&nbsp;КАСНИ&nbsp;";
    $lang['new_g']                      = "&nbsp;НОВО&nbsp;";
    $lang['updated_g']                  = "&nbsp;ОСВЕЖЕНО&nbsp;";

//admin config
    $lang['admin_config']               = "Администраторска подешавања";
    $lang['email_settings']             = "Подешавање заглавља е-писма";
    $lang['admin_email']                = "Е-адреса администратора";
    $lang['email_reply']                = "Е-адреса за одговор";
    $lang['email_from']                 = "Е-адреса за извор";
    $lang['mailing_list']               = "Електронска дописна листа";
    $lang['default_checkbox']           = "Стандардна подешавања за пројекте/задатке";
    $lang['allow_globalaccess']         = "Дозволити општи приступ?";
    $lang['allow_group_edit']           = "Дозволити свим корисницима у корисничкој групи да мењају садржај?";
    $lang['set_email_owner']            = "Увек обавести власника е-писмом о променама?";
    $lang['set_email_group']            = "Увек обавести корисничку групу е-писмом о променама?";
    $lang['project_listing_order']      = "Листање пројеката по категорији";
    $lang['task_listing_order']         = "Листање задатака по категорији";
    $lang['configuration']              = "Подешавања";

//archive
    $lang['archived_projects']          = "Архивирани пројекти";

//contacts
    $lang['firstname']                  = "Име:";
    $lang['lastname']                   = "Презиме:";
    $lang['company']                    = "Фирма:";
    $lang['home_phone']                 = "Кућни телефон:";
    $lang['mobile']                     = "Мобилни телефон:";
    $lang['fax']                        = "Факс:";
    $lang['bus_phone']                  = "Телефон на послу:";
    $lang['address']                    = "Адреса:";
    $lang['postal']                     = "Поштански број:";
    $lang['city']                       = "Град:";
    $lang['email_contact']              = "Е-адреса:";
    $lang['notes']                      = "Примедбе:";
    $lang['add_contact']                = "Додај контакт";
    $lang['del_contact']                = "Обриши контакт";
    $lang['contact_info']               = "Информације о контакту";
    $lang['contacts']                   = "Контакти";
    $lang['contact_add_info']           = "Уколико додате име компаније, онда ће оно бити приказано уместо имена корисника.";
    $lang['show_contact']               = "Прикажи контакте";
    $lang['edit_contact']               = "Мењај контакте";
    $lang['contact_submit']             = "Слање контакта";
    $lang['contact_warn']               = "Није унето довољно података да би се додао контакт. Молим вас да се вратите назад, и додате макар име и презиме.";

 //files
    $lang['manage_files']               = "Управљање фајловима";
    $lang['no_files']                   = "Нема фајлова којима би се управљало";
    $lang['no_file_uploads']            = "Конфигурација сервера за овај сајт не дозвољава додавање фајлова.";
    $lang['file']                       = "Фајл:";
    $lang['uploader']                   = "Власник:";
    $lang['files_assoc_project']        = "Фајлови у вези са пројектом";
    $lang['files_assoc_task']           = "Фајлови у вези са задатком";
    $lang['file_admin']                 = "Администрирање фајлова";
    $lang['add_file']                   = "Додај фајл";
    $lang['files']                      = "Фајлови";
    $lang['file_choose']                = "Фајл који треба додати:";
    $lang['upload']                     = "Додај";
    $lang['file_email_owner']           = "Обавести власника е-писмом о новом фајлу?";
    $lang['file_email_usergroup']       = "Обавести корисничку групу е-писмом о новом фајлу?";
    $lang['max_file_sprt']              = "Фајл мора бити мањи од %s килобајта.";
    $lang['file_submit']                = "Слање фајла";
    $lang['no_upload']                  = "Ниједан фајл није додат. Молим вас вратите се назад, и покушајте поново.";
    $lang['file_too_big_sprt']          = "Највећа величина фајла који се може додати износи %s бајта. Ваш фајл је био превелик, па је због тога обрисан.";
    $lang['del_file_javascript_sprt']   = "Јесте ли сигурни да желите да обришете фајл %s ?";


 //forum
    $lang['orig_message']               = "Првобитна порука:";
    $lang['post']                       = "Постави поруку!";
    $lang['message']                    = "Порука:";
    $lang['post_reply_sprt']            = "Постави одговор на поруку корисника '%1\$s' чија је тема '%2\$s'";
    $lang['post_message_sprt']          = "Постави поруку на: '%s'";
    $lang['forum_email_owner']          = "Пошаљи е-писмо са садржајем поруке власнику?";
    $lang['forum_email_usergroup']      = "Пошаљи е-писмо са садржајем поруке корисничкој групи?";
    $lang['reply']                      = "Одговори";
    $lang['new_post']                   = "Нови унос";
    $lang['public_user_forum']          = "Јавни кориснички форум";
    $lang['private_forum_sprt']         = "Приватни форум за корисничку групу '%s'";
    $lang['forum_submit']               = "Постављање поруке на форум";
    $lang['no_message']                 = "Порука није унета! Молим вас да се вратите назад и покушате поново.";
    $lang['add_reply']                  = "Додај одговор";
    $lang['last_post_sprt']             = "Време последњег уноса: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Недавни уноси на форуму";
    $lang['forum_search']               = "Претрага форума";
    $lang['no_results']                 = "Ниједан унос није пронађен за тражени израз '%s'";
    $lang['search_results']             = "Пронађено је %1\$s уноса за тражени израз '%2\$s'<br />Приказујем уносе %3\$s до %4\$s";

 //includes
    $lang['report']                     = "Извештај";
    $lang['warning']                    = "<h1>Извините!</h1><p>Тренутно нисмо у могућности да обрадимо ваш захтев. Молим вас покушајте касније.</p>";
    $lang['home_page']                  = "Главна страна";
    $lang['summary_page']               = "Кратак преглед";
    $lang['log_out']                    = "Одјави се";
    $lang['main_menu']                  = "Главни мени";
    $lang['archive']                    = "Архива";
    $lang['user_homepage_sprt']         = "Главна страна корисника %s";
    $lang['missing_field_javascript']   = "Молим вас унесите податак у одговарајуће непопуњено поље.";
    $lang['invalid_date_javascript']    = "Молим вас изаберите исправан датум.";
    $lang['finish_date_javascript']     = "Завршни датум пројекта истиче пре унетог датума!";
    $lang['security_manager']           = "Безбедоносни механизам";
    $lang['session_timeout_sprt']       = "Приступ је одбијен. Последња акција се десила пре %1\$d минута, а обуставно време износи %2\$d минута. Молим вас да се <a href=\"%3\$sindex.php\">поново пријавите</a>.";
    $lang['access_denied']              = "Приступ је одбијен";
    $lang['private_usergroup_no_access']= "Извините. Ова област припада приватној корисничкој групи, а ви немате довољна права за приступ.";
    $lang['invalid_date']               = "Неисправан датум";
    $lang['invalid_date_sprt']          = "Датум %s није правилан календарски датум (проверите број дана у месецу).<br /> Молим вас вратите се назад и унесите исправан датум.";


 //taskgroups
    $lang['taskgroup_name']             = "Име радне групе:";
    $lang['taskgroup_description']      = "Кратак опис радне групе:";
    $lang['add_taskgroup']              = "Додај радну групу";
    $lang['add_new_taskgroup']          = "Додавање нове радне групе";
    $lang['edit_taskgroup']             = "Мењање радне групе";
    $lang['taskgroup_manage']           = "Управљање радним групама";
    $lang['no_taskgroups']              = "Ниједна радна група није дефинисана";
    $lang['manage_taskgroups']          = "Управљање радним групама";
    $lang['taskgroups']                 = "Радне групе";
    $lang['taskgroup_dup_sprt']         = "Радна група под именом '%s' већ постоји. Молим вас вратите се назад и изаберите ново име.";
    $lang['info_taskgroup_manage']      = "Информације о управљању радним групама";

 //usergroups
    $lang['usergroup_name']             = "Име корисничке групе:";
    $lang['usergroup_description']      = "Кратак опис корисничке групе:";
    $lang['members']                    = "чланови:";
    $lang['private_usergroup']          = "Приватна корисничка група";
    $lang['add_usergroup']              = "Додај корисничку групу";
    $lang['add_new_usergroup']          = "Додавање нове корисничке групе";
    $lang['edit_usergroup']             = "Мењање корисничке групе";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Управљање корисничким групама";
    $lang['no_usergroups']              = "Ниједна корисничка група није дефинисана";
    $lang['manage_usergroups']          = "Управљање корисничким групама";
    $lang['usergroups']                 = "Корисничке групе";
    $lang['usergroup_dup_sprt']         = "Корисничка група под именом '%s' већ постоји. Молим вас вратите се назад, и изаберите ново име.";
    $lang['info_usergroup_manage']      = "Информације о управљању корисничким групама";

 //users
    $lang['login_name']                 = "Корисничко име";
    $lang['full_name']                  = "Пуно име";
    $lang['password']                   = "Лозинка";
    $lang['blank_for_current_password'] = "(Ово поље оставите празно да би тренутна лозинка остала на снази)";
    $lang['email']                      = "Е-адреса";
    $lang['admin']                      = "Администратор";
    $lang['private_user']               = "Приватни кориснички налог";
    $lang['normal_user']                = "Нормалан кориснички налог";
    $lang['is_admin']                   = "Да ли је администратор?";
    $lang['is_guest']                   = "Да ли је гост?";
    $lang['guest']                      = "Корисник-гост";
    $lang['user_info']                  = "Информације о кориснику";
    $lang['deleted_users']              = "Обрисани кориснички налози";
    $lang['no_deleted_users']           = "Нема обрисаних корисничких налога.";
    $lang['revive']                     = "Поврати";
    $lang['permdel']                    = "Трајно брисање";
    $lang['permdel_javascript_sprt']    = "Овим ћете трајно обрисати све корисничке податке и задатке везане за корисника %s. Да ли је ово оно што заиста желите?";
    $lang['add_user']                   = "Додај кориснички налог";
    $lang['edit_user']                  = "Мењање подешавања корисничког налога";
    $lang['no_users']                   = "Не постоји ниједан кориснички налог";
    $lang['users']                      = "Корисници";
    $lang['existing_users']             = "Постојећи корисници";
    $lang['private_profile']            = "Овај корисник има приватни профил који ви не можете да прегледате.";
    $lang['private_usergroup_profile']  = "(Овај корисник је члан приватних корисничких група које ви не можете прегледати)";
    $lang['email_users']                = "Пошаљи е-писмо корисницима";
    $lang['select_usergroup']           = "Изаберите корисничку групу испод:";
    $lang['subject']                    = "Тема:";
    $lang['message_sent_maillist']      = "У свим случајевима порука се такође копира и на е-поштанску дописну листу.";
    $lang['who_online']                 = "Ко је на вези?";
    $lang['edit_details']               = "Мењање података о кориснику";
    $lang['show_details']               = "Прикажи податке о кориснику";
    $lang['user_deleted']               = "Овај кориснички налог је избрисан!";
    $lang['no_usergroup']               = "Корисник није члан ниједне корисничке групе";
    $lang['not_usergroup']              = "(Није члан ниједне корисничке групе)";
    $lang['no_password_change']         = "(Ваша постојећа лозинка није промењена)";
    $lang['last_time_here']             = "Последњи пут виђен овде:";
    $lang['number_items_created']       = "Број креираних уноса:";
    $lang['number_projects_owned']      = "Број пројеката које поседује:";
    $lang['number_tasks_owned']         = "Број задатака које поседује:";
    $lang['number_tasks_completed']     = "Број завршених задатака:";
    $lang['number_forum']               = "Број порука постављених на форум:";
    $lang['number_files']               = "Број додатих фајлова:";
    $lang['size_all_files']             = "Укупна величина фајлова које поседује:";
    $lang['owned_tasks']                = "Задаци које поседује";
    $lang['invalid_email']              = "Неисправна е-адреса";
    $lang['invalid_email_given_sprt']   = "Е-адреса '%s' је неисправна. Молим вас вратите се назад и покушајте поново.";
    $lang['duplicate_user']             = "Кориснички налог већ постоји";
    $lang['duplicate_change_user_sprt'] = "Кориснички налог '%s'већ постоји. Молим вас вратите се назад и промените корисничко име.";
    $lang['value_missing']              = "Фали податак";
    $lang['field_sprt']                 = "Недостаје податак за поље '%s'. Молим вас вратите се назад и попуните га.";
    $lang['admin_priv']                 = "НАПОМЕНА: Добили сте администраторска овлашћења.";
    $lang['manage_users']               = "Управљање корисницима";
    $lang['users_online']               = "Корисници на вези";
    $lang['online']                     = "Скорашњи приступ (на вези пре мање од 60 минута)";
    $lang['not_online']                 = "Остали";
    $lang['user_activity']              = "Активност корисника";

  //tasks
    $lang['add_new_task']               = "Додавање новог задатка";
    $lang['priority']                   = "Приоритет";
    $lang['parent_task']                = "Надређени задатак";
    $lang['creation_time']              = "Време креирања";
    $lang['by_sprt']                    = "%1\$s од стране корисника %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Назив пројекта";
    $lang['task_name']                  = "Назив задатка";
    $lang['deadline']                   = "Крајњи рок";
    $lang['taken_from_parent']          = "(преузето од надређеног задатка)";
    $lang['status']                     = "Стање";
    $lang['task_owner']                 = "Власник задатка";
    $lang['project_owner']              = "Власник пројекта";
    $lang['taskgroup']                  = "Радна група";
    $lang['usergroup']                  = "Корисничка група";
    $lang['nobody']                     = "Нико";
    $lang['none']                       = "Нема";
    $lang['no_group']                   = "Нема групе";
    $lang['all_groups']                 = "Све групе";
    $lang['all_users']                  = "Сви корисници";
    $lang['all_users_view']             = "Сви корисници могу да виде овај унос?";
    $lang['group_edit']                 = "Било ко у групи може да мења унос?";
    $lang['project_description']        = "Опис пројекта";
    $lang['task_description']           = "Опис задатка";
    $lang['email_owner']                = "Обавести е-писмом власника о променама?";
    $lang['email_new_owner']            = "Обавести е-писмом (новог) власника о променама?";
    $lang['email_group']                = "Обавести е-писмом корисничку групу о променама?";
    $lang['add_new_project']            = "Додај нови пројекат";
    $lang['uncategorised']              = "Некатегорисан";
    $lang['due_sprt']                   = "%d дана од данас";
    $lang['tomorrow']                   = "Сутра";
    $lang['due_today']                  = "За данас";
    $lang['overdue_1']                  = "1 дан прекорачења";
    $lang['overdue_sprt']               = "%d дана прекорачења";
    $lang['edit_task']                  = "Мењање задатка";
    $lang['edit_project']               = "Мењање пројекта";
    $lang['no_reparent']                = "Не постоји (пројекат највишег нивоа)";
    $lang['del_javascript_project_sprt']= "Овим ћете обрисати пројекат %s. Јесте ли сигурни да то желите?";
    $lang['del_javascript_task_sprt']   = "Овим ћете обрисати задатак %s. Јесте ли сигурни да то желите?";
    $lang['add_task']                   = "Додај задатак";
    $lang['add_subtask']                = "Додај подзадатак";
    $lang['add_project']                = "Додај пројекат";
    $lang['clone_project']              = "Клонирај пројекат";
    $lang['clone_task']                 = "Клонирај задатак";
    $lang['quick_jump']                 = "Брзи скок";
    $lang['no_edit']                    = "Ви нисте власник овог уноса, те га не можете ни мењати";
    $lang['global']                     = "Опште команде";
    $lang['delete_project']             = "Обриши пројекат";
    $lang['delete_task']                = "Обриши задатак";
    $lang['project_options']            = "Управљање пројектима";
    $lang['task_options']               = "Подешавања задатка";
    $lang['javascript_archive_project'] = "На овај начин ћете архивирати пројекат %s. Јесте ли сигурни да то желите?";
    $lang['archive_project']            = "Архивирај пројекат";
    $lang['task_navigation']            = "Положај задатка";
    $lang['new_task']                   = "Нови задатак";
    $lang['no_projects']                = "Не постоји ниједан пројекат";
    $lang['show_all_projects']          = "Прикажи све пројекте";
    $lang['show_active_projects']       = "Прикажи само активне пројекте";
    $lang['project_hold_sprt']          = "Пројекат је на чекању од датума %s";
    $lang['project_planned']            = "Планиран пројекат";
    $lang['percent_sprt']               = "%d%% задатака је завршено";
    $lang['project_no_deadline']        = "Не постоји крајњи рок за овај пројекат";
    $lang['no_allowed_projects']        = "Не постоји ниједан пројекат који ви можете да прегледате";
    $lang['projects']                   = "Пројекти";
    $lang['percent_project_sprt']       = "Пројекат је завршен %d%%";
    $lang['owned_by']                   = "Власник";
    $lang['created_on']                 = "Креиран дана";
    $lang['completed_on']               = "Завршен дана";
    $lang['modified_on']                = "Промењен дана";
    $lang['project_on_hold']            = "Пројекат је на чекању";
    $lang['project_accessible']         = "(Овај пројекат је јавно доступан свим корисницима)";
    $lang['task_accessible']            = "(Овај задатак је јавно доступан свим корисницима)";
    $lang['project_not_accessible']     = "(Овом пројекту могу приступити само чланови одговарајуће корисничке групе)";
    $lang['task_not_accessible']        = "(Овом задатку могу приступити само чланови одговарајуће корисничке групе)";
    $lang['project_not_in_usergroup']   = "Овај пројекат не припада ниједној корисничкој групи и могу му приступити сви корисници.";
    $lang['task_not_in_usergroup']      = "Овај задатак не припада ниједној корисничкој групи и могу му приступити сви корисници.";
    $lang['usergroup_can_edit_project'] = "Овај пројекат могу мењати и чланови одговарајуће корисничке групе.";
    $lang['usergroup_can_edit_task']    = "Овај задатак могу мењати и чланови одговарајуће корисничке групе.";
    $lang['i_take_it']                  = "Преузећу га :)";
    $lang['i_finished']                 = "Завршио сам га!";
    $lang['i_dont_want']                = "Не желим га више :(";
    $lang['take_over_project']          = "Преузми пројекат";
    $lang['take_over_task']             = "Преузми задатак";
    $lang['task_info']                  = "Информације о задатку";
    $lang['project_details']            = "Детаљи пројекта";
    $lang['todo_list_for']              = "Задужења за: ";
    $lang['due_in_sprt']                = " (завршити у року од %d дана)";
    $lang['due_tomorrow']               = " (завршити до сутра)";
    $lang['no_assigned']                = "Овај корисник нема незавршених задатака.";
    $lang['todo_list']                  = "Задужења";
    $lang['summary_list']               = "Кратак преглед";
    $lang['task_submit']                = "Слање задатка";
    $lang['not_owner']                  = "Приступ је одбијен. Ви или нисте власник, или немате довољна права за приступ.";
    $lang['missing_values']             = "Нисте унели довољан број података. Молим вас вратите се назад и покушајте поново.";
    $lang['future']                     = "У будућности";
    $lang['flags']                      = "Заставице";
    $lang['owner']                      = "Власник";
    $lang['group']                      = "Група";
    $lang['by_usergroup']               = " (према корисничкој групи)";
    $lang['by_taskgroup']               = " (према радној групи)";
    $lang['by_deadline']                = " (према крајњем року)";
    $lang['by_status']                  = " (према стању)";
    $lang['by_owner']                   = " (према власнику)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Пројекат који треба клонирати:";
    $lang['task_cloned']                = "Задатак који треба клонирати:";
    $lang['note_clone']                 = "Напомена: Задатак ће бити клониран као нови пројекат";

//bits 'n' pieces
    $lang['calendar']                   = "Календар";
    $lang['normal_version']             = "Нормална верзија";
    $lang['print_version']              = "Верзија за штампу";
    $lang['condensed_view']             = "Сабијен приказ";
    $lang['full_view']                  = "Пун приказ";
    $lang['icalendar']                  = "\"iCalendar\" фајл";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";


?>