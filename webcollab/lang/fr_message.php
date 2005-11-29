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

  Translation: Olivier Chaussavoine / Julien Dupont

  Maintainer:

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );

//this is the regex for input validation filter used in common.php 
$validation_regex = "/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s";

//dates
$month_array = array ( NULL, "Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Jul", "Aou", "Sep", "Oct", "Nov", "Dec" );
$week_array = array('Dim','Lun','Mar','Mer','Jeu','Ven','Sam');

//task states
 //priorities
    $task_state['dontdo']                 = "Ne pas faire";
    $task_state['low']                    = "Bas";
    $task_state['normal']                 = "Normal";
    $task_state['high']                   = "Haut";
    $task_state['yesterday']              = "Hier!";
 //status
    $task_state['new']                    = "Nouveau";
    $task_state['planned']                = "Plannifi&eacute; (d&eacute;sactiv&eacute;)";
    $task_state['active']                 = "Actif (en cours)";
    $task_state['cantcomplete']           = "Suspendue";
    $task_state['completed']              = "Termin&eacute;";
    $task_state['done']                   = "Fait";
    $task_state['task_planned']           = " Plannifi&eacute;e";
    $task_state['task_active']            = " Active";
 //project states
    $task_state['planned_project']        = "Projet plannifi&eacute; (d&eacute;sactivi&eacute;)";
    $task_state['no_deadline_project']    = "Aucune date de fin ";
    $task_state['active_project']         = "Projet Actif";

//common items
    $lang['description']                  = "Description";
    $lang['name']                         = "Nom";
    $lang['add']                          = "Ajouter";
    $lang['update']                       = "Actualiser";
    $lang['submit_changes']               = "Modifier";
    $lang['continue']                     = "Continue";
    //$lang['reset']                        = "Reset";
    $lang['manage']                       = "G&eacute;rer";
    $lang['edit']                         = "Editer";
    $lang['delete']                       = "Effacer";
    $lang['del']                          = "Eff";
    $lang['confirm_del_javascript']       = "Confirmer l\'effacement!";
    $lang['yes']                          = "Oui";
    $lang['no']                           = "Non";
    $lang['action']                       = "Action";
    $lang['task']                         = "T&acirc;che";
    $lang['tasks']                        = "T&acirc;ches";
    $lang['project']                      = "Projet";
    $lang['info']                         = "Info";
    $lang['bytes']                        = " octets";
    $lang['select_instruct']              = "(Utiliser CTRL pour faire multiple s&eacute;lections ou aucune s&eacute;lection)";
    $lang['member_groups']                = "L'utilisateur est membre du groupe indiqu&eacute; en bas (s'il y en a un)";
    $lang['login']                        = "Connexion";
    $lang['error']                        = "Erreur";
    $lang['no_login']                     = "Acc&egrave;s refus&eacute;, utilisateur ou mot de passe incorrect";
//**    
    $lang['redirect_sprt']                = "Vous serez automatiquement redirig&eacute; vers l'&eacute;cran de connexion<br />&nbsp;&nbsp;&nbsp;apr&egrave;s un d&eacute;lais de %d secondes";
//**
    $lang['login_now']                    = "Veuillez cliquer ici pour retourner &agrave; l'&eacute;cran de login imm&eacute;diatement";
    $lang['please_login']                 = "Merci de vous connecter";
//**    
    $lang['go']                           = "Go!";

 //graphic items
    $lang['late_g']                       = "&nbsp;EN RETARD&nbsp;";
    $lang['new_g']                        = "&nbsp;NOUVEAU&nbsp;";
    $lang['updated_g']                    = "&nbsp;MIS &Agrave; JOUR&nbsp;";

