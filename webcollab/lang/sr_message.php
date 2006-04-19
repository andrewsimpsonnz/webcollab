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

  Language files for 'srl' (Serbian Latin)

  Maintainer: Branko Majic <branko.majic at gmail.com>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-2" );

//this is the regex for input validation filter used in common.php 
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s"; //ISO-8859-x 

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ned', 'Pon', 'Uto', 'Sre', '�et', 'Pet', 'Sub' );

//task states
 
 //priorities
    $task_state['dontdo']               = "Ne treba da se radi";
    $task_state['low']                  = "Nizak";
    $task_state['normal']               = "Srednji";
    $task_state['high']                 = "Visok";
    $task_state['yesterday']            = "Ju�e!";
 //status
    $task_state['new']                  = "Nov";
    $task_state['planned']              = "Planiran (nije aktivan)";
    $task_state['active']               = "Aktivan (radi se na njemu)";
    $task_state['cantcomplete']         = "Na �ekanju";
    $task_state['completed']            = "Zavr�en";
    $task_state['done']                 = "Gotov";
    $task_state['task_planned']         = " Planiran";
    $task_state['task_active']          = " Aktivan";
 //project states
    $task_state['planned_project']      = "Planiran projekat (nije aktivan)";
    $task_state['no_deadline_project']  = "Bez krajnjeg roka";
    $task_state['active_project']       = "Aktivan projekat";

//common items
    $lang['description']                = "Opis";
    $lang['name']                       = "Ime";
    $lang['add']                        = "Dodaj";
    $lang['update']                     = "Osve�i";
    $lang['submit_changes']             = "Po�alji izmene";
    $lang['continue']                   = "Nastavi";
    $lang['reset']                      = "Resetuj";
    $lang['manage']                     = "Upravljaj";
    $lang['edit']                       = "Menjaj";
    $lang['delete']                     = "Bri�i";
    $lang['del']                        = "Bri�i";
    $lang['confirm_del_javascript']     = " Potvrdite brisanje!";
    $lang['yes']                        = "Da";
    $lang['no']                         = "Ne";
    $lang['action']                     = "Akcija";
    $lang['task']                       = "Zadatak";
    $lang['tasks']                      = "Zadaci";
    $lang['project']                    = "Projekat";
    $lang['info']                       = "Informacije";
    $lang['bytes']                      = " bajta";
    $lang['select_instruct']            = "(Dr�ite ctrl da biste odabrali vi�e; ili za prazan odabir)";
    $lang['member_groups']              = "Korisnik je �lan ozna�enih grupa ispod (ukoliko je uop�te �lan neke grupe)";
    $lang['login']                      = "Korisni�ko ime";
    $lang['login_action']               = "Korisni�ko ime";
    $lang['login_screen']               = "Korisni�ko ime";
    $lang['error']                      = "Gre�ka";
    $lang['no_login']                   = "Pristup odbijen; neta�no korisni�ko ime ili lozinka";
    $lang['redirect_sprt']              = "Automatski �ete biti vra�eni nazad na prijavljivanje posel pauze od %d sekundi";
    $lang['login_now']                  = "Molim vas kliknite ovde za vra�anje na prijavljivanje";   
    $lang['please_login']               = "Molim vas da se prijavite";
    $lang['go']                         = "Kreni!";

//graphic items
    $lang['late_g']                     = "&nbsp;KASNI&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;OSVE�ENO&nbsp;";

//admin config
    $lang['admin_config']               = "Administratorska pode�avanja";
    $lang['email_settings']             = "Pode�avanje zaglavlja e-po�te";
    $lang['admin_email']                = "E-po�ta administratora";
    $lang['email_reply']                = "E-po�ta 'odgovri na'";
    $lang['email_from']                 = "E-po�ta 'od'";
    $lang['mailing_list']               = "E-po�tanske liste";
    $lang['default_checkbox']           = "Standardna pode�avanja opcija za projekte/zadatke";
    $lang['allow_globalaccess']         = "Dozvoli op�ti pristup?";
    $lang['allow_group_edit']           = "Dozvoli svim korisnicima u korisni�koj grupi da menjaju?";
    $lang['set_email_owner']            = "Uvek po�alji vlasniku e-po�tu sa promenama?";
    $lang['set_email_group']            = "Uvek po�alji korisnicima e-po�tu sa promenama?";
    $lang['project_listing_order']      = "Listanje projekata po kategoriji";
    $lang['task_listing_order']         = "Listanje zadataka po kategoriji"; 
    $lang['configuration']              = "Pode�avanje";

