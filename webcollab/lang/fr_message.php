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

  Language files for 'fr' (French/Fran�ais)

  Translation: Olivier Chaussavoine / Julien Dupont

  Maintainer:

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );

//xml language identifier
define('XML_LANG', "fr" );

//this is the regex for input validation filter used in common.php 
define('VALIDATION_REGEX', "/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/" );

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
    $task_state['planned']                = "Plannifi� (d�sactiv�)";
    $task_state['active']                 = "Actif (en cours)";
    $task_state['cantcomplete']           = "Suspendue";
    $task_state['completed']              = "Termin�";
    $task_state['done']                   = "Fait";
    $task_state['task_planned']           = " Plannifi�e";
    $task_state['task_active']            = " Active";
 //project states
    $task_state['planned_project']        = "Projet plannifi� (d�sactivi�)";
    $task_state['no_deadline_project']    = "Aucune date de fin ";
    $task_state['active_project']         = "Projet Actif";

//common items
    $lang['description']                  = "Description";
    $lang['name']                         = "Nom";
    $lang['add']                          = "Ajouter";
    $lang['update']                       = "Actualiser";
    $lang['submit_changes']               = "Modifier";
    $lang['continue']                     = "Continue";
    $lang['manage']                       = "G�rer";
    $lang['edit']                         = "Editer";
    $lang['delete']                       = "Effacer";
    $lang['del']                          = "Eff";
    $lang['confirm_del_javascript']       = "Confirmer l\'effacement!";
    $lang['yes']                          = "Oui";
    $lang['no']                           = "Non";
    $lang['action']                       = "Action";
    $lang['task']                         = "T�che";
    $lang['tasks']                        = "T�ches";
    $lang['project']                      = "Projet";
    $lang['info']                         = "Info";
    $lang['bytes']                        = " octets";
    $lang['select_instruct']              = "(Utiliser CTRL pour faire multiple s�lections ou aucune s�lection)";
    $lang['member_groups']                = "L'utilisateur est membre du groupe indiqu� en bas (s'il y en a un)";
    $lang['login']                        = "Connexion";
    $lang['login_action']                 = "Connexion";
    $lang['login_screen']                 = "Connexion";
    $lang['error']                        = "Erreur";
    $lang['no_login']                     = "Acc�s refus�, utilisateur ou mot de passe incorrect";
    $lang['redirect_sprt']                = "Vous serez automatiquement redirig� vers l'�cran de connexion<br />&nbsp;&nbsp;&nbsp;apr�s un d�lais de %d secondes";
    $lang['login_now']                    = "Veuillez cliquer ici pour retourner � l'�cran de login imm�diatement";
    $lang['please_login']                 = "Merci de vous connecter";
    $lang['go']                           = "Go!";

 //graphic items
    $lang['late_g']                       = "&nbsp;EN RETARD&nbsp;";
    $lang['new_g']                        = "&nbsp;NOUVEAU&nbsp;";
    $lang['updated_g']                    = "&nbsp;MIS � JOUR&nbsp;";

//admin config
    $lang['admin_config']                 = "Config Admin";
    $lang['email_settings']               = "Param�tre ent�te Courriel";
    $lang['admin_email']                  = "Courriel Admin";
    $lang['email_reply']                  = "R�pondre �";
    $lang['email_from']                   = "De";
    $lang['mailing_list']                 = "Liste de diffusion";
    $lang['default_checkbox']             = "Valeur par d�faut pour les Projets/T�ches";
    $lang['allow_globalaccess']           = "Autoriser un acc�s global ?";
    $lang['allow_group_edit']             = "Autoriser l'�dition pour tous les membres du groupes d'utilisateurs?";
    $lang['set_email_owner']              = "Toujours faire part des modifications (par courriel) au propri�taire?";
    $lang['set_email_group']              = "Toujours faire part des modifications (par courriel)au groupes d'utilisateurs?";
    $lang['project_listing_order']        = "Ordre d'affichage des projets";
    $lang['task_listing_order']           = "Ordre d'affichage des t�ches";
    $lang['configuration']                = "Configuration";

//archive
    $lang['archived_projects']            = "Projets Archiv�s";

