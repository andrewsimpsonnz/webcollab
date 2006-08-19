<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created on Avgust 2006 by Sa�o Stanojev
  
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

  Language files for 'si' (Sloven��ina)

  Maintainer: Sa�o Stanojev <sass99@gmail.com>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-2" );

//this is the regex for input validation filter used in common.php
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s"; //ISO-8859-x

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ned', 'Pon', 'Tor', 'Sre', '�et', 'Pet', 'Sob' );

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
    $task_state['cantcomplete']         = "Na �akanju";
    $task_state['completed']            = "Dokon�an";
    $task_state['done']                 = "Gotov";
    $task_state['task_planned']         = " Planiran";
    $task_state['task_active']          = " Aktiven";
 //project states
    $task_state['planned_project']      = "Planiran projekt (ni aktiven)";
    $task_state['no_deadline_project']  = "Brez kon�nega roka";
    $task_state['active_project']       = "Aktivni projekt";

//common items
    $lang['description']                = "Opis";
    $lang['name']                       = "Ime";
    $lang['add']                        = "Dodaj";
    $lang['update']                     = "Osve�i";
    $lang['submit_changes']             = "Po�lji spremembe";
    $lang['continue']                   = "Nadaljuj";
    $lang['manage']                     = "Upravljaj";
    $lang['edit']                       = "Uredi";
    $lang['delete']                     = "Izbri�i";
    $lang['del']                        = "Izbri�i";
    $lang['confirm_del_javascript']     = " Potrdite izbris!";
    $lang['yes']                        = "Da";
    $lang['no']                         = "Ne";
    $lang['action']                     = "Dejanje";
    $lang['task']                       = "Naloga";
    $lang['tasks']                      = "Naloge";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informacije";
    $lang['bytes']                      = " bajtov";
    $lang['select_instruct']            = "(Dr�ite \"ctrl\" za ve�kratni izbor ali za prazen izbor)";
    $lang['member_groups']              = "Uporabnik je �lan spodaj navedenih skupin (�e je sploh �lan kake skupine)";
    $lang['login']                      = "Uporabni�ko ime";
    $lang['login_action']               = "Prijava";
    $lang['login_screen']               = "Prijava";
    $lang['error']                      = "Napaka";
    $lang['no_login']                   = "Prijava neuspe�na. Vnesli ste napa�no uporabni�ko ime ali geslo";
    $lang['redirect_sprt']              = "Sledi avtomati�na vrnitev nazaj na prijavni obrazec po %d sekundah";
    $lang['login_now']                  = "Kliknite tu za vrnitev na prijavni obrazec";
    $lang['please_login']               = "Prijava v sistem";
    $lang['go']                         = "Pojdi!";

//graphic items
    $lang['late_g']                     = "&nbsp;ZAMUDA&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;OSVE�ENO&nbsp;";

//admin config
    $lang['admin_config']               = "Skrbni�ka urejanja";
    $lang['email_settings']             = "Urejanje glave e-pisma";
    $lang['admin_email']                = "E-po�ta skrbnika";
    $lang['email_reply']                = "E-po�ta za odgovor";
    $lang['email_from']                 = "E-po�ta po�iljatelja";
    $lang['mailing_list']               = "Elektronska dopisni seznam";
    $lang['default_checkbox']           = "Standardno urejanje projektov/nalog";
    $lang['allow_globalaccess']         = "Dovolite splo�ni dostop?";
    $lang['allow_group_edit']           = "Dovolite vsem uporabnikom v uporabni�ki skupini spreminjanje vsebine?";
    $lang['set_email_owner']            = "Vedno obvesti lastnika prek e-po�te o narejenih spremembah?";
    $lang['set_email_group']            = "Vedno obvesti uporabni�ko skupino prek e-po�te o narejenih spremembah?";
    $lang['project_listing_order']      = "Prikazovanje projektov po kategoriji.";
    $lang['task_listing_order']         = "Prikazovanje nalog po kategoriji.";
    $lang['configuration']              = "Urejanje";

