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

  
  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Novo arquivo enviado: %s";
$email_file_post          = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que um novo arquivo foi enviado em ".$email_date." por %1\$s.\n\n".
                            "Arquivo:        %2\$s\n".
                            "Descri&ccedil;&atilde;o: %3\$s\n\n".
                            "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nova postagem no f&oacute;rum: %s";
$email_forum_post         = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que uma nova mensagem foi enviada para o f&oacute;rum em ".$email_date." por %1\$s:\n\n----\n\n%2\$s\n\n----\n\n".
                           "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";
$email_forum_reply        = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que uma nova mensagem foi enviada para o f&oacute;rum em ".$email_date." por %1\$s.\n\n".
                           "Trata-se de uma resposta &agrave; mensagem anterior enviada por %2\$s.\n\n".
                           "Mensagem original:\n%3\$s\n\n".
                           "----\n\n".
                           "Responder:\n%4\$s\n\n".
                           "----\n\n".
                           "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";


$email_list =  "Projeto:  %1\$s\n".
               "Tarefa:     %2\$s\n".
               "Status:   %3\$s\n".
               "Respons&aacute;vel:    %4\$s ( %5\$s )\n".
               "Texto:\n%6\$s\n\n".
               "Por favor, acesse o site para maiores detalhes.\n\n".BASE_URL."\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": Seu projeto foi assumido por outrem";
$title_takeover_task      = ABBR_MANAGER_NAME.": Sua tarefa foi assumida por outrem";

$email_takeover_task      = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que uma tarefa sob sua responsabilidade foi assumida por um administrador em ".$email_date.".\n\n";
$email_takeover_project   = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que um projeto sob sua responsabilidade foi assumido por um administrador em  ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Voc&ecirc; tem um novo projeto";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Voc&ecirc; tem uma nova tarefa";

$email_new_owner_project  = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que um novo projeto foi criado em ".$email_date.", e voc&ecirc; &eacute; o respons&aacute;vel por ele.\n\nSeguem os detalhes:\n\n";
$email_new_owner_task     = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que uma nova tarefa foi criada em ".$email_date.", e voc&ecirc; &eacute; o respons&aacute;vel por ela.\n\nSeguem os detalhes:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novo projeto: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova tarefa: %s";

$email_new_group_project  = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que um novo projeto foi criado em ".$email_date."\n\nSeguem os detalhes:\n\n";
$email_new_group_task     = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que uma nova tarefa foi criada em ".$email_date."\n\nSeguem os detalhes:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Atualiza&ccedil;&atilde;o de seu projeto";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Atualiza&ccedil;&atilde;o de sua tarefa";

$email_edit_owner_project = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que um projeto sob sua responsabilidade foi alterado em ".$email_date.".\n\nSeguem os detalhes:\n\n";
$email_edit_owner_task    = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que uma tarefa sob sua responsabilidade foi alterada em ".$email_date.".\n\nSeguem os detalhes:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projeto atualizado";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tarefa atualizada";

$email_edit_group_project = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que um projeto sob responsabilidade de %s foi alterado em ".$email_date.".\n\nSeguem os detalhes:\n\n";
$email_edit_group_task    = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que uma tarefa sob responsabilidade de %s foi alterada em ".$email_date.".\n\nSeguem os detalhes:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Exclus&atilde;o de projeto";
$title_delete_task        = ABBR_MANAGER_NAME.": Exclus&atilde;o de tarefa";

$email_delete_project     = "Ol&aacute;,\n\n".
                            "Aqui &eacute; o site ".MANAGER_NAME." informando-lhe que um projeto sob sua responsabilidade foi exclu&iacute;do em ".$email_date."\n\n".
                            "Obrigado pela aten&ccedil;&atilde;o e tempo dispensados.\n\n";
$email_delete_task        = "Ol&aacute;,\n\n".
                            "Aqui &eacute; o site ".MANAGER_NAME." informando-lhe que um tarefa sob sua responsabilidade foi exclu&iacute;da em ".$email_date."\n\n".
                            "Obrigado pela aten&ccedil;&atilde;o e tempo dispensados.\n\n";

