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

  Language files for 'es' (Spanish)

  Translation: Daniel Lujan

  Maintainer:

*/

//dates
$month_array = array ( "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" );
$week_array = array('Dom','Lun','Mar','Mie','Jue','Vie','Sab');

//task states
$task_state = array(
 //priorities
 "dontdo" => "No hacer",
 "low" => "BAja",
 "normal" => "Normal",
 "high" => "Alta",
 "yesterday" => "Para AYER!",
 //status
 "new" => "Nueva",
 "planned" => "Planeada (no activa)",
 "active" => "Activa (trabajando en ella)",
 "cantcomplete" => "En suspenso",
 "completed" => "Completada",
 "done" => "Hecha",
 "task_planned" => " Planeada",
 "task_active" => " Activa",
 //project states
 "planned_project" => "Proyecto planeado (no activo)",
 "no_deadline_project" => "Fecha l&iacute;mite no establecida",
 "active_project" => "Proyecto activo" );

//common items
$lang = array(
 "description" => "Descripci&oacute;n",
 "name" => "Nombre",
 "add" => "Agregar",
 "update" => "Actualizar",
 "submit_changes" => "Enviar cambios",
 "continue" => "Continuar",
 "reset" => "Reset",
 "manage" => "Administrar",
 "edit" => "Editar",
 "delete" => "Borrar",
 "del" => "Borra",
 "confirm_del" => "Confirma borrado!",
 "yes" => "Si",
 "no" => "No",
 "action" => "Accion",
 "task" => "Tarea",
 "task_lc" => "tarea",
 "tasks" => "Tareas",
 "project" => "Proyecto",
 "project_lc" => "proyecto",
 "info" => "Info",
 "bytes" => " bytes",
 "select_instruct" => "(Usar ctrl para seleccionar m&aacute;s, o para ninguno)",
 "member_groups" => "El usuario es miembro de los grupos resaltados debajo (si es de alguno)",
 "login" => "Login",
 "error" => "Error",
 "no_login" => "Acceso denegado, login o pass incorrectos",
 "please_login" => "Bienvenido, por favor ingrese",
 
//admin config
 "admin_config" => "Admin config",
 "email_settings" => "Email header settings", 
 "admin_email" => "Admin email",
 "email_reply" => "Email 'reply to'",
 "email_from" => "Email 'from'",
 "mailing_list" => "Mailing list",
 "default_checkbox" => "Marca el checkbox Default para Proyectos/Tareas",
 "allow_globalaccess" => "Permite acceso global?",
//**
 "allow_group_edit" => "Permitir a todo el usergroup editar?",
 "set_email_owner" => "Siempre email al propietario con los cambios?",
 "set_email_group" => "Siempre email al Grupo-usuarios con cambios?",
 "configuration" => "Configuraci&oacute;n",


//contacts
 "firstname" => "Nombre:",
 "lastname" => "Apellido:",
 "company" => "Compania:",
 "home_phone" => "TE particular:",
 "mobile" => "Celular:",
 "fax" => "Fax:",
 "bus_phone" => "TE laboral:",
 "address" => "Direccion:",
 "postal" => "Cod.Postal:",
 "city" => "Ciudad:",
 "email" => "Email:",
 "notes" => "Notas:",
 "add_contact" => "Agregar contacto",
 "del_contact" => "Eliminar contacto",
 //"del_javascript" => "Se eliminara el contacto. Esta seguro?",
 "contact_info" => "Datos del Contacto",
 "contacts" => "Contactos",
 "contact_add_info" => "If agrega el nombre de una compania esta sera mostrada en lugar del nombre del usuario.",
 "show_contact" => "Mostrar contactos",
 "edit_contact" => "Editar contactos",
 "contact_submit" => "Contacto aceptar",
 "contact_warn" => "No se ingresaron los valores suficientes para agregar el contacto, por favor vuelva para atras y agregue al menos nombre y apellido.",

 //files
 "manage_files" => "Manipular archivos",
 "no_files" => "No hay archivos enviados para manipular.",
//**
 "no_file_uploads" => "La configuraci&oacute;n de este sitio web no permite subir ficheros",
 "file" => "Archivo:",
 "uploader" => "Uploader:",
 "files_assoc_sprt" => "Archivos asociados con %s",
 "file_admin" => "Archivo admin",
 "add_file" => "Agregar archivo",
 "files" => "Archivos",
 "file_choose" => "Archivo to upload:",
 "upload" => "Upload",
 "max_file_sprt" => "El archivo a enviar debe ser menor a  %s kb.",
 "file_submit" => "File submit",
 "no_upload" => "No se envio archivo. Vuelva para atras y reintente.",
 "file_too_big_sprt" => "El tama&ntilde;o m&aacute;ximo permitido es %s bytes.  Su env&iacute;o fue demasiado grande y ha sido eliminado.",
 "del_file_javascript_sprt" => "Esta seguro de eliminar %s ?",


 //forum
 "orig_message" => "Mensaje original:",
 "post" => "Post it!",
 "message" => "Mensaje:",
 "post_reply_sprt" => "Enviar una respuesta a la nota de  '%s' acerca de '%s'",
 "post_message_sprt" => "Enviar una nota a: '%s'",
 "reply" => "Responder",
 "new_post" => "Nota nueva",
 "public_user_forum" => "Foro p&uacute;blico",
 "private_forum_sprt" => "Foro privado para el grupo '%s'",
 "forum_submit" => "Foro aceptar",
 "no_message" => "No hay mensaje! Vuelva atr&aacute;s y reintente.",
 "add_reply" => "Agregar respuesta",

 //includes
 "report" => "Reporte",
 "warning" => "<H1>Disculpe!</H1><P>No es posible procesar su requerimiento ahora. Por favor reint&eacute;ntelo m&aacute;s tarde..</P>",
 "home_page" => "Principal",
 "summary_page" => "Resumen",
 "todo_list" => "ToDo lista",
 "calendar" => "Calendario",
 "log_out" => "Salir",
 "main_menu" => "Menu principal",
 "user_homepage_sprt" => "Usuario: %s",
 "load_time_sprt" => "Esta p&aacute;gina tomo %.3f segundos para cargarse.  De estos %.3f segundos fueron usados en %d transacciones con la base de datos",
 "security_manager" => "Manejo de Seguridad",
 "no_key_sprt" => "Clave de sesi&oacute;n NO v&aacute;lida. Por favor <A href=\"%sindex.php\">Ingrese</A>",
 "no_session" => "Sesi&oacute;n inexistente, por favor <A href=\"%sindex.php\">Ingrese</A>",
 "session_timeout_sprt" => "Acceo denegado, &uacute;ltima acci&oacute;n fue %d minutos atr&aacute;s y el tiempo de expiraci&oacute;n es de 60 minutos, por favor <A href=\"%sindex.php\">Ingrese</A>",
 //"ip_spoof_sprt" =>"Spoofed ip address detected from your ip (%s) this session has been deleted as a precaution, please <A href=\"%sindex.php\">re-login</A>",
 "access_denied" => "Acceso denegado",
 "private_usergroup" => "Disculpe, esta area es privada de un grupo y ud no tiene derecho de acceso.",
 "invalid_date" => "Fecha inv&aacute;lida",
 "invalid_date_sprt" => "La fecha de %s no es una fecha calendario v&aacute;lida (Chequear el numero de d&iacute;a del mes), Por favor vuelva atr&aacute;s e ingrese un fecha v&aacute;lida.",


 //taskgroups
 "taskgroup_name" => "nombre Taskgroup:",
 "taskgroup_description" => "Taskgroup simple descripci&oacute;n:",
 "add_taskgroup" => "Agregar taskgroup",
 "add_new_taskgroup" => "Agregar un nuevo taskgroup",
 "edit_taskgroup" => "Editar taskgroup",
 "taskgroup_manage" => "Administracion de Taskgroups",
 "no_taskgroups" => "No hay taskgroups definidos",
 "manage_taskgroups" => "Administrar taskgroups",
 "taskgroups" => "Taskgroups",
 "taskgroup_dup_sprt" => "Ya existe un taskgroup '%s'.  Seleccione un nombre diferente.",
 "info_taskgroup_manage" => "Info para administraci&oacute;n de taskgroup",

 //usergroups
 "usergroup_name" => "nombre Usergroup:",
 "usergroup_description" => "Descripci&oacute;n simple del Usergroup",
 "members" => "Miembros:",
 "add_usergroup" => "Agregar usergroup",
 "add_new_usergroup" => "Agregar un nuevo usergroup",
 "edit_usergroup" => "Editar usergroup",
 "usergroup_manage" => "Administraci&oacute;n de Usergroups",
 "no_usergroups" => "No usergroups definidos",
 "manage_usergroups" => "Administraci&oacute;n usergroups",
 "usergroups" => "Usergroups",
 "usergroup_dup_sprt" => "Ya existe un usergroup '%s'.  Seleccione un nombre diferente.",
 "info_usergroup_manage" => "Info para la administraci&oacute;n de usergroup",

 //users
 "login_name" => "Login name",
 "full_name" => "Nombre completo",
 "password" => "Password",
 //**
 "blank_for_current_password" => "(D&eacute;jelo en blanco para conservar el actual)",
 "email" => "E-mail",
 "admin" => "Admin",
 "is_admin" => "Es admin?",
 "user_info" => "Info. de usuario",
 "deleted_users" => "Usuarios eliminados",
 "no_deleted_users" => "No existen usuarios eliminados.",
 "revive" => "Revive",
 "permdel" => "Permdel",
 "permdel_javascript_sprt" => "Esta acci&oacute;n eliminar de forma permanente todos los registros del usuario y tareas asociadas de %s. Est&aacute; seguro de querer hacerlo?",
 "add_user" => "Agregar usuario",
 "edit_user" => "Editar usuario",
 "no_users" => "No hay usuarios conocidos del sistema",
 "users" => "Usuarios",
 "existing_users" => "Usuarios existentes",
 "email_users" => "Usuarios de correo",
 "select_usergroup" => "Usergroup seleccionado de abajo:",
 "subject" => "Subject:",
 "message_sent_maillist" => "Para todas las selecciones el mensaje tambi&eacute;n es enviado a la lista de correo.",
 "who_online" => "Qui&eacute;n esta en-linea?",
 "edit_details" => "Editar detalles del usuario",
 "show_details" => "Mostrar detalles del usuario",
 "user_deleted" => "Este usuarios ha sido borrado!",
 "no_usergroup" => "Este usuari no es miembro de ning&uacute;n usergroups",
 "not_usergroup"=> "(No es miembro de un usergroup)",
 "no_password_change" => "(Su password actual NO ha cambiado)",
 "last_time_here" => "&Uacute;ltima vez visto por aqu&iacute;:",
 "number_items_created" => "N&uacute;mero de items creados:",
 "number_projects_owned" => "N&uacute;mero de proyectos propios:",
 "number_tasks_owned" => "N&uacute;mero de tareas propias:",
 "number_tasks_completed" => "N&uacute;mero de tareas completadas:",
 "number_forum" => "N&uacute;mero de notas en el foro:",
 "number_files" => "N&uacute;mero de archivos cargados:",
 "size_all_files" => "Tama&ntilde;o total de los archivos propios:",
 "owned_tasks" => "Tareas propias",
 "invalid_email" => "Direcci&oacute;n email inv&aacute;lida",
 "invalid_email_given_sprt" => "La direcci&oacute;n email '%s' no es v&aacute;lida. Por favor vuelva atr&aacute;s y reintente.",
 "duplicate_user" => "Usuario duplicado",
 "duplicate_change_user_sprt" => "El usuario '%s' ya existe. Por favor cambie un nombre.",
 "value_missing" => "Valor no ingresado",
 "field_sprt" => "El campo para '%s' no se ingres&oacute;. Vuelva atr&aacute;s e ingr&eacute;selo.",
 "admin_priv" => "NOTA: Le han sido otorgado derechos de administrador.",
 "manage_users" => "Administrar usuarios",
 "users_online" => "Usuarios en-linea",
 "online" => "Usuarios que han ingresado (En linea al menos los &uacute;ltimos 60 minutos)",
 "not_online" => "El resto",
 "user_activity" => "Actividad de usuario",

  //tasks
 "add_new_task" => "Agregar nueva tarea",
 "priority" => "Prioridad",
 "parent_task" => "Tarea padre",
 "creation_time" => "Creado en fecha",
 "project_name" => "Nombre del proyecto",
 "by" => " por ", //Note to translators: context is 'Creation time: <date> by <user>'
 "task_name" => "Nombre de tarea",
 "deadline" => "Fecha tope",
 "taken_from_parent" => "(Tomado desde el padre)",
 "status" => "Estado",
 "task_owner" => "Tarea de",
 "project_owner" => "Proyecto de",
 "taskgroup" => "Taskgroup",
 "usergroup" => "Usergroup",
 "nobody" => "Nadie",
 "none" => "Ninguno",
 "no_group" => "Sin grupo",
 "all_groups" => "Todos los grupos",
 "all_users" => "Todos los usuarios",
 "all_users_view" => "Todos los usuarios pueden ver esta tarea?",
 "group_edit" => "Alguien en el usergroup puede editar?",
 "project_description" => "Descripci&oacute;n del proyecto",
 "task_description" => "Descripci&oacute;n de la tarea",
 "email_owner" => "Enviar un email al propietario con los cambios?",
 "email_new_owner" => "Enviar un email al (nuevo) propietario con los cambios?",
 "email_group" => "Enviar un email al usergroup con los cambios?",
 "add_new_project" =>"Agregar un nuevo proyecto",
 "uncategorised" => "No categorizado",
 "due_sprt" => "%d d&iacute;as desde ahora",
 "tomorrow" => "Ma&ntilde;ana",
 "due_today" => "Vence hoy",
 "overdue_1" => "1 d&iacute;a vencido",
 "overdue_sprt" => "%d d&iacute;as vencido",
 "edit_task" => "Editar la Tarea",
 "edit_project" => "Editar el Proyecto",
 "no_reparent" => "Ninguno (es un proyecto de nivel superior)",
 "del_javascript_sprt" => "Se eliminar&aacute; %s %s. Est&aacute; seguro?",
 "add_task" => "Agregar Tarea",
 "add_subtask" => "Agregar sub-Tarea",
 "add_project" => "Agregar Proyecto",
 "no_edit" => "No es propietario de este, no puede editarlo. Pida a un administrador, o al propietario de la tarea para que lo haga por Ud.",
 "uncategorised" => "No categorizado",
 "admin" => "Admin",
 "global" => "Global",
 "options" => " opciones",
 "task_navigation" => "Navegar tareas",
 "no_projects" => "No hay proyecto para ver",
 "completed" => "Completado",
 "project_hold" => "Proyecto suspendido desde ",
 "project_planned" => "Proyecto planeado",
 "percent" => "% de tareas hechas",
 "project_no_deadline" => "Fecha l&iacute;mite no establecida para este proyecto",
 "no_allowed_projects" => "No hay proyecto que le esten permitidos ver",
 "projects" => "Proyectos",
 "percent_project_sprt" => "Este proyecto est&aacute; %d%% completado",
 "owned_by" => "Propiedad de",
 "created_on" => "Creado el",
 "completed_on" => "Completado el",
 "modified_on" => "Modificado el",
 "project_on_hold" => "Proyecto esta suspendido",
 "task_accessible_sprt" => "(Este %s es accesible por todos los usuarios)",
 "task_not_accessible_sprt" => "(Este %s es accesible por los miembro del usergroup)",
 "task_not_in_usergroup_sprt" => "Este %s no es parte de un usergroup y no accesible para todos los usuarios.",
 "usergroup_can_edit_sprt" => "Este %s puede ser tambi&eacute;n editado por miembro del usergroup.",
 "i_take_it" => "I'll take it :)",
 "i_finished" => "Lo finaliz&eacute;!",
 "i_dont_want" => "No lo quiero m&aacute;s",
 "take_over_sprt" => "Tomar control %s",
 "task_info" => "Informaci&oacute;n de Tarea",
 "project_details" => "Detalles de Proyecto",
 "todo_list_for" => "lista 'por-hacer' para: ",
 "due_in_sprt" => " (Vence en %d d&iacute;as)",
 "due_tomorrow" => " (Vence ma&ntilde;ana)",
 "no_assigned" => "No hay tareas incompletas para este usuario.",
 "todo_list" => "Lista 'por-hacer'",
 "summary_list" => "lista Resumen",
 "task_submit" => "Task ACEPTAR",
 "not_owner" => "Acceso denegado, no es el propietario o no tiene derechos suficientes",
 "missing_values" => "No hay suficientes datos ingresados, vuelva atr&aacute;s y reintente",
 "future" => "Futuro",
 "flags" => "Banderas",
 "owner" => "Propietario",
 "usergroupid" => "usergroupid",
 "taskgroupid" => "taskgroupid",
 "group" => "Grupo",
 "by_usergroup" => " (por usergroup)",
 "by_taskgroup" => " (por taskgroup)",


//bits 'n' pieces
  "calendar" => "Calendario",
   );

?>
