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

  Language files for 'fr' (French/Français)

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
 "planned" => "Plannifié (désactivé)",
 "active" => "Actif (en cours)",
 "cantcomplete" => "Suspendue",
 "completed" => "Finie",
 "done" => "Fait",
 "task_planned" => " Plannifiée",
 "task_active" => " Active",
 //project states
 "planned_project" => "Projet plannifié (désactivié)",
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
 "manage" => "Gérer",
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
 "select_instruct" => "(Utilisation de CTRL pour plusieurs sélections ou aucune sélection)",
 "member_groups" => "L'utilisateur est membre du groupe indiqué en bas (s'il y en a un)",
 "login" => "Utilisateur",
 "error" => "Erreur",
 "no_login" => "Acces refusé, utilisateur ou mot de passe incorrect",
 "please_login" => "Merci de vous connecter",
 
//admin config
 "admin_config" => "Config Admin",
 "email_settings" => "Paramètre entête Email", 
 "admin_email" => "Admin email",
 "email_reply" => "Email 'répondre à'",
 "email_from" => "Email 'de'",
 "mailing_list" => "Liste de diffusion",
 "default_checkbox" => "Valeur par défaut pour les Projets/Taches",
 "allow_globalaccess" => "Autorisé un accès global ?",
 "allow_group_edit" => "Autorise tous les groupe d'utilisateurs à éditer ?",
 "set_email_owner" => "Toujours signifier par email au propriétaire une modification ?",
 "set_email_group" => "Tojours signifier par email au groupes d'utilisateurs une modification ?",
 "configuration" => "Configuration",


