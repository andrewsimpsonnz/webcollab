<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson at paradise.net.nz>

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful, but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave,
  Cambridge, MA 02139, USA.


  Function:
  ---------

  Language files for 'da' (Danish)

  Maintainer:


  Translation by Jens Thomsen

  NOTE: This file is written in ISO-8859-1 character set


*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );

//this is the regex for input validation filter used in common.php
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s";

//dates
$month_array = array ( NULL, "Jan", "Feb", "Mar", "Apr", "Maj", "Juni", "Juli", "Aug", "Sep", "Okt", "Nov", "Dec" );
$week_array = array('S�n','Man','Tirs','Ons','Tor','Fre','L�r');

//task states
 //priorities
    $task_state['dontdo']                 = "Udf�r ikke";
    $task_state['low']                    = "Lav";
    $task_state['normal']                 = "Normal";
    $task_state['high']                   = "H�j";
    $task_state['yesterday']              = "Ig�r!";
 //status
    $task_state['new']                    = "Ny";
    $task_state['planned']                = "Planlagt (ikke aktiv)";
    $task_state['active']                 = "Aktiv (under udf�relse)";
    $task_state['cantcomplete']           = "Afventende";
    $task_state['completed']              = "Fuldf�rt";
    $task_state['done']                   = "Udf�rt";
    $task_state['task_planned']           = " Planlagt";
    $task_state['task_active']            = " Aktiv";
 //project states
    $task_state['planned_project']        = "Planlagte projekter (ikke aktive)";
    $task_state['no_deadline_project']    = "Ingen frist fastlagt";
    $task_state['active_project']         = "Aktivt projekt";

//common items
    $lang['description']                  = "Beskrivelse";
    $lang['name']                         = "Navn";
    $lang['add']                          = "Tilf�j";
    $lang['update']                       = "Ajourf�r";
    $lang['submit_changes']               = "Send �ndring";
    $lang['continue']                     = "Forts�t";
    $lang['reset']                        = "Reset";
    $lang['manage']                       = "Manage";
    $lang['edit']                         = "Rediger";
    $lang['delete']                       = "Slet";
    $lang['del']                          = "Del";
    $lang['confirm_del_javascript']       = "Bekr�ft slet!";
    $lang['yes']                          = "Ja";
    $lang['no']                           = "Nej";
    $lang['action']                       = "Aktion";
    $lang['task']                         = "Opgave";
    $lang['tasks']                        = "Opgaver";
    $lang['project']                      = "Projekt";
    $lang['info']                         = "Info";
    $lang['bytes']                        = " bytes";
    $lang['select_instruct']              = "(Brug ctrl til at v�lge flere, eller til ingen at v�lge)";
    $lang['member_groups']                = "Brugeren er medlem af de fremh�vede grupper herunder (hvis nogen)";
    $lang['login']                        = "Login";
    $lang['login_action']                 = "Login";
    $lang['login_screen']                 = "Login";
    $lang['error']                        = "Fejl";
    $lang['no_login']                     = "Adgang n�gtet, ikke korrekt login eller password";
    $lang['redirect_sprt']                = "You will automatically return to Login after a %d second delay";
    $lang['login_now']                    = "Please click here to return to Login now";
    $lang['please_login']                 = "V�r venlig at logge in";
    $lang['go']                           = "Go!";

//graphic items
    $lang['late_g']                       = "&nbsp;FORSINKET&nbsp;";
    $lang['new_g']                        = "&nbsp;NY&nbsp;";
    $lang['updated_g']                    = "&nbsp;AJOURF�RT&nbsp;";

//admin config
    $lang['admin_config']                 = "Admin config";
    $lang['email_settings']               = "Email indstillinger i header";
    $lang['admin_email']                  = "Admin email";
    $lang['email_reply']                  = "Email 'besvar til'";
    $lang['email_from']                   = "Email 'fra'";
    $lang['mailing_list']                 = "Mailing liste";
    $lang['default_checkbox']             = "Default checkboks indstillinnger for Projekt/Opgaver";
    $lang['allow_globalaccess']           = "Tillad fuld adgang?";
    $lang['allow_group_edit']             = "Tillad alle i brugergruppe at redigere?";
    $lang['set_email_owner']              = "Email altid ejer ved �ndringer?";
    $lang['set_email_group']              = "Email altid brugergruppe ved �ndringer?";
