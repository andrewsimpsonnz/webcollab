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

  Maintainer: G�ran K�llqvist <g.kallqvist@telia.com>

*/

//get our location
require_once("path.php" );

include_once(BASE."includes/screen.php" );

create_top("Hj�lp", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>Epost-adress till administrat�r:</b></p>
	<p>Detta �r epost-adressen till administrat�ren, som har hand om sajtens dagliga sk�tsel.
	</p>
	<p>Automatiska mail fr�n sajten, i synnerhet n�r de handlar om anv�ndarnas konton, kommer att uppge denna adress som kontaktperson.
	</p>
	<p>Adressen skall alltid fyllas i.  Om du �r tveksam skriv in din egen epost-adress h�r!
	</p>
	<a name=\"reply\"></a>
	<p><b>Epost 'svar till':</b></p>
	<p>F�ltet 'svar till' f�r mejl fr�n denna sajt.
	</p>
	<p>Om du �r os�ker s�tt den till samma som administrat�rens epost-adress.
	</p>
	<a name=\"from\"></a>
	<p><b>Epost 'fr�n':</b></p>
	<p>F�ltet 'fr�n' i mejl fr�n denna sajt.
	</p>
	<p>Om du �r os�ker s�tt den till samma som administrat�rens epost-adress.
	</p>
	<a name=\"list\"></a>
	<p><b>Mejl-lista:</b></p>
	<p>N�r mejl skickas till anv�ndargruppen kommer de ocks� att skickas till de epost-adresser som anges h�r.  Vitsen med det �r att h�lla projektledarna ajour.
	</p>
	<p>F�r att mejl skall skickas till anv�ndargruppen m�ste kryssrutan 'skicka till anv�ndargrupp' i L�gg till (eller redigera) projekt/uppgift vara ifylld.</p>
	<p>Detta kan g�ras med standardinst�llningen nedan eller genom att anv�ndaren fyller i rutan manuellt.
	</p>
	<p>Observera att anv�ndare kan �sidos�tta standardinst�llningarna genom att manuellt ta bort krysset i rutan.
	</p>
	<p>Att markera en anv�ndargrupp som privat p�verkar inte mejl-listan.</p>
	";

  new_box( "Hj�lp", $content );
  create_bottom();
?>