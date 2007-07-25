<?php
/*
  $Id: en_help_setup2.php 1437 2006-01-19 06:38:12Z andrewsimpson $

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

  Help page

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );

include_once(BASE."includes/screen.php" );

create_top("Help for Setup 2", 1 );

$content = "
<p><b>Nombre de la base de datos:</b></p> 
<p>Este el el nombre de la base de datos que utilizará WebCollab. Puedes utilizar nombres como
'webcollab', o 'mi_projecto'.</p>
<p>El nombre debe ser una palabra (sin espacios) que contenga únicamente caracteres permitidos:
las letras del alfabeto (a -z) mayusculas o minúsculas, digitos (0-9), '$' y '_'
(guión bajo).</p>
<p><b>Usuario de la base de datos:</b></p>
<p>El usuario que WebCollab utiliza para acceder a la base de datos y sus tablas.</p>
<p>Es necesario que este usuario pueda crear bases de tatos y tablas. El usuario puede cambiarse a otro con menos permisos de acceso, para sitios en producción, en la siguiente pantalla.</p>
<p><b>Clave de la base de datos:</b></p>
<p>Clave para el usuario de la base de datos.</p>
<p><b>Tipo de base de datos:</b></p>
<p>El desplegable muestra los tipos de bases de datos que pueden utilizarse con WebCollab.</p>
<p>Se recomienda la opción 'mysql with innodb' frente a 'mysql' porque Innodb permite transacciones para una mejor seguridad de los datos.  Confirme que la configuracion de MySQL soporta Innodb antes de utilizar esta opción.</p>
<p><b>Servidor de la base de datos:</b></p> 
<p>Servidor que aloja la base de datos. Si es la misma máquina que el servidor web elija 'localhost'. Para bases de datos remotas, indique la direccion IP o la ruta completa.</p>
<p>Nota:<br />
<ul>
<li>Para bases de datos MySQL remotas, confirme que están configuradas para aceptar conexiones remotas.</li> 
<li>Para bases de datos PostgreSQL no debe ponerse un valor distinto de localhost salvo que el postmaster esté configurado para utilizar TCP/IP.  PostgreSQL normalmente utiliza Unix local sockets.<br />
Para utilizar conexiones remotas TCP/IP con PostgreSQL:
<ul>
<li>Edite pg_hba.conf (archivo de configuración de PostgreSQL) para permitir conexiones TCP/IP</li>
<li>Arrancar postmaster PostgreSQL con la opción -i</li>
</ul>
</li>
</ul>
</p>
";
new_box("Help for Setup 2", $content );
create_bottom();
?>
