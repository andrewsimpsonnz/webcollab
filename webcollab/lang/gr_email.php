<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003

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

  Email text language files for 'gr' (Greek)

  Translation: Nico(designext.gr)

  Maintainer:Nico <designext at users.sourceforge.net>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

//$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i' );

$title_file_post        = ABBR_MANAGER_NAME.": Νέο αρχείο διαθέσιμο: %s";
$email_file_post        = "Hola,\n\nEl sitio ".MANAGER_NAME." ένα νέο αρχείο φορτώθηκε την  ".$email_date." por %1\$s.\n\n".
                          "Αρχείο:        %2\$s\n".
                          "Περιγραφή: %3\$s\n\n".
                          "Project:       %4\$s\n".
                          "Εργασία:       %5\$s\n\n".
                          "Απευθυνθείτε στη σελίδα για περισσότερες πληροφορίες.\n\n".BASE_URL."%6\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": Νέα αποστολή στο forum: %s";
$email_forum_post        = "Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι υπάρχει  μια νέα καταχώρηση στο forum".$email_date." από %1\$s:\n\n".
                           "----\n\n".
                           "%2\$s\n\n".
                           "----\n\n".
                          "Απευθυνθείτε στη σελίδα για περισσότερες πληροφορίες.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply       = "Γειά σας,\n\nΗ σελίδα  ".MANAGER_NAME." σας ενημερώνει οτι υπάρχει ένα νέο μήνυμα στο forum".$email_date." από %1\$s.\n\n".
                           "Αυτό το μήνυμα είναι μία απάντηση στο %2\$s.\n\n".
                           "Αρχικό μήνυμα:\n %3\$s\n\n".
                           "----\n\n".
                           "Νέα απάντηση:\n%4\$s\n\n".
                           "----\n\n".
                           "Απευθυνθείτε στη σελίδα για περισσότερες πληροφορίες.\n\n".BASE_URL."%5\$s\n";

$email_list = "Project: %1\$s\n".
              "Εργασία:    %2\$s\n".
              "Στάδιο:   %3\$s\n".
              "Υπεύθυνος:  %4\$s ( %5\$s )\n".
              "Κείμενο:\n%6\$s\n\n".
              "Απευθυνθείτε στη σελίδα για περισσότερες πληροφορίες.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Το γεγονός σας επαναπροσδιορήστηκε";
$title_takeover_task      = ABBR_MANAGER_NAME.": Το γεγονός σας επαναπροσδιορήστηκε";
$email_takeover_project   = "Γεια σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνουμε οτι ένα project που είναι υπευθύνη σας έχει επαναπροσδιοριστεί από τον διαχειριστή".$email_date.".\n\n";
$email_takeover_task      = "Γεια σας,\n\nΗ σελίδα ".MANAGER_NAME."  σας ενημερώνουμε οτι μια εργασία που είναι υπευθύνη σας έχει επαναπροσδιοριστεί από τον διαχειριστή".$email_date.".\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": Νέο project για εσάς";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Νέα εργασία για εσάς";
$email_new_owner_project  = "Γεια σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι ένα δικό σας project (αυτή τη στιγμή υπευθύνη σας) έχει διαφοροποιηθεί".$email_date.".\n\nΕδώ είναι οι λεπτομέριες:\n\n";
$email_new_owner_task     = "Γεια σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι μια εργασία δική σας (αυτή τη στιγμή υπευθύνη σας) έχει διαφοροποιηθεί ".$email_date.".\n\nΕδώ είναι οι λεπτομέριες:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Νέο project: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Νέα εργασία: %s";
$email_new_group_project  = "Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι ένα νέο project δημιουργήθηκε την ".$email_date."\n\nΕδώ είναι οι λεπτομέριες:\n\n";
$email_new_group_task     = "Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι μια νέα εργασία δημιουργήθηκε την ".$email_date."\n\nΕδώ είναι οι λεπτομέριες:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Το project σας ενημερώθηκε";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Η εργασία σας ενημερώθηκε";
$email_edit_owner_project ="Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας πληροφορεί οτι υπήρξε μια αλλαγή σε ένα project σας ".$email_date.".\n\nΕδώ είναι οι λεπτομέριες:\n\n";
$email_edit_owner_task    ="Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας πληροφορεί οτι υπήρξε μια αλλαγή σε μια εργασία σας ".$email_date.".\n\nΕδώ είναι οι λεπτομέριες:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Project ενημερώθηκε";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Εργασία ενημερώθηκε";
$email_edit_group_project = "Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει ένα project υπευθύνη του %s έχει αλλάξει την ".$email_date.".\n\nΕδώ είναι οι λεπτομέριες:\n\n";
$email_edit_group_task    = "Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι μια εργασία υπ'ευθύνη του %s έχει αλλάξει την ".$email_date.".\n\nΕδώ είναι οι λεπτομέριες:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Project διαγράφηκε";
$title_delete_task        = ABBR_MANAGER_NAME.": Εργασία διαγράφηκε";
$email_delete_project     = "Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι το project σας διαγράφηκε την ".$email_date."\n\n".
                            "Σας ευχαριστούμε πολύ.\n\n";
$email_delete_task        = "Γειά σας,\n\nΗ σελίδα ".MANAGER_NAME." σας ενημερώνει οτι μια εργασία σας διαγράφηκε την ".$email_date."\n\n".
                            "Σας ευχαριστούμε πολύ..\n\n";

