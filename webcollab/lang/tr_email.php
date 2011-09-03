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

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s, %s %+03d00', date('j', $ltime ), $month_array[(date('n', $ltime ) )], date('Y H:i', $ltime ), date('H:i', $ltime ), TZ );

// Get current date/time for emails in a preferred format eg: 1 Nis 2004, 21:18
//$email_date = date("j" )." ".$month_array[(date("n" ) )]." ".date('Y, H:i' );

$title_file_post          = ABBR_MANAGER_NAME.": Yeni yüklenen dosya: %s";
$email_file_post          = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s tarafından yeni bir dosyanın yüklendiğini haber veriyor.\n\n".
                            "Dosya:        %2\$s\n".
                            "Tanımı: %3\$s\n\n".
                            "Proje:        %4\$s\n".
                            "Görev:        %5\$s\n\n".
                            "Daha detaylı bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Yeni forum mesajı: %s";
$email_forum_post         = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s tarafından yeni bir forum mesajı gönderildiğini haber veriyor:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Daha detaylı bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde %1\$s tarafından yeni bir forum mesajı gönderildiğini haber veriyor.\n\n".
                            "Bu mesaj %2\$s tarafından daha önce gönderilen bir mesaja yanıt niteliğinde.\n\n".
                            "Orijinal mesaj:\n%3\$s\n\n".
                            "----\n\n".
                            "Yeni yanıt:\n%4\$s\n\n".
                            "----\n\n".
                            "Daha detaylı bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%5\$s\n";

$email_list =  "Proje:  %1\$s\n".
               "Görev:     %2\$s\n".
               "Durum:   %3\$s\n".
               "Sahibi:    %4\$s ( %5\$s )\n".
               "Yazı:\n%6\$s\n\n".
               "Daha detaylı bilgi için lütfen web sitesine gidin.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Projeniz sizden alındı";
$title_takeover_task      = ABBR_MANAGER_NAME.": Göreviniz sizden alındı";

$email_takeover_task      = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size ait olan bir görevin bir yönetici tarafından sizden alındığını haber veriyor.\n\n";
$email_takeover_project   = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size ait olan bir projenin bir yönetici tarafından sizden alındığını haber veriyor.\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Size yeni bir proje";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Size yeni bir görev";

$email_new_owner_project  = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde bir projenin yaratıldığını ve sizin bu projenin sahibi olduğunuzu haber veriyor.\n\nİşte detaylar:\n\n";
$email_new_owner_task     = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde bir görevin yaratıldığını ve sizin bu görevin sahibi olduğunuzu haber veriyor.\n\nİşte detaylar:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Yeni proje: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Yeni görev: %s";

$email_new_group_project  = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde yeni bir projenin yaratıldığını haber veriyor.\n\nİşte detaylar:\n\n";
$email_new_group_task     = "Merhaba,\n\n".MANAGER_NAME." sitesi size ".$email_date." tarihinde yeni bir görevin yaratıldığını haber veriyor.\n\nİşte detaylar:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Projeniz güncellendi";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Göreviniz güncellendi";

$email_edit_owner_project = "Merhaba,\n\n".MANAGER_NAME." sitesi size ait olan bir projenin ".$email_date." tarihinde değiştirildiğini haber veriyor.\n\nİşte detaylar:\n\n";
$email_edit_owner_task    = "Merhaba,\n\n".MANAGER_NAME." sitesi size ait olan bir görevin ".$email_date." tarihinde değiştirildiğini haber veriyor.\n\nİşte detaylar:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Proje güncellendi";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Görev güncellendi";

$email_edit_group_project = "Merhaba,\n\n".MANAGER_NAME." sitesi size sahibi %s olan bir projenin ".$email_date." tarihinde değiştirildiğini haber veriyor.\n\nİşte detaylar:\n\n";
$email_edit_group_task    = "Merhaba,\n\n".MANAGER_NAME." sitesi size sahibi %s olan bir görevin ".$email_date." tarihinde değiştirildiğini haber veriyor.\n\nİşte detaylar:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Proje silindi";
$title_delete_task        = ABBR_MANAGER_NAME.": Görev silindi";

$email_delete_project     = "Merhaba,\n\n".
                            MANAGER_NAME." sitesi size ait olan bir projenin ".$email_date." tarihinde silindiğini haber veriyor.\n\n".
                            "Süresi boyunca projeyi yönettiğiniz için teşekkürler.\n\n";