//archive
    $lang['archived_projects']          = "Arhivirani projekti";    

//contacts
    $lang['firstname']                  = "Ime:";
    $lang['lastname']                   = "Prezime:";
    $lang['company']                    = "Firma:";
    $lang['home_phone']                 = "Ku�ni telefon:";
    $lang['mobile']                     = "Mobilni telefon:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Poslovni telefon:";
    $lang['address']                    = "Adresa:";
    $lang['postal']                     = "Po�tanski fah:";
    $lang['city']                       = "Grad:";
    $lang['email']                      = "E-po�ta:";
    $lang['notes']                      = "Primedbe:";
    $lang['add_contact']                = "Dodaj kontakt";
    $lang['del_contact']                = "Obri�i kontakt";
    $lang['contact_info']               = "Informacije o kontaktu";
    $lang['contacts']                   = "Kontakti";
    $lang['contact_add_info']           = "Ukoliko dodate ime firme, onda �e ono biti prikazano umesto imena korisnika.";
    $lang['show_contact']               = "Prika�i kontakte";
    $lang['edit_contact']               = "Promeni kontakte";
    $lang['contact_submit']             = "Po�alji kontakt";
    $lang['contact_warn']               = "Ne postoji dovoljno vrednosti da bi se kontakt dodao. Molim vas vratite se nazad i unesite makar ime i prezime";

 //files
    $lang['manage_files']               = "Upravljanje fajlovima";
    $lang['no_files']                   = "Nema fajlova kojima bi se upravljalo.";
    $lang['no_file_uploads']            = "Konfiguracija ovog sajta ne dozvoljava dodavanje fajlova";
    $lang['file']                       = "Fajl:";
    $lang['uploader']                   = "Vlasnik:";
    $lang['files_assoc_project']        = "Fajlovi u vezi sa ovim projektom";
    $lang['files_assoc_task']           = "Fajlovi u vezi sa ovim zadatkom";
    $lang['file_admin']                 = "Administracija fajlova";
    $lang['add_file']                   = "Dodaj fajl";
    $lang['files']                      = "Fajlovi";
    $lang['file_choose']                = "Fajl koji treba dodati:";
    $lang['upload']                     = "Dodaj";
    $lang['file_email_owner']           = "Po�alji e-po�tu o novom fajlu vlasniku?";
    $lang['file_email_usergroup']       = "Po�alji e-po�tu o novom fajlu korisni�koj grupi?";
    $lang['max_file_sprt']              = "Fajl koji dodajete mora biti manji od %s kb.";
    $lang['file_submit']                = "Dodavanje fajla";
    $lang['no_upload']                  = "Fajl nije dodat. Molim vas vratite se nazad i pokusajte ponovo.";
    $lang['file_too_big_sprt']          = "Maksimalna veli�ina fajla za dodavanje je %s bajta. Va� fajl je bio prevelik, pa je obrisan.";
    $lang['del_file_javascript_sprt']   = "Da li ste sigurni da �elite da obri�ete fajl %s ?";


 //forum
    $lang['orig_message']               = "Prvobitna poruka:";
    $lang['post']                       = "Postavi poruku!";
    $lang['message']                    = "Poruka:";
    $lang['post_reply_sprt']            = "Postavi odgovor na poruku od korisnika '%1\$s' �ija je tema '%2\$s'";
    $lang['post_message_sprt']          = "Postavi poruku na: '%s'";
    $lang['forum_email_owner']          = "Po�alji e-po�tom poruku vlasniku?";
    $lang['forum_email_usergroup']      = "Po�alji e-po�tom poruku korisni�koj grupi?";
    $lang['reply']                      = "Odogovi";
    $lang['new_post']                   = "Nova poruka";
    $lang['public_user_forum']          = "Javni korisni�ki forum";
    $lang['private_forum_sprt']         = "Privatni forum za korisni�ku grupu '%s'";
    $lang['forum_submit']               = "Postavljanje poruke na forum";
    $lang['no_message']                 = "Nema poruke! Molim vas vratite se nazad i poku�ajte ponovo";
    $lang['add_reply']                  = "Dodaj odgovor";
    $lang['last_post_sprt']             = "Poslednja poruka %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedavne poruke na forumima";
