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

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "tr" );

//dates
$month_array = array (NULL, 'Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara' );
$week_array = array('Paz', 'Pts', 'Sal', 'Çar', 'Per', 'Cum', 'Cts' );

//task states

 //priorities
    $task_state['dontdo']               = "Yapma";
    $task_state['low']                  = "Düşük";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "Yüksek";
    $task_state['yesterday']            = "Dün!";
 //status
    $task_state['new']                  = "Yeni";
    $task_state['planned']              = "Planlanmış (etkin değil)";
    $task_state['active']               = "Etkin (üzerinde çalışılıyor)";
    $task_state['cantcomplete']         = "Duraklatıldı";
    $task_state['completed']            = "Tamamlandı";
    $task_state['done']                 = "Bitti";
    $task_state['task_planned']         = " Planlanmış";
    $task_state['task_active']          = " Etkin";
 //project states
    $task_state['planned_project']      = "Planlanmış proje (etkin değil)";
    $task_state['no_deadline_project']  = "Son bitiş tarihi belirlenmemiş";
    $task_state['active_project']       = "Etkin proje";

//common items
    $lang['description']                = "Tanım";
    $lang['name']                       = "Ad";
    $lang['add']                        = "Ekle";
    $lang['update']                     = "Güncelle";
    $lang['submit_changes']             = "Değişiklikleri onayla";
    $lang['continue']                   = "Devam et";
    $lang['manage']                     = "Yönet";
    $lang['edit']                       = "Değiştir";
    $lang['delete']                     = "Sil";
    $lang['del']                        = "Sil";
    $lang['confirm_del_javascript']     = " Silme işlemini onayla!";
    $lang['yes']                        = "Evet";
    $lang['no']                         = "Hayır";
    $lang['action']                     = "Eylem";
    $lang['task']                       = "Görev";
    $lang['tasks']                      = "Görevler";
    $lang['project']                    = "Proje";
    $lang['info']                       = "Bilgi";
    $lang['bytes']                      = " bayt";
    $lang['select_instruct']            = "(Daha fazla seçmek ya da hiçbirini seçmemek için ctrl tuşunu kullanın)";
    $lang['member_groups']              = "Kullanıcı aşağıda belirtilen gruplara üyedir (eğer varsa)";
    $lang['login']                      = "Kullanıcı adı"; // user name
    $lang['login_action']               = "Sisteme gir";
    $lang['login_screen']               = "Giriş";
    $lang['error']                      = "Hata";
    $lang['no_login']                   = "Lütfen sisteme girin";
    $lang['redirect_sprt']              = "%d saniye sonra otomatik olarak sisteme giriş sayfasına döneceksiniz";
    $lang['login_now']                  = "Sisteme giriş sayfasına şimdi dönmek için lütfen buraya tıklayın";
    $lang['please_login']               = "Lütfen sisteme girin";
    $lang['go']                         = "Git!";

//graphic items
    $lang['late_g']                     = "&nbsp;GECİKMİŞ&nbsp;";
    $lang['new_g']                      = "&nbsp;YENİ&nbsp;";
    $lang['updated_g']                  = "&nbsp;GÜNCELLENMİŞ&nbsp;";

//admin config
    $lang['admin_config']               = "Yönetici tanımları";
    $lang['email_settings']             = "Eposta başlık ayarları";
    $lang['admin_email']                = "Yönetici epostası";
    $lang['email_reply']                = "Eposta 'kime yanıtla'";
    $lang['email_from']                 = "Eposta 'kimden'";
    $lang['mailing_list']               = "Eposta listesi";
    $lang['default_checkbox']           = "Projeler/Görevler için varsayılan checkbox ayarları";
    $lang['allow_globalaccess']         = "Genel erişime izin ver?";
    $lang['allow_group_edit']           = "Kullanıcı grubundaki herkesin değiştirmesine izin ver?";
    $lang['set_email_owner']            = "Sahibine değişiklikleri her zaman epostayla haber ver?";
    $lang['set_email_group']            = "Kullanıcı grubuna değişiklikleri her zaman epostayla haber ver?";
    $lang['project_listing_order']      = "Proje listeleme sırası";
    $lang['task_listing_order']         = "Görev listeleme sırası";
    $lang['configuration']              = "Tanımlamalar";

