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

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );

//dates
$month_array = array ( NULL, "Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic" );
$week_array = array('Dom','Lun','Mar','Mer','Gio','Ven','Sab');

//task states
 //priorities
    $task_state['dontdo']                 = "Tralasciare";
    $task_state['low']                    = "Bassa";
    $task_state['normal']                 = "Normale";
    $task_state['high']                   = "Alta";
    $task_state['yesterday']              = "Ieri!";
 //status
    $task_state['new']                    = "Nuovo";
    $task_state['planned']                = "Previsto (non attivo)";
    $task_state['active']                 = "Attivo (Lavorazione in corso)";
    $task_state['cantcomplete']           = "Congelato";
    $task_state['completed']              = "Completato";
    $task_state['done']                   = "Finito";
    $task_state['task_planned']           = " Pianificata";
    $task_state['task_active']            = " Attiva";
 //project states
    $task_state['planned_project']        = "Progetto previsto (non attivo)";
    $task_state['no_deadline_project']    = "Senza scadenza";
    $task_state['active_project']         = "Progetto attivo";

//common items
    $lang['description']                  = "Descrizione";
    $lang['name']                         = "Nome";
    $lang['add']                          = "Aggiungi";
    $lang['update']                       = "Aggiorna";
    $lang['submit_changes']               = "Invia modifiche";
    $lang['continue']                     = "Continua";
    $lang['reset']                        = "Reset";
    $lang['manage']                       = "Gestisci";
    $lang['edit']                         = "Edita";
    $lang['delete']                       = "Cancella";
    $lang['del']                          = "Cancella";
    $lang['confirm_del_javascript']       = "Conferma cancellazione!";
    $lang['yes']                          = "Sì";
    $lang['no']                           = "No";
    $lang['action']                       = "Azione";
    $lang['task']                         = "Attività";
    $lang['tasks']                        = "Attività";
    $lang['project']                      = "Progetto";
    $lang['info']                         = "Info";
    $lang['bytes']                        = " bytes";
    $lang['select_instruct']              = "(Usa ctrl per selezioni multiple, o per deselezionare)";
    $lang['member_groups']                = "L'utente è membro dei gruppi selezionati sotto (se esistenti)";
    $lang['login']                        = "Login";
    $lang['login_action']                 = "Login";
    $lang['error']                        = "Errore";
    $lang['no_login']                     = "Accesso negato, login o password errati";
//**
    $lang['redirect_sprt']                = "You will automatically return to Login after a %d second delay";
//**
    $lang['login_now']                    = "Please click here to return to Login now";
    $lang['please_login']                 = "Identificazione utente";
//for collaltosabino.net
//  $lang['please_login']                 = "<span class="navy"><b>collaltosabino.net</b><br><span class="darkred"><b>*** Sistema di gestione progetti ***<br><br><span class="navy">Identificazione utente</b></span>";
//**    
    $lang['go']                           = "Go!";
    

//graphic items
    $lang['late_g']                       = "&nbsp;IN RITARDO&nbsp;";
    $lang['new_g']                        = "&nbsp;NUOVO&nbsp;";
    $lang['updated_g']                    = "&nbsp;AGGIORNATO&nbsp;";

//admin config
    $lang['admin_config']                 = "Admin config";
    $lang['email_settings']               = "Email header settings";
    $lang['admin_email']                  = "Admin email";
    $lang['email_reply']                  = "Email 'reply to'";
    $lang['email_from']                   = "Email 'from'";
    $lang['mailing_list']                 = "Mailing list";
    $lang['default_checkbox']             = "Default checkbox settings for Project/Tasks";
    $lang['allow_globalaccess']           = "Allow global access?";
    $lang['allow_group_edit']             = "Allow all in usergroup to edit?";
    $lang['set_email_owner']              = "Always email owner with changes?";
    $lang['set_email_group']              = "Always email usergroup with changes?";