//contacts
 "firstname" => "Prénom:",
 "lastname" => "Nom:",
 "company" => "Entreprise:",
 "home_phone" => "Téléphone personnel:",
 "mobile" => "Mobile:",
 "fax" => "Fax:",
 "bus_phone" => "Téléphone professionnel:",
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
 "contact_add_info" => "Si vous indiquez le nom d'une entreprise cette information va être affichée à la place du nom du contact.",
 "show_contact" => "Afficher contacts",
 "edit_contact" => "Editer contacts",
 "contact_submit" => "Modifier contact",
 "contact_warn" => "il manque des informations pour ajouter ce contact merci de revenir en arrière et de renseigner au moins le prénom et le nom",

 //files
 "manage_files" => "Gestion des fichiers",
 "no_files" => "Aucun fichiers téléchargés à gérer",
 "file" => "Fichier:",
 "uploader" => "Télécharger:",
 "files_assoc_sprt" => "Fichiers associés avec %s",
 "file_admin" => "Admin Fichier",
 "add_file" => "Ajouter fichier",
 "files" => "Fichiers",
 "file_choose" => "Fichier à télécharger:",
 "upload" => "Téléchargement",
 "max_file_sprt" => "un fichier à télécharger doit être plus petit que %s kilo-octets.",
 "file_submit" => "Fichier Télécharger ",
 "no_upload" => "Aucun fichier n'a été téléchargé. Merci de revenir en arrière et de renouveller.",
 "file_too_big_sprt" => "La taille maximun téléchargeable est de %s octets. Votre téléchargement est trop important et a été annulé.",
 "del_file_javascript_sprt" => "Veuillez confirmer la destruction du fichier %s ?",


 //forum
 "orig_message" => "Message originel:",
 "post" => "Contribution!",
 "message" => "Message:",
 "post_reply_sprt" => "Répondre à une contribution de '%s' à propos de '%s'",
 "post_message_sprt" => "Répondre à la contribution à: '%s'",
 "reply" => "Répondre",
 "new_post" => "Nouvelle contribution",
 "public_user_forum" => "Forum public",
 "private_forum_sprt" => "Forum privé pour le groupe '%s' ",
 "forum_submit" => "Soumettre au forum",
 "no_message" => "Pas de message! Merci de revenir en arrière et d'essayer à nouveau",
 "add_reply" => "Ajouter une réponse",

 //includes
 "report" => "Rapport",
 "warning" => "<H1>Désolé!</H1><P>Nous sommes incapable de procéder à votre requete actuellement. Merci de réessayez plus tard.</P>",
 "home_page" => "Page Principale",
 "summary_page" => "Sommaire",
 "todo_list" => "Liste à-faire",
 "calendar" => "Calendrier",
 "log_out" => "Déconnextion",
 "main_menu" => "Menu Principal",
 "user_homepage_sprt" => "%s : page principale",
 "load_time_sprt" => "Cette page a été chargée en %.3f secondes.  Sur ces %.3f secondes ont été utilisé pour exécuter %d transactions dans la base de données",
 "security_manager" => "Gestion Securité",
 "no_key_sprt" => "Pas de session valide. Merci de vous connecter <A href=\"%sindex.php\">Profil</A>",
 "no_session" => "Pas de session, merci de vous <A href=\"%sindex.php\">connecter</A>",
 "session_timeout_sprt" => "Accés refusé, la dernière action a été faite il y à %d minutes et la session s'est fermée après 60 minutes, merci de vous  <A href=\"%sindex.php\">re-connecter</A>",
 "ip_spoof_sprt" =>"Usurpation d'adresse IP détectée depuis votre adresse IP (%s) cette session a été éffacée par précaution, merci de vous <A href=\"%sindex.php\">re-connecter</A>",
 "access_denied" => "Accès refusé",
 "private_usergroup" => "Désolé, cette zone est privée et elle est réservée à un groupe d'utilisateurst.Vvous n'y avez pas accès..",
 "invalid_date" => "Date invalide",
 "invalid_date_sprt" => "La date du %s n'est pas une date correcte du calendrier (Merci de vérifier le nombre de jour dans le mois). Merci de revenir en arrière et d'entrer une date valide.",


 //taskgroups
 "taskgroup_name" => "Groupe de taches:",
 "taskgroup_description" => "Description du groupe de taches:",
 "add_taskgroup" => "Ajouter à groupe de taches",
 "add_new_taskgroup" => "Ajouter un nouveau groupe de taches",
 "edit_taskgroup" => "Editer un groupe de taches",
 "taskgroup_manage" => "Gestion des groupes de taches",
 "no_taskgroups" => "Pas de groupe de taches défini",
 "manage_taskgroups" => "Gestion Groupe de taches",
 "taskgroups" => "Groupes de taches",
 "taskgroup_dup_sprt" => "Le groupe de taches '%s' existe déjà. Merci d'utiliser un autre nom.",
 "info_taskgroup_manage" => "Gestion des informations pour le groupe de taches",

 //usergroups
 "usergroup_name" => "Nom du groupe d'utilisateurs:",
 "usergroup_description" => "Description du groupe d'utilisateurs:",
 "members" => "Membres:",
 "add_usergroup" => "Ajouter au groupe d'utilisateurs",
 "add_new_usergroup" => "Ajouter un nouveau groupe d'utilisateurs",
 "edit_usergroup" => "Editer un groupe d'utilisateurs",
 "usergroup_manage" => "Gestion des groupes d'utilisateurs",
 "no_usergroups" => "Pas de groupe d'utilisateurs défini",
 "manage_usergroups" => "Gestion des groupes d'utilisateurs",
 "usergroups" => "Groupes d'utilisateurs",
 "usergroup_dup_sprt" => "Le groupe d'utilisateurs '%s' existe déjà. Merci d'utiliser un autre nom.",
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
 "no_deleted_users" => "Il n'y aucun utilisateurs effacés.",
 "revive" => "Réactiver",
 "permdel" => "Effacer permament",
 "permdel_javascript_sprt" => "Ceci va effacer de manière permanente toutes les informations sur un utilisateur et ses taches associées pour %s. Voulez vous réellement le faire?",
 "add_user" => "Ajouter un utilisateur",
 "edit_user" => "Editer un utilisateur",
 "no_users" => "Aucun utilisateurs connus sur ce système",
 "users" => "Utilisateurs",
 "existing_users" => "Utilisateurs existants",
 "who_online" => "Qui est connecté?",
 "edit_details" => "Editer les informations d'un utilisateurs",
 "show_details" => "Afficher les informations d'un utilisateurs",
 "user_deleted" => "Cet utilisateur a été effacé!",
 "no_usergroup" => "Cet utilisateur n'est membre d'aucun groupe",
 "not_usergroup"=> "(Membre d'aucun groupe d'utilisateurs)",
 "no_password_change" => "(Votre mot de passe actuel n'a pas été changé)",
 "last_time_here" => "Dernier venue:",
 "number_items_created" => "Nombre d'éléments créés:",
 "number_projects_owned" => "Nombre de projet dont il est propriétaire:",
 "number_tasks_owned" => "Nombre de taches dont il est propriétaire:",
 "number_tasks_completed" => "Nombre de taches finies:",
 "number_forum" => "Nombre de contributions:",
 "number_files" => "Nombre de fichiers téléchargés:",
 "size_all_files" => "Taille totale des fichiers dont il est propriétaire:",
 "owned_tasks" => "taches à sa charge:",
 "invalid_email" => "Adresse email invalide",
 "invalid_email_given_sprt" => "Cette adresse email '%s' est invalide. Merci de revenir en arrière et d'essayer à nouveau.",
 "duplicate_user" => "utilisateur dupliqué",
 "duplicate_change_user_sprt" => "Cet utilisateur '%s' existe déjà.  Merci de changer son nom.",
 "value_missing" => "Information manquante",
 "field_sprt" => "Le champ de '%s' est manquant. Merci de revenir en arrière et de le renseigner.",
 "admin_priv" => "NOTE: Vous avez été promus administrateur.",
 "manage_users" => "Gestion des utilisateurs",
 "users_online" => "utilisateurs connectés",
 "online" => "Utilisateurs connecté (session activée depuis moins de 60 mins maintenant)",
 "not_online" => "Les autres",
 "user_activity" => "Activité utilisateur",

  //tasks
 "add_new_task" => "Ajouter une nouvelle tache",
 "priority" => "Priorité",
 "parent_task" => "Tache parente",
 "creation_time" => "Date de création",
 "project_name" => "Nom du projet",
 "task_name" => "Nom de la tache",
 "deadline" => "Date de fin",
 "taken_from_parent" => "(Prit depuis le parent)",
 "status" => "Status",
 "task_owner" => "Propriétaire tache",
 "project_owner" => "Propriétaire projet",
 "taskgroup" => "Groupe taches",
 "usergroup" => "Groupe utilisateurs",
 "nobody" => "Personne",
 "none" => "Vide",
 "no_group" => "Aucun groupe",
 "all_groups" => "tout les  groupes",
 "all_users" => "Tous les utilisateurs peuvent voir cette tache ?",
 "group_edit" => "Tout utilisateur du groupe peut éditer ?",
 "project_description" => "Description du projet",
 "task_description" => "Description de la tache",
 "email_owner" => "Envoyer un email au propriétaire avec les modifications ?",
 "email_new_owner" => "Envoyer un email au (nouveau) propriétaire avec les modifications ?",
 "email_group" => "Envoyer un email au groupe d'utilisateurs avec les modifications ?",
 "add_new_project" =>"Ajouter un nouveau projet",
 "uncategorised" => "déclassé",
 "due_sprt" => "%d jours passé",
 "tomorrow" => "Demain",
 "due_today" => "Pour aujourd'hui",
 "overdue_1" => "1 jours de retard",
 "overdue_sprt" => "%d jours de retard",
 "edit_task" => "Editer la tache",
 "edit_project" => "Editer le projet",
 "del_javascript_sprt" => "Ceci va détruire %s %s. Etes vous sûr?",
 "add_task" => "Ajout tache",
 "add_subtask" => "Ajout sous tache",
 "add_project" => "Ajout projet",
 "no_edit" => "Vous n'êtes pas propriétaire de cet élément vous n'avez pas à l'éditer. Demandez à l'administrateur, ou au propriétaire de ces taches de le faire pour vous.",
 "uncategorised" => "Déclassé",
 "admin" => "Admin",
 "global" => "Global",
 "options" => " options",
 "task_navigation" => "Navigation taches",
 "no_projects" => "Pas de projet à afficher",
 "ccompleted" => "Fini",
 "project_hold" => "Projet sous controle de ",
 "project_planned" => "Projet Planifié",
 "percent" => "% des taches effectuées",
 "project_no_deadline" => "Pas de date de fin pour ce projet",
 "no_allowed_projects" => "Aucun projet que vous ête autorisé d'afficher",
 "projects" => "Projets",
 "percent_project_sprt" => "Ce projet est %d%% fini",
 "owned_by" => "Propriété de ",
 "created_on" => "Créer le",
 "completed_on" => "Fini le",
 "modified_on" => "Modifié le",
 "project_on_hold" => "Projet est en cours",
 "task_accessible_sprt" => "(Ceci %s est publiquement accessible à tous les utilisateurs)",
 "task_not_accessible_sprt" => "(Ceci %s est seulement accessible aux membres du groupe d'utilisateurs)",
 "task_not_in_usergroup_sprt" => "Ceci %s n'est pas accessible au groupe d'utilisateurs mais est accessible à tous les utilisateurs.",
 "usergroup_can_edit_sprt" => "Ceci %s peut aussi être éditer par les membres du groupe d'utilisateurs.",
 "i_take_it" => "Je prends",
 "i_finished" => "J'ai finis avec!",
 "i_dont_want" => "Je n'en veux plus",
 "take_over_sprt" => "Je prends %s",
 "task_info" => "Information Tache ",
 "project_details" => "Détails projet",
 "todo_list_for" => "Liste à-faire pour le : ",
 "due_in_sprt" => " (à faire dans %d jours)",
 "due_tomorrow" => " (à faire pour demain)",
 "no_assigned" => "Il n'y aucune tache en cours confiée à cet utilisateur.",
 "todo_list" => "Liste à-faire",
 "summary_list" => "Sommaire",
 "task_submit" => "Modifier tache",
 "not_owner" => "Accès refusé, sot vous n'en êtes pas le propriétaire soit vous n'avez pas de droit dessus",
 "missing_values" => "il manque des champs d'informations à fournir, merci de revenir en arrière et d'essayer de nouveau",
 "future" => "Futur",
 "flags" => "Drapeaux",
 "owner" => "Propriétaire",
 "usergroupid" => "IDGroupe",
 "taskgroupid" => "IDGroupeTache",
 "group" => "Groupe",
 "by_usergroup" => " (par groupe d'utilisateurs)",
 "by_taskgroup" => " (par groupe de taches)",


//bits 'n' pieces
  "calendar" => "Calendrier" );

?>
