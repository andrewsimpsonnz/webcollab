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

$title_file_post          = ABBR_MANAGER_NAME.": Nahr�n nov� soubor: %s";
$email_file_post          = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e byl p�id�n nov� soubor ".$email_date." u�ivatelem %1\$s.\n\n".
                            "Soubor:        %2\$s\n".
                            "Popis: %3\$s\n\n".
                            "Pros�m nav�tivte tuto web str�nku pro v�ce informac�.\n\n".BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nov� p��sp�vek ve f�ru: %s";
$email_forum_post         = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e byl vlo�en nov� p��sp�vek do f�ra ".$email_date." u�ivatelem %1\$s:\n\n----\n\n%2\$s\n\n----\n\n".
                            "Pros�m nav�tivte tuto web str�nku pro v�ce informac�.\n\n".BASE_URL."\n";
$email_forum_reply        = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e byl vlo�en nov� p��sp�vek do f�ra ".$email_date." u�ivatelem %1\$s.\n\n".
                            "Tento p��sp�vek je odpov�d� na d��v�j�� p��sp�vek zaslan� %2\$s.\n\n".
                            "P�vodn� p�isp�vek:\n%3\$s\n\n".
                            "----\n\n".
                            "Opdpov�d:\n%4\$s\n\n".
                            "----\n\n".
                            "Pros�m nav�tivte tuto web str�nku v�ce informac�.\n\n".BASE_URL."\n";


$email_list =  "Projekt:  %1\$s\n".
               "�kol:     %2\$s\n".
               "Stav:   %3\$s\n".
               "Vlastn�k:    %4\$s ( %5\$s )\n".
               "Text:\n%6\$s\n\n".
               "Pros�m nav�tivte tuto web str�nku v�ce informac�.\n\n".BASE_URL."\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": V� projekt byl p�evz�n";
$title_takeover_task      = ABBR_MANAGER_NAME.": V� �kol byl p�evz�n";

$email_takeover_task      = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e �kol, kter� jste vlastnil, byl p�evzat administr�torem ".$email_date.".\n\n";
$email_takeover_project   = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e projekt, kter� jste vlastnil, byl p�evzat administr�torem ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Projekt pro V�s";
$title_new_owner_task     = ABBR_MANAGER_NAME.": �kol pro V�s";

$email_new_owner_project  = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e projekt kter� byl vytvo�en ".$email_date.", je nyn� pod Va�� spr�vou (jste vlastn�kem projektu).\n\nZde podrobnosti:\n\n";
$email_new_owner_task     = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e �kol kter� byl vytvo�en ".$email_date.", je nyn� pod Va�� spr�vou (jste vlastn�kem �kolu).\n\nZde jsou podrobnosti:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nov� projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nov� �kol: %s";

$email_new_group_project  = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e byl vytvo�en nov� projekt ".$email_date."\n\nZde podrobnosti:\n\n";
$email_new_group_task     = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e byl vytvo�en nov� �kol ".$email_date."\n\nZde podrobnosti:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": V� projekt byl aktualizov�n";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": V� �kol byl aktualizov�n";

$email_edit_owner_project = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e a projekt kter� vlastn�te byl zm�n�n ".$email_date.".\n\nZde jsou podrobnosti:\n\n";
$email_edit_owner_task    = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e a �kol kter� vlastn�te byl zm�n�n ".$email_date.".\n\nZde jsou podrobnosti:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Aktualizovan� projekt";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Aktualizovan� �kol";

$email_edit_group_project = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e projekt kter� vlastn�te %s byl zm�n�n ".$email_date.".\n\nZde jsou podrobnosti:\n\n";
$email_edit_group_task    = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e �kol kter� vlastn�te %s byl zm�n�n ".$email_date.".\n\nZde jsou podrobnosti:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Projekt smaz�n";
$title_delete_task        = ABBR_MANAGER_NAME.": �kol smaz�n";

$email_delete_project     = "Dobr� den,\n\n".
                            "".MANAGER_NAME." V�s informuje, �e projekt kter�ho jste byl vlastn�kem byl smaz�n ".$email_date."\n\n".
                            "D�kujeme za ��zen� projektu po�as jeho trv�n�.\n\n";
$email_delete_task        = "Dobr� den,\n\n".
                            "".MANAGER_NAME." V�s informuje, �e �kol kter�ho jste byl vlastn�kem byl smaz�n ".$email_date."\n\n".
                            "D�kujeme za ��zen� �kolu po�as jeho trv�n�.\n\n";

$delete_list = "Projektt: %1\$s\n".
                "�kol:   %2\$s\n".
                "Stav: %3\$s\n\n".
                "Text:\n%4\$s\n\n";

