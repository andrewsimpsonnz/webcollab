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

  Language files for 'sk' (Slovensk�)

  Translation: Stanislav Pekar��k,fredis@SoftHome.net

  Maintainer:
*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-2" );

//xml language identifier
define('XML_LANG', "sk" );

//this is the regex for input validation filter used in common.php
define('VALIDATION_REGEX', '/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/' ); //ISO-8859-x

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'M�j', 'J�n', 'J�l', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Ne', 'Po', 'Ut', 'Str', '�tv', 'Pi', 'So' );

//task states

 //priorities
    $task_state['dontdo']               = 'Netreba sa pon�h�a�';
    $task_state['low']                  = 'N�zka';
    $task_state['normal']               = 'Norm�lna';
    $task_state['high']                 = 'Vysok�';
    $task_state['yesterday']            = 'V�era bolo neskoro!';
 //status
    $task_state['new']                  = 'Nov�';
    $task_state['planned']              = 'Pl�novan� (neakt�vny)';
    $task_state['active']               = 'Akt�vny';
    $task_state['cantcomplete']         = '�ak�';
    $task_state['completed']            = 'Kompetn�';
    $task_state['done']                 = 'Hotovo';
    $task_state['task_planned']         = ' Pl�novan�';
    $task_state['task_active']          = ' Akt�vna';
 //project states
    $task_state['planned_project']      = 'Pl�novan� projekt (neakt�vny)';
    $task_state['no_deadline_project']  = 'Nenastaven� hrani�n� term�n';
    $task_state['active_project']       = 'Akt�vny projekt';

//common items
    $lang['description']                = 'Popis';
    $lang['name']                       = 'Meno';
    $lang['add']                        = 'Prida�';
    $lang['update']                     = 'Opravi�';
    $lang['submit_changes']             = 'Ulo�i� zmeny';
    $lang['continue']                   = 'Pokra�ova�';
    $lang['reset']                      = 'Reset';
    $lang['manage']                     = 'Spravova�';
    $lang['edit']                       = 'Editova�';
    $lang['delete']                     = 'Zmaza�';
    $lang['del']                        = 'Zmaza�';
    $lang['confirm_del_javascript']     = ' Potvrdi� zmazanie!';
    $lang['yes']                        = '�no';
    $lang['no']                         = 'Nie';
    $lang['action']                     = 'Akcia';
    $lang['task']                       = '�loha';
    $lang['tasks']                      = '�lohy';
    $lang['project']                    = 'Projekt';
    $lang['info']                       = 'Info';
    $lang['bytes']                      = ' bytov';
    $lang['select_instruct']            = '(Pou�ite ctrl pre v�ber viac polo�iek; alebo �iadnej)';
    $lang['member_groups']              = 'U�ivate� je �len dole zv�raznen�ch skup�n (ak je �len nejakej skupiny)';
    $lang['login']                      = 'Login';
    $lang['login_action']               = 'Login';
    $lang['login_screen']               = 'Login';
    $lang['error']                      = 'Chyba';
    $lang['no_login']                   = 'Pr�stup odmietnut�; neplatn� login alebo heslo';
    $lang['redirect_sprt']              = 'Automatick� n�vrat na login za %d sek�nd ';
    $lang['login_now']                  = 'Pros�m kliknite tu pre n�vrat na login';
    $lang['please_login']               = 'Pros�m prihl�ste sa';
    $lang['go']                         = 'Cho�';

    //graphic items
    $lang['late_g']                     = '&nbsp;ZME�KAN�&nbsp;';
    $lang['new_g']                      = '&nbsp;NOV�&nbsp;';
    $lang['updated_g']                  = '&nbsp;ZMENEN�&nbsp;';

//admin config
    $lang['admin_config']               = 'Konfigur�cia administr�tora';
    $lang['email_settings']             = 'Nastavenie hlavi�ky emailu';
    $lang['admin_email']                = 'E-mail administr�tora';
    $lang['email_reply']                = 'Email \'odpoveda�\'';
    $lang['email_from']                 = 'Email \'od\'';
    $lang['mailing_list']               = 'Zoznam po�ty';
    $lang['default_checkbox']           = '�tandartn� nastavenie volieb pre projekt/�lohu';
    $lang['allow_globalaccess']         = 'Povoli� �pln� pr�stup?';
    $lang['allow_group_edit']           = 'Povoli� v�etkym v u�ivate�skej skupine editova�?';
    $lang['set_email_owner']            = 'V�dy posla� vlastn�kovi email so zmenami?';
    $lang['set_email_group']            = 'V�dy posla� uzivate�skej skupine email so zmenami?';
    $lang['project_listing_order']      = 'Zoznam projektov';
    $lang['task_listing_order']         = 'Zoznam �loh';
    $lang['configuration']              = 'Konfigur�cia';

