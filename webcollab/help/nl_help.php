<?php
/*
  $Id: en_help.php 1437 2006-01-19 06:38:12Z andrewsimpson $

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

  Dutch Help page

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
<a name=\"usergroup\"></a>
<p><b>Gebruikers groepen:</b></p>
<p>De meeste projecten of taken  hebben een groep van gebruikers die samenwerken op een bepaald gebied. Een Gebruikers groep is een groep gebruikers die een vergelijkbaar gebied delen. Notificatie berichten kunnen naar een Gebruikers groep gestuurd worden in plaats van naar slechts een gebruiker.</p>
<p>Gebruikers groepen kunnen ook gebruikt worden om de toegang te beheren. Toegang kan beperkt worden tot slechts de Gebruikers groep. Dan kunnen andere gebruikers deze beperkte projecten of taken niet zien en hebben er ook geen toegang toe. De toegangs beperking kan toegepast worden op project of taak niveau door de optie [Aan alle gebruikers tonen?] uit te schakelen..</p>
<p>Waar mogelijk krijgen Gebruikers groepen een eigen forum bij iedere taak en project.</p>
<br /> 
<a name=\"taskgroup\"></a>
<p><b>Taak groepen:</b></p>
<p>Het verschil tussen Taak groepen en Gebruikers groepen is voor nieuwe gebruikers misschien niet direct duidelijk. Echter, Gebruikers groepen bepalen de toegang en informatie stroom, Taak groepen zijn meer bedoeld om taakoverzichten duidelijker te maken.</p>
<p>Wanneer een project groeit en er meerdere sub-taken zijn, kan het taakoverzicht lang en onoverzichtelijk worden. Door taken samen te voegen in een Taak groep, wordt het taakoverzicht automatisch in secties (per Taak groep) gegroepeerd en is dan veel overzichtelijker. Taken die niet aan een Taak groep toegewezen zijn, worden onder de sectie 'Zonder categorie' weergegeven.</p>
<p>Kortom: als de taken in een project niet toegewezen zijn aan een Taak groep, wordt het taakoverzicht erg lang. Als tenminste één taak aan een Taak groep is toegewezen, worden alle taken weergegeven per Taak groep.</p>
<br />
<a name=\"globalaccess\"></a>
<p><b>Aan alle gebruikers tonen?</b></p>
<p>Deze optie geeft de mogelijkheid om de weergave van een taak of project te beperken tot de deelnemers van de gekozen Gebruikers groep. Wanneer deze optie is ingeschakeld kunnen alle gebruikers deze taak of dit project zien. Indien uitgeschakeld kunnen alleen de deelenemers in de Gebruikers groep deze taak of dit project zien.</p>
<p>Voor taken: Gebruikers die geen deelnemer zijn in de gekozen Gebruikers groep kunnen de taken zien in het project overzicht, maar hebben er geen toegang toe.</p>
<p>Voor projecten: Gebruikers die geen deelnemer zijn in de gekozen Gebruikers groep kunnen het project of de bijbehorende taken niet zien.</p>
<p>Indien er geen Gebruikers groep is geselecteerd heeft deze optie geen effect..</p>
<a name=\"groupaccess\"><br /></a>
<p><b>Kan iedereen in Gebruikers groep bewerken??</b></p>
<p>Deze optie bepaalt wie deze taak of dit project kan bewerken. Wanneer ingeschakeld kan iedereen in de geselecteerde Gebruikers groep dit item bewerken. Indien uitgeschakeld kan alleen de eigenaar dit bewerken.</p>
<p>Indien er geen Gebruikers groep is geselecteerd heeft deze optie geen effect..</p>
<br />
<a name=\"summarypage\"></a>
<p><b>Samenvattings pagina:</b></p>
<p>De Samenvattings pagina heeft 6 kolommen die in het kort aangeven wat de status is van iedere taak.</p>
<ul>
<li><b>Markeringen</b>:
Geeft aan of er iets nieuw is voor die taak.
Mogelijke markeringen zijn:
<ul>
<li><b>C</b>:<br />
Created. Geeft aan dat de taak aangemaakt is.<br /></li>
<li><b>M</b>:<br />
Modified. Geeft aan dat de taak gewijzigd is.<br /></li>
<li><b>P</b>:<br />
Posting. Geeft aan dat er een nieuw bericht in het forum van die taak is.<br /></li>
<li><b>F</b>:<br />
File. Geeft aan dat er een bestand opgestuurd is voor die taak.<br /></li>
</ul>
Wanneer er een markering weergegeven wordt kun je er op klikken om de bijbehorende taak weer te geven.<br /></li>
<li><b>Einddatum</b>:<br />
Geeft de vastgestelde einddatum van een taak weer.<br />
Wanneer de datum in het <span class=\"red\">rood</span> wordt weergegeven, betekent dit dat de einddatum verstreken is.
Wanneer de datum in het <span class=\"green\">groen</span> wordt weergegeven, betekent dit dat de taak vandaag afgerond moet zijn.<br /></li>
<li><b>Status</b>:<br />
Geeft de werkstatus van het item aan:
<ul>
<li><b>Ingepland</b>:<br />
Geeft aan dat de taak recent aangemaakt is, maar (bewust) nog geen einddatum heeft.</li>
<li><b>Nieuw</b>:<br />
Geeft aan dat de taak recent aangemaakt is, en wacht op gebruikers die starten aan deze taak.</li>
<li><span class=\"blue\">Wachtend</span>:<br />
Geeft aan dat het werken aan deze taak is stilgezet, in afwachting van een externe activiteit.</li>
<li><span class=\"orange\">Actief</span>:<br />
Geeft aan dat er aan deze taak gewerkt wordt.</li>
<li><span class=\"green\">Klaar</span>:<br />
Geeft aan dat deze taak afgerond is.<br /></li>
</ul>
</li>
<li><b>Eigenaar</b>:<br />
Geeft aan aan wie de taak toegewezen is. U kunt op de naam klikken om de details van die gebruiker te zien.<br /></li>
<li><b>Groep</b>:<br />
Geeft aan aan welke Gebruikers groep of Taak groep deze taak is toegewezen.
Wanneer u op de kolom titel klikt, schakelt de weergave tussen deze twee groepsoorten.<br /></li>
<li><b>Taak</b>:<br />
Geeft de naam van de taak weer.
Wanneer u op de naam van de taak klikt worden de details van deze taak weergegeven.</li>
</ul>
";
  new_box("Help", $content );
  create_bottom();
?>

