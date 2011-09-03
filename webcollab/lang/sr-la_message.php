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

  Language files for 'sr-la' (Serbian Latin)

  Maintainer: Branko Majic <branko.majic@gmail.com>

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "sr" );

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ned', 'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub' );

//task states

 //priorities
    $task_state['dontdo']               = "Nebitno";
    $task_state['low']                  = "Nizak";
    $task_state['normal']               = "Srednji";
    $task_state['high']                 = "Visok";
    $task_state['yesterday']            = "Juče!";
 //status
    $task_state['new']                  = "Novo";
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
    $lang['select_instruct']            = "(Držite \"ctrl\" da biste izabrali više, ili za prazan odabir)";
    $lang['member_groups']              = "Korisnik je član dole navedenih grupa (ukoliko je uopšte član neke grupe)";
    $lang['login']                      = "Korisničko ime";
    $lang['login_action']               = "Prijavi se";
    $lang['login_screen']               = "Prijavljivanje";
    $lang['error']                      = "Greška";
    $lang['no_login']                   = "Pristup je odbijen. Uneli ste netačno korisničko ime ili lozinku";
    $lang['redirect_sprt']              = "Bićete automatski vraćeni nazad na prijavljivanje nakon %d sekundi";
    $lang['login_now']                  = "Kliknite ovde da biste se vratili nazad na prijavljivanje";
    $lang['please_login']               = "Molim vas da se prijavite";
    $lang['go']                         = "Kreni!";

//graphic items
    $lang['late_g']                     = "&nbsp;KASNI&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;OSVEŽENO&nbsp;";

//admin config
    $lang['admin_config']               = "Administratorska podešavanja";
    $lang['email_settings']             = "Podešavanje zaglavlja e-pisma";
    $lang['admin_email']                = "E-adresa administratora";
    $lang['email_reply']                = "E-adresa za odgovor";
    $lang['email_from']                 = "E-adresa za izvor";
    $lang['mailing_list']               = "Elektronska dopisna lista";
    $lang['default_checkbox']           = "Standardna podešavanja za projekte/zadatke";
    $lang['allow_globalaccess']         = "Dozvoliti opšti pristup?";
    $lang['allow_group_edit']           = "Dozvoliti svim korisnicima u korisničkoj grupi da menjaju sadržaj?";
    $lang['set_email_owner']            = "Uvek obavesti vlasnika e-pismom o promenama?";
    $lang['set_email_group']            = "Uvek obavesti korisničku grupu e-pismom o promenama?";
    $lang['project_listing_order']      = "Listanje projekata po kategoriji";
    $lang['task_listing_order']         = "Listanje zadataka po kategoriji";
    $lang['configuration']              = "Podešavanja";

//archive
    $lang['archived_projects']          = "Arhivirani projekti";

