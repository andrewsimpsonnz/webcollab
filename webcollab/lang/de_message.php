<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Maintainer:

*/

//dates
$month_array = array ( "Jan", "Feb", "M&auml;rz", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez" );
$week_array = array('So','Mo','Di','Mi','Do','Fr','Sa');

//task states
$task_state = array(
 //priorities
 "dontdo" => "Nichtstun",
 "low" => "Niedrig",
 "normal" => "Normal",
 "high" => "Hoch",
 "yesterday" => "Gestern!",
 //status
 "new" => "Neu",
 "planned" => "In Planung (nicht aktiv)",
 "active" => "Aktiv (in Arbeit)",
 "cantcomplete" => "Warten",
 "completed" => "Abgeschlossen",
 "done" => "Fertig",
 "task_planned" => " geplant",
 "task_active" => " aktiv",
 //project states
 "planned_project" => "Geplantes Projekt (nicht aktiv)",
 "no_deadline_project" => "Kein Fertigstellungsdatum gesetzt",
 "active_project" => "Aktives Projekt" );

//common items
$lang = array(
 "description" => "Beschreibung",
 "name" => "Name",
 "add" => "Hinzuf&uuml;gen",
 "update" => "Aktualisieren",
 "submit_changes" => "&Auml;nderungen best&auml;tigen",
 "continue" => "Continue",
 "reset" => "Zur&uuml;cksetzen",
 "manage" => "Verwalten",
 "edit" => "Bearbeiten",
 "delete" => "L&ouml;sche",
 "del" => "L&ouml;schen",
 "confirm_del" => "L&ouml;schen best&auml;tigen!",
 "yes" => "Ja",
 "no" => "Nein",
 "action" => "Aktion",
 "task" => "Aufgabe",
 "task_lc" => "Aufgabe",
 "tasks" => "Aufgaben",
 "project" => "Projekt",
 "project_lc" => "Projekt",
 "info" => "Info",
 "bytes" => " bytes",
 "select_instruct" => "(Verwende Strg f&uuml;r Mehrfachauswahl oder um nichts auszuw&auml;hlen)",
 "member_groups" => "Der Benutzer ist Mitglied in den markierten Gruppen (wenn es welche gibt).",
 "login" => "Login",
 "error" => "Fehler",
 "no_login" => "Zugriff verweigert, Benutzername oder Passwort ist falsch",
 "please_login" => "Bitte melden Sie sich an",

//admin config
 "admin_config" => "Administrator Konfiguration",
 "email_settings" => "Email-Header Einstellungen",
 "admin_email" => "Administrator-Email",
 "email_reply" => "Email 'weiter an'",
 "email_from" => "Email 'von'",
 "mailing_list" => "Mailingliste",
 "default_checkbox" => "Voreinstellung der Checkboxen f&uuml;r Projekte und Aufgaben",
 "allow_globalaccess" => "Erlaube globalen Zugriff?",
 "allow_group_edit" => "Ist es allen Benutzern der Gruppe erlaubt, die Daten zu bearbeiten?",
 "set_email_owner" => "Den Besitzer immer per Email &uuml;ber Ver&auml;nderungen benachrichtigen?",
 "set_email_group" => "Soll die Benutzergruppe immer bei Ver&auml;nderungen benachrichtigt werden?",
 "configuration" => "Konfiguration",


//contacts
 "firstname" => "Vorname:",
 "lastname" => "Nachname:",
 "company" => "Firma:",
 "home_phone" => "Telefon (privat):",
 "mobile" => "Mobiltelefon:",
 "fax" => "Fax:",
 "bus_phone" => "Telefon (gesch&auml;ftlich):",
 "address" => "Adresse:",
 "postal" => "Postleitzahl:",
 "city" => "Ort:",
 "email" => "Email:",
 "notes" => "Notizen:",
 "add_contact" => "Kontakt hinzuf&uuml;gen",
 "del_contact" => "Kontakt l&ouml;schen",
 //line below removed version 1.49+
 "del_javascript" => "Bitte best&auml;tigen sie das L&ouml;schen dieses Kontakts.",
 "contact_info" => "Kontaktinformationen",
 "contacts" => "Kontakte",
 "contact_add_info" => "Wenn eine Firma angegeben wurde, erscheint der Firmenname anstelle des Benutzernamens.",
 "show_contact" => "Zeige Kontakte",
 "edit_contact" => "Bearbeite Kontakte",
 "contact_submit" => "Kontakt absenden",
 "contact_warn" => "Es wurden nicht gen&uuml;gend Daten eingegeben, um den Kontakt hinzuzuf&uuml;gen. Bitte gehen Sie zur&uumlck und geben Sie mindestens den Vor- und Nachnamen an.",

 //files
 "manage_files" => "Dateiverwaltung",
 "no_files" => "Es gibt keine hochgeladenen Dateien.",
 "no_file_uploads" => "Die Einstellungen des Servers dieser Website erlauben keine Datei-Uploads",
 "file" => "Datei:",
 "uploader" => "Ersteller/in:",
 "files_assoc_sprt" => "Mit %s verkn&uuml;pfte Dateien",
 "file_admin" => "Dateiverwalter",
 "add_file" => "Datei hinzuf&uuml;gen",
 "files" => "Dateien",
 "file_choose" => "Datei zum Hochladen:",
 "upload" => "Hochladen",
 "max_file_sprt" => "Die hochzuladende Datei muss kleiner als %s kB sein.",
 "file_submit" => "Datei absenden",
 "no_upload" => "Es wurde keine Datei hochgeladen.  Bitte gehen Sie zur&uuml;ck und versuchen Sie es noch einmal.",
 "file_too_big_sprt" => "Die maximale Dateigr&ouml;&szlig;e ist %s Bytes. Ihr Upload war zu gro&szlig; und wurde gel&ouml;scht.",
 "del_file_javascript_sprt" => "Bitte best&auml;tigen Sie das L&ouml;schen der Datei %s.",


 //forum
 "orig_message" => "Originalnachricht:",
 "post" => "Versenden",
 "message" => "Nachricht:",
 "post_reply_sprt" => "Sende eine Antwort auf die Nachricht von '%s' ber '%s'",
 "post_message_sprt" => "Sende eine Nachricht an: '%s'",
 "reply" => "Antwort",
 "new_post" => "Neue Nachricht",
 "public_user_forum" => "Offenes Benutzerforum",
 "private_forum_sprt" => "Privates Forum fr Gruppe '%s' ",
 "forum_submit" => "Beitrag absenden",
 "no_message" => "Keine Nachricht angegeben! Bitte gehen Sie zur&uuml;ck und versuchen Sie es noch einmal",
 "add_reply" => "Antwort hinzuf&uuml;gen",

 //includes
 "report" => "Report",
 "warning" => "<H1>Entschuldigung!</H1><P>Der Vorgang kann im Moment nicht verarbeitet werden. Bitte versuchen Sie es sp&auml;ter noch einmal.</P>",
 "home_page" => "Startseite",
 "summary_page" => "&Uuml;bersicht",
 "todo_list" => "Aufgaben",
 "calendar" => "Kalender",
 "log_out" => "Abmelden",
 "main_menu" => "Hauptmenu",
 "user_homepage_sprt" => "Startseite von %s",
 "load_time_sprt" => "Diese Seite ben&ouml;tigte %.3f Sekunden zum Laden.  Davon wurden %.3f Sekunden f&uuml;r %d Datenbanktransaktionen verwendet.",
 "security_manager" => "Sicherheitsverwaltung",
 "no_key_sprt" => "Keine g&uuml;ltige Session-ID. Bitte gehen Sie zum <A href=\"%sindex.php\">Login</A>",
 "no_session" => "Unbekannte Session-ID, bitte neu <A href=\"%sindex.php\">einloggen</A>.",
 "session_timeout_sprt" => "Zugriff verweigert, Ihre letzte Aktion war vor %d Minuten. 60 Minuten bleibt eine Session ohne Aktion g&uuml;ltig, bitte neu <A href=\"%sindex.php\">anmelden</A>.",
 //line below removed version 1.49+
 "ip_spoof_sprt" =>"Es wurde festgestellt, da&szlig; sie eine gef&auml;lschte IP-Adresse verwenden (%s). Diese Sitzung wurde vorsichtshalber gel&ouml;scht. Bitte loggen sie sich <A href=\"%sindex.php\">neu ein</A>",
 "access_denied" => "Zugriff verweigert",
 "private_usergroup" => "Dieser Bereich ist in einer privaten Benutzergruppe und sie haben keine Zugriffsrechte.",
 "invalid_date" => "Ung&uuml;ltiges Datum",
 "invalid_date_sprt" => "Das Datum %s ist kein g&uuml;ltiges Kalenderdatum (Pr&uuml;fen sie die Anzahl der Monatstage!). Bitte gehen sie zur&uuml;ck und geben sie eine neues Datum ein!",


 //taskgroups
 "taskgroup_name" => "Name der Aufgabengruppe:",
 "taskgroup_description" => "Kurzbeschreibung der Aufgabengruppe:",
 "add_taskgroup" => "Aufgabengruppe hinzuf&uuml;gen",
 "add_new_taskgroup" => "Neue Aufgabengruppe hinzuf&uuml;gen",
 "edit_taskgroup" => "Aufgabengruppe bearbeiten",
 "taskgroup_manage" => "Aufgabengruppen verwalten",
 "no_taskgroups" => "Es sind keine Aufgabengruppen festgelegt.",
 "manage_taskgroups" => "Aufgabengruppen verwalten",
 "taskgroups" => "Aufgabengruppen",
 "taskgroup_dup_sprt" => "Es gibt bereits eine Aufgabenruppe '%s'. Bitte w&auml;hlen sie einen neuen Namen.",
 "info_taskgroup_manage" => "Informationen &uuml;ber Augabengruppenverwaltung",

 //usergroups
 "usergroup_name" => "Name der Nutzergruppe:",
 "usergroup_description" => "Kurzbeschreibung der Nutzergruppe:",
 "members" => "Mitglieder:",
 "add_usergroup" => "Nutzergruppe hinzuf&uuml;gen",
 "add_new_usergroup" => "Neue Nutzergruppe hinzuf&uuml;gen",
 "edit_usergroup" => "Nutzergruppe bearbeiten",
 "usergroup_manage" => "Nutzergruppen verwalten",
 "no_usergroups" => "Es wurden keine Nutzergruppen festgelegt.",
 "manage_usergroups" => "Nutzergruppen verwalten",
 "usergroups" => "Nutzergruppen",
 "usergroup_dup_sprt" => "Es gibt bereits eine Nutzergruppe '%s'. Bitte w&auml;hlen sie einen neuen Namen.",
 "info_usergroup_manage" => "Informationen &uuml;ber Nutzergruppenverwaltung",

 //users
 "login_name" => "Loginname",
 "full_name" => "Vollst&auml;ndiger Name",
 "password" => "Passwort",
 "blank_for_current_password" => "(Freilassen, um bestehendes Passwort zu bernehmen)",
 "email" => "E-Mail",
 "admin" => "Administrator",
 "is_admin" => "Kann administrieren?",
 "user_info" => "Informationen &uuml;ber den Nutzer",
 "deleted_users" => "Gel&ouml;schte Nutzer",
 "no_deleted_users" => "Es gibt keine gel&ouml;schten Nutzer.",
 "revive" => "Wiederbeleben",
 "permdel" => "Dauerhaft l&ouml;schen",
 "permdel_javascript_sprt" => "Hiermit werden dauerhaft alle Aufzeichnungen und zugeordneten Aufgaben des Nutzers %s l&ouml;schen. Sind sie sicher?",
 "add_user" => "Nutzer hinzuf&uuml;gen",
 "edit_user" => "Nutzer bearbeiten",
 "no_users" => "Dem System sind keine Nutzer bekannt",
 "users" => "Nutzer",
 "existing_users" => "Vorhandene Nutzer",
 "email_users" => "Email an Nutzer",
 "select_usergroup" => "Folgende Nutzergruppe:",
 "subject" => "Betreff:",
 "message_sent_maillist" => "In jedem Falle wird eine Nachricht an die Mailingliste gesendet.",
 "who_online" => "Wer ist online?",
 "edit_details" => "Nutzerdetails bearbeiten",
 "show_details" => "Nutzerdetails anzeigen",
 "user_deleted" => "Dieser Nutzer wurde gel&ouml;scht!",
 "no_usergroup" => "Dieser Nutzer ist kein Mitglied einer Nutzergruppe",
 "not_usergroup"=> "(Kein Mitglied einer Nutzergruppe)",
 "no_password_change" => "(Ihr bestehendes Passwort hat sich nicht ver&auml;ndert)",
 "last_time_here" => "Zum letzten Mal hier gesehen:",
 "number_items_created" => "Anzahl der erzeugten Eintr&auml;ge in Datenbank:",
 "number_projects_owned" => "Anzahl der eigenen Projekte:",
 "number_tasks_owned" => "Anzahl der eigenen Augaben:",
 "number_tasks_completed" => "Anzahl der abgeschlossenen Aufgaben:",
 "number_forum" => "Anzahl der Sendungen an das Forum:",
 "number_files" => "Anzahl der hochgeladenen Dateien:",
 "size_all_files" => "Speicherplatz f&uuml;r alle hochgeladenen Dateien:",
 "owned_tasks" => "Eigene Aufgaben",
 "invalid_email" => "Ung&uuml;ltige E-Mail-Adresse",
 "invalid_email_given_sprt" => "Die E-Mail-Adresse '%s' ist ung&uuml;ltig. Bitte gehen sie zur&uuml;ck und versuchen es noch einmal!",
 "duplicate_user" => "Nutzername doppelt vorhanden",
 "duplicate_change_user_sprt" => "Der Nutzer '%s' existiert bereits. Bitte &auml;ndern sie einen Namen.",
 "value_missing" => "Wert fehlt",
 "field_sprt" => "Bitte gehen sie zur&uuml;ck und f&uuml;llen sie das Feld '%s' aus!",
 "admin_priv" => "Hinweis: Sie haben Administratorrechte bekommen.",
 "manage_users" => "Nutzer verwalten",
 "users_online" => "Nutzer online",
 "online" => "Der harte Kern (Vor weniger als 60 Minuten online gewesen)",
 "not_online" => "Der Rest",
 "user_activity" => "Nutzeraktivit&auml;t",

  //tasks
 "add_new_task" => "Neue Aufgabe hinzuf&uuml;gen",
 "priority" => "Priorit&auml;t",
 "parent_task" => "&Uuml;bergeordnete Aufgabe",
 "creation_time" => "Erstellungszeitpunkt",
 "by" => " durch ", //Note to translators: context is 'Creation time: <date> by <user>'
 "project_name" => "Projektname",
 "task_name" => "Aufgabenname",
 "deadline" => "Fertigstellungszeitpunkt",
 "taken_from_parent" => "(Von &uuml;bergeordneter Aufgabe &uuml;bernommen)",
 "status" => "Status",
 "task_owner" => "Eigent&uuml;mer der Aufgabe",
 "project_owner" => "Eigent&uuml;mer des Projekts",
 "taskgroup" => "Aufgabengruppe",
 "usergroup" => "Benutzergruppe",
 "nobody" => "Niemand",
 "none" => "Keine",
 "no_group" => "Keine Gruppe",
 "all_groups" => "Alle Gruppen",
 //for version 1.49+ uncomment the line below, and comment out the next line
 "all_users" => "Alle Nutzer",
 //"all_users" => "K&ouml;nnen alle Nutzer diese Aufgabe einsehen?",
 "all_users_view" => "K&ouml;nnen alle Nutzer diese Aufgabe einsehen?",
 "group_edit" => "Kann jeder in der Benutzergruppe bearbeiten?",
 "project_description" => "Projektbeschreibung",
 "task_description" => "Aufgabenbeschreibung",
 "email_owner" => "Dem Eigent&uuml;mer eine E-Mail mit den &Auml;nderungen schicken?",
 "email_new_owner" => "Dem (neuen) Eigent&uuml;mer eine E-Mail mit den &Auml;nderungen schicken?",
 "email_group" => "Der Benutzergruppe eine E-Mail mit den &Auml;nderungen schicken?",
 "add_new_project" =>"Neues Projekt hinzuf&uuml;gen",
 "uncategorised" => "Nicht eingeordnet",
 "due_sprt" => "In %d Tagen",
 "tomorrow" => "Morgen",
 "due_today" => "Heute f&auml;llig",
 "overdue_1" => "1 Tag &uuml;berf&auml;llig",
 "overdue_sprt" => "%d Tage &uuml;berf&auml;llig",
 "edit_task" => "Aufgabe bearbeiten",
 "edit_project" => "Projekt bearbeiten",
 "no_reparent" => "Es gibt kein bergeordnetes Projekt",
 "del_javascript_sprt" => "Hiermit wird %s %s gel&ouml;scht. Sind sie sicher?",
 "add_task" => "Aufgabe hinzuf&uuml;gen",
 "add_subtask" => "Unteraufgabe hinzuf&uuml;gen",
 "add_project" => "Projekt hinzuf&uuml;gen",
 "no_edit" => "Dieser Eintrag geh&ouml;rt ihnen nicht und deshalb d&uuml;rfen sie ihn nicht bearbeiten. Fragen sie einen Administrator oder den Eigent&uuml;ner, die &Auml;nderungen vorzunehmen.",
 "uncategorised" => "Nicht eingeordnet",
 "admin" => "Admininstrator",
 "global" => "Global",
 "options" => " Eigenschaften",
 "task_navigation" => "Aufgaben-Navigation",
 "no_projects" => "Es gibt keine Projekte in dieser Ansicht",
 "completed" => "Fertiggestellt",
 "project_hold" => "Projekt aufgeschoben seit ",
 "project_planned" => "Geplantes Projekt",
 "percent" => "% der Aufgaben sind erledigt",
 "project_no_deadline" => "Kein Fertigstellungstermin gesetzt f&uuml;r dieses Projekt",
 "no_allowed_projects" => "Es gibt keine Projekte, die sie einsehen d&uuml;rfen",
 "projects" => "Projekte",
 "percent_project_sprt" => "Dieses Projekt ist zu %d%% fertiggestellt",
 "owned_by" => "Geh&ouml;rt zu",
 "created_on" => "Erstellt am",
 "completed_on" => "Fertiggestellt am",
 "modified_on" => "Ver&auml;ndert am",
 "project_on_hold" => "Projekt ist im Wartezustand",
 "task_accessible_sprt" => "(Dieses %s ist &ouml;ffentlich zug&auml;nglich f&uuml;r alle Benutzer)",
 "task_not_accessible_sprt" => "(Dieses %s ist nur f&uuml; Mitglieder der Benutzergruppe zug&auml;nglich)",
 "task_not_in_usergroup_sprt" => "Dieses %s ist keiner Benutzergruppe zugeordnet und f&uuml;r alle Benutzer zug&auml;nglich.",
 "usergroup_can_edit_sprt" => "Dieses %s kann auch durch Mitglieder der Benutzergruppe bearbeitet werden.",
 "i_take_it" => "Ich &uuml;bernehm' es :)",
 "i_finished" => "Ich habe fertig!",
 "i_dont_want" => "Ich habe die Schnauze voll",
 "take_over_sprt" => "&Uuml;bernehmen von %s",
 "task_info" => "Informationen &uuml;ber Aufgabe",
 "project_details" => "Projektdetails",
 "todo_list_for" => "Aufgaben f&uuml;r: ",
 "due_in_sprt" => " (F&auml;llig in %d Tagen)",
 "due_tomorrow" => " (Morgen f&auml;llig)",
 "no_assigned" => "Es gibt keine unerledigten Aufgaben f&uuml;r diesen Benutzer.",
 "todo_list" => "Aufgaben",
 "summary_list" => "zusammenfassung",
 "task_submit" => "Aufgabe senden",
 "not_owner" => "Zugriff verweigert. Entweder sind sie nicht der Eigent&uuml;mer oder sie haben keine ausreichenden Zugriffsrechte",
 "missing_values" => "Es wurden nicht gen&uuml;gend Felder ausgef&uuml;llt. Bitte gehen sie zur&uuml;ck und versuchen sie es noch einmal",
 "future" => "Zukunft",
 "flags" => "Optionen",
 "owner" => "Besitzer",
 "usergroupid" => "Benutzergruppen-ID",
 "taskgroupid" => "Aufgabengruppen-ID",
 "group" => "Gruppe",
 "by_usergroup" => " (durch Benutzergruppe)",
 "by_taskgroup" => " (durch Aufgabengruppe)",


//bits 'n' pieces
  "calendar" => "Kalender" );
?>