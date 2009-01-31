<?php
/*
  $Id: en_help_admin.php 1437 2006-01-19 06:38:12Z andrewsimpson $

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

  Help files for 'pt' (Portuguese Standard)

  Translation: A. Madeira <amadeirax at gmail.com>

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
	<a name=\"admin\"></a>
	<p><b>E-mail do Administrador:</b></p>
	<p>Este é o endereço de e-mail da pessoa responsável pela manutenção diária deste portal, o administrador.
	</p>
	<p>Mensagens automáticas do sistema, particularmente a respeito de contas de utilizadores, fornecerão este endereço para contato.
	</p>
	<p>Forneça sempre este endereço. Na dúvida, introduza o seu próprio e-mail aqui!
	</p>
	<a name=\"reply\"></a>
	<p><b>'Responder para':</b></p>
	<p>Campo 'responder para' existente no cabeçalho dos e-mails enviados pelo portal.
	</p>	
	<p>Na dúvida, configure igual ao e-mail do Administrador.
	</p>
	<a name=\"from\"></a>
	<p><b>E-mail 'de':</b></p>
	<p>Campo 'de' existente no cabeçalho dos e-mails enviados pelo portal.
	</p>
	<p>Na dúvida, configure igual ao e-mail do Administrador.
	</p>
	<a name=\"list\"></a>
	<p><b>Lista de e-mail:</b></p>
	<p>Ao enviar e-mails para uma equipa, cópias serão encaminhadas para os e-mails listados aqui. Esta função existe para manter os Gerentes de Projectos a par dos acontecimentos.
	</p>
	<p>Para enviar e-mails às equipas, marque a caixa de selecção 'enviar para equipas' na criação/edição de Projectos ou Tarefas.</p>
	<p>Isso pode ser feito através da configuração padrão abaixo ou ao marcar manualmente a caixa de seleção.
	</p>
	<p>Atenção ao facto de que os utilizadores poderão sobrepor a configuração padrão, desmarcando a caixa de selecção manualmente.
	</p>
	<p>Configurando uma equipa como privada não afecta a lista de e-mails.</p>
	";

  new_box( "Help", $content );
  create_bottom();
?>
