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

  Language files for 'gr' (Greek)

  Maintainer: Nico Bel <t at designext.gr>


  NOTE: This file is written in UTF-8 character set

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "gr" );

//dates
$month_array = array (NULL, 'Ιαν', 'Φεβ', 'Μαρ', 'Απρ', 'Μαϊ', 'Ιουν', 'Ιουλ', 'Αυγ', 'Σεπ', 'Οκτ', 'Νοε', 'Δεκ' );
$week_array = array('Κυρ', 'Δευ', 'Τρι', 'Τετ', 'Πεμ', 'Παρ', 'Σαβ' );

//task states

 //priorities
    $task_state['dontdo']               = "Ακύρωσε";
    $task_state['low']                  = "Χαμηλή";
    $task_state['normal']               = "Κανονική";
    $task_state['high']                 = "Υψηλή";
    $task_state['yesterday']            = "Χθες!";
 //status
    $task_state['new']                  = "Νεα";
    $task_state['planned']              = "Κανονισμένη (ανενεργή)";
    $task_state['active']               = "Ενεργοποιημένη (σε επεξεργασία)";
    $task_state['cantcomplete']         = "Απενεργοποιημένη";
    $task_state['completed']            = "Ολοκληρώθηκε";
    $task_state['done']                 = "ΟΚ";
    $task_state['task_planned']         = " Κανονισμένη";
    $task_state['task_active']          = " Ενεργή";
 //project states
    $task_state['planned_project']      = "Project κανονισμένο (ανενεργή)";
    $task_state['no_deadline_project']  = "Δεν καθορίστηκε ημερομηνία παράδοσης";
    $task_state['active_project']       = "Ενεργό project";

//common items
    $lang['description']                = "Περιγραφή";
    $lang['name']                       = "Ονομα";
    $lang['add']                        = "Πρόσθεση";
    $lang['update']                     = "Ανανέωση";
    $lang['submit_changes']             = "Καταχώρηση αλλαγών";
    $lang['continue']                   = "Συνέχεια";
    $lang['manage']                     = "Διαχείρηση";
    $lang['edit']                       = "Επεξεργασία";
    $lang['delete']                     = "Ακύρωση";
    $lang['del']                        = "Διαγραφή";
    $lang['confirm_del_javascript']     = " Επιβεβαίωση διαγραφής!";
    $lang['yes']                        = "Ναι";
    $lang['no']                         = "Όχι";
    $lang['action']                     = "Ενέργεια";
    $lang['task']                       = "Εργασία";
    $lang['tasks']                      = "Εργασίες";
    $lang['project']                    = "Project";
    $lang['info']                       = "Πληροφορίες";
    $lang['bytes']                      = " bytes";
    $lang['select_instruct']            = "(Χρησιμοποιείστε το ctrl για να επιλέξετε περισσότερα; ή για να μην επιλέξετε τίποτα)";
    $lang['member_groups']              = "Ο χρήστης είναι μέλος απο το μαρκαρισμένα γκρουπ (αν υπάρχουν)";
    $lang['login']                      = "Σύνδεση";
    $lang['login_action']               = "Σύνδεση";
    $lang['login_screen']               = "Σύνδεση";
    $lang['error']                      = "Λάθος";
    $lang['no_login']                   = "Ανέφικτη σύνδεση; λανθασμένο username ή κωδικός";
    $lang['redirect_sprt']              = "Θα μεταφερθείτε αυτόματα στη σελίδα σύνδεσης μετά από %d δευτερόλεπτα καθυστέρησης";
    $lang['login_now']                  = "Παρακαλώ επιλέξτε εδώ για να συνδεθείτε";
    $lang['please_login']               = "Παρακαλώ συνδεθείτε";
    $lang['go']                         = "Συνέχεια!";

//graphic items
    $lang['late_g']                     = "&nbsp;LATE&nbsp;";
    $lang['new_g']                      = "&nbsp;NEW&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPDATED&nbsp;";

