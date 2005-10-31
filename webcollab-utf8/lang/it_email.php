<?php
/*
  $Id$

  WebCollab
  ----------------------------------------
  This file created 2003 by Andrew Simpson

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

  Email text language files for 'it' (Italian)

  Maintainer: Raffaele Franzese <r.franzese@collaltosabino.net>

  
  NOTE: This file is written in UTF-8 character set

*/

$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y  g:i a' );

$title_file_post          = ABBR_MANAGER_NAME.": Nuovo file inviato: %s";
$email_file_post          = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un nuovo file &egrave; stato inviato il ".$email_date." da %1\$s.\n\n".
                            "File:        %2\$s\n".
                            "Descrizione: %3\$s";


$title_forum_post         = ABBR_MANAGER_NAME.": Nuovo messaggio nel forum: %s";
$email_forum_post         = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un nuovo messaggio nel forum &egrave; stato creato il ".$email_date." da %1\$s:----\n\n%2\$s\n\n----\n\n"; 
$email_forum_reply        = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un nuovo messaggio nel forum &egrave; stato creato il ".$email_date." da %1\$s.\n\n".
                            "Questo messaggio &egrave; una risposta ad un precedente messaggio di %2\$s.\n\n".
                            "Messaggio originale:\n %3\$s\n\n".
                            "----\n\n".
                            "Nuova risposta:\n%4\$s\n\n".
                            "----\n\n";


$email_list               = "Progetto:     %s\n".
                            "Attivit&agrave;:     %s\n".
                            "Stato:        %s\n".
                            "Proprietario: %s ( %s )\n".
                            "Testo:\n%s\n\n".
                            "Vai al sito web per maggiori dettagli.\n\n".BASE_URL."\n";
            

$title_takeover_project   = ABBR_MANAGER_NAME.": Il tuo progetto &egrave; stato acquisito";
$title_takeover_task      = ABBR_MANAGER_NAME.": La tua attivit&agrave; &egrave; stata acquisita";

$email_takeover_task      = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un'attivit&agrave; a te assegnata &egrave; stata acquisita da un admin il ".$email_date.".\n\n";
$email_takeover_project   = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un progetto a te assegnato &egrave; stato acquisito da un admin il ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Nuovo progetto per te";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nuova attivit&agrave; per te";

$email_new_owner_project  = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un nuovo progetto &egrave; stato creato il ".$email_date.", ed &egrave; stato assegnato a te.\n\nI dettagli:\n\n";
$email_new_owner_task     = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che una nuova attivit&agrave; &egrave; stata creata il ".$email_date.", ed &egrave; stata assegnata a te.\n\nI dettagli:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Nuovo progetto: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nuova attivit&agrave;: %s";

$email_new_group_project  = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un nuovo progetto &egrave; stato creato il ".$email_date."\n\nI dettagli:\n\n";
$email_new_group_task     = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che una nuova attivit&agrave; &egrave; stata creata il ".$email_date."\n\nI dettagli:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Il tuo progetto &egrave; stato aggiornato";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": La tua attivit&agrave; &egrave; stata aggiornata";

$email_edit_owner_project = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un progetto di cui sei proprietario &egrave; stato aggiornato il ".$email_date.".\n\nI dettagli:\n\n";
$email_edit_owner_task    = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un'attivit&agrave; di cui sei proprietario &egrave; stata aggiornata il ".$email_date.".\n\nI dettagli:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Progetto aggiornato";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Attivit&agrave; aggiornata";

$email_edit_group_project = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un progetto gestito da %1\$s &egrave; stato aggiornato il ".$email_date.".\n\nI dettagli:\n\n";
$email_edit_group_task    = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che un'attivit&agrave; gestita da %1\$s &egrave; stata aggiornata il ".$email_date.".\n\nI dettagli:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Progetto cancellato";
$title_delete_task        = ABBR_MANAGER_NAME.": Attivit&agrave; cancellata";

$email_delete_project     = "Salve,\n\n".
                            "Il sito ".MANAGER_NAME." ti informa che un progetto di cui sei proprietario &egrave; stato cancellato il ".$email_date."\n\n".
                            "Grazie per averlo gestito sin qui.\n\n";
