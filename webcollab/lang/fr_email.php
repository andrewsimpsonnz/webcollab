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

  Translation: Olivier Chaussavoine / Julien Dupont / Martin BRAIT

  Maintainer: Julien Dupont

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 01 Apr 2004 09 h 18 +1200
$email_date = sprintf('%s %s %s h %s %+03d00', date('j', $ltime ), $month_array[(date('n', $ltime ))], date('Y G', $ltime ), date('i', $ltime ),TZ );

//$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i a' );

$title_file_post          = ABBR_MANAGER_NAME.": Nouveau Fichier ajouté: %s";
$email_file_post          = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'un nouveau fichier a été ajouté le ".$email_date." par %1\$s.\n\n".
                            "Fichier:        %2\$s\n".
                            "Description: %3\$s\n\n".
                            "Projet:         %4\$s\n".
                            "Travail:          %5\$s\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%6\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nouveau message: %s";
$email_forum_post         = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'un nouveau message a été ajouté le ".$email_date." par %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply        = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'un nouveau message a été ajouté le ".$email_date." par %1\$s.\n\n".
                           "Ce message fait suite à un message précédent du %2\$s.\n\n".
                           "Message original:\n %3\$s\n\n".
                            "----\n\n".
                           "Nouvelle réponse:\n%4\$s\n\n".
                            "----\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%5\$s\n";

$email_list               = "Projet: %1\$s\n".
                            "travail:  %2\$s\n".
                            "Statut: %3\$s\n".
                            "Propriétaire: %4\$s ( %5\$s )\n".
                            "Texte:\n%6\$s\n\n".
                            "Merci de consulter le site pour plus de détails.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Votre projet a été affecté"; // You item taken over
$email_takeover_project   = "Bonjour,\n\n".MANAGER_NAME." vous informe que le projet a été assigné le ".$email_date." par l'administrateur.\n\n";

$title_takeover_task      = ABBR_MANAGER_NAME.": Votre travail a été affectée"; // You item taken over
$email_takeover_task      = "Bonjour,\n\n".MANAGER_NAME." vous informe que travail a été assignée le ".$email_date." par l'administrateur.\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": Actualité de vos projets";
$email_new_owner_project  = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'un projet vous appartenant a été modifié le ".$email_date.".\n\nPlus de détails:\n\n";

$title_new_owner_task     = ABBR_MANAGER_NAME.": Actualité de vos travaux";
$email_new_owner_task     = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'une travail vous appartenant a été modifiée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_new_group_project  = ABBR_MANAGER_NAME.": Nouveau projet:  %1\$s";
$email_new_group_project  = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'un nouveau projet a été créé le ".$email_date.".\n\nPlus de détails:\n\n";

$title_new_group_task     = ABBR_MANAGER_NAME.": Nouvelle travail: %1\$s";
$email_new_group_task     = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'une nouvelle travail a été créée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Mise a jour de votre projet";
$email_edit_owner_project ="Bonjour,\n\n".MANAGER_NAME." vous informe que votre projet a été modifié le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_owner_task    = ABBR_MANAGER_NAME.": Mise a jour de votre travail";
$email_edit_owner_task    ="Bonjour,\n\n".MANAGER_NAME." vous informe que votre travail a été modifiée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Mise à jour d'un projet";
$email_edit_group_project = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'un projet détenu par %1\$s a été modifié le ".$email_date.".\n\nPlus de détails:\n\n";

$title_edit_group_task    = ABBR_MANAGER_NAME.": Mise à jour de tache ";
$email_edit_group_task    = "Bonjour,\n\n".MANAGER_NAME." vous informe qu'une travail détenue par %1\$s a été modifiée le ".$email_date.".\n\nPlus de détails:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projet supprimé";
$email_delete_project     = "Bonjour,\n\n".MANAGER_NAME." vous informe que projet a été effaçé le ".$email_date.".\n\n".
                            "Merci d'avoir géré ce projet jusque-là.\n\n";

$title_delete_task        = ABBR_MANAGER_NAME.": Tache supprimée";
$email_delete_task        = "Bonjour,\n\n".MANAGER_NAME." vous informe que travail a été effaçée le ".$email_date.".\n\n".
                            "Merci d'avoir géré cette tache jusque-là.\n\n";

$delete_list              = "Projet: %1\$s\n".
                            "travail:  %2\$s\n".
                            "Statut: %3\$s\n\n".
                            "Texte: \n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": Nouveau groupe d'utilisateurs %1\$s créé";