//**
    $lang['project_listing_order']        = "Project listing order";
//**
    $lang['task_listing_order']           = "Task listing order";
    $lang['configuration']                = "Configuration";

//archive
    $lang['archived_projects']            = "Arkiverede projekter";

//contacts
    $lang['firstname']                    = "Fornavn:";
    $lang['lastname']                     = "Efternavn:";
    $lang['company']                      = "Firma:";
    $lang['home_phone']                   = "Privattelefon:";
    $lang['mobile']                       = "Mobil:";
    $lang['fax']                          = "Fax:";
    $lang['bus_phone']                    = "Forretningstelefon:";
    $lang['address']                      = "Adresse:";
    $lang['postal']                       = "Postnummer:";
    $lang['city']                         = "By:";
    $lang['email_contact']                = "Email:";
    $lang['notes']                        = "Noter:";
    $lang['add_contact']                  = "Tilf�j kontakt";
    $lang['del_contact']                  = "Slet kontakt";
    $lang['contact_info']                 = "Kontakt information";
    $lang['contacts']                     = "Kontakter";
    $lang['contact_add_info']             = "Hvis du tilf�jer et firmanavn, s� vil det blive vist i stedet for brugerens navn.";
    $lang['show_contact']                 = "Vis kontakter";
    $lang['edit_contact']                 = "Rediger kontakter";
    $lang['contact_submit']               = "Send kontakt";
    $lang['contact_warn']                 = "Der er ikke v�rdier nok til at tilf�je en kontakt, g� tilbage og tilf�j mindst fornavn og efternavn";

 //files
    $lang['manage_files']                 = "Arbejd med filer";
    $lang['no_files']                     = "Der er ikke nogen indl�ste filer at arbejde med";
    $lang['no_file_uploads']              = "Serverconfiguration p� denne hjemmeside tillader ikke indl�sning af filer";
    $lang['file']                         = "File:";
    $lang['uploader']                     = "Indl�ser:";
    $lang['files_assoc_project']          = "Filet tilknyttet dette projekt";
    $lang['files_assoc_task']             = "Filer tilknyttet denne opgave";
    $lang['file_admin']                   = "File admin";
    $lang['add_file']                     = "Tilf�j file";
    $lang['files']                        = "Filer";
    $lang['file_choose']                  = "File til indl�sning:";
    $lang['upload']                       = "Indl�s";
    $lang['file_email_owner']             = "Emailbesked om ny fil til ejer?";
    $lang['file_email_usergroup']         = "Emailbesked om ny fil til brugergruppen?";
    $lang['max_file_sprt']                = "File som indl�ses skal v�re mindre end %s kb.";
    $lang['file_submit']                  = "File send";
    $lang['no_upload']                    = "Der blev ikke indl�st nogen fil.  G� venligst tilbage og pr�v igen.";
    $lang['file_too_big_sprt']            = "Max. indl�snings st�rrelse %s bytes.  Din indl�sning var for stor og er blevet slettet.";
    $lang['del_file_javascript_sprt']     = "Er du sikker p� at ville slette dette %s ?";

 //forum
    $lang['orig_message']                 = "Oprindelig meddelelse:";
    $lang['post']                         = "Send den!";
    $lang['message']                      = "Meddelelse:";
    $lang['post_reply_sprt']              = "Send et svar p� en meddelelse fra '%1\$s' om '%2\$s'";
    $lang['forum_email_owner']            = "Email forum meddelelse til ejer?";
    $lang['forum_email_usergroup']        = "Email forum meddelelse til brugergruppen?";
    $lang['post_message_sprt']            = "Send meddelelse til: '%s'";
    $lang['reply']                        = "Svar";
    $lang['new_post']                     = "Ny post";
    $lang['public_user_forum']            = "Offentligt brugerforum";
    $lang['private_forum_sprt']           = "Privat forum for '%s' brugergruppe";
    $lang['forum_submit']                 = "Forum send";
    $lang['no_message']                   = "Ingen meddelelse! G� venligst tilbage og pr�v igen";
    $lang['add_reply']                    = "Tilf�j svar";
