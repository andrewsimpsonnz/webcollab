<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  Language files for 'da' (Danish)

  Maintainer: 

  
  Translation by Jens Thomsen
    
  NOTE: This file is written in UTF-8 character set
    

*/

/*
General formatting:

"xxxx"     == string in title case (eg: "Project")

"xxxx_sprt" == formatted print string (eg: "Files associated with this %s" - where %s is inserted by the code)

              Formatted strings with %1/$s, %2/$s, %3/$s etc. can have parameters interchanged - as in:

                 "Message from %1\$s about %2\$s" _could also be_ "Message about %2\$s from %1\$s"

              This can be useful for translating to different languages.

 "xxxx_g" == graphical string

 "xxxx_javascript == javascript string with single quotes escaped as in "Confirmer l\'effacement!"

*/

//required language encodings
$web_charset = "iso-8859-1";
$email_charset = "iso-8859-1";

//dates
$month_array = array ( NULL, "Jan", "Feb", "Mar", "Apr", "Maj", "Juni", "Juli", "Aug", "Sep", "Okt", "Nov", "Dec" );
$week_array = array('Søn','Man','Tirs','Ons','Tor','Fre','Lør');

//task states
$task_state = array(
 //priorities
 "dontdo" => "Udfør ikke",
 "low" => "Lav",
 "normal" => "Normal",
 "high" => "Høj",
 "yesterday" => "Igår!",
 //status
 "new" => "Ny",
 "planned" => "Planlagt (ikke aktiv)",
 "active" => "Aktiv (under udførelse)",
 "cantcomplete" => "Afventende",
 "completed" => "Fuldført",
 "done" => "Udført",
 "task_planned" => " Planlagt",
 "task_active" => " Aktiv",
 //project states
 "planned_project" => "Planlagte projekter (ikke aktive)",
 "no_deadline_project" => "Ingen frist fastlagt",
 "active_project" => "Aktivt projekt" );

