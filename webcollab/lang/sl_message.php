<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created on Avgust 2006 by Sašo Stanojev
  
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

  Language files for 'sl' (Slovenščina)

  Maintainer: Sašo Stanojev <sass99@gmail.com>

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', "UTF-8" );
define('XML_LANG', "sl" );

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ned', 'Pon', 'Tor', 'Sre', 'Čet', 'Pet', 'Sob' );

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
    $task_state['cantcomplete']         = "Na čakanju";
    $task_state['completed']            = "Dokončan";
    $task_state['done']                 = "Gotov";
    $task_state['task_planned']         = " Planiran";
    $task_state['task_active']          = " Aktiven";
 //project states
    $task_state['planned_project']      = "Planiran projekt (ni aktiven)";
    $task_state['no_deadline_project']  = "Brez končnega roka";
    $task_state['active_project']       = "Aktivni projekt";

//common items
    $lang['description']                = "Opis";
    $lang['name']                       = "Ime";
    $lang['add']                        = "Dodaj";
    $lang['update']                     = "Osveži";
    $lang['submit_changes']             = "Pošlji spremembe";
    $lang['continue']                   = "Nadaljuj";
    $lang['manage']                     = "Upravljaj";
    $lang['edit']                       = "Uredi";
    $lang['delete']                     = "Izbriši";
    $lang['del']                        = "Izbriši";
    $lang['confirm_del_javascript']     = " Potrdite izbris!";
    $lang['yes']                        = "Da";
    $lang['no']                         = "Ne";
    $lang['action']                     = "Dejanje";
    $lang['task']                       = "Naloga";
    $lang['tasks']                      = "Naloge";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informacije";
    $lang['bytes']                      = " bajtov";
    $lang['select_instruct']            = "(Držite \"ctrl\" za večkratni izbor ali za prazen izbor)";
    $lang['member_groups']              = "Uporabnik je član spodaj navedenih skupin (če je sploh član kake skupine)";
    $lang['login']                      = "Uporabniško ime";
    $lang['login_action']               = "Prijava";
    $lang['login_screen']               = "Prijava";
    $lang['error']                      = "Napaka";
    $lang['no_login']                   = "Prijava neuspešna. Vnesli ste napačno uporabniško ime ali geslo";
    $lang['redirect_sprt']              = "Sledi avtomatična vrnitev nazaj na prijavni obrazec po %d sekundah";
    $lang['login_now']                  = "Kliknite tu za vrnitev na prijavni obrazec";
    $lang['please_login']               = "Prijava v sistem";
    $lang['go']                         = "Pojdi!";

//graphic items
    $lang['late_g']                     = "&nbsp;ZAMUDA&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;OSVEŽENO&nbsp;";

//admin config
    $lang['admin_config']               = "Skrbniška urejanja";
    $lang['email_settings']             = "Urejanje glave e-pisma";
    $lang['admin_email']                = "E-pošta skrbnika";
    $lang['email_reply']                = "E-pošta za odgovor";
    $lang['email_from']                 = "E-pošta pošiljatelja";
    $lang['mailing_list']               = "Elektronska dopisni seznam";
    $lang['default_checkbox']           = "Standardno urejanje projektov/nalog";
    $lang['allow_globalaccess']         = "Dovolite splošni dostop?";
    $lang['allow_group_edit']           = "Dovolite vsem uporabnikom v uporabniški skupini spreminjanje vsebine?";
    $lang['set_email_owner']            = "Vedno obvesti lastnika prek e-pošte o narejenih spremembah?";
    $lang['set_email_group']            = "Vedno obvesti uporabniško skupino prek e-pošte o narejenih spremembah?";
    $lang['project_listing_order']      = "Prikazovanje projektov po kategoriji.";
    $lang['task_listing_order']         = "Prikazovanje nalog po kategoriji.";
    $lang['configuration']              = "Urejanje";

//archive
    $lang['archived_projects']          = "Arhivirani projekti";