//archive
    $lang['archived_projects']          = "Arşivlenmiş projeler";

//contacts
    $lang['firstname']                  = "Ad:";
    $lang['lastname']                   = "Soyad:";
    $lang['company']                    = "Şirket:";
    $lang['home_phone']                 = "Ev telefonu:";
    $lang['mobile']                     = "Cep:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "İş telefonu:";
    $lang['address']                    = "Adres:";
    $lang['postal']                     = "Posta kodu";
    $lang['city']                       = "İl:";
    $lang['email_contact']              = "Eposta:";
    $lang['notes']                      = "Notlar:";
    $lang['add_contact']                = "Kişi ekle";
    $lang['del_contact']                = "Kişi sil";
    $lang['contact_info']               = "Bilgi";
    $lang['contacts']                   = "Kişiler";
    $lang['contact_add_info']           = "Eğer şirket adını girerseniz kullanıcı adı yerine bu görüntülenecektir.";
    $lang['show_contact']               = "Kişileri göster";
    $lang['edit_contact']               = "Kişileri değiştir";
    $lang['contact_submit']             = "Kişi onayla";
    $lang['contact_warn']               = "Kişi eklemek için yeterli sayıda bilgi yok. Lütfen geri dönün ve en azından ad ve soyad girin";

 //files
    $lang['manage_files']               = "Dosyaları yönet";
    $lang['no_files']                   = "Yönetilecek yüklenmiş dosya yok";
    $lang['no_file_uploads']            = "Bu sitenin sunucu tanımlamaları dosya yüklenmesine izin vermiyor";
    $lang['file']                       = "Dosya:";
    $lang['uploader']                   = "Yükleyici:";
    $lang['files_assoc_project']        = "Bu projeyle ilgili dosyalar";
    $lang['files_assoc_task']           = "Bu görevle ilgili dosyalar";
    $lang['file_admin']                 = "Dosya yöneticisi";
    $lang['add_file']                   = "Dosya ekle";
    $lang['files']                      = "Dosyalar";
    $lang['file_choose']                = "Yüklenecek dosya:";
    $lang['upload']                     = "Yükle";
    $lang['file_email_owner']           = "Sahibini yeni dosyadan epostayla haberdar et?";
    $lang['file_email_usergroup']       = "Kullanıcı grubunu yeni dosyadan epostayla haberdar et?";
    $lang['max_file_sprt']              = "Yüklenecek dosyanın boyutu %s kb'tan az olmalı.";
    $lang['file_submit']                = "Dosya onayla";
    $lang['no_upload']                  = "Hiç dosya yüklenmedi. Lütfen geri dönün ve tekrar deneyin.";
    $lang['file_too_big_sprt']          = "En fazla %s bayt yükleyebilirsiniz. Dosyanız fazla büyüktü ve silindi.";
    $lang['del_file_javascript_sprt']   = "%s dosyasını silmek istediğinizden emin misiniz?";

 //forum
    $lang['orig_message']               = "Orijinal mesaj:";
    $lang['post']                       = "Gönder!";
    $lang['message']                    = "Mesaj:";
    $lang['post_reply_sprt']            = "'%1\$s' kullanıcısından gelen '%2\$s' '%2\$s' konulu mesaja yanıt gönder";
    $lang['post_message_sprt']          = "'%s': bu kullanıcıya mesaj gönder";
    $lang['forum_email_owner']          = "Forum mesajını sahibine epostayla gönder?";
    $lang['forum_email_usergroup']      = "Forum mesajını kullanıcı grubuna epostayla gönder?";
    $lang['reply']                      = "Yanıtla";
    $lang['new_post']                   = "Yeni mesaj";
    $lang['public_user_forum']          = "Genel kullanıcı forumu";
    $lang['private_forum_sprt']         = "'%s' kullanıcı grubu için özel forum";
    $lang['forum_submit']               = "Forum onayla";
    $lang['no_message']                 = "Mesaj yok! Lütfen geri dönün ve tekrar deneyin";
    $lang['add_reply']                  = "Yanıt ekle";
    $lang['last_post_sprt']             = "Son mesaj: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Yakın zamanda gönderilmiş forum mesajları";
    $lang['forum_search']               = "Forum arama";
    $lang['no_results']                 = "'%s' için sonuç bulunamadı";
    $lang['search_results']             = "'%2\$s' için %1\$s sonuç bulundu<br />%3\$s - %4\$s arasındaki sonuçlar görüntüleniyor";

 //includes
    $lang['report']                     = "Rapor";
    $lang['warning']                    = "<h1>Özür dileriz!</h1><p>Şu anda isteğinizi yerine getiremiyoruz. Lütfen daha sonra tekrar deneyin.</p>";
    $lang['home_page']                  = "Ana sayfa";
    $lang['summary_page']               = "Özet sayfa";
    $lang['log_out']                    = "Sistemden çık";
    $lang['main_menu']                  = "Ana menü";
    $lang['archive']                    = "Arşiv";
    $lang['user_homepage_sprt']         = "kullanıcı ana sayfası: %s";
    $lang['missing_field_javascript']   = "Lütfen eksik alana bir değer girin";
    $lang['invalid_date_javascript']    = "Lütfen geçerli bir tarih seçin";
    $lang['finish_date_javascript']     = "Girilen tarih proje bitiş tarihinden daha sonraya denk geliyor!";
    $lang['security_manager']           = "Güvenlik yöneticisi";
    $lang['session_timeout_sprt']       = "Erişim engellendi; son eylem %1\$d dakika önceydi ve zaman aşımı %2\$d dakika olarak belirlenmiş durumda. Lütfen yeniden <a href=\"%3\$sindex.php\">sisteme girin</a>";
    $lang['access_denied']              = "Erişim engellendi";
    $lang['private_usergroup_no_access']= "Özür dileriz; bu alan özel bir kullanıcı grubundadır ve erişim izniniz yok.";
    $lang['invalid_date']               = "Geçersiz tarih";
    $lang['invalid_date_sprt']          = "%s geçerli bir tarih değil (ay içindeki gün adedini kontrol edin).<br />Lütfen geri dönün ve geçerli bir tarih girin.";

 //taskgroups
    $lang['taskgroup_name']             = "Görev grubu adı:";
    $lang['taskgroup_description']      = "Görev grubu basit tanım:";
    $lang['add_taskgroup']              = "Görev grubu ekle";
    $lang['add_new_taskgroup']          = "Yeni bir görev grubu ekle";
    $lang['edit_taskgroup']             = "Görev grubunu değiştir";
    $lang['taskgroup_manage']           = "Görev grubu yönetimi";
    $lang['no_taskgroups']              = "Hiçbir görev grubu belirlenmedi";
    $lang['manage_taskgroups']          = "Görev gruplarını yönet";
    $lang['taskgroups']                 = "Görev grupları";
    $lang['taskgroup_dup_sprt']         = "'%s' adında bir görev grubu zaten var.  Lütfen geri dönün ve yeni bir ad seçin.";
    $lang['info_taskgroup_manage']      = "Görev grubu yönetimi için bilgi";

 //usergroups
    $lang['usergroup_name']             = "Kullanıcı grubu adı:";
    $lang['usergroup_description']      = "Kullanıcı grubu basit tanım:";
    $lang['members']                    = "Üyeler:";
    $lang['private_usergroup']          = "Özel kullanıcı grubu";
    $lang['add_usergroup']              = "Kullanıcı grubu ekle";
    $lang['add_new_usergroup']          = "Yeni bir kullanıcı grubu ekle";
    $lang['edit_usergroup']             = "Kullanıcı grubu değiştir";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Kullanıcı grubu yönetimi";
    $lang['no_usergroups']              = "Hiçbir kullanıcı grubu belirlenmedi";
    $lang['manage_usergroups']          = "Kullanıcı gruplarını yönet";
    $lang['usergroups']                 = "Kullanıcı grupları";
    $lang['usergroup_dup_sprt']         = "'%s' adında bir kullanıcı grubu zaten var. Lütfen geri dönün ve yeni bir ad seçin.";
    $lang['info_usergroup_manage']      = "Kullanıcı grubu yönetimi için bilgi";

 //users
    $lang['login_name']                 = "Kullanıcı adı";
    $lang['full_name']                  = "Tam ad";
    $lang['password']                   = "Şifre";
    $lang['blank_for_current_password'] = "(Mevcut şifrenizi kullanmak istiyorsanız boş bırakın)";
    $lang['email']                      = "Eposta";
    $lang['admin']                      = "Yönetici";
    $lang['private_user']               = "Özel kullanıcı";
    $lang['normal_user']                = "Normal kullanıcı";
    $lang['is_admin']                   = "Yönetici mi?";
    $lang['is_guest']                   = "Misafir mi?";
    $lang['guest']                      = "Misafir kullanıcı";
    $lang['user_info']                  = "Kullanıcı hakkında bilgi";
    $lang['deleted_users']              = "Kullanıcıları sil";
    $lang['no_deleted_users']           = "Silinen kullanıcı yok.";
    $lang['revive']                     = "Yeniden canlandır";
    $lang['permdel']                    = "Silmeye izin ver";
    $lang['permdel_javascript_sprt']    = "Bu işlem kullanıcının tüm kayıtlarını ve %s ile ilgili görevleri kalıcı olarak silecek. Bunu gerçekten yapmak istiyor musunuz?";
    $lang['add_user']                   = "Kullanıcı ekle";
    $lang['edit_user']                  = "Kullanıcı değiştir";
    $lang['no_users']                   = "Sistemde tanımlı kullanıcı yok";
    $lang['users']                      = "Kullanıcılar";
    $lang['existing_users']             = "Mevcut kullanıcılar";
    $lang['private_profile']            = "Bu kullanıcının profili özeldir ve siz bakamazsınız.";
    $lang['private_usergroup_profile']  = "(Bu kullanıcı özel kullanıcı gruplarının üyesidir ve siz bakamazsınız)";
    $lang['email_users']                = "Eposta kullanıcıları";
    $lang['select_usergroup']           = "Aşağıdan seçilmiş kullanıcı grubu:";
    $lang['subject']                    = "Konu:";
    $lang['message_sent_maillist']      = "Her durumda mesaj aynı zamanda postalama listesine de kopyalanır.";
    $lang['who_online']                 = "Kim online?";
    $lang['edit_details']               = "Kullanıcı detaylarını değiştir";
    $lang['show_details']               = "Kullanıcı detaylarını göster";
    $lang['user_deleted']               = "Kullanıcı silindi!";
    $lang['no_usergroup']               = "Bu kullanıcı hiçbir kullanıcı grubunun üyesi değil";
    $lang['not_usergroup']              = "(Hiçbir kullanıcı grubunun üyesi değil)";
    $lang['no_password_change']         = "(Mevcut şifreniz değişmedi)";
    $lang['last_time_here']             = "En son burada görüldüğü zaman:";
    $lang['number_items_created']       = "Yarattığı öge adedi:";
    $lang['number_projects_owned']      = "Sahip olduğu proje adedi:";
    $lang['number_tasks_owned']         = "Sahip olduğu görev adedi:";
    $lang['number_tasks_completed']     = "Bitirdiği görev adedi:";
    $lang['number_forum']               = "Forum mesajı adedi:";
    $lang['number_files']               = "Yüklediği dosya adedi:";
    $lang['size_all_files']             = "Sahip olduğu dosyaların toplam boyutu:";
    $lang['owned_tasks']                = "Sahip olduğu görevler";
    $lang['invalid_email']              = "Geçersiz eposta adresi";
    $lang['invalid_email_given_sprt']   = "'%s' eposta adresi geçersizdir.  Lütfen geri dönün ve yeniden deneyin.";
    $lang['duplicate_user']             = "Çift kullanıcı";
    $lang['duplicate_change_user_sprt'] = "'%s' kullanıcısı zaten var.  Lütfen geri dönün ve adını değiştirin.";
    $lang['value_missing']              = "Eksik değer";
    $lang['field_sprt']                 = "'%s' için alan eksik girilmiş. Lütfen geri dönün ve doldurun.";
    $lang['admin_priv']                 = "NOT: Size yönetici yetkileri verilmiştir.";
    $lang['manage_users']               = "Kullanıcıları yönet";
    $lang['users_online']               = "Online kullanıcılar";
    $lang['online']                     = "Çetin ceviz sörfçüler (60 dakikadan daha az bir süre önce online olanlar)";
    $lang['not_online']                 = "Geri kalan";
    $lang['user_activity']              = "Kullanıcı eylemleri";

  //tasks
    $lang['add_new_task']               = "Yeni bir görev ekle";
    $lang['priority']                   = "Öncelik";
    $lang['parent_task']                = "Üst seviye";
    $lang['creation_time']              = "Yaratılma tarihi";
    $lang['by_sprt']                    = "%2\$s tarafından %1\$s tarihinde"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Proje adı";
    $lang['task_name']                  = "Görev adı";
    $lang['deadline']                   = "Son bitiş tarihi";
    $lang['taken_from_parent']          = "(Üst seviyeden alınmış)";
    $lang['status']                     = "Durum";
    $lang['task_owner']                 = "Görev sahibi";
    $lang['project_owner']              = "Proje sahibi";
    $lang['taskgroup']                  = "Görev grubu";
    $lang['usergroup']                  = "Kullanıcı grubu";
    $lang['nobody']                     = "Hiçkimse";
    $lang['none']                       = "Yok";
    $lang['no_group']                   = "Grup yok";
    $lang['all_groups']                 = "Tüm gruplar";
    $lang['all_users']                  = "Tüm kullanıcılar";
    $lang['all_users_view']             = "Tüm kullanıcılar bu ögeyi görebilir mi?";
    $lang['group_edit']                 = "Kullanıcı grubundaki herkes değiştirebilir mi?";
    $lang['project_description']        = "Proje tanımı";
    $lang['task_description']           = "Görev tanımı";
    $lang['email_owner']                = "Sahibine değişiklikleri bildiren bir eposta gönderilsin mi?";
    $lang['email_new_owner']            = "(Yeni) sahibine değişiklikleri bildiren bir eposta gönderilsin mi?";
    $lang['email_group']                = "Kullanıcı grubuna değişiklikleri bildiren bir eposta gönderilsin mi?";
    $lang['add_new_project']            = "Yeni bir proje ekle";
    $lang['uncategorised']              = "Kategoriye sokulmamış";
    $lang['due_sprt']                   = "%d gün içinde";
    $lang['tomorrow']                   = "Yarın";
    $lang['due_today']                  = "En son bugün";
    $lang['overdue_1']                  = "1 gün gecikmeli";
    $lang['overdue_sprt']               = "%d gün gecikmeli";
    $lang['edit_task']                  = "Görevi değiştir";
    $lang['edit_project']               = "Projeyi değiştir";
    $lang['no_reparent']                = "Yok (en üst seviye proje)";
    $lang['del_javascript_project_sprt']= "Bu işlem %s projesini silecek. Emin misiniz?";
    $lang['del_javascript_task_sprt']   = "Bu işlem %s görevini silecek. Emin misiniz?";
    $lang['add_task']                   = "Görev ekle";
    $lang['add_subtask']                = "Alt görev ekle";
    $lang['add_project']                = "Proje ekle";
    $lang['clone_project']              = "Projeyi klonla";
    $lang['clone_task']                 = "Görevi klonla";
    $lang['quick_jump']                 = "Hızlı menü";
    $lang['no_edit']                    = "Bu ögenin sahibi değilsiniz ve onu değiştiremezsiniz";
    $lang['global']                     = "Genel";
    $lang['delete_project']             = "Projeyi sil";
    $lang['delete_task']                = "Görevi sil";
    $lang['project_options']            = "Proje seçenekleri";
    $lang['task_options']               = "Görev seçenekleri";
    $lang['javascript_archive_project'] = "Bu işlem %s projesini arşive kaldıracak. Emin misiniz?";
    $lang['archive_project']            = "Projeyi arşive kaldır";
    $lang['task_navigation']            = "Görev navigasyon";
    $lang['new_task']                   = "Yeni görev";
    $lang['no_projects']                = "Bakılacak proje yok";
    $lang['show_all_projects']          = "Tüm projeleri göster";
    $lang['show_active_projects']       = "Sadece aktif projeleri göster";
    $lang['project_hold_sprt']          = "Duraklatılmış proje: %s";
    $lang['project_planned']            = "Planlanmış proje";
    $lang['percent_sprt']               = "Görevlerin %d%% bölümü bitti";
    $lang['project_no_deadline']        = "Bu proje için son bitiş tarihi belirlenmemiş";
    $lang['no_allowed_projects']        = "Sizin bakma yetkiniz olan proje yok";
    $lang['projects']                   = "Projeler";
    $lang['percent_project_sprt']       = "Bu proje %d%% oranında tamamlandı";
    $lang['owned_by']                   = "Sahibi";
    $lang['created_on']                 = "Yaratıldığı tarih";
    $lang['completed_on']               = "Tamamlandığı tarih";
    $lang['modified_on']                = "Değiştirildiği tarih";
    $lang['project_on_hold']            = "Proje duraklatılmış durumda";
    $lang['project_accessible']         = "(Bu proje tüm kullanıcılar tarafından erişilebilir durumda)";
    $lang['task_accessible']            = "(Bu görev tüm kullanıcılar tarafından erişilebilir durumda)";
    $lang['project_not_accessible']     = "(Bu proje sadece kullanıcı grubunun üyeleri tarafından erişilebilir durumda)";
    $lang['task_not_accessible']        = "(Bu görev sadece kullanıcı grubunun üyeleri tarafından erişilebilir durumda)";
    $lang['project_not_in_usergroup']   = "Bu proje bir kullanıcı grubuna ait değil ve tüm kullanıcılar tarafından erişilebilir.";
    $lang['task_not_in_usergroup']      = "Bu görev bir kullanıcı grubuna ait değil ve tüm kullanıcılar tarafından erişilebilir.";
    $lang['usergroup_can_edit_project'] = "Bu proje kullanıcı grubunun üyeleri tarafından da değiştirilebilir.";
    $lang['usergroup_can_edit_task']    = "Bu görev kullanıcı grubunun üyeleri tarafından da değiştirilebilir.";
    $lang['i_take_it']                  = "Ben alacağım :)";
    $lang['i_finished']                 = "Bitirdim!";
    $lang['i_dont_want']                = "Artık onu istemiyorum";
    $lang['take_over_project']          = "Projeyi üzerine al";
    $lang['take_over_task']             = "Görevi üzerine al";
    $lang['task_info']                  = "Görev hakkında bilgi";
    $lang['project_details']            = "Proje detayları";
    $lang['todo_list_for']              = "Yapılacaklar listesi: ";
    $lang['due_in_sprt']                = " (%d gün içinde)";
    $lang['due_tomorrow']               = " (Yarına kadar)";
    $lang['no_assigned']                = "Bu kullanıcıya atanmış olan bitmemiş görev yoktur.";
    $lang['todo_list']                  = "Yapılacaklar listesi";
    $lang['summary_list']               = "Özet listesi";
    $lang['task_submit']                = "Görev gönder";
    $lang['not_owner']                  = "Erişim engellendi. Ya sahibi değilsiniz ya da yeterli yetkiniz yok";
    $lang['missing_values']             = "Yeteri kadar alana bilgi girilmedi. Lütfen geri dönün ve tekrar deneyin";
    $lang['future']                     = "Gelecek";
    $lang['flags']                      = "Bayraklar";
    $lang['owner']                      = "Sahibi";
    $lang['group']                      = "Grup";
    $lang['by_usergroup']               = " (kullanıcı grubuna göre)";
    $lang['by_taskgroup']               = " (görev grubuna göre)";
    $lang['by_deadline']                = " (son bitiş tarihi göre)";
    $lang['by_status']                  = " (duruma göre)";
    $lang['by_owner']                   = " (sahibine göre)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Klonlanacak proje :";
    $lang['task_cloned']                = "Klonlanacak görev :";
    $lang['note_clone']                 = "Not: Görev yeni bir proje olarak klonlanacaktır";

//bits 'n' pieces
    $lang['calendar']                   = "Takvim";
    $lang['normal_version']             = "Normal sürüm";
    $lang['print_version']              = "Yazıcı sürümü";
    $lang['condensed_view']             = "Sıkıştırılmış görünüm";
    $lang['full_view']                  = "Tam görünüm";
    $lang['icalendar']                  = "iTakvim";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>
