<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2005 by Branko Majic

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

  Email text language files for 'srl' (Serbian Latin)

  Maintainer: Branko Majic <branko.majic at gmail.com>

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Novi fajl je dodat: %s";
$email_file_post          = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je novi fajl dodat na dan ".$email_date." od strane korisnika %1\$s.\n\n".
                            "Fajl:        %2\$s\n".
                            "Opis: %3\$s\n\n".
                            "Molim vas da odete na sajt ukoliko vam je potrebno vi¹e detalja.\n\n".BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nova poruka na forumu: %s";
$email_forum_post         = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je na forumu postavljena nova poruka na dan ".$email_date." od strane korisnika %1\$s:\n\n----\n\n%2\$s\n\n----\n\n".
                            "Molim vas da odete na sajt ukoliko vam je potrebno vi¹e detalja.\n\n".BASE_URL."\n";
$email_forum_reply        = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je na forumu postavljena nova poruka na dan ".$email_date." od strane korisnika %1\$s.\n\n".
                            "Ova poruka je odgovor na raniju poruku koju je postavio %2\$s.\n\n".
                            "Prvobitna poruka:\n%3\$s\n\n".
                            "----\n\n".
                            "Novi odgovor:\n%4\$s\n\n".
                            "----\n\n".
                            "Molim vas da odete na sajt ukoliko vam je potrebno vi¹e detalja.\n\n".BASE_URL."\n";


$email_list =  "Projekat:  %1\$s\n".
               "Zadatak:     %2\$s\n".
               "Stanje:   %3\$s\n".
               "Vlasnik:    %4\$s ( %5\$s )\n".
               "Tekst:\n%6\$s\n\n".
               "Molim vas da odete na sajt ukoliko vam je potrebno vi¹e detalja.\n\n".BASE_URL."\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Va¹ projekat je preuzet";
$title_takeover_task      = ABBR_MANAGER_NAME.": Va¹ zadatak je preuzet";

$email_takeover_task      = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je zadatak koji ste posedovali preuzet od strane administratora na dan ".$email_date.".\n\n";
$email_takeover_project   = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je projekat koji ste posedovali preuzet od strane administratora na dan ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Novi projekat za vas";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Novi zadatak za vas";

$email_new_owner_project  = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je kreiran novi projekat na dan ".$email_date.", i da ste vi vlasnik tog projekta.\n\nSlede detalji:\n\n";
$email_new_owner_task     = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je kreiran novi zadatak na dan ".$email_date.", i da ste vi vlasnik tog zadatka.\n\nSlede detalji:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novi projekat: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Novi zadatak: %s";

$email_new_group_project  = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je kreiran novi projekat na dan  ".$email_date."\n\nSlede detalji:\n\n";
$email_new_group_task     = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je kreiran novi zadatak na dan ".$email_date."\n\nSlede detalji:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Va¹ projekat je osve¾en";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Va¹ zadatak je osve¾en";

$email_edit_owner_project = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je projekat koji vi posedujete promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";
$email_edit_owner_task    = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je zadatak koji vi posedujete promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekat je osve¾en";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Zadatak je osve¾en";

$email_edit_group_project = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je projekat, èiji je vlasnik %s promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";
$email_edit_group_task    = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je zadatak, èiji je vlasnik %s promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Brisanje projekta";
$title_delete_task        = ABBR_MANAGER_NAME.": Brisanje zadatka";

$email_delete_project     = "Zdravo,\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave¹tava da je projekat koji ste posedovali obrisan na dan ".$email_date."\n\n".
                            "Hvala vam ¹to ste upravljali projektom dok je trajao.\n\n";
$email_delete_task        = "Zdravo,\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave¹tava da je zadatak koji ste posedovali obrisan na dan ".$email_date."\n\n".
                            "Hvala vam ¹to ste upravljali zadatkom dok je trajao.\n\n";

$delete_list = "Projekat: %1\$s\n".
                "Zadatak:   %2\$s\n".
                "Stanje: %3\$s\n\n".
                "Tekst:\n%4\$s\n\n";

