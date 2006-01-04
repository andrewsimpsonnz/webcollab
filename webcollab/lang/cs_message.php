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
$month_array = array (NULL, 'Leden', 'Únor', 'Bøezen', 'Duben', 'Kvìten', 'Èerven', 'Èervenec', 'Srpen', 'Záøí', 'Øíjen', 'Lisopad', 'Prosinec' );
$week_array = array('Ne', 'Po', 'Út', 'St', 'Èt', 'Pá', 'So' );

//task states
 
 //priorities
    $task_state['dontdo']               = "A¾ nebude práce";
    $task_state['low']                  = "Nízká";
    $task_state['normal']               = "Normální";
    $task_state['high']                 = "Vysoká";
    $task_state['yesterday']            = "U¾ teï je pozdì!";
 //status
    $task_state['new']                  = "Nový";
    $task_state['planned']              = "Plánovný (neaktivní)";
    $task_state['active']               = "Aktivní (pracuje se na nìm)";
    $task_state['cantcomplete']         = "Pozastaven";
    $task_state['completed']            = "Dokonèený";
    $task_state['done']                 = "Hotový";
    $task_state['task_planned']         = " Plánovaný";
    $task_state['task_active']          = " Aktivní";
 //project states
    $task_state['planned_project']      = "Plánovaný projekt (zatím neaktivní)";
    $task_state['no_deadline_project']  = "Bez koneèného data";
    $task_state['active_project']       = "Aktivní projekt";
    
//common items
    $lang['description']                = "Popis";
    $lang['name']                       = "Jméno";
    $lang['add']                        = "Pøidat";
    $lang['update']                     = "Aktualizovat";
    $lang['submit_changes']             = "Potvrdit zmìny";
    $lang['continue']                   = "Pokraèovat";
    $lang['reset']                      = "Nastavit výchozí hodnoty";
    $lang['manage']                     = "Spravovat";
    $lang['edit']                       = "Upravit";
    $lang['delete']                     = "Smazat";
    $lang['del']                        = "Smazat";
    $lang['confirm_del_javascript']     = " Potvrdit smazání!";
    $lang['yes']                        = "Ano";
    $lang['no']                         = "Ne";
    $lang['action']                     = "Akce";
    $lang['task']                       = "Úkol";
    $lang['tasks']                      = "Úkoly";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Informace";
    $lang['bytes']                      = " bytù";
    $lang['select_instruct']            = "(Pou¾ijte CTRL k vybrání více polo¾ek, nebo ¾ádné)";
    $lang['member_groups']              = "U¾ivatel je èlenem vysvícených skupin uvedených ní¾e";
    $lang['login']                      = "Login";
    $lang['error']                      = "Chyba";
    $lang['no_login']                   = "Pøístup odepøen; ¹patné jeméno nebo heslo";
    $lang['redirect_sprt']              = "Automaticky budete pøesmìrovány na pøihla¹ovací stránku za %d sekund";
    $lang['login_now']                  = "Prosím kliknìte zde pro pøihlá¹ení";   
    $lang['please_login']               = "Prosím pøihla¹te se";
    $lang['go']                         = "Pøejít";
    
//graphic items
    $lang['late_g']                     = "&nbsp;Zpo¾dìn&nbsp;";
    $lang['new_g']                      = "&nbsp;Nový&nbsp;";
    $lang['updated_g']                  = "&nbsp;Aktualizovaný&nbsp;";

//admin config
    $lang['admin_config']               = "Nastavení Administrátora";
    $lang['email_settings']             = "Nastavení hlavièky emailu";
    $lang['admin_email']                = "Email Administrátora";
    $lang['email_reply']                = "Email 'odpovìdìt na'";
    $lang['email_from']                 = "Email 'od'";
    $lang['mailing_list']               = "Mailing list";
    $lang['default_checkbox']           = "Výchozí nastavení pro Projekty/Úkoly";
    $lang['allow_globalaccess']         = "Povolit èíst v¹em?";
    $lang['allow_group_edit']           = "Povolit editovat skupinì?";
    $lang['set_email_owner']            = "Poslat vlastníkovy email se zmìnami?";
    $lang['set_email_group']            = "Poslat skupinì email se zmìnami?";
    $lang['project_listing_order']      = "Øazení projektù podle";
    $lang['task_listing_order']         = "Øazení úkolù podle"; 
    $lang['configuration']              = "Nastavení";

