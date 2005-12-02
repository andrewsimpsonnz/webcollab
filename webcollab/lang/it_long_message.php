<?php
/*
  $Id$

  WebCollab
  ----------------------------------------
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

  Language files (long messages) for 'it' (Italian)

  Maintainer: Raffaele Franzese <r.franzese@collaltosabino.net>

*/


$taskgroup_info =   "<ul><li>Se viene cancellato un taskgroup tutte le attività ad esso relative saranno poste come Non categorizzate.</li>\n".
                      "<li>E' possibile modificare il nome di una categoria senza interferire con le attività ad essa associate.</li>\n".
                      "<li>Due taskgroups non possono avere lo stesso nome.</li></ul>\n";

$usergroup_info =   "<ul><li>Se viene cancellato uno usergroup tutti i relativi messaggi del forum privato saranno cancellati.</li>\n".
                      //**
                      "<li>Gli usergroups privati possono essere visualizzati solo dai propri utenti.</li>\n".
                      "<li>E' possibile modificare il nome di uno usergroup senza interferire con gli utenti ad esso associati.</li>\n".
                      "<li>Due usergroups non possono avere lo stesso nome.</li></ul>\n";

$user_info      =   "Seleziona un'azione dal menu di sinistra.<br /><br />".
                      "Alcune informazioni:<br />".
                      "<ul>".
                      //**
                      "<li>Gli utenti privati possono essere visualizzati solo dagli utenti dello stesso usergroup.</li>\n".
                      "<li>Gli utenti hanno due livelli di cancellazione, il secondo è definitivo.</li>\n".
                      "<li>Un utente cancellato perde tutti i suoi tasks ma non i messaggi del forum.</li>\n".
                      "<li>Un utente cancellato definitivamente perde tutto.</li>\n".
                      //"<li>Non può essere cancellato definitivamente un utente che ha forum items.</li>\n".
                      "<li>Un utente cancellato mantiene la registrazione delle attività che ha visualizzato e procederà nel lavoro con questa lista dopo il suo ripristino.</li>\n".
                      "<li>Tutte le azioni effettuate dall'utente sono inviate per email all'utente.</li>\n".
                      "<li>Tutte le Passwords sono crittate nel database. E' possibile solo inserirne una nuova.</li>\n".
                      "<li>Le Passwords sono inviate via email all'utente solo quando sono create!</li>\n".
                      "<li>Gli utenti possono modificare le proprie informazioni autonomamente</li>\n".
                      "</ul>\n";

$calendar_key    =  "<i>Torna al Menu Principale</i></a>]</b><br />\n".
                      "<p><b><span class=\"underline\">Key to Calendar</span></b><br /><br />\n".
                      "<span class=\"blue\">Progetto (con attività non completate)</span><br />\n".
                      "<span class=\"green\"><span class=\"underline\">Progetto </span>(attività completate)</span><br />\n".
                      "<span class=\"red\">Attività (Non completate)</span><br />\n".
                      "<span class=\"green\">Attività (completate)</span><br />\n";

?>
