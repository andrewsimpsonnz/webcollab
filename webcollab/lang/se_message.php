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

  Language files for 'se' (Swedish)

  Maintainer: G�ran K�llqvist <g.kallqvist@telia.com>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );

//this is the regex for input validation filter used in common.php 
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s"; //ISO-8859-x 

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('S�n', 'M�n', 'Tis', 'Ons', 'Tor', 'Fre', 'L�r' );

//task states

 //priorities
    $task_state['dontdo']               = "G�r inget";
    $task_state['low']                  = "L�g";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "H�g";
    $task_state['yesterday']            = "Ig�r!";
 //status
    $task_state['new']                  = "Ny";
    $task_state['planned']              = "Planerad (inte aktiv)";
    $task_state['active']               = "Aktiv (arbetar med den)";
    $task_state['cantcomplete']         = "Pausad";
    $task_state['completed']            = "F�rdig";
    $task_state['done']                 = "Klar";
    $task_state['task_planned']         = " Planerad";
    $task_state['task_active']          = " Aktiv";
 //project states
    $task_state['planned_project']      = "Planerat projekt (inte aktivt)";
    $task_state['no_deadline_project']  = "Slutdatum inte satt";
    $task_state['active_project']       = "Aktivt projekt";

//common items
    $lang['description']                = "Beskrivning";
    $lang['name']                       = "Namn";
    $lang['add']                        = "L�gga till";
    $lang['update']                     = "Uppdatera";
    $lang['submit_changes']             = "Skicka �ndringar";
    $lang['continue']                   = "Forts�tt";
    $lang['reset']                      = "�terst�ll";
    $lang['manage']                     = "Sk�ta";
    $lang['edit']                       = "Redigera";
    $lang['delete']                     = "Ta bort";
    $lang['del']                        = "Stryk";
    $lang['confirm_del_javascript']     = " Bekr�fta radering!";
    $lang['yes']                        = "Ja";
    $lang['no']                         = "Nej";
    $lang['action']                     = "�tg�rd";
    $lang['task']                       = "Uppgift";
    $lang['tasks']                      = "Uppgifter";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Info";
    $lang['bytes']                      = " bytes";
    $lang['select_instruct']            = "(Anv�nd <ctrl> f�r att v�lja flera eller f�r att inte v�lja n�gon)";
    $lang['member_groups']              = "Om anv�ndaren �r med i n�gon grupp har de markerats";
    $lang['login']                      = "Logga in";
    $lang['error']                      = "Fel";
    $lang['no_login']                   = "�tkomst nekas. Fel anv�ndarnamn eller l�senord";
    $lang['redirect_sprt']              = "Efter %d sekunders v�ntan kommer du automatiskt att �terv�nda till inloggning";
    $lang['login_now']                  = "Klicka h�r f�r att �terv�nda till inloggning";   
    $lang['please_login']               = "Var god logga in";
    $lang['go']                         = "K�r!";

//graphic items
    $lang['late_g']                     = "&nbsp;SEN&nbsp;";
    $lang['new_g']                      = "&nbsp;NY&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPPDATERAD&nbsp;";

//admin config
    $lang['admin_config']               = "Konfigurera administrat�r";
    $lang['email_settings']             = "Email-rubriker";
    $lang['admin_email']                = "Epost-adress till administrat�r";
    $lang['email_reply']                = "Epost 'svar till'";
    $lang['email_from']                 = "Epost 'fr�n'";
    $lang['mailing_list']               = "Mejl-lista";
    $lang['default_checkbox']           = "Standardinst�llningar f�r Projekt/Uppgifter";
    $lang['allow_globalaccess']         = "Till�ta tillg�ng till alla?";
    $lang['allow_group_edit']           = "Till�ta alla i anv�ndargrupper att redigera?";
    $lang['set_email_owner']            = "Alltid mejla den ansvarige om f�r�ndringar?";
    $lang['set_email_group']            = "Alltid mejla anv�ndargruppen om f�r�ndringar?";
    $lang['project_listing_order']      = "Projekt listordning";
    $lang['task_listing_order']         = "Uppgifter listordning"; 
    $lang['configuration']              = "Konfigurering";

