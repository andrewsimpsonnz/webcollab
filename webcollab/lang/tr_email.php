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

$title_file_post          = ABBR_MANAGER_NAME.": Yeni yüklenen dosya: %s";
$email_file_post          = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s tarafýndan yeni bir dosyanýn yüklendiðini haber veriyor.\n\n".
                            "Dosya:        %2\$s\n".
                            "Tanýmý: %3\$s\n\n".
                            "Proje:        %4\$s\n".
                            "Görev:        %5\$s\n\n".
                            "Daha detaylý bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Yeni forum mesajý: %s";
$email_forum_post         = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s tarafýndan yeni bir forum mesajý gönderildiðini haber veriyor:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Daha detaylý bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s tarafýndan yeni bir forum mesajý gönderildiðini haber veriyor.\n\n".
                            "Bu mesaj %2\$s tarafýndan daha önce gönderilen bir mesaja yanýt niteliðinde.\n\n".
                            "Orijinal mesaj:\n%3\$s\n\n".
                            "----\n\n".
                            "Yeni yanýt:\n%4\$s\n\n".
                            "----\n\n".
                            "Daha detaylý bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%5\$s\n";

$email_list =  "Proje:  %1\$s\n".
               "Görev:     %2\$s\n".
               "Durum:   %3\$s\n".
               "Sahibi:    %4\$s ( %5\$s )\n".
               "Yazý:\n%6\$s\n\n".
               "Daha detaylý bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Projeniz sizden alýndý";
$title_takeover_task      = ABBR_MANAGER_NAME.": Göreviniz sizden alýndý";

$email_takeover_task      = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size ait olan bir görevin bir yönetici tarafýndan sizden alýndýðýný haber veriyor.\n\n";
$email_takeover_project   = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size ait olan bir projenin bir yönetici tarafýndan sizden alýndýðýný haber veriyor.\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Size yeni bir proje";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Size yeni bir görev";

$email_new_owner_project  = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde bir projenin yaratýldýðýný ve sizin bu projenin sahibi olduðunuzu haber veriyor.\n\nÝþte detaylar:\n\n";
$email_new_owner_task     = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde bir görevin yaratýldýðýný ve sizin bu görevin sahibi olduðunuzu haber veriyor.\n\nÝþte detaylar:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Yeni proje: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Yeni görev: %s";

$email_new_group_project  = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde yeni bir projenin yaratýldýðýný haber veriyor.\n\nÝþte detaylar:\n\n";
$email_new_group_task     = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde yeni bir görevin yaratýldýðýný haber veriyor.\n\nÝþte detaylar:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Projeniz güncellendi";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Göreviniz güncellendi";

$email_edit_owner_project = "Merhaba,\n\n".MANAGER_NAME." sitesi size ait olan bir projenin ".$email_date." tarihinde deðiþtirildiðini haber veriyor.\n\nÝþte detaylar:\n\n";
$email_edit_owner_task    = "Merhaba,\n\n".MANAGER_NAME." sitesi size ait olan bir görevin ".$email_date." tarihinde deðiþtirildiðini haber veriyor.\n\nÝþte detaylar:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Proje güncellendi";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Görev güncellendi";

$email_edit_group_project = "Merhaba,\n\n".MANAGER_NAME." sitesi size sahibi %s olan bir projenin ".$email_date." tarihinde deðiþtirildiðini haber veriyor.\n\nÝþte detaylar:\n\n";
$email_edit_group_task    = "Merhaba,\n\n".MANAGER_NAME." sitesi size sahibi %s olan bir görevin ".$email_date." tarihinde deðiþtirildiðini haber veriyor.\n\nÝþte detaylar:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Proje silindi";
$title_delete_task        = ABBR_MANAGER_NAME.": Görev silindi";

$email_delete_project     = "Merhaba,\n\n".
                            MANAGER_NAME." sitesi size ait olan bir projenin ".$email_date." tarihinde silindiðini haber veriyor.\n\n".
                            "Süresi boyunca projeyi yönettiðiniz için teþekkürler.\n\n";
$email_delete_task        = "Merhaba,\n\n".
                            MANAGER_NAME." sitesi size ait olan bir görevin ".$email_date." tarihinde silindiðini haber veriyor.\n\n".
                            "Süresi boyunca görevi yönettiðiniz için teþekkürler.\n\n";

