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

$title_takeover     = $ABBR_MANAGER_NAME.": Eins von Ihren Projekten bzw. Aufgaben ist &uuml;bergeben worden.";
$email_takeover     = "Hallo,\n\nIhre %s-Seite informiert Sie, dass %s durch den Administrator an %s &uuml;bergen wurde.\n\n".
			"Projekt:  %s\n".
			"Aufgabe:  %s\n".
			"Besitzer: %s ( %s )\n".
			"Text:\n%s\n\n".
			"Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n%s\n";

$title_new_owner    = $ABBR_MANAGER_NAME.": Neue %s f&uuml; Sie";
$email_new_owner    = "Hallo,\n\nIhre %s-Seite informiert Sie, dass ein(e) %s die Sie verwalten auf %s ge&auml;ndert wurde.\n\nHier im Detail:\n\n".
			"Projekt:  %s\n".
			"Aufgabe:  %s\n".
			"Status:   %s\n\n".
			"Text:\n%s\n\n".
			"Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n%s\n";

$title_new_group    = $ABBR_MANAGER_NAME.": Neue Gruppe %s: ";
$email_new_group    = "Hallo,\n\nIhre %s-Seite informiert sie, dass eine neue Gruppe %s erstellt worden ist auf %s\n\nDetails:\n\n".
			"Projekt:  %s\n".
			"Aufgabe:  %s\n".
			"Owner:    %s\n".
			"Status:   %s\n\n".
			"Text:\n%s\n\n".
			"Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n%s\n";

$title_edit_owner   = $ABBR_MANAGER_NAME.": Ihr Projekt %s wurde bearbeitet";
$email_edit_owner   ="Hallo,\n\nIhre %s-Seite informiert sie, dass ihr Projekt %s auf %s bearbeitet wurde.\n\nDetails:\n\n".
			"Projekt:  %s\n".
			"Aufgabe:  %s\n".
			"Status:   %s\n\n".
			"Text: \n%s\n\n".
			"Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n%s\n";


$title_edit_group   = $ABBR_MANAGER_NAME.": %s aktualisiert";
$email_edit_group   = "Hallo,\n\nIhre %s-Seite informiert sie, dass ein(e) %s, die %s geh&uuml;rt auf %s bearbeitet wurde.\n\nDetails:\n\n".
			"Projekt:  %s\n".
			"Aufgabe:  %s\n".
			"Status:   %s\n\n".
			"Text: \n%s\n\n".
			"Besuchen Sie die Website, wenn Sie mehr wissen wollen.\n\n%s\n";


$title_delete_task  = $ABBR_MANAGER_NAME.": %s gel&ouml;scht";
$email_delete_task  = "Hallo,\n\n".
			"Ihre %s-Seite informiert sie, dass ein(e) %s, das/die ihnen geh&ouml;rte, gel&ouml;scht worden ist auf %s\n\n".
			"Projekt:  %s\n".
			"Aufgabe:  %s\n".
			"Status:   %s\n\n".
			"Text: \n%s\n\n".
			"Danke f&uuml;r die Verwaltung der Aufgabe, solange es sie gab.";


$title_welcome      = "Willkommen bei ".$ABBR_MANAGER_NAME;
$email_welcome      = "Hallo,\n\nEs begr&uuml;&szlig;t sie die %s-Seite auf %s.\n\n".
			"Da sie neu hier sind, werde ich zuerst ein Paar Dinge erkl&auml;ren, so dass sie schnell zu arbeiten beginnen k&ouml;nnen.\n\n".
			"Dies ist ein Projektverwaltungswerkzeug. Der Hauptbildschirm wird ihnen die momentan vorhandenen Projekte zeigen. ".
			"Wenn sie auf einen der Namen klicken, k&ouml;nnen sie die zum Projekt geh&ouml;rigen Aufgaben einsehen. Hier wird die Arbeit ablaufen.\n\n".
			"Jede Nachricht, die sie verschicken oder Aufgabe, die sie bearbeiten, wird anderen Benutzern als 'neu' or 'aktualisiert' erscheinen. Das funktioniert auch andersherum und ".
			"erlaubt ihnen schnell zu erkennen, wo gerade etwas passiert.\n\n".
			"Sie k&ouml;nnen ebenso den Besitz von Aufgaben &uuml;bernehmen und sie dann bearbeiten. Auch die Nachrichten im zugeh&ouml;rigen Forum lassen sich dann bearbeiten. ".
			"Sowie ihre Arbeit voranschreitet, aktualisieren sie bitte Aufgabentext und Status, damit jeder verfolgen kann, wie sie voranschreiten. ".
			"\n\nIch kann ihnen nun noch viel Erfolg w&uuml;nschen. Sie k&ouml;nnen %s mailen, wenn sie festh&auml;ngen.\n\n --Viel Gl&uuml;ck!\n\n".
			"Login:           %s\n".
			"Passwort:        %s\n\n".
			"Benutzergruppen: %s".
			"Name:            %s\n".
			"Webseite:        %s\n\n".
			"%s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Ihr Konto wurde von einem Administrator bearbeitet";
$email_user_change1 = "Hallo,\n\nIhre %s-Seite informiert sie, dass ihr Konto auf %s bearbeitet worden ist von %s ( %s ) \n\n".
			"Login:           %s\n".
			"Passwort:        %s\n\n".
			"Benutzergruppen: %s".
			"Name:            %s\n\n".
			"%s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Bearbeitung ihres Kontos";
$email_user_change2 = "Hello,\n\nIhre %s-Seite best&auml;tigt, dass sie erfolgreich ihr Konto auf %s bearbeitet haben\n\n".
			"Login:    %s\n".
			"Passwort: %s\n\n".
			"Name:     %s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.": Bearbeitung ihres Kontos";
$email_user_change3 = "Hallo,\n\nIhre %s-Seite best&auml;tigt, dass sie erfolgreich ihr Konto auf %s bearbeitet haben\n\n".
			"Login:    %s\n".
			"Ihr bestehendes Passwort wurde nicht ver&auml;ndert.\n\n".
			"Name:     %s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Konto wieder aktiviert";
$email_revive       = "Hallo,\n\nIhre %s-Seite informiert sie, dass ihr Konto auf %s wieder freigeschalten wurde.\n\n".
			"Loginname:     %s\n".
			"Benutzername:  %s\n\n".
			"Aus Sicherheitsgr&uuml;nden kann ihr Passwort ihnen nicht gesendet werden.\n\n".
			"Falls sie ihr Passwort vergessen haben, senden sie eien E-Mail an %s mit ihrem Anliegen.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Konto deaktiviert.";
$email_delete_user  = "Hallo,\n\nIhre %s-Seite informiert sie, dass ihr Konto auf %s gesperrt worden ist.\n\n".
			"Es tut uns leid, dass sie uns verlassen haben. Wir bedanken uns f&uuml;r die geleistete Arbeit!\n\n".
			"Wenn sie geben die Sperrung Einspruch erheben wollen oder denken, dass dies ein Irrtum ist, senden sie bitte eine E-Mail an %s.";

?>
