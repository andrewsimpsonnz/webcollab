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

*/

$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i a' );

$title_file_post        = $ABBR_MANAGER_NAME.": New file upload: %s";
$email_file_post        = "Hello,\n\nThis is the ".$MANAGER_NAME." site informing you that a new file has been uploaded on ".$email_date." by %1\$s.\n\n".
                          "File:        %2\$s\n".
                          "Description: %3\$s";

$title_forum_post        = $ABBR_MANAGER_NAME.": New forum post: %s";
$email_forum_post        = "Hello,\n\nThis is the ".$MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s:\n\n%2\$s"; 
$email_forum_reply       = "Hello,\n\nThis is the ".$MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s.\n\n".
                           "This post is in reply to an earlier post by %2\$s.\n\n".
                           "Original post:\n %3\$s\n\n".
                           "New reply:\n%4\$s\n";

$email_list = "Projet: %1\$s\n".
              "T&acirc;che:  %2\$s\n".
              "Statut: %3\$s\n".
              "Propri&eacute;taire: %4\$s ( %5\$s )\n".
              "Texte:\n%6\$s\n\n".
              "Merci de consulter le site pour plus de d&eacute;tails.\n\n".$BASE_URL."\n";


$title_takeover_project   = $ABBR_MANAGER_NAME.": Votre projet a &eacute;t&eacute; affect&eacute;"; // You item taken over
$email_takeover_project   = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que le projet a &eacute;t&eacute; assign&eacute; le ".$email_date." par l'administrateur.\n\n";

$title_takeover_task      = $ABBR_MANAGER_NAME.": Votre t&acirc;che a &eacute;t&eacute; affect&eacute;e"; // You item taken over
$email_takeover_task      = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que t&acirc;che a &eacute;t&eacute; assign&eacute;e le ".$email_date." par l'administrateur.\n\n";

$title_new_owner_project  = $ABBR_MANAGER_NAME.": Actualit&eacute; de vos projets";
$email_new_owner_project   = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe qu'un projet qui vous appartient a &eacute;t&eacute; modifi&eacute; le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_new_owner_task     = $ABBR_MANAGER_NAME.": Actualit&eacute; de vos t&acirc;ches";
$email_new_owner_task    = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que qu'une t&acirc;che qui vous appartient a &eacute;t&eacute; modifi&eacute;e le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_new_group_project  = $ABBR_MANAGER_NAME.": Nouveau projet:  %1\$s";
$email_new_group_project  = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe qu'un nouveau projet a &eacute;t&eacute; cr&eacute;&eacute; le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_new_group_task     = $ABBR_MANAGER_NAME.": Nouvelle t&acirc;che: %1\$s";
$email_new_group_task     = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe qu'une nouvelle t&acirc;che a &eacute;t&eacute; cr&eacute;&eacute;e le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_edit_owner_project = $ABBR_MANAGER_NAME.": Mise a jour de votre projet";
$email_edit_owner_project ="Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que votre projet a &eacute;t&eacute; modifi&eacute; le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_edit_owner_task    = $ABBR_MANAGER_NAME.": Mise a jour de votre t&acirc;che";
$email_edit_owner_task    ="Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que t&acirc;che a &eacute;t&eacute; modifi&eacute;e le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_edit_group_project = $ABBR_MANAGER_NAME.": Mise &agrave; jour d'un projet";
$email_edit_group_project = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe qu'un projet d&eacute;tenu par %1\$s a &eacute;t&eacute; modifi&eacute; le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_edit_group_task    = $ABBR_MANAGER_NAME.": Mise &agrave; jour de tache ";
$email_edit_group_task    = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe qu'une t&acirc;che d&eacute;tenue par %1\$s a &eacute;t&eacute; modifi&eacute;e le ".$email_date.".\n\nPlus de d&eacute;tails:\n\n";

$title_delete_project     = $ABBR_MANAGER_NAME.": Projet supprim&eacute;";
$email_delete_project     = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que projet a &eacute;t&eacute; effa&ccedil;&eacute; le ".$email_date.".\n\n".
                            "Merci d'avoir g&eacute;r&eacute; ce projet jusque l&agrave;.\n\n";

