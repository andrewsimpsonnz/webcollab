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

  Language files for 'it' (Italian)

  Maintainer: Raffaele Franzese <r.franzese@collaltosabino.net>

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
$month_array = array ( NULL, "Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic" );
$week_array = array('Dom','Lun','Mar','Mer','Gio','Ven','Sab');

//task states
$task_state = array(
 //priorities
 "dontdo" => "Tralasciare",
 "low" => "Bassa",
 "normal" => "Normale",
 "high" => "Alta",
 "yesterday" => "Ieri!",
 //status
 "new" => "Nuovo",
 "planned" => "Previsto (non attivo)",
 "active" => "Attivo (Lavorazione in corso)",
 "cantcomplete" => "Congelato",
 "completed" => "Completato",
 "done" => "Finito",
 "task_planned" => " Pianificata",
 "task_active" => " Attiva",
 //project states
 "planned_project" => "Progetto previsto (non attivo)",
 "no_deadline_project" => "Senza scadenza",
 "active_project" => "Progetto attivo" );

//common items
$lang = array(
 "description" => "Descrizione",
 "name" => "Nome",
 "add" => "Aggiungi",
 "update" => "Aggiorna",
 "submit_changes" => "Invia modifiche",
 "continue" => "Continua",
 "reset" => "Reset",
 "manage" => "Gestisci",
 "edit" => "Edita",
 "delete" => "Cancella",
 "del" => "Cancella",
 "confirm_del_javascript" => "Conferma cancellazione!",
 "yes" => "S&igrave;",
 "no" => "No",
 "action" => "Azione",
 "task" => "Attivit&agrave;",
 "tasks" => "Attivit&agrave;",
 "project" => "Progetto",
 "info" => "Info",
 "bytes" => " bytes",
 "select_instruct" => "(Usa ctrl per selezioni multiple, o per deselezionare)",
 "member_groups" => "L'utente &egrave; membro dei gruppi selezionati sotto (se esistenti)",
 "login" => "Login",
 "error" => "Errore",
 "no_login" => "Accesso negato, login o password errati",
 "please_login" => "Identificazione utente",
//for collaltosabino.net
//"please_login" => "<span class=\"navy\"><b>collaltosabino.net</b><br><span class=\"darkred\"><b>*** Sistema di gestione progetti ***<br><br><span class=\"navy\">Identificazione utente</b></span>",

//graphic items
 "late_g" => "&nbsp;IN RITARDO&nbsp;",
 "new_g" => "&nbsp;NUOVO&nbsp;",
 "updated_g" => "&nbsp;AGGIORNATO&nbsp;",

//admin config
 "admin_config" => "Admin config",
 "email_settings" => "Email header settings",
 "admin_email" => "Admin email",
 "email_reply" => "Email 'reply to'",
 "email_from" => "Email 'from'",
 "mailing_list" => "Mailing list",
 "default_checkbox" => "Default checkbox settings for Project/Tasks",
 "allow_globalaccess" => "Allow global access?",
 "allow_group_edit" => "Allow all in usergroup to edit?",
 "set_email_owner" => "Always email owner with changes?",
 "set_email_group" => "Always email usergroup with changes?",
 "configuration" => "Configuration",


//contacts
 "firstname" => "Nome:",
 "lastname" => "Cognome:",
 "company" => "Azienda:",
 "home_phone" => "Telefono abit.:",
 "mobile" => "Cellulare:",
 "fax" => "Fax:",
 "bus_phone" => "Telefono lav.:",
 "address" => "Indirizzo:",
 "postal" => "Codice postale:",
 "city" => "Citt&agrave;:",
 "email" => "Email:",
 "notes" => "Note:",
 "add_contact" => "Aggiungi contatto",
 "del_contact" => "Cancella contatto",
 "contact_info" => "Informazioni contatto",
 "contacts" => "Contatti",
 "contact_add_info" => "Se aggiungi un nome di azienda, questo sar&agrave; visualizzato al posto del nome utente.",
 "show_contact" => "Vedi contatti",
 "edit_contact" => "Edita contatti",
 "contact_submit" => "Invia contatto",
 "contact_warn" => "Dati insufficienti per aggiungere un contatto, torna indietro e fornisci almeno Nome e Cognome",

 //files
 "manage_files" => "Gestisci files",
 "no_files" => "Non ci sono files da gestire",
 "no_file_uploads" => "La configurazione del server per questo sito non permette l'invio di files",
 "file" => "File:",
 "uploader" => "Mittente:",
 "files_assoc_project" => "Files associati a questo progetto",
 "files_assoc_task" => "Files associati a questa attivit&agrave;",
 "file_admin" => "File admin",
 "add_file" => "Aggiungi file",
 "files" => "Files",
 "file_choose" => "File da inviare:",
 "upload" => "Invio",
 //**
 "file_email_owner" => "Inviare una Email per notificare un nuovo file al proprietario?",
 //**
 "file_email_usergroup" => "Inviare una Email per notificare un nuovo file allo usergroup?",
 "max_file_sprt" => "Il file da inviare deve essere pi&ugrave; piccolo di %s kb.",
 "file_submit" => "Invia file",
 "no_upload" => "Nessun file &egrave; stato inviato.  Torna indietro e riprova.",
 "file_too_big_sprt" => "La dimensione massima &egrave; %s bytes.  Il tuo invio &egrave; troppo grande ed &egrave; stato cancellato.",
 "del_file_javascript_sprt" => "Sei sicuro che vuoi cancellare %s ?",


 //forum
 "orig_message" => "Messaggio originale:",
 "post" => "Invia!",
 "message" => "Messaggio:",
 "post_reply_sprt" => "Invia una risposta al messaggio di '%s' circa '%s'",
 "post_message_sprt" => "Invia un messagio a: '%s'",
 //**
 "forum_email_owner" => "Email forum message to the owner?",
 //**
 "forum_email_usergroup" => "Email forum message to the usergroup?",
 "reply" => "Rispondi",
 "new_post" => "Nuovo invio",
 "public_user_forum" => "Forum pubblico",
 "private_forum_sprt" => "Forum privato per il gruppo '%s'",
 "forum_submit" => "Invia Forum",
 "no_message" => "Nessun messaggio! Torna indietro e riprova",
 "add_reply" => "Aggiungi risposta",

 //includes
 "report" => "Report",
 "warning" => "<h1>Spiacente!</h1><p>Non &egrave; possibile processare la tua richiesta adesso. Riprova pi&ugrave; tardi.</p>",
 "home_page" => "Home page",
 "summary_page" => "Pagina di riepilogo",
 "todo_list" => "Lista ToDo",
 "calendar" => "Calendario",
 "log_out" => "Log out",
 "main_menu" => "Menu principale",
 "user_homepage_sprt" => "%s's homepage",
 //"load_time_sprt" => "Tempo di caricamento della pagina: %.3f secondi.  Di cui %.3f secondi sono stati usati per %d transazioni con il database",
//**
 "missing_field_javascript" => "Prego, inserisci un valore nel campo omesso",
 //**
 "invalid_date_javascript" => "Prego, scegli una data valida",
 //**
 "finish_date_javascript" => "La data inserita &egrave; successiva alla data di fine progetto!",
 "security_manager" => "Gestore della sicurezza",
 //"no_key_sprt" => "Session key non valida. Prego effettuare <a href=\"%sindex.php\">login</a>",
 //"no_session" => "Sessione non trovata, prego effettuare <a href=\"%sindex.php\">log-in</a>",
 "session_timeout_sprt" => "Accesso negato, l'ultima azione risale a %d minuti fa e il timeout &egrave; di %d minuti, prego effettuare <a href=\"%sindex.php\">re-login</a>",
 "access_denied" => "Accesso negato",
 "private_usergroup" => "Spiacente, questa area si trova in un gruppo privato e tu non hai il permesso di accedervi.",
 "invalid_date" => "Data non valida",
 "invalid_date_sprt" => "La data del %s non &egrave; una data valida del calendario (Controlla il numero di giorni nel mese).  Torna indietro e riprova.",


 //taskgroups
 "taskgroup_name" => "Nome del taskgroup:",
 "taskgroup_description" => "Descrizione del Taskgroup:",
 "add_taskgroup" => "Aggiungi taskgroup",
 "add_new_taskgroup" => "Aggiungi un nuovo taskgroup",
 "edit_taskgroup" => "Edita taskgroup",
 "taskgroup_manage" => "Gestione dei Taskgroups",
 "no_taskgroups" => "Nessun taskgroup &egrave; stato definito",
 "manage_taskgroups" => "Gestisci taskgroups",
 "taskgroups" => "Taskgroups",
 "taskgroup_dup_sprt" => "Il taskgroup '%s' esiste gi&agrave;.  Scegli un nuovo nome.",
 "info_taskgroup_manage" => "Info per la gestione del taskgroup",

 //usergroups
 "usergroup_name" => "Nome dello Usergroup:",
 "usergroup_description" => "Descrizione dello Usergroup:",
 "members" => "Membri:",
 //**
 "private_usergroup" => "Private usergroup",
 "add_usergroup" => "Aggiungi usergroup",
 "add_new_usergroup" => "Aggiungi un nuovo usergroup",
 "edit_usergroup" => "Edita usergroup",
 "usergroup_manage" => "Gestione degli Usergroups",
 "no_usergroups" => "Nessun usergroups &egrave; stato definito",
 "manage_usergroups" => "Gestisci usergroups",
 "usergroups" => "Usergroups",
 "usergroup_dup_sprt" => "TLo usergroup '%s' esiste gi&agrave;.  Scegli un nuovo nome.",
 "info_usergroup_manage" => "Info per la gestione dello usergroup",

 //users
 "login_name" => "Login",
 "full_name" => "Nome completo",
 "password" => "Password",
 "blank_for_current_password" => "(Lascia in bianco per confermare la password corrente)",
 "email" => "E-mail",
 "admin" => "Admin",
  //**
 "private_user" => "Private user",
 "is_admin" => "E' un admin?",
 "user_info" => "Informazioni Utente",
 "deleted_users" => "Utenti cancellati",
 "no_deleted_users" => "Non ci sono utenti cancellati.",
 "revive" => "Resuscita",
 "permdel" => "Cancel perman",
 "permdel_javascript_sprt" => "Questa operazione cancella permanentemente tutti i records utente e i relativi tasks per %s. Vuoi realmente effettuare questa operazione?",
 "add_user" => "Aggiungi un utente",
 "edit_user" => "Edita un utente",
 "no_users" => "Nessun utente &egrave; conosciuto dal sistema",
 "users" => "Utenti",
 "existing_users" => "Utenti esistenti",
 //**
 "private_profile" => "Questo utente ha un profilo privato e non pu&ograve; essere visualizzato da te.",
 "private_usergroup_profile" => "(Questo utente &egrave; membro di uno usergroup privato e non pu&ograve; essere visualizzato da te)",
 "email_users" => "Utenti Email",
 "select_usergroup" => "Seleziona usergroup:",
 "subject" => "Oggetto:",
 "message_sent_maillist" => "In ogni caso il messaggio &egrave; anche copiato alla mailing list.",
 "who_online" => "Chi &egrave; online?",
 "edit_details" => "Edita dettagli utente",
 "show_details" => "Visualizza dettagli utente",
 "user_deleted" => "Questo utente &egrave; stato cancellato!",
 "no_usergroup" => "L'utente non &egrave; un membro di usergroups",
 "not_usergroup"=> "(Non &egrave; membro di nessun usergroup)",
 "no_password_change" => "(La tua password non &egrave; stata cambiata)",
 "last_time_here" => "Collegato l'ultima volta:",
 "number_items_created" => "Numero di items creati:",
 "number_projects_owned" => "Numero di progetti gestiti:",
 "number_tasks_owned" => "Numero di attivit&agrave; gestite:",
 "number_tasks_completed" => "Numero di attivit&agrave; completate:",
 "number_forum" => "Numero di messaggi forum inviati:",
 "number_files" => "Numero di files inviati:",
 "size_all_files" => "Dimensione totale dei files proprietari:",
 "owned_tasks" => "Attivit&agrave; assegnate",
 "invalid_email" => "Indirizzo email non valido",
 "invalid_email_given_sprt" => "L'indirizzo email '%s' non &egrave; valido.  Torna indietro e riprova.",
 "duplicate_user" => "Utente duplicato",
 "duplicate_change_user_sprt" => "L'utente '%s' esiste gi&agrave;.  Cambia il nome.",
 "value_missing" => "Parametro omesso",
 "field_sprt" => "Il campo per '%s' &egrave; stato omesso. Torna indietro e riprova.",
 "admin_priv" => "NOTA: Ti sono stati assegnati i privilegi di amministratore.",
 "manage_users" => "Gestisci utenti",
 "users_online" => "Utenti online",
 "online" => "Die hard surfers (Online less than 60 mins ago)",
 "not_online" => "The rest",
 "user_activity" => "Attivit&agrave; utente",

  //tasks
 "add_new_task" => "Aggiungi nuova attivit&agrave;",
 "priority" => "Priorit&agrave;",
 "parent_task" => "Attivit&agrave; madre",
 "creation_time" => "Data di creazione",
 "by_sprt" => "%1\$s da %2\$s", //Note to translators: context is 'Creation time: <date> by <user>'
 "project_name" => "Nome progetto",
 "task_name" => "Nome attivit&agrave;",
 "deadline" => "Scadenza",
 "taken_from_parent" => "(Ereditato dal genitore)",
 "status" => "Stato",
 "task_owner" => "Assegnatario attivit&agrave;",
 "project_owner" => "Assegnatario progetto",
 "taskgroup" => "Taskgroup",
 "usergroup" => "Usergroup",
 "nobody" => "Nessuno",
 "none" => "Nessuno",
 "no_group" => "Nessun gruppo",
 "all_groups" => "Tutti i gruppi",
 "all_users" => "Tutti gli utenti",
 "all_users_view" => "Tutti gli utenti possono vedere questo item??",
 "group_edit" => "Chiunque nello usergroup pu&ograve; editare?",
 "project_description" => "Descrizione progetto",
 "task_description" => "Descrizione attivit&agrave;",
 "email_owner" => "Invia una email agli assegnatari con i cambiamenti?",
 "email_new_owner" => "Invia una email al (nuovo) assegnatario con i cambiamenti?",
 "email_group" => "nvia una email allo usergroup con i cambiamenti?",
 "add_new_project" =>"Aggiungi un nuovo progetto",
 "uncategorised" => "Non categorizzata",
 "due_sprt" => "%d giorni da oggi",
 "tomorrow" => "Domani",
 "due_today" => "Scade oggi",
 "overdue_1" => "1 giorno dopo la scadenza",
 "overdue_sprt" => "%d giorni dopo la scadenza",
 "edit_task" => "Edita attivit&agrave;",
 "edit_project" => "Edita progetto",
 "no_reparent" => "Nessuno (progetto principale)",
 "del_javascript_project_sprt" => "Questa operazione cancella il progetto %s. Sei sicuro?",
 "del_javascript_task_sprt" => "Questa operazione cancella l'attivit&agrave; %s. Sei sicuro?",
 "add_task" => "Aggiungi attivit&agrave;",
 "add_subtask" => "Aggiungi subattivit&agrave;",
 "add_project" => "Aggiungi progetto",
 //**
 "clone_project" => "Clona progetto",
 //**
 "clone_task" => "Clona attivit&agrave;", 
 "no_edit" => "Non sei il proprietario di questo item e non puoi editarlo. Chiedi ad un admin o al proprietario dell'item di effettuare l'operazione.",
 "uncategorised" => "Non categorizzata",
 "admin" => "Admin",
 "global" => "Globale",
 "delete_project" => "Cancella progetto",
 "delete_task" => "Cancella attivit&agrave;",
 "project_options" => "Opzioni del progetto",
 "task_options" => "Opzioni dell'attivit&agrave;",
 "task_navigation" => "Navigazione nelle attivit&agrave;",
 "no_projects" => "Non ci sono progetti da vedere",
 //**
 "show_all_projects" => "Visualizza tutti i progetti",
 "show_active_projects" => "Visualizza solo i progetti attivi",
 "project_hold_sprt" => "Progetto congelato da %s",
 "project_planned" => "Progetto previsto",
 "percent_sprt" => "%d%% delle attivit&agrave; completate",
 "project_no_deadline" => "Scadenza non prevista per questo progetto",
 "no_allowed_projects" => "Non ci sono progetti che puoi vedere",
 "projects" => "Progetti",
 "percent_project_sprt" => "Questo progetto &egrave; completo al %d%%",
 "owned_by" => "Assegnato a",
 "created_on" => "Creato il",
 "completed_on" => "Completo il",
 "modified_on" => "Modificato il",
 "project_on_hold" => "Il progetto &egrave; congelato",
 "project_accessible" => "(Questo progetto &egrave; accessibile da tutti gli utenti)",
 "task_accessible" => "(Questa attivit&agrave; &egrave; accessibile da tutti gli utenti)",
 "project_not_accessible" => "(Questo progetto &egrave; accessibile solo dai membri dello usergroup)",
 "task_not_accessible" => "(Questa attivit&agrave; &egrave; accessibile solo dai membri dello usergroup)",
 "project_not_in_usergroup" => "Questo progetto non &egrave; assegnato ad uno usergroup ed &egrave; accessibile da tutti gli utenti.",
 "task_not_in_usergroup" => "Questa attivit&agrave; non &egrave; assegnata ad uno usergroup ed &egrave; accessibile da tutti gli utenti.",
 "usergroup_can_edit_project" => "Questo progetto pu&ograve; essere editato dai membri dello usergroup.",
 "usergroup_can_edit_task" => "Questa attivit&agrave; pu&ograve; essere editata dai membri dello usergroup.",
 "i_take_it" => "Acquisisco",
 "i_finished" => "Finito!",
 "i_dont_want" => "Rilascio assegnazione",
 "take_over_project" => "Acquisisco progetto",
 "take_over_task" => "Acquisisco attivit&agrave;",
 "task_info" => "Informazioni attivit&agrave;",
 "project_details" => "Dettagli progetto",
 "todo_list_for" => "Lista ToDo per: ",
 "due_in_sprt" => " (Scade tra %d giorni)",
 "due_tomorrow" => " (Scade domani)",
 "no_assigned" => "Non ci sono attivit&agrave; incomplete assegnate a questo utente.",
 "todo_list" => "Lista ToDo",
 "summary_list" => "Lista di riepilogo",
 "task_submit" => "Invia attivit&agrave;",
 "not_owner" => "Accesso negato, non sei l'assegnatario oppure non hai privilegi sufficienti",
 "missing_values" => "Non sono state fornite tutte le informazioni richieste, torna indietro e riprova",
 "future" => "Futuro",
 "flags" => "Flags",
 "owner" => "Proprietario",
 "group" => "Gruppo",
 "by_usergroup" => " (per usergroup)",
 "by_taskgroup" => " (per taskgroup)",
 "by_deadline" => " (per scadenza)",
 "by_status" => " (per stato)",
 "by_owner" => " (per proprietario)",
 //**
 "project_cloned" => "Progetto da clonare:",
 "task_cloned" => "Attivit&agrave; da clonare:",
 "note_clone" => "Nota: L'attivit&agrave; sar&agrave; clonata come un nuovo progetto",

//bits 'n' pieces
  "calendar" => "Calendario",
  "normal_version" => "Versione normale",
  "print_version" => "Versione stampabile"
   );

?>
