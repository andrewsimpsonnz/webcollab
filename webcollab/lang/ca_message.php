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
               Marc Tormo i Bochaca (mtormo at hotmail.com)

  Maintainer:

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "ca" );

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
    $task_state['no_deadline_project']    = "Sense data límit";
    $task_state['active_project']         = "Projecte actiu";

//common items
    $lang['description']                  = "Descripció";
    $lang['name']                         = "Nom";
    $lang['add']                          = "Afegir";
    $lang['update']                       = "Actualitzar";
    $lang['submit_changes']               = "Enviar canvis";
    $lang['continue']                     = "Continuar";
    $lang['manage']                       = "Administrar";
    $lang['edit']                         = "Editar";
    $lang['delete']                       = "Esborrar";
    $lang['del']                          = "Esborra";
    $lang['confirm_del_javascript']       = "Confirma esborrat!";
    $lang['yes']                          = "Si";
    $lang['no']                           = "No";
    $lang['action']                       = "Acció";
    $lang['task']                         = "Tasca";
    $lang['tasks']                        = "Tasques";
    $lang['project']                      = "Projecte";
    $lang['info']                         = "Informació";
    $lang['bytes']                        = " bytes";
    $lang['select_instruct']              = "(Usar ctrl per a seleccionar més, o per a cap)";
    $lang['member_groups']                = "L'usuari és membre dels grups ressaltats a sota (si és d'algun)";
    $lang['login']                        = "Entrada";
    $lang['login_action']                 = "Entrada";
    $lang['login_screen']                 = "Entrada";
    $lang['error']                        = "Error";
    $lang['no_login']                     = "Accés denegat, identificador o contrasenya incorrectes";
    $lang['redirect_sprt']                = "Tornareu automàticament a l'entrada després de %d segons d'espera";
    $lang['login_now']                    = "Feu clic aquí per tornar a l'entrada ara mateix";
    $lang['please_login']                 = "Benvingut, si us plau identifiqui's";
    $lang['go']                           = "Anar";

 //graphic items
    $lang['late_g']                       = "&nbsp;TARD&nbsp;";
    $lang['new_g']                        = "&nbsp;NOU&nbsp;";
    $lang['updated_g']                    = "&nbsp;ACTUALITZAT&nbsp;";

//admin config
    $lang['admin_config']                 = "Configuració d'administrador";
    $lang['email_settings']               = "Configuració de capçaleres de correu electrònic";
    $lang['admin_email']                  = "Correu d'administrador";
    $lang['email_reply']                  = "Correu 'respon a:'";
    $lang['email_from']                   = "Correu 'de'";
    $lang['mailing_list']                 = "Llista de correu";
    $lang['default_checkbox']             = "Marcar la opció 'Defecte' per a Projectes/Tasques";
    $lang['allow_globalaccess']           = "Permet accés global?";
    $lang['allow_group_edit']             = "Permetre a tothom del grup editar?";
    $lang['set_email_owner']              = "Sempre correu al propietari amb els canvis?";
    $lang['set_email_group']              = "Sempre correu al grup d'usuari amb els canvis?";
    $lang['project_listing_order']        = "Ordre de la llista de projectes";
    $lang['task_listing_order']           = "Tasques de la llista de projectes";
    $lang['configuration']                = "Configuració";

//archive
    $lang['archived_projects']            = "Projectes arxivats";

