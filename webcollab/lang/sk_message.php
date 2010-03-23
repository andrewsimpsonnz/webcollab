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

  Translation: Stanislav Pekarèík,fredis@SoftHome.net

  Maintainer:
*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-2" );

//xml language identifier
define('XML_LANG', "sk" );

//this is the regex for input validation filter used in common.php
define('VALIDATION_REGEX', '/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/' ); //ISO-8859-x

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Máj', 'Jún', 'Júl', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ne', 'Po', 'Ut', 'Str', '©tv', 'Pi', 'So' );

//task states

 //priorities
    $task_state['dontdo']               = 'Netreba sa ponáhµa»';
    $task_state['low']                  = 'Nízka';
    $task_state['normal']               = 'Normálna';
    $task_state['high']                 = 'Vysoká';
    $task_state['yesterday']            = 'Vèera bolo neskoro!';
 //status
    $task_state['new']                  = 'Nový';
    $task_state['planned']              = 'Plánovaný (neaktívny)';
    $task_state['active']               = 'Aktívny';
    $task_state['cantcomplete']         = 'Èaká';
    $task_state['completed']            = 'Kompetný';
    $task_state['done']                 = 'Hotovo';
    $task_state['task_planned']         = ' Plánovaná';
    $task_state['task_active']          = ' Aktívna';
 //project states
    $task_state['planned_project']      = 'Plánovaný projekt (neaktívny)';
    $task_state['no_deadline_project']  = 'Nenastavený hranièný termín';
    $task_state['active_project']       = 'Aktívny projekt';

//common items
    $lang['description']                = 'Popis';
    $lang['name']                       = 'Meno';
    $lang['add']                        = 'Prida»';
    $lang['update']                     = 'Opravi»';
    $lang['submit_changes']             = 'Ulo¾i» zmeny';
    $lang['continue']                   = 'Pokraèova»';
    $lang['reset']                      = 'Reset';
    $lang['manage']                     = 'Spravova»';
    $lang['edit']                       = 'Editova»';
    $lang['delete']                     = 'Zmaza»';
    $lang['del']                        = 'Zmaza»';
    $lang['confirm_del_javascript']     = ' Potvrdi» zmazanie!';
    $lang['yes']                        = 'Áno';
    $lang['no']                         = 'Nie';
    $lang['action']                     = 'Akcia';
    $lang['task']                       = 'Úloha';
    $lang['tasks']                      = 'Úlohy';
    $lang['project']                    = 'Projekt';
    $lang['info']                       = 'Info';
    $lang['bytes']                      = ' bytov';
    $lang['select_instruct']            = '(Pou¾ite ctrl pre výber viac polo¾iek; alebo ¾iadnej)';
    $lang['member_groups']              = 'U¾ivateµ je èlen dole zvýraznených skupín (ak je èlen nejakej skupiny)';
    $lang['login']                      = 'Login';
    $lang['login_action']               = 'Login';
    $lang['login_screen']               = 'Login';
    $lang['error']                      = 'Chyba';
    $lang['no_login']                   = 'Prístup odmietnutý; neplatný login alebo heslo';
    $lang['redirect_sprt']              = 'Automatický návrat na login za %d sekúnd ';
    $lang['login_now']                  = 'Prosím kliknite tu pre návrat na login';
    $lang['please_login']               = 'Prosím prihláste sa';
    $lang['go']                         = 'Choï';

    //graphic items
    $lang['late_g']                     = '&nbsp;ZME©KANÝ&nbsp;';
    $lang['new_g']                      = '&nbsp;NOVÝ&nbsp;';
    $lang['updated_g']                  = '&nbsp;ZMENENÝ&nbsp;';

//admin config
    $lang['admin_config']               = 'Konfigurácia administrátora';
    $lang['email_settings']             = 'Nastavenie hlavièky emailu';
    $lang['admin_email']                = 'E-mail administrátora';
    $lang['email_reply']                = 'Email \'odpoveda»\'';
    $lang['email_from']                 = 'Email \'od\'';
    $lang['mailing_list']               = 'Zoznam po¹ty';
    $lang['default_checkbox']           = '©tandartné nastavenie volieb pre projekt/úlohu';
    $lang['allow_globalaccess']         = 'Povoli» úplný prístup?';
    $lang['allow_group_edit']           = 'Povoli» v¹etkym v u¾ivateµskej skupine editova»?';
    $lang['set_email_owner']            = 'V¾dy posla» vlastníkovi email so zmenami?';
    $lang['set_email_group']            = 'V¾dy posla» uzivateµskej skupine email so zmenami?';
    $lang['project_listing_order']      = 'Zoznam projektov';
    $lang['task_listing_order']         = 'Zoznam úloh';
    $lang['configuration']              = 'Konfigurácia';

