<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003

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

  Translation: Sebastian Knapp, Michael Bunk
  Email text language files for 'de' (German)

  Maintainer: Michael Bunk <micha137 at users.sourceforge.net>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 04. Apr 2008 um 9:13 +1200
$email_date = sprintf('%s. %s %s um %s %+03d00', date('d', $ltime ), $month_array[(date('n', $ltime ) )], date('Y', $ltime ), date('H:i', $ltime), TZ );

//$email_date = date("d" ).". ".$month_array[(date("n" ) )]." ".date('Y \u\m g:i' );

$title_file_post        = ABBR_MANAGER_NAME.": Neue Datei wurde hochgeladen: %s";
$email_file_post        = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, daß eine neue Datei hochgeladen wurde am ".$email_date." durch %1\$s.\n\n".
                          "Dateiname:    %2\$s\n".
                          "Beschreibung: %3\$s\n\n".
                          "Projekt:      %4\$s\n".
                          "Aufgabe:      %5\$s\n\n".
                          "Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n".BASE_URL."%6\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": Neuer Forenbeitrag: %s";
$email_forum_post        = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, daß seit ".$email_date." ein neuer Forenbeitrag vorliegt von %1\$s:\n\n".
                           "----\n\n%2\$s\n\n----\n\n".
                           "Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply       = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, daß seit ".$email_date." ein neuer Forenbeitrag vorliegt von %1\$s.\n\n".
                           "Dieser beitrag ist eine Antwort auf einen früheren Beitrag von %2\$s.\n\n".
                           "Früherer Beitrag:\n %3\$s\n\n".
                           "----\n\n".
                           "Neuer Beitrag:\n%4\$s\n\n".
                           "----\n\n".
                           "Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n".BASE_URL."%5\$s\n";



$email_list = "Projekt:  %1\$s\n".
              "Aufgabe:  %2\$s\n".
              "Status:   %3\$s\n".
              "Besitzer: %4\$s ( %5\$s )\n".
              "Text:\n%6\$s\n\n".
              "Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Eins von Ihren Projekten ist übergeben worden";
$title_takeover_task      = ABBR_MANAGER_NAME.": Eine von Ihren Aufgaben ist übergeben worden";
$email_takeover_project   = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert Sie, dass ihr Projekt durch den Administrator am ".$email_date." übergeben wurde.\n\n";
$email_takeover_task      = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert Sie, dass ihre Aufgabe durch den Administrator am ".$email_date." übergeben wurde.\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": Neues Projekt für Sie";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Neue Aufgabe für Sie";
$email_new_owner_project  = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert Sie, dass ein Projekt, das Sie verwalten, am ".$email_date." geändert wurde.\n\nHier im Detail:\n\n";
$email_new_owner_task     = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert Sie, dass eine Aufgabe, die Sie verwalten, am ".$email_date." geändert wurde.\n\nHier im Detail:\n\n";

$title_new_group_project  = ABBR_MANAGER_NAME.": Neue Gruppe für Projekt %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Neue Gruppe für Aufgabe %s";
$email_new_group_project  = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass eine neue Gruppe erstellt worden ist am ".$email_date."\n\nDetails:\n\n";
$email_new_group_task     = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass eine neue Gruppe erstellt worden ist am ".$email_date."\n\nDetails:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Ihr Projekt wurde bearbeitet";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Ihre Aufgabe wurde bearbeitet";
$email_edit_owner_project ="Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass ihr Projekt am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";
$email_edit_owner_task    ="Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass ihre Aufgabe am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt aktualisiert";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Aufgabe aktualisiert";
$email_edit_group_project = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass ein Projekt, das %s gehört am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";
$email_edit_group_task    = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass eine Aufgabe, die %s gehört am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt gelöscht";
$title_delete_task        = ABBR_MANAGER_NAME.": Aufgabe gelöscht";
$email_delete_project     = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass ein Projekt, das ihnen gehörte, gelöscht worden ist am ".$email_date."\n\n".
                              "Danke für die Verwaltung des Projektes, solange es existierte.\n\n";
$email_delete_task        = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass eine Aufgabe, die ihnen gehörte, gelöscht worden ist am ".$email_date."\n\n".
                              "Danke für die Verwaltung der Aufgabe, solange es sie gab.\n\n";