$email_delete_task        = "Merhaba,\n\n".
                            MANAGER_NAME." sitesi size ait olan bir görevin ".$email_date." tarihinde silindiğini haber veriyor.\n\n".
                            "Süresi boyunca görevi yönettiğiniz için teşekkürler.\n\n";

$delete_list = "Proje: %1\$s\n".
                "Görev:   %2\$s\n".
                "Durum: %3\$s\n\n".
                "Yazı:\n%4\$s\n\n";

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

$title_welcome            = "Hoşgeldiniz: ".ABBR_MANAGER_NAME;
$email_welcome            = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde size benim adıma hoşgeldiniz der ;)\n\n".
                            "Burada yenisiniz ve hemen çalışmaya başlayabilmeniz için size bir kaç şey açıklayacağım\n\n".
                            "Herşeyden önce bu bir proje yönetim aracıdır, ana sayfa size şu anda ulaşılabilir olan projeleri gösterecektir. ".
                            "İsimlerden birine tıklarsanız kendinizi görev tarafında bulursunuz. Bu bütün işin yürüdüğü yerdir.\n\n".
                            "Gönderdiğiniz her öge ve değiştirdiğiniz her görev diğer kullanıcılara 'yeni' ya da 'güncellenmiş' olarak gösterilecektir. Tam tersi de geçerlidir ve ".
                            "bu size etkinliğin nerede olduğunu hemen bulmanızı sağlar.\n\n".
                            "Görevleri üzerinize alabilirsiniz ya da görevler size verilebilir; onları ve onlara ait forum mesajlarını değiştirebilirsiniz. ".
                            "Görevinizde ilerledikçe herkesin bunu izleyebilmesi için lütfen görevinizin yazısını ve durumunu güncelleyin. ".
                            "\n\nSize başarılar dilerim ve sıkıştığınız zaman ".EMAIL_ADMIN." adresine eposta atabilirsiniz.\n\n --İyi şanslar !\n\n".
                            "Kullanıcı adı:      %1\$s\n".
                            "Şifre:   %2\$s\n\n".
                            "Kullanıcı grupları: %3\$s".
                            "Ad:       %4\$s\n".
                            "Web sitesi:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Hesabınızın bir yönetici tarafından değiştirilmesi";
$email_user_change1       = "Merhaba,\n\n".MANAGER_NAME." sitesi size hesabınızın ".$email_date." tarihinde %1\$s tarafından değiştirildiğini haber veriyor. ( %2\$s ) \n\n".
                            "Kullanıcı adı:      %3\$s\n".
                            "Şifre:   %4\$s\n\n".
                            "Kullanıcı grupları: %5\$s".
                            "Ad:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Hesabınızın değiştirilmesi";
$email_user_change2       = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesabınızı başarıyla değiştirdiğinizi teyid eder.\n\n".
                            "Kullanıcı adı:    %1\$s\n".
                            "Şifre: %2\$s\n\n".
                            "Ad:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Hesabınızın değiştirilmesi";
$email_user_change3       = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesabınızı başarıyla değiştirdiğinizi teyid eder.\n\n".
                            "Kullanıcı adı: %1\$s\n".
                            "Mevcut şifreniz değişmedi.\n\n".
                            "Ad:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Hesap tekrar etkinleştirildi";
$email_revive             = "Merhaba,\n\n".MANAGER_NAME." sitesi ".$email_date." tarihinde hesabınızın yeniden etkinleştirildiğini haber veriyor.\n\n".
                            "Kullanıcı adı: %1\$s\n".
                            "Ad:  %2\$s\n\n".
                            "Size şifrenizi gönderemeyiz çünkü o da şifrelenerek kaydedilmiş durumda.\n\n".
                            "Şifrenizi unuttuysanız yeni bir şifre için ".EMAIL_ADMIN." adresine mesaj atın.";



$title_delete_user        = ABBR_MANAGER_NAME.": Hesap durduruldu.";
$email_delete_user        = "Merhaba,\n\n".MANAGER_NAME." sitesi size hesabınızın ".$email_date." tarihinde durdurulduğunu haber veriyor.\n".
                            "Ayrıldığınız için üzgünüz ve çalışmalarınız için size teşekkür etmek isteriz!\n\n".
                            "Eğer hesabınızın durdurulmasına itiraz etmek isterseniz ya da bunun bir hata olduğunu düşünüyorsanız lütfen ".EMAIL_ADMIN." adresine mesaj atın.";

?>