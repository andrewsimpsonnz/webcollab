<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2005 Stanislav Pekarčík, fredis@SoftHome.net

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

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Nový súbor nahratý: %s";
$email_file_post          = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka ktorá Vás informuje že bol nahratý nový súbor dňa ".$email_date." od %1\$s.\n\n".
                            "Súbor:        %2\$s\n".
                            "Obsah: %3\$s\n\n".
                            "Projekt:      %4\$s\n".
                            "Úloha:        %5\$s\n\n".
                            "Prosím navštívte webstránku pre ďalšie informácie.\n\n".BASE_URL."%6\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nová pošta na fóre: %s";
$email_forum_post         = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka ktorá Vás informuje, že máte na fóre novú správu zo dňa ".$email_date." od %1\$s:\n\n".
                            "%2\$s\n\n".
                            "Prosím navštívte webstránku pre viac detailov.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že máte
na fóre novú správu zo dňa ".$email_date." od %1\$s.\n\n".
                            "Táto správa je odpoveď na skoršiu správu od %2\$s.\n\n".
                            "Orginálna správa:\n%3\$s\n\n".
                            "Nová odpoveď:\n%4\$s\n\n".
                            "Prosím navštívte webstránku pre viac detailov.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "Úloha:     %2\$s\n".
                            "Stav:   %3\$s\n".
                            "Vlastník:    %4\$s ( %5\$s )\n".
                            "Text:\n%6\$s\n\n".
                            "Prosím navštívte webstránku pre viac detailov.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": Váš projekt bol prevzatý";
$title_takeover_task      = ABBR_MANAGER_NAME.": Vaša úloha bola prevzatá";

$email_takeover_task      = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že úloha, ktorú vlastníte
bola prevzatá administrátorom, zo dňa ".$email_date.".\n\n";
$email_takeover_project   = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že projekt, ktorý vlastníte, bol prevzatý administrátorom, zo dňa ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nový projekt pre Vás";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nová úloha pre Vás";

$email_new_owner_project  = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že je vytvorený nový projekt  dňa ".$email_date.", a Vy ste jeho vlastník.\n\n".
                            "Tu sú detaily:\n\n";

$email_new_owner_task     = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že je vytvorená nová úloha dňa ".$email_date.", a Vy ste jej vlastník.\n\n".
                            "Tu sú detaily:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nový projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nová úloha: %s";

$email_new_group_project  = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že je vytvorený nový projekt dňa ".$email_date."\n\n".
                            "Tu sú detaily:\n\n";

$email_new_group_task     = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že je vytvorená nová úloha dňa ".$email_date."\n\n".
                            "Tu sú detaily:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Váš projekt bol zmenený";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Vaša úloha bola zmenená";

$email_edit_owner_project = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že projekt, ktorý vlastníte bol zmenený, zo dňa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$email_edit_owner_task    = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že úloha, ktorú vlastníte bola zmenená, zo dňa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt zmenený";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Úloha zmenená";

$email_edit_group_project = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že projekt, ktorý vlastní %s bol zmenený, zo dňa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$email_edit_group_task    = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že úloha,  ktorú vlastní %s bola zmenená, zo dňa ".$email_date.".\n\n".
                            "Tu sú detaily:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt zrušený";
$title_delete_task        = ABBR_MANAGER_NAME.": Úloha zrušená";

$email_delete_project     = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že projekt, ktorého ste vlastník bol zrušený, zo dňa  ".$email_date."\n\n".
                            "Ďakujeme za správu projektu , kým trval.\n\n";

$email_delete_task        = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že úloha, ktorej ste vlastník bola zrušena, zo dňa ".$email_date."\n\n".
                            "Ďakujeme za správu úlohy, kým trvala.\n\n";

$delete_list              = "Projekt: %1\$s\n".
                            "Úloha:   %2\$s\n".
                            "Stav: %3\$s\n\n".
                            "Text:\n%4\$s\n\n";

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

$title_welcome            = "Vítame Vás".ABBR_MANAGER_NAME;
$email_welcome            = "Haló,\n\nTo je ".MANAGER_NAME." Vaša uvítacia stránka ;), zo dňa ".$email_date.".\n\n".
                            "Ak ste tu nový užívateľ, vysvetlí Vám pár vecí, aby ste mohli rýchlo začať\n\n".
                            "Ako prvé tu je nástroj na riadenie projektu, hlavná stránka Vám ukáže práve dostupné projekty. ".
                            "Ak kliknete na jeden z nich budete vidieť úlohy priradené k projektu. Tu môžte začať pracovať.\n\n".
                            "Každá správa alebo úloha, ktorú editujete bude zobrazená ostatným užívateľom ako 'nová' alebo 'zmenená'. To funguje aj opačne a ".
                            "umožnuje Vám rýchlo nájsť nové aktivity .\n\n".
                            "Môžte tiež prevzať alebo dať vlastníctvo úloh a budete ich môcť editovať aj
							všetky správy na fóre pripadajúce k nej. ".
                            "Ako budete postupovať v práci editujte text a stav úloh tak, že každý môže sledovať Váš postup. ".
                            "\n\nMôžem Vám len teraz zaželať úspech. Ak si nebudete vedieť rady, pošlite mail na".EMAIL_ADMIN." \n\n --Veľa šťastia!\n\n".
                            "Login:      %1\$s\n".
                            "Heslo:   %2\$s\n\n".
                            "Užívateľská skupina: %3\$s".
                            "Meno:       %4\$s\n".
                            "Webstránka:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Editovať Váš účet administrátorom";
$email_user_change1       = "Haló,\n\n".
                            "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že Váš
 účet bol zmenený, zo dňa ".$email_date." od %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Heslo:   %4\$s\n\n".
                            "Užívateľská skupina: %5\$s".
                            "Uživateľské meno:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Editovať Váš účet";
$email_user_change2         = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá potvrdzuje, že Váš účet bol úspešne zmenený, zo dňa ".$email_date.".\n\n".
                              "Login:    %1\$s\n".
                              "Heslo: %2\$s\n\n".
                              "Uživateľské meno:     %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Editovať Váš účet";
$email_user_change3         = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá potvrdzuje, že Váš účet bol úspešne zmenený, zo dňa ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "Vaše heslo nebolo zmenené.\n\n".
                              "Uživateľské meno:  %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": Účet reaktivovaný";
$email_revive               = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá Vás informuje, že Váš účet bol znovu aktivovaný, zo dňa ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "Uživateľské meno:  %2\$s\n\n".
                              "Nemôžeme Vám poslať Vaše heslo, lebo je kryptované. \n\n".
                              "Ak ste zabudli heslo, pošlite email na".EMAIL_ADMIN." pre nové heslo.";

$title_delete_user          = ABBR_MANAGER_NAME.": Účet deaktivovaný.";
$email_delete_user          = "Haló,\n\n".
                              "To je ".MANAGER_NAME." stránka, ktorá Vás informuje ,že Váš účet bol deaktivovaný, zo dňa ".$email_date.".\n\n".
                              "Je nám ľúto, že nás opúšťate, a ďakujeme Vám za Vašu prácu!\n\n".
                              "Ak nechcete deaktiváciu, alebo myslíte, že je to vplyvom chyby, pošlite email na ".EMAIL_ADMIN.".";

?>
