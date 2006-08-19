<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created on Avgust 2006 by Sa¹o Stanojev

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

  Email text language files for 'si' (Sloven¹èina)

  Maintainer: Sa¹o Stanojev <sass99@gmail.com>

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y h:i T' );

$title_file_post          = ABBR_MANAGER_NAME.": Dodana nova datoteka: %s";
$email_file_post          = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." novo datoteko dodal uporabnik %1\$s.\n\n".
                            "Datoteka:  %2\$s\n".
                            "Opis:  %3\$s\n\n".
                            "Obi¹èite stran za veè informacij.\n\n".
                            BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Novo sporoèilo na forumu: %s";
$email_forum_post         = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." novo sporoèilo na forumu dodal uporabnik %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Obi¹èite stran za veè informacij.\n\n".
                            BASE_URL."\n";
                            
$email_forum_reply        = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne".$email_date." novo sporoèilo na forumu dodal uporabnik %1\$s.\n\n".
                            "To sporoèilo je odgovor na prej¹nje sporoèilo uporabnika %2\$s.\n\n".
                            "Prvotno sporoèilo:\n%3\$s\n\n".
                            "----\n\n".
                            "Novo sporoèilo:\n%4\$s\n\n".
                            "----\n\n".
                            "Obi¹èite stran za veè informacij.\n\n".
                            BASE_URL."\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Naloga:   %2\$s\n".
                            "Stanje:     %3\$s\n".
                            "Lastnik:   %4\$s ( %5\$s )\n".
                            "Besedilo:\n%6\$s\n\n".
                            "Obi¹èite stran za veè informacij.\n\n".
                            BASE_URL."\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Va¹ projekt je prevzet";
$title_takeover_task      = ABBR_MANAGER_NAME.": Va¹a naloga je prevzeta";

$email_takeover_task      = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME." vas obve¹èa, da je va¹o nalogo prevzel skrbnik dne ".$email_date.".\n\n";
$email_takeover_project   = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME."vas obve¹èa, da je va¹ projekt prevzel skrbnik dne ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nov projekt za vas";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova naloga za vas";

$email_new_owner_project  = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." ustvarjen nov projekt, katerega lastnik ste vi.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_new_owner_task     = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." ustvarjena nova naloga, katere lastnik ste vi\n\n".
                            "Sledijo podrobnosti:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nov projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova naloga: %s";

$email_new_group_project  = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." ustvarjen nov projekt.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_new_group_task     = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." ustvarjena nova naloga.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Va¹ projekt je osve¾en";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Va¹a naloga je osve¾ena";

$email_edit_owner_project = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." pri¹lo do sprememb na projektu, katerega lastnik ste.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_edit_owner_task    = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne  ".$email_date." pri¹lo do sprememb pri nalogi, katere lastnik ste.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt je osve¾en";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Naloga je osve¾ena";

$email_edit_group_project = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." pri¹lo do sprememb na projektu, katere lastnik je uporabnik %s.\n\n".
                            "Sledijo podrobnosti:\n\n";

$email_edit_group_task    = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." pri¹lo do sprememb pri nalogi, katere lastnik je uporabnik %s.\n\n".
                            "Sledijo podrobnosti:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt je izbrisan";
$title_delete_task        = ABBR_MANAGER_NAME.": Naloga je izbrisana";

$email_delete_project     = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." izbrisan projekt, katerega lastnik ste vi.\n\n".
                            "Hvala, ker ste upravljali s projektom v èasu njegovega trajanja.\n\n";

$email_delete_task        = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." izbrisana naloga, katere lastnik ste vi.\n\n".
                            "Hvala, ker ste upravljali z nalogo v èasu njenega trajanja.\n\n";

$delete_list              = "Projekt:  %1\$s\n".
                            "Naloga:   %2\$s\n".
                            "Stanje:     %3\$s\n\n".
                            "Besedilo:\n%4\$s\n\n";

