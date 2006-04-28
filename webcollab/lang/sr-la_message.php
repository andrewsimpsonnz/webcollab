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
define('CHARACTER_SET', "ISO-8859-2" );

//this is the regex for input validation filter used in common.php
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s"; //ISO-8859-x

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ned', 'Pon', 'Uto', 'Sre', '�et', 'Pet', 'Sub' );

//task states

 //priorities
    $task_state['dontdo']               = "Nebitno";
    $task_state['low']                  = "Nizak";
    $task_state['normal']               = "Srednji";
    $task_state['high']                 = "Visok";
    $task_state['yesterday']            = "Ju�e!";
 //status
    $task_state['new']                  = "Novo";
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
    $lang['select_instruct']            = "(Dr�ite \"ctrl\" da biste izabrali vi�e, ili za prazan odabir)";
    $lang['member_groups']              = "Korisnik je �lan dole navedenih grupa (ukoliko je uop�te �lan neke grupe)";
    $lang['login']                      = "Korisni�ko ime";
    $lang['login_action']               = "Prijavi se";
    $lang['login_screen']               = "Prijavljivanje";
    $lang['error']                      = "Gre�ka";
    $lang['no_login']                   = "Pristup je odbijen. Uneli ste neta�no korisni�ko ime ili lozinku";
    $lang['redirect_sprt']              = "Bi�ete automatski vra�eni nazad na prijavljivanje nakon %d sekundi";
    $lang['login_now']                  = "Kliknite ovde da biste se vratili nazad na prijavljivanje";
    $lang['please_login']               = "Molim vas da se prijavite";
    $lang['go']                         = "Kreni!";

//graphic items
    $lang['late_g']                     = "&nbsp;KASNI&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;OSVE�ENO&nbsp;";

//admin config
    $lang['admin_config']               = "Administratorska pode�avanja";
    $lang['email_settings']             = "Pode�avanje zaglavlja e-pisma";
    $lang['admin_email']                = "E-adresa administratora";
    $lang['email_reply']                = "E-adresa za odgovor";
    $lang['email_from']                 = "E-adresa za izvor";
    $lang['mailing_list']               = "Elektronska dopisna lista";
    $lang['default_checkbox']           = "Standardna pode�avanja za projekte/zadatke";
    $lang['allow_globalaccess']         = "Dozvoliti op�ti pristup?";
    $lang['allow_group_edit']           = "Dozvoliti svim korisnicima u korisni�koj grupi da menjaju sadr�aj?";
    $lang['set_email_owner']            = "Uvek obavesti vlasnika e-pismom o promenama?";
    $lang['set_email_group']            = "Uvek obavesti korisni�ku grupu e-pismom o promenama?";
    $lang['project_listing_order']      = "Listanje projekata po kategoriji";
    $lang['task_listing_order']         = "Listanje zadataka po kategoriji";
    $lang['configuration']              = "Pode�avanja";

//archive
    $lang['archived_projects']          = "Arhivirani projekti";

