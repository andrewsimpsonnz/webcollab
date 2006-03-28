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

  Translation: Sz�ll Tam�s

  Maintainer: Sz�ll Tam�s

  NOTE: This file is written in ISO-8859-2 character set

*/

//required language encodings
define('CHARACTER_SET', 'ISO-8859-2' );

//this is the regex for input validation filter used in common.php 
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/"; //ISO-8859-x

//dates
$month_array = array (NULL, 'jan', 'feb', 'm�r', '�pr', 'm�j', 'j�n', 'j�l', 'aug', 'sze', 'okt', 'nov', 'dec' );
$week_array = array('Vas', 'H�tf', 'Kedd', 'Szer', 'Cs�t', 'P�nt', 'Szomb' );

//task states

 //priorities
    $task_state['dontdo']               = "Nem fontos";
    $task_state['low']                  = "Alacsony";
    $task_state['normal']               = "Norm�l";
    $task_state['high']                 = "Magas";
    $task_state['yesterday']            = "Tegnapra!";
 //status
    $task_state['new']                  = "�j";
    $task_state['planned']              = "Tervezett (inakt�v)";
    $task_state['active']               = "Akt�v (munka)";
    $task_state['cantcomplete']         = "Felf�ggesztve";
    $task_state['completed']            = "Befejezve";
    $task_state['done']                 = "K�sz";
    $task_state['task_planned']         = " Tervezett";
    $task_state['task_active']          = " Akt�v";
 //project states
    $task_state['planned_project']      = "Tervezett projekt (inakt�v)";
    $task_state['no_deadline_project']  = "Nincs hat�rid� megszabva";
    $task_state['active_project']       = "Akt�v projekt";

//common items
    $lang['description']                = "Le�r�s";
    $lang['name']                       = "N�v";
    $lang['add']                        = "Hozz�ad�s";
    $lang['update']                     = "Friss�t�s";
    $lang['submit_changes']             = "V�ltoz�sok ment�se";
    $lang['continue']                   = "Folytat�s";
    $lang['reset']                      = "Visszat�r�s";
    $lang['manage']                     = "Kezel�s";
    $lang['edit']                       = "Szerkeszt�s";
    $lang['delete']                     = "T�rl�s";
    $lang['del']                        = "T�r�l";
    $lang['confirm_del_javascript']     = " T�rl�s meger�s�t�se!";
    $lang['yes']                        = "Igen";
    $lang['no']                         = "Nem";
    $lang['action']                     = "Cselekv�s";
    $lang['task']                       = "Feladat";
    $lang['tasks']                      = "Feladatok";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Info";
    $lang['bytes']                      = " byte";
    $lang['select_instruct']            = "(haszn�lja a ctrl-t a t�bbsz�r�s kijel�l�shez; vagy a kijel�l�s megsz�ntet�s�hez)";
    $lang['member_groups']              = "A felhaszn�l� az al�bb kiemelt csoportok tagja (ha van ilyen)";
    $lang['login']                      = "Bejelentkez�s";
    $lang['login_action']               = "Bejelentkez�s";
    $lang['error']                      = "Hiba";
    $lang['no_login']                   = "Bel�p�s megtagadva; hib�s felhaszn�l�i n�v vagy jelsz�!";
    $lang['redirect_sprt']              = "Automatikusan vissza fog jutni a bejentkez�shez %d m�sodperc k�sleltet�s ut�n";
    $lang['login_now']                  = "Kattintson ide a bejelentkez�shez";
    $lang['please_login']               = "K�rem jelentkezzen be";
    $lang['go']                         = "Ugr�s!";

//graphic items
    $lang['late_g']                     = "&nbsp;K�S�SBEN&nbsp;";
    $lang['new_g']                      = "&nbsp;�J&nbsp;";
    $lang['updated_g']                  = "&nbsp;FRISS�TETT&nbsp;";

