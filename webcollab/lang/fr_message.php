<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Created as CoreAPM 2001/2002 by Dennis Fleurbaaij
  with much help from the people noted in the README

  Rewritten as WebCollab 2002/2003 (from CoreAPM Ver 1.11)
  by Andrew Simpson <andrew.simpson@paradise.net.nz>

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

  Language files for 'fr' (French/Fran�ais)

  Maintainer: 

*/

//dates
$month_array = array ( "Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Jul", "Aou", "Sep", "Oct", "Nov", "Dec" );
$week_array = array('Dim','Lun','Mar','Mer','Jeu','Ven','Sam');

//task states
$task_state = array(
 //priorities
 "dontdo" => "Ne pas faire",
 "low" => "Bas",
 "normal" => "Normal",
 "high" => "Haut",
 "yesterday" => "Urgent!",
 //status
 "new" => "Nouveau",
 "planned" => "Plannifi� (d�sactiv�)",
 "active" => "Actif (en cours)",
 "cantcomplete" => "Suspendue",
 "completed" => "Finie",
 "done" => "Fait",
 "task_planned" => " Plannifi�e",
 "task_active" => " Active",
 //project states
 "planned_project" => "Projet plannifi� (d�sactivi�)",
 "no_deadline_project" => "Aucune date de fin ",
 "active_project" => "Projet Actif" );

