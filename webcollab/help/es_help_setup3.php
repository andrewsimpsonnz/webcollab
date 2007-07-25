<?php
/*
  $Id: en_help_setup3.php 1437 2006-01-19 06:38:12Z andrewsimpson $

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

create_top("Help for Setup 3", 1 );

$content = "
<p><b>URL:</b></p>
<p>Esta es la direccion URL de la instalacion de WebCollab. Por ejemplo:</p>
<pre  style=\"background-color : #F2F2F2; padding-top : 0px; padding-bottom :
5px\">http://midominio.com/webcollab/</pre>
<p>No olvide la barra final, es importante.</p>
<p><b>Nombre del sitio:</b></p>
<p>Este es el nombre del sitio y aparecera en las paginas web.</p>
<p>Por defecto es 'WebCollab'</p>
<p><b>Nombre corto:</b></p>
<p>Este nombre se envia en el asunto de los mensajes de correo electronico.<br />
Se recomienda un titulo relativamente corto para que se lea bien en la bandeja
de entrada de los usuarios.</p>
<p><b>Nombre de la base de datos:</b></p> 
<p>Nombre de la base de datos configurada para WebCollab.</p>
<p><b>Usuario de la base de datos:</b></p>
<p>Nombre del usuario que WebCollab utiliza para acceder a la base de datos y sus tablas.</p>
<p>El usuario debe tener acceso de lectura y escritura para las tablas de WebCollab.
Corresponde a los permisos de la base de datos: SELECT, INSERT, UPDATE, y DELETE.
Puede denegar el resto de los permisos para mejorar la seguridad.</p>
<p><b>Clave de la base de datos:</b></p>
<p>La clave del usuario de la base de datos.</p>
<p><b>Tipo de base de datos:</b></p>
<p>El desplegable muestra los tipos de bases de datos disponibles para WebCollab.</p>
<p>La base de datos elegida debe ser la que se ha creado anteriormente. En instalaciones nuevas el valor predeterminado del desplegable es el correcto.</p>
<p><b>Archivo:</b></p>
<p>Directorio donde se almacenarán los archivos cargados en la aplicación. Indique una ruta completa (absoluta) para el directotio. Esta no es la dirección web de la aplicación. Ejemplos:</p>
Unix:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">/var/www/webcollab/files/filebase</pre>
Windows:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">c:\www\webcollab\files\filebase</pre>
Note:<br />
<ul>
<li>El directorio de para los archivos no termina con una barra invertida.</li>
<li>Para evitar problemas en la interpretación del lenguaje PHP son servidores Windows, WebCollab convierte automáticamente '\' en Windows a '/'.</li>
<li>El directorio de archivos debería ser distinto del directorio raiz del servidor web para mantener la seguridad de los archivos. (Se propone <span style=\"text-decoration: underline\">no</span>
es fuera de la raiz del servidor, pero facilita la primera instalación).</li>
<li>El directorio elegido para cargar ficheros debe tener permisos de lectura y escritura para el servidor web Apache.</li> 
</ul>
<p><b>Tamaño de archivo:</b></p>
<p>El es tamaño máximo de archivo que se puede cargar (en bytes).</p>
<p>Nota: la configuración de PHP y Apache en su servidor limitan el tamaño máximo indicado aquí. Mire las preguntas frecuentes (FAQ) para más información.</p>
<p><b>Lenguaje:</b></p>
<p>El lenguaje que se utilizará al completar la instalación.</p>
<p>Los idiomas multi-byte (Chino, Japones y Koreano) solo están disponibles en la versión Unicode de WebCollab.  PAra localizarlos fácilmente estos idiomas están marcados con '*' en el desplegable.</p>
<p><b>Zona horaria:</b></p>
<p>Zona horaria que desea utilizarse.</p>
<p><b>Correo electrónico:</b></p>
<p>Se requiere utilizar correo electrónico para aprovechar plenamente las funcionaidades de WebCollab</p>
<p><b>Host SMTP:</b></p>
<p>WebCollab necesita un host SMTP para enviar correo electrónico. El servidor de correo puede ser local o una máquina externa. Si está en la misma máquina que el servidor web, puede utilizarse el valor 'localhost' (como esta máquina).</p>
<p>El host SMTP puede ser:</p>
Ruta completa:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">mail.midominio.com</pre>
Dirección IP:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">192.168.1.1</pre>
<p>WebCollab también funciona con servidores de correo que requieren SMTP AUTH.  Deberá editar manualmente el archivo <i>[webcollab]/config/config.php</i> después de la configuración</p> ";

new_box("Help for Setup 3", $content );
create_bottom();
?>
