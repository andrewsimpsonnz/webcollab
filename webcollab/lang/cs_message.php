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

  Language files for 'cs' (Czech)

  Translation: Lukas Moravek <moravekl at gmail.com>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-2" );

//this is the regex for input validation filter used in common.php 
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s"; //ISO-8859-x 

//dates
$month_array = array (NULL, 'Leden', '�nor', 'B�ezen', 'Duben', 'Kv�ten', '�erven', '�ervenec', 'Srpen', 'Z���', '��jen', 'Lisopad', 'Prosinec' );
$week_array = array('Ne', 'Po', '�t', 'St', '�t', 'P�', 'So' );

//task states
 
 //priorities
    $task_state['dontdo']               = "A� nebude pr�ce";
    $task_state['low']                  = "N�zk�";
    $task_state['normal']               = "Norm�ln�";
    $task_state['high']                 = "Vysok�";
    $task_state['yesterday']            = "U� te� je pozd�!";
 //status
    $task_state['new']                  = "Nov�";
    $task_state['planned']              = "Pl�novn� (neaktivn�)";
    $task_state['active']               = "Aktivn� (pracuje se na n�m)";
    $task_state['cantcomplete']         = "Pozastaven";
    $task_state['completed']            = "Dokon�en�";
    $task_state['done']                 = "Hotov�";
    $task_state['task_planned']         = " Pl�novan�";
    $task_state['task_active']          = " Aktivn�";
 //project states
    $task_state['planned_project']      = "Pl�novan� projekt (zat�m neaktivn�)";
    $task_state['no_deadline_project']  = "Bez kone�n�ho data";
    $task_state['active_project']       = "Aktivn� projekt";
    
//common items
    $lang['description']                = "Popis";
    $lang['name']                       = "Jm�no";
    $lang['add']                        = "P�idat";
    $lang['update']                     = "Aktualizovat";
    $lang['submit_changes']             = "Potvrdit zm�ny";
    $lang['continue']                   = "Pokra�ovat";
    $lang['reset']                      = "Nastavit v�choz� hodnoty";
    $lang['manage']                     = "Spravovat";
    $lang['edit']                       = "Upravit";
    $lang['delete']                     = "Smazat";
    $lang['del']                        = "Smazat";
    $lang['confirm_del_javascript']     = " Potvrdit smaz�n�!";
    $lang['yes']                        = "Ano";
    $lang['no']                         = "Ne";
    $lang['action']                     = "Akce";
    $lang['task']                       = "�kol";
    $lang['tasks']                      = "�koly";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informace";
    $lang['bytes']                      = " byt�";
    $lang['select_instruct']            = "(Pou�ijte CTRL k vybr�n� v�ce polo�ek, nebo ��dn�)";
    $lang['member_groups']              = "U�ivatel je �lenem vysv�cen�ch skupin uveden�ch n�e";
    $lang['login']                      = "Login";
    $lang['error']                      = "Chyba";
    $lang['no_login']                   = "P��stup odep�en; �patn� jem�no nebo heslo";
    $lang['redirect_sprt']              = "Automaticky budete p�esm�rov�ny na p�ihla�ovac� str�nku za %d sekund";
    $lang['login_now']                  = "Pros�m klikn�te zde pro p�ihl�en�";   
    $lang['please_login']               = "Pros�m p�ihla�te se";
    $lang['go']                         = "P�ej�t";
    
//graphic items
    $lang['late_g']                     = "&nbsp;Zpo�d�n&nbsp;";
    $lang['new_g']                      = "&nbsp;Nov�&nbsp;";
    $lang['updated_g']                  = "&nbsp;Aktualizovan�&nbsp;";

//admin config
    $lang['admin_config']               = "Nastaven� Administr�tora";
    $lang['email_settings']             = "Nastaven� hlavi�ky emailu";
    $lang['admin_email']                = "Email Administr�tora";
    $lang['email_reply']                = "Email 'odpov�d�t na'";
    $lang['email_from']                 = "Email 'od'";
    $lang['mailing_list']               = "Mailing list";
    $lang['default_checkbox']           = "V�choz� nastaven� pro Projekty/�koly";
    $lang['allow_globalaccess']         = "Povolit ��st v�em?";
    $lang['allow_group_edit']           = "Povolit editovat skupin�?";
    $lang['set_email_owner']            = "Poslat vlastn�kovy email se zm�nami?";
    $lang['set_email_group']            = "Poslat skupin� email se zm�nami?";
    $lang['project_listing_order']      = "�azen� projekt� podle";
    $lang['task_listing_order']         = "�azen� �kol� podle"; 
    $lang['configuration']              = "Nastaven�";

