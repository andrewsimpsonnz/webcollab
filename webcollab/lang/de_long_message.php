<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson
  
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

  Language files (long messages) for 'de' (German)

  Maintainer: Michael Bunk <micha137 at users.sourceforge.net>

*/


$taskgroup_info =   "<ul><li>Wenn eine Aufgabengruppe gel�scht wird, wird die Zuordnung ihrer Aufgaben zur�ckgesetzt.</li>\n".
                      "<li>Der Name einer Aufgabengruppe kann ohne Nebenwirkung auf die Aufgabenzuordnung ge�ndert werden.</li>\n".
                      "<li>Es d�rfen keine zwei Aufgabengruppen mit dem gleichen Namen existieren.</li></ul>\n";

$usergroup_info =   "<ul><li>Wenn eine Nutzergruppe gel�scht wird, werden alle zugeh�rigen privaten Forumsbeitr�ge gel�scht.</li>\n".
                      "<li>Private Nutzergruppen k�nnen nur von Mitgliedern dieser privaten Nutzergruppe gesehen werden.</li>\n".
                      "<li>Der Name einer Nutzergruppe kann ohne Nebenwirkung auf die zugeordneten Nutzer ge�ndert werden.</li>\n".
                      "<li>Es d�rfen keine zwei Nutzergruppen mit dem gleichen Namen existieren.</li></ul>\n";

$user_info      =    "Bitte w�hlen sie ihre Aktion aus dem Men� links.<br /><br />".
                      "Hinweise:<br />".
                      "<ul>".
                      "<li>Private Nutzer k�nnen nur von Mitgliedern der gleichen Nutzergruppe gesehen werden.</li>\n".
                      "<li>Nutzer haben zwei Stadien des Gel�schtseins. Das zweite ist dauerhaft.</li>\n".
                      "<li>Ein gel�schter Nutzer verliert alle seine Aufgaben, aber nicht seine Forumsbeitr�ge.</li>\n".
                      "<li>Ein dauerhaft gel�schter Nutzer hat alles verloren.</li>\n".
                      "<li>Ein gel�schter Nutzer beh�lt die Sichtbarkeit der f�r ihn sichtbaren Aufgaben und erh�lt sie nach der Wiederbelebung zur�ck.</li>\n".
                      "<li>ALLE Aktionen, die mit einem Nutzer geschehen, werden ihm/ihr per Email mitgeteilt.</li>\n".
                      "<li>Die Passw�rter werden verschl�sselt in der Datenbank gespeichert. Man kann nur neue vergeben.</li>\n".
                      "<li>Passw�rter werden nach der Vergabe an den Nutzer gesendet. Also aufpassen, an wen gemailt wird!</li>\n".
                      "<li>Nutzer k�nnen sich selbst bearbeiten, ohne da� die Administratoren das erfahren. Dies soll Zeit und Spam sparen.</li>\n".
                      "</ul>\n";

$calendar_key    =  "<i>Zur�ck zum Hauptmen�</i></a>]</b><br />\n".
                      "<p><b><span class=\"underline\">Hinweise zum Kalender</span></b><br /><br />\n".
                      "<span class=\"blue\">Projekt (mit offenen Aufgaben)</span><br />\n".
                      "<span class=\"green\"><span class=\"underline\">Projekt </span>(alle Aufgaben fertiggestellt)</span><br />\n".
                      "<span class=\"red\">Aufgabe (offen)</span><br />\n".
                      "<span class=\"green\">Aufgabe (fertiggestellt)</span><br />\n";

?>