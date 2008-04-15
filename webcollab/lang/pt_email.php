<?php
/*
  $Id: pt_email.php 1871 2007-08-14 08:55:15Z andrewsimpson $

  WebCollab
  ---------------------------------------
  This file created 2008

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

  Email text language files for 'pt' (Portuguese Standard)

  Translation: A. Madeira <amadeirax at gmail.com>

*/

// Get current date/time for emails in a preferred format eg: 01 Apr 2004 9:18 am NZDT  
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y \a\t g:i a T' );

$title_file_post          = ABBR_MANAGER_NAME.": Novo ficheiro enviado: %s";
$email_file_post          = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que um novo ficheiro foi enviado em ".$email_date." por %1\$s.\n\n".
                            "Ficheiro:        %2\$s\n".
                            "Descri��o: %3\$s\n\n".
                            "Projecto:        %4\$s\n".
                            "Tarefa:         %5\$s\n\n".
                            "Por favor, aceda ao portal para mais detalhes.\n\n".BASE_URL."%6\$s\n";


$title_forum_post         = ABBR_MANAGER_NAME.": Nova mensagem colocada no f�rum: %s";
$email_forum_post         = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que uma nova mensagem foi colocada no f�rum em ".$email_date." por %1\$s:\n\n".
                           "----\n\n".
                           "%2\$s\n\n".
                           "----\n\n".
                           "Por favor, aceda ao portal para mais detalhes.\n\n".BASE_URL."%3\$s\n";
$email_forum_reply        = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que uma nova mensagem foi colocada no f�rum em ".$email_date." por %1\$s.\n\n".
                           "Trata-se de uma resposta a uma mensagem anterior enviada por %2\$s.\n\n".
                           "Mensagem original:\n%3\$s\n\n".
                           "----\n\n".
                           "Nova resposta:\n%4\$s\n\n".
                           "----\n\n".
                           "Por favor, aceda ao portal para mais detalhes.\n\n".BASE_URL."%5\$s\n";


$email_list =  "Projecto:  %1\$s\n".
               "Tarefa:     %2\$s\n".
               "Status:   %3\$s\n".
               "Respons�vel:    %4\$s ( %5\$s )\n".
               "Texto:\n%6\$s\n\n".
               "Por favor, aceda ao portal para mais detalhes.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": O seu projeto foi assumido por outrem";
$title_takeover_task      = ABBR_MANAGER_NAME.": A sua tarefa foi assumida por outrem";

$email_takeover_task      = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que uma tarefa sob sua responsabilidade foi assumida por um administrador em ".$email_date.".\n\n";
$email_takeover_project   = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que um projecto sob sua responsabilidade foi assumido por um administrador em ".$email_date.".\n\n";


$title_new_owner_project  = ABBR_MANAGER_NAME.": Novo projecto para si";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova tarefa para si";

$email_new_owner_project  = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foi criado um novo projecto em ".$email_date.", tendo a si como respons�vel.\n\nDetalhes:\n\n";
$email_new_owner_task     = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foi criada uma nova tarefa em ".$email_date.", tendo a si como respons�vel.\n\nDetalhes:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": Novo projecto: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova tarefa: %s";

$email_new_group_project  = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foi criado um novo projecto em ".$email_date."\n\nDetalhes:\n\n";
$email_new_group_task     = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foi criada uma nova tarefa em ".$email_date."\n\nDetalhes:\n\n";


$title_edit_owner_project = ABBR_MANAGER_NAME.": Projecto actualizado";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": Tarefa actualizada";

$email_edit_owner_project = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foram efectuadas altera��es num projecto sob sua responsabilidade em ".$email_date.".\n\nDetalhes:\n\n";
$email_edit_owner_task    = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foram efectuadas altera��es numa tarefa sob sua responsabilidade em ".$email_date.".\n\nDetalhes:\n\n";


$title_edit_group_project = ABBR_MANAGER_NAME.": Projecto actualizado";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tarefa actualizada";

$email_edit_group_project = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foram efectuadas altera��es num projecto sob responsabilidade de %s em ".$email_date.".\n\nDetalhes:\n\n";
$email_edit_group_task    = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foram efectuadas altera��es numa tarefa sob responsabilidade de %s em ".$email_date.".\n\nDetalhes:\n\n";


$title_delete_project     = ABBR_MANAGER_NAME.": Elimina��o de projecto";
$title_delete_task        = ABBR_MANAGER_NAME.": Elimina��o de tarefa";

