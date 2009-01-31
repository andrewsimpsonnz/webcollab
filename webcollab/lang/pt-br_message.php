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

  Translation: Eduardo Alvim <eduardoalvim at gmail.com>

*/
//required language encodings
define('CHARACTER_SET', 'ISO-8859-1' );

//xml language identifier
define('XML_LANG', "pt" );

//this is the regex for input validation filter used in common.php
define('VALIDATION_REGEX', "/([^\x09\x0A\x0D\x20-\x7E\xA0-\xFF])/" ); //ISO-8859-x

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
    $task_state['planned']              = "Planejada (n�o ativa)";
    $task_state['active']               = "Ativa (sendo trabalhada)";
    $task_state['cantcomplete']         = "Em espera";
    $task_state['completed']            = "Finalizada";
    $task_state['done']                 = "Pronta";
    $task_state['task_planned']         = "Planejada";
    $task_state['task_active']          = "Ativa";
 //project states
    $task_state['planned_project']      = "Projeto planejado (n�o ativo)";
    $task_state['no_deadline_project']  = "Sem prazo definido";
    $task_state['active_project']       = "Projeto ativo";

//common items
    $lang['description']                = "Descri��o";
    $lang['name']                       = "Nome";
    $lang['add']                        = "Adicionar";
    $lang['update']                     = "Atualizar";
    $lang['submit_changes']             = "Enviar altera��es";
    $lang['continue']                   = "Continuar";
    $lang['manage']                     = "Gerenciar";
    $lang['edit']                       = "Editar";
    $lang['delete']                     = "Excluir";
    $lang['del']                        = "Excluir";
    $lang['confirm_del_javascript']     = "Confirma exclus�o!";
    $lang['yes']                        = "Sim";
    $lang['no']                         = "N�o";
    $lang['action']                     = "A��o";
    $lang['task']                       = "Tarefa";
    $lang['tasks']                      = "Tarefas";
    $lang['project']                    = "Projeto";
    $lang['info']                       = "Informa��o";
    $lang['bytes']                      = "bytes";
    $lang['select_instruct']            = "(Pressione Ctrl para (de)selecionar mais de um)";
    $lang['member_groups']              = "O usu�rio � membro das equipes real�adas abaixo (caso hajam)";
    $lang['login']                      = "Usu�rio";
    $lang['login_action']               = "Entra";
    $lang['login_screen']               = "Usu�rio";
    $lang['error']                      = "Erro";
    $lang['no_login']                   = "Acesso negado, verifique nome de usu�rio e senha";
    $lang['redirect_sprt']              = "Voc� ser� redirecionado � p�gina de entrada em %d segundos";
    $lang['login_now']                  = "Por favor, clique aqui para retornar � p�gina de entrada agora";
    $lang['please_login']               = "Identifique-se por favor";
    $lang['go']                         = "Vai!";

//graphic items
    $lang['late_g']                     = "&nbsp;ATRASADO&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;ATUALIZADO&nbsp;";

//admin config
    $lang['admin_config']               = "Config. administrativas";
    $lang['email_settings']             = "Configura��o do cabe�alho de e-mail";
    $lang['admin_email']                = "E-mail administrativo";
    $lang['email_reply']                = "'Responder' para";
    $lang['email_from']                 = "'De'";
    $lang['mailing_list']               = "Lista de e-mails";
    $lang['default_checkbox']           = "Configura��o padr�o para Projetos/Tarefas";
    $lang['allow_globalaccess']         = "Permitir acesso global?";
    $lang['allow_group_edit']           = "Permitir edi��o por todos da equipe?";
    $lang['set_email_owner']            = "Sempre notificar respons�vel sobre mudan�as?";
    $lang['set_email_group']            = "Sempre notificar equipe sobre mudan�as?";
    $lang['project_listing_order']      = "Ordem de listagem dos projetos";
    $lang['task_listing_order']         = "Ordem de listagem das tarefas";
    $lang['configuration']              = "Configura��o";

