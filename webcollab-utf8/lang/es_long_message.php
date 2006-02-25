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

  Trnaslation: Daniel Lujan editado por Alberto Vizcaíno

  Maintainer: 

  NOTE: This file is written in UTF-8 character set

*/


$taskgroup_info = "<ul><li>Si elimina un grupo de tareas todas las tareas de su propiedad quedaran sin clasificar.</li>\n".
  //**
  "<li>Grupos de usuarios privados solo pueden ser vistos por miembros de esos grupos privados.</li>\n".
  "<li>Puede cambiar el nombre de la categoria sin interferir con las tareas.</li>\n".
  "<li>Dos grupos de tareas no pueden tener el mismo nombre.</li></ul>\n";

$usergroup_info = "<ul><li>Si elimina un grupo de usuarios todos los envíos privados al foro relacionados seran eliminados tambien.</li>\n".
  "<li>Puede modificar el nombre del grupo de usuario sin que afecte a sus usuarios.</li>\n".
  "<li>Dos grupos de usuarios no pueden tener el mismo nombre.</li></ul>\n";

$user_info      = "Seleccione su accion desde el menu de la izquierda.<br /><br />".
  "Algunas cosideraciones:<br />".
  "<ul>".
  //**
  "<li>Los usuarios privados solo pueden ser vistos por los usuarios de su grupo.</li>\n".
  "<li>Los usuarios se eliminan en dos etapas, la segunda es permanente.</li>\n".
  "<li>Un usuario eliminado pierde todas sus tareas pero no sus mensajes en el foro.</li>\n".
  "<li>Un usuario borrado de forma permanente pierde todo.</li>\n".
  "<li>Un usuario borrado mantiene los registros de sus tareas que ha revisado, y continuara con estas despues de ser reactivado.</li>\n".
  "<li>TODAS las acciones ejecutadas sobre un usuario seran informadas al usuario por email.</li>\n".
  "<li>Los Passwords son encriptados en la base de datos. Solo se pueden asignar nuevos Passwords.</li>\n".
  "<li>Los Passwords son enviados por email al usuario solo una vez cuando se registra, sea cuidadoso cuando envia estos mails!</li>\n".
  "<li>Los usuarios pueden editar su cuenta sin conocimiento del administrador, esto ayuda a la gestion</li>\n".
  "</ul>\n";

?>
