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

$title_takeover     = $ABBR_MANAGER_NAME.": Votre info a été assigné"; // You item taken over
$email_takeover     = "Bonjour,\n\nC'est le site %s qui vous informe que %s a été assigné par l'administrateur sur %s.\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Propriétaire:    %s ( %s )\n".
			"Texte:\n%s\n\n".
			"Merci de consulter le site pour plus de détails.\n\n%s\n";

$title_new_owner    = $ABBR_MANAGER_NAME.": Actualité  %s pour vous";
$email_new_owner    = "Bonjour,\n\nC'est le site %s qui vous informe que %s vous (actuellement) été assigné %s.\n\nPlus de détails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci de consulter le site pour plus de détails.\n\n%s\n";


$title_new_group    = $ABBR_MANAGER_NAME.": Actualité %s: ";
$email_new_group    = "Bonjour,\n\nC'est le site %s qui vous informe que une actualité %s a été créée pour %s\n\nPlus de détails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Propriétaire:    %s\n".
			"Status:   %s\n\n".
			"Texte:\n%s\n\n".
			"Merci de consulter le site pour plus de détails.\n\n%s\n";

$title_edit_owner   = $ABBR_MANAGER_NAME.": Mise a jour de %s ";
$email_edit_owner   ="Bonjour,\n\nC'est le site %s qui vous informe que %s a été changé %s.\n\nPlus de détails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci de consulter le site pour plus de détails.\n\n%s\n";


$title_edit_group   = $ABBR_MANAGER_NAME.": Mise à jour de %s ";
$email_edit_group   = "Bonjour,\n\nC'est le site %s qui vous informe que %s sur %s a été modifié %s.\n\nPlus de détails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci de consulter le site pour plus de détails.\n\n%s\n";


$title_delete_task  = $ABBR_MANAGER_NAME.": %s deleted";
$email_delete_task  = "Bonjour,\n\n".
			"C'est le site %s qui vous informe que %s a éffacé %s\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci d'avoir géré cette tache jusque là.";


$title_welcome      = "Bievenue ".$ABBR_MANAGER_NAME;
$email_welcome      = "Bonjour,\n\nC'est le site %s qui vous acceuille sur %s.\n\n".
			"En tant que débutant, je vais vous expliquer quelques astuces pour vous permettre de de l'utiliser rapidement\n\n".
			"En premier, ceci est un outil de gestion de projet, l'écran principal va vous montrer  les projets que sont actuellement disponibles".
			"Si vous cliquer sur un des noms de projet, vous allez vous retrouver dans sa liste des taches. Toutes les informations sont là".
			"Tous les actualités que vous renseignées ou que vous éditées sont affichées aux autres utilisateurs comme 'nouvelle' ou 'mise à jour'. Cela fonctionne dans les deux sens et".
			"cela vous permet de vérifier où l'activité se situe.\n\n".
			"Vous pouvez aussi devenir propriétaire ou transférer la propriété des taches et vous permettre de les éditer et toutes les contributions qui y sont rattachées.".
			"Pendant l'utilisation de l'outil, merci d'éditer la partie texte et le status des taches pour que tout le monde puisse connaitre la progression. ".
			"\n\nJe ne peux que vous souhaiter bonne route et vous confier mon email %s en cas de problème.\n\n --Bonne chance!\n\n".
			"Profil:      %s\n".
			"Mot de passe:   %s\n\n".
			"Groupe: %s".
			"Nom:       %s\n".
			"SiteWeb:    %s\n\n".
			"%s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Edition de votre profil par l'administrateur";
$email_user_change1 = "Bonjour,\n\nC'est le site  %s qui vous informe que votre profil a été modifé sur %s par %s ( %s ) \n\n".
			"Login:      %s\n".
			"Mot de passe:   %s\n\n".
			"Groupe: %s".
			"Nom:       %s\n\n".
			"%s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Edition de votre profil";
$email_user_change2 = "Bonjour,\n\nC'est le site %s qui vous informe que vous avez correctement modifié votre profil sur %s\n\n".
			"Profil:    %s\n".
			"Mot de passe: %s\n\n".
			"Nom:     %s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.":  Edition de votre profil";
$email_user_change3 = "Bonjour,\n\nC'est le site %s qui vous informe que vous avez correctement modifié votre profil sur %s\n\n".
			"Profil:    %s\n".
			"Votre mot de passe reste inchangé.\n\n".
			"Nom:     %s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Compte réactivé";
$email_revive       = "Bonjour,\n\nC'est le site %s qui vous informe que votre profil a été réactivé sur %s.\n\n".
			"Profil: %s\n".
			"Nom de l'utilsiateur:  %s\n\n".
			"Impossible de vous envoyer votre mot de passe car il est crypté. \n\n".
			"Si vous l'avez oublié , envoyer un email à %s pour recevoir un nouveau mot de passe.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Profil désactivé.";
$email_delete_user  = "Bonjour,\n\nC'est le site %s qui vous informe que votre profil a été désactivé sur %s\n\n".
			"Nous somme désolé que vous nous quitiez et nous vous remercions pour votre participation !\n\n".
			"Si votre profil a été désactivé par erreur, merci d'envoyer un email à %s.";

?>