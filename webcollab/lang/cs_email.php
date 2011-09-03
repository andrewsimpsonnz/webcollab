<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

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

  Translation: Lukas Moravek <moravekl at gmail.com>
  Corrections: Jirka Dutka <jirka at dutka.net>
  Corrections: Milan Horák <strangeril at users.sourceforge.net>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 04. Apr 2008 v 9:13 +1200
$email_date = sprintf('%s. %s %s v %s %+03d00', date('d', $ltime ), $month_array_2p[(date('n', $ltime ) )], date('Y', $ltime ), date('H:i', $ltime ),TZ );

//$email_date = date("d. " )." ".$month_array_2p[(date("n" ) )]." ".date('Y \v h:i' );

$title_file_post          = ABBR_MANAGER_NAME.": Nahrán nový soubor: %s";
$email_file_post          = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že byl přidán nový soubor ".$email_date." uživatelem %1\$s.\n\n".
                            "Soubor:        %2\$s\n".
                            "Popis: %3\$s\n\n".
                            "Projekt:       %4\$s\n".
                            "Úkol:          %5\$s\n\n".
                            "Prosím navštivte tuto web stránku pro více informací.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nový příspěvek ve fóru: %s";
$email_forum_post         = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že byl vložen nový příspěvek do fóra ".$email_date." uživatelem %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Prosím navštivte tuto web stránku pro více informací.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že byl vložen nový příspěvek do fóra ".$email_date." uživatelem %1\$s.\n\n".
                            "Tento příspěvek je odpovědí na dřívější příspěvek zaslaný %2\$s.\n\n".
                            "Původní příspěvek:\n%3\$s\n\n".
                            "----\n\n".
                            "Odpověd:\n%4\$s\n\n".
                            "----\n\n".
                            "Prosím navštivte tuto web stránku pro více informací.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Projekt:  %1\$s\n".
               "Úkol:     %2\$s\n".
               "Stav:   %3\$s\n".
               "Vlastník:    %4\$s ( %5\$s )\n".
               "Text:\n%6\$s\n\n".
               "Prosím navštivte tuto web stránku pro více informací.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Váš projekt byl převzat";
$title_takeover_task      = ABBR_MANAGER_NAME.": Váš úkol byl převzat";

$email_takeover_task      = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že úkol, který jste vlastnil, byl převzat administrátorem ".$email_date.".\n\n";
$email_takeover_project   = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že projekt, který jste vlastnil, byl převzat administrátorem ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Projekt pro Vás";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Úkol pro Vás";

$email_new_owner_project  = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že projekt který byl vytvořen ".$email_date.", je nyní pod Vaší správou (jste vlastníkem projektu).\n\nZde podrobnosti:\n\n";
$email_new_owner_task     = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že úkol který byl vytvořen ".$email_date.", je nyní pod Vaší správou (jste vlastníkem úkolu).\n\nZde jsou podrobnosti:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nový projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nový úkol: %s";

$email_new_group_project  = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že byl vytvořen nový projekt ".$email_date."\n\nZde podrobnosti:\n\n";
$email_new_group_task     = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že byl vytvořen nový úkol ".$email_date."\n\nZde podrobnosti:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Váš projekt byl aktualizován";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Váš úkol byl aktualizován";

$email_edit_owner_project = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že projekt který vlastníte byl změněn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";
$email_edit_owner_task    = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že úkol který vlastníte byl změněn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Aktualizovaný projekt";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Aktualizovaný úkol";

$email_edit_group_project = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že projekt který vlastníte %s byl změněn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";
$email_edit_group_task    = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že úkol který vlastníte %s byl změněn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Projekt smazán";
$title_delete_task        = ABBR_MANAGER_NAME.": Úkol smazán";

$email_delete_project     = "Dobrý den,\n\n".
                            "".MANAGER_NAME." Vás informuje, že projekt kterého jste byl vlastníkem byl smazán ".$email_date."\n\n".
                            "Děkujeme za řízení projektu v průběhu jeho trvání.\n\n";
$email_delete_task        = "Dobrý den,\n\n".
                            "".MANAGER_NAME." Vás informuje, že úkol kterého jste byl vlastníkem, byl smazán ".$email_date."\n\n".
                            "Děkujeme za řízení úkolu v průběhu jeho trvání.\n\n";

