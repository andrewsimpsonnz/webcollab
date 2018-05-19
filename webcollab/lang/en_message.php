<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License; or (at your option) any later version.

  This program is distributed in the hope that it will be useful; but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not; write to the Free Software Foundation; Inc.; 675 Mass Ave;
  Cambridge; MA 02139; USA.


  Function:
  ---------

  Language files for 'en' (English)

  Maintainer: Andrew Simpson <andrewnz.simpson at gmail.com>

*/

//required language encodings
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "en" );

//dates
$month_array = array (NULL, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
$week_array = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' );

//task states

 //priorities
    $task_state['dontdo']               = "Don't do";
    $task_state['low']                  = "Low";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "High";
    $task_state['yesterday']            = "Yesterday!";
 //status
    $task_state['new']                  = "New";
    $task_state['planned']              = "Planned (not active)";
    $task_state['active']               = "Active (working on it)";
    $task_state['cantcomplete']         = "On Hold";
    $task_state['completed']            = "Completed";
    $task_state['done']                 = "Done";
    $task_state['task_planned']         = " Planned";
    $task_state['task_active']          = " Active";
 //project states
    $task_state['planned_project']      = "Planned project (not active)";
    $task_state['no_deadline_project']  = "No deadline set";
    $task_state['active_project']       = "Active project";

//common items
    $lang['description']                = "Description";
    $lang['name']                       = "Name";
    $lang['add']                        = "Add";
    $lang['update']                     = "Update";
    $lang['submit_changes']             = "Submit changes";
    $lang['continue']                   = "Continue";
    $lang['manage']                     = "Manage";
    $lang['edit']                       = "Edit";
    $lang['delete']                     = "Delete";
    $lang['del']                        = "Del";
    $lang['confirm_del_javascript']     = " Confirm delete!";
    $lang['yes']                        = "Yes";
    $lang['no']                         = "No";
    $lang['action']                     = "Action";
    $lang['task']                       = "Task";
    $lang['tasks']                      = "Tasks";
    $lang['project']                    = "Project";
    $lang['info']                       = "Info";
    $lang['bytes']                      = " bytes";
    $lang['select_instruct']            = "(Use ctrl to select more; or to select none)";
    $lang['member_groups']              = "The user is a member of the highlighted groups below (if any)";
    $lang['login']                      = "Login";
    $lang['login_action']               = "Login";
    $lang['login_screen']               = "Login";
    $lang['error']                      = "Error";
    $lang['no_login']                   = "Access denied; incorrect login or password";
    $lang['redirect_sprt']              = "You will automatically return to Login after a %d second delay";
    $lang['login_now']                  = "Please click here to return to Login now";
    $lang['please_login']               = "Please log in";
    $lang['go']                         = "Go!";

//graphic items
    $lang['late_g']                     = "&nbsp;LATE&nbsp;";
    $lang['new_g']                      = "&nbsp;NEW&nbsp;";
    $lang['updated_g']                  = "&nbsp;UPDATED&nbsp;";

//admin config
    $lang['admin_config']               = "Admin config";
    $lang['email_settings']             = "Email header settings";
    $lang['admin_email']                = "Admin email";
    $lang['email_reply']                = "Email 'reply to'";
    $lang['email_from']                 = "Email 'from'";
    $lang['mailing_list']               = "Mailing list";
    $lang['default_checkbox']           = "Default checkbox settings for Project/Tasks";
    $lang['allow_globalaccess']         = "Allow global access?";
    $lang['allow_group_edit']           = "Allow all in usergroup to edit?";
    $lang['set_email_owner']            = "Always email owner with changes?";
    $lang['set_email_group']            = "Always email usergroup with changes?";
    $lang['project_listing_order']      = "Project listing order";
    $lang['task_listing_order']         = "Task listing order";
    $lang['configuration']              = "Configuration";

//archive
    $lang['archived_projects']          = "Archived Projects";

//contacts
    $lang['firstname']                  = "Firstname:";
    $lang['lastname']                   = "Lastname:";
    $lang['company']                    = "Company:";
    $lang['home_phone']                 = "Home phone:";
    $lang['mobile']                     = "Mobile:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Business phone:";
    $lang['address']                    = "Address:";
    $lang['postal']                     = "Postal code:";
    $lang['city']                       = "City:";
    $lang['email_contact']              = "Email:";
    $lang['notes']                      = "Notes:";
    $lang['add_contact']                = "Add contact";
    $lang['del_contact']                = "Delete contact";
    $lang['contact_info']               = "Contact information";
    $lang['contacts']                   = "Contacts";
    $lang['contact_add_info']           = "If you add a company name then that will be displayed instead of the user's name.";
    $lang['show_contact']               = "Show contacts";
    $lang['edit_contact']               = "Edit contacts";
    $lang['contact_submit']             = "Contact submit";
    $lang['contact_warn']               = "There are not enough values to add a contact; please go back and add at least first name and last name";

 //files
    $lang['manage_files']               = "Manage files";
    $lang['no_files']                   = "There are no uploaded files to manage";
    $lang['no_file_uploads']            = "The server configuration for this site does not allow file uploads to be made";
    $lang['file']                       = "File:";
    $lang['uploader']                   = "Uploader:";
    $lang['files_assoc_project']        = "Files associated with this project";
    $lang['files_assoc_task']           = "Files associated with this task";
    $lang['file_admin']                 = "File admin";
    $lang['add_file']                   = "Add file";
    $lang['files']                      = "Files";
    $lang['file_choose']                = "File to upload:";
    $lang['upload']                     = "Upload";
    $lang['file_email_owner']           = "Email notification of new file to the owner?";
    $lang['file_email_usergroup']       = "Email notification of new file to the usergroup?";
    $lang['max_file_sprt']              = "File to upload must be less than %s kb.";
    $lang['file_submit']                = "File submit";
    $lang['no_upload']                  = "No file was uploaded.  Please go back and try again.";
    $lang['file_too_big_sprt']          = "The maximum upload size is %s bytes.  Your upload was too big and has been deleted.";
    $lang['del_file_javascript_sprt']   = "Are you sure you want to delete %s ?";


 //forum
    $lang['orig_message']               = "Original message:";
    $lang['post']                       = "Post it!";
    $lang['message']                    = "Message:";
    $lang['post_reply_sprt']            = "Post a reply to a message from '%1\$s' about '%2\$s'";
    $lang['post_message_sprt']          = "Post message to: '%s'";
    $lang['forum_email_owner']          = "Email forum message to the owner?";
    $lang['forum_email_usergroup']      = "Email forum message to the usergroup?";
    $lang['reply']                      = "Reply";
    $lang['new_post']                   = "New post";
    $lang['public_user_forum']          = "Public user forum";
    $lang['private_forum_sprt']         = "Private forum for '%s' usergroup";
    $lang['forum_submit']               = "Forum submit";
    $lang['no_message']                 = "No message! Please go back and try again";
    $lang['add_reply']                  = "Add reply";
    $lang['last_post_sprt']             = "Last post %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Recent forum posts";
    $lang['forum_search']               = "Forum search";
    $lang['no_results']                 = "No results found for '%s'";
    $lang['search_results']             = "Found %1\$s results for '%2\$s'<br />Showing results %3\$s to %4\$s";

 //includes
    $lang['report']                     = "Report";
    $lang['warning']                    = "<h1>Sorry!</h1><p>We are unable to process your request right now. Please try again later.</p>";
    $lang['home_page']                  = "Home page";
    $lang['summary_page']               = "Summary page";
    $lang['log_out']                    = "Log out";
    $lang['main_menu']                  = "Main menu";
    $lang['archive']                    = "Archive";
    $lang['user_homepage_sprt']         = "%s's homepage";
    $lang['missing_field_javascript']   = "Please enter a value for the missing field";
    $lang['invalid_date_javascript']    = "Please choose a valid calendar date";
    $lang['finish_date_javascript']     = "The entered date occurs after the project finish date!";
    $lang['security_manager']           = "Security manager";
    $lang['session_timeout_sprt']       = "Access denied; last action was %1\$d minutes ago and the timeout is %2\$d minutes; please <a href=\"%3\$sindex.php\">re-login</a>";
    $lang['access_denied']              = "Access denied";
    $lang['private_usergroup_no_access']= "Sorry; this area is in a private usergroup and you do not have access rights.";
    $lang['invalid_date']               = "Invalid date";
    $lang['invalid_date_sprt']          = "The date of %s is not a valid calendar date (Check the number of days in month).<br />Please go back and re-enter a valid date.";


 //taskgroups
    $lang['taskgroup_name']             = "Taskgroup name:";
    $lang['taskgroup_description']      = "Taskgroup simple description:";
    $lang['add_taskgroup']              = "Add taskgroup";
    $lang['add_new_taskgroup']          = "Add a new taskgroup";
    $lang['edit_taskgroup']             = "Edit taskgroup";
    $lang['taskgroup_manage']           = "Taskgroups management";
    $lang['no_taskgroups']              = "No taskgroups are defined";
    $lang['manage_taskgroups']          = "Manage taskgroups";
    $lang['taskgroups']                 = "Taskgroups";
    $lang['taskgroup_dup_sprt']         = "There is already a taskgroup '%s'.  Please go back and choose a new name.";
    $lang['info_taskgroup_manage']      = "Info for taskgroup management";

 //usergroups
    $lang['usergroup_name']             = "Usergroup name:";
    $lang['usergroup_description']      = "Usergroup simple description:";
    $lang['members']                    = "Members:";
    $lang['private_usergroup']          = "Private usergroup";
    $lang['add_usergroup']              = "Add usergroup";
    $lang['add_new_usergroup']          = "Add a new usergroup";
    $lang['edit_usergroup']             = "Edit usergroup";
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Usergroups management";
    $lang['no_usergroups']              = "No usergroups are defined";
    $lang['manage_usergroups']          = "Manage usergroups";
    $lang['usergroups']                 = "Usergroups";
    $lang['usergroup_dup_sprt']         = "There is already a usergroup '%s'.  Please go back and choose a new name.";
    $lang['info_usergroup_manage']      = "Info for usergroup management";

 //users
    $lang['login_name']                 = "Login name";
    $lang['full_name']                  = "Full name";
    $lang['password']                   = "Password";
    $lang['blank_for_current_password'] = "(Leave blank for current password)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Admin";
    $lang['private_user']               = "Private user";
    $lang['normal_user']                = "Normal user";
    $lang['is_admin']                   = "Is an admin?";
    $lang['is_guest']                   = "Is a guest?";
    $lang['guest']                      = "Guest user";
    $lang['user_info']                  = "User information";
    $lang['deleted_users']              = "Deleted users";
    $lang['no_deleted_users']           = "There are no deleted users.";
    $lang['revive']                     = "Revive";
    $lang['permdel']                    = "Permdel";
    $lang['permdel_javascript_sprt']    = "This will permanently delete all user records and associated tasks for %s. Do you really want to do this?";
    $lang['add_user']                   = "Add a user";
    $lang['edit_user']                  = "Edit a user";
    $lang['no_users']                   = "No users are known to the system";
    $lang['users']                      = "Users";
    $lang['existing_users']             = "Existing users";
    $lang['private_profile']            = "This user has a private profile that cannot be viewed by you.";
    $lang['private_usergroup_profile']  = "(This user is a member of private usergroups that cannot be viewed by you)";
    $lang['email_users']                = "Email users";
    $lang['select_usergroup']           = "Usergroup selected from below:";
    $lang['subject']                    = "Subject:";
    $lang['message_sent_maillist']      = "In all cases the message is also copied to the mailing list.";
    $lang['who_online']                 = "Who is online?";
    $lang['edit_details']               = "Edit user details";
    $lang['show_details']               = "Show user details";
    $lang['user_deleted']               = "This user has been deleted!";
    $lang['no_usergroup']               = "The user is not a member of any usergroups";
    $lang['not_usergroup']              = "(Not a member of any usergroup)";
    $lang['no_password_change']         = "(Your existing password has not changed)";
    $lang['last_time_here']             = "Last time seen here:";
    $lang['number_items_created']       = "Number of items created:";
    $lang['number_projects_owned']      = "Number of projects owned:";
    $lang['number_tasks_owned']         = "Number of tasks owned:";
    $lang['number_tasks_completed']     = "Number of tasks completed:";
    $lang['number_forum']               = "Number of forum posts:";
    $lang['number_files']               = "Number of uploaded files:";
    $lang['size_all_files']             = "Total size of all owned files:";
    $lang['owned_tasks']                = "Owned tasks";
    $lang['invalid_email']              = "Invalid email address";
    $lang['invalid_email_given_sprt']   = "The email address '%s' is invalid.  Please go back and try again.";
    $lang['duplicate_user']             = "Duplicate user";
    $lang['duplicate_change_user_sprt'] = "The user '%s' already exists.  Please go back change one name.";
    $lang['value_missing']              = "Value missing";
    $lang['field_sprt']                 = "The field for '%s' is missing. Please go back and fill it in.";
    $lang['admin_priv']                 = "NOTE: You have been granted administrator privileges.";
    $lang['manage_users']               = "Manage users";
    $lang['users_online']               = "Users online";
    $lang['online']                     = "Die hard surfers (Online less than 60 mins ago)";
    $lang['not_online']                 = "The rest";
    $lang['user_activity']              = "User activity";

  //tasks
    $lang['add_new_task']               = "Add a new task";
    $lang['priority']                   = "Priority";
    $lang['parent_task']                = "Parent";
    $lang['creation_time']              = "Creation time";
    $lang['by_sprt']                    = "%1\$s by %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Project name";
    $lang['task_name']                  = "Task name";
    $lang['deadline']                   = "Deadline";
    $lang['taken_from_parent']          = "(Taken from parent)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Task owner";
    $lang['project_owner']              = "Project owner";
    $lang['taskgroup']                  = "Taskgroup";
    $lang['usergroup']                  = "Usergroup";
    $lang['nobody']                     = "Nobody";
    $lang['none']                       = "None";
    $lang['no_group']                   = "No group";
    $lang['all_groups']                 = "All groups";
    $lang['all_users']                  = "All users";
    $lang['all_users_view']             = "All users can view this item?";
    $lang['group_edit']                 = "Anyone in the usergroup can edit?";
    $lang['project_description']        = "Project description";
    $lang['task_description']           = "Task description";
    $lang['email_owner']                = "Send an email to the owner with the changes?";
    $lang['email_new_owner']            = "Send an email to the (new) owner with the changes?";
    $lang['email_group']                = "Send an email to the usergroup with the changes?";
    $lang['add_new_project']            = "Add a new project";
    $lang['uncategorised']              = "Uncategorised";
    $lang['due_sprt']                   = "%d days from now";
    $lang['tomorrow']                   = "Tomorrow";
    $lang['due_today']                  = "Due today";
    $lang['overdue_1']                  = "1 day overdue";
    $lang['overdue_sprt']               = "%d days overdue";
    $lang['edit_task']                  = "Edit task";
    $lang['edit_project']               = "Edit project";
    $lang['no_reparent']                = "None (a top-level project)";
    $lang['del_javascript_project_sprt']= "This will delete project %s. Are you sure?";
    $lang['del_javascript_task_sprt']   = "This will delete task %s. Are you sure?";
    $lang['add_task']                   = "Add task";
    $lang['add_subtask']                = "Add subtask";
    $lang['add_project']                = "Add project";
    $lang['clone_project']              = "Clone project";
    $lang['clone_task']                 = "Clone task";
    $lang['quick_jump']                 = "Quick Jump";
    $lang['no_edit']                    = "You do not own this item and therefore you may not edit it";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "Delete project";
    $lang['delete_task']                = "Delete task";
    $lang['project_options']            = "Project options";
    $lang['task_options']               = "Task options";
    $lang['javascript_archive_project'] = "This will archive project %s.  Are you sure?";
    $lang['archive_project']            = "Archive project";
    $lang['task_navigation']            = "Task navigation";
    $lang['new_task']                   = "New task";
    $lang['no_projects']                = "There are no projects to view";
    $lang['show_all_projects']          = "Show all projects";
    $lang['show_active_projects']       = "Show only active projects";
    $lang['project_hold_sprt']          = "Project On Hold from %s";
    $lang['project_planned']            = "Planned Project";
    $lang['percent_sprt']               = "%d%% of the tasks are done";
    $lang['project_no_deadline']        = "No deadline set for this project";
    $lang['no_allowed_projects']        = "There are no projects that you are allowed to view";
    $lang['projects']                   = "Projects";
    $lang['percent_project_sprt']       = "This project is %d%% completed";
    $lang['owned_by']                   = "Owned by";
    $lang['created_on']                 = "Created on";
    $lang['completed_on']               = "Completed on";
    $lang['modified_on']                = "Modified on";
    $lang['project_on_hold']            = "Project is on hold";
    $lang['project_accessible']         = "(This project is publicly accessible by all users)";
    $lang['task_accessible']            = "(This task is publicly accessible by all users)";
    $lang['project_not_accessible']     = "(This project is only accessible by members of the usergroup)";
    $lang['task_not_accessible']        = "(This task is only accessible by members of the usergroup)";
    $lang['project_not_in_usergroup']   = "This project is not part of a usergroup and is accessible by all users.";
    $lang['task_not_in_usergroup']      = "This task is not part of a usergroup and is accessible by all users.";
    $lang['usergroup_can_edit_project'] = "This project can also be edited by members of the usergroup.";
    $lang['usergroup_can_edit_task']    = "This task can also be edited by members of the usergroup.";
    $lang['i_take_it']                  = "I'll take it :)";
    $lang['i_finished']                 = "I finished it!";
    $lang['i_dont_want']                = "I don't want it anymore";
    $lang['take_over_project']          = "Take over project";
    $lang['take_over_task']             = "Take over task";
    $lang['task_info']                  = "Task information";
    $lang['project_details']            = "Project details";
    $lang['todo_list_for']              = "ToDo list for: ";
    $lang['due_in_sprt']                = " (Due in %d days)";
    $lang['due_tomorrow']               = " (Due tomorrow)";
    $lang['no_assigned']                = "There are no uncompleted tasks assigned to this user.";
    $lang['todo_list']                  = "ToDo list";
    $lang['summary_list']               = "Summary list";
    $lang['task_submit']                = "Task submit";
    $lang['not_owner']                  = "Access denied. Either you are not the owner; or you do not have enough rights";
    $lang['missing_values']             = "There are not enough field values provided; please go back and try again";
    $lang['future']                     = "Future";
    $lang['flags']                      = "Flags";
    $lang['owner']                      = "Owner";
    $lang['group']                      = "Group";
    $lang['by_usergroup']               = " (by usergroup)";
    $lang['by_taskgroup']               = " (by taskgroup)";
    $lang['by_deadline']                = " (by deadline)";
    $lang['by_status']                  = " (by status)";
    $lang['by_owner']                   = " (by owner)";
    $lang['by_priority']                = " (by priority)";
    $lang['project_cloned']             = "Project to be cloned :";
    $lang['task_cloned']                = "Task to be cloned :";
    $lang['note_clone']                 = "Note: The task will be cloned as a new project";

//bits 'n' pieces
    $lang['calendar']                   = "Calendar";
    $lang['normal_version']             = "Normal version";
    $lang['print_version']              = "Print version";
    $lang['condensed_view']             = "Condensed view";
    $lang['full_view']                  = "Full view";
    $lang['icalendar']                  = "iCalendar";
    $lang['url_javascript']             = "Enter the URL:";
    $lang['image_url_javascript']       = "Enter the image URL:";

?>