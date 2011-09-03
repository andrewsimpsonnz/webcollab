<?php
/*
  $Id$

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

  Language files for 'hu' (Hungarian)

  Translation: Széll Tamás

  Maintainer: Széll Tamás

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s. %s. %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Új feltöltött fájl: %s";
$email_file_post          = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy új fájlt töltött fel ".$email_date." dátummal a következő: %1\$s.\n\n".
                            "Fájl:     %2\$s\n".
                            "Leírás:   %3\$s\n\n".
                            "Projekt:  %4\$s\n".
                            "Feladat:  %5\$s\n\n".
                            "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Új fórum üzenet: %s";
$email_forum_post         = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy új fórum üzenet érkezett ".$email_date." dátummal %1\$s:\n\n----\n\n%2\$s által.\n\n----\n\n".
                           "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy új fórum üzenet érkezett ".$email_date." dátummal %1\$s által.\n\n".
                            "Ez egy válasz %2\$s előző üzenetére.\n\n".
                            "Eredeti üzenet:\n%3\$s\n\n".
                            "----\n\n".
                            "Új válasz:\n%4\$s\n\n".
                            "----\n\n".
                            "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Projekt:    %1\$s\n".
               "Feladat:    %2\$s\n".
               "Állapot:    %3\$s\n".
               "Tulajdonos: %4\$s ( %5\$s )\n".
               "Szöveg:\n%6\$s\n\n".
               "Kérem, további részletekért keresse fel a honlapot.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Az Ön projektjét átvették";
$title_takeover_task      = ABBR_MANAGER_NAME.": Az Ön feladatát átvették";

$email_takeover_task      = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy Ön áltál tulajdonolt feladatot egy admin átvett ekkor: ".$email_date.".\n\n";
$email_takeover_project   = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy Ön áltál tulajdonolt projektet egy admin átvett ekkor: ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Új projekt az Ön számára";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Új feladat az Ön számára";

$email_new_owner_project  = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt létrejött ".$email_date." dátummal, és Ön lett a tulajdonosa.\n\nA részleteket itt találja:\n\n";
$email_new_owner_task     = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt létrejött ".$email_date.", dátummal, és Ön lett a tulajdonosa.\n\nA részleteket itt találja:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Új projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Új feladat: %s";

$email_new_group_project  = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt létrejött ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";
$email_new_group_task     = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy feladat létrejött ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Frissítve az Ön projektje";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Frissítve az Ön feladata";

$email_edit_owner_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön egyik projektjét megváltoztatták ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";
$email_edit_owner_task    = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön egyik feladatát megváltoztatták ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt frissítve";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Feladat frissítve";

$email_edit_group_project = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy projekt, melynek tulajdonosa: %s, megváltozott ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";
$email_edit_group_task    = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy egy feladat, melynek tulajdonosa: %s, megváltozott ".$email_date." dátummal.\n\nA részleteket itt találja:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Projekt törölve";
$title_delete_task        = ABBR_MANAGER_NAME.": Feladat törölve";

$email_delete_project     = "Hello,\n\n".
                            "Ez itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön egyik projektjét törölték ".$email_date." dátummal.\n\n".
                            "Köszönjük, hogy kezelte as projektet amíg létezett.\n\n";
$email_delete_task        = "Hello,\n\n".
                            "Ez itt a ".MANAGER_NAME." honlap azzal kapcsolatban, az Ön egyik feladatát törölték ".$email_date." dátummal.\n\n".
                            "Köszönjük, hogy kezelte as feladatot amíg létezett.\n\n";

$delete_list = "Projekt:  %1\$s\n".
               "Feladat:  %2\$s\n".
               "Állapot:  %3\$s\n\n".
               "Szöveg:\n%4\$s\n\n";

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

$title_welcome            = "Köszöntjük itt: ".ABBR_MANAGER_NAME;
$email_welcome            = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap üdvözlete köztünk ;) ".$email_date." dátummal.\n\n".
                            "Mivel Ön egy új tag, itt leírunk néhány fontos dolgot, hogy megkezdhesse a munkát.\n\n".
                            "Először is ez egy projekt-kezelő eszköz, a főképernyőn az elérhető projekteket fogja látni. ".
                            "Ha a nevek egyikére kattint, akkor a feladatok résznél találja magát. Itt fog a munka egésze zajlani.\n\n".
                            "Minden elem amit bejegyez, vagy feladat amit szerkeszt 'új' vagy 'frissített' jelzéssel fog másoknak megjelenni. Ez kölcsönösen így van és ".
                            "lehetővé teszi, hogy könnyen megtaláljuk hol folyik aktívan a munka.\n\n".
                            "Ezek mellett átvehetsz, vagy szerezhetsz tulajdonosi jogot a feladatokhoz és így szerkesztheted őket, illetve a hozzájuk tartozó fórum üzeneteket. ".
                            "Ahogy halad a munkában, kérjük szerkessze a feladat szövegét és állapotát, így mindenki nyomon követheti a fejlődést. ".
                            "\n\nCsak sok sikert tudunk kívánni, és írjon ide: ".EMAIL_ADMIN.", ha elakadna.\n\n --Sok szerencsét !\n\n".
                            "Felhasználó:  %1\$s\n".
                            "Jelszó:       %2\$s\n\n".
                            "Csoportok:    %3\$s".
                            "Név:          %4\$s\n".
                            "Website:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Az Ön fiókját egy admin szerkesztette";
$email_user_change1       = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön fiókján változtatások történtek ekkor: ".$email_date.", %1\$s ( %2\$s ) által.\n\n".
                            "Felhasználó:  %3\$s\n".
                            "Jelszó:       %4\$s\n\n".
                            "Csoportok:   %5\$s".
                            "Név:          %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Fiók szerkesztve";
$email_user_change2       = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap, amely megerősíti, hogy Ön sikerrel változtatásokat hajtott végre a fiókján ".$email_date." dátummal.\n\n".
                            "Felhasználó:  %1\$s\n".
                            "Jelszó:       %2\$s\n\n".
                            "Név:          %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Fiók szerkesztve";
$email_user_change3       = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap, amely megerősíti, hogy Ön sikerrel változtatásokat hajtott végre a fiókján ".$email_date." dátummal.\n\n".
                            "Felhasználó:  %1\$s\n".
                            "A létező jelszava nem változott.\n\n".
                            "Név:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Fiók újra aktiválva";
$email_revive             = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön fiókját újjáélesztették ".$email_date." dátummal.\n\n".
                            "Bejelntkezési név:  %1\$s\n".
                            "Felhasználói név:   %2\$s\n\n".
                            "Nem tudjuk a jelszavát elküldeni, mert titkosítva van. \n\n".
                            "Ha elfelejtette a jelszavát, küldjön emailt ide: ".EMAIL_ADMIN." egy új jelszóért.";



$title_delete_user        = ABBR_MANAGER_NAME.": Fiók felfüggesztve";
$email_delete_user        = "Hello,\n\nEz itt a ".MANAGER_NAME." honlap azzal kapcsolatban, hogy az Ön fiókját felfüggesztették ".$email_date." dátummal.\n".
                            "Sajnáljuk, hogy elhagyott minket és szertnénk megköszönni eddigi munkáját!\n\n".
                            "Ha kifogásolja a felfüggesztést, vagy hibára gyanakszik, küldjön egy emailt ide: ".EMAIL_ADMIN.".";

?>