//**    
    $lang['project_listing_order']        = "Project listing order";
//**    
    $lang['task_listing_order']           = "Task listing order";
    $lang['configuration']                = "Configuration";

//archive
//**
    $lang['archived_projects']            = "Archived Projects";

//contacts
    $lang['firstname']                    = "Nome:";
    $lang['lastname']                     = "Cognome:";
    $lang['company']                      = "Azienda:";
    $lang['home_phone']                   = "Telefono abit.:";
    $lang['mobile']                       = "Cellulare:";
    $lang['fax']                          = "Fax:";
    $lang['bus_phone']                    = "Telefono lav.:";
    $lang['address']                      = "Indirizzo:";
    $lang['postal']                       = "Codice postale:";
    $lang['city']                         = "Città:";
    $lang['email']                        = "Email:";
    $lang['notes']                        = "Note:";
    $lang['add_contact']                  = "Aggiungi contatto";
    $lang['del_contact']                  = "Cancella contatto";
    $lang['contact_info']                 = "Informazioni contatto";
    $lang['contacts']                     = "Contatti";
    $lang['contact_add_info']             = "Se aggiungi un nome di azienda, questo sarà visualizzato al posto del nome utente.";
    $lang['show_contact']                 = "Vedi contatti";
    $lang['edit_contact']                 = "Edita contatti";
    $lang['contact_submit']               = "Invia contatto";
    $lang['contact_warn']                 = "Dati insufficienti per aggiungere un contatto, torna indietro e fornisci almeno Nome e Cognome";

 //files
    $lang['manage_files']                 = "Gestisci files";
    $lang['no_files']                     = "Non ci sono files da gestire";
    $lang['no_file_uploads']              = "La configurazione del server per questo sito non permette l'invio di files";
    $lang['file']                         = "File:";
    $lang['uploader']                     = "Mittente:";
    $lang['files_assoc_project']          = "Files associati a questo progetto";
    $lang['files_assoc_task']             = "Files associati a questa attività";
    $lang['file_admin']                   = "File admin";
    $lang['add_file']                     = "Aggiungi file";
    $lang['files']                        = "Files";
    $lang['file_choose']                  = "File da inviare:";
    $lang['upload']                       = "Invio";
 //**
    $lang['file_email_owner']             = "Inviare una Email per notificare un nuovo file al proprietario?";
 //**
    $lang['file_email_usergroup']         = "Inviare una Email per notificare un nuovo file allo usergroup?";
    $lang['max_file_sprt']                = "Il file da inviare deve essere più piccolo di %s kb.";
    $lang['file_submit']                  = "Invia file";
    $lang['no_upload']                    = "Nessun file è stato inviato.  Torna indietro e riprova.";
    $lang['file_too_big_sprt']            = "La dimensione massima è %s bytes.  Il tuo invio è troppo grande ed è stato cancellato.";
    $lang['del_file_javascript_sprt']     = "Sei sicuro che vuoi cancellare %s ?";


 //forum
    $lang['orig_message']                 = "Messaggio originale:";
    $lang['post']                         = "Invia!";
    $lang['message']                      = "Messaggio:";
    $lang['post_reply_sprt']              = "Invia una risposta al messaggio di '%s' circa '%s'";
    $lang['post_message_sprt']            = "Invia un messagio a: '%s'";
 //**
    $lang['forum_email_owner']            = "Email forum message to the owner?";
 //**
    $lang['forum_email_usergroup']        = "Email forum message to the usergroup?";
    $lang['reply']                        = "Rispondi";
    $lang['new_post']                     = "Nuovo invio";
    $lang['public_user_forum']            = "Forum pubblico";
    $lang['private_forum_sprt']           = "Forum privato per il gruppo '%s'";
    $lang['forum_submit']                 = "Invia Forum";
    $lang['no_message']                   = "Nessun messaggio! Torna indietro e riprova";
    $lang['add_reply']                    = "Aggiungi risposta";
