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

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ned', 'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub' );

//task states

 //priorities
    $task_state['dontdo']               = "Ne treba da se radi";
    $task_state['low']                  = "Nizak";
    $task_state['normal']               = "Srednji";
    $task_state['high']                 = "Visok";
    $task_state['yesterday']            = "Juče!";
 //status
    $task_state['new']                  = "Nov";
    $task_state['planned']              = "Planiran (nije aktivan)";
    $task_state['active']               = "Aktivan (radi se na njemu)";
    $task_state['cantcomplete']         = "Na čekanju";
    $task_state['completed']            = "Završen";
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
    $lang['update']                     = "Osveži";
    $lang['submit_changes']             = "Pošalji izmene";
    $lang['continue']                   = "Nastavi";
    $lang['reset']                      = "Resetuj";
    $lang['manage']                     = "Upravljaj";
    $lang['edit']                       = "Menjaj";
    $lang['delete']                     = "Briši";
    $lang['del']                        = "Briši";
    $lang['confirm_del_javascript']     = " Potvrdite brisanje!";
    $lang['yes']                        = "Da";
    $lang['no']                         = "Ne";
    $lang['action']                     = "Akcija";
    $lang['task']                       = "Zadatak";
    $lang['tasks']                      = "Zadaci";
    $lang['project']                    = "Projekat";
    $lang['info']                       = "Informacije";
    $lang['bytes']                      = " bajta";
    $lang['select_instruct']            = "(Držite ctrl da biste odabrali više; ili za prazan odabir)";
    $lang['member_groups']              = "Korisnik je član označenih grupa ispod (ukoliko je uopšte član neke grupe)";
    $lang['login']                      = "Korisničko ime";
    $lang['login_action']               = "Korisničko ime";
    $lang['login_screen']               = "Korisničko ime";
    $lang['error']                      = "Greška";
    $lang['no_login']                   = "Pristup odbijen; netačno korisničko ime ili lozinka";

    $lang['redirect_sprt']              = "Automatski ćete biti vraćeni nazad na prijavljivanje posel pauze od %d sekundi";
    $lang['login_now']                  = "Molim vas kliknite ovde za vraćanje na prijavljivanje";
    $lang['please_login']               = "Molim vas da se prijavite";
    $lang['go']                         = "Kreni!";

//graphic items
    $lang['late_g']                     = "&nbsp;KASNI&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;OSVEŽENO&nbsp;";

//admin config
    $lang['admin_config']               = "Administratorska podešavanja";
    $lang['email_settings']             = "Podešavanje zaglavlja e-pošte";
    $lang['admin_email']                = "E-pošta administratora";
    $lang['email_reply']                = "E-pošta 'odgovri na'";
    $lang['email_from']                 = "E-pošta 'od'";
    $lang['mailing_list']               = "E-poštanske liste";
    $lang['default_checkbox']           = "Standardna podešavanja opcija za projekte/zadatke";
    $lang['allow_globalaccess']         = "Dozvoli opšti pristup?";
    $lang['allow_group_edit']           = "Dozvoli svim korisnicima u korisničkoj grupi da menjaju?";
    $lang['set_email_owner']            = "Uvek pošalji vlasniku e-poštu sa promenama?";
    $lang['set_email_group']            = "Uvek pošalji korisnicima e-poštu sa promenama?";
    $lang['project_listing_order']      = "Listanje projekata po kategoriji";
    $lang['task_listing_order']         = "Listanje zadataka po kategoriji";
    $lang['configuration']              = "Podešavanje";

//archive
    $lang['archived_projects']          = "Arhivirani projekti";

