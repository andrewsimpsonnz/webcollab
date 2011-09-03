<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

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

  Language files for 'no' (Norwegian)

  Maintainer:


  Translation by Kenneth Aar

  Editing and updating by Rune Thelen (26.09.2007)

  NOTE: This file is written in UTF-8 character set


*/

//required language encodings
define('CHARACTER_SET', "UTF-8" );
define('XML_LANG', "no" );

//dates
$month_array = array ( NULL, "Jan", "Feb", "Mar", "Apr", "Mai", "Juni", "Juli", "Aug", "Sep", "Okt", "Nov", "Des" );
$week_array = array('Søn','Man','Tirs','Ons','Tor','Fre','Lør');

//task states
 //priorities
    $task_state['dontdo']                 = " Ikke utfør";
    $task_state['low']                    = " Lav";
    $task_state['normal']                 = " Normal";
    $task_state['high']                   = " Høy";
    $task_state['yesterday']              = " Igår!";
 //status
    $task_state['new']                    = " Ny";
    $task_state['planned']                = " Planlagt (ikke aktiv)";
    $task_state['active']                 = " Aktiv (Jobbes med)";
    $task_state['cantcomplete']           = " Aventende";
    $task_state['completed']              = " Fullført";
    $task_state['done']                   = " Utført";
    $task_state['task_planned']           = " Planlagt";
    $task_state['task_active']            = " Aktiv";
 //project states
    $task_state['planned_project']        = "Planlagte prosjekter (ikke aktive)";
    $task_state['no_deadline_project']    = "Ingen frist fastlagt";
    $task_state['active_project']         = "Aktivt prosjekt";

//common items
    $lang['description']                  = "Beskrivelse";
    $lang['name']                         = "Navn";
    $lang['add']                          = "Tilføy";
    $lang['update']                       = "Oppdatert";
    $lang['submit_changes']               = "Send endring";
    $lang['continue']                     = "Fortsett";
    $lang['manage']                       = "Håndter";
    $lang['edit']                         = "Rediger";
    $lang['delete']                       = "Slett";
    $lang['del']                          = "Slett";
    $lang['confirm_del_javascript']       = "Bekreft sletting!";
    $lang['yes']                          = "Ja";
    $lang['no']                           = "Nei";
    $lang['action']                       = "Handling";
    $lang['task']                         = "Oppgave";
    $lang['tasks']                        = "Oppgaver";
    $lang['project']                      = "Prosjekt";
    $lang['info']                         = "Informasjon";
    $lang['bytes']                        = " bytes";
    $lang['select_instruct']              = "(Hold inn ctrl-knappen for å velge flere, eller for å velge ingen)";
    $lang['member_groups']                = "Brukeren er medlem av de uthevede gruppene under (om noen)";
    $lang['login']                        = "Logg inn";
    $lang['login_action']                 = "Logg inn";
    $lang['login_screen']                 = "Logg inn";
    $lang['error']                        = "Feil";
    $lang['no_login']                     = "Ingen tilgang, feil brukernavn eller passord";
    $lang['redirect_sprt']                = "Du vil bli sendt til innloggingsiden etter %d sekunder";
    $lang['login_now']                    = "Trykk her for å logge inn på nytt.";
    $lang['please_login']                 = "Logg inn";
    $lang['go']                           = "Send!";

//graphic items
    $lang['late_g']                       = "&nbsp;FORSINKET&nbsp;";
    $lang['new_g']                        = "&nbsp;NY&nbsp;";
    $lang['updated_g']                    = "&nbsp;OPPDATERT&nbsp;";

//admin config
    $lang['admin_config']                 = "Admin konfigurasjon";
    $lang['email_settings']               = "Epost innstillinger i header";
    $lang['admin_email']                  = "Admin epost";
    $lang['email_reply']                  = "Epost 'send svar til'";
    $lang['email_from']                   = "Epost 'fra'";
    $lang['mailing_list']                 = "Epostliste";
    $lang['default_checkbox']             = "Standard avkryssningsboks for innstillinger til Prosjekt/Oppgaver";
    $lang['allow_globalaccess']           = "Tillat full tilgang?";
    $lang['allow_group_edit']             = "Tillat alle i brukergruppe å redigere?";
    $lang['set_email_owner']              = "Send alltid epost til eier ved endringer?";
    $lang['set_email_group']              = "Send alltid epost til brukergruppe ved endringer?";
    $lang['project_listing_order']        = "Rekkefølgen på Prosjekt";
    $lang['task_listing_order']           = "Rekkefølgen på Oppgaver";
    $lang['configuration']                = "Konfigurasjon";

