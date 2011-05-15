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

  Language files for 'sk' (Slovenský)

  Translation: Stanislav Pekarčík,fredis@SoftHome.net

  Maintainer:

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "sk" );

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Máj', 'Jún', 'Júl', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ne', 'Po', 'Ut', 'Str', 'Štv', 'Pi', 'So' );

//task states

 //priorities
    $task_state['dontdo']               = 'Netreba sa ponáhľať';
    $task_state['low']                  = 'Nízka';
    $task_state['normal']               = 'Normálna';
    $task_state['high']                 = 'Vysoká';
    $task_state['yesterday']            = 'Včera bolo neskoro!';
 //status
    $task_state['new']                  = 'Nový';
    $task_state['planned']              = 'Plánovaný (neaktívny)';
    $task_state['active']               = 'Aktívny';
    $task_state['cantcomplete']         = 'Čaká';
    $task_state['completed']            = 'Kompetný';
    $task_state['done']                 = 'Hotovo';
    $task_state['task_planned']         = ' Plánovaná';
    $task_state['task_active']          = ' Aktívna';
 //project states
    $task_state['planned_project']      = 'Plánovaný projekt (neaktívny)';
    $task_state['no_deadline_project']  = 'Nenastavený hraničný termín';
    $task_state['active_project']       = 'Aktívny projekt';

//common items
    $lang['description']                = 'Popis';
    $lang['name']                       = 'Meno';
    $lang['add']                        = 'Pridať';
    $lang['update']                     = 'Opraviť';
    $lang['submit_changes']             = 'Uložiť zmeny';
    $lang['continue']                   = 'Pokračovať';
    $lang['manage']                     = 'Spravovať';
    $lang['edit']                       = 'Editovať';
    $lang['delete']                     = 'Zmazať';
    $lang['del']                        = 'Zmazať';
    $lang['confirm_del_javascript']     = ' Potvrdiť zmazanie!';
    $lang['yes']                        = 'Áno';
    $lang['no']                         = 'Nie';
    $lang['action']                     = 'Akcia';
    $lang['task']                       = 'Úloha';
    $lang['tasks']                      = 'Úlohy';
    $lang['project']                    = 'Projekt';
    $lang['info']                       = 'Info';
    $lang['bytes']                      = ' bytov';
    $lang['select_instruct']            = '(Použite ctrl pre výber viac položiek; alebo žiadnej)';
    $lang['member_groups']              = 'Uživateľ je člen dole zvýraznených skupín (ak je člen nejakej skupiny)';
    $lang['login']                      = 'Login';
    $lang['login_action']               = "Login";
    $lang['login_screen']               = "Login";
    $lang['error']                      = 'Chyba';
    $lang['no_login']                   = 'Prístup odmietnutý; neplatný login alebo heslo';
    $lang['redirect_sprt']              = 'Automatický návrat na login za %d sekúnd ';
    $lang['login_now']                  = 'Prosím kliknite tu pre návrat na login';
    $lang['please_login']               = 'Prosím prihláste sa';
    $lang['go']                         = 'Choď';

    //graphic items
    $lang['late_g']                     = '&nbsp;ZMEŠKANÝ&nbsp;';
    $lang['new_g']                      = '&nbsp;NOVÝ&nbsp;';
    $lang['updated_g']                  = '&nbsp;ZMENENÝ&nbsp;';

//admin config
    $lang['admin_config']               = 'Konfigurácia administrátora';
    $lang['email_settings']             = 'Nastavenie hlavičky emailu';
    $lang['admin_email']                = 'E-mail administrátora';
    $lang['email_reply']                = 'Email \'odpovedať\'';
    $lang['email_from']                 = 'Email \'od\'';
    $lang['mailing_list']               = 'Zoznam pošty';
    $lang['default_checkbox']           = 'Štandartné nastavenie volieb pre projekt/úlohu';
    $lang['allow_globalaccess']         = 'Povoliť úplný prístup?';
    $lang['allow_group_edit']           = 'Povoliť všetkym v uživateľskej skupine editovať?';
    $lang['set_email_owner']            = 'Vždy poslať vlastníkovi email so zmenami?';
    $lang['set_email_group']            = 'Vždy poslať uzivateľskej skupine email so zmenami?';
    $lang['project_listing_order']      = 'Zoznam projektov';
    $lang['task_listing_order']         = 'Zoznam úloh';
    $lang['configuration']              = 'Konfigurácia';