$email_usergroup_add      = "Bonjour,\n\n".
                            "".MANAGER_NAME." vous informe qu'un nouveau groupe d'utilisateurs %1\$s, a été créé le ".$email_date.".\n\n".
                            "Les nouveaux membres de ce groupe d'utilisateurs sont :\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Groupe d'utilisateurs %1\$s modifié";
$email_usergroup_edit      = "Bonjour,\n\n".
                            "".MANAGER_NAME." vous informe que le groupe d'utilisateurs %1\$s, a été modifié le ".$email_date.".\n\n".
                            "Les nouveaux membres de ce groupe d'utilisateurs sont :\n".
                            "%2\$s\n";

$title_welcome            = "Bienvenue ".ABBR_MANAGER_NAME;
$email_welcome            = "Bonjour,\n\n. Vous êtes membre du site de gestion de travail collaboratif ".MANAGER_NAME." depuis le ".$email_date.".\n\n".
                            "Si vous êtes débutant, quelques astuces vous permettront d'utiliser le site rapidement.\n\n".
                            "".ABBR_MANAGER_NAME." est un outil de gestion de projet. L'écran principal vous montre les projets actuellement gérés. ".
                            "Si vous cliquez sur un des noms de projet, vous verrez apparaître sa liste des travaux. Toutes les informations sont là. ".
                            "Tous les actualisations que vous effectuerez concernant un projet, ou une travail, seront transmises aux autres utilisateurs concernés. Réciproquement, vous serez informés des modifications concernant vos travaux ou vos projets. ".
                            "Cela vous permet de savoir constamment où l'activité se situe.\n\n".
                            "Vous pouvez initiez un projet, dont vous serez le propriétaire. Pour permettre à d'autre personne de votre groupe de modifier votre projet, vous devez en céder la propriété à votre groupe.\n".
							"Vous pouvez aussi devenir propriétaire d'une travail, ce qui vous permet d'éditer cette travail et toutes contributions qui y sont rattachées. ".
                            "Pendant l'utilisation de l'outil, actualisze la partie texte et le statut des travaux pour que tout le monde puisse connaître leurs progressions. ".
                            "\n\nEn vous souhaitant une bonne découverte, voici mon email : ".EMAIL_ADMIN."s en cas de problème.\n\n --Bonne chance!\n\n".
                            "Profil:       %1\$s\n".
                            "Mot de passe: %2\$s\n\n".
                            "Groupe:       %3\$s".
                            "Nom:          %4\$s\n".
                            "SiteWeb:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Edition de votre profil par l'administrateur";
$email_user_change1       = "Bonjour,\n\n".MANAGER_NAME." vous informe que votre profil a été modifié le ".$email_date." par %1\$s ( %2\$s ).\n\n".
                            "Login:        %3\$s\n".
                            "Mot de passe: %4\$s\n\n".
                            "Groupe:       %5\$s".
                            "Nom:          %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Edition de votre profil";
$email_user_change2       = "Bonjour,\n\n".MANAGER_NAME." vous informe que vous avez correctement modifié votre profil le ".$email_date.".\n\n".
                            "Profil:       %1\$s\n".
                            "Mot de passe: %2\$s\n\n".
                            "Nom:          %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.":  Edition de votre profil";
$email_user_change3       = "Bonjour,\n\n".MANAGER_NAME." vous informe que vous avez correctement modifié votre profil le ".$email_date.".\n\n".
                            "Profil: %1\$s\n".
                            "Votre mot de passe reste inchangé.\n\n".
                            "Nom:    %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Compte réactivé";
$email_revive             = "Bonjour,\n\n".MANAGER_NAME." vous informe que votre profil a été réactivé le ".$email_date.".\n\n".
                            "Profil: %1\$s\n".
                            "Nom de l'utilisateur: %2\$s\n\n".
                            "Par mesure de sécurité, nous n'envoyons pas votre mot de passe. \n\n".
                            "Si vous l'avez oublié , envoyez un email à ".EMAIL_ADMIN." pour en recevoir un nouveau.";



$title_delete_user        = ABBR_MANAGER_NAME.": Profil désactivé.";
$email_delete_user        = "Bonjour,\n\n".MANAGER_NAME." vous informe que votre profil a été désactivé le ".$email_date."\n\n".
                            "Nous sommes désolés que vous nous quittiez et vous remercions pour votre participation! \n\n".
                            "Si votre profil a été désactivé par erreur, merci d'envoyer un email à ".EMAIL_ADMIN.".";

?>
