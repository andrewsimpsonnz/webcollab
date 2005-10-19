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

  Translation: Lukas Moravek <moravekl at gmail.com>
  
*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Nahrán nový soubor: %s";
$email_file_post          = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e byl pøidán nový soubor ".$email_date." u¾ivatelem %1\$s.\n\n".
                            "Soubor:        %2\$s\n".
                            "Popis: %3\$s\n\n".
                            "Prosím nav¹tivte tuto web stránku pro více informací.\n\n".BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nový pøíspìvek ve fóru: %s";
$email_forum_post         = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e byl vlo¾en nový pøíspìvek do fóra ".$email_date." u¾ivatelem %1\$s:\n\n----\n\n%2\$s\n\n----\n\n".
                            "Prosím nav¹tivte tuto web stránku pro více informací.\n\n".BASE_URL."\n";
$email_forum_reply        = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e byl vlo¾en nový pøíspìvek do fóra ".$email_date." u¾ivatelem %1\$s.\n\n".
                            "Tento pøíspìvek je odpovìdí na døívìj¹í pøíspìvek zaslaný %2\$s.\n\n".
                            "Pùvodní pøispìvek:\n%3\$s\n\n".
                            "----\n\n".
                            "Opdpovìd:\n%4\$s\n\n".
                            "----\n\n".
                            "Prosím nav¹tivte tuto web stránku více informací.\n\n".BASE_URL."\n";


$email_list =  "Projekt:  %1\$s\n".
               "Úkol:     %2\$s\n".
               "Stav:   %3\$s\n".
               "Vlastník:    %4\$s ( %5\$s )\n".
               "Text:\n%6\$s\n\n".
               "Prosím nav¹tivte tuto web stránku více informací.\n\n".BASE_URL."\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Vá¹ projekt byl pøevzán";
$title_takeover_task      = ABBR_MANAGER_NAME.": Vá¹ úkol byl pøevzán";

$email_takeover_task      = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e úkol, který jste vlastnil, byl pøevzat administrátorem ".$email_date.".\n\n";
$email_takeover_project   = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e projekt, který jste vlastnil, byl pøevzat administrátorem ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Projekt pro Vás";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Úkol pro Vás";

$email_new_owner_project  = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e projekt který byl vytvoøen ".$email_date.", je nyní pod Va¹í správou (jste vlastníkem projektu).\n\nZde podrobnosti:\n\n";
$email_new_owner_task     = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e úkol který byl vytvoøen ".$email_date.", je nyní pod Va¹í správou (jste vlastníkem úkolu).\n\nZde jsou podrobnosti:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nový projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nový úkol: %s";

$email_new_group_project  = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e byl vytvoøen nový projekt ".$email_date."\n\nZde podrobnosti:\n\n";
$email_new_group_task     = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e byl vytvoøen nový úkol ".$email_date."\n\nZde podrobnosti:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Vá¹ projekt byl aktualizován";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Vá¹ úkol byl aktualizován";

$email_edit_owner_project = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e a projekt který vlastníte byl zmìnìn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";
$email_edit_owner_task    = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e a úkol který vlastníte byl zmìnìn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Aktualizovaný projekt";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Aktualizovaný úkol";

$email_edit_group_project = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e projekt který vlastníte %s byl zmìnìn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";
$email_edit_group_task    = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e úkol který vlastníte %s byl zmìnìn ".$email_date.".\n\nZde jsou podrobnosti:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Projekt smazán";
$title_delete_task        = ABBR_MANAGER_NAME.": Úkol smazán";

$email_delete_project     = "Dobrý den,\n\n".
                            "".MANAGER_NAME." Vás informuje, ¾e projekt kterého jste byl vlastníkem byl smazán ".$email_date."\n\n".
                            "Dìkujeme za øízení projektu poèas jeho trvání.\n\n";
$email_delete_task        = "Dobrý den,\n\n".
                            "".MANAGER_NAME." Vás informuje, ¾e úkol kterého jste byl vlastníkem byl smazán ".$email_date."\n\n".
                            "Dìkujeme za øízení úkolu poèas jeho trvání.\n\n";

$delete_list = "Projektt: %1\$s\n".
                "Úkol:   %2\$s\n".
                "Stav: %3\$s\n\n".
                "Text:\n%4\$s\n\n";

