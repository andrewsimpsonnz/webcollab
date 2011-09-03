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

  Language files for 'nl' (Nederlands)

  Maintainer: Patrick Flinkerbusch <patrick at flinkerbusch.info>

  NOTE: This file is written in UTF-8 character set
  
*/

//required language encodings
define('CHARACTER_SET', "UTF-8" );
define('XML_LANG', "nl" );

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mrt', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec' );
$week_array = array('Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Zat' );

//task states

 //priorities
    $task_state['dontdo']               = "Niet doen";
    $task_state['low']                  = "Laag";
    $task_state['normal']               = "Normaal";
    $task_state['high']                 = "Hoog";
    $task_state['yesterday']            = "Gisteren!";
 //status
    $task_state['new']                  = "Nieuw";
    $task_state['planned']              = "Ingepland (niet actief)";
    $task_state['active']               = "Actief (ik werk eraan)";
    $task_state['cantcomplete']         = "Wachtend";
    $task_state['completed']            = "Compleet";
    $task_state['done']                 = "Klaar";
    $task_state['task_planned']         = " Ingepland";
    $task_state['task_active']          = " Actief";
 //project states
    $task_state['planned_project']      = "Ingepland projekt (niet actief)";
    $task_state['no_deadline_project']  = "Geen einddatum ingesteld";
    $task_state['active_project']       = "Actief projekt";

//common items
    $lang['description']                = "Beschrijving";
    $lang['name']                       = "Naam";
    $lang['add']                        = "Toevoegen";
    $lang['update']                     = "Bijwerken";
    $lang['submit_changes']             = "Wijzigingen indienen";
    $lang['continue']                   = "Doorgaan";
    $lang['manage']                     = "Beheren";
    $lang['edit']                       = "Bewerken";
    $lang['delete']                     = "Verwijderen";
    $lang['del']                        = "Wis";
    $lang['confirm_del_javascript']     = " Bevestig verwijderen!";
    $lang['yes']                        = "Ja";
    $lang['no']                         = "Nee";
    $lang['action']                     = "Actie";
    $lang['task']                       = "Taak";
    $lang['tasks']                      = "Taken";
    $lang['project']                    = "Projekt";
    $lang['info']                       = "Info";
    $lang['bytes']                      = " bytes";
    $lang['select_instruct']            = "(Gebruik ctrl om meer te selecteren; of geen te selecteren)";
    $lang['member_groups']              = "De gebruiker is deelnemer in de onderstaande gemarkeerde groepen (indien van toepassing)";
    $lang['login']                      = "Login";
    $lang['login_action']               = "Login";
    $lang['login_screen']               = "Login";
    $lang['error']                      = "Fout";
    $lang['no_login']                   = "Toegang geweigerd; Fout in Login of wachtwoord";
    $lang['redirect_sprt']              = "U keert automatisch terug naar Login na %d seconden wachten";
    $lang['login_now']                  = "Klik hier om nu terug te keren naar Login";
    $lang['please_login']               = "Inloggen aub";
    $lang['go']                         = "Go!";

//graphic items
    $lang['late_g']                     = "&nbsp;LAAT&nbsp;";
    $lang['new_g']                      = "&nbsp;NIEUW&nbsp;";
    $lang['updated_g']                  = "&nbsp;BIJGEWERKT&nbsp;";

//admin config
    $lang['admin_config']               = "Beheer instellingen";
    $lang['email_settings']             = "Email berichtkop instellingen";
    $lang['admin_email']                = "Beheer email";
    $lang['email_reply']                = "Email 'antwoord aan'";
    $lang['email_from']                 = "Email 'van'";
    $lang['mailing_list']               = "Mailing lijst";
    $lang['default_checkbox']           = "Standaard keuze instellingen voor Projekten/Taken";
    $lang['allow_globalaccess']         = "Algehele toegang toestaan?";
    $lang['allow_group_edit']           = "Mag iedereen in gebruikersgroep bewerken?";
    $lang['set_email_owner']            = "Altijd eigenaar email bericht sturen met wijzigingen?";
    $lang['set_email_group']            = "Altijd Gebruikersgroep email bericht sturen met wijzigingen?";
    $lang['project_listing_order']      = "Projekt lijst volgorde";
    $lang['task_listing_order']         = "Taak lijst volgorde";
    $lang['configuration']              = "Instellingen";

