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

  Help page for 'es' (Spanish)

  Translation: Daniel Lujan

  Maintainer: 

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'ISO-8859-1' );

include_once( BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>User groups:</b></p>
<p>La mayoria de los proyectos y tareas tiene un grupo de usuarios trabajando juntos en una especifica area. Un usergroup es un grupo de usuarios que comparten un area de trabajo similar. Las notificaciones por e-mail pueden ser enviadas al usergroup, mas que a un unico usuario.
</p>
<p>Usergroups puede tambien ser usado para control de acceso. El acceso puede ser limitado a solo un Usergroup; en cuyo caso otros usuarios no podran ver el proyecto/tarea, no estaran habilitados para acceder. La restriccion de acceso puede ser aplicada al proyecto o tarea usando el checkbox 'Todos los usuarios pueden ver esta tarea?'.
</p>
<p>Donde es aplicable, Usergroup pueden tener su propio foro privado para cada tarea o proyecto.
</p>
<a name=\"taskgroup\"></a>
<p><b>Task groups:</b></p>
<p>La diferencia entre Taskgroups y Usergroups no es facil entender a los nuevos usuarios. De todas maneras la diferencia esta bien marcada; Usergroups controla el acceso y flujo de informacion; Taskgroups son meramente para hacer el listado de tareas mas legible.
</p>
<p>Cuando un proyecto crece y pasa a tener un numero considerable de tareas, el listado puede aparecer demasiado largo y no muy legible. Poniendo las tareas en Taskgroups la lista sera agrupada en sub.secciones (por Taskgroups) y por lo tanto mas legible. Tareas que no tienen Taskgroups asignado seran agrupadas como Uncategorisied.
</p>
<p>Para resumir: Si en un proyecto no hay tareas agrupadas en un Taskgroup, el listado de tareas sera una larga lista. Si al menos una de las tareas tiene un Taskgroup, todas las tareas seran listadas por Taskgroups.
</p>
<a name=\"globalaccess\"></a>
<p><b>Todos los usuarios pueden ver la tarea?</b></p>
<p>Este checkbox permite ver la tarea / proyecto solo a los miembros del grupo del Usergroup seleccionado. Cuando el checkbox es checked, todos los usuarios pueden ver la tarea / proyecto. De lo contrario, cuand checked solo los miembro del USergroup pueden ver la tarea / proyecto.
</p>
<p>Para Tareas: Ususario que no pertenecen a los Usergroups seleccionados estan habilitados a ver las tareas del proyecto, pero no les sera permitido acceder. 
</p>
<p>Para proyectos: Usuarios que no pertenecen a los Usergroups seleccionados no estan habilitados a ver el proyecto o las tareas asociadas en cualquier patanlla
</p>
<p>Si no hay Usergroup seleccionado, este checkbox no tiene efecto.
</p>
<a name=\"groupaccess\"></a>
<p><b>Anyone in the usergroup can edit?</b></p>
<p>This checkbox allows all members of a Usergroup to edit the task / project.  When the box is
checked, all members of the Usergroup can edit this item.  If the box is unchecked, only the owner
can edit the task.
</p>
<p>If no Usergroup is selected, this checkbox has no affect.
</p>
<a name=\"summarypage\"></a>
<p><b>Resumen page:</b>
<p>LA pagina resumen contiene seis columnas que concisamente indican que esta sucediendo con cada tarea.
</p>
<ul>
<li><b>Banderas</b>:<br />
indican si hay algo nuevo para cada tarea.
Las posibilidades son:
<ul>
<li><b>C</b>:<br />
indica que la tarea fue creada</li>
<li><b>M</b>:<br />
indica que la tarea fue modificada</li>
<li><b>P</b>:<br />
(posting) indica que una nota fue hecha en el foro de la tarea</li>
<li><b>F</b>:<br />
(file) indica que un archivo fue enviado para la tarea</li>
</ul>
Si una bandera esta presente,
entonces puede haceer click en ella para mostrar la tarea asociada.</li>
<li><b>Deadline</b>:<br />
indica cuando la tarea esta vencida.
Si la fecha aparece en <span class=\"red\">rojo</span>,
entonces la tarea ya ha vencido;
de otro modo,
si la fecha aparece en <span class=\"green\">verde</span>,
entonces la fecha de vencimiento es hoy</li>
<li><b>Estado</b>:<br />
inidca el estado del trabajo del item:
<ul>
<li><b>Planeado</b>:<br />
indica que la tareas fue recientemente creada,
pero (intencionalmente) no ha sido todavia programada</li>
<li><b>Nueva</b>:<br />
indica que la tarea fue recientemente creada,
y esta esperando recursos para ser comenzada</li>
<li><span class=\"blue\">En suspenso</span>:<br />
indica que los trabajos sobre la tarea han ido detenidos,
esperando algun evento externo</li>
<li><span class=\"orange\">Activa</span>:<br />
indica que la tarea esta en proceso de ejecucion</li>
<li><span class=\"green\">Hecha</span>:<br />
indica que la tarea ha sido completada</li>
</ul>
</li>
<li><b>Propietario</b>:<br /> 
indica a quie ha sido asignada la tarea.
Puede hacer click en el nombrepara poder ver mas informacion acerca de la persona.</li>
<li><b>Group</b>:<br /> 
indica el usergroup o el taskgroup asociado a la tarea.
Si hace click en la cabecera de la columna,
se cambia la informacion entre estos dos tipos de grupos.</li>
<li><b>Task</b>:<br /> 
indica el nombre de la tarea.
Puede hacer click en el nombre para ver mas informacion.</li>
</ul>
";

new_box("Help", $content );
create_bottom();
?>
