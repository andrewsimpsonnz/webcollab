<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2003 by Andrew Simpson

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

  Email text language files for 'en' (English)

  Maintainer: Andrew Simpson <andrew.simpson at paradise.net.nz>

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post        = ABBR_MANAGER_NAME.": New file upload: %s";
$email_file_post        = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy �j f�jlt t�lt�tt fel ".$email_date." d�tummal a k�vetkez�: %1\$s.\n\n".
                          "F�jl:     %2\$s\n".
			  "Le�r�s:   %3\$s\n\n".
                          "K�rem, tov�bbi r�szletek�rt keresse fel a honlapot.\n\n".BASE_URL."\n";


$title_forum_post        = ABBR_MANAGER_NAME.": �j f�rum �zenet: %s";
$email_forum_post        = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy �j f�rum �zenet �rkezett ".$email_date." d�tummal %1\$s:\n\n%2\$s �ltal.\n\n".
                           "K�rem, tov�bbi r�szletek�rt keresse fel a honlapot.\n\n".BASE_URL."\n";
$email_forum_reply       = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy �j f�rum �zenet �rkezett ".$email_date." d�tummal %1\$s �ltal.\n\n".
                           "Ez egy v�lasz %2\$s el�z� �zenet�re.\n\n".
                           "Eredeti �zenet:\n%3\$s\n\n".
                           "�j v�lasz:\n%4\$s\n\n".
                           "K�rem, tov�bbi r�szletek�rt keresse fel a honlapot.\n\n".BASE_URL."\n";


$email_list =  "Projekt:    %1\$s\n".
               "Feladat:    %2\$s\n".
               "�llapot:    %3\$s\n".
               "Tulajdonos: %4\$s ( %5\$s )\n".
               "Sz�veg:\n%6\$s\n\n".
               "K�rem, tov�bbi r�szletek�rt keresse fel a honlapot.\n\n".BASE_URL."\n";


$title_takeover_project  = ABBR_MANAGER_NAME.": Az �n projektj�t �tvett�k";
$title_takeover_task     = ABBR_MANAGER_NAME.": Az �n feladat�t �tvett�k";

$email_takeover_task     = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy �n �lt�l tulajdonolt feladatot egy admin �tvett ekkor: ".$email_date.".\n\n";
$email_takeover_project  = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy �n �lt�l tulajdonolt projektet egy admin �tvett ekkor: ".$email_date.".\n\n";


$title_new_owner_project = ABBR_MANAGER_NAME.": �j projekt az �n sz�m�ra";
$title_new_owner_task     = ABBR_MANAGER_NAME.": �j feladat az �n sz�m�ra";

$email_new_owner_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt l�trej�tt ".$email_date." d�tummal, �s �n lett a tulajdonosa.\n\nA r�szleteket itt tal�lja:\n\n";
$email_new_owner_task    = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt l�trej�tt ".$email_date.", d�tummal, �s �n lett a tulajdonosa.\n\nA r�szleteket itt tal�lja:\n\n";


$title_new_group_project = ABBR_MANAGER_NAME.": �j projekt: %s";
$title_new_group_task    = ABBR_MANAGER_NAME.": �j feladat: %s";

$email_new_group_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt l�trej�tt ".$email_date." d�tummal.\n\nA r�szleteket itt tal�lja:\n\n";
$email_new_group_task    = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy feladat l�trej�tt ".$email_date." d�tummal.\n\nA r�szleteket itt tal�lja:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Friss�tve az �n projektje";
$title_edit_owner_task   = ABBR_MANAGER_NAME.": Friss�tve az �n feladata";

$email_edit_owner_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az �n egyik projektj�t megv�ltoztatt�k ".$email_date." d�tummal.\n\nA r�szleteket itt tal�lja:\n\n";
$email_edit_owner_task   = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az �n egyik feladat�t megv�ltoztatt�k ".$email_date." d�tummal.\n\nA r�szleteket itt tal�lja:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt friss�tve";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Feladat friss�tve";

$email_edit_group_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt, melynek tulajdonosa: %s, megv�ltozott ".$email_date." d�tummal.\n\nA r�szleteket itt tal�lja:\n\n";
$email_edit_group_task   = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy feladat, melynek tulajdonosa: %s, megv�ltozott ".$email_date." d�tummal.\n\nA r�szleteket itt tal�lja:\n\n";


$title_delete_project    = ABBR_MANAGER_NAME.": Projekt t�r�lve";
$title_delete_task       = ABBR_MANAGER_NAME.": Feladat t�r�lve";

$email_delete_project    = "Hello,\n\n".
                           "Ez itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az �n egyik projektj�t t�r�lt�k ".$email_date." d�tummal.\n\n".
                           "K�sz�nj�k, hogy kezelte as projektet am�g l�tezett.\n\n";