//contacts
    $lang['firstname']                  = "Ime:";
    $lang['lastname']                   = "Prezime:";
    $lang['company']                    = "Firma:";
    $lang['home_phone']                 = "Ku�ni telefon:";
    $lang['mobile']                     = "Mobilni telefon:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Telefon na poslu:";
    $lang['address']                    = "Adresa:";
    $lang['postal']                     = "Po�tanski broj:";
    $lang['city']                       = "Grad:";
    $lang['email_contact']              = "E-adresa:";
    $lang['notes']                      = "Primedbe:";
    $lang['add_contact']                = "Dodaj kontakt";
    $lang['del_contact']                = "Obri�i kontakt";
    $lang['contact_info']               = "Informacije o kontaktu";
    $lang['contacts']                   = "Kontakti";
    $lang['contact_add_info']           = "Ukoliko dodate ime kompanije, onda �e ono biti prikazano umesto imena korisnika.";
    $lang['show_contact']               = "Prika�i kontakte";
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
    $lang['file_email_usergroup']       = "Obavesti korisni�ku grupu e-pismom o novom fajlu?";
    $lang['max_file_sprt']              = "Fajl mora biti manji od %s kilobajta.";
    $lang['file_submit']                = "Slanje fajla";
    $lang['no_upload']                  = "Nijedan fajl nije dodat. Molim vas vratite se nazad, i poku�ajte ponovo.";
    $lang['file_too_big_sprt']          = "Najve�a veli�ina fajla koji se mo�e dodati iznosi %s bajta. Va� fajl je bio prevelik, pa je zbog toga obrisan.";
    $lang['del_file_javascript_sprt']   = "Jeste li sigurni da �elite da obri�ete fajl %s ?";


 //forum
    $lang['orig_message']               = "Prvobitna poruka:";
    $lang['post']                       = "Postavi poruku!";
    $lang['message']                    = "Poruka:";
    $lang['post_reply_sprt']            = "Postavi odgovor na poruku korisnika '%1\$s' �ija je tema '%2\$s'";
    $lang['post_message_sprt']          = "Postavi poruku na: '%s'";
    $lang['forum_email_owner']          = "Po�alji e-pismo sa sadr�ajem poruke vlasniku?";
    $lang['forum_email_usergroup']      = "Po�alji e-pismo sa sadr�ajem poruke korisni�koj grupi?";
    $lang['reply']                      = "Odgovori";
    $lang['new_post']                   = "Novi unos";
    $lang['public_user_forum']          = "Javni korisni�ki forum";
    $lang['private_forum_sprt']         = "Privatni forum za korisni�ku grupu '%s'";
    $lang['forum_submit']               = "Postavljanje poruke na forum";
    $lang['no_message']                 = "Poruka nije uneta! Molim vas da se vratite nazad i poku�ate ponovo.";
    $lang['add_reply']                  = "Dodaj odgovor";
    $lang['last_post_sprt']             = "Vreme poslednjeg unosa: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedavni unosi na forumu";
    $lang['forum_search']               = "Pretraga foruma";
    $lang['no_results']                 = "Nijedan unos nije prona�en za tra�eni izraz '%s'";
    $lang['search_results']             = "Prona�eno je %1\$s unosa za tra�eni izraz '%2\$s'<br />Prikazujem unose %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Izve�taj";
    $lang['warning']                    = "<h1>Izvinite!</h1><p>Trenutno nismo u mogu�nosti da obradimo va� zahtev. Molim vas poku�ajte kasnije.</p>";
    $lang['home_page']                  = "Glavna strana";
    $lang['summary_page']               = "Kratak pregled";
    $lang['log_out']                    = "Odjavi se";
    $lang['main_menu']                  = "Glavni meni";
    $lang['archive']                    = "Arhiva";
    $lang['user_homepage_sprt']         = "Glavna strana korisnika %s";
    $lang['missing_field_javascript']   = "Molim vas unesite podatak u odgovaraju�e nepopunjeno polje.";
    $lang['invalid_date_javascript']    = "Molim vas izaberite ispravan datum.";
    $lang['finish_date_javascript']     = "Zavr�ni datum projekta isti�e pre unetog datuma!";
    $lang['security_manager']           = "Bezbedonosni mehanizam";
    $lang['session_timeout_sprt']       = "Pristup je odbijen. Poslednja akcija se desila pre %1\$d minuta, a obustavno vreme iznosi %2\$d minuta. Molim vas da se <a href=\"%3\$sindex.php\">ponovo prijavite</a>.";
    $lang['access_denied']              = "Pristup je odbijen";
    $lang['private_usergroup_no_access']= "Izvinite. Ova oblast pripada privatnoj korisni�koj grupi, a vi nemate dovoljna prava za pristup.";
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
    $lang['taskgroup_dup_sprt']         = "Radna grupa pod imenom '%s' ve� postoji. Molim vas vratite se nazad i izaberite novo ime.";
    $lang['info_taskgroup_manage']      = "Informacije o upravljanju radnim grupama";

 //usergroups
    $lang['usergroup_name']             = "Ime korisni�ke grupe:";
    $lang['usergroup_description']      = "Kratak opis korisni�ke grupe:";
    $lang['members']                    = "�lanovi:";
    $lang['private_usergroup']          = "Privatna korisni�ka grupa";
    $lang['add_usergroup']              = "Dodaj korisni�ku grupu";
    $lang['add_new_usergroup']          = "Dodavanje nove korisni�ke grupe";
    $lang['edit_usergroup']             = "Menjanje korisni�ke grupe";
    $lang['usergroup_manage']           = "Upravljanje korisni�kim grupama";
    $lang['no_usergroups']              = "Nijedna korisni�ka grupa nije definisana";
    $lang['manage_usergroups']          = "Upravljanje korisni�kim grupama";
    $lang['usergroups']                 = "Korisni�ke grupe";
    $lang['usergroup_dup_sprt']         = "Korisni�ka grupa pod imenom '%s' ve� postoji. Molim vas vratite se nazad, i izaberite novo ime.";
    $lang['info_usergroup_manage']      = "Informacije o upravljanju korisni�kim grupama";

 //users
    $lang['login_name']                 = "Korisni�ko ime";
    $lang['full_name']                  = "Puno ime";
    $lang['password']                   = "Lozinka";
    $lang['blank_for_current_password'] = "(Ovo polje ostavite prazno da bi trenutna lozinka ostala na snazi)";
    $lang['email']                      = "E-adresa";
    $lang['admin']                      = "Administrator";
    $lang['private_user']               = "Privatni korisni�ki nalog";
    $lang['normal_user']                = "Normalan korisni�ki nalog";
    $lang['is_admin']                   = "Da li je administrator?";
    $lang['is_guest']                   = "Da li je gost?";
    $lang['guest']                      = "Korisnik-gost";
    $lang['user_info']                  = "Informacije o korisniku";
    $lang['deleted_users']              = "Obrisani korisni�ki nalozi";
    $lang['no_deleted_users']           = "Nema obrisanih korisni�kih naloga.";
    $lang['revive']                     = "Povrati";
    $lang['permdel']                    = "Trajno brisanje";
    $lang['permdel_javascript_sprt']    = "Ovim �ete trajno obrisati sve korisni�ke podatke i zadatke vezane za korisnika %s. Da li je ovo ono �to zaista �elite?";
    $lang['add_user']                   = "Dodaj korisni�ki nalog";
    $lang['edit_user']                  = "Menjanje pode�avanja korisni�kog naloga";
    $lang['no_users']                   = "Ne postoji nijedan korisni�ki nalog";
    $lang['users']                      = "Korisnici";
    $lang['existing_users']             = "Postoje�i korisnici";
    $lang['private_profile']            = "Ovaj korisnik ima privatni profil koji vi ne mo�ete da pregledate.";
    $lang['private_usergroup_profile']  = "(Ovaj korisnik je �lan privatnih korisni�kih grupa koje vi ne mo�ete pregledati)";
    $lang['email_users']                = "Po�alji e-pismo korisnicima";
    $lang['select_usergroup']           = "Izaberite korisni�ku grupu ispod:";
    $lang['subject']                    = "Tema:";
    $lang['message_sent_maillist']      = "U svim slu�ajevima poruka se tako�e kopira i na e-po�tansku dopisnu listu.";
    $lang['who_online']                 = "Ko je na vezi?";
    $lang['edit_details']               = "Menjanje podataka o korisniku";
    $lang['show_details']               = "Prika�i podatke o korisniku";
    $lang['user_deleted']               = "Ovaj korisni�ki nalog je izbrisan!";
    $lang['no_usergroup']               = "Korisnik nije �lan nijedne korisni�ke grupe";
    $lang['not_usergroup']              = "(Nije �lan nijedne korisni�ke grupe)";
    $lang['no_password_change']         = "(Va�a postoje�a lozinka nije promenjena)";
    $lang['last_time_here']             = "Poslednji put vi�en ovde:";
    $lang['number_items_created']       = "Broj kreiranih unosa:";
    $lang['number_projects_owned']      = "Broj projekata koje poseduje:";
    $lang['number_tasks_owned']         = "Broj zadataka koje poseduje:";
    $lang['number_tasks_completed']     = "Broj zavr�enih zadataka:";
    $lang['number_forum']               = "Broj poruka postavljenih na forum:";
    $lang['number_files']               = "Broj dodatih fajlova:";
    $lang['size_all_files']             = "Ukupna veli�ina fajlova koje poseduje:";
    $lang['owned_tasks']                = "Zadaci koje poseduje";
    $lang['invalid_email']              = "Neispravna e-adresa";
    $lang['invalid_email_given_sprt']   = "E-adresa '%s' je neispravna. Molim vas vratite se nazad i poku�ajte ponovo.";
    $lang['duplicate_user']             = "Korisni�ki nalog ve� postoji";
    $lang['duplicate_change_user_sprt'] = "Korisni�ki nalog '%s've� postoji. Molim vas vratite se nazad i promenite korisni�ko ime.";
    $lang['value_missing']              = "Fali podatak";
    $lang['field_sprt']                 = "Nedostaje podatak za polje '%s'. Molim vas vratite se nazad i popunite ga.";
    $lang['admin_priv']                 = "NAPOMENA: Dobili ste administratorska ovla��enja.";
    $lang['manage_users']               = "Upravljanje korisnicima";
    $lang['users_online']               = "Korisnici na vezi";
    $lang['online']                     = "Skora�nji pristup (na vezi pre manje od 60 minuta)";
    $lang['not_online']                 = "Ostali";
    $lang['user_activity']              = "Aktivnost korisnika";

  //tasks
    $lang['add_new_task']               = "Dodavanje novog zadatka";
    $lang['priority']                   = "Prioritet";
    $lang['parent_task']                = "Nadre�eni zadatak";
    $lang['creation_time']              = "Vreme kreiranja";
    $lang['by_sprt']                    = "%1\$s od strane korisnika %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Naziv projekta";
    $lang['task_name']                  = "Naziv zadatka";
    $lang['deadline']                   = "Krajnji rok";
    $lang['taken_from_parent']          = "(preuzeto od nadre�enog zadatka)";
    $lang['status']                     = "Stanje";
    $lang['task_owner']                 = "Vlasnik zadatka";
    $lang['project_owner']              = "Vlasnik projekta";
    $lang['taskgroup']                  = "Radna grupa";
    $lang['usergroup']                  = "Korisni�ka grupa";
    $lang['nobody']                     = "Niko";
    $lang['none']                       = "Nema";
    $lang['no_group']                   = "Nema grupe";
    $lang['all_groups']                 = "Sve grupe";
    $lang['all_users']                  = "Svi korisnici";
    $lang['all_users_view']             = "Svi korisnici mogu da vide ovaj unos?";
    $lang['group_edit']                 = "Bilo ko u grupi mo�e da menja unos?";
    $lang['project_description']        = "Opis projekta";
    $lang['task_description']           = "Opis zadatka";
    $lang['email_owner']                = "Obavesti e-pismom vlasnika o promenama?";
    $lang['email_new_owner']            = "Obavesti e-pismom (novog) vlasnika o promenama?";
    $lang['email_group']                = "Obavesti e-pismom korisni�ku grupu o promenama?";
    $lang['add_new_project']            = "Dodaj novi projekat";
    $lang['uncategorised']              = "Nekategorisan";
    $lang['due_sprt']                   = "%d dana od danas";
    $lang['tomorrow']                   = "Sutra";
    $lang['due_today']                  = "Za danas";
    $lang['overdue_1']                  = "1 dan prekora�enja";
    $lang['overdue_sprt']               = "%d dana prekora�enja";
    $lang['edit_task']                  = "Menjanje zadatka";
    $lang['edit_project']               = "Menjanje projekta";
    $lang['no_reparent']                = "Ne postoji (projekat najvi�eg nivoa)";
    $lang['del_javascript_project_sprt']= "Ovim �ete obrisati projekat %s. Jeste li sigurni da to �elite?";
    $lang['del_javascript_task_sprt']   = "Ovim �ete obrisati zadatak %s. Jeste li sigurni da to �elite?";
    $lang['add_task']                   = "Dodaj zadatak";
    $lang['add_subtask']                = "Dodaj podzadatak";
    $lang['add_project']                = "Dodaj projekat";
    $lang['clone_project']              = "Kloniraj projekat";
    $lang['clone_task']                 = "Kloniraj zadatak";
    $lang['quick_jump']                 = "Brzi skok";
    $lang['no_edit']                    = "Vi niste vlasnik ovog unosa, te ga ne mo�ete ni menjati";
    $lang['global']                     = "Op�te komande";
    $lang['delete_project']             = "Obri�i projekat";
    $lang['delete_task']                = "Obri�i zadatak";
    $lang['project_options']            = "Upravljanje projektima";
    $lang['task_options']               = "Pode�avanja zadatka";
    $lang['javascript_archive_project'] = "Na ovaj na�in �ete arhivirati projekat %s. Jeste li sigurni da to �elite?";
    $lang['archive_project']            = "Arhiviraj projekat";
    $lang['task_navigation']            = "Polo�aj zadatka";
    $lang['new_task']                   = "Novi zadatak";
    $lang['no_projects']                = "Ne postoji nijedan projekat";
    $lang['show_all_projects']          = "Prika�i sve projekte";
    $lang['show_active_projects']       = "Prika�i samo aktivne projekte";
    $lang['project_hold_sprt']          = "Projekat je na �ekanju od datuma %s";
    $lang['project_planned']            = "Planiran projekat";
    $lang['percent_sprt']               = "%d%% zadataka je zavr�eno";
    $lang['project_no_deadline']        = "Ne postoji krajnji rok za ovaj projekat";
    $lang['no_allowed_projects']        = "Ne postoji nijedan projekat koji vi mo�ete da pregledate";
    $lang['projects']                   = "Projekti";
    $lang['percent_project_sprt']       = "Projekat je zavr�en %d%%";
    $lang['owned_by']                   = "Vlasnik";
    $lang['created_on']                 = "Kreiran dana";
    $lang['completed_on']               = "Zavr�en dana";
    $lang['modified_on']                = "Promenjen dana";
    $lang['project_on_hold']            = "Projekat je na �ekanju";
    $lang['project_accessible']         = "(Ovaj projekat je javno dostupan svim korisnicima)";
    $lang['task_accessible']            = "(Ovaj zadatak je javno dostupan svim korisnicima)";
    $lang['project_not_accessible']     = "(Ovom projektu mogu pristupiti samo �lanovi odgovaraju�e korisni�ke grupe)";
    $lang['task_not_accessible']        = "(Ovom zadatku mogu pristupiti samo �lanovi odgovaraju�e korisni�ke grupe)";
    $lang['project_not_in_usergroup']   = "Ovaj projekat ne pripada nijednoj korisni�koj grupi i mogu mu pristupiti svi korisnici.";
    $lang['task_not_in_usergroup']      = "Ovaj zadatak ne pripada nijednoj korisni�koj grupi i mogu mu pristupiti svi korisnici.";
    $lang['usergroup_can_edit_project'] = "Ovaj projekat mogu menjati i �lanovi odgovaraju�e korisni�ke grupe.";
    $lang['usergroup_can_edit_task']    = "Ovaj zadatak mogu menjati i �lanovi odgovaraju�e korisni�ke grupe.";
    $lang['i_take_it']                  = "Preuze�u ga :)";
    $lang['i_finished']                 = "Zavr�io sam ga!";
    $lang['i_dont_want']                = "Ne �elim ga vi�e :(";
    $lang['take_over_project']          = "Preuzmi projekat";
    $lang['take_over_task']             = "Preuzmi zadatak";
    $lang['task_info']                  = "Informacije o zadatku";
    $lang['project_details']            = "Detalji projekta";
    $lang['todo_list_for']              = "Zadu�enja za: ";
    $lang['due_in_sprt']                = " (zavr�iti u roku od %d dana)";
    $lang['due_tomorrow']               = " (zavr�iti do sutra)";
    $lang['no_assigned']                = "Ovaj korisnik nema nezavr�enih zadataka.";
    $lang['todo_list']                  = "Zadu�enja";
    $lang['summary_list']               = "Kratak pregled";
    $lang['task_submit']                = "Slanje zadatka";
    $lang['not_owner']                  = "Pristup je odbijen. Vi ili niste vlasnik, ili nemate dovoljna prava za pristup.";
    $lang['missing_values']             = "Niste uneli dovoljan broj podataka. Molim vas vratite se nazad i poku�ajte ponovo.";
    $lang['future']                     = "U budu�nosti";
    $lang['flags']                      = "Zastavice";
    $lang['owner']                      = "Vlasnik";
    $lang['group']                      = "Grupa";
    $lang['by_usergroup']               = " (prema korisni�koj grupi)";
    $lang['by_taskgroup']               = " (prema radnoj grupi)";
    $lang['by_deadline']                = " (prema krajnjem roku)";
    $lang['by_status']                  = " (prema stanju)";
    $lang['by_owner']                   = " (prema vlasniku)";
    $lang['project_cloned']             = "Projekat koji treba klonirati:";
    $lang['task_cloned']                = "Zadatak koji treba klonirati:";
    $lang['note_clone']                 = "Napomena: Zadatak �e biti kloniran kao novi projekat";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendar";
    $lang['normal_version']             = "Normalna verzija";
    $lang['print_version']              = "Verzija za �tampu";
    $lang['condensed_view']             = "Sabijen prikaz";
    $lang['full_view']                  = "Pun prikaz";
    $lang['icalendar']                  = "\"iCalendar\" fajl";
?>