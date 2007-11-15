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
                            "To jest informacja ".MANAGER_NAME." ¿e plik zosta³ za³adowany w ".$email_date." przez %1\$s.\n\n".
                            "Plik:        %2\$s\n".
                            "Opis: %3\$s\n\n".
                            "Projekt:     %4\$s\n".
                            "Zadanie:        %5\$s\n\n".
                            "Proszê wejd¼ na stronê w celu uzyskania szczegó³owych informacji.\n\n".
                            BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nowa wiadomo¶æ na forum: %s";
$email_forum_post         = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e zosta³a og³oszona nowa wiadomo¶æ na forum ".$email_date." przez %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Proszê wejd¼ na stronê w celu uzyskania szczegó³owych informacji.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e zosta³a og³oszona nowa wiadomo¶æ na forum ".$email_date." przez %1\$s.\n\n".
                            "Ta wiadomo¶æ odnosi siê do wcze¶niejszej odpowiedzi wykonanej przez %2\$s.\n\n".
                            "¬ród³owa wiadomo¶æ:\n%3\$s\n\n".
                            "----\n\n".
                            "Nowa odpowied¼:\n%4\$s\n\n".
                            "----\n\n".
                            "Proszê wejd¼ na stronê w celu uzyskania szczegó³owych informacji.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Zadanie:     %2\$s\n".
                            "Status:   %3\$s\n".
                            "W³a¶ciciel:    %4\$s ( %5\$s )\n".
                            "Tekst:\n%6\$s\n\n".
                            "Proszê wejd¼ na stronê w celu uzyskania szczegó³owych informacji.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Twój projekt zosta³ przejêty";
$title_takeover_task      = ABBR_MANAGER_NAME.": Twoje zadanie zosta³o przejête";

$email_takeover_task      = "Witam,\n\n".
                            " To jest informacja ".MANAGER_NAME." dla ciebie, ¿e zadanie,którego by³e¶ w³a¶cicielem zosta³o przejête przez administratora ".$email_date.".\n\n";
$email_takeover_project   = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." la ciebie, ¿e projekt, którego by³e¶ w³a¶cicielem zosta³o przejête przez administratora ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nowy projekt dla Ciebie";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nowe zadanie dla Ciebie";

$email_new_owner_project  = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e ten projekt zosta³ utworzony w ".$email_date.", i ty jeste¶ w³a¶cicielem tego projektu.\n\n".
                            "Wiêcej szczegó³ów:\n\n";

$email_new_owner_task     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e zadanie zosta³o utworzone ".$email_date.", i jeste¶ w³a¶cicielem tego zadania.\n\n".
                            "Tutaj wiêcej szczegó³ów:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nowy projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nowe zadanie: %s";

$email_new_group_project  = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e zosta³ utworzony nowy projekt w ".$email_date."\n\n".
                            "Wiêcej szczegó³ów:\n\n";

$email_new_group_task     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e zosta³o utworzone nowe zadanie w ".$email_date."\n\n".
                            "Tutaj wiêcej szczegó³ów:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Twój projekt zosta³ uaktualniony";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Twoje zadanie zosta³o uaktualnione";

$email_edit_owner_project = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e projekt, którego jeste¶ w³ascicielem zosta³ zmieniony w ".$email_date.".\n\n".
                            "Tutaj s± szczegó³owe informacje:\n\n";

$email_edit_owner_task    = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e zadanie, które posiada³e¶ zosta³o zmienione w ".$email_date.".\n\n".
                            "Tutaj s± szczegó³owe informacje:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt zaktualizowany";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Zadanie zaktualizowane";

$email_edit_group_project = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e projekt posiadany przez %s zosta³ zmieniony w ".$email_date.".\n\n".
                            "Tutaj s± szczegó³owe informacje:\n\n";

$email_edit_group_task    = "Witam,\n\n".
                            "To jest informacje ".MANAGER_NAME." ¿e zadanie posiadane przez  %s zosta³o zmienione w ".$email_date.".\n\n".
                            "Tutaj s± szczegó³owe informacje:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt skasowany";
$title_delete_task        = ABBR_MANAGER_NAME.": Zadanie skasowane";

$email_delete_project     = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e projekt który posiada³e¶ zosta³ skasowany ".$email_date."\n\n".
                            "Dziêkujemy za prowadzenie projektu podczas jego trwania.\n\n";

