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
 "planned" => "Plannifi&eacute; (d&eacute;sactiv&eacute;)",
 "active" => "Actif (en cours)",
 "cantcomplete" => "Suspendue",
 "completed" => "Finie",
 "done" => "Fait",
 "task_planned" => " Plannifi&eacute;e",
 "task_active" => " Active",
 //project states
 "planned_project" => "Projet plannifi&eacute; (d&eacute;sactivi&eacute;)",
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
 "continue" => "Continue",
//**
 "reset" => "Reset",
 "manage" => "G&eacute;rer",
 "edit" => "Editer",
 "delete" => "Effacer",
 "del" => "Eff",
 "confirm_del" => "Confirmer effacer!",
 "yes" => "Oui",
 "no" => "Non",
 "action" => "Action",
 "task" => "Tache",
 "task_lc" => "tache",
 "tasks" => "Taches",
 "project" => "Projet",
 "project_lc" => "projet",
 "info" => "Info",
 "bytes" => " octes",
 "select_instruct" => "(Utilisation de CTRL pour plusieurs s&eacute;lections ou aucune s&eacute;lection)",
 "member_groups" => "L'utilisateur est membre du groupe indiqu&eacute; en bas (s'il y en a un)",
 "login" => "Utilisateur",
 "error" => "Erreur",
 "no_login" => "Acces refus&eacute;, utilisateur ou mot de passe incorrect",
 "please_login" => "Merci de vous connecter",
 
//admin config
 "admin_config" => "Config Admin",
 "email_settings" => "Param&egrave;tre ent&ecirc;te Email",
 "admin_email" => "Admin email",
 "email_reply" => "Email 'r&eacute;pondre &agrave;'",
 "email_from" => "Email 'de'",
 "mailing_list" => "Liste de diffusion",
 "default_checkbox" => "Valeur par d&eacute;faut pour les Projets/Taches",
 "allow_globalaccess" => "Autoris&eacute; un acc&egrave;s global ?",
 "allow_group_edit" => "Autorise tous les groupe d'utilisateurs &agrave; &eacute;diter ?",
 "set_email_owner" => "Toujours signifier par email au propri&eacute;taire une modification ?",
 "set_email_group" => "Tojours signifier par email au groupes d'utilisateurs une modification ?",
 "configuration" => "Configuration",


//contacts
 "firstname" => "Pr&eacute;nom:",
 "lastname" => "Nom:",
 "company" => "Entreprise:",
 "home_phone" => "T&eacute;l&eacute;phone personnel:",
 "mobile" => "Mobile:",
 "fax" => "Fax:",
 "bus_phone" => "T&eacute;l&eacute;phone professionnel:",
 "address" => "Adresse:",
 "postal" => "Code Postal:",
 "city" => "Ville:",
 "email" => "Email:",
 "notes" => "Notes:",
 "add_contact" => "Ajouter contact",
 "del_contact" => "Effacer contact",
 //"del_javascript" => "Cele va effacer un contact. Vous confirmez ?",
 "contact_info" => "Contact information",
 "contacts" => "Contacts",
 "contact_add_info" => "Si vous indiquez le nom d'une entreprise cette information va &ecirc;tre affich&eacute;e &agrave; la place du nom du contact.",
 "show_contact" => "Afficher contacts",
 "edit_contact" => "Editer contacts",
 "contact_submit" => "Modifier contact",
 "contact_warn" => "il manque des informations pour ajouter ce contact merci de revenir en arri&egrave;re et de renseigner au moins le pr&eacute;nom et le nom",

 //files
 "manage_files" => "Gestion des fichiers",
 "no_files" => "Aucun fichiers t&eacute;l&eacute;charg&eacute;s &agrave; g&eacute;rer",
