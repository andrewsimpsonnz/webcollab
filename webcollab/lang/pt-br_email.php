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

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Novo arquivo enviado: %s";
$email_file_post          = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." informando-lhe que um novo arquivo foi enviado em ".$email_date." por %1\$s.\n\n".
                            "Arquivo:        %2\$s\n".
                            "Descri��o: %3\$s\n\n".
                            "Projeto:        %4\$s\n".
                            "Tarefa:         %5\$s\n\n".
                            "Por favor, acesse o s�tio para maiores detalhes.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nova postagem no f�rum: %s";
$email_forum_post         = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre o envio de uma nova mensagem ao f�rum em ".$email_date." por %1\$s:\n\n".
                           "----\n\n".
                           "%2\$s\n\n".
                           "----\n\n".
                           "Por favor, acesse o s�tio para maiores detalhes.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre o envio de uma nova mensagem para o f�rum em ".$email_date." por %1\$s.\n\n".
                           "Trata-se de uma resposta � mensagem anterior enviada por %2\$s.\n\n".
                           "Mensagem original:\n%3\$s\n\n".
                           "----\n\n".
                           "Responder:\n%4\$s\n\n".
                           "----\n\n".
                           "Por favor, acesse o s�tio para maiores detalhes.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Projeto:  %1\$s\n".
               "Tarefa:     %2\$s\n".
               "Status:   %3\$s\n".
               "Respons�vel:    %4\$s ( %5\$s )\n".
               "Texto:\n%6\$s\n\n".
               "Por favor, acesse o s�tio para maiores detalhes.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Seu projeto foi assumido por outrem";
$title_takeover_task      = ABBR_MANAGER_NAME.": Sua tarefa foi assumida por outrem";

$email_takeover_task      = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a assun��o de uma tarefa sob sua responsabilidade por um administrador em ".$email_date.".\n\n";
$email_takeover_project   = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a assun��o de um projeto sob sua responsabilidade por um administrador em  ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Novo projeto para voc�";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova tarefa para voc�";

$email_new_owner_project  = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a cria��o de um novo projeto em ".$email_date.", tendo voc� como respons�vel.\n\nDetalhes:\n\n";
$email_new_owner_task     = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a cria��o de uma nova tarefa em ".$email_date.", tendo voc� como respons�vel.\n\nDetalhes:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novo projeto: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova tarefa: %s";

$email_new_group_project  = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a cria��o de um novo projeto em ".$email_date."\n\nDetalhes:\n\n";
$email_new_group_task     = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a cria��o de uma nova tarefa em ".$email_date."\n\nDetalhes:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Projeto atualizado";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Tarefa atualizada";

$email_edit_owner_project = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre altera��es efetuadas em um projeto sob sua responsabilidade em ".$email_date.".\n\nDetalhes:\n\n";
$email_edit_owner_task    = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre altera��es efetuadas em uma tarefa sob sua responsabilidade em ".$email_date.".\n\nDetalhes:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projeto atualizado";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tarefa atualizada";

$email_edit_group_project = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre altera��es efetuadas em um projeto sob responsabilidade de %s em ".$email_date.".\n\nDetalhes:\n\n";
$email_edit_group_task    = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre altera��es efetuadas em uma tarefa sob responsabilidade de %s em ".$email_date.".\n\nDetalhes:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Exclus�o de projeto";
$title_delete_task        = ABBR_MANAGER_NAME.": Exclus�o de tarefa";

$email_delete_project     = "Ol�,\n\n".
                            "Aqui � o s�tio ".MANAGER_NAME." lhe informando sobre a exclus�o de um projeto sob sua responsabilidade em ".$email_date."\n\n".
                            "Obrigado pela aten��o e tempo dispensados.\n\n";
$email_delete_task        = "Ol�,\n\n".
                            "Aqui � o s�tio ".MANAGER_NAME." lhe informando sobre a exclus�o de uma tarefa sob sua responsabilidade em ".$email_date."\n\n".
                            "Obrigado pela aten��o e tempo dispensados.\n\n";

$delete_list = "Projeto: %1\$s\n".
                "Tarefa:   %2\$s\n".
                "Status: %3\$s\n\n".
                "Texto:\n%4\$s\n\n";

$title_welcome            = "Bem-vindo ao ".ABBR_MANAGER_NAME;
$email_welcome            = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." desejando-lhe boas vindas em ".$email_date.".\n\n".
                            "Como voc� � novo por aqui, vamos lhe explicar algumas coisas antes de come�ar os trabalhos relativos a\n\n".
                            "Em primeira inst�ncia, esse sistema � uma ferramenta de gerenciamento de projetos. A tela principal mostrar� os projetos em andamento. ".
                            "Ao clicar em algum projeto poder� perceber seu nome vinculado a alguma(s) tarefa(s). � l� que o trabalho se desenvolve.\n\n".
                            "Toda mensagem enviada por voc� ao sistema, ou tarefa por voc� editada, ser� exibida aos demais usu�rios como 'nova' ou 'atualizada'. A rec�proca � verdadeira ".
                            "permitindo a r�pida detec��o da exist�ncia de atividade.\n\n".
                            "Tamb�m � poss�vel assumir ou desistir de tarefas, bem como edit�-las, al�m de alterar as mensagens vinculadas no f�rum. ".
                            "De acordo com a evolu��o do trabalho edite por gentileza os textos e status relativos ao mesmo, de forma a permitir o acompanhamento dos progressos por todos. ".
                            "\n\nDesejo-lhe sucesso. Se precisar de ajuda envie um e-mail para ".EMAIL_ADMIN." .\n\n --Boa sorte !\n\n".
                            "Usu�rio:      %1\$s\n".
                            "Senha:   %2\$s\n\n".
                            "Equipe: %3\$s".
                            "Nome:       %4\$s\n".
                            "P�gina:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Um administrador do sistema alterou sua conta";
$email_user_change1       = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a altera��o de sua conta em ".$email_date." por %1\$s ( %2\$s ) \n\n".
                            "Usu�rio:      %3\$s\n".
                            "Senha:   %4\$s\n\n".
                            "Equipe: %5\$s".
                            "Nome:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Conta alterada";
$email_user_change2       = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando que sua conta foi alterada com sucesso em ".$email_date.".\n\n".
                            "Usu�rio:    %1\$s\n".
                            "Senha: %2\$s\n\n".
                            "Nome:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Conta alterada";
$email_user_change3       = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando que sua conta foi alterada com sucesso em ".$email_date.".\n\n".
                            "Usu�rio: %1\$s\n".
                            "Sua senha atual n�o foi modificada.\n\n".
                            "Nome:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Conta reativada";
$email_revive             = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a reabilita��o de sua conta em ".$email_date.".\n\n".
                            "Usu�rio: %1\$s\n".
                            "Nome de usu�rio:  %2\$s\n\n".
                            "N�o podemos envi�-lo sua senha pois a mesma encontra-se criptografada. \n\n".
                            "Caso tenha esquecido sua senha, obtenha uma nova enviando um e-mail para ".EMAIL_ADMIN." .";



$title_delete_user        = ABBR_MANAGER_NAME.": Conta desativada.";
$email_delete_user        = "Ol�,\n\nAqui � o s�tio ".MANAGER_NAME." lhe informando sobre a desativa��o de sua conta em ".$email_date.".\n".
                            "Sentimos muito por sua sa�da e gostar�amos de agradec�-lo por seu trabalho!\n\n".
                            "Caso voc� n�o concorde, ou acha que seja um erro, envie um e-mail para ".EMAIL_ADMIN.".";

?>
