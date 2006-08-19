<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created on Avgust 2006 by Sa¹o Stanojev
  
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

  Language files for 'si' (Sloven¹èina)

  Maintainer: Sa¹o Stanojev <sass99@gmail.com>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-2" );

//this is the regex for input validation filter used in common.php
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s"; //ISO-8859-x

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ned', 'Pon', 'Tor', 'Sre', 'Èet', 'Pet', 'Sob' );

//task states

 //priorities
    $task_state['dontdo']               = "Nepomembno";
    $task_state['low']                  = "Nizko";
    $task_state['normal']               = "Srednje";
    $task_state['high']                 = "Visoko";
    $task_state['yesterday']            = "Izjemno pomembno";
 //status
    $task_state['new']                  = "Novo";
    $task_state['planned']              = "Planiran (ni aktiven)";
    $task_state['active']               = "Aktiven (dela se na njem)";
    $task_state['cantcomplete']         = "Na èakanju";
    $task_state['completed']            = "Dokonèan";
    $task_state['done']                 = "Gotov";
    $task_state['task_planned']         = " Planiran";
    $task_state['task_active']          = " Aktiven";
 //project states
    $task_state['planned_project']      = "Planiran projekt (ni aktiven)";
    $task_state['no_deadline_project']  = "Brez konènega roka";
    $task_state['active_project']       = "Aktivni projekt";

//common items
    $lang['description']                = "Opis";
    $lang['name']                       = "Ime";
    $lang['add']                        = "Dodaj";
    $lang['update']                     = "Osve¾i";
    $lang['submit_changes']             = "Po¹lji spremembe";
    $lang['continue']                   = "Nadaljuj";
    $lang['manage']                     = "Upravljaj";
    $lang['edit']                       = "Uredi";
    $lang['delete']                     = "Izbri¹i";
    $lang['del']                        = "Izbri¹i";
    $lang['confirm_del_javascript']     = " Potrdite izbris!";
    $lang['yes']                        = "Da";
    $lang['no']                         = "Ne";
    $lang['action']                     = "Dejanje";
    $lang['task']                       = "Naloga";
    $lang['tasks']                      = "Naloge";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informacije";
    $lang['bytes']                      = " bajtov";
    $lang['select_instruct']            = "(Dr¾ite \"ctrl\" za veèkratni izbor ali za prazen izbor)";
    $lang['member_groups']              = "Uporabnik je èlan spodaj navedenih skupin (èe je sploh èlan kake skupine)";
    $lang['login']                      = "Uporabni¹ko ime";
    $lang['login_action']               = "Prijava";
    $lang['login_screen']               = "Prijava";
    $lang['error']                      = "Napaka";
    $lang['no_login']                   = "Prijava neuspe¹na. Vnesli ste napaèno uporabni¹ko ime ali geslo";
    $lang['redirect_sprt']              = "Sledi avtomatièna vrnitev nazaj na prijavni obrazec po %d sekundah";
    $lang['login_now']                  = "Kliknite tu za vrnitev na prijavni obrazec";
    $lang['please_login']               = "Prijava v sistem";
    $lang['go']                         = "Pojdi!";

//graphic items
    $lang['late_g']                     = "&nbsp;ZAMUDA&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;OSVE®ENO&nbsp;";

//admin config
    $lang['admin_config']               = "Skrbni¹ka urejanja";
    $lang['email_settings']             = "Urejanje glave e-pisma";
    $lang['admin_email']                = "E-po¹ta skrbnika";
    $lang['email_reply']                = "E-po¹ta za odgovor";
    $lang['email_from']                 = "E-po¹ta po¹iljatelja";
    $lang['mailing_list']               = "Elektronska dopisni seznam";
    $lang['default_checkbox']           = "Standardno urejanje projektov/nalog";
    $lang['allow_globalaccess']         = "Dovolite splo¹ni dostop?";
    $lang['allow_group_edit']           = "Dovolite vsem uporabnikom v uporabni¹ki skupini spreminjanje vsebine?";
    $lang['set_email_owner']            = "Vedno obvesti lastnika prek e-po¹te o narejenih spremembah?";
    $lang['set_email_group']            = "Vedno obvesti uporabni¹ko skupino prek e-po¹te o narejenih spremembah?";
    $lang['project_listing_order']      = "Prikazovanje projektov po kategoriji.";
    $lang['task_listing_order']         = "Prikazovanje nalog po kategoriji.";
    $lang['configuration']              = "Urejanje";