//**
    $lang['last_post_sprt']               = "Last post %s"; //Note to translators: context is 'Last post 2004-Dec-22'
//**
    $lang['recent_posts']                 = "Recent forum posts";
//**
    $lang['recent_posts']                 = "Recent forum posts";
//**
    $lang['forum_search']                 = "Forum search";
//**
    $lang['no_results']                   = "No results found for '%s'";
//**
    $lang['search_results']               = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                       = "Report";
    $lang['warning']                      = "<h1>Spiacente!</h1><p>Non è possibile processare la tua richiesta adesso. Riprova più tardi.</p>";
    $lang['home_page']                    = "Home page";
    $lang['summary_page']                 = "Pagina di riepilogo";
    $lang['todo_list']                    = "Lista ToDo";
    $lang['calendar']                     = "Calendario";
    $lang['log_out']                      = "Log out";
    $lang['main_menu']                    = "Menu principale";
//**
    $lang['archive']                      = "Archive";
    $lang['user_homepage_sprt']           = "%s's homepage";
    $lang['missing_field_javascript']     = "Prego, inserisci un valore nel campo omesso";
    $lang['invalid_date_javascript']      = "Prego, scegli una data valida";
    $lang['finish_date_javascript']       = "La data inserita è successiva alla data di fine progetto!";
    $lang['security_manager']             = "Gestore della sicurezza";
    $lang['session_timeout_sprt']         = "Accesso negato, l'ultima azione risale a %d minuti fa e il timeout è di %d minuti, prego effettuare <a href=\"%sindex.php\">re-login</a>";
    $lang['access_denied']                = "Accesso negato";
    $lang['private_usergroup']            = "Spiacente, questa area si trova in un gruppo privato e tu non hai il permesso di accedervi.";
    $lang['invalid_date']                 = "Data non valida";
    $lang['invalid_date_sprt']            = "La data del %s non è una data valida del calendario (Controlla il numero di giorni nel mese).  Torna indietro e riprova.";


 //taskgroups
    $lang['taskgroup_name']               = "Nome del taskgroup:";
    $lang['taskgroup_description']        = "Descrizione del Taskgroup:";
    $lang['add_taskgroup']                = "Aggiungi taskgroup";
    $lang['add_new_taskgroup']            = "Aggiungi un nuovo taskgroup";
    $lang['edit_taskgroup']               = "Edita taskgroup";
    $lang['taskgroup_manage']             = "Gestione dei Taskgroups";
    $lang['no_taskgroups']                = "Nessun taskgroup è stato definito";
    $lang['manage_taskgroups']            = "Gestisci taskgroups";
    $lang['taskgroups']                   = "Taskgroups";
    $lang['taskgroup_dup_sprt']           = "Il taskgroup '%s' esiste già.  Scegli un nuovo nome.";
    $lang['info_taskgroup_manage']        = "Info per la gestione del taskgroup";

 //usergroups
    $lang['usergroup_name']               = "Nome dello Usergroup:";
    $lang['usergroup_description']        = "Descrizione dello Usergroup:";
    $lang['members']                      = "Membri:";
    $lang['private_usergroup']            = "Private usergroup";
    $lang['add_usergroup']                = "Aggiungi usergroup";
    $lang['add_new_usergroup']            = "Aggiungi un nuovo usergroup";
    $lang['edit_usergroup']               = "Edita usergroup";
    $lang['usergroup_manage']             = "Gestione degli Usergroups";
    $lang['no_usergroups']                = "Nessun usergroups è stato definito";
    $lang['manage_usergroups']            = "Gestisci usergroups";
    $lang['usergroups']                   = "Usergroups";
    $lang['usergroup_dup_sprt']           = "TLo usergroup '%s' esiste già.  Scegli un nuovo nome.";
    $lang['info_usergroup_manage']        = "Info per la gestione dello usergroup";

 //users
    $lang['login_name']                   = "Login";
    $lang['full_name']                    = "Nome completo";
    $lang['password']                     = "Password";
    $lang['blank_for_current_password']   = "(Lascia in bianco per confermare la password corrente)";
    $lang['email']                        = "E-mail";
    $lang['admin']                        = "Admin";
    $lang['private_user']                 = "Private user";
 //**
    $lang['normal_user']                  = "Normal user";
    $lang['is_admin']                     = "E' un admin?";
 //**
    $lang['is_guest']                     = "Is a guest?";
 //**
    $lang['guest']                        = "Guest user";
    $lang['user_info']                    = "Informazioni Utente";
    $lang['deleted_users']                = "Utenti cancellati";
    $lang['no_deleted_users']             = "Non ci sono utenti cancellati.";
    $lang['revive']                       = "Resuscita";
    $lang['permdel']                      = "Cancel perman";
    $lang['permdel_javascript_sprt']      = "Questa operazione cancella permanentemente tutti i records utente e i relativi tasks per %s. Vuoi realmente effettuare questa operazione?";
    $lang['add_user']                     = "Aggiungi un utente";
    $lang['edit_user']                    = "Edita un utente";
    $lang['no_users']                     = "Nessun utente è conosciuto dal sistema";
    $lang['users']                        = "Utenti";
    $lang['existing_users']               = "Utenti esistenti";
    $lang['private_profile']              = "Questo utente ha un profilo privato e non può essere visualizzato da te.";
    $lang['private_usergroup_profile']    = "(Questo utente è membro di uno usergroup privato e non può essere visualizzato da te)";
    $lang['email_users']                  = "Utenti Email";
    $lang['select_usergroup']             = "Seleziona usergroup:";
    $lang['subject']                      = "Oggetto:";
    $lang['message_sent_maillist']        = "In ogni caso il messaggio è anche copiato alla mailing list.";
    $lang['who_online']                   = "Chi è online?";
    $lang['edit_details']                 = "Edita dettagli utente";
    $lang['show_details']                 = "Visualizza dettagli utente";
    $lang['user_deleted']                 = "Questo utente è stato cancellato!";
    $lang['no_usergroup']                 = "L'utente non è un membro di usergroups";
    $lang['not_usergroup']                = "(Non è membro di nessun usergroup)";
    $lang['no_password_change']           = "(La tua password non è stata cambiata)";
    $lang['last_time_here']               = "Collegato l'ultima volta:";
    $lang['number_items_created']         = "Numero di items creati:";
    $lang['number_projects_owned']        = "Numero di progetti gestiti:";
    $lang['number_tasks_owned']           = "Numero di attività gestite:";
    $lang['number_tasks_completed']       = "Numero di attività completate:";
    $lang['number_forum']                 = "Numero di messaggi forum inviati:";
    $lang['number_files']                 = "Numero di files inviati:";
    $lang['size_all_files']               = "Dimensione totale dei files proprietari:";
    $lang['owned_tasks']                  = "Attività assegnate";
    $lang['invalid_email']                = "Indirizzo email non valido";
    $lang['invalid_email_given_sprt']     = "L'indirizzo email '%s' non è valido.  Torna indietro e riprova.";
    $lang['duplicate_user']               = "Utente duplicato";
    $lang['duplicate_change_user_sprt']   = "L'utente '%s' esiste già.  Cambia il nome.";
    $lang['value_missing']                = "Parametro omesso";
    $lang['field_sprt']                   = "Il campo per '%s' è stato omesso. Torna indietro e riprova.";
    $lang['admin_priv']                   = "NOTA: Ti sono stati assegnati i privilegi di amministratore.";
    $lang['manage_users']                 = "Gestisci utenti";
    $lang['users_online']                 = "Utenti online";
    $lang['online']                       = "Die hard surfers (Online less than 60 mins ago)";
    $lang['not_online']                   = "The rest";
    $lang['user_activity']                = "Attività utente";

  //tasks
    $lang['add_new_task']                 = "Aggiungi nuova attività";
    $lang['priority']                     = "Priorità";
    $lang['parent_task']                  = "Attività madre";
    $lang['creation_time']                = "Data di creazione";
    $lang['by_sprt']                      = "%1\$s da %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>
    $lang['project_name']                 = "Nome progetto";
    $lang['task_name']                    = "Nome attività";
    $lang['deadline']                     = "Scadenza";
    $lang['taken_from_parent']            = "(Ereditato dal genitore)";
    $lang['status']                       = "Stato";
    $lang['task_owner']                   = "Assegnatario attività";
    $lang['project_owner']                = "Assegnatario progetto";
    $lang['taskgroup']                    = "Taskgroup";
    $lang['usergroup']                    = "Usergroup";
    $lang['nobody']                       = "Nessuno";
    $lang['none']                         = "Nessuno";
    $lang['no_group']                     = "Nessun gruppo";
    $lang['all_groups']                   = "Tutti i gruppi";
    $lang['all_users']                    = "Tutti gli utenti";
    $lang['all_users_view']               = "Tutti gli utenti possono vedere questo item??";
    $lang['group_edit']                   = "Chiunque nello usergroup può editare?";
    $lang['project_description']          = "Descrizione progetto";
    $lang['task_description']             = "Descrizione attività";
    $lang['email_owner']                  = "Invia una email agli assegnatari con i cambiamenti?";
    $lang['email_new_owner']              = "Invia una email al (nuovo) assegnatario con i cambiamenti?";
    $lang['email_group']                  = "nvia una email allo usergroup con i cambiamenti?";
    $lang['add_new_project']              = "Aggiungi un nuovo progetto";
    $lang['uncategorised']                = "Non categorizzata";
    $lang['due_sprt']                     = "%d giorni da oggi";
    $lang['tomorrow']                     = "Domani";
    $lang['due_today']                    = "Scade oggi";
    $lang['overdue_1']                    = "1 giorno dopo la scadenza";
    $lang['overdue_sprt']                 = "%d giorni dopo la scadenza";
    $lang['edit_task']                    = "Edita attività";
    $lang['edit_project']                 = "Edita progetto";
    $lang['no_reparent']                  = "Nessuno (progetto principale)";
    $lang['del_javascript_project_sprt']  = "Questa operazione cancella il progetto %s. Sei sicuro?";
    $lang['del_javascript_task_sprt']     = "Questa operazione cancella l\'attività %s. Sei sicuro?";
    $lang['add_task']                     = "Aggiungi attività";
    $lang['add_subtask']                  = "Aggiungi subattività";
    $lang['add_project']                  = "Aggiungi progetto";
    $lang['clone_project']                = "Clona progetto";
    $lang['clone_task']                   = "Clona attività";