//archive
    $lang['archived_projects']            = "Arkiverte prosjekter";

//contacts
    $lang['firstname']                    = "Fornavn:";
    $lang['lastname']                     = "Etternavn:";
    $lang['company']                      = "Firma:";
    $lang['home_phone']                   = "Privattelefon:";
    $lang['mobile']                       = "Mobil:";
    $lang['fax']                          = "Faks:";
    $lang['bus_phone']                    = "Forretningstelefon:";
    $lang['address']                      = "Adresse:";
    $lang['postal']                       = "Postnummer:";
    $lang['city']                         = "By:";
    $lang['email_contact']                = "Epost:";
    $lang['notes']                        = "Notater:";
    $lang['add_contact']                  = "Tilføy kontakt";
    $lang['del_contact']                  = "Slett kontakt";
    $lang['contact_info']                 = "Kontakt informasjon";
    $lang['contacts']                     = "Kontakter";
    $lang['contact_add_info']             = "Hvis du tilføyer et firmanavn, så vil det bli vist i stedet for brukerens navn.";
    $lang['show_contact']                 = "Vis kontakter";
    $lang['edit_contact']                 = "Rediger kontakter";
    $lang['contact_submit']               = "Send kontakt";
    $lang['contact_warn']                 = "Ufullstendige opplysninger, gå tilbake og tilføy minst fornavn og etternavn";

 //files
    $lang['manage_files']                 = "Organiser filer";
    $lang['no_files']                     = "Det finnes ingen filer eller dokumenter å jobbe med";
    $lang['no_file_uploads']              = "Konfigurasjonen på dennen siden tillater ikke opplasting av filer";
    $lang['file']                         = "Fil:";
    $lang['uploader']                     = "Opplaster:";
    $lang['files_assoc_project']          = "Filer tilknyttet dette prosjektet";
    $lang['files_assoc_task']             = "Filer tilknyttet denne oppgaven";
    $lang['file_admin']                   = "Filadministrasjon";
    $lang['add_file']                     = "Legg til fil";
    $lang['files']                        = "Filer";
    $lang['file_choose']                  = "Fil som skal lastes opp:";
    $lang['upload']                       = "Last opp";
    $lang['file_email_owner']             = "Epostvarsling om ny fil til eier?";
    $lang['file_email_usergroup']         = "Epostvarsling om ny fil til brukergruppen?";
    $lang['max_file_sprt']                = "Filer som lastes opp må være mindre enn %s kb.";
    $lang['file_submit']                  = "Fil lastet opp";
    $lang['no_upload']                    = "Filen ble ikke lastet opp.  Vennligst prøv på nytt.";
    $lang['file_too_big_sprt']            = "Max. opplastnings størrelse er %s bytes.  Filen du prøvde å laste opp er for stor og ble derfor avbrutt.";
    $lang['del_file_javascript_sprt']     = "Er du sikker på at vil slette dette %s ?";

 //forum
    $lang['orig_message']                 = "Opprinnelig innlegg:";
    $lang['post']                         = "Legg inn!";
    $lang['message']                      = "Innlegg:";
    $lang['post_reply_sprt']              = "Send et svar på et innlegg fra '%1\$s' om '%2\$s'";
    $lang['forum_email_owner']            = "Send epost om innlegg til eier?";
    $lang['forum_email_usergroup']        = "Send epost om innlegg til brukergruppen?";
    $lang['post_message_sprt']            = "Send innlegg til: '%s'";
    $lang['reply']                        = "Svar";
    $lang['new_post']                     = "Nytt innlegg";
    $lang['public_user_forum']            = "Åpent brukerforum";
    $lang['private_forum_sprt']           = "Privat forum for '%s' brukergruppe";
    $lang['forum_submit']                 = "Legg inn i forumet";
    $lang['no_message']                   = "Tomt innlegg! Gå vennligst tilbake og prøv på nytt";
    $lang['add_reply']                    = "Legg til svar";
    $lang['last_post_sprt']               = "Siste innlegg ble postet %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']                 = "Nyeste innlegg i forumet";
