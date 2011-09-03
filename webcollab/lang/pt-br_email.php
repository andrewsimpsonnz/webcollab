<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003

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

  Email text language files for 'pt_br' (Brazilian Portuguese)

  Translation: Eduardo Alvim <eduardoalvim at gmail.com>

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post          = ABBR_MANAGER_NAME.": Novo arquivo enviado: %s";
$email_file_post          = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." informando-lhe que um novo arquivo foi enviado em ".$email_date." por %1\$s.\n\n".
                            "Arquivo:        %2\$s\n".
                            "Descrição: %3\$s\n\n".
                            "Projeto:        %4\$s\n".
                            "Tarefa:         %5\$s\n\n".
                            "Por favor, acesse o sítio para maiores detalhes.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nova postagem no fórum: %s";
$email_forum_post         = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre o envio de uma nova mensagem ao fórum em ".$email_date." por %1\$s:\n\n".
                           "----\n\n".
                           "%2\$s\n\n".
                           "----\n\n".
                           "Por favor, acesse o sítio para maiores detalhes.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre o envio de uma nova mensagem para o fórum em ".$email_date." por %1\$s.\n\n".
                           "Trata-se de uma resposta à mensagem anterior enviada por %2\$s.\n\n".
                           "Mensagem original:\n%3\$s\n\n".
                           "----\n\n".
                           "Responder:\n%4\$s\n\n".
                           "----\n\n".
                           "Por favor, acesse o sítio para maiores detalhes.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Projeto:  %1\$s\n".
               "Tarefa:     %2\$s\n".
               "Status:   %3\$s\n".
               "Responsável:    %4\$s ( %5\$s )\n".
               "Texto:\n%6\$s\n\n".
               "Por favor, acesse o sítio para maiores detalhes.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Seu projeto foi assumido por outrem";
$title_takeover_task      = ABBR_MANAGER_NAME.": Sua tarefa foi assumida por outrem";

$email_takeover_task      = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a assunção de uma tarefa sob sua responsabilidade por um administrador em ".$email_date.".\n\n";
$email_takeover_project   = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a assunção de um projeto sob sua responsabilidade por um administrador em  ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Novo projeto para você";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova tarefa para você";

$email_new_owner_project  = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a criação de um novo projeto em ".$email_date.", tendo você como responsável.\n\nDetalhes:\n\n";
$email_new_owner_task     = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a criação de uma nova tarefa em ".$email_date.", tendo você como responsável.\n\nDetalhes:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novo projeto: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova tarefa: %s";

$email_new_group_project  = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a criação de um novo projeto em ".$email_date."\n\nDetalhes:\n\n";
$email_new_group_task     = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a criação de uma nova tarefa em ".$email_date."\n\nDetalhes:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Projeto atualizado";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Tarefa atualizada";

$email_edit_owner_project = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre alterações efetuadas em um projeto sob sua responsabilidade em ".$email_date.".\n\nDetalhes:\n\n";
$email_edit_owner_task    = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre alterações efetuadas em uma tarefa sob sua responsabilidade em ".$email_date.".\n\nDetalhes:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projeto atualizado";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tarefa atualizada";

$email_edit_group_project = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre alterações efetuadas em um projeto sob responsabilidade de %s em ".$email_date.".\n\nDetalhes:\n\n";
$email_edit_group_task    = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre alterações efetuadas em uma tarefa sob responsabilidade de %s em ".$email_date.".\n\nDetalhes:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Exclusão de projeto";
$title_delete_task        = ABBR_MANAGER_NAME.": Exclusão de tarefa";

$email_delete_project     = "Olá,\n\n".
                            "Aqui é o sítio ".MANAGER_NAME." lhe informando sobre a exclusão de um projeto sob sua responsabilidade em ".$email_date."\n\n".
                            "Obrigado pela atenção e tempo dispensados.\n\n";
$email_delete_task        = "Olá,\n\n".
                            "Aqui é o sítio ".MANAGER_NAME." lhe informando sobre a exclusão de uma tarefa sob sua responsabilidade em ".$email_date."\n\n".
                            "Obrigado pela atenção e tempo dispensados.\n\n";