//contacts
    $lang['firstname']                    = "Nom:";
    $lang['lastname']                     = "Cognoms:";
    $lang['company']                      = "Organització:";
    $lang['home_phone']                   = "Telf. particular:";
    $lang['mobile']                       = "Mòbil:";
    $lang['fax']                          = "Fax:";
    $lang['bus_phone']                    = "Telf. laboral:";
    $lang['address']                      = "Adreça:";
    $lang['postal']                       = "Cod. Postal:";
    $lang['city']                         = "Ciutat:";
    $lang['email_contact']                = "Correu:";
    $lang['notes']                        = "Notes:";
    $lang['add_contact']                  = "Afegir contacte";
    $lang['del_contact']                  = "Esborrar contacte";
    $lang['contact_info']                 = "Dades del Contacte";
    $lang['contacts']                     = "Contactes";
    $lang['contact_add_info']             = "Si afegiu el nom d'una organització aquesta es mostrarà en lloc de l'usuari.";
    $lang['show_contact']                 = "Mostrar contactes";
    $lang['edit_contact']                 = "Editar contactes";
    $lang['contact_submit']               = "Enviar contacte";
    $lang['contact_warn']                 = "No s'han introduït els valors suficients per afegir el contacte, si us plau torni enrera i afegeixi al menys nom i cognoms.";

 //files
    $lang['manage_files']                 = "Gestionar arxius";
    $lang['no_files']                     = "No hi ha arxius enviats per gestionar.";
    $lang['no_file_uploads']              = "La configuració del servidor per aquest lloc web no permet pujar arxius";
    $lang['file']                         = "Arxiu:";
    $lang['uploader']                     = "Enviat per:";
    $lang['files_assoc_project']          = "Arxius associats amb el projecte";
    $lang['files_assoc_task']             = "Arxius associats amb la tasca";
    $lang['file_admin']                   = "Administrar arxius";
    $lang['add_file']                     = "Afegir arxiu";
    $lang['files']                        = "Arxius";
    $lang['file_choose']                  = "Arxiu a pujar:";
    $lang['upload']                       = "Pujar";
    $lang['file_email_owner']             = "Notificar per correu al propietari el nou arxiu?";
    $lang['file_email_usergroup']         = "Notificar per correu al grup d'usuaris el nou arxiu?";
    $lang['max_file_sprt']                = "L'arxiu a enviar ha de ser més petit que %s kb.";
    $lang['file_submit']                  = "Enviar l'arxiu";
    $lang['no_upload']                    = "No s'ha pujat l'arxiu. Torni enrere i proveu-ho de nou.";
    $lang['file_too_big_sprt']            = "La mida màxima permesa és %s bytes.  El seu enviament és massa gran i ha estat esborrat.";
    $lang['del_file_javascript_sprt']     = "Esteu segurs d'eliminar %s ?";

 //forum 
    $lang['orig_message']                 = "Missatge original:";
    $lang['post']                         = "Envia'l!";
    $lang['message']                      = "Missatge:";
    $lang['post_reply_sprt']              = "Enviar una resposta a la nota de  '%s' sobre '%s'";
    $lang['post_message_sprt']            = "Enviar una nota a: '%s'";
    $lang['forum_email_owner']            = "Enviar per correu el missatge del fòrum al propietari?";
    $lang['forum_email_usergroup']        = "Enviar per correu el missatge del fòrum als usuaris del grup?";
    $lang['reply']                        = "Respondre";
    $lang['new_post']                     = "Nota nova";
    $lang['public_user_forum']            = "Fòrum public";
    $lang['private_forum_sprt']           = "Fòrum privat per al grup '%s'";
    $lang['forum_submit']                 = "Enviar al fòrum";
    $lang['no_message']                   = "No hi ha missatge! Torni enrere i proveu-ho de nou.";
    $lang['add_reply']                    = "Afegir resposta";
    $lang['last_post_sprt']               = "Darrer missatge %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']                 = "Últims missatges al fòrum";
    $lang['forum_search']                 = "Cerca al fòrum";
    $lang['no_results']                   = "No s'han trobat resultats per '%s'";
    $lang['search_results']               = "Trobats %1\$s resultats per '%2\$s'<br />Mostrant %3\$s resultats de %4\$s";

 //includes
    $lang['report']                       = "Informe";
    $lang['warning']                      = "<h1>Disculpi!</h1><p>No és possible processar la seva petició ara. Si us plau reintenti-ho més tard...</p>";
    $lang['home_page']                    = "Principal";
    $lang['summary_page']                 = "Resum";
    $lang['log_out']                      = "Sortir";
    $lang['main_menu']                    = "Menú principal";
    $lang['archive']                      = "Arxiu";
    $lang['user_homepage_sprt']           = "Usuari: %s";
    $lang['missing_field_javascript']     = "Si us plau entreu un valor per el camp que falta";
    $lang['invalid_date_javascript']      = "Si us plau trieu una data vàlida";
    $lang['finish_date_javascript']       = "La data introduïda és superior a la data de finalització del projecte!";
    $lang['security_manager']             = "Gestió de seguretat";
    $lang['session_timeout_sprt']         = "Accés denegat, la última acció va ser fa %d i el temps d'expiració és de %d minuts, si us plau <a href=\"%sindex.php\">Identifiqui's</a>";
    $lang['access_denied']                = "Accés denegat";
    $lang['private_usergroup_no_access']  = "Dispensi, aquesta àrea és privada d'un grup i vostè no té drets d'accés.";
    $lang['invalid_date']                 = "Data no vàlida";
    $lang['invalid_date_sprt']            = "La data de %s no és una data vàlida del calendari (Comprovi el número de dia i de mes), Si us plau torni enrere i insereixi una data vàlida.";

 //taskgroups 
    $lang['taskgroup_name']               = "nom del grup de tasques:";
    $lang['taskgroup_description']        = "Descripció del grup de tasques:";
    $lang['add_taskgroup']                = "Afegir grup de tasques";
    $lang['add_new_taskgroup']            = "Afegir un nou grup de tasques";
    $lang['edit_taskgroup']               = "Editar grup de tasques";
    $lang['taskgroup_manage']             = "Administració dels grups de tasques";
    $lang['no_taskgroups']                = "No hi ha grups de tasques definits";
    $lang['manage_taskgroups']            = "Administració dels grups de tasques";
    $lang['taskgroups']                   = "Grups de tasques";
    $lang['taskgroup_dup_sprt']           = "Ja existeix un grup de tasques '%s'.  Seleccioni un nom diferent.";
    $lang['info_taskgroup_manage']        = "Informació per a l'administració del grup de tasques";

 //usergroups
    $lang['usergroup_name']               = "nom del grup d'usuaris:";
    $lang['usergroup_description']        = "Descripció del grup d'usuaris:";
    $lang['members']                      = "Membres:";
    $lang['private_usergroup']            = "Grup d'usuaris privat";
    $lang['add_usergroup']                = "Afegir grup d'usuaris";
    $lang['add_new_usergroup']            = "Afegir un nou grup d'usuaris";
    $lang['edit_usergroup']               = "Editar grup d'usuaris";
    $lang['email_new_usergroup']          = "Correu dels nous detalls als membres del grup d'usuaris?";
    $lang['email_edit_usergroup']         = "Correu dels canvis als membres del grup d'usuaris?";
    $lang['usergroup_manage']             = "Administració dels grups d'usuaris";
    $lang['no_usergroups']                = "Cap grup d'usuaris definit";
    $lang['manage_usergroups']            = "Administració dels grups d'usuaris";
    $lang['usergroups']                   = "Grups d'usuaris";
    $lang['usergroup_dup_sprt']           = "Ja existeix un grup d'usuaris '%s'.  Trii un nom diferent.";
    $lang['info_usergroup_manage']        = "Informació per a l'administració dels grups d'usuaris";

 //users
    $lang['login_name']                   = "Usuari";
    $lang['full_name']                    = "Nom complert";
    $lang['password']                     = "Contrasenya";
    $lang['blank_for_current_password']   = "(Deixi en blanc per conservar la clau actual)";
    $lang['email']                        = "Correu";
    $lang['admin']                        = "Administrador";
    $lang['private_user']                 = "Usuari privat";
    $lang['normal_user']                  = "Usuari normal";
    $lang['is_admin']                     = "És administrador?";
    $lang['is_guest']                     = "És invitat?";
    $lang['guest']                        = "Usuari Invitat";
    $lang['user_info']                    = "Informació d'usuari";
    $lang['deleted_users']                = "Usuaris eliminats";
    $lang['no_deleted_users']             = "No existeixen usuaris eliminats.";
    $lang['revive']                       = "Recuperar";
    $lang['permdel']                      = "Eliminar definitivament";
    $lang['permdel_javascript_sprt']      = "Aquesta acció eliminarà definitivament tots els registres del usuari i les tasques associades de %s. Esteu segurs de voler fer-ho?";
    $lang['add_user']                     = "Afegir usuari";
    $lang['edit_user']                    = "Editar usuari";
    $lang['no_users']                     = "No hi ha usuaris coneguts del sistema";
    $lang['users']                        = "Usuaris";
    $lang['existing_users']               = "Usuaris existents";
    $lang['private_profile']              = "Aquest usuari te un perfil privat i no el podeu veure.";
    $lang['private_usergroup_profile']    = "(Aquest usuari és un membre d'un grup d'usuaris privat i no el podeu veure)";
    $lang['email_users']                  = "Usuaris de correu";
    $lang['select_usergroup']             = "Seleccioni grup d'usuari:";
    $lang['subject']                      = "Assumpte:";
    $lang['message_sent_maillist']        = "Per a totes les seleccions el missatge també és enviat a la llista de correu.";
    $lang['who_online']                   = "Usuaris connectats";
    $lang['edit_details']                 = "Editar detalls de l'usuari";
    $lang['show_details']                 = "Mostrar detalls de l'usuari";
    $lang['user_deleted']                 = "Aquest usuari ha estat esborrat!";
    $lang['no_usergroup']                 = "Aquest usuari no és membre de cap grup d'usuaris";
    $lang['not_usergroup']                = "(No és membre d'un grup d'usuaris)";
    $lang['no_password_change']           = "(La seva contrasenya actual NO ha canviat)";
    $lang['last_time_here']               = "Vist per últim cop:";
    $lang['number_items_created']         = "Nombre d'ítems creats:";
    $lang['number_projects_owned']        = "Nombre de projectes propis:";
    $lang['number_tasks_owned']           = "Nombre de tasques pròpies:";
    $lang['number_tasks_completed']       = "Nombre de tasques completades:";
    $lang['number_forum']                 = "Nombre de notes al fòrum:";
    $lang['number_files']                 = "Nombre d'arxius carregats:";
    $lang['size_all_files']               = "Mida total dels arxius propis:";
    $lang['owned_tasks']                  = "Tasques pròpies";
    $lang['invalid_email']                = "Adreça de correu no vàlida";
    $lang['invalid_email_given_sprt']     = "L'adreça de correu '%s' no és correcta. Si us plau, torni enrera i reintenti-ho.";
    $lang['duplicate_user']               = "Usuari duplicat";
    $lang['duplicate_change_user_sprt']   = "L'usuari '%s' ja existeix. Si us plau canvii el nom.";
    $lang['value_missing']                = "Valor no inserit";
    $lang['field_sprt']                   = "El camp per a '%s' no ha estat introduït. Torni enrere i ompli-ho.";
    $lang['admin_priv']                   = "NOTA: Se li han atorgat drets d'administrador.";
    $lang['manage_users']                 = "Administrar usuaris";
    $lang['users_online']                 = "Usuaris connectats";
    $lang['online']                       = "Usuaris que han entrat (Connectats durant els darrers 60 minuts)";
    $lang['not_online']                   = "La resta";
    $lang['user_activity']                = "Activitat d'usuari";

  //tasks    
    $lang['add_new_task']                 = "Afegir nova tasca";
    $lang['priority']                     = "Prioritat";
    $lang['parent_task']                  = "Tasca mare";
    $lang['creation_time']                = "Creada en data";
    $lang['project_name']                 = "Nom del projecte";
    $lang['by_sprt']                      = "%1\$s per %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['task_name']                    = "Nom de la tasca";
    $lang['deadline']                     = "Data límit";
    $lang['taken_from_parent']            = "(Presa des de la mare)";
    $lang['status']                       = "Estat";
    $lang['task_owner']                   = "Tasca de";
    $lang['project_owner']                = "Projecte de";
    $lang['taskgroup']                    = "Grup de tasques";
    $lang['usergroup']                    = "Grup d'usuaris";
    $lang['nobody']                       = "Ningú";
    $lang['none']                         = "Cap";
    $lang['no_group']                     = "Sense grup";
    $lang['all_groups']                   = "Tots els grups";
    $lang['all_users']                    = "Tots els usuaris";
    $lang['all_users_view']               = "Tots els usuaris poden veure aquesta tasca?";
    $lang['group_edit']                   = "Algú al grup d'usuaris pot editar?";
    $lang['project_description']          = "Descripció del projecte";
    $lang['task_description']             = "Descripció de la tasca";
    $lang['email_owner']                  = "Enviar un correu al propietari amb els canvis?";
    $lang['email_new_owner']              = "Enviar un correu al (nou) propietari amb els canvis?";
    $lang['email_group']                  = "Enviar un correu al grup d'usuaris amb els canvis?";
    $lang['add_new_project']              = "Afegir un nou projecte";
    $lang['uncategorised']                = "Sense categoritzar";
    $lang['due_sprt']                     = "%d dies des d'ara";
    $lang['tomorrow']                     = "Demà";
    $lang['due_today']                    = "Expira avui";
    $lang['overdue_1']                    = "Va expirar fa 1 dia";
    $lang['overdue_sprt']                 = "Expirat fa %d dies";
    $lang['edit_task']                    = "Editar la tasca";
    $lang['edit_project']                 = "Editar el projecte";
    $lang['no_reparent']                  = "Cap (és un projecte de nivell superior)";
    $lang['del_javascript_project_sprt']  = "S'eliminarà el projecte %s. N'esteu segurs?";
    $lang['del_javascript_task_sprt']     = "S'eliminarà la tasca %s. N'esteu segurs?";
    $lang['add_task']                     = "Afegir tasca";
    $lang['add_subtask']                  = "Afegir subtasca";
    $lang['add_project']                  = "Afegir projecte";
    $lang['clone_project']                = "Clonar projecte";
    $lang['clone_task']                   = "Clonar tasca";
    $lang['quick_jump']                   = "Selecció ràpida";
    $lang['no_edit']                      = "No és propietari d'aquest, no pot editar-lo. Demani a un administrador, o al propietari de la tasca per a que ho faci per vostè.";
    $lang['global']                       = "Global";
    $lang['delete_project']               = "Esborrar projecte";
    $lang['delete_task']                  = "Esborrar tasca";
    $lang['project_options']              = "Opcions de projecte";
    $lang['task_options']                 = "Opcions de tasca";
    $lang['javascript_archive_project']   = "Això arxivarà el projecte %s. N'esteu segurs?";
    $lang['archive_project']              = "Arxivar projecte";
    $lang['task_navigation']              = "Navegar per les tasques";
    $lang['new_task']                     = "Nova tasca";
    $lang['no_projects']                  = "No hi ha projecte per veure";
    $lang['show_all_projects']            = "Mostrar tots els projectes";
    $lang['show_active_projects']         = "Mostrar els projectes actius";
    $lang['completed']                    = "Complert";
    $lang['project_hold_sprt']            = "Projecte suspès des de %s";
    $lang['project_planned']              = "Projecte planejat";
    $lang['percent_sprt']                 = "%d%% de tasques fetes";
    $lang['project_no_deadline']          = "No hi ha data límit establerta per aquest projecte";
    $lang['no_allowed_projects']          = "Ni hi ha cap projecte que pugui veure";
    $lang['projects']                     = "Projectes";
    $lang['percent_project_sprt']         = "Aquest projecte està %d%% complert";
    $lang['owned_by']                     = "Propietat de";
    $lang['created_on']                   = "Creat el";
    $lang['completed_on']                 = "Complert el";
    $lang['modified_on']                  = "Modificat el";
    $lang['project_on_hold']              = "El projecte està suspès";
    $lang['project_accessible']           = "(Aquest projecte és accessible per a tots els usuaris)";
    $lang['task_accessible']              = "(Aquest tasca és accessible per a tots els usuaris)";
    $lang['project_not_accessible']       = "(Aquest projecte és accessible pels membres del grup d'usuaris)";
    $lang['task_not_accessible']          = "(Aquest tasca és accessible pels membres del grup d'usuaris)";
    $lang['project_not_in_usergroup']     = "Aquest projecte no és part d'un grup d'usuaris i no és accessible per a tots els usuaris.";
    $lang['task_not_in_usergroup']        = "Aquesta tasca no és part d'un grup d'usuaris i no és accessible per a tots els usuaris.";
    $lang['usergroup_can_edit_project']   = "Aquest projecte també pot ser editat pels membres del grup d'usuaris.";
    $lang['usergroup_can_edit_task']      = "Aquest tasca també pot ser editada pels membres del grup d'usuaris.";
    $lang['i_take_it']                    = "L'agafo jo :)";
    $lang['i_finished']                   = "L'he acabat!";
    $lang['i_dont_want']                  = "No el vull més";
    $lang['take_over_project']            = "Prendre el control projecte";
    $lang['take_over_task']               = "Prendre el control tasca";
    $lang['task_info']                    = "Informació de la tasca";
    $lang['project_details']              = "Detalls del Projecte";
    $lang['todo_list_for']                = "llista 'a fer' per a: ";
    $lang['due_in_sprt']                  = " (Acaba en %d dies)";
    $lang['due_tomorrow']                 = " (Acaba demà)";
    $lang['no_assigned']                  = "No hi ha tasques incomplertes d'aquest usuari.";
    $lang['todo_list']                    = "Llista 'a fer'";
    $lang['summary_list']                 = "Llista Resum";
    $lang['task_submit']                  = "ACCEPTAR Tasca";
    $lang['not_owner']                    = "Accés denegat, no sou el propietari o no té drets suficients";
    $lang['missing_values']               = "No hi ha suficients dades, torni enrere i proveu-ho de nou.";
    $lang['future']                       = "Futur";
    $lang['flags']                        = "Banderes";
    $lang['owner']                        = "Propietari";
    $lang['group']                        = "Grup";
    $lang['by_usergroup']                 = " (per grups d'usuaris)";
    $lang['by_taskgroup']                 = " (per grups de tasques)";
    $lang['by_deadline']                  = " (per data límit)";
    $lang['by_status']                    = " (per estat)";
    $lang['by_owner']                     = " (per propietari)";
    $lang['by_priority']                  = " (per prioritat)";
    $lang['project_cloned']               = "Projecte per clonar :";
    $lang['task_cloned']                  = "Tasca per clonar :";
    $lang['note_clone']                   = "Nota: La tasca serà clonada com un nou projecte";

//bits 'n' pieces
    $lang['calendar']                     = "Calendari";
    $lang['normal_version']               = "Versió normal";
    $lang['print_version']                = "Versió per imprimir";
    $lang['condensed_view']               = "Vista senzilla";
    $lang['full_view']                    = "Vista complerta";
    $lang['icalendar']                    = "iCalendari";
    $lang['url_javascript']               = "Introduïu l'adreça URL:";
    $lang['image_url_javascript']         = "Introduïu l'adreça URL de la imatge:";

?>