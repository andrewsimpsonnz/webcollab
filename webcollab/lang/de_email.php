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

  Translation: Sebastian Knapp, Michael Bunk
  Email text language files for 'de' (German)

  Maintainer: 

*/
$email_date = date("d" ).". ".$month_array[(date("n" ) )]." ".date('Y \u\m g:i' );

$title_file_post        = $ABBR_MANAGER_NAME.": New file upload: %s";
$email_file_post        = "Hello,\n\nThis is the ".$MANAGER_NAME." site informing you that a new file has been uploaded on ".$email_date." by %1\$s.\n\n".
                          "File:        %2\$s\n".
                          "Description: %3\$s";


$title_forum_post        = $ABBR_MANAGER_NAME.": New forum post: %s";
$email_forum_post        = "Hello,\n\nThis is the ".$MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s:\n\n%2\$s"; 
$email_forum_reply       = "Hello,\n\nThis is the ".$MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s.\n\n".
                           "This post is in reply to an earlier post by %2\$s.\n\n".
                           "Original post:\n %3\$s\n\n".
                           "New reply:\n%4\$s\n";



$email_list = "Projekt:  %1\$s\n".
              "Aufgabe:  %s2\$\n".
              "Status:   %3\$s\n".
              "Besitzer: %4\$s ( %5\$s )\n".
              "Text:\n%6\$s\n\n".
              "Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n".$BASE_URL."\n";


$title_takeover_project   = $ABBR_MANAGER_NAME.": Eins von Ihren Projekten ist &uuml;bergeben worden";
$title_takeover_task      = $ABBR_MANAGER_NAME.": Eine von Ihren Aufgaben ist &uuml;bergeben worden";
$email_takeover_project   = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert Sie, dass ihr Projekt durch den Administrator an ".$email_date." &uuml;bergen wurde.\n\n";
$email_takeover_task      = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert Sie, dass ihre Aufgabe durch den Administrator an ".$email_date." &uuml;bergen wurde.\n\n";

$title_new_owner_project  = $ABBR_MANAGER_NAME.": Neues Projekt f&uuml;r Sie";
$title_new_owner_task     = $ABBR_MANAGER_NAME.": Neue Aufgabe f&uuml;r Sie";
$email_new_owner_project  = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert Sie, dass ein Projekt, das Sie verwalten, auf ".$email_date." ge&auml;ndert wurde.\n\nHier im Detail:\n\n";
$email_new_owner_task     = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert Sie, dass eine Aufgabe, die Sie verwalten, auf ".$email_date." ge&auml;ndert wurde.\n\nHier im Detail:\n\n";

$title_new_group_project  = $ABBR_MANAGER_NAME.": Neue Gruppe f&uuml;r Projekt %s";
$title_new_group_task     = $ABBR_MANAGER_NAME.": Neue Gruppe f&uuml;r Aufgabe %s";
$email_new_group_project  = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass eine neue Gruppe erstellt worden ist am ".$email_date."\n\nDetails:\n\n";
$email_new_group_task     = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass eine neue Gruppe erstellt worden ist am ".$email_date."\n\nDetails:\n\n";

$title_edit_owner_project = $ABBR_MANAGER_NAME.": Ihr Projekt wurde bearbeitet";
$title_edit_owner_task    = $ABBR_MANAGER_NAME.": Ihre Aufgabe wurde bearbeitet";
$email_edit_owner_project ="Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass ihr Projekt am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";
$email_edit_owner_task    ="Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass ihre Aufgabe am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";

$title_edit_group_project = $ABBR_MANAGER_NAME.": Projekt aktualisiert";
$title_edit_group_task    = $ABBR_MANAGER_NAME.": Aufgabe aktualisiert";
$email_edit_group_project = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass ein Projekt, das %s geh&ouml;rt am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";
$email_edit_group_task    = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass eine Aufgabe, die %s geh&ouml;rt am ".$email_date." bearbeitet wurde.\n\nDetails:\n\n";

$title_delete_project     = $ABBR_MANAGER_NAME.": Projekt gel&ouml;scht";
$title_delete_task        = $ABBR_MANAGER_NAME.": Aufgabe gel&ouml;scht";
$email_delete_project     = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass ein Projekt, das ihnen geh&ouml;rte, gel&ouml;scht worden ist am ".$email_date."\n\n".
                              "Danke f&uuml;r die Verwaltung des Projektes, solange es existierte.\n\n";