//admin config
    $lang['admin_config']                 = "Config Admin";
    $lang['email_settings']               = "Param&egrave;tre ent&ecirc;te Courriel";
    $lang['admin_email']                  = "Courriel Admin";
    $lang['email_reply']                  = "R&eacute;pondre &agrave;";
    $lang['email_from']                   = "De";
    $lang['mailing_list']                 = "Liste de diffusion";
    $lang['default_checkbox']             = "Valeur par d&eacute;faut pour les Projets/T&acirc;ches";
    $lang['allow_globalaccess']           = "Autoriser un acc&egrave;s global ?";
    $lang['allow_group_edit']             = "Autoriser l'&eacute;dition pour tous les membres du groupes d'utilisateurs?";
    $lang['set_email_owner']              = "Toujours faire part des modifications (par courriel) au propri&eacute;taire?";
    $lang['set_email_group']              = "Toujours faire part des modifications (par courriel)au groupes d'utilisateurs?";
//**
    $lang['project_listing_order']        = "Ordre d'affichage des projets";
//**    
    $lang['task_listing_order']           = "Ordre d'affichage des t&acirc;ches";
    $lang['configuration']                = "Configuration";

//archive
//**
    $lang['archived_projects']            = "Projets Archiv&eacute;s";

//contacts
    $lang['firstname']                    = "Pr&eacute;nom:";
    $lang['lastname']                     = "Nom:";
    $lang['company']                      = "Entreprise:";
    $lang['home_phone']                   = "T&eacute;l&eacute;phone personnel:";
    $lang['mobile']                       = "Mobile:";
    $lang['fax']                          = "Fax:";
    $lang['bus_phone']                    = "T&eacute;l&eacute;phone professionnel:";
    $lang['address']                      = "Adresse:";
    $lang['postal']                       = "Code Postal:";
    $lang['city']                         = "Ville:";
    $lang['email']                        = "Courriel:";
    $lang['notes']                        = "Notes:";
    $lang['add_contact']                  = "Ajouter contact";
    $lang['del_contact']                  = "Effacer contact";
    $lang['contact_info']                 = "Contact information";
    $lang['contacts']                     = "Contacts";
    $lang['contact_add_info']             = "Si vous indiquez le nom d'une entreprise cette information va &ecirc;tre affich&eacute;e &agrave; la place du nom du contact.";
    $lang['show_contact']                 = "Afficher contacts";
    $lang['edit_contact']                 = "Editer contacts";
    $lang['contact_submit']               = "Modifier contact";
    $lang['contact_warn']                 = "Il manque des informations pour ajouter ce contact. Merci de revenir en arri&egrave;re et de pr&eacute;ciser au moins le pr&eacute;nom et le nom";

 //files
    $lang['manage_files']                 = "Gestion des fichiers";
    $lang['no_files']                     = "Aucun fichiers t&eacute;l&eacute;charg&eacute;s &agrave; g&eacute;rer";
    $lang['no_file_uploads']              = "La configuration du serveur de ce site n'autorise pas les t&eacute;l&eacute;chargements.";
    $lang['file']                         = "Fichier:";
    $lang['uploader']                     = "T&eacute;l&eacute;charger:";
    $lang['files_assoc_project']          = "Fichiers associ&eacute;s au projet";
    $lang['files_assoc_task']             = "Fichiers associ&eacute;s &agrave; la t&acirc;che";
    $lang['file_admin']                   = "Admin Fichier";
    $lang['add_file']                     = "Ajouter fichier";
    $lang['files']                        = "Fichiers";
    $lang['file_choose']                  = "Fichier &agrave; t&eacute;l&eacute;charger:";
    $lang['upload']                       = "T&eacute;l&eacute;chargement";
    $lang['file_email_owner']             = "Avertir le propri&eacute;taire par courriel de la pr&eacute;sence du nouveau fichier ?";
    $lang['file_email_usergroup']         = "Avertir le groupe d'utilisateur par courriel de la pr&eacute;sence du nouveau fichier ?";
    $lang['max_file_sprt']                = "Le fichier &agrave; t&eacute;l&eacute;charger doit faire moins de %1\$s kilo-octets.";
    $lang['file_submit']                  = "Fichier T&eacute;l&eacute;charger ";
    $lang['no_upload']                    = "Aucun fichier n'a &eacute;t&eacute; t&eacute;l&eacute;charg&eacute;. Merci de revenir en arri&egrave;re et d'essayer &agrave; nouveau.";
    $lang['file_too_big_sprt']            = "La taille maximale t&eacute;l&eacute;chargeable est de %1\$s octets. Votre t&eacute;l&eacute;chargement est trop important et a &eacute;t&eacute; annul&eacute;.";
    $lang['del_file_javascript_sprt']     = "Veuillez confirmer la destruction du fichier %1\$s ?";


 //forum
    $lang['orig_message']                 = "Message d'origine:";
    $lang['post']                         = "Envoyer!";
    $lang['message']                      = "Message:";
    $lang['post_reply_sprt']              = "R&eacute;pondre &agrave; une contribution de '%s' &agrave; propos de '%s'";
    $lang['post_message_sprt']            = "R&eacute;pondre &agrave; la contribution &agrave;: '%s'";
    $lang['forum_email_owner']            = "Envoyer le message du forum par courriel au propri&eacute;taire ?";
    $lang['forum_email_usergroup']        = "Envoyer le message du forum par courriel au groupe d'utilisateur ?";
    $lang['reply']                        = "R&eacute;pondre";
    $lang['new_post']                     = "Nouveau message";
    $lang['public_user_forum']            = "Forum public";
    $lang['private_forum_sprt']           = "Forum priv&eacute; pour le groupe '%s' ";
    $lang['forum_submit']                 = "Soumettre au forum";
    $lang['no_message']                   = "Pas de message! Merci de revenir en arri&egrave;re et d'essayer &agrave; nouveau";
    $lang['add_reply']                    = "Ajouter une r&eacute;ponse";
