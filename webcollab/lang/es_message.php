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
Translation: Original de Daniel Lujan actualizado por Alberto Vizca�no (www.alvizlo.es)
Maintainer:
*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );

//this is the regex for input validation filter used in common.php
define('VALIDATION_REGEX', "/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/" ); //ISO-8859-x

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
$task_state['no_deadline_project'] = "Fecha l�mite no establecida";
$task_state['active_project'] = "Proyecto activo";
//common items
$lang['description'] = "Descripci�n";
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
$lang['action'] = "Acci�n";
$lang['task'] = "Tarea";
$lang['tasks'] = "Tareas";
$lang['project'] = "Proyecto";
$lang['info'] = "Info";
$lang['bytes'] = " bytes";
$lang['select_instruct'] = "(Usar ctrl para seleccionar m�s, o para ninguno)";
$lang['member_groups'] = "El usuario es miembro de los grupos resaltados debajo (si es de alguno)";
$lang['login'] = "Usuario";
$lang['login_action'] = "entrar";
$lang['login_screen'] = "Identificaci�n";
$lang['error'] = "Error";
$lang['no_login'] = "Acceso denegado, usuario o clave incorrectos";
$lang['redirect_sprt'] = "Volver� a la ventana de identificaci�n en %d segundos";
$lang['login_now'] = "Pulse aqu� para identificarse ahora";
$lang['please_login'] = "Bienvenido, por favor identif�quese";
$lang['go'] = "Ir a";
//graphic items
$lang['late_g'] = "&nbsp;TARDE&nbsp;";
$lang['new_g'] = "&nbsp;NUEVO&nbsp;";
$lang['updated_g'] = "&nbsp;ACTUALIZADO&nbsp;";
//admin config
$lang['admin_config'] = "Administrador";
$lang['email_settings'] = "Configuraci�n email administraci�n";
$lang['admin_email'] = "email administraci�n";
$lang['email_reply'] = "Email 'responder a'";
$lang['email_from'] = "Email 'de'";
$lang['mailing_list'] = "Lista de correo";
$lang['default_checkbox'] = "Marca la opci�n predeterminada para Proyectos/Tareas";
$lang['allow_globalaccess'] = "Permite acceso global?";
$lang['allow_group_edit'] = "Permitir editar a todo el grupo de usuarios?";
$lang['set_email_owner'] = "Enviar siempre email al propietario con los cambios?";
$lang['set_email_group'] = "Enviar siempre email al grupo de usuarios con los cambios?";
$lang['project_listing_order'] = "Orden lista de proyectos";
$lang['task_listing_order'] = "Orden lista de tareas";
$lang['configuration'] = "Configuraci�n";
//archive
$lang['archived_projects'] = "Proyectos Archivados";
//contacts
$lang['firstname'] = "Nombre:";
$lang['lastname'] = "Apellido:";
$lang['company'] = "Organizaci�n:";
$lang['home_phone'] = "Tlf particular:";
$lang['mobile'] = "Tlf m�vil:";
$lang['fax'] = "Fax:";
$lang['bus_phone'] = "Tlf laboral:";
$lang['address'] = "Direcci�n:";
$lang['postal'] = "Cod.Postal:";
$lang['city'] = "Ciudad:";
$lang['email_contact'] = "Email:";
$lang['notes'] = "Notas:";
$lang['add_contact'] = "Agregar contacto";
$lang['del_contact'] = "Eliminar contacto";
$lang['contact_info'] = "Datos del Contacto";
$lang['contacts'] = "Contactos";
$lang['contact_add_info'] = "Si agrega el nombre de una organizaci�n se mostrar� en lugar del nombre del usuario.";
$lang['show_contact'] = "Mostrar contactos";
$lang['edit_contact'] = "Editar contactos";
$lang['contact_submit'] = "Enviar contacto";
$lang['contact_warn'] = "No se introdujeron datos suficientes para crear el contacto, por favor vuelva y escriba, al menos, nombre y apellido.";
//files
$lang['manage_files'] = "Gestionar archivos";
$lang['no_files'] = "No hay archivos enviados para gestionar.";
$lang['no_file_uploads'] = "La configuraci�n de este sitio web no permite subir ficheros";
$lang['file'] = "Archivo:";
$lang['uploader'] = "Enviado por:";
$lang['files_assoc_project'] = "Archivos asociados al proyecto";
$lang['files_assoc_task'] = "Archivos asociados a la tarea";
$lang['file_admin'] = "Administrar Archivos";
$lang['add_file'] = "Agregar archivo";
$lang['files'] = "Archivos";
$lang['file_choose'] = "Archivo para cargar:";
$lang['upload'] = "Enviar";
$lang['file_email_owner'] = "Notificar archivo nuevo al due�o?";
$lang['file_email_usergroup'] = "Notificar archivo nuevo al grupo de usuarios?";
$lang['max_file_sprt'] = "El archivo a enviar debe ser menor a %s kb.";
$lang['file_submit'] = "Enviar archivo";
$lang['no_upload'] = "Archivo no enviado. Vuelva a intentarlo.";
$lang['file_too_big_sprt'] = "El tama�o m�ximo permitido es %s bytes. Su env�o fue demasiado grande y ha sido eliminado.";
$lang['del_file_javascript_sprt'] = "Esta seguro de eliminar %s ?";
//forum
$lang['orig_message'] = "Mensaje original:";
$lang['post'] = "Publicar";
$lang['message'] = "Mensaje:";
$lang['post_reply_sprt'] = "Enviar una respuesta a la nota de '%s' acerca de '%s'";
$lang['post_message_sprt'] = "Enviar una nota a: '%s'";
$lang['forum_email_owner'] = "Enviar mensaje nuevo al due�o?";
$lang['forum_email_usergroup'] = "Enviar mensaje nuevo al grupo de usuarios?";
$lang['reply'] = "Responder";
$lang['new_post'] = "Nuevo mensaje";
$lang['public_user_forum'] = "Foro p�blico";
$lang['private_forum_sprt'] = "Foro privado para el grupo '%s'";
$lang['forum_submit'] = "Enviar al foro";
$lang['no_message'] = "No hay mensaje! Vuelva atr�s a intentarlo.";
$lang['add_reply'] = "Agregar respuesta";
$lang['last_post_sprt'] = "Ultimo mensaje %s"; //Note to translators: context is 'Last post 2004-Dec-22'
$lang['recent_posts'] = "Mensajes recientes";
$lang['forum_search'] = "Buscar en el foro";
$lang['no_results'] = "No se encuentra '%s'";
$lang['search_results'] = "Encontrados %1\$s resultados para '%2\$s'<br />Mostrando %3\$s resultados de %4\$s";
//includes
$lang['report'] = "Informe";
$lang['warning'] = "<h1>Disculpe!</h1><p>No es posible procesar su solicitud ahora. Por favor int�ntelo m�s tarde.</p>";
$lang['home_page'] = "Principal";
$lang['summary_page'] = "Resumen";
$lang['log_out'] = "Salir";
$lang['main_menu'] = "Menu principal";
$lang['archive'] = "Archivo";
$lang['user_homepage_sprt'] = "Usuario: %s";
$lang['missing_field_javascript'] = "Indique un valor para el dato nulo";
$lang['invalid_date_javascript'] = "Elija una fecha valida";
$lang['finish_date_javascript'] = "La fecha es posterior a la finalizaci�n del proyecto";
$lang['security_manager'] = "Gesti�n de Seguridad";
$lang['session_timeout_sprt'] = "Acceo denegado, �ltima acci�n fue hace %d minutos la sesi�n caduca en %d minutos, por favor <a href=\"%sindex.php\">identif�quese</a>";
$lang['access_denied'] = "Acceso denegado";
$lang['private_usergroup_no_access'] = "Disculpe, esta �rea es privada de un grupo y no tiene permiso de acceso.";
$lang['invalid_date'] = "Fecha no v�lida";
$lang['invalid_date_sprt'] = "La fecha de %s no es una fecha calendario v�lida (Comprobar el numero de d�a del mes), Por favor vuelva atr�s e ingrese un fecha v�lida.";
//taskgroups
$lang['taskgroup_name'] = "nombre del grupo de tareas:";
$lang['taskgroup_description'] = "describir el grupo de tareas:";
$lang['add_taskgroup'] = "Agregar grupo de tareas";
$lang['add_new_taskgroup'] = "Agregar un nuevo grupo de tareas";
$lang['edit_taskgroup'] = "Editar grupo de tareas";
$lang['taskgroup_manage'] = "Gesti�n del grupo de tareas";
$lang['no_taskgroups'] = "No hay grupos de tareas definidos";
$lang['manage_taskgroups'] = "Gestionar grupos de tareas";
$lang['taskgroups'] = "Grupos de Tareas";
$lang['taskgroup_dup_sprt'] = "Ya existe un grupo de tareas '%s'. Seleccione un nombre diferente.";
$lang['info_taskgroup_manage'] = "Info para administraci�n de grupos de tareas";
//usergroups
$lang['usergroup_name'] = "nombre del grupo de usuarios:";
$lang['usergroup_description'] = "describir el grupo de usuarios";
$lang['members'] = "Miembros:";
$lang['private_usergroup'] = "grupo de usuarios privado";
$lang['add_usergroup'] = "Agregar grupo de usuarios";
$lang['add_new_usergroup'] = "Agregar un nuevo grupo de usuarios";
$lang['edit_usergroup'] = "Editar grupo de usuarios";
$lang['usergroup_manage'] = "Administraci�n de grupos de usuarios";
$lang['no_usergroups'] = "No se han creado grupos de usuarios";
$lang['manage_usergroups'] = "Administraci�n grupo de usuarios";
$lang['usergroups'] = "Grupos de Usuarios";
$lang['usergroup_dup_sprt'] = "Ya existe un grupo de usuarios '%s'. Seleccione un nombre diferente.";
$lang['info_usergroup_manage'] = "Info para la administraci�n de grupos de usuarios";
//users
$lang['login_name'] = "Usuario";
$lang['full_name'] = "Nombre completo";
$lang['password'] = "Clave";
$lang['blank_for_current_password'] = "(D�jelo en blanco para conservar actual)";
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
$lang['permdel_javascript_sprt'] = "Esta acci�n elimina de forma permanente todos los registros del usuario y tareas asociadas de %s. Est� seguro?";
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
$lang['message_sent_maillist'] = "Para todas las selecciones el mensaje tambi�n es enviado a la lista de correo.";
$lang['who_online'] = "Qui�n esta en-linea?";
$lang['edit_details'] = "Editar detalles del usuario";
$lang['show_details'] = "Mostrar detalles del usuario";
$lang['user_deleted'] = "Este usuarios ha sido borrado!";
$lang['no_usergroup'] = "Este usuario no es miembro de ning�n grupo de usuarios";
$lang['not_usergroup'] = "(no forma parte de un grupo de usuarios)";
$lang['no_password_change'] = "(Su clave actual NO ha cambiado)";
$lang['last_time_here'] = "�ltima vez visto por aqu�:";
$lang['number_items_created'] = "N�mero de items creados:";
$lang['number_projects_owned'] = "N�mero de proyectos propios:";
$lang['number_tasks_owned'] = "N�mero de tareas propias:";
$lang['number_tasks_completed'] = "N�mero de tareas completadas:";
$lang['number_forum'] = "N�mero de notas en el foro:";
$lang['number_files'] = "N�mero de archivos cargados:";
$lang['size_all_files'] = "Tama�o total de los archivos propios:";
$lang['owned_tasks'] = "Tareas propias";
$lang['invalid_email'] = "Direcci�n email inv�lida";
$lang['invalid_email_given_sprt'] = "La direcci�n email '%s' no es v�lida. Por favor vuelva atr�s y reintente.";
$lang['duplicate_user'] = "Usuario duplicado";
$lang['duplicate_change_user_sprt'] = "El usuario '%s' ya existe. Por favor cambie un nombre.";
$lang['value_missing'] = "Valor no ingresado";
$lang['field_sprt'] = "El campo para '%s' no se ingres�. Vuelva atr�s e ingr�selo.";
$lang['admin_priv'] = "NOTA: Le han sido otorgado derechos de administrador.";
$lang['manage_users'] = "Administrar usuarios";
$lang['users_online'] = "Usuarios en-linea";
$lang['online'] = "Usuarios conectados (al menos los �ltimos 60 minutos)";
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
$lang['project_description'] = "Descripci�n del proyecto";
$lang['task_description'] = "Descripci�n de la tarea";
$lang['email_owner'] = "Enviar un email al propietario con los cambios?";
$lang['email_new_owner'] = "Enviar un email al (nuevo) propietario con los cambios?";
$lang['email_group'] = "Enviar un email al grupo de usuarios con los
cambios?";
$lang['add_new_project'] = "Agregar un nuevo proyecto";
$lang['uncategorised'] = "Sin categor�a";
$lang['due_sprt'] = "%d d�as desde ahora";
$lang['tomorrow'] = "Ma�ana";
$lang['due_today'] = "Vence hoy";
$lang['overdue_1'] = "1 d�a vencido";
$lang['overdue_sprt'] = "%d d�as vencido";
$lang['edit_task'] = "Editar la Tarea";
$lang['edit_project'] = "Editar el Proyecto";
$lang['no_reparent'] = "Ninguno (es un proyecto de nivel superior)";
$lang['del_javascript_project_sprt'] = "Se eliminar� Tarea %s. Est� seguro?";
$lang['del_javascript_task_sprt'] = "Se eliminar� Proyecto %s. Est� seguro?";
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
$lang['project_no_deadline'] = "Fecha l�mite no establecida para este proyecto";
$lang['no_allowed_projects'] = "No est� atuorizado para ver proyectos";
$lang['projects'] = "Proyectos";
$lang['percent_project_sprt'] = "Este proyecto est� %d%% completado";
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
$lang['usergroup_can_edit_project'] = "Este Proyecto tambi�n puede ser editado por miembros del grupo de usuarios.";
$lang['usergroup_can_edit_task'] = "Este Tarea tambi�n puede ser editada por miembros del grupo de usuarios.";
$lang['i_take_it'] = "Yo lo hago :)";
$lang['i_finished'] = "Lo finaliz�!";
$lang['i_dont_want'] = "No lo quiero m�s";
$lang['take_over_project'] = "Tomar control Proyecto";
$lang['take_over_task'] = "Tomar control Tarea";
$lang['task_info'] = "Informaci�n de Tarea";
$lang['project_details'] = "Detalles de Proyecto";
$lang['todo_list_for'] = "lista 'por-hacer' para: ";
$lang['due_in_sprt'] = " (Vence en %d d�as)";
$lang['due_tomorrow'] = " (Vence ma�ana)";
$lang['no_assigned'] = "No hay tareas incompletas para este usuario.";
$lang['todo_list'] = "Lista 'por-hacer'";
$lang['summary_list'] = "lista Resumen";
$lang['task_submit'] = "ACEPTAR tarea";
$lang['not_owner'] = "Acceso denegado, no es el propietario o no tiene permisos suficientes";
$lang['missing_values'] = "No hay suficientes datos, vuelva atr�s y reintente";
$lang['future'] = "Futuro";
$lang['flags'] = "Banderas";
$lang['owner'] = "Propietario";
$lang['group'] = "Grupo";
$lang['by_usergroup'] = " (por grupo de usuarios)";
$lang['by_taskgroup'] = " (por grupo de tareas)";
$lang['by_deadline'] = " (por l�mite)";
$lang['by_status'] = " (por estado)";
$lang['by_owner'] = " (por propietario)";
//** needs translation
$lang['by_priority'] = " (by priority)";
$lang['project_cloned'] = "Proyecto a duplicar :";
$lang['task_cloned'] = "Tarea a duplicar :";
$lang['note_clone'] = "Nota: la tarea se duplicara como un nuevo proyecto";
//bits 'n' pieces
$lang['calendar'] = "Calendario";
$lang['normal_version'] = "Versi�n normal";
$lang['print_version'] = "Versi�n para imprimir";
$lang['condensed_view'] = "Vista agrupada";
$lang['full_view'] = "Vista completa";
$lang['icalendar'] = "iCalendario";
?>