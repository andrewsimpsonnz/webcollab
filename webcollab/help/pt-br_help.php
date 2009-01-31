<?php
/*
  $Id: en_help.php 1437 2006-01-19 06:38:12Z andrewsimpson $

  WebCollab
  ---------------------------------------
  
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

  Help page

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "pt" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>Equipes:</b></p>
<p>Grande parte dos projetos ou tarefas possuem áreas específicas trabalhadas simultaneamente por equipes. Uma equipe é um conjunto de pessoas que compartilham a mesma área de conhecimento. Pode-se enviar notificações via e-mail para uma equipe ao invés de um único usuário.</p>
<p>As equipes também podem ser usadas para controlar acessos. Caso o acesso seja restrito a uma determinada equipe, os demais usuários não poderão enxergar, nem acessar, seus projetos ou tarefas. Uma restrição de acesso pode ser aplicada a um projeto ou tarefa, bastando para tal marcar \"Todos os usuários podem ver esta tarefa?\</p>
<p>No caso de equipes privativas, será disponibilizado um Fórum também privativo para suas tarefas ou projetos.</p>
<br /> 
<a name=\"taskgroup\"></a>
<p><b>Grupos de tarefas:</b></p>
<p>As diferenças entre 'equipes' e 'grupos de tarefas' não são facilmente percebidas por usuários recém-chegados. Entretanto, a diferença é patente: equipes servem para controlar acessos e fluxo de informações; grupos de tarefas são simplesmente um artifício para melhorar a leitura da lista de tarefas.</p>
<p>Um projeto inflado com inúmeras sub-tarefas vinculadas tem sua compreensão prejudicada: a listagem pode ser muito longa e confusa. Ao classificá-las por 'grupos de tarefas' a lista será automaticamente organizada em subseções, tornando-se mais legível. Tarefas que não estejam relacionadas a nenhum grupo de tarefas serão organizadas na subseção 'não-categorizado'.</p>
<p>Em suma: caso não existam tarefas categorizadas por grupos em um projeto, a listagem dessas tarefas será longa. Se ao menos uma tarefa foi categorizada, todas passarão a ser listadas por grupos de tarefas.</p>
<br />
<a name=\"globalaccess\"></a>
<p><b>Tarefa vista por todos os usuários?</b></p>
<p>Esta caixa de seleção permite que a visualização de uma tarefa ou projeto seja exclusiva aos membros da equipe selecionada. Quando a caixa de seleção é marcada, todos os usuários podem visualizar a tarefa ou projeto. Inversamente, quando é desmarcada, apenas membros da equipe podem vê-la.</p>
<p>Para tarefas: Usuários que não estejam na equipe selecionada poderão visualizá-las na lista de projetos, mas não poderão acessá-las.</p>
<p>Para projetos: Usuários que não estejam na equipe selecionada não poderão, em tela alguma, visualizar o projeto ou suas tarefas vinculadas.</p>
<p>Caso não haja uma equipe selecionada, esta caixa de seleção não produz efeitos.</p>
<a name=\"groupaccess\"><br /></a>
<p><b>Qualquer um da equipe pode editar?</b></p>
<p>Esta caixa de seleção permite a todos os integrantes de uma equipe editar a tarefa ou projeto. Quando a caixa de seleção é marcada, todos os integrantes poderão editar este item. Quando é desmarcada, apenas seu responsável poderá editá-lo.</p>
<p>Caso não haja uma equipe realçada, esta caixa de seleção não produz efeitos.</p>
<br />
<a name=\"summarypage\"></a>
<p><b>Sumário:</b></p>
<p>A página sumário contêm seis colunas que indicam de forma concisa o andamento de cada tarefa.</p>
<ul>
<li><b>Bandeiras</b>:
indicam se existem novidades para determinada tarefa.
As possibilidades são:
<ul>
<li><b>C</b>:<br />
indica que a tarefa foi criada<br /></li>
<li><b>M</b>:<br />
indica que a tarefa foi modificada<br /></li>
<li><b>P</b>:<br />
indica que uma nova postagem foi enviada ao fórum da tarefa<br /></li>
<li><b>F</b>:<br />
indica que um novo arquivo foi carregado para a tarefa<br /></li>
</ul>
Se há uma bandeira, você pode clicá-la para mostrar a tarefa relacionada.<br /></li>
<li><b>Prazo</b>:<br />
indica quando a tarefa vence.<br />
Se a data aparece em <span class=\"red\">vermelho</span>, a tarefa está atrasada; se não,
Se a data aparece em <span class=\"green\">verde</span>, a tarefa é para hoje<br /></li>
<li><b>Status</b>:<br />
indica a condição de trabalho para o item:
<ul>
<li><b>Planejada</b>:<br />
indica que a tarefa foi criada recentemente mas,
propositadamente, ainda não foi agendada.</li>
<li><b>Nova</b>:<br />
indica que a tarefa foi recentemente criada e
aguarda que a iniciem.</li>
<li><span class=\"blue\">Suspensa</span>:<br />
indica que os trabalhos na tarefa estão parados
aguardando a resolução de algum evento</li>
<li><span class=\"orange\">Ativa</span>:<br />
indica que a tarefa está sendo trabalhada</li>
<li><span class=\"green\">Feito</span>:<br />
indica que a tarefa foi concluída<br /></li>
</ul>
</li>
<li><b>Responsável</b>:<br />
indica para quem a tarefa foi designada.
Você pode clicar no nome para saber mais a respeito daquela pessoa.<br /></li>
<li><b>Equipe</b>:<br />
indica tanto a 'equipe' quanto o 'grupo de tarefas' associados à tarefa.
Se você clicar no cabeçalho da coluna a exibição será alternada entre os dois tipos de agrupamentos.<br /></li>
<li><b>Tarefa</b>:<br />
indica o nome da tarefa.
Você pode clicar em seu nome para obter mais informações.</li>
</ul>
";
  new_box("Help", $content );
  create_bottom();
?>