//**
    $lang['forum_search']                 = "Søk i forum innlegg";
//**
    $lang['no_results']                   = "Fant ingenting med ordet/ordene '%s'";
//**
    $lang['search_results']               = "Fant %1\$s treff med ordet/ordene '%2\$s'<br />Viser treff %3\$s til %4\$s";

 //includes
    $lang['report']                       = "Rapport";
    $lang['warning']                      = "<h1>Beklager!</h1><p>Jeg er ikke i stand til å behandle din forespørsel akkurat nå. Vær vennlig og prøv igjen senere.</p>";
    $lang['home_page']                    = "Hovedside";
    $lang['summary_page']                 = "Sammendrag";
    $lang['todo_list']                    = "Gjøreliste";
    $lang['calendar']                     = "Kalender";
    $lang['log_out']                      = "Logg ut";
    $lang['main_menu']                    = "Hovedmeny";
    $lang['archive']                      = "Arkiv";
    $lang['user_homepage_sprt']           = "%s's arbeidsside";
    $lang['missing_field_javascript']     = "Du har glemt å fylle ut et felt";
    $lang['invalid_date_javascript']      = "Du har valgt en ugyldig dato.";
    $lang['finish_date_javascript']       = "Valgt dato er etter prosjektets sluttdato!";
    $lang['security_manager']             = "Sikkerhetskonfigurasjon";
    $lang['session_timeout_sprt']         = "Tilgang nektet, siste aktivitet fra din side var for %1\$d minutter siden og automatisk utlogging er etter %2\$d minuttter, vær så vennlig <a href=\"%3\$sindex.php\">logg inn</a> på nytt";
    $lang['access_denied']                = "Tilgang nektet";
    $lang['private_usergroup_no_access']  = "Beklager, dette området er en privat brukergruppe, og du har ikke tilgangsrettigheter her.";
    $lang['invalid_date']                 = "Ugyldig dato";
    $lang['invalid_date_sprt']            = "Datoen %s er ikke en gyldig kalenderdato (Sjekk antall dager i måneden).<br />Vær så vennlig at gå tilbake og velg en ny dato.";

 //taskgroups
    $lang['taskgroup_name']               = "Oppgavegruppenavn:";
    $lang['taskgroup_description']        = "Oppgavegruppe enkel beskrivelse:";
    $lang['add_taskgroup']                = "Legg til oppgavegruppe";
    $lang['add_new_taskgroup']            = "Legg til en ny oppgavegruppe";
    $lang['edit_taskgroup']               = "Rediger oppgavegruppe";
    $lang['taskgroup_manage']             = "Oppgavegruppe konfigurasjon";
    $lang['no_taskgroups']                = "Ingen oppgavegruppe definert";
    $lang['manage_taskgroups']            = "Administer oppgavegruppe";
    $lang['taskgroups']                   = "Oppgavegruppe";
    $lang['taskgroup_dup_sprt']           = "Det finnes allerede en oppgavegruppe med navnet '%s'.  Vær så vennlig og gå tilbake og velg et nytt navn.";
    $lang['info_taskgroup_manage']        = "Info om oppgaveadministrasjon";

 //usergroups
    $lang['usergroup_name']               = "Brukergruppe navn:";
    $lang['usergroup_description']        = "Brukergruppe enkel beskrivelse:";
    $lang['members']                      = "Medlemmer:";
    $lang['private_usergroup']            = "Privat brukergruppe";
    $lang['add_usergroup']                = "Legg til brukergruppe";
    $lang['add_new_usergroup']            = "Tilføy en ny brukergruppe";
    $lang['edit_usergroup']               = "Rediger brukergruppe";