//archive
    $lang['archived_projects']          = 'Archívované projekty';

//contacts
    $lang['firstname']                  = 'Meno:';
    $lang['lastname']                   = 'Priezvisko:';
    $lang['company']                    = 'Spoloènos»:';
    $lang['home_phone']                 = 'Telefón doma:';
    $lang['mobile']                     = 'Mobil:';
    $lang['fax']                        = 'Fax:';
    $lang['bus_phone']                  = 'Telefón práca:';
    $lang['address']                    = 'Adresa:';
    $lang['postal']                     = 'PSÈ:';
    $lang['city']                       = 'Mesto:';
    $lang['email_contact']              = 'Email:';
    $lang['notes']                      = 'Poznámka:';
    $lang['add_contact']                = 'Prida» kontakt';
    $lang['del_contact']                = 'Zmaza» kontakt';
    $lang['contact_info']               = 'Info o kontakte';
    $lang['contacts']                   = 'Kontakty';
    $lang['contact_add_info']           = 'Ak zadáte meno spoloènosti, bude zobrazené miesto mena u¾ívateµa.';
    $lang['show_contact']               = 'Zobrazi» kontakty';
    $lang['edit_contact']               = 'Editova» kontakty';
    $lang['contact_submit']             = 'Odosla» kontakt';
    $lang['contact_warn']               = 'Nie je dos» hodnôt pre pridanie kontaktu; prosím vrá»te sa a pridajte aspoò meno a priezvisko';

 //files
    $lang['manage_files']               = 'Spravova» súbory';
    $lang['no_files']                   = '®iadné súbory ku správe';
    $lang['no_file_uploads']            = 'Konfigurácia servera pre túto stránku nepovoµuje upload súborov';
    $lang['file']                       = 'Súbor:';
    $lang['uploader']                   = 'Nahral:';
    $lang['files_assoc_project']        = 'Súbory priradené k tomuto projektu';
    $lang['files_assoc_task']           = 'Súbory priradené k tejto úlohe';
    $lang['file_admin']                 = 'Administrácia súborov';
    $lang['add_file']                   = 'Prida» súbor';
    $lang['files']                      = 'Súbory';
    $lang['file_choose']                = 'Súbory k pridaniu:';
    $lang['upload']                     = 'Prida»';
    $lang['file_email_owner']           = 'Emailové notifikácia nového súboru vlastníkovi?';
    $lang['file_email_usergroup']       = 'Emailová notifikácia nového súboru u¾ivateµskej skupine?';
    $lang['max_file_sprt']              = 'Súbor musí by» men¹í ne¾ %s kb.';
    $lang['file_submit']                = 'Potvrdi» súbor ';
    $lang['no_upload']                  = 'Súbor nebol nahratý.  Prosím vrá»te sa a skúste znova.';
    $lang['file_too_big_sprt']          = 'Maximálna veµkos» súboru je %s bytov.  Vá¹ súbor bol väè¹¹í a bol zru¹ený.';
    $lang['del_file_javascript_sprt']   = 'Naozaj vymaza» %s ?';


 //forum
    $lang['orig_message']               = 'Originálna správa:';
    $lang['post']                       = 'Odosla»!';
    $lang['message']                    = 'Správa:';
    $lang['post_reply_sprt']            = 'Odosla» odpoveï na správu od \'%1$s\' o \'%2$s\'';
    $lang['post_message_sprt']          = 'Odosla» správu : \'%s\'';
    $lang['forum_email_owner']          = 'Posla» správu vlastníkovi?';
    $lang['forum_email_usergroup']      = 'Posla» správu u¾ivateµskej skupine?';
    $lang['reply']                      = 'Odpoveda»';
    $lang['new_post']                   = 'Nová správa';
    $lang['public_user_forum']          = 'Verejné u¾ivateµské fórum';
    $lang['private_forum_sprt']         = 'Privátne fórum pre \'%s\' u¾ivateµsku skupinu';
    $lang['forum_submit']               = 'Potvrdi» fórum ';
    $lang['no_message']                 = '®iadna správa! Prosím vrá»te sa a skúste znova';
    $lang['add_reply']                  = 'Prida» odpoveï';
    $lang['last_post_sprt']             = 'Posledná správa %s'; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = 'Nedávne správy na fóre';
    $lang['forum_search']               = "Hµada» na fóre";
    $lang['no_results']                 = "Nenájdené výsledky pre '%s'";
    $lang['search_results']             = "Nájdené %1\$s výsledkov pre '%2\$s'<br />Ukáza» výsledky %3\$s do %4\$s";
 //includes
    $lang['report']                     = 'Report';
    $lang['warning']                    = '<h1>Pardon!</h1><p>Teraz nie sme schopný vykona» Va¹u po¾iadavku. Prosím skúste neskôr.</p>';
    $lang['home_page']                  = 'Hlavná stránka';
    $lang['summary_page']               = 'Sumárny prehµad';
    $lang['log_out']                    = 'Odhlási»';
    $lang['main_menu']                  = 'Hlavné menu';
    $lang['archive']                    = 'Archív';
    $lang['user_homepage_sprt']         = 'Hlavná stránka u¾ivateµa %s';
    $lang['missing_field_javascript']   = 'Prosím vypln»e hodnotu v prázdnom poli';
    $lang['invalid_date_javascript']    = 'Prosím vyberte platný kalendárny dátum';
    $lang['finish_date_javascript']     = 'Vybraný dátum je za koneèným dátumom projektu!';
    $lang['security_manager']           = 'Správca bezpeènosti';
    $lang['session_timeout_sprt']       = 'Prístup odopretý; posledná akcia bola pred %1$d minútami a timeout je %2$d minút; prosím <a href="%3$sindex.php">re-login</a>';
    $lang['access_denied']              = 'Prístup odopretý';
    $lang['private_usergroup_no_access']= 'Pardon; táto èas» je v privátnej skupine a Vy nemáte prístupové práva.';
    $lang['invalid_date']               = 'Neplatný dátum';
    $lang['invalid_date_sprt']          = 'Dátum %s nie je platný kalendáry dátum (Skontrolujte
