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

  Language files for 'es' (Spanish)

  Translation: Daniel Lujan

  Maintainer:

*/

//required language encodings
$web_charset = "iso-8859-1";
$email_charset = "iso-8859-1";

//dates
$month_array = array ( NULL, "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" );
$week_array = array('Dom','Lun','Mar','Mie','Jue','Vie','Sab');

//task states
 //priorities
    $task_state['dontdo']                 = 'No hacer';
    $task_state['low']                    = 'BAja';
    $task_state['normal']                 = 'Normal';
    $task_state['high']                   = 'Alta';
    $task_state['yesterday']              = 'Para AYER!';
 //status
    $task_state['new']                    = 'Nueva';
    $task_state['planned']                = 'Planeada (no activa)';
    $task_state['active']                 = 'Activa (trabajando en ella)';
    $task_state['cantcomplete']           = 'En suspenso';
    $task_state['completed']              = 'Completada';
    $task_state['done']                   = 'Hecha';
    $task_state['task_planned']           = ' Planeada';
    $task_state['task_active']            = ' Activa';
 //project states
    $task_state['planned_project']        = 'Proyecto planeado (no activo)';
    $task_state['no_deadline_project']    = 'Fecha l&iacute;mite no establecida';
    $task_state['active_project']         = 'Proyecto activo';

//common items
    $lang['description']                  = 'Descripci&oacute;n';
    $lang['name']                         = 'Nombre';
    $lang['add']                          = 'Agregar';
    $lang['update']                       = 'Actualizar';
    $lang['submit_changes']               = 'Enviar cambios';
    $lang['continue']                     = 'Continuar';
    $lang['reset']                        = 'Reset';
    $lang['manage']                       = 'Administrar';
    $lang['edit']                         = 'Editar';
    $lang['delete']                       = 'Borrar';
    $lang['del']                          = 'Borra';
    $lang['confirm_del_javascript']       = 'Confirma borrado!';
    $lang['yes']                          = 'Si';
    $lang['no']                           = 'No';
    $lang['action']                       = 'Accion';
    $lang['task']                         = 'Tarea';
    $lang['tasks']                        = 'Tareas';
    $lang['project']                      = 'Proyecto';
    $lang['info']                         = 'Info';
    $lang['bytes']                        = ' bytes';
    $lang['select_instruct']              = '(Usar ctrl para seleccionar m&aacute;s, o para ninguno)';
    $lang['member_groups']                = 'El usuario es miembro de los grupos resaltados debajo (si es de alguno)';
    $lang['login']                        = 'Login';
    $lang['error']                        = 'Error';
    $lang['no_login']                     = 'Acceso denegado, login o pass incorrectos';
    $lang['please_login']                 = 'Bienvenido, por favor ingrese';

 //graphic items
    $lang['late_g']                       = '&nbsp;LATE&nbsp;';
    $lang['new_g']                        = '&nbsp;NEW&nbsp;';
    $lang['updated_g']                    = '&nbsp;UPDATED&nbsp;';

//admin config
    $lang['admin_config']                 = 'Admin config';
    $lang['email_settings']               = 'Email header settings';
    $lang['admin_email']                  = 'Admin email';
    $lang['email_reply']                  = 'Email \'reply to\'';
    $lang['email_from']                   = 'Email \'from\'';
    $lang['mailing_list']                 = 'Mailing list';
    $lang['default_checkbox']             = 'Marca el checkbox Default para Proyectos/Tareas';
    $lang['allow_globalaccess']           = 'Permite acceso global?';
    $lang['allow_group_edit']             = 'Permitir a todo el usergroup editar?';
    $lang['set_email_owner']              = 'Siempre email al propietario con los cambios?';
    $lang['set_email_group']              = 'Siempre email al Grupo-usuarios con cambios?';
//**    
    $lang['project_listing_order']        = 'Project listing order';
//**    
    $lang['task_listing_order']           = 'Task listing order'; 
    $lang['configuration']                = 'Configuraci&oacute;n';

//archive
//**
    $lang['archived_projects']            = 'Archived Projects';    