$title_welcome            = "Dobrodo¹li na strani ".ABBR_MANAGER_NAME;
$email_welcome            = "Pozdravljeni!\n\nSpleti¹èe ".MANAGER_NAME." vam ¾eli dobrodo¹lico dne ".$email_date.".\n\n".
                            "Ker ste novi na tej strani, naj najprej razlo¾im nekaj stvari, preden zaènete z delom.\n\n".
                            "Najprej, to je orodje za upravljanje s projekti. Na domaèi strani boste videli trenutno dostopne projekte. ".
                            "Èe kliknete na katerokoli ime projekta, boste preusmerjeni na stran doloèenega projekta/naloge. Na tej strani se bo odvijalo va¹e delo.\n\n".
                            "Vsak vnos, ki ga opravite ali vsaka naloga, ki jo spremenite bo ostalim uporabnikom prikazana kot 'NOV' ali 'OSVE®EN' vnos. Seveda to deluje tudi v obratni smeri.".
                            "To vam omogoèa, da hitro spoznate, na katerih projektih/nalogah je pri¹lo do aktivnosti.\n\n".
                            "Poleg tega lahko prevzamete lastni¹tvo neke naloge in kasneje to nalogo tudi zamenjate, lahko pa tudi sodelujete v forumih. ".
                            "Ko boste opravljali naloge, ne pozabite oznaèiti status naloge in besedilo, da bodo tudi ostali uporabniki v toku s spremembami.".
                            "\n\n®elim vam veliko uspeha pri delu. Èe boste naleteli na te¾avo, lahko po¹ljete e-po¹to na naslov ".EMAIL_ADMIN.".\n\n --Sreèno!\n\n".
                            "Uporabni¹ko ime:    %1\$s\n".
                            "Geslo:           %2\$s\n\n".
                            "Uporabni¹ka skupina:  %3\$s".
                            "Ime:               %4\$s\n".
                            "Naslov strani:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Sprememba na va¹em uporabni¹kem raèunu s strani skrbnika";
$email_user_change1       = "Pozdravljeni!\n\n".
                            "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." pri¹lo do spremembe va¹ega uporabni¹kega raèuna s strani %1\$s ( %2\$s ) \n\n".
                            "Uporabni¹ko ime:    %3\$s\n".
                            "Geslo:           %4\$s\n\n".
                            "Uporabni¹ka skupina:  %5\$s".
                            "Ime:               %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Sprememba na va¹em uporabni¹kem raèunu";
$email_user_change2         = "Pozdravljeni!\n\n".
                              "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." uspe¹no izvedena sprememba na va¹em uporabni¹kem raèunu.\n\n".
                              "Uporabni¹ko ime:  %1\$s\n".
                              "Geslo:         %2\$s\n\n".
                              "Ime:             %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Sprememba na va¹em uporabni¹kem raèunu";
$email_user_change3         = "Pozdravljeni!\n\n".
                              "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da ste dne ".$email_date." uspe¹no izvedli spremembo na va¹em uporabni¹kem raèunu.\n\n".
                              "Uporabni¹ko ime:  %1\$s\n".
                              "va¹e geslo je ostalo nespremenjeno.\n\n".
                              "Ime:             %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Vkljuèitev raèuna";
$email_revive               = "Pozdravljeni!\n\n".
                              "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." va¹ uporabni¹ki raèun ponovno veljaven.\n\n".
                              "Uporabni¹ko ime:  %1\$s\n".
                              "Ime:             %2\$s\n\n".
                              "Ne morem vam poslati geslo, ker je ¹ifrirano. \n\n".
                              "Èe ste pozabili geslo, po¹ljite zahtevo na e-po¹tni naslov".EMAIL_ADMIN." za novo geslo.";

$title_delete_user          = ABBR_MANAGER_NAME.": Izkljuèitev raèuna.";
$email_delete_user          = "Pozdravljeni!\n\n".
                              "Spleti¹èe ".MANAGER_NAME.", vas obve¹èa, da je dne ".$email_date." va¹ uporabni¹ki raèun postal neveljaven.\n\n".
                              "®al nam je, ker nas zapu¹èate in zahvaljujemo se vam za va¹ trud.\n\n".
                              "Èe mislite, da je izkljuèitev va¹ega raèuna napaèna, nam prosim po¹ljite obvestilo na e-po¹to ".EMAIL_ADMIN.".";

?>