//contacts
    $lang['firstname']                  = "Ime:";
    $lang['lastname']                   = "Prezime:";
    $lang['company']                    = "Firma:";
    $lang['home_phone']                 = "Kućni telefon:";
    $lang['mobile']                     = "Mobilni telefon:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Telefon na poslu:";
    $lang['address']                    = "Adresa:";
    $lang['postal']                     = "Poštanski broj:";
    $lang['city']                       = "Grad:";
    $lang['email_contact']              = "E-adresa:";
    $lang['notes']                      = "Primedbe:";
    $lang['add_contact']                = "Dodaj kontakt";
    $lang['del_contact']                = "Obriši kontakt";
    $lang['contact_info']               = "Informacije o kontaktu";
    $lang['contacts']                   = "Kontakti";
    $lang['contact_add_info']           = "Ukoliko dodate ime kompanije, onda će ono biti prikazano umesto imena korisnika.";
    $lang['show_contact']               = "Prikaži kontakte";
    $lang['edit_contact']               = "Menjaj kontakte";
    $lang['contact_submit']             = "Slanje kontakta";
    $lang['contact_warn']               = "Nije uneto dovoljno podataka da bi se dodao kontakt. Molim vas da se vratite nazad, i dodate makar ime i prezime.";

 //files
    $lang['manage_files']               = "Upravljanje fajlovima";
    $lang['no_files']                   = "Nema fajlova kojima bi se upravljalo";
    $lang['no_file_uploads']            = "Konfiguracija servera za ovaj sajt ne dozvoljava dodavanje fajlova.";
    $lang['file']                       = "Fajl:";
    $lang['uploader']                   = "Vlasnik:";
    $lang['files_assoc_project']        = "Fajlovi u vezi sa projektom";
    $lang['files_assoc_task']           = "Fajlovi u vezi sa zadatkom";
    $lang['file_admin']                 = "Administriranje fajlova";
    $lang['add_file']                   = "Dodaj fajl";
    $lang['files']                      = "Fajlovi";
    $lang['file_choose']                = "Fajl koji treba dodati:";
    $lang['upload']                     = "Dodaj";
    $lang['file_email_owner']           = "Obavesti vlasnika e-pismom o novom fajlu?";
    $lang['file_email_usergroup']       = "Obavesti korisničku grupu e-pismom o novom fajlu?";
    $lang['max_file_sprt']              = "Fajl mora biti manji od %s kilobajta.";
    $lang['file_submit']                = "Slanje fajla";
    $lang['no_upload']                  = "Nijedan fajl nije dodat. Molim vas vratite se nazad, i pokušajte ponovo.";
    $lang['file_too_big_sprt']          = "Najveća veličina fajla koji se može dodati iznosi %s bajta. Vaš fajl je bio prevelik, pa je zbog toga obrisan.";
    $lang['del_file_javascript_sprt']   = "Jeste li sigurni da želite da obrišete fajl %s ?";


 //forum
    $lang['orig_message']               = "Prvobitna poruka:";
    $lang['post']                       = "Postavi poruku!";
    $lang['message']                    = "Poruka:";
    $lang['post_reply_sprt']            = "Postavi odgovor na poruku korisnika '%1\$s' čija je tema '%2\$s'";
    $lang['post_message_sprt']          = "Postavi poruku na: '%s'";
    $lang['forum_email_owner']          = "Pošalji e-pismo sa sadržajem poruke vlasniku?";
    $lang['forum_email_usergroup']      = "Pošalji e-pismo sa sadržajem poruke korisničkoj grupi?";
    $lang['reply']                      = "Odgovori";
    $lang['new_post']                   = "Novi unos";
    $lang['public_user_forum']          = "Javni korisnički forum";
    $lang['private_forum_sprt']         = "Privatni forum za korisničku grupu '%s'";
    $lang['forum_submit']               = "Postavljanje poruke na forum";
    $lang['no_message']                 = "Poruka nije uneta! Molim vas da se vratite nazad i pokušate ponovo.";
    $lang['add_reply']                  = "Dodaj odgovor";
    $lang['last_post_sprt']             = "Vreme poslednjeg unosa: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedavni unosi na forumu";
    $lang['forum_search']               = "Pretraga foruma";
    $lang['no_results']                 = "Nijedan unos nije pronađen za traženi izraz '%s'";
    $lang['search_results']             = "Pronađeno je %1\$s unosa za traženi izraz '%2\$s'<br />Prikazujem unose %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Izveštaj";
    $lang['warning']                    = "<h1>Izvinite!</h1><p>Trenutno nismo u mogućnosti da obradimo vaš zahtev. Molim vas pokušajte kasnije.</p>";
    $lang['home_page']                  = "Glavna strana";
    $lang['summary_page']               = "Kratak pregled";
    $lang['log_out']                    = "Odjavi se";
    $lang['main_menu']                  = "Glavni meni";
    $lang['archive']                    = "Arhiva";
    $lang['user_homepage_sprt']         = "Glavna strana korisnika %s";
    $lang['missing_field_javascript']   = "Molim vas unesite podatak u odgovarajuće nepopunjeno polje.";
    $lang['invalid_date_javascript']    = "Molim vas izaberite ispravan datum.";
    $lang['finish_date_javascript']     = "Završni datum projekta ističe pre unetog datuma!";
    $lang['security_manager']           = "Bezbedonosni mehanizam";
    $lang['session_timeout_sprt']       = "Pristup je odbijen. Poslednja akcija se desila pre %1\$d minuta, a obustavno vreme iznosi %2\$d minuta. Molim vas da se <a href=\"%3\$sindex.php\">ponovo prijavite</a>.";
    $lang['access_denied']              = "Pristup je odbijen";
    $lang['private_usergroup_no_access']= "Izvinite. Ova oblast pripada privatnoj korisničkoj grupi, a vi nemate dovoljna prava za pristup.";
    $lang['invalid_date']               = "Neispravan datum";
    $lang['invalid_date_sprt']          = "Datum %s nije pravilan kalendarski datum (proverite broj dana u mesecu).<br /> Molim vas vratite se nazad i unesite ispravan datum.";


 //taskgroups
    $lang['taskgroup_name']             = "Ime radne grupe:";
    $lang['taskgroup_description']      = "Kratak opis radne grupe:";
    $lang['add_taskgroup']              = "Dodaj radnu grupu";
    $lang['add_new_taskgroup']          = "Dodavanje nove radne grupe";
    $lang['edit_taskgroup']             = "Menjanje radne grupe";
    $lang['taskgroup_manage']           = "Upravljanje radnim grupama";
    $lang['no_taskgroups']              = "Nijedna radna grupa nije definisana";
    $lang['manage_taskgroups']          = "Upravljanje radnim grupama";
    $lang['taskgroups']                 = "Radne grupe";
    $lang['taskgroup_dup_sprt']         = "Radna grupa pod imenom '%s' već postoji. Molim vas vratite se nazad i izaberite novo ime.";
    $lang['info_taskgroup_manage']      = "Informacije o upravljanju radnim grupama";

 //usergroups
    $lang['usergroup_name']             = "Ime korisničke grupe:";
    $lang['usergroup_description']      = "Kratak opis korisničke grupe:";
    $lang['members']                    = "Članovi:";
    $lang['private_usergroup']          = "Privatna korisnička grupa";
    $lang['add_usergroup']              = "Dodaj korisničku grupu";
    $lang['add_new_usergroup']          = "Dodavanje nove korisničke grupe";
    $lang['edit_usergroup']             = "Menjanje korisničke grupe";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Upravljanje korisničkim grupama";
    $lang['no_usergroups']              = "Nijedna korisnička grupa nije definisana";
    $lang['manage_usergroups']          = "Upravljanje korisničkim grupama";
    $lang['usergroups']                 = "Korisničke grupe";
    $lang['usergroup_dup_sprt']         = "Korisnička grupa pod imenom '%s' već postoji. Molim vas vratite se nazad, i izaberite novo ime.";
    $lang['info_usergroup_manage']      = "Informacije o upravljanju korisničkim grupama";

 //users
    $lang['login_name']                 = "Korisničko ime";
    $lang['full_name']                  = "Puno ime";
    $lang['password']                   = "Lozinka";
    $lang['blank_for_current_password'] = "(Ovo polje ostavite prazno da bi trenutna lozinka ostala na snazi)";
    $lang['email']                      = "E-adresa";
    $lang['admin']                      = "Administrator";
    $lang['private_user']               = "Privatni korisnički nalog";
    $lang['normal_user']                = "Normalan korisnički nalog";
    $lang['is_admin']                   = "Da li je administrator?";
    $lang['is_guest']                   = "Da li je gost?";
    $lang['guest']                      = "Korisnik-gost";
    $lang['user_info']                  = "Informacije o korisniku";
    $lang['deleted_users']              = "Obrisani korisnički nalozi";
    $lang['no_deleted_users']           = "Nema obrisanih korisničkih naloga.";
    $lang['revive']                     = "Povrati";
    $lang['permdel']                    = "Trajno brisanje";
    $lang['permdel_javascript_sprt']    = "Ovim ćete trajno obrisati sve korisničke podatke i zadatke vezane za korisnika %s. Da li je ovo ono što zaista želite?";
    $lang['add_user']                   = "Dodaj korisnički nalog";
    $lang['edit_user']                  = "Menjanje podešavanja korisničkog naloga";
    $lang['no_users']                   = "Ne postoji nijedan korisnički nalog";
    $lang['users']                      = "Korisnici";
    $lang['existing_users']             = "Postojeći korisnici";
    $lang['private_profile']            = "Ovaj korisnik ima privatni profil koji vi ne možete da pregledate.";
    $lang['private_usergroup_profile']  = "(Ovaj korisnik je član privatnih korisničkih grupa koje vi ne možete pregledati)";
    $lang['email_users']                = "Pošalji e-pismo korisnicima";
    $lang['select_usergroup']           = "Izaberite korisničku grupu ispod:";
    $lang['subject']                    = "Tema:";
    $lang['message_sent_maillist']      = "U svim slučajevima poruka se takođe kopira i na e-poštansku dopisnu listu.";
    $lang['who_online']                 = "Ko je na vezi?";
    $lang['edit_details']               = "Menjanje podataka o korisniku";
    $lang['show_details']               = "Prikaži podatke o korisniku";
    $lang['user_deleted']               = "Ovaj korisnički nalog je izbrisan!";
    $lang['no_usergroup']               = "Korisnik nije član nijedne korisničke grupe";
    $lang['not_usergroup']              = "(Nije član nijedne korisničke grupe)";
    $lang['no_password_change']         = "(Vaša postojeća lozinka nije promenjena)";
    $lang['last_time_here']             = "Poslednji put viđen ovde:";
    $lang['number_items_created']       = "Broj kreiranih unosa:";
    $lang['number_projects_owned']      = "Broj projekata koje poseduje:";
    $lang['number_tasks_owned']         = "Broj zadataka koje poseduje:";
    $lang['number_tasks_completed']     = "Broj završenih zadataka:";
    $lang['number_forum']               = "Broj poruka postavljenih na forum:";
    $lang['number_files']               = "Broj dodatih fajlova:";
    $lang['size_all_files']             = "Ukupna veličina fajlova koje poseduje:";
    $lang['owned_tasks']                = "Zadaci koje poseduje";
    $lang['invalid_email']              = "Neispravna e-adresa";
    $lang['invalid_email_given_sprt']   = "E-adresa '%s' je neispravna. Molim vas vratite se nazad i pokušajte ponovo.";
    $lang['duplicate_user']             = "Korisnički nalog već postoji";
    $lang['duplicate_change_user_sprt'] = "Korisnički nalog '%s'već postoji. Molim vas vratite se nazad i promenite korisničko ime.";
    $lang['value_missing']              = "Fali podatak";
    $lang['field_sprt']                 = "Nedostaje podatak za polje '%s'. Molim vas vratite se nazad i popunite ga.";
    $lang['admin_priv']                 = "NAPOMENA: Dobili ste administratorska ovlašćenja.";
    $lang['manage_users']               = "Upravljanje korisnicima";
    $lang['users_online']               = "Korisnici na vezi";
    $lang['online']                     = "Skorašnji pristup (na vezi pre manje od 60 minuta)";
    $lang['not_online']                 = "Ostali";
    $lang['user_activity']              = "Aktivnost korisnika";

  //tasks
    $lang['add_new_task']               = "Dodavanje novog zadatka";
    $lang['priority']                   = "Prioritet";
    $lang['parent_task']                = "Nadređeni zadatak";
    $lang['creation_time']              = "Vreme kreiranja";
    $lang['by_sprt']                    = "%1\$s od strane korisnika %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Naziv projekta";
    $lang['task_name']                  = "Naziv zadatka";
    $lang['deadline']                   = "Krajnji rok";
    $lang['taken_from_parent']          = "(preuzeto od nadređenog zadatka)";
    $lang['status']                     = "Stanje";
    $lang['task_owner']                 = "Vlasnik zadatka";
    $lang['project_owner']              = "Vlasnik projekta";
    $lang['taskgroup']                  = "Radna grupa";
    $lang['usergroup']                  = "Korisnička grupa";
    $lang['nobody']                     = "Niko";
    $lang['none']                       = "Nema";
    $lang['no_group']                   = "Nema grupe";
    $lang['all_groups']                 = "Sve grupe";
    $lang['all_users']                  = "Svi korisnici";
    $lang['all_users_view']             = "Svi korisnici mogu da vide ovaj unos?";
    $lang['group_edit']                 = "Bilo ko u grupi može da menja unos?";
    $lang['project_description']        = "Opis projekta";
    $lang['task_description']           = "Opis zadatka";
    $lang['email_owner']                = "Obavesti e-pismom vlasnika o promenama?";
    $lang['email_new_owner']            = "Obavesti e-pismom (novog) vlasnika o promenama?";
    $lang['email_group']                = "Obavesti e-pismom korisničku grupu o promenama?";
    $lang['add_new_project']            = "Dodaj novi projekat";
    $lang['uncategorised']              = "Nekategorisan";
    $lang['due_sprt']                   = "%d dana od danas";
    $lang['tomorrow']                   = "Sutra";
    $lang['due_today']                  = "Za danas";
    $lang['overdue_1']                  = "1 dan prekoračenja";
    $lang['overdue_sprt']               = "%d dana prekoračenja";
    $lang['edit_task']                  = "Menjanje zadatka";
    $lang['edit_project']               = "Menjanje projekta";
    $lang['no_reparent']                = "Ne postoji (projekat najvišeg nivoa)";
    $lang['del_javascript_project_sprt']= "Ovim ćete obrisati projekat %s. Jeste li sigurni da to želite?";
    $lang['del_javascript_task_sprt']   = "Ovim ćete obrisati zadatak %s. Jeste li sigurni da to želite?";
    $lang['add_task']                   = "Dodaj zadatak";
    $lang['add_subtask']                = "Dodaj podzadatak";
    $lang['add_project']                = "Dodaj projekat";
    $lang['clone_project']              = "Kloniraj projekat";
    $lang['clone_task']                 = "Kloniraj zadatak";
    $lang['quick_jump']                 = "Brzi skok";
    $lang['no_edit']                    = "Vi niste vlasnik ovog unosa, te ga ne možete ni menjati";
    $lang['global']                     = "Opšte komande";
    $lang['delete_project']             = "Obriši projekat";
    $lang['delete_task']                = "Obriši zadatak";
    $lang['project_options']            = "Upravljanje projektima";
    $lang['task_options']               = "Podešavanja zadatka";
    $lang['javascript_archive_project'] = "Na ovaj način ćete arhivirati projekat %s. Jeste li sigurni da to želite?";
    $lang['archive_project']            = "Arhiviraj projekat";
    $lang['task_navigation']            = "Položaj zadatka";
    $lang['new_task']                   = "Novi zadatak";
    $lang['no_projects']                = "Ne postoji nijedan projekat";
    $lang['show_all_projects']          = "Prikaži sve projekte";
    $lang['show_active_projects']       = "Prikaži samo aktivne projekte";
    $lang['project_hold_sprt']          = "Projekat je na čekanju od datuma %s";
    $lang['project_planned']            = "Planiran projekat";
    $lang['percent_sprt']               = "%d%% zadataka je završeno";
    $lang['project_no_deadline']        = "Ne postoji krajnji rok za ovaj projekat";
    $lang['no_allowed_projects']        = "Ne postoji nijedan projekat koji vi možete da pregledate";
    $lang['projects']                   = "Projekti";
    $lang['percent_project_sprt']       = "Projekat je završen %d%%";
    $lang['owned_by']                   = "Vlasnik";
    $lang['created_on']                 = "Kreiran dana";
    $lang['completed_on']               = "Završen dana";
    $lang['modified_on']                = "Promenjen dana";
    $lang['project_on_hold']            = "Projekat je na čekanju";
    $lang['project_accessible']         = "(Ovaj projekat je javno dostupan svim korisnicima)";
    $lang['task_accessible']            = "(Ovaj zadatak je javno dostupan svim korisnicima)";
    $lang['project_not_accessible']     = "(Ovom projektu mogu pristupiti samo članovi odgovarajuće korisničke grupe)";
    $lang['task_not_accessible']        = "(Ovom zadatku mogu pristupiti samo članovi odgovarajuće korisničke grupe)";
    $lang['project_not_in_usergroup']   = "Ovaj projekat ne pripada nijednoj korisničkoj grupi i mogu mu pristupiti svi korisnici.";
    $lang['task_not_in_usergroup']      = "Ovaj zadatak ne pripada nijednoj korisničkoj grupi i mogu mu pristupiti svi korisnici.";
    $lang['usergroup_can_edit_project'] = "Ovaj projekat mogu menjati i članovi odgovarajuće korisničke grupe.";
    $lang['usergroup_can_edit_task']    = "Ovaj zadatak mogu menjati i članovi odgovarajuće korisničke grupe.";
    $lang['i_take_it']                  = "Preuzeću ga :)";
    $lang['i_finished']                 = "Završio sam ga!";
    $lang['i_dont_want']                = "Ne želim ga više :(";
    $lang['take_over_project']          = "Preuzmi projekat";
    $lang['take_over_task']             = "Preuzmi zadatak";
    $lang['task_info']                  = "Informacije o zadatku";
    $lang['project_details']            = "Detalji projekta";
    $lang['todo_list_for']              = "Zaduženja za: ";
    $lang['due_in_sprt']                = " (završiti u roku od %d dana)";
    $lang['due_tomorrow']               = " (završiti do sutra)";
    $lang['no_assigned']                = "Ovaj korisnik nema nezavršenih zadataka.";
    $lang['todo_list']                  = "Zaduženja";
    $lang['summary_list']               = "Kratak pregled";
    $lang['task_submit']                = "Slanje zadatka";
    $lang['not_owner']                  = "Pristup je odbijen. Vi ili niste vlasnik, ili nemate dovoljna prava za pristup.";
    $lang['missing_values']             = "Niste uneli dovoljan broj podataka. Molim vas vratite se nazad i pokušajte ponovo.";
    $lang['future']                     = "U budućnosti";
    $lang['flags']                      = "Zastavice";
    $lang['owner']                      = "Vlasnik";
    $lang['group']                      = "Grupa";
    $lang['by_usergroup']               = " (prema korisničkoj grupi)";
    $lang['by_taskgroup']               = " (prema radnoj grupi)";
    $lang['by_deadline']                = " (prema krajnjem roku)";
    $lang['by_status']                  = " (prema stanju)";
    $lang['by_owner']                   = " (prema vlasniku)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Projekat koji treba klonirati:";
    $lang['task_cloned']                = "Zadatak koji treba klonirati:";
    $lang['note_clone']                 = "Napomena: Zadatak će biti kloniran kao novi projekat";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendar";
    $lang['normal_version']             = "Normalna verzija";
    $lang['print_version']              = "Verzija za štampu";
    $lang['condensed_view']             = "Sabijen prikaz";
    $lang['full_view']                  = "Pun prikaz";
    $lang['icalendar']                  = "\"iCalendar\" fajl";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>