//**
    $lang['last_post_sprt']               = "Sidste indl�g %s"; //Note to translators: context is 'Last post 2004-Dec-22'
//**
    $lang['recent_posts']                 = "Nyeste indl�g til forum";
//**
    $lang['recent_posts']                 = "Recent forum posts";
//**
    $lang['forum_search']                 = "Forum search";
//**
    $lang['no_results']                   = "No results found for '%s'";
//**
    $lang['search_results']               = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                       = "Rapport";
    $lang['warning']                      = "<h1>Beklager!</h1><p>Vi er ikke i stand til at bearbejde din anmodning lige nu. V�r venlig og pr�v igen senere.</p>";
    $lang['home_page']                    = "Hjemmeside";
    $lang['summary_page']                 = "Resume-side";
    $lang['todo_list']                    = "ToDo liste";
    $lang['log_out']                      = "Log out";
    $lang['main_menu']                    = "Hovedmenu";
    $lang['archive']                      = "Arkiv";
    $lang['user_homepage_sprt']           = "%s's hjemmeside";
    $lang['missing_field_javascript']     = "V�r s� venlig at tilf�je en v�rdi til det manglende felt";
    $lang['invalid_date_javascript']      = "V�r s� venlig at v�lge en gyldig kalenderdato";
    $lang['finish_date_javascript']       = "Den indtastede dato er efter projektets slutdato!";
    $lang['security_manager']             = "Sikkerhedsmanager";
    $lang['session_timeout_sprt']         = "Adgang n�gtet, sidste handling var %1\$d minutter siden og timeout er %2\$d minuttter, v�r s� venlig <a href=\"%3\$sindex.php\">re-login</a>";
    $lang['access_denied']                = "Adgang n�gtet";
    $lang['private_usergroup_no_access']  = "Beklager, Dette omr�de er en privat brugergruppe, og du har ikke adgangsrettigheder.";
    $lang['invalid_date']                 = "Ugyldig dato";
    $lang['invalid_date_sprt']            = "Datoen %s er ikke en gyldig kalenderdato (Check antallet af dage i m�neden).<br />V�r s� venlig at g� tilbage og indtast en ny dato.";

 //taskgroups
    $lang['taskgroup_name']               = "Opgavegruppenavn:";
    $lang['taskgroup_description']        = "Opgavegruppe enkel beskrivelse:";
    $lang['add_taskgroup']                = "Tilf�j opgavegruppe";
    $lang['add_new_taskgroup']            = "Tilf�j en ny opgave gruppe";
    $lang['edit_taskgroup']               = "Rediger opgavegruppe";
    $lang['taskgroup_manage']             = "Opgavegruppe management";
    $lang['no_taskgroups']                = "Ingen opgavegruppe defineret";
    $lang['manage_taskgroups']            = "Administer opgavegruppe";
    $lang['taskgroups']                   = "Opgavegruppe";
    $lang['taskgroup_dup_sprt']           = "Der er allerede en opgavegruppe '%s'.  V�r s� venlig og g� tilbage og v�lg et nyt navn.";
    $lang['info_taskgroup_manage']        = "Info om opgaveadministration";

 //usergroups
    $lang['usergroup_name']               = "Brugergruppe navn:";
    $lang['usergroup_description']        = "Brugergruppe enkel beskrivelse:";
    $lang['members']                      = "Medlemmer:";
    $lang['private_usergroup']            = "Privat brugergruppe";
    $lang['add_usergroup']                = "Tilf�j brugergruppe";
    $lang['add_new_usergroup']            = "Tilf�r en ny brugergruppe";
    $lang['edit_usergroup']               = "Rediger brugergruppe";
    $lang['usergroup_manage']             = "Brugergruppe management";
    $lang['no_usergroups']                = "Ingen brugergruppe er defineret";
    $lang['manage_usergroups']            = "Administrer brugergrupper";
    $lang['usergroups']                   = "Brugergrupper";
    $lang['usergroup_dup_sprt']           = "Der er allerede en brugergruppe '%s'.  V�r s� venlig at g� tilbage og v�lg et nyt navn.";
    $lang['info_usergroup_manage']        = "Info om brugergruppeadministration";

 //users
    $lang['login_name']                   = "Login navn";
    $lang['full_name']                    = "Fuldt navn";
    $lang['password']                     = "Password";
    $lang['blank_for_current_password']   = "(Lad st� �bent for nuv�rende password)";
    $lang['email']                        = "E-mail";
    $lang['admin']                        = "Admin";
    $lang['private_user']                 = "Privat bruger";
    $lang['normal_user']                  = "Normal bruger";
    $lang['private_user']                 = "Privat bruger";
    $lang['is_admin']                     = "Er en admin?";
    $lang['is_guest']                     = "Er g�st?";
    $lang['guest']                        = "G�stebruger";
    $lang['user_info']                    = "Brugerinformation";
    $lang['deleted_users']                = "Slettede brugere";
    $lang['no_deleted_users']             = "Der er ingen slettede brugere.";
    $lang['revive']                       = "Genopliv";
    $lang['permdel']                      = "Permdel";
    $lang['permdel_javascript_sprt']      = "Dette vil slette alle brugerrecords og tilknyttede opgaver for %s. Vil du virkelig g�re dette?";
    $lang['add_user']                     = "Tilf�j bruger";
    $lang['edit_user']                    = "Rediger en bruger";
    $lang['no_users']                     = "Ingen bruger kendes af systemet";
    $lang['users']                        = "Brugere";
    $lang['existing_users']               = "Nuv�rende brugere";
    $lang['private_profile']              = "Denne burger har en privat profil, som du ikke kan se.";
    $lang['private_usergroup_profile']    = "( Denne burger er medlem af en privaat brugergruppe, som du ikke kan se)";
    $lang['email_users']                  = "Email brugere";
    $lang['select_usergroup']             = "Brugergruppe valgt fra nedenst�ende:";
    $lang['subject']                      = "Emne:";
    $lang['message_sent_maillist']        = "I alle tilf�lde bliver meddelelsen ogs� kopieret til mailinglisten.";
    $lang['who_online']                   = "Hvem er online?";
    $lang['edit_details']                 = "Rediger brugerdetaljer";
    $lang['show_details']                 = "Vis brugerdetaljer";
    $lang['user_deleted']                 = "Denne bruger er blevet slettet!";
    $lang['no_usergroup']                 = "Brugeren er ikke medlem af nogen brugergruppe";
    $lang['not_usergroup']                = "(Ikke medlem af nogen brugergruppe)";
    $lang['no_password_change']           = "(Dit nuv�rende password er ikke �ndret)";
    $lang['last_time_here']               = "Sidste bes�g:";
    $lang['number_items_created']         = "Antal oprettede emner:";
    $lang['number_projects_owned']        = "Antal projekter ejet:";
    $lang['number_tasks_owned']           = "Antal opgaver ejet:";
    $lang['number_tasks_completed']       = "Antal opgaver afsluttet:";
    $lang['number_forum']                 = "Antal forum posts:";
    $lang['number_files']                 = "Antal indl�ste filer:";
    $lang['size_all_files']               = "Total st�rrelse af alle ejede filer:";
    $lang['owned_tasks']                  = "Ejede opgaver";
    $lang['invalid_email']                = "Ugyldig emailadresse";
    $lang['invalid_email_given_sprt']     = "Emailadressen '%s' er ugyldig.  V�r s� venlig at g� tilbage og pr�v igen.";
    $lang['duplicate_user']               = "Duplikat bruger";
    $lang['duplicate_change_user_sprt']   = "Brugeren '%s' eksisterer allerede.  V�r s� venlig at g� tilbage og �ndre et navn.";
    $lang['value_missing']                = "Manglende v�rdi";
    $lang['field_sprt']                   = "Dette felt '%s' mangler. V�r s� venlig at g� tilbage og udfyld det.";
    $lang['admin_priv']                   = "NOTE: Du er blevet tildelt administrator privilegier.";
    $lang['manage_users']                 = "Administrer brugere";
    $lang['users_online']                 = "Brugere online";
    $lang['online']                       = "Die hard surfers (Online for mindre end 60 mins siden)";
    $lang['not_online']                   = "Resten";
    $lang['user_activity']                = "Brugeraktivitet";

  //tasks
    $lang['add_new_task']                 = "Tilf�j en ny opgave";
    $lang['priority']                     = "Prioritet";
    $lang['parent_task']                  = "For�lder";
    $lang['creation_time']                = "Tidspkt. oprettelse";
    $lang['by_sprt']                      = "%1\$s af %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                 = "Projektnavn";
    $lang['task_name']                    = "Opgavenavn";
    $lang['deadline']                     = "Frist";
    $lang['taken_from_parent']            = "(overtaget fra for�lder)";
    $lang['status']                       = "Status";
    $lang['task_owner']                   = "Opgaveejer";
    $lang['project_owner']                = "Projektejer";
    $lang['taskgroup']                    = "Opgavegruppe";
    $lang['usergroup']                    = "Brugergruppe";
    $lang['nobody']                       = "Ingen";
    $lang['none']                         = "Ingen";
    $lang['no_group']                     = "Ingen gruppe";
    $lang['all_groups']                   = "Alle grupper";
    $lang['all_users']                    = "Alle brugere";
    $lang['all_users_view']               = "Alle brugere kan se dette emne?";
    $lang['group_edit']                   = "Enhver i brugergruppen kan redigere?";
    $lang['project_description']          = "Projektbeskrivelse";
    $lang['task_description']             = "Opgavebeskrivelse";
    $lang['email_owner']                  = "Send en email til ejeren med �ndringerne?";
    $lang['email_new_owner']              = "Send en email til den (ny) ejer med �ndringerne?";
    $lang['email_group']                  = "Send en email til brugergruppen med �ndringerne?";
    $lang['add_new_project']              = "Tilf�j et nyt projekt";
    $lang['uncategorised']                = "ikke kategoriseret";
    $lang['due_sprt']                     = "%d dage fra nu";
    $lang['tomorrow']                     = "I morgen";
    $lang['due_today']                    = "Frist i dag";
    $lang['overdue_1']                    = "1 dag overskredet";
    $lang['overdue_sprt']                 = "%d dage overskredet";
    $lang['edit_task']                    = "Rediger opgave";
    $lang['edit_project']                 = "Rediger projekt";
    $lang['no_reparent']                  = "Ingen (et topniveau projekt)";
    $lang['del_javascript_project_sprt']  = "Dette vil slette projekt %s. Er du sikker?";
    $lang['del_javascript_task_sprt']     = "Dette vil slette opgave %s. Er du sikker?";
    $lang['add_task']                     = "Tilf�j opgave";
    $lang['add_subtask']                  = "Tilf�j underopgave";
    $lang['add_project']                  = "Tilf�j projekt";
    $lang['clone_project']                = "Klonprojekt";
    $lang['clone_task']                   = "Klonopgave";
    $lang['quick_jump']                   = "Hurtig flytning";
    $lang['no_edit']                      = "Du ejer ikke dette emne og derfor kan du ikke redigere det";
    $lang['global']                       = "Global";
    $lang['delete_project']               = "Slet projekt";
    $lang['delete_task']                  = "Slet opgave";
    $lang['project_options']              = "Projekt muligheder";
    $lang['task_options']                 = "Opgave muligheder";
    $lang['javascript_archive_project']   = "Dette vil arkivere projekt %s.  Er du sikker?";
    $lang['archive_project']              = "Arkivprojekt";
    $lang['task_navigation']              = "Opgave navigation";
    $lang['new_task']                     = "Ny opgave";
    $lang['no_projects']                  = "Der er ingen projekter at vise";
    $lang['show_all_projects']            = "Vis alle projekter";
    $lang['show_active_projects']         = "Vis kun aktive projekter";
    $lang['project_hold_sprt']            = "Projekt afventer siden %s";
    $lang['project_planned']              = "Planlagt projekt";
    $lang['percent_sprt']                 = "%d%% af opgaverne er udf�rt";
    $lang['project_no_deadline']          = "Ingen frist angivet for dette projekt";
    $lang['no_allowed_projects']          = "Der er ingen projekter, som du har tilladelse til at se";
    $lang['projects']                     = "Projekter";
    $lang['percent_project_sprt']         = "Dette projekt er %d%% fuldf�rt";
    $lang['owned_by']                     = "Ejes af";
    $lang['created_on']                   = "Oprettet den";
    $lang['completed_on']                 = "Udf�rt den";
    $lang['modified_on']                  = "�ndret den";
    $lang['project_on_hold']              = "Projekt afventer";
    $lang['project_accessible']           = "(Dette projekt er offentligt tilg�ngeligt for alle brugere)";
    $lang['task_accessible']              = "(Denne opgave er offentlig tilg�ngelig for alle brugere)";
    $lang['project_not_accessible']       = "(Dette projekt er ikke tilg�ngeligt for medlemmerne af brugergruppen)";
    $lang['task_not_accessible']          = "(Denne opgave er ikke tilg�ngelig for medlemmer af brugergruppen)";
    $lang['project_not_in_usergroup']     = "Dette projekt er ikke del af en brugergruppe og er tilg�ngeligt for alle brugere.";
    $lang['task_not_in_usergroup']        = "Denne opgave er ikke del af en brugergruppe og er tilg�ngeligt for alle brugere.";
    $lang['usergroup_can_edit_project']   = "Dette projekt kan ogs� redigeres af brugergruppens medlemmer.";
    $lang['usergroup_can_edit_task']      = "Denne opgave kan ogs� redigeres af brugergruppens medlemmer.";
    $lang['i_take_it']                    = "Jeg tager den :)";
    $lang['i_finished']                   = "Jeg afsluttede den!";
    $lang['i_dont_want']                  = "Jeg �nsker den ikke mere";
    $lang['take_over_project']            = "Overtag projekt";
    $lang['take_over_task']               = "Overtag opgave";
    $lang['task_info']                    = "Opgaveinformation";
    $lang['project_details']              = "Projektdetaljer";
    $lang['todo_list_for']                = "ToDo liste for: ";
    $lang['due_in_sprt']                  = " (Frist om %d dage)";
    $lang['due_tomorrow']                 = " (Udl�ber i morgen)";
    $lang['no_assigned']                  = "Der er ingen uafsluttede opgaver tilknyttet denne bruger.";
    $lang['summary_list']                 = "Resumeliste";
    $lang['task_submit']                  = "Opgave send";
    $lang['not_owner']                    = "Adgang n�gtet, enten fordi du ikke er ejer, eller du ikke har tilstr�kkelige rettigheder";
    $lang['missing_values']               = "Der er ikke udfyldt nok feltv�rdier, v�r s� venlig at g� tilbage og pr�v igen";
    $lang['future']                       = "Fremtid";
    $lang['flags']                        = "Flags";
    $lang['owner']                        = "Ejer";
    $lang['group']                        = "Gruppe";
    $lang['by_usergroup']                 = " (ved brugergruppe)";
    $lang['by_taskgroup']                 = " (ved opgavegruppe)";
    $lang['by_deadline']                  = " (ved frist)";
    $lang['by_status']                    = " (ved status)";
    $lang['by_owner']                     = " (ved ejer)";
    $lang['project_cloned']               = "Projekt skal klones :";
    $lang['task_cloned']                  = "Opgave skal klones:";
    $lang['note_clone']                   = "Bem�rk: Opgaven vil blive klonet som et nyt projekt";

//bits 'n' pieces
    $lang['calendar']                     = "Kalender";
    //**
    $lang['normal_version']               = "Normal version";
    //**
    $lang['print_version']                = "Print version";
//**
    $lang['condensed_view']               = "Koncentreret visning";
//**
    $lang['full_view']                    = "Fuld visning";
//**
    $lang['icalendar']                    = "iCalendar";

?>