//**  
    $lang['last_post_sprt']               = "Dernier message %s"; //Note to translators: context is 'Last post 2004-Dec-22";
//**   
    $lang['recent_posts']                 = "Messages r&eacute;cents";

 //includes
    $lang['report']                       = "Rapport";
    $lang['warning']                      = "<h1>D&eacute;sol&eacute;!</h1><p>Nous sommes incapable de proc&eacute;der &agrave; votre requete actuellement. Merci de r&eacute;essayez plus tard.</p>";
    $lang['home_page']                    = "Page Principale";
    $lang['summary_page']                 = "Sommaire";
    $lang['todo_list']                    = "Liste &agrave;-faire";
    $lang['calendar']                     = "Calendrier";
    $lang['log_out']                      = "D&eacute;connection";
    $lang['main_menu']                    = "Menu Principal";
//**
    $lang['archive']                      = "Archive";   
    $lang['user_homepage_sprt']           = "Profile: %1\$s";
    $lang['missing_field_javascript']     = "Compl&ecirc;tez, s\'il vous plait, le champ manquant ";
    $lang['invalid_date_javascript']      = "Choisissez une date valide";
    $lang['finish_date_javascript']       = "La date entr&eacute;e d&eacute;passe la date de fin du projet !";
    $lang['security_manager']             = "Gestion Securit&eacute;";
    $lang['session_timeout_sprt']         = "Acc&eacute;s refus&eacute;, la derni&egrave;re action a &eacute;t&eacute; faite il y &agrave; %1\$d minutes et la temps limite d'une session est de %2\$d minutes, merci de vous  <a href=\"%3\$sindex.php\">re-connecter</a>";
    $lang['access_denied']                = "Acc&egrave;s refus&eacute;";
    $lang['private_usergroup']            = "D&eacute;sol&eacute;, cette zone est r&eacute;serv&eacute;e &agrave; un groupe d'utilisateurs  priv&eacute;. Vous n'y avez pas acc&egrave;s.";
    $lang['invalid_date']                 = "Date invalide";
    $lang['invalid_date_sprt']            = "La date %1\$s n'est pas une date correcte du calendrier (v&eacute;rifier le nombre de jour dans le mois). Merci de revenir en arri&egrave;re et d'entrer une date valide.";


 //taskgroups
    $lang['taskgroup_name']               = "Nom du groupe de t&acirc;ches:";
    $lang['taskgroup_description']        = "Description du groupe de t&acirc;ches:";
    $lang['add_taskgroup']                = "Ajouter le groupe de t&acirc;ches";
    $lang['add_new_taskgroup']            = "Ajouter un nouveau groupe de t&acirc;ches";
    $lang['edit_taskgroup']               = "Editer un groupe de t&acirc;ches";
    $lang['taskgroup_manage']             = "Gestion des groupes de t&acirc;ches";
    $lang['no_taskgroups']                = "Pas de groupe de t&acirc;ches d&eacute;fini";
    $lang['manage_taskgroups']            = "Gestion Groupe de t&acirc;ches";
    $lang['taskgroups']                   = "Groupes de t&acirc;ches";
    $lang['taskgroup_dup_sprt']           = "Le groupe de t&acirc;ches '%s' existe d&eacute;j&agrave;. Merci d'utiliser un autre nom.";
    $lang['info_taskgroup_manage']        = "Gestion des informations pour le groupe de t&acirc;ches";

 //usergroups
    $lang['usergroup_name']               = "Nom du groupe d'utilisateurs:";
    $lang['usergroup_description']        = "Description du groupe d'utilisateurs:";
    $lang['members']                      = "Membres:";
    $lang['private_usergroup']            = "Groupe d'utilisateur priv&eacute;";
    $lang['add_usergroup']                = "Ajouter au groupe d'utilisateurs";
    $lang['add_new_usergroup']            = "Ajouter un nouveau groupe d'utilisateurs";
    $lang['edit_usergroup']               = "Editer un groupe d'utilisateurs";
    $lang['usergroup_manage']             = "Gestion des groupes d'utilisateurs";
    $lang['no_usergroups']                = "Pas de groupe d'utilisateurs d&eacute;fini";
    $lang['manage_usergroups']            = "Gestion des groupes d'utilisateurs";
    $lang['usergroups']                   = "Groupes d'utilisateurs";
    $lang['usergroup_dup_sprt']           = "Le groupe d'utilisateurs '%s' existe d&eacute;j&agrave;. Merci d'utiliser un autre nom.";
    $lang['info_usergroup_manage']        = "Gestion des informations pour le groupe d'utilisateurs";

 //users
    $lang['login_name']                   = "Nom utilisateur";
    $lang['full_name']                    = "Nom complet";
    $lang['password']                     = "Mot de passe";
    $lang['blank_for_current_password']   = "(Laisser vide pour conserver le mot de passe actuel)";
    $lang['email']                        = "Courriel";
    $lang['admin']                        = "Admin";
    $lang['private_user']                 = "Utilisateur priv&eacute;";
 //**
    $lang['normal_user']                  = "Utilisateur Normal";
    $lang['is_admin']                     = "Administrateur";
 //**
    $lang['is_guest']                     = "Invit&eacute;";
 //**
    $lang['guest']                        = "Invit&eacute;";
    $lang['user_info']                    = "Information utilisateur";
    $lang['deleted_users']                = "Utilisateurs effac&eacute;s";
    $lang['no_deleted_users']             = "Il n'y aucun utilisateurs effac&eacute;s.";
    $lang['revive']                       = "R&eacute;activer";
    $lang['permdel']                      = "Effacer permament";
    $lang['permdel_javascript_sprt']      = "Ceci va effacer de mani&egrave;re permanente toutes les informations sur un utilisateur et ses t&acirc;ches associ&eacute;es pour %1\$s. Voulez vous r&eacute;ellement le faire?";
    $lang['add_user']                     = "Ajouter un utilisateur";
    $lang['edit_user']                    = "Editer un utilisateur";
    $lang['no_users']                     = "Aucun utilisateur connu sur ce syst&egrave;me";
    $lang['users']                        = "Utilisateurs";
    $lang['existing_users']               = "Utilisateurs existants";
    $lang['private_profile']              = "Vous ne pouvez voir le profil priv&eacute;de cet utilisateur.";
    $lang['private_usergroup_profile']    = "(Cet utilisateur est membre de groupes priv&eacute;s que vous ne pouvez visualiser.";
    $lang['email_users']                  = "Courriel utilisateurs";
    $lang['select_usergroup']             = "Groupe d'utilisateur s&eacute;lectionn&eacute;s de la liste ci-dessous:";
    $lang['subject']                      = "Sujet:";
    $lang['message_sent_maillist']        = "Dans tous les cas le message est aussi envoy&eacute; &agrave; la liste de diffusion.";
    $lang['who_online']                   = "Qui est connect&eacute;?";
    $lang['edit_details']                 = "Editer les informations utilisateur";
    $lang['show_details']                 = "Afficher les informations utilisateur";
    $lang['user_deleted']                 = "Cet utilisateur a &eacute;t&eacute; effac&eacute;!";
    $lang['no_usergroup']                 = "Cet utilisateur n'est membre d'aucun groupe";
    $lang['not_usergroup']                = "(Membre d'aucun groupe d'utilisateurs)";
    $lang['no_password_change']           = "(Votre mot de passe actuel n'a pas &eacute;t&eacute; chang&eacute;)";
    $lang['last_time_here']               = "Date de derni&egrave;re venue:";
    $lang['number_items_created']         = "Nombre d'&eacute;l&eacute;ments cr&eacute;&eacute;s:";
    $lang['number_projects_owned']        = "Nombre de projets dont il est propri&eacute;taire:";
    $lang['number_tasks_owned']           = "Nombre de t&acirc;ches dont il est propri&eacute;taire:";
    $lang['number_tasks_completed']       = "Nombre de t&acirc;ches termin&eacute;es:";
    $lang['number_forum']                 = "Nombre de contributions:";
    $lang['number_files']                 = "Nombre de fichiers t&eacute;l&eacute;charg&eacute;s:";
    $lang['size_all_files']               = "Taille totale des fichiers dont il est propri&eacute;taire:";
    $lang['owned_tasks']                  = "T&acirc;ches &agrave; sa charge:";
    $lang['invalid_email']                = "Adresse courriel invalide";
    $lang['invalid_email_given_sprt']     = "Cette adresse courriel '%s' est invalide. Merci de revenir en arri&egrave;re et d'essayer &agrave; nouveau.";
    $lang['duplicate_user']               = "Utilisateur dupliqu&eacute;";
    $lang['duplicate_change_user_sprt']   = "Cet utilisateur '%s' existe d&eacute;j&agrave;.  Merci de revenir en arri&egrave;re et de changer son nom.";
    $lang['value_missing']                = "Information manquante";
    $lang['field_sprt']                   = "Le champ '%s' est manquant. Merci de revenir en arri&egrave;re et de le renseigner.";
    $lang['admin_priv']                   = "NOTE: Vous avez &eacute;t&eacute; promu administrateur.";
    $lang['manage_users']                 = "Gestion des utilisateurs";
    $lang['users_online']                 = "Utilisateurs connect&eacute;s";
    $lang['online']                       = "Utilisateurs connect&eacute;s (session activ&eacute;e depuis moins de 60 mins maintenant)";
    $lang['not_online']                   = "Les autres";
    $lang['user_activity']                = "Activit&eacute; utilisateur";

  //tasks
    $lang['add_new_task']                 = "Ajouter une nouvelle t&acirc;che";
    $lang['priority']                     = "Priorit&eacute;";
    $lang['parent_task']                  = "T&acirc;che parente";
    $lang['creation_time']                = "Date de cr&eacute;ation";
    $lang['by_sprt']                      = " %1\$s par %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                 = "Nom du projet";
    $lang['task_name']                    = "Nom de la t&acirc;che";
    $lang['deadline']                     = "Date de fin";
    $lang['taken_from_parent']            = "(Pris depuis le parent)";
    $lang['status']                       = "Statut";
    $lang['task_owner']                   = "Propri&eacute;taire de la t&acirc;che";
    $lang['project_owner']                = "Propri&eacute;taire du projet";
    $lang['taskgroup']                    = "Groupe t&acirc;ches";
    $lang['usergroup']                    = "Groupe utilisateurs";
    $lang['nobody']                       = "Personne";
    $lang['none']                         = "Vide";
    $lang['no_group']                     = "Aucun groupe";
    $lang['all_groups']                   = "Tous les groupes";
    $lang['all_users']                    = "Tous les utilisateurs";
    $lang['all_users_view']               = "Tous les utilisateurs peuvent voir cet objet";
    $lang['group_edit']                   = "Tous les membres du groupe utilisateur peuvent &eacute;diter cet objet";
    $lang['project_description']          = "Description du projet";
    $lang['task_description']             = "Description de la t&acirc;che";
    $lang['email_owner']                  = "Envoyer un courriel au propri&eacute;taire avec les modifications ?";
    $lang['email_new_owner']              = "Envoyer un courriel au (nouveau) propri&eacute;taire avec les modifications ?";
    $lang['email_group']                  = "Envoyer un courriel au groupe d'utilisateurs avec les modifications ?";
    $lang['add_new_project']              = "Ajouter un nouveau projet";
    $lang['uncategorised']                = "Non class&eacute;";
    $lang['due_sprt']                     = "reste %d jours";
    $lang['tomorrow']                     = "Demain";
    $lang['due_today']                    = "Pour aujourd'hui";
    $lang['overdue_1']                    = "1 jour de retard";
    $lang['overdue_sprt']                 = "%d jours de retard";
    $lang['edit_task']                    = "&Eacute;diter la t&acirc;che";
    $lang['edit_project']                 = "&Eacute;diter le projet";
    $lang['no_reparent']                  = "Aucun (projet racine)";
    $lang['del_javascript_project_sprt']  = "Ceci va d&eacute;truire le projet %1\$s. Etes vous s&ucirc;r?";
    $lang['del_javascript_task_sprt']     = "Ceci va d&eacute;truire la t&acirc;che %1\$s. Etes vous s&ucirc;r?";
    $lang['add_task']                     = "Ajouter une t&acirc;che";
    $lang['add_subtask']                  = "Ajouter une sous t&acirc;che";
    $lang['add_project']                  = "Ajouter un projet";
    $lang['clone_project']                = "Cloner le projet";
    $lang['clone_task']                   = "Cloner la t&acirc;che";
