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

  Translation by: Michael Bunk

*/

//get our location
require_once("path.php" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
<a name=\"usergroup\"><br /></a>
<b>Nutzergruppen:</b><br />
Die meisten Projekte oder Aufgaben haben eine Gruppe von Nutzern, die in einem bestimmten Bereich zusammenarbeiten.
Eine Nutzergruppe ist eine Gruppe von Nutzern, die einen &auml;hnlichen Arbeitsbereich gemeinsam haben.
Benachrichtigungsemails k&ouml;nnen an Nutzergruppen gesendet werden, anstatt nur an einen einzelnen
Nutzer.<br />
<br />
Nutzergruppen k&ouml;nnen auch dazu verwendet werden, die Zugriffsrechte zu kontrollieren. Der Zugriff kann auf
die Nutzergruppe beschr&auml;nkt werden. In einem solchen Fall werden andere Nutzer nicht in der Lage sein,
die eingeschr&auml;nkten Projekte oder Aufgaben zu sehen oder darauf zuzugreifen. Die Zugriffsbeschr&auml;nkung
kann mit der Checkbox &quot;K&ouml;nnen alle Nutzer diese Aufgabe einsehen?&quot; auf Projekt- oder Aufgabenebene
eingestellt werden.<br />
<br />
Wenn m&ouml;glich, erhalten Nutzergruppen auch ihr eigenes privates Forum zu jeder Aufgabe und jedem Projekt.<br />
<br />

<a name=\"taskgroup\"><br /></a>
<b>Aufgabengruppen:</b><br />
Der Unterschied zwischen Aufgabengruppen und Nutzergruppen ist nicht offensichtlich, aber markant.
Nutzergruppen kontrollieren Zugriff und Informationsflu&szlig;; Aufgabengruppen machen die Aufgabenliste einfach nur besser
lesbar.<br />
<br />
Wenn ein Projekt viele Unteraufgaben hat, kann die Liste lang und unlesbar werden.
Durch das Zuweisen einer Aufgabengruppe an die jeweiligen Aufgaben, werden sie in der
Liste automatisch in Abs&auml;tze nach Aufgabengruppen gruppiert. Aufgaben ohne Aufgabengruppe
werden unter der Gruppe 'Nicht eingeordnet' einsortiert.<br />
<br />
Wenn keine Aufgabe in einem Projekt eine Aufgabengruppe zugeordnet bekommen hat, werden die Aufgaben
in einer langen Liste angezeigt. Wenn eine Aufgabe einer Aufgabengruppe zugeordnet worden ist,
werden alle Aufgaben nach Aufgabengruppe sortiert angezeigt.<br />
<br />

<a name=\"globalaccess\"><br /></a>
<b>K&ouml;nnen alle Nutzer diese Aufgabe einsehen?</b><br />
Dieses Auswahlfeld erlaubt es, das Einsehen von Aufgaben oder Projekten auf Mitglieder der gew&auml;hlten
Nutzergruppe einzuschr&auml;nken. Wenn das Auswahlfeld deaktiviert ist, d&uuml;rfen alle Nutzer die
Aufgabe oder das Projekt einsehen.<br />
<br />
Bei Aufgaben: Nutzer, die nicht in der Nutzergruppe sind, k&ouml;nnen die Aufgabe in der Projektanzeige sehen, aber
k&ouml;nnen sie nicht einsehen.<br />
<br />
Bei Projekten: Nutzer, die nicht in der Nutzergruppe sind, bekommen das Projekt oder zugeh&ouml;rige Aufgaben
nicht zu sehen.<br />
<br />
Wenn keine Nutzergruppe f&uuml;r die Aufgabe oder das Projekt festgelegt wurde, hat dieses Auswahlfeld keinen
Effekt.<br />
<br /> 

<a name=\"groupaccess\"><br /></a>
<b>Kann jeder in der Benutzergruppe bearbeiten?</b><br />
Dieses Auswahlfeld erlaubt es allen Mitgliedern einer Nutzergruppe, ein Projekt oder eine Aufgabe zu bearbeiten.
Wenn dieses Auswahlfeld aktiviert ist, k&ouml;nnen alle Mitglieder der Nutzergruppe bearbeiten. Ist es deaktiviert,
darf nur der Eigent&uuml;mer bearbeiten.<br />
<br />
Wenn keine Nutzergruppe festgelegt wurde, hat dieses Auswahlfeld keinen Effekt.<br />
<br /> 

<a name=\"summarypage\"><br /></a>
<b>&uuml;bersichtsseite:</b><br />
Die &uuml;bersichtsseite enth&auml;lt 6 Spalten, die kurz zusammenfassen, was mit jeder Aufgabe vor sich geht.
<ul>
<li><b>Optionen</b>:
Zeigt an, da&szlig; an dieser Aufgabe etwas neu ist.
Die Zeichen bedeuten:
<ul>
<li><b>C</b>:
Aufgabe neu erstellt (created)</li>
<li><b>M</b>:
Aufgabe modifiziert</li>
<br />
<li><b>P</b>:
neue Mitteilung (posting) im Forum der Aufgabe</li>
<br />
<li><b>F</b>:
Datei (file) wurde hochgeladen</li>
</ul>
Durch Klicken auf die Zeichen, gelangt man zur dazugeh&ouml;rigen Aufgabe.</li>
<br />
<li><b>Fertigstellungszeitpunkt</b>:
Zeigt an, wann eine Aufgabe fertiggestellt sein mu&szlig;.
Wenn das Datum in <font color=\"red\">rot</font> erscheint,
ist die Aufgabe &uuml;berf&auml;llig; wenn die Aufgabe <font color=\"green\">gr&uuml;n</font> erscheint,
ist die Aufgabe heute f&auml;llig</li>
<br />
<li><b>Zustand</b>:
zeigt den Arbeitsstatus der Aufgabe an:
<ul>
<li><b>Geplant</b>:
Die Aufgabe wurde vor kurzem erstellt,
aber (absichtlich) ohne Fertigstellungszeitpunkt</li>
<li><b>Neu</b>:
Die Aufgabe wurde neu erstellt und
wartet auf Ressourcen, um zu beginnen</li>
<li><font color=\"blue\">Warten</font>:
Die Arbeit an der Aufgabe ist angehalten, weil auf ein externes Ereignis
gewartet wird</li>
<li><font color=\"orange\">Aktiv</font>:
an der Aufgabe wird gearbeitet</li>
<li><font color=\"darkgreen\">Abgeschlossen</font>:
Die Aufgabe wurde fertiggestellt.</li>
</ul>
</li>
<br />
<li><b>Eigent&uuml;mer</b>:
Zeigt an, wem die Aufgabe zugewiesen wurde.
Man kann auf den Namen klicken, um mehr &uuml;ber die Person herauszufinden.</li>
<br />
<li><b>Gruppe</b>:
Nutzergruppe oder Aufgabengruppe der Aufgabe.
Mit Klick auf dem Spaltenkopf wird zwischen den beiden Ansichten umgeschalten.</li>
<br />
<li><b>Aufgabe</b>:
Klick auf den Spaltenkopf sortiert nach Aufgabennamen.</li>
</ul>
";
  new_box("Help", $content );
  create_bottom();
?>