//admin config
    $lang['admin_config']               = "Admin be�ll�t�sok";
    $lang['email_settings']             = "Email fejl�c be�ll�t�sok";
    $lang['admin_email']                = "Admin email";
    $lang['email_reply']                = "Email 'v�lasz'";
    $lang['email_from']                 = "Email 'felad�'";
    $lang['mailing_list']               = "Levelez� lista";
    $lang['default_checkbox']           = "Alapbe�ll�t�sok a Projektek/Feladatok sz�m�ra";
    $lang['allow_globalaccess']         = "Mindenki szerkesztheti?";
    $lang['allow_group_edit']           = "Felhaszn�l�i csoport minden tagja szerkesztheti?";
    $lang['set_email_owner']            = "Mindig k�ldj�n emailt a tulajdonosnak v�ltoz�sokkor?";
    $lang['set_email_group']            = "Mindig k�ldj�n emailt a felhaszn�l�i csoportnak v�ltoz�sokkor?";
    $lang['project_listing_order']      = "Projekt felsorol�s rendez�se";
    $lang['task_listing_order']         = "Feladat felsorol�s rendez�se";
    $lang['configuration']              = "Be�ll�t�sok";

//archive
    $lang['archived_projects']          = "Arch�v projektek";

//contacts
    $lang['firstname']                  = "Vezet�kn�v:";
    $lang['lastname']                   = "Keresztn�v:";
    $lang['company']                    = "V�llalat:";
    $lang['home_phone']                 = "Otthoni telefon:";
    $lang['mobile']                     = "Mobil:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Irodai telefon:";
    $lang['address']                    = "C�m:";
    $lang['postal']                     = "Ir�ny�t�sz�m:";
    $lang['city']                       = "V�ros:";
    $lang['email']                      = "Email:";
    $lang['notes']                      = "Megjegyz�sek:";
    $lang['add_contact']                = "Kapcsolat hozz�ad�sa";
    $lang['del_contact']                = "Kapcsolat t�rl�se";
    $lang['contact_info']               = "Kapcsolat inform�ci�";
    $lang['contacts']                   = "Kapcsolatok";
    $lang['contact_add_info']           = "Ha megadja a v�llalat nev�t, akkor ez lesz felt�ntetve a n�v helyett.";
    $lang['show_contact']               = "Kapcsolatok mutat�sa";
    $lang['edit_contact']               = "Kapcsolatok szerkeszt�se";
    $lang['contact_submit']             = "Kapcsolat ment�se";
    $lang['contact_warn']               = "Nincs el�g adat a Kapcsolat ment�s�hez, k�rem l�pjen vissza �s adja meg a vezet�k- �s keresztnev�t.";

 //files
    $lang['manage_files']               = "F�jlok kezel�se";
    $lang['no_files']                   = "Nincsenek felt�ltve kezelhet� f�jlok";
    $lang['no_file_uploads']            = "Az oldal szerverbe�ll�t�sai nem engedik meg a f�jlok felt�lt�s�t";
    $lang['file']                       = "F�jl:";
    $lang['uploader']                   = "Felt�lt�:";
    $lang['files_assoc_project']        = "F�jlok a projekthez t�rs�tva";
    $lang['files_assoc_task']           = "F�jlok a feladathoz t�rs�tva";
    $lang['file_admin']                 = "F�jl admin";
    $lang['add_file']                   = "F�jl hozz�ad�sa";
    $lang['files']                      = "F�jlok";
    $lang['file_choose']                = "Felt�ltend� f�jl:";
    $lang['upload']                     = "Felt�lt�s";
    $lang['file_email_owner']           = "Email �rtes�t�s �j f�jlokr�l a tulajdonosnak?";
    $lang['file_email_usergroup']       = "Email �rtes�t�s �j f�jlokr�l a felhaszn�l�i csoportnak?";
    $lang['max_file_sprt']              = "Felt�ltend� f�jl mexim�lis m�rete: %s kb.";
    $lang['file_submit']                = "F�jl bek�ld�se";
    $lang['no_upload']                  = "Nem siker�lt f�jlt felt�lteni.  K�rem l�pjen vissza �s pr�b�lja meg �jra!";
    $lang['file_too_big_sprt']          = "A maxim�lis felt�lt�s %s byte.  Az �n felt�lt�se t�l nagy volt �s t�rl�sre ker�lt.";
    $lang['del_file_javascript_sprt']   = "Biztos benne, hogy t�r�lni akarja: %s ?";


 //forum
    $lang['orig_message']               = "Eredeti �zenet:";
    $lang['post']                       = "Elk�ld�s!";
    $lang['message']                    = "�zenet:";
    $lang['post_reply_sprt']            = "V�lasz k�ld�se '%1\$s' �zenet�re a k�vetkez�r�l: '%2\$s'";
    $lang['post_message_sprt']          = "�zenet k�ld�se ide: '%s'";
    $lang['forum_email_owner']          = "F�rum �zenet k�ld�se emailben a tulajdonosnak?";
    $lang['forum_email_usergroup']      = "F�rum �zenet k�ld�se emailben a felhaszn�l�i csoportnak?";
    $lang['reply']                      = "V�lasz";
    $lang['new_post']                   = "�j �zenet";
    $lang['public_user_forum']          = "Nyilv�nos felhaszn�l�i f�rum";
    $lang['private_forum_sprt']         = "Mag�n f�rum a '%s' felhaszn�l�i csoportnak";
    $lang['forum_submit']               = "F�rum bek�ld�se";
    $lang['no_message']                 = "Nincs �zenet! K�rem l�pjen vissza �s pr�b�lja meg�jra!";
    $lang['add_reply']                  = "V�lasz hozz�ad�sa";
    $lang['last_post_sprt']             = "Utols� �zenet: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Legut�bbi f�rum �zenetek";
    $lang['recent_posts']               = "Legut�bbi f�rum �zenetek";
    $lang['forum_search']               = "Keres�s a f�rumokban";
    $lang['no_results']                 = "Nem tal�lhat� a megadott a kifejez�s: '%s'";
    $lang['search_results']             = "A '%2\$s' kifejez�sre %1\$s tal�lat van.<br />Kilist�z�s a %3\$s.  elemt�l a %4\$s. elemig";

 //includes
    $lang['report']                     = "Jelent�s";
    $lang['warning']                    = "<h1>Sajn�ljuk!</h1><p>Most nem tudjuk a k�r�s�t teljes�teni. K�rj�k pr�b�lja meg k�s�bb �jra!</p>";
    $lang['home_page']                  = "Kezd�lap";
    $lang['summary_page']               = "�sszes�t� lap";
    $lang['todo_list']                  = "ToDo lista";
    $lang['calendar']                   = "Napt�r";
    $lang['log_out']                    = "Kijelentkez�s";
    $lang['main_menu']                  = "F�men�";
    $lang['archive']                    = "Arch�vum";
    $lang['user_homepage_sprt']         = "%s oldala";
    $lang['missing_field_javascript']   = "K�rem adja mag a hi�nyz� mez� adatait";
    $lang['invalid_date_javascript']    = "K�rem v�lasszon egy l�tez� d�tumot";
    $lang['finish_date_javascript']     = "A megadott d�tum a projekt hat�ridej�n t�l van!";
    $lang['security_manager']           = "Biztons�g-kezel�";
    $lang['session_timeout_sprt']       = "Hozz�f�r�s megtagadva; az utols� cselekm�ny %1\$d perce t�rtt�nt �s az el�v�l�s ideje %2\$d perc; k�rem <a href=\"%3\$sindex.php\">csatlakozzon �jra</a>";
    $lang['access_denied']              = "Hozz�f�r�s megtagadva";
    $lang['private_usergroup']          = "Sajn�lom; ez a ter�let egy z�rt felhaszn�l�i csoporthoz tartozik �s nincs enged�lye.";
    $lang['invalid_date']               = "�rv�nytelen d�tum";
    $lang['invalid_date_sprt']          = "A %s d�tum nem egy �rv�nyes napt�r-d�tum (Ellen�rizze a h�nap napjainak sz�m�t).<br />K�rem l�pjen vissza �s adjon meg egy �rv�nyes d�tumot.";


 //taskgroups
    $lang['taskgroup_name']             = "Feladatcsoport neve:";
    $lang['taskgroup_description']      = "Feladatcsoport r�vid le�r�sa:";
    $lang['add_taskgroup']              = "Feladatcsoport hozz�ad�sa";
    $lang['add_new_taskgroup']          = "�j feladatcsoport hozz�ad�sa";
    $lang['edit_taskgroup']             = "Feladatcsoport szerkeszt�se";
    $lang['taskgroup_manage']           = "Feladatcsoportok kezel�se";
    $lang['no_taskgroups']              = "Nincsenek feladatcsoportok kialak�tva";
    $lang['manage_taskgroups']          = "Feladatcsoportok kezel�se";
    $lang['taskgroups']                 = "Feladatcsoportok";
    $lang['taskgroup_dup_sprt']         = "M�r van egy '%s' feladatcsoport.  K�rem l�pjen vissza �s adjon meg egy �j nevet.";
    $lang['info_taskgroup_manage']      = "Inform�ci�k a feladatcsoport-kezel�shez";

 //usergroups
    $lang['usergroup_name']             = "Felhaszn�l�i csoport neve:";
    $lang['usergroup_description']      = "Felhaszn�l�i csoport r�vid le�r�sa:";
    $lang['members']                    = "Tagok:";
    $lang['private_usergroup']          = "Z�rt felhaszn�l�i csoport";
    $lang['add_usergroup']              = "Felhaszn�l�i csoport hozz�ad�sa";
    $lang['add_new_usergroup']          = "�j felhaszn�l�i csoport hozz�ad�sa";
    $lang['edit_usergroup']             = "Felhaszn�l�i csoport szerkeszt�se";
    $lang['usergroup_manage']           = "Felhaszn�l�i csoportok kezel�se";
    $lang['no_usergroups']              = "Nincsenek felhaszn�l�i csoportok kialak�tva";
    $lang['manage_usergroups']          = "Felhaszn�l�i csoportok kezel�se";
    $lang['usergroups']                 = "Felhaszn�l�i csoportok";
    $lang['usergroup_dup_sprt']         = "M�r van egy '%s' felhaszn�l�i csoport.  K�rem l�pjen vissza �s adjon meg egy �j nevet.";
    $lang['info_usergroup_manage']      = "Inform�ci�k a felhaszn�l�i csoportkezel�shez";

 //users
    $lang['login_name']                 = "Bejelentkez�si n�v";
    $lang['full_name']                  = "Teljes n�v";
    $lang['password']                   = "Jelsz�";
    $lang['blank_for_current_password'] = "(Hagyja �resen, ha nem akarj megv�ltoztatni)";
    $lang['email']                      = "Email";
    $lang['admin']                      = "Admin";
    $lang['private_user']               = "Priv�t felhaszn�l�";
    $lang['normal_user']                = "Norm�l felhaszn�l�";
    $lang['is_admin']                   = "Admin jogokkal rendelkezik?";
    $lang['is_guest']                   = "Vend�g jogokkal rendelkezik?";
    $lang['guest']                      = "Vend�g felhaszn�l�";
    $lang['user_info']                  = "Felhaszn�l�i inform�ci�";
    $lang['deleted_users']              = "T�r�lt felhaszn�l�k";
    $lang['no_deleted_users']           = "Nincsenek t�r�lt felhaszn�l�k.";
    $lang['revive']                     = "�jra�leszt";
    $lang['permdel']                    = "V�gleges t�rl�s";
    $lang['permdel_javascript_sprt']    = "Ez v�glegesen ki fogja t�r�lni a felhaszn�l�t, valamint a feladatokat amelyeknek %s volt az elv�llal�ja. Biztos ezt akarja?";
    $lang['add_user']                   = "Felhaszn�l� hozz�ad�sa";
    $lang['edit_user']                  = "Felhaszn�l� szerkszt�se";
    $lang['no_users']                   = "A rendszer nem tud felhaszn�l�kr�l";
    $lang['users']                      = "Felhaszn�l�k";
    $lang['existing_users']             = "L�tez� felhaszn�l�k";
    $lang['private_profile']            = "Ennek a felhaszn�l�nak priv�t be�ll�t�sai vannak, amiket nem n�zhetsz meg.";
    $lang['private_usergroup_profile']  = "(Ez a felhaszn�l� egy z�rt felhaszn�l�i csoport tagja, amelyet nem tekinthetsz meg)";
    $lang['email_users']                = "Email k�ld�se a felhaszn�l�knak";
    $lang['select_usergroup']           = "Felhaszn�l�i csoport lentebb kijel�lve:";
    $lang['subject']                    = "T�rgy:";
    $lang['message_sent_maillist']      = "Ez a lev�l minden esetben beker�l a levelez�si list�ra.";
    $lang['who_online']                 = "Ki van itt?";
    $lang['edit_details']               = "Felhaszn�l� r�szleteinek szerkeszt�se";
    $lang['show_details']               = "Felhaszn�l� r�szleteinek mutat�sa";
    $lang['user_deleted']               = "Ez a felhaszn�l� t�r�lve van!";
    $lang['no_usergroup']               = "Ez a felhaszn�l� nem tagja egy felhaszn�l�i csoportnak sem";
    $lang['not_usergroup']              = "(Nem tagja felhaszn�l�i csoporttnak)";
    $lang['no_password_change']         = "(A jelszavad nem v�ltozott meg)";
    $lang['last_time_here']             = "Itt j�rt legut�bb ekkor:";
    $lang['number_items_created']       = "L�trehozott elemek sz�ma:";
    $lang['number_projects_owned']      = "Tulajdonolt projektek sz�ma:";
    $lang['number_tasks_owned']         = "Tulajdonolt feladatok sz�ma:";
    $lang['number_tasks_completed']     = "Befejezett feladatok sz�ma:";
    $lang['number_forum']               = "F�rum �zenetek sz�ma:";
    $lang['number_files']               = "Felt�lt�tt f�jlok sz�ma:";
    $lang['size_all_files']             = "�sszes m�rete a tulajdonolt f�jloknak:";
    $lang['owned_tasks']                = "Tulajdonolt feladatok";
    $lang['invalid_email']              = "�rv�nytelen email c�m";
    $lang['invalid_email_given_sprt']   = "A '%s' email c�m �rv�nytelen. K�rem l�pjen vissza �s pr�b�lja meg �jra.";
    $lang['duplicate_user']             = "Felhaszn�l� megkett�z�se";
    $lang['duplicate_change_user_sprt'] = "A '%s' felhaszn�l� m�r l�tezik.  K�rem l�pjen vissza �s adjon meg �j nevet.";
    $lang['value_missing']              = "�rt�k hi�nyzik";
    $lang['field_sprt']                 = "A '%s' mez� �res. K�rem l�pjen vissza �s adja emg az �rt�k�t.";
    $lang['admin_priv']                 = "MEGJEGYZ�S: Admin jogokat adt�l.";
    $lang['manage_users']               = "Felhaszn�l�k kezel�se";
    $lang['users_online']               = "Online felhaszn�l�k";
    $lang['online']                     = "Felhaszn�l�k (kevesebb mint 60 perce online)";
    $lang['not_online']                 = "A t�bbiek";
    $lang['user_activity']              = "Felhaszn�l� aktivit�s";

  //tasks
    $lang['add_new_task']               = "�j feladat hozz�ad�sa";
    $lang['priority']                   = "Priorit�s";
    $lang['parent_task']                = "Sz�l�";
    $lang['creation_time']              = "L�trehoz�s ideje";
    $lang['by_sprt']                    = "%1\$s %2\$s �ltal"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Projekt neve";
    $lang['task_name']                  = "Feladat neve";
    $lang['deadline']                   = "Hat�rid�";
    $lang['taken_from_parent']          = "(�r�kl�s a sz�l�t�l)";
    $lang['status']                     = "�llapot";
    $lang['task_owner']                 = "Feladat tulajdonosa";
    $lang['project_owner']              = "Projekt tulajdonosa";
    $lang['taskgroup']                  = "Feladatcsoport";
    $lang['usergroup']                  = "Felhaszn�l�i csoport";
    $lang['nobody']                     = "Senki";
    $lang['none']                       = "Egyik sem";
    $lang['no_group']                   = "Nincs csoport";
    $lang['all_groups']                 = "Minden csoport";
    $lang['all_users']                  = "Minden felhaszn�l�";
    $lang['all_users_view']             = "Minden felhaszn�l� l�thatja ezt az elemet?";
    $lang['group_edit']                 = "Mindenki szerkesztheti a felhaszn�l�i csoportban?";
    $lang['project_description']        = "Projekt le�r�sa";
    $lang['task_description']           = "Feladat le�r�sa";
    $lang['email_owner']                = "Email k�ld�se a v�ltoztat�sokr�l a tulajdonosnak?";
    $lang['email_new_owner']            = "Email k�ld�se a v�ltoztat�sokr�l az (�j) tulajdonosnak?";
    $lang['email_group']                = "Email k�ld�se a v�ltoztat�sokr�l a felhaszn�l�i csoportnak?";
    $lang['add_new_project']            = "�j projekt hozz�ad�sa";
    $lang['uncategorised']              = "Kategoriz�latlan";
    $lang['due_sprt']                   = "%d napra mostant�l";
    $lang['tomorrow']                   = "Holnapra";
    $lang['due_today']                  = "M�ra";
    $lang['overdue_1']                  = "1 nappal k�s�bbre";
    $lang['overdue_sprt']               = "%d nappal k�s�bbre";
    $lang['edit_task']                  = "Feladat szerkeszt�se";
    $lang['edit_project']               = "Projekt szerkeszt�se";
    $lang['no_reparent']                = "Egyik sem (egy fels� szint� projekt)";
    $lang['del_javascript_project_sprt']= "Kit�rl�d ezt a projektet: %s. Biztos benne?";
    $lang['del_javascript_task_sprt']   = "Kit�rl�d ezt a feladatot: %s. Biztos benne?";
    $lang['add_task']                   = "Feladat hozz�ad�sa";
    $lang['add_subtask']                = "Alfeladat hozz�ad�sa";
    $lang['add_project']                = "Projekt hozz�ad�sa";
    $lang['clone_project']              = "Projekt kl�noz�sa";
    $lang['clone_task']                 = "Feladat kl�noz�sa";
    $lang['quick_jump']                 = "Gyors ugr�s";
    $lang['no_edit']                    = "Nem vagy az elem tulajdonosa, ez�rtt nem szerkesztheted";
    $lang['uncategorised']              = "Bekategoriz�latlan";
    $lang['admin']                      = "Admin";
    $lang['global']                     = "�ltal�nos";
    $lang['delete_project']             = "Projekt t�rl�se";
    $lang['delete_task']                = "Feladat t�rl�se";
    $lang['project_options']            = "Projekt be�ll�t�sai";
    $lang['task_options']               = "Feladat be�ll�t�sai";
    $lang['javascript_archive_project'] = "Ez archiv�lni fogja a k�vetkez� projektet: %s.  Biztos benne?";
    $lang['archive_project']            = "Projekt archiv�l�sa";
    $lang['task_navigation']            = "Feladatok k�zti navig�ci�";
    $lang['new_task']                   = "�j feladat";
    $lang['no_projects']                = "Nincs megjelen�tend� projekt";
    $lang['show_all_projects']          = "Minden projekt mutat�sa";
    $lang['show_active_projects']       = "Csak az akt�v projektek mutat�sa";
    $lang['project_hold_sprt']          = "Projekt felf�ggeszt�se ett�l: %s";
    $lang['project_planned']            = "Tervezett projekt";
    $lang['percent_sprt']               = "A feladatoknak %d%%-a k�sz";
    $lang['project_no_deadline']        = "Nincs hat�rid� megadva ehhez a projekthez";
    $lang['no_allowed_projects']        = "Nincs olyan projekt, amelyet enged�lye van megtekinteni";
    $lang['projects']                   = "Projektek";
    $lang['percent_project_sprt']       = "Ez a projekt %d%%-ban be van fejezve";
    $lang['owned_by']                   = "Tulajdonosa";
    $lang['created_on']                 = "L�trehoz�ja";
    $lang['completed_on']               = "Befejezve";
    $lang['modified_on']                = "M�dos�tva";
    $lang['project_on_hold']            = "Projekt felf�ggesztve";
    $lang['project_accessible']         = "(Ez a projekt nyilv�nosan el�rhet� minden felhaszn�l� �ltal)";
    $lang['task_accessible']            = "(Ez a feladat nyilv�nosan el�rhet� minden felhaszn�l� �ltal)";
    $lang['project_not_accessible']     = "(Ez a projekt csak a felhaszn�l�i csoport tagjai sz�m�ra el�rhet�)";
    $lang['task_not_accessible']        = "(Ez a feladat csak a felhaszn�l�i csoport tagjai sz�m�ra el�rhet�)";
    $lang['project_not_in_usergroup']   = "Ez a projekt nem r�sze felhaszn�l�i csoportnak �s minden felhaszn�l� el�rheti.";
    $lang['task_not_in_usergroup']      = "Ez a feladat nem r�sze felhaszn�l�i csoportnak �s minden felhaszn�l� el�rheti.";
    $lang['usergroup_can_edit_project'] = "Ezt a projektet a felhaszn�l�i csoport tagjai is szerkeszthetik.";
    $lang['usergroup_can_edit_task']    = "Ezt a feladatot a felhaszn�l�i csoport tagjai is szerkeszthetik.";
    $lang['i_take_it']                  = "Elv�llalom! :)";
    $lang['i_finished']                 = "Befejeztem!";
    $lang['i_dont_want']                = "Nem akarok tov�bb dolgozni rajta!";
    $lang['take_over_project']          = "Projekt �tv�tele";
    $lang['take_over_task']             = "Feladat �tv�tele";
    $lang['task_info']                  = "Feladat inform�ci�k";
    $lang['project_details']            = "Projekt r�szletek";
    $lang['todo_list_for']              = "ToDo lista ehhez: ";
    $lang['due_in_sprt']                = " (%d napra)";
    $lang['due_tomorrow']               = " (holnapra)";
    $lang['no_assigned']                = "Nincsenek befejezetlen feladatok ehhez a felhaszn�l�hoz t�rs�tva.";
    $lang['todo_list']                  = "ToDo lista";
    $lang['summary_list']               = "�sszes�t� lista";
    $lang['task_submit']                = "Feladat bejegyz�se";
    $lang['not_owner']                  = "Hozz�f�r�s megtagadva. Vagy nem �n a tulajdonos; vagy csak nincsen jogosults�ga!";
    $lang['missing_values']             = "Nincs el�g mez� kit�ltve, k�rem l�pjen vissza �s t�ltse ki �ket!";
    $lang['future']                     = "J�v�";
    $lang['flags']                      = "Z�szl�k";
    $lang['owner']                      = "Tulajdonos";
    $lang['group']                      = "Csoport";
    $lang['by_usergroup']               = " (felhaszn�l�i csoport �ltal)";
    $lang['by_taskgroup']               = " (feladatcsoport �ltal)";
    $lang['by_deadline']                = " (hat�rid� �ltal)";
    $lang['by_status']                  = " (�llapot �ltal)";
    $lang['by_owner']                   = " (tulajdonos �ltal)";
    $lang['project_cloned']             = "Kl�nozand� projekt :";
    $lang['task_cloned']                = "Kl�nozand� feladat :";
    $lang['note_clone']                 = "Megjegyz�s: A feladat egy �j projektk�nt lesz kl�nozva";

//bits 'n' pieces
    $lang['calendar']                   = "Napt�r";
    $lang['normal_version']             = "Alap verzi�";
    $lang['print_version']              = "Nyomtathat� verzi�";
    $lang['condensed_view']             = "�ttekint� n�zet";
    $lang['full_view']                  = "R�szletes n�zet";
    $lang['icalendar']                  = "iCalendar";

?>