$email_delete_task       = "Hello,\n\n".
                           "Ez itt a ".MANAGER_NAME." honlap azzal kapcsolatban, az �n egyik feladat�t t�r�lt�k ".$email_date." d�tummal.\n\n".
                           "K�sz�nj�k, hogy kezelte as feladatot am�g l�tezett.\n\n";

$delete_list = "Projekt:  %1\$s\n".
               "Feladat:  %2\$s\n".
               "�llapot:  %3\$s\n\n".
               "Sz�veg:\n%4\$s\n\n";

$title_welcome      = "K�sz�ntj�k itt: ".ABBR_MANAGER_NAME;
$email_welcome      = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap �dv�zlete k�zt�nk ;) ".$email_date." d�tummal.\n\n".
			"Mivel �n egy �j tag, itt le�runk n�h�ny fontos dolgot, hogy megkezdhesse a munk�t.\n\n".
			"El�sz�r is ez egy projekt-kezel� eszk�z, a f�k�perny�n az el�rhet� projekteket fogja l�tni. ".
			"Ha a nevek egyik�re kattint, akkor a feladatok r�szn�l tal�lja mag�t. Itt fog a munka eg�sze zajlani.\n\n".
			"Minden elem amit bejegyez, vagy feladat amit szerkeszt '�j' vagy 'friss�tett' jelz�ssel fog m�soknak megjelenni. Ez k�lcs�n�sen �gy van �s ".
			"lehet�v� teszi, hogy k�nnyen megtal�ljuk hol folyik akt�van a munka.\n\n".
			"Ezek mellett �tvehetsz, vagy szerezhetsz tulajdonosi jogot a feladatokhoz �s �gy szerkesztheted �ket, illetve a hozz�juk tartoz� f�rum �zeneteket. ".
			"Ahogy halad a munk�ban, k�rj�k szerkessze a feladat sz�veg�t �s �llapot�t, �gy mindenki nyomon k�vetheti a fejl�d�st. ".
			"\n\nCsak sok sikert tudunk k�v�nni, �s �rjon ide: ".$EMAIL_ADMIN.", ha elakadna.\n\n --Sok szerencs�t !\n\n".
			"Felhaszn�l�:  %1\$s\n".
			"Jelsz�:       %2\$s\n\n".
			"Csoportok:    %3\$s".
			"N�v:          %4\$s\n".
			"Website:      ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": Az �n fi�kj�t egy admin szerkesztette";
$email_user_change1 = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az �n fi�kj�n v�ltoztat�sok t�rt�ntek ekkor: ".$email_date.", %1\$s ( %2\$s ) �ltal.\n\n".
			"Felhaszn�l�:  %3\$s\n".
			"Jelsz�:       %4\$s\n\n".
			"Csoporrtok:   %5\$s".
			"N�v:          %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": Fi�k szerkesztve";
$email_user_change2 = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap, amely meger�s�ti, hogy �n sikerrel v�ltoztat�sokat hajtott v�gre a fi�kj�n ".$email_date." d�tummal.\n\n".
			"Felhaszn�l�:  %1\$s\n".
			"Jelsz�:       %2\$s\n\n".
			"N�v:          %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": Fi�k szerkesztve";
$email_user_change3 = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap, amely meger�s�ti, hogy �n sikerrel v�ltoztat�sokat hajtott v�gre a fi�kj�n ".$email_date." d�tummal.\n\n".
			"Felhaszn�l�:  %1\$s\n".
			"A l�tez� jelszava nem v�ltozott.\n\n".
			"N�v:  %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": Fi�k �jra aktiv�lva";
$email_revive       = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az �n fi�kj�t �jj��lesztett�k ".$email_date." d�tummal.\n\n".
			"Bejelntkez�si n�v:  %1\$s\n".
			"Felhaszn�l�i n�v:   %2\$s\n\n".
			"Nem tudjuk a jelszav�t elk�ldeni, mert titkos�tva van. \n\n".
			"Ha elfelejtette a jelszav�t, k�ldj�n emailt ide: ".$EMAIL_ADMIN." egy �j jelsz��rt.";



$title_delete_user  = ABBR_MANAGER_NAME.": Fi�k felf�ggesztve";
$email_delete_user  = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az �n fi�kj�t felf�ggesztett�k ".$email_date." d�tummal.\n".
			"Sajn�ljuk, hogy elhagyott minket �s szertn�nk megk�sz�nni eddigi munk�j�t!\n\n".
			"Ha kifog�solja a felf�ggeszt�st, vagy hib�ra gyanakszik, k�ldj�n egy emailt ide: ".$EMAIL_ADMIN.".";

?>