//archive
    $lang['archived_projects']          = "Archivovan� projekty";    

//contacts
    $lang['firstname']                  = "Jm�no:";
    $lang['lastname']                   = "P��jmen�:";
    $lang['company']                    = "Spole�nost:";
    $lang['home_phone']                 = "Telefon dom�:";
    $lang['mobile']                     = "Mobiln� telefon:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Telefon do pr�ce:";
    $lang['address']                    = "Adresa:";
    $lang['postal']                     = "Po�tovn� sm�rovac� ��slo:";
    $lang['city']                       = "M�sto:";
    $lang['email']                      = "Email:";
    $lang['notes']                      = "Pozn�mka:";
    $lang['add_contact']                = "P�idat kontakt";
    $lang['del_contact']                = "Smazat kontakt";
    $lang['contact_info']               = "Informace o kontaktu";
    $lang['contacts']                   = "Kontakty";
    $lang['contact_add_info']           = "Jestli�e bude zad�n n�zev spole�nosti, jm�no spole�nosti bude zobrazeno m�sto jm�na osoby.";
    $lang['show_contact']               = "Zobrazit kontaky";
    $lang['edit_contact']               = "Editovat kontakt";
    $lang['contact_submit']             = "Potvrdit kontakt";
    $lang['contact_warn']               = "Nedostatek �daju pro p�id�n� kontaktu; pros�m vra�te se zp�t a zadejte alespo� jm�no a p��jmen�";

 //files
    $lang['manage_files']               = "Spravovat soubory";
    $lang['no_files']                   = "��dn� soubory ke spr�v�";
    $lang['no_file_uploads']            = "Konfigurace serveru nepodporuje nahr�v�n� soubor�";
    $lang['file']                       = "Soubor:";
    $lang['uploader']                   = "Nahr�l:";
    $lang['files_assoc_project']        = "Soubory spojen� s t�mto projektem";
    $lang['files_assoc_task']           = "Soubory spojen� s t�mto �kolem";
    $lang['file_admin']                 = "Spravovat soubory";
    $lang['add_file']                   = "P�idat soubor";
    $lang['files']                      = "Soubory";
    $lang['file_choose']                = "Soubor k p�id�n�:";
    $lang['upload']                     = "P�idat";
    $lang['file_email_owner']           = "Ozn�mit vlastn�kovy projektu nov� soubor?";
    $lang['file_email_usergroup']       = "Ozn�mit skupin� nov� soubor?";
    $lang['max_file_sprt']              = "Soubor mus� b�t men�� ne� %s kb.";
    $lang['file_submit']                = "Potvrdit soubor";
    $lang['no_upload']                  = "��dn� soubor nebyl nahr�n.  Pros�m vra�te se zp�t a zkuste to znovu.";
    $lang['file_too_big_sprt']          = "Maxim�ln� velikost souboru m��e b�t %s byt�.  V� soubor byl p��li� velk� a byl smaz�n.";
    $lang['del_file_javascript_sprt']   = "Opravdu chcete smazat soubor %s ?";


 //forum
    $lang['orig_message']               = "P�vodn� zpr�va:";
    $lang['post']                       = "Odeslat";
    $lang['message']                    = "Zpr�va:";
    $lang['post_reply_sprt']            = "poslat odpove� na zpr�vu od '%1\$s' o '%2\$s'";
    $lang['post_message_sprt']          = "Poslat zp�vu: '%s'";
    $lang['forum_email_owner']          = "Poslat p��sp�vek vlastn�kovy projektu?";
    $lang['forum_email_usergroup']      = "Poslat p��sp�vek skupin�?";
    $lang['reply']                      = "Odpov�d�t";
    $lang['new_post']                   = "Nov� p��sp�vek";
    $lang['public_user_forum']          = "Ve�ejn� f�rum";
    $lang['private_forum_sprt']         = "Priv�tn� f�rum pro skupinu: %s";
    $lang['forum_submit']               = "Potvrdit f�rum";
    $lang['no_message']                 = "��dn� zpr�v�! Pros�m vratt� se zp�t a zkuste to znovu";
    $lang['add_reply']                  = "P�idat zpr�vu";
    $lang['last_post_sprt']             = "Posledn� p��sp�vek: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Ned�vn� p��sp�vky ve f�ru";      
