<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson
  
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

  Language files (long messages) for 'es' (Spanish)

  Trnaslation: Daniel Lujan

  Maintainer: 

*/


$taskgroup_info = "<ul><li>Si elimina un taskgroup todas las tareas de su propiedad seran seteadas como uncategorised.</li>\n".
  "<li>Puede cambiar el nombre de la categoria sin iinterferir con las tareas.</li>\n".
  "<li>Dos taskgroups no pueden tener el mismo nombre.</li></ul>\n";

$usergroup_info = "<ul><li>Si elimina un usergroup todos los envios privado de for relacionados seran eliminados tambien.</li>\n".
  "<li>Puede modificar el nombre del usergroup sin interferir con los usuarios en el.</li>\n".
  "<li>Dos usergroups no pueden tener el mismo nombre.</li></ul>\n";

$user_info      = "Seleccion su accion desde el menu en la izquierda.<br /><br />".
  "Algunas cosideraciones:<br />".
  "<ul>".
  "<li>Los usuarios se eliminan en dos etapas, la segunda es permanente.</li>\n".
  "<li>Un usuario eliminado pierde todas sus tareas pero no sus mensajes del foro.</li>\n".
  "<li>Un usuario borrado de forma permanente pierde todo.</li>\n".
  "<li>No puede eliminar un usuario de modo permanente si este tiene itemsm en el foro.</li>\n".
  "<li>Un usuario borrado mantiene los registros de sus tareas que ha revisado, y continuara con estas despues de ser reactivado.</li>\n".
  "<li>TODAS las acciones ejecutadas sobre un usuario seran informadas al usuario por email..</li>\n".
  "<li>Los Paswords son encriptados en la bas de datos. Puede solo setear uno nuevo.</li>\n".
  "<li>Los Passwords son enviados por email al usuario solo una vez cuando el usuario lo registra, sea cuidados cuando envia estos mails!</li>\n".
  "<li>Los usuarios pueden editar su cuenta sin conocimiento del administrador,, esto salvara su tiempo de administracion</li>\n".
  "</ul>\n";

$calendar_key    = "<i>Retornar al Menu Principal</i></a>]</b><br />\n".
	"<p><b><u>Claves (colores) para Calendario</u></b><br /><br />\n".
	"<font color=\"blue\">Proyecto (con tareas incompletas)</font><br />\n".
	"<font color=\"green\"><u>Proyecto </u>(todas las tareas completas)</font><br />\n".
	"<font color=\"red\">Tarea (no completada)</font><br />\n".
	"<font color=\"green\">Tarea (completada)</font><br />\n";

?>
