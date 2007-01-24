<?php
/*
  $Id:  $

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

  Language files for 'eo' (Esperanto)

  Translation: Paul Ebermann 

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', "UTF-8" );

//dates
$month_array = array ( NULL, "Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Aŭg", "Sep", "Okt", "Nov", "Dec" );
$week_array = array('Di','Lu','Ma','Me','Ĵa','Ve','Sa');

//task states
 //priorities
    $task_state['dontdo']                = "ne faru";
    $task_state['low']                   = "malalta";
    $task_state['normal']                = "normala";
    $task_state['high']                  = "alta";
    $task_state['yesterday']             = "hieraŭ!";
 //status
    $task_state['new']                   = "nova";
    $task_state['planned']               = "planata (ne aktiva)";
    $task_state['active']                = "aktiva (prilaborata)";
    $task_state['cantcomplete']          = "atendanta";
    $task_state['completed']             = "finita";
    $task_state['done']                  = "preta";
    $task_state['task_planned']          = " planita";
    $task_state['task_active']           = " aktiva";
 //project states
    $task_state['planned_project']       = "planata projekto (ne aktiva)";
    $task_state['no_deadline_project']   = "sen findato";
    $task_state['active_project']        = "aktiva projekto";

//common items
    $lang['description']                 = "Priskribo";
    $lang['name']                        = "Nomo";
    $lang['add']                         = "Aldonu";
    $lang['update']                      = "Aktualigu";
    $lang['submit_changes']              = "Sendu ŝanĝojn";
    $lang['continue']                    = "Daŭrigu";
    $lang['manage']                      = "Administru";
    $lang['edit']                        = "Redaktu";
    $lang['delete']                      = "Forigu";
    $lang['del']                         = "Forigi";
    $lang['confirm_del_javascript']      = "Konfirmu forigon!";
    $lang['yes']                         = "Jes";
    $lang['no']                          = "Ne";
    $lang['action']                      = "Ago";
    $lang['task']                        = "Tasko";
    $lang['tasks']                       = "Taskoj";
    $lang['project']                     = "Projekto";
    $lang['info']                        = "Informo";
    $lang['bytes']                       = " bitokoj";
    $lang['select_instruct']             = "(Uzu la kontrol-klavon por elekti plurajn erojn aŭ nenion.)";
    $lang['member_groups']               = "La uzanto estas membro de la markitaj grupoj (se ili ekzistas).";
    $lang['login']                       = "Salutu";
    $lang['login_action']                = "Saluto";
    $lang['login_screen']                = "Saluto";
    $lang['error']                       = "Eraro";
    $lang['no_login']                    = "Uzantonomo aŭ pasvorto estas malĝusta.";
    $lang['redirect_sprt']               = "Vi estos resendita al la Salut-paĝo post %d sekundoj.";
    $lang['login_now']                   = "Klaku ĉi tie por reveni al la Salutpaĝo.";
    $lang['please_login']                = "Bonvolu ensalutu";
    $lang['go']                          = "Los!";

 //graphic items
    $lang['late_g']                      = "&nbsp;MALFRUA&nbsp;";
    $lang['new_g']                       = "&nbsp;NOVA&nbsp;";
    $lang['updated_g']                   = "&nbsp;AKTUALIGITA&nbsp;";

//admin config
    $lang['admin_config']                = "Administranto-konfiguro";
    $lang['email_settings']              = "Retpoŝt-kapaj opcioj";
    $lang['admin_email']                 = "Retpoŝtadreso de administranto";
    $lang['email_reply']                 = "Retpoŝtadreso <em>Respondu al</em>";
    $lang['email_from']                  = "Retpoŝtadreso <em>De</em>";
    $lang['mailing_list']                = "Dissendolisto";
    $lang['default_checkbox']            = "Defaŭltoj de opcioj por projektoj kaj taskoj";
    $lang['allow_globalaccess']          = "Permesu globalan aliron?";
    $lang['allow_group_edit']            = "Permesu al ĉiuj membroj de la uzantgrupo la redaktadon de datoj?";
    $lang['set_email_owner']             = "Ĉu ĉiam informu la posedanton per retpoŝto pri ŝanĝoj?";
    $lang['set_email_group']             = "Ĉu informu la uzantogrupon retpoŝt pri ŝanĝoj?";
    $lang['project_listing_order']       = "Ordigu projektojn laŭ";
    $lang['task_listing_order']          = "Ordigu taskojn laŭ";
    $lang['configuration']               = "Konfiguro";

//archive
    $lang['archived_projects']           = "Arkivitaj projektoj";

 //contacts
    $lang['firstname']                   = "Persona nomo:";
    $lang['lastname']                    = "Familia nomo:";
    $lang['company']                     = "Firmao:";
    $lang['home_phone']                  = "Telefono (privata):";
    $lang['mobile']                      = "Poŝtelefono:";
    $lang['fax']                         = "Faksilo:";
    $lang['bus_phone']                   = "Telefono (labora):";
    $lang['address']                     = "Adreso:";
    $lang['postal']                      = "Poŝtkodo:";
    $lang['city']                        = "Loko:";
    $lang['email_contact']               = "Retpoŝtadreso:";
    $lang['notes']                       = "Notoj:";
    $lang['add_contact']                 = "Aldonu kontakton";
    $lang['del_contact']                 = "Forigu kontakton";
    $lang['contact_info']                = "Kontaktinformoj";
    $lang['contacts']                    = "Kontaktoj";
    $lang['contact_add_info']            = "Se estis donita 'firmao', tiu aperos anstataŭ la uzantnomo.";
    $lang['show_contact']                = "Montru kontaktojn";
    $lang['edit_contact']                = "Redaktu kontaktojn";
    $lang['contact_submit']              = "Sendu kontakton";
    $lang['contact_warn']                = "Mankas informoj por aldoni la kontakton - bonvolu doni almenaŭ la personan kaj familian nomon.";

 //files
    $lang['manage_files']                = "Administru dosirojn";
    $lang['no_files']                    = "Ne ekzistas alŝutitaj dosieroj.";
    $lang['no_file_uploads']             = "La konfiguro ne permesas alŝutojn.";
    $lang['file']                        = "Dosiero:";
    $lang['uploader']                    = "alŝutinto:";
    $lang['files_assoc_project']         = "Dosieroj ligita al tiu projekto";
    $lang['files_assoc_task']            = "Dosieroj ligitaj al tiu tasko";
    $lang['file_admin']                  = "Dosieradministranto";
    $lang['add_file']                    = "Aldonu dosieron";
    $lang['files']                       = "Dosieroj";
    $lang['file_choose']                 = "Dosiero por alŝuto:";
    $lang['upload']                      = "Alŝutu";
    $lang['file_email_owner']            = "Ĉu sendu Informan retpoŝton pri nova dosiero al la posedanto?";
    $lang['file_email_usergroup']        = "Ĉu sendu Informan retpoŝton pri nova dosiero al la uzantgrupo?";
    $lang['max_file_sprt']               = "La dosiero estu malpli granda ol %s kB.";
    $lang['file_submit']                 = "Eksendu dosieron";
    $lang['no_upload']                   = "Ne estis alŝutita dosiero - bonvolu reiri kaj reprovu.";
    $lang['file_too_big_sprt']           = "La maksimuma dosierorandeco estas %s bitokoj. Via dosiero estis tro granda kaj pro tio forigita.";
    $lang['del_file_javascript_sprt']    = "Ĉu vi vere volas forigi la dosieron %s?";


 //forum
    $lang['orig_message']                = "Origina mesaĝo:";
    $lang['post']                        = "Eksendu";
    $lang['message']                     = "Mesaĝo:";
    $lang['post_reply_sprt']             = "Sendu respondon al mesaĝo pri '%2\$s' de '%1\$s'";
    $lang['post_message_sprt']           = "Sendu mesaĝon al: '%s'";
    $lang['forum_email_owner']           = "Retpoŝtu foruman mesaĝon al posedanto?";
    $lang['forum_email_usergroup']       = "Retpoŝtu foruman mesaĝon al posedanto?";
    $lang['reply']                       = "Respondo";
    $lang['new_post']                    = "Nova mesaĝo";
    $lang['public_user_forum']           = "Publika uzanto-forumo";
    $lang['private_forum_sprt']          = "privata forumo por la grupo '%s'";
    $lang['forum_submit']                = "Eksendu mesaĝon";
    $lang['no_message']                  = "Vi forgesis la mesaĝon. Bonvolu reiri kaj reprovi.";
    $lang['add_reply']                   = "Aldonu respondon";
    $lang['last_post_sprt']              = "Lasta respondo je %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']                = "Novaj forumaj mesaĝoj";
    $lang['forum_search']                = "Traserĉu forumon";
    $lang['no_results']                  = "Ne trovis ion pri '%s'";
    $lang['search_results']              = "%1\$s trovaĵoj pri '%2\$s'<br />Montrante rezultojn %3\$s ĝis %4\$s";

 //includes
    $lang['report']                      = "Raporto";
    $lang['warning']                     = "<h1>Pardonu!</h1><p>Ni nun ne povas prilabori vian mendon, bonvolu reprovi poste.</p>";
    $lang['home_page']                   = "Enirpaĝo";
    $lang['summary_page']                = "Superrigardo";
    $lang['log_out']                     = "Elsaluto";
    $lang['main_menu']                   = "Ĉefa menuo";
    $lang['archive']                     = "Arĥivo";
    $lang['user_homepage_sprt']          = "Persona paĝo de %s";
    $lang['missing_field_javascript']    = "Bonvolu doni valoron por la malplena kampo";
    $lang['invalid_date_javascript']     = "Bonvolu elekti validan kalendaran daton";
    $lang['finish_date_javascript']      = "La dato estas post la findato de la projekto!";
    $lang['security_manager']            = "Sekurec-administrado";
    $lang['session_timeout_sprt']        = "Aliro rifuzita: Via lasta agado estis antaŭ %1\$d minutoj, kaj la sesio restas valida nur dum %2\$d minutoj sen agado. Bonvolu <a href='%3\$sindex.php'>resaluti</a>.";
    $lang['access_denied']               = "Aliro rifuzita.";
    $lang['private_usergroup_no_access'] = "Pardonu: tiu areo apartenas al privata uzantgrupo kaj vi ne havas alirrajtojn.";
    $lang['invalid_date']                = "Nevalida dato.";
    $lang['invalid_date_sprt']           = "La dato %s ne estas valida kalendara dato (kontrolu la nombro de tagoj en la monato!). Bonvolu reiri kaj korekti la daton.";


 //taskgroups
    $lang['taskgroup_name']              = "Nomo de la taskogrupo:";
    $lang['taskgroup_description']       = "Priskribo de la taskogrupo:";
    $lang['add_taskgroup']               = "Aldonu taskogrupon";
    $lang['add_new_taskgroup']           = "Aldonu novan taskogrupon";
    $lang['edit_taskgroup']              = "Redaktu taskogrupon";
    $lang['taskgroup_manage']            = "Taskogrupa administrado";
    $lang['no_taskgroups']               = "Ne ekzistas taskogrupoj.";
    $lang['manage_taskgroups']           = "Administru taskogrupojn";
    $lang['taskgroups']                  = "Taskogrupoj";
    $lang['taskgroup_dup_sprt']          = "Jam ekzistas taskogrupo '%s'. Bonvolu elekti alian nomon.";
    $lang['info_taskgroup_manage']       = "Informoj pri la taskolisto-administrado";

 //usergroups
    $lang['usergroup_name']              = "Nomo de uzantogrupo:";
    $lang['usergroup_description']       = "Priskribo de uzantogrupo:";
    $lang['members']                     = "membroj:";
    $lang['private_usergroup']           = "Privata uzantogrupo";
    $lang['add_usergroup']               = "Aldonu uzantogrupon";
    $lang['add_new_usergroup']           = "Aldonu novan uzantogrupon";
    $lang['edit_usergroup']              = "Redaktu uzantogrupon";
    $lang['usergroup_manage']            = "Uzantgrupa administrado";
    $lang['no_usergroups']               = "Ne ekzistas uzantogrupoj.";
    $lang['manage_usergroups']           = "Administru uzantogrupojn";
    $lang['usergroups']                  = "Utantogrupoj";
    $lang['usergroup_dup_sprt']          = "Jam ekzistas uzantogrupo '%s'. Bonvolu elekti alian nomon.";
    $lang['info_usergroup_manage']       = "Informoj pri la uzantogrupoj-administrado";

 //users
    $lang['login_name']                  = "Salutnomo";
    $lang['full_name']                   = "Plena nomo";
    $lang['password']                    = "Pasvorto";
    $lang['blank_for_current_password']  = "(Lasu malplena por resti je aktuala pasvorto)";
    $lang['email']                       = "Retpoŝtadreso";
    $lang['admin']                       = "Administranto";
    $lang['private_user']                = "Privata uzanto";
    $lang['normal_user']                 = "Kutima uzanto";
    $lang['is_admin']                    = "Administranto";
    $lang['is_guest']                    = "Gasto";
    $lang['guest']                       = "Gasto";
    $lang['user_info']                   = "Informoj pri la uzanto";
    $lang['deleted_users']               = "Forigitaj uzantoj";
    $lang['no_deleted_users']            = "Ne ekzistas forigitaj uzantoj.";
    $lang['revive']                      = "Revivigu";
    $lang['permdel']                     = "Forigu daŭre";
    $lang['permdel_javascript_sprt']     = "Tio forigos finfine ĉiujn informojn kaj rilatojn taskojn de la uzanto '%s'. Ĉu vi certas?";
    $lang['add_user']                    = "Aldonu uzanton";
    $lang['edit_user']                   = "Redaktu uzanton";
    $lang['no_users']                    = "La sistemo ne konas iujn uzantojn.";
    $lang['users']                       = "Uzantoj";
    $lang['existing_users']              = "Ekzistantaj uzantoj";
    $lang['private_profile']             = "Tiu uzanto havas privatan profilon, kiun vi ne rajtas rigardi.";
    $lang['private_usergroup_profile']   = "(Tiu uzanto estas membro de privata uzantgrupo, kiun vi ne rajtas rigardi.)";
    $lang['email_users']                 = "Retpoŝtu uzantojn";
    $lang['select_usergroup']            = "Elektu uzantgrupon:";
    $lang['subject']                     = "Temo:";
    $lang['message_sent_maillist']       = "Ĉiuokaze la mesaĝo ankaŭ estos sendata al la dissendolisto.";
    $lang['who_online']                  = "Kiu estas konektata?";
    $lang['edit_details']                = "Redaktu uzanto-detalojn";
    $lang['show_details']                = "Montru uzanto-detalojn";
    $lang['user_deleted']                = "Tiu uzanto estis forigita!";
    $lang['no_usergroup']                = "Tiu uzanto ne estas membro de iu uzantgrupo.";
    $lang['not_usergroup']               = "(Ne membro de iu uzantgrupo)";
    $lang['no_password_change']          = "(Via pasvorto ne ŝanĝiĝis)";
    $lang['last_time_here']              = "Lastfoje vidita ĉi tie:";
    $lang['number_items_created']        = "Nombro de kreitaj datumbazeroj:";
    $lang['number_projects_owned']       = "Nombro de posedataj projektoj:";
    $lang['number_tasks_owned']          = "Nombro de posedataj taskoj:";
    $lang['number_tasks_completed']      = "Nombro de finitaj taskoj:";
    $lang['number_forum']                = "Nombro de mesaĝoj en la forumo:";
    $lang['number_files']                = "Nombro de alŝutitaj dosieroj:";
    $lang['size_all_files']              = "Suma grandeco de ĉiuj dosieroj:";
    $lang['owned_tasks']                 = "Posedataj taskoj";
    $lang['invalid_email']               = "Nevalida retpoŝtadreso";
    $lang['invalid_email_given_sprt']    = "La retpoŝtadreso '%s' ne estas valida.Bonvolu reiri kaj reprovi.";
    $lang['duplicate_user']              = "Duobla uzanto";
    $lang['duplicate_change_user_sprt']  = "La uzanto '%s' jam ekzistas. Bonvolu elekti alian nomon.";
    $lang['value_missing']               = "Valoro mankas";
    $lang['field_sprt']                  = "Bonvolu reiri kaj plenigi la kampon '%s'.";
    $lang['admin_priv']                  = "Noto: Vi havas administrajn rajtojn.";
    $lang['manage_users']                = "Redaktu uzantojn";
    $lang['users_online']                = "Nutzer online";
    $lang['online']                      = "Lastatempe (antaŭ malpli ol 60 minutoj konektita):";
    $lang['not_online']                  = "La aliaj";
    $lang['user_activity']               = "Uzanto-aktivado";

 //tasks
    $lang['add_new_task']                = "Aldonu novan taskon";
    $lang['priority']                    = "Prioritato";
    $lang['parent_task']                 = "Gepatra tasko";
    $lang['creation_time']               = "Kreotempo";
    $lang['by_sprt']                     = "%1\$s de %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                = "Projektnomo";
    $lang['task_name']                   = "Taskonomo";
    $lang['deadline']                    = "Limdato";
    $lang['taken_from_parent']           = "(Transprenita de gepatra tasko)";
    $lang['status']                      = "Stato";
    $lang['task_owner']                  = "Posedanto";
    $lang['project_owner']               = "Posedanto de la projekto";
    $lang['taskgroup']                   = "Taskogrupo";
    $lang['usergroup']                   = "Uzantogrupo";
    $lang['nobody']                      = "Neniu";
    $lang['none']                        = "Nenio";
    $lang['no_group']                    = "Neniu grupo";
    $lang['all_groups']                  = "Ĉiuj grupoj";
    $lang['all_users']                   = "Ĉiuj uzantoj";
    $lang['all_users_view']              = "Ĉu ĉiuj uzantoj povas rigardi tiun taskon?";
    $lang['group_edit']                  = "Ĉu ĉiuj membroj de la uzantgrupo povas redakti la taskon?";
    $lang['project_description']         = "Projektpriskribo";
    $lang['task_description']            = "Taskopriskribo";
    $lang['email_owner']                 = "Ĉu sendu retmesaĝon al posedanto pri la ŝanĝoj?";
    $lang['email_new_owner']             = "Ĉu sendu retmesaĝon al (nova) posedanto pri la ŝanĝoj?";
    $lang['email_group']                 = "Ĉu sendu retmesaĝon al uzantgrupo pri la ŝanĝoj?";
    $lang['add_new_project']             = "Aldonu novan projekton";
    $lang['uncategorised']               = "Nekategorigita";
    $lang['due_sprt']                    = "Post %d tagoj";
    $lang['tomorrow']                    = "Morgaŭ";
    $lang['due_today']                   = "Ĝis hodiaŭ farenda";
    $lang['overdue_1']                   = "Ĝis hieraŭ farenda";
    $lang['overdue_sprt']                = "Ĝis antaŭ %d tagoj farenda";
    $lang['edit_task']                   = "Redaktu taskon";
    $lang['edit_project']                = "Redaktu projekton";
    $lang['no_reparent']                 = "Ne estas gepatra projekto.";
    $lang['del_javascript_project_sprt'] = "Tio forigas projekton '%s'. Ĉu vi certas?";
    $lang['del_javascript_task_sprt']    = "Tio forigas la taskon '%s'. Ĉu vi certas?";
    $lang['add_task']                    = "Aldonu taskon";
    $lang['add_subtask']                 = "Aldonu subtaskon";
    $lang['add_project']                 = "Aldonu projekton";
    $lang['clone_project']               = "Kopiu projekton";
    $lang['clone_task']                  = "Kopiu taskon";
    $lang['quick_jump']                  = "(Rapida salto)";
    $lang['no_edit']                     = "Vi ne posedas tiun enhavon kaj pro tio vi ne rajtas redakti ĝin. Demandu administranton aŭ la posedanton ŝanĝi ĝin por vi.";
    $lang['global']                      = "Globale";
    $lang['delete_project']              = "Forigu projekton";
    $lang['delete_task']                 = "Forigu taskon";
    $lang['project_options']             = "Projektaj opcioj";
    $lang['task_options']                = "Taskaj opcioj";
    $lang['javascript_archive_project']  = "Tio arĥivigos la projekton '%s'. Ĉu vi certas?";
    $lang['archive_project']             = "Arĥivigu projekton";
    $lang['task_navigation']             = "Tasko-navigado";
    $lang['new_task']                    = "Nova tasko";
    $lang['no_projects']                 = "Ne estas projektoj por rigardi.";
    $lang['show_all_projects']           = "Montru ĉiujn projektojn";
    $lang['show_active_projects']        = "montru nur aktivajn projektojn";
    $lang['completed']                   = "Finita";
    $lang['project_hold_sprt']           = "Projekto haltigita ekde %s";
    $lang['project_planned']             = "Planata projekto";
    $lang['percent_sprt']                = "%d%% de la taskoj estas faritaj";
    $lang['project_no_deadline']         = "Projekto sen limdato";
    $lang['no_allowed_projects']         = "Ne ekzistas projektoj, kiujn vi rajtas rigardi.";
    $lang['projects']                    = "Projektoj";
    $lang['percent_project_sprt']        = "Tiu projekto estas finita je %d procentoj";
    $lang['owned_by']                    = "Apartenas al";
    $lang['created_on']                  = "Kreita je";
    $lang['completed_on']                = "Finita je";
    $lang['modified_on']                 = "Ŝanĝita je";
    $lang['project_on_hold']             = "Projekto estas en atendo-stato";
    $lang['project_accessible']          = "(Tiu projekto estas publike alirebla por ĉiuj uzantoj)";
    $lang['task_accessible']             = "(Diese Aufgabe ist öffentlich zugänglich für alle Nutzer)";
    $lang['project_not_accessible']      = "(Tiu projekto estas alirebla nur por membroj de la uzantogrupo)";
    $lang['task_not_accessible']         = "(Tiu tasko estas alirebla nur por membroj de la uzantogrupo)";
    $lang['project_not_in_usergroup']    = "Tiu projekto ne apartenas al iu uzantgrupo kaj estas do alirebla por ĉiuj uzantoj.";
    $lang['task_not_in_usergroup']       = "Tiu tasko ne apartenas al iu uzantgrupo kaj estas do alirebla por ĉiuj uzantoj";
    $lang['usergroup_can_edit_project']  = "Tiu projekto ankaŭ estas redaktebla de membroj de la uzantgrupo.";
    $lang['usergroup_can_edit_task']     = "Tiu projekto ankaŭ estas redaktebla de membroj de la uzantgrupo.";
    $lang['i_take_it']                   = "Mi transprenos ĝin :-)";
    $lang['i_finished']                  = "Mi finis ĝin!";
    $lang['i_dont_want']                 = "Mi ne plu volas fari tion";
    $lang['take_over_project']           = "Transprenu projekton";
    $lang['take_over_task']              = "Transprenu taskon";
    $lang['task_info']                   = "Informoj pri la tasko";
    $lang['project_details']             = "Projektdetaloj";
    $lang['todo_list_for']               = "Taskolisto por: ";
    $lang['due_in_sprt']                 = " (Limdato post %d tagoj)";
    $lang['due_tomorrow']                = " (Limdato morgaŭ)";
    $lang['no_assigned']                 = "Ne estas nefaritaj faskoj por tiu uzanto.";
    $lang['todo_list']                   = "Taskolisto";
    $lang['summary_list']                = "Resumo";
    $lang['task_submit']                 = "Sendu taskon";
    $lang['not_owner']                   = "Aliro malpermesita. Vi aŭ ne estas la posedanto, aŭ ne havas la necesajn rajtojn.";
    $lang['missing_values']              = "Vi ne plenumis sufiĉe da kampoj. Bonvoli reiri kaj reprovi.";
    $lang['future']                      = "Estonteco";
    $lang['flags']                       = "Opcioj";
    $lang['owner']                       = "Posedanto";
    $lang['group']                       = "Grupo";
    $lang['by_usergroup']                = " (laŭ uzantgrupo)";
    $lang['by_taskgroup']                = " (laŭ taskogrupo)";
    $lang['by_deadline']                 = " (laŭ limdato)";
    $lang['by_status']                   = " (laŭ stato)";
    $lang['by_owner']                    = " (laŭ posedanto)";
    $lang['project_cloned']              = "Kopienda projekto: ";
    $lang['task_cloned']                 = "Kopienda tasko: ";
    $lang['note_clone']                  = "Rimarko: Tiu tasko aperos kiel nova projekto.";

 //bits 'n' pieces
    $lang['calendar']                    = "Kalendaro";
    $lang['normal_version']              = "Kutima versio";
    $lang['print_version']               = "Porprinta versio";
    $lang['condensed_view']              = "Mallonga versio";
    $lang['full_view']                   = "Plena versio";
    $lang['icalendar']                   = "iKalendaro";

?>