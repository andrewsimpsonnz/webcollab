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
$month_array = array (NULL, 'Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Pa�', 'Lis', 'Gru' );
$week_array = array('Nie', 'Pon', 'Wto', '�ro', 'Czw', 'Pi�', 'Sob' );

//task states

 //priorities
    $task_state['dontdo']               = "Nie robi�";
    $task_state['low']                  = "Niski";
    $task_state['normal']               = "Normalny";
    $task_state['high']                 = "Wysoki";
    $task_state['yesterday']            = "Strategiczny";
 //status
    $task_state['new']                  = "Nowy";
    $task_state['planned']              = "Planowany (nie aktywny)";
    $task_state['active']               = "Aktywny (praca trwa)";
    $task_state['cantcomplete']         = "Zatrzymany";
    $task_state['completed']            = "Zako�czony";
    $task_state['done']                 = "Gotowy";
    $task_state['task_planned']         = " Planowane";
    $task_state['task_active']          = " Aktywne";
 //project states
    $task_state['planned_project']      = "Planowany (nie aktywny)";
    $task_state['no_deadline_project']  = "Brak termin�w ko�cowych";
    $task_state['active_project']       = "Aktywny projekt";

//common items
    $lang['description']                = "Opis";
    $lang['name']                       = "Nazwa";
    $lang['add']                        = "Dodaj";
    $lang['update']                     = "Aktualizuj";
    $lang['submit_changes']             = "Zatwierd� zmiany";
    $lang['continue']                   = "Kontynuacja";
    $lang['manage']                     = "Zarz�dzanie";
    $lang['edit']                       = "Edytuj";
    $lang['delete']                     = "Usu�";
    $lang['del']                        = "Kasuj";
    $lang['confirm_del_javascript']     = " Potwierd� kasowanie!";
    $lang['yes']                        = "Tak";
    $lang['no']                         = "Nie";
    $lang['action']                     = "Akcja";
    $lang['task']                       = "Zadanie";
    $lang['tasks']                      = "Zadania";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informacja";
    $lang['bytes']                      = " bajt�w";
    $lang['select_instruct']            = "(U�yj ctrl do dalszego wyselekcjonowania; lub �eby odznaczy� selekcj�)";
    $lang['member_groups']              = "U�ytkownik jest cz�onkiem pod�wietlonej grupy poni�ej (je�li istnieje)";
    $lang['login']                      = "Login";
    $lang['login_action']               = "Zaloguj";
    $lang['login_screen']               = "Login";
    $lang['error']                      = "B��d";
    $lang['no_login']                   = "Brak dost�pu; nieprawid�owy login lub has�o";
    $lang['redirect_sprt']              = "Automatycznie powr�cisz do ekranu logowania za %d sekund";
    $lang['login_now']                  = "Prosz� naci�nij to aby powr�ci� do logowania";
    $lang['please_login']               = "Zaloguj si�";
    $lang['go']                         = "Id�!";

//graphic items
    $lang['late_g']                     = "&nbsp;OPӬNIONE&nbsp;";
    $lang['new_g']                      = "&nbsp;NOWE&nbsp;";
    $lang['updated_g']                  = "&nbsp;ZAKTUALIZOWANE&nbsp;";

//admin config
    $lang['admin_config']               = "Konfiguracja admina";
    $lang['email_settings']             = "Ustawienia nag��wka emaila";
    $lang['admin_email']                = "Email admina";
    $lang['email_reply']                = "Email 'Odpowiedz'";
    $lang['email_from']                 = "Email 'od'";
    $lang['mailing_list']               = "Lista mailingowa";
    $lang['default_checkbox']           = "Domy�lne ustawienie dla projektu/zadania";
    $lang['allow_globalaccess']         = "Zezw�l na globalny dost�p?";
    $lang['allow_group_edit']           = "Zezwoli� wszystkim z grupy na edycj�?";
    $lang['set_email_owner']            = "Zawsze wysy�a� emaila ze zmianami do w�a�ciciela?";
    $lang['set_email_group']            = "Zawsze wysy�a� emaila ze zmianami do grupy u�ytkownik�w?";
    $lang['project_listing_order']      = "Kolejno�� wy�wietlania projekt�w";
    $lang['task_listing_order']         = "Kolejno�� wy�wietlania zada�";
    $lang['configuration']              = "Konfiguracja";