//**
    $lang['quick_jump']                   = "Acc&egrave;s Rapide";
    $lang['no_edit']                      = "Vous n'&ecirc;tes pas propri&eacute;taire de cet &eacute;l&eacute;ment et vous ne pouvez pas l'&eacute;diter. Demandez &agrave; l'administrateur, ou au propri&eacute;taire de ces t&acirc;ches de le faire pour vous.";
    $lang['uncategorised']                = "Non class&eacute;";
    $lang['admin']                        = "Admin";
    $lang['global']                       = "Global";
    $lang['delete_project']               = "D&eacute;truire le projet";
    $lang['delete_task']                  = "D&eacute;truire la t&acirc;che";
    $lang['project_options']              = "Options Projet";
    $lang['task_options']                 = "Options t&acirc;che";
//**    
    $lang['javascript_archive_project']   = "Ceci archivera le projet %s.  Voulez-vous continuer?";
//**    
    $lang['archive_project']              = "Archiver le project";
    $lang['task_navigation']              = "Navigation t&acirc;ches";
//**
    $lang['new_task']                     = "Nouvelle T&acirc;che";
    $lang['no_projects']                  = "Pas de projet &agrave; afficher";
    $lang['show_all_projects']            = "Montrer tous les projets";
    $lang['show_active_projects']         = "Montrer seulement les projets actifs";
    $lang['completed']                    = "Termin&eacute;";
    $lang['project_hold_sprt']            = "Projet Suspendu sous controle de %s";
    $lang['project_planned']              = "Projet Planifi&eacute;";
    $lang['percent_sprt']                 = "%d%% des t&acirc;ches effectu&eacute;es";
    $lang['project_no_deadline']          = "Pas de date de fin pour ce projet";
    $lang['no_allowed_projects']          = "Aucun projet que vous &ecirc;te autoris&eacute; d'afficher";
    $lang['projects']                     = "Projets";
    $lang['percent_project_sprt']         = "Ce projet est accompli &agrave; %d%%";
    $lang['owned_by']                     = "Propri&eacute;t&eacute; de ";
    $lang['created_on']                   = "Cr&eacute;&eacute; le";
    $lang['completed_on']                 = "Termin&eacute; le";
    $lang['modified_on']                  = "Modifi&eacute; le";
    $lang['project_on_hold']              = "Le projet est pr&eacute;sentement suspendu";
    $lang['project_accessible']           = "(Ce projet est publiquement accessible &agrave; tous les utilisateurs)";
    $lang['task_accessible']              = "(Cette t&acirc;che est publiquement accessible &agrave; tous les utilisateurs)";
    $lang['project_not_accessible']       = "(Ce projet est seulement accessible aux membres du groupe d'utilisateurs)";
    $lang['task_not_accessible']          = "(Cette t&acirc;che est seulement accessible aux membres du groupe d'utilisateurs)";
    $lang['project_not_in_usergroup']     = "Ce projet n'est pas attach&eacute; &agrave; un groupe d'utilisateurs et est accessible &agrave; tous.";
    $lang['task_not_in_usergroup']        = "Cette t&acirc;che n'est pas attach&eacute;e &agrave; un groupe d'utilisateurs et est accessible &agrave; tous.";
    $lang['usergroup_can_edit_project']   = "Ce projet peut aussi &ecirc;tre &eacute;dit&eacute; par les membres du groupe d'utilisateurs.";
    $lang['usergroup_can_edit_task']      = "Cette t&acirc;che peut aussi &ecirc;tre &eacute;dit&eacute;e par les membres du groupe d'utilisateurs.";
    $lang['i_take_it']                    = "Je prends la t&acirc;che";
    $lang['i_finished']                   = "Je l'ai termin&eacute;!";
    $lang['i_dont_want']                  = "Je n'en veux plus";
    $lang['take_over_project']            = "Je prends le projet";
    $lang['take_over_task']               = "Je prends la t&acirc;che";
    $lang['task_info']                    = "Information t&acirc;che ";
    $lang['project_details']              = "D&eacute;tails projet";
    $lang['todo_list_for']                = "Liste &agrave;-faire pour le : ";
    $lang['due_in_sprt']                  = " (&agrave; faire dans %d jours)";
    $lang['due_tomorrow']                 = " (&agrave; faire pour demain)";
    $lang['no_assigned']                  = "Il n'y a aucune t&acirc;che en cours confi&eacute;e &agrave; cet utilisateur.";
    $lang['todo_list']                    = "Liste &agrave;-faire";
    $lang['summary_list']                 = "Sommaire";
    $lang['task_submit']                  = "Modifier t&acirc;che";
    $lang['not_owner']                    = "Acc&egrave;s refus&eacute;, soit vous n'en &ecirc;tes pas le propri&eacute;taire soit vous n'avez pas de droit dessus";
    $lang['missing_values']               = "Il y a des champs non renseign&eacute;es, merci de revenir en arri&egrave;re et d'essayer de nouveau";
    $lang['future']                       = "Futur";
    $lang['flags']                        = "Indicateurs";
    $lang['owner']                        = "Propri&eacute;taire";
    $lang['group']                        = "Groupe";
    $lang['by_usergroup']                 = " (par groupe d'utilisateur)";
    $lang['by_taskgroup']                 = " (par groupe de t&acirc;che)";
    $lang['by_deadline']                  = " (par date de fin)";
    $lang['by_status']                    = " (par statut)";
    $lang['by_owner']                     = " (par propri&eacute;taire)";
    $lang['project_cloned']               = "Projet &agrave; cloner :";
    $lang['task_cloned']                  = "T&acirc;che &agrave; cloner :";
    $lang['note_clone']                   = "Note : cette t&acirc;che sera clon&eacute;e comme un nouveau projet";

//bits 'n' pieces
    $lang['calendar']                     = "Calendrier";
    $lang['normal_version']               = "Version normale";
    $lang['print_version']                = "Version imprimable";
//**    
    $lang['condensed_view']               = "Vue r&eacute;duite";
//**    
    $lang['full_view']                    = "Vue compl&egrave;te";

?>