$delete_list =  "Projekt:  %1\$s\n".
                "Aufgabe:  %2\$s\n".
                "Status:   %3\$s\n\n".
                "Text:\n%4\$s\n";


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

$title_welcome      = "Willkommen bei ".ABBR_MANAGER_NAME;
$email_welcome      = "Hallo,\n\nEs begrüßt sie die ".MANAGER_NAME."-Seite am ".$email_date.".\n\n".
			"Da sie neu hier sind, werde ich zuerst ein Paar Dinge erklären, so dass sie schnell zu arbeiten beginnen können.\n\n".
			"Dies ist ein Projektverwaltungswerkzeug. Der Hauptbildschirm wird ihnen die momentan vorhandenen Projekte zeigen. ".
			"Wenn sie auf einen der Namen klicken, können sie die zum Projekt gehörigen Aufgaben einsehen. Hier wird die Arbeit ablaufen.\n\n".
			"Jede Nachricht, die sie verschicken oder Aufgabe, die sie bearbeiten, wird anderen Benutzern als 'neu' or 'aktualisiert' erscheinen. Das funktioniert auch andersherum und ".
			"erlaubt ihnen schnell zu erkennen, wo gerade etwas passiert.\n\n".
			"Sie können ebenso den Besitz von Aufgaben übernehmen und sie dann bearbeiten. Auch die Nachrichten im zugehörigen Forum lassen sich dann bearbeiten. ".
			"Sowie ihre Arbeit voranschreitet, aktualisieren sie bitte Aufgabentext und Status, damit jeder verfolgen kann, wie sie voranschreiten. ".
			"\n\nIch kann ihnen nun noch viel Erfolg wünschen. Sie können ".EMAIL_ADMIN." mailen, wenn sie festhängen.\n\n --Viel Glück!\n\n".
			"Login:           %1\$s\n".
			"Passwort:        %2\$s\n\n".
			"Nutzergruppen: %3\$s".
			"Name:            %4\$s\n".
			"Webseite:        ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": Ihr Konto wurde von einem Administrator bearbeitet";
$email_user_change1 = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass ihr Konto am ".$email_date." bearbeitet worden ist von %1\$s ( %2\$s ) \n\n".
			"Login:           %3\$s\n".
			"Passwort:        %4\$s\n\n".
			"Nutzergruppen: %5\$s".
			"Name:            %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": Bearbeitung ihres Kontos";
$email_user_change2 = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite bestätigt, dass sie erfolgreich ihr Konto am ".$email_date." bearbeitet haben\n\n".
			"Login:    %1\$s\n".
			"Passwort: %2\$s\n\n".
			"Name:     %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": Bearbeitung ihres Kontos";
$email_user_change3 = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite bestätigt, dass sie erfolgreich ihr Konto am ".$email_date." bearbeitet haben\n\n".
			"Login:    %1\$s\n".
			"Ihr bestehendes Passwort wurde nicht verändert.\n\n".
			"Name:     %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": Konto wieder aktiviert";
$email_revive       = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass ihr Konto am ".$email_date." wieder freigeschalten wurde.\n\n".
			"Loginname:     %1\$s\n".
			"Benutzername:  %2\$s\n\n".
			"Aus Sicherheitsgründen kann ihr Passwort ihnen nicht gesendet werden.\n\n".
			"Falls sie ihr Passwort vergessen haben, senden sie eine E-Mail an ".EMAIL_ADMIN." mit ihrem Anliegen.";



$title_delete_user  = ABBR_MANAGER_NAME.": Konto deaktiviert.";
$email_delete_user  = "Hallo,\n\nIhre ".MANAGER_NAME."-Seite informiert sie, dass ihr Konto am ".$email_date." gesperrt worden ist.\n\n".
			"Es tut uns leid, dass sie uns verlassen haben. Wir bedanken uns für die geleistete Arbeit!\n\n".
			"Wenn sie gegen die Sperrung Einspruch erheben wollen oder denken, dass dies ein Irrtum ist, senden sie bitte eine E-Mail an ".EMAIL_ADMIN.".";

?>
