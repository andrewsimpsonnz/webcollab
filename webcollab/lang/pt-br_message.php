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

  Email text language files for 'pt_br' (Brazilian Portuguese)

  Translation: Eduardo Alvim <eduardoalvim at terra.com.br>

*/

//required language encodings
define('CHARACTER_SET', "ISO-8859-1" );



//this is the regex for input validation filter used in common.php 
$validation_regex = '/([^\x09\x0a\x0d\x20-\x7e\xa0-\xff])/s'; //ISO-8859-x 

//dates
$month_array = array (NULL, 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' );
$week_array = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' );

//task states
 
 //priorities
    $task_state['dontdo']               = 'N&atilde;o fazer';
    $task_state['low']                  = 'Baixa';
    $task_state['normal']               = 'Normal';
    $task_state['high']                 = 'Alta';
    $task_state['yesterday']            = 'Para ontem!!';
 //status
    $task_state['new']                  = 'Nova';
    $task_state['planned']              = 'Planejada (n&atilde;o ativa)';
    $task_state['active']               = 'Ativa (sendo trabalhada)';
    $task_state['cantcomplete']         = 'Em espera';
    $task_state['completed']            = 'Finalizada';
    $task_state['done']                 = 'Pronta';
    $task_state['task_planned']         = 'Planejada';
    $task_state['task_active']          = 'Ativa';
 //project states
    $task_state['planned_project']      = 'Projeto planejado (n&atilde;o ativo)';
    $task_state['no_deadline_project']  = 'Sem prazo definido';
    $task_state['active_project']       = 'Projeto ativo';
    
//common items
    $lang['description']                = 'Descri&ccedil;&atilde;o';
    $lang['name']                       = 'Nome';
    $lang['add']                        = 'Adicionar';
    $lang['update']                     = 'Atualizar';
    $lang['submit_changes']             = 'Enviar altera&ccedil;&otilde;es';
    $lang['continue']                   = 'Continuar';
    $lang['reset']                      = 'Reset';
    $lang['manage']                     = 'Gerenciar';
    $lang['edit']                       = 'Editar';
    $lang['delete']                     = 'Excluir';
    $lang['del']                        = 'Excluir';
    $lang['confirm_del_javascript']     = 'Confirma exclus&atilde;o!';
    $lang['yes']                        = 'Sim';
    $lang['no']                         = 'N&atilde;o';
    $lang['action']                     = 'A&ccedil;&atilde;o';
    $lang['task']                       = 'Tarefa';
    $lang['tasks']                      = 'Tarefas';
    $lang['project']                    = 'Projeto';
    $lang['info']                       = 'Informa&ccedil;&atilde;o';
    $lang['bytes']                      = 'bytes';
    $lang['select_instruct']            = '(Pressione Ctrl para selecionar ou
deselecionar mais de um)';
    $lang['member_groups']              = 'O usu&aacute;rio &eacute; membro dos grupos real&ccedil;ados abaixo (caso hajam)';
    $lang['login']                      = 'Login';
    $lang['error']                      = 'Erro';
    $lang['no_login']                   = 'Acesso negado, verifique o nome de usu&aacute;rio e a senha';
//**    
    $lang['redirect_sprt']              = 'Voc&ecirc; ser&aacute; automaticamente redirecionado &agrave; p&aacute;gina de Login em %d segundos';
//**
    $lang['login_now']                  = 'Por favor, clique aqui para retornar &agrave; p&aacute;gina de Login agora';   
    $lang['please_login']               = 'Entre, por favor';
    $lang['go']                         = 'Vai!';
    
//graphic items
    $lang['late_g']                     = '&nbsp;ATRASADO&nbsp;';
    $lang['new_g']                      = '&nbsp;NOVO&nbsp;';
    $lang['updated_g']                  = '&nbsp;ATUALIZADO&nbsp;';