$email_delete_task        = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e zadanie które posiada³e¶ zosta³o skasowane w ".$email_date."\n\n".
                            "Dziêkujemy za prowadzenie zadania  podczas jego trwania.\n\n";

$delete_list              = "Projekt: %1\$s\n".
                            "Zadanie:   %2\$s\n".
                            "Status: %3\$s\n\n".
                            "Tekst:\n%4\$s\n\n";

$title_welcome            = "Witamy w ".ABBR_MANAGER_NAME;
$email_welcome            = "Witam,\n\nTo jest informacja ".MANAGER_NAME." ¿e webcollam zaprasza ciê do siebie ;) w ".$email_date.".\n\n".
                            "Jako, ¿e jeste¶ nowy tutaj, postaram ci siê wyja¶niæ kilka spraw, aby¶ móg³ szybko przyst±piæ do pracy\n\n".
                            "Po pierwsze to jest narzêdzie s³u¿±ce do zarz±dzania projektami. G³ówny ekran poka¿e ci projekty, które s± obecnie dostêpne. ".
                            "Je¶li klikniesz na jedn± z nazw mo¿esz znale¼æ siebie w czê¶ci zadañ. To jest miejsce gdzie toczy siê ca³± praca.\n\n".
                            "Ka¿da pozycja któr± wy¶lesz, lub ka¿de zadanie, które wyedytujesz bêdzie widoczne dla innych u¿ytkowników jako 'new' lub 'updated'. ".
			    "To równie¿ dzia³a w drug± stronê i pozwala tobie skupiæ uwagê na aktywnym punkcie pracy.\n\n".
                            "Mo¿esz równie¿ przej±æ na w³asno¶æ zadanie, je¶li stwierdzisz, ¿e posiadasz takie uprawnienia do edycji, wraz z nale¿±cymi do zadania postami na forum. ".
                            "Podczas postêpów w pracy, proszê wyedytuj zadania opisowo, zmieñ status tak by pozostali mogli ¶ledziæ twoje postêpy. ".
                            "\n\nMogê tylko ¿yczyæ ci sukcesów i proszê napisz na email ".EMAIL_ADMIN." je¶li utkniesz w jakim¶ punkcie.\n\n --¯yczê powodzenia !\n\n".
                            "Login:      %1\$s\n".
                            "Has³o:   %2\$s\n\n".
                            "Grupa u¿ytkowników: %3\$s".
                            "Nazwa:       %4\$s\n".
                            "Strona:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Edycja konta przez Admina";
$email_user_change1       = "Witam,\n\n".
                            "To jest informacja ".MANAGER_NAME." ¿e twoje konto zosta³o zmienione w ".$email_date." przez %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Has³o:   %4\$s\n\n".
                            "Grupa u¿ytkowników: %5\$s".
                            "Nazwa:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Edycja twojego konta";
$email_user_change2         = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." potwierdzaj±ca ¿e z powodzeniem uda³o ci siê zmieniæ ustawienia konta w ".$email_date.".\n\n".
                              "Login:    %1\$s\n".
                              "Has³o: %2\$s\n\n".
                              "Nazwa:     %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Edycja twojego konta";
$email_user_change3         = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." ¿e uda³o ci siê zmieniæ ustawienia swojego konta w ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "Twoje dotychczasowe has³o nie zosta³o zmienione.\n\n".
                              "Nazwa:  %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Konto reaktywowane";
$email_revive               = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." ¿e twoje konto zosta³o ponownie w³±czone w ".$email_date.".\n\n".
                              "Login (nazwa): %1\$s\n".
                              "Nazwa u¿ytkownika:  %2\$s\n\n".
                              "Nie mo¿emy wys³aæ ci has³a poniewa¿ jest ono zaszyfrowane. \n\n".
                              "Je¶li zapomnia³e¶ has³a napisz do administratora ".EMAIL_ADMIN." w celu za³o¿enia nowego has³a.";

$title_delete_user          = ABBR_MANAGER_NAME.": Konto usuniête.";
$email_delete_user          = "Witam,\n\n".
                              "To jest informacja ".MANAGER_NAME." ¿e twoje konto zosta³o z dezaktywowane w ".$email_date.".\n\n".
                              "¯a³ujemy, ¿e odszed³e¶, jednocze¶nie dziêkujemy za po¶wiêcon± pracê!\n\n".
                              "Je¶li uwa¿asz, ¿e to jaka¶ pomy³ka lub b³±d systemu, proszê skontaktuj siê z administratorem ".EMAIL_ADMIN.".";

?>