$title_welcome            = "Vítejte v ".ABBR_MANAGER_NAME;
$email_welcome            = "Dobrý den,\n\n ".MANAGER_NAME." Vás vítá v nástroji pro správu projektù ".$email_date.".\n\n".
                            //"As you are new here I will explain a couple of things to you so that you can quickly start to work\n\n".
                            "Na zaèátek, nìkolik málo tipù, které vám umo¾ní zaèít rychle pracovat s programem\n\n".
                            //"First of all this is a project management tool, the main screen will show you the projects that are currently available. ".
                            "Hlavní stránka Vám zobrazí projekty, které jsou Vám dostupné ".
                            //"If you click on one of the names you will find yourself in the task's part. This is where all the work will go on.\n\n".
                            "Pokud kliknete na jeden z projektù, octnete se v èásti úkolù daného projektju. Nyní mù¾ete zaèít pracovat :-).\n\n".
                            //Every item you post or task you edit will be shown to other users as 'new' or 'updated'. This also works vice-versa and ".
                            //"it enables you to quickly spot where the activity is
                            "Ka¾dá zpráva nebo úloha, kterou zmìníte bebo vytvoøíte, bude zobrazená ostatním u¾ivatelùm jako aktualizavná nebo nová. 
                            Samozøejmì toto pracuje jako vice-versa a umo¾òuje rychle si v¹imnout aktivitu\n\n".
                            //"You can also take or get ownership of tasks and you will find yourself able to edit them and all the forum posts belonging to it. ".
                            "Mù¾ete také pøevzít vlastníctvý úlohy, cím¾ získáte právo ji spravovat, vèetnì fóra patøícího k ní. ".
                            //"As you progress with your work please edit your task's text and status so that everybody can keep a track on your progress. ".
                            "Jak budete pokraèovat se svojí prací, prosím editujete text úlohy a stav tak, aby ka¾dý mohl mít povìdomí o Va¹em postupu. ".
                            "\n\nNyní mì nezbývá nì¾ Vám popøát mnoho úspìchù. V pøípadì, ¾e si nebude vìdìt rady po¹lete email na ".EMAIL_ADMIN.".\n\n --Hodnì ¹testí !\n\n".
                            "Login / Pøihla¹ovací jméno:       %1\$s\n".
                            "Heslo:                            %2\$s\n\n".
                            "skupina:                          %3\$s".
                            "Jméno:                            %4\$s\n".
                            "Web stránka:                      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Vá¹ uèet byl zmìnìn administrátorem";
$email_user_change1       = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e Vá¹ úèet byl zmìnìn ".$email_date." u¾ivatelem %1\$s ( %2\$s ) \n\n".
                            "Login / Pøihla¹ovací jméno:     %3\$s\n".
                            "Heslo:                          %4\$s\n\n".
                            "Skupina:                        %5\$s".
                            "Jméno:                          %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Vá¹ uèet byl zmìnìn";
$email_user_change2       = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e jste uspì¹nì zmìnili nastavené Vá¹ho úètu ".$email_date.".\n\n".
                            "Login / Pøihla¹ovací jméno:     %1\$s\n".
                            "Heslo:                          %2\$s\n\n".
                            "Jméno:                          %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Vá¹ uèet byl zmìnìn";
$email_user_change3       = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e jste uspì¹nì zmìnili nastavené Vá¹ho úètu ".$email_date.".\n\n".
                            "Login / Pøihla¹ovací jméno: %1\$s\n".
                            "Va¹e heslo nebylo zmìnìno.\n\n".
                            "Jméno:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Úèet odblokován";
$email_revive             = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e vá¹ úèet byl odblokován ".$email_date.".\n\n".
                            "Login / Pøihla¹ovací jméno: %1\$s\n".
                            "Jméno:  %2\$s\n\n".
                            "Va¹e heslo Vám nemohlo být zasláno proto¾e je zakriptováno. \n\n".
                            "Pokud jste zapomìl va¹e heslo prosím napi¹e email na ".EMAIL_ADMIN.".";



$title_delete_user        = ABBR_MANAGER_NAME.": Úèet zablokován.";
$email_delete_user        = "Dobrý den,\n\n".MANAGER_NAME." Vás informuje, ¾e vá¹ úèet byl zablokován ".$email_date.".\n".
                            "Dìkujeme Vám za ve¹kerou vykonanou práci!\n\n".
                            "Pokud máte námitku, nebo si myslíte ¾e nastala chyba, napi¹te email na ".EMAIL_ADMIN.".";

?>
