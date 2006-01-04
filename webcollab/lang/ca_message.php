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

  Language files for 'ca' (Catalan)

  Translation: Daniel Hernandez (dhernan2 at pie.xtec.es)

  Maintainer:

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );

//this is the regex for input validation filter used in common.php 
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s"; //ISO-8859-x

//dates
$month_array = array ( NULL, "Gen", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dec" );
$week_array = array('Diu','Dll','Dm','Dcs','Dj','Dv','Dte');

//task states
 //priorities
    $task_state['dontdo']                 = "No fer";
    $task_state['low']                    = "Baixa";
    $task_state['normal']                 = "Normal";
    $task_state['high']                   = "Alta";
    $task_state['yesterday']              = "Per AHIR!";
 //status
    $task_state['new']                    = "Nova";
    $task_state['planned']                = "Planejada (no activa)";
    $task_state['active']                 = "Activa (treballant-hi)";
    $task_state['cantcomplete']           = "En suspens";
    $task_state['completed']              = "Completada";
    $task_state['done']                   = "Feta";
    $task_state['task_planned']           = " Planejada";
    $task_state['task_active']            = " Activa";
 //project states
    $task_state['planned_project']        = "Projecte planejat (no actiu)";
    $task_state['no_deadline_project']    = "Sense data limit";
    $task_state['active_project']         = "Projecte actiu";

//common items
    $lang['description']                  = "Descripci�";
    $lang['name']                         = "Nom";
    $lang['add']                          = "Afegir";
    $lang['update']                       = "Actualitzar";
    $lang['submit_changes']               = "Enviar canvis";
    $lang['continue']                     = "Continuar";
    $lang['reset']                        = "Reset";
    $lang['manage']                       = "Administrar";
    $lang['edit']                         = "Editar";
    $lang['delete']                       = "Esborrar";
    $lang['del']                          = "Esborra";
    $lang['confirm_del_javascript']       = "Confirma esborrat!";
    $lang['yes']                          = "Si";
    $lang['no']                           = "No";
    $lang['action']                       = "Acci�";
    $lang['task']                         = "Tasca";
    $lang['tasks']                        = "Tasques";
    $lang['project']                      = "Projecte";
    $lang['info']                         = "Info";
    $lang['bytes']                        = " bytes";
    $lang['select_instruct']              = "(Usar ctrl per a seleccionar m�s, o per a cap)";
    $lang['member_groups']                = "L'usuari �s membre dels grups resaltats a sota (si �s d'algun)";
    $lang['login']                        = "Login";
    $lang['error']                        = "Error";
    $lang['no_login']                     = "Acc�s denegat, identificador o contrasenya incorrectes";
//**    
    $lang['redirect_sprt']                = "You will automatically return to Login after a %d second delay";
//**
    $lang['login_now']                    = "Please click here to return to Login now";   
    $lang['please_login']                 = "Benvingut, per favor identifiqui's";
//**    
    $lang['go']                           = "Go!";

 //graphic items
    $lang['late_g']                       = "&nbsp;LATE&nbsp;";
    $lang['new_g']                        = "&nbsp;NEW&nbsp;";
    $lang['updated_g']                    = "&nbsp;UPDATED&nbsp;";

//admin config
    $lang['admin_config']                 = "Admin config";
    $lang['email_settings']               = "Email header settings";
    $lang['admin_email']                  = "Admin email";
    $lang['email_reply']                  = "Email 'reply to'";
    $lang['email_from']                   = "Email 'from'";
    $lang['mailing_list']                 = "Llista de correu";
    $lang['default_checkbox']             = "Marcar la opci� Default per a Projectes/Tasques";
    $lang['allow_globalaccess']           = "Permet acc�s global?";
    $lang['allow_group_edit']             = "Permetre a tothom del grup editar?";
    $lang['set_email_owner']              = "Sempre correu al propietari amb els canvis?";
    $lang['set_email_group']              = "Sempre correu al usergroup amb canvis?";
//**    
    $lang['project_listing_order']        = "Project listing order";
//**    
    $lang['task_listing_order']           = "Task listing order"; 
    $lang['configuration']                = "Configuraci�";

//archive
//**
    $lang['archived_projects']            = "Archived Projects";    
    
//contacts
    $lang['firstname']                    = "Nom:";
    $lang['lastname']                     = "Cognom:";
    $lang['company']                      = "Companyia:";
    $lang['home_phone']                   = "Tef. particular:";
    $lang['mobile']                       = "Cel�lular:";
    $lang['fax']                          = "Fax:";
    $lang['bus_phone']                    = "Tef. laboral:";
    $lang['address']                      = "Adre�a:";
    $lang['postal']                       = "Cod. Postal:";
    $lang['city']                         = "Ciutat:";
    $lang['email']                        = "Email:";
    $lang['notes']                        = "Notes:";
    $lang['add_contact']                  = "Afegir contacte";
    $lang['del_contact']                  = "Esborrar contacte";
    $lang['contact_info']                 = "Dades del Contacte";
    $lang['contacts']                     = "Contactes";
    $lang['contact_add_info']             = "Si afegeix el nom d'una companyia aquesta es mostrar� en comptes del usuari.";
    $lang['show_contact']                 = "Mostrar contactes";
    $lang['edit_contact']                 = "Editar contactes";
    $lang['contact_submit']               = "Contacte acceptar";
    $lang['contact_warn']                 = "No s'han introduit els valors suficients per afegir el contacte, si us plau torni enrera i afegeixi al menys nom i cognom.";

 //files
    $lang['manage_files']                 = "Manipular arxius";
    $lang['no_files']                     = "No hi ha arxius enviats per manegar.";
    $lang['no_file_uploads']              = "La configuraci� del servidor per aquest lloc web no permet poder pujar fitxers";
    $lang['file']                         = "Arxiu:";
    $lang['uploader']                     = "Uploader:";
    $lang['files_assoc_project']          = "Arxius associats amb projecte";
    $lang['files_assoc_task']             = "Arxius associats amb tasca";
    $lang['file_admin']                   = "Arxiu admin";
    $lang['add_file']                     = "Afegir arxiu";
    $lang['files']                        = "Arxius";
    $lang['file_choose']                  = "Arxiu a pujar:";
    $lang['upload']                       = "Upload";
 //**
    $lang['file_email_owner']             = "Email notification of new file to the owner?";
 //**
    $lang['file_email_usergroup']         = "Email notification of new file to the usergroup?";
    $lang['max_file_sprt']                = "L'arxiu a enviar ha de ser m�s petit que %s kb.";
    $lang['file_submit']                  = "Envia arxiu";
    $lang['no_upload']                    = "No s'ha pujat l'arxiu. Torni enrera i intenti-ho de nou.";
    $lang['file_too_big_sprt']            = "La mida m�xima permesa �s %s bytes.  El seu enviament �s massa gran i ha estat esborrat.";
    $lang['del_file_javascript_sprt']     = "Esteu segurs d\'eliminar %s ?";

 //forum
    $lang['orig_message']                 = "Missatge original:";
    $lang['post']                         = "Envia'l!";
    $lang['message']                      = "Mensaje:";
    $lang['post_reply_sprt']              = "Enviar una resposta a la nota de  '%s' sobre '%s'";
    $lang['post_message_sprt']            = "Enviar una nota a: '%s'";
 //**
    $lang['forum_email_owner']            = "Email forum message to the owner?";
 //**
    $lang['forum_email_usergroup']        = "Email forum message to the usergroup?";
    $lang['reply']                        = "Respondre";
    $lang['new_post']                     = "Nota nova";
    $lang['public_user_forum']            = "F�rum public";
    $lang['private_forum_sprt']           = "F�rum privat per al grup '%s'";
    $lang['forum_submit']                 = "F�rum acceptar";
    $lang['no_message']                   = "No hi ha missatge! Torni enrera i reintenti.";
    $lang['add_reply']                    = "Afegir resposta";
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
    $lang['report']                       = "Informe";
    $lang['warning']                      = "<h1>Disculpi!</h1><p>No �s possible processar la seva petici� ara. Si us plau reintenti-ho m�s tard...</p>";
    $lang['home_page']                    = "Principal";
    $lang['summary_page']                 = "Resum";
    $lang['todo_list']                    = "ToDo llista";
    $lang['calendar']                     = "Calendari";
    $lang['log_out']                      = "Sortir";
    $lang['main_menu']                    = "Men� principal";
    $lang['archive']                      = "Archive";   
    $lang['user_homepage_sprt']           = "Usuari: %s";
//**    
    $lang['missing_field_javascript']     = "Please enter a value for the missing field";
//**    
    $lang['invalid_date_javascript']      = "Please choose a valid calendar date";
//**    
    $lang['finish_date_javascript']       = "The entered date occurs after the project finish date!";
    $lang['security_manager']             = "Manegament de Seguretat";
    $lang['session_timeout_sprt']         = "Acc�s denegat, la �ltima acci� va ser fa %d i el temps d'expiraci� �s de %d minuts, si us plau <a href=\"%sindex.php\">Identifiqui's</a>";
    $lang['access_denied']                = "Acc�s denegat";
    $lang['private_usergroup']            = "Dispensi, aquesta �rea �s privada d'un grup i vost� no t� drets d'acc�s.";
    $lang['invalid_date']                 = "Data no v�lida";
    $lang['invalid_date_sprt']            = "La data de %s no �s una data v�lida del calendari (Comprovi el n�mero de dia i de mes), Si us plau torni enrera i insereixi una data v�lida.";

 //taskgroups
    $lang['taskgroup_name']               = "nom Taskgroup:";
    $lang['taskgroup_description']        = "Descripci� del taskgroup:";
    $lang['add_taskgroup']                = "Afegir taskgroup";
    $lang['add_new_taskgroup']            = "Afegir un nou taskgroup";
    $lang['edit_taskgroup']               = "Editar taskgroup";
    $lang['taskgroup_manage']             = "Administraci de Taskgroups";
    $lang['no_taskgroups']                = "No hi ha taskgroups definits";
    $lang['manage_taskgroups']            = "Administrar� taskgroups";
    $lang['taskgroups']                   = "Taskgroups";
    $lang['taskgroup_dup_sprt']           = "Ja existeix un traskgroup '%s'.  Seleccioni un nom diferent.";
    $lang['info_taskgroup_manage']        = "Info per l'administraci� del taskgroup";

 //usergroups
    $lang['usergroup_name']               = "nom Usergroup:";
    $lang['usergroup_description']        = "Descripci� del Usergroup:";
    $lang['members']                      = "Membres:";
 //**
    $lang['private_usergroup']            = "Private usergroup";
    $lang['add_usergroup']                = "Afegir usergroup";
    $lang['add_new_usergroup']            = "Afegir un nou usergroup";
    $lang['edit_usergroup']               = "Editar usergroup";
    $lang['usergroup_manage']             = "Administraci� de Usergroups";
    $lang['no_usergroups']                = "Cap usergroup definit";
    $lang['manage_usergroups']            = "Administraci� usergroups";
    $lang['usergroups']                   = "Usergroups";
    $lang['usergroup_dup_sprt']           = "Ja existeix un usergroup '%s'.  Seleccioni un nom diferent.";
    $lang['info_usergroup_manage']        = "Info per l'administraci� del usergroup";

 //users
    $lang['login_name']                   = "Identificador";
    $lang['full_name']                    = "Nom complert";
    $lang['password']                     = "Clau";
    $lang['blank_for_current_password']   = "(Deixi en blanc per conservar la clau actual)";
    $lang['email']                        = "E-mail";
    $lang['admin']                        = "Admin";
  //**
    $lang['private_user']                 = "Private user";
 //**
    $lang['normal_user']                  = "Normal user"; 
    $lang['is_admin']                     = "�s admin?";
 //**
    $lang['is_guest']                     = "Is a guest?";
 //**
    $lang['guest']                        = "Guest user";
    $lang['user_info']                    = "Informaci� d'usuari";
    $lang['deleted_users']                = "Usuaris eliminats";
    $lang['no_deleted_users']             = "No existeixen usuaris eliminats.";
    $lang['revive']                       = "Reviure";
    $lang['permdel']                      = "Esb.Perm";
    $lang['permdel_javascript_sprt']      = "Aquesta acci� eliminar� de forma permanent tots els registres del usuari i les tasques associades de %s. Esteu segurs de voler fer-ho?";
    $lang['add_user']                     = "Afegir usuari";
    $lang['edit_user']                    = "Editar usuari";
    $lang['no_users']                     = "No hi ha usuaris coneguts del sistema";
    $lang['users']                        = "Usuaris";
    $lang['existing_users']               = "Usuaris existents";
 //**
    $lang['private_profile']              = "This user has a private profile that cannot be viewed by you.";
    $lang['private_usergroup_profile']    = "(This user is a member of private usergroups that cannot be viewed by you)";
    $lang['email_users']                  = "Usuaris de correu";
    $lang['select_usergroup']             = "Usergroup seleccionat de sota:";
    $lang['subject']                      = "Subject:";
    $lang['message_sent_maillist']        = "Per totes les seleccions el missatge �s tamb� �s enviat a la llista de correu.";
    $lang['who_online']                   = "Qui est� connectat?";
    $lang['edit_details']                 = "Editar detalls de l'usuari";
    $lang['show_details']                 = "Mostrar detalls del usuari";
    $lang['user_deleted']                 = "Aquest usuari ha estat esborrat!";
    $lang['no_usergroup']                 = "Aquest usuari no �s membre de cap usergroup";
    $lang['not_usergroup']                = "(No �s membre d'un usergroup)";
    $lang['no_password_change']           = "(La seva clau actual NO ha canviat)";
    $lang['last_time_here']               = "Uacute;ltima vegada que se l'ha vist per aqu�:";
    $lang['number_items_created']         = "Nombre d'items creats:";
    $lang['number_projects_owned']        = "Nombre de projectes propis:";
    $lang['number_tasks_owned']           = "Nombre de tasques pr�pies:";
    $lang['number_tasks_completed']       = "Nombre de tasques completades:";
    $lang['number_forum']                 = "Nombre de notes al f�rum:";
    $lang['number_files']                 = "Nombre d'arxius carregats:";
    $lang['size_all_files']               = "Mida total dels arxius propis:";
    $lang['owned_tasks']                  = "Tasques pr�pies";
    $lang['invalid_email']                = "Adre�a mail no v�lida";
    $lang['invalid_email_given_sprt']     = "L'adre�a email '%s' no �s correcta. Si us plau, torni enrera i reintenti-ho.";
    $lang['duplicate_user']               = "Usuari duplicat";
    $lang['duplicate_change_user_sprt']   = "L'usuari '%s' ja existeix. Si us plau canvii el nom.";
    $lang['value_missing']                = "Valor no inserit";
    $lang['field_sprt']                   = "El camp per a '%s' no ha estat introduit. Torni enrera i ompli-ho.";
    $lang['admin_priv']                   = "NOTA: Li han sigut otorgats drets d'administrador.";
    $lang['manage_users']                 = "Administrar usuaris";
    $lang['users_online']                 = "Usuaris connectats";
    $lang['online']                       = "Usuaris que han entrat (Connectat als darrers 60 minuts)";
    $lang['not_online']                   = "La resta";
    $lang['user_activity']                = "Activitat d'usuari";

  //tasks
    $lang['add_new_task']                 = "Afegir nova tasca";
    $lang['priority']                     = "Prioritat";
    $lang['parent_task']                  = "Tasca mare";
    $lang['creation_time']                = "Creada a la data";
    $lang['project_name']                 = "Nomb del projecte";
    $lang['by_sprt']                      = "%1\$s per %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['task_name']                    = "Nom de la tasca";
    $lang['deadline']                     = "Data l�mit";
    $lang['taken_from_parent']            = "(Presa des de la mare)";
    $lang['status']                       = "Estat";
    $lang['task_owner']                   = "Tasca de";
    $lang['project_owner']                = "Projecte de";
    $lang['taskgroup']                    = "Taskgroup";
    $lang['usergroup']                    = "Usergroup";
    $lang['nobody']                       = "Ning�";
    $lang['none']                         = "Cap";
    $lang['no_group']                     = "Cap group";
    $lang['all_groups']                   = "Tots els grups";
    $lang['all_users']                    = "Tots els usuaris";
    $lang['all_users_view']               = "Tots els usuaris poden veure aquesta tasca?";
    $lang['group_edit']                   = "Alg� al usergroup pot editar?";
    $lang['project_description']          = "Descripci� del projecte";
    $lang['task_description']             = "Descripci� de la tasca";
    $lang['email_owner']                  = "Enviar un email al propietari amb els canvis?";
    $lang['email_new_owner']              = "Enviar un email al (nou) propietari amb els canvis?";
    $lang['email_group']                  = "Enviar un email al usergroup amb els canvis?";
    $lang['add_new_project']              = "Afegir un nou projecte";
    $lang['uncategorised']                = "Sense categoritzar";
    $lang['due_sprt']                     = "%d dies des d'ara";
    $lang['tomorrow']                     = "Dem�";
    $lang['due_today']                    = "Expira avui";
    $lang['overdue_1']                    = "Va expirar fa 1 dia";
    $lang['overdue_sprt']                 = "Expirat fa %d dies";
    $lang['edit_task']                    = "Editar la tasca";
    $lang['edit_project']                 = "Editar el projecte";
    $lang['no_reparent']                  = "Cap (�s un projecte de nivell superior)";
 //**
    $lang['del_javascript_project_sprt']  = "S\'eliminar� projecte %s. Esteu segurs?";
    $lang['del_javascript_task_sprt']     = "S\'eliminar� tasca %s. Esteu segurs?";
    $lang['add_task']                     = "Afegir tasca";
    $lang['add_subtask']                  = "Afegir sub-tasca";
    $lang['add_project']                  = "Afegir projecte";
 //**
    $lang['clone_project']                = "Clone project";
 //**
    $lang['clone_task']                   = "Clone task"; 
//**
    $lang['quick_jump']                   = "Quick Jump";
    $lang['no_edit']                      = "No �s propietari d'aquest, no pot editar-lo. Demani a un administrador, o al propietari de la tasca per a que ho faci per vost�.";
    $lang['uncategorised']                = "No categoritzat";
    $lang['admin']                        = "Admin";
    $lang['global']                       = "Global";
 //**
    $lang['delete_project']               = "Esborrar projecte";
 //**
    $lang['delete_task']                  = "Esborrar tasca";
 //**
    $lang['project_options']              = "Projecte opcions";
 //**
    $lang['task_options']                 = "Tasca opcions";
 //**
    $lang['javascript_archive_project']   = "This will archive project %s.  Are you sure?";
//**    
    $lang['archive_project']              = "Archive project";
    $lang['task_navigation']              = "Navegar tasques";
//**
    $lang['new_task']                     = "New task";    
    $lang['no_projects']                  = "No hi ha projecte per veure";
 //**
    $lang['show_all_projects']            = "Show all projects";
    $lang['show_active_projects']         = "Show only active projects";
    $lang['completed']                    = "Complert";
    $lang['project_hold_sprt']            = "Projecte susp�s des de %s";
    $lang['project_planned']              = "Projecte planejat";
    $lang['percent_sprt']                 = "%d%% de tasques fetes";
    $lang['project_no_deadline']          = "No hi ha data l�mit establerta per aquest projecte";
    $lang['no_allowed_projects']          = "Ni hi ha cap projecte que pugui veure";
    $lang['projects']                     = "Projectes";
    $lang['percent_project_sprt']         = "Aquest projecte est� %d%% complert";
    $lang['owned_by']                     = "Propietat de";
    $lang['created_on']                   = "Creat el";
    $lang['completed_on']                 = "Complert el";
    $lang['modified_on']                  = "Modificat el";
    $lang['project_on_hold']              = "Projecte est� susp�";
 //**
    $lang['project_accessible']           = "(Aquest projecte �s accessible per tots els usuaris)";
    $lang['task_accessible']              = "(Aquest tasca �s accessible per tots els usuaris)";
 //**
    $lang['project_not_accessible']       = "(Aquest projecte �s accessible pels membres del usergroup)";
    $lang['task_not_accessible']          = "(Aquest tasca �s accessible pels membres del usergroup)";
 //**
    $lang['project_not_in_usergroup']     = "Aquesta projecte no es part d'un usergroup y no �s accessible per tots els usuaris.";
    $lang['task_not_in_usergroup']        = "Aquesta tasca no es part d'un usergroup y no �s accessible per tots els usuaris.";
  //**
    $lang['usergroup_can_edit_project']   = "Aquest projecte tamb� pot ser editat pels membres del usergroup.";
    $lang['usergroup_can_edit_task']      = "Aquest tasca tamb� pot ser editat pels membres del usergroup.";
    $lang['i_take_it']                    = "L'agafo jo :)";
    $lang['i_finished']                   = "L'he acabat!";
    $lang['i_dont_want']                  = "No el vui m�s";
 //**
    $lang['take_over_project']            = "Prendre el control projecte";
    $lang['take_over_task']               = "Prendre el control tasca";
    $lang['task_info']                    = "Informaci� de Tasca";
    $lang['project_details']              = "Detalls del Projecte";
    $lang['todo_list_for']                = "llista 'per-fer' per a: ";
    $lang['due_in_sprt']                  = " (Acaba en %d dies)";
    $lang['due_tomorrow']                 = " (Acaba dem�)";
    $lang['no_assigned']                  = "No hi ha tasques incomplertes d'aquest usuari.";
    $lang['todo_list']                    = "Llista 'per-fer'";
    $lang['summary_list']                 = "Llista Resum";
    $lang['task_submit']                  = "Tasca ACCEPTAR";
    $lang['not_owner']                    = "Acc�s denegat, no �s el propietari o no t� drets suficients";
    $lang['missing_values']               = "No hi ha suficients dades inserides, torni enrera i reintenti";
    $lang['future']                       = "Futur";
    $lang['flags']                        = "Banderes";
    $lang['owner']                        = "Propietari";
    $lang['group']                        = "Grup";
    $lang['by_usergroup']                 = " (per usergroup)";
    $lang['by_taskgroup']                 = " (per taskgroup)";
    $lang['by_deadline']                  = " (per l�mit)";
    $lang['by_status']                    = " (per estat)";
    $lang['by_owner']                     = " (per propietari)";
 //**
    $lang['project_cloned']               = "Project to be cloned :";
    $lang['task_cloned']                  = "Task to be cloned :";
    $lang['note_clone']                   = "Note: The task will be cloned as a new project";

//bits 'n' pieces
    $lang['calendar']                     = "Calendari";
    $lang['normal_version']               = "Normal version";
    $lang['print_version']                = "Print version";
//**    
    $lang['condensed_view']               = "Condensed view";
//**    
    $lang['full_view']                    = "Full view";
//**
    $lang['icalendar']                    = "iCalendar";

?>