//common items
$lang = array(
 "description" => "Beskrivelse",
 "name" => "Navn",
 "add" => "Tilføj",
 "update" => "Ajourfør",
 "submit_changes" => "Send ændring",
 "continue" => "Fortsæt",
 "reset" => "Reset",
 "manage" => "Manage",
 "edit" => "Rediger",
 "delete" => "Slet",
 "del" => "Del",
 "confirm_del_javascript" => "Bekræft slet!",
 "yes" => "Ja",
 "no" => "Nej",
 "action" => "Aktion",
 "task" => "Opgave",
 "tasks" => "Opgaver",
 "project" => "Projekt",
 "info" => "Info",
 "bytes" => " bytes",
 "select_instruct" => "(Brug ctrl til at vælge flere, eller til ingen at vælge)",
 "member_groups" => "Brugeren er medlem af de fremhævede grupper herunder (hvis nogen)",
 "login" => "Login",
 "error" => "Fejl",
 "no_login" => "Adgang nægtet, ikke korrekt login eller password",
 "please_login" => "Vær venlig at logge in",

//graphic items
 "late_g" => "&nbsp;FORSINKET&nbsp;",
 "new_g" => "&nbsp;NY&nbsp;",
 "updated_g" => "&nbsp;AJOURFØRT&nbsp;",

//admin config
 "admin_config" => "Admin config",
 "email_settings" => "Email indstillinger i header",
 "admin_email" => "Admin email",
 "email_reply" => "Email 'besvar til'",
 "email_from" => "Email 'fra'",
 "mailing_list" => "Mailing liste",
 "default_checkbox" => "Default checkboks indstillinnger for Projekt/Opgaver",
 "allow_globalaccess" => "Tillad fuld adgang?",
 "allow_group_edit" => "Tillad alle i brugergruppe at redigere?",
 "set_email_owner" => "Email altid ejer ved ændringer?",
 "set_email_group" => "Email altid brugergruppe ved ændringer?",
 "configuration" => "Configuration",


//contacts
 "firstname" => "Fornavn:",
 "lastname" => "Efternavn:",
 "company" => "Firma:",
 "home_phone" => "Privattelefon:",
 "mobile" => "Mobil:",
 "fax" => "Fax:",
 "bus_phone" => "Forretningstelefon:",
 "address" => "Adresse:",
 "postal" => "Postnummer:",
 "city" => "By:",
 "email" => "Email:",
 "notes" => "Noter:",
 "add_contact" => "Tilføj kontakt",
 "del_contact" => "Slet kontakt",
 "contact_info" => "Kontakt information",
 "contacts" => "Kontakter",
 "contact_add_info" => "Hvis du tilføjer et firmanavn, så vil det blive vist i stedet for brugerens navn.",
 "show_contact" => "Vis kontakter",
 "edit_contact" => "Rediger kontakter",
 "contact_submit" => "Send kontakt",
 "contact_warn" => "Der er ikke værdier nok til at tilføje en kontakt, gå tilbage og tilføj mindst fornavn og efternavn",

 //files
 "manage_files" => "Arbejd med filer",
 "no_files" => "Der er ikke nogen indlæste filer at arbejde med",
 "no_file_uploads" => "Serverconfiguration på denne hjemmeside tillader ikke indlæsning af filer",
 "file" => "File:",
 "uploader" => "Indlæser:",
 "files_assoc_project" => "Filet tilknyttet dette projekt",
 "files_assoc_task" => "Filer tilknyttet denne opgave",
 "file_admin" => "File admin",
 "add_file" => "Tilføj file",
 "files" => "Filer",
 "file_choose" => "File til indlæsning:",
 "upload" => "Indlæs",
 "file_email_owner" => "Emailbesked om ny fil til ejer?",
 "file_email_usergroup" => "Emailbesked om ny fil til brugergruppen?",
 "max_file_sprt" => "File som indlæses skal være mindre end %s kb.",
 "file_submit" => "File send",
 "no_upload" => "Der blev ikke indlæst nogen fil.  Gå venligst tilbage og prøv igen.",
 "file_too_big_sprt" => "Max. indlæsnings størrelse %s bytes.  Din indlæsning var for stor og er blevet slettet.",
 "del_file_javascript_sprt" => "Er du sikker på at ville slette dette %s ?",


 //forum
 "orig_message" => "Oprindelig meddelelse:",
 "post" => "Send den!",
 "message" => "Meddelelse:",
 "post_reply_sprt" => "Send et svar på en meddelelse fra '%1\$s' om '%2\$s'",
 "forum_email_owner" => "Email forum meddelelse til ejer?",
 "forum_email_usergroup" => "Email forum meddelelse til brugergruppen?",
 "post_message_sprt" => "Send meddelelse til: '%s'",
 "reply" => "Svar",
 "new_post" => "Ny post",
 "public_user_forum" => "Offentligt brugerforum",
 "private_forum_sprt" => "Privat forum for '%s' brugergruppe",
 "forum_submit" => "Forum send",
 "no_message" => "Ingen meddelelse! Gå venligst tilbage og prøv igen",
 "add_reply" => "Tilføj svar",

 //includes
 "report" => "Rapport",
 "warning" => "<h1>Beklager!</h1><p>Vi er ikke i stand til at bearbejde din anmodning lige nu. Vær venlig og prøv igen senere.</p>",
 "home_page" => "Hjemmeside",
 "summary_page" => "Resume-side",
 "todo_list" => "ToDo liste",
 "calendar" => "Kalender",
 "log_out" => "Log out",
 "main_menu" => "Hovedmenu",
 "user_homepage_sprt" => "%s's hjemmeside",
 //"load_time_sprt" => "Denne side tog %1\$.3f sekunder at indlæse.  Af denne tid %2\$.3f sekunder blev brugt til %3\$d transaktioner med database",
 "missing_field_javascript" => "Vær så venlig at tilføje en værdi til det manglende felt",
 "invalid_date_javascript" => "Vær så venlig at vælge en gyldig kalenderdato",
 "finish_date_javascript" => "Den indtastede dato er efter projektets slutdato!",
 "security_manager" => "Sikkerhedsmanager",
 //"no_key_sprt" => "Ingen gyldig session key. Vær så venlig <a href=\"%sindex.php\">login</a>",
 //"no_session" => "Ingen sådan session, Vær så venlig <a href=\"%sindex.php\">log-in</a>",
 "session_timeout_sprt" => "Adgang nægtet, sidste handling var %1\$d minutter siden og timeout er %2\$d minuttter, vær så venlig <a href=\"%3\$sindex.php\">re-login</a>",
 "access_denied" => "Adgang nægtet",
 "private_usergroup" => "Beklager, Dette område er en privat brugergruppe, og du har ikke adgangsrettigheder.",
 "invalid_date" => "Ugyldig dato",
 "invalid_date_sprt" => "Datoen %s er ikke en gyldig kalenderdato (Check antallet af dage i måneden).<br />Vær så venlig at gå tilbage og indtast en ny dato.",


 //taskgroups
 "taskgroup_name" => "Opgavegruppenavn:",
 "taskgroup_description" => "Opgavegruppe enkel beskrivelse:",
 "add_taskgroup" => "Tilføj opgavegruppe",
 "add_new_taskgroup" => "Tilføj en ny opgave gruppe",
 "edit_taskgroup" => "Rediger opgavegruppe",
 "taskgroup_manage" => "Opgavegruppe management",
 "no_taskgroups" => "Ingen opgavegruppe defineret",
 "manage_taskgroups" => "Administer opgavegruppe",
 "taskgroups" => "Opgavegruppe",
 "taskgroup_dup_sprt" => "Der er allerede en opgavegruppe '%s'.  Vær så venlig og gå tilbage og vælg et nyt navn.",
 "info_taskgroup_manage" => "Info om opgaveadministration",

 //usergroups
 "usergroup_name" => "Brugergruppe navn:",
 "usergroup_description" => "Brugergruppe enkel beskrivelse:",
 "members" => "Medlemmer:",
 "private_usergroup" => "Privat brugergruppe",
 "add_usergroup" => "Tilføj brugergruppe",
 "add_new_usergroup" => "Tilfør en ny brugergruppe",
 "edit_usergroup" => "Rediger brugergruppe",
 "usergroup_manage" => "Brugergruppe management",
 "no_usergroups" => "Ingen brugergruppe er defineret",
 "manage_usergroups" => "Administrer brugergrupper",
 "usergroups" => "Brugergrupper",
 "usergroup_dup_sprt" => "Der er allerede en brugergruppe '%s'.  Vær så venlig at gå tilbage og vælg et nyt navn.",
 "info_usergroup_manage" => "Info om brugergruppeadministration",

 //users
 "login_name" => "Login navn",
 "full_name" => "Fuldt navn",
 "password" => "Password",
 "blank_for_current_password" => "(Lad stå åbent for nuværende password)",
 "email" => "E-mail",
 "admin" => "Admin",
 "private_user" => "Privat bruger",
 "is_admin" => "Er en admin?",
 "user_info" => "Brugerinformation",
 "deleted_users" => "Slettede brugere",
 "no_deleted_users" => "Der er ingen slettede brugere.",
 "revive" => "Genopliv",
 "permdel" => "Permdel",
 "permdel_javascript_sprt" => "Dette vil slette alle brugerrecords og tilknyttede opgaver for %s. Vil du virkelig gøre dette?",
 "add_user" => "Tilføj bruger",
 "edit_user" => "Rediger en bruger",
 "no_users" => "Ingen bruger kendes af systemet",
 "users" => "Brugere",
 "existing_users" => "Nuværende brugere",
 "private_profile" => "Denne burger har en privat profil, som du ikke kan se.",
 "private_usergroup_profile" => "( Denne burger er medlem af en privaat brugergruppe, som du ikke kan se)",
 "email_users" => "Email brugere",
 "select_usergroup" => "Brugergruppe valgt fra nedenstående:",
 "subject" => "Emne:",
 "message_sent_maillist" => "I alle tilfælde bliver meddelelsen også kopieret til mailinglisten.",
 "who_online" => "Hvem er online?",
 "edit_details" => "Rediger brugerdetaljer",
 "show_details" => "Vis brugerdetaljer",
 "user_deleted" => "Denne bruger er blevet slettet!",
 "no_usergroup" => "Brugeren er ikke medlem af nogen brugergruppe",
 "not_usergroup"=> "(Ikke medlem af nogen brugergruppe)",
 "no_password_change" => "(Dit nuværende password er ikke ændret)",
 "last_time_here" => "Sidste besøg:",
 "number_items_created" => "Antal oprettede emner:",
 "number_projects_owned" => "Antal projekter ejet:",
 "number_tasks_owned" => "Antal opgaver ejet:",
 "number_tasks_completed" => "Antal opgaver afsluttet:",
 "number_forum" => "Antal forum posts:",
 "number_files" => "Antal indlæste filer filer:",
 "size_all_files" => "Total størrelse af alle ejede filer:",
 "owned_tasks" => "Ejede opgaver",
 "invalid_email" => "Ugyldig emailadresse",
 "invalid_email_given_sprt" => "Emailadressen '%s' er ugyldig.  Vær så venlig at gå tilbage og prøv igen.",
 "duplicate_user" => "Duplikat bruger",
 "duplicate_change_user_sprt" => "Brugeren '%s' eksisterer allerede.  Vær så venlig at gå tilbage og ændre et navn.",
 "value_missing" => "Manglende værdi",
 "field_sprt" => "Dette felt '%s' mangler. Vær så venlig at gå tilbage og udfyld det.",
 "admin_priv" => "NOTE: Du er blevet tildelt administrator privilegier.",
 "manage_users" => "Administrer brugere",
 "users_online" => "Brugere online",
 "online" => "Die hard surfers (Online for mindre end 60 mins siden)",
 "not_online" => "Resten",
 "user_activity" => "Brugeraktivitet",

  //tasks
 "add_new_task" => "Tilføj en ny opgave",
 "priority" => "Prioritet",
 "parent_task" => "Forælder",
 "creation_time" => "Tidspkt. oprettelse",
 "by_sprt" => "%1\$s af %2\$s", //Note to translators: context is 'Creation time: <date> by <user>'
 "project_name" => "Projektnavn",
 "task_name" => "Opgavenavn",
 "deadline" => "Frist",
 "taken_from_parent" => "(overtaget fra forælder)",
 "status" => "Status",
 "task_owner" => "Opgaveejer",
 "project_owner" => "Projektejer",
 "taskgroup" => "Opgavegruppe",
 "usergroup" => "Brugergruppe",
 "nobody" => "Ingen",
 "none" => "Ingen",
 "no_group" => "Ingen gruppe",
 "all_groups" => "Alle grupper",
 "all_users" => "Alle brugere",
 "all_users_view" => "Alle brugere kan se dette emne?",
 "group_edit" => "Enhver i brugergruppen kan redigere?",
 "project_description" => "Projektbeskrivelse",
 "task_description" => "Opgavebeskrivelse",
 "email_owner" => "Send en email til ejeren med ændringerne?",
 "email_new_owner" => "Send en email til den (ny) ejer med ændringerne?",
 "email_group" => "Send en email til brugergruppen med ændringerne?",
 "add_new_project" =>"Tilføj et nyt projekt",
 "uncategorised" => "ikke kategoriseret",
 "due_sprt" => "%d dage fra nu",
 "tomorrow" => "I morgen",
 "due_today" => "Frist i dag",
 "overdue_1" => "1 dag overskredet",
 "overdue_sprt" => "%d dage overskredet",
 "edit_task" => "Rediger opgave",
 "edit_project" => "Rediger projekt",
 "no_reparent" => "Ingen (et topniveau projekt)",
 "del_javascript_project_sprt" => "Dette vil slette projekt %s. Er du sikker?",
 "del_javascript_task_sprt" => "Dette vil slette opgave %s. Er du sikker?",
 "add_task" => "Tilføj opgave",
 "add_subtask" => "Tilføj underopgave",
 "add_project" => "Tilføj projekt",
 //**
 "clone_project" => "Clone project",
 //**
 "clone_task" => "Clone task",
 "no_edit" => "Du ejer ikke dette emne og derfor kan du ikke redigere det",
 "uncategorised" => "Ikke-kategoriseret",
 "admin" => "Admin",
 "global" => "Global",
 "delete_project" => "Slet projekt",
 "delete_task" => "Slet opgave",
 "project_options" => "Projekt muligheder",
 "task_options" => "Opgave muligheder",
 "task_navigation" => "Opgave navigation",
 "no_projects" => "Der er ingen projekter at vise",
 //**
 "show_all_projects" => "Show all projects",
 //**
 "show_active_projects" => "Show only active projects",
 "project_hold_sprt" => "Projekt afventer siden %s",
 "project_planned" => "Planlagt projekt",
 "percent_sprt" => "%d%% af opgaverne er udført",
 "project_no_deadline" => "Ingen frist angivet for dette projekt",
 "no_allowed_projects" => "Der er ingen projekter, som du har tilladelse til at se",
 "projects" => "Projekter",
 "percent_project_sprt" => "Dette projekt er %d%% fuldført",
 "owned_by" => "Ejes af",
 "created_on" => "Oprettet den",
 "completed_on" => "Udført den",
 "modified_on" => "Ændret den",
 "project_on_hold" => "Projekt afventer",
 "project_accessible" => "(Dette projekt er offentligt tilgængeligt for alle brugere)",
 "task_accessible" => "(Denne opgave er offentlig tilgængelig for alle brugere)",
 "project_not_accessible" => "(Dette projekt er ikke tilgængeligt for medlemmerne af brugergruppen)",
 "task_not_accessible" => "(Denne opgave er ikke tilgængelig for medlemmer af brugergruppen)",
 "project_not_in_usergroup" => "Dette projekt er ikke del af en brugergruppe og er tilgængeligt for alle brugere.",
 "task_not_in_usergroup" => "Denne opgave er ikke del af en brugergruppe og er tilgængeligt for alle brugere.",
 "usergroup_can_edit_project" => "Dette projekt kan også redigeres af brugergruppens medlemmer.",
 "usergroup_can_edit_task" => "Denne opgave kan også redigeres af brugergruppens medlemmer.",
 "i_take_it" => "Jeg tager den :)",
 "i_finished" => "Jeg afsluttede den!",
 "i_dont_want" => "Jeg ønsker den ikke mere",
 "take_over_project" => "Overtag projekt",
 "take_over_task" => "Overtag opgave",
 "task_info" => "Opgaveinformation",
 "project_details" => "Projektdetaljer",
 "todo_list_for" => "ToDo liste for: ",
 "due_in_sprt" => " (Frist om %d dage)",
 "due_tomorrow" => " (Udløber i morgen)",
 "no_assigned" => "Der er ingen uafsluttede opgaver tilknyttet denne bruger.",
 "todo_list" => "ToDo liste",
 "summary_list" => "Resumeliste",
 "task_submit" => "Opgave send",
 "not_owner" => "Adgang nægtet, enten fordi du ikke er ejer, eller du ikke har tilstrækkelige rettigheder",
 "missing_values" => "Der er ikke udfyldt nok feltværdier, vær så venlig at gå tilbage og prøv igen",
 "future" => "Fremtid",
 "flags" => "Flags",
 "owner" => "Ejer",
 "group" => "Gruppe",
 "by_usergroup" => " (ved brugergruppe)",
 "by_taskgroup" => " (ved opgavegruppe)",
 "by_deadline" => " (ved frist)",
 "by_status" => " (ved status)",
 "by_owner" => " (ved ejer)",
  //**
 "project_cloned" => "Project to be cloned :",
 //**
 "task_cloned" => "Task to be cloned :",
 //**
 "note_clone" => "Note: The task will be cloned as a new project",

//bits 'n' pieces
  "calendar" => "Kalender",
  //**
  "normal_version" => "Normal version",
  //**
  "print_version" => "Print version"
 );

?>