//contacts
    $lang['firstname']                    = "Pr�nom:";
    $lang['lastname']                     = "Nom:";
    $lang['company']                      = "Entreprise:";
    $lang['home_phone']                   = "T�l�phone personnel:";
    $lang['mobile']                       = "Mobile:";
    $lang['fax']                          = "Fax:";
    $lang['bus_phone']                    = "T�l�phone professionnel:";
    $lang['address']                      = "Adresse:";
    $lang['postal']                       = "Code Postal:";
    $lang['city']                         = "Ville:";
    $lang['email_contact']                = "Courriel:";
    $lang['notes']                        = "Notes:";
    $lang['add_contact']                  = "Ajouter contact";
    $lang['del_contact']                  = "Effacer contact";
    $lang['contact_info']                 = "Contact information";
    $lang['contacts']                     = "Contacts";
    $lang['contact_add_info']             = "Si vous indiquez le nom d'une entreprise cette information va �tre affich�e � la place du nom du contact.";
    $lang['show_contact']                 = "Afficher contacts";
    $lang['edit_contact']                 = "Editer contacts";
    $lang['contact_submit']               = "Modifier contact";
    $lang['contact_warn']                 = "Il manque des informations pour ajouter ce contact. Merci de revenir en arri�re et de pr�ciser au moins le pr�nom et le nom";

 //files
    $lang['manage_files']                 = "Gestion des fichiers";
    $lang['no_files']                     = "Aucun fichiers t�l�charg�s � g�rer";
    $lang['no_file_uploads']              = "La configuration du serveur de ce site n'autorise pas les t�l�chargements.";
    $lang['file']                         = "Fichier:";
    $lang['uploader']                     = "T�l�charger:";
    $lang['files_assoc_project']          = "Fichiers associ�s au projet";
    $lang['files_assoc_task']             = "Fichiers associ�s � la t�che";
    $lang['file_admin']                   = "Admin Fichier";
    $lang['add_file']                     = "Ajouter fichier";
    $lang['files']                        = "Fichiers";
    $lang['file_choose']                  = "Fichier � t�l�charger:";
    $lang['upload']                       = "T�l�chargement";
    $lang['file_email_owner']             = "Avertir le propri�taire par courriel de la pr�sence du nouveau fichier ?";
    $lang['file_email_usergroup']         = "Avertir le groupe d'utilisateur par courriel de la pr�sence du nouveau fichier ?";
    $lang['max_file_sprt']                = "Le fichier � t�l�charger doit faire moins de %1\$s kilo-octets.";
    $lang['file_submit']                  = "Fichier T�l�charger ";
    $lang['no_upload']                    = "Aucun fichier n'a �t� t�l�charg�. Merci de revenir en arri�re et d'essayer � nouveau.";
    $lang['file_too_big_sprt']            = "La taille maximale t�l�chargeable est de %1\$s octets. Votre t�l�chargement est trop important et a �t� annul�.";
    $lang['del_file_javascript_sprt']     = "Veuillez confirmer la destruction du fichier %1\$s ?";


 //forum
    $lang['orig_message']                 = "Message d'origine:";
    $lang['post']                         = "Envoyer!";
    $lang['message']                      = "Message:";
    $lang['post_reply_sprt']              = "R�pondre � une contribution de '%s' � propos de '%s'";
    $lang['post_message_sprt']            = "R�pondre � la contribution �: '%s'";
    $lang['forum_email_owner']            = "Envoyer le message du forum par courriel au propri�taire ?";
    $lang['forum_email_usergroup']        = "Envoyer le message du forum par courriel au groupe d'utilisateur ?";
    $lang['reply']                        = "R�pondre";
    $lang['new_post']                     = "Nouveau message";
    $lang['public_user_forum']            = "Forum public";
    $lang['private_forum_sprt']           = "Forum priv� pour le groupe '%s' ";
    $lang['forum_submit']                 = "Soumettre au forum";
    $lang['no_message']                   = "Pas de message! Merci de revenir en arri�re et d'essayer � nouveau";
    $lang['add_reply']                    = "Ajouter une r�ponse";
    $lang['last_post_sprt']               = "Dernier message %s"; //Note to translators: context is 'Last post 2004-Dec-22";
    $lang['recent_posts']                 = "Messages r�cents";
    $lang['recent_posts']                 = "Messages r�cents";
    $lang['forum_search']                 = "Chercher dans les forums";
    $lang['no_results']                   = "Aucun r�sultats pour '%s'";
    $lang['search_results']               = "Trouv� %1\$s r�sultats pour '%2\$s'<br />Affiche r�sultats %3\$s � %4\$s";

 //includes
    $lang['report']                       = "Rapport";
    $lang['warning']                      = "<h1>D�sol�!</h1><p>Nous sommes incapable de proc�der � votre requete actuellement. Merci de r�essayez plus tard.</p>";
    $lang['home_page']                    = "Page Principale";
    $lang['summary_page']                 = "Sommaire";
    $lang['log_out']                      = "D�connection";
    $lang['main_menu']                    = "Menu Principal";
    $lang['archive']                      = "Archive";
    $lang['user_homepage_sprt']           = "Profile: %1\$s";
    $lang['missing_field_javascript']     = "Compl�tez, s\'il vous plait, le champ manquant ";
    $lang['invalid_date_javascript']      = "Choisissez une date valide";
    $lang['finish_date_javascript']       = "La date entr�e d�passe la date de fin du projet !";
    $lang['security_manager']             = "Gestion Securit�";
    $lang['session_timeout_sprt']         = "Acc�s refus�, la derni�re action a �t� faite il y � %1\$d minutes et la temps limite d'une session est de %2\$d minutes, merci de vous  <a href=\"%3\$sindex.php\">re-connecter</a>";
    $lang['access_denied']                = "Acc�s refus�";
    $lang['private_usergroup_no_access']  = "D�sol�, cette zone est r�serv�e � un groupe d'utilisateurs  priv�. Vous n'y avez pas acc�s.";
    $lang['invalid_date']                 = "Date invalide";
    $lang['invalid_date_sprt']            = "La date %1\$s n'est pas une date correcte du calendrier (v�rifier le nombre de jour dans le mois). Merci de revenir en arri�re et d'entrer une date valide.";


 //taskgroups
    $lang['taskgroup_name']               = "Nom du groupe de t�ches:";
    $lang['taskgroup_description']        = "Description du groupe de t�ches:";
    $lang['add_taskgroup']                = "Ajouter le groupe de t�ches";
    $lang['add_new_taskgroup']            = "Ajouter un nouveau groupe de t�ches";
    $lang['edit_taskgroup']               = "Editer un groupe de t�ches";
    $lang['taskgroup_manage']             = "Gestion des groupes de t�ches";
    $lang['no_taskgroups']                = "Pas de groupe de t�ches d�fini";
    $lang['manage_taskgroups']            = "Gestion Groupe de t�ches";
    $lang['taskgroups']                   = "Groupes de t�ches";
    $lang['taskgroup_dup_sprt']           = "Le groupe de t�ches '%s' existe d�j�. Merci d'utiliser un autre nom.";
    $lang['info_taskgroup_manage']        = "Gestion des informations pour le groupe de t�ches";

 //usergroups
    $lang['usergroup_name']               = "Nom du groupe d'utilisateurs:";
    $lang['usergroup_description']        = "Description du groupe d'utilisateurs:";
    $lang['members']                      = "Membres:";
    $lang['private_usergroup']            = "Groupe d'utilisateur priv�";
    $lang['add_usergroup']                = "Ajouter au groupe d'utilisateurs";
    $lang['add_new_usergroup']            = "Ajouter un nouveau groupe d'utilisateurs";
    $lang['edit_usergroup']               = "Editer un groupe d'utilisateurs";
    $lang['usergroup_manage']             = "Gestion des groupes d'utilisateurs";
    $lang['no_usergroups']                = "Pas de groupe d'utilisateurs d�fini";
    $lang['manage_usergroups']            = "Gestion des groupes d'utilisateurs";
    $lang['usergroups']                   = "Groupes d'utilisateurs";
    $lang['usergroup_dup_sprt']           = "Le groupe d'utilisateurs '%s' existe d�j�. Merci d'utiliser un autre nom.";
    $lang['info_usergroup_manage']        = "Gestion des informations pour le groupe d'utilisateurs";

 //users
    $lang['login_name']                   = "Nom utilisateur";
    $lang['full_name']                    = "Nom complet";
    $lang['password']                     = "Mot de passe";
    $lang['blank_for_current_password']   = "(Laisser vide pour conserver le mot de passe actuel)";
    $lang['email']                        = "Courriel";
    $lang['admin']                        = "Admin";
    $lang['private_user']                 = "Utilisateur priv�";
    $lang['normal_user']                  = "Utilisateur Normal";
    $lang['is_admin']                     = "Administrateur";
    $lang['is_guest']                     = "Invit�";
    $lang['guest']                        = "Invit�";
    $lang['user_info']                    = "Information utilisateur";
    $lang['deleted_users']                = "Utilisateurs effac�s";
    $lang['no_deleted_users']             = "Il n'y aucun utilisateurs effac�s.";
    $lang['revive']                       = "R�activer";
    $lang['permdel']                      = "Effacer permament";
    $lang['permdel_javascript_sprt']      = "Ceci va effacer de mani�re permanente toutes les informations sur un utilisateur et ses t�ches associ�es pour %1\$s. Voulez vous r�ellement le faire?";
    $lang['add_user']                     = "Ajouter un utilisateur";
    $lang['edit_user']                    = "Editer un utilisateur";
    $lang['no_users']                     = "Aucun utilisateur connu sur ce syst�me";
    $lang['users']                        = "Utilisateurs";
    $lang['existing_users']               = "Utilisateurs existants";
    $lang['private_profile']              = "Vous ne pouvez voir le profil priv�de cet utilisateur.";
    $lang['private_usergroup_profile']    = "(Cet utilisateur est membre de groupes priv�s que vous ne pouvez visualiser.";
    $lang['email_users']                  = "Courriel utilisateurs";
    $lang['select_usergroup']             = "Groupe d'utilisateur s�lectionn�s de la liste ci-dessous:";
    $lang['subject']                      = "Sujet:";
    $lang['message_sent_maillist']        = "Dans tous les cas le message est aussi envoy� � la liste de diffusion.";
    $lang['who_online']                   = "Qui est connect�?";
    $lang['edit_details']                 = "Editer les informations utilisateur";
    $lang['show_details']                 = "Afficher les informations utilisateur";
    $lang['user_deleted']                 = "Cet utilisateur a �t� effac�!";
    $lang['no_usergroup']                 = "Cet utilisateur n'est membre d'aucun groupe";
    $lang['not_usergroup']                = "(Membre d'aucun groupe d'utilisateurs)";
    $lang['no_password_change']           = "(Votre mot de passe actuel n'a pas �t� chang�)";
    $lang['last_time_here']               = "Date de derni�re venue:";
    $lang['number_items_created']         = "Nombre d'�l�ments cr��s:";
    $lang['number_projects_owned']        = "Nombre de projets dont il est propri�taire:";
    $lang['number_tasks_owned']           = "Nombre de t�ches dont il est propri�taire:";
    $lang['number_tasks_completed']       = "Nombre de t�ches termin�es:";
    $lang['number_forum']                 = "Nombre de contributions:";
    $lang['number_files']                 = "Nombre de fichiers t�l�charg�s:";
    $lang['size_all_files']               = "Taille totale des fichiers dont il est propri�taire:";
    $lang['owned_tasks']                  = "T�ches � sa charge:";
    $lang['invalid_email']                = "Adresse courriel invalide";
    $lang['invalid_email_given_sprt']     = "Cette adresse courriel '%s' est invalide. Merci de revenir en arri�re et d'essayer � nouveau.";
    $lang['duplicate_user']               = "Utilisateur dupliqu�";
    $lang['duplicate_change_user_sprt']   = "Cet utilisateur '%s' existe d�j�.  Merci de revenir en arri�re et de changer son nom.";
    $lang['value_missing']                = "Information manquante";
    $lang['field_sprt']                   = "Le champ '%s' est manquant. Merci de revenir en arri�re et de le renseigner.";
    $lang['admin_priv']                   = "NOTE: Vous avez �t� promu administrateur.";
    $lang['manage_users']                 = "Gestion des utilisateurs";
    $lang['users_online']                 = "Utilisateurs connect�s";
    $lang['online']                       = "Utilisateurs connect�s (session activ�e depuis moins de 60 mins maintenant)";
    $lang['not_online']                   = "Les autres";
    $lang['user_activity']                = "Activit� utilisateur";

  //tasks
    $lang['add_new_task']                 = "Ajouter une nouvelle t�che";
    $lang['priority']                     = "Priorit�";
    $lang['parent_task']                  = "T�che parente";
    $lang['creation_time']                = "Date de cr�ation";
    $lang['by_sprt']                      = " %1\$s par %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']                 = "Nom du projet";
    $lang['task_name']                    = "Nom de la t�che";
    $lang['deadline']                     = "Date de fin";
    $lang['taken_from_parent']            = "(Pris depuis le parent)";
    $lang['status']                       = "Statut";
    $lang['task_owner']                   = "Propri�taire de la t�che";
    $lang['project_owner']                = "Propri�taire du projet";
    $lang['taskgroup']                    = "Groupe t�ches";
    $lang['usergroup']                    = "Groupe utilisateurs";
    $lang['nobody']                       = "Personne";
    $lang['none']                         = "Vide";
    $lang['no_group']                     = "Aucun groupe";
    $lang['all_groups']                   = "Tous les groupes";
    $lang['all_users']                    = "Tous les utilisateurs";
    $lang['all_users_view']               = "Tous les utilisateurs peuvent voir cet objet";
    $lang['group_edit']                   = "Tous les membres du groupe utilisateur peuvent �diter cet objet";
    $lang['project_description']          = "Description du projet";
    $lang['task_description']             = "Description de la t�che";
    $lang['email_owner']                  = "Envoyer un courriel au propri�taire avec les modifications ?";
    $lang['email_new_owner']              = "Envoyer un courriel au (nouveau) propri�taire avec les modifications ?";
    $lang['email_group']                  = "Envoyer un courriel au groupe d'utilisateurs avec les modifications ?";
    $lang['add_new_project']              = "Ajouter un nouveau projet";
    $lang['uncategorised']                = "Non class�";
    $lang['due_sprt']                     = "reste %d jours";
    $lang['tomorrow']                     = "Demain";
    $lang['due_today']                    = "Pour aujourd'hui";
    $lang['overdue_1']                    = "1 jour de retard";
    $lang['overdue_sprt']                 = "%d jours de retard";
    $lang['edit_task']                    = "�diter la t�che";
    $lang['edit_project']                 = "�diter le projet";
    $lang['no_reparent']                  = "Aucun (projet racine)";
    $lang['del_javascript_project_sprt']  = "Ceci va d�truire le projet %1\$s. Etes vous s�r?";
    $lang['del_javascript_task_sprt']     = "Ceci va d�truire la t�che %1\$s. Etes vous s�r?";
    $lang['add_task']                     = "Ajouter une t�che";
    $lang['add_subtask']                  = "Ajouter une sous t�che";
    $lang['add_project']                  = "Ajouter un projet";
    $lang['clone_project']                = "Cloner le projet";
    $lang['clone_task']                   = "Cloner la t�che";
    $lang['quick_jump']                   = "Acc�s Rapide";
    $lang['no_edit']                      = "Vous n'�tes pas propri�taire de cet �l�ment et vous ne pouvez pas l'�diter. Demandez � l'administrateur, ou au propri�taire de ces t�ches de le faire pour vous.";
    $lang['global']                       = "Global";
    $lang['delete_project']               = "D�truire le projet";
    $lang['delete_task']                  = "D�truire la t�che";
    $lang['project_options']              = "Options Projet";
    $lang['task_options']                 = "Options t�che";
    $lang['javascript_archive_project']   = "Ceci archivera le projet %s.  Voulez-vous continuer?";
    $lang['archive_project']              = "Archiver le project";
    $lang['task_navigation']              = "Navigation t�ches";
    $lang['new_task']                     = "Nouvelle T�che";
    $lang['no_projects']                  = "Pas de projet � afficher";
    $lang['show_all_projects']            = "Montrer tous les projets";
    $lang['show_active_projects']         = "Montrer seulement les projets actifs";
    $lang['completed']                    = "Termin�";
    $lang['project_hold_sprt']            = "Projet Suspendu sous controle de %s";
    $lang['project_planned']              = "Projet Planifi�";
    $lang['percent_sprt']                 = "%d%% des t�ches effectu�es";
    $lang['project_no_deadline']          = "Pas de date de fin pour ce projet";
    $lang['no_allowed_projects']          = "Aucun projet que vous �te autoris� d'afficher";
    $lang['projects']                     = "Projets";
    $lang['percent_project_sprt']         = "Ce projet est accompli � %d%%";
    $lang['owned_by']                     = "Propri�t� de ";
    $lang['created_on']                   = "Cr�� le";
    $lang['completed_on']                 = "Termin� le";
    $lang['modified_on']                  = "Modifi� le";
    $lang['project_on_hold']              = "Le projet est pr�sentement suspendu";
    $lang['project_accessible']           = "(Ce projet est publiquement accessible � tous les utilisateurs)";
    $lang['task_accessible']              = "(Cette t�che est publiquement accessible � tous les utilisateurs)";
    $lang['project_not_accessible']       = "(Ce projet est seulement accessible aux membres du groupe d'utilisateurs)";
    $lang['task_not_accessible']          = "(Cette t�che est seulement accessible aux membres du groupe d'utilisateurs)";
    $lang['project_not_in_usergroup']     = "Ce projet n'est pas attach� � un groupe d'utilisateurs et est accessible � tous.";
    $lang['task_not_in_usergroup']        = "Cette t�che n'est pas attach�e � un groupe d'utilisateurs et est accessible � tous.";
    $lang['usergroup_can_edit_project']   = "Ce projet peut aussi �tre �dit� par les membres du groupe d'utilisateurs.";
    $lang['usergroup_can_edit_task']      = "Cette t�che peut aussi �tre �dit�e par les membres du groupe d'utilisateurs.";
    $lang['i_take_it']                    = "Je prends la t�che";
    $lang['i_finished']                   = "Je l'ai termin�!";
    $lang['i_dont_want']                  = "Je n'en veux plus";
    $lang['take_over_project']            = "Je prends le projet";
    $lang['take_over_task']               = "Je prends la t�che";
    $lang['task_info']                    = "Information t�che ";
    $lang['project_details']              = "D�tails projet";
    $lang['todo_list_for']                = "Liste �-faire pour le : ";
    $lang['due_in_sprt']                  = " (� faire dans %d jours)";
    $lang['due_tomorrow']                 = " (� faire pour demain)";
    $lang['no_assigned']                  = "Il n'y a aucune t�che en cours confi�e � cet utilisateur.";
    $lang['todo_list']                    = "Liste �-faire";
    $lang['summary_list']                 = "Sommaire";
    $lang['task_submit']                  = "Modifier t�che";
    $lang['not_owner']                    = "Acc�s refus�, soit vous n'en �tes pas le propri�taire soit vous n'avez pas de droit dessus";
    $lang['missing_values']               = "Il y a des champs non renseign�es, merci de revenir en arri�re et d'essayer de nouveau";
    $lang['future']                       = "Futur";
    $lang['flags']                        = "Indicateurs";
    $lang['owner']                        = "Propri�taire";
    $lang['group']                        = "Groupe";
    $lang['by_usergroup']                 = " (par groupe d'utilisateur)";
    $lang['by_taskgroup']                 = " (par groupe de t�che)";
    $lang['by_deadline']                  = " (par date de fin)";
    $lang['by_status']                    = " (par statut)";
    $lang['by_owner']                     = " (par propri�taire)";
//** needs translation
    $lang['by_priority']                  = " (by priority)";
    $lang['project_cloned']               = "Projet � cloner :";
    $lang['task_cloned']                  = "T�che � cloner :";
    $lang['note_clone']                   = "Note : cette t�che sera clon�e comme un nouveau projet";

//bits 'n' pieces
    $lang['calendar']                     = "Calendrier";
    $lang['normal_version']               = "Version normale";
    $lang['print_version']                = "Version imprimable";
    $lang['condensed_view']               = "Vue r�duite";
    $lang['full_view']                    = "Vue compl�te";
    $lang['icalendar']                    = "iCalendar";


?>