$delete_list =  "Project: %1\$s\n".
                "Εργασία:    %2\$s\n".
                "Στάδιο:   %3\$s\n\n".
                "Κείμενο:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
                            "The members of the new usergroup are:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
                            "The members of the usergroup are:\n".
                            "%2\$s\n";

$title_welcome      = "Καλωςήρθατε στο ".ABBR_MANAGER_NAME;
$email_welcome      = "Γειά σας,\n\nΚαλωςήρθατε στο: ".MANAGER_NAME." την  ".$email_date.".\n\n".
			"Αυτές είναι ορισμένες πληροφορίες για τους καινούριους χρήστες.\n\n".
			"Πριν απο ο,τιδήποτε σας ενημερώνουμε οτι αυτή η εφαρμογή είναι ένα εργαλείο διαχειρισμού project, η αρχική σελίδα σας δείχνει τα project που σας αφορούν. ".
			"Αν επιλέξετε κάποιο από τα project σας θα σας εμφανιστούν οι αντίστοιχες εργασίες..\n\n".
			"Κάθε γεγονός ή εργασία που εσείς στέλνετε ή επεξεργάζεστε θα εμφανίζεται σε όλους τους ενδιαφερόμενους χρήστες σαν 'καινούρια' ή 'ενημερωμένη'. Αυτό συμβαίνει και αντίστροφα και ".
			"χρησιμοποιείται για να μπορείτε να εστιάζετε αμέσως στην αντίστοιχη εργασία.\n\n".
			"Εσείς επίσης μπορείτε να αναλάβετε κάποιες εργασίες και να έχετε τη δυνατότητα να τις αλλάξετε. Επίσης θα αναλαμβανετε και τις αποστολές που θα γίνονται στο forum. ".
			"Με την πρόοδο των εργασιών παρακαλούμε να ενημερώνετε το κείμενο των εργασιών και το στάδιο στο οποίο βρίσκονται με τέτοιο τρόπο ώστε όλοι οι ενδιαφερόμενοι να μπορούν να αντιληφθούν το σημείο στο οποίο βρίσκεται το project. ".
			"\n\nΠεριμένουμε οτι η χρήση αυτής της εφαρμογής θα δουλέψει για το συμφέρον και την ευκολία σας. Μπορείτε να επικοινωνήσετε στο ".EMAIL_ADMIN." σε περίπτωση που έχετε κάποια απορία.\n\n --Καλή συνεργασία!\n\n".
			"\n\nΠαρακάτω σας παραθέτουμε τα στοιχεία με τα οποία συνδέεστε στο σύστημα\n\n".
			"Login:      %1\$s\n".
			"Password:   %2\$s\n\n".
			"Ονομασία γκρουπ χρηστών που ανήκετε: %3\$s".
			"Όνομα:     %4\$s\n".
			"Σελίδα:    ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": Αλλαγή των στοιχείων σας από τον διαχειριστή";
$email_user_change1 = "Γειά σας,\n\n ".MANAGER_NAME." σας ενημερώνει οτι τα στοιχεία σας έχουν αλλάξει ".$email_date." από %1\$s ( %2\$s ) \n\n".
			"Login:      %3\$s\n".
			"Password:   %4\$s\n\n".
			"Ονομασία γκρουπ χρηστών που ανήκετε: %5\$s".
			"Όνομα:     %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": Αλλαγή του λογαριασμού σας";
$email_user_change2 = "Γειά σας,\n\n ".MANAGER_NAME." σας επιβεβαιώνει οτι έχετε αλλάξει τα στοιχεία του λογαριασμού σας με επιτυχία ".$email_date."\n\n".
			"Login:    %1\$s\n".
			"Password: %2\$s\n\n".
			"Όνομα:   %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": Αλλαγή του λογαριασμού σας";
$email_user_change3 = "Γειά σας,\n\n ".MANAGER_NAME." σας επιβεβαιώνει οτι έχετε αλλάξει με επιτυχία το λογαριασμό σας την ".$email_date."\n\n".
			"Login:    %1\$s\n".
			"Ο κωδικός σας ΔΕΝ έχει αλλάξει.\n\n".
			"Όνομα:   %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": Λογαριασμός σε επαναλειτουργία";
$email_revive       = "Γειά σας,\n\n ".MANAGER_NAME." σας ενημερώνει οτι ο λογαριασμός σας τέθηκε σε επαναλειτουργία την  ".$email_date.".\n\n".
			"Loginname: %1\$s\n".
			"Username:  %2\$s\n\n".
			"Δεν μπορούμε να σας στείλουμε τον κωδικό σας γιατί είναι κωδικοποιημένος. \n\n".
			"Εαν έχετε ξεχάσει τον κωδικό σας στείλτε ένα email ".EMAIL_ADMIN." προκειμένου να αιτηθείτε καινούριο κωδικό.";



$title_delete_user  = ABBR_MANAGER_NAME.": Λογαριασμός απενεργοποιημένος.";
$email_delete_user  = "Γειά σας,\n\n ".MANAGER_NAME." σας ενημερώνει οτι ο λογαριασμός σας απενεργοποιήθηκε την ".$email_date.".\n\n".
			"Ευχαριστούμε για τη συνεργασία!\n\n".
			"Αν πιστέυετε οτι η ακύρωση ήταν λανθασμένη στείλτε ένα email στο ".EMAIL_ADMIN.".";

?>