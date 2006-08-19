<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created on Avgust 2006 by Sa�o Stanojev

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

  Email text language files for 'si' (Sloven��ina)

  Maintainer: Sa�o Stanojev <sass99@gmail.com>

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y h:i T' );

$title_file_post          = ABBR_MANAGER_NAME.": Dodana nova datoteka: %s";
$email_file_post          = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." novo datoteko dodal uporabnik %1\$s.\n\n".
                            "Datoteka:  %2\$s\n".
                            "Opis:  %3\$s\n\n".
                            "Obi��ite stran za ve� informacij.\n\n".
                            BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Novo sporo�ilo na forumu: %s";
$email_forum_post         = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." novo sporo�ilo na forumu dodal uporabnik %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Obi��ite stran za ve� informacij.\n\n".
                            BASE_URL."\n";
                            
$email_forum_reply        = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne".$email_date." novo sporo�ilo na forumu dodal uporabnik %1\$s.\n\n".
                            "To sporo�ilo je odgovor na prej�nje sporo�ilo uporabnika %2\$s.\n\n".
                            "Prvotno sporo�ilo:\n%3\$s\n\n".
                            "----\n\n".
                            "Novo sporo�ilo:\n%4\$s\n\n".
                            "----\n\n".
                            "Obi��ite stran za ve� informacij.\n\n".
                            BASE_URL."\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Naloga:   %2\$s\n".
                            "Stanje:     %3\$s\n".
                            "Lastnik:   %4\$s ( %5\$s )\n".
                            "Besedilo:\n%6\$s\n\n".
                            "Obi��ite stran za ve� informacij.\n\n".
                            BASE_URL."\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Va� projekt je prevzet";
$title_takeover_task      = ABBR_MANAGER_NAME.": Va�a naloga je prevzeta";

$email_takeover_task      = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME." vas obve��a, da je va�o nalogo prevzel skrbnik dne ".$email_date.".\n\n";
$email_takeover_project   = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME."vas obve��a, da je va� projekt prevzel skrbnik dne ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nov projekt za vas";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova naloga za vas";

$email_new_owner_project  = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." ustvarjen nov projekt, katerega lastnik ste vi.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_new_owner_task     = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." ustvarjena nova naloga, katere lastnik ste vi\n\n".
                            "Sledijo podrobnosti:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nov projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova naloga: %s";

$email_new_group_project  = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." ustvarjen nov projekt.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_new_group_task     = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." ustvarjena nova naloga.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Va� projekt je osve�en";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Va�a naloga je osve�ena";

$email_edit_owner_project = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." pri�lo do sprememb na projektu, katerega lastnik ste.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_edit_owner_task    = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne  ".$email_date." pri�lo do sprememb pri nalogi, katere lastnik ste.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt je osve�en";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Naloga je osve�ena";

$email_edit_group_project = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." pri�lo do sprememb na projektu, katere lastnik je uporabnik %s.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_edit_group_task    = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." pri�lo do sprememb pri nalogi, katere lastnik je uporabnik %s.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt je izbrisan";
$title_delete_task        = ABBR_MANAGER_NAME.": Naloga je izbrisana";

$email_delete_project     = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." izbrisan projekt, katerega lastnik ste vi.\n\n".
                            "Hvala, ker ste upravljali s projektom v �asu njegovega trajanja.\n\n";

$email_delete_task        = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." izbrisana naloga, katere lastnik ste vi.\n\n".
                            "Hvala, ker ste upravljali z nalogo v �asu njenega trajanja.\n\n";

$delete_list              = "Projekt:  %1\$s\n".
                            "Naloga:   %2\$s\n".
                            "Stanje:     %3\$s\n\n".
                            "Besedilo:\n%4\$s\n\n";

