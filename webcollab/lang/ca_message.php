<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This file created 2003 by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Translation: Daniel Hernandez (dhernan2@pie.xtec.es)

  Maintainer:

*/

//required language encodings
$web_charset = "iso-8859-1";
$email_charset = "iso-8859-1";

//dates
$month_array = array ( "Gen", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dec" );
$week_array = array('Diu','Dll','Dm','Dcs','Dj','Dv','Dte');

//task states
$task_state = array(
 //priorities
 "dontdo" => "No fer",
 "low" => "Baixa",
 "normal" => "Normal",
 "high" => "Alta",
 "yesterday" => "Per AHIR!",
 //status
 "new" => "Nova",
 "planned" => "Planejada (no activa)",
 "active" => "Activa (treballant-hi)",
 "cantcomplete" => "En suspens",
 "completed" => "Completada",
 "done" => "Feta",
 "task_planned" => " Planejada",
 "task_active" => " Activa",
 //project states
 "planned_project" => "Projecte planejat (no actiu)",
 "no_deadline_project" => "Sense data limit",
 "active_project" => "Projecte actiu" );

//common items
$lang = array(
 "description" => "Descripci&oacute;",
 "name" => "Nom",
 "add" => "Afegir",
 "update" => "Actualitzar",
 "submit_changes" => "Enviar canvis",
 "continue" => "Continuar",
 "reset" => "Reset",
 "manage" => "Administrar",
 "edit" => "Editar",
 "delete" => "Esborrar",
 "del" => "Esborra",
 "confirm_del" => "Confirma esborrat!",
 "yes" => "Si",
 "no" => "No",
 "action" => "Acci&oacute;",
 "task" => "Tasca",
 //"task_lc" => "tasca",
 "tasks" => "Tasques",
 "project" => "Projecte",
 //"project_lc" => "projecte",
 "info" => "Info",
 "bytes" => " bytes",
 "select_instruct" => "(Usar ctrl per a seleccionar m&eacute;s, o per a cap)",
 "member_groups" => "L'usuari &eacute;s membre dels grups resaltats a sota (si &eacute;s d'algun)",
 "login" => "Login",
 "error" => "Error",
 "no_login" => "Acc&egrave;s denegat, identificador o contrasenya incorrectes",
 "please_login" => "Benvingut, per favor identifiqui's",

 //graphic items
 "late_g" => "&nbsp;LATE&nbsp;",
 "new_g" => "&nbsp;NEW&nbsp;",
 "updated_g" => "&nbsp;UPDATED&nbsp;",

//admin config
 "admin_config" => "Admin config",
 "email_settings" => "Email header settings",
 "admin_email" => "Admin email",
 "email_reply" => "Email 'reply to'",
 "email_from" => "Email 'from'",
 "mailing_list" => "Llista de correu",
 "default_checkbox" => "Marcar la opci&oacute; Default per a Projectes/Tasques",
 "allow_globalaccess" => "Permet acc&egrave;s global?",
 "allow_group_edit" => "Permetre a tothom del grup editar?",
 "set_email_owner" => "Sempre correu al propietari amb els canvis?",
 "set_email_group" => "Sempre correu al usergroup amb canvis?",
 "configuration" => "Configuraci&oacute;",


//contacts
 "firstname" => "Nom:",
 "lastname" => "Cognom:",
 "company" => "Companyia:",
 "home_phone" => "Tef. particular:",
 "mobile" => "Cel&middot;lular:",
 "fax" => "Fax:",
 "bus_phone" => "Tef. laboral:",
 "address" => "Adre&ccedil;a:",
 "postal" => "Cod. Postal:",
 "city" => "Ciutat:",
 "email" => "Email:",
 "notes" => "Notes:",
 "add_contact" => "Afegir contacte",
 "del_contact" => "Esborrar contacte",
 "del_javascript" => "S'esborrara el contacte. Esteu segurs?",
 "contact_info" => "Dades del Contacte",
 "contacts" => "Contactes",
 "contact_add_info" => "Si afegeix el nom d'una companyia aquesta es mostrar&agrave; en comptes del usuari.",
 "show_contact" => "Mostrar contactes",
 "edit_contact" => "Editar contactes",
 "contact_submit" => "Contacte acceptar",
 "contact_warn" => "No s'han introduit els valors suficients per afegir el contacte, si us plau torni enrera i afegeixi al menys nom i cognom.",

 //files
 "manage_files" => "Manipular arxius",
 "no_files" => "No hi ha arxius enviats per manegar.",
 "no_file_uploads" => "La configuraci&oacute; del servidor per aquest lloc web no permet poder pujar fitxers",
 "file" => "Arxiu:",
 "uploader" => "Uploader:",
 "files_assoc_project" => "Arxius associats amb projecte",
 "files_assoc_task" => "Arxius associats amb tasca",
 "file_admin" => "Arxiu admin",
 "add_file" => "Afegir arxiu",
 "files" => "Arxius",
 "file_choose" => "Arxiu a pujar:",
 "upload" => "Upload",
 "max_file_sprt" => "L'arxiu a enviar ha de ser m&eacute;s petit que %s kb.",
 "file_submit" => "Envia arxiu",
 "no_upload" => "No s'ha pujat l'arxiu. Torni enrera i intenti-ho de nou.",
 "file_too_big_sprt" => "La mida m&agrave;xima permesa &eacute;s %s bytes.  El seu enviament &eacute;s massa gran i ha estat esborrat.",
 "del_file_javascript_sprt" => "Esteu segurs d\'eliminar %s ?",


 //forum
 "orig_message" => "Missatge original:",
 "post" => "Envia'l!",
 "message" => "Mensaje:",
 "post_reply_sprt" => "Enviar una resposta a la nota de  '%s' sobre '%s'",
 "post_message_sprt" => "Enviar una nota a: '%s'",
 "reply" => "Respondre",
 "new_post" => "Nota nova",
 "public_user_forum" => "F&ograve;rum public",
 "private_forum_sprt" => "F&ograve;rum privat per al grup '%s'",
 "forum_submit" => "F&ograve;rum acceptar",
 "no_message" => "No hi ha missatge! Torni enrera i reintenti.",
 "add_reply" => "Afegir resposta",

 //includes
 "report" => "Informe",
 "warning" => "<H1>Disculpi!</H1><P>No &eacute;s possible processar la seva petici&oacute; ara. Si us plau reintenti-ho m&eacute;s tard...</P>",
 "home_page" => "Principal",
 "summary_page" => "Resum",
 "todo_list" => "ToDo llista",
 "calendar" => "Calendari",
 "log_out" => "Sortir",
 "main_menu" => "Men&uacute; principal",
 "user_homepage_sprt" => "Usuari: %s",
 "load_time_sprt" => "Aquesta p&agrave;gina ha estat %.3f segons per a carregar-se. D'aquests, %.3f segons han estat emprats en %d transaccions de la base de dades",
 "security_manager" => "Manegament de Seguretat",
 "no_key_sprt" => "Clau de sessi&oacute; NO v&agrave;lida. Si us plau <A href=\"%sindex.php\">identifiqui's</A>",
 "no_session" => "Sessi&oacute; inexistent, si us plau <A href=\"%sindex.php\">Identifiqui's</A>",
 "session_timeout_sprt" => "Acc&egrave;s denegat, la &uacute;ltima acci&oacute; va ser fa %d i el temps d'expiraci&oacute; &eacute;s de 60 minuts, si us plau <A href=\"%sindex.php\">Identifiqui's</A>",
 "ip_spoof_sprt" =>"IP Spoofejada detectada des de la seva ip (%s) aquesta sessi&oacute; ha estat esborrada per precauci&oacute;, si us plau <A href=\"%sindex.php\">torni a entrar</A>",
 "access_denied" => "Acc&eacute;s denegat",
 "private_usergroup" => "Dispensi, aquesta &agrave;rea &eacute;s privada d'un grup i vost&egrave; no t&eacute; drets d'acc&eacute;s.",
 "invalid_date" => "Data no v&agrave;lida",
 "invalid_date_sprt" => "La data de %s no &eacute;s una data v&eacute;lida del calendari (Comprovi el n&uacute;mero de dia i de mes), Si us plau torni enrera i insereixi una data v&agrave;lida.",


 //taskgroups
 "taskgroup_name" => "nom Taskgroup:",
 "taskgroup_description" => "Descripci&oacute; del taskgroup:",
 "add_taskgroup" => "Afegir taskgroup",
 "add_new_taskgroup" => "Afegir un nou taskgroup",
 "edit_taskgroup" => "Editar taskgroup",
 "taskgroup_manage" => "Administraci de Taskgroups",
 "no_taskgroups" => "No hi ha taskgroups definits",
 "manage_taskgroups" => "Administrar&oacute; taskgroups",
 "taskgroups" => "Taskgroups",
 "taskgroup_dup_sprt" => "Ja existeix un traskgroup '%s'.  Seleccioni un nom diferent.",
 "info_taskgroup_manage" => "Info per l'administraci&oacute; del taskgroup",

 //usergroups
 "usergroup_name" => "nom Usergroup:",
 "usergroup_description" => "Descripci&oacute; del Usergroup:",
 "members" => "Membres:",
 "add_usergroup" => "Afegir usergroup",
 "add_new_usergroup" => "Afegir un nou usergroup",
 "edit_usergroup" => "Editar usergroup",
 "usergroup_manage" => "Administraci&oacute; de Usergroups",
 "no_usergroups" => "Cap usergroup definit",
 "manage_usergroups" => "Administraci&oacute; usergroups",
 "usergroups" => "Usergroups",
 "usergroup_dup_sprt" => "Ja existeix un usergroup '%s'.  Seleccioni un nom diferent.",
 "info_usergroup_manage" => "Info per l'administraci&oacute; del usergroup",

 //users
 "login_name" => "Identificador",
 "full_name" => "Nom complert",
 "password" => "Clau",
 "blank_for_current_password" => "(Deixi en blanc per conservar la clau actual)",
 "email" => "E-mail",
 "admin" => "Admin",
 "is_admin" => "&Eacute;s admin?",
 "user_info" => "Informaci&oacute; d'usuari",
 "deleted_users" => "Usuaris eliminats",
 "no_deleted_users" => "No existeixen usuaris eliminats.",
 "revive" => "Reviure",
 "permdel" => "Esb.Perm",
 "permdel_javascript_sprt" => "Aquesta acci&oacute; eliminar&agrave; de forma permanent tots els registres del usuari i les tasques associades de %s. Esteu segurs de voler fer-ho?",
 "add_user" => "Afegir usuari",
 "edit_user" => "Editar usuari",
 "no_users" => "No hi ha usuaris coneguts del sistema",
 "users" => "Usuaris",
 "existing_users" => "Usuaris existents",
 "email_users" => "Usuaris de correu",
 "select_usergroup" => "Usergroup seleccionat de sota:",
 "subject" => "Subject:",
 "message_sent_maillist" => "Per totes les seleccions el missatge &eacute;s tamb&eacute; &eacute;s enviat a la llista de correu.",
 "who_online" => "Qui est&agrave; connectat?",
 "edit_details" => "Editar detalls de l'usuari",
 "show_details" => "Mostrar detalls del usuari",
 "user_deleted" => "Aquest usuari ha estat esborrat!",
 "no_usergroup" => "Aquest usuari no &eacute;s membre de cap usergroup",
 "not_usergroup"=> "(No &eacute;s membre d'un usergroup)",
 "no_password_change" => "(La seva clau actual NO ha canviat)",
 "last_time_here" => "Uacute;ltima vegada que se l'ha vist per aqu&iacute;:",
 "number_items_created" => "Nombre d'items creats:",
 "number_projects_owned" => "Nombre de projectes propis:",
 "number_tasks_owned" => "Nombre de tasques pr&ograve;pies:",
 "number_tasks_completed" => "Nombre de tasques completades:",
 "number_forum" => "Nombre de notes al f&ograve;rum:",
 "number_files" => "Nombre d'arxius carregats:",
 "size_all_files" => "Mida total dels arxius propis:",
 "owned_tasks" => "Tasques pr&ograve;pies",
 "invalid_email" => "Adre&ccedil;a mail no v&agrave;lida",
 "invalid_email_given_sprt" => "L'adre&ccedil;a email '%s' no &eacute;s correcta. Si us plau, torni enrera i reintenti-ho.",
 "duplicate_user" => "Usuari duplicat",
 "duplicate_change_user_sprt" => "L'usuari '%s' ja existeix. Si us plau canvii el nom.",
 "value_missing" => "Valor no inserit",
 "field_sprt" => "El camp per a '%s' no ha estat introduit. Torni enrera i ompli-ho.",
 "admin_priv" => "NOTA: Li han sigut otorgats drets d'administrador.",
 "manage_users" => "Administrar usuaris",
 "users_online" => "Usuaris connectats",
 "online" => "Usuaris que han entrat (Connectat als darrers 60 minuts)",
 "not_online" => "La resta",
 "user_activity" => "Activitat d'usuari",

  //tasks
 "add_new_task" => "Afegir nova tasca",
 "priority" => "Prioritat",
 "parent_task" => "Tasca mare",
 "creation_time" => "Creada a la data",
 "project_name" => "Nomb del projecte",
 "by_sprt" => "%1\$s per %2\$s", //Note to translators: context is 'Creation time: <date> by <user>'
 "task_name" => "Nom de la tasca",
 "deadline" => "Data l&iacute;mit",
 "taken_from_parent" => "(Presa des de la mare)",
 "status" => "Estat",
 "task_owner" => "Tasca de",
 "project_owner" => "Projecte de",
 "taskgroup" => "Taskgroup",
 "usergroup" => "Usergroup",
 "nobody" => "Ning&uacute;",
 "none" => "Cap",
 "no_group" => "Cap group",
 "all_groups" => "Tots els grups",
 "all_users" => "Tots els usuaris",
 "all_users_view" => "Tots els usuaris poden veure aquesta tasca?",
 "group_edit" => "Alg&uacute; al usergroup pot editar?",
 "project_description" => "Descripci&oacute; del projecte",
 "task_description" => "Descripci&oacute; de la tasca",
 "email_owner" => "Enviar un email al propietari amb els canvis?",
 "email_new_owner" => "Enviar un email al (nou) propietari amb els canvis?",
 "email_group" => "Enviar un email al usergroup amb els canvis?",
 "add_new_project" =>"Afegir un nou projecte",
 "uncategorised" => "Sense categoritzar",
 "due_sprt" => "%d dies des d'ara",
 "tomorrow" => "Dem&agrave;",
 "due_today" => "Expira avui",
 "overdue_1" => "Va expirar fa 1 dia",
 "overdue_sprt" => "Expirat fa %d dies",
 "edit_task" => "Editar la tasca",
 "edit_project" => "Editar el projecte",
 "no_reparent" => "Cap (&eacute;s un projecte de nivell superior)",
 //**
 "del_javascript_project_sprt" => "S\'eliminar&agrave; projecte %s. Esteu segurs?",
 "del_javascript_task_sprt" => "S\'eliminar&agrave; tasca %s. Esteu segurs?",
 "add_task" => "Afegir tasca",
 "add_subtask" => "Afegir sub-tasca",
 "add_project" => "Afegir projecte",
 "no_edit" => "No &eacute;s propietari d'aquest, no pot editar-lo. Demani a un administrador, o al propietari de la tasca per a que ho faci per vost&egrave;.",
 "uncategorised" => "No categoritzat",
 "admin" => "Admin",
 "global" => "Global",
 //"options" => " options",
 //**
 "delete_project" => "Esborrar projecte",
 //**
 "delete_task" => "Esborrar tasca",
 //**
 "project_options" => "Projecte opcions",
 //**
 "task_options" => "Tasca opcions",
 //
 "task_navigation" => "Navegar tasques",
 "no_projects" => "No hi ha projecte per veure",
 "completed" => "Complert",
 "project_hold_sprt" => "Projecte susp&egrave;s des de %s",
 "project_planned" => "Projecte planejat",
 "percent_sprt" => "%d%% de tasques fetes",
 "project_no_deadline" => "No hi ha data l&iacute;mit establerta per aquest projecte",
 "no_allowed_projects" => "Ni hi ha cap projecte que pugui veure",
 "projects" => "Projectes",
 "percent_project_sprt" => "Aquest projecte est&agrave; %d%% complert",
 "owned_by" => "Propietat de",
 "created_on" => "Creat el",
 "completed_on" => "Complert el",
 "modified_on" => "Modificat el",
 "project_on_hold" => "Projecte est&agrave; susp&egrave;",
 //**
 "project_accessible" => "(Aquest projecte &eacute;s accessible per tots els usuaris)",
 "task_accessible" => "(Aquest tasca &eacute;s accessible per tots els usuaris)",
 //**
 "project_not_accessible" => "(Aquest projecte &eacute;s accessible pels membres del usergroup)",
 "task_not_accessible" => "(Aquest tasca &eacute;s accessible pels membres del usergroup)",
 //**
 "project_not_in_usergroup" => "Aquesta projecte no es part d'un usergroup y no &eacute;s accessible per tots els usuaris.",
 "task_not_in_usergroup" => "Aquesta tasca no es part d'un usergroup y no &eacute;s accessible per tots els usuaris.",
  //**
 "usergroup_can_edit_project" => "Aquest projecte tamb&eacute; pot ser editat pels membres del usergroup.",
 "usergroup_can_edit_task" => "Aquest tasca tamb&eacute; pot ser editat pels membres del usergroup.",
 "i_take_it" => "L'agafo jo :)",
 "i_finished" => "L'he acabat!",
 "i_dont_want" => "No el vui m&eacute;s",
 //**
 "take_over_project" => "Prendre el control projecte",
 "take_over_task" => "Prendre el control tasca",
 "task_info" => "Informaci&oacute; de Tasca",
 "project_details" => "Detalls del Projecte",
 "todo_list_for" => "llista 'per-fer' per a: ",
 "due_in_sprt" => " (Acaba en %d dies)",
 "due_tomorrow" => " (Acaba dem&acute;)",
 "no_assigned" => "No hi ha tasques incomplertes d'aquest usuari.",
 "todo_list" => "Llista 'per-fer'",
 "summary_list" => "Llista Resum",
 "task_submit" => "Tasca ACCEPTAR",
 "not_owner" => "Acc&egrave;s denegat, no &eacute;s el propietari o no t&eacute; drets suficients",
 "missing_values" => "No hi ha suficients dades inserides, torni enrera i reintenti",
 "future" => "Futur",
 "flags" => "Banderes",
 "owner" => "Propietari",
 //"usergroupid" => "usergroupid",
 //"taskgroupid" => "taskgroupid",
 "group" => "Grup",
 "by_usergroup" => " (per usergroup)",
 "by_taskgroup" => " (per taskgroup)",


//bits 'n' pieces
  "calendar" => "Calendari" );

?>
