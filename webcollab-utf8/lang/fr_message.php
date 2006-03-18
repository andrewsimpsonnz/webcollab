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
    $task_state['planned']                = "Plannifié (désactivé)";
    $task_state['active']                 = "Actif (en cours)";
    $task_state['cantcomplete']           = "Suspendue";
    $task_state['completed']              = "Terminé";
    $task_state['done']                   = "Fait";
    $task_state['task_planned']           = " Plannifiée";
    $task_state['task_active']            = " Active";
 //project states
    $task_state['planned_project']        = "Projet plannifié (désactivié)";
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
    $lang['manage']                       = "Gérer";
    $lang['edit']                         = "Editer";
    $lang['delete']                       = "Effacer";
    $lang['del']                          = "Eff";
    $lang['confirm_del_javascript']       = "Confirmer l\'effacement!";
    $lang['yes']                          = "Oui";
    $lang['no']                           = "Non";
    $lang['action']                       = "Action";
    $lang['task']                         = "Tâche";
    $lang['tasks']                        = "Tâches";
    $lang['project']                      = "Projet";
    $lang['info']                         = "Info";
    $lang['bytes']                        = " octets";
    $lang['select_instruct']              = "(Utiliser CTRL pour faire multiple sélections ou aucune sélection)";
    $lang['member_groups']                = "L'utilisateur est membre du groupe indiqué en bas (s'il y en a un)";
    $lang['login']                        = "Connexion";
    $lang['error']                        = "Erreur";
    $lang['no_login']                     = "Accès refusé, utilisateur ou mot de passe incorrect";
    $lang['redirect_sprt']                = "Vous serez automatiquement redirigé vers l'écran de connexion<br />&nbsp;&nbsp;&nbsp;après un délais de %d secondes";
    $lang['login_now']                    = "Veuillez cliquer ici pour retourner à l'écran de login immédiatement";
    $lang['please_login']                 = "Merci de vous connecter";
    $lang['go']                           = "Go!";

 //graphic items
    $lang['late_g']                       = "&nbsp;EN RETARD&nbsp;";
    $lang['new_g']                        = "&nbsp;NOUVEAU&nbsp;";
    $lang['updated_g']                    = "&nbsp;MIS À JOUR&nbsp;";

//admin config
    $lang['admin_config']                 = "Config Admin";
    $lang['email_settings']               = "Paramètre entête Courriel";
    $lang['admin_email']                  = "Courriel Admin";
    $lang['email_reply']                  = "Répondre à";
    $lang['email_from']                   = "De";
    $lang['mailing_list']                 = "Liste de diffusion";
    $lang['default_checkbox']             = "Valeur par défaut pour les Projets/Tâches";
    $lang['allow_globalaccess']           = "Autoriser un accès global ?";
    $lang['allow_group_edit']             = "Autoriser l'édition pour tous les membres du groupes d'utilisateurs?";
    $lang['set_email_owner']              = "Toujours faire part des modifications (par courriel) au propriétaire?";
    $lang['set_email_group']              = "Toujours faire part des modifications (par courriel)au groupes d'utilisateurs?";
    $lang['project_listing_order']        = "Ordre d'affichage des projets";
    $lang['task_listing_order']           = "Ordre d'affichage des tâches";
    $lang['configuration']                = "Configuration";

//archive
//**
    $lang['archived_projects']            = "Projets Archivés";