//contacts
    $lang['firstname']                  = "Ime:";
    $lang['lastname']                   = "Prezime:";
    $lang['company']                    = "Firma:";
    $lang['home_phone']                 = "Kućni telefon:";
    $lang['mobile']                     = "Mobilni telefon:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Poslovni telefon:";
    $lang['address']                    = "Adresa:";
    $lang['postal']                     = "Poštanski fah:";
    $lang['city']                       = "Grad:";
    $lang['email']                      = "E-pošta:";
    $lang['notes']                      = "Primedbe:";
    $lang['add_contact']                = "Dodaj kontakt";
    $lang['del_contact']                = "Obriši kontakt";
    $lang['contact_info']               = "Informacije o kontaktu";
    $lang['contacts']                   = "Kontakti";
    $lang['contact_add_info']           = "Ukoliko dodate ime firme, onda će ono biti prikazano umesto imena korisnika.";
    $lang['show_contact']               = "Prikaži kontakte";
    $lang['edit_contact']               = "Promeni kontakte";
    $lang['contact_submit']             = "Pošalji kontakt";
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
    $lang['file_email_owner']           = "Pošalji e-poštu o novom fajlu vlasniku?";
    $lang['file_email_usergroup']       = "Pošalji e-poštu o novom fajlu korisničkoj grupi?";
    $lang['max_file_sprt']              = "Fajl koji dodajete mora biti manji od %s kb.";
    $lang['file_submit']                = "Dodavanje fajla";
    $lang['no_upload']                  = "Fajl nije dodat. Molim vas vratite se nazad i pokusajte ponovo.";
    $lang['file_too_big_sprt']          = "Maksimalna veličina fajla za dodavanje je %s bajta. Vaš fajl je bio prevelik, pa je obrisan.";
    $lang['del_file_javascript_sprt']   = "Da li ste sigurni da želite da obrišete fajl %s ?";


 //forum
    $lang['orig_message']               = "Prvobitna poruka:";
    $lang['post']                       = "Postavi poruku!";
    $lang['message']                    = "Poruka:";
    $lang['post_reply_sprt']            = "Postavi odgovor na poruku od korisnika '%1\$s' čija je tema '%2\$s'";
    $lang['post_message_sprt']          = "Postavi poruku na: '%s'";
    $lang['forum_email_owner']          = "Pošalji e-poštom poruku vlasniku?";
    $lang['forum_email_usergroup']      = "Pošalji e-poštom poruku korisničkoj grupi?";
    $lang['reply']                      = "Odogovi";
    $lang['new_post']                   = "Nova poruka";
    $lang['public_user_forum']          = "Javni korisnički forum";
    $lang['private_forum_sprt']         = "Privatni forum za korisničku grupu '%s'";
    $lang['forum_submit']               = "Postavljanje poruke na forum";
    $lang['no_message']                 = "Nema poruke! Molim vas vratite se nazad i pokušajte ponovo";
    $lang['add_reply']                  = "Dodaj odgovor";
    $lang['last_post_sprt']             = "Poslednja poruka %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedavne poruke na forumima";
//**
    $lang['forum_search']               = "Forum search";
//**
    $lang['no_results']                 = "No results found for '%s'";