//contacts
    $lang['firstname']                  = "Ime:";
    $lang['lastname']                   = "Priimek:";
    $lang['company']                    = "Podjetje:";
    $lang['home_phone']                 = "Hišni telefon:";
    $lang['mobile']                     = "Mobilni telefon:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Telefon v službi:";
    $lang['address']                    = "Naslov:";
    $lang['postal']                     = "Poštna številka:";
    $lang['city']                       = "Mesto:";
    $lang['email_contact']              = "E-pošta:";
    $lang['notes']                      = "Zapiski:";
    $lang['add_contact']                = "Dodaj stik";
    $lang['del_contact']                = "Izbriši stik";
    $lang['contact_info']               = "Informacije o stiku";
    $lang['contacts']                   = "Stiki";
    $lang['contact_add_info']           = "Če dodate ime podjetja, bo prikazano namesto imena uporabnika.";
    $lang['show_contact']               = "Prikaži stike";
    $lang['edit_contact']               = "Zamenjaj stike";
    $lang['contact_submit']             = "Pošiljanje stika";
    $lang['contact_warn']               = "Za dodajanje stika ni dovolj podatkov. Vrnite se nazaj in dodajte vsaj ime in priimek.";

 //files
    $lang['manage_files']               = "Upravljanje datotek";
    $lang['no_files']                   = "Ni datotek za upravljanje";
    $lang['no_file_uploads']            = "Namestitev strežnika za to stran ne dovoljuje nalaganje datotek.";
    $lang['file']                       = "Datoteka:";
    $lang['uploader']                   = "Lastnik:";
    $lang['files_assoc_project']        = "Datoteke v zvezi z projektom";
    $lang['files_assoc_task']           = "Datoteke v zvezi z nalogo";
    $lang['file_admin']                 = "Skrbništvo datotek";
    $lang['add_file']                   = "Dodaj datoteko";
    $lang['files']                      = "Datoteke";
    $lang['file_choose']                = "Datoteka, ki jo je potrebno dodati:";
    $lang['upload']                     = "Dodaj";
    $lang['file_email_owner']           = "Obvesti lastnika prek e-pošte o novi datoteki?";
    $lang['file_email_usergroup']       = "Obvesti uporabniško skupino prek e-pošte o novi datoteki?";
    $lang['max_file_sprt']              = "datoteka mora biti manjša od %s kB.";
    $lang['file_submit']                = "Pošiljanje datoteke";
    $lang['no_upload']                  = "Datoteka ni dodana. Vrnite se nazaj in poskusite ponovno.";
    $lang['file_too_big_sprt']          = "Največja velikost datoteke, ki jo dodajate je %s bajtov. Vaša datoteka je prevelika, zato je izbrisana";
    $lang['del_file_javascript_sprt']   = "Ste sigurni, da želite izbrisati datoteko %s ?";


 //forum
    $lang['orig_message']               = "Prvotno sporočilo:";
    $lang['post']                       = "Odgovori!";
    $lang['message']                    = "Sporočilo:";
    $lang['post_reply_sprt']            = "Odgovori na sporočilo uporabnika '%1\$s' , ki je postavil temo '%2\$s'";
    $lang['post_message_sprt']          = "Odgovori na: '%s'";
    $lang['forum_email_owner']          = "Pošlji e-pošto z vsebino sporočila lastniku?";
    $lang['forum_email_usergroup']      = "Pošlji e-pošto z vsebino sporočila uporabniški skupini?";
    $lang['reply']                      = "Odgovori";
    $lang['new_post']                   = "Nov vnos";
    $lang['public_user_forum']          = "Javni uporabniški forum";
    $lang['private_forum_sprt']         = "Zasebni forum za uporabniško skupino '%s'";
    $lang['forum_submit']               = "Odgovor na sporočilo v forumu";
    $lang['no_message']                 = "Sporočilo ni vnešeno. Vrnite se nazaj in poskusite ponovno.";
    $lang['add_reply']                  = "Odgovori";
    $lang['last_post_sprt']             = "Zadnji vnos: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedavni vnosi v forum";
    $lang['forum_search']               = "Iskanje po forumu";
    $lang['no_results']                 = "Za iskani izraz '%s' ne najdem nobenega vnosa.";
    $lang['search_results']             = "Najdeno je %1\$s vnosov za iskani izraz '%2\$s'<br />Prikazujem vnose %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Poročilo";
    $lang['warning']                    = "<h1>Oprostite!</h1><p>Trenutno ne moremo obdelati vaše zahteve. Poskusite kasneje.</p>";
    $lang['home_page']                  = "Domača stran";
    $lang['summary_page']               = "Kratek pregled";
    $lang['log_out']                    = "Odjava";
    $lang['main_menu']                  = "Glavni meni";
    $lang['archive']                    = "Arhiv";
    $lang['user_homepage_sprt']         = "Dobrodošli, %s";
    $lang['missing_field_javascript']   = "Vnesite podatek v odgovarjajoče neizpolnjeno polje";
    $lang['invalid_date_javascript']    = "Izberite pravilen datum.";
    $lang['finish_date_javascript']     = "Datum končanja projekta se izteče pred vnešenim datumom!";
    $lang['security_manager']           = "Varnostni mehanizem";
    $lang['session_timeout_sprt']       = "Pristop je zavrnjen. Zadnje dejanje se je zgodilo pred %1\$d minutami, medtem, ko je čas seje %2\$d minut. Lahko se <a href=\"%3\$sindex.php\">ponovno prijavite.</a>.";
    $lang['access_denied']              = "Pristop je zavrnjen";
    $lang['private_usergroup_no_access']= "To področje pripada zasebni uporabniški skupini, do katere nimate pravico dostopa.";
    $lang['invalid_date']               = "Nepravilen datum";
    $lang['invalid_date_sprt']          = "Datum %s ni pravilen (preverite število dni v mesecu).<br /> Vrnite se nazaj in vnesite pravilen datum.";


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
    $lang['taskgroup_dup_sprt']         = "Skupina opravil z imenom '%s' že obstaja. Vrnite se nazaj in izberite novo ime.";
    $lang['info_taskgroup_manage']      = "Informacije o skupinah opravil";

 //usergroups
    $lang['usergroup_name']             = "Ime uporabniške skupine:";
    $lang['usergroup_description']      = "Kratek opis uporabniške skupine:";
    $lang['members']                    = "Člani:";
    $lang['private_usergroup']          = "Zasebna uporabniška skupina";
    $lang['add_usergroup']              = "Dodaj uporabniško skupino";
    $lang['add_new_usergroup']          = "Dodajanje nove uporabniške skupine";
    $lang['edit_usergroup']             = "Menjava uporabniške skupine";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Upravljanje uporabniških skupin";
    $lang['no_usergroups']              = "Trenutno ne obstaja nobena uporabniška skupina";
    $lang['manage_usergroups']          = "Upravljanje uporabniških skupin";
    $lang['usergroups']                 = "Uporabniške skupine";
    $lang['usergroup_dup_sprt']         = "Uporabniška skupina z imenom '%s' že obstaja. Vrnite se nazaj in izberite novo ime.";
    $lang['info_usergroup_manage']      = "Informacije o upravljanju uporabniških skupin";

 //users
    $lang['login_name']                 = "Uporabniško ime";
    $lang['full_name']                  = "Polno ime";
    $lang['password']                   = "Geslo";
    $lang['blank_for_current_password'] = "(To polje pustite prazno, da bi trenutno geslo ostalo enako)";
    $lang['email']                      = "E-pošta";
    $lang['admin']                      = "Skrbnik";
    $lang['private_user']               = "Zasebni uporabniški račun";
    $lang['normal_user']                = "Normalni uporabniški račun";
    $lang['is_admin']                   = "Ali je skrbnik?";
    $lang['is_guest']                   = "Ali je gost?";
    $lang['guest']                      = "Uporabnik-gost";
    $lang['user_info']                  = "Informacije o uporabniku";
    $lang['deleted_users']              = "Izbrisane uporabniške naloge";
    $lang['no_deleted_users']           = "Ni izbrisanih uporabniških nalog.";
    $lang['revive']                     = "Povrni";
    $lang['permdel']                    = "Trajni izbris";
    $lang['permdel_javascript_sprt']    = "S tem boste trajno izbrisali vse uporabnikove podatke in naloge, vezane nanj. Si to res želite?";
    $lang['add_user']                   = "Dodaj uporabniški račun";
    $lang['edit_user']                  = "Urejanje uporabniških računov";
    $lang['no_users']                   = "Trenutno ne obstaja noben uporabniški račun";
    $lang['users']                      = "Uporabniki";
    $lang['existing_users']             = "Obstoječi uporabniki";
    $lang['private_profile']            = "Ta uporabnik ima zasebni profil, ki ga ne morete pogledati.";
    $lang['private_usergroup_profile']  = "(Ta uporabnik je član zasebne uporabniške skupine, do katere nimate dostopa.)";
    $lang['email_users']                = "Pošlji e-pošto uporabnikom";
    $lang['select_usergroup']           = "Izberite uporabniško skupino:";
    $lang['subject']                    = "Tema:";
    $lang['message_sent_maillist']      = "V teh primerih se sporočilo kopira tudi na e-poštni dopisni seznam.";
    $lang['who_online']                 = "Kdo je na strani?";
    $lang['edit_details']               = "Urejanje podatkov uporabnika";
    $lang['show_details']               = "Prikaži podatke o uporabniku";
    $lang['user_deleted']               = "Uporabniški račun je izbrisan!";
    $lang['no_usergroup']               = "Uporabnik ni član nobene uporabniške skupine";
    $lang['not_usergroup']              = "(Ni član nobene uporabniške skupine)";
    $lang['no_password_change']         = "(Vaše geslo ni zamenjano)";
    $lang['last_time_here']             = "Zadnjič na strani:";
    $lang['number_items_created']       = "Število kreiranih vnosov:";
    $lang['number_projects_owned']      = "Število projektov v lasti:";
    $lang['number_tasks_owned']         = "Število nalog v lasti:";
    $lang['number_tasks_completed']     = "Število končanih nalog:";
    $lang['number_forum']               = "Število sporočil na forumu:";
    $lang['number_files']               = "Število naloženih datotek:";
    $lang['size_all_files']             = "Skupna velikost datotek v lasti:";
    $lang['owned_tasks']                = "Naloge v lasti";
    $lang['invalid_email']              = "Netočen naslov e-pošte";
    $lang['invalid_email_given_sprt']   = "E-naslov '%s' je netočen. Vrnite se nazaj in poskusite ponovno.";
    $lang['duplicate_user']             = "Uporabniški račun že obstaja";
    $lang['duplicate_change_user_sprt'] = "Uporabniški račun '%s' že obstaja. Vrnite se nazaj in spremenite uporabniško ime.";
    $lang['value_missing']              = "Manjka podatek";
    $lang['field_sprt']                 = "Manjka podatek za polje '%s'. Vrnite se nazaj in ga izpolnite.";
    $lang['admin_priv']                 = "OBVESTILO: Dobili ste administratorske pravice.";
    $lang['manage_users']               = "Upravljanje uporabnikov";
    $lang['users_online']               = "Uporabniki na strani";
    $lang['online']                     = "Skorajšnji dostop (prisotni pred manj kot 60 minutami)";
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
    $lang['deadline']                   = "Končni rok";
    $lang['taken_from_parent']          = "(prevzeto od nadrejene naloge)";
    $lang['status']                     = "Stanje";
    $lang['task_owner']                 = "Lastnik naloge";
    $lang['project_owner']              = "Lastnik projekta";
    $lang['taskgroup']                  = "Skupina opravil";
    $lang['usergroup']                  = "Uporabniška skupina";
    $lang['nobody']                     = "Nihče";
    $lang['none']                       = "Ni";
    $lang['no_group']                   = "Ni skupine";
    $lang['all_groups']                 = "Vse skupine";
    $lang['all_users']                  = "Vsi uporabniki";
    $lang['all_users_view']             = "Vsi uporabniki lahko vidijo ta vnos?";
    $lang['group_edit']                 = "Kdorkoli v skupini lahko zamenja vnos?";
    $lang['project_description']        = "Opis projekta";
    $lang['task_description']           = "Opis naloge";
    $lang['email_owner']                = "Obvesti z e-pošto lastnika o spremembah?";
    $lang['email_new_owner']            = "Obvesti z e-pošto novega lastnika o spremembah?";
    $lang['email_group']                = "Obvesti z e-pošto uporabniško skupino o spremembah?";
    $lang['add_new_project']            = "Dodaj nov projekt";
    $lang['uncategorised']              = "Nekategoriziran";
    $lang['due_sprt']                   = "%d dni od danes";
    $lang['tomorrow']                   = "Jutri";
    $lang['due_today']                  = "Za danes";
    $lang['overdue_1']                  = "1 dan prekoračitve";
    $lang['overdue_sprt']               = "%d dni prekoračitve";
    $lang['edit_task']                  = "Zamenjava naloge";
    $lang['edit_project']               = "Zamenjava projekta";
    $lang['no_reparent']                = "Ne obstaja (projekt višjega nivoja)";
    $lang['del_javascript_project_sprt']= "Izbrisali boste projekt %s. Ste sigurni, da to želite??";
    $lang['del_javascript_task_sprt']   = "Izbrisali boste nalogo %s. Ste sigurni, da to želite?";
    $lang['add_task']                   = "Dodaj nalogo";
    $lang['add_subtask']                = "Dodaj podnalogo";
    $lang['add_project']                = "Dodaj projekt";
    $lang['clone_project']              = "Podvoji projekt";
    $lang['clone_task']                 = "Podvoji nalogo";
    $lang['quick_jump']                 = "Hitri skok";
    $lang['no_edit']                    = "Niste lastnik tega vnosa, zato ga ne morete zamenjati.";
    $lang['global']                     = "Splošni ukazi";
    $lang['delete_project']             = "Izbriši projekt";
    $lang['delete_task']                = "Izbriši nalogo";
    $lang['project_options']            = "Upravljanje projektov";
    $lang['task_options']               = "Nastavitve naloge";
    $lang['javascript_archive_project'] = "Na ta način boste arhivirali projekt %s. Ste sigurni, da to želite?";
    $lang['archive_project']            = "Arhiviraj projekt";
    $lang['task_navigation']            = "Položaj naloge";
    $lang['new_task']                   = "Nova naloga";
    $lang['no_projects']                = "Trenutno ne obstaja noben projekt";
    $lang['show_all_projects']          = "Prikaži vse projekte";
    $lang['show_active_projects']       = "Prikaži samo aktivne projekte";
    $lang['project_hold_sprt']          = "Projekt je na čakanju od dne %s";
    $lang['project_planned']            = "Planiran projekt";
    $lang['percent_sprt']               = "%d%% nalog je končanih";
    $lang['project_no_deadline']        = "Za ta projekt ne obstaja končni rok.";
    $lang['no_allowed_projects']        = "Nobenega projekta ne morete pogledati.";
    $lang['projects']                   = "Projekti";
    $lang['percent_project_sprt']       = "Projekt je končan %d%%";
    $lang['owned_by']                   = "Lastnik";
    $lang['created_on']                 = "Ustvarjen dne";
    $lang['completed_on']               = "Končan dne";
    $lang['modified_on']                = "Zamenjan dne";
    $lang['project_on_hold']            = "Projekt je na čakanju";
    $lang['project_accessible']         = "(Ta projekt je javno dostopen vsem uporabnikom.)";
    $lang['task_accessible']            = "(Ta naloga je javno dostopna vsem uporabnikom.)";
    $lang['project_not_accessible']     = "(Tem projektu lahko pristopijo samo člani določene uporabniške skupine.)";
    $lang['task_not_accessible']        = "(Tej nalogi lahko pristopijo samo člani določene uporabniške skupine.)";
    $lang['project_not_in_usergroup']   = "Ta projekt ne pripada nobeni uporabniški skupini, zato lahko k njemu pristopajo vsi.";
    $lang['task_not_in_usergroup']      = "Ta naloga ne pripada nobeni uporabniški skupini, zato lahko k njej pristopajo vsi.";
    $lang['usergroup_can_edit_project'] = "Ta projekt lahko popravljajo člani določene uporabniške skupine.";
    $lang['usergroup_can_edit_task']    = "To nalogo lahko popravljajo člani določene uporabniške skupine.";
    $lang['i_take_it']                  = "Prevzel ga bom";
    $lang['i_finished']                 = "Končal sem ga!";
    $lang['i_dont_want']                = "Ne želim ga več";
    $lang['take_over_project']          = "Prevzemi projekt";
    $lang['take_over_task']             = "Prevzemi nalogo";
    $lang['task_info']                  = "Informacije o nalogi";
    $lang['project_details']            = "Podrobnosti projekta";
    $lang['todo_list_for']              = "Obveznosti za: ";
    $lang['due_in_sprt']                = " (končati v roku %d dni)";
    $lang['due_tomorrow']               = " (končati do jutri)";
    $lang['no_assigned']                = "Ta uporabnik nima nedokončanih nalog.";
    $lang['todo_list']                  = "Obveznosti";
    $lang['summary_list']               = "Kratek pregled";
    $lang['task_submit']                = "Pošiljanje naloge";
    $lang['not_owner']                  = "Dostop je onemogočen. Razlog je v tem, da niste lastnik ali pa nimate ustrezne pravice za dostopanje.";
    $lang['missing_values']             = "Niste vnesli dovolj podatkov. Vrnite se nazaj in poskusite ponovno.";
    $lang['future']                     = "V prihodnosti";
    $lang['flags']                      = "Zastavica";
    $lang['owner']                      = "Lastnik";
    $lang['group']                      = "Skupina";
    $lang['by_usergroup']               = " (po uporabniški skupini)";
    $lang['by_taskgroup']               = " (po skupinah opravil)";
    $lang['by_deadline']                = " (po končnem roku)";
    $lang['by_status']                  = " (po stanju)";
    $lang['by_owner']                   = " (po lastniku)";
  //** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Projekt, ki ga je potrebno podvojiti:";
    $lang['task_cloned']                = "Naloga, ki jo je potrebno podvojiti:";
    $lang['note_clone']                 = "Opomba: Naloga bo podvojena kot nov projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Koledar";
    $lang['normal_version']             = "Normalna verzija";
    $lang['print_version']              = "Verzija za tiskanje";
    $lang['condensed_view']             = "Skrčen prikaz";
    $lang['full_view']                  = "Poln prikaz";
    $lang['icalendar']                  = "\"iKoledar\" datoteka";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>