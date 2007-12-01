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

//required language encodings
define('CHARACTER_SET', "ISO-8859-9" );

//this is the regex for input validation filter used in common.php
define('VALIDATION_REGEX', "/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/" ); //ISO-8859-x

//dates
$month_array = array (NULL, 'Oca', 'Þub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Aðu', 'Eyl', 'Eki', 'Kas', 'Ara' );
$week_array = array('Paz', 'Pts', 'Sal', 'Çar', 'Per', 'Cum', 'Cts' );

//task states

 //priorities
    $task_state['dontdo']               = "Yapma";
    $task_state['low']                  = "Düþük";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "Yüksek";
    $task_state['yesterday']            = "Dün!";
 //status
    $task_state['new']                  = "Yeni";
    $task_state['planned']              = "Planlanmýþ (etkin deðil)";
    $task_state['active']               = "Etkin (üzerinde çalýþýlýyor)";
    $task_state['cantcomplete']         = "Duraklatýldý";
    $task_state['completed']            = "Tamamlandý";
    $task_state['done']                 = "Bitti";
    $task_state['task_planned']         = " Planlanmýþ";
    $task_state['task_active']          = " Etkin";
 //project states
    $task_state['planned_project']      = "Planlanmýþ proje (etkin deðil)";
    $task_state['no_deadline_project']  = "Son bitiþ tarihi belirlenmemiþ";
    $task_state['active_project']       = "Etkin proje";

//common items
    $lang['description']                = "Taným";
    $lang['name']                       = "Ad";
    $lang['add']                        = "Ekle";
    $lang['update']                     = "Güncelle";
    $lang['submit_changes']             = "Deðiþiklikleri onayla";
    $lang['continue']                   = "Devam et";
    $lang['manage']                     = "Yönet";
    $lang['edit']                       = "Deðiþtir";
    $lang['delete']                     = "Sil";
    $lang['del']                        = "Sil";
    $lang['confirm_del_javascript']     = " Silme iþlemini onayla!";
    $lang['yes']                        = "Evet";
    $lang['no']                         = "Hayýr";
    $lang['action']                     = "Eylem";
    $lang['task']                       = "Görev";
    $lang['tasks']                      = "Görevler";
    $lang['project']                    = "Proje";
    $lang['info']                       = "Bilgi";
    $lang['bytes']                      = " bayt";
    $lang['select_instruct']            = "(Daha fazla seçmek ya da hiçbirini seçmemek için ctrl tuþunu kullanýn)";
    $lang['member_groups']              = "Kullanýcý aþaðýda belirtilen gruplara üyedir (eðer varsa)";
    $lang['login']                      = "Kullanýcý adý"; // user name
    $lang['login_action']               = "Sisteme gir";
    $lang['login_screen']               = "Giriþ";
    $lang['error']                      = "Hata";
    $lang['no_login']                   = "Lütfen sisteme girin";
    $lang['redirect_sprt']              = "%d saniye sonra otomatik olarak sisteme giriþ sayfasýna döneceksiniz";
    $lang['login_now']                  = "Sisteme giriþ sayfasýna þimdi dönmek için lütfen buraya týklayýn";
    $lang['please_login']               = "Lütfen sisteme girin";
    $lang['go']                         = "Git!";

//graphic items
    $lang['late_g']                     = "&nbsp;GECÝKMÝÞ&nbsp;";
    $lang['new_g']                      = "&nbsp;YENÝ&nbsp;";
    $lang['updated_g']                  = "&nbsp;GÜNCELLENMÝÞ&nbsp;";

//admin config
    $lang['admin_config']               = "Yönetici tanýmlarý";
    $lang['email_settings']             = "Eposta baþlýk ayarlarý";
    $lang['admin_email']                = "Yönetici epostasý";
    $lang['email_reply']                = "Eposta 'kime yanýtla'";
    $lang['email_from']                 = "Eposta 'kimden'";
    $lang['mailing_list']               = "Eposta listesi";
    $lang['default_checkbox']           = "Projeler/Görevler için varsayýlan checkbox ayarlarý";
    $lang['allow_globalaccess']         = "Genel eriþime izin ver?";
    $lang['allow_group_edit']           = "Kullanýcý grubundaki herkesin deðiþtirmesine izin ver?";
    $lang['set_email_owner']            = "Sahibine deðiþiklikleri her zaman epostayla haber ver?";
    $lang['set_email_group']            = "Kullanýcý grubuna deðiþiklikleri her zaman epostayla haber ver?";
    $lang['project_listing_order']      = "Proje listeleme sýrasý";
    $lang['task_listing_order']         = "Görev listeleme sýrasý";
    $lang['configuration']              = "Tanýmlamalar";

