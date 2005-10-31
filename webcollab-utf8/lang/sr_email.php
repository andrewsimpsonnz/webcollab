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

  
  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Novi fajl je dodat: %s";
$email_file_post          = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je novi fajl dodat na dan ".$email_date." od strane korisnika %1\$s.\n\n".
                            "Fajl:        %2\$s\n".
                            "Opis: %3\$s\n\n".
                            "Molim vas da odete na sajt ukoliko vam je potrebno više detalja.\n\n".BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nova poruka na forumu: %s";
$email_forum_post         = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je na forumu postavljena nova poruka na dan ".$email_date." od strane korisnika %1\$s:\n\n----\n\n%2\$s\n\n----\n\n".
                            "Molim vas da odete na sajt ukoliko vam je potrebno više detalja.\n\n".BASE_URL."\n";
$email_forum_reply        = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je na forumu postavljena nova poruka na dan ".$email_date." od strane korisnika %1\$s.\n\n".
                            "Ova poruka je odgovor na raniju poruku koju je postavio %2\$s.\n\n".
                            "Prvobitna poruka:\n%3\$s\n\n".
                            "----\n\n".
                            "Novi odgovor:\n%4\$s\n\n".
                            "----\n\n".
                            "Molim vas da odete na sajt ukoliko vam je potrebno više detalja.\n\n".BASE_URL."\n";


$email_list =  "Projekat:  %1\$s\n".
               "Zadatak:     %2\$s\n".
               "Stanje:   %3\$s\n".
               "Vlasnik:    %4\$s ( %5\$s )\n".
               "Tekst:\n%6\$s\n\n".
               "Molim vas da odete na sajt ukoliko vam je potrebno više detalja.\n\n".BASE_URL."\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Vaš projekat je preuzet";
$title_takeover_task      = ABBR_MANAGER_NAME.": Vaš zadatak je preuzet";

$email_takeover_task      = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je zadatak koji ste posedovali preuzet od strane administratora na dan ".$email_date.".\n\n";
$email_takeover_project   = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je projekat koji ste posedovali preuzet od strane administratora na dan ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Novi projekat za vas";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Novi zadatak za vas";

$email_new_owner_project  = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je kreiran novi projekat na dan ".$email_date.", i da ste vi vlasnik tog projekta.\n\nSlede detalji:\n\n";
$email_new_owner_task     = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je kreiran novi zadatak na dan ".$email_date.", i da ste vi vlasnik tog zadatka.\n\nSlede detalji:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novi projekat: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Novi zadatak: %s";

$email_new_group_project  = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je kreiran novi projekat na dan  ".$email_date."\n\nSlede detalji:\n\n";
$email_new_group_task     = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je kreiran novi zadatak na dan ".$email_date."\n\nSlede detalji:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Vaš projekat je osvežen";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Vaš zadatak je osvežen";

$email_edit_owner_project = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je projekat koji vi posedujete promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";
$email_edit_owner_task    = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je zadatak koji vi posedujete promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekat je osvežen";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Zadatak je osvežen";

$email_edit_group_project = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je projekat, čiji je vlasnik %s promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";
$email_edit_group_task    = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je zadatak, čiji je vlasnik %s promenjen na dan ".$email_date.".\n\nSlede detalji:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Brisanje projekta";
$title_delete_task        = ABBR_MANAGER_NAME.": Brisanje zadatka";

$email_delete_project     = "Zdravo,\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je projekat koji ste posedovali obrisan na dan ".$email_date."\n\n".
                            "Hvala vam što ste upravljali projektom dok je trajao.\n\n";
$email_delete_task        = "Zdravo,\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je zadatak koji ste posedovali obrisan na dan ".$email_date."\n\n".
                            "Hvala vam što ste upravljali zadatkom dok je trajao.\n\n";