//archive
    $lang['archived_projects']          = "Arkiverade projekt";    

//contacts
    $lang['firstname']                  = "F�rnamn:";
    $lang['lastname']                   = "Efternamn:";
    $lang['company']                    = "F�retag:";
    $lang['home_phone']                 = "Hemtelefon:";
    $lang['mobile']                     = "Mobil:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Tel arbetet:";
    $lang['address']                    = "Adress:";
    $lang['postal']                     = "Postnummer:";
    $lang['city']                       = "Ort:";
    $lang['email']                      = "Epost:";
    $lang['notes']                      = "Anm�rkningar:";
    $lang['add_contact']                = "L�gg till kontakt";
    $lang['del_contact']                = "Ta bort kontakt";
    $lang['contact_info']               = "Kontaktinformation";
    $lang['contacts']                   = "Kontakter";
    $lang['contact_add_info']           = "Om du anger ett f�retagsnamn kommer det att visas ist�llet f�r anv�ndarens namn.";
    $lang['show_contact']               = "Visa kontakter";
    $lang['edit_contact']               = "Redigera kontakter";
    $lang['contact_submit']             = "Spara kontakt";
    $lang['contact_warn']               = "Det �r otillr�ckliga uppgifter f�r att spara denna kontakt. Var god g� tillbaka och l�gg �tminstone till f�r- och efternamn";

 //files
    $lang['manage_files']               = "Ta hand om filer";
    $lang['no_files']                   = "Det finns inga inskickade filer att ta hand om";
    $lang['no_file_uploads']            = "Servern p� denna sajt till�ter inte att filer skickas in";
    $lang['file']                       = "Fil:";
    $lang['uploader']                   = "Skickad av:";
    $lang['files_assoc_project']        = "Filer som h�r till detta projekt";
    $lang['files_assoc_task']           = "Filer som h�r till denna uppgift";
    $lang['file_admin']                 = "Filadministrering";
    $lang['add_file']                   = "L�gg till fil";
    $lang['files']                      = "Filer";
    $lang['file_choose']                = "Fil att skicka:";
    $lang['upload']                     = "Skicka";
    $lang['file_email_owner']           = "Mejla ansvarig om att en ny fil har skickats?";
    $lang['file_email_usergroup']       = "Mejla anv�ndargruppen om att en ny fil har skickats?";
    $lang['max_file_sprt']              = "Filen som ska skickas f�r inte vara mer �n %s kb stor.";
    $lang['file_submit']                = "Skicka fil";
    $lang['no_upload']                  = "Ingen fil skickades. Var god f�rs�k igen.";
    $lang['file_too_big_sprt']          = "Man kan skicka h�gst %s bytes.  Din fil var f�r stor och har tagits bort.";
    $lang['del_file_javascript_sprt']   = "�r du s�ker p� att du vill ta bort %s ?";


 //forum
    $lang['orig_message']               = "Ursprungligt inl�gg:";
    $lang['post']                       = "Skicka det!";
    $lang['message']                    = "Inl�gg:";
    $lang['post_reply_sprt']            = "Skicka svar p� ett inl�gg fr�n '%1\$s' om '%2\$s'";
    $lang['post_message_sprt']          = "Skicka inl�gg till: '%s'";
    $lang['forum_email_owner']          = "Mejla foruminl�gg till ansvarig?";
    $lang['forum_email_usergroup']      = "Mejla foruminl�gg till anv�ndargrupp?";
    $lang['reply']                      = "Svar";
    $lang['new_post']                   = "Nytt inl�gg";
    $lang['public_user_forum']          = "�ppet anv�ndarforum";
    $lang['private_forum_sprt']         = "Privat forum f�r anv�ndargrupp '%s'";
    $lang['forum_submit']               = "Skicka in forum";
    $lang['no_message']                 = "Inget inl�gg! Var god f�rs�k igen";
    $lang['add_reply']                  = "L�gg till svar";
    $lang['last_post_sprt']             = "Senaste inl�gg %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Aktuella foruminl�gg";      
//**
    $lang['recent_posts']               = "Recent forum posts";
