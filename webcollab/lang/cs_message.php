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
  Corrections: Jirka Dutka <jirka at dutka.net>
  Corrections: Milan Horák <strangeril at users.sourceforge.net>

  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "cs" );

//dates
$month_array = array (NULL, 'leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec' );
$month_array_2p = array (NULL, 'ledna', 'února', 'března', 'dubna', 'května', 'června', 'července', 'srpna', 'září', 'října', 'listopadu', 'prosince' );
$week_array = array('Ne', 'Po', 'Út', 'St', 'Čt', 'Pá', 'So' );

//task states

 //priorities
    $task_state['dontdo']               = "Až nebude práce";
    $task_state['low']                  = "Nízká";
    $task_state['normal']               = "Normální";
    $task_state['high']                 = "Vysoká";
    $task_state['yesterday']            = "Už teď je pozdě!";
 //status
    $task_state['new']                  = "Nový";
    $task_state['planned']              = "Plánovaný (neaktivní)";
    $task_state['active']               = "Aktivní (pracuje se na něm)";
    $task_state['cantcomplete']         = "Pozastavený";
    $task_state['completed']            = "Dokončený";
    $task_state['done']                 = "Hotový";
    $task_state['task_planned']         = " Plánovaný";
    $task_state['task_active']          = " Aktivní";
 //project states
    $task_state['planned_project']      = "Plánovaný projekt (zatím neaktivní)";
    $task_state['no_deadline_project']  = "Bez konečného data";
    $task_state['active_project']       = "Aktivní projekt";

//common items
    $lang['description']                = "Popis";
    $lang['name']                       = "Jméno";
    $lang['add']                        = "Přidat";
    $lang['update']                     = "Aktualizovat";
    $lang['submit_changes']             = "Potvrdit změny";
    $lang['continue']                   = "Pokračovat";
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
    $lang['bytes']                      = " bytů";
    $lang['select_instruct']            = "(Použijte CTRL k vybrání více položek, nebo žádné)";
    $lang['member_groups']              = "Uživatel je členem zvýrazněných skupin uvedených níže";
    $lang['login']                      = "Login";
    $lang['login_action']               = "Login";
    $lang['login_screen']               = "Login";
    $lang['error']                      = "Chyba";
    $lang['no_login']                   = "Přístup odepřen; špatné jméno nebo heslo";
    $lang['redirect_sprt']              = "Budete automaticky přesměrováni na přihlašovací stránku za %d sekund";
    $lang['login_now']                  = "Prosím klikněte zde pro přihlášení";
    $lang['please_login']               = "Prosím přihlašte se";
    $lang['go']                         = "Přejít";

//graphic items
    $lang['late_g']                     = "&nbsp;Zpožděný&nbsp;";
    $lang['new_g']                      = "&nbsp;Nový&nbsp;";
    $lang['updated_g']                  = "&nbsp;Aktualizovaný&nbsp;";

//admin config
    $lang['admin_config']               = "Nastavení Administrátora";
    $lang['email_settings']             = "Nastavení hlavičky emailu";
    $lang['admin_email']                = "Email Administrátora";
    $lang['email_reply']                = "Email 'odpovědět na'";
    $lang['email_from']                 = "Email 'od'";
    $lang['mailing_list']               = "Mailing list";
    $lang['default_checkbox']           = "Výchozí nastavení pro Projekty/Úkoly";
    $lang['allow_globalaccess']         = "Povolit číst všem?";
    $lang['allow_group_edit']           = "Povolit editovat skupině?";
    $lang['set_email_owner']            = "Poslat vlastníkovi email se změnami?";
    $lang['set_email_group']            = "Poslat skupině email se změnami?";
    $lang['project_listing_order']      = "Řazení projektů podle";
    $lang['task_listing_order']         = "Řazení úkolů podle";
    $lang['configuration']              = "Nastavení";

//archive
    $lang['archived_projects']          = "Archivované projekty";

