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
define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "pt" );

//dates
$month_array = array (NULL, 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' );
$week_array = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' );

//task states

 //priorities
    $task_state['dontdo']               = "Não fazer";
    $task_state['low']                  = "Baixa";
    $task_state['normal']               = "Normal";
    $task_state['high']                 = "Alta";
    $task_state['yesterday']            = "Para ontem!!";
 //status
    $task_state['new']                  = "Nova";
    $task_state['planned']              = "Planejada (não ativa)";
    $task_state['active']               = "Ativa (sendo trabalhada)";
    $task_state['cantcomplete']         = "Em espera";
    $task_state['completed']            = "Finalizada";
    $task_state['done']                 = "Pronta";
    $task_state['task_planned']         = "Planejada";
    $task_state['task_active']          = "Ativa";
 //project states
    $task_state['planned_project']      = "Projeto planejado (não ativo)";
    $task_state['no_deadline_project']  = "Sem prazo definido";
    $task_state['active_project']       = "Projeto ativo";

//common items
    $lang['description']                = "Descrição";
    $lang['name']                       = "Nome";
    $lang['add']                        = "Adicionar";
    $lang['update']                     = "Atualizar";
    $lang['submit_changes']             = "Enviar alterações";
    $lang['continue']                   = "Continuar";
    $lang['manage']                     = "Gerenciar";
    $lang['edit']                       = "Editar";
    $lang['delete']                     = "Excluir";
    $lang['del']                        = "Excluir";
    $lang['confirm_del_javascript']     = "Confirma exclusão!";
    $lang['yes']                        = "Sim";
    $lang['no']                         = "Não";
    $lang['action']                     = "Ação";
    $lang['task']                       = "Tarefa";
    $lang['tasks']                      = "Tarefas";
    $lang['project']                    = "Projeto";
    $lang['info']                       = "Informação";
    $lang['bytes']                      = "bytes";
    $lang['select_instruct']            = "(Pressione Ctrl para (de)selecionar mais de um)";
    $lang['member_groups']              = "O usuário é membro das equipes realçadas abaixo (caso hajam)";
    $lang['login']                      = "Usuário";
    $lang['login_action']               = "Entra";
    $lang['login_screen']               = "Usuário";
    $lang['error']                      = "Erro";
    $lang['no_login']                   = "Acesso negado, verifique nome de usuário e senha";
    $lang['redirect_sprt']              = "Você será redirecionado à página de entrada em %d segundos";
    $lang['login_now']                  = "Por favor, clique aqui para retornar à página de entrada agora";
    $lang['please_login']               = "Identifique-se por favor";
    $lang['go']                         = "Vai!";

//graphic items
    $lang['late_g']                     = "&nbsp;ATRASADO&nbsp;";
    $lang['new_g']                      = "&nbsp;NOVO&nbsp;";
    $lang['updated_g']                  = "&nbsp;ATUALIZADO&nbsp;";

//admin config
    $lang['admin_config']               = "Config. administrativas";
    $lang['email_settings']             = "Configuração do cabeçalho de e-mail";
    $lang['admin_email']                = "E-mail administrativo";
    $lang['email_reply']                = "'Responder' para";
    $lang['email_from']                 = "'De'";
    $lang['mailing_list']               = "Lista de e-mails";
    $lang['default_checkbox']           = "Configuração padrão para Projetos/Tarefas";
    $lang['allow_globalaccess']         = "Permitir acesso global?";
    $lang['allow_group_edit']           = "Permitir edição por todos da equipe?";
    $lang['set_email_owner']            = "Sempre notificar responsável sobre mudanças?";
    $lang['set_email_group']            = "Sempre notificar equipe sobre mudanças?";
    $lang['project_listing_order']      = "Ordem de listagem dos projetos";
    $lang['task_listing_order']         = "Ordem de listagem das tarefas";
    $lang['configuration']              = "Configuração";

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
    $lang['address']                    = "Endereço:";
    $lang['postal']                     = "CEP:";
    $lang['city']                       = "Cidade:";
    $lang['email_contact']              = "E-mail:";
    $lang['notes']                      = "OBS:";
    $lang['add_contact']                = "Adicionar contato";
    $lang['del_contact']                = "Excluir contato";
    $lang['contact_info']               = "Informação do contato";
    $lang['contacts']                   = "Contatos";
    $lang['contact_add_info']           = "Quando cadastrado, o nome da empresa será exibido ao invés do nome do usuário.";
    $lang['show_contact']               = "Exibir contatos";
    $lang['edit_contact']               = "Editar contatos";
    $lang['contact_submit']             = "Enviar contato";
    $lang['contact_warn']               = "Campos insuficientes, por favor retorne e preencha ao menos nome e sobrenome";

 //files
    $lang['manage_files']               = "Gerenciar arquivos";
    $lang['no_files']                   = "Não existem arquivos para gerenciar";
    $lang['no_file_uploads']            = "O servidor foi configurado para não aceitar o envio de arquivos";
    $lang['file']                       = "Arquivo:";
    $lang['uploader']                   = "De:";
    $lang['files_assoc_project']        = "Arquivos relacionados ao projeto";
    $lang['files_assoc_task']           = "Arquivos relacionados à tarefa";
    $lang['file_admin']                 = "Administração de arquivos";
    $lang['add_file']                   = "Adicionar arquivo";
    $lang['files']                      = "Arquivos";
    $lang['file_choose']                = "Arquivo a ser enviado:";
    $lang['upload']                     = "Enviar";
    $lang['file_email_owner']           = "Notificar sobre o novo arquivo ao responsável?";
    $lang['file_email_usergroup']       = "Notificar sobre o novo arquivo à equipe?";
    $lang['max_file_sprt']              = "O arquivo a ser enviado deve ter menos que %s kb.";
    $lang['file_submit']                = "Enviar arquivo";
    $lang['no_upload']                  = "O arquivo não foi enviado. Por favor, volte e tente novamente.";
    $lang['file_too_big_sprt']          = "O tamanho máximo para envio de arquivos é de %s bytes. O arquivo enviado foi excluído por exceder tais limites.";
    $lang['del_file_javascript_sprt']   = "Está certo de que deseja excluir %s ?";


 //forum
    $lang['orig_message']               = "Mensagem original:";
    $lang['post']                       = "Postar!";
    $lang['message']                    = "Mensagem:";
    $lang['post_reply_sprt']            = "Postar uma resposta à mensagem de '%1\$s' sobre '%2\$s'";
    $lang['post_message_sprt']          = "Postar mensagem para: '%s'";
    $lang['forum_email_owner']          = "Notificar responsável sobre postagem?";
    $lang['forum_email_usergroup']      = "Notificar equipe sobre postagem?";
    $lang['reply']                      = "Responder";
    $lang['new_post']                   = "Nova postagem";
    $lang['public_user_forum']          = "Fórum público";
    $lang['private_forum_sprt']         = "Fórum privativo para a equipe '%s' ";
    $lang['forum_submit']               = "Enviar para fórum";
    $lang['no_message']                 = "Sem mensagens! Por favor, retorne e tente novamente";
    $lang['add_reply']                  = "Adicionar resposta";
    $lang['last_post_sprt']             = "Última postagem em %s"; //Note to translators: context is 'Last post 2004-Dec-22'
    $lang['recent_posts']               = "Postagens recentes no fórum";
//**
    $lang['forum_search']               = "Busca no fórum";
//**
    $lang['no_results']                 = "Sem resultados para '%s'";
//**
    $lang['search_results']             = "Encontrado %1\$s resultado para '%2\$s'<br />Exibindo resultado %3\$s de %4\$s";

 //includes
    $lang['report']                     = "Relatório";
    $lang['warning']                    = "<h1>Desculpe!</h1><p>Impossível processar solicitação no momento. Por favor, tente novamente mais tarde.</p>";
    $lang['home_page']                  = "Início";
    $lang['summary_page']               = "Sumário";
    $lang['log_out']                    = "Sair";
    $lang['main_menu']                  = "Menu Principal";
    $lang['archive']                    = "Arquivo";
    $lang['user_homepage_sprt']         = "Página principal para %s'";
    $lang['missing_field_javascript']   = "Por favor, entre valor para o campo faltante";
    $lang['invalid_date_javascript']    = "Por favor, escolha data válida no calendário";
    $lang['finish_date_javascript']     = "Data fornecida posterior ao término do projeto!";
    $lang['security_manager']           = "Segurança";
    $lang['session_timeout_sprt']       = "Acesso negado. Última ação há %1\$d minutos sendo que o intervalo máximo de inatividade é de %2\$d minutos. Por favor <a href=\"%3\$sindex.php\">entre</a> novamente";
    $lang['access_denied']              = "Acesso negado";
    $lang['private_usergroup_no_access']= "Desculpe, área privativa de uma equipe da qual você não faz parte.";
    $lang['invalid_date']               = "Data inválida";
    $lang['invalid_date_sprt']          = "A data %s não existe no calendário (verifique o número de dias no mês).<br/>Por favor, retorne e escolha outra data.";

 //taskgroups
    $lang['taskgroup_name']             = "Grupo de tarefas:";
    $lang['taskgroup_description']      = "Breve descrição:";
    $lang['add_taskgroup']              = "Adicionar";
    $lang['add_new_taskgroup']          = "Adicionar um novo grupo de tarefas";
    $lang['edit_taskgroup']             = "Editar grupo de tarefas";
    $lang['taskgroup_manage']           = "Gerenciar";
    $lang['no_taskgroups']              = "Sem grupo de tarefas";
    $lang['manage_taskgroups']          = "Gerenciar grupos de tarefas";
    $lang['taskgroups']                 = "Grupos de tarefas";
    $lang['taskgroup_dup_sprt']         = "Já existe um grupo de tarefas chamado '%s'. Por favor, retorne e escolha outro nome.";
    $lang['info_taskgroup_manage']      = "Informações sobre gerenciamento de grupo de tarefas";

 //usergroups
    $lang['usergroup_name']             = "Equipe:";
    $lang['usergroup_description']      = "Breve descrição da equipe:";
    $lang['members']                    = "Membros:";
    $lang['private_usergroup']          = "Equipe privativa";
    $lang['add_usergroup']              = "Adicionar equipe";
    $lang['add_new_usergroup']          = "Adicionar nova equipe";
    $lang['edit_usergroup']             = "Editar equipe";
//** needs translation
    $lang['email_new_usergroup']        = "Email new details to usergroup members?";
    $lang['email_edit_usergroup']       = "Email the changes to usergroup members?";
    $lang['usergroup_manage']           = "Gerenciar equipe";
    $lang['no_usergroups']              = "Sem equipes";
    $lang['manage_usergroups']          = "Gerenciar equipes";
    $lang['usergroups']                 = "Equipes";
    $lang['usergroup_dup_sprt']         = "Já existe uma equipe chamada '%s'. Por favor, retorne e escolha outro nome.";
    $lang['info_usergroup_manage']      = "Informações sobre gerenciamento de equipes";

 //users
    $lang['login_name']                 = "Nome de usuário";
    $lang['full_name']                  = "Nome completo";
    $lang['password']                   = "Senha";
    $lang['blank_for_current_password'] = "(Deixe em branco para manter a senha atual)";
    $lang['email']                      = "E-mail";
    $lang['admin']                      = "Administração";
    $lang['private_user']               = "Usuário privativo";
    $lang['normal_user']                = "Usuário normal";
    $lang['is_admin']                   = "Configurar como administrador?";
    $lang['is_guest']                   = "Configurar como visitante?";
    $lang['guest']                      = "Visitante";
    $lang['user_info']                  = "Informação de usuário";
    $lang['deleted_users']              = "Usuários excluídos";
    $lang['no_deleted_users']           = "Não existem usuários excluídos.";
    $lang['revive']                     = "Ressucitar";
    $lang['permdel']                    = "Exclusão definitiva";
    $lang['permdel_javascript_sprt']    = "Isto irá excluir permanentemente todos os registros e tarefas associadas ao usuário %s. Tem certeza disso?";
    $lang['add_user']                   = "Adicionar usuário";
    $lang['edit_user']                  = "Editar usuário";
    $lang['no_users']                   = "O sistema não possui usuários";
    $lang['users']                      = "Usuários";
    $lang['existing_users']             = "Usuários existentes";
    $lang['private_profile']            = "Este usuário possui um perfil privativo que não pode ser visualizado por você.";
    $lang['private_usergroup_profile']  = "(Este usuário é membro de uma equipe privativa e não pode ser visualizado por você)";
    $lang['email_users']                = "Enviar e-mail para usuários";
    $lang['select_usergroup']           = "Equipe selecionada abaixo:";
    $lang['subject']                    = "Assunto:";
    $lang['message_sent_maillist']      = "Sempre a mensagem também é copiada para a lista de e-mails.";
    $lang['who_online']                 = "Quem está conectado?";
    $lang['edit_details']               = "Editar detalhes";
    $lang['show_details']               = "Exibir detalhes";
    $lang['user_deleted']               = "Esse usuário foi excluído!";
    $lang['no_usergroup']               = "O usuário não é membro de uma equipe";
    $lang['not_usergroup']              = "(Não é membro de nenhuma equipe)";
    $lang['no_password_change']         = "(Sua senha não foi alterada)";
    $lang['last_time_here']             = "Último acesso:";
    $lang['number_items_created']       = "Nº de ítens criados:";
    $lang['number_projects_owned']      = "Nº de projetos sob sua responsabilidade:";
    $lang['number_tasks_owned']         = "Nº de tarefas sob sua responsabilidade:";
    $lang['number_tasks_completed']     = "Nº de tarefas finalizadas:";
    $lang['number_forum']               = "Nº de postagens em fóruns:";
    $lang['number_files']               = "Nº de arquivos enviados:";
    $lang['size_all_files']             = "Tamanho total de arquivos enviados:";
    $lang['owned_tasks']                = "Tarefas sob sua responsabilidade";
    $lang['invalid_email']              = "Endereço de e-mail inválido";
    $lang['invalid_email_given_sprt']   = "O endereço de e-mail '%s' é inválido. Por favor, retorne e tente novamente.";
    $lang['duplicate_user']             = "Duplicar usuário";
    $lang['duplicate_change_user_sprt'] = "O usuário '%s' já existe. Por favor, retorne e mude um dos nomes.";
    $lang['value_missing']              = "Dado faltante";
    $lang['field_sprt']                 = "O campo para o dado '%s' é faltante. Por favor, retorne e preencha-o.";
    $lang['admin_priv']                 = "OBS: Você possui privilégios de administrador.";
    $lang['manage_users']               = "Gerenciar usuários";
    $lang['users_online']               = "Usuários conectados";
    $lang['online']                     = "Usuários duro-na-queda (Conectados há pelo menos 60 minutos)";
    $lang['not_online']                 = "O resto";
    $lang['user_activity']              = "Atividade de usuário";

  //tasks
    $lang['add_new_task']               = "Adicionar nova tarefa";
    $lang['priority']                   = "Prioridade";
    $lang['parent_task']                = "Relacionada";
    $lang['creation_time']              = "Data de criação";
    $lang['by_sprt']                    = "%1\$s por %2\$s"; //Note to translators: context is 'Creation time: <date> by <user>'
    $lang['project_name']               = "Nome do Projeto";
    $lang['task_name']                  = "Nome da tarefa";
    $lang['deadline']                   = "Prazo";
    $lang['taken_from_parent']          = "(Obtida da tarefa-mãe)";
    $lang['status']                     = "Status";
    $lang['task_owner']                 = "Responsável pela Tarefa";
    $lang['project_owner']              = "Responsável pelo Projeto";
    $lang['taskgroup']                  = "Grupo de tarefas";
    $lang['usergroup']                  = "Equipe";
    $lang['nobody']                     = "Ninguém";
    $lang['none']                       = "Nenhum";
    $lang['no_group']                   = "Sem equipe";
    $lang['all_groups']                 = "Todas as equipes";
    $lang['all_users']                  = "Todos os usuários";
    $lang['all_users_view']             = "Visível para todos os usuários?";
    $lang['group_edit']                 = "Editável por qualquer membro da equipe?";
    $lang['project_description']        = "Descrição do projeto";
    $lang['task_description']           = "Descrição da tarefa";
    $lang['email_owner']                = "Notificar responsável sobre alterações?";
    $lang['email_new_owner']            = "Notificar (novo) responsável sobre alterações?";
    $lang['email_group']                = "Notificar equipe sobre alterações?";
    $lang['add_new_project']            = "Adicionar novo projeto";
    $lang['uncategorised']              = "Não-categorizado";
    $lang['due_sprt']                   = "Para daqui a %d dias";
    $lang['tomorrow']                   = "Amanhã";
    $lang['due_today']                  = "Até hoje";
    $lang['overdue_1']                  = "Atrasado 1 dia";
    $lang['overdue_sprt']               = "Atrasado %d dias";
    $lang['edit_task']                  = "Editar tarefa";
    $lang['edit_project']               = "Editar projeto";
    $lang['no_reparent']                = "Nenhum (projeto principal)";
    $lang['del_javascript_project_sprt']= "Isto irá excluir o projeto %s. Está certo disso?";
    $lang['del_javascript_task_sprt']   = "Isto irá excluir a tarefa %s. Está certo disso?";
    $lang['add_task']                   = "Adicionar tarefa";
    $lang['add_subtask']                = "Adicionar sub-tarefa";
    $lang['add_project']                = "Adicionar projeto";
    $lang['clone_project']              = "Clonar projeto";
    $lang['clone_task']                 = "Clonar tarefa";
    $lang['quick_jump']                 = "Jogo rápido";
    $lang['no_edit']                    = "O ítem não está sob sua responsabilidade, portanto você não pode editá-lo";
    $lang['global']                     = "Global";
    $lang['delete_project']             = "Excluir projeto";
    $lang['delete_task']                = "Excluir tarefa";
    $lang['project_options']            = "Opções do projeto";
    $lang['task_options']               = "Opções da tarefa";
    $lang['javascript_archive_project'] = "Isto irá arquivar o projeto %s.  Está certo disso?";
    $lang['archive_project']            = "Arquivar projeto";
    $lang['task_navigation']            = "Navegar pela tarefa";
    $lang['new_task']                   = "Nova tarefa";
    $lang['no_projects']                = "Não existem projetos para visualizar";
    $lang['show_all_projects']          = "Exibir todos os projetos";
    $lang['show_active_projects']       = "Exibir apenas os projetos ativos";
    $lang['project_hold_sprt']          = "Projeto em espera desde %s";
    $lang['project_planned']            = "Projeto planejado";
    $lang['percent_sprt']               = "%d%% da tarefa concluída";
    $lang['project_no_deadline']        = "O projeto não possui prazo definido";
    $lang['no_allowed_projects']        = "Não existem projetos que você esteja autorizado a visualizar";
    $lang['projects']                   = "Projetos";
    $lang['percent_project_sprt']       = "Este projeto está %d%% concluído";
    $lang['owned_by']                   = "Responsável";
    $lang['created_on']                 = "Criado em";
    $lang['completed_on']               = "Finalizado em";
    $lang['modified_on']                = "Modificado em";
    $lang['project_on_hold']            = "Projeto está em espera";
    $lang['project_accessible']         = "(Projeto acessível por todos os usuários)";
    $lang['task_accessible']            = "(Tarefa acessível por todos os usuários)";
    $lang['project_not_accessible']     = "(Projeto acessível apenas por membros da equipe)";
    $lang['task_not_accessible']        = "(Tarefa acessível apenas por membros da equipe)";
    $lang['project_not_in_usergroup']   = "Este projeto não pertence a nenhuma equipe e é acessível por todos.";
    $lang['task_not_in_usergroup']      = "Esta tarefa não pertence a nenhuma equipe e é acessível por todos.";
    $lang['usergroup_can_edit_project'] = "Este projeto pode ser editado também por membros da equipe.";
    $lang['usergroup_can_edit_task']    = "Esta tarefa pode ser editada também por membros da equipe.";
    $lang['i_take_it']                  = "Deixa comigo :)";
    $lang['i_finished']                 = "Terminei!";
    $lang['i_dont_want']                = "Passar a bola";
    $lang['take_over_project']          = "Assumir projeto";
    $lang['take_over_task']             = "Assumir tarefa";
    $lang['task_info']                  = "Informação da tarefa";
    $lang['project_details']            = "Detalhes do projeto";
    $lang['todo_list_for']              = "Lista à fazer para: ";
    $lang['due_in_sprt']                = "(Prazo de %d dias)";
    $lang['due_tomorrow']               = "(Para amanhã)";
    $lang['no_assigned']                = "Não existem tarefas incompletas designadas para esse usuário.";
    $lang['todo_list']                  = "À Fazer";
    $lang['summary_list']               = "Sumário";
    $lang['task_submit']                = "Enviar tarefa";
    $lang['not_owner']                  = "Acesso negado, ou você não é o responsável ou não possui direitos de acesso";
    $lang['missing_values']             = "Campos preenchidos insuficientes, por favor retorne e tente novamente";
    $lang['future']                     = "Futuro";
    $lang['flags']                      = "Bandeiras";
    $lang['owner']                      = "Responsável";
    $lang['group']                      = "Equipe";
    $lang['by_usergroup']               = " (por equipe)";
    $lang['by_taskgroup']               = " (por grupo de tarefas)";
    $lang['by_deadline']                = " (por prazo)";
    $lang['by_status']                  = " (por status)";
    $lang['by_owner']                   = " (por responsável)";
    $lang['by_priority']                = " (por prioridade)";
    $lang['project_cloned']             = "Projeto a ser clonado:";
    $lang['task_cloned']                = "Tarefa a ser clonada:";
    $lang['note_clone']                 = "Obs: Essa tarefa será clonada como um novo projeto";

//bits 'n' pieces
    $lang['calendar']                   = "Calendário";
    $lang['normal_version']             = "Versão normal";
    $lang['print_version']              = "Versão para impressão";
    $lang['condensed_view']             = "Exibição resumida";
    $lang['full_view']                  = "Exibição completa";
//**
    $lang['icalendar']                  = "iCalendar";
//**
    $lang['url_javascript']             = "Enter the URL:";
//**
    $lang['image_url_javascript']       = "Enter the image URL:";

?>