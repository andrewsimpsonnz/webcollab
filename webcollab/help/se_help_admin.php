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

  Help files for 'se' (Swedish)

  Maintainer: Göran Källqvist <g.kallqvist@telia.com>

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "se" );

include_once(BASE."includes/screen.php" );

create_top("Hjälp", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>Epost-adress till administratör:</b></p>
	<p>Detta är epost-adressen till administratören, som har hand om sajtens dagliga skötsel.
	</p>
	<p>Automatiska mail från sajten, i synnerhet när de handlar om användarnas konton, kommer att uppge denna adress som kontaktperson.
	</p>
	<p>Adressen skall alltid fyllas i.  Om du är tveksam skriv in din egen epost-adress här!
	</p>
	<a name=\"reply\"></a>
	<p><b>Epost 'svar till':</b></p>
	<p>Fältet 'svar till' för mejl från denna sajt.
	</p>
	<p>Om du är osäker sätt den till samma som administratörens epost-adress.
	</p>
	<a name=\"from\"></a>
	<p><b>Epost 'från':</b></p>
	<p>Fältet 'från' i mejl från denna sajt.
	</p>
	<p>Om du är osäker sätt den till samma som administratörens epost-adress.
	</p>
	<a name=\"list\"></a>
	<p><b>Mejl-lista:</b></p>
	<p>När mejl skickas till användargruppen kommer de också att skickas till de epost-adresser som anges här.  Vitsen med det är att hålla projektledarna ajour.
	</p>
	<p>För att mejl skall skickas till användargruppen måste kryssrutan 'skicka till användargrupp' i Lägg till (eller redigera) projekt/uppgift vara ifylld.</p>
	<p>Detta kan göras med standardinställningen nedan eller genom att användaren fyller i rutan manuellt.
	</p>
	<p>Observera att användare kan åsidosätta standardinställningarna genom att manuellt ta bort krysset i rutan.
	</p>
	<p>Att markera en användargrupp som privat påverkar inte mejl-listan.</p>
	";

  new_box( "Hjälp", $content );
  create_bottom();
?>