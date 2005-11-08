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
	<a name=\"admin\"><br /></a>
	<b>Admin email:</b><br />
	Esta es la direccion de email del administrador del sitio que se encarga del dia a dia.
	<br /><br />
	Email automatizados desde este sitio, particularmente lo que concierne a las cuentas de los usuarios, tendran esta direccion como persona de contacto.
	<br /><br />
	Esta direccion debe ser siempre ingresada. Si tiene duda, ingrese su direccion de email aqui!
	<br /><br />

	<a name=\"reply\"><br /></a>
	<b>Email 'reply to':</b><br />
	El campo cabecera 'reply-to' para los emails de este sitio.
	<br /><br />
	Si tiene duda, inrese el email del administrador.
	<br /><br />

	<a name=\"from\"><br /></a>
	<b>Email 'from':</b><br />
	El campo cabecera 'from' para los emails salidos desde este sisitio.
	<br /><br />
	Si tiene duda, ingrese el mail del administrador.
	<br /><br />

	<a name=\"list\"><br /></a>
	<b>Lista de correo (Mailing list):</b><br />
	Cuando se envia email a los grupos de usuarios (usergroups), tambien seran enviados a la direcciones de email listadas aqui.
	Esta funcion is para mantenerse iformado del estado del Project Manager.
	<br /><br />
	Para que se envien email a los grupos de usuarios (usergroups), el checkbox 'Enviar al Usergroup' en el formulario de agregar o editar Proyecto/Tarea, debe ser chequeado.
	Esto puede ser hecho por default seteandolo debajo, o en forma manual por el usuario chequeando el checkbox.
	<br /><br />
	Notar que los usuarios pueden cambiar es estado default cambiand el check del checkbox manualmente.
	<br /><br />
	Seteando al grupo de usuario (usergroups) como privado no afecta a la lista de correo.
	";

  new_box("Help", $content );
  create_bottom();
?>
