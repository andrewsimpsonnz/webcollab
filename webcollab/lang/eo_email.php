<?php
/*
  $Id:  $

  WebCollab
  ---------------------------------------
  This file created 2003

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

  Language files (email titles and texts) for 'eo' (Esperanto)

  Translation: Paul Ebermann < ePaul @ sourceforge . net >

  Maintainer: -

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
$email_date = sprintf('%s. %s. %s um %s %+03d00', date('d', $ltime ), $month_array[(date('n', $ltime ) )], date('Y', $ltime ), date('H:i', $ltime), TZ );

//$email_date = date("d" ).". ".$month_array[(date("n" ) )]." ".date('Y \u\m g:i' );

$title_file_post        = ABBR_MANAGER_NAME.": Nova dosiero estis al�utita: %s";
$email_file_post        = "Saluton, \n\nvia ".MANAGER_NAME."-sistemo informas vin, ke al�uti�is nova dosiero je ".$email_date." de %1\$s.\n\n".
                          "Dosiero:     %2\$s\n".
                          "Priskribo:   %3\$s\n\n".
                          "Projekto:    %4\$s\n".
                          "Tasko:       %5\$s\n\n".
                          "Bonvolu rigardu la sekvan pa�on por ekscii pli:\n\n".BASE_URL."%6\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": Nova foruma artikolo: %s";
$email_forum_post        = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke je ".$email_date." aperis nova foruma mesa�o de %1\$s:\n\n".
                           "----\n\n%2\$s\n\n----\n\n".
                           "Bonvolu rigardu la sekvan pa�on por ekscii pli:\n\n".BASE_URL."%3\$s\n";

$email_forum_reply       = "Saluton,\n\via ".MANAGER_NAME."-sistemo informas vin, ke aperis je ".$email_date." nova foruma artikolo de %1\$s.\n\n".
                           "Tiu artikolo estas respondo al anta�a artikolo de %2\$s.\n\n".
                           "Anta�a artikolo:\n %3\$s\n\n".
                           "----\n\n".
                           "Nova artikolo:\n%4\$s\n\n".
                           "----\n\n".
                           "Bonvolu rigardu la sekvan pa�on por ekscii pli:\n\n".BASE_URL."%5\$s\n";



$email_list = "Projekto:  %1\$s\n".
              "Tasko:     %2\$s\n".
              "Stato:     %3\$s\n".
              "Posedanto: %4\$s ( %5\$s )\n".
              "Teksto:\n%6\$s\n\n".
              "Bonvolu rigardu la sekvan pa�on por ekscii pli:\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Iu el viaj projektoj estis tansprenita";
$title_takeover_task      = ABBR_MANAGER_NAME.": Iu el viaj taskoj estis transprenita";
$email_takeover_project   = "Saluton,\n\via ".MANAGER_NAME."-sistemo informas vin, ke via projekto estis transprenita de administranto je ".$email_date.".\n\n";
$email_takeover_task      = "Saluton,\n\via ".MANAGER_NAME."-sistemo informas vin, ke via tasko estis transprenita de administranto je ".$email_date.".\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": Nova projekto por vi";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova tasko por vi";
$email_new_owner_project  = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke nova projekto estis kreita je ".$email_date.", kaj vi estas �ia posedanto.\n\n Jen la detaloj:\n\n";
$email_new_owner_task     = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke vi ricevis novan taskon je ".$email_date.".\n\nJen la detaloj:\n\n";

$title_new_group_project  = ABBR_MANAGER_NAME.": Nova projekto %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova tasko %s";
$email_new_group_project  = "Saluton,\n\nvia ".MANAGER_NAME."-pa�aro informas vin, ke krei�is nova projekto por via grupo je ".$email_date.".\n\nJen detaloj:\n\n";
$email_new_group_task     = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke krei�is nova tasko por via grupo je ".$email_date."\n\nJen detaloj:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Via projekto �an�i�is";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Via tasko �an�i�is";
$email_edit_owner_project ="Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke via projekto je ".$email_date." estis redaktita.\n\nJen la detaloj:\n\n";
$email_edit_owner_task    ="Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke via tasko je ".$email_date." estis redaktita.\n\nJen la detaloj:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekto �an�ita";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tasko �an�ita";
$email_edit_group_project = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke projekto, kiu apartenas al %s, �an�i�is je ".$email_date.".\n\nJen detaloj:\n\n";
$email_edit_group_task    = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke tasko, kiu apartenas al %s, �an�i�is je ".$email_date.".\n\nJen detaloj:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekto forigita";
$title_delete_task        = ABBR_MANAGER_NAME.": Tasko forigita";
$email_delete_project     = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke projekto, kiun posedis vi, estis forigita je ".$email_date."\n\n".
                              "Dankon pro la administrado de la projekto, dum �i ekzistis..\n\n";
$email_delete_task        = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke tasko, kiun posedis vi, estis forigita je ".$email_date."\n\n".
                              "Dankon pro la administrado de la tasko, dum �i ekzistis..\n\n";

$delete_list =  "Projekto:  %1\$s\n".
                "Tasko:     %2\$s\n".
                "Stato:     %3\$s\n\n".
                "Teksto:\n%4\$s\n";


$title_welcome      = "Bonvenon �e ".ABBR_MANAGER_NAME;
$email_welcome      = "Saluton,\n\nbonvenigas vin la ".MANAGER_NAME."-sistemo je ".$email_date.".\n\n".
			"�ar vi estas nova �i tie, mi klarigos kelkajn aferojn, por ke vi povu rapide komenci labori.\n\n".
			"Tio estas Projektadministra ilo, la enirpa�o montras al vi la projektojn aktuale havebla. ".
			"Se vi elektas unu el la nomoj, vi vidas la taskojn, kiuj apartenas al la projekto. Tie oni laboros.\n\n".
			"�iu nova�o, kiun vi enmetas, kaj �iu tasko, kiun vi redaktas, estos montrata al aliaj uzantoj kiel 'nova' a� 'aktualigita'. Tio funkcias anka� alidirekte kaj ".
			"permesas al vi rapide vidi, kie �us io okazas.\n\n".
			"Vi anka� povas transpreni (a� ricevi) posedadon de taskoj kaj poste redakti ilin. Tiam vi anka� povas redakti mesa�ojn en la la�tema forumo. ".
			"Kiam vi progresas pri via laboro, bonvolu aktualigi la tasko-tekston kaj statuson, por ke �iu povu vidi, kiel vi progresas.".
			"\n\nMi deziras multan sukceson al vi. Vi povas sendi retmesa�on al ".EMAIL_ADMIN.", se vi ne plu scias, kiel da�rigi..\n\n --Bonan �ancon!\n\n".
			"Salutnomo:       %1\$s\n".
			"Pasvorto:        %2\$s\n\n".
			"Uzantgrupoj:     %3\$s".
			"Nomo:            %4\$s\n".
			"Salut-pa�o:      ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": Via konto estis redaktita de administranto";
$email_user_change1 = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke via konto je ".$email_date." estis �an�ita de %1\$s ( %2\$s ) \n\n".
			"Salutnomo:       %3\$s\n".
			"Pasvorto:        %4\$s\n\n".
			"Uzantgrupoj:     %5\$s".
			"Nomo:            %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": Redakto de via konto";
$email_user_change2 = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo konfirmas, ke vi sukcese redaktis vian konton je ".$email_date.".\n\n".
			"Salutnomo:  %1\$s\n".
			"Pasvorto:   %2\$s\n\n".
			"Nomo:       %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": Bearbeitung ihres Kontos";
$email_user_change3 = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo konfirmas, ke vi sukcese redaktis vian konton je ".$email_date.".\n\n".
			"Salutnomo:    %1\$s\n".
			"(Via ekzistanta pasvorto ne �an�i�is.)\n\n".
			"Nomo:         %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": Konto reaktivigita";
$email_revive       = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke via konto estis reaktivigita je ".$email_date.".\n\n".
			"Salutnomo:   %1\$s\n".
			"Nomo:        %2\$s\n\n".
			"Pro sekurecaj kialoj ne eblas sendi al vi vian pasvorton (la sistemo mem ne konas �in).\n\n".
			"Se vi forgesis vian pasvorton, sendu retmesa�on al  ".EMAIL_ADMIN.", oni kreos (kaj sendigos) novan por vi.";


$title_delete_user  = ABBR_MANAGER_NAME.": Konto malaktivigita.";
$email_delete_user  = "Saluton,\n\nvia ".MANAGER_NAME."-sistemo informas vin, ke vias konto estis malaktivigita je ".$email_date.".\n\n".
			"Ni beda�ras, ke vi forlasis nin. Ni dankas pro la farita laboro.\n\n".
			"Se vi volas protesti kontra� la malaktivigo a� se vi pensas, ke temas pri eraro, sendu retmesa�on al ".EMAIL_ADMIN.".";

?>