$delete_list = "Proje: %1\$s\n".
                "Görev:   %2\$s\n".
                "Durum: %3\$s\n\n".
                "Yazý:\n%4\$s\n\n";

$title_welcome            = "Hoþgeldiniz: ".ABBR_MANAGER_NAME;
$email_welcome            = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size benim adýma hoþgeldiniz der ;)\n\n".
                            "Burada yenisiniz ve hemen çalýþmaya baþlayabilmeniz için size bir kaç þey açýklayacaðým\n\n".
                            "Herþeyden önce bu bir proje yönetim aracýdýr, ana sayfa size þu anda ulaþýlabilir olan projeleri gösterecektir. ".
                            "Ýsimlerden birine týklarsanýz kendinizi görev tarafýnda bulursunuz. Bu bütün iþin yürüdüðü yerdir.\n\n".
                            "Gönderdiðiniz her öge ve deðiþtirdiðiniz her görev diðer kullanýcýlara 'yeni' ya da 'güncellenmiþ' olarak gösterilecektir. Tam tersi de geçerlidir ve ".
                            "bu size etkinliðin nerede olduðunu hemen bulmanýzý saðlar.\n\n".
                            "Görevleri üzerinize alabilirsiniz ya da görevler size verilebilir; onlarý ve onlara ait forum mesajlarýný deðiþtirebilirsiniz. ".
                            "Görevinizde ilerledikçe herkesin bunu izleyebilmesi için lütfen görevinizin yazýsýný ve durumunu güncelleyin. ".
                            "\n\nSize baþarýlar dilerim ve sýkýþtýðýnýz zaman ".EMAIL_ADMIN." adresine eposta atabilirsiniz.\n\n --Ýyi þanslar !\n\n".
                            "Kullanýcý adý:      %1\$s\n".
                            "Þifre:   %2\$s\n\n".
                            "Kullanýcý gruplarý: %3\$s".
                            "Ad:       %4\$s\n".
                            "Web sitesi:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Hesabýnýzýn bir yönetici tarafýndan deðiþtirilmesi";
$email_user_change1       = "Merhaba,\n\n".MANAGER_NAME." sitesi size hesabýnýzýn ".$email_date." tarihinde %1\$s tarafýndan deðiþtirildiðini haber veriyor. ( %2\$s ) \n\n".
                            "Kullanýcý adý:      %3\$s\n".
                            "Þifre:   %4\$s\n\n".
                            "Kullanýcý gruplarý: %5\$s".
                            "Ad:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Hesabýnýzýn deðiþtirilmesi";
$email_user_change2       = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesabýnýzý baþarýyla deðiþtirdiðinizi teyid eder.\n\n".
                            "Kullanýcý adý:    %1\$s\n".
                            "Þifre: %2\$s\n\n".
                            "Ad:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Hesabýnýzýn deðiþtirilmesi";
$email_user_change3       = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesabýnýzý baþarýyla deðiþtirdiðinizi teyid eder.\n\n".
                            "Kullanýcý adý: %1\$s\n".
                            "Mevcut þifreniz deðiþmedi.\n\n".
                            "Ad:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Hesap tekrar etkinleþtirildi";
$email_revive             = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesabýnýzýn yeniden etkinleþtirildiðini haber veriyor.\n\n".
                            "Kullanýcý adý: %1\$s\n".
                            "Ad:  %2\$s\n\n".
                            "Size þifrenizi gönderemeyiz çünkü o da þifrelenerek kaydedilmiþ durumda.\n\n".
                            "Þifrenizi unuttuysanýz yeni bir þifre için ".EMAIL_ADMIN." adresine mesaj atýn.";



$title_delete_user        = ABBR_MANAGER_NAME.": Hesap durduruldu.";
$email_delete_user        = "Merhaba,\n\n".MANAGER_NAME." sitesi size hesabýnýzýn ".$email_date." tarihinde durdurulduðunu haber veriyor.\n".
                            "Ayrýldýðýnýz için üzgünüz ve çalýþmalarýnýz için size teþekkür etmek isteriz!\n\n".
                            "Eðer hesabýnýzýn durdurulmasýna itiraz etmek isterseniz ya da bunun bir hata olduðunu düþünüyorsanýz lütfen ".EMAIL_ADMIN." adresine mesaj atýn.";

?>