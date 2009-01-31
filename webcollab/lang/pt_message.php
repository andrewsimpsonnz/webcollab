<?php
/*
  $Id: pt-br_message.php 1920 2008-01-30 07:52:11Z andrewsimpson $

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

  Email text language files for 'pt' (Portuguese Standard)

  Translation: A. Madeira <amadeirax at gmail.com>

*/
//required language encodings
define('CHARACTER_SET', 'ISO-8859-1' );

//xml language identifier
define('XML_LANG', "pt" );

//dates
$month_array = array (NULL, 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' );
$week_array = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' );

//task states

 //priorities
    $task_state['dontdo']               = "N�o fazer";
    $task_state['low']                  = "Baixa";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "Alta";
    $task_state['yesterday']            = "Para ontem!!";
 //status
    $task_state['new']                  = "Nova";
    $task_state['planned']              = "Planeada (n�o activa)";
    $task_state['active']               = "Activa (a decorrer)";
    $task_state['cantcomplete']         = "Em espera";
    $task_state['completed']            = "Finalizada";
    $task_state['done']                 = "Pronta";
    $task_state['task_planned']         = " Planeada";
    $task_state['task_active']          = " Activa";
 //project states
    $task_state['planned_project']      = "Projecto planeado (n�o activo)";
    $task_state['no_deadline_project']  = "Sem prazo definido";
    $task_state['active_project']       = "Projecto activo";

//common items
    $lang['description']                = "Descri��o";
    $lang['name']                       = "Nome";
    $lang['add']                        = "Adicionar";
    $lang['update']                     = "Actualizar";
    $lang['submit_changes']             = "Enviar altera��es";
    $lang['continue']                   = "Continuar";
    $lang['manage']                     = "Gerir";
    $lang['edit']                       = "Editar";
    $lang['delete']                     = "Eliminar";
    $lang['del']                        = "Eliminar";
    $lang['confirm_del_javascript']     = " Confirme que quer eliminar!";
    $lang['yes']                        = "Sim";
    $lang['no']                         = "N�o";
    $lang['action']                     = "Ac��o";
    $lang['task']                       = "Tarefa";
    $lang['tasks']                      = "Tarefas";
    $lang['project']                    = "Projecto";
    $lang['info']                       = "Informa��o";
    $lang['bytes']                      = "bytes";
    $lang['select_instruct']            = "(Premir Ctrl para anular selec��o ou para seleccionar mais do que um)";
    $lang['member_groups']              = "O utilizador � membro das equipas real�adas em baixo (caso existam)";
    $lang['login']                      = "Utilizador";
    $lang['login_action']               = "Entrada";
    $lang['login_screen']               = "Utilizador";
    $lang['error']                      = "Erro";
    $lang['no_login']                   = "Acesso negado, verifique nome de utilizador e palavra-passe";
    $lang['redirect_sprt']              = "Redireccionamento para a p�gina de entrada em %d segundos";
    $lang['login_now']                  = "Por favor, clique aqui para voltar agora � p�gina de entrada";
    $lang['please_login']               = "Identifique-se por favor";
    $lang['go']                         = "Continuar!";

//graphic items
    $lang['late_g']                     = "&nbsp;ATRASADO&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;ACTUALIZADO&nbsp;";

//admin config
    $lang['admin_config']               = "Config. administrativas";
    $lang['email_settings']             = "Configura��o do cabe�alho de e-mail";
    $lang['admin_email']                = "E-mail administrativo";
    $lang['email_reply']                = "'Responder' para";
    $lang['email_from']                 = "'De'";
    $lang['mailing_list']               = "Lista de e-mails";
    $lang['default_checkbox']           = "Configura��o por defeito para Projectos/Tarefas";
    $lang['allow_globalaccess']         = "Permitir acesso global?";
    $lang['allow_group_edit']           = "Permitir edi��o por todos os membros da equipa?";
    $lang['set_email_owner']            = "Sempre notificar respons�vel acerca de mudan�as?";
    $lang['set_email_group']            = "Sempre notificar equipa acerca de mudan�as?";
    $lang['project_listing_order']      = "Ordena��o da listagem dos projectos";
    $lang['task_listing_order']         = "Ordena��o da listagem das tarefas";
    $lang['configuration']              = "Configura��o";

//archive
    $lang['archived_projects']          = "Projectos arquivados";

//contacts
    $lang['firstname']                  = "Nome:";
    $lang['lastname']                   = "Apelido:";
    $lang['company']                    = "Empresa:";
    $lang['home_phone']                 = "Tel. Res.:";
    $lang['mobile']                     = "Tel. M�v.:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Tel. Emp.:";
    $lang['address']                    = "Morada:";
    $lang['postal']                     = "C�digo Postal:";
    $lang['city']                       = "Localidade:";
    $lang['email_contact']              = "E-mail:";
    $lang['notes']                      = "OBS:";
    $lang['add_contact']                = "Adicionar contacto";
    $lang['del_contact']                = "Eliminar contacto";
    $lang['contact_info']               = "Informa��o do contacto";
    $lang['contacts']                   = "Contactos";
    $lang['contact_add_info']           = "Se estiver preenchido, o nome da empresa ser� exibido em lugar do nome do utilizador.";
    $lang['show_contact']               = "Exibir contactos";
    $lang['edit_contact']               = "Editar contactos";
    $lang['contact_submit']             = "Enviar contacto";
    $lang['contact_warn']               = "Campos insuficientes, por favor volte atr�s e preencha, no m�nimo, Nome e Apelido";

 //files
    $lang['manage_files']               = "Gerir Ficheiros";
    $lang['no_files']                   = "N�o existem ficheiros para gerir";
    $lang['no_file_uploads']            = "O servidor foi configurado para n�o aceitar o envio de ficheiros";
    $lang['file']                       = "Ficheiro:";
    $lang['uploader']                   = "De:";
    $lang['files_assoc_project']        = "Ficheiros relacionados com o projecto";
    $lang['files_assoc_task']           = "Ficheiros relacionados com a tarefa";
    $lang['file_admin']                 = "Administra��o de ficheiros";
    $lang['add_file']                   = "Adicionar ficheiro";
    $lang['files']                      = "Ficheiros";
    $lang['file_choose']                = "Ficheiro a ser enviado:";
    $lang['upload']                     = "Enviar";
    $lang['file_email_owner']           = "Notificar respons�vel sobre o novo ficheiro?";
    $lang['file_email_usergroup']       = "Notificar equipa sobre o novo ficheiro?";
    $lang['max_file_sprt']              = "O ficheiro a ser enviado deve ter menos de %s kb.";
    $lang['file_submit']                = "Enviar ficheiro";
    $lang['no_upload']                  = "O ficheiro n�o foi enviado. Por favor, volte e tente novamente.";
    $lang['file_too_big_sprt']          = "O tamanho m�ximo para envio de ficheiros � de %s bytes. O ficheiro enviado foi eliminado por exceder tais limites.";
    $lang['del_file_javascript_sprt']   = "Tem a certeza de que quer eliminar %s ?";


 //forum
    $lang['orig_message']               = "Mensagem original:";
    $lang['post']                       = "Publicar!";
    $lang['message']                    = "Mensagem:";
    $lang['post_reply_sprt']            = "Publicar uma resposta � mensagem de '%1\$s' sobre '%2\$s'";
    $lang['post_message_sprt']          = "Publicar mensagem para: '%s'";
    $lang['forum_email_owner']          = "Notificar respons�vel sobre publica��o?";
    $lang['forum_email_usergroup']      = "Notificar equipa sobre publica��o?";
    $lang['reply']                      = "Responder";
    $lang['new_post']                   = "Nova publica��o";
    $lang['public_user_forum']          = "F�rum p�blico";
    $lang['private_forum_sprt']         = "F�rum privado para a equipa '%s' ";
    $lang['forum_submit']               = "Enviar para o f�rum";
    $lang['no_message']                 = "Sem mensagens! Por favor, regresse e tente novamente";
    $lang['add_reply']                  = "Adicionar resposta";
    $lang['last_post_sprt']             = "�ltima mensagem publicada em %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Publica��es recentes no f�rum";
//**
    $lang['forum_search']               = "Pesquisa no f�rum";
//**
    $lang['no_results']                 = "Sem resultados para '%s'";
//**
    $lang['search_results']             = "Encontrado(s) %1\$s resultado(s) para '%2\$s'<br />Exibindo resultado %3\$s de %4\$s";

 //includes
    $lang['report']                     = "Relat�rio";
    $lang['warning']                    = "<h1>Desculpe!</h1><p>Neste momento � imposs�vel processar o solicitado. Por favor, tente outra vez mais tarde.</p>";
    $lang['home_page']                  = "In�cio";
    $lang['summary_page']               = "Sum�rio";
    $lang['log_out']                    = "Sair";
    $lang['main_menu']                  = "Menu Principal";
    $lang['archive']                    = "Arquivo";
    $lang['user_homepage_sprt']         = "P�gina principal para %s'";
    $lang['missing_field_javascript']   = "Por favor, introduza um valor para o campo em falta";
    $lang['invalid_date_javascript']    = "Por favor, escolha uma data v�lida no calend�rio";
    $lang['finish_date_javascript']     = "A data fornecida � posterior ao t�rmino do projecto!";
    $lang['security_manager']           = "Seguran�a";
    $lang['session_timeout_sprt']       = "Acesso negado. �ltima ac��o h� %1\$d minutos sendo que o intervalo m�ximo de inactividade � de %2\$d minutos. Por favor <a href=\"%3\$sindex.php\">entre</a> novamente";
    $lang['access_denied']              = "Acesso negado";
    $lang['private_usergroup_no_access']= "Desculpe, �rea privada de uma equipa da qual voc� n�o faz parte.";
    $lang['invalid_date']               = "Data inv�lida";
    $lang['invalid_date_sprt']          = "A data %s n�o existe no calend�rio (verifique o n�mero de dias no m�s).<br/>Por favor, regresse e escolha outra data.";

 //taskgroups
    $lang['taskgroup_name']             = "Grupo de tarefas:";
    $lang['taskgroup_description']      = "Breve descri��o:";
    $lang['add_taskgroup']              = "Adicionar";
    $lang['add_new_taskgroup']          = "Adicionar um novo grupo de tarefas";
    $lang['edit_taskgroup']             = "Editar grupo de tarefas";
    $lang['taskgroup_manage']           = "Gerir";
    $lang['no_taskgroups']              = "Sem grupo de tarefas";
    $lang['manage_taskgroups']          = "Gerir grupos de tarefas";
    $lang['taskgroups']                 = "Grupos de tarefas";
    $lang['taskgroup_dup_sprt']         = "J� existe um grupo de tarefas chamado '%s'. Por favor, regresse e escolha outro nome.";
    $lang['info_taskgroup_manage']      = "Informa��es sobre gest�o de grupo de tarefas";

 //usergroups
    $lang['usergroup_name']             = "Equipa:";
    $lang['usergroup_description']      = "Breve descri��o da equipa:";
    $lang['members']                    = "Membros:";
    $lang['private_usergroup']          = "Equipa privada";
    $lang['add_usergroup']              = "Adicionar equipa";
    $lang['add_new_usergroup']          = "Adicionar nova equipa";
    $lang['edit_usergroup']             = "Editar equipa";
    $lang['usergroup_manage']           = "Gerir equipa";
    $lang['no_usergroups']              = "Sem equipa";
    $lang['manage_usergroups']          = "Gereir equipas";
    $lang['usergroups']                 = "Equipas";
    $lang['usergroup_dup_sprt']         = "J� existe uma equipa chamada '%s'. Por favor, regresse e escolha outro nome.";
    $lang['info_usergroup_manage']      = "Informa��es sobre gest�o de equipas";

 //users
    $lang['login_name']                 = "Nome de utilizador";
    $lang['full_name']                  = "Nome completo";
    $lang['password']                   = "Palavra-passe";
    $lang['blank_for_current_password'] = "(Deixe em branco para manter a palavra-passe actual)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Administra��o";
    $lang['private_user']               = "Utilizador privado";
    $lang['normal_user']                = "Utilizador normal";
    $lang['is_admin']                   = "Configurar como administrador?";
    $lang['is_guest']                   = "Configurar como visitante?";
    $lang['guest']                      = "Visitante";
    $lang['user_info']                  = "Informa��o de utilizador";
    $lang['deleted_users']              = "Utilizadores eliminados";
    $lang['no_deleted_users']           = "N�o existem utilizadores eliminados.";
    $lang['revive']                     = "Recuperar";
    $lang['permdel']                    = "Eliminar definitivamente";
    $lang['permdel_javascript_sprt']    = "Isto ir� eliminar permanentemente todos os registos e tarefas associados ao utilizador %s. Quer mesmo fazer isso?";
    $lang['add_user']                   = "Adicionar utilizador";
    $lang['edit_user']                  = "Editar utilizador";
    $lang['no_users']                   = "O sistema n�o possui utilizadores";
    $lang['users']                      = "Utilizadores";
    $lang['existing_users']             = "Utilizadores existentes";
    $lang['private_profile']            = "Este utilizador possui perfil privado que n�o pode ser visualizado por si.";
    $lang['private_usergroup_profile']  = "(Este utilizador � membro de uma equipa privada e n�o pode ser visualizado por si)";
    $lang['email_users']                = "Enviar e-mail para utilizadores";
    $lang['select_usergroup']           = "Equipa seleccionada abaixo:";
    $lang['subject']                    = "Assunto:";
    $lang['message_sent_maillist']      = "Em todos os casos a mensagem � tamb�m copiada para a lista de e-mails.";
    $lang['who_online']                 = "Quem est� ligado?";
    $lang['edit_details']               = "Editar detalhes";
    $lang['show_details']               = "Exibir detalhes";
    $lang['user_deleted']               = "Este utilizador foi eliminado!";
    $lang['no_usergroup']               = "O utilizador n�o � membro de uma equipa";
    $lang['not_usergroup']              = "(N�o � membro de nenhuma equipa)";
    $lang['no_password_change']         = "(A sua palavra-passe n�o foi alterada)";
    $lang['last_time_here']             = "�ltimo acesso:";
    $lang['number_items_created']       = "N� de �tens criados:";
    $lang['number_projects_owned']      = "N� de projectos sob sua responsabilidade:";
    $lang['number_tasks_owned']         = "N� de tarefas sob sua responsabilidade:";
    $lang['number_tasks_completed']     = "N� de tarefas finalizadas:";
    $lang['number_forum']               = "N� de publica��es em f�runs:";
    $lang['number_files']               = "N� de ficheiros enviados:";
    $lang['size_all_files']             = "Tamanho total de ficheiros enviados:";
    $lang['owned_tasks']                = "Tarefas sob sua responsabilidade";
    $lang['invalid_email']              = "Endere�o de e-mail inv�lido";
    $lang['invalid_email_given_sprt']   = "O endere�o de e-mail '%s' � inv�lido. Por favor, retorne e tente novamente.";
    $lang['duplicate_user']             = "Duplicar utilizador";
    $lang['duplicate_change_user_sprt'] = "O utilizador '%s' j� existe. Por favor, retorne e mude um dos nomes.";
    $lang['value_missing']              = "Dado em falta";
    $lang['field_sprt']                 = "O campo para o dado '%s' est� em falta. Por favor, retorne e preencha-o.";
    $lang['admin_priv']                 = "OBS: Possui privil�gios de administrador.";
    $lang['manage_users']               = "Gerir utilizadores";
    $lang['users_online']               = "Utilizadores ligados";
    $lang['online']                     = "Utilizadores persistentes (Ligaram h� menos de 60 minutos)";
    $lang['not_online']                 = "Os restantes";
    $lang['user_activity']              = "Actividade do utilizador";

  //tasks
    $lang['add_new_task']               = "Adicionar nova tarefa";
    $lang['priority']                   = "Prioridade";
    $lang['parent_task']                = "Relac�o";
    $lang['creation_time']              = "Data de cria��o";
    $lang['by_sprt']                    = "%1\$s por %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Nome do Projecto";
    $lang['task_name']                  = "Nome da tarefa";
    $lang['deadline']                   = "Prazo";
    $lang['taken_from_parent']          = "(Obtida da tarefa-principal)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Respons�vel pela Tarefa";
    $lang['project_owner']              = "Respons�vel pelo Projecto";
    $lang['taskgroup']                  = "Grupo de tarefas";
    $lang['usergroup']                  = "Equipa";
    $lang['nobody']                     = "Ningu�m";
    $lang['none']                       = "Nenhum";
    $lang['no_group']                   = "Sem equipa";
    $lang['all_groups']                 = "Todas as equipas";
    $lang['all_users']                  = "Todos os utilizadores";
    $lang['all_users_view']             = "Vis�vel para todos os utilizadores?";
    $lang['group_edit']                 = "Edit�vel por qualquer membro da equipa?";
    $lang['project_description']        = "Descri��o do projecto";
    $lang['task_description']           = "Descri��o da tarefa";
    $lang['email_owner']                = "Notificar respons�vel acerca das altera��es?";
    $lang['email_new_owner']            = "Notificar (novo) respons�vel acerca das altera��es?";
    $lang['email_group']                = "Notificar equipa acerca das altera��es?";
    $lang['add_new_project']            = "Adicionar novo projecto";
    $lang['uncategorised']              = "N�o-categorizado";
    $lang['due_sprt']                   = "Para daqui a %d dias";
    $lang['tomorrow']                   = "Amanh�";
    $lang['due_today']                  = "At� hoje";
    $lang['overdue_1']                  = "Atrasado 1 dia";
    $lang['overdue_sprt']               = "Atrasado %d dias";
    $lang['edit_task']                  = "Editar tarefa";
    $lang['edit_project']               = "Editar projecto";
    $lang['no_reparent']                = "Nenhum (projecto principal)";
    $lang['del_javascript_project_sprt']= "Isto ir� eliminar o projecto %s. Tem a certeza?";
    $lang['del_javascript_task_sprt']   = "Isto ir� eliminar a tarefa %s. Tem a certeza?";
    $lang['add_task']                   = "Adicionar tarefa";
    $lang['add_subtask']                = "Adicionar sub-tarefa";
    $lang['add_project']                = "Adicionar projecto";
    $lang['clone_project']              = "Clonar projecto";
    $lang['clone_task']                 = "Clonar tarefa";
    $lang['quick_jump']                 = "Salto r�pido";
    $lang['no_edit']                    = "O �tem n�o est� sob sua responsabilidade, portanto n�o pode edit�-lo";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "Eliminar projecto";
    $lang['delete_task']                = "Eliminar tarefa";
    $lang['project_options']            = "Op��es do projecto";
    $lang['task_options']               = "Op��es da tarefa";
    $lang['javascript_archive_project'] = "Isto ir� arquivar o projecto %s.  Tem a certeza?";
    $lang['archive_project']            = "Arquivar projecto";
    $lang['task_navigation']            = "Navegar pela tarefa";
    $lang['new_task']                   = "Nova tarefa";
    $lang['no_projects']                = "N�o existem projectos para visualizar";
    $lang['show_all_projects']          = "Exibir todos os projectos";
    $lang['show_active_projects']       = "Exibir apenas os projectos activos";
    $lang['project_hold_sprt']          = "Projecto em espera desde %s";
    $lang['project_planned']            = "Projecto planeado";
    $lang['percent_sprt']               = "%d%% da tarefa conclu�da";
    $lang['project_no_deadline']        = "O projecto n�o possui prazo definido";
    $lang['no_allowed_projects']        = "N�o existem projectos que voc� esteja autorizado/a a visualizar";
    $lang['projects']                   = "Projectos";
    $lang['percent_project_sprt']       = "Este projecto est� %d%% conclu�do";
    $lang['owned_by']                   = "Respons�vel";
    $lang['created_on']                 = "Criado em";
    $lang['completed_on']               = "Finalizado em";
    $lang['modified_on']                = "Modificado em";
    $lang['project_on_hold']            = "Projecto est� em espera";
    $lang['project_accessible']         = "(Projecto aced�vel por todos os utilizadores)";
    $lang['task_accessible']            = "(Tarefa aced�vel por todos os utilizadores)";
    $lang['project_not_accessible']     = "(Projecto aced�vel apenas por membros da equipa)";
    $lang['task_not_accessible']        = "(Tarefa aced�vel apenas por membros da equipa)";
    $lang['project_not_in_usergroup']   = "Este projecto n�o pertence a nenhuma equipa e � aced�vel por todos.";
    $lang['task_not_in_usergroup']      = "Esta tarefa n�o pertence a nenhuma equipa e � aced�vel por todos.";
    $lang['usergroup_can_edit_project'] = "Este projecto pode ser editado tamb�m por membros da equipa.";
    $lang['usergroup_can_edit_task']    = "Esta tarefa pode ser editada tamb�m por membros da equipa.";
    $lang['i_take_it']                  = "Eu trato disto :)";
    $lang['i_finished']                 = "Terminei!";
    $lang['i_dont_want']                = "Passo a bola";
    $lang['take_over_project']          = "Assumir projecto";
    $lang['take_over_task']             = "Assumir tarefa";
    $lang['task_info']                  = "Informa��o da tarefa";
    $lang['project_details']            = "Detalhes do projecto";
    $lang['todo_list_for']              = "Lista 'A Fazer' para: ";
    $lang['due_in_sprt']                = "(Prazo de %d dias)";
    $lang['due_tomorrow']               = "(Para amanh�)";
    $lang['no_assigned']                = "N�o existem tarefas incompletas designadas para este utilizador.";
    $lang['todo_list']                  = "A Fazer";
    $lang['summary_list']               = "Sum�rio";
    $lang['task_submit']                = "Enviar tarefa";
    $lang['not_owner']                  = "Acesso negado, ou voc� n�o � o respons�vel ou n�o possui direitos de acesso";
    $lang['missing_values']             = "Campos preenchidos insuficientes, por favor retorne e tente novamente";
    $lang['future']                     = "Futuro";
    $lang['flags']                      = "Marcadores";
    $lang['owner']                      = "Respons�vel";
    $lang['group']                      = "Equipa";
    $lang['by_usergroup']               = " (por equipa)";
    $lang['by_taskgroup']               = " (por grupo de tarefas)";
    $lang['by_deadline']                = " (por prazo)";
    $lang['by_status']                  = " (por status)";
    $lang['by_owner']                   = " (por respons�vel)";
    $lang['by_priority']                = " (por prioridade)";
    $lang['project_cloned']             = "Projecto a ser clonado:";
    $lang['task_cloned']                = "Tarefa a ser clonada:";
    $lang['note_clone']                 = "Obs: Essa tarefa ser� clonada como um novo projecto";

//bits 'n' pieces
    $lang['calendar']                   = "Calend�rio";
    $lang['normal_version']             = "Vers�o normal";
    $lang['print_version']              = "Vers�o para impress�o";
    $lang['condensed_view']             = "Exibi��o resumida";
    $lang['full_view']                  = "Exibi��o completa";
    $lang['icalendar']                  = "iCalendar";

?>
