<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License; or (at your option) any later version.

  This program is distributed in the hope that it will be useful; but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not; write to the Free Software Foundation; Inc.; 675 Mass Ave;
  Cambridge; MA 02139; USA.


  Function:
  ---------

  Language files for 'tr' (Turkish)

  Translation: Aydin Gurel <aydin.gurel at gmail.com>

*/

// Get current date/time for emails in a preferred format eg: 1 Nis 2004, 21:18
$email_date = date("j" )." ".$month_array[(date("n" ) )]." ".date('Y, H:i' );

$title_file_post          = ABBR_MANAGER_NAME.": Yeni y�klenen dosya: %s";
$email_file_post          = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s taraf�ndan yeni bir dosyan�n y�klendi�ini haber veriyor.\n\n".
                            "Dosya:        %2\$s\n".
                            "Tan�m�: %3\$s\n\n".
                            "Proje:        %4\$s\n".
                            "G�rev:        %5\$s\n\n".
                            "Daha detayl� bilgi i�in l�tfen web sitesine gidin.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Yeni forum mesaj�: %s";
$email_forum_post         = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s taraf�ndan yeni bir forum mesaj� g�nderildi�ini haber veriyor:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Daha detayl� bilgi i�in l�tfen web sitesine gidin.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s taraf�ndan yeni bir forum mesaj� g�nderildi�ini haber veriyor.\n\n".
                            "Bu mesaj %2\$s taraf�ndan daha �nce g�nderilen bir mesaja yan�t niteli�inde.\n\n".
                            "Orijinal mesaj:\n%3\$s\n\n".
                            "----\n\n".
                            "Yeni yan�t:\n%4\$s\n\n".
                            "----\n\n".
                            "Daha detayl� bilgi i�in l�tfen web sitesine gidin.\n\n".BASE_URL."%5\$s\n";

$email_list =  "Proje:  %1\$s\n".
               "G�rev:     %2\$s\n".
               "Durum:   %3\$s\n".
               "Sahibi:    %4\$s ( %5\$s )\n".
               "Yaz�:\n%6\$s\n\n".
               "Daha detayl� bilgi i�in l�tfen web sitesine gidin.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Projeniz sizden al�nd�";
$title_takeover_task      = ABBR_MANAGER_NAME.": G�reviniz sizden al�nd�";

$email_takeover_task      = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size ait olan bir g�revin bir y�netici taraf�ndan sizden al�nd���n� haber veriyor.\n\n";
$email_takeover_project   = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size ait olan bir projenin bir y�netici taraf�ndan sizden al�nd���n� haber veriyor.\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Size yeni bir proje";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Size yeni bir g�rev";

$email_new_owner_project  = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde bir projenin yarat�ld���n� ve sizin bu projenin sahibi oldu�unuzu haber veriyor.\n\n��te detaylar:\n\n";
$email_new_owner_task     = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde bir g�revin yarat�ld���n� ve sizin bu g�revin sahibi oldu�unuzu haber veriyor.\n\n��te detaylar:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Yeni proje: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Yeni g�rev: %s";

$email_new_group_project  = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde yeni bir projenin yarat�ld���n� haber veriyor.\n\n��te detaylar:\n\n";
$email_new_group_task     = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde yeni bir g�revin yarat�ld���n� haber veriyor.\n\n��te detaylar:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Projeniz g�ncellendi";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": G�reviniz g�ncellendi";

$email_edit_owner_project = "Merhaba,\n\n".MANAGER_NAME." sitesi size ait olan bir projenin ".$email_date." tarihinde de�i�tirildi�ini haber veriyor.\n\n��te detaylar:\n\n";
$email_edit_owner_task    = "Merhaba,\n\n".MANAGER_NAME." sitesi size ait olan bir g�revin ".$email_date." tarihinde de�i�tirildi�ini haber veriyor.\n\n��te detaylar:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Proje g�ncellendi";
$title_edit_group_task    = ABBR_MANAGER_NAME.": G�rev g�ncellendi";

$email_edit_group_project = "Merhaba,\n\n".MANAGER_NAME." sitesi size sahibi %s olan bir projenin ".$email_date." tarihinde de�i�tirildi�ini haber veriyor.\n\n��te detaylar:\n\n";
$email_edit_group_task    = "Merhaba,\n\n".MANAGER_NAME." sitesi size sahibi %s olan bir g�revin ".$email_date." tarihinde de�i�tirildi�ini haber veriyor.\n\n��te detaylar:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Proje silindi";
$title_delete_task        = ABBR_MANAGER_NAME.": G�rev silindi";

$email_delete_project     = "Merhaba,\n\n".
                            MANAGER_NAME." sitesi size ait olan bir projenin ".$email_date." tarihinde silindi�ini haber veriyor.\n\n".
                            "S�resi boyunca projeyi y�netti�iniz i�in te�ekk�rler.\n\n";