//archive
    $lang['archived_projects']          = 'Archívované projekty';

//contacts
    $lang['firstname']                  = 'Meno:';
    $lang['lastname']                   = 'Priezvisko:';
    $lang['company']                    = 'Spoločnosť:';
    $lang['home_phone']                 = 'Telefón doma:';
    $lang['mobile']                     = 'Mobil:';
    $lang['fax']                        = 'Fax:';
    $lang['bus_phone']                  = 'Telefón práca:';
    $lang['address']                    = 'Adresa:';
    $lang['postal']                     = 'PSČ:';
    $lang['city']                       = 'Mesto:';
    $lang['email_contact']              = 'Email:';
    $lang['notes']                      = 'Poznámka:';
    $lang['add_contact']                = 'Pridať kontakt';
    $lang['del_contact']                = 'Zmazať kontakt';
    $lang['contact_info']               = 'Info o kontakte';
    $lang['contacts']                   = 'Kontakty';
    $lang['contact_add_info']           = 'Ak zadáte meno spoločnosti, bude zobrazené miesto mena užívateľa.';
    $lang['show_contact']               = 'Zobraziť kontakty';
    $lang['edit_contact']               = 'Editovať kontakty';
    $lang['contact_submit']             = 'Odoslať kontakt';
    $lang['contact_warn']               = 'Nie je dosť hodnôt pre pridanie kontaktu; prosím vráťte sa a pridajte aspoň meno a priezvisko';

 //files
    $lang['manage_files']               = 'Spravovať súbory';
    $lang['no_files']                   = 'Žiadné súbory ku správe';
    $lang['no_file_uploads']            = 'Konfigurácia servera pre túto stránku nepovoľuje upload súborov';
    $lang['file']                       = 'Súbor:';
    $lang['uploader']                   = 'Nahral:';
    $lang['files_assoc_project']        = 'Súbory priradené k tomuto projektu';
    $lang['files_assoc_task']           = 'Súbory priradené k tejto úlohe';
    $lang['file_admin']                 = 'Administrácia súborov';
    $lang['add_file']                   = 'Pridať súbor';
    $lang['files']                      = 'Súbory';
    $lang['file_choose']                = 'Súbory k pridaniu:';
    $lang['upload']                     = 'Pridať';
    $lang['file_email_owner']           = 'Emailové notifikácia nového súboru vlastníkovi?';
    $lang['file_email_usergroup']       = 'Emailová notifikácia nového súboru uživateľskej skupine?';
    $lang['max_file_sprt']              = 'Súbor musí byť menší než %s kb.';
    $lang['file_submit']                = 'Potvrdiť súbor ';
    $lang['no_upload']                  = 'Súbor nebol nahratý.  Prosím vráťte sa a skúste znova.';
    $lang['file_too_big_sprt']          = 'Maximálna veľkosť súboru je %s bytov.  Váš súbor bol väčšší a bol zrušený.';
    $lang['del_file_javascript_sprt']   = 'Naozaj vymazať %s ?';

 //forum
    $lang['orig_message']               = 'Originálna správa:';
    $lang['post']                       = 'Odoslať!';
    $lang['message']                    = 'Správa:';
    $lang['post_reply_sprt']            = 'Odoslať odpoveď na správu od \'%1$s\' o \'%2$s\'';
    $lang['post_message_sprt']          = 'Odoslať správu : \'%s\'';
    $lang['forum_email_owner']          = 'Poslať správu vlastníkovi?';
    $lang['forum_email_usergroup']      = 'Poslať správu uživateľskej skupine?';
    $lang['reply']                      = 'Odpovedať';
    $lang['new_post']                   = 'Nová správa';
    $lang['public_user_forum']          = 'Verejné uživateľské fórum';
    $lang['private_forum_sprt']         = 'Privátne fórum pre \'%s\' uživateľsku skupinu';
    $lang['forum_submit']               = 'Potvrdiť fórum ';
    $lang['no_message']                 = 'Žiadna správa! Prosím vráťte sa a skúste znova';
    $lang['add_reply']                  = 'Pridať odpoveď';
    $lang['last_post_sprt']             = 'Posledná správa %s'; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = 'Nedávne správy na fóre';
    $lang['forum_search']               = "Hľadať na fóre";
    $lang['no_results']                 = "Nenájdené výsledky pre '%s'";
    $lang['search_results']             = "Nájdené %1\$s výsledkov pre '%2\$s'<br />Ukázať výsledky %3\$s do %4\$s";

 //includes
    $lang['report']                     = 'Report';
    $lang['warning']                    = '<h1>Pardon!</h1><p>Teraz nie sme schopný vykonať Vašu požiadavku. Prosím skúste neskôr.</p>';
    $lang['home_page']                  = 'Hlavná stránka';
    $lang['summary_page']               = 'Sumárny prehľad';
    $lang['log_out']                    = 'Odhlásiť';
    $lang['main_menu']                  = 'Hlavné menu';
    $lang['archive']                    = 'Archív';
    $lang['user_homepage_sprt']         = 'Hlavná stránka uživateľa %s';
    $lang['missing_field_javascript']   = 'Prosím vyplnťe hodnotu v prázdnom poli';
    $lang['invalid_date_javascript']    = 'Prosím vyberte platný kalendárny dátum';
    $lang['finish_date_javascript']     = 'Vybraný dátum je za konečným dátumom projektu!';
    $lang['security_manager']           = 'Správca bezpečnosti';
    $lang['session_timeout_sprt']       = 'Prístup odopretý; posledná akcia bola pred %1$d minútami a timeout je %2$d minút; prosím <a href="%3$sindex.php">re-login</a>';
    $lang['access_denied']              = 'Prístup odopretý';
    $lang['private_usergroup_no_access']= 'Pardon; táto časť je v privátnej skupine a Vy nemáte prístupové práva.';
    $lang['invalid_date']               = 'Neplatný dátum';
    $lang['invalid_date_sprt']          = 'Dátum %s nie je platný kalendáry dátum (Skontrolujte
