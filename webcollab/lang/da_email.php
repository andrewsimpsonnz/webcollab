<?php
/*
  $Id$

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

  Email text language files for 'da' (Danish)

  Maintainer:

  Translation by Jens Thomsen

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Indl�s ny fil: %s";
$email_file_post          = "Hello,\n\nDette er ".MANAGER_NAME." Som informerer dig om at en ny file er blevet indl�st ".$email_date." af %1\$s.\n\n".
                            "File:        %2\$s\n".
                            "Beskrivelse: %3\$s\n\n".
                            "G� til hjemmesiden efter mere information.\n\n".BASE_URL."%4\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Ny post I forum: %s";
$email_forum_post         = "Hallo,\n\nDette er ".MANAGER_NAME." informerer dig om at en ny post i forum er oprettet ".$email_date." af %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s".
                            "\n\n----\n\n".
                            "G� til hjemmesiden efter mere information.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply        = "Hallo,\n\nDette er ".MANAGER_NAME." informerer dig om at en ny post i forum er blevet oprettet ".$email_date." af %1\$s.\n\n".
                            "denne post er et svar p� en tidligere post %2\$s.\n\n".
                            "Original post:\n %3\$s\n\n".
                            "----\n".
                            "Nyt svar:\n%4\$s\n\n".
                            "----\n\n".
                            "G� til hjemmesiden efter mere information.\n\n".BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Opgave:     %2\$s\n".
                            "Status:   %3\$s\n".
                            "Ejer:    %4\$s ( %5\$s )\n".
                            "Tekst:\n%6\$s\n\n".
                            "G� til hjemmesiden efter mere information.\n\n".BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Dit projekt er overtaget";
$title_takeover_task      = ABBR_MANAGER_NAME.": Din opgave er overtaget";

$email_takeover_task      = "Hallo,\n\nDette er ".MANAGER_NAME." site som underretter dig om, at din opgave er blevet overtaget af en admin p� ".$email_date.".\n\n";
$email_takeover_project   = "Hallo,\n\nDette er ".MANAGER_NAME." som underretter dig om, at dit projekt er blevet overtaget af en admin p� ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nyt projekt til dig";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Ny opgave til dig";

$email_new_owner_project  = "Hallo,\n\nDette er ".MANAGER_NAME." som underretter dig om, at der er oprettet et projekt p� ".$email_date.", og at du er ejer af dette projekt.\n\nHer er detaljerne:\n\n";
$email_new_owner_task     = "Hallo,\n\nDette er the ".MANAGER_NAME." som underretter dig om, at der er oprettet en opgave p� ".$email_date.", og at du er ejer af denne opgave.\n\nHer er detaljerne:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nyt projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Ny opgave: %s";

$email_new_group_project  = "Hallo,\n\nDette er the ".MANAGER_NAME." som underretter dig om, at der er oprettet et projekt p� ".$email_date."\n\nHer er detaljerne:\n\n";
$email_new_group_task     = "Hallo,\n\nDette er ".MANAGER_NAME." som underretter dig om, at der er oprettet en opgave p� ".$email_date."\n\nHer er detaljerne:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Dit projekt ajourf�rt";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Din opgave ajourf�rt";

$email_edit_owner_project = "Hallo,\n\nDette er the ".MANAGER_NAME." som underretter dig om, at et projekt du ejer er blevet �ndret p� ".$email_date."\n\nHer er detaljerne:\n\n";
$email_edit_owner_task    = "Hallo,\n\nDette er the ".MANAGER_NAME." som underretter dig om, at en opgave du ejer er blevet �ndret p� ".$email_date."\n\nHer er detaljerne:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt ajourf�rt";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Opgave ajourf�rt";

$email_edit_group_project = "Hallo,\n\nDette er ".MANAGER_NAME." som underretter dig om at et projekt %1\$s ejer er �ndret p� ".$email_date.".\n\nHer er detaljerne:\n\n";
$email_edit_group_task    = "Hallo,\n\nDette er ".MANAGER_NAME." som underretter dig om at en opgave %1\$s ejer er �ndret p� ".$email_date.".\n\nHer er detaljerne:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Projekt slettet";
$title_delete_task        = ABBR_MANAGER_NAME.": Opgave slettet";

$email_delete_project     = "Hallo,\n\n".
                            "Dette er ".MANAGER_NAME." som informerer dig om, at et projekt du ejede blev slettet p� ".$email_date."\n\n".
                            "Tak for din indsats mens projektet varede.\n\n";
$email_delete_task        = "Hallo,\n\n".
                           "Dette er ".MANAGER_NAME." som informerer dig om, at en opgave du ejede blev slettet p� ".$email_date."\n\n".
                           "Tak for din indsats mens opgaven varede.\n\n";
$delete_list              = "Projekt: %s\n".
                            "Opgave:   %s\n".
                            "Status: %s\n\n".
                            "Tekst:\n%s\n\n";

$title_welcome            = "Velkommen til ".ABBR_MANAGER_NAME;
$email_welcome            = "Hallo,\n\nDette er ".MANAGER_NAME." site som byder dig velkommen til ;) on ".$email_date.".\n\n".
                            "Da du er ny her, vil jeg forklare et par ting, s� du hurtigt kan g� i gang med at arbejde\n\n".
                            "For det f�rste, dette er et projekt management v�rkt�j, hovedsiden viser dig de projekter som der i �jeblikket arbejdes p�. ".
                            "Hvis du klikker p� et af navnene, vil du finde dig selv i opgave-delen. Det er her alt arbejdet vil foreg�.\n\n".
                            "Hvert emne du sender eller opgave du redigerer vil blive vist til andre brugere som 'ny' eller 'ajourf�rt'. Det virker ogs� omvendt og".
                            "det hj�lper dig til hurtigt at finde ud af hvor der noget i gang.\n\n".
                            "Du kan ogs� tage eller f� ejerskab til opgaver, og du vil finde dig selv i stand til at redigere dem og alle poster i forum, som tilh�rer opgaven. ".
                            "N�r du arbejder dig fremad, v�r s� s� venlig at redigere dine opgavers tekst og status, s� alle kan f�lge med og blive p� sporet mens du arbejder videre. ".
                            "\n\nJeg kan kun �nske dig succes og email ".EMAIL_ADMIN." hvis du er k�rt fast\n\n --Held og lykke !\n\n".
                            "Login:      %1\$s\n".
                            "Password:   %2\$s\n\n".
                            "Brugergrupper: %3\$s".
                            "Navn:       %4\$s\n".
                            "Website:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Rediger din konto hos en Admin";
$email_user_change1       = "Hallo,\n\nDette er ".MANAGER_NAME." som underrettter dig om, at din konto er blevet �ndret p� ".$email_date." af %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Password:   %4\$s\n\n".
                            "Brugergrupper: %5\$s".
                            "Navn:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Rediger din konto";
$email_user_change2       = "Hallo,\n\nDette er ".MANAGER_NAME." som bekr�fter, at du med succes har �ndret din konto p� ".$email_date."\n\n".
                            "Login:    %1\$s\n".
                            "Password: %2\$s\n\n".
                            "Navn:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Rediger din konto";
$email_user_change3       = "Hallo,\n\nDette er ".MANAGER_NAME." som bekr�fter at du med succes har �ndret din konto p� ".$email_date."\n\n".
                            "Login: %1\$s\n".
                            "Dit nuv�rende password er ikke �ndret.\n\n".
                            "Navn:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Konto genaktiveret";
$email_revive             = "Hallo,\n\nDette er ".MANAGER_NAME." som underretter dig om at din konto er blevet genetableret p� ".$email_date.".\n\n".
                            "Loginname: %1\$s\n".
                            "Username:  %2\$s\n\n".
                            "Vi kan ikke sende dig dit password fordi det er kodet. \n\n".
                            "Hvis du har glemdt dit password email ".EMAIL_ADMIN." for at f� et nyt password.";



$title_delete_user         = ABBR_MANAGER_NAME.": Konto deaktiveret.";
$email_delete_user         = "Hallo,\n\nDette er ".MANAGER_NAME." som underettet dig om, at din konto er blevet deaktiveret ".$email_date."\n\n".
                            "Vi beklager, at du er udtr�dt men vil takke dig for dit arbejde!\n\n".
                            "Hvis du vil protestere mod at blive deaktiveret, send en email til ".EMAIL_ADMIN."\$s.";

?>
