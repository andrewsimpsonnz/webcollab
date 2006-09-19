<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Pierre Jean

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

  Email text language files for 'fr' (French/Français)

  Translation: Olivier Chaussavoine / Julien Dupont

  Maintainer: Julien Dupont

  NOTE: This file is written in UTF-8 character set

*/

$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i a' );

$title_file_post          = ABBR_MANAGER_NAME.": Nouveau Fichier ajouté: %s";
$email_file_post          = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau fichier a été ajouté le ".$email_date." par %1\$s.\n\n".
                            "Fichier:        %2\$s\n".
                            "Description: %3\$s\n\n".
                            "Projet:         %4\$s\n".
                            "Tâche:          %5\$s\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%6\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nouveau message: %s";
$email_forum_post         = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau message a été ajouté le ".$email_date." par %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply        = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau message a été ajouté le ".$email_date." par %1\$s.\n\n".
                           "Ce message est en réponse à un message précédent de %2\$s.\n\n".
                           "Message original:\n %3\$s\n\n".
                            "----\n\n".
                           "Nouvelle réponse:\n%4\$s\n\n".
                            "----\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%5\$s\n";

$email_list               = "Projet: %1\$s\n".
                            "Tâche:  %2\$s\n".
                            "Statut: %3\$s\n".
                            "Propriétaire: %4\$s ( %5\$s )\n".
                            "Texte:\n%6\$s\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Votre projet a été affecté"; // You item taken over
$email_takeover_project   = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que le projet a été assigné le ".$email_date." par l'administrateur.\n\n";

$title_takeover_task      = ABBR_MANAGER_NAME.": Votre tâche a été affectée"; // You item taken over
$email_takeover_task      = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que tâche a été assignée le ".$email_date." par l'administrateur.\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": Actualité de vos projets";
$email_new_owner_project  = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un projet qui vous appartient a été modifié le ".$email_date.".\n\nPlus de détails:\n\n";

$title_new_owner_task     = ABBR_MANAGER_NAME.": Actualité de vos tâches";
$email_new_owner_task     = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que qu'une tâche qui vous appartient a été modifiée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_new_group_project  = ABBR_MANAGER_NAME.": Nouveau projet:  %1\$s";
$email_new_group_project  = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau projet a été créé le ".$email_date.".\n\nPlus de détails:\n\n";

$title_new_group_task     = ABBR_MANAGER_NAME.": Nouvelle tâche: %1\$s";
$email_new_group_task     = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'une nouvelle tâche a été créée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Mise a jour de votre projet";
$email_edit_owner_project ="Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que votre projet a été modifié le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_owner_task    = ABBR_MANAGER_NAME.": Mise a jour de votre tâche";
$email_edit_owner_task    ="Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que tâche a été modifiée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Mise à jour d'un projet";
$email_edit_group_project = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un projet détenu par %1\$s a été modifié le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_group_task    = ABBR_MANAGER_NAME.": Mise à jour de tache ";
$email_edit_group_task    = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'une tâche détenue par %1\$s a été modifiée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projet supprimé";
$email_delete_project     = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que projet a été effaçé le ".$email_date.".\n\n".
                            "Merci d'avoir géré ce projet jusque là.\n\n";

$title_delete_task        = ABBR_MANAGER_NAME.": Tache supprimée";
$email_delete_task        = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que tâche a été effaçée le ".$email_date.".\n\n".
                            "Merci d'avoir géré cette tache jusque là.\n\n";

$delete_list              = "Projet: %1\$s\n".
                            "Tâche:  %2\$s\n".
                            "Statut: %3\$s\n\n".
                            "Texte: \n%4\$s\n\n";

$title_welcome            = "Bienvenue ".ABBR_MANAGER_NAME;
$email_welcome            = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous acceuille le ".$email_date.".\n\n".
                            "Si vous êtes débutant, voici quelques astuces qui vous permettront d'utiliser le site rapidement.\n\n".
                            "C'est un outil de gestion de projet, l'écran principal vous montre les projets que sont actuellement gérés. ".
                            "Si vous cliquer sur un des noms de projet, vous voyez apparaître sa liste des tâches. Toutes les informations sont là. ".
                            "Tous les actualisations que vous effectuez sont transmises aux autres utilisateurs concernés. Réciproquement, vous êtes informés des modifications vous concernant. ".
                            "Cela vous permet de savoir constamment où l'activité se situe.\n\n".
                            "Vous pouvez aussi devenir propriétaire d'une tâche, ce qui vous permet d'éditer cette tâche et toutes contributions qui y sont rattachées. ".
                            "Pendant l'utilisation de l'outil, veuillez éditer la partie texte et le statut des tâches pour que tout le monde puisse connaître leurs progressions. ".
                            "\n\nJe ne peux que vous souhaiter bonne route et vous confier mon email ".EMAIL_ADMIN."s en cas de problème.\n\n --Bonne chance!\n\n".
                            "Profil:       %1\$s\n".
                            "Mot de passe: %2\$s\n\n".
                            "Groupe:       %3\$s".
                            "Nom:          %4\$s\n".
                            "SiteWeb:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Edition de votre profil par l'administrateur";
$email_user_change1       = "Bonjour,\n\nC'est le site  ".MANAGER_NAME." qui vous informe que votre profil a été modifé le ".$email_date." par %1\$s ( %2\$s ).\n\n".
                            "Login:        %3\$s\n".
                            "Mot de passe: %4\$s\n\n".
                            "Groupe:       %5\$s".
                            "Nom:          %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Edition de votre profil";
$email_user_change2       = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que vous avez correctement modifié votre profil le ".$email_date.".\n\n".
                            "Profil:       %1\$s\n".
                            "Mot de passe: %2\$s\n\n".
                            "Nom:          %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.":  Edition de votre profil";
$email_user_change3       = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que vous avez correctement modifié votre profil le ".$email_date.".\n\n".
                            "Profil: %1\$s\n".
                            "Votre mot de passe reste inchangé.\n\n".
                            "Nom:    %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Compte réactivé";
$email_revive             = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que votre profil a été réactivé le ".$email_date.".\n\n".
                            "Profil: %1\$s\n".
                            "Nom de l'utilisateur: %2\$s\n\n".
                            "Par mesure de sécurité, nous n'envoyons pas votre mot de passe. \n\n".
                            "Si vous l'avez oublié , envoyez un email à ".EMAIL_ADMIN." pour en recevoir un nouveau.";



$title_delete_user        = ABBR_MANAGER_NAME.": Profil désactivé.";
$email_delete_user        = "Bonjour,\n\nC'est le site ".MANAGER_NAME." vous informe que votre profil a été désactivé le ".$email_date."\n\n".
                            "Nous somme désolé que vous nous quittiez et vous remercions pour votre participation! \n\n".
                            "Si votre profil a été désactivé par erreur, merci d'envoyer un email à ".EMAIL_ADMIN.".";

?>
