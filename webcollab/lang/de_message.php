<?php
/*
  $Id$

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

  Language files for 'de' (German)

  Translation: Sebastian Knapp, Michael Bunk

  Maintainer: Michael Bunk <micha137 at users.sourceforge.net>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );

//xml language identifier
define('XML_LANG', "de" );

//this is the regex for input validation filter used in common.php
define('VALIDATION_REGEX', "/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/" );

//dates
$month_array = array ( NULL, "Jan", "Feb", "M�r", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez" );
$week_array = array('So','Mo','Di','Mi','Do','Fr','Sa');

//task states
 //priorities
    $task_state['dontdo']                = "Nichtstun";
    $task_state['low']                   = "Niedrig";
    $task_state['normal']                = "Normal";
    $task_state['high']                  = "Hoch";
    $task_state['yesterday']             = "Gestern!";
 //status
    $task_state['new']                   = "Neu";
    $task_state['planned']               = "In Planung (nicht aktiv)";
    $task_state['active']                = "Aktiv (in Arbeit)";
    $task_state['cantcomplete']          = "Warten";
    $task_state['completed']             = "Abgeschlossen";
    $task_state['done']                  = "Fertig";
    $task_state['task_planned']          = " geplant";
    $task_state['task_active']           = " aktiv";
 //project states
    $task_state['planned_project']       = "Geplantes Projekt (nicht aktiv)";
    $task_state['no_deadline_project']   = "Kein Fertigstellungsdatum gesetzt";
    $task_state['active_project']        = "Aktives Projekt";

//common items
    $lang['description']                 = "Beschreibung";
    $lang['name']                        = "Name";
    $lang['add']                         = "Hinzuf�gen";
    $lang['update']                      = "Aktualisieren";
    $lang['submit_changes']              = "�nderungen best�tigen";
    $lang['continue']                    = "Weiter";
    $lang['reset']                       = "Zur�cksetzen";
    $lang['manage']                      = "Verwalten";
    $lang['edit']                        = "Bearbeiten";
    $lang['delete']                      = "L�sche";
    $lang['del']                         = "L�schen";
    $lang['confirm_del_javascript']      = "L�schen best�tigen!";
    $lang['yes']                         = "Ja";
    $lang['no']                          = "Nein";
    $lang['action']                      = "Aktion";
    $lang['task']                        = "Aufgabe";
    $lang['tasks']                       = "Aufgaben";
    $lang['project']                     = "Projekt";
    $lang['info']                        = "Info";
    $lang['bytes']                       = " Bytes";
    $lang['select_instruct']             = "(Verwende Strg f�r Mehrfachauswahl oder um nichts auszuw�hlen)";
    $lang['member_groups']               = "Der Nutzer ist Mitglied in den markierten Gruppen (wenn es welche gibt).";
    $lang['login']                       = "Login";
    $lang['login_action']                = "Login";
    $lang['login_screen']                = "Login";
    $lang['error']                       = "Fehler";
    $lang['no_login']                    = "Zugriff verweigert, Nutzername oder Passwort falsch";
    $lang['redirect_sprt']               = "Sie gelangen automatisch zur Loginseite nach %d Sekunden";
    $lang['login_now']                   = "Bitte klicken sie hier, um jetzt zur Loginseite zur�ckzukehren";
    $lang['please_login']                = "Bitte melden Sie sich an";
    $lang['go']                          = "Los!";

 //graphic items
    $lang['late_g']                      = "&nbsp;VERSP�TET&nbsp;";
    $lang['new_g']                       = "&nbsp;NEU&nbsp;";
    $lang['updated_g']                   = "&nbsp;AKTUALISIERT&nbsp;";

//admin config
    $lang['admin_config']                = "Administrator-Konfiguration";
    $lang['email_settings']              = "Email-Header Einstellungen";
    $lang['admin_email']                 = "Administrator-Email";
    $lang['email_reply']                 = "Email 'Antwort an'";
    $lang['email_from']                  = "Email 'Von'";
    $lang['mailing_list']                = "Mailingliste";
    $lang['default_checkbox']            = "Voreinstellung der Checkboxen f�r Projekte und Aufgaben";
    $lang['allow_globalaccess']          = "Erlaube globalen Zugriff?";
    $lang['allow_group_edit']            = "Ist es allen Nutzern der Gruppe erlaubt, die Daten zu bearbeiten?";
    $lang['set_email_owner']             = "Den Besitzer immer per Email �ber Ver�nderungen benachrichtigen?";
    $lang['set_email_group']             = "Soll die Nutzergruppe immer bei Ver�nderungen benachrichtigt werden?";
    $lang['project_listing_order']       = "Projektsortierung nach";
    $lang['task_listing_order']          = "Aufgabensortierung nach";
    $lang['configuration']               = "Konfiguration";

//archive
    $lang['archived_projects']           = "Archivierte Projekte";

 //contacts
    $lang['firstname']                   = "Vorname:";
    $lang['lastname']                    = "Nachname:";
    $lang['company']                     = "Firma:";
    $lang['home_phone']                  = "Telefon (privat):";
    $lang['mobile']                      = "Mobiltelefon:";
    $lang['fax']                         = "Fax:";
    $lang['bus_phone']                   = "Telefon (gesch�ftlich):";
    $lang['address']                     = "Adresse:";
    $lang['postal']                      = "Postleitzahl:";
    $lang['city']                        = "Ort:";
    $lang['email_contact']               = "Email:";
    $lang['notes']                       = "Notizen:";
    $lang['add_contact']                 = "Kontakt hinzuf�gen";
    $lang['del_contact']                 = "Kontakt l�schen";
    $lang['contact_info']                = "Kontaktinformationen";
    $lang['contacts']                    = "Kontakte";
    $lang['contact_add_info']            = "Wenn eine Firma angegeben wurde, erscheint der Firmenname anstelle des Nutzernamens.";
    $lang['show_contact']                = "Zeige Kontakte";
    $lang['edit_contact']                = "Bearbeite Kontakte";
    $lang['contact_submit']              = "Kontakt absenden";
    $lang['contact_warn']                = "Es wurden nicht gen�gend Daten eingegeben, um den Kontakt hinzuzuf�gen. Bitte gehen Sie zur�ck und geben Sie mindestens den Vor- und Nachnamen an.";

 //files
    $lang['manage_files']                = "Dateiverwaltung";
    $lang['no_files']                    = "Es gibt keine hochgeladenen Dateien.";
    $lang['no_file_uploads']             = "Die Einstellungen des Servers dieser Website erlauben keine Datei-Uploads";
    $lang['file']                        = "Datei:";
    $lang['uploader']                    = "Ersteller/in:";
    $lang['files_assoc_project']         = "Mit Projekt verkn�pfte Dateien";
    $lang['files_assoc_task']            = "Mit Aufgabe verkn�pfte Dateien";
    $lang['file_admin']                  = "Dateiverwalter";
    $lang['add_file']                    = "Datei hinzuf�gen";
    $lang['files']                       = "Dateien";
    $lang['file_choose']                 = "Datei zum Hochladen:";
    $lang['upload']                      = "Hochladen";
    $lang['file_email_owner']            = "Sende Benachrichtigungsemail �ber neue Datei an den Eigent�mer?";
    $lang['file_email_usergroup']        = "Sende Benachrichtigungsemail �ber neue Datei an Nutzergruppe?";
    $lang['max_file_sprt']               = "Die hochzuladende Datei muss kleiner als %s kB sein.";
    $lang['file_submit']                 = "Datei absenden";
    $lang['no_upload']                   = "Es wurde keine Datei hochgeladen.  Bitte gehen Sie zur�ck und versuchen Sie es noch einmal.";
    $lang['file_too_big_sprt']           = "Die maximale Dateigr��e ist %s Bytes. Ihr Upload war zu gro� und wurde gel�scht.";
    $lang['del_file_javascript_sprt']    = "Bitte best�tigen Sie das L�schen der Datei %s.";


 //forum
    $lang['orig_message']                = "Originalnachricht:";
    $lang['post']                        = "Versenden";
    $lang['message']                     = "Nachricht:";
    $lang['post_reply_sprt']             = "Sende eine Antwort auf die Nachricht von '%s' �ber '%s'";
    $lang['post_message_sprt']           = "Sende eine Nachricht an: '%s'";
    $lang['forum_email_owner']           = "Sende Forenbeitrag an Eigent�mer?";
    $lang['forum_email_usergroup']       = "Sende Forenbeitrag an Nutzergruppe?";
    $lang['reply']                       = "Antwort";
    $lang['new_post']                    = "Neue Nachricht";
    $lang['public_user_forum']           = "Offenes Nutzerforum";
    $lang['private_forum_sprt']          = "Privates Forum f�r Gruppe '%s' ";
    $lang['forum_submit']                = "Beitrag absenden";
    $lang['no_message']                  = "Keine Nachricht angegeben! Bitte gehen Sie zur�ck und versuchen Sie es noch einmal";
    $lang['add_reply']                   = "Antwort hinzuf�gen";
    $lang['last_post_sprt']              = "Letzter Beitrag %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']                = "Neue Forenbeitr�ge";
    $lang['forum_search']                = "Suche im Forum";
    $lang['no_results']                  = "Keine Treffer gefunden f�r '%s'";
    $lang['search_results']              = "%1\$s Treffer f�r '%2\$s' gefunden<br />Zeige Treffer %3\$s bis %4\$s";

 //includes
    $lang['report']                      = "Report";
    $lang['warning']                     = "<h1>Entschuldigung!</h1><P>Der Vorgang kann im Moment nicht abgearbeitet werden. Bitte versuchen Sie es sp�ter noch einmal.</p>";
    $lang['home_page']                   = "Startseite";
    $lang['summary_page']                = "�bersicht";
    $lang['log_out']                     = "Abmelden";
    $lang['main_menu']                   = "Hauptmen�";
    $lang['archive']                     = "Archiv";
    $lang['user_homepage_sprt']          = "Startseite von %s";
    $lang['missing_field_javascript']    = "Bitte geben sie einen Wert in das leere Feld ein";
    $lang['invalid_date_javascript']     = "Bitte w�hlen sie ein g�ltiges Kalenderdatum";
    $lang['finish_date_javascript']      = "Das angegebene Datum liegt nach dem Fertigstellungstermin des Projekts!";
    $lang['security_manager']            = "Sicherheitsverwaltung";
    $lang['session_timeout_sprt']        = "Zugriff verweigert, Ihre letzte Aktion war vor %d Minuten. %d Minuten bleibt eine Session ohne Aktion g�ltig, bitte neu <a href=\"%sindex.php\">anmelden</a>.";
    $lang['access_denied']               = "Zugriff verweigert";
    $lang['private_usergroup_no_access'] = "Dieser Bereich geh�rt zu einer privaten Nutzergruppe und sie haben keine Zugriffsrechte.";
    $lang['invalid_date']                = "Ung�ltiges Datum";
    $lang['invalid_date_sprt']           = "Das Datum %s ist kein g�ltiges Kalenderdatum (Pr�fen sie die Anzahl der Monatstage!). Bitte gehen sie zur�ck und geben sie eine neues Datum ein!";


 //taskgroups
    $lang['taskgroup_name']              = "Name der Aufgabengruppe:";
    $lang['taskgroup_description']       = "Kurzbeschreibung der Aufgabengruppe:";
    $lang['add_taskgroup']               = "Aufgabengruppe hinzuf�gen";
    $lang['add_new_taskgroup']           = "Neue Aufgabengruppe hinzuf�gen";
    $lang['edit_taskgroup']              = "Aufgabengruppe bearbeiten";
    $lang['taskgroup_manage']            = "Aufgabengruppen verwalten";
    $lang['no_taskgroups']               = "Es sind keine Aufgabengruppen festgelegt.";
    $lang['manage_taskgroups']           = "Aufgabengruppen verwalten";
    $lang['taskgroups']                  = "Aufgabengruppen";
    $lang['taskgroup_dup_sprt']          = "Es gibt bereits eine Aufgabenruppe '%s'. Bitte w�hlen sie einen neuen Namen.";
    $lang['info_taskgroup_manage']       = "Informationen �ber die Aufgabengruppenverwaltung";

 //usergroups
    $lang['usergroup_name']              = "Name der Nutzergruppe:";
    $lang['usergroup_description']       = "Kurzbeschreibung der Nutzergruppe:";
    $lang['members']                     = "Mitglieder:";
    $lang['private_usergroup']           = "Private Nutzergruppe";
    $lang['add_usergroup']               = "Nutzergruppe hinzuf�gen";
    $lang['add_new_usergroup']           = "Neue Nutzergruppe hinzuf�gen";
    $lang['edit_usergroup']              = "Nutzergruppe bearbeiten";
    $lang['usergroup_manage']            = "Nutzergruppen verwalten";
    $lang['no_usergroups']               = "Es wurden keine Nutzergruppen festgelegt.";
    $lang['manage_usergroups']           = "Nutzergruppen verwalten";
    $lang['usergroups']                  = "Nutzergruppen";
    $lang['usergroup_dup_sprt']          = "Es gibt bereits eine Nutzergruppe '%s'. Bitte w�hlen sie einen neuen Namen.";
    $lang['info_usergroup_manage']       = "Informationen �ber die Nutzergruppenverwaltung";

 //users
    $lang['login_name']                  = "Loginname";
    $lang['full_name']                   = "Vollst�ndiger Name";
    $lang['password']                    = "Passwort";
    $lang['blank_for_current_password']  = "(Freilassen, um bestehendes Passwort zu �bernehmen)";
    $lang['email']                       = "E-Mail";
    $lang['admin']                       = "Administrator";
    $lang['private_user']                = "Privater Nutzer";
    $lang['normal_user']                 = "Normaler Nutzer";
    $lang['is_admin']                    = "Administrator";
    $lang['is_guest']                    = "Gast";
    $lang['guest']                       = "Gast";
    $lang['user_info']                   = "Informationen �ber den Nutzer";
    $lang['deleted_users']               = "Gel�schte Nutzer";
    $lang['no_deleted_users']            = "Es gibt keine gel�schten Nutzer.";
    $lang['revive']                      = "Wiederbeleben";
    $lang['permdel']                     = "Dauerhaft l�schen";
    $lang['permdel_javascript_sprt']     = "Hiermit werden dauerhaft alle Aufzeichnungen und zugeordneten Aufgaben des Nutzers %s l�schen. Sind sie sicher?";
    $lang['add_user']                    = "Nutzer hinzuf�gen";
    $lang['edit_user']                   = "Nutzer bearbeiten";
    $lang['no_users']                    = "Dem System sind keine Nutzer bekannt.";
    $lang['users']                       = "Nutzer";
    $lang['existing_users']              = "Vorhandene Nutzer";
    $lang['private_profile']             = "Dieser Nutzer hat ein privates Profil, das von ihnen nicht eingesehen werden darf.";
    $lang['private_usergroup_profile']   = "(Dieser Nutzer ist Mitglied einer privaten Nutzergruppe, welche nicht von ihnen eingesehen werden darf.)";
    $lang['email_users']                 = "Email an Nutzer";
    $lang['select_usergroup']            = "Folgende Nutzergruppe:";
    $lang['subject']                     = "Betreff:";
    $lang['message_sent_maillist']       = "In jedem Falle wird eine Nachricht an die Mailingliste gesendet.";
    $lang['who_online']                  = "Wer ist online?";
    $lang['edit_details']                = "Nutzerdetails bearbeiten";
    $lang['show_details']                = "Nutzerdetails anzeigen";
    $lang['user_deleted']                = "Dieser Nutzer wurde gel�scht!";
    $lang['no_usergroup']                = "Dieser Nutzer ist kein Mitglied einer Nutzergruppe.";
    $lang['not_usergroup']               = "(Kein Mitglied einer Nutzergruppe)";
    $lang['no_password_change']          = "(Ihr bestehendes Passwort hat sich nicht ver�ndert)";
    $lang['last_time_here']              = "Zum letzten Mal hier gesehen:";
    $lang['number_items_created']        = "Anzahl der erzeugten Eintr�ge in Datenbank:";
    $lang['number_projects_owned']       = "Anzahl der eigenen Projekte:";
    $lang['number_tasks_owned']          = "Anzahl der eigenen Aufgaben:";
    $lang['number_tasks_completed']      = "Anzahl der abgeschlossenen Aufgaben:";
    $lang['number_forum']                = "Anzahl der Sendungen an das Forum:";
    $lang['number_files']                = "Anzahl der hochgeladenen Dateien:";
    $lang['size_all_files']              = "Speicherplatz f�r alle hochgeladenen Dateien:";
    $lang['owned_tasks']                 = "Eigene Aufgaben";
    $lang['invalid_email']               = "Ung�ltige E-Mail-Adresse";
    $lang['invalid_email_given_sprt']    = "Die E-Mail-Adresse '%s' ist ung�ltig. Bitte gehen sie zur�ck und versuchen es noch einmal!";
    $lang['duplicate_user']              = "Nutzername doppelt vorhanden";
    $lang['duplicate_change_user_sprt']  = "Der Nutzer '%s' existiert bereits. Bitte �ndern sie seinen Namen.";
    $lang['value_missing']               = "Wert fehlt";
    $lang['field_sprt']                  = "Bitte gehen sie zur�ck und f�llen sie das Feld '%s' aus!";
    $lang['admin_priv']                  = "Hinweis: Sie haben Administratorrechte bekommen.";
    $lang['manage_users']                = "Nutzer verwalten";
    $lang['users_online']                = "Nutzer online";
    $lang['online']                      = "Der harte Kern (Vor weniger als 60 Minuten online gewesen)";
    $lang['not_online']                  = "Der Rest";
    $lang['user_activity']               = "Nutzeraktivit�t";

 //tasks
    $lang['add_new_task']                = "Neue Aufgabe hinzuf�gen";
    $lang['priority']                    = "Priorit�t";
    $lang['parent_task']                 = "�bergeordnete Aufgabe";
    $lang['creation_time']               = "Erstellungszeitpunkt";
    $lang['by_sprt']                     = "%1\$s durch %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                = "Projektname";
    $lang['task_name']                   = "Aufgabenname";
    $lang['deadline']                    = "Fertigstellungszeitpunkt";
    $lang['taken_from_parent']           = "(Von �bergeordneter Aufgabe �bernommen)";
    $lang['status']                      = "Status";
    $lang['task_owner']                  = "Eigent�mer der Aufgabe";
    $lang['project_owner']               = "Eigent�mer des Projekts";
    $lang['taskgroup']                   = "Aufgabengruppe";
    $lang['usergroup']                   = "Nutzergruppe";
    $lang['nobody']                      = "Niemand";
    $lang['none']                        = "Keine";
    $lang['no_group']                    = "Keine Gruppe";
    $lang['all_groups']                  = "Alle Gruppen";
    $lang['all_users']                   = "Alle Nutzer";
    $lang['all_users_view']              = "K�nnen alle Nutzer diese Aufgabe einsehen?";
    $lang['group_edit']                  = "Kann jeder in der Nutzergruppe bearbeiten?";
    $lang['project_description']         = "Projektbeschreibung";
    $lang['task_description']            = "Aufgabenbeschreibung";
    $lang['email_owner']                 = "Dem Eigent�mer eine E-Mail mit den �nderungen schicken?";
    $lang['email_new_owner']             = "Dem (neuen) Eigent�mer eine E-Mail mit den �nderungen schicken?";
    $lang['email_group']                 = "Der Nutzergruppe eine E-Mail mit den �nderungen schicken?";
    $lang['add_new_project']             = "Neues Projekt hinzuf�gen";
    $lang['uncategorised']               = "Nicht eingeordnet";
    $lang['due_sprt']                    = "In %d Tagen";
    $lang['tomorrow']                    = "Morgen";
    $lang['due_today']                   = "Heute f�llig";
    $lang['overdue_1']                   = "1 Tag �berf�llig";
    $lang['overdue_sprt']                = "%d Tage �berf�llig";
    $lang['edit_task']                   = "Aufgabe bearbeiten";
    $lang['edit_project']                = "Projekt bearbeiten";
    $lang['no_reparent']                 = "Es gibt kein �bergeordnetes Projekt";
    $lang['del_javascript_project_sprt'] = "Hiermit wird Projekt %s gel�scht. Sind sie sicher?";
    $lang['del_javascript_task_sprt']    = "Hiermit wird Aufgabe %s gel�scht. Sind sie sicher?";
    $lang['add_task']                    = "Aufgabe hinzuf�gen";
    $lang['add_subtask']                 = "Unteraufgabe hinzuf�gen";
    $lang['add_project']                 = "Projekt hinzuf�gen";
    $lang['clone_project']               = "Projekt klonen";
    $lang['clone_task']                  = "Aufgabe klonen";
    $lang['quick_jump']                  = "Schnellauswahl";
    $lang['no_edit']                     = "Dieser Eintrag geh�rt ihnen nicht und deshalb d�rfen sie ihn nicht bearbeiten. Fragen sie einen Administrator oder den Eigent�mer, die �nderungen vorzunehmen.";
    $lang['global']                      = "Global";
    $lang['delete_project']              = "Projekt l�schen";
    $lang['delete_task']                 = "Aufgabe l�schen";
    $lang['project_options']             = "Projekteigenschaften";
    $lang['task_options']                = "Aufgabeneigenschaften";
    $lang['javascript_archive_project']  = "Projekt %s wird archiviert.  Sind sie sicher?";
    $lang['archive_project']             = "Archiviere Projekt";
    $lang['task_navigation']             = "Aufgaben-Navigation";
    $lang['new_task']                    = "Neue Aufgabe";
    $lang['no_projects']                 = "Es gibt keine Projekte in dieser Ansicht";
    $lang['show_all_projects']           = "Zeige alle Projekte";
    $lang['show_active_projects']        = "Zeige nur aktive Projekte";
    $lang['completed']                   = "Fertiggestellt";
    $lang['project_hold_sprt']           = "Projekt aufgeschoben seit %s";
    $lang['project_planned']             = "Geplantes Projekt";
    $lang['percent_sprt']                = "%d%% der Aufgaben sind erledigt";
    $lang['project_no_deadline']         = "Kein Fertigstellungstermin f�r dieses Projekt gesetzt";
    $lang['no_allowed_projects']         = "Es gibt keine Projekte, die sie einsehen d�rfen";
    $lang['projects']                    = "Projekte";
    $lang['percent_project_sprt']        = "Dieses Projekt ist zu %d%% fertiggestellt";
    $lang['owned_by']                    = "Geh�rt zu";
    $lang['created_on']                  = "Erstellt am";
    $lang['completed_on']                = "Fertiggestellt am";
    $lang['modified_on']                 = "Ver�ndert am";
    $lang['project_on_hold']             = "Projekt ist im Wartezustand";
    $lang['project_accessible']          = "(Dieses Projekt ist �ffentlich zug�nglich f�r alle Nutzer)";
    $lang['task_accessible']             = "(Diese Aufgabe ist �ffentlich zug�nglich f�r alle Nutzer)";
    $lang['project_not_accessible']      = "(Dieses Projekt ist nur f�r Mitglieder der Nutzergruppe zug�nglich)";
    $lang['task_not_accessible']         = "(Diese Aufgabe ist nur f�r Mitglieder der Nutzergruppe zug�nglich)";
    $lang['project_not_in_usergroup']    = "Projekt keiner Nutzergruppe zugeordnet und f�r alle Nutzer zug�nglich.";
    $lang['task_not_in_usergroup']       = "Aufgabe keiner Nutzergruppe zugeordnet und f�r alle Nutzer zug�nglich.";
    $lang['usergroup_can_edit_project']  = "Dieses Projekt kann auch durch Mitglieder der Nutzergruppe bearbeitet werden.";
    $lang['usergroup_can_edit_task']     = "Diese Aufgabe kann auch durch Mitglieder der Nutzergruppe bearbeitet werden.";
    $lang['i_take_it']                   = "Ich �bernehm' es :)";
    $lang['i_finished']                  = "Ich habe fertig!";
    $lang['i_dont_want']                 = "Ich habe die Schnauze voll";
    $lang['take_over_project']           = "Projekt �bernehmen";
    $lang['take_over_task']              = "Aufgabe �bernehmen";
    $lang['task_info']                   = "Informationen �ber Aufgabe";
    $lang['project_details']             = "Projektdetails";
    $lang['todo_list_for']               = "Aufgaben f�r: ";
    $lang['due_in_sprt']                 = " (F�llig in %d Tagen)";
    $lang['due_tomorrow']                = " (Morgen f�llig)";
    $lang['no_assigned']                 = "Es gibt keine unerledigten Aufgaben f�r diesen Nutzer.";
    $lang['todo_list']                   = "Aufgaben";
    $lang['summary_list']                = "Zusammenfassung";
    $lang['task_submit']                 = "Aufgabe senden";
    $lang['not_owner']                   = "Zugriff verweigert. Entweder sind sie nicht der Eigent�mer oder sie haben keine ausreichenden Zugriffsrechte";
    $lang['missing_values']              = "Es wurden nicht gen�gend Felder ausgef�llt. Bitte gehen sie zur�ck und versuchen sie es noch einmal";
    $lang['future']                      = "Zukunft";
    $lang['flags']                       = "Optionen";
    $lang['owner']                       = "Besitzer";
    $lang['group']                       = "Gruppe";
    $lang['by_usergroup']                = " (durch Nutzergruppe)";
    $lang['by_taskgroup']                = " (durch Aufgabengruppe)";
    $lang['by_deadline']                 = " (nach Fertigstellungsdatum)";
    $lang['by_status']                   = " (nach Status)";
    $lang['by_owner']                    = " (nach Eigent�mer)";
//** needs translation
    $lang['by_priority']                 = " (by priority)";
    $lang['project_cloned']              = "Zu klonendes Projekt: ";
    $lang['task_cloned']                 = "Zu klonende Aufgabe: ";
    $lang['note_clone']                  = "Bemerkung: Die Aufgabe wird als neues Projekt erscheinen";

 //bits 'n' pieces
    $lang['calendar']                    = "Kalender";
    $lang['normal_version']              = "Normalversion";
    $lang['print_version']               = "Druckversion";
    $lang['condensed_view']              = "Kurzansicht";
    $lang['full_view']                   = "Vollst�ndige Ansicht";
    $lang['icalendar']                   = "iCalendar";
//**
    $lang['url_javascript']              = "Enter the URL:";
//**
    $lang['image_url_javascript']        = "Enter the image URL:";

?>