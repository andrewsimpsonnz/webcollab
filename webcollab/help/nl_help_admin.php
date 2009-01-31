<?php
/*
  $Id: en_help_admin.php 1437 2006-01-19 06:38:12Z andrewsimpson $

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

  Help files for 'nl' (Dutch)

  Maintainer: Patrick Flinkerbusch <patrick at flinkerbusch.info>


*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "nl" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>Admin email:</b></p>
	<p>Dit is het e-mail adres van de beheerder die het dagelijkse beheer uitvoert.
	</p>
	<p>Automatische e-mail berichten van de site, zoals m.b.t. gebruikers accounts, geven dit adres aan als contactpersoon.
	</p>
	<p>Dit adres moet altijd ingevuld worden. Bij twijfel: vul uw eigen e-mail adres in!
	</p>
	<a name=\"reply\"></a>
	<p><b>Email 'antwoord aan':</b></p>
	<p>Het 'antwoord aan' veld in e-mail berichten van deze site.
	</p>
	<p>Bij twijfel hetzelfde adres invullen als bij Admin email.
	</p>
	<a name=\"from\"></a>
	<p><b>Email 'van':</b></p>
	<p>Het 'van' veld in e-mail berichten van deze site.
	</p>
	<p>Bij twijfel hetzelfde adres invullen als bij Admin email.
	</p>
	<a name=\"list\"></a>
	<p><b>Mailing lijst:</b></p>
	<p>Wanneer e-mail berichten naar een Gebruikers groep gestuurd worden, worden ze ook naar e-mail adressen die hier ingevuld zijn gestuurd. Deze functie houdt de project managers op de hoogte van de huidige status.
	</p>
	<p>Om e-mail berichten te versturen naar de Gebruikers groep, moet de optie 'versturen naar Gebruikers groep' bij het project of taak toevoegen (of bewerken) ingeschakeld zijn.</p>
	<p>Dit kan gedaan worden door de standaard waarde hieronder, of door de gebruiker handmatig door de optie in te schakelen.
	</p>
	<p>Let wel: Gebruikers kunnen deze standaard waarde negeren door de optie handmatig te wijzigen.
	</p>
	<p>Het inschakelen van de optie 'Prive Gebruikers groep' heeft geen effect op de mailing lijst.</p>
	";

  new_box( "Help", $content );
  create_bottom();
?>