$title_welcome            = "Dobrodo¹li na ".ABBR_MANAGER_NAME;
$email_welcome            = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vam ¾eli dobrodo¹licu ;) na dan ".$email_date.".\n\n".
                            "Po¹to ste novi korisnik ovde, objasniæu vam nekoliko stvari da biste mogli da br¾e poènete sa radom\n\n".
                            "Pre nego ¹to poènemo, ovo je alat za upravljanje projektima. Glavna strana æe vam pokazati trenutno raspolo¾ive projekte. ".
                            "Ukoliko odaberete jedan od njih (kliknete na odgovarajuæe ime), naæi æete se u odeljku za zadatke tog projekta. Ovo je mesto gde se odvija sav posao.\n\n".
                            "Svaka poruka koju postavite ili zadatak koji promenite æe biti prikazani kao 'novo' ili 'osve¾eno' ostalim korisnicima. Ovo funkcioni¹e i u obrnutom smeru i ".
                            "omoguæava vam da brzo pronaðete gde ima novih aktivnosti.\n\n".
                            "Takoðe mo¾ete preuzeti ili dobiti vlasni¹tvo nad zadacima i naæi æete se u moguænosti da menjate njihovu sadr¾inu i sadr¾inu svih poruka u okviru foruma koji im pripada. ".
                            "Kako budete napredovali sa svojim radom, molim vas da menjate tekst i stanje svog zadatka, tako da bi svi mogli da prate va¹ napredak. ".
                            "\n\nPreostaje da vam po¾elim sreæu i pru¾im e-po¹tansku adresu ".EMAIL_ADMIN." ukoliko ne znate ¹ta da radite.\n\n --Sreæno !\n\n".
                            "Korisnièko ime:      %1\$s\n".
                            "Lozinka:   %2\$s\n\n".
                            "Korisnièke grupe: %3\$s".
                            "Ime:       %4\$s\n".
                            "Sajt:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Promena va¹eg naloga od strane administratora";
$email_user_change1       = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je va¹ nalog promenjen na dan ".$email_date." od strane korisnika %1\$s ( %2\$s ) \n\n".
                            "Korisnièko ime:      %3\$s\n".
                            "Lozinka:   %4\$s\n\n".
                            "Korisnièke grupe: %5\$s".
                            "Ime:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Promena va¹eg naloga";
$email_user_change2       = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji potvrðuje va¹u uspe¹nu promenu va¹eg naloga na dan ".$email_date.".\n\n".
                            "Korisnièko ime:    %1\$s\n".
                            "Lozinka: %2\$s\n\n".
                            "Ime:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Promena va¹eg naloga";
$email_user_change3       = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji potvrðuje va¹u uspe¹nu promenu va¹eg naloga na dan ".$email_date.".\n\n".
                            "Korisnièko ime: %1\$s\n".
                            "Va¹a lozinka nije menjana.\n\n".
                            "Ime:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Ponovna aktivacija naloga";
$email_revive             = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da va¹ nalog ponovo aktiviran na dan ".$email_date.".\n\n".
                            "Korisnièko ime: %1\$s\n".
                            "Ime:  %2\$s\n\n".
                            "Ne mo¾emo vam poslati va¹u lozinku zato ¹to je kriptovana. \n\n".
                            "Ukoliko ste zaboravili svoju lozinku, po¹aljite e-po¹tu na ".EMAIL_ADMIN." za dobijanje nove lozinke.";


$title_delete_user        = ABBR_MANAGER_NAME.": Deaktivacija naloga.";
$email_delete_user        = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obave¹tava da je va¹ nalog deaktiviran na dan ".$email_date.".\n".
                            "®ao nam je ¹to nas napu¹tate i ¾elimo da vam se zahvalimo na svem va¹em radu!\n\n".
                            "Ukoliko se protivite deaktivaciji, ili mislite da je posredi gre¹ka, po¹aljite e-po¹tu na ".EMAIL_ADMIN.".";

?>