//**
    $lang['recent_posts']                = "Recent forum posts";
//**
    $lang['forum_search']                = "Forum search";
//**
    $lang['no_results']                  = "No results found for '%s'";
//**
    $lang['search_results']              = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "Izve�taj";
    $lang['warning']                    = "<h1>�ao nam je!</h1><p>Nismo u mogu�nosti da obradimo va� zahtev trenutno. Molim vas poku�ajte ponovo kasnije.</p>";
    $lang['home_page']                  = "Prva strana";
    $lang['summary_page']               = "Kratak pregled";
    $lang['todo_list']                  = "Uradi lista";
    $lang['calendar']                   = "Kalendar";
    $lang['log_out']                    = "Odjavi se";
    $lang['main_menu']                  = "Glavni meni";
    $lang['archive']                    = "Arhiva";
    $lang['user_homepage_sprt']         = "Glavna strana korisnika: %s";
    $lang['missing_field_javascript']   = "Molim vas unesite vrednost za nedostaju�e polje";
    $lang['invalid_date_javascript']    = "Molim vas odaberite ispravan kalendarski datum";
    $lang['finish_date_javascript']     = "Zavr�ni datum projekta isti�e pre unesenog datum!";
    $lang['security_manager']           = "Upravlja� bezbednosti";
    $lang['session_timeout_sprt']       = "Pristup odbijen; poslednja akcija se desial pre %1\$d minuta, a obustavno vreme iznosi %2\$d minuta; molim vas da se <a href=\"%3\$sindex.php\">ponovo prijavite</a>";
    $lang['access_denied']              = "Pristup odbijen";
    $lang['private_usergroup']          = "Izvinite; ova oblast pripada privatnoj korisni�kog grupi, a vi nemate dovoljna pristupna prava.";
    $lang['invalid_date']               = "Nepravialn datum";
    $lang['invalid_date_sprt']          = "Datum %s nije pravilan kalendarski datum (proverite broj dana u mesecu).<br />Molim vas da se vratite i unesete ispravan datum.";


 //taskgroups
    $lang['taskgroup_name']             = "Ime grupe za zadatke:";
    $lang['taskgroup_description']      = "Kratak opis grupe za zadatke:";
    $lang['add_taskgroup']              = "Dodaj grupu za zadatke";
    $lang['add_new_taskgroup']          = "Dodaj novu grupu za zadatke";
    $lang['edit_taskgroup']             = "Menjaj grupu za zadatke";
    $lang['taskgroup_manage']           = "Upravljanje grupom za zadatke";
    $lang['no_taskgroups']              = "Nijedna grupa za zadatke nije definisana";
    $lang['manage_taskgroups']          = "Upravljaj grupama za zadatke";
    $lang['taskgroups']                 = "Grupe za zadatke";
    $lang['taskgroup_dup_sprt']         = "Grupa za zadatke pod imenom '%s' ve� postoji.  Molim vas da se vratite i izaberete novo ime.";
    $lang['info_taskgroup_manage']      = "Informacije o upravljanju grupama za zadatke";

 //usergroups
    $lang['usergroup_name']             = "Ime korisni�ke grupe:";
    $lang['usergroup_description']      = "Kratak opis korisni�ke grupe:";
    $lang['members']                    = "�lanovi:";
    $lang['private_usergroup']          = "Privatna korisni�ka grupa";
    $lang['add_usergroup']              = "Dodaj korisni�ku grupu";
    $lang['add_new_usergroup']          = "Dodaj novu korisni�ku grupu";
    $lang['edit_usergroup']             = "Menjaj korisni�ku grupu";
    $lang['usergroup_manage']           = "Upravljanje korisni�kom grupom";
    $lang['no_usergroups']              = "Nema definisanih korisni�kih grupa";
    $lang['manage_usergroups']          = "Upravljanje korisni�kim grupama";
    $lang['usergroups']                 = "Korisni�ke grupe";
    $lang['usergroup_dup_sprt']         = "Korisni�ka grupa pod imenom '%s' ve� postoji.  Molim vas da se vratite i izaberete novo ime.";
    $lang['info_usergroup_manage']      = "Informacije o upravljanju korisni�kim grupama";

 //users
    $lang['login_name']                 = "Korisni�ko ime";
    $lang['full_name']                  = "Puno ime";
    $lang['password']                   = "Lozinka";
    $lang['blank_for_current_password'] = "(Ostavite prazno za trenutnu �ifru)";
    $lang['email']                      = "E-po�ta";
    $lang['admin']                      = "Administrator";
    $lang['private_user']               = "Privatni korisnik";
    $lang['normal_user']                = "Normalan korisnik"; 
    $lang['is_admin']                   = "Da li je administrator?";
    $lang['is_guest']                   = "Da li je gost?";
    $lang['guest']                      = "Gost";
    $lang['user_info']                  = "Informacije o korisniku";
    $lang['deleted_users']              = "Izbrisan korisnik";
    $lang['no_deleted_users']           = "Nema izbrisanih korisnika.";
    $lang['revive']                     = "O�ivi nalog";
    $lang['permdel']                    = "Trajno brisanje";
    $lang['permdel_javascript_sprt']    = "Ova operacija �e trajno izbrisati sve korisni�ke zapise i zadu�ene zadatke korisnika pod imenom %s. Da li je ovo ono �to �elite da uradite?";
    $lang['add_user']                   = "Dodaj korisnika";
    $lang['edit_user']                  = "Menjaj korisnika";
    $lang['no_users']                   = "U sistemu ne postoji nijedan korisnik";
    $lang['users']                      = "Korisnici";
    $lang['existing_users']             = "Postoje�i korisnici";
    $lang['private_profile']            = "Ovaj korisnik ima privatni profil koji vi ne mo�ete pogledati.";
    $lang['private_usergroup_profile']  = "(Ovaj korisnik je �lan privatne korisni�ke grupe koju vi ne mo�ete pregledati)";
    $lang['email_users']                = "Po�aljite e-po�tu korisnicima";
    $lang['select_usergroup']           = "Korisni�ka grupa je izabrana ispod:";
    $lang['subject']                    = "Tema:";
    $lang['message_sent_maillist']      = "Poruka se u svim slu�ajevima kopira i na e-po�tansku listu.";
    $lang['who_online']                 = "Ko je trenutno na vezi?";
    $lang['edit_details']               = "Menjaj korisni�ke podatake";
    $lang['show_details']               = "Prika�i korisni�ke podatke";
    $lang['user_deleted']               = "Ovaj korisnik je obrisan!";
    $lang['no_usergroup']               = "Korisnik nije �lan nijedne korisni�ke grupe";
    $lang['not_usergroup']              = "(Nije �lan nijedne korisni�ke grupe)";
    $lang['no_password_change']         = "(Va�a postoje�a �ifra nije promenjana)";
    $lang['last_time_here']             = "Poslednji put je bio ovde:";
    $lang['number_items_created']       = "Broj kreiranih ulaza:";
    $lang['number_projects_owned']      = "Broj vlastitih projekata:";
    $lang['number_tasks_owned']         = "Broj vlastitih zadataka:";
    $lang['number_tasks_completed']     = "Broj zavr�enih zadataka:";
    $lang['number_forum']               = "Broj poruka na forumima:";
    $lang['number_files']               = "Broj dodatih fajlova:";
    $lang['size_all_files']             = "Ukupna veli�ina vlastitih dodatih fajlova:";
    $lang['owned_tasks']                = "Vlastiti zadaci";
    $lang['invalid_email']              = "Nepostoje�a e-po�tanska adresa";
    $lang['invalid_email_given_sprt']   = "E-po�tanska adresa '%s' je nepostoje�a. Molim vas vratite se i poku�ajte ponovo.";
    $lang['duplicate_user']             = "Korisnik ve� postoji";
    $lang['duplicate_change_user_sprt'] = "Korisnik '%s' ve� postoji. Molim vas vratite se i promenite korisni�ko ime.";
    $lang['value_missing']              = "Nedostaje unos";
    $lang['field_sprt']                 = "Nedostaje unos u polju '%s'. Molim vas vratites se i popunite ga.";
    $lang['admin_priv']                 = "PRIMEDBA: Dobili ste administratorske privilegije.";
    $lang['manage_users']               = "Upravljanje korisni�kim nalozima";
    $lang['users_online']               = "Korisnici na vezi";
    $lang['online']                     = "'Umri mu�ki' korisnici na vezi (bili su na vezi pre manje od 60 minuta)";
    $lang['not_online']                 = "Ostali";
    $lang['user_activity']              = "Aktivnost korisnika";

  //tasks
    $lang['add_new_task']               = "Dodaj novi zadatak";
    $lang['priority']                   = "Prioritet";
    $lang['parent_task']                = "Roditelj-zadatak";
    $lang['creation_time']              = "Datum kreiranja";
    $lang['by_sprt']                    = "%1\$s od strane korisnika %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Ime projekta";
    $lang['task_name']                  = "Ime zadatka";
    $lang['deadline']                   = "Rok";
    $lang['taken_from_parent']          = "(Preuzet od roditelja)";
    $lang['status']                     = "Stanje";
    $lang['task_owner']                 = "Vlasnik zadatka";
    $lang['project_owner']              = "Vlasnik projekta";
    $lang['taskgroup']                  = "Grupa za zadatke";
    $lang['usergroup']                  = "Korisni�ka grupa";
    $lang['nobody']                     = "Niko";
    $lang['none']                       = "Nijedna";
    $lang['no_group']                   = "Nema grupe";
    $lang['all_groups']                 = "Sve grupe";
    $lang['all_users']                  = "Svi korisnici";
    $lang['all_users_view']             = "Svi korisnici mogu da vide ovaj unos?";
    $lang['group_edit']                 = "Bilo ko u korisni�koj grupi mo�e da menja unos?";
    $lang['project_description']        = "Opis projekta";
    $lang['task_description']           = "Opis zadatka";
    $lang['email_owner']                = "Po�alji e-po�tu o promenama vlasniku?";
    $lang['email_new_owner']            = "Po�alji e-po�tu o promenama (novom) vlasniku?";
    $lang['email_group']                = "Po�alji e-po�tu o promenama korisni�koj grupi?";
    $lang['add_new_project']            = "Dodaj novi projekat";
    $lang['uncategorised']              = "Nekategorizovano";
    $lang['due_sprt']                   = "Jo� %d dana";
    $lang['tomorrow']                   = "Sutra";
    $lang['due_today']                  = "Za danas";
    $lang['overdue_1']                  = "1 dan prekora�enja";
    $lang['overdue_sprt']               = "%d dana prekora�enja";
    $lang['edit_task']                  = "Menjaj zadatak";
    $lang['edit_project']               = "Menjaj projekat";
    $lang['no_reparent']                = "Ni�ta (projekat, nije zadatak)";
    $lang['del_javascript_project_sprt']= "Ovo �e obrisati projekat %s. Da li ste sigurni?";
    $lang['del_javascript_task_sprt']   = "Ovo �e obrisati zadatak %s. Da li ste sigurni?";
    $lang['add_task']                   = "Dodaj zadatak";
    $lang['add_subtask']                = "Dodaj podzadatak";
    $lang['add_project']                = "Dodaj projekat";
    $lang['clone_project']              = "Kloniraj projekat";
    $lang['clone_task']                 = "Kloniraj zadatak";
    $lang['quick_jump']                 = "Brzi skok";
    $lang['no_edit']                    = "Vi niste vlasnik ovog unosa i stoga ga ne mo�ete menjati";
    $lang['uncategorised']              = "Nekategorizovano";
    $lang['admin']                      = "Administrator";
    $lang['global']                     = "Globalne opcije";
    $lang['delete_project']             = "Obri�i projekat";
    $lang['delete_task']                = "Obri�i zadatak";
    $lang['project_options']            = "Opcije projekta";
    $lang['task_options']               = "Opcije zadatka";
    $lang['javascript_archive_project'] = "Ovo �e arhivirati projekat pod imenom %s. Da li ste sigurni?";
    $lang['archive_project']            = "Arhiviraj projekat";
    $lang['task_navigation']            = "Navigacija kroz zadatke";
    $lang['new_task']                   = "Novi zadatak";    
    $lang['no_projects']                = "Ne postoji nijedan projekat";
    $lang['show_all_projects']          = "Prika�i sve projekte";
    $lang['show_active_projects']       = "Prika�i samo aktivne projekte";
    $lang['project_hold_sprt']          = "Projekat je na �ekanju od dana %s";
    $lang['project_planned']            = "Planirani projekat";
    $lang['percent_sprt']               = "%d%% zadataka je zavr�eno";
    $lang['project_no_deadline']        = "Nije postavljen krajnji rok za ovaj projekat";
    $lang['no_allowed_projects']        = "Nije vam dozvoljeno da pregledate ijedan projekat";
    $lang['projects']                   = "Projekti";
    $lang['percent_project_sprt']       = "Ovaj projekat je zavr�en %d%%";
    $lang['owned_by']                   = "Vlasnik je";
    $lang['created_on']                 = "Kreiran na dan";
    $lang['completed_on']               = "Zavr�en na dan";
    $lang['modified_on']                = "Menjan na dan";
    $lang['project_on_hold']            = "Projekat je na �ekanju";
    $lang['project_accessible']         = "(Ovaj projekat je javno dostupan svim korisnicima)";
    $lang['task_accessible']            = "(Ovaj zadatak je javno dostupan svim korisnicima)";
    $lang['project_not_accessible']     = "(Ovaj projekat je dostupan samo �lanovima korisni�ke grupe)";
    $lang['task_not_accessible']        = "(Ovaj zadatak je dostupan samo �lanovima korisni�ke grupe)";
    $lang['project_not_in_usergroup']   = "Ovaj projekat nije dodeljen nijednoj korisni�kog grupi i dostupan je svim korisnicima.";
    $lang['task_not_in_usergroup']      = "Ovaj zadatak nije dodeljen nijednoj korisni�kog grupi i dostupan je svim korisnicima.";
    $lang['usergroup_can_edit_project'] = "Ovaj projekat mogu da menjaju i �lanovi korisni�ke grupe.";
    $lang['usergroup_can_edit_task']    = "Ovaj zadatak mogu da menjaju i �lanovi korisni�ke grupe.";
    $lang['i_take_it']                  = "Preuze�u ga :)";
    $lang['i_finished']                 = "Zavr�io sam!";
    $lang['i_dont_want']                = "Ne �elim ga vi�e";
    $lang['take_over_project']          = "Preuzmi projekat";
    $lang['take_over_task']             = "Preuzmi zadatak";
    $lang['task_info']                  = "Informacije o zadatku";
    $lang['project_details']            = "Detalji projekta";
    $lang['todo_list_for']              = "'Uradi' lista za: ";
    $lang['due_in_sprt']                = " (Treba da se uradi u roku od %d dana)";
    $lang['due_tomorrow']               = " (Treba da se uradi za sutra)";
    $lang['no_assigned']                = "Ovaj korisnik nema nedovr�enih zadataka.";
    $lang['todo_list']                  = "'Uradi' lista";
    $lang['summary_list']               = "Kratak pregled";
    $lang['task_submit']                = "Slanje zadatka";
    $lang['not_owner']                  = "Pristup odbijen. Ili vi niste vlasnik, ili nemate dovoljna pristupna prava.";
    $lang['missing_values']             = "Niste uneli dovoljan broj informacija u polja; molim vas vratite se nazad i poku�ajte ponovo";
    $lang['future']                     = "U budu�nosti";
    $lang['flags']                      = "Oznake";
    $lang['owner']                      = "Vlasnik";
    $lang['group']                      = "Kor. grupa";
    $lang['by_usergroup']               = " (po korisni�koj grupi)";
    $lang['by_taskgroup']               = " (po grupi za zadatke)";
    $lang['by_deadline']                = " (po krajnjem roku)";
    $lang['by_status']                  = " (po stanju)";
    $lang['by_owner']                   = " (po vlasniku)";
    $lang['project_cloned']             = "Projekat koji treba klonirati :";
    $lang['task_cloned']                = "Zadatak koji treba klonirati :";
    $lang['note_clone']                 = "Primedba: Zadatak �e biti kloniran kao novi projekat";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendar";
    $lang['normal_version']             = "Normalna verzija";
    $lang['print_version']              = "Verzija za �tampu";
    $lang['condensed_view']             = "Sabijen pregled";
    $lang['full_view']                  = "Pun pregled";
//**
    $lang['icalendar']                  = "iCalendar";

?>