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
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "pl" );

//dates
$month_array = array (NULL, 'Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru' );
$week_array = array('Nie', 'Pon', 'Wto', 'Śro', 'Czw', 'Pią', 'Sob' );

//task states

 //priorities
    $task_state['dontdo']               = "Nie robić";
    $task_state['low']                  = "Niski";
    $task_state['normal']               = "Normalny";
    $task_state['high']                 = "Wysoki";
    $task_state['yesterday']            = "Strategiczny";
 //status
    $task_state['new']                  = "Nowy";
    $task_state['planned']              = "Planowany (nie aktywny)";
    $task_state['active']               = "Aktywny (praca trwa)";
    $task_state['cantcomplete']         = "Zatrzymany";
    $task_state['completed']            = "Zakończony";
    $task_state['done']                 = "Gotowy";
    $task_state['task_planned']         = " Planowane";
    $task_state['task_active']          = " Aktywne";
 //project states
    $task_state['planned_project']      = "Planowany (nie aktywny)";
    $task_state['no_deadline_project']  = "Brak terminów końcowych";
    $task_state['active_project']       = "Aktywny projekt";

//common items
    $lang['description']                = "Opis";
    $lang['name']                       = "Nazwa";
    $lang['add']                        = "Dodaj";
    $lang['update']                     = "Aktualizuj";
    $lang['submit_changes']             = "Zatwierdź zmiany";
    $lang['continue']                   = "Kontynuacja";
    $lang['manage']                     = "Zarządzanie";
    $lang['edit']                       = "Edytuj";
    $lang['delete']                     = "Usuń";
    $lang['del']                        = "Kasuj";
    $lang['confirm_del_javascript']     = " Potwierdź kasowanie!";
    $lang['yes']                        = "Tak";
    $lang['no']                         = "Nie";
    $lang['action']                     = "Akcja";
    $lang['task']                       = "Zadanie";
    $lang['tasks']                      = "Zadania";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informacja";
    $lang['bytes']                      = " bajtów";
    $lang['select_instruct']            = "(Użyj ctrl do dalszego wyselekcjonowania; lub żeby odznaczyć selekcję)";
    $lang['member_groups']              = "Użytkownik jest członkiem podświetlonej grupy poniżej (jeśli istnieje)";
    $lang['login']                      = "Login";
    $lang['login_action']               = "Zaloguj";
    $lang['login_screen']               = "Login";
    $lang['error']                      = "Błąd";
    $lang['no_login']                   = "Brak dostępu; nieprawidłowy login lub hasło";
    $lang['redirect_sprt']              = "Automatycznie powrócisz do ekranu logowania za %d sekund";
    $lang['login_now']                  = "Proszę naciśnij to aby powrócić do logowania";
    $lang['please_login']               = "Zaloguj się";
    $lang['go']                         = "Idź!";

//graphic items
    $lang['late_g']                     = "&nbsp;OPÓŹNIONE&nbsp;";
    $lang['new_g']                      = "&nbsp;NOWE&nbsp;";
    $lang['updated_g']                  = "&nbsp;ZAKTUALIZOWANE&nbsp;";

//admin config
    $lang['admin_config']               = "Konfiguracja admina";
    $lang['email_settings']             = "Ustawienia nagłówka emaila";
    $lang['admin_email']                = "Email admina";
    $lang['email_reply']                = "Email 'Odpowiedz'";
    $lang['email_from']                 = "Email 'od'";
    $lang['mailing_list']               = "Lista mailingowa";
    $lang['default_checkbox']           = "Domyślne ustawienie dla projektu/zadania";
    $lang['allow_globalaccess']         = "Zezwól na globalny dostęp?";
    $lang['allow_group_edit']           = "Zezwolić wszystkim z grupy na edycję?";
    $lang['set_email_owner']            = "Zawsze wysyłać emaila ze zmianami do właściciela?";
    $lang['set_email_group']            = "Zawsze wysyłać emaila ze zmianami do grupy użytkowników?";
    $lang['project_listing_order']      = "Kolejność wyświetlania projektów";
    $lang['task_listing_order']         = "Kolejność wyświetlania zadań";
    $lang['configuration']              = "Konfiguracja";

