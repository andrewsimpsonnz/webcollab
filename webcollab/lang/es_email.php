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

  Email text language files for 'es' (Spanish)

  Translation: Daniel Lujan editado por Alberto Vizcaíno

  Maintainer:

  NOTE: This file is written in UTF-8 character set


*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 01 Apr 2004 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('d', $ltime ), $month_array[(date('n', $ltime ) )], date('Y H:i', $ltime ), TZ );

//$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i' );

$title_file_post        = ABBR_MANAGER_NAME.": Nuevo archivo disponible: %s";
$email_file_post        = "Hola,\n\nSe ha cargado un nuevo archivo en ".MANAGER_NAME." el ".$email_date." por %1\$s.\n\n".
                          "Archivo:        %2\$s\n".
                          "Descripción: %3\$s\n\n".
                          "Proyecto:       %4\$s\n".
                          "Tarea:          %5\$s\n\n".
                          "Dirigírse al sitio web para más detalles.\n\n".BASE_URL."%6\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": New forum post: %s";
$email_forum_post        = "Hola,\n\nEl sitio ".MANAGER_NAME." le informa de un nuevo mensaje en el foro, publicado el ".$email_date." por %1\$s:\n\n".
                           "----\n\n".
                           "%2\$s\n\n".
                           "----\n\n".
                           "Dirigírse al sitio web para más detalles.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply       = "Hola,\n\nEl sitio ".MANAGER_NAME." le informa de un nuevo mensaje en el foro ".$email_date." por %1\$s.\n\n".
                           "Este mensaje es una respuesta a %2\$s.\n\n".
                           "Mensaje original:\n %3\$s\n\n".
                           "----\n\n".
                           "Nueva respuesta:\n%4\$s\n\n".
                           "----\n\n".
                           "Dirigírse al sitio web para más detalles.\n\n".BASE_URL."%5\$s\n";


$email_list = "Proyecto: %1\$s\n".
              "Tarea:    %2\$s\n".
              "Estado:   %3\$s\n".
              "A cargo:  %4\$s ( %5\$s )\n".
              "Texto:\n%6\$s\n\n".
              "Dirigírse al sitio web para más detalles.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Su item ha sido reasignado";
$title_takeover_task      = ABBR_MANAGER_NAME.": Su item ha sido reasignado";
$email_takeover_project   = "Hola,\n\nEl sitio ".MANAGER_NAME." informándole que un proyecto a su cargo a sido reasignada por el administrador el ".$email_date.".\n\n";
$email_takeover_task      = "Hola,\n\nEl sitio ".MANAGER_NAME." informándole que una tarea a su cargo a sido reasignada por el administrador el ".$email_date.".\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": Nuevo proyecto para ud";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nuevo tarea para ud";
$email_new_owner_project  = "Hola,\n\nEste es el sitio ".MANAGER_NAME." informándole que un proyecto suyo (ahora a su cargo) fue cambiado el ".$email_date.".\n\nAquí los detalles:\n\n";
$email_new_owner_task     = "Hola,\n\nEste es el sitio ".MANAGER_NAME." informándole que una tarea suya (ahora a su cargo) fue cambiado el ".$email_date.".\n\nAquí los detalles:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nuevo proyecto: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nuevo tarea: %s";
$email_new_group_project  = "Hola,\n\nEste es el sitio ".MANAGER_NAME." informándole que un nuevo proyecto ha sido creado el ".$email_date."\n\nAqui los detalles:\n\n";
$email_new_group_task     = "Hola,\n\nEste es el sitio ".MANAGER_NAME." informándole que una nueva tarea ha sido creado el ".$email_date."\n\nAqui los detalles:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Su proyecto actualizado";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Su tarea actualizada";
$email_edit_owner_project ="Hola,\n\nEste es el sitio ".MANAGER_NAME." informándole que un proyecto a su cargo se ha actualizado el ".$email_date.".\n\nAqui los detalles:\n\n";
$email_edit_owner_task    ="Hola,\n\nEste es el sitio ".MANAGER_NAME." informándole que una tarea a su cargo se ha actualizado el ".$email_date.".\n\nAqui los detalles:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Proyecto actualizada";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tarea actualizada";
$email_edit_group_project = "Hola,\n\nEste es el sitio".MANAGER_NAME." informándole que un proyecto a cargo de %s ha cambiado el ".$email_date.".\n\nAquí los detalles:\n\n";
$email_edit_group_task    = "Hola,\n\nEste es el sitio".MANAGER_NAME." informándole que una tarea a cargo de %s ha cambiado el ".$email_date.".\n\nAquí los detalles:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Proyecto eliminada";
$title_delete_task        = ABBR_MANAGER_NAME.": Tarea eliminada";
$email_delete_project     = "Hola,\n\nEste es el sitio ".MANAGER_NAME." informándole que un proyecto a su cargo fue eliminado el ".$email_date."\n\n".
                            "Gracias por dirigir la proyecto en su momento.\n\n";
