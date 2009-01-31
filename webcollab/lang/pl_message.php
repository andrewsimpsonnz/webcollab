<?php
/*
  $Id: en_message.php 1552 2006-04-21 21:04:14Z andrewsimpson $

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

  Language files for 'pl' (Polish)

  Translator: Konrad Komada <konrad at komada.org>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-2" );

//xml language identifier
define('XML_LANG', "pl" );

//this is the regex for input validation filter used in common.php
define('VALIDATION_REGEX', '/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/' );

//dates
$month_array = array (NULL, 'Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Pa¼', 'Lis', 'Gru' );
$week_array = array('Nie', 'Pon', 'Wto', '¦ro', 'Czw', 'Pi±', 'Sob' );

//task states

 //priorities
    $task_state['dontdo']               = "Nie robiæ";
    $task_state['low']                  = "Niski";
    $task_state['normal']               = "Normalny";
    $task_state['high']                 = "Wysoki";
    $task_state['yesterday']            = "Strategiczny";
 //status
    $task_state['new']                  = "Nowy";
    $task_state['planned']              = "Planowany (nie aktywny)";
    $task_state['active']               = "Aktywny (praca trwa)";
    $task_state['cantcomplete']         = "Zatrzymany";
    $task_state['completed']            = "Zakoñczony";
    $task_state['done']                 = "Gotowy";
    $task_state['task_planned']         = " Planowane";
    $task_state['task_active']          = " Aktywne";
 //project states
    $task_state['planned_project']      = "Planowany (nie aktywny)";
    $task_state['no_deadline_project']  = "Brak terminów koñcowych";
    $task_state['active_project']       = "Aktywny projekt";

//common items
    $lang['description']                = "Opis";
    $lang['name']                       = "Nazwa";
    $lang['add']                        = "Dodaj";
    $lang['update']                     = "Aktualizuj";
    $lang['submit_changes']             = "Zatwierd¼ zmiany";
    $lang['continue']                   = "Kontynuacja";
    $lang['manage']                     = "Zarz±dzanie";
    $lang['edit']                       = "Edytuj";
    $lang['delete']                     = "Usuñ";
    $lang['del']                        = "Kasuj";
    $lang['confirm_del_javascript']     = " Potwierd¼ kasowanie!";
    $lang['yes']                        = "Tak";
    $lang['no']                         = "Nie";
    $lang['action']                     = "Akcja";
    $lang['task']                       = "Zadanie";
    $lang['tasks']                      = "Zadania";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informacja";
    $lang['bytes']                      = " bajtów";
    $lang['select_instruct']            = "(U¿yj ctrl do dalszego wyselekcjonowania; lub ¿eby odznaczyæ selekcjê)";
    $lang['member_groups']              = "U¿ytkownik jest cz³onkiem pod¶wietlonej grupy poni¿ej (je¶li istnieje)";
    $lang['login']                      = "Login";
    $lang['login_action']               = "Zaloguj";
    $lang['login_screen']               = "Login";
    $lang['error']                      = "B³±d";
    $lang['no_login']                   = "Brak dostêpu; nieprawid³owy login lub has³o";
    $lang['redirect_sprt']              = "Automatycznie powrócisz do ekranu logowania za %d sekund";
    $lang['login_now']                  = "Proszê naci¶nij to aby powróciæ do logowania";
    $lang['please_login']               = "Zaloguj siê";
    $lang['go']                         = "Id¼!";

//graphic items
    $lang['late_g']                     = "&nbsp;OPÓ¬NIONE&nbsp;";
    $lang['new_g']                      = "&nbsp;NOWE&nbsp;";
    $lang['updated_g']                  = "&nbsp;ZAKTUALIZOWANE&nbsp;";

//admin config
    $lang['admin_config']               = "Konfiguracja admina";
    $lang['email_settings']             = "Ustawienia nag³ówka emaila";
    $lang['admin_email']                = "Email admina";
    $lang['email_reply']                = "Email 'Odpowiedz'";
    $lang['email_from']                 = "Email 'od'";
    $lang['mailing_list']               = "Lista mailingowa";
    $lang['default_checkbox']           = "Domy¶lne ustawienie dla projektu/zadania";
    $lang['allow_globalaccess']         = "Zezwól na globalny dostêp?";
    $lang['allow_group_edit']           = "Zezwoliæ wszystkim z grupy na edycjê?";
    $lang['set_email_owner']            = "Zawsze wysy³aæ emaila ze zmianami do w³a¶ciciela?";
    $lang['set_email_group']            = "Zawsze wysy³aæ emaila ze zmianami do grupy u¿ytkowników?";
    $lang['project_listing_order']      = "Kolejno¶æ wy¶wietlania projektów";
    $lang['task_listing_order']         = "Kolejno¶æ wy¶wietlania zadañ";
    $lang['configuration']              = "Konfiguracja";

//archive
    $lang['archived_projects']          = "Projekty archiwalne";

//contacts
    $lang['firstname']                  = "Imiê:";
    $lang['lastname']                   = "Nazwisko:";
    $lang['company']                    = "Firma:";
    $lang['home_phone']                 = "Telefon domowy:";
    $lang['mobile']                     = "Komórka:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Telefon s³u¿bowy:";
    $lang['address']                    = "Adres:";
    $lang['postal']                     = "Kod pocztowy:";
    $lang['city']                       = "Miasto:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Uwagi:";
    $lang['add_contact']                = "Dodaj kontakt";
    $lang['del_contact']                = "Usuñ kontakt";
    $lang['contact_info']               = "Informacje o kontakcie";
    $lang['contacts']                   = "Kontakty";
    $lang['contact_add_info']           = "Je¶li dodasz nazwê przedsiêbiorstwa to bêdzie ona wy¶wietlona zamiast personaliów u¿ytkownika.";
    $lang['show_contact']               = "Poka¿ kontakty";
    $lang['edit_contact']               = "Edytuj kontakty";
    $lang['contact_submit']             = "Zaakceptuj kontakt";
    $lang['contact_warn']               = "Nie wprowadzi³e¶ wszystkich warto¶ci w pola kontaktu; proszê cofnij siê i dodaj minimum imiê i nazwisko";

 //files
    $lang['manage_files']               = "Zarz±dzaj plikami";
    $lang['no_files']                   = "Brak plików do zarz±dzania";
    $lang['no_file_uploads']            = "Konfiguracja serwera nie zezwala na taki upload";
    $lang['file']                       = "Plik:";
    $lang['uploader']                   = "Uploader:";
    $lang['files_assoc_project']        = "Pliki powi±zane z tym projektem";
    $lang['files_assoc_task']           = "Pliki powi±zane z tym zadaniem";
    $lang['file_admin']                 = "Administrator plików";
    $lang['add_file']                   = "Dodaj plik";
    $lang['files']                      = "Pliki";
    $lang['file_choose']                = "Plik do uploadowania:";
    $lang['upload']                     = "Uploaduj";
    $lang['file_email_owner']           = "Potwierdzenie emailowe nowego w³a¶ciciela plików?";
    $lang['file_email_usergroup']       = "Potwierdzenie emailowe nowego w³a¶ciciela grupy u¿ytkowników?";
    $lang['max_file_sprt']              = "Plik do uploadowania musi byæ mniejszy ni¿ %s kb.";
    $lang['file_submit']                = "Zatwierd¼ plik";
    $lang['no_upload']                  = "¯aden plik nie zosta³ uploadowany. Proszê wróæ i spróbuj ponownie.";
    $lang['file_too_big_sprt']          = "Maksymalny upload wynosi %s bajtów. Twój upload by³ za du¿y dlatego zosta³ usuniêty.";
    $lang['del_file_javascript_sprt']   = "Czy jeste¶ pewien ¿e chcesz skasowaæ %s ?";


 //forum
    $lang['orig_message']               = "Oryginalna wiadomo¶æ:";
    $lang['post']                       = "Publikuj!";
    $lang['message']                    = "Wiadomo¶æ:";
    $lang['post_reply_sprt']            = "Umie¶æ odpowied¼ na wiadomo¶æ od '%1\$s' dotycz±c± '%2\$s'";
    $lang['post_message_sprt']          = "Odpisz do: '%s'";
    $lang['forum_email_owner']          = "Wy¶lij emailem wiadomo¶æ z forum do w³a¶ciciela?";
    $lang['forum_email_usergroup']      = "Wy¶lij emailem wiadomo¶ci z forum do grupy u¿ytkowników?";
    $lang['reply']                      = "Odpowiedz";
    $lang['new_post']                   = "Nowa wiadomo¶æ";
    $lang['public_user_forum']          = "Opublikuj forum u¿ytkownika";
    $lang['private_forum_sprt']         = "Prywatne forum dla grupy u¿ytkowników '%s'";
    $lang['forum_submit']               = "Wnie¶ na forum";
    $lang['no_message']                 = "Brak wiadomo¶ci! Proszê cofnij siê i spróbuj ponownie";
    $lang['add_reply']                  = "Dodaj odpowied¼";
    $lang['last_post_sprt']             = "Ostatnie publikacje %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Ostatnio na forum";
    $lang['forum_search']               = "Przeszukuj forum";
    $lang['no_results']                 = "Nie znaleziono rezultatów dla '%s'";
    $lang['search_results']             = "Znaleziono %1\$s rezultatów dla '%2\$s'<br />Pokazuje rezultaty %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Raport";
    $lang['warning']                    = "<h1>Przepraszam!</h1><p>Nie jest mo¿liwym wykonanie tego zapytania w tej chwili. Proszê spróbuj pó¼niej.</p>";
    $lang['home_page']                  = "Strona g³ówna";
    $lang['summary_page']               = "Projekty";
    $lang['log_out']                    = "Wyloguj";
    $lang['main_menu']                  = "G³ówne menu";
    $lang['archive']                    = "Archiwum";
    $lang['user_homepage_sprt']         = "%s strona g³ówna";
    $lang['missing_field_javascript']   = "Proszê wprowad¼ warto¶æ dla brakuj±cego pola";
    $lang['invalid_date_javascript']    = "Proszê wybraæ prawid³ow± datê kalendarza";
    $lang['finish_date_javascript']     = "Wpisana data siêga dalej ni¿ data zakoñczenia projektu!";
    $lang['security_manager']           = "Menad¿er bezpieczeñstwa";
    $lang['session_timeout_sprt']       = "Dostêp wzbroniony; ostatnie dzia³anie by³o %1\$d minut temu i czasu up³yn±³ %2\$d minut temu; proszê <a href=\"%3\$sindex.php\">zaloguj siê ponownie</a>";
    $lang['access_denied']              = "Dostêp wzbroniony";
    $lang['private_usergroup_no_access']= "Przepraszam; ten obszar nale¿y do prywatnej grupy u¿ytkowników a ty nie masz uprawnieñ dostêpu do niego.";
    $lang['invalid_date']               = "Nieprawid³owa data";
    $lang['invalid_date_sprt']          = "Wprowadzona data %s nie jest prawid³ow± dat± kalendarzow± (Sprawd¼ numer dni w miesi±cu).<br />Proszê cofnij siê i wprowad¼ prawid³ow± datê.";


 //taskgroups
    $lang['taskgroup_name']             = "Nazwa grupy zadañ:";
    $lang['taskgroup_description']      = "Prosty opis grupy zadañ:";
    $lang['add_taskgroup']              = "Dodaj grupê zadañ";
    $lang['add_new_taskgroup']          = "Dodaj now± grupê zadañ";
    $lang['edit_taskgroup']             = "Edytuj grupê zadañ";
    $lang['taskgroup_manage']           = "Zarz±dzanie grupami zadañ";
    $lang['no_taskgroups']              = "Nie zdefiniowano grupy zadañ";
    $lang['manage_taskgroups']          = "Zarz±dzaj grup± zadañ";
    $lang['taskgroups']                 = "Grupy zadañ";
    $lang['taskgroup_dup_sprt']         = "Istnieje ju¿ taka grupa zadañ '%s'. Proszê cofnij siê i wybierz now± nazwê.";
    $lang['info_taskgroup_manage']      = "Info o zarz±dzaniu grupami zadañ";

 //usergroups
    $lang['usergroup_name']             = "Nazwa grupy u¿ytkowników:";
    $lang['usergroup_description']      = "Prosty opis grupy u¿ytkowników:";
    $lang['members']                    = "Cz³onkowie:";
    $lang['private_usergroup']          = "Prywatna grupa u¿ytkowników";
    $lang['add_usergroup']              = "Dodaj grupê u¿ytkowników";
    $lang['add_new_usergroup']          = "Dodaj now± grupê u¿ytkowników";
    $lang['edit_usergroup']             = "Edytuj grupê u¿ytkowników";
    $lang['usergroup_manage']           = "Zarz±dzanie grupami u¿ytkowników";
    $lang['no_usergroups']              = "Nie zdefiniowano grup u¿ytkowników";
    $lang['manage_usergroups']          = "Zarz±dzaj grupami u¿ytkowników";
    $lang['usergroups']                 = "Grupy u¿ytkowników";
    $lang['usergroup_dup_sprt']         = "Istnieje ju¿ grupa '%s'. Proszê cofnij siê i wybierz now± nazwê.";
    $lang['info_usergroup_manage']      = "Info o zarz±dzaniu grupami u¿ytkowników";

 //users
    $lang['login_name']                 = "Nazwa u¿ytkownika";
    $lang['full_name']                  = "Pe³na nazwa";
    $lang['password']                   = "Has³o";
    $lang['blank_for_current_password'] = "(Pozostaw puste dla aktualnego has³a)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Admin";
    $lang['private_user']               = "Prywatny u¿ytkownik";
    $lang['normal_user']                = "Normalny u¿ytkownik";
    $lang['is_admin']                   = "Czy jest adminem?";
    $lang['is_guest']                   = "Czy jest go¶ciem?";
    $lang['guest']                      = "Go¶æ";
    $lang['user_info']                  = "Informacje o u¿ytkowniku";
    $lang['deleted_users']              = "Skasowani u¿ytkownicy";
    $lang['no_deleted_users']           = "Brak skasowanych u¿ytkowników.";
    $lang['revive']                     = "Przegl±d";
    $lang['permdel']                    = "Kasowanie permanentne";
    $lang['permdel_javascript_sprt']    = "To permanentnie skasuje wszystkie rekordy u¿ytkownika i powi±zane z nim zadania dla %s. Czy jeste¶ pewien ¿e chcesz tego?";
    $lang['add_user']                   = "Dodaj u¿ytkownika";
    $lang['edit_user']                  = "Edytuj u¿ytkownika";
    $lang['no_users']                   = "Brak u¿ytkowników znanych systemowi";
    $lang['users']                      = "U¿ytkownicy";
    $lang['existing_users']             = "Istniej±cy u¿ytkownicy";
    $lang['private_profile']            = "Ten u¿ytkownik ma prywatny profil, który nie mo¿e byæ widziany przez ciebie.";
    $lang['private_usergroup_profile']  = "(Ten u¿ytkownik jest cz³onkiem prywatnej grupy u¿ytkowników, która nie mo¿e byæ widziana przez ciebie)";
    $lang['email_users']                = "Email do u¿ytkowników";
    $lang['select_usergroup']           = "Selekcja grupy u¿ytkowników poni¿ej:";
    $lang['subject']                    = "Temat:";
    $lang['message_sent_maillist']      = "We wszystkich przypadkach wiadomo¶æ jest kopiowana do listy mailingowej.";
    $lang['who_online']                 = "Kto jest online?";
    $lang['edit_details']               = "Edytuj szczegó³y u¿ytkownika";
    $lang['show_details']               = "Poka¿ szczegó³y u¿ytkownika";
    $lang['user_deleted']               = "Ten u¿ytkownik zosta³ skasowany!";
    $lang['no_usergroup']               = "Ten u¿ytkownik nie jest cz³onkiem ¿adnej grupy u¿ytkowników";
    $lang['not_usergroup']              = "(Nie jest cz³onkiem ¿adnej grupy u¿ytkowników)";
    $lang['no_password_change']         = "(Twoje istniej±ce has³o nie zosta³o zmienione)";
    $lang['last_time_here']             = "Ostatnim razem widziany tutaj:";
    $lang['number_items_created']       = "Liczna utworzonych elementów:";
    $lang['number_projects_owned']      = "Liczba posiadanych projektów:";
    $lang['number_tasks_owned']         = "Liczba posiadanych zadañ:";
    $lang['number_tasks_completed']     = "Liczba ukoñczonych zadañ:";
    $lang['number_forum']               = "Liczba opublikowanych wiadomo¶ci na forum:";
    $lang['number_files']               = "Liczba uploadowanych plików:";
    $lang['size_all_files']             = "Ca³kowita wielko¶æ posiadanych plików:";
    $lang['owned_tasks']                = "W³asne zadania";
    $lang['invalid_email']              = "Nieprawid³owy adres email";
    $lang['invalid_email_given_sprt']   = "Email adres '%s' jest nieprawid³owy. Proszê cofnij siê i spróbuj ponownie.";
    $lang['duplicate_user']             = "Zduplikowany u¿ytkownik";
    $lang['duplicate_change_user_sprt'] = "U¿ytkownik '%s' ju¿ istnieje w systemie. Proszê cofnij siê i zmien imiê lub nazwisko.";
    $lang['value_missing']              = "Brak wpisu w polu";
    $lang['field_sprt']                 = "Dla '%s' brakuje wpisu w polu. Proszê wróæ i wype³nij je.";
    $lang['admin_priv']                 = "UWAGA: Przydzielono ci uprawnienia administratora.";
    $lang['manage_users']               = "Zarz±dzaj u¿ytkownikami";
    $lang['users_online']               = "Zalogowani u¿ytkownicy";
    $lang['online']                     = "Zalogowani krócej ni¿ 60 minut temu.";
    $lang['not_online']                 = "Odpoczywaj±";
    $lang['user_activity']              = "Aktywno¶æ u¿ytkowników";

  //tasks
    $lang['add_new_task']               = "Dodaj nowe zadanie";
    $lang['priority']                   = "Priorytet";
    $lang['parent_task']                = "Nadrzêdne zadanie";
    $lang['creation_time']              = "Data utworzenia";
    $lang['by_sprt']                    = "%1\$s przez %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Nazwa projektu";
    $lang['task_name']                  = "Nazwa zadania";
    $lang['deadline']                   = "Data zakoñczenia";
    $lang['taken_from_parent']          = "(wziête z nadrzêdnego)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "W³a¶ciciel zadania";
    $lang['project_owner']              = "W³a¶ciciel projektu";
    $lang['taskgroup']                  = "Grupa zadañ";
    $lang['usergroup']                  = "Grupa u¿ytkowników";
    $lang['nobody']                     = "Nikt";
    $lang['none']                       = "Brak";
    $lang['no_group']                   = "Brak grupy";
    $lang['all_groups']                 = "wszystkie grupy";
    $lang['all_users']                  = "Wszyscy u¿ytkownicy";
    $lang['all_users_view']             = "Wszyscy u¿ytkownicy mog± zobaczyæ ten element?";
    $lang['group_edit']                 = "Ktokolwiek z grupy mo¿e edytowaæ?";
    $lang['project_description']        = "Opis projektu";
    $lang['task_description']           = "Opis zadania";
    $lang['email_owner']                = "Wy¶lij email do w³a¶ciciela z opisem zmian?";
    $lang['email_new_owner']            = "Wy¶lij email do nowego w³a¶ciciela z opisem zmian?";
    $lang['email_group']                = "Wy¶lij email do grupy u¿ytkowników z opisem zmian?";
    $lang['add_new_project']            = "Dodaj nowy projekt";
    $lang['uncategorised']              = "Nieskategoryzowany";
    $lang['due_sprt']                   = "%d dni od teraz";
    $lang['tomorrow']                   = "Jutro";
    $lang['due_today']                  = "Do dzisiaj";
    $lang['overdue_1']                  = "1 dzieñ przekroczenia";
    $lang['overdue_sprt']               = "%d dni przekroczenia";
    $lang['edit_task']                  = "Edytuj zadanie";
    $lang['edit_project']               = "Edytuj projekt";
    $lang['no_reparent']                = "Brak (projekt najwy¿szego poziomu)";
    $lang['del_javascript_project_sprt']= "To skasuje projekt %s. Czy jeste¶ pewien?";
    $lang['del_javascript_task_sprt']   = "To skasuje zadanie %s. Czy jeste¶ pewien?";
    $lang['add_task']                   = "Dodaj zadanie";
    $lang['add_subtask']                = "Dodaj pod zadanie";
    $lang['add_project']                = "Dodaj projekt";
    $lang['clone_project']              = "Klonuj projekt";
    $lang['clone_task']                 = "Klonuj zadanie";
    $lang['quick_jump']                 = "Szybki skok";
    $lang['no_edit']                    = "Nie jeste¶ w³a¶cicielem tego projektu dlatewgo nie mo¿esz go edytowaæ";
    $lang['global']                     = "Globalne";
    $lang['delete_project']             = "Skasuj projekt";
    $lang['delete_task']                = "Skasuj zadanie";
    $lang['project_options']            = "Opcje projektu";
    $lang['task_options']               = "Opcje zadania";
    $lang['javascript_archive_project'] = "To zarchiwizuje projekt %s. Czy jeste¶ pewien?";
    $lang['archive_project']            = "Archiwizuj projekt";
    $lang['task_navigation']            = "Nawigacja zadañ";
    $lang['new_task']                   = "Nowe zadanie";
    $lang['no_projects']                = "Brak projektów do wy¶wietlenia";
    $lang['show_all_projects']          = "Poka¿ wszystkie projekty";
    $lang['show_active_projects']       = "Poka¿ tylko aktywne projekty";
    $lang['project_hold_sprt']          = "Projekt zawieszony od %s";
    $lang['project_planned']            = "Zaplanowane (planowane) projekty";
    $lang['percent_sprt']               = "%d%% zadania wykonane";
    $lang['project_no_deadline']        = "Brak ustawionych terminów koñcowych dla tego projektu";
    $lang['no_allowed_projects']        = "Brak projektów do których masz uprawnienia do przegl±dania";
    $lang['projects']                   = "Projekty";
    $lang['percent_project_sprt']       = "Ten projekt jest ukoñczony w %d%%";
    $lang['owned_by']                   = "Posiadany przez";
    $lang['created_on']                 = "Utworzony";
    $lang['completed_on']               = "Zakoñczony";
    $lang['modified_on']                = "Zmodyfikowany";
    $lang['project_on_hold']            = "Projekt wstrzymany";
    $lang['project_accessible']         = "(Ten projekt jest publicznie dostêpny dla wszystkich u¿ytkowników)";
    $lang['task_accessible']            = "(To zadanie jest publicznie dostêpne dla wszystkich u¿ytkowników)";
    $lang['project_not_accessible']     = "(Ten projekt jest dostêpny tylko dla cz³onków grup u¿ytkowników)";
    $lang['task_not_accessible']        = "(To zadanie jest dostêpne tylko dla cz³onków grup u¿ytkowników)";
    $lang['project_not_in_usergroup']   = "Ten projekt nie jest czê¶ci± grupy u¿ytkowników i jest dostêpny dla wszystkich u¿ytkowników.";
    $lang['task_not_in_usergroup']      = "To zadanie nie jest czê¶ci± grupy u¿ytkowników i jest dostêpne dla wszystkich u¿ytkowników.";
    $lang['usergroup_can_edit_project'] = "Ten projekt mo¿e byæ edytowany tylko przez cz³onków grupy u¿ytkowników.";
    $lang['usergroup_can_edit_task']    = "To zadanie mo¿e byæ edytowane tylko przez cz³onków grupy u¿ytkowników.";
    $lang['i_take_it']                  = "Biorê to:)";
    $lang['i_finished']                 = "Skoñczy³em to!";
    $lang['i_dont_want']                = "Nie chcê siê d³u¿ej tym zajmowaæ";
    $lang['take_over_project']          = "Zajmê siê tym";
    $lang['take_over_task']             = "Zajmê siê tym zadaniem";
    $lang['task_info']                  = "Informacje o zadaniu";
    $lang['project_details']            = "Szczegó³y projektu";
    $lang['todo_list_for']              = "Lista Do_Zrobienia dla: ";
    $lang['due_in_sprt']                = " (w ci±gu %d dni)";
    $lang['due_tomorrow']               = " (do jutra)";
    $lang['no_assigned']                = "Brak niezakoñczonych zadañ przypisanych do tego u¿ytkownika.";
    $lang['todo_list']                  = "Lista Do-Zrobienia";
    $lang['summary_list']               = "Lista podsumowania";
    $lang['task_submit']                = "Dostarczenie zadania";
    $lang['not_owner']                  = "Dostêp wzbroniony. Jakkolwiek nie jeste¶ w³a¶cicielem; lub nie posiadasz wystarczaj±cych uprawnieñ";
    $lang['missing_values']             = "Niewystarczaj±ca ilo¶æ wype³nionych pól; proszê cofnij siê i spróbuj ponownie";
    $lang['future']                     = "Przysz³o¶æ";
    $lang['flags']                      = "Flagi";
    $lang['owner']                      = "W³a¶ciciel";
    $lang['group']                      = "Grupa";
    $lang['by_usergroup']               = " (poprzez grupê u¿ytk.)";
    $lang['by_taskgroup']               = " (poprzez grupê zadañ)";
    $lang['by_deadline']                = " (po terminach zakoñczenia)";
    $lang['by_status']                  = " (poprzez status)";
    $lang['by_owner']                   = " (po w³a¶cicielu)";
    $lang['by_priority']                = " (po priorytecie)";
    $lang['project_cloned']             = "Projekt do sklonowania:";
    $lang['task_cloned']                = "Zadanie do sklonowania:";
    $lang['note_clone']                 = "Uwaga: Zadanie bêdzie sklonowane jako nowy projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendarz";
    $lang['normal_version']             = "Wersja normalna";
    $lang['print_version']              = "Wersja do druku";
    $lang['condensed_view']             = "Widok skondensowany";
    $lang['full_view']                  = "Pe³ny widok";
    $lang['icalendar']                  = "iKalendarz";

?>
