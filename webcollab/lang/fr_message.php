<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

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

  Translation: Olivier Chaussavoine

  Maintainer:

*/

//required language encodings
$web_charset = "iso-8859-1";
$email_charset = "iso-8859-1";

//dates
$month_array = array ( NULL, "Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Jul", "Aou", "Sep", "Oct", "Nov", "Dec" );
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
 "completed" => "Termin&eacute;",
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
 "continue" => "Continue",
 "reset" => "Reset",
 "manage" => "G&eacute;rer",
 "edit" => "Editer",
 "delete" => "Effacer",
 "del" => "Eff",
 "confirm_del_javascript" => "Confirmer l\'effacement!",
 "yes" => "Oui",
 "no" => "Non",
 "action" => "Action",
 "task" => "T&acirc;che",
 "tasks" => "T&acirc;ches",
 "project" => "Projet",
 "info" => "Info",
 "bytes" => " octets",
 "select_instruct" => "(Utilisation de CTRL pour plusieurs s&eacute;lections ou aucune s&eacute;lection)",
 "member_groups" => "L'utilisateur est membre du groupe indiqu&eacute; en bas (s'il y en a un)",
 "login" => "Utilisateur",
 "error" => "Erreur",
 "no_login" => "Acc&egrave;s refus&eacute;, utilisateur ou mot de passe incorrect",
 "please_login" => "Merci de vous connecter",

 //graphic items
 "late_g" => "&nbsp;LATE&nbsp;",
 "new_g" => "&nbsp;NEW&nbsp;",
 "updated_g" => "&nbsp;UPDATED&nbsp;",

//admin config
 "admin_config" => "Config Admin",
 "email_settings" => "Param&egrave;tre ent&ecirc;te Email",
 "admin_email" => "Admin email",
 "email_reply" => "Email 'r&eacute;pondre &agrave;'",
 "email_from" => "Email 'de'",
 "mailing_list" => "Liste de diffusion",
 "default_checkbox" => "Valeur par d&eacute;faut pour les Projets/T&acirc;ches",
 "allow_globalaccess" => "Autoriser un acc&egrave;s global ?",
 "allow_group_edit" => "Autoriser l'&eacute;dition pour tous les groupes d'utilisateurs?",
 "set_email_owner" => "Toujours informer le propri&eacute;taire par mail des modifications?",
 "set_email_group" => "Toujours informer par email les groupes d'utilisateurs des modifications?",
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
 "contact_warn" => "il manque des informations pour ajouter ce contact. Merci de revenir en arri&egrave;re et de renseigner au moins le pr&eacute;nom et le nom",

 //files
 "manage_files" => "Gestion des fichiers",
 "no_files" => "Aucun fichiers t&eacute;l&eacute;charg&eacute;s &agrave; g&eacute;rer",
 "no_file_uploads" => "La configuration du serveur de ce site n'autorise pas les t&eacute;l&eacute;chargements.",
 "file" => "Fichier:",
 "uploader" => "T&eacute;l&eacute;charger:",
 "files_assoc_project" => "Fichiers associ&eacute;s au projet",
 "files_assoc_task" => "Fichiers associ&eacute;s &agrave; la t&acirc;che",
 "file_admin" => "Admin Fichier",
 "add_file" => "Ajouter fichier",
 "files" => "Fichiers",
 "file_choose" => "Fichier &agrave; t&eacute;l&eacute;charger:",
 "upload" => "T&eacute;l&eacute;chargement",
  //**
 "file_email_owner" => "Email notification of new file to the owner?",
 //**
 "file_email_usergroup" => "Email notification of new file to the usergroup?",
 "max_file_sprt" => "un fichier &agrave; t&eacute;l&eacute;charger doit faire moins de %1\$s kilo-octets.",
 "file_submit" => "Fichier T&eacute;l&eacute;charger ",
 "no_upload" => "Aucun fichier n'a &eacute;t&eacute; t&eacute;l&eacute;charg&eacute;. Merci de revenir en arri&egrave;re et de renouveller.",
 "file_too_big_sprt" => "La taille maximale t&eacute;l&eacute;chargeable est de %1\$s octets. Votre t&eacute;l&eacute;chargement est trop important et a &eacute;t&eacute; annul&eacute;.",
 "del_file_javascript_sprt" => "Veuillez confirmer la destruction du fichier %1\$s ?",


 //forum
 "orig_message" => "Message d'origine:",
 "post" => "Contribution!",
 "message" => "Message:",
 "post_reply_sprt" => "R&eacute;pondre &agrave; une contribution de '%s' &agrave; propos de '%s'",
 "post_message_sprt" => "R&eacute;pondre &agrave; la contribution &agrave;: '%s'",
  //**
 "forum_email_owner" => "Email forum message to the owner?",
 //**
 "forum_email_usergroup" => "Email forum message to the usergroup?",
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
 "log_out" => "D&eacute;connection",
 "main_menu" => "Menu Principal",
 "user_homepage_sprt" => "%1\$s : page principale",
 //"load_time_sprt" => "Cette page a &eacute;t&eacute; charg&eacute;e en %1\$.3f secondes.  Sur ce temps, %2\$.3f secondes ont &eacute;t&eacute; utilis&eacute; pour ex&eacute;cuter %3\$d transactions dans la base de donn&eacute;es",
 //**
 "missing_field_javascript" => "Please enter a value for the missing field",
 //**
 "invalid_date_javascript" => "Please choose a valid calendar date",
 //**
 "finish_date_javascript" => "The entered date occurs after the project finish date!",
