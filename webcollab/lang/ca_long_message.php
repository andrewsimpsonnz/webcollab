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

  Trnaslation: Daniel Hernandez (dhernan2@pie.xtec.es)

  Maintainer: 

*/


$taskgroup_info = "<BR><UL><LI>Si esborra un taskgroup totes les seves tasques passaran a classifcar-se com a no categoritzades.</LI>\n".
  "<LI>Pot canviar el nom de la categoria sense interferir amb les tasques.</LI>\n".
  "<LI>Dos taskgroups no poden tenir el mateix nom.</LI></UL><BR>\n";

$usergroup_info = "<BR><UL><LI>Si esborra un usergroup tots els enviaments privats relacionats seran eliminats tamb&eacute;.</LI>\n".
  "<LI>Pot modificar el nom del usergroup sense interferir amb els usuaris en ell.</LI>\n".
  "<LI>Dos usergroups no poden tenir el mateix nombre.</LI></UL><BR><BR>\n";

$user_info      = "<BR>Seleccioni l'acci&oacute; des del men&uacute; de l'esquerra.<BR><BR>".
  "Algunes consideracions:<BR>".
  "<UL>".
  "<LI>Els usuaris s'eliminen en dues etapes, la segona &eacute;s permanent.</LI>\n".
  "<LI>Un usuari eliminat perd totes les seves tasques per&ograve; no els seus missatges del f&ograve;rum.</LI>\n".
  "<LI>Un usuari esborrat de forma permanent ho perd tot.</LI>\n".
  "<LI>No es pot eliminar un usuari permanentment si aquest t&eacute; items al f&ograve;rum.</LI>\n".
  "<LI>Un usuari esborrat mant&eacute; els registres de les seves tasques que ha revisat, i continuar&agrave; amb aquestes despr&eacute;s de ser reactivat.</LI>\n".
  "<LI>TOTES les accions executades sobre un usuari seran informades a l'usuari per email.</LI>\n".
  "<LI>Les claus estan encriptades a la base de dades. Nom&eacute;s pot establir un de nou.</LI>\n".
  "<LI>Les claus s&oacute;n enviades per email a l'usuari nom&eacute;s una vegada quan l'usuari el registre, vagi amb cura quan envii aquests emails!</LI>\n".
  "<LI>Els usuaris poden editar el seu compte sense coneixement de l'administrador, aix&ograve; estalviar&agrave; els seu temps d'administraci&oacute;</LI>\n".
  "</UL><BR>\n";

$calendar_key    = "<I>Retornar al Men&uacute; Principal</I></A>]</B><BR>\n".
        "<P><B><U>Claus (colors) per al Calendari</U></B><BR><BR>\n".
        "<FONT color=\"blue\">Projecte (amb tasques incomplertes)</FONT><BR>\n".
        "<FONT color=\"green\"><U>Projecte </U>(totes les tasques complertes)</FONT><BR>\n".
        "<FONT color=\"red\">Tasca (no completada)</FONT><BR>\n".
        "<FONT color=\"green\">Tasca (completada)</FONT><BR>\n";

?>