$delete_list = "Projekat: %1\$s\n".
                "Zadatak:   %2\$s\n".
                "Stanje: %3\$s\n\n".
                "Tekst:\n%4\$s\n\n";

$title_welcome            = "Dobrodošli na ".ABBR_MANAGER_NAME;
$email_welcome            = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vam želi dobrodošlicu ;) na dan ".$email_date.".\n\n".
                            "Pošto ste novi korisnik ovde, objasniću vam nekoliko stvari da biste mogli da brže počnete sa radom\n\n".
                            "Pre nego što počnemo, ovo je alat za upravljanje projektima. Glavna strana će vam pokazati trenutno raspoložive projekte. ".
                            "Ukoliko odaberete jedan od njih (kliknete na odgovarajuće ime), naći ćete se u odeljku za zadatke tog projekta. Ovo je mesto gde se odvija sav posao.\n\n".
                            "Svaka poruka koju postavite ili zadatak koji promenite će biti prikazani kao 'novo' ili 'osveženo' ostalim korisnicima. Ovo funkcioniše i u obrnutom smeru i ".
                            "omogućava vam da brzo pronađete gde ima novih aktivnosti.\n\n".
                            "Takođe možete preuzeti ili dobiti vlasništvo nad zadacima i naći ćete se u mogućnosti da menjate njihovu sadržinu i sadržinu svih poruka u okviru foruma koji im pripada. ".
                            "Kako budete napredovali sa svojim radom, molim vas da menjate tekst i stanje svog zadatka, tako da bi svi mogli da prate vaš napredak. ".
                            "\n\nPreostaje da vam poželim sreću i pružim e-poštansku adresu ".EMAIL_ADMIN." ukoliko ne znate šta da radite.\n\n --Srećno !\n\n".
                            "Korisničko ime:      %1\$s\n".
                            "Lozinka:   %2\$s\n\n".
                            "Korisničke grupe: %3\$s".
                            "Ime:       %4\$s\n".
                            "Sajt:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Promena vašeg naloga od strane administratora";
$email_user_change1       = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je vaš nalog promenjen na dan ".$email_date." od strane korisnika %1\$s ( %2\$s ) \n\n".
                            "Korisničko ime:      %3\$s\n".
                            "Lozinka:   %4\$s\n\n".
                            "Korisničke grupe: %5\$s".
                            "Ime:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Promena vašeg naloga";
$email_user_change2       = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji potvrđuje vašu uspešnu promenu vašeg naloga na dan ".$email_date.".\n\n".
                            "Korisničko ime:    %1\$s\n".
                            "Lozinka: %2\$s\n\n".
                            "Ime:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Promena vašeg naloga";
$email_user_change3       = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji potvrđuje vašu uspešnu promenu vašeg naloga na dan ".$email_date.".\n\n".
                            "Korisničko ime: %1\$s\n".
                            "Vaša lozinka nije menjana.\n\n".
                            "Ime:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Ponovna aktivacija naloga";
$email_revive             = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da vaš nalog ponovo aktiviran na dan ".$email_date.".\n\n".
                            "Korisničko ime: %1\$s\n".
                            "Ime:  %2\$s\n\n".
                            "Ne možemo vam poslati vašu lozinku zato što je kriptovana. \n\n".
                            "Ukoliko ste zaboravili svoju lozinku, pošaljite e-poštu na ".EMAIL_ADMIN." za dobijanje nove lozinke.";


$title_delete_user        = ABBR_MANAGER_NAME.": Deaktivacija naloga.";
$email_delete_user        = "Zdravo,\n\nOvo je sajt ".MANAGER_NAME." koji vas obaveštava da je vaš nalog deaktiviran na dan ".$email_date.".\n".
                            "Žao nam je što nas napuštate i želimo da vam se zahvalimo na svem vašem radu!\n\n".
                            "Ukoliko se protivite deaktivaciji, ili mislite da je posredi greška, pošaljite e-poštu na ".EMAIL_ADMIN.".";

?>