//archive
    $lang['archived_projects']          = 'Arch�vovan� projekty';

//contacts
    $lang['firstname']                  = 'Meno:';
    $lang['lastname']                   = 'Priezvisko:';
    $lang['company']                    = 'Spolo�nos�:';
    $lang['home_phone']                 = 'Telef�n doma:';
    $lang['mobile']                     = 'Mobil:';
    $lang['fax']                        = 'Fax:';
    $lang['bus_phone']                  = 'Telef�n pr�ca:';
    $lang['address']                    = 'Adresa:';
    $lang['postal']                     = 'PS�:';
    $lang['city']                       = 'Mesto:';
    $lang['email_contact']              = 'Email:';
    $lang['notes']                      = 'Pozn�mka:';
    $lang['add_contact']                = 'Prida� kontakt';
    $lang['del_contact']                = 'Zmaza� kontakt';
    $lang['contact_info']               = 'Info o kontakte';
    $lang['contacts']                   = 'Kontakty';
    $lang['contact_add_info']           = 'Ak zad�te meno spolo�nosti, bude zobrazen� miesto mena u��vate�a.';
    $lang['show_contact']               = 'Zobrazi� kontakty';
    $lang['edit_contact']               = 'Editova� kontakty';
    $lang['contact_submit']             = 'Odosla� kontakt';
    $lang['contact_warn']               = 'Nie je dos� hodn�t pre pridanie kontaktu; pros�m vr�te sa a pridajte aspo� meno a priezvisko';

 //files
    $lang['manage_files']               = 'Spravova� s�bory';
    $lang['no_files']                   = '�iadn� s�bory ku spr�ve';
    $lang['no_file_uploads']            = 'Konfigur�cia servera pre t�to str�nku nepovo�uje upload s�borov';
    $lang['file']                       = 'S�bor:';
    $lang['uploader']                   = 'Nahral:';
    $lang['files_assoc_project']        = 'S�bory priraden� k tomuto projektu';
    $lang['files_assoc_task']           = 'S�bory priraden� k tejto �lohe';
    $lang['file_admin']                 = 'Administr�cia s�borov';
    $lang['add_file']                   = 'Prida� s�bor';
    $lang['files']                      = 'S�bory';
    $lang['file_choose']                = 'S�bory k pridaniu:';
    $lang['upload']                     = 'Prida�';
    $lang['file_email_owner']           = 'Emailov� notifik�cia nov�ho s�boru vlastn�kovi?';
    $lang['file_email_usergroup']       = 'Emailov� notifik�cia nov�ho s�boru u�ivate�skej skupine?';
    $lang['max_file_sprt']              = 'S�bor mus� by� men�� ne� %s kb.';
    $lang['file_submit']                = 'Potvrdi� s�bor ';
    $lang['no_upload']                  = 'S�bor nebol nahrat�.  Pros�m vr�te sa a sk�ste znova.';
    $lang['file_too_big_sprt']          = 'Maxim�lna ve�kos� s�boru je %s bytov.  V� s�bor bol v�蹹� a bol zru�en�.';
    $lang['del_file_javascript_sprt']   = 'Naozaj vymaza� %s ?';


 //forum
    $lang['orig_message']               = 'Origin�lna spr�va:';
    $lang['post']                       = 'Odosla�!';
    $lang['message']                    = 'Spr�va:';
    $lang['post_reply_sprt']            = 'Odosla� odpove� na spr�vu od \'%1$s\' o \'%2$s\'';
    $lang['post_message_sprt']          = 'Odosla� spr�vu : \'%s\'';
    $lang['forum_email_owner']          = 'Posla� spr�vu vlastn�kovi?';
    $lang['forum_email_usergroup']      = 'Posla� spr�vu u�ivate�skej skupine?';
    $lang['reply']                      = 'Odpoveda�';
    $lang['new_post']                   = 'Nov� spr�va';
    $lang['public_user_forum']          = 'Verejn� u�ivate�sk� f�rum';
    $lang['private_forum_sprt']         = 'Priv�tne f�rum pre \'%s\' u�ivate�sku skupinu';
    $lang['forum_submit']               = 'Potvrdi� f�rum ';
    $lang['no_message']                 = '�iadna spr�va! Pros�m vr�te sa a sk�ste znova';
    $lang['add_reply']                  = 'Prida� odpove�';
    $lang['last_post_sprt']             = 'Posledn� spr�va %s'; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = 'Ned�vne spr�vy na f�re';
    $lang['forum_search']               = "H�ada� na f�re";
    $lang['no_results']                 = "Nen�jden� v�sledky pre '%s'";
    $lang['search_results']             = "N�jden� %1\$s v�sledkov pre '%2\$s'<br />Uk�za� v�sledky %3\$s do %4\$s";
 //includes
    $lang['report']                     = 'Report';
    $lang['warning']                    = '<h1>Pardon!</h1><p>Teraz nie sme schopn� vykona� Va�u po�iadavku. Pros�m sk�ste nesk�r.</p>';
    $lang['home_page']                  = 'Hlavn� str�nka';
    $lang['summary_page']               = 'Sum�rny preh�ad';
    $lang['log_out']                    = 'Odhl�si�';
    $lang['main_menu']                  = 'Hlavn� menu';
    $lang['archive']                    = 'Arch�v';
    $lang['user_homepage_sprt']         = 'Hlavn� str�nka u�ivate�a %s';
    $lang['missing_field_javascript']   = 'Pros�m vypln�e hodnotu v pr�zdnom poli';
    $lang['invalid_date_javascript']    = 'Pros�m vyberte platn� kalend�rny d�tum';
    $lang['finish_date_javascript']     = 'Vybran� d�tum je za kone�n�m d�tumom projektu!';
    $lang['security_manager']           = 'Spr�vca bezpe�nosti';
    $lang['session_timeout_sprt']       = 'Pr�stup odopret�; posledn� akcia bola pred %1$d min�tami a timeout je %2$d min�t; pros�m <a href="%3$sindex.php">re-login</a>';
    $lang['access_denied']              = 'Pr�stup odopret�';
    $lang['private_usergroup_no_access']= 'Pardon; t�to �as� je v priv�tnej skupine a Vy nem�te pr�stupov� pr�va.';
    $lang['invalid_date']               = 'Neplatn� d�tum';
    $lang['invalid_date_sprt']          = 'D�tum %s nie je platn� kalend�ry d�tum (Skontrolujte
