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
<a name=\"usergroup\"></a>
<p><b>Nutzergruppen:</b></p>
Die meisten Projekte oder Aufgaben haben eine Gruppe von Nutzern, die in einem bestimmten Bereich zusammenarbeiten.
Eine Nutzergruppe ist eine Gruppe von Nutzern, die einen ähnlichen Arbeitsbereich gemeinsam haben.
Benachrichtigungsemails können an Nutzergruppen gesendet werden, anstatt nur an einen einzelnen
Nutzer.
</p>
<p>Nutzergruppen können auch dazu verwendet werden, die Zugriffsrechte zu kontrollieren. Der Zugriff kann auf
die Nutzergruppe beschränkt werden. In einem solchen Fall werden andere Nutzer nicht in der Lage sein,
die eingeschränkten Projekte oder Aufgaben zu sehen oder darauf zuzugreifen. Die Zugriffsbeschränkung
kann mit der Checkbox &quot;Können alle Nutzer diese Aufgabe einsehen?&quot; auf Projekt- oder Aufgabenebene
eingestellt werden.
</p>
<p>Wenn möglich, erhalten Nutzergruppen auch ihr eigenes privates Forum zu jeder Aufgabe und jedem Projekt.
</p>
<a name=\"taskgroup\"></a>
<p><b>Aufgabengruppen:</b></p>
<p>Der Unterschied zwischen Aufgabengruppen und Nutzergruppen ist nicht offensichtlich, aber markant.
Nutzergruppen kontrollieren Zugriff und Informationsfluß; Aufgabengruppen machen die Aufgabenliste einfach nur besser lesbar.
</p>
<p>Wenn ein Projekt viele Unteraufgaben hat, kann die Liste lang und unlesbar werden.
Durch das Zuweisen einer Aufgabengruppe an die jeweiligen Aufgaben, werden sie in der
Liste automatisch in Absätze nach Aufgabengruppen gruppiert. Aufgaben ohne Aufgabengruppe
werden unter der Gruppe 'Nicht eingeordnet' einsortiert.
</p>
<p>Wenn keine Aufgabe in einem Projekt eine Aufgabengruppe zugeordnet bekommen hat, werden die Aufgaben
in einer langen Liste angezeigt. Wenn eine Aufgabe einer Aufgabengruppe zugeordnet worden ist,
werden alle Aufgaben nach Aufgabengruppe sortiert angezeigt.
</p>
<a name=\"globalaccess\"></a>
<p><b>Können alle Nutzer diese Aufgabe einsehen?</b></p>
<p>Dieses Auswahlfeld erlaubt es, das Einsehen von Aufgaben oder Projekten auf Mitglieder der gewählten
Nutzergruppe einzuschränken. Wenn das Auswahlfeld deaktiviert ist, dürfen alle Nutzer die
Aufgabe oder das Projekt einsehen.
</p>
<p>Bei Aufgaben: Nutzer, die nicht in der Nutzergruppe sind, können die Aufgabe in der Projektanzeige sehen, aber
können sie nicht einsehen.
</p>
<p>Bei Projekten: Nutzer, die nicht in der Nutzergruppe sind, bekommen das Projekt oder zugehörige Aufgaben
nicht zu sehen.
</p>
<p>Wenn keine Nutzergruppe für die Aufgabe oder das Projekt festgelegt wurde, hat dieses Auswahlfeld keinen
Effekt.
</p>
<a name=\"groupaccess\"></a>
<p><b>Kann jeder in der Benutzergruppe bearbeiten?</b></p>
Dieses Auswahlfeld erlaubt es allen Mitgliedern einer Nutzergruppe, ein Projekt oder eine Aufgabe zu bearbeiten.
Wenn dieses Auswahlfeld aktiviert ist, können alle Mitglieder der Nutzergruppe bearbeiten. Ist es deaktiviert,
darf nur der Eigentümer bearbeiten.
</p>
<p>Wenn keine Nutzergruppe festgelegt wurde, hat dieses Auswahlfeld keinen Effekt.
<a name=\"summarypage\"></a>
<p><b>übersichtsseite:</b></p>
<p>Die übersichtsseite enthält 6 Spalten, die kurz zusammenfassen, was mit jeder Aufgabe vor sich geht.
<ul>
<li><b>Optionen</b>:<br />
Zeigt an, daß an dieser Aufgabe etwas neu ist.
Die Zeichen bedeuten:
<ul>
<li><b>C</b>:<br />
Aufgabe neu erstellt (created)</li>
<li><b>M</b>:<br />
Aufgabe modifiziert</li>
<li><b>P</b>:<br />
neue Mitteilung (posting) im Forum der Aufgabe</li>
<li><b>F</b>:<br />
Datei (file) wurde hochgeladen</li>
</ul>
Durch Klicken auf die Zeichen, gelangt man zur dazugehörigen Aufgabe.</li>
<li><b>Fertigstellungszeitpunkt</b>:<br />
Zeigt an, wann eine Aufgabe fertiggestellt sein muß.
Wenn das Datum in <span class=\"red\">rot</span> erscheint,
ist die Aufgabe überfällig; wenn die Aufgabe <span class=\"green\">grün</span> erscheint,
ist die Aufgabe heute fällig</li>
<li><b>Zustand</b>:<br />
zeigt den Arbeitsstatus der Aufgabe an:
<ul>
<li><b>Geplant</b>:<br />
Die Aufgabe wurde vor kurzem erstellt,
aber (absichtlich) ohne Fertigstellungszeitpunkt</li>
<li><b>Neu</b>:<br />
Die Aufgabe wurde neu erstellt und
wartet auf Ressourcen, um zu beginnen</li>
<li><span class=\"blue\">Warten</span>:
Die Arbeit an der Aufgabe ist angehalten, weil auf ein externes Ereignis
gewartet wird</li>
<li><span class=\"orange\">Aktiv</span>:
an der Aufgabe wird gearbeitet</li>
<li><span class=\"green\">Abgeschlossen</span>:
Die Aufgabe wurde fertiggestellt.</li>
</ul>
</li>
<li><b>Eigentümer</b>:<br />
Zeigt an, wem die Aufgabe zugewiesen wurde.
Man kann auf den Namen klicken, um mehr über die Person herauszufinden.</li>
<li><b>Gruppe</b>:<br />
Nutzergruppe oder Aufgabengruppe der Aufgabe.
Mit Klick auf dem Spaltenkopf wird zwischen den beiden Ansichten umgeschalten.</li>
<li><b>Aufgabe</b>:<br />
Klick auf den Spaltenkopf sortiert nach Aufgabennamen.</li>
</ul>
";
  new_box("Help", $content );
  create_bottom();
?>
