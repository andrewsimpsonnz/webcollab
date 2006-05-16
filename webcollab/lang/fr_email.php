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

  Email text language files for 'fr' (French/Fran�ais)

  Translation: Olivier Chaussavoine / Julien Dupont

  Maintainer: Julien Dupont

*/

$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i a' );

$title_file_post          = ABBR_MANAGER_NAME.": Nouveau Fichier ajout�: %s";
$email_file_post          = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau fichier a �t� ajout� le ".$email_date." par %1\$s.\n\n".
                            "Fichier:        %2\$s\n".
                            "Description: %3\$s\n\n".
                            "Merci de consulter le site pour plus de d�tails.\n\n".BASE_URL."%4\$s\n";

$title_forum_post         = ABBR_MANAGER_NAME.": Nouveau message: %s";
$email_forum_post         = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau message a �t� ajout� le ".$email_date." par %1\$s:\n\n".
                            "----\n\n".
                            "%2\$s\n\n".
                            "----\n\n".
                            "Merci de consulter le site pour plus de d�tails.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply        = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau message a �t� ajout� le ".$email_date." par %1\$s.\n\n".
                           "Ce message est en r�ponse � un message pr�c�dent de %2\$s.\n\n".
                           "Message original:\n %3\$s\n\n".
                            "----\n\n".
                           "Nouvelle r�ponse:\n%4\$s\n\n".
                            "----\n\n".
                            "Merci de consulter le site pour plus de d�tails.\n\n".BASE_URL."%5\$s\n";

$email_list               = "Projet: %1\$s\n".
                            "T�che:  %2\$s\n".
                            "Statut: %3\$s\n".
                            "Propri�taire: %4\$s ( %5\$s )\n".
                            "Texte:\n%6\$s\n\n".
                            "Merci de consulter le site pour plus de d�tails.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Votre projet a �t� affect�"; // You item taken over
$email_takeover_project   = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que le projet a �t� assign� le ".$email_date." par l'administrateur.\n\n";

$title_takeover_task      = ABBR_MANAGER_NAME.": Votre t�che a �t� affect�e"; // You item taken over
$email_takeover_task      = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que t�che a �t� assign�e le ".$email_date." par l'administrateur.\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": Actualit� de vos projets";
$email_new_owner_project  = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un projet qui vous appartient a �t� modifi� le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_new_owner_task     = ABBR_MANAGER_NAME.": Actualit� de vos t�ches";
$email_new_owner_task     = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que qu'une t�che qui vous appartient a �t� modifi�e le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_new_group_project  = ABBR_MANAGER_NAME.": Nouveau projet:  %1\$s";
$email_new_group_project  = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un nouveau projet a �t� cr�� le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_new_group_task     = ABBR_MANAGER_NAME.": Nouvelle t�che: %1\$s";
$email_new_group_task     = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'une nouvelle t�che a �t� cr��e le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": Mise a jour de votre projet";
$email_edit_owner_project ="Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que votre projet a �t� modifi� le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_edit_owner_task    = ABBR_MANAGER_NAME.": Mise a jour de votre t�che";
$email_edit_owner_task    ="Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que t�che a �t� modifi�e le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Mise � jour d'un projet";
$email_edit_group_project = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'un projet d�tenu par %1\$s a �t� modifi� le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_edit_group_task    = ABBR_MANAGER_NAME.": Mise � jour de tache ";
$email_edit_group_task    = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe qu'une t�che d�tenue par %1\$s a �t� modifi�e le ".$email_date.".\n\nPlus de d�tails:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Projet supprim�";
$email_delete_project     = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que projet a �t� effa�� le ".$email_date.".\n\n".
                            "Merci d'avoir g�r� ce projet jusque l�.\n\n";

$title_delete_task        = ABBR_MANAGER_NAME.": Tache supprim�e";
$email_delete_task        = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que t�che a �t� effa��e le ".$email_date.".\n\n".
                            "Merci d'avoir g�r� cette tache jusque l�.\n\n";

$delete_list              = "Projet: %1\$s\n".
                            "T�che:  %2\$s\n".
                            "Statut: %3\$s\n\n".
                            "Texte: \n%4\$s\n\n";

$title_welcome            = "Bienvenue ".ABBR_MANAGER_NAME;
$email_welcome            = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous acceuille le ".$email_date.".\n\n".
                            "Si vous �tes d�butant, voici quelques astuces qui vous permettront d'utiliser le site rapidement.\n\n".
                            "C'est un outil de gestion de projet, l'�cran principal vous montre les projets que sont actuellement g�r�s. ".
                            "Si vous cliquer sur un des noms de projet, vous voyez appara�tre sa liste des t�ches. Toutes les informations sont l�. ".
                            "Tous les actualisations que vous effectuez sont transmises aux autres utilisateurs concern�s. R�ciproquement, vous �tes inform�s des modifications vous concernant. ".
                            "Cela vous permet de savoir constamment o� l'activit� se situe.\n\n".
                            "Vous pouvez aussi devenir propri�taire d'une t�che, ce qui vous permet d'�diter cette t�che et toutes contributions qui y sont rattach�es. ".
                            "Pendant l'utilisation de l'outil, veuillez �diter la partie texte et le statut des t�ches pour que tout le monde puisse conna�tre leurs progressions. ".
                            "\n\nJe ne peux que vous souhaiter bonne route et vous confier mon email ".EMAIL_ADMIN."s en cas de probl�me.\n\n --Bonne chance!\n\n".
                            "Profil:       %1\$s\n".
                            "Mot de passe: %2\$s\n\n".
                            "Groupe:       %3\$s".
                            "Nom:          %4\$s\n".
                            "SiteWeb:      ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Edition de votre profil par l'administrateur";
$email_user_change1       = "Bonjour,\n\nC'est le site  ".MANAGER_NAME." qui vous informe que votre profil a �t� modif� le ".$email_date." par %1\$s ( %2\$s ).\n\n".
                            "Login:        %3\$s\n".
                            "Mot de passe: %4\$s\n\n".
                            "Groupe:       %5\$s".
                            "Nom:          %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Edition de votre profil";
$email_user_change2       = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que vous avez correctement modifi� votre profil le ".$email_date.".\n\n".
                            "Profil:       %1\$s\n".
                            "Mot de passe: %2\$s\n\n".
                            "Nom:          %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.":  Edition de votre profil";
$email_user_change3       = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que vous avez correctement modifi� votre profil le ".$email_date.".\n\n".
                            "Profil: %1\$s\n".
                            "Votre mot de passe reste inchang�.\n\n".
                            "Nom:    %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Compte r�activ�";
$email_revive             = "Bonjour,\n\nC'est le site ".MANAGER_NAME." qui vous informe que votre profil a �t� r�activ� le ".$email_date.".\n\n".
                            "Profil: %1\$s\n".
                            "Nom de l'utilisateur: %2\$s\n\n".
                            "Par mesure de s�curit�, nous n'envoyons pas votre mot de passe. \n\n".
                            "Si vous l'avez oubli� , envoyez un email � ".EMAIL_ADMIN." pour en recevoir un nouveau.";



$title_delete_user        = ABBR_MANAGER_NAME.": Profil d�sactiv�.";
$email_delete_user        = "Bonjour,\n\nC'est le site ".MANAGER_NAME." vous informe que votre profil a �t� d�sactiv� le ".$email_date."\n\n".
                            "Nous somme d�sol� que vous nous quittiez et vous remercions pour votre participation! \n\n".
                            "Si votre profil a �t� d�sactiv� par erreur, merci d'envoyer un email � ".EMAIL_ADMIN.".";

?>
