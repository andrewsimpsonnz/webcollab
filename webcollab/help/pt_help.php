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
<p><b>Equipas:</b></p>
<p>A maior parte dos projectos ou tarefas possuem equipas a trabalhar em áreas específicas. Uma equipa é um conjunto de pessoas que partilham a mesma área de conhecimento. Podem enviar-se notificações via e-mail para uma equipa em vez de para um único utilizador.</p>
<p>As equipas também podem ser usadas para controlar acessos. Caso o acesso seja restrito a uma determinada equipa, os demais utilizadores não poderão ver, ou aceder, aos seus projectos ou tarefas. Uma restrição de acesso pode ser aplicada a um projecto ou tarefa, bastando para tal marcar \"Todos os utilizadores podem ver esta tarefa?\"</p>
<p>No caso de equipas privadas, será disponibilizado um Fórum também privado para as suas tarefas ou projectos.</p>
<br /> 
<a name=\"taskgroup\"></a>
<p><b>Grupos de tarefas:</b></p>
<p>As diferenças entre 'equipas' e 'grupos de tarefas' não são facilmente percebidas por utilizadores recém-chegados. No entanto, a diferença é patente: as equipas servem para controlar acessos e fluxo de informações; os grupos de tarefas são simplesmente um artifício para melhorar a leitura da lista de tarefas.</p>
<p>Um projecto com inúmeras sub-tarefas relacionadas tem a sua compreensão prejudicada: a listagem pode ser muito longa e confusa. Ao classificá-las por 'grupos de tarefas' a lista será automaticamente organizada em subsecções, tornando-se mais legível. Tarefas que não estejam relacionadas a nenhum grupo de tarefas serão organizadas na subsecção 'não-categorizado'.</p>
<p>Em suma: caso não existam tarefas categorizadas por grupos num projecto, a listagem dessas tarefas será longa. Se, pelo menos, uma tarefa foi categorizada, todas passarão a ser listadas por grupos de tarefas.</p>
<br />
<a name=\"globalaccess\"></a>
<p><b>Tarefa vista por todos os utilizadores?</b></p>
<p>Esta caixa de selecção permite que a visualização de uma tarefa ou projecto seja exclusiva dos membros da equipa seleccionada. Quando a caixa de selecção é marcada, todos os utilizadores podem visualizar a tarefa ou projecto. Inversamente, quando é desmarcada, apenas os membros da equipa podem vê-la.</p>
<p>Para tarefas: utilizadores que não estejam na equipa seleccionada poderão visualizá-las na lista de projectos, mas não poderão aceder-lhes.</p>
<p>Para projectos: utilizadores que não estejam na equipa seleccionada não poderão, em nenhum ecrã, visualizar o projecto ou as suas tarefas relacionadas.</p>
<p>Caso não haja uma equipa seleccionada, esta caixa de selecção não produz efeitos.</p>
<a name=\"groupaccess\"><br /></a>
<p><b>Qualquer elemento da equipa pode editar?</b></p>
<p>Esta caixa de selecção permite a todos os membros de uma equipa editar a tarefa ou projecto. Quando a caixa de selecção é marcada, todos os membros poderão editar este item. Quando é desmarcada, apenas o seu responsável poderá editá-lo.</p>
<p>Caso não haja uma equipa realçada, esta caixa de selecção não produz efeitos.</p>
<br />
<a name=\"summarypage\"></a>
<p><b>Sumário:</b></p>
<p>A página Sumário contêm seis colunas que indicam de forma concisa o andamento de cada tarefa.</p>
<ul>
<li><b>Marcadores</b>:
indicam se existem novidades para determinada tarefa.
As possibilidades são:
<ul>
<li><b>C</b>:<br />
indica que a tarefa foi criada<br /></li>
<li><b>M</b>:<br />
indica que a tarefa foi modificada<br /></li>
<li><b>P</b>:<br />
indica que uma nova publicação foi enviada ao fórum da tarefa<br /></li>
<li><b>F</b>:<br />
indica que um novo ficheiro foi carregado para a tarefa<br /></li>
</ul>
Se há um marcador, pode clicá-lo para que seja mostrada a tarefa relacionada.<br /></li>
<li><b>Prazo</b>:<br />
indica quando a tarefa vence.<br />
Se a data aparece em <span class=\"red\">vermelho</span>, a tarefa está atrasada; se não,
Se a data aparece em <span class=\"green\">verde</span>, a tarefa é para hoje<br /></li>
<li><b>Status</b>:<br />
indica a condição de trabalho para o item:
<ul>
<li><b>Planeada</b>:<br />
indica que a tarefa foi criada recentemente mas,
propositadamente, ainda não foi agendada.</li>
<li><b>Nova</b>:<br />
indica que a tarefa foi recentemente criada e
aguarda que a iniciem.</li>
<li><span class=\"blue\">Suspensa</span>:<br />
indica que os trabalhos na tarefa estão parados
aguardando a resolução de algum evento</li>
<li><span class=\"orange\">Activa</span>:<br />
indica que a tarefa está a ser trabalhada</li>
<li><span class=\"green\">Feito</span>:<br />
indica que a tarefa foi concluída<br /></li>
</ul>
</li>
<li><b>Responsável</b>:<br />
indica para quem a tarefa foi designada.
Pode clicar no nome para saber mais a respeito dessa pessoa.<br /></li>
<li><b>equipa</b>:<br />
indica tanto a 'equipa' como o 'grupo de tarefas' associados à tarefa.
Se clicar no cabeçalho da coluna, a exibição será alternada entre os dois tipos de agrupamentos.<br /></li>
<li><b>Tarefa</b>:<br />
indica o nome da tarefa.
Pode clicar no nome para obter mais informações.</li>
</ul>
";
  new_box("Help", $content );
  create_bottom();
?>
