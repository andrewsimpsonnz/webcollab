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
$email_file_post        = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy új fájlt töltött fel ".$email_date." dátummal a következõ: %1\$s.\n\n".
                          "Fájl:     %2\$s\n".
			  "Leírás:   %3\$s\n\n".
                          "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."\n";


$title_forum_post        = ABBR_MANAGER_NAME.": Új fórum üzenet: %s";
$email_forum_post        = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy új fórum üzenet érkezett ".$email_date." dátummal %1\$s:\n\n%2\$s által.\n\n".
                           "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."\n";
$email_forum_reply       = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy új fórum üzenet érkezett ".$email_date." dátummal %1\$s által.\n\n".
                           "Ez egy válasz %2\$s elõzõ üzenetére.\n\n".
                           "Eredeti üzenet:\n%3\$s\n\n".
                           "Új válasz:\n%4\$s\n\n".
                           "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."\n";


$email_list =  "Projekt:    %1\$s\n".
               "Feladat:    %2\$s\n".
               "Állapot:    %3\$s\n".
               "Tulajdonos: %4\$s ( %5\$s )\n".
               "Szöveg:\n%6\$s\n\n".
               "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."\n";


$title_takeover_project  = ABBR_MANAGER_NAME.": Az Ön projektjét átvették";
$title_takeover_task     = ABBR_MANAGER_NAME.": Az Ön feladatát átvették";

$email_takeover_task     = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy Ön áltál tulajdonolt feladatot egy admin átvett ekkor: ".$email_date.".\n\n";
$email_takeover_project  = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy Ön áltál tulajdonolt projektet egy admin átvett ekkor: ".$email_date.".\n\n";


$title_new_owner_project = ABBR_MANAGER_NAME.": Új projekt az Ön számára";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Új feladat az Ön számára";

$email_new_owner_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt létrejött ".$email_date." dátummal, és Ön lett a tulajdonosa.\n\nA részleteket itt találja:\n\n";
$email_new_owner_task    = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt létrejött ".$email_date.", dátummal, és Ön lett a tulajdonosa.\n\nA részleteket itt találja:\n\n";


$title_new_group_project = ABBR_MANAGER_NAME.": Új projekt: %s";
$title_new_group_task    = ABBR_MANAGER_NAME.": Új feladat: %s";

$email_new_group_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt létrejött ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";
$email_new_group_task    = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy feladat létrejött ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Frissítve az Ön projektje";
$title_edit_owner_task   = ABBR_MANAGER_NAME.": Frissítve az Ön feladata";

$email_edit_owner_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön egyik projektjét megváltoztatták ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";
$email_edit_owner_task   = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön egyik feladatát megváltoztatták ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt frissítve";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Feladat frissítve";

$email_edit_group_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt, melynek tulajdonosa: %s, megváltozott ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";
$email_edit_group_task   = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy feladat, melynek tulajdonosa: %s, megváltozott ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";


$title_delete_project    = ABBR_MANAGER_NAME.": Projekt törölve";
$title_delete_task       = ABBR_MANAGER_NAME.": Feladat törölve";

$email_delete_project    = "Hello,\n\n".
                           "Ez itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön egyik projektjét törölték ".$email_date." dátummal.\n\n".
                           "Köszönjük, hogy kezelte as projektet amíg létezett.\n\n";
$email_delete_task       = "Hello,\n\n".
                           "Ez itt a ".MANAGER_NAME." honlap azzal kapcsolatban, az Ön egyik feladatát törölték ".$email_date." dátummal.\n\n".
                           "Köszönjük, hogy kezelte as feladatot amíg létezett.\n\n";

$delete_list = "Projekt:  %1\$s\n".
               "Feladat:  %2\$s\n".
               "Állapot:  %3\$s\n\n".
               "Szöveg:\n%4\$s\n\n";

$title_welcome      = "Köszöntjük itt: ".ABBR_MANAGER_NAME;
$email_welcome      = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap üdvözlete köztünk ;) ".$email_date." dátummal.\n\n".
			"Mivel Ön egy új tag, itt leírunk néhány fontos dolgot, hogy megkezdhesse a munkát.\n\n".
			"Elõször is ez egy projekt-kezelõ eszköz, a fõképernyõn az elérhetõ projekteket fogja látni. ".
			"Ha a nevek egyikére kattint, akkor a feladatok résznél találja magát. Itt fog a munka egésze zajlani.\n\n".
			"Minden elem amit bejegyez, vagy feladat amit szerkeszt 'új' vagy 'frissített' jelzéssel fog másoknak megjelenni. Ez kölcsönösen így van és ".
			"lehetõvé teszi, hogy könnyen megtaláljuk hol folyik aktívan a munka.\n\n".
			"Ezek mellett átvehetsz, vagy szerezhetsz tulajdonosi jogot a feladatokhoz és így szerkesztheted õket, illetve a hozzájuk tartozó fórum üzeneteket. ".
			"Ahogy halad a munkában, kérjük szerkessze a feladat szövegét és állapotát, így mindenki nyomon követheti a fejlõdést. ".
			"\n\nCsak sok sikert tudunk kívánni, és írjon ide: ".$EMAIL_ADMIN.", ha elakadna.\n\n --Sok szerencsét !\n\n".
			"Felhasználó:  %1\$s\n".
			"Jelszó:       %2\$s\n\n".
			"Csoportok:    %3\$s".
			"Név:          %4\$s\n".
			"Website:      ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": Az Ön fiókját egy admin szerkesztette";
$email_user_change1 = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön fiókján változtatások történtek ekkor: ".$email_date.", %1\$s ( %2\$s ) által.\n\n".
			"Felhasználó:  %3\$s\n".
			"Jelszó:       %4\$s\n\n".
			"Csoporrtok:   %5\$s".
			"Név:          %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": Fiók szerkesztve";
$email_user_change2 = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap, amely megerõsíti, hogy Ön sikerrel változtatásokat hajtott végre a fiókján ".$email_date." dátummal.\n\n".
			"Felhasználó:  %1\$s\n".
			"Jelszó:       %2\$s\n\n".
			"Név:          %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": Fiók szerkesztve";
$email_user_change3 = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap, amely megerõsíti, hogy Ön sikerrel változtatásokat hajtott végre a fiókján ".$email_date." dátummal.\n\n".
			"Felhasználó:  %1\$s\n".
			"A létezõ jelszava nem változott.\n\n".
			"Név:  %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": Fiók újra aktiválva";
$email_revive       = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön fiókját újjáélesztették ".$email_date." dátummal.\n\n".
			"Bejelntkezési név:  %1\$s\n".
			"Felhasználói név:   %2\$s\n\n".
			"Nem tudjuk a jelszavát elküldeni, mert titkosítva van. \n\n".
			"Ha elfelejtette a jelszavát, küldjön emailt ide: ".$EMAIL_ADMIN." egy új jelszóért.";



$title_delete_user  = ABBR_MANAGER_NAME.": Fiók felfüggesztve";
$email_delete_user  = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön fiókját felfüggesztették ".$email_date." dátummal.\n".
			"Sajnáljuk, hogy elhagyott minket és szertnénk megköszönni eddigi munkáját!\n\n".
			"Ha kifogásolja a felfüggesztést, vagy hibára gyanakszik, küldjön egy emailt ide: ".$EMAIL_ADMIN.".";

?>