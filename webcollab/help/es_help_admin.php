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

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>Admin email:</b></p>
	<p>Esta es la direccion de email del administrador del sitio que se encarga del dia a dia.
	</p>
	<p>Email automatizados desde este sitio, particularmente lo que concierne a las cuentas de los usuarios, tendran esta direccion como persona de contacto.
	</p>
	<p>Esta direccion debe ser siempre ingresada. Si tiene duda, ingrese su direccion de email aqui!
	</p>
	<a name=\"reply\"></a>
	<p><b>Email 'reply to':</b></p>
	<p>El campo cabecera 'reply-to' para los emails de este sitio.
	</p>
	<p>Si tiene duda, inrese el email del administrador.
	</p>
	<a name=\"from\"></a>
	<p><b>Email 'from':</b></p>
	<p>El campo cabecera 'from' para los emails salidos desde este sisitio.
	</p>
	<p>Si tiene duda, ingrese el mail del administrador.
	</p>
	<a name=\"list\"></a>
	<p><b>Lista de correo (Mailing list):</b></p>
	<p>Cuando se envia email a los grupos de usuarios (usergroups), tambien seran enviados a la direcciones de email listadas aqui.
	Esta funcion is para mantenerse iformado del estado del Project Manager.
	</p>
	<p>Para que se envien email a los grupos de usuarios (usergroups), el checkbox 'Enviar al Usergroup' en el formulario de agregar o editar Proyecto/Tarea, debe ser chequeado.
	<p>Esto puede ser hecho por default seteandolo debajo, o en forma manual por el usuario chequeando el checkbox.
	</p>
	<p>Notar que los usuarios pueden cambiar es estado default cambiand el check del checkbox manualmente.
	</p>
	<p>Seteando al grupo de usuario (usergroups) como privado no afecta a la lista de correo.
	</p>
        ";

  new_box("Help", $content );
  create_bottom();
?>