//**
 "no_file_uploads" => "The server configuration for this site does not allow file uploads to be made",
 "file" => "Fichier:",
 "uploader" => "T&eacute;l&eacute;charger:",
 "files_assoc_sprt" => "Fichiers associ&eacute;s avec %s",
 "file_admin" => "Admin Fichier",
 "add_file" => "Ajouter fichier",
 "files" => "Fichiers",
 "file_choose" => "Fichier &agrave; t&eacute;l&eacute;charger:",
 "upload" => "T&eacute;l&eacute;chargement",
 "max_file_sprt" => "un fichier &agrave; t&eacute;l&eacute;charger doit &ecirc;tre plus petit que %s kilo-octets.",
 "file_submit" => "Fichier T&eacute;l&eacute;charger ",
 "no_upload" => "Aucun fichier n'a &eacute;t&eacute; t&eacute;l&eacute;charg&eacute;. Merci de revenir en arri&egrave;re et de renouveller.",
 "file_too_big_sprt" => "La taille maximun t&eacute;l&eacute;chargeable est de %s octets. Votre t&eacute;l&eacute;chargement est trop important et a &eacute;t&eacute; annul&eacute;.",
 "del_file_javascript_sprt" => "Veuillez confirmer la destruction du fichier %s ?",


 //forum
 "orig_message" => "Message originel:",
 "post" => "Contribution!",
 "message" => "Message:",
 "post_reply_sprt" => "R&eacute;pondre &agrave; une contribution de '%s' &agrave; propos de '%s'",
 "post_message_sprt" => "R&eacute;pondre &agrave; la contribution &agrave;: '%s'",
 "reply" => "R&eacute;pondre",
 "new_post" => "Nouvelle contribution",
 "public_user_forum" => "Forum public",
 "private_forum_sprt" => "Forum priv&eacute; pour le groupe '%s' ",
 "forum_submit" => "Soumettre au forum",
 "no_message" => "Pas de message! Merci de revenir en arri&egrave;re et d'essayer &agrave; nouveau",
 "add_reply" => "Ajouter une r&eacute;ponse",

 //includes
 "report" => "Rapport",
 "warning" => "<h1>D&eacute;sol&eacute;!</h1><p>Nous sommes incapable de proc&eacute;der &agrave; votre requete actuellement. Merci de r&eacute;essayez plus tard.</p>",
 "home_page" => "Page Principale",
 "summary_page" => "Sommaire",
 "todo_list" => "Liste &agrave;-faire",
 "calendar" => "Calendrier",
 "log_out" => "D&eacute;connextion",
 "main_menu" => "Menu Principal",
 "user_homepage_sprt" => "%s : page principale",
 "load_time_sprt" => "Cette page a &eacute;t&eacute; charg&eacute;e en %.3f secondes.  Sur ces %.3f secondes ont &eacute;t&eacute; utilis&eacute; pour ex&eacute;cuter %d transactions dans la base de donn&eacute;es",
 "security_manager" => "Gestion Securit&eacute;",
 "no_key_sprt" => "Pas de session valide. Merci de vous connecter <A href=\"%sindex.php\">Profil</A>",
 "no_session" => "Pas de session, merci de vous <A href=\"%sindex.php\">connecter</A>",
 "session_timeout_sprt" => "Acc&eacute;s refus&eacute;, la derni&egrave;re action a &eacute;t&eacute; faite il y &agrave; %d minutes et la session s'est ferm&eacute;e apr&egrave;s 60 minutes, merci de vous  <A href=\"%sindex.php\">re-connecter</A>",
 //"ip_spoof_sprt" =>"Usurpation d'adresse IP d&eacute;tect&eacute;e depuis votre adresse IP (%s) cette session a &eacute;t&eacute; &eacute;ffac&eacute;e par pr&eacute;caution, merci de vous <A href=\"%sindex.php\">re-connecter</A>",
 "access_denied" => "Acc&egrave;s refus&eacute;",
 "private_usergroup" => "D&eacute;sol&eacute;, cette zone est priv&eacute;e et elle est r&eacute;serv&eacute;e &agrave; un groupe d'utilisateurst.Vvous n'y avez pas acc&egrave;s..",
 "invalid_date" => "Date invalide",
 "invalid_date_sprt" => "La date du %s n'est pas une date correcte du calendrier (Merci de v&eacute;rifier le nombre de jour dans le mois). Merci de revenir en arri&egrave;re et d'entrer une date valide.",


 //taskgroups
 "taskgroup_name" => "Groupe de taches:",
 "taskgroup_description" => "Description du groupe de taches:",
 "add_taskgroup" => "Ajouter &agrave; groupe de taches",
 "add_new_taskgroup" => "Ajouter un nouveau groupe de taches",
 "edit_taskgroup" => "Editer un groupe de taches",
 "taskgroup_manage" => "Gestion des groupes de taches",
 "no_taskgroups" => "Pas de groupe de taches d&eacute;fini",
 "manage_taskgroups" => "Gestion Groupe de taches",
 "taskgroups" => "Groupes de taches",
 "taskgroup_dup_sprt" => "Le groupe de taches '%s' existe d&eacute;j&agrave;. Merci d'utiliser un autre nom.",
 "info_taskgroup_manage" => "Gestion des informations pour le groupe de taches",

 //usergroups
 "usergroup_name" => "Nom du groupe d'utilisateurs:",
 "usergroup_description" => "Description du groupe d'utilisateurs:",
 "members" => "Membres:",
 "add_usergroup" => "Ajouter au groupe d'utilisateurs",
 "add_new_usergroup" => "Ajouter un nouveau groupe d'utilisateurs",
 "edit_usergroup" => "Editer un groupe d'utilisateurs",
 "usergroup_manage" => "Gestion des groupes d'utilisateurs",
 "no_usergroups" => "Pas de groupe d'utilisateurs d&eacute;fini",
 "manage_usergroups" => "Gestion des groupes d'utilisateurs",
 "usergroups" => "Groupes d'utilisateurs",
 "usergroup_dup_sprt" => "Le groupe d'utilisateurs '%s' existe d&eacute;j&agrave;. Merci d'utiliser un autre nom.",
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
 "no_deleted_users" => "Il n'y aucun utilisateurs effac&eacute;s.",
 "revive" => "R&eacute;activer",
 "permdel" => "Effacer permament",
 "permdel_javascript_sprt" => "Ceci va effacer de mani&egrave;re permanente toutes les informations sur un utilisateur et ses taches associ&eacute;es pour %s. Voulez vous r&eacute;ellement le faire?",
 "add_user" => "Ajouter un utilisateur",
 "edit_user" => "Editer un utilisateur",
 "no_users" => "Aucun utilisateurs connus sur ce syst&egrave;me",
 "users" => "Utilisateurs",
 "existing_users" => "Utilisateurs existants",
