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
//**
 "no_deadline_project" => "No deadline set",
 "active_project" => "Proyecto activo" );

//common items
$lang = array(
 "description" => "Descripcion",
 "name" => "Nombre",
 "add" => "Agregar",
 "update" => "Actualizar",
 "submit_changes" => "Enviar cambios",
//**
 "reset" => "Reset",
 "manage" => "Administrar",
 "edit" => "Editar",
 "delete" => "Borrar",
 "del" => "Borra",
 "confirm_del" => "Confirma borrado!",
 "yes" => "Si",
 "no" => "No",
 "action" => "Accion",
 "task" => "tarea",
 "ttask" => "Tarea",
 "tasks" => "Tareas",
 "project" => "proyecto",
 "pproject" => "Proyecto",
 "info" => "Info",
 "bytes" => " bytes",
 "select_instruct" => "(Usar ctrl para seleccionar mas, o para ninguno)",
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
 "default_checkbox" => "Seteo Default checkbox para Proyectos/Tareas",
 "allow_globalaccess" => "Permite acceso global?",
//**
 "allow_group_edit" => "Allow all in usergroup to edit?",
 "set_email_owner" => "Siempre email al propietario con los cambios?",
 "set_email_group" => "Siempre email al Grupo-usuarios con cambios?",
 "configuration" => "Configuracion",


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
 "del_javascript" => "Se eliminara el contacto. Esta seguro?",
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
 "file_too_big_sprt" => "El tamanio maximo permitido es %s bytes.  Su enio fue demasiado grande y ha sido eliminado.",
 "del_file_javascript_sprt" => "Esta seguro de eliminar %s ?",


 //forum
 "orig_message" => "Mensaje original:",
 "post" => "Post it!",
 "message" => "Mensaje:",
 "post_reply_sprt" => "Enviar una respuesta a la nota de  '%s' acerca de '%s'",
 "post_message_sprt" => "Enviar una nota a: '%s'",
 "reply" => "Responder",
 "new_post" => "Nota nueva",
 "public_user_forum" => "Foro publico",
 "private_forum_sprt" => "Foro privado para el grupo '%s'",
 "forum_submit" => "Foro aceptar",
 "no_message" => "No hay mensaje! Vuelva atras y reintente.",
 "add_reply" => "Agregar respuesta",

 //includes
 "report" => "Reporte",
 "warning" => "<H1>Disculpe!</H1><P>No es posible procesar su requerimiento ahora. Por favor reintentelo mas tarde..</P>",
 "home_page" => "Principal",
 "summary_page" => "Resumen",
 "todo_list" => "ToDo lista",
 "calendar" => "Calendario",
 "log_out" => "Salir",
 "main_menu" => "Menu principal",
 "user_homepage_sprt" => "Usuario: %s",
 "load_time_sprt" => "Esta pagina tomo %.3f segundos para cargarse.  De estos %.3f segundos fueron usados en %d transacciones con la base de datos",
 "security_manager" => "Manejo de Seguridad",
 "no_key_sprt" => "Calve de sesion NO valida. Por favor <A href=\"%sindex.php\">Ingrese</A>",
 "no_session" => "Sesion inexistente, por favor <A href=\"%sindex.php\">Ingrese</A>",
 "session_timeout_sprt" => "Acceo denegado, ultima ccion fue %d minutos atras y el tiempo de expiracion es de 60 minutos, por favor <A href=\"%sindex.php\">Ingrese</A>",
 "ip_spoof_sprt" =>"Spoofed ip address detected from your ip (%s) this session has been deleted as a precaution, please <A href=\"%sindex.php\">re-login</A>",
 "access_denied" => "Access denied",
 "private_usergroup" => "Disculpe, esta area es privada de un grupo y ud no tiene derecho de acceso.",
 "invalid_date" => "Fecha invalida",
 "invalid_date_sprt" => "La fecha de %s no es una fecha calendario valida (Chequear el numero de dia del mes), Por favor vuelva atras e ingrese un fecha valida.",


 //taskgroups
 "taskgroup_name" => "nombre Taskgroup:",
 "taskgroup_description" => "Taskgroup simple descripcion:",
 "add_taskgroup" => "Agregar taskgroup",
 "add_new_taskgroup" => "Agregar un nuevo taskgroup",
 "edit_taskgroup" => "Editar taskgroup",
 "taskgroup_manage" => "Administracion de Taskgroups",
 "no_taskgroups" => "No hay taskgroups definidos",
 "manage_taskgroups" => "Administrar taskgroups",
 "taskgroups" => "Taskgroups",
 "taskgroup_dup_sprt" => "Ya existe un taskgroup '%s'.  Seleccione un nombre diferente.",
 "info_taskgroup_manage" => "Info para administracion de taskgroup",

 //usergroups
 "usergroup_name" => "nombre Usergroup:",
 "usergroup_description" => "Usergroup simple descripcion:",
 "members" => "Miembros:",
 "add_usergroup" => "Agregar usergroup",
 "add_new_usergroup" => "Agregar un nuevo usergroup",
 "edit_usergroup" => "Editar usergroup",
 "usergroup_manage" => "Administracion de Usergroups",
 "no_usergroups" => "No usergroups definidos",
 "manage_usergroups" => "Administracion usergroups",
 "usergroups" => "Usergroups",
 "usergroup_dup_sprt" => "Ya existe un usergroup '%s'.  Seleccione un nombre diferente.",
 "info_usergroup_manage" => "Info para la administracion de usergroup",

 //users
 "login_name" => "Login name",
 "full_name" => "Nombre completo",
 "password" => "Password",
 //**
 "blank_for_current_password" => "(Leave blank for current password)",
 "email" => "E-mail",
 "admin" => "Admin",
 "is_admin" => "Es admin?",
 "user_info" => "User information",
 "deleted_users" => "Usuarios eliminados",
 "no_deleted_users" => "No existen usuarios eliminados.",
 "revive" => "Revive",
 "permdel" => "Permdel",
 "permdel_javascript_sprt" => "Esta accion eliminar de forma permanente todos los registros del usuario y tareas asociadas de %s. Esta seguro de querer hacerlo?",
 "add_user" => "Agregar usuario",
 "edit_user" => "Editar usuario",
 "no_users" => "No hay usuarios conocidos del sistema",
 "users" => "Usuarios",
 "existing_users" => "Usuarios existentes",
 "who_online" => "Quien esta en-linea?",
 "edit_details" => "Editar detalles del usuario",
 "show_details" => "Mostrar detalles del usuario",
 "user_deleted" => "Este usuarios ha sido borrado!",
 "no_usergroup" => "The user is not a member of any usergroups",
 "not_usergroup"=> "(No es miembro de un usergroup)",
 "no_password_change" => "(Su password actual NO ha cambiado)",
 "last_time_here" => "Last time seen here:",
 "number_items_created" => "Numero de items creados:",
 "number_projects_owned" => "Numero de proyectos propios:",
 "number_tasks_owned" => "Numero de tareas propias:",
 "number_tasks_completed" => "Numero de tareas completadas:",
 "number_forum" => "Numero de notas en el foro:",
 "number_files" => "Numero de archivos cargados:",
 "size_all_files" => "Tamanio total de los archivos propios:",
 "owned_tasks" => "Tareas propias",
 "invalid_email" => "Direccion email invalida",
 "invalid_email_given_sprt" => "La direccion email '%s' no es valida. Por favor vuelva atras y reintente.",
 "duplicate_user" => "Usuario duplicado",
 "duplicate_change_user_sprt" => "El usuario '%s' ya existe. Por favor cambie un nombre.",
 "value_missing" => "Valor no ingresado",
 "field_sprt" => "El campo para '%s' no se igreso. Vuelva atras e ingreselo.",
 "admin_priv" => "NOTA: Le han sido otorgado derechos de administrador.",
 "manage_users" => "Administrar usuarios",
 "users_online" => "Usuarios en-linea",
 "online" => "Usuarios que han ingresado (En linea al menos los ultimos 60 minutos)",
 "not_online" => "El resto",
 "user_activity" => "Actividad de usuario",

  //tasks
 "add_new_task" => "Agregar nueva tarea",
 "priority" => "Prioridad",
 "parent_task" => "Tarea padre",
 "creation_time" => "Creado en fecha",
 "project_name" => "Nombre del proyecto",
 "task_name" => "Nombre de tarea",
 "deadline" => "Fecha tope",
 "taken_from_parent" => "(Tomado desde el padre)",
 "status" => "Estado",
 "task_owner" => "Tarea de",
 "project_owner" => "Proyecto de",
 "taskgroup" => "Taskgroup",
 "usergroup" => "Usergroup",
 "nobody" => "Nadie",
 "none" => "None",
 "no_group" => "No group",
 "all_groups" => "All groups",
 "all_users" => "Todos los usuarios puedn ver esta tarea?",
 //**
 "group_edit" => "Anyone in the usergroup can edit?",
 "project_description" => "Descripcion del proyecto",
 "task_description" => "Descripcion de la tarea",
 "email_owner" => "Enviar un email al propietario con los cambios?",
 "email_new_owner" => "Enviar un email al (nuevo) propietario con los cambios?",
 "email_group" => "Enviar un email al usergroup con los cambios?",
 "add_new_project" =>"Agregar un nuevo proyecto",
 "uncategorised" => "Uncategorised",
 "due_sprt" => "%d dias desde ahora",
 "tomorrow" => "Maniana",
 "due_today" => "Vence hoy",
 "overdue_1" => "1 dia vencido",
 "overdue_sprt" => "%d dias vencido",
 "edit_task" => "Editar la Tarea",
 "edit_project" => "Editar el Proyecto",
 "del_javascript_sprt" => "Se eliminara %s %s. Esta seguro?",
 "add_task" => "Agregar Tarea",
 "add_subtask" => "Agregar sub-Tarea",
 "add_project" => "Agregar Proyecto",
 "no_edit" => "No es propietario de este, no puede editarlo. Pida a un administrador, o al propietario de la tarea para que lo haga por Ud.",
 "uncategorised" => "Uncategorised",
 "admin" => "Admin",
 "global" => "Global",
 "options" => " opciones",
 "task_navigation" => "Navegar tareas",
 "no_projects" => "No hay proyecto para ver",
 "ccompleted" => "Completado",
 "project_hold" => "Proyecto suspendido desde ",
 "project_planned" => "Proyecto planeado",
 "percent" => "% de tareas hechas",
//**
 "project_no_deadline" => "No deadline set for this project",
 "no_allowed_projects" => "No hay proyecto que le esten permitidos ver",
 "projects" => "Proyectos",
 "percent_project_sprt" => "Este proyecto esta %d%% completado",
 "owned_by" => "Propiedad de",
 "created_on" => "Creado el",
 "completed_on" => "Completado el",
 "modified_on" => "Modificado el",
 "project_on_hold" => "Proyecto esta suspendido",
 "task_accessible_sprt" => "(Este %s es accesible por todos los usuarios)",
 "task_not_accessible_sprt" => "(Este %s es accesible por los miembro del usergroup)",
 "task_not_in_usergroup_sprt" => "Este %s no es parte de un usergroup y no accesible para todos los usuarios.",
//**
 "usergroup_can_edit_sprt" => "This %s can also be edited by members of the usergroup.",
 "i_take_it" => "I'll take it :)",
 "i_finished" => "Lo finalize!",
 "i_dont_want" => "No lo quiero mas",
 "take_over_sprt" => "Tomar control %s",
 "task_info" => "Informacion de Tarea",
 "project_details" => "Detalles de Proyecto",
 "todo_list_for" => "lista 'por-hacer' para: ",
 "due_in_sprt" => " (Vence en %d dias)",
 "due_tomorrow" => " (Vence maniana)",
 "no_assigned" => "No hay tareas incompletas para este usuario.",
 "todo_list" => "Lista 'por-hacer'",
 "summary_list" => "lista Resumen",
 "task_submit" => "Task ACEPTAR",
 "not_owner" => "Acceso denegado, no es el propietario o no tiene derechos suficientes",
 "missing_values" => "No hay suficientes datos ingresados, vuelva atras y reintente",
 "future" => "Futuro",
 "flags" => "Banderas",
 "owner" => "Propietario",
 "usergroupid" => "usergroupid",
 "taskgroupid" => "taskgroupid",
 "group" => "Grupo",
 "by_usergroup" => " (por usergroup)",
 "by_taskgroup" => " (por taskgroup)",


//bits 'n' pieces
  "calendar" => "Calendario" );

?>