$delete_list = "Projeto: %1\$s\n".
                "Tarefa:   %2\$s\n".
                "Status: %3\$s\n\n".
                "Texto:\n%4\$s\n\n";

$title_welcome            = "Benvindo ao ".ABBR_MANAGER_NAME;
$email_welcome            = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." dando-lhe boas vindas ao sistema em ".$email_date.".\n\n".
                            "Como voc&ecirc; &eacute; novo por aqui, vamos explicar-lhe algumas coisas antes de iniciar os trabalhos relativos a\n\n".
                            "Em primeira inst&acirc;ncia, o sistema &eacute; uma ferramenta de gerenciamento de projetos; a tela principal mostrar&aacute; os projetos atualmente em curso. ".
                            "Se voc&ecirc; clicar em algum dos projetos ir&aacute; perceber seu nome relacionado em alguma(as) tarefa(as). &Eacute; l&aacute; que o trabalho se desenvolve.\n\n".
                            "Toda mensagem que voc&ecirc; enviar ao sistema ou tarefa que voc&ecirc; editar ser&aacute; exibida aos demais usu&aacute;rios como 'nova' ou 'atualizada'. O contr&aacute;rio tamb&eacute;m acontece ".
                            "permitindo a voc&ecirc; rapidamente detectar onde existe atividade.\n\n".
                            "Voc&ecirc; pode tamb&eacute;m assumir a execu&ccedil;&atilde;o ou desistir de tarefas, bem como edit&aacute;-las ou alterar as mensagens do f&oacute;rum relativas &agrave; ela. ".
                            "&Agrave; medida em que o trabalho for evoluindo por favor edite os textos e status relativos ao mesmo, permitindo a todos acompanhar o seu progresso. ".
                            "\n\nDesejo-lhe sucesso. Se estiver em apuros envie um e-mail para ".EMAIL_ADMIN." .\n\n --Boa sorte !\n\n".
                            "Login:      %1\$s\n".
                            "Senha:   %2\$s\n\n".
                            "Equipe: %3\$s".
                            "Nome:       %4\$s\n".
                            "Website:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Sua conta foi alterada por um administrador";
$email_user_change1       = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que sua conta foi alterada em ".$email_date." por %1\$s ( %2\$s ) \n\n".
                            "Login:      %3\$s\n".
                            "Senha:   %4\$s\n\n".
                            "Equipe: %5\$s".
                            "Nome:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Altera&ccedil;&atilde;o de sua conta";
$email_user_change2       = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que voc&ecirc; foi bem sucedido ao alterar sua conta em ".$email_date.".\n\n".
                            "Login:    %1\$s\n".
                            "Senha: %2\$s\n\n".
                            "Nome:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Altera&ccedil;&atilde;o de sua conta";
$email_user_change3       = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que voc&ecirc; foi bem sucedido ao alterar a sua conta em ".$email_date.".\n\n".
                            "Login: %1\$s\n".
                            "Sua senha atual n&atilde;o foi modificada.\n\n".
                            "Nome:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Reativa&ccedil;&atilde;o de conta";
$email_revive             = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que sua conta foi reabilitada em ".$email_date.".\n\n".
                            "Login: %1\$s\n".
                            "Nome de usu&aacute;rio:  %2\$s\n\n".
                            "N&oacute;s n&atilde;o podemos envi&aacute;-lo sua senha pois a mesma encontra-se criptografada. \n\n".
                            "Se voc&ecirc; esqueceu sua senha, consiga uma nova enviando um e-mail para ".EMAIL_ADMIN." .";



$title_delete_user        = ABBR_MANAGER_NAME.": Desativa&ccedil;&atilde;o de conta.";
$email_delete_user        = "Ol&aacute;,\n\nAqui &eacute; o site ".MANAGER_NAME." informando-lhe que sua conta foi desativada em ".$email_date.".\n".
                            "Sentimos muito por sua sa&iacute;da e gostar&iacute;amos de agradec&ecirc;-lo por seu trabalho!\n\n".
                            "Se voc&ecirc; n&atilde;o concorda, ou acha que seja um erro, envie um e-mail para ".EMAIL_ADMIN.".";

?>