//admin config
    $lang['admin_config']               = "Επεξεργασία διαχειριστή";
    $lang['email_settings']             = "Email header settings";
    $lang['admin_email']                = "Admin email";
    $lang['email_reply']                = "Email 'reply to'";
    $lang['email_from']                 = "Email 'from'";
    $lang['mailing_list']               = "Mailing list";
    $lang['default_checkbox']           = "Default checkbox settings for Project/Tasks";
    $lang['allow_globalaccess']         = "Allow global access?";
    $lang['allow_group_edit']           = "Να επιτρέπεται σε όλους στην ομάδα χρήστών να διαχειρίζονται το project?";
    $lang['set_email_owner']            = "Πάντα να αποστέλλεται email στον υπεύθυνο με τις αλλαγές?";
    $lang['set_email_group']            = "Πάντα να αποστέλλεται email στις ομάδες χρηστών με τισ αλλαγές?";
    $lang['project_listing_order']      = "Σειρά εμφάνισης project";
    $lang['task_listing_order']         = "Σειρά εμφάνιση λίστας εργασιών";
    $lang['configuration']              = "Διαχείριση";

//archive
    $lang['archived_projects']          = "Αρχειποιημένα Projects";

//contacts
    $lang['firstname']                  = "Όνομα:";
    $lang['lastname']                   = "Επίθετο:";
    $lang['company']                    = "Εταιρεία:";
    $lang['home_phone']                 = "Τηλέφωνο οικίας:";
    $lang['mobile']                     = "Mobile:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Τηλέφωνο εργασίας:";
    $lang['address']                    = "Διεύθυνση:";
    $lang['postal']                     = "ΤΚ:";
    $lang['city']                       = "Πόλη:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Σημειώσεις:";
    $lang['add_contact']                = "Πρόσθεση επαφής";
    $lang['del_contact']                = "Διαγραφή επαφής";
    $lang['contact_info']               = "Πληροφορία επαφής";
    $lang['contacts']                   = "Επαφές";
    $lang['contact_add_info']           = "Αν προσθέσετε εταιρικό όνομα τότε θα φαίνεται αυτό αντί για το όνομα χρήστη.";
    $lang['show_contact']               = "Εμφάνιση επαφών";
    $lang['edit_contact']               = "Επεξεργασία επαφής";
    $lang['contact_submit']             = "Καταχώρηση επαφής";
    $lang['contact_warn']               = "Δεν έχουν συμπληρωθεί όλα τα πεδία; Παρακαλούμε συμπληρώστε τουλάχιστον το Όνομα και Επίθετο";

 //files
    $lang['manage_files']               = "Επεξεργασία αρχείων";
    $lang['no_files']                   = "Δεν υπάρχουν ανεβασμένα αρχεία προς επεξεργασία";
    $lang['no_file_uploads']            = "Δεν επιτρέπετε το ανέβασμα των αρχείων";
    $lang['file']                       = "Αρχείο:";
    $lang['uploader']                   = "Uploader:";
    $lang['files_assoc_project']        = "Αρχεία σχετικά με αυτό το project";
    $lang['files_assoc_task']           = "Αρχεία σχετικά με αυτή την εργασία";
    $lang['file_admin']                 = "Διαχιρειστής αρχείων";
    $lang['add_file']                   = "Πρόσθεση αρχείου";
    $lang['files']                      = "Αρχεία";
    $lang['file_choose']                = "Αρχεία για ανέβασμα:";
    $lang['upload']                     = "Ανέβασμα";
    $lang['file_email_owner']           = "Αποστολή ενημερωτικού email για το νέο αρχείο στον υπεύθυνο του project?";
    $lang['file_email_usergroup']       = "Αποστολή ενημερωτικού email για το νέο αρχείο στο σχετικό γκρουπ?";
    $lang['max_file_sprt']              = "Το αρχείο προς ανέβασμα πρέπει να είναι λιγότερο από%s kb.";
    $lang['file_submit']                = "Αποστολή φακέλου";
    $lang['no_upload']                  = "Δεν ανέβηκε κανένα αρχείο.  Προσπαθείστε πάλι.";
    $lang['file_too_big_sprt']          = "Το μέγιστο μέγεθος προς ανέβασμα είναι %s bytes.  Το ανέβασμα σας ήταν μεγαλύτερο από το επιτρεπόμενο και για αυτό ακυρώθηκε.";
    $lang['del_file_javascript_sprt']   = "Σίγουρα θέλετε να σβήσετε %s ?";