$email_delete_task        = "Merhaba,\n\n".
                            MANAGER_NAME." sitesi size ait olan bir g�revin ".$email_date." tarihinde silindi�ini haber veriyor.\n\n".
                            "S�resi boyunca g�revi y�netti�iniz i�in te�ekk�rler.\n\n";

$delete_list = "Proje: %1\$s\n".
                "G�rev:   %2\$s\n".
                "Durum: %3\$s\n\n".
                "Yaz�:\n%4\$s\n\n";

$title_welcome            = "Ho�geldiniz: ".ABBR_MANAGER_NAME;
$email_welcome            = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size benim ad�ma ho�geldiniz der ;)\n\n".
                            "Burada yenisiniz ve hemen �al��maya ba�layabilmeniz i�in size bir ka� �ey a��klayaca��m\n\n".
                            "Her�eyden �nce bu bir proje y�netim arac�d�r, ana sayfa size �u anda ula��labilir olan projeleri g�sterecektir. ".
                            "�simlerden birine t�klarsan�z kendinizi g�rev taraf�nda bulursunuz. Bu b�t�n i�in y�r�d��� yerdir.\n\n".
                            "G�nderdi�iniz her �ge ve de�i�tirdi�iniz her g�rev di�er kullan�c�lara 'yeni' ya da 'g�ncellenmi�' olarak g�sterilecektir. Tam tersi de ge�erlidir ve ".
                            "bu size etkinli�in nerede oldu�unu hemen bulman�z� sa�lar.\n\n".
                            "G�revleri �zerinize alabilirsiniz ya da g�revler size verilebilir; onlar� ve onlara ait forum mesajlar�n� de�i�tirebilirsiniz. ".
                            "G�revinizde ilerledik�e herkesin bunu izleyebilmesi i�in l�tfen g�revinizin yaz�s�n� ve durumunu g�ncelleyin. ".
                            "\n\nSize ba�ar�lar dilerim ve s�k��t���n�z zaman ".EMAIL_ADMIN." adresine eposta atabilirsiniz.\n\n --�yi �anslar !\n\n".
                            "Kullan�c� ad�:      %1\$s\n".
                            "�ifre:   %2\$s\n\n".
                            "Kullan�c� gruplar�: %3\$s".
                            "Ad:       %4\$s\n".
                            "Web sitesi:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Hesab�n�z�n bir y�netici taraf�ndan de�i�tirilmesi";
$email_user_change1       = "Merhaba,\n\n".MANAGER_NAME." sitesi size hesab�n�z�n ".$email_date." tarihinde %1\$s taraf�ndan de�i�tirildi�ini haber veriyor. ( %2\$s ) \n\n".
                            "Kullan�c� ad�:      %3\$s\n".
                            "�ifre:   %4\$s\n\n".
                            "Kullan�c� gruplar�: %5\$s".
                            "Ad:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Hesab�n�z�n de�i�tirilmesi";
$email_user_change2       = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesab�n�z� ba�ar�yla de�i�tirdi�inizi teyid eder.\n\n".
                            "Kullan�c� ad�:    %1\$s\n".
                            "�ifre: %2\$s\n\n".
                            "Ad:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Hesab�n�z�n de�i�tirilmesi";
$email_user_change3       = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesab�n�z� ba�ar�yla de�i�tirdi�inizi teyid eder.\n\n".
                            "Kullan�c� ad�: %1\$s\n".
                            "Mevcut �ifreniz de�i�medi.\n\n".
                            "Ad:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Hesap tekrar etkinle�tirildi";
$email_revive             = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesab�n�z�n yeniden etkinle�tirildi�ini haber veriyor.\n\n".
                            "Kullan�c� ad�: %1\$s\n".
                            "Ad:  %2\$s\n\n".
                            "Size �ifrenizi g�nderemeyiz ��nk� o da �ifrelenerek kaydedilmi� durumda.\n\n".
                            "�ifrenizi unuttuysan�z yeni bir �ifre i�in ".EMAIL_ADMIN." adresine mesaj at�n.";



$title_delete_user        = ABBR_MANAGER_NAME.": Hesap durduruldu.";
$email_delete_user        = "Merhaba,\n\n".MANAGER_NAME." sitesi size hesab�n�z�n ".$email_date." tarihinde durduruldu�unu haber veriyor.\n".
                            "Ayr�ld���n�z i�in �zg�n�z ve �al��malar�n�z i�in size te�ekk�r etmek isteriz!\n\n".
                            "E�er hesab�n�z�n durdurulmas�na itiraz etmek isterseniz ya da bunun bir hata oldu�unu d���n�yorsan�z l�tfen ".EMAIL_ADMIN." adresine mesaj at�n.";

?>