//contacts
    $lang['firstname']                    = 'Nombre:';
    $lang['lastname']                     = 'Apellido:';
    $lang['company']                      = 'Compania:';
    $lang['home_phone']                   = 'TE particular:';
    $lang['mobile']                       = 'Celular:';
    $lang['fax']                          = 'Fax:';
    $lang['bus_phone']                    = 'TE laboral:';
    $lang['address']                      = 'Direccion:';
    $lang['postal']                       = 'Cod.Postal:';
    $lang['city']                         = 'Ciudad:';
    $lang['email']                        = 'Email:';
    $lang['notes']                        = 'Notas:';
    $lang['add_contact']                  = 'Agregar contacto';
    $lang['del_contact']                  = 'Eliminar contacto';
    $lang['contact_info']                 = 'Datos del Contacto';
    $lang['contacts']                     = 'Contactos';
    $lang['contact_add_info']             = 'If agrega el nombre de una compania esta sera mostrada en lugar del nombre del usuario.';
    $lang['show_contact']                 = 'Mostrar contactos';
    $lang['edit_contact']                 = 'Editar contactos';
    $lang['contact_submit']               = 'Contacto aceptar';
    $lang['contact_warn']                 = 'No se ingresaron los valores suficientes para agregar el contacto, por favor vuelva para atras y agregue al menos nombre y apellido.';

 //files
    $lang['manage_files']                 = 'Manipular archivos';
    $lang['no_files']                     = 'No hay archivos enviados para manipular.';
    $lang['no_file_uploads']              = 'La configuraci&oacute;n de este sitio web no permite subir ficheros';
    $lang['file']                         = 'Archivo:';
    $lang['uploader']                     = 'Uploader:';
    $lang['files_assoc_project']          = 'Archivos asociados con proyecto';
    $lang['files_assoc_task']             = 'Archivos asociados con tarea';
    $lang['file_admin']                   = 'Archivo admin';
    $lang['add_file']                     = 'Agregar archivo';
    $lang['files']                        = 'Archivos';
    $lang['file_choose']                  = 'Archivo to upload:';
    $lang['upload']                       = 'Upload';
  //**
    $lang['file_email_owner']             = 'Email notification of new file to the owner?';
 //**
    $lang['file_email_usergroup']         = 'Email notification of new file to the usergroup?';
    $lang['max_file_sprt']                = 'El archivo a enviar debe ser menor a  %s kb.';
    $lang['file_submit']                  = 'File submit';
    $lang['no_upload']                    = 'No se envio archivo. Vuelva para atras y reintente.';
    $lang['file_too_big_sprt']            = 'El tama&ntilde;o m&aacute;ximo permitido es %s bytes.  Su env&iacute;o fue demasiado grande y ha sido eliminado.';
    $lang['del_file_javascript_sprt']     = 'Esta seguro de eliminar %s ?';


 //forum
    $lang['orig_message']                 = 'Mensaje original:';
    $lang['post']                         = 'Post it!';
    $lang['message']                      = 'Mensaje:';
    $lang['post_reply_sprt']              = 'Enviar una respuesta a la nota de  \'%s\' acerca de \'%s\'';
    $lang['post_message_sprt']            = 'Enviar una nota a: \'%s\'';
 //**
    $lang['forum_email_owner']            = 'Email forum message to the owner?';
 //**
    $lang['forum_email_usergroup']        = 'Email forum message to the usergroup?';
    $lang['reply']                        = 'Responder';
    $lang['new_post']                     = 'Nota nueva';
    $lang['public_user_forum']            = 'Foro p&uacute;blico';
    $lang['private_forum_sprt']           = 'Foro privado para el grupo \'%s\'';
    $lang['forum_submit']                 = 'Foro aceptar';
    $lang['no_message']                   = 'No hay mensaje! Vuelva atr&aacute;s y reintente.';
    $lang['add_reply']                    = 'Agregar respuesta';
//**  
    $lang['last_post_sprt']               = 'Last post %s'; //Note to translators: context is 'Last post 2004-Dec-22'
