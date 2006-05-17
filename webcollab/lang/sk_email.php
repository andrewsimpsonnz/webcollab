<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2005 Stanislav Pekar��k, fredis@SoftHome.net

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

  Email text language files for 'sk' (Slovensk�)


  Maintainer: 

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Nov� s�bor nahrat�: %s";
$email_file_post          = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka ktor� V�s informuje �e bol nahrat� nov� s�bor d�a ".$email_date." od %1\$s.\n\n".
                            "S�bor:        %2\$s\n".
                            "Obsah: %3\$s\n\n".
                            "Pros�m nav�t�vte webstr�nku pre �al�ie inform�cie.\n\n".BASE_URL."%4\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nov� po�ta na f�re: %s";
$email_forum_post         = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka ktor� V�s informuje, �e m�te na f�re nov� spr�vu zo d�a ".$email_date." od %1\$s:\n\n".
                            "%2\$s\n\n".
                            "Pros�m nav�t�vte webstr�nku pre viac detailov.\n\n".
                            BASE_URL."%3\$s\n";

$email_forum_reply        = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e m�te
na f�re nov� spr�vu zo d�a ".$email_date." od %1\$s.\n\n".
                            "T�to spr�va je odpove� na skor�iu spr�vu od %2\$s.\n\n".
                            "Orgin�lna spr�va:\n%3\$s\n\n".
                            "Nov� odpove�:\n%4\$s\n\n".
                            "Pros�m nav�t�vte webstr�nku pre viac detailov.\n\n".
                            BASE_URL."%5\$s\n";

$email_list               = "Projekt:  %1\$s\n".
                            "�loha:     %2\$s\n".
                            "Stav:   %3\$s\n".
                            "Vlastn�k:    %4\$s ( %5\$s )\n".
                            "Text:\n%6\$s\n\n".
                            "Pros�m nav�t�vte webstr�nku pre viac detailov.\n\n".
                            BASE_URL."%7\$s\n";

$title_takeover_project   = ABBR_MANAGER_NAME.": V� projekt bol prevzat�";
$title_takeover_task      = ABBR_MANAGER_NAME.": Va�a �loha bola prevzat�";

$email_takeover_task      = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e �loha, ktor� vlastn�te
bola prevzat� administr�torom, zo d�a ".$email_date.".\n\n";
$email_takeover_project   = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e projekt, ktor� vlastn�te, bol prevzat� administr�torom, zo d�a ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nov� projekt pre V�s";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nov� �loha pre V�s";

$email_new_owner_project  = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e je vytvoren� nov� projekt  d�a ".$email_date.", a Vy ste jeho vlastn�k.\n\n".
                            "Tu s� detaily:\n\n";

$email_new_owner_task     = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e je vytvoren� nov� �loha d�a ".$email_date.", a Vy ste jej vlastn�k.\n\n".
                            "Tu s� detaily:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nov� projekt: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nov� �loha: %s";

$email_new_group_project  = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e je vytvoren� nov� projekt d�a ".$email_date."\n\n".
                            "Tu s� detaily:\n\n";

$email_new_group_task     = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e je vytvoren� nov� �loha d�a ".$email_date."\n\n".
                            "Tu s� detaily:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": V� projekt bol zmenen�";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Va�a �loha bola zmenen�";

$email_edit_owner_project = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e projekt, ktor� vlastn�te bol zmenen�, zo d�a ".$email_date.".\n\n".
                            "Tu s� detaily:\n\n";

$email_edit_owner_task    = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e �loha, 
ktor� vlastn�te bola zmenen�, zo d�a ".$email_date.".\n\n".
                            "Tu s� detaily:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Projekt zmenen�";
$title_edit_group_task    = ABBR_MANAGER_NAME.": �loha zmenen�";

$email_edit_group_project = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e projekt, ktor� vlastn� %s bol zmenen�, zo d�a ".$email_date.".\n\n".
                            "Tu s� detaily:\n\n";

$email_edit_group_task    = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e �loha,  ktor� vlastn� %s bola zmenen�, zo d�a ".$email_date.".\n\n".
                            "Tu s� detaily:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projekt zru�en�";
$title_delete_task        = ABBR_MANAGER_NAME.": �loha zru�en�";

$email_delete_project     = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e projekt, ktor�ho ste vlastn�k bol zru�en�, zo d�a  ".$email_date."\n\n".
                            "�akujeme za spr�vu projektu , k�m trval.\n\n";