//**
 "email_users" => "Email users",
//**
 "select_usergroup" => "Usergroup selected from below:",
//**
 "subject" => "Subject:",
//**
 "message_sent_maillist" => "For all selections the message is also sent to the mailing list.",
 "who_online" => "Qui est connect&eacute;?",
 "edit_details" => "Editer les informations d'un utilisateurs",
 "show_details" => "Afficher les informations d'un utilisateurs",
 "user_deleted" => "Cet utilisateur a &eacute;t&eacute; effac&eacute;!",
 "no_usergroup" => "Cet utilisateur n'est membre d'aucun groupe",
 "not_usergroup"=> "(Membre d'aucun groupe d'utilisateurs)",
 "no_password_change" => "(Votre mot de passe actuel n'a pas &eacute;t&eacute; chang&eacute;)",
 "last_time_here" => "Dernier venue:",
 "number_items_created" => "Nombre d'&eacute;l&eacute;ments cr&eacute;&eacute;s:",
 "number_projects_owned" => "Nombre de projet dont il est propri&eacute;taire:",
 "number_tasks_owned" => "Nombre de taches dont il est propri&eacute;taire:",
 "number_tasks_completed" => "Nombre de taches finies:",
 "number_forum" => "Nombre de contributions:",
 "number_files" => "Nombre de fichiers t&eacute;l&eacute;charg&eacute;s:",
 "size_all_files" => "Taille totale des fichiers dont il est propri&eacute;taire:",
 "owned_tasks" => "taches &agrave; sa charge:",
 "invalid_email" => "Adresse email invalide",
 "invalid_email_given_sprt" => "Cette adresse email '%s' est invalide. Merci de revenir en arri&egrave;re et d'essayer &agrave; nouveau.",
 "duplicate_user" => "utilisateur dupliqu&eacute;",
 "duplicate_change_user_sprt" => "Cet utilisateur '%s' existe d&eacute;j&agrave;.  Merci de changer son nom.",
 "value_missing" => "Information manquante",
 "field_sprt" => "Le champ de '%s' est manquant. Merci de revenir en arri&egrave;re et de le renseigner.",
 "admin_priv" => "NOTE: Vous avez &eacute;t&eacute; promus administrateur.",
 "manage_users" => "Gestion des utilisateurs",
 "users_online" => "utilisateurs connect&eacute;s",
 "online" => "Utilisateurs connect&eacute; (session activ&eacute;e depuis moins de 60 mins maintenant)",
 "not_online" => "Les autres",
 "user_activity" => "Activit&eacute; utilisateur",

  //tasks
 "add_new_task" => "Ajouter une nouvelle tache",
 "priority" => "Priorit&eacute;",
 "parent_task" => "Tache parente",
 "creation_time" => "Date de cr&eacute;ation",
 //**
 "by" => " by ", //Note to translators: context is 'Creation time: <date> by <user>'
 "project_name" => "Nom du projet",
 "task_name" => "Nom de la tache",
 "deadline" => "Date de fin",
 "taken_from_parent" => "(Prit depuis le parent)",
 "status" => "Status",
 "task_owner" => "Propri&eacute;taire tache",
 "project_owner" => "Propri&eacute;taire projet",
 "taskgroup" => "Groupe taches",
 "usergroup" => "Groupe utilisateurs",
 "nobody" => "Personne",
 "none" => "Vide",
 "no_group" => "Aucun groupe",
 "all_groups" => "tout les  groupes",
 //**
 "all_users" => "All users",
 "all_users_view" => "Tous les utilisateurs peuvent voir cette tache ?",
 "group_edit" => "Tout utilisateur du groupe peut &eacute;diter ?",
 "project_description" => "Description du projet",
 "task_description" => "Description de la tache",
 "email_owner" => "Envoyer un email au propri&eacute;taire avec les modifications ?",
 "email_new_owner" => "Envoyer un email au (nouveau) propri&eacute;taire avec les modifications ?",
 "email_group" => "Envoyer un email au groupe d'utilisateurs avec les modifications ?",
 "add_new_project" =>"Ajouter un nouveau projet",
 "uncategorised" => "d&eacute;class&eacute;",
 "due_sprt" => "%d jours pass&eacute;",
 "tomorrow" => "Demain",
 "due_today" => "Pour aujourd'hui",
 "overdue_1" => "1 jours de retard",
 "overdue_sprt" => "%d jours de retard",
 "edit_task" => "Editer la tache",
 "edit_project" => "Editer le projet",
 //**
 "no_reparent" => "None (a top-level project)",
 "del_javascript_sprt" => "Ceci va d&eacute;truire %s %s. Etes vous sûr?",
 "add_task" => "Ajout tache",
 "add_subtask" => "Ajout sous tache",
 "add_project" => "Ajout projet",
 "no_edit" => "Vous n'&ecirc;tes pas propri&eacute;taire de cet &eacute;l&eacute;ment vous n'avez pas &agrave; l'&eacute;diter. Demandez &agrave; l'administrateur, ou au propri&eacute;taire de ces taches de le faire pour vous.",
 "uncategorised" => "D&eacute;class&eacute;",
 "admin" => "Admin",
 "global" => "Global",
 //"options" => " options",
 //**
 "delete_project" => "Delete project",
 //**
 "delete_task" => "Delete task",
 //**
 "project_options" => "Project options",
 //**
 "task_options" => "Task options",
 "task_navigation" => "Navigation taches",
 "no_projects" => "Pas de projet &agrave; afficher",
 "completed" => "Fini",
 "project_hold" => "Projet sous controle de ",
 "project_planned" => "Projet Planifi&eacute;",
 "percent" => "% des taches effectu&eacute;es",
 "project_no_deadline" => "Pas de date de fin pour ce projet",
 "no_allowed_projects" => "Aucun projet que vous &ecirc;te autoris&eacute; d'afficher",
 "projects" => "Projets",
 "percent_project_sprt" => "Ce projet est %d%% fini",
 "owned_by" => "Propri&eacute;t&eacute; de ",
 "created_on" => "Cr&eacute;er le",
 "completed_on" => "Fini le",
 "modified_on" => "Modifi&eacute; le",
 "project_on_hold" => "Projet est en cours",
 "task_accessible_sprt" => "(Ceci %s est publiquement accessible &agrave; tous les utilisateurs)",
 "task_not_accessible_sprt" => "(Ceci %s est seulement accessible aux membres du groupe d'utilisateurs)",
 "task_not_in_usergroup_sprt" => "Ceci %s n'est pas accessible au groupe d'utilisateurs mais est accessible &agrave; tous les utilisateurs.",
 "usergroup_can_edit_sprt" => "Ceci %s peut aussi &ecirc;tre &eacute;diter par les membres du groupe d'utilisateurs.",
 "i_take_it" => "Je prends",
 "i_finished" => "J'ai finis avec!",
 "i_dont_want" => "Je n'en veux plus",
 "take_over_sprt" => "Je prends %s",
 "task_info" => "Information Tache ",
 "project_details" => "D&eacute;tails projet",
 "todo_list_for" => "Liste &agrave;-faire pour le : ",
 "due_in_sprt" => " (&agrave; faire dans %d jours)",
 "due_tomorrow" => " (&agrave; faire pour demain)",
 "no_assigned" => "Il n'y aucune tache en cours confi&eacute;e &agrave; cet utilisateur.",
 "todo_list" => "Liste &agrave;-faire",
 "summary_list" => "Sommaire",
 "task_submit" => "Modifier tache",
 "not_owner" => "Acc&egrave;s refus&eacute;, sot vous n'en &ecirc;tes pas le propri&eacute;taire soit vous n'avez pas de droit dessus",
 "missing_values" => "il manque des champs d'informations &agrave; fournir, merci de revenir en arri&egrave;re et d'essayer de nouveau",
 "future" => "Futur",
 "flags" => "Drapeaux",
 "owner" => "Propri&eacute;taire",
 "usergroupid" => "IDGroupe",
 "taskgroupid" => "IDGroupeTache",
 "group" => "Groupe",
 "by_usergroup" => " (par groupe d'utilisateurs)",
 "by_taskgroup" => " (par groupe de taches)",


//bits 'n' pieces
  "calendar" => "Calendrier"

   );

?>