//**   
    $lang['recent_posts']                 = 'Recent forum posts';      
    
 //includes
    $lang['report']                       = 'Reporte';
    $lang['warning']                      = '<h1>Disculpe!</h1><p>No es posible procesar su requerimiento ahora. Por favor reint&eacute;ntelo m&aacute;s tarde..</p>';
    $lang['home_page']                    = 'Principal';
    $lang['summary_page']                 = 'Resumen';
    $lang['todo_list']                    = 'ToDo lista';
    $lang['calendar']                     = 'Calendario';
    $lang['log_out']                      = 'Salir';
    $lang['main_menu']                    = 'Menu principal';
//**
    $lang['archive']                      = 'Archive';   
    $lang['user_homepage_sprt']           = 'Usuario: %s';
 //**
    $lang['missing_field_javascript']     = 'Please enter a value for the missing field';
 //**
    $lang['invalid_date_javascript']      = 'Please choose a valid calendar date';
 //**
    $lang['finish_date_javascript']       = 'The entered date occurs after the project finish date!';
    $lang['security_manager']             = 'Manejo de Seguridad';
    $lang['session_timeout_sprt']         = 'Acceo denegado, &uacute;ltima acci&oacute;n fue %d minutos atr&aacute;s y el tiempo de expiraci&oacute;n es de %d minutos, por favor <a href=\\"%sindex.php\\">Ingrese</a>';
    $lang['access_denied']                = 'Acceso denegado';
    $lang['private_usergroup']            = 'Disculpe, esta area es privada de un grupo y ud no tiene derecho de acceso.';
    $lang['invalid_date']                 = 'Fecha inv&aacute;lida';
    $lang['invalid_date_sprt']            = 'La fecha de %s no es una fecha calendario v&aacute;lida (Chequear el numero de d&iacute;a del mes), Por favor vuelva atr&aacute;s e ingrese un fecha v&aacute;lida.';


 //taskgroups
    $lang['taskgroup_name']               = 'nombre Taskgroup:';
    $lang['taskgroup_description']        = 'Taskgroup simple descripci&oacute;n:';
    $lang['add_taskgroup']                = 'Agregar taskgroup';
    $lang['add_new_taskgroup']            = 'Agregar un nuevo taskgroup';
    $lang['edit_taskgroup']               = 'Editar taskgroup';
    $lang['taskgroup_manage']             = 'Administracion de Taskgroups';
    $lang['no_taskgroups']                = 'No hay taskgroups definidos';
    $lang['manage_taskgroups']            = 'Administrar taskgroups';
    $lang['taskgroups']                   = 'Taskgroups';
    $lang['taskgroup_dup_sprt']           = 'Ya existe un taskgroup \'%s\'.  Seleccione un nombre diferente.';
    $lang['info_taskgroup_manage']        = 'Info para administraci&oacute;n de taskgroup';

 //usergroups
    $lang['usergroup_name']               = 'nombre Usergroup:';
    $lang['usergroup_description']        = 'Descripci&oacute;n simple del Usergroup';
    $lang['members']                      = 'Miembros:';
 //**
    $lang['private_usergroup']            = 'Private usergroup';
    $lang['add_usergroup']                = 'Agregar usergroup';
    $lang['add_new_usergroup']            = 'Agregar un nuevo usergroup';
    $lang['edit_usergroup']               = 'Editar usergroup';
    $lang['usergroup_manage']             = 'Administraci&oacute;n de Usergroups';
    $lang['no_usergroups']                = 'No usergroups definidos';
    $lang['manage_usergroups']            = 'Administraci&oacute;n usergroups';
    $lang['usergroups']                   = 'Usergroups';
    $lang['usergroup_dup_sprt']           = 'Ya existe un usergroup \'%s\'.  Seleccione un nombre diferente.';
    $lang['info_usergroup_manage']        = 'Info para la administraci&oacute;n de usergroup';

 //users
    $lang['login_name']                   = 'Login name';
    $lang['full_name']                    = 'Nombre completo';
    $lang['password']                     = 'Password';
 //**
    $lang['blank_for_current_password']   = '(D&eacute;jelo en blanco para conservar el actual)';
    $lang['email']                        = 'E-mail';
    $lang['admin']                        = 'Admin';
  //**
    $lang['private_user']                 = 'Private user';
 //**
    $lang['normal_user']                  = 'Normal user'; 
    $lang['is_admin']                     = 'Es admin?';
 //**
    $lang['is_guest']                     = 'Is a guest?';
 //**
    $lang['guest']                        = 'Guest user';
    $lang['user_info']                    = 'Info. de usuario';
    $lang['deleted_users']                = 'Usuarios eliminados';
    $lang['no_deleted_users']             = 'No existen usuarios eliminados.';
    $lang['revive']                       = 'Revive';
    $lang['permdel']                      = 'Permdel';
    $lang['permdel_javascript_sprt']      = 'Esta acci&oacute;n eliminar de forma permanente todos los registros del usuario y tareas asociadas de %s. Est&aacute; seguro de querer hacerlo?';
    $lang['add_user']                     = 'Agregar usuario';
    $lang['edit_user']                    = 'Editar usuario';
    $lang['no_users']                     = 'No hay usuarios conocidos del sistema';
    $lang['users']                        = 'Usuarios';
    $lang['existing_users']               = 'Usuarios existentes';
 //**
    $lang['private_profile']              = 'This user has a private profile that cannot be viewed by you.';
    $lang['private_usergroup_profile']    = '(This user is a member of private usergroups that cannot be viewed by you)';
    $lang['email_users']                  = 'Usuarios de correo';
    $lang['select_usergroup']             = 'Usergroup seleccionado de abajo:';
    $lang['subject']                      = 'Subject:';
    $lang['message_sent_maillist']        = 'Para todas las selecciones el mensaje tambi&eacute;n es enviado a la lista de correo.';
    $lang['who_online']                   = 'Qui&eacute;n esta en-linea?';
    $lang['edit_details']                 = 'Editar detalles del usuario';
    $lang['show_details']                 = 'Mostrar detalles del usuario';
    $lang['user_deleted']                 = 'Este usuarios ha sido borrado!';
    $lang['no_usergroup']                 = 'Este usuari no es miembro de ning&uacute;n usergroups';
    $lang['not_usergroup']                = '(No es miembro de un usergroup)';
    $lang['no_password_change']           = '(Su password actual NO ha cambiado)';
    $lang['last_time_here']               = '&Uacute;ltima vez visto por aqu&iacute;:';
    $lang['number_items_created']         = 'N&uacute;mero de items creados:';
    $lang['number_projects_owned']        = 'N&uacute;mero de proyectos propios:';
    $lang['number_tasks_owned']           = 'N&uacute;mero de tareas propias:';
    $lang['number_tasks_completed']       = 'N&uacute;mero de tareas completadas:';
    $lang['number_forum']                 = 'N&uacute;mero de notas en el foro:';
    $lang['number_files']                 = 'N&uacute;mero de archivos cargados:';
    $lang['size_all_files']               = 'Tama&ntilde;o total de los archivos propios:';
    $lang['owned_tasks']                  = 'Tareas propias';
    $lang['invalid_email']                = 'Direcci&oacute;n email inv&aacute;lida';
    $lang['invalid_email_given_sprt']     = 'La direcci&oacute;n email \'%s\' no es v&aacute;lida. Por favor vuelva atr&aacute;s y reintente.';
    $lang['duplicate_user']               = 'Usuario duplicado';
    $lang['duplicate_change_user_sprt']   = 'El usuario \'%s\' ya existe. Por favor cambie un nombre.';
    $lang['value_missing']                = 'Valor no ingresado';
    $lang['field_sprt']                   = 'El campo para \'%s\' no se ingres&oacute;. Vuelva atr&aacute;s e ingr&eacute;selo.';
    $lang['admin_priv']                   = 'NOTA: Le han sido otorgado derechos de administrador.';
    $lang['manage_users']                 = 'Administrar usuarios';
    $lang['users_online']                 = 'Usuarios en-linea';
    $lang['online']                       = 'Usuarios que han ingresado (En linea al menos los &uacute;ltimos 60 minutos)';
    $lang['not_online']                   = 'El resto';
    $lang['user_activity']                = 'Actividad de usuario';

  //tasks
    $lang['add_new_task']                 = 'Agregar nueva tarea';
    $lang['priority']                     = 'Prioridad';
    $lang['parent_task']                  = 'Tarea padre';
    $lang['creation_time']                = 'Creado en fecha';
    $lang['project_name']                 = 'Nombre del proyecto';
    $lang['by_sprt']                      = '%1$s por %2$s'; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['task_name']                    = 'Nombre de tarea';
    $lang['deadline']                     = 'Fecha tope';
    $lang['taken_from_parent']            = '(Tomado desde el padre)';
    $lang['status']                       = 'Estado';
    $lang['task_owner']                   = 'Tarea de';
    $lang['project_owner']                = 'Proyecto de';
    $lang['taskgroup']                    = 'Taskgroup';
    $lang['usergroup']                    = 'Usergroup';
    $lang['nobody']                       = 'Nadie';
    $lang['none']                         = 'Ninguno';
    $lang['no_group']                     = 'Sin grupo';
    $lang['all_groups']                   = 'Todos los grupos';
    $lang['all_users']                    = 'Todos los usuarios';
    $lang['all_users_view']               = 'Todos los usuarios pueden ver esta tarea?';
    $lang['group_edit']                   = 'Alguien en el usergroup puede editar?';
    $lang['project_description']          = 'Descripci&oacute;n del proyecto';
    $lang['task_description']             = 'Descripci&oacute;n de la tarea';
    $lang['email_owner']                  = 'Enviar un email al propietario con los cambios?';
    $lang['email_new_owner']              = 'Enviar un email al (nuevo) propietario con los cambios?';
    $lang['email_group']                  = 'Enviar un email al usergroup con los cambios?';
    $lang['add_new_project']              = 'Agregar un nuevo proyecto';
    $lang['uncategorised']                = 'No categorizado';
    $lang['due_sprt']                     = '%d d&iacute;as desde ahora';
    $lang['tomorrow']                     = 'Ma&ntilde;ana';
    $lang['due_today']                    = 'Vence hoy';
    $lang['overdue_1']                    = '1 d&iacute;a vencido';
    $lang['overdue_sprt']                 = '%d d&iacute;as vencido';
    $lang['edit_task']                    = 'Editar la Tarea';
    $lang['edit_project']                 = 'Editar el Proyecto';
    $lang['no_reparent']                  = 'Ninguno (es un proyecto de nivel superior)';
    $lang['del_javascript_project_sprt']  = 'Se eliminar&aacute; Tarea %s. Est&aacute; seguro?';
    $lang['del_javascript_task_sprt']     = 'Se eliminar&aacute; Proyecto %s. Est&aacute; seguro?';
    $lang['add_task']                     = 'Agregar Tarea';
    $lang['add_subtask']                  = 'Agregar sub-Tarea';
    $lang['add_project']                  = 'Agregar Proyecto';
 //**
    $lang['clone_project']                = 'Clone project';
 //**
    $lang['clone_task']                   = 'Clone task'; 
    $lang['no_edit']                      = 'No es propietario de este, no puede editarlo. Pida a un administrador, o al propietario de la tarea para que lo haga por Ud.';
    $lang['uncategorised']                = 'No categorizado';
    $lang['admin']                        = 'Admin';
    $lang['global']                       = 'Global';
    $lang['delete_project']               = 'Borrar Proyecto';
    $lang['delete_task']                  = 'Borrar Tarea';
    $lang['project_options']              = 'Project opciones';
    $lang['task_options']                 = 'Tarea opciones';
    $lang['task_navigation']              = 'Navegar tareas';