//** needs translation
    $lang['forum_search']               = "Forum search";
//** needs translation
    $lang['no_results']                 = "No results found for '%s'";
//** needs translation
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //forum
    $lang['orig_message']               = "Αρχικό μήνυμα:";
    $lang['post']                       = "Αποστολή!";
    $lang['message']                    = "Μήνυμα:";
    $lang['post_reply_sprt']            = "Απέστολή απάντησης στο μήνυμα από  '%1\$s' σχετικά με '%2\$s'";
    $lang['post_message_sprt']          = "Αποστολή μηνύματος σε: '%s'";
    $lang['forum_email_owner']          = "Αποστολή ενημερωτικού Email στον ενδιαφερόμενο για την καταχώρηση στο forum ?";
    $lang['forum_email_usergroup']      = "Αποστολή ενημερωτικού Email στον σχετικό γκρουπ για την καταχώρηση στο forum?";
    $lang['reply']                      = "Απάντηση";
    $lang['new_post']                   = "Νέα αποστολή";
    $lang['public_user_forum']          = "Δημόσιο forum χρηστών";
    $lang['private_forum_sprt']         = "Ιδιωτικό forum για '%s' γκρουπ";
    $lang['forum_submit']               = "Καταχώρηση στο Forum";
    $lang['no_message']                 = "Δεν υπάρχει μήνυμα προσπαθείστε πάλι";
    $lang['add_reply']                  = "Προσθέστε απάντηση";
    $lang['last_post_sprt']             = "Τελευταία αποστολή %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Τελευταίες αποστολές στο forum";

 //includes
    $lang['report']                     = "Αναφορά";
    $lang['warning']                    = "<h1>Συγνώμη!</h1><p>Δεν μπορέσαμε να προωθήσουμε το αίτημα σας αυτή τη στιγμή. Παρακαλούμε προσπαθήστε αργότερα.</p>";
    $lang['home_page']                  = "Αρχική σελίδα";
    $lang['summary_page']               = "Σελίδα περίληψης";
    $lang['log_out']                    = "Αποσύνδεση";
    $lang['main_menu']                  = "Κεντρικό μενού";
    $lang['archive']                    = "Αρχείο";
    $lang['user_homepage_sprt']         = "%s's αρχική σελίδα";
    $lang['missing_field_javascript']   = "Παρακαλούμε δώστε μια τιμή στο κενό πεδίο";
    $lang['invalid_date_javascript']    = "Παρακαλούμε διαλέξτε μια έγκυρη ημερομηνία";
    $lang['finish_date_javascript']     = "Η ημερομηνία που δηλώσατε είναι μετά το τέλος του project!";
    $lang['security_manager']           = "Διαχειριστής ασφαλείας";
    $lang['session_timeout_sprt']       = "Απαγορεύεται η πρόσβαση; Η τελευταία ενέργεια ήταν %1\$d λεπτά πριν και ο χρόνος λήξης είναι %2\$d λεπτά; παρακαλώ <a href=\"%3\$sindex.php\">επανασυνδεθείτε</a>";
    $lang['access_denied']              = "Απαγορεύεται η πρόσβαση";
    $lang['private_usergroup_no_access']= "Λυπούμαστε; αυτή η περιοχή αφορά γκρουπ στο οποίο εσείς δεν έχετε δικαίωμα πρόσβασης.";
    $lang['invalid_date']               = "Άκυρη ημερομηνία";
    $lang['invalid_date_sprt']          = "Η ημέρα του %s δεν είναι έγκυρη ημερομηνία (Ελέξτε τον αριθμό ημερών του μήνα).<br />Παρακαλούμε βάλτε μία έγκυρη ημερομηνία.";


 //taskgroups
    $lang['taskgroup_name']             = "Ονομασία γκρουπ εργασιών:";
    $lang['taskgroup_description']      = "Απλή περιγραφή γκρουπ εργασιών:";
    $lang['add_taskgroup']              = "Προσθέστε γκρουπ εργασιών";
    $lang['add_new_taskgroup']          = "Προσθέστε ένα νέο γκρουπ εργασιών";
    $lang['edit_taskgroup']             = "Επεξεργασία γκρουπ εργασιών";
    $lang['taskgroup_manage']           = "Διαχείριση γκρουπ εργασιών";
    $lang['no_taskgroups']              = "Δεν έχουν οριστεί γκρουπ εργασιών";
    $lang['manage_taskgroups']          = "Διαχειριστειτε γκρουπ εργασιών";
    $lang['taskgroups']                 = "Γκρουπ εργασιών";
    $lang['taskgroup_dup_sprt']         = "Υπάρχει ήδη ένα γκρουπ εργασιών '%s'.  Παρακαλούμε επιλέξτε άλλο όνομα.";
    $lang['info_taskgroup_manage']      = "Πληροφορίες για τη διαχείρηση του γκρουπ εργασιών";

 //usergroups
    $lang['usergroup_name']             = "Ονομασία ομάδας χρηστών:";
    $lang['usergroup_description']      = "Απλή περιγραφή της ομάδας χρηστών:";
    $lang['members']                    = "Μέλη:";
    $lang['private_usergroup']          = "Ιδιωτική ομάδα χρηστών";
    $lang['add_usergroup']              = "Προσθήκη ομάδας χρηστών";
    $lang['add_new_usergroup']          = "Προσθέστε νέα ομάδα χρηστών";
    $lang['edit_usergroup']             = "Επεξεργασία ομάδας χρηστών";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";    
    $lang['usergroup_manage']           = "Διαχείριση ομάδας χρηστών";
    $lang['no_usergroups']              = "Δεν έχουν οριστεί ομάδες χρηστών";
    $lang['manage_usergroups']          = "Επεξεργαστείτε την ομάδα χρηστών";
    $lang['usergroups']                 = "Ομάδες χρηστών";
    $lang['usergroup_dup_sprt']         = "Υπάρχει ήδη μια ομάδα χρηστών '%s'.  Παρακαλώ επιλέξτε άλλο όνομα.";
    $lang['info_usergroup_manage']      = "Πληροφοριες για τη διαχείριση της ομάδας χρηστών";

 //users
    $lang['login_name']                 = "Login όνομα";
    $lang['full_name']                  = "Ονοματεπώνυμο";
    $lang['password']                   = "Κωδικός";
    $lang['blank_for_current_password'] = "(Αφήστε κενό για παραμονή ίδιου κωδικού)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Διαχειριστής";
    $lang['private_user']               = "Ιδιωτικός χρήστης";
    $lang['normal_user']                = "Κανονικός χρήστης";
    $lang['is_admin']                   = "Είναι διαχειριστής?";
    $lang['is_guest']                   = "Είναι επισκέπτης?";
    $lang['guest']                      = "Επισκέπτης";
    $lang['user_info']                  = "Πληροφορίες χρήστη";
    $lang['deleted_users']              = "Απαλοιφή χρήστη";
    $lang['no_deleted_users']           = "Δεν υπάρχουν χρήστες προς απολοιφή.";
    $lang['revive']                     = "Επανεργοποίηση";
    $lang['permdel']                    = "Οριστική διαγραφή";
    $lang['permdel_javascript_sprt']    = "Αυτό θα σβήσει οριστικά όλες τις καταγραφές και τις σχετικές εργασίες του χρήση %s. Θέλετε να συνεχίσετε?";
    $lang['add_user']                   = "Πρόσθεση χρήστη";
    $lang['edit_user']                  = "Επεξεργασία χρήστη";
    $lang['no_users']                   = "Δεν υπάρχουν αναγνωρισμένοι από το σύστημα χρήστες";
    $lang['users']                      = "Χρήστες";
    $lang['existing_users']             = "Υπαρκτοί χρήστες";
    $lang['private_profile']            = "Το προφιλ αυτού του χρήστη είναι κλειδωμένο.";
    $lang['private_usergroup_profile']  = "(Αυτός ο χρήστης είναι μέλος ενός ιδιωτικού γκρουπ χρηστών στο οποίο δεν έχετε πρόσβαση)";
    $lang['email_users']                = "Αποστολή Email στους χρήστες";
    $lang['select_usergroup']           = "Επιλεγμένο γκρουπ χρηστών:";
    $lang['subject']                    = "Θέμα:";
    $lang['message_sent_maillist']      = "Σε κάθε περίπτωση το μήνυμα αντιγράφετε στην mailing λίστα.";
    $lang['who_online']                 = "Ποιός είναι online?";
    $lang['edit_details']               = "Επεξεργασία πληροφοριών χρήστη";
    $lang['show_details']               = "Εμφάνιση πληροφοριών χρήστη";
    $lang['user_deleted']               = "Ο χρήστης διαγράφηκε!";
    $lang['no_usergroup']               = "Αυτός ο χρήστης δεν είναι μέλος καμίας ομάδας χρηστών";
    $lang['not_usergroup']              = "(Μη μέλος κάποιας ομάδας χρηστών)";
    $lang['no_password_change']         = "(Ο κωδικός σας δεν έχει αλλάξει)";
    $lang['last_time_here']             = "Τελευταία σας επίσκεψη:";
    $lang['number_items_created']       = "Αριθμός γεγονότων που δημιουργήθηκαν:";
    $lang['number_projects_owned']      = "Αριθμός project που σας ανήκουν:";
    $lang['number_tasks_owned']         = "Αριθμός εργασιών που σας ανήκουν:";
    $lang['number_tasks_completed']     = "Αριθμός εργασιών που ολοκληρώθηκαν:";
    $lang['number_forum']               = "Αριθμός αποστολών στο forum:";
    $lang['number_files']               = "Αριθμός ανεβασμένων αρχείων:";
    $lang['size_all_files']             = "Συνολικό μέγεθος όλων των αρχείων που σας ανήκουν:";
    $lang['owned_tasks']                = "Εργασίες που σας ανήκουν";
    $lang['invalid_email']              = "Άκυρη διέυθυνση email";
    $lang['invalid_email_given_sprt']   = "Η διεύθυνση email '%s' είναι άκυρη.  Παρακαλώ προσπαθείστε ξανά.";
    $lang['duplicate_user']             = "Αντιγραφή χρήστη";
    $lang['duplicate_change_user_sprt'] = "Αυτός ο χρήστης '%s' υπάρχει ήδη.  Παρακαλώ επιλέξτε άλλο όνομα.";
    $lang['value_missing']              = "Λείπει κάποιο στοιχείο";
    $lang['field_sprt']                 = "Το στοιχεία για '%s' λείπουν. Παρακαλώ συμπληρώστε τα.";
    $lang['admin_priv']                 = "ΑΝΑΚΟΙΝΩΣΗ: Σας έχουν παραχωρήσει δικαιώματα διαχειριστή.";
    $lang['manage_users']               = "Διαχείριση χρηστών";
    $lang['users_online']               = "Χρήστες online";
    $lang['online']                     = "Τελευταίοι χρήστες (Online πριν απο 60 λεπτά)";
    $lang['not_online']                 = "Οι υπόλοιποι";
    $lang['user_activity']              = "Ενέργειες χρήστη";

  //tasks
    $lang['add_new_task']               = "Προσθέστε καινούρια εργασία";
    $lang['priority']                   = "Προτεραιότητα";
    $lang['parent_task']                = "Πατέρας";
    $lang['creation_time']              = "Ώρα δημιουργίας";
    $lang['by_sprt']                    = "%1\$s by %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Ονομασία project";
    $lang['task_name']                  = "Ονομασία εργασίας";
    $lang['deadline']                   = "Ημέρα παράδοσης";
    $lang['taken_from_parent']          = "(Κληρονομήθηκε από πατέρα)";
    $lang['status']                     = "Στάδιο";
    $lang['task_owner']                 = "Υπεύθυνος εργασίας";
    $lang['project_owner']              = "Υπεύθυνος project";
    $lang['taskgroup']                  = "Ομάδα εργασιών";
    $lang['usergroup']                  = "Ομάδα χρηστών";
    $lang['nobody']                     = "Κανένας";
    $lang['none']                       = "Τίποτα";
    $lang['no_group']                   = "Δεν υπάρχει ομάδα";
    $lang['all_groups']                 = "Όλες οι ομάδες";
    $lang['all_users']                  = "Όλοι οι χρήστες";
    $lang['all_users_view']             = "Όλοι οι χρήστες μπορούν να δουν το γεγονός?";
    $lang['group_edit']                 = "Όλοι στην ομάδα χρηστών μπορούν να επεξεργαστούν?";
    $lang['project_description']        = "Περιγραφή project";
    $lang['task_description']           = "Περιγραφή εργασίας";
    $lang['email_owner']                = "Αποστολή email στον υπεύθυνο για τις αλλαγές?";
    $lang['email_new_owner']            = "Αποστολή email στον (νέο) υπεύθυνο με τις αλλαγές?";
    $lang['email_group']                = "Αποστολή email στην ομάδα χρηστών με τις αλλαγές?";
    $lang['add_new_project']            = "Πρόσθεση νέου project";
    $lang['uncategorised']              = "Μη κατηγοριοποιημένο";
    $lang['due_sprt']                   = "%d ημέρες από σήμερα";
    $lang['tomorrow']                   = "Αύριο";
    $lang['due_today']                  = "Σήμερα";
    $lang['overdue_1']                  = "1 ημέρα καθυστέρηση";
    $lang['overdue_sprt']               = "%d ημέρες καθυστέρηση";
    $lang['edit_task']                  = "Επεξερασία εργασίας";
    $lang['edit_project']               = "Επεξεργασία project";
    $lang['no_reparent']                = "Κανένα (κύριο project)";
    $lang['del_javascript_project_sprt']= "Αυτό θα σβήσει το project %s. Είστε σίγουροι?";
    $lang['del_javascript_task_sprt']   = "Αυτό θα σβήσει την εργασία %s. Είστε σίγουροι?";
    $lang['add_task']                   = "Προσθήκη εργασίας";
    $lang['add_subtask']                = "Προσθήκη υπο-εργασίας";
    $lang['add_project']                = "Προσθήκη project";
    $lang['clone_project']              = "Κλωνοποίηση project";
    $lang['clone_task']                 = "Κλωνοποίηση εργασίας";
    $lang['quick_jump']                 = "Γρήγορη μετάβαση";
    $lang['no_edit']                    = "Δεν σας ανήκει αυτό το γεγονός και δεν μπορείτε να το αλλάξετε";
    $lang['global']                     = "Γενικό";
    $lang['delete_project']             = "Διαγραφή project";
    $lang['delete_task']                = "Διαγραφή εργασίας";
    $lang['project_options']            = "Επιλογές project";
    $lang['task_options']               = "Επιλογές εργασίας";
    $lang['javascript_archive_project'] = "Αυτό θα βάλει το project στο αρχείο %s.  Είστε σίγουροι?";
    $lang['archive_project']            = "Βάλτε το project στο αρχείο";
    $lang['task_navigation']            = "Είσοδος στην εργασία";
    $lang['new_task']                   = "Νέα εργασία";
    $lang['no_projects']                = "Δεν υπάρχουν projects για να δείτε";
    $lang['show_all_projects']          = "Εμφάνιση όλων των projects";
    $lang['show_active_projects']       = "Εμφάνιση μόνο των ενεργών projects";
    $lang['project_hold_sprt']          = "Project παγώθηκε από %s";
    $lang['project_planned']            = "Σχεδιασμένο Project";
    $lang['percent_sprt']               = "%d%% από τις εργασίες έχουν ολοκληρωθεί";
    $lang['project_no_deadline']        = "Δεν έχει οριστεί ημερομηνία παράδοσης για αυτό το project";
    $lang['no_allowed_projects']        = "Δεν υπάρχουν projects που να σας επιτρέπεται η πρόσβαση";
    $lang['projects']                   = "Projects";
    $lang['percent_project_sprt']       = "Αυτό το project είναι %d%% ολοκληρωμένο";
    $lang['owned_by']                   = "Υπεύθυνος";
    $lang['created_on']                 = "Δημιουργήθηκε την";
    $lang['completed_on']               = "Ολοκληρώθηκε στις";
    $lang['modified_on']                = "Μετατράπηκε στις";
    $lang['project_on_hold']            = "Το Project παγώθηκε";
    $lang['project_accessible']         = "(Αυτό το project είναι προσιτό σε όλους τους χρήστες)";
    $lang['task_accessible']            = "(Αυτή η εργασία είναι προσιτή σε όλους τους χρήστες)";
    $lang['project_not_accessible']     = "(Αυτό το project είναι προσιτό μόνο από τα μέλη τη ομάδας χρηστών)";
    $lang['task_not_accessible']        = "(Αυτή η εργασία είναι προσιτή μόνο από τα μέλη της ομάδας χρηστών)";
    $lang['project_not_in_usergroup']   = "Αυτό το project δεν ανήκει σε κάποια ομάδα χρηστων και έιναι προσιτό από όλους.";
    $lang['task_not_in_usergroup']      = "Αυτή η εργασία δεν ανήκει σε κάποια ομάδα χρηστων και έιναι προσιτή από όλους.";
    $lang['usergroup_can_edit_project'] = "Αυτό το project μπορεί επίσης να μορφοποιηθεί από μέλη της ομάδας χρηστών.";
    $lang['usergroup_can_edit_task']    = "Αυτή η εργασία μπορεί να μορφοποιηθεί από μέλη της ομάδας χρηστών.";
    $lang['i_take_it']                  = "Το αναλαμβάνω :)";
    $lang['i_finished']                 = "Το ολοκλήρωσα!";
    $lang['i_dont_want']                = "Δεν το θέλω άλλο";
    $lang['take_over_project']          = "Ανάληψη project";
    $lang['take_over_task']             = "Ανάληψη εργασίας";
    $lang['task_info']                  = "Πληροφορίες εργασίας";
    $lang['project_details']            = "Λεπτομέρειες Project";
    $lang['todo_list_for']              = "Λίστα εργασιών: ";
    $lang['due_in_sprt']                = " (Λήγει σε %d ημέρες)";
    $lang['due_tomorrow']               = " (Λήγει αύριο)";
    $lang['no_assigned']                = "Δεν υπάρχουν μη ολοκληρωμένες εργασίες από αυτές που έχει αναλάβει ο χρήστης.";
    $lang['todo_list']                  = "Λίστα εργασιών";
    $lang['summary_list']               = "Λίστα περίληψης";
    $lang['task_submit']                = "Καταχώρηση εργασίας";
    $lang['not_owner']                  = "Απαγορεύεται η είσοδος. Δεν έχετε δικαίωμα πρόσβασης";
    $lang['missing_values']             = "Δεν συμπληρώσατε όλα τα πεδία; παρακαλώ προσπαθήστε ξανά";
    $lang['future']                     = "Μέλλοντικά";
    $lang['flags']                      = "Σημαίες";
    $lang['owner']                      = "Υπεύθυνος";
    $lang['group']                      = "Ομάδα";
    $lang['by_usergroup']               = " (κατά ομάδας χρηστών)";
    $lang['by_taskgroup']               = " (κατά ομάδα εργασιών)";
    $lang['by_deadline']                = " (κατά ημερομηνία παράδοσης)";
    $lang['by_status']                  = " (κατά σταδίου)";
    $lang['by_owner']                   = " (κατά υπευθύνου)";
//** needs translation
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Το project κλωνοποιήθηκε :";
    $lang['task_cloned']                = "Εργασία προς κλωνοποίηση:";
    $lang['note_clone']                 = "ΑΝΑΚΟΙΝΩΣΗ: Η εργασία θα μετατραπεί σε νέο project";

//bits 'n' pieces
    $lang['calendar']                   = "Ημερολόγιο";
    $lang['normal_version']             = "Κανονική έκδοση";
    $lang['print_version']              = "Έκδοση εκτύπωσης";
    $lang['condensed_view']             = "Τμηματική προβολή";
    $lang['full_view']                  = "Ολοκληρωμένη προβολή";
//** needs translation
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>