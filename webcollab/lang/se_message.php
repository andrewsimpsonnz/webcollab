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

  Maintainer: Göran Källqvist <g.kallqvist@telia.com>


  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', "UTF-8" );
define('XML_LANG', "se" );

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Sön', 'Mĺn', 'Tis', 'Ons', 'Tor', 'Fre', 'Lör' );

//task states

 //priorities
    $task_state['dontdo']               = "Gör inget";
    $task_state['low']                  = "Lĺg";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "Hög";
    $task_state['yesterday']            = "Igĺr!";
 //status
    $task_state['new']                  = "Ny";
    $task_state['planned']              = "Planerad (inte aktiv)";
    $task_state['active']               = "Aktiv (arbetar med den)";
    $task_state['cantcomplete']         = "Pausad";
    $task_state['completed']            = "Färdig";
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
    $lang['add']                        = "Lägga till";
    $lang['update']                     = "Uppdatera";
    $lang['submit_changes']             = "Skicka ändringar";
    $lang['continue']                   = "Fortsätt";
    $lang['manage']                     = "Sköta";
    $lang['edit']                       = "Redigera";
    $lang['delete']                     = "Ta bort";
    $lang['del']                        = "Stryk";
    $lang['confirm_del_javascript']     = " Bekräfta radering!";
    $lang['yes']                        = "Ja";
    $lang['no']                         = "Nej";
    $lang['action']                     = "Ĺtgärd";
    $lang['task']                       = "Uppgift";
    $lang['tasks']                      = "Uppgifter";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Info";
    $lang['bytes']                      = " bytes";
    $lang['select_instruct']            = "(Använd <ctrl> för att välja flera eller för att inte välja nĺgon)";
    $lang['member_groups']              = "Om användaren är med i nĺgon grupp har de markerats";
    $lang['login']                      = "Logga in";
    $lang['login_action']               = "Logga in";
    $lang['login_screen']               = "Logga in";
    $lang['error']                      = "Fel";
    $lang['no_login']                   = "Ĺtkomst nekas. Fel användarnamn eller lösenord";
    $lang['redirect_sprt']              = "Efter %d sekunders väntan kommer du automatiskt att ĺtervända till inloggning";
    $lang['login_now']                  = "Klicka här för att ĺtervända till inloggning";
    $lang['please_login']               = "Var god logga in";
    $lang['go']                         = "Kör!";

//graphic items
    $lang['late_g']                     = "&nbsp;SEN&nbsp;";
    $lang['new_g']                      = "&nbsp;NY&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPPDATERAD&nbsp;";

//admin config
    $lang['admin_config']               = "Konfigurera administratör";
    $lang['email_settings']             = "Email-rubriker";
    $lang['admin_email']                = "Epost-adress till administratör";
    $lang['email_reply']                = "Epost 'svar till'";
    $lang['email_from']                 = "Epost 'frĺn'";
    $lang['mailing_list']               = "Mejl-lista";
    $lang['default_checkbox']           = "Standardinställningar för Projekt/Uppgifter";
    $lang['allow_globalaccess']         = "Tillĺta tillgĺng till alla?";
    $lang['allow_group_edit']           = "Tillĺta alla i användargrupper att redigera?";
    $lang['set_email_owner']            = "Alltid mejla den ansvarige om förändringar?";
    $lang['set_email_group']            = "Alltid mejla användargruppen om förändringar?";
    $lang['project_listing_order']      = "Projekt listordning";
    $lang['task_listing_order']         = "Uppgifter listordning";
    $lang['configuration']              = "Konfigurering";

//archive
    $lang['archived_projects']          = "Arkiverade projekt";

