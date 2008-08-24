<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2005 by G�ran K�llqvist

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

  Email text language files for 'se' (Swedish)

  Maintainer: G�ran K�llqvist <g.kallqvist@telia.com>

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Ny fil skickad: %s";
$email_file_post          = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att det laddats ner en ny fil ".$email_date." av %1\$s.\n\n".
                            "Fil:         %2\$s\n".
                            "Beskrivning: %3\$s\n\n".
                            "Projekt:     %4\$s\n".
                            "Uppgift:     %5\$s\n\n".
                            "G� till sajten f�r ytterligare detaljer.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nytt inl�gg p� forumet: %s";
$email_forum_post         = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att det gjorts ett nytt inl�gg p� forumet ".$email_date." av %1\$s:\n\n----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "G� till sajten f�r ytterligare detaljer.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att det gjorts ett nytt inl�gg p� forumet ".$email_date." av %1\$s.\n\n".
                            "Detta inl�gg �r svar p� ett tidigare inl�gg av %2\$s.\n\n".
                            "Ursprungligt inl�gg:\n%3\$s\n\n".
                            "----\n\n".
                            "Nytt svar:\n%4\$s\n\n".
                            "----\n\n".
                            "G� till sajten f�r ytterligare detaljer.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Projekt:  %1\$s\n".
               "Uppgift:     %2\$s\n".
               "Status:   %3\$s\n".
               "Ansvarig:    %4\$s ( %5\$s )\n".
               "Text:\n%6\$s\n\n".
               "G� till sajten f�r ytterligare detaljer.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Ditt projekt har tagits �ver";
$title_takeover_task      = ABBR_MANAGER_NAME.": Din uppgift har tagits �ver";

$email_takeover_task      = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att en uppgift som du har ansvar f�r har �vertagits av en administrat�r ".$email_date.".\n\n";
$email_takeover_project   = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ett projekt som du har ansvar f�r har �vertagits av en administrat�r ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nytt projekt till dig";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Ny uppgift till dig";

$email_new_owner_project  = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ett projekt startades ".$email_date.", och att du har ansvar f�r detta projekt.\n\nH�r �r detaljerna:\n\n";
$email_new_owner_task     = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att en uppgift inleddes ".$email_date.", och att du har ansvar f�r denna uppgift.\n\nH�r �r detaljerna:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nytt projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Ny uppgift: %s";

$email_new_group_project  = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ett nytt projekt startats ".$email_date."\n\nH�r �r detaljerna:\n\n";
$email_new_group_task     = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att en ny uppgift inletts ".$email_date."\n\nH�r �r detaljerna:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Ditt projekt har uppdaterats";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Din uppgift har uppdaterats";

$email_edit_owner_project = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ett projekt som du har ansvar f�r �ndrades ".$email_date.".\n\nH�r �r detaljerna:\n\n";
$email_edit_owner_task    = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att en uppgift som du har ansvar f�r �ndrades ".$email_date.".\n\nH�r �r detaljerna:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt uppdaterat";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Uppgift uppdaterad";

$email_edit_group_project = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ett projekt som %s har ansvar f�r har �ndrats ".$email_date.".\n\nH�r �r detaljerna:\n\n";
$email_edit_group_task    = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att en uppgift som %s har ansvar f�r har �ndrats ".$email_date.".\n\nH�r �r detaljerna:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Projekt raderat";
$title_delete_task        = ABBR_MANAGER_NAME.": Uppgift raderad";

$email_delete_project     = "Hej!\n\n".
                            "Det �r ".MANAGER_NAME." sajten som meddelar att ett projekt som du hade ansvar f�r raderades ".$email_date."\n\n".
                            "Tack f�r att du sk�tte om projektet s� l�nge det var aktuellt.\n\n";
$email_delete_task        = "Hej!\n\n".
                            "Det �r ".MANAGER_NAME." sajten som meddelar att en uppgift som du hade ansvar f�r har raderats ".$email_date."\n\n".
                            "Tack f�r att du sk�tte uppgiften s� l�nge den var aktuelll.\n\n";

