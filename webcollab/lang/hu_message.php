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

  Language files for 'hu' (Hungarian)

  Translation: Széll Tamás

  Maintainer: Széll Tamás

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "hu" );

//dates
$month_array = array (NULL, 'jan', 'feb', 'már', 'ápr', 'máj', 'jún', 'júl', 'aug', 'sze', 'okt', 'nov', 'dec' );
$week_array = array('Vas', 'Hétf', 'Kedd', 'Szer', 'Csüt', 'Pént', 'Szomb' );

//task states

 //priorities
    $task_state['dontdo']               = "Nem fontos";
    $task_state['low']                  = "Alacsony";
    $task_state['normal']               = "Normál";
    $task_state['high']                 = "Magas";
    $task_state['yesterday']            = "Tegnapra!";
 //status
    $task_state['new']                  = "Új";
    $task_state['planned']              = "Tervezett (inaktív)";
    $task_state['active']               = "Aktív (munka)";
    $task_state['cantcomplete']         = "Felfüggesztve";
    $task_state['completed']            = "Befejezve";
    $task_state['done']                 = "Kész";
    $task_state['task_planned']         = " Tervezett";
    $task_state['task_active']          = " Aktív";
 //project states
    $task_state['planned_project']      = "Tervezett projekt (inaktív)";
    $task_state['no_deadline_project']  = "Nincs határidő megszabva";
    $task_state['active_project']       = "Aktív projekt";

//common items
    $lang['description']                = "Leírás";
    $lang['name']                       = "Név";
    $lang['add']                        = "Hozzáadás";
    $lang['update']                     = "Frissítés";
    $lang['submit_changes']             = "Változások mentése";
    $lang['continue']                   = "Folytatás";
    $lang['manage']                     = "Kezelés";
    $lang['edit']                       = "Szerkesztés";
    $lang['delete']                     = "Törlés";
    $lang['del']                        = "Töröl";
    $lang['confirm_del_javascript']     = " Törlés megerősítése!";
    $lang['yes']                        = "Igen";
    $lang['no']                         = "Nem";
    $lang['action']                     = "Cselekvés";
    $lang['task']                       = "Feladat";
    $lang['tasks']                      = "Feladatok";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Info";
    $lang['bytes']                      = " byte";
    $lang['select_instruct']            = "(használja a ctrl-t a többszörös kijelöléshez; vagy a kijelölés megszüntetéséhez)";
    $lang['member_groups']              = "A felhasználó az alább kiemelt csoportok tagja (ha van ilyen)";
    $lang['login']                      = "Bejelentkezés";
    $lang['login_action']               = "Bejelentkezés";
    $lang['login_screen']               = "Bejelentkezés";
    $lang['error']                      = "Hiba";
    $lang['no_login']                   = "Belépés megtagadva; hibás felhasználói név vagy jelszó!";
    $lang['redirect_sprt']              = "Automatikusan vissza fog jutni a bejentkezéshez %d másodperc késleltetés után";
    $lang['login_now']                  = "Kattintson ide a bejelentkezéshez";
    $lang['please_login']               = "Kérem jelentkezzen be";
    $lang['go']                         = "Ugrás!";

//graphic items
    $lang['late_g']                     = "&nbsp;KÉSÉSBEN&nbsp;";
    $lang['new_g']                      = "&nbsp;ÚJ&nbsp;";
    $lang['updated_g']                  = "&nbsp;FRISSÍTETT&nbsp;";

//admin config
    $lang['admin_config']               = "Admin beállítások";
    $lang['email_settings']             = "Email fejléc beállítások";
    $lang['admin_email']                = "Admin email";
    $lang['email_reply']                = "Email 'válasz'";
    $lang['email_from']                 = "Email 'feladó'";
    $lang['mailing_list']               = "Levelező lista";
    $lang['default_checkbox']           = "Alapbeállítások a Projektek/Feladatok számára";
    $lang['allow_globalaccess']         = "Mindenki szerkesztheti?";
    $lang['allow_group_edit']           = "Felhasználói csoport minden tagja szerkesztheti?";
    $lang['set_email_owner']            = "Mindig küldjön emailt a tulajdonosnak változásokkor?";
    $lang['set_email_group']            = "Mindig küldjön emailt a felhasználói csoportnak változásokkor?";
    $lang['project_listing_order']      = "Projekt felsorolás rendezése";
    $lang['task_listing_order']         = "Feladat felsorolás rendezése";
    $lang['configuration']              = "Beállítások";