//archive
    $lang['archived_projects']          = "Projetos arquivados";

//contacts
    $lang['firstname']                  = "Nome:";
    $lang['lastname']                   = "Sobrenome:";
    $lang['company']                    = "Empresa:";
    $lang['home_phone']                 = "Tel. Res.:";
    $lang['mobile']                     = "Cel.:";
    $lang['fax']                        = "Fax:";
    $lang['bus_phone']                  = "Tel. Com.:";
    $lang['address']                    = "Endere�o:";
    $lang['postal']                     = "CEP:";
    $lang['city']                       = "Cidade:";
    $lang['email_contact']              = "E-mail:";
    $lang['notes']                      = "OBS:";
    $lang['add_contact']                = "Adicionar contato";
    $lang['del_contact']                = "Excluir contato";
    $lang['contact_info']               = "Informa��o do contato";
    $lang['contacts']                   = "Contatos";
    $lang['contact_add_info']           = "Quando cadastrado, o nome da empresa ser� exibido ao inv�s do nome do usu�rio.";
    $lang['show_contact']               = "Exibir contatos";
    $lang['edit_contact']               = "Editar contatos";
    $lang['contact_submit']             = "Enviar contato";
    $lang['contact_warn']               = "Campos insuficientes, por favor retorne e preencha ao menos nome e sobrenome";

 //files
    $lang['manage_files']               = "Gerenciar arquivos";
    $lang['no_files']                   = "N�o existem arquivos para gerenciar";
    $lang['no_file_uploads']            = "O servidor foi configurado para n�o aceitar o envio de arquivos";
    $lang['file']                       = "Arquivo:";
    $lang['uploader']                   = "De:";
    $lang['files_assoc_project']        = "Arquivos relacionados ao projeto";
    $lang['files_assoc_task']           = "Arquivos relacionados � tarefa";
    $lang['file_admin']                 = "Administra��o de arquivos";
    $lang['add_file']                   = "Adicionar arquivo";
    $lang['files']                      = "Arquivos";
    $lang['file_choose']                = "Arquivo a ser enviado:";
    $lang['upload']                     = "Enviar";
    $lang['file_email_owner']           = "Notificar sobre o novo arquivo ao respons�vel?";
    $lang['file_email_usergroup']       = "Notificar sobre o novo arquivo � equipe?";
    $lang['max_file_sprt']              = "O arquivo a ser enviado deve ter menos que %s kb.";
    $lang['file_submit']                = "Enviar arquivo";
    $lang['no_upload']                  = "O arquivo n�o foi enviado. Por favor, volte e tente novamente.";
    $lang['file_too_big_sprt']          = "O tamanho m�ximo para envio de arquivos � de %s bytes. O arquivo enviado foi exclu�do por exceder tais limites.";
    $lang['del_file_javascript_sprt']   = "Est� certo de que deseja excluir %s ?";


 //forum
    $lang['orig_message']               = "Mensagem original:";
    $lang['post']                       = "Postar!";
    $lang['message']                    = "Mensagem:";
    $lang['post_reply_sprt']            = "Postar uma resposta � mensagem de '%1\$s' sobre '%2\$s'";
    $lang['post_message_sprt']          = "Postar mensagem para: '%s'";
    $lang['forum_email_owner']          = "Notificar respons�vel sobre postagem?";
    $lang['forum_email_usergroup']      = "Notificar equipe sobre postagem?";
    $lang['reply']                      = "Responder";
    $lang['new_post']                   = "Nova postagem";
    $lang['public_user_forum']          = "F�rum p�blico";
    $lang['private_forum_sprt']         = "F�rum privativo para a equipe '%s' ";
    $lang['forum_submit']               = "Enviar para f�rum";
    $lang['no_message']                 = "Sem mensagens! Por favor, retorne e tente novamente";
    $lang['add_reply']                  = "Adicionar resposta";
    $lang['last_post_sprt']             = "�ltima postagem em %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Postagens recentes no f�rum";
