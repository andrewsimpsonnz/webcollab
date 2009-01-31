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

  Help files for 'es' (Spanish)

  Translation: Daniel Lujan

  Maintainer:

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );

include_once(BASE."includes/screen.php" );
define('XML_LANG', "es" );

create_top("Help", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>email administracion:</b></p>
	<p>Esta es la direccion de correo electronico del administrador del sitio que se encarga de la gestion y mantenimiento de la aplicacion.
	</p>
	<p>Los envios automatizados desde este sitio, particularmente lo que concierne a las cuentas de los usuarios, se envian con esta direccion de correo electronico.
	</p>
	<p>Esta direccion debe rellenarse siempre. Si tiene dudas, ponga su propia direccion de correo electronico aqui.
	</p>
	<a name=\"reply\"></a>
	<p><b>Email 'responder a':</b></p>
	<p>El campo cabecera 'reply-to' para los envios de correo electronico de este sitio.
	</p>
	<p>Si tiene dudas, ponga la direccion de correo electronico que puso en email administracion.
	</p>
	<a name=\"from\"></a>
	<p><b>Email 'de'::</b></p>
	<p>El campo cabecera 'from' para los envios de correo electronico de este sitio.
	</p>
	<p>Si tiene dudas, ponga la direccion de correo electronico que puso en email administracion.
	</p>
	<a name=\"list\"></a>
	<p><b>Lista de correo:</b></p>
	<p>Cuando se envian correos electronicos alos grupos de usuarios, tambien seran enviados a la direcciones de email listadas aqui.
	Esta funcion permite difundir informacion sobre la evolucion de los proyectos.
	</p>
	<p>Para que se envien correos a los grupos de usuarios, la opcion 'Enviar al Usergroup' en el formulario de agregar o editar Proyecto/Tarea, debe estar activada.
	<p>Esto se puede configurar como opcion predefinida o manualmente para cada proyecto y tarea.
	</p>
	<p>Los usuarios pueden cambiar el estado predefinido desactivando la opcion manualmente.
	</p>
	<p>Configurar un grupo de usuarios como privado no afecta a la lista de correo.
	</p>
        ";

  new_box("Help", $content );
  create_bottom();
?>