$delete_list = "Projektt: %1\$s\n".
                "Úkol:   %2\$s\n".
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

$title_welcome            = "Vítejte v ".ABBR_MANAGER_NAME;
$email_welcome            = "Dobrý den,\n\n ".MANAGER_NAME." Vás vítá v nástroji pro správu projektů ".$email_date.".\n\n".
                            //"As you are new here I will explain a couple of things to you so that you can quickly start to work\n\n".
                            "Na začátek, několik málo tipů, které Vám umožní začít rychle pracovat s programem\n\n".
                            //"First of all this is a project management tool, the main screen will show you the projects that are currently available. ".
                            "Hlavní stránka Vám zobrazí projekty, které jsou Vám dostupné ".
                            //"If you click on one of the names you will find yourself in the task's part. This is where all the work will go on.\n\n".
                            "Pokud kliknete na jeden z projektů, octnete se v části úkolů daného projektu. Nyní můžete začít pracovat :-).\n\n".
                            //Every item you post or task you edit will be shown to other users as 'new' or 'updated'. This also works vice-versa and ".
                            //"it enables you to quickly spot where the activity is
                            "Každá položka, kterou odešlete nebo úkol, který změníte bude zobrazena ostatním uživatelům jako aktualizovaná nebo nová. 
                            Samozřejmě toto funguje i naopak a umožňuje rychle si všimnout aktivity\n\n".
                            //"You can also take or get ownership of tasks and you will find yourself able to edit them and all the forum posts belonging to it. ".
                            "Můžete také převzít vlastnictví úkolu, čímž získáte právo jej spravovat, včetně fóra patřícího k němu. ".
                            //"As you progress with your work please edit your task's text and status so that everybody can keep a track on your progress. ".
                            "Jak budete pokračovat se svou prací, prosím editujte text úkolu a jeho stav tak, aby každý mohl mít povědomí o Vašem postupu. ".
                            "\n\nNyní mi nezbývá než Vám popřát mnoho úspěchů. V případě, že si nebude vědět rady pošlete email na ".EMAIL_ADMIN.".\n\n --Hodně štestí !\n\n".
                            "Login / Přihlašovací jméno:       %1\$s\n".
                            "Heslo:                            %2\$s\n\n".
                            "skupina:                          %3\$s".
                            "Jméno:                            %4\$s\n".
                            "Web stránka:                      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Váš účet byl změněn administrátorem";
$email_user_change1       = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že Váš účet byl změněn ".$email_date." uživatelem %1\$s ( %2\$s ) \n\n".
                            "Login / Přihlašovací jméno:     %3\$s\n".
                            "Heslo:                          %4\$s\n\n".
                            "Skupina:                        %5\$s".
                            "Jméno:                          %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Váš účet byl změněn";
$email_user_change2       = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že jste uspěšně změnili nastavení Vašeho účtu ".$email_date.".\n\n".
                            "Login / Přihlašovací jméno:     %1\$s\n".
                            "Heslo:                          %2\$s\n\n".
                            "Jméno:                          %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Váš účet byl změněn";
$email_user_change3       = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že jste uspěšně změnili nastavení Vašeho účtu ".$email_date.".\n\n".
                            "Login / Přihlašovací jméno: %1\$s\n".
                            "Vaše heslo nebylo změněno.\n\n".
                            "Jméno:  %2\$s\n";

$title_revive             = ABBR_MANAGER_NAME.": Účet odblokován";
$email_revive             = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že váš účet byl odblokován ".$email_date.".\n\n".
                            "Login / Přihlašovací jméno: %1\$s\n".
                            "Jméno:  %2\$s\n\n".
                            "Vaše heslo Vám nemohlo být zasláno protože je zašifrováno. \n\n".
                            "Pokud jste zapomněl vaše heslo prosím napiše email na ".EMAIL_ADMIN.".";

$title_delete_user        = ABBR_MANAGER_NAME.": Účet zablokován.";
$email_delete_user        = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, že Váš účet byl zablokován ".$email_date.".\n".
                            "Děkujeme Vám za veškerou vykonanou práci!\n\n".
                            "Pokud máte připomínky, nebo si myslíte že nastala chyba, napište email na ".EMAIL_ADMIN.".";

?>