//**
    $lang['new_task']                     = 'New task';    
    $lang['no_projects']                  = 'No hay proyecto para ver';
 //**
    $lang['show_all_projects']            = 'Show all projects';
    $lang['show_active_projects']         = 'Show only active projects';
    $lang['completed']                    = 'Completado';
    $lang['project_hold_sprt']            = 'Proyecto suspendido desde %s';
    $lang['project_planned']              = 'Proyecto planeado';
    $lang['percent_sprt']                 = '%d%% de tareas hechas';
    $lang['project_no_deadline']          = 'Fecha l&iacute;mite no establecida para este proyecto';
    $lang['no_allowed_projects']          = 'No hay proyecto que le esten permitidos ver';
    $lang['projects']                     = 'Proyectos';
    $lang['percent_project_sprt']         = 'Este proyecto est&aacute; %d%% completado';
    $lang['owned_by']                     = 'Propiedad de';
    $lang['created_on']                   = 'Creado el';
    $lang['completed_on']                 = 'Completado el';
    $lang['modified_on']                  = 'Modificado el';
    $lang['project_on_hold']              = 'Proyecto esta suspendido';
    $lang['project_accessible']           = '(Este Proyecto es accesible por todos los usuarios)';
    $lang['task_accessible']              = '(Este Tarea es accesible por todos los usuarios)';
    $lang['project_not_accessible']       = '(Este Proyecto es accesible por los miembro del usergroup)';
    $lang['task_not_accessible']          = '(Este Tarea es accesible por los miembro del usergroup)';
    $lang['project_not_in_usergroup']     = 'Este Proyecto no es parte de un usergroup y no accesible para todos los usuarios.';
    $lang['task_not_in_usergroup']        = 'Este Tarea no es parte de un usergroup y no accesible para todos los usuarios.';
    $lang['usergroup_can_edit_project']   = 'Este Proyecto puede ser tambi&eacute;n editado por miembro del usergroup.';
    $lang['usergroup_can_edit_task']      = 'Este Tarea puede ser tambi&eacute;n editado por miembro del usergroup.';
    $lang['i_take_it']                    = 'I\'ll take it :)';
    $lang['i_finished']                   = 'Lo finaliz&eacute;!';
    $lang['i_dont_want']                  = 'No lo quiero m&aacute;s';
    $lang['take_over_project']            = 'Tomar control Proyecto';
    $lang['take_over_task']               = 'Tomar control Tarea';
    $lang['task_info']                    = 'Informaci&oacute;n de Tarea';
    $lang['project_details']              = 'Detalles de Proyecto';
    $lang['todo_list_for']                = 'lista \'por-hacer\' para: ';
    $lang['due_in_sprt']                  = ' (Vence en %d d&iacute;as)';
    $lang['due_tomorrow']                 = ' (Vence ma&ntilde;ana)';
    $lang['no_assigned']                  = 'No hay tareas incompletas para este usuario.';
    $lang['todo_list']                    = 'Lista \'por-hacer\'';
    $lang['summary_list']                 = 'lista Resumen';
    $lang['task_submit']                  = 'Task ACEPTAR';
    $lang['not_owner']                    = 'Acceso denegado, no es el propietario o no tiene derechos suficientes';
    $lang['missing_values']               = 'No hay suficientes datos ingresados, vuelva atr&aacute;s y reintente';
    $lang['future']                       = 'Futuro';
    $lang['flags']                        = 'Banderas';
    $lang['owner']                        = 'Propietario';
    $lang['group']                        = 'Grupo';
    $lang['by_usergroup']                 = ' (por usergroup)';
    $lang['by_taskgroup']                 = ' (por taskgroup)';
    $lang['by_deadline']                  = ' (por l&iacute;mite)';
    $lang['by_status']                    = ' (por estado)';
    $lang['by_owner']                     = ' (por propietario)';
    $lang['project_cloned']               = 'Project to be cloned :';
    $lang['task_cloned']                  = 'Task to be cloned :';
    $lang['note_clone']                   = 'Note: The task will be cloned as a new project';


//bits 'n' pieces
    $lang['calendar']                     = 'Calendario';
    $lang['normal_version']               = 'Normal version';
    $lang['print_version']                = 'Print version';
//**    
    $lang['condensed_view']               = 'Condensed view';
//**    
    $lang['full_view']                    = 'Full view';

?>