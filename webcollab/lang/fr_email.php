<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2003 by Pierre Jean

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

  Maintainer:

*/

$email_list = "Projet:  %s\n".
              "Tache:     %s\n".
              "Status:    %s\n".
              "Propri&eacute;taire:    %s ( %s )\n".
              "Texte:\n%s\n\n".
              "Merci de consulter le site pour plus de d&eacute;tails.\n\n%s\n";


$title_takeover_project   = $ABBR_MANAGER_NAME.": Votre info a &eacute;t&eacute; assign&eacute;"; // You item taken over
$title_takeover_task      = $ABBR_MANAGER_NAME.": Votre info a &eacute;t&eacute; assign&eacute;"; // You item taken over
$email_takeover_project   = "Bonjour,\n\nC'est le site %s qui vous informe que projet a &eacute;t&eacute; assign&eacute; par l'administrateur sur %s.\n\n";
$email_takeover_task      = "Bonjour,\n\nC'est le site %s qui vous informe que tache a &eacute;t&eacute; assign&eacute; par l'administrateur sur %s.\n\n";

$title_new_owner_project  = $ABBR_MANAGER_NAME.": Actualit&eacute; projet pour vous";
$title_new_owner_task     = $ABBR_MANAGER_NAME.": Actualit&eacute; tache pour vous";
$email_new_owner_project   = "Bonjour,\n\nC'est le site projet qui vous informe que %s vous (actuellement) &eacute;t&eacute; assign&eacute; %s.\n\nPlus de d&eacute;tails:\n\n";
$email_new_owner_task    = "Bonjour,\n\nC'est le site tache qui vous informe que %s vous (actuellement) &eacute;t&eacute; assign&eacute; %s.\n\nPlus de d&eacute;tails:\n\n";

$title_new_group_project  = $ABBR_MANAGER_NAME.": Actualit&eacute; projet: %s";
$title_new_group_task     = $ABBR_MANAGER_NAME.": Actualit&eacute; tache: %s";
$email_new_group_project  = "Bonjour,\n\nC'est le site %s qui vous informe que une actualit&eacute; projet a &eacute;t&eacute; cr&eacute;&eacute;e pour %s\n\nPlus de d&eacute;tails:\n\n";
$email_new_group_task     = "Bonjour,\n\nC'est le site %s qui vous informe que une actualit&eacute; tache a &eacute;t&eacute; cr&eacute;&eacute;e pour %s\n\nPlus de d&eacute;tails:\n\n";

$title_edit_owner_project = $ABBR_MANAGER_NAME.": Mise a jour de projet ";
$title_edit_owner_task    = $ABBR_MANAGER_NAME.": Mise a jour de tache ";
$email_edit_owner_project ="Bonjour,\n\nC'est le site %s qui vous informe que projet a &eacute;t&eacute; chang&eacute; %s.\n\nPlus de d&eacute;tails:\n\n";
$email_edit_owner_task    ="Bonjour,\n\nC'est le site %s qui vous informe que tache a &eacute;t&eacute; chang&eacute; %s.\n\nPlus de d&eacute;tails:\n\n";

$title_edit_group_project = $ABBR_MANAGER_NAME.": Mise &agrave; jour de projet ";
$title_edit_group_task    = $ABBR_MANAGER_NAME.": Mise &agrave; jour de tache ";
$email_edit_group_project = "Bonjour,\n\nC'est le site %s qui vous informe que projet sur %s a &eacute;t&eacute; modifi&eacute; %s.\n\nPlus de d&eacute;tails:\n\n";
$email_edit_group_task    = "Bonjour,\n\nC'est le site %s qui vous informe que tache sur %s a &eacute;t&eacute; modifi&eacute; %s.\n\nPlus de d&eacute;tails:\n\n";

$title_delete_project     = $ABBR_MANAGER_NAME.": Projet deleted";
$title_delete_task       = $ABBR_MANAGER_NAME.": Tache deleted";
$email_delete_project     = "Bonjour,\n\nC'est le site %s qui vous informe que projet a &eacute;ffac&eacute; %s\n\n".
                            "Merci d'avoir g&eacute;r&eacute; cette projet jusque l&agrave;.\n\n";
