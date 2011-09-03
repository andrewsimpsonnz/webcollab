<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson

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

  Email text language files for 'nl' (Nederlands)

  Maintainer: Patrick Flinkerbusch <patrick at flinkerbusch.info>

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Nieuw bestand opgestuurd: %s";
$email_file_post          = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Er is een nieuw bestand opgestuurd op ".$email_date." van %1\$s.\n\n".
                            "Bestand:          %2\$s\n".
                            "Omschrijving: %3\$s\n\n".
                            "Projekt:     %4\$s\n".
                            "Taak:        %5\$s\n\n".
                            "Ga naar de website voor meer details.\n\n".
                            BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nieuw forum bericht: %s";
$email_forum_post         = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Er is een nieuw forum bericht binnen gekomen op ".$email_date." van %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                           "Ga naar de website voor meer details.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Er is een nieuw forum bericht binnen gekomen op ".$email_date." van %1\$s:\n\n".
                            "Dit bericht is een reactie op een eerder bericht van %2\$s.\n\n".
                            "Origineel bericht:\n%3\$s\n\n".
                            "----\n\n".
                            "Nieuwe reactie:\n%4\$s\n\n".
                            "----\n\n".
                           "Ga naar de website voor meer details.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:     %1\$s\n".
                            "Taak:        %2\$s\n".
                            "Status:      %3\$s\n".
                            "Eigenaar:    %4\$s ( %5\$s )\n".
                            "Tekst:       \n%6\$s\n\n".
                           "Ga naar de website voor meer details.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Uw projekt is overgenomen";
$title_takeover_task      = ABBR_MANAGER_NAME.": Uw taak is overgenomen";

$email_takeover_task      = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een taak van u is overgenomen door een beheerder op ".$email_date.".\n\n";
$email_takeover_project   = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een projekt van u is overgenomen door een beheerder op ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nieuw projekt voor u";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nieuwe taak voor u";

$email_new_owner_project  = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Er is een nieuw projekt gemaakt op ".$email_date.", en u bent de eigenaar van dat projekt.\n\n".
                            "Hier zijn de details:\n\n";

$email_new_owner_task     = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Er is een nieuwe taak gemaakt op ".$email_date.", en u bent de eigenaar van deze taak.\n\n".
                            "Hier zijn de details:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nieuw projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nieuwe taak: %s";

$email_new_group_project  = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Er is een nieuw projekt gemaakt op ".$email_date."\n\n".
                            "Hier zijn de details:\n\n";

$email_new_group_task     = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Er is een nieuwe taak gemaakt op ".$email_date."\n\n".
                            "Hier zijn de details:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Uw projekt is bijgewerkt";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Uw taak is bijgewerkt";

$email_edit_owner_project = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een projekt van u is gewijzigd op ".$email_date.".\n\n".
                            "Hier zijn de details:\n\n";

$email_edit_owner_task    = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een taak van u is gewijzigd op ".$email_date.".\n\n".
                            "Hier zijn de details:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt bijgewerkt";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Taak bijgewerkt";

$email_edit_group_project = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een projekt van %s is gewijzigd op ".$email_date.".\n\n".
                            "Hier zijn de details:\n\n";

$email_edit_group_task    = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een taak van %s is gewijzigd op ".$email_date.".\n\n".
                            "Hier zijn de details:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt verwijderd";
$title_delete_task        = ABBR_MANAGER_NAME.": Taak verwijderd";

$email_delete_project     = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een projekt van u is verwijderd op  ".$email_date."\n\n".
                            "Bedankt voor uw inzet tijdens dit projekt.\n\n";

$email_delete_task        = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Een taak van u is verwijderd op ".$email_date."\n\n".
                            "Bedankt voor uw inzet tijdens deze taak.\n\n";

$delete_list              = "Projekt: %1\$s\n".
                            "Taak:   %2\$s\n".
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

$title_welcome            = "Welkom bij ".ABBR_MANAGER_NAME;
$email_welcome            = "Hallo,\n\nDit is een bericht van ".MANAGER_NAME." site. Welkom bij ons op ".$email_date.".\n\n".
                            "Aangezien u hier nieuw bent zal ik een aantal zaken uitleggen zodat u snel aan de slag kunt.\n\n".
                            "Dit is een projekt management systeem, het hoofdscherm laat u de projekten zien die momenteel beschikbaar zijn. ".
                            "Door op een van de namen te klikken verschijnt het taken gedeelte. Hier zal al het werk naar toe gaan.\n\n".
                            "Ieder item dat u opstuurd of taak die u bewerkt zal bij de andere gebruikers weergegeven worden als 'nieuw' of 'gewijzigd'. Dit geldt ook omgekeerd en ".
                            "het geeft u direkt inzicht waar gewerkt wordt.\n\n".
                            "U kunt ook een taak overnemen en u kunt ze dan bewerken, evenals alle bijbehorende forum berichten. ".
                            "Als u werkzaamheden uitvoert, werk dan ook de tekst en status van uw taak bij zodat iedereen uw vorderingen kan volgen. ".
                            "\n\nIk wens u veel succes en stuur ".EMAIL_ADMIN." een email als u vragen heeft.\n\n --Succes !\n\n".
                            "Login:             %1\$s\n".
                            "Wachtwoord:        %2\$s\n\n".
                            "Gebruikersgroepen: %3\$s".
                            "Naam:              %4\$s\n".
                            "Website:           ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Uw account is door een beheerder gewijzigd";
$email_user_change1       = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Uw account is op ".$email_date." gewijzigd door %1\$s ( %2\$s ) \n\n".
                            "Login:             %3\$s\n".
                            "Wachtwoord:        %4\$s\n\n".
                            "Gebruikersgroepen: %5\$s".
                            "Naam:              %6\$s\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Uw account is gewijzigd";
$email_user_change2         = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. U heeft met succes uw account gewijzigd op ".$email_date.".\n\n".
                            "Login:             %1\$s\n".
                            "Wachtwoord:        %2\$s\n\n".
                            "Naam:              %3\$s\n".

$title_user_change3         = ABBR_MANAGER_NAME.": Uw account is gewijzigd";
$email_user_change3         = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. U heeft met succes uw account gewijzigd op ".$email_date.".\n\n".
                            "Login:             %1\$s\n".
                            "Uw bestaande wachtwoord is niet gewijzigd.\n\n".
                            "Naam:              %2\$s\n".

$title_revive               = ABBR_MANAGER_NAME.": Account opnieuw geactiveerd";
$email_revive               = "Hallo,\n\n".
                            "Dit is een bericht van ".MANAGER_NAME." site. Uw account is weer vrijgegeven op ".$email_date.".\n\n".
                            "Login:             %1\$s\n".
                            "Gebruikersnaam:  %2\$s\n\n".
                            "We kunnen u uw wachtwoord niet toesturen omdat deze versleuteld is. \n\n".
                            "Als u uw wachtwoord niet meer heeft, vraag dan via email bij ".EMAIL_ADMIN." een nieuw wachtwoord aan.";

$title_delete_user          = ABBR_MANAGER_NAME.": Account gedeactiveerd.";
$email_delete_user          = "Hallo,\n\n".
                              "Dit is een bericht van ".MANAGER_NAME." site. Uw account is gedeactiveerd op ".$email_date.".\n\n".
                              "We vinden het jammer dat u vertrekt en bedanken u voor uw inzet!\n\n".
                              "Als u bezwaar heeft tegen uw deactivering, of denkt dat dit een vergissing is, stuur dan een email naar ".EMAIL_ADMIN.".";

?>