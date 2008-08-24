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

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s. %s. %s. %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d', $ltime ), date('H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Novi fajl je dodat: %s";
$email_file_post          = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." dodat novi fajl od strane korisnika %1\$s.\n\n".
                            "Fajl:  %2\$s\n".
                            "Opis:  %3\$s\n\n".
                            "Projekat: %4\$s\n".
                            "Zadatak:  %5\$s\n\n".
                            "Posetite sajt za vi�e detalja.\n\n".
                            BASE_URL."%6\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nova poruka na forumu: %s";
$email_forum_post         = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." postavljena nova poruka na forumu od strane korisnika %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Posetite sajt za vi�e detalja.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." postavljena nova poruka na forumu od strane korisnika %1\$s.\n\n".
                            "Ova poruka predstavlja odgovor na raniju poruku korisnika %2\$s.\n\n".
                            "Prvobitna poruka:\n%3\$s\n\n".
                            "----\n\n".
                            "Novi odgovor:\n%4\$s\n\n".
                            "----\n\n".
                            "Posetite sajt za vi�e detalja.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekat:  %1\$s\n".
                            "Zadatak:   %2\$s\n".
                            "Stanje:     %3\$s\n".
                            "Vlasnik:   %4\$s ( %5\$s )\n".
                            "Tekst:\n%6\$s\n\n".
                            "Posetite sajt za vi�e detalja.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Va� projekat je preuzet";
$title_takeover_task      = ABBR_MANAGER_NAME.": Va� zadatak je preuzet";

$email_takeover_task      = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je va� zadatak preuzet od strane administratora dana ".$email_date.".\n\n";
$email_takeover_project   = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je va� projekat preuzet od strane administratora dana ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Novi projekat za vas";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Novi zadatak za vas";

$email_new_owner_project  = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." kreiran novi projekat, i da ste vi vlasnik ovog projekta.\n\n".
                            "Slede detalji:\n\n";

$email_new_owner_task     = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." kreiran novi zadatak, i da ste vi vlasnik ovog zadatka.\n\n".
                            "Slede detalji:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novi projekat: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Novi zadatak: %s";

$email_new_group_project  = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." kreiran novi projekat.\n\n".
                            "Slede detalji:\n\n";

$email_new_group_task     = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." kreiran novi zadatak.\n\n".
                            "Slede detalji:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Va� projekat je osve�en";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Va� zadatak je osve�en";

$email_edit_owner_project = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." do�lo do izmena na projektu �iji ste vi vlasnik.\n\n".
                            "Slede detalji:\n\n";

$email_edit_owner_task    = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." do�lo do izmena na zadatku �iji ste vi vlasnik.\n\n".
                            "Slede detalji:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekat je osve�en";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Zadatak je osve�en";

$email_edit_group_project = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." do�lo do izmena na projektu �iji je vlasnik korisnik %s.\n\n".
                            "Slede detalji:\n\n";

$email_edit_group_task    = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." do�lo do izmena na zadatku �iji je vlasnik korisnik %s.\n\n".
                            "Slede detalji:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekat je obrisan";
$title_delete_task        = ABBR_MANAGER_NAME.": Zadatak je obrisan";

$email_delete_project     = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." obrisan projekat �iji ste vi vlasnik.\n\n".
                            "Hvala vam �to ste upravljali ovim projektom dok je on trajao.\n\n";

$email_delete_task        = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." obrisan zadatak �iji ste vi vlasnik.\n\n".
                            "Hvala vam �to ste upravljali ovim zadatkom dok je on trajao.\n\n";

$delete_list              = "Projekat:  %1\$s\n".
                            "Zadatak:   %2\$s\n".
                            "Stanje:     %3\$s\n\n".
                            "Tekst:\n%4\$s\n\n";