$email_delete_task        = "Bonjour,\n\nC'est le site %s qui vous informe que tache a &eacute;ffac&eacute; %s\n\n";
                            "Merci d'avoir g&eacute;r&eacute; cette tache jusque l&agrave;.\n\n";

$delete_list = "Projet:  %s\n".
                "Tache:     %s\n".
                "Status:   %s\n\n".
                "Texte: \n%s\n\n";

$title_welcome      = "Bievenue ".$ABBR_MANAGER_NAME;
$email_welcome      = "Bonjour,\n\nC'est le site %s qui vous acceuille sur %s.\n\n".
			"En tant que d&eacute;butant, je vais vous expliquer quelques astuces pour vous permettre de de l'utiliser rapidement\n\n".
			"En premier, ceci est un outil de gestion de projet, l'&eacute;cran principal va vous montrer  les projets que sont actuellement disponibles".
			"Si vous cliquer sur un des noms de projet, vous allez vous retrouver dans sa liste des taches. Toutes les informations sont l&agrave;".
			"Tous les actualit&eacute;s que vous renseign&eacute;es ou que vous &eacute;dit&eacute;es sont affich&eacute;es aux autres utilisateurs comme 'nouvelle' ou 'mise &agrave; jour'. Cela fonctionne dans les deux sens et".
			"cela vous permet de v&eacute;rifier o&ugrave; l'activit&eacute; se situe.\n\n".
			"Vous pouvez aussi devenir propri&eacute;taire ou transf&eacute;rer la propri&eacute;t&eacute; des taches et vous permettre de les &eacute;diter et toutes les contributions qui y sont rattach&eacute;es.".
			"Pendant l'utilisation de l'outil, merci d'&eacute;diter la partie texte et le status des taches pour que tout le monde puisse connaitre la progression. ".
			"\n\nJe ne peux que vous souhaiter bonne route et vous confier mon email %s en cas de probl&egrave;me.\n\n --Bonne chance!\n\n".
			"Profil:      %s\n".
			"Mot de passe:   %s\n\n".
			"Groupe: %s".
			"Nom:       %s\n".
			"SiteWeb:    %s\n\n".
			"%s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Edition de votre profil par l'administrateur";
$email_user_change1 = "Bonjour,\n\nC'est le site  %s qui vous informe que votre profil a &eacute;t&eacute; modif&eacute; sur %s par %s ( %s ) \n\n".
			"Login:      %s\n".
			"Mot de passe:   %s\n\n".
			"Groupe: %s".
			"Nom:       %s\n\n".
			"%s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Edition de votre profil";
$email_user_change2 = "Bonjour,\n\nC'est le site %s qui vous informe que vous avez correctement modifi&eacute; votre profil sur %s\n\n".
			"Profil:    %s\n".
			"Mot de passe: %s\n\n".
			"Nom:     %s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.":  Edition de votre profil";
$email_user_change3 = "Bonjour,\n\nC'est le site %s qui vous informe que vous avez correctement modifi&eacute; votre profil sur %s\n\n".
			"Profil:    %s\n".
			"Votre mot de passe reste inchang&eacute;.\n\n".
			"Nom:     %s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Compte r&eacute;activ&eacute;";
$email_revive       = "Bonjour,\n\nC'est le site %s qui vous informe que votre profil a &eacute;t&eacute; r&eacute;activ&eacute; sur %s.\n\n".
			"Profil: %s\n".
			"Nom de l'utilsiateur:  %s\n\n".
			"Impossible de vous envoyer votre mot de passe car il est crypt&eacute;. \n\n".
			"Si vous l'avez oubli&eacute; , envoyer un email &agrave; %s pour recevoir un nouveau mot de passe.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Profil d&eacute;sactiv&eacute;.";
$email_delete_user  = "Bonjour,\n\nC'est le site %s qui vous informe que votre profil a &eacute;t&eacute; d&eacute;sactiv&eacute; sur %s\n\n".
			"Nous somme d&eacute;sol&eacute; que vous nous quitiez et nous vous remercions pour votre participation !\n\n".
			"Si votre profil a &eacute;t&eacute; d&eacute;sactiv&eacute; par erreur, merci d'envoyer un email &agrave; %s.";

?>