$email_delete_task        = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e �loha, ktorej ste vlastn�k bola zru�ena, zo d�a ".$email_date."\n\n".
                            "�akujeme za spr�vu �lohy, k�m trvala.\n\n";

$delete_list              = "Projekt: %1\$s\n".
                            "�loha:   %2\$s\n".
                            "Stav: %3\$s\n\n".
                            "Text:\n%4\$s\n\n";

$title_welcome            = "V�tame V�s".ABBR_MANAGER_NAME;
$email_welcome            = "Hal�,\n\nTo je ".MANAGER_NAME." Va�a uv�tacia str�nka ;), zo d�a ".$email_date.".\n\n".
                            "Ak ste tu nov� u��vate�, vysvetl� V�m p�r vec�, aby ste mohli r�chlo za�a�\n\n".
                            "Ako prv� tu je n�stroj na riadenie projektu, hlavn� str�nka V�m uk�e pr�ve dostupn� projekty. ".
                            "Ak kliknete na jeden z nich budete vidie� �lohy priraden� k projektu. Tu m��te za�a� pracova�.\n\n".
                            "Ka�d� spr�va alebo �loha, ktor� editujete bude zobrazen� ostatn�m u��vate�om ako 'nov�' alebo 'zmenen�'. To funguje aj opa�ne a ".
                            "umo�nuje V�m r�chlo n�js� nov� aktivity .\n\n".
                            "M��te tie� prevza� alebo da� vlastn�ctvo �loh a budete ich m�c� editova� aj
							v�etky spr�vy na f�re pripadaj�ce k nej. ".
                            "Ako budete postupova� v pr�ci editujte text a stav �loh tak, �e ka�d� m��e sledova� V� postup. ".
                            "\n\nM��em V�m len teraz za�ela� �spech. Ak si nebudete vedie� rady, po�lite mail na".EMAIL_ADMIN." \n\n --Ve�a ��astia!\n\n".
                            "Login:      %1\$s\n".
                            "Heslo:   %2\$s\n\n".
                            "U��vate�sk� skupina: %3\$s".
                            "Meno:       %4\$s\n".
                            "Webstr�nka:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Editova� V� ��et administr�torom";
$email_user_change1       = "Hal�,\n\n".
                            "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e V�
 ��et bol zmenen�, zo d�a ".$email_date." od %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Heslo:   %4\$s\n\n".
                            "U��vate�sk� skupina: %5\$s".
                            "U�ivate�sk� meno:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2         = ABBR_MANAGER_NAME.": Editova� V� ��et";
$email_user_change2         = "Hal�,\n\n".
                              "To je ".MANAGER_NAME." str�nka, ktor� potvrdzuje, �e V� ��et bol �spe�ne zmenen�, zo d�a ".$email_date.".\n\n".
                              "Login:    %1\$s\n".
                              "Heslo: %2\$s\n\n".
                              "U�ivate�sk� meno:     %3\$s\n";

$title_user_change3         = ABBR_MANAGER_NAME.": Editova� V� ��et";
$email_user_change3         = "Hal�,\n\n".
                              "To je ".MANAGER_NAME." str�nka, ktor� potvrdzuje, �e V� ��et bol �spe�ne zmenen�, zo d�a ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "Va�e heslo nebolo zmenen�.\n\n".
                              "U�ivate�sk� meno:  %2\$s\n";

$title_revive               = ABBR_MANAGER_NAME.": ��et reaktivovan�";
$email_revive               = "Hal�,\n\n".
                              "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje, �e V� ��et bol znovu aktivovan�, zo d�a ".$email_date.".\n\n".
                              "Login: %1\$s\n".
                              "U�ivate�sk� meno:  %2\$s\n\n".
                              "Nem��eme V�m posla� Va�e heslo, lebo je kryptovan�. \n\n".
                              "Ak ste zabudli heslo, po�lite email na".EMAIL_ADMIN." pre nov� heslo.";

$title_delete_user          = ABBR_MANAGER_NAME.": ��et deaktivovan�.";
$email_delete_user          = "Hal�,\n\n".
                              "To je ".MANAGER_NAME." str�nka, ktor� V�s informuje ,�e V� ��et bol deaktivovan�, zo d�a ".$email_date.".\n\n".
                              "Je n�m ��to, �e n�s op���ate, a �akujeme V�m za Va�u pr�cu!\n\n".
                              "Ak nechcete deaktiv�ciu, alebo mysl�te, �e je to vplyvom chyby, po�lite email na ".EMAIL_ADMIN.".";

?>