po�et dn� v mesiaci).<br />Pros�m vr�te sa a zadajte platn� d�tum.';

 //taskgroups
    $lang['taskgroup_name']             = 'Skupina pre �lohu:';
    $lang['taskgroup_description']      = 'Popis skupiny pre �lohu:';
    $lang['add_taskgroup']              = 'Prida� skupinu pre �lohu';
    $lang['add_new_taskgroup']          = 'Prida� nov� skupinu pre �lohu';
    $lang['edit_taskgroup']             = 'Editova� skupinu pre �lohu';
    $lang['taskgroup_manage']           = 'Spravova� skupinu pre �lohu';
    $lang['no_taskgroups']              = 'Skupiny pre �lohu nedefinovan�';
    $lang['manage_taskgroups']          = 'Spravova� skupiny pre �lohu';
    $lang['taskgroups']                 = 'Skupiny pre �lohu';
    $lang['taskgroup_dup_sprt']         = 'Skupina pre �lohu \'%s\' u� existuje.  Pros�m  vr�te sa a zadajte nov� meno.';
    $lang['info_taskgroup_manage']      = 'Info pre spr�vu skup�n pre �lohu';

 //usergroups
    $lang['usergroup_name']             = 'Meno u�ivate�skej skupiny:';
    $lang['usergroup_description']      = 'Popis u�ivate�skej skupiny:';
    $lang['members']                    = '�lenovia:';
    $lang['private_usergroup']          = 'Priv�tna u�ivate�sk� skupina';
    $lang['add_usergroup']              = 'Pridaj u�ivate�sk� skupinu';
    $lang['add_new_usergroup']          = 'Pridaj nov� u�ivate�sk� skupinu';
    $lang['edit_usergroup']             = 'Edituj skupinu';
    $lang['usergroup_manage']           = 'Spr�va u�ivate�skej skupiny';
    $lang['no_usergroups']              = 'U�ivate�sk� skupiny nedefinovan�';
    $lang['manage_usergroups']          = 'Spr�va u�ivate�sk�ch skup�n';
    $lang['usergroups']                 = 'U�ivate�sk� skupiny';
    $lang['usergroup_dup_sprt']         = 'U�ivate�sk� skupina \'%s\' u� existuje.  Pros�m vr�te sa a zadajte nov� meno.';
    $lang['info_usergroup_manage']      = 'Info pre spr�vu u�ivate�sk�ch skup�n';

 //users
    $lang['login_name']                 = 'Login meno';
    $lang['full_name']                  = 'Pln� meno';
    $lang['password']                   = 'Heslo';
    $lang['blank_for_current_password'] = '(Necha� pr�zdne pre aktu�lne heslo)';
    $lang['email']                      = 'E-mail';
    $lang['admin']                      = 'Administr�tor';
    $lang['private_user']               = 'Priv�tny u�ivate�';
    $lang['normal_user']                = 'Norm�lny u�ivate�';
    $lang['is_admin']                   = 'Je administr�tor?';
    $lang['is_guest']                   = 'Je hos�?';
    $lang['guest']                      = 'Hos�';
    $lang['user_info']                  = 'Info o u�ivate�ovi';
    $lang['deleted_users']              = 'Zmaza� u�ivate�a';
    $lang['no_deleted_users']           = 'U�ivate� nebol zru�en�.';
    $lang['revive']                     = 'Obnovi�';
    $lang['permdel']                    = 'Trvalo zru�i�';
    $lang['permdel_javascript_sprt']    = 'T�to oper�cia trvalo zru�� v�etky z�znamy u��vate�a a priraden� �lohy pre %s. Naozaj to chcete urobi�?';
    $lang['add_user']                   = 'Prida� u��vate�a';
    $lang['edit_user']                  = 'Editova� u��vate�a';
    $lang['no_users']                   = 'V syst�me nie s� u�ivatelia';
    $lang['users']                      = 'U��vatelia';
    $lang['existing_users']             = 'Existuj�ci u��vate�';
    $lang['private_profile']            = 'Tento u��vate� m� s�kromn� profil, ktor� Vy nem��ete vidie�.';
    $lang['private_usergroup_profile']  = '(Tento u��vate� je �len s�kromnej u�ivate�skej skupiny, ktor� nem��ete vidie�)';
    $lang['email_users']                = 'Posla� e-mail u��vate�om';
    $lang['select_usergroup']           = 'U��vate�sk� skupina vybran� dole:';
    $lang['subject']                    = 'Predmet:';
    $lang['message_sent_maillist']      = 'Spr�va bude skop�rovan� na zoznam po�ty.';
    $lang['who_online']                 = 'Kto je online?';
    $lang['edit_details']               = 'Editova� detaily u��vate�a';
    $lang['show_details']               = 'Pozrie� detaily u��vate�a';
    $lang['user_deleted']               = 'Tento u��vate� bol zru�en�!';
    $lang['no_usergroup']               = 'Tento u��vate� nie je �len nijakej u�ivate�skej skupiny';
    $lang['not_usergroup']              = '(Nie je �len �iadnej u�ivate�skej skupiny)';
    $lang['no_password_change']         = '(Va�e heslo nebolo zmenen�)';
    $lang['last_time_here']             = 'Posledn� n�v�teva:';
    $lang['number_items_created']       = 'Po�et vytvoren�ch polo�iek:';
    $lang['number_projects_owned']      = 'Po�et vlastn�ch projektov:';
    $lang['number_tasks_owned']         = 'Po�et vlastn�ch �loh:';
    $lang['number_tasks_completed']     = 'Po�et hotov�ch �loh:';
    $lang['number_forum']               = 'Po�et spr�v ma f�re:';
    $lang['number_files']               = 'Po�et nahrat�ch s�borov:';
    $lang['size_all_files']             = 'Celkov� ve�kos� vlastn�ch s�borov:';
    $lang['owned_tasks']                = 'Vlastn� �lohy';
    $lang['invalid_email']              = 'Neplatn� e-mailov� adresa';
    $lang['invalid_email_given_sprt']   = 'E-mailov� adresa \'%s\' je neplatn�.  Pros�m vr�te sa
 a sk�ste znova.';
    $lang['duplicate_user']             = 'U�ivate� u� existuje';
    $lang['duplicate_change_user_sprt'] = 'U��vate� \'%s\' u� existuje.  Pros�m vr�te sa a zme�te meno.';
    $lang['value_missing']              = 'Hodnota ch�ba';
    $lang['field_sprt']                 = 'Pole pre \'%s\' je pr�zdne. Pros�m vr�te sa a vypl�te ho.';
    $lang['admin_priv']                 = 'POZN�MKA: M�te administr�torsk� privil�gia.';
    $lang['manage_users']               = 'Spr�va u��vate�ov';
    $lang['users_online']               = 'Online u��vatelia';
    $lang['online']                     = 'Posledn� surferi (Online menej ako 60 min�t)';
    $lang['not_online']                 = 'Zost�va';
    $lang['user_activity']              = 'Aktivita u��vate�a';

  //tasks
    $lang['add_new_task']               = 'Prida� nov� �lohu';
    $lang['priority']                   = 'Priorita';
    $lang['parent_task']                = 'Rodi�';
    $lang['creation_time']              = '�as vytvorenia';
    $lang['by_sprt']                    = '%1$s od %2$s'; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = 'Meno projektu';
    $lang['task_name']                  = 'Meno �lohy';
    $lang['deadline']                   = 'Hrani�n� term�n';
    $lang['taken_from_parent']          = '(Prevziat� od rodi�a)';
    $lang['status']                     = 'Stav';
    $lang['task_owner']                 = 'Vlastn�k �lohy';
    $lang['project_owner']              = 'Vlastn�k projektu';
    $lang['taskgroup']                  = 'Skupiny pre �lohu';
    $lang['usergroup']                  = 'U�ivate�sk� skupina';
    $lang['nobody']                     = 'Nikto';
    $lang['none']                       = '�iadn�';
    $lang['no_group']                   = '�iadn� skupina';
    $lang['all_groups']                 = 'V�etky skupiny';
    $lang['all_users']                  = 'V�etci u��vatelia';
    $lang['all_users_view']             = 'V�etci u��vatelia m��u vidie� t�to polo�ku?';
    $lang['group_edit']                 = 'Ktoko�vek v u�ivate�skej skupine m��e editova�?';
    $lang['project_description']        = 'Obsah projektu';
    $lang['task_description']           = 'Obsah �lohy';
    $lang['email_owner']                = 'Posla� email o zmene vlastn�kovi?';
    $lang['email_new_owner']            = 'Posla� email o zmene (nov�mu) vlastn�kovi?';
    $lang['email_group']                = 'posla� email o zmene u�ivate�skej skupine?';
    $lang['add_new_project']            = 'Prida� nov� projekt';
    $lang['uncategorised']              = 'Nezaraden�';
    $lang['due_sprt']                   = '%d dn� od teraz';
    $lang['tomorrow']                   = 'Zajtra';
    $lang['due_today']                  = 'Dnes';
    $lang['overdue_1']                  = '1 de� oneskoren�';
    $lang['overdue_sprt']               = '%d dn� oneskoren�';
    $lang['edit_task']                  = 'Editova� �lohu';
    $lang['edit_project']               = 'Editova� projekt';
    $lang['no_reparent']                = '�iadn� (samostatn� projekt)';
    $lang['del_javascript_project_sprt']= 'Zmaza� projekt %s. Naozaj ?';
    $lang['del_javascript_task_sprt']   = 'Zmaza� �lohu %s. Naozaj ?';
    $lang['add_task']                   = 'Prida� �lohu';
    $lang['add_subtask']                = 'Prida� pod�lohu';
    $lang['add_project']                = 'Prida� projekt';
    $lang['clone_project']              = 'Kop�rova� projekt';
    $lang['clone_task']                 = 'Kop�rova� �lohu';
    $lang['quick_jump']                 = 'Prejs� na';
    $lang['no_edit']                    = 'Nie ste vlastn�k polo�ky a preto ju nem��ete editova�';
    $lang['global']                     = 'Ostatn�';
    $lang['delete_project']             = 'Zmaza� projekt';
    $lang['delete_task']                = 'Zmaza� �lohu';
    $lang['project_options']            = 'Vo�by projektu';
    $lang['task_options']               = 'Vo�by �lohy';
    $lang['javascript_archive_project'] = 'Projekt bude archivovan� ako %s.  Ste si ist�?';
    $lang['archive_project']            = 'Arch�vny projekt';
    $lang['task_navigation']            = 'Navig�cia �lohy';
    $lang['new_task']                   = 'Nov� �loha';
    $lang['no_projects']                = '�iadn� vidite�n� projekt';
    $lang['show_all_projects']          = 'Uk�za� v�etky projekty';
    $lang['show_active_projects']       = 'Uk�za� len akt�vne projekty';
    $lang['project_hold_sprt']          = 'Projekt �ak� od %s';
    $lang['project_planned']            = 'Pl�novan� projekt';
    $lang['percent_sprt']               = '%d%% �lohy hotovo';
    $lang['project_no_deadline']        = 'Nie je nastaven� hrani�n� term�n tohto projektu';
    $lang['no_allowed_projects']        = 'Nie je V�m dovolen� vidie� �iadn� projekt';
    $lang['projects']                   = 'Projekty';
    $lang['percent_project_sprt']       = 'Tento projekt je na %d%% hotov�';
    $lang['owned_by']                   = 'Vlastn�k je';
    $lang['created_on']                 = 'Vytvoren�';
    $lang['completed_on']               = 'Kompletn�';
    $lang['modified_on']                = 'Modifikovan�';
    $lang['project_on_hold']            = 'Projekt �ak�';
    $lang['project_accessible']         = '(Tento projekt je verejne dostupn� v�etk�m u��vate�om)';
    $lang['task_accessible']            = '(T�to �loha je verejne dostupn� v�etk�m u��vate�om)';
    $lang['project_not_accessible']     = '(Tento projekt je dostupn� len �lenom u��vate�skej skupiny)';
    $lang['task_not_accessible']        = '(T�to �loha je dostupn� len �lenom u��vate�skej skupiny)';
    $lang['project_not_in_usergroup']   = 'Tento projekt nie je pridelen� �iadnej u�ivate�skej skupine a je dostupn� v�etk�m u��vate�om.';
    $lang['task_not_in_usergroup']      = 'T�to �loha nie je pridelen� �iadnej u�ivate�skej skupine a je dostupn� v�etk�m u�ivate�om.';
    $lang['usergroup_can_edit_project'] = 'Tento projekt m��u editova� len �lenovia u�ivate�skej skupiny.';
    $lang['usergroup_can_edit_task']    = 'T�to �lohu m��u editova� len �lenovia u�ivate�skej skupiny.';
    $lang['i_take_it']                  = 'Prevezmem to :)';
    $lang['i_finished']                 = 'Sko�il som!';
    $lang['i_dont_want']                = 'Nechcem to viac';
    $lang['take_over_project']          = 'Prevzia� projekt';
    $lang['take_over_task']             = 'Prevzia� �lohu';
    $lang['task_info']                  = 'Inform�cie o �lohe';
    $lang['project_details']            = 'Detaily projektu';
    $lang['todo_list_for']              = 'Zoznam �loh pre: ';
    $lang['due_in_sprt']                = ' (V priebehu %d dn�)';
    $lang['due_tomorrow']               = ' (Do zajtra)';
    $lang['no_assigned']                = 'Tento u��vate� nem� nekompletn� �lohy.';
    $lang['todo_list']                  = 'Zoznam �loh';
    $lang['summary_list']               = 'Zhrnutie';
    $lang['task_submit']                = 'Posla� �lohu';
    $lang['not_owner']                  = 'Pr�stup odopren�.Nie ste vlastn�k; alebo nem�te dostato�n� pr�stupov� pr�va';
    $lang['missing_values']             = 'Nie je dos� vyplnen�ch hodn�t v poli; pros�m vr�te sa a sk�ste znovu';
    $lang['future']                     = 'V bud�cnosti';
    $lang['flags']                      = 'Znak';
    $lang['owner']                      = 'Vlastn�k';
    $lang['group']                      = 'U�ivate�sk� skupina';
    $lang['by_usergroup']               = ' (pod�a skupiny)';
    $lang['by_taskgroup']               = ' (pod�a skupiny pre �lohu)';
    $lang['by_deadline']                = ' (pod�a hrani�n�ho term�nu)';
    $lang['by_status']                  = ' (pod�a stavu)';
    $lang['by_owner']                   = ' (pod�a vlastn�ka)';
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = 'Projekt, ktor� bude klonovan� :';
    $lang['task_cloned']                = '�loha, ktor� bude klonovan� :';
    $lang['note_clone']                 = 'Pozn�mka: �loha bude klonovan� ako nov� projekt';

//bits 'n' pieces
    $lang['calendar']                   = 'Kalend�r';
    $lang['normal_version']             = 'Norm�lna verzia';
    $lang['print_version']              = 'Verzia pre tla�';
    $lang['condensed_view']             = 'Z��en� poh�ad';
    $lang['full_view']                  = 'Pln� poh�ad';
    $lang['icalendar']                  = "iKalend�r";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>