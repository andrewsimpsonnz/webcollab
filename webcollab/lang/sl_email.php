<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created on Avgust 2006 by Sašo Stanojev

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

  Email text language files for 'sl' (Slovenščina)

  Maintainer: Sašo Stanojev <sass99@gmail.com>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Dodana nova datoteka: %s";
$email_file_post          = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." novo datoteko dodal uporabnik %1\$s.\n\n".
                            "Datoteka:  %2\$s\n".
                            "Opis:  %3\$s\n\n".
                            "Projekt:   %4\$s\n".
                            "Naloga:    %5\$s\n\n".
                            "Obiščite stran za več informacij.\n\n".
                            BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Novo sporočilo na forumu: %s";
$email_forum_post         = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." novo sporočilo na forumu dodal uporabnik %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Obiščite stran za več informacij.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne".$email_date." novo sporočilo na forumu dodal uporabnik %1\$s.\n\n".
                            "To sporočilo je odgovor na prejšnje sporočilo uporabnika %2\$s.\n\n".
                            "Prvotno sporočilo:\n%3\$s\n\n".
                            "----\n\n".
                            "Novo sporočilo:\n%4\$s\n\n".
                            "----\n\n".
                            "Obiščite stran za več informacij.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Naloga:   %2\$s\n".
                            "Stanje:     %3\$s\n".
                            "Lastnik:   %4\$s ( %5\$s )\n".
                            "Besedilo:\n%6\$s\n\n".
                            "Obiščite stran za več informacij.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Vaš projekt je prevzet";
$title_takeover_task      = ABBR_MANAGER_NAME.": Vaša naloga je prevzeta";

$email_takeover_task      = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME." vas obvešča, da je vašo nalogo prevzel skrbnik dne ".$email_date.".\n\n";
$email_takeover_project   = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME."vas obvešča, da je vaš projekt prevzel skrbnik dne ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nov projekt za vas";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova naloga za vas";

$email_new_owner_project  = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." ustvarjen nov projekt, katerega lastnik ste vi.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_new_owner_task     = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." ustvarjena nova naloga, katere lastnik ste vi\n\n".
                            "Sledijo podrobnosti:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nov projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova naloga: %s";

$email_new_group_project  = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." ustvarjen nov projekt.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_new_group_task     = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." ustvarjena nova naloga.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Vaš projekt je osvežen";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Vaša naloga je osvežena";

$email_edit_owner_project = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." prišlo do sprememb na projektu, katerega lastnik ste.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_edit_owner_task    = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne  ".$email_date." prišlo do sprememb pri nalogi, katere lastnik ste.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt je osvežen";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Naloga je osvežena";

$email_edit_group_project = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." prišlo do sprememb na projektu, katere lastnik je uporabnik %s.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_edit_group_task    = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." prišlo do sprememb pri nalogi, katere lastnik je uporabnik %s.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt je izbrisan";
$title_delete_task        = ABBR_MANAGER_NAME.": Naloga je izbrisana";

$email_delete_project     = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." izbrisan projekt, katerega lastnik ste vi.\n\n".
                            "Hvala, ker ste upravljali s projektom v času njegovega trajanja.\n\n";

$email_delete_task        = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." izbrisana naloga, katere lastnik ste vi.\n\n".
                            "Hvala, ker ste upravljali z nalogo v času njenega trajanja.\n\n";

$delete_list              = "Projekt:  %1\$s\n".
                            "Naloga:   %2\$s\n".
                            "Stanje:     %3\$s\n\n".
                            "Besedilo:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
                            "The members of the new usergroup are:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
                            "The members of the usergroup are:\n".
                            "%2\$s\n";

$title_welcome            = "Dobrodošli na strani ".ABBR_MANAGER_NAME;
$email_welcome            = "Pozdravljeni!\n\nSpletišče ".MANAGER_NAME." vam želi dobrodošlico dne ".$email_date.".\n\n".
                            "Ker ste novi na tej strani, naj najprej razložim nekaj stvari, preden začnete z delom.\n\n".
                            "Najprej, to je orodje za upravljanje s projekti. Na domači strani boste videli trenutno dostopne projekte. ".
                            "Če kliknete na katerokoli ime projekta, boste preusmerjeni na stran določenega projekta/naloge. Na tej strani se bo odvijalo vaše delo.\n\n".
                            "Vsak vnos, ki ga opravite ali vsaka naloga, ki jo spremenite bo ostalim uporabnikom prikazana kot 'NOV' ali 'OSVEŽEN' vnos. Seveda to deluje tudi v obratni smeri.".
                            "To vam omogoča, da hitro spoznate, na katerih projektih/nalogah je prišlo do aktivnosti.\n\n".
                            "Poleg tega lahko prevzamete lastništvo neke naloge in kasneje to nalogo tudi zamenjate, lahko pa tudi sodelujete v forumih. ".
                            "Ko boste opravljali naloge, ne pozabite označiti status naloge in besedilo, da bodo tudi ostali uporabniki v toku s spremembami.".
                            "\n\nŽelim vam veliko uspeha pri delu. Če boste naleteli na težavo, lahko pošljete e-pošto na naslov ".EMAIL_ADMIN.".\n\n --Srečno!\n\n".
                            "Uporabniško ime:    %1\$s\n".
                            "Geslo:           %2\$s\n\n".
                            "Uporabniška skupina:  %3\$s".
                            "Ime:               %4\$s\n".
                            "Naslov strani:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Sprememba na vašem uporabniškem računu s strani skrbnika";
$email_user_change1       = "Pozdravljeni!\n\n".
                            "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." prišlo do spremembe vašega uporabniškega računa s strani %1\$s ( %2\$s ) \n\n".
                            "Uporabniško ime:    %3\$s\n".
                            "Geslo:           %4\$s\n\n".
                            "Uporabniška skupina:  %5\$s".
                            "Ime:               %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Sprememba na vašem uporabniškem računu";
$email_user_change2         = "Pozdravljeni!\n\n".
                              "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." uspešno izvedena sprememba na vašem uporabniškem računu.\n\n".
                              "Uporabniško ime:  %1\$s\n".
                              "Geslo:         %2\$s\n\n".
                              "Ime:             %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Sprememba na vašem uporabniškem računu";
$email_user_change3         = "Pozdravljeni!\n\n".
                              "Spletišče ".MANAGER_NAME.", vas obvešča, da ste dne ".$email_date." uspešno izvedli spremembo na vašem uporabniškem računu.\n\n".
                              "Uporabniško ime:  %1\$s\n".
                              "vaše geslo je ostalo nespremenjeno.\n\n".
                              "Ime:             %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Vključitev računa";
$email_revive               = "Pozdravljeni!\n\n".
                              "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." vaš uporabniški račun ponovno veljaven.\n\n".
                              "Uporabniško ime:  %1\$s\n".
                              "Ime:             %2\$s\n\n".
                              "Ne morem vam poslati geslo, ker je šifrirano. \n\n".
                              "Če ste pozabili geslo, pošljite zahtevo na e-poštni naslov".EMAIL_ADMIN." za novo geslo.";

$title_delete_user          = ABBR_MANAGER_NAME.": Izključitev računa.";
$email_delete_user          = "Pozdravljeni!\n\n".
                              "Spletišče ".MANAGER_NAME.", vas obvešča, da je dne ".$email_date." vaš uporabniški račun postal neveljaven.\n\n".
                              "Žal nam je, ker nas zapuščate in zahvaljujemo se vam za vaš trud.\n\n".
                              "Če mislite, da je izključitev vašega računa napačna, nam prosim pošljite obvestilo na e-pošto ".EMAIL_ADMIN.".";

?>
