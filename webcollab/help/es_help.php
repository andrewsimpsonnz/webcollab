<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Help page for 'es' (Spanish)

  Translation: Daniel Lujan

  Maintainer: 

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, not able to continue" );

include_once( BASE."includes/screen.php" );

create_top("Help",1);

$content = "

<BR>
<A name=\"usergroup\"><BR></A>
<B>User groups:</B><BR>
La mayoria de los proyectos y tareas tiene un grupo de usuarios trabajando juntos en una especifica area. Un usergroup es un grupo de usuarios que comparten un area de trabajo similar. Las notificaciones por e-mail pueden ser enviadas al usergroup, mas que a un unico usuario.<BR>
<BR>
Usergroups puede tambien ser usado para control de acceso. El acceso puede ser limitado a solo un Usergroup; en cuyo caso otros usuarios no podran ver el proyecto/tarea, no estaran habilitados para acceder. La restriccion de acceso puede ser aplicada al proyecto o tarea usando el checkbox 'Todos los usuarios pueden ver esta tarea?'.<BR>
<BR>
Donde es aplicable, Usergroup pueden tener su propio foro privado para cada tarea o proyecto.<BR>
<BR>

<A name=\"taskgroup\"><BR></A>
<B>Task groups:</B><BR>
La diferencia entre Taskgroups y Usergroups no es facil entender a los nuevos usuarios. De todas maneras la diferencia esta bien marcada; Usergroups controla el acceso y flujo de informacion; Taskgroups son meramente para hacer el listado de tareas mas legible.<BR>
<BR>
Cuando un proyecto crece y pasa a tener un numero considerable de tareas, el listado puede aparecer demasiado largo y no muy legible. Poniendo las tareas en Taskgroups la lista sera agrupada en sub.secciones (por Taskgroups) y por lo tanto mas legible. Tareas que no tienen Taskgroups asignado seran agrupadas como Uncategorisied.<BR>
<BR>
Para resumir: Si en un proyecto no hay tareas agrupadas en un Taskgroup, el listado de tareas sera una larga lista. Si al menos una de las tareas tiene un Taskgroup, todas las tareas seran listadas por Taskgroups.<BR>
<BR>

<A name=\"globalaccess\"><BR></A>
<B>Todos los usuarios pueden ver la tarea?</B><BR>
Este checkbox permite ver la tarea / proyecto solo a los miembros del grupo del Usergroup seleccionado. Cuando el checkbox es checked, todos los usuarios pueden ver la tarea / proyecto. De lo contrario, cuand checked solo los miembro del USergroup pueden ver la tarea / proyecto.<BR>
<BR>
Para Tareas: Ususario que no pertenecen a los Usergroups seleccionados estan habilitados a ver las tareas del proyecto, pero no les sera permitido acceder. <BR>
<BR>
Para proyectos: Usuarios que no pertenecen a los Usergroups seleccionados no estan habilitados a ver el proyecto o las tareas asociadas en cualquier patanlla<BR>
<BR>
Si no hay Usergroup seleccionado, este checkbox no tiene efecto.<BR>
<BR> 

<A name=\"summarypage\"><BR></A>
<B>Resumen page:</B><BR>
LA pagina resumen contiene seis columnas que concisamente indican que esta sucediendo con cada tarea.
<UL>
<LI><B>Banderas</B>:
indican si hay algo nuevo para cada tarea.
Las posibilidades son:
<UL>
<LI><B>C</B>:
indica que la tarea fue creada</LI>

<LI><B>M</B>:
indica que la tarea fue modificada</LI>
<BR>
<LI><B>P</B>:
(posting) indica que una nota fue hecha en el foro de la tarea</LI>
<BR>
<LI><B>F</B>:
(file) indica que un archivo fue enviado para la tarea</LI>
</UL>
Si una bandera esta presente,
entonces puede haceer click en ella para mostrar la tarea asociada.</LI>
<BR>
<LI><B>Deadline</B>:
indica cuando la tarea esta vencida.
Si la fecha aparece en <FONT color=\"red\">rojo</FONT>,
entonces la tarea ya ha vencido;
de otro modo,
si la fecha aparece en <FONT color=\"green\">verde</FONT>,
entonces la fecha de vencimiento es hoy</LI>
<BR>
<LI><B>Estado</B>:
inidca el estado del trabajo del item:
<UL>
<LI><B>Planeado</B>:
indica que la tareas fue recientemente creada,
pero (intencionalmente) no ha sido todavia programada</LI>
<LI><B>Nueva</B>:
indica que la tarea fue recientemente creada,
y esta esperando recursos para ser comenzada</LI>
<LI><FONT color=\"blue\">En suspenso</FONT>:
indica que los trabajos sobre la tarea han ido detenidos,
esperando algun evento externo</LI>
<LI><FONT color=\"orange\">Activa</FONT>:
indica que la tarea esta en proceso de ejecucion</LI>
<LI><FONT color=\"darkgreen\">Hecha</FONT>:
indica que la tarea ha sido completada</LI>
</UL>
</LI>
<BR>
<LI><B>Propietario</B>: 
indica a quie ha sido asignada la tarea.
Puede hacer click en el nombrepara poder ver mas informacion acerca de la persona.</LI>
<BR>
<LI><B>Group</B>: 
indica el usergroup o el taskgroup asociado a la tarea.
Si hace click en la cabecera de la columna,
se cambia la informacion entre estos dos tipos de grupos.</LI>
<BR>
<LI><B>Task</B>: 
indica el nombre de la tarea.
Puede hacer click en el nombre para ver mas informacion.</LI>
</UL>
<BR>

<BR>

";
  new_box( "Help", $content );
  create_bottom();
?>
