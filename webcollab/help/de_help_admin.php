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

  Help files for 'de' (German)

  Translator: Michael Bunk

*/

//get our location
require_once("path.php" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
	<a name=\"admin\"><br /></a>
	<b>Administrator-Email:</b><br />
	Dies ist die Emailadresse des Administrators, der sich darum k&uuml;mmert, da&szlig; die Site l&auml;uft.
	<br /><br />
	Automatisch versendete Emails von dieser Site, insbesondere die Benutzerkonten betreffend, geben diese Adresse als die der Kontaktperson an.
	<br /><br />
	Diese Adresse sollte stets gesetzt sein.  Wenn sie unsicher sind, geben sie ihre Emailadresse hier an!
	<br /><br />

	<a name=\"reply\"><br /></a>
	<b>Email 'reply to':</b><br />
	Das 'reply-to' Header-Feld f&uuml;r Emails von dieser Site.
	<br /><br />
	Wenn sie unsicher sind, geben sie dieselbe Adresse wie unter Administrator-Email an.
	<br /><br />

	<a name=\"from\"><br /></a>
	<b>Email 'from':</b><br />
	Das 'from' Header-Feld f&uuml;r Emails von dieser Site.
	<br /><br />
	Wenn sie unsicher sind, geben sie dieselbe Adresse wie unter Administrator-Email an.
	<br /><br />

	<a name=\"list\"><br /></a>
	<b>Mailingliste:</b><br />
	Wenn Emails an eine Nutzergruppe gesendet werden, werden ebenfalls Emails an die hier eingetragenen Emailadressen
	gesendet. Diese Funktion ist dazu gedacht, Projektmanager &uuml;ber den aktuellen Status auf dem Laufenden zu halten.
	<br /><br />
	Damit Emails an die Nutzergruppe gesendet werden, mu&szlig; das Auswahlfeld 'Der Benutzergruppe eine E-Mail mit den
	&auml;nderungen schicken?' auf der Projekt- oder Aufgabenseite aktiviert sein.
	Die Standardeinstellung f&uuml;r neue Aufgaben und Projekte wird hier gesetzt, kann aber beim Erstellen	
	manuell gesetzt werden.
	<br /><br />
	Das Einstellen einer Nutzergruppe hat keine Auswirkungen auf das Feld 'Mailingliste'.
	";

  new_box( "Help", $content );
  create_bottom();
?>