//archive
    $lang['archived_projects']          = "Archív projektek";

//contacts
    $lang['firstname']                  = "Vezetéknév:";
    $lang['lastname']                   = "Keresztnév:";
    $lang['company']                    = "Vállalat:";
    $lang['home_phone']                 = "Otthoni telefon:";
    $lang['mobile']                     = "Mobil:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Irodai telefon:";
    $lang['address']                    = "Cím:";
    $lang['postal']                     = "Irányítószám:";
    $lang['city']                       = "Város:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Megjegyzések:";
    $lang['add_contact']                = "Kapcsolat hozzáadása";
    $lang['del_contact']                = "Kapcsolat törlése";
    $lang['contact_info']               = "Kapcsolat információ";
    $lang['contacts']                   = "Kapcsolatok";
    $lang['contact_add_info']           = "Ha megadja a vállalat nevét, akkor ez lesz feltüntetve a név helyett.";
    $lang['show_contact']               = "Kapcsolatok mutatása";
    $lang['edit_contact']               = "Kapcsolatok szerkesztése";
    $lang['contact_submit']             = "Kapcsolat mentése";
    $lang['contact_warn']               = "Nincs elég adat a Kapcsolat mentéséhez, kérem lépjen vissza és adja meg a vezeték- és keresztnevét.";

 //files
    $lang['manage_files']               = "Fájlok kezelése";
    $lang['no_files']                   = "Nincsenek feltöltve kezelhető fájlok";
    $lang['no_file_uploads']            = "Az oldal szerverbeállításai nem engedik meg a fájlok feltöltését";
    $lang['file']                       = "Fájl:";
    $lang['uploader']                   = "Feltöltő:";
    $lang['files_assoc_project']        = "Fájlok a projekthez társítva";
    $lang['files_assoc_task']           = "Fájlok a feladathoz társítva";
    $lang['file_admin']                 = "Fájl admin";
    $lang['add_file']                   = "Fájl hozzáadása";
    $lang['files']                      = "Fájlok";
    $lang['file_choose']                = "Feltöltendő fájl:";
    $lang['upload']                     = "Feltöltés";
    $lang['file_email_owner']           = "Email értesítés új fájlokról a tulajdonosnak?";
    $lang['file_email_usergroup']       = "Email értesítés új fájlokról a felhasználói csoportnak?";
    $lang['max_file_sprt']              = "Feltöltendő fájl meximális mérete: %s kb.";
    $lang['file_submit']                = "Fájl beküldése";
    $lang['no_upload']                  = "Nem sikerült fájlt feltölteni.  Kérem lépjen vissza és próbálja meg újra!";
    $lang['file_too_big_sprt']          = "A maximális feltöltés %s byte.  Az Ön feltöltése túl nagy volt és törlésre került.";
    $lang['del_file_javascript_sprt']   = "Biztos benne, hogy törölni akarja: %s ?";

 //forum
    $lang['orig_message']               = "Eredeti üzenet:";
    $lang['post']                       = "Elküldés!";
    $lang['message']                    = "Üzenet:";
    $lang['post_reply_sprt']            = "Válasz küldése '%1\$s' üzenetére a következőről: '%2\$s'";
    $lang['post_message_sprt']          = "Üzenet küldése ide: '%s'";
    $lang['forum_email_owner']          = "Fórum üzenet küldése emailben a tulajdonosnak?";
    $lang['forum_email_usergroup']      = "Fórum üzenet küldése emailben a felhasználói csoportnak?";
    $lang['reply']                      = "Válasz";
    $lang['new_post']                   = "Új üzenet";
    $lang['public_user_forum']          = "Nyilvános felhasználói fórum";
    $lang['private_forum_sprt']         = "Magán fórum a '%s' felhasználói csoportnak";
    $lang['forum_submit']               = "Fórum beküldése";
    $lang['no_message']                 = "Nincs üzenet! Kérem lépjen vissza és próbálja megújra!";
    $lang['add_reply']                  = "Válasz hozzáadása";
    $lang['last_post_sprt']             = "Utolsó üzenet: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Legutóbbi fórum üzenetek";
    $lang['recent_posts']               = "Legutóbbi fórum üzenetek";
    $lang['forum_search']               = "Keresés a fórumokban";
    $lang['no_results']                 = "Nem található a megadott a kifejezés: '%s'";
    $lang['search_results']             = "A '%2\$s' kifejezésre %1\$s találat van.<br />Kilistázás a %3\$s.  elemtől a %4\$s. elemig";

 //includes
    $lang['report']                     = "Jelentés";
    $lang['warning']                    = "<h1>Sajnáljuk!</h1><p>Most nem tudjuk a kérését teljesíteni. Kérjük próbálja meg később újra!</p>";
    $lang['home_page']                  = "Kezdőlap";
    $lang['summary_page']               = "Összesítő lap";
    $lang['log_out']                    = "Kijelentkezés";
    $lang['main_menu']                  = "Főmenü";
    $lang['archive']                    = "Archívum";
    $lang['user_homepage_sprt']         = "%s oldala";
    $lang['missing_field_javascript']   = "Kérem adja mag a hiányzó mező adatait";
    $lang['invalid_date_javascript']    = "Kérem válasszon egy létező dátumot";
    $lang['finish_date_javascript']     = "A megadott dátum a projekt határidején túl van!";
    $lang['security_manager']           = "Biztonság-kezelő";
    $lang['session_timeout_sprt']       = "Hozzáférés megtagadva; az utolsó cselekmény %1\$d perce törttént és az elévülés ideje %2\$d perc; kérem <a href=\"%3\$sindex.php\">csatlakozzon újra</a>";
    $lang['access_denied']              = "Hozzáférés megtagadva";
    $lang['private_usergroup_no_access']= "Sajnálom; ez a terület egy zárt felhasználói csoporthoz tartozik és nincs engedélye.";
    $lang['invalid_date']               = "Érvénytelen dátum";
    $lang['invalid_date_sprt']          = "A %s dátum nem egy érvényes naptár-dátum (Ellenőrizze a hónap napjainak számát).<br />Kérem lépjen vissza és adjon meg egy érvényes dátumot.";


 //taskgroups
    $lang['taskgroup_name']             = "Feladatcsoport neve:";
    $lang['taskgroup_description']      = "Feladatcsoport rövid leírása:";
    $lang['add_taskgroup']              = "Feladatcsoport hozzáadása";
    $lang['add_new_taskgroup']          = "Új feladatcsoport hozzáadása";
    $lang['edit_taskgroup']             = "Feladatcsoport szerkesztése";
    $lang['taskgroup_manage']           = "Feladatcsoportok kezelése";
    $lang['no_taskgroups']              = "Nincsenek feladatcsoportok kialakítva";
    $lang['manage_taskgroups']          = "Feladatcsoportok kezelése";
    $lang['taskgroups']                 = "Feladatcsoportok";
    $lang['taskgroup_dup_sprt']         = "Már van egy '%s' feladatcsoport.  Kérem lépjen vissza és adjon meg egy új nevet.";
    $lang['info_taskgroup_manage']      = "Információk a feladatcsoport-kezeléshez";

 //usergroups
    $lang['usergroup_name']             = "Felhasználói csoport neve:";
    $lang['usergroup_description']      = "Felhasználói csoport rövid leírása:";
    $lang['members']                    = "Tagok:";
    $lang['private_usergroup']          = "Zárt felhasználói csoport";
    $lang['add_usergroup']              = "Felhasználói csoport hozzáadása";
    $lang['add_new_usergroup']          = "Új felhasználói csoport hozzáadása";
    $lang['edit_usergroup']             = "Felhasználói csoport szerkesztése";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Felhasználói csoportok kezelése";
    $lang['no_usergroups']              = "Nincsenek felhasználói csoportok kialakítva";
    $lang['manage_usergroups']          = "Felhasználói csoportok kezelése";
    $lang['usergroups']                 = "Felhasználói csoportok";
    $lang['usergroup_dup_sprt']         = "Már van egy '%s' felhasználói csoport.  Kérem lépjen vissza és adjon meg egy új nevet.";
    $lang['info_usergroup_manage']      = "Információk a felhasználói csoportkezeléshez";

 //users
    $lang['login_name']                 = "Bejelentkezési név";
    $lang['full_name']                  = "Teljes név";
    $lang['password']                   = "Jelszó";
    $lang['blank_for_current_password'] = "(Hagyja üresen, ha nem akarj megváltoztatni)";
    $lang['email']                      = "Email";
    $lang['admin']                      = "Admin";
    $lang['private_user']               = "Privát felhasználó";
    $lang['normal_user']                = "Normál felhasználó";
    $lang['is_admin']                   = "Admin jogokkal rendelkezik?";
    $lang['is_guest']                   = "Vendég jogokkal rendelkezik?";
    $lang['guest']                      = "Vendég felhasználó";
    $lang['user_info']                  = "Felhasználói információ";
    $lang['deleted_users']              = "Törölt felhasználók";
    $lang['no_deleted_users']           = "Nincsenek törölt felhasználók.";
    $lang['revive']                     = "Újraéleszt";
    $lang['permdel']                    = "Végleges törlés";
    $lang['permdel_javascript_sprt']    = "Ez véglegesen ki fogja törölni a felhasználót, valamint a feladatokat amelyeknek %s volt az elvállalója. Biztos ezt akarja?";
    $lang['add_user']                   = "Felhasználó hozzáadása";
    $lang['edit_user']                  = "Felhasználó szerksztése";
    $lang['no_users']                   = "A rendszer nem tud felhasználókról";
    $lang['users']                      = "Felhasználók";
    $lang['existing_users']             = "Létező felhasználók";
    $lang['private_profile']            = "Ennek a felhasználónak privát beállításai vannak, amiket nem nézhetsz meg.";
    $lang['private_usergroup_profile']  = "(Ez a felhasználó egy zárt felhasználói csoport tagja, amelyet nem tekinthetsz meg)";
    $lang['email_users']                = "Email küldése a felhasználóknak";
    $lang['select_usergroup']           = "Felhasználói csoport lentebb kijelölve:";
    $lang['subject']                    = "Tárgy:";
    $lang['message_sent_maillist']      = "Ez a levél minden esetben bekerül a levelezési listára.";
    $lang['who_online']                 = "Ki van itt?";
    $lang['edit_details']               = "Felhasználó részleteinek szerkesztése";
    $lang['show_details']               = "Felhasználó részleteinek mutatása";
    $lang['user_deleted']               = "Ez a felhasználó törölve van!";
    $lang['no_usergroup']               = "Ez a felhasználó nem tagja egy felhasználói csoportnak sem";
    $lang['not_usergroup']              = "(Nem tagja felhasználói csoporttnak)";
    $lang['no_password_change']         = "(A jelszavad nem változott meg)";
    $lang['last_time_here']             = "Itt járt legutóbb ekkor:";
    $lang['number_items_created']       = "Létrehozott elemek száma:";
    $lang['number_projects_owned']      = "Tulajdonolt projektek száma:";
    $lang['number_tasks_owned']         = "Tulajdonolt feladatok száma:";
    $lang['number_tasks_completed']     = "Befejezett feladatok száma:";
    $lang['number_forum']               = "Fórum üzenetek száma:";
    $lang['number_files']               = "Feltöltött fájlok száma:";
    $lang['size_all_files']             = "Összes mérete a tulajdonolt fájloknak:";
    $lang['owned_tasks']                = "Tulajdonolt feladatok";
    $lang['invalid_email']              = "Érvénytelen email cím";
    $lang['invalid_email_given_sprt']   = "A '%s' email cím érvénytelen. Kérem lépjen vissza és próbálja meg újra.";
    $lang['duplicate_user']             = "Felhasználó megkettőzése";
    $lang['duplicate_change_user_sprt'] = "A '%s' felhasználó már létezik.  Kérem lépjen vissza és adjon meg új nevet.";
    $lang['value_missing']              = "Érték hiányzik";
    $lang['field_sprt']                 = "A '%s' mező üres. Kérem lépjen vissza és adja emg az értékét.";
    $lang['admin_priv']                 = "MEGJEGYZÉS: Admin jogokat adtál.";
    $lang['manage_users']               = "Felhasználók kezelése";
    $lang['users_online']               = "Online felhasználók";
    $lang['online']                     = "Felhasználók (kevesebb mint 60 perce online)";
    $lang['not_online']                 = "A többiek";
    $lang['user_activity']              = "Felhasználó aktivitás";

  //tasks
    $lang['add_new_task']               = "Új feladat hozzáadása";
    $lang['priority']                   = "Prioritás";
    $lang['parent_task']                = "Szülő";
    $lang['creation_time']              = "Létrehozás ideje";
    $lang['by_sprt']                    = "%1\$s %2\$s által"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Projekt neve";
    $lang['task_name']                  = "Feladat neve";
    $lang['deadline']                   = "Határidő";
    $lang['taken_from_parent']          = "(Öröklés a szülőtől)";
    $lang['status']                     = "Állapot";
    $lang['task_owner']                 = "Feladat tulajdonosa";
    $lang['project_owner']              = "Projekt tulajdonosa";
    $lang['taskgroup']                  = "Feladatcsoport";
    $lang['usergroup']                  = "Felhasználói csoport";
    $lang['nobody']                     = "Senki";
    $lang['none']                       = "Egyik sem";
    $lang['no_group']                   = "Nincs csoport";
    $lang['all_groups']                 = "Minden csoport";
    $lang['all_users']                  = "Minden felhasználó";
    $lang['all_users_view']             = "Minden felhasználó láthatja ezt az elemet?";
    $lang['group_edit']                 = "Mindenki szerkesztheti a felhasználói csoportban?";
    $lang['project_description']        = "Projekt leírása";
    $lang['task_description']           = "Feladat leírása";
    $lang['email_owner']                = "Email küldése a változtatásokról a tulajdonosnak?";
    $lang['email_new_owner']            = "Email küldése a változtatásokról az (új) tulajdonosnak?";
    $lang['email_group']                = "Email küldése a változtatásokról a felhasználói csoportnak?";
    $lang['add_new_project']            = "Új projekt hozzáadása";
    $lang['uncategorised']              = "Kategorizálatlan";
    $lang['due_sprt']                   = "%d napra mostantól";
    $lang['tomorrow']                   = "Holnapra";
    $lang['due_today']                  = "Mára";
    $lang['overdue_1']                  = "1 nappal későbbre";
    $lang['overdue_sprt']               = "%d nappal későbbre";
    $lang['edit_task']                  = "Feladat szerkesztése";
    $lang['edit_project']               = "Projekt szerkesztése";
    $lang['no_reparent']                = "Egyik sem (egy felső szintű projekt)";
    $lang['del_javascript_project_sprt']= "Kitörlöd ezt a projektet: %s. Biztos benne?";
    $lang['del_javascript_task_sprt']   = "Kitörlöd ezt a feladatot: %s. Biztos benne?";
    $lang['add_task']                   = "Feladat hozzáadása";
    $lang['add_subtask']                = "Alfeladat hozzáadása";
    $lang['add_project']                = "Projekt hozzáadása";
    $lang['clone_project']              = "Projekt klónozása";
    $lang['clone_task']                 = "Feladat klónozása";
    $lang['quick_jump']                 = "Gyors ugrás";
    $lang['no_edit']                    = "Nem vagy az elem tulajdonosa, ezértt nem szerkesztheted";
    $lang['global']                     = "Általános";
    $lang['delete_project']             = "Projekt törlése";
    $lang['delete_task']                = "Feladat törlése";
    $lang['project_options']            = "Projekt beállításai";
    $lang['task_options']               = "Feladat beállításai";
    $lang['javascript_archive_project'] = "Ez archiválni fogja a következő projektet: %s.  Biztos benne?";
    $lang['archive_project']            = "Projekt archiválása";
    $lang['task_navigation']            = "Feladatok közti navigáció";
    $lang['new_task']                   = "Új feladat";
    $lang['no_projects']                = "Nincs megjelenítendő projekt";
    $lang['show_all_projects']          = "Minden projekt mutatása";
    $lang['show_active_projects']       = "Csak az aktív projektek mutatása";
    $lang['project_hold_sprt']          = "Projekt felfüggesztése ettől: %s";
    $lang['project_planned']            = "Tervezett projekt";
    $lang['percent_sprt']               = "A feladatoknak %d%%-a kész";
    $lang['project_no_deadline']        = "Nincs határidő megadva ehhez a projekthez";
    $lang['no_allowed_projects']        = "Nincs olyan projekt, amelyet engedélye van megtekinteni";
    $lang['projects']                   = "Projektek";
    $lang['percent_project_sprt']       = "Ez a projekt %d%%-ban be van fejezve";
    $lang['owned_by']                   = "Tulajdonosa";
    $lang['created_on']                 = "Létrehozója";
    $lang['completed_on']               = "Befejezve";
    $lang['modified_on']                = "Módosítva";
    $lang['project_on_hold']            = "Projekt felfüggesztve";
    $lang['project_accessible']         = "(Ez a projekt nyilvánosan elérhető minden felhasználó által)";
    $lang['task_accessible']            = "(Ez a feladat nyilvánosan elérhető minden felhasználó által)";
    $lang['project_not_accessible']     = "(Ez a projekt csak a felhasználói csoport tagjai számára elérhető)";
    $lang['task_not_accessible']        = "(Ez a feladat csak a felhasználói csoport tagjai számára elérhető)";
    $lang['project_not_in_usergroup']   = "Ez a projekt nem része felhasználói csoportnak és minden felhasználó elérheti.";
    $lang['task_not_in_usergroup']      = "Ez a feladat nem része felhasználói csoportnak és minden felhasználó elérheti.";
    $lang['usergroup_can_edit_project'] = "Ezt a projektet a felhasználói csoport tagjai is szerkeszthetik.";
    $lang['usergroup_can_edit_task']    = "Ezt a feladatot a felhasználói csoport tagjai is szerkeszthetik.";
    $lang['i_take_it']                  = "Elvállalom! :)";
    $lang['i_finished']                 = "Befejeztem!";
    $lang['i_dont_want']                = "Nem akarok tovább dolgozni rajta!";
    $lang['take_over_project']          = "Projekt átvétele";
    $lang['take_over_task']             = "Feladat átvétele";
    $lang['task_info']                  = "Feladat információk";
    $lang['project_details']            = "Projekt részletek";
    $lang['todo_list_for']              = "ToDo lista ehhez: ";
    $lang['due_in_sprt']                = " (%d napra)";
    $lang['due_tomorrow']               = " (holnapra)";
    $lang['no_assigned']                = "Nincsenek befejezetlen feladatok ehhez a felhasználóhoz társítva.";
    $lang['todo_list']                  = "ToDo lista";
    $lang['summary_list']               = "Összesítő lista";
    $lang['task_submit']                = "Feladat bejegyzése";
    $lang['not_owner']                  = "Hozzáférés megtagadva. Vagy nem Ön a tulajdonos; vagy csak nincsen jogosultsága!";
    $lang['missing_values']             = "Nincs elég mező kitöltve, kérem lépjen vissza és töltse ki őket!";
    $lang['future']                     = "Jövő";
    $lang['flags']                      = "Zászlók";
    $lang['owner']                      = "Tulajdonos";
    $lang['group']                      = "Csoport";
    $lang['by_usergroup']               = " (felhasználói csoport által)";
    $lang['by_taskgroup']               = " (feladatcsoport által)";
    $lang['by_deadline']                = " (határidő által)";
    $lang['by_status']                  = " (állapot által)";
    $lang['by_owner']                   = " (tulajdonos által)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Klónozandó projekt :";
    $lang['task_cloned']                = "Klónozandó feladat :";
    $lang['note_clone']                 = "Megjegyzés: A feladat egy új projektként lesz klónozva";

//bits 'n' pieces
    $lang['calendar']                   = "Naptár";
    $lang['normal_version']             = "Alap verzió";
    $lang['print_version']              = "Nyomtatható verzió";
    $lang['condensed_view']             = "Áttekintő nézet";
    $lang['full_view']                  = "Részletes nézet";
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>