//common items
$lang = array(
 "description" => "Description",
 "name" => "Nom",
 "add" => "Ajout",
 "update" => "MaJ",
 "submit_changes" => "Modifier",
//**
 "reset" => "Reset",
 "manage" => "G�rer",
 "edit" => "Editer",
 "delete" => "Effacer",
 "del" => "Eff",
 "confirm_del" => "Confirmer effacer!",
 "yes" => "Oui",
 "no" => "Non",
 "action" => "Action",
 "task" => "tache",
 "ttask" => "Tache",
 "tasks" => "Taches",
 "project" => "projet",
 "pproject" => "Projet",
 "info" => "Info",
 "bytes" => " octes",
 "select_instruct" => "(Utilisation de CTRL pour plusieurs s�lections ou aucune s�lection)",
 "member_groups" => "L'utilisateur est membre du groupe indiqu� en bas (s'il y en a un)",
 "login" => "Utilisateur",
 "error" => "Erreur",
 "no_login" => "Acces refus�, utilisateur ou mot de passe incorrect",
 "please_login" => "Merci de vous connecter",
 
//admin config
 "admin_config" => "Config Admin",
 "email_settings" => "Param�tre ent�te Email", 
 "admin_email" => "Admin email",
 "email_reply" => "Email 'r�pondre �'",
 "email_from" => "Email 'de'",
 "mailing_list" => "Liste de diffusion",
 "default_checkbox" => "Valeur par d�faut pour les Projets/Taches",
 "allow_globalaccess" => "Autoris� un acc�s global ?",
 "allow_group_edit" => "Autorise tous les groupe d'utilisateurs � �diter ?",
 "set_email_owner" => "Toujours signifier par email au propri�taire une modification ?",
 "set_email_group" => "Tojours signifier par email au groupes d'utilisateurs une modification ?",
 "configuration" => "Configuration",


//contacts
 "firstname" => "Pr�nom:",
 "lastname" => "Nom:",
 "company" => "Entreprise:",
 "home_phone" => "T�l�phone personnel:",
 "mobile" => "Mobile:",
 "fax" => "Fax:",
 "bus_phone" => "T�l�phone professionnel:",
 "address" => "Adresse:",
 "postal" => "Code Postal:",
 "city" => "Ville:",
 "email" => "Email:",
 "notes" => "Notes:",
 "add_contact" => "Ajouter contact",
 "del_contact" => "Effacer contact",
 "del_javascript" => "Cele va effacer un contact. Vous confirmez ?",
 "contact_info" => "Contact information",
 "contacts" => "Contacts",
 "contact_add_info" => "Si vous indiquez le nom d'une entreprise cette information va �tre affich�e � la place du nom du contact.",
 "show_contact" => "Afficher contacts",
 "edit_contact" => "Editer contacts",
 "contact_submit" => "Modifier contact",
 "contact_warn" => "il manque des informations pour ajouter ce contact merci de revenir en arri�re et de renseigner au moins le pr�nom et le nom",

 //files
 "manage_files" => "Gestion des fichiers",
 "no_files" => "Aucun fichiers t�l�charg�s � g�rer",
 "file" => "Fichier:",
 "uploader" => "T�l�charger:",
 "files_assoc_sprt" => "Fichiers associ�s avec %s",
 "file_admin" => "Admin Fichier",
 "add_file" => "Ajouter fichier",
 "files" => "Fichiers",
 "file_choose" => "Fichier � t�l�charger:",
 "upload" => "T�l�chargement",
 "max_file_sprt" => "un fichier � t�l�charger doit �tre plus petit que %s kilo-octets.",
 "file_submit" => "Fichier T�l�charger ",
 "no_upload" => "Aucun fichier n'a �t� t�l�charg�. Merci de revenir en arri�re et de renouveller.",
 "file_too_big_sprt" => "La taille maximun t�l�chargeable est de %s octets. Votre t�l�chargement est trop important et a �t� annul�.",
 "del_file_javascript_sprt" => "Veuillez confirmer la destruction du fichier %s ?",


 //forum
 "orig_message" => "Message originel:",
 "post" => "Contribution!",
 "message" => "Message:",
 "post_reply_sprt" => "R�pondre � une contribution de '%s' � propos de '%s'",
 "post_message_sprt" => "R�pondre � la contribution �: '%s'",
 "reply" => "R�pondre",
 "new_post" => "Nouvelle contribution",
 "public_user_forum" => "Forum public",
 "private_forum_sprt" => "Forum priv� pour le groupe '%s' ",
 "forum_submit" => "Soumettre au forum",
 "no_message" => "Pas de message! Merci de revenir en arri�re et d'essayer � nouveau",
 "add_reply" => "Ajouter une r�ponse",

 //includes
 "report" => "Rapport",
 "warning" => "<H1>D�sol�!</H1><P>Nous sommes incapable de proc�der � votre requete actuellement. Merci de r�essayez plus tard.</P>",
 "home_page" => "Page Principale",
 "summary_page" => "Sommaire",
 "todo_list" => "Liste �-faire",
 "calendar" => "Calendrier",
 "log_out" => "D�connextion",
 "main_menu" => "Menu Principal",
 "user_homepage_sprt" => "%s : page principale",
 "load_time_sprt" => "Cette page a �t� charg�e en %.3f secondes.  Sur ces %.3f secondes ont �t� utilis� pour ex�cuter %d transactions dans la base de donn�es",
 "security_manager" => "Gestion Securit�",
 "no_key_sprt" => "Pas de session valide. Merci de vous connecter <A href=\"%sindex.php\">Profil</A>",
 "no_session" => "Pas de session, merci de vous <A href=\"%sindex.php\">connecter</A>",
 "session_timeout_sprt" => "Acc�s refus�, la derni�re action a �t� faite il y � %d minutes et la session s'est ferm�e apr�s 60 minutes, merci de vous  <A href=\"%sindex.php\">re-connecter</A>",
 "ip_spoof_sprt" =>"Usurpation d'adresse IP d�tect�e depuis votre adresse IP (%s) cette session a �t� �ffac�e par pr�caution, merci de vous <A href=\"%sindex.php\">re-connecter</A>",
 "access_denied" => "Acc�s refus�",
 "private_usergroup" => "D�sol�, cette zone est priv�e et elle est r�serv�e � un groupe d'utilisateurst.Vvous n'y avez pas acc�s..",
 "invalid_date" => "Date invalide",
 "invalid_date_sprt" => "La date du %s n'est pas une date correcte du calendrier (Merci de v�rifier le nombre de jour dans le mois). Merci de revenir en arri�re et d'entrer une date valide.",


 //taskgroups
 "taskgroup_name" => "Groupe de taches:",
 "taskgroup_description" => "Description du groupe de taches:",
 "add_taskgroup" => "Ajouter � groupe de taches",
 "add_new_taskgroup" => "Ajouter un nouveau groupe de taches",
 "edit_taskgroup" => "Editer un groupe de taches",
 "taskgroup_manage" => "Gestion des groupes de taches",
 "no_taskgroups" => "Pas de groupe de taches d�fini",
 "manage_taskgroups" => "Gestion Groupe de taches",
 "taskgroups" => "Groupes de taches",
 "taskgroup_dup_sprt" => "Le groupe de taches '%s' existe d�j�. Merci d'utiliser un autre nom.",
 "info_taskgroup_manage" => "Gestion des informations pour le groupe de taches",

 //usergroups
 "usergroup_name" => "Nom du groupe d'utilisateurs:",
 "usergroup_description" => "Description du groupe d'utilisateurs:",
 "members" => "Membres:",
 "add_usergroup" => "Ajouter au groupe d'utilisateurs",
 "add_new_usergroup" => "Ajouter un nouveau groupe d'utilisateurs",
 "edit_usergroup" => "Editer un groupe d'utilisateurs",
 "usergroup_manage" => "Gestion des groupes d'utilisateurs",
 "no_usergroups" => "Pas de groupe d'utilisateurs d�fini",
 "manage_usergroups" => "Gestion des groupes d'utilisateurs",
 "usergroups" => "Groupes d'utilisateurs",
 "usergroup_dup_sprt" => "Le groupe d'utilisateurs '%s' existe d�j�. Merci d'utiliser un autre nom.",
 "info_usergroup_manage" => "gestion des informations pour le groupe d'utilisateurs",

 //users
 "login_name" => "Nom utilisateur",
 "full_name" => "Nom complet",
 "password" => "Mot de passe",
 //**
 "blank_for_current_password" => "(Leave blank for current password)",
 "email" => "E-mail",
 "admin" => "Admin",
 "is_admin" => "Est-il admin?",
 "user_info" => "Information utilisateur",
 "deleted_users" => "Effacer les utilisateurs",
 "no_deleted_users" => "Il n'y aucun utilisateurs effac�s.",
 "revive" => "R�activer",
 "permdel" => "Effacer permament",
 "permdel_javascript_sprt" => "Ceci va effacer de mani�re permanente toutes les informations sur un utilisateur et ses taches associ�es pour %s. Voulez vous r�ellement le faire?",
 "add_user" => "Ajouter un utilisateur",
 "edit_user" => "Editer un utilisateur",
 "no_users" => "Aucun utilisateurs connus sur ce syst�me",
 "users" => "Utilisateurs",
 "existing_users" => "Utilisateurs existants",
 "who_online" => "Qui est connect�?",
 "edit_details" => "Editer les informations d'un utilisateurs",
 "show_details" => "Afficher les informations d'un utilisateurs",
 "user_deleted" => "Cet utilisateur a �t� effac�!",
 "no_usergroup" => "Cet utilisateur n'est membre d'aucun groupe",
 "not_usergroup"=> "(Membre d'aucun groupe d'utilisateurs)",
 "no_password_change" => "(Votre mot de passe actuel n'a pas �t� chang�)",
 "last_time_here" => "Dernier venue:",
 "number_items_created" => "Nombre d'�l�ments cr��s:",
 "number_projects_owned" => "Nombre de projet dont il est propri�taire:",
 "number_tasks_owned" => "Nombre de taches dont il est propri�taire:",
 "number_tasks_completed" => "Nombre de taches finies:",
 "number_forum" => "Nombre de contributions:",
 "number_files" => "Nombre de fichiers t�l�charg�s:",
 "size_all_files" => "Taille totale des fichiers dont il est propri�taire:",
 "owned_tasks" => "taches � sa charge:",
 "invalid_email" => "Adresse email invalide",
 "invalid_email_given_sprt" => "Cette adresse email '%s' est invalide. Merci de revenir en arri�re et d'essayer � nouveau.",
 "duplicate_user" => "utilisateur dupliqu�",
 "duplicate_change_user_sprt" => "Cet utilisateur '%s' existe d�j�.  Merci de changer son nom.",
 "value_missing" => "Information manquante",
 "field_sprt" => "Le champ de '%s' est manquant. Merci de revenir en arri�re et de le renseigner.",
 "admin_priv" => "NOTE: Vous avez �t� promus administrateur.",
 "manage_users" => "Gestion des utilisateurs",
 "users_online" => "utilisateurs connect�s",
 "online" => "Utilisateurs connect� (session activ�e depuis moins de 60 mins maintenant)",
 "not_online" => "Les autres",
 "user_activity" => "Activit� utilisateur",

  //tasks
 "add_new_task" => "Ajouter une nouvelle tache",
 "priority" => "Priorit�",
 "parent_task" => "Tache parente",
 "creation_time" => "Date de cr�ation",
 "project_name" => "Nom du projet",
 "task_name" => "Nom de la tache",
 "deadline" => "Date de fin",
 "taken_from_parent" => "(Prit depuis le parent)",
 "status" => "Status",
 "task_owner" => "Propri�taire tache",
 "project_owner" => "Propri�taire projet",
 "taskgroup" => "Groupe taches",
 "usergroup" => "Groupe utilisateurs",
 "nobody" => "Personne",
 "none" => "Vide",
 "no_group" => "Aucun groupe",
 "all_groups" => "tout les  groupes",
 "all_users" => "Tous les utilisateurs peuvent voir cette tache ?",
 "group_edit" => "Tout utilisateur du groupe peut �diter ?",
 "project_description" => "Description du projet",
 "task_description" => "Description de la tache",
 "email_owner" => "Envoyer un email au propri�taire avec les modifications ?",
 "email_new_owner" => "Envoyer un email au (nouveau) propri�taire avec les modifications ?",
 "email_group" => "Envoyer un email au groupe d'utilisateurs avec les modifications ?",
 "add_new_project" =>"Ajouter un nouveau projet",
 "uncategorised" => "d�class�",
 "due_sprt" => "%d jours pass�",
 "tomorrow" => "Demain",
 "due_today" => "Pour aujourd'hui",
 "overdue_1" => "1 jours de retard",
 "overdue_sprt" => "%d jours de retard",
 "edit_task" => "Editer la tache",
 "edit_project" => "Editer le projet",
 "del_javascript_sprt" => "Ceci va d�truire %s %s. Etes vous s�r?",
 "add_task" => "Ajout tache",
 "add_subtask" => "Ajout sous tache",
 "add_project" => "Ajout projet",
 "no_edit" => "Vous n'�tes pas propri�taire de cet �l�ment vous n'avez pas � l'�diter. Demandez � l'administrateur, ou au propri�taire de ces taches de le faire pour vous.",
 "uncategorised" => "D�class�",
 "admin" => "Admin",
 "global" => "Global",
 "options" => " options",
 "task_navigation" => "Navigation taches",
 "no_projects" => "Pas de projet � afficher",
 "ccompleted" => "Fini",
 "project_hold" => "Projet sous controle de ",
 "project_planned" => "Projet Planifi�",
 "percent" => "% des taches effectu�es",
 "project_no_deadline" => "Pas de date de fin pour ce projet",
 "no_allowed_projects" => "Aucun projet que vous �te autoris� d'afficher",
 "projects" => "Projets",
 "percent_project_sprt" => "Ce projet est %d%% fini",
 "owned_by" => "Propri�t� de ",
 "created_on" => "Cr�er le",
 "completed_on" => "Fini le",
 "modified_on" => "Modifi� le",
 "project_on_hold" => "Projet est en cours",
 "task_accessible_sprt" => "(Ceci %s est publiquement accessible � tous les utilisateurs)",
 "task_not_accessible_sprt" => "(Ceci %s est seulement accessible aux membres du groupe d'utilisateurs)",
 "task_not_in_usergroup_sprt" => "Ceci %s n'est pas accessible au groupe d'utilisateurs mais est accessible � tous les utilisateurs.",
 "usergroup_can_edit_sprt" => "Ceci %s peut aussi �tre �diter par les membres du groupe d'utilisateurs.",
 "i_take_it" => "Je prends",
 "i_finished" => "J'ai finis avec!",
 "i_dont_want" => "Je n'en veux plus",
 "take_over_sprt" => "Je prends %s",
 "task_info" => "Information Tache ",
 "project_details" => "D�tails projet",
 "todo_list_for" => "Liste �-faire pour le : ",
 "due_in_sprt" => " (� faire dans %d jours)",
 "due_tomorrow" => " (� faire pour demain)",
 "no_assigned" => "Il n'y aucune tache en cours confi�e � cet utilisateur.",
 "todo_list" => "Liste �-faire",
 "summary_list" => "Sommaire",
 "task_submit" => "Modifier tache",
 "not_owner" => "Acc�s refus�, sot vous n'en �tes pas le propri�taire soit vous n'avez pas de droit dessus",
 "missing_values" => "il manque des champs d'informations � fournir, merci de revenir en arri�re et d'essayer de nouveau",
 "future" => "Futur",
 "flags" => "Drapeaux",
 "owner" => "Propri�taire",
 "usergroupid" => "IDGroupe",
 "taskgroupid" => "IDGroupeTache",
 "group" => "Groupe",
 "by_usergroup" => " (par groupe d'utilisateurs)",
 "by_taskgroup" => " (par groupe de taches)",


//bits 'n' pieces
  "calendar" => "Calendrier" );

?>
