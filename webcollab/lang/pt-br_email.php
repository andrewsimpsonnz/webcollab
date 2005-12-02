<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  Thi file created 2003 by Andrew Simpson

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

  Translation: Eduardo Alvim <eduardoalvim at terra.com.br>

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Novo arquivo enviado: %s";
$email_file_post          = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que um novo arquivo foi enviado em ".$email_date." por %1\$s.\n\n".
                            "Arquivo:        %2\$s\n".
                            "Descrição: %3\$s\n\n".
                            "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nova postagem no fórum: %s";
$email_forum_post         = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que uma nova mensagem foi enviada para o fórum em ".$email_date." por %1\$s:\n\n----\n\n%2\$s\n\n----\n\n".
                           "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";
$email_forum_reply        = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que uma nova mensagem foi enviada para o fórum em ".$email_date." por %1\$s.\n\n".
                           "Trata-se de uma resposta à mensagem anterior enviada por %2\$s.\n\n".
                           "Mensagem original:\n%3\$s\n\n".
                           "----\n\n".
                           "Responder:\n%4\$s\n\n".
                           "----\n\n".
                           "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";


$email_list =  "Projeto:  %1\$s\n".
               "Tarefa:     %2\$s\n".
               "Status:   %3\$s\n".
               "Responsável:    %4\$s ( %5\$s )\n".
               "Texto:\n%6\$s\n\n".
               "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Seu projeto foi assumido por outrem";
$title_takeover_task      = ABBR_MANAGER_NAME.": Sua tarefa foi assumida por outrem";

$email_takeover_task      = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que uma tarefa sob sua responsabilidade foi assumida por um administrador em ".$email_date.".\n\n";
$email_takeover_project   = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que um projeto sob sua responsabilidade foi assumido por um administrador em  ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Você tem um novo projeto";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Você tem uma nova tarefa";

$email_new_owner_project  = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que um novo projeto foi criado em ".$email_date.", e você é o responsável por ele.\n\nSeguem os detalhes:\n\n";
$email_new_owner_task     = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que uma nova tarefa foi criada em ".$email_date.", e você é o responsável por ela.\n\nSeguem os detalhes:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novo projeto: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova tarefa: %s";

$email_new_group_project  = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que um novo projeto foi criado em ".$email_date."\n\nSeguem os detalhes:\n\n";
$email_new_group_task     = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que uma nova tarefa foi criada em ".$email_date."\n\nSeguem os detalhes:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Atualização de seu projeto";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Atualização de sua tarefa";

$email_edit_owner_project = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que um projeto sob sua responsabilidade foi alterado em ".$email_date.".\n\nSeguem os detalhes:\n\n";
$email_edit_owner_task    = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que uma tarefa sob sua responsabilidade foi alterada em ".$email_date.".\n\nSeguem os detalhes:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projeto atualizado";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tarefa atualizada";

$email_edit_group_project = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que um projeto sob responsabilidade de %s foi alterado em ".$email_date.".\n\nSeguem os detalhes:\n\n";
$email_edit_group_task    = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que uma tarefa sob responsabilidade de %s foi alterada em ".$email_date.".\n\nSeguem os detalhes:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Exclusão de projeto";
$title_delete_task        = ABBR_MANAGER_NAME.": Exclusão de tarefa";

$email_delete_project     = "Olá,\n\n".
                            "Aqui é o site ".MANAGER_NAME." informando-lhe que um projeto sob sua responsabilidade foi excluído em ".$email_date."\n\n".
                            "Obrigado pela atenção e tempo dispensados.\n\n";
$email_delete_task        = "Olá,\n\n".
                            "Aqui é o site ".MANAGER_NAME." informando-lhe que um tarefa sob sua responsabilidade foi excluída em ".$email_date."\n\n".
                            "Obrigado pela atenção e tempo dispensados.\n\n";

$delete_list = "Projeto: %1\$s\n".
                "Tarefa:   %2\$s\n".
                "Status: %3\$s\n\n".
                "Texto:\n%4\$s\n\n";

$title_welcome            = "Benvindo ao ".ABBR_MANAGER_NAME;
$email_welcome            = "Olá,\n\nAqui é o site ".MANAGER_NAME." dando-lhe boas vindas ao sistema em ".$email_date.".\n\n".
                            "Como você é novo por aqui, vamos explicar-lhe algumas coisas antes de iniciar os trabalhos relativos a\n\n".
                            "Em primeira instância, o sistema é uma ferramenta de gerenciamento de projetos; a tela principal mostrará os projetos atualmente em curso. ".
                            "Se você clicar em algum dos projetos irá perceber seu nome relacionado em alguma(as) tarefa(as). É lá que o trabalho se desenvolve.\n\n".
                            "Toda mensagem que você enviar ao sistema ou tarefa que você editar será exibida aos demais usuários como 'nova' ou 'atualizada'. O contrário também acontece ".
                            "permitindo a você rapidamente detectar onde existe atividade.\n\n".
                            "Você pode também assumir a execução ou desistir de tarefas, bem como editá-las ou alterar as mensagens do fórum relativas à ela. ".
                            "À medida em que o trabalho for evoluindo por favor edite os textos e status relativos ao mesmo, permitindo a todos acompanhar o seu progresso. ".
                            "\n\nDesejo-lhe sucesso. Se estiver em apuros envie um e-mail para ".EMAIL_ADMIN." .\n\n --Boa sorte !\n\n".
                            "Login:      %1\$s\n".
                            "Senha:   %2\$s\n\n".
                            "Equipe: %3\$s".
                            "Nome:       %4\$s\n".
                            "Website:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Sua conta foi alterada por um administrador";
$email_user_change1       = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que sua conta foi alterada em ".$email_date." por %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Senha:   %4\$s\n\n".
                            "Equipe: %5\$s".
                            "Nome:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Alteração de sua conta";
$email_user_change2       = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que você foi bem sucedido ao alterar sua conta em ".$email_date.".\n\n".
                            "Login:    %1\$s\n".
                            "Senha: %2\$s\n\n".
                            "Nome:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Alteração de sua conta";
$email_user_change3       = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que você foi bem sucedido ao alterar a sua conta em ".$email_date.".\n\n".
                            "Login: %1\$s\n".
                            "Sua senha atual não foi modificada.\n\n".
                            "Nome:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Reativação de conta";
$email_revive             = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que sua conta foi reabilitada em ".$email_date.".\n\n".
                            "Login: %1\$s\n".
                            "Nome de usuário:  %2\$s\n\n".
                            "Nós não podemos enviá-lo sua senha pois a mesma encontra-se criptografada. \n\n".
                            "Se você esqueceu sua senha, consiga uma nova enviando um e-mail para ".EMAIL_ADMIN." .";



$title_delete_user        = ABBR_MANAGER_NAME.": Desativação de conta.";
$email_delete_user        = "Olá,\n\nAqui é o site ".MANAGER_NAME." informando-lhe que sua conta foi desativada em ".$email_date.".\n".
                            "Sentimos muito por sua saída e gostaríamos de agradecê-lo por seu trabalho!\n\n".
                            "Se você não concorda, ou acha que seja um erro, envie um e-mail para ".EMAIL_ADMIN.".";

?>