//contacts
    $lang['firstname']                    = "Prénom:";
    $lang['lastname']                     = "Nom:";
    $lang['company']                      = "Entreprise:";
    $lang['home_phone']                   = "Téléphone personnel:";
    $lang['mobile']                       = "Mobile:";
    $lang['fax']                          = "Fax:";
    $lang['bus_phone']                    = "Téléphone professionnel:";
    $lang['address']                      = "Adresse:";
    $lang['postal']                       = "Code Postal:";
    $lang['city']                         = "Ville:";
    $lang['email']                        = "Courriel:";
    $lang['notes']                        = "Notes:";
    $lang['add_contact']                  = "Ajouter contact";
    $lang['del_contact']                  = "Effacer contact";
    $lang['contact_info']                 = "Contact information";
    $lang['contacts']                     = "Contacts";
    $lang['contact_add_info']             = "Si vous indiquez le nom d'une entreprise cette information va être affichée à la place du nom du contact.";
    $lang['show_contact']                 = "Afficher contacts";
    $lang['edit_contact']                 = "Editer contacts";
    $lang['contact_submit']               = "Modifier contact";
    $lang['contact_warn']                 = "Il manque des informations pour ajouter ce contact. Merci de revenir en arrière et de préciser au moins le prénom et le nom";

 //files
    $lang['manage_files']                 = "Gestion des fichiers";
    $lang['no_files']                     = "Aucun fichiers téléchargés à gérer";
    $lang['no_file_uploads']              = "La configuration du serveur de ce site n'autorise pas les téléchargements.";
    $lang['file']                         = "Fichier:";
    $lang['uploader']                     = "Télécharger:";
    $lang['files_assoc_project']          = "Fichiers associés au projet";
    $lang['files_assoc_task']             = "Fichiers associés à la tâche";
    $lang['file_admin']                   = "Admin Fichier";
    $lang['add_file']                     = "Ajouter fichier";
    $lang['files']                        = "Fichiers";
    $lang['file_choose']                  = "Fichier à télécharger:";
    $lang['upload']                       = "Téléchargement";
    $lang['file_email_owner']             = "Avertir le propriétaire par courriel de la présence du nouveau fichier ?";
    $lang['file_email_usergroup']         = "Avertir le groupe d'utilisateur par courriel de la présence du nouveau fichier ?";
    $lang['max_file_sprt']                = "Le fichier à télécharger doit faire moins de %1\$s kilo-octets.";
    $lang['file_submit']                  = "Fichier Télécharger ";
    $lang['no_upload']                    = "Aucun fichier n'a été téléchargé. Merci de revenir en arrière et d'essayer à nouveau.";
    $lang['file_too_big_sprt']            = "La taille maximale téléchargeable est de %1\$s octets. Votre téléchargement est trop important et a été annulé.";
    $lang['del_file_javascript_sprt']     = "Veuillez confirmer la destruction du fichier %1\$s ?";


 //forum
    $lang['orig_message']                 = "Message d'origine:";
    $lang['post']                         = "Envoyer!";
    $lang['message']                      = "Message:";
    $lang['post_reply_sprt']              = "Répondre à une contribution de '%s' à propos de '%s'";
    $lang['post_message_sprt']            = "Répondre à la contribution à: '%s'";
    $lang['forum_email_owner']            = "Envoyer le message du forum par courriel au propriétaire ?";
    $lang['forum_email_usergroup']        = "Envoyer le message du forum par courriel au groupe d'utilisateur ?";
    $lang['reply']                        = "Répondre";
    $lang['new_post']                     = "Nouveau message";
    $lang['public_user_forum']            = "Forum public";
    $lang['private_forum_sprt']           = "Forum privé pour le groupe '%s' ";
    $lang['forum_submit']                 = "Soumettre au forum";
    $lang['no_message']                   = "Pas de message! Merci de revenir en arrière et d'essayer à nouveau";
    $lang['add_reply']                    = "Ajouter une réponse";
    $lang['last_post_sprt']               = "Dernier message %s"; //Note to translators: context is 'Last post 2004-Dec-22";
    $lang['recent_posts']                 = "Messages récents";
    $lang['recent_posts']                 = "Messages récents";
    $lang['forum_search']                 = "Chercher dans les forums";
    $lang['no_results']                   = "Aucun résultats pour '%s'";
    $lang['search_results']               = "Trouvé %1\$s résultats pour '%2\$s'<br />Affiche résultats %3\$s à %4\$s";

 //includes
    $lang['report']                       = "Rapport";
    $lang['warning']                      = "<h1>Désolé!</h1><p>Nous sommes incapable de procéder à votre requete actuellement. Merci de réessayez plus tard.</p>";
    $lang['home_page']                    = "Page Principale";
    $lang['summary_page']                 = "Sommaire";
    $lang['todo_list']                    = "Liste à-faire";
    $lang['calendar']                     = "Calendrier";
    $lang['log_out']                      = "Déconnection";
    $lang['main_menu']                    = "Menu Principal";
    $lang['archive']                      = "Archive";
    $lang['user_homepage_sprt']           = "Profile: %1\$s";
    $lang['missing_field_javascript']     = "Complêtez, s\'il vous plait, le champ manquant ";
    $lang['invalid_date_javascript']      = "Choisissez une date valide";
    $lang['finish_date_javascript']       = "La date entrée dépasse la date de fin du projet !";
    $lang['security_manager']             = "Gestion Securité";
    $lang['session_timeout_sprt']         = "Accés refusé, la dernière action a été faite il y à %1\$d minutes et la temps limite d'une session est de %2\$d minutes, merci de vous  <a href=\"%3\$sindex.php\">re-connecter</a>";
    $lang['access_denied']                = "Accès refusé";
    $lang['private_usergroup']            = "Désolé, cette zone est réservée à un groupe d'utilisateurs  privé. Vous n'y avez pas accès.";
    $lang['invalid_date']                 = "Date invalide";
    $lang['invalid_date_sprt']            = "La date %1\$s n'est pas une date correcte du calendrier (vérifier le nombre de jour dans le mois). Merci de revenir en arrière et d'entrer une date valide.";


 //taskgroups
    $lang['taskgroup_name']               = "Nom du groupe de tâches:";
    $lang['taskgroup_description']        = "Description du groupe de tâches:";
    $lang['add_taskgroup']                = "Ajouter le groupe de tâches";
    $lang['add_new_taskgroup']            = "Ajouter un nouveau groupe de tâches";
    $lang['edit_taskgroup']               = "Editer un groupe de tâches";
    $lang['taskgroup_manage']             = "Gestion des groupes de tâches";
    $lang['no_taskgroups']                = "Pas de groupe de tâches défini";
    $lang['manage_taskgroups']            = "Gestion Groupe de tâches";
    $lang['taskgroups']                   = "Groupes de tâches";
    $lang['taskgroup_dup_sprt']           = "Le groupe de tâches '%s' existe déjà. Merci d'utiliser un autre nom.";
    $lang['info_taskgroup_manage']        = "Gestion des informations pour le groupe de tâches";

 //usergroups
    $lang['usergroup_name']               = "Nom du groupe d'utilisateurs:";
    $lang['usergroup_description']        = "Description du groupe d'utilisateurs:";
    $lang['members']                      = "Membres:";
    $lang['private_usergroup']            = "Groupe d'utilisateur privé";
    $lang['add_usergroup']                = "Ajouter au groupe d'utilisateurs";
    $lang['add_new_usergroup']            = "Ajouter un nouveau groupe d'utilisateurs";
    $lang['edit_usergroup']               = "Editer un groupe d'utilisateurs";
    $lang['usergroup_manage']             = "Gestion des groupes d'utilisateurs";
    $lang['no_usergroups']                = "Pas de groupe d'utilisateurs défini";
    $lang['manage_usergroups']            = "Gestion des groupes d'utilisateurs";
    $lang['usergroups']                   = "Groupes d'utilisateurs";
    $lang['usergroup_dup_sprt']           = "Le groupe d'utilisateurs '%s' existe déjà. Merci d'utiliser un autre nom.";
    $lang['info_usergroup_manage']        = "Gestion des informations pour le groupe d'utilisateurs";

 //users
    $lang['login_name']                   = "Nom utilisateur";
    $lang['full_name']                    = "Nom complet";
    $lang['password']                     = "Mot de passe";
    $lang['blank_for_current_password']   = "(Laisser vide pour conserver le mot de passe actuel)";
    $lang['email']                        = "Courriel";
    $lang['admin']                        = "Admin";
    $lang['private_user']                 = "Utilisateur privé";
    $lang['normal_user']                  = "Utilisateur Normal";
    $lang['is_admin']                     = "Administrateur";
    $lang['is_guest']                     = "Invité";
    $lang['guest']                        = "Invité";
    $lang['user_info']                    = "Information utilisateur";
    $lang['deleted_users']                = "Utilisateurs effacés";
    $lang['no_deleted_users']             = "Il n'y aucun utilisateurs effacés.";
    $lang['revive']                       = "Réactiver";
    $lang['permdel']                      = "Effacer permament";
    $lang['permdel_javascript_sprt']      = "Ceci va effacer de manière permanente toutes les informations sur un utilisateur et ses tâches associées pour %1\$s. Voulez vous réellement le faire?";
    $lang['add_user']                     = "Ajouter un utilisateur";
    $lang['edit_user']                    = "Editer un utilisateur";
    $lang['no_users']                     = "Aucun utilisateur connu sur ce système";
    $lang['users']                        = "Utilisateurs";
    $lang['existing_users']               = "Utilisateurs existants";
    $lang['private_profile']              = "Vous ne pouvez voir le profil privéde cet utilisateur.";
    $lang['private_usergroup_profile']    = "(Cet utilisateur est membre de groupes privés que vous ne pouvez visualiser.";
    $lang['email_users']                  = "Courriel utilisateurs";
    $lang['select_usergroup']             = "Groupe d'utilisateur sélectionnés de la liste ci-dessous:";
    $lang['subject']                      = "Sujet:";
    $lang['message_sent_maillist']        = "Dans tous les cas le message est aussi envoyé à la liste de diffusion.";
    $lang['who_online']                   = "Qui est connecté?";
    $lang['edit_details']                 = "Editer les informations utilisateur";
    $lang['show_details']                 = "Afficher les informations utilisateur";
    $lang['user_deleted']                 = "Cet utilisateur a été effacé!";
    $lang['no_usergroup']                 = "Cet utilisateur n'est membre d'aucun groupe";
    $lang['not_usergroup']                = "(Membre d'aucun groupe d'utilisateurs)";
    $lang['no_password_change']           = "(Votre mot de passe actuel n'a pas été changé)";
    $lang['last_time_here']               = "Date de dernière venue:";
    $lang['number_items_created']         = "Nombre d'éléments créés:";
    $lang['number_projects_owned']        = "Nombre de projets dont il est propriétaire:";
    $lang['number_tasks_owned']           = "Nombre de tâches dont il est propriétaire:";
    $lang['number_tasks_completed']       = "Nombre de tâches terminées:";
    $lang['number_forum']                 = "Nombre de contributions:";
    $lang['number_files']                 = "Nombre de fichiers téléchargés:";
    $lang['size_all_files']               = "Taille totale des fichiers dont il est propriétaire:";
    $lang['owned_tasks']                  = "Tâches à sa charge:";
    $lang['invalid_email']                = "Adresse courriel invalide";
    $lang['invalid_email_given_sprt']     = "Cette adresse courriel '%s' est invalide. Merci de revenir en arrière et d'essayer à nouveau.";
    $lang['duplicate_user']               = "Utilisateur dupliqué";
    $lang['duplicate_change_user_sprt']   = "Cet utilisateur '%s' existe déjà.  Merci de revenir en arrière et de changer son nom.";
    $lang['value_missing']                = "Information manquante";
    $lang['field_sprt']                   = "Le champ '%s' est manquant. Merci de revenir en arrière et de le renseigner.";
    $lang['admin_priv']                   = "NOTE: Vous avez été promu administrateur.";
    $lang['manage_users']                 = "Gestion des utilisateurs";
    $lang['users_online']                 = "Utilisateurs connectés";
    $lang['online']                       = "Utilisateurs connectés (session activée depuis moins de 60 mins maintenant)";
    $lang['not_online']                   = "Les autres";
    $lang['user_activity']                = "Activité utilisateur";

  //tasks
    $lang['add_new_task']                 = "Ajouter une nouvelle tâche";
    $lang['priority']                     = "Priorité";
    $lang['parent_task']                  = "Tâche parente";
    $lang['creation_time']                = "Date de création";
    $lang['by_sprt']                      = " %1\$s par %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                 = "Nom du projet";
    $lang['task_name']                    = "Nom de la tâche";
    $lang['deadline']                     = "Date de fin";
    $lang['taken_from_parent']            = "(Pris depuis le parent)";
    $lang['status']                       = "Statut";
    $lang['task_owner']                   = "Propriétaire de la tâche";
    $lang['project_owner']                = "Propriétaire du projet";
    $lang['taskgroup']                    = "Groupe tâches";
    $lang['usergroup']                    = "Groupe utilisateurs";
    $lang['nobody']                       = "Personne";
    $lang['none']                         = "Vide";
    $lang['no_group']                     = "Aucun groupe";
    $lang['all_groups']                   = "Tous les groupes";
    $lang['all_users']                    = "Tous les utilisateurs";
    $lang['all_users_view']               = "Tous les utilisateurs peuvent voir cet objet";
    $lang['group_edit']                   = "Tous les membres du groupe utilisateur peuvent éditer cet objet";
    $lang['project_description']          = "Description du projet";
    $lang['task_description']             = "Description de la tâche";
    $lang['email_owner']                  = "Envoyer un courriel au propriétaire avec les modifications ?";
    $lang['email_new_owner']              = "Envoyer un courriel au (nouveau) propriétaire avec les modifications ?";
    $lang['email_group']                  = "Envoyer un courriel au groupe d'utilisateurs avec les modifications ?";
    $lang['add_new_project']              = "Ajouter un nouveau projet";
    $lang['uncategorised']                = "Non classé";
    $lang['due_sprt']                     = "reste %d jours";
    $lang['tomorrow']                     = "Demain";
    $lang['due_today']                    = "Pour aujourd'hui";
    $lang['overdue_1']                    = "1 jour de retard";
    $lang['overdue_sprt']                 = "%d jours de retard";
    $lang['edit_task']                    = "Éditer la tâche";
    $lang['edit_project']                 = "Éditer le projet";
    $lang['no_reparent']                  = "Aucun (projet racine)";
    $lang['del_javascript_project_sprt']  = "Ceci va détruire le projet %1\$s. Etes vous sûr?";
    $lang['del_javascript_task_sprt']     = "Ceci va détruire la tâche %1\$s. Etes vous sûr?";
    $lang['add_task']                     = "Ajouter une tâche";
    $lang['add_subtask']                  = "Ajouter une sous tâche";
    $lang['add_project']                  = "Ajouter un projet";
    $lang['clone_project']                = "Cloner le projet";
    $lang['clone_task']                   = "Cloner la tâche";
    $lang['quick_jump']                   = "Accès Rapide";
    $lang['no_edit']                      = "Vous n'êtes pas propriétaire de cet élément et vous ne pouvez pas l'éditer. Demandez à l'administrateur, ou au propriétaire de ces tâches de le faire pour vous.";
    $lang['uncategorised']                = "Non classé";
    $lang['admin']                        = "Admin";
    $lang['global']                       = "Global";
    $lang['delete_project']               = "Détruire le projet";
    $lang['delete_task']                  = "Détruire la tâche";
    $lang['project_options']              = "Options Projet";
    $lang['task_options']                 = "Options tâche";
    $lang['javascript_archive_project']   = "Ceci archivera le projet %s.  Voulez-vous continuer?";
    $lang['archive_project']              = "Archiver le project";
    $lang['task_navigation']              = "Navigation tâches";
    $lang['new_task']                     = "Nouvelle Tâche";
    $lang['no_projects']                  = "Pas de projet à afficher";
    $lang['show_all_projects']            = "Montrer tous les projets";
    $lang['show_active_projects']         = "Montrer seulement les projets actifs";
    $lang['completed']                    = "Terminé";
    $lang['project_hold_sprt']            = "Projet Suspendu sous controle de %s";
    $lang['project_planned']              = "Projet Planifié";
    $lang['percent_sprt']                 = "%d%% des tâches effectuées";
    $lang['project_no_deadline']          = "Pas de date de fin pour ce projet";
    $lang['no_allowed_projects']          = "Aucun projet que vous ête autorisé d'afficher";
    $lang['projects']                     = "Projets";
    $lang['percent_project_sprt']         = "Ce projet est accompli à %d%%";
    $lang['owned_by']                     = "Propriété de ";
    $lang['created_on']                   = "Créé le";
    $lang['completed_on']                 = "Terminé le";
    $lang['modified_on']                  = "Modifié le";
    $lang['project_on_hold']              = "Le projet est présentement suspendu";
    $lang['project_accessible']           = "(Ce projet est publiquement accessible à tous les utilisateurs)";
    $lang['task_accessible']              = "(Cette tâche est publiquement accessible à tous les utilisateurs)";
    $lang['project_not_accessible']       = "(Ce projet est seulement accessible aux membres du groupe d'utilisateurs)";
    $lang['task_not_accessible']          = "(Cette tâche est seulement accessible aux membres du groupe d'utilisateurs)";
    $lang['project_not_in_usergroup']     = "Ce projet n'est pas attaché à un groupe d'utilisateurs et est accessible à tous.";
    $lang['task_not_in_usergroup']        = "Cette tâche n'est pas attachée à un groupe d'utilisateurs et est accessible à tous.";
    $lang['usergroup_can_edit_project']   = "Ce projet peut aussi être édité par les membres du groupe d'utilisateurs.";
    $lang['usergroup_can_edit_task']      = "Cette tâche peut aussi être éditée par les membres du groupe d'utilisateurs.";
    $lang['i_take_it']                    = "Je prends la tâche";
    $lang['i_finished']                   = "Je l'ai terminé!";
    $lang['i_dont_want']                  = "Je n'en veux plus";
    $lang['take_over_project']            = "Je prends le projet";
    $lang['take_over_task']               = "Je prends la tâche";
    $lang['task_info']                    = "Information tâche ";
    $lang['project_details']              = "Détails projet";
    $lang['todo_list_for']                = "Liste à-faire pour le : ";
    $lang['due_in_sprt']                  = " (à faire dans %d jours)";
    $lang['due_tomorrow']                 = " (à faire pour demain)";
    $lang['no_assigned']                  = "Il n'y a aucune tâche en cours confiée à cet utilisateur.";
    $lang['todo_list']                    = "Liste à-faire";
    $lang['summary_list']                 = "Sommaire";
    $lang['task_submit']                  = "Modifier tâche";
    $lang['not_owner']                    = "Accès refusé, soit vous n'en êtes pas le propriétaire soit vous n'avez pas de droit dessus";
    $lang['missing_values']               = "Il y a des champs non renseignées, merci de revenir en arrière et d'essayer de nouveau";
    $lang['future']                       = "Futur";
    $lang['flags']                        = "Indicateurs";
    $lang['owner']                        = "Propriétaire";
    $lang['group']                        = "Groupe";
    $lang['by_usergroup']                 = " (par groupe d'utilisateur)";
    $lang['by_taskgroup']                 = " (par groupe de tâche)";
    $lang['by_deadline']                  = " (par date de fin)";
    $lang['by_status']                    = " (par statut)";
    $lang['by_owner']                     = " (par propriétaire)";
    $lang['project_cloned']               = "Projet à cloner :";
    $lang['task_cloned']                  = "Tâche à cloner :";
    $lang['note_clone']                   = "Note : cette tâche sera clonée comme un nouveau projet";

//bits 'n' pieces
    $lang['calendar']                     = "Calendrier";
    $lang['normal_version']               = "Version normale";
    $lang['print_version']                = "Version imprimable";
    $lang['condensed_view']               = "Vue réduite";
    $lang['full_view']                    = "Vue complète";
    $lang['icalendar']                    = "iCalendar";


?>