$email_delete_project     = "Exmo(a). Sr(a).,\n\n".
                            "O portal ".MANAGER_NAME." informa que foi eliminado um projecto sob sua responsabilidade em ".$email_date."\n\n".
                            "Obrigado pela aten��o e pelo tempo dispensados.\n\n";
$email_delete_task        = "Exmo(a). Sr(a).,\n\n".
                            "O portal ".MANAGER_NAME." informa que foi eliminada uma tarefa sob sua responsabilidade em ".$email_date."\n\n".
                            "Obrigado pela aten��o e pelo tempo dispensados.\n\n";

$delete_list = "Projecto: %1\$s\n".
                "Tarefa:   %2\$s\n".
                "Status: %3\$s\n\n".
                "Texto:\n%4\$s\n\n";

$title_welcome            = "Boas-vindas de ".ABBR_MANAGER_NAME;
$email_welcome            = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." d�-lhe as boas-vindas em ".$email_date.".\n\n".
                            "Como este sistema pode ser novo para si, dar-lhe-emos uma breve explica��o de forma a que possa, rapidamente, come�ar a utiliz�-lo.\n\n".
                            "Em primeiro lugar, este sistema � uma ferramenta de Gest�o de Projectos. O ecr� principal mostrar� os projectos em curso. ".
                            "Se clicar em algum dos nomes encontrar-se-� na �rea de tarefas. � aqui que todo o trabalho se desenrola.\n\n".
                            "Cada item que colocar no sistema, ou tarefa que editar, ser�o exibidos aos demais utilizadores como 'novos' ou 'actualizados'. O contr�rio tamb�m � verdade, ".
                            "permitindo a r�pida detec��o da exist�ncia de actividade.\n\n".
                            "Tamb�m � poss�vel assumir ou desistir de tarefas, bem como edit�-las, al�m de alterar as mensagens no f�rum que lhes digam respeito. ".
                            "De acordo com a evolu��o do seu trabalho, por favor edite os textos e status relativos ao mesmo, de forma a permitir o acompanhamento dos progressos por todos. ".
                            "\n\nDesejamos-lhe sucesso. Se precisar de ajuda envie um e-mail para ".EMAIL_ADMIN." .\n\n -- Boa sorte !\n\n".
                            "Utilizador:      %1\$s\n".
                            "Palavra-passe:   %2\$s\n\n".
                            "Equipa: %3\$s".
                            "Nome:       %4\$s\n".
                            "P�gina Web:    ".BASE_URL."\n\n".
                            "%5\$s";

$title_user_change1       = ABBR_MANAGER_NAME.": Um administrador do sistema alterou a sua conta";
$email_user_change1       = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que foi alteradade a sua conta em ".$email_date." por %1\$s ( %2\$s ) \n\n".
                            "Utilizador:      %3\$s\n".
                            "Palavra-passe:   %4\$s\n\n".
                            "Equipa: %5\$s".
                            "Nome:       %6\$s\n\n".
                            "%7\$s";

$title_user_change2       = ABBR_MANAGER_NAME.": Conta alterada";
$email_user_change2       = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que a sua conta foi alterada com sucesso em ".$email_date.".\n\n".
                            "Utilizador:    %1\$s\n".
                            "Palavra-passe: %2\$s\n\n".
                            "Nome:     %3\$s\n";

$title_user_change3       = ABBR_MANAGER_NAME.": Conta alterada";
$email_user_change3       = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que a sua conta foi alterada com sucesso em ".$email_date.".\n\n".
                            "Utilizador: %1\$s\n".
                            "A sua Palavra-passe actual n�o foi modificada.\n\n".
                            "Nome:  %2\$s\n";


$title_revive             = ABBR_MANAGER_NAME.": Conta reactivada";
$email_revive             = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que a sua conta foi reactivada em ".$email_date.".\n\n".
                            "Utilizador: %1\$s\n".
                            "Nome do utilizador:  %2\$s\n\n".
                            "N�o podemos enviar a sua Palavra-passe pois a mesma encontra-se encriptada. \n\n".
                            "Caso tenha esquecido a sua Palavra-passe, obtenha uma nova enviando um e-mail para ".EMAIL_ADMIN." .";



$title_delete_user        = ABBR_MANAGER_NAME.": Conta desactivada.";
$email_delete_user        = "Exmo(a). Sr(a).,\n\nO portal ".MANAGER_NAME." informa que a sua conta foi desactivada em ".$email_date.".\n".
                            "Lamentamos a sua sa�da e gostar�amos de agradecer o seu trabalho!\n\n".
                            "Caso n�o concorde com a desactiva��o ou ache que a mesma se deve a erro, envie um e-mail para ".EMAIL_ADMIN.".";

?>