$title_welcome            = "Dobrodo�li na sajt ".ABBR_MANAGER_NAME;
$email_welcome            = "Zdravo!\n\nOvo je sajt ".MANAGER_NAME." koji vam �eli dobrodo�licu ;) dana ".$email_date.".\n\n".
                            "Po�to ste vi novi na ovom sajtu, najpre �u vam objasniti nekoliko stvari da biste �to pre mogli da po�nete sa radom u okviru ovog sajta.\n\n".
                            "Pre svega, ovo je alat za upravljanje projektima. Glavna strana �e vam pokazati trenutno dostupne projekte. ".
                            "Ukoliko kliknete na bilo koje od ovih imena, na�i �ete se na odgovaraju�oj strani za zadatak/projekat. Ovo je strana gde �e se odvijati sav va� rad.\n\n".
                            "Svaki unos koji postavite ili zadatak koji izmenite �e ostalim korisnicima biti prikazan kao 'novi' ili 'osve�eni' ulaz. Ovo funkcioni�e i u suprotnom smeru i ".
                            "omogu�ava i vama da brzo uo�ite na kojim zadacima/projektima postoji aktivnost.\n\n".
                            "Osim toga mo�ete i da preuzmete vlasni�tvo nad nekim zadatkom i da se zatim na�ete u poziciji da menjate taj isti zadatak, kao i da vr�ite izmene u svim forumima koji mu pripadaju. ".
                            "Kako budete napredovali sa zadacima, molim vas da menjate tekst zadatka, kako bi i svi ostali korisnici bili u toku. ".
                            "\n\n�elim vam uspeh u budu�em radu, i ukoliko imate nekih problema ili pitanja, po�aljite e-pismo na adresu ".EMAIL_ADMIN.".\n\n --Sre�no!\n\n".
                            "Korisni�ko ime:    %1\$s\n".
                            "Lozinka:           %2\$s\n\n".
                            "Korisni�ke grupe:  %3\$s".
                            "Ime:               %4\$s\n".
                            "Adresa sajta:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Promene na va�em korisni�kom nalogu od strane administratora";
$email_user_change1       = "Zdravo!\n\n".
                            "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da su dana ".$email_date." izvr�ene izmene na va�em korisni�kom nalogu od strane korisnika %1\$s ( %2\$s ) \n\n".
                            "Korisni�ko ime:    %3\$s\n".
                            "Lozinka:           %4\$s\n\n".
                            "Korisni�ke grupe:  %5\$s".
                            "Ime:               %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Promene na va�em korisni�kom nalogu";
$email_user_change2         = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da ste dana ".$email_date." uspe�no izvr�ili izmene na svom korisni�kom nalogu.\n\n".
                              "Korisni�ko ime:  %1\$s\n".
                              "Lozinka:         %2\$s\n\n".
                              "Ime:             %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Promene na va�em korisni�kom nalogu";
$email_user_change3         = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da ste dana ".$email_date." uspe�no izvr�ili izmene na svom korisni�kom nalogu.\n\n".
                              "Korisni�ko ime:  %1\$s\n".
                              "Va�a postoje�a lozinka je ostala nepromenjena.\n\n".
                              "Ime:             %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Uklju�enje naloga";
$email_revive               = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." va� korisni�ki nalog ponovo postao va�e�i.\n\n".
                              "Korisni�ko ime:  %1\$s\n".
                              "Ime:             %2\$s\n\n".
                              "Nisam u mogu�nosti da vam po�aljem lozinku, s obzirom da je ona �ifrovana. \n\n".
                              "Ukoliko ste zaboravili svoju lozinku, molim vas da po�aljete e-pismo na adresu ".EMAIL_ADMIN." sa zahtevom za novu lozinku.";

$title_delete_user          = ABBR_MANAGER_NAME.": Isklju�enje naloga.";
$email_delete_user          = "Zdravo!\n\n".
                              "Ovo je sajt ".MANAGER_NAME." koji vas obave�tava da je dana ".$email_date." va� korisni�ki nalog postao neva�e�i.\n\n".
                              "�ao nam je �to nas napu�tate, i �elimo da vam se na rastanku zahvalimo za sav va� trud!\n\n".
                              "Ukoliko se protivite ukidanju svog naloga, ili mislite da je posredi gre�ka, molim vas da po�aljete e-pismo na adresu ".EMAIL_ADMIN.".";

?>