//archive
    $lang['archived_projects']          = "Projekty archiwalne";

//contacts
    $lang['firstname']                  = "Imi�:";
    $lang['lastname']                   = "Nazwisko:";
    $lang['company']                    = "Firma:";
    $lang['home_phone']                 = "Telefon domowy:";
    $lang['mobile']                     = "Kom�rka:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Telefon s�u�bowy:";
    $lang['address']                    = "Adres:";
    $lang['postal']                     = "Kod pocztowy:";
    $lang['city']                       = "Miasto:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Uwagi:";
    $lang['add_contact']                = "Dodaj kontakt";
    $lang['del_contact']                = "Usu� kontakt";
    $lang['contact_info']               = "Informacje o kontakcie";
    $lang['contacts']                   = "Kontakty";
    $lang['contact_add_info']           = "Je�li dodasz nazw� przedsi�biorstwa to b�dzie ona wy�wietlona zamiast personali�w u�ytkownika.";
    $lang['show_contact']               = "Poka� kontakty";
    $lang['edit_contact']               = "Edytuj kontakty";
    $lang['contact_submit']             = "Zaakceptuj kontakt";
    $lang['contact_warn']               = "Nie wprowadzi�e� wszystkich warto�ci w pola kontaktu; prosz� cofnij si� i dodaj minimum imi� i nazwisko";

 //files
    $lang['manage_files']               = "Zarz�dzaj plikami";
    $lang['no_files']                   = "Brak plik�w do zarz�dzania";
    $lang['no_file_uploads']            = "Konfiguracja serwera nie zezwala na taki upload";
    $lang['file']                       = "Plik:";
    $lang['uploader']                   = "Uploader:";
    $lang['files_assoc_project']        = "Pliki powi�zane z tym projektem";
    $lang['files_assoc_task']           = "Pliki powi�zane z tym zadaniem";
    $lang['file_admin']                 = "Administrator plik�w";
    $lang['add_file']                   = "Dodaj plik";
    $lang['files']                      = "Pliki";
    $lang['file_choose']                = "Plik do uploadowania:";
    $lang['upload']                     = "Uploaduj";
    $lang['file_email_owner']           = "Potwierdzenie emailowe nowego w�a�ciciela plik�w?";
    $lang['file_email_usergroup']       = "Potwierdzenie emailowe nowego w�a�ciciela grupy u�ytkownik�w?";
    $lang['max_file_sprt']              = "Plik do uploadowania musi by� mniejszy ni� %s kb.";
    $lang['file_submit']                = "Zatwierd� plik";
    $lang['no_upload']                  = "�aden plik nie zosta� uploadowany. Prosz� wr�� i spr�buj ponownie.";
    $lang['file_too_big_sprt']          = "Maksymalny upload wynosi %s bajt�w. Tw�j upload by� za du�y dlatego zosta� usuni�ty.";
    $lang['del_file_javascript_sprt']   = "Czy jeste� pewien �e chcesz skasowa� %s ?";


 //forum
    $lang['orig_message']               = "Oryginalna wiadomo��:";
    $lang['post']                       = "Publikuj!";
    $lang['message']                    = "Wiadomo��:";
    $lang['post_reply_sprt']            = "Umie�� odpowied� na wiadomo�� od '%1\$s' dotycz�c� '%2\$s'";
    $lang['post_message_sprt']          = "Odpisz do: '%s'";
    $lang['forum_email_owner']          = "Wy�lij emailem wiadomo�� z forum do w�a�ciciela?";
    $lang['forum_email_usergroup']      = "Wy�lij emailem wiadomo�ci z forum do grupy u�ytkownik�w?";
    $lang['reply']                      = "Odpowiedz";
    $lang['new_post']                   = "Nowa wiadomo��";
    $lang['public_user_forum']          = "Opublikuj forum u�ytkownika";
    $lang['private_forum_sprt']         = "Prywatne forum dla grupy u�ytkownik�w '%s'";
    $lang['forum_submit']               = "Wnie� na forum";
    $lang['no_message']                 = "Brak wiadomo�ci! Prosz� cofnij si� i spr�buj ponownie";
    $lang['add_reply']                  = "Dodaj odpowied�";
    $lang['last_post_sprt']             = "Ostatnie publikacje %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Ostatnio na forum";
    $lang['forum_search']               = "Przeszukuj forum";
    $lang['no_results']                 = "Nie znaleziono rezultat�w dla '%s'";
    $lang['search_results']             = "Znaleziono %1\$s rezultat�w dla '%2\$s'<br />Pokazuje rezultaty %3\$s do %4\$s";

 //includes
    $lang['report']                     = "Raport";
    $lang['warning']                    = "<h1>Przepraszam!</h1><p>Nie jest mo�liwym wykonanie tego zapytania w tej chwili. Prosz� spr�buj p�niej.</p>";
    $lang['home_page']                  = "Strona g��wna";
    $lang['summary_page']               = "Projekty";
    $lang['log_out']                    = "Wyloguj";
    $lang['main_menu']                  = "G��wne menu";
    $lang['archive']                    = "Archiwum";
    $lang['user_homepage_sprt']         = "%s strona g��wna";
    $lang['missing_field_javascript']   = "Prosz� wprowad� warto�� dla brakuj�cego pola";
    $lang['invalid_date_javascript']    = "Prosz� wybra� prawid�ow� dat� kalendarza";
    $lang['finish_date_javascript']     = "Wpisana data si�ga dalej ni� data zako�czenia projektu!";
    $lang['security_manager']           = "Menad�er bezpiecze�stwa";
    $lang['session_timeout_sprt']       = "Dost�p wzbroniony; ostatnie dzia�anie by�o %1\$d minut temu i czasu up�yn�� %2\$d minut temu; prosz� <a href=\"%3\$sindex.php\">zaloguj si� ponownie</a>";
    $lang['access_denied']              = "Dost�p wzbroniony";
    $lang['private_usergroup_no_access']= "Przepraszam; ten obszar nale�y do prywatnej grupy u�ytkownik�w a ty nie masz uprawnie� dost�pu do niego.";
    $lang['invalid_date']               = "Nieprawid�owa data";
    $lang['invalid_date_sprt']          = "Wprowadzona data %s nie jest prawid�ow� dat� kalendarzow� (Sprawd� numer dni w miesi�cu).<br />Prosz� cofnij si� i wprowad� prawid�ow� dat�.";


 //taskgroups
    $lang['taskgroup_name']             = "Nazwa grupy zada�:";
    $lang['taskgroup_description']      = "Prosty opis grupy zada�:";
    $lang['add_taskgroup']              = "Dodaj grup� zada�";
    $lang['add_new_taskgroup']          = "Dodaj now� grup� zada�";
    $lang['edit_taskgroup']             = "Edytuj grup� zada�";
    $lang['taskgroup_manage']           = "Zarz�dzanie grupami zada�";
    $lang['no_taskgroups']              = "Nie zdefiniowano grupy zada�";
    $lang['manage_taskgroups']          = "Zarz�dzaj grup� zada�";
    $lang['taskgroups']                 = "Grupy zada�";
    $lang['taskgroup_dup_sprt']         = "Istnieje ju� taka grupa zada� '%s'. Prosz� cofnij si� i wybierz now� nazw�.";
    $lang['info_taskgroup_manage']      = "Info o zarz�dzaniu grupami zada�";

 //usergroups
    $lang['usergroup_name']             = "Nazwa grupy u�ytkownik�w:";
    $lang['usergroup_description']      = "Prosty opis grupy u�ytkownik�w:";
    $lang['members']                    = "Cz�onkowie:";
    $lang['private_usergroup']          = "Prywatna grupa u�ytkownik�w";
    $lang['add_usergroup']              = "Dodaj grup� u�ytkownik�w";
    $lang['add_new_usergroup']          = "Dodaj now� grup� u�ytkownik�w";
    $lang['edit_usergroup']             = "Edytuj grup� u�ytkownik�w";
    $lang['usergroup_manage']           = "Zarz�dzanie grupami u�ytkownik�w";
    $lang['no_usergroups']              = "Nie zdefiniowano grup u�ytkownik�w";
    $lang['manage_usergroups']          = "Zarz�dzaj grupami u�ytkownik�w";
    $lang['usergroups']                 = "Grupy u�ytkownik�w";
    $lang['usergroup_dup_sprt']         = "Istnieje ju� grupa '%s'. Prosz� cofnij si� i wybierz now� nazw�.";
    $lang['info_usergroup_manage']      = "Info o zarz�dzaniu grupami u�ytkownik�w";

 //users
    $lang['login_name']                 = "Nazwa u�ytkownika";
    $lang['full_name']                  = "Pe�na nazwa";
    $lang['password']                   = "Has�o";
    $lang['blank_for_current_password'] = "(Pozostaw puste dla aktualnego has�a)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Admin";
    $lang['private_user']               = "Prywatny u�ytkownik";
    $lang['normal_user']                = "Normalny u�ytkownik";
    $lang['is_admin']                   = "Czy jest adminem?";
    $lang['is_guest']                   = "Czy jest go�ciem?";
    $lang['guest']                      = "Go��";
    $lang['user_info']                  = "Informacje o u�ytkowniku";
    $lang['deleted_users']              = "Skasowani u�ytkownicy";
    $lang['no_deleted_users']           = "Brak skasowanych u�ytkownik�w.";
    $lang['revive']                     = "Przegl�d";
    $lang['permdel']                    = "Kasowanie permanentne";
    $lang['permdel_javascript_sprt']    = "To permanentnie skasuje wszystkie rekordy u�ytkownika i powi�zane z nim zadania dla %s. Czy jeste� pewien �e chcesz tego?";
    $lang['add_user']                   = "Dodaj u�ytkownika";
    $lang['edit_user']                  = "Edytuj u�ytkownika";
    $lang['no_users']                   = "Brak u�ytkownik�w znanych systemowi";
    $lang['users']                      = "U�ytkownicy";
    $lang['existing_users']             = "Istniej�cy u�ytkownicy";
    $lang['private_profile']            = "Ten u�ytkownik ma prywatny profil, kt�ry nie mo�e by� widziany przez ciebie.";
    $lang['private_usergroup_profile']  = "(Ten u�ytkownik jest cz�onkiem prywatnej grupy u�ytkownik�w, kt�ra nie mo�e by� widziana przez ciebie)";
    $lang['email_users']                = "Email do u�ytkownik�w";
    $lang['select_usergroup']           = "Selekcja grupy u�ytkownik�w poni�ej:";
    $lang['subject']                    = "Temat:";
    $lang['message_sent_maillist']      = "We wszystkich przypadkach wiadomo�� jest kopiowana do listy mailingowej.";
    $lang['who_online']                 = "Kto jest online?";
    $lang['edit_details']               = "Edytuj szczeg�y u�ytkownika";
    $lang['show_details']               = "Poka� szczeg�y u�ytkownika";
    $lang['user_deleted']               = "Ten u�ytkownik zosta� skasowany!";
    $lang['no_usergroup']               = "Ten u�ytkownik nie jest cz�onkiem �adnej grupy u�ytkownik�w";
    $lang['not_usergroup']              = "(Nie jest cz�onkiem �adnej grupy u�ytkownik�w)";
    $lang['no_password_change']         = "(Twoje istniej�ce has�o nie zosta�o zmienione)";
    $lang['last_time_here']             = "Ostatnim razem widziany tutaj:";
    $lang['number_items_created']       = "Liczna utworzonych element�w:";
    $lang['number_projects_owned']      = "Liczba posiadanych projekt�w:";
    $lang['number_tasks_owned']         = "Liczba posiadanych zada�:";
    $lang['number_tasks_completed']     = "Liczba uko�czonych zada�:";
    $lang['number_forum']               = "Liczba opublikowanych wiadomo�ci na forum:";
    $lang['number_files']               = "Liczba uploadowanych plik�w:";
    $lang['size_all_files']             = "Ca�kowita wielko�� posiadanych plik�w:";
    $lang['owned_tasks']                = "W�asne zadania";
    $lang['invalid_email']              = "Nieprawid�owy adres email";
    $lang['invalid_email_given_sprt']   = "Email adres '%s' jest nieprawid�owy. Prosz� cofnij si� i spr�buj ponownie.";
    $lang['duplicate_user']             = "Zduplikowany u�ytkownik";
    $lang['duplicate_change_user_sprt'] = "U�ytkownik '%s' ju� istnieje w systemie. Prosz� cofnij si� i zmien imi� lub nazwisko.";
    $lang['value_missing']              = "Brak wpisu w polu";
    $lang['field_sprt']                 = "Dla '%s' brakuje wpisu w polu. Prosz� wr�� i wype�nij je.";
    $lang['admin_priv']                 = "UWAGA: Przydzielono ci uprawnienia administratora.";
    $lang['manage_users']               = "Zarz�dzaj u�ytkownikami";
    $lang['users_online']               = "Zalogowani u�ytkownicy";
    $lang['online']                     = "Zalogowani kr�cej ni� 60 minut temu.";
    $lang['not_online']                 = "Odpoczywaj�";
    $lang['user_activity']              = "Aktywno�� u�ytkownik�w";

  //tasks
    $lang['add_new_task']               = "Dodaj nowe zadanie";
    $lang['priority']                   = "Priorytet";
    $lang['parent_task']                = "Nadrz�dne zadanie";
    $lang['creation_time']              = "Data utworzenia";
    $lang['by_sprt']                    = "%1\$s przez %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Nazwa projektu";
    $lang['task_name']                  = "Nazwa zadania";
    $lang['deadline']                   = "Data zako�czenia";
    $lang['taken_from_parent']          = "(wzi�te z nadrz�dnego)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "W�a�ciciel zadania";
    $lang['project_owner']              = "W�a�ciciel projektu";
    $lang['taskgroup']                  = "Grupa zada�";
    $lang['usergroup']                  = "Grupa u�ytkownik�w";
    $lang['nobody']                     = "Nikt";
    $lang['none']                       = "Brak";
    $lang['no_group']                   = "Brak grupy";
    $lang['all_groups']                 = "wszystkie grupy";
    $lang['all_users']                  = "Wszyscy u�ytkownicy";
    $lang['all_users_view']             = "Wszyscy u�ytkownicy mog� zobaczy� ten element?";
    $lang['group_edit']                 = "Ktokolwiek z grupy mo�e edytowa�?";
    $lang['project_description']        = "Opis projektu";
    $lang['task_description']           = "Opis zadania";
    $lang['email_owner']                = "Wy�lij email do w�a�ciciela z opisem zmian?";
    $lang['email_new_owner']            = "Wy�lij email do nowego w�a�ciciela z opisem zmian?";
    $lang['email_group']                = "Wy�lij email do grupy u�ytkownik�w z opisem zmian?";
    $lang['add_new_project']            = "Dodaj nowy projekt";
    $lang['uncategorised']              = "Nieskategoryzowany";
    $lang['due_sprt']                   = "%d dni od teraz";
    $lang['tomorrow']                   = "Jutro";
    $lang['due_today']                  = "Do dzisiaj";
    $lang['overdue_1']                  = "1 dzie� przekroczenia";
    $lang['overdue_sprt']               = "%d dni przekroczenia";
    $lang['edit_task']                  = "Edytuj zadanie";
    $lang['edit_project']               = "Edytuj projekt";
    $lang['no_reparent']                = "Brak (projekt najwy�szego poziomu)";
    $lang['del_javascript_project_sprt']= "To skasuje projekt %s. Czy jeste� pewien?";
    $lang['del_javascript_task_sprt']   = "To skasuje zadanie %s. Czy jeste� pewien?";
    $lang['add_task']                   = "Dodaj zadanie";
    $lang['add_subtask']                = "Dodaj pod zadanie";
    $lang['add_project']                = "Dodaj projekt";
    $lang['clone_project']              = "Klonuj projekt";
    $lang['clone_task']                 = "Klonuj zadanie";
    $lang['quick_jump']                 = "Szybki skok";
    $lang['no_edit']                    = "Nie jeste� w�a�cicielem tego projektu dlatewgo nie mo�esz go edytowa�";
    $lang['global']                     = "Globalne";
    $lang['delete_project']             = "Skasuj projekt";
    $lang['delete_task']                = "Skasuj zadanie";
    $lang['project_options']            = "Opcje projektu";
    $lang['task_options']               = "Opcje zadania";
    $lang['javascript_archive_project'] = "To zarchiwizuje projekt %s. Czy jeste� pewien?";
    $lang['archive_project']            = "Archiwizuj projekt";
    $lang['task_navigation']            = "Nawigacja zada�";
    $lang['new_task']                   = "Nowe zadanie";
    $lang['no_projects']                = "Brak projekt�w do wy�wietlenia";
    $lang['show_all_projects']          = "Poka� wszystkie projekty";
    $lang['show_active_projects']       = "Poka� tylko aktywne projekty";
    $lang['project_hold_sprt']          = "Projekt zawieszony od %s";
    $lang['project_planned']            = "Zaplanowane (planowane) projekty";
    $lang['percent_sprt']               = "%d%% zadania wykonane";
    $lang['project_no_deadline']        = "Brak ustawionych termin�w ko�cowych dla tego projektu";
    $lang['no_allowed_projects']        = "Brak projekt�w do kt�rych masz uprawnienia do przegl�dania";
    $lang['projects']                   = "Projekty";
    $lang['percent_project_sprt']       = "Ten projekt jest uko�czony w %d%%";
    $lang['owned_by']                   = "Posiadany przez";
    $lang['created_on']                 = "Utworzony";
    $lang['completed_on']               = "Zako�czony";
    $lang['modified_on']                = "Zmodyfikowany";
    $lang['project_on_hold']            = "Projekt wstrzymany";
    $lang['project_accessible']         = "(Ten projekt jest publicznie dost�pny dla wszystkich u�ytkownik�w)";
    $lang['task_accessible']            = "(To zadanie jest publicznie dost�pne dla wszystkich u�ytkownik�w)";
    $lang['project_not_accessible']     = "(Ten projekt jest dost�pny tylko dla cz�onk�w grup u�ytkownik�w)";
    $lang['task_not_accessible']        = "(To zadanie jest dost�pne tylko dla cz�onk�w grup u�ytkownik�w)";
    $lang['project_not_in_usergroup']   = "Ten projekt nie jest cz�ci� grupy u�ytkownik�w i jest dost�pny dla wszystkich u�ytkownik�w.";
    $lang['task_not_in_usergroup']      = "To zadanie nie jest cz�ci� grupy u�ytkownik�w i jest dost�pne dla wszystkich u�ytkownik�w.";
    $lang['usergroup_can_edit_project'] = "Ten projekt mo�e by� edytowany tylko przez cz�onk�w grupy u�ytkownik�w.";
    $lang['usergroup_can_edit_task']    = "To zadanie mo�e by� edytowane tylko przez cz�onk�w grupy u�ytkownik�w.";
    $lang['i_take_it']                  = "Bior� to:)";
    $lang['i_finished']                 = "Sko�czy�em to!";
    $lang['i_dont_want']                = "Nie chc� si� d�u�ej tym zajmowa�";
    $lang['take_over_project']          = "Zajm� si� tym";
    $lang['take_over_task']             = "Zajm� si� tym zadaniem";
    $lang['task_info']                  = "Informacje o zadaniu";
    $lang['project_details']            = "Szczeg�y projektu";
    $lang['todo_list_for']              = "Lista Do_Zrobienia dla: ";
    $lang['due_in_sprt']                = " (w ci�gu %d dni)";
    $lang['due_tomorrow']               = " (do jutra)";
    $lang['no_assigned']                = "Brak niezako�czonych zada� przypisanych do tego u�ytkownika.";
    $lang['todo_list']                  = "Lista Do-Zrobienia";
    $lang['summary_list']               = "Lista podsumowania";
    $lang['task_submit']                = "Dostarczenie zadania";
    $lang['not_owner']                  = "Dost�p wzbroniony. Jakkolwiek nie jeste� w�a�cicielem; lub nie posiadasz wystarczaj�cych uprawnie�";
    $lang['missing_values']             = "Niewystarczaj�ca ilo�� wype�nionych p�l; prosz� cofnij si� i spr�buj ponownie";
    $lang['future']                     = "Przysz�o��";
    $lang['flags']                      = "Flagi";
    $lang['owner']                      = "W�a�ciciel";
    $lang['group']                      = "Grupa";
    $lang['by_usergroup']               = " (poprzez grup� u�ytk.)";
    $lang['by_taskgroup']               = " (poprzez grup� zada�)";
    $lang['by_deadline']                = " (po terminach zako�czenia)";
    $lang['by_status']                  = " (poprzez status)";
    $lang['by_owner']                   = " (po w�a�cicielu)";
    $lang['by_priority']                = " (po priorytecie)";
    $lang['project_cloned']             = "Projekt do sklonowania:";
    $lang['task_cloned']                = "Zadanie do sklonowania:";
    $lang['note_clone']                 = "Uwaga: Zadanie b�dzie sklonowane jako nowy projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendarz";
    $lang['normal_version']             = "Wersja normalna";
    $lang['print_version']              = "Wersja do druku";
    $lang['condensed_view']             = "Widok skondensowany";
    $lang['full_view']                  = "Pe�ny widok";
    $lang['icalendar']                  = "iKalendarz";

?>