//contacts
    $lang['firstname']                  = "Jméno:";
    $lang['lastname']                   = "Příjmení:";
    $lang['company']                    = "Společnost:";
    $lang['home_phone']                 = "Telefon domů:";
    $lang['mobile']                     = "Mobilní telefon:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Telefon do práce:";
    $lang['address']                    = "Adresa:";
    $lang['postal']                     = "Poštovní směrovací číslo:";
    $lang['city']                       = "Město:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Poznámka:";
    $lang['add_contact']                = "Přidat kontakt";
    $lang['del_contact']                = "Smazat kontakt";
    $lang['contact_info']               = "Informace o kontaktu";
    $lang['contacts']                   = "Kontakty";
    $lang['contact_add_info']           = "Jestliže bude zadán název společnosti, jméno společnosti bude zobrazeno místo jména osoby.";
    $lang['show_contact']               = "Zobrazit kontakt";
    $lang['edit_contact']               = "Editovat kontakt";
    $lang['contact_submit']             = "Potvrdit kontakt";
    $lang['contact_warn']               = "Nedostatek údaju pro přidání kontaktu; prosím vraťte se zpět a zadejte alespoň jméno a příjmení";

 //files
    $lang['manage_files']               = "Spravovat soubory";
    $lang['no_files']                   = "Žádné soubory ke správě";
    $lang['no_file_uploads']            = "Konfigurace serveru nepodporuje nahrávání souborů";
    $lang['file']                       = "Soubor:";
    $lang['uploader']                   = "Nahrál:";
    $lang['files_assoc_project']        = "Soubory spojené s tímto projektem";
    $lang['files_assoc_task']           = "Soubory spojené s tímto úkolem";
    $lang['file_admin']                 = "Spravovat soubory";
    $lang['add_file']                   = "Přidat soubor";
    $lang['files']                      = "Soubory";
    $lang['file_choose']                = "Soubor k přidání:";
    $lang['upload']                     = "Přidat";
    $lang['file_email_owner']           = "Oznámit vlastníkovi projektu nový soubor?";
    $lang['file_email_usergroup']       = "Oznámit skupině nový soubor?";
    $lang['max_file_sprt']              = "Soubor musí být menší než %s kB.";
    $lang['file_submit']                = "Potvrdit soubor";
    $lang['no_upload']                  = "Žádný soubor nebyl nahrán.  Prosím vraťte se zpět a zkuste to znovu.";
    $lang['file_too_big_sprt']          = "Maximální velikost souboru může být %s bytů.  Váš soubor byl příliš velký a byl smazán.";
    $lang['del_file_javascript_sprt']   = "Opravdu chcete smazat soubor %s ?";


 //forum
    $lang['orig_message']               = "Původní zpráva:";
    $lang['post']                       = "Odeslat";
    $lang['message']                    = "Zpráva:";
    $lang['post_reply_sprt']            = "Poslat odpověď na zprávu od '%1\$s' o '%2\$s'";
    $lang['post_message_sprt']          = "Poslat zprávu: '%s'";
    $lang['forum_email_owner']          = "Poslat příspěvek vlastníkovi projektu?";
    $lang['forum_email_usergroup']      = "Poslat příspěvek skupině?";
    $lang['reply']                      = "Odpovědět";
    $lang['new_post']                   = "Nový příspěvek";
    $lang['public_user_forum']          = "Veřejné fórum";
    $lang['private_forum_sprt']         = "Privátní fórum pro skupinu: %s";
    $lang['forum_submit']               = "Potvrdit fórum";
    $lang['no_message']                 = "Žádné zprávy! Prosím vraťte se zpět a zkuste to znovu";
    $lang['add_reply']                  = "Přidat zprávu";
    $lang['last_post_sprt']             = "Poslední příspěvek: %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Nedávné příspěvky ve fóru";
    $lang['forum_search']               = "Hledat ve fóru";
    $lang['no_results']                 = "Nebyly nalezeny žádné záznamy pro '%s'";
    $lang['search_results']             = "Nalezeno %1\$s záznamů pro '%2\$s'<br />Zobrazeny záznamy od %3\$s. až %4\$s.";

 //includes
    $lang['report']                     = "Report";
    $lang['warning']                    = "<h1>Omlouváme se!</h1><p>V tuto chvíli nejsme schopní provést Váš požadavek. Prosím zkuste to později.</p>";
    $lang['home_page']                  = "Domácí stránka";
    $lang['summary_page']               = "Přehled";
    $lang['log_out']                    = "Odhlásit";
    $lang['main_menu']                  = "Hlavní nabídka";
    $lang['archive']                    = "Archiv";
    $lang['user_homepage_sprt']         = "%s";
    $lang['missing_field_javascript']   = "Prosím vložte hodnoty do chybějcího pole";
    $lang['invalid_date_javascript']    = "Prosím zadejte správné datum";
    $lang['finish_date_javascript']     = "Zadané datum nastane až po datu skončení projektu!";
    $lang['security_manager']           = "Správce zabezpečení";
    $lang['session_timeout_sprt']       = "Přístup odepřen; Poslední aktivita byla před %1\$d minutami, časový limit je %2\$d minut; prosím <a href=\"%sindex.php\">přihlašte se</a>";
    $lang['access_denied']              = "Přístup odepřen";
    $lang['private_usergroup_no_access']= "Omlouváme se; tato oblast je privátní skupiny, nemáte dostatečná práva.";
    $lang['invalid_date']               = "Špatně zadané datum";
    $lang['invalid_date_sprt']          = "Zadané datum %s není správné (Zkontrolujte počet dní v měsíci).<br />Prosím vraťte se zpět a zadejte správné datum.";

 //taskgroups
    $lang['taskgroup_name']             = "Název skupiny úkolů:";
    $lang['taskgroup_description']      = "Popis skupiny úkolů:";
    $lang['add_taskgroup']              = "Přidat skupinu úkolů";
    $lang['add_new_taskgroup']          = "Přidat novou skupinu úkolů";
    $lang['edit_taskgroup']             = "Upravit skupinu úkolů";
    $lang['taskgroup_manage']           = "Správa skupiny úkolů";
    $lang['no_taskgroups']              = "Žádná skupina úkolů není definována";
    $lang['manage_taskgroups']          = "Spravovat skupiny úkolů";
    $lang['taskgroups']                 = "Skupiny úkolů";
    $lang['taskgroup_dup_sprt']         = "Skupina úkolů '%s' existuje.  Prosím vraťte se zpět a zvolte jiný název.";
    $lang['info_taskgroup_manage']      = "Info pro správu skupin úkolů";

 //usergroups
    $lang['usergroup_name']             = "Název skupiny:";
    $lang['usergroup_description']      = "Popis skupiny:";
    $lang['members']                    = "Členové skupiny:";
    $lang['private_usergroup']          = "Privátní skupina";
    $lang['add_usergroup']              = "Přidat skupinu";
    $lang['add_new_usergroup']          = "Přidat novou skupinu";
    $lang['edit_usergroup']             = "Editovat skupinu";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";    
    $lang['usergroup_manage']           = "Správa skupin";
    $lang['no_usergroups']              = "Žádná skupina není definována";
    $lang['manage_usergroups']          = "Spravovat skupiny";
    $lang['usergroups']                 = "Skupina";
    $lang['usergroup_dup_sprt']         = "Skupina '%s' existuje.  Prosím vraťte se zpět a zvolte nový název.";
    $lang['info_usergroup_manage']      = "Nápověda ke správě skupin";

 //users
    $lang['login_name']                 = "Přihlašovací jméno";
    $lang['full_name']                  = "Celé jméno";
    $lang['password']                   = "Heslo";
    $lang['blank_for_current_password'] = "(Zanechte prázdné, pokud chcete ponechat stávající heslo)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Administrátor";
    $lang['private_user']               = "Privátní uživatel";
    $lang['normal_user']                = "Normální uživatel";
    $lang['is_admin']                   = "Administrátor";
    $lang['is_guest']                   = "Host";
    $lang['guest']                      = "Host";
    $lang['user_info']                  = "Informace o uživateli";
    $lang['deleted_users']              = "Smazaní uživatelé";
    $lang['no_deleted_users']           = "Žádní smazaní uživatelé.";
    $lang['revive']                     = "Oživit";
    $lang['permdel']                    = "Smazat na trvalo";
    $lang['permdel_javascript_sprt']    = "Tímto smažete veškeré záznamy uživatele %s včetně přidružených úkolů (projektů). Opravdu chcete pokračovat?";
    $lang['add_user']                   = "Přidat uživatele";
    $lang['edit_user']                  = "Editovat uživatele";
    $lang['no_users']                   = "Žádní uživatelé nejsou známy systému";
    $lang['users']                      = "Uživatel";
    $lang['existing_users']             = "Seznam uživatelů";
    $lang['private_profile']            = "Tento uživatel má privátní profil, který nemůže být Vámi zobrazen.";
    $lang['private_usergroup_profile']  = "(Tento uživatel je členem privátní skupiny, která a nemůže být Vámi zobrazena)";
    $lang['email_users']                = "Poslat email";
    $lang['select_usergroup']           = "Skupinu/y uvedenou níže:";
    $lang['subject']                    = "Předmět:";
    $lang['message_sent_maillist']      = "Tento email je také poslán všem uvedeným v \"Mailing list\".";
    $lang['who_online']                 = "Přihlášení uživatelé";
    $lang['edit_details']               = "Editovat detaily uživatele";
    $lang['show_details']               = "Zobrazit detaily uživatele";
    $lang['user_deleted']               = "Tento uživatel byl smazán!";
    $lang['no_usergroup']               = "Tento uživatel není členém žádné skupiny";
    $lang['not_usergroup']              = "(Není členem žádné skupiny)";
    $lang['no_password_change']         = "(Vaše heslo nebylo změněno)";
    $lang['last_time_here']             = "Poslední návštěva:";
    $lang['number_items_created']       = "Počet vytvořených položek:";
    $lang['number_projects_owned']      = "Počet vlastněných projektů:";
    $lang['number_tasks_owned']         = "Počet vlastněných úkolů:";
    $lang['number_tasks_completed']     = "Počet dokončených úkolů:";
    $lang['number_forum']               = "Počet příspěvků ve fóru:";
    $lang['number_files']               = "Počet nahraných souborů:";
    $lang['size_all_files']             = "Celková velikost všech vlastněných souborů:";
    $lang['owned_tasks']                = "Vlastněné úkoly";
    $lang['invalid_email']              = "Neplatná emailová adresa";
    $lang['invalid_email_given_sprt']   = "Emailová adresa '%s' je nesprávně zadaná.  Prosím vraťte se zpět a zkuste to znovu.";
    $lang['duplicate_user']             = "Duplikovat uživatele";
    $lang['duplicate_change_user_sprt'] = "Uživatel '%s' existuje.  prosím vraťte se zpět a změnte jméno.";
    $lang['value_missing']              = "Chybí hodnota";
    $lang['field_sprt']                 = "Pole pro '%s' není zadáno. Prosím vraťte se zpět a doplňte údaje.";
    $lang['admin_priv']                 = "NOTE: You have been granted administrator privileges. -- NOTE: Byla Vám přidělena administrátorská práva";
    $lang['manage_users']               = "Spravovat uživatele";
    $lang['users_online']               = "Přihlášení uživatelé";
    $lang['online']                     = "Poslední uživatelé (Přihlášení před méně než 60 minutami)";
    $lang['not_online']                 = "Ostatní";
    $lang['user_activity']              = "Aktivita uživatelů";

  //tasks
    $lang['add_new_task']               = "Přidat nový úkol";
    $lang['priority']                   = "Priorita";
    $lang['parent_task']                = "Nadřazený úkol";
    $lang['creation_time']              = "Datum zadání";
    $lang['by_sprt']                    = "%1\$s uživatelem %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Název projektu";
    $lang['task_name']                  = "Název úkolu";
    $lang['deadline']                   = "Termín ukončení";
    $lang['taken_from_parent']          = "(Převzatý od nadřazeného úkolu)";
    $lang['status']                     = "Stav";
    $lang['task_owner']                 = "Vlastník úkolu";
    $lang['project_owner']              = "Vlastník projektu";
    $lang['taskgroup']                  = "Skupina úkolů";
    $lang['usergroup']                  = "Skupina";
    $lang['nobody']                     = "Nikdo";
    $lang['none']                       = "Žádná";
    $lang['no_group']                   = "Žádná skupina";
    $lang['all_groups']                 = "Všechny skupiny";
    $lang['all_users']                  = "Všichni uživatelé";
    $lang['all_users_view']             = "Povolit všem číst?";
    $lang['group_edit']                 = "Povolit skupině měnit?";
    $lang['project_description']        = "Popis projektu:";
    $lang['task_description']           = "Popis úkolu";
    $lang['email_owner']                = "Poslat vlastníkovi email se změnami?";
    $lang['email_new_owner']            = "Poslat novému vlastníkovi email se změnami?";
    $lang['email_group']                = "Poslat skupině email se změnami?";
    $lang['add_new_project']            = "Zadat nový projekt";
    $lang['uncategorised']              = "Nezařazený";
    $lang['due_sprt']                   = "%d dní od teď";
    $lang['tomorrow']                   = "Zítra";
    $lang['due_today']                  = "Dnes";
    $lang['overdue_1']                  = "1. den opožděn";
    $lang['overdue_sprt']               = "%d. den opožděn";
    $lang['edit_task']                  = "Editovat úkol";
    $lang['edit_project']               = "Editovat projekt";
    $lang['no_reparent']                = "Žádný (samostatný projekt)";
    $lang['del_javascript_project_sprt']= "Opravdu chcete smazat projekt %s ?";
    $lang['del_javascript_task_sprt']   = "Opravdu chcete smazat úkol %s ?";
    $lang['add_task']                   = "Přidat úkol";
    $lang['add_subtask']                = "Přidat podúkol";
    $lang['add_project']                = "Přidat projekt";
    $lang['clone_project']              = "Klonovat projekt";
    $lang['clone_task']                 = "Klonovat úkol";
    $lang['quick_jump']                 = "Přejít na";
    $lang['no_edit']                    = "Nejste vlastníkem položky proto ji nemůžete měnit";
    $lang['global']                     = "Ostatní";
    $lang['delete_project']             = "Smazat projekt";
    $lang['delete_task']                = "Smazat úkol";
    $lang['project_options']            = "Možnosti projektů";
    $lang['task_options']               = "Možnosti úkolů";
    $lang['javascript_archive_project'] = "Chcete opravdu archivovat projekt %s ?";
    $lang['archive_project']            = "Archivovat projekt";
    $lang['task_navigation']            = "Navigace";
    $lang['new_task']                   = "Nový úkol";
    $lang['no_projects']                = "Nejsou zde žádné projekty";
    $lang['show_all_projects']          = "Všechny projekty";
    $lang['show_active_projects']       = "Pouze aktivní projekty";
    $lang['project_hold_sprt']          = "Projekt pozdržen od %s";
    $lang['project_planned']            = "Plánovaný projekt";
    $lang['percent_sprt']               = "Hotovo %d%%";
    $lang['project_no_deadline']        = "Pro tento projekt nebylo stanoveno konečné datum";
    $lang['no_allowed_projects']        = "Nejsou zde žádné projekty, do kterých máte právo nahlížet";
    $lang['projects']                   = "Projekty";
    $lang['percent_project_sprt']       = "Tento projekt je hotov na %d%%";
    $lang['owned_by']                   = "Vlastníkem je";
    $lang['created_on']                 = "Zadán dne";
    $lang['completed_on']               = "Dokončen dne";
    $lang['modified_on']                = "Změněn dne";
    $lang['project_on_hold']            = "Projekt je pozastaven";
    $lang['project_accessible']         = "(Tento projekt je přístupný všem uživatelům)";
    $lang['task_accessible']            = "(Tento úkol je přístupný všem uživatelům)";
    $lang['project_not_accessible']     = "(Tento projekt je přístupný pouze členům skupiny)";
    $lang['task_not_accessible']        = "(Tento úkol je přístupný pouze členům skupiny)";
    $lang['project_not_in_usergroup']   = "Tento projekt není ve vlastnictví žádné skupiny a je přístupný všem uživatelům.";
    $lang['task_not_in_usergroup']      = "Tento úkol není ve vlastnictví žádné skupiny a je přístupný všem uživatelům.";
    $lang['usergroup_can_edit_project'] = "Tento projekt může být editován pouze členy skupiny.";
    $lang['usergroup_can_edit_task']    = "Tento úkol může být editován pouze členy skupiny.";
    $lang['i_take_it']                  = "Převzít";
    $lang['i_finished']                 = "Dokončeno";
    $lang['i_dont_want']                = "Přenechat";
    $lang['take_over_project']          = "Převzít vlastnictví nad projektem";
    $lang['take_over_task']             = "Převzít vlastnictví nad úkolem";
    $lang['task_info']                  = "Informace o úkolu";
    $lang['project_details']            = "Detaily projektu";
    $lang['todo_list_for']              = "Seznam úkolů pro: ";
    $lang['due_in_sprt']                = " (Během %d dní)";
    $lang['due_tomorrow']               = " (Během zítřka)";
    $lang['no_assigned']                = "Žádné nedokončené úkoly přiřazené tomuto uživateli.";
    $lang['todo_list']                  = "Úkoly";
    $lang['summary_list']               = "Souhrnný seznam";
    $lang['task_submit']                = "Potvrdit úkol";
    $lang['not_owner']                  = "Přístup odepřen. Nejste vlastník, nebo nemáte dostatečná práva";
    $lang['missing_values']             = "Nejsou zadané potřebné hodnoty; prosím vraťte se zpět a zkuste to znovu";
    $lang['future']                     = "V budoucnu";
    $lang['flags']                      = "Příznaky";
    $lang['owner']                      = "Vlastník";
    $lang['group']                      = "Skupina";
    $lang['by_usergroup']               = " (podle skupiny)";
    $lang['by_taskgroup']               = " (podle skupiny úkolů)";
    $lang['by_deadline']                = " (podle termínu ukončení)";
    $lang['by_status']                  = " (podle statusu)";
    $lang['by_owner']                   = " (podle vlastníka)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Projekt ke klonování :";
    $lang['task_cloned']                = "Úkol ke klonování :";
    $lang['note_clone']                 = "Poznámka: Úkol bude naklonován jako nový projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalendář";
    $lang['normal_version']             = "Zpět";
    $lang['print_version']              = "Verze pro tisk";
    $lang['condensed_view']             = "Zkrácený výběr";
    $lang['full_view']                  = "Plné zobrazení";
    $lang['icalendar']                  = "iKalendář";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>
