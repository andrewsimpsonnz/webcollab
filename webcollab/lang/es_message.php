<?php /*
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
Language files for 'es' (Spanish)
Translation: Original de Daniel Lujan actualizado por Alberto Vizcaíno (www.alvizlo.es)
Maintainer:
NOTE: This file is written in UTF-8 character set
*/
//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "es" );

//dates
$month_array = array ( NULL, "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" );
$week_array = array('Dom','Lun','Mar','Mie','Jue','Vie','Sab');
//task states
//priorities
$task_state['dontdo'] = "No hacer";
$task_state['low'] = "Baja";
$task_state['normal'] = "Normal";
$task_state['high'] = "Alta";
$task_state['yesterday'] = "Para AYER";
//status
$task_state['new'] = "Nueva";
$task_state['planned'] = "Planeada (no activa)";
$task_state['active'] = "Activa (trabajando en ella)";
$task_state['cantcomplete'] = "En suspenso";
$task_state['completed'] = "Completada";
$task_state['done'] = "Hecha";
$task_state['task_planned'] = " Planeada";
$task_state['task_active'] = " Activa";
//project states
$task_state['planned_project'] = "Proyecto planeado (no activo)";
$task_state['no_deadline_project'] = "Fecha límite no establecida";
$task_state['active_project'] = "Proyecto activo";
//common items
$lang['description'] = "Descripción";
$lang['name'] = "Nombre";
$lang['add'] = "Agregar";
$lang['update'] = "Actualizar";
$lang['submit_changes'] = "Enviar cambios";
$lang['continue'] = "Continuar";
$lang['manage'] = "Gestionar";
$lang['edit'] = "Editar";
$lang['delete'] = "Borrar";
$lang['del'] = "Borrar";
$lang['confirm_del_javascript'] = "Confirma borrado!";
$lang['yes'] = "Si";
$lang['no'] = "No";
$lang['action'] = "Acción";
$lang['task'] = "Tarea";
$lang['tasks'] = "Tareas";
$lang['project'] = "Proyecto";
$lang['info'] = "Info";
$lang['bytes'] = " bytes";
$lang['select_instruct'] = "(Usar ctrl para seleccionar más, o para ninguno)";
$lang['member_groups'] = "El usuario es miembro de los grupos resaltados debajo (si es de alguno)";
$lang['login'] = "Usuario";
$lang['login_action'] = "entrar";
$lang['login_screen'] = "Identificación";
$lang['error'] = "Error";
$lang['no_login'] = "Acceso denegado, usuario o clave incorrectos";
$lang['redirect_sprt'] = "Volverá a la ventana de identificación en %d segundos";
$lang['login_now'] = "Pulse aquí para identificarse ahora";
$lang['please_login'] = "Bienvenido, por favor identifíquese";
$lang['go'] = "Ir a";
//graphic items
$lang['late_g'] = "&nbsp;TARDE&nbsp;";
$lang['new_g'] = "&nbsp;NUEVO&nbsp;";
$lang['updated_g'] = "&nbsp;ACTUALIZADO&nbsp;";
//admin config
$lang['admin_config'] = "Administrador";
$lang['email_settings'] = "Configuración email administración";
$lang['admin_email'] = "email administración";
$lang['email_reply'] = "Email 'responder a'";
$lang['email_from'] = "Email 'de'";
$lang['mailing_list'] = "Lista de correo";
$lang['default_checkbox'] = "Marca la opción predeterminada para Proyectos/Tareas";
$lang['allow_globalaccess'] = "Permite acceso global?";
$lang['allow_group_edit'] = "Permitir editar a todo el grupo de usuarios?";
$lang['set_email_owner'] = "Enviar siempre email al propietario con los cambios?";
$lang['set_email_group'] = "Enviar siempre email al grupo de usuarios con los cambios?";
$lang['project_listing_order'] = "Orden lista de proyectos";
$lang['task_listing_order'] = "Orden lista de tareas";
$lang['configuration'] = "Configuración";
//archive
$lang['archived_projects'] = "Proyectos Archivados";
//contacts
$lang['firstname'] = "Nombre:";
$lang['lastname'] = "Apellido:";
$lang['company'] = "Organización:";
$lang['home_phone'] = "Tlf particular:";
$lang['mobile'] = "Tlf móvil:";
$lang['fax'] = "Fax:";
$lang['bus_phone'] = "Tlf laboral:";
$lang['address'] = "Dirección:";
$lang['postal'] = "Cod.Postal:";
$lang['city'] = "Ciudad:";
$lang['email_contact'] = "Email:";
$lang['notes'] = "Notas:";
$lang['add_contact'] = "Agregar contacto";
$lang['del_contact'] = "Eliminar contacto";
$lang['contact_info'] = "Datos del Contacto";
$lang['contacts'] = "Contactos";
$lang['contact_add_info'] = "Si agrega el nombre de una organización se mostrará en lugar del nombre del usuario.";
$lang['show_contact'] = "Mostrar contactos";
$lang['edit_contact'] = "Editar contactos";
$lang['contact_submit'] = "Enviar contacto";
$lang['contact_warn'] = "No se introdujeron datos suficientes para crear el contacto, por favor vuelva y escriba, al menos, nombre y apellido.";
//files
$lang['manage_files'] = "Gestionar archivos";
$lang['no_files'] = "No hay archivos enviados para gestionar.";
$lang['no_file_uploads'] = "La configuración de este sitio web no permite subir ficheros";
$lang['file'] = "Archivo:";
$lang['uploader'] = "Enviado por:";
$lang['files_assoc_project'] = "Archivos asociados al proyecto";
$lang['files_assoc_task'] = "Archivos asociados a la tarea";
$lang['file_admin'] = "Administrar Archivos";
$lang['add_file'] = "Agregar archivo";
$lang['files'] = "Archivos";
$lang['file_choose'] = "Archivo para cargar:";
$lang['upload'] = "Enviar";
$lang['file_email_owner'] = "Notificar archivo nuevo al dueño?";
$lang['file_email_usergroup'] = "Notificar archivo nuevo al grupo de usuarios?";
$lang['max_file_sprt'] = "El archivo a enviar debe ser menor a %s kb.";
$lang['file_submit'] = "Enviar archivo";
$lang['no_upload'] = "Archivo no enviado. Vuelva a intentarlo.";
$lang['file_too_big_sprt'] = "El tamaño máximo permitido es %s bytes. Su envío fue demasiado grande y ha sido eliminado.";
$lang['del_file_javascript_sprt'] = "Esta seguro de eliminar %s ?";
//forum
$lang['orig_message'] = "Mensaje original:";
$lang['post'] = "Publicar";
$lang['message'] = "Mensaje:";
$lang['post_reply_sprt'] = "Enviar una respuesta a la nota de '%s' acerca de '%s'";
$lang['post_message_sprt'] = "Enviar una nota a: '%s'";
$lang['forum_email_owner'] = "Enviar mensaje nuevo al dueño?";
$lang['forum_email_usergroup'] = "Enviar mensaje nuevo al grupo de usuarios?";
$lang['reply'] = "Responder";
$lang['new_post'] = "Nuevo mensaje";
$lang['public_user_forum'] = "Foro público";
$lang['private_forum_sprt'] = "Foro privado para el grupo '%s'";
$lang['forum_submit'] = "Enviar al foro";
$lang['no_message'] = "No hay mensaje! Vuelva atrás a intentarlo.";
$lang['add_reply'] = "Agregar respuesta";
$lang['last_post_sprt'] = "Ultimo mensaje %s"; //Note to translators: context is 'Last post 2004-Dec-22'
$lang['recent_posts'] = "Mensajes recientes";
$lang['forum_search'] = "Buscar en el foro";
$lang['no_results'] = "No se encuentra '%s'";
$lang['search_results'] = "Encontrados %1\$s resultados para '%2\$s'<br />Mostrando %3\$s resultados de %4\$s";
//includes
$lang['report'] = "Informe";
$lang['warning'] = "<h1>Disculpe!</h1><p>No es posible procesar su solicitud ahora. Por favor inténtelo más tarde.</p>";
$lang['home_page'] = "Principal";
$lang['summary_page'] = "Resumen";
$lang['log_out'] = "Salir";
$lang['main_menu'] = "Menu principal";
$lang['archive'] = "Archivo";
$lang['user_homepage_sprt'] = "Usuario: %s";
$lang['missing_field_javascript'] = "Indique un valor para el dato nulo";
$lang['invalid_date_javascript'] = "Elija una fecha valida";
$lang['finish_date_javascript'] = "La fecha es posterior a la finalización del proyecto";
$lang['security_manager'] = "Gestión de Seguridad";
$lang['session_timeout_sprt'] = "Acceo denegado, última acción fue hace %d minutos la sesión caduca en %d minutos, por favor <a href=\"%sindex.php\">identifíquese</a>";
$lang['access_denied'] = "Acceso denegado";
$lang['private_usergroup_no_access'] = "Disculpe, esta área es privada de un grupo y no tiene permiso de acceso.";
$lang['invalid_date'] = "Fecha no válida";
$lang['invalid_date_sprt'] = "La fecha de %s no es una fecha calendario válida (Comprobar el numero de día del mes), Por favor vuelva atrás e ingrese un fecha válida.";
//taskgroups
$lang['taskgroup_name'] = "nombre del grupo de tareas:";
$lang['taskgroup_description'] = "describir el grupo de tareas:";
$lang['add_taskgroup'] = "Agregar grupo de tareas";
$lang['add_new_taskgroup'] = "Agregar un nuevo grupo de tareas";
$lang['edit_taskgroup'] = "Editar grupo de tareas";
$lang['taskgroup_manage'] = "Gestión del grupo de tareas";
$lang['no_taskgroups'] = "No hay grupos de tareas definidos";
$lang['manage_taskgroups'] = "Gestionar grupos de tareas";
$lang['taskgroups'] = "Grupos de Tareas";
$lang['taskgroup_dup_sprt'] = "Ya existe un grupo de tareas '%s'. Seleccione un nombre diferente.";
$lang['info_taskgroup_manage'] = "Info para administración de grupos de tareas";
//usergroups
$lang['usergroup_name'] = "nombre del grupo de usuarios:";
$lang['usergroup_description'] = "describir el grupo de usuarios";
$lang['members'] = "Miembros:";
$lang['private_usergroup'] = "grupo de usuarios privado";
$lang['add_usergroup'] = "Agregar grupo de usuarios";
$lang['add_new_usergroup'] = "Agregar un nuevo grupo de usuarios";
$lang['edit_usergroup'] = "Editar grupo de usuarios";
//** needs translation
$lang['email_new_usergroup'] = "Email new details to usergroup members?";
$lang['email_edit_usergroup'] = "Email the changes to usergroup members?";
$lang['usergroup_manage'] = "Administración de grupos de usuarios";
$lang['no_usergroups'] = "No se han creado grupos de usuarios";
$lang['manage_usergroups'] = "Administración grupo de usuarios";
$lang['usergroups'] = "Grupos de Usuarios";
$lang['usergroup_dup_sprt'] = "Ya existe un grupo de usuarios '%s'. Seleccione un nombre diferente.";
$lang['info_usergroup_manage'] = "Info para la administración de grupos de usuarios";
//users
$lang['login_name'] = "Usuario";
$lang['full_name'] = "Nombre completo";
$lang['password'] = "Clave";
$lang['blank_for_current_password'] = "(Déjelo en blanco para conservar actual)";
$lang['email'] = "E-mail";
$lang['admin'] = "Administrador";
$lang['private_user'] = "Usuario privado?";
$lang['normal_user'] = "Usuario?";
$lang['is_admin'] = "Administrador?";
$lang['is_guest'] = "Invitado?";
$lang['guest'] = "Invitado";
$lang['user_info'] = "Info. de usuario";
$lang['deleted_users'] = "Usuarios eliminados";
$lang['no_deleted_users'] = "No existen usuarios eliminados.";
$lang['revive'] = "Recuperar";
$lang['permdel'] = "Baja total";
$lang['permdel_javascript_sprt'] = "Esta acción elimina de forma permanente todos los registros del usuario y tareas asociadas de %s. Está seguro?";
$lang['add_user'] = "Agregar usuario";
$lang['edit_user'] = "Editar usuario";
$lang['no_users'] = "No hay usuarios en el sistema";
$lang['users'] = "Usuarios";
$lang['existing_users'] = "Usuarios existentes";
$lang['private_profile'] = "Usuario con perfil privado.";
$lang['private_usergroup_profile'] = "(Usuario miembro de grupos privados)";
$lang['email_users'] = "Usuarios de correo";
$lang['select_usergroup'] = "Seleccione grupo de usuarios:";
$lang['subject'] = "Asunto:";
$lang['message_sent_maillist'] = "Para todas las selecciones el mensaje también es enviado a la lista de correo.";
$lang['who_online'] = "Quién esta en-linea?";
$lang['edit_details'] = "Editar detalles del usuario";
$lang['show_details'] = "Mostrar detalles del usuario";
$lang['user_deleted'] = "Este usuarios ha sido borrado!";
$lang['no_usergroup'] = "Este usuario no es miembro de ningún grupo de usuarios";
$lang['not_usergroup'] = "(no forma parte de un grupo de usuarios)";
$lang['no_password_change'] = "(Su clave actual NO ha cambiado)";
$lang['last_time_here'] = "última vez visto por aquí:";
$lang['number_items_created'] = "Número de items creados:";
$lang['number_projects_owned'] = "Número de proyectos propios:";
$lang['number_tasks_owned'] = "Número de tareas propias:";
$lang['number_tasks_completed'] = "Número de tareas completadas:";
$lang['number_forum'] = "Número de notas en el foro:";
$lang['number_files'] = "Número de archivos cargados:";
$lang['size_all_files'] = "Tamaño total de los archivos propios:";
$lang['owned_tasks'] = "Tareas propias";
$lang['invalid_email'] = "Dirección email inválida";
$lang['invalid_email_given_sprt'] = "La dirección email '%s' no es válida. Por favor vuelva atrás y reintente.";
$lang['duplicate_user'] = "Usuario duplicado";
$lang['duplicate_change_user_sprt'] = "El usuario '%s' ya existe. Por favor cambie un nombre.";
$lang['value_missing'] = "Valor no ingresado";
$lang['field_sprt'] = "El campo para '%s' no se ingresó. Vuelva atrás e ingréselo.";
$lang['admin_priv'] = "NOTA: Le han sido otorgado derechos de administrador.";
$lang['manage_users'] = "Administrar usuarios";
$lang['users_online'] = "Usuarios en-linea";
$lang['online'] = "Usuarios conectados (al menos los últimos 60 minutos)";
$lang['not_online'] = "El resto";
$lang['user_activity'] = "Actividad de usuario";
//tasks
$lang['add_new_task'] = "Agregar nueva tarea";
$lang['priority'] = "Prioridad";
$lang['parent_task'] = "Tarea padre";
$lang['creation_time'] = "Creado en fecha";
$lang['by_sprt'] = "%1\$s por %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
$lang['project_name'] = "Nombre del proyecto";
$lang['task_name'] = "Nombre de tarea";
$lang['deadline'] = "Fecha tope";
$lang['taken_from_parent'] = "(Tomado desde el padre)";
$lang['status'] = "Estado";
$lang['task_owner'] = "Tarea de";
$lang['project_owner'] = "Proyecto de";
$lang['taskgroup'] = "Grupo de tareas";
$lang['usergroup'] = "Grupo de usuarios";
$lang['nobody'] = "Nadie";
$lang['none'] = "Ninguno";
$lang['no_group'] = "Sin grupo";
$lang['all_groups'] = "Todos los grupos";
$lang['all_users'] = "Todos los usuarios";
$lang['all_users_view'] = "Abierto a todos los usuarios?";
$lang['group_edit'] = "Cualquier miembro del grupo puede editar?";
$lang['project_description'] = "Descripción del proyecto";
$lang['task_description'] = "Descripción de la tarea";
$lang['email_owner'] = "Enviar un email al propietario con los cambios?";
$lang['email_new_owner'] = "Enviar un email al (nuevo) propietario con los cambios?";
$lang['email_group'] = "Enviar un email al grupo de usuarios con los
cambios?";
$lang['add_new_project'] = "Agregar un nuevo proyecto";
$lang['uncategorised'] = "Sin categoría";
$lang['due_sprt'] = "%d días desde ahora";
$lang['tomorrow'] = "Mañana";
$lang['due_today'] = "Vence hoy";
$lang['overdue_1'] = "1 día vencido";
$lang['overdue_sprt'] = "%d días vencido";
$lang['edit_task'] = "Editar la Tarea";
$lang['edit_project'] = "Editar el Proyecto";
$lang['no_reparent'] = "Ninguno (es un proyecto de nivel superior)";
$lang['del_javascript_project_sprt'] = "Se eliminará Tarea %s. Está seguro?";
$lang['del_javascript_task_sprt'] = "Se eliminará Proyecto %s. Está seguro?";
$lang['add_task'] = "Agregar Tarea";
$lang['add_subtask'] = "Agregar sub-Tarea";
$lang['add_project'] = "Agregar Proyecto";
$lang['clone_project'] = "Duplicar proyecto";
$lang['clone_task'] = "Duplicar tarea";
$lang['quick_jump'] = "Seleccion rapida";
$lang['no_edit'] = "No es propietario, no puede editar. Pida a un administrador, o al propietario de la tarea para que lo haga por Ud.";
$lang['global'] = "Global";
$lang['delete_project'] = "Borrar Proyecto";
$lang['delete_task'] = "Borrar Tarea";
$lang['project_options'] = "Opciones de Proyecto";
$lang['task_options'] = "Tarea opciones";
$lang['javascript_archive_project'] = "Esto archivara el proyecto %s. Esta seguro?";
$lang['archive_project'] = "Archivar proyecto";
$lang['task_navigation'] = "Navegar tareas";
$lang['new_task'] = "Nueva tarea";
$lang['no_projects'] = "Seleccione un proyecto";
$lang['show_all_projects'] = "Mostrar todos los proyectos";
$lang['show_active_projects'] = "Mostrar proyectos activos";
$lang['completed'] = "Completado";
$lang['project_hold_sprt'] = "Proyecto suspendido desde %s";
$lang['project_planned'] = "Proyecto planeado";
$lang['percent_sprt'] = "%d%% de tareas hechas";
$lang['project_no_deadline'] = "Fecha límite no establecida para este proyecto";
$lang['no_allowed_projects'] = "No está atuorizado para ver proyectos";
$lang['projects'] = "Proyectos";
$lang['percent_project_sprt'] = "Este proyecto está %d%% completado";
$lang['owned_by'] = "Propiedad de";
$lang['created_on'] = "Creado el";
$lang['completed_on'] = "Completado el";
$lang['modified_on'] = "Modificado el";
$lang['project_on_hold'] = "Proyecto suspendido";
$lang['project_accessible'] = "(todos los usuarios pueden acceder a este proyecto)";
$lang['task_accessible'] = "(todos los usuarios pueden acceder a esta tarea)";
$lang['project_not_accessible'] = "(los miembros del grupo de usuarios pueden acceder a este proyecto)";
$lang['task_not_accessible'] = "(los miembros del grupo de usuarios pueden acceder a esta tarea)";
$lang['project_not_in_usergroup'] = "Este Proyecto no es parte de un grupo de usuarios y no accesible para todos los usuarios.";
$lang['task_not_in_usergroup'] = "Este Tarea no es parte de un grupo de usuarios y no accesible para todos los usuarios.";
$lang['usergroup_can_edit_project'] = "Este Proyecto también puede ser editado por miembros del grupo de usuarios.";
$lang['usergroup_can_edit_task'] = "Este Tarea también puede ser editada por miembros del grupo de usuarios.";
$lang['i_take_it'] = "Yo lo hago :)";
$lang['i_finished'] = "Lo finalizé!";
$lang['i_dont_want'] = "No lo quiero más";
$lang['take_over_project'] = "Tomar control Proyecto";
$lang['take_over_task'] = "Tomar control Tarea";
$lang['task_info'] = "Información de Tarea";
$lang['project_details'] = "Detalles de Proyecto";
$lang['todo_list_for'] = "lista 'por-hacer' para: ";
$lang['due_in_sprt'] = " (Vence en %d días)";
$lang['due_tomorrow'] = " (Vence mañana)";
$lang['no_assigned'] = "No hay tareas incompletas para este usuario.";
$lang['todo_list'] = "Lista 'por-hacer'";
$lang['summary_list'] = "lista Resumen";
$lang['task_submit'] = "ACEPTAR tarea";
$lang['not_owner'] = "Acceso denegado, no es el propietario o no tiene permisos suficientes";
$lang['missing_values'] = "No hay suficientes datos, vuelva atrás y reintente";
$lang['future'] = "Futuro";
$lang['flags'] = "Banderas";
$lang['owner'] = "Propietario";
$lang['group'] = "Grupo";
$lang['by_usergroup'] = " (por grupo de usuarios)";
$lang['by_taskgroup'] = " (por grupo de tareas)";
$lang['by_deadline'] = " (por límite)";
$lang['by_status'] = " (por estado)";
$lang['by_owner'] = " (por propietario)";
//** needs translation
$lang['by_priority'] = " (por priority)";
$lang['project_cloned'] = "Proyecto a duplicar :";
$lang['task_cloned'] = "Tarea a duplicar :";
$lang['note_clone'] = "Nota: la tarea se duplicara como un nuevo proyecto";
//bits 'n' pieces
$lang['calendar'] = "Calendario";
$lang['normal_version'] = "Versión normal";
$lang['print_version'] = "Versión para imprimir";
$lang['condensed_view'] = "Vista agrupada";
$lang['full_view'] = "Vista completa";
$lang['icalendar'] = "iCalendario";
//**
$lang['url_javascript'] = "Enter the URL:";
//**
$lang['image_url_javascript'] = "Enter the image URL:";

?>