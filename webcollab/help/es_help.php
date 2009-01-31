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

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "es" );

include_once( BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>Grupos de usuarios:</b></p>
<p>Los proyectos y tareas pueden asignarse a un grupo de usuarios. Un grupo de usuarios es un conjunto de personas que comparten un área de trabajo similar. Las notificaciones por correo electrónico relativas a ese área de trabajo pueden enviarse al grupo, mas que a un único usuario.
</p>
<p>Los grupos de usuarios pueden utilizarse para controlar el acceso. El acceso puede ser limitarse a un grupo concreto; en cuyo caso otros usuarios no podrán ver el proyecto/tarea, ya que no tendrán permisos para acceder. La restricción de acceso puede ser aplicada al proyecto o tarea usando la opción 'Todos los usuarios pueden ver esta tarea?'.
</p>
<p>Un grupo de usuarios puede tener su propio foro privado para cada tarea o proyecto.
</p>
<a name=\"taskgroup\"></a>
<p><b>Grupo de tareas:</b></p>
<p>La diferencia entre grupo de tareas y grupo de usuarios no es fácil entender a los nuevos usuarios. De todas maneras la diferencia esta bien marcada: grupo de usuarios controla el acceso y flujo de información; los grupos de tareas son meramente para hacer el listado de tareas mas legible.
</p>
<p>Cuando un proyecto crece y pasa a tener un numero considerable de tareas, el listado puede ser demasiado largo y no muy legible. Poniendo las tareas en grupos la lista sera divide en secciones (por grupos de tareas). Tareas que no tienen grupo asignado aparecen como 'Sin categoría­'.
</p>
<p>Para resumir: Si en un proyecto no hay tareas agrupadas en un grupos, el listado de tareas sera una larga lista. Si al menos una de las tareas tiene un grupo, todas las tareas serán listadas por grupos de tareas.
</p>
<a name=\"globalaccess\"></a>
<p><b>Abierto a todos los usuarios?</b></p>
<p>Esta opción permite restringir el acceso a tareas / proyectos. Si la opción esta activada, todos los usuarios pueden ver la tarea / proyecto. De lo contrario, cuando no esta seleccionada solo los miembro del grupo de usuarios pueden ver la tarea / proyecto.
</p>
<p>Para Tareas: Usuarios que no pertenecen a los grupos seleccionados pueden ver las tareas del proyecto, pero no les sera permitido acceder. 
</p>
<p>Para proyectos: Usuarios que no pertenecen a los grupos seleccionados no pueden ver el proyecto o las tareas asociadas.
</p>
<p>Si la tarea o el proyecto no esta asignado a un grupo de usuarios seleccionado, esta opción no tiene efecto.
</p>
<a name=\"groupaccess\"></a>
<p><b>Cualquier miembro del grupo puede editar?</b></p>
<p>Esta opción permite a todos los miembros del grupo de usuarios a editar la tarea o el proyecto.
Si la opción esta activada todos tienen permiso para editar. Si esta desactivada solo el propietario de la tarea o el proyecto puede editarlo.
</p>
<p>Si la tarea o el proyecto no esta asignado a un grupo de usuarios seleccionado, esta opción no tiene efecto.
</p>
<a name=\"summarypage\"></a>
<p><b>Pagina resumen:</b>
<p>La pagina resumen contiene seis columnas que indican brevemente el estado de cada tarea.
</p>
<ul>
<li><b>Banderas</b>:<br />
indican si hay algo nuevo para cada tarea.
Las posibilidades son:
<ul>
<li><b>C</b>:<br />
la tarea acaba de crearse</li>
<li><b>M</b>:<br />
la tarea ha sido modificada</li>
<li><b>P</b>:<br />
(posting) indica que hay un nuevo mensaje en el foro de la tarea</li>
<li><b>F</b>:<br />
(file) indica que se ha asociado un archivo nuevo a la tarea</li>
</ul>
Al pinchar con el ratón sobre una bandera se muestra la tarea asociada.</li>
<li><b>Fecha tope</b>:<br />
indica el plazo en el que la tarea debería haberse realizado.
Si la fecha aparece en <span class=\"red\">rojo</span>,
entonces el plazo de ejecución ha vencido;
de otro modo,
si la fecha aparece en <span class=\"green\">verde</span>,
entonces la fecha de vencimiento es hoy</li>
<li><b>Estado</b>:<br />
Inidica el estado del trabajo de un proyecto o tarea:
<ul>
<li><b>Planeado</b>:<br />
indica que la tarea fue creada recientemente,
pero (intencionalmente) no ha sido todavía programada</li>
<li><b>Nueva</b>:<br />
indica que la tarea fue creada recientemente,
y esta esperando recursos para comenzar</li>
<li><span class=\"blue\">En suspenso</span>:<br />
indica que los trabajos sobre la tarea han ido detenidos,
esperando algún acontecimiento externo</li>
<li><span class=\"orange\">Activa</span>:<br />
indica que la tarea esta en proceso de ejecución</li>
<li><span class=\"green\">Hecha</span>:<br />
indica que la tarea ha sido completada</li>
</ul>
</li>
<li><b>Propietario</b>:<br /> 
indica a quien se ha asignado la tarea.
Puede pinchar con el ratón en el nombre para poder ver mas información sobre la persona.</li>
<li><b>Grupo</b>:<br /> 
indica el grupo de usuarios o el grupo de tareas asociado a la tarea.
Si pincha con el ratón en la cabecera de la columna,
se cambia la información entre estos dos tipos de grupos.</li>
<li><b>Tarea</b>:<br /> 
indica el nombre de la tarea.
Puede pinchar con el ratón en en el nombre para ver mas información.</li>
</ul>
";

new_box("Help", $content );
create_bottom();
?>