//**
    $lang['last_post_sprt']             = "Last post %s"; //Note to translators: context is 'Last post 2004-Dec-22'
//**
    $lang['recent_posts']               = "Recent forum posts";
//**
    $lang['forum_search']               = "Forum search";
//**
    $lang['no_results']                 = "No results found for '%s'";
//**
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "Report";
    $lang['warning']                    = "<h1>Omlouv�me se!</h1><p>V tuto chv�li nejsme schopn� prov�st V� po�adavek. Pros�m zkuste to pozd�ji.</p>";
    $lang['home_page']                  = "Dom�c� str�nka";
    $lang['summary_page']               = "Shrnut�";
    $lang['todo_list']                  = "�koly";
    $lang['calendar']                   = "Kalend��";
    $lang['log_out']                    = "Odhl�sit";
    $lang['main_menu']                  = "Hlavn� nab�dka";
    $lang['archive']                    = "Archiv";   
    $lang['user_homepage_sprt']         = "%s";
    $lang['missing_field_javascript']   = "Pros�m vlo�te hodnoty do chyb�jc�ho pole";
    $lang['invalid_date_javascript']    = "Pros�m zadejte spr�vn� datum";
    $lang['finish_date_javascript']     = "Zadan� datum nastane a� po datu skon�en� projektu!";
    $lang['security_manager']           = "Spr�vce zabezpe�en�";
    $lang['session_timeout_sprt']       = "P��stup odep�en; Posledn� aktivita byla p�ed %1\$d minutami, �asov� limit je %2\$d minut; pros�m <a href=\"%3\$sindex.php\">p�ihla�te se</a>";
    $lang['access_denied']              = "P��stup odep�en";
    $lang['private_usergroup']          = "Omlouv�me se; tato oblast je priv�tn� skupiny, nem�te dostate�n� pr�va.";
    $lang['invalid_date']               = "�patn� zadan� datum";
    $lang['invalid_date_sprt']          = "Zadan� datum %s nen� spr�vn� (Zkontrolujte po�et dn� v m�s�ci).<br />Pros�m vra�te se zp�t a zadejte spr�vn� datum.";


 //taskgroups
    $lang['taskgroup_name']             = "N�zev pracovn� skupiny:";
    $lang['taskgroup_description']      = "Popis pracovn� skupiny:";
    $lang['add_taskgroup']              = "P�idat pracovn� skupinu";
    $lang['add_new_taskgroup']          = "P�idat novou pracovn� skupinu";
    $lang['edit_taskgroup']             = "Editovat pracovn� skupinu";
    $lang['taskgroup_manage']           = "Spr�va pracovn� skupiny";
    $lang['no_taskgroups']              = "��dn� pracovn� skupina nen� definov�na";
    $lang['manage_taskgroups']          = "Spravovat pracovn� skupiny";
    $lang['taskgroups']                 = "Pracovn� skupina";
    $lang['taskgroup_dup_sprt']         = "Pracovn� skupina '%s' existuje.  Pros�m vra�te se zp�t a zvolte jin� n�zev.";
    $lang['info_taskgroup_manage']      = "Info pro spr�vu pracovn�ch skupin";

 //usergroups
    $lang['usergroup_name']             = "N�zev skupiny:";
    $lang['usergroup_description']      = "Popis skupiny:";
    $lang['members']                    = "�lenov� skupiny:";
    $lang['private_usergroup']          = "Priv�tn� skupina";
    $lang['add_usergroup']              = "P�idat skupinu";
    $lang['add_new_usergroup']          = "P�idat novou skupinu";
    $lang['edit_usergroup']             = "Editovat skupinu";
    $lang['usergroup_manage']           = "Spr�va skupin";
    $lang['no_usergroups']              = "��dn� skupina nen� definov�na";
    $lang['manage_usergroups']          = "Spravovat skupiny";
    $lang['usergroups']                 = "Skupina";
    $lang['usergroup_dup_sprt']         = "Skupina '%s' existuje.  Pros�m vra�te se zp�t a zvolte nov� n�zev.";
    $lang['info_usergroup_manage']      = "N�pov�da ke spr�v� skupin";

 //users
    $lang['login_name']                 = "P�ihla�ovac� jm�no";
    $lang['full_name']                  = "Cel� jm�no";
    $lang['password']                   = "Heslo";
    $lang['blank_for_current_password'] = "(Zanechte pr�zdn�, pokud chcete ponechat st�vaj�c� heslo)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Administr�tor";
    $lang['private_user']               = "Priv�tn� u�ivatel";
    $lang['normal_user']                = "Norm�ln� u�ivatel"; 
    $lang['is_admin']                   = "Administr�tor";
    $lang['is_guest']                   = "Host";
    $lang['guest']                      = "Host";
    $lang['user_info']                  = "Informace o u�ivateli";
    $lang['deleted_users']              = "Smazan� u�ivatel�";
    $lang['no_deleted_users']           = "��dn� smazan� u�ivatel�.";
    $lang['revive']                     = "O�ivit";
    $lang['permdel']                    = "Smazat na trvalo";
    $lang['permdel_javascript_sprt']    = "T�mto sma�ete ve�ker� z�znamy u�ivatele %s v�etn� p�idru�en�ch �loh (projekt�). Opravdu chcete pokra�ovat?";
    $lang['add_user']                   = "P�idat u�ivatele";
    $lang['edit_user']                  = "Editovat u�ivatele";
    $lang['no_users']                   = "��dn� u�ivatel� nejsou zNo users are zn�m� syst�mu";
    $lang['users']                      = "U�ivatel";
    $lang['existing_users']             = "Seznam u�ivatel�";
    $lang['private_profile']            = "Tento u�ivatel m� priv�tn� profil, kter� nem��e b�t V�mi zobrazen.";
    $lang['private_usergroup_profile']  = "(Tetno u�ivatel je �lenem priv�tn� skupiny, kter� a nem��e b�t V�mi zobrazena)";
    $lang['email_users']                = "Poslat email";
    $lang['select_usergroup']           = "Skupinu/y uvedenou n�e:";
    $lang['subject']                    = "P�edm�t:";
    $lang['message_sent_maillist']      = "Tento email je tak� posl�n v�em uveden�m v \"Mailing list\".";
    $lang['who_online']                 = "P�ihl�en� u�ivatel�";
    $lang['edit_details']               = "Editovat detaily u�ivatele";
    $lang['show_details']               = "Zobrazit detaily u�ivatele";
    $lang['user_deleted']               = "Tento u�ivatel byl smaz�n!";
    $lang['no_usergroup']               = "Tento u�ivatel nen� �len�m ��dn� skupiny";
    $lang['not_usergroup']              = "(Nen� �lenem ��dn� skupiny)";
    $lang['no_password_change']         = "(Va�e heslo nebylo zm�n�no)";
    $lang['last_time_here']             = "Posledn� n�v�t�va:";
    $lang['number_items_created']       = "Po�et vytvo�en�ch polo�ek:";
    $lang['number_projects_owned']      = "Po�et vlastn�n�ch projekt�:";
    $lang['number_tasks_owned']         = "Po�et vlastn�n�ch �kol�:";
    $lang['number_tasks_completed']     = "Po�et dokon�en�ch �loh:";
    $lang['number_forum']               = "Po�et p��sp�vk� ve f�ru:";
    $lang['number_files']               = "Po�et nahran�ch soubor�:";
    $lang['size_all_files']             = "Celkov� velikost v�ech vlastn�n�ch soubor�:";
    $lang['owned_tasks']                = "Vlastn�n� �lohy";
    $lang['invalid_email']              = "Neplatn� emailov� adresa";
    $lang['invalid_email_given_sprt']   = "Emailov� adresa '%s' je nespr�vn� zadan�.  Pros�m vra�te se zp�t a zkuste to znovu.";
    $lang['duplicate_user']             = "Duplikovat u�ivatele";
    $lang['duplicate_change_user_sprt'] = "U�ivatel '%s' existuje.  pros�m vra�te se zp�t a zm�nte jm�no.";
    $lang['value_missing']              = "Chyb� hodnota";
    $lang['field_sprt']                 = "Pole pro '%s' nen� zad�no. Pros�m vra�te se zp�t a dopl�te �daje.";
    $lang['admin_priv']                 = "NOTE: You have been granted administrator privileges. -- NOTE: P�i�lil jste administr�torsk� pr�va";
    $lang['manage_users']               = "Spravovat u�ivatele";
    $lang['users_online']               = "P�ihl�en� u�ivatel�";
    $lang['online']                     = "Posledn� u�ivatel� (P�ihl�en� m�n� ne� p�ed 60 minutami)";
    $lang['not_online']                 = "Ostatn�";
    $lang['user_activity']              = "Aktivita u�ivatel�";

  //tasks
    $lang['add_new_task']               = "P�idat nov� �kol";
    $lang['priority']                   = "Priorita";
    $lang['parent_task']                = "P�edch�dce";
    $lang['creation_time']              = "Datum zad�n�";
    $lang['by_sprt']                    = "%1\$s u�ivatelem %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "N�zev projektu";
    $lang['task_name']                  = "N�zev �kolu";
    $lang['deadline']                   = "Term�n ukon�en�";
    $lang['taken_from_parent']          = "(P�evzat� od p�edch�dce)";
    $lang['status']                     = "Stav";
    $lang['task_owner']                 = "Vlastn�k �kolu";
    $lang['project_owner']              = "Vlastn�k projektu";
    $lang['taskgroup']                  = "Pracovn� skupina";
    $lang['usergroup']                  = "Skupina";
    $lang['nobody']                     = "Nikto";
    $lang['none']                       = "��dn�";
    $lang['no_group']                   = "��dn� skupina";
    $lang['all_groups']                 = "V�echny skupiny";
    $lang['all_users']                  = "V�ichni u�ivatel�";
    $lang['all_users_view']             = "Povolit v�em ��st?";
    $lang['group_edit']                 = "Povolit skupin� m�nit?";
    $lang['project_description']        = "Popis projektu:";
    $lang['task_description']           = "Popis �kolu";
    $lang['email_owner']                = "Poslat vlastn�kovy email se zm�nami?";
    $lang['email_new_owner']            = "Poslat nov�mu vlastn�kovy email se zm�nami?";
    $lang['email_group']                = "Poslat skupin� email se zm�nami?";
    $lang['add_new_project']            = "Zadat nov� projekt";
    $lang['uncategorised']              = "Neza�azen�";
    $lang['due_sprt']                   = "%d dn� od te�";
    $lang['tomorrow']                   = "Z�tra";
    $lang['due_today']                  = "Dnes";
    $lang['overdue_1']                  = "1. den spo�d�n";
    $lang['overdue_sprt']               = "%d. den spo�d�n";
    $lang['edit_task']                  = "Editovat �kol";
    $lang['edit_project']               = "Editovat projekt";
    $lang['no_reparent']                = "��dn� (samostatn� projekt)";
    $lang['del_javascript_project_sprt']= "Opravdu chcete smazat projekt %s ?";
    $lang['del_javascript_task_sprt']   = "Opravdu chcete smazat �kol %s ?";
    $lang['add_task']                   = "P�idat �kol";
    $lang['add_subtask']                = "P�idat pod�kol";
    $lang['add_project']                = "P�idat projekt";
    $lang['clone_project']              = "Klonovat projekt";
    $lang['clone_task']                 = "Klonovat �kol";
    $lang['quick_jump']                 = "P�ej�t na";
    $lang['no_edit']                    = "Nejste vlastn�kem polo�ky proto ji nem��ete m�nit";
    $lang['uncategorised']              = "Neza�azen�";
    $lang['admin']                      = "Administr�tor";
    $lang['global']                     = "Ostatn�";
    $lang['delete_project']             = "Smazat projekt";
    $lang['delete_task']                = "Smazat �kol";
    $lang['project_options']            = "Mo�nosti projekt�";
    $lang['task_options']               = "Mo�nosti �kol�";
    $lang['javascript_archive_project'] = "Chcete opravdu archivovat projekt %s ?";
    $lang['archive_project']            = "Archivovat projekt";
    $lang['task_navigation']            = "Navigace";
    $lang['new_task']                   = "Nov� �kol";    
    $lang['no_projects']                = "Nejsou zde ��dn� projekty";
    $lang['show_all_projects']          = "V�echny projekty";
    $lang['show_active_projects']       = "Pouze aktivn� projekty";
    $lang['project_hold_sprt']          = "Projekt pozdr�en od %s";
    $lang['project_planned']            = "Pl�novan� projekt";
    $lang['percent_sprt']               = "Hotovo %d%%";
    $lang['project_no_deadline']        = "Pro tento projekt nebylo stanoveno kone�n� datum";
    $lang['no_allowed_projects']        = "Nejsou zde ��dn� projekty, do kter�ch m�te pr�vo nahl�et";
    $lang['projects']                   = "Projekty";
    $lang['percent_project_sprt']       = "Tento projekt je hotov na %d%%";
    $lang['owned_by']                   = "Vlastn�kem je";
    $lang['created_on']                 = "Zad�n dne";
    $lang['completed_on']               = "Dokon�en dne";
    $lang['modified_on']                = "Zm�n�n dne";
    $lang['project_on_hold']            = "Projekt je pozastaven";
    $lang['project_accessible']         = "(Tento projekt je p��stupn� v�em u�ivatel�m)";
    $lang['task_accessible']            = "(Tanto �kol je p��stupn� v�em u�ivatel�m)";
    $lang['project_not_accessible']     = "(Tento projekt je p��stupn� pouze �len�m skupiny)";
    $lang['task_not_accessible']        = "(Tento �kol je p��stupn� pouze �len�m skupiny)";
    $lang['project_not_in_usergroup']   = "Tento projekt nen� ve vlastn�ctv� ��dn� skupiny a je p��stupn� v�em u�ivatel�m.";
    $lang['task_not_in_usergroup']      = "Tento �kol nen� ve vlastn�ctv� ��dn� skupiny a je p��stupn� v�em u�ivatel�m.";
    $lang['usergroup_can_edit_project'] = "Tento projekt m��e b�t editov�n pouze �leny skupiny.";
    $lang['usergroup_can_edit_task']    = "Tento �kol m��e b�t editov�n pouze �leny skupiny.";
    $lang['i_take_it']                  = "P�evez�t";
    $lang['i_finished']                 = "Dokon�eno";
    $lang['i_dont_want']                = "P�enechat";
    $lang['take_over_project']          = "P�evz�t vlastnictv� nad projektem";
    $lang['take_over_task']             = "P�evz�t vlastnictv� nad �kolem";
    $lang['task_info']                  = "Informace o �kolu";
    $lang['project_details']            = "Detaily projektu";
    $lang['todo_list_for']              = "Seznam �kol� pro: ";
    $lang['due_in_sprt']                = " (B�hem %d dn�)";
    $lang['due_tomorrow']               = " (B�hem z�t�ka)";
    $lang['no_assigned']                = "��dn� nedokon�en� �lohy p�i�azen� tomuto u�ivateli.";
    $lang['todo_list']                  = "�koly";
    $lang['summary_list']               = "Souhrnn� seznam";
    $lang['task_submit']                = "Potvrdit �kol";
    $lang['not_owner']                  = "P��stup odep�en. Nejste vlastn�k, nebo nem�te dostate�n� pr�va";
    $lang['missing_values']             = "Nejsou zadan� pot�ebn� hodnoty; pros�m vra�te se zp�t a zkuste to znovu";
    $lang['future']                     = "V budoucnu";
    $lang['flags']                      = "P��znaky";
    $lang['owner']                      = "Vlastn�k";
    $lang['group']                      = "Skupina";
    $lang['by_usergroup']               = " (podle skupiny)";
    $lang['by_taskgroup']               = " (podle pracon� skupiny)";
    $lang['by_deadline']                = " (podle term�nu ukon�en�)";
    $lang['by_status']                  = " (podle statusu)";
    $lang['by_owner']                   = " (podle vlastn�ka)";
    $lang['project_cloned']             = "Projekt ke klonovan� :";
    $lang['task_cloned']                = "�kol ke klonov�n� :";
    $lang['note_clone']                 = "Pozn�mka: �kol bude naklonov�n jako nov� projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalend��";
    $lang['normal_version']             = "Zp�t";
    $lang['print_version']              = "Verze pro tisk";
    $lang['condensed_view']             = "Zkr�cen� v�b�r";
    $lang['full_view']                  = "Pln� zobrazen�";
//**
    $lang['icalendar']                  = "iCalendar";

?>
