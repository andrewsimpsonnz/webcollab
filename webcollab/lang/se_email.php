<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2005 by Göran Källqvist

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

  Maintainer: Göran Källqvist <g.kallqvist@telia.com>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Ny fil skickad: %s";
$email_file_post          = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att det laddats ner en ny fil ".$email_date." av %1\$s.\n\n".
                            "Fil:         %2\$s\n".
                            "Beskrivning: %3\$s\n\n".
                            "Projekt:     %4\$s\n".
                            "Uppgift:     %5\$s\n\n".
                            "Gå till sajten för ytterligare detaljer.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nytt inlägg på forumet: %s";
$email_forum_post         = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att det gjorts ett nytt inlägg på forumet ".$email_date." av %1\$s:\n\n----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Gå till sajten för ytterligare detaljer.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att det gjorts ett nytt inlägg på forumet ".$email_date." av %1\$s.\n\n".
                            "Detta inlägg är svar på ett tidigare inlägg av %2\$s.\n\n".
                            "Ursprungligt inlägg:\n%3\$s\n\n".
                            "----\n\n".
                            "Nytt svar:\n%4\$s\n\n".
                            "----\n\n".
                            "Gå till sajten för ytterligare detaljer.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Projekt:  %1\$s\n".
               "Uppgift:     %2\$s\n".
               "Status:   %3\$s\n".
               "Ansvarig:    %4\$s ( %5\$s )\n".
               "Text:\n%6\$s\n\n".
               "Gå till sajten för ytterligare detaljer.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Ditt projekt har tagits över";
$title_takeover_task      = ABBR_MANAGER_NAME.": Din uppgift har tagits över";

$email_takeover_task      = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att en uppgift som du har ansvar för har övertagits av en administratör ".$email_date.".\n\n";
$email_takeover_project   = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ett projekt som du har ansvar för har övertagits av en administratör ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nytt projekt till dig";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Ny uppgift till dig";

$email_new_owner_project  = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ett projekt startades ".$email_date.", och att du har ansvar för detta projekt.\n\nHär är detaljerna:\n\n";
$email_new_owner_task     = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att en uppgift inleddes ".$email_date.", och att du har ansvar för denna uppgift.\n\nHär är detaljerna:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nytt projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Ny uppgift: %s";

$email_new_group_project  = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ett nytt projekt startats ".$email_date."\n\nHär är detaljerna:\n\n";
$email_new_group_task     = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att en ny uppgift inletts ".$email_date."\n\nHär är detaljerna:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Ditt projekt har uppdaterats";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Din uppgift har uppdaterats";

$email_edit_owner_project = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ett projekt som du har ansvar för ändrades ".$email_date.".\n\nHär är detaljerna:\n\n";
$email_edit_owner_task    = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att en uppgift som du har ansvar för ändrades ".$email_date.".\n\nHär är detaljerna:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt uppdaterat";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Uppgift uppdaterad";

$email_edit_group_project = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ett projekt som %s har ansvar för har ändrats ".$email_date.".\n\nHär är detaljerna:\n\n";
$email_edit_group_task    = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att en uppgift som %s har ansvar för har ändrats ".$email_date.".\n\nHär är detaljerna:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Projekt raderat";
$title_delete_task        = ABBR_MANAGER_NAME.": Uppgift raderad";

$email_delete_project     = "Hej!\n\n".
                            "Det är ".MANAGER_NAME." sajten som meddelar att ett projekt som du hade ansvar för raderades ".$email_date."\n\n".
                            "Tack för att du skötte om projektet så länge det var aktuellt.\n\n";
$email_delete_task        = "Hej!\n\n".
                            "Det är ".MANAGER_NAME." sajten som meddelar att en uppgift som du hade ansvar för har raderats ".$email_date."\n\n".
                            "Tack för att du skötte uppgiften så länge den var aktuelll.\n\n";

$delete_list =  "Projekt:   %1\$s\n".
                "Uppgift:   %2\$s\n".
                "Status:    %3\$s\n\n".
                "Text:\n%4\$s\n\n";

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

$title_welcome            = "Välkommen till ".ABBR_MANAGER_NAME;
$email_welcome            = "Hej!\n\nVälkommen till ".MANAGER_NAME." sajten ".$email_date.".\n\n".
                            "Eftersom du är ny ska jag förklara ett par saker så att du snabbt kan börja arbeta.\n\n".
                            "För det första är detta ett verktyg för att hjälpa till att sköta projekt. Huvudfönstret visar de projekt som är tillgängliga just nu. ".
                            "Om du klickar på ett av namnen hamnar du i uppgiftsdelen. Det är där allt arbete kommer att äga rum.\n\n".
                            "Varje sak du skickar eller uppgift du redigerar kommer att visas för övriga användare som 'ny' eller 'uppdaterad'. Det fungerar också åt andra hållet och ".
                            "gör att man snabbt kan se var det händer något.\n\n".
                            "Du kan också ta eller få ansvar för en uppgift och kan då redigera den och alla foruminlägg som tillhör den. ".
                            "Allteftersom du arbetar var god och redigera texten och status för din uppgift så att alla kan se hur arbetet går framåt. ".
                            "\n\nJag önskar dig all lycka. Mejla ".EMAIL_ADMIN." om du kör fast.\n\n --Lycka till!\n\n".
                            "Användarnamn:      %1\$s\n".
                            "Lösenord:          %2\$s\n\n".
                            "Användargrupper:   %3\$s".
                            "Namn:              %4\$s\n".
                            "Websajt:          ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Administratören har ändrat ditt konto";
$email_user_change1       = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ditt konto ändrats ".$email_date." av %1\$s ( %2\$s ) \n\n".
                            "Användarnamn:      %3\$s\n".
                            "Lösenord:          %4\$s\n\n".
                            "Användargrupper:   %5\$s".
                            "Namn:              %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Förändring av ditt konto";
$email_user_change2       = "Hej!\n\nDet är ".MANAGER_NAME." sajten som bekräftar att du med framgång förändrat ditt konto ".$email_date.".\n\n".
                            "Användarnamn:    %1\$s\n".
                            "Lösenord:        %2\$s\n\n".
                            "Namn:            %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Förändring av ditt konto";
$email_user_change3       = "Hej!\n\nDet är ".MANAGER_NAME." sajten som bekräftar att du med framgång förändrat ditt konto ".$email_date.".\n\n".
                            "Användarnamn: %1\$s\n".
                            "Ditt lösenord har inte ändrats.\n\n".
                            "Namn:         %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Kontot åter aktiverat";
$email_revive             = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ditt konto åter är aktiverat ".$email_date.".\n\n".
                            "Login-namn: %1\$s\n".
                            "Användarnamn:  %2\$s\n\n".
                            "Vi kan inte skicka ditt lösenord eftersom det är krypterat. \n\n".
                            "Om du har glömt ditt lösenord mejla ".EMAIL_ADMIN." för att få ett nytt lösenord.";



$title_delete_user        = ABBR_MANAGER_NAME.": Kontot avaktiverat.";
$email_delete_user        = "Hej!\n\nDet är ".MANAGER_NAME." sajten som meddelar att ditt konto har avaktiverats ".$email_date.".\n".
                            "Vi är ledsna att du har slutat och vill tacka dig för ditt arbete!\n\n".
                            "Om du inte vill bli avaktiverad eller tror att det är ett misstag, skicka ett mejl till ".EMAIL_ADMIN.".";

?>