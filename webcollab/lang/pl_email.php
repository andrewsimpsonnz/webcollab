<?php
/*
  $Id: en_email.php 1641 2006-09-19 08:42:40Z andrewsimpson $

  WebCollab
  ---------------------------------------

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful, but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave,
  Cambridge, MA 02139, USA.


  Function:
  ---------

  Email text language files for 'pl' (Polish)

  Translator: Konrad Komada <konrad at komada.org>

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": uploadowano nowy plik: %s";
$email_file_post          = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że plik został załadowany w ".$email_date." przez %1\$s.\n\n".
                            "Plik:        %2\$s\n".
                            "Opis: %3\$s\n\n".
                            "Projekt:     %4\$s\n".
                            "Zadanie:        %5\$s\n\n".
                            "Proszę wejdź na stronę w celu uzyskania szczegółowych informacji.\n\n".
                            BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nowa wiadomość na forum: %s";
$email_forum_post         = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że została ogłoszona nowa wiadomość na forum ".$email_date." przez %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Proszę wejdź na stronę w celu uzyskania szczegółowych informacji.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że została ogłoszona nowa wiadomość na forum ".$email_date." przez %1\$s.\n\n".
                            "Ta wiadomość odnosi się do wcześniejszej odpowiedzi wykonanej przez %2\$s.\n\n".
                            "Źródłowa wiadomość:\n%3\$s\n\n".
                            "----\n\n".
                            "Nowa odpowiedź:\n%4\$s\n\n".
                            "----\n\n".
                            "Proszę wejdź na stronę w celu uzyskania szczegółowych informacji.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Zadanie:     %2\$s\n".
                            "Status:   %3\$s\n".
                            "Właściciel:    %4\$s ( %5\$s )\n".
                            "Tekst:\n%6\$s\n\n".
                            "Proszę wejdź na stronę w celu uzyskania szczegółowych informacji.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Twój projekt został przejęty";
$title_takeover_task      = ABBR_MANAGER_NAME.": Twoje zadanie zostało przejęte";

$email_takeover_task      = "Witam,\n\n".
                            " To jest informacja ".MANAGER_NAME." dla ciebie, że zadanie,którego byłeś właścicielem zostało przejęte przez administratora ".$email_date.".\n\n";
$email_takeover_project   = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." la ciebie, że projekt, którego byłeś właścicielem zostało przejęte przez administratora ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nowy projekt dla Ciebie";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nowe zadanie dla Ciebie";

$email_new_owner_project  = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że ten projekt został utworzony w ".$email_date.", i ty jesteś właścicielem tego projektu.\n\n".
                            "Więcej szczegółów:\n\n";

$email_new_owner_task     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że zadanie zostało utworzone ".$email_date.", i jesteś właścicielem tego zadania.\n\n".
                            "Tutaj więcej szczegółów:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nowy projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nowe zadanie: %s";

$email_new_group_project  = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że został utworzony nowy projekt w ".$email_date."\n\n".
                            "Więcej szczegółów:\n\n";

$email_new_group_task     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że zostało utworzone nowe zadanie w ".$email_date."\n\n".
                            "Tutaj więcej szczegółów:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Twój projekt został uaktualniony";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Twoje zadanie zostało uaktualnione";

$email_edit_owner_project = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że projekt, którego jesteś włascicielem został zmieniony w ".$email_date.".\n\n".
                            "Tutaj są szczegółowe informacje:\n\n";

$email_edit_owner_task    = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że zadanie, które posiadałeś zostało zmienione w ".$email_date.".\n\n".
                            "Tutaj są szczegółowe informacje:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt zaktualizowany";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Zadanie zaktualizowane";

$email_edit_group_project = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że projekt posiadany przez %s został zmieniony w ".$email_date.".\n\n".
                            "Tutaj są szczegółowe informacje:\n\n";

$email_edit_group_task    = "Witam,\n\n".
                            "To jest informacje ".MANAGER_NAME." że zadanie posiadane przez  %s zostało zmienione w ".$email_date.".\n\n".
                            "Tutaj są szczegółowe informacje:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt skasowany";
$title_delete_task        = ABBR_MANAGER_NAME.": Zadanie skasowane";

$email_delete_project     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że projekt który posiadałeś został skasowany ".$email_date."\n\n".
                            "Dziękujemy za prowadzenie projektu podczas jego trwania.\n\n";

$email_delete_task        = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że zadanie które posiadałeś zostało skasowane w ".$email_date."\n\n".
                            "Dziękujemy za prowadzenie zadania  podczas jego trwania.\n\n";

$delete_list              = "Projekt: %1\$s\n".
                            "Zadanie:   %2\$s\n".
                            "Status: %3\$s\n\n".
                            "Tekst:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
                            "The members of the new usergroup are:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
                            "The members of the usergroup are:\n".
                            "%2\$s\n";

$title_welcome            = "Witamy w ".ABBR_MANAGER_NAME;
$email_welcome            = "Witam,\n\nTo jest informacja ".MANAGER_NAME." że webcollam zaprasza cię do siebie ;) w ".$email_date.".\n\n".
                            "Jako, że jesteś nowy tutaj, postaram ci się wyjaśnić kilka spraw, abyś mógł szybko przystąpić do pracy\n\n".
                            "Po pierwsze to jest narzędzie służące do zarządzania projektami. Główny ekran pokaże ci projekty, które są obecnie dostępne. ".
                            "Jeśli klikniesz na jedną z nazw możesz znaleźć siebie w części zadań. To jest miejsce gdzie toczy się całą praca.\n\n".
                            "Każda pozycja którą wyślesz, lub każde zadanie, które wyedytujesz będzie widoczne dla innych użytkowników jako 'new' lub 'updated'. ".
			    "To również działa w drugą stronę i pozwala tobie skupić uwagę na aktywnym punkcie pracy.\n\n".
                            "Możesz również przejąć na własność zadanie, jeśli stwierdzisz, że posiadasz takie uprawnienia do edycji, wraz z należącymi do zadania postami na forum. ".
                            "Podczas postępów w pracy, proszę wyedytuj zadania opisowo, zmień status tak by pozostali mogli śledzić twoje postępy. ".
                            "\n\nMogę tylko życzyć ci sukcesów i proszę napisz na email ".EMAIL_ADMIN." jeśli utkniesz w jakimś punkcie.\n\n --Życzę powodzenia !\n\n".
                            "Login:      %1\$s\n".
                            "Hasło:   %2\$s\n\n".
                            "Grupa użytkowników: %3\$s".
                            "Nazwa:       %4\$s\n".
                            "Strona:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Edycja konta przez Admina";
$email_user_change1       = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." że twoje konto zostało zmienione w ".$email_date." przez %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Hasło:   %4\$s\n\n".
                            "Grupa użytkowników: %5\$s".
                            "Nazwa:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Edycja twojego konta";
$email_user_change2         = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." potwierdzająca że z powodzeniem udało ci się zmienić ustawienia konta w ".$email_date.".\n\n".
                              "Login:    %1\$s\n".
                              "Hasło: %2\$s\n\n".
                              "Nazwa:     %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Edycja twojego konta";
$email_user_change3         = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." że udało ci się zmienić ustawienia swojego konta w ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "Twoje dotychczasowe hasło nie zostało zmienione.\n\n".
                              "Nazwa:  %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Konto reaktywowane";
$email_revive               = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." że twoje konto zostało ponownie włączone w ".$email_date.".\n\n".
                              "Login (nazwa): %1\$s\n".
                              "Nazwa użytkownika:  %2\$s\n\n".
                              "Nie możemy wysłać ci hasła ponieważ jest ono zaszyfrowane. \n\n".
                              "Jeśli zapomniałeś hasła napisz do administratora ".EMAIL_ADMIN." w celu założenia nowego hasła.";

$title_delete_user          = ABBR_MANAGER_NAME.": Konto usunięte.";
$email_delete_user          = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." że twoje konto zostało z dezaktywowane w ".$email_date.".\n\n".
                              "Żałujemy, że odszedłeś, jednocześnie dziękujemy za poświęconą pracę!\n\n".
                              "Jeśli uważasz, że to jakaś pomyłka lub błąd systemu, proszę skontaktuj się z administratorem ".EMAIL_ADMIN.".";

?>