//archive
    $lang['archived_projects']          = "Arhivirani projekti";

//contacts
    $lang['firstname']                  = "Ime:";
    $lang['lastname']                   = "Priimek:";
    $lang['company']                    = "Podjetje:";
    $lang['home_phone']                 = "Hi¹ni telefon:";
    $lang['mobile']                     = "Mobilni telefon:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Telefon v slu¾bi:";
    $lang['address']                    = "Naslov:";
    $lang['postal']                     = "Po¹tna ¹tevilka:";
    $lang['city']                       = "Mesto:";
    $lang['email_contact']              = "E-po¹ta:";
    $lang['notes']                      = "Zapiski:";
    $lang['add_contact']                = "Dodaj stik";
    $lang['del_contact']                = "Izbri¹i stik";
    $lang['contact_info']               = "Informacije o stiku";
    $lang['contacts']                   = "Stiki";
    $lang['contact_add_info']           = "Èe dodate ime podjetja, bo prikazano namesto imena uporabnika.";
    $lang['show_contact']               = "Prika¾i stike";
    $lang['edit_contact']               = "Zamenjaj stike";
    $lang['contact_submit']             = "Po¹iljanje stika";
    $lang['contact_warn']               = "Za dodajanje stika ni dovolj podatkov. Vrnite se nazaj in dodajte vsaj ime in priimek.";

 //files
    $lang['manage_files']               = "Upravljanje datotek";
    $lang['no_files']                   = "Ni datotek za upravljanje";
    $lang['no_file_uploads']            = "Namestitev stre¾nika za to stran ne dovoljuje nalaganje datotek.";
    $lang['file']                       = "Datoteka:";
    $lang['uploader']                   = "Lastnik:";
    $lang['files_assoc_project']        = "Datoteke v zvezi z projektom";
    $lang['files_assoc_task']           = "Datoteke v zvezi z nalogo";
    $lang['file_admin']                 = "Skrbni¹tvo datotek";
    $lang['add_file']                   = "Dodaj datoteko";
    $lang['files']                      = "Datoteke";
    $lang['file_choose']                = "Datoteka, ki jo je potrebno dodati:";
    $lang['upload']                     = "Dodaj";
    $lang['file_email_owner']           = "Obvesti lastnika prek e-po¹te o novi datoteki?";
    $lang['file_email_usergroup']       = "Obvesti uporabni¹ko skupino prek e-po¹te o novi datoteki?";
    $lang['max_file_sprt']              = "datoteka mora biti manj¹a od %s kB.";
    $lang['file_submit']                = "Po¹iljanje datoteke";
    $lang['no_upload']                  = "Datoteka ni dodana. Vrnite se nazaj in poskusite ponovno.";
    $lang['file_too_big_sprt']          = "Najveèja velikost datoteke, ki jo dodajate je %s bajtov. Va¹a datoteka je prevelika, zato je izbrisana";
    $lang['del_file_javascript_sprt']   = "Ste sigurni, da ¾elite izbrisati datoteko %s ?";


 //forum
    $lang['orig_message']               = "Prvotno sporoèilo:";
    $lang['post']                       = "Odgovori!";
    $lang['message']                    = "Sporoèilo:";
    $lang['post_reply_sprt']            = "Odgovori na sporoèilo uporabnika '%1\$s' , ki je postavil temo '%2\$s'";
    $lang['post_message_sprt']          = "Odgovori na: '%s'";
    $lang['forum_email_owner']          = "Po¹lji e-po¹to z vsebino sporoèila lastniku?";
    $lang['forum_email_usergroup']      = "Po¹lji e-po¹to z vsebino sporoèila uporabni¹ki skupini?";
    $lang['reply']                      = "Odgovori";
    $lang['new_post']                   = "Nov vnos";
    $lang['public_user_forum']          = "Javni uporabni¹ki forum";
    $lang['private_forum_sprt']         = "Zasebni forum za uporabni¹ko skupino '%s'";
    $lang['forum_submit']               = "Odgovor na sporoèilo v forumu";
    $lang['no_message']                 = "Sporoèilo ni vne¹eno. Vrnite se nazaj in poskusite ponovno.";
    $lang['add_reply']                  = "Odgovori";
    $lang['last_post_sprt']             = "Zadnji vnos: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedavni vnosi v forum";
    $lang['forum_search']               = "Iskanje po forumu";
    $lang['no_results']                 = "Za iskani izraz '%s' ne najdem nobenega vnosa.";
    $lang['search_results']             = "Najdeno je %1\$s vnosov za iskani izraz '%2\$s'<br />Prikazujem vnose %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Poroèilo";
    $lang['warning']                    = "<h1>Oprostite!</h1><p>Trenutno ne moremo obdelati va¹e zahteve. Poskusite kasneje.</p>";
    $lang['home_page']                  = "Domaèa stran";
    $lang['summary_page']               = "Kratek pregled";
    $lang['log_out']                    = "Odjava";
    $lang['main_menu']                  = "Glavni meni";
    $lang['archive']                    = "Arhiv";
    $lang['user_homepage_sprt']         = "Dobrodo¹li, %s";
    $lang['missing_field_javascript']   = "Vnesite podatek v odgovarjajoèe neizpolnjeno polje";
    $lang['invalid_date_javascript']    = "Izberite pravilen datum.";
    $lang['finish_date_javascript']     = "Datum konèanja projekta se izteèe pred vne¹enim datumom!";
    $lang['security_manager']           = "Varnostni mehanizem";
    $lang['session_timeout_sprt']       = "Pristop je zavrnjen. Zadnje dejanje se je zgodilo pred %1\$d minutami, medtem, ko je èas seje %2\$d minut. Lahko se <a href=\"%3\$sindex.php\">ponovno prijavite.</a>.";
    $lang['access_denied']              = "Pristop je zavrnjen";
    $lang['private_usergroup_no_access']= "To podroèje pripada zasebni uporabni¹ki skupini, do katere nimate pravico dostopa.";
    $lang['invalid_date']               = "Nepravilen datum";
    $lang['invalid_date_sprt']          = "Datum %s ni pravilen (preverite ¹tevilo dni v mesecu).<br /> Vrnite se nazaj in vnesite pravilen datum.";


 //taskgroups
    $lang['taskgroup_name']             = "Ime skupine opravil:";
    $lang['taskgroup_description']      = "Kratek opis skupine opravil:";
    $lang['add_taskgroup']              = "Dodaj skupino opravil";
    $lang['add_new_taskgroup']          = "Dodajanje nove skupine opravil";
    $lang['edit_taskgroup']             = "Menjava skupine opravil";
    $lang['taskgroup_manage']           = "Upravljanje skupine opravil";
    $lang['no_taskgroups']              = "Nobena skupine opravil ni definirana";
    $lang['manage_taskgroups']          = "Upravljanje skupine opravil";
    $lang['taskgroups']                 = "Skupine opravil";
    $lang['taskgroup_dup_sprt']         = "Skupina opravil z imenom '%s' ¾e obstaja. Vrnite se nazaj in izberite novo ime.";
    $lang['info_taskgroup_manage']      = "Informacije o skupinah opravil";

 //usergroups
    $lang['usergroup_name']             = "Ime uporabni¹ke skupine:";
    $lang['usergroup_description']      = "Kratek opis uporabni¹ke skupine:";
    $lang['members']                    = "Èlani:";
    $lang['private_usergroup']          = "Zasebna uporabni¹ka skupina";
    $lang['add_usergroup']              = "Dodaj uporabni¹ko skupino";
    $lang['add_new_usergroup']          = "Dodajanje nove uporabni¹ke skupine";
    $lang['edit_usergroup']             = "Menjava uporabni¹ke skupine";
    $lang['usergroup_manage']           = "Upravljanje uporabni¹kih skupin";
    $lang['no_usergroups']              = "Trenutno ne obstaja nobena uporabni¹ka skupina";
    $lang['manage_usergroups']          = "Upravljanje uporabni¹kih skupin";
    $lang['usergroups']                 = "Uporabni¹ke skupine";
    $lang['usergroup_dup_sprt']         = "Uporabni¹ka skupina z imenom '%s' ¾e obstaja. Vrnite se nazaj in izberite novo ime.";
    $lang['info_usergroup_manage']      = "Informacije o upravljanju uporabni¹kih skupin";

 //users
    $lang['login_name']                 = "Uporabni¹ko ime";
    $lang['full_name']                  = "Polno ime";
    $lang['password']                   = "Geslo";
    $lang['blank_for_current_password'] = "(To polje pustite prazno, da bi trenutno geslo ostalo enako)";
    $lang['email']                      = "E-po¹ta";
    $lang['admin']                      = "Skrbnik";
    $lang['private_user']               = "Zasebni uporabni¹ki raèun";
    $lang['normal_user']                = "Normalni uporabni¹ki raèun";
    $lang['is_admin']                   = "Ali je skrbnik?";
    $lang['is_guest']                   = "Ali je gost?";
    $lang['guest']                      = "Uporabnik-gost";
    $lang['user_info']                  = "Informacije o uporabniku";
    $lang['deleted_users']              = "Izbrisane uporabni¹ke naloge";
    $lang['no_deleted_users']           = "Ni izbrisanih uporabni¹kih nalog.";
    $lang['revive']                     = "Povrni";
    $lang['permdel']                    = "Trajni izbris";
    $lang['permdel_javascript_sprt']    = "S tem boste trajno izbrisali vse uporabnikove podatke in naloge, vezane nanj. Si to res ¾elite?";
    $lang['add_user']                   = "Dodaj uporabni¹ki raèun";
    $lang['edit_user']                  = "Urejanje uporabni¹kih raèunov";
    $lang['no_users']                   = "Trenutno ne obstaja noben uporabni¹ki raèun";
    $lang['users']                      = "Uporabniki";
    $lang['existing_users']             = "Obstojeèi uporabniki";
    $lang['private_profile']            = "Ta uporabnik ima zasebni profil, ki ga ne morete pogledati.";
    $lang['private_usergroup_profile']  = "(Ta uporabnik je èlan zasebne uporabni¹ke skupine, do katere nimate dostopa.)";
    $lang['email_users']                = "Po¹lji e-po¹to uporabnikom";
    $lang['select_usergroup']           = "Izberite uporabni¹ko skupino:";
    $lang['subject']                    = "Tema:";
    $lang['message_sent_maillist']      = "V teh primerih se sporoèilo kopira tudi na e-po¹tni dopisni seznam.";
    $lang['who_online']                 = "Kdo je na strani?";
    $lang['edit_details']               = "Urejanje podatkov uporabnika";
    $lang['show_details']               = "Prika¾i podatke o uporabniku";
    $lang['user_deleted']               = "Uporabni¹ki raèun je izbrisan!";
    $lang['no_usergroup']               = "Uporabnik ni èlan nobene uporabni¹ke skupine";
    $lang['not_usergroup']              = "(Ni èlan nobene uporabni¹ke skupine)";
    $lang['no_password_change']         = "(Va¹e geslo ni zamenjano)";
    $lang['last_time_here']             = "Zadnjiè na strani:";
    $lang['number_items_created']       = "©tevilo kreiranih vnosov:";
    $lang['number_projects_owned']      = "©tevilo projektov v lasti:";
    $lang['number_tasks_owned']         = "©tevilo nalog v lasti:";
    $lang['number_tasks_completed']     = "©tevilo konèanih nalog:";
    $lang['number_forum']               = "©tevilo sporoèil na forumu:";
    $lang['number_files']               = "©tevilo nalo¾enih datotek:";
    $lang['size_all_files']             = "Skupna velikost datotek v lasti:";
    $lang['owned_tasks']                = "Naloge v lasti";
    $lang['invalid_email']              = "Netoèen naslov e-po¹te";
    $lang['invalid_email_given_sprt']   = "E-naslov '%s' je netoèen. Vrnite se nazaj in poskusite ponovno.";
    $lang['duplicate_user']             = "Uporabni¹ki raèun ¾e obstaja";
    $lang['duplicate_change_user_sprt'] = "Uporabni¹ki raèun '%s' ¾e obstaja. Vrnite se nazaj in spremenite uporabni¹ko ime.";
    $lang['value_missing']              = "Manjka podatek";
    $lang['field_sprt']                 = "Manjka podatek za polje '%s'. Vrnite se nazaj in ga izpolnite.";
    $lang['admin_priv']                 = "OBVESTILO: Dobili ste administratorske pravice.";
    $lang['manage_users']               = "Upravljanje uporabnikov";
    $lang['users_online']               = "Uporabniki na strani";
    $lang['online']                     = "Skoraj¹nji dostop (prisotni pred manj kot 60 minutami)";
    $lang['not_online']                 = "Ostali";
    $lang['user_activity']              = "Aktivnost uporabnika";

  //tasks
    $lang['add_new_task']               = "Dodajanje nove naloge";
    $lang['priority']                   = "Prioriteta";
    $lang['parent_task']                = "Nadrejena naloga";
    $lang['creation_time']              = "Ustvarjeno dne";
    $lang['by_sprt']                    = "%1\$s s strani uporabnika %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Naziv projekta";
    $lang['task_name']                  = "Naziv naloge";
    $lang['deadline']                   = "Konèni rok";
    $lang['taken_from_parent']          = "(prevzeto od nadrejene naloge)";
    $lang['status']                     = "Stanje";
    $lang['task_owner']                 = "Lastnik naloge";
    $lang['project_owner']              = "Lastnik projekta";
    $lang['taskgroup']                  = "Skupina opravil";
    $lang['usergroup']                  = "Uporabni¹ka skupina";
    $lang['nobody']                     = "Nihèe";
    $lang['none']                       = "Ni";
    $lang['no_group']                   = "Ni skupine";
    $lang['all_groups']                 = "Vse skupine";
    $lang['all_users']                  = "Vsi uporabniki";
    $lang['all_users_view']             = "Vsi uporabniki lahko vidijo ta vnos?";
    $lang['group_edit']                 = "Kdorkoli v skupini lahko zamenja vnos?";
    $lang['project_description']        = "Opis projekta";
    $lang['task_description']           = "Opis naloge";
    $lang['email_owner']                = "Obvesti z e-po¹to lastnika o spremembah?";
    $lang['email_new_owner']            = "Obvesti z e-po¹to novega lastnika o spremembah?";
    $lang['email_group']                = "Obvesti z e-po¹to uporabni¹ko skupino o spremembah?";
    $lang['add_new_project']            = "Dodaj nov projekt";
    $lang['uncategorised']              = "Nekategoriziran";
    $lang['due_sprt']                   = "%d dni od danes";
    $lang['tomorrow']                   = "Jutri";
    $lang['due_today']                  = "Za danes";
    $lang['overdue_1']                  = "1 dan prekoraèitve";
    $lang['overdue_sprt']               = "%d dni prekoraèitve";
    $lang['edit_task']                  = "Zamenjava naloge";
    $lang['edit_project']               = "Zamenjava projekta";
    $lang['no_reparent']                = "Ne obstaja (projekt vi¹jega nivoja)";
    $lang['del_javascript_project_sprt']= "Izbrisali boste projekt %s. Ste sigurni, da to ¾elite??";
    $lang['del_javascript_task_sprt']   = "Izbrisali boste nalogo %s. Ste sigurni, da to ¾elite?";
    $lang['add_task']                   = "Dodaj nalogo";
    $lang['add_subtask']                = "Dodaj podnalogo";
    $lang['add_project']                = "Dodaj projekt";
    $lang['clone_project']              = "Podvoji projekt";
    $lang['clone_task']                 = "Podvoji nalogo";
    $lang['quick_jump']                 = "Hitri skok";
    $lang['no_edit']                    = "Niste lastnik tega vnosa, zato ga ne morete zamenjati.";
    $lang['global']                     = "Splo¹ni ukazi";
    $lang['delete_project']             = "Izbri¹i projekt";
    $lang['delete_task']                = "Izbri¹i nalogo";
    $lang['project_options']            = "Upravljanje projektov";
    $lang['task_options']               = "Nastavitve naloge";
    $lang['javascript_archive_project'] = "Na ta naèin boste arhivirali projekt %s. Ste sigurni, da to ¾elite?";
    $lang['archive_project']            = "Arhiviraj projekt";
    $lang['task_navigation']            = "Polo¾aj naloge";
    $lang['new_task']                   = "Nova naloga";
    $lang['no_projects']                = "Trenutno ne obstaja noben projekt";
    $lang['show_all_projects']          = "Prika¾i vse projekte";
    $lang['show_active_projects']       = "Prika¾i samo aktivne projekte";
    $lang['project_hold_sprt']          = "Projekt je na èakanju od dne %s";
    $lang['project_planned']            = "Planiran projekt";
    $lang['percent_sprt']               = "%d%% nalog je konèanih";
    $lang['project_no_deadline']        = "Za ta projekt ne obstaja konèni rok.";
    $lang['no_allowed_projects']        = "Nobenega projekta ne morete pogledati.";
    $lang['projects']                   = "Projekti";
    $lang['percent_project_sprt']       = "Projekt je konèan %d%%";
    $lang['owned_by']                   = "Lastnik";
    $lang['created_on']                 = "Ustvarjen dne";
    $lang['completed_on']               = "Konèan dne";
    $lang['modified_on']                = "Zamenjan dne";
    $lang['project_on_hold']            = "Projekt je na èakanju";
    $lang['project_accessible']         = "(Ta projekt je javno dostopen vsem uporabnikom.)";
    $lang['task_accessible']            = "(Ta naloga je javno dostopna vsem uporabnikom.)";
    $lang['project_not_accessible']     = "(Tem projektu lahko pristopijo samo èlani doloèene uporabni¹ke skupine.)";
    $lang['task_not_accessible']        = "(Tej nalogi lahko pristopijo samo èlani doloèene uporabni¹ke skupine.)";
    $lang['project_not_in_usergroup']   = "Ta projekt ne pripada nobeni uporabni¹ki skupini, zato lahko k njemu pristopajo vsi.";
    $lang['task_not_in_usergroup']      = "Ta naloga ne pripada nobeni uporabni¹ki skupini, zato lahko k njej pristopajo vsi.";
    $lang['usergroup_can_edit_project'] = "Ta projekt lahko popravljajo èlani doloèene uporabni¹ke skupine.";
    $lang['usergroup_can_edit_task']    = "To nalogo lahko popravljajo èlani doloèene uporabni¹ke skupine.";
    $lang['i_take_it']                  = "Prevzel ga bom";
    $lang['i_finished']                 = "Konèal sem ga!";
    $lang['i_dont_want']                = "Ne ¾elim ga veè";
    $lang['take_over_project']          = "Prevzemi projekt";
    $lang['take_over_task']             = "Prevzemi nalogo";
    $lang['task_info']                  = "Informacije o nalogi";
    $lang['project_details']            = "Podrobnosti projekta";
    $lang['todo_list_for']              = "Obveznosti za: ";
    $lang['due_in_sprt']                = " (konèati v roku %d dni)";
    $lang['due_tomorrow']               = " (konèati do jutri)";
    $lang['no_assigned']                = "Ta uporabnik nima nedokonèanih nalog.";
    $lang['todo_list']                  = "Obveznosti";
    $lang['summary_list']               = "Kratek pregled";
    $lang['task_submit']                = "Po¹iljanje naloge";
    $lang['not_owner']                  = "Dostop je onemogoèen. Razlog je v tem, da niste lastnik ali pa nimate ustrezne pravice za dostopanje.";
    $lang['missing_values']             = "Niste vnesli dovolj podatkov. Vrnite se nazaj in poskusite ponovno.";
    $lang['future']                     = "V prihodnosti";
    $lang['flags']                      = "Zastavica";
    $lang['owner']                      = "Lastnik";
    $lang['group']                      = "Skupina";
    $lang['by_usergroup']               = " (po uporabni¹ki skupini)";
    $lang['by_taskgroup']               = " (po skupinah opravil)";
    $lang['by_deadline']                = " (po konènem roku)";
    $lang['by_status']                  = " (po stanju)";
    $lang['by_owner']                   = " (po lastniku)";
    $lang['project_cloned']             = "Projekt, ki ga je potrebno podvojiti:";
    $lang['task_cloned']                = "Naloga, ki jo je potrebno podvojiti:";
    $lang['note_clone']                 = "Opomba: Naloga bo podvojena kot nov projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Koledar";
    $lang['normal_version']             = "Normalna verzija";
    $lang['print_version']              = "Verzija za tiskanje";
    $lang['condensed_view']             = "Skrèen prikaz";
    $lang['full_view']                  = "Poln prikaz";
    $lang['icalendar']                  = "\"iKoledar\" datoteka";
?>