//**
    $lang['forum_search']               = "Busca no f�rum";
//**
    $lang['no_results']                 = "Sem resultados para '%s'";
//**
    $lang['search_results']             = "Encontrado %1\$s resultado para '%2\$s'<br />Exibindo resultado %3\$s de %4\$s";

 //includes
    $lang['report']                     = "Relat�rio";
    $lang['warning']                    = "<h1>Desculpe!</h1><p>Imposs�vel processar solicita��o no momento. Por favor, tente novamente mais tarde.</p>";
    $lang['home_page']                  = "In�cio";
    $lang['summary_page']               = "Sum�rio";
    $lang['log_out']                    = "Sair";
    $lang['main_menu']                  = "Menu Principal";
    $lang['archive']                    = "Arquivo";
    $lang['user_homepage_sprt']         = "P�gina principal para %s'";
    $lang['missing_field_javascript']   = "Por favor, entre valor para o campo faltante";
    $lang['invalid_date_javascript']    = "Por favor, escolha data v�lida no calend�rio";
    $lang['finish_date_javascript']     = "Data fornecida posterior ao t�rmino do projeto!";
    $lang['security_manager']           = "Seguran�a";
    $lang['session_timeout_sprt']       = "Acesso negado. �ltima a��o h� %1\$d minutos sendo que o intervalo m�ximo de inatividade � de %2\$d minutos. Por favor <a href=\"%3\$sindex.php\">entre</a> novamente";
    $lang['access_denied']              = "Acesso negado";
    $lang['private_usergroup_no_access']= "Desculpe, �rea privativa de uma equipe da qual voc� n�o faz parte.";
    $lang['invalid_date']               = "Data inv�lida";
    $lang['invalid_date_sprt']          = "A data %s n�o existe no calend�rio (verifique o n�mero de dias no m�s).<br/>Por favor, retorne e escolha outra data.";

 //taskgroups
    $lang['taskgroup_name']             = "Grupo de tarefas:";
    $lang['taskgroup_description']      = "Breve descri��o:";
    $lang['add_taskgroup']              = "Adicionar";
    $lang['add_new_taskgroup']          = "Adicionar um novo grupo de tarefas";
    $lang['edit_taskgroup']             = "Editar grupo de tarefas";
    $lang['taskgroup_manage']           = "Gerenciar";
    $lang['no_taskgroups']              = "Sem grupo de tarefas";
    $lang['manage_taskgroups']          = "Gerenciar grupos de tarefas";
    $lang['taskgroups']                 = "Grupos de tarefas";
    $lang['taskgroup_dup_sprt']         = "J� existe um grupo de tarefas chamado '%s'. Por favor, retorne e escolha outro nome.";
    $lang['info_taskgroup_manage']      = "Informa��es sobre gerenciamento de grupo de tarefas";

 //usergroups
    $lang['usergroup_name']             = "Equipe:";
    $lang['usergroup_description']      = "Breve descri��o da equipe:";
    $lang['members']                    = "Membros:";
    $lang['private_usergroup']          = "Equipe privativa";
    $lang['add_usergroup']              = "Adicionar equipe";
    $lang['add_new_usergroup']          = "Adicionar nova equipe";
    $lang['edit_usergroup']             = "Editar equipe";
    $lang['usergroup_manage']           = "Gerenciar equipe";
    $lang['no_usergroups']              = "Sem equipes";
    $lang['manage_usergroups']          = "Gerenciar equipes";
    $lang['usergroups']                 = "Equipes";
    $lang['usergroup_dup_sprt']         = "J� existe uma equipe chamada '%s'. Por favor, retorne e escolha outro nome.";
    $lang['info_usergroup_manage']      = "Informa��es sobre gerenciamento de equipes";

 //users
    $lang['login_name']                 = "Nome de usu�rio";
    $lang['full_name']                  = "Nome completo";
    $lang['password']                   = "Senha";
    $lang['blank_for_current_password'] = "(Deixe em branco para manter a senha atual)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Administra��o";
    $lang['private_user']               = "Usu�rio privativo";
    $lang['normal_user']                = "Usu�rio normal";
    $lang['is_admin']                   = "Configurar como administrador?";
    $lang['is_guest']                   = "Configurar como visitante?";
    $lang['guest']                      = "Visitante";
    $lang['user_info']                  = "Informa��o de usu�rio";
    $lang['deleted_users']              = "Usu�rios exclu�dos";
    $lang['no_deleted_users']           = "N�o existem usu�rios exclu�dos.";
    $lang['revive']                     = "Ressucitar";
    $lang['permdel']                    = "Exclus�o definitiva";
    $lang['permdel_javascript_sprt']    = "Isto ir� excluir permanentemente todos os registros e tarefas associadas ao usu�rio %s. Tem certeza disso?";
    $lang['add_user']                   = "Adicionar usu�rio";
    $lang['edit_user']                  = "Editar usu�rio";
    $lang['no_users']                   = "O sistema n�o possui usu�rios";
    $lang['users']                      = "Usu�rios";
    $lang['existing_users']             = "Usu�rios existentes";
    $lang['private_profile']            = "Este usu�rio possui um perfil privativo que n�o pode ser visualizado por voc�.";
    $lang['private_usergroup_profile']  = "(Este usu�rio � membro de uma equipe privativa e n�o pode ser visualizado por voc�)";
    $lang['email_users']                = "Enviar e-mail para usu�rios";
    $lang['select_usergroup']           = "Equipe selecionada abaixo:";
    $lang['subject']                    = "Assunto:";
    $lang['message_sent_maillist']      = "Sempre a mensagem tamb�m � copiada para a lista de e-mails.";
    $lang['who_online']                 = "Quem est� conectado?";
    $lang['edit_details']               = "Editar detalhes";
    $lang['show_details']               = "Exibir detalhes";
    $lang['user_deleted']               = "Esse usu�rio foi exclu�do!";
    $lang['no_usergroup']               = "O usu�rio n�o � membro de uma equipe";
    $lang['not_usergroup']              = "(N�o � membro de nenhuma equipe)";
    $lang['no_password_change']         = "(Sua senha n�o foi alterada)";
    $lang['last_time_here']             = "�ltimo acesso:";
    $lang['number_items_created']       = "N� de �tens criados:";
    $lang['number_projects_owned']      = "N� de projetos sob sua responsabilidade:";
    $lang['number_tasks_owned']         = "N� de tarefas sob sua responsabilidade:";
    $lang['number_tasks_completed']     = "N� de tarefas finalizadas:";
    $lang['number_forum']               = "N� de postagens em f�runs:";
    $lang['number_files']               = "N� de arquivos enviados:";
    $lang['size_all_files']             = "Tamanho total de arquivos enviados:";
    $lang['owned_tasks']                = "Tarefas sob sua responsabilidade";
    $lang['invalid_email']              = "Endere�o de e-mail inv�lido";
    $lang['invalid_email_given_sprt']   = "O endere�o de e-mail '%s' � inv�lido. Por favor, retorne e tente novamente.";
    $lang['duplicate_user']             = "Duplicar usu�rio";
    $lang['duplicate_change_user_sprt'] = "O usu�rio '%s' j� existe. Por favor, retorne e mude um dos nomes.";
    $lang['value_missing']              = "Dado faltante";
    $lang['field_sprt']                 = "O campo para o dado '%s' � faltante. Por favor, retorne e preencha-o.";
    $lang['admin_priv']                 = "OBS: Voc� possui privil�gios de administrador.";
    $lang['manage_users']               = "Gerenciar usu�rios";
    $lang['users_online']               = "Usu�rios conectados";
    $lang['online']                     = "Usu�rios duro-na-queda (Conectados h� pelo menos 60 minutos)";
    $lang['not_online']                 = "O resto";
    $lang['user_activity']              = "Atividade de usu�rio";

  //tasks
    $lang['add_new_task']               = "Adicionar nova tarefa";
    $lang['priority']                   = "Prioridade";
    $lang['parent_task']                = "Relacionada";
    $lang['creation_time']              = "Data de cria��o";
    $lang['by_sprt']                    = "%1\$s por %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Nome do Projeto";
    $lang['task_name']                  = "Nome da tarefa";
    $lang['deadline']                   = "Prazo";
    $lang['taken_from_parent']          = "(Obtida da tarefa-m�e)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Respons�vel pela Tarefa";
    $lang['project_owner']              = "Respons�vel pelo Projeto";
    $lang['taskgroup']                  = "Grupo de tarefas";
    $lang['usergroup']                  = "Equipe";
    $lang['nobody']                     = "Ningu�m";
    $lang['none']                       = "Nenhum";
    $lang['no_group']                   = "Sem equipe";
    $lang['all_groups']                 = "Todas as equipes";
    $lang['all_users']                  = "Todos os usu�rios";
    $lang['all_users_view']             = "Vis�vel para todos os usu�rios?";
    $lang['group_edit']                 = "Edit�vel por qualquer membro da equipe?";
    $lang['project_description']        = "Descri��o do projeto";
    $lang['task_description']           = "Descri��o da tarefa";
    $lang['email_owner']                = "Notificar respons�vel sobre altera��es?";
    $lang['email_new_owner']            = "Notificar (novo) respons�vel sobre altera��es?";
    $lang['email_group']                = "Notificar equipe sobre altera��es?";
    $lang['add_new_project']            = "Adicionar novo projeto";
    $lang['uncategorised']              = "N�o-categorizado";
    $lang['due_sprt']                   = "Para daqui a %d dias";
    $lang['tomorrow']                   = "Amanh�";
    $lang['due_today']                  = "At� hoje";
    $lang['overdue_1']                  = "Atrasado 1 dia";
    $lang['overdue_sprt']               = "Atrasado %d dias";
    $lang['edit_task']                  = "Editar tarefa";
    $lang['edit_project']               = "Editar projeto";
    $lang['no_reparent']                = "Nenhum (projeto principal)";
    $lang['del_javascript_project_sprt']= "Isto ir� excluir o projeto %s. Est� certo disso?";
    $lang['del_javascript_task_sprt']   = "Isto ir� excluir a tarefa %s. Est� certo disso?";
    $lang['add_task']                   = "Adicionar tarefa";
    $lang['add_subtask']                = "Adicionar sub-tarefa";
    $lang['add_project']                = "Adicionar projeto";
    $lang['clone_project']              = "Clonar projeto";
    $lang['clone_task']                 = "Clonar tarefa";
    $lang['quick_jump']                 = "Jogo r�pido";
    $lang['no_edit']                    = "O �tem n�o est� sob sua responsabilidade, portanto voc� n�o pode edit�-lo";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "Excluir projeto";
    $lang['delete_task']                = "Excluir tarefa";
    $lang['project_options']            = "Op��es do projeto";
    $lang['task_options']               = "Op��es da tarefa";
    $lang['javascript_archive_project'] = "Isto ir� arquivar o projeto %s.  Est� certo disso?";
    $lang['archive_project']            = "Arquivar projeto";
    $lang['task_navigation']            = "Navegar pela tarefa";
    $lang['new_task']                   = "Nova tarefa";
    $lang['no_projects']                = "N�o existem projetos para visualizar";
    $lang['show_all_projects']          = "Exibir todos os projetos";
    $lang['show_active_projects']       = "Exibir apenas os projetos ativos";
    $lang['project_hold_sprt']          = "Projeto em espera desde %s";
    $lang['project_planned']            = "Projeto planejado";
    $lang['percent_sprt']               = "%d%% da tarefa conclu�da";
    $lang['project_no_deadline']        = "O projeto n�o possui prazo definido";
    $lang['no_allowed_projects']        = "N�o existem projetos que voc� esteja autorizado a visualizar";
    $lang['projects']                   = "Projetos";
    $lang['percent_project_sprt']       = "Este projeto est� %d%% conclu�do";
    $lang['owned_by']                   = "Respons�vel";
    $lang['created_on']                 = "Criado em";
    $lang['completed_on']               = "Finalizado em";
    $lang['modified_on']                = "Modificado em";
    $lang['project_on_hold']            = "Projeto est� em espera";
    $lang['project_accessible']         = "(Projeto acess�vel por todos os usu�rios)";
    $lang['task_accessible']            = "(Tarefa acess�vel por todos os usu�rios)";
    $lang['project_not_accessible']     = "(Projeto acess�vel apenas por membros da equipe)";
    $lang['task_not_accessible']        = "(Tarefa acess�vel apenas por membros da equipe)";
    $lang['project_not_in_usergroup']   = "Este projeto n�o pertence a nenhuma equipe e � acess�vel por todos.";
    $lang['task_not_in_usergroup']      = "Esta tarefa n�o pertence a nenhuma equipe e � acess�vel por todos.";
    $lang['usergroup_can_edit_project'] = "Este projeto pode ser editado tamb�m por membros da equipe.";
    $lang['usergroup_can_edit_task']    = "Esta tarefa pode ser editada tamb�m por membros da equipe.";
    $lang['i_take_it']                  = "Deixa comigo :)";
    $lang['i_finished']                 = "Terminei!";
    $lang['i_dont_want']                = "Passar a bola";
    $lang['take_over_project']          = "Assumir projeto";
    $lang['take_over_task']             = "Assumir tarefa";
    $lang['task_info']                  = "Informa��o da tarefa";
    $lang['project_details']            = "Detalhes do projeto";
    $lang['todo_list_for']              = "Lista � fazer para: ";
    $lang['due_in_sprt']                = "(Prazo de %d dias)";
    $lang['due_tomorrow']               = "(Para amanh�)";
    $lang['no_assigned']                = "N�o existem tarefas incompletas designadas para esse usu�rio.";
    $lang['todo_list']                  = "� Fazer";
    $lang['summary_list']               = "Sum�rio";
    $lang['task_submit']                = "Enviar tarefa";
    $lang['not_owner']                  = "Acesso negado, ou voc� n�o � o respons�vel ou n�o possui direitos de acesso";
    $lang['missing_values']             = "Campos preenchidos insuficientes, por favor retorne e tente novamente";
    $lang['future']                     = "Futuro";
    $lang['flags']                      = "Bandeiras";
    $lang['owner']                      = "Respons�vel";
    $lang['group']                      = "Equipe";
    $lang['by_usergroup']               = " (por equipe)";
    $lang['by_taskgroup']               = " (por grupo de tarefas)";
    $lang['by_deadline']                = " (por prazo)";
    $lang['by_status']                  = " (por status)";
    $lang['by_owner']                   = " (por respons�vel)";
    $lang['by_priority']                = " (por prioridade)";
    $lang['project_cloned']             = "Projeto a ser clonado:";
    $lang['task_cloned']                = "Tarefa a ser clonada:";
    $lang['note_clone']                 = "Obs: Essa tarefa ser� clonada como um novo projeto";

//bits 'n' pieces
    $lang['calendar']                   = "Calend�rio";
    $lang['normal_version']             = "Vers�o normal";
    $lang['print_version']              = "Vers�o para impress�o";
    $lang['condensed_view']             = "Exibi��o resumida";
    $lang['full_view']                  = "Exibi��o completa";
//**
    $lang['icalendar']                  = "iCalendar";

?>