"security_manager" => "Gestion Securit&eacute;",
 //"no_key_sprt" => "Pas de session valide. Merci de vous connecter <a href=\"%sindex.php\">Profil</a>",
 //"no_session" => "Pas de session, merci de vous <a href=\"%sindex.php\">connecter</a>",
 "session_timeout_sprt" => "Acc&eacute;s refus&eacute;, la derni&egrave;re action a &eacute;t&eacute; faite il y &agrave; %1\$d minutes et la session s'est ferm&eacute;e apr&egrave;s %2\$d minutes, merci de vous  <a href=\"%sindex.php\">re-connecter</a>",
 "access_denied" => "Acc&egrave;s refus&eacute;",
 "private_usergroup" => "D&eacute;sol&eacute;, cette zone est priv&eacute;e et elle est r&eacute;serv&eacute;e &agrave; un groupe d'utilisateurs. Vous n'y avez pas acc&egrave;s.",
 "invalid_date" => "Date invalide",
 "invalid_date_sprt" => "La date du %1\$s n'est pas une date correcte du calendrier (Merci de v&eacute;rifier le nombre de jour dans le mois). Merci de revenir en arri&egrave;re et d'entrer une date valide.",


 //taskgroups
 "taskgroup_name" => "Groupe de taches:",
 "taskgroup_description" => "Description du groupe de t&acirc;ches:",
 "add_taskgroup" => "Ajouter au groupe de t&acirc;ches",
 "add_new_taskgroup" => "Ajouter un nouveau groupe de t&acirc;ches",
 "edit_taskgroup" => "Editer un groupe de t&acirc;ches",
 "taskgroup_manage" => "Gestion des groupes de t&acirc;ches",
 "no_taskgroups" => "Pas de groupe de t&acirc;ches d&eacute;fini",
 "manage_taskgroups" => "Gestion Groupe de t&acirc;ches",
 "taskgroups" => "Groupes de t&acirc;ches",
 "taskgroup_dup_sprt" => "Le groupe de t&acirc;ches '%s' existe d&eacute;j&agrave;. Merci d'utiliser un autre nom.",
 "info_taskgroup_manage" => "Gestion des informations pour le groupe de t&acirc;ches",

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
 "blank_for_current_password" => "(Laisser vide ne modifie pas le mot de passe)",
 "email" => "E-mail",
 "admin" => "Admin",
 "is_admin" => "Est-il admin?",
 "user_info" => "Information utilisateur",
 "deleted_users" => "Effacer les utilisateurs",
 "no_deleted_users" => "Il n'y aucun utilisateurs effac&eacute;s.",
 "revive" => "R&eacute;activer",
 "permdel" => "Effacer permament",
 "permdel_javascript_sprt" => "Ceci va effacer de mani&egrave;re permanente toutes les informations sur un utilisateur et ses t&acirc;ches associ&eacute;es pour %1\$s. Voulez vous r&eacute;ellement le faire?",
 "add_user" => "Ajouter un utilisateur",
 "edit_user" => "Editer un utilisateur",
 "no_users" => "Aucun utilisateur connu sur ce syst&egrave;me",
 "users" => "Utilisateurs",
 "existing_users" => "Utilisateurs existants",
 "email_users" => "Email utilisateurs",
 "select_usergroup" => "Usergroup s&eacute;lectionn&eacute;s de la liste ci-dessous:",
 "subject" => "Sujet:",
 "message_sent_maillist" => "Dans tous les cas le message est aussi envoy&eacute; &agrave; la liste de diffusion.",
 "who_online" => "Qui est connect&eacute;?",
 "edit_details" => "Editer les informations d'un utilisateur",
 "show_details" => "Afficher les informations d'un utilisateur",
 "user_deleted" => "Cet utilisateur a &eacute;t&eacute; effac&eacute;!",
 "no_usergroup" => "Cet utilisateur n'est membre d'aucun groupe",
 "not_usergroup"=> "(Membre d'aucun groupe d'utilisateurs)",
 "no_password_change" => "(Votre mot de passe actuel n'a pas &eacute;t&eacute; chang&eacute;)",
 "last_time_here" => "Date de Derni&egrave;re venue:",
 "number_items_created" => "Nombre d'&eacute;l&eacute;ments cr&eacute;&eacute;s:",
 "number_projects_owned" => "Nombre de projet dont il est propri&eacute;taire:",
 "number_tasks_owned" => "Nombre de t&acirc;ches dont il est propri&eacute;taire:",
 "number_tasks_completed" => "Nombre de t&acirc;ches termin&eacute;es:",
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
 "admin_priv" => "NOTE: Vous avez &eacute;t&eacute; promu administrateur.",
 "manage_users" => "Gestion des utilisateurs",
 "users_online" => "utilisateurs connect&eacute;s",
 "online" => "Utilisateurs connect&eacute; (session activ&eacute;e depuis moins de 60 mins maintenant)",
 "not_online" => "Les autres",
 "user_activity" => "Activit&eacute; utilisateur",

  //tasks
 "add_new_task" => "Ajouter une nouvelle t&acirc;che",
 "priority" => "Priorit&eacute;",
 "parent_task" => "T&acirc;che parente",
 "creation_time" => "Date de cr&eacute;ation",
 "by_sprt" => " %1\$s par %2\$s", //Note to translators: context is 'Creation time: <date> by <user>'
 "project_name" => "Nom du projet",
 "task_name" => "Nom de la t&acirc;che",
 "deadline" => "Date de fin",
 "taken_from_parent" => "(Pris depuis le parent)",
 "status" => "Statut",
 "task_owner" => "Propri&eacute;taire t&acirc;che",
 "project_owner" => "Propri&eacute;taire projet",
 "taskgroup" => "Groupe t&acirc;ches",
 "usergroup" => "Groupe utilisateurs",
 "nobody" => "Personne",
 "none" => "Vide",
 "no_group" => "Aucun groupe",
 "all_groups" => "tout les groupes",
