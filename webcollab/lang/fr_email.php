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

  Email text language files for 'fr' (French/Fran�ais)

  Maintainer: 

*/

$title_takeover     = $ABBR_MANAGER_NAME.": Votre info a �t� assign�"; // You item taken over
$email_takeover     = "Bonjour,\n\nC'est le site %s qui vous informe que %s a �t� assign� par l'administrateur sur %s.\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Propri�taire:    %s ( %s )\n".
			"Texte:\n%s\n\n".
			"Merci de consulter le site pour plus de d�tails.\n\n%s\n";

$title_new_owner    = $ABBR_MANAGER_NAME.": Actualit�  %s pour vous";
$email_new_owner    = "Bonjour,\n\nC'est le site %s qui vous informe que %s vous (actuellement) �t� assign� %s.\n\nPlus de d�tails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci de consulter le site pour plus de d�tails.\n\n%s\n";


$title_new_group    = $ABBR_MANAGER_NAME.": Actualit� %s: ";
$email_new_group    = "Bonjour,\n\nC'est le site %s qui vous informe que une actualit� %s a �t� cr��e pour %s\n\nPlus de d�tails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Propri�taire:    %s\n".
			"Status:   %s\n\n".
			"Texte:\n%s\n\n".
			"Merci de consulter le site pour plus de d�tails.\n\n%s\n";

$title_edit_owner   = $ABBR_MANAGER_NAME.": Mise a jour de %s ";
$email_edit_owner   ="Bonjour,\n\nC'est le site %s qui vous informe que %s a �t� chang� %s.\n\nPlus de d�tails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci de consulter le site pour plus de d�tails.\n\n%s\n";


$title_edit_group   = $ABBR_MANAGER_NAME.": Mise � jour de %s ";
$email_edit_group   = "Bonjour,\n\nC'est le site %s qui vous informe que %s sur %s a �t� modifi� %s.\n\nPlus de d�tails:\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci de consulter le site pour plus de d�tails.\n\n%s\n";


$title_delete_task  = $ABBR_MANAGER_NAME.": %s deleted";
$email_delete_task  = "Bonjour,\n\n".
			"C'est le site %s qui vous informe que %s a �ffac� %s\n\n".
			"Projet:  %s\n".
			"Tache:     %s\n".
			"Status:   %s\n\n".
			"Texte: \n%s\n\n".
			"Merci d'avoir g�r� cette tache jusque l�.";


$title_welcome      = "Bievenue ".$ABBR_MANAGER_NAME;
$email_welcome      = "Bonjour,\n\nC'est le site %s qui vous acceuille sur %s.\n\n".
			"En tant que d�butant, je vais vous expliquer quelques astuces pour vous permettre de de l'utiliser rapidement\n\n".
			"En premier, ceci est un outil de gestion de projet, l'�cran principal va vous montrer  les projets que sont actuellement disponibles".
			"Si vous cliquer sur un des noms de projet, vous allez vous retrouver dans sa liste des taches. Toutes les informations sont l�".
			"Tous les actualit�s que vous renseign�es ou que vous �dit�es sont affich�es aux autres utilisateurs comme 'nouvelle' ou 'mise � jour'. Cela fonctionne dans les deux sens et".
			"cela vous permet de v�rifier o� l'activit� se situe.\n\n".
			"Vous pouvez aussi devenir propri�taire ou transf�rer la propri�t� des taches et vous permettre de les �diter et toutes les contributions qui y sont rattach�es.".
			"Pendant l'utilisation de l'outil, merci d'�diter la partie texte et le status des taches pour que tout le monde puisse connaitre la progression. ".
			"\n\nJe ne peux que vous souhaiter bonne route et vous confier mon email %s en cas de probl�me.\n\n --Bonne chance!\n\n".
			"Profil:      %s\n".
			"Mot de passe:   %s\n\n".
			"Groupe: %s".
			"Nom:       %s\n".
			"SiteWeb:    %s\n\n".
			"%s";

$title_user_change1 = $ABBR_MANAGER_NAME.": Edition de votre profil par l'administrateur";
$email_user_change1 = "Bonjour,\n\nC'est le site  %s qui vous informe que votre profil a �t� modif� sur %s par %s ( %s ) \n\n".
			"Login:      %s\n".
			"Mot de passe:   %s\n\n".
			"Groupe: %s".
			"Nom:       %s\n\n".
			"%s";

$title_user_change2 = $ABBR_MANAGER_NAME.": Edition de votre profil";
$email_user_change2 = "Bonjour,\n\nC'est le site %s qui vous informe que vous avez correctement modifi� votre profil sur %s\n\n".
			"Profil:    %s\n".
			"Mot de passe: %s\n\n".
			"Nom:     %s\n";

$title_user_change3 = $ABBR_MANAGER_NAME.":  Edition de votre profil";
$email_user_change3 = "Bonjour,\n\nC'est le site %s qui vous informe que vous avez correctement modifi� votre profil sur %s\n\n".
			"Profil:    %s\n".
			"Votre mot de passe reste inchang�.\n\n".
			"Nom:     %s\n";


$title_revive       = $ABBR_MANAGER_NAME.": Compte r�activ�";
$email_revive       = "Bonjour,\n\nC'est le site %s qui vous informe que votre profil a �t� r�activ� sur %s.\n\n".
			"Profil: %s\n".
			"Nom de l'utilsiateur:  %s\n\n".
			"Impossible de vous envoyer votre mot de passe car il est crypt�. \n\n".
			"Si vous l'avez oubli� , envoyer un email � %s pour recevoir un nouveau mot de passe.";



$title_delete_user  = $ABBR_MANAGER_NAME.": Profil d�sactiv�.";
$email_delete_user  = "Bonjour,\n\nC'est le site %s qui vous informe que votre profil a �t� d�sactiv� sur %s\n\n".
			"Nous somme d�sol� que vous nous quitiez et nous vous remercions pour votre participation !\n\n".
			"Si votre profil a �t� d�sactiv� par erreur, merci d'envoyer un email � %s.";

?>