$email_delete_task        = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass eine Aufgabe, die ihnen geh&ouml;rte, gel&ouml;scht worden ist am ".$email_date."\n\n".
                              "Danke f&uuml;r die Verwaltung der Aufgabe, solange es sie gab.\n\n";

$delete_list =  "Projekt:  %1\$s\n".
                "Aufgabe:  %2\$s\n".
                "Status:   %s3\$\n\n".
                "Text:\n%4\$s\n";


$title_welcome      = "Willkommen bei ".$ABBR_MANAGER_NAME;
$email_welcome      = "Hallo,\n\nEs begr&uuml;&szlig;t sie die ".$MANAGER_NAME."-Seite am ".$email_date.".\n\n".
			"Da sie neu hier sind, werde ich zuerst ein Paar Dinge erkl&auml;ren, so dass sie schnell zu arbeiten beginnen k&ouml;nnen.\n\n".
			"Dies ist ein Projektverwaltungswerkzeug. Der Hauptbildschirm wird ihnen die momentan vorhandenen Projekte zeigen. ".
			"Wenn sie auf einen der Namen klicken, k&ouml;nnen sie die zum Projekt geh&ouml;rigen Aufgaben einsehen. Hier wird die Arbeit ablaufen.\n\n".
			"Jede Nachricht, die sie verschicken oder Aufgabe, die sie bearbeiten, wird anderen Benutzern als 'neu' or 'aktualisiert' erscheinen. Das funktioniert auch andersherum und ".
			"erlaubt ihnen schnell zu erkennen, wo gerade etwas passiert.\n\n".
			"Sie k&ouml;nnen ebenso den Besitz von Aufgaben &uuml;bernehmen und sie dann bearbeiten. Auch die Nachrichten im zugeh&ouml;rigen Forum lassen sich dann bearbeiten. ".
			"Sowie ihre Arbeit voranschreitet, aktualisieren sie bitte Aufgabentext und Status, damit jeder verfolgen kann, wie sie voranschreiten. ".
			"\n\nIch kann ihnen nun noch viel Erfolg w&uuml;nschen. Sie k&ouml;nnen ".$EMAIL_ADMIN." mailen, wenn sie festh&auml;ngen.\n\n --Viel Gl&uuml;ck!\n\n".
			"Login:           %1\$s\n".
			"Passwort:        %2\$s\n\n".
			"Benutzergruppen: %3\$s".
			"Name:            %4\$s\n".
			"Webseite:        ".$BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Ihr Konto wurde von einem Administrator bearbeitet";
$email_user_change1 = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass ihr Konto am ".$email_date." bearbeitet worden ist von %1\$s ( %2\$s ) \n\n".
			"Login:           %s3\$\n".
			"Passwort:        %s4\$\n\n".
			"Benutzergruppen: %5\$s".
			"Name:            %6\$s\n\n".
			"%7\$s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Bearbeitung ihres Kontos";
$email_user_change2 = "Hello,\n\nIhre ".$MANAGER_NAME."-Seite best&auml;tigt, dass sie erfolgreich ihr Konto am ".$email_date." bearbeitet haben\n\n".
			"Login:    %1\$s\n".
			"Passwort: %2\$s\n\n".
			"Name:     %3\$s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.": Bearbeitung ihres Kontos";
$email_user_change3 = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite best&auml;tigt, dass sie erfolgreich ihr Konto am ".$email_date." bearbeitet haben\n\n".
			"Login:    %1\$s\n".
			"Ihr bestehendes Passwort wurde nicht ver&auml;ndert.\n\n".
			"Name:     %2\$s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Konto wieder aktiviert";
$email_revive       = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass ihr Konto am ".$email_date." wieder freigeschalten wurde.\n\n".
			"Loginname:     %1\$s\n".
			"Benutzername:  %2\$s\n\n".
			"Aus Sicherheitsgr&uuml;nden kann ihr Passwort ihnen nicht gesendet werden.\n\n".
			"Falls sie ihr Passwort vergessen haben, senden sie eine E-Mail an ".$EMAIL_ADMIN." mit ihrem Anliegen.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Konto deaktiviert.";
$email_delete_user  = "Hallo,\n\nIhre ".$MANAGER_NAME."-Seite informiert sie, dass ihr Konto am ".$email_date." gesperrt worden ist.\n\n".
			"Es tut uns leid, dass sie uns verlassen haben. Wir bedanken uns f&uuml;r die geleistete Arbeit!\n\n".
			"Wenn sie geben die Sperrung Einspruch erheben wollen oder denken, dass dies ein Irrtum ist, senden sie bitte eine E-Mail an ".$EMAIL_ADMIN.".";

?>