//**
 "all_users" => "Tous les utilisateurs",
 "all_users_view" => "Tous les utilisateurs peuvent-ils voir cette t&acirc;che ?",
 "group_edit" => "Tout utilisateur du groupe peut-il &eacute;diter ?",
 "project_description" => "Description du projet",
 "task_description" => "Description de la t&acirc;che",
 "email_owner" => "Envoyer un email au propri&eacute;taire avec les modifications ?",
 "email_new_owner" => "Envoyer un email au (nouveau) propri&eacute;taire avec les modifications ?",
 "email_group" => "Envoyer un email au groupe d'utilisateurs avec les modifications ?",
 "add_new_project" =>"Ajouter un nouveau projet",
 "uncategorised" => "Non class&eacute;",
 "due_sprt" => "reste %d jours",
 "tomorrow" => "Demain",
 "due_today" => "Pour aujourd'hui",
 "overdue_1" => "1 jours de retard",
 "overdue_sprt" => "%d jours de retard",
 "edit_task" => "Editer la t&acirc;che",
 "edit_project" => "Editer le projet",
 "no_reparent" => "Aucun (projet racine)",
 "del_javascript_project_sprt" => "Ceci va d&eacute;truire le projet %1\$s. Etes vous s&ucirc;r?",
 "del_javascript_task_sprt" => "Ceci va d&eacute;truire la t&acirc;che %1\$s. Etes vous s&ucirc;r?",
 "add_task" => "Ajout tache",
 "add_subtask" => "Ajout sous tache",
 "add_project" => "Ajout projet",
 //**
 "clone_project" => "Clone project",
 //**
 "clone_task" => "Clone task", 
 "no_edit" => "Vous n'&ecirc;tes pas propri&eacute;taire de cet &eacute;l&eacute;ment et vous ne pouvez pas l'&eacute;diter. Demandez &agrave; l'administrateur, ou au propri&eacute;taire de ces t&acirc;ches de le faire pour vous.",
 "uncategorised" => "Non class&eacute;",
 "admin" => "Admin",
 "global" => "Global",
 "delete_project" => "Detruire projet",
 "delete_task" => "Detruire t&acirc;che",
 "project_options" => "Options Projet",
 "task_options" => "Options t&acirc;che",
 "task_navigation" => "Navigation t&acirc;ches",
 "no_projects" => "Pas de projet &agrave; afficher",
 //**
 "show_all_projects" => "Show all projects",
 "show_active_projects" => "Show only active projects",
 "completed" => "Termin&eacute;",
 "project_hold_sprt" => "Projet sous controle de %s",
 "project_planned" => "Projet Planifi&eacute;",
 "percent_sprt" => "%d%% des t&acirc;ches effectu&eacute;es",
 "project_no_deadline" => "Pas de date de fin pour ce projet",
 "no_allowed_projects" => "Aucun projet que vous &ecirc;te autoris&eacute; d'afficher",
 "projects" => "Projets",
 "percent_project_sprt" => "Ce projet est accompli &agrave; %d%%",
 "owned_by" => "Propri&eacute;t&eacute; de ",
 "created_on" => "Cr&eacute;er le",
 "completed_on" => "Fini le",
 "modified_on" => "Modifi&eacute; le",
 "project_on_hold" => "Projet en cours",
 "project_accessible" => "(Ce projet est publiquement accessible &agrave; tous les utilisateurs)",
 "task_accessible" => "(Cette t&acirc;che est publiquement accessible &agrave; tous les utilisateurs)",
 "project_not_accessible" => "(Cette t&acirc;che est seulement accessible aux membres du groupe d'utilisateurs)",
 "task_not_accessible" => "(Ce projet est seulement accessible aux membres du groupe d'utilisateurs)",
 "project_not_in_usergroup" => "Ce projet n'est pas attach&eacute; &agrave; un groupe d'utilisateurs et est accessible &agrave; tous.",
 "task_not_in_usergroup" => "Cette t&acirc;che n'est pas attach&eacute;e &agrave; un groupe d'utilisateurs mais est accessible &agrave; tous.",
 "usergroup_can_edit_project" => "Ce projet peut aussi &ecirc;tre &eacute;dit&eacute; par les membres du groupe d'utilisateurs.",
 "usergroup_can_edit_task" => "Cette t&acirc;che peut aussi &ecirc;tre &eacute;dit&eacute;e par les membres du groupe d'utilisateurs.",
 "i_take_it" => "Je prends",
 "i_finished" => "J'ai finis avec!",
 "i_dont_want" => "Je n'en veux plus",
 "take_over_project" => "Je prends le projet",
 "take_over_task" => "Je prends la t&acirc;che",
 "task_info" => "Information t&acirc;che ",
 "project_details" => "D&eacute;tails projet",
 "todo_list_for" => "Liste &agrave;-faire pour le : ",
 "due_in_sprt" => " (&agrave; faire dans %d jours)",
 "due_tomorrow" => " (&agrave; faire pour demain)",
 "no_assigned" => "Il n'y aucune t&acirc;che en cours confi&eacute;e &agrave; cet utilisateur.",
 "todo_list" => "Liste &agrave;-faire",
 "summary_list" => "Sommaire",
 "task_submit" => "Modifier t&acirc;che",
 "not_owner" => "Acc&egrave;s refus&eacute;, soit vous n'en &ecirc;tes pas le propri&eacute;taire soit vous n'avez pas de droit dessus",
 "missing_values" => "il y a des champs non renseign&eacute;es, merci de revenir en arri&egrave;re et d'essayer de nouveau",
 "future" => "Futur",
 "flags" => "Drapeaux",
 "owner" => "Propri&eacute;taire",
 "group" => "Groupe",
 "by_usergroup" => " (par groupe d'utilisateurs)",
 "by_taskgroup" => " (par groupe de t&acirc;ches)",
 "by_deadline" => " (par date de fin)",
 "by_status" => " (par statut)",
 "by_owner" => " (par propri&eacute;taire)",
 //**
 "project_cloned" => "Project to be cloned :",
 "task_cloned" => "Task to be cloned :",
 "note_clone" => "Note: The task will be cloned as a new project",

//bits 'n' pieces
  "calendar" => "Calendrier",
  "normal_version" => "Normal version",
  "print_version" => "Print version"
   );

?>
