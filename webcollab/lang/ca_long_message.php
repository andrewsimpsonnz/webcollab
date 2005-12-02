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

  Language files (long messages) for 'ca' (Catalan)

  Trnaslation: Daniel Hernandez (dhernan2 at pie.xtec.es)

  Maintainer: 

*/


$taskgroup_info = "<ul><li>Si esborra un taskgroup totes les seves tasques passaran a classifcar-se com a no categoritzades.</li>\n".
  "<li>Pot canviar el nom de la categoria sense interferir amb les tasques.</li>\n".
  "<li>Dos taskgroups no poden tenir el mateix nom.</li></ul>\n";

$usergroup_info = "<ul><li>Si esborra un usergroup tots els enviaments privats relacionats seran eliminats tamb�.</li>\n".
  //**
  "<li>Private usergroups can only be seen by the members of that private usergroup.</li>\n".
  "<li>Pot modificar el nom del usergroup sense interferir amb els usuaris en ell.</li>\n".
  "<li>Dos usergroups no poden tenir el mateix nombre.</li></ul>\n";

$user_info      = "Seleccioni l'acci� des del men� de l'esquerra.<br /><br />".
  "Algunes consideracions:<br />".
  "<ul>".
  //**
  "<li>Private users can only be seen by members of the same usergroup.</li>\n".
  "<li>Els usuaris s'eliminen en dues etapes, la segona �s permanent.</li>\n".
  "<li>Un usuari eliminat perd totes les seves tasques per� no els seus missatges del f�rum.</li>\n".
  "<li>Un usuari esborrat de forma permanent ho perd tot.</li>\n".
  //"<li>No es pot eliminar un usuari permanentment si aquest t� items al f�rum.</li>\n".
  "<li>Un usuari esborrat mant� els registres de les seves tasques que ha revisat, i continuar� amb aquestes despr�s de ser reactivat.</li>\n".
  "<li>TOTES les accions executades sobre un usuari seran informades a l'usuari per email.</li>\n".
  "<li>Les claus estan encriptades a la base de dades. Nom�s pot establir un de nou.</li>\n".
  "<li>Les claus s�n enviades per email a l'usuari nom�s una vegada quan l'usuari el registre, vagi amb cura quan envii aquests emails!</li>\n".
  "<li>Els usuaris poden editar el seu compte sense coneixement de l'administrador, aix� estalviar� els seu temps d'administraci�</li>\n".
  "</ul>\n";

$calendar_key    = "<i>Retornar al Men� Principal</i></a>]</b><br />\n".
        "<p><b><span class=\"underline\">Claus (colors) per al Calendari</span></b><br /><br />\n".
        "<span class=\"blue\">Projecte (amb tasques incomplertes)</span><br />\n".
        "<span class=\"green\"><span class=\"underline\">Projecte </span>(totes les tasques complertes)</span><br />\n".
        "<span class=\"red\">Tasca (no completada)</span><br />\n".
        "<span class=\"green\">Tasca (completada)</span><br /></p>\n";

?>