//archive
    $lang['archived_projects']          = "Arþivlenmiþ projeler";

//contacts
    $lang['firstname']                  = "Ad:";
    $lang['lastname']                   = "Soyad:";
    $lang['company']                    = "Þirket:";
    $lang['home_phone']                 = "Ev telefonu:";
    $lang['mobile']                     = "Cep:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "Ýþ telefonu:";
    $lang['address']                    = "Adres:";
    $lang['postal']                     = "Posta kodu";
    $lang['city']                       = "Ýl:";
    $lang['email_contact']              = "Eposta:";
    $lang['notes']                      = "Notlar:";
    $lang['add_contact']                = "Kiþi ekle";
    $lang['del_contact']                = "Kiþi sil";
    $lang['contact_info']               = "Bilgi";
    $lang['contacts']                   = "Kiþiler";
    $lang['contact_add_info']           = "Eðer þirket adýný girerseniz kullanýcý adý yerine bu görüntülenecektir.";
    $lang['show_contact']               = "Kiþileri göster";
    $lang['edit_contact']               = "Kiþileri deðiþtir";
    $lang['contact_submit']             = "Kiþi onayla";
    $lang['contact_warn']               = "Kiþi eklemek için yeterli sayýda bilgi yok. Lütfen geri dönün ve en azýndan ad ve soyad girin";

 //files
    $lang['manage_files']               = "Dosyalarý yönet";
    $lang['no_files']                   = "Yönetilecek yüklenmiþ dosya yok";
    $lang['no_file_uploads']            = "Bu sitenin sunucu tanýmlamalarý dosya yüklenmesine izin vermiyor";
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
    $lang['file_email_usergroup']       = "Kullanýcý grubunu yeni dosyadan epostayla haberdar et?";
    $lang['max_file_sprt']              = "Yüklenecek dosyanýn boyutu %s kb'tan az olmalý.";
    $lang['file_submit']                = "Dosya onayla";
    $lang['no_upload']                  = "Hiç dosya yüklenmedi. Lütfen geri dönün ve tekrar deneyin.";
    $lang['file_too_big_sprt']          = "En fazla %s bayt yükleyebilirsiniz. Dosyanýz fazla büyüktü ve silindi.";
    $lang['del_file_javascript_sprt']   = "%s dosyasýný silmek istediðinizden emin misiniz?";

 //forum
    $lang['orig_message']               = "Orijinal mesaj:";
    $lang['post']                       = "Gönder!";
    $lang['message']                    = "Mesaj:";
    $lang['post_reply_sprt']            = "'%1\$s' kullanýcýsýndan gelen '%2\$s' '%2\$s' konulu mesaja yanýt gönder";
    $lang['post_message_sprt']          = "'%s': bu kullanýcýya mesaj gönder";
    $lang['forum_email_owner']          = "Forum mesajýný sahibine epostayla gönder?";
    $lang['forum_email_usergroup']      = "Forum mesajýný kullanýcý grubuna epostayla gönder?";
    $lang['reply']                      = "Yanýtla";
    $lang['new_post']                   = "Yeni mesaj";
    $lang['public_user_forum']          = "Genel kullanýcý forumu";
    $lang['private_forum_sprt']         = "'%s' kullanýcý grubu için özel forum";
    $lang['forum_submit']               = "Forum onayla";
    $lang['no_message']                 = "Mesaj yok! Lütfen geri dönün ve tekrar deneyin";
    $lang['add_reply']                  = "Yanýt ekle";
    $lang['last_post_sprt']             = "Son mesaj: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Yakýn zamanda gönderilmiþ forum mesajlarý";
    $lang['forum_search']               = "Forum arama";
    $lang['no_results']                 = "'%s' için sonuç bulunamadý";
    $lang['search_results']             = "'%2\$s' için %1\$s sonuç bulundu<br />%3\$s - %4\$s arasýndaki sonuçlar görüntüleniyor";

 //includes
    $lang['report']                     = "Rapor";
    $lang['warning']                    = "<h1>Özür dileriz!</h1><p>Þu anda isteðinizi yerine getiremiyoruz. Lütfen daha sonra tekrar deneyin.</p>";
    $lang['home_page']                  = "Ana sayfa";
    $lang['summary_page']               = "Özet sayfa";
    $lang['log_out']                    = "Sistemden çýk";
    $lang['main_menu']                  = "Ana menü";
    $lang['archive']                    = "Arþiv";
    $lang['user_homepage_sprt']         = "kullanýcý ana sayfasý: %s";
    $lang['missing_field_javascript']   = "Lütfen eksik alana bir deðer girin";
    $lang['invalid_date_javascript']    = "Lütfen geçerli bir tarih seçin";
    $lang['finish_date_javascript']     = "Girilen tarih proje bitiþ tarihinden daha sonraya denk geliyor!";
    $lang['security_manager']           = "Güvenlik yöneticisi";
    $lang['session_timeout_sprt']       = "Eriþim engellendi; son eylem %1\$d dakika önceydi ve zaman aþýmý %2\$d dakika olarak belirlenmiþ durumda. Lütfen yeniden <a href=\"%3\$sindex.php\">sisteme girin</a>";
    $lang['access_denied']              = "Eriþim engellendi";
    $lang['private_usergroup_no_access']= "Özür dileriz; bu alan özel bir kullanýcý grubundadýr ve eriþim izniniz yok.";
    $lang['invalid_date']               = "Geçersiz tarih";
    $lang['invalid_date_sprt']          = "%s geçerli bir tarih deðil (ay içindeki gün adedini kontrol edin).<br />Lütfen geri dönün ve geçerli bir tarih girin.";

 //taskgroups
    $lang['taskgroup_name']             = "Görev grubu adý:";
    $lang['taskgroup_description']      = "Görev grubu basit taným:";
    $lang['add_taskgroup']              = "Görev grubu ekle";
    $lang['add_new_taskgroup']          = "Yeni bir görev grubu ekle";
    $lang['edit_taskgroup']             = "Görev grubunu deðiþtir";
    $lang['taskgroup_manage']           = "Görev grubu yönetimi";
    $lang['no_taskgroups']              = "Hiçbir görev grubu belirlenmedi";
    $lang['manage_taskgroups']          = "Görev gruplarýný yönet";
    $lang['taskgroups']                 = "Görev gruplarý";
    $lang['taskgroup_dup_sprt']         = "'%s' adýnda bir görev grubu zaten var.  Lütfen geri dönün ve yeni bir ad seçin.";
    $lang['info_taskgroup_manage']      = "Görev grubu yönetimi için bilgi";

 //usergroups
    $lang['usergroup_name']             = "Kullanýcý grubu adý:";
    $lang['usergroup_description']      = "Kullanýcý grubu basit taným:";
    $lang['members']                    = "Üyeler:";
    $lang['private_usergroup']          = "Özel kullanýcý grubu";
    $lang['add_usergroup']              = "Kullanýcý grubu ekle";
    $lang['add_new_usergroup']          = "Yeni bir kullanýcý grubu ekle";
    $lang['edit_usergroup']             = "Kullanýcý grubu deðiþtir";
    $lang['usergroup_manage']           = "Kullanýcý grubu yönetimi";
    $lang['no_usergroups']              = "Hiçbir kullanýcý grubu belirlenmedi";
    $lang['manage_usergroups']          = "Kullanýcý gruplarýný yönet";
    $lang['usergroups']                 = "Kullanýcý gruplarý";
    $lang['usergroup_dup_sprt']         = "'%s' adýnda bir kullanýcý grubu zaten var. Lütfen geri dönün ve yeni bir ad seçin.";
    $lang['info_usergroup_manage']      = "Kullanýcý grubu yönetimi için bilgi";

 //users
    $lang['login_name']                 = "Kullanýcý adý";
    $lang['full_name']                  = "Tam ad";
    $lang['password']                   = "Þifre";
    $lang['blank_for_current_password'] = "(Mevcut þifrenizi kullanmak istiyorsanýz boþ býrakýn)";
    $lang['email']                      = "Eposta";
    $lang['admin']                      = "Yönetici";
    $lang['private_user']               = "Özel kullanýcý";
    $lang['normal_user']                = "Normal kullanýcý";
    $lang['is_admin']                   = "Yönetici mi?";
    $lang['is_guest']                   = "Misafir mi?";
    $lang['guest']                      = "Misafir kullanýcý";
    $lang['user_info']                  = "Kullanýcý hakkýnda bilgi";
    $lang['deleted_users']              = "Kullanýcýlarý sil";
    $lang['no_deleted_users']           = "Silinen kullanýcý yok.";
    $lang['revive']                     = "Yeniden canlandýr";
    $lang['permdel']                    = "Silmeye izin ver";
    $lang['permdel_javascript_sprt']    = "Bu iþlem kullanýcýnýn tüm kayýtlarýný ve %s ile ilgili görevleri kalýcý olarak silecek. Bunu gerçekten yapmak istiyor musunuz?";
    $lang['add_user']                   = "Kullanýcý ekle";
    $lang['edit_user']                  = "Kullanýcý deðiþtir";
    $lang['no_users']                   = "Sistemde tanýmlý kullanýcý yok";
    $lang['users']                      = "Kullanýcýlar";
    $lang['existing_users']             = "Mevcut kullanýcýlar";
    $lang['private_profile']            = "Bu kullanýcýnýn profili özeldir ve siz bakamazsýnýz.";
    $lang['private_usergroup_profile']  = "(Bu kullanýcý özel kullanýcý gruplarýnýn üyesidir ve siz bakamazsýnýz)";
    $lang['email_users']                = "Eposta kullanýcýlarý";
    $lang['select_usergroup']           = "Aþaðýdan seçilmiþ kullanýcý grubu:";
    $lang['subject']                    = "Konu:";
    $lang['message_sent_maillist']      = "Her durumda mesaj ayný zamanda postalama listesine de kopyalanýr.";
    $lang['who_online']                 = "Kim online?";
    $lang['edit_details']               = "Kullanýcý detaylarýný deðiþtir";
    $lang['show_details']               = "Kullanýcý detaylarýný göster";
    $lang['user_deleted']               = "Kullanýcý silindi!";
    $lang['no_usergroup']               = "Bu kullanýcý hiçbir kullanýcý grubunun üyesi deðil";
    $lang['not_usergroup']              = "(Hiçbir kullanýcý grubunun üyesi deðil)";
    $lang['no_password_change']         = "(Mevcut þifreniz deðiþmedi)";
    $lang['last_time_here']             = "En son burada görüldüðü zaman:";
    $lang['number_items_created']       = "Yarattýðý öge adedi:";
    $lang['number_projects_owned']      = "Sahip olduðu proje adedi:";
    $lang['number_tasks_owned']         = "Sahip olduðu görev adedi:";
    $lang['number_tasks_completed']     = "Bitirdiði görev adedi:";
    $lang['number_forum']               = "Forum mesajý adedi:";
    $lang['number_files']               = "Yüklediði dosya adedi:";
    $lang['size_all_files']             = "Sahip olduðu dosyalarýn toplam boyutu:";
    $lang['owned_tasks']                = "Sahip olduðu görevler";
    $lang['invalid_email']              = "Geçersiz eposta adresi";
    $lang['invalid_email_given_sprt']   = "'%s' eposta adresi geçersizdir.  Lütfen geri dönün ve yeniden deneyin.";
    $lang['duplicate_user']             = "Çift kullanýcý";
    $lang['duplicate_change_user_sprt'] = "'%s' kullanýcýsý zaten var.  Lütfen geri dönün ve adýný deðiþtirin.";
    $lang['value_missing']              = "Eksik deðer";
    $lang['field_sprt']                 = "'%s' için alan eksik girilmiþ. Lütfen geri dönün ve doldurun.";
    $lang['admin_priv']                 = "NOT: Size yönetici yetkileri verilmiþtir.";
    $lang['manage_users']               = "Kullanýcýlarý yönet";
    $lang['users_online']               = "Online kullanýcýlar";
    $lang['online']                     = "Çetin ceviz sörfçüler (60 dakikadan daha az bir süre önce online olanlar)";
    $lang['not_online']                 = "Geri kalan";
    $lang['user_activity']              = "Kullanýcý eylemleri";

  //tasks
    $lang['add_new_task']               = "Yeni bir görev ekle";
    $lang['priority']                   = "Öncelik";
    $lang['parent_task']                = "Üst seviye";
    $lang['creation_time']              = "Yaratýlma tarihi";
    $lang['by_sprt']                    = "%2\$s tarafýndan %1\$s tarihinde"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Proje adý";
    $lang['task_name']                  = "Görev adý";
    $lang['deadline']                   = "Son bitiþ tarihi";
    $lang['taken_from_parent']          = "(Üst seviyeden alýnmýþ)";
    $lang['status']                     = "Durum";
    $lang['task_owner']                 = "Görev sahibi";
    $lang['project_owner']              = "Proje sahibi";
    $lang['taskgroup']                  = "Görev grubu";
    $lang['usergroup']                  = "Kullanýcý grubu";
    $lang['nobody']                     = "Hiçkimse";
    $lang['none']                       = "Yok";
    $lang['no_group']                   = "Grup yok";
    $lang['all_groups']                 = "Tüm gruplar";
    $lang['all_users']                  = "Tüm kullanýcýlar";
    $lang['all_users_view']             = "Tüm kullanýcýlar bu ögeyi görebilir mi?";
    $lang['group_edit']                 = "Kullanýcý grubundaki herkes deðiþtirebilir mi?";
    $lang['project_description']        = "Proje tanýmý";
    $lang['task_description']           = "Görev tanýmý";
    $lang['email_owner']                = "Sahibine deðiþiklikleri bildiren bir eposta gönderilsin mi?";
    $lang['email_new_owner']            = "(Yeni) sahibine deðiþiklikleri bildiren bir eposta gönderilsin mi?";
    $lang['email_group']                = "Kullanýcý grubuna deðiþiklikleri bildiren bir eposta gönderilsin mi?";
    $lang['add_new_project']            = "Yeni bir proje ekle";
    $lang['uncategorised']              = "Kategoriye sokulmamýþ";
    $lang['due_sprt']                   = "%d gün içinde";
    $lang['tomorrow']                   = "Yarýn";
    $lang['due_today']                  = "En son bugün";
    $lang['overdue_1']                  = "1 gün gecikmeli";
    $lang['overdue_sprt']               = "%d gün gecikmeli";
    $lang['edit_task']                  = "Görevi deðiþtir";
    $lang['edit_project']               = "Projeyi deðiþtir";
    $lang['no_reparent']                = "Yok (en üst seviye proje)";
    $lang['del_javascript_project_sprt']= "Bu iþlem %s projesini silecek. Emin misiniz?";
    $lang['del_javascript_task_sprt']   = "Bu iþlem %s görevini silecek. Emin misiniz?";
    $lang['add_task']                   = "Görev ekle";
    $lang['add_subtask']                = "Alt görev ekle";
    $lang['add_project']                = "Proje ekle";
    $lang['clone_project']              = "Projeyi klonla";
    $lang['clone_task']                 = "Görevi klonla";
    $lang['quick_jump']                 = "Hýzlý menü";
    $lang['no_edit']                    = "Bu ögenin sahibi deðilsiniz ve onu deðiþtiremezsiniz";
    $lang['global']                     = "Genel";
    $lang['delete_project']             = "Projeyi sil";
    $lang['delete_task']                = "Görevi sil";
    $lang['project_options']            = "Proje seçenekleri";
    $lang['task_options']               = "Görev seçenekleri";
    $lang['javascript_archive_project'] = "Bu iþlem %s projesini arþive kaldýracak. Emin misiniz?";
    $lang['archive_project']            = "Projeyi arþive kaldýr";
    $lang['task_navigation']            = "Görev navigasyon";
    $lang['new_task']                   = "Yeni görev";
    $lang['no_projects']                = "Bakýlacak proje yok";
    $lang['show_all_projects']          = "Tüm projeleri göster";
    $lang['show_active_projects']       = "Sadece aktif projeleri göster";
    $lang['project_hold_sprt']          = "Duraklatýlmýþ proje: %s";
    $lang['project_planned']            = "Planlanmýþ proje";
    $lang['percent_sprt']               = "Görevlerin %d%% bölümü bitti";
    $lang['project_no_deadline']        = "Bu proje için son bitiþ tarihi belirlenmemiþ";
    $lang['no_allowed_projects']        = "Sizin bakma yetkiniz olan proje yok";
    $lang['projects']                   = "Projeler";
    $lang['percent_project_sprt']       = "Bu proje %d%% oranýnda tamamlandý";
    $lang['owned_by']                   = "Sahibi";
    $lang['created_on']                 = "Yaratýldýðý tarih";
    $lang['completed_on']               = "Tamamlandýðý tarih";
    $lang['modified_on']                = "Deðiþtirildiði tarih";
    $lang['project_on_hold']            = "Proje duraklatýlmýþ durumda";
    $lang['project_accessible']         = "(Bu proje tüm kullanýcýlar tarafýndan eriþilebilir durumda)";
    $lang['task_accessible']            = "(Bu görev tüm kullanýcýlar tarafýndan eriþilebilir durumda)";
    $lang['project_not_accessible']     = "(Bu proje sadece kullanýcý grubunun üyeleri tarafýndan eriþilebilir durumda)";
    $lang['task_not_accessible']        = "(Bu görev sadece kullanýcý grubunun üyeleri tarafýndan eriþilebilir durumda)";
    $lang['project_not_in_usergroup']   = "Bu proje bir kullanýcý grubuna ait deðil ve tüm kullanýcýlar tarafýndan eriþilebilir.";
    $lang['task_not_in_usergroup']      = "Bu görev bir kullanýcý grubuna ait deðil ve tüm kullanýcýlar tarafýndan eriþilebilir.";
    $lang['usergroup_can_edit_project'] = "Bu proje kullanýcý grubunun üyeleri tarafýndan da deðiþtirilebilir.";
    $lang['usergroup_can_edit_task']    = "Bu görev kullanýcý grubunun üyeleri tarafýndan da deðiþtirilebilir.";
    $lang['i_take_it']                  = "Ben alacaðým :)";
    $lang['i_finished']                 = "Bitirdim!";
    $lang['i_dont_want']                = "Artýk onu istemiyorum";
    $lang['take_over_project']          = "Projeyi üzerine al";
    $lang['take_over_task']             = "Görevi üzerine al";
    $lang['task_info']                  = "Görev hakkýnda bilgi";
    $lang['project_details']            = "Proje detaylarý";
    $lang['todo_list_for']              = "Yapýlacaklar listesi: ";
    $lang['due_in_sprt']                = " (%d gün içinde)";
    $lang['due_tomorrow']               = " (Yarýna kadar)";
    $lang['no_assigned']                = "Bu kullanýcýya atanmýþ olan bitmemiþ görev yoktur.";
    $lang['todo_list']                  = "Yapýlacaklar listesi";
    $lang['summary_list']               = "Özet listesi";
    $lang['task_submit']                = "Görev gönder";
    $lang['not_owner']                  = "Eriþim engellendi. Ya sahibi deðilsiniz ya da yeterli yetkiniz yok";
    $lang['missing_values']             = "Yeteri kadar alana bilgi girilmedi. Lütfen geri dönün ve tekrar deneyin";
    $lang['future']                     = "Gelecek";
    $lang['flags']                      = "Bayraklar";
    $lang['owner']                      = "Sahibi";
    $lang['group']                      = "Grup";
    $lang['by_usergroup']               = " (kullanýcý grubuna göre)";
    $lang['by_taskgroup']               = " (görev grubuna göre)";
    $lang['by_deadline']                = " (son bitiþ tarihi göre)";
    $lang['by_status']                  = " (duruma göre)";
    $lang['by_owner']                   = " (sahibine göre)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Klonlanacak proje :";
    $lang['task_cloned']                = "Klonlanacak görev :";
    $lang['note_clone']                 = "Not: Görev yeni bir proje olarak klonlanacaktýr";

//bits 'n' pieces
    $lang['calendar']                   = "Takvim";
    $lang['normal_version']             = "Normal sürüm";
    $lang['print_version']              = "Yazýcý sürümü";
    $lang['condensed_view']             = "Sýkýþtýrýlmýþ görünüm";
    $lang['full_view']                  = "Tam görünüm";
    $lang['icalendar']                  = "iTakvim";

?>