$delete_list =  "Projekt:   %1\$s\n".
                "Uppgift:   %2\$s\n".
                "Status:    %3\$s\n\n".
                "Text:\n%4\$s\n\n";

$title_welcome            = "V�lkommen till ".ABBR_MANAGER_NAME;
$email_welcome            = "Hej!\n\nV�lkommen till ".MANAGER_NAME." sajten ".$email_date.".\n\n".
                            "Eftersom du �r ny ska jag f�rklara ett par saker s� att du snabbt kan b�rja arbeta.\n\n".
                            "F�r det f�rsta �r detta ett verktyg f�r att hj�lpa till att sk�ta projekt. Huvudf�nstret visar de projekt som �r tillg�ngliga just nu. ".
                            "Om du klickar p� ett av namnen hamnar du i uppgiftsdelen. Det �r d�r allt arbete kommer att �ga rum.\n\n".
                            "Varje sak du skickar eller uppgift du redigerar kommer att visas f�r �vriga anv�ndare som 'ny' eller 'uppdaterad'. Det fungerar ocks� �t andra h�llet och ".
                            "g�r att man snabbt kan se var det h�nder n�got.\n\n".
                            "Du kan ocks� ta eller f� ansvar f�r en uppgift och kan d� redigera den och alla foruminl�gg som tillh�r den. ".
                            "Allteftersom du arbetar var god och redigera texten och status f�r din uppgift s� att alla kan se hur arbetet g�r fram�t. ".
                            "\n\nJag �nskar dig all lycka. Mejla ".EMAIL_ADMIN." om du k�r fast.\n\n --Lycka till!\n\n".
                            "Anv�ndarnamn:      %1\$s\n".
                            "L�senord:          %2\$s\n\n".
                            "Anv�ndargrupper:   %3\$s".
                            "Namn:              %4\$s\n".
                            "Websajt:          ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Administrat�ren har �ndrat ditt konto";
$email_user_change1       = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ditt konto �ndrats ".$email_date." av %1\$s ( %2\$s ) \n\n".
                            "Anv�ndarnamn:      %3\$s\n".
                            "L�senord:          %4\$s\n\n".
                            "Anv�ndargrupper:   %5\$s".
                            "Namn:              %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": F�r�ndring av ditt konto";
$email_user_change2       = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som bekr�ftar att du med framg�ng f�r�ndrat ditt konto ".$email_date.".\n\n".
                            "Anv�ndarnamn:    %1\$s\n".
                            "L�senord:        %2\$s\n\n".
                            "Namn:            %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": F�r�ndring av ditt konto";
$email_user_change3       = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som bekr�ftar att du med framg�ng f�r�ndrat ditt konto ".$email_date.".\n\n".
                            "Anv�ndarnamn: %1\$s\n".
                            "Ditt l�senord har inte �ndrats.\n\n".
                            "Namn:         %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Kontot �ter aktiverat";
$email_revive             = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ditt konto �ter �r aktiverat ".$email_date.".\n\n".
                            "Login-namn: %1\$s\n".
                            "Anv�ndarnamn:  %2\$s\n\n".
                            "Vi kan inte skicka ditt l�senord eftersom det �r krypterat. \n\n".
                            "Om du har gl�mt ditt l�senord mejla ".EMAIL_ADMIN." f�r att f� ett nytt l�senord.";



$title_delete_user        = ABBR_MANAGER_NAME.": Kontot avaktiverat.";
$email_delete_user        = "Hej!\n\nDet �r ".MANAGER_NAME." sajten som meddelar att ditt konto har avaktiverats ".$email_date.".\n".
                            "Vi �r ledsna att du har slutat och vill tacka dig f�r ditt arbete!\n\n".
                            "Om du inte vill bli avaktiverad eller tror att det �r ett misstag, skicka ett mejl till ".EMAIL_ADMIN.".";

?>