//**
    $lang['forum_search']               = "Forum search";
//**
    $lang['no_results']                 = "No results found for '%s'";
//**
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "Rapport";
    $lang['warning']                    = "<h1>Tyv�rr!</h1><p>Vi kan inte ta emot din beg�ran just nu. Var god f�rs�k igen senare.</p>";
    $lang['home_page']                  = "Startsida";
    $lang['summary_page']               = "Sammanfattning";
    $lang['todo_list']                  = "Att g�ra";
    $lang['calendar']                   = "Kalender";
    $lang['log_out']                    = "Logga ut";
    $lang['main_menu']                  = "Huvudmeny";
    $lang['archive']                    = "Arkiv";   
    $lang['user_homepage_sprt']         = "%ss startsida";
    $lang['missing_field_javascript']   = "Var god ange ett giltigt v�rde f�r det f�lt som saknas";
    $lang['invalid_date_javascript']    = "Var god v�lj ett giltigt datum";
    $lang['finish_date_javascript']     = "Angivet datum infaller efter projektets slutdatum!";
    $lang['security_manager']           = "S�kerhetshanterare";
    $lang['session_timeout_sprt']       = "�tkomst nekas; senaste �tg�rd gjordes f�r %1\$d minuter sedan och maxtid �r %2\$d minuter. Var god och <a href=\"%3\$sindex.php\">logga in igen</a>";
    $lang['access_denied']              = "�tkomst nekas";
    $lang['private_usergroup']          = "Tyv�rr. Detta �r en privat anv�ndargrupp och du har inte �tkomstr�ttigheter.";
    $lang['invalid_date']               = "Ogiltigt datum";
    $lang['invalid_date_sprt']          = "Datumet %s �r inte ett giltigt kalnderdatum (Kolla antal dagar i m�naden).<br />Var god g� tillbaka och ange ett giltigt datum.";


 //taskgroups
    $lang['taskgroup_name']             = "Uppgiftgruppens namn:";
    $lang['taskgroup_description']      = "Kort beskrivning av uppgiftgruppen:";
    $lang['add_new_taskgroup']          = "L�gg till en ny uppgiftgrupp";
    $lang['edit_taskgroup']             = "Redigera uppgiftgrupp";
    $lang['taskgroup_manage']           = "Sk�tsel av uppgiftgrupper";
    $lang['no_taskgroups']              = "Inga uppgiftgrupper definierade";
    $lang['manage_taskgroups']          = "Sk�ta uppgiftgrupper";
    $lang['taskgroups']                 = "Uppgiftgrupper";
    $lang['taskgroup_dup_sprt']         = "Det finns redan en uppgiftgrupp som heter '%s'.  Var god g� tillbaka och v�lj ett annat namn.";
    $lang['info_taskgroup_manage']      = "Information om uppgiftgrupper";

 //usergroups
    $lang['usergroup_name']             = "Anv�ndargruppens namn:";
    $lang['usergroup_description']      = "Kort beskrivning av anv�ndargruppen:";
    $lang['members']                    = "Medlemmar:";
    $lang['private_usergroup']          = "Privat anv�ndargrupp";
    $lang['add_usergroup']              = "L�gg till anv�ndargrupp";
    $lang['add_new_usergroup']          = "L�gg till ny anv�ndargrupp";
    $lang['edit_usergroup']             = "Redigera anv�ndargrupp";
    $lang['usergroup_manage']           = "Sk�tsel av anv�ndargrupper";
    $lang['no_usergroups']              = "Inga anv�ndargrupper definierade";
    $lang['manage_usergroups']          = "Sk�ta anv�ndargrupper";
    $lang['usergroups']                 = "Anv�ndargrupper";
    $lang['usergroup_dup_sprt']         = "Det finns redan en anv�ndargrupp som heter '%s'.  Var god g� tillbaka och v�lj ett annat namn.";
    $lang['info_usergroup_manage']      = "Information om anv�ndargrupp";

 //users
    $lang['login_name']                 = "Anv�ndarnamn";
    $lang['full_name']                  = "Fullst�ndigt namn";
    $lang['password']                   = "L�senord";
    $lang['blank_for_current_password'] = "(L�mna blankt f�r att anv�nda aktuellt l�senord)";
    $lang['email']                      = "E-post";
    $lang['admin']                      = "Administrat�r";
    $lang['private_user']               = "Privat anv�ndare";
    $lang['normal_user']                = "Normal anv�ndare"; 
    $lang['is_admin']                   = "�r administrat�r?";
    $lang['is_guest']                   = "�r g�st?";
    $lang['guest']                      = "G�stanv�ndare";
    $lang['user_info']                  = "Anv�ndarinformation";
    $lang['deleted_users']              = "Raderade anv�ndare";
    $lang['no_deleted_users']           = "Det finns inga raderade anv�ndare.";
    $lang['revive']                     = "�teruppv�ck";
    $lang['permdel']                    = "Radera permanent";
    $lang['permdel_javascript_sprt']    = "Detta kommer att f�r gott ta bort alla poster och tillh�rande uppgifter f�r anv�ndaren %s. Vill du verkligen det?";
    $lang['add_user']                   = "L�gg till anv�ndare";
    $lang['edit_user']                  = "Redigera anv�ndare";
    $lang['no_users']                   = "Det finns inga k�nda anv�ndare";
    $lang['users']                      = "Anv�ndare";
    $lang['existing_users']             = "Existerande anv�ndare";
    $lang['private_profile']            = "Denna anv�ndare har en privat profil som du inte kan titta p�.";
    $lang['private_usergroup_profile']  = "(Denna anv�ndare �r medlem i en privat anv�ndargrupp som du inte kan titta p�)";
    $lang['email_users']                = "Epost anv�ndare";
    $lang['select_usergroup']           = "V�lj anv�ndargrupp:";
    $lang['subject']                    = "�mne:";
    $lang['message_sent_maillist']      = "Meddelandet kopieras ocks� till mejllistan.";
    $lang['who_online']                 = "Vilka �r online?";
    $lang['edit_details']               = "Redigera anv�ndaruppgifter";
    $lang['show_details']               = "Visa anv�ndaruppgifter";
    $lang['user_deleted']               = "Denna anv�ndare har tagits bort!";
    $lang['no_usergroup']               = "Anv�ndaren �r inte medlem i n�gon anv�ndargrupp";
    $lang['not_usergroup']              = "(Inte medlem i n�gon anv�ndargrupp)";
    $lang['no_password_change']         = "(Ditt befintliga l�senord har inte �ndrats)";
    $lang['last_time_here']             = "Var h�r senast:";
    $lang['number_items_created']       = "Antal skapade artiklar:";
    $lang['number_projects_owned']      = "Ansvarig f�r antal projekt:";
    $lang['number_tasks_owned']         = "Ansvarig f�r antal uppgifter:";
    $lang['number_tasks_completed']     = "Antal f�rdiga uppgifter:";
    $lang['number_forum']               = "Antal foruminl�gg:";
    $lang['number_files']               = "Antal skickade filer:";
    $lang['size_all_files']             = "Total storlek p� skickade filer:";
    $lang['owned_tasks']                = "Ansvarig f�r uppgifter";
    $lang['invalid_email']              = "Ogiltig epost-adress";
    $lang['invalid_email_given_sprt']   = "Epost-adressen '%s' �r ogiltig.  Var god g� tillbaka och f�rs�k igen.";
    $lang['duplicate_user']             = "Anv�ndaren finns";
    $lang['duplicate_change_user_sprt'] = "Anv�ndaren '%s' existerar redan.  Var god g� tillbaka och �ndra ett namn.";
    $lang['value_missing']              = "Saknat v�rde";
    $lang['field_sprt']                 = "F�ltet '%s' saknar v�rde. Var god g� tillbaka och fyll i det.";
    $lang['admin_priv']                 = "OBS: Du har tilldelats administrat�rsr�ttigheter.";
    $lang['manage_users']               = "Sk�ta anv�ndare";
    $lang['users_online']               = "Anv�ndare som �r online";
    $lang['online']                     = "Flitig Internet-anv�ndare (Var online f�r mindre �n 60 min sedan)";
    $lang['not_online']                 = "Resten";
    $lang['user_activity']              = "Anv�ndaraktivitet";

  //tasks
    $lang['add_new_task']               = "L�gg till ny uppgift";
    $lang['priority']                   = "Prioritet";
    $lang['parent_task']                = "�verordnad uppgift";
    $lang['creation_time']              = "Skapad:";
    $lang['by_sprt']                    = "%1\$s av %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Projektnamn";
    $lang['task_name']                  = "Uppgiftens namn";
    $lang['deadline']                   = "Slutdatum";
    $lang['taken_from_parent']          = "(Taget fr�n �verordnad uppgift)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Ansvarig f�r uppgiften";
    $lang['project_owner']              = "Projektansvarig";
    $lang['taskgroup']                  = "Uppgiftgrupp";
    $lang['usergroup']                  = "Anv�ndargrupp";
    $lang['nobody']                     = "Ingen";
    $lang['none']                       = "Inga";
    $lang['no_group']                   = "Ingen grupp";
    $lang['all_groups']                 = "Alla grupper";
    $lang['all_users']                  = "Alla anv�ndare";
    $lang['all_users_view']             = "Ska alla anv�ndare kunna se denna uppgift?";
    $lang['group_edit']                 = "Ska alla i anv�ndargruppen kunna redigera?";
    $lang['project_description']        = "Projektbeskrivning";
    $lang['task_description']           = "Beskrivning av uppgiften";
    $lang['email_owner']                = "Mejla f�r�ndringarna till ansvarig?";
    $lang['email_new_owner']            = "Mejla f�r�ndringarna till (den nye) ansvarige?";
    $lang['email_group']                = "Mejla f�r�ndringarna till anv�ndargruppen?";
    $lang['add_new_project']            = "L�gg till ett nytt projekt";
    $lang['uncategorised']              = "Inte kategoriserat";
    $lang['due_sprt']                   = "%d dagar fr�n nu";
    $lang['tomorrow']                   = "Imorgon";
    $lang['due_today']                  = "Ber�knad idag";
    $lang['overdue_1']                  = "1 dag �ver tiden";
    $lang['overdue_sprt']               = "%d dagar �ver tiden";
    $lang['edit_task']                  = "Redigera uppgift";
    $lang['edit_project']               = "Redigera projekt";
    $lang['no_reparent']                = "Inget (ett h�gsta projekt)";
    $lang['del_javascript_project_sprt']= "Detta kommer att ta bort projektet %s. �r du s�ker?";
    $lang['del_javascript_task_sprt']   = "Detta kommer att ta bort uppgiften %s. �r du s�ker?";
    $lang['add_task']                   = "L�gg till uppgift";
    $lang['add_subtask']                = "L�gg till underuppgift";
    $lang['add_project']                = "L�gg till projekt";
    $lang['clone_project']              = "Klona projekt";
    $lang['clone_task']                 = "Klona uppgift";
    $lang['quick_jump']                 = "Snabbhopp";
    $lang['no_edit']                    = "Du har inte ansvaret f�r detta och kan d�rf�r inte redigera det";
    $lang['uncategorised']              = "Inte kategoriserad";
    $lang['admin']                      = "Administrat�r";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "Ta bort projekt";
    $lang['delete_task']                = "Ta bort uppgift";
    $lang['project_options']            = "Projektalternativ";
    $lang['task_options']               = "Uppgiftalternativ";
    $lang['javascript_archive_project'] = "Detta kommer att arkivera projektet %s.  �r du s�ker?";
    $lang['archive_project']            = "Arkivera projekt";
    $lang['task_navigation']            = "Navigering i uppgift";
    $lang['new_task']                   = "Ny uppgift";    
    $lang['no_projects']                = "Det finns inga projekt att titta p�";
    $lang['show_all_projects']          = "Visa alla projekt";
    $lang['show_active_projects']       = "Visa bara aktiva projekt";
    $lang['project_hold_sprt']          = "Projektet pausat sedan %s";
    $lang['project_planned']            = "Planerat projekt";
    $lang['percent_sprt']               = "%d %% av uppgifterna �r klara";
    $lang['project_no_deadline']        = "Detta projekt har inget slutdatum";
    $lang['no_allowed_projects']        = "Du har inte till�telse att titta p� n�got projekt";
    $lang['projects']                   = "Projekt";
    $lang['percent_project_sprt']       = "Detta projekt �r f�rdigt till %d %%";
    $lang['owned_by']                   = "Ansvarig:";
    $lang['created_on']                 = "Skapat";
    $lang['completed_on']               = "F�rdigt";
    $lang['modified_on']                = "�ndrat";
    $lang['project_on_hold']            = "Projektet �r pausat";
    $lang['project_accessible']         = "(Detta projekt �r tillg�ngligt f�r alla anv�ndare)";
    $lang['task_accessible']            = "(Denna uppgift �r tillg�nglig f�r alla anv�ndare)";
    $lang['project_not_accessible']     = "(Detta projekt �r bara tillg�ngligt f�r medlemmar i anv�ndargruppen)";
    $lang['task_not_accessible']        = "(Denna uppgift �r bara tillg�nglig f�r medlemmar i anv�ndargruppen)";
    $lang['project_not_in_usergroup']   = "Detta projekt tillh�r ingen anv�ndargrupp och �r tillg�ngligt f�r alla anv�ndare.";
    $lang['task_not_in_usergroup']      = "Denna uppgift tillh�r ingen anv�ndargrupp och �r tillg�ngligt f�r alla anv�ndare.";
    $lang['usergroup_can_edit_project'] = "Detta projekt kan ocks� redigeras av medlemmar i anv�ndargruppen.";
    $lang['usergroup_can_edit_task']    = "Denna uppgift kan ocks� redigeras av medlemmar i anv�ndargruppen.";
    $lang['i_take_it']                  = "Jag tar den :-)";
    $lang['i_finished']                 = "Jag �r f�rdig med den!";
    $lang['i_dont_want']                = "Jag vill inte ha den l�ngre";
    $lang['take_over_project']          = "Ta �ver projekt";
    $lang['take_over_task']             = "Ta �ver uppgift";
    $lang['task_info']                  = "Information om uppgift";
    $lang['project_details']            = "Projektdetaljer";
    $lang['todo_list_for']              = "Att g�ra f�r: ";
    $lang['due_in_sprt']                = " (Ska vara f�rdig om %d dagar)";
    $lang['due_tomorrow']               = " (Ska vara f�rdig imorgon)";
    $lang['no_assigned']                = "Det finna inga ouppklarade uppgifter till denna anv�ndare.";
    $lang['todo_list']                  = "Att g�ra";
    $lang['summary_list']               = "Sammanfattning";
    $lang['task_submit']                = "Skicka uppgift";
    $lang['not_owner']                  = "�tkomst nekas. Antingen �r du inte ansvarig eller s� har du inte tillr�ckliga r�ttigheter";
    $lang['missing_values']             = "Inte tillr�ckligt m�nga v�rden. G� tillbaka och f�rs�k igen";
    $lang['future']                     = "Framtid";
    $lang['flags']                      = "Flaggor";
    $lang['owner']                      = "Ansvarig";
    $lang['group']                      = "Grupp";
    $lang['by_usergroup']               = " (efter anv�ndargrupp)";
    $lang['by_taskgroup']               = " (efter uppgiftgrupp)";
    $lang['by_deadline']                = " (efter slutdatum)";
    $lang['by_status']                  = " (efter status)";
    $lang['by_owner']                   = " (efter ansvarig)";
    $lang['project_cloned']             = "Projekt som ska klonas:";
    $lang['task_cloned']                = "Uppgift som ska klonas:";
    $lang['note_clone']                 = "Obs: Uppgiften kommer att klonas som ett nytt projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalender";
    $lang['normal_version']             = "Normal version";
    $lang['print_version']              = "F�r utskrift";
    $lang['condensed_view']             = "Komprimerad vy";
    $lang['full_view']                  = "Fullst�ndig vy";
//**
    $lang['icalendar']                  = "iCalendar";

?>