$title_welcome            = "Dobrodo�li na strani ".ABBR_MANAGER_NAME;
$email_welcome            = "Pozdravljeni!\n\nSpleti��e ".MANAGER_NAME." vam �eli dobrodo�lico dne ".$email_date.".\n\n".
                            "Ker ste novi na tej strani, naj najprej razlo�im nekaj stvari, preden za�nete z delom.\n\n".
                            "Najprej, to je orodje za upravljanje s projekti. Na doma�i strani boste videli trenutno dostopne projekte. ".
                            "�e kliknete na katerokoli ime projekta, boste preusmerjeni na stran dolo�enega projekta/naloge. Na tej strani se bo odvijalo va�e delo.\n\n".
                            "Vsak vnos, ki ga opravite ali vsaka naloga, ki jo spremenite bo ostalim uporabnikom prikazana kot 'NOV' ali 'OSVE�EN' vnos. Seveda to deluje tudi v obratni smeri.".
                            "To vam omogo�a, da hitro spoznate, na katerih projektih/nalogah je pri�lo do aktivnosti.\n\n".
                            "Poleg tega lahko prevzamete lastni�tvo neke naloge in kasneje to nalogo tudi zamenjate, lahko pa tudi sodelujete v forumih. ".
                            "Ko boste opravljali naloge, ne pozabite ozna�iti status naloge in besedilo, da bodo tudi ostali uporabniki v toku s spremembami.".
                            "\n\n�elim vam veliko uspeha pri delu. �e boste naleteli na te�avo, lahko po�ljete e-po�to na naslov ".EMAIL_ADMIN.".\n\n --Sre�no!\n\n".
                            "Uporabni�ko ime:    %1\$s\n".
                            "Geslo:           %2\$s\n\n".
                            "Uporabni�ka skupina:  %3\$s".
                            "Ime:               %4\$s\n".
                            "Naslov strani:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Sprememba na va�em uporabni�kem ra�unu s strani skrbnika";
$email_user_change1       = "Pozdravljeni!\n\n".
                            "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." pri�lo do spremembe va�ega uporabni�kega ra�una s strani %1\$s ( %2\$s ) \n\n".
                            "Uporabni�ko ime:    %3\$s\n".
                            "Geslo:           %4\$s\n\n".
                            "Uporabni�ka skupina:  %5\$s".
                            "Ime:               %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Sprememba na va�em uporabni�kem ra�unu";
$email_user_change2         = "Pozdravljeni!\n\n".
                              "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." uspe�no izvedena sprememba na va�em uporabni�kem ra�unu.\n\n".
                              "Uporabni�ko ime:  %1\$s\n".
                              "Geslo:         %2\$s\n\n".
                              "Ime:             %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Sprememba na va�em uporabni�kem ra�unu";
$email_user_change3         = "Pozdravljeni!\n\n".
                              "Spleti��e ".MANAGER_NAME.", vas obve��a, da ste dne ".$email_date." uspe�no izvedli spremembo na va�em uporabni�kem ra�unu.\n\n".
                              "Uporabni�ko ime:  %1\$s\n".
                              "va�e geslo je ostalo nespremenjeno.\n\n".
                              "Ime:             %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Vklju�itev ra�una";
$email_revive               = "Pozdravljeni!\n\n".
                              "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." va� uporabni�ki ra�un ponovno veljaven.\n\n".
                              "Uporabni�ko ime:  %1\$s\n".
                              "Ime:             %2\$s\n\n".
                              "Ne morem vam poslati geslo, ker je �ifrirano. \n\n".
                              "�e ste pozabili geslo, po�ljite zahtevo na e-po�tni naslov".EMAIL_ADMIN." za novo geslo.";

$title_delete_user          = ABBR_MANAGER_NAME.": Izklju�itev ra�una.";
$email_delete_user          = "Pozdravljeni!\n\n".
                              "Spleti��e ".MANAGER_NAME.", vas obve��a, da je dne ".$email_date." va� uporabni�ki ra�un postal neveljaven.\n\n".
                              "�al nam je, ker nas zapu��ate in zahvaljujemo se vam za va� trud.\n\n".
                              "�e mislite, da je izklju�itev va�ega ra�una napa�na, nam prosim po�ljite obvestilo na e-po�to ".EMAIL_ADMIN.".";

?>