//admin config
    $lang['admin_config']               = 'Configura&ccedil;&otilde;es administrativas';
    $lang['email_settings']             = 'Configura&ccedil;&otilde;es do cabe&ccedil;alho de e-mail';
    $lang['admin_email']                = 'E-mail administrativo';
    $lang['email_reply']                = 'E-mail \'Responder\'';
    $lang['email_from']                 = 'E-mail \'De\'';
    $lang['mailing_list']               = 'Lista de e-mails';
    $lang['default_checkbox']           = 'Configura&ccedil;&otilde;es padr&atilde;o para Projetos/Tarefas';
    $lang['allow_globalaccess']         = 'Permitir acesso global?';
    $lang['allow_group_edit']           = 'Permitir edi&ccedil;&atilde;o por todos do grupo de usu&aacute;rios?';
    $lang['set_email_owner']            = 'Sempre notificar respons&aacute;vel sobre mudan&ccedil;as?';
    $lang['set_email_group']            = '"Sempre notificar grupo de usu&aacute;rios sobre mudan&ccedil;as?';
//**    
    $lang['project_listing_order']      = 'Ordem de listagem dos projetos';
//**    
    $lang['task_listing_order']         = 'Ordem de listagem das tarefas'; 
    $lang['configuration']              = 'Configura&ccedil;&atilde;o';

//archive
//**
    $lang['archived_projects']          = 'Projetos Arquivados';    

//contacts
    $lang['firstname']                  = 'Nome:';
    $lang['lastname']                   = 'Sobrenome:';
    $lang['company']                    = 'Empresa:';
    $lang['home_phone']                 = 'Tel. Res.:';
    $lang['mobile']                     = 'Cel.:';
    $lang['fax']                        = 'Fax:';
    $lang['bus_phone']                  = 'Tel. Com.:';
    $lang['address']                    = 'Endere&ccedil;o:';
    $lang['postal']                     = 'CEP:';
    $lang['city']                       = 'Cidade:';
    $lang['email']                      = 'E-mail:';
    $lang['notes']                      = 'OBS:';
    $lang['add_contact']                = 'Adicionar contato';
    $lang['del_contact']                = 'Excluir contato';
    $lang['contact_info']               = 'Informa&ccedil;&atilde;o do contato';
    $lang['contacts']                   = 'Contatos';
    $lang['contact_add_info']           = 'Quando cadastrado, o nome da empresa ser&aacute; exibido ao inv&eacute;s do nome do usu&aacute;rio.';
    $lang['show_contact']               = 'Exibir contatos';
    $lang['edit_contact']               = 'Editar contatos';
    $lang['contact_submit']             = 'Enviar contato';
    $lang['contact_warn']               = 'Campos preenchidos insuficientes, por favor retorne e preencha ao menos o nome e sobrenome';

 //files
    $lang['manage_files']               = 'Gerenciar arquivos';
    $lang['no_files']                   = 'N&atilde;o existem arquivos para serem gerenciados	';
    $lang['no_file_uploads']            = 'As configura&ccedil;&otilde;es do servidor para esse site n&atilde;o permitem o envio de arquivos';
    $lang['file']                       = 'Arquivo:';
    $lang['uploader']                   = 'De:';
    $lang['files_assoc_project']        = 'Arquivos associados a este projeto';
    $lang['files_assoc_task']           = 'Arquivos associados a esta tarefa';
    $lang['file_admin']                 = 'Administra&ccedil;&atilde;o de arquivos';
    $lang['add_file']                   = 'Adicionar arquivo';
    $lang['files']                      = 'Arquivos';
    $lang['file_choose']                = 'Arquivo a ser enviado:';
    $lang['upload']                     = 'Enviar';
    $lang['file_email_owner']           = 'Notificar sobre o novo arquivo ao respons&aacute;vel?';
    $lang['file_email_usergroup']       = 'Notificar sobre o novo arquivo ao grupo de usu&aacute;rios?';
    $lang['max_file_sprt']              = 'O arquivo a ser enviado deve ter menos que %s kb.';
    $lang['file_submit']                = 'Enviar arquivo';
    $lang['no_upload']                  = 'O arquivo n&atilde;o foi enviado. Por favor, volte e tente novamente.';
    $lang['file_too_big_sprt']          = 'O tamanho m&aacute;ximo para envio de arquivos &eacute; de %s bytes. O arquivo enviado foi exclu&iacute;do por exceder tais limites.';
    $lang['del_file_javascript_sprt']   = 'Est&aacute; certo de que deseja excluir %s ?';


 //forum
    $lang['orig_message']               = 'Mensagem original:';
    $lang['post']                       = 'Postar!';
    $lang['message']                    = 'Mensagem:';
    $lang['post_reply_sprt']            = 'Postar uma resposta &agrave; mensagem de \'%1$s\' sobre \'%2$s\'';
    $lang['post_message_sprt']          = 'Postar mensagem para: \'%s\'';
    $lang['forum_email_owner']          = 'Notificar respons&aacute;vel sobre postagem?';
    $lang['forum_email_usergroup']      = 'Notificar grupo de usu&aacute;rios sobre postagem?';
    $lang['reply']                      = 'Responder';
    $lang['new_post']                   = 'Nova postagem';
    $lang['public_user_forum']          = 'F&oacute;rum p&uacute;blico';
    $lang['private_forum_sprt']         = 'F&oacute;rum privativo para o grupo de usu&aacute;rios \'%s\' ';
    $lang['forum_submit']               = 'Enviar para f&oacute;rum';
    $lang['no_message']                 = 'Sem mensagens! Por favor, retorne e tente novamente';
    $lang['add_reply']                  = 'Adicionar resposta';