$delete_list = "Projeto: %1\$s\n".
                "Tarefa:   %2\$s\n".
                "Status: %3\$s\n\n".
                "Texto:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": New usergroup %1\$s created";
$email_usergroup_add      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that a new usergroup %1\$s, has been created on ".$email_date.".\n\n".
                            "The members of the new usergroup are:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Usergroup %1\$s changed";
$email_usergroup_edit      = "Hello,\n\n".
                            "This is the ".MANAGER_NAME." site informing you that usergroup %1\$s, has been changed on ".$email_date.".\n\n".
                            "The members of the usergroup are:\n".
                            "%2\$s\n";

$title_welcome            = "Bem-vindo ao ".ABBR_MANAGER_NAME;
$email_welcome            = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." desejando-lhe boas vindas em ".$email_date.".\n\n".
                            "Como você é novo por aqui, vamos lhe explicar algumas coisas antes de começar os trabalhos relativos a\n\n".
                            "Em primeira instância, esse sistema é uma ferramenta de gerenciamento de projetos. A tela principal mostrará os projetos em andamento. ".
                            "Ao clicar em algum projeto poderá perceber seu nome vinculado a alguma(s) tarefa(s). É lá que o trabalho se desenvolve.\n\n".
                            "Toda mensagem enviada por você ao sistema, ou tarefa por você editada, será exibida aos demais usuários como 'nova' ou 'atualizada'. A recíproca é verdadeira ".
                            "permitindo a rápida detecção da existência de atividade.\n\n".
                            "Também é possível assumir ou desistir de tarefas, bem como editá-las, além de alterar as mensagens vinculadas no fórum. ".
                            "De acordo com a evolução do trabalho edite por gentileza os textos e status relativos ao mesmo, de forma a permitir o acompanhamento dos progressos por todos. ".
                            "\n\nDesejo-lhe sucesso. Se precisar de ajuda envie um e-mail para ".EMAIL_ADMIN." .\n\n --Boa sorte !\n\n".
                            "Usuário:      %1\$s\n".
                            "Senha:   %2\$s\n\n".
                            "Equipe: %3\$s".
                            "Nome:       %4\$s\n".
                            "Página:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Um administrador do sistema alterou sua conta";
$email_user_change1       = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a alteração de sua conta em ".$email_date." por %1\$s ( %2\$s ) \n\n".
                            "Usuário:      %3\$s\n".
                            "Senha:   %4\$s\n\n".
                            "Equipe: %5\$s".
                            "Nome:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Conta alterada";
$email_user_change2       = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando que sua conta foi alterada com sucesso em ".$email_date.".\n\n".
                            "Usuário:    %1\$s\n".
                            "Senha: %2\$s\n\n".
                            "Nome:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Conta alterada";
$email_user_change3       = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando que sua conta foi alterada com sucesso em ".$email_date.".\n\n".
                            "Usuário: %1\$s\n".
                            "Sua senha atual não foi modificada.\n\n".
                            "Nome:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Conta reativada";
$email_revive             = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a reabilitação de sua conta em ".$email_date.".\n\n".
                            "Usuário: %1\$s\n".
                            "Nome de usuário:  %2\$s\n\n".
                            "Não podemos enviá-lo sua senha pois a mesma encontra-se criptografada. \n\n".
                            "Caso tenha esquecido sua senha, obtenha uma nova enviando um e-mail para ".EMAIL_ADMIN." .";



$title_delete_user        = ABBR_MANAGER_NAME.": Conta desativada.";
$email_delete_user        = "Olá,\n\nAqui é o sítio ".MANAGER_NAME." lhe informando sobre a desativação de sua conta em ".$email_date.".\n".
                            "Sentimos muito por sua saída e gostaríamos de agradecê-lo por seu trabalho!\n\n".
                            "Caso você não concorde, ou acha que seja um erro, envie um e-mail para ".EMAIL_ADMIN.".";

?>
