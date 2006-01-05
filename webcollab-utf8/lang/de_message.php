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

  NOTE: This file is written in UTF-8 character set

*/

//dates
$month_array = array ( NULL, "Jan", "Feb", "M&auml;r", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez" );
$week_array = array('So','Mo','Di','Mi','Do','Fr','Sa');

//task states
 //priorities
    $task_state["dontdo"]                = "Nichtstun";
    $task_state["low"]                   = "Niedrig";
    $task_state["normal"]                = "Normal";
    $task_state["high"]                  = "Hoch";
    $task_state["yesterday"]             = "Gestern!";
 //status
    $task_state["new"]                   = "Neu";
    $task_state["planned"]               = "In Planung (nicht aktiv)";
    $task_state["active"]                = "Aktiv (in Arbeit)";
    $task_state["cantcomplete"]          = "Warten";
    $task_state["completed"]             = "Abgeschlossen";
    $task_state["done"]                  = "Fertig";
    $task_state["task_planned"]          = " geplant";
    $task_state["task_active"]           = " aktiv";
 //project states
    $task_state["planned_project"]       = "Geplantes Projekt (nicht aktiv)";
    $task_state["no_deadline_project"]   = "Kein Fertigstellungsdatum gesetzt";
    $task_state["active_project"]        = "Aktives Projekt";

//common items
    $lang['description']                 = "Beschreibung";
    $lang['name']                        = "Name";
    $lang['add']                         = "Hinzuf&uuml;gen";
    $lang['update']                      = "Aktualisieren";
    $lang['submit_changes']              = "&Auml;nderungen best&auml;tigen";
    $lang['continue']                    = "Weiter";
    $lang['reset']                       = "Zur&uuml;cksetzen";
    $lang['manage']                      = "Verwalten";
    $lang['edit']                        = "Bearbeiten";
    $lang['delete']                      = "L&ouml;sche";
    $lang['del']                         = "L&ouml;schen";
    $lang['confirm_del_javascript']      = "L&ouml;schen best&auml;tigen!";
    $lang['yes']                         = "Ja";
    $lang['no']                          = "Nein";
    $lang['action']                      = "Aktion";
    $lang['task']                        = "Aufgabe";
    $lang['tasks']                       = "Aufgaben";
    $lang['project']                     = "Projekt";
    $lang['info']                        = "Info";
    $lang['bytes']                       = " Bytes";
    $lang['select_instruct']             = "(Verwende Strg f&uuml;r Mehrfachauswahl oder um nichts auszuw&auml;hlen)";
    $lang['member_groups']               = "Der Benutzer ist Mitglied in den markierten Gruppen (wenn es welche gibt).";
    $lang['login']                       = "Login";
    $lang['error']                       = "Fehler";
    $lang['no_login']                    = "Zugriff verweigert, Benutzername oder Passwort falsch";
    $lang['redirect_sprt']               = "Sie gelangen automatisch zur Loginseite nach %d Sekunden";
    $lang['login_now']                   = "Bitte klicken sie hier, um jetzt zur Loginseite zur&uuml;ckzukehren";
    $lang['please_login']                = "Bitte melden Sie sich an";
    $lang['go']                          = "Los!";
    
 //graphic items
    $lang['late_g']                      = "&nbsp;VERSP&Auml;TET&nbsp;";
    $lang['new_g']                       = "&nbsp;NEU&nbsp;";
    $lang['updated_g']                   = "&nbsp;AKTUALISIERT&nbsp;";

//admin config
    $lang['admin_config']                = "Administrator-Konfiguration";
    $lang['email_settings']              = "Email-Header Einstellungen";
    $lang['admin_email']                 = "Administrator-Email";
    $lang['email_reply']                 = "Email 'Antwort an'";
    $lang['email_from']                  = "Email 'Von'";
    $lang['mailing_list']                = "Mailingliste";
    $lang['default_checkbox']            = "Voreinstellung der Checkboxen f&uuml;r Projekte und Aufgaben";
    $lang['allow_globalaccess']          = "Erlaube globalen Zugriff?";
    $lang['allow_group_edit']            = "Ist es allen Benutzern der Gruppe erlaubt, die Daten zu bearbeiten?";
    $lang['set_email_owner']             = "Den Besitzer immer per Email &uuml;ber Ver&auml;nderungen benachrichtigen?";
    $lang['set_email_group']             = "Soll die Benutzergruppe immer bei Ver&auml;nderungen benachrichtigt werden?";
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
    $lang['bus_phone']                   = "Telefon (gesch&auml;ftlich):";
    $lang['address']                     = "Adresse:";
    $lang['postal']                      = "Postleitzahl:";
    $lang['city']                        = "Ort:";
    $lang['email']                       = "Email:";
    $lang['notes']                       = "Notizen:";
    $lang['add_contact']                 = "Kontakt hinzuf&uuml;gen";
    $lang['del_contact']                 = "Kontakt l&ouml;schen";
    $lang['contact_info']                = "Kontaktinformationen";
    $lang['contacts']                    = "Kontakte";
    $lang['contact_add_info']            = "Wenn eine Firma angegeben wurde, erscheint der Firmenname anstelle des Benutzernamens.";
    $lang['show_contact']                = "Zeige Kontakte";
    $lang['edit_contact']                = "Bearbeite Kontakte";
    $lang['contact_submit']              = "Kontakt absenden";
    $lang['contact_warn']                = "Es wurden nicht gen&uuml;gend Daten eingegeben, um den Kontakt hinzuzuf&uuml;gen. Bitte gehen Sie zur&uuml;ck und geben Sie mindestens den Vor- und Nachnamen an.";

 //files
    $lang['manage_files']                = "Dateiverwaltung";
    $lang['no_files']                    = "Es gibt keine hochgeladenen Dateien.";
    $lang['no_file_uploads']             = "Die Einstellungen des Servers dieser Website erlauben keine Datei-Uploads";
    $lang['file']                        = "Datei:";
    $lang['uploader']                    = "Ersteller/in:";
    $lang['files_assoc_project']         = "Mit Projekt verkn&uuml;pfte Dateien";
    $lang['files_assoc_task']            = "Mit Aufgabe verkn&uuml;pfte Dateien";
    $lang['file_admin']                  = "Dateiverwalter";
    $lang['add_file']                    = "Datei hinzuf&uuml;gen";
    $lang['files']                       = "Dateien";
    $lang['file_choose']                 = "Datei zum Hochladen:";
    $lang['upload']                      = "Hochladen";
    $lang['file_email_owner']            = "Sende Benachrichtigungsemail &uuml;ber neue Datei an den Eigent&uuml;mer?";
    $lang['file_email_usergroup']        = "Sende Benachrichtigungsemail &uuml;ber neue Datei an Nutzergruppe?";
    $lang['max_file_sprt']               = "Die hochzuladende Datei muss kleiner als %s kB sein.";
    $lang['file_submit']                 = "Datei absenden";
    $lang['no_upload']                   = "Es wurde keine Datei hochgeladen.  Bitte gehen Sie zur&uuml;ck und versuchen Sie es noch einmal.";
    $lang['file_too_big_sprt']           = "Die maximale Dateigr&ouml;&szlig;e ist %s Bytes. Ihr Upload war zu gro&szlig; und wurde gel&ouml;scht.";
    $lang['del_file_javascript_sprt']    = "Bitte best&auml;tigen Sie das L&ouml;schen der Datei %s.";


 //forum
    $lang['orig_message']                = "Originalnachricht:";
    $lang['post']                        = "Versenden";
    $lang['message']                     = "Nachricht:";
    $lang['post_reply_sprt']             = "Sende eine Antwort auf die Nachricht von '%s' &uuml;ber '%s'";
    $lang['post_message_sprt']           = "Sende eine Nachricht an: '%s'";
    $lang['forum_email_owner']           = "Sende Forenbeitrag an Eigent&uuml;mer?";
    $lang['forum_email_usergroup']       = "Sende Forenbeitrag an Nutzergruppe?";
    $lang['reply']                       = "Antwort";
    $lang['new_post']                    = "Neue Nachricht";
    $lang['public_user_forum']           = "Offenes Benutzerforum";
    $lang['private_forum_sprt']          = "Privates Forum f&uuml;r Gruppe '%s' ";
    $lang['forum_submit']                = "Beitrag absenden";
    $lang['no_message']                  = "Keine Nachricht angegeben! Bitte gehen Sie zur&uuml;ck und versuchen Sie es noch einmal";
    $lang['add_reply']                   = "Antwort hinzuf&uuml;gen";
    $lang['last_post_sprt']              = "Letzter Beitrag %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']                = "Neueste Beitr&auml;ge";
//**
    $lang['forum_search']                = "Forum search";
//**
    $lang['no_results']                  = "No results found for '%s'";
//**
    $lang['search_results']              = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                      = "Report";
    $lang['warning']                     = "<h1>Entschuldigung!</h1><P>Der Vorgang kann im Moment nicht abgearbeitet werden. Bitte versuchen Sie es sp&auml;ter noch einmal.</p>";
    $lang['home_page']                   = "Startseite";
    $lang['summary_page']                = "&Uuml;bersicht";
    $lang['todo_list']                   = "Aufgaben";
    $lang['calendar']                    = "Kalender";
    $lang['log_out']                     = "Abmelden";
    $lang['main_menu']                   = "Hauptmen&uuml;";
    $lang['archive']                     = "Archiv";
    $lang['user_homepage_sprt']          = "Startseite von %s";
    $lang['missing_field_javascript']    = "Bitte geben sie einen Wert in das leere Feld ein";
    $lang['invalid_date_javascript']     = "Bitte &auml;hlen sie ein g&uuml;ltiges Kalenderdatum";
    $lang['finish_date_javascript']      = "Das angegebene Datum liegt nach dem Fertigstellungstermin des Projekts!";
    $lang['security_manager']            = "Sicherheitsverwaltung";
    $lang['session_timeout_sprt']        = "Zugriff verweigert, Ihre letzte Aktion war vor %d Minuten. %d Minuten bleibt eine Session ohne Aktion g&uuml;ltig, bitte neu <a href=\"%sindex.php\">anmelden</a>.";
    $lang['access_denied']               = "Zugriff verweigert";
    $lang['private_usergroup']           = "Dieser Bereich ge&ouml;rt zu einer privaten Benutzergruppe und sie haben keine Zugriffsrechte.";
    $lang['invalid_date']                = "Ung&uuml;ltiges Datum";
    $lang['invalid_date_sprt']           = "Das Datum %s ist kein g&uuml;ltiges Kalenderdatum (Pr&uuml;fen sie die Anzahl der Monatstage!). Bitte gehen sie zur&uuml;ck und geben sie eine neues Datum ein!";


 //taskgroups
    $lang['taskgroup_name']              = "Name der Aufgabengruppe:";
    $lang['taskgroup_description']       = "Kurzbeschreibung der Aufgabengruppe:";
    $lang['add_taskgroup']               = "Aufgabengruppe hinzuf&uuml;gen";
    $lang['add_new_taskgroup']           = "Neue Aufgabengruppe hinzuf&uuml;gen";
    $lang['edit_taskgroup']              = "Aufgabengruppe bearbeiten";
    $lang['taskgroup_manage']            = "Aufgabengruppen verwalten";
    $lang['no_taskgroups']               = "Es sind keine Aufgabengruppen festgelegt.";
    $lang['manage_taskgroups']           = "Aufgabengruppen verwalten";
    $lang['taskgroups']                  = "Aufgabengruppen";
    $lang['taskgroup_dup_sprt']          = "Es gibt bereits eine Aufgabenruppe '%s'. Bitte w&auml;hlen sie einen neuen Namen.";
    $lang['info_taskgroup_manage']       = "Informationen &uuml;ber Augabengruppenverwaltung";

 //usergroups
    $lang['usergroup_name']              = "Name der Nutzergruppe:";
    $lang['usergroup_description']       = "Kurzbeschreibung der Nutzergruppe:";
    $lang['members']                     = "Mitglieder:";
    $lang['private_usergroup']           = "Private Nutzergruppe";
    $lang['add_usergroup']               = "Nutzergruppe hinzuf&uuml;gen";
    $lang['add_new_usergroup']           = "Neue Nutzergruppe hinzuf&uuml;gen";
    $lang['edit_usergroup']              = "Nutzergruppe bearbeiten";
    $lang['usergroup_manage']            = "Nutzergruppen verwalten";
    $lang['no_usergroups']               = "Es wurden keine Nutzergruppen festgelegt.";
    $lang['manage_usergroups']           = "Nutzergruppen verwalten";
    $lang['usergroups']                  = "Nutzergruppen";
    $lang['usergroup_dup_sprt']          = "Es gibt bereits eine Nutzergruppe '%s'. Bitte w&auml;hlen sie einen neuen Namen.";
    $lang['info_usergroup_manage']       = "Informationen &uuml;ber Nutzergruppenverwaltung";

 //users
    $lang['login_name']                  = "Loginname";
    $lang['full_name']                   = "Vollst&auml;ndiger Name";
    $lang['password']                    = "Passwort";
    $lang['blank_for_current_password']  = "(Freilassen, um bestehendes Passwort zu &uuml;bernehmen)";
    $lang['email']                       = "E-Mail";
    $lang['admin']                       = "Administrator";
    $lang['private_user']                = "Privater Nutzer";
    $lang['normal_user']                 = "Normaler Nutzer";
    $lang['is_admin']                    = "Administrator";
    $lang['is_guest']                    = "Gast";
    $lang['guest']                       = "Gast";
    $lang['user_info']                   = "Informationen &uuml;ber den Nutzer";
    $lang['deleted_users']               = "Gel&ouml;schte Nutzer";
    $lang['no_deleted_users']            = "Es gibt keine gel&ouml;schten Nutzer.";
    $lang['revive']                      = "Wiederbeleben";
    $lang['permdel']                     = "Dauerhaft l&ouml;schen";
    $lang['permdel_javascript_sprt']     = "Hiermit werden dauerhaft alle Aufzeichnungen und zugeordneten Aufgaben des Nutzers %s l&ouml;schen. Sind sie sicher?";
    $lang['add_user']                    = "Nutzer hinzuf&uuml;gen";
    $lang['edit_user']                   = "Nutzer bearbeiten";
    $lang['no_users']                    = "Dem System sind keine Nutzer bekannt";
    $lang['users']                       = "Nutzer";
    $lang['existing_users']              = "Vorhandene Nutzer";
    $lang['private_profile']             = "Dieser Nutzer hat ein privates Profil, das von ihnen nicht eingesehen werden darf.";
    $lang['private_usergroup_profile']   = "(Dieser Nutzer ist Mitglied einer privaten Nutzergruppe, welche nicht von ihnen eingesehen werden darf)";
    $lang['email_users']                 = "Email an Nutzer";
    $lang['select_usergroup']            = "Folgende Nutzergruppe:";
    $lang['subject']                     = "Betreff:";
    $lang['message_sent_maillist']       = "In jedem Falle wird eine Nachricht an die Mailingliste gesendet.";
    $lang['who_online']                  = "Wer ist online?";
    $lang['edit_details']                = "Nutzerdetails bearbeiten";
    $lang['show_details']                = "Nutzerdetails anzeigen";
    $lang['user_deleted']                = "Dieser Nutzer wurde gel&ouml;scht!";
    $lang['no_usergroup']                = "Dieser Nutzer ist kein Mitglied einer Nutzergruppe";
    $lang['not_usergroup']               = "(Kein Mitglied einer Nutzergruppe)";
    $lang['no_password_change']          = "(Ihr bestehendes Passwort hat sich nicht ver&auml;ndert)";
    $lang['last_time_here']              = "Zum letzten Mal hier gesehen:";
    $lang['number_items_created']        = "Anzahl der erzeugten Eintr&auml;ge in Datenbank:";
    $lang['number_projects_owned']       = "Anzahl der eigenen Projekte:";
    $lang['number_tasks_owned']          = "Anzahl der eigenen Aufgaben:";
    $lang['number_tasks_completed']      = "Anzahl der abgeschlossenen Aufgaben:";
    $lang['number_forum']                = "Anzahl der Sendungen an das Forum:";
    $lang['number_files']                = "Anzahl der hochgeladenen Dateien:";
    $lang['size_all_files']              = "Speicherplatz f&uuml;r alle hochgeladenen Dateien:";
    $lang['owned_tasks']                 = "Eigene Aufgaben";
    $lang['invalid_email']               = "Ung&uuml;ltige E-Mail-Adresse";
    $lang['invalid_email_given_sprt']    = "Die E-Mail-Adresse '%s' ist ung&uuml;ltig. Bitte gehen sie zur&uuml;ck und versuchen es noch einmal!";
    $lang['duplicate_user']              = "Nutzername doppelt vorhanden";
    $lang['duplicate_change_user_sprt']  = "Der Nutzer '%s' existiert bereits. Bitte &auml;ndern sie seinen Namen.";
    $lang['value_missing']               = "Wert fehlt";
    $lang['field_sprt']                  = "Bitte gehen sie zur&uuml;ck und f&uuml;llen sie das Feld '%s' aus!";
    $lang['admin_priv']                  = "Hinweis: Sie haben Administratorrechte bekommen.";
    $lang['manage_users']                = "Nutzer verwalten";
    $lang['users_online']                = "Nutzer online";
    $lang['online']                      = "Der harte Kern (Vor weniger als 60 Minuten online gewesen)";
    $lang['not_online']                  = "Der Rest";
    $lang['user_activity']               = "Nutzeraktivit&auml;t";

 //tasks
    $lang['add_new_task']                = "Neue Aufgabe hinzuf&uuml;gen";
    $lang['priority']                    = "Priorit&auml;t";
    $lang['parent_task']                 = "&Uuml;bergeordnete Aufgabe";
    $lang['creation_time']               = "Erstellungszeitpunkt";
    $lang['by_sprt']                     = "%1\$s durch %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                = "Projektname";
    $lang['task_name']                   = "Aufgabenname";
    $lang['deadline']                    = "Fertigstellungszeitpunkt";
    $lang['taken_from_parent']           = "(Von &uuml;bergeordneter Aufgabe &uuml;bernommen)";
    $lang['status']                      = "Status";
    $lang['task_owner']                  = "Eigent&uuml;mer der Aufgabe";
    $lang['project_owner']               = "Eigent&uuml;mer des Projekts";
    $lang['taskgroup']                   = "Aufgabengruppe";
    $lang['usergroup']                   = "Nutzergruppe";
    $lang['nobody']                      = "Niemand";
    $lang['none']                        = "Keine";
    $lang['no_group']                    = "Keine Gruppe";
    $lang['all_groups']                  = "Alle Gruppen";
    $lang['all_users']                   = "Alle Nutzer";
    $lang['all_users_view']              = "K&ouml;nnen alle Nutzer diese Aufgabe einsehen?";
    $lang['group_edit']                  = "Kann jeder in der Nutzergruppe bearbeiten?";
    $lang['project_description']         = "Projektbeschreibung";
    $lang['task_description']            = "Aufgabenbeschreibung";
    $lang['email_owner']                 = "Dem Eigent&uuml;mer eine E-Mail mit den &Auml;nderungen schicken?";
    $lang['email_new_owner']             = "Dem (neuen) Eigent&uuml;mer eine E-Mail mit den &Auml;nderungen schicken?";
    $lang['email_group']                 = "Der Benutzergruppe eine E-Mail mit den &Auml;nderungen schicken?";
    $lang['add_new_project']             = "Neues Projekt hinzuf&uuml;gen";
    $lang['uncategorised']               = "Nicht eingeordnet";
    $lang['due_sprt']                    = "In %d Tagen";
    $lang['tomorrow']                    = "Morgen";
    $lang['due_today']                   = "Heute f&auml;llig";
    $lang['overdue_1']                   = "1 Tag &uuml;berf&auml;llig";
    $lang['overdue_sprt']                = "%d Tage &uuml;berf&auml;llig";
    $lang['edit_task']                   = "Aufgabe bearbeiten";
    $lang['edit_project']                = "Projekt bearbeiten";
    $lang['no_reparent']                 = "Es gibt kein &uuml;bergeordnetes Projekt";
    $lang['del_javascript_project_sprt'] = "Hiermit wird Projekt %s gel&ouml;scht. Sind sie sicher?";
    $lang['del_javascript_task_sprt']    = "Hiermit wird Aufgabe %s gel&ouml;scht. Sind sie sicher?";
    $lang['add_task']                    = "Aufgabe hinzuf&uuml;gen";
    $lang['add_subtask']                 = "Unteraufgabe hinzuf&uuml;gen";
    $lang['add_project']                 = "Projekt hinzuf&uuml;gen";
    $lang['clone_project']               = "Projekt klonen";
    $lang['clone_task']                  = "Aufgabe klonen";
    $lang['quick_jump']                  = "Schnellauswahl"; 
    $lang['no_edit']                     = "Dieser Eintrag geh&ouml;rt ihnen nicht und deshalb d&uuml;rfen sie ihn nicht bearbeiten. Fragen sie einen Administrator oder den Eigent&uuml;mer, die &Auml;nderungen vorzunehmen.";
    $lang['uncategorised']               = "Nicht eingeordnet";
    $lang['admin']                       = "Admininstrator";
    $lang['global']                      = "Global";
    $lang['delete_project']              = "Projekt l&ouml;schen";
    $lang['delete_task']                 = "Aufgabe l&ouml;schen";
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
    $lang['project_no_deadline']         = "Kein Fertigstellungstermin f&uuml;r dieses Projekt gesetzt";
    $lang['no_allowed_projects']         = "Es gibt keine Projekte, die sie einsehen d&uuml;rfen";
    $lang['projects']                    = "Projekte";
    $lang['percent_project_sprt']        = "Dieses Projekt ist zu %d%% fertiggestellt";
    $lang['owned_by']                    = "Geh&ouml;rt zu";
    $lang['created_on']                  = "Erstellt am";
    $lang['completed_on']                = "Fertiggestellt am";
    $lang['modified_on']                 = "Ver&auml;ndert am";
    $lang['project_on_hold']             = "Projekt ist im Wartezustand";
    $lang['project_accessible']          = "(Dieses Projekt ist &ouml;ffentlich zug&auml;nglich f&uuml;r alle Benutzer)";
    $lang['task_accessible']             = "(Diese Aufgabe ist &ouml;ffentlich zug&auml;nglich f&uuml;r alle Benutzer)";
    $lang['project_not_accessible']      = "(Dieses Projekt ist nur f&uuml;r Mitglieder der Benutzergruppe zug&auml;nglich)";
    $lang['task_not_accessible']         = "(Diese Aufgabe ist nur f&uuml;r Mitglieder der Benutzergruppe zug&auml;nglich)";
    $lang['project_not_in_usergroup']    = "Projekt keiner Benutzergruppe zugeordnet und f&uuml;r alle Benutzer zug&auml;nglich.";
    $lang['task_not_in_usergroup']       = "Aufgabe keiner Benutzergruppe zugeordnet und f&uuml;r alle Benutzer zug&auml;nglich.";
    $lang['usergroup_can_edit_project']  = "Dieses Projekt kann auch durch Mitglieder der Benutzergruppe bearbeitet werden.";
    $lang['usergroup_can_edit_task']     = "Diese Aufgabe kann auch durch Mitglieder der Benutzergruppe bearbeitet werden.";
    $lang['i_take_it']                   = "Ich &uuml;bernehm' es :)";
    $lang['i_finished']                  = "Ich habe fertig!";
    $lang['i_dont_want']                 = "Ich habe die Schnauze voll";
    $lang['take_over_project']           = "Projekt &uuml;bernehmen";
    $lang['take_over_task']              = "Aufgabe &uuml;bernehmen";
    $lang['task_info']                   = "Informationen &uuml;ber Aufgabe";
    $lang['project_details']             = "Projektdetails";
    $lang['todo_list_for']               = "Aufgaben f&uuml;r: ";
    $lang['due_in_sprt']                 = " (F&auml;llig in %d Tagen)";
    $lang['due_tomorrow']                = " (Morgen f&auml;llig)";
    $lang['no_assigned']                 = "Es gibt keine unerledigten Aufgaben f&uuml;r diesen Benutzer.";
    $lang['todo_list']                   = "Aufgaben";
    $lang['summary_list']                = "Zusammenfassung";
    $lang['task_submit']                 = "Aufgabe senden";
    $lang['not_owner']                   = "Zugriff verweigert. Entweder sind sie nicht der Eigent&uuml;mer oder sie haben keine ausreichenden Zugriffsrechte";
    $lang['missing_values']              = "Es wurden nicht gen&uuml;gend Felder ausgef&uuml;llt. Bitte gehen sie zur&uuml;ck und versuchen sie es noch einmal";
    $lang['future']                      = "Zukunft";
    $lang['flags']                       = "Optionen";
    $lang['owner']                       = "Besitzer";
    $lang['group']                       = "Gruppe";
    $lang['by_usergroup']                = " (durch Benutzergruppe)";
    $lang['by_taskgroup']                = " (durch Aufgabengruppe)";
    $lang['by_deadline']                 = " (nach Fertigstellungsdatum)";
    $lang['by_status']                   = " (nach Status)";
    $lang['by_owner']                    = " (nach Eigent&uuml;mer)";
    $lang['project_cloned']              = "Zu klonendes Projekt: ";
    $lang['task_cloned']                 = "Zu klonende Aufgabe: ";
    $lang['note_clone']                  = "Bemerkung: Die Aufgabe wird als neues Projekt erscheinen";

 //bits 'n' pieces
    $lang['calendar']                    = "Kalender";
    $lang['normal_version']              = "Normalversion";
    $lang['print_version']               = "Druckversion";
    $lang['condensed_view']              = "Kurzansicht";
    $lang['full_view']                   = "Vollst&auml;ndige Ansicht";
//**
    $lang['icalendar']                     = "iCalendar";

?>
