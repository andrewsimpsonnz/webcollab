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

  Help files for 'es' (Spanish)

  Translation: Daniel Lujan

  Maintainer:

*/

//get our location
if( ! @require( "path.php" ) )
  die( "No valid path found, it does not make any sense to continue" );

include_once( BASE."includes/screen.php" );

create_top("Help",1);

$content = "
	<BR>
	<A name=\"admin\"><BR></A>
	<B>Admin email:</B><BR>
	Esta es la direccion de email del administrador del sitio que se encarga del dia a dia.
	<BR><BR>
	Email automatizados desde este sitio, particularmente lo que concierne a las cuentas de los usuarios, tendran esta direccion como persona de contacto.
	<BR><BR>
	Esta direccion debe ser siempre ingresada. Si tiene duda, ingrese su direccion de email aqui!
	<BR><BR>

	<A name=\"reply\"><BR></A>
	<B>Email 'reply to':</B><BR>
	El campo cabecera 'reply-to' para los emails de este sitio.
	<BR><BR>
	Si tiene duda, inrese el email del administrador.
	<BR><BR>

	<A name=\"from\"><BR></A>
	<B>Email 'from':</B><BR>
	El campo cabecera 'from' para los emails salidos desde este sisitio.
	<BR><BR>
	Si tiene duda, ingrese el mail del administrador.
	<BR><BR>

	<A name=\"list\"><BR></A>
	<B>Lista de correo (Mailing list):</B><BR>
	Cuando se envia email a los grupos de usuarios (usergroups), tambien seran enviados a la direcciones de email listadas aqui.
	Esta funcion is para mantenerse iformado del estado del Project Manager.
	<BR><BR>
	Para que se envien email a los grupos de usuarios (usergroups), el checkbox 'Enviar al Usergroup' en el formulario de agregar o editar Proyecto/Tarea, debe ser chequeado.
	Esto puede ser hecho por default seteandolo debajo, o en forma manual por el usuario chequeando el checkbox.
	<BR><BR>
	Notar que los usuarios pueden cambiar es estado default cambiand el check del checkbox manualmente.
	<BR><BR>
	Seteando al grupo de usuario (usergroups) como privado no afecta a la lista de correo.
	<BR><BR>
	";

  new_box( "Help", $content );
  create_bottom();
?>