//archive
    $lang['archived_projects']          = "Projekty archiwalne";

//contacts
    $lang['firstname']                  = "Imię:";
    $lang['lastname']                   = "Nazwisko:";
    $lang['company']                    = "Firma:";
    $lang['home_phone']                 = "Telefon domowy:";
    $lang['mobile']                     = "Komórka:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Telefon służbowy:";
    $lang['address']                    = "Adres:";
    $lang['postal']                     = "Kod pocztowy:";
    $lang['city']                       = "Miasto:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Uwagi:";
    $lang['add_contact']                = "Dodaj kontakt";
    $lang['del_contact']                = "Usuń kontakt";
    $lang['contact_info']               = "Informacje o kontakcie";
    $lang['contacts']                   = "Kontakty";
    $lang['contact_add_info']           = "Jeśli dodasz nazwę przedsiębiorstwa to będzie ona wyświetlona zamiast personaliów użytkownika.";
    $lang['show_contact']               = "Pokaż kontakty";
    $lang['edit_contact']               = "Edytuj kontakty";
    $lang['contact_submit']             = "Zaakceptuj kontakt";
    $lang['contact_warn']               = "Nie wprowadziłeś wszystkich wartości w pola kontaktu; proszę cofnij się i dodaj minimum imię i nazwisko";

 //files
    $lang['manage_files']               = "Zarządzaj plikami";
    $lang['no_files']                   = "Brak plików do zarządzania";
    $lang['no_file_uploads']            = "Konfiguracja serwera nie zezwala na taki upload";
    $lang['file']                       = "Plik:";
    $lang['uploader']                   = "Uploader:";
    $lang['files_assoc_project']        = "Pliki powiązane z tym projektem";
    $lang['files_assoc_task']           = "Pliki powiązane z tym zadaniem";
    $lang['file_admin']                 = "Administrator plików";
    $lang['add_file']                   = "Dodaj plik";
    $lang['files']                      = "Pliki";
    $lang['file_choose']                = "Plik do uploadowania:";
    $lang['upload']                     = "Uploaduj";
    $lang['file_email_owner']           = "Potwierdzenie emailowe nowego właściciela plików?";
    $lang['file_email_usergroup']       = "Potwierdzenie emailowe nowego właściciela grupy użytkowników?";
    $lang['max_file_sprt']              = "Plik do uploadowania musi być mniejszy niż %s kb.";
    $lang['file_submit']                = "Zatwierdź plik";
    $lang['no_upload']                  = "Żaden plik nie został uploadowany. Proszę wróć i spróbuj ponownie.";
    $lang['file_too_big_sprt']          = "Maksymalny upload wynosi %s bajtów. Twój upload był za duży dlatego został usunięty.";
    $lang['del_file_javascript_sprt']   = "Czy jesteś pewien że chcesz skasować %s ?";


 //forum
    $lang['orig_message']               = "Oryginalna wiadomość:";
    $lang['post']                       = "Publikuj!";
    $lang['message']                    = "Wiadomość:";
    $lang['post_reply_sprt']            = "Umieść odpowiedź na wiadomość od '%1\$s' dotyczącą '%2\$s'";
    $lang['post_message_sprt']          = "Odpisz do: '%s'";
    $lang['forum_email_owner']          = "Wyślij emailem wiadomość z forum do właściciela?";
    $lang['forum_email_usergroup']      = "Wyślij emailem wiadomości z forum do grupy użytkowników?";
    $lang['reply']                      = "Odpowiedz";
    $lang['new_post']                   = "Nowa wiadomość";
    $lang['public_user_forum']          = "Opublikuj forum użytkownika";
    $lang['private_forum_sprt']         = "Prywatne forum dla grupy użytkowników '%s'";
    $lang['forum_submit']               = "Wnieś na forum";
    $lang['no_message']                 = "Brak wiadomości! Proszę cofnij się i spróbuj ponownie";
    $lang['add_reply']                  = "Dodaj odpowiedź";
    $lang['last_post_sprt']             = "Ostatnie publikacje %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Ostatnio na forum";
    $lang['forum_search']               = "Przeszukuj forum";
    $lang['no_results']                 = "Nie znaleziono rezultatów dla '%s'";
    $lang['search_results']             = "Znaleziono %1\$s rezultatów dla '%2\$s'<br />Pokazuje rezultaty %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Raport";
    $lang['warning']                    = "<h1>Przepraszam!</h1><p>Nie jest możliwym wykonanie tego zapytania w tej chwili. Proszę spróbuj później.</p>";
    $lang['home_page']                  = "Strona główna";
    $lang['summary_page']               = "Projekty";
    $lang['log_out']                    = "Wyloguj";
    $lang['main_menu']                  = "Główne menu";
    $lang['archive']                    = "Archiwum";
    $lang['user_homepage_sprt']         = "%s strona główna";
    $lang['missing_field_javascript']   = "Proszę wprowadź wartość dla brakującego pola";
    $lang['invalid_date_javascript']    = "Proszę wybrać prawidłową datę kalendarza";
    $lang['finish_date_javascript']     = "Wpisana data sięga dalej niż data zakończenia projektu!";
    $lang['security_manager']           = "Menadżer bezpieczeństwa";
    $lang['session_timeout_sprt']       = "Dostęp wzbroniony; ostatnie działanie było %1\$d minut temu i czasu upłynął %2\$d minut temu; proszę <a href=\"%3\$sindex.php\">zaloguj się ponownie</a>";
    $lang['access_denied']              = "Dostęp wzbroniony";
    $lang['private_usergroup_no_access']= "Przepraszam; ten obszar należy do prywatnej grupy użytkowników a ty nie masz uprawnień dostępu do niego.";
    $lang['invalid_date']               = "Nieprawidłowa data";
    $lang['invalid_date_sprt']          = "Wprowadzona data %s nie jest prawidłową datą kalendarzową (Sprawdź numer dni w miesiącu).<br />Proszę cofnij się i wprowadź prawidłową datę.";


 //taskgroups
    $lang['taskgroup_name']             = "Nazwa grupy zadań:";
    $lang['taskgroup_description']      = "Prosty opis grupy zadań:";
    $lang['add_taskgroup']              = "Dodaj grupę zadań";
    $lang['add_new_taskgroup']          = "Dodaj nową grupę zadań";
    $lang['edit_taskgroup']             = "Edytuj grupę zadań";
    $lang['taskgroup_manage']           = "Zarządzanie grupami zadań";
    $lang['no_taskgroups']              = "Nie zdefiniowano grupy zadań";
    $lang['manage_taskgroups']          = "Zarządzaj grupą zadań";
    $lang['taskgroups']                 = "Grupy zadań";
    $lang['taskgroup_dup_sprt']         = "Istnieje już taka grupa zadań '%s'. Proszę cofnij się i wybierz nową nazwę.";
    $lang['info_taskgroup_manage']      = "Info o zarządzaniu grupami zadań";

 //usergroups
    $lang['usergroup_name']             = "Nazwa grupy użytkowników:";
    $lang['usergroup_description']      = "Prosty opis grupy użytkowników:";
    $lang['members']                    = "Członkowie:";
    $lang['private_usergroup']          = "Prywatna grupa użytkowników";
    $lang['add_usergroup']              = "Dodaj grupę użytkowników";
    $lang['add_new_usergroup']          = "Dodaj nową grupę użytkowników";
    $lang['edit_usergroup']             = "Edytuj grupę użytkowników";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Zarządzanie grupami użytkowników";
    $lang['no_usergroups']              = "Nie zdefiniowano grup użytkowników";
    $lang['manage_usergroups']          = "Zarządzaj grupami użytkowników";
    $lang['usergroups']                 = "Grupy użytkowników";
    $lang['usergroup_dup_sprt']         = "Istnieje już grupa '%s'. Proszę cofnij się i wybierz nową nazwę.";
    $lang['info_usergroup_manage']      = "Info o zarządzaniu grupami użytkowników";

 //users
    $lang['login_name']                 = "Nazwa użytkownika";
    $lang['full_name']                  = "Pełna nazwa";
    $lang['password']                   = "Hasło";
    $lang['blank_for_current_password'] = "(Pozostaw puste dla aktualnego hasła)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Admin";
    $lang['private_user']               = "Prywatny użytkownik";
    $lang['normal_user']                = "Normalny użytkownik";
    $lang['is_admin']                   = "Czy jest adminem?";
    $lang['is_guest']                   = "Czy jest gościem?";
    $lang['guest']                      = "Gość";
    $lang['user_info']                  = "Informacje o użytkowniku";
    $lang['deleted_users']              = "Skasowani użytkownicy";
    $lang['no_deleted_users']           = "Brak skasowanych użytkowników.";
    $lang['revive']                     = "Przegląd";
    $lang['permdel']                    = "Kasowanie permanentne";
    $lang['permdel_javascript_sprt']    = "To permanentnie skasuje wszystkie rekordy użytkownika i powiązane z nim zadania dla %s. Czy jesteś pewien że chcesz tego?";
    $lang['add_user']                   = "Dodaj użytkownika";
    $lang['edit_user']                  = "Edytuj użytkownika";
    $lang['no_users']                   = "Brak użytkowników znanych systemowi";
    $lang['users']                      = "Użytkownicy";
    $lang['existing_users']             = "Istniejący użytkownicy";
    $lang['private_profile']            = "Ten użytkownik ma prywatny profil, który nie może być widziany przez ciebie.";
    $lang['private_usergroup_profile']  = "(Ten użytkownik jest członkiem prywatnej grupy użytkowników, która nie może być widziana przez ciebie)";
    $lang['email_users']                = "Email do użytkowników";
    $lang['select_usergroup']           = "Selekcja grupy użytkowników poniżej:";
    $lang['subject']                    = "Temat:";
    $lang['message_sent_maillist']      = "We wszystkich przypadkach wiadomość jest kopiowana do listy mailingowej.";
    $lang['who_online']                 = "Kto jest online?";
    $lang['edit_details']               = "Edytuj szczegóły użytkownika";
    $lang['show_details']               = "Pokaż szczegóły użytkownika";
    $lang['user_deleted']               = "Ten użytkownik został skasowany!";
    $lang['no_usergroup']               = "Ten użytkownik nie jest członkiem żadnej grupy użytkowników";
    $lang['not_usergroup']              = "(Nie jest członkiem żadnej grupy użytkowników)";
    $lang['no_password_change']         = "(Twoje istniejące hasło nie zostało zmienione)";
    $lang['last_time_here']             = "Ostatnim razem widziany tutaj:";
    $lang['number_items_created']       = "Liczna utworzonych elementów:";
    $lang['number_projects_owned']      = "Liczba posiadanych projektów:";
    $lang['number_tasks_owned']         = "Liczba posiadanych zadań:";
    $lang['number_tasks_completed']     = "Liczba ukończonych zadań:";
    $lang['number_forum']               = "Liczba opublikowanych wiadomości na forum:";
    $lang['number_files']               = "Liczba uploadowanych plików:";
    $lang['size_all_files']             = "Całkowita wielkość posiadanych plików:";
    $lang['owned_tasks']                = "Własne zadania";
    $lang['invalid_email']              = "Nieprawidłowy adres email";
    $lang['invalid_email_given_sprt']   = "Email adres '%s' jest nieprawidłowy. Proszę cofnij się i spróbuj ponownie.";
    $lang['duplicate_user']             = "Zduplikowany użytkownik";
    $lang['duplicate_change_user_sprt'] = "Użytkownik '%s' już istnieje w systemie. Proszę cofnij się i zmien imię lub nazwisko.";
    $lang['value_missing']              = "Brak wpisu w polu";
    $lang['field_sprt']                 = "Dla '%s' brakuje wpisu w polu. Proszę wróć i wypełnij je.";
    $lang['admin_priv']                 = "UWAGA: Przydzielono ci uprawnienia administratora.";
    $lang['manage_users']               = "Zarządzaj użytkownikami";
    $lang['users_online']               = "Zalogowani użytkownicy";
    $lang['online']                     = "Zalogowani krócej niż 60 minut temu.";
    $lang['not_online']                 = "Odpoczywają";
    $lang['user_activity']              = "Aktywność użytkowników";

  //tasks
    $lang['add_new_task']               = "Dodaj nowe zadanie";
    $lang['priority']                   = "Priorytet";
    $lang['parent_task']                = "Nadrzędne zadanie";
    $lang['creation_time']              = "Data utworzenia";
    $lang['by_sprt']                    = "%1\$s przez %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Nazwa projektu";
    $lang['task_name']                  = "Nazwa zadania";
    $lang['deadline']                   = "Data zakończenia";
    $lang['taken_from_parent']          = "(wzięte z nadrzędnego)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Właściciel zadania";
    $lang['project_owner']              = "Właściciel projektu";
    $lang['taskgroup']                  = "Grupa zadań";
    $lang['usergroup']                  = "Grupa użytkowników";
    $lang['nobody']                     = "Nikt";
    $lang['none']                       = "Brak";
    $lang['no_group']                   = "Brak grupy";
    $lang['all_groups']                 = "wszystkie grupy";
    $lang['all_users']                  = "Wszyscy użytkownicy";
    $lang['all_users_view']             = "Wszyscy użytkownicy mogą zobaczyć ten element?";
    $lang['group_edit']                 = "Ktokolwiek z grupy może edytować?";
    $lang['project_description']        = "Opis projektu";
    $lang['task_description']           = "Opis zadania";
    $lang['email_owner']                = "Wyślij email do właściciela z opisem zmian?";
    $lang['email_new_owner']            = "Wyślij email do nowego właściciela z opisem zmian?";
    $lang['email_group']                = "Wyślij email do grupy użytkowników z opisem zmian?";
    $lang['add_new_project']            = "Dodaj nowy projekt";
    $lang['uncategorised']              = "Nieskategoryzowany";
    $lang['due_sprt']                   = "%d dni od teraz";
    $lang['tomorrow']                   = "Jutro";
    $lang['due_today']                  = "Do dzisiaj";
    $lang['overdue_1']                  = "1 dzień przekroczenia";
    $lang['overdue_sprt']               = "%d dni przekroczenia";
    $lang['edit_task']                  = "Edytuj zadanie";
    $lang['edit_project']               = "Edytuj projekt";
    $lang['no_reparent']                = "Brak (projekt najwyższego poziomu)";
    $lang['del_javascript_project_sprt']= "To skasuje projekt %s. Czy jesteś pewien?";
    $lang['del_javascript_task_sprt']   = "To skasuje zadanie %s. Czy jesteś pewien?";
    $lang['add_task']                   = "Dodaj zadanie";
    $lang['add_subtask']                = "Dodaj pod zadanie";
    $lang['add_project']                = "Dodaj projekt";
    $lang['clone_project']              = "Klonuj projekt";
    $lang['clone_task']                 = "Klonuj zadanie";
    $lang['quick_jump']                 = "Szybki skok";
    $lang['no_edit']                    = "Nie jesteś właścicielem tego projektu dlatewgo nie możesz go edytować";
    $lang['global']                     = "Globalne";
    $lang['delete_project']             = "Skasuj projekt";
    $lang['delete_task']                = "Skasuj zadanie";
    $lang['project_options']            = "Opcje projektu";
    $lang['task_options']               = "Opcje zadania";
    $lang['javascript_archive_project'] = "To zarchiwizuje projekt %s. Czy jesteś pewien?";
    $lang['archive_project']            = "Archiwizuj projekt";
    $lang['task_navigation']            = "Nawigacja zadań";
    $lang['new_task']                   = "Nowe zadanie";
    $lang['no_projects']                = "Brak projektów do wyświetlenia";
    $lang['show_all_projects']          = "Pokaż wszystkie projekty";
    $lang['show_active_projects']       = "Pokaż tylko aktywne projekty";
    $lang['project_hold_sprt']          = "Projekt zawieszony od %s";
    $lang['project_planned']            = "Zaplanowane (planowane) projekty";
    $lang['percent_sprt']               = "%d%% zadania wykonane";
    $lang['project_no_deadline']        = "Brak ustawionych terminów końcowych dla tego projektu";
    $lang['no_allowed_projects']        = "Brak projektów do których masz uprawnienia do przeglądania";
    $lang['projects']                   = "Projekty";
    $lang['percent_project_sprt']       = "Ten projekt jest ukończony w %d%%";
    $lang['owned_by']                   = "Posiadany przez";
    $lang['created_on']                 = "Utworzony";
    $lang['completed_on']               = "Zakończony";
    $lang['modified_on']                = "Zmodyfikowany";
    $lang['project_on_hold']            = "Projekt wstrzymany";
    $lang['project_accessible']         = "(Ten projekt jest publicznie dostępny dla wszystkich użytkowników)";
    $lang['task_accessible']            = "(To zadanie jest publicznie dostępne dla wszystkich użytkowników)";
    $lang['project_not_accessible']     = "(Ten projekt jest dostępny tylko dla członków grup użytkowników)";
    $lang['task_not_accessible']        = "(To zadanie jest dostępne tylko dla członków grup użytkowników)";
    $lang['project_not_in_usergroup']   = "Ten projekt nie jest częścią grupy użytkowników i jest dostępny dla wszystkich użytkowników.";
    $lang['task_not_in_usergroup']      = "To zadanie nie jest częścią grupy użytkowników i jest dostępne dla wszystkich użytkowników.";
    $lang['usergroup_can_edit_project'] = "Ten projekt może być edytowany tylko przez członków grupy użytkowników.";
    $lang['usergroup_can_edit_task']    = "To zadanie może być edytowane tylko przez członków grupy użytkowników.";
    $lang['i_take_it']                  = "Biorę to:)";
    $lang['i_finished']                 = "Skończyłem to!";
    $lang['i_dont_want']                = "Nie chcę się dłużej tym zajmować";
    $lang['take_over_project']          = "Zajmę się tym";
    $lang['take_over_task']             = "Zajmę się tym zadaniem";
    $lang['task_info']                  = "Informacje o zadaniu";
    $lang['project_details']            = "Szczegóły projektu";
    $lang['todo_list_for']              = "Lista Do_Zrobienia dla: ";
    $lang['due_in_sprt']                = " (w ciągu %d dni)";
    $lang['due_tomorrow']               = " (do jutra)";
    $lang['no_assigned']                = "Brak niezakończonych zadań przypisanych do tego użytkownika.";
    $lang['todo_list']                  = "Lista Do-Zrobienia";
    $lang['summary_list']               = "Lista podsumowania";
    $lang['task_submit']                = "Dostarczenie zadania";
    $lang['not_owner']                  = "Dostęp wzbroniony. Jakkolwiek nie jesteś właścicielem; lub nie posiadasz wystarczających uprawnień";
    $lang['missing_values']             = "Niewystarczająca ilość wypełnionych pól; proszę cofnij się i spróbuj ponownie";
    $lang['future']                     = "Przyszłość";
    $lang['flags']                      = "Flagi";
    $lang['owner']                      = "Właściciel";
    $lang['group']                      = "Grupa";
    $lang['by_usergroup']               = " (poprzez grupę użytk.)";
    $lang['by_taskgroup']               = " (poprzez grupę zadań)";
    $lang['by_deadline']                = " (po terminach zakończenia)";
    $lang['by_status']                  = " (poprzez status)";
    $lang['by_owner']                   = " (po właścicielu)";
    $lang['by_priority']                = " (po priorytecie)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Projekt do sklonowania:";
    $lang['task_cloned']                = "Zadanie do sklonowania:";
    $lang['note_clone']                 = "Uwaga: Zadanie będzie sklonowane jako nowy projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendarz";
    $lang['normal_version']             = "Wersja normalna";
    $lang['print_version']              = "Wersja do druku";
    $lang['condensed_view']             = "Widok skondensowany";
    $lang['full_view']                  = "Pełny widok";
    $lang['icalendar']                  = "iKalendarz";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>