//** needs translation
    $lang['email_new_usergroup']          = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']         = "Email the changes to usergroup members?";
    $lang['usergroup_manage']             = "Brukergruppe management";
    $lang['no_usergroups']                = "Ingen brukergruppe er definert";
    $lang['manage_usergroups']            = "Administrer brukergrupper";
    $lang['usergroups']                   = "Brukergrupper";
    $lang['usergroup_dup_sprt']           = "Det er allerede en brukergruppe med navnet '%s'.  Vær så vennlig at gå tilbake og velg et nytt navn.";
    $lang['info_usergroup_manage']        = "Info om brukergruppeadministrasjon";

 //users
    $lang['login_name']                   = "Logginn navn";
    $lang['full_name']                    = "Fullt navn";
    $lang['password']                     = "Passord";
    $lang['blank_for_current_password']   = "(La stå åpent for å beholde nåværende passord)";
    $lang['email']                        = "E-post";
    $lang['admin']                        = "Admin";
    $lang['private_user']                 = "Privat bruker";
    $lang['normal_user']                  = "Normal bruker";
    $lang['private_user']                 = "Privat bruker";
    $lang['is_admin']                     = "Er en admin?";
    $lang['is_guest']                     = "Er gjest?";
    $lang['guest']                        = "Gjestebruker";
    $lang['user_info']                    = "Brukerinformasjon";
    $lang['deleted_users']                = "Slettede brukere";
    $lang['no_deleted_users']             = "Der er ingen slettede brukere.";
    $lang['revive']                       = "Gjennopprett";
    $lang['permdel']                      = "Slette permanent";
    $lang['permdel_javascript_sprt']      = "Dette vil slette all brukeraktivitet og tilknyttede oppgaver for %s. Vil du virkelig gjøre dette?";
    $lang['add_user']                     = "Legg til bruker";
    $lang['edit_user']                    = "Rediger en bruker";
    $lang['no_users']                     = "Ingen bruker registrert av systemet";
    $lang['users']                        = "Brukere";
    $lang['existing_users']               = "Nåværende brukere";
    $lang['private_profile']              = "Denne bruker har en privat profil, som du ikke kan se.";
    $lang['private_usergroup_profile']    = "(Denne brukeren er medlem av en privat brukergruppe, som du ikke kan se)";
    $lang['email_users']                  = "Epost brukere";
    $lang['select_usergroup']             = "Brukergruppe valgt fra nedenstående:";
    $lang['subject']                      = "Emne:";
    $lang['message_sent_maillist']        = "I alle tilfeller blir beskjeden også kopieret til epostlisten.";
    $lang['who_online']                   = "Påloggede brukere?";
    $lang['edit_details']                 = "Rediger brukerdetaljer";
    $lang['show_details']                 = "Vis brukerdetaljer";
    $lang['user_deleted']                 = "Denne brukeren er slettet!";
    $lang['no_usergroup']                 = "Brukeren er ikke medlem av noen brukergruppe";
    $lang['not_usergroup']                = "(Ikke medlem av noen brukergruppe)";
    $lang['no_password_change']           = "(Ditt nåværende passord er ikke endret)";
    $lang['last_time_here']               = "Siste besøk:";
    $lang['number_items_created']         = "Antall opprettede emner:";
    $lang['number_projects_owned']        = "Antall eide prosjekter:";
    $lang['number_tasks_owned']           = "Antall eide oppgaver:";
    $lang['number_tasks_completed']       = "Antall avsluttede oppgaver:";
    $lang['number_forum']                 = "Antall forum innlegg:";
    $lang['number_files']                 = "Antall innlagte filer:";
    $lang['size_all_files']               = "Total størrelse av alle eide filer:";
    $lang['owned_tasks']                  = "Eide oppgaver";
    $lang['invalid_email']                = "Ugyldig epostadresse";
    $lang['invalid_email_given_sprt']     = "Epostadressen '%s' er ugyldig.  Vær så vennlig at gå tilbake og prøv igjen.";
    $lang['duplicate_user']               = "Klon bruker";
    $lang['duplicate_change_user_sprt']   = "Brukeren '%s' eksisterer allerede.  Vær så vennlig at gå tilbake og endre et navn.";
    $lang['value_missing']                = "Manglende verdi";
    $lang['field_sprt']                   = "Dette feltet '%s' er ikke utfylt. Vær så vennlig at gå tilbake og fyll det inn.";
    $lang['admin_priv']                   = "Merk: Du er blitt tildelt administrator rettigheter.";
    $lang['manage_users']                 = "Administrer brukere";
    $lang['users_online']                 = "Brukere online";
    $lang['online']                       = "Logget ut mindre enn 60 minutter siden";
    $lang['not_online']                   = "Resten";
    $lang['user_activity']                = "Brukeraktivitet";

  //tasks
    $lang['add_new_task']                 = "Legg til en ny oppgave";
    $lang['priority']                     = "Prioritet";
    $lang['parent_task']                  = "Forelder";
    $lang['creation_time']                = "Opprettet";
    $lang['by_sprt']                      = "%1\$s av %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                 = "Prosjektnavn";
    $lang['task_name']                    = "Oppgavenavn";
    $lang['deadline']                     = "Frist";
    $lang['taken_from_parent']            = "(overtatt fra forelder)";
    $lang['status']                       = "Status";
    $lang['task_owner']                   = "Oppgaveeier";
    $lang['project_owner']                = "Prosjekteier";
    $lang['taskgroup']                    = "Oppgavegruppe";
    $lang['usergroup']                    = "Brukergruppe";
    $lang['nobody']                       = "Ingen";
    $lang['none']                         = "Ingen";
    $lang['no_group']                     = "Ingen gruppe";
    $lang['all_groups']                   = "Alle grupper";
    $lang['all_users']                    = "Alle brukere";
    $lang['all_users_view']               = "Alle brukere kan se dette emne?";
    $lang['group_edit']                   = "Enhver i brukergruppen kan redigere?";
    $lang['project_description']          = "Prosjektbeskrivelse";
    $lang['task_description']             = "Oppgavebeskrivelse";
    $lang['email_owner']                  = "Send en epost til eieren med endringene?";
    $lang['email_new_owner']              = "Send en epost til (ny) eier med endringer?";
    $lang['email_group']                  = "Send en epost til brukergruppen med endringene?";
    $lang['add_new_project']              = "Legg til et nytt prosjekt";
    $lang['uncategorised']                = "ikke kategorisert";
    $lang['due_sprt']                     = "%d dager fra idag";
    $lang['tomorrow']                     = "I morgen";
    $lang['due_today']                    = "Frist i dag";
    $lang['overdue_1']                    = "1 dag overskredet";
    $lang['overdue_sprt']                 = "%d dager overskredet";
    $lang['edit_task']                    = "Rediger oppgave";
    $lang['edit_project']                 = "Rediger prosjekt";
    $lang['no_reparent']                  = "Ingen (et topnivå prosjekt)";
    $lang['del_javascript_project_sprt']  = "Dette vil slette prosjekt %s. Er du sikker?";
    $lang['del_javascript_task_sprt']     = "Dette vil slette oppgave %s. Er du sikker?";
    $lang['add_task']                     = "Legg til oppgave";
    $lang['add_subtask']                  = "Legg til underoppgave";
    $lang['add_project']                  = "Legg til prosjekt";
    $lang['clone_project']                = "Klon prosjekt";
    $lang['clone_task']                   = "Klon oppgave";
    $lang['quick_jump']                   = "Hurtig flytning";
    $lang['no_edit']                      = "Du eier ikke dette emne og derfor kan du ikke redigere det";
    $lang['global']                       = "Global";
    $lang['delete_project']               = "Slett prosjekt";
    $lang['delete_task']                  = "Slett oppgave";
    $lang['project_options']              = "Prosjekt muligheter";
    $lang['task_options']                 = "Oppgave muligheter";
    $lang['javascript_archive_project']   = "Dette vil arkivere prosjekt %s.  Er du sikker?";
    $lang['archive_project']              = "Arkivprosjekt";
    $lang['task_navigation']              = "Oppgave navigasjon";
    $lang['new_task']                     = "Ny oppgave";
    $lang['no_projects']                  = "Du har ingen aktive prosjekter";
    $lang['show_all_projects']            = "Vis alle prosjekter";
    $lang['show_active_projects']         = "Vis kun aktive prosjekter";
    $lang['project_hold_sprt']            = "Prosjekt avventer siden %s";
    $lang['project_planned']              = "Planlagt prosjekt";
    $lang['percent_sprt']                 = "%d%% av oppgavene er utført";
    $lang['project_no_deadline']          = "Ingen frist angitt for dette prosjektet";
    $lang['no_allowed_projects']          = "Det er ingen prosjekter, som du har tillatelse til å se";
    $lang['projects']                     = "Prosjekter";
    $lang['percent_project_sprt']         = "Dette prosjekt er %d%% fullført";
    $lang['owned_by']                     = "Eies av";
    $lang['created_on']                   = "Opprettet den";
    $lang['completed_on']                 = "Utført den";
    $lang['modified_on']                  = "Endret den";
    $lang['project_on_hold']              = "Prosjekt avventer";
    $lang['project_accessible']           = "(Dette prosjektet er offentligt tilgjengelig for alle brukere)";
    $lang['task_accessible']              = "(Denne oppgaven er offentlig tilgjengelig for alle brukere)";
    $lang['project_not_accessible']       = "(Dette prosjekt er ikke tilgjengelig for andre enn medlemmerne av brukergruppen)";
    $lang['task_not_accessible']          = "(Denne oppgaven er ikke tilgjengelig for andre enn medlemmer av brukergruppen)";
    $lang['project_not_in_usergroup']     = "Dette prosjekt er ikke del av en brukergruppen og er tilgjengelig for alle brukere.";
    $lang['task_not_in_usergroup']        = "Denne oppgaven er ikke del av en brukergruppen og er tilgjengelig for alle brukere.";
    $lang['usergroup_can_edit_project']   = "Dette prosjekt kan redigeres av alle brukergruppens medlemmer.";
    $lang['usergroup_can_edit_task']      = "Denne oppgaven kan redigeres av alle brukergruppens medlemmer.";
    $lang['i_take_it']                    = "Jeg tar den :)";
    $lang['i_finished']                   = "Jeg avslutter den!";
    $lang['i_dont_want']                  = "Jeg ønsker ikke å være del av denne mer";
    $lang['take_over_project']            = "Overta prosjekt";
    $lang['take_over_task']               = "Overta oppgave";
    $lang['task_info']                    = "Oppgaveinformasjon";
    $lang['project_details']              = "Prosjektdetaljer";
    $lang['todo_list_for']                = "Gjøreliste for: ";
    $lang['due_in_sprt']                  = " (Frist om %d dager)";
    $lang['due_tomorrow']                 = " (Utløper i morgen)";
    $lang['no_assigned']                  = "Der er ingen uavsluttede oppgaver tilknyttet denne bruker.";
    $lang['summary_list']                 = "Sammendragsliste";
    $lang['task_submit']                  = "Legg inn oppgave";
    $lang['not_owner']                    = "Tilgang nektet, enten fordi du ikke er eier, eller du ikke har tilstrekkelig rettigheter";
    $lang['missing_values']               = "Du har ikke fylt ut alle påkrevde feltene, vær så vennlig å gå tilbake og prøv igjen";
    $lang['future']                       = "Fremtid";
    $lang['flags']                        = "Flagg";
    $lang['owner']                        = "Eier";
    $lang['group']                        = "Gruppe";
    $lang['by_usergroup']                 = " (ved brukergruppe)";
    $lang['by_taskgroup']                 = " (ved oppgavegruppe)";
    $lang['by_deadline']                  = " (ved frist)";
    $lang['by_status']                    = " (ved status)";
    $lang['by_owner']                     = " (ved eier)";
//** needs translation
    $lang['by_priority']                  = " (by priority)";
    $lang['project_cloned']               = "Prosjekt skal klones :";
    $lang['task_cloned']                  = "Oppgave skal klones:";
    $lang['note_clone']                   = "Merk: Oppgaven vil bli klonet som et nytt prosjekt";

//bits 'n' pieces
    $lang['calendar']                     = "Kalender";
    $lang['normal_version']               = "Normal versjon";
    $lang['print_version']                = "Print versjon";
    $lang['condensed_view']               = "Konsentrert visning";
    $lang['full_view']                    = "Full visning";
    $lang['icalendar']                    = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>