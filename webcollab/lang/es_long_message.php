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


$taskgroup_info = "<BR><UL><LI>Si elimina un taskgroup todas las tareas de su propiedad seran seteadas como uncategorised.</LI>\n".
  "<LI>Puede cambiar el nombre de la categoria sin iinterferir con las tareas.</LI>\n".
  "<LI>Dos taskgroups no pueden tener el mismo nombre.</LI></UL><BR>\n";

$usergroup_info = "<BR><UL><LI>Si elimina un usergroup todos los envios privado de for relacionados seran eliminados tambien.</LI>\n".
  "<LI>Puede modificar el nombre del usergroup sin interferir con los usuarios en el.</LI>\n".
  "<LI>Dos usergroups no pueden tener el mismo nombre.</LI></UL><BR><BR>\n";

$user_info      = "<BR>Seleccion su accion desde el menu en la izquierda.<BR><BR>".
  "Algunas cosideraciones:<BR>".
  "<UL>".
  "<LI>Los usuarios se eliminan en dos etapas, la segunda es permanente.</LI>\n".
  "<LI>Un usuario eliminado pierde todas sus tareas pero no sus mensajes del foro.</LI>\n".
  "<LI>Un usuario borrado de forma permanente pierde todo.</LI>\n".
  "<LI>No puede eliminar un usuario de modo permanente si este tiene itemsm en el foro.</LI>\n".
  "<LI>Un usuario borrado mantiene los registros de sus tareas que ha revisado, y continuara con estas despues de ser reactivado.</LI>\n".
  "<LI>TODAS las acciones ejecutadas sobre un usuario seran informadas al usuario por email..</LI>\n".
  "<LI>Los Paswords son encriptados en la bas de datos. Puede solo setear uno nuevo.</LI>\n".
  "<LI>Los Passwords son enviados por email al usuario solo una vez cuando el usuario lo registra, sea cuidados cuando envia estos mails!</LI>\n".
  "<LI>Los usuarios pueden editar su cuenta sin conocimiento del administrador,, esto salvara su tiempo de administracion</LI>\n".
  "</UL><BR>\n";

$calendar_key    = "<I>Retornar al Menu Principal</I></A>]</B><BR>\n".
	"<P><B><U>Claves (colores) para Calendario</U></B><BR><BR>\n".
	"<FONT color=\"blue\">Proyecto (con tareas incompletas)</FONT><BR>\n".
	"<FONT color=\"green\"><U>Proyecto </U>(todas las tareas completas)</FONT><BR>\n".
	"<FONT color=\"red\">Tarea (no completada)</FONT><BR>\n".
	"<FONT color=\"green\">Tarea (completada)</FONT><BR>\n";

?>
