<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created on April 2006 by Branko Majic

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

  Email text language files for 'sr-la' (Serbian Latin)

  Maintainer: Branko Majic <branko.majic@gmail.com>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 04. Apr. 01. 09:18 +1200
$email_date = sprintf('%s %s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d', $ltime ), date('H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Novi fajl je dodat: %s";
$email_file_post          = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." dodat novi fajl od strane korisnika %1\$s.\n\n".
                            "Fajl:  %2\$s\n".
                            "Opis:  %3\$s\n\n".
                            "Projekat:  %4\$s\n".
                            "Zadatak:   %5\$s\n\n".
                            "Posetite sajt za više detalja.\n\n".
                            BASE_URL."%6\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nova poruka na forumu: %s";
$email_forum_post         = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." postavljena nova poruka na forumu od strane korisnika %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Posetite sajt za više detalja.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." postavljena nova poruka na forumu od strane korisnika %1\$s.\n\n".
                            "Ova poruka predstavlja odgovor na raniju poruku korisnika %2\$s.\n\n".
                            "Prvobitna poruka:\n%3\$s\n\n".
                            "----\n\n".
                            "Novi odgovor:\n%4\$s\n\n".
                            "----\n\n".
                            "Posetite sajt za više detalja.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekat:  %1\$s\n".
                            "Zadatak:   %2\$s\n".
                            "Stanje:     %3\$s\n".
                            "Vlasnik:   %4\$s ( %5\$s )\n".
                            "Tekst:\n%6\$s\n\n".
                            "Posetite sajt za više detalja.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Vaš projekat je preuzet";
$title_takeover_task      = ABBR_MANAGER_NAME.": Vaš zadatak je preuzet";

$email_takeover_task      = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je vaš zadatak preuzet od strane administratora dana ".$email_date.".\n\n";
$email_takeover_project   = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je vaš projekat preuzet od strane administratora dana ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Novi projekat za vas";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Novi zadatak za vas";

$email_new_owner_project  = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." kreiran novi projekat, i da ste vi vlasnik ovog projekta.\n\n".
                            "Slede detalji:\n\n";

$email_new_owner_task     = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." kreiran novi zadatak, i da ste vi vlasnik ovog zadatka.\n\n".
                            "Slede detalji:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novi projekat: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Novi zadatak: %s";

$email_new_group_project  = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." kreiran novi projekat.\n\n".
                            "Slede detalji:\n\n";

$email_new_group_task     = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." kreiran novi zadatak.\n\n".
                            "Slede detalji:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Vaš projekat je osvežen";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Vaš zadatak je osvežen";

$email_edit_owner_project = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." došlo do izmena na projektu čiji ste vi vlasnik.\n\n".
                            "Slede detalji:\n\n";

$email_edit_owner_task    = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." došlo do izmena na zadatku čiji ste vi vlasnik.\n\n".
                            "Slede detalji:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekat je osvežen";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Zadatak je osvežen";

$email_edit_group_project = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." došlo do izmena na projektu čiji je vlasnik korisnik %s.\n\n".
                            "Slede detalji:\n\n";

$email_edit_group_task    = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." došlo do izmena na zadatku čiji je vlasnik korisnik %s.\n\n".
                            "Slede detalji:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekat je obrisan";
$title_delete_task        = ABBR_MANAGER_NAME.": Zadatak je obrisan";

$email_delete_project     = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." obrisan projekat čiji ste vi vlasnik.\n\n".
                            "Hvala vam što ste upravljali ovim projektom dok je on trajao.\n\n";

$email_delete_task        = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." obrisan zadatak čiji ste vi vlasnik.\n\n".
                            "Hvala vam što ste upravljali ovim zadatkom dok je on trajao.\n\n";

$delete_list              = "Projekat:  %1\$s\n".
                            "Zadatak:   %2\$s\n".
                            "Stanje:     %3\$s\n\n".
                            "Tekst:\n%4\$s\n\n";

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

$title_welcome            = "Dobrodošli na sajt ".ABBR_MANAGER_NAME;
$email_welcome            = "Zdravo!\n\nOvo je sajt ".MANAGER_NAME." koji vam želi dobrodošlicu ;) dana ".$email_date.".\n\n".
                            "Pošto ste vi novi na ovom sajtu, najpre ću vam objasniti nekoliko stvari da biste što pre mogli da počnete sa radom u okviru ovog sajta.\n\n".
                            "Pre svega, ovo je alat za upravljanje projektima. Glavna strana će vam pokazati trenutno dostupne projekte. ".
                            "Ukoliko kliknete na bilo koje od ovih imena, naći ćete se na odgovarajućoj strani za zadatak/projekat. Ovo je strana gde će se odvijati sav vaš rad.\n\n".
                            "Svaki unos koji postavite ili zadatak koji izmenite će ostalim korisnicima biti prikazan kao 'novi' ili 'osveženi' ulaz. Ovo funkcioniše i u suprotnom smeru i ".
                            "omogućava i vama da brzo uočite na kojim zadacima/projektima postoji aktivnost.\n\n".
                            "Osim toga možete i da preuzmete vlasništvo nad nekim zadatkom i da se zatim nađete u poziciji da menjate taj isti zadatak, kao i da vršite izmene u svim forumima koji mu pripadaju. ".
                            "Kako budete napredovali sa zadacima, molim vas da menjate tekst zadatka, kako bi i svi ostali korisnici bili u toku. ".
                            "\n\nŽelim vam uspeh u budućem radu, i ukoliko imate nekih problema ili pitanja, pošaljite e-pismo na adresu ".EMAIL_ADMIN.".\n\n --Srećno!\n\n".
                            "Korisničko ime:    %1\$s\n".
                            "Lozinka:           %2\$s\n\n".
                            "Korisničke grupe:  %3\$s".
                            "Ime:               %4\$s\n".
                            "Adresa sajta:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Promene na vašem korisničkom nalogu od strane administratora";
$email_user_change1       = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da su dana ".$email_date." izvršene izmene na vašem korisničkom nalogu od strane korisnika %1\$s ( %2\$s ) \n\n".
                            "Korisničko ime:    %3\$s\n".
                            "Lozinka:           %4\$s\n\n".
                            "Korisničke grupe:  %5\$s".
                            "Ime:               %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Promene na vašem korisničkom nalogu";
$email_user_change2         = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da ste dana ".$email_date." uspešno izvršili izmene na svom korisničkom nalogu.\n\n".
                              "Korisničko ime:  %1\$s\n".
                              "Lozinka:         %2\$s\n\n".
                              "Ime:             %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Promene na vašem korisničkom nalogu";
$email_user_change3         = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da ste dana ".$email_date." uspešno izvršili izmene na svom korisničkom nalogu.\n\n".
                              "Korisničko ime:  %1\$s\n".
                              "Vaša postojeća lozinka je ostala nepromenjena.\n\n".
                              "Ime:             %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Uključenje naloga";
$email_revive               = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." vaš korisnički nalog ponovo postao važeći.\n\n".
                              "Korisničko ime:  %1\$s\n".
                              "Ime:             %2\$s\n\n".
                              "Nisam u mogućnosti da vam pošaljem lozinku, s obzirom da je ona šifrovana. \n\n".
                              "Ukoliko ste zaboravili svoju lozinku, molim vas da pošaljete e-pismo na adresu ".EMAIL_ADMIN." sa zahtevom za novu lozinku.";

$title_delete_user          = ABBR_MANAGER_NAME.": Isključenje naloga.";
$email_delete_user          = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obaveštava da je dana ".$email_date." vaš korisnički nalog postao nevažeći.\n\n".
                              "Žao nam je što nas napuštate, i želimo da vam se na rastanku zahvalimo za sav vaš trud!\n\n".
                              "Ukoliko se protivite ukidanju svog naloga, ili mislite da je posredi greška, molim vas da pošaljete e-pismo na adresu ".EMAIL_ADMIN.".";

?>