$title_welcome            = "V�tejte v ".ABBR_MANAGER_NAME;
$email_welcome            = "Dobr� den,\n\n ".MANAGER_NAME." V�s v�t� v n�stroji pro spr�vu projekt� ".$email_date.".\n\n".
                            //"As you are new here I will explain a couple of things to you so that you can quickly start to work\n\n".
                            "Na za��tek, n�kolik m�lo tip�, kter� v�m umo�n� za��t rychle pracovat s programem\n\n".
                            //"First of all this is a project management tool, the main screen will show you the projects that are currently available. ".
                            "Hlavn� str�nka V�m zobraz� projekty, kter� jsou V�m dostupn� ".
                            //"If you click on one of the names you will find yourself in the task's part. This is where all the work will go on.\n\n".
                            "Pokud kliknete na jeden z projekt�, octnete se v ��sti �kol� dan�ho projektju. Nyn� m��ete za��t pracovat :-).\n\n".
                            //Every item you post or task you edit will be shown to other users as 'new' or 'updated'. This also works vice-versa and ".
                            //"it enables you to quickly spot where the activity is
                            "Ka�d� zpr�va nebo �loha, kterou zm�n�te bebo vytvo��te, bude zobrazen� ostatn�m u�ivatel�m jako aktualizavn� nebo nov�. 
                            Samoz�ejm� toto pracuje jako vice-versa a umo��uje rychle si v�imnout aktivitu\n\n".
                            //"You can also take or get ownership of tasks and you will find yourself able to edit them and all the forum posts belonging to it. ".
                            "M��ete tak� p�evz�t vlastn�ctv� �lohy, c�m� z�sk�te pr�vo ji spravovat, v�etn� f�ra pat��c�ho k n�. ".
                            //"As you progress with your work please edit your task's text and status so that everybody can keep a track on your progress. ".
                            "Jak budete pokra�ovat se svoj� prac�, pros�m editujete text �lohy a stav tak, aby ka�d� mohl m�t pov�dom� o Va�em postupu. ".
                            "\n\nNyn� m� nezb�v� n� V�m pop��t mnoho �sp�ch�. V p��pad�, �e si nebude v�d�t rady po�lete email na ".EMAIL_ADMIN.".\n\n --Hodn� �test� !\n\n".
                            "Login / P�ihla�ovac� jm�no:       %1\$s\n".
                            "Heslo:                            %2\$s\n\n".
                            "skupina:                          %3\$s".
                            "Jm�no:                            %4\$s\n".
                            "Web str�nka:                      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": V� u�et byl zm�n�n administr�torem";
$email_user_change1       = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e V� ��et byl zm�n�n ".$email_date." u�ivatelem %1\$s ( %2\$s ) \n\n".
                            "Login / P�ihla�ovac� jm�no:     %3\$s\n".
                            "Heslo:                          %4\$s\n\n".
                            "Skupina:                        %5\$s".
                            "Jm�no:                          %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": V� u�et byl zm�n�n";
$email_user_change2       = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e jste usp�n� zm�nili nastaven� V�ho ��tu ".$email_date.".\n\n".
                            "Login / P�ihla�ovac� jm�no:     %1\$s\n".
                            "Heslo:                          %2\$s\n\n".
                            "Jm�no:                          %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": V� u�et byl zm�n�n";
$email_user_change3       = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e jste usp�n� zm�nili nastaven� V�ho ��tu ".$email_date.".\n\n".
                            "Login / P�ihla�ovac� jm�no: %1\$s\n".
                            "Va�e heslo nebylo zm�n�no.\n\n".
                            "Jm�no:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": ��et odblokov�n";
$email_revive             = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e v� ��et byl odblokov�n ".$email_date.".\n\n".
                            "Login / P�ihla�ovac� jm�no: %1\$s\n".
                            "Jm�no:  %2\$s\n\n".
                            "Va�e heslo V�m nemohlo b�t zasl�no proto�e je zakriptov�no. \n\n".
                            "Pokud jste zapom�l va�e heslo pros�m napi�e email na ".EMAIL_ADMIN.".";



$title_delete_user        = ABBR_MANAGER_NAME.": ��et zablokov�n.";
$email_delete_user        = "Dobr� den,\n\n".MANAGER_NAME." V�s informuje, �e v� ��et byl zablokov�n ".$email_date.".\n".
                            "D�kujeme V�m za ve�kerou vykonanou pr�ci!\n\n".
                            "Pokud m�te n�mitku, nebo si mysl�te �e nastala chyba, napi�te email na ".EMAIL_ADMIN.".";

?>
