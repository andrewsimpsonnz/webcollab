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

  Help page

*/

//get our location
require_once("path.php" );

include_once(BASE."includes/screen.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "se" );

create_top("Hjälp", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>Användargrupper:</b></p>
<p>De flesta projekt eller uppgifter omfattar en grupp användare som arbetar tillsammans om ett speciellt område.  En användargrupp är en grupp av användare som delar ett gemensamt arbetsområde.  Epost skickas till användargruppen istället för bara till en enskild användare.</p>
<p>Användargrupper kan också utnyttjas för att kontrollera tillgängligheten.  Åtkomst kan begränsas till bara användargruppen, och då kan inte andra användare se projektet/uppgiften och kommer heller inte att komma åt dem.  Inskränkning av tillgängligheten kan tillämpas på projekt- eller uppgiftsnivå genom att använda kryssrutan \"Skall alla användare kunna se denna uppgift?\".</p>
<p>När det är tillämpligt kan användargrupper också få ett eget forum för varje uppgift och projekt.</p>
<br /> 
<a name=\"taskgroup\"></a>
<p><b>Uppgiftgrupper:</b></p>
<p>För en förstagångsanvändare är det inte lätt att se skillnaden mellan uppgiftgrupper och användargrupper.
Men skillnaden är betydande. Användargrupper kontrollerar tillgängligheten och informationsflödet. Uppgiftgrupper finns bara för att göra uppgiftslistorna mer läsbara.</p>
<p>När ett projekt vuxit så mycket att det har flera uppgifter kan listan verka lång och oläslig.  Genom att lägga uppgifter i en uppgiftgrupp blir listan automatiskt grupperad i undersektioner (efter uppgiftgrupp) och därmed mycket mer läsbar. Uppgifter som inte har någon uppgiftgrupp kommer att grupperas under 'Inte kategoriserad'.</p>
<p>För att sammanfatta:  Om inga uppgifter i ett projekt tillhör en uppgiftgrupp blir uppgiftslistan lång. Om åtminstone en uppgift har tilldelats en uppgiftgrupp kommer alla uppgifter att listas efter uppgiftgrupp.</p>
<br />
<a name=\"globalaccess\"></a>
<p><b>Ska alla användare kunna se denna uppgift?</b></p>
<p>Denna kryssruta gör att man kan begränsa tillgängligheten så att bara medlemmar i den valda användargruppen kan titta på uppgiften/projektet. När rutan är ikryssad kan alla användare titta på projektet/uppgiften. När den inte är ifylld kan bara medlemmar i användargruppen titta.</p>
<p>För uppgifter: Användare som inte är med den valda användargruppen kommer att kunna se uppgifterna i projektlistan, men kommer inte att komma åt dem.</p>
<p>För projekt: Användare som inte är med i den valda användargruppen kommer inte att kunna se projektet eller tillhörande uppgifter i något fönster</p>
<p>Om ingen avändargrupp är vald har kryssrutan ingen effekt.</p>
<a name=\"groupaccess\"><br /></a>
<p><b>Ska alla i användargruppen kunna redigera?</b></p>
<p>Denna kryssruta tillåter alla medlemmar i en användargrupp att redigera uppgiften/projektet. När rutan är ikryssad kan alla medlemmar i användargruppen redigera denna punkt. Om rutan inte är ikryssad kan bara den ansvarige redigera denna uppgift.</p>
<p>Om ingen avändargrupp är vald har kryssrutan ingen effekt.</p>
<br />
<a name=\"summarypage\"></a>
<p><b>Sammanfattning:</b></p>
<p>Sammanfattningssidan innehåller sex kolumner som kort visar vad som pågår i varje uppgift.</p>
<ul>
<li><b>Flaggor</b>:
visar om det är något nytt för denna uppgift.
Möjligheterna är:
<ul>
<li><b>C</b>:<br />
visar att uppgiften skapats (Created)<br /></li>
<li><b>M</b>:<br />
visar att uppgiften har ändrats (Modified)<br /></li>
<li><b>P</b>:<br />
visar att det finns ett inlägg Postat till uppgiftens forum<br /></li>
<li><b>F</b>:<br />
visar att en Fil skickats till denna uppgift<br /></li>
</ul>
Om det finns någon flagga kan man klicka på den för att visa tillhörande uppgift.<br /></li>
<li><b>Slutdatum</b>:<br />
visar när uppgiften ska vara färdig.<br />
Om datum skrivs i <span class=\"red\">rött</span>, är uppgiften över tiden, och om datum skrivs i <span class=\"green\">grönt</span>,
ska uppgiften vara färdig idag<br /></li>
<li><b>Status</b>:<br />
visar status för denna punkt:
<ul>
<li><b>Planerad</b>:<br />
visar att uppgiften nyligen skapats men (medvetet) inte schemalagts ännu</li>
<li><b>Ny</b>:<br />
visar att uppgiften nyligen skapats och väntar på resurser så att den kan startas</li>
<li><span class=\"blue\">Pausad</span>:<br />
visar att arbetet med uppgiften har stoppats i väntan på någon yttre händelse</li>
<li><span class=\"orange\">Aktiv</span>:<br />
visar att det arbetas med uppgiften</li>
<li><span class=\"green\">Klar</span>:<br />
visar att uppgiften är färdig<br /></li>
</ul>
</li>
<li><b>Ansvarig</b>:<br />
visar vem som har tilldelats uppgiften. Man kan klicka på namnet för att se fler uppgifter om den personen.<br /></li>
<li><b>Grupp</b>:<br />
visar antingen den användargrupp eller uppgiftgrupp som uppgiften tillhör. Om man klickar på kolumnens överskrift skiftar man mellan de två olika grupperna.<br /></li>
<li><b>Uppgift</b>:<br />
visar uppgiftens namn. Man kan klicka på namnet för att se fler uppgifter.</li>
</ul>
";
  new_box("Hjälp", $content );
  create_bottom();
?>