$email_delete_task        = "Salve,\n\n".
                            "Il sito ".MANAGER_NAME." ti informa che un'attivit&agrave; di cui sei proprietario &egrave; stata cancellata il ".$email_date."\n\n".
                            "Grazie per averla gestita sin qui.\n\n";

$delete_list              = "Progetto:  %s\n".
                "Attivit&agrave;: %s\n".
                "Stato:    %s\n\n".
                "Testo:\n%s\n\n";

$title_welcome            = "Benvenuto a ".ABBR_MANAGER_NAME;
$email_welcome            = "Salve,\n\nIl sito ".MANAGER_NAME." ti d&agrave; il benvenuto il ".$email_date.".\n\n".
                            "Al fine di permetterti di lavorare subito con questo sistema, spieghiamo alcune cose che devi sapere.\n\n".
                            "In primo luogo, questo &egrave; un sistema di gestione dei progetti: la schermata principale ti mostrer&agrave; i progetti che sono attualmente disponibili. ".
                            "Se clicchi su uno dei nomi, il sistema ti porter&agrave; nella sezione delle attivit&agrave; (tasks), dove si trova tutto ci&ograve; che deve essere completato per realizzare il progetto.\n\n".
                            "Ogni articolo che invii o modifichi apparir&agrave; agli altri utenti come \"nuovo\" o \"aggiornato\". La cosa funziona anche al contrario e ".
                            "ti permetter&agrave; di capire a che punto si trova il progetto.\n\n".
                            "Puoi anche acquisire o cedere la propriet&agrave; di un'operazione ed inserire messaggi nel forum collegato ad essa. ".
                            "Nell'avanzamento del tuo lavoro, aggiorna scrupolosamente lo stato delle attivit&agrave; da te svolte in modo che chiunque sia in grado di conoscere a che punto si trovano. ".
                            "\n\nSe hai dubbi contatta ".EMAIL_ADMIN.".\n\n--Buona fortuna!\n\n".
                            "Login:      %1\$s\n".
                            "Password:   %2\$s\n\n".
                            "Usergroups: %3\$s".
                            "Nome:       %4\$s\n".
                            "Website:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Modifica del tuo account da parte di un Admin";
$email_user_change1       = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che il tuo account &egrave; stato modificato il ".$email_date." da %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Password:   %4\$s\n\n".
                            "Usergroups: %5\$s".
                            "Nome:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Modifica del tuo account";
$email_user_change2       = "Salve,\n\nIl sito ".MANAGER_NAME." ti conferma che hai modificato con successo il tuo account il ".$email_date."\n\n".
                            "Login:    %1\$s\n".
                            "Password: %2\$s\n\n".
                            "Nome:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Modifica del tuo account";
$email_user_change3       = "Salve,\n\nIl sito ".MANAGER_NAME." ti conferma che hai modificato con successo il tuo account il ".$email_date."\n\n".
                            "Login: %1\$s\n".
                            "La tua password non &egrave; stata cambiata.\n\n".
                            "Nome:  %2\$s\n";
    

$title_revive             = ABBR_MANAGER_NAME.": Account riattivato";
$email_revive             = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che il tuo account &egrave; stato riattivato il ".$email_date.".\n\n".
                            "Login: %1\$s\n".
                            "Username:  %2\$s\n\n".
                            "Non possiamo inviarti la tua password perch&eacute; crittata. \n\n".
                            "Se hai dimenticato la tua password invia una e-mail a ".EMAIL_ADMIN." per riceverne una nuova.";



$title_delete_user        = ABBR_MANAGER_NAME.": Account disattivato.";
$email_delete_user        = "Salve,\n\nIl sito ".MANAGER_NAME." ti informa che il tuo account &egrave; stato disattivato il ".$email_date."\n\n".
                            "Siamo dispiaciuti per questo e desideriamo ringraziarti per il lavoro cha hai svolto sin qui!\n\n".
                            "Se ritieni che la disattivazione del tuo account sia frutto di un errore, invia una e-mail a ".EMAIL_ADMIN.".";

?>