//archive
    $lang['archived_projects']          = "Archivované projekty";    

//contacts
    $lang['firstname']                  = "Jméno:";
    $lang['lastname']                   = "Pøíjmení:";
    $lang['company']                    = "Spoleènost:";
    $lang['home_phone']                 = "Telefon domù:";
    $lang['mobile']                     = "Mobilní telefon:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Telefon do práce:";
    $lang['address']                    = "Adresa:";
    $lang['postal']                     = "Po¹tovní smìrovací èíslo:";
    $lang['city']                       = "Mìsto:";
    $lang['email']                      = "Email:";
    $lang['notes']                      = "Poznámka:";
    $lang['add_contact']                = "Pøidat kontakt";
    $lang['del_contact']                = "Smazat kontakt";
    $lang['contact_info']               = "Informace o kontaktu";
    $lang['contacts']                   = "Kontakty";
    $lang['contact_add_info']           = "Jestli¾e bude zadán název spoleènosti, jméno spoleènosti bude zobrazeno místo jména osoby.";
    $lang['show_contact']               = "Zobrazit kontaky";
    $lang['edit_contact']               = "Editovat kontakt";
    $lang['contact_submit']             = "Potvrdit kontakt";
    $lang['contact_warn']               = "Nedostatek údaju pro pøidání kontaktu; prosím vra»te se zpìt a zadejte alespoò jméno a pøíjmení";

 //files
    $lang['manage_files']               = "Spravovat soubory";
    $lang['no_files']                   = "®ádné soubory ke správì";
    $lang['no_file_uploads']            = "Konfigurace serveru nepodporuje nahrávání souborù";
    $lang['file']                       = "Soubor:";
    $lang['uploader']                   = "Nahrál:";
    $lang['files_assoc_project']        = "Soubory spojené s tímto projektem";
    $lang['files_assoc_task']           = "Soubory spojené s tímto úkolem";
    $lang['file_admin']                 = "Spravovat soubory";
    $lang['add_file']                   = "Pøidat soubor";
    $lang['files']                      = "Soubory";
    $lang['file_choose']                = "Soubor k pøidání:";
    $lang['upload']                     = "Pøidat";
    $lang['file_email_owner']           = "Oznámit vlastníkovy projektu nový soubor?";
    $lang['file_email_usergroup']       = "Oznámit skupinì nový soubor?";
    $lang['max_file_sprt']              = "Soubor musí být men¹í ne¾ %s kb.";
    $lang['file_submit']                = "Potvrdit soubor";
    $lang['no_upload']                  = "®ádný soubor nebyl nahrán.  Prosím vra»te se zpìt a zkuste to znovu.";
    $lang['file_too_big_sprt']          = "Maximální velikost souboru mù¾e být %s bytù.  Vá¹ soubor byl pøíli¹ velký a byl smazán.";
    $lang['del_file_javascript_sprt']   = "Opravdu chcete smazat soubor %s ?";


 //forum
    $lang['orig_message']               = "Pùvodní zpráva:";
    $lang['post']                       = "Odeslat";
    $lang['message']                    = "Zpráva:";
    $lang['post_reply_sprt']            = "poslat odpoveï na zprávu od '%1\$s' o '%2\$s'";
    $lang['post_message_sprt']          = "Poslat zpávu: '%s'";
    $lang['forum_email_owner']          = "Poslat pøíspìvek vlastníkovy projektu?";
    $lang['forum_email_usergroup']      = "Poslat pøíspìvek skupinì?";
    $lang['reply']                      = "Odpovìdìt";
    $lang['new_post']                   = "Nový pøíspìvek";
    $lang['public_user_forum']          = "Veøejné fórum";
    $lang['private_forum_sprt']         = "Privátní fórum pro skupinu: %s";
    $lang['forum_submit']               = "Potvrdit fórum";
    $lang['no_message']                 = "®ádné zprávý! Prosím vrattì se zpìt a zkuste to znovu";
    $lang['add_reply']                  = "Pøidat zprávu";
    $lang['last_post_sprt']             = "Poslední pøíspìvek: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedávné pøíspìvky ve fóru";      
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
    $lang['warning']                    = "<h1>Omlouváme se!</h1><p>V tuto chvýli nejsme schopní provést Vá¹ po¾adavek. Prosím zkuste to pozdìji.</p>";
    $lang['home_page']                  = "Domácí stránka";
    $lang['summary_page']               = "Shrnutí";
    $lang['todo_list']                  = "Úkoly";
    $lang['calendar']                   = "Kalendáø";
    $lang['log_out']                    = "Odhlásit";
    $lang['main_menu']                  = "Hlavní nabídka";
    $lang['archive']                    = "Archiv";   
    $lang['user_homepage_sprt']         = "%s";
    $lang['missing_field_javascript']   = "Prosím vlo¾te hodnoty do chybìjcího pole";
    $lang['invalid_date_javascript']    = "Prosím zadejte správné datum";
    $lang['finish_date_javascript']     = "Zadané datum nastane a¾ po datu skonèení projektu!";
    $lang['security_manager']           = "Správce zabezpeèení";
    $lang['session_timeout_sprt']       = "Pøístup odepøen; Poslední aktivita byla pøed %1\$d minutami, èasový limit je %2\$d minut; prosím <a href=\"%3\$sindex.php\">pøihla¹te se</a>";
    $lang['access_denied']              = "Pøístup odepøen";
    $lang['private_usergroup']          = "Omlouváme se; tato oblast je privátní skupiny, nemáte dostateèná práva.";
    $lang['invalid_date']               = "©patnì zadané datum";
    $lang['invalid_date_sprt']          = "Zadané datum %s není správné (Zkontrolujte poèet dní v mìsíci).<br />Prosím vra»te se zpìt a zadejte správné datum.";


 //taskgroups
    $lang['taskgroup_name']             = "Název pracovní skupiny:";
    $lang['taskgroup_description']      = "Popis pracovní skupiny:";
    $lang['add_taskgroup']              = "Pøidat pracovní skupinu";
    $lang['add_new_taskgroup']          = "Pøidat novou pracovní skupinu";
    $lang['edit_taskgroup']             = "Editovat pracovní skupinu";
    $lang['taskgroup_manage']           = "Správa pracovní skupiny";
    $lang['no_taskgroups']              = "®ádná pracovní skupina není definována";
    $lang['manage_taskgroups']          = "Spravovat pracovní skupiny";
    $lang['taskgroups']                 = "Pracovní skupina";
    $lang['taskgroup_dup_sprt']         = "Pracovní skupina '%s' existuje.  Prosím vra»te se zpìt a zvolte jiný název.";
    $lang['info_taskgroup_manage']      = "Info pro správu pracovních skupin";

 //usergroups
    $lang['usergroup_name']             = "Název skupiny:";
    $lang['usergroup_description']      = "Popis skupiny:";
    $lang['members']                    = "Èlenové skupiny:";
    $lang['private_usergroup']          = "Privátní skupina";
    $lang['add_usergroup']              = "Pøidat skupinu";
    $lang['add_new_usergroup']          = "Pøidat novou skupinu";
    $lang['edit_usergroup']             = "Editovat skupinu";
    $lang['usergroup_manage']           = "Správa skupin";
    $lang['no_usergroups']              = "®ádná skupina není definována";
    $lang['manage_usergroups']          = "Spravovat skupiny";
    $lang['usergroups']                 = "Skupina";
    $lang['usergroup_dup_sprt']         = "Skupina '%s' existuje.  Prosím vra»te se zpìt a zvolte nový název.";
    $lang['info_usergroup_manage']      = "Nápovìda ke správì skupin";

 //users
    $lang['login_name']                 = "Pøihla¹ovací jméno";
    $lang['full_name']                  = "Celé jméno";
    $lang['password']                   = "Heslo";
    $lang['blank_for_current_password'] = "(Zanechte prázdné, pokud chcete ponechat stávající heslo)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Administrátor";
    $lang['private_user']               = "Privátní u¾ivatel";
    $lang['normal_user']                = "Normální u¾ivatel"; 
    $lang['is_admin']                   = "Administrátor";
    $lang['is_guest']                   = "Host";
    $lang['guest']                      = "Host";
    $lang['user_info']                  = "Informace o u¾ivateli";
    $lang['deleted_users']              = "Smazaní u¾ivatelé";
    $lang['no_deleted_users']           = "®ádní smazaní u¾ivatelé.";
    $lang['revive']                     = "O¾ivit";
    $lang['permdel']                    = "Smazat na trvalo";
    $lang['permdel_javascript_sprt']    = "Tímto sma¾ete ve¹keré záznamy u¾ivatele %s vèetnì pøidru¾ených úloh (projektù). Opravdu chcete pokraèovat?";
    $lang['add_user']                   = "Pøidat u¾ivatele";
    $lang['edit_user']                  = "Editovat u¾ivatele";
    $lang['no_users']                   = "®ádní u¾ivatelé nejsou zNo users are známý systému";
    $lang['users']                      = "U¾ivatel";
    $lang['existing_users']             = "Seznam u¾ivatelù";
    $lang['private_profile']            = "Tento u¾ivatel má privátní profil, který nemù¾e být Vámi zobrazen.";
    $lang['private_usergroup_profile']  = "(Tetno u¾ivatel je èlenem privátní skupiny, která a nemù¾e být Vámi zobrazena)";
    $lang['email_users']                = "Poslat email";
    $lang['select_usergroup']           = "Skupinu/y uvedenou ní¾e:";
    $lang['subject']                    = "Pøedmìt:";
    $lang['message_sent_maillist']      = "Tento email je také poslán v¹em uvedeným v \"Mailing list\".";
    $lang['who_online']                 = "Pøihlá¹ení u¾ivatelé";
    $lang['edit_details']               = "Editovat detaily u¾ivatele";
    $lang['show_details']               = "Zobrazit detaily u¾ivatele";
    $lang['user_deleted']               = "Tento u¾ivatel byl smazán!";
    $lang['no_usergroup']               = "Tento u¾ivatel není èleném ¾ádné skupiny";
    $lang['not_usergroup']              = "(Není èlenem ¾ádné skupiny)";
    $lang['no_password_change']         = "(Va¹e heslo nebylo zmìnìno)";
    $lang['last_time_here']             = "Poslední náv¹tìva:";
    $lang['number_items_created']       = "Poèet vytvoøených polo¾ek:";
    $lang['number_projects_owned']      = "Poèet vlastnìných projektù:";
    $lang['number_tasks_owned']         = "Poèet vlastnìných úkolù:";
    $lang['number_tasks_completed']     = "Poèet dokonèených úloh:";
    $lang['number_forum']               = "Poèet pøíspìvkù ve fóru:";
    $lang['number_files']               = "Poèet nahraných souborù:";
    $lang['size_all_files']             = "Celková velikost v¹ech vlastnìných souborù:";
    $lang['owned_tasks']                = "Vlastnìné úlohy";
    $lang['invalid_email']              = "Neplatná emailová adresa";
    $lang['invalid_email_given_sprt']   = "Emailová adresa '%s' je nesprávnì zadaná.  Prosím vra»te se zpìt a zkuste to znovu.";
    $lang['duplicate_user']             = "Duplikovat u¾ivatele";
    $lang['duplicate_change_user_sprt'] = "U¾ivatel '%s' existuje.  prosím vra»te se zpìt a zmìnte jméno.";
    $lang['value_missing']              = "Chybí hodnota";
    $lang['field_sprt']                 = "Pole pro '%s' není zadáno. Prosím vra»te se zpìt a doplòte ùdaje.";
    $lang['admin_priv']                 = "NOTE: You have been granted administrator privileges. -- NOTE: Pøiìlil jste administrátorské práva";
    $lang['manage_users']               = "Spravovat u¾ivatele";
    $lang['users_online']               = "Pøihlá¹ení u¾ivatelé";
    $lang['online']                     = "Poslední u¾ivatelé (Pøihlá¹ený ménì ne¾ pøed 60 minutami)";
    $lang['not_online']                 = "Ostatní";
    $lang['user_activity']              = "Aktivita u¾ivatelù";

  //tasks
    $lang['add_new_task']               = "Pøidat nový úkol";
    $lang['priority']                   = "Priorita";
    $lang['parent_task']                = "Pøedchùdce";
    $lang['creation_time']              = "Datum zadání";
    $lang['by_sprt']                    = "%1\$s u¾ivatelem %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Název projektu";
    $lang['task_name']                  = "Název úkolu";
    $lang['deadline']                   = "Termín ukonèení";
    $lang['taken_from_parent']          = "(Pøevzatý od pøedchùdce)";
    $lang['status']                     = "Stav";
    $lang['task_owner']                 = "Vlastník ùkolu";
    $lang['project_owner']              = "Vlastník projektu";
    $lang['taskgroup']                  = "Pracovní skupina";
    $lang['usergroup']                  = "Skupina";
    $lang['nobody']                     = "Nikto";
    $lang['none']                       = "®ádná";
    $lang['no_group']                   = "®ádná skupina";
    $lang['all_groups']                 = "V¹echny skupiny";
    $lang['all_users']                  = "V¹ichni u¾ivatelé";
    $lang['all_users_view']             = "Povolit v¹em èíst?";
    $lang['group_edit']                 = "Povolit skupinì mìnit?";
    $lang['project_description']        = "Popis projektu:";
    $lang['task_description']           = "Popis úkolu";
    $lang['email_owner']                = "Poslat vlastníkovy email se zmìnami?";
    $lang['email_new_owner']            = "Poslat novému vlastníkovy email se zmìnami?";
    $lang['email_group']                = "Poslat skupinì email se zmìnami?";
    $lang['add_new_project']            = "Zadat nový projekt";
    $lang['uncategorised']              = "Nezaøazený";
    $lang['due_sprt']                   = "%d dní od teï";
    $lang['tomorrow']                   = "Zítra";
    $lang['due_today']                  = "Dnes";
    $lang['overdue_1']                  = "1. den spo¾dìn";
    $lang['overdue_sprt']               = "%d. den spo¾dìn";
    $lang['edit_task']                  = "Editovat úkol";
    $lang['edit_project']               = "Editovat projekt";
    $lang['no_reparent']                = "®ádný (samostatný projekt)";
    $lang['del_javascript_project_sprt']= "Opravdu chcete smazat projekt %s ?";
    $lang['del_javascript_task_sprt']   = "Opravdu chcete smazat úkol %s ?";
    $lang['add_task']                   = "Pøidat úkol";
    $lang['add_subtask']                = "Pøidat podùkol";
    $lang['add_project']                = "Pøidat projekt";
    $lang['clone_project']              = "Klonovat projekt";
    $lang['clone_task']                 = "Klonovat úkol";
    $lang['quick_jump']                 = "Pøejít na";
    $lang['no_edit']                    = "Nejste vlastníkem polo¾ky proto ji nemù¾ete mìnit";
    $lang['uncategorised']              = "Nezaøazený";
    $lang['admin']                      = "Administrátor";
    $lang['global']                     = "Ostatní";
    $lang['delete_project']             = "Smazat projekt";
    $lang['delete_task']                = "Smazat úkol";
    $lang['project_options']            = "Mo¾nosti projektù";
    $lang['task_options']               = "Mo¾nosti úkolù";
    $lang['javascript_archive_project'] = "Chcete opravdu archivovat projekt %s ?";
    $lang['archive_project']            = "Archivovat projekt";
    $lang['task_navigation']            = "Navigace";
    $lang['new_task']                   = "Nový ùkol";    
    $lang['no_projects']                = "Nejsou zde ¾ádné projekty";
    $lang['show_all_projects']          = "V¹echny projekty";
    $lang['show_active_projects']       = "Pouze aktivní projekty";
    $lang['project_hold_sprt']          = "Projekt pozdr¾en od %s";
    $lang['project_planned']            = "Plánovaný projekt";
    $lang['percent_sprt']               = "Hotovo %d%%";
    $lang['project_no_deadline']        = "Pro tento projekt nebylo stanoveno koneèné datum";
    $lang['no_allowed_projects']        = "Nejsou zde ¾ádné projekty, do kterých máte právo nahlí¾et";
    $lang['projects']                   = "Projekty";
    $lang['percent_project_sprt']       = "Tento projekt je hotov na %d%%";
    $lang['owned_by']                   = "Vlastníkem je";
    $lang['created_on']                 = "Zadán dne";
    $lang['completed_on']               = "Dokonèen dne";
    $lang['modified_on']                = "Zmìnìn dne";
    $lang['project_on_hold']            = "Projekt je pozastaven";
    $lang['project_accessible']         = "(Tento projekt je pøístupný v¹em u¾ivatelùm)";
    $lang['task_accessible']            = "(Tanto úkol je pøístupný v¹em u¾ivatelùm)";
    $lang['project_not_accessible']     = "(Tento projekt je pøístupný pouze èlenùm skupiny)";
    $lang['task_not_accessible']        = "(Tento úkol je pøístupný pouze èlenùm skupiny)";
    $lang['project_not_in_usergroup']   = "Tento projekt není ve vlastníctvý ¾ádné skupiny a je pøístupný v¹em u¾ivatelùm.";
    $lang['task_not_in_usergroup']      = "Tento úkol není ve vlastníctvý ¾ádné skupiny a je pøístupný v¹em u¾ivatelùm.";
    $lang['usergroup_can_edit_project'] = "Tento projekt mù¾e být editován pouze èleny skupiny.";
    $lang['usergroup_can_edit_task']    = "Tento ùkol mù¾e být editován pouze èleny skupiny.";
    $lang['i_take_it']                  = "Pøevezít";
    $lang['i_finished']                 = "Dokonèeno";
    $lang['i_dont_want']                = "Pøenechat";
    $lang['take_over_project']          = "Pøevzít vlastnictvý nad projektem";
    $lang['take_over_task']             = "Pøevzít vlastnictvý nad úkolem";
    $lang['task_info']                  = "Informace o úkolu";
    $lang['project_details']            = "Detaily projektu";
    $lang['todo_list_for']              = "Seznam úkolù pro: ";
    $lang['due_in_sprt']                = " (Bìhem %d dní)";
    $lang['due_tomorrow']               = " (Bìhem zítøka)";
    $lang['no_assigned']                = "®ádné nedokonèené úlohy pøiøazené tomuto u¾ivateli.";
    $lang['todo_list']                  = "Úkoly";
    $lang['summary_list']               = "Souhrnný seznam";
    $lang['task_submit']                = "Potvrdit úkol";
    $lang['not_owner']                  = "Pøístup odepøen. Nejste vlastník, nebo nemáte dostateèná práva";
    $lang['missing_values']             = "Nejsou zadané potøebné hodnoty; prosím vra»te se zpìt a zkuste to znovu";
    $lang['future']                     = "V budoucnu";
    $lang['flags']                      = "Pøíznaky";
    $lang['owner']                      = "Vlastník";
    $lang['group']                      = "Skupina";
    $lang['by_usergroup']               = " (podle skupiny)";
    $lang['by_taskgroup']               = " (podle praconí skupiny)";
    $lang['by_deadline']                = " (podle termínu ukonèení)";
    $lang['by_status']                  = " (podle statusu)";
    $lang['by_owner']                   = " (podle vlastníka)";
    $lang['project_cloned']             = "Projekt ke klonovaní :";
    $lang['task_cloned']                = "Úkol ke klonování :";
    $lang['note_clone']                 = "Poznámka: Úkol bude naklonován jako nový projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendáø";
    $lang['normal_version']             = "Zpìt";
    $lang['print_version']              = "Verze pro tisk";
    $lang['condensed_view']             = "Zkrácený výbìr";
    $lang['full_view']                  = "Plné zobrazení";
//**
    $lang['icalendar']                  = "iCalendar";

?>