//**
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "Izveštaj";
    $lang['warning']                    = "<h1>Žao nam je!</h1><p>Nismo u mogućnosti da obradimo vaš zahtev trenutno. Molim vas pokušajte ponovo kasnije.</p>";
    $lang['home_page']                  = "Prva strana";
    $lang['summary_page']               = "Kratak pregled";
    $lang['todo_list']                  = "Uradi lista";
    $lang['calendar']                   = "Kalendar";
    $lang['log_out']                    = "Odjavi se";
    $lang['main_menu']                  = "Glavni meni";
    $lang['archive']                    = "Arhiva";
    $lang['user_homepage_sprt']         = "Glavna strana korisnika: %s";
    $lang['missing_field_javascript']   = "Molim vas unesite vrednost za nedostajuće polje";
    $lang['invalid_date_javascript']    = "Molim vas odaberite ispravan kalendarski datum";
    $lang['finish_date_javascript']     = "Završni datum projekta ističe pre unesenog datum!";
    $lang['security_manager']           = "Upravljač bezbednosti";
    $lang['session_timeout_sprt']       = "Pristup odbijen; poslednja akcija se desial pre %1\$d minuta, a obustavno vreme iznosi %2\$d minuta; molim vas da se <a href=\"%3\$sindex.php\">ponovo prijavite</a>";
    $lang['access_denied']              = "Pristup odbijen";
    $lang['private_usergroup']          = "Izvinite; ova oblast pripada privatnoj korisničkog grupi, a vi nemate dovoljna pristupna prava.";
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
    $lang['taskgroup_dup_sprt']         = "Grupa za zadatke pod imenom '%s' već postoji.  Molim vas da se vratite i izaberete novo ime.";
    $lang['info_taskgroup_manage']      = "Informacije o upravljanju grupama za zadatke";

 //usergroups
    $lang['usergroup_name']             = "Ime korisničke grupe:";
    $lang['usergroup_description']      = "Kratak opis korisničke grupe:";
    $lang['members']                    = "Članovi:";
    $lang['private_usergroup']          = "Privatna korisnička grupa";
    $lang['add_usergroup']              = "Dodaj korisničku grupu";
    $lang['add_new_usergroup']          = "Dodaj novu korisničku grupu";
    $lang['edit_usergroup']             = "Menjaj korisničku grupu";
    $lang['usergroup_manage']           = "Upravljanje korisničkom grupom";
    $lang['no_usergroups']              = "Nema definisanih korisničkih grupa";
    $lang['manage_usergroups']          = "Upravljanje korisničkim grupama";
    $lang['usergroups']                 = "Korisničke grupe";
    $lang['usergroup_dup_sprt']         = "Korisnička grupa pod imenom '%s' već postoji.  Molim vas da se vratite i izaberete novo ime.";
    $lang['info_usergroup_manage']      = "Informacije o upravljanju korisničkim grupama";

 //users
    $lang['login_name']                 = "Korisničko ime";
    $lang['full_name']                  = "Puno ime";
    $lang['password']                   = "Lozinka";
    $lang['blank_for_current_password'] = "(Ostavite prazno za trenutnu šifru)";
    $lang['email']                      = "E-pošta";
    $lang['admin']                      = "Administrator";
    $lang['private_user']               = "Privatni korisnik";
    $lang['normal_user']                = "Normalan korisnik";
    $lang['is_admin']                   = "Da li je administrator?";
    $lang['is_guest']                   = "Da li je gost?";
    $lang['guest']                      = "Gost";
    $lang['user_info']                  = "Informacije o korisniku";
    $lang['deleted_users']              = "Izbrisan korisnik";
    $lang['no_deleted_users']           = "Nema izbrisanih korisnika.";
    $lang['revive']                     = "Oživi nalog";
    $lang['permdel']                    = "Trajno brisanje";
    $lang['permdel_javascript_sprt']    = "Ova operacija će trajno izbrisati sve korisničke zapise i zadužene zadatke korisnika pod imenom %s. Da li je ovo ono što želite da uradite?";
    $lang['add_user']                   = "Dodaj korisnika";
    $lang['edit_user']                  = "Menjaj korisnika";
    $lang['no_users']                   = "U sistemu ne postoji nijedan korisnik";
    $lang['users']                      = "Korisnici";
    $lang['existing_users']             = "Postojeći korisnici";
    $lang['private_profile']            = "Ovaj korisnik ima privatni profil koji vi ne možete pogledati.";
    $lang['private_usergroup_profile']  = "(Ovaj korisnik je član privatne korisničke grupe koju vi ne možete pregledati)";
    $lang['email_users']                = "Pošaljite e-poštu korisnicima";
    $lang['select_usergroup']           = "Korisnička grupa je izabrana ispod:";
    $lang['subject']                    = "Tema:";
    $lang['message_sent_maillist']      = "Poruka se u svim slučajevima kopira i na e-poštansku listu.";
    $lang['who_online']                 = "Ko je trenutno na vezi?";
    $lang['edit_details']               = "Menjaj korisničke podatake";
    $lang['show_details']               = "Prikaži korisničke podatke";
    $lang['user_deleted']               = "Ovaj korisnik je obrisan!";
    $lang['no_usergroup']               = "Korisnik nije član nijedne korisničke grupe";
    $lang['not_usergroup']              = "(Nije član nijedne korisničke grupe)";
    $lang['no_password_change']         = "(Vaša postojeća šifra nije promenjana)";
    $lang['last_time_here']             = "Poslednji put je bio ovde:";
    $lang['number_items_created']       = "Broj kreiranih ulaza:";
    $lang['number_projects_owned']      = "Broj vlastitih projekata:";
    $lang['number_tasks_owned']         = "Broj vlastitih zadataka:";
    $lang['number_tasks_completed']     = "Broj završenih zadataka:";
    $lang['number_forum']               = "Broj poruka na forumima:";
    $lang['number_files']               = "Broj dodatih fajlova:";
    $lang['size_all_files']             = "Ukupna veličina vlastitih dodatih fajlova:";
    $lang['owned_tasks']                = "Vlastiti zadaci";
    $lang['invalid_email']              = "Nepostojeća e-poštanska adresa";
    $lang['invalid_email_given_sprt']   = "E-poštanska adresa '%s' je nepostojeća. Molim vas vratite se i pokušajte ponovo.";
    $lang['duplicate_user']             = "Korisnik već postoji";
    $lang['duplicate_change_user_sprt'] = "Korisnik '%s' već postoji. Molim vas vratite se i promenite korisničko ime.";
    $lang['value_missing']              = "Nedostaje unos";
    $lang['field_sprt']                 = "Nedostaje unos u polju '%s'. Molim vas vratites se i popunite ga.";
    $lang['admin_priv']                 = "PRIMEDBA: Dobili ste administratorske privilegije.";
    $lang['manage_users']               = "Upravljanje korisničkim nalozima";
    $lang['users_online']               = "Korisnici na vezi";
    $lang['online']                     = "'Umri muški' korisnici na vezi (bili su na vezi pre manje od 60 minuta)";
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
    $lang['usergroup']                  = "Korisnička grupa";
    $lang['nobody']                     = "Niko";
    $lang['none']                       = "Nijedna";
    $lang['no_group']                   = "Nema grupe";
    $lang['all_groups']                 = "Sve grupe";
    $lang['all_users']                  = "Svi korisnici";
    $lang['all_users_view']             = "Svi korisnici mogu da vide ovaj unos?";
    $lang['group_edit']                 = "Bilo ko u korisničkoj grupi može da menja unos?";
    $lang['project_description']        = "Opis projekta";
    $lang['task_description']           = "Opis zadatka";
    $lang['email_owner']                = "Pošalji e-poštu o promenama vlasniku?";
    $lang['email_new_owner']            = "Pošalji e-poštu o promenama (novom) vlasniku?";
    $lang['email_group']                = "Pošalji e-poštu o promenama korisničkoj grupi?";
    $lang['add_new_project']            = "Dodaj novi projekat";
    $lang['uncategorised']              = "Nekategorizovano";
    $lang['due_sprt']                   = "Još %d dana";
    $lang['tomorrow']                   = "Sutra";
    $lang['due_today']                  = "Za danas";
    $lang['overdue_1']                  = "1 dan prekoračenja";
    $lang['overdue_sprt']               = "%d dana prekoračenja";
    $lang['edit_task']                  = "Menjaj zadatak";
    $lang['edit_project']               = "Menjaj projekat";
    $lang['no_reparent']                = "Ništa (projekat, nije zadatak)";
    $lang['del_javascript_project_sprt']= "Ovo će obrisati projekat %s. Da li ste sigurni?";
    $lang['del_javascript_task_sprt']   = "Ovo će obrisati zadatak %s. Da li ste sigurni?";
    $lang['add_task']                   = "Dodaj zadatak";
    $lang['add_subtask']                = "Dodaj podzadatak";
    $lang['add_project']                = "Dodaj projekat";
    $lang['clone_project']              = "Kloniraj projekat";
    $lang['clone_task']                 = "Kloniraj zadatak";
    $lang['quick_jump']                 = "Brzi skok";
    $lang['no_edit']                    = "Vi niste vlasnik ovog unosa i stoga ga ne možete menjati";
    $lang['uncategorised']              = "Nekategorizovano";
    $lang['admin']                      = "Administrator";
    $lang['global']                     = "Globalne opcije";
    $lang['delete_project']             = "Obriši projekat";
    $lang['delete_task']                = "Obriši zadatak";
    $lang['project_options']            = "Opcije projekta";
    $lang['task_options']               = "Opcije zadatka";
    $lang['javascript_archive_project'] = "Ovo će arhivirati projekat pod imenom %s. Da li ste sigurni?";
    $lang['archive_project']            = "Arhiviraj projekat";
    $lang['task_navigation']            = "Navigacija kroz zadatke";
    $lang['new_task']                   = "Novi zadatak";
    $lang['no_projects']                = "Ne postoji nijedan projekat";
    $lang['show_all_projects']          = "Prikaži sve projekte";
    $lang['show_active_projects']       = "Prikaži samo aktivne projekte";
    $lang['project_hold_sprt']          = "Projekat je na čekanju od dana %s";
    $lang['project_planned']            = "Planirani projekat";
    $lang['percent_sprt']               = "%d%% zadataka je završeno";
    $lang['project_no_deadline']        = "Nije postavljen krajnji rok za ovaj projekat";
    $lang['no_allowed_projects']        = "Nije vam dozvoljeno da pregledate ijedan projekat";
    $lang['projects']                   = "Projekti";
    $lang['percent_project_sprt']       = "Ovaj projekat je završen %d%%";
    $lang['owned_by']                   = "Vlasnik je";
    $lang['created_on']                 = "Kreiran na dan";
    $lang['completed_on']               = "Završen na dan";
    $lang['modified_on']                = "Menjan na dan";
    $lang['project_on_hold']            = "Projekat je na čekanju";
    $lang['project_accessible']         = "(Ovaj projekat je javno dostupan svim korisnicima)";
    $lang['task_accessible']            = "(Ovaj zadatak je javno dostupan svim korisnicima)";
    $lang['project_not_accessible']     = "(Ovaj projekat je dostupan samo članovima korisničke grupe)";
    $lang['task_not_accessible']        = "(Ovaj zadatak je dostupan samo članovima korisničke grupe)";
    $lang['project_not_in_usergroup']   = "Ovaj projekat nije dodeljen nijednoj korisničkog grupi i dostupan je svim korisnicima.";
    $lang['task_not_in_usergroup']      = "Ovaj zadatak nije dodeljen nijednoj korisničkog grupi i dostupan je svim korisnicima.";
    $lang['usergroup_can_edit_project'] = "Ovaj projekat mogu da menjaju i članovi korisničke grupe.";
    $lang['usergroup_can_edit_task']    = "Ovaj zadatak mogu da menjaju i članovi korisničke grupe.";
    $lang['i_take_it']                  = "Preuzeću ga :)";
    $lang['i_finished']                 = "Završio sam!";
    $lang['i_dont_want']                = "Ne želim ga više";
    $lang['take_over_project']          = "Preuzmi projekat";
    $lang['take_over_task']             = "Preuzmi zadatak";
    $lang['task_info']                  = "Informacije o zadatku";
    $lang['project_details']            = "Detalji projekta";
    $lang['todo_list_for']              = "'Uradi' lista za: ";
    $lang['due_in_sprt']                = " (Treba da se uradi u roku od %d dana)";
    $lang['due_tomorrow']               = " (Treba da se uradi za sutra)";
    $lang['no_assigned']                = "Ovaj korisnik nema nedovršenih zadataka.";
    $lang['todo_list']                  = "'Uradi' lista";
    $lang['summary_list']               = "Kratak pregled";
    $lang['task_submit']                = "Slanje zadatka";
    $lang['not_owner']                  = "Pristup odbijen. Ili vi niste vlasnik, ili nemate dovoljna pristupna prava.";
    $lang['missing_values']             = "Niste uneli dovoljan broj informacija u polja; molim vas vratite se nazad i pokušajte ponovo";
    $lang['future']                     = "U budućnosti";
    $lang['flags']                      = "Oznake";
    $lang['owner']                      = "Vlasnik";
    $lang['group']                      = "Kor. grupa";
    $lang['by_usergroup']               = " (po korisničkoj grupi)";
    $lang['by_taskgroup']               = " (po grupi za zadatke)";
    $lang['by_deadline']                = " (po krajnjem roku)";
    $lang['by_status']                  = " (po stanju)";
    $lang['by_owner']                   = " (po vlasniku)";
    $lang['project_cloned']             = "Projekat koji treba klonirati :";
    $lang['task_cloned']                = "Zadatak koji treba klonirati :";
    $lang['note_clone']                 = "Primedba: Zadatak će biti kloniran kao novi projekat";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendar";
    $lang['normal_version']             = "Normalna verzija";
    $lang['print_version']              = "Verzija za štampu";
    $lang['condensed_view']             = "Sabijen pregled";
    $lang['full_view']                  = "Pun pregled";
//**
    $lang['icalendar']                  = "iCalendar";

?>