poèet dní v mesiaci).<br />Prosím vrá»te sa a zadajte platný dátum.';

 //taskgroups
    $lang['taskgroup_name']             = 'Skupina pre úlohu:';
    $lang['taskgroup_description']      = 'Popis skupiny pre úlohu:';
    $lang['add_taskgroup']              = 'Prida» skupinu pre úlohu';
    $lang['add_new_taskgroup']          = 'Prida» novú skupinu pre úlohu';
    $lang['edit_taskgroup']             = 'Editova» skupinu pre úlohu';
    $lang['taskgroup_manage']           = 'Spravova» skupinu pre úlohu';
    $lang['no_taskgroups']              = 'Skupiny pre úlohu nedefinované';
    $lang['manage_taskgroups']          = 'Spravova» skupiny pre úlohu';
    $lang['taskgroups']                 = 'Skupiny pre úlohu';
    $lang['taskgroup_dup_sprt']         = 'Skupina pre úlohu \'%s\' u¾ existuje.  Prosím  vrá»te sa a zadajte nové meno.';
    $lang['info_taskgroup_manage']      = 'Info pre správu skupín pre úlohu';

 //usergroups
    $lang['usergroup_name']             = 'Meno u¾ivateµskej skupiny:';
    $lang['usergroup_description']      = 'Popis u¾ivateµskej skupiny:';
    $lang['members']                    = 'Èlenovia:';
    $lang['private_usergroup']          = 'Privátna u¾ivateµská skupina';
    $lang['add_usergroup']              = 'Pridaj u¾ivateµskú skupinu';
    $lang['add_new_usergroup']          = 'Pridaj novú u¾ivateµskú skupinu';
    $lang['edit_usergroup']             = 'Edituj skupinu';
    $lang['usergroup_manage']           = 'Správa u¾ivateµskej skupiny';
    $lang['no_usergroups']              = 'U¾ivateµské skupiny nedefinované';
    $lang['manage_usergroups']          = 'Správa u¾ivateµských skupín';
    $lang['usergroups']                 = 'U¾ivateµské skupiny';
    $lang['usergroup_dup_sprt']         = 'U¾ivateµská skupina \'%s\' u¾ existuje.  Prosím vrá»te sa a zadajte nové meno.';
    $lang['info_usergroup_manage']      = 'Info pre správu u¾ivateµských skupín';

 //users
    $lang['login_name']                 = 'Login meno';
    $lang['full_name']                  = 'Plné meno';
    $lang['password']                   = 'Heslo';
    $lang['blank_for_current_password'] = '(Necha» prázdne pre aktuálne heslo)';
    $lang['email']                      = 'E-mail';
    $lang['admin']                      = 'Administrátor';
    $lang['private_user']               = 'Privátny u¾ivateµ';
    $lang['normal_user']                = 'Normálny u¾ivateµ';
    $lang['is_admin']                   = 'Je administrátor?';
    $lang['is_guest']                   = 'Je hos»?';
    $lang['guest']                      = 'Hos»';
    $lang['user_info']                  = 'Info o u¾ivateµovi';
    $lang['deleted_users']              = 'Zmaza» u¾ivateµa';
    $lang['no_deleted_users']           = 'U¾ivateµ nebol zru¹ený.';
    $lang['revive']                     = 'Obnovi»';
    $lang['permdel']                    = 'Trvalo zru¹i»';
    $lang['permdel_javascript_sprt']    = 'Táto operácia trvalo zru¹í v¹etky záznamy u¾ívateµa a priradené úlohy pre %s. Naozaj to chcete urobi»?';
    $lang['add_user']                   = 'Prida» u¾ívateµa';
    $lang['edit_user']                  = 'Editova» u¾ívateµa';
    $lang['no_users']                   = 'V systéme nie sú u¾ivatelia';
    $lang['users']                      = 'U¾ívatelia';
    $lang['existing_users']             = 'Existujúci u¾ívateµ';
    $lang['private_profile']            = 'Tento u¾ívateµ má súkromný profil, ktorý Vy nemô¾ete vidie».';
    $lang['private_usergroup_profile']  = '(Tento u¾ívateµ je èlen súkromnej u¾ivateµskej skupiny, ktorú nemô¾ete vidie»)';
    $lang['email_users']                = 'Posla» e-mail u¾ívateµom';
    $lang['select_usergroup']           = 'U¾ívateµská skupina vybraná dole:';
    $lang['subject']                    = 'Predmet:';
    $lang['message_sent_maillist']      = 'Správa bude skopírovaná na zoznam po¹ty.';
    $lang['who_online']                 = 'Kto je online?';
    $lang['edit_details']               = 'Editova» detaily u¾ívateµa';
    $lang['show_details']               = 'Pozrie» detaily u¾ívateµa';
    $lang['user_deleted']               = 'Tento u¾ívateµ bol zru¹ený!';
    $lang['no_usergroup']               = 'Tento u¾ívateµ nie je èlen nijakej u¾ivateµskej skupiny';
    $lang['not_usergroup']              = '(Nie je èlen ¾iadnej u¾ivateµskej skupiny)';
    $lang['no_password_change']         = '(Va¹e heslo nebolo zmenené)';
    $lang['last_time_here']             = 'Posledná náv¹teva:';
    $lang['number_items_created']       = 'Poèet vytvorených polo¾iek:';
    $lang['number_projects_owned']      = 'Poèet vlastných projektov:';
    $lang['number_tasks_owned']         = 'Poèet vlastných úloh:';
    $lang['number_tasks_completed']     = 'Poèet hotových úloh:';
    $lang['number_forum']               = 'Poèet správ ma fóre:';
    $lang['number_files']               = 'Poèet nahratých súborov:';
    $lang['size_all_files']             = 'Celková veµkos» vlastných súborov:';
    $lang['owned_tasks']                = 'Vlastné úlohy';
    $lang['invalid_email']              = 'Neplatná e-mailová adresa';
    $lang['invalid_email_given_sprt']   = 'E-mailová adresa \'%s\' je neplatná.  Prosím vrá»te sa
 a skúste znova.';
    $lang['duplicate_user']             = 'U¾ivateµ u¾ existuje';
    $lang['duplicate_change_user_sprt'] = 'U¾ívateµ \'%s\' u¾ existuje.  Prosím vrá»te sa a zmeòte meno.';
    $lang['value_missing']              = 'Hodnota chýba';
    $lang['field_sprt']                 = 'Pole pre \'%s\' je prázdne. Prosím vrá»te sa a vyplòte ho.';
    $lang['admin_priv']                 = 'POZNÁMKA: Máte administrátorské privilégia.';
    $lang['manage_users']               = 'Správa u¾ívateµov';
    $lang['users_online']               = 'Online u¾ívatelia';
    $lang['online']                     = 'Poslední surferi (Online menej ako 60 minút)';
    $lang['not_online']                 = 'Zostáva';
    $lang['user_activity']              = 'Aktivita u¾ívateµa';

  //tasks
    $lang['add_new_task']               = 'Prida» novú úlohu';
    $lang['priority']                   = 'Priorita';
    $lang['parent_task']                = 'Rodiè';
    $lang['creation_time']              = 'Èas vytvorenia';
    $lang['by_sprt']                    = '%1$s od %2$s'; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = 'Meno projektu';
    $lang['task_name']                  = 'Meno úlohy';
    $lang['deadline']                   = 'Hranièný termín';
    $lang['taken_from_parent']          = '(Prevziatý od rodièa)';
    $lang['status']                     = 'Stav';
    $lang['task_owner']                 = 'Vlastník úlohy';
    $lang['project_owner']              = 'Vlastník projektu';
    $lang['taskgroup']                  = 'Skupiny pre úlohu';
    $lang['usergroup']                  = 'U¾ivateµská skupina';
    $lang['nobody']                     = 'Nikto';
    $lang['none']                       = '®iadná';
    $lang['no_group']                   = '®iadná skupina';
    $lang['all_groups']                 = 'V¹etky skupiny';
    $lang['all_users']                  = 'V¹etci u¾ívatelia';
    $lang['all_users_view']             = 'V¹etci u¾ívatelia mô¾u vidie» túto polo¾ku?';
    $lang['group_edit']                 = 'Ktokoµvek v u¾ivateµskej skupine mô¾e editova»?';
    $lang['project_description']        = 'Obsah projektu';
    $lang['task_description']           = 'Obsah úlohy';
    $lang['email_owner']                = 'Posla» email o zmene vlastníkovi?';
    $lang['email_new_owner']            = 'Posla» email o zmene (novému) vlastníkovi?';
    $lang['email_group']                = 'posla» email o zmene u¾ivateµskej skupine?';
    $lang['add_new_project']            = 'Prida» nový projekt';
    $lang['uncategorised']              = 'Nezaradený';
    $lang['due_sprt']                   = '%d dní od teraz';
    $lang['tomorrow']                   = 'Zajtra';
    $lang['due_today']                  = 'Dnes';
    $lang['overdue_1']                  = '1 deò oneskorený';
    $lang['overdue_sprt']               = '%d dní oneskorený';
    $lang['edit_task']                  = 'Editova» úlohu';
    $lang['edit_project']               = 'Editova» projekt';
    $lang['no_reparent']                = '®iadný (samostatný projekt)';
    $lang['del_javascript_project_sprt']= 'Zmaza» projekt %s. Naozaj ?';
    $lang['del_javascript_task_sprt']   = 'Zmaza» úlohu %s. Naozaj ?';
    $lang['add_task']                   = 'Prida» úlohu';
    $lang['add_subtask']                = 'Prida» podúlohu';
    $lang['add_project']                = 'Prida» projekt';
    $lang['clone_project']              = 'Kopírova» projekt';
    $lang['clone_task']                 = 'Kopírova» úlohu';
    $lang['quick_jump']                 = 'Prejs» na';
    $lang['no_edit']                    = 'Nie ste vlastník polo¾ky a preto ju nemô¾ete editova»';
    $lang['global']                     = 'Ostatní';
    $lang['delete_project']             = 'Zmaza» projekt';
    $lang['delete_task']                = 'Zmaza» úlohu';
    $lang['project_options']            = 'Voµby projektu';
    $lang['task_options']               = 'Voµby úlohy';
    $lang['javascript_archive_project'] = 'Projekt bude archivovaný ako %s.  Ste si istý?';
    $lang['archive_project']            = 'Archívny projekt';
    $lang['task_navigation']            = 'Navigácia úlohy';
    $lang['new_task']                   = 'Nová úloha';
    $lang['no_projects']                = '®iadný viditeµný projekt';
    $lang['show_all_projects']          = 'Ukáza» v¹etky projekty';
    $lang['show_active_projects']       = 'Ukáza» len aktívne projekty';
    $lang['project_hold_sprt']          = 'Projekt èaká od %s';
    $lang['project_planned']            = 'Plánovaný projekt';
    $lang['percent_sprt']               = '%d%% úlohy hotovo';
    $lang['project_no_deadline']        = 'Nie je nastavený hranièný termín tohto projektu';
    $lang['no_allowed_projects']        = 'Nie je Vám dovolené vidie» ¾iadný projekt';
    $lang['projects']                   = 'Projekty';
    $lang['percent_project_sprt']       = 'Tento projekt je na %d%% hotový';
    $lang['owned_by']                   = 'Vlastník je';
    $lang['created_on']                 = 'Vytvorený';
    $lang['completed_on']               = 'Kompletný';
    $lang['modified_on']                = 'Modifikovaný';
    $lang['project_on_hold']            = 'Projekt èaká';
    $lang['project_accessible']         = '(Tento projekt je verejne dostupný v¹etkým u¾ívateµom)';
    $lang['task_accessible']            = '(Táto úloha je verejne dostupná v¹etkým u¾ívateµom)';
    $lang['project_not_accessible']     = '(Tento projekt je dostupný len èlenom u¾ívateµskej skupiny)';
    $lang['task_not_accessible']        = '(Táto úloha je dostupná len èlenom u¾ívateµskej skupiny)';
    $lang['project_not_in_usergroup']   = 'Tento projekt nie je pridelený ¾iadnej u¾ivateµskej skupine a je dostupný v¹etkým u¾ívateµom.';
    $lang['task_not_in_usergroup']      = 'Táto úloha nie je pridelená ¾iadnej u¾ivateµskej skupine a je dostupná v¹etkým u¾ivateµom.';
    $lang['usergroup_can_edit_project'] = 'Tento projekt mô¾u editova» len èlenovia u¾ivateµskej skupiny.';
    $lang['usergroup_can_edit_task']    = 'Túto úlohu mô¾u editova» len èlenovia u¾ivateµskej skupiny.';
    $lang['i_take_it']                  = 'Prevezmem to :)';
    $lang['i_finished']                 = 'Skoèil som!';
    $lang['i_dont_want']                = 'Nechcem to viac';
    $lang['take_over_project']          = 'Prevzia» projekt';
    $lang['take_over_task']             = 'Prevzia» úlohu';
    $lang['task_info']                  = 'Informácie o úlohe';
    $lang['project_details']            = 'Detaily projektu';
    $lang['todo_list_for']              = 'Zoznam úloh pre: ';
    $lang['due_in_sprt']                = ' (V priebehu %d dní)';
    $lang['due_tomorrow']               = ' (Do zajtra)';
    $lang['no_assigned']                = 'Tento u¾ívateµ nemá nekompletné úlohy.';
    $lang['todo_list']                  = 'Zoznam úloh';
    $lang['summary_list']               = 'Zhrnutie';
    $lang['task_submit']                = 'Posla» úlohu';
    $lang['not_owner']                  = 'Prístup odoprený.Nie ste vlastník; alebo nemáte dostatoèné prístupové práva';
    $lang['missing_values']             = 'Nie je dos» vyplnených hodnôt v poli; prosím vrá»te sa a skúste znovu';
    $lang['future']                     = 'V budúcnosti';
    $lang['flags']                      = 'Znak';
    $lang['owner']                      = 'Vlastník';
    $lang['group']                      = 'U¾ivateµská skupina';
    $lang['by_usergroup']               = ' (podµa skupiny)';
    $lang['by_taskgroup']               = ' (podµa skupiny pre úlohu)';
    $lang['by_deadline']                = ' (podµa hranièného termínu)';
    $lang['by_status']                  = ' (podµa stavu)';
    $lang['by_owner']                   = ' (podµa vlastníka)';
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = 'Projekt, ktorý bude klonovaný :';
    $lang['task_cloned']                = 'Úloha, ktorá bude klonovaná :';
    $lang['note_clone']                 = 'Poznámka: Úloha bude klonovaná ako nový projekt';

//bits 'n' pieces
    $lang['calendar']                   = 'Kalendár';
    $lang['normal_version']             = 'Normálna verzia';
    $lang['print_version']              = 'Verzia pre tlaè';
    $lang['condensed_view']             = 'Zú¾ený pohµad';
    $lang['full_view']                  = 'Plný pohµad';
    $lang['icalendar']                  = "iKalendár";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>