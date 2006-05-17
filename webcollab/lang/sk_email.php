<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2005 Stanislav Pekarèík, fredis@SoftHome.net

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

  Email text language files for 'sk' (Slovenský)


  Maintainer: 

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Nový súbor nahratý: %s";
$email_file_post          = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka ktorá Vás informuje ¾e bol nahratý nový súbor dòa ".$email_date." od %1\$s.\n\n".
                            "Súbor:        %2\$s\n".
                            "Obsah: %3\$s\n\n".
                            "Prosím nav¹tívte webstránku pre ïal¹ie informácie.\n\n".BASE_URL."%4\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nová po¹ta na fóre: %s";
$email_forum_post         = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka ktorá Vás informuje, ¾e máte na fóre novú správu zo dòa ".$email_date." od %1\$s:\n\n".
                            "%2\$s\n\n".
                            "Prosím nav¹tívte webstránku pre viac detailov.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e máte
na fóre novú správu zo dòa ".$email_date." od %1\$s.\n\n".
                            "Táto správa je odpoveï na skor¹iu správu od %2\$s.\n\n".
                            "Orginálna správa:\n%3\$s\n\n".
                            "Nová odpoveï:\n%4\$s\n\n".
                            "Prosím nav¹tívte webstránku pre viac detailov.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Úloha:     %2\$s\n".
                            "Stav:   %3\$s\n".
                            "Vlastník:    %4\$s ( %5\$s )\n".
                            "Text:\n%6\$s\n\n".
                            "Prosím nav¹tívte webstránku pre viac detailov.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Vá¹ projekt bol prevzatý";
$title_takeover_task      = ABBR_MANAGER_NAME.": Va¹a úloha bola prevzatá";

$email_takeover_task      = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e úloha, ktorú vlastníte
bola prevzatá administrátorom, zo dòa ".$email_date.".\n\n";
$email_takeover_project   = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e projekt, ktorý vlastníte, bol prevzatý administrátorom, zo dòa ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nový projekt pre Vás";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nová úloha pre Vás";

$email_new_owner_project  = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e je vytvorený nový projekt  dòa ".$email_date.", a Vy ste jeho vlastník.\n\n".
                            "Tu sú detaily:\n\n";

$email_new_owner_task     = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e je vytvorená nová úloha dòa ".$email_date.", a Vy ste jej vlastník.\n\n".
                            "Tu sú detaily:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nový projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nová úloha: %s";

$email_new_group_project  = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e je vytvorený nový projekt dòa ".$email_date."\n\n".
                            "Tu sú detaily:\n\n";

$email_new_group_task     = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e je vytvorená nová úloha dòa ".$email_date."\n\n".
                            "Tu sú detaily:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Vá¹ projekt bol zmenený";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Va¹a úloha bola zmenená";

$email_edit_owner_project = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e projekt, ktorý vlastníte bol zmenený, zo dòa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$email_edit_owner_task    = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e úloha, 
ktorú vlastníte bola zmenená, zo dòa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt zmenený";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Úloha zmenená";

$email_edit_group_project = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e projekt, ktorý vlastní %s bol zmenený, zo dòa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$email_edit_group_task    = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e úloha,  ktorú vlastní %s bola zmenená, zo dòa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt zru¹ený";
$title_delete_task        = ABBR_MANAGER_NAME.": Úloha zru¹ená";

$email_delete_project     = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e projekt, ktorého ste vlastník bol zru¹ený, zo dòa  ".$email_date."\n\n".
                            "Ïakujeme za správu projektu , kým trval.\n\n";

$email_delete_task        = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e úloha, ktorej ste vlastník bola zru¹ena, zo dòa ".$email_date."\n\n".
                            "Ïakujeme za správu úlohy, kým trvala.\n\n";

$delete_list              = "Projekt: %1\$s\n".
                            "Úloha:   %2\$s\n".
                            "Stav: %3\$s\n\n".
                            "Text:\n%4\$s\n\n";

$title_welcome            = "Vítame Vás".ABBR_MANAGER_NAME;
$email_welcome            = "Haló,\n\nTo je ".MANAGER_NAME." Va¹a uvítacia stránka ;), zo dòa ".$email_date.".\n\n".
                            "Ak ste tu nový u¾ívateµ, vysvetlí Vám pár vecí, aby ste mohli rýchlo zaèa»\n\n".
                            "Ako prvé tu je nástroj na riadenie projektu, hlavná stránka Vám uká¾e práve dostupné projekty. ".
                            "Ak kliknete na jeden z nich budete vidie» úlohy priradené k projektu. Tu mô¾te zaèa» pracova».\n\n".
                            "Ka¾dá správa alebo úloha, ktorú editujete bude zobrazená ostatným u¾ívateµom ako 'nová' alebo 'zmenená'. To funguje aj opaène a ".
                            "umo¾nuje Vám rýchlo nájs» nové aktivity .\n\n".
                            "Mô¾te tie¾ prevza» alebo da» vlastníctvo úloh a budete ich môc» editova» aj
							v¹etky správy na fóre pripadajúce k nej. ".
                            "Ako budete postupova» v práci editujte text a stav úloh tak, ¾e ka¾dý mô¾e sledova» Vá¹ postup. ".
                            "\n\nMô¾em Vám len teraz za¾ela» úspech. Ak si nebudete vedie» rady, po¹lite mail na".EMAIL_ADMIN." \n\n --Veµa ¹»astia!\n\n".
                            "Login:      %1\$s\n".
                            "Heslo:   %2\$s\n\n".
                            "U¾ívateµská skupina: %3\$s".
                            "Meno:       %4\$s\n".
                            "Webstránka:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Editova» Vá¹ úèet administrátorom";
$email_user_change1       = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e Vá¹
 úèet bol zmenený, zo dòa ".$email_date." od %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Heslo:   %4\$s\n\n".
                            "U¾ívateµská skupina: %5\$s".
                            "U¾ivateµské meno:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Editova» Vá¹ úèet";
$email_user_change2         = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá potvrdzuje, ¾e Vá¹ úèet bol úspe¹ne zmenený, zo dòa ".$email_date.".\n\n".
                              "Login:    %1\$s\n".
                              "Heslo: %2\$s\n\n".
                              "U¾ivateµské meno:     %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Editova» Vá¹ úèet";
$email_user_change3         = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá potvrdzuje, ¾e Vá¹ úèet bol úspe¹ne zmenený, zo dòa ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "Va¹e heslo nebolo zmenené.\n\n".
                              "U¾ivateµské meno:  %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Úèet reaktivovaný";
$email_revive               = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, ¾e Vá¹ úèet bol znovu aktivovaný, zo dòa ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "U¾ivateµské meno:  %2\$s\n\n".
                              "Nemô¾eme Vám posla» Va¹e heslo, lebo je kryptované. \n\n".
                              "Ak ste zabudli heslo, po¹lite email na".EMAIL_ADMIN." pre nové heslo.";

$title_delete_user          = ABBR_MANAGER_NAME.": Úèet deaktivovaný.";
$email_delete_user          = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá Vás informuje ,¾e Vá¹ úèet bol deaktivovaný, zo dòa ".$email_date.".\n\n".
                              "Je nám µúto, ¾e nás opú¹»ate, a ïakujeme Vám za Va¹u prácu!\n\n".
                              "Ak nechcete deaktiváciu, alebo myslíte, ¾e je to vplyvom chyby, po¹lite email na ".EMAIL_ADMIN.".";

?>
