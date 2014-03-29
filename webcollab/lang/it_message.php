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

  Translator:
    Raffaele Franzese <r.franzese@collaltosabino.net> (2003)
    Igor Falcomata <koba at cioccolatai.it> (2013)
    Giuseppe Dantini <sf_peppe at sourceforge.net> (2014)

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "it" );

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
    $task_state['cantcomplete']           = "Sospeso";
    $task_state['completed']              = "Completato";
    $task_state['done']                   = "Fatto";
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
    $lang['manage']                       = "Gestisci";
    $lang['edit']                         = "Modifica";
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
    $lang['login_screen']                 = "Login";
    $lang['error']                        = "Errore";
    $lang['no_login']                     = "Accesso negato, login o password errati";
    $lang['redirect_sprt']                = "Sarai automaticamente riportato al Login dopo %d secondi";
    $lang['login_now']                    = "Clicca qui per tornare al Login ora";
    $lang['please_login']                 = "Identificazione utente";
    $lang['go']                           = "Vai!";

//graphic items
    $lang['late_g']                       = "&nbsp;IN RITARDO&nbsp;";
    $lang['new_g']                        = "&nbsp;NUOVO&nbsp;";
    $lang['updated_g']                    = "&nbsp;AGGIORNATO&nbsp;";

//admin config
    $lang['admin_config']                 = "Amministrazione";
    $lang['email_settings']               = "Impostazioni dell'email header";
    $lang['admin_email']                  = "Email amministratore";
    $lang['email_reply']                  = "Email 'reply to'";
    $lang['email_from']                   = "Email 'from'";
    $lang['mailing_list']                 = "Mailing list";
    $lang['default_checkbox']             = "Impostazioni di default per Progetti/Attività";
    $lang['allow_globalaccess']           = "Consenti l'accesso globale?";
    $lang['allow_group_edit']             = "Consenti le modifiche a tutti i membri dei gruppi";
    $lang['set_email_owner']              = "Invia sempre l'email al proprietario con le modifiche?";
    $lang['set_email_group']              = "Invia sempre l'email al gruppo con le modifiche?";
    $lang['project_listing_order']        = "Ordine dei progetti";
    $lang['task_listing_order']           = "Ordine delle attività";
    $lang['configuration']                = "Configurazione";