//**
    $lang['quick_jump']                   = "Quick Jump";
    $lang['no_edit']                      = "Non sei il proprietario di questo item e non puoi editarlo. Chiedi ad un admin o al proprietario dell'item di effettuare l'operazione.";
    $lang['uncategorised']                = "Non categorizzata";
    $lang['admin']                        = "Admin";
    $lang['global']                       = "Globale";
    $lang['delete_project']               = "Cancella progetto";
    $lang['delete_task']                  = "Cancella attività";
    $lang['project_options']              = "Opzioni del progetto";
    $lang['task_options']                 = "Opzioni dell'attività";
//**    
    $lang['javascript_archive_project']   = "This will archive project %s.  Are you sure?";
//**    
    $lang['archive_project']              = "Archive project";
    $lang['task_navigation']              = "Navigazione nelle attività";
//**
    $lang['new_task']                     = "New task";
    $lang['no_projects']                  = "Non ci sono progetti da vedere";
    $lang['show_all_projects']            = "Visualizza tutti i progetti";
    $lang['show_active_projects']         = "Visualizza solo i progetti attivi";
    $lang['project_hold_sprt']            = "Progetto congelato da %s";
    $lang['project_planned']              = "Progetto previsto";
    $lang['percent_sprt']                 = "%d%% delle attività completate";
    $lang['project_no_deadline']          = "Scadenza non prevista per questo progetto";
    $lang['no_allowed_projects']          = "Non ci sono progetti che puoi vedere";
    $lang['projects']                     = "Progetti";
    $lang['percent_project_sprt']         = "Questo progetto è completo al %d%%";
    $lang['owned_by']                     = "Assegnato a";
    $lang['created_on']                   = "Creato il";
    $lang['completed_on']                 = "Completo il";
    $lang['modified_on']                  = "Modificato il";
    $lang['project_on_hold']              = "Il progetto è congelato";
    $lang['project_accessible']           = "(Questo progetto è accessibile da tutti gli utenti)";
    $lang['task_accessible']              = "(Questa attività è accessibile da tutti gli utenti)";
    $lang['project_not_accessible']       = "(Questo progetto è accessibile solo dai membri dello usergroup)";
    $lang['task_not_accessible']          = "(Questa attività è accessibile solo dai membri dello usergroup)";
    $lang['project_not_in_usergroup']     = "Questo progetto non è assegnato ad uno usergroup ed è accessibile da tutti gli utenti.";
    $lang['task_not_in_usergroup']        = "Questa attività non è assegnata ad uno usergroup ed è accessibile da tutti gli utenti.";
    $lang['usergroup_can_edit_project']   = "Questo progetto può essere editato dai membri dello usergroup.";
    $lang['usergroup_can_edit_task']      = "Questa attività può essere editata dai membri dello usergroup.";
    $lang['i_take_it']                    = "Acquisisco";
    $lang['i_finished']                   = "Finito!";
    $lang['i_dont_want']                  = "Rilascio assegnazione";
    $lang['take_over_project']            = "Acquisisco progetto";
    $lang['take_over_task']               = "Acquisisco attività";
    $lang['task_info']                    = "Informazioni attività";
    $lang['project_details']              = "Dettagli progetto";
    $lang['todo_list_for']                = "Lista ToDo per: ";
    $lang['due_in_sprt']                  = " (Scade tra %d giorni)";
    $lang['due_tomorrow']                 = " (Scade domani)";
    $lang['no_assigned']                  = "Non ci sono attività incomplete assegnate a questo utente.";
    $lang['todo_list']                    = "Lista ToDo";
    $lang['summary_list']                 = "Lista di riepilogo";
    $lang['task_submit']                  = "Invia attività";
    $lang['not_owner']                    = "Accesso negato, non sei l'assegnatario oppure non hai privilegi sufficienti";
    $lang['missing_values']               = "Non sono state fornite tutte le informazioni richieste, torna indietro e riprova";
    $lang['future']                       = "Futuro";
    $lang['flags']                        = "Flags";
    $lang['owner']                        = "Proprietario";
    $lang['group']                        = "Gruppo";
    $lang['by_usergroup']                 = " (per usergroup)";
    $lang['by_taskgroup']                 = " (per taskgroup)";
    $lang['by_deadline']                  = " (per scadenza)";
    $lang['by_status']                    = " (per stato)";
    $lang['by_owner']                     = " (per proprietario)";
    $lang['project_cloned']               = "Progetto da clonare:";
    $lang['task_cloned']                  = "Attività da clonare:";
    $lang['note_clone']                   = "Nota: L'attività sarà clonata come un nuovo progetto";

//bits 'n' pieces
    $lang['calendar']                     = "Calendario";
    $lang['normal_version']               = "Versione normale";
    $lang['print_version']                = "Versione stampabile";
//**    
    $lang['condensed_view']               = "Condensed view";
//**    
    $lang['full_view']                    = "Full view";
//**
    $lang['icalendar']                    = "iCalendar";

?>