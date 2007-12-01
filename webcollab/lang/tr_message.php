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
$month_array = array (NULL, 'Oca', '�ub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'A�u', 'Eyl', 'Eki', 'Kas', 'Ara' );
$week_array = array('Paz', 'Pts', 'Sal', '�ar', 'Per', 'Cum', 'Cts' );

//task states

 //priorities
    $task_state['dontdo']               = "Yapma";
    $task_state['low']                  = "D���k";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "Y�ksek";
    $task_state['yesterday']            = "D�n!";
 //status
    $task_state['new']                  = "Yeni";
    $task_state['planned']              = "Planlanm�� (etkin de�il)";
    $task_state['active']               = "Etkin (�zerinde �al���l�yor)";
    $task_state['cantcomplete']         = "Duraklat�ld�";
    $task_state['completed']            = "Tamamland�";
    $task_state['done']                 = "Bitti";
    $task_state['task_planned']         = " Planlanm��";
    $task_state['task_active']          = " Etkin";
 //project states
    $task_state['planned_project']      = "Planlanm�� proje (etkin de�il)";
    $task_state['no_deadline_project']  = "Son biti� tarihi belirlenmemi�";
    $task_state['active_project']       = "Etkin proje";

//common items
    $lang['description']                = "Tan�m";
    $lang['name']                       = "Ad";
    $lang['add']                        = "Ekle";
    $lang['update']                     = "G�ncelle";
    $lang['submit_changes']             = "De�i�iklikleri onayla";
    $lang['continue']                   = "Devam et";
    $lang['manage']                     = "Y�net";
    $lang['edit']                       = "De�i�tir";
    $lang['delete']                     = "Sil";
    $lang['del']                        = "Sil";
    $lang['confirm_del_javascript']     = " Silme i�lemini onayla!";
    $lang['yes']                        = "Evet";
    $lang['no']                         = "Hay�r";
    $lang['action']                     = "Eylem";
    $lang['task']                       = "G�rev";
    $lang['tasks']                      = "G�revler";
    $lang['project']                    = "Proje";
    $lang['info']                       = "Bilgi";
    $lang['bytes']                      = " bayt";
    $lang['select_instruct']            = "(Daha fazla se�mek ya da hi�birini se�memek i�in ctrl tu�unu kullan�n)";
    $lang['member_groups']              = "Kullan�c� a�a��da belirtilen gruplara �yedir (e�er varsa)";
    $lang['login']                      = "Kullan�c� ad�"; // user name
    $lang['login_action']               = "Sisteme gir";
    $lang['login_screen']               = "Giri�";
    $lang['error']                      = "Hata";
    $lang['no_login']                   = "L�tfen sisteme girin";
    $lang['redirect_sprt']              = "%d saniye sonra otomatik olarak sisteme giri� sayfas�na d�neceksiniz";
    $lang['login_now']                  = "Sisteme giri� sayfas�na �imdi d�nmek i�in l�tfen buraya t�klay�n";
    $lang['please_login']               = "L�tfen sisteme girin";
    $lang['go']                         = "Git!";

//graphic items
    $lang['late_g']                     = "&nbsp;GEC�KM��&nbsp;";
    $lang['new_g']                      = "&nbsp;YEN�&nbsp;";
    $lang['updated_g']                  = "&nbsp;G�NCELLENM��&nbsp;";

//admin config
    $lang['admin_config']               = "Y�netici tan�mlar�";
    $lang['email_settings']             = "Eposta ba�l�k ayarlar�";
    $lang['admin_email']                = "Y�netici epostas�";
    $lang['email_reply']                = "Eposta 'kime yan�tla'";
    $lang['email_from']                 = "Eposta 'kimden'";
    $lang['mailing_list']               = "Eposta listesi";
    $lang['default_checkbox']           = "Projeler/G�revler i�in varsay�lan checkbox ayarlar�";
    $lang['allow_globalaccess']         = "Genel eri�ime izin ver?";
    $lang['allow_group_edit']           = "Kullan�c� grubundaki herkesin de�i�tirmesine izin ver?";
    $lang['set_email_owner']            = "Sahibine de�i�iklikleri her zaman epostayla haber ver?";
    $lang['set_email_group']            = "Kullan�c� grubuna de�i�iklikleri her zaman epostayla haber ver?";
    $lang['project_listing_order']      = "Proje listeleme s�ras�";
    $lang['task_listing_order']         = "G�rev listeleme s�ras�";
    $lang['configuration']              = "Tan�mlamalar";

//archive
    $lang['archived_projects']          = "Ar�ivlenmi� projeler";

//contacts
    $lang['firstname']                  = "Ad:";
    $lang['lastname']                   = "Soyad:";
    $lang['company']                    = "�irket:";
    $lang['home_phone']                 = "Ev telefonu:";
    $lang['mobile']                     = "Cep:";
    $lang['fax']                        = "Faks:";
    $lang['bus_phone']                  = "�� telefonu:";
    $lang['address']                    = "Adres:";
    $lang['postal']                     = "Posta kodu";
    $lang['city']                       = "�l:";
    $lang['email_contact']              = "Eposta:";
    $lang['notes']                      = "Notlar:";
    $lang['add_contact']                = "Ki�i ekle";
    $lang['del_contact']                = "Ki�i sil";
    $lang['contact_info']               = "Bilgi";
    $lang['contacts']                   = "Ki�iler";
    $lang['contact_add_info']           = "E�er �irket ad�n� girerseniz kullan�c� ad� yerine bu g�r�nt�lenecektir.";
    $lang['show_contact']               = "Ki�ileri g�ster";
    $lang['edit_contact']               = "Ki�ileri de�i�tir";
    $lang['contact_submit']             = "Ki�i onayla";
    $lang['contact_warn']               = "Ki�i eklemek i�in yeterli say�da bilgi yok. L�tfen geri d�n�n ve en az�ndan ad ve soyad girin";

 //files
    $lang['manage_files']               = "Dosyalar� y�net";
    $lang['no_files']                   = "Y�netilecek y�klenmi� dosya yok";
    $lang['no_file_uploads']            = "Bu sitenin sunucu tan�mlamalar� dosya y�klenmesine izin vermiyor";
    $lang['file']                       = "Dosya:";
    $lang['uploader']                   = "Y�kleyici:";
    $lang['files_assoc_project']        = "Bu projeyle ilgili dosyalar";
    $lang['files_assoc_task']           = "Bu g�revle ilgili dosyalar";
    $lang['file_admin']                 = "Dosya y�neticisi";
    $lang['add_file']                   = "Dosya ekle";
    $lang['files']                      = "Dosyalar";
    $lang['file_choose']                = "Y�klenecek dosya:";
    $lang['upload']                     = "Y�kle";
    $lang['file_email_owner']           = "Sahibini yeni dosyadan epostayla haberdar et?";
    $lang['file_email_usergroup']       = "Kullan�c� grubunu yeni dosyadan epostayla haberdar et?";
    $lang['max_file_sprt']              = "Y�klenecek dosyan�n boyutu %s kb'tan az olmal�.";
    $lang['file_submit']                = "Dosya onayla";
    $lang['no_upload']                  = "Hi� dosya y�klenmedi. L�tfen geri d�n�n ve tekrar deneyin.";
    $lang['file_too_big_sprt']          = "En fazla %s bayt y�kleyebilirsiniz. Dosyan�z fazla b�y�kt� ve silindi.";
    $lang['del_file_javascript_sprt']   = "%s dosyas�n� silmek istedi�inizden emin misiniz?";

 //forum
    $lang['orig_message']               = "Orijinal mesaj:";
    $lang['post']                       = "G�nder!";
    $lang['message']                    = "Mesaj:";
    $lang['post_reply_sprt']            = "'%1\$s' kullan�c�s�ndan gelen '%2\$s' '%2\$s' konulu mesaja yan�t g�nder";
    $lang['post_message_sprt']          = "'%s': bu kullan�c�ya mesaj g�nder";
    $lang['forum_email_owner']          = "Forum mesaj�n� sahibine epostayla g�nder?";
    $lang['forum_email_usergroup']      = "Forum mesaj�n� kullan�c� grubuna epostayla g�nder?";
    $lang['reply']                      = "Yan�tla";
    $lang['new_post']                   = "Yeni mesaj";
    $lang['public_user_forum']          = "Genel kullan�c� forumu";
    $lang['private_forum_sprt']         = "'%s' kullan�c� grubu i�in �zel forum";
    $lang['forum_submit']               = "Forum onayla";
    $lang['no_message']                 = "Mesaj yok! L�tfen geri d�n�n ve tekrar deneyin";
    $lang['add_reply']                  = "Yan�t ekle";
    $lang['last_post_sprt']             = "Son mesaj: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Yak�n zamanda g�nderilmi� forum mesajlar�";
    $lang['forum_search']               = "Forum arama";
    $lang['no_results']                 = "'%s' i�in sonu� bulunamad�";
    $lang['search_results']             = "'%2\$s' i�in %1\$s sonu� bulundu<br />%3\$s - %4\$s aras�ndaki sonu�lar g�r�nt�leniyor";

 //includes
    $lang['report']                     = "Rapor";
    $lang['warning']                    = "<h1>�z�r dileriz!</h1><p>�u anda iste�inizi yerine getiremiyoruz. L�tfen daha sonra tekrar deneyin.</p>";
    $lang['home_page']                  = "Ana sayfa";
    $lang['summary_page']               = "�zet sayfa";
    $lang['log_out']                    = "Sistemden ��k";
    $lang['main_menu']                  = "Ana men�";
    $lang['archive']                    = "Ar�iv";
    $lang['user_homepage_sprt']         = "kullan�c� ana sayfas�: %s";
    $lang['missing_field_javascript']   = "L�tfen eksik alana bir de�er girin";
    $lang['invalid_date_javascript']    = "L�tfen ge�erli bir tarih se�in";
    $lang['finish_date_javascript']     = "Girilen tarih proje biti� tarihinden daha sonraya denk geliyor!";
    $lang['security_manager']           = "G�venlik y�neticisi";
    $lang['session_timeout_sprt']       = "Eri�im engellendi; son eylem %1\$d dakika �nceydi ve zaman a��m� %2\$d dakika olarak belirlenmi� durumda. L�tfen yeniden <a href=\"%3\$sindex.php\">sisteme girin</a>";
    $lang['access_denied']              = "Eri�im engellendi";
    $lang['private_usergroup_no_access']= "�z�r dileriz; bu alan �zel bir kullan�c� grubundad�r ve eri�im izniniz yok.";
    $lang['invalid_date']               = "Ge�ersiz tarih";
    $lang['invalid_date_sprt']          = "%s ge�erli bir tarih de�il (ay i�indeki g�n adedini kontrol edin).<br />L�tfen geri d�n�n ve ge�erli bir tarih girin.";

 //taskgroups
    $lang['taskgroup_name']             = "G�rev grubu ad�:";
    $lang['taskgroup_description']      = "G�rev grubu basit tan�m:";
    $lang['add_taskgroup']              = "G�rev grubu ekle";
    $lang['add_new_taskgroup']          = "Yeni bir g�rev grubu ekle";
    $lang['edit_taskgroup']             = "G�rev grubunu de�i�tir";
    $lang['taskgroup_manage']           = "G�rev grubu y�netimi";
    $lang['no_taskgroups']              = "Hi�bir g�rev grubu belirlenmedi";
    $lang['manage_taskgroups']          = "G�rev gruplar�n� y�net";
    $lang['taskgroups']                 = "G�rev gruplar�";
    $lang['taskgroup_dup_sprt']         = "'%s' ad�nda bir g�rev grubu zaten var.  L�tfen geri d�n�n ve yeni bir ad se�in.";
    $lang['info_taskgroup_manage']      = "G�rev grubu y�netimi i�in bilgi";

 //usergroups
    $lang['usergroup_name']             = "Kullan�c� grubu ad�:";
    $lang['usergroup_description']      = "Kullan�c� grubu basit tan�m:";
    $lang['members']                    = "�yeler:";
    $lang['private_usergroup']          = "�zel kullan�c� grubu";
    $lang['add_usergroup']              = "Kullan�c� grubu ekle";
    $lang['add_new_usergroup']          = "Yeni bir kullan�c� grubu ekle";
    $lang['edit_usergroup']             = "Kullan�c� grubu de�i�tir";
    $lang['usergroup_manage']           = "Kullan�c� grubu y�netimi";
    $lang['no_usergroups']              = "Hi�bir kullan�c� grubu belirlenmedi";
    $lang['manage_usergroups']          = "Kullan�c� gruplar�n� y�net";
    $lang['usergroups']                 = "Kullan�c� gruplar�";
    $lang['usergroup_dup_sprt']         = "'%s' ad�nda bir kullan�c� grubu zaten var. L�tfen geri d�n�n ve yeni bir ad se�in.";
    $lang['info_usergroup_manage']      = "Kullan�c� grubu y�netimi i�in bilgi";

 //users
    $lang['login_name']                 = "Kullan�c� ad�";
    $lang['full_name']                  = "Tam ad";
    $lang['password']                   = "�ifre";
    $lang['blank_for_current_password'] = "(Mevcut �ifrenizi kullanmak istiyorsan�z bo� b�rak�n)";
    $lang['email']                      = "Eposta";
    $lang['admin']                      = "Y�netici";
    $lang['private_user']               = "�zel kullan�c�";
    $lang['normal_user']                = "Normal kullan�c�";
    $lang['is_admin']                   = "Y�netici mi?";
    $lang['is_guest']                   = "Misafir mi?";
    $lang['guest']                      = "Misafir kullan�c�";
    $lang['user_info']                  = "Kullan�c� hakk�nda bilgi";
    $lang['deleted_users']              = "Kullan�c�lar� sil";
    $lang['no_deleted_users']           = "Silinen kullan�c� yok.";
    $lang['revive']                     = "Yeniden canland�r";
    $lang['permdel']                    = "Silmeye izin ver";
    $lang['permdel_javascript_sprt']    = "Bu i�lem kullan�c�n�n t�m kay�tlar�n� ve %s ile ilgili g�revleri kal�c� olarak silecek. Bunu ger�ekten yapmak istiyor musunuz?";
    $lang['add_user']                   = "Kullan�c� ekle";
    $lang['edit_user']                  = "Kullan�c� de�i�tir";
    $lang['no_users']                   = "Sistemde tan�ml� kullan�c� yok";
    $lang['users']                      = "Kullan�c�lar";
    $lang['existing_users']             = "Mevcut kullan�c�lar";
    $lang['private_profile']            = "Bu kullan�c�n�n profili �zeldir ve siz bakamazs�n�z.";
    $lang['private_usergroup_profile']  = "(Bu kullan�c� �zel kullan�c� gruplar�n�n �yesidir ve siz bakamazs�n�z)";
    $lang['email_users']                = "Eposta kullan�c�lar�";
    $lang['select_usergroup']           = "A�a��dan se�ilmi� kullan�c� grubu:";
    $lang['subject']                    = "Konu:";
    $lang['message_sent_maillist']      = "Her durumda mesaj ayn� zamanda postalama listesine de kopyalan�r.";
    $lang['who_online']                 = "Kim online?";
    $lang['edit_details']               = "Kullan�c� detaylar�n� de�i�tir";
    $lang['show_details']               = "Kullan�c� detaylar�n� g�ster";
    $lang['user_deleted']               = "Kullan�c� silindi!";
    $lang['no_usergroup']               = "Bu kullan�c� hi�bir kullan�c� grubunun �yesi de�il";
    $lang['not_usergroup']              = "(Hi�bir kullan�c� grubunun �yesi de�il)";
    $lang['no_password_change']         = "(Mevcut �ifreniz de�i�medi)";
    $lang['last_time_here']             = "En son burada g�r�ld��� zaman:";
    $lang['number_items_created']       = "Yaratt��� �ge adedi:";
    $lang['number_projects_owned']      = "Sahip oldu�u proje adedi:";
    $lang['number_tasks_owned']         = "Sahip oldu�u g�rev adedi:";
    $lang['number_tasks_completed']     = "Bitirdi�i g�rev adedi:";
    $lang['number_forum']               = "Forum mesaj� adedi:";
    $lang['number_files']               = "Y�kledi�i dosya adedi:";
    $lang['size_all_files']             = "Sahip oldu�u dosyalar�n toplam boyutu:";
    $lang['owned_tasks']                = "Sahip oldu�u g�revler";
    $lang['invalid_email']              = "Ge�ersiz eposta adresi";
    $lang['invalid_email_given_sprt']   = "'%s' eposta adresi ge�ersizdir.  L�tfen geri d�n�n ve yeniden deneyin.";
    $lang['duplicate_user']             = "�ift kullan�c�";
    $lang['duplicate_change_user_sprt'] = "'%s' kullan�c�s� zaten var.  L�tfen geri d�n�n ve ad�n� de�i�tirin.";
    $lang['value_missing']              = "Eksik de�er";
    $lang['field_sprt']                 = "'%s' i�in alan eksik girilmi�. L�tfen geri d�n�n ve doldurun.";
    $lang['admin_priv']                 = "NOT: Size y�netici yetkileri verilmi�tir.";
    $lang['manage_users']               = "Kullan�c�lar� y�net";
    $lang['users_online']               = "Online kullan�c�lar";
    $lang['online']                     = "�etin ceviz s�rf��ler (60 dakikadan daha az bir s�re �nce online olanlar)";
    $lang['not_online']                 = "Geri kalan";
    $lang['user_activity']              = "Kullan�c� eylemleri";

  //tasks
    $lang['add_new_task']               = "Yeni bir g�rev ekle";
    $lang['priority']                   = "�ncelik";
    $lang['parent_task']                = "�st seviye";
    $lang['creation_time']              = "Yarat�lma tarihi";
    $lang['by_sprt']                    = "%2\$s taraf�ndan %1\$s tarihinde"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Proje ad�";
    $lang['task_name']                  = "G�rev ad�";
    $lang['deadline']                   = "Son biti� tarihi";
    $lang['taken_from_parent']          = "(�st seviyeden al�nm��)";
    $lang['status']                     = "Durum";
    $lang['task_owner']                 = "G�rev sahibi";
    $lang['project_owner']              = "Proje sahibi";
    $lang['taskgroup']                  = "G�rev grubu";
    $lang['usergroup']                  = "Kullan�c� grubu";
    $lang['nobody']                     = "Hi�kimse";
    $lang['none']                       = "Yok";
    $lang['no_group']                   = "Grup yok";
    $lang['all_groups']                 = "T�m gruplar";
    $lang['all_users']                  = "T�m kullan�c�lar";
    $lang['all_users_view']             = "T�m kullan�c�lar bu �geyi g�rebilir mi?";
    $lang['group_edit']                 = "Kullan�c� grubundaki herkes de�i�tirebilir mi?";
    $lang['project_description']        = "Proje tan�m�";
    $lang['task_description']           = "G�rev tan�m�";
    $lang['email_owner']                = "Sahibine de�i�iklikleri bildiren bir eposta g�nderilsin mi?";
    $lang['email_new_owner']            = "(Yeni) sahibine de�i�iklikleri bildiren bir eposta g�nderilsin mi?";
    $lang['email_group']                = "Kullan�c� grubuna de�i�iklikleri bildiren bir eposta g�nderilsin mi?";
    $lang['add_new_project']            = "Yeni bir proje ekle";
    $lang['uncategorised']              = "Kategoriye sokulmam��";
    $lang['due_sprt']                   = "%d g�n i�inde";
    $lang['tomorrow']                   = "Yar�n";
    $lang['due_today']                  = "En son bug�n";
    $lang['overdue_1']                  = "1 g�n gecikmeli";
    $lang['overdue_sprt']               = "%d g�n gecikmeli";
    $lang['edit_task']                  = "G�revi de�i�tir";
    $lang['edit_project']               = "Projeyi de�i�tir";
    $lang['no_reparent']                = "Yok (en �st seviye proje)";
    $lang['del_javascript_project_sprt']= "Bu i�lem %s projesini silecek. Emin misiniz?";
    $lang['del_javascript_task_sprt']   = "Bu i�lem %s g�revini silecek. Emin misiniz?";
    $lang['add_task']                   = "G�rev ekle";
    $lang['add_subtask']                = "Alt g�rev ekle";
    $lang['add_project']                = "Proje ekle";
    $lang['clone_project']              = "Projeyi klonla";
    $lang['clone_task']                 = "G�revi klonla";
    $lang['quick_jump']                 = "H�zl� men�";
    $lang['no_edit']                    = "Bu �genin sahibi de�ilsiniz ve onu de�i�tiremezsiniz";
    $lang['global']                     = "Genel";
    $lang['delete_project']             = "Projeyi sil";
    $lang['delete_task']                = "G�revi sil";
    $lang['project_options']            = "Proje se�enekleri";
    $lang['task_options']               = "G�rev se�enekleri";
    $lang['javascript_archive_project'] = "Bu i�lem %s projesini ar�ive kald�racak. Emin misiniz?";
    $lang['archive_project']            = "Projeyi ar�ive kald�r";
    $lang['task_navigation']            = "G�rev navigasyon";
    $lang['new_task']                   = "Yeni g�rev";
    $lang['no_projects']                = "Bak�lacak proje yok";
    $lang['show_all_projects']          = "T�m projeleri g�ster";
    $lang['show_active_projects']       = "Sadece aktif projeleri g�ster";
    $lang['project_hold_sprt']          = "Duraklat�lm�� proje: %s";
    $lang['project_planned']            = "Planlanm�� proje";
    $lang['percent_sprt']               = "G�revlerin %d%% b�l�m� bitti";
    $lang['project_no_deadline']        = "Bu proje i�in son biti� tarihi belirlenmemi�";
    $lang['no_allowed_projects']        = "Sizin bakma yetkiniz olan proje yok";
    $lang['projects']                   = "Projeler";
    $lang['percent_project_sprt']       = "Bu proje %d%% oran�nda tamamland�";
    $lang['owned_by']                   = "Sahibi";
    $lang['created_on']                 = "Yarat�ld��� tarih";
    $lang['completed_on']               = "Tamamland��� tarih";
    $lang['modified_on']                = "De�i�tirildi�i tarih";
    $lang['project_on_hold']            = "Proje duraklat�lm�� durumda";
    $lang['project_accessible']         = "(Bu proje t�m kullan�c�lar taraf�ndan eri�ilebilir durumda)";
    $lang['task_accessible']            = "(Bu g�rev t�m kullan�c�lar taraf�ndan eri�ilebilir durumda)";
    $lang['project_not_accessible']     = "(Bu proje sadece kullan�c� grubunun �yeleri taraf�ndan eri�ilebilir durumda)";
    $lang['task_not_accessible']        = "(Bu g�rev sadece kullan�c� grubunun �yeleri taraf�ndan eri�ilebilir durumda)";
    $lang['project_not_in_usergroup']   = "Bu proje bir kullan�c� grubuna ait de�il ve t�m kullan�c�lar taraf�ndan eri�ilebilir.";
    $lang['task_not_in_usergroup']      = "Bu g�rev bir kullan�c� grubuna ait de�il ve t�m kullan�c�lar taraf�ndan eri�ilebilir.";
    $lang['usergroup_can_edit_project'] = "Bu proje kullan�c� grubunun �yeleri taraf�ndan da de�i�tirilebilir.";
    $lang['usergroup_can_edit_task']    = "Bu g�rev kullan�c� grubunun �yeleri taraf�ndan da de�i�tirilebilir.";
    $lang['i_take_it']                  = "Ben alaca��m :)";
    $lang['i_finished']                 = "Bitirdim!";
    $lang['i_dont_want']                = "Art�k onu istemiyorum";
    $lang['take_over_project']          = "Projeyi �zerine al";
    $lang['take_over_task']             = "G�revi �zerine al";
    $lang['task_info']                  = "G�rev hakk�nda bilgi";
    $lang['project_details']            = "Proje detaylar�";
    $lang['todo_list_for']              = "Yap�lacaklar listesi: ";
    $lang['due_in_sprt']                = " (%d g�n i�inde)";
    $lang['due_tomorrow']               = " (Yar�na kadar)";
    $lang['no_assigned']                = "Bu kullan�c�ya atanm�� olan bitmemi� g�rev yoktur.";
    $lang['todo_list']                  = "Yap�lacaklar listesi";
    $lang['summary_list']               = "�zet listesi";
    $lang['task_submit']                = "G�rev g�nder";
    $lang['not_owner']                  = "Eri�im engellendi. Ya sahibi de�ilsiniz ya da yeterli yetkiniz yok";
    $lang['missing_values']             = "Yeteri kadar alana bilgi girilmedi. L�tfen geri d�n�n ve tekrar deneyin";
    $lang['future']                     = "Gelecek";
    $lang['flags']                      = "Bayraklar";
    $lang['owner']                      = "Sahibi";
    $lang['group']                      = "Grup";
    $lang['by_usergroup']               = " (kullan�c� grubuna g�re)";
    $lang['by_taskgroup']               = " (g�rev grubuna g�re)";
    $lang['by_deadline']                = " (son biti� tarihi g�re)";
    $lang['by_status']                  = " (duruma g�re)";
    $lang['by_owner']                   = " (sahibine g�re)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Klonlanacak proje :";
    $lang['task_cloned']                = "Klonlanacak g�rev :";
    $lang['note_clone']                 = "Not: G�rev yeni bir proje olarak klonlanacakt�r";

//bits 'n' pieces
    $lang['calendar']                   = "Takvim";
    $lang['normal_version']             = "Normal s�r�m";
    $lang['print_version']              = "Yaz�c� s�r�m�";
    $lang['condensed_view']             = "S�k��t�r�lm�� g�r�n�m";
    $lang['full_view']                  = "Tam g�r�n�m";
    $lang['icalendar']                  = "iTakvim";

?>