//archive
    $lang['archived_projects']          = "Gearchiveerde Projekten";

//contacts
    $lang['firstname']                  = "Voornaam:";
    $lang['lastname']                   = "Achternaam:";
    $lang['company']                    = "Bedrijf:";
    $lang['home_phone']                 = "Telefoon thuis:";
    $lang['mobile']                     = "Mobiel:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Telefoon werk:";
    $lang['address']                    = "Adres:";
    $lang['postal']                     = "Postcode:";
    $lang['city']                       = "Plaats:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Notities:";
    $lang['add_contact']                = "Contactpersoon toevoegen";
    $lang['del_contact']                = "Contactpersoon verwijderen";
    $lang['contact_info']               = "Contactpersoon informatie";
    $lang['contacts']                   = "Contactpersonen";
    $lang['contact_add_info']           = "Indien u een bedrijfsnaam toevoegt, wordt die weergegeven in plaats van de gebruikers naam.";
    $lang['show_contact']               = "Contactpersonen weergeven";
    $lang['edit_contact']               = "Contactpersonen bewerken";
    $lang['contact_submit']             = "Contactpersoon indienen";
    $lang['contact_warn']               = "Onvoldoende gegevens ingevoerd om een contactpersoon toe te voegen; ga terug en vul tenminste voornaam en achternaam in";

 //files
    $lang['manage_files']               = "Beheer bestanden";
    $lang['no_files']                   = "Er zijn geen opgestuurde bestanden te beheren";
    $lang['no_file_uploads']            = "Deze site heeft het opsturen van bestanden geblokkeerd";
    $lang['file']                       = "Bestand:";
    $lang['uploader']                   = "Van:";
    $lang['files_assoc_project']        = "Aan dit projekt gekoppelde bestanden";
    $lang['files_assoc_task']           = "Aan deze taak gekoppelde bestanden";
    $lang['file_admin']                 = "Bestand beheer";
    $lang['add_file']                   = "Bestand toevoegen";
    $lang['files']                      = "Bestanden";
    $lang['file_choose']                = "Te versturen bestand:";
    $lang['upload']                     = "Verstuur";
    $lang['file_email_owner']           = "Email bericht over nieuw bestand naar de eigenaar?";
    $lang['file_email_usergroup']       = "Email bericht over nieuw bestand naar de gebruikersgroep?";
    $lang['max_file_sprt']              = "Te versturen bestand moet kleiner zijn dan %s kb.";
    $lang['file_submit']                = "Bestand indienen";
    $lang['no_upload']                  = "Geen bestand verstuurd.  Ga terug en probeer opnieuw.";
    $lang['file_too_big_sprt']          = "U kunt maximaal %s bytes opsturen.  Uw bestand was te groot en is verwijderd.";
    $lang['del_file_javascript_sprt']   = "Weet u zeker dat u %s wilt verwijderen?";


 //forum
    $lang['orig_message']               = "Origineel bericht:";
    $lang['post']                       = "Insturen!";
    $lang['message']                    = "Bericht:";
    $lang['post_reply_sprt']            = "Stuur een antwoord op een bericht van '%1\$s' over '%2\$s'";
    $lang['post_message_sprt']          = "Stuur bericht aan: '%s'";
    $lang['forum_email_owner']          = "Email forum bericht naar de eigenaar?";
    $lang['forum_email_usergroup']      = "Email forum bericht naar de gebruikersgroep?";
    $lang['reply']                      = "Antwoord";
    $lang['new_post']                   = "Nieuw bericht";
    $lang['public_user_forum']          = "Openbaar forum";
    $lang['private_forum_sprt']         = "Prive forum voor '%s' gebruikersgroep";
    $lang['forum_submit']               = "Forum indienen";
    $lang['no_message']                 = "Geen bericht! Ga terug en probeer opnieuw";
    $lang['add_reply']                  = "Antwoord toevoegen";
    $lang['last_post_sprt']             = "Laatste bericht %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Recente forum berichten";
    $lang['forum_search']               = "Forum zoeken";
    $lang['no_results']                 = "Geen zoekresultaten voor '%s'";
    $lang['search_results']             = "Er zijn %1\$s resultaten gevonden voor '%2\$s'<br />Weergave resultaten %3\$s tot %4\$s";

 //includes
    $lang['report']                     = "Raport";
    $lang['warning']                    = "<h1>Sorry!</h1><p>Op dit moment kunnen we uw vraag niet verwerken. Probeer het later nog eens.</p>";
    $lang['home_page']                  = "Hoofd pagina";
    $lang['summary_page']               = "Samenvatting pagina";
    $lang['log_out']                    = "Uitloggen";
    $lang['main_menu']                  = "Hoofd menu";
    $lang['archive']                    = "Archiveren";
    $lang['user_homepage_sprt']         = "%s's startpagina";
    $lang['missing_field_javascript']   = "Vul het ontbrekende veld in";
    $lang['invalid_date_javascript']    = "Kies eem geldige datum";
    $lang['finish_date_javascript']     = "De ingevulde datum is na de einddatum van het projekt!";
    $lang['security_manager']           = "Beveiligings beheer";
    $lang['session_timeout_sprt']       = "Toegang geweigerd; laatste actie was %1\$d minuten geleden en de timeout is %2\$d minuten; Aub <a href=\"%3\$sindex.php\">opnieuw inloggen</a>";
    $lang['access_denied']              = "Toegang geweigerd";
    $lang['private_usergroup_no_access']= "Sorry; dit deel bevindt zich in een prive gebruikersgroep en u heeft niet de benodigde toegangsrechten.";
    $lang['invalid_date']               = "Ongeldige datum";
    $lang['invalid_date_sprt']          = "De datum vam %s is ongeldig (Controleer het aantal dagen in de maand).<br />Ga terug en vul een geldige datum in.";


 //taskgroups
    $lang['taskgroup_name']             = "Taakgroep naam:";
    $lang['taskgroup_description']      = "Taakgroep korte omschrijving:";
    $lang['add_taskgroup']              = "Taakgroep toevoegen";
    $lang['add_new_taskgroup']          = "Nieuwe taakgroep toevoegen";
    $lang['edit_taskgroup']             = "Taakgroep bewerken";
    $lang['taskgroup_manage']           = "Taakgroep beheer";
    $lang['no_taskgroups']              = "Er zijn geen taakgroepen ingesteld";
    $lang['manage_taskgroups']          = "Beheer taakgroepen";
    $lang['taskgroups']                 = "Taakgroepen";
    $lang['taskgroup_dup_sprt']         = "Er bestaat al een taakgroep '%s'.  Ga terug en kies een nieuwe naam.";
    $lang['info_taskgroup_manage']      = "Info voor taakgroep beheer";

 //usergroups
    $lang['usergroup_name']             = "Gebruikersgroep naam:";
    $lang['usergroup_description']      = "Gebruikersgroep korte omschrijving:";
    $lang['members']                    = "Deelnemers:";
    $lang['private_usergroup']          = "Prive gebruikersgroep";
    $lang['add_usergroup']              = "Gebruikersgroep toevoegen";
    $lang['add_new_usergroup']          = "Nieuwe gebruikersgroep toevoegen";
    $lang['edit_usergroup']             = "Gerbuikersgroep bewerken";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Gebruikersgroep beheer";
    $lang['no_usergroups']              = "Er zijn geen gebruikersgroepen ingesteld";
    $lang['manage_usergroups']          = "Beheer gebruikersgroepen";
    $lang['usergroups']                 = "Gebruikersgroepen";
    $lang['usergroup_dup_sprt']         = "Er bestaat al een gebruikersgroep '%s'.  Ga terug en kies een nieuwe naam.";
    $lang['info_usergroup_manage']      = "Info voor gebruikersgroep beheer";

 //users
    $lang['login_name']                 = "Login naam";
    $lang['full_name']                  = "Volledige naam";
    $lang['password']                   = "Wachtwoord";
    $lang['blank_for_current_password'] = "(Leeg laten voor huidig wachtwoord)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Beheer";
    $lang['private_user']               = "Prive gebruiker";
    $lang['normal_user']                = "Normale gebruiker";
    $lang['is_admin']                   = "Is een beheerder?";
    $lang['is_guest']                   = "Is een gast?";
    $lang['guest']                      = "Gast";
    $lang['user_info']                  = "Gebruikers informatie";
    $lang['deleted_users']              = "Gedeactiveerde gebruikers";
    $lang['no_deleted_users']           = "Er zijn geen gedeactiveerde gebruiker.";
    $lang['revive']                     = "Activeer";
    $lang['permdel']                    = "Verwijder";
    $lang['permdel_javascript_sprt']    = "Hiermee worden alle gegevens en taken van %s definitief verwijderd. Weet u zeker dat u dat wilt?";
    $lang['add_user']                   = "Gebruiker toevoegen";
    $lang['edit_user']                  = "Gebruiker bewerken";
    $lang['no_users']                   = "Er zijn geen gebruikers ingesteld";
    $lang['users']                      = "Gebruikers";
    $lang['existing_users']             = "Bestaande gebruikers";
    $lang['private_profile']            = "Deze gebruiker heeft een prive profiel welke niet aan u getoond mag worden.";
    $lang['private_usergroup_profile']  = "(Deze gebruiker is deelnemer in een prive gebruikergroep welke niet aan u getoond mag worden)";
    $lang['email_users']                = "Email gebruikers";
    $lang['select_usergroup']           = "Hieronder geselcteerde gebruikersgroep:";
    $lang['subject']                    = "Onderwerp:";
    $lang['message_sent_maillist']      = "Het bericht wordt altijd gekopieerd naar de mail lijst.";
    $lang['who_online']                 = "Wie is online?";
    $lang['edit_details']               = "Bewerk gebruikers details";
    $lang['show_details']               = "Laat gebruikers details zien";
    $lang['user_deleted']               = "Deze gebruiker is gedeactiveerd!";
    $lang['no_usergroup']               = "De gebruiker is geen deelnemer in een gebruikersgroep";
    $lang['not_usergroup']              = "(Geen deelnemer in een gebruikersgroep)";
    $lang['no_password_change']         = "(Uw bestaande wachtwoord is niet gewijzigd)";
    $lang['last_time_here']             = "Laatste keer hier geweest:";
    $lang['number_items_created']       = "Aantal gemaakte items:";
    $lang['number_projects_owned']      = "Aantal eigen projekten:";
    $lang['number_tasks_owned']         = "Aantal eigen taken:";
    $lang['number_tasks_completed']     = "Aantal afgeronde taken:";
    $lang['number_forum']               = "Aantal forum berichten:";
    $lang['number_files']               = "Aantal ingestuurde bestanden:";
    $lang['size_all_files']             = "Totale omvang van alle eigen bestanden:";
    $lang['owned_tasks']                = "Eigen taken";
    $lang['invalid_email']              = "Ongeldig email adres";
    $lang['invalid_email_given_sprt']   = "Het email adres '%s' is ongeldig.  Ga terug en probeer opnieuw.";
    $lang['duplicate_user']             = "Dubbele gebruiker";
    $lang['duplicate_change_user_sprt'] = "De gebruiker '%s' bestaat al.  Ga terug en verander een naam.";
    $lang['value_missing']              = "Leeg veld";
    $lang['field_sprt']                 = "Het veld '%s' is leeg. Ga terug en vul het in.";
    $lang['admin_priv']                 = "LET OP: U heeft beheerders rechten gekregen.";
    $lang['manage_users']               = "Beheer gebruikers";
    $lang['users_online']               = "Gebruikers online";
    $lang['online']                     = "Veelvuldige bezoekers (Online minder dan een uur geleden)";
    $lang['not_online']                 = "Overigen";
    $lang['user_activity']              = "Gebruikers activiteiten";

  //tasks
    $lang['add_new_task']               = "Nieuwe taak toevoegen";
    $lang['priority']                   = "Prioriteit";
    $lang['parent_task']                = "Bovenliggende taak";
    $lang['creation_time']              = "Gemaakt op";
    $lang['by_sprt']                    = "%1\$s door %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Projekt naam";
    $lang['task_name']                  = "Taak naam";
    $lang['deadline']                   = "Einddatum";
    $lang['taken_from_parent']          = "(Overgenomen van bovenliggende taak)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Taak eigenaar";
    $lang['project_owner']              = "Projekt eigenaar";
    $lang['taskgroup']                  = "Taakgroep";
    $lang['usergroup']                  = "Gebruikersgroep";
    $lang['nobody']                     = "Niemand";
    $lang['none']                       = "Geen";
    $lang['no_group']                   = "Geen groep";
    $lang['all_groups']                 = "Alle groepen";
    $lang['all_users']                  = "Alle gebruikers";
    $lang['all_users_view']             = "Aan alle gebruikers tonen?";
    $lang['group_edit']                 = "Kan iedereen in gebruikersgroep bewerken?";
    $lang['project_description']        = "Projekt omschrijving";
    $lang['task_description']           = "Taak omschrijving";
    $lang['email_owner']                = "Email bericht sturen naar de eigenaar met de wijzigingen?";
    $lang['email_new_owner']            = "Email bericht sturen naar de (nieuwe) eigenaar met de wijzigingen?";
    $lang['email_group']                = "Email bericht sturen naar de gebruikersgroep met de wijzigingen?";
    $lang['add_new_project']            = "Nieuw projekt toevoegen";
    $lang['uncategorised']              = "Zonder categorie";
    $lang['due_sprt']                   = "over %d dagen";
    $lang['tomorrow']                   = "Morgen";
    $lang['due_today']                  = "Vandaag";
    $lang['overdue_1']                  = "1 dag te laat";
    $lang['overdue_sprt']               = "%d dagen te laat";
    $lang['edit_task']                  = "Taak bewerken";
    $lang['edit_project']               = "Projekt bewerken";
    $lang['no_reparent']                = "Geen (een top-level projekt)";
    $lang['del_javascript_project_sprt']= "Hiermee verwijderd u het projekt %s. Weet u het zeker?";
    $lang['del_javascript_task_sprt']   = "Hiermee verwijderd u de taak %s. Weet u het zeker?";
    $lang['add_task']                   = "Taak toevoegen";
    $lang['add_subtask']                = "Sub-taak toevoegen";
    $lang['add_project']                = "Projekt toevoegen";
    $lang['clone_project']              = "Projekt klonen";
    $lang['clone_task']                 = "Taak klonen";
    $lang['quick_jump']                 = "Snelkoppeling";
    $lang['no_edit']                    = "U bent niet de eigenaar van dit item en mag het dus niet bewerken";
    $lang['global']                     = "Algemeen";
    $lang['delete_project']             = "Projekt verwijderen";
    $lang['delete_task']                = "Taak verwijderen";
    $lang['project_options']            = "Projekt opties";
    $lang['task_options']               = "Taak opties";
    $lang['javascript_archive_project'] = "Hiermee archiveert u het projekt %s.  Weet u het zeker?";
    $lang['archive_project']            = "Projekt archiveren";
    $lang['task_navigation']            = "Taak navigatie";
    $lang['new_task']                   = "Nieuwe taak";
    $lang['no_projects']                = "Er zijn geen projekten te bekijken";
    $lang['show_all_projects']          = "Bekijk alle projekten";
    $lang['show_active_projects']       = "Bekijk alleen de actieve projekten";
    $lang['project_hold_sprt']          = "Projekt in wachtstand sinds %s";
    $lang['project_planned']            = "Ingepland projekt";
    $lang['percent_sprt']               = "%d%% van de taken is afgerond";
    $lang['project_no_deadline']        = "Geen einddatum ingesteld voor dit projekt";
    $lang['no_allowed_projects']        = "Er zijn geen projekten die aan u getoond mogen worden";
    $lang['projects']                   = "Projekten";
    $lang['percent_project_sprt']       = "Dit projekt is voor %d%% gereed";
    $lang['owned_by']                   = "Eigenaar";
    $lang['created_on']                 = "Gemaakt op";
    $lang['completed_on']               = "Afgerond op";
    $lang['modified_on']                = "Gewijzigd op";
    $lang['project_on_hold']            = "Projekt staat in de wacht";
    $lang['project_accessible']         = "(Dit projekt is vrij toegankelijk voor alle gebruikers)";
    $lang['task_accessible']            = "(Deze taak is vrij toegankelijk voor alle gebruikers)";
    $lang['project_not_accessible']     = "(Dit projekt is alleen toegankelijk voor deelnemers van de gebruikersgroep)";
    $lang['task_not_accessible']        = "(Deze taak is alleen toegankelijk voor de deelnemers van de gebruikersgroep)";
    $lang['project_not_in_usergroup']   = "Dit projekt is geen deel van een gebruikersgroep en is toegankelijk voor alle gebruikers.";
    $lang['task_not_in_usergroup']      = "Deze taak is geen deel van een gebruikersgroep is toegankelijk voor alle gebruikers.";
    $lang['usergroup_can_edit_project'] = "Dit projekt kan ook bewerkt worden door de deelnemers van de gebruikersgroep.";
    $lang['usergroup_can_edit_task']    = "Deze taak kan ook bewerkt worden door de deelnemers van de gebruikersgroep.";
    $lang['i_take_it']                  = "Ik neem het over :)";
    $lang['i_finished']                 = "Ik heb het afgerond!";
    $lang['i_dont_want']                = "Ik wil het niet meer";
    $lang['take_over_project']          = "Neem projekt over";
    $lang['take_over_task']             = "Neem taak over";
    $lang['task_info']                  = "Taak informatie";
    $lang['project_details']            = "Projekt details";
    $lang['todo_list_for']              = "ToDo lijst voor: ";
    $lang['due_in_sprt']                = " (Uiterlijk in %d dagen)";
    $lang['due_tomorrow']               = " (Uiterlijk morgen)";
    $lang['no_assigned']                = "Er zijn geen openstaande taken toegekend aan deze gebruiker.";
    $lang['todo_list']                  = "ToDo lijst";
    $lang['summary_list']               = "Samenvatting lijst";
    $lang['task_submit']                = "Taak indienen";
    $lang['not_owner']                  = "Toegang geweigerd. U bent niet de eigenaar of u heeft onvoldoende rechten";
    $lang['missing_values']             = "Er zijn onvoldoende velden ingevuld. Ga terug en probeer opnieuw";
    $lang['future']                     = "Toekomstig";
    $lang['flags']                      = "Markeringen";
    $lang['owner']                      = "Eigenaar";
    $lang['group']                      = "Groep";
    $lang['by_usergroup']               = " (op gebruikersgroep)";
    $lang['by_taskgroup']               = " (op taakgroep)";
    $lang['by_deadline']                = " (op einddatum)";
    $lang['by_status']                  = " (op status)";
    $lang['by_owner']                   = " (op eigenaar)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Te klonen projekt :";
    $lang['task_cloned']                = "Te klonen taak :";
    $lang['note_clone']                 = "Let op: De taak wordt gekloond als nieuw projekt";

//bits 'n' pieces
    $lang['calendar']                   = "Kalender";
    $lang['normal_version']             = "Normale versie";
    $lang['print_version']              = "Print versie";
    $lang['condensed_view']             = "Compacte weergave";
    $lang['full_view']                  = "Volledige weergave";
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>