$title_delete_task       = $ABBR_MANAGER_NAME.": Tache supprim&eacute;e";
$email_delete_task        = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que t&acirc;che a &eacute;t&eacute; effa&ccedil;&eacute;e le ".$email_date.".\n\n".
                            "Merci d'avoir g&eacute;r&eacute; cette tache jusque l&agrave;.\n\n";

$delete_list = "Projet: %1\$s\n".
                "T&acirc;che:  %2\$s\n".
                "Statut: %3\$s\n\n".
                "Texte: \n%4\$s\n\n";

$title_welcome      = "Bienvenue ".$ABBR_MANAGER_NAME;
$email_welcome      = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous acceuille le ".$email_date.".\n\n".
			"Si vous &ecirc;tes d&eacute;butant, voici quelques astuces qui vous permettront d'utiliser le site rapidement.\n\n".
			"C'est un outil de gestion de projet, l'&eacute;cran principal vous montre les projets que sont actuellement g&eacute;r&eacute;s. ".
			"Si vous cliquer sur un des noms de projet, vous voyez appara&icirc;tre sa liste des t&acirc;ches. Toutes les informations sont l&agrave;. ".
			"Tous les actualisations que vous effectuez sont transmises aux autres utilisateurs concern&eacute;s. R&eacute;ciproquement, vous &ecirc;tes inform&eacute;s des modifications vous concernant. ".
			"Cela vous permet de savoir constamment o&ugrave; l'activit&eacute; se situe.\n\n".
			"Vous pouvez aussi devenir propri&eacute;taire d'une t&acirc;che, ce qui vous permet d'&eacute;diter cette t&acirc;che et toutes contributions qui y sont rattach&eacute;es. ".
			"Pendant l'utilisation de l'outil, veuillez &eacute;diter la partie texte et le statut des t&acirc;ches pour que tout le monde puisse conna&icirc;tre leurs progressions. ".
			"\n\nJe ne peux que vous souhaiter bonne route et vous confier mon email ".$EMAIL_ADMIN."s en cas de probl&egrave;me.\n\n --Bonne chance!\n\n".
			"Profil:       %1\$s\n".
			"Mot de passe: %2\$s\n\n".
			"Groupe:       %3\$s".
			"Nom:          %4\$s\n".
			"SiteWeb:      ".$BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Edition de votre profil par l'administrateur";
$email_user_change1 = "Bonjour,\n\nC'est le site  ".$MANAGER_NAME." qui vous informe que votre profil a &eacute;t&eacute; modif&eacute; le ".$email_date." par %1\$s ( %2\$s ).\n\n".
			"Login:        %3\$s\n".
			"Mot de passe: %4\$s\n\n".
			"Groupe:       %5\$s".
			"Nom:          %6\$s\n\n".
			"%7\$s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Edition de votre profil";
$email_user_change2 = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que vous avez correctement modifi&eacute; votre profil le ".$email_date.".\n\n".
			"Profil:       %1\$s\n".
			"Mot de passe: %2\$s\n\n".
			"Nom:          %3\$s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.":  Edition de votre profil";
$email_user_change3 = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que vous avez correctement modifi&eacute; votre profil le ".$email_date.".\n\n".
			"Profil: %1\$s\n".
			"Votre mot de passe reste inchang&eacute;.\n\n".
			"Nom:    %2\$s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Compte r&eacute;activ&eacute;";
$email_revive       = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." qui vous informe que votre profil a &eacute;t&eacute; r&eacute;activ&eacute; le ".$email_date.".\n\n".
			"Profil: %1\$s\n".
			"Nom de l'utilisateur: %2\$s\n\n".
			"Par mesure de s&eacute;curit&eacute;, nous n'envoyons pas votre mot de passe. \n\n".
			"Si vous l'avez oubli&eacute; , envoyez un email &agrave; ".$EMAIL_ADMIN." pour en recevoir un nouveau.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Profil d&eacute;sactiv&eacute;.";
$email_delete_user  = "Bonjour,\n\nC'est le site ".$MANAGER_NAME." vous informe que votre profil a &eacute;t&eacute; d&eacute;sactiv&eacute; le ".$email_date."\n\n".
			"Nous somme d&eacute;sol&eacute; que vous nous quittiez et vous remercions pour votre participation! \n\n".
			"Si votre profil a &eacute;t&eacute; d&eacute;sactiv&eacute; par erreur, merci d'envoyer un email &agrave; ".$EMAIL_ADMIN.".";

?>
