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

create_top("Hj�lp", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>Anv�ndargrupper:</b></p>
<p>De flesta projekt eller uppgifter omfattar en grupp anv�ndare som arbetar tillsammans om ett speciellt omr�de.  En anv�ndargrupp �r en grupp av anv�ndare som delar ett gemensamt arbetsomr�de.  Epost skickas till anv�ndargruppen ist�llet f�r bara till en enskild anv�ndare.</p>
<p>Anv�ndargrupper kan ocks� utnyttjas f�r att kontrollera tillg�ngligheten.  �tkomst kan begr�nsas till bara anv�ndargruppen, och d� kan inte andra anv�ndare se projektet/uppgiften och kommer heller inte att komma �t dem.  Inskr�nkning av tillg�ngligheten kan till�mpas p� projekt- eller uppgiftsniv� genom att anv�nda kryssrutan \"Skall alla anv�ndare kunna se denna uppgift?\".</p>
<p>N�r det �r till�mpligt kan anv�ndargrupper ocks� f� ett eget forum f�r varje uppgift och projekt.</p>
<br /> 
<a name=\"taskgroup\"></a>
<p><b>Uppgiftgrupper:</b></p>
<p>F�r en f�rstag�ngsanv�ndare �r det inte l�tt att se skillnaden mellan uppgiftgrupper och anv�ndargrupper.
Men skillnaden �r betydande. Anv�ndargrupper kontrollerar tillg�ngligheten och informationsfl�det. Uppgiftgrupper finns bara f�r att g�ra uppgiftslistorna mer l�sbara.</p>
<p>N�r ett projekt vuxit s� mycket att det har flera uppgifter kan listan verka l�ng och ol�slig.  Genom att l�gga uppgifter i en uppgiftgrupp blir listan automatiskt grupperad i undersektioner (efter uppgiftgrupp) och d�rmed mycket mer l�sbar. Uppgifter som inte har n�gon uppgiftgrupp kommer att grupperas under 'Inte kategoriserad'.</p>
<p>F�r att sammanfatta:  Om inga uppgifter i ett projekt tillh�r en uppgiftgrupp blir uppgiftslistan l�ng. Om �tminstone en uppgift har tilldelats en uppgiftgrupp kommer alla uppgifter att listas efter uppgiftgrupp.</p>
<br />
<a name=\"globalaccess\"></a>
<p><b>Ska alla anv�ndare kunna se denna uppgift?</b></p>
<p>Denna kryssruta g�r att man kan begr�nsa tillg�ngligheten s� att bara medlemmar i den valda anv�ndargruppen kan titta p� uppgiften/projektet. N�r rutan �r ikryssad kan alla anv�ndare titta p� projektet/uppgiften. N�r den inte �r ifylld kan bara medlemmar i anv�ndargruppen titta.</p>
<p>F�r uppgifter: Anv�ndare som inte �r med den valda anv�ndargruppen kommer att kunna se uppgifterna i projektlistan, men kommer inte att komma �t dem.</p>
<p>F�r projekt: Anv�ndare som inte �r med i den valda anv�ndargruppen kommer inte att kunna se projektet eller tillh�rande uppgifter i n�got f�nster</p>
<p>Om ingen av�ndargrupp �r vald har kryssrutan ingen effekt.</p>
<a name=\"groupaccess\"><br /></a>
<p><b>Ska alla i anv�ndargruppen kunna redigera?</b></p>
<p>Denna kryssruta till�ter alla medlemmar i en anv�ndargrupp att redigera uppgiften/projektet. N�r rutan �r ikryssad kan alla medlemmar i anv�ndargruppen redigera denna punkt. Om rutan inte �r ikryssad kan bara den ansvarige redigera denna uppgift.</p>
<p>Om ingen av�ndargrupp �r vald har kryssrutan ingen effekt.</p>
<br />
<a name=\"summarypage\"></a>
<p><b>Sammanfattning:</b></p>
<p>Sammanfattningssidan inneh�ller sex kolumner som kort visar vad som p�g�r i varje uppgift.</p>
<ul>
<li><b>Flaggor</b>:
visar om det �r n�got nytt f�r denna uppgift.
M�jligheterna �r:
<ul>
<li><b>C</b>:<br />
visar att uppgiften skapats (Created)<br /></li>
<li><b>M</b>:<br />
visar att uppgiften har �ndrats (Modified)<br /></li>
<li><b>P</b>:<br />
visar att det finns ett inl�gg Postat till uppgiftens forum<br /></li>
<li><b>F</b>:<br />
visar att en Fil skickats till denna uppgift<br /></li>
</ul>
Om det finns n�gon flagga kan man klicka p� den f�r att visa tillh�rande uppgift.<br /></li>
<li><b>Slutdatum</b>:<br />
visar n�r uppgiften ska vara f�rdig.<br />
Om datum skrivs i <span class=\"red\">r�tt</span>, �r uppgiften �ver tiden, och om datum skrivs i <span class=\"green\">gr�nt</span>,
ska uppgiften vara f�rdig idag<br /></li>
<li><b>Status</b>:<br />
visar status f�r denna punkt:
<ul>
<li><b>Planerad</b>:<br />
visar att uppgiften nyligen skapats men (medvetet) inte schemalagts �nnu</li>
<li><b>Ny</b>:<br />
visar att uppgiften nyligen skapats och v�ntar p� resurser s� att den kan startas</li>
<li><span class=\"blue\">Pausad</span>:<br />
visar att arbetet med uppgiften har stoppats i v�ntan p� n�gon yttre h�ndelse</li>
<li><span class=\"orange\">Aktiv</span>:<br />
visar att det arbetas med uppgiften</li>
<li><span class=\"green\">Klar</span>:<br />
visar att uppgiften �r f�rdig<br /></li>
</ul>
</li>
<li><b>Ansvarig</b>:<br />
visar vem som har tilldelats uppgiften. Man kan klicka p� namnet f�r att se fler uppgifter om den personen.<br /></li>
<li><b>Grupp</b>:<br />
visar antingen den anv�ndargrupp eller uppgiftgrupp som uppgiften tillh�r. Om man klickar p� kolumnens �verskrift skiftar man mellan de tv� olika grupperna.<br /></li>
<li><b>Uppgift</b>:<br />
visar uppgiftens namn. Man kan klicka p� namnet f�r att se fler uppgifter.</li>
</ul>
";
  new_box("Hj�lp", $content );
  create_bottom();
?>