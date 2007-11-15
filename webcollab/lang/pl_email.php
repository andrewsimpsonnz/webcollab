<?php
/*
  $Id: en_email.php 1641 2006-09-19 08:42:40Z andrewsimpson $

  WebCollab
  ---------------------------------------
  Thi file created 2003 by Andrew Simpson

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

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": uploadowano nowy plik: %s";
$email_file_post          = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e plik zosta� za�adowany w ".$email_date." przez %1\$s.\n\n".
                            "Plik:        %2\$s\n".
                            "Opis: %3\$s\n\n".
                            "Projekt:     %4\$s\n".
                            "Zadanie:        %5\$s\n\n".
                            "Prosz� wejd� na stron� w celu uzyskania szczeg�owych informacji.\n\n".
                            BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nowa wiadomo�� na forum: %s";
$email_forum_post         = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e zosta�a og�oszona nowa wiadomo�� na forum ".$email_date." przez %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Prosz� wejd� na stron� w celu uzyskania szczeg�owych informacji.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e zosta�a og�oszona nowa wiadomo�� na forum ".$email_date." przez %1\$s.\n\n".
                            "Ta wiadomo�� odnosi si� do wcze�niejszej odpowiedzi wykonanej przez %2\$s.\n\n".
                            "�r�d�owa wiadomo��:\n%3\$s\n\n".
                            "----\n\n".
                            "Nowa odpowied�:\n%4\$s\n\n".
                            "----\n\n".
                            "Prosz� wejd� na stron� w celu uzyskania szczeg�owych informacji.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Zadanie:     %2\$s\n".
                            "Status:   %3\$s\n".
                            "W�a�ciciel:    %4\$s ( %5\$s )\n".
                            "Tekst:\n%6\$s\n\n".
                            "Prosz� wejd� na stron� w celu uzyskania szczeg�owych informacji.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Tw�j projekt zosta� przej�ty";
$title_takeover_task      = ABBR_MANAGER_NAME.": Twoje zadanie zosta�o przej�te";

$email_takeover_task      = "Witam,\n\n".
                            " To jest informacja ".MANAGER_NAME." dla ciebie, �e zadanie,kt�rego by�e� w�a�cicielem zosta�o przej�te przez administratora ".$email_date.".\n\n";
$email_takeover_project   = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." la ciebie, �e projekt, kt�rego by�e� w�a�cicielem zosta�o przej�te przez administratora ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nowy projekt dla Ciebie";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nowe zadanie dla Ciebie";

$email_new_owner_project  = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e ten projekt zosta� utworzony w ".$email_date.", i ty jeste� w�a�cicielem tego projektu.\n\n".
                            "Wi�cej szczeg��w:\n\n";

$email_new_owner_task     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e zadanie zosta�o utworzone ".$email_date.", i jeste� w�a�cicielem tego zadania.\n\n".
                            "Tutaj wi�cej szczeg��w:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nowy projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nowe zadanie: %s";

$email_new_group_project  = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e zosta� utworzony nowy projekt w ".$email_date."\n\n".
                            "Wi�cej szczeg��w:\n\n";

$email_new_group_task     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e zosta�o utworzone nowe zadanie w ".$email_date."\n\n".
                            "Tutaj wi�cej szczeg��w:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Tw�j projekt zosta� uaktualniony";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Twoje zadanie zosta�o uaktualnione";

$email_edit_owner_project = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e projekt, kt�rego jeste� w�ascicielem zosta� zmieniony w ".$email_date.".\n\n".
                            "Tutaj s� szczeg�owe informacje:\n\n";

$email_edit_owner_task    = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e zadanie, kt�re posiada�e� zosta�o zmienione w ".$email_date.".\n\n".
                            "Tutaj s� szczeg�owe informacje:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt zaktualizowany";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Zadanie zaktualizowane";

$email_edit_group_project = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e projekt posiadany przez %s zosta� zmieniony w ".$email_date.".\n\n".
                            "Tutaj s� szczeg�owe informacje:\n\n";

$email_edit_group_task    = "Witam,\n\n".
                            "To jest informacje ".MANAGER_NAME." �e zadanie posiadane przez  %s zosta�o zmienione w ".$email_date.".\n\n".
                            "Tutaj s� szczeg�owe informacje:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt skasowany";
$title_delete_task        = ABBR_MANAGER_NAME.": Zadanie skasowane";

$email_delete_project     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e projekt kt�ry posiada�e� zosta� skasowany ".$email_date."\n\n".
                            "Dzi�kujemy za prowadzenie projektu podczas jego trwania.\n\n";

$email_delete_task        = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e zadanie kt�re posiada�e� zosta�o skasowane w ".$email_date."\n\n".
                            "Dzi�kujemy za prowadzenie zadania  podczas jego trwania.\n\n";

$delete_list              = "Projekt: %1\$s\n".
                            "Zadanie:   %2\$s\n".
                            "Status: %3\$s\n\n".
                            "Tekst:\n%4\$s\n\n";

$title_welcome            = "Witamy w ".ABBR_MANAGER_NAME;
$email_welcome            = "Witam,\n\nTo jest informacja ".MANAGER_NAME." �e webcollam zaprasza ci� do siebie ;) w ".$email_date.".\n\n".
                            "Jako, �e jeste� nowy tutaj, postaram ci si� wyja�ni� kilka spraw, aby� m�g� szybko przyst�pi� do pracy\n\n".
                            "Po pierwsze to jest narz�dzie s�u��ce do zarz�dzania projektami. G��wny ekran poka�e ci projekty, kt�re s� obecnie dost�pne. ".
                            "Je�li klikniesz na jedn� z nazw mo�esz znale�� siebie w cz�ci zada�. To jest miejsce gdzie toczy si� ca�� praca.\n\n".
                            "Ka�da pozycja kt�r� wy�lesz, lub ka�de zadanie, kt�re wyedytujesz b�dzie widoczne dla innych u�ytkownik�w jako 'new' lub 'updated'. ".
			    "To r�wnie� dzia�a w drug� stron� i pozwala tobie skupi� uwag� na aktywnym punkcie pracy.\n\n".
                            "Mo�esz r�wnie� przej�� na w�asno�� zadanie, je�li stwierdzisz, �e posiadasz takie uprawnienia do edycji, wraz z nale��cymi do zadania postami na forum. ".
                            "Podczas post�p�w w pracy, prosz� wyedytuj zadania opisowo, zmie� status tak by pozostali mogli �ledzi� twoje post�py. ".
                            "\n\nMog� tylko �yczy� ci sukces�w i prosz� napisz na email ".EMAIL_ADMIN." je�li utkniesz w jakim� punkcie.\n\n --�ycz� powodzenia !\n\n".
                            "Login:      %1\$s\n".
                            "Has�o:   %2\$s\n\n".
                            "Grupa u�ytkownik�w: %3\$s".
                            "Nazwa:       %4\$s\n".
                            "Strona:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Edycja konta przez Admina";
$email_user_change1       = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." �e twoje konto zosta�o zmienione w ".$email_date." przez %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Has�o:   %4\$s\n\n".
                            "Grupa u�ytkownik�w: %5\$s".
                            "Nazwa:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Edycja twojego konta";
$email_user_change2         = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." potwierdzaj�ca �e z powodzeniem uda�o ci si� zmieni� ustawienia konta w ".$email_date.".\n\n".
                              "Login:    %1\$s\n".
                              "Has�o: %2\$s\n\n".
                              "Nazwa:     %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Edycja twojego konta";
$email_user_change3         = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." �e uda�o ci si� zmieni� ustawienia swojego konta w ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "Twoje dotychczasowe has�o nie zosta�o zmienione.\n\n".
                              "Nazwa:  %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Konto reaktywowane";
$email_revive               = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." �e twoje konto zosta�o ponownie w��czone w ".$email_date.".\n\n".
                              "Login (nazwa): %1\$s\n".
                              "Nazwa u�ytkownika:  %2\$s\n\n".
                              "Nie mo�emy wys�a� ci has�a poniewa� jest ono zaszyfrowane. \n\n".
                              "Je�li zapomnia�e� has�a napisz do administratora ".EMAIL_ADMIN." w celu za�o�enia nowego has�a.";

$title_delete_user          = ABBR_MANAGER_NAME.": Konto usuni�te.";
$email_delete_user          = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." �e twoje konto zosta�o z dezaktywowane w ".$email_date.".\n\n".
                              "�a�ujemy, �e odszed�e�, jednocze�nie dzi�kujemy za po�wi�con� prac�!\n\n".
                              "Je�li uwa�asz, �e to jaka� pomy�ka lub b��d systemu, prosz� skontaktuj si� z administratorem ".EMAIL_ADMIN.".";

?>