//**  
    $lang['last_post_sprt']             = '&Uacute;ltima postagem em %s'; //Note to translators: context is 'Last post 2004-Dec-22'
//**   
    $lang['recent_posts']               = 'Postagens recentes no f&oacute;rum';      
    
 //includes
    $lang['report']                     = 'Relat&oacute;rio';
    $lang['warning']                    = '<h1>Desculpe!</h1><p>Foi imposs&iacute;vel processar sua solicita&ccedil;&atilde;o no momento. Por favor, tente novamente mais tarde.</p>';
    $lang['home_page']                  = 'In&iacute;cio';
    $lang['summary_page']               = 'Sum&aacute;rio';
    $lang['todo_list']                  = '&Agrave; Fazer';
    $lang['calendar']                   = 'Calend&aacute;rio';
    $lang['log_out']                    = 'Sair';
    $lang['main_menu']                  = 'Menu Principal';
//**
    $lang['archive']                    = 'Arquivo';   
    $lang['user_homepage_sprt']         = 'P&aacute;gina principal para %s\'';
    $lang['missing_field_javascript']   = 'Por favor, entre um valor para o campo faltante';
    $lang['invalid_date_javascript']    = 'Por favor, escolha uma data v&aacute;lida no calend&aacute;rio';
    $lang['finish_date_javascript']     = 'A data fornecida acontece ap&oacute;s a data de t&eacute;rmino do projeto!';
    $lang['security_manager']           = 'Ger&ecirc;ncia de seguran&ccedil;a';
    $lang['session_timeout_sprt']       = 'Acesso negado, a &uacute;ltima a&ccedil;&atilde;o foi h&aacute; %1\$d minutos e o intervalo de parada &eacute; de %2\$d minutos, por favor <a href=\"%3\$sindex.php\">entre</a> novamente';
    $lang['access_denied']              = 'Acesso negado';
    $lang['private_usergroup']          = 'Desculpe, esta &aacute;rea &eacute; privativa de um grupo de usu&aacute;rios e voc&ecirc; n&atilde;o tem direitos de acesso.';
    $lang['invalid_date']               = 'Data inv&aacute;lida';
    $lang['invalid_date_sprt']          = 'A data %s n&atilde;o existe no calend&aacute;rio (Verifique o n&uacute;mero de dias no m&ecirc;s).<br/>Por favor, retorne e escolha outra data.';


 //taskgroups
    $lang['taskgroup_name']             = 'Grupo de tarefas:';
    $lang['taskgroup_description']      = 'Breve descri&ccedil;&atilde;o do grupo de tarefas:';
    $lang['add_taskgroup']              = 'Adicionar grupo de tarefas';
    $lang['add_new_taskgroup']          = 'Adicionar novo grupo de tarefas';
    $lang['edit_taskgroup']             = 'Editar grupo de tarefas';
    $lang['taskgroup_manage']           = 'Gerenciar grupo de tarefas';
    $lang['no_taskgroups']              = 'Sem grupo de tarefas';
    $lang['manage_taskgroups']          = 'Gerenciar grupos de tarefas';
    $lang['taskgroups']                 = 'Grupos de tarefas';
    $lang['taskgroup_dup_sprt']         = 'J&aacute; existe um grupo de tarefas chamado \'%s\'. Por favor, retorne e escolha outro nome.';
    $lang['info_taskgroup_manage']      = 'Informa&ccedil;&otilde;es para gerenciamento do grupo de tarefas';

 //usergroups
    $lang['usergroup_name']             = 'Equipe:';
    $lang['usergroup_description']      = 'Breve descri&ccedil;&atilde;o da equipe:';
    $lang['members']                    = 'Membros:';
    $lang['private_usergroup']          = 'Equipe privativa';
    $lang['add_usergroup']              = 'Adicionar equipe';
    $lang['add_new_usergroup']          = 'Adicionar nova equipe';
    $lang['edit_usergroup']             = 'Editar equipe';
    $lang['usergroup_manage']           = 'Gerenciar equipe';
    $lang['no_usergroups']              = 'Sem equipes';
    $lang['manage_usergroups']          = 'Gerenciar equipes';
    $lang['usergroups']                 = 'Equipes';
    $lang['usergroup_dup_sprt']         = 'J&aacute; existe uma equipe chamada \'%s\'. Por favor, retorne e escolha outro nome.';
    $lang['info_usergroup_manage']      = 'Informa&ccedil;&otilde;es para gerenciamento de equipe';

 //users
    $lang['login_name']                 = 'Nome de usu&aacute;rio';
    $lang['full_name']                  = 'Nome completo';
    $lang['password']                   = 'Senha';
    $lang['blank_for_current_password'] = '(Deixe em branco para manter a senha atual)';
    $lang['email']                      = 'E-mail';
    $lang['admin']                      = 'Administra&ccedil;&atilde;o';
    $lang['private_user']               = 'Usu&aacute;rio privativo';
 //**
    $lang['normal_user']                = 'Usu&aacute;rio normal'; 
    $lang['is_admin']                   = 'Configurar como administrador?';
 //**
    $lang['is_guest']                   = 'Configurar como visitante?';
 //**
    $lang['guest']                      = 'Visitante';
    $lang['user_info']                  = 'Informa&ccedil;&atilde;o de usu&aacute;rio';
    $lang['deleted_users']              = 'Usu&aacute;rios exclu&iacute;dos';
    $lang['no_deleted_users']           = 'N&atilde;o existem usu&aacute;rios exclu&iacute;dos.';
    $lang['revive']                     = 'Ressucitar';
    $lang['permdel']                    = 'Exclus&atilde;o definitiva';
    $lang['permdel_javascript_sprt']    = 'Isto ir&aacute; excluir permanentemente todos os registros e tarefas associadas ao usu&aacute;rio %s. Est&aacute; certo disso?';
    $lang['add_user']                   = 'Adicionar usu&aacute;rio';
    $lang['edit_user']                  = 'Editar usu&aacute;rio';
    $lang['no_users']                   = 'O sistema n&atilde;o possui usu&aacute;rios';
    $lang['users']                      = 'Usu&aacute;rios';
    $lang['existing_users']             = 'Usu&aacute;rios existentes';
    $lang['private_profile']            = 'Este usu&aacute;rio possui um perfil privativo que n&atilde;o pode ser visualizado por voc&ecirc;.';
    $lang['private_usergroup_profile']  = '(Este usu&aacute;rio &eacute; membro de uma equipe privativa e n&atilde;o pode ser visualizado por voc&ecirc;)';
    $lang['email_users']                = 'Enviar e-mail para usu&aacute;rios';
    $lang['select_usergroup']           = 'Equipe selecionada abaixo:';
    $lang['subject']                    = 'Assunto:';
    $lang['message_sent_maillist']      = 'Sempre a mensagem tamb&eacute;m &eacute; copiada para a lista de e-mails.';
    $lang['who_online']                 = 'Quem est&aacute; conectado?';
    $lang['edit_details']               = 'Editar detalhes';
    $lang['show_details']               = 'Exibir detalhes';
    $lang['user_deleted']               = 'Esse usu&aacute;rio foi exclu&iacute;do!';
    $lang['no_usergroup']               = 'O usu&aacute;rio n&atilde;o &eacute; membro de uma equipe';
    $lang['not_usergroup']              = '(N&atilde;o &eacute; membro de nenhuma equipe)';
    $lang['no_password_change']         = '(Sua senha n&atilde;o foi alterada)';
    $lang['last_time_here']             = '&Uacute;ltimo acesso:';
    $lang['number_items_created']       = 'Nº de &iacute;tens criados:';
    $lang['number_projects_owned']      = 'Nº de projetos sob sua responsabilidade:';
    $lang['number_tasks_owned']         = 'Nº de tarefas sob sua responsabilidade:';
    $lang['number_tasks_completed']     = 'Nº de tarefas finalizadas:';
    $lang['number_forum']               = 'Nº de postagens em f&oacute;runs:';
    $lang['number_files']               = 'Nº de arquivos enviados:';
    $lang['size_all_files']             = 'Tamanho total de arquivos enviados:';
    $lang['owned_tasks']                = 'Tarefas sob sua responsabilidade';
    $lang['invalid_email']              = 'Endere&ccedil;o de e-mail inv&aacute;lido';
    $lang['invalid_email_given_sprt']   = 'O endere&ccedil;o de e-mail \'%s\' &eacute; inv&aacute;lido. Por favor, retorne e tente novamente.';
    $lang['duplicate_user']             = 'Duplicar usu&aacute;rio';
    $lang['duplicate_change_user_sprt'] = 'O usu&aacute;rio \'%s\' j&aacute; existe. Por favor, retorne e mude um dos nomes.';
    $lang['value_missing']              = 'Dado faltante';
    $lang['field_sprt']                 = 'O campo para o dado \'%s\' &eacute; faltante. Por favor, retorne e preencha-o.';
    $lang['admin_priv']                 = 'OBS: Voc&ecirc; possui privil&eacute;gios de administrador.';
    $lang['manage_users']               = 'Gerenciar usu&aacute;rios';
    $lang['users_online']               = 'Usu&aacute;rios conectados';
    $lang['online']                     = 'Usu&aacute;rios duro-na-queda (Conectados h&aacute; pelo menos 60 minutos)';
    $lang['not_online']                 = 'O resto';
    $lang['user_activity']              = 'Atividade de usu&aacute;rio';

  //tasks
    $lang['add_new_task']               = 'Adicionar nova tarefa';
    $lang['priority']                   = 'Prioridade';
    $lang['parent_task']                = 'Relacionada';
    $lang['creation_time']              = 'Data de cria&ccedil;&atilde;o';
    $lang['by_sprt']                    = '%1$s por %2$s'; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = 'Nome do Projeto';
    $lang['task_name']                  = 'Nome da tarefa';
    $lang['deadline']                   = 'Prazo';
    $lang['taken_from_parent']          = ' (Obtida da tarefa relacionada)';
    $lang['status']                     = 'Status';
    $lang['task_owner']                 = 'Respons&aacute;vel pela Tarefa';
    $lang['project_owner']              = 'Respons&aacute;vel pelo Projeto';
    $lang['taskgroup']                  = 'Grupo de tarefas';
    $lang['usergroup']                  = 'Equipe';
    $lang['nobody']                     = 'Ningu&eacute;m';
    $lang['none']                       = 'Nenhum';
    $lang['no_group']                   = 'Sem equipe';
    $lang['all_groups']                 = 'Todas as equipes';
    $lang['all_users']                  = 'Todos os usu&aacute;rios';
    $lang['all_users_view']             = 'Vis&iacute;vel para todos os usu&aacute;rios?';
    $lang['group_edit']                 = 'Edit&aacute;vel por qualquer membro da equipe?';
    $lang['project_description']        = 'Descri&ccedil;&atilde;o do projeto';
    $lang['task_description']           = 'Descri&ccedil;&atilde;o da tarefa';
    $lang['email_owner']                = 'Notificar respons&aacute;vel sobre altera&ccedil;&otilde;es?';
    $lang['email_new_owner']            = 'Notificar (novo) respons&aacute;vel sobre altera&ccedil;&otilde;es?';
    $lang['email_group']                = 'Notificar equipe sobre altera&ccedil;&otilde;es?';
    $lang['add_new_project']            = 'Adicionar novo projeto';
    $lang['uncategorised']              = 'N&atilde;o-categorizado';
    $lang['due_sprt']                   = 'Para daqui a %d dias';
    $lang['tomorrow']                   = 'Amanh&atilde;';
    $lang['due_today']                  = 'At&eacute; hoje';
    $lang['overdue_1']                  = 'Atrasado 1 dia';
    $lang['overdue_sprt']               = 'Atrasado %d dias';
    $lang['edit_task']                  = 'Editar tarefa';
    $lang['edit_project']               = 'Editar projeto';
    $lang['no_reparent']                = 'Nenhum (projeto principal)';
    $lang['del_javascript_project_sprt']= 'Isto ir&aacute; excluir o projeto %s. Est&aacute; certo disso?';
    $lang['del_javascript_task_sprt']   = 'Isto ir&aacute; excluir a tarefa %s. Est&aacute; certo disso?';
    $lang['add_task']                   = 'Adicionar tarefa';
    $lang['add_subtask']                = 'Adicionar sub-tarefa';
    $lang['add_project']                = 'Adicionar projeto';
    $lang['clone_project']              = 'Clonar projeto';
    $lang['clone_task']                 = 'Clonar tarefa';