počet dní v mesiaci).<br />Prosím vráťte sa a zadajte platný dátum.';

 //taskgroups
    $lang['taskgroup_name']             = 'Skupina pre úlohu:';
    $lang['taskgroup_description']      = 'Popis skupiny pre úlohu:';
    $lang['add_taskgroup']              = 'Pridať skupinu pre úlohu';
    $lang['add_new_taskgroup']          = 'Pridať novú skupinu pre úlohu';
    $lang['edit_taskgroup']             = 'Editovať skupinu pre úlohu';
    $lang['taskgroup_manage']           = 'Spravovať skupinu pre úlohu';
    $lang['no_taskgroups']              = 'Skupiny pre úlohu nedefinované';
    $lang['manage_taskgroups']          = 'Spravovať skupiny pre úlohu';
    $lang['taskgroups']                 = 'Skupiny pre úlohu';
    $lang['taskgroup_dup_sprt']         = 'Skupina pre úlohu \'%s\' už existuje.  Prosím  vráťte sa a zadajte nové meno.';
    $lang['info_taskgroup_manage']      = 'Info pre správu skupín pre úlohu';

 //usergroups
    $lang['usergroup_name']             = 'Meno uživateľskej skupiny:';
    $lang['usergroup_description']      = 'Popis uživateľskej skupiny:';
    $lang['members']                    = 'Členovia:';
    $lang['private_usergroup']          = 'Privátna uživateľská skupina';
    $lang['add_usergroup']              = 'Pridaj uživateľskú skupinu';
    $lang['add_new_usergroup']          = 'Pridaj novú uživateľskú skupinu';
    $lang['edit_usergroup']             = 'Edituj skupinu';
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = 'Správa uživateľskej skupiny';
    $lang['no_usergroups']              = 'Uživateľské skupiny nedefinované';
    $lang['manage_usergroups']          = 'Správa uživateľských skupín';
    $lang['usergroups']                 = 'Uživateľské skupiny';
    $lang['usergroup_dup_sprt']         = 'Uživateľská skupina \'%s\' už existuje.  Prosím vráťte sa a zadajte nové meno.';
    $lang['info_usergroup_manage']      = 'Info pre správu uživateľských skupín';

 //users
    $lang['login_name']                 = 'Login meno';
    $lang['full_name']                  = 'Plné meno';
    $lang['password']                   = 'Heslo';
    $lang['blank_for_current_password'] = '(Nechať prázdne pre aktuálne heslo)';
    $lang['email']                      = 'E-mail';
    $lang['admin']                      = 'Administrátor';
    $lang['private_user']               = 'Privátny uživateľ';
    $lang['normal_user']                = 'Normálny uživateľ';
    $lang['is_admin']                   = 'Je administrátor?';
    $lang['is_guest']                   = 'Je hosť?';
    $lang['guest']                      = 'Hosť';
    $lang['user_info']                  = 'Info o uživateľovi';
    $lang['deleted_users']              = 'Zmazať uživateľa';
    $lang['no_deleted_users']           = 'Uživateľ nebol zrušený.';
    $lang['revive']                     = 'Obnoviť';
    $lang['permdel']                    = 'Trvalo zrušiť';
    $lang['permdel_javascript_sprt']    = 'Táto operácia trvalo zruší všetky záznamy užívateľa a priradené úlohy pre %s. Naozaj to chcete urobiť?';
    $lang['add_user']                   = 'Pridať užívateľa';
    $lang['edit_user']                  = 'Editovať užívateľa';
    $lang['no_users']                   = 'V systéme nie sú uživatelia';
    $lang['users']                      = 'Užívatelia';
    $lang['existing_users']             = 'Existujúci užívateľ';
    $lang['private_profile']            = 'Tento užívateľ má súkromný profil, ktorý Vy nemôžete vidieť.';
    $lang['private_usergroup_profile']  = '(Tento užívateľ je člen súkromnej uživateľskej skupiny, ktorú nemôžete vidieť)';
    $lang['email_users']                = 'Poslať e-mail užívateľom';
    $lang['select_usergroup']           = 'Užívateľská skupina vybraná dole:';
    $lang['subject']                    = 'Predmet:';
    $lang['message_sent_maillist']      = 'Správa bude skopírovaná na zoznam pošty.';
    $lang['who_online']                 = 'Kto je online?';
    $lang['edit_details']               = 'Editovať detaily užívateľa';
    $lang['show_details']               = 'Pozrieť detaily užívateľa';
    $lang['user_deleted']               = 'Tento užívateľ bol zrušený!';
    $lang['no_usergroup']               = 'Tento užívateľ nie je člen nijakej uživateľskej skupiny';
    $lang['not_usergroup']              = '(Nie je člen žiadnej uživateľskej skupiny)';
    $lang['no_password_change']         = '(Vaše heslo nebolo zmenené)';
    $lang['last_time_here']             = 'Posledná návšteva:';
    $lang['number_items_created']       = 'Počet vytvorených položiek:';
    $lang['number_projects_owned']      = 'Počet vlastných projektov:';
    $lang['number_tasks_owned']         = 'Počet vlastných úloh:';
    $lang['number_tasks_completed']     = 'Počet hotových úloh:';
    $lang['number_forum']               = 'Počet správ ma fóre:';
    $lang['number_files']               = 'Počet nahratých súborov:';
    $lang['size_all_files']             = 'Celková veľkosť vlastných súborov:';
    $lang['owned_tasks']                = 'Vlastné úlohy';
    $lang['invalid_email']              = 'Neplatná e-mailová adresa';
    $lang['invalid_email_given_sprt']   = 'E-mailová adresa \'%s\' je neplatná.  Prosím vráťte sa
 a skúste znova.';
    $lang['duplicate_user']             = 'Uživateľ už existuje';
    $lang['duplicate_change_user_sprt'] = 'Užívateľ \'%s\' už existuje.  Prosím vráťte sa a zmeňte meno.';
    $lang['value_missing']              = 'Hodnota chýba';
    $lang['field_sprt']                 = 'Pole pre \'%s\' je prázdne. Prosím vráťte sa a vyplňte ho.';
    $lang['admin_priv']                 = 'POZNÁMKA: Máte administrátorské privilégia.';
    $lang['manage_users']               = 'Správa užívateľov';
    $lang['users_online']               = 'Online užívatelia';
    $lang['online']                     = 'Poslední surferi (Online menej ako 60 minút)';
    $lang['not_online']                 = 'Zostáva';
    $lang['user_activity']              = 'Aktivita užívateľa';

  //tasks
    $lang['add_new_task']               = 'Pridať novú úlohu';
    $lang['priority']                   = 'Priorita';
    $lang['parent_task']                = 'Rodič';
    $lang['creation_time']              = 'Čas vytvorenia';
    $lang['by_sprt']                    = '%1$s od %2$s'; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = 'Meno projektu';
    $lang['task_name']                  = 'Meno úlohy';
    $lang['deadline']                   = 'Hraničný termín';
    $lang['taken_from_parent']          = '(Prevziatý od rodiča)';
    $lang['status']                     = 'Stav';
    $lang['task_owner']                 = 'Vlastník úlohy';
    $lang['project_owner']              = 'Vlastník projektu';
    $lang['taskgroup']                  = 'Skupiny pre úlohu';
    $lang['usergroup']                  = 'Uživateľská skupina';
    $lang['nobody']                     = 'Nikto';
    $lang['none']                       = 'Žiadná';
    $lang['no_group']                   = 'Žiadná skupina';
    $lang['all_groups']                 = 'Všetky skupiny';
    $lang['all_users']                  = 'Všetci užívatelia';
    $lang['all_users_view']             = 'Všetci užívatelia môžu vidieť túto položku?';
    $lang['group_edit']                 = 'Ktokoľvek v uživateľskej skupine môže editovať?';
    $lang['project_description']        = 'Obsah projektu';
    $lang['task_description']           = 'Obsah úlohy';
    $lang['email_owner']                = 'Poslať email o zmene vlastníkovi?';
    $lang['email_new_owner']            = 'Poslať email o zmene (novému) vlastníkovi?';
    $lang['email_group']                = 'poslať email o zmene uživateľskej skupine?';
    $lang['add_new_project']            = 'Pridať nový projekt';
    $lang['uncategorised']              = 'Nezaradený';
    $lang['due_sprt']                   = '%d dní od teraz';
    $lang['tomorrow']                   = 'Zajtra';
    $lang['due_today']                  = 'Dnes';
    $lang['overdue_1']                  = '1 deň oneskorený';
    $lang['overdue_sprt']               = '%d dní oneskorený';
    $lang['edit_task']                  = 'Editovať úlohu';
    $lang['edit_project']               = 'Editovať projekt';
    $lang['no_reparent']                = 'Žiadný (samostatný projekt)';
    $lang['del_javascript_project_sprt']= 'Zmazať projekt %s. Naozaj ?';
    $lang['del_javascript_task_sprt']   = 'Zmazať úlohu %s. Naozaj ?';
    $lang['add_task']                   = 'Pridať úlohu';
    $lang['add_subtask']                = 'Pridať podúlohu';
    $lang['add_project']                = 'Pridať projekt';
    $lang['clone_project']              = 'Kopírovať projekt';
    $lang['clone_task']                 = 'Kopírovať úlohu';
    $lang['quick_jump']                 = 'Prejsť na';
    $lang['no_edit']                    = 'Nie ste vlastník položky a preto ju nemôžete editovať';
    $lang['global']                     = 'Ostatní';
    $lang['delete_project']             = 'Zmazať projekt';
    $lang['delete_task']                = 'Zmazať úlohu';
    $lang['project_options']            = 'Voľby projektu';
    $lang['task_options']               = 'Voľby úlohy';
    $lang['javascript_archive_project'] = 'Projekt bude archivovaný ako %s.  Ste si istý?';
    $lang['archive_project']            = 'Archívny projekt';
    $lang['task_navigation']            = 'Navigácia úlohy';
    $lang['new_task']                   = 'Nová úloha';
    $lang['no_projects']                = 'Žiadný viditeľný projekt';
    $lang['show_all_projects']          = 'Ukázať všetky projekty';
    $lang['show_active_projects']       = 'Ukázať len aktívne projekty';
    $lang['project_hold_sprt']          = 'Projekt čaká od %s';
    $lang['project_planned']            = 'Plánovaný projekt';
    $lang['percent_sprt']               = '%d%% úlohy hotovo';
    $lang['project_no_deadline']        = 'Nie je nastavený hraničný termín tohto projektu';
    $lang['no_allowed_projects']        = 'Nie je Vám dovolené vidieť žiadný projekt';
    $lang['projects']                   = 'Projekty';
    $lang['percent_project_sprt']       = 'Tento projekt je na %d%% hotový';
    $lang['owned_by']                   = 'Vlastník je';
    $lang['created_on']                 = 'Vytvorený';
    $lang['completed_on']               = 'Kompletný';
    $lang['modified_on']                = 'Modifikovaný';
    $lang['project_on_hold']            = 'Projekt čaká';
    $lang['project_accessible']         = '(Tento projekt je verejne dostupný všetkým užívateľom)';
    $lang['task_accessible']            = '(Táto úloha je verejne dostupná všetkým užívateľom)';
    $lang['project_not_accessible']     = '(Tento projekt je dostupný len členom užívateľskej skupiny)';
    $lang['task_not_accessible']        = '(Táto úloha je dostupná len členom užívateľskej skupiny)';
    $lang['project_not_in_usergroup']   = 'Tento projekt nie je pridelený žiadnej uživateľskej skupine a je dostupný všetkým užívateľom.';
    $lang['task_not_in_usergroup']      = 'Táto úloha nie je pridelená žiadnej uživateľskej skupine a je dostupná všetkým uživateľom.';
    $lang['usergroup_can_edit_project'] = 'Tento projekt môžu editovať len členovia uživateľskej skupiny.';
    $lang['usergroup_can_edit_task']    = 'Túto úlohu môžu editovať len členovia uživateľskej skupiny.';
    $lang['i_take_it']                  = 'Prevezmem to :)';
    $lang['i_finished']                 = 'Skočil som!';
    $lang['i_dont_want']                = 'Nechcem to viac';
    $lang['take_over_project']          = 'Prevziať projekt';
    $lang['take_over_task']             = 'Prevziať úlohu';
    $lang['task_info']                  = 'Informácie o úlohe';
    $lang['project_details']            = 'Detaily projektu';
    $lang['todo_list_for']              = 'Zoznam úloh pre: ';
    $lang['due_in_sprt']                = ' (V priebehu %d dní)';
    $lang['due_tomorrow']               = ' (Do zajtra)';
    $lang['no_assigned']                = 'Tento užívateľ nemá nekompletné úlohy.';
    $lang['todo_list']                  = 'Zoznam úloh';
    $lang['summary_list']               = 'Zhrnutie';
    $lang['task_submit']                = 'Poslať úlohu';
    $lang['not_owner']                  = 'Prístup odoprený.Nie ste vlastník; alebo nemáte dostatočné prístupové práva';
    $lang['missing_values']             = 'Nie je dosť vyplnených hodnôt v poli; prosím vráťte sa a skúste znovu';
    $lang['future']                     = 'V budúcnosti';
    $lang['flags']                      = 'Znak';
    $lang['owner']                      = 'Vlastník';
    $lang['group']                      = 'Uživateľská skupina';
    $lang['by_usergroup']               = ' (podľa skupiny)';
    $lang['by_taskgroup']               = ' (podľa skupiny pre úlohu)';
    $lang['by_deadline']                = ' (podľa hraničného termínu)';
    $lang['by_status']                  = ' (podľa stavu)';
    $lang['by_owner']                   = ' (podľa vlastníka)';
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = 'Projekt, ktorý bude klonovaný :';
    $lang['task_cloned']                = 'Úloha, ktorá bude klonovaná :';
    $lang['note_clone']                 = 'Poznámka: Úloha bude klonovaná ako nový projekt';

//bits 'n' pieces
    $lang['calendar']                   = 'Kalendár';
    $lang['normal_version']             = 'Normálna verzia';
    $lang['print_version']              = 'Verzia pre tlač';
    $lang['condensed_view']             = 'Zúžený pohľad';
    $lang['full_view']                  = 'Plný pohľad';
    $lang['icalendar']                  = "iKalendár";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>