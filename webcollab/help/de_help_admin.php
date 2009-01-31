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

  Help files for 'de' (German)

  Translator: Michael Bunk

  NOTE: This file is written in UTF-8 character set

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "de" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
	<p><a name=\"admin\"><br /></a>
	<b>Administrator-Email:</b></p>
	<p>Dies ist die Emailadresse des Administrators, der sich darum kümmert, daß die Site läuft.
	</p>
	<p>Automatisch versendete Emails von dieser Site, insbesondere die Benutzerkonten betreffend, geben diese Adresse als die der Kontaktperson an.
	</p>
	<p>Diese Adresse sollte stets gesetzt sein.  Wenn sie unsicher sind, geben sie ihre Emailadresse hier an!
	</p>

	<a name=\"reply\"></a>
	<p><b>Email 'reply to':</b></p>
	<p>Das 'reply-to' Header-Feld für Emails von dieser Site.
	</p>
	<p>Wenn sie unsicher sind, geben sie dieselbe Adresse wie unter Administrator-Email an.
	</p>
	<a name=\"from\"><br /></a>
	<p><b>Email 'from':</b></p>
	<p>Das 'from' Header-Feld für Emails von dieser Site.
	</p>
	<p>Wenn sie unsicher sind, geben sie dieselbe Adresse wie unter Administrator-Email an.
	</p>
	<a name=\"list\"></a>
	<p><b>Mailingliste:</b></p>
	<p>Wenn Emails an eine Nutzergruppe gesendet werden, werden ebenfalls Emails an die hier eingetragenen Emailadressen
	gesendet. Diese Funktion ist dazu gedacht, Projektmanager über den aktuellen Status auf dem Laufenden zu halten.
	</p>
	<p>Damit Emails an die Nutzergruppe gesendet werden, muß das Auswahlfeld 'Der Benutzergruppe eine E-Mail mit den
	änderungen schicken?' auf der Projekt- oder Aufgabenseite aktiviert sein.
	Die Standardeinstellung für neue Aufgaben und Projekte wird hier gesetzt, kann aber beim Erstellen	
	manuell gesetzt werden.
	</p>
	<p>Das Einstellen einer Nutzergruppe hat keine Auswirkungen auf das Feld 'Mailingliste'.
	</p>
        ";

  new_box( "Help", $content );
  create_bottom();
?>