//contacts
    $lang['firstname']                  = "Förnamn:";
    $lang['lastname']                   = "Efternamn:";
    $lang['company']                    = "Företag:";
    $lang['home_phone']                 = "Hemtelefon:";
    $lang['mobile']                     = "Mobil:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Tel arbetet:";
    $lang['address']                    = "Adress:";
    $lang['postal']                     = "Postnummer:";
    $lang['city']                       = "Ort:";
    $lang['email_contact']              = "Epost:";
    $lang['notes']                      = "Anmärkningar:";
    $lang['add_contact']                = "Lägg till kontakt";
    $lang['del_contact']                = "Ta bort kontakt";
    $lang['contact_info']               = "Kontaktinformation";
    $lang['contacts']                   = "Kontakter";
    $lang['contact_add_info']           = "Om du anger ett företagsnamn kommer det att visas istället för användarens namn.";
    $lang['show_contact']               = "Visa kontakter";
    $lang['edit_contact']               = "Redigera kontakter";
    $lang['contact_submit']             = "Spara kontakt";
    $lang['contact_warn']               = "Det är otillräckliga uppgifter för att spara denna kontakt. Var god gĺ tillbaka och lägg ĺtminstone till för- och efternamn";

 //files
    $lang['manage_files']               = "Ta hand om filer";
    $lang['no_files']                   = "Det finns inga inskickade filer att ta hand om";
    $lang['no_file_uploads']            = "Servern pĺ denna sajt tillĺter inte att filer skickas in";
    $lang['file']                       = "Fil:";
    $lang['uploader']                   = "Skickad av:";
    $lang['files_assoc_project']        = "Filer som hör till detta projekt";
    $lang['files_assoc_task']           = "Filer som hör till denna uppgift";
    $lang['file_admin']                 = "Filadministrering";
    $lang['add_file']                   = "Lägg till fil";
    $lang['files']                      = "Filer";
    $lang['file_choose']                = "Fil att skicka:";
    $lang['upload']                     = "Skicka";
    $lang['file_email_owner']           = "Mejla ansvarig om att en ny fil har skickats?";
    $lang['file_email_usergroup']       = "Mejla användargruppen om att en ny fil har skickats?";
    $lang['max_file_sprt']              = "Filen som ska skickas fĺr inte vara mer än %s kb stor.";
    $lang['file_submit']                = "Skicka fil";
    $lang['no_upload']                  = "Ingen fil skickades. Var god försök igen.";
    $lang['file_too_big_sprt']          = "Man kan skicka högst %s bytes.  Din fil var för stor och har tagits bort.";
    $lang['del_file_javascript_sprt']   = "Är du säker pĺ att du vill ta bort %s ?";


 //forum
    $lang['orig_message']               = "Ursprungligt inlägg:";
    $lang['post']                       = "Skicka det!";
    $lang['message']                    = "Inlägg:";
    $lang['post_reply_sprt']            = "Skicka svar pĺ ett inlägg frĺn '%1\$s' om '%2\$s'";
    $lang['post_message_sprt']          = "Skicka inlägg till: '%s'";
    $lang['forum_email_owner']          = "Mejla foruminlägg till ansvarig?";
    $lang['forum_email_usergroup']      = "Mejla foruminlägg till användargrupp?";
    $lang['reply']                      = "Svar";
    $lang['new_post']                   = "Nytt inlägg";
    $lang['public_user_forum']          = "Öppet användarforum";
    $lang['private_forum_sprt']         = "Privat forum för användargrupp '%s'";
    $lang['forum_submit']               = "Skicka in forum";
    $lang['no_message']                 = "Inget inlägg! Var god försök igen";
    $lang['add_reply']                  = "Lägg till svar";
    $lang['last_post_sprt']             = "Senaste inlägg %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Aktuella foruminlägg";
    $lang['forum_search']               = "Sök i forum";
    $lang['no_results']                 = "Inga resultat hittade för '%s'";
    $lang['search_results']             = "Hittade %1\$s resultat för '%2\$s'<br />Visar resultat %3\$s till %4\$s";

 //includes
    $lang['report']                     = "Rapport";
    $lang['warning']                    = "<h1>Tyvärr!</h1><p>Vi kan inte ta emot din begäran just nu. Var god försök igen senare.</p>";
    $lang['home_page']                  = "Startsida";
    $lang['summary_page']               = "Sammanfattning";
    $lang['log_out']                    = "Logga ut";
    $lang['main_menu']                  = "Huvudmeny";
    $lang['archive']                    = "Arkiv";
    $lang['user_homepage_sprt']         = "%ss startsida";
    $lang['missing_field_javascript']   = "Var god ange ett giltigt värde för det fält som saknas";
    $lang['invalid_date_javascript']    = "Var god välj ett giltigt datum";
    $lang['finish_date_javascript']     = "Angivet datum infaller efter projektets slutdatum!";
    $lang['security_manager']           = "Säkerhetshanterare";
    $lang['session_timeout_sprt']       = "Ĺtkomst nekas; senaste ĺtgärd gjordes för %1\$d minuter sedan och maxtid är %2\$d minuter. Var god och <a href=\"%3\$sindex.php\">logga in igen</a>";
    $lang['access_denied']              = "Ĺtkomst nekas";
    $lang['private_usergroup_no_access']= "Tyvärr. Detta är en privat användargrupp och du har inte ĺtkomsträttigheter.";
    $lang['invalid_date']               = "Ogiltigt datum";
    $lang['invalid_date_sprt']          = "Datumet %s är inte ett giltigt kalnderdatum (Kolla antal dagar i mĺnaden).<br />Var god gĺ tillbaka och ange ett giltigt datum.";

 //taskgroups
    $lang['taskgroup_name']             = "Uppgiftgruppens namn:";
    $lang['taskgroup_description']      = "Kort beskrivning av uppgiftgruppen:";
    $lang['add_taskgroup']              = "Lägg till en uppgiftgrupp";
    $lang['add_new_taskgroup']          = "Lägg till en ny uppgiftgrupp";
    $lang['edit_taskgroup']             = "Redigera uppgiftgrupp";
    $lang['taskgroup_manage']           = "Skötsel av uppgiftgrupper";
    $lang['no_taskgroups']              = "Inga uppgiftgrupper definierade";
    $lang['manage_taskgroups']          = "Sköta uppgiftgrupper";
    $lang['taskgroups']                 = "Uppgiftgrupper";
    $lang['taskgroup_dup_sprt']         = "Det finns redan en uppgiftgrupp som heter '%s'.  Var god gĺ tillbaka och välj ett annat namn.";
    $lang['info_taskgroup_manage']      = "Information om uppgiftgrupper";

 //usergroups
    $lang['usergroup_name']             = "Användargruppens namn:";
    $lang['usergroup_description']      = "Kort beskrivning av användargruppen:";
    $lang['members']                    = "Medlemmar:";
    $lang['private_usergroup']          = "Privat användargrupp";
    $lang['add_usergroup']              = "Lägg till användargrupp";
    $lang['add_new_usergroup']          = "Lägg till ny användargrupp";
    $lang['edit_usergroup']             = "Redigera användargrupp";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Skötsel av användargrupper";
    $lang['no_usergroups']              = "Inga användargrupper definierade";
    $lang['manage_usergroups']          = "Sköta användargrupper";
    $lang['usergroups']                 = "Användargrupper";
    $lang['usergroup_dup_sprt']         = "Det finns redan en användargrupp som heter '%s'.  Var god gĺ tillbaka och välj ett annat namn.";
    $lang['info_usergroup_manage']      = "Information om användargrupp";

 //users
    $lang['login_name']                 = "Användarnamn";
    $lang['full_name']                  = "Fullständigt namn";
    $lang['password']                   = "Lösenord";
    $lang['blank_for_current_password'] = "(Lämna blankt för att använda aktuellt lösenord)";
    $lang['email']                      = "E-post";
    $lang['admin']                      = "Administratör";
    $lang['private_user']               = "Privat användare";
    $lang['normal_user']                = "Normal användare";
    $lang['is_admin']                   = "Är administratör?";
    $lang['is_guest']                   = "Är gäst?";
    $lang['guest']                      = "Gästanvändare";
    $lang['user_info']                  = "Användarinformation";
    $lang['deleted_users']              = "Raderade användare";
    $lang['no_deleted_users']           = "Det finns inga raderade användare.";
    $lang['revive']                     = "Ĺteruppväck";
    $lang['permdel']                    = "Radera permanent";
    $lang['permdel_javascript_sprt']    = "Detta kommer att för gott ta bort alla poster och tillhörande uppgifter för användaren %s. Vill du verkligen det?";
    $lang['add_user']                   = "Lägg till användare";
    $lang['edit_user']                  = "Redigera användare";
    $lang['no_users']                   = "Det finns inga kända användare";
    $lang['users']                      = "Användare";
    $lang['existing_users']             = "Existerande användare";
    $lang['private_profile']            = "Denna användare har en privat profil som du inte kan titta pĺ.";
    $lang['private_usergroup_profile']  = "(Denna användare är medlem i en privat användargrupp som du inte kan titta pĺ)";
    $lang['email_users']                = "Epost användare";
    $lang['select_usergroup']           = "Välj användargrupp:";
    $lang['subject']                    = "Ämne:";
    $lang['message_sent_maillist']      = "Meddelandet kopieras ocksĺ till mejllistan.";
    $lang['who_online']                 = "Vilka är online?";
    $lang['edit_details']               = "Redigera användaruppgifter";
    $lang['show_details']               = "Visa användaruppgifter";
    $lang['user_deleted']               = "Denna användare har tagits bort!";
    $lang['no_usergroup']               = "Användaren är inte medlem i nĺgon användargrupp";
    $lang['not_usergroup']              = "(Inte medlem i nĺgon användargrupp)";
    $lang['no_password_change']         = "(Ditt befintliga lösenord har inte ändrats)";
    $lang['last_time_here']             = "Var här senast:";
    $lang['number_items_created']       = "Antal skapade artiklar:";
    $lang['number_projects_owned']      = "Ansvarig för antal projekt:";
    $lang['number_tasks_owned']         = "Ansvarig för antal uppgifter:";
    $lang['number_tasks_completed']     = "Antal färdiga uppgifter:";
    $lang['number_forum']               = "Antal foruminlägg:";
    $lang['number_files']               = "Antal skickade filer:";
    $lang['size_all_files']             = "Total storlek pĺ skickade filer:";
    $lang['owned_tasks']                = "Ansvarig för uppgifter";
    $lang['invalid_email']              = "Ogiltig epost-adress";
    $lang['invalid_email_given_sprt']   = "Epost-adressen '%s' är ogiltig.  Var god gĺ tillbaka och försök igen.";
    $lang['duplicate_user']             = "Användaren finns";
    $lang['duplicate_change_user_sprt'] = "Användaren '%s' existerar redan.  Var god gĺ tillbaka och ändra ett namn.";
    $lang['value_missing']              = "Saknat värde";
    $lang['field_sprt']                 = "Fältet '%s' saknar värde. Var god gĺ tillbaka och fyll i det.";
    $lang['admin_priv']                 = "OBS: Du har tilldelats administratörsrättigheter.";
    $lang['manage_users']               = "Sköta användare";
    $lang['users_online']               = "Användare som är online";
    $lang['online']                     = "Flitig Internet-användare (Var online för mindre än 60 min sedan)";
    $lang['not_online']                 = "Resten";
    $lang['user_activity']              = "Användaraktivitet";

  //tasks
    $lang['add_new_task']               = "Lägg till ny uppgift";
    $lang['priority']                   = "Prioritet";
    $lang['parent_task']                = "Överordnad uppgift";
    $lang['creation_time']              = "Skapad:";
    $lang['by_sprt']                    = "%1\$s av %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Projektnamn";
    $lang['task_name']                  = "Uppgiftens namn";
    $lang['deadline']                   = "Slutdatum";
    $lang['taken_from_parent']          = "(Taget frĺn överordnad uppgift)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Ansvarig för uppgiften";
    $lang['project_owner']              = "Projektansvarig";
    $lang['taskgroup']                  = "Uppgiftgrupp";
    $lang['usergroup']                  = "Användargrupp";
    $lang['nobody']                     = "Ingen";
    $lang['none']                       = "Inga";
    $lang['no_group']                   = "Ingen grupp";
    $lang['all_groups']                 = "Alla grupper";
    $lang['all_users']                  = "Alla användare";
    $lang['all_users_view']             = "Ska alla användare kunna se denna uppgift?";
    $lang['group_edit']                 = "Ska alla i användargruppen kunna redigera?";
    $lang['project_description']        = "Projektbeskrivning";
    $lang['task_description']           = "Beskrivning av uppgiften";
    $lang['email_owner']                = "Mejla förändringarna till ansvarig?";
    $lang['email_new_owner']            = "Mejla förändringarna till (den nye) ansvarige?";
    $lang['email_group']                = "Mejla förändringarna till användargruppen?";
    $lang['add_new_project']            = "Lägg till ett nytt projekt";
    $lang['uncategorised']              = "Inte kategoriserat";
    $lang['due_sprt']                   = "%d dagar frĺn nu";
    $lang['tomorrow']                   = "Imorgon";
    $lang['due_today']                  = "Beräknad idag";
    $lang['overdue_1']                  = "1 dag över tiden";
    $lang['overdue_sprt']               = "%d dagar över tiden";
    $lang['edit_task']                  = "Redigera uppgift";
    $lang['edit_project']               = "Redigera projekt";
    $lang['no_reparent']                = "Inget (ett högsta projekt)";
    $lang['del_javascript_project_sprt']= "Detta kommer att ta bort projektet %s. Är du säker?";
    $lang['del_javascript_task_sprt']   = "Detta kommer att ta bort uppgiften %s. Är du säker?";
    $lang['add_task']                   = "Lägg till uppgift";
    $lang['add_subtask']                = "Lägg till underuppgift";
    $lang['add_project']                = "Lägg till projekt";
    $lang['clone_project']              = "Klona projekt";
    $lang['clone_task']                 = "Klona uppgift";
    $lang['quick_jump']                 = "Snabbhopp";
    $lang['no_edit']                    = "Du har inte ansvaret för detta och kan därför inte redigera det";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "Ta bort projekt";
    $lang['delete_task']                = "Ta bort uppgift";
    $lang['project_options']            = "Projektalternativ";
    $lang['task_options']               = "Uppgiftalternativ";
    $lang['javascript_archive_project'] = "Detta kommer att arkivera projektet %s.  Är du säker?";
    $lang['archive_project']            = "Arkivera projekt";
    $lang['task_navigation']            = "Navigering i uppgift";
    $lang['new_task']                   = "Ny uppgift";
    $lang['no_projects']                = "Det finns inga projekt att titta pĺ";
    $lang['show_all_projects']          = "Visa alla projekt";
    $lang['show_active_projects']       = "Visa bara aktiva projekt";
    $lang['project_hold_sprt']          = "Projektet pausat sedan %s";
    $lang['project_planned']            = "Planerat projekt";
    $lang['percent_sprt']               = "%d %% av uppgifterna är klara";
    $lang['project_no_deadline']        = "Detta projekt har inget slutdatum";
    $lang['no_allowed_projects']        = "Du har inte tillĺtelse att titta pĺ nĺgot projekt";
    $lang['projects']                   = "Projekt";
    $lang['percent_project_sprt']       = "Detta projekt är färdigt till %d %%";
    $lang['owned_by']                   = "Ansvarig:";
    $lang['created_on']                 = "Skapat";
    $lang['completed_on']               = "Färdigt";
    $lang['modified_on']                = "Ändrat";
    $lang['project_on_hold']            = "Projektet är pausat";
    $lang['project_accessible']         = "(Detta projekt är tillgängligt för alla användare)";
    $lang['task_accessible']            = "(Denna uppgift är tillgänglig för alla användare)";
    $lang['project_not_accessible']     = "(Detta projekt är bara tillgängligt för medlemmar i användargruppen)";
    $lang['task_not_accessible']        = "(Denna uppgift är bara tillgänglig för medlemmar i användargruppen)";
    $lang['project_not_in_usergroup']   = "Detta projekt tillhör ingen användargrupp och är tillgängligt för alla användare.";
    $lang['task_not_in_usergroup']      = "Denna uppgift tillhör ingen användargrupp och är tillgängligt för alla användare.";
    $lang['usergroup_can_edit_project'] = "Detta projekt kan ocksĺ redigeras av medlemmar i användargruppen.";
    $lang['usergroup_can_edit_task']    = "Denna uppgift kan ocksĺ redigeras av medlemmar i användargruppen.";
    $lang['i_take_it']                  = "Jag tar den :-)";
    $lang['i_finished']                 = "Jag är färdig med den!";
    $lang['i_dont_want']                = "Jag vill inte ha den längre";
    $lang['take_over_project']          = "Ta över projekt";
    $lang['take_over_task']             = "Ta över uppgift";
    $lang['task_info']                  = "Information om uppgift";
    $lang['project_details']            = "Projektdetaljer";
    $lang['todo_list_for']              = "Att göra för: ";
    $lang['due_in_sprt']                = " (Ska vara färdig om %d dagar)";
    $lang['due_tomorrow']               = " (Ska vara färdig imorgon)";
    $lang['no_assigned']                = "Det finna inga ouppklarade uppgifter till denna användare.";
    $lang['todo_list']                  = "Att göra";
    $lang['summary_list']               = "Sammanfattning";
    $lang['task_submit']                = "Skicka uppgift";
    $lang['not_owner']                  = "Ĺtkomst nekas. Antingen är du inte ansvarig eller sĺ har du inte tillräckliga rättigheter";
    $lang['missing_values']             = "Inte tillräckligt mĺnga värden. Gĺ tillbaka och försök igen";
    $lang['future']                     = "Framtid";
    $lang['flags']                      = "Flaggor";
    $lang['owner']                      = "Ansvarig";
    $lang['group']                      = "Grupp";
    $lang['by_usergroup']               = " (efter användargrupp)";
    $lang['by_taskgroup']               = " (efter uppgiftgrupp)";
    $lang['by_deadline']                = " (efter slutdatum)";
    $lang['by_status']                  = " (efter status)";
    $lang['by_owner']                   = " (efter ansvarig)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Projekt som ska klonas:";
    $lang['task_cloned']                = "Uppgift som ska klonas:";
    $lang['note_clone']                 = "Obs: Uppgiften kommer att klonas som ett nytt projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalender";
    $lang['normal_version']             = "Normal version";
    $lang['print_version']              = "För utskrift";
    $lang['condensed_view']             = "Komprimerad vy";
    $lang['full_view']                  = "Fullständig vy";
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>