//archive
    $lang['archived_projects']          = "Arhivirani projekti";

//contacts
    $lang['firstname']                  = "Ime:";
    $lang['lastname']                   = "Priimek:";
    $lang['company']                    = "Podjetje:";
    $lang['home_phone']                 = "Hi�ni telefon:";
    $lang['mobile']                     = "Mobilni telefon:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Telefon v slu�bi:";
    $lang['address']                    = "Naslov:";
    $lang['postal']                     = "Po�tna �tevilka:";
    $lang['city']                       = "Mesto:";
    $lang['email_contact']              = "E-po�ta:";
    $lang['notes']                      = "Zapiski:";
    $lang['add_contact']                = "Dodaj stik";
    $lang['del_contact']                = "Izbri�i stik";
    $lang['contact_info']               = "Informacije o stiku";
    $lang['contacts']                   = "Stiki";
    $lang['contact_add_info']           = "�e dodate ime podjetja, bo prikazano namesto imena uporabnika.";
    $lang['show_contact']               = "Prika�i stike";
    $lang['edit_contact']               = "Zamenjaj stike";
    $lang['contact_submit']             = "Po�iljanje stika";
    $lang['contact_warn']               = "Za dodajanje stika ni dovolj podatkov. Vrnite se nazaj in dodajte vsaj ime in priimek.";

 //files
    $lang['manage_files']               = "Upravljanje datotek";
    $lang['no_files']                   = "Ni datotek za upravljanje";
    $lang['no_file_uploads']            = "Namestitev stre�nika za to stran ne dovoljuje nalaganje datotek.";
    $lang['file']                       = "Datoteka:";
    $lang['uploader']                   = "Lastnik:";
    $lang['files_assoc_project']        = "Datoteke v zvezi z projektom";
    $lang['files_assoc_task']           = "Datoteke v zvezi z nalogo";
    $lang['file_admin']                 = "Skrbni�tvo datotek";
    $lang['add_file']                   = "Dodaj datoteko";
    $lang['files']                      = "Datoteke";
    $lang['file_choose']                = "Datoteka, ki jo je potrebno dodati:";
    $lang['upload']                     = "Dodaj";
    $lang['file_email_owner']           = "Obvesti lastnika prek e-po�te o novi datoteki?";
    $lang['file_email_usergroup']       = "Obvesti uporabni�ko skupino prek e-po�te o novi datoteki?";
    $lang['max_file_sprt']              = "datoteka mora biti manj�a od %s kB.";
    $lang['file_submit']                = "Po�iljanje datoteke";
    $lang['no_upload']                  = "Datoteka ni dodana. Vrnite se nazaj in poskusite ponovno.";
    $lang['file_too_big_sprt']          = "Najve�ja velikost datoteke, ki jo dodajate je %s bajtov. Va�a datoteka je prevelika, zato je izbrisana";
    $lang['del_file_javascript_sprt']   = "Ste sigurni, da �elite izbrisati datoteko %s ?";


 //forum
    $lang['orig_message']               = "Prvotno sporo�ilo:";
    $lang['post']                       = "Odgovori!";
    $lang['message']                    = "Sporo�ilo:";
    $lang['post_reply_sprt']            = "Odgovori na sporo�ilo uporabnika '%1\$s' , ki je postavil temo '%2\$s'";
    $lang['post_message_sprt']          = "Odgovori na: '%s'";
    $lang['forum_email_owner']          = "Po�lji e-po�to z vsebino sporo�ila lastniku?";
    $lang['forum_email_usergroup']      = "Po�lji e-po�to z vsebino sporo�ila uporabni�ki skupini?";
    $lang['reply']                      = "Odgovori";
    $lang['new_post']                   = "Nov vnos";
    $lang['public_user_forum']          = "Javni uporabni�ki forum";
    $lang['private_forum_sprt']         = "Zasebni forum za uporabni�ko skupino '%s'";
    $lang['forum_submit']               = "Odgovor na sporo�ilo v forumu";
    $lang['no_message']                 = "Sporo�ilo ni vne�eno. Vrnite se nazaj in poskusite ponovno.";
    $lang['add_reply']                  = "Odgovori";
    $lang['last_post_sprt']             = "Zadnji vnos: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedavni vnosi v forum";
    $lang['forum_search']               = "Iskanje po forumu";
    $lang['no_results']                 = "Za iskani izraz '%s' ne najdem nobenega vnosa.";
    $lang['search_results']             = "Najdeno je %1\$s vnosov za iskani izraz '%2\$s'<br />Prikazujem vnose %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Poro�ilo";
    $lang['warning']                    = "<h1>Oprostite!</h1><p>Trenutno ne moremo obdelati va�e zahteve. Poskusite kasneje.</p>";
    $lang['home_page']                  = "Doma�a stran";
    $lang['summary_page']               = "Kratek pregled";
    $lang['log_out']                    = "Odjava";
    $lang['main_menu']                  = "Glavni meni";
    $lang['archive']                    = "Arhiv";
    $lang['user_homepage_sprt']         = "Dobrodo�li, %s";
    $lang['missing_field_javascript']   = "Vnesite podatek v odgovarjajo�e neizpolnjeno polje";
    $lang['invalid_date_javascript']    = "Izberite pravilen datum.";
    $lang['finish_date_javascript']     = "Datum kon�anja projekta se izte�e pred vne�enim datumom!";
    $lang['security_manager']           = "Varnostni mehanizem";
    $lang['session_timeout_sprt']       = "Pristop je zavrnjen. Zadnje dejanje se je zgodilo pred %1\$d minutami, medtem, ko je �as seje %2\$d minut. Lahko se <a href=\"%3\$sindex.php\">ponovno prijavite.</a>.";
    $lang['access_denied']              = "Pristop je zavrnjen";
    $lang['private_usergroup_no_access']= "To podro�je pripada zasebni uporabni�ki skupini, do katere nimate pravico dostopa.";
    $lang['invalid_date']               = "Nepravilen datum";
    $lang['invalid_date_sprt']          = "Datum %s ni pravilen (preverite �tevilo dni v mesecu).<br /> Vrnite se nazaj in vnesite pravilen datum.";


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
    $lang['taskgroup_dup_sprt']         = "Skupina opravil z imenom '%s' �e obstaja. Vrnite se nazaj in izberite novo ime.";
    $lang['info_taskgroup_manage']      = "Informacije o skupinah opravil";

 //usergroups
    $lang['usergroup_name']             = "Ime uporabni�ke skupine:";
    $lang['usergroup_description']      = "Kratek opis uporabni�ke skupine:";
    $lang['members']                    = "�lani:";
    $lang['private_usergroup']          = "Zasebna uporabni�ka skupina";
    $lang['add_usergroup']              = "Dodaj uporabni�ko skupino";
    $lang['add_new_usergroup']          = "Dodajanje nove uporabni�ke skupine";
    $lang['edit_usergroup']             = "Menjava uporabni�ke skupine";
    $lang['usergroup_manage']           = "Upravljanje uporabni�kih skupin";
    $lang['no_usergroups']              = "Trenutno ne obstaja nobena uporabni�ka skupina";
    $lang['manage_usergroups']          = "Upravljanje uporabni�kih skupin";
    $lang['usergroups']                 = "Uporabni�ke skupine";
    $lang['usergroup_dup_sprt']         = "Uporabni�ka skupina z imenom '%s' �e obstaja. Vrnite se nazaj in izberite novo ime.";
    $lang['info_usergroup_manage']      = "Informacije o upravljanju uporabni�kih skupin";

 //users
    $lang['login_name']                 = "Uporabni�ko ime";
    $lang['full_name']                  = "Polno ime";
    $lang['password']                   = "Geslo";
    $lang['blank_for_current_password'] = "(To polje pustite prazno, da bi trenutno geslo ostalo enako)";
    $lang['email']                      = "E-po�ta";
    $lang['admin']                      = "Skrbnik";
    $lang['private_user']               = "Zasebni uporabni�ki ra�un";
    $lang['normal_user']                = "Normalni uporabni�ki ra�un";
    $lang['is_admin']                   = "Ali je skrbnik?";
    $lang['is_guest']                   = "Ali je gost?";
    $lang['guest']                      = "Uporabnik-gost";
    $lang['user_info']                  = "Informacije o uporabniku";
    $lang['deleted_users']              = "Izbrisane uporabni�ke naloge";
    $lang['no_deleted_users']           = "Ni izbrisanih uporabni�kih nalog.";
    $lang['revive']                     = "Povrni";
    $lang['permdel']                    = "Trajni izbris";
    $lang['permdel_javascript_sprt']    = "S tem boste trajno izbrisali vse uporabnikove podatke in naloge, vezane nanj. Si to res �elite?";
    $lang['add_user']                   = "Dodaj uporabni�ki ra�un";
    $lang['edit_user']                  = "Urejanje uporabni�kih ra�unov";
    $lang['no_users']                   = "Trenutno ne obstaja noben uporabni�ki ra�un";
    $lang['users']                      = "Uporabniki";
    $lang['existing_users']             = "Obstoje�i uporabniki";
    $lang['private_profile']            = "Ta uporabnik ima zasebni profil, ki ga ne morete pogledati.";
    $lang['private_usergroup_profile']  = "(Ta uporabnik je �lan zasebne uporabni�ke skupine, do katere nimate dostopa.)";
    $lang['email_users']                = "Po�lji e-po�to uporabnikom";
    $lang['select_usergroup']           = "Izberite uporabni�ko skupino:";
    $lang['subject']                    = "Tema:";
    $lang['message_sent_maillist']      = "V teh primerih se sporo�ilo kopira tudi na e-po�tni dopisni seznam.";
    $lang['who_online']                 = "Kdo je na strani?";
    $lang['edit_details']               = "Urejanje podatkov uporabnika";
    $lang['show_details']               = "Prika�i podatke o uporabniku";
    $lang['user_deleted']               = "Uporabni�ki ra�un je izbrisan!";
    $lang['no_usergroup']               = "Uporabnik ni �lan nobene uporabni�ke skupine";
    $lang['not_usergroup']              = "(Ni �lan nobene uporabni�ke skupine)";
    $lang['no_password_change']         = "(Va�e geslo ni zamenjano)";
    $lang['last_time_here']             = "Zadnji� na strani:";
    $lang['number_items_created']       = "�tevilo kreiranih vnosov:";
    $lang['number_projects_owned']      = "�tevilo projektov v lasti:";
    $lang['number_tasks_owned']         = "�tevilo nalog v lasti:";
    $lang['number_tasks_completed']     = "�tevilo kon�anih nalog:";
    $lang['number_forum']               = "�tevilo sporo�il na forumu:";
    $lang['number_files']               = "�tevilo nalo�enih datotek:";
    $lang['size_all_files']             = "Skupna velikost datotek v lasti:";
    $lang['owned_tasks']                = "Naloge v lasti";
    $lang['invalid_email']              = "Neto�en naslov e-po�te";
    $lang['invalid_email_given_sprt']   = "E-naslov '%s' je neto�en. Vrnite se nazaj in poskusite ponovno.";
    $lang['duplicate_user']             = "Uporabni�ki ra�un �e obstaja";
    $lang['duplicate_change_user_sprt'] = "Uporabni�ki ra�un '%s' �e obstaja. Vrnite se nazaj in spremenite uporabni�ko ime.";
    $lang['value_missing']              = "Manjka podatek";
    $lang['field_sprt']                 = "Manjka podatek za polje '%s'. Vrnite se nazaj in ga izpolnite.";
    $lang['admin_priv']                 = "OBVESTILO: Dobili ste administratorske pravice.";
    $lang['manage_users']               = "Upravljanje uporabnikov";
    $lang['users_online']               = "Uporabniki na strani";
    $lang['online']                     = "Skoraj�nji dostop (prisotni pred manj kot 60 minutami)";
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
    $lang['deadline']                   = "Kon�ni rok";
    $lang['taken_from_parent']          = "(prevzeto od nadrejene naloge)";
    $lang['status']                     = "Stanje";
    $lang['task_owner']                 = "Lastnik naloge";
    $lang['project_owner']              = "Lastnik projekta";
    $lang['taskgroup']                  = "Skupina opravil";
    $lang['usergroup']                  = "Uporabni�ka skupina";
    $lang['nobody']                     = "Nih�e";
    $lang['none']                       = "Ni";
    $lang['no_group']                   = "Ni skupine";
    $lang['all_groups']                 = "Vse skupine";
    $lang['all_users']                  = "Vsi uporabniki";
    $lang['all_users_view']             = "Vsi uporabniki lahko vidijo ta vnos?";
    $lang['group_edit']                 = "Kdorkoli v skupini lahko zamenja vnos?";
    $lang['project_description']        = "Opis projekta";
    $lang['task_description']           = "Opis naloge";
    $lang['email_owner']                = "Obvesti z e-po�to lastnika o spremembah?";
    $lang['email_new_owner']            = "Obvesti z e-po�to novega lastnika o spremembah?";
    $lang['email_group']                = "Obvesti z e-po�to uporabni�ko skupino o spremembah?";
    $lang['add_new_project']            = "Dodaj nov projekt";
    $lang['uncategorised']              = "Nekategoriziran";
    $lang['due_sprt']                   = "%d dni od danes";
    $lang['tomorrow']                   = "Jutri";
    $lang['due_today']                  = "Za danes";
    $lang['overdue_1']                  = "1 dan prekora�itve";
    $lang['overdue_sprt']               = "%d dni prekora�itve";
    $lang['edit_task']                  = "Zamenjava naloge";
    $lang['edit_project']               = "Zamenjava projekta";
    $lang['no_reparent']                = "Ne obstaja (projekt vi�jega nivoja)";
    $lang['del_javascript_project_sprt']= "Izbrisali boste projekt %s. Ste sigurni, da to �elite??";
    $lang['del_javascript_task_sprt']   = "Izbrisali boste nalogo %s. Ste sigurni, da to �elite?";
    $lang['add_task']                   = "Dodaj nalogo";
    $lang['add_subtask']                = "Dodaj podnalogo";
    $lang['add_project']                = "Dodaj projekt";
    $lang['clone_project']              = "Podvoji projekt";
    $lang['clone_task']                 = "Podvoji nalogo";
    $lang['quick_jump']                 = "Hitri skok";
    $lang['no_edit']                    = "Niste lastnik tega vnosa, zato ga ne morete zamenjati.";
    $lang['global']                     = "Splo�ni ukazi";
    $lang['delete_project']             = "Izbri�i projekt";
    $lang['delete_task']                = "Izbri�i nalogo";
    $lang['project_options']            = "Upravljanje projektov";
    $lang['task_options']               = "Nastavitve naloge";
    $lang['javascript_archive_project'] = "Na ta na�in boste arhivirali projekt %s. Ste sigurni, da to �elite?";
    $lang['archive_project']            = "Arhiviraj projekt";
    $lang['task_navigation']            = "Polo�aj naloge";
    $lang['new_task']                   = "Nova naloga";
    $lang['no_projects']                = "Trenutno ne obstaja noben projekt";
    $lang['show_all_projects']          = "Prika�i vse projekte";
    $lang['show_active_projects']       = "Prika�i samo aktivne projekte";
    $lang['project_hold_sprt']          = "Projekt je na �akanju od dne %s";
    $lang['project_planned']            = "Planiran projekt";
    $lang['percent_sprt']               = "%d%% nalog je kon�anih";
    $lang['project_no_deadline']        = "Za ta projekt ne obstaja kon�ni rok.";
    $lang['no_allowed_projects']        = "Nobenega projekta ne morete pogledati.";
    $lang['projects']                   = "Projekti";
    $lang['percent_project_sprt']       = "Projekt je kon�an %d%%";
    $lang['owned_by']                   = "Lastnik";
    $lang['created_on']                 = "Ustvarjen dne";
    $lang['completed_on']               = "Kon�an dne";
    $lang['modified_on']                = "Zamenjan dne";
    $lang['project_on_hold']            = "Projekt je na �akanju";
    $lang['project_accessible']         = "(Ta projekt je javno dostopen vsem uporabnikom.)";
    $lang['task_accessible']            = "(Ta naloga je javno dostopna vsem uporabnikom.)";
    $lang['project_not_accessible']     = "(Tem projektu lahko pristopijo samo �lani dolo�ene uporabni�ke skupine.)";
    $lang['task_not_accessible']        = "(Tej nalogi lahko pristopijo samo �lani dolo�ene uporabni�ke skupine.)";
    $lang['project_not_in_usergroup']   = "Ta projekt ne pripada nobeni uporabni�ki skupini, zato lahko k njemu pristopajo vsi.";
    $lang['task_not_in_usergroup']      = "Ta naloga ne pripada nobeni uporabni�ki skupini, zato lahko k njej pristopajo vsi.";
    $lang['usergroup_can_edit_project'] = "Ta projekt lahko popravljajo �lani dolo�ene uporabni�ke skupine.";
    $lang['usergroup_can_edit_task']    = "To nalogo lahko popravljajo �lani dolo�ene uporabni�ke skupine.";
    $lang['i_take_it']                  = "Prevzel ga bom";
    $lang['i_finished']                 = "Kon�al sem ga!";
    $lang['i_dont_want']                = "Ne �elim ga ve�";
    $lang['take_over_project']          = "Prevzemi projekt";
    $lang['take_over_task']             = "Prevzemi nalogo";
    $lang['task_info']                  = "Informacije o nalogi";
    $lang['project_details']            = "Podrobnosti projekta";
    $lang['todo_list_for']              = "Obveznosti za: ";
    $lang['due_in_sprt']                = " (kon�ati v roku %d dni)";
    $lang['due_tomorrow']               = " (kon�ati do jutri)";
    $lang['no_assigned']                = "Ta uporabnik nima nedokon�anih nalog.";
    $lang['todo_list']                  = "Obveznosti";
    $lang['summary_list']               = "Kratek pregled";
    $lang['task_submit']                = "Po�iljanje naloge";
    $lang['not_owner']                  = "Dostop je onemogo�en. Razlog je v tem, da niste lastnik ali pa nimate ustrezne pravice za dostopanje.";
    $lang['missing_values']             = "Niste vnesli dovolj podatkov. Vrnite se nazaj in poskusite ponovno.";
    $lang['future']                     = "V prihodnosti";
    $lang['flags']                      = "Zastavica";
    $lang['owner']                      = "Lastnik";
    $lang['group']                      = "Skupina";
    $lang['by_usergroup']               = " (po uporabni�ki skupini)";
    $lang['by_taskgroup']               = " (po skupinah opravil)";
    $lang['by_deadline']                = " (po kon�nem roku)";
    $lang['by_status']                  = " (po stanju)";
    $lang['by_owner']                   = " (po lastniku)";
    $lang['project_cloned']             = "Projekt, ki ga je potrebno podvojiti:";
    $lang['task_cloned']                = "Naloga, ki jo je potrebno podvojiti:";
    $lang['note_clone']                 = "Opomba: Naloga bo podvojena kot nov projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Koledar";
    $lang['normal_version']             = "Normalna verzija";
    $lang['print_version']              = "Verzija za tiskanje";
    $lang['condensed_view']             = "Skr�en prikaz";
    $lang['full_view']                  = "Poln prikaz";
    $lang['icalendar']                  = "\"iKoledar\" datoteka";
?>