$email_delete_task        = "Hola,\n\nEste es el sitio".MANAGER_NAME." informándole que una tarea a su cargo fue eliminado el ".$email_date."\n\n".
                            "Gracias por dirigir la tarea en su momento.\n\n";

$delete_list =  "Proyecto: %1\$s\n".
                "Tarea:    %2\$s\n".
                "Estado:   %3\$s\n\n".
                "Texto:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
                            "The members of the new usergroup are:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
                            "The members of the usergroup are:\n".
                            "%2\$s\n";

$title_welcome      = "Bievenido a ".ABBR_MANAGER_NAME;
$email_welcome      = "Bienvenido,\n\n Ha sido dado de alta en: ".MANAGER_NAME." el  ".$email_date.".\n\n".
			"Estas son unas notas de presentación para los nuevos usuarios de la aplicación de gestión de proyectos.\n\n".
			"Lo primero es ir a la herramienta de gestión de proyectos. En la pantalla principal aparecen los proyectos actualmente disponibles. ".
			"Al pinchar con el ratón en uno de los proyectos se accede a las tareas asociadas a ese proyecto.\n\n".
			"Cada item que se envía o tarea que edita se muestra al resto de usuarios como 'nueva' o 'actualizada'. Esto permite identificar rápidamente ".
			"las actividades que se realizan sobre cada proyecto.\n\n".
			"Puede hacerse cargo o propietario de las tareas, obteniendo permisos para editarlas. Como usuario, también recibirá los envios al foro. ".
			"A medida que avande en un trabajo, edite el texto de sus tareas y el estado de tal manera que todos puedan mantener un seguimiento de su progreso.".
			"\n\nEsperamos que la herramienta sea de su agrado. Diríjase por correo electrónico a ".EMAIL_ADMIN." si tiene alguna duda.\n\n --Buena suerte!\n\n".
			"Usuario:      %1\$s\n".
			"Clave:   %2\$s\n\n".
			"Grupos de usuarios: %3\$s".
			"Nombre:     %4\$s\n".
			"Pagina web:    ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": Modificacion de su cuenta por un administrador";
$email_user_change1 = "Hola,\n\n ".MANAGER_NAME." le informa que su cuenta ha sido modificada el ".$email_date." por %1\$s ( %2\$s ) \n\n".
			"Usuario:      %3\$s\n".
			"Clave:   %4\$s\n\n".
			"Grupos de usuarios: %5\$s".
			"Nombre:     %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": Modificacion de su cuenta";
$email_user_change2 = "Hola,\n\n ".MANAGER_NAME." confirma que ud ha modificado exitosamente su cuenta el ".$email_date."\n\n".
			"Usuario:    %1\$s\n".
			"Clave: %2\$s\n\n".
			"Nombre:   %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": Modificacion de su cuenta";
$email_user_change3 = "Hola,\n\n ".MANAGER_NAME." confirma que ha modificado exitosamente su cuenta el ".$email_date."\n\n".
			"Usuario:    %1\$s\n".
			"Su clave NO ha sido modificada.\n\n".
			"Nombre:   %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": Cuenta reactivada";
$email_revive       = "Hola,\n\n ".MANAGER_NAME." le informa que su cuenta ha sido reactivada el  ".$email_date.".\n\n".
			"Usuario: %1\$s\n".
			"Nombre:  %2\$s\n\n".
			"No podemos enviarle su clave porque está encriptada. \n\n".
			"Si olvido su clave envie un correo electrónico ".EMAIL_ADMIN." para solicitar una nueva clave.";



$title_delete_user  = ABBR_MANAGER_NAME.": Cuenta desactivada.";
$email_delete_user  = "Hola,\n\n ".MANAGER_NAME." le informa que su cuenta ha sido desactivada el ".$email_date.".\n\n".
			"Lamentamos su desactivación y agradecemos su trabajo!\n\n".
			"Si desea objetar su desactivación, o piensa que ha sido un error, envie un correo electrónico a ".EMAIL_ADMIN.".";

?>