//archive
    $lang['archived_projects']            = "Progetti archiviati";

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
    $lang['email_contact']                = "Email:";
    $lang['notes']                        = "Note:";
    $lang['add_contact']                  = "Aggiungi contatto";
    $lang['del_contact']                  = "Cancella contatto";
    $lang['contact_info']                 = "Informazioni contatto";
    $lang['contacts']                     = "Contatti";
    $lang['contact_add_info']             = "Se aggiungi un nome di azienda, questo sarà visualizzato al posto del nome utente.";
    $lang['show_contact']                 = "Vedi contatti";
    $lang['edit_contact']                 = "Modifica contatti";
    $lang['contact_submit']               = "Invia contatto";
    $lang['contact_warn']                 = "Dati insufficienti per aggiungere un contatto, torna indietro e fornisci almeno Nome e Cognome";

 //files
    $lang['manage_files']                 = "Gestisci file";
    $lang['no_files']                     = "Non ci sono file da gestire";
    $lang['no_file_uploads']              = "La configurazione del server per questo sito non permette l'invio di file";
    $lang['file']                         = "File:";
    $lang['uploader']                     = "Mittente:";
    $lang['files_assoc_project']          = "File associati a questo progetto";
    $lang['files_assoc_task']             = "File associati a questa attività";
    $lang['file_admin']                   = "Gestione file";
    $lang['add_file']                     = "Aggiungi file";
    $lang['files']                        = "File";
    $lang['file_choose']                  = "File da inviare:";
    $lang['upload']                       = "Invio";
    $lang['file_email_owner']             = "Inviare una Email per notificare un nuovo file al proprietario?";
    $lang['file_email_usergroup']         = "Inviare una Email per notificare un nuovo file al gruppo?";
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
    $lang['forum_email_owner']            = "Invia il messaggio al proprietario?";
    $lang['forum_email_usergroup']        = "Invia al gruppo il messaggio tramite email?";
    $lang['reply']                        = "Rispondi";
    $lang['new_post']                     = "Nuovo invio";
    $lang['public_user_forum']            = "Forum pubblico";
    $lang['private_forum_sprt']           = "Forum privato per il gruppo '%s'";
    $lang['forum_submit']                 = "Invia messaggio";
    $lang['no_message']                   = "Nessun messaggio! Torna indietro e riprova";
    $lang['add_reply']                    = "Aggiungi risposta";
    $lang['last_post_sprt']               = "Ultimo messaggio %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']                 = "Messaggi recenti";
    $lang['forum_search']                 = "Ricerca nel Forum";
    $lang['no_results']                   = "Nessun risultato trovato per '%s'";
    $lang['search_results']               = "Trovati %1\$s risultati per '%2\$s'<br />Mostra risultati da %3\$s a %4\$s";

 //includes
    $lang['report']                       = "Report";
    $lang['warning']                      = "<h1>Spiacente!</h1><p>Non è possibile processare la tua richiesta adesso. Riprova più tardi.</p>";
    $lang['home_page']                    = "Home page";
    $lang['summary_page']                 = "Pagina di riepilogo";
    $lang['log_out']                      = "Log out";
    $lang['main_menu']                    = "Menu principale";
    $lang['archive']                      = "Archivio";
    $lang['user_homepage_sprt']           = "%s - homepage";
    $lang['missing_field_javascript']     = "Prego, inserisci un valore nel campo omesso";
    $lang['invalid_date_javascript']      = "Prego, scegli una data valida";
    $lang['finish_date_javascript']       = "La data inserita è successiva alla data di fine progetto!";
    $lang['security_manager']             = "Gestore della sicurezza";
    $lang['session_timeout_sprt']         = "Accesso negato, l'ultima azione risale a %d minuti fa e il timeout è di %d minuti, prego effettuare <a href=\"%sindex.php\">re-login</a>";
    $lang['access_denied']                = "Accesso negato";
    $lang['private_usergroup_no_access']  = "Spiacente, questa area si trova in un gruppo privato e tu non hai il permesso di accedervi.";
    $lang['invalid_date']                 = "Data non valida";
    $lang['invalid_date_sprt']            = "La data del %s non è una data valida del calendario (Controlla il numero di giorni nel mese).  Torna indietro e riprova.";

 //taskgroups
    $lang['taskgroup_name']               = "Nome della categoria:";
    $lang['taskgroup_description']        = "Descrizione della categoria:";
    $lang['add_taskgroup']                = "Aggiungi categoria";
    $lang['add_new_taskgroup']            = "Aggiungi una nuova categoria";
    $lang['edit_taskgroup']               = "Modifica categoria";
    $lang['taskgroup_manage']             = "Gestione delle categorie";
    $lang['no_taskgroups']                = "Nessuna categoria è stata definita";
    $lang['manage_taskgroups']            = "Gestisci categorie";
    $lang['taskgroups']                   = "Categorie";
    $lang['taskgroup_dup_sprt']           = "La categoria '%s' esiste già.  Scegli un nuovo nome.";
    $lang['info_taskgroup_manage']        = "Info per la gestione della categoria";

 //usergroups
    $lang['usergroup_name']               = "Nome del gruppo:";
    $lang['usergroup_description']        = "Descrizione del gruppo:";
    $lang['members']                      = "Membri:";
    $lang['private_usergroup']            = "Gruppo privato";
    $lang['add_usergroup']                = "Aggiungi gruppo";
    $lang['add_new_usergroup']            = "Aggiungi un nuovo gruppo";
    $lang['edit_usergroup']               = "Modifica gruppo";
    $lang['email_new_usergroup']          = "Invia email con i nuovi dettagli ai membri del gruppo?";
    $lang['email_edit_usergroup']         = "Invia email con le modifiche ai membri del gruppo?";
    $lang['usergroup_manage']             = "Gestione dei gruppi";
    $lang['no_usergroups']                = "Nessun gruppo è stato definito";
    $lang['manage_usergroups']            = "Gestisci gruppi";
    $lang['usergroups']                   = "Gruppi";
    $lang['usergroup_dup_sprt']           = "Il gruppo '%s' esiste già.  Scegli un nuovo nome.";
    $lang['info_usergroup_manage']        = "Info per la gestione del gruppo";

 //users
    $lang['login_name']                   = "Login";
    $lang['full_name']                    = "Nome completo";
    $lang['password']                     = "Password";
    $lang['blank_for_current_password']   = "(Lascia in bianco per confermare la password corrente)";
    $lang['email']                        = "E-mail";
    $lang['admin']                        = "Amministratore";
    $lang['private_user']                 = "Utente privato";
    $lang['normal_user']                  = "Utente normale";
    $lang['is_admin']                     = "E' un amministratore?";
    $lang['is_guest']                     = "E' un ospite?";
    $lang['guest']                        = "Utente ospite";
    $lang['user_info']                    = "Informazioni Utente";
    $lang['deleted_users']                = "Utenti cancellati";
    $lang['no_deleted_users']             = "Non ci sono utenti cancellati.";
    $lang['revive']                       = "Ripristina";
    $lang['permdel']                      = "Cancella definitivamente";
    $lang['permdel_javascript_sprt']      = "Questa operazione cancella definitivamente tutti i record utente e le relative attività per %s. Vuoi realmente effettuare questa operazione?";
    $lang['add_user']                     = "Aggiungi un utente";
    $lang['edit_user']                    = "Modifica un utente";
    $lang['no_users']                     = "Nessun utente è conosciuto dal sistema";
    $lang['users']                        = "Utenti";
    $lang['existing_users']               = "Utenti esistenti";
    $lang['private_profile']              = "Questo utente ha un profilo privato e non può essere visualizzato da te.";
    $lang['private_usergroup_profile']    = "(Questo utente è membro di un gruppo privato e non può essere visualizzato da te)";
    $lang['email_users']                  = "Invia email";
    $lang['select_usergroup']             = "Seleziona gruppo:";
    $lang['subject']                      = "Oggetto:";
    $lang['message_sent_maillist']        = "In ogni caso il messaggio è anche copiato alla mailing list.";
    $lang['who_online']                   = "Chi è online?";
    $lang['edit_details']                 = "Modifica dettagli utente";
    $lang['show_details']                 = "Visualizza dettagli utente";
    $lang['user_deleted']                 = "Questo utente è stato cancellato!";
    $lang['no_usergroup']                 = "L'utente non è un membro di gruppi";
    $lang['not_usergroup']                = "(Non è membro di alcun gruppo)";
    $lang['no_password_change']           = "(La tua password non è stata cambiata)";
    $lang['last_time_here']               = "Collegato l'ultima volta:";
    $lang['number_items_created']         = "Numero di voci create:";
    $lang['number_projects_owned']        = "Numero di progetti gestiti:";
    $lang['number_tasks_owned']           = "Numero di attività gestite:";
    $lang['number_tasks_completed']       = "Numero di attività completate:";
    $lang['number_forum']                 = "Numero di messaggi inviati:";
    $lang['number_files']                 = "Numero di file inviati:";
    $lang['size_all_files']               = "Dimensione totale dei file proprietari:";
    $lang['owned_tasks']                  = "Attività assegnate";
    $lang['invalid_email']                = "Indirizzo email non valido";
    $lang['invalid_email_given_sprt']     = "L'indirizzo email '%s' non è valido.  Torna indietro e riprova.";
    $lang['duplicate_user']               = "Utente duplicato";
    $lang['duplicate_change_user_sprt']   = "L'utente '%s' esiste già. Cambia il nome.";
    $lang['value_missing']                = "Parametro omesso";
    $lang['field_sprt']                   = "Il campo per '%s' è stato omesso. Torna indietro e riprova.";
    $lang['admin_priv']                   = "NOTA: Ti sono stati assegnati i privilegi di amministratore.";
    $lang['manage_users']                 = "Gestisci utenti";
    $lang['users_online']                 = "Utenti online";
    $lang['online']                       = "Die hard surfers (Online negli ultimi 60 minuti)";
    $lang['not_online']                   = "The rest";
    $lang['user_activity']                = "Attività utente";

  //tasks
    $lang['add_new_task']                 = "Aggiungi nuova attività";
    $lang['priority']                     = "Priorità";
    $lang['parent_task']                  = "Attività genitore";
    $lang['creation_time']                = "Data di creazione";
    $lang['by_sprt']                      = "%1\$s da %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>
    $lang['project_name']                 = "Nome progetto";
    $lang['task_name']                    = "Nome attività";
    $lang['deadline']                     = "Scadenza";
    $lang['taken_from_parent']            = "(Ereditato dal genitore)";
    $lang['status']                       = "Stato";
    $lang['task_owner']                   = "Assegnatario attività";
    $lang['project_owner']                = "Assegnatario progetto";
    $lang['taskgroup']                    = "Categoria";
    $lang['usergroup']                    = "Gruppo";
    $lang['nobody']                       = "Nessuno";
    $lang['none']                         = "Nessuno";
    $lang['no_group']                     = "Nessuno";
    $lang['all_groups']                   = "Tutti i gruppi";
    $lang['all_users']                    = "Tutti gli utenti";
    $lang['all_users_view']               = "Tutti gli utenti possono vedere questa voce?";
    $lang['group_edit']                   = "Chiunque nel gruppo può modificare?";
    $lang['project_description']          = "Descrizione progetto";
    $lang['task_description']             = "Descrizione attività";
    $lang['email_owner']                  = "Invia una email agli assegnatari con i cambiamenti?";
    $lang['email_new_owner']              = "Invia una email al (nuovo) assegnatario con i cambiamenti?";
    $lang['email_group']                  = "Invia una email al gruppo con i cambiamenti?";
    $lang['add_new_project']              = "Aggiungi un nuovo progetto";
    $lang['uncategorised']                = "Non categorizzata";
    $lang['due_sprt']                     = "%d giorni da oggi";
    $lang['tomorrow']                     = "Domani";
    $lang['due_today']                    = "Scade oggi";
    $lang['overdue_1']                    = "1 giorno dopo la scadenza";
    $lang['overdue_sprt']                 = "%d giorni dopo la scadenza";
    $lang['edit_task']                    = "Modifica attività";
    $lang['edit_project']                 = "Modifica progetto";
    $lang['no_reparent']                  = "Nessuno (progetto principale)";
    $lang['del_javascript_project_sprt']  = "Questa operazione cancella il progetto %s. Sei sicuro?";
    $lang['del_javascript_task_sprt']     = "Questa operazione cancella l\'attività %s. Sei sicuro?";
    $lang['add_task']                     = "Aggiungi attività";
    $lang['add_subtask']                  = "Aggiungi subattività";
    $lang['add_project']                  = "Aggiungi progetto";
    $lang['clone_project']                = "Duplica progetto";
    $lang['clone_task']                   = "Duplica attività";
    $lang['quick_jump']                   = "Selezione rapida";
    $lang['no_edit']                      = "Non sei il proprietario di questa voce e non puoi modificarla. Chiedi ad un amministratore o al proprietario della voce di effettuare l'operazione.";
    $lang['global']                       = "Globale";
    $lang['delete_project']               = "Cancella progetto";
    $lang['delete_task']                  = "Cancella attività";
    $lang['project_options']              = "Opzioni del progetto";
    $lang['task_options']                 = "Opzioni dell'attività";
    $lang['javascript_archive_project']   = "Questo archivierà il progetto %s. Sei sicuro?";
    $lang['archive_project']              = "Archivia progetto";
    $lang['task_navigation']              = "Navigazione";
    $lang['new_task']                     = "Nuova attività";
    $lang['no_projects']                  = "Non ci sono progetti da vedere";
    $lang['show_all_projects']            = "Visualizza tutti i progetti";
    $lang['show_active_projects']         = "Visualizza solo i progetti attivi";
    $lang['project_hold_sprt']            = "Progetto sospeso da %s";
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
    $lang['project_on_hold']              = "Il progetto è sospeso";
    $lang['project_accessible']           = "(Questo progetto è accessibile da tutti gli utenti)";
    $lang['task_accessible']              = "(Questa attività è accessibile da tutti gli utenti)";
    $lang['project_not_accessible']       = "(Questo progetto è accessibile solo dai membri del gruppo)";
    $lang['task_not_accessible']          = "(Questa attività è accessibile solo dai membri del gruppo)";
    $lang['project_not_in_usergroup']     = "Questo progetto non è assegnato ad un gruppo ed è accessibile da tutti gli utenti.";
    $lang['task_not_in_usergroup']        = "Questa attività non è assegnata ad un gruppo ed è accessibile da tutti gli utenti.";
    $lang['usergroup_can_edit_project']   = "Questo progetto può essere modificatodai membri del gruppo.";
    $lang['usergroup_can_edit_task']      = "Questa attività può essere modificata dai membri del gruppo.";
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
    $lang['flags']                        = "Flag";
    $lang['owner']                        = "Proprietario";
    $lang['group']                        = "Gruppo";
    $lang['by_usergroup']                 = " (per gruppo)";
    $lang['by_taskgroup']                 = " (per categoria)";
    $lang['by_deadline']                  = " (per scadenza)";
    $lang['by_status']                    = " (per stato)";
    $lang['by_owner']                     = " (per proprietario)";
    $lang['by_priority']                  = " (per priorità)";
    $lang['project_cloned']               = "Progetto da duplicare:";
    $lang['task_cloned']                  = "Attività da duplicare:";
    $lang['note_clone']                   = "Nota: L'attività sarà duplicata come nuovo progetto";

//bits 'n' pieces
    $lang['calendar']                     = "Calendario";
    $lang['normal_version']               = "Versione normale";
    $lang['print_version']                = "Versione stampabile";
    $lang['condensed_view']               = "Vista condensata";
    $lang['full_view']                    = "Vista completa";
    $lang['icalendar']                    = "iCalendar";
    $lang['url_javascript']               = "Inserisci l'URL:";
    $lang['image_url_javascript']         = "Inserisci l'URL dell'immagine:";

?>