//**
    $lang['quick_jump']                 = 'Jogo r&aacute;pido';
    $lang['no_edit']                    = 'O &iacute;tem n&atilde;o est&aacute; sob sua responsabilidade, portanto voc&ecirc; n&atilde;o pode edit&aacute;-lo';
    $lang['uncategorised']              = 'N&atilde;o-categorizado';
    $lang['admin']                      = 'Administra&ccedil;&atilde;o';
    $lang['global']                     = 'Global';
    $lang['delete_project']             = 'Excluir projeto';
    $lang['delete_task']                = 'Excluir tarefa';
    $lang['project_options']            = 'Op&ccedil;&otilde;es do projeto';
    $lang['task_options']               = 'Op&ccedil;&otilde;es da tarefa';
//**    
    $lang['javascript_archive_project'] = 'Isto ir&aacute; arquivar o projeto %s.  Est&aacute; certo disso?';
//**    
    $lang['archive_project']            = 'Arquivar projeto';
    $lang['task_navigation']            = 'Navegar pela tarefa';
//**
    $lang['new_task']                   = 'Nova tarefa';    
    $lang['no_projects']                = 'N&atilde;o existem projetos para visualizar';
    $lang['show_all_projects']          = 'Exibir todos os projetos';
    $lang['show_active_projects']       = 'Exibir apenas os projetos ativos';
    $lang['project_hold_sprt']          = 'Projeto em espera desde %s';
    $lang['project_planned']            = 'Projeto planejado';
    $lang['percent_sprt']               = '%d%% da tarefa conclu&iacute;da';
    $lang['project_no_deadline']        = 'O projeto n&atilde;o possui prazo definido';
    $lang['no_allowed_projects']        = 'N&atilde;o existem projetos que voc&ecirc; esteja autorizado a visualizar';
    $lang['projects']                   = 'Projetos';
    $lang['percent_project_sprt']       = 'Este projeto est&aacute; %d%% conclu&iacute;do';
    $lang['owned_by']                   = 'Respons&aacute;vel';
    $lang['created_on']                 = 'Criado em';
    $lang['completed_on']               = 'Finalizado em';
    $lang['modified_on']                = 'Modificado em';
    $lang['project_on_hold']            = 'Projeto est&aacute; em espera';
    $lang['project_accessible']         = '(Este projeto &eacute; acess&iacute;vel por todos os usu&aacute;rios)';
    $lang['task_accessible']            = '(Esta tarefa &eacute; acess&iacute;vel por todos os usu&aacute;rios)';
    $lang['project_not_accessible']     = '(Este projeto &eacute; acess&iacute;vel apenas por membros da equipe)';
    $lang['task_not_accessible']        = '(Esta tarefa &eacute; acess&iacute;vel apenas por membros da equipe)';
    $lang['project_not_in_usergroup']   = 'Este projeto n&atilde;o pertence a nenhuma equipe e &eacute; acess&iacute;vel por todos.';
    $lang['task_not_in_usergroup']      = 'Esta tarefa n&atilde;o pertence a nenhuma equipe e &eacute; acess&iacute;vel por todos.';
    $lang['usergroup_can_edit_project'] = 'Este projeto pode ser editado tamb&eacute;m por membros da equipe.';
    $lang['usergroup_can_edit_task']    = 'Esta tarefa pode ser editada tamb&eacute;m por membros da equipe.';
    $lang['i_take_it']                  = 'Deixa comigo :)';
    $lang['i_finished']                 = 'Terminei!';
    $lang['i_dont_want']                = 'Passar a bola';
    $lang['take_over_project']          = 'Assumir projeto';
    $lang['take_over_task']             = 'Assumir tarefa';
    $lang['task_info']                  = 'Informa&ccedil;&atilde;o da tarefa';
    $lang['project_details']            = 'Detalhes do projeto';
    $lang['todo_list_for']              = 'Lista &agrave; fazer para: ';
    $lang['due_in_sprt']                = ' (Prazo de %d dias)';
    $lang['due_tomorrow']               = ' (Para amanh&atilde;)';
    $lang['no_assigned']                = 'N&atilde;o existem tarefas incompletas designadas para esse usu&aacute;rio.';
    $lang['todo_list']                  = '&Agrave; Fazer';
    $lang['summary_list']               = 'Sum&aacute;rio';
    $lang['task_submit']                = 'Enviar tarefa';
    $lang['not_owner']                  = 'Acesso negado, ou voc&ecirc; n&atilde;o &eacute; o respons&aacute;vel ou n&atilde;o possui direitos de acesso';
    $lang['missing_values']             = 'Os campos preenchidos foram insuficientes, por favor retorne e tente novamente';
    $lang['future']                     = 'Futuro';
    $lang['flags']                      = 'Flags';
    $lang['owner']                      = 'Respons&aacute;vel';
    $lang['group']                      = 'Equipe';
    $lang['by_usergroup']               = ' (por equipe)';
    $lang['by_taskgroup']               = ' (por grupo de tarefas)';
    $lang['by_deadline']                = ' (por prazo)';
    $lang['by_status']                  = ' (por status)';
    $lang['by_owner']                   = ' (por respons&aacute;vel)';
    $lang['project_cloned']             = 'Projeto a ser clonado :';
    $lang['task_cloned']                = 'Tarefa a ser clonada :';
    $lang['note_clone']                 = 'Obs: Essa tarefa ser&aacute; clonada como um novo projeto';

//bits 'n' pieces
    $lang['calendar']                   = 'Calend&aacute;rio';
    $lang['normal_version']             = 'Vers&atilde;o normal';
    $lang['print_version']              = 'Vers&atilde;o para impress&atilde;o';
//**    
    $lang['condensed_view']             = 'Exibi&ccedil;&atilde;o resumida';
//**    
    $lang['full_view']                  = 'Exibi&ccedil;&atilde;o completa';

?>